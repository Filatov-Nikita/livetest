<?php

namespace App\Http\Controllers\Admin;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrudTestsController extends Controller
{
    public function addShowForm() 
    {
        return view('layouts.primary', ['page' => 'admin.forms.addTests']);
    }

    public function addPost(Request $request) 
    {
        Test::create([
            'name' => $request->input('name'),
            'active' => 1
        ]);
        return view('layouts.primary', ['page' => 'admin.pages.linkTest']);
    }

    public function edit($id) 
    {
        $test = Test::findOrFail($id);
        return view('layouts.primary', ['page' => 'admin.forms.editTests', 'test' => $test]);
    }

    public function editPost($id, Request $request) 
    {
        $test = Test::findOrFail($id);
        $test->update([ 'name' => $request->input('name') ]);
        return view('layouts.primary', ['page' => 'admin.pages.linkTest', 'edit' => true]);
    }

    public function toggle($id) 
    {
        $test = Test::findOrFail($id);
        $test->active ?  $test->active = 0 : $test->active = 1;
        $test->save();
        return redirect()->route('admin.showListTests');
    }
}
