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
$pdf->SetTitle('Relatório de Empresa');
$pdf->SetSubject('Funcionários');
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
$pdf->SetTextColor(70, 70, 70);

// Set some content to print
$html = <<<EOD
EOD;
$html .= '<h4 align="CENTER"><font color="#333333">Registo de Empresa
 - '. $contactos['id'] . '</font></h4>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Ln(10);
$table = '<table style="padding: 6px;">';
$table.='<tr>';
$table.='<th style="border:0px solid #333333"><h5><font color="#333333">ID</font></h5></th>';
$table.='<th style="border:0px solid #333333"><h5><font color="#333333">Empresa</font></h5></th>';
$table.='<th style="border:0px solid #333333"><h5><font color="#333333">Morada</font></h5></th>';
$table.='<th style="border:0px solid #333333"><h5><font color="#333333">Localidade</font></h5></th>';
$table.='</tr>';
$table .= '<tr>
        <td style="border:0px solid #333333">'.$contactos['numero_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['title'].'</td>
        <td style="border:0px solid #333333">'.$contactos['endereco_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['localidade_cliente'].'</td>
      </tr>';
  $table.='</table>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

$pdf->Ln(10);
$table_line_two = '<table style="border:1px solid #CCCCCC; padding: 5px;">';
$table_line_two.='<tr>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">Código Postal</font></h5></th>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">Cidade</font></h5></th>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">NIF</font></h5></th>';
$table_line_two.='<th style="border:0px solid #333333"><h5><font color="#333333">Pessoa</font></h5></th>';
$table_line_two.='</tr>';
$table_line_two .= '<tr>
        <td style="border:0px solid #333333">'.$contactos['codigopostal_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['cidade_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['contribuinte_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['pessoa_cliente'].'</td>
      </tr>';
  $table_line_two.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_two, 0, 1, 0, true, 'C', true);



$pdf->Ln(10);
$table_line_three = '<table style="border:1px solid #CCCCCC; padding: 5px;">';
$table_line_three.='<tr>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Telefone</font></h5></th>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Fax</font></h5></th>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Telemóvel</font></h5></th>';
$table_line_three.='<th style="border:0px solid #333333"><h5><font color="#333333">Telemóvel Alternativo</font></h5></th>';
$table_line_three.='</tr>';
$table_line_three .= '<tr>
        <td style="border:0px solid #333333">'.$contactos['telefone_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['fax_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['telemovel_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['telemovel_alternativo_cliente'].'</td>
      </tr>';
  $table_line_three.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_line_three, 0, 1, 0, true, 'C', true);


$pdf->Ln(10);
$table_four = '<table style="border:1px solid #CCCCCC; padding: 5px;">';
$table_four.='<tr>';
$table_four.='<th style="border:0px solid #333333"><h5><font color="#333333">E-mail</font></h5></th>';
$table_four.='<th style="border:0px solid #333333"><h5><font color="#333333">Nº Pessoas</font></h5></th>';
$table_four.='<th style="border:0px solid #333333"><h5><font color="#333333">Tipo Contrato</font></h5></th>';
$table_four.='<th style="border:0px solid #333333"><h5><font color="#333333">Designação</font></h5></th>';
$table_four.='</tr>';
$table_four .= '<tr>
        <td style="border:0px solid #333333">'.$contactos['email_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['pessoas_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['contrato_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['designacao_cliente'].'</td>
      </tr>';
  $table_four.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_four, 0, 1, 0, true, 'C', true);


$pdf->Ln(10);
$table_five = '<table style="border:1px solid #CCCCCC; padding: 5px;">';
$table_five.='<tr>';
$table_five.='<th style="border:0px solid #333333"><h5><font color="#333333">Valor</font></h5></th>';
$table_five.='<th style="border:0px solid #333333"><h5><font color="#333333">Data Inicio Contrato</font></h5></th>';
$table_five.='<th style="border:0px solid #333333"><h5><font color="#333333">Cliente</font></h5></th>';
$table_five.='</tr>';
$table_five .= '<tr>
        <td style="border:0px solid #333333">'.$contactos['valor_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['data_inicio_cliente'].'</td>
        <td style="border:0px solid #333333">'.$contactos['cliente_cliente'].'</td>

      </tr>';
  $table_five.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_five, 0, 1, 0, true, 'C', true);


$pdf->Ln(10);
$table_six = '<table style="border-bottom:0px solid #333333; padding: 6px;">';
$table_six.='<tr>';
$table_six.='<th style="border-bottom:0px solid #333333"><h4 align="left"><font color="#333333">Observações</font></h4></th>';
$table_six.='</tr>';
$table_six.='<tr>';
$table_six.='<td style="border-bottom:0px solid #333333"><p align="left">'.$contactos['descricao_cliente'].'</p></td>';
$table_six.='</tr>';
$table_six.='<tr>';
$table_six.='<td style="border-bottom:0px solid #333333"></td>';
$table_six.='</tr>';
$table_six.='<tr>';
$table_six.='<td style="border-bottom:0px solid #333333"></td>';
$table_six.='</tr>';
$table_six.='</table>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $table_six, 0, 1, 0, true, 'C', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pdf.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
