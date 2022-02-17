
<div class="row">
	<div class="col-md-12">
	<h1>Nueva Compra</h1>
	<br>
	<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addcalendario" action="../newcalendario/index.php?view=addcalendario" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del Producto o Servicio *</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-md-6">
      <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Compra*</label>
    <div class="col-md-6">
      <input type="date" name="fecha_compra" required class="form-control" id="fecha_compra" placeholder="Fecha de Compra">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Valor total de Compra*</label>
    <div class="col-md-6">
      <input type="number" name="valor_total_compra" required class="form-control" id="valor_total_compra" placeholder="valor total de la compra">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Total de Productos*</label>
    <div class="col-md-6">
      <input type="number" name="total_producto" required class="form-control" id="total_producto" placeholder="ingrese el total de productos">
       </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </div>
  </div>
</form>

	</div>
</div>