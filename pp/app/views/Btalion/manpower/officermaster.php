<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Officer Master</title>
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
      <h2><i class="fa fa-building-o"></i>Officer Master</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
           <li class="active"><a href="<?php echo base_url();?>restaurant">Add Arm</a></li>
          <li class="active">Add Arm</li>
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
                <h4 class="panel-title">Add New Officer</h4>
              </div>
              <div class="panel-body">


                <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Officer</label>
                  <div class="col-sm-9">
<?php
$noo = array('type' => 'text','name' => 'noo','id' => 'noo','class' => 'form-control','placeholder' =>'Name of Officer','required' => 'required','value' => set_value('noo'));
echo form_input($noo);
echo form_error('noo');
?>
                    <label for="noo" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
                  <?php 
$rank = array('' => '--Select--', 'INSP' => 'INSP', 'DSP' =>'DSP', 'SP' => 'SP', 'ASP' => 'ASP','Commandant' => 'Commandant','Asst. Commandant' =>'Asst. Commandant');
/*newarea Textfield*/
 echo form_dropdown('rank', $rank, set_value('rank',1),'id="rank" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('rank');
/*----End newarea Textfield----*/
 ?> 
                    <label for="rank" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact No</label>
                  <div class="col-sm-9">
<?php
$cn = array('type' => 'text','name' => 'cn','id' => 'cn','class' => 'form-control','placeholder' =>'Contact No','required' => 'required','value' => set_value('cn'));
echo form_input($cn);
echo form_error('cn');
?>
                    <label for="cn" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="bats">
                   <label class="col-sm-3 control-label">Battalion/unit</label>
                  <div class="col-sm-9">
                 <?php  
                  $ito = array('' => '--Select--','7-PAP' => '7-PAP','9-PAP' => '9-PAP', '13-PAP' => '13-PAP','27-PAP' => '27-PAP','36-PAP' => '36-PAP','75-PAP' => '75-PAP','80-PAP' => '80-PAP','82-PAP' => '82-PAP', 'CCR' => 'CCR', 'CR-PAP' => 'CR-PAP','RTC-PAP' => 'RTC-PAP','ISTC-KPT' => 'ISTC-KPT','CTC-PTL' => 'CTC-PTL','CSO' => 'CSO','1-CDO' => '1-CDO','2-CDO' => '2-CDO', '3-CDO' => '3-CDO', '4-CDO' => '4-CDO','5-CDO' => '5-CDO','1-IRB' => '1-IRB','2-IRB' => '2-IRB', '3-IRB' => '3-IRB', '4-IRB' => '4-IRB','5-IRB' => '5-IRB','6-IRB' => '6-IRB', '7-IRB' => '7-IRB'); 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                    <div class="form-group" id="itoOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                 <?php
$BreedOther = array('type' => 'text','name' => 'itoOther','id' => 'itoOther','class' => 'form-control','placeholder' =>'Other','required' => 'required','value' => set_value('BreedOther'));
echo form_input($BreedOther);
echo form_error('BreedOther');
?>     <label for="BreedOther" class="error"></label>
                  </div>
                </div>


<h4 class="page-header">Place of posting</h4>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">State</label>
                  <div class="col-sm-9">

                 <?php  
                 $state = array();
                  $state[''] = '--Select--'; 
                 foreach ($statelist as $value) {
                   $state[$value->state] = $value->state;
                 }

/*newarea Textfield*/
 echo form_dropdown('state', $state, set_value('state',1),'id="state" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('state');
/*----End newarea Textfield----*/
 ?>
                    <label for="state" class="error"></label>
                  </div>
                </div> 
                  <div id="listing"></div> 




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
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),
  
  $("#state").change(function(){
    var state = $("#state").val();
    var dataStrings = 'state='+ state;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-st-aj",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#listing").html(html);
    }  
      
    });

    });

       $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

});
</script>
</body>
</html>