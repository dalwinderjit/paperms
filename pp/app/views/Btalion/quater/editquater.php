<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Quarter Info</title>
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
      <h2><i class="fa fa-building-o"></i>Add Quarter Info</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">Add Quarter Info</li>
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
                <h4 class="panel-title">Add Quarter Info</h4>
              </div>
              <div class="panel-body">

                    <div class="form-group">
                  <label class="col-sm-3 control-label">Floor</label>
                  <div class="col-sm-9">
                 <?php  
$floor = array('' => '--Select--', 'Ground floor' => 'Ground floor','1st floor' => '1st floor','2nd floor' => '2nd floor','3rd floor' => '3rd floor','4th floor' => '4th floor');
/*newarea Textfield*/
 echo form_dropdown('floor', $floor, set_value('floor',$qu->floor),'id="floor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('floor');
/*----End newarea Textfield----*/
 ?>
                    <label for="floor" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Electricity Meter No</label>
                  <div class="col-sm-9">
                 <?php
$emn = array('type' => 'text','name' => 'emn','id' => 'emn','class' => 'form-control','placeholder' =>'Electricity Meter No','value' => $qu->electricty_meter_no);
echo form_input($emn);
echo form_error('emn');
?>     <label for="emn" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Condition</label>
                  <div class="col-sm-9">
                      <?php  
$Condition = array('' => '--Select--', 'Good' => 'Good','Normal' => 'Normal','Bad ' => 'Bad','Unlivable' => 'Unlivable');
/*newarea Textfield*/
 echo form_dropdown('Condition', $Condition, set_value('Condition',$qu->conditionss),'id="Condition" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('Condition');
/*----End newarea Textfield----*/
 ?>    <label for="Condition" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Add Status</label>
                  <div class="col-sm-9">
                 <?php
$stats = array('' => '--Select--', 'Vacant' => 'Vacant','Occupation' => 'Occupation');
/*newarea Textfield*/
 echo form_dropdown('stats', $stats, set_value('stats',1),'id="stats" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('stats');
/*----End newarea Textfield----*/
?>     <label for="stats" class="error"></label>
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
                    $ito = array('' => '--Select--','7th BN. PAP' => '7th BN. PAP','9th BN. PAP' => '9th BN. PAP','13th BN.PAP' => '13th BN.PAP','27th BN.PAP' => '27th BN.PAP','36th BN.PAP' => '36th BN.PAP','75th BN.PAP' => '75th BN.PAP','80th BN.PAP' => '80th BN.PAP','82nd BN.PAP' => '82nd BN.PAP','RTC/PAP, JRC' => 'RTC/PAP, JRC','Control Room PAP' => 'Control Room PAP','ISTC/KPT.' => 'ISTC/KPT.','1st CDO BN. BHG, PTL' => '1st CDO BN. BHG, PTL','2nd CDO BN. BHG, PTL' => '2nd CDO BN. BHG, PTL','3rd CDO BN., Mohali' => '3rd CDO BN., Mohali','4th CDO BN., Mohali' => '4th CDO BN., Mohali','5th CDO BN. BHG, PTL' => '5th CDO BN. BHG, PTL','1st IRBn., PTL.' => '1st IRBn., PTL.','2nd IRBn., L/Kothi, SGR.' => '2nd IRBn., L/Kothi, SGR.','3rd IRBn., LDH' => '3rd IRBn., LDH','4th IRBn., KPT' => '4th IRBn., KPT','5th IRBn., ASR' => '5th IRBn., ASR', '6th IRBn., L/Kothi, SGR.' => '6th IRBn., L/Kothi, SGR.','7th IRBn., KPT' => '7th IRBn., KPT','CTC/BHG, PTL.' => 'CTC/BHG, PTL.','CCR/BHG, PTL.' => 'CCR/BHG, PTL.', 'PPA/PHR' => 'PPA/PHR','Jahan khelan' => 'Jahan khelan');
                    
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
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  })
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