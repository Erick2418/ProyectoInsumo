<?php
 
if(count($_POST)>0){
	var_dump($_POST );
 	$lote = new NovedadData();
	$lote->fecha_novedad = $_POST["fecha_ingreso"];
	$lote->id_produccion = $_POST["producciones"];
	$lote->id_tipoNovedad = $_POST["tipo_novedad"];
	$lote->descripcion = $_POST["descripcion"];
	$lote->valor = $_POST["valor"];
	$lote->add();

print "<script>window.location='index.php?view=produccion';</script>";
 

}


?>
 