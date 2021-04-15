
<?php
    $segment_1 = $this->uri->segment(1);
    $segment = $this->uri->segment(2);
    $segment_3 = $this->uri->segment(3);
    $user[''] = 0;
    $servicos2021[''] = 0;
    $servicos2020[''] = 0;
    $servicos2019[''] = 0;
    $servicos[''] = 0;
?>

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>GHM - Gestão de Histórico de Multas</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'contactos'; ?>/create/<?php echo $segment_3; ?>" >Nova Empresa</a>
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'servicos2021'; ?>/create/<?php echo $segment_3; ?>" >Novo Certificado</a>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <?php
        if ($user['user_profile'] == 'Administrator') {
            echo '<div class="col-md-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th><h2>Últimas Formações de 2021</h2></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($servicos2021 as $servicos_item) {
                echo '<tr>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2021/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['title'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2021/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['area_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2021/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['horas_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2021/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['formadores_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2021/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['data_servicos'];
                echo '</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>


<div class="container">
    <div class="row">
        <?php
        if ($user['user_profile'] == 'Administrator') {
            echo '<div class="col-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th><h2>Últimas Formações de 2020</h2></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($servicos2020 as $servicos_item) {
                echo '<tr>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2020/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['title'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2020/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['area_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2020/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['horas_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2020/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['formadores_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2020/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['data_servicos'];
                echo '</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        if ($user['user_profile'] == 'Administrator') {
            echo '<div class="col-12">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th><h2>Últimas Formações de 2019</h2></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($servicos2019 as $servicos_item) {
                echo '<tr>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2019/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['title'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2019/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['area_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2019/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['horas_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2019/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['formadores_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos2019/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['data_servicos'];
                echo '</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="container">

    <div class="row">

        <?php

        if ($user['user_profile'] == 'Administrator') {
            echo '<div class="col-12">';
            echo '<div class="table-responsive">';

            echo '<table class="table table-striped">';

            echo '<thead>';
            echo '<tr>';
            echo '<th><h2>Últimas Formações de 2018</h2></th>';
            echo '</tr>';
            echo '</thead>';

            echo '<tbody>';

            foreach ($servicos as $servicos_item) {
                echo '<tr>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['title'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['area_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['horas_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['formadores_servicos'];
                echo '</a></td>';
                echo '<td>';
                echo '<a href="';
                echo site_url('servicos/edit/' . $servicos_item['id']);
                echo '">';
                echo $servicos_item['data_servicos'];
                echo '</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }
        ?>

    </div>

</div>

