    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php 
$tipoNovedades = CategoryData::getTipoNovedad();

    ?>
    <div class="row">
        <div class="col-md-12">
            <h1>Nueva Novedad</h1>
            <br>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" onsubmit="return validarNovedad()" action="index.php?view=addNovedad" role="form">

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Fecha *</label>
                    <div class="col-md-6">
                        <input type="date"  name="fecha_ingreso"  min="<?= date('Y-m-d'); ?>"  class="form-control"  id="fecha_ingreso">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Producción*</label>
                    <div class="col-md-6">
                    <input style="display:none"  type="text" value= "<?php  echo $_GET['id']; ?>" name="producciones" class="form-control"  id="fecha_ingreso">
                        <select name="id_Produccion" class="form-control" disabled>
                            <option value=""> <?php  echo $_GET['id']; ?> </option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group" style="display:none">
                    <label for="inputEmail1" class="col-lg-2 control-label">Producción*</label>
                    <div class="col-md-6">
                    <input style="display:none"  type="text" value= "<?php  echo $_GET['id_lote']; ?>" name="id_lote" class="form-control"  id="id_lote">
                        <select name="id_lote" class="form-control" disabled>
                            <option value=""> <?php  echo $_GET['id']; ?> </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Costo</label>
                    <div class="col-md-6">
                        <select name="tipo_novedad" id="selectTipoNovedad"  class="form-control">
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
                        <input type="text"  name="descripcion" class="form-control"  id="descripcion"
                            placeholder="Descripción">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Valor *</label>
                    <div class="col-md-6">
                        <input type="number" name="valor" class="form-control"  id="inputValor"
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


    <script>

     
function validarNovedad() {
    console.log('hey');


    let fecha_ingreso = document.getElementById("fecha_ingreso").value;

    let selectTipoNovedad = document.getElementById("selectTipoNovedad").value;

    let descripcion = document.getElementById("descripcion").value;

    let inputValor = document.getElementById("inputValor").value;
 
    
    if (!fecha_ingreso.trim()) {
        swal("Seleccione una fecha Ingreso", '', 'warning');
        console.log('debe ingresar Lote');
        return false
    }
   
    if (!selectTipoNovedad.trim()) {
        swal("Seleccione una Novedad", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }
    
    if (!descripcion.trim()) {
        swal("Ingrese una Descripción", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }
    
    if (!inputValor.trim()) {
        swal("Ingrese un Valor", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }
 

    return true;
}


    </script>