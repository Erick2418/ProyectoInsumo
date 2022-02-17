<?php
	include 'conexion.php';

	Nuevolabor($_POST['idlabores'], $_POST['nombre'], $_POST['descripcion']);

	function Nuevolabor($idlabores, $nombre, $descripcion)
	{
		echo $sentencia="INSERT INTO labores (idlabores, nombre, descripcion) VALUES ('".$idlabores."', '".$nombre."', '".$descripcion."')";
		mysql_query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("Labor Ingresado exitosamente");
	window.location.href='index.php';
</script>