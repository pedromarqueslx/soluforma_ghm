<?php
if (isset($read_set_value)) {
echo $read_set_value;
}
if (isset($message_display)) {
echo $message_display;
}
?>

<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<div class="container">
<div class="row">
<div class="col">
<h1>Relatórios de Intervenções</h1>
</div>
</div>
</div>

<div class="container">
<div class="row">

<!--
<div class="col-md-4">
    <h2>Seleccionar Cliente e Intervalo de Datas</h2>
</div>
<div class="col-md-4">
    okidoki
</div>
<div class="col-md-4">
    okidoki
</div>
'class="form-control"'-->

<?php  
echo form_open('servicos/select_id_and_date_range', 'class="form-inline"');
$data = array(NULL => 'Seleccione Cliente');
if(is_array($show_table)) {
foreach ($show_table as $value) {
$data[$value ->title] = $value ->title;
}
echo '<div class="col-md-4"> ';
//echo '<h2>Seleccionar Cliente e Intervalo de Datas</h2>';
echo  form_dropdown('id', $data); 
echo '</div>';
}else{
redirect( base_url() . 'index.php/servicos');
} 
$data = array(
    'id' => 'datepicker',
    //'type' => 'date',
    'name' => 'date_from',
    'class'=> 'form-control',
    'placeholder' => 'ano-mês-dia'
);
echo '<div class="col-md-4"> ';
echo form_input($data);
echo '</div>';
$data = array(
    'id' => 'datepicker1',
    'class'=> 'form-control',
    'name' => 'date_to',
    'placeholder' => 'ano-mês-dia'
);
echo '<div class="col-md-4"> ';
echo form_input($data);
echo '</div>';
if (isset($date_range_error_message)) {
    echo '<div class="small">';
    echo $date_range_error_message;
    echo '</div>';
}
?>
              
<!-- close row -->
</div>

<script>
$(document).ready(function() {
$('#total_servicos').DataTable( {
dom: 'Brtip',
buttons: [
{
extend: 'excel',
orientation: 'landscape',
pageSize: 'A4'
},
{
extend: 'pdf',
orientation: 'landscape',
pageSize: 'A4'
},                        
{
extend: 'print', 
orientation: 'landscape',
pageSize: 'A4'
}                        
],
"language": {
"sProcessing":   "A processar...",
"sLengthMenu":   "Mostrar _MENU_ registos",
"sZeroRecords":  "Não foram encontrados resultados",
"sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
"sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
"sInfoFiltered": "(filtrado de _MAX_ registos no total)",
"sInfoPostFix":  "",
"sSearch":       "Procurar:",
"sUrl":          "",
"oPaginate": {
"sFirst":    "Primeiro",
"sPrevious": "Anterior",
"sNext":     "Seguinte",
"sLast":     "Último"
}
}
} );
} );
</script>



<div class="table-responsive">
<table id="total_servicos" class="table table-striped">
<thead>
<tr>
<th>Cliente</th>
<th>Data</th>
<th>Equip. 1</th>
<th>Preço</th>
<th>Fatura</th>
<th>Observações</th>
</tr>
</thead>
<tbody>
<?php //foreach ($servicos as $servicos_item): 
    if (isset($result_display)) {
        if ($result_display == 'Não foram encontrados Registos !') {
            echo "<td>" . $result_display . "</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        } else {
?>        
<?php foreach ($result_display as $value) {?>
<tr>
<td><a href="<?php echo site_url('servicos/edit/'.$value->id); ?>"><?php echo $value->title; ?></a></td>
<td><a href="<?php echo site_url('servicos/edit/'.$value->id); ?>"><?php echo $value->data_servicos; ?></a></td>
<td><a href="<?php echo site_url('servicos/edit/'.$value->id); ?>"><?php echo $value->equipamento_servicos; ?></a></td>
<td><a href="<?php echo site_url('servicos/edit/'.$value->id); ?>"><?php echo $value->preco_servicos; ?></a></td>
<td><a href="<?php echo site_url('servicos/edit/'.$value->id); ?>"><?php echo $value->fatura_servicos; ?></a></td>
<td><a href="<?php echo site_url('servicos/edit/'.$value->id); ?>"><?php echo $value->observacoes_servicos; ?></a></td>
</tr>

<?php     
            }
        }
    }
?>
</tbody>
</table>
</div>


<a class="btn btn-primary" href="<?php echo base_url("/index.php/servicos/total/"); ?>" >Cancelar</a>

<?php 
echo '<button class="btn btn-primary">Relatório</button>';
echo form_close(); 
?>


<!-- close container -->
</div>

</main>

<!-- close header class="container-fluid" -->
</div>
<!-- close header class="row" -->
</div>

