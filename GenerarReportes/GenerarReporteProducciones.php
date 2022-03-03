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
include "./../core/controller/Database.php";
include "./../core/controller/Executor.php";
include "./formatsPDF/Producciones.php";

    $idProduccion = $_GET['id'];
  //  echo "<br>";
   // echo "<br>";echo "<br>";

    //Calling to Models
    $produccion_Model = ProductionData::getById( $idProduccion);
    
    $novedadesProduccion_Model = NovedadData::getAllNovedadesByProduccion( $idProduccion);
    $personProduccion_Model = PersonData::getAllByProduccion( $idProduccion);
    $aguaCantidad_model = ProductionProduct::getAguaCantidad( $idProduccion);

    $insumoCantidadPrecios_Model = ProductionProduct::getInsumosCantidadPrecio( $idProduccion);//!!!idProducto == PRECIO ENTRADA // cantidad== CANTIDAD // condicion == UNIDAD
 
    $aguaCantidad_model = ProductionProduct::getAguaCantidad( $idProduccion);
    $equiposCantidadPrecios_Model = ProductionProduct::getEquiposCantidadPrecio( $idProduccion);//!!!idProducto == PRECIO ENTRADA // cantidad== CANTIDAD // condicion == UNIDAD
    

  //  var_dump( $equiposCantidadPrecios_Model );


    /**
     * Días de producción 
    */    
    $fechaInicio = date("Y-m-d", strtotime($produccion_Model->fecha_inicio));
    $fechaFin = date("Y-m-d", strtotime($produccion_Model->fecha_fin)); 
    $diasObtenidos = dias_transcurridos($fechaInicio,$fechaFin );
 
    /**
     * Calculo de Novedad
    */
    
   $totalNovedad = 0;
   if(count($novedadesProduccion_Model)>0){
       foreach ($novedadesProduccion_Model as $novedad) {
           $totalNovedad += $novedad->valor;
       }
   }

    /**
     * Calculo de Empleados
    */
    
   $totalSueldoEmpleado = 0;
    if(count($personProduccion_Model)>0){
        foreach ($personProduccion_Model as $person) {
            $totalSueldoEmpleado += $person->sueldo;
        }
    }
    // calculos del empleado
    $totalEmpleado = $totalSueldoEmpleado / $diasObtenidos;



    /**
     * Calculo de Agua
    */


    $totalAgua = $aguaCantidad_model->cantidad * 1;



 /**
     * Calculo de Insumos
    */


   // idProducto == PRECIO ENTRADA     cantidad== CANTIDAD       condicion == UNIDAD
    $totalInsumo = 0;
    if(count($insumoCantidadPrecios_Model)>0){
        foreach ($insumoCantidadPrecios_Model as $insumo) {
            $totalInsumo += ($insumo->idProducto / $insumo->condicion)  * $insumo->cantidad;
        }
    }
 /**
     * Calculo de Depreciación de Equipo
    */
    
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
                // condicion === nombre
              //  var_dump( $equipo );
            }
            $arrayProductosMeses[] = $mesesDepreciadoss;

          //  $totalInsumo += ($insumo->idProducto / $insumo->condicion)  * $insumo->cantidad;
        }
    }


    

   
    // NOVEDAD
   // echo "novedad: ".$totalNovedad."$";
   // echo "<br>";echo "<br>";
    //      EMPLEADO
   // echo "Sueldo Empleado: $totalSueldoEmpleado"."$";
   // echo "<br> Dias de produccion: $diasObtenidos";
//echo "<br>";
  //  echo "Empleado: ".  round($totalEmpleado, 2)."$";
   // echo "<br>";echo "<br>";
  //  echo "Agua:".$totalAgua."$";
  //  echo "<br>";echo "<br>";
   // echo "Insumos:".round($totalInsumo, 2)."$";
   // echo "<br>";echo "<br>";
    
   // echo "<br>";echo "<br>";
    for ($i=0; $i < count($arrayProductos); $i++) { 
     //   echo "Equipos:".$arrayProductos[$i];
    //    echo "<br>";
    ///    echo "Tiempo:".$arrayProductosMeses[$i]." Meses";
     //   echo "<br>"; echo "<br>";
    }
 //   echo "<br>"; 





    $TotalProduccion = $totalNovedad + $totalSueldoEmpleado + $totalAgua + $totalInsumo;


   // echo "Total de Producción: ".round($TotalProduccion, 2)."$";
   // echo "<br>";echo "<br>";

 
   $pdf = new FPDF();
    $pdf->AddPage('P', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTopMargin(10);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);

    
    /* --- Text --- */
    $pdf->SetFont('', 'B', 12);
    // $tITLE = array('','SISTEMA PRODUCCION MBTA', '');
    $pdf->Text(71, 17,utf8_decode( 'REPORTE DE COSTO DE PRODUCCIÓN')  );
    /* --- Text --- */
    $pdf->Text(24, 35, utf8_decode('PRODUCCIÓN NO.').$idProduccion);
    $pdf->Text(75, 35, 'FECHA INICIO: '.date("Y-m-d",strtotime($produccion_Model->fecha_inicio)));
    $pdf->Text(135, 35, 'FECHA INICIO: '.date("Y-m-d",strtotime($produccion_Model->fecha_fin)));
    /* --- Text --- */
    $pdf->Text(24, 55, 'Novedades: ');
    $pdf->SetFont('', '', 12);
    $pdf->Text(80, 55, $totalNovedad."$");
    
    /* --- Text --- */
    $pdf->SetFont('', 'B', 12);
    $pdf->Text(24, 65, 'Empleado: ');
    $pdf->SetFont('', '', 12);
    $pdf->Text(80, 65, $totalSueldoEmpleado."$");
    
    /* --- Text --- */
    $pdf->SetFont('', 'B', 12);
    $pdf->Text(24, 75, 'Agua: ');
    $pdf->SetFont('', '', 12);
    $pdf->Text(80, 75, $totalAgua."$");
    /* --- Text --- */
    $pdf->SetFont('', 'B', 12);
    $pdf->Text(24, 85, 'Insumos: ');
    $pdf->SetFont('', '', 12);
    $pdf->Text(80, 85, round($totalInsumo, 2)."$");
    /* --- Text --- */
    $pdf->SetFont('', 'B', 12);
    $pdf->Text(24, 95 ,  utf8_decode('Depreciación de Equipo')  );
    $dimension = 105;
    for ($i=0; $i < count($arrayProductos); $i++) { 
        // $dimension = 110;
        $pdf->SetFont('', 'B', 12);
        $pdf->Text(35, $dimension, 'Equipo: '  );
        $pdf->SetFont('', '', 12);
        $pdf->Text(55, $dimension,  utf8_decode($arrayProductos[$i])  );
        $pdf->SetFont('', 'B', 12);
        $dimension +=8; 
        
        $pdf->Text(35,$dimension , 'Tiempo:' );
        $pdf->SetFont('', '', 12);
        $pdf->Text(55,$dimension , $arrayProductosMeses[$i]  );
        $dimension +=8; 

       }



    /* --- Text --- */
    $pdf->SetFont('', 'B', 12);
    $pdf->Text(24, $dimension+7, utf8_decode( 'Total Costo de Producción : ')  );
    $pdf->SetFont('', '', 12);
    $pdf->Text(80, $dimension+7, round($TotalProduccion, 2)."$" );

    $pdf->Output('created_pdf.pdf','I');
    
    function dias_transcurridos($fechaInicio,$fechaFin) {
   
        $datetime1 = date_create($fechaInicio);
        $datetime2 = date_create($fechaFin);
        $DiasTranscurridos = date_diff($datetime1, $datetime2);
        $differenceFormat = '%a';       
        return $DiasTranscurridos->format($differenceFormat);
    }

?>