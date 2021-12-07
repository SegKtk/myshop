<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


/*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comments = DB::select('select * from comments');
        $temp_as = DB::select('select * from articles');

        $articles = DB::table('articles')->paginate(8);


        return view('home', compact('articles','comments'));

    }
    public function homeH(){
        $comments = DB::select('select * from comments');

        $articles = DB::table('articles')->where('id_typeArticle', '=', '1')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function homeF()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_typeArticle', '=', '2')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function homeE()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_typeArticle', '=', '3')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }

    public function getHabit()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '1')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getHabitH()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '1')->where('id_typeArticle','=','1')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getHabitF()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '1')->where('id_typeArticle', '=', '2')->paginate(8);

        return view('home', compact('articles', 'comments'));

    }
    public function getHabitE()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '1')->where('id_typeArticle', '=', '3')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getPan()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '2')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getPanH()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '2')->where('id_typeArticle', '=', '1')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getPanF()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '2')->where('id_typeArticle', '=', '2')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getPanE()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '2')->where('id_typeArticle', '=', '3')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getChau()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '3')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getChauH()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '3')->where('id_typeArticle', '=', '1')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getChauF()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '3')->where('id_typeArticle', '=', '2')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }
    public function getChauE()
    {
        $comments = DB::select('select * from comments');
        $articles = DB::table('articles')->where('id_categorie', '=', '3')->where('id_typeArticle', '=', '3')->paginate(8);

        return view('home', compact('articles', 'comments'));
    }

    public function searchArticle(Request $request){

        $comments = DB::select('select * from comments');
        $articles = DB::select('select * from articles where nom like \'%'. $request->input('search'). '%\'');

        return view('home', compact('articles', 'comments'));
    }
}
