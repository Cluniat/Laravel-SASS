<?php

namespace App\Http\Controllers;

use App\modeles\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DomaineController extends Controller
{
    /**
     * Récupère la liste des domaines
     * @return vue /listeArticles
     */
    public function getDomaines() {
        $erreur = Session::get('erreur');
        Session::forget('erreur');

        $domaine = new Domaine();
        $domaines = $domaine->getDomaines();
        return view('formRecherche', compact('domaines','erreur'));
    }
}
