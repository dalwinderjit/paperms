<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Professional Course History</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-datepicker3.css" />   
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
			<h3> &nbsp;  &nbsp; Professional Course History</h3>
		</div>
		<div class="contentpanel">
			
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>Professional Course History</h3></td>
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
					<label class="control-label" for="battalions">Select Battalions</label>
				<?php
                                if($disable_battalion==true){
                                    $disable='disabled';
                                } else {
                                    $disable='';
                                }
					//apc - > add Professional Course
					echo form_dropdown('battalions', $battalions, set_value('battalions',($disable_battalion==true)?array_keys($battalions)[0]:''),'id="battalions" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" multiple '.$disable); 
				?>
				</div>
				<div class="col-md-3">
					<label class="control-label" for="apc_training_institute">Select Training Institute</label>
				<?php
					//apc - > add Professional Course
					echo form_dropdown('apc_training_institute', $apc_training_institutes, set_value('apc_training_institute'),'id="apc_training_institute" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" multiple'); 
				?>
				</div>
				<div class="col-md-3">
					<label class="control-label" for="apc_courses">Select Course</label>
				<?php
					//apc - > add Professional Course
					echo form_dropdown('apc_courses', $apc_courses, set_value('apc_courses'),'id="apc_courses" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" multiple'); 
				?>
				</div>
				
				<div class="col-md-3">
				<label class="control-label" for="order_no">Enter Course Order No.</label>
				<?php
					$order_no = array('type' => 'text','name' => 'order_no','id' => 'order_no','class' => 'form-control','placeholder' =>'Enter Course Order Number','value' => set_value('order_no'));
					echo form_input($order_no);
				?>
				</div>
				
			 </div>
                        <br>    
			<div class="row">
				<!--div class="col-md-3">
					<?php
					/*$data = array(
					        'disabled'=>true,
							'name'  => 'battalion',
							'id'    => 'battalion_name',
							'value' => '27.pap',
							'class' => 'form-control'
					);

					echo form_input($data);

					*/?>
				</div-->
                                <div class="col-md-3">
					<label for="apc_course_order_date">Select Course Order Date</label>
					<?php 
						$apc_course_order_date = array('type' => 'text','name' => 'apc_course_order_date','id' => 'apc_course_order_date','class' => 'form-control','placeholder' =>'Course Order Date','value' => set_value('apc_course_order_date'));
						echo form_input($apc_course_order_date);
					?>
				</div>
				<div class="col-md-3">
                                    <label for="employee_name">Enter Employee Name</label>
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
                                    <label for="regimental_no">Enter Regimental Nmuber</label>
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
                                    <label for="ranks">Select Rank</label>
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
                        <div class="row">
                            <div class="col-md-9"></div>
				<div class="col-md-3">
                                        
					<button onClick="search()" class="btn btn-primary">Search</button>
                                        <button onClick="downloadExcel()" class="btn btn-primary">Download</button><i class="fa fa-spinner fa-spin loading_icon" id="loading_icon"></i> <Br/>
                                        <?php 
                                        
                                        ?>
                                        <input type="checkbox" id="skipZero" checked /><label for="skipZero">Skip Records with no Courses</label>
				</div>
			</div>
				<div class="row" style="padding:20px;">
					<div class="col-md-12 table-responsive">
						<table class="table table-bordered table-striped" id="course_data_table">
							<thead>
								<tr>
									<th class="col-md-1">S. No.</th>
									<th class="col-md-1">Battalion</th>
									<th class="col-md-1">Rank</th>
									<th class="col-md-1">Name</th>
									<th class="col-md-1">Regimental Number</th>
									<th class="col-md-2">Training Institute name</th>
									<th class="col-md-2">Course Name</th>
									<th class="col-md-2">Course Order Number</th>
									<th class="col-md-2">Course Order Date</th>
									<th class="col-md-2">Course Start Date</th>
									<th class="col-md-2">Course End Date</th>
									<!--th class="col-md-2">Action</th-->
									
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
<!--script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script-->
<script src="<?php echo base_url();?>webroot/js/FileSaver.js"></script>
<script type="text/javascript">

var courseDataTable = null;
$(document).ready(function(){
    //hideLoadingIcon();
    jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
    jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
    /*jQuery('#to_time').datetimepicker({
    dateFormat: 'yy-mm-dd',
    timeFormat: 'HH:mm:ss'
    });*/
    jQuery("#ranks").select2({width:"100%"});
    jQuery("#apc_courses").select2({width:"100%"});
    jQuery("#apc_training_institute").select2({width:"100%"});
    jQuery("#battalions").select2({width:"100%"});
    jQuery('#apc_course_order_date').datepicker({dateFormat: "dd/mm/yy"});
 });



$(document).ready(function(){
    if(true){
	courseDataTable = $('#course_data_table').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"<?php echo base_url(); ?>course/ajax-get-professional-course-history-of-all-employees",
			type:"POST",
                        data:function(data){
                            data.battalions = $('#battalions').val();
                            data.training_institute_ids = $('#apc_training_institute').val();
                            data.employee_name = $('#employee_name').val();
                            data.course_ids = $('#apc_courses').val();
                            data.order_no = $('#order_no').val();
                            data.order_date = $('#apc_course_order_date').val();
                            data.employee_name= $('#employee_name').val();
                            data.regimental_no = $('#regimental_no').val();
                            data.ranks = $('#ranks').val();
                            data.skipZero = ($('#skipZero').attr('checked')=='checked')?true:false;
                        }
			/*"data":function(data){
                                data.battalions = $('#battalions');
				data.training_institute_ids = $('#apc_training_institute').val();
				data.course_ids = $('#apc_courses').val();
				data.order_no = $('#order_no').val();
				data.order_date = $('#apc_course_order_date').val();
				data.employee_name= $('#employee_name').val();
                                data.regimental_no = $('#regimental_no').val();
                                data.raks = $('#ranks').val();
			},*/
		},"columns": [
                    { "data": "sno"},
                    { "data": "battalion_name"},
                    { "data": "rank"},
                    { "data": "employee_name"},
                    { "data": "regimental_no"},
                    { "data": "institute_name"},
                    { "data": "course_name"},
                    { "data": "course_order_no"},
                    { "data": "course_order_date"},
                    { "data": "start_date"},
                    { "data": "end_date"},
                    //{ "data": "action"},
                 ],
               "columnDefs":[  
                {  
                     "targets":[0,2],  
                     "orderable":false,  
                },  
                {
                  "targets":[1,2],
                  "className":"text-right",
                },
                ], 
                scrollY: 350,
                scrollX: 1300
        ,"drawCallback":function(settings){
            hideLoadingIcon();
        }
	});
    }
});

function downloadExcel(){
    showLoadingIcon()
    //$('#loading_icon').addClass('fa-spin')
    $.ajax({
        type:'POST',
        url:"course/professional-course-history-download-excel",
        data:{
            battalions : $('#battalions').val(),
            training_institute_ids : $('#apc_training_institute').val(),
            employee_name : $('#employee_name').val(),
            course_ids : $('#apc_courses').val(),
            order_no : $('#order_no').val(),
            order_date : $('#apc_course_order_date').val(),
            employee_name : $('#employee_name').val(),
            regimental_no : $('#regimental_no').val(),
            ranks : $('#ranks').val(),
            skipZero : ($('#skipZero').attr('checked')=='checked')?true:false,
            downloadExcel : true
        },
        /*data:function(data){
            data.battalions = $('#battalions').val();
            data.training_institute_ids = $('#apc_training_institute').val();
            data.employee_name = $('#employee_name').val();
            data.course_ids = $('#apc_courses').val();
            data.order_no = $('#order_no').val();
            data.order_date = $('#apc_course_order_date').val();
            data.employee_name= $('#employee_name').val();
            data.regimental_no = $('#regimental_no').val();
            data.ranks = $('#ranks').val();
            data.skipZero = ($('#skipZero').attr('checked')=='checked')?true:false;
            data.downloadExcel = true;
        },*/
        dataType:'json'
    }).done(function(data){
        hideLoadingIcon();
        console.log(data);
        var $a = $("<a>");
        $a.attr("href",data.file);
        $("body").append($a);
        $a.attr("download","professional_course_history_download.xls");
        $a[0].click();
        $a.remove();
    });
}
function search(){
    showLoadingIcon();
    courseDataTable.draw();
}

</script>
<!-- Button trigger modal -->


</body>
</html>