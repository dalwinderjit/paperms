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
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3>&nbsp; &nbsp; Issue Ammunition (Service)</h3>
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
              <div class="panel-body">
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition weapon</label>
                  <div class="col-sm-9">
             <?php 
                 $now = array();
                  $now[''] = '--Select--'; 
                 foreach ($weapon as $value) {
                   $now[$value->nwep_id.','.$value->bore.','.$value->arm] = $value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('now', $now, set_value('now',''),'id="now" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('now');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

               <div id="listing"></div>

    <!--  <div class="form-group">
                  <label class="col-sm-3 control-label">Type of Ammunition</label>
                  <div class="col-sm-9">
                 <?php  
/*$tp = array('' => '--Select--','Service' => 'Service', 'Practice' => 'Practice');
/*newarea Textfield*/
/* echo form_dropdown('tp', $tp, set_value('tp',''),'id="tp" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('tp');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="tp" class="error"></label>
                  </div>
                </div>  -->

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
                  <label class="col-sm-3 control-label">Order By </label>
                  <div class="col-sm-9">
<?php
$acc = array('type' => 'text','name' => 'acc','id' => 'acc','class' => 'form-control','placeholder' =>'Order By','value' => set_value('acc'));
echo form_input($acc);
echo form_error('acc');
?>
                    <label for="acc" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Order no.</label>
                  <div class="col-sm-9">
<?php
$acc00 = array('type' => 'text','name' => 'acc00','id' => 'acc00','class' => 'form-control','placeholder' =>'Order no.','value' => set_value('acc00'));
echo form_input($acc00);
echo form_error('acc00');
?>
                    <label for="acc00" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label"> Order no. date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$odate = array('type' => 'text','name' => 'odate','id' => 'odate','class' => 'form-control','placeholder' =>'Order no. date','value' => set_value('odate'));
echo form_input($odate);
echo form_error('odate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="odate" class="error"></label>

                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->
                      <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$ab = array('type' => 'text','name' => 'ab','id' => 'ab','class' => 'form-control','placeholder' =>'Quantity','required' => 'required','value' => set_value('ab'));
echo form_input($ab);
echo form_error('ab');
?>
                    <label for="ab" class="error"></label>
                  </div>
                </div>

 <div class="form-group" id="Issuedto1">
                  <label class="col-sm-3 control-label">Issued to</label>
                  <div class="col-sm-9">
                <input type="radio" name="click1" id="showi">  Holder Name

                 <input type="radio" name="click1" id="showi3"> Battalion/Unit 

                  <input type="radio" name="click1" id="showi4"> Nodal Battalion 
                 </div></div>
                               <div class="form-group"  id="Issuedtoc1" style="display:none;">
                  <label class="col-sm-3 control-label">Holder Name</label>
                  <div class="col-sm-9">
                 <?php  
$hn = array();
$hn[''] = '--Select--';
                 foreach ($body as $value) {
                   $hn[$value->man_id] =  'Name: '.$value->name.' &nbsp; Battalion: '.$value->battalion. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno.'&nbsp; Contact No: '.$value->phono1;
                 }
/*newarea Textfield*/
 echo form_dropdown('hn', $hn, set_value('hn',''),'id="hn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('hn');
/*----End newarea Textfield----*/
 ?>
                    <label for="hn" class="error"></label>
                  </div>
                </div> 

  <div class="form-group"  id="Issuedtoc3" style="display:none;">
                   <label class="col-sm-3 control-label">Battalion/Unit</label>
                  <div class="col-sm-9">
                 <?php  
                 $ito = array(); 
                 $ito[''] = 'Select a Battalion';
                 foreach ($uname as $value) {
                   $ito[$value->users_id] = $value->nick;
                 } 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                        
                
                 <div class="form-group"  id="Issuedtoc4" style="display:none;">
                   <label class="col-sm-3 control-label">Nodal Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                 $nito = array(); 
                 $nito[''] = 'Select a Battalion';
                 foreach ($uname as $value) {
                   $nito[$value->users_id] = $value->nick;
                 } 
/*newarea Textfield*/
 echo form_dropdown('nito', $nito, set_value('nito',1),'id="nito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nito');
/*----End newarea Textfield----*/
 ?>
                    <label for="nito" class="error"></label>
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
  // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#odate').datepicker({dateFormat: "dd/mm/yy"});
    $(document).ready(function() {

    $("#bodyno").change(function(){
    var bodyno = $("#bodyno").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-ammu-ajs",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#listing").html(html);
    }  
      
    });

    });
     });

        $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});



        $(document).on('change', '#nito', function() {
      if(this.value == 'Other'){
     $('#nitoOther1').show();
   }else{
    $('#nitoOther1').hide();
   }
  
});

          $(document).on('click', '#showi', function() {
  $('#Issuedtoc1').show();
  $('#Issuedtoc2').hide();
   $('#Issuedtoc3').hide();
    $('#Issuedtoc4').hide();
    $('#nitoOther1').hide();
    $('#itoOther1').hide();
  
});

  $(document).on('click', '#showi2', function() {
  $('#Issuedtoc2').show();
   $('#Issuedtoc1').hide();
   $('#Issuedtoc3').hide();
    $('#Issuedtoc4').hide();
    $('#nitoOther1').hide();
    $('#itoOther1').hide();
  
});

  $(document).on('click', '#showi3', function() {
  $('#Issuedtoc3').show();
   $('#Issuedtoc1').hide();
   $('#Issuedtoc2').hide();
    $('#Issuedtoc4').hide();
    $('#nitoOther1').hide();
  
});

    $(document).on('click', '#showi4', function() {
  $('#Issuedtoc4').show();
   $('#Issuedtoc1').hide();
   $('#Issuedtoc2').hide();
    $('#Issuedtoc3').hide();
    $('#itoOther1').hide();
  
});

});
</script>
</body>
</html>