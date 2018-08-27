<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrudAnswersController extends Controller
{
    public function addShowForm($question_id) 
    {
        $test_id = session('test_id');
        $question = Question::findOrFail($question_id);
        return view('layouts.primary', ['page' => 'admin.forms.addAnswers', 'question' => $question, 'test_id' => $test_id]);
    }

    public function addPost($question_id, Request $request) 
    {
        $test_id = session('test_id');
        Answer::create([
            'question_id' => $question_id,
            'text' => $request->input('text'),
            'active' => 1
        ]);
        return view('layouts.primary', ['page' => 'admin.pages.linkAnswer', 'test_id' => $test_id]);
    }

    public function edit($answer_id) 
    {
        $test_id = session('test_id');
        $answer = Answer::findOrFail($answer_id);
        return view('layouts.primary', ['page' => 'admin.forms.editAnswer', 'answer' => $answer, 'test_id' => $test_id]);
    }

    public function editPost($answer_id, Request $request) 
    {
        $test_id = session('test_id');
        $answer = Answer::findOrFail($answer_id);
        $answer->update([ 'text' => $request->input('text') ]);
        return view('layouts.primary', ['page' => 'admin.pages.linkAnswer', 'test_id' => $test_id, 'edit' => true]);
    }

    public function toggle($id) 
    {
        $test_id = session('test_id');
        $answer = Answer::findOrFail($id);
        $answer->active ?  $answer->active = 0 : $answer->active = 1;
        $answer->save();
        return redirect()->route('admin.showTestPage', ['id' => $test_id]);
    }
}
