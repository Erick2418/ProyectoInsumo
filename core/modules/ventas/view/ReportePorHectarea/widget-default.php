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
        <h1>Lista de Producciones Para Reporte por Hectarea</h1>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <br>
        <table class="table table-bordered table-hover">
            <thead>

            </thead>


            <?php
            $condadorPar = 0;
            $arrayProduccion = array();
			foreach($producciones as $product){ 
                $condadorPar++;
                $arrayProduccion[] = $product->id;
                if($condadorPar == 2 && $product->estadoProduccion == "FINALIZADO" ){

                var_dump($arrayProduccion );
                ?>


            <th>
            <td>
                Hectarea de Produccion No. <?php echo $arrayProduccion[0].", ".$arrayProduccion[1]; ?>
            </td>
            <td>
                <a onclick="generarPdf(<?php echo $arrayProduccion[0].', '.$arrayProduccion[1]; ?>)"
                    class="btn btn-sm btn-primary">Generar
                    Reporte</a>
            </td>
            </th>

            <?php
                     $arrayProduccion= [];
                    $condadorPar = 0;
                } 
            }
            ?>




        </table>

        <br><br><br><br><br><br><br><br><br><br>


        <script>
        function generarPdf(id1, id2) {
            console.log(id1);
            console.log(id2);


            window.open('GenerarReportes/GenerarReporteHectarea.php?id1='+id1+'&id2='+id2 ,'_black');





        }
        </script>