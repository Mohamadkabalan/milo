<?php
namespace App\Http\Controllers;
use App\Models\Answer;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Question;
use App\Models\UserAnswer;
class UserController extends Controller {
  public $_config;

  public function __construct() {
    $this->_config = request('_config');
  }

  public function login() {
    if (auth()->guard('web')->check()) {
      return redirect()->intended(route('home'));
    }
    return view($this->_config['view']);
  }

  public function loginAction() {
    $data = request()->all();
    if (auth()->guard('web')->attempt(request(['email', 'password']), TRUE)) {
      return response()->json(['status' => 'success',
        'message' => 'You have logged in successfully',
        'redirect' => route('home')], 200);
    } else {
      return response()->json(['status' => 'failed', 'message' => 'Credentials Error', 'redirect' => route('login')],
        200);
    }
  }

  public function register() {
    if (auth()->guard('web')->check()) {
      return redirect()->intended(route('home'));
    }
    return view($this->_config['view']);
  }

  public function registerAction() {
    $data = request()->all();
    $data['password_confirmation'] = $data['password'];
    $validate = $this->getValidationFactory()->make($data, ['name' => 'string|required|max:40',
      'email' => 'email|required|unique:users,email',
      'password' => 'confirmed|min:6|required']);
    if (!$validate->passes()) {
      return response()->json(['status' => 'failed', 'message' => $validate->errors()->first()],
        200);
    }
    $data = request()->input();
    $data['password'] = bcrypt($data['password']);
    $user = new  User();
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = $data['password'];
    $user->email_verified_at = date('Y-m-d H:i:s');
    $user->remember_token = md5(uniqid(rand(), TRUE));
    $user->save();
    auth()->guard('web')->attempt(request(['email', 'password']));
    return response()->json(['status' => 'success',
      'message' => 'User Registered Succesfully',
      'redirect' => route('home')],
      200);
  }

  public function home() {
    if (auth()->guard('web')->check()) {
      $questions = json_encode(Question::orderBy('weight','asc')->with('answers')->get()->toArray());
      $applied_before=UserAnswer::where('user_id',auth()->guard('web')->user()->id)->get()->count();
      return view($this->_config['view'], compact('questions','applied_before'));
    } else {
      return redirect()->intended(route('login'));
    }
  }

  public function submitSurvey() {
    $data = request()->all();
    foreach ($data['questions'] as $key => $question) {
      $userAnswer = new UserAnswer();
      $userAnswer->question_id = $question['id'];
      $userAnswer->user_id = auth()->guard('web')->user()->id;
      $userAnswer->answer_id = $question['user_answer'];
      $userAnswer->save();
    }
    return response()->json(['status' => 'success', 'message' => 'Survey Saved Successfully'],
      200);
  }

  public function statistics() {
    if (auth()->guard('web')->check()) {
      $questions = Question::all();
      return view($this->_config['view'], compact('questions'));
    } else {
      return redirect()->intended(route('login'));
    }
  }

  public function statistic($question_id) {
    $data =
      UserAnswer::SelectRaw('count(`answer_id`) as counter, answer_id, (select answer from answers where answers.id=answer_id) as answer')
        ->where('question_id', $question_id)
        ->groupBy('answer_id')
        ->get()
        ->toArray();
    $counters = json_encode(array_column($data, 'counter'));
    $answers = json_encode(array_column($data, 'answer'));
    $question = Question::find($question_id)->question;
    return view($this->_config['view'], compact('counters', 'answers', 'question'));
  }

  public function pendingUsers() {
    if (auth()->guard('web')->check()) {
      if (auth()->guard('web')->user()->is_admin) {
        $users = User::all()->pluck('id')->toArray();
        $submitedUsersids = UserAnswer::select('user_id')->groupBy('user_id')->get()->pluck('user_id')->toArray();
        $pendingUsersids = array_diff($users, $submitedUsersids);
        $pendingUsers = User::whereIn('id', $pendingUsersids)->get();
        return view($this->_config['view'], compact('pendingUsers'));
      }
    }
    return redirect()->route('logout');
  }

  public function questions() {
    if (auth()->guard('web')->check()) {
      if (auth()->guard('web')->user()->is_admin) {
        $questions = Question::all();
        return view($this->_config['view'], compact('questions'));
      }
    }
    return redirect()->route('logout');
  }

  public function createQuestion() {
    if (auth()->guard('web')->check()) {
      if (auth()->guard('web')->user()->is_admin) {
        $questions = Question::all();
        return view($this->_config['view'], compact('questions'));
      }
    }
    return redirect()->route('logout');
  }

  public function storeQuestion() {
    if (auth()->guard('web')->check()) {
      if (auth()->guard('web')->user()->is_admin) {
        $data = request()->all();
        $question = new Question();
        $question->question = $data['question']['question'];
        $question->weight = $data['question']['weight'];
        $question->save();
        foreach ($data['question']['answers'] as $answer) {
          $ans = new Answer();
          $ans->answer = $answer['answer'];
          $ans->question_id = $question->id;
          $ans->save();
        }
        return response()->json(['status' => 'success', 'message' => 'Question Saved Successfully'], 200);
      }
    }
  }

  public function editQuestion($question_id) {
    if (auth()->guard('web')->check()) {
      if (auth()->guard('web')->user()->is_admin) {
        $question = Question::where('id', $question_id)->with('answers')->get()->first();
        return view($this->_config['view'], compact('question'));
      }
    }
    return redirect()->route('logout');
  }

  public function updateQuestion($question_id) {
    if (auth()->guard('web')->check()) {
      if (auth()->guard('web')->user()->is_admin) {
        $data = request()->all();
        $question = Question::find($question_id);
        $question->question = $data['question']['question'];
        $question->weight = $data['question']['weight'];
        $question->save();
        $this->checkDeletedAnswers($question_id, $data['question']['answers']);
        foreach ($data['question']['answers'] as $answer) {
          if (isset($answer['id'])) {
            $ans = Answer::find($answer['id']);
            $ans->answer = $answer['answer'];
            $ans->save();
          } else {
            $ans = new Answer();
            $ans->answer = $answer['answer'];
            $ans->question_id = $question->id;
            $ans->save();
          }
        }
        return response()->json(['status' => 'success', 'message' => 'Question Saved Successfully'], 200);
      }
    }
  }

  public function checkDeletedAnswers($question_id, $newAnswers) {
    $oldAnswersIds = Answer::where('question_id', $question_id)->get()->pluck('id')->toArray();
    $newAnswersIds = array_column($newAnswers, 'id');
    $tobeDeletesAnswersIds = array_diff($oldAnswersIds, $newAnswersIds);
    foreach ($tobeDeletesAnswersIds as $id) {
      $tobeDeletesAnswers = Answer::find($id);
      $tobeDeletesAnswers->delete();
    }
  }

  public function destroyQuestion($id) {
    if (auth()->guard('web')->check()) {
      if (auth()->guard('web')->user()->is_admin) {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('fetch-questions');
      }}
    return redirect()->route('logout');
  }

  public function logout() {
    auth()->guard('web')->logout();
    return redirect()->route($this->_config['redirect']);
  }
}
?>