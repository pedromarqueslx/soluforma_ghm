<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Lista de Funcionários Sem Formação</h3>
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
    <th>Nome</th>
    <th>Cargo</th>
    <th>Data de Início</th>
    <th>Idade</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($formacoes_item as $data) {?>
    <tr>
    <td><?php echo $data['nome_funcionario_servicos']; ?></td>
    <td><?php echo $data['nome_servicos']; ?></td>
    <td><?php echo $data['data_servicos'] ; ?></td>
    <td><?php echo $data['horas_servicos'] ; ?></td>
    </td>  
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