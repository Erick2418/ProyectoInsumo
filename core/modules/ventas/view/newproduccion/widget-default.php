    <?php 
$categories = CategoryData::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	<h1>Nueva Producción</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="../newproduccion/index.php?view=addproduccion" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Lote*</label>
    <div class="col-md-6">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    </select>
    </div>
    </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Labor*</label>
    <div class="col-md-6">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    </select>
    </div>
    </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-md-6">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($categories as $category):?>
      <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
    <?php endforeach;?>
      </select>   
</div>
</div>
 
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Empleado*</label>
    <div class="col-md-6">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    </select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Comienzo*</label>
    <div class="col-md-6">
      <input type="date" name="descripcion" class="form-control" required id="descripcion" placeholder="Descripción">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Fin*</label>
    <div class="col-md-6">
      <input type="date" name="descripcion" class="form-control" required id="descripcion" placeholder="Descripción">
    </div>
  </div>
  
  <div class="form-group">

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Producción</button>
    </div>
  </div>
</form>

	</div>
</div>