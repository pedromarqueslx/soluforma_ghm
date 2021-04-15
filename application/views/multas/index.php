
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Registo de Multas</h1>
            </div>
        </div>
    </div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12">

<script>
$(document).ready(function() {
        $('#index_multas').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            'excel', 'print'
        ],
        order:[ 0, "desc" ],
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
<table class="table table-striped" id="index_multas">
<thead>
<tr>
<th style="display: none;">id</th>
<th>ID</th>
<th>Nome</th>
<th style="display: none;">Data Registo</th>
<th>Data Multa</th>
<th style="display: none;">Auto Nº</th>
<th style="display: none;">Matrícula</th>
<th style="display: none;">Descrição</th>
<th style="display: none;">Entidade</th>
<th>Valor Multa (€)</th>
<th>Tipo Multa</th>
<th>Data Fecho</th>
<th style="display: none;">Valor Cobrado (€)</th>
<th style="display: none;">Custo Advogado (€)</th>
<th>Resultado</th>
<th>Local</th>
<th>Estado</th>
<th style="display: none;">Observações</th>
</tr>
</thead>

<tbody>
    <?php foreach($results as $data) {?>
    <tr>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->id; ?></a></td>
        <td><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->multa; ?></a></td>
        <td><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->data; ?></a></td>
        <td><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->data_fim; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->auto; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->matricula; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->descricao; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->entidade; ?></a></td>
        <td><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->valor; ?></a></td>
        <td><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->tipo_multa; ?></a></td>
        <td><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->data_fecho; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->valor_cobrado; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->custo_adv; ?></a></td>
        <td ><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->resultado; ?></a></td>
        <td ><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->local; ?></a></td>
        <td><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->estado; ?></a></td>
        <td style="display: none;"><a href="<?php echo site_url('multas/edit/'.$data->id); ?>"><?php echo $data->observacoes; ?></a></td>
    </tr>
    <?php } ?>
</tbody>
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

<a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'multas'; ?>/create/<?php echo $segment_3; ?>" >Nova Multa</a>
</div>
<!-- close row -->
</div>

<!-- close container -->
</div>


