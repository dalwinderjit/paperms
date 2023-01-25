<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Ammunition</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
  </head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view(F_BTALION.'html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view(F_BTALION.'html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp;  &nbsp; &nbsp;Add Ammunition (Service) </h3>
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
  <strong>Success!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
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
                  <label class="col-sm-3 control-label">Ammunition Type</label>
                  <div class="col-sm-9">
                 <?php 
                 $tow = array('Rounds' => 'Rounds'); 
                 
/*newarea Textfield*/
 echo form_dropdown('bodyno', $tow, set_value('bodyno',1),'id="bodyno" data-placeholder="Ammunition Type" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('bodyno');
/*----End newarea Textfield----*/
 ?> <label for="bodyno" class="error"></label>
                  </div>
                </div>  
                <!-- form-group -->

                <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition Bore</label>
                  <div class="col-sm-9">
             <?php 
                 $now = array();
                  $now[''] = '--Select--'; 
                 foreach ($weapon as $value) {
                   $now[$value->nwep_id.','.$value->bore.','.$value->arm] = $value->bore.'&nbsp;-'.$value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('now', $now, set_value('now',''),'id="now" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('now');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Lot No./Year</label>
                  <div class="col-sm-9">
<?php 
$year = array('type' => 'text','name' => 'year','id' => 'year','class' => 'form-control','placeholder' =>'Lot No./Year','required' => 'required','value' => set_value('year'));
echo form_input($year);
echo form_error('year');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$qw = array('type' => 'text','name' => 'qw','id' => 'qw','class' => 'form-control','placeholder' =>'Quantity','required' => 'required','value' => set_value('qw'));
echo form_input($qw);
echo form_error('qw');
?>
                    <label for="qw" class="error"></label>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-3 control-label"> Received From</label>
                  <div class="col-sm-9">
<?php 
$rfrom = array('type' => 'text','name' => 'rfrom','id' => 'rfrom','class' => 'form-control','placeholder' =>'Received From','value' => set_value('rfrom'));
echo form_input($rfrom);
echo form_error('rfrom');
?>
                    <label for="rfrom" class="error"></label>
                  </div>
                </div>

            <div class="form-group">
                  <label class="col-sm-3 control-label"> Receive Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php 
$rdate = array('type' => 'text','name' => 'rdate','id' => 'rdate','class' => 'form-control','required' => 'required','value' => set_value('rdate'),'placeholder' => 'Receive Date');
echo form_input($rdate);
echo form_error('rdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <label for="rdate" class="error"></label>
                  </div>
                </div>
                  </div>
                <!-- form-group -->

                        <div class="form-group">
                  <label class="col-sm-3 control-label"> RC/Voucher No</label>
                  <div class="col-sm-9">
<?php 
$rcvno = array('type' => 'text','name' => 'rcvno','id' => 'rcvno','class' => 'form-control','placeholder' =>'RC/Voucher No','value' => set_value('rcvno'));
echo form_input($rcvno);
echo form_error('rcvno');
?>
                    <label for="rcvno" class="error"></label>
                  </div>
                </div>
<!--  -->                
<!--*** Text field-->

                <div class="form-group">
                  <label class="col-sm-3 control-label">RC/Voucher date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php 
$vdate = array('type' => 'text','name' => 'vdate','id' => 'datepicker','class' => 'form-control','placeholder' =>'RC/Voucher date','value' => set_value('vdate'));
echo form_input($vdate);
echo form_error('vdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="vdate" class="error"></label>
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
  }),
    jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
});
</script>
</body>
</html>