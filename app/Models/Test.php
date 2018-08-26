<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name', 'active'];

    public function questions() 
    {
        return $this->hasMany('App\Models\Question');
    }
}
