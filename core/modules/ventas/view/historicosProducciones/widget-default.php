<?php

	$producciones = SubProductionData::getAllById( $_GET['id']);



?>

<script>
//    document.cookie = "var_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "var_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
</script>

<div class="row">
    <div class="col-md-12">

        <h1>Histórico de Producciones</h1>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <br>
        <table class="table table-bordered table-hover">
            <thead>
                
                <th>Lote</th>
                <th>Labor</th>
                <th>Empleador</th>
                <th>Productos</th>
                <th>Novedades</th>

            </thead>




            <?php
			foreach($producciones as $product){  ?>
            <tr>
              <!-- Se colcoaron estos nombres x q daba problemas  -->
                <td><?php echo $product->id_productProduction ?></td>
                <td><?php echo $product->fecha_fin ?></td>
                <td><?php echo $product->id ?> </td>
                <td>
                    <?php
                    $nameProductos = ProductData::getBySubProduccion( $product->status);
                    foreach($nameProductos as $nameProduct){ 
                        echo "<li>$nameProduct->name</li>";
                        //echo ", ";
                    }
                    $nameProductos=null;
                    ?>
                </td>

               

                <td>
                <?php

                    $novedades = NovedadData::getAllNovedades( $product->status);

                    foreach($novedades as $novedad){ 
                        echo "<li>$novedad->descripcion</li>";
                       
                    }
                    $novedades= null;
                    ?>


                </td>


            <tr>
                <?php
			}

			?>




        </table>

        <br><br><br><br><br><br><br><br><br><br>