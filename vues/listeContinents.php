<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des continents</h2></div>
        <div class="col-3"><a href="formeNationalite.php?action=Ajouter" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Créer une continents</a> </div>
    </div>

    <table class="table table-hover table-striped">
  <thead>
    <tr class="d-flex">
      <th scope="col"class="col-md-2">Numéro</th>
      <th scope="col"class="col-md-8">Libellé</th>
      <th scope="col"class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesContinent as $continent){
        echo "<tr class='d-flex'>";

            echo "<td class='col-md-2'>$continent->getNum()</td>";
            echo "<td class='col-md-5'>$continent->getLibelle()</td>";
            echo "<td class='col-md-2'>
                <a href='index.php?action=Modifier&num=$continent->getNum()' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal'data-message='Voulez vous supprimer cette nationalité ?' data-supression= 'supprimernationalite.php?num=$continent->getNum()' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
        echo "</tr>";
    }
    ?>
  </tbody>
</table>    
</div>