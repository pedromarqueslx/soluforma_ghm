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

<!-- For Bootstrap CSS files: -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/css/bootstrap.min.css"> -->

<!-- For Bootstrap JS files: -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="<?php //echo base_url(); ?>assets/js/bootstrap.min.js"></script> -->

<!-- LOAD JQUERY -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- LOAD CHARTJS.ORG -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<!-- LOAD DATATABLES.NET -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.flash.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.js"></script>

<style type="text/css">
body {
padding-top: 40px;
padding-bottom: 40px;
background: url("<?php echo base_url("/assets/img/01_background.jpg"); ?>") no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
.form-signin {
width: 100%;
max-width: 330px;
padding: 15px;
margin: 0 auto;
}
.form-signin .checkbox {
font-weight: 400;
}
.form-signin .form-control {
position: relative;
box-sizing: border-box;
height: auto;
padding: 10px;
font-size: 16px;
}
.form-signin .form-control:focus {
z-index: 2;
}
.form-signin input[type="email"] {
margin-bottom: -1px;
border-bottom-right-radius: 0;
border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
margin-bottom: 10px;
border-top-left-radius: 0;
border-top-right-radius: 0;
}
</style> 
</head>

<body class="text-center">
<form class="form-signin" action="" method="post">

<a href="<?php echo site_url(); ?>">
<img class="mb-4" src="<?php echo base_url("/assets/img/logosoluforma.png"); ?>"></a>
<h1 class="h3 mb-3 font-weight-normal">Iniciar Sessão</h1>
<!--Echo error message for login-->
<?php 
if(!empty($error_msg)){
echo '<p class="small">'.$error_msg. '</p>';
}
?>

<input type="email" name="email" class="form-control" placeholder="Endereço de E-mail" required autofocus>
<!--<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Endereço de e-mail" required autofocus>-->
<?php echo form_error('email','<span class="help-block">','</span>'); ?>

<input type="password" name="password" class="form-control" placeholder="Senha de Acesso" required>
<!--<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha de acesso" required>-->
<div class="small"><?php echo form_error('password'); ?></div>

<input type="text" name="login_date" value="<?php echo date("Y-m-j"); ?>" id="inputPassword" hidden/>

<button class="btn btn-lg btn-primary btn-block" type="submit" name="loginSubmit" value="Submit">Entrar</button>

<p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>
</body>
</html>