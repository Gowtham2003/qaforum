<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\QuestionVote;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    public function index()
    {
        return Question::with("user")->withCount("questions_votes")->withSum("questions_votes","vote")->paginate();
    }

    public function indexByUser(Request $request)
    {
        $user = $request->userinfo;
        return Question::where("user_id", $user->id)->with("user")->withCount("questions_votes")->withSum("questions_votes","vote")->paginate();
    }
    public function getComments()
    {
        return Question::with("comments")->all();
    }
    public function create(Request $request)
    {
        $user = $request->userinfo;
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);


        $data = $request->all();
        $data['user_id'] = $user->id;
        $data['markdown'] = Str::markdown($data['content']);


        return Question::create($data);
    }

    public function show($id)
    {
        return Question::with("user")->findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $question = Question::find($id);
        $question->update($data);
    }
    public function destroy($id)
    {
        return Question::destroy($id);
    }
    public function upvote($id)
    {
        $question = Question::find($id);
        $existingVote = QuestionVote::where("question_id", $id)->where("user_id", request()->userinfo->id)->first();
        if ($existingVote) {
            if (!$existingVote->vote == 1) $existingVote->update(["vote" => 1]);
        } else {
            QuestionVote::create(["question_id" => $question->id, "user_id" => request()->userinfo->id, "vote" => 1]);
        };

        return "success";
    }
    public function downvote($id)
    {
        $question = Question::find($id);
        $existingVote = QuestionVote::where("question_id", $id)->where("user_id", request()->userinfo->id)->first();
        if ($existingVote) {
            if (!$existingVote->vote == -1) $existingVote->update(["vote" => -1]);
        } else {
            QuestionVote::create(["question_id" => $question->id, "user_id" => request()->userinfo->id, "vote" => -1]);
        };
        return "success";
    }
}
