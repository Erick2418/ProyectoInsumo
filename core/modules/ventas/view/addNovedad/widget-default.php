<?php
 
if(count($_POST)>0){

	$idLote = $_POST['id_lote'];
	$idProducciones = $_POST['producciones'];


	$novedad = new NovedadData();

	$idSubProduccion = $novedad->idLaborGET($idProducciones, $idLote);
	$novedad->fecha_novedad = $_POST["fecha_ingreso"];
	$novedad->id_produccion = $_POST["producciones"];
	$novedad->id_subProduccion =  $idSubProduccion[0];
	$novedad->id_tipoNovedad = $_POST["tipo_novedad"];
	$novedad->descripcion = $_POST["descripcion"];
	$novedad->valor = $_POST["valor"];
	
	$novedad->add();

print "<script>window.location='index.php?view=produccion';</script>";
 

}


?>
 