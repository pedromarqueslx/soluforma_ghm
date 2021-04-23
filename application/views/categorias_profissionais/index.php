
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
                <h1>Categorias Profissionais</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'categorias_profissionais'; ?>/create/<?php echo $segment_3; ?>" >Nova Categoria</a>
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
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Observações</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($results as $data) {?>
                        <tr>
                            <td><a href="<?php echo site_url('categorias_profissionais/edit/'.$data->id); ?>"><?php echo $data->id; ?></a></td>
                            <td><a href="<?php echo site_url('categorias_profissionais/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
                            <td><a href="<?php echo site_url('categorias_profissionais/edit/'.$data->id); ?>"><?php echo $data->descricao_categorias_profissionais; ?></a></td>
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

