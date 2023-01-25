<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Reset Password</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/bootstrap/bootstrap.min.css"/>
 
<script src="<?php echo base_url(); ?>webroot/js/demo-rtl.js"></script>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/libs/nanoscroller.css"/>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/compiled/theme_styles.css"/>
 
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/libs/daterangepicker.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/libs/jquery-jvectormap-1.2.2.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/libs/weather-icons.css" type="text/css"/>
 
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/plugin/webcamjs-master/webcam.js"></script>

</head>
<body>
<div id="theme-wrapper">
<header class="navbar" id="header-navbar">
<div class="container">
<a href="" id="logo" class="navbar-brand">KMV COLLEGE
</a>
<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
<ul class="nav navbar-nav pull-left">
<li>
<a class="btn" id="make-small-nav">
<i class="fa fa-bars"></i>
</a>
</li>


</ul>
</div>

</div>
</div>
</header>
<div id="page-wrapper" class="container">
<div class="row">
<div id="nav-col">
<?php $this->load->view('Btalion/nav'); ?>
<div id="nav-col-submenu"></div>
</div>
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<div id="content-header" class="clearfix">
<div class="pull-left">
<ol class="breadcrumb">
<h1>Reset Password </h1>
</div>
</div>
</div>
</div>
 <div class="row">
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
 $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'class'             => 'margin-bottom-0'
      );
 echo form_open("", $attributes);
?>
<div class="col-lg-3">
<div class="main-box">
<div class="main-box-body clearfix">
<div class="form-group">
<label for="exampleInputEmail1">Old Password<span class="text-danger">*</span></label>
 <?php 
$opass = array('type' => 'password','name' => 'opass','id' => 'opass,','class' => 'form-control', 'value' => set_value('opass'));
echo form_input($opass);
echo form_error('opass');
?>
</div>

<div class="form-group">
<label for="exampleInputEmail1">New Password<span class="text-danger">*</span></label>
 <?php 
$npass = array('type' => 'password','name' => 'npass','id' => 'npass,','class' => 'form-control', 'value' => set_value('npass'));
echo form_input($npass);
echo form_error('npass');
?>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Confirm Password<span class="text-danger">*</span></label>
<?php 
$cpass = array('type' => 'password','name' => 'cpass','id' => 'cpass','class' => 'form-control', 'value' => set_value('cpass'));
echo form_input($cpass);
echo form_error('cpass');
?>
</div>

<div class="form-group">
<button type="submit" class="btn btn-success">Save</button>
</div>

</div>
</div>
</div>




</div>
</form>
</div>
</div>

</div>
</div>
</div>
</div>

<script src="<?php echo base_url(); ?>webroot/js/demo-skin-changer.js"></script>  
<script src="<?php echo base_url(); ?>webroot/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/demo.js"></script>  
<script src="<?php echo base_url(); ?>webroot/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/gdp-data.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/skycons.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/pace.min.js"></script>

</body>
</html>