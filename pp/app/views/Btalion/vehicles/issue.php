<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Duty Status</title>
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
      <h3>&nbsp; &nbsp; Duty Update</h3>
      
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

                   <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Issue mode</label>
                  <div class="col-sm-9">
                 <?php  
$moa = array('' => '--Select--', 'Permanent' =>'Permanent', 'Temporary' => 'Temporary');
/*newarea Textfield*/
 echo form_dropdown('moa', $moa, set_value('moa','Temporary'),'id="moa" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('moa');
/*----End newarea Textfield----*/
 ?>
                    <label for="moa" class="error"></label>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 control-label">Registration Number</label>
                  <div class="col-sm-9">
      <?php  
$rnum = array();
$rnum[''] = '--Select--';
                 foreach ($vichel as $value) {
                   $rnum[$value->mt_id] = $value->regnom;
                 }
/*newarea Textfield*/
 echo form_dropdown('rnum', $rnum, set_value('rnum',''),'id="rnum" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('rnum');
/*----End newarea Textfield----*/
 ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-3 control-label">Date of duty</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php
$Dateofduty = array('type' => 'text','name' => 'Dateofduty','id' => 'Dateofduty','class' => 'form-control','placeholder' =>'Date of duty','value' => set_value('Dateofduty'),'required' => 'required');
echo form_input($Dateofduty);
echo form_error('Dateofduty');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="Dateofduty" class="error"></label>
                  </div>
                </div> 
<!--
                <div class="form-group">
                  <label class="col-sm-3 control-label">If Previous Posting</label>
                  <div class="col-sm-9">
                 <input type="checkbox" name="abc" value="1"> 
                  </div>
                </div>-->


                <div class="form-group">
                  <label class="col-sm-3 control-label">Place of duty</label>
                  <div class="col-sm-9">
                 <?php  
$tpi = array('' => '--Select--', 'Self battalion' => 'Self battalion','Other Unit/Battalion' => 'Other Unit/Battalion', 'Institution Duty' => 'Institution Duty','District' => 'District', 'Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('tpii', $tpi, set_value('tpii',1),'id="tpii" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tpii');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpii" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="tpib" style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
                 <?php  
$tpi = array('' => '--Select--', 'MT Section' => 'MT Section','Office duty' => 'Office duty','Officer' => 'Officer','Law & duty' => 'Law & duty', 'Sports duty' => 'Sports duty','VIP Duty' => 'VIP Duty','Election duty' => 'Election duty','Ceremonial duty' => 'Ceremonial duty','General duty' => 'General duty', 'MT Traning' => 'MT Traning','Other state' => 'Other state');
/*newarea Textfield*/
 echo form_dropdown('tpi', $tpi, set_value('tpi',1),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div>



                 <div class="form-group" id="Otherstate1" style="display:none;">
                  <label class="col-sm-3 control-label">State</label>
                  <div class="col-sm-9">
                  <?php 
                 $state = array();
                  $state[''] = '--Select--'; 
                 foreach ($statelist as $value) {
                   $state[$value->state] = $value->state;
                 }

 ?>
                 <?php  
/*newarea Textfield*/
 echo form_dropdown('Otherstate', $state, set_value('Otherstate',354),'id="Otherstate" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Otherstate');
/*----End newarea Textfield----*/
 ?>     <label for="Otherstate" class="error"></label>
                  </div>
                </div> 

                
                  <div class="form-group" id="protectess" style="display:none;">
                  <label class="col-sm-3 control-label">Officer  Name</label>
                  <div class="col-sm-9">
                 <?php 
                 $lsd = array('type' => 'text','name' => 'oname','id' => 'ons','class' => 'form-control','placeholder' =>'Officer Name','value' => set_value('oname'));
echo form_input($lsd);
echo form_error('oname');
 ?>
                    <label for="nop" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="bats" style="display:none;">
                   <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
                 <?php  
                 $ito = array('' => '--Select--','7th BN. PAP' => '7th BN. PAP','9th BN. PAP' => '9th BN. PAP','13th BN.PAP' => '13th BN.PAP','27th BN.PAP' => '27th BN.PAP','36th BN.PAP' => '36th BN.PAP','75th BN.PAP' => '75th BN.PAP','80th BN.PAP' => '80th BN.PAP','82nd BN.PAP' => '82nd BN.PAP','RTC/PAP, JRC' => 'RTC/PAP, JRC','Control Room PAP' => 'Control Room PAP','ISTC/KPT.' => 'ISTC/KPT.','1st CDO BN. BHG, PTL' => '1st CDO BN. BHG, PTL','2nd CDO BN. BHG, PTL' => '2nd CDO BN. BHG, PTL','3rd CDO BN., Mohali' => '3rd CDO BN., Mohali','4th CDO BN., Mohali' => '4th CDO BN., Mohali','5th CDO BN. BHG, PTL' => '5th CDO BN. BHG, PTL','1st IRBn., PTL.' => '1st IRBn., PTL.','2nd IRBn., L/Kothi, SGR.' => '2nd IRBn., L/Kothi, SGR.','3rd IRBn., LDH' => '3rd IRBn., LDH','4th IRBn., KPT' => '4th IRBn., KPT','5th IRBn., ASR' => '5th IRBn., ASR', '6th IRBn., L/Kothi, SGR.' => '6th IRBn., L/Kothi, SGR.','7th IRBn., KPT' => '7th IRBn., KPT','CTC/BHG, PTL.' => 'CTC/BHG, PTL.','CCR/BHG, PTL.' => 'CCR/BHG, PTL.', 'PPA/PHR' => 'PPA/PHR','Jahan khelan' => 'Jahan khelan');
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',''),'id="ito" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>



                   <div class="form-group"  id="instone5" style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
 <?php  
$Institutionsti = array('' => '--Select--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','BUGGLER' => 'BUGGLER','T/A 7th Bn PAP for Driver Duty' => 'T/A 7th Bn PAP for Driver Duty','U/7th PAP for out Rider duty on Motor Cycle' => 'U/7th PAP for out Rider duty on Motor Cycle','M.T WORKSHOP U/7th BN PAP' => 'M.T WORKSHOP U/7th BN PAP','Security Wing PAP duty' => 'Security Wing PAP duty');
 echo form_dropdown('instone4', $Institutionsti, set_value('instone4',''),'id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('instone4');
 ?>
                    <label for="Institutionsti" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="dislist" style="display:none;">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                 <?php  
$it = array('' => '--Select--','Amritsar Commissionerate' => 'Amritsar Commissionerate','Amritsar Rural' => 'Amritsar Rural', 'Batala' => 'Batala', 'Gurdaspur' => 'Gurdaspur', 'Pathankot' => 'Pathankot','Tarn Taran' => 'Tarn Taran','Patiala' => 'Patiala','Sangrur' => 'Sangrur', 'Barnala' => 'Barnala','Rupnagar' => 'Rupnagar','S.A.S Nagar' => 'S.A.S Nagar','Fatehgarh Sahib' => 'Fatehgarh Sahib','Jalandhar Commissionerate' => 'Jalandhar Commissionerate','Jalandhar Rural' => 'Jalandhar Rural','Hoshiarpur' => 'Hoshiarpur','Kapurthala' => 'Kapurthala','Ludhiana Commissionerate' => 'Ludhiana Commissionerate','Ludhiana Rural' => 'Ludhiana Rural','Khanna' => 'Khanna','Shahid Bhagat Singh Nagar' => 'Shahid Bhagat Singh Nagar','Bathinda' => 'Bathinda','Mukatsar' => 'Mukatsar','Mansa' => 'Mansa','Ferozepur' => 'Ferozepur','Fazlika' => 'Fazlika','Moga' => 'Moga','Faridkot' => 'Faridkot','Vigilance Bureau' =>'Vigilance Bureau', 'CID' => 'CID','EXCISE' => 'EXCISE','NRI WING' => 'NRI WING');
/*newarea Textfield*/
 echo form_dropdown('district', $it, set_value('district',''),'id="district" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('district');
/*----End newarea Textfield----*/
 ?>
                    <label for="it" class="error"></label>
                  </div>
                </div> 




                <div class="form-group" id="duty_detail_ons">
                  <label class="col-sm-3 control-label">Duty details</label>
                  <div class="col-sm-9">
<?php
$lsd = array('type' => 'text','name' => 'lsd','id' => 'ons','class' => 'form-control','placeholder' =>'Duty details','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>

              


                  <div class="form-group" id="batslist">
                   <label class="col-sm-3 control-label">Select Battalion Driver</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array();
                    foreach ($unamelist as $value) {
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
                  <label class="col-sm-3 control-label">Driver Name</label>
                  <div class="col-sm-9">
                 <input type="text" id="search-box"  placeholder="Issued To" class = "form-control" />
                    <div id="suggesstion-box"></div>
                    <input type="hidden" name="issueto" id="idinfo" value=""/>
                  </div>
                </div> 

                  <div class="form-group" id="drvno"  style="display:none;">
                  <label class="col-sm-3 control-label"> RC/Voucher No</label>
                  <div class="col-sm-9">
<?php 
$rcvno = array('type' => 'text','name' => 'rcvno','id' => 'rcvno','class' => 'form-control','placeholder' =>'RC/Voucher No','value' => set_value('rcvno'));
echo form_input($rcvno);
echo form_error('rcvno');
?>
                    <label for="rcvno" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="drdate"  style="display:none;">
                  <label class="col-sm-3 control-label"> RC/Voucher Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php 
$rdate = array('type' => 'text','name' => 'rdate','id' => 'rdate','class' => 'form-control','value' => set_value('rdate'),'placeholder' => 'Receive Date');
echo form_input($rdate);
echo form_error('rdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <label for="rdate" class="error"></label>
                  </div>
                </div>
                  </div>

                   <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Speedometer Reading</label>
                  <div class="col-sm-9">
<?php
$spm = array('type' => 'text','name' => 'spm','id' => 'spm','class' => 'form-control','placeholder' =>'Speedometer Reading','value' => set_value('spm'));
echo form_input($spm);
echo form_error('spm');
?>
                    <label for="spm" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Order No.</label>
                  <div class="col-sm-9">
<?php
$lsd = array('type' => 'text','name' => 'orderno','id' => 'ons','class' => 'form-control','placeholder' =>'Order No','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('orderno');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php
$lid = array('type' => 'text','name' => 'lid','id' => 'lid','class' => 'form-control','placeholder' =>'Order Date','value' => set_value('lid'));
echo form_input($lid);
echo form_error('lid');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="lid" class="error"></label>
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
  }),jQuery('#lsd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#lid').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#rcd').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#rcdt').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#Dateofduty').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
    
	$(document).on('change', '#cnov', function() {
	if(this.value == 'On Road'){
		$('#two').hide();
		$('#one').show();
	}else{
    $('#one').hide();
    $('#two').show();
   }
});
$(document).ready(function(){
	var placeofduty = $('#tpii').val();
	switch(placeofduty){
		case 'Self battalion':
		{
			 $('#tpib').show();
			$('#bats').hide();
			$('#instone5').hide();
			
			if($('#tpi').val()=='Officer'){
				$('#protectess').show();
			}else if($('#tpi').val()=='Other state'){
				$('#Otherstate1').show();
			}
			break;
		}
		case 'Other Unit/Battalion':
		{
			$('#tpib').hide();
			$('#instone5').hide();
			$('#bats').show();
			break;
		}
		case 'Institution Duty':
		{
			$('#tpib').hide();
			$('#bats').hide();
			$('#instone5').show();
			break;
		}
		case 'District':
		{
			$('#dislist').show();
			$('#tpib').hide();
			$('#bats').hide();
			$('#instone5').hide();
			break;
		}
		case 'Other':
		{
			
			$('#tpib').hide();
			$('#bats').hide();
			$('#instone5').hide();
			break;
		}
		default:
		{
			
		}
	}
});
     $(document).on('change', '#tpi', function() {
  if(this.value == 'Driver'){
     $('#hol2').show();
     $('#protecte').hide();
     $('#protectess').hide();
     $('#bats').hide();
     $('#Otherstate1').hide();
   }
   else if(this.value == 'Officer'){
      $('#protecte').show();
      $('#protectess').show();
      $('#hol2').hide();
      $('#bats').hide();
      $('#Otherstate1').hide();
   }
   else if(this.value == 'Battalion'){
      $('#protecte').hide();
      $('#protectess').hide();
      $('#hol2').hide();
      $('#bats').show();
      $('#Otherbattalionorunit1').hide();
   }else if(this.value == 'Other battalion or unit'){
      $('#protecte').hide();
      $('#protectess').hide();
      $('#hol2').show();
       $('#bats').show();
  
       $('#Otherstate1').hide();
   }else if(this.value == 'Other state'){
      $('#protecte').hide();
      $('#protectess').hide();
      $('#hol2').hide();
      $('#Otherstate1').show();
      $('#Otherbattalionorunit1').hide();
   } 
   else{
     $('#hol2').hide();
     $('#protecte').hide();
     $('#protectess').hide();
     $('#bats').hide();
     $('#Otherbattalionorunit1').hide();
     $('#Otherstate1').hide();
   }
 });


     

      $(document).on('change', '#tpii', function() {
      if(this.value == 'Self battalion'){
        $('#tpib').show();
        $('#bats').hide();
        $('#instone5').hide();
       }else if(this.value == 'Other Unit/Battalion'){
        $('#tpib').hide();
        $('#instone5').hide();
         $('#bats').show();
       }else if(this.value == 'Institution Duty'){
        $('#tpib').hide();
        $('#bats').hide();
        $('#instone5').show();
       }else if(this.value == 'District'){
        $('#dislist').show();
        $('#tpib').hide();
        $('#bats').hide();
        $('#instone5').hide();
       }else{
		   $('#dislist').hide();
        $('#tpib').hide();
        $('#bats').hide();
        $('#instone5').hide();
       }
  
});


        $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

        $(document).on('change', '#tud', function() {
  if(this.value == 'District'){
    $('#dislist').show();
     $('#drvno').show();
     $('#drdate').show();

    }else{
      $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
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

});
</script>
</body>
</html>