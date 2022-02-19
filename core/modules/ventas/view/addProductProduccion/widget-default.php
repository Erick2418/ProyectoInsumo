

<?php
 
if(count($_POST)>0){
  
  $product = new ProductionProduct();
	//$product->dimension = $_POST["category_id"];
  $product->idProducto = $_POST["id_producto"];
	$product->cantidad = $_POST["numCantidad"];
	$product->id_temp = $_POST["idgenerado"];
  
	$product->add();
 
print "<script>window.location='index.php?view=newproduccion';</script>";
 
 

}

?>

