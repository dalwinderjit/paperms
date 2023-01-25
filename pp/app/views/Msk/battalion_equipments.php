<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MSK Module Equipments</title>
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
    <style type="text/css">
    .cur{
      cursor: pointer;
    }
	.links_ a{
		text-decoration:none;
		color:black;
	}
    </style>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h4> &nbsp; &nbsp; MSK Module (Equipments) <span class="pull-right"> <?php  echo 'Date:'.date('d-m-Y');?> &nbsp; &nbsp; <?php echo 'login:'. $this->session->userdata('username'); ?></span></h4>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
       <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>
	 <div class="panel panel-default">
      <div class="panel panel-default" id="figure_view_all">
        <div class="panel-heading">
          <div class="row">
                         <?php 
 /*Form Validation set*/
 //$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
      );
	echo form_open_multipart("equipment-figures", $attributes);
//var_dump($nameofitems);	
	?> <!--div class="col-md-4"> <?php
	//echo form_dropdown('battalionIds[]', $battalions, set_value('battalionIds',(isset($_POST['battalionIds'])) ? $_POST['battalionIds'] : ''),'id="ito" data-placeholder="Select Battalions" title="Please select battalion(s)" multiple class="select2"'); 
	//echo form_error('battalionIds');
	?></div--> <div class="col-md-3"> <?php
	echo form_dropdown('namOfItemType', $typeofitems, set_value('namOfItemType',(isset($_POST['namOfItemType'])) ? $_POST['namOfItemType'] : $typeOfItem),'id="nameOfItemType" data-placeholder="Select Category" title="Please select battalion(s)" class="select2"   onChange="getNameofItems()"'); 
	echo form_error('namOfItemType');
	?> </div><div class="col-md-4"> <?php
	echo form_dropdown('itemNames[]', $nameofitems, set_value('itemNames',(isset($_POST['itemNames'])) ? $_POST['itemNames'] : ''),'id="itemNames" data-placeholder="Select Items" title="Please select battalion(s)" multiple class="select2"'); 
	echo form_error('itemNames');
	?> </div> 
	<div class="col-md-5">
		<input type="submit" name="search" class="btn btn-primary"/>
		<a href="<?php echo base_url().'equipment-figures';?>"  class="btn btn-default">Reset</a>
		<input type="submit" name="download" class="btn btn-primary" value="Download Excel"/>
		<input type="submit" name="complete_download" class="btn btn-primary" value="Complete Download"/>
	</div>
	<div class="col-md-8">
</div>
	<div class="col-md-2"><BR>
		<input type="checkbox" name="skipZeroEquipments" id="skipZeroEquipments" <?php 
			if(null!=$this->input->post('search')){
				echo (null!=$this->input->post('skipZeroEquipments'))?'checked':'';
			}else{
				echo   ' checked="checked"';
			}?>>
			
			<label for="skipZeroEquipments">Skip zero value Equipment</label><BR>
		<!--input type="checkbox" name="skipZeroEquipments" id="skipZeroEquipments" <?php //echo (null!=$this->input->post('skipZeroEquipments'))?'checked':'';?>><label for="skipZeroEquipments">Skip zero value Category</label-->

	<?php echo form_close(); ?>
	</div>
	</div>
	
	<!--=================================================== STARTS Here ======================================================================-->	
		<div class="row">
		<div class="col-md-12 hidden">
			<h3><?php echo (isset($_POST['namOfItemType'])) ? $_POST['namOfItemType'] : $typeOfItem;?> Figures</h3>
		</div>
		<div class="col-md-1"> 		
		</div>
		<div class="col-md-10">
			<table class="table">
				<thead>
					<tr>
						<td class="text-center" colspan="9"><?php echo (isset($_POST['namOfItemType'])) ? $_POST['namOfItemType'] : $typeOfItem;?> Figures</td>
					</tr>
					<tr>
						<th>S. No.</th>
						<th>Equipments</th>
						<th>Sanction</th>
						<th>Holding</th>
						<th>Issued</th>
						<th>Total in store<br>(Serviceable/Unserviceable)</th>
						<th>Serviceable</th>
						<th>Unserviceable</th>
						<th>Available <br>Serviceable in store</th>
						<!--th>Auctioned(status D)</th-->
					</tr>
				</thead>
				<tbody>

			<?php
			$counter = 0;
			foreach($equipments as $eqid=>$battalions){
				$counter++;
?>	
				<tr>
					<td><?php echo $counter; ?></td>
					
					<td><?php echo $battalions['equipments_name'];?></td>
					<?php foreach($battalions as $k=>$status){ 
							
							
								if($k!='equipments_name'){

									?>
						
						<td><?php echo $battalions[$k]['sanction']; ?></td>
						<td><?php echo $battalions[$k]['holding']; ?></td>
						<td><?php echo $battalions[$k]['issued'] ;?></td>
						<td><?php echo $battalions[$k]['total_in_store']; ?></td>
						<td><?php echo $battalions[$k]['serviceable']; ?></td>
						<td><?php echo $battalions[$k]['unserviceable']; ?></td>
						<td><?php echo $battalions[$k]['serviceable_in_store']; ?></td>

					<?php break; 	}
					} ?>
					
				</tr>
				
<?php } ?>
<tr>
					<td>&nbsp;</td>
					<td>Grand Total</td>
					<td><?php echo $grand_total['sanction']; ?></td>
					<td><?php echo $grand_total['holding']; ?></td>
					<td><?php echo $grand_total['issued'] ;?></td>
					<td><?php echo $grand_total['total_in_store']; ?></td>
					<td><?php echo $grand_total['serviceable']; ?></td>
					<td><?php echo $grand_total['unserviceable']; ?></td>
					<td><?php echo $grand_total['serviceable_in_store']; ?></td>
				</tr>
			</tbody>
		</div>
		</div><!-- panel -->
      </div><!-- col-sm-12 -->
    
	</div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
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

<script src="<?php echo base_url(); ?>webroot/data/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/vfs_fonts.js"></script></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.colVis.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control"),

  jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#id').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#ircdi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#idi').datepicker({dateFormat: "dd/mm/yy"});
});


$(document).ready(function (){

});


//----------------------------------------------------------------------------------------------------------
function getNameofItems(){
	var nameOfItemType = $('#nameOfItemType').val();
	//alert('hello');
	//alert(nameOfItemType);
	var data = {
        'itemtype_name':nameOfItemType
      }
    
      $.ajax({
        type: "GET",
        url: "<?php echo base_url();?>get-item-names",
        data: data,
        cache: false,
        success: function(html){
			console.log(html);
			var data = JSON.parse(html);
			console.log(data);
			$('#itemNames').empty();
			$.each(data, function(key,value) {
			  var newOption = new Option(value, value, false, false);
			  $('#itemNames').append(newOption).trigger('change');
			});
		}  
    });
}
//----------------------------------------------------------------------------------------------------------


</script>
</body>
</html>