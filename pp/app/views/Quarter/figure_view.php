<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Quarter Module</title>
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
    <style>
    .simple_table{
            width:100%;
        }
        .simple_table>tbody>tr>td,.simple_table>thead>tr>th{border:1px solid black;}
        .simple_table>tbody>tr>td:nth-child(n+3):nth-child(-n+9){text-align:center;}
        .text2{
            font-size:20px;
            text-align:center;
            font-weight:bold;
            color:black;
        }
       
    @media print {
        #main_document{margin-top:-20px;}
       #figure_view_all{margin-bottom:0px;}
        #figure_view_all>div.panel-heading{padding:0px;}
        #all_tables>div.col-md-1{display:none;}
        #all_tables>div.col-md-10{width:100%;}
        #all_tables>div>table>tbody>tr:last-child{background-color:'white';}
        #all_tables>div>table>tbody>tr>td:last-child{border-right:1px solid black !important;}
        #all_tables>div>table>thead>tr:nth-child(1)>th:last-child{border-right:1px solid black !important;}
        #all_tables>div>table{margin-bottom:0px;}
        .headerbar{border-left:0px;}
        .header-left { padding:0px;}
        .pageheader{border-top:0px;border-bottom:0px;}
        .pageheader>h4{margin:0px;}
        .leftpanel{display:none;}
        .links_{display:none;}
        .filters_{display:none;}
        .mainpanel{margin-left:0px;}
        #filters{display:none;}
        .printarea>div{margin-left:0px;}
        #main-content{width:600px;}
	#main_document{width:800px;}
        #main_document>.headerbar>.header-left{float:none;}
        .leftpanel,.links_,.filters_{display:none;}
        .contentpanel{padding:0px;}
    }
    </style>
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
  <div class="mainpanel" id="main_document">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h4> &nbsp; &nbsp; Quarter Module (Quarters) <span class="pull-right"> <?php  echo 'Date:'.date('d-m-Y h:i:s A');?> &nbsp; &nbsp; <?php echo 'login:'. $this->session->userdata('username'); ?></span></h4>
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
          <div class="row filters_">
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
	echo form_open_multipart("quarters", $attributes);
//var_dump($nameofitems);	
	?> <!--div class="col-md-4"> <?php
	//echo form_dropdown('battalionIds[]', $battalions, set_value('battalionIds',(isset($_POST['battalionIds'])) ? $_POST['battalionIds'] : ''),'id="ito" data-placeholder="Select Battalions" title="Please select battalion(s)" multiple class="select2"'); 
	//echo form_error('battalionIds');
	?></div--> 
	<div class="col-md-1">
	</div>
	<div class="col-md-3"> <?php
		echo form_dropdown('quarter_type[]', $type_of_quarter, set_value('quarter_type',(isset($_POST['quarter_type'])) ? $_POST['quarter_type'] : ''),'id="nameOfItemType" data-placeholder="Select Quarter Type" title="Please select Quarter type)" class="select2" multiple');
		echo form_error('quarter_type');
		?> </div><div class="col-md-3"> <?php
		echo form_dropdown('battalion[]', $battalions, set_value('battalion',(isset($_POST['battalion'])) ? $_POST['battalion'] : ''),'id="battalion" data-placeholder="Select Battalion" title="Please select battalion(s)" class="select2" multiple'); 
		echo form_error('battalion');
		?> </div><?php
		//echo form_dropdown('conditions[]', $conditions, set_value('conditions',(isset($_POST['conditions'])) ? $_POST['conditions'] : ''),'id="conditions" data-placeholder="Select Condition" title="Please select condition(s)" multiple class="select2"'); 
		//echo form_error('itemNames');
	?> 
	<div class="col-md-4 text-right">
		<input type="submit" name="search" class="btn btn-primary"/>
		<a href="<?php echo base_url().'quarters';?>"  class="btn btn-default">Reset</a>
                <button type="button" class="btn btn-primary" onClick="window.print();return false;">Print <i class="fa fa-print"></i></button>
		
		<input type="submit" name="downloadQuarterDetail" class="btn btn-primary" value="Download Excel"/>
		
	</div>
	<div class="col-md-9">
</div>
	<div class="col-md-2"><input type="checkbox" name="skipZeroQuarters" id="skipZeroQuarters" <?php echo ($skipZeroQuarters)?'checked':'';?>><label for="skipZeroQuarters">Skip zero value Battalions</label><BR>
		

	<?php echo form_close(); ?>
	</div>
	</div>
	
	<!--		===================================================STARTS Here======================================================================-->	
		<div class="row" id="all_tables">
		<div class="col-md-12 hidden">
			<h3><?php echo (isset($_POST['namOfItemType'])) ? $_POST['namOfItemType'] : '';?> Figures</h3>
		</div>
		<div class="col-md-1"> 		
		</div>
		<div class="col-md-10">
		<?php foreach($quarter_figures as $k=>$quarter){ ?>
                        <h3 class="text-center" colspan="9"><?php echo $k; ?></h3>
				<table class="table" style="border:1px solid #eeeeee;">
				<thead>
					
					<tr>
						<th>S. No.</th>
						<th>Battalion</th>
						<th>Total</th>
						<th>Alloted</th>
						<th style="border-right:1px solid #eeeeee;">Vacant</th>
					</tr>
				</thead>
				<tbody>
				<?php $counter = 1 ;foreach($quarter as $key=>$parameters){ 
						//var_dump($parameters);
						//foreach($battalions as $key2=>$battalion){ 
						?>
					<tr>
						<td><?php echo $counter; ?></td>
						<td><?php echo $battalions[$key]; ?></td>
						<td><?php echo $parameters['total']; ?></td>
						<td><?php echo $parameters['alloted']; ?></td>
						<td style="border-right:1px solid #eeeeee;"><?php echo $parameters['vacant']; ?></td>
					</tr>
				<?php	//}
					$counter++;
					}
				?>
					<tr>
						<td>&nbsp;</td>
						<td>Grand Total</td>
						<td><?php echo $grand_total[$k]['total']; ?></td>
						<td><?php echo $grand_total[$k]['alloted']; ?></td>
						<td style="border-right:1px solid #eeeeee;"><?php echo $grand_total[$k]['vacant']; ?></td>
					</tr>
				</tbody>
			</table>
		<?php } ?>
		
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
    $('#all_tables>div>table').addClass('simple_table');
    $('#all_tables>div>table').removeClass('table');
    oldPrintFunction();
    $('#'+id+'>.headerbar>.header-left>h1').addClass('text-center');
    $('#'+id+'>.headerbar>.header-left>h1').removeClass('text2');
    $('#'+id+'>.headerbar>.header-left>h3').addClass('text-center');
    $('#'+id+'>.headerbar>.header-left>h3').removeClass('text2');
    $('#all_tables>div>table').removeClass('simple_table');
    $('#all_tables>div>table').addClass('table');
};
</script>
</body>
</html>