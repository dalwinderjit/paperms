<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Horse Health checkup</title>
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
      <h2><i class="fa fa-building-o"></i>Horse Health checkup</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">Horse Health checkup</li>
        </ol>
      </div>
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
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Horse Health checkup</h4>
              </div>
              <div class="panel-body">


           <div class="form-group">
                  <label class="col-sm-3 control-label">Select Horse</label>
                  <div class="col-sm-9">
                 <?php  
                 $bdn = array();
                  $bdn[''] = '--Select--'; 
                 foreach ($weapon as $value) {
                   $bdn[$value->horse_id] = $value->horse_name;
                 
                 }
/*newarea Textfield*/
 echo form_dropdown('bdn', $bdn, set_value('bdn',''),'id="bdn" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('bdn');
/*----End newarea Textfield----*/
 ?>
                    <label for="bdn" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Dr name</label>
                  <div class="col-sm-9">
                 <?php
$rbeltno = array('type' => 'text','name' => 'rbeltno','id' => 'rbeltno','class' => 'form-control','placeholder' =>'Dr name','value' => set_value('rbeltno'));
echo form_input($rbeltno);
echo form_error('rbeltno');
?>     <label for="rbeltno" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Doctor Contact</label>
                  <div class="col-sm-9">
                 <?php
$contactno = array('type' => 'text','name' => 'contactno','id' => 'contactno','class' => 'form-control','placeholder' =>'Doctor Contact','value' => set_value('contactno'));
echo form_input($contactno);
echo form_error('contactno');
?>     <label for="contactno" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Checkup date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$lhcd = array('type' => 'text','name' => 'lhcd','id' => 'lhcd','class' => 'form-control','placeholder' =>'Checkup date','value' => set_value('lhcd'));
echo form_input($lhcd);
echo form_error('lhcd');
?>   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>  <label for="lhcd" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                   <label class="col-sm-3 control-label">Checkup Type</label>
                  <div class="col-sm-9">
                 <?php  
                 $ito = array('' => '--Select--', 'Regular Checkup' => 'Regular Checkup', 'Vaccination' => 'Vaccination'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Health Status</label>
                  <div class="col-sm-9">
                <select name="cw" id="cw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" >
                <option value="">--Select--</option>
                <option value="Fit">Fit</option>
<option value="Unfit">Unfit</option>
<option value="Light Duty">Light Duty</option>
<option value="Under Treatment">Under Treatment</option>
<option value="Onrest">Onrest</option>
                </select>
                    <label for="cw" class="error"></label>
                  </div>
                </div> 

                
            
 <div class="form-group">
                  <label class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-9">
<?php
$remark = array('type' => 'text','name' => 'remark','id' => 'remark','class' => 'form-control','placeholder' =>'Remarks','value' => set_value('remark'));
echo form_input($remark);
echo form_error('remark');
?>
                    <label for="remark" class="error"></label>
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
  }),jQuery('#lhcd').datepicker({dateFormat: "dd/mm/yy"});
     $(document).on('change', '#cw', function() {
      if(this.value == ''){
     $('#sone').hide();
     $('#none').hide();
   }
  if(this.value == 'Serviceable'){
     $('#sone').show();
     $('#none').hide();
   }else if(this.value == 'Non-Serviceable'){
     $('#sone').hide();
     $('#none').show();
   }
});
});


</script>
</body>
</html>