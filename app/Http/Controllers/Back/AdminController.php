<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\typeArticle;

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
    public function speeder(){
        $c1 = new Category();
        $c2 = new Category();
        $c3 = new Category();
        $t1 = new typeArticle();
        $t2 = new typeArticle();
        $t3 = new typeArticle();

        $c1->nom = "Habits"; $c1->save();
        $c2->nom = "Pantalon"; $c2->save();
        $c3->nom = "Chaussures"; $c3->save();

        $t1->nom = "Hommes"; $t1->save();
        $t2->nom = "Femmes"; $t2->save();
        $t3->nom = "Enfants"; $t3->save();
    }


}
