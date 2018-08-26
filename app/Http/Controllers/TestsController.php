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
}
