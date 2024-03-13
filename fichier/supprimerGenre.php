<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];

    $req=$monPdo->prepare("delete from genre where num = :num");;
    $req->bindParam(':num', $num);
    $nb=$req->execute();

if($nb == 1) {
     $_SESSION['message']=["success"=>"Le genre a bien été supprimé"];
}else{
    $_SESSION['message']=["danger"=>"Le genre n'a pas été supprimé"];
}
header('location: listeGenre.php');
exit();
?>