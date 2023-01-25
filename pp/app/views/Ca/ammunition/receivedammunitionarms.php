<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Received Ammunition (Arms)</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
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
      <h2><i class="fa fa-building-o"></i>Received Ammunition (Arms)</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>ca-dashboard">Dashboard</a></li>
          <li class="active">Received Ammunition</li>
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
                <h4 class="panel-title">Received Ammunition (Arms)</h4>
              </div>
              <div class="panel-body">

                <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition/Accessories</label>
                  <div class="col-sm-9">
                 <?php  
$amd = array('' =>'Select type', 'Magzines' => 'Magzines','Rounds' => 'Rounds', 'Cartridges' => 'Cartridges', 'Other Accessories' =>'Other Accessories');
/*newarea Textfield*/
 echo form_dropdown('amd', $amd, set_value('amd',''),'id="amd" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('amd');
/*----End newarea Textfield----*/
 ?>
                    <label for="amd" class="error"></label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$acd = array('type' => 'number','name' => 'acd','id' => 'acd','class' => 'form-control','placeholder' =>'Quantity','required' => 'required','value' => set_value('acd'));
echo form_input($acd);
echo form_error('acd');
?>
                    <label for="acd" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Details</label>
                  <div class="col-sm-9">
                    <?php 
$aa = array('type' => 'text','name' => 'aa','id' => 'aa','class' => 'form-control','placeholder' =>'Ammunition Details','required' => 'required','value' => set_value('aa'));
echo form_input($aa);
echo form_error('aa');
?>
                    <label for="aa" class="error"></label>
                  </div>
                </div> 


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Mode</label>
                  <div class="col-sm-9">
                 <?php  
$mode = array('' =>'Select type', 'Service' => 'Service', 'Temporary' => 'Temporary', 'Practice' => 'Practice');
/*newarea Textfield*/
 echo form_dropdown('mode', $mode, set_value('mode',1),'id="mode" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('mode');
/*----End newarea Textfield----*/
 ?>
                    <label for="mode" class="error"></label>
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
<script src="<?php echo base_url();?>webroot/plugin/fileupload/fileinput.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%",minimumResultsForSearch:-1}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  })
});
</script>
</body>
</html>