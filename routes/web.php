<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

// Afficher le formulaire d'authentification 
Route::get("/getLogin", "ClientController@getLogin");

// Authentifie le client à partir du login et mdp saisis
Route::post("/signIn", "ClientController@signIn");

// Déloguer le client
Route::get("/signOut", "ClientController@signOut");

Route::group(['middleware' => ['autorise']], function() {
	// Afficher le compte du client
	Route::get("/getCompte", "ClientController@getCompte");
	// Enregistrer le compte du client
	Route::post("/validerCompte", "ClientController@setCompte");
	
	// Afficher la recherche d'Articles
	Route::get("/getRecherche", "DomaineController@getDomaines");
	// Afficher la liste des articles du domaine sélectionné
	Route::post("/listerArticles", "ArticleController@getArticles");
	// Afficher la liste des articles d'un domaine
	Route::get("/listerArticles/{id_domaine}", "ArticleController@getArticles");
	// Afficher le détail d'un Article
	Route::get("/getArticle/{id}", "ArticleController@getArticle");

	// Ajouter un article au panier
	Route::get("/addBasket/{id}", "PanierController@addBasket");
	// Afficher le Panier
	Route::get("/getBasket", "PanierController@getBasket");
	// Supprime un Article du panier
	Route::get("/deleteBasket/{id}", "PanierController@deleteBasket");
	// Valide le panier
	Route::get("/validBasket", "PanierController@validBasket");


	// Afficher la liste des articles achetés
	Route::get("/getAchats", "AcheteController@getAchats");

	//Géneration de pdf
	Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('generate-pdf');
});
