<?php
	$producciones = ProductionData::getAll();
var_dump($producciones);
?>

<script>
//    document.cookie = "var_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "var_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
</script>

<div class="row">
    <div class="col-md-12">
        <h1>Lista de Producciones a Generar</h1>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <br>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Lote</th>
                <th>labor</th>
                <th>Fecha Comienzo</th>
                <th>Fecha Fin</th>
                <th>Estado de la Producción</th>
                <th>Estado</th>
                <th>Ver</th>

            </thead>




            <?php
			foreach($producciones as $product){  ?>
            <tr>

                <td><?php 
                $loteData = LotData::getById($product->id_lote);
                echo $loteData->name;
                ?></td>
                <td>
                    <?php 
                    
                   
                    $loteData = LaboresData::getById($product->id_labores);
                    echo $loteData->nombre;
                    
                    ?>


                </td>
                <td><?php echo $product->fecha_inicio ?></td>
                <td><?php echo $product->fecha_fin ?></td>
                <td><?php echo $product->estadoProduccion ?></td>
                <td><?php 
                
                if($product->status == 1 ){
                    echo "Activo";
                }else{
                    echo "Inactivo";
                }
                
                
                ?></td>
                <td>
                    <?php 
                
                if($product->estadoProduccion == "FINALIZADO" ){?>

                    <a onclick="generarPdf(<?php echo $product->id ?>)" class="btn btn-sm btn-primary">Generar
                        Reporte</a>

                    <?php
                    
                } 
                
                ?>



                </td>


                <?php }?>

            </tr>



        </table>

        <br><br><br><br><br><br><br><br><br><br>

        <script>
        function generarPdf(id) {


            window.open('GenerarReportes/GenerarReporteProducciones.php?id=' + id, '_black');





        }
        </script>