<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add ManPower</title>
  <style>
	
	
  </style>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.tagsinput.css" />
   <!--link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet"-->
   
  </head>
  
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<?php //echo validation_errors(); 
//var_dump($pageErrorCounter);

?>
<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp; &nbsp; Add ManPower</h3>
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
	<input type="hidden" name="page_name" value="<?php echo $selected_page; ?>" id="page_name">
	  <div class="panel panel-default">
			<div class="panel-body">
        
		
		<ul class="nav nav-tabs nav-justified mynavbar" id="scroll">
		<span style="float:right;color:#567ba2;">Fill the whole form (including red color marked navigation items), only then data will be saved!!</span>
		 <li class="<?php echo getActivePageClass('personal_detail',$selected_page); ?> anchor"><a data-toggle="tab" href="#one" onClick="setPage('personal_detail');" onClick="setPage('personal_detail');"><strong>Personal Detail</strong>
			<?php echo (isset($pageErrorCounter))?getBadge('personal_detail',$pageErrorCounter):'';?>
		 </a></li>
		 
         <li class="<?php echo getActivePageClass('address',$selected_page); ?> anchor"  onClick="setPage('address');"><a data-toggle="tab" href="#two"  onClick="setPage('address');"><strong>Address</strong>
			<?php echo (isset($pageErrorCounter))?getBadge('address',$pageErrorCounter):''; ?>
		 </a></li>
          
		  <li class="<?php echo getActivePageClass('education_detail',$selected_page); ?> anchor" onClick="setPage('education_detail');"><a data-toggle="tab" href="#three"><strong>Educational Details</strong><?php echo (isset($pageErrorCounter))?getBadge('education_detail',$pageErrorCounter):''; ?>
		  </a></li>
          
		  <li class="<?php echo getActivePageClass('enlistment_detail',$selected_page); ?> anchor" onClick="setPage('enlistment_detail');"><a data-toggle="tab" href="#four"><strong>Enlistment Details</strong>
		  <?php echo (isset($pageErrorCounter))?getBadge('enlistment_detail',$pageErrorCounter):''; ?></a></li>
          
		  <li class="<?php echo getActivePageClass('present_service_detail',$selected_page); ?> anchor" onClick="setPage('present_service_detail');"><a data-toggle="tab" href="#five"><strong>Present Service Details</strong><?php echo (isset($pageErrorCounter))?getBadge('present_service_detail',$pageErrorCounter):''; ?>
		  </a></li>
          
		  <li class="<?php echo getActivePageClass('basic_training_course_detail',$selected_page); ?> anchor" onClick="setPage('basic_training_course_detail');"><a data-toggle="tab" href="#six"><strong>Basic Training Course</strong><?php echo (isset($pageErrorCounter))?getBadge('basic_training_course_detail',$pageErrorCounter):''; ?></a></li>
         
		 <li class="<?php echo getActivePageClass('professional_course_detail',$selected_page); ?> anchor" onClick="setPage('professional_course_detail');"><a data-toggle="tab" href="#seven"><strong>Professional Course Details</strong><?php echo (isset($pageErrorCounter))?getBadge('professional_course_detail',$pageErrorCounter):''; ?></a></li>
         
		 <li class="<?php echo getActivePageClass('annual_firing_practice',$selected_page); ?> anchor" onClick="setPage('annual_firing_practice');"><a data-toggle="tab" href="#eight"><strong>Annual Firing Practice</strong><?php echo (isset($pageErrorCounter))?getBadge('annual_firing_practice',$pageErrorCounter):''; ?></a></li>
       
	   <li class="<?php echo getActivePageClass('permanent_rank',$selected_page); ?> anchor hidden" onClick="setPage('permanent_rank');"><a data-toggle="tab" href="#ten"><strong>Permanent Rank</strong><?php echo (isset($pageErrorCounter))?getBadge('permanent_rank',$pageErrorCounter):''; ?></a></li>
          

        </ul>
		
        <div class="tab-content" style="border:1px solid #d8dbde;">
		<div id="one" class="tab-pane <?php echo getActivePageClass('personal_detail',$selected_page); ?>">
            

         <div id="listing1"></div>
   <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Official(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$name = array('type' => 'text','name' => 'name','id' => 'name','class' => 'form-control','placeholder' =>'Name of Official','value' => set_value('name'));
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
$fname = array('type' => 'text','name' => 'fname','id' => 'fname','class' => 'form-control','placeholder' =>'Father Name','value' => set_value('fname'));
echo form_input($fname);
echo form_error('fname');
?>
                    <label for="fname" class="error"></label>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Gender(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
				  <?php if($this->input->post('gender')=='Male' || $this->input->post('gender')==null)
					{$male = 'checked';$female='';
				}else{
				  $male='';$female="checked";}
					  ?>
<label class="radio-inline"><input type="radio" name="gender" <?php echo $male; ?> value="Male">Male</label>
                <label class="radio-inline"><input type="radio" name="gender" value="Female" <?php echo $female; ?>>Female</label>
				<?php echo form_error('gender'); ?>
                  </div>
                </div>


                 <div class="form-group">
                  <label class="col-sm-3 control-label">Marital Status(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$mstatus = array('' => '--Select--',  'Single' => 'Single','Married' => 'Married','Unmarried' => 'Unmarried','Divorced' => 'Divorced', 'Widow/ Widower' => 'Widow/ Widower');
/*newarea Textfield*/
 echo form_dropdown('mstatus', $mstatus, set_value('mstatus',1),'id="mstatus" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('mstatus');
/*----End newarea Textfield----*/
 ?>
                    <label for="mstatus" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                 <label class="col-sm-3 control-label">Date of birth(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                <div class='input-group'>
                    <input type='text' name="dob" class="form-control"  id='datetimepicker1' value="<?php if(null!=$this->input->post('dob')){echo $this->input->post('dob');}?>" placeholder="Date of birth dd/mm/yyyy"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				<?php echo form_error('dob'); ?>
            </div></div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Caste</label>
                  <div class="col-sm-9">
<?php
$casting = array('type' => 'text','name' => 'casting','id' => 'casting','class' => 'form-control','placeholder' =>'Caste','value' => set_value('casting'));
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
$catii = array('' => '--Select--',  'GEN' => 'GEN', 'SCM' => 'SCM','SCO' => 'SCO', 'BC' => 'BC','OBC' => 'OBC', 'ST' => 'ST','SCBM' => 'SCBM', 'EWS' => 'EWS');
/*newarea Textfield*/
 echo form_dropdown('catii', $catii, set_value('catii',1),'id="catii" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('catii');
/*----End newarea Textfield----*/
 ?>
                    <label for="catii" class="error"></label>
                  </div>
                </div>
                <h4 class="page-header">Contacts</h4>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Phone No(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$conphno = array('type' => 'text','name' => 'conphno','id' => 'conphno','class' => 'form-control','placeholder' =>'Phone No','value' => set_value('conphno'));
echo form_input($conphno);
echo form_error('conphno');
?>
                    <label for="conphno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Phone No 2</label>
                  <div class="col-sm-9">
<?php
$conphnot = array('type' => 'text','name' => 'conphnot','id' => 'conphnot','class' => 'form-control','placeholder' =>'Phone No 2','value' => set_value('conphnot'));
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
$pemailid = array('type' => 'email','name' => 'pemailid','id' => 'pemailid','class' => 'form-control','placeholder' =>'Email ID','value' => set_value('pemailid'));
echo form_input($pemailid);
echo form_error('pemailid');
?>
                    <label for="pemailid" class="error"></label>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Adhaar Card No</label>
                  <div class="col-sm-9">
<?php
$addarcard = array('type' => 'text','name' => 'addarcard','id' => 'addarcard','class' => 'form-control','placeholder' =>'Adhaar Card No','value' => set_value('addarcard'));
echo form_input($addarcard);
echo form_error('addarcard');
?>
                    <label for="addarcard" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">PAN</label>
                  <div class="col-sm-9">
<?php
$pancard = array('type' => 'text','name' => 'pancard','id' => 'pancard','class' => 'form-control','placeholder' =>'PAN','value' => set_value('pancard'));
echo form_input($pancard);
echo form_error('pancard');
?>
                    <label for="pancard" class="error"></label>
                  </div>
                </div>
                <h4 class="page-header">Bank Details</h4>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Name of the Bank</label>
                  <div class="col-sm-9">
<?php
$bankdetail = array('type' => 'text','name' => 'bankdetail','id' => 'bankdetail','class' => 'form-control','placeholder' =>'Name of the Bank','value' => set_value('bankdetail'));
echo form_input($bankdetail);
echo form_error('bankdetail');
?>
                    <label for="bankdetail" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Branch</label>
                  <div class="col-sm-9">
<?php
$bankbrach = array('type' => 'text','name' => 'bankbrach','id' => 'bankbrach','class' => 'form-control','placeholder' =>'Name of Branch','value' => set_value('bankbrach'));
echo form_input($bankbrach);
echo form_error('bankbrach');
?>
                    <label for="bankbrach" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Bank A/C No.</label>
                  <div class="col-sm-9">
<?php
$bankac = array('type' => 'text','name' => 'bankac','id' => 'bankac','class' => 'form-control','placeholder' =>'Bank A/C No.','value' => set_value('bankac'));
echo form_input($bankac);
echo form_error('bankac');
?>
                    <label for="bankac" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">IFSC Code</label>
                  <div class="col-sm-9">
<?php
$ifsccode = array('type' => 'text','name' => 'ifsccode','id' => 'ifsccode','class' => 'form-control','placeholder' =>'IFSC Code','value' => set_value('ifsccode'));
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
	$bg = [''=>'--Select--'];
	foreach($bloodgroups as $k=>$v){
		$bg[$k] = $v;
	}
/*newarea Textfield*/
 echo form_dropdown('bloodgroup', $bg, set_value('bloodgroup',1),'id="bloodgroup" data-placeholder="Choose One" class="select2"'); 
 echo form_error('bloodgroup');
?>
                    <label for="bloodgroup" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Identification Mark</label>
                  <div class="col-sm-9">
<?php
$Identificationmark = array('type' => 'text','name' => 'Identificationmark','id' => 'Identificationmark','class' => 'form-control','placeholder' =>'Identification Mark','value' => set_value('Identificationmark'));
echo form_input($Identificationmark);
echo form_error('Identificationmark');
?>
                    <label for="Identificationmark" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Weight</label>
                  <div class="col-sm-9">
                  <div class="col-xs-4"><?php
$Kg = array('type' => 'text','name' => 'Kg','id' => 'Kg','class' => 'form-control','placeholder' =>'Kg','value' => set_value('Kg'));
echo form_input($Kg);
echo form_error('Kg');
?></div><div class="col-xs-4">
<?php
$Gm = array('type' => 'text','name' => 'Gm','id' => 'Gm','class' => 'form-control','placeholder' =>'Gm','value' => set_value('Gm'));
echo form_input($Gm);
echo form_error('Gm');
?></div>
                    <label for="Gm" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Height(<span class="mandatory red">*</span>)</label>
                          <div class="col-xs-4"><?php
$Feet = array('type' => 'text','name' => 'Feet','id' => 'Feet','class' => 'form-control','placeholder' =>'Feet','value' => set_value('Feet'));
echo form_input($Feet);
echo form_error('Feet');
?></div><div class="col-xs-4">
<?php
$inch = array('type' => 'text','name' => 'inch','id' => 'inch','class' => 'form-control','placeholder' =>'inch','value' => set_value('inch'));
echo form_input($inch);
echo form_error('inch');
?></div>
                </div>

                

          </div>
          <div id="two" class="tab-pane <?php echo getActivePageClass('address',$selected_page); ?>">
                      
				
				<h4 class="page-header"> Permanent Address</h4>
                <div class="form-group">
                  <label class="col-sm-3 control-label">House No.</label>
                  <div class="col-sm-9">
<?php
$hno = array('type' => 'text','name' => 'hno','id' => 'hno','class' => 'form-control','placeholder' =>'House No.','value' => set_value('hno'));
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
$sno = array('type' => 'text','name' => 'sno','id' => 'sno','class' => 'form-control','placeholder' =>'Street No.','value' => set_value('sno'));
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
$vm = array('type' => 'text','name' => 'vm','id' => 'vm','class' => 'form-control','placeholder' =>'Village/Mohalla','value' => set_value('vm'));
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
$wardno = array('type' => 'text','name' => 'wardno','id' => 'wardno','class' => 'form-control','placeholder' =>'ward no.','value' => set_value('wardno'));
echo form_input($wardno);
echo form_error('wardno');
?>
                    <label for="wardno" class="error"></label>
                  </div>
                </div>

               <!--  <div class="form-group">
                  <label class="col-sm-3 control-label">City</label>
                  <div class="col-sm-9">
<?php
/*$ct = array('type' => 'text','name' => 'ct','id' => 'ct','class' => 'form-control','placeholder' =>'City','value' => set_value('ct'));
echo form_input($ct);
echo form_error('ct');*/
?>
                    <label for="ct" class="error"></label>
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Post Office(<span class="mandatory red">*</span>)</label>   
                  <div class="col-sm-9">
<?php
$po = array('type' => 'text','name' => 'po','id' => 'po','class' => 'form-control','placeholder' =>'Post Office','value' => set_value('po'));
echo form_input($po);
echo form_error('po');
?>
                    <label for="po" class="error"></label>
                  </div>
                </div>
                                <div class="form-group">
                  <label class="col-sm-3 control-label">Police Station(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$ps = array('type' => 'text','name' => 'ps','id' => 'ps','class' => 'form-control','placeholder' =>'Police Station','value' => set_value('ps'));
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
$tl = array('type' => 'text','name' => 'tl','id' => 'tl','class' => 'form-control','placeholder' =>'Tehsil','value' => set_value('tl'));
echo form_input($tl);
echo form_error('tl');
?>
                    <label for="tl" class="error"></label>
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
 echo form_dropdown('nat', $nat, set_value('nat',''),'id="nat" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nat');
/*----End newarea Textfield----*/
 ?>
                    <label for="nat" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="sntas" style="display: none;">
                  <label class="col-sm-3 control-label">Type State</label>
                  <div class="col-sm-9">
<?php
$snat = array('type' => 'text','name' => 'snat','id' => 'snat','class' => 'form-control','placeholder' =>'Type State','value' => set_value('snat'));
echo form_input($snat);
echo form_error('snat');
?>
                    <label for="snat" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="states">
                  <label class="col-sm-3 control-label">State(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                                     <?php 
                 $state = array();
                  $state[''] = '--Select--'; 
                 foreach ($statelist as $value) {
                   $state[$value->state] = $value->state;
                 }
				 
				 
/*newarea Textfield*/
 echo form_dropdown('state', $state, set_value('state',354),'id="state" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('state');
/*----End newarea Textfield----*/
 ?>
                    <label for="state" class="error"></label>
                  </div>
				  <?php $districts = [] ; ?>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">District(*)</label>
                  <div class="col-sm-9">
                    <?php echo form_dropdown('dis', $districts, set_value('dis'),'id="dis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
                      echo form_error('dis');
                    ?>
                    </div>
                  </div>
                  <br/>
				 <div id="listing"></div>
				
				<h4 class="page-header"> Present Address</h4>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Same as permanent address</label>
                  <div class="col-sm-9">
				  <?php
				  $yesChecked = '';
				  $noChecked = '';
				  if(null!=$this->input->post('peradd')){
					  if($this->input->post('peradd')=='yes'){
						  $yesChecked = true;
					  }else{
						  $noChecked = true;
					  }
				  }else{
					  $noChecked = true;
				  }
					echo form_radio(['name'=>'peradd','id'=>'peradd'],'yes',$yesChecked);
					echo form_label('Yes','peradd');
					
					echo form_radio(['name'=>'peradd','id'=>'peraddi'],'no',$noChecked);
					echo form_label('No','peraddi');
					?>

                     
                  </div>

                 
                  </div>

                <div class="form-group" id="pfpart1">
                  <label class="col-sm-3 control-label">House No.</label>
                  <div class="col-sm-9">
<?php
$phouseno = array('type' => 'text','name' => 'phouseno','id' => 'phouseno','class' => 'form-control','placeholder' =>'House No.','value' => set_value('phouseno'));
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
$pstreetno = array('type' => 'text','name' => 'pstreetno','id' => 'pstreetno','class' => 'form-control','placeholder' =>'Street No.','value' => set_value('pstreetno'));
echo form_input($pstreetno);
echo form_error('pstreetno');
?>
                    <label for="pstreetno" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="pfpart3">
                  <label class="col-sm-3 control-label">Village/Mohalla</label>
                  <div class="col-sm-9">
<?php
$pvillmoh = array('type' => 'text','name' => 'pvillmoh','id' => 'pvillmoh','class' => 'form-control','placeholder' =>'Village/Mohalla','value' => set_value('pvillmoh'));
echo form_input($pvillmoh);
echo form_error('pvillmoh');
?>
                    <label for="pvillmoh" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="pfpart4">
                  <label class="col-sm-3 control-label">City</label>
                  <div class="col-sm-9">
<?php
$postcity = array('type' => 'text','name' => 'postcity','id' => 'postcity','class' => 'form-control','placeholder' =>'City','value' => set_value('postcity'));
echo form_input($postcity);
echo form_error('postcity');
?>
                    <label for="postcity" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="pfpart5">
                  <label class="col-sm-3 control-label">Post Office(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$pcitypostoff = array('type' => 'text','name' => 'pcitypostoff','id' => 'pcitypostoff','class' => 'form-control','placeholder' =>'City Post Office','value' => set_value('pcitypostoff'));
echo form_input($pcitypostoff);
echo form_error('pcitypostoff');
?>
                    <label for="pcitypostoff" class="error"></label>
                  </div>
                </div>
                                <div class="form-group" id="pfpart6">
                  <label class="col-sm-3 control-label">Police Station(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$ppolicestation = array('type' => 'text','name' => 'ppolicestation','id' => 'ppolicestation','class' => 'form-control','placeholder' =>'Police Station','value' => set_value('ppolicestation'));
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
$ptehsil = array('type' => 'text','name' => 'ptehsil','id' => 'ptehsil','class' => 'form-control','placeholder' =>'Tehsil','value' => set_value('ptehsil'));
echo form_input($ptehsil);
echo form_error('ptehsil');
?>
                    <label for="ptehsil" class="error"></label>
                  </div>
                </div> 

 <div class="form-group" id="pfpart8"> 
                  <label class="col-sm-3 control-label">State(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">

                       <?php 
                 $postate = array();
                  $postate[''] = '--Select--'; 
                 foreach ($statelist as $value) {
                   $postate[$value->state] = $value->state;
                 }
 
/*newarea Textfield*/
 echo form_dropdown('postate', $postate, set_value('postate',354),'id="postate" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('postate');
/*----End newarea Textfield----*/
 ?>
                    <label for="postate" class="error"></label>
                  </div>
                </div>
                <?php
                $pdistricts = [];
                ?>
                <div class="form-group" id="pfpart9">
                  <label class="col-sm-3 control-label">District(*)</label>
                  <div class="col-sm-9">
                    <?php echo form_dropdown('pdistrict', $pdistricts, set_value('pdistrict'),'id="pdistrict" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
                      echo form_error('pdistrict');
                    ?>
                  </div>
                </div>
               <div id="listing2"></div>
            </div>
			
          
		  
		  
          <div id="three" class="tab-pane <?php echo getActivePageClass('education_detail',$selected_page); ?>">
              <div class="form-group">
                  <label class="col-sm-3 control-label">Class(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$stts = array('' => '--Select--',  'Illiterate' => 'Illiterate', 'Under Matric' => 'Under Matric', '10th' => '10th', 'H. Sec' => 'H. Sec', 'Prep' => 'Prep', '10+1' => '10+1','10+2' =>'10+2','Under Graduate' => 'Under Graduate', 'Graduate' => 'Graduate', 'Post Graduate' => 'Post Graduate','Doctorate' => 'Doctorate','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('stts', $stts, set_value('stts',1),'id="stts" data-placeholder="Choose One" class="select2"'); 
 echo form_error('stts');
/*----End newarea Textfield----*/
 ?>
                    <label for="stts" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="ugb" style="display:none;">
                  <label class="col-sm-3 control-label">Under Graduate(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$UnderGraduate = array('' => '--Select--', 'BA-I' => 'BA-I', 'BA-II' => 'BA-II', 'BSc-I' => 'BSc-I', 'BSc-II' => 'BSc-II','BSc .IT-I' => 'BSc .IT-I', 'BSc .IT-II' => 'BSc .IT-II', 'Bcom-I' => 'Bcom-I','Bcom-II' => 'Bcom-II','BCA-I' =>'BCA-I','BCA-II' =>'BCA-II','BBA-I' => 'BBA-I','BBA-II' => 'BBA-II','LLB-I' => 'LLB-I','LLB-II' => 'LLB-II','B.Tech-I' => 'B.Tech-I', 'B.Tech-II' => 'B.Tech-II', 'B.Tech-III' => 'B.Tech-III');
/*newarea Textfield*/
 echo form_dropdown('UnderGraduate', $UnderGraduate, set_value('UnderGraduate',1),'id="ug" data-placeholder="Choose One" class="select2"'); 
 echo form_error('UnderGraduate');
/*----End newarea Textfield----*/
 ?>
                    
                  </div>
				 
                </div> 


                       <div class="form-group"  id="gb" style="display:none;">
                  <label class="col-sm-3 control-label">Graduate(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$Graduate = array('' => '--Select--', 'BA' => 'BA', 'B.Sc' => 'B.Sc','BSc .IT' => 'BSc .IT', 'B.Com' => 'B.Com','BCA' =>'BCA','BBA' => 'BBA','BDS' => 'BDS','LLB' => 'LLB','B.Tech' => 'B.Tech','LAB Technician' => 'LAB Technician','BA/LLB' => 'BA/LLB','B.Lib'=>'B.Lib');
/*newarea Textfield*/
 echo form_dropdown('Graduate', $Graduate, set_value('Graduate',1),'id="Graduate" data-placeholder="Choose One" class="select2"'); 
 echo form_error('Graduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Graduate" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group"  id="pgb" style="display:none;">
                  <label class="col-sm-3 control-label">Post Graduate(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$PostGraduate = array('' => '--Select--', 'MA' => 'MA','M.Com' => 'M.Com','M.Phil' =>'M.Phil','M Pharm' => 'M Pharm','MCA' => 'MCA','MBA' => 'MBA','MTA' => 'MTA','M.Tech' => 'M.Tech','M.Sc' => 'M.Sc','M.Lib'=>'M.Lib');
/*newarea Textfield*/
 echo form_dropdown('PostGraduate', $PostGraduate, set_value('PostGraduate',1),'id="PostGraduate" data-placeholder="Choose One" class="select2"'); 
 echo form_error('PostGraduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="PostGraduate" class="error"></label>
                  </div>
                </div> 

                       <div class="form-group"  id="docb" style="display:none;">
                  <label class="col-sm-3 control-label">Doctorate(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$Doctorate = array('' => '--Select--', 'Ph.d' => 'Ph.d');
/*newarea Textfield*/
 echo form_dropdown('Doctorate', $Doctorate, set_value('Doctorate',1),'id="doc" data-placeholder="Choose One" class="select2"'); 
 echo form_error('Doctorate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Doctorate" class="error"></label>
                  </div>
                </div> 


                 <div class="form-group"  id="docOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$docOther = array('type' => 'text','name' => 'docOther','id' => 'docOther','class' => 'form-control','placeholder' =>'Other','value' => set_value('docOther'));
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
 echo form_dropdown('clit', $InductionModeim, set_value('clit',1),'id="clit" data-placeholder="Choose One" class="select2"'); 
 echo form_error('clit');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                  </div>
      
            </div>
          <div id="four" class="tab-pane <?php echo getActivePageClass('enlistment_detail',$selected_page); ?>">

             <div class="form-group">
                  <label class="col-sm-3 control-label">Type of Duty(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$tyodu = array('' => '--Select--',  'Temporary' => 'Temporary','Permanent' => 'Permanent');
/*newarea Textfield*/
 echo form_dropdown('tyodu', $tyodu, set_value('tyodu',''),'id="tyodu" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('tyodu');
/*----End newarea Textfield----*/
 ?>
                    <label for="tyodu" class="error"></label>
                  </div>
                </div>
            
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Mode of Recruitment(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                 <?php  
$Modemdr = array('' => '--Select--', 'Special Cases' => 'Special Cases','Direct' => 'Direct', 'Direct (Ex-Serviceman)' => 'Direct (Ex-Serviceman)','Direct (Wards of Ex-Serviceman)' => 'Direct (Wards of Ex-Serviceman)', 'Direct (Wards of Police Person)' => 'Direct (Wards of Police Person)','SPO' => 'SPO', 'Direct(SPORTS)' => 'Direct(SPORTS)', 'PLI' => 'PLI', 'Court cases' => 'Court cases','Direct (Freedom Fighter)' => 'Direct (Freedom Fighter)','Other' => 'Other','Temporary' => 'Temporary');
/*newarea Textfield*/
 echo form_dropdown('Modemdr', $Modemdr, set_value('Modemdr',1),'id="Modemdr" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
$mocOther = array('type' => 'text','name' => 'mocOther','id' => 'mocOther','class' => 'form-control','placeholder' =>'Other','value' => set_value('mocOther'));
echo form_input($mocOther);
echo form_error('mocOther');
?>
                    <label for="docOther" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Date of Enlistment(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$dateofesnlistment1 = array('type' => 'text','name' => 'dateofesnlistment1','id' => 'dateofesnlistment1','class' => 'form-control','placeholder' =>'Date of Enlistment (DD/MM/YYYY)','value' => set_value('dateofesnlistment1'));
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
 echo form_dropdown('eor', $eor, set_value('eor',''),'id="eor" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor');
 ?>
                    <label for="eor" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="eors1" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$eor1 = array('' => '--Select--')+get_permanent_ranks();//, 'CT' => 'CT', 'HC' => 'HC', 'ASI' => 'ASI', 'SI' => 'SI', 'INSP' => 'INSP', 'DSP' =>'DSP', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant');
 echo form_dropdown('eor1', $eor1, set_value('eor1',''),'id="eor1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="eors2"  style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$eor2 = array('' => '--Select--')+osi_getMinisterialRanks();//, 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Junior Scale Stenographer' => 'Junior Scale Stenographer', 'Senior Scale Stenographer' => 'Senior Scale Stenographer', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('eor2', $eor2, set_value('eor2',''),'id="eor2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor2');
 ?>
                    <label for="eor2" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="eors3"  style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$eor3 = array('' => '--Select--')+osi_getMedicalRanks();//, 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('eor3', $eor3, set_value('eor3',''),'id="eor3" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="eors4"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$eor4 = array('' => '--Select--')+osi_getCLASS_IV_P_Ranks();//, 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Mechanic' => 'Mechanic', 'Electrician' => 'Electrician', 'Painter' => 'Painter','Syce' => 'Syce','Plumber'=>'Plumber');
 echo form_dropdown('eor4', $eor4, set_value('eor4',''),'id="eor4" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor4');
 ?>
                    <label for="eor4" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="eors5"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$eor5 = array('' => '--Select--')+osi_getCLASS_IV_C_Ranks();//, 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Mechanic' => 'Mechanic', 'Electrician' => 'Electrician', 'Painter' => 'Painter','Syce' => 'Syce','Plumber'=>'Plumber');
 echo form_dropdown('eor5', $eor5, set_value('eor5',''),'id="eor5" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor5');
 ?>
                    <label for="eor5" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Enlistment Category</label>
                  <div class="col-sm-9">
                 <?php  
$Enlistmentec = array('' => '--Select--', 'GEN' => 'GEN', 'SCO' => 'SCO','SCBM' => 'SCBM', 'BC' => 'BC', 'OBC' => 'OBC', 'ST' => 'ST', 'EWS' => 'EWS', 'NA' => 'NA');
 echo form_dropdown('Enlistmentec', $Enlistmentec, set_value('Enlistmentec',1),'id="Enlistmentec" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
                 $EnlistmentUnit['BOI Pb. CHG']       = 'BOI Pb. CHG';
                 $EnlistmentUnit['CPO Pb. CHG']       = 'CPO Pb. CHG';
                 $EnlistmentUnit['Other'] = 'Other';
                 $EnlistmentUnit['District'] = 'District';
/*newarea Textfield*/
 echo form_dropdown('EnlistmentUnit', $EnlistmentUnit, set_value('EnlistmentUnit',1),'id="EnlistmentUnit" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('EnlistmentUnit');
/*----End newarea Textfield----*/
?>
                    <label for="EnlistmentUnit" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="enuther" style="display: none;">
                  <label class="col-sm-3 control-label">Other(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$gpfPRAN = array('type' => 'text','name' => 'enuther','id' => 'gpfPRAN','class' => 'form-control','placeholder' =>'Other','value' => set_value('enuther'));
echo form_input($gpfPRAN);
echo form_error('enuther');
?>
                    <label for="gpfPRAN" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="enutherdistrict" style="display: none;">
                  <label class="col-sm-3 control-label">District(<span class="mandatory red">*</span>)</label>
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
                echo form_dropdown('enutherdistrict', $state, set_value('enutherdistrict',''),'id="state" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
$DateofRetirementdor = array('type' => 'text','name' => 'DateofRetirementdor','id' => 'DateofRetirementdor','class' => 'form-control','placeholder' =>'Date of Retirement (DD/MM/YYYY)','value' => set_value('DateofRetirementdor'));
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
Extension Retirement Date (DD/MM/YYYY)','value' => set_value('DateofRetirementdori'));
echo form_input($DateofRetirementdor);
echo form_error('DateofRetirementdor');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateofRetirementdor" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">GPF Pol. No</label>
                  <div class="col-sm-9">
<?php
$gpfPRAN = array('type' => 'text','name' => 'gpfPRAN','id' => 'gpfPRAN','class' => 'form-control','placeholder' =>'GPF Pol. No.','value' => set_value('gpfPRAN'));
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
$PRAN = array('type' => 'text','name' => 'PRAN','id' => 'PRAN','class' => 'form-control','placeholder' =>'PRAN No.','value' => set_value('PRAN'));
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
$hrms_code = array('type' => 'text','name' => 'hrms_code','id' => 'hrms_code','class' => 'form-control','placeholder' =>'HRMS Code','value' => set_value('hrms_code'));
echo form_input($hrms_code);
echo form_error('hrms_code');
?>
                    <label for="hrms_code" class="error"></label>
                  </div>
                </div>

          </div>
          <div id="five" class="tab-pane <?php echo getActivePageClass('present_service_detail',$selected_page); ?> ">
              <div class="form-group">
                  <label class="col-sm-3 control-label">Battalion/Unit(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
 $BattalionUnitito = array();
                 $BattalionUnitito[''] = '--Select--';
                 foreach ($uname as $value) {
                   $BattalionUnitito[$value->users_id] = $value->nick;
                 }  
                 $BattalionUnitito['District'] = 'District';
/*newarea Textfield*/
 echo form_dropdown('BattalionUnitito', $BattalionUnitito, set_value('BattalionUnitito',1),'id="BattalionUnitito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
                $districts = array();
                $districts[''] = '--Select--'; 
                foreach ($police_districts as $value) {
                $districts[$value->district_name] = $value->district_name;
                }
                ?>
                <?php  
                /*newarea Textfield*/
                echo form_dropdown('bunitdistrict', $districts, set_value('bunitdistrict',''),'id="bunitdistrict" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
                echo form_error('bunitdistrict');
                /*----End newarea Textfield----*/
              ?>
                    <label for="gpfPRAN" class="error"></label>
                  </div>
                </div>

                                <div class="form-group">
                  <label class="col-sm-3 control-label">Category of post(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--', 'Executive Staff' => 'Executive Staff', 'Ministerial Staff' => 'Ministerial Staff', 'Medical Staff' => 'Medical Staff', 'Class-IV (P)' => 'Class-IV (P)', 'Class-IV (C)' => 'Class-IV (C)');
 echo form_dropdown('RankRankre', $RankRankre, set_value('RankRankre',''),'id="RankRankre" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="exs1" style="display: none;">
                  <label class="col-sm-3 control-label">Present Rank(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--')+get_present_ranks();//, 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI','ASI/ORP' => 'ASI/ORP', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP', 'SP/CR' => 'SP/CR','HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant','DIG'=>'DIG', 'IG'=>'IG',  'ADGP'=>"ADGP",'DGP'=>'DGP');
 echo form_dropdown('catop1', $RankRankre, set_value('catop1',''),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
				 <div class="form-group" id="permanent_rank" style="display: none;">
                  <label class="col-sm-3 control-label">Permanent Rank(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--')+get_permanent_ranks();//, 'CT' => 'CT',  'HC' => 'HC',   'ASI' => 'ASI', 'SI' => 'SI', 'INSP' => 'INSP', 'DSP' =>'DSP', 'SP' => 'SP','AIG' => 'AIG', 'Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant',  'DIG'=>'DIG','IG'=>'IG', 'ADGP'=>"ADGP",'DGP'=>'DGP');
 echo form_dropdown('permanent_rank', $RankRankre, set_value('permanent_rank'),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('permanent_rank');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
                 <div class="form-group" id="MinisterialStaff1"  style="display: none;">
                  <label class="col-sm-3 control-label">Present Rank(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
            <?php  
$Ministerial = ['' => '--Select--']+osi_getMinisterialRanks();//, 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk','Steno' => 'Steno', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('catop2', $Ministerial, set_value('catop2',''),'id="Ministerial" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop2');
 ?>
                    <label for="Ministerial" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="MedicalStaff2"  style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$Medical = array('' => '--Select--')+osi_getMedicalRanks();//, 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('catop3', $Medical, set_value('catop3',''),'id="Medical" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="cl4"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf1 = array('' => '--Select--')+osi_getCLASS_IV_P_Ranks();//, 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Syce' => 'Syce');
 echo form_dropdown('catop4', $cf1, set_value('catop4',''),'id="cf1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop4');
 ?>
                    <label for="cf1" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="cl5"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf2 = array('' => '--Select--')+osi_getCLASS_IV_P_Ranks();//, 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Syce' => 'Syce');
 echo form_dropdown('catop5', $cf2, set_value('catop5',''),'id="cf2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catop5');
 ?>
                    <label for="cf2" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="cl6"  style="display: none;">
                  <label class="col-sm-3 control-label">Nature of Duty</label>
                  <div class="col-sm-9">
<?php
$cnody = array('type' => 'text','name' => 'cnody','id' => 'cnody','class' => 'form-control','placeholder' =>'Nature of Duty','value' => set_value('cnody'));
echo form_input($cnody);
echo form_error('cnody');
?>
                    <label for="Deptdn" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Dept. No.(<span class="mandatory red">*</span>)</label>
                  <div class="col-sm-9">
<?php
$Deptdn = array('type' => 'text','name' => 'Deptdn','id' => 'Deptdn','class' => 'form-control','placeholder' =>'Dept. No.','value' => set_value('Deptdn'));
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
$iIdentityCardNocn = array('type' => 'text','name' => 'iIdentityCardNocn','id' => 'iIdentityCardNocn','class' => 'form-control','placeholder' =>'Identity Card No.','value' => set_value('iIdentityCardNocn'));
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
 echo form_dropdown('catofind', $catofind, set_value('catofind',''),'id="catofind" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind');
 ?>
                    <label for="catofind" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="catofind1" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--')+get_present_ranks();//, 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP', 'SP/CR' => 'SP/CR', 'HC/LR' => 'HC/LR','HC/CR' => 'HC/CR','AIG' => 'AIG', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('catofind1', $RankRankre, set_value('catofind1',''),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="catofind2"  style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$Ministerial = array('' => '--Select--')+osi_getMinisterialRanks();//, 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Subdent-I' => 'Subdent-I','Subdent-II' => 'Subdent-II');
 echo form_dropdown('catofind2', $Ministerial, set_value('catofind2',''),'id="Ministerial" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind3');
 ?>
                    <label for="Ministerial" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="catofind3"  style="display: none;">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
            <?php  
$Medical = array('' => '--Select--')+osi_getMedicalRanks();//, 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('catofind3', $Medical, set_value('catofind3',''),'id="Medical" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="catofind4"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf1 = array('' => '--Select--')+osi_getCLASS_IV_P_Ranks();//, 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Syce' => 'Syce');
 echo form_dropdown('catofind4', $cf1, set_value('catofind4',''),'id="cf1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind4');
 ?>
                    <label for="cf1" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="catofind5"  style="display: none;">
                  <label class="col-sm-3 control-label">Trade</label>
                  <div class="col-sm-9">
            <?php  
$cf2 = array('' => '--Select--')+osi_getCLASS_IV_C_Ranks();//, 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali','Syce' => 'Syce');
 echo form_dropdown('catofind5', $cf2, set_value('catofind5',''),'id="cf2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('catofind5');
 ?>
                    <label for="cf2" class="error"></label>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Induction Mode</label>
                  <div class="col-sm-9">
                 <?php  
$InductionModeim = array('' => '--Select--', 'Transfer' => 'Transfer', 'Transfer(Promotion)' => 'Transfer(Promotion)', 'Transfer(Excess)' => 'Transfer(Excess)', 'Attachment' => 'Attachment','Transfer Pay Purpose' => 'Transfer Pay Purpose','Since Enlistment' => 'Since Enlistment','On deputation' => 'On deputation','Formal Order Not Issued' => 'Formal Order Not Issued','Not Reported' => 'Not Reported');
 echo form_dropdown('InductionModeim', $InductionModeim, set_value('InductionModeim',1),'id="InductionModeim" data-placeholder="Choose One" class="select2"'); 
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
$indictiondate = array('type' => 'text','name' => 'indictiondate','id' => 'indictiondate','class' => 'form-control','placeholder' =>'Induction Date','value' => set_value('indictiondate'));
echo form_input($indictiondate);
echo form_error('indictiondate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="indictiondate" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="prebatunit">
                  <label class="col-sm-3 control-label">Previous Battalion/Unit</label>
                  <div class="col-sm-9">
<?php
$PreviousBatalionito = array('' => '--Select--', '7-PAP' => '7-PAP','9-PAP' => '9-PAP', '13-PAP' => '13-PAP','27-PAP' => '27-PAP','36-PAP' => '36-PAP','75-PAP' => '75-PAP','80-PAP' => '80-PAP','82-PAP' => '82-PAP', 'CCR' => 'CCR', 'CR-PAP' => 'CR-PAP','RTC-PAP' => 'RTC-PAP','ISTC-KPT' => 'ISTC-KPT','CTC-PTL' => 'CTC-PTL','CSO' => 'CSO','1-CDO' => '1-CDO','2-CDO' => '2-CDO', '3-CDO' => '3-CDO', '4-CDO' => '4-CDO','5-CDO' => '5-CDO','1-IRB' => '1-IRB','2-IRB' => '2-IRB', '3-IRB' => '3-IRB', '4-IRB' => '4-IRB','5-IRB' => '5-IRB','6-IRB' => '6-IRB', '7-IRB' => '7-IRB', 'Other' => 'Other'); 
/*newarea Textfield*/
 echo form_dropdown('PreviousBatalionito', $PreviousBatalionito, set_value('PreviousBatalionito',1),'id="PreviousBatalionito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('PreviousBatalionito');
/*----End newarea Textfield----*/
?>
                    <label for="PreviousBatalionito" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="PreviousNoprnOther">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
<?php
$PreviousNoprn = array('type' => 'text','name' => 'PreviousNoprnOther','id' => 'PreviousNoprn','class' => 'form-control','placeholder' =>'','value' => set_value('PreviousNoprnOther'));
echo form_input($PreviousNoprn);
echo form_error('PreviousNoprn');
?>
                    <label for="PreviousNoprn" class="error"></label>
                  </div>
                </div>


                <div class="form-group" id="preno1">
                  <label class="col-sm-3 control-label">Previous No.</label>
                  <div class="col-sm-9">
<?php
$PreviousNoprn = array('type' => 'text','name' => 'PreviousNoprn','id' => 'PreviousNoprn','class' => 'form-control','placeholder' =>'Previous No.','value' => set_value('PreviousNoprn'));
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
$PreviousNoprn = array('type' => 'text','name' => 'gd1','id' => 'gd1','class' => 'form-control','value' => set_value('gd1'));
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
$PreviousNoprn = array('type' => 'text','name' => 'bd1','id' => 'bd1','class' => 'form-control','value' => set_value('bd1'));
echo form_input($PreviousNoprn);
echo form_error('PreviousNoprn');
?>
                    <label for="PreviousNoprn" class="error"></label>
                  </div>
                </div>
        

                <div class="form-group" id="hblock1">
                  <label class="col-sm-3 control-label">Lower School Course Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails21 = array('type' => 'text','name' => 'DateOFPromotionDetails21','id' => 'DateOFPromotionDetails21','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails21'));
echo form_input($DateOFPromotionDetails21);
echo form_error('DateOFPromotionDetails21');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails21" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="hblock2">
                  <label class="col-sm-3 control-label">Date of C-I</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails23 = array('type' => 'text','name' => 'DateOFPromotionDetails23','id' => 'DateOFPromotionDetails23','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails23'));
echo form_input($DateOFPromotionDetails23);
echo form_error('DateOFPromotionDetails23');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails23" class="error"></label>
                  </div>
                </div>


                <div class="form-group" id="hblock3">
                  <label class="col-sm-3 control-label">Date of C-II</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails24 = array('type' => 'text','name' => 'DateOFPromotionDetails24','id' => 'DateOFPromotionDetails24','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails24'));
echo form_input($DateOFPromotionDetails24);
echo form_error('DateOFPromotionDetails24');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails24" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock4">
                  <label class="col-sm-3 control-label">Date of offg. HC</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails25 = array('type' => 'text','name' => 'DateOFPromotionDetails25','id' => 'DateOFPromotionDetails25','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails25'));
echo form_input($DateOFPromotionDetails25);
echo form_error('DateOFPromotionDetails25');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails25" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock5">
                  <label class="col-sm-3 control-label">Inter Mediate School Course Passing  Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails26 = array('type' => 'text','name' => 'DateOFPromotionDetails26','id' => 'DateOFPromotionDetails26','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails26'));
echo form_input($DateOFPromotionDetails26);
echo form_error('DateOFPromotionDetails26');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails26" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock6">
                  <label class="col-sm-3 control-label">Date of List-D</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails27 = array('type' => 'text','name' => 'DateOFPromotionDetails27','id' => 'DateOFPromotionDetails27','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails27'));
echo form_input($DateOFPromotionDetails27);
echo form_error('DateOFPromotionDetails27');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails27" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock7">
                  <label class="col-sm-3 control-label">Date of List D-II</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails28 = array('type' => 'text','name' => 'DateOFPromotionDetails28','id' => 'DateOFPromotionDetails28','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails28'));
echo form_input($DateOFPromotionDetails28);
echo form_error('DateOFPromotionDetails28');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails28" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock8">
                  <label class="col-sm-3 control-label">Date of offg. ASI</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails29 = array('type' => 'text','name' => 'DateOFPromotionDetails29','id' => 'DateOFPromotionDetails29','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails29'));
echo form_input($DateOFPromotionDetails29);
echo form_error('DateOFPromotionDetails29');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails29" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock9">
                  <label class="col-sm-3 control-label">Upper School Course Passing  Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails30 = array('type' => 'text','name' => 'DateOFPromotionDetails30','id' => 'DateOFPromotionDetails30','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails30'));
echo form_input($DateOFPromotionDetails30);
echo form_error('DateOFPromotionDetails30');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails30" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock10">
                  <label class="col-sm-3 control-label">Date of List-E</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails31 = array('type' => 'text','name' => 'DateOFPromotionDetails31','id' => 'DateOFPromotionDetails31','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails31'));
echo form_input($DateOFPromotionDetails31);
echo form_error('DateOFPromotionDetails31');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails31" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="hblock11">
                  <label class="col-sm-3 control-label">Date of List E-II</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails32 = array('type' => 'text','name' => 'DateOFPromotionDetails32','id' => 'DateOFPromotionDetails32','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails32'));
echo form_input($DateOFPromotionDetails32);
echo form_error('DateOFPromotionDetails32');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails32" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock12">
                  <label class="col-sm-3 control-label">Date of Offg. SI</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails33 = array('type' => 'text','name' => 'DateOFPromotionDetails33','id' => 'DateOFPromotionDetails33','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails33'));
echo form_input($DateOFPromotionDetails33);
echo form_error('DateOFPromotionDetails33');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails33" class="error"></label>
                  </div>
                </div>


                <div class="form-group"  id="hblock13">
                  <label class="col-sm-3 control-label">Date of List F</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails34 = array('type' => 'text','name' => 'DateOFPromotionDetails34','id' => 'DateOFPromotionDetails34','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails34'));
echo form_input($DateOFPromotionDetails34);
echo form_error('DateOFPromotionDetails34');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails34" class="error"></label>
                  </div>
                </div>

<!--  <div class="form-group"  id="hblock14">
                  <label class="col-sm-3 control-label">Date of List F-II</label>
                  <div class="col-sm-9">
                  <?php
/*$LowerSchoolCourseDate35 = array('type' => 'text','name' => 'LowerSchoolCourseDate35','id' => 'LowerSchoolCourseDate35','class' => 'form-control','placeholder' =>'Date of offg. INSP','value' => set_value('LowerSchoolCourseDate35'));
echo form_input($LowerSchoolCourseDate35);
echo form_error('LowerSchoolCourseDate35');*/
?>
                
                    <label for="PromotionDetailsinm" class="error"></label>
                  </div>
                </div>  -->


                <div class="form-group"  id="hblock15">
                  <label class="col-sm-3 control-label">Date of offg. INSP</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$DateOFPromotionDetails35 = array('type' => 'text','name' => 'DateOFPromotionDetails35','id' => 'DateOFPromotionDetails35','class' => 'form-control','placeholder' =>'Date OF Promotion Details','value' => set_value('DateOFPromotionDetails35'));
echo form_input($DateOFPromotionDetails35);
echo form_error('DateOFPromotionDetails35');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DateOFPromotionDetails35" class="error"></label>
                  </div>
                </div>

          </div>
          <div id="six" class="tab-pane <?php echo getActivePageClass('basic_training_course_detail',$selected_page); ?>">
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Training Institute</label>
                  <div class="col-sm-9">
                 <?php  
$TrainingInstituteti = array('' => '--Select--', 'Deferred Basic Training Sports Person' => 'Deferred Basic Training Sports Person', 'Deferred basic training Medical Rest' => 'Deferred basic training Medical Rest', 'RTC' => 'RTC','ISTC' => 'ISTC','CTC BHG' =>'CTC BHG', 'PPA Phillaur' =>'PPA Phillaur', 'PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','CTC BHG PTL' => 'CTC BHG PTL','ISTC KPT' => 'ISTC KPT','PPA PHR.' => 'PPA PHR.','RTC BHG PTL' => 'RTC BHG PTL', 'RTC L/SGR.' => 'RTC L/SGR.', 'RTC PAP JRC' => 'RTC PAP JRC','Other' => 'Other');
 echo form_dropdown('TrainingInstituteti', $TrainingInstituteti, set_value('TrainingInstituteti',1),'id="TrainingInstituteti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('TrainingInstituteti');
 ?>
                    <label for="TrainingInstituteti" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="Othertraining1" style="display:none;">
                  <label class="col-sm-3 control-label">Other Details</label>
                  <div class="col-sm-9">
<?php
$Othertraining1 = array('type' => 'text','name' => 'Othertraining','id' => 'Othertraining','class' => 'form-control','placeholder' =>'Other Details','value' => set_value('Othertraining'));
echo form_input($Othertraining1);
echo form_error('Othertraining1');
?>
                    <label for="Othertraining" class="error"></label>
                  </div>
                </div>

               

                 

                <div class="form-group" id="Batchbn1">
                  <label class="col-sm-3 control-label">Batch Group</label>
                  <div class="col-sm-9">
<?php
$Batchbn = array('type' => 'text','name' => 'Batchbn','id' => 'Batchbn','class' => 'form-control','placeholder' =>'Batch Group','value' => set_value('Batchbn'));
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
						
						for ($i=1970; $i <= date('Y')+18 ; $i++) { 
							$years[$i] = $i;
						}
						echo form_dropdown('batchpassdate', $years, set_value('batchpassdate'),'id="TrainingInstituteti" class="select2" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
                     
   echo form_error('batchpassdate'); ?>
                  </div>
                </div>
          </div>
           <div id="seven" class="tab-pane <?php echo getActivePageClass('professional_course_detail',$selected_page); ?>">

                        <div class="input_fields_wrap">
           
                                    <div class="form-group">
                  <label class="col-sm-3 control-label">Training Institute sdfdf</label>
                  <div class="col-sm-9">
                 <?php  
$TrainingInstitutessti = array('' => '--Select--',  'RTC' => 'RTC','ISTC' => 'ISTC','CTC BHG' =>'CTC BHG', 'PPA Phillaur' =>'PPA Phillaur', 'PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','PAP Computer Cell' => 'PAP Computer Cell','Other' => 'Other');
 echo form_dropdown('TrainingInstitutessti[]', $TrainingInstitutessti, set_value('TrainingInstitutessti'),'id="TrainingInstitutessti1"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
 echo form_error('TrainingInstitutessti[0]');
 ?>
                    <label for="TrainingInstitutessti" class="error"></label>
                  </div>
                </div>

                 <div class="form-group TrainingInstitutesstiOther1" id="TrainingInstitutesstiOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
<?php
$TrainingInstitutesstiOther = array('type' => 'text','name' => 'TrainingInstitutesstiOther[]','id' => 'TrainingInstitutesstiOther','class' => 'form-control','placeholder' =>'Other','value' =>set_value('TrainingInstitutesstiOther[0]'));

echo form_input($TrainingInstitutesstiOther);
echo form_error('TrainingInstitutesstiOther[0]');
?>
                    <label for="TrainingInstitutesstiOther" class="error"></label>
                  </div>
                </div>


                <br>
 <div class="form-group" id="NamesofsCourses1">
                  <label class="col-sm-3 control-label">Name of Course</label>
                  <div class="col-sm-9">
<?php
$NamesofsCourses = array('' => '--Select--','Basic Drill Course ' => 'Basic Drill Course','Computer  Awareness Refresher Coure' => 'Computer  Awareness Refresher Coure','Basic MT Course' => 'Basic MT Course','MTO Course' => 'MTO Course','Commando Course' => 'Commando Course','Bomb Dispossal Course' => 'Bomb Dispossal Course','Armourer Course' => 'Armourer Course','Tear Gas Course' => 'Tear Gas Course','D & M Refresher Course' => 'D & M Refresher Course','Disaster Management Course' => 'Disaster Management Course', 'VIP Security Induction Course' => 'VIP Security Induction Course','Pistol Handling Course' => 'Pistol Handling Course','Capsule Course for Highway Patrolling' => 'Capsule Course for Highway Patrolling','Course on Disaster Management' => 'Course on Disaster Management','Traffic Law Enforcement & Traffic Control' => 'Highway Patrolling Training','Security Refresher Course for PSOs & Escort Staff' => 'Security Refresher Course for PSOs & Escort Staff','Re-Orientation (Police Behavior)' => 'Re-Orientation (Police Behavior)','Review of Training & Training of Trainers Course' => 'Review of Training & Training of Trainers Course','Life Style & Stress Management' => 'Life Style & Stress Management','Crowd Control Refresher Training Course' => 'Crowd Control Refresher Training Course','Ref. Course in the Handling of Security Equipment & Gadges.' => 'Ref. Course in the Handling of Security Equipment & Gadges.','Driving & Maintenance Basic Course' => 'Driving & Maintenance Basic Course','Special Coy. Refresher Course' => 'Special Coy. Refresher Course','Crash Induction trg. for specialized operation duties course.' => 'Crash Induction trg. for specialized operation duties course.','Guard duty & Fighting course and Re-Orientation Course.' => 'Guard duty & Fighting course and Re-Orientation Course.','Specialized course reg. Maintenance of Kot & Their inspection' => 'Specialized course reg. Maintenance of Kot & Their inspection','Photography cum Single Digital Course' => 'Photography cum Single Digital Course','Finger Print Proficiency Course' => 'Finger Print Proficiency Course','Emerging Trends in white coller crime &their handling by police Course' => 'Emerging Trends in white coller crime &their handling by police Course','Specialized course on Traffic Management & Traffice Control Course' => 'Specialized course on Traffic Management & Traffice Control Course','Refresher Course for Drill Instructors Course' => 'Refresher Course for Drill Instructors Course','Course on Deparmental Enquiries Course' => 'Course on Deparmental Enquiries Course','Regional Seminer on Terrorism Course' => 'Regional Seminer on Terrorism Course','Police Lines Management for Course' => 'Police Lines Management for Course','Noice Pollution and Enviroment Protection Course' => 'Noice Pollution and Enviroment Protection Course','Office Procedure of Account Matters Course' => 'Office Procedure of Account Matters Course','Investigation of Domestic Violence Course' => 'Investigation of Domestic Violence Course','Latest Court Ruling and Judgments peraining Course' => 'Latest Court Ruling and Judgments peraining Course','Social Media Management for positive police Course' => 'Social Media Management for positive police Course','An In light into the legal &Procedural Provisions Course' => 'An In light into the legal &Procedural Provisions Course','Roll of Soft Skills in Public Dealing Course' => 'Roll of Soft Skills in Public Dealing Course','Emerging Sociology Trends and Impact on Contemporary Course' => 'Emerging Sociology Trends and Impact on Contemporary Course','Capsule Course on Gender Sensitization for SPs/DSP' => 'Capsule Course on Gender Sensitization for SPs/DSP','Course on Healthy Living & Postive Thinking for Gos' => 'Course on Healthy Living & Postive Thinking for Gos','Course on Leadership and Communication Skills for SSPs/DSPs' => 'Course on Leadership and Communication Skills for SSPs/DSPs','Workshp on Police Media Interface for DSPs/Inspr.' => 'Workshp on Police Media Interface for DSPs/Inspr.','HC/PR Promoted after completeion of 16 years HC as Constable' => 'HC/PR Promoted after completeion of 16 years HC as Constable','Re-Orientation & Detective Foot Consts. Course for CTs on list C-2' => 'Re-Orientation & Detective Foot Consts. Course for CTs on list C-2','Elementry Traffic Course for Constables' => 'Elementry Traffic Course for Constables','Specialised Course for Moter Mechanics' => 'Specialised Course for Moter Mechanics','Refresher Course on operational preparedness Course' => 'Refresher Course on operational preparedness Course','PSO & Gunman Course (State level)' => 'PSO & Gunman Course (State level)','Camp security condensed Course' => 'Camp security condensed Course','Handling  & defusing of explosive and Bomp Disposal Course' => 'Handling  & defusing of explosive and Bomp Disposal Course','Ref.Course for NGOs & ORs' => 'Ref.Course for NGOs & ORs','Specialised Course reg. maintenance of Misc.' => 'Specialised Course reg. maintenance of Misc.','Specialised Course reg. maintenance of CDO Branch &its inspection Course' => 'Specialised Course reg. maintenance of CDO Branch &its inspection Course','Specialised Course reg.maintenance of OASI Branch & its inspection Course' => 'Specialised Course reg.maintenance of OASI Branch & its inspection Course','Capsule Course for telephone operators Course' => 'Capsule Course for telephone operators Course','Police Behavioural Course' => 'Police Behavioural Course', 'Short term Section Platoon commander Course' => 'Short term Section Platoon commander Course','Weapon & Tactics Course' => 'Weapon & Tactics Course','Camp Security Course' => 'Camp Security Course','Finger Print Course' => 'Finger Print Course','Gunman Course' => 'Gunman Course','Fire Fighting Course' => 'Fire Fighting Course','Refresher Course' => 'Refresher Course','Anti Roit Control Course' => 'Anti Roit Control Course','Photography-Cum-single digit course' => 'Photography-Cum-single digit course','Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs' => 'Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs','Fleet Management course for NGO' => 'Fleet Management course for NGO','PSO Gunman Refresher Course' => 'PSO Gunman Refresher Course','Bugler Course' => 'Bugler Course','Rotational Course' => 'Rotational Course','National Disaster Response Force (NDRF)' => 'National Disaster Response Force (NDRF)','Anti Sabotage Course' => 'Anti Sabotage Course','Unmanned Aircraft Vehicle (UAV)' => 'Unmanned Aircraft Vehicle (UAV)','Weapon Instructor Training Course' => 'Weapon Instructor Training Course','Platoon Saction Commander Course' => 'Platoon Saction Commander Course','Basic MFR/CSSR Course' => 'Basic MFR/CSSR Course','Company Refresher Course' => 'Company Refresher Course','Feild Craft Course' => 'Feild Craft Course','Pre-Induction Course' => 'Pre-Induction Course','Maintenance of Roznamcha Course' => 'Maintenance of Roznamcha Course');

 echo form_dropdown('NamesofsCourses[]', $NamesofsCourses, set_value('NamesofsCourses',''),'id="NamesofsCourses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('NamesofsCourses[0]');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>



                           <div class="form-group" id="DurationsofsCourses1">
                  <label class="col-sm-3 control-label">Duration of Course start date</label>
                  <div class="col-sm-9">
<?php

$DurationsofsCourses = array('type' => 'text','name' => 'DurationsofsCourses[]','id' => 'tags2','class' => 'form-control','placeholder' =>'From','value' => set_value('DurationsofsCourses[0]'));
echo form_input($DurationsofsCourses);
echo form_error('DurationsofsCourses[0]');
?>
                    <label for="DurationsofsCourses" class="error"></label>
            
                  </div>
                </div>

          

                <div class="form-group" >
                 <label class="col-sm-3 control-label">Duration of Course End date</label>
                   <div class="col-xs-9">
<?php
$DurationsofsCoursest = array('type' => 'text','name' => 'DurationsofsCoursest[]','id' => 'tags3','class' => 'form-control','placeholder' =>'To','value' => set_value('DurationsofsCoursest[0]'));
echo form_input($DurationsofsCoursest);
echo form_error("DurationsofsCoursest[0]");
?>
                    <label for="DurationsofsCoursest" class="error"></label>
                    </div>
                    </div><hr/>


                    <a href="#" class="add_field_button"> <i class="fa fa-plus"></i> Add More</a>
                </div>
           </div>

           <div id="eight" class="tab-pane <?php echo getActivePageClass('annual_firing_practice',$selected_page); ?>"> 
             <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Range</label>
                  <div class="col-sm-9">
<?php
$NameofsRanges = array('type' => 'text','name' => 'NameofsRanges','id' => 'NameofsRanges','class' => 'form-control','placeholder' =>'Name of Range','value' => set_value('NameofsRanges'));
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
$dateofprcatice = array('type' => 'text','name' => 'dateofprcatice','id' => 'dateofprcatice','class' => 'form-control','placeholder' =>'Date of Practice','value' => set_value('dateofprcatice'));
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
                    $tow[$value->arm] = $value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('tow', $tow, set_value('tow',''),'id="tow" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('tow');
/*----End newarea Textfield----*/
 ?>
                    <label for="belt" class="error"></label>
                  </div>
                </div>

           </div>

           <div id="nine" class="tab-pane"> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Latest Annual Medical Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$LatestAnnualMedicalDate = array('type' => 'text','name' => 'LatestAnnualMedicalDate','id' => 'LatestAnnualMedicalDate','class' => 'form-control','placeholder' =>'Latest Annual Medical Date','value' => set_value('LatestAnnualMedicalDate'));
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
 echo form_dropdown('PresentHealthStatus', $PresentHealthStatus, set_value('PresentHealthStatus',1),'id="PresentHealthStatus" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('PresentHealthStatus');
 ?>
                    <label for="PresentHealthStatus" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="ChronicDiseaseDetails1" style="display:none;">
                  <label class="col-sm-3 control-label">Chronic Disease Details</label>
                  <div class="col-sm-9">
<?php
$ChronicDiseaseDetails = array('type' => 'text','name' => 'ChronicDiseaseDetails','id' => 'ChronicDiseaseDetails','class' => 'form-control','placeholder' =>'Details','value' => set_value('ChronicDiseaseDetails'));
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
$MiscDetails = array('type' => 'text','name' => 'MiscDetails','id' => 'MiscDetails','class' => 'form-control','placeholder' =>'Details','value' => set_value('MiscDetails'));
echo form_input($MiscDetails);
echo form_error('MiscDetails');
?>
                    <label for="MiscDetails" class="error"></label>
                  </div>
                </div>

           </div>

           <div id="ten" class="tab-pane <?php echo getActivePageClass('permanent_rank',$selected_page); ?>">
            <div class="form-group">
                  <label class="col-sm-3 control-label">Select Position </label>
                  <div class="col-sm-9">
                  <?php  
$orderby = array('' => '--Select--','1' => 'Commandant','2' => 'AIG', '3' =>'Asst. Commandant', '4' => 'SP',  '5' => 'SP/CR', '6' =>'DSP', '7' => 'DSP/CR', '8' => 'INSP', '9' => 'INSP/LR', '10' => 'INSP/CR', '11' => 'SI', '12' => 'ASI','13' => 'HC', '14' => 'CT', '15' => 'Supdt Grade-I', '16' => 'Supdt Grade-II', '17' => 'Senior Asstt.', '18' => 'Junior Asstt', '19' => 'Clerk', '20' => 'Steno', '21' => 'Peon', '22' => 'Daftari', '23' => 'Doctor' ,'24' => 'Pharmacist', '25' => 'Physiotherapist' ,'26' => 'Lab Technician', '27' => 'Nursing Asstt.' ,'28' => 'Cook', '29' => 'Water Carrier' ,'30' => 'Sweeper', '31' => 'Dhobi' ,'32' => 'Mochi' ,'33' => 'Barber'  ,'34' => 'Tailor' ,'35' => 'Carpenter' ,'36' => 'Mason'  ,'37' => 'Mali', '38' => 'Syce');
 echo form_dropdown('orderby', $orderby, set_value('orderby',''),'id="orderby" data-placeholder="Choose One" class="select2"'); 
 echo form_error('orderby');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

           </div>
        </div>
              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href=""  class="btn btn-default">Reset</a>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.tagsinput.min.js"></script>

<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),jQuery('#indictiondate').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#batchpassdate').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#dateofprcatice').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#DateofCommencingdoc').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#DurationsofsCourses').datepicker({dateFormat: "dd/mm/yy"});  jQuery('#DurationsofsCoursest').datepicker({dateFormat: "dd/mm/yy"});  jQuery('#LatestAnnualMedicalDate').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#DateOFPromotionDetails').datepicker({dateFormat: "dd/mm/yy"}); 
  jQuery('#dateofesnlistment1').datepicker({dateFormat: "dd/mm/yy"});   jQuery('#DateofRetirementdor').datepicker({dateFormat: "dd/mm/yy"}); 
  jQuery('#eDateofRetirementdor').datepicker({dateFormat: "dd/mm/yy"}); 
  jQuery('#tags2').datepicker({dateFormat: "dd/mm/yy"}); 
  jQuery('#tags3').datepicker({dateFormat: "dd/mm/yy"}); 

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
 jQuery('#datetimepicker1').datepicker({dateFormat: "dd/mm/yy"});

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
   }else if(this.value == 'Law & Order Duty'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').show();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
     $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }else if(this.value == 'Special Squads'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').show();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
     $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }else if(this.value == 'Permanent Attachment'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').show();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
     $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }else if(this.value == 'Training'){
    $('#ug').hide();
   }else if(this.value == 'Sports'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').show();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }else if(this.value == 'Available with BNs'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').show();
     $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').hide();   
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }else if(this.value == 'Battalion Misc Duties'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').show();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }else if(this.value == 'Institutions'){
    $('#fone1,#fone2,#fone3,#fone4,#fone5,#fone6,#fone7,#fone8,#fone9,#fone10,#fone11,#fone12').hide();
    $('#lone1,#lone2,#lone3').hide();
    $('#sqone1,#sqone2,#sqone3,#sqone4,#sqone5,#sqone6').hide();
    $('#paone1,#paone2,#paone3,#paone4,#paone5,#paone6,#paone7,#paone8,#paone9,#paone10,#paone11,#paone12,#paone13,#paone14,#paone15,#paone16,#paone17,#paone18,#paone19,#paone20,#paone21,#paone22').hide();
    $('#ssone23,#ssone24,#ssone25,#ssone26').hide();
    $('#awbone1,#awbone2,#awbone3,#awbone4,#awbone5,#awbone6,#awbone7,#awbone8,#awbone9,#awbone10,#awbone11,#awbone12,#awbone13,#awbone14').hide();
    $('#bmdone1,#bmdone2,#bmdone3,#bmdone4,#bmdone5,#bmdone6,#bmdone7,#bmdone8,#bmdone9').show();
    $('#instone1,#instone2,#instone3,#instone4,#instone5,#instone6').hide();
   }
});

    
   $(document).on('change', '#stts', function() {
	   $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
	   $('#docOther1').hide();
	   $('#docb').hide();
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
   }else if(this.value == 'Other'){
    $('#docOther1').show();
    $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
   }else{
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
     $('#TrainingInstitutesstiOther1').show();
   }else if(this.value == 'Deferred Basic Training Sports person'){
    $('#NamesofsCourses1').hide();
    $('#DurationsofsCourses1').hide(); 
    $('#TrainingInstitutesstiOther1').hide();
   }else if(this.value == 'Deferred basic training Medical Rest'){
     $('#NamesofsCourses1').hide();
    $('#DurationsofsCourses1').hide();     
    $('#TrainingInstitutesstiOther1').hide();
   }
   else{
    $('#TrainingInstitutesstiOther1').hide();
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
   }else if(this.value == 'Asst. Commandant office'){
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
	 var training_institute = $('#TrainingInstituteti').val();
	 if(training_institute == 'Deferred Basic Training Sports Person'){   
     $('#DateofCommencingdoc1').hide();
     $('#Batchbn1').hide();
     $('#batchpassdate1').hide();
     $('#Othertraining1').hide();
   }else if(training_institute == 'Deferred basic training Medical Rest'){  
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
    $('#listing2').css('display','none');
});
$(document).ready(function(){
	var status = $("input[name='peradd']:checked").val()
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
    $('#listing2').css('display','inline');    

});

  $("#state").change(function(){
    var state = $("#state").val();
    var dataStrings = 'state='+ state;
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>getDistrictsAjax",
        data: dataStrings,
        dataType :'json',
        //contentType :'application/json',
        cache: false,
        success: function(districts){
          console.log(districts);
          var id = 'dis';
          $('#'+id).empty();
          var newOption = new Option("--Select District--", '');
          $('#'+id).append(newOption);
          $.each(districts,function(k,val){
            var newOption = new Option(val, val, false, false);
            $('#'+id).append(newOption);
          });
          $('#'+id).trigger('change');
        }      
      });

   });
   $(document).ready(function(){
		var state = $("#state").val();
		var district = '';
		<?php
		if(null!=$this->input->post('dis')){
			$district = $this->input->post('dis');
			?> district = '<?php echo $district; ?>';
		<?php
		}
		?>
		
		if(state!=''){
			var dataStrings = 'state='+ state;
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>getDistrictsAjax",
				data: dataStrings,
        dataType:'json',
				cache: false,
				success: function(districts){
					console.log(districts);
          var id = 'dis';
          $('#'+id).empty();
          var newOption = new Option("--Select District--", '');
          $('#'+id).append(newOption);
          $.each(districts,function(k,val){
            var newOption = new Option(val, val, false, false);
            $('#'+id).append(newOption);
          });
          
					//$("#listing2").css('display','inline');
					$('#pdistrict').val(district1);
          
					$('#dis').val(district);
          $('#'+id).trigger('change');
				}  
			});
		}
		
		var postate = $("#postate").val();
		var district1 = '';
		<?php
		if(null!=$this->input->post('pdistrict')){
			$district1 = $this->input->post('pdistrict');
			?> district1 = '<?php echo $district1; ?>';
		<?php
		}
		?>
		if(postate!=''){
			var dataStrings = 'postate='+ postate;
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>getDistrictsAjaxPa",
				data: dataStrings,
        dataType:'json',
				cache: false,
				success: function(districts){
					console.log(districts);
          var id = 'pdistrict';
          $('#'+id).empty();
          var newOption = new Option("--Select District--", '');
          $('#'+id).append(newOption);
          $.each(districts,function(k,val){
            var newOption = new Option(val, val, false, false);
            $('#'+id).append(newOption);
          });
          
					//$("#listing2").css('display','inline');
					$('#pdistrict').val(district1);
          $('#'+id).trigger('change');
				}  

			});
		}
   });

  $("#postate").change(function(){
    var postate = $("#postate").val();
    var dataStrings = 'postate='+ postate;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>getDistrictsAjaxPa",
    data: dataStrings,
    dataType : 'json',
    cache: false,
    success: function(districts){
      console.log(districts);
          var id = 'pdistrict';
          $('#'+id).empty();
          var newOption = new Option("--Select District--", '');
          $('#'+id).append(newOption);
          $.each(districts,function(k,val){
            var newOption = new Option(val, val, false, false);
            $('#'+id).append(newOption);
          });
          $('#'+id).trigger('change');
    }  
      
    });

    });

 // $('#datetimepicker1').datetimepicker();


     $(document).on('change', '#EnlistmentUnit', function() {
      if(this.value == 'Other'){
     $('#enOther1').show();
   }else if(this.value == 'District'){
    $('#enutherdistrict').show(); 
   }else{
    $('#enOther1').hide();
   }
  
});
$(document).ready(function(){
	$('#enuther').hide();
	$('#enutherdistrict').hide();
	var enlistment_unit = $('#EnlistmentUnit').val();
	if(enlistment_unit=='Other'){
		$('#enuther').show();
	}else if(enlistment_unit=='District'){
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
$(document).ready(function(){
	$('#buOther1').hide();
	$('#bunitdistrict').hide();
	var BattalionUnitito = $('#BattalionUnitito').val();
	if(BattalionUnitito=='Other'){
		$('#buOther1').show();
	}else if(BattalionUnitito=='District'){
		$('#bunitdistrict').show(); 
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


             $(document).on('change', '#EnlistmentUnit', function() {
      if(this.value == 'Other'){
     $('#enuther').show();
   }else{
    $('#enuther').hide();
   }
  
});

$(document).ready(function(){
	var rank__ = $('#eor').val();
	if(rank__ == 'Executive Staff'){
     $('#eors1').show();
     $('#eors2').hide();
     $('#eors3').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   } else if(rank__== 'Medical Staff'){
     $('#eors3').show();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(rank__ == 'Ministerial Staff'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').show();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(rank__ == 'Class-IV (P)'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').show();
      $('#eors5').hide();
   }else if(rank__ == 'Class-IV (C)'){
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
  
$(document).ready(function(){
	var staff= $('#RankRankre').val();
	if(staff == 'Executive Staff'){
     $('#exs1').show();
     $('#permanent_rank').show();
     $('#MedicalStaff2').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
      
      $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction,#prebatunit,#preno1').show();
   } else if(staff == 'Medical Staff'){
     $('#MedicalStaff2').show();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
      $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction,#prebatunit,#preno1').hide();
      
   }else if(staff == 'Ministerial Staff'){
     $('#MinisterialStaff1').show();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
       $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#preno1').hide();
   }else if(staff == 'Class-IV (P)'){
     $('#cl4,#prebatunit,#preno1').show();
        $('#MedicalStaff2').hide();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
      $('#cl5').hide();
      $('#cl6').show();
   $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction').hide();
   }else if(staff == 'Class-IV (C)'){
     $('#cl5,#cl6,#prebatunit,#preno1').show();
     $('#MinisterialStaff1').hide();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
      $('#cl4').hide();
       $('#exs1').hide();
             $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction').hide();
   }else{
    $('#exs1').hide();
	$('#permanent_rank').hide();
    $('#MedicalStaff2').hide();
    $('#MinisterialStaff1').hide();
    $('#cl4').hide();
    $('#cl5').hide();
    $('#cl6').hide();
   }
});

  $(document).on('change', '#RankRankre', function() {
      if(this.value == 'Executive Staff'){
     $('#exs1').show();
     $('#permanent_rank').show();
     $('#MedicalStaff2').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
      
      $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction,#prebatunit,#preno1').show();
   } else if(this.value == 'Medical Staff'){
     $('#MedicalStaff2').show();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
     $('#MinisterialStaff1').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
      $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction,#prebatunit,#preno1').hide();
      
   }else if(this.value == 'Ministerial Staff'){
     $('#MinisterialStaff1').show();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
      $('#cl4').hide();
      $('#cl5').hide();
      $('#cl6').hide();
       $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#preno1').hide();
   }else if(this.value == 'Class-IV (P)'){
     $('#cl4,#prebatunit,#preno1').show();
        $('#MedicalStaff2').hide();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
      $('#cl5').hide();
      $('#cl6').show();
   $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction').hide();
   }else if(this.value == 'Class-IV (C)'){
     $('#cl5,#cl6,#prebatunit,#preno1').show();
     $('#MinisterialStaff1').hide();
      $('#MedicalStaff2').hide();
     $('#exs1').hide();
	 $('#permanent_rank').hide();
      $('#cl4').hide();
       $('#exs1').hide();
             $('#hblock1,#hblock2,#hblock3,#hblock4,#hblock5,#hblock6,#hblock7,#hblock8,#hblock9,#hblock10,#hblock11,#hblock12,#hblock13,#hblock14,#hblock15,#cattoinduction').hide();
   }else{
    $('#exs1').hide();
	$('#permanent_rank').hide();
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

$(document).on('change', '#PreviousBatalionito', function() { 
  if(this.value == 'Other'){   
     $('#PreviousNoprnOther').show();
   }
   else{
     $('#PreviousNoprnOther').hide();
   }
});

$(document).on('change', '#nat', function() { 
  if(this.value == 'Nepal'){   
     $('#sntas').show();
     $('#states').hide();
   }
   else if(this.value == 'Indian'){   
     $('#sntas').hide();
      $('#states').show();
   }
});






});
$(document).ready(function() { 
	var nationality = $('#nat').val();
  if(nationality == 'Nepal'){   
     $('#sntas').show();
     $('#states').hide();
   }
   else if(nationality == 'Indian'){   
     $('#sntas').hide();
      $('#states').show();
   }
   var class_ = $('#stts').val();
   switch(class_) {
	   case 'Illiterate':
	   case 'Under Matric':
	   case '10th':
	   case 'H. Sec':
	   case 'Prep':
	   case '10+1':
	   case '10+2':
			break;
	   case 'Under Graduate':
			$('#ugb').css('display','block');
			break;
	   case 'Graduate':
			$('#gb').css('display','block');
			break;
	   case 'Post Graduate':
			$('#pgb').css('display','block');
			break;
	   case 'Doctorate':
			$('#docb').css('display','block');
			break;
	   case 'Other':
			$('#docOther1').css('display','block');
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
            $(wrapperi).append('<div class="form-group"><label class="col-sm-3 control-label">Training Institute</label><div class="col-sm-9"><select name="TrainingInstitutessti[]" id="TrainingInstitutessti" data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"><option value="" selected="selected">--Select--</option><option value="" selected="selected">--Select--</option><option value="Basic Drill Course ">Basic Drill Course</option><option value="Computer  Awareness Refresher Coure">Computer  Awareness Refresher Coure</option><option value="Basic MT Course">Basic MT Course</option><option value="MTO Course">MTO Course</option><option value="Commando Course">Commando Course</option><option value="Bomb Dispossal Course">Bomb Dispossal Course</option><option value="Armourer Course">Armourer Course</option><option value="Tear Gas Course">Tear Gas Course</option><option value="D &amp; M Refresher Course">D &amp; M Refresher Course</option><option value="0"></option><option value="VIP Security Induction Course">VIP Security Induction Course</option><option value="Pistol Handling Course">Pistol Handling Course</option><option value="Capsule Course for Highway Patrolling">Capsule Course for Highway Patrolling</option><option value="Course on Disaster Management">Course on Disaster Management</option><option value="Traffic Law Enforcement &amp; Traffic Control">Highway Patrolling Training</option><option value="Security Refresher Course for PSOs &amp; Escort Staff">Security Refresher Course for PSOs &amp; Escort Staff</option><option value="Re-Orientation (Police Behavior)">Re-Orientation (Police Behavior)</option><option value="Review of Training &amp; Training of Trainers Course">Review of Training &amp; Training of Trainers Course</option><option value="Life Style &amp; Stress Management">Life Style &amp; Stress Management</option><option value="Crowd Control Refresher Training Course">Crowd Control Refresher Training Course</option><option value="Ref. Course in the Handling of Security Equipment &amp; Gadges.">Ref. Course in the Handling of Security Equipment &amp; Gadges.</option><option value="Driving &amp; Maintenance Basic Course">Driving &amp; Maintenance Basic Course</option><option value="Special Coy. Refresher Course">Special Coy. Refresher Course</option><option value="Crash Induction trg. for specialized operation duties course.">Crash Induction trg. for specialized operation duties course.</option><option value="Guard duty &amp; Fighting course and Re-Orientation Course.">Guard duty &amp; Fighting course and Re-Orientation Course.</option><option value="Specialized course reg. Maintenance of Kot &amp; Their inspection">Specialized course reg. Maintenance of Kot &amp; Their inspection</option><option value="Photography cum Single Digital Course">Photography cum Single Digital Course</option><option value="Finger Print Proficiency Course">Finger Print Proficiency Course</option><option value="Emerging Trends in white coller crime &amp;their handling by police Course">Emerging Trends in white coller crime &amp;their handling by police Course</option><option value="Specialized course on Traffic Management &amp; Traffice Control Course">Specialized course on Traffic Management &amp; Traffice Control Course</option><option value="Refresher Course for Drill Instructors Course">Refresher Course for Drill Instructors Course</option><option value="Course on Deparmental Enquiries Course">Course on Deparmental Enquiries Course</option><option value="Regional Seminer on Terrorism Course">Regional Seminer on Terrorism Course</option><option value="Police Lines Management for Course">Police Lines Management for Course</option><option value="Noice Pollution and Enviroment Protection Course">Noice Pollution and Enviroment Protection Course</option><option value="Office Procedure of Account Matters Course">Office Procedure of Account Matters Course</option><option value="Investigation of Domestic Violence Course">Investigation of Domestic Violence Course</option><option value="Latest Court Ruling and Judgments peraining Course">Latest Court Ruling and Judgments peraining Course</option><option value="Social Media Management for positive police Course">Social Media Management for positive police Course</option><option value="An In light into the legal &amp;Procedural Provisions Course">An In light into the legal &amp;Procedural Provisions Course</option><option value="Roll of Soft Skills in Public Dealing Course">Roll of Soft Skills in Public Dealing Course</option><option value="Emerging Sociology Trends and Impact on Contemporary Course">Emerging Sociology Trends and Impact on Contemporary Course</option><option value="Capsule Course on Gender Sensitization for SPs/DSP">Capsule Course on Gender Sensitization for SPs/DSP</option><option value="Course on Healthy Living &amp; Postive Thinking for Gos">Course on Healthy Living &amp; Postive Thinking for Gos</option><option value="Course on Leadership and Communication Skills for SSPs/DSPs">Course on Leadership and Communication Skills for SSPs/DSPs</option><option value="Workshp on Police Media Interface for DSPs/Inspr.">Workshp on Police Media Interface for DSPs/Inspr.</option><option value="HC/PR Promoted after completeion of 16 years HC as Constable">HC/PR Promoted after completeion of 16 years HC as Constable</option><option value="Re-Orientation &amp; Detective Foot Consts. Course for CTs on list C-2">Re-Orientation &amp; Detective Foot Consts. Course for CTs on list C-2</option><option value="Elementry Traffic Course for Constables">Elementry Traffic Course for Constables</option><option value="Specialised Course for Moter Mechanics">Specialised Course for Moter Mechanics</option><option value="Refresher Course on operational preparedness Course">Refresher Course on operational preparedness Course</option><option value="PSO &amp; Gunman Course (State level)">PSO &amp; Gunman Course (State level)</option><option value="Camp security condensed Course">Camp security condensed Course</option><option value="Handling  &amp; defusing of explosive and Bomp Disposal Course">Handling  &amp; defusing of explosive and Bomp Disposal Course</option><option value="Ref.Course for NGOs &amp; ORs">Ref.Course for NGOs &amp; ORs</option><option value="Specialised Course reg. maintenance of Misc.">Specialised Course reg. maintenance of Misc.</option><option value="Specialised Course reg. maintenance of CDO Branch &amp;its inspection Course">Specialised Course reg. maintenance of CDO Branch &amp;its inspection Course</option><option value="Specialised Course reg.maintenance of OASI Branch &amp; its inspection Course">Specialised Course reg.maintenance of OASI Branch &amp; its inspection Course</option><option value="Capsule Course for telephone operators Course">Capsule Course for telephone operators Course</option><option value="Police Behavioural Course">Police Behavioural Course</option><option value="Short term Section Platoon commander Course">Short term Section Platoon commander Course</option><option value="Weapon &amp; Tactics Course">Weapon &amp; Tactics Course</option><option value="Camp Security Course">Camp Security Course</option><option value="Finger Print Course">Finger Print Course</option><option value="Gunman Course">Gunman Course</option><option value="Fire Fighting Course">Fire Fighting Course</option><option value="Refresher Course">Refresher Course</option><option value="Anti Roit Control Course">Anti Roit Control Course</option><option value="Photography-Cum-single digit course">Photography-Cum-single digit course</option><option value="Sanstization &amp; Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs">Sanstization &amp; Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs</option><option value="Fleet Management course for NGO">Fleet Management course for NGO</option><option value="PSO Gunman Refresher Course">PSO Gunman Refresher Course</option></select><label for="NamesofsCourses" class="error"></label></div></div><div class="form-group" id="DurationsofsCourses1"><label class="col-sm-3 control-label">Duration of Course start date</label><div class="col-sm-9"><input name="DurationsofsCourses[]" id="tags2" class="form-control valid" placeholder="From" type="text"><label for="DurationsofsCourses" class="error"></label></div></div><div class="form-group"><label class="col-sm-3 control-label">Duration of Course End date</label><div class="col-xs-9"><input name="DurationsofsCoursest[]" id="tags3" class="form-control" placeholder="To" type="text"><label for="DurationsofsCoursest" class="error"></label></div><br/></div><div class="form-group TrainingInstitutesstiOther1" id="TrainingInstitutesstiOther1" style=""><label class="col-sm-3 control-label">Other</label><div class="col-sm-9"><input name="TrainingInstitutesstiOther[]" value="" id="TrainingInstitutesstiOther" class="form-control" placeholder="Other" type="text"><label for="TrainingInstitutesstiOther" class="error"></label></div><a href="#" class="remove_fieldi");">Remove</a></div>'); //add input box
        }
    });
   
    $(wrapperi).on("click",".remove_fieldi", function(e){ //user click on remove text
        if
(confirm('Do you want to remove?')){
             e.preventDefault(); $(this).parent('div').remove(); x--;
           }
        
    })
});
function setPage(name){
	$('#page_name').val(name);
}
$(document).ready(function(){
	var pcd_ = 0;
	var pcd = $('#TrainingInstitutessti').val();
	if(pcd=='Other'){
		$('#TrainingInstitutesstiOther1').css('display','inline');
	}
  $('#BattalionUnitito>option[value=92]').attr('disabled','disabled');
  $('#BattalionUnitito>option[value=94]').attr('disabled','disabled');
});
function selectParentDuty2(){
	$('#exampleModal2').modal('toggle');
}
</script>
</body>
</html>
