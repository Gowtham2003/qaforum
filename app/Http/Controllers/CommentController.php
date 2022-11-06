<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\CommentVote;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $data = $request->all();
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
    public function upvote($id)
    {
        $comment = Comment::find($id);
        $existingVote = CommentVote::where("comment_id", $id)->where("user_id", request()->userinfo->id)->first();
        if ($existingVote) {
            if (!$existingVote->vote == 1) $existingVote->update(["vote" => 1]);
        } else {
            CommentVote::create(["comment_id" => $id, "user_id" => request()->userinfo->id, "vote" => 1]);
        };

        return "success";
    }
    public function downvote($id)
    {
        $comment = Comment::find($id);
        $existingVote = CommentVote::where("comment_id", $id)->where("user_id", request()->userinfo->id)->first();
        if ($existingVote) {
            if (!$existingVote->vote == -1) $existingVote->update(["vote" => -1]);
        } else {
            CommentVote::create(["comment_id" => $id, "user_id" => request()->userinfo->id, "vote" => -1]);
        };

        return "success";
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json($comment);
    }
}
