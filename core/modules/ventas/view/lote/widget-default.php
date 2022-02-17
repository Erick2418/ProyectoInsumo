<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=newlote" class="btn btn-default">Agregar Lote</a>
</div>
</div>
<?php

		$lots = LotData::getAll();
//	var_dump( $users);
		?>
		<h1>Lista de Lotes</h1>
		<div class="clearfix"></div>
	<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Nombre </th>
        <th>Número</th>
		<th>Dimensión de Lote</th>
		<th>Acciones</th>    
	</thead>
	<?php
			foreach($lots as $lot){ ?>
				<tr>
					<td><?php echo $lot->name ?></td>
					<td><?php echo $lot->num_lot ?></td>
					<td><?php echo $lot->dimension ?></td>
					<td>
						<a href="index.php?view=delLot&amp;id=<?php echo $lot->id ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
						<a href="index.php?view=editLot&amp;id=<?php echo $lot->id ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
					</td>
				<tr> 
	<?php
			}
			
			
	?>
	</table>
    <!-- 
       <td style="width:70px;">
	
	   
	</td>
	</tr>
	-->
<!--- 
<div class="clearfix"></div>

		<div class="jumbotron">
		<h2>No hay Lotes</h2>
		<p>No se han agregado producciones a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Lote"</b>.</p>
	</div>
	-->
<br><br><br><br><br><br><br><br><br><br>
