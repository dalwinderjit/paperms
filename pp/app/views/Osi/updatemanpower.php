<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Update ManPower Record</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.tagsinput.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
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
      <h3> &nbsp; &nbsp; Update ManPower Record 5465</h3>
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
  //	echo validation_errors();
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
	  'method'=>'post'
      );
 //var_dump($pageErrorCounter);
 //var_dump($pageErrorCounter['personal_detail']);
 //echo validation_errors();
 
?>
          <div class="panel panel-default">
                <div class="panel-body">
                  <style>
                    ul.my_ul{

                    }
                    ul.my_ul>li{
                      height: 90px;
                      text-align: center;
                      background-color: #99f5d9;
                    }
                    ul.my_ul>li>div:nth-child(1){
                      
                      height:60px;
                      margin-top:15px;
                      border-right: 1px solid green;
                      padding-top:15px;
                    }
                    .tie{
                      display: inline-block;
                      background: #99f5d9;
                      height: 10px;
                      width: 10px;
                      transform: rotate(45deg);
                      position: relative;
                      top: 13px;
                      border-top: 0px;
                      border-left: 0px;
                    }
                  </style>
        <ul class="nav nav-tabs nav-justified mynavbar my_ul" id="scroll">
          <li>
            <div><span class="fa fa-user" ></span><br/>Home</div>
            <div style="text-align:center"><span class="tie" style=""></span></div>
          </li>
          <li><span class="fa fa-user" ></span></li>
          <li><span class="fa fa-user" ></span></li>
          <li><span class="fa fa-user" ></span></li>
          <li><span class="fa fa-user" ></span></li>
          <li><span class="fa fa-user" ></span></li>
          <li><span class="fa fa-user" ></span></li>
          <?php if(false){ ?>
            <li class="<?php if($page=='personal_detail'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#one"><strong>Personal Detail</strong><?php echo (isset($pageErrorCounter))?getBadge('personal_detail',$pageErrorCounter):'';?></a></li>
            <li class="<?php if($page=='address'){echo 'active';} ?> anchor" ><a data-toggle="tab" href="#two"><strong>Address</strong><?php echo (isset($pageErrorCounter))?getBadge('address',$pageErrorCounter):'';?></a></li>
            <li class="<?php if($page=='education_detail'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#three"><strong>Educational Details</strong><?php echo (isset($pageErrorCounter))?getBadge('education_detail',$pageErrorCounter):'';?></a></li>
            <li class="<?php if($page=='enlistment_detail'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#four"><strong>Enlistment Details</strong><?php echo (isset($pageErrorCounter))?getBadge('enlistment_detail',$pageErrorCounter):'';?></a></li>
            <li class="<?php if($page=='present_service_detail'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#five"><strong>Present Service Details</strong><?php echo (isset($pageErrorCounter))?getBadge('present_service_detail',$pageErrorCounter):'';?></a></li>
            <li class="<?php if($page=='basic_training_course_detail'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#six"><strong>Basic Training Course</strong><?php echo (isset($pageErrorCounter))?getBadge('basic_training_course_detail',$pageErrorCounter):'';?></a></li>
            <li class="<?php if($page=='professional_course_detail'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#seven"><strong>Professional Course Details</strong><?php echo (isset($pageErrorCounter))?getBadge('professional_course_detail',$pageErrorCounter):'';?></a></li>
            <li class="<?php if($page=='annual_firing_practice'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#eight"><strong>Annual Firing Practice</strong><?php echo (isset($pageErrorCounter))?getBadge('annual_firing_practice',$pageErrorCounter):'';?></a></li>
            <?php if(false){ ?>
              <li class="hidden <?php if($page=='permanent_rank'){echo 'active';} ?> anchor"><a data-toggle="tab" href="#ten"><strong>Permanent Rank</strong><?php echo (isset($pageErrorCounter))?getBadge('permanent_rank',$pageErrorCounter):'';?></a></li>
            <?php } ?>
          <?php } ?>
        </ul>

        <div class="tab-content">
          <div id="one" class="tab-pane <?php if($page=='personal_detail'){echo 'active';} ?>">
		  <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
		  <input type="hidden" name="form_type" value="personal_detail">
                         <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Official(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$name = array('type' => 'text','name' => 'name','id' => 'name','class' => 'form-control','placeholder' =>'Name of Official','value' => set_value('name',$body->name));
echo form_input($name);
echo form_error('name');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Father Name(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$fname = array('type' => 'text','name' => 'fname','id' => 'fname','class' => 'form-control','placeholder' =>'Father Name','value' => set_value('fname',$body->fathername));
echo form_input($fname);
echo form_error('fname');
?>
                    <label for="fname" class="error"></label>
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-sm-3 control-label">Gender(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<label class="radio-inline"><input type="radio" name="gender"  value="Male" <?php if($body->gender == 'Male'){echo 'checked'; }?>>Male</label>
                <label class="radio-inline"><input type="radio" name="gender" value="Female" <?php if($body->gender == 'Female'){echo 'checked'; }?>>Female</label>
                  </div>
                </div>


                 <div class="form-group">
                  <label class="col-sm-3 control-label">Marital Status(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$mstatus = array('' => '--Select--',  'Single' => 'Single','Married' => 'Married','Unmarried' => 'Unmarried','Divorced' => 'Divorced', 'Widow/ Widower' => 'Widow/ Widower');
/*newarea Textfield*/
 echo form_dropdown('mstatus', $mstatus, set_value('mstatus',$body->maritalstatus),'id="mstatus" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('mstatus');
/*----End newarea Textfield----*/
 ?>
                    <label for="mstatus" class="error"></label>
                  </div>
                </div>


                <div class="form-group">
                 <label class="col-sm-3 control-label">Date of birth (YYYY-MM-DD)(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                <div class='input-group'>
                    <input type='text' name="dob" class="form-control"  id='datetimepicker1' value="<?php echo set_value('dob',$body->dateofbith); ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				<?php echo form_error('dob'); ?>
            </div></div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Caste(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$casting = array('type' => 'text','name' => 'casting','id' => 'casting','class' => 'form-control','placeholder' =>'Caste','value'=>set_value('casting',$body->caste));
echo form_input($casting);
echo form_error('casting');
?>
                    <label for="casting" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Category(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$catii = array('' => '--Select--',  'GEN' => 'GEN', 'SCM' => 'SCM','SCO' => 'SCO', 'BC' => 'BC','OBC' => 'OBC', 'ST' => 'ST','SCBM' => 'SCBM');
/*newarea Textfield*/
 echo form_dropdown('catii', $catii, set_value('catii',$body->category),'id="catii" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('catii');
/*----End newarea Textfield----*/
 ?>
                    <label for="catii" class="error"></label>
                  </div>
                </div>
                <h4 class="page-header">Contacts</h4>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Contact No. 1(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$conphno = array('type' => 'text','name' => 'conphno','id' => 'conphno','class' => 'form-control','placeholder' =>'Phone No','value' => set_value('conphno',$body->phono1));
echo form_input($conphno);
echo form_error('conphno');
?>
                    <label for="conphno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact No 2</label>
                  <div class="col-sm-9">
<?php
$conphnot = array('type' => 'text','name' => 'conphnot','id' => 'conphnot','class' => 'form-control','placeholder' =>'Phone No 2','value' => set_value('conphnot',$body->phono2));
echo form_input($conphnot);
echo form_error('conphnot');
?>
                    <label for="conphnot" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Email ID</label>
                  <div class="col-sm-9">
<?php
$pemailid = array('type' => 'email','name' => 'pemailid','id' => 'pemailid','class' => 'form-control','placeholder' =>'Email ID','value' => set_value('email',$body->email));
echo form_input($pemailid);
echo form_error('pemailid');
?>
                    <label for="pemailid" class="error"></label>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Adhaar Card No(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$addarcard = array('type' => 'text','name' => 'addarcard','id' => 'addarcard','class' => 'form-control','placeholder' =>'Adhaar Card No','value' => set_value('addarcard',$body->adharno));
echo form_input($addarcard);
echo form_error('addarcard');
?>
                    <label for="addarcard" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">PAN(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$pancard = array('type' => 'text','name' => 'pancard','id' => 'pancard','class' => 'form-control','placeholder' =>'PAN','value' => set_value('pancard',$body->pan));
echo form_input($pancard);
echo form_error('pancard');
?>
                    <label for="pancard" class="error"></label>
                  </div>
                </div>
                <h4 class="page-header">Bank Details</h4>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Name of the Bank(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$bankdetail = array('type' => 'text','name' => 'bankdetail','id' => 'bankdetail','class' => 'form-control','placeholder' =>'Name of the Bank','value' => set_value('bankdetail',$body->nameofbank));
echo form_input($bankdetail);
echo form_error('bankdetail');
?>
                    <label for="bankdetail" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Branch Address(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$bankbrach = array('type' => 'text','name' => 'bankbrach','id' => 'bankbrach','class' => 'form-control','placeholder' =>'Name of Branch','value' =>set_value('bankbrach', $body->nameofbranch));
echo form_input($bankbrach);
echo form_error('bankbrach');
?>
                    <label for="bankbrach" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Bank A/C No.(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$bankac = array('type' => 'text','name' => 'bankac','id' => 'bankac','class' => 'form-control','placeholder' =>'Bank A/C No.','value' => set_value('bankac',$body->bankacno));
echo form_input($bankac);
echo form_error('bankac');
?>
                    <label for="bankac" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">IFSC Code(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$ifsccode = array('type' => 'text','name' => 'ifsccode','id' => 'ifsccode','class' => 'form-control','placeholder' =>'IFSC Code','value' =>set_value('ifsccode',$body->ifsccode));
echo form_input($ifsccode);
echo form_error('ifsccode');
?>
                    <label for="ifsccode" class="error"></label>
                  </div>
                </div>
                <h4 class="page-header">Physical Details</h4>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Blood Group(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$bloodgroup = array('' => '--Blood Group--',  'O +ve' => 'O +ve', 'O –ve' => 'O –ve', 'A +ve' => 'A +ve', 'A –ve' => 'A –ve', 'AB +ve' => 'AB +ve', 'AB –ve' => 'AB –ve','B+ve' => 'B+ve', 'B-ve' => 'B-ve' );
/*newarea Textfield*/
 echo form_dropdown('bloodgroup', $bloodgroup, set_value('bloodgroup',$body->bloodgroup),'id="bloodgroup" data-placeholder="Choose One" class="select2"'); 
 echo form_error('bloodgroup');
?>
                    <label for="bloodgroup" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Identification Mark(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$Identificationmark = array('type' => 'text','name' => 'Identificationmark','id' => 'Identificationmark','class' => 'form-control','placeholder' =>'Identification Mark','value' => set_value('Identificationmark',$body->identificationmark));
echo form_input($Identificationmark);
echo form_error('Identificationmark');
?>
                    <label for="Identificationmark" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Weight(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                  <div class="col-xs-4"><?php
$Kg = array('type' => 'text','name' => 'Kg','id' => 'Kg','class' => 'form-control','placeholder' =>'Kg','value' => set_value('Kg',$body->Kg));
echo form_input($Kg);
echo form_error('Kg');
?></div><div class="col-xs-4">
<?php
$Gm = array('type' => 'text','name' => 'Gm','id' => 'Gm','class' => 'form-control','placeholder' =>'Gm','value' => set_value('Gm',$body->Gm));
echo form_input($Gm);
echo form_error('Gm');
?></div>
                    <label for="Gm" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Height(<span class="mandatory red">*</span>)</label>
                          <div class="col-xs-4"><?php
$Feet = array('type' => 'text','name' => 'Feet','id' => 'Feet','class' => 'form-control','placeholder' =>'Feet','value' => set_value('Feet',$body->feet));
echo form_input($Feet);
echo form_error('Feet');
?></div><div class="col-xs-4">
<?php
$inch = array('type' => 'text','name' => 'inch','id' => 'inch','class' => 'form-control','placeholder' =>'inch','value' =>set_value('inch', $body->inch));
echo form_input($inch);
echo form_error('inch');
?></div>
                </div>
                
				<div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>	
			<?php echo form_close(); ?>
			
            </div>
          <div id="two" class="tab-pane <?php if($page=='address'){echo 'active';} ?>">
            <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
            <input type="hidden" name="form_type" value="address">
			<div class="form-group">
                  <label class="col-sm-3 control-label">House No.(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$hno = array('type' => 'text','name' => 'hno','id' => 'hno','class' => 'form-control','placeholder' =>'House No.','value' => $body->houseno);
echo form_input($hno);
echo form_error('hno');
?>
                    <label for="hno" class="error"></label>
                  </div>
                </div>

                          <div class="form-group">
                  <label class="col-sm-3 control-label">Street No.</label>
                  <div class="col-sm-9">
<?php
$sno = array('type' => 'text','name' => 'sno','id' => 'sno','class' => 'form-control','placeholder' =>'Street No.','value' => $body->streetno);
echo form_input($sno);
echo form_error('sno');
?>
                    <label for="sno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Village/Mohalla</label>
                  <div class="col-sm-9">
<?php
$vm = array('type' => 'text','name' => 'vm','id' => 'vm','class' => 'form-control','placeholder' =>'Village/Mohalla','value' => $body->villmohala);
echo form_input($vm);
echo form_error('vm');
?>
                    <label for="vm" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Ward no.</label>
                  <div class="col-sm-9">
<?php
$wardno = array('type' => 'text','name' => 'wardno','id' => 'wardno','class' => 'form-control','placeholder' =>'ward no.','value' => set_value('wardno',$body->wardno));
echo form_input($wardno);
echo form_error('wardno');
?>
                    <label for="wardno" class="error"></label>
                  </div>
                </div>

             <!--    <div class="form-group">
                  <label class="col-sm-3 control-label">City</label>
                  <div class="col-sm-9">
<?php
/*$ct = array('type' => 'text','name' => 'ct','id' => 'ct','class' => 'form-control','placeholder' =>'City','value' => $body->city);
echo form_input($ct);
echo form_error('ct');*/
?>
                    <label for="ct" class="error"></label>
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Post Office</label>   
                  <div class="col-sm-9">
<?php
$po = array('type' => 'text','name' => 'po','id' => 'po','class' => 'form-control','placeholder' =>'Post Office','value' => $body->postoffice);
echo form_input($po);
echo form_error('po');
?>
                    <label for="po" class="error"></label>
                  </div>
                </div>
                                <div class="form-group">
                  <label class="col-sm-3 control-label">Police Station</label>
                  <div class="col-sm-9">
<?php
$ps = array('type' => 'text','name' => 'ps','id' => 'ps','class' => 'form-control','placeholder' =>'Police Station','value' => $body->policestation);
echo form_input($ps);
echo form_error('ps');
?>
                    <label for="ps" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tehsil</label>
                  <div class="col-sm-9">
<?php
$tl = array('type' => 'text','name' => 'tl','id' => 'tl','class' => 'form-control','placeholder' =>'Tehsil','value' => $body->teshil);
echo form_input($tl);
echo form_error('tl');
?>
                    <label for="tl" class="error"></label>
                  </div>
                </div>
                  <div class="form-group">
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
 echo form_dropdown('state', $state, set_value('state',$body->state),'id="state" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('state');
/*----End newarea Textfield----*/
 ?>
                    <label for="state" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="listing">
                  <label class="col-sm-3 control-label">District </label>
                  <div class="col-sm-9" >
                                     <?php 
                 $city = array();
                  $city[''] = '--City--'; 
                 foreach ($citylist1 as $value) {
                   $city[$value->city] = $value->city;
                 }

 ?>
                 <?php  
				 
/*newarea Textfield*/
 echo form_dropdown('dis', $city, set_value('dis',$body->district),'id="city" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('dis');
/*----End newarea Textfield----*/
 ?>
                    <label for="dis" class="error"></label>
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-sm-3 control-label">Nationality(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                  <?php 
                    $nat = array('' => '--Nationality--','Indian'=>'Indian','Nepal' => 'Nepal');
                  ?>
                 <?php  
/*newarea Textfield*/
 echo form_dropdown('nat', $nat, set_value('nat',$body->Nationality),'id="nat" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nat');
/*----End newarea Textfield----*/
 ?>
                    <label for="nat" class="error"></label>
                  </div>
                </div>
		             <div class="form-group">
                  <label class="col-sm-3 control-label">Same as permanent address</label>
                  <div class="col-sm-9">
				   <?php
				  $yesChecked = '';
				  $noChecked = '';
				  //var_dump($address);
				  if(null!=$this->input->post('peradd')){
					  if($this->input->post('peradd')=='yes'){
						  $yesChecked = true;
					  }else{
						  $noChecked = true;
					  }
				  }else{
					  if($address['permanent_address']==true){
						  $yesChecked = true;
					  }else{
						  $noChecked = true;
					  }
				  }
					echo form_radio(['name'=>'peradd','id'=>'peradd'],'yes',$yesChecked);
					echo form_label('Yes','peradd');
					
					echo form_radio(['name'=>'peradd','id'=>'peraddi'],'no',$noChecked);
					echo form_label('No','peraddi');
					?>
					<!--input type="radio" name="peradd" id="peradd" value="yes">
                    <label for="peradd">Yes</label> 
                     <input type="radio" name="peradd" id="peraddi" value="no">
                    <label for="peraddi">No</label-->
                  </div>

                 
                  </div>

                <div class="form-group" id="pfpart1">
                  <label class="col-sm-3 control-label">House No.</label>
                  <div class="col-sm-9">
<?php
$phouseno = array('type' => 'text','name' => 'phouseno','id' => 'phouseno','class' => 'form-control','placeholder' =>'House No.','value' => $body->phouse);
echo form_input($phouseno);
echo form_error('phouseno');
?>
                    <label for="phouseno" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="pfpart2">
                  <label class="col-sm-3 control-label">Street No.</label>
                  <div class="col-sm-9">
<?php
$pstreetno = array('type' => 'text','name' => 'pstreetno','id' => 'pstreetno','class' => 'form-control','placeholder' =>'Street No.','value' => $body->pstreet);
echo form_input($pstreetno);
echo form_error('pstreetno');
?>
                    <label for="pstreetno" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="pwardnodiv">
                  <label class="col-sm-3 control-label">Ward no.</label>
                  <div class="col-sm-9">
<?php
$wardno = array('type' => 'text','name' => 'pwardno','id' => 'wardno','class' => 'form-control','placeholder' =>'ward no.','value' => set_value('pwardno',$body->pward));
echo form_input($wardno);
echo form_error('pwardno');
?>
                    <label for="wardno" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="pfpart3">
                  <label class="col-sm-3 control-label">Village/Mohalla</label>
                  <div class="col-sm-9">
<?php
$pvillmoh = array('type' => 'text','name' => 'pvillmoh','id' => 'pvillmoh','class' => 'form-control','placeholder' =>'Village/Mohalla','value' => $body->pvillmohala);
echo form_input($pvillmoh);
echo form_error('pvillmoh');
?>
                    <label for="pvillmoh" class="error"></label>
                  </div>
                </div> 

                <!--div class="form-group" id="pfpart4">
                  <label class="col-sm-3 control-label">City</label>
                  <div class="col-sm-9">
<?php
/*$postcity = array('type' => 'text','name' => 'postcity','id' => 'postcity','class' => 'form-control','placeholder' =>'City Post Office','value' => $body->pcity);
echo form_input($postcity);
echo form_error('postcity');*/
?>
                    <label for="postcity" class="error"></label>
                  </div>
                </div-->

                <div class="form-group" id="pfpart5">
                  <label class="col-sm-3 control-label">Post Office</label>
                  <div class="col-sm-9">
<?php
$pcitypostoff = array('type' => 'text','name' => 'pcitypostoff','id' => 'pcitypostoff','class' => 'form-control','placeholder' =>'City Post Office','value' => set_value('ppostofice',$body->ppostoffice));
echo form_input($pcitypostoff);
echo form_error('pcitypostoff');
?>
                    <label for="pcitypostoff" class="error"></label>
                  </div>
                </div>
                                <div class="form-group" id="pfpart6">
                  <label class="col-sm-3 control-label">Police Station</label>
                  <div class="col-sm-9">
<?php
$ppolicestation = array('type' => 'text','name' => 'ppolicestation','id' => 'ppolicestation','class' => 'form-control','placeholder' =>'Police Station','value' => $body->ppolicestation);
echo form_input($ppolicestation);
echo form_error('ppolicestation');
?>
                    <label for="ppolicestation" class="error"></label>
                  </div>
                </div>
                                <div class="form-group" id="pfpart7">
                  <label class="col-sm-3 control-label">Tehsil</label>
                  <div class="col-sm-9">
<?php
$ptehsil = array('type' => 'text','name' => 'ptehsil','id' => 'ptehsil','class' => 'form-control','placeholder' =>'Tehsil','value' => $body->ptehsil);
echo form_input($ptehsil);
echo form_error('ptehsil');
?>
                    <label for="ptehsil" class="error"></label>
                  </div>
                </div> 

 <div class="form-group" id="pfpart8"> 
                  <label class="col-sm-3 control-label">State</label>
                  <div class="col-sm-9">

                       <?php 
                 $postate = array();
                  $postate[''] = '--Select--'; 
                 foreach ($statelist as $value) {
                   $postate[$value->state] = $value->state;
                 }

 ?>
            <?php  
/*newarea Textfield*/
 echo form_dropdown('postate', $postate, set_value('postate',$body->pstate),'id="postate" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('postate');
/*----End newarea Textfield----*/
 ?>
                    <label for="postate" class="error"></label>
                  </div>
                </div>

             <div class="form-group" id="pdistrictdiv">
                  <label class="col-sm-3 control-label">District pp</label>
                  <div class="col-sm-9">
                                     <?php 
                 $pcity = array();
                  $pcity[''] = '--City--'; 
                 foreach ($citylist2 as $value) {
                   $pcity[$value->city] = $value->city;
                 }

 ?>
                 <?php  
/*newarea Textfield*/
 echo form_dropdown('pdistrict', $pcity, set_value('pdistrict',$body->pdistrict),'id="city" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('pdistrict');
/*----End newarea Textfield----*/
 ?>
                    <label for="dis" class="error"></label>
                  </div>
                </div>

                
	             <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>  
      <?php echo form_close(); ?>
          </div>
         
            <div id="three" class="tab-pane <?php if($page=='education_detail'){echo 'active';} ?>">
            <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
            <input type="hidden" name="form_type" value="education_detail">
              <div class="form-group">
                  <label class="col-sm-3 control-label">Class</label>
                  <div class="col-sm-9">
                 <?php  
$stts = array('' => '--Select--',  'Illiterate' => 'Illiterate', 'Under Matric' => 'Under Matric', '10th' => '10th', 'H. Sec' => 'H. Sec', 'Prep' => 'Prep', '10+1' => '10+1','10+2' =>'10+2','Under Graduate' => 'Under Graduate', 'Graduate' => 'Graduate', 'Post Graduate' => 'Post Graduate','Doctorate' => 'Doctorate','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('stts', $stts, set_value('stts',$body->eduqalification),'id="stts" data-placeholder="Choose One" class="select2" '); 
 echo form_error('stts');
/*----End newarea Textfield----*/
 ?>
 
                    <label for="stts" class="error"></label>
                  </div>
                </div>

                       <div class="form-group" id="ugb" style="display:none;">
                  <label class="col-sm-3 control-label">Under Graduate</label>
                  <div class="col-sm-9">
                 <?php  
$UnderGraduate = array('' => '--Select--', 'BA-I' => 'BA-I', 'BA-II' => 'BA-II', 'BSc-I' => 'BSc-I', 'BSc-II' => 'BSc-II','BSc .IT-I' => 'BSc .IT-I', 'BSc .IT-II' => 'BSc .IT-II', 'Bcom-I' => 'Bcom-I','Bcom-II' => 'Bcom-II','BCA-I' =>'BCA-I','BCA-II' =>'BCA-II','BBA-I' => 'BBA-I','BBA-II' => 'BBA-II','LLB-I' => 'LLB-I','LLB-II' => 'LLB-II','B.Tech-I' => 'B.Tech-I', 'B.Tech-II' => 'B.Tech-II', 'B.Tech-III' => 'B.Tech-III');
/*newarea Textfield*/
 echo form_dropdown('UnderGraduate', $UnderGraduate, set_value('UnderGraduate',$body->UnderGraduate),'id="ug" data-placeholder="Choose One" class="select2" '); 
 echo form_error('UnderGraduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="UnderGraduate" class="error"></label>
                  </div>
                </div>  


                       <div class="form-group"  id="gb" style="display:none;">
                  <label class="col-sm-3 control-label">Graduate</label>
                  <div class="col-sm-9">
                 <?php  
$Graduate = array('' => '--Select--', 'BA' => 'BA', 'B.Sc' => 'B.Sc','BSc .IT' => 'BSc .IT', 'B.Com' => 'B.Com','BCA' =>'BCA','BBA' => 'BBA','BDS' => 'BDS','LLB' => 'LLB','B.Tech' => 'B.Tech','LAB Technician' => 'LAB Technician','BA/LLB' => 'BA/LLB');
/*newarea Textfield*/
 echo form_dropdown('Graduate', $Graduate, set_value('Graduate',$body->Graduate),'id="Graduate" data-placeholder="Choose One" class="select2" '); 
 echo form_error('Graduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Graduate" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group"  id="pgb" style="display:none;">
                  <label class="col-sm-3 control-label">Post Graduate</label>
                  <div class="col-sm-9">
                 <?php  
$PostGraduate = array('' => '--Select--', 'MA' => 'MA','M.Com' => 'M.Com','M.Phil' =>'M.Phil','M Pharm' => 'M Pharm','MCA' => 'MCA','MBA' => 'MBA','MTA' => 'MTA','M.Tech' => 'M.Tech','M.Sc' => 'M.Sc');
/*newarea Textfield*/
 echo form_dropdown('PostGraduate', $PostGraduate, set_value('PostGraduate',$body->PostGraduate),'id="PostGraduate" data-placeholder="Choose One" class="select2" '); 
 echo form_error('PostGraduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="PostGraduate" class="error"></label>
                  </div>
                </div> 

                <div class="form-group"  id="docb" style="display:none;">
                  <label class="col-sm-3 control-label">Doctorate</label>
                  <div class="col-sm-9">
                 <?php  
$Doctorate = array('' => '--Select--', 'Ph.d' => 'Ph.d','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('Doctorate', $Doctorate, set_value('Doctorate',$body->Doctorate),'id="doc" data-placeholder="Choose One" class="select2" '); 
 echo form_error('Doctorate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Doctorate" class="error"></label>
                  </div>
                </div>

 
                 <div class="form-group"  id="docOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other1</label>
                  <div class="col-sm-9">
<?php
$docOther = array('type' => 'text','name' => 'docOther','id' => 'docOther','class' => 'form-control','placeholder' =>'Other','value' => $body->Doctorateother);
echo form_input($docOther);
echo form_error('docOther');
?>
                    <label for="docOther" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
               <label class="col-sm-3 control-label">Computer literate</label>
                  <div class="col-sm-9">
                 <?php  
$InductionModeim = array('' => '--Select--', 'Yes' => 'Yes', 'No' => 'No');
 echo form_dropdown('clit', $InductionModeim, $body->comlit,'id="clit" data-placeholder="Choose One" class="select2" '); 
 echo form_error('clit');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>  
            <?php echo form_close(); ?>
            </div>

          
            <div id="four" class="tab-pane <?php if($page=='enlistment_detail'){echo 'active';} ?>">
            <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
            <input type="hidden" name="form_type" value="enlistment_detail">
            <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Battalion</label>
                  <div class="col-sm-9">
<?php
$Battalion = array('type' => 'text','name' => 'Battalion','id' => 'Battalion','class' => 'form-control','placeholder' =>'Battalion');
echo form_input($Battalion);
echo form_error('Battalion');
?>
                    <label for="docOther" class="error"></label>
                  </div>

                </div> 

           <div class="form-group">
		   <?php
			//var_dump($body);
		   ?>
                  <label class="col-sm-3 control-label">Type of Duty sd</label>
                  <div class="col-sm-9">
                 <?php  
$tyodu = array('' => '--Select--',  'Temporary' => 'Temporary','Permanent' => 'Permanent');
/*newarea Textfield*/

 echo form_dropdown('tyodu', $tyodu, set_value('tyodu',$body->typeofduty),'id="tyodu" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('tyodu');
/*----End newarea Textfield----*/
 ?>
                    
                  </div>
                </div>
            
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Mode of Enlistment</label>
                  <div class="col-sm-9">
                 <?php  
$Modemdr = array('' => '--Select--', 'Special Cases' => 'Special Cases','Direct' => 'Direct', 'Direct (Ex-Serviceman)' => 'Direct (Ex-Serviceman)','Direct (Wards of Ex-Serviceman)' => 'Direct (Wards of Ex-Serviceman)', 'Direct (Wards of Police Person)' => 'Direct (Wards of Police Person)','SPO' => 'SPO', 'Direct(SPORTS)' => 'Direct(SPORTS)', 'PLI' => 'PLI', 'Court cases' => 'Court cases','Direct (Freedom Fighter)' => 'Direct (Freedom Fighter)','Other' => 'Other','Temporary' => 'Temporary');
/*newarea Textfield*/
 echo form_dropdown('Modemdr', $Modemdr, set_value('Modemdr',$body->modeofrec),'id="Modemdr" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Modemdr');
/*----End newarea Textfield----*/
 ?>
                    <label for="Modemdr" class="error"></label>
                  </div>
                </div> 


                   <div class="form-group"  id="ModemdrOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
<?php
$mocOther = array('type' => 'text','name' => 'mocOther','id' => 'mocOther','class' => 'form-control','placeholder' =>'Other','value' =>set_value('mocOther',$body->othermodeofrecruitment));
echo form_input($mocOther);
echo form_error('mocOther');
?>
                    <label for="docOther" class="error"></label>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 control-label">Date of Enlistment</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$dateofesnlistment1 = array('type' => 'text','name' => 'dateofesnlistment1','id' => 'dateofesnlistment1','class' => 'form-control','placeholder' =>'Date of Enlistment (YYYY-MM-DD)','value' => set_value('dateofesnlistment1',$body->dateofinlitment));
echo form_input($dateofesnlistment1);
echo form_error('dateofesnlistment1');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                  </div>
                </div>
            
                                <div class="form-group">
                  <label class="col-sm-3 control-label">Enlistment of Rank</label>
                  <div class="col-sm-9">
            <?php  
$eor = array('' => '--Select--', 'Executive Staff' => 'Executive Staff', 'Ministerial Staff' => 'Ministerial Staff', 'Medical Staff' => 'Medical Staff', 'Class-IV (P)' => 'Class-IV (P)', 'Class-IV (C)' => 'Class-IV (C)');
 echo form_dropdown('eor', $eor, set_value('eor',$body->rankofenlistment),'id="eor" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor');
 ?>
                    <label for="eor" class="error"></label>
                  </div>
                </div>
                <?php if($body->rankofenlistment == 'Executive Staff'){ ?>
                <div class="form-group" id="eors1">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$eor1 = array('' => '--Select--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('eor1', $eor1, set_value('eor1',$body->eexrank),'id="eor1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor1');
 ?>
                    <label for="eor1" class="error"></label>
                  </div>
                </div> <?php }else{ ?>
                  <div class="form-group" id="eors1" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$eor1 = array('' => '--Select--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('eor1', $eor1, set_value('eor1',$body->eexrank),'id="eor1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor1');
 ?>
                    <label for="eor1" class="error"></label>
                  </div>
                </div>
                <?php } ?>

                 <?php if($body->rankofenlistment == 'Ministerial Staff'){ ?>
                 <div class="form-group" id="eors2">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$eor2 = array('' => '--Select--', 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('eor2', $eor2, set_value('eor2',$body->eminirank),'id="eor2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor2');
 ?>
                    <label for="eor2" class="error"></label>
                  </div>
                </div>
                <?php }else{ ?>
                  <div class="form-group" id="eors2" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$eor2 = array('' => '--Select--', 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.','Senior Scale Stenographer' => 'Senior Scale Stenographer','Junior Scale Stenographer' => 'Junior Scale Stenographer','Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('eor2', $eor2, set_value('eor2',$body->eminirank),'id="eor2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor2');
 ?>
                    <label for="eor2" class="error"></label>
                  </div>
                </div>
                <?php } ?>

                <?php if($body->rankofenlistment == 'Medical Staff'){ ?>
                 <div class="form-group" id="eors3">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$eor3 = array('' => '--Select--', 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('eor3', $eor3, set_value('eor3',$body->emedirank),'id="eor3" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>
                <?php }else{ ?>
                 <div class="form-group" id="eors3" style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$eor3 = array('' => '--Select--', 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('eor3', $eor3, set_value('eor3',$body->emedirank),'id="eor3" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>

                <?php } ?>

                <?php if($body->rankofenlistment == 'Class-IV (P)'){ ?>
                <div class="form-group" id="eors4">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$eor4 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali', 'Electrician' => 'Electrician', 'Painter' => 'Painter');
 echo form_dropdown('eor4', $eor4, set_value('eor4',$body->ecprank),'id="eor4" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor4');
 ?>
                    <label for="eor4" class="error"></label>
                  </div>
                </div> <?php }else{ ?>

                <div class="form-group" id="eors4" style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$eor4 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali', 'Electrician' => 'Electrician', 'Painter' => 'Painter');
 echo form_dropdown('eor4', $eor4, set_value('eor4',$body->ecprank),'id="eor4" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor4');
 ?>
                    <label for="eor4" class="error"></label>
                  </div>
                </div>
                <?php } ?>

                <?php if($body->rankofenlistment == 'Class-IV (C)'){ ?>
                  <div class="form-group" id="eors5">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$eor5 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali', 'Electrician' => 'Electrician', 'Painter' => 'Painter');
 echo form_dropdown('eor5', $eor5, set_value('eor5',$body->eccrank),'id="eor5" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor5');
 ?>
                    <label for="eor5" class="error"></label>
                  </div>
                </div> <?php }else{ ?>
                  <div class="form-group" id="eors5" style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$eor5 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali', 'Electrician' => 'Electrician', 'Painter' => 'Painter');
 echo form_dropdown('eor5', $eor5, set_value('eor5',$body->eccrank),'id="eor5" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor5');
 ?>
                    <label for="eor5" class="error"></label>
                  </div>
                </div>

                <?php } ?>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Enlistment Category</label>
                  <div class="col-sm-9">
                 <?php  
$Enlistmentec = array('' => '--Select--', 'GEN' => 'GEN', 'SCO' => 'SCO','SCBM' => 'SCBM', 'BC' => 'BC', 'OBC' => 'OBC', 'ST' => 'ST', 'NA' => 'NA');
 echo form_dropdown('Enlistmentec', $Enlistmentec, set_value('Enlistmentec',$body->enlistmentcat),'id="Enlistmentec" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Enlistmentec');
 ?>
                    <label for="Enlistmentec" class="error"></label>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-3 control-label">Enlistment Unit</label>
                  <div class="col-sm-9">
<?php
 $EnlistmentUnit = array();
                 $EnlistmentUnit[''] = '--Select--';
                 foreach ($uname as $value) {
					$EnlistmentUnit[$value->users_id] = $value->nick;
                 } 
                 $EnlistmentUnit['Intelligency wing'] = 'Intelligency wing';
                 $EnlistmentUnit['Other'] = 'Other';
                 $EnlistmentUnit['District'] = 'District';
/*newarea Textfield*/
 echo form_dropdown('EnlistmentUnit', $EnlistmentUnit, set_value('EnlistmentUnit',$body->EnlistmentUnit),'id="EnlistmentUnit" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" '); 
 echo form_error('EnlistmentUnit');
/*----End newarea Textfield----*/
?>
                    <label for="EnlistmentUnit" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="enuther" style="display: none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
<?php
$gpfPRAN = array('type' => 'text','name' => 'enuther','id' => 'gpfPRAN','class' => 'form-control','placeholder' =>'Other','value' => set_value('enuther',$body->enutherdistrict));
echo form_input($gpfPRAN);
echo form_error('enuther');
?>
                    <label for="gpfPRAN" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="enutherdistrict" style="display: none;">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
              <?php 
                $state = array();
                $state[''] = '--Select--'; 
                foreach ($citylist as $value) {
                $state[$value->city] = $value->city;
                }

                ?>
                <?php  
                /*newarea Textfield*/
                echo form_dropdown('enutherdistrict', $state, set_value('enutherdistrict',$body->enutherdistrict),'id="state" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
                echo form_error('enutherdistrict');
                /*----End newarea Textfield----*/
              ?>
                    <label for="gpfPRAN" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Date of Retirement</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateofRetirementdor = array('type' => 'text','name' => 'DateofRetirementdor','id' => 'DateofRetirementdor','class' => 'form-control','placeholder' =>'Date of Retirement (YYYY-MM-DD)','value' =>set_value('DateofRetirementdor',$body->dateofretirment));
echo form_input($DateofRetirementdor);
echo form_error('DateofRetirementdor');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateofRetirementdor" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Extension Retirement Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateofRetirementdor = array('type' => 'text','name' => 'DateofRetirementdori','id' => 'eDateofRetirementdor','class' => 'form-control','placeholder' =>'
Extension Retirement Date (YYYY-MM-DD)','value' => set_value('DateofRetirementdori',$body->dateofretirment2));
echo form_input($DateofRetirementdor);
echo form_error('DateofRetirementdori');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateofRetirementdor" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">GPF Pol. No</label>
                  <div class="col-sm-9">
<?php
$gpfPRAN = array('type' => 'text','name' => 'gpfPRAN','id' => 'gpfPRAN','class' => 'form-control','placeholder' =>'GPF Pol. No.','value' =>set_value('gpfPRAN',$body->gpfpranno));
echo form_input($gpfPRAN);
echo form_error('gpfPRAN');
?>
                    <label for="gpfPRAN" class="error"></label>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">PRAN No.</label>
                  <div class="col-sm-9">
<?php
$PRAN = array('type' => 'text','name' => 'PRAN','id' => 'PRAN','class' => 'form-control','placeholder' =>'PRAN No.','value' => set_value('PRAN',$body->PRAN));
echo form_input($PRAN);
echo form_error('PRAN');
?>
                    <label for="PRAN" class="error"></label>
                  </div>
                </div>
            <div class="form-group">
                  <label class="col-sm-3 control-label">HRMS Code</label>
                  <div class="col-sm-9">
<?php
$hrms_code = array('type' => 'text','name' => 'hrms_code','id' => 'hrms_code','class' => 'form-control','placeholder' =>'HRMS Code','value' => set_value('hrms_code',$body->hrms_cod    ));
echo form_input($hrms_code);
echo form_error('hrms_code');
?>
                    <label for="hrms_code" class="error"></label>
                  </div>
                </div>


<div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>  
            <?php echo form_close(); ?>
          </div>




<div id="five" class="tab-pane <?php if($page=='present_service_detail'){echo 'active';} ?>">
		  <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
		  <input type="hidden" name="form_type" value="present_service_detail">

          
              <div class="form-group">
                  <label class="col-sm-3 control-label">Battalion/Unit(*)</label>
                  <div class="col-sm-9">
<?php
                $BattalionUnitito = array();
                 $BattalionUnitito[''] = '--Select--';
                 foreach ($uname as $value) {
                   $BattalionUnitito[$value->users_id] = $value->nick;
                 }  
                 $BattalionUnitito['District'] = 'District';
/*newarea Textfield*/
 echo form_dropdown('BattalionUnitito', $BattalionUnitito, set_value('BattalionUnitito',$body->BattalionUnitito),'id="BattalionUnitito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('BattalionUnitito');
/*----End newarea Textfield----*/
?>
                    <label for="BattalionUnitito" class="error"></label>
                  </div>
                </div>  

                <div class="form-group" id="bunitdistrict" style="display: none;">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
              <?php 
                $state = array();
                $state[''] = '--Select--'; 
                foreach ($citylist as $value) {
                $state[$value->city] = $value->city;
                }

                ?>
                <?php  
                /*newarea Textfield*/
                echo form_dropdown('bunitdistrict', $state, set_value('bunitdistrict',$body->bunitdistrict),'id="state" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
                echo form_error('state');
                /*----End newarea Textfield----*/
              ?>
                  <label for="gpfPRAN" class="error"></label>
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Category of post</label>
                  <div class="col-sm-9">
            <?php  
            
$RankRankre = array('' => '--Select--', 'Executive Staff' => 'Executive Staff', 'Ministerial Staff' => 'Ministerial Staff', 'Medical Staff' => 'Medical Staff', 'Class-IV (P)' => 'Class-IV (P)', 'Class-IV (C)' => 'Class-IV (C)');
 echo form_dropdown('RankRankre', $RankRankre, set_value('RankRankre',$body->presentrank),'id="RankRankre" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
                <?php if($body->presentrank == 'Executive Staff'){ ?>
                <div class="form-group" id="exs1">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI','ASI/ORP' => 'ASI/ORP',  'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('catop1', $RankRankre, set_value('catop1',$body->cexrank),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
                <?php }else{ ?>
                <div class="form-group" id="exs1" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('catop1', $RankRankre, set_value('catop1',$body->cexrank),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
                <?php } ?>
                 <?php if($body->presentrank == 'Ministerial Staff'){ ?>
                 <div class="form-group" id="MinisterialStaff1">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$Ministerial = array('' => '--Select--',  'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk','Steno' => 'Steno', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('catop2', $Ministerial, set_value('catop2',$body->cminirank),'id="Ministerial" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop2');
 ?>
                    <label for="Ministerial" class="error"></label>
                  </div>
                </div><?php }else{ ?>
<div class="form-group" id="MinisterialStaff1" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$Ministerial = array('' => '--Select--', 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('catop2', $Ministerial, set_value('catop2',$body->cminirank),'id="Ministerial" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop2');
 ?>
                    <label for="Ministerial" class="error"></label>
                  </div>
                </div>
                <?php } ?>
                <?php if($body->presentrank == 'Medical Staff'){ ?>

                 <div class="form-group" id="MedicalStaff2">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$Medical = array('' => '--Select--', 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('catop3', $Medical, set_value('catop3',$body->cmedirank),'id="Medical" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div> <?php }else{ ?>
                <div class="form-group" id="MedicalStaff2"  style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$Medical = array('' => '--Select--', 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('catop3', $Medical, set_value('catop3',$body->cmedirank),'id="Medical" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>

                <?php } ?>
                 <?php if($body->presentrank == 'Class-IV (P)'){ ?>
                <div class="form-group" id="cl4" >
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf1 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Mechanic' => 'Mechanic', 'Electrician' => 'Electrician','Painter' => 'Painter','Syce' => 'Syce');
 echo form_dropdown('catop4', $cf1, set_value('catop4',$body->ccprank),'id="cf1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop4');
 ?>
                    <label for="cf1" class="error"></label>
                  </div>
                </div>

                
                <?php }else{ ?>
                <div class="form-group" id="cl4" style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf1 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('catop4', $cf1, set_value('catop4',''),'id="cf1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop4');
 ?>
                    <label for="cf1" class="error"></label>
                  </div>
                </div>

                  

                <?php } ?> 
                <?php if($body->presentrank == 'Class-IV (C)'){ ?>
                  <div class="form-group" id="cl5">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf2 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('catop5', $cf2, set_value('catop5',$body->cccrank),'id="cf2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop5');
 ?>
                    <label for="cf2" class="error"></label>
                  </div>
                </div>

                 
                <?php }else{ ?>
                <div class="form-group" id="cl5"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf2 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('catop5', $cf2, set_value('catop5',$body->cccrank),'id="cf2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop5');
 ?>
                    <label for="cf2" class="error"></label>
                  </div>
                </div>

              
                <?php } ?>


              <?php if($body->presentrank == 'Class-IV (P)' || $body->presentrank == 'Class-IV (C)'){ ?>
                <div class="form-group" id="cl6">
                  <label class="col-sm-3 control-label">Nature of Duty</label>
                  <div class="col-sm-9">
<?php
$cnody = array('type' => 'text','name' => 'cnody','id' => 'cnody','class' => 'form-control','placeholder' =>'Nature of Duty','value' =>set_value('cnody', $body->cnody));
echo form_input($cnody);
echo form_error('cnody');
?>
                    <label for="Deptdn" class="error"></label>
                  </div>
                </div>

              <?php }else{ ?>
                  <div class="form-group" id="cl6" style="display: none;">
                  <label class="col-sm-3 control-label">Nature of Duty</label>
                  <div class="col-sm-9">
<?php
$cnody = array('type' => 'text','name' => 'cnody','id' => 'cnody','class' => 'form-control','placeholder' =>'Nature of Duty','value' =>set_value('cnody',$body->cnody));
echo form_input($cnody);
echo form_error('cnody');
?>
                    <label for="Deptdn" class="error"></label>
                  </div>
                </div>
              <?php } ?>



                <div class="form-group">
                  <label class="col-sm-3 control-label">Dept. No.</label>
                  <div class="col-sm-9">
<?php
$Deptdn = array('type' => 'text','name' => 'Deptdn','id' => 'Deptdn','class' => 'form-control','placeholder' =>'Dept. No.','value' =>set_value('Deptdn', $body->depttno));
echo form_input($Deptdn);
echo form_error('Deptdn');
?>
                    <label for="Deptdn" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Identity Card No.</label>
                  <div class="col-sm-9">
<?php
$iIdentityCardNocn = array('type' => 'text','name' => 'iIdentityCardNocn','id' => 'iIdentityCardNocn','class' => 'form-control','placeholder' =>'Identity Card No.','value' =>set_value('iIdentityCardNocn',$body->iIdentityCardNocn));
echo form_input($iIdentityCardNocn);
echo form_error('iIdentityCardNocn');
?>
                    <label for="iIdentityCardNocn" class="error"></label>
                  </div>
                </div>
                 <div class="form-group" id="cattoinduction">
                  <label class="col-sm-3 control-label">Category of Induction</label>
                  <div class="col-sm-9">
            <?php  
$catofind = array('' => '--Select--', 'Executive Staff' => 'Executive Staff', 'Ministerial Staff' => 'Ministerial Staff', 'Medical Staff' => 'Medical Staff', 'Class-IV (P)' => 'Class-IV (P)', 'Class-IV (C)' => 'Class-IV (C)');
 echo form_dropdown('catofind', $catofind, set_value('catofind',$body->inductionrank),'id="catofind" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind');
 ?>
                    <label for="catofind" class="error"></label>
                  </div>
                </div>
                <script type="text/javascript">

                </script>
<?php if($body->inductionrank == 'Executive Staff'){ ?>
                <div class="form-group" id="catofind1">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('catofind1', $RankRankre, set_value('catofind1',$body->ierank),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
<?php }else{ ?>

  <div class="form-group" id="catofind1" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('catofind1', $RankRankre, set_value('catofind1',$body->ierank),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
                <?php } ?>
                <?php if($body->inductionrank == 'Ministerial Staff'){ ?>
                 <div class="form-group" id="catofind2" >
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$Ministerial = array('' => '--Select--', 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Subdent-I' => 'Subdent-I','Subdent-II' => 'Subdent-II');
 echo form_dropdown('catofind2', $Ministerial, set_value('catofind2',$body->iminirank),'id="Ministerial" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind3');
 ?>
                    <label for="Ministerial" class="error"></label>
                  </div>
                </div>
              <?php }else{ ?>
                <div class="form-group" id="catofind2"  style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$Ministerial = array('' => '--Select--', 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Subdent-I' => 'Subdent-I','Subdent-II' => 'Subdent-II');
 echo form_dropdown('catofind2', $Ministerial, set_value('catofind2',$body->iminirank),'id="Ministerial" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind3');
 ?>
                    <label for="Ministerial" class="error"></label>
                  </div>
                </div>
                <?php } ?>
                <?php if($body->inductionrank == 'Medical Staff'){ ?>
                 <div class="form-group" id="catofind3">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$Medical = array('' => '--Select--', 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('catofind3', $Medical, set_value('catofind3',$body->imedirank),'id="Medical" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>
<?php }else{ ?>
  <div class="form-group" id="catofind3"  style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$Medical = array('' => '--Select--', 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('catofind3', $Medical, set_value('catofind3',$body->imedirank),'id="Medical" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>
                 <?php } ?>
                 <?php if($body->inductionrank == 'Class-IV (P)'){ ?>
                <div class="form-group" id="catofind4">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf1 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('catofind4', $cf1, set_value('catofind4',$body->icprank),'id="cf1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind4');
 ?>
                    <label for="cf1" class="error"></label>
                  </div>
                </div>
<?php }else{ ?>
  <div class="form-group" id="catofind4"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf1 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('catofind4', $cf1, set_value('catofind4',$body->icprank),'id="cf1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind4');
 ?>
                    <label for="cf1" class="error"></label>
                  </div>
                </div>
<?php } ?>
<?php if($body->inductionrank == 'Class-IV (C)'){ ?>
                  <div class="form-group" id="catofind5">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf2 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('catofind5', $cf2, set_value('catofind5',$body->iccrank),'id="cf2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind5');
 ?>
                    <label for="cf2" class="error"></label>
                  </div>
                </div>
                <?php }else{ ?>
                  <div class="form-group" id="catofind5"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf2 = array('' => '--Select--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('catofind5', $cf2, set_value('catofind5',$body->iccrank),'id="cf2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind5');
 ?>
                    <label for="cf2" class="error"></label>
                  </div>
                </div>
<?php } ?>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Battalion Induction Mode</label>
                  <div class="col-sm-9">
                 <?php 
$InductionModeim = array('' => '--Select--', 'Transfer' => 'Transfer', 'Transfer(Promotion)' => 'Transfer(Promotion)', 'Transfer(Excess)' => 'Transfer(Excess)', 'Attachment' => 'Attachment','Transfer Pay Purpose' => 'Transfer Pay Purpose','Since Enlistment' => 'Since Enlistment','Transfer (On regular)' => 'Transfer (On regular)','On deputation' => 'On deputation','Formal Order Not Issued' => 'Formal Order Not Issued','Not Reported' => 'Not Reported');
 echo form_dropdown('InductionModeim', $InductionModeim, set_value('InductionModeim',$body->inductionmode),'id="InductionModeim" data-placeholder="Choose One" class="select2"'); 
 echo form_error('InductionModeim');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-3 control-label">Induction Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$indictiondate = array('type' => 'text','name' => 'indictiondate','id' => 'indictiondate','class' => 'form-control','placeholder' =>'Induction Date','value' => $body->inductiondate);
echo form_input($indictiondate);
echo form_error('indictiondate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="indictiondate" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Previous Batalion</label>
                  <div class="col-sm-9">
<?php
$PreviousBatalionito = array('' => '--Select--', '7-PAP' => '7-PAP','9-PAP' => '9-PAP', '13-PAP' => '13-PAP','27-PAP' => '27-PAP','36-PAP' => '36-PAP','75-PAP' => '75-PAP','80-PAP' => '80-PAP','82-PAP' => '82-PAP', 'CCR' => 'CCR', 'CR-PAP' => 'CR-PAP','RTC-PAP' => 'RTC-PAP','ISTC-KPT' => 'ISTC-KPT','CTC-PTL' => 'CTC-PTL','CSO' => 'CSO','1-CDO' => '1-CDO','2-CDO' => '2-CDO', '3-CDO' => '3-CDO', '4-CDO' => '4-CDO','5-CDO' => '5-CDO','1-IRB' => '1-IRB','2-IRB' => '2-IRB', '3-IRB' => '3-IRB', '4-IRB' => '4-IRB','5-IRB' => '5-IRB','6-IRB' => '6-IRB','7-IRB' => '7-IRB','Other' => 'Other'); 

/*newarea Textfield*/
 echo form_dropdown('PreviousBatalionito', $PreviousBatalionito, set_value('PreviousBatalionito',$body->prebattalion),'id="PreviousBatalionito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('PreviousBatalionito');
/*----End newarea Textfield----*/
?>
                    <label for="PreviousBatalionito" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Previous No.</label>
                  <div class="col-sm-9">
<?php
$PreviousNoprn = array('type' => 'text','name' => 'PreviousNoprn','id' => 'PreviousNoprn','class' => 'form-control','placeholder' =>'Previous No.','value' => $body->prebattno);
echo form_input($PreviousNoprn);
echo form_error('PreviousNoprn');
?>
                    <label for="PreviousNoprn" class="error"></label>
                  </div>
                </div>
          
          <div class="form-group">
                  <label class="col-sm-3 control-label">Good Entries</label>
                  <div class="col-sm-9">
<?php
$PreviousNoprn = array('type' => 'text','name' => 'gd1','id' => 'gd1','class' => 'form-control','value' => $body->gd1);
echo form_input($PreviousNoprn);
echo form_error('PreviousNoprn');
?>
                    <label for="PreviousNoprn" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Bad Entries</label>
                  <div class="col-sm-9">
<?php
$PreviousNoprn = array('type' => 'text','name' => 'bd1','id' => 'bd1','class' => 'form-control','value' => $body->bd1);
echo form_input($PreviousNoprn);
echo form_error('PreviousNoprn');
?>
                    <label for="PreviousNoprn" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="dateblockm1" style="display: none;">
                  <label class="col-sm-3 control-label">Placement as Junior Asst. Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$doppp = array('type' => 'text','name' => 'dateblockm1','id' => 'dateblockm11','class' => 'form-control','placeholder' =>'Placement as Junior Asst. Date','value' => $body->dateblockm1);
echo form_input($doppp);
echo form_error('doppp');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails23" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="dateblockm2" style="display: none;">
                  <label class="col-sm-3 control-label">Promotion as Sr. Asst. Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$doppp = array('type' => 'text','name' => 'dateblockm2','id' => 'dateblockm12','class' => 'form-control','placeholder' =>'Promotion as Sr. Asst. Date','value' => $body->dateblockm2);
echo form_input($doppp);
echo form_error('doppp');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails23" class="error"></label>
                  </div>
                </div>


                   <div class="form-group"  id="dateblockm3" style="display: none;">
                  <label class="col-sm-3 control-label">Promotion as Supdt Grade-I</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$doppp = array('type' => 'text','name' => 'dateblockm3','id' => 'dateblockm13','class' => 'form-control','placeholder' =>'Promotion as Supdt Grade-I','value' => $body->dateblockm3);
echo form_input($doppp);
echo form_error('doppp');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails23" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="dateblockm4" style="display: none;">
                  <label class="col-sm-3 control-label">Promotion as Supdt Grade-II</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$doppp = array('type' => 'text','name' => 'dateblockm4','id' => 'dateblockm14','class' => 'form-control','placeholder' =>'Promotion as Supdt Grade-II','value' => $body->dateblockm4);
echo form_input($doppp);
echo form_error('doppp');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails23" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="exdateblock1">
                  <label class="col-sm-3 control-label">Lower School Course Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails21 = array('type' => 'text','name' => 'DateOFPromotionDetails21','id' => 'DateOFPromotionDetails21','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->loweschoolcdate);
echo form_input($DateOFPromotionDetails21);
echo form_error('DateOFPromotionDetails21');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails21" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="exdateblock2">
                  <label class="col-sm-3 control-label">Date of C-I</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails23 = array('type' => 'text','name' => 'DateOFPromotionDetails23','id' => 'DateOFPromotionDetails23','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->doc1);
echo form_input($DateOFPromotionDetails23);
echo form_error('DateOFPromotionDetails23');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails23" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock3">
                  <label class="col-sm-3 control-label">Date of C-II</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails24 = array('type' => 'text','name' => 'DateOFPromotionDetails24','id' => 'DateOFPromotionDetails24','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->doc2);
echo form_input($DateOFPromotionDetails24);
echo form_error('DateOFPromotionDetails24');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails24" class="error"></label>
                  </div>
                </div>


                <div class="form-group" id="exdateblock4">
                  <label class="col-sm-3 control-label">Date of offg. HC</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails25 = array('type' => 'text','name' => 'DateOFPromotionDetails25','id' => 'DateOFPromotionDetails25','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dofhc);
echo form_input($DateOFPromotionDetails25);
echo form_error('DateOFPromotionDetails25');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails25" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock5">
                  <label class="col-sm-3 control-label">Inter Mediate School Course Passing  Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails26 = array('type' => 'text','name' => 'DateOFPromotionDetails26','id' => 'DateOFPromotionDetails26','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->intermediatescor);
echo form_input($DateOFPromotionDetails26);
echo form_error('DateOFPromotionDetails26');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails26" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock6">
                  <label class="col-sm-3 control-label">Date of List-D</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails27 = array('type' => 'text','name' => 'DateOFPromotionDetails27','id' => 'DateOFPromotionDetails27','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dofld);
echo form_input($DateOFPromotionDetails27);
echo form_error('DateOFPromotionDetails27');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails27" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock7">
                  <label class="col-sm-3 control-label">Date of List D-II</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails28 = array('type' => 'text','name' => 'DateOFPromotionDetails28','id' => 'DateOFPromotionDetails28','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dofld2);
echo form_input($DateOFPromotionDetails28);
echo form_error('DateOFPromotionDetails28');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails28" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock8">
                  <label class="col-sm-3 control-label">Date of offg. ASI</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails29 = array('type' => 'text','name' => 'DateOFPromotionDetails29','id' => 'DateOFPromotionDetails29','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dateofoffasi);
echo form_input($DateOFPromotionDetails29);
echo form_error('DateOFPromotionDetails29');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails29" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock9">
                  <label class="col-sm-3 control-label">Upper School Course Passing  Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails30 = array('type' => 'text','name' => 'DateOFPromotionDetails30','id' => 'DateOFPromotionDetails30','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->upperschool);
echo form_input($DateOFPromotionDetails30);
echo form_error('DateOFPromotionDetails30');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails30" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock10">
                  <label class="col-sm-3 control-label">Date of List-E</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails31 = array('type' => 'text','name' => 'DateOFPromotionDetails31','id' => 'DateOFPromotionDetails31','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dateofliste);
echo form_input($DateOFPromotionDetails31);
echo form_error('DateOFPromotionDetails31');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails31" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="exdateblock11">
                  <label class="col-sm-3 control-label">Date of List E-II</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails32 = array('type' => 'text','name' => 'DateOFPromotionDetails32','id' => 'DateOFPromotionDetails32','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dateofliste2);
echo form_input($DateOFPromotionDetails32);
echo form_error('DateOFPromotionDetails32');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails32" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock12">
                  <label class="col-sm-3 control-label">Date of Offg. SI</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails33 = array('type' => 'text','name' => 'DateOFPromotionDetails33','id' => 'DateOFPromotionDetails33','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dateoffsi);
echo form_input($DateOFPromotionDetails33);
echo form_error('DateOFPromotionDetails33');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails33" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="exdateblock13">
                  <label class="col-sm-3 control-label">Date of List F</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails34 = array('type' => 'text','name' => 'DateOFPromotionDetails34','id' => 'DateOFPromotionDetails34','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dateoflistf);
echo form_input($DateOFPromotionDetails34);
echo form_error('DateOFPromotionDetails34');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails34" class="error"></label>
                  </div>
                </div>

   <div class="form-group"  id="exdateblock14">
                  <label class="col-sm-3 control-label">Date of List F-II</label>
                  <div class="col-sm-9">
                  <?php
$LowerSchoolCourseDate35 = array('type' => 'text','name' => 'LowerSchoolCourseDate35','id' => 'LowerSchoolCourseDate35','class' => 'form-control','placeholder' =>'Date of offg. INSP','value' => $body->dateoflistf2);
echo form_input($LowerSchoolCourseDate35);
echo form_error('LowerSchoolCourseDate35');
?>
                
                    <label for="PromotionDetailsinm" class="error"></label>
                  </div>
                </div> 


                <div class="form-group"  id="exdateblock15">
                  <label class="col-sm-3 control-label">Date of offg. INSP</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails35 = array('type' => 'text','name' => 'DateOFPromotionDetails35','id' => 'DateOFPromotionDetails35','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => $body->dateofinsp);
echo form_input($DateOFPromotionDetails35);
echo form_error('DateOFPromotionDetails35');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails35" class="error"></label>
                  </div>
                </div>
<div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>  
            <?php echo form_close(); ?>
          </div>
		  
		  
          <div id="six" class="tab-pane <?php if($page=='basic_training_course_detail'){echo 'active';} ?>">
		  <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
		  <input type="hidden" name="form_type" value="basic_training_course_detail">
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Training Institute</label>
                  <div class="col-sm-9">
                 <?php  
$TrainingInstituteti = array('' => '--Select--','Deferred Basic Training Sports Person' => 'Deferred Basic Training Sports Person', 'Deferred basic training Medical Rest' => 'Deferred basic training Medical Rest',  'RTC' => 'RTC','ISTC' => 'ISTC','CTC BHG' =>'CTC BHG', 'PPA Phillaur' =>'PPA Phillaur', 'PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur' ,'CTC BHG PTL' => 'CTC BHG PTL','ISTC KPT' => 'ISTC KPT','PPA PHR.' => 'PPA PHR.','RTC BHG PTL' => 'RTC BHG PTL', 'RTC L/SGR.' => 'RTC L/SGR.', 'RTC PAP JRC' => 'RTC PAP JRC','Other' => 'Other');
 echo form_dropdown('TrainingInstituteti', $TrainingInstituteti, set_value('TrainingInstituteti',$body->btic),'id="TrainingInstituteti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('TrainingInstituteti');
 ?>
                    <label for="TrainingInstituteti" class="error"></label>
                  </div>
                </div>                 
				<div class="form-group" id="Othertraining1" style="display:none;">
                  <label class="col-sm-3 control-label">Other Training Institute</label>
                  <div class="col-sm-9">

<?php
$OtherTrainingInstitute = array('type' => 'text','name' => 'Othertraining','id' => 'OthertrainingInstitute','class' => 'form-control','placeholder' =>'Enter Other Institure Name','value' => set_value('Othertraining',$body->Othertraining));
echo form_input($OtherTrainingInstitute);
echo form_error('Othertraining');
?>

                    <label for="Batchbn" class="error"></label>
                  </div>
                </div>
				
				
                <div class="form-group" id="Batchbn1">
                  <label class="col-sm-3 control-label">Batch Group</label>
                  <div class="col-sm-9">
<?php
$Batchbn = array('type' => 'text','name' => 'Batchbn','id' => 'Batchbn','class' => 'form-control','placeholder' =>'Batch Group','value' => set_value('Batchbn',$body->batchgroup));
echo form_input($Batchbn);
echo form_error('Batchbn');
?>
                    <label for="Batchbn" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="batchpassdate1">
                  <label class="col-sm-3 control-label">Batch Passing Years</label>
                  <div class="col-sm-9">
				  <?php
				  $years = array(''=>'--Select--');
						for ($i=1970; $i <2021 ; $i++) { 
							$years[$i] = $i;
						}
						echo form_dropdown('batchpassdate', $years, set_value('batchpassdate',$body->passoutyear),'id="TrainingInstituteti" class="select2" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
						echo form_error('batchpassdate');
				  
				  ?>
                    
                    
                  </div>
                </div>
				
      
		  <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>  
            <?php echo form_close(); ?>
          </div>
		  
		  
           <div id="seven" class="tab-pane <?php if($page=='professional_course_detail'){echo 'active';} ?>">
		  <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
		  <input type="hidden" name="form_type" value="professional_course_detail">
           <div class="input_fields_wrap">
           <?php $tma = array(); $tm = explode("@", $body->TrainingInstitutessti);
                  foreach ($tm as $key => $value){
                    $tma['tm'][] = $value;
                  }
                    ?>

                <?php $noca = array(); $noc = explode("@", $body->NamesofsCourses);
                  foreach ($noc as $key => $value){
                    $noca['noc'][] = $value;
                  }

                 $docsa = array(); $docs = explode("@", $body->DurationsofsCourses);
                   foreach ($docs as $key => $value){
                      $docsa['docsa'][] = $value;
                    }
                $durcoa = array(); $durco = explode("@", $body->DurationsofsCoursest);
                foreach ($durco as $key => $value){
                      $durcoa['durcoa'][] = $value;
                    }
					//echo validation_errors();
				
                    ?>
                    <?php for ($i=0; $i < count($tm) ; $i++) { ?>
                                    <div class="form-group">
                  <label class="col-sm-3 control-label">Training Institute</label>
                  <div class="col-sm-9">
                 <?php  
$TrainingInstitutessti = array('' => '--Select--',  'RTC' => 'RTC','ISTC' => 'ISTC','CTC BHG' =>'CTC BHG', 'PPA Phillaur' =>'PPA Phillaur', 'PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','PAP Computer Cell' => 'PAP Computer Cell','Other' => 'Other');
 echo form_dropdown('TrainingInstitutessti[]', $TrainingInstitutessti, set_value("TrainingInstitutessti[$i]",$tma['tm'][$i]),'id="TrainingInstitutessti"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
 echo form_error("TrainingInstitutessti[$i]");
 ?>
                    <label for="TrainingInstitutessti" class="error"></label>
                  </div>
                </div>

                 <div class="form-group TrainingInstitutesstiOther1" id="TrainingInstitutesstiOther1" style="display:none">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
<?php
$TrainingInstitutesstiOther = array('type' => 'text','name' => 'TrainingInstitutesstiOther[]','id' => 'TrainingInstitutesstiOther','class' => 'form-control','placeholder' =>'Other','value' => set_value("TrainingInstitutesstiOther[$i]",$body->TrainingInstitutesstiOther));
echo form_input($TrainingInstitutesstiOther);
echo form_error("TrainingInstitutesstiOther[$i]");
?>
                    <label for="TrainingInstitutesstiOther" class="error"></label>
                  </div>
                </div>


                
 <div class="form-group" id="NamesofsCourses1">
                  <label class="col-sm-3 control-label">Name of Course</label>
                  <div class="col-sm-9">
                  <?php
$NamesofsCourses = array('' => '--Select--','Basic Drill Course ' => 'Basic Drill Course','Computer  Awareness Refresher Coure' => 'Computer  Awareness Refresher Coure','Basic MT Course' => 'Basic MT Course','MTO Course' => 'MTO Course','Commando Course' => 'Commando Course','Bomb Dispossal Course' => 'Bomb Dispossal Course','Armourer Course' => 'Armourer Course','Tear Gas Course' => 'Tear Gas Course','D & M Refresher Course' => 'D & M Refresher Course','Disaster Management Course' => 'Disaster Management Course', 'VIP Security Induction Course' => 'VIP Security Induction Course','Pistol Handling Course' => 'Pistol Handling Course','Capsule Course for Highway Patrolling' => 'Capsule Course for Highway Patrolling','Course on Disaster Management' => 'Course on Disaster Management','Traffic Law Enforcement & Traffic Control' => 'Highway Patrolling Training','Security Refresher Course for PSOs & Escort Staff' => 'Security Refresher Course for PSOs & Escort Staff','Re-Orientation (Police Behavior)' => 'Re-Orientation (Police Behavior)','Review of Training & Training of Trainers Course' => 'Review of Training & Training of Trainers Course','Life Style & Stress Management' => 'Life Style & Stress Management','Crowd Control Refresher Training Course' => 'Crowd Control Refresher Training Course','Ref. Course in the Handling of Security Equipment & Gadges.' => 'Ref. Course in the Handling of Security Equipment & Gadges.','Driving & Maintenance Basic Course' => 'Driving & Maintenance Basic Course','Special Coy. Refresher Course' => 'Special Coy. Refresher Course','Crash Induction trg. for specialized operation duties course.' => 'Crash Induction trg. for specialized operation duties course.','Guard duty & Fighting course and Re-Orientation Course.' => 'Guard duty & Fighting course and Re-Orientation Course.','Specialized course reg. Maintenance of Kot & Their inspection' => 'Specialized course reg. Maintenance of Kot & Their inspection','Photography cum Single Digital Course' => 'Photography cum Single Digital Course','Finger Print Proficiency Course' => 'Finger Print Proficiency Course','Emerging Trends in white coller crime &their handling by police Course' => 'Emerging Trends in white coller crime &their handling by police Course','Specialized course on Traffic Management & Traffice Control Course' => 'Specialized course on Traffic Management & Traffice Control Course','Refresher Course for Drill Instructors Course' => 'Refresher Course for Drill Instructors Course','Course on Deparmental Enquiries Course' => 'Course on Deparmental Enquiries Course','Regional Seminer on Terrorism Course' => 'Regional Seminer on Terrorism Course','Police Lines Management for Course' => 'Police Lines Management for Course','Noice Pollution and Enviroment Protection Course' => 'Noice Pollution and Enviroment Protection Course','Office Procedure of Account Matters Course' => 'Office Procedure of Account Matters Course','Investigation of Domestic Violence Course' => 'Investigation of Domestic Violence Course','Latest Court Ruling and Judgments peraining Course' => 'Latest Court Ruling and Judgments peraining Course','Social Media Management for positive police Course' => 'Social Media Management for positive police Course','An In light into the legal &Procedural Provisions Course' => 'An In light into the legal &Procedural Provisions Course','Roll of Soft Skills in Public Dealing Course' => 'Roll of Soft Skills in Public Dealing Course','Emerging Sociology Trends and Impact on Contemporary Course' => 'Emerging Sociology Trends and Impact on Contemporary Course','Capsule Course on Gender Sensitization for SPs/DSP' => 'Capsule Course on Gender Sensitization for SPs/DSP','Course on Healthy Living & Postive Thinking for Gos' => 'Course on Healthy Living & Postive Thinking for Gos','Course on Leadership and Communication Skills for SSPs/DSPs' => 'Course on Leadership and Communication Skills for SSPs/DSPs','Workshp on Police Media Interface for DSPs/Inspr.' => 'Workshp on Police Media Interface for DSPs/Inspr.','HC/PR Promoted after completeion of 16 years HC as Constable' => 'HC/PR Promoted after completeion of 16 years HC as Constable','Re-Orientation & Detective Foot Consts. Course for CTs on list C-2' => 'Re-Orientation & Detective Foot Consts. Course for CTs on list C-2','Elementry Traffic Course for Constables' => 'Elementry Traffic Course for Constables','Specialised Course for Moter Mechanics' => 'Specialised Course for Moter Mechanics','Refresher Course on operational preparedness Course' => 'Refresher Course on operational preparedness Course','PSO & Gunman Course (State level)' => 'PSO & Gunman Course (State level)','Camp security condensed Course' => 'Camp security condensed Course','Handling  & defusing of explosive and Bomp Disposal Course' => 'Handling  & defusing of explosive and Bomp Disposal Course','Ref.Course for NGOs & ORs' => 'Ref.Course for NGOs & ORs','Specialised Course reg. maintenance of Misc.' => 'Specialised Course reg. maintenance of Misc.','Specialised Course reg. maintenance of CDO Branch &its inspection Course' => 'Specialised Course reg. maintenance of CDO Branch &its inspection Course','Specialised Course reg.maintenance of OASI Branch & its inspection Course' => 'Specialised Course reg.maintenance of OASI Branch & its inspection Course','Capsule Course for telephone operators Course' => 'Capsule Course for telephone operators Course','Police Behavioural Course' => 'Police Behavioural Course', 'Short term Section Platoon commander Course' => 'Short term Section Platoon commander Course','Weapon & Tactics Course' => 'Weapon & Tactics Course','Camp Security Course' => 'Camp Security Course','Finger Print Course' => 'Finger Print Course','Gunman Course' => 'Gunman Course','Fire Fighting Course' => 'Fire Fighting Course','Refresher Course' => 'Refresher Course','Anti Roit Control Course' => 'Anti Roit Control Course','Photography-Cum-single digit course' => 'Photography-Cum-single digit course','Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs' => 'Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs','Fleet Management course for NGO' => 'Fleet Management course for NGO','PSO Gunman Refresher Course' => 'PSO Gunman Refresher Course','Bugler Course' => 'Bugler Course','Rotational Course' => 'Rotational Course','National Disaster Response Force (NDRF)' => 'National Disaster Response Force (NDRF)','Anti Sabotage Course' => 'Anti Sabotage Course','Unmanned Aircraft Vehicle (UAV)' => 'Unmanned Aircraft Vehicle (UAV)','Weapon Instructor Training Course' => 'Weapon Instructor Training Course','Platoon Saction Commander Course' => 'Platoon Saction Commander Course','Basic MFR/CSSR Course' => 'Basic MFR/CSSR Course','Company Refresher Course' => 'Company Refresher Course','Feild Craft Course' => 'Feild Craft Course','Pre-Induction Course' => 'Pre-Induction Course','Maintenance of Roznamcha Course' => 'Maintenance of Roznamcha Course');
 echo form_dropdown('NamesofsCourses[]', $NamesofsCourses, set_value("NamesofsCourses[$i]",$noca['noc'][$i]),'id="NamesofsCourses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error("NamesofsCourses[$i]");
//print_r($noca['noc']);
?>

                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>



                           <div class="form-group" id="DurationsofsCourses1">
                  <label class="col-sm-3 control-label">Duration of Course start date</label>
                  <div class="col-sm-9">
<?php
$DurationsofsCourses = array('type' => 'text','name' => 'DurationsofsCourses[]','id' => 'tags2','class' => 'form-control','placeholder' =>'From','value' => set_value("DurationsofsCourses[$i]",$docsa['docsa'][$i]));
echo form_input($DurationsofsCourses);
echo form_error("DurationsofsCourses[$i]");
?>
                    <label for="DurationsofsCourses" class="error"></label>
            
                  </div>
                </div>

          

                <div class="form-group" >
                 <label class="col-sm-3 control-label">Duration of Course End date</label>
                   <div class="col-xs-9">
<?php
$DurationsofsCoursest = array('type' => 'text','name' => 'DurationsofsCoursest[]','id' => 'tags3','class' => 'form-control','placeholder' =>'To','value' => set_value("DurationsofsCoursest[$i]",$durcoa['durcoa'][$i]))	;
echo form_input($DurationsofsCoursest);
echo form_error("DurationsofsCoursest[$i]");
?>
                    <label for="DurationsofsCoursest" class="error"></label>
                    </div>
                    </div><hr/>

                  <?php  }  ?>
      

               
                

                

 
          

                    

                    <a href="#" class="add_field_button"> <i class="fa fa-plus"></i> Add More</a>
                </div>
				 <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>  
            <?php echo form_close(); ?>
          </div>
        

 


          <div id="eight" class="tab-pane <?php if($page=='annual_firing_practice'){echo 'active';} ?>">
		  <?php echo form_open_multipart("bt-updates-manpower/".$user_id, $attributes); ?>
		  <input type="hidden" name="form_type" value="annual_firing_practice">
             <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Range</label>
                  <div class="col-sm-9">
<?php
$NameofsRanges = array('type' => 'text','name' => 'NameofsRanges','id' => 'NameofsRanges','class' => 'form-control','placeholder' =>'Name of Range','value' => set_value('NameofsRanges',$body->NameofsRanges));
echo form_input($NameofsRanges);
echo form_error('NameofsRanges');
?>
                    <label for="NameofsRanges" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Date of Practice</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$dateofprcatice = array('type' => 'text','name' => 'dateofprcatice','id' => 'dateofprcatice','class' => 'form-control','placeholder' =>'Date of Practice','value' =>set_value('dateofprcatice', $body->dateofprcatice));
echo form_input($dateofprcatice);
echo form_error('dateofprcatice');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="dateofprcatice" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Firing Weapon</label>
                  <div class="col-sm-9">
         <?php 
                 $tow = array();
                  $tow[''] = '--Select--'; 
                 foreach ($weapon as $value) {
                  if($value->arm == 'Sniper7.62 MM'){
                   
                  }else{
                    $tow[$value->arm] = $value->arm;
                  }
                 }
/*newarea Textfield*/
 echo form_dropdown('tow', $tow, set_value('tow',$body->tow),'id="tow" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('tow');
/*----End newarea Textfield----*/
 ?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>
  <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
                  </div>
                </div>  
            <?php echo form_close(); ?>
          </div>

           <div id="nine" class="tab-pane"> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Latest Annual Medical Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$LatestAnnualMedicalDate = array('type' => 'text','name' => 'LatestAnnualMedicalDate','id' => 'LatestAnnualMedicalDate','class' => 'form-control','placeholder' =>'Latest Annual Medical Date','value' => $body->LatestAnnualMedicalDate);
echo form_input($LatestAnnualMedicalDate);
echo form_error('LatestAnnualMedicalDate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="LatestAnnualMedicalDate" class="error"></label>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Present Health Status</label>
                  <div class="col-sm-9">
                 <?php  
$PresentHealthStatus = array('' => '--Select--', 'Fit' => 'Fit', 'Light Duty' => 'Light Duty', 'Chronic Disease' => 'Chronic Disease','Handicapped' => 'Handicapped','Hospitalized' =>'Hospitalized','Medical Rest' => 'Medical Rest','Misc' =>'Misc');
 echo form_dropdown('PresentHealthStatus', $PresentHealthStatus, set_value('PresentHealthStatus',$body->PresentHealthStatus),'id="PresentHealthStatus" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('PresentHealthStatus');
 ?>
                    <label for="PresentHealthStatus" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="ChronicDiseaseDetails1" style="display:none;">
                  <label class="col-sm-3 control-label">Chronic Disease Details</label>
                  <div class="col-sm-9">
<?php
$ChronicDiseaseDetails = array('type' => 'text','name' => 'ChronicDiseaseDetails','id' => 'ChronicDiseaseDetails','class' => 'form-control','placeholder' =>'Details','value' => $body->ChronicDiseaseDetails);
echo form_input($ChronicDiseaseDetails);
echo form_error('ChronicDiseaseDetails');
?>
                    <label for="ChronicDiseaseDetails" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="MiscDetails1" style="display:none;">
                  <label class="col-sm-3 control-label">Misc</label>
                  <div class="col-sm-9">
<?php
$MiscDetails = array('type' => 'text','name' => 'MiscDetails','id' => 'MiscDetails','class' => 'form-control','placeholder' =>'Details','value' => $body->MiscDetails);
echo form_input($MiscDetails);
echo form_error('MiscDetails');
?>
                    <label for="MiscDetails" class="error"></label>
                  </div>
                </div>

           </div>

         
           <div id="ten" class="tab-pane">
             <div class="form-group">
                  <label class="col-sm-3 control-label">Select Postion </label>
                  <div class="col-sm-9">
                  <?php  
$orderby = array('' => '--Select--','1' => 'Commandant','2' => 'AIG', '3' =>'Asst. Commandant', '4' => 'SP',  '5' => 'SP/CR', '6' =>'DSP', '7' => 'DSP/CR', '8' => 'INSP', '9' => 'INSP/LR', '10' => 'INSP/CR', '11' => 'SI', '12' => 'ASI','13' => 'HC', '14' => 'CT', '15' => 'Supdt Grade-I', '16' => 'Supdt Grade-II', '17' => 'Senior Asstt.', '18' => 'Junior Asstt', '19' => 'Clerk', '20' => 'Steno', '21' => 'Peon', '22' => 'Daftari', '23' => 'Doctor' ,'24' => 'Pharmacist', '25' => 'Physiotherapist' ,'26' => 'Lab Technician', '27' => 'Nursing Asstt.' ,'28' => 'Cook', '29' => 'Water Carrier' ,'30' => 'Sweeper', '31' => 'Dhobi' ,'32' => 'Mochi' ,'33' => 'Barber'  ,'34' => 'Tailor' ,'35' => 'Carpenter' ,'36' => 'Mason'  ,'37' => 'Mali');
 echo form_dropdown('orderby', $orderby, set_value('orderby',$body->ono),'id="orderby" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
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
$DERABEAS = array('' => '--Select--', 'DERA BEAS SECURITY DUTY ' => 'DERA BEAS SECURITY DUTY ');
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
$OTHERSTSTIC = array('' => '--Select--', 'OTHER STSTIC GUARDS ' => 'OTHER STSTIC GUARDS');
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
$PSOSGUNMAN  = array('' => '--Select--','Police Officer' => 'Police Officer', 'Retired Police Officer' => 'Retired Police Officer', 'Political Persons' => 'Political Persons','Civil Officers' => 'Civil Officers','Judicial Officers' => 'Judicial Officers','Threatening persons' => 'Threatening persons');
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
$ATTACHEDWITHDISTTPOLICEKINFEMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE ((MARTYR’S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE ((MARTYR’S KIN FEMALE)');
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
$ATTACHEDWITHDISTTPOLICEOTHERKINMALE = array('' => '--Select--', 'ATTACHED WITH DISTT. POLICE (OTHERS MALE) ' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)');
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
$STATEHUMANRIGHTSCOMMISSION = array('' => '--Select--', 'STATE HUMAN RIGHTS COMMISSION ' => 'STATE HUMAN RIGHTS COMMISSION ');
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
$OFFICESTAFFINBNOFFICE = array('' => '--Select--', 'Commandant office' => 'Commandant office', 'Asstt. Comdt. office' => 'Asstt. Comdt. office', 'Dy.S.P. office' => 'Dy.S.P. office', 'English Branch' => 'English Branch','Account Branch' => 'Account Branch' , 'OSI Branch' => 'OSI Branch', 'Litigation Branch' => 'Litigation Branch', 'Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer Cell' => 'Computer Cell');
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
$BNHQRSOTHERGUARD = array('' => '--Select--', 'BN. HQRS.  OTHER GUARD' => 'BN. HQRS.  OTHER GUARD');
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
$TRADESMEN = array('' => '--Select--', 'TRADESMEN' => 'TRADESMEN');
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
$QUARTERMASTERBRANCHLINESTAFF = array('' => '--Select--', 'QUARTERMASTER BRANCH (LINE STAFF)
' => 'QUARTERMASTER BRANCH (LINE STAFF)
');
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
$GENERALDUTYBNHQRS = array('' => '--Select--', 'GENERAL DUTY BN.HQRS
' => 'GENERAL DUTY BN.HQRS
');
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
$TRGRESERVEATBNHQRS = array('' => '--Select--', 'TRG. RESERVE AT BN.HQRS.
' => 'TRG. RESERVE AT BN.HQRS.
');
 echo form_dropdown('awbone11', $TRGRESERVEATBNHQRS, set_value('awbone11',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone11');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

             <!--     <div class="form-group" id="awbone13" style="display: none;">
                  <label class="col-sm-3 control-label">TRG. RESERVE AT BN.HQRS.
</label>
                  <div class="col-sm-9">
                 <?php  
/*$vpgurds = array('' => '--Select--', 'TRG. RESERVE AT BN.HQRS.
' => 'TRG. RESERVE AT BN.HQRS.
');
 echo form_dropdown('awbone13', $vpgurds, set_value('awbone13',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('awbone13');*/
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div> -->

                <div class="form-group"  id="awbone14" style="display: none;">
                  <label class="col-sm-3 control-label">RECRUITMENT DUTY
</label>
                  <div class="col-sm-9">
                 <?php  
$RECRUITMENTDUTY = array('' => '--Select--', 'RECRUITMENT DUTY
' => 'RECRUITMENT DUTY
');
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
$RECRUIT = array('' => '--Select--', 'RECRUIT
' => 'RECRUIT
');
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
$LEAVE = array('' => '--Select--', 'LEAVE 
' => 'LEAVE
');
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
$ABSENT = array('' => '--Select--', 'ABSENT 
' => 'ABSENT
');
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
$UNDERSUSPENSION  = array('' => '--Select--', 'UNDER SUSPENSION 
' => 'UNDER SUSPENSION
');
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
array('' => '--Select--', 'Handicapped on Medical Rest' => 'Handicapped on Medical Rest
');
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
$ChronicDiseaseonMedicalRest = array('' => '--Select--', 'Chronic Disease on Medical Rest' => 'Chronic Disease on Medical Rest
');
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
$OSDETC = array('' => '--Select--', 'OSD ETC' => 'OSD ETC
');
 echo form_dropdown('bmdone8', $OSDETC, set_value('bmdone8',''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
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
$IRBInstitutions = array('' => '--Select--', 'IRB Institutions' => 'IRB Institutions
');
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
$CDOInstitutions = array('' => '--Select--', 'CDO Institutions' => 'CDO Institutions
');
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
$PAPOuterBnInstitutions = array('' => '--Select--', 'PAP Outer Bn Institutions' => 'PAP Outer Bn Institutions
');
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
$Institutionsti = array('' => '--Select--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE', 'Others' => 'Others' );
 echo form_dropdown('instone4', $Institutionsti, set_value('instone4',''),'id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('irb5');
 ?>
                    <label for="Institutionsti" class="error"></label>
                  </div>
                </div>


  <div class="form-group"   id="instone6" style="display: none;">
                  <label class="col-sm-3 control-label">Total of Institutions
</label>
                  <div class="col-sm-9">
                 <?php
$lsd = array('type' => 'text','name' => 'instone5','id' => 'ons','class' => 'form-control','placeholder' =>'Total of Institutions','value' => set_value('instone5'));
echo form_input($lsd);
echo form_error('lsd');
?>

                    <label for="Postingtiset" class="error"></label>
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

       
       <!--     <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Posting </label>
                  <div class="col-sm-9">
                 <?php  
/*$Postingtiset = array('' => '--Select--', 'Admin Duty' => 'Admin Duty', 'Bn. Hqr. Admin Duty' => 'Bn. Hqr. Admin Duty', 'Other duties' => 'Other duties');
 echo form_dropdown('Postingtiset', $Postingtiset, set_value('Postingtiset',1),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');*/
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div> -->
          
                 <div class="form-group" id="AdminDutyti1" style="display:none">
                  <label class="col-sm-3 control-label">Admin Duty</label>
                  <div class="col-sm-9"> 
 <?php  
$AdminDutyti = array('' => '--Select--',  'Armed HQ Admin duty' => 'Armed HQ Admin duty', 'CPO officers admin duty' => 'CPO officers admin duty','CPO offices admin duty' => 'CPO offices admin duty','Other bn office admin duty' => 'Other bn office admin duty','Other' => 'Other');
 echo form_dropdown('AdminDutyti', $AdminDutyti, set_value('AdminDutyti',1),'id="AdminDutyti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('AdminDutyti');
 ?>
                    <label for="AdminDutyti" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="AdminDutytiOther" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
<?php
$AdminDutytiOther = array('type' => 'text','name' => 'AdminDutytiOther','id' => 'AdminDutytiOther','class' => 'form-control','placeholder' =>'Details','value' => set_value('AdminDutytiOther'));
echo form_input($AdminDutytiOther);
echo form_error('AdminDutytiOther');
?>
                    <label for="AdminDutytiOther" class="error"></label>
                  </div>
                </div>

                    <div class="form-group" id="BnHqrAdminDuty1"  style="display:none"> 
                  <label class="col-sm-3 control-label">Bn. Hqr. Admin Duty</label>
                  <div class="col-sm-9"> 
 <?php  
$BnHqrAdminDuty = array('' => '--Select--',  'Commandant office' => 'Commandant office', 'Asstt. Comdt. office' => 'Asstt. Comdt. office','DSP Office' => 'DSP Office','English Branch' => 'English Branch','Account Branch' => 'Account Branch','OSI Branch' => 'OSI Branch','Litigation Branch' => 'Litigation Branch','Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer Cell' => 'Computer Cell');
 echo form_dropdown('BnHqrAdminDuty', $BnHqrAdminDuty, set_value('BnHqrAdminDuty',1),'id="BnHqrAdminDuty" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('BnHqrAdminDuty');
 ?>
                    <label for="BnHqrAdminDuty" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="Commandantoffice1"  style="display:none">
                  <label class="col-sm-3 control-label">Commandant office</label>
                  <div class="col-sm-9">
 <?php  
$Commandantoffice = array('' => '--Select--', 'Reader' => 'Reader', 'Orderly' => 'Orderly','Telephone operator' => 'Telephone operator','Dak Runner' => 'Dak Runner');
 echo form_dropdown('Commandantoffice', $Commandantoffice, set_value('Commandantoffice',1),'id="Commandantoffice" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Commandantoffice');
 ?>
                    <label for="Commandantoffice" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="AsstCommandantOffice1"  style="display:none">
                  <label class="col-sm-3 control-label">Asstt. Comdt. office</label>
                  <div class="col-sm-9">
 <?php  
$AsstCommandantOffice = array('' => '--Select--', 'Reader' => 'Reader', 'Office orderly' => 'Office orderly');
 echo form_dropdown('AsstCommandantOffice', $AsstCommandantOffice, set_value('AsstCommandantOffice',1),'id="AsstCommandantOffice" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('AsstCommandantOffice');
 ?>
                    <label for="AsstCommandantOffice" class="error"></label>
                  </div>
                </div>


                <div class="form-group" id="DSPOffice1"  style="display:none">
                  <label class="col-sm-3 control-label">DSP Office</label>
                  <div class="col-sm-9">
 <?php  
$DSPOffice = array('' => '--Select--', 'Reader' => 'Reader', 'Office orderly' => 'Office orderly');
 echo form_dropdown('DSPOffice', $DSPOffice, set_value('DSPOffice',1),'id="DSPOffice" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('DSPOffice');
 ?>
                    <label for="DSPOffice" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="EnglishBranch1"  style="display:none">
                  <label class="col-sm-3 control-label">English Branch</label>
                  <div class="col-sm-9">
 <?php  
$EnglishBranch = array('' => '--Select--', 'Head Clerk' => 'Head Clerk', 'CRC' => 'CRC', 'Asst. CRC' => 'Asst. CRC','AC-I' => 'AC-I', 'Asst.AC-I' => 'Asst.AC-I','AC-II' => 'AC-II','Asst.AC-II' => 'Asst.AC-II','Diarist' => 'Diarist','Dispatcher' => 'Dispatcher','Dak Runner' => 'Dak Runner','Record Keeper' => 'Record Keeper','Asst. Record Keeper' =>'Asst. Record Keeper','Nodal Officer' => 'Nodal Officer','Photostat M/C Operator' => 'Photostat M/C Operator','Computer Operator' =>'Computer Operator');
 echo form_dropdown('EnglishBranch', $EnglishBranch, set_value('EnglishBranch',1),'id="EnglishBranch" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('EnglishBranch');
 ?>
                    <label for="EnglishBranch" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="AccountBranch1"  style="display:none">
                  <label class="col-sm-3 control-label">Account Branch</label>
                  <div class="col-sm-9">
 <?php  
$AccountBranch = array('' => '--Select--', 'Accountant' => 'Accountant', 'I/C Upper Seat' => 'I/C Upper Seat', 'I/C Lower Seat' => 'I/C Lower Seat','Asst. Lower Seat' => 'Asst. Lower Seat', 'I/C Contingency' => 'I/C Contingency','GIS' => 'GIS','Medical, TA,CWF etc.' => 'Medical, TA,CWF etc.','Treasury Duty' => 'Treasury Duty');
 echo form_dropdown('AccountBranch', $AccountBranch, set_value('AccountBranch',1),'id="AccountBranch" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('AccountBranch');
 ?>
                    <label for="AccountBranch" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="OSIBranch1"  style="display:none">
                  <label class="col-sm-3 control-label">OSI Branch</label>
                  <div class="col-sm-9">
 <?php  
$OSIBranch = array('' => '--Select--', 'OSI' => 'OSI', 'I/C PLI Cases' => 'I/C PLI Cases', 'I/C Correspondence' => 'I/C Correspondence','Fauji Missal Clerk' => 'Fauji Missal Clerk', 'I/C Deployment' => 'I/C Deployment');
 echo form_dropdown('OSIBranch', $OSIBranch, set_value('OSIBranch',1),'id="OSIBranch" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('OSIBranch');
 ?>
                    <label for="OSIBranch" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="LitigationBranch1"  style="display:none">
                  <label class="col-sm-3 control-label">Litigation Branch</label>
                  <div class="col-sm-9">
 <?php  
$LitigationBranch = array('' => '--Select--', 'I/C Litigation' => 'I/C Litigation', 'Asst. Litigation' => 'Asst. Litigation');
 echo form_dropdown('LitigationBranch', $LitigationBranch, set_value('LitigationBranch',1),'id="LitigationBranch" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('LitigationBranch');
 ?>
                    <label for="LitigationBranch" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="StenoBranch1"  style="display:none">
                  <label class="col-sm-3 control-label">Steno Branch</label>
                  <div class="col-sm-9">
 <?php  
$StenoBranch = array('' => '--Select--', 'Steno' => 'Steno', 'Astt. Steno' => 'Astt. Steno');
 echo form_dropdown('StenoBranch', $StenoBranch, set_value('StenoBranch',1),'id="StenoBranch" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('StenoBranch');
 ?>
                    <label for="StenoBranch" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"   id="GPFBranch1"  style="display:none">
                  <label class="col-sm-3 control-label">GPF Branch</label>
                  <div class="col-sm-9">
 <?php  
$GPFBranch = array('' => '--Select--', 'I/C GPF Branch' => 'I/C GPF Branch', 'Asstt. GPF Branch' => 'Asstt. GPF Branch');
 echo form_dropdown('GPFBranch', $GPFBranch, set_value('GPFBranch',1),'id="GPFBranch" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('GPFBranch');
 ?>
                    <label for="GPFBranch" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="ComputerCell1"  style="display:none">
                  <label class="col-sm-3 control-label">Computer Cell</label>
                  <div class="col-sm-9">
 <?php  
$ComputerCell = array('' => '--Select--', 'I/C Computer Cell' => 'I/C Computer Cell', 'Asstt. Computer Cell' => 'Asstt. Computer Cell');
 echo form_dropdown('ComputerCell', $ComputerCell, set_value('ComputerCell',1),'id="ComputerCell" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ComputerCell');
 ?>
                    <label for="ComputerCell" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="MudDuties1"  style="display:none">
                  <label class="col-sm-3 control-label">Mud Duties</label>
                  <div class="col-sm-9">
 <?php  
$MudDuties = array('' => '--Select--', 'Reserve Inspector' => 'Reserve Inspector', 'Line Officer' => 'Line Officer', 'BHM' => 'BHM','A-BHM'=> 'A-BHM','A/BHM'=> 'A/BHM', 'MHC' => 'MHC', 'A/MHC' => 'A/MHC',  'Orderly to RI' => 'Orderly to RI','CDI' => 'CDI','CDO' => 'CDO','A/CDO' => 'A/CDO', 'Quarter Master INSP' => 'Quarter Master INSP','KHC' => 'KHC','A/KHC' => 'A/KHC','MSK' => 'MSK','A/MSK' => 'A/MSK',  'Armourer ' => 'Armourer','A/Armourer' => 'A/Armourer', 'I/C Class-IV' => 'I/C Class-IV','Quarter Munshi  Asstt.' => 'Quarter Munshi Asstt.','Quarter Munshi' => 'Quarter Munshi','I/C Mess' => 'I/C Mess','I/C Mess Asstt.' => 'I/C Mess Asstt.','I/C Canteen' => 'I/C Canteen','Grossary Shop' => 'Grossary Shop', 'Incharge' => 'Incharge', 'Incharge Asstt'=> 'Incharge Asstt');
 echo form_dropdown('MudDuties', $MudDuties, set_value('MudDuties',1),'id="MudDuties" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('MudDuties');
 ?>
                    <label for="MudDuties" class="error"></label>
                  </div>
                </div>

                   <div class="form-group"  id="GeneralStaff1"  style="display:none">
                  <label class="col-sm-3 control-label">General Staff</label>
                  <div class="col-sm-9">
 <?php  
$GeneralStaff = array('' => '--Select--', 'On-Duty' => 'On-Duty', 'Misc' => 'Misc');
 echo form_dropdown('GeneralStaff', $GeneralStaff, set_value('GeneralStaff',1),'id="GeneralStaff" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('GeneralStaff');
 ?>
                    <label for="GeneralStaff" class="error"></label>
                  </div>
                </div>


                 <div class="form-group"  id="genralOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
<?php
$genralOther = array('type' => 'text','name' => 'genralOther','id' => 'genralOther','class' => 'form-control','placeholder' =>'Other','value' => set_value('genralOther'));
echo form_input($genralOther);
echo form_error('genralOther');
?>
                    <label for="genralOther" class="error"></label>
                  </div>
                </div>


                   <div class="form-group"   id="MTSectionf1"  style="display:none">
                  <label class="col-sm-3 control-label">MT Section</label>
                  <div class="col-sm-9">
 <?php  
$MTSectionf = array('' => '--Select--', 'MTO' => 'MTO', 'Asstt. MTO-cum- Garage HC' => 'Asstt. MTO-cum- Garage HC','MHC-cum- I/C MT Store' => 'MHC-cum- I/C MT Store','AMHC-cum- Asstt. MT Store' => 'AMHC-cum- Asstt. MT Store','I/C Patrol Pump &amp; Asstt.' =>'I/C Patrol Pump &amp; Asstt.','Mechanics' => 'Mechanics','Drivers' => 'Drivers','Any Other' => 'Any Other');
 echo form_dropdown('MTSectionf', $MTSectionf, set_value('MTSectionf',1),'id="MTSectionf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('MTSectionf');
 ?>
                    <label for="MTSectionf" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="MTSectionfothers1" style="display:none">
                  <label class="col-sm-3 control-label">MT Section others</label>
                  <div class="col-sm-9">
<?php
$MTSectionfothers = array('type' => 'text','name' => 'MTSectionfothers','id' => 'MTSectionfothers','class' => 'form-control','placeholder' =>'MT Sectionf others','value' => set_value('MTSectionfothers'));
echo form_input($MTSectionfothers);
echo form_error('MTSectionfothers');
?>
                    <label for="MTSectionfothers" class="error"></label>
                  </div>
                </div>


                   <div class="form-group" id="Institutionsti1"  style="display:none">
                  <label class="col-sm-3 control-label">Institutions Duty</label>
                  <div class="col-sm-9">
 <?php  
$Institutionsti = array('' => '--Select--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE', 'Others' => 'Others' );
 echo form_dropdown('Institutionsti', $Institutionsti, set_value('Institutionsti',1),'id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Institutionsti');
 ?>
                    <label for="Institutionsti" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Institutionstiother1"  style="display:none">
                 <label class="col-sm-3 control-label">Institutions duty others</label>
                  <div class="col-sm-9">
<?php
$Institutionstiother = array('type' => 'text','name' => 'Institutionstiother','id' => 'Institutionstiother','class' => 'form-control','placeholder' =>'Institutions duty others','value' => set_value('Institutionstiother'));
echo form_input($Institutionstiother);
echo form_error('Institutionstiother');
?>
                    <label for="MTSectionfothers" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="GuardDutiesti1"  style="display:none">
                  <label class="col-sm-3 control-label">Guard Duties</label>
                  <div class="col-sm-9">
 <?php  
$GuardDutiesti = array('' => '--Select--', 'VP Guard Duties' => 'VP Guard Duties', 'Political Persons Guard Duty' => 'Political Persons Guard Duty','Threatening Persons/Places Guard Duty' => 'Threatening Persons/Places Guard Duty','Police Officers Guard Duty' => 'Police Officers Guard Duty','Civil Officer&#39;s Guard Duties' =>'Civil Officer&#39;s Guard Duties','Judicial Officer&#39;s Guard Duties.' => 'Judicial Officer&#39;s Guard Duties.');
 echo form_dropdown('GuardDutiesti', $GuardDutiesti, set_value('GuardDutiesti',1),'id="GuardDutiesti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('GuardDutiesti');
 ?>
                    <label for="GuardDutiesti" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="GunmenDutiesti1"  style="display:none">
                  <label class="col-sm-3 control-label">Gunman Duties</label>
                  <div class="col-sm-9"> 
 <?php  
$GunmenDutiesti = array('' => '--Select--', 'Bn officers Gunman duty' => 'Bn officers Gunman duty', 'Armed Bn Officers Gunman duty' => 'Armed Bn Officers Gunman duty','Other Officer Gunman duty' => 'Other Officer Gunman duty','Police Officers Gunman Duty' => 'Police Officers Gunman Duty','Civil Officer&#39;s Gunman Duty' =>'Civil Officer&#39;s Gunman Duty','Judicial officers Gunman Duty' => 'Judicial officers Gunman Duty','Threatened persons Gunman Duty' => 'Threatened persons Gunman Duty','Retired officer Gunman Duty' => 'Retired officer Gunman Duty');
 echo form_dropdown('GunmenDutiesti', $GunmenDutiesti, set_value('GunmenDutiesti',1),'id="GunmenDutiesti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('GunmenDutiesti');
 ?>
                    <label for="GunmenDutiesti" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="Companydutiesti1"  style="display:none">
                  <label class="col-sm-3 control-label">Company Duties</label>
                  <div class="col-sm-9">
 <?php  
$Companydutiesti = array('' => '--Select--', 'A' => 'A', 'B' => 'B','C' => 'C','D' => 'D','E' =>'E','F' => 'F');
 echo form_dropdown('Companydutiesti', $Companydutiesti, set_value('Companydutiesti',1),'id="Companydutiesti" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Companydutiesti');
 ?>
                    <label for="Companydutiesti" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="LawOrderDuty1"  style="display:none">
                  <label class="col-sm-3 control-label">Law &amp; Order Duty</label>
                  <div class="col-sm-9">
 <?php  
$LawOrderDuty = array('' => '--Select--', 'Permanent Duty' => 'Permanent Duty', 'Temporary Duty' => 'Temporary Duty');
 echo form_dropdown('LawOrderDuty', $LawOrderDuty, set_value('LawOrderDuty',1),'id="LawOrderDuty" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('LawOrderDuty');
 ?>
                    <label for="LawOrderDuty" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="SpecialTeamDuty1"  style="display:none">
                  <label class="col-sm-3 control-label">Special Team Duty</label>
                  <div class="col-sm-9">
 <?php  
$SpecialTeamDuty = array('' => '--Select--', 'Anti Riot Police (ARP)' => 'Anti Riot Police (ARP)', 'Special Striking Group (SSG)' => 'Special Striking Group (SSG)','State Disaster Response Force (SDRF)' => 'State Disaster Response Force (SDRF)');
 echo form_dropdown('SpecialTeamDuty', $SpecialTeamDuty, set_value('SpecialTeamDuty',1),'id="SpecialTeamDuty" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('SpecialTeamDuty');
 ?>
                    <label for="SpecialTeamDuty" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="SportsAttachments1"  style="display:none">
                  <label class="col-sm-3 control-label">Sports Attachments</label>
                  <div class="col-sm-9">
 <?php  
$SportsAttachments = array('' => '--Select--', 'DSO' => 'DSO', 'CSO' => 'CSO', 'NIS Patiala' => 'NIS Patiala','Others' => 'Others');
 echo form_dropdown('SportsAttachments', $SportsAttachments, set_value('SportsAttachments',1),'id="SportsAttachments" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('SportsAttachments');
 ?>
                    <label for="SportsAttachments" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="SportsAttachmentsOthers1" style="display:none">
                  <label class="col-sm-3 control-label">Sports Attachments others</label>
                  <div class="col-sm-9">
<?php
$SportsAttachmentsOthers = array('type' => 'text','name' => 'SportsAttachmentsOthers','id' => 'SportsAttachmentsOthers','class' => 'form-control','placeholder' =>'Sports Attachments others','value' => set_value('SportsAttachmentsOthers'));
echo form_input($SportsAttachmentsOthers);
echo form_error('SportsAttachmentsOthers');
?>
                    <label for="SportsAttachmentsOthers" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="OtherAttachmentDuties1"  style="display:none">
                  <label class="col-sm-3 control-label">Other Attachment Duties</label>
                  <div class="col-sm-9">
 <?php  
$OtherAttachmentDuties = array('' => '--Select--', 'District' => 'District', 'Police security wing under 13th Bn' => 'Police security wing under 13th Bn','CPO Punjab chg under 13th Bn' => 'CPO Punjab chg under 13th Bn','CPL reserve under 13th Bn' => 'CPL reserve under 13th Bn','VIP security under 82th Bn' => 'VIP security under 82th Bn','Special Protection Unit ( CM Security)' => 'Special Protection Unit ( CM Security)','Intelligence wing' =>'Intelligence wing','Vigilance wing' => 'Vigilance wing','NRI Wing' => 'NRI Wing','Bureau of Investigation' =>'Bureau of Investigation','State Narcotic Bureau' => 'State Narcotic Bureau','Airport Immigration' => 'Airport Immigration','Passport Office' => 'Passport Office','State Crime Record Bureau' => 'State Crime Record Bureau','National Crime Record Bureau' => 'National Crime Record Bureau', 'Counter Intelligence' => 'Counter Intelligence','State Human Rights Commission' => 'State Human Rights Commission','RTC' => 'RTC','ISTC' => 'ISTC','CTC BHG' => 'CTC BHG','PPA Phillaur' => 'PPA Phillaur','PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','Other Armed Battalion' => 'Other Armed Battalion','Other' => 'Other');
 echo form_dropdown('OtherAttachmentDuties', $OtherAttachmentDuties, set_value('OtherAttachmentDuties',1),'id="OtherAttachmentDuties" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('OtherAttachmentDuties');
 ?>
                    <label for="OtherAttachmentDuties" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="AttachmentDutiesothers11" style="display:none">
                  <label class="col-sm-3 control-label">Attachment Duties others</label>
                  <div class="col-sm-9">
<?php
$AttachmentDutiesothers = array('type' => 'text','name' => 'AttachmentDutiesothers','id' => 'AttachmentDutiesothers','class' => 'form-control','placeholder' =>'Attachment Duties others','value' => set_value('AttachmentDutiesothers'));
echo form_input($AttachmentDutiesothers);
echo form_error('AttachmentDutiesothers');
?>
                    <label for="AttachmentDutiesothers" class="error"></label>
                  </div>
                </div>

           </div>
        </div>
              </div><!-- panel-body -->
              
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
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">   

jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
    // Tags Input

  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),jQuery('#indictiondate').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#batchpassdate').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#dateofprcatice').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#DateofCommencingdoc').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#DurationsofsCourses').datepicker({dateFormat: "dd/mm/yy"});  jQuery('#DurationsofsCoursest').datepicker({dateFormat: "dd/mm/yy"});  jQuery('#LatestAnnualMedicalDate').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#DateOFPromotionDetails').datepicker({dateFormat: "dd/mm/yy"}); 
  jQuery('#dateofesnlistment1').datepicker({dateFormat: "yy-mm-dd"});   jQuery('#DateofRetirementdor').datepicker({dateFormat: "yy-mm-dd"}); 
  jQuery('#eDateofRetirementdor').datepicker({dateFormat: "yy-mm-dd"}); 
  jQuery('#tags2').datepicker({dateFormat: "yy-mm-dd"}); 
  jQuery('#tags3').datepicker({dateFormat: "yy-mm-dd"}); 

jQuery('#DateOFPromotionDetails21').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails22').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails23').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails24').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails25').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails26').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails27').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails28').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails29').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails30').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails31').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails32').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails33').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails34').datepicker({dateFormat: "dd/mm/yy"}); 
jQuery('#DateOFPromotionDetails35').datepicker({dateFormat: "dd/mm/yy"}); 
 jQuery('#datetimepicker1').datepicker({dateFormat: "yy-mm-dd"});
jQuery('#doppp').datepicker({dateFormat: "yy-mm-dd"});

jQuery('#dateblockm11').datepicker({dateFormat: "yy-mm-dd"});
jQuery('#dateblockm12').datepicker({dateFormat: "yy-mm-dd"});
jQuery('#dateblockm13').datepicker({dateFormat: "yy-mm-dd"});
jQuery('#dateblockm14').datepicker({dateFormat: "yy-mm-dd"});



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
    
   $(document).on('change', '#stts', function() {
     $('#docOther1').hide();
    if(this.value == 'Under Graduate'){
     $('#ugb').show();
     $('#gb').hide();
     $('#pgb').hide();
     $('#docb').hide();
   }else if(this.value == 'Graduate'){
    $('#gb').show();
     $('#pgb').hide();
     $('#docb').hide();
     $('#ugb').hide();
   }else if(this.value == 'Post Graduate'){
    $('#pgb').show();
    $('#docb').hide();
     $('#ugb').hide();
     $('#gb').hide();
   }else if(this.value == 'Doctorate'){
    $('#docb').show();
    $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
    if('<?php echo $body->Doctorate; ?>'=='Other'){
      $('#docOther1').show();
    }
   }else if(this.value == 'Other'){
     $('#docb').hide();
    $('#docOther1').show();
    $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
   }else{
      $('#docOther1').hide();
      $('#docb').hide();
    $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
   }
});


   $(document).on('change', '#ugl', function() {
     
  if(this.value == 'Others'){
     $('#ug').show();
   }else{
    $('#ug').hide();
   }
});
   $(document).on('change', '#gard', function() {
  if(this.value == 'Others'){
     $('#g').show();
   }else{
    $('#g').hide();
   }
});

   $(document).on('change', '#TrainingInstitutessti', function() {
  if(this.value == 'Other'){
     $('.TrainingInstitutesstiOther1').show();
   }else if(this.value == 'Deferred Basic Training Sports person'){
    $('#NamesofsCourses1').hide();
    $('#DurationsofsCourses1').hide(); 
    $('.TrainingInstitutesstiOther1').hide();
   }else if(this.value == 'Deferred basic training Medical Rest'){
     $('#NamesofsCourses1').hide();
    $('#DurationsofsCourses1').hide();     
    $('.TrainingInstitutesstiOther1').hide();
   }
   else{
    $('.TrainingInstitutesstiOther1').hide();
     $('#NamesofsCourses1').show();
    $('#DurationsofsCourses1').show(); 
   }
});

$(document).ready(function(){
	var training_institute = $('#TrainingInstitutessti').val();
  if(training_institute == 'Other'){
     $('.TrainingInstitutesstiOther1').show();
   }else if(training_institute == 'Deferred Basic Training Sports person'){
    $('#NamesofsCourses1').hide();
    $('#DurationsofsCourses1').hide(); 
    $('.TrainingInstitutesstiOther1').hide();
   }else if(training_institute == 'Deferred basic training Medical Rest'){
     $('#NamesofsCourses1').hide();
    $('#DurationsofsCourses1').hide();     
    $('.TrainingInstitutesstiOther1').hide();
   }
   else{
    $('.TrainingInstitutesstiOther1').hide();
     $('#NamesofsCourses1').show();
    $('#DurationsofsCourses1').show(); 
   }
});

    $(document).on('change', '#PresentHealthStatus', function() {
  if(this.value == 'Chronic Disease'){
     $('#ChronicDiseaseDetails1').show();
     $('#MiscDetails1').hide();
   }else if(this.value == 'Misc'){
    $('#MiscDetails1').show();
    $('#ChronicDiseaseDetails1').hide();
   }else{
    $('#ChronicDiseaseDetails1').hide();
    $('#MiscDetails1').hide();
   }
});
 
    $(document).on('change', '#Postingtiset', function() {
  if(this.value == 'Admin Duty'){
     $('#ChronicDiseaseDetails1').show();
     $('#MiscDetails1').hide();
   }else if(this.value == 'Bn. Hqr. Admin Duty'){
    $('#MiscDetails1').show();
    $('#ChronicDiseaseDetails1').hide();
   }else if(this.value == 'Other duties'){
    $('#MiscDetails1').show();
    $('#ChronicDiseaseDetails1').hide();
   }else{
    $('#ChronicDiseaseDetails1').hide();
    $('#MiscDetails1').hide();
   }
});


  $(document).on('change', '#AdminDutyti', function() {
  if(this.value == 'Other'){
     $('#AdminDutytiOther').show();
   }else{
    $('#AdminDutytiOther').hide();
   }
});

     $(document).on('change', '#Postingtiset', function() {
  if(this.value == 'Admin Duty'){
     $('#AdminDutyti1').show();
     $('#BnHqrAdminDuty1').hide();
    $('#MudDuties1').hide();
    $('#GeneralStaff1').hide();
    $('#MTSectionf1').hide();
    $('#Institutionsti1').hide();
    $('#GuardDutiesti').hide();
    $('#GunmenDutiesti1').hide();
    $('#Companydutiesti1').hide();
    $('#LawOrderDuty1').hide();
    $('#SpecialTeamDuty1').hide();
    $('#SportsAttachments1').hide();
    $('#OtherAttachmentDuties1').hide();
   }else if(this.value == 'Bn. Hqr. Admin Duty'){
    $('#BnHqrAdminDuty1').show();
    $('#AdminDutyti1').hide();
    $('#MudDuties1').hide();
    $('#GeneralStaff1').hide();
    $('#MTSectionf1').hide();
    $('#Institutionsti1').hide();
    $('#GuardDutiesti').hide();
    $('#GunmenDutiesti1').hide();
    $('#Companydutiesti1').hide();
    $('#LawOrderDuty1').hide();
    $('#SpecialTeamDuty1').hide();
    $('#SportsAttachments1').hide();
    $('#OtherAttachmentDuties1').hide();
   }else if(this.value == 'Other duties'){
    $('#MudDuties1').show();
    $('#GeneralStaff1').show();
    $('#MTSectionf1').show();
    $('#Institutionsti1').show();
    $('#GuardDutiesti').show();
    $('#GunmenDutiesti1').show();
    $('#Companydutiesti1').show();
    $('#LawOrderDuty1').show();
    $('#SpecialTeamDuty1').show();
    $('#SportsAttachments1').show();
    $('#OtherAttachmentDuties1').show();
    $('#AdminDutyti1').hide();
    $('#BnHqrAdminDuty1').hide();
   }else{
    $('#AdminDutyti1').hide();
    $('#BnHqrAdminDuty1').hide();
   }
});

     $(document).on('change', '#BnHqrAdminDuty', function() {
  if(this.value == 'Commandant office'){
     $('#Commandantoffice1').show();

     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
   }else if(this.value == 'Asstt. Comdt. office'){
    $('#AsstCommandantOffice1').show();

    $('#Commandantoffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();

   }else if(this.value == 'DSP Office'){
    $('#DSPOffice1').show();

    $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
  
   }else if(this.value == 'English Branch'){
    $('#EnglishBranch1').show();

     $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
  
   }else if(this.value == 'Account Branch'){
    $('#AccountBranch1').show();

    $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
  
   }else if(this.value == 'OSI Branch'){
    $('#OSIBranch1').show();

     $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
  
   }else if(this.value == 'Litigation Branch'){
    $('#LitigationBranch1').show();

     $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
  
   }else if(this.value == 'Steno Branch'){
    $('#StenoBranch1').show();

     $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
  
   }else if(this.value == 'GPF Branch'){
    $('#GPFBranch1').show();

     $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#ComputerCell1').hide();
  
   }else if(this.value == 'Computer Cell'){
    $('#ComputerCell1').show();

     $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
  
   }else{
    $('#Commandantoffice1').hide();
     $('#AsstCommandantOffice1').hide();
     $('#DSPOffice1').hide();
     $('#EnglishBranch1').hide();
     $('#AccountBranch1').hide();
     $('#OSIBranch1').hide();
     $('#LitigationBranch1').hide();
     $('#StenoBranch1').hide();
     $('#GPFBranch1').hide();
     $('#ComputerCell1').hide();
   }
});

           

 $(document).on('change', '#pgard', function() {
  if(this.value == 'Others'){
     $('#pg').show();
   }else{
    $('#pg').hide();
   }
});


  $(document).on('change', '#mstatus', function() {
  if(this.value == 'Single'){
     $('#Single1').show();
     $('#Unmarried1').hide();
   }else if(this.value == 'Unmarried'){  
    $('#Unmarried1').show();
    $('#Single1').hide();
   }else{
    $('#Unmarried1').hide();
    $('#Single1').hide();
   }
});

  $(document).on('change', '#MTSectionf', function() {
  if(this.value == 'Any Other'){ 
     $('#MTSectionfothers1').show();
   }else{
    $('#MTSectionfothers1').hide();
   }
});

  $(document).on('change', '#SportsAttachments', function() {
  if(this.value == 'Others'){ 
     $('#SportsAttachmentsOthers1').show();
   }else{
    $('#SportsAttachmentsOthers1').hide();
   }
});

  $(document).on('change', '#OtherAttachmentDuties', function() {
  if(this.value == 'Other'){
     $('#AttachmentDutiesothers11').show();
   }else{
    $('#AttachmentDutiesothers11').hide();
   }
});


  $(document).on('change', '#doc', function() {
  if(this.value == 'Other'){
     $('#docOther1').show();
   }else{
    $('#docOther1').hide();
   }
});
  

  $(document).on('change', '#TrainingInstituteti', function() { 
  if(this.value == 'Deferred Basic Training Sports Person'){   
     $('#DateofCommencingdoc1').hide();
     $('#Batchbn1').hide();
     $('#batchpassdate1').hide();
     $('#Othertraining1').hide();
   }else if(this.value == 'Deferred basic training Medical Rest'){  
     $('#DateofCommencingdoc1').hide();
     $('#Batchbn1').hide();
     $('#batchpassdate1').hide();
     $('#Othertraining1').hide();
   }else if(this.value == 'Other'){
    $('#Othertraining1').show();
   }
   else{
     $('#DateofCommencingdoc1').show();
     $('#Batchbn1').show();
     $('#batchpassdate1').show();
     $('#Othertraining1').hide();
   }
});

 $(document).ready(function(){
	 var basicTrainingInstitute = $('#TrainingInstituteti').val();
	 if(basicTrainingInstitute == 'Deferred Basic Training Sports Person'){   
     $('#DateofCommencingdoc1').hide();
     $('#Batchbn1').hide();
     $('#batchpassdate1').hide();
     $('#Othertraining1').hide();
   }else if(basicTrainingInstitute == 'Deferred basic training Medical Rest'){  
     $('#DateofCommencingdoc1').hide();
     $('#Batchbn1').hide();
     $('#batchpassdate1').hide();
     $('#Othertraining1').hide();
   }else if(basicTrainingInstitute == 'Other'){
    $('#Othertraining1').show();
   }
   else{
     $('#DateofCommencingdoc1').show();
     $('#Batchbn1').show();
     $('#batchpassdate1').show();
     $('#Othertraining1').hide();
   }
});
 

 $(document).on('click', '#peradd', function() {
    $('#pfpart1').hide();
    $('#pfpart2').hide();
    $('#pfpart3').hide();
    $('#pfpart4').hide();

    $('#pfpart5').hide();
    $('#pfpart6').hide();
    $('#pfpart7').hide();
    $('#pfpart8').hide();
    $('#pfpart9').hide();
	$('#pwardnodiv').hide();
		$('#pdistrictdiv').hide();
		
		$('#listing2').css('display','none');

});
$(document).ready(function(){
	var status = $("input[name='peradd']:checked").val();
	if(status=='yes'){
		$('#pfpart1').hide();
		$('#pfpart2').hide();
		$('#pfpart3').hide();
		$('#pfpart4').hide();

		$('#pfpart5').hide();
		$('#pfpart6').hide();
		$('#pfpart7').hide();
		$('#pfpart8').hide();
		$('#pfpart9').hide();
		$('#pwardnodiv').hide();
		$('#pdistrictdiv').hide();
		
		$('#listing2').css('display','none');
	}else{
		$('#pfpart1').show();
		$('#pfpart2').show();
		$('#pfpart3').show();
		$('#pfpart4').show();

		$('#pfpart5').show();
		$('#pfpart6').show();
		$('#pfpart7').show();
		$('#pfpart8').show();
		$('#pfpart9').show();
		$('#listing2').css('display','inline');
		$('#pwardnodiv').show();
		$('#pdistrictdiv').show();
	}
	
});

  

  $(document).on('change', '#Modemdr', function() { 
  if(this.value == 'Other'){   
     $('#ModemdrOther1').show();
   }
   else{
     $('#ModemdrOther1').hide();
   }
});
$(document).ready(function(){
	var modeofrec = $('#Modemdr').val();
	if(modeofrec == 'Other'){   
     $('#ModemdrOther1').show();
   }
   else{
     $('#ModemdrOther1').hide();
   }
});

  $(document).on('click', '#peraddi', function() {
    $('#pfpart1').show();
    $('#pfpart2').show();
    $('#pfpart3').show();
    $('#pfpart4').show();

    $('#pfpart5').show();
    $('#pfpart6').show();
    $('#pfpart7').show();
    $('#pfpart8').show();
    $('#pfpart9').show();
     $('#pwardnodiv').show();
		$('#pdistrictdiv').show();
		
		$('#listing2').css('display','inline');   

});

  $("#state").change(function(){
    var state = $("#state").val();
    var dataStrings = 'state='+ state;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>getDistrictsAjax", //bt-st-aj",
    data: dataStrings,
    cache: false,
    success: function(html){
			$("#listing").html(html);
    }  
      
    });

    });

  $("#postate").change(function(){
    var postate = $("#postate").val();
    var dataStrings = 'postate='+ postate;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>getDistrictsAjaxPa",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#pdistrictdiv").html(html);
    }  
      
    });

    });

 // $('#datetimepicker1').datetimepicker();


     $(document).on('change', '#EnlistmentUnit', function() {
		 $('#enuther').hide();
	$('#enutherdistrict').hide();
      if(this.value == 'Other'){
     $('#enuther').show();
   }else if(this.value == 'District'){
    $('#enutherdistrict').show(); 
   }else{
    $('#enOther1').hide();
   }
  
});

$(document).ready(function() {
	var unit = $("#EnlistmentUnit").val();
	$('#enuther').hide();
	$('#enutherdistrict').hide(); 
      if(unit == 'Other'){
     $('#enuther').show();
   }else if(unit == 'District'){
    $('#enutherdistrict').show(); 
   }
  
});
          $(document).on('change', '#BattalionUnitito', function() {
      if(this.value == 'Other'){
     $('#buOther1').show();
   }else if(this.value == 'District'){
     $('#bunitdistrict').show();
   }else{
    $('#buOther1').hide();
   }
  
});

                $(document).on('change', '#PreviousBatalionito', function() {
      if(this.value == 'Other'){
     $('#pbuOther1').show();
   }else{
    $('#pbuOther1').hide();
   }
  
});

             $(document).on('change', '#GeneralStaff', function() {
      if(this.value == 'Misc'){
     $('#genralOther1').show();
   }else{
    $('#genralOther1').hide();
   }
  
});


            $(document).on('change', '#Institutionsti', function() {
      if(this.value == 'Others'){
     $('#Institutionstiother1').show();
   }else{
    $('#Institutionstiother1').hide();
   }
  
});


            $(document).on('change', '#Institutionsti', function() {
      if(this.value == 'Others'){
     $('#Institutionstiother1').show();
   }else{
    $('#Institutionstiother1').hide();
   }
  
});

$(document).on('change', '#eor', function() {
      if(this.value == 'Executive Staff'){
     $('#eors1').show();
     $('#eors2').hide();
     $('#eors3').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   } else if(this.value == 'Medical Staff'){
     $('#eors3').show();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(this.value == 'Ministerial Staff'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').show();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(this.value == 'Class-IV (P)'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').show();
      $('#eors5').hide();
   }else if(this.value == 'Class-IV (C)'){
        $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').show();
   }else{
    $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').show();
   }
  
});
  
  $(document).ready(function() {
	  var enofrank = $('#eor').val();
      if(enofrank == 'Executive Staff'){
     $('#eors1').show();
     $('#eors2').hide();
     $('#eors3').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   } else if(enofrank == 'Medical Staff'){
     $('#eors3').show();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(enofrank == 'Ministerial Staff'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').show();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(enofrank == 'Class-IV (P)'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').show();
      $('#eors5').hide();
   }else if(enofrank == 'Class-IV (C)'){
        $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').show();
   }else{
    $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').show();
   }
  
});
  

  $(document).on('change', '#RankRankre', function() {
      if(this.value == 'Executive Staff'){
     $('#exs1').show();
     $('#MedicalStaff2').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
      $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction,#prebatunit,#preno1').show();
      $('#dateblockm1,#dateblockm2,#dateblockm3,#dateblockm4').hide();
      $('#exdateblock1,#exdateblock2,#exdateblock3,#exdateblock4,#exdateblock5,#exdateblock6,#exdateblock7,#exdateblock8,#exdateblock9,#exdateblock10,#exdateblock11,#exdateblock12,#exdateblock13,#exdateblock14,#exdateblock15').show();
   } else if(this.value == 'Medical Staff'){
     $('#MedicalStaff2').show();
     $('#exs1').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
      $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction,#prebatunit,#preno1').hide();
      $('#dateblockm1,#dateblockm2,#dateblockm3,#dateblockm4').hide();
      $('#exdateblock1,#exdateblock2,#exdateblock3,#exdateblock4,#exdateblock5,#exdateblock6,#exdateblock7,#exdateblock8,#exdateblock9,#exdateblock10,#exdateblock11,#exdateblock12,#exdateblock13,#exdateblock14,#exdateblock15').hide();
   }else if(this.value == 'Ministerial Staff'){
     $('#MinisterialStaff1').show();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
       $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#preno1').hide();
       $('#dateblockm1,#dateblockm2,#dateblockm3,#dateblockm4').show();
       $('#exdateblock1,#exdateblock2,#exdateblock3,#exdateblock4,#exdateblock5,#exdateblock6,#exdateblock7,#exdateblock8,#exdateblock9,#exdateblock10,#exdateblock11,#exdateblock12,#exdateblock13,#exdateblock14,#exdateblock15').hide();

   }else if(this.value == 'Class-IV (P)'){
     $('#cl4,#prebatunit,#preno1').show();
        $('#MedicalStaff2').hide();
     $('#exs1').hide();
      $('#cl5').hide();
      $('#cl6').show();
   $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction').hide();
   $('#exdateblock1,#exdateblock2,#exdateblock3,#exdateblock4,#exdateblock5,#exdateblock6,#exdateblock7,#exdateblock8,#exdateblock9,#exdateblock10,#exdateblock11,#exdateblock12,#exdateblock13,#exdateblock14,#exdateblock15').hide();
   }else if(this.value == 'Class-IV (C)'){
     $('#cl5,#cl6,#prebatunit,#preno1').show();
     $('#MinisterialStaff1').hide();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
      $('#cl4').hide();
       $('#exs1').hide();
             $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction').hide();
             $('#exdateblock1,#exdateblock2,#exdateblock3,#exdateblock4,#exdateblock5,#exdateblock6,#exdateblock7,#exdateblock8,#exdateblock9,#exdateblock10,#exdateblock11,#exdateblock12,#exdateblock13,#exdateblock14,#exdateblock15').hide();
   }else{
    $('#exs1').hide();
    $('#MedicalStaff2').hide();
    $('#MinisterialStaff1').hide();
    $('#cl4').hide();
    $('#cl5').hide();
    $('#cl6').hide();
   }
  
}); 
    
   
     $(document).on('change', '#catofind', function() {
      if(this.value == 'Executive Staff'){
     $('#catofind1').show();
     $('#catofind2').hide();
     $('#catofind3').hide();
      $('#catofind4').hide();
      $('#catofind5').hide();
   } else if(this.value == 'Medical Staff'){
     $('#catofind3').show();
     $('#catofind1').hide();
     $('#catofind2').hide();
      $('#catofind5').hide();
      $('#catofind4').hide();
   }else if(this.value == 'Ministerial Staff'){
     $('#catofind2').show();
      $('#catofind1').hide();
     $('#catofind3').hide();
      $('#catofind4').hide();
      $('#catofind5').hide();
   }else if(this.value == 'Class-IV (P)'){
     $('#catofind4').show();
      $('#catofind1').hide();
     $('#catofind3').hide();
      $('#catofind2').hide();
      $('#catofind5').hide();
   }else if(this.value == 'Class-IV (C)'){
     $('#catofind5').show();
      $('#catofind1').hide();
     $('#catofind3').hide();
      $('#catofind2').hide();
      $('#catofind4').hide();
   }else{
    $('#catofind5').hide();
      $('#catofind1').hide();
     $('#catofind3').hide();
      $('#catofind2').hide();
      $('#catofind4').hide();
   }
  
}); 
   var class_ = $('#stts').val();
   $('#ugb').hide();
   $('#gb').hide();
   $('#pgb').hide();
   $('#docb').hide();
   $('#docOther1').hide();
   switch(class_){
		case 'Under Graduate':
			$('#ugb').show();
			break;
		case 'Graduate':
			$('#gb').show();
			break;
		case 'Post Graduate':
			$('#pgb').show();
			break;
	case 'Doctorate':
		$('#docb').show();
		if($('#doc').val()=='Other'){
			$('#docOther1').show();
		}
		break;
	case 'Other':
		$('#docOther1').show();
		break;
		default:
    $('#docOther1').hide();
		break;
   }
});

  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapperi         = $(".input_fields_wrap"); //Fields wrapper
    var add_buttoni      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_buttoni).click(function(e){ //on add input button click
        e.preventDefault();
   if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapperi).append('<div class="form-group"> <label class="col-sm-3 control-label">Training Institute</label> <div class="col-sm-9"> <select name="TrainingInstitutessti[]" id="TrainingInstitutessti" data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"><option value="" selected="selected">--Select--</option><option value="RTC">RTC</option><option value="ISTC">ISTC</option><option value="CTC BHG">CTC BHG</option><option value="PPA Phillaur">PPA Phillaur</option><option value="PRTC Jahankhelan">PRTC Jahankhelan</option><option value="Ladda Kothi Sangrur">Ladda Kothi Sangrur</option><option value="PAP Computer Cell">PAP Computer Cell</option><option value="Other">Other</option></select> <label for="TrainingInstitutessti" class="error"></label> </div></div><div class="form-group TrainingInstitutesstiOther1" id="TrainingInstitutesstiOther1" style="display:none"> <label class="col-sm-3 control-label">Other</label> <div class="col-sm-9"><input name="TrainingInstitutesstiOther[]" value="" id="TrainingInstitutesstiOther" class="form-control" placeholder="Other" type="text"> <label for="TrainingInstitutesstiOther" class="error"></label> </div></div><div class="form-group" id="NamesofsCourses1"> <label class="col-sm-3 control-label">Name of Course</label> <div class="col-sm-9"><select name="NamesofsCourses[]" id="NamesofsCourses" data-placeholder="Choose One" title="Please select at least 1 area" class="form-control valid"><option value="">--Select--</option><option value="Basic Drill Course ">Basic Drill Course</option><option value="Computer Awareness Refresher Coure">Computer Awareness Refresher Coure</option><option value="Basic MT Course">Basic MT Course</option><option value="MTO Course">MTO Course</option><option value="Commando Course">Commando Course</option><option value="Bomb Dispossal Course">Bomb Dispossal Course</option><option value="Armourer Course">Armourer Course</option><option value="Tear Gas Course">Tear Gas Course</option><option value="D &amp; M Refresher Course">D &amp; M Refresher Course</option><option value="0"></option><option value="VIP Security Induction Course">VIP Security Induction Course</option><option value="Pistol Handling Course">Pistol Handling Course</option><option value="Capsule Course for Highway Patrolling">Capsule Course for Highway Patrolling</option><option value="Course on Disaster Management" selected="selected">Course on Disaster Management</option><option value="Traffic Law Enforcement &amp; Traffic Control">Highway Patrolling Training</option><option value="Security Refresher Course for PSOs &amp; Escort Staff">Security Refresher Course for PSOs &amp; Escort Staff</option><option value="Re-Orientation (Police Behavior)">Re-Orientation (Police Behavior)</option><option value="Review of Training &amp; Training of Trainers Course">Review of Training &amp; Training of Trainers Course</option><option value="Life Style &amp; Stress Management">Life Style &amp; Stress Management</option><option value="Crowd Control Refresher Training Course">Crowd Control Refresher Training Course</option><option value="Ref. Course in the Handling of Security Equipment &amp; Gadges.">Ref. Course in the Handling of Security Equipment &amp; Gadges.</option><option value="Driving &amp; Maintenance Basic Course">Driving &amp; Maintenance Basic Course</option><option value="Special Coy. Refresher Course">Special Coy. Refresher Course</option><option value="Crash Induction trg. for specialized operation duties course.">Crash Induction trg. for specialized operation duties course.</option><option value="Guard duty &amp; Fighting course and Re-Orientation Course.">Guard duty &amp; Fighting course and Re-Orientation Course.</option><option value="Specialized course reg. Maintenance of Kot &amp; Their inspection">Specialized course reg. Maintenance of Kot &amp; Their inspection</option><option value="Photography cum Single Digital Course">Photography cum Single Digital Course</option><option value="Finger Print Proficiency Course">Finger Print Proficiency Course</option><option value="Emerging Trends in white coller crime &amp;their handling by police Course">Emerging Trends in white coller crime &amp;their handling by police Course</option><option value="Specialized course on Traffic Management &amp; Traffice Control Course">Specialized course on Traffic Management &amp; Traffice Control Course</option><option value="Refresher Course for Drill Instructors Course">Refresher Course for Drill Instructors Course</option><option value="Course on Deparmental Enquiries Course">Course on Deparmental Enquiries Course</option><option value="Regional Seminer on Terrorism Course">Regional Seminer on Terrorism Course</option><option value="Police Lines Management for Course">Police Lines Management for Course</option><option value="Noice Pollution and Enviroment Protection Course">Noice Pollution and Enviroment Protection Course</option><option value="Office Procedure of Account Matters Course">Office Procedure of Account Matters Course</option><option value="Investigation of Domestic Violence Course">Investigation of Domestic Violence Course</option><option value="Latest Court Ruling and Judgments peraining Course">Latest Court Ruling and Judgments peraining Course</option><option value="Social Media Management for positive police Course">Social Media Management for positive police Course</option><option value="An In light into the legal &amp;Procedural Provisions Course">An In light into the legal &amp;Procedural Provisions Course</option><option value="Roll of Soft Skills in Public Dealing Course">Roll of Soft Skills in Public Dealing Course</option><option value="Emerging Sociology Trends and Impact on Contemporary Course">Emerging Sociology Trends and Impact on Contemporary Course</option><option value="Capsule Course on Gender Sensitization for SPs/DSP">Capsule Course on Gender Sensitization for SPs/DSP</option><option value="Course on Healthy Living &amp; Postive Thinking for Gos">Course on Healthy Living &amp; Postive Thinking for Gos</option><option value="Course on Leadership and Communication Skills for SSPs/DSPs">Course on Leadership and Communication Skills for SSPs/DSPs</option><option value="Workshp on Police Media Interface for DSPs/Inspr.">Workshp on Police Media Interface for DSPs/Inspr.</option><option value="HC/PR Promoted after completeion of 16 years HC as Constable">HC/PR Promoted after completeion of 16 years HC as Constable</option><option value="Re-Orientation &amp; Detective Foot Consts. Course for CTs on list C-2">Re-Orientation &amp; Detective Foot Consts. Course for CTs on list C-2</option><option value="Elementry Traffic Course for Constables">Elementry Traffic Course for Constables</option><option value="Specialised Course for Moter Mechanics">Specialised Course for Moter Mechanics</option><option value="Refresher Course on operational preparedness Course">Refresher Course on operational preparedness Course</option><option value="PSO &amp; Gunman Course (State level)">PSO &amp; Gunman Course (State level)</option><option value="Camp security condensed Course">Camp security condensed Course</option><option value="Handling &amp; defusing of explosive and Bomp Disposal Course">Handling &amp; defusing of explosive and Bomp Disposal Course</option><option value="Ref.Course for NGOs &amp; ORs">Ref.Course for NGOs &amp; ORs</option><option value="Specialised Course reg. maintenance of Misc.">Specialised Course reg. maintenance of Misc.</option><option value="Specialised Course reg. maintenance of CDO Branch &amp;its inspection Course">Specialised Course reg. maintenance of CDO Branch &amp;its inspection Course</option><option value="Specialised Course reg.maintenance of OASI Branch &amp; its inspection Course">Specialised Course reg.maintenance of OASI Branch &amp; its inspection Course</option><option value="Capsule Course for telephone operators Course">Capsule Course for telephone operators Course</option><option value="Police Behavioural Course">Police Behavioural Course</option><option value="Short term Section Platoon commander Course">Short term Section Platoon commander Course</option><option value="Weapon &amp; Tactics Course">Weapon &amp; Tactics Course</option><option value="Camp Security Course">Camp Security Course</option><option value="Finger Print Course">Finger Print Course</option><option value="Gunman Course">Gunman Course</option><option value="Fire Fighting Course">Fire Fighting Course</option><option value="Refresher Course">Refresher Course</option><option value="Anti Roit Control Course">Anti Roit Control Course</option><option value="Photography-Cum-single digit course">Photography-Cum-single digit course</option><option value="Sanstization &amp; Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs">Sanstization &amp; Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs</option><option value="Flood Rescue">Flood Rescue</option><option value="Senior Constable">Senior Constable</option><option value="Q.R.T">Q.R.T</option><option value="Basic dog handler">Basic dog handler</option></select> <label for="NamesofsCourses" class="error"></label> </div></div><div class="form-group" id="DurationsofsCourses1"> <label class="col-sm-3 control-label">Duration of Course start date</label> <div class="col-sm-9"><input name="DurationsofsCourses[]" value="" id="tags2" class="form-control" placeholder="From" type="text"> <label for="DurationsofsCourses" class="error"></label> </div></div><div class="form-group"> <label class="col-sm-3 control-label">Duration of Course End date</label> <div class="col-xs-9"><input name="DurationsofsCoursest[]" value="" id="tags3" class="form-control" placeholder="To" type="text"> <label for="DurationsofsCoursest" class="error"></label> </div></div><hr> <a href="#" class="add_field_button"> <i class="fa fa-plus"></i> Add More</a></div>'); //add input box
        }
    });
   
    $(wrapperi).on("click",".remove_fieldi", function(e){ //user click on remove text
        if
(confirm('Do you want to remove?')){
             e.preventDefault(); $(this).parent('div').remove(); x--;
           }
        
    })
});
</script>
<script type="text/javascript">
 switch("<?php echo $body->eduqalification; ?>"){
   case 'Under Graduate':
    $('#ugb').show();
    break;
  case 'Graduate':
    $('#gb').show();
    break;
  case 'Post Graduate':
    $('#pgb').show();
    break;
  case 'Doctorate':
    $('#docb').show();
    if('<?php echo $body->Doctorate; ?>'=='Other'){
      $('#docOther1').show();
    }
    break;1
  case 'Other':
    $('#docOther1').show();
    break;
  default:
    $('#docOther1').hide();
    break;
  
 }
 </script>
</body>
</html>