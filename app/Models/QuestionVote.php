<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionVote extends Model
{
    use HasFactory;
    public function Question(){
      return $this->belongsTo(Question::class);
    }
    public function User(){
      return $this->belongsTo(User::class);
    }
}
