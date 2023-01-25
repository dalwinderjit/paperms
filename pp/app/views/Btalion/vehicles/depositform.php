<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Update Vehicle</title>
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
      <h3>&nbsp; &nbsp; Update Vehicle</h3>
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
                  <label class="col-sm-3 control-label">Registration Number</label>
                  <div class="col-sm-9">
      <?php  
$rnum = array();
$rnum[''] = '--Select--';
                 foreach ($vichel as $value) {
                   $rnum[$value->mt_id] = $value->regnom;
                 }
/*newarea Textfield*/
 echo form_dropdown('rnum', $rnum, set_value('rnum',''),'id="rnum" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('rnum');
/*----End newarea Textfield----*/
 ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div> 

                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Speedometer Reading</label>
                  <div class="col-sm-9">
<?php
$sr = array('type' => 'text','name' => 'sr','id' => 'sr','class' => 'form-control','placeholder' =>'Speedometer Reading','required' => 'required','value' => set_value('sr'));
echo form_input($sr);
echo form_error('sr');
?>
                    <label for="sr" class="error"></label>
                  </div>
                </div>


                    <div class="form-group">
                  <label class="col-sm-3 control-label"> Fuel Type</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$ftype = array('' => '--Select--', 'Petrol' => 'Petrol','Diesel' => 'Diesel');
/*newarea Textfield*/
 echo form_dropdown('ftype', $ftype, set_value('ftype',''),'id="ftype" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('ftype');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="idate" class="error"></label>

                  </div>
                </div>

             
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Vehicle Condition</label>
                  <div class="col-sm-9">
                 <?php  
$vc = array('' => '--Select--', 'On Road' => 'On Road','Off Road' => 'Off Road');
/*newarea Textfield*/
 echo form_dropdown('vc', $vc, set_value('vc',''),'id="vc" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('vc');
/*----End newarea Textfield----*/
 ?>
                    <label for="vc" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="onroad" style="display: none">
                  <label class="col-sm-3 control-label">On Road</label>
                  <div class="col-sm-9">
                 <?php  
$ssw = array('' => '--Select--', 'In Mt Garage' => 'In Mt Garage','Case property in MT Garage' => 'Case property in MT Garage','Case Property in PS' =>'Case Property in PS');
/*newarea Textfield*/
 echo form_dropdown('ssw', $ssw, set_value('ssw',''),'id="ssw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ssw');
/*----End newarea Textfield----*/
 ?>
                    <label for="ssw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="offroad"  style="display: none">
                  <label class="col-sm-3 control-label">Off Road</label>
                  <div class="col-sm-9">
                 <?php  
$suw = array('' => '--Select--', 'Minor Repair' => 'Minor Repair','Major Repair' => 'Major Repair', 'under condemnation' => 'under condemnation','condemn' => 'condemn', 'Auction' => 'Auction');
/*newarea Textfield*/
 echo form_dropdown('suw', $suw, set_value('suw',''),'id="suw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('suw');
/*----End newarea Textfield----*/
 ?>
                    <label for="suw" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="conauth"  style="display:none">
                  <label class="col-sm-3 control-label"> Order no</label>
                  <div class="col-sm-9">
<?php 
$ca = array('type' => 'text','name' => 'ca','id' => 'ca','class' => 'form-control','placeholder' =>'order no','required' => 'required','value' => set_value('ca'));
echo form_input($ca);
echo form_error('ca');
?>
                    <label for="ca" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="condate" style="display:none">
                  <label class="col-sm-3 control-label">Condition Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php 
$vdate = array('type' => 'text','name' => 'vdate','id' => 'datepicker2','class' => 'form-control','placeholder' =>'Condition Date','required' => 'required','value' => set_value('vdate'));
echo form_input($vdate);
echo form_error('vdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="vdate" class="error"></label>
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Reason</label>
                  <div class="col-sm-9">
<?php
$remark = array('type' => 'text','name' => 'remark','id' => 'remark','class' => 'form-control','placeholder' =>'Reason','required' => 'required','value' => set_value('remark'));
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
<script src="<?php echo base_url();?>webroot/plugin/fileupload/fileinput.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepicker2').datepicker({dateFormat: "dd/mm/yy"});
    $(document).ready(function() {

    $("#bdn").change(function(){
    var bdn = $("#bdn").val();
    var dataStrings = 'bdn='+ bdn;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-holder-name",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#hn").html(html);
    }  
      
    });

    });
     });
         $(document).on('change', '#vc', function() {
  if(this.value == 'On Road'){
     $('#onroad').show();
     $('#offroad').hide();
     $('#conauth').hide();
     $('#condate').hide();
   }else if(this.value == 'Off Road'){
     $('#offroad').show();
     $('#onroad').hide();
   }
 });
           $(document).on('change', '#suw', function() {
  if(this.value == 'condemn'){
     $('#conauth').show();
     $('#condate').show();
   }else{
     $('#conauth').hide();
     $('#condate').hide();
   }
 });
});
</script>
</body>
</html>