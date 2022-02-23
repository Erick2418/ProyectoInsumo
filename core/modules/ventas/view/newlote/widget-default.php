<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<?php 
$categories = CategoryData::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Lote</h1>
	<br>
		<form class="form-horizontal" onsubmit="return validarDatos()"  method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=addLot" role="form">

  <div class="form-group">
    <label for="name" class="col-lg-2 control-label">Nombre *</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control"  id="name" placeholder="Descripción">
    </div>
  </div>
  <div class="form-group">
    <label for="num_lot" class="col-lg-2 control-label">Número</label>
 <div class="col-md-6">
      <input type="number" name="num_lot" class="form-control"  id="num_lot" placeholder="Descripción">
    </div>
</div>
<div class="form-group" style="display:none;">
    <label for="dimension" class="col-lg-2 control-label">Dimensión del lote*</label>
    <div class="col-md-6">
      <input type="text" name="dimension" value="5000" class="form-control"  id="dimension" placeholder="Descripción">
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
<script>
  function validarDatos() {

    let name = document.getElementById("name").value;

    let num_lote = document.getElementById("num_lot").value;

    if (!name.trim()) {
        swal("Debe ingresar un Nombre", '', 'warning');
        console.log('debe ingresar categoria');
        return false;
    }
    if (!num_lote.trim()) {
        swal("Debe ingresar un numero de lote", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }


    console.log('here')
    return true;
  }

</script>