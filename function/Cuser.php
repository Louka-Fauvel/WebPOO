<?php

class Cuser {

	private $id; //On créé un membre privé id
	private $prenom; //On créé un membre privé prenom
	private $nom; //On créé un membre privé nom
	private $naissance; //On créé un membre privé naissance
	private $photo; //On créé un membre privé photo
	private $email; //On créé un membre privé email
	private $password; //On créé un membre privé password
	private $adresse; //On créé un membre privé adresse
	private $bac; //On créé un membre privé bac
	private $commentaire; //On créé un membre privé commentaire


	public function __construct(array $donnees){ //Constructeur de la classe Cuser array est un tableau
												// contenant les données d'un utilisateur (id, prenom, nom, naissance, photo, email, password, adresse, bac, commentaire)
		$this->id=$donnees['id']; //On attribue au membre id la valeur d'index id du tableau associatif $donnees
		$this->prenom=$donnees['prenom']; //On attribue au membre prenom la valeur d'index prenom du tableau $donnees
		$this->nom=$donnees['nom']; //On attribue au membre nom la valeur d'index nom du tableau $donnees
		$this->naissance=$donnees['naissance']; //On attribue au membre naissance la valeur d'index naissance du tableau $donnees
		$this->photo=$donnees['photo']; //On attribue au membre photo la valeur d'index photo du tableau $donnees
		$this->email=$donnees['email']; //On attribue au membre email la valeur d'index email du tableau $donnees
		$this->password=$donnees['password']; //On attribue au membre password la valeur d'index password du tableau $donnees
		$this->adresse=$donnees['adresse']; //On attribue au membre contenu la valeur d'index contenu du tableau $donnees
		$this->bac=$donnees['bac']; //On attribue au membre bac la valeur d'index bac du tableau $donnees
		$this->commentaire=$donnees['commentaire']; //On attribue au membre commentaire la valeur d'index commentaire du tableau $donnees

	}

	// Les getters sont des fonctions publique qui vont chercher et retourner les valeurs des données membres private
	public function getId() {
		return $this->id;
	}
	public function getPrenom(){
		return $this->prenom;
	}
	public function getNom(){
		return $this->nom;
	}

	public function getNaissance(){
		return $this->naissance;
	}
	public function getPhoto(){
		return $this->photo;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}

	public function getAdresse() {
		return $this->adresse;
	}
	public function getBac(){
		return $this->bac;
	}
	public function getCommentaire(){
		return $this->commentaire;
	}
	//Setters

	public function setId($id) {
		$this->id = $id; // le setId va chercher du dehors une nouvelle valeur qui va initialiser la donnée membre private
	}

	public function setNom($nom){
		$this->nom=$nom;
	}
}
?>
