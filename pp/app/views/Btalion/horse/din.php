<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deinduction</title>
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
      <h2><i class="fa fa-building-o"></i>Deinduction</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">Deinduction</li>
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
                <h4 class="panel-title">Add Horse Info</h4>
              </div>
              <div class="panel-body">


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Horse Name:</label>
                  <div class="col-sm-9">
                     <?php  
                        $hn = array();
                        $hn[''] = '--Select--';
                                         foreach ($horse as $value) {
                                           $hn[$value->horse_id] = $value->horse_name;
                                         }
                        /*newarea Textfield*/
                         echo form_dropdown('hid', $hn, set_value('hid',''),'id="hid" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
                         echo form_error('hid');
                        /*----End newarea Textfield----*/
                      ?>
                    <label for="hid" class="error"></label><p id="link"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Deinduction</label>
                  <div class="col-sm-9">
                 <?php  
                  $tpi = array('' => '--Select--', 'Retired' => 'Retired','Expired' => 'Expired');
                  /*newarea Textfield*/
                   echo form_dropdown('tpi', $tpi, set_value('tpi',''),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
                   echo form_error('tpi');
                  /*----End newarea Textfield----*/
                   ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$lvd = array('type' => 'text','name' => 'lvd','id' => 'lvd','class' => 'form-control','placeholder' =>'Date','value' => set_value('lvd'));
echo form_input($lvd);
echo form_error('lvd');
?>   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>  <label for="lvd" class="error"></label>
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
  }),jQuery('#date').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#lvd').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#lhcd').datepicker({dateFormat: "dd/mm/yy"});
  $(document).on('change', '#moa', function() {
  if(this.value == 'Gifted'){
     $('#inr').hide();
     $('#gorno').hide();
     $('#gord').hide();
   }else if(this.value == 'Transferred'){
     $('#inr').hide();
     $('#gorno').show();
     $('#gord').show();
   }
   else{
    $('#inr').show();
    $('#gorno').show();
     $('#gord').show();
   }
});

    $(document).on('change', '#hs', function() {
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


 $(document).on('change', '#breed', function() {
      if(this.value == 'Other'){
     $('#BreedOther1').show();
   }else{
    $('#BreedOther1').hide();
   }
  
});

});
</script>
</body>
</html>