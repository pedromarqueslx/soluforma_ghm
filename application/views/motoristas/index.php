
<?php
if (isset($read_set_value)) {
    echo $read_set_value;
}
if (isset($message_display)) {
    echo $message_display;
}
?>
<?php
$segment_1 = $this->uri->segment(1);
$segment = $this->uri->segment(2);
$segment_3 = $this->uri->segment(3);
//echo $segment_3;
?>

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Funcionários</h1>
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
                        <th>ID</th>
                        <th>Motorista de Pesados</th>
                        <th>Nome Empresa</th>
                        <th>Infracções</th>
                        <th>Última análise</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($results as $data) {?>
                        <tr>
                            <td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->n_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
                            <td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->empresa; ?></a></td>
                            <td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->cliente; ?></a></td>
                            <td><a href="<?php echo site_url('funcionarios/edit/'.$data->id); ?>"><?php echo $data->cliente; ?></a></td>
                            <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url('formacoes2021/edit/'); ?>" >Editar Relatórios</a></td>
                            <td><a target="_blank" class="btn btn-success ml-4" href="<?php echo site_url('formacoes2021/funcionarios/'); ?>" >Criar Relatórios</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Motorista de Pesados</th>
                        <th>Nome Empresa</th>
                        <th>Infracções</th>
                        <th>Última análise</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- close row -->
    </div>
    <!-- close container -->
</div>

</main>


