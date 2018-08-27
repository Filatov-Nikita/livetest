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
}
