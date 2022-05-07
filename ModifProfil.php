<?php
session_start();
include "function/function.php";
require 'function/POO-PDO.php';
getHeader('WebPOO : Modifier le profil');
$Profil=$_SESSION['user'];
$db = new MysqlConnect();
$DonneesProfil=$db->getOneData($Profil); // Récupère les données de l'utilisateur
if(isset($_POST)){
  if(empty($_FILES['photo']['name'])){ // Si pas de nouvelle photo
    $_FILES['photo']['name']=$DonneesProfil->getPhoto(); // Le système garde l'ancienne photo
  }
  if(empty($_POST['password'])){ // Si pas de nouveau mot de passe
    $Password = $_POST['password']=$DonneesProfil->getPassword(); // Le système garde l'ancien mot de passe
  }
  else { // Si nouveau mot de passe
    $Password = sha1($_POST['password']); // Le mot de passe doit être crypté
  }
  if(isset($_POST['prenom']) && !empty($_POST['prenom'])){ // Met à jour le profil
    $photo = strip_tags($_FILES['photo']['name']);
    $prenom = strip_tags($_POST['prenom']);
    $nom = strip_tags($_POST['nom']);
    $naissance = strip_tags($_POST['naissance']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($Password);
    $adresse = strip_tags($_POST['adresse']);
    $bac = strip_tags($_POST['bac']);
    $commentaire = strip_tags($_POST['commentaire']);
    $id = strip_tags($_POST['id']);
    $db=new MysqlConnect();
    $data=array($id,$prenom, $nom, $naissance, $photo, $email, $password, $adresse, $bac, $commentaire);
    $db->ModifierProfil($data);
    move_uploaded_file($_FILES['photo']['tmp_name'],'Imagedeprofil/'.$photo); // Enregistre la photo de profil dans l'espace Imagedeprofil
    header('Location: Profil.php');
  }
}
?>
<br>
<div class="bg-dark py-3 px-5">
<form method='post' enctype="multipart/form-data">
  <div class='form-group'>
  <label class='text-light'>Photo</label><br>
  <img src='Imagedeprofil/<?php echo $DonneesProfil->getPhoto();?>' style='width:150px; height:auto' class='rounded img-fluid'></img>
  <input class='bg-danger btn-dark ml-2' type="file" id="photo" name="photo" accept="image/png, image/jpeg">
  </div>
  <div class='form-group'>
  <label class='text-light' for='prenom'>Prénom</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='prenom' id='prenom' value="<?php echo $DonneesProfil->getPrenom();?>">
  </div>
  <div class='form-group'>
  <label class='text-light' for='nom'>Nom</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='nom' id='nom' value="<?php echo $DonneesProfil->getNom();?>">
  </div>
  <div class='form-group'>
  <label class='text-light' for='naissance'>Date de naissance</label>
  <input class='form-control bg-danger btn-dark text-light' name="naissance" id="naissance" type="date" value="<?php echo $DonneesProfil->getNaissance();?>">
  </div>
  <div class='form-group'>
  <label class='text-light' for='email'>Adresse mail</label>
  <input class='form-control bg-danger btn-dark text-light' type='email' name='email' id='email' value="<?php echo $DonneesProfil->getEmail();?>">
  </div>
  <div class='form-group'>
  <label class='text-light' for='password'>Mot de passe</label>
  <input class='form-control bg-danger btn-dark text-light' type='password' name='password' id='password'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='adresse'>Région ou Pays d'origine</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='adresse' id='adresse' value="<?php echo $DonneesProfil->getAdresse();?>">
  </div>
  <div class='form-group'>
  <label class='text-light' for='bac'>Bac</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='bac' id='bac' value="<?php echo $DonneesProfil->getBac();?>">
  </div>
  <div class='form-group'>
  <label class='text-light' for='commentaire'>Commentaire</label>
  <input class='form-control bg-danger btn-dark text-light' type='text' name='commentaire' id='commentaire' value="<?php echo $DonneesProfil->getCommentaire();?>">
  </div>
  <input type='hidden' name='id' id="id" value="<?php echo $DonneesProfil->getId();?>">
  <button class='btn btn-danger mb-2'>Modifier</button>
</form>
</div>
<?php
getFooter();
?>
