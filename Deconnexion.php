<?php
session_start();
include "function/function.php";
require 'function/POO-PDO.php';
getHeader('Authentification WebPOO');
session_destroy();
header('Location: index.php');
?>

<?php
getFooter();
?>
