<?php
	include "conexion.php";

	Eliminarlabores($_GET['no']);

	function Eliminarlabores($no)
	{
		$sentencia="DELETE FROM labores WHERE no='".$no."' ";
		mysql_query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("Labor Eliminado exitosamente");
	window.location.href='index.php';
</script>