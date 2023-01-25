<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>(KHC)Weapon Management</title>
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
			<h3> &nbsp;  &nbsp; Weapon Management</h3>
		</div>
		<div class="contentpanel">
			
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tr>
						<td><h3>Weapons</h3></td>
						<td class="text-right"><a href="<?php echo base_url().'ca-khc-weapon-add';?>" class="btn btn-primary">Add new Weapon</a></td>
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
				<?php 
					$attributes = array(
						  'name'        => 'basicForm4',
						  'id'        => 'basicForm4',
						  'accept-charset'  => 'utf-8',
						  'autocomplete'    =>'off', 
						  'method' => 'post',
						 
						  );
					echo form_open_multipart("ca-khc-weapon-list", $attributes);?>
				<div class="col-md-3">
					<?php //var_dump($weapon_main_categories); 
						echo form_dropdown('weapon_main_category[]', $weapon_main_categories, set_value('weapon_main_category'),'id="weapon_main_category" data-placeholder="Select Weapon main category" title="Please select Weapon main category)" class="select2" multiple onChange="get_sub_categories()"');
					?>
				</div>
				<div class="col-md-3">
					<?php //var_dump($weapon_main_categories); 
						echo form_dropdown('weapon_main_category[]', [], set_value('weapon_main_category'),'id="weapon_sub_category" data-placeholder="Select Weapon main category" title="Please select Weapon main category)" class="select2" multiple');
					?>
				</div>
				 <div class="col-md-3"> <?php
					$weapon_name = array('type' => 'text','name' => 'weapon_name','id' => 'weapon_name','class' => 'form-control','placeholder' =>'Enter Weapon Name'/*,'required' => 'required'*/,'value' => set_value('weapon_name'));
					echo form_input($weapon_name);
					echo form_error('weapon_name');
					?></div>
				<div class="col-md-3">
					<input type="submit" name="submit" class="btn btn-primary"/>
				</div>
				<?php echo form_close(); ?>
			</div>
				<div class="row">
					
					<table class="table table-bordered table-striped" id="user_data">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Name</th>
								<th>Sub Category</th>
								<th>Main Category</th>
								<th>Action</th>
							</tr>
						</thead>
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

<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.datatables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery(".select2").select2({width:"100%"});
	jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
});
function selectParentDuty(){
	
	$('#exampleModal').modal('toggle')
}
function get_sub_categories(){
	var main_categories_ids = $('#weapon_main_category').val();
	$.ajax({
		method: "POST",
		url: '<?php echo base_url();?>'+'ca-khc-ajax-weapon-sub-categories-list',
		data: { weapon_category_ids: main_categories_ids }
	})
	.done(function( msg ) {
		
		var json_data = JSON.parse(msg);
		//console.log(json_data);
		$('#weapon_sub_category').empty();
		$.each(json_data.sub_categories,function(index,value){
			var newOption = new Option(value, index, false, false);
			$('#weapon_sub_category').append(newOption).trigger('change');
		});
		//var newOption = new Option(data.text, data.id, false, false);
		//$('#mySelect2').append(newOption).trigger('change');
	});
}
$(document).ready(function(){
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"<?php echo base_url() .'ca-khc-ajax-weapon-list';?>",
			type:"POST",
			"data":function(data){
				data.main_categories = $('#weapon_main_category').val(),
				data.sub_categories = $('#weapon_sub_category').val(),
				data.weapon_name = $('#weapon_name').val()
			},
		},"columns": [
                    { "data": "sno"},
					{ "data": "weapon_name"},
					{ "data": "sub_category"},
					{ "data": "main_category"},
                    { "data": "action"},
                 ],
	});
	
});
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