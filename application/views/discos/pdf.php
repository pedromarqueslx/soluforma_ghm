<?php
ob_start();
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
$pdf->SetTitle('Relatório de Controle');
$pdf->SetSubject('Controle de Infracções');
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


$orderdate = explode('-', $discos["data_servicos"]);
$year = $orderdate[0];
$month = $orderdate[1];
$day  = $orderdate[2];

$html .= '<font color="#000" size="8" align="right">Relatório de Controle Nº '.$discos['id'].'/'.$year. '&nbsp;&nbsp;'.' </font>'
    .'<br/><br/><br/><br/><br/><br/><p align="left"><font color="#333333"><strong>Empresa: '. $discos['title'].' </strong></font></p>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);



$pdf->Ln(10);

$table_line_one =
    '<p align="left"><font color="#1e90ff" size="9" align="left"> >>>>>>>>>>>>>> >>>>>>>>>>>>>> >>>>>>>>>>>>>> >>>>>>>>>>>>>> >>>>>>>>>>>>>>  >>>>>>>>>>>>>>'.
    '<p align="left"><font color="#000" size="8" align="left">1. Informação do Condutor: '. $discos['nome_funcionario_servicos']
    .'<p align="left"><font color="#333333" style="padding: 0px 65px 0px 15px">2. Período analisado: '. $discos['periodo_analise']
    .'<p align="left"><font color="#333333" style="padding: 0px 65px 0px 15px">3. Data da análise: '. $discos['data_servicos']
    //.'<p align="left"><font color="#333333" style="padding: 0px 65px 0px 15px">4. Número de infrações detetadas: '. $discos['data_servicos'].'
    .'<p align="left"><font color="#333333" style="padding: 0px 65px 0px 15px">4. Número de infrações detetadas: '. $discos['infracao']
    .'<p align="left"><font color="#1e90ff" size="9" align="left"> >>>>>>>>>>>>>> >>>>>>>>>>>>>> >>>>>>>>>>>>>> >>>>>>>>>>>>>> >>>>>>>>>>>>>>  >>>>>>>>>>>>>>'.'

</font>';

$pdf->writeHTMLCell(0, 0, '', '', $table_line_one, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
$table_line_two ='';

// Select record
$query =$this->db->select('id,title,infracoes_infracoes');
$query =$this->db->where('id', $discos['id_infracao']);
//$query =$this->db->limit(1);  // Produces: LIMIT 1
$q = $this->db->get('infracoes');
$response = $q->result_array();


foreach ($q->result_array() as $row)
    if($discos['id_infracao'] == 0)
    {$display_none='display="none"';}
    else
    {$display_none=''; }
{

    $table_line_two .='<p style="line-height:2" '.$display_none.'><font color="#333333" align="left"><strong>'.$row['title'].'</strong></font></p>';
    $table_line_two .='<p style="line-height:2" '.$display_none.'><font color="#333333" align="left">'.$row['infracoes_infracoes'].'</font></p>';
    $table_line_two .='<p style="line-height:2" '.$display_none.' ><font color="#000" size="8" align="left">Registo do dia '.nl2br($discos['registo_do_dia']).'</font></p>';
}

// Select record
$query =$this->db->select('id,title,infracoes_infracoes');
$query =$this->db->where('id', $discos['id_infracao_1']);
//$query =$this->db->limit(1);  // Produces: LIMIT 1
$q = $this->db->get('infracoes');
$response = $q->result_array();

foreach ($q->result_array() as $row)
    if($discos['id_infracao_1'] == 0)
    {$display_none_1='display="none"';}
    else
    {$display_none_1=''; }
{

    $table_line_two .='<p style="line-height:2" '.$display_none_1.'><font color="#333333" align="left"><strong>'.$row['title'].'</strong></font></p>';
    $table_line_two .='<p style="line-height:2" '.$display_none_1.'><font color="#333333" align="left">'.$row['infracoes_infracoes'].'</font></p>';
    $table_line_two .='<p style="line-height:2" '.$display_none_1.' ><font color="#000" size="8" align="left">Registo do dia '.nl2br($discos['registo_do_dia_1']).'</font></p>';
}

// Select record
$query =$this->db->select('id,title,infracoes_infracoes');
$query =$this->db->where('id', $discos['id_infracao_2']);
//$query =$this->db->limit(1);  // Produces: LIMIT 1
$q = $this->db->get('infracoes');
$response = $q->result_array();

foreach ($q->result_array() as $row)
    if($discos['id_infracao_2'] == 0)
    {$display_none_2='display="none"';}
    else
    {$display_none_2='';}
{

    $table_line_two .='<p style="line-height:2" '.$display_none_2.'><font color="#333333" align="left"><strong>'.$row['title'].'</strong></font></p>';
    $table_line_two .='<p style="line-height:2" '.$display_none_2.'><font color="#333333" align="left">'.$row['infracoes_infracoes'].'</font></p>';
    $table_line_two .='<p style="line-height:2" '.$display_none_2.' ><font color="#000" size="8" align="left">Registo do dia '.nl2br($discos['registo_do_dia_2']).'</font></p>';
}

// Select record
$query =$this->db->select('id,title,infracoes_infracoes');
$query =$this->db->where('id', $discos['id_infracao_3']);
//$query =$this->db->limit(1);  // Produces: LIMIT 1
$q = $this->db->get('infracoes');
$response = $q->result_array();


foreach ($q->result_array() as $row)
    if($discos['id_infracao_3'] == 0)
    { $display_none_3='display="none"';}
    else
    {$display_none_3='';}
{
    $table_line_two .='<p style="line-height:2"><font color="#333333" align="left" '.$display_none_3.'><strong>'.$row['title'].'</strong></font></p>';
    $table_line_two .='<p style="line-height:2"><font color="#333333" align="left" '.$display_none_3.'>'.$row['infracoes_infracoes'].'</font></p>';
    $table_line_two .='<p style="line-height:2"><font color="#000" size="8" align="left" '.$display_none_3.' >Registo do dia '.nl2br($discos['registo_do_dia_3']).'</font></p>';
}

$pdf->writeHTMLCell(0, 0, '', '', $table_line_two, 0, 1, 0, true, 'C', true);










$pdf->Ln(10);
$table_four = '<table style="border:0px solid #FFF; padding: 5px;">';
$table_four.='<tr>';
$table_four.='<th style="border:0px solid #FFF"></th>';
$table_four.='<th style="border:0px solid #FFF"></th>';
$table_four.='<th style="border:0px solid #FFF">

<p color="#000"><u> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </u></p>
<font color="#000" size="8">Assinatura - '.$discos['nome_funcionario_servicos'].'<br/></font>
</th>';

$orderdate = explode('-', $discos["data_servicos"]);
$year = $orderdate[0];
$month = $orderdate[1];
$day  = $orderdate[2];

$table_four.='</tr>';
$table_four.='<tr>';
$table_four.='<th width="50%" style="border:0px solid #FFF" align="left"></th>';
$table_four.='<th width="45%" style="border:0px solid #FFF" align="right">




</th>';
$table_four.='</tr>';

$table_four.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_four, 0, 1, 0, true, 'C', true);

// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output($discos['id'].'_'.'certificado_formacao_'.$discos['nome_funcionario_servicos'].'_'.date("Y").'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
