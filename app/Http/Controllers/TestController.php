<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        // エロクアント
        // $tests = Test::all();

        // クエリビルダー
        $tests = DB::table('tests')->select('id', 'text')->get();

        return view('tests.test', compact('tests'));
    }
}
