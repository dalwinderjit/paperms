<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Issue Extra Magazine/Ammunition list</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <style type="text/css">
     .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
   </style>
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
      <h3> &nbsp;  &nbsp; Issue Extra Magazine/Ammunition list</h3>
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


             <div class="form-group" id="serv3">
                  <label class="col-sm-3 control-label">Issued Extra Magazine </label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$mags = array('type' => 'text','name' => 'mags','id' => 'mq','class' => 'form-control','value' => set_value('mags'), 'placeholder' => 'Magazine Qty');
echo form_input($mags);
 echo form_error('mags');
/*----End newarea Textfield----*/
 ?>
                    <label for="mags" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->


                    <div class="form-group"  id="serv5">
                  <label class="col-sm-3 control-label">Issued Extra Ammunition</label>
                  <div class="col-sm-9">
<?php
$amqunt = array('type' => 'text','name' => 'amqunt','id' => 'qw','class' => 'form-control', 'placeholder' =>'Ammunition Quantity','value' => set_value('amqunt'));
echo form_input($amqunt);
echo form_error('amqunt');
?>
                    <label for="amqunt" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="serv6">
                  <label class="col-sm-3 control-label"> Issue Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$odate = array('type' => 'text','name' => 'odate','id' => 'datepicker','class' => 'form-control','placeholder' =>'Issue Date','value' => set_value('odate'));
echo form_input($odate);
echo form_error('odate');
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
  }), // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepickeri').datepicker({dateFormat: "dd/mm/yy"});
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
    $('#serv1').show();
    $('#serv2').show();
    $('#serv3').show();
    $('#serv4').show();
    $('#serv5').show();
    $('#serv6').show();
    $('#serv7').show();
    $('#serv8').show();
    $('#typeof').show();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').hide();
    $('#prac5').hide();
    $('#prac6').hide();
    $('#prac7').hide();
    $('#prac8').hide();
    $('#prac9').hide();
    $('#prac10').hide();
    }
  else if(this.value == 'Practice'){
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();
    $('#serv5').hide();
    $('#serv6').hide();
    $('#serv7').hide();
    $('#serv8').hide();
    $('#typeof').hide();

    $('#prac1').show();
    $('#prac2').show();
    $('#prac3').show();
    $('#prac4').show();
    $('#prac5').show();
    $('#prac6').show();
    $('#prac7').show();
    $('#prac8').show();
    $('#prac9').show();
    $('#prac10').show();

  }else{
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();
    $('#serv5').hide();
    $('#serv6').hide();
    $('#serv7').hide();
    $('#serv8').hide();
    $('#typeof').hide();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').hide();
    $('#prac5').hide();
    $('#prac6').hide();
    $('#prac7').hide();
    $('#prac8').hide();
    $('#prac9').hide();
    $('#prac10').hide();
  }
     
  });

   $(document).on('change', '#towep', function() {
      if(this.value == 'Nill'){
     $('#prac2').hide();
     $('#prac3').hide();
   }else{
    $('#prac2').show();
     $('#prac3').show();
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

    $("#bdn").change(function(){
    var bodyno = $("#bdn").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-checkarm",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#listing").html(html);
    }  
      
    });

    });
     });

    $(document).ready(function() {

    $("#towep").change(function(){
    var bodyno = $("#towep").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-checkarm",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#towbody").html(html);
    }  
      
    });

    });
     });


    // AJAX call for autocomplete 
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "<?php echo base_url('bt-issueholder-name'); ?>",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");

    }
    });
  });
});
//To select country name
$(document).on( "click","[id^=a]",function () {
var Input = $(this).data('input');
$("#search-box").val( $('#a'+Input).text());
$("#idinfo").val(Input);
$("#suggesstion-box").hide();
});


$(document).ready(function() {

    $("#isutodsi").change(function(){
    var bodyno = $("#isutodsi").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-issueholder-namelist",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#nameofisu").html(html);
    }  
      
    });

    });
     });


});
</script>
</body>
</html>