<?php 
$action=$_GET['action'];
switch($action){
    case 'list' :
        $lesContinents=Continent::findAll();
        include('vues/listeContinents.php');
    break;
    case 'add' :
        $mode="Ajouter";
        include('vues/formContinent.php');
    break;
    case 'update' :
        $mode="Modifier";
        include('vues/formContinent.php');
    break;
    case 'delete' :
    break;
    case 'valideForm' :
    break;
}   
?>