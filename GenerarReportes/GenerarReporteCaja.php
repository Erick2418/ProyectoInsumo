<?php


require('./../pdfGENERATOR/fpdf/fpdf.php');
include "./../core/modules/ventas/model/Production.php";
include "./../core/modules/ventas/model/Lot.php";
include "./../core/modules/ventas/model/NovedadData.php";
include "./../core/modules/ventas/model/SubProductionData.php";
include "./../core/modules/ventas/model/PersonData.php";
include "./../core/modules/ventas/model/LaboresData.php";
include "./../core/modules/ventas/model/ProductData.php";
include "./../core/modules/ventas/model/ProductionProduct.php";
include "./../core/modules/ventas/model/DepresiacionData.php";
include "./../core/modules/ventas/model/TotalProduccion2.php";
include "./../core/controller/Database.php";
include "./../core/controller/Executor.php";


 //   $idProduccion = $_GET['id'];
  //  echo "<br>";
  //  echo "<br>";echo "<br>";


    var_dump($_GET['id']);
    $idProduccionGet = $_GET['id'];

    //Models
    $produccion_Model = TotalProduccion2::getById( $idProduccionGet);
        
    var_dump(  $produccion_Model);
    $costoProduccion = GenerarCostoProduccion($idProduccionGet);
    echo $costoProduccion;


    $costoUnitario = $costoProduccion /  $produccion_Model->total_produccion;

    echo "<br>";
    echo $costoUnitario;



    $costoPorCaja = $costoUnitario*6;



    echo "<br>";
    echo $costoPorCaja;
















    function GenerarCostoProduccion($idProduccion){



        
        $produccion_Model = ProductionData::getById( $idProduccion);
        $novedadesProduccion_Model = NovedadData::getAllNovedadesByProduccion( $idProduccion);
        $personProduccion_Model = PersonData::getAllByProduccion( $idProduccion);
        $aguaCantidad_model = ProductionProduct::getAguaCantidad( $idProduccion);

        $insumoCantidadPrecios_Model = ProductionProduct::getInsumosCantidadPrecio( $idProduccion);//!!!idProducto == PRECIO ENTRADA // cantidad== CANTIDAD // condicion == UNIDAD
    
        $aguaCantidad_model = ProductionProduct::getAguaCantidad( $idProduccion);
        $equiposCantidadPrecios_Model = ProductionProduct::getEquiposCantidadPrecio( $idProduccion);//!!!idProducto == PRECIO ENTRADA // cantidad== CANTIDAD // condicion == UNIDAD

        $fechaInicio = date("Y-m-d", strtotime($produccion_Model->fecha_inicio));
        $fechaFin = date("Y-m-d", strtotime($produccion_Model->fecha_fin)); 
        $diasObtenidos = dias_transcurridos($fechaInicio,$fechaFin );

        $totalNovedad = 0;
        if(count($novedadesProduccion_Model)>0){
            foreach ($novedadesProduccion_Model as $novedad) {
                $totalNovedad += $novedad->valor;
            }
        }

        $totalSueldoEmpleado = 0;
            if(count($personProduccion_Model)>0){
                foreach ($personProduccion_Model as $person) {
                    $totalSueldoEmpleado += $person->sueldo;
                }
            }

        $totalEmpleado = $totalSueldoEmpleado / $diasObtenidos;

        $totalAgua = $aguaCantidad_model->cantidad * 1;

        $totalInsumo = 0;
        if(count($insumoCantidadPrecios_Model)>0){
            foreach ($insumoCantidadPrecios_Model as $insumo) {
                $totalInsumo += ($insumo->idProducto / $insumo->condicion)  * $insumo->cantidad;
            }
        }

        $totalMesesDepreciacion = 0;
        $arrayProductos = array();
        $arrayProductosMeses = array();
        if(count($equiposCantidadPrecios_Model)>0){
            foreach ($equiposCantidadPrecios_Model as $equipo) {
                $arrayProductos[] = $equipo->condicion;//le asignamos el nombre
                $mesesDepreciadoss = 0;
                for ($i=0; $i < $equipo->cantidad ; $i++) { 
                    $mesesDepreciacion = DepresiacionData::getById($equipo->idProducto );
                    $mesesDepreciadoss += $mesesDepreciacion->meses;

                }
                $arrayProductosMeses[] = $mesesDepreciadoss;


            }
        }

        /*
        echo "novedad: ".$totalNovedad."$";
        echo "<br>";echo "<br>";

        echo "Empleado: ".  round($totalEmpleado, 2)."$";
        echo "<br>";echo "<br>";
        echo "Agua:".$totalAgua."$";
        echo "<br>";echo "<br>";
        echo "Insumos:".round($totalInsumo, 2)."$";
        echo "<br>";echo "<br>";
        
        echo "<br>";echo "<br>";
        */
        /*
        for ($i=0; $i < count($arrayProductos); $i++) { 
            echo "Equipos:".$arrayProductos[$i];
            echo "<br>";
            echo "Tiempo:".$arrayProductosMeses[$i]." Meses";
            echo "<br>"; echo "<br>";
        }
        echo "<br>"; 
*/
 

        $TotalProduccion = $totalNovedad + $totalSueldoEmpleado + $totalAgua + $totalInsumo;
        return  $TotalProduccion;

     //   echo "Total de Producción: ".round($TotalProduccion, 2)."$";
     //   echo "<br>";echo "<br>";

    }

    function dias_transcurridos($fechaInicio,$fechaFin) {
   
        $datetime1 = date_create($fechaInicio);
        $datetime2 = date_create($fechaFin);
        $DiasTranscurridos = date_diff($datetime1, $datetime2);
        $differenceFormat = '%a';       
        return $DiasTranscurridos->format($differenceFormat);
    }
?>