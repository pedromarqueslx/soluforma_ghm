
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Infracções</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="row">
<div class="col-md-12">

<div class="table-responsive">
<table class="table table-striped" id="index_servicos">
    <thead>
    <tr>
    <th>(ID) Relatório de Controle</th>
    <th>Empresa</th>
    <th>Funcionário</th>
    <!--<th>Infracções</th>-->
    <th>Data da Análise</th>
    <th>Relatório</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach( $results as $data ) {?>
    <tr>
    <td><a target="_blank" href="<?php echo site_url('discos/edit/'.$data->id); ?>"><?php echo $data->id; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('discos/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
    <td><a target="_blank" href="<?php echo site_url('discos/edit/'.$data->id); ?>"><?php echo $data->nome_funcionario_servicos; ?></a></td>
    <!--<td><a target="_blank" href="<?php //echo site_url('discos/edit/'.$data->id); ?>"><?php //echo $data->area_servicos; ?></a></td>-->
    <td><a target="_blank" href="<?php echo site_url('discos/edit/'.$data->id); ?>"><?php echo $data->data_servicos; ?></a></td>
    <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url(); ?>/<?php echo 'discos'; ?>/pdf/<?php echo $data->id; ?>" >PDF</a></td>
    </tr>
    <?php } ?>
</tbody>
    <tfoot>
    <tr>
    <th>ID</th>
    <th>Empresa</th>
    <th>Funcionário</th>
    <th>Formação</th>
    <!--<th>Data</th>-->
    <th style="display: none;">Relatório</th>
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

<a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'discos'; ?>/create/<?php echo $segment_3; ?>" >Novo Relatório de Infracção</a>

</div>
<!-- close row -->
</div>

<!-- close container -->
</div>

</main>

<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#index_servicos tfoot th').each( function () {
        var title = $(this).text();
        //$(this).html( '<input type="text" placeholder=" '+title+'" />' );
        $(this).html( '<input type="text" placeholder="*"/>' );
    } );

    // DataTable
    var table = $('#index_servicos').DataTable( {

            dom: 'Blfrtip',
            buttons: ['excel', 'print'],
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
