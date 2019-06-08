<!DOCTYPE html>
<html>
<head>
	<title>Admin Lgoin | Online Shopping Site</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/5.jpg'); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/style.css') ?>">
	<!--materialize css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/materialize/css/materialize.min.css') ?>">
	<!--font awesome css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/font/font-awesome/css/font-awesome.min.css'); ?>">
	<!--material icon css-->
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body id="admin_page">
		
	<?php include('inc/header.php') ?>
	<h4 class="center-align" style="margin-top: 5%;margin-bottom:2%;">User Login <a href="<?= base_url() ?>">Wishlist</a></h4>

	<!--login form section start-->
	<div class="row white" style="padding:10px;padding-bottom: 40px;">
		<br><br>
		<div class="col 14 m4 s12"></div>
		<div class="col 14 m4 s12" style="border:1px solid orange;">
			<br><br>

			<?= form_open('User_controller/user_login',array('class'=>'form')) ?>

			<!--login fail section start-->
			<?php if($msg = $this->session->flashdata('msg')){ ?>
			<p class="red-text" style="font-size: 14px;"><?php echo $msg ?></p>
			<?php } ?>
			<!--Login fail section end-->
			<div class="input-field">
				<input type="text" name="u_email" id="u_email">
				<label for="u_email">Email</label>
			</div>
			<div class="input-field">
				<input type="password" name="u_password" id="u_password">
				<label for="u_password">Password</label>
			</div>
			<button type="submit" class="btn waves-effect waves-light black">Login</button>
			<?= form_close(); ?>
			<br><br>
			<center><a href="<?= base_url('User_controller/signup'); ?>">Not Registered!</a></center><br><br>
		</div>
		
		<div class="col 14 m4 s12"></div>
	</div>
	<!--login form section start-->

<!--jquery js-->
	<script type="text/javascript" src="<?php echo base_url('asset/materialize/js/jquery-3.2.1.min.js'); ?>"></script>
	<!--materialize js-->
	<script type="text/javascript" src="<?php echo base_url('asset/materialize/js/materialize.min.js'); ?>"></script>

	<script type="text/javascript">
		
		$(document).ready(function(){
			$('.form').submit(function(e){
				//alert('ok');
				//var user_name = $('#user_name').val();
				var u_email = $('#u_email').val();
				var u_password = $('#u_password').val();
				

				if(u_email=='')
				{
					M.toast({html:'Please enter valid email'});
					e.preventDefault();
				}

				if(u_password=='')
				{
					M.toast({html:'Please enter valid password'});
					e.preventDefault();
				}
				
			});
		});

	</script>

</body>
</html>