<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add repair Info</title>
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
      <h3>&nbsp; &nbsp; Repair Quarter Info</h3>
    </div>

    <div class="contentpanel">
      <div class="row">
        <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>  
                <div class="col-md-12">        
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
          <div class="panel-header">
            <h4><?php $qinfo = fetchoneinfo('newquart',array('quart_id' => $this->uri->segment('2'))); if($qinfo !=''){echo '<strong>Quarter No:</strong> '. $qinfo->qtrno. '&nbsp; <strong>Quarter Condition:</strong>'.$qinfo->condit.'&nbsp; <strong>Allot to:</strong>'.$qinfo->rank.''.$qinfo->nameofallote.$qinfo->qother.''.$qinfo->regltno;} ?></h4>
          </div>
              <div class="panel-body">
  
                <div class="form-group" id="loc2" style="display: none;">
                  <label class="col-sm-3 control-label">Old Repair Price</label>
                  <div class="col-sm-9">
<?php
$locothers = array('type' => 'text','name' => 'orp','id' => 'locothers','class' => 'form-control','placeholder' =>'Old Repair Price','value' => set_value('locothers'));
echo form_input($locothers);
echo form_error('locothers');
?>
                    <label for="locothers" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="loc2"  style="display: none;">
                  <label class="col-sm-3 control-label">Total Repair Price</label>
                  <div class="col-sm-9">
<?php
$locothers = array('type' => 'text','name' => 'trp','id' => 'locothers','class' => 'form-control','placeholder' =>'Total Repair Price','value' => set_value('locothers'));
echo form_input($locothers);
echo form_error('locothers');
?>
                    <label for="locothers" class="error"></label>
                  </div>
                </div>
              

          

                    <div class="form-group">
                  <label class="col-sm-3 control-label">Details of repair </label>
                  <div class="col-sm-9">
                 <?php
$qno = array('type' => 'text','name' => 'rdetails','id' => 'qno','class' => 'form-control','placeholder' =>'Repair details','value' => set_value('rdetails'));
echo form_input($qno);
echo form_error('qno');
?>     <label for="qno" class="error"></label>
                  </div>
                </div>  

              

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Repair  Date </label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$od = array('type' => 'text','name' => 'rdate','id' => 'od','class' => 'form-control','placeholder' =>'Repair Date','value' => set_value('od'));
echo form_input($od);
echo form_error('od');
?> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>    <label for="od" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="loc2">
                  <label class="col-sm-3 control-label">Cost of repair</label>
                  <div class="col-sm-9">
<?php
$locothers = array('type' => 'text','name' => 'nrp','id' => 'locothers','class' => 'form-control','placeholder' =>'Cost of repair','value' => set_value('locothers'));
echo form_input($locothers);
echo form_error('locothers');
?>
                    <label for="locothers" class="error"></label>
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
  }), jQuery('#todp').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#od').datepicker({dateFormat: "dd/mm/yy"});

    $(document).on('change', '#loc', function() {
  if(this.value == 'Others'){
     $('#loc2').show();
   }else{
    $('#loc2').hide();
   }
});

     $(document).on('change', '#ro', function() {
  if(this.value == 'Other'){
     $('#rnOthers11').show();
   }else{
    $('#rnOthers11').hide();
   }
});
});
</script>
</body>
</html>