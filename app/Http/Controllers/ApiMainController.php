<?php

namespace App\Http\Controllers;

use App\Models\Test;
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
