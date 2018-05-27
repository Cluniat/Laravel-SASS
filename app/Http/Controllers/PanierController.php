<?php

namespace App\Http\Controllers;

use App\modeles\Achete;
use App\modeles\Client;
use App\modeles\Panier;
//use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller {

	// TODO: The following has not been tested yet!
	
    /**
     * Ajoute un article au panier
     * @param int $id : id de l'article à ajouter au panier
     * @return Redirection sur getBasket
     */
    public function addBasket($id_article) {
        $panier = new Panier();
        $panier->ajoutPanier($id_article);
        return redirect('getBasket');
	    //return view("listePanier");
    }

    /**
     * Supprime un article du panier
     * @param int $id : id de l'article à supprimer du panier
     * @return Redirection sur getBasket
     */
    public function deleteBasket($id_article) {
        $panier = new Panier();
        $panier->supprimePanier($id_article);
        return redirect('getBasket');
        //return view("listePanier");
    }

    /**
     * Affiche le Panier
     * Lecture de tous les articles figurant dans le panier
     * @return vue /listePanier
     */
    public function getBasket() {
        $erreur = Session::get('erreur');
        Session::forget('erreur');

        $panier = new Panier();
        $paniers = $panier->getPanier();
        $total = $panier->getTotalPanier();
        return view('listePanier', compact('paniers','total','erreur'));
    }

    /**
     * Valide le Panier
     * Lecture de tous les articles figurant dans le panier
     * @return vue /listPanier ou redurection vers /getAchats
     */
    public function validBasket() {
        $id = Session::get('id');
        $client = new Client();

        $panier = new Panier();
        $paniers = $panier->getPanier();
        $total = $panier->getTotalPanier();

        if($total == 0){
            $erreur = "Votre panier est vide.";
            Session::put('erreur',$erreur);
            return redirect("getBasket");
        }

        //Gestion des articles du panier presents dans les achats déjà effectués
        $achat = new Achete();
        $achats = $achat->getAchats($id);
        foreach ($achats as $anAchat) {
            foreach ($paniers as $anArticle){
                if($anAchat->id_article == $anArticle->id_article){
                    $erreur = "Vous possedez déjà un article de votre panier. Supprimez le avant de poursuivre.";
                    Session::put('erreur',$erreur);
                    return redirect("getBasket");
                }
            }
        }

        if($client->verifieSolvabilite($id,$total)){
            $achete = new Achete();
            try {
                $achete->ajoutArticles($id, $paniers);
                $client->defalqueMontant($id,$total);
                $panier->videPanier();
                return redirect("getAchats");
            } catch (\Exception $e) {
                $erreur = $e->getMessage();
                Session::put('erreur',$erreur);
                return redirect("getBasket");
            }

        }else{
            $erreur = "Votre solde n'est pas suffisant pour valider ce panier";
            Session::put('erreur',$erreur);
            return redirect("getBasket");
        }
    }
}
