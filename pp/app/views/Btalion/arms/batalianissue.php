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
      <h3> &nbsp;  &nbsp; Issue Weapon/Ammunition</h3>
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
        <div class="alert alert-danger alert-dismissible" id="danger" role="alert">
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
                    <?php echo validation_errors(); ?>
                   <div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition Type</label>
                  <div class="col-sm-9">
                 <?php  
$atype = array('' => '--Select--','Service' => 'Service','Practice' => 'Practice (For Firing)');
/*newarea Textfield*/
 echo form_dropdown('atype', $atype, set_value('atype',''),'id="ammu" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('atype');
 ?>
                    <label for="atype" class="error"></label>
                  </div>
                </div><!-- form-group -->

                  <div class="form-group"  id="serv1" style="display:none;">
                  <label class="col-sm-3 control-label">Weapon Body No</label>
                  <div class="col-sm-9">
                    <?php $bdn = array();

                    $bdn[''] = '--Select--';
                    $ser_weapon_linking=[];
                        foreach ($arms as  $value) {
                            $ser_weapon_linking[$value->old_weapon_id] = $value->tow;
                     $bdn[$value->old_weapon_id] = 'Weapon Name: '.$value->tow.'&nbsp; '. 'Weapon Body No: '.$value->bono.'&nbsp; '. 'Weapon Butt No:'.$value->buno;
                      } 
                      
                     ?>
                      <script type="text/javascript">
                      var service_weapon_linking = <?php echo json_encode($ser_weapon_linking); ?>;
                      </script>
                 <?php  
                 
                  
/*newarea Textfield*/
 echo form_dropdown('wbodyno', $bdn, set_value('wbodyno',''),'id="bdn" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('wbodyno');
/*----End newarea Textfield----*/
 ?>
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div> 

                 <div class="form-group" id="serv2" style="display:none;">
                  <label class="col-sm-3 control-label">Ammunition weapon bore</label>
                  <div class="col-sm-9">
             <?php 
                 $now = array();
                  $now[''] = '--Select--'; 
                  $ammunition_bore_linking = [];
                 foreach ($weaponi as $value) {
                     $ammunition_bore_linking[$value->arm] = $value->bore.'@#@'.$value->arm;
                   $now[$value->bore.'@#@'.$value->arm] = 'Bore: '.$value->bore. '&nbsp; Arms: '.$value->arm;
                 }
                 if(isset($_POST['wbodyno'])){
                          $_POST['abore'] = isset($ser_weapon_linking[$_POST['wbodyno']])?(isset($ammunition_bore_linking[$ser_weapon_linking[$_POST['wbodyno']]])?$ammunition_bore_linking[$ser_weapon_linking[$_POST['wbodyno']]]:null):null;
                      }
/*newarea Textfield*/
 echo form_dropdown('abore', $now, set_value('abore',''),'id="now" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" disabled'); 
 echo form_error('abore');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>
                <script type="text/javascript">
                    var ammunition_bore_linking = <?php echo json_encode($ammunition_bore_linking); ?>;
                </script>
             <div class="form-group" id="serv3" style="display:none;">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
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

           

                <div class="form-group"  id="serv4" style="display:none;">
                  <label class="col-sm-3 control-label">Accessories</label>
                  <div class="col-sm-9">
<?php
$acc = array('type' => 'text','name' => 'acc','id' => 'acc','class' => 'form-control','placeholder' =>'Accessories','value' => set_value('acc'));
echo form_input($acc);
echo form_error('acc');
?>
                    <label for="acc" class="error"></label>
                  </div>
                </div>


                    <div class="form-group"  id="serv5" style="display:none;">
                  <label class="col-sm-3 control-label">Ammunition Quantity</label>
                  <div class="col-sm-9">
<?php
$amqunt = array('type' => 'text','name' => 'amqunt','id' => 'qw','class' => 'form-control', 'required' => 'required', 'placeholder' =>'Ammunition Quantity','value' => set_value('amqunt'));
echo form_input($amqunt);
echo form_error('amqunt');
?>
                    <label for="amqunt" class="error"></label>
                  </div>
                </div>


      <div class="form-group"  id="serv6" style="display:none;">
                  <label class="col-sm-3 control-label">By Order</label>
                  <div class="col-sm-9">
<?php
$onum = array('' => '--Select--','ADGP' => 'ADGP','IGP' => 'IGP','DIG' =>'DIG','AIG' =>'AIG','Comdt' =>' Comdt','Spl DGP'=>'Spl DGP');
/*newarea Textfield*/
 echo form_dropdown('onum', $onum, set_value('onum',''),'id="acco" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('onum');
?>
                    <label for="acc" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="serv6" style="display:none;">
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

                <div class="form-group" id="issuelist" style="display:none;">
                   <label class="col-sm-3 control-label">Issue To</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array('' => '--Select--' , 'Official'=>'Battalion (Official By Name)','Battalion' => 'Battalion(Unit)',/*'Deputation' => 'Deputation',*/'Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('issuelist', $ito, set_value('issuelist',''),'id="issuelistI" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('issuelist');
/*----End newarea Textfield----*/
 ?>
                    <label for="batslist" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="batslist" style="display:none;">
                   <label class="col-sm-3 control-label">Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array();
                    foreach ($unamei as $value) {
                      $ito[''] = '--Select--';
                      $ito[$value->users_id] = $value->nick;
                    }
/*newarea Textfield*/
 echo form_dropdown('batslist1', $ito, set_value('batslist1',''),'id="batslis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('batslist1');
/*----End newarea Textfield----*/
 ?>
                    <label for="batslist" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="serv7" style="display:none;">
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <input type="text" id="search-box"  placeholder="Issued To" class = "form-control" />
                    <div id="suggesstion-box"></div>
                    
                    <?php
                    $issueto = array('type' => 'hidden','name' => 'issueto','id' => 'idinfo','value' => set_value('issueto'));
echo form_input($issueto);
echo form_error('issueto');
                     ?> 
                  </div>
                </div>

                <div class="form-group" id="issuelist1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                 <?php
$issueother = array('type' => 'text','name' => 'issueother','id' => 'issueother','class' => 'form-control','placeholder' =>'Other','value' => set_value('issueother'));
echo form_input($issueother);
echo form_error('issueother');
?>     <label for="issueother" class="error"></label>
                  </div>
                </div> 


                <div class="form-group" id="issuelist2"  style="display:none;"> 
                   <label class="col-sm-3 control-label">Deputation</label>
                  <div class="col-sm-9">
                 <?php  
                    $nop = array();
                    foreach ($deputation as $value) {
                      $nop[''] = '--Select--';
                     $nop[$value->man_id] = 'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->cexrank. '&nbsp; Dept No:'.$value->depttno;
                    }


/*newarea Textfield*/
 echo form_dropdown('issuedep', $nop, set_value('issuedep',''),'id="issuedep" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('issuedep');
/*----End newarea Textfield----*/
 ?>
                    <label for="issuedep" class="error"></label>
                  </div>
                </div>



                  <div class="form-group"  id="serv8" style="display:none;">
                  <label class="col-sm-3 control-label">Type of Duty</label>
                  <div class="col-sm-9">
                 <?php  
$it = array('' => '--Select--','Gunman' => 'Gunman','Guard' => 'Guard', 'Temp Duty' => 'Temp Duty', 'Company' => 'Company', 'Police Officer' => 'Police Officer',/*'Battalion' => 'Battalion/Unit',*/'ARP' => 'ARP','SDRF' => 'SDRF', 'SSG' => 'SSG','Control Room' => 'Control Room','PPA/PHR' => 'PPA/PHR','CTC, BHG, PTL' => 'CTC, BHG, PTL', 'ISTC, KPT' => 'ISTC, KPT', /*'District' => 'District',*/'Other' => 'Other',);
/*newarea Textfield*/
 echo form_dropdown('typeofduty', $it, set_value('typeofduty',1),'id="it" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('typeofduty');
/*----End newarea Textfield----*/
 ?>
                    <label for="it" class="error"></label>
                  </div>
                </div> 


                  


                  <div class="form-group" id="typeof"  style="display:none;">
                  <label class="col-sm-3 control-label">Place of Duty</label>
                  <div class="col-sm-9" id="one">
                 <?php  
$tod = array('' => '--Select--','Servicing Police Officer' => 'Servicing Police Officer','Retired Police Officer' => 'Retired Police Officer', 'Servicing Civil Officer' => 'Servicing Civil Officer', 'Retired Civil Officer' => 'Retired Civil Officer', 'Servicing Judicial Officer' => 'Servicing Judicial Officer', 'Retired Judicial Officer' => 'Retired Judicial Officer', 'Political Leaders' => 'Political Leaders','Threatened Persons' => 'Threatened Persons','Governor (Administrator)' => 'Governor (Administrator)');
/*newarea Textfield*/
 echo form_dropdown('placeofduty', $tod, set_value('placeofduty',''),'id="tod" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('placeofduty');
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
$todfi = array('' => '--Select--','Commadent' => 'Commandent','Ass.Commandent' => 'Ass.Commandent', 'D.S.P' => 'D.S.P', 'Insp' => 'Insp', 'N.G.O' => 'N.G.O', 'O.R' => 'O.R');
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
$todsi = array('' => '--Select--','A' => 'A','B' => 'B', 'C' => 'C','D' => 'D','E' => 'E','F' => 'F','G'  => 'G','H' => 'H','I' => 'I','J' => 'J');
/*newarea Textfield*/
 echo form_dropdown('todsi', $todsi, set_value('todsi',''),'id="todsi" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('todsi');
/*----End newarea Textfield----*/
 ?>
                    <label for="todsi" class="error"></label>
                  </div>
                </div>

             
                  <div class="form-group" id="bats" style="display:none;">
                   <label class="col-sm-3 control-label">Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array();
                    foreach ($uname as $value) {
                      $ito[''] = '--Select--';
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

                   <div class="form-group" id="itoOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Duty Details or Other Info</label>
                  <div class="col-sm-9">
                 <?php
$BreedOther = array('type' => 'text','name' => 'itoOther','id' => 'itoOther','class' => 'form-control','placeholder' =>'Duty Details','value' => set_value('itoOther'));
echo form_input($BreedOther);
echo form_error('itoOther');
?>     <label for="BreedOther" class="error"></label>
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



                <div class="form-group" id="prac1" style="display:none;">
                    
                  <label class="col-sm-3 control-label">Type of Weapon</label>
                  <div class="col-sm-9">
                 <?php 
                 $tow = array();
                  $tow[''] = 'Type of Weapon'; 
                 foreach ($weapon as $value) {
                   $tow[$value->arm] = $value->arm;
                 }
                 $tow['Nill'] = 'Nill'; 
/*newarea Textfield*/
 echo form_dropdown('typeofwep', $tow, set_value('typeofwep',''),'id="towep" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('typeofwep');
/*----End newarea Textfield----*/
 ?>
                    <label for="tow" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group"  id="prac2" style="display:none;">
                  <label class="col-sm-3 control-label">Body No</label>
                  <div class="col-sm-9">
                 <?php 
                 $tow = array();
                 $tow = $all_body_nos;
/*newarea Textfield*/
 echo form_dropdown('bodyno[]', $tow, set_value('bodyno',''),'id="towbody" data-placeholder="Choose One" title="Please select at least 1 value" multiple class="select2"'); 
 echo form_error('bodyno');
/*----End newarea Textfield----*/
 ?>
                    <label for="tow" class="error"></label>
                  </div>
                </div> 

               
          <div class="form-group"  id="prac3" style="display:none;">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
                  <div class="col-sm-9">
                <?php  
                /*newarea Textfield*/
                $mq = array('type' => 'text','name' => 'magp','id' => 'mq','class' => 'form-control','value' => set_value('magp'), 'placeholder' => 'Magazine Qty');
                echo form_input($mq);
                 echo form_error('magp');
                /*----End newarea Textfield----*/
                ?>
                    <label for="magp" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->

                  <div class="form-group" id="prac10" style="display:none;">
                  <label class="col-sm-3 control-label">Ammunition weapon bore</label>
                  <div class="col-sm-9">
             <?php 
                 $now = array();
                  $now[''] = '--Select--'; 
                  $matches = [];
                 foreach ($weaponi as $value) {
                     $matches[$value->arm] = $value->bore.'@#@'.$value->arm;
                   $now[$value->bore.'@#@'.$value->arm] = 'Bore: '.$value->bore. '&nbsp; Arms: '.$value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('ammubore', $now, set_value('ammubore',''),'id="ammubore" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ammubore');
/*----End newarea Textfield----*/
 ?>
                    <label for="ammubore" class="error"></label>
                  </div>
                </div>



                  <div class="form-group"  id="prac4" style="display:none;">
                  <label class="col-sm-3 control-label">Ammunition Quantity</label>
                  <div class="col-sm-9">
<?php
$qw = array('type' => 'text','name' => 'ammupqty','id' => 'qw','class' => 'form-control', 'required' => 'required', 'placeholder' =>'Ammunition Quantity','value' => set_value('ammupqty'));
echo form_input($qw);
echo form_error('ammupqty');
?>
                    <label for="qw" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="prac5" style="display:none;">
                  <label class="col-sm-3 control-label"> Issue Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$idate = array('type' => 'text','name' => 'pissuedate','id' => 'datepickeri','class' => 'form-control','placeholder' =>'Issue Date','value' => set_value('pissuedate'));
echo form_input($idate);

?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                      <?php echo form_error('pissuedate'); ?>
                    <label for="pissuedate" class="error"></label>
                  </div>
                </div>
                <!-- form-group --><!--*** Text field-->

                   <div class="form-group"  id="prac7" style="display:none;" >
                  <label class="col-sm-3 control-label">Issue To</label>
                 <div class="col-sm-9" >
                 <?php  
$todsi = array('' => '--Select--','Reserve Inspector' => 'Reserve Inspector', 'Line Officer' => 'Line Officer','BHM & A/BHM' => 'BHM & A/BHM', 'KHC' => 'KHC','Other Battalion Unit' => 'Other Battalion Unit','Offical' => 'Offical (By Name)','CCI' => 'CCI');
/*newarea Textfield*/
 echo form_dropdown('pissueto', $todsi, set_value('pissueto',''),'id="isutodsioo" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('pissueto');
/*----End newarea Textfield----*/
 ?>
             <!-- /* <label for="pissueto" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="prac8" style="display:none;">
                  <label class="col-sm-3 control-label">Issue To Name</label>
                  <div class="col-sm-9">
                 <?php 
                 $tow = array();
                  $tow[''] = 'Issue To Name'; 
                 
/*newarea Textfield*/
 echo form_dropdown('pissuetoname', $tow, set_value('pissuetoname',''),'id="nameofisu" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('pissuetoname');
/*----End newarea Textfield----*/
 ?> -->      
                    <label for="tow" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="prac1200" style="display:none;">
                   <label class="col-sm-3 control-label">Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array();
                    foreach ($unamei as $value) {
                      $ito[''] = '--Select--';
                      $ito[$value->users_id] = $value->nick;
                    }
/*newarea Textfield*/
 echo form_dropdown('batslist', $ito, set_value('batslist',''),'id="batsliso" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('batslist');
/*----End newarea Textfield----*/
 ?>
                    <label for="batslist" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="prac1201" style="display:none;">
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <input type="text" id="search-boxi"  placeholder="Issued To Enter Belt no" class = "form-control" />
                    <div id="suggesstion-boxi"></div>
                   <?php $issuetoi = array('type' => 'hidden','name' => 'issuetoi','value' => set_value('issuetoi'),'id'=>'issuetoi');
    echo form_input($issuetoi);?>
                    
                  </div>
                </div>



                  <div class="form-group" id="prac1011" style="display:none;">
                   <label class="col-sm-3 control-label">Other Battalion Unit</label>
                  <div class="col-sm-9">
                 <?php  
                    $ito = array();
                    foreach ($uname as $value) {
                      $ito[''] = '--Select--';
                      $ito[$value->users_id] = $value->nick;
                    }
/*newarea Textfield*/
 echo form_dropdown('oito', $ito, set_value('oito',''),'id="oito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('oito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="prac9" style="display:none;" >
                  <label class="col-sm-3 control-label">Name of Range</label>
                 <div class="col-sm-9" >
                 <input type="text" name="nameofrange" class="form-control" placeholder="Name of Range">
        <?php echo form_error('nameofrange'); ?>
                    <label for="nameofrange" class="error"></label>
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
    var matches = <?php echo json_encode($matches); ?>;
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
  jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
   $(document).on('change', '#it', function() {
       dutydropdowns(this.value);
  

});


$(document).on('change', '#tod', function() {
  if(this.value == 'District'){
    $('#dislist').show();
     //$('#drvno').show();
     $('#drdate').show();

    }else{
      $('#dislist').hide();
     //$('#drvno').hide();
     //$('#drdate').hide();
    }
  });


 $(document).on('change', '#ammu', function () {
     changeFormValueOnAmmunitionTypeChange(this.value);
  });




   $(document).on('change', '#towep', function() {
      if(this.value == 'Nill'){
     $('#prac2').hide();
     $('#prac3').hide();
   }else{
       console.log("hi');"+this.value);
       $('#ammubore').val(matches[this.value]);
       $('#ammubore').trigger('change');
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

     $(document).on('change', '#isutodsioo', function() {
      changeIssueTo(this.value);
  
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
    var ammunition_type = $('#ammu').val();
    var dataStrings = 'bodyno='+ bodyno+"&ammunition_type="+ammunition_type;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-checkarm",
    data: dataStrings,
    cache: false,
    success: function(html){
        $("#towbody").empty();
        $("#towbody").trigger('change');
    $("#towbody").html(html);
    }  
      
    });

    });
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
$(document).on("click","[id^=a]",function() {
var Input = $(this).data('input');
$("#search-box").val( $('#a'+Input).text());
$("#idinfo").val(Input);
$("#suggesstion-box").hide();
});



   $(document).ready(function() {

    $("#batsliso").change(function(){
    var bodyno = $("#batsliso").val();
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
  $("#search-boxi").keyup(function(){
    $.ajax({
    type: "POST",
    url: "<?php echo base_url('bt-issueholder-name'); ?>",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-boxi").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-boxi").show();
      $("#suggesstion-boxi").html(data);
      $("#search-boxi").css("background","#FFF");

    }
    });
  });
});
//To select country name
$(document).on( "click","[id^=a]",function () {
var Input = $(this).data('input');
$("#search-boxi").val( $('#a'+Input).text());
$("#idinfosi").val(Input);
$("#issuetoi").val(Input);
$("#suggesstion-boxi").hide();
});



$(document).ready(function() {

    $("#isutodsioo").change(function(){
    var bodyno = $("#isutodsioo").val();
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


 $(document).on('change', '#issuelistI', function() {
 console.log(this.value);
  issueToDropDowns(this.value);
    console.log(this.value);
  });
  function changeFormValueOnAmmunitionTypeChange(val){
    if(val == 'Service'){
    $('#serv1').show();
    $('#serv2').show();
    $('#serv3').show();
    $('#serv4').show();
    $('#serv5').show();
    $('#serv6').show();
    /*$('#serv7').show();*/
    $('#serv8').show();
   $('#issuelist').show();
    $('#typeof').show();
    $('#drvno').show();
    $('#drdate').show();

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
    $('#prac1200').hide();
    $('#prac1201').hide();
    
    }
  else if(val == 'Practice'){
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();
    $('#serv5').hide();
    $('#serv6').hide();
    $('#serv7').hide();
    $('#serv8').hide();
    $('#issuelist').hide();
    $('#batslist').hide();
    $('#typeof').hide();
    $('#dislist').hide();
    $('#drvno').hide();
    $('#drdate').hide();
    $('#itoOther1').hide();

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
    $('#prac1200').show();
    $('#prac1201').show();
    $('#six').hide();

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
    $('#dislist').hide();
    
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
}
function issueToDropDowns(value){
if(value == 'Battalion'){
    $('#batslist').show();
     //$('#drvno').show();
     $('#serv7').hide();
     $('#issuelist2').hide();
     $('#serv8').show();
     //$('#typeof').hide();

    }else if(value=='Official'){
        $('#batslist').show();
     //$('#drvno').show();
     $('#serv7').show();
     $('#issuelist2').hide();
     $('#serv8').show();
     //$('#typeof').hide();
    }else if(value == 'Other'){
      $('#issuelist1').show();
     $('#batslist').hide();
     $('#serv7').hide();
     $('#serv8').hide();
    // $('#typeof').hide();

    }/*else if(value == 'Deputation'){
      $('#issuelist2').show();
      $('#issuelist1').hide();
     $('#batslist').hide();
     $('#serv7').hide();
     $('#serv8').show();
     $('#typeof').show();

    }*/else{
      $('#issuelist2').hide();
      $('#issuelist1').hide();
     $('#batslist').hide();
     $('#serv7').hide();
     $('#serv8').show();
     //$('#typeof').hide();
    }
}
function dutydropdowns(value){
    if(value == 'Gunman'){
     $('#two').hide();
     $('#three').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#one').show();
     $('#protecte').hide();
     $('#hol').show();
     $('#bats').hide();
     $('#itoOther1').show();

      $('#typeof').show();
      $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide();
    $('#cr1').hide();
    $('#dislist').hide();
     /*$('#drvno').hide();
     $('#drdate').hide(); */
   }else if(value == 'Guard'){
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
    $('#dislist').hide();
     /*$('#drvno').hide();
     $('#drdate').hide(); */
   }else if(value == 'Temp Duty'){
     $('#one').hide();
     $('#two').hide();
     $('#four').hide();
     $('#five').hide();
     $('#six').hide();
     $('#protecte').hide();
     $('#hol').show();
     $('#three').show();
     $('#bats').hide();
     $('#itoOther1').show();
     $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide();
    $('#cr1').hide();
    $('#dislist').hide();
    /* $('#drvno').hide();
     $('#drdate').hide(); */
   }else if(value == 'Company'){
     $('#one').hide();
     $('#two').hide();
     $('#three').hide();
     $('#five').hide();
     $('#protecte').show();
     $('#hol').hide();
     $('#four').hide();
     $('#six').show();
     $('#bats').hide();
     $('#itoOther1').hide();
     $('#arp1').hide();
    $('#ssg1').hide();
    $('#sdrf1').hide();
    $('#cr1').hide();
    $('#dislist').hide();
     $('#itoOther1').show();
     $('#typeof').hide();
     /*$('#drvno').hide();
     $('#drdate').hide(); */
   }else if(value == 'Police Officer'){
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
    $('#sdrf1').hide(); $('#cr1').hide();
    $('#dislist').hide();
     $('#itoOther1').show();
     /*$('#drvno').hide();
     $('#drdate').hide();*/    }
   else if(value == 'Battalion'){
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
    $('#dislist').hide();
    /* $('#drvno').hide();
     $('#drdate').hide(); */
   }else if(value == 'ARP'){
     $('#arp1').show();
     $('#itoOther1').show();
     $('#typeof').hide();
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
     $('#dislist').hide();
     /*$('#drvno').hide();
     $('#drdate').hide(); */
   }else if(value == 'SSG'){
     $('#ssg1').show();
     $('#itoOther1').show();
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
     $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide(); 
   }else if(value == 'SDRF'){
      $('#sdrf1').show();
      $('#itoOther1').show();
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
     $('#dislist').hide();
     /*$('#drvno').hide();
     $('#drdate').hide(); */
   }else if(value == 'Other'){
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
     $('#dislist').hide();
    /* $('#drvno').hide();
     $('#drdate').hide(); */
   }
   else if(value == 'Control Room' || value=="PPA/PHR" || value=="ISTC, KPT" ){
    $('#cr1').show();
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
     $('#dislist').hide();
     /*$('#drvno').hide();
     $('#drdate').hide(); */
   }
}
function changeIssueTo(value){
if(value == 'Other Battalion Unit'){
     $('#prac1011').show();
     $('#prac8').hide();
     $('#prac1200').hide();
    $('#prac1201').hide();
   }else if(value == 'Offical'){
    $('#prac1200').show();
    $('#prac1201').show();
    $('#prac1011').hide();
    
   }else{
    $('#prac1011').hide();
    $('#prac8').show();
    $('#prac1200').hide();
    $('#prac1201').hide();
   }
}
$('#bdn').on('change',function(){console.log("hi"+this.value+service_weapon_linking[this.value]+ammunition_bore_linking[service_weapon_linking[this.value]]);$('#now').val(ammunition_bore_linking[service_weapon_linking[this.value]]);$('#now').trigger('change');});
$(document).ready(function(){
    //$('#ammu').children('option[value=Practice]').attr('disabled','disabled');
  <?php 
    if($atype_!=null){
        if($atype_=='Practice'){
            ?>
                $('#batslist').hide();
                $('#serv7').hide();
                $('#serv8').hide();
                $('#typeof').hide();
            <?php
        }
        ?>
        changeFormValueOnAmmunitionTypeChange("<?PHP echo $atype_; ?>");
            <?php
            if($pissueto_!=null){
                if($pissueto_=='Offical'){ 
                    echo "changeIssueTo('$pissueto_')";
                    
                }
            }
    }
    if($issuetoi_!=null){    
        ?> 
           //console.log('<?PHP echo $issuetoi_; ?>');
           $("#search-boxi").val('<?PHP echo $issuetoi_; ?>');
           <?php
        //sert it in the field
    }
    if($issueto_!=null){    
        ?> 
           //console.log('<?PHP echo $issueto_; ?>');
           $("#search-box").val('<?PHP echo $issueto_; ?>');
           <?php
        //sert it in the field
    }
    if($wbodyno_!=null){
        
    }
    if($atype_!=null && $atype_=='Service'){
        if($typeofduty_!=null){
            ?>dutydropdowns('<?php echo $typeofduty_; ?>');<?php
        }
       if($issuelist_!=null ){
           ?>issueToDropDowns('<?php echo $issuelist_; ?>');<?php
       } 
        
    }
  ?>
          });
          
</script>
</body>
</html>