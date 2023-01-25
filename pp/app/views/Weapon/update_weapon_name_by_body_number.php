<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>(KHC) Update Weapon Name</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
    <style type="text/css">
      .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
      #country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
      #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
      #country-list li:hover{background:#F0F0F0;}
      #search-box{padding: 10px;border: #F0F0F0 1px solid;}
	  .error{color:red;}
    </style>
  </head>
  <body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<?php
  
  //die;
?>
<section>
  <?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
  <?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> Update Weapon Names.</h3>
    </div>
    <div class="contentpanel panel panel-default">
      
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
          <div class="row">
			<div class="col-md-6">
				<h3>FROM</h3>
			<?php 
			$attributes = array(
				  'name'        => 'basicForm4',
				  'id'        => 'basicForm4',
				  'accept-charset'  => 'utf-8',
				  'autocomplete'    =>'off', 
				  'method' => 'post',
				 
				  );
			echo form_open_multipart("bt-khc-update-weapons", $attributes);
			$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
			?>
			
			 <div class="col-md-12">
				<br>
					<label for="weapon_id_from">Select Main Category.</label>
				<?php 
					echo form_dropdown('main_category_id', $main_categories, $selected_main_category_id,'id="main_category_id" data-placeholder="Select Main Category" title="Please select Weapon\'s Main Category" class="select2" onChange="getSubCategories()"');
					echo form_error('main_category_id');
				?>
			</div>
			 <div class="col-md-12">
				<br>
					<label for="weapon_id_from">Select Sub Category.</label>
				<?php 
					echo form_dropdown('sub_category_id', $sub_categories, $selected_sub_category_id,'id="sub_category_id" data-placeholder="Select Main Category" title="Please select Weapon\'s Main Category" class="select2" onChange="getWeaponsNames()"');
					echo form_error('sub_category_id');
				?>
			</div>
			 <div class="col-md-12">
				<br>
					<label for="weapon_id_from">Select Weapon Category</label>
				<?php 
					echo form_dropdown('weapon_id_from', $weapons, $selected_weapon_id,'id="weapon_id_from" data-placeholder="Select Weapon" title="Please select Weapon name to which your want to move" class="select2" onChange="getBodyNumbers()"');
					echo form_error('weapon_id_from');
				?>
			</div>
			<div class="col-md-12">
				<br>
					<label for="weapon_id_to">Select Body numbers.</label>
				<?php 
					echo form_dropdown('body_numbers[]', $weapon_body_numbers, set_value('body_numbers'),'id="body_numbers" data-placeholder="Select Weapon" title="Please select Body numbers" class="select2" multiple="multiple"');
					echo form_error('body_numbers[]');
				?>
				<br>	
			</div>
			<br>
			</div>
           <div class="col-md-6">
			<h3>To</h3>
			<div class="col-md-12">
				<br>
					<label for="weapon_id_from">Select Main Category.</label>
				<?php 
					echo form_dropdown('main_category_id_to', $main_categories, $selected_main_category_id,'id="main_category_id_to" data-placeholder="Select Main Category" title="Please select Weapon\'s Main Category" class="select2" onChange="getSubCategoriesTo()"');
					echo form_error('main_category_id_to');
				?>
			</div>
			 <div class="col-md-12">
				<br>
					<label for="weapon_id_from">Select Sub Category.</label>
				<?php 
					echo form_dropdown('sub_category_id_to', $sub_categories, $selected_sub_category_id,'id="sub_category_id_to" data-placeholder="Select Main Category" title="Please select Weapon\'s Main Category" class="select2" onChange="getWeaponsNamesTo();"');
					echo form_error('sub_category_id_to');
				?>
			</div>
            <div class="col-md-12">
				<br>
					<label for="weapon_id_to">Select Weapon into which you want to move the selected Weapon body numbers.</label>
				<?php 
					echo form_dropdown('weapon_id_to', $weapons, set_value('weapon_id_to'),'id="weapon_id_to" data-placeholder="Select Weapon" title="Please select Weapon name to which your want to move the selected weapons" class="select2"');
					echo form_error('weapon_id_to');
				?>
			</div>
			</div>
			<div class="col-md-12">
				<br>
				<input type="submit" name="submit" class="btn btn-primary"/>
			</div>
			<?php echo form_close(); ?>
			</div>
      </div>
	  </div>
	  
      <?php
      //var_dump($detail); 
      ?>

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
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"});
	// Date Picker
  //jQuery('#datepicker1').datepicker({dateFormat: "dd/mm/yy"});
  //jQuery('#datepickeri').datepicker({dateFormat: "dd/mm/yy"});
  //jQuery('#odate').datepicker({dateFormat: "dd/mm/yy"});
});
function getSubCategories(){
	var selected_main_category_id = $('#main_category_id').val();
	var array_main_cat = [selected_main_category_id];
	//alert(array_main_cat);
	$.ajax({
		method: "POST",
		url: '<?php echo base_url();?>'+'ca-khc-weapon-sub-category-list-ajax2',
		data: { main_category: array_main_cat }
	})
	.done(function( msg ) {
		//alert(msg);
		var json_data = JSON.parse(msg);
		
		//console.log(msg);
		$('#sub_category_id').empty();
		$.each(json_data.sub_categories,function(index,value){
			var newOption = new Option(value, index, false, false);
			$('#sub_category_id').append(newOption);
		});
		$('#sub_category_id').trigger('change');
	});
}

function getSubCategoriesTo(){
	var selected_main_category_id = $('#main_category_id_to').val();
	var array_main_cat = [selected_main_category_id];
	//alert(array_main_cat);
	$.ajax({
		method: "POST",
		url: '<?php echo base_url();?>'+'ca-khc-weapon-sub-category-list-ajax2',
		data: { main_category: array_main_cat }
	})
	.done(function( msg ) {
		//alert(msg);
		var json_data = JSON.parse(msg);
		
		//console.log(msg);
		$('#sub_category_id_to').empty();
		$.each(json_data.sub_categories,function(index,value){
			var newOption = new Option(value, index, false, false);
			$('#sub_category_id_to').append(newOption);
		});
		$('#sub_category_id_to').trigger('change');
	});
}

function getWeaponsNames(){
	var selected_sub_category_id = $('#sub_category_id').val();
	//var array_main_cat = [selected_main_category_id];
	//alert(array_main_cat);
	$.ajax({
		method: "POST",
		url: '<?php echo base_url();?>'+'ca-khc-weapon-under-sub-category-list-ajax',
		data: { selected_sub_category_id: selected_sub_category_id }
	})
	.done(function( msg ) {
		//alert(msg);
		//alert(msg);
		var json_data = JSON.parse(msg);
		
		//console.log(msg);
		$('#weapon_id_from').empty();
		$.each(json_data.weapons,function(index,value){
			var newOption = new Option(value, index, false, false);
			$('#weapon_id_from').append(newOption);
		});
		$('#weapon_id_from').trigger('change');
	});
}
function getWeaponsNamesTo(){
	var selected_sub_category_id = $('#sub_category_id_to').val();
	//var array_main_cat = [selected_main_category_id];
	//alert(array_main_cat);
	$.ajax({
		method: "POST",
		url: '<?php echo base_url();?>'+'ca-khc-weapon-under-sub-category-list-ajax',
		data: { selected_sub_category_id: selected_sub_category_id }
	})
	.done(function( msg ) {
		//alert(msg);
		//alert(msg);
		var json_data = JSON.parse(msg);
		
		//console.log(msg);
		$('#weapon_id_to').empty();
		$.each(json_data.weapons,function(index,value){
			var newOption = new Option(value, index, false, false);
			$('#weapon_id_to').append(newOption);
		});
		$('#weapon_id_to').trigger('change');
	});
}
function getBodyNumbers(){
	var selected_weapon_id = $('#weapon_id_from').val();
	$.ajax({
		method: "POST",
		url: '<?php echo base_url();?>'+'ca-khc-ajax-get-weapon-body-numbers',
		data: { selected_weapon_id: selected_weapon_id }
	})
	.done(function( msg ) {
		var json_data = JSON.parse(msg);
		//console.log(msg);
		$('#body_numbers').empty();
		$.each(json_data.weapon_body_numbers,function(index,value){
			var newOption = new Option(value, index, false, false);
			$('#body_numbers').append(newOption).trigger('change');
		});
	});
}
</script>
</body>
</html>