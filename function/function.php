<?php
function getHeader($titre){// Fonction qui ajoute l'en tête de toutes les pages
  /*Cette div appelle la class background qui ce trouve dans fondEcran.css
  cette class crée un fond d'écran annimé
  Chaque span représente une petite lumière blanche annimée*/
  echo "<!DOCTYPE html>
  <html>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
      <link rel='stylesheet' href='function/fondEcran.css'>
      <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
      <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
      <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
      <title>".$titre."</title>
    </head>
    <div class='background'>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
       <span></span>
    <body class='bg-dark'>
    <nav class='shadow-lg p-2 bg-transparent'>
    <div class='container'>
    <div class='row align-items-center custom-line'>
    <div class='col'>
      <ul class='nav'>
        <li class='nav-item'><a class='nav-link text-warning' href='index.php'>Accueil</a></li>
        <li class='nav-item'><a class='nav-link text-warning' href='listeUsers.php'>Etudiants</a></li>
      </ul>
    </div>
    <div class='col'>
      <ul class='nav justify-content-end'>";
      if (!empty($_SESSION['user'])){// Permet de savoir si l'utilisateur est connecté
        $Profil=$_SESSION['user'];
        $db = new MysqlConnect();
        $NavProfil=$db->getOneData($Profil);
        $Navigation=$NavProfil->getPrenom()." ".$NavProfil->getNom();
      echo"<div class='dropdown'>
          <a class='nav-link dropdown-toggle text-warning' href='#' role='button' id='deroulanta' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>".$Navigation."</a>
          <div class='dropdown-menu bg-dark' aria-labelledby='deroulanta'>
            <a class='dropdown-item text-warning btn-dark' href='Profil.php'>Profil</a>
            <a class='dropdown-item text-warning btn-dark' href='Deconnexion.php'>Déconnexion</a>
          </div>
        </div>";
    }
    else {// Si l'utilisateur n'est pas connecté
echo" <li class='nav-item'><a class='nav-link text-warning' href='Login.php'>Se connecter</a></li>
      <li class='nav-item'><a class='nav-link text-warning' href='Sign_up.php'>S'inscrire</a></li>";
    }
echo"</ul>
    </div>
    </div>
    </div>
    </nav>
    <div class='container'>";
}

function getFooter(){// Fonction qui ajoute le pied de page sur toutes les pages
  echo "</div>
  </body>
  </div>
</html>";
}
?>
