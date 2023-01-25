<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>De Induction</title>
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
      <h3>&nbsp; &nbsp; De Induction</h3>
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

              

                   <div class="form-group" id="Issuedtoc1">
                  <label class="col-sm-3 control-label">Name of official</label>
                  <div class="col-sm-9">
                 <?php 
                 $nop = array();
                 $nop[''] = '--Select--'; 
                  foreach ($body as $value) {
                   $nop[$value->man_id] =  'Rank: '.$value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank. '&nbsp; Name: '.$value->name. '&nbsp; Dept No: '.$value->depttno.'&nbsp; Battalion:'.$this->session->userdata('nick');
                 }
/*newarea Textfield*/
 echo form_dropdown('nop', $nop, set_value('nop',''),'id="nop" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nop');
/*----End newarea Textfield----*/
 ?>
                    <label for="nop" class="error"></label>
                  </div>
                </div>

                  


              <div class="form-group">
                  <label class="col-sm-3 control-label">De-Induction Type</label>
                  <div class="col-sm-9">
 <?php  
$ti = array('' => '--Select--', 'Promotion Transfer' => 'Promotion Transfer','Transfer' => 'Transfer','On deputation' => 'On deputation','Dismissed' => 'Dismissed','Retired' => 'Retired','Resignation' => 'Resignation','Missing' => 'Missing','Expired' => 'Expired','End of Services'=>'End of Services');
 echo form_dropdown('ti', $ti, set_value('ti',1),'id="ti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('ti');
 ?>
                    
                    <label for="ti" class="error"></label>
                  </div>
                </div>

              
                  <div class="form-group" id="pTransfer1" style="display:none;">
                   <label class="col-sm-3 control-label">Transferred to</label>
                  <div class="col-sm-9">
                <?php  
                 $ito[''] = '--Select--';
                 foreach ($uname as $value){
                   $ito[$value->users_id] = $value->nick;
                 } 
                 $ito['Other'] = 'Other';
                 $ito['District'] = 'District';  
                  

/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
 <label for="ti" class="error"></label>
                  </div>
                </div>


                <div class="form-group" id="repart" style="display: none;">
                  <label class="col-sm-3 control-label">Relieved</label>
                  <div class="col-sm-9">
 <?php  
$ti = array('' => '--Select--', 'No' => 'No','Yes' => 'Yes');
 echo form_dropdown('tid', $ti, set_value('tid',1),'id="tid" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('tid');
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="pTransfer222" style="display:none;">
                  <label class="col-sm-3 control-label">DDR No & Date</label>
                  <div class="col-sm-9">
 <?php  
$Dateofrelievinger = array('type' => 'text','name' => 'Dateofrelievinger','id' => 'Dateofrelievinger','class' => 'form-control','placeholder' =>'DDR No & Date','value' => set_value('Dateofrelievinger'));
echo form_input($Dateofrelievinger);
echo form_error('Dateofrelievinger');
?>
</div>
                    <label for="belt" class="error"></label>
                  </div>

                  <div class="form-group" id="pTransfer2" style="display:none;">
                  <label class="col-sm-3 control-label">Date of relieving</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$Dateofrelieving = array('type' => 'text','name' => 'Dateofrelieving','id' => 'Dateofrelieving','class' => 'form-control','placeholder' =>'Date of relieving','value' => set_value('Dateofrelieving'));
echo form_input($Dateofrelieving);
echo form_error('Dateofrelieving');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="belt" class="error"></label>
                  </div>
                </div>
                </div> 

                

                    <div class="form-group" id="iitoOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                 <?php
$iitoOther = array('type' => 'text','name' => 'iitoOther','id' => 'iitoOther','class' => 'form-control','placeholder' =>'Other','required' => 'required','value' => set_value('iitoOther'));
echo form_input($iitoOther);
echo form_error('iitoOther');
?>     <label for="iitoOther" class="error"></label>
                  </div>
                </div> 


                  <div class="form-group"  id="Transfer2" style="display:none;">
                  <label class="col-sm-3 control-label">Date of relieving</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$Dateofrelievingi = array('type' => 'text','name' => 'Dateofrelievingi','id' => 'Dateofrelievingi','class' => 'form-control','placeholder' =>'Date of relieving','value' => set_value('Dateofrelievinigi'));
echo form_input($Dateofrelievingi);
echo form_error('Dateofrelievingi');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="Dateofrelievingi" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group" id="Deputation1" style="display:none;">
                  <label class="col-sm-3 control-label">Deputation Unit </label>
                  <div class="col-sm-9">
 <?php  
 $DeputationUnit = array('' => '--Select--', 'CID' => 'CID','Excise' => 'Excise','Vigilance Bureau' => 'Vigilance Bureau','PSPCL' => 'PSPCL','SSG' => 'SSG','IVC' => 'IVC','Municiple Corporation' => 'Municiple Corporation','PPA/PHR' => 'PPA/PHR','PRTC JAHANKHELAN' => 'PRTC JAHANKHELAN','STATE TRANSPORT' => 'STATE TRANSPORT','NRI WING' => 'NRI WING','SNCB' => 'SNCB','Security Wing, Pb., CHD' => 'Security Wing, Pb., CHD','District' => 'District','Intelligence' => 'Intelligence','SOG' => 'SOG','Jail Department, Pb., CHG' => 'Jail Department, Pb., CHG','BOI Pb. CHG'=>'BOI Pb. CHG','Human Rights Pb. Chg'=>'Human Rights Pb. Chg','PRTC Jahankhelan Hoshiarpur'=>'PRTC Jahankhelan Hoshiarpur');
 echo form_dropdown('DeputationUnit', $DeputationUnit, set_value('DeputationUnit',1),'id="DeputationUnit" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
?>
                    <label for="DeputationUnit" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="Deputation3" style="display:none;">
                  <label class="col-sm-3 control-label">Detail</label>
                  <div class="col-sm-9">
                <?php  
                  $pg = array('type' => 'text','name' => 'pg','id' => 'pg','class' => 'form-control','placeholder' =>'Detail','value' => set_value('pg'));
                  echo form_input($pg);
                  echo form_error('pg');
                ?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="Deputation2" style="display:none;">
                  <label class="col-sm-3 control-label">Relieved on</label>
                  <div class="col-sm-9">
 <?php  
$pg = array('type' => 'text','name' => 'pg','id' => 'pg','class' => 'form-control','placeholder' =>'Relieved on','value' => set_value('pg'));
echo form_input($pg);
echo form_error('pg');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>
                        <div class="form-group"  id="Dismissed0" style="display:none;">
                  <label class="col-sm-3 control-label">Dismissing Authority</label>
                  <div class="col-sm-9">
 <?php  
$DismissingAuthority = array('' => '--Select--', 'Comdt' => 'Comdt','Dig' => 'Dig','IGP' => 'IGP','DGP' => 'DGP');
 echo form_dropdown('DismissingAuthority', $DismissingAuthority, set_value('DismissingAuthority',1),'id="DismissingAuthority" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('DismissingAuthority');
 ?>
                    <label for="DismissingAuthority" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group"  id="Dismissed4" style="display:none;">
                  <label class="col-sm-3 control-label">Dismiss Order No</label>
                  <div class="col-sm-9">
                  
 <?php  
$Dismissrder = array('type' => 'text','name' => 'Dismissrder','id' => 'Dismissrder','class' => 'form-control','placeholder' =>'Dismiss Order No','value' => set_value('Dismissrder'));
echo form_input($Dismissrder);
echo form_error('Dismissrder');
?>
                    <label for="Dismissrder" class="error"></label>
                  </div>
                </div>
              <div class="form-group"  id="order_date_div" style="display:none;">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
                  
 <?php  
$order_date = array('type' => 'text','name' => 'order_date','id' => 'order_date','class' => 'form-control','placeholder' =>'End of service Order Date','value' => set_value('order_date'));
echo form_input($order_date);
echo form_error('order_date');
?>
                    <label for="order_date" class="error"></label>
                  </div>
                </div>
              <div class="form-group"  id="date_of_end_services_div" style="display:none;">
                  <label class="col-sm-3 control-label">Date of End Services</label>
                  <div class="col-sm-9">
                  
 <?php  
$date_of_end_services = array('type' => 'text','name' => 'date_of_end_services','id' => 'date_of_end_services','class' => 'form-control','placeholder' =>'Date of End of service ','value' => set_value('date_of_end_services'));
echo form_input($date_of_end_services);
echo form_error('date_of_end_services');
?>
                    <label for="date_of_end_services" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="Dismissed1" style="display:none;">
                  <label class="col-sm-3 control-label">Dismiss Date</label>
                  <div class="col-sm-9">
                  <div class="input-group"> 
 <?php  
$DismissDate = array('type' => 'text','name' => 'DismissDate','id' => 'DismissDate','class' => 'form-control','placeholder' =>'Dismiss Date','value' => set_value('DismissDate'));
echo form_input($DismissDate);
echo form_error('DismissDate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DismissDate" class="error"></label>
                  </div>
                </div>


                  

                   <div class="form-group" id="Dismissed2" style="display:none;">
                  <label class="col-sm-3 control-label">Reason</label>
                  <div class="col-sm-9">
 <?php  
$Reason = array('' => '--Select--', '311.2(B)constitution of india' => '311.2(B)constitution of india','16.2(2)PPR' => '16.2(2)PPR','12.21PPR' => '12.21PPR','Any Other' => 'Any Other');
 echo form_dropdown('Reason', $Reason, set_value('Reason',1),'id="Reason" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Reason');
 ?>
                    <label for="Reason" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="Dismissed3" style="display:none;">
                  <label class="col-sm-3 control-label">Any Other</label>
                  <div class="col-sm-9">
 <?php  
$AnyOther = array('type' => 'text','name' => 'AnyOther','id' => 'AnyOther','class' => 'form-control','placeholder' =>'Any Other','value' => set_value('AnyOther'));
echo form_input($AnyOther);
echo form_error('AnyOther');
?>
                    <label for="AnyOther" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="prematurepoart" style="display:none;">
                  <label class="col-sm-3 control-label"> Mode of Retirement</label>
                  <div class="col-sm-9">
 <?php  
$tis = array('' => '--Select--', 'Superannuation' => 'Superannuation','Voluntary' => 'Voluntary','Pre-mature' => 'Pre-mature','On Medical Ground' => 'On Medical Ground');
 echo form_dropdown('tis', $tis, set_value('tis',1),'id="smor" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tis');
 ?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                
                 

               <!--  <div class="form-group" id="prematurepoart" style="display:none;">
                  <label class="col-sm-3 control-label">Pre-mature</label>
                  <div class="col-sm-9">
                <input type="radio" name="premature" id="prematurei1" value="Pre-mature"/> Yes
                <input type="radio" name="premature" id="prematurei2" value="Pre-mature"/> No
                </div></div> -->

                 <div class="form-group" id="super2" style="display:none;">
                  <label class="col-sm-3 control-label">Age on Retirement</label>
                  <div class="col-sm-9">
 <?php  
$tis = array('' => '--Select--', '58 yrs' => '58 yrs','59 yrs' => '59 yrs','60 yrs' => '60 yrs','61 yrs' => '61 yrs', '62 yrs' => '62 yrs');
 echo form_dropdown('tis', $tis, set_value('tis',1),'id="tis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tis');
 ?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="super3" style="display:none;">
                  <label class="col-sm-3 control-label">Extension Availed</label>
                  <div class="col-sm-9">
 <?php  
$extava = array('' => '--Select--', '1 yr' => '1 yr','2 yrs' => '2 yrs','3 yrs' => '3 yrs');
 echo form_dropdown('extava', $extava, set_value('extava',1),'id="extava" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('belt');
 ?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="super5" style="display:none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
 <?php  
$pg = array('type' => 'text','name' => 'pgstos','id' => 'pg','class' => 'form-control','placeholder' =>'Order No','value' => set_value('pgstos'));
echo form_input($pg);
echo form_error('pgstos');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="super1" style="display:none;">
                  <label class="col-sm-3 control-label">Date of Retirement</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$DateofReti = array('type' => 'text','name' => 'DateofReti','id' => 'DateofReti','class' => 'form-control','placeholder' =>'Date of Retirement','value' => set_value('DateofReti'));
echo form_input($DateofReti);
echo form_error('DateofReti');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateofReti" class="error"></label>
                  </div>
                </div>


                 <div class="form-group"  id="volunt3" style="display:none;">
                  <label class="col-sm-3 control-label">Total Service</label>
                  <div class="col-sm-9">
 <?php  
$pg = array('type' => 'text','name' => 'pgstos','id' => 'pg','class' => 'form-control','placeholder' =>'Total Service','value' => set_value('pgstos'));
echo form_input($pg);
echo form_error('pgstos');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="volunt2" style="display:none;">
                  <label class="col-sm-3 control-label">Age on Retirement</label>
                  <div class="col-sm-9">
                   <?php $tis = array(); for ($i=38; $i <63 ; $i++) { ?>
                    <?php $tis[$i.'Yrs'] = $i.' Yrs'; ?>
                    <?php } ?>
 <?php  
 echo form_dropdown('tis', $tis, set_value('tis',1),'id="tis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tis');
 ?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                 
                 <div class="form-group"  id="volunt1" style="display:none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
 <?php  
$pg = array('type' => 'text','name' => 'pgstos','id' => 'pg','class' => 'form-control','placeholder' =>'Order No','value' => set_value('pgstos'));
echo form_input($pg);
echo form_error('pgstos');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="volunt4" style="display:none;">
                  <label class="col-sm-3 control-label">Date of Retirement</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$voluntDateofRetirement = array('type' => 'text','name' => 'voluntDateofRetirement','id' => 'voluntDateofRetirement','class' => 'form-control','placeholder' =>'Date of Retirement','value' => set_value('voluntDateofRetirement'));
echo form_input($voluntDateofRetirement);
echo form_error('voluntDateofRetirement');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="voluntDateofRetirement" class="error"></label>
                  </div>
                </div>



                 <div class="form-group" id="pre1" style="display:none;">
                  <label class="col-sm-3 control-label">Date of Retirement</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$pgDateofRetirement = array('type' => 'text','name' => 'pgDateofRetirement','id' => 'pgDateofRetirement','class' => 'form-control','placeholder' =>'Date of Retirement','value' => set_value('pgDateofRetirement'));
echo form_input($pgDateofRetirement);
echo form_error('pgDateofRetirement');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="pgDateofRetirement" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="pre2" style="display:none;">
                  <label class="col-sm-3 control-label">Age on Retirement</label>
                  <div class="col-sm-9">
                <select name="date" class="form-control"><optgroup>
                 <option value="">Date</option>
                    <?php for ($i=21; $i <58 ; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    </optgroup></select>
                    <label for="st" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="pre3" style="display:none;">
                  <label class="col-sm-3 control-label">Total Service</label>
                  <div class="col-sm-9">
 <?php  
$pgtser = array('type' => 'text','name' => 'pgtser','id' => 'pgtser','class' => 'form-control','placeholder' =>'Total Service','value' => set_value('pgtser'));
echo form_input($pgtser);
echo form_error('pgtser');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="pre4" style="display:none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
 <?php  
$pg = array('type' => 'text','name' => 'pgstos','id' => 'pg','class' => 'form-control','placeholder' =>'Order No','value' => set_value('pgstos'));
echo form_input($pg);
echo form_error('pgstos');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

               <!--   <div class="form-group" id="retired" style="display:none;">
                  <label class="col-sm-3 control-label">Date of Retirement</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
/*$DateofReti1 = array('type' => 'text','name' => 'DateofReti1','id' => 'DateofReti1','class' => 'form-control','placeholder' =>'Date of Retirement','required' => 'required','value' => set_value('DateofReti1'));
echo form_input($DateofReti1);
echo form_error('DateofReti1');*/
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateofReti1" class="error"></label>
                  </div>
                </div> -->


                 <div class="form-group" id="gomgr4" style="display:none;">
                  <label class="col-sm-3 control-label">Date of Retirement</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$pgDateofRetirement = array('type' => 'text','name' => 'pgDateofRetirement','id' => 'pgDateofRetirement','class' => 'form-control','placeholder' =>'Date of Retirement','value' => set_value('pgDateofRetirement'));
echo form_input($pgDateofRetirement);
echo form_error('pgDateofRetirement');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="pgDateofRetirement" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="gomgr3" style="display:none;">
                  <label class="col-sm-3 control-label">Age on Retirement</label>
                  <div class="col-sm-9">
                <select name="date" class="form-control"><optgroup>
                 <option value="">Date</option>
                    <?php for ($i=21; $i <58 ; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    </optgroup></select>
                    <label for="st" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="gomgr2" style="display:none;">
                  <label class="col-sm-3 control-label">Total Service</label>
                  <div class="col-sm-9">
 <?php  
$pgtser = array('type' => 'text','name' => 'pgtser','id' => 'pgtser','class' => 'form-control','placeholder' =>'Total Service','value' => set_value('pgtser'));
echo form_input($pgtser);
echo form_error('pgtser');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                  <div class="form-group"  id="gomgr1" style="display:none;">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
 <?php  
$pg = array('type' => 'text','name' => 'pgstos','id' => 'pg','class' => 'form-control','placeholder' =>'Order No','value' => set_value('pgstos'));
echo form_input($pg);
echo form_error('pgstos');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                <div class="form-group"   id="Expired1" style="display:none;">
                  <label class="col-sm-3 control-label">Date of Death</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$DateofDeath = array('type' => 'text','name' => 'DateofDeath','id' => 'DateofDeath','class' => 'form-control','placeholder' =>'Date of Death','value' => set_value('DateofDeath'));
echo form_input($DateofDeath);
echo form_error('DateofDeath');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateofDeath" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group"  id="Resignation1" style="display:none;">
                  <label class="col-sm-3 control-label">Date of resignation</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$pgrDateofRetirement = array('type' => 'text','name' => 'pgrDateofRetirement','id' => 'pgrDateofRetirement','class' => 'form-control','placeholder' =>'Date of resignation','value' => set_value('pgrDateofRetirement'));
echo form_input($pgrDateofRetirement);
echo form_error('pgrDateofRetirement');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="pgrDateofRetirement" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Resignation2" style="display:none;">
                  <label class="col-sm-3 control-label">Total serviceable years</label>
                  <div class="col-sm-9">
 <?php  
$pg = array('type' => 'text','name' => 'pgtseryear','id' => 'pg','class' => 'form-control','placeholder' =>'Total serviceable years','value' => set_value('pgtseryear'));
echo form_input($pg);
echo form_error('pgtseryear');
?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="missingdate1" style="display:none;">
                  <label class="col-sm-3 control-label">Date of Missing</label>
                  <div class="col-sm-9">
                  <div class="input-group">
 <?php  
$pgDateoMissing = array('type' => 'text','name' => 'pgDateoMissing','id' => 'pgDateoMissing','class' => 'form-control','placeholder' =>'Date of Missing','value' => set_value('pgDateoMissing'));
echo form_input($pgDateoMissing);
echo form_error('pgDateoMissing');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="pgDateoMissing" class="error"></label>
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
  jQuery('#Dateofrelieving').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#Dateofrelievingi').datepicker({dateFormat: "dd/mm/yy"});
jQuery('#voluntDateofRetirement').datepicker({dateFormat: "dd/mm/yy"});


    jQuery('#DismissingAuthority').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#DismissDate').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#DateofReti').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#pgDateofRetirement').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#DateofDeath').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#pgrDateofRetirement').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#pgDateoMissing').datepicker({dateFormat: "dd/mm/yy"});
    jQuery('#DateofReti1').datepicker({dateFormat: "dd/mm/yy"});

$(document).on('change', '#tid', function() {
    if(this.value == 'Yes'){
            $('#pTransfer2').show();
            $('#pTransfer222').show();
            $('#Expired1').hide();
    }else if(this.value == 'Expired'){
          $('#Expired1').show();
          $('#pTransfer2').hide();
    }else{
        $('#pTransfer2').hide();
        $('#pTransfer222').hide();
        $('#Expired1').hide();
    }
  });

    $(document).on('change', '#ti', function() {
        
        if(this.value == 'Promotion Transfer'){
          
          hideFields();
          $('#pTransfer1').show();
        
          $('#pTransfer2').hide();
          $('#pTransfer222').show();
          $('#repart').show();
           $('#Transfer2').hide();

            $('#Deputation1').hide();
            $('#Deputation2').hide();
            $('#Deputation3').hide();


            $('#Dismissed0').hide();
            $('#Dismissed1').hide();
            $('#Dismissed2').hide();
            $('#Dismissed3').hide();
            $('#Dismissed4').hide();
            

            $('#super1').hide();
            $('#super2').hide();
            $('#super3').hide();
            $('#super4').hide();

            $('#pre1').hide();
            $('#pre2').hide();
            $('#pre3').hide();

            $('#Expired1').hide();

            $('#retired').hide();
            $('#prematurepoart').hide();

            $('#Resignation').hide();
            $('#Resignation2').hide();

            $('#missingdate1').hide();
          
          }else if(this.value == 'Transfer'){
                      hideFields();
            $('#pTransfer1').show();
            $('#Transfer2').hide();

            $('#repart').show();
            $('#pTransfer2').hide();
            $('#pTransfer222').show();
            $('#Deputation1').hide();
            $('#Deputation2').hide();
            $('#Deputation3').hide();

            $('#Dismissed0').hide();
            $('#Dismissed1').hide();
            $('#Dismissed2').hide();
            $('#Dismissed3').hide();
            $('#Dismissed4').hide();

            $('#super1').hide();
            $('#super2').hide();
            $('#super3').hide();
            $('#super4').hide();

            $('#pre1').hide();
            $('#pre2').hide();
            $('#pre3').hide();

            $('#retired').hide();
            $('#prematurepoart').hide();

            $('#Expired1').hide();

            $('#Resignation1').hide();
            $('#Resignation2').hide();

            $('#missingdate1').hide();
   }else if(this.value == 'On deputation'){
              hideFields();
    $('#Deputation1').show();
    $('#Deputation2').show();
    $('#Deputation3').show();

    $('#repart').show();
     $('#pTransfer1').hide();
    $('#pTransfer2').hide();
    $('#pTransfer222').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed3').hide();
    $('#Dismissed4').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

    $('#Expired1').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'Dismissed'){
              hideFields();
    $('#Dismissed0').show();
    $('#Dismissed1').show();
    $('#Dismissed2').show();
    $('#Dismissed4').show();


    $('#pTransfer1').hide();
    $('#pTransfer2').hide();
    $('#pTransfer222').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Expired1').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'Retired'){
              hideFields();
    $('#retired').show();
    $('#prematurepoart').show();
    $('#Expired1').hide();

       $('#pTransfer1').hide();
    $('#pTransfer2').hide();
    $('#pTransfer222').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();

   }else if(this.value == 'Expired'){
              hideFields();
    $('#Expired1').show();
   $('#retired').hide();
    $('#prematurepoart').hide();

       $('#pTransfer1').hide();
    $('#pTransfer2').hide();
    $('#pTransfer222').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();
   }else if(this.value == 'Resignation'){
              hideFields();
    $('#Resignation1').show();
    $('#Resignation2').show();

$('#Expired1').hide();
   $('#retired').hide();
    $('#prematurepoart').hide();

       $('#pTransfer1').hide();
    $('#pTransfer2').hide();
    $('#pTransfer222').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
   }else if(this.value == 'Missing'){
              hideFields();
    $('#missingdate1').show();

     $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed3').hide();
    $('#Dismissed4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

    $('#Expired1').hide();

    $('#retired').hide();
    $('#prematurepoart').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();
   }else if(this.value == 'End of Services'){
       hideFields();
       $('#super5').show();
       $('#order_date_div').show();
       $('#date_of_end_services_div').show();
   }else{
       $('#super5').hide();
       $('#order_date_div').hide();
       $('#date_of_end_services_div').hide();
    $('#pTransfer1').hide();
    $('#pTransfer2').hide();
    $('#pTransfer222').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed4').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


    $('#Expired1').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();


   }
});
    

     $(document).on('change', '#Reason', function() {
    if(this.value == 'Any Other'){
       $('#Dismissed3').show();
     }else{
       $('#Dismissed3').hide();
     }
  });  

      $(document).on('change', '#smor', function() {
   if(this.value == 'Superannuation'){
    $('#super1').show();
    $('#super2').show();
    $('#super3').show();
    $('#super4').show();
    $('#super5').show();

    $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();

     $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

    $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
    $('#pre4').hide();
   }
   if(this.value == 'Voluntary'){
    $('#volunt1').show();
    $('#volunt2').show();
    $('#volunt3').show();
    $('#volunt4').show();
    $('#volunt5').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

     $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
    $('#pre4').hide();
   }if(this.value == 'Pre-mature'){
    $('#pre1').show();
    $('#pre2').show();
    $('#pre3').show();
    $('#pre4').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

    $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

      $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();
   }if(this.value == 'Pre-mature'){
    $('#pre1').show();
    $('#pre2').show();
    $('#pre3').show();
    $('#pre4').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

    $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();

     $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

   }if(this.value == 'On Medical Ground'){
    $('#gomgr1').show();
    $('#gomgr2').show();
    $('#gomgr3').show();
    $('#gomgr4').show();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

    $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();

    $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
    $('#pre4').hide();
   }
   
});  

function hideFields(){
    $('#super5').hide();
       $('#order_date_div').hide();
       $('#date_of_end_services_div').hide();
    $('#pTransfer1').hide();
    $('#pTransfer2').hide();
    $('#pTransfer222').hide();

    $('#Transfer1').hide();
    $('#Transfer2').hide();

    $('#Deputation1').hide();
    $('#Deputation2').hide();
    $('#Deputation3').hide();

    $('#Dismissed0').hide();
    $('#Dismissed1').hide();
    $('#Dismissed2').hide();
    $('#Dismissed4').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();


    $('#Expired1').hide();

    $('#Resignation').hide();
    $('#Resignation2').hide();

    $('#missingdate1').hide();

    $('#gomgr1').hide();
    $('#gomgr2').hide();
    $('#gomgr3').hide();
    $('#gomgr4').hide();

    $('#super1').hide();
    $('#super2').hide();
    $('#super3').hide();
    $('#super4').hide();
    $('#super5').hide();

    $('#volunt1').hide();
    $('#volunt2').hide();
    $('#volunt3').hide();
    $('#volunt4').hide();
    $('#volunt5').hide();

    $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();
    $('#pre4').hide();
}



   $(document).on('click', '#prematurei1', function() {
  $('#pre1').show();
    $('#pre2').show();
    $('#pre3').show();
    $('#pre1').hide();

});

$(document).on('click', '#prematurei2', function() {
     $('#pre1').hide();
    $('#pre2').hide();
    $('#pre3').hide();

});   


     $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

   $(document).on('change', '#iito', function() {
      if(this.value == 'Other'){
     $('#iitoOther1').show();
   }else{
    $('#iitoOther1').hide();
   }
  
});


      $(document).on('click', '#showi', function() {
  $('#Issuedtoc1').show();
  $('#Issuedtoc2').hide();
  
});

  $(document).on('click', '#showi2', function() {
  $('#Issuedtoc2').show();
  $('#Issuedtoc1').hide();
  
});

});
</script>
</body>
</html>
