<?php
 
if(count($_POST)>0){
	var_dump($_POST );
 	$ttProduccion = new TotalProduccion();
	$ttProduccion->total_produccion = $_POST["total_productos"];
	$ttProduccion->total_hijuelos = $_POST["total_hijuelos"];
	$ttProduccion->id_Produccion = $_POST["idProduccion"];
	$ttProduccion->add();

print "<script>window.location='index.php?view=produccion';</script>";
 

}


?>
 