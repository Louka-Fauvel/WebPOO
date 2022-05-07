<?php
session_start();
include "function/function.php";
require 'function/POO-PDO.php';
getHeader('Authentification WebPOO');
session_destroy();
?>
<h1 class="display-3 text-center mt-5 text-light">Erreur</h1>
<?php
getFooter();
?>
