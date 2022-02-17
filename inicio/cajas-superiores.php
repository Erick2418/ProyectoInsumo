<?php

$item = null;
$valor = null;
$orden = "id";

$products = SellData::getSells();

$products = ControladorProductos::ctrMostrarProductos(
$item, $valor, $orden);
$totalProductos = count($products);


$operation = ControladorVentas::ctrSumaTotalVentas();

$category = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($category);

$person = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($person);

?>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3>$<?php echo number_format($ventas["total"],2); ?></h3>

      <p>Ventas</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="ventas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalCategorias); ?></h3>

      <p>Categorías</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-clipboard"></i>
    
    </div>
    
    <a href="categorias" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalClientes); ?></h3>

      <p>Clientes</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="clientes" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">
    
      <h3><?php echo number_format($totalProductos); ?></h3>

      <p>Productos</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-ios-cart"></i>
    
    </div>
    
    <a href="productos" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>