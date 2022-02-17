    <?php 
$categories = CategoryData::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Lote</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="../newproduccion/index.php?view=addproduccion" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre *</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" class="form-control" required id="descripcion" placeholder="Descripción">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Número</label>
 <div class="col-md-6">
      <input type="number" name="descripcion" class="form-control" required id="descripcion" placeholder="Descripción">
    </div>
</div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Dimensión del lote*</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" class="form-control" required id="descripcion" placeholder="Descripción">
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