<?php
 
if(count($_POST)>0){
	
 	$lote = new LotData();
	$lote->name = $_POST["name"];
	$lote->num_lot = $_POST["num_lot"];
	$lote->dimension = $_POST["dimension"];
	$lote->add();

print "<script>window.location='index.php?view=lote';</script>";
 

}


?>

<h1>xd</h1>