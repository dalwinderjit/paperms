<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Date of Relieved</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
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
      <h3>&nbsp; &nbsp; Date of Relieved</h3>
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
          
              <div class="panel-body">

              

                 <div class="form-group" id="pTransfer2">
                  <label class="col-sm-3 control-label">Date of relieving</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$Dateofrelieving = array('type' => 'text','name' => 'Dateofrelieving','id' => 'Dateofrelieving','class' => 'form-control','placeholder' =>'Date of relieving','value' => set_value('Dateofrelieving'),'required' => 'required');
echo form_input($Dateofrelieving);
echo form_error('Dateofrelieving');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="belt" class="error"></label>
                  </div>
                </div> 
                   
                 
              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
      <?php echo form_close(); ?>
         </div><!-- col-md-6 -->
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
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),
  // Date Picker
  jQuery('#Dateofrelieving').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#Dateofrelievingi').datepicker({dateFormat: "dd/mm/yy"});
jQuery('#voluntDateofRetirement').datepicker({dateFormat: "dd/mm/yy"});


    jQuery('#DismissingAuthority').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#DismissDate').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#DateofReti').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#pgDateofRetirement').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#DateofDeath').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#pgrDateofRetirement').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#pgDateoMissing').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#DateofReti1').datepicker({dateFormat: "dd/mm/yy"});

$(document).on('change', '#tid', function() {
    if(this.value == 'Yes'){
            $('#pTransfer2').show();
            $('#Expired1').hide();
    }else if(this.value == 'Expired'){
          $('#Expired1').show();
          $('#pTransfer2').hide();
    }else{
        $('#pTransfer2').hide();
        $('#Expired1').hide();
    }
  });

    $(document).on('change', '#ti', function() {
       if(this.value == 'Promotion Transfer'){
    $('#pTransfer1').show();
    $('#pTransfer2').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();


    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed3').hide();
    $('#Dismissed4').hide();
    

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Expired1').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'Transfer'){
    $('#pTransfer1').show();
    $('#Transfer2').hide();

    $('#repart').show();
    $('#pTransfer2').hide();
    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed3').hide();
    $('#Dismissed4').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

    $('#Expired1').hide();

    $('#Resignation1').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'On deputation'){
    $('#Deputation1').show();
    $('#Deputation2').show();
    $('#Deputation3').show();

     $('#pTransfer1').hide();
    $('#pTransfer2').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed3').hide();
    $('#Dismissed4').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

    $('#Expired1').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'Dismissed'){
    $('#Dismissed0').show();
    $('#Dismissed1').show();
    $('#Dismissed2').show();
    $('#Dismissed4').show();


    $('#pTransfer1').hide();
    $('#pTransfer2').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Expired1').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'Retired'){
    $('#retired').show();
    $('#prematurepoart').show();
    $('#Expired1').hide();

       $('#pTransfer1').hide();
    $('#pTransfer2').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();

   }else if(this.value == 'Expired'){
    $('#Expired1').show();
   $('#retired').hide();
    $('#prematurepoart').hide();

       $('#pTransfer1').hide();
    $('#pTransfer2').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'Resignation'){
    $('#Resignation1').show();
    $('#Resignation2').show();

$('#Expired1').hide();
   $('#retired').hide();
    $('#prematurepoart').hide();

       $('#pTransfer1').hide();
    $('#pTransfer2').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
   }else if(this.value == 'Missing'){
    $('#missingdate1').show();

     $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed3').hide();
    $('#Dismissed4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Expired1').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();
   }else{

    $('#pTransfer1').hide();
    $('#pTransfer2').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed4').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


    $('#Expired1').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();


   }
});
    

     $(document).on('change', '#Reason', function() {
    if(this.value == 'Any Other'){
       $('#Dismissed3').show();
     }else{
       $('#Dismissed3').hide();
     }
  });  

      $(document).on('change', '#smor', function() {
   if(this.value == 'Superannuation'){
    $('#super1').show();
    $('#super2').show();
    $('#super3').show();
    $('#super4').show();
    $('#super5').show();

    $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();

     $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

    $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
    $('#pre4').hide();
   }
   if(this.value == 'Voluntary'){
    $('#volunt1').show();
    $('#volunt2').show();
    $('#volunt3').show();
    $('#volunt4').show();
    $('#volunt5').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

     $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
    $('#pre4').hide();
   }if(this.value == 'Pre-mature'){
    $('#pre1').show();
    $('#pre2').show();
    $('#pre3').show();
    $('#pre4').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

    $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

      $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();
   }if(this.value == 'Pre-mature'){
    $('#pre1').show();
    $('#pre2').show();
    $('#pre3').show();
    $('#pre4').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

    $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();

     $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

   }if(this.value == 'On Medical Ground'){
    $('#gomgr1').show();
    $('#gomgr2').show();
    $('#gomgr3').show();
    $('#gomgr4').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

    $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();

    $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
    $('#pre4').hide();
   }
});  





   $(document).on('click', '#prematurei1', function() {
  $('#pre1').show();
    $('#pre2').show();
    $('#pre3').show();
    $('#pre1').hide();

});

$(document).on('click', '#prematurei2', function() {
     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

});   


     $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

   $(document).on('change', '#iito', function() {
      if(this.value == 'Other'){
     $('#iitoOther1').show();
   }else{
    $('#iitoOther1').hide();
   }
  
});


      $(document).on('click', '#showi', function() {
  $('#Issuedtoc1').show();
  $('#Issuedtoc2').hide();
  
});

  $(document).on('click', '#showi2', function() {
  $('#Issuedtoc2').show();
  $('#Issuedtoc1').hide();
  
});

});
</script>
</body>
</html>
