<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>PAP BNs  (All Modules)</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <style type="text/css">
    .cur{
      cursor:text;
    }
    table{  
    display: block; 
    width: 800px;   /* Just for the demo          */
    overflow-y: hidden;    /* Trigger vertical scroll    */
    overflow-x: auto;  /* Hide the horizontal scroll */
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
      <h3>&nbsp; &nbsp;  PAP BNs  (All Modules)</h3>
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
      );
 echo form_open_multipart("", $attributes);
?>
          <div class="panel panel-default">
              <div class="panel-heading">
              </div>
              <div class="panel-body">

                  <div class="form-group">
                  <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Battalion/Unit</button></label>
                  <div class="col-sm-9">
<?php
$BattalionUnitito = array('' => '--Select--', '7-PAP' => '7-PAP','9-PAP' => '9-PAP','13-PAP' => '13-PAP', '27-PAP' => '27-PAP','36-PAP' => '36-PAP','75-PAP' => '75-PAP','80-PAP' => '80-PAP','82-PAP' => '82-PAP','RTC-PAP' => 'RTC-PAP','ISTC.KPT' => 'ISTC. KPT' ); 
/*newarea Textfield*/
 echo form_dropdown('BattalionUnitito', $BattalionUnitito, set_value('BattalionUnitito',1),'id="BattalionUnitito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('BattalionUnitito');
/*----End newarea Textfield----*/
?>
                    <label for="BattalionUnitito" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="itoset" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito = array('' => '--Select--', '31' => 'KHC-WEAPON', '37' => 'KHC-AMMUNITION  (Practice)','38' => 'KHC-AMMUNITION (Service)', '32' => 'OSI','33' => 'MSK', '34' => 'MT', '36' => 'QUARTERS','35' => 'MOUNTS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="itoset2" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito2 = array('' => '--Select--', '45' => 'KHC-WEAPON', '50' => 'KHC-AMMUNITION', '46' => 'OSI','47' => 'MSK', '48' => 'MT', '49' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito2', $ito2, set_value('ito2',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito2');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito2" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="itoset3" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito3 = array('' => '--Select--', '6' => 'KHC-WEAPON', '12' => 'KHC-AMMUNITION','7' => 'OSI','8' => 'MSK', '9' => 'MT', '11' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito3', $ito3, set_value('ito3',1),'id="ito3" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito3');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito3" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="itoset4" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito4 = array('' => '--Select--', '52' => 'KHC-WEAPON', '57' => 'KHC-AMMUNITION', '53' => 'OSI','54' => 'MSK', '55' => 'MT', '56' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito4', $ito4, set_value('ito4',1),'id="ito4" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito4');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito4" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="itoset5" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito5 = array('' => '--Select--', '73' => 'KHC-WEAPON','78' => 'KHC-AMMUNITION', '74' => 'OSI','75' => 'MSK', '76' => 'MT', '77' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito5', $ito5, set_value('ito5',1),'id="ito5" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito5');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito5" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="itoset6" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito6 = array('' => '--Select--', '66' => 'KHC-WEAPON', '71' => 'KHC-AMMUNITION', '67' => 'OSI','68' => 'MSK', '69' => 'MT', '70' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito6', $ito6, set_value('ito6',1),'id="ito6" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito6');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito6" class="error"></label>
                  </div>
                </div>


                    <div class="form-group" id="itoset7" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito6 = array('' => '--Select--', '66' => 'KHC-WEAPON','66' => 'KHC-AMMUNITION', '67' => 'OSI','68' => 'MSK', '69' => 'MT', '70' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito6', $ito6, set_value('ito6',1),'id="ito6" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito6');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito6" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="itoset8" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito6 = array('' => '--Select--', '66' => 'KHC-WEAPON','66' => 'KHC-AMMUNITION', '67' => 'OSI','68' => 'MSK', '69' => 'MT', '70' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito6', $ito6, set_value('ito6',1),'id="ito6" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito6');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito6" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="itoset9" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito6 = array('' => '--Select--', '66' => 'KHC-WEAPON','66' => 'KHC-AMMUNITION', '67' => 'OSI','68' => 'MSK', '69' => 'MT', '70' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito6', $ito6, set_value('ito6',1),'id="ito6" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito6');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito6" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="itoset10" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito6 = array('' => '--Select--', '66' => 'KHC-WEAPON', '66' => 'KHC-AMMUNITION', '67' => 'OSI','68' => 'MSK', '69' => 'MT', '70' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito6', $ito6, set_value('ito6',1),'id="ito6" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito6');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito6" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="itoset11" style="display:none;">
                   <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito6 = array('' => '--Select--', '66' => 'KHC-WEAPON', '66' => 'KHC-AMMUNITION', '67' => 'OSI','68' => 'MSK', '69' => 'MT', '70' => 'QUARTERS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito6', $ito6, set_value('ito6',1),'id="ito6" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito6');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito6" class="error"></label>
                  </div>
                </div>
 
            
              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
      <?php echo form_close(); ?>
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control")
});

   $(document).on('change', '#BattalionUnitito', function() {
  if(this.value == '7-PAP'){
     $('#itoset').show();
   }else{
    $('#itoset').hide();
   }

   if(this.value == '9-PAP'){
     $('#itoset7').show();
   }else{
    $('#itoset7').hide();
   }
    if(this.value == '13-PAP'){
     $('#itoset8').show();
   }else{
    $('#itoset8').hide();
   }

   if(this.value == '27-PAP'){
     $('#itoset2').show();
   }else{
    $('#itoset2').hide();
   }

   if(this.value == '36-PAP'){
     $('#itoset9').show();
   }else{
    $('#itoset9').hide();
   }

   if(this.value == '75-PAP'){
     $('#itoset3').show();
   }else{
    $('#itoset3').hide();
   }

   if(this.value == '80-PAP'){
     $('#itoset4').show();
   }else{
    $('#itoset4').hide();
   }

    if(this.value == '82-PAP'){
     $('#itoset10').show();
   }else{
    $('#itoset10').hide();
   }

   if(this.value == 'RTC-PAP'){
     $('#itoset5').show();
   }else{
    $('#itoset5').hide();
   }
   if(this.value == 'ISTC.KPT'){
     $('#itoset11').show();
   }else{
    $('#itoset11').hide();
   }

   if(this.value == 'CSO-PAP'){
     $('#itoset6').show();
   }else{
    $('#itoset6').hide();
   }
});
  
</script>
</body>
</html>