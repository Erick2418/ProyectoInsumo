<div class="row">
	<div class="col-md-12">
	<h1>Nueva labor</h1>
	<br>
		<form class="form-horizontal" method="post" id="addlabor" action="../newlabor/index.php?view=addlabor" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripción*</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" class="form-control" required id="descripcion" placeholder="Descripción">
    </div>
  </div>
   <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Cliente</button>
    </div>
  </div>
</form>
	</div>
</div>