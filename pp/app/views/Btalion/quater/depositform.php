<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deposit Form</title>
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
      <h2><i class="fa fa-building-o"></i>Deposit Form</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">Deposit Form</li>
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
                <h4 class="panel-title">Deposit Form</h4>
              </div>
              <div class="panel-body">

            <div class="form-group">
                  <label class="col-sm-3 control-label">Quarter No:</label>
                  <div class="col-sm-9">
                 <?php  
$hn = array();
$hn[''] = '--Select--';
                 foreach ($qu as $value) {
                   $hn[$value->add_quater_id] = $value->quater_no;
                 }
/*newarea Textfield*/
 echo form_dropdown('qn', $hn, set_value('qn',''),'id="qn" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('hn');
/*----End newarea Textfield----*/
 ?>
                    <label for="hn" class="error"></label><p id="link"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Holder Name</label>
                  <div class="col-sm-9">
 <select required="" class="form-control" id="hn" name="hn">
</select>
                    <label for="hn" class="error"></label>
                  </div>
                </div>


                 <div class="form-group">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$mq = array('type' => 'text','name' => 'mq','id' => 'mq','class' => 'form-control','required' => 'required','value' => set_value('mq'), 'placeholder' => 'Magazine Qty');
echo form_input($mq);
 echo form_error('mq');
/*----End newarea Textfield----*/
 ?>
                    <label for="mq" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->


                <div class="form-group">
                  <label class="col-sm-3 control-label">Accessories</label>
                  <div class="col-sm-9">
<?php
$acc = array('type' => 'text','name' => 'acc','id' => 'acc','class' => 'form-control','placeholder' =>'Accessories','value' => set_value('acc'));
echo form_input($acc);
echo form_error('acc');
?>
                    <label for="acc" class="error"></label>
                  </div>
                </div>

   
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Receive</label>
                  <div class="col-sm-9">
                 <?php  
$rec = array('Yes' => 'Yes','No' => 'No');
/*newarea Textfield*/
 echo form_dropdown('rec', $rec, set_value('rec',1),'id="rec" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('rec');
/*----End newarea Textfield----*/
 ?>
                    <label for="rec" class="error"></label>
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

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Condition Weapon</label>
                  <div class="col-sm-9">
                 <?php  
$cw = array('' => '--Select--',  'Serviceable' => 'Serviceable','Non-Serviceable' => 'Non-Serviceable');
/*newarea Textfield*/
 echo form_dropdown('cw', $cw, set_value('cw',''),'id="cw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('cw');
/*----End newarea Textfield----*/
 ?>
                    <label for="cw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="Serviceable" style="display:none">
                  <label class="col-sm-3 control-label">Status of Serviceable Weapon</label>
                  <div class="col-sm-9">
                 <?php  
$ssw = array('' => '--Select--', 'In Kot' => 'In Kot','Case Property in kot' => 'Case Property in kot','Case Property in PS' =>'Case Property in PS','Lost' => 'Lost');
/*newarea Textfield*/
 echo form_dropdown('ssw', $ssw, set_value('ssw',''),'id="ssw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
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
$suw = array('' => '--Select--', 'Minor Damage' => 'Minor Damage','Major Damage' => 'Major Damage', 'Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('suw', $suw, set_value('suw',''),'id="suw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
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
  }),
    jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
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
});
</script>
</body>
</html>