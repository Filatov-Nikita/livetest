<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  
    protected $fillable = ['name', 'test_id', 'active'];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }
}
