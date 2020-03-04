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
$pdf->SetTitle('Registo de Multa');
$pdf->SetSubject('Multas');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

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
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// set color for text
//$pdf->SetTextColor(2, 117, 216);
$pdf->SetTextColor(70, 70, 70);
// Set some content to print
$html = <<<EOD
EOD;
$html .= '<h4 align="CENTER"><font color="#333333">Registo de Multa
 - '. $artigos['id'] . '</font></h4>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->Ln(10);
$table_line_one = '<table style="padding: 6px;">';
$table_line_one.='<tr>';
$table_line_one.='<th style="border:0px solid #333333"><h5><font color="#333333">ID</font></h5></th>';
$table_line_one.='<th style="border:0px solid #333333"><h5><font color="#333333">Nome</font></h5></th>';
$table_line_one.='<th style="border:0px solid #333333"><h5><font color="#333333">Data Registo</font></h5></th>';
$table_line_one.='<th style="border:0px solid #333333"><h5><font color="#333333">Data Multa</font></h5></th>';
$table_line_one.='</tr>';
$table_line_one.= '<tr>
			<td style="border:0px solid #333333">'. $artigos['multa'].'</td>
			<td style="border:0px solid #333333">'.$artigos['title'].'</td>
			<td style="border:0px solid #333333">'.$artigos['data'].'</td>
      		<td style="border:0px solid #333333">'.$artigos['data_fim'].'</td>      
				</tr>';
$table_line_one.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_one, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
$table_line_two = '<table style="padding: 6px;">';
$table_line_two.='<tr>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">Auto Nº</font></h5></th>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">Matrícula</font></h5></th>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">Descrição</font></h5></th>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">Entidade</font></h5></th>';
$table_line_two.='</tr>';
$table_line_two.='<tr>
				<td style="border:0px solid #333333">'.$artigos['auto'].'</td>
				<td style="border:0px solid #333333">'.$artigos['matricula'].'</td>
				<td style="border:0px solid #333333">'.$artigos['descricao'].'</td>
				<td style="border:0px solid #333333">'.$artigos['entidade'].'</td>
				</tr>';
$table_line_two.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_two, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
$table_line_three = '<table style="padding: 6px;">';
$table_line_three.='<tr>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Valor Multa (€)</font></h5></th>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Tipo Multa</font></h5></th>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Data Fecho</font></h5></th>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Valor Cobrado (€)</font></h5></th>';
$table_line_three.='</tr>';
$table_line_three.='<tr>
        <td style="border:0px solid #333333">'.$artigos['valor'].'</td>
        <td style="border:0px solid #333333">'.$artigos['tipo_multa'].'</td>
        <td style="border:0px solid #333333">'.$artigos['data_fecho'].'</td>
        <td style="border:0px solid #333333">'.$artigos['valor_cobrado'].'</td>
        </tr>';
$table_line_three.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_three, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
$table_line_four = '<table style="padding: 6px;">';
$table_line_four.='<tr>';
$table_line_four.='<th style="border:0px solid #333333"><h5><font color="#333333">Custo Advogado (€)</font></h5></th>';
$table_line_four.='<th style="border:0px solid #333333"><h5><font color="#333333">Resultado</font></h5></th>';
$table_line_four.='<th style="border:0px solid #333333"><h5><font color="#333333">Estado</font></h5></th>';
$table_line_four.='<th style="border:0px solid #333333"><h5><font color="#333333">ID</font></h5></th>';
$table_line_four.='</tr>';
$table_line_four.='<tr>
        <td style="border:0px solid #333333">'.$artigos['custo_adv'].'</td>
        <td style="border:0px solid #333333">'.$artigos['resultado'].'</td>
        <td style="border:0px solid #333333">'.$artigos['estado'].'</td>
        <td style="border:0px solid #333333">'.$artigos['id'].'</td>
        </tr>';
$table_line_four.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_four, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
$table_line_five = '<table style="border-bottom:0px solid #333333; padding: 6px;">';
$table_line_five.='<tr>';
$table_line_five.='<th style="border-bottom:0px solid #333333"><h4 align="left"><font color="#333333">Observações</font></h4></th>';
$table_line_five.='</tr>';
$table_line_five.='<tr>';
$table_line_five.='<td style="border-bottom:0px solid #333333"><p align="left">'.$artigos['observacoes'].'</p></td>';
$table_line_five.='</tr>';
$table_line_five.='<tr>';
$table_line_five.='<td style="border-bottom:0px solid #333333"></td>';
$table_line_five.='</tr>';
$table_line_five.='<tr>';
$table_line_five.='<td style="border-bottom:0px solid #333333"></td>';
$table_line_five.='</tr>';
$table_line_five.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_five, 0, 1, 0, true, 'C', true);



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pdf.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+