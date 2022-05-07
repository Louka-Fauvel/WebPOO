<?php
session_start();
include "function/function.php";
require 'function/POO-PDO.php';
$Profil=$_SESSION['user'];
$db = new MysqlConnect();
$TitreProfil=$db->getOneData($Profil);
$Titre="Profil de ".$TitreProfil->getPrenom()." ".$TitreProfil->getNom(); // Titre de la page avec le nom de l'étudiant
$TitreProfil->getPrenom();
$TitreProfil->getNom();
getHeader($Titre);
TestUnique($Profil); // Fonction qui affiche le profil de l'étudiant

getFooter();
?>
