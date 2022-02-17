<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newlote" class="btn btn-default">Agregar Lote</a>
</div>
</div>
		<h1>Lista de Lotes</h1>
		<div class="clearfix"></div>
	<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Nombre </th>
        <th>Número</th>
		<th></th>
            
	</thead>
    <td></td>
    <td></td>
    
       <td style="width:70px;">
		<a href="../products/index.php?view=editproduct&amp;id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
		<a href="../products/index.php?view=delproduct&amp;id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	

<div class="clearfix"></div>

		<div class="jumbotron">
		<h2>No hay Lotes</h2>
		<p>No se han agregado producciones a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Lote"</b>.</p>
	</div>
	
<br><br><br><br><br><br><br><br><br><br>
