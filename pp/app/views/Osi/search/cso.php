<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> OSI Module (CSO)</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-datepicker3.css" />
    <style type="text/css">
    .cur{
      cursor: pointer;
    }
    .cur{
      cursor: pointer;
    }
	.green-back{
		background-color:#667c2f;
	}
	.blue-back{
		background-color:#428bca;
	}
	.white{
		color:white;
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
      <h3>&nbsp; &nbsp; &nbsp; OSI Module <?php if($name!=''){ echo $name->nick; } ?> (CSO)</h3>
      
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
      'method' => 'post',
    'onsubmit'=>'osi_records.dataTable.draw();return false;'
      );
 echo form_open_multipart("", $attributes);
?>
             
          <div class="row">
    <?php 
     if(false):
    if($this->session->userdata('user_log')==4){    //battalion login
        $ito = array($this->session->userdata('userid'));
        ?>
        <div class="col-sm-2"><div class="form-group">
          <input type="text" disabled value="<?php echo $this->session->userdata('nick')?>" class="form-control">
          </div>
        </div>
        <?php
      }else{?>
          <div class="col-sm-2"><div class="form-group">
                         <?php  
                    $ito = array();
                 //$ito[''] = '--Battalion--';
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
 echo form_dropdown('ito[]', $battalions, set_value('ito',(isset($_GET['ito'])) ? $_GET['ito'] : ''),'id="ito" placeholder="Select Battalion(s)" title="Please select at least 1 area" multiple class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
      <?php }endif; ?>
      <div class="col-sm-2"><div class="form-group">
<?php
$name = array('type' => 'text','class' => 'form-control','placeholder' =>'CSO.PAP','disabled'=>true);
echo form_input($name);
echo form_error('name');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>
 <div class="col-sm-2"><div class="form-group">
<?php
$name = array('type' => 'text','name' => 'name','id' => 'name','class' => 'form-control','placeholder' =>'Official Name','value' => (isset($_GET['name'])) ? $_GET['name'] : '');
echo form_input($name);
echo form_error('name');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-2"><div class="form-group">
<?php
$bloodgroup = array(  'A+VE' => 'A+VE', 'A-VE' => 'A-VE', 'AB+VE' => 'AB+VE', 'AB-VE' => 'AB-VE', 'B+VE' => 'B+VE', 'B-VE' => 'B-VE','O+VE' => 'O+VE', 'O-VE' => 'O-VE');
/*newarea Textfield*/
 echo form_dropdown('bloodgroup[]', $bloodgroup,set_value('bloodgroup',(isset($_GET['bloodgroup'])) ? $_GET['bloodgroup'] : ''),'id="bloodgroup" data-placeholder="Select Blood Group" class="select2" multiple'); 
 echo form_error('bloodgroup');
?>
                    <label for="bloodgroup" class="error"></label>
                  </div>
                </div>

                   
                   <div class="col-sm-2"> <div class="form-group">
<?php
$rcnum = array('type' => 'text','name' => 'rcnum','id' => 'rcnum','class' => 'form-control','placeholder' =>'Dept No.','value' => (isset($_GET['rcnum'])) ? $_GET['rcnum'] : '');
echo form_input($rcnum);
echo form_error('rcnum');
?>
                    <label for="rcnum" class="error"></label>
                  </div>
                </div>
                         


                             <div class="col-sm-2"><div class="form-group">
                 
            <?php  
$RankRankre = array('' => '--Staff Category--', 'Executive Staff' => 'Executive Staff', 'Ministerial Staff' => 'Ministerial Staff', 'Medical Staff' => 'Medical Staff', 'Class-IV (P)' => 'Class-IV (P)', 'Class-IV (C)' => 'Class-IV (C)');
 echo form_dropdown('RankRankre', $RankRankre,  set_value('RankRankre',(isset($_GET['RankRankre'])) ? $_GET['RankRankre'] : ''),'id="RankRankre" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
 ?>
                    <label for="eor" class="error"></label>
                  </div>
                </div>

                       <div class="col-sm-2"  id="eors1"><div class="form-group">
            <?php  
$eor1 = array('CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'HC/LR' => 'HC/LR','HC/CR' => 'HC/CR', 'ASI/LR' => 'ASI/LR','ASI/CR' => 'ASI/CR',  'ASI' => 'ASI','ASI/ORP' => 'ASI/ORP', 'SI/CR' => 'SI/CR','SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR','INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' =>'DSP/CR','DSP' =>'DSP','AIG' => 'AIG','SP/CR' => 'SP/CR', 'SP' => 'SP','Asst. Commandant' =>'Asst. Commandant','Commandant' => 'Commandant');
 echo form_dropdown('eor1[]', $eor1, set_value('eor1',(isset($_GET['eor1'])) ? $_GET['eor1'] : ''),'id="eor1" data-placeholder="Select Rank(s)" class="select2" multiple'); 
 echo form_error('eor1');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>
                  
                <div class="col-sm-2"  id="eors2" style="display: none;"><div class="form-group">
                
            <?php  
$eor2 = array('Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari','Supdt Grade-I' => 'Supdt Grade-I','SubSupdt Grade-II' => 'Supdt Grade-II');
 echo form_dropdown('eor2[]', $eor2, set_value('eor2',(isset($_GET['eor2'])) ? $_GET['eor2'] : ''),'id="eor2" data-placeholder="Select Rank(s)" class="select2" multiple'); 
 echo form_error('eor2');
 ?>
                    <label for="eor2" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-2"  id="eors3" style="display: none;"><div class="form-group">
                
            <?php  
$eor3 = array('Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
 echo form_dropdown('eor3[]', $eor3, set_value('eor3',(isset($_GET['eor3'])) ? $_GET['eor3'] : ''),'id="eor3" data-placeholder="Select Rank(s)" class="select2" multiple'); 
 echo form_error('eor3');
 ?>
                    <label for="Medical" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-2"  id="eors4" style="display: none;"><div class="form-group">
                
            <?php  
$eor4 = array('Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('eor4[]', $eor4, set_value('eor4',(isset($_GET['eor4'])) ? $_GET['eor4'] : ''),'id="eor4" data-placeholder="Select Rank(s)" class="select2" multiple'); 
 echo form_error('eor4');
 ?>
                    <label for="eor4" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-2"  id="eors5" style="display: none;"><div class="form-group">
                
            <?php  
$eor5 = array( 'Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter','Mason' => 'Mason','Mali' => 'Mali');
 echo form_dropdown('eor5[]', $eor5, set_value('eor5',(isset($_GET['eor5'])) ? $_GET['eor5'] : ''),'id="eor5" data-placeholder="Select Rank(s)" class="select2" multiple'); 
 echo form_error('eor5');
 ?>
                    <label for="eor5" class="error"></label>
                  </div>
                </div>
              </div><br/>

                  <div class="row">
                  <div class="col-sm-2"> <div class="form-group">

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


              <div class="col-sm-2"><div class="form-group"><select name="pcity"  id="dis" data-placeholder="City" title="Please select at least 1 value" class="form-control">';
              <option value=''>--District--</option>
                </select></div></div>
      

                 <div id="listing2"></div>


                 

                  <div class="col-sm-2"><div class="form-group">
                 <?php  
$stts = array('Illiterate' => 'Illiterate', 'Under Matric' => 'Under Matric', '10th' => '10th', 'H. Sec' => 'H. Sec', 'Prep' => 'Prep', '10+1' => '10+1','10+2' =>'10+2','Under Graduate' => 'Under Graduate', 'Graduate' => 'Graduate', 'Post Graduate' => 'Post Graduate','Doctorate' => 'Doctorate','Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('stts[]', $stts,set_value('stts',(isset($_GET['stts'])) ? $_GET['stts'] : ''),'id="stts" placeholder="Select Education(s)" class="select2" multiple'); 
 echo form_error('stts');
/*----End newarea Textfield----*/
 ?>
                    <label for="stts" class="error"></label>
                  </div>
                </div>   
 <div class="col-sm-2" id="selectClass" >
<div class="form-group" >
                 
                 <?php  
$classes = array( );  //this option will conating the classes of the selected course
/*newarea Textfield*/
 echo form_dropdown('classes[]', $classes, set_value('UnderGraduate',(isset($_GET['UnderGraduate'])) ? $_GET['UnderGraduate'] : ''),'id="classes" data-placeholder="Select class(s)" class="select2" multiple'); 
 echo form_error('UnderGraduate');
/*----End newarea Textfield----*/
 /*
 $("#classes").empty()
 
 */
 
 ?>
                    <label for="UnderGraduate" class="error"></label>
                  </div>
                </div> 
 <div class="col-sm-2" id="ugb" style="display:none;">
<div class="form-group" >
                 
                 <?php  
$UnderGraduate = array( 'BA-I' => 'BA-I', 'BA-II' => 'BA-II', 'BSc-I' => 'BSc-I', 'BSc-II' => 'BSc-II','BSc .IT-I' => 'BSc .IT-I', 'BSc .IT-II' => 'BSc .IT-II', 'Bcom-I' => 'Bcom-I','Bcom-II' => 'Bcom-II','BCA-I' =>'BCA-I','BCA-II' =>'BCA-II','BBA-I' => 'BBA-I','BBA-II' => 'BBA-II','LLB-I' => 'LLB-I','LLB-II' => 'LLB-II','B.Tech-I' => 'B.Tech-I', 'B.Tech-II' => 'B.Tech-II', 'B.Tech-III' => 'B.Tech-III','BA/LLB'=>'BA/LLB');
/*newarea Textfield*/
 echo form_dropdown('UnderGraduate', $UnderGraduate, set_value('UnderGraduate',(isset($_GET['UnderGraduate'])) ? $_GET['UnderGraduate'] : ''),'id="ug" placeholder="Choose One" class="select2"'); 
 echo form_error('UnderGraduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="UnderGraduate" class="error"></label>
                  </div>
                </div> 
        <script type="text/javascript">
          var UnderGraduate = JSON.parse('<?php echo json_encode($UnderGraduate); ?>');
         </script>


 <div class="col-sm-2"  id="gb"  style="display:none;">
                       <div class="form-group" >
                  
                 <?php  
$Graduate = array('BA' => 'BA', 'B.Sc' => 'B.Sc','BSc .IT' => 'BSc .IT', 'B.Com' => 'B.Com','BCA' =>'BCA','BBA' => 'BBA','BDS' => 'BDS','LLB' => 'LLB','B.Tech' => 'B.Tech','LAB Technician' => 'LAB Technician');
/*newarea Textfield*/
 echo form_dropdown('Graduate', $Graduate, set_value('Graduate',(isset($_GET['Graduate'])) ? $_GET['Graduate'] : ''),'id="Graduate" data-placeholder="Choose One" class="select2"'); 
 echo form_error('Graduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Graduate" class="error"></label>
                  </div>
                </div> 
        <script type="text/javascript">
          var Graduate = JSON.parse('<?php echo json_encode($Graduate); ?>');
         </script>


 <div class="col-sm-2"  id="pgb" style="display:none;">
                   <div class="form-group" >
                  
                 <?php  
$PostGraduate = array('MA' => 'MA','M.Com' => 'M.Com','M.Phil' =>'M.Phil','M Pharm' => 'M Pharm','MCA' => 'MCA','MBA' => 'MBA','MTA' => 'MTA','M.Tech' => 'M.Tech','M.Sc' => 'M.Sc');
/*newarea Textfield*/
 echo form_dropdown('PostGraduate', $PostGraduate, set_value('PostGraduate',(isset($_GET['PostGraduate'])) ? $_GET['PostGraduate'] : ''),'id="PostGraduate" data-placeholder="Choose One" class="select2"'); 
 echo form_error('PostGraduate');
/*----End newarea Textfield----*/
 ?>
                    <label for="PostGraduate" class="error"></label>
                  </div>
                </div> 
        <script type="text/javascript">
          var PostGraduate = JSON.parse('<?php echo json_encode($PostGraduate); ?>');
         </script>
                   <div class="col-sm-2"  id="docb" style="display:none;">
                       <div class="form-group">
                
                 <?php  
$Doctorate = array('Ph.d' => 'Ph.d');
/*newarea Textfield*/
 echo form_dropdown('Doctorate', $Doctorate, set_value('Doctorate',(isset($_GET['Doctorate'])) ? $_GET['Doctorate'] : ''),'id="doc" placeholder="Choose One" class="select2"'); 
 echo form_error('Doctorate');
/*----End newarea Textfield----*/
 ?>
                    <label for="Doctorate" class="error"></label>
                  </div>
                </div> 
        <script type="text/javascript">
          var Doctorate = JSON.parse('<?php echo json_encode($Doctorate); ?>');
        </script>
  
                <div class="col-sm-2">
                <div class="form-group">
<?php
$gender = array( 'Male' => 'Male', 'Female' => 'Female');
/*newarea Textfield*/
 echo form_dropdown('gender[]', $gender, set_value('gender',(isset($_GET['gender'])) ? $_GET['gender'] : ''),'id="gender" data-placeholder="Select Gender" class="select2" multiple'); 
 echo form_error('gender');
?>
                    <label for="gender" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-2"> <div class="form-group">
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

<div class="col-sm-2"> <div class="form-group">
                 <?php 

                  $inch = array('' => '--Height Inch--', '0' => '0', '0.25' => '0.25', '0.50' => '0.50', '0.75' => '0.75', '1.00' => '1.00', '1.25' => '1.25', '1.50' => '1.50', '1.75' => '1.75', '2.00' => '2.00', '2.25' => '2.25', '2.50' => '2.50', '2.75' => '2.75','3.00' => '3.00', '3.25' => '3.25', '3.50' => '3.50','3.75' => '3.75','4.00' => '4.00', '4.75' => '4.75','5.00' => '5.00','5.25' => '5.25','5.50' => '5.50', '5.75' => '5.75', '6.00' => '6.00','6.25' => '6.25','6.50' => '6.50','6.75' => '6.75','7.00' => '7.00','7.25' => '7.25','7.50' => '7.50','7.75' => '7.75','8.00' => '8.00', '8.25' => '8.25','8.50' => '8.50','8.75' => '8.75','9.00' => '9.00','9.25' => '9.25', '9.75' => '9.75', '10.00' => '10.00','10.25' => '10.25','10.50' => '10.50','10.75' => '10.75','11.00' => '11.00','11.25' => '11.25','11.50' => '11.50', '11.75' => '11.75');   
 echo form_dropdown('inch', $inch, set_value('inch',(isset($_GET['inch'])) ? $_GET['inch'] : ''),'id="inch" data-placeholder="Choose One" class="select2"'); 
 echo form_error('inch');
 ?>
                    <label for="inch" class="error"></label>
                  </div>
                </div> 

                  <div class="col-sm-2"><div class="form-group">
<?php
$single = array(  'Married' => 'Married', 'Unmarried' => 'Unmarried', 'Divorced'=>'Divorced','Widow/Widower'=>'Widow/Widower');
/*newarea Textfield*/
 echo form_dropdown('single[]', $single, set_value('single',(isset($_GET['single'])) ? $_GET['single'] : ''),'id="single" data-placeholder="Select Maritial status" class="select2" multiple'); 
 echo form_error('single');
?>
                    <label for="single" class="error"></label>
                  </div>
                </div>
                 
                  <div class="col-sm-2"><div class="form-group">
                 <?php  
$Modemdr = array('Special Cases' => 'Special Cases','Direct' => 'Direct', 'Direct (Ex-Serviceman)' => 'Direct (Ex-Serviceman)','Direct(SPORTS)' => 'Direct(SPORTS)', 'PLI' => 'PLI', 'Court cases' => 'Court cases','Direct (Freedom Fighter)' => 'Direct (Freedom Fighter)','SPO' => 'SPO');
/*newarea Textfield*/
 echo form_dropdown('Modemdr[]', $Modemdr, set_value('Modemdr',(isset($_GET['Modemdr'])) ? $_GET['Modemdr'] : ''),'id="Modemdr" data-placeholder="Mode of Enlistment" title="Please select at least 1 area" class="select2" multiple'); 
 echo form_error('Modemdr');
/*----End newarea Textfield----*/
 ?>
                    <label for="Modemdr" class="error"></label>
                  </div>
                </div>
    
                  <div class="col-sm-2"><div class="form-group">
                 <?php  
$Rankre = array( 'Constable' => 'Constable', 'ASI' =>'ASI','SI' => 'SI', 'Insp' => 'Insp', 'DSP' => 'DSP', 'ASP' =>'ASP');
 echo form_dropdown('Rankre[]', $Rankre, set_value('Rankre',(isset($_GET['Rankre'])) ? $_GET['Rankre'] : ''),'id="Rankre" data-placeholder="Rank of Enlistment" class="select2" multiple'); 
 echo form_error('Rankre');
 ?>
                    <label for="Rankre" class="error"></label>
                  </div>
                </div>

 <div class="col-sm-2"><div class="form-group">
                 <?php  
$Enlistmentec = array('' => '--Enlistment Category--', 'GEN' => 'GEN', 'SCO' => 'SCO','SCBM' => 'SCBM', 'BC' => 'BC', 'OBC' => 'OBC', 'ST' => 'ST', 'NA' => 'NA');
 echo form_dropdown('Enlistmentec', $Enlistmentec, set_value('Enlistmentec',(isset($_GET['Enlistmentec'])) ? $_GET['Enlistmentec'] : ''),'id="Enlistmentec" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Enlistmentec');
 ?>
                    <label for="Enlistmentec" class="error"></label>
                  </div>
                </div> 

                  <div class="col-sm-2"> <div class="form-group">
                 <?php  
$InductionModeim = array('' => '--Battalion Induction Mode--', 'Transfer' => 'Transfer', 'Transfer(Promotion)' => 'Transfer(Promotion)', 'Transfer(Excess)' => 'Transfer(Excess)', 'Attachment' => 'Attachment','Transfer Pay Purpose' => 'Transfer Pay Purpose','Since Enlistment' => 'Since Enlistment','On deputation' => 'On deputation','Formal Order Not Issued' => 'Formal Order Not Issued','Not Reported' => 'Not Reported');
 echo form_dropdown('InductionModeim', $InductionModeim, set_value('InductionModeim',(isset($_GET['InductionModeim'])) ? $_GET['InductionModeim'] : ''),'id="InductionModeim" data-placeholder="Choose One" class="select2"'); 
 echo form_error('InductionModeim');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                </div> 
                
               </div>
                  <div class="row">
                <div class="col-sm-2"><br/>  <div class="form-group">
                 <?php  
$InductionModeim = array('' => '--Computer literate--', 'Yes' => 'Yes', 'No' => 'No');
 echo form_dropdown('clit', $InductionModeim, set_value('clit',(isset($_GET['clit'])) ? $_GET['clit'] : ''),'id="clit" data-placeholder="Choose One" class="select2"'); 
 echo form_error('clit');
 ?>
                    <label for="InductionModeim" class="error"></label>
                  </div>
                </div> 
                  
                 <div class="col-sm-2"><br/>     <div class="input-group">
                 <?php
$dateofesnlistment1 = array('type' => 'text','name' => 'dateofesnlistment1','id' => 'dateofesnlistment1','class' => 'form-control','placeholder' =>'Date of Enlistment From','value' => (isset($_GET['dateofesnlistment1'])) ? $_GET['dateofesnlistment1'] : '');
echo form_input($dateofesnlistment1);
echo form_error('dateofesnlistment1');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                </div> 

                 
<div class="col-sm-2"><br/>     <div class="input-group">
                 <?php
$dateofesnlistment2 = array('type' => 'text','name' => 'dateofesnlistment2','id' => 'edateofesnlistment1','class' => 'form-control','placeholder' =>'Date of Enlistment To','value' => (isset($_GET['dateofesnlistment2'])) ? $_GET['dateofesnlistment2'] : '');
echo form_input($dateofesnlistment2);
echo form_error('dateofesnlistment2');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                </div> 
<?php if(false) { ?>
<div class="col-sm-2"><div class="form-group" id="NamesofsCourses1"><br/>
<?php
$NamesofsCourses = array('' => '--Course Category--','Special Dept. Courses' => 'Special Dept. Courses','Other Prof. Courses' => 'Other Prof. Courses');
 echo form_dropdown('catcouses', $NamesofsCourses, set_value('catcouses', (isset($_GET['catcouses'])) ? $_GET['catcouses'] : ''),'id="catcouses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>
<?php } ?>
<div class="col-sm-2"><div class="form-group" id="training_institutes"><br/>
<?php
//$NamesofsCourses = array('' => '----','Special Dept. Courses' => 'Special Dept. Courses','Other Prof. Courses' => 'Other Prof. Courses');
 echo form_dropdown('training_institutes', $training_institutes, set_value('training_institutes', (isset($_GET['training_institutes'])) ? $_GET['training_institutes'] : ''),'id="training_institutes_1"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('training_institutes');
?>
                    <label for="training_institutes" class="error"></label>
                  </div>
                </div>
		<div class="col-sm-2"><div class="form-group" id="_courses"><br/>
<?php
//$NamesofsCourses = array('' => '--Course Category--','Special Dept. Courses' => 'Special Dept. Courses','Other Prof. Courses' => 'Other Prof. Courses');
 echo form_dropdown('courses', $courses, set_value('courses', (isset($_GET['courses'])) ? $_GET['courses'] : ''),'id="courses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('courses');
?>
                    <label for="courses" class="error"></label>
                  </div>
                </div>
      <div class="col-sm-2" id="NamesofsCourses12" style="display: none;"><div class="form-group"><br/>
<?php
$NamesofsCourses = array('' => '--Name of Course--','Basic Drill Course ' => 'Basic Drill Course','Computer  Awareness Refresher Coure' => 'Computer  Awareness Refresher Coure','Basic MT Course' => 'Basic MT Course','MTO Course' => 'MTO Course','Commando Course' => 'Commando Course','Bomb Dispossal Course' => 'Bomb Dispossal Course','Armourer Course' => 'Armourer Course','Tear Gas Course' => 'Tear Gas Course','D & M Refresher Course' => 'D & M Refresher Course','Disaster Management Course' > 'Disaster Management Course','Weapon & Tactics Course' => 'Weapon & Tactics Course','Camp Security Course' => 'Camp Security Course','Finger Print Course' => 'Finger Print Course','Gunman Course' => 'Gunman Course','Fire Fighting Course' => 'Fire Fighting Course','Refresher Course' => 'Refresher Course');

 echo form_dropdown('NamesofsCourses1', $NamesofsCourses, set_value('NamesofsCourses1', (isset($_GET['NamesofsCourses1'])) ? $_GET['NamesofsCourses1'] : ''),'id="NamesofsCourses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>


     <div class="col-sm-2"  id="NamesofsCourses22" style="display: none;"><div class="form-group"><br/>
<?php
$NamesofsCourses = array('' => '--Name of Course--','VIP Security Induction Course' => 'VIP Security Induction Course','Pistol Handling Course' => 'Pistol Handling Course','Capsule Course for Highway Patrolling' => 'Capsule Course for Highway Patrolling','Course on Disaster Management' => 'Course on Disaster Management','Traffic Law Enforcement & Traffic Control' => 'Highway Patrolling Training','Security Refresher Course for PSOs & Escort Staff' => 'Security Refresher Course for PSOs & Escort Staff','Re-Orientation (Police Behavior)' => 'Re-Orientation (Police Behavior)','Review of Training & Training of Trainers Course' => 'Review of Training & Training of Trainers Course','Life Style & Stress Management' => 'Life Style & Stress Management','Crowd Control Refresher Training Course' => 'Crowd Control Refresher Training Course','Ref. Course in the Handling of Security Equipment & Gadges.' => 'Ref. Course in the Handling of Security Equipment & Gadges.','Driving & Maintenance Basic Course' => 'Driving & Maintenance Basic Course','Special Coy. Refresher Course' => 'Special Coy. Refresher Course','Crash Induction trg. for specialized operation duties course.' => 'Crash Induction trg. for specialized operation duties course.','Guard duty & Fighting course and Re-Orientation Course.' => 'Guard duty & Fighting course and Re-Orientation Course.','Specialized course reg. Maintenance of Kot & Their inspection' => 'Specialized course reg. Maintenance of Kot & Their inspection','Photography cum Single Digital Course' => 'Photography cum Single Digital Course','Finger Print Proficiency Course' => 'Finger Print Proficiency Course','Emerging Trends in white coller crime &their handling by police Course' => 'Emerging Trends in white coller crime &their handling by police Course','Specialized course on Traffic Management & Traffice Control Course' => 'Specialized course on Traffic Management & Traffice Control Course','Refresher Course for Drill Instructors Course' => 'Refresher Course for Drill Instructors Course','Course on Deparmental Enquiries Course' => 'Course on Deparmental Enquiries Course','Regional Seminer on Terrorism Course' => 'Regional Seminer on Terrorism Course','Police Lines Management for Course' => 'Police Lines Management for Course','Noice Pollution and Enviroment Protection Course' => 'Noice Pollution and Enviroment Protection Course','Office Procedure of Account Matters Course' => 'Office Procedure of Account Matters Course','Investigation of Domestic Violence Course' => 'Investigation of Domestic Violence Course','Latest Court Ruling and Judgments peraining Course' => 'Latest Court Ruling and Judgments peraining Course','Social Media Management for positive police Course' => 'Social Media Management for positive police Course','An In light into the legal &Procedural Provisions Course' => 'An In light into the legal &Procedural Provisions Course','Roll of Soft Skills in Public Dealing Course' => 'Roll of Soft Skills in Public Dealing Course','Emerging Sociology Trends and Impact on Contemporary Course' => 'Emerging Sociology Trends and Impact on Contemporary Course','Capsule Course on Gender Sensitization for SPs/DSP' => 'Capsule Course on Gender Sensitization for SPs/DSP','Course on Healthy Living & Postive Thinking for Gos' => 'Course on Healthy Living & Postive Thinking for Gos','Course on Leadership and Communication Skills for SSPs/DSPs' => 'Course on Leadership and Communication Skills for SSPs/DSPs','Workshp on Police Media Interface for DSPs/Inspr.' => 'Workshp on Police Media Interface for DSPs/Inspr.','HC/PR Promoted after completeion of 16 years HC as Constable' => 'HC/PR Promoted after completeion of 16 years HC as Constable','Re-Orientation & Detective Foot Consts. Course for CTs on list C-2' => 'Re-Orientation & Detective Foot Consts. Course for CTs on list C-2','Elementry Traffic Course for Constables' => 'Elementry Traffic Course for Constables','Specialised Course for Moter Mechanics' => 'Specialised Course for Moter Mechanics','Refresher Course on operational preparedness Course' => 'Refresher Course on operational preparedness Course','PSO & Gunman Course (State level)' => 'PSO & Gunman Course (State level)','Camp security condensed Course' => 'Camp security condensed Course','Handling  & defusing of explosive and Bomp Disposal Course' => 'Handling  & defusing of explosive and Bomp Disposal Course','Ref.Course for NGOs & ORs' => 'Ref.Course for NGOs & ORs','Specialised Course reg. maintenance of Misc.' => 'Specialised Course reg. maintenance of Misc.','Specialised Course reg. maintenance of CDO Branch &its inspection Course' => 'Specialised Course reg. maintenance of CDO Branch &its inspection Course','Specialised Course reg.maintenance of OASI Branch & its inspection Course' => 'Specialised Course reg.maintenance of OASI Branch & its inspection Course','Capsule Course for telephone operators Course' => 'Capsule Course for telephone operators Course','Police Behavioural Course' => 'Police Behavioural Course', 'Short term Section Platoon commander Course' => 'Short term Section Platoon commander Course','Anti Roit Control Course' => 'Anti Roit Control Course','Photography-Cum-single digit course' => 'Photography-Cum-single digit course','Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs' => 'Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs');

 echo form_dropdown('NamesofsCourses2', $NamesofsCourses, set_value('NamesofsCourses2', (isset($_GET['NamesofsCourses2'])) ? $_GET['NamesofsCourses2'] : ''),'id="NamesofsCourses2"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
echo form_error('NamesofsCourses');
?>
                    <label for="NamesofsCourses" class="error"></label>
                  </div>
                </div>

                 
                  <div class="col-sm-2"><br/>
                    <div class="form-group"> <div class="input-group">
<?php
$DateofRetirementdor = array('type' => 'text','name' => 'DateofRetirementdor','id' => 'DateofRetirementdor','class' => 'form-control','placeholder' =>'Date of Retirement','value' => (isset($_GET['DateofRetirementdor'])) ? $_GET['DateofRetirementdor'] : '');
echo form_input($DateofRetirementdor);
echo form_error('DateofRetirementdor');
?>
                 <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  </div>
                </div></div>

</div>
<div class="row">
 <div class="col-sm-2">  <br/>   <div class="input-group">
                 <?php
$dateofbirth = array('type' => 'text','name' => 'dateofbirth','id' => 'dateofbirth','class' => 'form-control','placeholder' =>'Date of Birth From','value' =>  (isset($_GET['dateofbirth'])) ? $_GET['dateofbirth'] : '');
echo form_input($dateofbirth);
echo form_error('dateofbirth');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div></div>
                 
                 
                

                <div class="col-sm-2">  <br/>   <div class="input-group">
                 <?php
$dateofbirth = array('type' => 'text','name' => 'dateofbirthi','id' => 'dateofbirthi','class' => 'form-control','placeholder' =>'Date of Birth To','value' =>   (isset($_GET['dateofbirthi'])) ? $_GET['dateofbirthi'] : '');
echo form_input($dateofbirth);
echo form_error('dateofbirth');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                </div>
                

               <div class="col-sm-2"><br/><div class="form-group">
<?php
$mobno = array('type' => 'number','name' => 'mobno','id' => 'mobno','class' => 'form-control','placeholder' =>'Mobile Number','value' => (isset($_GET['mobno'])) ? $_GET['mobno'] : '');
echo form_input($mobno);
echo form_error('mobno');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-2"><br/><div class="form-group">
                 <?php  
$Postingtiset = array(''=>'--Select Duty--', 'Fix Duties' => 'Fix Duties', 'Law & Order Duty' => 'Law & Order Duty', 'Special Squads' => 'Special Squads','Permanent Attachment' => 'Permanent Attachment','Training' => 'Training','Sports' => 'Sports','Available with BNs' => 'Available with BNs','Battalion Misc Duties' => 'Battalion Misc Duties','Institutions' => 'Institutions');
 echo form_dropdown('Postingtiseto', $Postingtiset, set_value('Postingtiseto', (isset($_GET['Postingtiseto'])?$_GET['Postingtiseto']:'')),'id="Postingtiset" data-placeholder="Choose One" title="Select Category of duty" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>
            <div class="col-sm-2"><Br/><div class="form-group">
<?php
$training_center = array('type' => 'text','name' => 'training_center','id' => 'training_center','class' => 'form-control','placeholder' =>'Training Center Name','value' => set_value('training_center'));
echo form_input($training_center);
echo form_error('training_center');
?>
                    <label for="training_center" class="error"></label>
                  </div>
                </div>
            <div class="col-sm-2"><Br/><div class="form-group">
<?php
$batch_no = array('type' => 'text','name' => 'batch_number','id' => 'batch_number','class' => 'form-control','placeholder' =>'Batch Number','value' => set_value('batch_number'));
echo form_input($batch_no );
echo form_error('batch_no');
?>
                    <label for="batch_number" class="error"></label>
                  </div>
                </div>
</div>
                  <div class="row">
            <div class="col-sm-2"><Br/><div class="form-group">
<?php
$year_of_passed = array('type' => 'text','name' => 'year_of_passed','id' => 'year_of_passed','class' => 'form-control','placeholder' =>'Passing Out Year','value' => set_value('year_of_passed'));
echo form_input($year_of_passed);
echo form_error('year_of_passed');
?>
                    <label for="year_of_passed" class="error"></label>
                  </div>
                </div>
                      <div class="col-sm-2"><Br/><div class="form-group">
<?php
$age_filter = array('type' => 'text','name' => 'age_filter','id' => 'age_filter','class' => 'form-control','placeholder' =>'Age Filter (eg. 23-45 or 23 or <23 or >23)','value' => set_value('age_filter'));
echo form_input($age_filter);
echo form_error('age_filter');
?>
                    <label for="age_filter" class="error"></label>
                  </div>
                </div>


                 <div class="col-sm-2" id="apart1" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset = array('' => '--Nature/Place of Duty--', 'VP Guards' => 'VP Guards','Jails Security' => 'Jails Security','Punjab Police HQRS,SEC.9,CHG' =>  'Punjab Police HQRS,SEC.9,CHG', 'DERA BEAS SECURITY DUTY' => 'DERA BEAS SECURITY DUTY','OTHER STSTIC GUARDS' => 'OTHER STATIC GUARDS','Police Officer' => 'Police Officer', 'Retired Police Officer' => 'Retired Police Officer', 'Political Persons' => 'Political Persons','Civil Officers' => 'Civil Officers','Judicial Officers' => 'Judicial Officers','Threatening persons' => 'Threatening persons','PERSONAL SECURITY STAFF ARMED WING OFFICER' => 'PERSONAL SECURITY STAFF ARMED WING OFFICER','VIP SEC.WING CHG.U/82nd BN.' => 'VIP SEC.WING CHG.U/82nd BN.','POLICE SEC.WING CHG U/13th BN.' => 'POLICE SEC.WING CHG U/13th BN.','BANK SECURITY DUTY' => 'BANK SECURITY DUTY','SPECIAL PROTECTION UNIT (C.M. SEC.)' => 'SPECIAL PROTECTION UNIT (C.M. SEC.)','PB. BHAWAN NEW DELHI (SEC. DUTY)' => 'PB. BHAWAN NEW DELHI (SEC. DUTY)') ;
 echo form_dropdown('Postingtiset', $Postingtiset, set_value('Postingtiset', (isset($_GET['Postingtiset'])) ? $_GET['Postingtiset'] : ''),'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2 l"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                   <div class="col-sm-2" id="apart2" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset2 = array('' => '--Nature/Place of Duty--', 'PERMANENT DUTY' => 'PERMANENT DUTY','DGP, RESERVES' => 'DGP, RESERVES','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY' => 'TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY') ;
 echo form_dropdown('Postingtiset2', $Postingtiset2, set_value('Postingtiset2',(isset($_GET['Postingtiset2'])) ? $_GET['Postingtiset2'] : ''),'id="Postingtise2" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                    <div class="col-sm-2"  id="apart3" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset3 = array('' => '--Nature/Place of Duty--','ANTI RIOT POLICE, JALANDHAR' => 'ANTI RIOT POLICE, JALANDHAR','ANTI RIOT POLICE, MANSA' => 'ANTI RIOT POLICE, MANSA','ANTI RIOT POLICE, MUKATSAR' => 'ANTI RIOT POLICE, MUKATSAR', 'S.D.R.F. TEAM, JALANDHAR' => 'S.D.R.F. TEAM, JALANDHAR', 'SPL. STRIKING GROUPS' => 'SPL. STRIKING GROUPS','SWAT TEAM (4TH CDO)' => 'SWAT TEAM (4TH CDO)','SOG BHG.,PTL(SPECIAL OPS.GROUP)' => 'SOG BHG.,PTL(SPECIAL OPS.GROUP)','ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','C.P.O. ATTACHMENT UNDER 13TH BN' => 'C.P.O. ATTACHMENT UNDER 13TH BN','PB. POLICE OFFICER INSTITUTE SEC 32 CHG' => 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG') ;
 echo form_dropdown('Postingtiset3', $Postingtiset3, set_value('Postingtiset3',(isset($_GET['Postingtiset3'])) ? $_GET['Postingtiset3'] : ''),'id="Postingtise3" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-2"  id="apart4" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset4 = array('' => '--Nature/Place of Duty--','ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','C.P.O. ATTACHMENT UNDER 13TH BN' => 'C.P.O. ATTACHMENT UNDER 13TH BN','PB. POLICE OFFICER INSTITUTE SEC 32 CHG' => 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG','NRI CELL MOHALI' => 'NRI CELL MOHALI', 'INTELLIGENCE WING' => 'INTELLIGENCE WING','CENTRAL POLICE LINE MOHALI' => 'CENTRAL POLICE LINE MOHALI','VIGILANCE BUREAU' => 'VIGILANCE BUREAU','STATE NARCOTIC CRIME BUREAU' => 'STATE NARCOTIC CRIME BUREAU','MOHALI AIRPORT IMMIGRATION DUTY' => 'MOHALI AIRPORT IMMIGRATION DUTY','STATE HUMAN RIGHTS COMMISSION' => 'STATE HUMAN RIGHTS COMMISSION','BUREAU OF INVESTIGATION' => 'BUREAU OF INVESTIGATION','SPECIAL TASK FORCE(STF)' => 'SPECIAL TASK FORCE(STF)','PPSSOC' => 'PPSSOC','RTC/PAP, JALANDHAR' => 'RTC/PAP, JALANDHAR','ISTC/PAP, KAPURTHALA' => 'ISTC/PAP, KAPURTHALA','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA' => 'POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','RTC LADDA KOTHI SANGRUR' => 'RTC LADDA KOTHI SANGRUR','PUNJAB POLICE ACADEMY PHILLAUR' => 'PUNJAB POLICE ACADEMY PHILLAUR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN' => 'POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','AD GUARD CP JALL' => 'AD GUARD CP JALL', 'AD GUARD CP ASR' => 'AD GUARD CP ASR','AD GUARD DISTT MKT' => 'AD GUARD DISTT MKT','AD GUARD DISTT LDH' => 'AD GUARD DISTT LDH','AD GUARD DISTT BTL' => 'AD GUARD DISTT BTL') ;
 echo form_dropdown('Postingtiset4', $Postingtiset4, set_value('Postingtiset4',(isset($_GET['Postingtiset4'])) ? $_GET['Postingtiset4'] : ''),'id="Postingtise4" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                 <div class="col-sm-2"  id="apart5" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','BASIC TRANING' => 'BASIC TRANING','PROMOTIONAL COURSE' => 'PROMOTIONAL COURSE','DEPARTMENT COURSE' => 'DEPARTMENT COURSE') ;
 echo form_dropdown('Postingtiset5', $Postingtiset5, set_value('Postingtiset5',(isset($_GET['Postingtiset5'])) ? $_GET['Postingtiset5'] : ''),'id="Postingtise5" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-2"  id="apart6" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','DSO' => 'DSO','CSO, JALANDHAR' => 'CSO, JALANDHAR','NIS PATIALA' => 'NIS PATIALA','OTHERS' => 'OTHERS') ;
 echo form_dropdown('Postingtiset6', $Postingtiset5, set_value('Postingtiset6',(isset($_GET['Postingtiset6'])) ? $_GET['Postingtiset6'] : ''),'id="Postingtise6" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-2"  id="apart7" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','PAP CAMPUS  SECURITY' => 'PAP CAMPUS  SECURITY','BN. KOT GUARDS' => 'BN. KOT GUARDS','BN. HQRS OTHER GUARDS' => 'BN. HQRS OTHER GUARDS','STATIC GUARD CR' => 'STATIC GUARD CR','OFFICE STAFF IN HIGHER OFFICES' => 'OFFICE STAFF IN HIGHER OFFICES','Commandant office' => 'Commandant office', 'Asstt. Commandant office' => 'Asstt. Commandant office', 'Dy.S.P. office' => 'Dy.S.P. office', 'English Branch' => 'English Branch','Account Branch' => 'Account Branch' , 'OSI Branch' => 'OSI Branch', 'Litigation Branch' => 'Litigation Branch', 'Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer Cell' => 'Computer Cell','Control Room' => 'Control Room','Reader to INSP' => 'Reader to INSP','CCTNS office' => 'CCTNS office','Nodal Officer' => 'Nodal Officer','Recruitment Cell' => 'Recruitment Cell','Photostate Machine operator' => 'Photostate Machine operator','TRADEMEN' => 'TRADEMEN','M.T. SECTION' => 'M.T. SECTION','Reserve Inspector' => 'Reserve Inspector','Line Officer' => 'Line Officer','BHM & A/BHM' => 'BHM & A/BHM','MHC & A/MHC' => 'MHC & A/MHC','Reader/Orderly to RI' => 'Reader/Orderly to RI','I/C MESS' => 'I/C MESS','Asst. I/C MESS' => 'Asst. I/C MESS', 'CDI' => 'CDI','CDO & A/CDO' => 'CDO & A/CDO','Quarter Master INSP' => 'Quarter Master INSP','MSK Branch' => 'MSK Branch','KHC' => 'KHC','Armourer & A/Armourer' => 'Armourer & A/Armourer','I/C Class-IV' => 'I/C Class-IV','Quarter Munshi & Asstt.' => 'Quarter Munshi & Asstt.','I/C Canteen & Grossary Shop' => 'I/C Canteen & Grossary Shop','CHC' => 'CHC','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY' => 'GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','TRG. RESERVE AT BN.HQRS.' => 'TRG. RESERVE AT BN.HQRS.','OTHER DUTIES' => 'OTHER DUTIES');
 echo form_dropdown('Postingtiset7', $Postingtiset5, set_value('Postingtiset7',(isset($_GET['Postingtiset7'])) ? $_GET['Postingtiset7'] : ''),'id="Postingtise7" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                      <div class="col-sm-2"  id="apart8" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset8 = array('' => '--Nature/Place of Duty--','RECRUIT' => '->RECRUIT','Earned Leave' => '->EARNED LEAVE','Casual Leave' => '->CASUAL LEAVE','Paternity Leave'  => '->PATERNITY LEAVE','Medical Leave'  => '->MEDICAL LEAVE','Ex-India Leave' => '->EX-INDIA LEAVE','Others' => '->OTHERS','ABSENT' => '->ABSENT','UNDER SUSPENSION' => '->UNDER SUSPENSION','Handicapped on Medical Rest' => '->HANDICAPPED ON MEDICAL REST','Handicapped on light duty' => '->HANDICAPPED ON LIGHT DUTY', 'Chronic Disease on light duty' => '->CHRONIC DISEASE ON LIGHT DUTY', 'Chronic Disease on Medical Rest' => '->CHRONIC DISEASE ON MEDICAL REST', 'OSD ETC' => '->OSD ETC');
 echo form_dropdown('Postingtiset8', $Postingtiset8, set_value('Postingtiset8',(isset($_GET['Postingtiset8'])) ? $_GET['Postingtiset8'] : ''),'id="Postingtise8" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>


                  <div class="col-sm-2"  id="apart9" style="display: none;"><br/><div class="form-group">
                 <?php  
$Postingtiset5 = array('' => '--Nature/Place of Duty--','PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','BUGGLER' => 'BUGGLER','T/A 7th Bn PAP for Driver Duty' => 'T/A 7th Bn PAP for Driver Duty','U/7th PAP for out Rider duty on Motor Cycle' => 'U/7th PAP for out Rider duty on Motor Cycle','M.T WORKSHOP U/7th BN PAP' => 'M.T WORKSHOP U/7th BN PAP','PAP House' => 'PAP House','Camp Cleaning U/7th BN.PAP' => 'Camp Cleaning U/7th BN.PAP', 'A/A Punjab State U/7th BN.PAP' =>  'A/A Punjab State U/7th BN.PAP','IRB Institutions' => 'IRB Institutions','CDO Institutions' => 'CDO Institutions', 'PAP Outer Bn Institutions' => 'PAP Outer Bn Institutions');
 echo form_dropdown('Postingtiset9', $Postingtiset5, set_value('Postingtiset9',(isset($_GET['Postingtiset9'])) ? $_GET['Postingtiset9'] : ''),'id="Postingtise9" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Postingtiset');
 ?>
            
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>
        
         <div class="col-sm-3 text-center align-middle"  id="apart10"><br/>
          <div class="form-group">
          <input type="radio" name="advancedSearch" id="advancedSearch">
                    &nbsp;&nbsp;<label for="advancedSearch">Advanced Sorting</label>
                  </div>
                </div>

                      
    
  <div class="col-sm-3"><br/>
                   <button type="submit" class="btn btn-primary" onClick="osi_records.dataTable.draw();return false;">Submit</button>
                   <a href="<?php echo base_url('bt-osi-old'); ?>" class="btn btn-default">Reset</a>
                   <button name="download" value="download" class="btn btn-primary" onClick="downloadExcel()">Download Excel</button>
                </div>

</div>

<?php echo form_close(); ?>
          </div>
        <div class="panel-body"> 
          <!-- Example split danger button -->
          <h2>Total Entries: <?php echo $counts; ?></h2>
          <div class="table-responsive">
     
       <table id="osi_data" class="table">
       <thead>
                 <tr>
            <th>S.No</th>
            <!--th>Posting</th-->
            <!--th>Edit</th-->
            <!--th>Delete</th-->
            <th>View All Info</th>
            <th>Battalion Unit</th>
            <th>Name</th>
            <th>Present Rank</th>
            <th>Permanent Rank</th>
            <th>Dept. No </th>
            <th>District</th>      
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Date of Enlistment</th>
            <th>Caste</th>
            <th>Category</th>
            <th>Phone</th>
            <th>Blood Group</th>
            <th> Education/ Qualified</th>
            <th>Computer literate</th>
            <th>Qualified Courses</th>
            <th>Courses Name</th>
            <th>Date of Retirement</th>
            <!--th>Extension Retirement Date</th-->
            <th>Bank AC No.</th>
            <th>Height</th>
            <th>GPF Pol No /PRAN No.</th>
            <th>Good entries</th>
            <th>Bad entries</th>
            <th>Training Institute</th>
            <th>Batch Number</th>
            <th>Year of Passed</th>
            <th>Old Posting Details</th>
            <th>Date of Posting</th>
            <th>New Posting Details</th>
            <th>Date of Posting</th>
            <th>History</th>
                </tr>
              </thead>
        <tbody>
        </tbody>
       </table>
          </div><!-- table-responsive -->  
          <?php //echo $links; ?> 
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
<!--script src="<?php //echo base_url(); ?>webroot/data/js/jquery.dataTables.min.js"></script-->
<script src="<?php echo base_url();?>webroot/js/jquery.dataTables.min2015.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/vfs_fonts.js"></script></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.colVis.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datepicker3.min.js"></script>
<script type="text/javascript">
var selectedClasses = [];
<?php if(null!=$this->input->get('classes')){
  ?>selectedClasses = JSON.parse('<?php echo json_encode($this->input->get('classes')); ?>');<?php
}?>

jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control"),
  jQuery('#DateofRetirementdor').datepicker({format: "yyyy-mm-dd"}); 
  jQuery('#ircd').datepicker({format: "dd/mm/yyyy"});
  jQuery('#id').datepicker({format: "dd/mm/yyyy"});
  jQuery('#ircdi').datepicker({format: "dd/mm/yyyy"});
  jQuery('#idi').datepicker({format: "dd/mm/yyyy"});
  jQuery('#dateofesnlistment1').datepicker({format: "yyyy-mm-dd"});
  jQuery('#edateofesnlistment1').datepicker({format: "yyyy-mm-dd"});

  
  jQuery('#dateofbirth').datepicker({format: "yyyy-mm-dd"});
  jQuery('#dateofbirthi').datepicker({format: "yyyy-mm-dd"});
  
  var courses = $('#stts').val();
  if(courses!=null){
    console.log(courses);
    for(var i = 0;i<courses.length;i++) {
      
      switch(courses[i]){
        case 'Graduate':
        $.each(Graduate, function(key,value) {
          var newOption = new Option(key, value, false, false);
          $('#classes').append(newOption).trigger('change');
        });
        break;
        case 'Under Graduate':
        $.each(UnderGraduate, function(key,value) {
          var newOption = new Option(key, value, false, false);
          $('#classes').append(newOption).trigger('change');
        });
        break;
        case 'Post Graduate':
        $.each(PostGraduate, function(key,value) {
          var newOption = new Option(key, value, false, false);
          $('#classes').append(newOption).trigger('change');
        });
        break;
      case 'Doctorate':
        $.each(Doctorate, function(key,value) {
          var newOption = new Option(key, value, false, false);
          $('#classes').append(newOption).trigger('change');
        });
        break;
      }
    }
  }
  
  $('#classes').val(selectedClasses).trigger('change');
  /*for(var i=0;i<selectedClasses.length;i++){ 
    console.log('hi');
    $('#classes').val(selectedClasses[i]).trigger('change'); 
  } */
  
  <?php
    $rankrankre_ = '';
    if(null!=$this->input->get('RankRankre')){
      $rankrankre_ = $this->input->get('RankRankre');
    }
  ?>
  var rankrankre = '<?php echo $rankrankre_; ?>';
  
  switch(rankrankre){
    case 'Executive Staff':
     $('#eors1').show();
     $('#eors2').hide();
     $('#eors3').hide();
      $('#eors4').hide();
      $('#eors5').hide();
      break;
    case 'Medical Staff':
     $('#eors3').show();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').hide();
      break;
     case 'Ministerial Staff':
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').show();
      $('#eors4').hide();
      $('#eors5').hide();
      break;
     case 'Class-IV (P)':
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').show();
      $('#eors5').hide();
      break;
     case 'Class-IV (C)':
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').show();
      break;
     default:
    $('#eors1').show();
     $('#eors2').hide();
     $('#eors3').hide();
      $('#eors4').hide();
      $('#eors5').hide();
      break;
     
  }
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
var object;
  /* $(document).on('change', '#classes', function() {
    console.log('changing-------------');
    selectedClasses=[];
    selectedClasses.length = 0;
    $.each(this, function(key,option) {
      if(option.selected){
        console.log(this.value);
        selectedClasses.push(this.value);
      }
    });
  }); */
  $(document).on('change', '#stts', function() {
    //$('#classes').empty();
    $.each(this, function(key,option) {
      if(option.selected){
        
      //console.log(key+ ' ' + option.value + ' '+ option.innerHTML); 
      switch(this.value){
          case 'Graduate':
          $.each(Graduate, function(key,value) {
            var newOption = new Option(key, value, false, false);
            $('#classes').append(newOption).trigger('change');
          });
          break;
          case 'Under Graduate':
          $.each(UnderGraduate, function(key,value) {
            var newOption = new Option(key, value, false, false);
            $('#classes').append(newOption).trigger('change');
          });
          break;
          case 'Post Graduate':
          $.each(PostGraduate, function(key,value) {
            var newOption = new Option(key, value, false, false);
            $('#classes').append(newOption).trigger('change');
          });
          break;
        case 'Doctorate':
          $.each(Doctorate, function(key,value) {
            var newOption = new Option(key, value, false, false);
            $('#classes').append(newOption).trigger('change');
          });
          break;
        }
      }
    //var newOption = new Option(key, value, false, false);
    //$('#classes').append(newOption).trigger('change');
    });
    $('#classes').val(selectedClasses).trigger('change');
    //alert(this.value);
    //add a value
    /*this.each(function(key,value) {
    alert(key+' '+value.val());
  });*/
    //$('#classes').empty();
    //get teh selected courses
    //get the courses under the selected courses
    //add them to the field
    
  /*$.each(UnderGraduate, function(key,value) {
    var newOption = new Option(key, value, false, false);
    $('#classes').append(newOption).trigger('change');
  });*/
  /* - --------------- Old Code ------------------
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
   /* - --------------- Old Code ------------------*/
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
    $('#eors1').show();
     $('#eors2').hide();
     $('#eors3').hide();
      $('#eors4').hide();
      $('#eors5').hide();
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
$(document).ready(function(){
  var val = $('#Postingtiset').val();
  switch(val){
  case 'Fix Duties':
     $('#apart1').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   break;
   case 'Law & Order Duty':
     $('#apart2').show();
     $('#apart1').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   break;
   case 'Special Squads':
     $('#apart3').show();
     $('#apart2').hide();
     $('#apart1').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   break;
   case 'Permanent Attachment':
     $('#apart4').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart1').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   break;
   case 'Training':
     $('#apart5').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart1').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   break;
   case 'Sports':
     $('#apart6').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart1').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   break;
   case 'Available with BNs':
     $('#apart7').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart1').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   break;
   case 'Battalion Misc Duties':
     $('#apart8').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart1').hide();
     $('#apart9').hide();
   break;
   case 'Institutions':
     $('#apart9').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart1').hide();
   break;
   default:
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
var osi_records = {};
osi_records.mobno = $('#mobno').val();

osi_records.dataTable = '';
function initializeOsiData(){
  osi_records.dataTable = $('#osi_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    bFilter: false,
    "ajax":{
      url:"<?php echo base_url().'ajax-osi-users-data';?>",
      type:"POST" ,
      "data":function(data){
        data.ito = [<?php echo $battalion_id; ?>],
        data.mobno =  $('#mobno').val(),
        data.name = $('#name').val(),
        data.bloodgroup = $('#bloodgroup').val(),
        data.rcnum= $('#rcnum').val(),
        data.RankRankre = $('#RankRankre').val(),
        data.eor1= $('#eor1').val(),
        data.eor2= $('#eor2').val(),
        data.eor3= $('#eor3').val(),
        data.eor4= $('#eor4').val(),
        data.eor5= $('#eor5').val(),
        data.postate= $('#postate').val(),
        data.pcity= $('#dis').val(),
        data.stts= $('#stts').val(),
        data.classes= $('#classes').val(),
        data.UnderGraduate= $('#ug').val(),
        data.Graduate= $('#Graduate').val(),
        data.PostGraduate= $('#PostGraduate').val(),
        data.Doctorate= $('#doc').val(),
        data.gender= $('#gender').val(),
        data.single= $('#single').val(),
        data.Modemdr= $('#Modemdr').val(),
        data.Rankre= $('#Rankre').val(),
        data.Enlistmentec= $('#Enlistmentec').val(),
        data.InductionModeim= $('#InductionModeim').val(),
        data.clit= $('#clit').val(),
        data.EnlistmentUnit = $('#').val(),
        data.dateofesnlistment1 = $('#dateofesnlistment1').val(),
        data.dateofesnlistment2 = $('#edateofesnlistment1').val(),
        data.NamesofsCourses1 = $('#NamesofsCourses').val(),
        data.NamesofsCourses2 = $('#NamesofsCourses2').val(),
        data.DateofRetirementdor = $('#DateofRetirementdor').val(),
        data.dateofbirth = $('#dateofbirth').val(),
        data.dateofbirthi = $('#dateofbirthi').val(),
        data.height = $('#height').val(),
        data.inch = $('#inch').val(),
        data.PostingSetToBeUsed = $('#Postingtiset').val(),
        data.Postingtiset  = $('#Postingtiseto').val(),
        data.Postingtiset2 = $('#Postingtise2').val(),
        data.Postingtiset3 = $('#Postingtise3').val(),
        data.Postingtiset4 = $('#Postingtise4').val(),
        data.Postingtiset5 = $('#Postingtise5').val(),
        data.Postingtiset6 = $('#Postingtise6').val(),
        data.Postingtiset7 = $('#Postingtise7').val(),
        data.Postingtiset8 = $('#Postingtise8').val(),
        data.Postingtiset9 = $('#Postingtise9').val(),
        data.advancedSearch = $('#advancedSearch').is(':checked'),
        data.training_institutes = $('#training_institutes_1').val(),
		data.courses = $('#courses').val(),
        data.basic_training_center = $('#training_center').val(),
        data.batch_number = $('#batch_number').val(),
        data.passoutyear = $('#year_of_passed').val(),
        data.age_filter = $("#age_filter").val(),
        data.all_battalions =[<?php echo $battalion_id; ?>]
      },
    },"columns": [
                    { "data": "sno"},
                    //{ "data": "posting"},
                    //{ "data": "edit"},
                    /*{ "data": "delete"},*/
                    { "data": "view"},
                    { "data": "battalion_unit"},
          { "data": "name"},
          { "data": "present_rank"},
          { "data": "permanent_rank"},
          { "data": "depttno"},
          { "data": "district"},
          { "data": "gender"},
          { "data": "maritalstatus"},
          { "data": "dateofbith"},
          { "data": "age"},
          { "data": "dateofinlitment"},
          { "data": "caste"},
          { "data": "category"},
          { "data": "mobile"},
          { "data": "bloodgroup"},
          { "data": "eduqalification"},
          { "data": "comlit"},
          { "data": "NamesofCourses"},
          { "data": "nm"},
          { "data": "dateofretirement"},
          //{ "data": "dateofretirement2"},
          { "data": "bankacno"},
          { "data": "height"},
          { "data": "gpfpranno"},
          { "data": "gd1"},
          { "data": "bd1"},
          { "data":"training_institute"},
          { "data":"batch_no"},
          { "data":"year_of_passed"},
          { "data": "posting_concat1"},
          { "data": "dateofposting1"},
          { "data": "new_posting"},
          { "data": "date_of_posting"},
          { "data": "seeHistory"}
                 ],
     "columnDefs":[  
                {  
                     "targets":[0,2],  
                     "orderable":false,  
                },  
        {
          "targets":[1,2],
          "className":"text-right",
        },
           ], 
      "initComplete": function(settings, json) {
        //console.log(settings);
        console.log(json.query);
      },
      scrollY: 350,
      scrollX: 800
  });
  
};

$(document).ready(function() {
  initializeOsiData();
var table = $('#table').DataTable( {
        // dom: 'C<"clear">Bfrtip',

       /*buttons: [
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
        },*/
         scrollY: 350,
        scrollX: 800
    } );
  

});

function downloadExcel(){
  $('#preloader').css('display','inline');
  
  $.ajax({
    url:"<?php echo base_url(); ?>ajax-osi-user-download-excel",
    method:"POST",
    data:{
      ito : [<?php echo $battalion_id; ?>],
      mobno :  $('#mobno').val(),
      name : $('#name').val(),
      bloodgroup : $('#bloodgroup').val(),
      rcnum: $('#rcnum').val(),
      RankRankre : $('#RankRankre').val(),
      eor1: $('#eor1').val(),
      eor2: $('#eor2').val(),
      eor3: $('#eor3').val(),
      eor4: $('#eor4').val(),
      eor5: $('#eor5').val(),
      postate: $('#postate').val(),
      pcity: $('#dis').val(),
      stts: $('#stts').val(),
      classes: $('#classes').val(),
      UnderGraduate: $('#ug').val(),
      Graduate: $('#Graduate').val(),
      PostGraduate: $('#PostGraduate').val(),
      Doctorate: $('#doc').val(),
      gender: $('#gender').val(),
      single: $('#single').val(),
      Modemdr: $('#Modemdr').val(),
      Rankre: $('#Rankre').val(),
      Enlistmentec: $('#Enlistmentec').val(),
      InductionModeim: $('#InductionModeim').val(),
      clit: $('#clit').val(),
      EnlistmentUnit : $('#').val(),
      dateofesnlistment1 : $('#dateofesnlistment1').val(),
      dateofesnlistment2 : $('#edateofesnlistment1').val(),
      NamesofsCourses1 : $('#NamesofsCourses').val(),
      NamesofsCourses2 : $('#NamesofsCourses2').val(),
      DateofRetirementdor : $('#DateofRetirementdor').val(),
      dateofbirth : $('#dateofbirth').val(),
      dateofbirthi : $('#dateofbirthi').val(),
      height : $('#height').val(),
      inch : $('#inch').val(),
      PostingSetToBeUsed : $('#Postingtiset').val(),
      Postingtiset  : $('#Postingtiseto').val(),
      Postingtiset2 : $('#Postingtise2').val(),
      Postingtiset3 : $('#Postingtise3').val(),
      Postingtiset4 : $('#Postingtise4').val(),
      Postingtiset5 : $('#Postingtise5').val(),
      Postingtiset6 : $('#Postingtise6').val(),
      Postingtiset7 : $('#Postingtise7').val(),
      Postingtiset8 : $('#Postingtise8').val(),
      Postingtiset9 : $('#Postingtise9').val(),
      advancedSearch : $('#advancedSearch').is(':checked'),
	  training_institutes : $('#training_institutes_1').val(),
	  courses : $('#courses').val(),
          age_filter: $('#age_filter').val(),
          all_battalions :[<?php echo $battalion_id; ?>]
    },
    dataType:'json'
  }).done(function(data1){
    //$('#preloader').css('display','inline');
    //console.log('fetching');
    var $a = $("<a>");
    $a.attr("href",data1.file);
    $("body").append($a);
    $a.attr("download","osi_emp_list.xls");
    $a[0].click();
    $a.remove();
    $('#preloader').css('display','none');
  });
  //$('#preloader').css('display','none');
}

</script>
<!-- View Posting History of selected employee -->
<style>
    .modal-posting{width:100%;}
    .modal-in-posting{width:90%;width:1200px;}
</style>

<div class="modal fade modal-lg modal-posting" id="postingHistoryOfEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-in-posting" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Posting History of <span id="posting_employee_name">Dalwinderjit Singh</span>(<span id="posting_employee_battalion">27</span>/<span id="posting_employee_regimental_no">275</span>).</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 <script type="text/javascript">
	  var posting_history_obj ={};
	  posting_history_obj.employee_id = null;
	  posting_history_obj.getPostingHistory = function(employee_id){
		  posting_history_obj.employee_id = employee_id;
		  if(posting_history_obj.dataTable===undefined){
			  //alert('new');
			  posting_history_obj.initialize();
		  }else{
			//  alert('old');
			  posting_history_obj.dataTable.draw();
		  }
		  $('#postingHistoryOfEmployee').modal('show');
		  //posting_history_obj.dataTable.draw();
	  }
	  $(document).ready(function(){
		  //posting_history_obj.getPostingHistory(24144);
	  });
	//########################### POSTING HISTORY OF EMPLOYEE ##################################
	posting_history_obj.initialize = function(){
		posting_history_obj.dataTable = $('#posting_history_table').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			
			//bFilter: false,
			"ajax":{
				url:"<?php echo base_url().'battalion/ajax-get-all-posting-history-by-employee-id';?>",
				type:"POST" ,
				"data":function(data){
					data.employee_id =  posting_history_obj.employee_id
				}
			},"columns": [
						{ "data": "sno"},
						{ "data": "posting_name"},
						{ "data": "order_no"},
						{ "data": "battalion"},
						{ "data": "posting_date"},
						{ "data": "order_date"},
			],
			"columnDefs":[  
					{  
						 "targets":[0,2],  
						 "orderable":false,  
					},  
					{
						"targets":[1,2],
						"className":"text-left",
					},
			], 
			"initComplete": function(settings, json) {
				//console.log(settings);
				//console.log('hi');
				//console.log(json);
				$('#posting_employee_name').html(json.name);
				$('#posting_employee_regimental_no').html(json.regimental_no);
				$('#posting_employee_battalion').html(json.battalion);
				
			},
			"drawCallback": function( settings ) {
				console.log(settings.json);
				var json = settings.json;
				$('#posting_employee_name').html(json.name);
				$('#posting_employee_regimental_no').html(json.regimental_no);
				$('#posting_employee_battalion').html(json.battalion);
			}
		}); 
		
	}
	//#############################################################
	  </script>
      <div class="modal-body" id="posting_history">
		<table class="table" id="posting_history_table" style="width:100%;">
			<thead>
				<tr><td>S.no</td><td>Posting</td><td>Order Number</td><td>Battalion</td><td>Posting Date</td><td>Order Date</td></tr>
			</thead>
			
		</table>
		
      <div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>