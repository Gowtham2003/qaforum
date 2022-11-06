<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "title",
        "content",
        "markdown",
        "user_id",
        "votes",
        "comments"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function votes()
    {
        return $this->hasMany(QuestionVote::class);
    }
    public function getVotes()
    {
        $votes = $this->votes;
        $upvotes = 0;
        $downvotes = 0;
        foreach ($votes as $vote) {
            if ($vote->vote == 1) {
                $upvotes++;
            } else {
                $downvotes++;
            }
        }
        return $upvotes - $downvotes;
    }
}
