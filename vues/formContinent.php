<div class="container mt-5">
<h2 class='pt-3 text-center'> <?php echo $mode ?> Une continent</h2>

<form action="index.php?uc=contient&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3">
  <div class="form-group">
    <label for='libelle'> Libellé </label>
    <input type="text" class='form-control' id='libelle' placehoder='Saisir le libellé' name='libelle' value="<?php if($mode == "Modifier") {echo $continet->getlibelle() ;}?>">
  </div>
  <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $laNationalite->getNum() ;}?>">
  <div class="row">
    <div class="col"> <a href="index.php?uc=continent&action=list" class='btn btn-success btn-block'> Revenir à la liste</a></div>
    <div class="col"><button type='submit' class='btn btn-warning btn-block'><?php echo $mode ?> </button></div>
  </div>
</form>

</div>  