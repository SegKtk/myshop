<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Article;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = DB::select('select * from comments where id_articles =' . $id);
        $users = DB::select('select * from users');
        $nbr_avis = 0;

        foreach ($comments as $c) {
            $nbr_avis++;
        }

        $articles = DB::select('select * from articles where id = ?', [$id]);
        foreach ($articles as $a) {
            $categorie = $a->id_categorie;
        }
        $similar_article = DB::select('select * from articles where id_categorie = '.$categorie.' order by random() limit 4');
        $ctgs = DB::select('select * from categories');
        $types = DB::select('select * from type_articles');


        return view('ficheProduit', compact('articles','ctgs', 'types','comments', 'users', 'nbr_avis','similar_article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
