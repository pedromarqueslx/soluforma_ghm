
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Certificados Emitidos</h1>
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
            //order:[ 0, "desc" ],
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
    <th>Certificados Emitidos</th>
    <th>Empresa</th>
    <th>Horas de Formação</th>
    <th>Funcionários Formação</th>
    <th>Funcionários sem Formação</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($formacoes as $data) {?>
    <tr>
    <td><?php echo $data['n_certificados']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><?php echo $data['horas_servicos'] ; ?></td>
    </td>
    <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url('formacoes/edit/'.($data['numero_cliente'])); ?>" >Formação</a></td>
    <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url('formacoes/funcionarios/'.($data['numero_cliente'])); ?>" >S/Formação</a></td>
    </tr>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>

</div>
<!-- close row -->
</div>
</div>
</main>
