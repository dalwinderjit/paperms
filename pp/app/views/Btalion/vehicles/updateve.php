<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Update Vehicle</title>
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
      <h3>&nbsp; &nbsp; Update Vehicle</h3>
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
                  <label class="col-sm-3 control-label">Make of Vehicle</label>
                  <div class="col-sm-9">
                 <?php  
$cov = array('' => '--Select--','Ambulance' => 'Ambulance', 'BUS 52 Seater' => 'BUS 52 Seater', 'Truck' => 'Truck', 'Canter/Tata 407' => 'Canter/Tata 407', 'M/Cycle (Royel Enfield)' => 'M/Cycle (Royel Enfield)', 'M/Cycle (Bajaj Pulsar)' => 'M/Cycle (Bajaj Pulsar)', 'Mini Bus' => 'Mini Bus','Toyota (Kirloskar Motor)' => 'Toyota (Kirloskar Motor)','Bolero (M & M)' => 'Bolero (M & M)', 'Xylo (M & M)' => 'Xylo (M & M)', 'Maruti Suzuki (Ertiga)' =>'Maruti Suzuki (Ertiga)', 'Scorpio (M & M)' => 'Scorpio (M & M)', 'Tata Sumo' => 'Tata Sumo','Gypsy' =>'Gypsy','Sumo Victa' => 'Sumo Victa','Jeep' => 'Jeep', 'Water Tank' => 'Water Tank','MAP Truck' => 'MAP Truck','Tractor' => 'Tractor','Ambassador Car' => 'Ambassador Car','M/Cycle (Suzuki)' => 'M/Cycle (Suzuki)','Van (Maruti Omni)' => 'Van (Maruti Omni)','Canter (Eicher)' => 'Canter (Eicher)','Bus 42 Seater' => 'Bus 42 Seater','Mahindra Invader' => 'Mahindra Invader', 'Bus 44 Seater' => 'Bus 44 Seater','Bus 45 Seater' => 'Bus 45 Seater','M/Cycle (Hero Karizma)' => 'M/Cycle (Hero Karizma)','Qualis' => 'Qualis','Tempo Trax Gama' => 'Tempo Trax Gama','Hero Honda' => 'Hero Honda','Bajaj Platina' => 'Bajaj Platina','Innova' => 'Innova','Maruti Suzuki SX-4' => 'Maruti Suzuki SX-4','Truck (Training)' => 'Truck (Training)','Gypsy (Training)' =>'Gypsy (Training)','Canter/Tata 407 (Training)' => 'Canter/Tata 407 (Training)','M/Cycle (Suzuki)(Training)' => 'M/Cycle (Suzuki) (Training)','Bolero (M & M) (Training)' => 'Bolero (M & M) (Training)','Mini Bus (Training)' => 'Mini Bus (Training)','Ambassador Car (Training)' => 'Ambassador Car (Training)','M/Cycle (Royel Enfield) (Training)' => 'M/Cycle (Royel Enfield) (Training)');
/*newarea Textfield*/
 echo form_dropdown('cov', $cov, set_value('cov',''),'id="cov" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cov');
/*----End newarea Textfield----*/ echo $vichelinfo->catofvechicle;
 ?>
                    <label for="cov" class="error"></label>
                  </div>
                </div>
          <input type="hidden" name="covi" value="<?php echo $vichelinfo->catofvechicle;  ?>">

         <div class="form-group">
                  <label class="col-sm-3 control-label">Registration Number</label>
                  <div class="col-sm-9">
                  <?php
                  $rnum = array('type' => 'text','name' => 'rnum','id' => 'rnum','class' => 'form-control','placeholder' =>'Engine No.','value' => $vichelinfo->regnom);
                  echo form_input($rnum);
                  echo form_error('rnum');
                  ?>
     
                    <label for="rnum" class="error"></label>
                  </div>
                </div> 

                    <div class="form-group">
                  <label class="col-sm-3 control-label">Registration Type</label>
                  <div class="col-sm-9">
                 <?php  
$moa = array('' => '--Select--', 'Temporary' =>'Temporary', 'Permanent' => 'Permanent');
/*newarea Textfield*/
 echo form_dropdown('regtypetp', $moa, set_value('regtypetp',$vichelinfo->modeofac),'id="moa" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('regtypetp');
/*----End newarea Textfield----*/
 ?>
                    <label for="regtypetp" class="error"></label>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 control-label">Vehicle model year</label>
                  <div class="col-sm-9">
                 <select name="dob1" class="select2">\
                 <option value="">Select</option>
                    <?php for ($i=1950; $i <2021 ; $i++) {
                        if($i == $vichelinfo->vechile_year){?>
                     ?>
                    <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                    <?php }else{ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } } ?>
                    </select>
                    <label for="dob1" class="error"></label>
                  </div>
                </div> 

                                 <div class="form-group">
                  <label class="col-sm-3 control-label">Engine No.</label>
                  <div class="col-sm-9">
<?php
$engno = array('type' => 'text','name' => 'engno','id' => 'engno','class' => 'form-control','placeholder' =>'Engine No.','value' => $vichelinfo->engineno);
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
$Chasis = array('type' => 'text','name' => 'Chasis','id' => 'Chasis','class' => 'form-control','placeholder' =>'Chasis No.','value' => $vichelinfo->chasisno);
echo form_input($Chasis);
echo form_error('Chasis');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 

                    <div class="form-group">
                  <label class="col-sm-3 control-label">Received Voucher/RC No.</label>
                  <div class="col-sm-9">
<?php
$rv = array('type' => 'text','name' => 'rv','id' => 'rv','class' => 'form-control','placeholder' =>'Received Voucher/RC No.','value' => $vichelinfo->recvoucher);
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
$rcdt = array('type' => 'text','name' => 'rcdt','id' => 'rcdt','class' => 'form-control','placeholder' =>'Received Voucher/RC Date','value' => $vichelinfo->recattachdate);
echo form_input($rcdt);
echo form_error('rcdt');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="rcdt" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Vehicle Condition </label>
                  <div class="col-sm-9">
                 <?php  
$vcon = array('' => '--Select--', 'Good' => 'Good', 'Normal' => 'Normal','Bad' => 'Bad');
/*newarea Textfield*/
 echo form_dropdown('vcon', $vcon, set_value('vcon',$vichelinfo->vehiclecon),'id="vcon" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('vcon');
/*----End newarea Textfield----*/
 ?>
                    <label for="vcon" class="error"></label>
                  </div>
                </div> 

        <div class="form-group">
                  <label class="col-sm-3 control-label">Status of Vehicle</label>
                  <div class="col-sm-9">
                 <?php  
$vc = array('' =>'Select type' ,'On Road' => 'On Road','On road case property in MT' => 'On road case property in MT','Off Road' => 'Off Road');
/*newarea Textfield*/
 echo form_dropdown('vc', $vc, set_value('vc',$vichelinfo->statusofvechile),'id="vc" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('vc');
/*----End newarea Textfield----*/
 ?>
                    <label for="vc" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="onroad" style="display: none">
                  <label class="col-sm-3 control-label">On Road</label>
                  <div class="col-sm-9">
                 <?php  
$ssw = array('' =>'Select type' ,'On Duty' => 'On Duty' /*'In Mt Garage' => 'In Mt Garage','Case property in MT Garage' => 'Case property in MT Garage','Case Property in PS' =>'Case Property in PS'*/);
/*newarea Textfield*/
 echo form_dropdown('ssw', $ssw, set_value('ssw',$vichelinfo->statusofonroadvichile),'id="ssw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ssw');
/*----End newarea Textfield----*/
 ?>
                    <label for="ssw" class="error"></label>
                  </div>
                </div> 
              <!--   On Duty
                Major repair(Case property)
                Under repair(Case property) -->

                <div class="form-group" id="onroadi" style="display: none">
                  <label class="col-sm-3 control-label">On road case property in MT</label>
                  <div class="col-sm-9">
                 <?php  
$ssw = array('' =>'Select type' ,'On Duty' => 'On Duty','Major repair(Case property)' => 'Major repair(Case property)','Under repair(Case property)' => 'Under repair(Case property)');
/*newarea Textfield*/
 echo form_dropdown('sswi', $ssw, set_value('sswi',$vichelinfo->sswi),'id="ssw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ssw');
/*----End newarea Textfield----*/
 ?>
                    <label for="ssw" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="offroad"  style="display: none">
                  <label class="col-sm-3 control-label">Off Road</label>
                  <div class="col-sm-9">
                 <?php  
$suw = array('' =>'Select type','Case Property in PS' => 'Case Property in PS', 'Major Repair' => 'Major Repair', 'under condemnation' => 'under condemnation','condemn' => 'condemn', 'Under Auction' => 'Under Auction');
/*newarea Textfield*/
 echo form_dropdown('suw', $suw, set_value('suw',$vichelinfo->statusofoffroadvichile),'id="suw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('suw');
/*----End newarea Textfield----*/
 ?>
                    <label for="suw" class="error"></label>
                  </div>
                </div>

                     <div class="form-group" id="conauth"  style="display:none">
                  <label class="col-sm-3 control-label"> Order no</label>
                  <div class="col-sm-9">
<?php 
$orderno = array('type' => 'text','name' => 'orderno','id' => 'orderno','class' => 'form-control','placeholder' =>'order no','value' => set_value('orderno'));
echo form_input($orderno);
echo form_error('orderno');
?>
                    <label for="orderno" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="condate" style="display:none">
                  <label class="col-sm-3 control-label">Condemn Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php 
$conditiondate = array('type' => 'text','name' => 'conditiondate','id' => 'conditiondate','class' => 'form-control','placeholder' =>'Condemn Date','value' => $vichelinfo->condemdate);
echo form_input($conditiondate);
echo form_error('conditiondate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="conditiondate" class="error"></label>
                  </div>
                </div>


                     <div class="form-group" id="aonauth"  style="display:none">
                  <label class="col-sm-3 control-label"> Auction order no</label>
                  <div class="col-sm-9">
<?php 
$aoa = array('type' => 'text','name' => 'aoa','id' => 'aoa','class' => 'form-control','placeholder' =>'order no','value' => set_value('aoa'));
echo form_input($aoa);
echo form_error('aoa');
?>
                    <label for="aoa" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="aondate" style="display:none">
                  <label class="col-sm-3 control-label">Auction Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php 
$adate = array('type' => 'text','name' => 'adate','id' => 'adate','class' => 'form-control','placeholder' =>'Auction Date','value' => set_value('adate'));
echo form_input($adate);
echo form_error('adate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="adate" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="bats" style="display:none;">
                   <label class="col-sm-3 control-label">Transfer to battalion/Unit</label>
                  <div class="col-sm-9">
                 <?php  
                  $ito = array();
                 $ito[''] = '--Select--';
                 foreach ($uname as $value) {
                   $ito[$value->users_id] = $value->nick;
                 } 
                 $ito['CPO'] = 'CPO';
                 $ito['Other'] = 'Other';
                 $ito['District'] = 'District';
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

                      
                <div class="form-group">
                  <label class="col-sm-3 control-label">Speedometer Reading</label>
                  <div class="col-sm-9">
<?php
$sr = array('type' => 'text','name' => 'sr','id' => 'sr','class' => 'form-control','placeholder' =>'Speedometer Reading','value' => $vichelinfo->speedmetor);
echo form_input($sr);
echo form_error('sr');
?>
                    <label for="sr" class="error"></label>
                  </div>
                </div>

    <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Order No.</label>
                  <div class="col-sm-9">
<?php
$ordersno = array('type' => 'text','name' => 'ordersno','id' => 'ordersno','class' => 'form-control','placeholder' =>'Order No','value' => $vichelinfo->iono);
echo form_input($ordersno);
echo form_error('ordersno');
?>
                    <label for="ordersno" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php
$ordersdate = array('type' => 'text','name' => 'ordersdate','id' => 'lid','class' => 'form-control','placeholder' =>'Order Date','value' => $vichelinfo->iodate);
echo form_input($ordersdate);
echo form_error('ordersdate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="ordersdate" class="error"></label>
                  </div>
                </div>


                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Date of transfer</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php
$dot = array('type' => 'text','name' => 'dot','id' => 'dot','class' => 'form-control','placeholder' =>'Date of transfer','value' => set_value('dot'));
echo form_input($dot);
echo form_error('dot');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="dot" class="error"></label>
                  </div>
                </div>   

                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Type of Duty</label>
                  <div class="col-sm-9">
                 <?php  
$tud = array('' => '--Select--','Sports' =>'Sports', 'Law and Order' => 'Law and Order', 'Ceremonial' => 'Ceremonial','NA' => 'NA');
/*newarea Textfield*/
 echo form_dropdown('tud', $tud, set_value('tud',$vichelinfo->type_of_duty),'id="tud" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('tud');
/*----End newarea Textfield----*/
 ?>
                    <label for="tud" class="error"></label>
                  </div>
                </div> 


                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-9">
<?php
$remark = array('type' => 'text','name' => 'remark','id' => 'remark','class' => 'form-control','placeholder' =>'Remarks','value' => set_value('remark'));
echo form_input($remark);
echo form_error('remark');
?>
                    <label for="remark" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Avg</label>
                  <div class="col-sm-9">
<?php
$engno = array('type' => 'text','name' => 'avg','id' => 'engno','class' => 'form-control','placeholder' =>'Avg','value' => $vichelinfo->avg);
echo form_input($engno);
echo form_error('avg');
?>
                    <label for="engno" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Month KM </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'mkm','id' => 'Chasis','class' => 'form-control');
echo form_input($Chasis);
echo form_error('mkm');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Old Month KM </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'mkmo','id' => 'Chasis','class' => 'form-control','placeholder' =>'Month KM','value' => $vichelinfo->mkm, 'readonly' => 'readonly');
echo form_input($Chasis);
echo form_error('mkmo');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>


                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Total KM </label>
                  <div class="col-sm-9">
<?php
if($vichelinfo->tmkm == 0) {
  $Chasis = array('type' => 'text','name' => 'tkm','id' => 'Chasis','class' => 'form-control','placeholder' =>'Total KM','value' => $vichelinfo->tmkm);
echo form_input($Chasis);
echo form_error('tkm');
}else{
  $Chasis = array('type' => 'text','name' => 'tkm','id' => 'Chasis','class' => 'form-control','placeholder' =>'Total KM','value' => $vichelinfo->tmkm,'readonly' => 'readonly');
echo form_input($Chasis);
echo form_error('tkm');
}

?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label"> Month POL </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'mpol','id' => 'Chasis','class' => 'form-control');
echo form_input($Chasis);
echo form_error('mpol');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                        <div class="form-group"  style="display: none;">
                  <label class="col-sm-3 control-label">Old Month POL </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'mpolo','id' => 'Chasis','class' => 'form-control','placeholder' =>'Month POL','value' => $vichelinfo->mpol, 'readonly' => 'readonly');
echo form_input($Chasis);
echo form_error('mpolo');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Total POL </label>
                  <div class="col-sm-9">
<?php
if($vichelinfo->tmpol == 0) {
  $Chasis = array('type' => 'text','name' => 'tpol','id' => 'Chasis','class' => 'form-control','placeholder' =>'Total POL','value' => $vichelinfo->tmpol);
echo form_input($Chasis);
echo form_error('tpol');
  }else{
    $Chasis = array('type' => 'text','name' => 'tpol','id' => 'Chasis','class' => 'form-control','placeholder' =>'Total POL','value' => $vichelinfo->tmpol,'readonly' => 'readonly');
echo form_input($Chasis);
echo form_error('tpol');
  }

?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">POL EXP</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'polex','id' => 'rn','class' => 'form-control','placeholder' =>'POL EXP','value' => $vichelinfo->polexp);
echo form_input($rn);
echo form_error('polex');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label"> Repair</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'repair','id' => 'rn','class' => 'form-control');
echo form_input($rn);
echo form_error('repair');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Old Repair</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'repairo','id' => 'rn','class' => 'form-control','placeholder' =>'Repair.','value' => $vichelinfo->repair, 'readonly' => 'readonly');
echo form_input($rn);
echo form_error('repairo');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display:none;">
                  <label class="col-sm-3 control-label">Total Repair</label>
                  <div class="col-sm-9">
<?php
if($vichelinfo->trpair == 0) {
$rn = array('type' => 'text','name' => 'trepair','id' => 'rn','class' => 'form-control','placeholder' =>'Total Repair.','value' => $vichelinfo->trpair);
echo form_input($rn);
echo form_error('rn');
  }else{
    $rn = array('type' => 'text','name' => 'trepair','id' => 'rn','class' => 'form-control','placeholder' =>'Total Repair.','value' => $vichelinfo->trpair,'readonly' => 'readonly');
echo form_input($rn);
echo form_error('rn');
  }

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
 echo form_dropdown('acnonc', $vcn, set_value('acnonc',$vichelinfo->acnonac),'id="vcn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('acnonc');
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
 echo form_dropdown('bp', $vcn, set_value('bp',$vichelinfo->bp),'id="vcn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('bp');
/*----End newarea Textfield----*/
 ?>
                    <label for="vcn" class="error"></label>
                  </div>
                </div> 


                  <h4 class="page-header">No. of Tyres (1-7)</h4>
                   

                      <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 1 Make</label>
                  <div class="col-sm-9">
                 <?php
$tyremake1 = array('type' => 'text','name' => 'tyremake1','id' => 'tyremake1','class' => 'form-control','placeholder' =>'Tyre 1 Make','value' => $vichelinfo->tyremake1);
echo form_input($tyremake1);
echo form_error('tyremake1');
?>     <label for="tyremake1" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 1 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial1 = array('type' => 'text','name' => 'tyreSerial1','id' => 'tyreSerial1','class' => 'form-control','placeholder' =>'Tyre 1 Serial','value' => $vichelinfo->tyreSerial1);
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
 echo form_dropdown('TyreCondition1', $TyreCondition1, $vichelinfo->TyreCondition1,'id="TyreCondition1" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
$tyremake2 = array('type' => 'text','name' => 'tyremake2','id' => 'tyremake2','class' => 'form-control','placeholder' =>'Tyre 2 Make','value' => $vichelinfo->tyremake2);
echo form_input($tyremake2);
echo form_error('tyremake2');
?>     <label for="tyremake2" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 2 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial2 = array('type' => 'text','name' => 'tyreSerial2','id' => 'tyreSerial2','class' => 'form-control','placeholder' =>'Tyre 2 Serial','value' => $vichelinfo->tyreSerial2);
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
 echo form_dropdown('TyreCondition2', $TyreCondition2, $vichelinfo->TyreCondition2,'id="TyreCondition1" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
$tyremake3 = array('type' => 'text','name' => 'tyremake3','id' => 'tyremake3','class' => 'form-control','placeholder' =>'Tyre 3 Make','value' => $vichelinfo->tyremake3);
echo form_input($tyremake3);
echo form_error('tyremake3');
?>     <label for="tyremake3" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 3 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial3 = array('type' => 'text','name' => 'tyreSerial3','id' => 'tyreSerial3','class' => 'form-control','placeholder' =>'Tyre 3 Serial','value' => $vichelinfo->tyreSerial3);
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
 echo form_dropdown('TyreCondition3', $TyreCondition3, $vichelinfo->TyreCondition3,'id="TyreCondition3" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
$tyremake4 = array('type' => 'text','name' => 'tyremake4','id' => 'tyremake4','class' => 'form-control','placeholder' =>'Tyre 4 Make','value' => $vichelinfo->tyremake4);
echo form_input($tyremake4);
echo form_error('tyremake4');
?>     <label for="tyremake4" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 4 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial4 = array('type' => 'text','name' => 'tyreSerial4','id' => 'tyreSerial4','class' => 'form-control','placeholder' =>'Tyre 4 Serial','value' => $vichelinfo->tyreSerial4);
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
 echo form_dropdown('TyreCondition4', $TyreCondition4, $vichelinfo->TyreCondition4,'id="TyreCondition4" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
$tyremake5 = array('type' => 'text','name' => 'tyremake5','id' => 'tyremake5','class' => 'form-control','placeholder' =>'Tyre 5 Make','value' => $vichelinfo->tyremake5);
echo form_input($tyremake5);
echo form_error('tyremake5');
?>     <label for="tyremake5" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 5 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial5 = array('type' => 'text','name' => 'tyreSerial5','id' => 'tyreSerial5','class' => 'form-control','placeholder' =>'Tyre 5 Serial','value' => $vichelinfo->tyreSerial5);
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
 echo form_dropdown('TyreCondition5', $TyreCondition5, $vichelinfo->TyreCondition5,'id="TyreCondition5" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
$tyremake5 = array('type' => 'text','name' => 'tyremake6','id' => 'tyremake5','class' => 'form-control','placeholder' =>'Tyre 6 Make','value' => $vichelinfo->tyremake6);
echo form_input($tyremake5);
echo form_error('tyremake5');
?>     <label for="tyremake5" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 6 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial6 = array('type' => 'text','name' => 'tyreSerial6','id' => 'tyreSerial6','class' => 'form-control','placeholder' =>'Tyre 6 Serial','value' => $vichelinfo->tyreSerial6);
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
 echo form_dropdown('TyreCondition6', $TyreCondition6, $vichelinfo->TyreCondition6,'id="TyreCondition6" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
$tyremake7 = array('type' => 'text','name' => 'tyremake7','id' => 'tyremake7','class' => 'form-control','placeholder' =>'Tyre 7 Make','value' => $vichelinfo->tyremake7);
echo form_input($tyremake7);
echo form_error('tyremake7');
?>     <label for="tyremake7" class="error"></label>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tyre 7 Serial</label>
                  <div class="col-sm-9">
                 <?php
$tyreSerial7 = array('type' => 'text','name' => 'tyreSerial7','id' => 'tyreSerial7','class' => 'form-control','placeholder' =>'Tyre 7 Serial','value' => $vichelinfo->tyreSerial7);
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
 echo form_dropdown('TyreCondition7', $TyreCondition7, $vichelinfo->TyreCondition7,'id="TyreCondition7" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
  }),
  jQuery('#lid').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#dot').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#adate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#conditiondate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rcdt').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
  
    $(document).ready(function() {

    $("#bdn").change(function(){
    var bdn = $("#bdn").val();
    var dataStrings = 'bdn='+ bdn;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-holder-name",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#hn").html(html);
    }  
      
    });

    });
     });
        $(document).on('change', '#vc', function() {
  if(this.value == 'On Road'){
     $('#onroad').show();
     $('#offroad').hide();
     $('#conauth').hide();
     $('#condate').hide();
     $('#aonauth').hide();
     $('#aondate').hide();
     $('#onroadi').hide();
   }else if(this.value == 'On road case property in MT'){
      $('#onroadi').show();
      $('#onroad').hide();
   }else if(this.value == 'Off Road'){
     $('#offroad').show();
     $('#onroadi').hide();
     $('#onroad').hide();
   }
 });

           $(document).on('change', '#suw', function() {
  if(this.value == 'condemn'){
     $('#conauth').show();
     $('#condate').show();
      $('#aonauth').hide();
     $('#aondate').hide();
   }else{
     $('#conauth').hide();
     $('#condate').hide();

   }
 });

           $(document).on('change', '#suw', function() {
  if(this.value == 'Auction'){
     $('#aonauth').show();
     $('#aondate').show();
      $('#conauth').hide();
     $('#condate').hide();
   }else{
     $('#aonauth').hide();
     $('#aondate').hide();
   }
 });

             $(document).on('change', '#ito', function() {
  if(this.value == 'Other'){
     $('#rnOthers11').show();
      $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
   }else if(this.value == 'District'){
     $('#dislist').show();
     $('#drvno').show();
     $('#drdate').show();
   }
   else{
    $('#rnOthers11').hide();
    $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
   }
});
});
</script>
</body>
</html>