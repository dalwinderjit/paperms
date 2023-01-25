<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Issue Ammunition</title>
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
      <h3>&nbsp; &nbsp; Issue Ammunition (Service)</h3>
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
                <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition weapon</label>
                  <div class="col-sm-9">
             <?php 
                 $now = array();
                  $now[''] = '--Select--'; 
                 foreach ($weapon as $value) {
                   $now[$value->nwep_id.','.$value->bore.','.$value->arm] = 'Bore: '.$value->bore. '&nbsp; Arms: '.$value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('now', $now, set_value('now',''),'id="now" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('now');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

                           <div class="form-group">
                  <label class="col-sm-3 control-label"> Issue Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$idate = array('type' => 'text','name' => 'idate','id' => 'datepicker','class' => 'form-control','placeholder' =>'Issue Date','required' => 'required','value' => set_value('idate'));
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
                  <label class="col-sm-3 control-label">Order By </label>
                  <div class="col-sm-9">
<?php
$acc = array('type' => 'text','name' => 'acc','id' => 'acc','class' => 'form-control','placeholder' =>'Order By','value' => set_value('acc'));
echo form_input($acc);
echo form_error('acc');
?>
                    <label for="acc" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Order no.</label>
                  <div class="col-sm-9">
<?php
$acc00 = array('type' => 'text','name' => 'acc00','id' => 'acc00','class' => 'form-control','placeholder' =>'Order no.','value' => set_value('acc00'));
echo form_input($acc00);
echo form_error('acc00');
?>
                    <label for="acc00" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label"> Order no. date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$odate = array('type' => 'text','name' => 'odate','id' => 'odate','class' => 'form-control','placeholder' =>'Order no. date','value' => set_value('odate'));
echo form_input($odate);
echo form_error('odate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="odate" class="error"></label>

                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->
                      <div class="form-group">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$ab = array('type' => 'text','name' => 'ab','id' => 'ab','class' => 'form-control','placeholder' =>'Quantity','required' => 'required','value' => set_value('ab'));
echo form_input($ab);
echo form_error('ab');
?>
                    <label for="ab" class="error"></label>
                  </div>
                </div>

 <div class="form-group">
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <?php  
$it = array('' => '--Select--','Gunman' => 'Gunman','Guard' => 'Guard', 'Temp Duty' => 'Temp Duty', 'Company' => 'Company', 'Police Officer' => 'Police Officer','Battalion' => 'Battalion/Unit','ARP' => 'ARP','SDRF' => 'SDRF', 'SSG' => 'SSG','Control Room' => 'Control Room','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('it', $it, set_value('it',1),'id="it" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('it');
/*----End newarea Textfield----*/
 ?>
                    <label for="it" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="typeof">
                  <label class="col-sm-3 control-label">Type of Duty</label>
                  <div class="col-sm-9" id="one">
                 <?php  
$tod = array('' => '--Select--','Servicing Police Officer' => 'Servicing Police Officer','Retired Police Officer' => 'Retired Police Officer', 'Servicing Civil Officer' => 'Servicing Civil Officer', 'Retired Civil Officer' => 'Retired Civil Officer', 'Servicing Judicial Officer' => 'Servicing Judicial Officer', 'Retired Judicial Officer' => 'Retired Judicial Officer', 'Political Leaders' => 'Political Leaders','Threatened Persons' => 'Threatened Persons');
/*newarea Textfield*/
 echo form_dropdown('tod', $tod, set_value('tod',''),'id="tod" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tod');
/*----End newarea Textfield----*/
 ?>
                    <label for="tod" class="error"></label>
                  </div> 

                   <div class="col-sm-9" id="two" style="display:none;">
                 <?php  
$todt = array('' => '--Select--','Protection' => 'Protection','Quater' => 'Quater', 'V.P' => 'V.P', 'Others' => 'Others');
/*newarea Textfield*/
 echo form_dropdown('todt', $todt, set_value('todt',''),'id="todt" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('todt');
/*----End newarea Textfield----*/
 ?>
                    <label for="todt" class="error"></label><p id="linkt"></p>
                  </div>

                   <div class="col-sm-9" id="three" style="display:none;">
                 <?php  
$todth = array('' => '--Select--','Law & Order' => 'Law & Order','Election Duty' => 'Election Duty', 'Security Duty' => 'Security Duty');
/*newarea Textfield*/
 echo form_dropdown('todth', $todth, set_value('todth',''),'id="todth" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('todth');
/*----End newarea Textfield----*/
 ?>
                    <label for="todth" class="error"></label><p id="linkth"></p>
                  </div>

                   <div class="col-sm-9" id="four" style="display:none;">
                 <?php  
$todf = array('' => '--Select--','Law & Order' => 'Law & Order','V.P Protection' => 'V.P Protection', 'Others' => 'Others');
/*newarea Textfield*/
 echo form_dropdown('todf', $todf, set_value('todf',''),'id="todf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('todf');
/*----End newarea Textfield----*/
 ?>
                    <label for="todf" class="error"></label><p id="linkf"></p>
                  </div>

                   <div class="col-sm-9" id="five"  style="display:none;">
                 <?php  
$todfi = array('' => '--Select--','Commadent' => 'Commadent','Ass.Commandent' => 'Ass.Commandent', 'D.S.P' => 'D.S.P', 'Insp' => 'Insp', 'N.G.O' => 'N.G.O', 'O.R' => 'O.R');
/*newarea Textfield*/
 echo form_dropdown('todfi', $todfi, set_value('todfi',''),'id="todfi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
 echo form_dropdown('todsi', $todsi, set_value('todsi',''),'id="todsi" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
 echo form_dropdown('arp', $arp1, set_value('arp',''),'id="arp" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
 echo form_dropdown('sdrf', $sdrf1, set_value('sdrf',''),'id="sdrf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
 echo form_dropdown('ssg', $ssg1, set_value('ssg',''),'id="ssg" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
 echo form_dropdown('cr', $cr1, set_value('cr',''),'id="cr" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
                    $ito = array();
                 $ito[''] = '--Select--';
                 foreach ($uname as $value) {
                   $ito[$value->users_id] = $value->nick;
                 }  
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',''),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
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
 echo form_dropdown('hn', $hn, set_value('hn',''),'id="hn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('hn');
/*----End newarea Textfield----*/
 ?>
                    <label for="hn" class="error"></label><p id="link"></p>
                  </div>
                </div>

                   <div class="form-group" id="itoOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                 <?php
$BreedOther = array('type' => 'text','name' => 'itoOther','id' => 'itoOther','class' => 'form-control','placeholder' =>'Other','value' => set_value('BreedOther'));
echo form_input($BreedOther);
echo form_error('BreedOther');
?>     <label for="BreedOther" class="error"></label>
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
  }),
  // Date Picker
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
     $('#itoOther1').hide();
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


});
</script>
</body>
</html>