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
<?php //echo validation_errors(); ?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view(F_CA.'/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view(F_CA.'/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Posting Management</h3>
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
							<td><h3>Edit Sanction Strength</h3></td>
							<td class="text-right"><a href="<?php echo base_url().'sanction-strength';?>" class="btn btn-primary">Sanction Strength list</a></td>
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
						  'name'        => 'basicForm4',
						  'id'        => 'basicForm4',
						  'accept-charset'  => 'utf-8',
						  'autocomplete'    =>'off', 
						  'method' => 'post',
						  'action'=>'Postings/adminSanctionStrengthEdit',
						 
						  );
						echo form_open_multipart("ca-sanction-strength-edit/".$sanction_strength_object->id, $attributes); 
						$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
					?>
					<div class="col-md-6">
						<label for="rank_group_id">Select Rank</label>
						<?php 
						echo form_dropdown('rank_group_id',$ranks,set_value('rank_group_id',$sanction_strength_object->rank_group_id),'id="rank_group_id" class="select2" disabled');
						echo form_error('rank_group_id');
						?>
							<br>
							<br>
							<?php
						echo form_label('Enter Strength','title');
						$strength = [
							'name'      => 'strength',
							'id'        => 'strength',
							'class' => 'form-control',
							//'disabled'=>'true',
							'value' => set_value('strength',$sanction_strength_object->strength),
						];
						echo form_input($strength);
						echo form_error('strength');
						?>
						<Br>
						<br>
						<input type="submit" class="btn btn-primary" name="submit"/>
					</div>
						<?php echo form_close(); ?>
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
<script src="<?php echo base_url();?>webroot/js/moment.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-timepicker.min.js"></script>
<!--script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.js"></script-->
<!--script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script-->
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.4.17.47.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	jQuery('#rank_group_id').select2({width:'100%'});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
});
</script>
<!-- Button trigger modal -->
<script type="text/javascript">
							
	function setTheBackButtonValue(parent_posting_id){
		//-------------------
		var data = {
			'parent_posting_id':parent_posting_id
		  }
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>get-previous-postings",
			data: data,
			cache: false,
			success: function(html){
				$('#postingBackButton').attr('onClick','getSubPostings('+html+'),pop_postings()');
			}  
		});
		//-------------------
	}
	
  </script>

<!-- Modal -->

</body>
</html>