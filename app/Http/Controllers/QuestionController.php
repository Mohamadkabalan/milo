<?php
Namespace App\Http\Controllers;

use App\Models\Question;
class QuestionController extends Controller{

  public $_config;

  public function __construct() {
    $this->_config=request('_config');
  }

  public function fetch(){
    $questions=Question::with('answers')->get();
    return json_encode($questions);
  }

}

?>