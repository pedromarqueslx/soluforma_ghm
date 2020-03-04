<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Fluxobit');
$pdf->SetTitle('Relatório de Serviços');
$pdf->SetSubject('Serviços Perola Paralela');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' pdf', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/pt.php')) {
  require_once(dirname(__FILE__).'/lang/pt.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();

// set color for text
$pdf->SetTextColor(0, 63, 127);

// Set some content to print
$html = <<<EOD
<h3>Relatório de Serviço</h3>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Ln(10);
$table = '<table style="border:1px solid #CCCCCC; padding: 5px;">';
$table.='<tr>';
$table.='<th style="border:1px solid #CCCCCC"><h4>Entidade</h4></th>';
$table.='<th style="border:1px solid #CCCCCC"><h4>Preço Facturado</h4></th>';
$table.='<th style="border:1px solid #CCCCCC"><h4>Data do Serviço</h4></th>';
$table.='<th style="border:1px solid #CCCCCC"><h4>Motorista</h4></th>';
$table.='<th style="border:1px solid #CCCCCC"><h4>Equipamento 1</h4></th>';
$table.='</tr>';
$table .= '<tr>
        <td style="border:1px solid #CCCCCC" >'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
      </tr>';
  $table.='</table>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
$table_line_two = '<table style="border:1px solid #CCCCCC; padding: 5px;">';
$table_line_two.='<tr>';
$table_line_two.='<th style="border:1px solid #CCCCCC"><h4>Equipamento 2</h4></th>';
$table_line_two.='<th style="border:1px solid #CCCCCC"><h4>CMR</h4></th>';
$table_line_two.='<th style="border:1px solid #CCCCCC"><h4>Km´s</h4></th>';
$table_line_two.='<th style="border:1px solid #CCCCCC"><h4>Data Fatura</h4></th>';
$table_line_two.='<th style="border:1px solid #CCCCCC"><h4>Número Fatura</h4></th>';
$table_line_two.='</tr>';
$table_line_two .= '<tr>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
        <td style="border:1px solid #CCCCCC">'.$artigos['title'].'</td>
      </tr>';
  $table_line_two.='</table>';
  
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_two, 0, 1, 0, true, 'C', true);




// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pdf.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+