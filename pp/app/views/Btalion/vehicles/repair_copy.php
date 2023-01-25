<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Repair</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
  </head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php //$this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3>&nbsp; &nbsp; Add Repair</h3>
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
	  </div>
	  <div class="col-md-12">
<?php 
 /*Form Validation set*/
 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
	  'method'=>'post'
      );
 echo form_open_multipart("", $attributes);
?>
          <div class="panel panel-default">
              <div class="panel-body">

              <div class="form-group">
                  <label class="col-sm-3 control-label">Registration Number</label>
                  <div class="col-sm-9">
                        <?php  
                            $rnum = array();
                            $rnum[''] = '--Select--';
                                             foreach ($vichel as $value) {
                                               $rnum[$value->mt_id] = $value->regnom;
                                             }
                            /*newarea Textfield*/
                             echo form_dropdown('rnum', $rnum, set_value('rnum',''),'id="rnum" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             echo form_error('rnum');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Month </label>
                  <div class="col-sm-9">
                        <?php  
                            $rnum = array('' => '--Select--','Current' => 'Select Month');
                                            
                            /*newarea Textfield*/
                             echo form_dropdown('cmonth', $rnum, set_value('cmonth',''),'id="cmonth" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             echo form_error('cmonth');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="d1" style="display: none;">
                  <label class="col-sm-3 control-label">Date of repair</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'dorepair','id' => 'lid','class' => 'form-control','value' => '');
echo form_input($rn);
echo form_error('dorepair');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="d2" style="display: none;">
                  <label class="col-sm-3 control-label">Repair details </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'rdetails','id' => 'Chasis','class' => 'form-control','value' => '');
echo form_input($Chasis);
echo form_error('rdetails');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 


                  <div class="form-group" id="d3" style="display: none;">
                  <label class="col-sm-3 control-label">Repairing Unit</label>
                  <div class="col-sm-9">
                        <?php  
                            $rnum = array('' => '--Select--','PAP Central Workshop' => 'PAP Central Workshop','Private Firm' => 'Private Firm','Other' => 'Other');
                                            
                            /*newarea Textfield*/
                             echo form_dropdown('runit', $rnum, set_value('runit',''),'id="repunit" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             echo form_error('runit');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div>



                   <div class="form-group" id="firm1" style="display: none;">
                  <label class="col-sm-3 control-label">Name of Firm</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'nofirm','id' => 'rn','class' => 'form-control','value' => '');
echo form_input($rn);
echo form_error('nofirm');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="firm2" style="display: none;">
                  <label class="col-sm-3 control-label" id="con11">Contact No</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'nofcon','id' => 'contactno','class' => 'form-control','value' => '');
echo form_input($rn);
echo form_error('nofcon');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="pap" style="display: none;">
                  <label class="col-sm-3 control-label">Parts Amount (if any)</label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'pamo','id' => 'Chasis','class' => 'form-control','value' => '');
echo form_input($Chasis);
echo form_error('pamo');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 


                 <div class="form-group" id="firm5" style="display: none;">
                  <label class="col-sm-3 control-label">Total Amount </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'ramu','id' => 'Chasis','class' => 'form-control','value' => '');
echo form_input($Chasis);
echo form_error('ramu');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="firm3" style="display: none;">
                  <label class="col-sm-3 control-label">Treasury Token No.</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'ttno','id' => 'rn','class' => 'form-control','value' => '');
echo form_input($rn);
echo form_error('ttno');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>



                <div class="form-group" id="firm4" style="display: none;">
                  <label class="col-sm-3 control-label">Token Date</label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'tdate','id' => 'tkdate','class' => 'form-control');
echo form_input($Chasis);
echo form_error('tdate');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>


                  


              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
					<input type="hidden" name="sub" value="sub"/>
                    <input type="submit" name="btnSubmit"  class="btn btn-primary" onClick="this.disabled=true;this.value='Adding, please wait...';console.log(form);form.submit();"/>
                    <a href="" class="btn btn-default">Reset</a>
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
      <?php echo form_close(); ?>
         </div><!-- col-md-12 -->
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
<script type="text/javascript">
$(document).ready(function(){
	var form = $('#basicForm4');
	console.log(form);
});

	var page_submission = false;
	function submit_form(button){
		console.log(button);
		if(page_submission==false){
			//alert('hi');
			button.form.submit();
			button.disabled=true;
		}
		page_submission=true;
	}
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
   jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }), 
  jQuery('#lid').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#tkdate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#adate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#conditiondate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rcdt').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
  
    $(document).ready(function() {

    $("#bdn").change(function(){
    var bdn = $("#bdn").val();
    var dataStrings = 'bdn='+ bdn;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-holder-name",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#hn").html(html);
    }  
      
    });

    });
     });
        $(document).on('change', '#vc', function() {
  if(this.value == 'On Road'){
     $('#onroad').show();
     $('#offroad').hide();
     $('#conauth').hide();
     $('#condate').hide();
     $('#aonauth').hide();
     $('#aondate').hide();
   }else if(this.value == 'Off Road'){
     $('#offroad').show();
     $('#onroad').hide();
   }
 });

           $(document).on('change', '#suw', function() {
  if(this.value == 'condemn'){
     $('#conauth').show();
     $('#condate').show();
      $('#aonauth').hide();
     $('#aondate').hide();
   }else{
     $('#conauth').hide();
     $('#condate').hide();

   }
 });

           $(document).on('change', '#suw', function() {
  if(this.value == 'Auction'){
     $('#aonauth').show();
     $('#aondate').show();
      $('#conauth').hide();
     $('#condate').hide();
   }else{
     $('#aonauth').hide();
     $('#aondate').hide();
   }
 });

             $(document).on('change', '#ito', function() {
  if(this.value == 'Other'){
     $('#rnOthers11').show();
      $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
   }else if(this.value == 'District'){
     $('#dislist').show();
     $('#drvno').show();
     $('#drdate').show();
   }
   else{
    $('#rnOthers11').hide();
    $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
   }
});

     $(document).on('change', '#repunit', function() {
      if(this.value == 'Private Firm'){
         $('#firm1').show();
         $('#firm2').show();
         $('#firm3').show();
         $('#firm4').show();
         $('#firm5').show();
         $('#pap').hide();
         $('#con11').html('Contact No');
       }else if(this.value ==  'PAP Central Workshop'){
          $('#pap').show();
          $('#firm1').hide();
         $('#firm2').hide();
         $('#firm3').hide();
         $('#firm4').hide();
         $('#firm5').hide();
       }else if(this.value ==  'Other'){
       $('#firm5').show();
       $('#con11').html('Details of Other Unit');
       $('#firm2').show();

       }else{
         $('#firm1').hide();
         $('#firm2').hide();
         $('#firm3').hide();
         $('#firm4').hide();
         $('#firm5').hide();
         $('#pap').hide();
       }
 });

        $(document).on('change', '#cmonth', function() {
      if(this.value == '12'){
         $('#firm5').show();
       }else if(this.value ==  'Current'){
          $('#d1').show();
          $('#d2').show();
          $('#d3').show();
          $('#firm5').hide();
       }else{
         $('#firm1').hide();
         $('#firm2').hide();
         $('#firm3').hide();
         $('#firm4').hide();
         $('#firm5').hide();
         $('#pap').hide();
         $('#d1').hide();
         $('#d2').hide();
         $('#d3').hide();
         
       }
 });



     

});
</script>
</body>
</html>


