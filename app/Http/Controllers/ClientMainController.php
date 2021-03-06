<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Result;
use Illuminate\Http\Request;

class ClientMainController extends Controller
{
    public function getActivesTests() {
        $tests = Test::Where('active', '1')->get();
        return view('layouts.primary', ['page' => 'showActivesTests', 'tests' => $tests]);
    }

    public function showTest($test_id) {
        $test = Test::findorFail($test_id);
        if(!$test->active) return redirect()->route('client.getActivesTests');
        $activesQuestion = $test->questions->where('active', '1');
        return view('layouts.primary', ['page' => 'showTest', 'test' => $test, 'questions' => $activesQuestion]);
    }

    public function getResult($test_id, Request $request) {
        $test = Test::findorFail($test_id);
        if(!$test->active) return redirect()->route('client.getActivesTests');
        $questions = $test->questions->where('active', 1);
        $correctRes = 0;
        $uncorrectRes = 0;
        $total = 0;
        foreach($questions as $question) {
            $correctAnswers = $question->answers->where('correct', 1)->first();
            if($request->input($question->id) == ($correctAnswers->id ?? NULL)) {
                $correctRes++;
            } else {
                $uncorrectRes++;}
            $total++;
        }
        $proc = $correctRes / $total * 100;

        $results = Result::create([
            'test_id' => $test_id,
            'user_id' =>  mt_rand(10, 999),
            'uncorrect' => $uncorrectRes,
            'correct' => $correctRes, 
            'total' => $total
        ]); 
        
        return view('layouts.primary', ['page' => 'result', 'uncorrectRes' => $uncorrectRes,'correctRes' => $correctRes, 'total' => $total, 'proc' => $proc]);
    }
}
