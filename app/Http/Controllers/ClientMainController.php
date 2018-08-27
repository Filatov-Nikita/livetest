<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class ClientMainController extends Controller
{
    public function getActivesTests() {
        $tests = Test::Where('active', '1')->get();
        return view('layouts.primary', ['page' => 'showActivesTests', 'tests' => $tests]);
    }

    public function showTest($test_id) {
        $test = Test::findorFail($test_id);
        $activesQuestion = $test->questions->where('active', '1');
        return view('layouts.primary', ['page' => 'showTest', 'test' => $test, 'questions' => $activesQuestion]);
    }

    public function getResult($test_id, Request $request) {
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
        return view('layouts.primary', ['page' => 'result', 'uncorrectRes' => $uncorrectRes,'correctRes' => $correctRes, 'total' => $total, 'proc' => $proc]);
    }
    public function showTestForApi($test_id) {
        $test = Test::findorFail($test_id);
        $activesQuestion = $test->questions->where('active', '1');
        return view('layouts.primary', ['page' => 'showTest', 'test' => $test, 'questions' => $activesQuestion]);
    }
}
