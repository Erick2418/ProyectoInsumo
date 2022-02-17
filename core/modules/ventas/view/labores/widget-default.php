<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newlabor" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva Labor</a>
</div>
		<h1>Labor</h1>
<br>


<?php

		$labores = LaboresData::getAll();
//	var_dump( $users);
		?>
		<div class="clearfix"></div>
	<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>ID</th>
    <th>Labor</th>
		<th>Descripción</th>
		<th>Acciones</th>    
	</thead>
	<?php
			foreach($labores as $labor){ ?>
				<tr>
					<td><?php echo $labor->idlabores ?></td>
					<td><?php echo $labor->nombre ?></td>
					<td><?php echo $labor->descripcion ?></td>
					<td>
						<a href="index.php?view=delLabor&amp;id=<?php echo $labor->idlabores ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
						<a href="index.php?view=editLabor&amp;id=<?php echo $labor->idlabores ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
					</td>
				<tr> 
	<?php
			}
			
			
	?>
	</table>

  


  </div>
    </div>
      </div>
</body>