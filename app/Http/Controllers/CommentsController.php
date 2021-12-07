<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Article;

class CommentsController extends Controller
{
    public function getcomments($id){
        $comments = DB::select('select * from comments where id_articles ='.$id);

        return $comments;
    }

    public function create(Request $request){

        $exist = DB::select('select * from comments where id_users ='.$request->input('id_user').' and id_articles ='.$request->input('id_article'));

        if($exist){
            DB::update('update comments set notes ='.$request->input('notes').', avis = \''.$request->input('avis').'\', id_articles = '. $request->input('id_article').', id_users = '. $request->input('id_user').'where id_users ='.$request->input('id_user').' and id_articles ='.$request->input('id_article'));
        }
        else{
            $comments = new Comment();

            $comments->notes = $request->input('notes');
            $comments->avis = $request->input('avis');
            $comments->id_articles = $request->input('id_article');
            $comments->id_users = $request->input('id_user');

            $comments->save();
        }

        return redirect()->back();
    }
}
