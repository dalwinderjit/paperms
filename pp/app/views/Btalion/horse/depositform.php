<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deposit Horse Info</title>
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
      <h2><i class="fa fa-building-o"></i>Deposit Horse Info</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">Deposit Horse Info</li>
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
                <h4 class="panel-title">Deposit Horse Info</h4>
              </div>
              <div class="panel-body">

           <div class="form-group">
                  <label class="col-sm-3 control-label">Select Horse</label>
                  <div class="col-sm-9">
                 <?php  
                 $bdn = array();
                  $bdn[''] = '--Select--'; 
                 foreach ($weapon as $value) {
                   $bdn[$value->horse_id] = $value->noh;
                 
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
                  <label class="col-sm-3 control-label">Rider Name</label>
                  <div class="col-sm-9">
 <select required="" class="form-control" id="hn" name="hn">
</select>
                    <label for="hn" class="error"></label>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Receive</label>
                  <div class="col-sm-9">
                 <?php  
$rec = array('Yes' => 'Yes','No' => 'No');
/*newarea Textfield*/
 echo form_dropdown('rec', $rec, set_value('rec',1),'id="rec" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('rec');
/*----End newarea Textfield----*/
 ?>
                    <label for="rec" class="error"></label>
                  </div>
                </div> 


                <div class="form-group">
                  <label class="col-sm-3 control-label">Receive Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$lhcd = array('type' => 'text','name' => 'lhcd','id' => 'lhcd','class' => 'form-control','placeholder' =>'Receive Date','required' => 'required','value' => set_value('lhcd'));
echo form_input($lhcd);
echo form_error('lhcd');
?>   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>  <label for="lhcd" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Horse Condition</label>
                  <div class="col-sm-9">
                <select name="cw" id="cw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required="">

                <option value="">--Select--</option>
<option value="Serviceable">Serviceable</option>
<option value="Non-Serviceable">Non-Serviceable</option>
</select>
                    <label for="cw" class="error"></label>
                  </div>
                </div> 

                     <div class="form-group" style="display:none" id="sone">
                  <label class="col-sm-3 control-label">Serviceable</label>
                  <div class="col-sm-9">
    <select name="Serviceable" id="Serviceable" data-placeholder="Choose One" title="Please select at least 1 value" class="select2">
    <option value="">--Select--</option>
<option value="In Stable">In Stable</option>
<option value="In stable Light Duty">In stable Light Duty</option>
</select>
                    <label for="Serviceable" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group" style="display:none" id="none">
                  <label class="col-sm-3 control-label">Non-Serviceable</label>
                  <div class="col-sm-9">
    <select name="nServiceable" id="nServiceable" data-placeholder="Choose One" title="Please select at least 1 value" class="select2">
     <option value="">--Select--</option>
<option value="Minor Injured">Minor Injured</option>
<option value="Major Injured">Major Injured</option>
<option value="Hospitalize">Hospitalize</option>
<option value="Medical rest">Medical rest</option>
</select>
                    <label for="nServiceable" class="error"></label>
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
    $(document).ready(function() {

    $("#bdn").change(function(){
    var bdn = $("#bdn").val();
    var dataStrings = 'bdn='+ bdn;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-holder-nameo",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#hn").html(html);
    }  
      
    });

    });
     });
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