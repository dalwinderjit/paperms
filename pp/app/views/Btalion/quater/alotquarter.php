<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Allot Quarter Info</title>
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
      <h3> &nbsp;  &nbsp; Allot Quarter Info</h3>
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
                  <label class="col-sm-3 control-label">Quarter No:</label>
                  <div class="col-sm-9">
                 <?php  
$hn = array();
$hn[''] = '--Select--';
 foreach ($qu as $value) {
   $hn[$value->quart_id] = 'Quarter No: '. $value->qtrno. '&nbsp; Floor: '. $value->flor. '&nbsp; Accommodation type:'. $value->accomdationtype. '&nbsp; Location: '. $value->location;
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
                  <label class="col-sm-3 control-label">Condition</label>
                  <div class="col-sm-9">
                      <?php  
$Condition = array('' => '--Select--', 'Good' => 'Good','Normal' => 'Normal','Bad ' => 'Bad','Unlivable' => 'Unlivable');
/*newarea Textfield*/
 echo form_dropdown('Condition', $Condition, set_value('Condition',1),'id="floor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('Condition');
/*----End newarea Textfield----*/
 ?>    <label for="Condition" class="error"></label>
                  </div>
                </div>

                 



                 <!--div class="form-group" id="batslist">
                   <label class="col-sm-3 control-label">Issue to</label>
                  <div class="col-sm-9">
                 <!--?php  
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
                  <label class="col-sm-3 control-label">Name of Offical</label>
                  <div class="col-sm-9">
                 <input type="text" id="search-box"  placeholder="Issued To" class = "form-control" />
                    <div id="suggesstion-box"></div>
                    <input type="hidden" name="nop" id="idinfo" value=""/>
                  </div>
                </div>

               
       <!-- <div class="form-group" id="Issuedtoc1">
                  <label class="col-sm-3 control-label">Name of official</label>
                  <div class="col-sm-9">

                 <?php 
                 /*$nop = array();
                 $nop[] = '--Name of official--';
                 foreach ($body as $value) {
                   $nop[$value->man_id] = 'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno.'&nbsp; Contact No: '.$value->phono1;
                 } */
/*newarea Textfield*/
 /*echo form_dropdown('nop', $nop, set_value('nop',''),'id="nop" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nop');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="nop" class="error"></label>
                  </div>
                </div> -->


                 <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Allotee</label>
                  <div class="col-sm-9">
                 <?php
$Otheradd = array('type' => 'text','name' => 'Otheradd','id' => 'alor','class' => 'form-control','placeholder' =>'Type Name of Allotee','value' => set_value('Otheradd'));
echo form_input($Otheradd);
echo form_error('Otheradd');
?>     <label for="alor" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Designation (e.g Rank)</label>
                  <div class="col-sm-9">
                 <?php
$rankss = array('type' => 'text','name' => 'rankss','id' => 'rankss','class' => 'form-control','placeholder' =>'Rank','value' => set_value('rankss'));
echo form_input($rankss);
echo form_error('rankss');
?>     <label for="alor" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Regt No:</label>
                  <div class="col-sm-9">
                 <?php
$regt = array('type' => 'text','name' => 'regt','id' => 'regt','class' => 'form-control','placeholder' =>'Regt No:','required' => 'required','value' => set_value('regt'));
echo form_input($regt);
echo form_error('regt');
?>     <label for="regt" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Contact No:</label>
                  <div class="col-sm-9">
                 <?php
$contactno = array('type' => 'text','name' => 'contactno','id' => 'contactno','class' => 'form-control','placeholder' =>'Contact No:','required' => 'required','value' => set_value('contactno'));
echo form_input($contactno);
echo form_error('contactno');
?>     <label for="contactno" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Battalion/Unit of Allotee</label>
                  <div class="col-sm-9">
                      <?php  
$bua = array('' => '--Select--', 'Battalion/Unit' => 'Battalion/Unit','District' => 'District','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('bua', $bua, set_value('bua',''),'id="bua" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('bua');
/*----End newarea Textfield----*/
 ?>    <label for="bua" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="bbatslist" style="display: none;">
                   <label class="col-sm-3 control-label">Battalion/Unit</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array('' => '--Select--','7th BN. PAP' => '7th BN. PAP','9th BN. PAP' => '9th BN. PAP','13th BN.PAP' => '13th BN.PAP','27th BN.PAP' => '27th BN.PAP','36th BN.PAP' => '36th BN.PAP','75th BN.PAP' => '75th BN.PAP','80th BN.PAP' => '80th BN.PAP','82nd BN.PAP' => '82nd BN.PAP','RTC/PAP, JRC' => 'RTC/PAP, JRC','Control Room PAP' => 'Control Room PAP','ISTC/KPT.' => 'ISTC/KPT.','1st CDO BN. BHG, PTL' => '1st CDO BN. BHG, PTL','2nd CDO BN. BHG, PTL' => '2nd CDO BN. BHG, PTL','3rd CDO BN., Mohali' => '3rd CDO BN., Mohali','4th CDO BN., Mohali' => '4th CDO BN., Mohali','5th CDO BN. BHG, PTL' => '5th CDO BN. BHG, PTL','1st IRBn., PTL.' => '1st IRBn., PTL.','2nd IRBn., L/Kothi, SGR.' => '2nd IRBn., L/Kothi, SGR.','3rd IRBn., LDH' => '3rd IRBn., LDH','4th IRBn., PTK' => '4th IRBn., PTK','5th IRBn., ASR' => '5th IRBn., ASR', '6th IRBn., L/Kothi, SGR.' => '6th IRBn., L/Kothi, SGR.','7th IRBn., KPT' => '7th IRBn., KPT','CTC/BHG, PTL.' => 'CTC/BHG, PTL.','CCR/BHG, PTL.' => 'CCR/BHG, PTL.', 'PPA/PHR' => 'PPA/PHR','Jahan khelan' => 'Jahan khelan');
                    
/*newarea Textfield*/
 echo form_dropdown('bbatslist', $ito, set_value('bbatslist',''),'id="batslis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('bbatslist');
/*----End newarea Textfield----*/
 ?>
                    <label for="batslist" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="bdistrict"  style="display: none;">
                   <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                  <?php  
                    $ito = array('' => '--Select--','Amritsar Commissionerate' => 'Amritsar Commissionerate','Amritsar Rural' => 'Amritsar Rural', 'Batala' => 'Batala', 'Gurdaspur' => 'Gurdaspur', 'Pathankot' => 'Pathankot','Tarn Taran' => 'Tarn Taran','Patiala' => 'Patiala','Sangrur' => 'Sangrur', 'Barnala' => 'Barnala','Rupnagar' => 'Rupnagar','S.A.S Nagar' => 'S.A.S Nagar','Fatehgarh Sahib' => 'Fatehgarh Sahib','Jalandhar Commissionerate' => 'Jalandhar Commissionerate','Jalandhar Rural' => 'Jalandhar Rural','Hoshiarpur' => 'Hoshiarpur','Kapurthala' => 'Kapurthala','Ludhiana Commissionerate' => 'Ludhiana Commissionerate','Ludhiana Rural' => 'Ludhiana Rural','Khanna' => 'Khanna','Shahid Bhagat Singh Nagar' => 'Shahid Bhagat Singh Nagar','Bathinda' => 'Bathinda','Mukatsar' => 'Mukatsar','Mansa' => 'Mansa','Ferozepur' => 'Ferozepur','Fazlika' => 'Fazlika','Moga' => 'Moga','Faridkot' => 'Faridkot','Vigilance Bureau' =>'Vigilance Bureau', 'CID' => 'CID','EXCISE' => 'EXCISE','NRI WING' => 'NRI WING');
                    
/*newarea Textfield*/
 echo form_dropdown('statelist', $ito, set_value('statelist',''),'id="statelist" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('statelist');
/*----End newarea Textfield----*/
?>
                    <label for="statelist" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="bother"  style="display: none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                 <?php
$otherinfo = array('type' => 'text','name' => 'otherinfo','id' => 'otherinfo','class' => 'form-control','placeholder' =>'Other','value' => set_value('otherinfo'));
echo form_input($otherinfo);
echo form_error('otherinfo');
?>     <label for="alor" class="error"></label>
                  </div>
                </div>


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Present Posting details</label>
                  <div class="col-sm-9">
                 <?php
$posd = array('type' => 'text','name' => 'posd','id' => 'posd','class' => 'form-control','placeholder' =>'Present Posting details','required' => 'required','value' => set_value('posd'));
echo form_input($posd);
echo form_error('posd');
?>     <label for="posd" class="error"></label>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 control-label">Mode</label>
                  <div class="col-sm-9">
                      <?php  
$bb = array('' => '--Select--', 'Temporary' => 'Temporary','Permanent' => 'Permanent');
/*newarea Textfield*/
 echo form_dropdown('bb', $bb, set_value('bb',1),'id="bb" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('bb');
/*----End newarea Textfield----*/
 ?>    <label for="bb" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Allotment order</label>
                  <div class="col-sm-9">
                 <?php
$alor = array('type' => 'text','name' => 'alor','id' => 'alor','class' => 'form-control','placeholder' =>'Allotment order','required' => 'required','value' => set_value('alor'));
echo form_input($alor);
echo form_error('alor');
?>     <label for="alor" class="error"></label>
                  </div>
                </div>  

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Allotment Date</label>
                  <div class="col-sm-9">
                     <div class="input-group">
<?php
$alldate = array('type' => 'text','name' => 'alldate','id' => 'alldate','class' => 'form-control','placeholder' =>'Allotment Date','required' => 'required','value' => set_value('alldate'));
echo form_input($alldate);
echo form_error('alldate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="alldate" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Occupied  Date</label>
                  <div class="col-sm-9">
                     <div class="input-group">
  <?php
$od = array('type' => 'text','name' => 'od','id' => 'od','class' => 'form-control','placeholder' =>'Occupied  Date','required' => 'required','value' => set_value('od'));
echo form_input($od);
echo form_error('od');
?>  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="od" class="error"></label>
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
  }),jQuery('#alldate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#od').datepicker({dateFormat: "dd/mm/yy"});
      $(document).on('click', '#showi', function() {
  $('#Issuedtoc1').show();
  $('#Issuedtoc2').hide();
  
});

  $(document).on('click', '#showi2', function() {
  $('#Issuedtoc2').show();
  $('#Issuedtoc1').hide();
  
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

 $(document).on('change', '#bua', function() {
  if(this.value == 'Battalion/Unit'){
    $('#bbatslist').show();
    $('#bdistrict').hide();
    $('#bother').hide();

    }else if(this.value == 'District'){
      $('#bdistrict').show();
      $('#bbatslist').hide();
      $('#bother').hide();

    }else if(this.value == 'Other'){
      $('#bother').show();
      $('#bbatslist').hide();
      $('#bdistrict').hide();

    }else{
      $('#bbatslist').hide();
      $('#bdistrict').hide();
      $('#bother').hide();
    }
  });

</script>
</body>
</html>