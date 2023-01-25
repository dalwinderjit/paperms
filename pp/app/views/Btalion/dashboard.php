<!DOCTYPE html>
<html lang="en">
<head>
<noscript> <META http-equiv="refresh" content="0; URL=<?php echo base_url();?>noscript"> </noscript>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Batalian::Dashboard</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
  <style type="text/css">
    body{
      background: rgba(255,255,255,255);
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
<?php $this->load->view('Btalion/html/headbar',['osi'=>$osi]); ?>
    <div class="pageheader"><?php if($this->session->userdata('user_log')==3 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome  KHC <?php echo $this->session->userdata('nick'); ?></h3>
      <?php } ?>
      <?php if($this->session->userdata('user_log')==5 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome  Material  <?php echo $this->session->userdata('nick'); ?></h3>
      <?php } ?>
            <?php if($this->session->userdata('user_log')==6 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome  MT  <?php echo $this->session->userdata('nick'); ?> </h3>
      <?php } ?>
       <?php if($this->session->userdata('user_log')==4 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome  OSI  <?php echo $this->session->userdata('nick'); ?></h3>
      <?php } ?>
       <?php if($this->session->userdata('user_log')==8 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome Quarters  <?php echo $this->session->userdata('nick'); ?></h3>
      <?php } ?>
       <?php if($this->session->userdata('user_log')==7 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome  Mounts  <?php echo $this->session->userdata('nick'); ?></h3>
      <?php } ?>

      <?php if($this->session->userdata('user_log')==100 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome  <?php echo $this->session->userdata('nick'); ?></h3>
      <?php } ?>

      <?php if($this->session->userdata('user_log')==1 ){ ?>
      <h3> &nbsp;  &nbsp; Welcome  <?php echo $this->session->userdata('nick'); ?></h3>
      <?php } ?>
      <?php if(false): ?>
      <div class="text-right">
        <span id="notificationbtn"></span>
        <div class="notification_icons">
          <span class="fa fa-badge my-badge"><b id="notification_count">33</b></span>
          <span class="fa fa-bell"></span>
        </div>
        <div class="notification text-left" id="notification" style="">
          <ul>
          <li class="active">
            <div><span style="color:green"><b>New Transfer</b></span> <b>HC Mohinder Pal</b> from 2-IRBn.</div>
            <div><span>DDR NO. </span> Transfer Date: <span></span></div>
            <div>Phone No: 9815570011</div>
            <div class="text-right"><span class="pleaseUpdate" onclick="redirectToUdpateEmployeePage(989)">Please Update</span></div>
          </li>
          <li class="disable">
            <div><span style="color:green"><b>New Transfer</b></span> <b>HC Ashok Kumar</b> from 27th.Bn.,PAP</div>
            <div><span>DDR NO. </span> Transfer Date: <span></span></div>
            <div>Phone No: 9872962331</div>
            <div class="text-right"><span class="pleaseUpdate" onclick="redirectToUdpateEmployeePage(1672)">Please Update</span></div>
          </li>
          </ul>
        </div>
      </div>
      <div class="update_notification col-md-3">
        <div class="form-group">
          <?php
            $belt_no = array('type' => 'text','name' => 'belt_no','id' => 'belt_no','class' => 'form-control','placeholder' =>'Enter New belt Number',set_value('belt_no'));
            echo form_input($belt_no);
            echo form_error('belt_no');
          ?>
        </div>
        <input type="hidden" name="belt_no" id="employee_id"/><br/>
        <button onClick="updateBeltNo()" class="btn btn-sm btn-primary">Update</button>
      </div>
        <?php endif; ?>
    </div>
    <div class="contentpanel">
      <div class="row">
      <p class="">
       <img src="<?php echo base_url('webroot/images/dash.jpg');?>" class="img-responsive"/></p>

       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal2" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content"><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">New OSI Notification (<?php echo count($osi); ?>)</h4>
</div>
<div class="modal-body">
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
 echo form_open("", $attributes);
?>
<h4> <?php foreach ($osi as $value) { 
    if($value->uid == 1){
      $btname = fetchoneinfo('users',array('users_id' => $value->BattalionUnitito));
      $dta = fetchoneinfo('deinduction',array('nop' => $value->man_id));
                     if($btname!=''){      
     echo '<input type="checkbox" name="osi[]" value="'. $value->man_id.'"> &nbsp; <strong>Name :</strong>'. $value->name. '&nbsp; <strong>Present Rank:</strong>'.$value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank.'&nbsp; <strong>Mobile No:</strong>'.$value->phono1.'&nbsp; <strong>Transferred from:</strong>'.$btname->nick.'&nbsp; <strong>Transferred Date:</strong>'.$dta->Dateofrelievingi.'&nbsp; <strong>DDR No & Date:</strong>'.$value->ddr.'<hr/>';
    }}
  }
  ?></h4><br/> 
<button type="submit" class="btn btn-primary">Mark as read</button>

<?php echo form_close(); ?>
</div></div>
  </div>
</div> 



 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal3" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content"><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">New MT Notification (<?php echo count($mt); ?>)</h4>
</div>
<div class="modal-body">
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
 echo form_open("", $attributes);
?>
<h4> <?php foreach ($mt as $value) { 
    if($value->uid == 1){    
     echo '<input type="checkbox" name="mt[]" value="'. $value->mt_id.'"> &nbsp; <strong>Vechile Name:</strong>'. $value->catofvechicle. '&nbsp; <strong>Registration No:</strong>'.$value->regnom.'&nbsp;'.'<hr/>';
    }}

  ?></h4><br/> 
<button type="submit" class="btn btn-primary">Mark as read</button>

<?php echo form_close(); ?>
</div></div>
  </div>
</div> 

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
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script>
jQuery(document).ready(function(){  
    "use strict"; 
});
</script>

<?php foreach ($osi as $value) { 
    if($value->uid == 1){
  ?>
<script type="text/javascript">
    $(window).load(function(){
        $('.bs-example-modal2').modal('show');
    });
</script>
<?php } } ?>


<?php foreach ($mt as $value) { 
    if($value->uid == 1){
  ?>
<script type="text/javascript">
    $(window).load(function(){
        $('.bs-example-modal3').modal('show');
    });
</script>
<?php } } ?>
</body>
</html>