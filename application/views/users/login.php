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
        <link rel="stylesheet" href="<?php echo base_url("/assets/css/styles.css"); ?>">
        <style type="text/css">
            body {
                background: url("<?php echo base_url("/assets/img/07_background.jpg"); ?>") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>

    <body>

    <div class="container">

        <div class="row mt-5">
            <div class="col text-center">
                <a href="<?php echo site_url(); ?>">
                    <img class="m-3 mx-auto" src="<?php echo base_url("/assets/img/logosoluforma.svg"); ?>" style="height:80px">
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body p-5">
                        <form class="form-signin" action="" method="post">
                            <?php
                            if(!empty($error_msg)) {
                                echo '<p class="small">'.$error_msg. '</p>';
                            }
                            ?>
                            <div class="mt-2 mb-2">
                                <label for="email">Endereço de E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required autocomplete="email" autofocus>
                                <?php echo form_error('email','<span class="help-block">','</span>'); ?>
                            </div>
                            <div class="mt-3 mb-2">
                                <label for="password">Senha de Acesso</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                                <div class="small"><?php echo form_error('password'); ?></div>
                            </div>
                            <input type="text" name="login_date" value="<?php echo date("Y-m-j"); ?>" id="inputPassword" hidden/>
                            <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="loginSubmit" value="Submit">Iniciar Sessão</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-5 justify-content-center">
            <div class="col text-center">
                <p class="text-muted small">Soluforma, todos os direitos reservados &copy; 2018</p>
            </div>
        </div>

    </div>

    </body>

</html>
