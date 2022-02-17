<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Costo de Hectarea</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="../newprovider/index.php?view=addprovider" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del producto*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Valor*</label>
    <div class="col-md-6">
      <input type="number" name="valor_inicial" required class="form-control" id="valor_inicial" placeholder="valor_inicial">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" class="form-control" required id="descripcion" placeholder="descripcion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Ingreso*</label>
    <div class="col-md-6">
      <input type="date" name="fecha_ingreso" class="form-control" id="fecha_ingreso" placeholder="fecha_ingreso">
    </div>
  </div>

   <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Costo</button>
    </div>
  </div>
</form>
	</div>
</div>