

<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Certificados Emitidos</h3>
</div>
</div>
</div>
</div> 

<div class="container">
<div class="row">
<div class="col-md-12"> 

<script>
$(document).ready(function() {
    $('#index_servicos').DataTable( {
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
<table class="table table-striped" id="index_servicos">
    <thead>
    <tr>
    <th>ID</th>
    <th>Empresa</th>
    <th>Funcionário</th>
    <th>Formação</th>
    <th>Horas</th>
    <th>Formador</th>            
    <th>Data</th>
    <th>Certificado</th>
    <th>Simplificado</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($results as $data) {?>
    <tr>
    <td><a target="_blank" href="<?php echo site_url('servicos/edit/'.$data->id); ?>"><?php echo $data->id; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('servicos/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('servicos/edit/'.$data->id); ?>"><?php echo $data->nome_funcionario_servicos; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('servicos/edit/'.$data->id); ?>"><?php echo $data->area_servicos; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('servicos/edit/'.$data->id); ?>"><?php echo $data->horas_servicos; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('servicos/edit/'.$data->id); ?>"><?php echo $data->formadores_servicos; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('servicos/edit/'.$data->id); ?>"><?php echo $data->data_servicos; ?></a></td>
    <td><a target="_blank" class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'servicos'; ?>/pdf/<?php echo $data->id; ?>" >PDF</a></td>
    <td><a target="_blank" class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'servicos'; ?>/pdf2/<?php echo $data->id; ?>" >PDF</a></td>
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
<a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'servicos'; ?>/create/<?php echo $segment_3; ?>" >Novo Certificado</a>
</div>
<!-- close row -->
</div>

<!-- close container -->
</div>

</main>