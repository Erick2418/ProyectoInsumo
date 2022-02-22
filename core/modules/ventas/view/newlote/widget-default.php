    <?php 
$categories = CategoryData::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Lote</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=addLot" role="form">

  <div class="form-group">
    <label for="name" class="col-lg-2 control-label">Nombre *</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" required id="name" placeholder="Descripción">
    </div>
  </div>
  <div class="form-group">
    <label for="num_lot" class="col-lg-2 control-label">Número</label>
 <div class="col-md-6">
      <input type="number" name="num_lot" class="form-control" required id="num_lot" placeholder="Descripción">
    </div>
</div>
<div class="form-group" style="display:none;">
    <label for="dimension" class="col-lg-2 control-label">Dimensión del lote*</label>
    <div class="col-md-6">
      <input type="text" name="dimension" value="5000" class="form-control" required id="dimension" placeholder="Descripción">
   </div>
     </div>
  
  <div class="form-group">

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Lote</button>
    </div>
  </div>
</form>

	</div>
</div>