<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>KHC Weapon Management</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <style type="text/css">
     .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
#breadCrumb>ol>li>a{text-decoration:none;cursor:pointer;}
.error{color:red;}
   </style>
    
  </head>
<body>

<!-- Preloader -->
<!--div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div-->

<section>
<?php //$this->load->view('Ca/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Ca/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Weapon Management</h3>
		</div>
		<div class="contentpanel">
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
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
			
				<table style="width:100%;">
					<tbody>
						<tr>
							<td><h3>Add Weapon</h3></td>
							<td class="text-right"><a href="<?php echo base_url().'ca-khc-weapon-list';?>" class="btn btn-primary">Weapon list</a></td>
						</tr>
					</tbody>
				</table>
				<style>
					.span_space{
						width:200px;
						border:1px solid black;
					}
				</style>
			</div>
		<div class="panel-body">
			<div class="row">
				
				
				<?php 	/*Create HTML form*/
					$attributes = array(
					  //'name'        => 'basicForm4',
					  //'id'        => 'basicForm4',
					  'accept-char52set'  => 'utf-8',
					  'method' => 'post',
					  //'action'=>'Postings/list',
					);
					echo form_open_multipart("ca-khc-weapon-add", $attributes); 
					$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
				?>
				<div class="col-md-12">
					<label for="new_duty">Weapon Name</label>
					<?php
					$arm = [
						'name'      => 'arm',
						'id'        => 'arm',
						'class' => 'form-control',
						//'disabled'=>'true',
						'value' => set_value('arm'),
					];
					echo form_input($arm);
					echo form_error('arm');
					?>
					
				</div>
				<div class="col-md-12">
					<label for="weapon_main_category">Weapon Main Category</label>
					<?php //var_dump($weapon_main_categories); 
						echo form_dropdown('weapon_main_category', $categories, set_value('weapon_main_category'),'id="weapon_main_category" data-placeholder="Select Weapon main category" title="Please select Weapon main category)" class="select2" onChange="get_sub_categories()"');
						echo form_error('weapon_main_category');
					?>
				</div>
				<div class="col-md-12">
					<label for="weapon_main_category">Weapon Sub Category</label>
					<?php //var_dump($weapon_main_categories); 
						echo form_dropdown('weapon_sub_category', $subCategories, set_value('weapon_sub_category'),'id="weapon_sub_category" data-placeholder="Select Weapon Sub category" title="Please select Weapon Sub category)" class="select2"');
						echo form_error('weapon_sub_category');
					?>
				</div>
				<div class="col-md-12">
					<br>
					<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
				</div>
				<?php echo form_close(); ?>
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
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery(".select2").select2({width:"100%"});
});
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
</script>
<!-- Button trigger modal -->



</body>
</html>