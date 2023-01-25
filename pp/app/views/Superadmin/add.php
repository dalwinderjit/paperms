<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
  </head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('html/headbar'); ?>
    <div class="pageheader">
      <h2><i class="fa fa-building-o"></i> Name</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
           <li class="active"><a href="<?php echo base_url();?>restaurant">Name</a></li>
          <li class="active">Name</li>
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
                <h4 class="panel-title">Name</h4>
              </div>
              <div class="panel-body">
                
                <div class="form-group">
                  <label class="col-sm-3 control-label"> Name</label>
                  <div class="col-sm-9">
<?php 
$rname = array('type' => 'text','name' => 'rname','id' => 'rname','class' => 'form-control','placeholder' =>'Name','required' => 'required','value' => set_value('rname'));
echo form_input($rname);
echo form_error('rname');
?>
                    <label for="rname" class="error"></label>
                  </div>
                </div><!-- form-group -->   
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Area</label>
                  <div class="col-sm-9">
                 <?php  
$name = array('1','2');
/*newarea Textfield*/
 echo form_dropdown('newarea', $name, set_value('newarea',1),'id="newarea" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('newarea');
/*----End newarea Textfield----*/
 ?>
                    <label for="newarea" class="error"></label>
                  </div>
                </div><!-- form-group -->
                

         		 <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
<?php 
$remail = array('type' => 'email','name' => 'remail','id' => 'remail','class' => 'form-control','placeholder' =>'Email', 'required' => 'required','value' => set_value('remail'));
echo form_input($remail);
echo form_error('remail');
?>
                    <label for="remail" class="error"></label>
                  </div>
                </div><!-- form-group -->
                
                     <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
<?php 
$rpass = array('type' => 'password','name' => 'rpass','id' => 'rpass','class' => 'form-control','placeholder' =>'Password', 'required' => 'required','value' => set_value('rpass'));
echo form_input($rpass);
echo form_error('rpass');
?>
                    <label for="rpass" class="error"></label>
                  </div>
                </div><!-- form-group -->
              
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