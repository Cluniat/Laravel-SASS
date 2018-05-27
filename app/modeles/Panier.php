<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Panier extends Model {

	private $basket;
	private $totalPanier;

	public function __construct() {
		parent::__construct();
		$this->basket = Session::get('basket');
	}

	public function getTotalPanier() {
		return $this->totalPanier;
	}

	/**
	 * Ajoute l'article au Panier s'il
	 * n'y est pas déjà
	 * @param int $id_article
	 * @return boolean : vrai si l'ajout s'est fait, faux sinon
	 */
	public function ajoutPanier($id_article) {
		$existe = $this->dansPanier($id_article);
		if (!$existe) {
			$this->basket[] = $id_article;
			$this->refreshTotal();
			Session::put('basket', $this->basket);
		} else {
			$erreur = "Cet article est déjà dans votre panier";
			Session::put('erreur',$erreur);
		}
		return $existe;
	}

	/**
	 * Retourn vrai si un article est déjà présent
	 * dans le panier sinon retourne faux
	 * @param int $id_article : id de l'article à rechercher
	 * @return boolean
	 */
	private function dansPanier($id_article) {
		if ($this->basket == null)
			return false;
		
		$exist = false;
		for ($i = 0; $i < sizeof($this->basket) && !$exist; $i++)
			if ($this->basket[$i] == $id_article)
				$exist = true;
		
		return $exist;
	}

	/**
	 * Supprime un Article du Panier
	 * @param int $id_article
	 */
	public function supprimePanier($id_article) {
		unset($this->basket[array_search($id_article, $this->basket)]);
		$this->refreshTotal();
		Session::put('basket', $this->basket);
	}

	/**
	 * Récupère les articles du panier
	 * @return array d'Articles
	 */
	public function getPanier() {
		$articles = array();
		$article = new Article();
		$this->totalPanier = 0;
		foreach ($this->basket as $id_article) {
			$art = $article->getArticle($id_article);
			$articles[] = $art;
			$this->totalPanier += $art->prix;
		}
		return $articles;
	}
	
	/**
	 * Rafraichit le total des articles dans le paniers
	 * @return int Le prix total de tous les articles dans le panier actuellement
	 */
	public function refreshTotal() {
		$article = new Article();
		$this->totalPanier = 0;
		foreach ($this->basket as $id_article) {
			$art = $article->getArticle($id_article);
			$this->totalPanier += $art->prix;
		}
		return $this->totalPanier;
	}

	/**
	 * Vide totalement le panier
	 */
	public function videPanier() {
		Session::forget('basket');
	}

}
