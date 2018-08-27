<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function testsDataBase() 
    {
        $question = Answer::find(1)->question->name;
        dump($question); //working
       
        $answers = Question::find(2)->answers[1]->text;
        dump($answers); //working

        $test = Question::find(2)->test;
        dump($test->name); //working

        $questions = Test::find(1)->questions;
        dump($questions[0]->name); //working
    }

    public function apiTest() 
    {
        return Test::get()->where('active', '1');
    }

    public function getResultApi($test_id, Request $request) 
    {
        $test = Test::findorFail($test_id);
        $questions = $test->questions;
        $correctRes = 0;
        $uncorrectRes = 0;
        $total = 0;
        foreach($questions as $question) {
            $correctAnswers = $question->answers->where('correct', 1)->first();
            if($request->input($question->id) == $correctAnswers->id) {
                $correctRes++;
            } else {
                $uncorrectRes++;}
            $total++;
        }
        $proc = $correctRes / $total * 100;
        return response()
            ->json([
            'total' => $total,
            'correctRes' => $correctRes,
            'uncorrectRes' => $uncorrectRes,
            'perc' => $proc
            ], 200);
    }
}
