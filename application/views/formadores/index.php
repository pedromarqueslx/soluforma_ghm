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
                <h1>Registo de Formadores</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'formadores'; ?>/create/<?php echo $segment_3; ?>" >Novo Formador</a>
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
    <!-- close container -->
</div>

</main>
