<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Jumbotron Template · Bootstrap</title>

    
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.css">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
  <a class="navbar-brand" href="#">Ma Bibliothèque</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-book"></i>  Gestion des genres</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="listeGenre.php">Listes des genres</a>
          <a class="dropdown-item" href="formeGenre.php?action-Ajouter">Ajouter un genre</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i>  Gestion des auteurs</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Listes des auteurs</a>
          <a class="dropdown-item" href="#">Ajouter un auteur</a>
          <a class="dropdown-item" href="#">Rechercher un auteur</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion des nationnalités</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="listeNationalites.php">Listes des nationalités</a>
          <a class="dropdown-item" href="formAjoutNationalite.php">Ajouter une nationalité</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i>  Gestion des continents</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="index.php?uc=continents&action=list">Listes des continents</a>
          <a class="dropdown-item" href="index.php?uc=continents&action=add">Ajouter un continent</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<?php
if (!empty($_SESSION['message'])) {
    $mesMessages = $_SESSION['message'];
    foreach ($mesMessages as $key => $message) {
        echo '<div class="container pt-5">
                <div class="alert alert-' . $key . ' alert-dismissible fade show" role="alert">' . $message . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
            </div>';
    }
    $_SESSION['message'] = [];
}
?>