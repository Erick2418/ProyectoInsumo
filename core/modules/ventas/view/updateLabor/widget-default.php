<?php

if(count($_POST)>0){
	$user = LaboresData::getById($_GET["id"]);
	$user->nombre = $_POST["nombre"];
	$user->id = $_POST["nombre"];
	$user->descripcion = $_POST["descripcion"];
	$user->update();
	
print "<script>window.location='index.php?view=labores';</script>";

}


?>