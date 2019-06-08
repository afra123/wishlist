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

	<h4 class="center-align" style="margin-top: 3%;margin-bottom:2%;">User Panel <a href="<?= base_url() ?>">Wishlist</a></h4>

	<!--login form section start-->
	<div class="row white" style="padding:10px;padding-bottom: 40px;">
		<br><br>
		<div class="col 12 m1 s12"></div>
		<div class="col 18 m10 s12" style="border:1px solid orange;">
			<br><br>
			<table class="striped centered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Owner Name</th>
						<th>View</th>
						<?php if($this->session->userdata('id')!=''){ ?>
						<th>Edit</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php

						foreach($wishlist_list as $wish)
						{

					?>
					<tr>
						<td style="width: 150px;"><?php echo $wish->wishlist_title ?></td>
						<td><?php echo $wish->wishlist_desc ?></td>
						<td style="width: 150px;"><?php echo $wish->name ?></td>
						<td><a href="<?= base_url('User_controller/wishlist_view/'.$wish->id); ?>" class="fa fa-eye"></a></td>
						<?php if($this->session->userdata('id')!=''){ ?>
						<td>
							<?php
								if($this->session->userdata('id')!=$wish->id)
								{
									echo "<a href='#' class='fa fa-ban'></a>";
								}
								else
								{
							?>
							<a href="<?= base_url('User_controller/wishlist_edit/'.$wish->id); ?>" class="fa fa-edit"></a>
							<?php } ?>
						</td>
						<?php } ?>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
		<div class="col 12 m1 s12"></div>
	</div>
	<!--login form section start-->

<!--jquery js-->
	<script type="text/javascript" src="<?php echo base_url('asset/materialize/js/jquery-3.2.1.min.js'); ?>"></script>
	<!--materialize js-->
	<script type="text/javascript" src="<?php echo base_url('asset/materialize/js/materialize.min.js'); ?>"></script>
</body>
</html>