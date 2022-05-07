<?php
session_start();
include "function/function.php";
require 'function/POO-PDO.php';
getHeader('WebPOO : Etudiants'); // affiche l'en tête de la page

if (!empty($_SESSION['user'])){
  TestAffichage(true); // si un utilisateur est connecté
} else TestAffichage(false); // si il n'y a pas d'utilisateur connecté
getFooter(); // affiche le pied de page
?>
