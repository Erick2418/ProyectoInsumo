
<div class="row">
    <div class="col-md-12">
        <h1>Detalles de la Producción</h1>
        <br>
        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct"
            action="index.php?view=addTotalProduccion" role="form">

            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Total Productos *</label>
                <div class="col-md-6">
                    <input type="number" name="total_productos" class="form-control" required id="total_productos" placeholder="Ingrese Total Productos">
                </div>
            </div>
            <div class="form-group">
                <label for="num_lot" class="col-lg-2 control-label">Total Hijuelos</label>
                <div class="col-md-6">
                    <input type="number" name="total_hijuelos" class="form-control" required id="total_hijuelos"
                        placeholder="Descripción">
                </div>
            </div>
            <div class="form-group" style="display:none;" >
                <label for="idProduccion" class="col-lg-2 control-label">IdProduccion*</label>
                <div class="col-md-6">
                    <input type="text"  value="<?php echo $_GET['id']; ?>" name="idProduccion" class="form-control" required id="idProduccion"
                        placeholder="Ingrese Total Hijuelos">
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                    <button type="button" onclick="regresar()" class="btn btn-secondary">Regresar</button>
                        <button type="submit" class="btn btn-primary">Finalizar Produccion</button>
                    </div>
                </div>
        </form>

    </div>
</div>

<script>
    function regresar(){
        window.location='index.php?view=produccion';
    }
</script>