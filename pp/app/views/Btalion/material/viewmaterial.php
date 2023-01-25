<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MISC Stores</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://datatables.net/release-datatables/extensions/ColVis/css/dataTables.colVis.css"/>
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
      <h3> &nbsp; &nbsp; MISC Stores <?php //echo $this->session->userdata('username'); ?></h3>
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
$toi = array('' => '--Select--','Tentage A' => 'Tentage A','Tentage B' => 'Tentage B','Tentage C' => 'Tentage C', 'Security Equipments' => 'Security Equipments', 'Electronic Items' =>'Electronic Items','Computers' => 'Computers','Computer Equipments' => 'Computer Equipments', 'Laptops' =>'Laptops','Furniture' =>'Furniture','Machinery' => 'Machinery','SDRF Items' => 'SDRF Items','Sanitory Items' => 'Sanitory Items', 'Stationery' => 'Stationery','Computer Stationery' => 'Computer Stationery', 'Building Material' => 'Building Material', 'Paint' => 'Paint','CTS Items' =>'CTS Items','Other Misc Items' =>'Other Misc Items');
/*newarea Textfield*/
 echo form_dropdown('toi', $toi, set_value('toi',1),'id="toi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('toi');
/*----End newarea Textfield----*/
 ?>
                    <label for="toi" class="error"></label>
                  </div>
                </div>

                   
                  <div class="col-sm-3"> <div class="form-group">
                 <?php  
$hn = array();
$hn[''] = '--Select Name of item--';
                 foreach ($items as $value) {
                   $hn[$value->nameofitem] = $value->nameofitem;
                 }
/*newarea Textfield*/
 echo form_dropdown('nameofitem', $hn, set_value('nameofitem',''),'id="nameofitem" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('nameofitem');
/*----End newarea Textfield----*/
 ?>
                    <label for="nameofitem" class="error"></label><p id="link"></p>
                  </div>
                </div>

                   
                  <div class="col-sm-3"><div class="form-group">

           <?php  
$cti = array('' => '--Select Category of Item--', 'Expendable' => 'Expendable','Non Expendable' => 'Non-Expendable');
/*newarea Textfield*/
 echo form_dropdown('cti', $cti, set_value('cti',1),'id="cti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cti'); ?>
                    <label for="cti" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"><div class="form-group">

           <?php  
$option = array('' => '--Option--', 'In Store' => 'In Store','Issued' => 'Issued');
/*newarea Textfield*/
 echo form_dropdown('option', $option, set_value('option',1),'id="option" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('option'); ?>
                    <label for="option" class="error"></label>
                  </div>
                </div>

                </div>

                 <div class="row">
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$Receivedfrom = array('' => '--Select Received from--', 'ADGP Armed Bns.' => 'ADGP Armed Bns.','CPO' => 'CPO','PPHC' => 'PPHC');
/*newarea Textfield*/
 echo form_dropdown('Receivedfrom', $Receivedfrom, set_value('Receivedfrom',1),'id="Receivedfrom" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Receivedfrom');
/*----End newarea Textfield----*/
 ?>
                    <label for="Receivedfrom" class="error"></label>
                  </div>
                </div>


                  <div class="col-sm-3"> <div class="form-group">
<?php
$rcnum = array('type' => 'text','name' => 'rcnum','id' => 'rcnum','class' => 'form-control','placeholder' =>'RC Number','value' => set_value('rcnum'));
echo form_input($rcnum);
echo form_error('rcnum');
?>
                    <label for="rcnum" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$fname = array('' => '--Select Funds Name--','ADGP Armed Bns. Private Fund' => 'ADGP Armed Bns. Private Fund', 'Bn. Hqrs.Fund' => 'Bn. Hqrs.Fund');
/*newarea Textfield*/
 echo form_dropdown('fname', $fname, set_value('fname',1),'id="fname" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('fname');
/*----End newarea Textfield----*/
 ?>
                    <label for="fname" class="error"></label>
                  </div>
                </div> 

                 
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$gfund = array('' => '--Select Govt. Fund--','Office Expenses' => 'Office Expenses', 'CTS' => 'CTS', 'Other Expenses' => 'Other Expenses', 'Mech. & Equip.' => 'Mech. & Equip.', 'Computers' => 'Computers','Computer Software' => 'Computer Software', 'Computer Furniture' => 'Computer Furniture', 'Maintenance' => 'Maintenance', 'Computer Stationery (Expandable)' => 'Computer Stationery (Expandable)');
/*newarea Textfield*/
 echo form_dropdown('gfund', $gfund, set_value('gfund',1),'id="gfund" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('gfund');
/*----End newarea Textfield----*/
 ?>
                    <label for="gfund" class="error"></label>
                  </div></div>

                  <div class="row">
                    
                       
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$ofname = array('' => '--Select Other Funds--','Aid from MP' => 'Aid from MP','MLA' => 'MLA', 'Donation' => 'Donation');
/*newarea Textfield*/
 echo form_dropdown('ofname', $ofname, set_value('ofname',1),'id="ofname" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ofname');
/*----End newarea Textfield----*/
 ?>
                    <label for="ofname" class="error"></label>
                  </div>
                </div> 

                 
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$run = array();
$run[''] = '--Select Repairing unit Name--';
                 
/*newarea Textfield*/
 echo form_dropdown('run', $run, set_value('run',''),'id="run" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('run');
/*----End newarea Textfield----*/
 ?>
                    <label for="run" class="error"></label>
                  </div>
                </div> 

                 <div class="col-sm-3"> <div class="form-group">
<?php
$billno = array('type' => 'text','name' => 'billno','id' => 'billno','class' => 'form-control','placeholder' =>'Bill No','value' => set_value('billno'));
echo form_input($billno);
echo form_error('billno');
?>
                    <label for="billno" class="error"></label>
                  </div>
                </div>

                
                  <div class="col-sm-3"><div class="form-group">

           <?php  
$paysta = array('' => '--Select Payment Status--', 'Paid through loan pvt. Fund' => 'Paid through loan pvt. Fund','Paid through loan Bn. Funds' => 'Paid through loan Bn. Funds', 'Paid Through treasury' => 'Paid Through treasury', 'Pending Credit' => 'Pending Credit');
/*newarea Textfield*/
 echo form_dropdown('paysta', $paysta, set_value('paysta',1),'id="paysta" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('paysta'); ?>
                    <label for="paysta" class="error"></label>
                  </div>
                </div>

                  </div>

                  <div class="row">
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$issumemode = array('' => '--Select Issue Mode--', 'Permanent' => 'Permanent','Temporary' => 'Temporary');
/*newarea Textfield*/
 echo form_dropdown('issumemode', $issumemode, set_value('issumemode',1),'id="issumemode" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('issumemode');
/*----End newarea Textfield----*/
 ?>
                    <label for="issumemode" class="error"></label>
                  </div>
                </div>

                 
                  <div class="col-sm-3"><div class="form-group">

                 <?php 
                 $nop = array();
                 $nop[''] = '---Select Name of official---';
                 foreach ($officer as $value) {
                   $nop[$value->officer_master_id] = $value->off_name;
                 } 
/*newarea Textfield*/
 echo form_dropdown('nop', $nop, set_value('nop',1),'id="nop" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nop');
/*----End newarea Textfield----*/
 ?>
                    <label for="nop" class="error"></label>
                  </div>
                </div>

                
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$hn = array();
$hn[''] = '--Select Holder Name--';
                 foreach ($body as $value) {
                   $hn[$value->man_id] = 'Holder Name: '.$value->name. '&nbsp; Permanent Rank: '.$value->pr. '&nbsp; Contact No: '.$value->phone1;
                 }
/*newarea Textfield*/
 echo form_dropdown('hn', $hn, set_value('hn',''),'id="hn" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('hn');
/*----End newarea Textfield----*/
 ?>
                    <label for="hn" class="error"></label><p id="link"></p>
                  </div>
                </div> 

                   
                  <div class="col-sm-3"> <div class="form-group">
                 <?php  
                  $ito = array('' => '--Select Other battalion/unit--','33' => '7-PAP','9-PAP' => '9-PAP', '13-PAP' => '13-PAP','47' => '27-PAP','36-PAP' => '36-PAP','8' => '75-PAP','54' => '80-PAP','82-PAP' => '82-PAP', 'CCR' => 'CCR', 'CR-PAP' => 'CR-PAP','75' => 'RTC-PAP','ISTC-KPT' => 'ISTC-KPT','CTC-PTL' => 'CTC-PTL','CONTROL-ADGP' => 'CONTROL-ADGP','68' => 'CSO','1-CDO' => '1-CDO','2-CDO' => '2-CDO', '3-CDO' => '3-CDO', '4-CDO' => '4-CDO','5-CDO' => '5-CDO','1-IRB' => '1-IRB','2-IRB' => '2-IRB', '3-IRB' => '3-IRB', '4-IRB' => '4-IRB','5-IRB' => '5-IRB','6-IRB' => '6-IRB', '7-IRB','ADGP office' => 'ADGP office','IGP-PAP' => 'IGP-PAP','IGP-ops' => 'IGP-ops','IGP-Trg' => 'IGP-Trg','IGP-IRB' => 'IGP-IRB','IGP-CDO' => 'IGP-CDO','DIG-Adm-PAP' => 'DIG-Adm-PAP','DIG Adm-IRB' => 'DIG Adm-IRB','DIG-Adm-CDO' => 'DIG-Adm-CDO','DIG-PAP-II & Trg.-Chg' => 'DIG-PAP-II & Trg.-Chg'); 
/*newarea Textfield*/
 echo form_dropdown('obito', $ito, set_value('obito',1),'id="obito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('obito');
/*----End newarea Textfield----*/
 ?>
                    <label for="obito" class="error"></label>
                  </div>
                </div>

                          
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
                  $ito = array('' => '--Select Self Battalion--',  'Commandant office' => 'Commandant office','Asst. Commandant office' => 'Asst. Commandant office', 'DSP office' => 'DSP office','English Branch' => 'English Branch','Account Branch' => 'Account Branch','OSI Branch' => 'OSI Branch','Litigation Branch' => 'Litigation Branch','Steno Branch' => 'Steno Branch','GPF Branch' => 'GPF Branch','Computer cell' => 'Computer cell','Line officer' => 'Line officer','BHM & ABHM' => 'BHM & ABHM','MHC & AMHC' => 'MHC & AMHC','Orderly' => 'Orderly','CDI' => 'CDI', 'CDO & ACDO' => 'CDO & ACDO'); 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>



                  <div class="col-sm-3"> <div class="form-group">
<?php
$issuercnum = array('type' => 'text','name' => 'issuercnum','id' => 'issuercnum','class' => 'form-control','placeholder' =>'Issue RC Number','value' => set_value('issuercnum'));
echo form_input($issuercnum);
echo form_error('issuercnum');
?>
                    <label for="issuercnum" class="error"></label>
                  </div>
                </div>



                 
                  <div class="col-sm-3"><div class="form-group">
             <div class="input-group">
              <?php 
$ircd = array('type' => 'text','name' => 'ircd','id' => 'ircd','class' => 'form-control','placeholder' =>'Issued Start Date','value' => set_value('ircd'));
echo form_input($ircd);
echo form_error('ircd');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="ircd" class="error"></label>

                  </div>
                </div>

                 
                  <div class="col-sm-3"><div class="form-group">
             <div class="input-group">
              <?php 
$id = array('type' => 'text','name' => 'id','id' => 'id','class' => 'form-control','placeholder' =>'Issued End Date','value' => set_value('id'));
echo form_input($id);
echo form_error('id');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="id" class="error"></label>

                  </div>
                </div>
                  </div>

              <div class="row">
                  
                  <div class="col-sm-3"> <div class="form-group">
                 <?php  
$mod = array('' => '--Select Mode of Deposit--' ,'Deposit back in store' => 'Deposit back in store','Deposited for repair' => 'Deposited for repair', 'Deposited for Condemnation' =>'Deposited for Condemnation',
  'Deposited after repair'=>'Deposited after repair');
/*newarea Textfield*/
 echo form_dropdown('mod', $mod, set_value('mod',1),'id="mod" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('mod');
/*----End newarea Textfield----*/
 ?>
                    <label for="mod" class="error"></label>
                  </div>
                </div>


                  <div class="col-sm-3"><div class="form-group">
<?php
$ircn = array('type' => 'text','name' => 'drbircn','id' => 'ircn','class' => 'form-control','placeholder' =>'Deposit RC/Bill no.','value' => set_value('ircn'));
echo form_input($ircn);
echo form_error('ircn');
?>
                    <label for="ircn" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"><div class="form-group">
             <div class="input-group">
              <?php 
$ircd = array('type' => 'text','name' => 'ircdi','id' => 'ircdi','class' => 'form-control','placeholder' =>'Deposit Start Date','value' => set_value('ircd'));
echo form_input($ircd);
echo form_error('ircd');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="ircd" class="error"></label>

                  </div>
                </div>

                  <div class="col-sm-3"><div class="form-group">
             <div class="input-group">
              <?php 
$id = array('type' => 'text','name' => 'idi','id' => 'idi','class' => 'form-control','placeholder' =>'Deposit End Date','value' => set_value('id'));
echo form_input($id);
echo form_error('id');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="id" class="error"></label>

                  </div>
                </div>


              </div>

              <div class="row">
                
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$report = array('Reports' => 'Reports');
/*newarea Textfield*/
 echo form_dropdown('report', $report, set_value('report',1),'id="report" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('report');
/*----End newarea Textfield----*/
 ?>
                    <label for="report" class="error"></label>
                  </div>
                </div> 
                <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
                </div>
              </div>

                 </div>

<?php echo form_close(); ?>
          </div>
        <div class="panel-body"> 
          <!-- Example split danger button -->  
          <h3>Total Records: <?php if($counts!=''){echo count($counts);}else{echo "0";} ?></h3>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Delete</th>
                    <th>Type of Item </th>
                    <th>Name of Item</th>
                     <th>Category of item</th>
                      <th>Condition of item</th>
                      <th>Received From</th>
                       <th>Received Mode</th>
                        <th>Received Voucher/ RC No. </th>
                         <th>Received Voucher/ RC Date</th>
                         <th>Bill No. (if Purchased)</th>
                          <th>Bill Date</th>
                           <th>Received Date</th>
                            <th>Type of Fund</th>
                             <th>Govt fund Name</th>
                              <th>Status</th>

                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td> <a href="<?php echo base_url('bt-mskdelete/'.$value->msk_id); ?>" class="btn btn-danger" onclick='if(!confirm("Do you want to delete this record?")){return false;}' >Delete</a> </td>
                    <td><?php echo $value->typeofitem; ?></td>
                    <td><?php echo $value->nameofitem; ?></td>
                    <td><?php echo $value->catofitem; ?></td>
                    <td><?php echo $value->conofitem; ?></td>
                    <td><?php echo $value->recfrom; ?></td>
                    <td><?php echo $value->recmode; ?></td>
                    <td><?php echo $value->recvocher; ?></td>
                    <td><?php echo $value->recdate; ?></td>
                    <td><?php echo $value->billno; ?></td>
                    <td><?php echo $value->billdate; ?></td>
                    <td><?php echo $value->billrecdate; ?></td>
                    <td><?php echo $value->typeoffund; ?></td>
                    <td><?php echo $value->govtfundname; ?></td>
                    <td><?php echo $value->status; ?></td>
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

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://datatables.net/release-datatables/extensions/ColVis/js/dataTables.colVis.js"></script>
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
        scrollY: 650,
        scrollX: 800,
        pageLength: 20
    } );
  

});
</script>
</body>
</html>