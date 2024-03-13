<?php include "header.php";
$action=$_GET['action'];
if($action == "Modifier"){
  include "connexionPdo.php";
$num=$_GET['num'];
$req=$monPdo->prepare("select * from genre where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindParam(':num', $num);
$req->execute();
$leGenre=$req->fetch();
}
?>
<div class="container mt-5">
<h2 class='pt-3 text-center'> <?php echo $action ?> Un genre</h2>

<form action="valideformeGenre.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3 border border-dark p-3">
  <div class="form-group">
    <label for='libelle'> Libellé </label>
    <input type="text" class='form-control' id='libelle' placehoder='Saisir le libellé' name='libelle' value="<?php if($action == "Modifier") {echo $leGenre->libelle ;}?>">
  </div>
  <input type="hidden" id="num" name="num" value="<?php if($action == "Modifier") {echo $leGenre->num ;}?>">
  <div class="row">
    <div class="col"> <a href=listeGenre.php class='btn btn-warning btn-block'> Revenir à la liste</a></div>
    <div class="col"><button type="submit" class="btn btn-primary btn-block"> Ajouter <?php echo $action ?> </button></div>   
  </div>
</form>

</div>  
<?php include "footer.php";

?>