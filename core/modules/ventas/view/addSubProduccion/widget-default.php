<?php
 
if(count($_POST)>0){

	
 	$productProduccion = new SubProductionData();
	$productProduccion->id_labores = $_POST["labores_id"];
	$productProduccion->id_empleado = $_POST["empleado_id"];
	$productProduccion->fecha_fin = $_POST["inputFechaFin"];
	$productProduccion->id_productProduction = $_POST["idTemp"];
	$productProduccion->idProduccion = $_POST["idTemp"];
	
	$productProduccion->add();

	$idSubProduccionArray = $productProduccion->lastId();
	$idSubProd =  $idSubProduccionArray[0];

//	$idSubProduccionArray = $produccion->lastIdSubProduccion();
//	$idSubProduccion = $idSubProduccionArray[0];

	$productProduccion->updateProductProduccionID(  $idSubProd  ,$_POST["idTemp"] );

	$produccion = new ProductionData();
	$produccion->id = $_POST["idTemp"];
	$produccion->fecha_fin = $_POST["inputFechaFin"];
	$produccion->id_labores =  $_POST["labores_id"];
	$produccion->updateFechaLabores();
	




print "<script>window.location='index.php?view=produccion';</script>";
 

}


?>
 