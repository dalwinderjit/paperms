<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>CA:: Update Issue Arms Info</title>
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
      <h2><i class="fa fa-building-o"></i> Update Issue Arms Info</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>ca-dashboard">Dashboard</a></li>
          <li class="active"><a href="<?php echo base_url();?>ca-view-issue-arm">View Issue Arms List</a></li>
          <li class="active">Update Issue Arms Info</li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">
      <div class="row">
                <div class="col-md-12">        
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
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title"> Update Issue Arms Info</h4>
              </div>
              <div class="panel-body">
                   <div class="form-group">
                  <label class="col-sm-3 control-label">Body No's</label>
                  <div class="col-sm-9">
                 <?php 
                 $tow = array(); 
                 foreach ($bodys as $value) {
                   $tow[$value->weapon_id] = 'Weapon Type: '.$value->weapon_name.'&nbsp; - Butt No: '.$value->weapon_body_no.'&nbsp; - Body No: '.$value->weapon_body_no;
                 }
/*newarea Textfield*/
 echo form_dropdown('bodyno[]', $tow, set_value('bodyno',''),'id="bodyno" data-placeholder="Choose One Body No" title="Please select at least 1 value" class="select2" required multiple disabled'); 
 echo form_error('bodyno');
/*----End newarea Textfield----*/
 ?> <label for="bodyno" class="error"></label>
                  </div>
                </div>  
                <!-- form-group -->

                <div class="form-group">
                  <label class="col-sm-3 control-label"> Issue Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$idate = array('type' => 'text','name' => 'idate','id' => 'datepicker','class' => 'form-control','placeholder' =>'Issue Date','required' => 'required','value' => $issuenfo->issue_date);
echo form_input($idate);
echo form_error('idate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="idate" class="error"></label>

                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->

                <div class="form-group">
                  <label class="col-sm-3 control-label"> RC No</label>
                  <div class="col-sm-9">
<?php 
$rcno = array('type' => 'text','name' => 'rcno','id' => 'rcno','class' => 'form-control','placeholder' =>'RC No','required' => 'required','value' => $issuenfo->rc_no);
echo form_input($rcno);
echo form_error('rcno');
?>
                    <label for="rcno" class="error"></label>
                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
                  <div class="col-sm-9">
                 <?php  
$mq = array('NA' => 'NA','1' => '1','2' => '2','3' => '3');
/*newarea Textfield*/
 echo form_dropdown('mq', $mq, set_value('mq',$issuenfo->megqty),'id="mq" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('mq');
/*----End newarea Textfield----*/
 ?>
                    <label for="mq" class="error"></label>
                  </div>
                </div><!-- form-group -->


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <?php  
                 $ito = array(); 
                 foreach ($users as $value) {
                   $ito[$value->users_id] = $value->user_name;
                 }
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',$issuenfo->issue_to),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
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
  jQuery("#bodyno").val([<?php echo $issuenfo->weapon_master_id; ?>]).change(),
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