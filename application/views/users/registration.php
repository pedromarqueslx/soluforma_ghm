<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Pérola Paralela</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!-- Place favicon.ico and apple-touch-icon(s) here  -->
        <link rel="shortcut icon" href="<?php echo base_url("/assets/img/favicon.ico"); ?>">
        <link rel="apple-touch-icon" href="http://cdn.ink.sapo.pt/3.1.10/img/touch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="http://cdn.ink.sapo.pt/3.1.10/img/touch-icon-ipad.png"> 
        <link rel="apple-touch-icon" sizes="120x120" href="http://cdn.ink.sapo.pt/3.1.10/img/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://cdn.ink.sapo.pt/3.1.10/img/touch-icon-ipad-retina.png">
        <link rel="apple-touch-startup-image" href="http://cdn.ink.sapo.pt/3.1.10/img/splash.320x460.png" media="screen and (min-device-width: 200px) and (max-device-width: 320px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="http://cdn.ink.sapo.pt/3.1.10/img/splash.768x1004.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="http://cdn.ink.sapo.pt/3.1.10/img/splash.1024x748.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <!-- load Ink's css from the cdn -->
        <link rel="stylesheet" type="text/css" href="http://cdn.ink.sapo.pt/3.1.10/css/ink-flex.min.css">
        <link rel="stylesheet" type="text/css" href="http://cdn.ink.sapo.pt/3.1.10/css/font-awesome.min.css">
        <!-- load Ink's css for IE8 -->
        <!--[if lt IE 9 ]>
        <link rel="stylesheet" href="http://cdn.ink.sapo.pt/3.1.10/css/ink-ie.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <![endif]-->
        <!-- test browser flexbox support and load legacy grid if unsupported -->
        <script type="text/javascript" src="http://cdn.ink.sapo.pt/3.1.10/js/modernizr.js"></script>
        <script type="text/javascript">
            Modernizr.load({
              test: Modernizr.flexbox,
              nope : 'http://cdn.ink.sapo.pt/3.1.10/css/ink-legacy.min.css'
            });
        </script>
        <!-- load Ink's javascript files from the cdn -->
        <script type="text/javascript" src="http://cdn.ink.sapo.pt/3.1.10/js/holder.js"></script>
        <script type="text/javascript" src="http://cdn.ink.sapo.pt/3.1.10/js/ink-all.min.js"></script>
        <script type="text/javascript" src="http://cdn.ink.sapo.pt/3.1.10/js/autoload.js"></script>
       	<!--<link rel="stylesheet" href="http://perolaparalela.pt/transdata/ink/css/ink.css">-->
    	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style type="text/css">
        label, legend{color:#CCC;}
        .ink-button, .ink-navigation {box-shadow: 3px 3px 6px #222222;}
        .ink-button, .ink-navigation, .ink-footer, input{box-shadow: 3px 3px 6px #222222;}
        a{color:#1b75ce;}
        body {
        background: #e5eaf0;
        background: #edf2f7;
        background: #FFFFFF;
        background: #ededed;
        background-image: url("<?php echo base_url("/assets/img/09_background.jpg"); ?>");
        background-size: 100%;
        width: 100%;
        height: 100%;
        /* position: fixed; */
        left: 0px;
        top: 0px; 
        background-repeat: no-repeat;
        }
        footer {
        background: #999;
        }
                hr { 
        margin: 10px auto 10px; 
        border-top: 1px dashed #fff;
        }
    </style> 

</head>
<body>
	<div class="ink-grid">
	    	<div class="all-100 small-100 tiny-100 small align-right small uppercase"><p class="note"><?php //echo date("Y-m-d");?><p></div>   
	    <header>
	        <div class="column-group">
	        	<div class="all-50 small-100 tiny-100 small align-left"><h2><a href="<?php echo site_url();?>"><img src="<?php echo base_url("/assets/img/logoperolaparalela.png"); ?>"></img></div>
	        	<div class="all-50 small-100 tiny-100 small align-right"> 
	        		<a href="<?php echo site_url();?>/users/registration"><button class="ink-button grey"><span class="fa fa-user"></span>  Registo de Utilizador</button></a>
	        		<a href="<?php echo base_url(); ?>index.php/users/logout"><button class="ink-button grey"><span class="fa fa-sign-in"></span> Login</button></a> 
	        	</div>              	
	        </div>
		<?php
			$segment = $this->uri->segment(1);
			//echo $segment;
		?>
		</header>
		<hr>
<div class="ink-grid">
  <div class="column-group">
    <div class="all-33">
    </div>
    <div class="all-33 medium-100 small-100 tiny-100">
		<form action="" method="post" class="ink-form column-group gutters">
                <fieldset class="all-100 small-100 tiny-100">
                    <legend>Registo Utilizador:</legend>
                    <div class="control-group">
                        <label for="name2">Nome</label>
                        <div class="control prepend-symbol">
                        	<span>
							<input type="text" name="name" placeholder="Nome" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
							<i class="fa fa-user"></i>
							<?php echo form_error('name','<span class="help-block">','</span>'); ?>
                        	</span>
						</div>
					</div>

                    <div class="control-group">
                        <label for="name2">E-mail</label>
                        <div class="control prepend-symbol">
                        	<span>
                        	<input type="email" name="email" placeholder="E-mail" data-error="Endereço de e-mail inválido" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
							<i class="fa fa-envelope"></i>
							<?php echo form_error('email','<span class="help-block">','</span>'); ?>
						    </span>
						</div>
					</div>

                    <div class="control-group">
                        <label for="name2">Telefone</label>
                        <div class="control prepend-symbol">
                        	<span>
							<input type="text" name="phone" placeholder="Telefone" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
							<i class="fa fa-phone"></i>
							</span>
						</div>
					</div>

                    <div class="control-group">
                        <label for="name2">Password</label>
                        <div class="control prepend-symbol">
                        	<span>
						  	<input type="password" name="password" placeholder="Password" required="">
					  		<?php echo form_error('password','<span class="help-block">','</span>'); ?>
							<i class="fa fa-lock"></i>
							</span>
						</div>
					</div>

                    <div class="control-group">
                        <label for="name2">Confirmar Password</label>
                        <div class="control prepend-symbol">
                            <span>
                            <input type="password" data-match=".inputPassword" data-match-error="Whoops, these don't match" name="conf_password" placeholder="Confirmar password" required="">
                            <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                    </div>

                    <div class="control-group">
                        
                        <div class="control prepend-symbol">

                            <input type="text" name="login_date" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/> 

                        </div>

                    </div>

                    <div class="control-group">
						<?php
						if(!empty($user['gender']) && $user['gender'] == 'Female'){
							$fcheck = 'checked="checked"';
							$mcheck = '';
						}else{
							$mcheck = 'checked="checked"';
							$fcheck = '';
						}
						?>
                        <div class="control">
                        	<ul class="control unstyled">
							<li>	
								<input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>><label>Sra.</label>
							</li>
							<li>	
								<input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>><label>Sr.</label>
							</li>
							</ul>
						</div>
					</div>	
                    
					<button type="submit" name="regisSubmit" class="ink-button grey" value="Submit"/>Registar</button>
                </fieldset>
			</form>
			<p class="footInfo">Já têm conta? <a href="<?php echo base_url(); ?>index.php/users/login">Login</a></p>

    </div>    
    <div class="all-33">
      
    </div>
  </div>
</div>
            	<!-- //validation -->
</div>
</body>
</html>