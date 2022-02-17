<?php
 
if(count($_POST)>0){
	
 	$lote = new LaboresData();
	$lote->nombre = $_POST["nombre"];
	$lote->descripcion = $_POST["descripcion"];
	$lote->add();
print "<script>window.location='index.php?view=labores';</script>";
 

}


?>
 