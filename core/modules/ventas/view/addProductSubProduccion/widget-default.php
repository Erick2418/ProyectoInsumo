

<?php
 
if(count($_POST)>0){
   
$idProduccion = $_POST['idgenerado'];
  	$product = new ProductionProduct();
	$product->dimension = $_POST["category_id"];
   	$product->idProducto = $_POST["id_producto"];
	$product->cantidad = $_POST["numCantidad"];
	$product->id_temp = $_POST["idgenerado"];
  
	$product->addProductSubProduccion();
	
print "<script>window.location='index.php?view=newSubProduccion&id=$idProduccion';</script>";
 
 

}

?>

