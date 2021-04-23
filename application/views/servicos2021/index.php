
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
                <h1>Certificados Emitidos em 2021</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'servicos2021'; ?>/create/<?php echo $segment_3; ?>" >Novo Certificado</a>
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
                            <td><a target="_blank" href="<?php echo site_url('servicos2021/edit/'.$data->id); ?>"><?php echo $data->id; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('servicos2021/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('servicos2021/edit/'.$data->id); ?>"><?php echo $data->nome_funcionario_servicos; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('servicos2021/edit/'.$data->id); ?>"><?php echo $data->area_servicos; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('servicos2021/edit/'.$data->id); ?>"><?php echo $data->horas_servicos; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('servicos2021/edit/'.$data->id); ?>"><?php echo $data->formadores_servicos; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('servicos2021/edit/'.$data->id); ?>"><?php echo $data->data_servicos; ?></a></td>
                            <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url(); ?>/<?php echo 'servicos2021'; ?>/pdf/<?php echo $data->id; ?>" >PDF</a></td>
                            <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url(); ?>/<?php echo 'servicos2021'; ?>/pdf2/<?php echo $data->id; ?>" >PDF</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>Funcionário</th>
                        <th>Formação</th>
                        <th>Horas</th>
                        <th>Formador</th>
                        <th>Data</th>
                        <th style="display: none;">Certificado</th>
                        <th style="display: none;">Simplificado</th>
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
