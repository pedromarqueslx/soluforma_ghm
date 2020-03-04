
<?php
if (isset($read_set_value)) {
echo $read_set_value;
}
if (isset($message_display)) {
echo $message_display;
}
?>



<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Registo de Funcionários</h3>
</div>
</div>
</div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12"> 




<div class="table-responsive">
<table class="table table-striped display" id="table_id">
<thead>
<tr>
	<th>Nº Cliente</th>	
	<th>Empresa</th>	
	<th>Nome</th>
	<th style="display: none;">Cliente</th>
	<th style="display: none;">Cargo</th>
	<th style="display: none;">Data de Início</th>
	<th style="display: none;">Data de Demissão</th>
	<th style="display: none;">Sexo</th>
	<th style="display: none;">Naturalidade</th>
	<th style="display: none;">Nacionalidade</th>
	<th style="display: none;">Data Nascimento</th>
	<th style="display: none;">Idade</th>
	<th style="display: none;">Documento de Identificacão</th>
	<th>Val. CC</th>
	<th>Val. Carta</th>	
	<th>Val. CAM</th>	
	<th>Medicina</th>
	<th>Val. Med.</th>	
	<th style="display: none;">Nº Carta</th>
	<th>Val. Condutor</th>
	<th style="display: none;">Docs Digitalizados</th>
	<th>Telefone</th>
	<th style="display: none;">Telefone Pessoal</th>
	<th style="display: none;">E-mail</th>
	<!--<th>Laboral</th>-->
</tr>
</thead>
<tbody>
<?php foreach($results as $data) {?>
<tr>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->n_cliente; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->empresa; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->cliente; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->cargo; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->data_inicio; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->data_demissao; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->sexo; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->naturalidade; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->nacionalidade; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->data_nascimento; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->idade; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->doc_identificacao; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->validade_identificacao; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->validade_carta; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->validade_cam; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->data_exame; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->validade_exame_medico; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->n_carta; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->validade_cartao_conducao; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->docs_digitalizados; ?></a></td>
<td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->telefone; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->telefone_pessoal; ?></a></td>
<td style="display: none;"><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->email; ?></a></td>
<!---<td ><a href="<?php //echo site_url('funcionarios/edit/'.$data->id); ?>"><?php //echo $data->laboral; ?></a></td>-->

</tr>
<?php } ?>
</tbody>
    <tfoot>
    <tr>
	<th>Nº Cliente</th>	
    <th>Empresa</th>
    <th>Nome</th>
	<th style="display: none;">Cliente</th>
	<th style="display: none;">>Cargo</th>
	<th style="display: none;">Data de Início</th>
	<th style="display: none;">Data de Demissão</th>
	<th style="display: none;">Sexo</th>
	<th style="display: none;">Naturalidade</th>
	<th style="display: none;">Nacionalidade</th>
	<th style="display: none;">Data Nascimento</th>
	<th style="display: none;">Idade</th>
	<th style="display: none;">Documento de Identificacão</th>                
    <th>Val. CC</th>
    <th>Val. Carta</th>
    <th>Val. CAM</th>
    <th>Medicina</th>
    <th>Val. Med.</th>
	<th style="display: none;">Nº Carta</th>                
    <th>Val. Cartão Condutor</th>
    <th style="display: none;">Docs Digitalizados</th>
	<th>Telefone</th>
	<th style="display: none;">Telefone Pessoal</th>
	<th style="display: none;">E-mail</th>
	<!-- <th>Relação Laboral</th> -->
    </tr>
    </tfoot>
</table>
</div>

</div>
<!-- close row -->
</div>

<div class="row">
<div class="col-md-12">
<?php
$segment_1 = $this->uri->segment(1);
$segment = $this->uri->segment(2);
$segment_3 = $this->uri->segment(3);
//echo $segment_3;
?> 

<a class="btn btn-primary" href="<?php echo site_url();?>/funcionarios/create/">Novo Funcionário</a>

</div>
<!-- close row -->
</div>

<!-- close container -->
</div>

</main>

<script>
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#table_id tfoot th').each( function () {
	        var title = $(this).text();
	        //$(this).html( '<input type="text" placeholder=" '+title+'" />' );
	        $(this).html( '<input type="text" placeholder="*"/>' );
	    } );

    // DataTable
    var table = $('#table_id').DataTable( {

		dom: 'Blfrtip',
		buttons: ['excel', 'print'],
		order:[ 2, "asc" ],

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
		}
    	);

    // Apply the search
    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                .search( this.value )
                .draw();
            }
        } );
    } );
} );
</script>