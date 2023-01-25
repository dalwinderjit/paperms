<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MT Vehicles</title>
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
      <h3>&nbsp; MT Vehicles Figures</h3>
    </div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row text-center links_">
				<div class="panel panel-default col-md-12">
		<div class="panel-heading">
			<div class="row">
			<?php
				$attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
      );
	echo form_open_multipart("mt-figure-view?page=ALL_FIGURES", $attributes);
//var_dump($nameofitems);	
	?>  <div class="col-md-4"> <?php
	
	
	echo form_dropdown('namOfVehicle[]', $vehicles, set_value('namOfVehicle',(isset($_POST['namOfVehicle'])) ? $_POST['namOfVehicle'] : ''),'id="namOfVehicle" data-placeholder="Select Vehicle" title="Please select Vehicle(s)" class="select2" multiple'); 
	echo form_error('namOfItemType');
	?> </div>
			
				<div class="col-md-3">
						
					<input type="hidden" value="yes" name="download_excel">
					<input type="hidden" value="all_figures" name="pageType">
					<a href="<?php echo base_url().'mt-figure-view?page=ALL_FIGURES';?>"  class="btn btn-default">Reset</a>
					<input type="submit" name="search" class="btn btn-primary"/>
					<input type="submit" name="download" class="btn btn-primary" value="Download Excel"/>
				
				</div>
				<div class="col-md-4">
					<input type="checkbox" name="skipZeroVehicles" id="skipZeroVehicles" <?php echo (null!=$this->input->post('skipZeroVehicles'))?'checked':'';?>><label for="skipZeroVehicles">if vehicle figure value is 0(zero), skip the vehicles</label>
				</div>
				<?php echo form_close(); ?>
			</div>
			
			<?php //var_dump($consolidatedMTData); ?>
			<div class="row">
				<div class="col-md-9">
					<table class="table table-striped table-hover col-md-6">
						<thead class="text-left">
							<tr>
							  <th>S.no</th>
							  <th class="text-left">Vehicles</th>
							  <th class="text-center">Total</th>
							  <th class="text-center">On Road</th>
							  <th class="text-center">Off Road</th>
							  <th class="text-center">On road case property in MT</th>
							  <th class="text-center">On Duty</th>
							  <th class="text-center">Available in MT-Section</th>
							  <!--th class="text-right">Emtpy On/Off Duty</th-->
							  <!--th>Total</th-->
						  </tr>
						</thead>
						<tbody>
						<?php $counter = 1; foreach($consolidatedMTData as $vehicleid=>$battalion){ 
							if(isset($battalion[$this->session->userdata('userid')])){
						?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td class="text-left"><?php echo $vehicles[$vehicleid]; ?> </td>
								
								<td class="text-center"><?php echo $battalion[$this->session->userdata('userid')]['holding_on_off_road']; ?></td>
								<td class="text-center"><?php echo $battalion[$this->session->userdata('userid')]['on_road']; ?></td>
								<td class="text-center"><?php echo $battalion[$this->session->userdata('userid')]['off_road']; ?></td>
								<td class="text-center"><?php echo $battalion[$this->session->userdata('userid')]['on_road_case_property_in_mt']; ?></td>
								<td class="text-center"><?php echo $battalion[$this->session->userdata('userid')]['on_duty']; ?></td>
								<td class="text-center"><?php echo $battalion[$this->session->userdata('userid')]['off_duty']; ?></td>
									
							</tr>
							<?php $counter++;} } ?>
						</tbody>
					</table>
			
			
		

		</div><!-- mainpanel -->
	</div>
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
function enable_disable_show_hide_vehicles(){
		//alert('hi');
		var status = $('#skipZeroBattalions').prop('checked');
		//alert(status);
		if(status==true){
			$('#skipZeroVehicle').removeAttr('disabled');
		}else{
			$('#skipZeroVehicle').attr('disabled',true);
		}
}
$(document).ready(function (){
	var status = $('#skipZeroBattalions').prop('checked');
		//alert(status);
		if(status==true){
			$('#skipZeroVehicle').removeAttr('disabled');
		}else{
			$('#skipZeroVehicle').attr('disabled',true);
		}
});

</script>
</body>
</html>