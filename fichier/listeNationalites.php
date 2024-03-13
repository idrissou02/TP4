<?php
include "header.php";
include "connexionPdo.php";


$libelle = "";
$continentSel = "Tous";

$texteReq = "select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent = c.num";

if (!empty($_GET)) {
    $libelle = $_GET['libelle'];
    $continentSel = $_GET['continent'];

    if ($libelle != "") {$texteReq .= " and n.libelle like '%" . $libelle . "%'";}
    if ($continentSel != "Tous") {$texteReq .= " and c.num = " . $continentSel;}
}

$texteReq .= " order by n.libelle";

$req = $monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites = $req->fetchAll();

$reqContinent = $monPdo->prepare("select * from continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$lesContinents = $reqContinent->fetchAll();

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

<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col-3"><a href="formeNationalite.php?action=Ajouter" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Créer une nationalité</a> </div>
    </div>

    <form action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3">
        <div class="row">
            <div class="col">
                <input type="text" name="libelle" placeholder="Rechercher par libellé" class="form-control"
                       value="<?= $libelle ?>">
            </div>
            <div class="col">
                <select name="continent" class="form-control">
                    <option value="Tous" <?= ($continentSel == "Tous") ? "selected" : "" ?>>Tous les continents</option>
                    <?php
                    foreach ($lesContinents as $continent) {
                        echo '<option value="' . $continent->num . '" ' . (($continentSel == $continent->num) ? "selected" : "") . '>' . $continent->libelle . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block"> Rechercher</button>
            </div>
        </div>
    </form>


    <table class="table table-hover table-striped">
  <thead>
    <tr class="d-flex">
      <th scope="col"class="col-md-2">Numéro</th>
      <th scope="col"class="col-md-5">Libellé</th>
      <th scope="col"class="col-md-3">Continent</th>
      <th scope="col"class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
        echo "<tr class='d-flex'>";

            echo "<td class='col-md-2'>$nationalite->num</td>";
            echo "<td class='col-md-5'>$nationalite->libNation</td>";
            echo "<td class='col-md-3'>$nationalite->libContinent</td>";
            echo "<td class='col-md-2'>
                <a href='formeNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal'data-suppression='supprimernationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
        echo "</tr>";


    }
    

    ?>
 
   
    
  </tbody>
</table>    
</div>




<?php include "footer.php";
?>