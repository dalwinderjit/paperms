<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Posting</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   
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
      <h3> &nbsp;  &nbsp; Add Posting</h3>
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
 <?php  if($this->session->userdata('userid') == 93 ){ ?>

 <div class="form-group">
                  <label class="col-sm-3 control-label text-right">Select a Game</label>
                  <div class="col-sm-9">
          <?php  
$gPostingtiset = array('' => '--Select--', 'Accupressure' => 'Accupressure', 'Archery' => 'Archery', 'Archery Women' => 'Archery Women','Astro Turf Groun' => 'Astro Turf Groun','Athletic' => 'Athletic','Athletic Women' => 'Athletic Women','Basketball' => 'Basketball','Basketball Women' => 'Basketball Women','Body Building' => 'Body Building','Boxing' => 'Boxing','Boxing Women' => 'Boxing Women','Cycling' => 'Cycling','DSO Coach' => 'DSO Coach','Equestrian' => 'Equestrian','Football' => 'Football','GYM' => 'GYM','Gymnastics' => 'Gymnastics','Gymnastics Women' => 'Gymnastics Women','Handball' => 'Handball','Handball Women' => 'Handball Women','Hockey' => 'Hockey','Indoor Stadium' => 'Indoor Stadium','Judo' => 'Judo','Judo Women' => 'Judo Women','Kabaddi' => 'Kabaddi','Kabaddi Women' => 'Kabaddi Women','Motor Cyclist' => 'Motor Cyclist','Netball' => 'Netball','Office' => 'Office','Power Lifting' => 'Power Lifting','Rowing' => 'Rowing','Rowing Women' => 'Rowing Women','Shooting' => 'Shooting','Shooting Women' => 'Shooting Women','Sports Cafe' => 'Sports Cafe','Swimming' => 'Swimming','Taekwondo' => 'Taekwondo','Volleyball' => 'Volleyball','Women Hostel' => 'Women Hostel','Wrestling F/S' => 'Wrestling F/S','Wrestling G/R' => 'Wrestling G/R','Wrestling Women' =>'Wrestling Women', 'Wtlifting' => 'Wtlifting','Wtlifting Women' => 'Wtlifting Women','Wushu' => 'Wushu','Yoga' => 'Yoga','Yoga Women' => 'Yoga Women');
 echo form_dropdown('gPostingtiset', $gPostingtiset, set_value('gPostingtiset',''),'id="gPostingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('gPostingtiset');
 ?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>

 <?php }else{ ?>

<div class="form-group">
                  <label class="col-sm-3 control-label">Posting Detail </label>
                  <div class="col-sm-9">
                 <?php  
$Postingtiset = array('' => '--Select--', 'Fix Duties' => 'Fix Duties', 'Law & Order Duty' => 'Law & Order Duty', 'Special Squads' => 'Special Squads','Permanent Attachment' => 'Permanent Attachment','Training' => 'Training','Sports' => 'Sports','Available with BNs' => 'Available with BNs','Battalion Misc Duties' => 'Battalion Misc Duties','Institutions' => 'Institutions','Class-IV(P)' => 'Class-IV(P)' ,'Class-IV(C)' => 'Class-IV(C)');
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


            <div class="form-group" id="vploc1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Location </label>
                  <div class="col-sm-9">
                <?php
$vploc = array('type' => 'text','name' => '	','id' => 'vploc','class' => 'form-control','placeholder' =>'Location','value' => set_value('vploc'));
echo form_input($vploc);
echo form_error('vploc');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="vpdis1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$vpdis = array('type' => 'text','name' => 'vpdis','id' => 'vpdis','class' => 'form-control','placeholder' =>'District','value' => set_value('vpdis'));
echo form_input($vpdis);
echo form_error('vpdis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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


            <div class="form-group" id="noj1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of jail </label>
                  <div class="col-sm-9">
                <?php
$noj = array('type' => 'text','name' => 'noj','id' => 'noj','class' => 'form-control','placeholder' =>'Name of jail','value' => set_value('noj'));
echo form_input($noj);
echo form_error('noj');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="jsdis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$jsdis = array('type' => 'text','name' => 'jsdis','id' => 'jsdis','class' => 'form-control','placeholder' =>'District','value' => set_value('jsdis'));
echo form_input($jsdis);
echo form_error('jsdis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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
                  <label class="col-sm-3 control-label">OTHER STATIC GUARDS </label>
                  <div class="col-sm-9">
                 <?php  
$OTHERSTSTIC = array('' => '--Select--', 'OTHER STATIC GUARDS' => 'OTHER STATIC GUARDS');
 echo form_dropdown('fone5', $OTHERSTSTIC, set_value('fone5',''),'id="OTHERSTSTIC" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="fone5" class="error"></label>
                  </div>
                </div>

                      <div class="form-group" id="osgloc1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Location </label>
                  <div class="col-sm-9">
                <?php
$osgloc = array('type' => 'text','name' => 'osgloc','id' => 'osgloc','class' => 'form-control','placeholder' =>'Location','value' => set_value('osgloc'));
echo form_input($osgloc);
echo form_error('osgloc');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="osgdis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$osgdis = array('type' => 'text','name' => 'osgdis','id' => 'osgdis','class' => 'form-control','placeholder' =>'District','value' => set_value('osgdis'));
echo form_input($osgdis);
echo form_error('osgdis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>
                <div class="form-group" id="fone6" style="display: none;">
                  <label class="col-sm-3 control-label">PSOS/GUNMAN DIRECT FROM BNS. </label>
                  <div class="col-sm-9">
                 <?php  
$PSOSGUNMAN  = array('' => '--Select--', 'Police Officer' => 'Police Officer', 'Retired Police Officer' => 'Retired Police Officer', 'Political Persons' => 'Political Persons','Civil Officers' => 'Civil Officers','Judicial Officers' => 'Judicial Officers','Threatening persons' => 'Threatening persons','PERSONAL SECURITY STAFF ARMED WING OFFICER' => 'PERSONAL SECURITY STAFF ARMED WING OFFICER', 'Admin Staff' => 'Admin Staff');
 echo form_dropdown('fone6', $PSOSGUNMAN, set_value('fone6',''),'id="PSOSGUNMAN" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone6');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="adminstaff" style="display: none;">
                  <label class="col-sm-3 control-label">Admin Staff Info</label>
                  <div class="col-sm-9">
<?php
$name = array('type' => 'text','name' => 'adminstaff','id' => 'name','class' => 'form-control','placeholder' =>'Admin Staff Info','value' => set_value('scname'));
echo form_input($name);
echo form_error('scname');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>

<h3 id="seccover" style="display: none;">Security Cover</h3>
                 <div class="form-group" id="fone13" style="display: none;">
                  <label class="col-sm-3 control-label">Name of protectee</label>
                  <div class="col-sm-9">
<?php
$name = array('type' => 'text','name' => 'scname','id' => 'name','class' => 'form-control','placeholder' =>'Name','value' => set_value('scname'));
echo form_input($name);
echo form_error('scname');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="fone14" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--', 'DGP' => 'DGP', 'ADGP' => 'ADGP', 'IGP' => 'IGP', 'DIG' => 'DIG', 'AIG' => 'AIG', 'SSP' => 'SSP','SP' => 'SP',  'DSP' => 'DSP','INSPR' => 'INSPR');
 echo form_dropdown('scrank', $RankRankre, set_value('scrank',''),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="fone15" style="display: none;">
                  <label class="col-sm-3 control-label">Designation</label>
                  <div class="col-sm-9">
           <?php
$des = array('type' => 'text','name' => 'scdes','id' => 'des','class' => 'form-control','placeholder' =>'Designation','value' => set_value('scdes'));
echo form_input($des);
echo form_error('scdes');
?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="fone16" style="display: none;">
                  <label class="col-sm-3 control-label">Place of Posting</label>
                  <div class="col-sm-9">
<?php
$pop = array('type' => 'text','name' => 'scpop','id' => 'pop','class' => 'form-control','placeholder' =>'Place of Posting','value' => set_value('scpop'));
echo form_input($pop);
echo form_error('scpop');
?>
                    <label for="pop" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="fone17" style="display: none;">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
<?php
$address = array('type' => 'text','name' => 'scaddress','id' => 'address','class' => 'form-control','placeholder' =>'Address','value' => set_value('scaddress'));
echo form_input($address);
echo form_error('scaddress');
?>
                    <label for="sno" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="fone18" style="display: none;">
                  <label class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
<?php
$mob = array('type' => 'text','name' => 'scmob','id' => 'mob','class' => 'form-control','placeholder' =>'Mobile','value' => set_value('scmob'));
echo form_input($mob);
echo form_error('mob');
?>
                    <label for="mob" class="error"></label>
                  </div>
                </div>


 <div class="form-group" id="fone19" style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
<?php
$nod = array('' => '--Select--','Gunman' => 'Gunman','Driver' => 'Driver', 'Reader' => 'Reader', 'Guard' => 'Guard', 'PSO' => 'PSO','Office Orderly' => 'Office Orderly','Dak Runner' => 'Dak Runner','Escort' => 'Escort','Telphone operator' => 'Telphone operator','Leave Reserve' => 'Leave Reserve','Anti sabotage Team' => 'Anti sabotage Team','Admn. Staff' => 'Admn. Staff');
 echo form_dropdown('scnod', $nod, set_value('scnod',''),'id="nod" data-placeholder="Choose One" class="select2"'); 
 echo form_error('nod');
?>
                    <label for="sno" class="error"></label>
                  </div>
                </div>

 <div class="form-group" id="fone20" style="display: none;">
                  <label class="col-sm-3 control-label">Order By</label>
                  <div class="col-sm-9">
<?php
$oby = array('type' => 'text','name' => 'scoby','id' => 'oby','class' => 'form-control','placeholder' =>'Order By','value' => set_value('scoby'));
echo form_input($oby);
echo form_error('oby');
?>
                    <label for="oby" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="fone21" style="display: none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
<?php
$ono = array('type' => 'text','name' => 'scono','id' => 'ono','class' => 'form-control','placeholder' =>'Order No','value' => set_value('scono'));
echo form_input($ono);
echo form_error('ono');
?>
                    <label for="ono" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="fone22" style="display: none;">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
<?php
$odate = array('type' => 'text','name' => 'scodate','id' => 'odate','class' => 'form-control','placeholder' =>'Order Date','value' => set_value('scodate'));
echo form_input($odate);
echo form_error('odate');
?>
                    <label for="odate" class="error"></label>
                  </div>
                </div><hr/>

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

                      <div class="form-group" id="bsdnob1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of Bank </label>
                  <div class="col-sm-9">
                <?php
$bsdnob = array('type' => 'text','name' => 'bsdnob','id' => 'bsdnob','class' => 'form-control','placeholder' =>'Name of Bank','value' => set_value('bsdnob'));
echo form_input($bsdnob);
echo form_error('bsdnob');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="bsddis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$jsdis = array('type' => 'text','name' => 'bsddis','id' => 'bsddis','class' => 'form-control','placeholder' =>'District','value' => set_value('bsddis'));
echo form_input($jsdis);
echo form_error('jsdis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="bsdloc2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Location </label>
                  <div class="col-sm-9">
                 <?php
$bsdloc = array('type' => 'text','name' => 'bsdloc','id' => 'bsdloc','class' => 'form-control','placeholder' =>'Location','value' => set_value('bsdloc'));
echo form_input($bsdloc);
echo form_error('bsdloc');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                <h3 id="spuodertemcov" style="display: none;">Temporary Cover</h3>

                <div class="form-group" id="spuodertc" style="display: none;">
                  <label class="col-sm-3 control-label">Name of District</label>
                  <div class="col-sm-9">
            <?php  
            $rank = array('type' => 'text','name' => 'tcrankoo','id' => 'tcrank','class' => 'form-control','placeholder' =>'Name of District','value' => set_value('tcrank'));
echo form_input($rank);
echo form_error('tcrank');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="spuodertat"  style="display: none;">
                  <label class="col-sm-3 control-label">Temp Att. with</label>
                  <div class="col-sm-9">
           <?php
$des = array('type' => 'text','name' => 'tcdesoo','id' => 'tcdes','class' => 'form-control','placeholder' =>'Designation','value' => set_value('tcdes'));
echo form_input($des);
echo form_error('tcdes');
?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>


 <div class="form-group"  id="spuoderny"  style="display: none;">
                  <label class="col-sm-3 control-label">Order By</label>
                  <div class="col-sm-9">
<?php
$oby = array('type' => 'text','name' => 'tcobyoo','id' => 'tcoby','class' => 'form-control','placeholder' =>'Order By','value' => set_value('tcoby'));
echo form_input($oby);
echo form_error('oby');
?>
                    <label for="oby" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="spuodernyno"  style="display: none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
<?php
$ono = array('type' => 'text','name' => 'tconooo','id' => 'tcono','class' => 'form-control','placeholder' =>'Order No','value' => set_value('tcono'));
echo form_input($ono);
echo form_error('ono');
?>
                    <label for="ono" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="spuodernyod"  style="display: none;">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
<?php
$odate = array('type' => 'text','name' => 'tcodateoo','id' => 'odate','class' => 'form-control','placeholder' =>'Order Date','value' => set_value('tcodate'));
echo form_input($odate);
echo form_error('tcodate');
?>
                    <label for="odate" class="error"></label>
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

                                  <div class="form-group" id="perdupod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place of duty </label>
                  <div class="col-sm-9">
                <?php
$perdupod = array('type' => 'text','name' => 'perdupod','id' => 'perdupod','class' => 'form-control','placeholder' =>'Place of duty','value' => set_value('perdupod'));
echo form_input($perdupod);
echo form_error('perdupod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="perdudis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$perdudis = array('type' => 'text','name' => 'perdudis','id' => 'perdudis','class' => 'form-control','placeholder' =>'District','value' => set_value('perdudis'));
echo form_input($perdudis);
echo form_error('perdudis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="perduorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$perduorno = array('type' => 'text','name' => 'perduorno','id' => 'perduorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('perduorno'));
echo form_input($perduorno);
echo form_error('perduorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="perduordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$perduordate = array('type' => 'text','name' => 'perduordate','id' => 'perduordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('perduordate'));
echo form_input($perduordate);
echo form_error('perduordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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


               <div class="form-group" id="dgppod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place of duty </label>
                  <div class="col-sm-9">
                <?php
$dgppod = array('type' => 'text','name' => 'dgppod','id' => 'dgppod','class' => 'form-control','placeholder' =>'Place of duty','value' => set_value('dgppod'));
echo form_input($dgppod);
echo form_error('dgppod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="dgpdis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$dgpdis = array('type' => 'text','name' => 'dgpdis','id' => 'dgpdis','class' => 'form-control','placeholder' =>'District','value' => set_value('dgpdis'));
echo form_input($dgpdis);
echo form_error('dgpdis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="dgporno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$dgporno = array('type' => 'text','name' => 'dgporno','id' => 'dgporno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('dgporno'));
echo form_input($dgporno);
echo form_error('dgporno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="dgpordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$dgpordate = array('type' => 'text','name' => 'dgpordate','id' => 'dgpordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('dgpordate'));
echo form_input($dgpordate);
echo form_error('dgpordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                             <div class="form-group" id="tertdpod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place of duty </label>
                  <div class="col-sm-9">
                <?php
$tertdpod = array('type' => 'text','name' => 'tertdpod','id' => 'tertdpod','class' => 'form-control','placeholder' =>'Place of duty','value' => set_value('tertdpod'));
echo form_input($tertdpod);
echo form_error('tertdpod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="tertddis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$tertddis = array('type' => 'text','name' => 'tertddis','id' => 'tertddis','class' => 'form-control','placeholder' =>'District','value' => set_value('tertddis'));
echo form_input($tertddis);
echo form_error('tertddis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="tertdorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$tertdorno = array('type' => 'text','name' => 'tertdorno','id' => 'tertdorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('tertdorno'));
echo form_input($tertdorno);
echo form_error('tertdorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="tertdordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$tertdordate = array('type' => 'text','name' => 'tertdordate','id' => 'tertdordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('tertdordate'));
echo form_input($tertdordate);
echo form_error('tertdordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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
                  <label class="col-sm-3 control-label">ANTI RIOT POLICE, PATIALA</label>
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

           <div class="form-group" id="sstgpod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place of duty </label>
                  <div class="col-sm-9">
                <?php
$sstgpod = array('type' => 'text','name' => 'sstgpod','id' => 'sstgpod','class' => 'form-control','placeholder' =>'Place of duty','value' => set_value('sstgpod'));
echo form_input($sstgpod);
echo form_error('sstgpod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="sstgdis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$sstgdis = array('type' => 'text','name' => 'sstgdis','id' => 'sstgdis','class' => 'form-control','placeholder' =>'District','value' => set_value('sstgdis'));
echo form_input($sstgdis);
echo form_error('sstgdis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="sstgorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$sstgorno = array('type' => 'text','name' => 'sstgorno','id' => 'sstgorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('sstgorno'));
echo form_input($sstgorno);
echo form_error('sstgorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="sstgordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$sstgordate = array('type' => 'text','name' => 'sstgordate','id' => 'sstgordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('sstgordate'));
echo form_input($sstgordate);
echo form_error('sstgordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                           <div class="form-group" id="swatpod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place of duty </label>
                  <div class="col-sm-9">
                <?php
$swatpod = array('type' => 'text','name' => 'swatpod','id' => 'swatpod','class' => 'form-control','placeholder' =>'Place of duty','value' => set_value('swatpod'));
echo form_input($swatpod);
echo form_error('swatpod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="swatdis2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">District </label>
                  <div class="col-sm-9">
                 <?php
$swatdis = array('type' => 'text','name' => 'swatdis','id' => 'swatdis','class' => 'form-control','placeholder' =>'District','value' => set_value('swatdis'));
echo form_input($swatdis);
echo form_error('swatdis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="swatorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$swatorno = array('type' => 'text','name' => 'swatorno','id' => 'swatorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('swatorno'));
echo form_input($swatorno);
echo form_error('swatorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="swatordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$swatordate = array('type' => 'text','name' => 'swatordate','id' => 'swatordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('swatordate'));
echo form_input($swatordate);
echo form_error('swatordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                <div class="form-group" id="sqone7" style="display: none;">
                  <label class="col-sm-3 control-label">SOG BHG.,PTL(SPECIAL OPS.GROUP)</label>
                  <div class="col-sm-9">
                 <?php  
$SWATTEAM = array('' => '--Select--', 'SOG BHG.,PTL(SPECIAL OPS.GROUP)' => 'SOG BHG.,PTL(SPECIAL OPS.GROUP)');
 echo form_dropdown('sqone7', $SWATTEAM, set_value('sqone7',''),'id="SWATTEAM" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('sqone7');
 ?>
                  <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="sqone8" style="display: none;">
                  <label class="col-sm-3 control-label">UNMANNED AERIAL VEHICLE (UAV)</label>
                  <div class="col-sm-9">
                  <?php  
$UAVTEAM = array('' => '--Select--', 'UNMANNED AERIAL VEHICLE (UAV)' => 'UNMANNED AERIAL VEHICLE (UAV)');
 echo form_dropdown('sqone8', $UAVTEAM, set_value('sqone8',''),'id="UAVTEAM" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('sqone8');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

<!-- PERMANENT ATTACHMENT START -->

                 <div class="form-group" id="paone1" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT., MOHALI</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTMOHALI = array('' => '--Select--', 'ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI','MT C.M. POOL CHD' => 'MT C.M. POOL CHD');
 echo form_dropdown('paone1', $ATTACHEDWITHDISTTMOHALI, set_value('paone1',''),'id="ATTACHEDWITHDISTTMOHALI" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone1');
 ?>
                     <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="paone22" style="display: none;">
                  <label class="col-sm-3 control-label">DISTT.POLICE MAP WING GUARDS</label>
                  <div class="col-sm-9">
                 <?php  
$DISTTPOLICEMAPWINGGUARDS = array('' => '--Select--', 'AD GUARD CP JALL' => 'AD GUARD CP JALL', 'AD GUARD CP ASR' => 'AD GUARD CP ASR','AD GUARD DISTT MKT' => 'AD GUARD DISTT MKT','AD GUARD DISTT LDH' => 'AD GUARD DISTT LDH','AD GUARD DISTT BTL' => 'AD GUARD DISTT BTL');
 echo form_dropdown('paone22', $DISTTPOLICEMAPWINGGUARDS, set_value('paone1',''),'id="DISTTPOLICEMAPWINGGUARDS" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone22');
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

              <div class="form-group" id="awdpmpod1s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of District </label>
                  <div class="col-sm-9">
                <?php
$awdpmpod = array('type' => 'text','name' => 'awdpmpod','id' => 'awdpmpod','class' => 'form-control','placeholder' =>'Name of District','value' => set_value('awdpmpod'));
echo form_input($awdpmpod);
echo form_error('awdpmpod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="awdpmorno2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$awdpmorno = array('type' => 'text','name' => 'awdpmorno','id' => 'awdpmorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('awdpmorno'));
echo form_input($awdpmorno);
echo form_error('awdpmorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="awdpmordate2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$awdpmordate = array('type' => 'text','name' => 'awdpmordate','id' => 'awdpmordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('awdpmordate'));
echo form_input($awdpmordate);
echo form_error('awdpmordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                              <div class="form-group" id="awdpfpod1s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of District </label>
                  <div class="col-sm-9">
                <?php
$awdpfpod = array('type' => 'text','name' => 'awdpfpod','id' => 'awdpfpod','class' => 'form-control','placeholder' =>'Name of District','value' => set_value('awdpfpod'));
echo form_input($awdpfpod);
echo form_error('awdpfpod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="awdpforno2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$awdpforno = array('type' => 'text','name' => 'awdpforno','id' => 'awdpforno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('awdpforno'));
echo form_input($awdpforno);
echo form_error('awdpforno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="awdpfordate2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$awdpfordate = array('type' => 'text','name' => 'awdpfordate','id' => 'awdpfordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('awdpfordate'));
echo form_input($awdpfordate);
echo form_error('awdpfordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                 <div class="form-group"   id="paone4" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT. POLICE (OTHERS MALE)</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTPOLICEOTHERKINMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)','AD GUARD CP JALL' => 'AD GUARD CP JALL', 'AD GUARD CP ASR' => 'AD GUARD CP ASR','AD GUARD DISTT MKT' => 'AD GUARD DISTT MKT','AD GUARD DISTT LDH' => 'AD GUARD DISTT LDH','AD GUARD DISTT BTL' => 'AD GUARD DISTT BTL');
 echo form_dropdown('paone4', $ATTACHEDWITHDISTTPOLICEOTHERKINMALE, set_value('paone4',''),'id="ATTACHEDWITHDISTTPOLICEOTHERKINMALE" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone4');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                                        <div class="form-group" id="awdpompod1s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of District </label>
                  <div class="col-sm-9">
                <?php
$awdpompod = array('type' => 'text','name' => 'awdpompod','id' => 'awdpompod','class' => 'form-control','placeholder' =>'Name of District','value' => set_value('awdpompod'));
echo form_input($awdpompod);
echo form_error('awdpompod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="awdpomorno2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$awdpomorno = array('type' => 'text','name' => 'awdpomorno','id' => 'awdpomorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('awdpomorno'));
echo form_input($awdpomorno);
echo form_error('awdpomorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="awdpomordate2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$awdpomordate = array('type' => 'text','name' => 'awdpomordate','id' => 'awdpomordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('awdpomordate'));
echo form_input($awdpomordate);
echo form_error('awdpomordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                   <div class="form-group" id="paone5" style="display: none;">
                  <label class="col-sm-3 control-label">ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)</label>
                  <div class="col-sm-9">
                 <?php  
$ATTACHEDWITHDISTTPOLICEOTHERKINFEMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)');
 echo form_dropdown('paone5', $ATTACHEDWITHDISTTPOLICEOTHERKINFEMALE, set_value('paone5',''),'id="ATTACHEDWITHDISTTPOLICEOTHERKINFEMALE" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('paone5');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                                        <div class="form-group" id="awdpofpod1s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of District </label>
                  <div class="col-sm-9">
                <?php
$awdpofpod = array('type' => 'text','name' => 'awdpofpod','id' => 'awdpofpod','class' => 'form-control','placeholder' =>'Name of District','value' => set_value('awdpofpod'));
echo form_input($awdpofpod);
echo form_error('awdpofpod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="awdpoforno2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$awdpoforno = array('type' => 'text','name' => 'awdpoforno','id' => 'awdpoforno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('awdpoforno'));
echo form_input($awdpoforno);
echo form_error('awdpoforno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="awdpofordate2s" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$awdpofordate = array('type' => 'text','name' => 'awdpofordate','id' => 'awdpofordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('awdpofordate'));
echo form_input($awdpofordate);
echo form_error('awdpofordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                <div class="form-group"  id="paone23" style="display: none;">
                  <label class="col-sm-3 control-label">SPECIAL TASK FORCE(STF)</label>
                  <div class="col-sm-9">
                 <?php  
$RTCPAP = array('' => '--Select--', 'SPECIAL TASK FORCE(STF)' => 'SPECIAL TASK FORCE(STF)');
 echo form_dropdown('paone23', $RTCPAP, set_value('paone23',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="paone24" style="display: none;">
                  <label class="col-sm-3 control-label">PPSSOC</label>
                  <div class="col-sm-9">
                 <?php  
$RTCPAP = array('' => '--Select--', 'PPSSOC' => 'PPSSOC');
 echo form_dropdown('paone24', $RTCPAP, set_value('paone24',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
               
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                 <div class="form-group"  id="paone16" style="display: none;">
                  <label class="col-sm-3 control-label">RTC/PAP, JALANDHAR</label>
                  <div class="col-sm-9">
                 <?php  
$RTCPAP = array('' => '--Select--', 'RTC/PAP, JALANDHAR' => 'RTC/PAP, JALANDHAR','Drill Staff' => 'Drill Staff','Law Staff' => 'Law Staff');
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
$vpgurds = array('' => '--Select--', 'ISTC/PAP, KAPURTHALA' => 'ISTC/PAP, KAPURTHALA','Drill Staff' => 'Drill Staff','Law Staff' => 'Law Staff');
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

                <div class="form-group"  id="paone27" style="display: none;">
                  <label class="col-sm-3 control-label">ERSS PROJECT DIAL 112</label>
                  <div class="col-sm-9">
                 <?php  
$erss = array('' => '--Select--', 'ERSS PROJECT DIAL 112' => 'ERSS PROJECT DIAL 112');
 echo form_dropdown('paone27', $erss, set_value('paone27',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>

                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <h3 id="temcov" style="display: none;">Temporary Cover</h3>

                <div class="form-group" id="paone22" style="display: none;">
                  <label class="col-sm-3 control-label">Name of District</label>
                  <div class="col-sm-9">
            <?php  
            $rank = array('type' => 'text','name' => 'tcrank','id' => 'tcrank','class' => 'form-control','placeholder' =>'Name of District','value' => set_value('tcrank'));
echo form_input($rank);
echo form_error('tcrank');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="paone23"  style="display: none;">
                  <label class="col-sm-3 control-label">Temp Att. with</label>
                  <div class="col-sm-9">
           <?php
$des = array('type' => 'text','name' => 'tcdes','id' => 'tcdes','class' => 'form-control','placeholder' =>'Designation','value' => set_value('tcdes'));
echo form_input($des);
echo form_error('tcdes');
?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>


 <div class="form-group"  id="paone24"  style="display: none;">
                  <label class="col-sm-3 control-label">Order By</label>
                  <div class="col-sm-9">
<?php
$oby = array('type' => 'text','name' => 'tcoby','id' => 'tcoby','class' => 'form-control','placeholder' =>'Order By','value' => set_value('tcoby'));
echo form_input($oby);
echo form_error('oby');
?>
                    <label for="oby" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="paone25"  style="display: none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
<?php
$ono = array('type' => 'text','name' => 'tcono','id' => 'tcono','class' => 'form-control','placeholder' =>'Order No','value' => set_value('tcono'));
echo form_input($ono);
echo form_error('ono');
?>
                    <label for="ono" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="paone26"  style="display: none;">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
<?php
$odate = array('type' => 'text','name' => 'tcodate','id' => 'odate','class' => 'form-control','placeholder' =>'Order Date','value' => set_value('tcodate'));
echo form_input($odate);
echo form_error('tcodate');
?>
                    <label for="odate" class="error"></label>
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

            <div class="form-group" id="dsopod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of District </label>
                  <div class="col-sm-9">
                <?php
$dsopod = array('type' => 'text','name' => 'dsopod','id' => 'dsopod','class' => 'form-control','placeholder' =>'Name of District','value' => set_value('dsopod'));
echo form_input($dsopod);
echo form_error('dsopod');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="dsoorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$dsoorno = array('type' => 'text','name' => 'dsoorno','id' => 'dsoorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('dsoorno'));
echo form_input($dsoorno);
echo form_error('dsoorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="dsoordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$dsoordate = array('type' => 'text','name' => 'dsoordate','id' => 'dsoordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('dsoordate'));
echo form_input($dsoordate);
echo form_error('dsoordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                  <div class="form-group" id="csojalorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$csojalorno = array('type' => 'text','name' => 'csojalorno','id' => 'csojalorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('csojalorno'));
echo form_input($csojalorno);
echo form_error('csojalorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="csojalordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$csojalordate = array('type' => 'text','name' => 'csojalordate','id' => 'csojalordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('csojalordate'));
echo form_input($csojalordate);
echo form_error('csojalordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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


                          <div class="form-group" id="mispatorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$mispatorno = array('type' => 'text','name' => 'mispatorno','id' => 'mispatorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('mispatorno'));
echo form_input($mispatorno);
echo form_error('mispatorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="mispatordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$mispatordate = array('type' => 'text','name' => 'mispatordate','id' => 'mispatordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('mispatordate'));
echo form_input($mispatordate);
echo form_error('mispatordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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


                <div class="form-group" id="othersnod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Nature of Duty </label>
                  <div class="col-sm-9">
                 <?php
$othersnod = array('type' => 'text','name' => 'othersnod','id' => 'othersnod','class' => 'form-control','placeholder' =>'Nature of Duty','value' => set_value('othersnod'));
echo form_input($othersnod);
echo form_error('othersnod');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="othersordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of district </label>
                  <div class="col-sm-9">
                 <?php
$othersnodis = array('type' => 'text','name' => 'othersnodis','id' => 'othersnodis','class' => 'form-control','placeholder' =>'Name of district','value' => set_value('othersnodis'));
echo form_input($othersnodis);
echo form_error('othersnodis');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>
                      <div class="form-group" id="othersorno2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$othersorno = array('type' => 'text','name' => 'othersorno','id' => 'othersorno','class' => 'form-control','placeholder' =>'Order No.','value' => set_value('othersorno'));
echo form_input($othersorno);
echo form_error('othersorno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="csojalordate2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order date </label>
                  <div class="col-sm-9">
                 <?php
$othersordate = array('type' => 'text','name' => 'othersordate','id' => 'othersordate','class' => 'form-control','placeholder' =>'Order date','value' => set_value('othersordate'));
echo form_input($othersordate);
echo form_error('othersordate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                <!-- AVAILABLE WITH BNs. -->

                  <div class="form-group"  id="awbone1" style="display: none;">
                  <label class="col-sm-3 control-label">PAP CAMPUS  SECURITY,BN. KOT GUARDS,BN. HQRS OTHER GUARDS</label>
                  <div class="col-sm-9">
                 <?php  
$PAPCAMPUSSECURITY = array('' => '--Select--', 'PAP CAMPUS  SECURITY' => 'PAP CAMPUS  SECURITY','BN. KOT GUARDS' => 'BN. KOT GUARDS','BN. HQRS OTHER GUARDS' => 'BN. HQRS OTHER GUARDS','STATIC GUARD CR' => 'STATIC GUARD CR');
 echo form_dropdown('awbone1', $PAPCAMPUSSECURITY, set_value('awbone1',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <!-- <div class="form-group" id="awbone2" style="display: none;">
                  <label class="col-sm-3 control-label">PERSONAL SECURITY STAFF ARMED WING OFFICER</label>
                  <div class="col-sm-9">
                 <?php  
/*$PERSONALSECURITYSTAFFARMEDWINGOFFICER = array('' => '--Select--', 'PERSONAL SECURITY STAFF ARMED WING OFFICER' => 'PERSONAL SECURITY STAFF ARMED WING OFFICER');
 echo form_dropdown('awbone2', $PERSONALSECURITYSTAFFARMEDWINGOFFICER, set_value('awbone2',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('pa28');*/
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div> -->


          <!-- <h3 id="seccovers" style="display: none;">Security Cover</h3>
                 <div class="form-group" id="awbones1" style="display: none;">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
<?php
/*$name = array('type' => 'text','name' => 'scnames','id' => 'name','class' => 'form-control','placeholder' =>'Name','value' => set_value('scname'));
echo form_input($name);
echo form_error('scname');*/
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="awbones2" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
/*$RankRankre = array('' => '--Select--', 'DGP' => 'DGP', 'ADGP' => 'ADGP', 'IGP' => 'IGP', 'DIG' => 'DIG', 'AIG' => 'AIG', 'SSP' => 'SSP','SP' => 'SP',  'DSP' => 'DSP','INSPR' => 'INSPR');
 echo form_dropdown('scranks', $RankRankre, set_value('scrank',''),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');*/
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="awbones3" style="display: none;">
                  <label class="col-sm-3 control-label">Designation</label>
                  <div class="col-sm-9">
           <?php
/*$des = array('type' => 'text','name' => 'scdess','id' => 'des','class' => 'form-control','placeholder' =>'Designation','value' => set_value('scdes'));
echo form_input($des);
echo form_error('scdes');*/
?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="awbones4" style="display: none;">
                  <label class="col-sm-3 control-label">Place of Posting</label>
                  <div class="col-sm-9">
<?php
/*$pop = array('type' => 'text','name' => 'scpops','id' => 'pop','class' => 'form-control','placeholder' =>'Place of Posting','value' => set_value('scpop'));
echo form_input($pop);
echo form_error('scpop');*/
?>
                    <label for="pop" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="awbones5" style="display: none;">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
<?php
/*$scaddressp = array('type' => 'text','name' => 'scaddressp','id' => 'scaddressp','class' => 'form-control','placeholder' =>'Address','value' => set_value('scaddressp'));
echo form_input($scaddressp);
echo form_error('scaddressp');*/
?>
                    <label for="sno" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="awbones6" style="display: none;">
                  <label class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
<?php
/*$mob = array('type' => 'text','name' => 'scmobs','id' => 'mob','class' => 'form-control','placeholder' =>'Mobile','value' => set_value('scmob'));
echo form_input($mob);
echo form_error('mob');*/
?>
                    <label for="mob" class="error"></label>
                  </div>
                </div>


 <div class="form-group" id="awbones7" style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
<?php
/*$nod = array('' => '--Select--','Gunman' => 'Gunman','Driver' => 'Driver', 'Reader' => 'Reader', 'Guard' => 'Guard', 'PSO' => 'PSO','Office Orderly' => 'Office Orderly','Dak Runner' => 'Dak Runner','Leave Reserve' => 'Leave Reserve');
 echo form_dropdown('scnods', $nod, set_value('scnod',''),'id="nod" data-placeholder="Choose One" class="select2"'); 
 echo form_error('nod');*/
?>
                    <label for="sno" class="error"></label>
                  </div>
                </div>

 <div class="form-group" id="awbones8" style="display: none;">
                  <label class="col-sm-3 control-label">Order By</label>
                  <div class="col-sm-9">
<?php
/*$oby = array('type' => 'text','name' => 'scobys','id' => 'oby','class' => 'form-control','placeholder' =>'Order By','value' => set_value('scoby'));
echo form_input($oby);
echo form_error('oby');*/
?>
                    <label for="oby" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="awbones9" style="display: none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
<?php
/*$ono = array('type' => 'text','name' => 'sconos','id' => 'ono','class' => 'form-control','placeholder' =>'Order No','value' => set_value('scono'));
echo form_input($ono);
echo form_error('ono');*/
?>
                    <label for="ono" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="awbones10" style="display: none;">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
<?php
/*$odate = array('type' => 'text','name' => 'scodates','id' => 'odate','class' => 'form-control','placeholder' =>'Order Date','value' => set_value('scodate'));
echo form_input($odate);
echo form_error('odate');*/
?>
                    <label for="odate" class="error"></label>
                  </div>
                </div> -->

                  <div class="form-group" id="awbone3" style="display: none;">
                  <label class="col-sm-3 control-label">OFFICE STAFF IN HIGHER OFFICES</label>
                  <div class="col-sm-9">
                 <?php  
$OFFICESTAFFINHIGHEROFFICES = array('' => '--Select--', 'OFFICE STAFF IN HIGHER OFFICES' => 'OFFICE STAFF IN HIGHER OFFICES','CONTROL ROOM PAP' => 'CONTROL ROOM PAP' );
 echo form_dropdown('awbone3', $OFFICESTAFFINHIGHEROFFICES, set_value('awbone3',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="osihonoo2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of office </label>
                  <div class="col-sm-9">
                 <?php
$osihonoo = array('type' => 'text','name' => 'osihonoo','id' => 'osihonoo','class' => 'form-control','placeholder' =>'Name of office','value' => set_value('osihonoo'));
echo form_input($osihonoo);
echo form_error('osihonoo');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                  <div class="form-group"  id="awbone5" style="display: none;">
                  <label class="col-sm-3 control-label">OFFICE STAFF IN BN. OFFICE</label>
                  <div class="col-sm-9">
                 <?php  
$OFFICESTAFFINBNOFFICE = array('' => '--Select--', 'Commandant office' => 'Commandant office', 'Asstt. Comdt. office' => 'Asstt. Comdt. office', 'Dy.S.P. office' => 'Dy.S.P. office', 'English Branch' => 'English Branch','Account Branch' => 'Account Branch' , 'OSI Branch' => 'OSI Branch', 'Litigation Branch' => 'Litigation Branch', 'Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer Cell' => 'Computer Cell','Control Room' => 'Control Room','Reader to INSP' => 'Reader to INSP','CCTNS office' => 'CCTNS office','Nodal Officer' => 'Nodal Officer','Recruitment Cell' => 'Recruitment Cell','Photostate Machine operator' => 'Photostate Machine operator','Battalion Hqr.' => 'Battalion Hqr.');
 echo form_dropdown('awbone4', $OFFICESTAFFINBNOFFICE, set_value('awbone4',''),'id="awbone4" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Readerosinbo1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Staff </label>
                  <div class="col-sm-9">
                 <?php
                  $Readerosinbo = array('' => '--Select--','Reader' => 'Reader','Orderly' => 'Orderly','Telphone operator' => 'Telphone operator','Dak Runner' => 'Dak Runner','A/Reader' => 'A/Reader');
                  echo form_dropdown('Readerosinbo', $Readerosinbo, set_value('Readerosinbo',''),'id="Readerosinbo" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                  echo form_error('Readerosinbo');
                ?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                <div class="form-group" id="Orderly1i" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Orderly </label>
                  <div class="col-sm-9">
                  <?php
                  $Orderly = array('' => '--Select--','Orderly' => 'Orderly');
                  echo form_dropdown('Orderly', $Orderly, set_value('Orderly',''),'id="Readerosinbo" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                  echo form_error('Orderly');
                ?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                <div class="form-group" id="telopr1i" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Telphone operator </label>
                  <div class="col-sm-9">
                  <?php
                  $telopr = array('' => '--Select--','Telphone operator' => 'Telphone operator');
                  echo form_dropdown('telopr', $telopr, set_value('telopr',''),'id="telopr" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                  echo form_error('telopr');
                ?>
                 
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                 <div class="form-group" id="darrun1i" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Dak Runner </label>
                  <div class="col-sm-9">
                 <?php
                 $darrun = array('' => '--Select--','Dak Runner' => 'Dak Runner');
                  echo form_dropdown('darrun', $darrun, set_value('darrun',''),'id="darrun" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                  echo form_error('darrun')
                  ?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                <!--  <div class="form-group" id="awbone6" style="display: none;">
                  <label class="col-sm-3 control-label">BN KOT GUARD</label>
                  <div class="col-sm-9">
                 <?php  
/*$BNKOTGUARD = array('' => '--Select--', 'BN KOT GUARD' => 'BN KOT GUARD');
 echo form_dropdown('awbone5', $BNKOTGUARD, set_value('awbone5',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');*/
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div> -->


                <!--   <div class="form-group" id="bnkgdop1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Date of Posting</label>
                  <div class="col-sm-9">
                 <?php
/*$bnkgdop = array('type' => 'text','name' => 'bnkgdop','id' => 'bnkgdop','class' => 'form-control','placeholder' =>'Date of Posting','value' => set_value('bnkgdop'));
echo form_input($bnkgdop);
echo form_error('bnkgdop');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->

                 <!-- <div class="form-group"  id="awbone7" style="display: none;">
                  <label class="col-sm-3 control-label">BN. HQRS. OTHER GUARD</label>
                  <div class="col-sm-9">
                 <?php  
/*$BNHQRSOTHERGUARD = array('' => '--Select--', 'BN. HQRS.  OTHER GUARD' => 'BN. HQRS.  OTHER GUARD','STATIC GUARD CR' => 'STATIC GUARD CR');
 echo form_dropdown('awbone6', $BNHQRSOTHERGUARD, set_value('awbone6',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone6');*/
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div> -->

                <!-- <div class="form-group" id="bhogpog1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place of Guard</label>
                  <div class="col-sm-9">
                 <?php
/*$bhogpog = array('type' => 'text','name' => 'bhogpog','id' => 'bhogpog','class' => 'form-control','placeholder' =>'Place of Guard','value' => set_value('bhogpog'));
echo form_input($bhogpog);
echo form_error('bhogpog');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->


              <!--  <div class="form-group" id="bhogdop1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Date of Posting</label>
                  <div class="col-sm-9">
                 <?php
/*$bhogdop = array('type' => 'text','name' => 'bhogdop','id' => 'bhogdop','class' => 'form-control','placeholder' =>'Date of Posting','value' => set_value('bhogdop'));
echo form_input($bhogdop);
echo form_error('bhogdop');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->

                  <div class="form-group"  id="awbone8" style="display: none;">
                  <label class="col-sm-3 control-label">TRADEMEN</label>
                  <div class="col-sm-9">
                 <?php  
$TRADESMEN = array('' => '--Select--', 'TRADEMEN' => 'TRADEMEN');
 echo form_dropdown('awbone7', $TRADESMEN, set_value('awbone7',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone7');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


        <div class="form-group" id="tradestot1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Type of trade</label>
                  <div class="col-sm-9">
                 <?php
$tradestot = array('type' => 'text','name' => 'tradestot','id' => 'tradestot','class' => 'form-control','placeholder' =>'Type of trade','value' => set_value('tradestot'));
echo form_input($tradestot);
echo form_error('tradestot');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="tradestt2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Technical Team</label>
                  <div class="col-sm-9">
                 <?php
$tradestt = array('type' => 'text','name' => 'tradestt','id' => 'tradestt','class' => 'form-control','placeholder' =>'Technical Team','value' => set_value('tradestt'));
echo form_input($tradestt);
echo form_error('tradestt');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="tradesbat1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Battalion</label>
                  <div class="col-sm-9">
                 <?php
$tradesbat = array('type' => 'text','name' => 'tradesbat','id' => 'tradesbat','class' => 'form-control','placeholder' =>'Battalion','value' => set_value('tradesbat'));
echo form_input($tradesbat);
echo form_error('tradesbat');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

        <!--    <div class="form-group" id="tradesdop1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Date of Posting</label>
                  <div class="col-sm-9">
                 <?php
/*$tradesdop = array('type' => 'text','name' => 'tradesdop','id' => 'tradesdop','class' => 'form-control','placeholder' =>'Date of Posting','value' => set_value('tradesdop'));
echo form_input($tradesdop);
echo form_error('tradesdop');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->

                   <!--  <div class="form-group" id="tradesorno1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No</label>
                  <div class="col-sm-9">
                 <?php
/*$tradesorno = array('type' => 'text','name' => 'tradesorno','id' => 'tradesorno','class' => 'form-control','placeholder' =>'Order No','value' => set_value('tradesorno'));
echo form_input($tradesorno);
echo form_error('tradesorno');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->

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



          <div class="form-group" id="mtsecpod1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place of Duty</label>
                  <div class="col-sm-9">
                 <?php
$mtsecpod = array('type' => 'text','name' => 'mtsecpod','id' => 'mtsecpod','class' => 'form-control','placeholder' =>'Place of Duty','value' => set_value('mtsecpod'));
echo form_input($mtsecpod);
echo form_error('mtsecpod');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

          <div class="form-group" id="mtsecvehno1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Vehicle No.</label>
                  <div class="col-sm-9">
                 <?php
$mtsecvehno = array('type' => 'text','name' => 'mtsecvehno','id' => 'mtsecvehno','class' => 'form-control','placeholder' =>'Vehicle No.','value' => set_value('mtsecvehno'));
echo form_input($mtsecvehno);
echo form_error('mtsecvehno');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

           <!-- <div class="form-group" id="mtsecdop1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Date of Posting</label>
                  <div class="col-sm-9">
                 <?php
/*$mtsecdop = array('type' => 'text','name' => 'mtsecdop','id' => 'mtsecdop','class' => 'form-control','placeholder' =>'Date of Posting','value' => set_value('mtsecdop'));
echo form_input($mtsecdop);
echo form_error('mtsecdop');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->

                 <!--    <div class="form-group" id="mtsecorno1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order No</label>
                  <div class="col-sm-9">
                 <?php
/*$mtsecorno = array('type' => 'text','name' => 'mtsecorno','id' => 'mtsecorno','class' => 'form-control','placeholder' =>'Order No','value' => set_value('mtsecorno'));
echo form_input($mtsecorno);
echo form_error('mtsecorno');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->
                <div class="form-group" id="awbone10" style="display: none;">
                  <label class="col-sm-3 control-label">ARMOURER & A/ARMOURER
</label>
                  <div class="col-sm-9">
                 <?php  
$armuu = array('' => '--Select--','Armourer & A/Armourer' => 'Armourer & A/Armourer');
 echo form_dropdown('awbone13', $armuu, set_value('awbone13',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone13');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="awbone10" style="display: none;">
                  <label class="col-sm-3 control-label">QUARTERMASTER BRANCH (LINE STAFF)
</label>
                  <div class="col-sm-9">
                 <?php  
$QUARTERMASTERBRANCHLINESTAFF = array('' => '--Select--', 'Reserve Inspector' => 'Reserve Inspector','Line Officer' => 'Line Officer','BHM & A/BHM' => 'BHM & A/BHM','MHC & A/MHC' => 'MHC & A/MHC','Reader/Orderly to RI' => 'Reader/Orderly to RI','I/C MESS' => 'I/C MESS','Asst. I/C MESS' => 'Asst. I/C MESS', 'CDI' => 'CDI','CDO & A/CDO' => 'CDO & A/CDO','Quarter Master INSP' => 'Quarter Master INSP','MSK Branch' => 'MSK Branch','KHC & A/KHC' => 'KHC & A/KHC','I/C Class-IV' => 'I/C Class-IV','Quarter Munshi & Asstt.' => 'Quarter Munshi & Asstt.','I/C Canteen & Grossary Shop' => 'I/C Canteen & Grossary Shop','CHC' => 'CHC','Dak Runner' => 'Dak Runner','I/C GO Mess' => 'I/C GO Mess','I/C Hospital' => 'I/C Hospital');
 echo form_dropdown('awbone9', $QUARTERMASTERBRANCHLINESTAFF, set_value('awbone9',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone9');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>
                 <!--  <div class="form-group" id="quartbradop1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Date of Posting</label>
                  <div class="col-sm-9">
                 <?php
/*$quartbradop = array('type' => 'text','name' => 'quartbradop','id' => 'quartbradop','class' => 'form-control','placeholder' =>'Date of Posting','value' => set_value('quartbradop'));
echo form_input($quartbradop);
echo form_error('quartbradop');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->

               <!--  <div class="form-group" id="quartbraorno1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Order no</label>
                  <div class="col-sm-9">
                 <?php
/*$quartbraorno = array('type' => 'text','name' => 'quartbraorno','id' => 'quartbraorno','class' => 'form-control','placeholder' =>'Order no','value' => set_value('quartbraorno'));
echo form_input($quartbraorno);
echo form_error('quartbraorno');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->

                <div class="form-group" id="awbone11" style="display: none;">
                  <label class="col-sm-3 control-label">GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY
</label>
                  <div class="col-sm-9">
                 <?php  
$GENERALDUTYBNHQRS = array('' => '--Select--', 'GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY' => 'GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY');
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
                  <label class="col-sm-3 control-label">OTHER DUTIES
</label>
                  <div class="col-sm-9">
                 <?php  
$RECRUITMENTDUTY = array('' => '--Select--', 'OTHER DUTIES' => 'OTHER DUTIES');
 echo form_dropdown('awbone12', $RECRUITMENTDUTY, set_value('awbone12',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone12');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="recrutnorb1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Name of Duty</label>
                  <div class="col-sm-9">
                 <?php
$recrutnorb = array('type' => 'text','name' => 'recrutnorb','id' => 'recrutnorb','class' => 'form-control','placeholder' =>'Name of Duty','value' => set_value('recrutnorb'));
echo form_input($recrutnorb);
echo form_error('recrutnorb');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

               <!--  <div class="form-group" id="recrutorno1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Duty Order no</label>
                  <div class="col-sm-9">
                 <?php
/*$recrutorno = array('type' => 'text','name' => 'recrutorno','id' => 'recrutorno','class' => 'form-control','placeholder' =>'Duty Order no','value' => set_value('recrutorno'));
echo form_input($recrutorno);
echo form_error('recrutorno');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div> -->


               <!--   <div class="form-group" id="recrutordate1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Duty Order date</label>
                  <div class="col-sm-9">
                 <?php
/*$recrutordate = array('type' => 'text','name' => 'recrutordate','id' => 'recrutordate','class' => 'form-control','placeholder' =>'Duty Order date','value' => set_value('recrutordate'));
echo form_input($recrutordate);
echo form_error('recrutordate');*/
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>
 -->
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
$LEAVE = array('' => '--Select--', 'Earned Leave' => 'Earned Leave','Casual Leave' => 'Casual Leave','Paternity Leave'  => 'Paternity Leave','Medical Leave'  => 'Medical Leave','Ex-India Leave' => 'Ex-India Leave','Others' => 'Others');
 echo form_dropdown('bmdone2', $LEAVE, set_value('bmdone2',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone2');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="leavefrom2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">From</label>
                  <div class="col-sm-9">
                 <?php
$leavefrom = array('type' => 'text','name' => 'leavefrom','id' => 'leavefrom','class' => 'form-control','placeholder' =>'From','value' => set_value('leavefrom'));
echo form_input($leavefrom);
echo form_error('leavefrom');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>


                 <div class="form-group" id="leaveto2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">To</label>
                  <div class="col-sm-9">
                 <?php
$leaveto = array('type' => 'text','name' => 'leaveto','id' => 'leaveto','class' => 'form-control','placeholder' =>'To','value' => set_value('leaveto'));
echo form_input($leaveto);
echo form_error('leaveto');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                 <div class="form-group" id="absentfrom1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Absent From</label>
                  <div class="col-sm-9">
                 <?php
$absentfrom = array('type' => 'text','name' => 'absentfrom','id' => 'absentfrom','class' => 'form-control','placeholder' =>'Absent From','value' => set_value('absentfrom'));
echo form_input($absentfrom);
echo form_error('absentfrom');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>


                 <div class="form-group" id="absentddr2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">DDR No.</label>
                  <div class="col-sm-9">
                 <?php
$absentddr = array('type' => 'text','name' => 'absentddr','id' => 'absentddr','class' => 'form-control','placeholder' =>'DDR No.','value' => set_value('absentddr'));
echo form_input($absentddr);
echo form_error('absentddr');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                   <div class="form-group" id="Date2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Date</label>
                  <div class="col-sm-9">
                 <?php
$absentdate = array('type' => 'text','name' => 'absentdate','id' => 'absentdate','class' => 'form-control','placeholder' =>'Date','value' => set_value('absentdate'));
echo form_input($absentdate);
echo form_error('absentdate');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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


                 <div class="form-group" id="usdos2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Date of suspension</label>
                  <div class="col-sm-9">
                 <?php
$usdos = array('type' => 'text','name' => 'usdos','id' => 'usdos','class' => 'form-control','placeholder' =>'Date of suspension','value' => set_value('usdos'));
echo form_input($usdos);
echo form_error('usdos');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
                </div>

                   <div class="form-group" id="usros2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Reason of suspension</label>
                  <div class="col-sm-9">
                 <?php
$usros = array('type' => 'text','name' => 'usros','id' => 'usros','class' => 'form-control','placeholder' =>'Reason of suspension','value' => set_value('usros'));
echo form_input($usros);
echo form_error('usros');
?>
                    <label for="fx1" class="error"></label>
                  </div><hr/>
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

                  <div class="form-group"  id="bmdone8" style="display: none;">
                  <label class="col-sm-3 control-label">Chronic Disease on light duty
</label>
                  <div class="col-sm-9">
                 <?php  
$ChronicDiseaseonMedicalResti = array('' => '--Select--', 'Chronic Disease on light duty' => 'Chronic Disease on light duty');
 echo form_dropdown('bmdone7', $ChronicDiseaseonMedicalResti, set_value('bmdone7',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone7');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="bmdone10" style="display: none;">
                  <label class="col-sm-3 control-label">Chronic Disease on Medical Rest
</label>
                  <div class="col-sm-9">
                 <?php  
$ChronicDiseaseonMedicalRest = array('' => '--Select--', 'Chronic Disease on Medical Rest' => 'Chronic Disease on Medical Rest');
 echo form_dropdown('bmdone8', $ChronicDiseaseonMedicalRest, set_value('bmdone8',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone8');
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
 echo form_dropdown('bmdone9', $OSDETC, set_value('bmdone9',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('bmdone9');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <!-- INSTITUTIONS START -->

                   <div class="form-group"  id="instone5" style="display: none;">
                  <label class="col-sm-3 control-label">PAP HQRS INSTITUTIONS</label>
                  <div class="col-sm-9">
 <?php  
$Institutionsti = array('' => '--Select--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','BUGGLER' => 'BUGGLER','T/A 7th Bn PAP for Driver Duty' => 'T/A 7th Bn PAP for Driver Duty','U/7th PAP for out Rider duty on Motor Cycle' => 'U/7th PAP for out Rider duty on Motor Cycle','M.T WORKSHOP U/7th BN PAP' => 'M.T WORKSHOP U/7th BN PAP','PAP House' => 'PAP House','Camp Cleaning U/7th BN.PAP' => 'Camp Cleaning U/7th BN.PAP', 'A/A Punjab State U/7th BN.PAP' =>  'A/A Punjab State U/7th BN.PAP','RTC Band Staff Under RTC' => 'RTC Band Staff Under RTC','ERMS (Office automation)' => 'ERMS (Office automation)','Petrol Pump' => 'Petrol Pump');
 echo form_dropdown('instone10', $Institutionsti, set_value('instone10',''),'id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('irb5');
 ?>
                    <label for="Institutionsti" class="error"></label>
                  </div>
                </div>

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
                  <label class="col-sm-3 control-label">ISTC INSTITUTIONS</label>
                  <div class="col-sm-9">
 <?php  
$Institutionsti = array('' => '--Select--', 'Drill Staff' => 'Drill Staff', 'Law Staff' => 'Law Staff');
 echo form_dropdown('instone4', $Institutionsti, set_value('instone4',''),'id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('irb5');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


 

<!-- TRANING START -->
         <div class="form-group" id="traning1" style="display: none;">
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

                      <div class="form-group" id="bastraing1"  style="display: none;">
                  <label class="col-sm-3 control-label text-right">Training Institute</label>
                  <div class="col-sm-9">
                 <?php  
$TrainingInstituteti = array('' => '--Select--', 'Deferred Basic Training Sports Person' => 'Deferred Basic Training Sports Person', 'Deferred basic training Medical Rest' => 'Deferred basic training Medical Rest', 'RTCI' => 'RTC','ISTC' => 'ISTC','CTC BHG' =>'CTC BHG', 'PPA Phillaur' =>'PPA Phillaur', 'PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','CTC BHG' => 'CTC BHG' ,'CTC BHG PTL' => 'CTC BHG PTL','ISTC KPT' => 'ISTC KPT', 'ISTC KPT.' => 'ISTC KPT.', 'ISTC/KPT' => 'ISTC/KPT','PPA PHR' => 'PPA PHR','PPA PHR.' => 'PPA PHR.', 'PPA/PHR' => 'PPA/PHR','RTC' => 'RTC','RTC BHG PTL' => 'RTC BHG PTL', 'RTC BHG PTL.' => 'RTC BHG PTL.','RTC L/SGR.' => 'RTC L/SGR.', 'RTC PAP JRC' => 'RTC PAP JRC','RTC PAP JRC' => 'RTC PAP JRC','RTC/PAP' => 'RTC/PAP');
 echo form_dropdown('btarin1', $TrainingInstituteti, set_value('btarin1',1),'id="TrainingInstituteti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('btarin1');
 ?>
                    <label for="TrainingInstituteti" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="bastraing2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Batch Group</label>
                  <div class="col-sm-9">
<?php
$Batchbn = array('type' => 'text','name' => 'btarin2','id' => 'Batchbn','class' => 'form-control','placeholder' =>'Batch Group','value' => set_value('btarin2'));
echo form_input($Batchbn);
echo form_error('btarin2');
?>
                    <label for="Batchbn" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="bastraing3" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Batch Passing Years</label>
                  <div class="col-sm-9">
                     <select name="btarin3" class="select2">
                     <option value="">--Select--</option>
                    <?php for ($i=1970; $i <2017 ; $i++) { 
                      if($i == 1){
                        echo '<option value="'.$i.'">'.$i.' </option>';
                      }else{
                        echo '<option value="'.$i.'">'.$i.'</option>';
                      }
                      
                    } ?>

                  </select>
        
                    <label for="batchpassdate" class="error"></label>
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

                          <div class="form-group" id="bastraing4"  style="display:none">
                  <label class="col-sm-3 control-label text-right">Training Institute</label>
                  <div class="col-sm-9">
                 <?php  
$TrainingInstitutessti = array('' => '--Select--',  'RTCI' => 'RTC','ISTC' => 'ISTC','CTC BHG' =>'CTC BHG', 'PPA Phillaur' =>'PPA Phillaur', 'PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','Other' => 'Other');
 echo form_dropdown('btarin4', $TrainingInstitutessti, set_value('btarin4',1),'id="TrainingInstitutessti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('TrainingInstitutessti');
 ?>
                    <label for="TrainingInstitutessti" class="error"></label>
                  </div>
                </div>


 <div class="form-group" id="bastraing6"  style="display:none">
                  <label class="col-sm-3 control-label text-right">Name of Course</label>
                  <div class="col-sm-9">
<?php
$NamesofsCourses = array('type' => 'text','name' => 'btarin5','id' => 'NamesofsCourses','class' => 'form-control','placeholder' =>'Name of Course','value' => set_value('btarin5'));
echo form_input($NamesofsCourses);
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>

           <div class="form-group" id="bastraing7"  style="display:none">
                  <label class="col-sm-3 control-label text-right">Duration of Course</label>
                  <div class="col-sm-9">
                  <div class="col-xs-3">
<?php
$DurationsofsCourses = array('type' => 'text','name' => 'btarin6','id' => 'DurationsofsCourses','class' => 'form-control','placeholder' =>'From','value' => set_value('btarin6'));
echo form_input($DurationsofsCourses);
echo form_error('DurationsofsCourses');
?>
                    <label for="DurationsofsCourses" class="error"></label>
                    </div>
                    <div class="col-xs-3">
<?php
$DurationsofsCoursest = array('type' => 'text','name' => 'btarin7','id' => 'DurationsofsCoursest','class' => 'form-control','placeholder' =>'To','value' => set_value('btarin7'));
echo form_input($DurationsofsCoursest);
echo form_error('DurationsofsCoursest');
?>
                    <label for="DurationsofsCoursest" class="error"></label>
                    </div>
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

                          <div class="form-group" id="bastraing8"  style="display:none">
                  <label class="col-sm-3 control-label text-right">Training Institute</label>
                  <div class="col-sm-9">
                 <?php  
$TrainingInstitutessti = array('' => '--Select--',  'RTCI' => 'RTC','ISTC' => 'ISTC','CTC BHG' =>'CTC BHG', 'PPA Phillaur' =>'PPA Phillaur', 'PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','Other' => 'Other');
 echo form_dropdown('btarin8', $TrainingInstitutessti, set_value('btarin8',1),'id="TrainingInstitutessti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('TrainingInstitutessti');
 ?>
                    <label for="TrainingInstitutessti" class="error"></label>
                  </div>
                </div>

                


 <div class="form-group" id="bastraing9"  style="display:none">
                  <label class="col-sm-3 control-label text-right">Name of Course</label>
                  <div class="col-sm-9">
<?php
$NamesofsCourses = array('type' => 'text','name' => 'btarin9','id' => 'btarin9','class' => 'form-control','placeholder' =>'Name of Course','value' => set_value('NamesofsCourses'));
echo form_input($NamesofsCourses);
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>

           <div class="form-group" id="bastraing10"  style="display:none">
                  <label class="col-sm-3 control-label text-right">Duration of Course</label>
                  <div class="col-sm-9">
                  <div class="col-xs-3">
                 
<?php
$DurationsofsCourses = array('type' => 'text','name' => 'btarin10','id' => 'DurationsofsCourses','class' => 'form-control','placeholder' =>'From','value' => set_value('btarin10'));
echo form_input($DurationsofsCourses);
echo form_error('DurationsofsCourses');
?>
                    <label for="DurationsofsCourses" class="error"></label>
                    </div>
                    <div class="col-xs-3">
<?php
$DurationsofsCoursest = array('type' => 'text','name' => 'btarin11','id' => 'DurationsofsCoursest','class' => 'form-control','placeholder' =>'To','value' => set_value('btarin11'));
echo form_input($DurationsofsCoursest);
echo form_error('DurationsofsCoursest');
?>
</div>
                    <label for="DurationsofsCoursest" class="error"></label>
                    </div>
                  </div>
                </div>


<div class="form-group" id="classf1" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Place Of Duty </label>
                  <div class="col-sm-9">
                <?php
$dsopod = array('type' => 'text','name' => 'classf1','id' => 'dsopod','class' => 'form-control','placeholder' =>'Place Of Duty','value' => set_value('classf1'));
echo form_input($dsopod);
echo form_error('classf1');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>

          <div class="form-group" id="classf2" style="display: none;">
                  <label class="col-sm-3 control-label text-right">Nature of Duty </label>
                  <div class="col-sm-9">
                 <?php
$dsoorno = array('type' => 'text','name' => 'classf2','id' => 'dsoorno','class' => 'form-control','placeholder' =>'Present duty','value' => set_value('classf2'));
echo form_input($dsoorno);
echo form_error('classf2');
?>
                    <label for="fx1" class="error"></label>
                  </div>
                </div>
<br/>
                 <div class="form-group"  id="dofposting1"  style="display: none;">
                  <label class="col-sm-3 control-label">Date of Posting</label>
                  <div class="col-sm-9">
                  <div class='input-group'>
<?php
$dateofposting1 = array('type' => 'text','name' => 'dateofposting1','id' => 'dateofposting1','class' => 'form-control','placeholder' =>'Date of Posting','value' => set_value('dateofposting1'));
echo form_input($dateofposting1);
echo form_error('dateofposting1');
?>
 <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                    <label for="dateofposting1" class="error"></label>
                  </div>
                </div><br/>
               <?php   } ?>

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
jQuery('#dateofposting1').datepicker({dateFormat: "dd/mm/yy"});


});

  $(document).on('change', '#awbone4', function() {
    if(this.value == 'Commandant office'){
     $('#Readerosinbo1,#Orderly1,#telopr1,#darrun1').show();
   } else if(this.value == 'Asstt. Comdt. office'){
     $('#Readerosinbo1,#Orderly1').show();
     $('#telopr1,#darrun1').hide();
   }else if(this.value == 'Dy.S.P. office'){
     $('#Readerosinbo1,#Orderly1').show();
     $('#telopr1,#darrun1').hide();
   }else{
    $('#Readerosinbo1,#Orderly1,#telopr1,#darrun1').hide();
   }
  
});

  

   $(document).on('change', '#PSOSGUNMAN', function() {
    if(this.value == 'Admin Staff'){
     $('#adminstaff').show();
   }else{
    $('#adminstaff').hide();
   }
  
});

   $(document).on('change', '#SPECIALPROTECTIONUNIT', function() {
    if(this.value == 'SPECIAL PROTECTION UNIT (C.M. SEC.)'){
     $('#spuodertemcov,#spuodertc,#spuodertat,#spuoderny,#spuodernyno,#spuodernyod').show();
   }else{
    $('#spuodertemcov,#spuodertc,#spuodertat,#spuoderny,#spuodernyno,#spuodernyod').hide();
   }
  
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
    $('#dofposting1').show();
     $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover').show();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').show();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();

     $('#lone1,#lone2,#lone3').hide();
     $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
     $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
    $('#classf1,#classf2,#classf3').hide();
   }else if(this.value == 'Law & Order Duty'){
    $('#dofposting1').show();
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').show();
    $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').show();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
     $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
    $('#classf1,#classf2,#classf3').hide();
   }else if(this.value == 'Special Squads'){
    $('#dofposting1').show();
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').show();
    $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').show();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
    $('#classf1,#classf2,#classf3').hide();
   }else if(this.value == 'Permanent Attachment'){
    $('#dofposting1').show();
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').show();
    $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').show();


     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
      $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();

    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#classf1,#classf2,#classf3').hide();
   }else if(this.value == 'Training'){
    $('#dofposting1').show();
    $('#traning1,#traning2,#traning3').show();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').show();
     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
        $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#classf1,#classf2,#classf3').hide();
   }else if(this.value == 'Sports'){
    $('#dofposting1').show();
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').show();
    $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').show();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();

    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
    $('#classf1,#classf2,#classf3').hide();

   }else if(this.value == 'Available with BNs'){
    $('#dofposting1').show();
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').show();
    $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').show();
    $('#awbones1,#awbones2,#awbones3,#awbones4,#awbones5,#awbones6,#awbones7,#awbones8,#awbones9,#awbones10,#seccovers').show();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();

     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
    $('#classf1,#classf2,#classf3').hide();

   }else if(this.value == 'Battalion Misc Duties'){
    $('#dofposting1').show();
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').show();
    $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').show();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
    $('#classf1,#classf2,#classf3').hide();
   }else if(this.value == 'Institutions'){
    $('#dofposting1').show();
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6,#instone10').show();
    $('#traning1,#traning2,#traning3').hide();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
      $('#classf1,#classf2,#classf3').hide();
      
    }else if(this.value == 'Class-IV(P)'){
      $('#dofposting1').show();
      $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();

     $('#lone1,#lone2,#lone3').hide();
     $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
     $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
      $('#classf1,#classf2,#classf3').show();
    }else if(this.value == 'Class-IV(C)'){
      $('#dofposting1').show();
      $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12,#fone13,#fone14,#fone15,#fone16,#fone17,#fone18,#fone19,#fone20,#fone21,#fone22,#seccover,#spuoderny,#spuodernyno,#spuodernyod').hide();

     $('#vploc1,#vpdis1,#noj1,#jsdis2,#osgloc1,#osgdis2,#bsdnob1,#bsddis2,#bsdloc2').hide();
      $('#perdupod1,#perdudis2,#perduorno2,#perduordate2,#dgppod1,#dgpdis2,#dgporno2,#dgpordate2,#tertdpod1,#tertddis2,#tertdorno2,#tertdordate2').hide();
      $('#sstgpod1,#sstgdis2,#sstgorno2,#sstgordate2,#swatpod1,#swatdis2,#swatorno2,#swatordate2').hide();
      $('#awdpmpod1,#awdpmorno2,#awdpmordate2,#awdpfpod1,#awdpforno2,#awdpfordate2,#awdpompod1,#awdpomorno2,#awdpomordate2,#awdpofpod1,#awdpoforno2,#awdpofordate2').hide();
      $('#dsopod1,#dsoorno2,#dsoordate2,#csojalorno2,#csojalordate2,#mispatorno2,#mispatordate2,#othersnod1,#othersordate2,#othersorno2,#othersordate').hide();
      $('#pssawonof1,#pssaworank2,#pssawoordate2,#osihonoo2,#bnkgdop1,#bhogpog1,#bhogdop1,#tradestot1,#tradestt2,#tradesbat1,#tradesdop1,#tradesorno1,#mtsecpod1,#mtsecvehno1,#mtsecdop1,#mtsecorno1,#quartbradop1,#quartbraorno1,#recrutnorb1,#recrutorno1,#recrutordate1').hide();
      $('#leavefrom2,#leaveto2,#absentfrom1,#absentddr2,#Date2,#usdos2,#usros2').hide();
      $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();

     $('#lone1,#lone2,#lone3').hide();
     $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6,#sqone7,#sqone8').hide();
     $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22,#paone23,#paone24,#paone25,#paone26,#paone27,#temcov').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9,#bmdone10').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
    $('#traning1,#traning2,#traning3').hide();
    $('#bastraing1,#bastraing2,#bastraing3,#bastraing4,#bastraing5,#bastraing6,#bastraing7,#bastraing8,#bastraing9,#bastraing10').hide();
        $('#classf1,#classf2,#classf3').show();
    }
});
</script>

</body>
</html>