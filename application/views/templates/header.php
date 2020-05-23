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

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/bootstrap.min.css">

<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.slim.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables/buttons.dataTables.min.css">

<style type="text/css">
/*
 * Base structure
 */
/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top:55px;
}
.warning {
  background-color: red !important;
}
/* Typography */
h1 {
  margin-top: 20px;
  padding-bottom: 9px;
  border-bottom: 1px solid #eee;
  font-size: 24px;
  color: #0066cc;
}
h2 {
  margin-bottom: 10px;
  font-size: 18px;
  color: #0066cc;
}
h3 {
  font-size: 18px;
  color: #0066cc;
}
/*
 * Sidebar
 */
.sidebar {
  position: fixed;
  top: 51px;
  bottom: 0;
  left: 0;
  z-index: 1000;
  padding: 20px;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
  border-right: 1px solid #eee;
}
/* Sidebar navigation */
.sidebar {
  padding-left: 0;
  padding-right: 0;
}
.sidebar .nav  {
  margin-bottom: 20px;
}
.row {
  margin-bottom: 20px;
}
.sidebar{
  width: 100%;
}
.sidebar  {
  margin-left: 0;
}
.sidebar .nav-link {
  border-radius: 0;
}
.small {
  margin-top: 5px;
  font-size: 12px;
  color: #ff6600;
}
 /* Placeholders */
.placeholders {
  padding-bottom: 3rem;
}
.placeholder img {
padding-top: 1.5rem;
padding-bottom: 1.5rem;
}
input, textarea, .btn, fieldset, select {
box-shadow: 1px 1px 2px #f1f1f1;
font-size: 90%; 
}
.form-control{
font-size: 85%; 
}
label{
  color: #0066cc;
}
.form-control::placeholder {
    color: #CCCCCC;
    opacity: 1; /* Firefox */
}
.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color: #CCCCCC;
}
.form-control::-ms-input-placeholder { /* Microsoft Edge */
   color: #CCCCCC;
}
.custom-control{
}
table, th, td {
 font-size: 90%;
}
nav {
 font-size: 95%;
}
tfoot input {
        width: 100%;
        padding: 3px;
    }
.readonly {
  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
  pointer-events: none;
  touch-action: none;
}

select[readonly] {
  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
  pointer-events: none;
  touch-action: none;
}

.navbar {
    min-height: 50px !important;
}
.navbar-nav, .font-small {
    font-size: small !important;
}

.navbar-nav {
    min-height: 50px !important;
    height: 50px !important;
}

.navbar-nav li  {
    height: 30px !important;
    margin-top: 20px;
}

.logo {
    height: 30px !important;
    margin-top: 10px;
    margin-left: -30px;
}



</style>

</head>
<body onload="submitdemissao(); submitBday()">

<!-- <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<?php
$segment = $this->uri->segment(1);
$segment_2 = $this->uri->segment(2);
$segment_3 = $this->uri->segment(3);
?>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">

<ul class="navbar-nav mr-auto">

    <a class="logo" href="<?php echo site_url();?>/users/account/">
        <img src="<?php echo base_url("/assets/img/logoperolaparalela.png"); ?>">
    </a>


<li <?php if(($segment == "formadores" && $segment_2 == 'index') || ($segment == "formadores") || ($segment == "formadores" && $segment_2 == "edit") || ($segment == "formadores" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
<?php if ($user['user_profile'] == 'Administrator')
{echo '<a class="nav-link" href="' . site_url() . '/formadores/index/">Formadores</a>';}
?>
</li>

<li <?php if(($segment == "categorias_profissionais" && $segment_2 == 'index') || ($segment == "categorias_profissionais") || ($segment == "categorias_profissionais" && $segment_2 == "edit") || ($segment == "categorias_profissionais" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
<?php if ($user['user_profile'] == 'Administrator')
{echo '<a class="nav-link" href="' . site_url() . '/categorias_profissionais/index/">Categorias Profissionais</a>';}
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
    <?php if(($segment == "servicos2019" && $segment_2 == 'index') || ($segment == "servicos2019") || ($segment == "servicos2019" && $segment_2 == "edit") || ($segment == "servicos2019" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
    <?php if(($segment == "servicos" && $segment_2 == 'index') || ($segment == "servicos") || ($segment == "servicos" && $segment_2 == "edit") || ($segment == "servicos" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>"
    href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Certificados</a>
    <div class="dropdown-menu" aria-labelledby="dropdown01">
        <?php if ($user['user_profile'] == 'Administrator')
        {echo '<a class="dropdown-item" href="' . site_url() . '/servicos2020/index/">Certificados 2020</a>';}
        ?>
        <?php if ($user['user_profile'] == 'Administrator')
        {echo '<a class="dropdown-item" href="' . site_url() . '/servicos2019/index/">Certificados 2019</a>';}
        ?>
        <?php if ($user['user_profile'] == 'Administrator')
        {echo '<a class="dropdown-item" href="' . site_url() . '/servicos/index/">Certificados 2018</a>';}
        ?>
    </div>
</li>


<!--
<li <?php //if(($segment == "servicos" && $segment_2 == 'index') || ($segment == "servicos") || ($segment == "servicos" && $segment_2 == "edit") || ($segment == "servicos" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
<?php //if ($user['user_profile'] == 'Administrator')
/*
{echo '<a class="nav-link" href="' . site_url() . '/servicos/index/">Certificados 2018</a>';}
*/
?>
</li>
-->
<!--
<li <?php //if(($segment == "servicos2019" && $segment_2 == 'index') || ($segment == "servicos2019") || ($segment == "servicos2019" && $segment_2 == "edit") || ($segment == "servicos2019" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
<?php //if ($user['user_profile'] == 'Administrator')
/*
{echo '<a class="nav-link" href="' . site_url() . '/servicos2019/index/">Certificados 2019</a>';}
*/
 ?>
</li>
-->

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle
    <?php if(($segment == "formacoes2019" && $segment_2 == 'index') || ($segment == "formacoes2019") || ($segment == "formacoes2019" && $segment_2 == "edit") || ($segment == "formacoes2019" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>
    <?php if(($segment == "formacoes" && $segment_2 == 'index') || ($segment == "formacoes") || ($segment == "formacoes" && $segment_2 == "edit") || ($segment == "formacoes" && $segment_2 == "create")) { echo 'active'; } else {echo ""; } ?>"
    href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Formações</a>
    <div class="dropdown-menu" aria-labelledby="dropdown01">
        <?php if ($user['user_profile'] == 'Administrator')
        {echo '<a class="dropdown-item" href="' . site_url() . '/formacoes2020/index/">Formações 2020</a>';}
        ?>
        <?php if ($user['user_profile'] == 'Administrator')
        {echo '<a class="dropdown-item" href="' . site_url() . '/formacoes2019/index/">Formações 2019</a>';}
        ?>
        <?php if ($user['user_profile'] == 'Administrator')
        {echo '<a class="dropdown-item" href="' . site_url() . '/formacoes/index/">Formações 2018</a>';}
        ?>
    </div>
</li>

<!--
<li <?php //if(($segment == "formacoes" && $segment_2 == 'index') || ($segment == "formacoes") || ($segment == "formacoes" && $segment_2 == "edit") || ($segment == "formacoes" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
<?php //if ($user['user_profile'] == 'Administrator')
/*
{echo '<a class="nav-link" href="' . site_url() . '/formacoes/index/">Formações 2018</a>';}
*/
?>
</li>
-->
<!--
<li <?php //if(($segment == "formacoes2019" && $segment_2 == 'index') || ($segment == "formacoes2019") || ($segment == "formacoes2019" && $segment_2 == "edit") || ($segment == "formacoes2019" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
    <?php //if ($user['user_profile'] == 'Administrator')
/*
{echo '<a class="nav-link" href="' . site_url() . '/formacoes2019/index/">Formações 2019</a>';}
*/
?>
</li>
-->

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

<li <?php if(($segment == "infracoes" && $segment_2 == 'index') || ($segment == "infracoes") || ($segment == "infracoes" && $segment_2 == "edit") || ($segment == "infracoes" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
    <?php if ($user['user_profile'] == 'Administrator')
    {echo '<a class="nav-link" href="' . site_url() . '/infracoes/index/">Infraçoes</a>';}
    ?>
</li>

<li <?php if(($segment == "discos" && $segment_2 == 'index') || ($segment == "discos") || ($segment == "discos" && $segment_2 == "edit") || ($segment == "discos" && $segment_2 == "create")) { echo "class='nav-item active'"; } else {echo ""; } ?> >
    <?php if ($user['user_profile'] == 'Administrator')
    {echo '<a class="nav-link" href="' . site_url() . '/discos/index/">Discos</a>';}
    ?>
</li>

<li>
    <a class="nav-link" href="<?php echo base_url(); ?>index.php/users/logout">:: SAIR ::</a>
</li>

</ul>

<!--
<div class="font-small">
<?php //if ($user['user_profile'] == 'Editor') { echo $user['name']; } else { echo "<a href=\"" . base_url() . "index.php/users/edit/" . $user['id'] . "\">" . $user['name'] ; } ?> </a> |
<?php //if ($user['user_profile'] == 'Administrator') { echo "<a href=\"" . base_url() . "index.php/users/index/" . "\">" . 'Utilizadores</a>'; } ?> |
</div>
-->


</div>
</nav>


