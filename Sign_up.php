<?php
include "function/function.php";
require 'function/POO-PDO.php';
getHeader('Rejoins WebPOO');
// récupère les informations du formulaire
if(isset($_POST)){
  if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
    $prenom = strip_tags($_POST['prenom']);
    $nom = strip_tags($_POST['nom']);
    $naissance = strip_tags($_POST['naissance']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $adresse = strip_tags($_POST['adresse']);
    $bac = strip_tags($_POST['bac']);
    $commentaire = strip_tags($_POST['commentaire']);
    $passwordSha1 = sha1($password); // Cryptage du mot de passe
    $db=new MysqlConnect();
    $data=array('', $prenom, $nom, $naissance,'ProfilDefault.png', $email, $passwordSha1, $adresse, $bac, $commentaire);
    $db->putOneData($data); // ajoute le nouvel utilisateur si il n'existe pas
    header('Location: Login.php'); // envoie à la page de connexion
  }
}
?>

<form method='post'>
  <div class='form-group'>
  <label class='text-light' for='prenom'>Prénom</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='prenom' id='prenom'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='nom'>Nom</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='nom' id='nom'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='naissance'>Date de naissance</label>
  <input class='form-control bg-danger btn-dark text-light' name="naissance" id="naissance" type="date">
  </div>
  <div class='form-group'>
  <label class='text-light' for='email'>Adresse email</label>
  <input class='form-control bg-danger btn-dark text-light' type='email' name='email' id='email'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='password'>Mot de passe</label>
  <input class='form-control bg-danger btn-dark text-light' type='password' name='password' id='password'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='adresse'>Région ou Pays d'origine</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='adresse' id='adresse'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='bac'>Bac</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='bac' id='bac'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='commentaire'>Commentaire</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='commentaire' id='commentaire'>
  </div>
  <button class='btn btn-danger mb-2'>Enregistrer</button>
</form>

<?php
getFooter();
?>
