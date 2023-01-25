<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Alott Horse Info</title>
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
      <h2><i class="fa fa-building-o"></i>Alott Horse Info</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">Alott Horse Info</li>
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
                <h4 class="panel-title">Alott Horse Info</h4>
              </div>
              <div class="panel-body">

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Horse Name:</label>
                  <div class="col-sm-9">
                 <?php  
$hn = array();
$hn[''] = '--Select--';
                 foreach ($horse as $value) {
                   $hn[$value->horse_id] = $value->horse_name;
                 }
/*newarea Textfield*/
 echo form_dropdown('hid', $hn, set_value('hid',''),'id="hid" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('hid');
/*----End newarea Textfield----*/
 ?>
                    <label for="hid" class="error"></label><p id="link"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Select a Rider</label>
                  <div class="col-sm-9">
                 <?php  
$tpi = array('' => '--Select--', 'Rider' => 'Rider','Battalion' => 'Battalion');
/*newarea Textfield*/
 echo form_dropdown('tpi', $tpi, set_value('tpi',1),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="batslist" >
                   <label class="col-sm-3 control-label">Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array();
                    foreach ($unamei as $value) {
                      $ito[''] = '--Select--';
                      $ito[$value->users_id] = $value->nick;
                    }
/*newarea Textfield*/
 echo form_dropdown('batslist', $ito, set_value('batslist',''),'id="batslis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('batslist');
/*----End newarea Textfield----*/
 ?>
                    <label for="batslist" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="serv7">
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <input type="text" id="search-box"  placeholder="Issued To" class = "form-control" />
                    <div id="suggesstion-box"></div>
                    <input type="hidden" name="hn" id="idinfo" value=""/>
                  </div>
                </div>

    
                  
                  <div class="form-group" id="bats" style="display:none;">
                   <label class="col-sm-3 control-label">Name of Battalion</label>
                  <div class="col-sm-9">
                 <?php 
                 $ito = array('' => '--Select--','7-PAP' => '7-PAP','9-PAP' => '9-PAP', '13-PAP' => '13-PAP','27-PAP' => '27-PAP','36-PAP' => '36-PAP','75-PAP' => '75-PAP','80-PAP' => '80-PAP','82-PAP' => '82-PAP', 'CCR' => 'CCR', 'CR-PAP' => 'CR-PAP','RTC-PAP' => 'RTC-PAP','ISTC-KPT' => 'ISTC-KPT','CTC-PTL' => 'CTC-PTL','CONTROL-ADGP' => 'CONTROL-ADGP','CSO' => 'CSO','1-CDO' => '1-CDO','2-CDO' => '2-CDO', '3-CDO' => '3-CDO', '4-CDO' => '4-CDO','5-CDO' => '5-CDO','1-IRB' => '1-IRB','2-IRB' => '2-IRB', '3-IRB' => '3-IRB', '4-IRB' => '4-IRB','5-IRB' => '5-IRB','6-IRB' => '6-IRB', '7-IRB'); 
                
                
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',''),'id="ito" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

             

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Alottment mode</label>
                  <div class="col-sm-9">
                 <?php  
$am = array('' => '--Select--', 'Temporary' => 'Temporary','Permanent' => 'Permanent');
/*newarea Textfield*/
 echo form_dropdown('hids', $am, set_value('hids',''),'id="hids" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('hids');
/*----End newarea Textfield----*/
 ?>
                    <label for="hids" class="error"></label><p id="link"></p>
                  </div>
                </div>


                   <div class="form-group blockset">
                  <label class="col-sm-3 control-label">Type of Duty</label>
                  <div class="col-sm-9">
                <?php  
$pd = array('' => '--Select--',  'Sports' => 'Sports','Law & order duty' => 'Law & order duty','Ceremonial Duty ' => 'Ceremonial Duty', 'Training duty' => 'Training duty','Unfit for Duty' => 'Unfit for Duty');
/*newarea Textfield*/
 echo form_dropdown('pd', $pd, set_value('pd',''),'id="pd" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('pd');
/*----End newarea Textfield----*/
 ?>     <label for="pd" class="error"></label>
                  </div>
                </div>

                 <div class="form-group blockset">
                  <label class="col-sm-3 control-label">Present Posting Location</label>
                  <div class="col-sm-9">
                 <?php
$ppl = array('type' => 'text','name' => 'ppl','id' => 'ppl','class' => 'form-control','placeholder' =>'Present Posting Location','required' => 'required','value' => set_value('ppl'));
echo form_input($ppl);
echo form_error('ppl');
?>     <label for="ppl" class="error"></label>
                  </div>
                </div>  

                 <div class="form-group blockset">
                  <label class="col-sm-3 control-label">Posting order No</label>
                  <div class="col-sm-9">
                 <?php
$pon = array('type' => 'text','name' => 'pon','id' => 'pon','class' => 'form-control','placeholder' =>'Posting order No','value' => set_value('pon'));
echo form_input($pon);
echo form_error('pon');
?>     <label for="pon" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group blockset">
                  <label class="col-sm-3 control-label">Posting Order Date</label>
                  <div class="col-sm-9">
                   <div class="input-group">
                 <?php
$pod = array('type' => 'text','name' => 'pod','id' => 'pod','class' => 'form-control','placeholder' =>'Posting Order Date','value' => set_value('pod'));
echo form_input($pod);
echo form_error('pod');
?> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>    <label for="pod" class="error"></label>
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
  }),jQuery('#pod').datepicker({dateFormat: "dd/mm/yy"});$(document).on('change', '#tpi', function() {
  if(this.value == 'Rider'){
     $('#protecte').hide();
     $('#bats').hide();
     $('#hol').show();
   }
   else if(this.value == 'Officer'){
      $('#protecte').show();
      $('#bats').hide();
      $('#hol').hide();
   }
   else if(this.value == 'Battalion'){
      $('#protecte').hide();
      $('#bats').show();
      $('#hol').hide();
   }

 });


  $(document).on('change', '#ito', function() {
  if(this.value == 'Other'){
     $('#rnOthers11').show();
   }else{
    $('#rnOthers11').hide();
   }
});

      $(document).ready(function() {

    $("#batslis").change(function(){
    var bodyno = $("#batslis").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-blist",
    data: dataStrings,
    cache: false,
    success: function(html){
      
    }  
      
    });

    });
     });

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
});
</script>
</body>
</html>