<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Temporary Duty</title>
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
      <h3> &nbsp;  &nbsp; Temporary Duty</h3>
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

                  <div class="form-group" id="protecte">
                  <label class="col-sm-3 control-label">Man Power</label>
                  <div class="col-sm-9">
                 <?php 
                 $nop = array();
                 foreach ($body as $value) {
                   $nop[$value->man_id] = 'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno;
                 }
/*newarea Textfield*/
 echo form_dropdown('nop[]', $nop, set_value('nop',''),'id="nop" data-placeholder="Choose One" title="Please select at least 1 area" multiple class="select2"'); 
 echo form_error('nop');
/*----End newarea Textfield----*/
 ?>
                    <label for="nop" class="error"></label><p id="links"></p>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Posting Info</label>
                  <div class="col-sm-9">
<?php
$acc = array('type' => 'text','name' => 'acco','id' => 'acc','class' => 'form-control','value' => set_value('acc'));
echo form_input($acc);
echo form_error('acc');
?>
                    <label for="acc" class="error"></label>
                  </div>
                </div>

              

                 <div class="form-group">
                  <label class="col-sm-3 control-label"> Start Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$idate = array('type' => 'text','name' => 'idate','id' => 'datepicker','class' => 'form-control','value' => set_value('idate'));
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
                  <label class="col-sm-3 control-label"> End Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$odate = array('type' => 'text','name' => 'odate','id' => 'odate','class' => 'form-control','value' => set_value('odate'));
echo form_input($odate);
echo form_error('odate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="odate" class="error"></label>

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
  }), // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#odate').datepicker({dateFormat: "dd/mm/yy"});
   $(document).on('change', '#it', function() {
  if(this.value == 'Gunman'){
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#one').show();
     $('#protecte').hide();
     $('#hol').show();
     $('#bats').hide();
     $('#itoOther1').hide();
      $('#typeof').show();
      $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide();
    $('#cr1').hide();
   }else if(this.value == 'Guard'){
     $('#one').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').show();
     $('#two').show();
     $('#bats').hide();
     $('#itoOther1').show();
     $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide();
    $('#cr1').hide();
   }else if(this.value == 'Temp Duty'){
     $('#one').hide();
     $('#two').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').show();
     $('#three').show();
     $('#bats').hide();
     $('#itoOther1').hide();
     $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide();
    $('#cr1').hide();
   }else if(this.value == 'Company'){
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#five').hide();
     $('#protecte').show();
     $('#hol').hide();
     $('#four').show();
     $('#six').show();
     $('#bats').hide();
     $('#itoOther1').hide();
     $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide();
    $('#cr1').hide();
   }else if(this.value == 'Police Officer'){
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#six').hide();
     $('#five').show();
     $('#protecte').show();
     $('#hol').hide();
     $('#bats').hide
     $('#itoOther1').hide();
     $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide(); $('#cr1').hide();   }
   else if(this.value == 'Battalion'){
     $('#typeof').hide();
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').show();
     $('#bats').show();
    $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide(); 
    $('#cr1').hide(); 
   }else if(this.value == 'ARP'){
     $('#arp1').show();
      $('#ssg1').hide();
     $('#sdrf1').hide();
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').hide();
     $('#bats').hide(); 
     $('#typeof').hide();
     $('#cr1').hide(); 
   }else if(this.value == 'SSG'){
     $('#ssg1').show();
     $('#sdrf1').hide();
      $('#arp1').hide();
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').hide();
     $('#bats').hide(); 
     $('#typeof').hide(); 
     $('#cr1').hide();
   }else if(this.value == 'SDRF'){
      $('#sdrf1').show();
      $('#ssg1').hide();
      $('#arp1').hide();
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').hide();
     $('#bats').hide(); 
     $('#typeof').hide(); 
     $('#cr1').hide();
   }else if(this.value == 'Other'){
     $('#itoOther1').show();
      $('#sdrf1').hide();
      $('#ssg1').hide();
      $('#arp1').hide();
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').hide();
     $('#bats').hide(); 
     $('#typeof').hide(); 
     $('#cr1').hide();
   }
   else if(this.value == 'Control Room'){
    $('#cr1').show();
      $('#sdrf1').hide();
      $('#ssg1').hide();
      $('#arp1').hide();
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').hide();
     $('#bats').hide(); 
     $('#typeof').hide(); 
   }




});


 $(document).on('change', '#ammu', function() {
  if(this.value == 'Service'){
    $('#quntity').show();
    }
  else if(this.value == 'Practice'){
    $('#quntity').show();
  }else{
    $('#quntity').hide();
  }
     
  });
    $(document).on('change', '#todfi', function() {
      if(this.value == ''){
   $( "#link" ).html('');
   $( "#links" ).html('');
   }
  if(this.value == 'Commadent75 Btn'){
   $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'Ass.Commandent.75 Btn'){
     $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'D.S.P 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'Insp 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'N.G.O'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'O.R 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }
});

     $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

  $(document).on('click', '#showi', function() {
   $('#serviammu1').show();
   $('#part2').hide();
});

      $(document).click('#showi2', function() {
        $('#part2').show();
        $('#serviammu1').hide();
      });


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