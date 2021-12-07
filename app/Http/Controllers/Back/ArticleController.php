<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateArticleRequest;
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
    public function store(CreateArticleRequest $request)
    {
        $article = new Article;
        $x = DB::table('articles')->count();
        

        $article->nom = $request->input('nom');
        $article->prix = $request->input('prix');
        $article->description = $request->input('description');
        $article->qte_stock = $request->input('qte_stock');
        $article->id_typeArticle = $request->get('type_articles');
        $article->id_categorie = $request->get('categories');

        $ext1 = $request->file('photo1')->extension();
        $ext2 = $request->file('photo2')->extension();

        $article->photo1 = asset('/storage/articles/'.$x.'1.'.$ext1);
        $article->photo2 = asset('/storage/articles/'.$x.'2.'.$ext2);

        //$xx = $article->type_articles;
        //$article1 = $request->all();

        $request->file('photo1')->storeAs(
            'articles',
            $x.'1.'.$ext1,
            'public'
        );
        $request->file('photo2')->storeAs(
            'articles',
            $x.'2.'.$ext2,
            'public'
        );


        $article->save();

        return back()->with('info', 'Un article vient d\'être ajouté à la boutique');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
        Article::destroy($id);
       // DB::delete('delete articles where id ='.$id);

        return back()->with('info-red', 'L\'article '.$id.' vient d\'être supprimé');
    }
}
