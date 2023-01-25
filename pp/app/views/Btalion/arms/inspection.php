<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Inspection Weapon</title>
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
      <h3> &nbsp; &nbsp; Inspection Weapon</h3>

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
                  <label class="col-sm-3 control-label">Weapon Body No</label>
                  <div class="col-sm-9">
                 <?php  
                 $bdn = array();
                  $bdn[''] = '--Select--'; 
                  foreach ($weapon as  $value) {
                            $bdn[$value->old_weapon_id] = 'Weapon Name: '.$value->tow.'&nbsp; '. 'Weapon Body No: '.$value->bono.'&nbsp; '. 'Weapon Butt No:'.$value->buno;
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
                <label class="col-sm-3 control-label">Inspecting Authority</label>
                  <div class="col-sm-9">
                 <?php  
$cw = array('' => '--Select--', 'Head Armourer' => 'Head Armourer','Range Armourer' => 'Range Armourer', 'AIA' => 'AIA');
/*newarea Textfield*/
 echo form_dropdown('cw', $cw, set_value('cw',''),'id="cw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('cw');
/*----End newarea Textfield----*/
 ?>
                    <label for="cw" class="error"></label>
                  </div>
                </div> 
<div class="form-group">
                  <label class="col-sm-3 control-label">Name of inspecting officer</label>
                  <div class="col-sm-9">
<?php
$name = array('type' => 'text','name' => 'name','id' => 'name','class' => 'form-control','placeholder' =>'Name of inspecting office','required' => 'required','value' => set_value('name'));
echo form_input($name);
echo form_error('name');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label"> Inspection From Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$idate = array('type' => 'text','name' => 'idate','id' => 'idate','class' => 'form-control','placeholder' =>'Inspection Date','required' => 'required','value' => set_value('idate'));
echo form_input($idate);
echo form_error('idate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="idate" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Inspection To Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$idate = array('type' => 'text','name' => 'idateo','id' => 'idateo','class' => 'form-control','placeholder' =>'Inspection Date','required' => 'required','value' => set_value('idate'));
echo form_input($idate);
echo form_error('idate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="idate" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="weps">
                  <label class="col-sm-3 control-label">Weapon  Condition</label>
                  <div class="col-sm-9">
                 <?php  
$cw = array('' => '--Select--', 'Serviceable' => 'Serviceable','Non-Serviceable' => 'Non-Serviceable');
/*newarea Textfield*/
 echo form_dropdown('cwi', $cw, set_value('cwi',''),'id="cw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('cwi');
/*----End newarea Textfield----*/
 ?>
                    <label for="cw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="Serviceable" style="display:none">
                  <label class="col-sm-3 control-label">Status of Serviceable Weapon</label>
                  <div class="col-sm-9">
                 <?php  
$ssw = array('' => '--Select--','Issued' => 'Issued','In Kot' => 'In Kot','Case Property in kot' => 'Case Property in kot','Case Property in PS' =>'Case Property in PS','Lost' => 'Lost');
/*newarea Textfield*/
 echo form_dropdown('ssw', $ssw, set_value('ssw',1),'id="ssw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('ssw');
/*----End newarea Textfield----*/
 ?>
                    <label for="ssw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="unServiceable" style="display:none">
                  <label class="col-sm-3 control-label">Status of Non-Serviceable Weapon</label>
                  <div class="col-sm-9">
                 <?php  
$suw = array('' => '--Select--','Minor Damage' => 'Minor Damage','Major Damage' => 'Major Damage', 'Condemn' => 'Condemn','Expired' => 'Expired');
/*newarea Textfield*/
 echo form_dropdown('suw', $suw, set_value('suw',1),'id="suw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('suw');
/*----End newarea Textfield----*/
 ?>
                    <label for="suw" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-9">
<?php
$remark = array('type' => 'text','name' => 'remark','id' => 'remark','class' => 'form-control','placeholder' =>'Remarks','required' => 'required','value' => set_value('remark'));
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
  jQuery('#idateo').datepicker({dateFormat: "dd/mm/yy"});

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


   $(document).on('change', '#cw', function() {
  if(this.value == 'Serviceable'){
     $('#Serviceable').show();
     $('#unServiceable').hide();
   }else{
     $('#unServiceable').show();
     $('#Serviceable').hide();
   }
 });


     });
});
</script>
</body>
</html>