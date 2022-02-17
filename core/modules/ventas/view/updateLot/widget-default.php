<?php

if(count($_POST)>0){
	$user = LotData::getById($_GET["id"]);
	$user->name = $_POST["name"];
	$user->num_lot = $_POST["num_lot"];
	$user->dimension = $_POST["dimension"];
	$user->update();
	
print "<script>window.location='index.php?view=lote';</script>";

}


?>