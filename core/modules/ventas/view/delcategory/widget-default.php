<?php

$labor = labordata::getById($_GET["id"]);

$labor->del();
Core::redir("./index.php?view=labores");


?>