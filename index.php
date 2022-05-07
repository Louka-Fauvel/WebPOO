<?php
session_start();
include "function/function.php";
require 'function/POO-PDO.php';
getHeader('Bienvenue sur WebPOO');
?>
  <br><br>
  <h1 class="display-2 text-center mt-5 text-light">Bienvenue sur WebPOO</h1>
  <div class="text-center">
  <img class="col" src='Imagedeprofil/ProfilDefault.png' style='width:700px; height:auto' class='rounded img-fluid'>
  </div>
<?php
getFooter();
?>
