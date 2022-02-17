<?php

if(count($_POST)>0){
	$user = new laboresData();
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=labores';</script>";


}


?>