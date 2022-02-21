<?php

$produccion = new ProductionData();

$produccion->id = $_GET['id'];
 
$produccion->reactivarLogico();
 
Core::redir("./index.php?view=produccion");

?>