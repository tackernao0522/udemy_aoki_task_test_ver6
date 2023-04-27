<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function index()
    {
        $tests = Test::find()->all();
        dd($tests);
    }
}
