<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Ranks Management</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" />
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
<?php $this->load->view(F_CA.'html/navbar');  ?>
	<div class="mainpanel">
	<?php $this->load->view(F_CA.'/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Ranks Management</h3>
		</div>
		<div class="contentpanel">
			
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>Rank Groups</h3></td>
						<td class="text-right"><a href="<?php echo base_url().'ca-ranks-add';?>" class="btn btn-primary">Add new Rank</a></td>
					</tr>
				</table>
			</div>
			<div class="panel-body">
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
			
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped" id="rank_groups">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Title</th>
									<th>Description</th>
									<th>Short Name</th>
									<th>Rank Group</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
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

<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.datatables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery(".select2").select2({width:"100%"});
	//jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	//jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
});


$(document).ready(function(){
	var dataTable = $('#rank_groups').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"<?php echo base_url() .'ca-ranks-ajax';?>",
			type:"POST",
			"data":function(data){
				//data.main_categories = $('#weapon_main_category').val(),
				//data.sub_categories = $('#weapon_sub_category').val(),
				//data.weapon_name = $('#weapon_name').val()
			},
		},"columns": [
                    { "data": "sno"},
					{ "data": "name"},
					{ "data": "description"},
					{ "data": "short_name"},
					{ "data": "group_rank"},
                    { "data": "action"},
                 ],
	});
	
});
</script>

</body>
</html>