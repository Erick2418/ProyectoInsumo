<?php

require('fpdf/fpdf.php');
include "./../core/modules/ventas/model/Production.php";
include "./../core/modules/ventas/model/Lot.php";
include "./../core/modules/ventas/model/NovedadData.php";
include "./../core/modules/ventas/model/SubProductionData.php";
include "./../core/modules/ventas/model/PersonData.php";
include "./../core/modules/ventas/model/LaboresData.php";
include "./../core/modules/ventas/model/ProductData.php";
include "./../core/controller/Database.php";
include "./../core/controller/Executor.php";

class PDF extends FPDF
{

  
	  
	function BasicTable($header, $data, $novedades,$productos)
	{ 
		foreach($header as $col){
            $this->SetFont('', 'B', 12);
			$this->Cell(60,7,$col,1);
            $this->SetFont('', '', 12);
        }
        $this->Ln();
	 
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(60,6,$col,1);
			$this->Ln();
		}

      
        $longitud = strlen( $novedades);
        if($longitud > 84){
            $this->SetFont('', 'B', 12);
            $this->Cell(30,15,'NOVEDADES','TLR');
            $this->SetFont('', '', 12);
           $newVar=  substr($novedades, 0, 50);  // bcd
            $this->Cell(150,7,$newVar,'TLR');
            $this->Ln();

            $this->Cell(25,15," ",'LRB');
            $newVar=  substr($novedades, 50, $longitud);  // bcd
            $this->Cell(150,7,$newVar,'LRB');
        }else{
            $this->SetFont('', 'B', 12);
            $this->Cell(30,7,'NOVEDADES',1);
            $this->SetFont('', '', 12);
            $this->Cell(150,7,$novedades,1);
        }
         

        $this->Ln();
  
        $longitud = strlen( $productos);
        if($longitud > 84){
            $this->SetFont('', 'B', 12);
            $this->Cell(30,7,'PRODUCTOS','TLR');
            $this->SetFont('', '', 12);
           $newVar=  substr($productos, 0, 50);  // bcd
            $this->Cell(150,7,$newVar,'TLR');
            $this->Ln();

            $this->Cell(30,7," ",'LRB');
            $newVar=  substr($productos, 50, $longitud);  // bcd
            $this->Cell(150,7,$newVar,'LRB');
        }else{
            $this->SetFont('', 'B', 12);
            $this->Cell(30,7,'PRODUCTOS',1);
            $this->SetFont('', '', 12);
            $this->Cell(150,7,$productos,1);
        }
 
        $this->Ln();
        $this->Ln();
       
	} 


    function BasicTable2($header)
	{ 
		foreach($header as $col){
            $this->SetFont('', 'B', 12);
			$this->Cell(60,7,$col);
            $this->SetFont('', '', 12);
        }
         
        $this->Ln();
       
	} 

    
   
}



$pdf = new PDF();

         
$tITLE = array('','SISTEMA PRODUCCION MBTA', '');
$tITLE2 = array('','REPORTE DE PRODUCCIONES', '');


$pdf->SetFont('Arial','',12);
$pdf->AddPage();


$pdf->BasicTable2($tITLE);
$pdf->BasicTable2($tITLE2);
$pdf->Ln();
$pdf->Ln();



$producciones = ProductionData::getAll();
$header = array('Lote','Labor', 'Empleador');
 


                $data =  array (
                    array('LOTE','LABOR', 'EMPLEADOR'),
                    array('LOTE','LABOR', 'EMPLEADOR'),
                    array('LOTE','LABOR', 'EMPLEADOR'),
                    array('LOTE','LABOR', 'EMPLEADOR')
                );
                $novedades = array('Novedades','La novedad1, la novedad 2, la novedad 3 asdasdasdasdasdasdasdasdasdasdas asdasdasdasdasd');

                $productos = array('Produictos','La novedad1, la novedad 2, la novedad 3 asdasdasdasdasdasdasdasdasdasdas asdasdasdasdasd');


    foreach($producciones as $produccion){
 

           $numeroProduccion = $produccion->id;
            $fechaInicio =  $produccion->fecha_inicio;
            $fechaFin =  $produccion->fecha_fin;
            $idEmpleado =  $produccion->id_empleado;
            $estadoProduccion =  $produccion->estadoProduccion;
            $pdf->SetFont('', 'B', 12);
            $pdf->Cell(33,7,'PRODUCCION:');
            $pdf->SetFont('', '', 12);
            $pdf->Cell(70,7,'No.'.$numeroProduccion);

            $pdf->SetFont('', 'B', 12);
            $pdf->Cell(33,7,'FECHA INICIO:');
            $pdf->Cell(60,7,$fechaInicio);
            $pdf->SetFont('', '', 12);
            $pdf->Ln();


            $pdf->SetFont('', 'B', 12);
            $pdf->Cell(33,7,'FECHA FIN:');
            $pdf->SetFont('', '', 12);
            $pdf->Cell(70,7,$fechaFin);

            $pdf->SetFont('', 'B', 12);
            $pdf->Cell(33,7,'ESTADO:');
            $pdf->Cell(60,7, $estadoProduccion );
            $pdf->SetFont('', '', 12);
            $pdf->Ln();


            
            $pdf->Ln();

        /**====================== COLOCAR LOS DATOS DE LA SUBPRODUCCION  */
        //id_productProduction  ==== lote
        // fecha_fin === labor
        // id == empleado name
        
            $subProducciones = SubProductionData::getAllById(  $numeroProduccion   );
         //   var_dump($subProducciones);
            $metaData=  array();
            $arrayMain = array();
          
            $arrayNovedad ="";
            $arrayProductos ="";
            foreach($subProducciones as $subProduccc){
                array_push( $metaData, $subProduccc->id_productProduction, $subProduccc->fecha_fin ,$subProduccc->id );
          
                array_push( $arrayMain, $metaData  ); 
                $metaData=[];

              
                //////////////////////////////////


                $novedades = NovedadData::getAllNovedades( $subProduccc->status);
             
                foreach($novedades as $novedad){ 
                   
                    $arrayNovedad = $arrayNovedad.$novedad->descripcion.",";
                   
                }
              //  var_dump( $arrayNovedad); 
                
                $novedades= null;



                $nameProductos = ProductData::getBySubProduccion( $subProduccc->status);
                foreach($nameProductos as $nameProduct){ 
                    $arrayProductos  =$arrayProductos.$nameProduct->name.",";
                }
                $nameProductos=null;






            }

        //    var_dump( $arrayMain );

     
 
//var_dump($data  );
        /**====================== COLOCAR LOS DATOS DE LAS NOVEDADES*/

                
        /**====================== COLOCAR LOS DATOS DE LAS PRODUCTOS EN GENERAL*/

     /*   $loteData = LotData::getById($produccion->id_lote);
        $loteData->name;

        $labor = LaboresData::getById($produccion->id_labores);
         $labor->nombre;
        
*/

        $pdf->BasicTable($header,$arrayMain,$arrayNovedad,$arrayProductos);
        $pdf->Ln();
        $data = null;
    }
 

$pdf->Output();

?>