<?php session_start(); 
include "vues/header.php"; 
include "modeles/Continent.php";
include "modeles/monPdo.php";

$uc = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil' :
        include('vues/accueil.php');
        break;
    case 'continents' :
        include('controllers/continentController.php');
        break;
}
include "vues/footer.php";

?>