<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Vehicle</title>
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
      <h3> &nbsp; &nbsp; &nbsp; Add Vehicle</h3>
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
                  <label class="col-sm-3 control-label">Make of Vehicle</label>
                  <div class="col-sm-9">
                 <?php  
$cov = array('' => '--Select--','Ambulance' => 'Ambulance', 'BUS 52 Seater' => 'BUS 52 Seater', 'Truck' => 'Truck', 'Canter/Tata 407' => 'Canter/Tata 407','Canter/SML ISUZU'=>'Canter/SML ISUZU', 'M/Cycle (Royel Enfield)' => 'M/Cycle (Royel Enfield)', 'M/Cycle (Bajaj Pulsar)' => 'M/Cycle (Bajaj Pulsar)', 'Mini Bus' => 'Mini Bus','Toyota (Kirloskar Motor)' => 'Toyota (Kirloskar Motor)','Bolero (M & M)' => 'Bolero (M & M)', 'Xylo (M & M)' => 'Xylo (M & M)', 'Maruti Suzuki (Ertiga)' =>'Maruti Suzuki (Ertiga)', 'Scorpio (M & M)' => 'Scorpio (M & M)', 'Tata Sumo' => 'Tata Sumo','Gypsy' =>'Gypsy','Sumo Victa' => 'Sumo Victa','Jeep' => 'Jeep', 'Water Tank' => 'Water Tank','MAP Truck' => 'MAP Truck','Tractor' => 'Tractor','Ambassador Car' => 'Ambassador Car','M/Cycle (Suzuki)' => 'M/Cycle (Suzuki)','Van (Maruti Omni)' => 'Van (Maruti Omni)','Canter (Eicher)' => 'Canter (Eicher)','Bus 42 Seater' => 'Bus 42 Seater','Mahindra Invader' => 'Mahindra Invader', 'Bus 44 Seater' => 'Bus 44 Seater','Bus 45 Seater' => 'Bus 45 Seater','M/Cycle (Hero Karizma)' => 'M/Cycle (Hero Karizma)','Qualis' => 'Qualis','Tempo Trax Gama' => 'Tempo Trax Gama','Hero Honda' => 'Hero Honda','Bajaj Platina' => 'Bajaj Platina','Innova' => 'Innova','Maruti Suzuki SX-4' => 'Maruti Suzuki SX-4','Truck (Training)' => 'Truck (Training)','Gypsy (Training)' =>'Gypsy (Training)','Canter/Tata 407 (Training)' => 'Canter/Tata 407 (Training)','M/Cycle (Suzuki)(Training)' => 'M/Cycle (Suzuki) (Training)','Bolero (M & M) (Training)' => 'Bolero (M & M) (Training)','Mini Bus (Training)' => 'Mini Bus (Training)','Ambassador Car (Training)' => 'Ambassador Car (Training)','M/Cycle (Royel Enfield) (Training)' => 'M/Cycle (Royel Enfield) (Training)','Force Motors Ambulance' => 'Force Motors Ambulance');

/*newarea Textfield*/
 echo form_dropdown('cov', $cov, set_value('cov',1),'id="cov" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cov');
/*----End newarea Textfield----*/
 ?>
                    <label for="cov" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Vehicle type</label>
                  <div class="col-sm-9">
<?php
$chno = array('' => '--Select--', 'Vajara' => 'Vajara','Water cannon' => 'Water cannon', 'Ambulance' => 'Ambulance', 'recovery Van' => 'recovery Van' ,'General duty' => 'General duty','MT Training Duty' => 'MT Training Duty');
/*newarea Textfield*/
 echo form_dropdown('chno', $chno, set_value('chno',1),'id="chno" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('chno');
/*----End newarea Textfield----*/
?>
                    <label for="chno" class="error"></label>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Vehicle Class</label>
                  <div class="col-sm-9">
                 <?php  
$vc = array('' => '--Select--', 'LMV' => 'LMV','HTV' => 'HTV', 'HMV' => 'HMV', 'MMV' => 'MMV', 'Two Wheeler' => 'Two Wheeler','LTV' => 'LTV','LCV'=>'LCV');
/*newarea Textfield*/
 echo form_dropdown('vc', $vc, set_value('vc',1),'id="vc" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('vc');
/*----End newarea Textfield----*/
 ?>
                    <label for="vc" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Vehicle model year</label>
                  <div class="col-sm-9">
                 <select name="dob1" class="select2">\
                 <option value="">Select</option>
                    <?php for ($i=1950; $i <2023 ; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    </select>
                    <label for="dob1" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Engine No.</label>
                  <div class="col-sm-9">
<?php
$engno = array('type' => 'text','name' => 'engno','id' => 'engno','class' => 'form-control','placeholder' =>'Engine No.','value' => set_value('engno'));
echo form_input($engno);
echo form_error('engno');
?>
                    <label for="engno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Chasis No. </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'Chasis','id' => 'Chasis','class' => 'form-control','placeholder' =>'Chasis No.','value' => set_value('Chasis'));
echo form_input($Chasis);
echo form_error('Chasis');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Registration Type</label>
                  <div class="col-sm-9">
                 <?php  
$moa = array('' => '--Select--', 'Temporary' =>'Temporary', 'Permanent' => 'Permanent');
/*newarea Textfield*/
 echo form_dropdown('moa', $moa, set_value('moa',1),'id="moa" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('moa');
/*----End newarea Textfield----*/
 ?>
                    <label for="moa" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Registration No.</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'rn','id' => 'rn','class' => 'form-control','placeholder' =>'Registration No.','value' => set_value('rn'));
echo form_input($rn);
echo form_error('rn');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">AC/Non-AC</label>
                  <div class="col-sm-9">
                 <?php  
$vcn = array('' => '--Select--', 'AC' => 'AC','Non-AC' => 'Non-AC');
/*newarea Textfield*/
 echo form_dropdown('vcn', $vcn, set_value('vcn',1),'id="vcn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('vcn');
/*----End newarea Textfield----*/
 ?>
                    <label for="vcn" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">BP/Non-BP</label>
                  <div class="col-sm-9">
                 <?php  
$vcn = array('' => '--Select--', 'BP' => 'BP','Non-BP' => 'Non-BP');
/*newarea Textfield*/
 echo form_dropdown('bp', $vcn, set_value('bp',''),'id="vcn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('bp');
/*----End newarea Textfield----*/
 ?>
                    <label for="vcn" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Speedometer Reading</label>
                  <div class="col-sm-9">
<?php
$sr = array('type' => 'text','name' => 'sr','id' => 'sr','class' => 'form-control','placeholder' =>'Speedometer Reading','value' => set_value('sr'));
echo form_input($sr);
echo form_error('sr');
?>
                    <label for="sr" class="error"></label>
                  </div>
                </div>


                     <div class="form-group">
                  <label class="col-sm-3 control-label"> Fuel Type</label>
                  <div class="col-sm-9">
              <?php 
$ftype = array('' => '--Select--', 'Petrol' => 'Petrol','Diesel' => 'Diesel');
/*newarea Textfield*/
 echo form_dropdown('ftype', $ftype, set_value('ftype',''),'id="ftype" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ftype');
?>
                    <label for="ftype" class="error"></label>

                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-3 control-label">Received From</label>
                  <div class="col-sm-9">
<?php
$rcfrm = array('' => '--Select--', 'CPO' =>'CPO','District' => 'District','Battalion' => 'Battalion', 'Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('rcfrm', $rcfrm, set_value('rcfrm',1),'id="rcfrm" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('rcfrm');
/*----End newarea Textfield----*/
?>
                    <label for="rcfrm" class="error"></label>
                  </div>
                </div> 


                <div class="form-group" id="Otherstate1" style="display:none;">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                  <?php 
                 $state = array();
                  $state[''] = '--Select--'; 
                 foreach ($statelist as $value) {
                   $state[$value->city] = $value->city;
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
 echo form_dropdown('ito', $ito, set_value('ito',''),'id="ito" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="rnOthers11" style="display:none;">
                  <label class="col-sm-3 control-label">Others</label>
                  <div class="col-sm-9">
<?php
$rno = array('type' => 'text','name' => 'rno','id' => 'rnOthers','class' => 'form-control','placeholder' =>'Others','value' => set_value('rno'));
echo form_input($rno);
echo form_error('rno');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>


                   <div class="form-group">
                  <label class="col-sm-3 control-label">Received Mode</label>
                  <div class="col-sm-9">
                 <?php  
$rm = array('' => '--Select--', 'Permanent' =>'Permanent', 'Temporary Attachment' => 'Temporary Attachment');
/*newarea Textfield*/
 echo form_dropdown('rm', $rm, set_value('rm',1),'id="rm" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('rm');
/*----End newarea Textfield----*/
 ?>
                    <label for="rm" class="error"></label>
                  </div>
                </div> 


                <div class="form-group">
                  <label class="col-sm-3 control-label">Received Voucher/RC No.</label>
                  <div class="col-sm-9">
<?php
$rv = array('type' => 'text','name' => 'rv','id' => 'rv','class' => 'form-control','placeholder' =>'Received Voucher/RC No.','value' => set_value('rv'));
echo form_input($rv);
echo form_error('rv');
?>
                    <label for="rv" class="error"></label>
                  </div>
                </div>

                      <div class="form-group">
                  <label class="col-sm-3 control-label">Received Voucher/RC Date</label>
                  <div class="col-sm-9">
<div class="input-group">
<?php
$rcdt = array('type' => 'text','name' => 'rcdt','id' => 'rcdt','class' => 'form-control','placeholder' =>'Received Voucher/RC Date','value' => set_value('rcdt'));
echo form_input($rcdt);
echo form_error('rcdt');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="rcdt" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Received Date</label>
                  <div class="col-sm-9">
 <div class="input-group">
<?php
$rcd = array('type' => 'text','name' => 'rcd','id' => 'rcd','class' => 'form-control','placeholder' =>'Received Date','value' => set_value('rcd'));
echo form_input($rcd);
echo form_error('rcd');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="rcd" class="error"></label>
                  </div>
                </div>


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Vehicle Condition</label>
                  <div class="col-sm-9">
                 <?php  
$vcon = array('' => '--Select--', 'Good' => 'Good', 'Normal' => 'Normal','Bad' => 'Bad');
/*newarea Textfield*/
 echo form_dropdown('vcon', $vcon, set_value('vcon',1),'id="vcon" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('vcon');
/*----End newarea Textfield----*/
 ?>
                    <label for="vcon" class="error"></label>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 control-label">Last Service Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
<?php
$lsd = array('type' => 'text','name' => 'lsd','id' => 'lsd','class' => 'form-control','placeholder' =>'Last Service Date','value' => set_value('lsd'));
echo form_input($lsd);
echo form_error('lsd');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="lsd" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Last Inspection Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php
$lid = array('type' => 'text','name' => 'lid','id' => 'lid','class' => 'form-control','placeholder' =>'Last Inspection Date','value' => set_value('lid'));
echo form_input($lid);
echo form_error('lid');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="lid" class="error"></label>
                  </div>
                </div> 

                <h4 class="page-header">No. of Tyres (1-7)</h4>
                   

                      <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 1 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake1 = array('type' => 'text','name' => 'tyremake1','id' => 'tyremake1','class' => 'form-control','placeholder' =>'Tyre 1 Make','value' => set_value('tyremake1'));
echo form_input($tyremake1);
echo form_error('tyremake1');
?>     <label for="tyremake1" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 1 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial1 = array('type' => 'text','name' => 'tyreSerial1','id' => 'tyreSerial1','class' => 'form-control','placeholder' =>'Tyre 1 Serial','value' => set_value('tyreSerial1'));
echo form_input($tyreSerial1);
echo form_error('tyreSerial1');
?>     <label for="tyreSerial1" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 1 Condition</label>
                  <div class="col-sm-9">
                 <?php  
$TyreCondition1 = array('' => '--Select--', 'Good' => 'Good', 'Bad' => 'Bad','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('TyreCondition1', $TyreCondition1, set_value('TyreCondition1',1),'id="TyreCondition1" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('TyreCondition1');
/*----End newarea Textfield----*/
 ?>
                    <label for="TyreCondition1" class="error"></label>
                  </div>
                </div>  <hr/>


                         <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 2 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake2 = array('type' => 'text','name' => 'tyremake2','id' => 'tyremake2','class' => 'form-control','placeholder' =>'Tyre 2 Make','value' => set_value('tyremake2'));
echo form_input($tyremake2);
echo form_error('tyremake2');
?>     <label for="tyremake2" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 2 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial2 = array('type' => 'text','name' => 'tyreSerial2','id' => 'tyreSerial2','class' => 'form-control','placeholder' =>'Tyre 2 Serial','value' => set_value('tyreSerial2'));
echo form_input($tyreSerial2);
echo form_error('tyreSerial2');
?>     <label for="tyreSerial2" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 2 Condition</label>
                  <div class="col-sm-9">
                 <?php  
$TyreCondition2 = array('' => '--Select--', 'Good' => 'Good', 'Bad' => 'Bad','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('TyreCondition2', $TyreCondition2, set_value('TyreCondition2',1),'id="TyreCondition1" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('TyreCondition2');
/*----End newarea Textfield----*/
 ?>
                    <label for="TyreCondition1" class="error"></label>
                  </div>
                </div>   <hr/>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 3 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake3 = array('type' => 'text','name' => 'tyremake3','id' => 'tyremake3','class' => 'form-control','placeholder' =>'Tyre 3 Make','value' => set_value('tyremake3'));
echo form_input($tyremake3);
echo form_error('tyremake3');
?>     <label for="tyremake3" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 3 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial3 = array('type' => 'text','name' => 'tyreSerial3','id' => 'tyreSerial3','class' => 'form-control','placeholder' =>'Tyre 3 Serial','value' => set_value('tyreSerial3'));
echo form_input($tyreSerial3);
echo form_error('tyreSerial3');
?>     <label for="tyreSerial3" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 3 Condition</label>
                  <div class="col-sm-9">
                 <?php  
$TyreCondition3 = array('' => '--Select--', 'Good' => 'Good', 'Bad' => 'Bad','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('TyreCondition3', $TyreCondition3, set_value('TyreCondition3',1),'id="TyreCondition3" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('TyreCondition3');
/*----End newarea Textfield----*/
 ?>
                    <label for="TyreCondition3" class="error"></label>
                  </div>
                </div>  <hr/>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 4 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake4 = array('type' => 'text','name' => 'tyremake4','id' => 'tyremake4','class' => 'form-control','placeholder' =>'Tyre 4 Make','value' => set_value('tyremake4'));
echo form_input($tyremake4);
echo form_error('tyremake4');
?>     <label for="tyremake4" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 4 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial4 = array('type' => 'text','name' => 'tyreSerial4','id' => 'tyreSerial4','class' => 'form-control','placeholder' =>'Tyre 4 Serial','value' => set_value('tyreSerial4'));
echo form_input($tyreSerial4);
echo form_error('tyreSerial4');
?>     <label for="tyreSerial4" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 4 Condition</label>
                  <div class="col-sm-9">
                 <?php  
$TyreCondition4 = array('' => '--Select--', 'Good' => 'Good', 'Bad' => 'Bad','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('TyreCondition4', $TyreCondition4, set_value('TyreCondition4',1),'id="TyreCondition4" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('TyreCondition4');
/*----End newarea Textfield----*/
 ?>
                    <label for="TyreCondition4" class="error"></label>
                  </div>
                </div>  <hr/>


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 5 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake5 = array('type' => 'text','name' => 'tyremake5','id' => 'tyremake5','class' => 'form-control','placeholder' =>'Tyre 5 Make','value' => set_value('tyremake5'));
echo form_input($tyremake5);
echo form_error('tyremake5');
?>     <label for="tyremake5" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 5 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial5 = array('type' => 'text','name' => 'tyreSerial5','id' => 'tyreSerial5','class' => 'form-control','placeholder' =>'Tyre 5 Serial','value' => set_value('tyreSerial5'));
echo form_input($tyreSerial5);
echo form_error('tyreSerial5');
?>     <label for="tyreSerial5" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 5 Condition</label>
                  <div class="col-sm-9">
                 <?php  
$TyreCondition5 = array('' => '--Select--', 'Good' => 'Good', 'Bad' => 'Bad','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('TyreCondition5', $TyreCondition5, set_value('TyreCondition5',1),'id="TyreCondition5" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('TyreCondition5');
/*----End newarea Textfield----*/
 ?>
                    <label for="TyreCondition5" class="error"></label>
                  </div>
                </div>  <hr/>

                          <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 6 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake5 = array('type' => 'text','name' => 'tyremake6','id' => 'tyremake5','class' => 'form-control','placeholder' =>'Tyre 6 Make','value' => set_value('tyremake5'));
echo form_input($tyremake5);
echo form_error('tyremake5');
?>     <label for="tyremake5" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 6 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial6 = array('type' => 'text','name' => 'tyreSerial6','id' => 'tyreSerial6','class' => 'form-control','placeholder' =>'Tyre 6 Serial','value' => set_value('tyreSerial6'));
echo form_input($tyreSerial6);
echo form_error('tyreSerial6');
?>     <label for="tyreSerial6" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 6 Condition</label>
                  <div class="col-sm-9">
                 <?php  
$TyreCondition6 = array('' => '--Select--', 'Good' => 'Good', 'Bad' => 'Bad','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('TyreCondition6', $TyreCondition6, set_value('TyreCondition6',1),'id="TyreCondition6" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('TyreCondition6');
/*----End newarea Textfield----*/
 ?>
                    <label for="TyreCondition6" class="error"></label>
                  </div>
                </div> <hr/>



                     <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 7 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake7 = array('type' => 'text','name' => 'tyremake7','id' => 'tyremake7','class' => 'form-control','placeholder' =>'Tyre 7 Make','value' => set_value('tyremake7'));
echo form_input($tyremake7);
echo form_error('tyremake7');
?>     <label for="tyremake7" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 7 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial7 = array('type' => 'text','name' => 'tyreSerial7','id' => 'tyreSerial7','class' => 'form-control','placeholder' =>'Tyre 7 Serial','value' => set_value('tyreSerial7'));
echo form_input($tyreSerial7);
echo form_error('tyreSerial7');
?>     <label for="tyreSerial7" class="error"></label>
                  </div>
                </div> 

                 <label class="col-sm-3 control-label">Tyre 7 Condition</label>
                  <div class="col-sm-9">
                 <?php  
$TyreCondition7 = array('' => '--Select--', 'Good' => 'Good', 'Bad' => 'Bad','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('TyreCondition7', $TyreCondition7, set_value('TyreCondition7',1),'id="TyreCondition7" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('TyreCondition7');
/*----End newarea Textfield----*/
 ?>
                    <label for="TyreCondition7" class="error"></label>
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
    $(document).on('change', '#rcfrm', function() {
  if(this.value == 'Other'){
     $('#rnOthers11').show();
     $('#bats').hide();
     $('#Otherstate1').hide();
   }else if(this.value == 'District'){
    $('#Otherstate1').show();
    $('#rnOthers11').hide();
    $('#bats').hide();
   }else if(this.value == 'Battalion'){
    $('#bats').show();
    $('#rnOthers11').hide();
     $('#Otherstate1').hide();
   }else{
    $('#bats').hide();
    $('#rnOthers11').hide();
     $('#Otherstate1').hide();
   }
});

});
</script>
</body>
</html>

