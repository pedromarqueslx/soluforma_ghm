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
        <style type="text/css">

        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background: url("<?php echo base_url("/assets/img/07_background.jpg"); ?>") no-repeat center center fixed;
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
            <img class="m-5 mx-auto" src="<?php echo base_url("/assets/img/logosoluforma.svg"); ?>" style="min-height: 110px">
        </a>

        <!--<h1 class="mt-3 mb-3 font-weight-normal">Iniciar Sessão</h1>-->

        <?php
            if(!empty($error_msg)) {
                echo '<p class="small">'.$error_msg. '</p>';
            }
        ?>

        <input type="email" name="email" class="form-control" placeholder="Endereço de E-mail" required autofocus>

            <?php echo form_error('email','<span class="help-block">','</span>'); ?>

        <input type="password" name="password" class="form-control" placeholder="Senha de Acesso" required>

            <div class="small"><?php echo form_error('password'); ?></div>

        <input type="text" name="login_date" value="<?php echo date("Y-m-j"); ?>" id="inputPassword" hidden/>

        <button class="btn btn-lg btn-primary btn-block mt-5" type="submit" name="loginSubmit" value="Submit">Entrar</button>

        <p class="mt-5 mb-3 text-muted small">&copy; 2018</p>

        </form>

    </body>

</html>
