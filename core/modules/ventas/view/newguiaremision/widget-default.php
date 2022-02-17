<div class="row">
	<div class="col-md-12">
	<h1>Nueva Guia de Remisión</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="../newprovider/index.php?view=addprovider" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">codigo / ID*</label>
    <div class="col-md-6">
      <input type="number" name="codigo" class="form-control" id="codigo" placeholder="codigo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha inicio Traslado*</label>
    <div class="col-md-6">
      <input type="date" name="fecha_traslado" required class="form-control" id="fecha_traslado" placeholder="fecha_traslado">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Terminación del Traslado*</label>
    <div class="col-md-6">
      <input type="date" name="fecha_fin" class="form-control" required id="fecha_fin" placeholder="fecha_fin">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">N.- de Autorización*</label>
    <div class="col-md-6">
      <input type="text" name="email1" class="form-control" id="tipo_docuemnto" placeholder="tipo_docuemnto">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">N.- de Comprobante*</label>
    <div class="col-md-6">
      <input type="number" name="numero_autorizacion" class="form-control" id="numero_autorizacion" placeholder="numero_autorizacion">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Número de declaración aduanera</label>
    <div class="col-md-6">
      <input type="number" name="numero_declaracion" class="form-control" id="numero_declaracion" placeholder="numero_declaracion">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Motivo del traslado*</label>
    <div class="col-md-6">
      <input type="text" name="motivo_traslado" class="form-control" id="motivo_traslado" placeholder="motivo_traslado">
    </div>
  </div>


<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Punto de Partida*</label>
    <div class="col-md-6">
      <input type="text" name="punto_partida" class="form-control" id="punto_partida" placeholder="punto_partida">
    </div>
  </div>
  
 
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Destino*</label>
    <div class="col-md-6">
      <input type="text" name="destino" class="form-control" id="destino" placeholder="destino">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripción*</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion">
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Guias</button>
    </div>
  </div>
</form>
	</div>
</div>