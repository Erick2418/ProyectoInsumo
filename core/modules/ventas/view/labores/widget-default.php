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
<table class="table table-bordered table-hover">
			<thead>
  			<th>ID</th>
  			<th>labor</th>
  			<th>Descripción</th>
  			
  		</thead>
  		
  		
  		<?php
		include'conexion.php';
       $sentencia="SELECT * FROM labores";
       $resultado=mysql_query($sentencia);
	   while($filas=mysql_fetch_assoc($resultado))
	   {
       echo "<tr>";
        echo "<td>"; echo $filas['idlabores']; echo "</td>";
          echo "<td>"; echo $filas['nombre']; echo "</td>";
          echo "<td>"; echo $filas['descripcion']; echo "</td>";
		  
          echo "<td> <a href='modif_prod1.php?view=labores'> <button type='button' class='btn btn-success' >Modificar</button> </a> ";
          echo "<a href='eliminar_prod.php?view=labores'><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
        echo "</tr>";
     }
	 
      ?>
  	</table>
  </div>
    </div>
      </div>
</body>