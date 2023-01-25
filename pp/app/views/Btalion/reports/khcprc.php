<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Practice Ammunation Report Bns wise</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <style type="text/css">
    .cur{
      cursor:text;
    }
    table{  
    display: block; 
    width: 800px;   /* Just for the demo          */
    overflow-y: hidden;    /* Trigger vertical scroll    */
    overflow-x: auto;  /* Hide the horizontal scroll */
}
    </style>
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
      <h3>&nbsp; &nbsp; Practice Ammunation Report Bns wise</h3>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
       <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
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
              </div>
              <div class="panel-body">

                  <div class="form-group">
                  <label class="col-sm-3 control-label"><button type="button" class="btn btn-primary cur">Battalion/Unit</button></label>
                  <div class="col-sm-9">
<?php
 $ito = array();
                 $ito[''] = '--Battalion--';
                 foreach ($uname as $value) {
                  if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
                    $ito[190] = '1-IRB';
                    $ito[165] = '2-IRB';
                    $ito[154] = '3-IRB';
                    $ito[113] = '4-IRB';
                    $ito[108] = '5-IRB';
                    $ito[160] = '6-IRB';
                    $ito[120] = '7-IRB';
                  }elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
                    $ito[99] = '1-CDO';
                    $ito[172] = '2-CDO';
                    $ito[142] = '3-CDO';
                    $ito[148] = '4-CDO';
                    $ito[178] = '5-CDO';
                  }else{
                    $ito[$value->users_id] = $value->nick;
                  }
                 }/*newarea Textfield*/
 echo form_dropdown('BattalionUnitito', $ito, set_value('BattalionUnitito',1),'id="BattalionUnitito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('BattalionUnitito');
/*----End newarea Textfield----*/
?>
                    <label for="BattalionUnitito" class="error"></label>
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
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control")
});

   
  
</script>
</body>
</html>