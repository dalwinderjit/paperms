<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Tracking users</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <!--link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" /-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <style type="text/css">
     .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
   </style>
  </head>
<body>
<?php //echo validation_errors(); ?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Btalion/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Track users over here</h3>
		</div>
		<div class="contentpanel">
			<div class="row">
				<div class="col-md-12"> 
					<?php if($this->session->flashdata('success_msg')): ?>
					<div class="alert alert-success alert-dismissible" id="warning" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
					</div>
					<?php  endif; ?>         
					<?php if($this->session->flashdata('error_msg')): ?>
						<div class="alert alert-warning alert-dismissible" id="warning" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
						</div>
					 <?php  endif; ?>
				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- contentpanel -->
		
        <div class="panel-heading">
			<div class="row">
			<form method="post">
				<div class="col-md-3">
				<?php
					$username = array('type' => 'text','name' => 'username','id' => 'username','class' => 'form-control','placeholder' =>'Enter Username','value' => set_value('username'));
					echo form_input($username);
					echo form_error('username');
                ?>
				</div>
				<div class="col-md-3">
				<?php
					$ipaddress = array('type' => 'text','name' => 'ipaddress','id' => 'ipaddress','class' => 'form-control','placeholder' =>'Enter IP Address','value' => set_value('ipaddress'));
					echo form_input($ipaddress);
					echo form_error('ipaddress');
                ?>
				</div>
				<div class="col-md-3">
				<?php
					$from_date = array('type' => 'text','name' => 'from_date','id' => 'from_date','class' => 'form-control','placeholder' =>'From Time','value' => set_value('from_date'));
					echo form_input($from_date);
					echo form_error('from_date');
                ?>
				</div>
				<div class="col-md-3">
				<?php
					$to_date = array('type' => 'text','name' => 'to_date','id' => 'to_date','class' => 'form-control','placeholder' =>'To Time','value' => set_value('to_date'));
					echo form_input($to_date);
					echo form_error('to_date');
                ?>
				</div>
				<div class="col-md-3"></div><div class="col-md-3"></div><div class="col-md-3"></div>
				<div class="col-md-3 text-right"><br>
					<input type="submit" class="btn btn-primary" name="submit"/>
				</div>
			</form>
			</div>
			<div class="row">
				<div class="col-md-12">
				<?php //var_dump($this->session);
					//echo $this->session->userdata('__ci_last_regenerate');
				?>
					<table class="table">
						<thead>
							<tr>
								<th>S. No. </th>
								<th>User name </th>
								<th>IP address</th>
								<th>Log in time</th>
								<th>Log out time</th>
								<!--th>Session</th-->
								<!--th>Status</th-->
							</tr>
						</thead>
						<tbody>
							<?php 
							$counter = 1;
							foreach($logs as $k=>$log){ ?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td><?php echo $log->user_name; ?></td>
								<td><?php echo $log->ip_address; ?></td>
								<td><?php echo $log->log_in_time; ?></td>
								<td><?php echo $log->log_out_time; ?></td>
								
								
								<!--td>Online/offline</td-->
							</tr>
							<?php $counter++;} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
  	</div>
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
});
</script>
</body>
</html>