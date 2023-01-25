<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> OSI Module</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
    <style type="text/css">
    .cur{
      cursor: pointer;
    }
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
      <h3>&nbsp; &nbsp; &nbsp; OSI Module <?php if($name!=''){ echo $name->nick; } ?></h3>
      
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
       <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>
    <div class="panel panel-default">
          <div class="panel-heading">
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
      'method' => 'get'
      );
 echo form_open_multipart("", $attributes);
?>
          <div class="row">

          <div class="col-sm-3"><div class="form-group">
                         <?php  
                    $ito = array();
                 $ito[''] = '--Battalion--';
                 foreach ($uname as $value) {
                  if($value->users_id == 91 || $value->users_id == 92 || $value->users_id == 93  || $value->users_id == 94  || $value->users_id == 95){
                   
                 }elseif($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
                    $ito[192] = '1-IRB';
                    $ito[167] = '2-IRB';
                    $ito[156] = '3-IRB';
                    $ito[115] = '4-IRB';
                    $ito[110] = '5-IRB';
                    $ito[162] = '6-IRB';
                    $ito[123] = '7-IRB';
                  }elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
                    $ito[100] = '1-CDO';
                    $ito[174] = '2-CDO';
                    $ito[144] = '3-CDO';
                    $ito[150] = '4-CDO';
                    $ito[180] = '5-CDO';
                    $ito[198] = 'CTC BHG';
                  }else{
                    $ito[$value->users_id] = $value->nick;
                  } 
                  }
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',(isset($_GET['ito'])) ? $_GET['ito'] : ''),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
 <div class="col-sm-3"><div class="form-group">
<?php
$name = array('type' => 'text','name' => 'name','id' => 'name','class' => 'form-control','placeholder' =>'Offical Name','value' => (isset($_GET['name'])) ? $_GET['name'] : '');
echo form_input($name);
echo form_error('name');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>
                
                  <div class="col-sm-3"><div class="form-group">
<?php
$bloodgroup = array('' => '--Blood Group--',  'A+VE' => 'A+VE', 'A-VE' => 'A-VE', 'AB+VE' => 'AB+VE', 'AB-VE' => 'AB-VE', 'B+VE' => 'B+VE', 'B-VE' => 'B-VE','O+VE' => 'O+VE', 'O-VE' => 'O-VE');
/*newarea Textfield*/
 echo form_dropdown('bloodgroup', $bloodgroup,set_value('bloodgroup',(isset($_GET['bloodgroup'])) ? $_GET['bloodgroup'] : ''),'id="bloodgroup" data-placeholder="Choose One" class="select2"'); 
 echo form_error('bloodgroup');
?>
                    <label for="bloodgroup" class="error"></label>
                  </div>
                </div>

                   
                   <div class="col-sm-3"> <div class="form-group">
<?php
$rcnum = array('type' => 'text','name' => 'rcnum','id' => 'rcnum','class' => 'form-control','placeholder' =>'Dept No.','value' => (isset($_GET['rcnum'])) ? $_GET['rcnum'] : '');
echo form_input($rcnum);
echo form_error('rcnum');
?>
                    <label for="rcnum" class="error"></label>
                  </div>
                </div>
                         


                </div><br/>

                  <div class="row">

                  <div class="col-sm-3"><div class="form-group">
                 
            <?php  
$RankRankre = array('' => '--Staff Category--', 'Executive Staff' => 'Executive Staff', 'Ministerial Staff' => 'Ministerial Staff', 'Medical Staff' => 'Medical Staff', 'Class-IV (P)' => 'Class-IV (P)', 'Class-IV (C)' => 'Class-IV (C)');
 echo form_dropdown('RankRankre', $RankRankre,  set_value('RankRankre',(isset($_GET['RankRankre'])) ? $_GET['RankRankre'] : ''),'id="RankRankre" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
 ?>
                    <label for="eor" class="error"></label>
                  </div>
                </div>

                       <div class="col-sm-3"  id="eors1"><div class="form-group">
            <?php  
$eor1 = array('' => '--Rank/Trade--', 'CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'HC/LR' => 'HC/LR','HC/CR' => 'HC/CR', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI','ASI/ORP' => 'ASI/ORP', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','AIG' => 'AIG','SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('eor1', $eor1, set_value('eor1',(isset($_GET['eor1'])) ? $_GET['eor1'] : ''),'id="eor1" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"  id="eors2" style="display: none;"><div class="form-group">
                
            <?php  
$eor2 = array('' => '--Rank/Trade--', 'Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('eor2', $eor2, set_value('eor2',(isset($_GET['eor2'])) ? $_GET['eor2'] : ''),'id="eor2" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor2');
 ?>
                    <label for="eor2" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"  id="eors3" style="display: none;"><div class="form-group">
                
            <?php  
$eor3 = array('' => '--Rank/Trade--', 'Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('eor3', $eor3, set_value('eor3',(isset($_GET['eor3'])) ? $_GET['eor3'] : ''),'id="eor3" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"  id="eors4" style="display: none;"><div class="form-group">
                
            <?php  
$eor4 = array('' => '--Rank/Trade--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('eor4', $eor4, set_value('eor4',(isset($_GET['eor4'])) ? $_GET['eor4'] : ''),'id="eor4" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor4');
 ?>
                    <label for="eor4" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"  id="eors5" style="display: none;"><div class="form-group">
                
            <?php  
$eor5 = array('' => '--Rank/Trade--', 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('eor5', $eor5, set_value('eor5',(isset($_GET['eor5'])) ? $_GET['eor5'] : ''),'id="eor5" data-placeholder="Choose One" class="select2"'); 
 echo form_error('eor5');
 ?>
                    <label for="eor5" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"> <div class="form-group">

                       <?php 
                 $postate = array();
                  $postate[''] = '--State--'; 
                 foreach ($statelist as $value) {
                   $postate[$value->state] = $value->state;
                 }

 ?>
            <?php  
/*newarea Textfield*/
 echo form_dropdown('postate', $postate, set_value('postate',(isset($_GET['postate'])) ? $_GET['postate'] : ''),'id="postate" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('postate');
/*----End newarea Textfield----*/
 ?>
                    <label for="postate" class="error"></label>
                  </div>
                </div>


              <div class="col-sm-3"><div class="form-group"><select name="pcity"  id="dis" data-placeholder="City" title="Please select at least 1 value" class="form-control">';
              <option value=''>--District--</option>
                </select></div></div>
      

                 <div id="listing2"></div>


              
                 

                 </div>

                        <br/><div class="row">


                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$stts = array('' => '--Education--',  'Illiterate' => 'Illiterate', 'Under Matric' => 'Under Matric', '10th' => '10th', 'H. Sec' => 'H. Sec', 'Prep' => 'Prep', '10+1' => '10+1','10+2' =>'10+2','Under Graduate' => 'Under Graduate', 'Graduate' => 'Graduate', 'Post Graduate' => 'Post Graduate','Doctorate' => 'Doctorate','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('stts', $stts,set_value('stts',(isset($_GET['stts'])) ? $_GET['stts'] : ''),'id="stts" data-placeholder="Choose One" class="select2"'); 
 echo form_error('stts');
/*----End newarea Textfield----*/
 ?>
                    <label for="stts" class="error"></label>
                  </div>
                </div>   

 <div class="col-sm-3" id="ugb" >
<div class="form-group" >
                 
                 <?php  
$UnderGraduate = array('' => '--Edu Qualified--', 'BA-I' => 'BA-I', 'BA-II' => 'BA-II', 'BSc-I' => 'BSc-I', 'BSc-II' => 'BSc-II','BSc .IT-I' => 'BSc .IT-I', 'BSc .IT-II' => 'BSc .IT-II', 'Bcom-I' => 'Bcom-I','Bcom-II' => 'Bcom-II','BCA-I' =>'BCA-I','BCA-II' =>'BCA-II','BBA-I' => 'BBA-I','BBA-II' => 'BBA-II','LLB-I' => 'LLB-I','LLB-II' => 'LLB-II','B.Tech-I' => 'B.Tech-I', 'B.Tech-II' => 'B.Tech-II', 'B.Tech-III' => 'B.Tech-III');
/*newarea Textfield*/
 echo form_dropdown('UnderGraduate', $UnderGraduate, set_value('UnderGraduate',(isset($_GET['UnderGraduate'])) ? $_GET['UnderGraduate'] : ''),'id="ug" data-placeholder="Choose One" class="select2"'); 
 echo form_error('UnderGraduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="UnderGraduate" class="error"></label>
                  </div>
                </div> 


 <div class="col-sm-3"  id="gb"  style="display:none;">
                       <div class="form-group" >
                  
                 <?php  
$Graduate = array('' => '--Edu Qualified--', 'BA' => 'BA', 'B.Sc' => 'B.Sc','BSc .IT' => 'BSc .IT', 'B.Com' => 'B.Com','BCA' =>'BCA','BBA' => 'BBA','BDS' => 'BDS','LLB' => 'LLB','B.Tech' => 'B.Tech','LAB Technician' => 'LAB Technician');
/*newarea Textfield*/
 echo form_dropdown('Graduate', $Graduate, set_value('Graduate',(isset($_GET['Graduate'])) ? $_GET['Graduate'] : ''),'id="Graduate" data-placeholder="Choose One" class="select2"'); 
 echo form_error('Graduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Graduate" class="error"></label>
                  </div>
                </div> 


 <div class="col-sm-3"  id="pgb" style="display:none;">
                   <div class="form-group" >
                  
                 <?php  
$PostGraduate = array('' => '--Edu Qualified--', 'MA' => 'MA','M.Com' => 'M.Com','M.Phil' =>'M.Phil','M Pharm' => 'M Pharm','MCA' => 'MCA','MBA' => 'MBA','MTA' => 'MTA','M.Tech' => 'M.Tech','M.Sc' => 'M.Sc');
/*newarea Textfield*/
 echo form_dropdown('PostGraduate', $PostGraduate, set_value('PostGraduate',(isset($_GET['PostGraduate'])) ? $_GET['PostGraduate'] : ''),'id="PostGraduate" data-placeholder="Choose One" class="select2"'); 
 echo form_error('PostGraduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="PostGraduate" class="error"></label>
                  </div>
                </div> 

                   <div class="col-sm-3"  id="docb" style="display:none;">
                       <div class="form-group">
                
                 <?php  
$Doctorate = array('' => '--Edu Qualified--', 'Ph.d' => 'Ph.d');
/*newarea Textfield*/
 echo form_dropdown('Doctorate', $Doctorate, set_value('Doctorate',(isset($_GET['Doctorate'])) ? $_GET['Doctorate'] : ''),'id="doc" data-placeholder="Choose One" class="select2"'); 
 echo form_error('Doctorate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Doctorate" class="error"></label>
                  </div>
                </div> 


                         <div class="col-sm-3">
                <div class="form-group">
<?php
$gender = array('' => '--Gender--',  'Male' => 'Male', 'Female' => 'Female');
/*newarea Textfield*/
 echo form_dropdown('gender', $gender, set_value('gender',(isset($_GET['gender'])) ? $_GET['gender'] : ''),'id="gender" data-placeholder="Choose One" class="select2"'); 
 echo form_error('gender');
?>
                    <label for="gender" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"> <div class="form-group">
                 <?php  
$height = array('' => '--Height Feet--', '4' => '4', '5' => '5', '6' => '6', '7' => '7');
 echo form_dropdown('height', $height, set_value('height',(isset($_GET['height'])) ? $_GET['height'] : ''),'id="height" data-placeholder="Choose One" class="select2"'); 
 echo form_error('height');
 ?>
                    <label for="height" class="error"></label>
                  </div>
                </div> 

                
               
    

          
           
</div>
<br/>
<div class="row">

<div class="col-sm-3"> <div class="form-group">
                 <?php 

                  $inch = array('' => '--Height Inch--', '0' => '0', '0.25' => '0.25', '0.50' => '0.50', '0.75' => '0.75', '1.00' => '1.00', '1.25' => '1.25', '1.50' => '1.50', '1.75' => '1.75', '2.00' => '2.00', '2.25' => '2.25', '2.50' => '2.50', '2.75' => '2.75','3.00' => '3.00', '3.25' => '3.25', '3.50' => '3.50','3.75' => '3.75','4.00' => '4.00', '4.75' => '4.75','5.00' => '5.00','5.25' => '5.25','5.50' => '5.50', '5.75' => '5.75', '6.00' => '6.00','6.25' => '6.25','6.50' => '6.50','6.75' => '6.75','7.00' => '7.00','7.25' => '7.25','7.50' => '7.50','7.75' => '7.75','8.00' => '8.00', '8.25' => '8.25','8.50' => '8.50','8.75' => '8.75','9.00' => '9.00','9.25' => '9.25', '9.75' => '9.75', '10.00' => '10.00','10.25' => '10.25','10.50' => '10.50','10.75' => '10.75','11.00' => '11.00','11.25' => '11.25','11.50' => '11.50', '11.75' => '11.75');   
 echo form_dropdown('inch', $inch, set_value('inch',(isset($_GET['inch'])) ? $_GET['inch'] : ''),'id="inch" data-placeholder="Choose One" class="select2"'); 
 echo form_error('inch');
 ?>
                    <label for="inch" class="error"></label>
                  </div>
                </div> 

<div class="col-sm-3">
                <div class="form-group">
<?php
$single = array('' => '--Marital Status--',  'Married' => 'Married', 'Single' => 'Single');
/*newarea Textfield*/
 echo form_dropdown('single', $single, set_value('single',(isset($_GET['single'])) ? $_GET['single'] : ''),'id="single" data-placeholder="Choose One" class="select2"'); 
 echo form_error('single');
?>
                    <label for="single" class="error"></label>
                  </div>
                </div>


                 
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$Modemdr = array('' => '--Mode of Enlistment--', 'Special Cases' => 'Special Cases','Direct' => 'Direct', 'Direct (Ex-Serviceman)' => 'Direct (Ex-Serviceman)','Direct(SPORTS)' => 'Direct(SPORTS)', 'PLI' => 'PLI', 'Court cases' => 'Court cases','Direct (Freedom Fighter)' => 'Direct (Freedom Fighter)');
/*newarea Textfield*/
 echo form_dropdown('Modemdr', $Modemdr, set_value('Modemdr',(isset($_GET['Modemdr'])) ? $_GET['Modemdr'] : ''),'id="Modemdr" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Modemdr');
/*----End newarea Textfield----*/
 ?>
                    <label for="Modemdr" class="error"></label>
                  </div>
                </div>

    
   <div class="col-sm-3"><div class="form-group">
                 <?php  
$Rankre = array('' => '--Rank of Enlistment--',  'Constable' => 'Constable', 'ASI' =>'ASI','SI' => 'SI', 'Insp' => 'Insp', 'DSP' => 'DSP', 'ASP' =>'ASP');
 echo form_dropdown('Rankre', $Rankre, set_value('Rankre',(isset($_GET['Rankre'])) ? $_GET['Rankre'] : ''),'id="Rankre" data-placeholder="Choose One" class="select2"'); 
 echo form_error('Rankre');
 ?>
                    <label for="Rankre" class="error"></label>
                  </div>
                </div>

 <div class="col-sm-3"><br/><div class="form-group">
                 <?php  
$Enlistmentec = array('' => '--Enlistment Category--', 'GEN' => 'GEN', 'SCO' => 'SCO','SCBM' => 'SCBM', 'BC' => 'BC', 'OBC' => 'OBC', 'ST' => 'ST', 'NA' => 'NA');
 echo form_dropdown('Enlistmentec', $Enlistmentec, set_value('Enlistmentec',(isset($_GET['Enlistmentec'])) ? $_GET['Enlistmentec'] : ''),'id="Enlistmentec" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Enlistmentec');
 ?>
                    <label for="Enlistmentec" class="error"></label>
                  </div>
                </div> 
                  <div class="col-sm-3"><br/>  <div class="form-group">
                 <?php  
$InductionModeim = array('' => '--Battalion Induction Mode--', 'Transfer' => 'Transfer', 'Transfer(Promotion)' => 'Transfer(Promotion)', 'Transfer(Excess)' => 'Transfer(Excess)', 'Attachment' => 'Attachment','Transfer Pay Purpose' => 'Transfer Pay Purpose','Since Enlistment' => 'Since Enlistment','On deputation' => 'On deputation','Formal Order Not Issued' => 'Formal Order Not Issued','Not Reported' => 'Not Reported');
 echo form_dropdown('InductionModeim', $InductionModeim, set_value('InductionModeim',(isset($_GET['InductionModeim'])) ? $_GET['InductionModeim'] : ''),'id="InductionModeim" data-placeholder="Choose One" class="select2"'); 
 echo form_error('InductionModeim');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                </div> 

                <div class="col-sm-3"><br/>  <div class="form-group">
                 <?php  
$InductionModeim = array('' => '--Computer literate--', 'Yes' => 'Yes', 'No' => 'No');
 echo form_dropdown('clit', $InductionModeim, set_value('clit',(isset($_GET['clit'])) ? $_GET['clit'] : ''),'id="clit" data-placeholder="Choose One" class="select2"'); 
 echo form_error('clit');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                </div> 

                 

                <div class="col-sm-3"><br/>     <div class="input-group">
                 <?php
$dateofesnlistment1 = array('type' => 'text','name' => 'dateofesnlistment1','id' => 'dateofesnlistment1','class' => 'form-control','placeholder' =>'Date of Enlistment From','value' => (isset($_GET['dateofesnlistment1'])) ? $_GET['dateofesnlistment1'] : '');
echo form_input($dateofesnlistment1);
echo form_error('dateofesnlistment1');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                </div> 

                 

</div>
<div class="row">

<div class="col-sm-3"><br/>     <div class="input-group">
                 <?php
$dateofesnlistment2 = array('type' => 'text','name' => 'dateofesnlistment2','id' => 'edateofesnlistment1','class' => 'form-control','placeholder' =>'Date of Enlistment To','value' => (isset($_GET['dateofesnlistment2'])) ? $_GET['dateofesnlistment2'] : '');
echo form_input($dateofesnlistment2);
echo form_error('dateofesnlistment2');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                </div> 

<div class="col-sm-3"><div class="form-group" id="NamesofsCourses1"><br/>
<?php
$NamesofsCourses = array('' => '--Course Category--','Special Dept. Courses' => 'Special Dept. Courses','Other Prof. Courses' => 'Other Prof. Courses');
 echo form_dropdown('catcouses', $NamesofsCourses, set_value('catcouses', (isset($_GET['catcouses'])) ? $_GET['catcouses'] : ''),'id="catcouses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>


      <div class="col-sm-3" id="NamesofsCourses12" style="display: none;"><div class="form-group"><br/>
<?php
$NamesofsCourses = array('' => '--Name of Course--','Basic Drill Course ' => 'Basic Drill Course','Computer  Awareness Refresher Coure' => 'Computer  Awareness Refresher Coure','Basic MT Course' => 'Basic MT Course','MTO Course' => 'MTO Course','Commando Course' => 'Commando Course','Bomb Dispossal Course' => 'Bomb Dispossal Course','Armourer Course' => 'Armourer Course','Tear Gas Course' => 'Tear Gas Course','D & M Refresher Course' => 'D & M Refresher Course','Disaster Management Course' > 'Disaster Management Course','Weapon & Tactics Course' => 'Weapon & Tactics Course','Camp Security Course' => 'Camp Security Course','Finger Print Course' => 'Finger Print Course','Gunman Course' => 'Gunman Course','Fire Fighting Course' => 'Fire Fighting Course','Refresher Course' => 'Refresher Course');

 echo form_dropdown('NamesofsCourses1', $NamesofsCourses, set_value('NamesofsCourses1', (isset($_GET['NamesofsCourses1'])) ? $_GET['NamesofsCourses1'] : ''),'id="NamesofsCourses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>


     <div class="col-sm-3"  id="NamesofsCourses22" style="display: none;"><div class="form-group"><br/>
<?php
$NamesofsCourses = array('' => '--Name of Course--','VIP Security Induction Course' => 'VIP Security Induction Course','Pistol Handling Course' => 'Pistol Handling Course','Capsule Course for Highway Patrolling' => 'Capsule Course for Highway Patrolling','Course on Disaster Management' => 'Course on Disaster Management','Traffic Law Enforcement & Traffic Control' => 'Highway Patrolling Training','Security Refresher Course for PSOs & Escort Staff' => 'Security Refresher Course for PSOs & Escort Staff','Re-Orientation (Police Behavior)' => 'Re-Orientation (Police Behavior)','Review of Training & Training of Trainers Course' => 'Review of Training & Training of Trainers Course','Life Style & Stress Management' => 'Life Style & Stress Management','Crowd Control Refresher Training Course' => 'Crowd Control Refresher Training Course','Ref. Course in the Handling of Security Equipment & Gadges.' => 'Ref. Course in the Handling of Security Equipment & Gadges.','Driving & Maintenance Basic Course' => 'Driving & Maintenance Basic Course','Special Coy. Refresher Course' => 'Special Coy. Refresher Course','Crash Induction trg. for specialized operation duties course.' => 'Crash Induction trg. for specialized operation duties course.','Guard duty & Fighting course and Re-Orientation Course.' => 'Guard duty & Fighting course and Re-Orientation Course.','Specialized course reg. Maintenance of Kot & Their inspection' => 'Specialized course reg. Maintenance of Kot & Their inspection','Photography cum Single Digital Course' => 'Photography cum Single Digital Course','Finger Print Proficiency Course' => 'Finger Print Proficiency Course','Emerging Trends in white coller crime &their handling by police Course' => 'Emerging Trends in white coller crime &their handling by police Course','Specialized course on Traffic Management & Traffice Control Course' => 'Specialized course on Traffic Management & Traffice Control Course','Refresher Course for Drill Instructors Course' => 'Refresher Course for Drill Instructors Course','Course on Deparmental Enquiries Course' => 'Course on Deparmental Enquiries Course','Regional Seminer on Terrorism Course' => 'Regional Seminer on Terrorism Course','Police Lines Management for Course' => 'Police Lines Management for Course','Noice Pollution and Enviroment Protection Course' => 'Noice Pollution and Enviroment Protection Course','Office Procedure of Account Matters Course' => 'Office Procedure of Account Matters Course','Investigation of Domestic Violence Course' => 'Investigation of Domestic Violence Course','Latest Court Ruling and Judgments peraining Course' => 'Latest Court Ruling and Judgments peraining Course','Social Media Management for positive police Course' => 'Social Media Management for positive police Course','An In light into the legal &Procedural Provisions Course' => 'An In light into the legal &Procedural Provisions Course','Roll of Soft Skills in Public Dealing Course' => 'Roll of Soft Skills in Public Dealing Course','Emerging Sociology Trends and Impact on Contemporary Course' => 'Emerging Sociology Trends and Impact on Contemporary Course','Capsule Course on Gender Sensitization for SPs/DSP' => 'Capsule Course on Gender Sensitization for SPs/DSP','Course on Healthy Living & Postive Thinking for Gos' => 'Course on Healthy Living & Postive Thinking for Gos','Course on Leadership and Communication Skills for SSPs/DSPs' => 'Course on Leadership and Communication Skills for SSPs/DSPs','Workshp on Police Media Interface for DSPs/Inspr.' => 'Workshp on Police Media Interface for DSPs/Inspr.','HC/PR Promoted after completeion of 16 years HC as Constable' => 'HC/PR Promoted after completeion of 16 years HC as Constable','Re-Orientation & Detective Foot Consts. Course for CTs on list C-2' => 'Re-Orientation & Detective Foot Consts. Course for CTs on list C-2','Elementry Traffic Course for Constables' => 'Elementry Traffic Course for Constables','Specialised Course for Moter Mechanics' => 'Specialised Course for Moter Mechanics','Refresher Course on operational preparedness Course' => 'Refresher Course on operational preparedness Course','PSO & Gunman Course (State level)' => 'PSO & Gunman Course (State level)','Camp security condensed Course' => 'Camp security condensed Course','Handling  & defusing of explosive and Bomp Disposal Course' => 'Handling  & defusing of explosive and Bomp Disposal Course','Ref.Course for NGOs & ORs' => 'Ref.Course for NGOs & ORs','Specialised Course reg. maintenance of Misc.' => 'Specialised Course reg. maintenance of Misc.','Specialised Course reg. maintenance of CDO Branch &its inspection Course' => 'Specialised Course reg. maintenance of CDO Branch &its inspection Course','Specialised Course reg.maintenance of OASI Branch & its inspection Course' => 'Specialised Course reg.maintenance of OASI Branch & its inspection Course','Capsule Course for telephone operators Course' => 'Capsule Course for telephone operators Course','Police Behavioural Course' => 'Police Behavioural Course', 'Short term Section Platoon commander Course' => 'Short term Section Platoon commander Course','Anti Roit Control Course' => 'Anti Roit Control Course','Photography-Cum-single digit course' => 'Photography-Cum-single digit course','Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs' => 'Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs');

 echo form_dropdown('NamesofsCourses2', $NamesofsCourses, set_value('NamesofsCourses2', (isset($_GET['NamesofsCourses2'])) ? $_GET['NamesofsCourses2'] : ''),'id="NamesofsCourses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>

                 
                  <div class="col-sm-3"><br/>
                    <div class="form-group"> <div class="input-group">
<?php
$DateofRetirementdor = array('type' => 'text','name' => 'DateofRetirementdor','id' => 'DateofRetirementdor','class' => 'form-control','placeholder' =>'Date of Retirement','value' => (isset($_GET['DateofRetirementdor'])) ? $_GET['DateofRetirementdor'] : '');
echo form_input($DateofRetirementdor);
echo form_error('DateofRetirementdor');
?>
                 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  </div>
                </div></div>


 <div class="col-sm-3">  <br/>   <div class="input-group">
                 <?php
$dateofbirth = array('type' => 'text','name' => 'dateofbirth','id' => 'dateofbirth','class' => 'form-control','placeholder' =>'Date of Birth From','value' =>  (isset($_GET['dateofbirth'])) ? $_GET['dateofbirth'] : '');
echo form_input($dateofbirth);
echo form_error('dateofbirth');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div></div>
                

                  </div>

                <div class="row">

                <div class="col-sm-3">  <br/>   <div class="input-group">
                 <?php
$dateofbirth = array('type' => 'text','name' => 'dateofbirthi','id' => 'dateofbirthi','class' => 'form-control','placeholder' =>'Date of Birth To','value' =>   (isset($_GET['dateofbirthi'])) ? $_GET['dateofbirthi'] : '');
echo form_input($dateofbirth);
echo form_error('dateofbirth');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                </div>
                  <div class="col-sm-3"><br/><div class="form-group">
                 <?php  
$Postingtiset = array('' => '--Category of Duty--', 'Fix Duties' => 'Fix Duties', 'Law & Order Duty' => 'Law & Order Duty', 'Special Squads' => 'Special Squads','Permanent Attachment' => 'Permanent Attachment','Training' => 'Training','Sports' => 'Sports','Available with BNs' => 'Available with BNs','Battalion Misc Duties' => 'Battalion Misc Duties','Institutions' => 'Institutions');
 echo form_dropdown('Postingtiseto', $Postingtiset, set_value('Postingtiseto', ''),'id="Postingtiset" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3" id="apart1" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset = array('' => '--Nature/Place of Duty--', 'VP Guards' => 'VP Guards','Jails Security' => 'Jails Security','Punjab Police HQRS,SEC.9,CHG' =>  'Punjab Police HQRS,SEC.9,CHG', 'DERA BEAS SECURITY DUTY' => 'DERA BEAS SECURITY DUTY','OTHER STSTIC GUARDS' => 'OTHER STATIC GUARDS','Police Officer' => 'Police Officer', 'Retired Police Officer' => 'Retired Police Officer', 'Political Persons' => 'Political Persons','Civil Officers' => 'Civil Officers','Judicial Officers' => 'Judicial Officers','Threatening persons' => 'Threatening persons','PERSONAL SECURITY STAFF ARMED WING OFFICER' => 'PERSONAL SECURITY STAFF ARMED WING OFFICER','VIP SEC.WING CHG.U/82nd BN.' => 'VIP SEC.WING CHG.U/82nd BN.','POLICE SEC.WING CHG U/13th BN.' => 'POLICE SEC.WING CHG U/13th BN.','BANK SECURITY DUTY' => 'BANK SECURITY DUTY','SPECIAL PROTECTION UNIT (C.M. SEC.)' => 'SPECIAL PROTECTION UNIT (C.M. SEC.)','PB. BHAWAN NEW DELHI (SEC. DUTY)' => 'PB. BHAWAN NEW DELHI (SEC. DUTY)') ;
 echo form_dropdown('Postingtiset', $Postingtiset, set_value('Postingtiset', (isset($_GET['Postingtiset'])) ? $_GET['Postingtiset'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2 l"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                   <div class="col-sm-3" id="apart2" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset2 = array('' => '--Nature/Place of Duty--', 'PERMANENT DUTY' => 'PERMANENT DUTY','DGP, RESERVES' => 'DGP, RESERVES','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY' => 'TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY') ;
 echo form_dropdown('Postingtiset2', $Postingtiset2, set_value('Postingtiset2',(isset($_GET['Postingtiset2'])) ? $_GET['Postingtiset2'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                    <div class="col-sm-3"  id="apart3" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset3 = array('' => '--Nature/Place of Duty--','ANTI RIOT POLICE, JALANDHAR' => 'ANTI RIOT POLICE, JALANDHAR','ANTI RIOT POLICE, MANSA' => 'ANTI RIOT POLICE, MANSA','ANTI RIOT POLICE, MUKATSAR' => 'ANTI RIOT POLICE, MUKATSAR', 'S.D.R.F. TEAM, JALANDHAR' => 'S.D.R.F. TEAM, JALANDHAR', 'SPL. STRIKING GROUPS' => 'SPL. STRIKING GROUPS','SWAT TEAM (4TH CDO)' => 'SWAT TEAM (4TH CDO)','SOG BHG.,PTL(SPECIAL OPS.GROUP)' => 'SOG BHG.,PTL(SPECIAL OPS.GROUP)','ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','C.P.O. ATTACHMENT UNDER 13TH BN' => 'C.P.O. ATTACHMENT UNDER 13TH BN','PB. POLICE OFFICER INSTITUTE SEC 32 CHG' => 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG') ;
 echo form_dropdown('Postingtiset3', $Postingtiset3, set_value('Postingtiset3',(isset($_GET['Postingtiset3'])) ? $_GET['Postingtiset3'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"  id="apart4" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset4 = array('' => '--Nature/Place of Duty--','ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','C.P.O. ATTACHMENT UNDER 13TH BN' => 'C.P.O. ATTACHMENT UNDER 13TH BN','PB. POLICE OFFICER INSTITUTE SEC 32 CHG' => 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG','NRI CELL MOHALI' => 'NRI CELL MOHALI', 'INTELLIGENCE WING' => 'INTELLIGENCE WING','CENTRAL POLICE LINE MOHALI' => 'CENTRAL POLICE LINE MOHALI','VIGILANCE BUREAU' => 'VIGILANCE BUREAU','STATE NARCOTIC CRIME BUREAU' => 'STATE NARCOTIC CRIME BUREAU','MOHALI AIRPORT IMMIGRATION DUTY' => 'MOHALI AIRPORT IMMIGRATION DUTY','STATE HUMAN RIGHTS COMMISSION' => 'STATE HUMAN RIGHTS COMMISSION','BUREAU OF INVESTIGATION' => 'BUREAU OF INVESTIGATION','SPECIAL TASK FORCE(STF)' => 'SPECIAL TASK FORCE(STF)','PPSSOC' => 'PPSSOC','RTC/PAP, JALANDHAR' => 'RTC/PAP, JALANDHAR','ISTC/PAP, KAPURTHALA' => 'ISTC/PAP, KAPURTHALA','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA' => 'POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','RTC LADDA KOTHI SANGRUR' => 'RTC LADDA KOTHI SANGRUR','PUNJAB POLICE ACADEMY PHILLAUR' => 'PUNJAB POLICE ACADEMY PHILLAUR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN' => 'POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','AD GUARD CP JALL' => 'AD GUARD CP JALL', 'AD GUARD CP ASR' => 'AD GUARD CP ASR','AD GUARD DISTT MKT' => 'AD GUARD DISTT MKT','AD GUARD DISTT LDH' => 'AD GUARD DISTT LDH','AD GUARD DISTT BTL' => 'AD GUARD DISTT BTL') ;
 echo form_dropdown('Postingtiset4', $Postingtiset4, set_value('Postingtiset4',(isset($_GET['Postingtiset4'])) ? $_GET['Postingtiset4'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                 <div class="col-sm-3"  id="apart5" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','BASIC TRANING' => 'BASIC TRANING','PROMOTIONAL COURSE' => 'PROMOTIONAL COURSE','DEPARTMENT COURSE' => 'DEPARTMENT COURSE') ;
 echo form_dropdown('Postingtiset5', $Postingtiset5, set_value('Postingtiset5',(isset($_GET['Postingtiset5'])) ? $_GET['Postingtiset5'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3"  id="apart6" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','DSO' => 'DSO','CSO, JALANDHAR' => 'CSO, JALANDHAR','NIS PATIALA' => 'NIS PATIALA','OTHERS' => 'OTHERS') ;
 echo form_dropdown('Postingtiset6', $Postingtiset5, set_value('Postingtiset6',(isset($_GET['Postingtiset6'])) ? $_GET['Postingtiset6'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"  id="apart7" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','PAP CAMPUS  SECURITY' => 'PAP CAMPUS  SECURITY','BN. KOT GUARDS' => 'BN. KOT GUARDS','BN. HQRS OTHER GUARDS' => 'BN. HQRS OTHER GUARDS','STATIC GUARD CR' => 'STATIC GUARD CR','OFFICE STAFF IN HIGHER OFFICES' => 'OFFICE STAFF IN HIGHER OFFICES','Commandant office' => 'Commandant office', 'Asstt. Commandant office' => 'Asstt. Commandant office', 'Dy.S.P. office' => 'Dy.S.P. office', 'English Branch' => 'English Branch','Account Branch' => 'Account Branch' , 'OSI Branch' => 'OSI Branch', 'Litigation Branch' => 'Litigation Branch', 'Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer Cell' => 'Computer Cell','Control Room' => 'Control Room','Reader to INSP' => 'Reader to INSP','CCTNS office' => 'CCTNS office','Nodal Officer' => 'Nodal Officer','Recruitment Cell' => 'Recruitment Cell','Photostate Machine operator' => 'Photostate Machine operator','TRADEMEN' => 'TRADEMEN','M.T. SECTION' => 'M.T. SECTION','Reserve Inspector' => 'Reserve Inspector','Line Officer' => 'Line Officer','BHM & A/BHM' => 'BHM & A/BHM','MHC & A/MHC' => 'MHC & A/MHC','Reader/Orderly to RI' => 'Reader/Orderly to RI','I/C MESS' => 'I/C MESS','Asst. I/C MESS' => 'Asst. I/C MESS', 'CDI' => 'CDI','CDO & A/CDO' => 'CDO & A/CDO','Quarter Master INSP' => 'Quarter Master INSP','MSK Branch' => 'MSK Branch','KHC' => 'KHC','Armourer & A/Armourer' => 'Armourer & A/Armourer','I/C Class-IV' => 'I/C Class-IV','Quarter Munshi & Asstt.' => 'Quarter Munshi & Asstt.','I/C Canteen & Grossary Shop' => 'I/C Canteen & Grossary Shop','CHC' => 'CHC','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY' => 'GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','TRG. RESERVE AT BN.HQRS.' => 'TRG. RESERVE AT BN.HQRS.','OTHER DUTIES' => 'OTHER DUTIES');
 echo form_dropdown('Postingtiset7', $Postingtiset5, set_value('Postingtiset7',(isset($_GET['Postingtiset7'])) ? $_GET['Postingtiset7'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                      <div class="col-sm-3"  id="apart8" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset8 = array('' => '--Nature/Place of Duty--','RECRUIT' => '->RECRUIT','Earned Leave' => '->EARNED LEAVE','Casual Leave' => '->CASUAL LEAVE','Paternity Leave'  => '->PATERNITY LEAVE','Medical Leave'  => '->MEDICAL LEAVE','Ex-India Leave' => '->EX-INDIA LEAVE','Others' => '->OTHERS','ABSENT' => '->ABSENT','UNDER SUSPENSION' => '->UNDER SUSPENSION','Handicapped on Medical Rest' => '->HANDICAPPED ON MEDICAL REST','Handicapped on light duty' => '->HANDICAPPED ON LIGHT DUTY', 'Chronic Disease on light duty' => '->CHRONIC DISEASE ON LIGHT DUTY', 'Chronic Disease on Medical Rest' => '->CHRONIC DISEASE ON MEDICAL REST', 'OSD ETC' => '->OSD ETC');
 echo form_dropdown('Postingtiset8', $Postingtiset8, set_value('Postingtiset8',(isset($_GET['Postingtiset8'])) ? $_GET['Postingtiset8'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                  <div class="col-sm-3"  id="apart9" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','BUGGLER' => 'BUGGLER','T/A 7th Bn PAP for Driver Duty' => 'T/A 7th Bn PAP for Driver Duty','U/7th PAP for out Rider duty on Motor Cycle' => 'U/7th PAP for out Rider duty on Motor Cycle','M.T WORKSHOP U/7th BN PAP' => 'M.T WORKSHOP U/7th BN PAP','PAP House' => 'PAP House','Camp Cleaning U/7th BN.PAP' => 'Camp Cleaning U/7th BN.PAP', 'A/A Punjab State U/7th BN.PAP' =>  'A/A Punjab State U/7th BN.PAP','IRB Institutions' => 'IRB Institutions','CDO Institutions' => 'CDO Institutions', 'PAP Outer Bn Institutions' => 'PAP Outer Bn Institutions');
 echo form_dropdown('Postingtiset9', $Postingtiset5, set_value('Postingtiset9',(isset($_GET['Postingtiset9'])) ? $_GET['Postingtiset9'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

<div class="row">
  <div class="col-sm-3"><br/>
                   <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="<?php echo base_url('bt-osi-oldall'); ?>" class="btn btn-default">Reset</a>
                </div>

</div>

<?php echo form_close(); ?>
          </div>
        <div class="panel-body"> 
          <!-- Example split danger button -->
          <h2>Total Entries: <?php echo $counts; ?></h2>
          <div class="table-responsive">
           <table class="table"  id="table">
              <thead>
                 <tr>
              <th>S.No</th>
              <th>View All Info</th>
              <th>Battalion/Unit</th>
              <th>Name</th>
              <th>Present Rank</th>
              <th>Dept. No </th>
              <th>District</th>      
              <th>Gender</th>
              <th>Marital Status</th>
              <th>Date of Birth</th>
              <th>Date of Enlistment</th>
              <th>Caste</th>
              <th>Category</th>
              <th>Phone1</th>
              <th>Blood Group</th>
              <th> Education/ Qualified</th>
              <th>Computer literate</th>
              <th>Qualified Courses</th>
              <th>Courses Name</th>
              <th>Date of Retirement</th>
              <th>Extension Retirement Date</th>
              <th>Bank AC No.</th>
              <th>Height</th>
              <th>GPF Pol No /PRAN No.</th>
              <th>Good entries</th>
              <th>Bad entries</th>
              <th>Posting Details</th>
              <th>Date of Posting</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                  
                    <td> 
                    <a href="<?php echo base_url('bt-osiinfo/'.$value->man_id); ?>" class="btn btn-success btn-xs" target="_blank"> <i class="fa fa-eye"></i> View</a>
                     </td>
                      <td><?php  if($value->bunitdistrict ==''){
                      $bats = fetchoneinfo('users',array('users_id' => $value->bat_id)); echo $bats->nick; 
                       }else{
                        $value->bunitdistrict; 
                       }   ?></td>
                    <td> <?php echo $value->name; ?></td>
                    <td><?php echo $value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank; ?></td>
                    <td><?php echo $value->depttno; ?></td>
                    <td><?php echo $value->district; ?></td>
                    <td><?php echo $value->gender; ?></td>
                    <td><?php echo $value->maritalstatus; ?></td>
                    <td><?php $db =  date('d-m-Y',strtotime($value->dateofbith)); if($db == '01-01-1970'){echo '-';}else{echo $db;} ?></td>
                    <td><?php $dde =  date('d-m-Y',strtotime($value->dateofinlitment)); if($dde == '01-01-1970'){echo'-';}else{ echo $dde;} ?> </td>
                    <td><?php echo $value->caste; ?></td>
                    <td><?php echo $value->category; ?></td>
                    <td><?php echo $value->phono1; ?></td>
                     <td><?php echo $value->bloodgroup; ?></td>
                    <td><?php echo $value->eduqalification; ?> &nbsp; <?php echo $value->UnderGraduate.$value->Graduate.$value->PostGraduate.$value->Doctorate.$value->Doctorateother; ?></td>  
                    <td><?php echo $value->comlit; ?></td> 
                    <td><?php $ax = explode('@', $value->NamesofsCourses);
                          /*if($ax[0] == '-' || $ax[0] == ''){

                          }else{
                            print_r($ax);
                            }*/ echo count($ax);  ?></td>
                    <td><?php echo $nm; ?></td>
                    <td><?php echo $value->dateofretirment; ?></td>
                    <td>-</td>

                    <td><?php echo $value->bankacno; ?></td>
                   <td><?php echo $value->feet.' &nbsp;'.$value->inch.''; ?></td>
                   
                    <td><?php echo $value->gpfpranno; ?> &nbsp; <?php echo $value->PRAN; ?></td>
                    <td><?php echo $value->gd1; ?></td>
                    <td><?php echo $value->bd1; ?></td>
                    <?php $pos = fetchoneinfodesc('newosip',array('man_id' => $value->man_id ),'man_id'); ?>
                                 
                   <?php   if($pos !=''){ ?> 
                         <td><?php  echo $pos->fone1.$pos->vploc.$pos->vpdis.$pos->fone2.$pos->noj.$pos->jsdis.$pos->fone3.$pos->fone3.$pos->fone4.$pos->fone5.$pos->osgloc.$pos->osgdis.$pos->fone6.$pos->fone7.$pos->fone8.$pos->fone9.$pos->bsdnob.$pos->bsddis.$pos->bsdloc.$pos->fone10.$pos->fone11.$pos->fone12.$pos->lone1.$pos->perdupod.$pos->perdudis.$pos->perduorno.$pos->perduordate.$pos->lone2.$pos->dgppod.$pos->dgpdis.$pos->dgporno.$pos->dgpordate.$pos->lone3.$pos->tertdpod.$pos->tertddis.$pos->tertdorno.$pos->tertdordate.$pos->sqone1.$pos->sqone2.$pos->sqone3.$pos->sqone4.$pos->sqone5.$pos->sstgpod.$pos->sstgdis.$pos->sstgorno.$pos->sstgordate.$pos->sqone6.$pos->sqone6.$pos->sqone7.$pos->swatpod.$pos->swatdis.$pos->swatorno.$pos->swatordate.$pos->paone1.$pos->paone2.$pos->awdpmpod.$pos->awdpmorno.$pos->awdpmordate.$pos->paone3.$pos->awdpfpod.$pos->awdpforno.$pos->awdpfordate.$pos->paone4.$pos->awdpompod.$pos->awdpomorno.$pos->awdpomordate.$pos->paone5.$pos->awdpofpod.$pos->awdpoforno.$pos->awdpofordate.$pos->paone6.$pos->paone7.$pos->paone8.$pos->paone9.$pos->paone10.$pos->paone11.$pos->paone12.$pos->paone13.$pos->paone14.$pos->paone15.$pos->paone16.$pos->paone17.$pos->paone18.$pos->paone19.$pos->paone20.$pos->paone21.$pos->paone22.$pos->paone23.$pos->paone24.$pos->ssone23.$pos->dsopod.$pos->dsoorno.$pos->dsoordate.$pos->ssone24.$pos->csojalorno.$pos->csojalordate.$pos->ssone25.$pos->mispatorno.$pos->mispatordate.$pos->ssone26.$pos->othersnod.$pos->othersnodis.$pos->othersorno.$pos->othersordate.$pos->awbone1.$pos->awbone2.$pos->pssawonof.$pos->pssaworank.$pos->pssawoordate.$pos->awbone3.$pos->osihonoo.$pos->awbone4.$pos->Readerosinbo.$pos->Orderly.$pos->telopr.$pos->darrun.$pos->awbone5.$pos->bnkgdop.$pos->awbone6.$pos->bhogpog.$pos->bhogdop.$pos->awbone7.$pos->tradestot.$pos->tradestt.$pos->tradesbat.$pos->tradesdop.$pos->tradesorno.$pos->awbone8.$pos->mtsecpod.$pos->mtsecvehno.$pos->mtsecdop.$pos->mtsecorno.$pos->awbone9.$pos->quartbradop.$pos->quartbraorno.$pos->awbone10.$pos->awbone11.$pos->awbone12.$pos->awbone12.$pos->recrutnorb.$pos->recrutorno.$pos->recrutordate.$pos->bmdone1.$pos->bmdone2.$pos->leavefrom.$pos->leaveto.$pos->bmdone3.$pos->absentfrom.$pos->absentddr.$pos->absentdate.$pos->bmdone4.$pos->usdos.$pos->usros.$pos->bmdone5.$pos->bmdone6.$pos->bmdone7.$pos->bmdone8.$pos->bmdone9.$pos->bmdone10.$pos->instone1.$pos->instone2.$pos->instone3.$pos->instone4.$pos->traning1.$pos->traning2.$pos->traning3.$pos->btarin1.$pos->btarin2.$pos->btarin3.$pos->btarin4.$pos->btarin5.$pos->btarin6.$pos->btarin7.$pos->btarin8.$pos->btarin9.$pos->btarin10.$pos->cfpop.$pos->cfppd.$pos->cfpdop.$pos->cfpdop; ?></td>
                          <td><?php echo $pos->dateofposting1; ?></td> 
                    <?php  }else{ ?>
                    <td></td><td></td>
                    <?php } ?>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->  
          <?php echo $links; ?> 
        </div><!-- panel-body -->
        </div><!-- panel -->
      </div><!-- col-sm-12 -->
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
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control"),
  jQuery('#DateofRetirementdor').datepicker({dateFormat: "yy-mm-dd"}); 
  jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#id').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#ircdi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#idi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#dateofesnlistment1').datepicker({dateFormat: "yy-mm-dd"});
  jQuery('#edateofesnlistment1').datepicker({dateFormat: "yy-mm-ddy"});

  
  jQuery('#dateofbirth').datepicker({dateFormat: "yy-mm-dd"});
  jQuery('#dateofbirthi').datepicker({dateFormat: "yy-mm-dd"});


  
});
   
     $("#postate").change(function(){
    var state = $("#postate").val();
    var dataStrings = 'state='+ state;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-sti-ajfilter",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#dis").html(html);
    }  
      
    });

    });

  $(document).on('change', '#stts', function() {
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



         $(document).on('change', '#RankRankre', function() {
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

   $(document).on('change', '#catcouses', function() {
      if(this.value == 'Special Dept. Courses'){
     $('#NamesofsCourses12').show();
      $('#NamesofsCourses22').hide();
   } else if(this.value == 'Other Prof. Courses'){
     $('#NamesofsCourses22').show();
     $('#NamesofsCourses12').hide();
   }else{
     $('#NamesofsCourses22').hide();
     $('#NamesofsCourses12').hide();
   }
  
});

   $(document).on('change', '#Postingtiset', function() {
      if(this.value == 'Fix Duties'){
     $('#apart1').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   } else if(this.value == 'Law & Order Duty'){
     $('#apart2').show();
     $('#apart1').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Special Squads'){
     $('#apart3').show();
     $('#apart2').hide();
     $('#apart1').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Permanent Attachment'){
     $('#apart4').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart1').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Training'){
     $('#apart5').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart1').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Sports'){
     $('#apart6').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart1').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Available with BNs'){
     $('#apart7').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart1').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Battalion Misc Duties'){
     $('#apart8').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart1').hide();
     $('#apart9').hide();
   }else if(this.value == 'Institutions'){
     $('#apart9').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart1').hide();
   }else{
      $('#apart9').hide();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart1').hide();
   }
  
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
        },
         scrollY: 350,
        scrollX: 800
    } );
  

});
</script>
</body>
</html>