<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Posting Management</title>
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
<?php $this->load->view('Btalion/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Btalion/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Posting Management History</h3>
		</div>
		<div class="contentpanel">
			
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>Deployment History IGP LOGIN</h3></td>
						<!--td class="text-right"><a href="posting-add" class="btn btn-primary">Add new Posting</a></td-->
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
/*newarea Textfield*/
echo form_dropdown('battalion', $battalions, set_value('battalion',1),'id="battalion" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" multiple'); 
echo form_error('battalion');
/*----End newarea Textfield----*/
 ?>
				</div>
				<div class="col-md-3">
					<?php
					$data = array(
							'name'  => 'employee_name',
							'id'    => 'employee_name',
							'class' => 'form-control',
							'placeholder'=>'Enter Employee Name'
					);
					echo form_input($data);
					?>
				</div>
				<div class="col-md-3">
					<?php
					$data = array(
					       'name'  => 'regimental_no',
							'id'    => 'regimental_no',
							'class' => 'form-control',
							'placeholder'=>'Enter Regimental Number'
					);
					echo form_input($data);
					?>
				</div>
				<div class="col-md-3">
					<?php
						$options = array(
							'INSP'=>'INSP',
							'SI' =>'SI',
							'ASI'=>'ASI',
							'HC' =>'HC',
							'CT' =>'CT'
						);
						if(null!=$this->input->post('ranks')){
							$selection = $this->input->post('ranks');
						}else{
							$selection = array();
						}
						echo form_dropdown('ranks',$options,$selection,'id="ranks" data-placeholder="Select Rank(s)" title="Select rank" class="select2" multiple');
					?>
				</div>
                            </div>
                        <br>
                        <Div class=row">
                            <Div class="col-md-9"></div>
				<div class="col-md-3">
					<button onClick="search()" class="btn btn-primary">Search</button>
					<button onClick="downloadExcel()" class="btn btn-primary">Download</button>
				</div>
			</div>
				<div class="row" style="padding:20px;">
					<div class="col-md-12">
						<table class="table table-bordered table-striped" id="user_data">
							<thead>
								<tr>
									<th class="col-md-1">S. No.</th>
									<th class="col-md-1">Battalion</th>
									<th class="col-md-1">Rank</th>
									<th class="col-md-2">Name</th>
									<th class="col-md-2">Regimental Number</th>
									<th></th>
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
<script src="<?php echo base_url();?>webroot/js/jquery.dataTables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/FileSaver.js"></script>
<script type="text/javascript">
var datatable = '';
$(document).ready(function(){
        jQuery(".select2").select2({width:"100%"}),
	jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
	jQuery("#ranks").select2({width:"100%"});
 });
function selectParentDuty(){
	
	$('#exampleModal').modal('toggle')
}

$(document).ready(function(){
	dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		bFilter: false,
		"ajax":{
			url:"<?php echo base_url().'ajax-employee-list';?>",
			type:"POST" ,
			data:function(data){
                                data.battalions = $('#battalion').val();
				data.employee_name = $('#employee_name').val();
				data.regimental_no = $('#regimental_no').val();
				data.ranks = $('#ranks').val();
			},
			/*success:function(ht){
				console.log(ht);
			}*/
		},
		 "columns": [
                    { "data": "sno"},//,'name':'sno','searchable':'false','orderable':'false','title':'S.No.','column':'sno'},
                    { "data": "battalion"},
                    { "data": "rank"},
                    { "data": "name"},
                    { "data": "regimental_no"},
                    { "data": "history"}
					
                 ],
		 "columnDefs":[  
                {  
                     "targets":[0,4],  
                     "orderable":false,  
                },  
           ], 
	});
	$("#employee_name").keypress(function(event) { 
		if (event.keyCode === 13) { 
			search();
		} 
	});
	$("#regimental_no").keypress(function(event) { 
		if (event.keyCode === 13) { 
			search();
		} 
	});
	$("#ranks").keypress(function(event) { 
		if (event.keyCode === 13) { 
			search();
		} 
	});
   
       
});			
/*function downloadExcel(){
	$.ajax({
        url: 'deployment-history-download-excel',
        method: 'POST',
		data:{},
        success: function (data) {
			var blob = new Blob([data],
				{ type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"});
            saveAs(blob, "static.xls");
		}
	});
}*/
function downloadExcel(){
	var employee_name = $('#employee_name').val();
	var regimental_no = $('#regimental_no').val();
	var ranks = $('#ranks').val();
	$.ajax({
    type:'POST',
    url:"deployment-history-download-excel",
    data:{
		'employee_name':employee_name,
		'regimental_no':regimental_no,
		'ranks':ranks,
	},
    dataType:'json'
}).done(function(data){
    var $a = $("<a>");
    $a.attr("href",data.file);
    $("body").append($a);
    $a.attr("download","file.xls");
    $a[0].click();
    $a.remove();
});
}

function search(){
	dataTable.draw();//.ajax.reload(null, false);
}
</script>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Posting from the list given below, under which you want to add the new posting.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="radio" id="parent_1" name="node"><label for="parent_1">Parent1</label><br>
					<input type="radio" id="parent_2" name="node"><label for="parent_2">Parent2</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_3" name="node"><label for="parent_3">Parent3</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_4" name="node"><label for="parent_4">Parent4</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_5" name="node"><label for="parent_5">Parent5</label><br>
					<input type="radio" id="parent_6" name="node"><label for="parent_6">Parent6</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_7" name="node"><label for="parent_7">Parent7</label><Br>
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