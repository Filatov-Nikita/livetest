<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'tests_results';
    protected $fillable = ['test_id', 'total', 'correct', 'uncorrect', 'user_id'];

    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }
}
