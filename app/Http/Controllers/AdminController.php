<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listTests()
    {
        $tests = Test::get();
        return view('admin.listTests', ['tests' => $tests]);
    }
}
