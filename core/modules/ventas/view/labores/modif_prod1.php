<?php
  include 'conexion.php';

  $consulta=Consultarlabor($_GET['no']);

  function Consultarlabor($no_prod)
  {
    $sentencia="SELECT * FROM labores WHERE no='".$no_prod."' ";
    $resultado=mysql_query($sentencia) or die (mysql_error());
    $filas=mysql_fetch_assoc($resultado);
    return [
      $filas['idlabores'],
      $filas['nombre'],
      $filas['descripcion']
    ];

  }


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Labor</title>
<style type="text/css">
@import url("../../../../../../../../Users/MBTA/Desktop/agregar_modificar_eliminar_DB/css/mycss.css");
</style>
<link href="../../../../../../../../Users/MBTA/Desktop/agregar_modificar_eliminar_DB/css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="todo">
  
  
  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar Labor</h1> </span>
  		<br>
	  <form action="../../../../../../../../Users/MBTA/Desktop/agregar_modificar_eliminar_DB/modif_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="no" value="<?php echo $_GET['no']?> ">
  		<label>Id Labor: </label>
  		<input type="text" id="idlabor" name="idlabor"; value="<?php echo $consulta[0] ?>" ><br>
  		
  		<label>Nombre: </label>
  		<input type="text" id="nombre" name="nombre" value="<?php echo $consulta[1] ?>"><br>
  		
  		<label>Descripcion: </label>
  		<textarea style="border-radius: 10px;" rows="3" cols="50" name="descripcion"> <?php echo $consulta[2] ?> </textarea><br>
  		
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>
  	
  </div>
  

</div>


</body>
</html>