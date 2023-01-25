<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deposit Material</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
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
      <h3> &nbsp;  &nbsp;  &nbsp; Deposit Material</h3>
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
		  
			<!--div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						Category of item  : <?php //echo $issued_material->typeofitem; ?><br>
						Name of item  : <?php //echo $issued_material->nameofitem; ?><br>
						Quantity : <?php //echo $issued_material->quantity; ?><br>
						Quantity : <?php// echo $issued_material->condition_of_item; ?><br>
					</div>
				</div>
			</div-->
              <div class="panel-body">
				 <div class="form-group">
                  <label class="col-sm-3 control-label">Category of Item</label>
                  <div class="col-sm-9">
					<input class="form-control" disabled value="<?php echo $issued_material->typeofitem; ?>">
                  </div>
                </div> 
				<div class="form-group">
                  <label class="col-sm-3 control-label">Name of Item</label>
                  <div class="col-sm-9">
					<input class="form-control" disabled value="<?php echo $issued_material->nameofitem; ?>">
                  </div>
                </div> 
				<div class="form-group">
                  <label class="col-sm-3 control-label">Issue To</label>
                  <div class="col-sm-9">
					<?php 
						$issue_name_='';
						$value = $issued_material;
					$oman = fetchoneinfo('newosi',array('man_id' => $value->officer)); 
                    if($oman!=''){
                        $issue_name_ .=  $oman->name;
                      }

                      $man = fetchoneinfo('newosi',array('man_id' => $value->manpower)); 
                    if($man!=''){
                        $issue_name_ .= $man->name;
                      }

                      $vat = fetchoneinfo('users',array('users_id' => $value->other_battalion)); 



                    if($vat!=''&& !in_array($value->Issuedto,array('Official','Other Battalion/unit','Self Battalion',"Institutions Duty","Special Team Duty","Other Attachment Duties","Sports Attachments","Admin Block",'Other','Admin Block'))){
                        $issue_name_ .= $vat->nick."&nbsp;";
                      }
                      if($value->self_battalion!=''){
                        $issue_name_ .= $value->self_battalion;
                      }
					  
                      $issue_name_ .= '&nbsp; '.$value->details .$value->district.'';  
                      ?>
					<input class="form-control" disabled value="<?php echo $issue_name_; ?>">
                  </div>
                </div> 
				<div class="form-group">
                  <label class="col-sm-3 control-label">Issue RC Number</label>
                  <div class="col-sm-9">
					<input class="form-control" disabled value="<?php echo $issued_material->issue_rc_no; ?>">
                  </div>
                </div> 
				<div class="form-group">
                  <label class="col-sm-3 control-label">Issue RC Date</label>
                  <div class="col-sm-9">
					<input class="form-control" disabled value="<?php echo $issued_material->issue_rc_date; ?>">
                  </div>
                </div> 
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
					<input class="form-control" disabled value="<?php echo $issued_material->quantity; ?>">
                  </div>
                </div> 
				 <div class="form-group" id="mod22">
                  <label class="col-sm-3 control-label">Quantity</label>
                  <div class="col-sm-9">
<?php
$in = array('type' => 'text','name' => 'in','id' => 'in','class' => 'form-control','placeholder' =>'Quantity','value' => set_value('in'));
echo form_input($in);
echo form_error('in');
?>

                <label for="in" class="error"></label>
                  </div>
                </div> 
				
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Condition of Item</label>
                  <div class="col-sm-9">
                 <?php  
$cni = array('A' => 'A', 'B' => 'B');
//var_dump($issued_material);
/*newarea Textfield*/
 echo form_dropdown('cni', $cni, $issued_material->condition_of_item,'id="cni" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cni');
/*----End newarea Textfield----*/
 ?>
                    <label for="cni" class="error"></label>
                  </div>
                </div> 

               

               <div class="form-group">
                  <label class="col-sm-3 control-label">Deposit Mode</label>
                  <div class="col-sm-9">
                 <?php  
$mod = array('' => '--Select--', 'Deposited back in store' => 'Deposited back in store','Deposited for repair' => 'Deposited for repair', 'Deposited for Condemnation' =>'Deposited for Condemnation',
  'Deposited after repair'=>'Deposited after repair');
/*newarea Textfield*/
 echo form_dropdown('mod', $mod, set_value('mod',1),'id="mod" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('mod');
/*----End newarea Textfield----*/
 ?>
                    <label for="mod" class="error"></label>
                  </div>
                </div>

            

                

               

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Deposit by</label>
                  <div class="col-sm-9">
                 <?php  
$Issuedto = array('' => '--Select--', 'Official' => 'Official','Other Battalion/unit' => 'Other Battalion/unit','Self Battalion' => 'Self Battalion', 'Repairing unit' => 'Repairing unit', 'Other' => 'Other','Special Team Duty' => 'Special Team Duty','Institutions Duty' => 'Institutions Duty','Other Attachment Duties' => 'Other Attachment Duties', 'Sports Attachments' => 'Sports Attachments','Admin Block' => 'Admin Block');
/*newarea Textfield*/
 echo form_dropdown('Issuedto', $Issuedto, $issued_material->Issuedto,'id="Issuedto" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" disabled="disabled"'); 
 echo form_error('Issuedto');
/*----End newarea Textfield----*/

                    
 ?>
                    <label for="Issuedto" class="error"></label>
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
 echo form_dropdown('batslist', $ito, set_value('batslist',''),'id="batslis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('batslist');
/*----End newarea Textfield----*/
 ?>
                 <label for="batslist" class="error"></label>
                  </div>
                </div>


                  <div class="form-group" id="Issuedto1" style="display:none;">
                  <label class="col-sm-3 control-label">Issued To</label>
                  <div class="col-sm-9">
                 <input type="text" id="search-box"  placeholder="Issued To" class = "form-control" />
                    <div id="suggesstion-box"></div>
                    <input type="hidden" name="nop" id="idinfo" value=""/>
                  </div>
                </div>

      <!--  <div class="form-group" >
                  <label class="col-sm-3 control-label">Man Power</label>
                  <div class="col-sm-9">

                 <?php 
                 /*$nop = array();
                 $nop[''] = '--Select--';
                 foreach ($body as $value) {
                   $nop[$value->man_id] = 'Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->presentrank. '&nbsp; Dept No:'.$value->depttno.'&nbsp; Contact No: '.$value->phono1;
                 }*/
/*newarea Textfield*/
/* echo form_dropdown('nop', $nop, set_value('nop',''),'id="nop" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nop');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="nop" class="error"></label>
                  </div>
                </div> -->

                 <div class="form-group"  id="Issuedto3" style="display:none;">
                   <label class="col-sm-3 control-label">Other battalion/unit</label>
                  <div class="col-sm-9">
                   <?php  
                    $ito = array();
                    foreach ($unamei as $value) {
                      $ito[''] = '--Select--';
                      $ito[$value->users_id] = $value->nick;
                 } 
/*newarea Textfield*/
 echo form_dropdown('obito', $ito, set_value('obito',1),'id="obito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('obito');
/*----End newarea Textfield----*/
 ?>
                    <label for="obito" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="Issuedto4" style="display:none;">
                   <label class="col-sm-3 control-label">Self Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                  $ito = array('' => '--Select--',  'Commandant office' => 'Commandant office','Asst. Commandant office' => 'Asst. Commandant office', 'DSP office' => 'DSP office','English Branch' => 'English Branch','Account Branch' => 'Account Branch','OSI Branch' => 'OSI Branch','Litigation Branch' => 'Litigation Branch','Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer cell' => 'Computer cell','Line officer' => 'Line officer','BHM & ABHM' => 'BHM & ABHM','MHC & AMHC' => 'MHC & AMHC','Orderly' => 'Orderly', 'CDO & ACDO' => 'CDO & ACDO','CDI' => 'CDI','CLI' => 'CLI', 'I/c GROUND' => 'I/c GROUND','Telephone Opr'  => 'Telephone Opr','Reader to Comdt' => 'Reader to Comdt','Reader to A/Comdt' => 'Reader to A/Comdt','Reader to DSP/ADJ' => 'Reader to DSP/ADJ','Reader to DSP' => 'Reader to DSP'); 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/ 
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                <div class="form-group"  id="Issuedto5" style="display:none;">
                  <label class="col-sm-3 control-label">Repairing unit Name</label>
                  <div class="col-sm-9">
                 <?php  
$run = array();
$run[''] = '--Select--';
                 
/*newarea Textfield*/
 echo form_dropdown('run', $run, set_value('run',''),'id="run" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('run');
/*----End newarea Textfield----*/
 ?>
                    <label for="run" class="error"></label>
                  </div>
                </div> 


                 <div class="form-group" id="MudDuties1"  style="display:none">
                  <label class="col-sm-3 control-label">Mud Duties</label>
                  <div class="col-sm-9">
 <?php  
$MudDuties = array('' => '--Select--', 'Reserve Inspector' => 'Reserve Inspector', 'Line Officer' => 'Line Officer', 'BHM' => 'BHM','A-BHM'=> 'A-BHM','A/BHM'=> 'A/BHM', 'MHC' => 'MHC', 'A/MHC' => 'A/MHC',  'Orderly to RI' => 'Orderly to RI','CDI' => 'CDI','CDO' => 'CDO','A/CDO' => 'A/CDO', 'Quarter Master INSP' => 'Quarter Master INSP','KHC' => 'KHC','A/KHC' => 'A/KHC','MSK' => 'MSK','A/MSK' => 'A/MSK',  'Armourer ' => 'Armourer','A/Armourer' => 'A/Armourer', 'I/C Class-IV' => 'I/C Class-IV','Quarter Munshi  Asstt.' => 'Quarter Munshi Asstt.','Quarter Munshi' => 'Quarter Munshi','I/C Mess' => 'I/C Mess','I/C Mess Asstt.' => 'I/C Mess Asstt.','I/C Canteen' => 'I/C Canteen','Grossary Shop' => 'Grossary Shop', 'Incharge' => 'Incharge', 'Incharge Asstt'=> 'Incharge Asstt','CHC' => 'CHC','I/C Training Store' => 'I/C Training Store','I/C Sets & I Fats' => 'I/C Sets & I Fats','I/C Gas Agency' => 'I/C Gas Agency','I/C CHC' => 'I/C CHC');
 echo form_dropdown('MudDuties', $MudDuties, '','id="MudDuties" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('MudDuties'); 
 ?>
                    <label for="MudDuties" class="error"></label>
                  </div>
                </div>

                   <div class="form-group"  id="GeneralStaff1"  style="display:none">
                  <label class="col-sm-3 control-label">General Staff</label>
                  <div class="col-sm-9">
 <?php  
$GeneralStaff = array('' => '--Select--', 'On-Duty' => 'On-Duty', 'Misc' => 'Misc','Range Armourer' => 'Range Armourer', 'Control Room PAP' => 'Control Room PAP', 'Wireless Office PAP' => 'Wireless Office PAP', 'AIA Punjab State' => 'AIA Punjab State', 'Recration Room' => 'Recration Room','Canteen' => 'Canteen','MTO' => 'MTO','KOT' => 'KOT','MSK' => 'MSK','Library' => 'Library','Mutli Purpose Hall' => 'Mutli Purpose Hall');
 echo form_dropdown('GeneralStaff', $GeneralStaff, '','id="GeneralStaff" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('GeneralStaff');
 ?>
                    <label for="GeneralStaff" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group"   id="MTSectionf1"  style="display:none">
                  <label class="col-sm-3 control-label">MT Section</label>
                  <div class="col-sm-9">
 <?php  
$MTSectionf = array('' => '--Select--', 'MTO' => 'MTO', 'Asstt. MTO-cum- Garage GC' => 'Asstt. MTO-cum- Garage GC','MHC-cum- I/C MT Store' => 'MHC-cum- I/C MT Store','AMHC-cum- Asstt. MT Store' => 'AMHC-cum- Asstt. MT Store','I/C Patrol Pump &amp; Asstt.' =>'I/C Patrol Pump &amp; Asstt.','Mechanics' => 'Mechanics','Drivers' => 'Drivers','Any Other' => 'Any Other');
 echo form_dropdown('MTSectionf', $MTSectionf, '','id="MTSectionf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('MTSectionf');
 ?>
                    <label for="MTSectionf" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="Institutionsti1"  style="display:none">
                  <label class="col-sm-3 control-label">Institutions Duty</label>
                  <div class="col-sm-9">
 <?php  
$Institutionsti = array('' => '--Select--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','LO SECURITY PAP CAMPUS' => 'LO SECURITY PAP CAMPUS','Others' => 'Others',);
 echo form_dropdown('Institutionsti', $Institutionsti, '','id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Institutionsti');
 ?>
                    <label for="Institutionsti" class="error"></label>
                  </div>
                </div>


  
   <div class="form-group" id="GuardDutiesti1"  style="display:none">
                  <label class="col-sm-3 control-label">Guard Duties</label>
                  <div class="col-sm-9">
 <?php  
$GuardDutiesti = array('' => '--Select--', 'VP Guard Duties' => 'VP Guard Duties', 'Political Persons Guard Duty' => 'Political Persons Guard Duty','Threatening Persons/Places Guard Duty' => 'Threatening Persons/Places Guard Duty','Police Officers Guard Duty' => 'Police Officers Guard Duty','Civil Officer&#39;s Guard Duties' =>'Civil Officer&#39;s Guard Duties','Judicial Officer&#39;s Guard Duties.' => 'Judicial Officer&#39;s Guard Duties.');
 echo form_dropdown('GuardDutiesti', $GuardDutiesti, '','id="GuardDutiesti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('GuardDutiesti');
 ?>
                    <label for="GuardDutiesti" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="Companydutiesti1"  style="display:none">
                  <label class="col-sm-3 control-label">Company Duties</label>
                  <div class="col-sm-9">
 <?php  
$Companydutiesti = array('' => '--Select--', 'A' => 'A', 'B' => 'B','C' => 'C','D' => 'D','E' =>'E','F' => 'F');
 echo form_dropdown('Companydutiesti', $Companydutiesti, '','id="Companydutiesti" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Companydutiesti');
 ?>
                    <label for="Companydutiesti" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="LawOrderDuty1"  style="display:none">
                  <label class="col-sm-3 control-label">Law &amp; Order Duty</label>
                  <div class="col-sm-9">
 <?php  
$LawOrderDuty = array('' => '--Select--', 'Permanent Law &amp; Order Duty' => 'Permanent Duty', 'Temporary Law &amp; Order Duty' => 'Temporary Duty');
 echo form_dropdown('LawOrderDuty', $LawOrderDuty, '','id="LawOrderDuty" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
 echo form_dropdown('SpecialTeamDuty', $SpecialTeamDuty, '','id="SpecialTeamDuty" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
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
 echo form_dropdown('SportsAttachments', $SportsAttachments, '','id="SportsAttachments" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('SportsAttachments');
 ?>
                    <label for="SportsAttachments" class="error"></label>
                  </div>
                </div>



                 <div class="form-group" id="OtherAttachmentDuties1"  style="display:none">
                  <label class="col-sm-3 control-label">Other Attachment Duties</label>
                  <div class="col-sm-9">
 <?php  
$OtherAttachmentDuties = array('' => '--Select--', 'District' => 'District', 'Police security wing under 13th Bn' => 'Police security wing under 13th Bn','CPO Punjab chg under 13th Bn' => 'CPO Punjab chg under 13th Bn','CPL reserve under 13th Bn' => 'CPL reserve under 13th Bn','VIP security under 82th Bn' => 'VIP security under 82th Bn','Special Protection Unit ( CM Security)' => 'Special Protection Unit ( CM Security)','Intelligence wing' =>'Intelligence wing','Vigilance wing' => 'Vigilance wing','NRI Wing' => 'NRI Wing','Bureau of Investigation' =>'Bureau of Investigation','State Narcotic Bureau' => 'State Narcotic Bureau','Airport Immigration' => 'Airport Immigration','Passport Office' => 'Passport Office','State Crime Record Bureau' => 'State Crime Record Bureau','National Crime Record Bureau' => 'National Crime Record Bureau', 'Counter Intelligence' => 'Counter Intelligence','State Human Rights Commission' => 'State Human Rights Commission','RTC' => 'RTC','ISTC' => 'ISTC','CTC BHG' => 'CTC BHG','PPA Phillaur' => 'PPA Phillaur','PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','Other Armed Battalion' => 'Other Armed Battalion','Other' => 'Other');
 echo form_dropdown('OtherAttachmentDuties', $OtherAttachmentDuties, '','id="OtherAttachmentDuties" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('OtherAttachmentDuties');
 ?>
                    <label for="OtherAttachmentDuties" class="error"></label>
                  </div>
                </div>


                     <div class="form-group"  id="otherss"  style="display:none">
                  <label class="col-sm-3 control-label">Others</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'Other','id' => 'rn','class' => 'form-control','placeholder' =>'Other','value' => set_value('Other'));
echo form_input($rn);
echo form_error('Other');
?>
                    <label for="Other" class="error"></label>
                  </div>
                </div>


                 <div class="form-group"  id="admblock1"  style="display:none">
                  <label class="col-sm-3 control-label">Admin Block</label>
                  <div class="col-sm-9">
 <?php  
$admblock = array('' => '--Select--', 'Office IGP PAP' => 'Office IGP PAP', 'Office IGP Training' => 'Office IGP Training', 'Office IGP Operations' => 'Office IGP Operations','Office DIG Admn' => 'Office DIG Admn','Office AIG PAP' => 'Office AIG PAP','Office AIG PAP-II' => 'Office AIG PAP-II','Office SP Admn' => 'Office SP Admn','Confidential Branch' => 'Confidential Branch','SO Audit' => 'SO Audit','DA Legal' => 'DA Legal','EO Armed Bns' => 'EO Armed Bns','Supdt Admn' => 'Supdt Admn','Supdt Acctt' => 'Supdt Acctt','Supdt Training' => 'Supdt Training','Line Officer Admn Block' => 'Line Officer Admn Block','Server Cell' => 'Server Cell','PAP House' => 'PAP House','Govt Resi IGP PAP' => 'Govt Resi IGP PAP','Govt Resi DIG Admn' => 'Govt Resi DIG Admn','Govt Resi IGP Training' => 'Govt Resi IGP Training','Govt Resi IGP Operation' => 'Govt Resi IGP Operation','Govt Resi AIG PAP' => 'Govt Resi AIG PAP','Reception Room' =>'Reception Room');
 echo form_dropdown('admblock', $admblock, '','id="admblock" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('admblock');
 ?>
                    <label for="admblock" class="error"></label>
                  </div>
                </div>

                     <div class="form-group" id="mod24">
                  <label class="col-sm-3 control-label">Deposit RC/Bill no.</label>
                  <div class="col-sm-9">
<?php
$ircn = array('type' => 'text','name' => 'drbircn','id' => 'ircn','class' => 'form-control','placeholder' =>'Deposit RC/Bill no.','value' => set_value('ircn'));
echo form_input($ircn);
echo form_error('drbircn');
?>
                    <label for="ircn" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="mod25">
                  <label class="col-sm-3 control-label"> Deposit RC/Bill Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$ircd = array('type' => 'text','name' => 'ircd','id' => 'ircd','class' => 'form-control','placeholder' =>'Deposit RC/Bill Date','value' => set_value('ircd'));
echo form_input($ircd);
echo form_error('ircd');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="ircd" class="error"></label>

                  </div>
                </div>

                 <div class="form-group" id="mod26" style="display:none;">
                  <label class="col-sm-3 control-label"> Deposit Date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$DepositDate = array('type' => 'text','name' => 'DepositDate','id' => 'DepositDate','class' => 'form-control','placeholder' =>'Deposit  Date','value' => set_value('id'));
echo form_input($DepositDate);
echo form_error('DepositDate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="DepositDate" class="error"></label>

                  </div>
                </div>

                     <div class="form-group" id="mod27"  style="display:none;">
                  <label class="col-sm-3 control-label">Purchased amount</label>
                  <div class="col-sm-9">
<?php
$ircn = array('type' => 'text','name' => 'paircn','id' => 'ircn','class' => 'form-control','placeholder' =>'Purchased amount','value' => set_value('ircn'));
echo form_input($ircn);
echo form_error('ircn');
?>
                    <label for="ircn" class="error"></label>
                  </div>
                </div> 


                <div class="form-group"  id="mod28"  style="display:none;">
                  <label class="col-sm-3 control-label">Condemnation amount</label>
                  <div class="col-sm-9">
                 <?php  
$Condemnationamount = array('' => '--Select--',  '5%' => '5%','10%' => '10%','Right off' => 'Right off');

                 
/*newarea Textfield*/
 echo form_dropdown('Condemnationamount', $Condemnationamount, set_value('Condemnationamount',''),'id="Condemnationamount" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Condemnationamount');
/*----End newarea Textfield----*/
 ?>
                    <label for="Condemnationamount" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group" id="ftcon1" style="display:none;"> 
                  <label class="col-sm-3 control-label">Commandant order no.</label>
                  <div class="col-sm-9">
<?php
$ircn = array('type' => 'text','name' => 'conircn','id' => 'ircn','class' => 'form-control','placeholder' =>'Commandant order no.','value' => set_value('ircn'));
echo form_input($ircn);
echo form_error('ircn');
?>
                    <label for="ircn" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="ftcon2" style="display:none;">
                  <label class="col-sm-3 control-label"> Commandant order date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$Commandantorderdate = array('type' => 'text','name' => 'Commandantorderdate','id' => 'Commandantorderdate','class' => 'form-control','placeholder' =>'Commandant order date','value' => set_value('Commandantorderdate'));
echo form_input($Commandantorderdate);
echo form_error('Commandantorderdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="Commandantorderdate" class="error"></label>

                  </div>
                </div>

                 <div class="form-group"  id="ftcon3" style="display:none;">
                  <label class="col-sm-3 control-label">Condemned amount</label>
                  <div class="col-sm-9">
<?php
$ircn = array('type' => 'text','name' => 'ircncamo','id' => 'ircn','class' => 'form-control','placeholder' =>'Condemned amount','value' => set_value('ircn'));
echo form_input($ircn);
echo form_error('ircn');
?>
                    <label for="ircn" class="error"></label>
                  </div>
                </div>


                  <div class="form-group"  id="ftrcon1" style="display:none;">
                  <label class="col-sm-3 control-label">CPO forward letter no.</label>
                  <div class="col-sm-9">
<?php
$ircn = array('type' => 'text','name' => 'ircncpo','id' => 'ircn','class' => 'form-control','placeholder' =>'CPO forward letter no.','value' => set_value('ircn'));
echo form_input($ircn);
echo form_error('ircn');
?>
                    <label for="ircn" class="error"></label>
                  </div>
                </div>

                 <div class="form-group"  id="ftrcon2" style="display:none;">
                  <label class="col-sm-3 control-label"> CPO forward letter date</label>
                  <div class="col-sm-9">
             <div class="input-group">
              <?php 
$CPOforwardletterdate = array('type' => 'text','name' => 'CPOforwardletterdate','id' => 'CPOforwardletterdate','class' => 'form-control','placeholder' =>'CPO forward letter date','value' => set_value('CPOforwardletterdate'));
echo form_input($CPOforwardletterdate);
echo form_error('CPOforwardletterdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="CPOforwardletterdate" class="error"></label>

                  </div>
                </div>

                 <div class="form-group"  id="ftrcon3" style="display:none;">
                  <label class="col-sm-3 control-label">Condemnation date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$ftrcon3condate = array('type' => 'text','name' => 'ftrcon3condate','id' => 'ftrcon3condate','class' => 'form-control','placeholder' =>'Condemned amount','value' => set_value('ftrcon3condate'));
echo form_input($ftrcon3condate);
echo form_error('ftrcon3condate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="ftrcon3condate" class="error"></label>
                  </div>
                </div>


              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                   <a  href="" class="btn btn-default">Reset</a>
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

<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

<script type="text/javascript">

jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }), jQuery('#ftrcon3condate').datepicker({dateFormat: "dd/mm/yy"});  
jQuery('#CPOforwardletterdate').datepicker({dateFormat: "dd/mm/yy"});
jQuery('#Commandantorderdate').datepicker({dateFormat: "dd/mm/yy"});

jQuery('#DepositDate').datepicker({dateFormat: "dd/mm/yy"});
jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
 
     $(document).on('change', '#Issuedto', function() {
  if(this.value == 'Official'){
     $('#batslist').show();
     $('#Issuedto1').show();
     $('#Issuedto2').show();
     $('#itoothers2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto4').hide();
     $('#Issuedto5').hide();

   }else if(this.value == 'Other Battalion/unit'){
    $('#Issuedto3').show();
    $('#batslist').hide();
    $('#Issuedto1').hide();
     $('#Issuedto2').hide();
     $('#Issuedto4').hide();
     $('#Issuedto5').hide();
     $('#itoothers2').hide();

         $('#MudDuties1').hide();
       $('#GeneralStaff1').hide();
        $('#genralOther1').hide();
         $('#MTSectionf1').hide();
          $('#Institutionsti1').hide();
           $('#Institutionstiother1').hide();
            $('#GuardDutiesti1').hide();
             $('#Companydutiesti').hide();
              $('#LawOrderDuty1').hide();
               $('#SpecialTeamDuty1').hide();
                $('#SportsAttachments1').hide();
                 $('#SportsAttachmentsOthers1').hide();
                  $('#OtherAttachmentDuties1').hide();
                   $('#AttachmentDutiesothers11').hide();
                   $('#admblock1').hide();
   }
   else if(this.value == 'Self Battalion'){
    $('#Issuedto4').show();
    $('#MudDuties1').show();
       $('#GeneralStaff1').show();
        $('#genralOther1').show();
         $('#MTSectionf1').show();
          $('#Institutionsti1').show();
           $('#Institutionstiother1').show();
            $('#GuardDutiesti1').show();
             $('#Companydutiesti').show();
              $('#LawOrderDuty1').show();
               $('#SpecialTeamDuty1').show();
                $('#SportsAttachments1').show();
                 $('#SportsAttachmentsOthers1').show();
                  $('#OtherAttachmentDuties1').show();
                   $('#AttachmentDutiesothers11').show();
                   $('#admblock1').hide();
    $('#Issuedto1').hide();
     $('#Issuedto2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto5').hide();
     $('#itoothers2').hide();
   }else if(this.value == 'Repairing unit'){
    $('#batslist').show();
    $('#Issuedto5').show();
    $('#Issuedto1').hide();
     $('#Issuedto2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto4').hide();
     $('#itoothers2').hide();
              $('#MudDuties1').hide();
       $('#GeneralStaff1').hide();
        $('#genralOther1').hide();
         $('#MTSectionf1').hide();
          $('#Institutionsti1').hide();
           $('#Institutionstiother1').hide();
            $('#GuardDutiesti1').hide();
             $('#Companydutiesti').hide();
              $('#LawOrderDuty1').hide();
               $('#SpecialTeamDuty1').hide();
                $('#SportsAttachments1').hide();
                 $('#SportsAttachmentsOthers1').hide();
                  $('#OtherAttachmentDuties1').hide();
                   $('#AttachmentDutiesothers11').hide();
                   $('#admblock1').hide();
   }else if(this.value == 'Other'){
    $('#Issuedto5').hide();
    $('#Issuedto1').hide();
     $('#Issuedto2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto4').hide();
     $('#otherss').show();
     $('#admblock1').hide();
      $('#MudDuties1').hide();
       $('#GeneralStaff1').hide();
        $('#genralOther1').hide();
         $('#MTSectionf1').hide();
          $('#Institutionsti1').hide();
           $('#Institutionstiother1').hide();
            $('#GuardDutiesti1').hide();
             $('#Companydutiesti').hide();
              $('#LawOrderDuty1').hide();
               $('#SpecialTeamDuty1').hide();
                $('#SportsAttachments1').hide();
                 $('#SportsAttachmentsOthers1').hide();
                  $('#OtherAttachmentDuties1').hide();
                   $('#AttachmentDutiesothers11').hide();
                  
    
    }else if(this.value == 'Admin Block'){
    $('#Issuedto5').hide();
    $('#Issuedto1').hide();
     $('#Issuedto2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto4').hide();
     $('#otherss').hide();
     $('#admblock1').show();
      $('#MudDuties1').hide();
       $('#GeneralStaff1').hide();
        $('#genralOther1').hide();
         $('#MTSectionf1').hide();
          $('#Institutionsti1').hide();
           $('#Institutionstiother1').hide();
            $('#GuardDutiesti1').hide();
             $('#Companydutiesti').hide();
              $('#LawOrderDuty1').hide();
               $('#SpecialTeamDuty1').hide();
                $('#SportsAttachments1').hide();
                 $('#SportsAttachmentsOthers1').hide();
                  $('#OtherAttachmentDuties1').hide();
                   $('#AttachmentDutiesothers11').hide();
                   
      

   }else{
    
   }
});

     $(document).on('change', '#obito', function() {
  if(this.value == 'Other'){
     $('#itoothers2').show();
   }else{
    $('#itoothers2').hide();
   }
});

     $(document).on('change', '#toi', function() {
  if(this.value == 'Other misc. items'){
     $('#rnOthers11').show();
   }else{
    $('#rnOthers11').hide();
   }
});

      $(document).on('click', '#showi', function() {
  $('#Issuedtoc1').show();
  $('#Issuedtoc2').hide();
  
});

  
     $("#toi").change(function(){
    var ic = $("#toi").val();
    var dataStrings = 'ic='+ ic;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-msk-ajss",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#nameitem11").html(html);
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
$(document).on( "click","[id^=a]",function () {
var Input = $(this).data('input');
$("#search-box").val( $('#a'+Input).text());
$("#idinfo").val(Input);
$("#suggesstion-box").hide();
});
</script>
</body>
</html>