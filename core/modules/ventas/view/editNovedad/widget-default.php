<?php

if(count($_POST)>0){
//	var_dump($_POST);
	
	$novedad = NovedadData::updateNovedad();
	$novedad->fecha_novedad = $_POST["fecha_ingreso"];
	$novedad->id_tipoNovedad = $_POST["tipo_novedad"];
	$novedad->descripcion = $_POST["descripcion"];
	$novedad->valor = $_POST["valor"];
	$novedad->id = $_POST["idNovedad"];

	$novedad->update();
	
print "<script>window.location='index.php?view=lote';</script>";
 


}


?>