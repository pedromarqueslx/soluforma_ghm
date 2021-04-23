
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
                <h1>Conteúdos de Formação</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'conteudos'; ?>/create/<?php echo $segment_3; ?>" >Novo Conteúdo</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable">
                    <thead>
                    <tr>
                        <th>Formação</th>
                        <th>Nome</th>
                        <th>Horas</th>
                        <th>Conteúdos Programáticos</th>
                        <th style="display: none;">Observações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($results as $data) { ?>
                        <tr>

                            <td><a href="<?php echo site_url('conteudos/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
                            <td><a href="<?php echo site_url('conteudos/edit/'.$data->id); ?>"><?php echo $data->nome_conteudos; ?></a></td>
                            <td><a href="<?php echo site_url('conteudos/edit/'.$data->id); ?>"><?php echo $data->horas_conteudos; ?></a></td>
                            <td><a href="<?php echo site_url('conteudos/edit/'.$data->id); ?>"><?php echo $data->conteudos_conteudos; ?></a></td>
                            <td style="display: none;"><a href="<?php echo site_url('conteudos/edit/'.$data->id); ?>"><?php echo $data->descricao_conteudos; ?></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- close row -->
    </div>

    <!-- close container -->
</div>

</main>

