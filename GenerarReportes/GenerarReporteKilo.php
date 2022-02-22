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


 //   var_dump($_GET['id']);
    $idProduccionGet = 75;

    //Models
    $produccion_Model = TotalProduccion2::getById( $idProduccionGet);
        
    //var_dump(  $produccion_Model);
    $costoProduccion = GenerarCostoProduccion($idProduccionGet);
 //   echo $costoProduccion;


    $costoUnitario = $costoProduccion /  $produccion_Model->total_produccion;


    // AQUI MULTIPLICAR POR PRODUCTO>.....

    $costoXKilo = $costoUnitario / 12;

    




   /// echo "<br>";
   // echo $costoXKilo;


    $pdf = new FPDF();
    $pdf->AddPage('P', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTopMargin(10);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);



  /* --- Text --- */
  $pdf->SetFont('', 'B', 12);
  $pdf->Text(71, 17, 'COSTO POR KILO');
  /* --- Text --- */

  $wid=40;

/*   $pdf->Text(24, $wid, 'Total costo de Producción: ');
  /* --- Text --- */
  $pdf->SetFont('', 'B', 12);
  $pdf->Text(24, $wid, 'Total costo de Produccion: ');
  $pdf->SetFont('', '', 12);
  $pdf->Text(80, $wid, round( $costoProduccion , 2).'$');
  
  $pdf->SetFont('', 'B', 12);
  $pdf->Text(24, $wid+=10, 'Total Produccion: ');
  $pdf->SetFont('', '', 12);
  $pdf->Text(80, $wid, round( $produccion_Model->total_produccion , 2).'$');

  $pdf->SetFont('', 'B', 12);
  $pdf->Text(24, $wid+=10, 'Costo Unitario: ');
  $pdf->SetFont('', '', 12);
  $pdf->Text(80, $wid, round( $costoUnitario , 2).'$');


  $pdf->SetFont('', 'B', 12);
  $pdf->Text(24, $wid+=10, 'Costo por Kilo: ');
  $pdf->SetFont('', '', 12);
  $pdf->Text(80, $wid, round( $costoXKilo , 2).'$');
















    $pdf->Output('created_pdf.pdf','I');
    








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