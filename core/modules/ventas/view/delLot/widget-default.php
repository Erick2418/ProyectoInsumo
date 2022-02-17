<?php

$lote = LotData::getById($_GET["id"]);
$lote->del();
Core::redir("./index.php?view=lote");


?>