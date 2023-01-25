<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Issued Material Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/buttons.dataTables.min.css"/>
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
      <h3> &nbsp; &nbsp; Issued Material Report</h3>
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
	  <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
</div>
      <?php  endif; ?>
    <div class="panel panel-default">
            <div class="panel-heading">
          <div class="row">
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
   

                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$toi = array();
$toi[''] = '--Type of item--';
                 foreach ($items as $value) {
                   $toi[$value->item] = $value->item;
                 }
/*newarea Textfield*/
 echo form_dropdown('toi', $toi, '','id="toi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('toi');
/*----End newarea Textfield----*/
 ?>
                    <label for="toi" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3"><div class="form-group">
                <select name="nameofitem"  id="nameitem11" title="Please select at least 1 value" class="form-control">';
                 <option value=''>--Name of item--</option>
      </select></div></div>
                 
                   
                  <div class="col-sm-3"><div class="form-group">

           <?php  
$cti = array('' => '--Category of Item--', 'Expendable' => 'Expendable','Non-Expendable' => 'Non-Expendable');
/*newarea Textfield*/
 echo form_dropdown('cti', $cti, '','id="cti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cti'); ?>
                    <label for="cti" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3"><div class="form-group">
                 <?php  
$Receivedfrom = array('' => '--Issue Mode--', 'Permanent' => 'Permanent','Temporary' => 'Temporary');
/*newarea Textfield*/
 echo form_dropdown('Receivedfrom', $Receivedfrom, '','id="Receivedfrom" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Receivedfrom');
/*----End newarea Textfield----*/
 ?>
                    <label for="Receivedfrom" class="error"></label>
                  </div>
                </div><br/>


                  <div class="col-sm-3"><br/><div class="form-group">
                 <?php  
$Issuedto = array('' => '--Issued to--',/* 'Other Battalion/unit' => 'Other Battalion/unit',*/'Self Battalion' => 'Self Battalion', 'Repairing unit' => 'Repairing unit', 'Other' => 'Other','Special Team Duty' => 'Special Team Duty','Institutions Duty' => 'Institutions Duty','Other Attachment Duties' => 'Other Attachment Duties', 'Sports Attachments' => 'Sports Attachments','Admin Block' => 'Admin Block');
/*newarea Textfield*/
 echo form_dropdown('Issuedto', $Issuedto, '','id="Issuedto" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Issuedto');
/*----End newarea Textfield----*/
 ?>
                    <label for="Issuedto" class="error"></label>
                  </div>
                </div>

                  <!-- <div class="col-sm-3"  id="Issuedto3" style="display:none;"><br/>
                   <div class="form-group">
                 <?php  
                   /* $ito = array();
                 $ito[''] = '--Other battalion/unit--';
                 foreach ($uname as $value) {
                   $ito[$value->users_id] = $value->nick;
                 } */
/*newarea Textfield*/
/* echo form_dropdown('obito', $ito, set_value('obito',1),'id="obito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('obito');*/
/*----End newarea Textfield----*/
 ?>
                    <label for="obito" class="error"></label>
                  </div>
                </div> -->

                  <div class="col-sm-3"  id="Issuedto4" style="display:none;"><br/>
                  <div class="form-group">
                 <?php  
                  $ito = array('' => '--Self Battalion--',  'Commandant office' => 'Commandant office','Asst. Commandant office' => 'Asst. Commandant office', 'DSP office' => 'DSP office','English Branch' => 'English Branch','Account Branch' => 'Account Branch','OSI Branch' => 'OSI Branch','Litigation Branch' => 'Litigation Branch','Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer cell' => 'Computer cell','Line officer' => 'Line officer','BHM & ABHM' => 'BHM & ABHM','MHC & AMHC' => 'MHC & AMHC','Orderly' => 'Orderly', 'CDO & ACDO' => 'CDO & ACDO','CDI' => 'CDI','CLI' => 'CLI', 'I/c GROUND' => 'I/c GROUND','Telephone Opr'  => 'Telephone Opr','Reader to Comdt' => 'Reader to Comdt','Reader to A/Comdt' => 'Reader to A/Comdt','Reader to DSP/ADJ' => 'Reader to DSP/ADJ','Reader to DSP' => 'Reader to DSP'); 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, '','id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/ 
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

          
                  <div class="col-sm-3" id="MudDuties1"  style="display:none"><br/>
                   <div class="form-group">
 <?php  
$MudDuties = array('' => '--Mud Duties--', 'Reserve Inspector' => 'Reserve Inspector', 'Line Officer' => 'Line Officer', 'BHM' => 'BHM','A-BHM'=> 'A-BHM','A/BHM'=> 'A/BHM', 'MHC' => 'MHC', 'A/MHC' => 'A/MHC',  'Orderly to RI' => 'Orderly to RI','CDI' => 'CDI','CDO' => 'CDO','A/CDO' => 'A/CDO', 'Quarter Master INSP' => 'Quarter Master INSP','KHC' => 'KHC','A/KHC' => 'A/KHC','MSK' => 'MSK','A/MSK' => 'A/MSK',  'Armourer ' => 'Armourer','A/Armourer' => 'A/Armourer', 'I/C Class-IV' => 'I/C Class-IV','Quarter Munshi  Asstt.' => 'Quarter Munshi Asstt.','Quarter Munshi' => 'Quarter Munshi','I/C Mess' => 'I/C Mess','I/C Mess Asstt.' => 'I/C Mess Asstt.','I/C Canteen' => 'I/C Canteen','Grossary Shop' => 'Grossary Shop', 'Incharge' => 'Incharge', 'Incharge Asstt'=> 'Incharge Asstt','CHC' => 'CHC');
 echo form_dropdown('MudDuties', $MudDuties, '','id="MudDuties" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('MudDuties'); 
 ?>
                    <label for="MudDuties" class="error"></label>
                  </div>
                </div>

                   
                  <div class="col-sm-3"  id="GeneralStaff1"  style="display:none"><br/>
                  <div class="form-group">
 <?php  
$GeneralStaff = array('' => '--General Staff--', 'On-Duty' => 'On-Duty', 'Misc' => 'Misc','Range Armourer' => 'Range Armourer', 'Control Room PAP' => 'Control Room PAP', 'Wireless Office PAP' => 'Wireless Office PAP', 'AIA Punjab State' => 'AIA Punjab State', 'Recration Room' => 'Recration Room','Canteen' => 'Canteen','MTO' => 'MTO','KOT' => 'KOT','MSK' => 'MSK','Library' => 'Library','Mutli Purpose Hall' => 'Mutli Purpose Hall');
 echo form_dropdown('GeneralStaff', $GeneralStaff, '','id="GeneralStaff" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('GeneralStaff');
 ?>
                    <label for="GeneralStaff" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"  id="MTSectionf1"  style="display:none"><br/>
                   <div class="form-group">
 <?php  
$MTSectionf = array('' => '--MT Section--', 'MTO' => 'MTO', 'Asstt. MTO-cum- Garage GC' => 'Asstt. MTO-cum- Garage GC','MHC-cum- I/C MT Store' => 'MHC-cum- I/C MT Store','AMHC-cum- Asstt. MT Store' => 'AMHC-cum- Asstt. MT Store','I/C Patrol Pump &amp; Asstt.' =>'I/C Patrol Pump &amp; Asstt.','Mechanics' => 'Mechanics','Drivers' => 'Drivers','Any Other' => 'Any Other');
 echo form_dropdown('MTSectionf', $MTSectionf, '','id="MTSectionf" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('MTSectionf');
 ?>
                    <label for="MTSectionf" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3" id="Institutionsti1"  style="display:none"><br/>
                   <div class="form-group" >
 <?php  
$Institutionsti = array('' => '--Institutions Duty--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','LO SECURITY PAP CAMPUS' => 'LO SECURITY PAP CAMPUS','CENTRAL LIBRARY PAP' => 'CENTRAL LIBRARY PAP', 'Others' => 'Others',);
 echo form_dropdown('Institutionsti', $Institutionsti, '','id="Institutionsti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('Institutionsti');
 ?>
                    <label for="Institutionsti" class="error"></label>
                  </div>
                </div>


  
  
                  <div class="col-sm-3"  id="GuardDutiesti1"  style="display:none"><br/>
                     <div class="form-group">
 <?php  
$GuardDutiesti = array('' => '--Guard Duties--', 'VP Guard Duties' => 'VP Guard Duties', 'Political Persons Guard Duty' => 'Political Persons Guard Duty','Threatening Persons/Places Guard Duty' => 'Threatening Persons/Places Guard Duty','Police Officers Guard Duty' => 'Police Officers Guard Duty','Civil Officer&#39;s Guard Duties' =>'Civil Officer&#39;s Guard Duties','Judicial Officer&#39;s Guard Duties.' => 'Judicial Officer&#39;s Guard Duties.');
 echo form_dropdown('GuardDutiesti', $GuardDutiesti, '','id="GuardDutiesti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('GuardDutiesti');
 ?>
                    <label for="GuardDutiesti" class="error"></label>
                  </div>
                </div>
          

                  
                  <div class="col-sm-3" id="Companydutiesti1"  style="display:none"><br/>
                   <div class="form-group">
 <?php  
$Companydutiesti = array('' => '--Company Duties--', 'A' => 'A', 'B' => 'B','C' => 'C','D' => 'D','E' =>'E','F' => 'F');
 echo form_dropdown('Companydutiesti', $Companydutiesti, '','id="Companydutiesti" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Companydutiesti');
 ?>
                    <label for="Companydutiesti" class="error"></label>
                  </div>
                </div>

                 
                  <div class="col-sm-3"  id="LawOrderDuty1"  style="display:none"><br/>
                  <div class="form-group">
 <?php  
$LawOrderDuty = array('' => '--Law &amp; Order Duty--', 'Permanent Law &amp; Order Duty' => 'Permanent Duty', 'Temporary Law &amp; Order Duty' => 'Temporary Duty');
 echo form_dropdown('LawOrderDuty', $LawOrderDuty, '','id="LawOrderDuty" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('LawOrderDuty');
 ?>
                    <label for="LawOrderDuty" class="error"></label>
                  </div>
                </div>

             

                  
                  <div class="col-sm-3" id="SpecialTeamDuty1"  style="display:none"><br/>
                  <div class="form-group">
 <?php  
$SpecialTeamDuty = array('' => '--Special Team Duty--', 'Anti Riot Police (ARP)' => 'Anti Riot Police (ARP)', 'Special Striking Group (SSG)' => 'Special Striking Group (SSG)','State Disaster Response Force (SDRF)' => 'State Disaster Response Force (SDRF)');
 echo form_dropdown('SpecialTeamDuty', $SpecialTeamDuty, '','id="SpecialTeamDuty" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('SpecialTeamDuty');
 ?>
                    <label for="SpecialTeamDuty" class="error"></label>
                  </div>
                </div>

                 
                  <div class="col-sm-3" id="SportsAttachments1"  style="display:none"><br/>
                  <div class="form-group">
 <?php  
$SportsAttachments = array('' => '--Sports Attachments--', 'DSO' => 'DSO', 'CSO' => 'CSO', 'NIS Patiala' => 'NIS Patiala','Others' => 'Others');
 echo form_dropdown('SportsAttachments', $SportsAttachments, '','id="SportsAttachments" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('SportsAttachments');
 ?>
                    <label for="SportsAttachments" class="error"></label>
                  </div>
                </div>



                  <div class="col-sm-3"  id="OtherAttachmentDuties1"  style="display:none"><br/>
                     <div class="form-group">
 <?php  
$OtherAttachmentDuties = array('' => '--Other Attachment Duties--', 'District' => 'District', 'Police security wing under 13th Bn' => 'Police security wing under 13th Bn','CPO Punjab chg under 13th Bn' => 'CPO Punjab chg under 13th Bn','CPL reserve under 13th Bn' => 'CPL reserve under 13th Bn','VIP security under 82th Bn' => 'VIP security under 82th Bn','Special Protection Unit ( CM Security)' => 'Special Protection Unit ( CM Security)','Intelligence wing' =>'Intelligence wing','Vigilance wing' => 'Vigilance wing','NRI Wing' => 'NRI Wing','Bureau of Investigation' =>'Bureau of Investigation','State Narcotic Bureau' => 'State Narcotic Bureau','Airport Immigration' => 'Airport Immigration','Passport Office' => 'Passport Office','State Crime Record Bureau' => 'State Crime Record Bureau','National Crime Record Bureau' => 'National Crime Record Bureau', 'Counter Intelligence' => 'Counter Intelligence','State Human Rights Commission' => 'State Human Rights Commission','RTC' => 'RTC','ISTC' => 'ISTC','CTC BHG' => 'CTC BHG','PPA Phillaur' => 'PPA Phillaur','PRTC Jahankhelan' => 'PRTC Jahankhelan', 'Ladda Kothi Sangrur' => 'Ladda Kothi Sangrur','Other Armed Battalion' => 'Other Armed Battalion','Other' => 'Other');
 echo form_dropdown('OtherAttachmentDuties', $OtherAttachmentDuties, '','id="OtherAttachmentDuties" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('OtherAttachmentDuties');
 ?>
                    <label for="OtherAttachmentDuties" class="error"></label>
                  </div>
                </div>

                  

            <div class="col-sm-3"  id="admblock1"  style=""><br/>
                  <div class="form-group">
 <?php  
$admblock = array('' => '--Admin Block--', 'Office ADGP' => 'Office ADGP', 'Office IGP PAP' => 'Office IGP PAP', 'Office IGP Training' => 'Office IGP Training', 'Office IGP Operations' => 'Office IGP Operations','Office DIG Admn' => 'Office DIG Admn','Office AIG PAP' => 'Office AIG PAP','Office AIG PAP-II' => 'Office AIG PAP-II','Office SP Admn' => 'Office SP Admn','Confidential Branch' => 'Confidential Branch','SO Audit' => 'SO Audit','DA Legal' => 'DA Legal','EO Armed Bns' => 'EO Armed Bns','Supdt Admn' => 'Supdt Admn','Supdt Acctt' => 'Supdt Acctt','Supdt Training' => 'Supdt Training','Line Officer Admn Block' => 'Line Officer Admn Block','Server Cell' => 'Server Cell','PAP House' => 'PAP House','Govt Resi IGP PAP' => 'Govt Resi IGP PAP','Govt Resi DIG Admn' => 'Govt Resi DIG Admn','Govt Resi IGP Training' => 'Govt Resi IGP Training','Govt Resi IGP Operation' => 'Govt Resi IGP Operation','Govt Resi AIG PAP' => 'Govt Resi AIG PAP');
 echo form_dropdown('admblock', $admblock, '','id="admblock" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('admblock');
 ?>
                    <label for="admblock" class="error"></label>
                  </div>
                </div>

                </div><br/>

                 <div class="row">
                 

      

              <div class="row">          
                <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
                </div>
              </div>

                 </div>

<?php echo form_close(); ?>
          </div>
        <div class="panel-body"> 
       <h3>Total Entries: <?php  $a = array(); if($weapon!=''){ foreach($weapon as $value){
                      if($value->quantity !=0){
                        $a[] = $value->quantity;
                      }}} echo count($a); ?>



        <span class="pull-right">Total Quantity: <?php if($qname!=''){ foreach($qname as $val){echo $val->total;}}else{echo "0";} ?></span></h3>
          <!-- Example split danger button -->  
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Deposit</th>
                    <th>Type of Item </th>
                    <th>Name of Item</th>
                    <th>Item Info</th>
                    <th>Category of item</th>
                    <th>Condition of item</th>
                    <th>Issue Mode</th>
                    <th>Quantity</th>
                    <th>Issued to </th>
                    <th>Issue Name</th>
                    <th>Issued RC No.</th>
                    <th>Issued RC Date</th>
                    <th>Issued Date</th>
                    <th>Status</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1;
                      if($value->quantity !=0){
                 ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><a href="<?php echo base_url('bt-add-pmaterial').'/'.$value->issue_material_id;?>" class="btn btn-xs btn-primary">Deposit</a></td>
                    <td><?php echo $value->typeofitem; ?></td>
                    <td><?php echo $value->nameofitem; ?></td>
                     <td><?php if($value->infos !=''){ echo $value->infos;}else{echo "-";}  ?></td>
                    <td><?php echo $value->cat_of_item; ?></td>
                    <td><?php echo $value->condition_of_item; ?></td>
                    <td><?php echo $value->issue_mode; ?></td>
                    <td><?php echo $value->quantity; ?></td>
                   <td><?php echo $value->Issuedto; ?></td>
                    <td><?php $oman = fetchoneinfo('newosi',array('man_id' => $value->officer)); 
                    if($oman!=''){
                        echo $oman->name;
                      }

                      $man = fetchoneinfo('newosi',array('man_id' => $value->manpower)); 
                    if($man!=''){
                        echo $man->name;
                      }

                      $vat = fetchoneinfo('users',array('users_id' => $value->other_battalion)); 



                    if($vat!=''&& !in_array($value->Issuedto,array('Official','Other Battalion/unit','Self Battalion',"Institutions Duty","Special Team Duty","Other Attachment Duties","Sports Attachments","Admin Block",'Other','Admin Block'))){
                        echo $vat->nick."&nbsp;";
                      }
                      if($value->self_battalion!=''){
                        echo $value->self_battalion;
                      }
                      echo '&nbsp; '.$value->details .'<br/>'.$value->district.'';  
                      ?></td> 
                    <td><?php echo $value->issue_rc_no; ?></td>
                    <td><?php echo $value->issue_rc_date; ?></td>
                    <td><?php echo $value->issue_date; ?></td>
                    <td><?php echo 'Issued'; ?></td>
                <?php } endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 
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

  jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#id').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#ircdi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#idi').datepicker({dateFormat: "dd/mm/yy"});
});

  $("#toi").change(function(){
    var ic = $("#toi").val();
    var dataStrings = 'ic='+ ic;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-msk-ajssfilter",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#nameitem11").html(html);
    }  
      
    });

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
        scrollX: 800,
    } );
});




     $(document).on('change', '#Issuedto', function() {
  if(this.value == 'Official'){
     $('#Issuedto1').show();
     $('#Issuedto2').show();
     $('#itoothers2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto4').hide();
     $('#Issuedto5').hide();

   }else if(this.value == 'Other Battalion/unit'){
    $('#Issuedto3').show();

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
                    $('#otherss00').hide();
                   $('#otherss001').hide();
   }
   else if(this.value == 'Self Battalion'){
    $('#Issuedto4').show();
    $('#MudDuties1').show();
       $('#GeneralStaff1').show();
        $('#genralOther1').show();
         $('#MTSectionf1').show();
         // $('#Institutionsti1').show();
           $('#Institutionstiother1').show();
            $('#GuardDutiesti1').show();
             $('#Companydutiesti').show();
              $('#LawOrderDuty1').show();
               $('#SpecialTeamDuty1').show();
               // $('#SportsAttachments1').show();
                 $('#SportsAttachmentsOthers1').show();
                 // $('#OtherAttachmentDuties1').show();
                   $('#AttachmentDutiesothers11').show();
                   $('#otherss00').show();
                   $('#otherss001').show();
                  // $('#admblock1').show();
    $('#Issuedto1').hide();
     $('#Issuedto2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto5').hide();
     $('#itoothers2').hide();
   }else if(this.value == 'Repairing unit'){
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
                   $('#otherss00').hide();
                   $('#otherss001').hide();
   }else if(this.value == 'Other'){
    $('#Issuedto5').hide();
    $('#Issuedto1').hide();
     $('#Issuedto2').hide();
     $('#Issuedto3').hide();
     $('#Issuedto4').hide();
     $('#otherss').show();
    // $('#admblock1').show();
      $('#MudDuties1').hide();
       $('#GeneralStaff1').hide();
        $('#genralOther1').hide();
         $('#MTSectionf1').hide();
          $('#Institutionsti1').hide();
           $('#Institutionstiother1').hide();
            $('#GuardDutiesti1').hide();
             $('#Companydutiesti').hide();
              $('#LawOrderDuty1').hide();
               //$('#SpecialTeamDuty1').hide();
                $('#SportsAttachments1').hide();
                 $('#SportsAttachmentsOthers1').hide();
                  $('#OtherAttachmentDuties1').hide();
                   $('#AttachmentDutiesothers11').hide();
                   $('#otherss00').hide();
                   $('#otherss001').hide();

                 }else if(this.value == 'Institutions Duty'){
                  $('#Institutionsti1').show();
                  $('#OtherAttachmentDuties1').hide();
                  $('#SportsAttachments1').hide();
                   $('#admblock1').hide();
                   $('#SpecialTeamDuty1').hide();
                 }else if(this.value  == 'Other Attachment Duties'){
                  $('#OtherAttachmentDuties1').show();
                  $('#Institutionsti1').hide();
                   $('#SportsAttachments1').hide();
                    $('#admblock1').hide();
                    $('#SpecialTeamDuty1').hide();
                 }else if(this.value  == 'Sports Attachments'){
                  $('#SportsAttachments1').show();
                  $('#Institutionsti1').hide();
                  $('#OtherAttachmentDuties1').hide();
                  $('#SpecialTeamDuty1').hide();
                  $('#admblock1').hide();
                 }else if(this.value  == 'Admin Block'){
                  $('#admblock1').show();
                  $('#SportsAttachments1').hide();
                  $('#Institutionsti1').hide();
                  $('#OtherAttachmentDuties1').hide();
                  $('#SpecialTeamDuty1').hide();
                 }else if(this.value  == 'Special Team Duty'){
                  $('#SpecialTeamDuty1').show();
                  $('#admblock1').hide();
                  $('#SportsAttachments1').hide();
                  $('#Institutionsti1').hide();
                  $('#OtherAttachmentDuties1').hide();
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


  $(document).on('change', '#LawOrderDuty', function() {
  if(this.value == 'Permanent Law &amp; Order Duty'){
     $('#otherss').show();
   }else if(this.value == 'Temporary Law &amp; Order Duty'){
     $('#otherss').show();
   }else{
      $('#otherss').hide();
   }
});

</script>
</body>
</html>