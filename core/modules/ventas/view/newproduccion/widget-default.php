<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
/* Center the loader */
#loader {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 1;
    width: 120px;
    height: 120px;
    margin: -76px 0 0 -76px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

/* Add animation to "page content" */
.animate-bottom {
    position: relative;
    -webkit-animation-name: animatebottom;
    -webkit-animation-duration: 1s;
    animation-name: animatebottom;
    animation-duration: 1s
}

@-webkit-keyframes animatebottom {
    from {
        bottom: -100px;
        opacity: 0
    }

    to {
        bottom: 0px;
        opacity: 1
    }
}

@keyframes animatebottom {
    from {
        bottom: -100px;
        opacity: 0
    }

    to {
        bottom: 0;
        opacity: 1
    }
}

#myDiv {
    display: none;
    text-align: center;
}
</style>
<?php 

if(!isset($_COOKIE["var_cookie"])) {
    // No existe la cookie
    $cookie_value =mt_rand(1,100000);
    setcookie("var_cookie", $cookie_value,  time() + 10000 , "/");
}
// Cargando Combos
$categories = CategoryData::getAll();
$users = PersonData::getClients();
$lots = LotData::getAll();
$labores = LaboresData::getAll();

  
$productProduction = ProductionProduct::getAll();
$id_temporal = " ";
if(!isset($_COOKIE["var_cookie"])) {
    header("refresh:1;url=index.php?view=newproduccion" );
    echo " <script> console.log('NO HAY COOKIE');   </script>";
    echo "<div id='loader'></div>";
    die();
 }else{
    echo " <script> console.log('SI HAY COOKIE');   </script>";
    $id_temporal = $_COOKIE["var_cookie"];    
 }
 
   
$stockProductos = ProductData::getAllProductFromCantidad();
 

?>


<div class="row animate-bottom" id="divMain">
    <div class="col-md-12">
        <h1>Nueva Producción</h1>
        <br>
        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct"
            action="index.php?view=addProducciong" onsubmit="return validarProduccion()" role="form">


            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Lote*</label>
                <div class="col-md-6">
                    <select name="lote_id" id="selectLote" class="form-control">
                        <option value="">-- NINGUNA --</option>
                        <?php foreach($lots as $lot):?>
                        <option value="<?php echo $lot->id;?>"><?php echo $lot->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Labor*</label>
                <div class="col-md-6">
                    <select name="labores_id" id="selectLabor" class="form-control">
                        <option value="">-- NINGUNA --</option>
                        <?php 
                        $fistValor = 0;
                        
                        foreach($labores as $labor){
                            $fistValor= $fistValor+1;


                            if($fistValor == 1){
                                ?>
                                <option  value="<?php echo $labor->idlabores;?>"><?php echo $labor->nombre;?></option>
                                <?php 
        
                            }else{
                            ?>
                        <option  disabled value="<?php echo $labor->idlabores;?>"><?php echo $labor->nombre;?></option>
                        <?php 


                            }



                    };?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Empleado*</label>
                <div class="col-md-6">
                    <select name="empleado_id" id="selectEmpleado" class="form-control">
                        <option value="">-- NINGUNA --</option>
                        <?php foreach($users as $user):?>
                        <option value="<?php echo $user->id;?>"><?php echo $user->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Fecha Comienzo*</label>
                <div class="col-md-6">
                    <input onchange="myFunction()" type="date" name="inputFechaComienzo" class="form-control"
                        id="inputFechaComienzo" placeholder="Descripción">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Fecha Fin*</label>
                <div class="col-md-6">
                    <input type="date" name="inputFechaFin" min="2014-05-11" class="form-control" id="inputFechaFin"
                        placeholder="Descripción">
                </div>
            </div>

            <!-- style="display:none" -->
            <div class="form-group" style="display:none">
                <label for="idTemp" class="col-lg-2 control-label">idTemp</label>
                <div class="col-md-6">
                    <input type="text" name="idTemp" class="form-control" id="idTemp" placeholder="idTemp">
                </div>
            </div>
            <div class="form-group" style="display:none">
                <label for="idsproductos" class="col-lg-2 control-label">idsproductos</label>
                <div class="col-md-6">
                    <input type="text" name="idsproductos" class="form-control" id="idsproductos"
                        placeholder="idsproductos">
                </div>
            </div>

            <br><br>


            <!--- =======================
                PANEL PRODUCTOS
            ================================ -->

            <div class="panel panel-info">
                <div class="panel-heading">Productos e Insumos</div>
                <div class="panel-body">

                    <button style="margin-bottom:6px;" type="button" class="btn btn-success" aria-label="Left Align"
                        data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;Agregar</span>
                    </button>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>idProducto</th>
                            <th>Cantidad</th>
                            <th>Nombre</th>
                            <th style="display:none;" >IdTemp</th>
                           
                        </thead>
                        <tbody id="tableProductos">

                            <?php
            $valorIncremental = 0;
			foreach($productProduction as $pp){
                $valorIncremental = $valorIncremental + 1 ;
                  ?>
                            <tr id="tr_<?php  echo $valorIncremental; ?>">
                                <td style="display:none;"><?php echo $pp->id; ?></td>
                                <td><?php echo $pp->idProducto; ?></td>
                                <td><?php echo $pp->cantidad; ?></td>
                                <td><?php echo $pp->name; ?></td>
                                <td style="display:none;" ><?php echo $pp->id_temp; ?></td>
                                
                            <tr>
                                <?php
			}
			
			
	?>
                        </tbody>
                    </table>

                </div>
            </div>
            <br><br><br>
            <div class="form-group">

                <div class="form-group">
                    <div class="col col-lg-10">
                        <!-- type="submit" -->
                        <button onclick="agregarDatosFormulario()" type="submit" class="btn btn-primary">Agregar
                            Producción</button>
                    </div>
                </div>
        </form>

    </div>
</div>



<!-- =================================
            Modal
==================================== -->
<div class="modal fade" id="myModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h4 class="modal-title" id="myModalLabel">Agregar un Producto</h4>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addCategory"
                    action="index.php?view=addProductProduccion" onsubmit="return validarProducto()" role="form">

                    <div class="form-group" style="display:none;">

                        <label for="exampleInputPassword1">IDGENERADO</label>
                        <input type="text" class="form-control" value="<?php echo $id_temporal; ?>" name="idgenerado"
                            id="idgenerado" placeholder="IDGENERADO">

                    </div>


                    <div class="form-group">

                        <label for="exampleInputPassword1">Cantidad</label>
                        <input type="text" class="form-control" name="numCantidad" id="numCantidad"
                            placeholder="Ingrese Cantidad">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Seleccione Categoria: </label>

                        <select onchange="onSelectCategory()" name="category_id" id="selectCategory"
                            class="form-control">
                            <option value="">-- NINGUNA --</option>
                            <?php foreach($categories as $category):?>
                            <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group">


                        <div id="respuesta"></div>
                        <script>
                        function onSelectCategory() {
                            console.log('CAMBIO ESTO');

                            let categoria = 'Categoria=' + document.getElementById("selectCategory").value;
                            $.ajax({
                                    url: 'core/modules/ventas/view/newproduccion/comboProductos.php',
                                    type: 'POST',
                                    data: categoria,
                                })
                                .done(function(res) {
                                    $('#respuesta').html(res)
                                })

                        }
                        </script>


                    </div>
                    <!-- <div class="modal-footer">
                      
                    </div> -->
                    <!-- <button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar</button> -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Añadir Producto</button>
                </form>



            </div>




        </div>
    </div>
</div>

<script>
var IdProductos = [];

function myFunction() {
    var fehaInicio = document.getElementById("inputFechaComienzo").value;
    var fechaFin = document.getElementById("inputFechaFin");
    fechaFin.min = fehaInicio;
}

function agregarDatosFormulario() {

    let tabla = document.getElementById('tableProductos');
    console.log(tabla)
    var jsonDatosProductos = "";
    if (tabla.hasChildNodes()) {

        var children = tabla.childNodes;

        for (var i = 1; i < children.length - 1; i++) {
            if (i % 2 != 0) { // extraniamente trae una basura de un td vacio por eso se filtra los impares
                console.log('Imprimiendo')
                // este es el id de la tabla Producto_produccion
                jsonDatosProductos = jsonDatosProductos + "," + children[i].cells[0].innerText;

            }
        }
        //   console.log(JSON.stringify( jsonDatosProductos) );

        document.getElementById("idsproductos").value = jsonDatosProductos.substring(1, jsonDatosProductos.length);
    }
}


function validarStock(cantidad, idProduct) {
    // si retorna falso es por que aun tiene productos

    var arrayJS = <?php echo json_encode($stockProductos);?>;
    var esMayor = false;
    arrayJS.map(
        data => {
            if (data.id == idProduct) {
                let cantDisponible = parseInt(data.unit) - parseInt(data.inventary_min);
                if (parseInt(cantidad) > cantDisponible) {
                    console.log(parseInt(data.inventary_min));
                    console.log(parseInt(data.unit));
                    let mensaje = "Cantidad Ingresada:" + cantidad + ", Cantidad Disponible: " + cantDisponible;

                    swal("Stock Insuficiente", mensaje, 'warning');
                    esMayor = true;
                } else {

                }


            }

        }
    )

    return esMayor;


}

function validarProducto() {
    console.log('validanding')

    let numbCantidad = document.getElementById("numCantidad").value;

    let categoria = document.getElementById("selectCategory").value;

    if (!categoria.trim()) {
        swal("Debe seleccionar una Categoria", '', 'warning');
        console.log('debe ingresar categoria');
        return false;
    }
    if (!numbCantidad.trim()) {
        swal("Ingresar una Cantidad", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }

    let productt = document.getElementById("selectProducto").value;
    if (!productt.trim()) {
        swal("Debe seleccionar un Producto", '', 'warning');
        console.log('debe ingresar producto');
        return false
    }


    if (validarProductoRepetido(productt)) {
        swal("El producto ya esta ingresado", '', 'warning');
        console.log('debe ingresar producto');
        return false;
    }


    if (validarStock(numbCantidad, productt)) {
        return false
    }

    // Validar que el producto ya este ingresado!!!!
    // para evitar que se lleve menos del stock

    return true;
}

function validarProductoRepetido(productt) {

    let tabla = document.getElementById('tableProductos');
    console.log(tabla)
    var esIgual = false;
    //  var jsonDatosProductos = "";
    if (tabla.hasChildNodes()) {

        var children = tabla.childNodes;

        for (var i = 1; i < children.length - 1; i++) {
            if (i % 2 != 0) { // extraniamente trae una basura de un td vacio por eso se filtra los impares
                console.log('Imprimiendo')
                // este es el id de la tabla Producto_produccion
                // jsonDatosProductos = jsonDatosProductos + "," + children[i].cells[0].innerText;
                IdProductos.push({
                    idProducto: children[i].cells[1].innerText
                })
            }
        }
        //   console.log(JSON.stringify( jsonDatosProductos) );

        //  document.getElementById("idsproductos").value = jsonDatosProductos.substring(1, jsonDatosProductos.length);
    }

    if (IdProductos.length > 0) {
        console.log('HERE')
        console.log(IdProductos);
        IdProductos.map(
            data => {
                if (data.idProducto == productt) {
                    esIgual = true;
                    console.log('ES IGUAL')
                } else {
                    console.log('no es igual')
                }
            }
        )


    }
    return esIgual;

}


function validarProduccion() {

    console.log('hey');

    let selectLote = document.getElementById("selectLote").value;

    let selectLabor = document.getElementById("selectLabor").value;

    let selectEmpleado = document.getElementById("selectEmpleado").value;

    let inputFechaComienzo = document.getElementById("inputFechaComienzo").value;

    let inputFechaFin = document.getElementById("inputFechaFin").value;



    if (!selectLote.trim()) {
        swal("Seleccione un Lote", '', 'warning');
        console.log('debe ingresar Lote');
        return false
    }

    if (!selectLabor.trim()) {
        swal("Seleccione un Labor", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }

    if (!selectEmpleado.trim()) {
        swal("Seleccione un Empleado", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }

    if (!inputFechaComienzo.trim()) {
        swal("Seleccione una Fecha Inicio", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }

    if (!inputFechaFin.trim()) {
        swal("Seleccione una Fecha Fin", '', 'warning');
        console.log('debe ingresar catnidad');
        return false
    }

    return true;
}


const miVariableEnJavaScript = "<?php echo $id_temporal; ?>";
document.getElementById("idgenerado").value = miVariableEnJavaScript + "";
document.getElementById("idTemp").value = miVariableEnJavaScript + "";
</script>