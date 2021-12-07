<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Commande;
use App\Models\Traitement;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Storage;

class CommandeController extends Controller
{

    public function showState($id){

        $cmds = DB::select('select * from commandes where id_users = ?', [$id]);
        $treats = null;
        $cible = null;
        foreach ($cmds as $cmd) {
            $cible = $cmd->id;
        }
        if ($cmds) {
            $treats = DB::select('select * from traitements where id_commande = ' . $cible);
        }

        return view('commande', compact('treats','cible'));

    }

    public function create(Request $request){

        $lists = array(); // Va contenir la liste des articles dans un panier
        $STT = 0;
        $panier_articles = DB::select('select * from paniers where id_users = ' . $request->input('id_users'));

        $articles = DB::select('select * from articles');

        foreach ($panier_articles as $panier) {
            foreach ($articles as $a) {
                if ($panier->id_articles == $a->id) {
                    array_push($lists, $a);
                }
            }
        }
        $listIdA = array();
        $listQtA = array();
        foreach ($panier_articles as $panier) {
            array_push($listIdA, $panier->id_articles);

        }
        foreach ($panier_articles as $panier) {
            array_push($listQtA, $panier->quantite);
        }
        foreach ($lists as $list) {
            foreach ($panier_articles as $pa) {
                if ($pa->id_articles == $list->id) {
                    $STT += $list->prix * $pa->quantite;
                    break;
                }
            }
        }

        $exist = DB::select('select * from commandes where id_users = ?', [$request->input('id_users')]);
        if($exist)
        {
            return back();
        }
        else {
            if($request->input('transaction-status') == "approved"){
                $commande = new Commande;
                $treat = new Traitement;
                $commande->prix_total = $request->input('prix_total');
                $commande->id_users = $request->input('id_users');

                $commande->save();

                $treat->id_commande = $commande->id;
                //$treat->dateConfirmation = date("Y-m-d H:i:s");
                $treat->save();

                $posts = array(
                    $commande->id => array(
                        'Articles' => $listIdA,
                        'Quantites' => $listQtA,
                        'TOTAL' => $STT,
                        'Traitement_Fini' => "false"
                    )

                );
                $json_data = json_encode($posts);
                file_put_contents('myfile.json', $json_data);
                $file = file('myfile.json');

                DB::update('update traitements set confirmation = true, "dateConfirmation"=\''.date("Y-m-d").'\' where id_commande ='.$commande->id);

                return redirect()->back();
            }else{
                flash('Echec du paiement. Votre commande ne sera pas prise en charge !!')->error();

                return redirect()->back();
            }
        }
    }

}



/*

$data = '{
    "data": {
        "1001": {
            "name": "Bottes de vitesse",
            "description": "<groupLimit>Limité à 1 paire de bottes.</groupLimit><br><br><unique>Propriété passive UNIQUE - Déplacements améliorés :</unique> +25 vitesse de déplacement",
            "image": {
                "full": "1001.png",
                "sprite": "item0.png",
                "group": "item",
                "x": 0,
                "y": 0,
                "w": 48,
                "h": 48
            }
        },
        "1002": {
            "name": "Bottes de promenade",
            "description": "<groupLimit>Limité à 2 paires de bottes.</groupLimit><br><br><unique>Propriété passive UNIQUE - Déplacements améliorés :</unique> +25 vitesse de déplacement",
            "image": {
                "full": "1002.png",
                "sprite": "item0.png",
                "group": "item",
                "x": 0,
                "y": 0,
                "w": 48,
                "h": 48
            }
        }
    },
    "Commande0": {
        "id_article": 45,
        "qte": 78,
        "TOTAL": 472158
    }
}';
*/

/* print_r($file);

                Storage::put('Commandes/' . $request->input('id_users') . '.json', $json_data);

                return '<h1> Bien Joué </h1>' . $treat->id_commandes;

                $tpcs = DB::select('select * from commandes where id_users = ' . $request->input('id_users'));

                foreach ($tpcs as $tpc) {
                    if ($tpc->id_users == $request->input('id_users')) {
                        $find_id_commande = $tpc->id;
                    }
                }

                $tpts = DB::select('select * from traitements where id_commande =' . $find_id_commande);
                foreach ($tpts as $tpt) {
                    if ($tpt->confirmation == false) {
                        return back()->with('transac_no', 'Le paiement est toujours en cours');
                    }
                }*/
