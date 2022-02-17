<?php

if(count($_POST)>0){
  $compra = new compraData();
  $compra->name = $_POST["name"];
  $compra->description = $_POST["description"];
  $compra->fecha_compra = $_POST["fecha_compra"];
  $compra->valor_total_compra = $_POST["valor_total_compra"];
  $compra->total_producto = $_POST["total_producto"];
  $product->user_id = Session::getUID();


 
if($_POST["q"]!="" || $_POST["q"]!="0"){
 $op = new OperationData();
 $op->compra_id = $compra[1] ;
 $op->operation_type_id=OperationTypeData::getByName("entrada")->id;
 $op->q= $_POST["q"];
 $op->sell_id="NULL";
$op->is_oficial=1;
$op->add();
}

print "<script>window.location='index.php?view=calendario';</script>";


}


?>