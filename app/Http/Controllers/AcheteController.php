<?php

namespace App\Http\Controllers;

use App\modeles\Achete;
use App\modeles\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AcheteController extends Controller {

    /**
     * Valide le Panier
     * Lecture de tous les articles figurant dans le panier
     * @return vue /listeAcquisitions 
     */
    public function getAchats() {
        $id_client = Session::get('id');
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $achat = new Achete();
        $achats = $achat->getAchatsFichiers($id_client);
        return view('listeAchats', compact('achats','erreur'));
    }

}
