<?php

if(count($_POST)>0){
  
  // Creamos la produccion
 	$produccion = new ProductionData();
	$produccion->id_lote = $_POST["lote_id"];
  $produccion->id_empleado = $_POST["empleado_id"];
	$produccion->fecha_inicio = $_POST["inputFechaComienzo"];
	$produccion->fecha_fin = $_POST["inputFechaFin"];
  $produccion->id_labores = $_POST["labores_id"];
  $produccion->id_productProduction = $_POST["idTemp"];
	$produccion->add();

  // Ahora vamos a insertar el id de Produccion a la tabla de productos
  $idProduction = $produccion->lastId();
  echo "<br>";
  echo "ID PRODUCTION IS: ";
  var_dump($idProduction );
  echo "<br>";
  $idProduccion =  $idProduction[0];
  $productos = $_POST["idsproductos"];
  $arrayIdProductos = explode(",", $productos);
  var_dump( $arrayIdProductos );


  $productProducction = new ProductionProduct();

  foreach ($arrayIdProductos as $producto) {

    $productProducction->updateIdProduction($producto,$idProduccion );
     
  }


print "<script>window.location='index.php?view=produccion';</script>";
 




}

?>