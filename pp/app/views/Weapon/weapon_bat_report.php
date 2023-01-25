<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Consolidate figures of Weapon (KHC Module)</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
    <style type="text/css">
        .simple_table{
         border:1px solid black;   
        }
        .simple_table tbody>tr>td, .simple_table thead>tr>th{border:1px solid black;height:30px !important;padding:4px;}
      .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
      #country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
      #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
      #country-list li:hover{background:#F0F0F0;}
      #search-box{padding: 10px;border: #F0F0F0 1px solid;}
	 .cur{
      cursor: pointer;
    }
	.links_ a{
		text-decoration:none;
		color:black;
	}
        @media print{
            
                 
            body>form>section>div.mainpanel>div.pageheader,body>form>section>div.mainpanel>div.contentpanel,body>form>section>div.mainpanel>div#filters,body>form>section>div.leftpanel{dislplay:none;}
            body>form>section>div.mainpanel>div.pageheader,body>form>section>div.mainpanel>div.contentpanel,body>form>section>div.mainpanel>div#filters{display:none;}
            body>form>section>div.leftpanel{width:0px;display:none;}
            body>form>section>div.mainpanel{margin-left:0px;}
            body>form>section>div.mainpanel>strong>div.pageheader,body>form>section>div.mainpanel>strong>div.contentpanel,body>form>section>div.mainpanel>strong>div#filters{display:none;}
            body>form>section>div.mainpanel>div.headerbar>div>h1,body>form>section>div.mainpanel>div.headerbar>div>h3{font-size:20px;}
            #print{visibility:visible;}
            #print h3{font-size:16px;}
        }
    </style>
  </head>
  <body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<?php
  
  //die;
?><form method="post" id="my_form">
	
<section>
  <?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
  <?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp;&nbsp;&nbsp; Consolidate figures of Weapon (KHC Module)</h3>
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
				
				
			</div>
		</div>
	</div>
	<div class="panel panel-default" id="filters">
	<div class="panel-heading">
		<div class="row">
                    
			<div class="col-md-4">
				<div class="form-group">
				 <?php  
					//$weapons = array('7PAP','27 pap');
/*newarea Textfield*/
 echo form_dropdown('weapons[]', $weapons, set_value('weapons'),'id="weapons" data-placeholder="Select Weapon(s)" title="Please select Weapon(s)" multiple class="select2"'); 
 echo form_error('weapons');
/*----End newarea Textfield----*/
 ?>
					<label for="weapons" class="error"></label>
				</div>
			</div>
			<?php if(false){ ?>
			<div class="col-md-2">
				<div class="form-group">
				 <?php  
					
				 
/*newarea Textfield*/
 echo form_dropdown('selected_type', $selected_types, set_value('selected_type',(isset($_GET['selected_type'])) ? $_GET['selected_type'] : ''),'id="selected_type" data-placeholder="Select Type" title="Please select Type"  class="select2"'); 
 echo form_error('selected_type');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			<?php } ?>
			<div class="col-md-5">
			<table><tr><td>
				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-default" name="submit">
					<input type="submit" class="btn btn-primary" value="Download" name="download">
                                        <button class="btn btn-primary" onClick="copyReport('print');return false;"> <i class="fa fa-copy"></i> Copy</button>
                                        <button class="btn btn-primary" onClick="window.print();return false;"> <i class="fa fa-print"></i> Print</button>
				</div>
				</td><td>
				<div class="form-group">
					
                                        &nbsp;&nbsp;&nbsp;<input type="checkbox" id="hideZeroWeapons" name="hideZeroWeapons" <?php if(null!=$this->input->post('submit')){if(null!=$this->input->post('hideZeroWeapons')){echo 'checked'; }}else{echo 'checked';}?>>
					<label for="hideZeroWeapons">Skip Zero Weapons </label>
				</div>
				</td></tr></table>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default" id="print">
	<div class="panel-heading">
            
		<div class="row">
                    
			<div class="col-md-12">
                            <h3 class="text-center"> &nbsp; &nbsp; STATEMENT OF ARMS <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> <?php $val = explode(' ', $this->session->userdata('nick2')); echo $val[0];  ?> ON <?php echo strtoupper(date('d-M-Y h:i:s a')); ?></h3>
				<div class="table-responsive">
					 <!--h4>Total Rows Found: 2725</h4-->
					 <table class="table  table-fixedheader" id="tableFigure">
						<thead>
						
                                                                                                                                                                                                        <tr><th>S.No.</th><th>Weapon</th><th>Sanction</th><th>Holding</th><th>Issued</th><!--th>Lost</th><th>Case Property in Kot</th><th>Case Property in PS</th><th>Condemn<br>Non-Serviceable</th><th>In Kot <br>(Available/Serviceable in Kot)</th--><!--th>Empty</th--><!--th>Remarks</th--><th>in kot</th><th>Remarks</th></tr></thead>
					<tbody> 
					 <?php $serial_no = 0	; 
					 
					 foreach($weapons_data as $weapon_name=>$battalion){ 
						//var_dump($battalion);
						//break;
						$serial_no++;?>
						<tr>
							<td><?php echo $serial_no; ?></td>
							<td><?php echo $weapon_name; ?></td>
							<td><?php echo $battalion['sanction']; ?></td>
							<td><?php echo $battalion['total']; ?></td>
							<td><?php echo $battalion['issued']; ?></td>
                                                        <?php if(false){ ?>
							<td><?php echo $battalion['lost']; ?></td>
							<td><?php echo $battalion['case_property_in_kot']; ?></td>
							<td><?php echo $battalion['case_property_in_ps']; ?></td>
							<td><?php echo $battalion['condemn']; ?></td>
							<td><?php echo $battalion['in_kot']; ?></td>
                                                        <?php } ?>
                                                        <td><?php echo ($battalion['total']-$battalion['issued']); ?></td>
                                                        <td><?php echo $battalion['remarks']; ?></td>
							<!--td><?php //echo $parameters['empty']; ?></td-->
							
						</tr>
					 <?php } //var_dump($grand_total); ?>
						<tr>
							<td>&nbsp;</td>
							<td>Grand Total</td>
							<td><?php echo $grand_total['sanction']; ?></td>
							<td><?php echo $grand_total['total']; ?></td>
							<td><?php echo $grand_total['issued']; ?></td>
                                                        <?php if(false){ ?>
							<td><?php echo $grand_total['lost']; ?></td>
							<td><?php echo $grand_total['case_property_in_kot']; ?></td>
							<td><?php echo $grand_total['case_property_in_ps']; ?></td>
							<td><?php echo $grand_total['condemn']; ?></td>
							<td><?php echo $grand_total['in_kot']; ?></td>
                                                        <?php } ?>
                                                        <td><?php echo ($grand_total['total']-$grand_total['issued']); ?></td>
                                                        <td></td>
							<!--td>Lorem Ipsum</td-->
						</tr>
					</tbody>
					</table>
					
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
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }), // Date Picker
  //jQuery('#datepicker1').datepicker({dateFormat: "dd/mm/yy"});
 
 


    

     $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

  $(document).on('click', '#showi', function() {
   $('#serviammu1').show();
   $('#part2').hide();
});

      $(document).click('#showi2', function() {
        $('#part2').show();
        $('#serviammu1').hide();
      });

    $(document).ready(function() {

    $("#towep").change(function(){
    var bodyno = $("#towep").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-checkarm",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#towbody").html(html);
    }  
      
    });

    });
     });


    
$(document).ready(function() {

    $("#isutodsi").change(function(){
      var bodyno = $("#isutodsi").val();
      var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>bt-issueholder-namelist",
        data: dataStrings,
        cache: false,
        success: function(html){
          $("#nameofisu").html(html);
        }  
      });
    });
    // gettting the bodyno's from db and inserting into kljsdfkljad
    $("#arms").change(function(){
      var bat_id = <?php echo $this->session->userdata('userid');?>;
      var arms = $('#arms').val();   // it is a array
      var exclude_body_numbers = $('#body_numbers').val();
      console.log('Excluded body numbers are : ');
      console.log(exclude_body_numbers);
      var data = {
        'arms':arms,
        'bat_id':bat_id,
        'exclude_body_numbers':exclude_body_numbers
      }
      
      //console.log(arms);
      //console.log(data);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>get-body-numbers",
        data: data,
        cache: false,
        success: function(html){
          
          var body_numbers_ = JSON.parse(html);
          console.log('BODY NUMBERS From server ARE:'+body_numbers_);
          $('#body_numbers').empty();
         /* for(var i in exclude_body_numbers ){
            addBodyNumbers(i,exclude_body_numbers[i])
          }*/
          for (var key in body_numbers_) {
            addBodyNumbers(key,body_numbers_[key]);

            //add these rows to table
            var row = $('tr');
            var table_cell = $('td');
            var data = key+' '+body_numbers_[key];
            cell = table_cell.append(data);
            row.append(cell);
            
          }
        }  
      });
    });

  });
  


});
function getBodyNumbers(){
 addBodyNumbers(1,'Dalwinder') 
}
function clearBodyNumbers(){   // only clear the unselected values
  var bodynos = $('#body_numbers').val();
  $('#body_numbers').empty();
  return bodynos;
}
function selectBodyNumbers(key,val){
  $('#body_numbers option[value="'+key+'"]').prop('selected',true);
  $('#body_numbers').trigger('change');
}
function addBodyNumbers(k,val){
  $('#body_numbers').append('<option value="'+k+'">'+val+'</option>');
}
function setPage2(page){
  $('#page_no').val(page);
  document.getElementById('my_form').submit();
}
function setPage(page){
	var per_page = 10;//<?php //echo $per_page; ?>;
	//alert(page.innerText);
  $('#page_no').val(page.innerText);
  document.getElementById('my_form').submit();
}
function copyReport(id) {
	var range = document.createRange();
	var width = $('#'+id).css('width');
	$('#'+id).css('width','500px');
        $('#'+id).children('div').children('div').children('div').children('div').children('table').addClass('simple_table');
        $('#'+id).children('div').children('div').children('div').children('div').children('table').removeClass('table table-fixedheader');
	range.selectNode(document.getElementById(id));
	window.getSelection().removeAllRanges(); // clear current selection
	window.getSelection().addRange(range); // to select text
	document.execCommand("copy");
	window.getSelection().removeAllRanges();// to deselect
	$('#'+id).css('width',width);
        $('#'+id).children('div').children('div').children('div').children('div').children('table').removeClass('simple_table');
        $('#'+id).children('div').children('div').children('div').children('div').children('table').addClass('table table-fixedheader');
        alert('Reprot Copied to Clipboard\nReady to Paste anywhere!');
}
</script>
</form>

    
<?php //var_dump($this->input->post()); ?>
</body>
</html>