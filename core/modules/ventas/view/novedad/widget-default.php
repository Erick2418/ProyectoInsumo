<?php
	$novedades = NovedadData::getAll();
	var_dump($novedades);
?>


<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newnovedad" class="btn btn-default">Agregar Novedad</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="../products/report/products-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Lista de Novedades</h1>
		<div class="clearfix"></div>
	<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Fecha </th>
        <th>Producción</th>
		<th>Tipo de Caso</th>
		<th></th>
            
	</thead>
    <td></td>
    <td></td>
    <td></td>
       <td style="width:70px;">
		<a href="../products/index.php?view=editproduct&amp;id=<?php //echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="../products/index.php?view=delproduct&amp;id=<?php// echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	

<div class="clearfix"></div>

		<div class="jumbotron">
		<h2>No hay Novedades</h2>
		<p>No se han agregado producciones a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Novedad"</b>.</p>
	</div>
	
<br><br><br><br><br><br><br><br><br><br>
