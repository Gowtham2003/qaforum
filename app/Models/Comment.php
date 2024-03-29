<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "comment",
        "votes",
        "question_id",
        "user_id"

    ];
    public function question(){
        return $this->belongsTo(Question::class);
      }
    public function user(){
        return $this->belongsTo(User::class);
      }
    public function comments_votes(){
    return $this->hasMany(CommentVote::class);
    }
    public function getVotes(){
        $votes = $this->votes;
        $upvotes = 0;
        $downvotes = 0;
        foreach($votes as $vote){
            if($vote->vote == 1){
                $upvotes++;
            }else{
                $downvotes++;
            }
        }
        return $upvotes - $downvotes;
    }
}
