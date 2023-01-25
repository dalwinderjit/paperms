<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>KHC Weapon Module</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://datatables.net/release-datatables/extensions/ColVis/css/dataTables.colVis.css"/>
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
      <h3>&nbsp; &nbsp;  KHC Weapon Module <?php // if($name!=''){echo $name->nick;} ?></h3>
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
                  <div class="row">          
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array();
$tpi[''] = '--Select Type of Weapon--';
                 foreach ($tow as $value) {
                   $tpi[$value->arm] = $value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('tpi', $tpi, set_value('tpi',1),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
                  <div class="col-sm-3"><div class="form-group">
<?php
$lsd = array('type' => 'text','name' => 'orderno','id' => 'ons','class' => 'form-control','placeholder' =>'Body No.','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>
             
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array('' => '--Select status of weapon--', 'In Kot' => 'In Kot','Issued' => 'Issued');
/*newarea Textfield*/
 echo form_dropdown('issued', $tpi, set_value('issued',1),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('issued');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div>

                   <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array('' => '--Report View --', '1' => 'Figure View','2' => 'Full view');
/*newarea Textfield*/
 echo form_dropdown('report', $tpi, set_value('report',1),'id="report" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('report');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

                  </div><br/>
                  <div class="row">   
                     
                <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
                </div>
                
                  </div>
<?php echo form_close(); ?>
          </div></div>
        <div class="panel-body"> 

        <?php if($rep == 1){ ?>
          <!-- Example split danger button -->  
          <h2>Total Entries: <?php  foreach($weapon as $value){
                  //foreach($counts as $values){
                    $names = fetchoneinfoallgroup('old_weapon',array('bat_id' => $value->bat_id,'tow' => $value->tow),'tow');

                    $nal[] = $names;
                  //}

                } foreach ($nal as  $values) {
               foreach ($values as  $value) {
               $info[] = $value->bat_id;
               }} echo count($info); ?></h2>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                  <th>S.No</th>
                  <th>Battalion</th>
                  <th>Type of Weapon </th>
                  <th>In Kot</th>
                  <th>Issued </th>
                  <th>Total</th>

                 </tr>
              </thead>
              <tbody>
                <?php   $count = 0; if($weapon!=''){
                      $nal = array();
                 foreach($weapon as $value){
                   $names = fetchoneinfoallgroup('old_weapon',array('bat_id' => $value->bat_id,'tow' => $value->tow),'tow');

                    $nal[] = $names;
                  

                }}

                foreach ($nal as  $values) {
               foreach ($values as  $value) {
                  $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php $batname = fetchoneinfo('users',array('users_id' =>$value->bat_id)); if($batname !=''){ echo $batname->nick; }?></td>
                    <td><?php echo $value->tow; ?></td>
                   <td><?php $a = info_fetch_countkhc($value->tow,'In Kot',$value->bat_id); echo $a; ?></td>
                   <td><?php $b = info_fetch_countkhc($value->tow,'Issued',$value->bat_id); echo $b; ?></td>
                   <td><?php echo $a + $b; ?></td>
                <?php } } ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 
          <?php }else{ ?>

          <!-- Example split danger button -->  
          <h3>Total Records: <?php echo count($counts); ?></h3>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Battalion</th>
                    <th>Type of Weapon </th>
                    <th>Body No.</th>
                     <th>Butt No</th>
                      <th>Received From</th>
                       <th>Received Mode </th>
                        <th>Received Voucher/ RC No.  </th>
                         <th>Received Date</th>
                         <th>No. of Magazine Received</th>
                          <th>Condition of Weapon </th>
                           <th>Status of Serviceable  Weapon </th>
                            <th>Status of Un-Serviceable weapon in Kot</th>
                             <th>If Condemn then Date of condemn</th>
                              <th>Last RA Inspection Date</th>
                              <th>Last AIA Inspection Date</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php $batname = fetchoneinfo('users',array('users_id' =>$value->bat_id)); echo $batname->nick; ?></td>
                    <td><?php echo $value->tow; ?></td>
                    <td><?php echo $value->bono; ?></td>
                    <td><?php echo $value->buno; ?></td>
                    <td><?php echo $value->recform; ?></td>
                    <td><?php echo $value->recmod; ?></td>
                    <td><?php echo $value->recvoc; ?></td>
                    <td><?php echo $value->recdate; ?></td>
                    <td><?php echo $value->magrec; ?></td>
                    <td><?php echo $value->conofwap; ?></td>
                    <td><?php echo $value->staofserv; ?></td>
                    <td><?php echo $value->unwepkot; ?></td>
                    <td><?php echo $value->condate; ?></td>
                    <td><?php echo $value->raidate; ?></td>
                    <td><?php echo $value->alaidate; ?></td>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 
          <?php } ?>
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
  jQuery("select").removeClass("form-control")
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
         scrollY: 350
    } );
});
</script>
</body>
</html>