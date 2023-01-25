<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deployment - Sanction Strength Management</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" />
   <!--link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css"/-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-datetimepicker-standalone.4.17.47.min.css"/>
<!--link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /-->
   
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
			<h3> &nbsp;  &nbsp; Deployment - Sanction Strength Management</h3>
		</div>
		<div class="contentpanel">
			
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>Sanction Strength</h3></td>
						<td class="text-right"></td>
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
							<div class="alert alert-danger alert-dismissible" id="warning" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Error!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
							</div>
						 <?php  endif; ?>
					</div><!-- col-md-6 -->
				</div><!-- row -->
			
				<div class="row">
						<?php $this->form_validation->set_error_delimiters('<span class="error">', '</span>'); ?>
					<div class="col-md-3">
						<?php
							echo form_label('Select Battalion','battalions');
							echo form_dropdown('battalions[]',$battalions,set_value('battalions'),'name="battalions" class="select2" id="battalions" multiple');
							echo form_error('battalions');
						?>
					</div>
					<div class="col-md-3">
						<?php
							echo form_label('Select Rank Group','rank_groups');
							echo form_dropdown('rank_groups[]',$rank_groups,set_value('rank_groups'),'name="rank_groups" class="select2" id="rank_groups" multiple');
							echo form_error('rank_groups');
						?>
					</div>
					
					<div class="col-md-6">
						<div class="col-md-12">
							<?php
								echo form_checkbox(['id'=>'date_time_filter','name'=>'date_time_filter','onClick'=>'seDateTimeFilter()']);
								echo form_label('  Use Datefrom to Dateto Filter','date_time_filter');
							?>
						</div>
						<div class="col-md-5">
							<?php 
								$dateFrom = [
									'name'=>'dateFrom',
									'id'=>'dateFrom',
									'type'=>'text',
									'class' =>'form-control',
									'placeholder'=>'yyyy-mm-dd hh:ii:ss',
									'value' => set_value('dateFrom',date('Y-m-d H:i:s'))
								];
								echo form_input($dateFrom);
							?>
						</div>
						<div class="col-md-5">
							<?php 
								$dateTo = [
									'name'=>'dateTo',
									'id'=>'dateTo',
									'type'=>'text',
									'class' =>'form-control',
									'placeholder'=>'yyyy-mm-dd hh:ii:ss',
									'value' => set_value('dateTo',date('Y-m-d H:i:s'))
								];
								echo form_input($dateTo);
							?>
						
						</div>
						<div class="col-md-2">
													<?php 
								$submit = [
									'name'=>'submit',
									'id'=>'submit',
									'type'=>'submit',
									'class' =>'btn btn-primary',
									'value'=>'Search',
									'onClick'=>'getSanctionStregth()'
								];
								echo form_input($submit);
							?>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
					<br>
						<table class="table table-bordered table-striped" id="sanction_strength">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Battalion</th>
									<th>Rank</th>
									<th>Date</th>
									<th>Strength</th>
									<th>Edited By</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
	<b>NOTE;</b> Here we are managing the santion strength added by various battalions
	Admin can update/delete the sanction strength
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
<script src="<?php echo base_url();?>webroot/js/moment.2.29.1.min.js"></script>
<!--script src="<?php echo base_url();?>webroot/js/moment.js"></script-->

<!--script src="<?php //echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script-->
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.4.17.47.min.js"></script>
<!--script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script-->
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.datatables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
var sanctionStrength = {
	dataTable:null,
	battalions:null,
	rank_groups:null,
	datetimeFromToFilter:null,
	dateFrom:null,
	dateTo:null
};
$(document).ready(function(){
	jQuery(".select2").select2({width:"100%"});
	jQuery('#dateFrom').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});
	jQuery('#dateTo').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});
	/*$('#dateRange').daterangepicker(
		{
		timePicker: true,
		startDate: moment().startOf('hour'),
		endDate: moment().startOf('hour').add(32, 'hour'),
		locale: {
		  format: 'YYYY-MM-DD HH:mm:ss'
		}
	  }
	);*/
	//jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
	sanctionStrength.battalions = $('#battalions').val();
	sanctionStrength.rank_groups = $('#rank_groups').val();
	seDateTimeFilter();
	sanctionStrength.dateFrom = $('#dateFrom').val();
	sanctionStrength.dateTo = $('#dateTo').val();
	
	sanctionStrength.dataTable = $('#sanction_strength').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"bFilter":false,
		"ajax":{
			url:"<?php echo base_url() .'ca-sanction-strength-ajax';?>",
			type:"POST",
			"data":function(data){
				data.battalions = sanctionStrength.battalions,
				data.selected_ranks = sanctionStrength.rank_groups,
				data.datetimeFromToFilter = sanctionStrength.datetimeFromToFilter ,
				data.dateFrom = sanctionStrength.dateFrom,
				data.dateTo = sanctionStrength.dateTo	
			},
		},"columns": [
			{ "data": "sno"},
			{ "data": "battalion"},
			{ "data": "rank_group"},
			{ "data": "date"},
			{ "data": "strength"},
			{ "data": "edited_by"},
			{ "data": "action"},
		 ],
	});
	
});
function getSanctionStregth(){
	sanctionStrength.battalions = $('#battalions').val();
	sanctionStrength.rank_groups = $('#rank_groups').val();
	seDateTimeFilter();
	sanctionStrength.dateFrom = $('#dateFrom').val();
	sanctionStrength.dateTo = $('#dateTo').val();
	if(sanctionStrength.dataTable==null){
	}else{
		sanctionStrength.dataTable.draw();
	}
}
function seDateTimeFilter(){
	if($('#date_time_filter').attr('checked')=='checked'){
		$('#dateFrom').attr('disabled',false);
		$('#dateTo').attr('disabled',false);
		sanctionStrength.datetimeFromToFilter=true;
	}else{
		$('#dateFrom').attr('disabled',true);
		$('#dateTo').attr('disabled',true);
		sanctionStrength.datetimeFromToFilter=false;
	}
}
</script>

</body>
</html>