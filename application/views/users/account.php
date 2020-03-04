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
a{color:#1b75ce;}
body {
background: #e5eaf0;
background: #edf2f7;
background: #FFFFFF;
background: #ededed;
}
footer {
background: #ccc;
}
</style>   	
</head>

<body>
<div class="ink-grid">
<div class="all-100 small-100 tiny-100 small align-right small uppercase"><p class="note"><?php echo date("Y-m-d");?><p></div>   
    <header>
        <div class="column-group">
        	<div class="all-50 small-100 tiny-100 small align-left"><h2><a href="<?php echo site_url();?>"><img src="<?php echo base_url("/assets/img/logoperolaparalela.png"); ?>"></img></div>
        	<div class="all-50 small-100 tiny-100 small align-right"> 
        		<a href="<?php echo site_url();?>/users/registration"><button class="ink-button green"><span class="fa fa-user"></span></button></a>
        		<a href="<?php echo base_url(); ?>index.php/users/logout"><button class="ink-button green"><span class="fa fa-sign-in"></span></button></a> 
        	</div>              	
        </div>
	<?php
		$segment = $this->uri->segment(1);
		//echo $segment;
	?>
	</header>

		<hr>
        
<div class="container">
    <!-- validation -->
	<div class="grids">
		<div class="progressbar-heading grids-heading">
			<h2>User Account</h2>
		</div>
		
		<div class="forms-grids">
			<div class="forms3">
			<div class="w3agile-validation w3ls-validation">
				<div class="panel panel-widget agile-validation register-form">
					<div class="validation-grids widget-shadow" data-example-id="basic-forms">
						<a href="<?php echo base_url(); ?>users/logout" class="logoutBtn">Logout</a>
						<div class="input-info">
							<h3>Welcome <?php echo $user['name']; ?>!</h3>
						</div>
						<div class="account-info">
							<p><b>Name: </b><?php echo $user['name']; ?></p>
							<p><b>Email: </b><?php echo $user['email']; ?></p>
							<p><b>Phone: </b><?php echo $user['phone']; ?></p>
							<p><b>Gender: </b><?php echo $user['gender']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"> </div>
			</div>
		</div>
	</div>
	<!-- //validation -->
</div>
</body>
</html>