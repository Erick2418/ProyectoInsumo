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
                    <li><a href="../products/report/products-word.php">Word 2007 (.docx)</a></li>
                </ul>
            </div>
        </div>
        <h1>Lista de Producciones</h1>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <br>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Lote</th>
                <th>labor</th>
                <th>Fecha Comienzo</th>
                <th>Fecha Fin</th>
                <th>Novedad</th>
                <th>Estado de la Producción</th>
                <th>Acciones</th>

            </thead>




            <?php
			foreach($producciones as $product){  ?>
            <tr>
                <td><?php echo $product->id_lote ?></td>
                <td><?php echo $product->id_labores ?></td>
                <td><?php echo $product->fecha_inicio ?></td>
                <td><?php echo $product->fecha_fin ?></td>
                
                <td>Ingresar Novedad <a href="index.php?view=newnovedad"> </a><i class="fa fa-tasks"></i></td>
                <td>IN PROGRESS</td>

                <td style="width:70px;">

                    <a href="../products/index.php?view=editproduct&amp;id=<?php //echo $product->id; ?>"
                        class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="../products/index.php?view=delproduct&amp;id=<?php //echo $product->id; ?>"
                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>

            <tr>
                <?php
			}

			?>













        </table>

        <br><br><br><br><br><br><br><br><br><br>