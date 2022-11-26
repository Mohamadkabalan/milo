<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{

  protected $table='user_answers';
  protected $primaryKey='id';

  protected $fillable = [
    'question_id',
    'user_id',
    'answer_id'
  ];

  public function Question(){
    return $this->belongsTo(Question::class,'question_id');
  }
  public function Answer(){
    return $this->belongsTo(Answer::class,'answer_id');
  }
  public function User(){
    return $this->belongsTo(User::class,'user_id');
  }
}
