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
        $correctElements = $answer->question->answers->where('correct', 1)->where('id', '<>', $answer_id)->first();
        if(empty($correctElements)) {
             $correct = $request->input('correct') ? 1 : 0;
        } else {
          
            if($answer->correct) {
                 $answer->correct = 0; $answer->save(); 
                 return redirect()->route('admin.showTestPage', ['id' => $test_id])->with(['error' => 'Возможно произошла какая-то ошибка, но мы уже все поправили :)']);
            } else {
                if($request->input('correct')) return redirect()->route('admin.showTestPage', ['id' => $test_id])->with(['error' => 'Вы пытаетесь поставить 2 правильных ответа для одного вопроса!']); }
                $correct = 0;
        }
        $answer->update([ 'text' => $request->input('text'), 'correct' => $correct ]);
        return view('layouts.primary', ['page' => 'admin.pages.linkAnswer', 'test_id' => $test_id, 'edit' => true]);
    }

    public function toggle($id) 
    {
        $test_id = session('test_id');
        $answer = Answer::findOrFail($id);
        $answerActive = $answer->active;
        if($answer->correct && $answerActive) {
            return redirect()->route('admin.showTestPage', ['id' => $test_id])->with(['error' => 'Нельзя скрыть ответ, который является правильным!']);
        }
        $answerActive ?  $answer->active = 0 : $answer->active = 1;
        $answer->save();
        return redirect()->route('admin.showTestPage', ['id' => $test_id]);
    }
}
