<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Posting Management | history</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
   
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
<?php $this->load->view('Ca/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Ca/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Posting Management History of employee</h3>
		</div>
		<div class="contentpanel">
			
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>All Postings</h3></td>
						<td class="text-right"><a href="posting-add" class="btn btn-primary">History of employee(POSTING HISTORY)</a></td>
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
									<label for="belt_number">Posting </label><input type="text" id="posting_id"  class="form-control input-sm col-md-6" placeholder="Enter posting" ><br>
								</div>
								<div class="col-md-3">
									<label for="phone_no">Enter Employee name</label><input type="text" id="employee_id"  class="form-control input-sm col-md-6" placeholder="Enter Employee"><br>
								</div>
								<div class="col-md-3 text-left btn-sm"><br>
                                                                    <span class="fa fa-search">a</span>
									<button type="button" onClick="search()" class="btn btn-primary">Search</button>
								</div>
							</div>
				<div class="row" style="padding:20px;">
					<table class="table table-bordered table-striped" id="posting_data">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Posting Id</th>
								<th>Additional Posting id</th>
								<th>Employee id</th>
								<th>Order No</th>
								<th>order Date</th>
								<th>Posting Date</th>
								<th>Battalion id</th>
								<th>Created</th>
							</tr>
						</thead>
					</table>
				</div>
				<b>Note</b>: Select the <b><i>DEPLOYMENT REPORT</I></B> of which you want to see the <B><I>"REPORT VIEW"</B></I><br>
				Those Postings whose view is not set will be treated as "ONE_LINE"
				
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
<script src="<?php echo base_url();?>webroot/js/jquery.dataTables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
var dataTable = '';

//console.log(deployment_reports);
$(document).ready(function(){
	jQuery(".select2").select2({width:"100%"});
	jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
	$("#posting_name").keypress(function(event) { 
		if (event.keyCode === 13) { 
			search();
		} 
	});
	$("#parent_posting_name").keypress(function(event) { 
		if (event.keyCode === 13) { 
			search();
		} 
	});
});
function selectParentDuty(){
	
	$('#exampleModal').modal('toggle')
}

$(document).ready(function(){
	dataTable = $('#posting_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		bFilter: false,
		"ajax":{
			url:"<?php echo base_url().'ajax-posting-history-records';?>",
			type:"POST" ,
			"data":function(data){
				
				console.log(data);
				//$('#selectedEmployeesIds').val(selectedPolicePersonnel.toString());
				//data.selectedPolicePersonnelIds = $('#selectedEmployeesIds').val().toString();
				//data.ids = selectedPolicePersonnel.toString();
				//data.belt_no = $('#belt_number').val();
				//data.phone_no = $('#phone_no').val();
				data.posting_id = $('#posting_id').val();
				data.employee_id = $('#employee_id').val();
				//data.deployment_report_id = $('#deployment_report').val();
				//$('#deployment_report_name').html(deployment_reports[data.deployment_report_id]);
				//alert(data.selectedEmployeesIds);
			},
			/*success:function(ht){
				console.log(ht);
			}*/
		},
		"columns": [
                    //{ "data": "sno"},//,'name':'sno','searchable':'false','orderable':'false','title':'S.No.','column':'sno'},
                    { "data": "id"},
                    { "data": "posting_id"},
                    { "data": "additional_posting_id"},
                    { "data":"employee_id"},
                    { "data":"order_no"},
                    { "data":"order_date"},
                    { "data":"posting_date"},
                    { "data":"bat_id"},
                    { "data":"created"},
                    //{ "data":"action"},
                 ],
		 "columnDefs":[  
                {  
                     "targets":[0,6],  
                     "orderable":false,  
                },  
           ], 
	});
	
});
function search(){
	//alert('search');
	console.log('searching');
	//serachedEmployeeDataTable.draw(false);
	dataTable.draw();//.ajax.reload(null, false);
}
</script>

</body>
</html>