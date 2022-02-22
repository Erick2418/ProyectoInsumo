

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
	$depreciacionModel  = new DepresiacionData();



	
	$idProductoARestar = $_POST["id_producto"];
    $cantidadActualArray = $productModel->getProducttCantidadById($idProductoARestar);
    $unidadesActuales = $cantidadActualArray->unit;
	$cantidadARestar = $_POST["numCantidad"];

	$categoriaProducto = $cantidadActualArray->category_id;

	if( $categoriaProducto == "5" ){
		echo "<br>CATENGORIA 5 <br>";
		echo "<br>cantidad a restar $cantidadARestar <br>";
		
		for ($i=0; $i <$cantidadARestar ; $i++) { // Ingresamos por la cantidad de veces q se ingresa el producto
		  $precioEntrada = $cantidadActualArray->price_in;
		  echo "<br>DENTRO DEL BUCLE <br>";
		  $meses=  ($precioEntrada / 10 )/12;
		  $depreciacionModel->add($idProductoARestar, round( $meses));
		  echo "cantidadARestar: ".$cantidadARestar;
		  echo "DEPRECIACION". $idProductoARestar;     
		}
	  }else{
			$stockActuala = $unidadesActuales  - $cantidadARestar; 
			$productModel->updateCantidad($stockActuala, $idProductoARestar );

	  }	

    $operacionInvetnarioModel->addByProduccion($idProductoARestar,$cantidadARestar);











print "<script>window.location='index.php?view=newSubProduccion&id=$idProduccion';</script>";
 
 

}

?>

