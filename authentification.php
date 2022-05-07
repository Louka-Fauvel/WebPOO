<?php
session_start();
include "function/function.php";
require 'function/POO-PDO.php';
$Profil=$_SESSION['user'];
$db = new MysqlConnect();
$Authen=$db->getOneData($Profil); // appelle la fonction getOneData()
getHeader('Authentification WebPOO');
echo "<br><h1 class='display-5 text-center mt-5 text-light'>Bienvenue ";
echo $Authen->getPrenom();
echo " ";
echo $Authen->getNom();
echo "</h1>";
?>

<?php
getFooter();
?>
