<?php
require 'Cuser.php'; //On inclut la classe
class MysqlConnect{
	// la donnée membre privée (private)
	private $pdo;
	// constructeur initialise la donnée membre
	function __construct(){ // constructeur de la classe MysqlConnect
	try {
		// initialisation de $pdo avec une connexion à localhost et mabase_fl
		  $this->pdo = new PDO("mysql:host=localhost;dbname=mabase_fl","root","");
		  // set the PDO error mode to exception: pour gérer l'erreur de connexion
		  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // traitement de l'erreur
		} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();}
	return $this->pdo;} // constructeur retourne la variable de connexion

	// getteur permet de récupérer la valeur de la variable de connexion
	function getPdo(){
	return $this->pdo;}

	// Fonction qui permet de retourner la liste de tous les objets Cuser instanciés
	// à partir des données récupérées dans la table tusers
	function getAllData(){

		$req=$this->pdo->query('SELECT * FROM tusers ORDER BY prenom');
		$result=$req->fetchAll(); //On stock les résultats dans un tableau
				$retour=array(); //On créé une liste vide

		foreach($result as $value){ //Pour chaque valeur dans le tableau result
					array_push($retour,new Cuser($value)); //On ajoute à la liste retour un nouveau utilisateur
				}
		return $retour; // on retourne le tableau d'objets...
		}
	// Fonction qui permet de filtrer la liste de tous les objets Cuser instanciés
	// à partir des données récupérées dans la table tusers
	function getFiltreData($filtre, $ChoixFiltrage){

		$req=$this->pdo->query("SELECT * FROM tusers WHERE $ChoixFiltrage LIKE '%".$filtre."%' ORDER BY prenom");
	  $result=$req->fetchAll();
			$retour=array();
		foreach($result as $value){ //Pour chaque valeur dans le tableau result
					array_push($retour,new Cuser($value)); //On ajoute à la liste retour un nouveau utilisateur
				}
		return $retour; // on retourne le tableau d'objets...
	}
	// Fonction qui récupère les données d'un utilisateur dont on connait le $email et instancie l'objet utilisateur de nom $email
	function getOneData($email){
		// exécution de la requête de sélection de l'utilisateur:
		$req=$this->pdo->query("SELECT * FROM tusers WHERE email= '$email'");
		// récupération du tableau associatif contenant les données de l'utilisateur:
		$result = $req->fetch(PDO::FETCH_ASSOC);
		//Instanciation d'un objet Cuser à partir du tableau des données $result
		$leUser=new Cuser($result);
		return $leUser;}

	// Fonction qui insère un nouveau utilisateur à partir d'un tableau de données
	function putOneData($donnees){
		// requête d'insertion d'un nouveau utilisateur
		$sql = "INSERT INTO tusers (id, prenom, nom, naissance, photo, email, password, adresse, bac, commentaire) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$st= $this->pdo->prepare($sql);print_r($donnees);
		$st->execute($donnees);}

		// Fonction qui permet de savoir si l'email récupéré existe dans la table tusers
		function TestMail($email){
			// exécution de la requête de sélection de l'utilisateur:
			$req=$this->pdo->query("SELECT * FROM tusers WHERE email= '$email'");
			// récupération du tableau associatif contenant les données de l'utilisateur:
			$result = $req->fetch(PDO::FETCH_ASSOC);
			if(!empty($result)){
				return true;
			}else return false;
		}
		// Fonction qui permet de modifier le profil d'un utilisateur contenu dans la table tusers
		function ModifierProfil($donnees){
			// requête de mise à jour d'un utilisateur
			$sql = "UPDATE tusers SET prenom=:prenom, nom=:nom, naissance=:naissance, photo=:photo, email=:email, password=:password, adresse=:adresse, bac=:bac, commentaire=:commentaire WHERE id=:id";
			$query = $this->pdo->prepare($sql);
			// association des données contenues dans la liste $donnees avec les données de la requête ci-dessus
			$query->bindValue(':prenom', $donnees[1], PDO::PARAM_STR);
			$query->bindValue(':nom', $donnees[2], PDO::PARAM_STR);
			$query->bindValue(':naissance', $donnees[3], PDO::PARAM_STR);
			$query->bindValue(':photo', $donnees[4], PDO::PARAM_STR);
			$query->bindValue(':email', $donnees[5], PDO::PARAM_STR);
			$query->bindValue(':password', $donnees[6], PDO::PARAM_STR);
			$query->bindValue(':adresse', $donnees[7], PDO::PARAM_STR);
			$query->bindValue(':bac', $donnees[8], PDO::PARAM_STR);
			$query->bindValue(':commentaire', $donnees[9], PDO::PARAM_STR);
			$query->bindValue(':id', $donnees[0], PDO::PARAM_INT);

			$query->execute();
		}
}
// Fonction d'affichage du profil de l'utilisateur connecter
function TestUnique($Profil){
// Connexion
$db=new MysqlConnect(); // instanciation de la connexion
// récupération de l'objet Cuser correspondant au contenu de $Profil
$client=$db->getOneData($Profil);
echo "<br><table class='table table-dark table-hover'>
			<thead>
				<th class='text-center text-light'>Photo</th>
				<th class='text-center text-light'>Prénom</th>
				<th class='text-center text-light'>Nom</th>
				<th class='text-center text-light'>Date de naissance</th>
				<th class='text-center text-light'>Email</th>
				<th class='text-center text-light'>Région ou Pays d'origine</th>
				<th class='text-center text-light'>Bac</th>
				<th class='text-center text-light'>Commentaire</th>
			</thead>
			<tbody>
			<tr>
				<td class='text-center'>"; // affichage du profil de l'utilisateur connecter
echo"			<img src='Imagedeprofil/".$client->getPhoto()."' style='width:200px; height:auto' class='rounded img-fluid'>";
echo "		</img>";
echo "	</td>";
echo "	<td class='text-center text-light'>";
echo "		<a>";
echo $client->getPrenom();
echo "		</a>";
echo "	</td>";
echo "	<td class='text-center text-light'>";
echo "		<a>";
echo $client->getNom();
echo "		</a>";
echo "	</td>";
echo "	<td class='text-center text-light'>";
echo "		<a>";
echo $client->getNaissance();
echo "		</a>";
echo "	</td>";
echo "	<td class='text-center text-light'>";
echo "		<a>";
echo $client->getEmail();
echo "		</a>";
echo "	</td>";
echo "	<td class='text-center text-light'>";
echo "		<a>";
echo $client->getAdresse();
echo "		</a>";
echo "	</td>";
echo "	<td class='text-center text-light'>";
echo "		<a>";
echo $client->getBac();
echo "		</a>";
echo "	</td>";
echo "	<td class='text-center text-light'>";
echo "		<a>";
echo $client->getCommentaire();
echo "		</a>";
echo "	</td>";
echo"</tr>";
echo"</tbody>
</table>";
echo "<a class='btn btn-warning mb-2' href='ModifProfil.php'>Modifier le profil</a>";
}
// Fonction de TEST pour ajouter un utilisateur dans la table tusers (n'est plus utilisée)
function TestAjouter(){
// TEST pour ajouter un utilisateur dans la table tusers:
//création du tableau des données d'un utilisateur
$db=new MysqlConnect(); // instanciation de la connexion
$data=array(15,'Louka','Fauvel','2001-10-15','profilLouka','louka.fauvel@gmail.com','1a2z3e','Caen','Bac STI2D','Je vous vois');
$db->putOneData($data);
}
// Fonction qui permet d'afficher tous les utilisateurs
function TestAffichage($choix){
// récupération de tous les utilisateurs de la table tusers sous forme d'une liste d'objets Cuser
$db=new MysqlConnect(); // instanciation de la connexion
$retourData=$db->getAllData();
// affichage pour chaque objet Cuser du tableau $retourData:
echo "<br><h2 class='text-light'>Liste de tous les étudiants</h2><br>";
// condition qui permet de savoir si l'utilisateur est connecté ou non
if($choix==true){
	$visibilité='visible'; // utilisateur connecté
} else $visibilité='invisible'; // utilisateur non connecté donc cache certaines informations

if(isset($_POST['chaine'])){// Il permet de filtrer la liste des étudiants
  $filtre=$_POST['chaine'];
	$ChoixFiltrage=$_POST['ChoixFiltrage'];
	$retourData=$db->getFiltreData($filtre, $ChoixFiltrage);
}
	echo "<form method='post'>
				<div class='form-group input-group mb-3 w-50'>
  			<input type='text' class='form-control bg-warning btn-warning' placeholder='. . .' name='chaine' id='chaine'>
				<select class='custom-select bg-warning btn-warning' id='ChoixFiltrage' name='ChoixFiltrage'>
      		<option value='prenom'>Prénom</option>
      		<option value='nom'>Nom</option>
      		<option class='$visibilité' value='naissance'>Date de naissance</option>
      		<option class='$visibilité' value='adresse'>Région ou Pays d'origine</option>
      		<option class='$visibilité' value='bac'>Bac</option>
    		</select>
  			<div class='input-group-append'>
    		<button class='btn btn-outline-warning'>Recherche</button>
  			</div>
				</div>
				</form>";

	echo "<table class='table table-dark table-hover'>
				<thead>
					<th class='text-center text-light'><a>Photo</a></th>
					<th class='text-center text-light'><a>Prénom</a></th>
					<th class='text-center text-light'><a>Nom</a></th>";
echo"			<th class='text-center text-light'><a class='$visibilité'>Date de naissance</a></th>";
echo"			<th class='text-center text-light'><a class='$visibilité'>Région ou Pays d'origine</a></th>";
echo"			<th class='text-center text-light'><a class='$visibilité'>Bac</a></th>";
echo"			<th class='text-center text-light'><a class='$visibilité'>Commentaire</a></th>";
echo"		</thead>
				<tbody>";
	foreach($retourData as $cli){ //Pour chaque valeur afficher:
		echo "<tr>";
		echo "	<td class='text-center'>";
		echo "		<img src='Imagedeprofil/".$cli->getPhoto()."' alt='".$cli->getPhoto()."' style='width:150px; height:auto' class='rounded img-fluid'>";
		echo "		</img>";
		echo "	</td>";
		echo "	<td class='text-center text-light'>";
		echo "		<a>";
		echo $cli->getPrenom(); // avec le getteur sur le prenom d'un utilisateur
		echo "		</a>";
		echo "	</td>";
		echo "	<td class='text-center text-light'>";
		echo "		<a>";
		echo $cli->getNom(); // avec le getteur sur le nom d'un utilisateur
		echo "		</a>";
		echo "	</td>";
		echo "	<td class='text-center text-light'>";
		echo "		<a class='$visibilité'>";
		echo $cli->getNaissance(); // avec le getteur sur la date de naissance d'un utilisateur
		echo "		</a>";
		echo "	</td>";
		echo "	<td class='text-center text-light'>";
		echo "		<a class='$visibilité'>";
		echo $cli->getAdresse(); // avec le getteur sur l'adresse d'un utilisateur
		echo "		</a>";
		echo "	</td>";
		echo "	<td class='text-center text-light'>";
		echo "		<a class='$visibilité'>";
		echo $cli->getBac(); // avec le getteur sur le bac d'un utilisateur
		echo "		</a>";
		echo "	</td>";
		echo "	<td class='text-center text-light'>";
		echo "		<a class='$visibilité'>";
		echo $cli->getCommentaire();// avec le getteur sur le commentaire d'un utilisateur
		echo "		</a>";
		echo "	</td>";
		echo"</tr>";}
	echo"</tbody>
	</table>";
}
?>
