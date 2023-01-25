<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Sanction Strength Management in Deployment</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-datetimepicker.min.css" />
   
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
<!--div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div-->

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Btalion/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Sanction Strength Management > List</h3>
		</div>
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>Sanction Strength List</h3></td>
						<td class="text-right"><a href="sanction-strength-add" class="btn btn-primary">Add Sanction Strength</a></td>
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
							echo form_label('Select Rank Group','rank_group_id');
							echo form_dropdown('rank_group_id[]',$rank_groups,set_value('rank_group_id'),'name="rank_group_id" class="select2" id="rank_group_id" multiple');
							echo form_error('rank_group_id');
						?>
					</div>
					
					<div class="col-md-3">
						
						<?php
							echo form_label('Enter Date time','datetimepicker1');
							$datetime = [
								'name'      => 'datetime',
								'id'        => 'datetimepicker1',
								'class' => 'form-control',
								'value' => set_value('datetime',date('Y-m-d H:i:s')),
							];
							echo form_input($datetime);
							echo form_error('datetime');
						?>
						<Br>
					</div>
					<div class="col-md-3">
						<br>
						<?php 
							$button = [
								//'name'=>'submit',
								'id'=>'submit',
								//'type'=>'submit',
								'class' =>'btn btn-primary',
								'value'=>'Add Rank',
								'onClick'=>'getSanctionStrength()'
							];
							echo form_submit('musubmit','Get Data','onClick="getSanctionStrength()" class="btn btn-primary"');
						?>
					</div>
				
					<div class="col-md-12">
						<table class="table table-bordered table-striped" id="sanction_strength" style="width:100%">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>Rank</th>
									<th>Date</th>
									<th>Strength</th>
									<th>Battalion</th>
									<th>Edited by</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div><!-- panel body-->
		</div><!-- panel -->
	</div>
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/moment.js"></script>
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
var sanction_data_table = null;
var sanction_data_history_table = {
	dataTable:null,
	dateFromToFilter:null,
	dateFrom:null,
	dateTo:null,
	rank_group_id:null,
	bat_id:null
};
	
$(document).ready(function(){
	//jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	//jQuery('#datetime').datetimepicker({dateFormat: "dd/mm/yy 23:59:59"});
	jQuery('#rank_group_id').select2({width: "100%"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
	$('#sanction_strength_history_table').css('width','100%');
	 $('#datetimepicker1').datetimepicker({format: 'yyyy-mm-dd HH:ii:ss'});
	 $('#datetimepickerFrom').datetimepicker({format: 'yyyy-mm-dd HH:ii:ss'});
	 $('#datetimepickerTo').datetimepicker({format: 'yyyy-mm-dd HH:ii:ss'});
	 
});
function showHistory(rank_group_id,rank){
	$("#rank").html(rank);
	sanction_data_history_table.rank_group_id = rank_group_id;
	if($('#getSanctionHistoryCheckBox').attr('checked')=='checked'){
		sanction_data_history_table.dateFromToFilter=true;
	}else{
		sanction_data_history_table.dateFromToFilter=false;
	}
	sanction_data_history_table.dateFrom = $('#datetimepickerFrom').val();
	sanction_data_history_table.dateTo = $('#datetimepickerTo').val();
	if(sanction_data_history_table.dataTable==null){
		sanction_data_history_table.dataTable = $('#sanction_strength_history_table').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"bFilter":true,
			"paging":true,
			"ajax":{
				url:"<?php echo base_url() .'ajax-sanction-strength-history-list';?>",
				type:"POST",
				"data":function(data1){
					data1.rank_group_id = sanction_data_history_table.rank_group_id,
					data1.dateFromToFilter = sanction_data_history_table.dateFromToFilter,
					data1.dateFrom = sanction_data_history_table.dateFrom,
					data1.dateTo = sanction_data_history_table.dateTo,
					data1.demo = sanction_data_history_table.showPageInfo
				},
			},"columns": [
				{ "data": "sno"},
				{ "data": "date"},
				{ "data": "strength"},
			 ],
		});
	}else{
		sanction_data_history_table.dataTable.draw();
		console.log(sanction_data_history_table.dataTable.page.info());
	}
	$('#exampleModal').modal('toggle')
}
sanction_data_history_table.showPageInfo = function(){
	if(sanction_data_history_table.dataTable==null){
		
	}else{
		console.log(sanction_data_history_table.dataTable.page.info());
	}
}
function showPageInfo(){
}
function getHistory(){
	//sanction_data_history_table.rank_group_id = rank_group_id;
	if($('#getSanctionHistoryCheckBox').attr('checked')=='checked'){
		sanction_data_history_table.dateFromToFilter=true;
	}else{
		sanction_data_history_table.dateFromToFilter=false;
	}
	//alert(sanction_data_history_table.dateFromToFilter);
	sanction_data_history_table.dateFrom = $('#datetimepickerFrom').val();
	sanction_data_history_table.dateTo = $('#datetimepickerTo').val();
	sanction_data_history_table.dataTable.draw();
}
$(document).ready(function(){
	//sanction_data_history_table.rank_group_id = $('#rank_group_id').val();
	
	if(true){
	sanction_data_table = $('#sanction_strength').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"paging":true,
		"bFilter":false,
		"ajax":{
			url:"<?php echo base_url() .'ajax-sanction-strength-list';?>",
			type:"POST",
			"data":function(data){
				data.ranks = $('#rank_group_id').val(),
				data.date = $('#datetimepicker1').val()
			},
		},"columns": [
			{ "data": "sno"},
			{ "data": "rank_group_id"},
			{ "data": "date"},
			{ "data": "strength"},
			{ "data": "bat_id"},
			{ "data": "edited_by"},
			{ "data": "action"}
		 ],
	});
	toggleDateFromTo($('#getSanctionHistoryCheckBox'))
	}
});
function getSanctionStrength(){
	sanction_data_table.draw();
}
function setDateFromTo(status){
	if(status=='enable'){
		$('#datetimepickerFrom').attr('disabled',false);
		$('#datetimepickerTo').attr('disabled',false);
	}else{
		$('#datetimepickerFrom').attr('disabled',true);
		$('#datetimepickerTo').attr('disabled',true);
	}
}
function toggleDateFromTo(e){
	console.log($(e).attr('checked'));
	if($(e).attr('checked')=='checked'){
		sanction_data_history_table.dateFromToFilter=true;
		$('#datetimepickerFrom').attr('disabled',false);
		$('#datetimepickerTo').attr('disabled',false);
	}else{
		sanction_data_history_table.dateFromToFilter=false;
		$('#datetimepickerFrom').attr('disabled',true);
		$('#datetimepickerTo').attr('disabled',true);
	}
}
</script>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:100%;">
    <div class="modal-content" style="margin:0px auto;width:1000px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">History of Sanction Strength of <span id="rank"></span> in <?php echo $this->session->userdata('nick'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 text-center">
					<?php
						echo form_checkbox(['name'=>"getSanctionDataBy",'onClick'=>"toggleDateFromTo(this)",'id'=>'getSanctionHistoryCheckBox'],'dateToFromCheck',false,'');
						echo form_label('  Apply Date From to Date To Filter','getSanctionHistoryCheckBox');
					?>
				</div>
				<div class="col-md-6 text-center">
					<?php
						//echo form_label('All History','fromRadio');
						//echo form_radio(['name'=>"getSanctionDataBy"]);
					?>
				</div>
			</div>
			<div class="col-md-3">
				<?php
							echo form_label('Enter Date From','datetimepickerFrom');
							$datetimeFrom = [
								'name'      => 'datetimeFrom',
								'id'        => 'datetimepickerFrom',
								'class' => 'form-control',
								'value' => set_value('datetimeFrom',date('Y-m-d H:i:s')),
							];
							echo form_input($datetimeFrom);
							echo form_error('datetimeFrom');
						?>
			</div>
			<div class="col-md-3">
				<?php
							echo form_label('Enter Date To','datetimepickerTo');
							$datetimeTo = [
								'name'      => 'datetimeTo',
								'id'        => 'datetimepickerTo',
								'class' => 'form-control',
								'value' => set_value('datetimeTo',date('Y-m-d H:i:s')),
							];
							echo form_input($datetimeTo);
							echo form_error('datetimeTo');
						?>
			<br>
			</div>
			<div class="col-md-3"><br>
				<?php
					echo form_button('submit','Get History',['class'=>'btn btn-primary','onClick'=>'getHistory()']);
					echo form_error('submit');
				?>
			<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered table-striped col-md-12" id="sanction_strength_history_table">
					<thead>
						<tr>
							<th>S. No.</th>
							<th>Date</th>
							<th>Strength</th>
						</tr>
					</thead>
					
				</table>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>