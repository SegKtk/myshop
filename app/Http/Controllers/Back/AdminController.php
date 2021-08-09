<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::select('select * from users');

        return view('back.index',compact('users'));
    }
    public function getArticle()
    {
        $categories = DB::select('select * from categories');
        $types = DB::select('select * from type_articles');
        $articles = DB::select('select * from articles');

        return view('back.articles', compact('categories','articles','types'));
    }
    public function getCommande()
    {
        return view('back.commandes');
    }


}
