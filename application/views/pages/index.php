
<?php
    $segment_1 = $this->uri->segment(1);
    $segment = $this->uri->segment(2);
    $segment_3 = $this->uri->segment(3);
    /*$user[''] = 0;*/
/*  $servicos2021[''] = 0;
    $servicos2020[''] = 0;
    $servicos2019[''] = 0;
    $servicos[''] = 0;*/
?>

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Últimas Formações</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'contactos'; ?>/create/<?php echo $segment_3; ?>" >Nova Empresa</a>
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'servicos2021'; ?>/create/<?php echo $segment_3; ?>" >Novo Certificado</a>
            </div>
        </div>
    </div>
</div>

<?php
if ($user['user_profile'] == 'Administrator') {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-4 mb-4">Últimas Formações 2021</h2>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Formação</th>
                            <th>Horas</th>
                            <th>Formador</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($servicos2021 as $servicos_item) { ?>
                            <tr>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['title']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['area_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['horas_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']);?>"><?php echo $servicos_item['formadores_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']);?>"><?php echo $servicos_item['data_servicos']; ?></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
if ($user['user_profile'] == 'Administrator') {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-4 mb-4">Últimas Formações 2020</h2>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable2020">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Formação</th>
                            <th>Horas</th>
                            <th>Formador</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($servicos2020 as $servicos_item) { ?>
                            <tr>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['title']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['area_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['horas_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']);?>"><?php echo $servicos_item['formadores_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']);?>"><?php echo $servicos_item['data_servicos']; ?></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
if ($user['user_profile'] == 'Administrator') {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-4 mb-4">Últimas Formações 2019</h2>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable2019">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Formação</th>
                            <th>Horas</th>
                            <th>Formador</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($servicos2019 as $servicos_item) { ?>
                            <tr>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['title']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['area_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']); ?>"><?php echo $servicos_item['horas_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']);?>"><?php echo $servicos_item['formadores_servicos']; ?></a></td>
                                <td><a href="<?php echo site_url('servicos2021/edit/' . $servicos_item['id']);?>"><?php echo $servicos_item['data_servicos']; ?></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
