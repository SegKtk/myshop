<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Commande;
use App\Models\Traitement;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function index(){
        $treats = DB::select('select * from traitements');
        return view('back.commandes', compact('treats'));
    }

    public function update(Request $request){
        $treats = DB::select('select * from traitements');

        foreach ($treats as $treat) {
            $conf = $request->input($treat->id_commande . 'C');
            $dateC = $request->input($treat->id_commande . 'dateC');
            $P = $request->input($treat->id_commande . 'P');
            $FS = $request->input($treat->id_commande . 'FS');
            $dateFS = $request->input($treat->id_commande . 'dateFS');
            $SS = $request->input($treat->id_commande . 'SS');
            $dateSS = $request->input($treat->id_commande . 'dateSS');
            $estLivre = $request->input($treat->id_commande . 'EL');
            $dateEL = $request->input($treat->id_commande . 'dateEL');
            $id = $treat->id_commande;

            if($request->input($treat->id_commande.'C') == "on" && $treat->confirmation == false) {
                DB::update('update traitements set confirmation = true, "dateConfirmation" = \''.$dateC.'\' where id_commande ='.$id);
            }
            if ($request->input($treat->id_commande . 'P') == "on") {
                DB::update('update traitements set preparation = true where id_commande =' . $id);
            }
            if ($request->input($treat->id_commande.'FS') == "on" && $treat->firstSend == false) {
                DB::update('update traitements set "firstSend" = true, "dateFS" = \''.$dateFS.'\' where id_commande =' . $id);
            }
            if ($request->input($treat->id_commande.'SS') == "on" && $treat->secondSend == false) {
                DB::update('update traitements set "secondSend" = true, "dateSS" =\''.$dateSS.'\'  where id_commande =' . $id);
            }
            if ($request->input($treat->id_commande.'EL') == "on" && $treat->estLivre == false) {
                DB::update('update traitements set "estLivre" = true, "dateEL" = \''.$dateEL.'\'  where id_commande =' . $id);
            }

            /*
            if($treat->confirmation == false){
                $conf = $request->input($treat-> id_commande . 'C');
                $dateC = $request->input($treat->id_commande . 'dateC');
                $FS = $request->input($treat->id_commande . 'FS');
                $dateFS = $request->input($treat->id_commande . 'dateFS');
                $SS = $request->input($treat->id_commande . 'SS');
                $dateSS = $request->input($treat->id_commande . 'dateSS');
                $estLivre = $request->input($treat->id_commande . 'EL');
                $dateEL = $request->input($treat->id_commande . 'dateEL');
                $id = $treat->id_commande;

                DB::update('update users set confirmation = '.$conf.', dateConfirmation ='. $dateC.', firstSend = '. $FS.', dateFS ='. $dateFS.', secondSend ='. $SS.', dateSS = '. $dateSS.', estLivre ='.$estLivre.' and dateEL ='. $dateEL.' where id_commande ='. $id);
            }*/

        }
        return redirect()->route('commandes');
    }
}
