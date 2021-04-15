<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>GHM - Gestão de Histórico de Multas</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url("/assets/img/favicon.ico"); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/styles.css"); ?>">
</head>

<?php
    $segment = $this->uri->segment(1);
    $segment_2 = $this->uri->segment(2);
    $segment_3 = $this->uri->segment(3);
    $user[''] = 0;
?>

<body onload="submitdemissao(); submitBday()">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow">

        <a class="logo mt-0 mr-3 ml-0 ml-lg-4 mb-2" href="<?php echo site_url();?>/users/account/">
            <img src="<?php echo base_url("/assets/img/soluforma.svg"); ?>" style="height: 20px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li <?php if(($segment == "formadores" && $segment_2 == 'index') || ($segment == "formadores") || ($segment == "formadores" && $segment_2 == "edit") || ($segment == "formadores" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
                    <?php if ($user['user_profile'] == 'Administrator')
                    {echo '<a class="nav-link" href="' . site_url() . '/formadores/index/">Formadores</a>';}
                    ?>
                </li>

                <li <?php if(($segment == "categorias_profissionais" && $segment_2 == 'index') || ($segment == "categorias_profissionais") || ($segment == "categorias_profissionais" && $segment_2 == "edit") || ($segment == "categorias_profissionais" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
                    <?php if ($user['user_profile'] == 'Administrator')
                    {echo '<a class="nav-link" href="' . site_url() . '/categorias_profissionais/index/">Categorias</a>';}
                    ?>
                </li>

                <li <?php if(($segment == "funcionarios" && $segment_2 == 'index') || ($segment == "funcionarios") || ($segment == "funcionarios" && $segment_2 == "edit") || ($segment == "funcionarios" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
                    <?php if ($user['user_profile'] == 'Administrator')
                    {echo '<a class="nav-link" href="' . site_url() . '/funcionarios/index/">Funcionários</a>';}
                    ?>
                </li>

                <li <?php if(($segment == "conteudos" && $segment_2 == "index") || ($segment == "conteudos") || ($segment == "conteudos" &&$segment_2 == "edit") || ($segment == "conteudos" &&$segment_2 == "create") ) { echo "class='nav-item active'"; } else {echo ""; } ?> >
                    <?php if ($user['user_profile'] == 'Administrator')
                    {echo '<a class="nav-link" href="' . site_url() . '/conteudos/index/">Conteúdos</a>';}
                    ?>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                    <?php if(($segment == "servicos2021" && $segment_2 == 'index') || ($segment == "servicos2021") || ($segment == "servicos2021" && $segment_2 == "edit") || ($segment == "servicos2021" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
                    <?php if(($segment == "servicos2020" && $segment_2 == 'index') || ($segment == "servicos2020") || ($segment == "servicos2020" && $segment_2 == "edit") || ($segment == "servicos2020" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
                    <?php if(($segment == "servicos2019" && $segment_2 == 'index') || ($segment == "servicos2019") || ($segment == "servicos2019" && $segment_2 == "edit") || ($segment == "servicos2019" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
                    <?php if(($segment == "servicos" && $segment_2 == 'index') || ($segment == "servicos") || ($segment == "servicos" && $segment_2 == "edit") || ($segment == "servicos" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>"
                       href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Certificados</a>

                    <div class="dropdown-menu shadow" aria-labelledby="dropdown01">
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/servicos2021/index/">Certificados 2021</a>';}
                        ?>
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/servicos2020/index/">Certificados 2020</a>';}
                        ?>
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/servicos2019/index/">Certificados 2019</a>';}
                        ?>
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/servicos/index/">Certificados 2018</a>';}
                        ?>
                    </div>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                    <?php if(($segment == "formacoes2021" && $segment_2 == 'index') || ($segment == "formacoes2021") || ($segment == "formacoes2021" && $segment_2 == "edit") || ($segment == "formacoes2021" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
                    <?php if(($segment == "formacoes2020" && $segment_2 == 'index') || ($segment == "formacoes2020") || ($segment == "formacoes2020" && $segment_2 == "edit") || ($segment == "formacoes2020" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
                    <?php if(($segment == "formacoes2019" && $segment_2 == 'index') || ($segment == "formacoes2019") || ($segment == "formacoes2019" && $segment_2 == "edit") || ($segment == "formacoes2019" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
                    <?php if(($segment == "formacoes" && $segment_2 == 'index') || ($segment == "formacoes") || ($segment == "formacoes" && $segment_2 == "edit") || ($segment == "formacoes" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>"
                       href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formações</a>

                    <div class="dropdown-menu shadow" aria-labelledby="dropdown01">
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/formacoes2021/index/">Formações 2021</a>';}
                        ?>
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/formacoes2020/index/">Formações 2020</a>';}
                        ?>
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/formacoes2019/index/">Formações 2019</a>';}
                        ?>
                        <?php if ($user['user_profile'] == 'Administrator') {
                            echo '<a class="dropdown-item" href="' . site_url() . '/formacoes/index/">Formações 2018</a>';}
                        ?>
                    </div>

                </li>

                <li <?php if(($segment == "contactos" && $segment_2 == "index") || ($segment == "contactos") || ($segment == "contactos" &&$segment_2 == "edit") || ($segment == "contactos" && $segment_2 == "create") ) { echo "class='nav-item active'"; } else {echo ""; } ?> >
                    <?php if ($user['user_profile'] == 'Administrator')
                    {echo '<a class="nav-link" href="' . site_url() . '/contactos/index/">Empresas</a>';}
                    ?>
                </li>

                <li <?php if(($segment == "multas" && $segment_2 == 'index') || ($segment == "multas") || ($segment == "multas" && $segment_2 == "edit") || ($segment == "multas" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
                    <?php if ($user['user_profile'] == 'Administrator')
                    {echo '<a class="nav-link" href="' . site_url() . '/multas/index/">Multas</a>';}
                    ?>
                </li>
            </ul>
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/logout"><img src="<?php echo base_url("/assets/img/log-out.svg"); ?>"></a>
        </div>
    </nav>
