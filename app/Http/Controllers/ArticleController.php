<?php

namespace App\Http\Controllers;

use Request;
use App\modeles\Article;
use App\modeles\Domaine;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller {

    /**
     * Initialise le formulaire de Recherche
     * @return Vue formRecherche
     */
    public function getRecherche($erreur = '') {

    }

    /**
     * Récupère la liste des articles du domaine
     * sélectionné dans formRecherche
     * @param int $id : id du domaine ou rien
     * @return vue /listeArticles 
     */
    public function getArticles($id_domaine = '') {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        if(!$id_domaine)
            $id_domaine = Request::input('cbDomaine');
        if($id_domaine){
            $article = new Article();
            $articles = $article->getArticles($id_domaine);
            $adomaine = new Domaine();
            $domaine = $adomaine->getDomaine($id_domaine);
            return view('listeArticles', compact('articles','domaine','erreur'));
        }else{
            $erreur = "Il faut selectionner un domaine !";
            Session::put('erreur',$erreur);
            return redirect('/getRecherche');
        }
    }

    /**
     * Lecture d'un Article sur son id
     * @param int $id : id de l'article
     * @return vue /detailArticle 
     */
    public function getArticle($id) {
       $erreur = Session::get('erreur');
       Session::forget('erreur');
       $anarticle = new Article();
       $article = $anarticle->getArticle($id);
       return view('detailArticle', compact('article','erreur'));
    }

}
