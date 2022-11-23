<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\CommentVote;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create(Request $request)
    {
        $user = $request->userinfo;
        $request->validate([
          'comment' => 'required',
          'question_id' => 'required'
        ]);
        $data = $request->all();
        $data["user_id"] = $user->id;
        $data["votes"] = 0;
        $comment = Comment::create($data);
        return response()->json($comment);
    }

    public function update(UpdateCommentRequest $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $data = $request->all();
        $comment = Comment::findOrFail($data['id']);
        $comment->update($data);
        return response()->json($comment);
    }
    public function upvote(Request $request,$id)
    {
      $vote = [];
        $comment = Comment::find($id);
        $user = $request->userinfo;
        $existingVote = CommentVote::where("comment_id", $id)->where("user_id", request()->userinfo->id)->first();
        if ($existingVote) {
            if (!($existingVote->vote == 1)) $existingVote->update(["vote" => 1]);
            $existingVote->save();
            $vote = $existingVote;
        } else {
            CommentVote::create(["comment_id" => $id, "user_id" => $user->id, "vote" => 1]);
        };

        // return "success";
        return $vote;
    }
    public function downvote(Request $request,$id)
    {
      $vote = [];
        $comment = Comment::find($id);
        $user = $request->userinfo;
        $existingVote = CommentVote::where("comment_id", $id)->where("user_id", $user->id)->first();
        if ($existingVote) {
            if (!($existingVote->vote == -1)) $existingVote->update(["vote" => -1]);
            $existingVote->save();
            $vote = $existingVote;
        } else {
            CommentVote::create(["comment_id" => $id, "user_id" => request()->userinfo->id, "vote" => -1]);
        };
       return $vote;
        // return "success";
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json($comment);
    }
}
