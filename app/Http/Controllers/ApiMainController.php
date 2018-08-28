<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Result;
use Illuminate\Http\Request;

class ApiMainController extends Controller
{
    public function getActivesTestsApi() 
    {
        return response()->json(Test::get()->where('active', '1'), 200);
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
        $perc = $correctRes / $total * 100;

        $results = Result::create([
            'test_id' => $test_id,
            'user_id' =>  mt_rand(10, 999),
            'uncorrect' => $uncorrectRes,
            'correct' => $correctRes, 
            'total' => $total
        ]); 
        $results['perc'] = $perc;
        return response()
            ->json($results, 200);
    }
}
