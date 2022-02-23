<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="row">
	<div class="col-md-12">
	<h1>Nueva labor</h1>
	<br>
		<form class="form-horizontal" onsubmit="return validarDatos()"  method="post" id="addlabor" action="index.php?view=addLabores" role="form">


  <div class="form-group">
    <label for="nombre" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
   <div class="form-group">
    <label for="descripcion" class="col-lg-2 control-label">Descripción*</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" class="form-control"  id="descripcion" placeholder="Descripción">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Laboe</button>
    </div>
  </div>
</form>
	</div>
</div>
<script>
  function validarDatos() {

    let nombre = document.getElementById("nombre").value;

    let descripcion = document.getElementById("descripcion").value;

    if (!nombre.trim()) {
        swal("Debe ingresar un Nombre", '', 'warning');
        console.log('debe ingresar categoria');
        return false;
    }
    if (!descripcion.trim()) {
        swal("Debe ingresar una Descripcion", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }


    console.log('here')
    return true;
  }

</script>