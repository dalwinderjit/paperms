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
  <div class="mainpanel"  id="main_document">
<?php $this->load->view('Btalion/html/headbar'); ?>
	<div class="pageheader">
      <h3>&nbsp; MT Vehicles Figures <span class="pull-right"> <?php  echo 'Date:'.date('d-m-Y h:i:s A');?> &nbsp; &nbsp; <?php echo 'login:'. $this->session->userdata('username'); ?></span></h3>
    </div>
	
	<div class="panel panel-default links_">
		<div class="panel-heading">
		  <div class="row text-center links_">
			<!--<a class="btn" style="background-color:red;color:white;" href="/paperms/mt-figure-view?page=ALL_FIGURES"><b>All Figures of MT</b></a>&nbsp;&nbsp;
			<a class="btn" style="background-color:#9abfed;" href="/paperms/mt-figure-view?page=STORE_EQUIPMENTS"><b>Figure View of PAP, IR, CDO BNs</b></a>&nbsp;&nbsp;
			<a class="btn" style="background-color:#9abfed;" href="/paperms/mt-figure-view?page=CONSOLIDATE"><b>Consolidate Figure of PAP, IR &amp; CDO BNs</b></a>
		  -->
	
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
		
	?>
			<a class="btn" style="<?php echo $styleAllFigures; ?>" href="<?php echo base_url().'mt-figure-view?page=ALL_FIGURES'?>"><b>All Figures of MT</b></a>&nbsp;&nbsp;
			<a class="btn" style="<?php echo $styleStoreEquipment; ?>" href="<?php echo base_url().'mt-figure-view?page=STORE_EQUIPMENTS'?>"><b>Figure View of PAP, IR, CDO BNs</b></a>&nbsp;&nbsp;
			<a class="btn" style="<?php echo $styleConsolidate; ?>" href="<?php echo base_url().'mt-figure-view?page=CONSOLIDATE'?>"><b>Consolidate Figure of PAP, IR & CDO BNs</b></a>
			
			</div>
		</div>
	</div>
      <?php $this->load->view('MTVehicles/subpages/'.$subpage);?>
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
$(document).ready(function (){
    jQuery(document).bind("keyup keydown", function(e) {
        if (e.ctrlKey && e.keyCode == 80) {
           window.print();
           return false;
        }
     });
});<?php if(false){ ?>
   /* function copyReport(id) {
	var range = document.createRange();
	var width = $('#'+id).css('width');
	$('#'+id).css('width','500px');
        $('#'+id+'>h3').removeClass('text-center');
        $('#'+id+'>h3').addClass('text2');
        $('#table-data').addClass('simple_table');
        $('#table-data').removeClass('table table-bordered');
        $('#filters').css('display','none');
	range.selectNode(document.getElementById(id));
	window.getSelection().removeAllRanges(); // clear current selection
	window.getSelection().addRange(range); // to select text
	document.execCommand("copy");
	window.getSelection().removeAllRanges();// to deselect
        $('#filters').css('display','');
        $('#'+id+'>h3').addClass('text-center');
	$('#'+id).css('width',width);
        $('#table-data').removeClass('simple_table');
        $('#'+id+'>h3').removeClass('text2');
        $('#table-data').addClass('table table-bordered');
        alert('Reprot Copied to Clipboard\nReady to Paste anywhere!');
}*/
<?php } ?>
var oldPrintFunction = window.print;

window.print = function () {
    console.log('hi');
    var id="main_document";
    var width = $('#'+id).css('width');
    console.log(width);
    $('#'+id+'>.headerbar>.header-left>h1').removeClass('text-center');
    $('#'+id+'>.headerbar>.header-left>h1').addClass('text2');
    $('#'+id+'>.headerbar>.header-left>h3').removeClass('text-center');
    $('#'+id+'>.headerbar>.header-left>h3').addClass('text2');
    $('#all_tables>div>div>div>table').addClass('simple_table');
    $('#all_tables>div>div>div>table').removeClass('table');
    oldPrintFunction();
    $('#'+id+'>.headerbar>.header-left>h1').addClass('text-center');
    $('#'+id+'>.headerbar>.header-left>h1').removeClass('text2');
    $('#'+id+'>.headerbar>.header-left>h3').addClass('text-center');
    $('#'+id+'>.headerbar>.header-left>h3').removeClass('text2');
    $('#all_tables>div>div>div>table').removeClass('simple_table');
    $('#all_tables>div>div>div>table').addClass('table');
};
</script>
</body>
</html>