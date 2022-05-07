<?php
include "function/function.php";
require 'function/POO-PDO.php';
getHeader('Connexion WebPOO');
if (isset($_POST['email']) && !empty($_POST['email'])){
  $email=$_POST['email']; // récupère l'email en l'associant avec $email
  $password=$_POST['password']; // récupère le mot de passe en l'associant avec $password
  $passwordSha1 = sha1($password); // Cryptage du mot de passe pour correspondre à la table tusers
  $db = new MysqlConnect();
  $Authen=$db->getOneData($email); // appelle la fonction getOneData()
  if ($db->TestMail($email)){ // si $email et $password existe dans la table tusers alors l'utilisateur sera authentifié
    $Authen=$db->getOneData($email);
    $mdp=$Authen->getPassword();
    if ($mdp==$passwordSha1){
      session_start();
      $_SESSION['user']=$_POST['email'];
      header('Location: authentification.php');
    }else echo "<p class='bg-warning text-center py-2'>Mot de passe ou identifiant erroné</p>"; // message d'erreur
  }else echo "<p class='bg-warning text-center'>Mot de passe ou identifiant erroné</p>"; // message d'erreur
}
?>
<br>
<form method='post'>
  <div class='form-group'>
  <label class='text-light' for='email'>Utilisateur (email)</label>
  <input class='form-control bg-danger btn-dark text-light' type='email' name='email' id='email'>
  </div>
  <div class='form-group'>
  <label class='text-light' for='password'>Mot de passe</label>
  <input class='form-control bg-danger btn-dark text-light' type='password' name='password' id='password'>
  </div>
  <button class='btn btn-danger mb-2'>Connexion</button>
</form>
<?php
getFooter();
?>
