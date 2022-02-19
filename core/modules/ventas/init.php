<?php
// init.php
// archivo iniciarlizador del modulo
// librerias requeridas
// * Database
// * Session

include "core/modules/".Module::$module."/model/UserData.php";
include "core/modules/".Module::$module."/model/ProductData.php";
include "core/modules/".Module::$module."/model/OperationTypeData.php";
include "core/modules/".Module::$module."/model/OperationData.php";
include "core/modules/".Module::$module."/model/SellData.php";
/* 7-Jul-2015 */
include "core/modules/".Module::$module."/model/ConfigurationData.php";
include "core/modules/".Module::$module."/model/PersonData.php";
include "core/modules/".Module::$module."/model/CategoryData.php";
include "core/modules/".Module::$module."/model/BoxData.php";
include "core/modules/".Module::$module."/model/Lot.php";
include "core/modules/".Module::$module."/model/LaboresData.php";
include "core/modules/".Module::$module."/model/ProductionProduct.php";
include "core/modules/".Module::$module."/model/Production.php";
include "core/modules/".Module::$module."/model/NovedadData.php";
include "core/modules/".Module::$module."/model/Produccion_Total.php";

session_start();
ob_start();

Module::loadLayout("index");

?>