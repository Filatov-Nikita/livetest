<?php

namespace App\Http\Controllers\Admin;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function showMainPage()
    {
        return view('layouts.primary', ['page' => 'admin.pages.main']);
    }

    public function showListTestsPage()
    {
        $tests = Test::get();
        return view('layouts.primary', ['page' => 'admin.pages.listTests', 'tests' => $tests]);
    }

    public function showTestPage($id)
    {
        session(['test_id' => $id]);
        $test = Test::findOrFail($id);
        return view('layouts.primary', ['page' => 'admin.pages.showTest', 'test' => $test]);
    }
}
