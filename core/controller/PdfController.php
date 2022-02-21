<?php
 
require('core/controller/fpdf/fpdf.php');
class PdfController {
     
    public static function rep_vehiculos(){
 

        $fpdf = new FPDF();


        $fpdf->AddPage();
        $fpdf->OutPut();
        die();
         
    }
}



?>