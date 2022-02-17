<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcategory" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva Categoria</a>
</div>
		<h1>Categorias</h1>
<br>
		<?php

		$users = CategoryData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acciones</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->description; ?></td>
				<td>
					<a href="index.php?view=delCat&amp;id=<?php echo $user->id ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
					<a href="index.php?view=editcategory&amp;id=<?php echo $user->id ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
				</td>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}


		?>


	</div>
</div>