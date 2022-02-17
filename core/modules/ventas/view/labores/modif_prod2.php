<?php
	include 'conexion.php';

	Modificarlabores($_POST['idlabores'], $_POST['nombre'], $_POST['descripcion'], $_POST['no']);

	function Modificarlabores($id_prod, $nom, $descrip, $no)
	{
		$sentencia="UPDATE labores SET idlabores='".$idlabores."', nombre= '".$nombre."', descripcion='".$descripcion."' WHERE no='".$no."' ";
		mysql_query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("Labor Modificado exitosamente");
	window.location.href='index.php';
</script>