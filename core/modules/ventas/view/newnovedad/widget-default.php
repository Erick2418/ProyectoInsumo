    <?php 
$tipoNovedades = CategoryData::getTipoNovedad();

    ?>
    <div class="row">
        <div class="col-md-12">
            <h1>Nueva Novedad</h1>
            <br>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct"
                action="index.php?view=addNovedad" role="form">

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Fecha *</label>
                    <div class="col-md-6">
                        <input type="date" name="fecha_ingreso" class="form-control" required id="fecha_ingreso">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Producción*</label>
                    <div class="col-md-6">
                    <input style="display:none"  type="text" value= "<?php  echo $_GET['id']; ?>" name="producciones" class="form-control" required id="fecha_ingreso">
                        <select name="id_Produccion" class="form-control" disabled>
                            <option value=""> <?php  echo $_GET['id']; ?> </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Costo</label>
                    <div class="col-md-6">
                        <select name="tipo_novedad" class="form-control">
                            <option value="">-- NINGUNA --</option>
                            <?php foreach($tipoNovedades as $novedad):?>
                            <option value="<?php echo $novedad->id;?>"><?php echo $novedad->nombre;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Descripción*</label>
                    <div class="col-md-6">
                        <input type="text" name="descripcion" class="form-control" required id="descripcion"
                            placeholder="Descripción">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Valor *</label>
                    <div class="col-md-6">
                        <input type="number" name="valor" class="form-control" required id="descripcion"
                            placeholder="Descripción">
                    </div>
                </div>

                <div class="form-group">

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">Agregar Novedad</button>
                        </div>
                    </div>
            </form>

        </div>
    </div>