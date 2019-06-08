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

	<h4 class="center-align" style="margin-top: 5%;margin-bottom:2%;">Create Wishlist <a href="<?= base_url() ?>">Wishlist</a></h4>

	<!--login form section start-->
	<div class="row white" style="padding:10px;padding-bottom: 40px">
		<br><br>
		<div class="col 14 m4 s12"></div>
		<div class="col 14 m4 s12" id="wish_form" style="border:1px solid #000;">
			<br><br>

			<?= form_open('User_controller/wishlist',array('class'=>'form')) ?>

			<!--login fail section start-->
			<?php if($msg = $this->session->flashdata('msg')){ ?>
			<p class="red-text" style="font-size: 14px;"><?php echo $msg ?></p>
			<?php } ?>
			<!--Login fail section end-->
			<div class="input-field">
				<input type="text" name="title" id="title">
				<label for="title">Title</label>
			</div>
			<div class="input-field">
				<input type="text" name="description" id="description">
				<label for="description">Description</label>
			</div>

			<button type="submit" class="btn waves-effect waves-light orange"
			<?php
				foreach($wishlist as $wl)
				{
					if($wl->wishlist_title=='')
					{

					}
					else
					{
						echo "disabled";
					}
				}
			?>

			>Create Wishlist</button>
			<?= form_close(); ?>
			<br><br>
			<center><a href="wishlist" style="color: #000;">Already Created!</a></center><br><br>
		</div>
		
		<div class="col 12 m1 s12"></div>
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
				var title = $('#title').val();
				var desc = $('#description').val();
				if(title=='')
				{
					M.toast({html:'Please enter valid title'});
					e.preventDefault();
				}

				if(desc=='')
				{
					M.toast({html:'Please enter valid description'});
					e.preventDefault();
				}
				
			});
		});

	</script>

</body>
</html>