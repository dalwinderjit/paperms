<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Course Detail Management</title>
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
			<h3> &nbsp;  &nbsp; Course Detail Management</h3>
		</div>
		<div class="contentpanel">
			
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>Course Detail List</h3></td>
						<td class="text-right"><a href="<?php echo base_url().'course-detail/add-course-detail';?>" class="btn btn-primary">Add new Course Detail</a></td>
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
					<div class="col-md-3">
						<?php
							echo form_label('Select Training Institute','training_institute_id');
							echo form_dropdown('training_institute_id', $training_institutes, set_value('training_institute_id'),'id="training_institute_id" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" onChange="search()"'); 
						?>
					</div>
					<div class="col-md-3">
						<?php
							echo form_label('Select Course Name','course_id');
							echo form_dropdown('course_id', $courses, set_value('course_id'),'id="course_id" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" onChange="search()"'); 
						?>
					</div>
					<div class="col-md-3">
						<?php
							echo form_label('Enter Course Order Number','course_id');
							$order_no = array('type' => 'text','name' => 'order_no','id' => 'order_no','class' => 'form-control','placeholder' =>'Enter Order No','value' => set_value('order_no'));
							echo form_input($order_no);
						?>
					</div>
					<div class="col-md-3">
						<?php
							echo form_label('Enter Order Date','course_id');
							$order_date = array('type' => 'text','name' => 'order_date','id' => 'order_date','class' => 'form-control','placeholder' =>'Enter Order Date','value' => set_value('order_date'));
							echo form_input($order_date);
						?>
					</div>
					<div class="col-md-9">
					</div>
					<div class="col-md-3">
						<br>
						<button class="btn btn-primary" onClick="search();">Search</button>
					</div>
				</div>
				<div class="row">
					
					<div class="col-md-12">
						<table class="table table-bordered table-striped" id="course_names">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Title</th>
									<th>Institute Name</th>
									<th>Course Name</th>
									<th>Order No./Order Date</th>
									<th>From Date</th>
									<th>To Date</th>
									<th>Created</th>
									<th>Enabled</th>
									<th>Deleted</th>
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
var dataTable = null;
$(document).ready(function(){
	jQuery(".select2").select2({width:"100%"});
	jQuery('#order_date').datepicker({dateFormat:'dd/mm/yy',changeMonth:true,changeYear:true});
});


$(document).ready(function(){
	dataTable = $('#course_names').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"<?php echo base_url().'course-detail/ajax-course-detail';?>",
			type:"POST",
			"data":function(data){
				data.training_institute_id = $('#training_institute_id').val();
				data.course_id = $('#course_id').val();
				data.order_no = $("#order_no").val();
				data.order_date = $('#order_date').val();
			},
		},"columns": [
                    { "data": "sno"},
					{ "data": "title"},
					{ "data": "institute_name"},
					{ "data": "course_name"},
					{ "data": "order_no_date"},
					{ "data": "start_date"},
					{ "data": "end_date"},
					{ "data": "created"},
					{ "data": "enabled"},
					{ "data": "deleted"},
                    { "data": "action"},
                 ],
	});
	
});
function search(){
	dataTable.draw();
}
</script>

</body>
</html>