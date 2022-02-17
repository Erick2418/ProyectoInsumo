<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newclient" class="btn btn-default"><i class='fa fa-smile-o'></i> Nuevo Empleado</a>
<div class="btn-group pull-right">
  
</div>
</div>
		<h1>Registros de Empleados</h1>
<br>
		<?php

		$users = PersonData::getClients();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Sueldo</th>
			<th>Acciones</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->address1; ?></td>
				<td><?php echo $user->email1; ?></td>
				<td><?php echo $user->phone1; ?></td>
				<td><?php echo $user->sueldo; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editclient&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delclient&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay clientes</p>";
		}


		?>


	</div>
</div>