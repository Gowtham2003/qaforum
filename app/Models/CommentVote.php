<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentVote extends Model
{
    use HasFactory;
    public function Comment(){
      return $this->belongsTo(Comment::class);
    }
    public function User(){
      return $this->belongsTo(User::class);
    }

}
