<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Posting Management | Deployment Statement</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
   <style type="text/css">
.frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
.modal-posting{width:100%;}
.modal-in-posting{width:90%;max-width:700px;}
.error{color:red;}
.breadCrumbPostings ol{background-color: #667C2F;-webkit-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
				box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);}
.breadCrumbPostings ol li a{color:white;text-decoration:none;}
.posting-list>ul>li{
				color:white;
				list-style-type:none;
				background-color: rgb(86,123,162);
				border-radius: 5px;
				margin: 3px;
				margin-right:20px;	
				-webkit-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
				box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
			}
			
			.posting-list>ul>li:hover{
				color:white;
				background-color: rgb(54,91, 133);
				cursor:pointer;
			}
			.posting-list>ul>li>label{
				color:white;
				margin-top:10px;
				cursor:pointer;
			}
			.posting-list>ul>li>input{
				margin-left:10px;
			}
			#exampleModalLabel2{
				padding:10px;
				background:rgb(218,32,22);
				height:40px; 
				border-radius:3px;
				color:white; 
				display: table-cell;
				vertical-align: middle; 
				text-align:center;
				margin:5px;
				-webkit-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
				box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
			}
			.total_row{/*color: #0e0e0e;*/color:blue;}
			.single_posting_total { color:#7d7b7b;color:black;}
			.total_row1{color:#525252;}
			.total_row3{color:#000000;;color:green;}
			.total_row2{color:#525252;color:red;}
			table>tbody>tr>td{border-left:1px solid #ddd;text-align:center;	}
			table>tbody>tr>td.posting_name{text-align:left;	}
			.showCursor{cursor:pointer;}
			.hoverRankFigure:hover{background-color:#e4edf5;font-size:20px;}
   </style>
  </head>
<body>
<?php //echo validation_errors(); 
	//var_dump($selectedPolicePersonnel);
?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php 	$this->load->view('Btalion/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Btalion/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Posting Management</h3>
		</div>
		<div class="contentpanel">
			<div class="row">
				<div class="col-md-12"> 
					<?php if($this->session->flashdata('success_msg')): ?>
					<div class="alert alert-success alert-dismissible" id="warning" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?> No. of employees posted are : <?php echo $no_of_records_inserted; ?> 
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
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3><?php echo $message; ?></h3>	
				<style>
					.span_space{
						width:200px;
						border:1px solid black;
					}
				</style>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php $attributes = array(
							  'name'        => 'basicForm4',
							  'id'        => 'basicForm4',
							  'accept-charset'  => 'utf-8',
							  'autocomplete'    =>'off', 
							  'method' => 'post',
							  //'action'=>'Postings/add_employee_posting',
						  );
					echo form_open_multipart("deployment-statement", $attributes); 
					?>
					<div class="col-md-2">
						<div class='input-group'>
							<input type='text' name="before_date" class="form-control col-md-2"  id='datetimepicker1' value="<?php if(null!=$before_date){echo $before_date;}?>" placeholder="Select Date dd/mm/yyyy"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
                                        <div class="col-md-2">
                                            <?php
						echo form_dropdown('deployment_type', $deployment_types, set_value('deployment_type'),'id="deployment_type" placeholder="Select Deployment Type" title="Select Deployment Type" class="select2" name="deployment_type"'); 
						echo form_error('deployment_type');
                                            ?>
					</div>
                                        <div class="col-md-3">
                                            <?php
						echo form_dropdown('deployment', $deployments, set_value('deployment'),'id="deployment" placeholder="Select Deployment(s)" title="Select Deployment" class="select2" name="deployment"'); 
						echo form_error('deployement');
                                            ?>
					</div>
					<!--div class="col-md-2">
					<?php
						echo form_dropdown('battalions[]', $battalions, set_value('battalions',(isset($_POST['battalions'])) ? $_POST['battalions'] : ''),'id="battalions" placeholder="Select Battalion(s)" title="Select Battalion" multiple class="select2" name="battalions"'); 
						echo form_error('battalions');
					?>
					</div-->	
                                    
					<div class="col-md-3">
						<!--input type="checkbox" name="skipZero" id="skipZero"><label for="skipZero">&nbsp;&nbsp;&nbsp;Skip Zero Records</label-->
						<?php 
                                                        $button_attr = array(
								'name'=>'downloadExcel',
								'class'=>'btn btn-primary',
							);
                                                        echo form_submit('downloadExcel','Download Excel',$button_attr);
							echo form_submit('submitForm', 'Submit', array('class'=>'btn btn-primary'));
							
							$checked = false;
							if(null!=$this->input->post('skipZero')){
								$checked = true;
							}
							$data = [
									'name'    => 'skipZero',
									'id'      => 'skipZero',
									'value'   => 'true',
									'checked' => $checked,
							];
							echo form_checkbox($data);
                                                        $attributes = array(
								//'class' => 'mycustomclass',
								//'style' => 'color: #000;',
								'id'    => 'id',
							);
                                                        echo form_label('Skip Zero Records', 'skipZero', $attributes);
                                                        $othersChecked = false;
							if(null!=$this->input->post('includeOthers')){
								$othersChecked = true;
							}
                                                        echo '<br>';
							$data = [
									'name'    => 'includeOthers',
									'id'      => 'includeOthers',
									'value'   => 'true',
									'checked' => $othersChecked,
							];
							//echo form_checkbox($data);
                                                        $attributes = array(
								//'class' => 'mycustomclass',
								//'style' => 'color: #000;',
								'id'    => 'id',
							);
                                                       // echo form_label('Include Others', 'includeOthers', $attributes);
							
							
							
							
						?>

						<?php echo form_close(); ?>
					</div>
				</div>
				<br>	
				<style>
					.table3>tbody>tr>td{text-align:left;}
				</style>
				<table class="table table-striped table3" style="border:1px solid #dddddd;">
					<thead>
						<tr>
							<th>S. No.</th>
							<th style="width:40%;">Duty Name</th>
                                                        <?php foreach($deployment->getPermanentRanks() as $k=>$val) {
                                                                echo '<th>'.$val.'s</th>';
                                                            }
                                                            if($deployment->getShowOtherRank()){
                                                                echo '<th>Other Ranks</th>';
                                                            }
                                                        ?>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
					<?php
						echo $html;
					?>
					</tbody>
				</table>
				<?php //var_dump($posting_tree); ?>
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
<!--script src="<?php //echo base_url();?>webroot/js/bootstrap-datetimepicker.js"></script-->
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<!-- for datatables -->
<script src="<?php echo base_url();?>webroot/js/jquery.dataTables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
var dataTable = '';
var inductionMode = {
	dataTable : null,
	rank : null,
	bat_ids:null,
	mode : null,
	date : null
};
var posting_id_ = '';
var rank_ = '';
jQuery('#datetimepicker1').datepicker({dateFormat: "dd/mm/yy"});
$(document).ready(function(){
	jQuery("select").select2({width:"100%"})
});
function showEmployeeDetail(){
	alert('hi');
}
function downloadEmployeesInSelectedPosting(){
	 $('#preloader').css('display','inline');
         deployment = $('#deployment').val();
	$.ajax({
    url:"<?php echo base_url(); ?>ajax-employee-deployment-list",
    method:"POST",
    data:{
		posting_id 	: posting_id_,
		rank 		: rank_,
                deployment      :deployment,
		search 		: $('#user_data_filter>label>input').val(),
		battalions  : $('#battalions').val(),
		before_date : $('#datetimepicker1').val(),
		download	: true
    },
    dataType:'json'
  }).done(function(data1){
	  console.log(data1);
    //$('#preloader').css('display','inline');
    //console.log('fetching');
    var $a = $("<a>");
    $a.attr("href",data1.file);
    $("body").append($a);
    $a.attr("download","osi_emp_list.xls");
    $a[0].click();
    $a.remove();
    $('#preloader').css('display','none');
  });
}
function showEmployees(posting_id,rank){
	posting_id_ = posting_id;
	rank_ = rank;
        deployment = $('#deployment').val();
	if(dataTable==''){	//data table plugin is not called yet
		dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		//bFilter: false,
		"ajax":{
			url:"<?php echo base_url().'ajax-employee-deployment-list';?>",
			type:"POST" ,
			data:function(data){
				data.posting_id = posting_id_;
				data.rank = rank_;
				data.search = data.search.value;
				data.battalions = $('#battalions').val();
				data.before_date = $('#datetimepicker1').val();
                                data.deployment = deployment;
				data.show = <?php echo ($this->input->get('show')!=null)?'true':'false'; ?>;
			},
			/*success:function(ht){
				alert('dal');
				console.log(ht);
			}*/
		},
		 "columns": [
                    { "data": "sno"},//,'name':'sno','searchable':'false','orderable':'false','title':'S.No.','column':'sno'},
                    { "data": "rank"},
                    { "data": "name"},
                    { "data": "regimental_no"},
                    {"data" :"contact_no"},
                    {"data" :"posting"},
                    {"data" :"order_no"},
                    {"data" :"order_date"},
                    {"data" :"posting_battalion"},
                    {"data" :"posting_date"},
                    
                    //{ "data": "history"}
					
                 ],
		 "columnDefs":[  
                {  
                     "targets":[0,1],  
                     "orderable":false,  
                },  
           ],
            "preDrawCallback": function( settings ) {
               //dataTable.destroy();
               //alert('hilko');
               if(dataTable!=''){
                    dataTable.context[0].jqXHR.abort();
                }
               //$('#posting__').html(settings.json.posting);
            },
            "drawCallback": function( settings ) {
               //dataTable.destroy();
               dataTable.context[0].jqXHR.abort();
               $('#posting__').html(settings.json.posting);
            },
             "initComplete": function(settings, json) {
                //alert( 'DataTables has finished its initialisation.' );
            }
		});
	}else{
            //alert('hi');
            //dataTable.context[0].jqXHR.abort();
            //console.log(dataTable.context);
            dataTable.draw();
	}
	$('#myModal').modal('show');
}
function downloadInductionModeEmployeesStrength(){
    $('#preloader').css('display','inline');
    $.ajax({
        url:"<?php echo base_url(); ?>ajax-induction-mode-strength-list",
        method:"POST",
        data:{
                    rank 		: inductionMode.rank,
                    mode 		: inductionMode.mode,
                    before_date : inductionMode.date,
                    battalions  : inductionMode.bat_ids,
                    search 		:{'value':$('#induction_mode_table_filter>label>input').val()},
                    download	: true
        },
        dataType:'json'
     }).done(function(data1){
	  console.log(data1);
    //$('#preloader').css('display','inline');
    //console.log('fetching');
    var $a = $("<a>");
    $a.attr("href",data1.file);
    $("body").append($a);
    $a.attr("download","osi_emp_list.xls");
    $a[0].click();
    $a.remove();
    $('#preloader').css('display','none');
  });
}
function showInductionModeEmployeesStrength(rank,mode,title){
	
	inductionMode.rank = rank;
	inductionMode.mode = mode;
	inductionMode.date = $('#datetimepicker1').val();
	inductionMode.bat_ids = $('#battalions').val();
	$('#inductionModeTitle').html(title);
	if(inductionMode.bat_ids==null){
		inductionMode.bat_ids='All';
	}
	if(inductionMode.dataTable==null){	//data table plugin is not called yet
		inductionMode.dataTable = $('#induction_mode_table').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		//bFilter: false,
		"ajax":{
			url:"<?php echo base_url().'ajax-induction-mode-strength-list';?>",
			type:"POST" ,
			data:function(data){
				data.rank = inductionMode.rank ;
				data.mode = inductionMode.mode;
				data.before_date = inductionMode.date;
				data.battalions = inductionMode.bat_ids;
			},
		},
		 "columns": [
                    { "data": "sno"}, 
                    { "data": "rank"},
                    { "data": "name"},
                    { "data": "regimental_no"},
                    {"data":"contact_no"},
                    {"data":"posting"},
                    {"data":"order_no"},
                    {"data":"order_date"},
                 ],
		 "columnDefs":[  
                {  
                     "targets":[0,1],  
                     "orderable":false,  
                },  
           ],
			"drawCallback": function( settings ) {
			   //$('#posting__').html(settings.json.posting);
			}		   
		});
	}else{
		inductionMode.dataTable.draw();
	}
	$('#inductionModeDialog').modal('show');
	//alert('Induction Mode employees '+rank+title);
}

</script>

<div class="modal model-xl" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document" style="width:1024px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail of Employees in (<span id="posting__">dd</span>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="user_data" class="table">
			<thead>
                            <tr><th>S. No.</th><th>Rank</th><th>Name</th><th>Regimental No.</th><th>Contact Number</th><th>Posting</th><th>Order Number</th><th>Order Date</th><th>Posted Battalion</th><th>Posting Date</th></tr>
			</thead>
			
		</table>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-primary" onClick="downloadEmployeesInSelectedPosting()">Download</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Induction mode strength -->
<div class="modal model-lg" tabindex="-1" role="dialog" id="inductionModeDialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail of Employees who are under mode : [<span id="inductionModeTitle"></span>]</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="induction_mode_table" class="table">
			<thead>
                            <tr><th>S. No.</th><th>Rank</th><th>Name</th><th>Regimental No.</th><th>Contact Number</th><th>Posting</th><th>Order Number</th><th>Order Date</th></tr>
			</thead>
			
		</table>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-primary" onClick="downloadInductionModeEmployeesStrength()">Download</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>