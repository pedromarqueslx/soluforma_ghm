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
$pdf->SetTitle('Certificado de Frequência de Formação Profissional');
$pdf->SetSubject('Formação Profissional');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(23, 20, 23, true);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set margin bottom zero
$pdf->SetAutoPageBreak(TRUE, 0);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/pt.php')) {
	require_once(dirname(__FILE__).'/lang/pt.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('helvetica', '', 10);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);




// add a page
$pdf->AddPage();


// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'background-report.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();



// set color for text
//$pdf->SetTextColor(2, 117, 216);
$pdf->SetTextColor(70, 70, 70);
// Set some content to print
$html = <<<EOD
EOD;




$html .= '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h1 align="CENTER"><font color="#0275d8">Certificado de Frequência de Formação Profissional</font></h1>
   <p align="CENTER"><font color="#333333"><strong>sssDecreto Regulamentar nº 35/2002 de 23 de Abril</strong></font></p>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->Ln(10);

$table_line_one ='<br/><br/><p align="left" style="line-height:1.5"><font color="#333333" style="padding: 0px 65px 0px 15px">Certifica que, <strong>'. $discos['nome_funcionario_servicos'].'</strong>, natural de <strong>'.$discos['naturalidade_servicos'].'</strong>, nascido a <strong>'.$discos['data_nascimento_servicos'].'</strong>, de nacionalidade <strong>'.$discos['nacionalidade_servicos'].'</strong>, portador do documento de identificação <strong>'.$discos['doc_identificacao_servicos'].'</strong>, válido até <strong>'.$discos['validade_identificacao_servicos'].'</strong>, frequentou em <strong>'.$discos['data_servicos'].'</strong> o curso de formação profissional em <strong>'.$discos['nome_servicos'].'</strong>, com a duração total de '.$discos['horas_servicos'].' horas.
</font></p>';

$pdf->writeHTMLCell(0, 0, '', '', $table_line_one, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
//$table_line_two = '<table style="padding: 6px;">';
//$table_line_two.='<tr>';
$table_line_two ='<p><font color="#333333" align="left"><strong>Conteúdos Programáticos:</strong></font></p>';
$table_line_two .='<p style="line-height:2"><font color="#333333" align="left">'.nl2br($discos['conteudos_servicos']).'</font></p>';
$table_line_two .='<p style="line-height:2"><font color="#333333" align="left">Área de Formação: '.$discos['area_servicos'].'</font></p>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_two, 0, 1, 0, true, 'C', true);



$pdf->Ln(10);
$table_four = '<table style="border:none; padding: 5px;">';
$table_four.='<tr>';
$table_four.='<th style="border:none"></th>';
$table_four.='<th style="border:none"></th>';
$table_four.='<th style="border:none">

<font color="#000" size="8"><p style="line-height:1"></p></font>
<p color="#000"></p>
</th>';


$orderdate = explode('-', $discos["data_servicos"]);
$year = $orderdate[0];
$month = $orderdate[1];
$day  = $orderdate[2];

$table_four.='</tr>';
$table_four.='<br>';
$table_four.='<tr>';

$table_four.='<th width="55%" style="border:none" align="left"><font size="8">'.$discos['local_formacao_servicos'].', '.$discos['lblDataExtenso'].'</font></th>';
$table_four.='<th width="40%" style="border:none" align="right">
<br/>
<br/>
<br/>
<font color="#000" size="8"><p>Certificado Nº '.$discos['id'].'/'.$year. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.' </p></font>

</th>';
$table_four.='</tr>';

$table_four.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_four, 0, 1, 0, true, 'C', true);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($discos['id'].'_'.'certificado_formacao_'.$discos['nome_funcionario_servicos'].'_'.date("Y").'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+