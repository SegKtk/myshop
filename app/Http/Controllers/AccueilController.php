<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {/*
        $articles = DB::select('select * from articles');

        return view('home', compact('articles'));
      */

      return view('welcome');
    }
}
