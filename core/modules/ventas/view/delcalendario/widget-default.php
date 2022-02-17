<?php

$compra = compraData::getById($_GET["id"]);
$compra->del();

Core::redir("./index.php?view=calendario");
?>