

<?php
 
if(count($_POST)>0){
   
$idProduccion = $_POST['idgenerado'];
  	$product = new ProductionProduct();
	$product->dimension = $_POST["category_id"];
   	$product->idProducto = $_POST["id_producto"];
	$product->cantidad = $_POST["numCantidad"];
	$product->id_temp = $_POST["idgenerado"];
  
	$product->addProductSubProduccion();
	
	$productModel = new  ProductData();
	$operacionInvetnarioModel = new OperationData();

	
	$idProductoARestar = $_POST["id_producto"];
    $cantidadActualArray = $productModel->getProducttCantidadById($idProductoARestar);
    $unidadesActuales = $cantidadActualArray->unit;
	$cantidadARestar = $_POST["numCantidad"];
    $stockActuala = $unidadesActuales  - $cantidadARestar; 
    $productModel->updateCantidad($stockActuala, $idProductoARestar );
    $operacionInvetnarioModel->addByProduccion($idProductoARestar,$cantidadARestar);











print "<script>window.location='index.php?view=newSubProduccion&id=$idProduccion';</script>";
 
 

}

?>

