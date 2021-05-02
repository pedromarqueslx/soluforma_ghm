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
                <h1>Infracções</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'relatorios'; ?>/create/<?php echo $segment_3; ?>" >Novo Relatório de Infracção</a>
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
                        <th>Datas de Relatórios</th>
                        <th>Empresas</th>
                        <th>Motoristas Pesados</th>
                        <th>Data de Análise</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $results as $data ) {?>
                        <tr>
                            <td><a target="_blank" href="<?php echo site_url('relatorios/editreport/'.$data->id); ?>"><?php echo $data->id; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('relatorios/editreport/'.$data->id); ?>"><?php echo $data->periodo_analise; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('relatorios/editreport/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('relatorios/editreport/'.$data->id); ?>"><?php echo $data->numero_empresas; ?></a></td>
                            <td><a target="_blank" href="<?php echo site_url('relatorios/editreport/'.$data->id); ?>"><?php echo $data->data_analise; ?></a></td>
                            <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url(); ?>/relatorios/editreport/<?php echo $data->id; ?>" >Editar Relatórios</a></td>
                            <td><a target="_blank" class="btn btn-primary ml-4" href="<?php echo site_url(); ?>/relatorios/createreport/<?php echo $data->id; ?>" >Criar Relatórios</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Datas de Relatórios</th>
                        <th>Empresas</th>
                        <th>Motoristas Pesados</th>
                        <th>Data de Análise</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- close row -->
    </div>
</div>

</main>
