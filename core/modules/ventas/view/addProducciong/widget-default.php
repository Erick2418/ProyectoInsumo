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


 $produccion->addSubProduccion($idProduccion);
 

 $idSubProduccionArray = $produccion->lastIdSubProduccion();
 $idSubProduccion = $idSubProduccionArray[0];


  $productos = $_POST["idsproductos"];
  $arrayIdProductos = explode(",", $productos);
 
  $productProducction = new ProductionProduct();
//  
	$productModel = new  ProductData();

  
  $subProduccionModel = new SubProductionData();

  $operacionInvetnarioModel = new OperationData();
  $depreciacionModel  = new DepresiacionData();
  $stockActuala = 0;

  foreach ($arrayIdProductos as $idProductProduccionn) { // array de product_produccion

    $productProducction->updateIdProduction($idProductProduccionn,$idProduccion );

    $subProduccionModel->updateIdSubProduccion($idProductProduccionn,$idSubProduccion );

      // vamos a traer la cantidad y restarla del stock
    $cantidadArry= $productProducction->getCantidadARestar($idProductProduccionn);
    $cantidadARestar =  $cantidadArry->cantidad;
    $idProductoARestar = $cantidadArry->idProducto;
 
    $cantidadActualArray = $productModel->getProducttCantidadById($idProductoARestar);
 
    var_dump( $cantidadActualArray); 
    $unidadesActuales = $cantidadActualArray->unit;

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
      echo "<br>DENTRO DEL ELSE <br>";
      $stockActuala = $unidadesActuales  - $cantidadARestar; 
      $productModel->updateCantidad($stockActuala, $idProductoARestar );
   
    }
 
    echo "<br>FIN  <br>";
    $operacionInvetnarioModel->addByProduccion($idProductoARestar,$cantidadARestar);




  }

print "<script>window.location='index.php?view=produccion';</script>";
 




}

?>