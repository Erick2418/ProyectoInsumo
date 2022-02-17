<?php 
 
$labor = LaboresData::getById($_GET["id"]);
    ?>
<div class="row">
    <div class="col-md-12">
        <h1>Editar Labor</h1>
        <br>
        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct"
            action="index.php?view=updateLabor&amp;id=<?php echo $labor->idlabores ?>"" role=" form">

            <div class="form-group">
                <label for="nombre" class="col-lg-2 control-label"> Labor *</label>
                <div class="col-md-6">
                    <input value="<?php echo $labor->nombre;?>" type="text" name="nombre" class="form-control" required
                        id="nombre" placeholder="Descripción">
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion" class="col-lg-2 control-label">Descripción</label>
                <div class="col-md-6">
                        <input value="<?php echo $labor->descripcion;?>" type="text" name="descripcion" class="form-control" required
                        id="descripcion" placeholder="Descripción">
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Actualizar Labor</button>
                </div>
            </div>
        </form>

    </div>
</div>