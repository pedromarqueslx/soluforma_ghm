
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="my-4 text-primary">Registo de Formadores</h3>
            </div>
        </div>
    </div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12">

<script>
$(document).ready(function() {
$('#index_formadores').DataTable( {
dom: 'Blfrtip',
buttons: [
'excel', 'print'
],
"language": {
"sProcessing":   "A processar...",
"sLengthMenu":   "Mostrar _MENU_ registos",
"sZeroRecords":  "Não foram encontrados resultados",
"sInfo":         "_START_ até _END_ de _TOTAL_ registos",
"sInfoEmpty":    "0 até 0 de 0 registos",
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
});
});
</script>


<div class="table-responsive">
<table class="table table-striped" id="index_formadores">
<thead>
<tr>
<th>Nome Formador</th>
<th>CAP Formador</th>
<th>E-mail Formador</th>
<th>Observações</th>
</tr>
</thead>
<tbody>
<?php foreach($results as $data) { ?>
<tr>
<td><a href="<?php echo site_url('formadores/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
<td><a href="<?php echo site_url('formadores/edit/'.$data->id); ?>"><?php echo $data->cap_formadores; ?></a></td>
<td><a href="<?php echo site_url('formadores/edit/'.$data->id); ?>"><?php echo $data->email_formadores; ?></a></td>
<td><a href="<?php echo site_url('formadores/edit/'.$data->id); ?>"><?php echo $data->descricao_formadores; ?></a></td>
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
<a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'formadores'; ?>/create/<?php echo $segment_3; ?>" >Novo Formador</a>
</div>
<!-- close row -->
</div>

<!-- close container -->
</div>

</main>

