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
        <div class="panel-heading">
          <div class="row text-center links_">
		  <?php
			  $selectedPage = $subpage;
			  
			  if($selectedPage == 'all_figures.php'){
				$styleAllFigures = "background-color:red;color:white;";
			  }else{
				$styleAllFigures = "background-color:#9abfed;";
			  }
			  if($selectedPage == 'consolidate.php'){
				$styleConsolidate = "background-color:red;color:white;";
			  }else{
				$styleConsolidate = "background-color:#9abfed;";
			  }
			  if($selectedPage == 'store_equipments.php'){
				$styleStoreEquipment = "background-color:red;color:white;";
			  }else{
				  $styleStoreEquipment = "background-color:#9abfed;";
			  }
			  if($selectedPage == 'issued_holding_in_kot.php'){
				$styleIssuedHoldingInkot = "background-color:red;color:white;";
			  }else{
				  $styleIssuedHoldingInkot = "background-color:#9abfed;";
			  }
		  ?>
			<a class="btn" style="<?php echo $styleAllFigures; ?>" href="<?php echo base_url().'equipment-figures?page=ALL_FIGURES'?>"><b>All Figures of MSK</b></a>&nbsp;&nbsp;
			<a class="btn" style="<?php echo $styleStoreEquipment; ?>" href="<?php echo base_url().'equipment-figures?page=STORE_EQUIPMENTS'?>"><b>Figure View of PAP, IR, CDO BNs</b></a>&nbsp;&nbsp;
			<a class="btn" style="<?php echo $styleConsolidate; ?>" href="<?php echo base_url().'equipment-figures?page=CONSOLIDATE'?>"><b>Consolidate Figure of PAP, IR & CDO BNs</b></a>
			&nbsp;&nbsp;
			<a class="btn" style="<?php echo $styleIssuedHoldingInkot; ?>" href="<?php echo base_url().'equipment-figures?page=ISSUED_HOLDING_INKOT'?>"><b>Figure View of Holding, Issued, and Serviceable In store</b></a>
		  </div>
		</div>
		
  	 </div>
	  <script type="text/javascript">
		function show(abc){
			switch(abc){
				case 'FIGURE_VIEW_ALL':
				{
					$('#figure_view_all').attr('hidden',false);
					$('#figure_view_bn').attr('hidden',true);
					$('#figure_view_consolid').attr('hidden',true);
					break;
				}
				case 'FIGURE_VIEW_BNS':
				{
					$('#figure_view_all').attr('hidden',true);
					$('#figure_view_bn').attr('hidden',false);
					$('#figure_view_consolid').attr('hidden',true);
					break;
				}
				case 'FIGURE_VIEW_CONSOLID':
				{
					$('#figure_view_all').attr('hidden',true);
					$('#figure_view_bn').attr('hidden',true);
					$('#figure_view_consolid').attr('hidden',false);
					break;
				}
			}
		}
	  </script>
	   <?php
	 
		$this->load->view('Msk/subpages/'.$subpage);
	 ?>
	
    
	edasd
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
function getEquipmentNames(){
	var nameOfItemType = $('#category').val();
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
			$('#equipments').empty();
			$.each(data, function(key,value) {
			  var newOption = new Option(value, value, false, false);
			  $('#equipments').append(newOption).trigger('change');
			});
		}  
    });
}

</script>
</body>
</html>