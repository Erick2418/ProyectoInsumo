<?php

$produccion = new ProductionData();

$produccion->id = $_GET['id'];
 
$produccion->deleteLogico();
 
Core::redir("./index.php?view=produccion");

?>