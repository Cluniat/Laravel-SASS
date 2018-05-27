<?php

namespace App\Http\Controllers;

use App\modeles\Categorie;
use Illuminate\Support\Facades\Session;
use Request;
use App\modeles\Client;

class ClientController extends Controller {

    /**
     * Authentifie le client
     * @return Vue formLogin ou home
     */
    public function signIn() {
	    $login = Request::input('login');
	    $pwd = Request::input('pwd');
	
	    $client = new Client();
	    $connected = $client->login($login, $pwd);
	
	    if ($connected) {
		    return view('home');
	    }
	    else {
		    $erreur = "Login ou mot de passe inconnu";
		    return view('formLogin', compact('erreur'));
	    }
    }

    /**
     * Déconnecte le visiteur authentifié
     * @return Vue home
     */
    public function signOut() {
	    $client = new Client();
	    $client->logout();
	    return view("home");
    }

    /**
     * Initialise le formulaire d'authentification
     * @return type Vue formLogin
     */
    public function getLogin() {
		$erreur = "";
		return view('formLogin', compact('erreur'));
    }

    /**
     * Initialise le formulaire de Compte
     * @return Vue formCompte
     */
    public function getCompte($erreur = '') {
        $id = Session::get('id');

        if ($id) {
            $aclient = new Client();
            $client = $aclient->getClient($id);
            $categorie = new Categorie();
            $categories = $categorie->getCategories();
            return view('formClient', compact('erreur','client','categories'));
        }
        else {
            return view('home');
        }
    }

    /**
     * Enregistre la modification du compte
     * @return route /home 
     */
    public function setCompte() {
        $id = Session::get('id');
        $identite = Request::input('identite');
        $adresse = Request::input('adresse');
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $id_categorie = Request::input('cbCategorie');


        $client = new Client();
        try{
            $client->updateClient($id, $identite, $adresse, $login, $pwd, $id_categorie);

        } catch (Exception $ex) {
            return $this->getCompte($erreur = '');
        }
        return redirect('/');

    }

}
