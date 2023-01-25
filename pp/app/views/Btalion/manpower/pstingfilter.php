<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Posting Info</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
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
      <h3> &nbsp;  &nbsp; Posting Info</h3>
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
                  <label class="col-sm-3 control-label">Posting Detail </label>
                  <div class="col-sm-9">
                 <?php  
$Postingtiset = array('0' => '--Select--','' => 'All', 'Fix Duties' => 'Fix Duties', 'Law & Order Duty' => 'Law & Order Duty', 'Special Squads' => 'Special Squads','Permanent Attachment' => 'Permanent Attachment','Training' => 'Training','Sports' => 'Sports','Available with BNs' => 'Available with BNs','Battalion Misc Duties' => 'Battalion Misc Duties','Institutions' => 'Institutions');
 echo form_dropdown('Postingtiset', $Postingtiset, set_value('Postingtiset',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>



           <div class="form-group" id="fone1" style="display: none;">
                  <label class="col-sm-3 control-label">VP Guards </label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'VP Guards' => 'VP Guards');
 echo form_dropdown('fone1', $vpgurds, set_value('fone1',''),'id="vpgurds" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone1');
 ?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="fone2" style="display: none;">
                  <label class="col-sm-3 control-label">Jails Security </label>
                  <div class="col-sm-9">
                 <?php  
$Jails = array('' => '--Select--', 'Jails Security' => 'Jails Security');
 echo form_dropdown('fone2', $Jails, set_value('fone2',''),'id="Jails" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone2');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                <div class="form-group" id="fone3" style="display: none;">
                  <label class="col-sm-3 control-label">Punjab Police HQRS,SEC.9,CHG </label>
                  <div class="col-sm-9">
                 <?php  
$pphqsec = array('' => '--Select--', 'Punjab Police HQRS,SEC.9,CHG' => 'Punjab Police HQRS,SEC.9,CHG');
 echo form_dropdown('fone3', $pphqsec, set_value('fone3',''),'id="pphqsec" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="fone4" style="display: none;">
                  <label class="col-sm-3 control-label">DERA BEAS SECURITY DUTY </label>
                  <div class="col-sm-9">
                 <?php  
$DERABEAS = array('' => '--Select--', 'DERA BEAS SECURITY DUTY' => 'DERA BEAS SECURITY DUTY');
 echo form_dropdown('fone4', $DERABEAS, set_value('fone4',''),'id="DERABEAS" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone4');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="fone5" style="display: none;">
                  <label class="col-sm-3 control-label">OTHER STSTIC GUARDS </label>
                  <div class="col-sm-9">
                 <?php  
$OTHERSTSTIC = array('' => '--Select--', 'OTHER STSTIC GUARDS' => 'OTHER STSTIC GUARDS');
 echo form_dropdown('fone5', $OTHERSTSTIC, set_value('fone5',''),'id="OTHERSTSTIC" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="fone5" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="fone6" style="display: none;">
                  <label class="col-sm-3 control-label">PSOS/GUNMAN DIRECT FROM BNS. </label>
                  <div class="col-sm-9">
                 <?php  
$PSOSGUNMAN  = array('' => '--Select--', 'Police Officer' => 'Police Officer', 'Retired Police Officer' => 'Retired Police Officer', 'Political Persons' => 'Political Persons','Civil Officers' => 'Civil Officers','Judicial Officers' => 'Judicial Officers','Threatening persons' => 'Threatening persons');
 echo form_dropdown('fone6', $PSOSGUNMAN, set_value('fone6',''),'id="PSOSGUNMAN" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone6');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="fone7" style="display: none;">
                  <label class="col-sm-3 control-label">VIP SEC.WING CHG.U/82nd BN. </label>
                  <div class="col-sm-9">
                 <?php  
$VIPSEC = array('' => '--Select--', 'VIP SEC.WING CHG.U/82nd BN.' => 'VIP SEC.WING CHG.U/82nd BN.');
 echo form_dropdown('fone7', $VIPSEC, set_value('fone7',''),'id="VIPSEC" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone7');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="fone8" style="display: none;">
                  <label class="col-sm-3 control-label">POLICE SEC.WING CHG U/13th BN. </label>
                  <div class="col-sm-9">
                 <?php  
$POLICESECWING = array('' => '--Select--', 'POLICE SEC.WING CHG U/13th BN.' => 'POLICE SEC.WING CHG U/13th BN.');
 echo form_dropdown('fone8', $POLICESECWING, set_value('fone8',''),'id="POLICESECWING" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="fone9" style="display: none;">
                  <label class="col-sm-3 control-label">BANK SECURITY DUTY </label>
                  <div class="col-sm-9">
                 <?php  
$BANKSECURITYDUTY  = array('' => '--Select--', 'BANK SECURITY DUTY' => 'BANK SECURITY DUTY');
 echo form_dropdown('fone9', $BANKSECURITYDUTY, set_value('fone9',''),'id="BANKSECURITYDUTY" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="fone10" style="display: none;">
                  <label class="col-sm-3 control-label">SPECIAL PROTECTION UNIT (C.M. SEC.)</label>
                  <div class="col-sm-9">
                 <?php  
$SPECIALPROTECTIONUNIT = array('' => '--Select--', 'SPECIAL PROTECTION UNIT (C.M. SEC.)' => 'SPECIAL PROTECTION UNIT (C.M. SEC.)');
 echo form_dropdown('fone10', $SPECIALPROTECTIONUNIT, set_value('fone10',''),'id="SPECIALPROTECTIONUNIT" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone10');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="fone11" style="display: none;">
                  <label class="col-sm-3 control-label">PB. BHAWAN NEW DELHI (SEC. DUTY)</label>
                  <div class="col-sm-9">
                 <?php  
$PBBHAWANNEWDELHI = array('' => '--Select--', 'PB. BHAWAN NEW DELHI (SEC. DUTY)' => 'PB. BHAWAN NEW DELHI (SEC. DUTY)');
 echo form_dropdown('fone11', $PBBHAWANNEWDELHI, set_value('fone11',''),'id="PBBHAWANNEWDELHI" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone11');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="fone12" style="display: none;">
                  <label class="col-sm-3 control-label">PB. BHAWAN NEW DELHI (RESERVE)</label>
                  <div class="col-sm-9">
                 <?php  
$PBBHAWANNEWDELHIr = array('' => '--Select--', 'PB. BHAWAN NEW DELHI (RESERVE)' => 'PB. BHAWAN NEW DELHI (RESERVE)');
 echo form_dropdown('fone12', $PBBHAWANNEWDELHIr, set_value('fone12',''),'id="PBBHAWANNEWDELHIr" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone12');
 ?>
                    <label for="PBBHAWANNEWDELHIr" class="error"></label>
                  </div>
                </div>


<!-- LAW OF DUTIES START -->
                  <div class="form-group"   id="lone1" style="display: none;">
                  <label class="col-sm-3 control-label">PERMANENT DUTY</label>
                  <div class="col-sm-9">
                 <?php  
$PERMANENTDUTY = array('' => '--Select--', 'PERMANENT DUTY' => 'PERMANENT DUTY');
 echo form_dropdown('lone1', $PERMANENTDUTY, set_value('lone1',''),'id="PERMANENTDUTY" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('lone1');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="lone2" style="display: none;">
                  <label class="col-sm-3 control-label">DGP, RESERVES</label>
                  <div class="col-sm-9">
                 <?php  
$DGPRESERVES = array('' => '--Select--', 'DGP, RESERVES' => 'DGP, RESERVES');
 echo form_dropdown('lone2', $DGPRESERVES, set_value('lone2',''),'id="DGPRESERVES" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="lone3" style="display: none;">
                  <label class="col-sm-3 control-label">TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY</label>
                  <div class="col-sm-9">
                 <?php  
$TRAININGEMERGENCY = array('' => '--Select--', 'TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY' => 'TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY');
 echo form_dropdown('lone3', $TRAININGEMERGENCY, set_value('lone3',''),'id="TRAININGEMERGENCY" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <!-- SPECIAL SQUADS START -->
                

                  <div class="form-group" id="sqone1" style="display: none;">
                  <label class="col-sm-3 control-label">ANTI RIOT POLICE, JALANDHAR</label>
                  <div class="col-sm-9">
                 <?php  
$ANTIRIOTPOLICEJAL = array('' => '--Select--', 'ANTI RIOT POLICE, JALANDHAR' => 'ANTI RIOT POLICE, JALANDHAR');
 echo form_dropdown('sqone1', $ANTIRIOTPOLICEJAL, set_value('sqone1',''),'id="ANTIRIOTPOLICEJAL" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ss1');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="sqone2" style="display: none;">
                  <label class="col-sm-3 control-label">ANTI RIOT POLICE, MANSA</label>
                  <div class="col-sm-9">
                 <?php  
$ANTIRIOTPOLICEMANSA = array('' => '--Select--', 'ANTI RIOT POLICE, MANSA' => 'ANTI RIOT POLICE, MANSA');
 echo form_dropdown('sqone2', $ANTIRIOTPOLICEMANSA, set_value('sqone2',''),'id="ANTIRIOTPOLICEMANSA" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('sqone2');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="sqone3" style="display: none;">
                  <label class="col-sm-3 control-label">ANTI RIOT POLICE, MUKATSAR</label>
                  <div class="col-sm-9">
                 <?php  
$ANTIRIOTPOLICEMUKATSAR = array('' => '--Select--', 'ANTI RIOT POLICE, MUKATSAR' => 'ANTI RIOT POLICE, MUKATSAR');
 echo form_dropdown('sqone3', $ANTIRIOTPOLICEMUKATSAR, set_value('sqone3',''),'id="ANTIRIOTPOLICEMUKATSAR" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('sqone3');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="sqone4" style="display: none;">
                  <label class="col-sm-3 control-label">S.D.R.F. TEAM, JALANDHAR</label>
                  <div class="col-sm-9">
                 <?php  
$SDRFTEAM = array('' => '--Select--', 'S.D.R.F. TEAM, JALANDHAR' => 'S.D.R.F. TEAM, JALANDHAR');
 echo form_dropdown('sqone4', $SDRFTEAM, set_value('sqone4',''),'id="SDRFTEAM" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('sqone4');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="sqone5" style="display: none;">
                  <label class="col-sm-3 control-label">SPL. STRIKING GROUPS</label>
                  <div class="col-sm-9">
                 <?php  
$SPLSTRIKING = array('' => '--Select--', 'SPL. STRIKING GROUPS' => 'SPL. STRIKING GROUPS');
 echo form_dropdown('sqone5', $SPLSTRIKING, set_value('sqone5',''),'id="SPLSTRIKING" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('sqone5');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="sqone6" style="display: none;">
                  <label class="col-sm-3 control-label">SWAT TEAM (4TH CDO)</label>
                  <div class="col-sm-9">
                 <?php  
$SWATTEAM = array('' => '--Select--', 'SWAT TEAM (4TH CDO)' => 'SWAT TEAM (4TH CDO)');
 echo form_dropdown('sqone6', $SWATTEAM, set_value('sqone6',''),'id="SWATTEAM" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('sqone6');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

<!-- PERMANENT ATTACHMENT START -->

                 <div class="form-group" id="paone1" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT., MOHALI</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTMOHALI = array('' => '--Select--', 'ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI');
 echo form_dropdown('paone1', $ATTACHEDWITHDISTTMOHALI, set_value('paone1',''),'id="ATTACHEDWITHDISTTMOHALI" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone1');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="paone2" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTPOLICEKINMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)');
 echo form_dropdown('paone2', $ATTACHEDWITHDISTTPOLICEKINMALE, set_value('paone2',''),'id="ATTACHEDWITHDISTTPOLICEKINMALE" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone2');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="paone3" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTPOLICEKINFEMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)');
 echo form_dropdown('paone3', $ATTACHEDWITHDISTTPOLICEKINFEMALE, set_value('paone3',''),'id="ATTACHEDWITHDISTTPOLICEKINFEMALE" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone3');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"   id="paone4" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT. POLICE (OTHER KIN MALE)</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTPOLICEOTHERKINMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)');
 echo form_dropdown('paone4', $ATTACHEDWITHDISTTPOLICEOTHERKINMALE, set_value('paone4',''),'id="ATTACHEDWITHDISTTPOLICEOTHERKINMALE" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone4');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="paone5" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT. POLICE (OTHER KIN FEMALE)</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTPOLICEOTHERKINFEMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)');
 echo form_dropdown('paone5', $ATTACHEDWITHDISTTPOLICEOTHERKINFEMALE, set_value('paone5',''),'id="ATTACHEDWITHDISTTPOLICEOTHERKINFEMALE" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone5');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                    <div class="form-group" id="paone6" style="display: none;">
                  <label class="col-sm-3 control-label">C.P.O. ATTACHMENT UNDER 13TH BN</label>
                  <div class="col-sm-9">
                 <?php  
$CPOATTACHMENTUNDER13THBN = array('' => '--Select--', 'C.P.O. ATTACHMENT UNDER 13TH BN' => 'C.P.O. ATTACHMENT UNDER 13TH BN');
 echo form_dropdown('paone6', $CPOATTACHMENTUNDER13THBN, set_value('paone6',''),'id="CPOATTACHMENTUNDER13THBN" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone6');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="paone7" style="display: none;">
                  <label class="col-sm-3 control-label">PB. POLICE OFFICER INSTITUTE SEC 32 CHG</label>
                  <div class="col-sm-9">
                 <?php  
$PBPOLICEOFFICERINSTITUTESEC32CHG = array('' => '--Select--', 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG' => 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG');
 echo form_dropdown('paone7', $PBPOLICEOFFICERINSTITUTESEC32CHG, set_value('paone7',''),'id="PBPOLICEOFFICERINSTITUTESEC32CHG" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone7');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="paone8" style="display: none;">
                  <label class="col-sm-3 control-label">NRI CELL MOHALI</label>
                  <div class="col-sm-9">
                 <?php  
$NRICELLMOHALI = array('' => '--Select--', 'NRI CELL MOHALI' => 'NRI CELL MOHALI');
 echo form_dropdown('paone8', $NRICELLMOHALI, set_value('paone8',''),'id="NRICELLMOHALI" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone8');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="paone9" style="display: none;">
                  <label class="col-sm-3 control-label">INTELLIGENCE WING</label>
                  <div class="col-sm-9">
                 <?php  
$INTELLIGENCEWING = array('' => '--Select--', 'INTELLIGENCE WING' => 'INTELLIGENCE WING');
 echo form_dropdown('paone9', $INTELLIGENCEWING, set_value('paone9',''),'id="INTELLIGENCEWING" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone9');
 ?>
                    <label for="paone9" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="paone10" style="display: none;">
                  <label class="col-sm-3 control-label">CENTRAL POLICE LINE MOHALI</label>
                  <div class="col-sm-9">
                 <?php  
$CENTRALPOLICELINEMOHALI = array('' => '--Select--', 'CENTRAL POLICE LINE MOHALI' => 'CENTRAL POLICE LINE MOHALI');
 echo form_dropdown('paone10', $CENTRALPOLICELINEMOHALI, set_value('paone10',''),'id="CENTRALPOLICELINEMOHALI" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone10');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="paone11" style="display: none;">
                  <label class="col-sm-3 control-label">VIGILANCE BUREAU</label>
                  <div class="col-sm-9">
                 <?php  
$VIGILANCEBUREAU = array('' => '--Select--', 'VIGILANCE BUREAU' => 'VIGILANCE BUREAU');
 echo form_dropdown('paone11', $VIGILANCEBUREAU, set_value('paone11',''),'id="VIGILANCEBUREAU" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone11');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="paone12" style="display: none;">
                  <label class="col-sm-3 control-label">STATE NARCOTIC CRIME BUREAU</label>
                  <div class="col-sm-9">
                 <?php  
$STATENARCOTICCRIMEBUREAU = array('' => '--Select--', 'STATE NARCOTIC CRIME BUREAU' => 'STATE NARCOTIC CRIME BUREAU');
 echo form_dropdown('paone12', $STATENARCOTICCRIMEBUREAU, set_value('paone12',''),'id="STATENARCOTICCRIMEBUREAU" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="paone13" style="display: none;">
                  <label class="col-sm-3 control-label">MOHALI AIRPORT IMMIGRATION DUTY</label>
                  <div class="col-sm-9">
                 <?php  
$MOHALIAIRPORTIMMIGRATIONDUTY = array('' => '--Select--', 'MOHALI AIRPORT IMMIGRATION DUTY' => 'MOHALI AIRPORT IMMIGRATION DUTY');
 echo form_dropdown('paone13', $MOHALIAIRPORTIMMIGRATIONDUTY, set_value('paone13',''),'id="MOHALIAIRPORTIMMIGRATIONDUTY" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="paone14" style="display: none;">
                  <label class="col-sm-3 control-label">STATE HUMAN RIGHTS COMMISSION </label>
                  <div class="col-sm-9">
                 <?php  
$STATEHUMANRIGHTSCOMMISSION = array('' => '--Select--', 'STATE HUMAN RIGHTS COMMISSION' => 'STATE HUMAN RIGHTS COMMISSION ');
 echo form_dropdown('paone14', $STATEHUMANRIGHTSCOMMISSION, set_value('paone14',''),'id="STATEHUMANRIGHTSCOMMISSION" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="paone15" style="display: none;">
                  <label class="col-sm-3 control-label">BUREAU OF INVESTIGATION</label>
                  <div class="col-sm-9">
                 <?php  
$BUREAUOFINVESTIGATION = array('' => '--Select--', 'BUREAU OF INVESTIGATION' => 'BUREAU OF INVESTIGATION');
 echo form_dropdown('paone15', $BUREAUOFINVESTIGATION, set_value('paone15',''),'id="BUREAUOFINVESTIGATION" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="paone16" style="display: none;">
                  <label class="col-sm-3 control-label">RTC/PAP, JALANDHAR</label>
                  <div class="col-sm-9">
                 <?php  
$RTCPAP = array('' => '--Select--', 'RTC/PAP, JALANDHAR' => 'RTC/PAP, JALANDHAR');
 echo form_dropdown('paone16', $RTCPAP, set_value('paone16',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="paone17" style="display: none;">
                  <label class="col-sm-3 control-label">ISTC/PAP, KAPURTHALA</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'ISTC/PAP, KAPURTHALA' => 'ISTC/PAP, KAPURTHALA');
 echo form_dropdown('paone17', $vpgurds, set_value('paone17',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>
                 <div class="form-group"  id="paone18" style="display: none;">
                  <label class="col-sm-3 control-label">POLICE COMMANDO TRG. CENTRE, BHG, PATIALA</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'POLICE COMMANDO TRG. CENTRE, BHG, PATIALA' => 'POLICE COMMANDO TRG. CENTRE, BHG, PATIALA');
 echo form_dropdown('paone18', $vpgurds, set_value('paone18',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="paone19" style="display: none;">
                  <label class="col-sm-3 control-label">RTC LADDA KOTHI SANGRUR</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'RTC LADDA KOTHI SANGRUR' => 'RTC LADDA KOTHI SANGRUR');
 echo form_dropdown('paone19', $vpgurds, set_value('paone19',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                    <div class="form-group" id="paone20" style="display: none;">
                  <label class="col-sm-3 control-label">PUNJAB POLICE ACADEMY PHILLAUR</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'PUNJAB POLICE ACADEMY PHILLAUR' => 'PUNJAB POLICE ACADEMY PHILLAUR');
 echo form_dropdown('paone20', $vpgurds, set_value('paone20',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="paone21" style="display: none;">
                  <label class="col-sm-3 control-label">POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN' => 'POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN');
 echo form_dropdown('paone21', $vpgurds, set_value('paone21',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

<!-- SPORTS START -->
                  <div class="form-group" id="ssone23" style="display: none;">
                  <label class="col-sm-3 control-label">DSO</label>
                  <div class="col-sm-9">
                 <?php  
$DSO = array('' => '--Select--', 'DSO' => 'DSO');
 echo form_dropdown('ssone23', $DSO, set_value('ssone23',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="ssone24" style="display: none;">
                  <label class="col-sm-3 control-label">CSO, JALANDHAR</label>
                  <div class="col-sm-9">
                 <?php  
$CSOJALANDHAR = array('' => '--Select--', 'CSO, JALANDHAR' => 'CSO, JALANDHAR');
 echo form_dropdown('ssone24', $CSOJALANDHAR, set_value('ssone24',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="ssone25" style="display: none;">
                  <label class="col-sm-3 control-label">NIS PATIALA</label>
                  <div class="col-sm-9">
                 <?php  
$NISPATIALA = array('' => '--Select--', 'NIS PATIALA' => 'NIS PATIALA');
 echo form_dropdown('ssone25', $NISPATIALA, set_value('ssone25',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="ssone26" style="display: none;">
                  <label class="col-sm-3 control-label">OTHERS</label>
                  <div class="col-sm-9">
                 <?php  
$OTHERSs = array('' => '--Select--', 'OTHERS' => 'OTHERS');
 echo form_dropdown('ssone26', $OTHERSs, set_value('ssone26',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <!-- AVAILABLE WITH BNs. -->

                  <div class="form-group"  id="awbone1" style="display: none;">
                  <label class="col-sm-3 control-label">PAP CAMPUS  SECURITY</label>
                  <div class="col-sm-9">
                 <?php  
$PAPCAMPUSSECURITY = array('' => '--Select--', 'PAP CAMPUS  SECURITY' => 'PAP CAMPUS  SECURITY');
 echo form_dropdown('awbone1', $PAPCAMPUSSECURITY, set_value('awbone1',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="awbone2" style="display: none;">
                  <label class="col-sm-3 control-label">PERSONAL SECURITY STAFF ARMED WING OFFICER</label>
                  <div class="col-sm-9">
                 <?php  
$PERSONALSECURITYSTAFFARMEDWINGOFFICER = array('' => '--Select--', 'PERSONAL SECURITY STAFF ARMED WING OFFICER' => 'PERSONAL SECURITY STAFF ARMED WING OFFICER');
 echo form_dropdown('awbone2', $PERSONALSECURITYSTAFFARMEDWINGOFFICER, set_value('awbone2',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('pa28');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="awbone3" style="display: none;">
                  <label class="col-sm-3 control-label">OFFICE STAFF IN HIGHER OFFICES</label>
                  <div class="col-sm-9">
                 <?php  
$OFFICESTAFFINHIGHEROFFICES = array('' => '--Select--', 'OFFICE STAFF IN HIGHER OFFICES' => 'OFFICE STAFF IN HIGHER OFFICES');
 echo form_dropdown('awbone3', $OFFICESTAFFINHIGHEROFFICES, set_value('awbone3',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="awbone5" style="display: none;">
                  <label class="col-sm-3 control-label">OFFICE STAFF IN BN. OFFICE</label>
                  <div class="col-sm-9">
                 <?php  
$OFFICESTAFFINBNOFFICE = array('' => '--Select--', 'Commandant office' => 'Commandant office', 'Asstt. Commandant office' => 'Asstt. Commandant office', 'Dy.S.P. office' => 'Dy.S.P. office', 'English Branch' => 'English Branch','Account Branch' => 'Account Branch' , 'OSI Branch' => 'OSI Branch', 'Litigation Branch' => 'Litigation Branch', 'Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer Cell' => 'Computer Cell','Control Room' => 'Control Room','Reader to INSP' => 'Reader to INSP');
 echo form_dropdown('awbone4', $OFFICESTAFFINBNOFFICE, set_value('awbone4',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="awbone6" style="display: none;">
                  <label class="col-sm-3 control-label">BN KOT GUARD</label>
                  <div class="col-sm-9">
                 <?php  
$BNKOTGUARD = array('' => '--Select--', 'BN KOT GUARD' => 'BN KOT GUARD');
 echo form_dropdown('awbone5', $BNKOTGUARD, set_value('awbone5',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="awbone7" style="display: none;">
                  <label class="col-sm-3 control-label">BN. HQRS.  OTHER GUARD</label>
                  <div class="col-sm-9">
                 <?php  
$BNHQRSOTHERGUARD = array('' => '--Select--', 'BN. HQRS.  OTHER GUARD' => 'BN. HQRS.  OTHER GUARD','STATIC GUARD CR' => 'STATIC GUARD CR');
 echo form_dropdown('awbone6', $BNHQRSOTHERGUARD, set_value('awbone6',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone6');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="awbone8" style="display: none;">
                  <label class="col-sm-3 control-label">TRADESMEN</label>
                  <div class="col-sm-9">
                 <?php  
$TRADESMEN = array('' => '--Select--', 'TRADEMEN' => 'TRADEMEN');
 echo form_dropdown('awbone7', $TRADESMEN, set_value('awbone7',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone7');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="awbone9" style="display: none;">
                  <label class="col-sm-3 control-label">M.T. SECTION</label>
                  <div class="col-sm-9">
                 <?php  
$MTSECTION = array('' => '--Select--', 'M.T. SECTION' => 'M.T. SECTION');
 echo form_dropdown('awbone8', $MTSECTION, set_value('awbone8',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone8');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="awbone10" style="display: none;">
                  <label class="col-sm-3 control-label">QUARTERMASTER BRANCH (LINE STAFF)
</label>
                  <div class="col-sm-9">
                 <?php  
$QUARTERMASTERBRANCHLINESTAFF = array('' => '--Select--', 'QUARTERMASTER BRANCH (LINE STAFF)' => 'QUARTERMASTER BRANCH (LINE STAFF)');
 echo form_dropdown('awbone9', $QUARTERMASTERBRANCHLINESTAFF, set_value('awbone9',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone9');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="awbone11" style="display: none;">
                  <label class="col-sm-3 control-label">GENERAL DUTY BN.HQRS
</label>
                  <div class="col-sm-9">
                 <?php  
$GENERALDUTYBNHQRS = array('' => '--Select--', 'GENERAL DUTY BN.HQRS' => 'GENERAL DUTY BN.HQRS');
 echo form_dropdown('awbone10', $GENERALDUTYBNHQRS, set_value('awbone10',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('aw11');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="awbone12" style="display: none;">
                  <label class="col-sm-3 control-label">TRG. RESERVE AT BN.HQRS.
</label>
                  <div class="col-sm-9">
                 <?php  
$TRGRESERVEATBNHQRS = array('' => '--Select--', 'TRG. RESERVE AT BN.HQRS.' => 'TRG. RESERVE AT BN.HQRS.');
 echo form_dropdown('awbone11', $TRGRESERVEATBNHQRS, set_value('awbone11',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone11');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="awbone14" style="display: none;">
                  <label class="col-sm-3 control-label">RECRUITMENT DUTY
</label>
                  <div class="col-sm-9">
                 <?php  
$RECRUITMENTDUTY = array('' => '--Select--', 'RECRUITMENT DUTY' => 'RECRUITMENT DUTY');
 echo form_dropdown('awbone12', $RECRUITMENTDUTY, set_value('awbone12',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone12');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <!-- BATTALION MISC. DUTIES START -->

                  <div class="form-group"  id="bmdone1" style="display: none;">
                  <label class="col-sm-3 control-label">RECRUIT
</label>
                  <div class="col-sm-9">
                 <?php  
$RECRUIT = array('' => '--Select--', 'RECRUIT' => 'RECRUIT');
 echo form_dropdown('bmdone1', $RECRUIT, set_value('bmdone1',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone1');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="bmdone2" style="display: none;">
                  <label class="col-sm-3 control-label">LEAVE 
</label>
                  <div class="col-sm-9">
                 <?php  
$LEAVE = array('' => '--Select--', 'LEAVE' => 'LEAVE');
 echo form_dropdown('bmdone2', $LEAVE, set_value('bmdone2',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone2');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="bmdone3" style="display: none;">
                  <label class="col-sm-3 control-label">ABSENT 
</label>
                  <div class="col-sm-9">
                 <?php  
$ABSENT = array('' => '--Select--', 'ABSENT' => 'ABSENT');
 echo form_dropdown('bmdone3', $ABSENT, set_value('bmdone3',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone3');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="bmdone4" style="display: none;">
                  <label class="col-sm-3 control-label">UNDER SUSPENSION 
</label>
                  <div class="col-sm-9">
                 <?php  
$UNDERSUSPENSION  = array('' => '--Select--', 'UNDER SUSPENSION' => 'UNDER SUSPENSION');
 echo form_dropdown('bmdone4', $UNDERSUSPENSION, set_value('bmdone4',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('aw18');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="bmdone5" style="display: none;">
                  <label class="col-sm-3 control-label">Handicapped on Medical Rest
</label>
                  <div class="col-sm-9">
                 <?php  
$HandicappedonMedicalRest = 
array('' => '--Select--', 'Handicapped on Medical Rest' => 'Handicapped on Medical Rest');
 echo form_dropdown('bmdone5', $HandicappedonMedicalRest, set_value('bmdone5',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone5');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="bmdone6" style="display: none;">
                  <label class="col-sm-3 control-label">Handicapped on light duty
</label>
                  <div class="col-sm-9">
                 <?php  
$Handicappedonlightduty = array('' => '--Select--', 'Handicapped on light duty' => 'Handicapped on light duty
');
 echo form_dropdown('bmdone6', $Handicappedonlightduty, set_value('bmdone6',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="bmdone7" style="display: none;">
                  <label class="col-sm-3 control-label">Chronic Disease on Medical Rest
</label>
                  <div class="col-sm-9">
                 <?php  
$ChronicDiseaseonMedicalRest = array('' => '--Select--', 'Chronic Disease on Medical Rest' => 'Chronic Disease on Medical Rest');
 echo form_dropdown('bmdone7', $ChronicDiseaseonMedicalRest, set_value('bmdone7',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone7');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="bmdone9" style="display: none;">
                  <label class="col-sm-3 control-label">OSD ETC
</label>
                  <div class="col-sm-9">
                 <?php  
$OSDETC = array('' => '--Select--', 'OSD ETC' => 'OSD ETC');
 echo form_dropdown('bmdone8', $OSDETC, set_value('bmdone9',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone8');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <!-- INSTITUTIONS START -->

                <div class="form-group"  id="instone1" style="display: none;">
                  <label class="col-sm-3 control-label">IRB Institutions
</label>
                  <div class="col-sm-9">
                 <?php  
$IRBInstitutions = array('' => '--Select--', 'IRB Institutions' => 'IRB Institutions');
 echo form_dropdown('instone1', $IRBInstitutions, set_value('instone1',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('instone1');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="instone2" style="display: none;">
                  <label class="col-sm-3 control-label">CDO Institutions
</label>
                  <div class="col-sm-9">
                 <?php  
$CDOInstitutions = array('' => '--Select--', 'CDO Institutions' => 'CDO Institutions');
 echo form_dropdown('instone2', $CDOInstitutions, set_value('instone2',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('instone2');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"   id="instone3" style="display: none;">
                  <label class="col-sm-3 control-label">PAP Outer Bn Institutions
</label>
                  <div class="col-sm-9">
                 <?php  
$PAPOuterBnInstitutions = array('' => '--Select--', 'PAP Outer Bn Institutions' => 'PAP Outer Bn Institutions');
 echo form_dropdown('instone3', $PAPOuterBnInstitutions, set_value('instone3',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('irb3');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                   <div class="form-group"  id="instone5" style="display: none;">
                  <label class="col-sm-3 control-label">Institutions Duty</label>
                  <div class="col-sm-9">
 <?php  
$Institutionsti = array('' => '--Select--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','BUGGLER' => 'BUGGLER','T/A 7th Bn PAP for Driver Duty' => 'T/A 7th Bn PAP for Driver Duty','U/7th PAP for out Rider duty on Motor Cycle' => 'U/7th PAP for out Rider duty on Motor Cycle','M.T WORKSHOP U/7th BN PAP' => 'M.T WORKSHOP U/7th BN PAP','PAP House' => 'PAP House' );
 echo form_dropdown('instone4', $Institutionsti, set_value('instone4',''),'id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('irb5');
 ?>
                    <label for="Institutionsti" class="error"></label>
                  </div>
                </div>


<!-- TRANING START -->
         <div class="form-group"   id="traning1" style="display: none;">
                  <label class="col-sm-3 control-label">BASIC TRANING</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'BASIC TRANING' => 'BASIC TRANING');
 echo form_dropdown('traning1', $vpgurds, set_value('traning1',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('lone1');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="traning2" style="display: none;">
                  <label class="col-sm-3 control-label">PROMOTIONAL COURSE</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'PROMOTIONAL COURSE' => 'PROMOTIONAL COURSE');
 echo form_dropdown('traning2', $vpgurds, set_value('traning2',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="traning3" style="display: none;">
                  <label class="col-sm-3 control-label">DEPARTMENT COURSE</label>
                  <div class="col-sm-9">
                 <?php  
$vpgurds = array('' => '--Select--', 'DEPARTMENT COURSE' => 'DEPARTMENT COURSE');
 echo form_dropdown('traning3', $vpgurds, set_value('traning3',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a  href="" class="btn btn-default">Reset</a>
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
      <?php echo form_close(); ?>
         </div><!-- col-md-6 -->
    </div><!-- row -->

<?php if($weapon!=''){ ?>

    <div class="row">
    <div class="col-lg-10 col-xs-offset-1">
    <h3>Total Records: <?php echo count($weapon); ?> <span class="pull-right"><?php echo $n; ?> </span></h3>
                <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
              <th>S.No</th>
             <!--  <th>Battalion/Unit</th> -->
              <th>Name</th>
              <th>Present Rank</th>
              <th>Dept. No </th>
              <th>Type of Duty</th>    
              <th>Phone</th>
              <th>Posting Info</th>
              <th>Posting Date</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0;  foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                 
                    <?php //$btname = fetchoneinfo('users',array('users_id' => $value->BattalionUnitito));
                     /*if($btname!=''){
                      echo $btname->nick ;
                     } else{echo $value->EnlistmentUnit; }*/
                        ?>
                    <td> <?php echo $value->name; ?></td>
                    <td><?php echo $value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank; ?></td>
                    <td><?php echo $value->depttno; ?></td>
                    <td><?php echo $value->typeofduty; ?></td>
                    <td><?php echo $value->phono1; ?></td>
                    <td><?php echo $value->fone1; ?> <?php echo $value->fone2; ?><?php echo $value->fone3; ?><?php echo $value->fone4; ?><?php echo $value->fone5; ?><?php echo $value->fone6; ?><?php echo $value->fone7; ?><?php echo $value->fone8; ?><?php echo $value->fone9; ?><?php echo $value->fone10; ?><?php echo $value->fone11; ?><?php echo $value->fone12; ?><?php echo $value->lone1; ?><?php echo $value->lone2; ?><?php echo $value->lone3; ?><?php echo $value->sqone1; ?><?php echo $value->sqone2; ?><?php echo $value->sqone3; ?><?php echo $value->sqone4; ?><?php echo $value->sqone5; ?><?php echo $value->sqone6; ?><?php echo $value->paone1; ?><?php echo $value->paone2; ?><?php echo $value->paone3; ?><?php echo $value->paone4; ?><?php echo $value->paone5; ?><?php echo $value->paone6; ?><?php echo $value->paone7; ?><?php echo $value->paone8; ?><?php echo $value->paone9; ?><?php echo $value->paone10; ?><?php echo $value->paone11; ?><?php echo $value->paone12; ?><?php echo $value->paone13; ?><?php echo $value->paone14; ?><?php echo $value->paone15; ?><?php echo $value->paone16; ?><?php echo $value->paone17; ?><?php echo $value->paone18; ?><?php echo $value->paone19; ?><?php echo $value->paone20; ?><?php echo $value->paone21; ?><?php echo $value->traning1; ?><?php echo $value->traning2; ?><?php echo $value->traning3; ?><?php echo $value->ssone23; ?><?php echo $value->ssone24; ?><?php echo $value->ssone25; ?><?php echo $value->ssone26; ?><?php echo $value->awbone1; ?><?php echo $value->awbone2; ?><?php echo $value->awbone3; ?><?php echo $value->awbone4; ?><?php echo $value->awbone5; ?><?php echo $value->awbone6; ?><?php echo $value->awbone7; ?><?php echo $value->awbone8; ?><?php echo $value->awbone9; ?><?php echo $value->awbone10; ?><?php echo $value->awbone11; ?><?php echo $value->awbone12; ?><?php echo $value->bmdone1; ?><?php echo $value->bmdone2; ?><?php echo $value->bmdone3; ?><?php echo $value->bmdone4; ?><?php echo $value->bmdone5; ?><?php echo $value->bmdone6; ?><?php echo $value->bmdone7; ?><?php echo $value->bmdone8; ?><?php echo $value->instone1; ?><?php echo $value->instone2; ?><?php echo $value->instone3; ?><?php echo $value->instone4; ?> &nbsp; <?php if($value->vploc !=''){echo $value->vploc.'&nbsp;';}  ?> <?php if($value->vpdis !=''){ echo $value->vpdis.'&nbsp;'; } ?> <?php if($value->noj !=''){ echo $value->noj.'&nbsp;'; }  ?> <?php if($value->jsdis !=''){ echo $value->jsdis.'&nbsp;'; } ?><?php if($value->osgloc !=''){ echo $value->osgloc.'&nbsp;'; } ?><?php if($value->osgdis !=''){ echo $value->osgdis.'&nbsp;'; } ?><?php if($value->bsdnob !=''){ echo $value->bsdnob.'&nbsp;'; } ?><?php if($value->bsddis !=''){ echo $value->bsddis.'&nbsp;'; } ?><?php if($value->bsdloc !=''){ echo $value->bsdloc.'&nbsp;'; } ?><?php if($value->perdupod !=''){ echo $value->perdupod.'&nbsp;'; } ?><?php if($value->perdudis !=''){ echo $value->perdudis.'&nbsp;'; } ?><?php if($value->perduorno !=''){ echo $value->perduorno.'&nbsp;'; } ?><?php if($value->perduordate !=''){ echo $value->perduordate.'&nbsp;'; } ?><?php if($value->dgppod !=''){ echo $value->dgppod; } ?><?php if($value->dgpdis !=''){ echo $value->dgpdis.'&nbsp;'; } ?><?php if($value->dgporno !=''){ echo $value->dgporno.'&nbsp;'; } ?><?php if($value->dgpordate !=''){ echo $value->dgpordate.'&nbsp;'; } ?> <?php if($value->tertdpod !=''){echo $value->tertdpod.'&nbsp;'; } ?><?php if($value->tertddis !=''){ echo $value->tertddis.'&nbsp;'; } ?><?php if($value->tertdordate !=''){ echo $value->tertdordate.'&nbsp;'; } ?><?php if($value->sstgpod !=''){ echo $value->sstgpod.'&nbsp;';  } ?><?php if($value->sstgdis !=''){ echo $value->sstgdis.'&nbsp;'; } ?><?php if($value->sstgorno !=''){ echo $value->sstgorno.'&nbsp;';} ?><?php if($value->sstgordate !=''){ echo $value->sstgordate.'&nbsp;'; } ?><?php if($value->swatpod !=''){ echo $value->swatpod.'&nbsp;'; } ?><?php if($value->swatdis !=''){ echo $value->swatdis.'&nbsp;'; } ?><?php if($value->swatorno !=''){ echo $value->swatorno.'&nbsp;'; } ?><?php if($value->swatordate !=''){echo $value->swatordate.'&nbsp;';} ?><?php if($value->awdpmpod !=''){echo $value->awdpmpod.'&nbsp;'; } ?><?php if($value->awdpmorno !=''){echo $value->awdpmorno.'&nbsp;'; } ?><?php if($value->awdpmordate !=''){echo $value->awdpmordate.'&nbsp;'; } ?><?php if($value->awdpfpod !=''){echo $value->awdpfpod.'&nbsp;';} ?><?php if($value->awdpforno !=''){echo $value->awdpforno.'&nbsp;'; } ?><?php if($value->awdpfordate !=''){echo $value->awdpfordate.'&nbsp;'; } ?><?php if($value->awdpompod !=''){echo $value->awdpompod.'&nbsp;';} ?><?php if($value->awdpomorno !=''){echo $value->awdpomorno.'&nbsp;';} ?><?php if($value->awdpomordate !=''){echo $value->awdpomordate.'&nbsp;'; } ?><?php if($value->awdpofpod !=''){ echo $value->awdpofpod.'&nbsp;'; } ?><?php if($value->awdpoforno !=''){ echo $value->awdpoforno.'&nbsp;'; } ?>
 <?php if($value->awdpofordate !=''){ echo $value->awdpofordate.'&nbsp;'; } ?><?php if($value->dsopod !=''){ echo $value->dsopod.'&nbsp;';} ?><?php if($value->dsoorno !=''){ echo $value->dsoorno.'&nbsp;'; } ?><?php if($value->dsoordate !=''){ echo $value->dsoordate.'&nbsp;'; } ?><?php if($value->csojalorno !=''){ echo $value->csojalorno.'&nbsp;'; } ?><?php if($value->csojalordate !=''){ echo $value->csojalordate.'&nbsp;'; } ?><?php if($value->mispatorno !=''){ echo $value->mispatorno.'&nbsp;'; } ?><?php if($value->mispatordate !=''){echo $value->mispatordate.'&nbsp;'; } ?><?php if($value->othersnod !=''){echo $value->othersnod.'&nbsp;'; } ?><?php if($value->othersnodis !=''){echo $value->othersnodis.'&nbsp;';} ?><?php if($value->othersorno !=''){ echo $value->othersorno.'&nbsp;';} ?><?php if($value->othersordate !=''){echo $value->othersordate.'&nbsp;'; } ?><?php if($value->pssawonof !=''){ echo $value->pssawonof.'&nbsp;'; } ?><?php if($value->pssaworank !=''){ echo $value->pssaworank.'&nbsp;'; } ?> <?php if($value->pssawoordate !=''){echo $value->pssawoordate.'&nbsp;'; } ?> <?php if($value->osihonoo !=''){ echo $value->osihonoo.'&nbsp;'; } ?><?php if($value->Readerosinbo !=''){ echo $value->Readerosinbo.'&nbsp;'; } ?><?php if($value->Orderly !=''){ echo $value->Orderly.'&nbsp;'; } ?><?php if($value->telopr !=''){echo $value->telopr.'&nbsp;';} ?><?php if($value->darrun !=''){echo $value->darrun.'&nbsp;';} ?><?php if($value->bnkgdop !=''){echo $value->bnkgdop.'&nbsp;';} ?><?php if($value->bhogpog !=''){echo $value->bhogpog.'&nbsp;';} ?><?php if($value->bhogdop !=''){echo $value->bhogdop.'&nbsp;';} ?><?php if($value->tradestot !=''){ echo $value->tradestot.'&nbsp;';} ?><?php if($value->tradestt !=''){echo $value->tradestt.'&nbsp;'; } ?><?php if($value->tradesbat !=''){echo $value->tradesbat.'&nbsp;';} ?><?php if($value->tradesdop !=''){echo $value->tradesdop.'&nbsp;';} ?><?php if($value->tradesorno !=''){echo $value->tradesorno.'&nbsp;';} ?><?php if($value->mtsecpod !=''){echo $value->mtsecpod.'&nbsp;';} ?><?php if($value->mtsecvehno !=''){echo $value->mtsecvehno.'&nbsp;';} ?><?php if($value->mtsecdop !=''){echo $value->mtsecdop.'&nbsp;';} ?><?php if($value->mtsecorno !=''){echo $value->mtsecorno.'&nbsp;';} ?><?php if($value->quartbradop !=''){echo $value->quartbradop.'&nbsp;';} ?><?php if($value->quartbraorno !=''){echo $value->quartbraorno.'&nbsp;';} ?><?php if($value->recrutnorb !=''){ echo $value->recrutnorb.'&nbsp;'; } ?><?php if($value->recrutorno !=''){echo $value->recrutorno.'&nbsp;'; } ?><?php if($value->recrutordate !=''){echo $value->recrutordate.'&nbsp;'; } ?><?php if($value->leavefrom !=''){echo $value->leavefrom.'&nbsp;'; } ?> <?php if($value->leaveto !=''){echo $value->leaveto.'&nbsp;'; } ?><?php if($value->absentfrom !=''){echo $value->absentfrom.'&nbsp;'; } ?><?php if($value->absentddr !=''){echo $value->absentddr.'&nbsp;'; } ?><?php if($value->absentdate !=''){echo $value->absentdate.'&nbsp;'; } ?><?php if($value->usdos !=''){echo $value->usdos.'&nbsp;';} ?><?php if($value->usros !=''){echo $value->usros.'&nbsp;';} ?>  </td>
 <td><?php echo $value->dateofposting1; ?></td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 
    </div> </div> <?php } ?>
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
<script src="<?php echo base_url(); ?>webroot/data/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/vfs_fonts.js"></script></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.colVis.js"></script>
<script type="text/javascript">
  
  jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"})
});

  $(document).ready(function() {
var table = $('#table').DataTable( {
         dom: 'C<"clear">Bfrtip',

       buttons: [
            {
               extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        colVis: {
            exclude: [ 0 ]
        }
    } );
  

});

    $(document).on('change', '#RankRankre', function() {
      if(this.value == 'Executive Staff'){
     $('#exs1').show();
     $('#MedicalStaff2').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
   } else if(this.value == 'Medical Staff'){
     $('#MedicalStaff2').show();
     $('#exs1').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      
   }else if(this.value == 'Ministerial Staff'){
     $('#MinisterialStaff1').show();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
   }else if(this.value == 'Class-IV (P)'){
     $('#cl4,#prebatunit,#preno1').show();
        $('#MedicalStaff2').hide();
     $('#exs1').hide();
      $('#cl5').hide();
   }else if(this.value == 'Class-IV (C)'){
     $('#cl5,#prebatunit,#preno1').show();
     $('#MinisterialStaff1').hide();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
      $('#cl4').hide();
       $('#exs1').hide();
        
   }else{
    $('#exs1').hide();
    $('#MedicalStaff2').hide();
    $('#MinisterialStaff1').hide();
    $('#cl4').hide();
    $('#cl5').hide();
   }
  
});

     $(document).on('change', '#Postingtiset', function() {
  if(this.value == 'Fix Duties'){
     $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').show();
     $('#lone1,#lone2,#lone3').hide();
     $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
     $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
   }else if(this.value == 'Law & Order Duty'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').show();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
     $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
   }else if(this.value == 'Special Squads'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').show();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
   }else if(this.value == 'Permanent Attachment'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').show();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
   }else if(this.value == 'Training'){
    $('#traning1,#traning2,#traning3').show();
        $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }else if(this.value == 'Sports'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').show();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
   }else if(this.value == 'Available with BNs'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').show();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
   }else if(this.value == 'Battalion Misc Duties'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').show();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
   }else if(this.value == 'Institutions'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').show();
    $('#traning1,#traning2,#traning3').hide();
   }
});
</script>

</body>
</html>