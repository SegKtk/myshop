<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Panier;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $lists = array();// Va contenir la liste des articles dans un panier
        $STT = 0;
        $count = DB::table('paniers')
            ->where('id_users',$id)
            ->count(); //le nombre d'articles dans un panier

        $exist = DB::select('select * from commandes where id_users = '.$id);
        if ($exist) {
            $existe = true;
        }
        else {
            $existe = false;
        }
        $panier_articles = DB::select('select * from paniers where id_users = '.$id);

        $articles = DB::select('select * from articles');

        foreach ($panier_articles as $panier) {
            foreach ($articles as $a) {
                if ($panier->id_articles == $a->id) {
                    array_push($lists,$a);
                }
            }
        }
        foreach ($lists as $list) {
            foreach ($panier_articles as $pa) {
                if ($pa->id_articles == $list->id) {
                    $STT += $list->prix * $pa->quantite;
                    break;
                }

            }
        }
        /*
        foreach ($lists as $list) {
            $STT += $list->prix;
        }*/


        return view('panier', compact('count','lists','STT','panier_articles','existe'));

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
        $panier_articles = DB::select('select * from paniers where id_users = ?',[$id]);

        foreach ($panier_articles as $pa) {
            DB::update('update paniers set quantite = ? where id_articles = ?', [$request->input($pa->id_articles), $pa->id_articles]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addArticle(Request $request)
    {
        $id_article = $request->id_article;
        $id_user = $request->id_user;

        $exist = DB::select('select * from paniers where id_users ='.$id_user.' and id_articles ='. $id_article);

        foreach ($exist as $e) {
            $x = $e->quantite;
        }

        if ($exist) {
            $c = $x + 1;
            DB::update('update paniers set quantite = '.$c.' where id_articles = '.$id_article.' and id_users = '.$id_user);
        }
        if(!$exist){
            DB::insert('insert into paniers (id_users, id_articles, quantite) values (?,?,?)', [$id_user, $id_article, 1]);
        }

        return redirect()->back();
    }

    public function adds(Request $request)
    {
        $id_article = $request->id_article;
        $id_user = $request->id_user;
        $nbre = $request->nbre;

        $exist_dja = DB::select('select * from paniers where id_users =' . $id_user . ' and id_articles =' . $id_article);


        if ($exist_dja) {
            DB::update('update paniers set quantite = ' . $nbre . ' where id_articles = ' . $id_article . ' and id_users = ' . $id_user);
        }
        if (!$exist_dja) {
            DB::insert('insert into paniers (id_users, id_articles, quantite) values (?,?,?)', [$id_user, $id_article, $nbre]);
        }

        return redirect()->back();;
    }

    public function erasePanier($id){

        Panier::where('id_users', $id)->delete();
        return redirect()->route('panier.show',[$id]);
    }

    public function deleteInPanier($id, $id_a){

        DB::delete('delete from paniers where id_users = '.$id.' and id_articles = '.$id_a);
        return redirect()->route('panier.show', [$id]);

    }

}
