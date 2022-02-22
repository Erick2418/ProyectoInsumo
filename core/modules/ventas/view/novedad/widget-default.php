<?php
$novedades = NovedadData::getAllNovedd();
	
?>


<div class="row">
    <div class="col-md-12">

        <h1>Lista de Novedades</h1>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <br>


        <table class="table table-bordered table-hover">
            <thead>
                <th>Fecha Novedad </th>
                <th>No. Producción</th>
                <th>Tipo Novedad</th>
                <th>Descripción</th>
                <th>Valor</th>
                <th>Acciones</th>
            </thead>
            <?php
			foreach($novedades as $novedad){ ?>
            <tr>
                <td><?php echo $novedad->fecha_novedad ?></td>
                <td><?php echo $novedad->id_produccion ?></td>
                <td><?php echo $novedad->id_tipoNovedad ?></td>
                <td><?php echo $novedad->descripcion ?></td>
                <td><?php echo $novedad->valor ?></td>
                <td>
                    <a href="index.php?view=delLot&amp;id=<?php echo $novedad->id ?>" class="btn btn-xs btn-danger"><i
                            class="fa fa-trash"></i></a>
                    <a href="index.php?view=editarNovedades&amp;id=<?php echo $novedad->id ?>" class="btn btn-xs btn-warning"><i
                            class="glyphicon glyphicon-pencil"></i></a>
                </td>
            <tr>
                <?php
			}
			
			
	?>
        </table>