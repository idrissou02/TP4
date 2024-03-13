<?php 
$action=$_GET['action'];
switch($action){
    case 'liste' :
        $lesContinents=$continent::findALL();
        include('vues/listeContinents.php')
    break;
    case 'add' :
    break;
    case 'update' :
    break;
    case 'delete' :
    break;
}
?>