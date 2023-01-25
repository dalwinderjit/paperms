<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>CA::Update Arm Info</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
  </head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view(F_CA.'html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view(F_CA.'html/headbar'); ?>
    <div class="pageheader">
      <h2>Update Arm Info</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>ca-dashboard">Dashboard</a></li>
          <li class="active"><a href="<?php echo base_url();?>ca-view-arm">View Arms list</a></li>
          <li class="active">Update Arm Info</li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">
      <div class="row">
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
			'name'		 		=> 'basicForm4',
			'id'		 		=> 'basicForm4',
			'accept-charset' 	=> 'utf-8',
			'autocomplete' 		=>'off', 
			);
 echo form_open_multipart("", $attributes);
?>
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Update Arm Info</h4>
              </div>
              <div class="panel-body">

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Type of Weapon</label>
                  <div class="col-sm-9">
                 <?php 
                 $tow = array();
                 foreach ($weapon as $value) {
                   $tow[$value->arms_master_id] = $value->weapon_name;
                 }
/*newarea Textfield*/
 echo form_dropdown('tow', $tow, set_value('tow',$arminfo->arms_master_id),'id="tow" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('tow');
/*----End newarea Textfield----*/
 ?>
                    <label for="tow" class="error"></label>
                  </div>
                </div>             

                <div class="form-group">
                  <label class="col-sm-3 control-label"> Arm Body No</label>
                  <div class="col-sm-9">
<?php 
$wbodyno = array('type' => 'text','name' => 'wbodyno','id' => 'wbodyno','class' => 'form-control','placeholder' =>'Arm Body No','required' => 'required','value' => $arminfo->weapon_body_no);
echo form_input($wbodyno);
echo form_error('wbodyno');
?>
                    <label for="wbodyno" class="error"></label>
                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->

                <div class="form-group">
                  <label class="col-sm-3 control-label"> Arm Butt No</label>
                  <div class="col-sm-9">
<?php 
$wbuttno = array('type' => 'text','name' => 'wbuttno','id' => 'wbuttno','class' => 'form-control','placeholder' =>'Arm Butt No','required' => 'required','value' => $arminfo->weapon_butt_no);
echo form_input($wbuttno);
echo form_error('wbuttno');
?>
                    <label for="wbuttno" class="error"></label>
                  </div>
                </div>
                <!-- form-group -->
                <!-- form-group --><!--*** Text field-->

                <div class="form-group">
                  <label class="col-sm-3 control-label"> Receive Date</label>
                  <div class="col-sm-9">
<?php 
$rdate = array('type' => 'text','name' => 'rdate','id' => 'rdate','class' => 'form-control','required' => 'required','value' => $arminfo->rec_date);
echo form_input($rdate);
echo form_error('rdate');
?>
                    <label for="rdate" class="error"></label>
                  </div>
                </div>
                <!-- form-group -->
                   
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
                  <div class="col-sm-9">
                 <?php  
$mq = array('NA' => 'NA','1','2','3');
/*newarea Textfield*/
 echo form_dropdown('mq', $mq, set_value('mq',$arminfo->magazine_qty),'id="mq" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('mq');
/*----End newarea Textfield----*/
 ?>
                    <label for="mq" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->

                <div class="form-group">
                  <label class="col-sm-3 control-label"> RC/Voucher No</label>
                  <div class="col-sm-9">
<?php 
$rcvno = array('type' => 'text','name' => 'rcvno','id' => 'rcvno','class' => 'form-control','placeholder' =>'RC/Voucher No','required' => 'required','value' => $arminfo->vocher_no);
echo form_input($rcvno);
echo form_error('rcvno');
?>
                    <label for="rcvno" class="error"></label>
                  </div>
                </div>
<!--  -->                
<!--*** Text field-->

                <div class="form-group">
                  <label class="col-sm-3 control-label">Voucher Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php 
$vdate = array('type' => 'text','name' => 'vdate','id' => 'datepicker','class' => 'form-control','placeholder' =>'Voucher Date','required' => 'required','value' => $arminfo->voucher_date);
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
  jQuery(".select2").select2({width:"100%",minimumResultsForSearch:-1}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),
  // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
});
</script>
</body>
</html>