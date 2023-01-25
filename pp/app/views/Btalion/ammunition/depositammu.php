<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deposit Ammunition</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
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
      <h3>&nbsp; &nbsp; Deposit Ammunition</h3>
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
          <div class="panel-header">
           <h4>&nbsp; &nbsp;&nbsp; &nbsp;<strong>Weapon/Bore:</strong> <?php echo $arms->ammuwep.'&nbsp;'.$arms->ammubore; ?> &nbsp; &nbsp;&nbsp; &nbsp; <strong>Issued To:</strong> <?php $id = fetchoneinfo('newosi',array('man_id' => $arms->osi_id)); echo $id->name. 'Dept No:'. $id->depttno; ?></h4>
          </div>
              <div class="panel-body">
            

                <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity Live</label>
                  <div class="col-sm-9">
<?php
$ql = array('type' => 'text','name' => 'ql','id' => 'ql','class' => 'form-control','placeholder' =>'Quantity Live','required' => 'required','value' => set_value('auq'));
echo form_input($ql);
echo form_error('ql');
?>
                    <label for="auq" class="error"></label>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity Empty Shell</label>
                  <div class="col-sm-9">
<?php
$qes = array('type' => 'text','name' => 'qes','id' => 'qes','class' => 'form-control','placeholder' =>'Quantity Empty Shell','required' => 'required','value' => set_value('aldq'));
echo form_input($qes);
echo form_error('qes');
?>
                    <label for="qes" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Lost Shell</label>
                  <div class="col-sm-9">
<?php
$ls = array('type' => 'text','name' => 'ls','id' => 'ls','class' => 'form-control','placeholder' =>'Lost Shell','required' => 'required','value' => set_value('aldq'));
echo form_input($ls);
echo form_error('ls');
?>
                    <label for="ls" class="error"></label>
                  </div>
                </div> 

                           <div class="form-group">
                  <label class="col-sm-3 control-label"> Receive Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$idate = array('type' => 'text','name' => 'idate','id' => 'datepicker','class' => 'form-control','placeholder' =>'Receive Date','required' => 'required','value' => set_value('idate'));
echo form_input($idate);
echo form_error('idate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="idate" class="error"></label>

                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->
                 
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
  }),
  // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
    $(document).ready(function() {

    $("#bodyno").change(function(){
    var bodyno = $("#bodyno").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-ammu-aj",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#listing").html(html);
    }  
      
    });

    });
     });
});
</script>
</body>
</html>