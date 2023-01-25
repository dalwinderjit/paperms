<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Inspection Ammunition</title>
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
      <h3> &nbsp; &nbsp; Inspection Ammunition</h3>

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
              <div class="panel-body">
              <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition Type</label>
                  <div class="col-sm-9">
                 <?php  
$atype = array('' => '--Select--','Service' => 'Service','Practice' => 'Practice');
/*newarea Textfield*/
 echo form_dropdown('atype', $atype, set_value('atype',''),'id="ammu" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('atype');
 ?>
                    <label for="atype" class="error"></label>
                  </div>
                </div><!-- form-group -->
                
                  <div class="form-group">
                  <label class="col-sm-3 control-label">List of Ammunition </label>
                  <div class="col-sm-9">
                 <?php  
                 $bdn = array();
                  $bdn[''] = '--Select--'; 

                 
/*newarea Textfield*/
 echo form_dropdown('bdn', $bdn, set_value('bdn',''),'id="bdn" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('bdn');
/*----End newarea Textfield----*/
 ?>
                    <label for="bdn" class="error"></label>
                  </div>
                </div> 
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$qty = array('type' => 'text','name' => 'qty','id' => 'qtyy','class' => 'form-control','placeholder' =>'Quantity','value' => set_value('qty'),'readonly' => 'readonly');
echo form_input($qty);
echo form_error('qty');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>
            
              
<div class="form-group">
                  <label class="col-sm-3 control-label">Name of inspecting officer (Ammunition examinor)</label>
                  <div class="col-sm-9">
          <?php
          $nio = array('type' => 'text','name' => 'nio','id' => 'nio','class' => 'form-control','placeholder' =>'Name of inspecting office (Ammunition examinor)','value' => set_value('nio'));
          echo form_input($nio);
          echo form_error('nio');
          ?>
                    <label for="name" class="error"></label>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Inspection Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$idate = array('type' => 'text','name' => 'idate','id' => 'idate','class' => 'form-control','placeholder' =>'Inspection Date','value' => set_value('idate'));
echo form_input($idate);
echo form_error('idate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="idate" class="error"></label>
                  </div>
                </div>

                     

                <div class="form-group">
                  <label class="col-sm-3 control-label">Unservicable Quantity</label>
                  <div class="col-sm-9">
<?php
$uqty = array('type' => 'text','name' => 'uqty','id' => 'uqty','class' => 'form-control','placeholder' =>'Unservicable Quantity','value' => set_value('uqty'));
echo form_input($uqty);
echo form_error('uqty');
?>
                    <label for="name" class="error"></label>
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
  jQuery('#idate').datepicker({dateFormat: "dd/mm/yy"});
    
     $(document).on('change', '#cw', function() {
  if(this.value == 'Serviceable'){
     $('#Serviceable').show();
     $('#unServiceable').hide();
   }else{
     $('#unServiceable').show();
     $('#Serviceable').hide();
   }
 });
   

$(document).ready(function() {

    $("#ammu").change(function(){
    var bodyno = $("#ammu").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-ammunitiontype",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#bdn").html(html);
    }  
      
    });

    });

    $("#bdn").change(function(){
    var ammuval = $("#ammu").val();
    var bodyno = $("#bdn").val();
    var dataStrings = 'ammuval=' + ammuval + '&bodyno=' + bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-qty-ammu",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#qtyy").val(html);
    }  
      
    });

    });


     });


});
</script>
</body>
</html>