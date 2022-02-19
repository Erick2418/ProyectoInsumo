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
 
  $idProduccion =  $idProduction[0];
  $productos = $_POST["idsproductos"];
  $arrayIdProductos = explode(",", $productos);
 
  $productProducction = new ProductionProduct();
//  
	$productModel = new  ProductData();

  $stockActuala = 0;

  foreach ($arrayIdProductos as $producto) { // array de product_produccion

    $productProducction->updateIdProduction($producto,$idProduccion );
      // vamos a traer la cantidad y restarla del stock
    $cantidadArry= $productProducction->getCantidadARestar($producto);
    $cantidadARestar =  $cantidadArry->cantidad;
    $idProductoARestar = $cantidadArry->idProducto;
 
    $cantidadActualArray = $productModel->getProducttCantidadById($idProductoARestar);
 
    $unidadesActuales = $cantidadActualArray->unit;
 
    $stockActuala = $unidadesActuales  - $cantidadARestar; 
    $productModel->updateCantidad($stockActuala, $idProductoARestar );
    
  }

print "<script>window.location='index.php?view=produccion';</script>";
 




}

?>