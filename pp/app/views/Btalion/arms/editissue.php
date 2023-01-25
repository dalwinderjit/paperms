<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Issue Weapon</title>
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
      <h3> &nbsp;  &nbsp; Issue Weapon</h3>
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

              <h4>Weapon Name: <?php  $wp = fetchoneinfo('old_weapon',array('old_weapon_id' => $issuelist->weapon_master_id)); echo $wp->tow; ?>  &nbsp; Body No: <?php echo $wp->bono;  ?>  &nbsp; Butt No: <?php echo $wp->buno;  ?></h4>
                
             <div class="form-group">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$mq = array('type' => 'text','name' => 'mq','id' => 'mq','class' => 'form-control','required' => 'required','value' => $issuelist->megqty, 'placeholder' => 'Magazine Qty');
echo form_input($mq);
 echo form_error('mq');
/*----End newarea Textfield----*/
 ?>
                    <label for="mq" class="error"></label>
                  </div>
                </div><!-- form-group -->
              

                <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition</label>
                  <div class="col-sm-9">
                 <?php  
$ammu = array('' => '--Select--','Service' => 'Service');
/*newarea Textfield*/
 echo form_dropdown('ammu', $ammu, set_value('ammu',$issuelist->ammu),'id="ammu" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('ammu');
 ?>
                    <label for="ammu" class="error"></label>
                  </div>
                </div><!-- form-group -->

                <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition weapon</label>
                  <div class="col-sm-9">
             <?php 
                 $now = array();
                  $now[''] = '--Select--'; 
                 foreach ($weaponi as $value) {
                   $now[$value->nwep_id.','.$value->bore.','.$value->arm] = 'Bore: '.$value->bore. '&nbsp; Arms: '.$value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('now', $now, set_value('now',$issuelist->ammuid),'id="now" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('now');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

                    <div class="form-group" id="quntity1">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$qw = array('type' => 'text','name' => 'qw','id' => 'qw','class' => 'form-control', 'placeholder' =>'Ammunition Quantity', 'readonly' => 'readonly','value' => $issuelist->ammuqty);
echo form_input($qw);
echo form_error('qw');
?>
                    <label for="qw" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="equntity1">
                  <label class="col-sm-3 control-label">Add Extra Quantity</label>
                  <div class="col-sm-9">
<?php
$aqw = array('type' => 'text','name' => 'aqw','id' => 'aqw','class' => 'form-control', 'required' => 'required', 'placeholder' =>'Ammunition Quantity', 'value' => set_value('aqw'));
echo form_input($aqw);
echo form_error('aqw');
?>
                    <label for="qw" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="quntity2" style="display: none;">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$qw1 = array('type' => 'text','name' => 'qw1','id' => 'qw1','class' => 'form-control',  'placeholder' =>'Ammunition Quantity', 'readonly' => 'readonly','value' => $issuelist->ammuqtyp);
echo form_input($qw1);
echo form_error('qw1');
?>
                    <label for="qw1" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="equntity2"  style="display: none;">
                  <label class="col-sm-3 control-label">Add Extra Quantity</label>
                  <div class="col-sm-9">
<?php
$aqwp1 = array('type' => 'text','name' => 'aqwp1','id' => 'aqwp1','class' => 'form-control', 'required' => 'required', 'placeholder' =>'Ammunition Quantity', 'value' => set_value('aqwp1'));
echo form_input($aqwp1);
echo form_error('aqwp1');
?>
                    <label for="qw" class="error"></label>
                  </div>
                </div>


                 <div class="form-group">
                  <label class="col-sm-3 control-label"> Issue Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$idate = array('type' => 'text','name' => 'idate','id' => 'datepicker','class' => 'form-control','placeholder' =>'Issue Date','value' => $issuelist->issue_date);
echo form_input($idate);
echo form_error('idate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="idate" class="error"></label>

                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->


                  <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <?php  
$it = array('' => '--Select--','Gunman' => 'Gunman','Guard' => 'Guard', 'Temp Duty' => 'Temp Duty', 'Company' => 'Company', 'Police Officer' => 'Police Officer','Battalion' => 'Battalion/Unit','ARP' => 'ARP','SDRF' => 'SDRF', 'SSG' => 'SSG','Control Room' => 'Control Room','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('it', $it, set_value('it',$issuelist->issue_to),'id="it" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('it');
/*----End newarea Textfield----*/
 ?>
                    <label for="it" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="typeof" style="display: none;">
                  <label class="col-sm-3 control-label">Type of Duty</label>
                  <div class="col-sm-9" id="one">
                 <?php  
$tod = array('' => '--Select--','Servicing Police Officer' => 'Servicing Police Officer','Retired Police Officer' => 'Retired Police Officer', 'Servicing Civil Officer' => 'Servicing Civil Officer', 'Retired Civil Officer' => 'Retired Civil Officer', 'Servicing Judicial Officer' => 'Servicing Judicial Officer', 'Retired Judicial Officer' => 'Retired Judicial Officer', 'Political Leaders' => 'Political Leaders','Threatened Persons' => 'Threatened Persons');
/*newarea Textfield*/
 echo form_dropdown('tod', $tod, set_value('tod',$issuelist->td),'id="tod" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tod');
/*----End newarea Textfield----*/
 ?>
                    <label for="tod" class="error"></label>
                  </div> 

                   <div class="col-sm-9" id="two" style="display:none;">
                 <?php  
$todt = array('' => '--Select--','Protection' => 'Protection','Quater' => 'Quater', 'V.P' => 'V.P', 'Others' => 'Others');
/*newarea Textfield*/
 echo form_dropdown('todt', $todt, set_value('todt',$issuelist->td),'id="todt" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('todt');
/*----End newarea Textfield----*/
 ?>
                    <label for="todt" class="error"></label><p id="linkt"></p>
                  </div>

                   <div class="col-sm-9" id="three" style="display:none;">
                 <?php  
$todth = array('' => '--Select--','Law & Order' => 'Law & Order','Election Duty' => 'Election Duty', 'Security Duty' => 'Security Duty');
/*newarea Textfield*/
 echo form_dropdown('todth', $todth, set_value('todth',$issuelist->td),'id="todth" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('todth');
/*----End newarea Textfield----*/
 ?>
                    <label for="todth" class="error"></label><p id="linkth"></p>
                  </div>

                   <div class="col-sm-9" id="four" style="display:none;">
                 <?php  
$todf = array('' => '--Select--','Law & Order' => 'Law & Order','V.P Protection' => 'V.P Protection', 'Others' => 'Others');
/*newarea Textfield*/
 echo form_dropdown('todf', $todf, set_value('todf',$issuelist->td),'id="todf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('todf');
/*----End newarea Textfield----*/
 ?>
                    <label for="todf" class="error"></label><p id="linkf"></p>
                  </div>

                   <div class="col-sm-9" id="five"  style="display:none;">
                 <?php  
$todfi = array('' => '--Select--','Commadent' => 'Commadent','Ass.Commandent' => 'Ass.Commandent', 'D.S.P' => 'D.S.P', 'Insp' => 'Insp', 'N.G.O' => 'N.G.O', 'O.R' => 'O.R');
/*newarea Textfield*/
 echo form_dropdown('todfi', $todfi, set_value('todfi',$issuelist->td),'id="todfi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('todfi');
/*----End newarea Textfield----*/
 ?>
                    <label for="todfi" class="error"></label><p id="linkfi"></p>
                  </div>

                </div> 

                 <div class="form-group" id="six"  style="display:none;">
                  <label class="col-sm-3 control-label">Select Company</label>
                 <div class="col-sm-9" >
                 <?php  
$todsi = array('' => '--Select--','A' => 'A','B' => 'B', 'C' => 'C','D' => 'D','E' => 'E');
/*newarea Textfield*/
 echo form_dropdown('todsi', $todsi, set_value('todsi',$issuelist->td),'id="todsi" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('todsi');
/*----End newarea Textfield----*/
 ?>
                    <label for="todsi" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="protecte" style="display:none;">
                  <label class="col-sm-3 control-label">Name of Protectee/Officer</label>
                  <div class="col-sm-9">
                 <?php 
                 $nop = array();
                 $nop[''] = '--Select--';
                 foreach ($body as $value) {
                   $nop[$value->man_id] = 'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno;
                 }
/*newarea Textfield*/
 echo form_dropdown('nop', $nop, set_value('nop',''),'id="nop" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nop');
/*----End newarea Textfield----*/
 ?>
                    <label for="nop" class="error"></label><p id="links"></p>
                  </div>
                </div>


                     <div class="form-group" id="arp1" style="display: none;">
                  <label class="col-sm-3 control-label">ARP Holder Name</label>
                  <div class="col-sm-9">
                 <?php  
$arp1 = array();
$arp1[''] = '--Select--';
                 foreach ($arp as $value) {
                   $arp1[$value->man_id] =  'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno;
                 }
/*newarea Textfield*/
 echo form_dropdown('arp', $arp1, set_value('arp',$issuelist->h_id),'id="arp" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('arp');
/*----End newarea Textfield----*/
 ?>
                    <label for="hn" class="error"></label><p id="link"></p>
                  </div>
                </div>

                     <div class="form-group" id="sdrf1"  style="display: none;">
                  <label class="col-sm-3 control-label">SDRF Holder Name</label>
                  <div class="col-sm-9">
                 <?php  
$sdrf1 = array();
$sdrf1[''] = '--Select--';
                 foreach ($sdrf as $value) {
                   $sdrf1[$value->man_id] =  'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno;
                 }
/*newarea Textfield*/
 echo form_dropdown('sdrf', $sdrf1, set_value('sdrf',$issuelist->h_id),'id="sdrf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('sdrf');
/*----End newarea Textfield----*/
 ?>
                    <label for="sdrf1" class="error"></label><p id="link"></p>
                  </div>
                </div>

                     <div class="form-group" id="ssg1"  style="display: none;">
                  <label class="col-sm-3 control-label">SSG Holder Name</label>
                  <div class="col-sm-9">
                 <?php  
$ssg1 = array();
$ssg1[''] = '--Select--';
                foreach ($ssg as $value) {
                   $ssg1[$value->man_id] =  'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno;
                 }
/*newarea Textfield*/
 echo form_dropdown('ssg', $ssg1, set_value('ssg',$issuelist->h_id),'id="ssg" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ssg');
/*----End newarea Textfield----*/
 ?>
                    <label for="ssg" class="error"></label><p id="link"></p>
                  </div>
                </div>
                   <div class="form-group" id="cr1"  style="display: none;">
                  <label class="col-sm-3 control-label">Control Room</label>
                  <div class="col-sm-9">
   <?php  
$cr1 = array();
$cr1[''] = '--Select--';
                 foreach ($cr as $value) {
                   $cr1[$value->man_id] =  'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno;
                 }
/*newarea Textfield*/
 echo form_dropdown('cr', $cr1, set_value('cr',$issuelist->h_id),'id="cr" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cr');
/*----End newarea Textfield----*/
 ?>
                    <label for="cr" class="error"></label><p id="link"></p>
                  </div>
                </div>
<!-- 
                  <div class="form-group" id="obu1"  style="display: none;">
                  <label class="col-sm-3 control-label">Outer Bttalion/Unit</label>
                  <div class="col-sm-9">
                 <?php  
//$obu1 = array();
/*newarea Textfield*/
 /*echo form_dropdown('ssg', $ssg1, set_value('ssg',''),'id="ssg" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ssg');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="ssg" class="error"></label><p id="link"></p>
                  </div>
                </div> -->

                  <div class="form-group" id="bats" style="display:none;">
                   <label class="col-sm-3 control-label">Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array('' => '--Select--', '7-PAP' => '7-PAP','9-PAP' => '9-PAP','75-PAP' => '75-PAP','80-PAP' => '80-PAP','13-PAP' => '13-PAP','82-PAP' => '82-PAP','36-PAP' => '36-PAP','1-IRB' => '1-IRB','2-IRB' => '2-IRB','3-IRB' => '3-IRB','4-IRB' => '4-IRB','5-IRB' => '5-IRB','6-IRB' => '6-IRB','7-IRB' => '7-IRB','1-CDO' => '1-CDO','2-CDO' => '2-CDO','3-CDO' => '3-CDO','4-CDO' => '4CDO','5-CDO' => '5-CDO','RTC-PAP' => 'RTC-PAP','ISTC-KPT' => 'ISTC-KPT','CTC-PTL' => 'CTC-PTL','SPORTS SECY' => 'SPORTS SECY');
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',$issuelist->h_id),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="itoOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Duty Details</label>
                  <div class="col-sm-9">
                 <?php
$BreedOther = array('type' => 'text','name' => 'itoOther','id' => 'itoOther','class' => 'form-control','placeholder' =>'Duty Details','value' => $issuelist->other);
echo form_input($BreedOther);
echo form_error('BreedOther');
?>     <label for="BreedOther" class="error"></label>
                  </div>
                </div> 

                
                  <div class="form-group" id="hol">
                  <label class="col-sm-3 control-label">Holder Name</label>
                  <div class="col-sm-9">
                 <?php  
$hn = array();
$hn[''] = '--Select--';
                 foreach ($body as $value) {
                   $hn[$value->man_id] =  'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno;
                 }
/*newarea Textfield*/
 echo form_dropdown('hn', $hn, set_value('hn',$issuelist->h_id),'id="hn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('hn');
/*----End newarea Textfield----*/
 ?>
                    <label for="hn" class="error"></label><p id="link"></p>
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
    $('#quntity1').show();
    $('#equntity1').show();
    $('#quntity2').hide();
    $('#equntity2').hide();
    }
  else if(this.value == 'Practice'){
    $('#quntity2').show();
    $('#equntity2').show();
    $('#quntity1').hide();
    $('#equntity1').hide();

  }else{
    $('#quntity1').hide();
    $('#equntity1').hide();
    $('#quntity2').hide();
    $('#equntity2').hide();
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