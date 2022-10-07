<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{


    public function create(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $data = $request->all();
    }


    public function store(StoreCommentRequest $request)
    {
        //
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
