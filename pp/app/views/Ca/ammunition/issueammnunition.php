<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Issue Ammunition</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
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
      <h2><i class="fa fa-building-o"></i>Issue Ammunition</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>ca-dashboard">Dashboard</a></li>
          <li class="active">Issue Ammunition</li>
        </ol>
      </div>
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
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title"> Issue Ammunition</h4>
              </div>
              <div class="panel-body">
  <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition type</label>
                  <div class="col-sm-9">
                 <?php 
                 $tow = array('' => 'Ammunition type','Rounds' => 'Rounds','Cartridges' => 'Cartridges','Other' =>'Others'); 
                 
/*newarea Textfield*/
 echo form_dropdown('bodyno', $tow, set_value('bodyno',''),'id="bodyno" data-placeholder="Ammunition type" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('bodyno');
/*----End newarea Textfield----*/
 ?> <label for="bodyno" class="error"></label>
                  </div>
                </div>  
                <!-- form-group -->
                <div id="listing"></div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Lot No./Year</label>
                  <div class="col-sm-9">
<?php 
$year = array('type' => 'text','name' => 'year','id' => 'year','class' => 'form-control','placeholder' =>'Lot No./Year','required' => 'required','value' => set_value('year'));
echo form_input($year);
echo form_error('year');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php 
$qab = array('type' => 'number','name' => 'qab','id' => 'qab','class' => 'form-control','placeholder' =>'Quantity','required' => 'required','value' => set_value('qab'));
echo form_input($qab);
echo form_error('qab');
?>
                    <label for="qab" class="error"></label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-3 control-label"> Issue Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$idate = array('type' => 'text','name' => 'idate','id' => 'datepicker','class' => 'form-control','placeholder' =>'Issue Date','required' => 'required','value' => set_value('idate'));
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
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <?php  
                 $ito = array(); 
                 $ito[''] = 'Select a Battalion';
                 foreach ($users as $value) {
                   $ito[$value->users_id] = $value->user_name;
                 }
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div> 

                          <div class="form-group">
                  <label class="col-sm-3 control-label"> RC/Voucher No</label>
                  <div class="col-sm-9">
<?php 
$rcno = array('type' => 'text','name' => 'rcno','id' => 'rcno','class' => 'form-control','placeholder' =>'RC/Voucher No','value' => set_value('rcno'));
echo form_input($rcno);
echo form_error('rcno');
?>
                    <label for="rcno" class="error"></label>
                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->

                 
                <div class="form-group">
                  <label class="col-sm-3 control-label">RC/Voucher date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php 
$vdate = array('type' => 'text','name' => 'vdate','id' => 'vdate','class' => 'form-control','placeholder' =>'RC/Voucher date','value' => set_value('vdate'));
echo form_input($vdate);
echo form_error('vdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="vdate" class="error"></label>
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
  jQuery(".select2").select2({width:"100%",minimumResultsForSearch:-1}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),
  // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#vdate').datepicker({dateFormat: "dd/mm/yy"});
  $(document).ready(function() {

    $("#bodyno").change(function(){
    var bodyno = $("#bodyno").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>ca-ammu-aj",
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