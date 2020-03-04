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
$img_file = K_PATH_IMAGES.'background.jpg';
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
$html .= '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h1 align="CENTER"><font color="#0275d8">Certificado de Frequência de Formação Profissional</font></h1>
   <p align="CENTER"><font color="#333333"><strong>Decreto Regulamentar nº 35/2002 de 23 de Abril</strong></font></p>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->Ln(10);

$table_line_one ='<br/><br/><p align="left" style="line-height:1.5"><font color="#333333" style="padding: 0px 65px 0px 15px">Certifica que, <strong>'. $servicos['nome_funcionario_servicos'].'</strong>, natural de <strong>'.$servicos['naturalidade_servicos'].'</strong>, nascido a <strong>'.$servicos['data_nascimento_servicos'].'</strong>, de nacionalidade <strong>'.$servicos['nacionalidade_servicos'].'</strong>, portador do documento de identificação <strong>'.$servicos['doc_identificacao_servicos'].'</strong>, válido até <strong>'.$servicos['validade_identificacao_servicos'].'</strong>, frequentou em <strong>'.$servicos['data_servicos'].'</strong> o curso de formação profissional em <strong>'.$servicos['nome_servicos'].'</strong>, com a duração total de '.$servicos['horas_servicos'].' horas.
</font></p>';

$pdf->writeHTMLCell(0, 0, '', '', $table_line_one, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
//$table_line_two = '<table style="padding: 6px;">';
//$table_line_two.='<tr>';
$table_line_two ='<p><font color="#333333" align="left"><strong>Conteúdos Programáticos:</strong></font></p>';
$table_line_two .='<p style="line-height:2"><font color="#333333" align="left">'.nl2br($servicos['conteudos_servicos']).'</font></p>';
$table_line_two .='<p style="line-height:2"><font color="#333333" align="left">Área de Formação: '.$servicos['area_servicos'].'</font></p>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_two, 0, 1, 0, true, 'C', true);




$pdf->Ln(10);
$table_line_four = '<p style="line-height:1"><font color="#000" size="9" align="right" >O Formador &nbsp; </font></p>';
$table_line_four .= '<p></p>';

$table_line_four .= '<p color="#000" align="right"><u> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </u></p>';
$table_line_four .= '<p style="line-height:2"><font color="#000" size="8" align="right">('.$servicos['formadores_servicos'].')<br/>';
$table_line_four .= 'CAP Nº. EDF 38426/2004</font></p>';
$table_line_four .= '<p color="#000"><font color="#000" size="8" align="right">Certificado Nº '.$servicos['id'].'/'.date("Y/m/d").'</p>';
$table_line_four .= '<p style="line-height:-35px" color="#000"><font color="#000" size="8" align="left">Santo António dos Cavaleiros, '.date("Y/m/d").'</p>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_four, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('certificado_formacao_'.$servicos['id'].'/'.date("Y").'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+