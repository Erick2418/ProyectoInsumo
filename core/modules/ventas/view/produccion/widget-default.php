<?php
	$producciones = ProductionData::getAll();

?>

<script>
//    document.cookie = "var_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
document.cookie = "var_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
</script>

<div class="row">
    <div class="col-md-12">
        <div class="btn-group  pull-right">
            <a onclick="asignarIDnew();" href="index.php?view=newproduccion" class="btn btn-default">Agregar
                Producción</a>
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">

                    <li><a onclick="generarPdf()">PDF</a></li>
                </ul>
            </div>
        </div>
        <h1>Lista de Producciones</h1>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <br>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Histórico</th>
                <th>Lote</th>
                <th>labor</th>
                <th>Fecha Comienzo</th>
                <th>Fecha Fin</th>
                <th>Novedad</th>
                <th>Estado de la Producción</th>
                <th>Estado</th>
                <th>Acciones</th>

            </thead>




            <?php
			foreach($producciones as $product){  ?>
            <tr>
                <td>
                    <a href="index.php?view=historicosProducciones&amp;id=<?php echo $product->id; ?>"
                        class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                </td>
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

                <td>Ingresar Novedad
                    <a
                        href="index.php?view=newnovedad&amp;id=<?php echo $product->id; ?>&amp;id_lote=<?php echo $product->id_labores; ?>">
                        <i class="fa fa-tasks"></i>
                    </a>
                </td>

                <td><?php echo $product->estadoProduccion ?></td>
                <td><?php 
                
                if($product->status == 1 ){
                    echo "Activo";
                }else{
                    echo "Inactivo";
                }
                
                
                ?></td>
                <td style="width:95px;">

                    <?php 
                        if( $product->id_labores != 3  ){ ?>
                    <a style="margin: 5px;" href="index.php?view=newSubProduccion&amp;id=<?php echo $product->id; ?>"
                        class="btn btn-xs btn-success"><i class="glyphicon glyphicon-refresh"></i></a>

                    <?php

                        }
                        

                        if($product->status == 1 ){
                           ?>


                    <a style="margin: 5px;" href="index.php?view=delProduccionF&amp;id=<?php  echo $product->id; ?>"
                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>


                    <?php
                        }else{?>


                    <a style="margin: 5px;" href="index.php?view=reactivarProduccion&amp;id=<?php echo $product->id; ?>"
                        class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>


                    <?php

                            
                        }


                        ?>

                    <?php 
                        
                        
                        if( $product->id_labores == 3 && $product->estadoProduccion != "FINALIZADO" ){ ?>

                    <a style="margin: 5px;" href="index.php?view=totalProduccion&amp;id=<?php echo $product->id; ?>"
                        class="btn btn-xs btn-info"><i class="fa fa-check"></i></a>


                    <?php

                        }
                        
                        ?>
                    <!-- <a style="margin: 5px;" href="index.php?view=totalProduccion&amp;id=<?php //echo $product->id; ?>"
                        class="btn btn-xs btn-info"><i class="fa fa-check"></i></a> -->

                </td>




            <tr>
                <?php
			}

			?>




        </table>

        <br><br><br><br><br><br><br><br><br><br>

        <script>
        function generarPdf() {


            window.open('pdfGENERATOR', '_black');





        }
        </script>