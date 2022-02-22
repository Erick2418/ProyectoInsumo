<?php
class PdfGeneratorDataProducciones {
	 
	public static function GeneratePdf(){
                
        //require('fpdf.php');
        require('./../../pdfGENERATOR/fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage('P', 'A4');
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTopMargin(10);
        $pdf->SetLeftMargin(10);
        $pdf->SetRightMargin(10);


        /* --- Text --- */
        $pdf->Text(73, 28, 'COSTO DE PRODUCCIÓN');
        /* --- Text --- */
        $pdf->Text(15, 46, 'Producción ');
        /* --- Text --- */
        $pdf->Text(15, 62, 'Novedades');


        $pdf->Output('created_pdf.pdf','I');
	}


}

?>