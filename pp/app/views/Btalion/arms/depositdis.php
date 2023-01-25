<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deposit District Ammunition</title>
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
      <h3> &nbsp;  &nbsp; Deposit District Ammunition</h3>
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

                  
                    <div class="form-group"  id="prac4">
                  <label class="col-sm-3 control-label">Name of District</label>
                  <div class="col-sm-9">
<?php
$nows = array();
                  $nows[''] = '--Select--'; 
                 foreach ($cities as $value) {
                   $nows[$value->city] = $value->city;
                 }
                 $nows['PPA/PHR'] = 'PPA/PHR';
                 $nows['JAHANKHELAN'] = 'JAHANKHELAN';
/*newarea Textfield*/
 echo form_dropdown('dist', $nows, set_value('dist',''),'id="dist" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('dist');
?>
                    <label for="dist" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="serv2">
                  <label class="col-sm-3 control-label">Type of bore</label>
                  <div class="col-sm-9">
             <?php 
                 $now = array();
                  $now[''] = '--Select--'; 
                 foreach ($weaponi as $value) {
                   $now[$value->bore.','.$value->arm] = 'Bore: '.$value->bore. '&nbsp; Arms: '.$value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('bore', $now, set_value('bore',''),'id="now" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bore');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>


                    <div class="form-group"  id="prac4">
                  <label class="col-sm-3 control-label">Empty Ammunition Quantity</label>
                  <div class="col-sm-9">
<?php
$eammu = array('type' => 'text','name' => 'eammu','id' => 'eammu','class' => 'form-control', 'required' => 'required', 'placeholder' =>'Ammunition Quantity','value' => set_value('eammu'));
echo form_input($eammu);
echo form_error('eammu');
?>
                    <label for="eammu" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="prac4">
                  <label class="col-sm-3 control-label">RC No</label>
                  <div class="col-sm-9">
<?php
$rcno = array('type' => 'text','name' => 'rcno','id' => 'rcno','class' => 'form-control', 'required' => 'required', 'placeholder' =>'RC No','value' => set_value('rcno'));
echo form_input($rcno);
echo form_error('rcno');
?>
                    <label for="rcno" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="serv6">
                  <label class="col-sm-3 control-label"> RC Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$rdate = array('type' => 'text','name' => 'rdate','id' => 'datepicker','class' => 'form-control','placeholder' =>'RC Date','value' => set_value('rdate'));
echo form_input($rdate);
echo form_error('rdate');
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

  $(function () {
    $("#clicks").click(function () {
        if ($("#clicks").is(':checked')) {
            $("#wep1a").prop("disabled", false);
            $("#wep1b").prop("disabled", false);
            $("#wep1c").prop("disabled", false);
            $("#wep1d").prop("disabled", false);
            $("#wep1e").prop("disabled", false);
        } else {
            $("#wep1a").prop("disabled", true);
            $("#wep1b").prop("disabled", true);
            $("#wep1c").prop("disabled", true);
            $("#wep1d").prop("disabled", true);
            $("#wep1e").prop("disabled", true);
        }
    });

    $("#clicksp").click(function () {
        if ($("#clicksp").is(':checked')) {
            $("#wep1ap").prop("disabled", false);
            $("#wep1bp").prop("disabled", false);
            $("#wep1cp").prop("disabled", false);
            $("#wep1dp").prop("disabled", false);
            $("#wep1ep").prop("disabled", false);
        } else {
            $("#wep1ap").prop("disabled", true);
            $("#wep1bp").prop("disabled", true);
            $("#wep1cp").prop("disabled", true);
            $("#wep1dp").prop("disabled", true);
            $("#wep1ep").prop("disabled", true);
        }
    });
});

$(document).on('change', '#dep', function() {
  if(this.value == 'Ammunition'){
    $('#am').show();
    $('#wep').hide();
    $('#wep1').hide();
    $('#wep2').hide();
    $('#wep3').hide();
    $('#wep4').hide();
    $('#wep5').hide();
    $('#wh').hide();
    $('#weps').hide();
    $('#whp,#wep1p,#wep2p,#wep3p,#wep4p,#wep5p').hide();
    
    }
  else if(this.value == 'Weapon'){
    $('#wep').show();
    $('#wep1').show();
    $('#wep2').show();
    $('#wep3').show();
    $('#wep4').show();
    $('#wep5').show();
    $('#wh').show();
    $('#weps').show();
    $('#whp,#wep1p,#wep2p,#wep3p,#wep4p,#wep5p').show();

    $('#am').hide();
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').hide();
    }
     
  });

 $(document).on('change', '#ammu', function() {
  if(this.value == 'Service'){
    $('#serv1').show();
    $('#serv2').show();
    $('#serv3').show();
    $('#serv4').show();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').show();
    }
  else if(this.value == 'Practice'){
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();
    
    $('#prac1').show();
    $('#prac2').show();
    $('#prac3').show();
    $('#prac4').show();

  }else{
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').hide();
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