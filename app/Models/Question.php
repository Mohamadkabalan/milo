<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{

  protected $table="questions";
  protected $primaryKey="id";
  protected $fillable = [
    'question',
    'weight'
  ];

  public function answers(){
      return $this->hasMany(Answer::class);
  }

}
