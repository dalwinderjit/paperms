<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Vehicle</title>
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
      <h3> &nbsp; &nbsp; &nbsp; Add Vehicle</h3>
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

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Avg</label>
                  <div class="col-sm-9">
<?php
$engno = array('type' => 'text','name' => 'avg','id' => 'engno','class' => 'form-control','placeholder' =>'Avg','value' => set_value('avg'));
echo form_input($engno);
echo form_error('avg');
?>
                    <label for="engno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Month KM </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'mkm','id' => 'Chasis','class' => 'form-control','placeholder' =>'Month KM','value' => set_value('mkm'));
echo form_input($Chasis);
echo form_error('mkm');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Total KM </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'tkm','id' => 'Chasis','class' => 'form-control','placeholder' =>'Month KM','value' => set_value('tkm'));
echo form_input($Chasis);
echo form_error('tkm');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                        <div class="form-group">
                  <label class="col-sm-3 control-label">Month POL </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'mpol','id' => 'Chasis','class' => 'form-control','placeholder' =>'Month POL','value' => set_value('mpol'));
echo form_input($Chasis);
echo form_error('mpol');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 

                     <div class="form-group">
                  <label class="col-sm-3 control-label">Total POL </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'tpol','id' => 'Chasis','class' => 'form-control','placeholder' =>'Month POL','value' => set_value('tpol'));
echo form_input($Chasis);
echo form_error('tpol');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">POL EXP</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'polex','id' => 'rn','class' => 'form-control','placeholder' =>'POL EXP','value' => set_value('polex'));
echo form_input($rn);
echo form_error('polex');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Repair</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'rn','id' => 'rn','class' => 'form-control','placeholder' =>'Repair.','value' => set_value('rn'));
echo form_input($rn);
echo form_error('rn');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Total Repair</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'trepair','id' => 'rn','class' => 'form-control','placeholder' =>'Repair.','value' => set_value('trepair'));
echo form_input($rn);
echo form_error('rn');
?>
                    <label for="rn" class="error"></label>
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
  }),jQuery('#lsd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#lid').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#rcd').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#rcdt').datepicker({dateFormat: "dd/mm/yy"});
    $(document).on('change', '#rcfrm', function() {
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

