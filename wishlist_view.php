
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
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	 
</head>
<style type="text/css">
	/* width */
::-webkit-scrollbar {
  width: 0px;
  height: 0px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}

label{
	display:none;
}
</style>
<body id="admin_page">
		
	<?php include('inc/header.php') ?>

	<h4 class="center-align" style="margin-top: 3%;margin-bottom:2%;">Wishlist Items <a href="<?= base_url() ?>">Wishlist</a></h4>

	<!--login form section start-->
	<div class="row white" style="padding:10px;padding-bottom: 40px;">
		<br><br>
		<div class="col 12 m1 s12"></div>
		<div class="col 18 m10 s12" style="border:1px solid orange;">
			<br><br>
			<table id="myTable">
				<thead>
					<?php

						if(count($list)==0)
						{//echo $this->session->userdata('email');
					//echo "<br>".$this->session->userdata('password');
					//echo "<br>".$this->session->userdata('id');
							foreach($item_owner as $ow)
							{}
								if($this->session->userdata('id')!='')
								{
									if($this->session->userdata('id')==$ow->id)
									{
							echo "<tr><a href='".base_url('User_controller/create_list')."'>Create List</a></tr>";
							}}
						}
						else
						{
							foreach($list as $item)
							{}
								if($this->session->userdata('id')!='')
								{
									if($this->session->userdata('id')==$item->user_id)
									{
						

						
						?>
					<tr>
						<a href="<?php echo base_url('User_controller/create_list') ?>">Create List</a>
					</tr>
					<?php }} ?>
					 
					 
						<a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=To&body=<?php echo current_url() ?>" target="blank" style="color: #ce8602;" class="right fa fa-share-alt"></a>

					

<!-- <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=To&body=Let’s shop together—help me build my list on Amazon!%0D%0A%0D%0Ahttps://www.amazon.com/hz/wishlist/dl/invite/8gmdI9n" target="blank" style="color: #ce8602;" class="right fa fa-share-alt">fghfgh</a>
						<div class="right orange" style="box-shadow: 1px 10px 10px #ce8602;width: 200px; height: 40px;margin-top: 20px;border:1px solid #ce8602;overflow-x: scroll;margin-right:-15px;" id="scroll">
							<h5 style="font-size: 15px;line-height: 10px"><?php  ?></h5>
						</div>-->
					<tr>
						<th>Item Name</th>
						<th>Reason</th>
						<th>Owner Name</th>
						<th>Source</th>
						<th>Price</th>
						<?php

							if($this->session->userdata('id')!=''){
								if($this->session->userdata('id')==$item->user_id){

						?>
						<th>Edit</th>
						<th>Delete</th>
						<?php }} ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($list as $item)
						{
					?>
					<tr>
						<td><?php echo $item->name ?></td>
						<td><p><?php echo $item->reason ?></p>
							<select id="select<?php echo $item->id ?>" style="height: 30px; width: 100px">
								<option <?php if($item->reason=='Like To Have'){ echo "selected"; } ?>>Like To Have</option>
								<option <?php if($item->reason=='Must Have'){ echo "selected"; } ?>>Must Have</option>
								<option <?php if($item->reason=='Would Be Nice To Have'){ echo "selected"; } ?>>Would Be Nice To Have</option>
							</select>
							<script>
								$(document).ready(function(){
									$('#select<?php echo $item->id ?>').change(function(){
								    	alert('dskfjdsf');
								    });
								});
							</script>
						</td>
						<td>
							<?php
								foreach($item_owner as $owner)
								{}
									echo $owner->name;
								
							?>
						</td>
						<td><a href="<?php echo "https://".$item->source ?>" target="blank"><?php echo $item->source ?></a></td>
						<td><?php echo $item->price ?></td>
						<?php
							if($this->session->userdata('id')!=''){
								if($this->session->userdata('id')==$item->user_id){
						?>
						<td><a href="<?= base_url('User_controller/edit_item/'.$item->id) ?>" class="fa fa-edit"></a></td>
						<td><a href="<?= base_url('User_controller/delete_item/'.$item->id) ?>" class="fa fa-trash"></a></td>
						<?php }}} ?>
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
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
    $('#myTable').DataTable();
    $('#select').change(function(){
    	alert('dskfjdsf');
    });
} );
	</script>
</body>
</html>