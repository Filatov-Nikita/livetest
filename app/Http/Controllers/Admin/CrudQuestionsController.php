<?php

namespace App\Http\Controllers\Admin;

use App\Models\Test;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrudQuestionsController extends Controller
{
    public function addShowForm($test_id) 
    {
        $test = Test::findOrFail($test_id);
        return view('layouts.primary', ['page' => 'admin.forms.addQuestions', 'test' => $test]);
    }

    public function addPost($test_id, Request $request) 
    {
        Question::create([
            'test_id' => $test_id,
            'name' => $request->input('name'),
            'active' => 1
        ]);
        return view('layouts.primary', ['page' => 'admin.pages.link', 'test_id' => $test_id]);
    }

    public function edit() 
    {

    }

    public function toggle($id) 
    {
        $test_id = session('test_id');
        $question = Question::findOrFail($id);
        $question->active ?  $question->active = 0 : $question->active = 1;
        $question->save();
        return redirect()->route('admin.showTestPage', ['id' => $test_id]);
    }
}
