<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

  protected $table='answers';
  protected $primaryKey='id';

  protected $fillable = [
    'answer',
    'correct_answer',
    'question_id'
  ];

  public function Question(){
    return $this->belongsTo(Question::class,'question_id');
  }

}
