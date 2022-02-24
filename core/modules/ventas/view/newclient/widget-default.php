<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Grupo Empleado</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addclient" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Grupo Empleados</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellidos de los Empleados</label>
    <div class="col-md-6">
      <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group" style="display:none;">
    <label for="inputEmail1" class="col-lg-2 control-label" >Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address1"  value="" class="form-control" id="address1" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group" style="display:none;">
    <label for="inputEmail1" class="col-lg-2 control-label" >Email*</label>
    <div class="col-md-6">
      <input type="email" name="email1" value="" class="form-control" id="email1" placeholder="Email">
    </div>
  </div>
       <div class="form-group"  style="display:none;">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="number" name="phone1"  value="" class="form-control" id="phone1" placeholder="Telefono">
    </div>
    </div>
    <div class="form-group">
    <label for="sueldo" class="col-lg-2 control-label">Sueldo Grupo</label>
   
<div class="col-md-6">
      <input type="text" name="sueldo" class="form-control" id="sueldo" placeholder="sueldo">
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