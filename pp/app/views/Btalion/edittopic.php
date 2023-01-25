<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Manage Topics</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/bootstrap/bootstrap.min.css"/>
<script src="<?php echo base_url(); ?>webroot/js/demo-rtl.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/libs/nanoscroller.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/compiled/theme_styles.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/libs/dataTables.fixedHeader.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>webroot/css/libs/dataTables.tableTools.css">
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="theme-wrapper">
<?php $this->load->view('Btalion/header'); ?>
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
<h1>Manage Topics </h1>
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
<div class="col-lg-6">
<div class="main-box">
<div class="main-box-body clearfix">

<div class="form-group">
  <label>Subject <span class="text-danger">*</span></label>
 <?php 
 $vcati = array();
 $vcati[''] = '--select--';
 foreach ($mname as $value) {
    $vcati[$value->main_menu_id] = $value->menu_name;
 }
echo form_dropdown('vcat', $vcati, set_value('vcat',$topic->main_menu_id),'id="vcat"  class="form-control  line" '); 
echo form_error('vcat');
?>
</div>


<div class="form-group">
  <label>Title <span class="text-danger">*</span></label>
  <?php 
$tmob = array('type' => 'text','name' => 'vtit','id' => 'tmob','class' => 'form-control input-sm  line','placeholder' =>'Title','value' => $topic->sub_menu_name);
echo form_input($tmob);
echo form_error('vtit');
?> 
</div>

<div class="form-group">
  <label>YouTube URL <span class="text-danger">*</span></label>
  <?php 
$tname = array('type' => 'text','name' => 'yname','id' => 'tname','class' => 'form-control input-sm line','placeholder' =>'YouTube URL','value' => $topic->sylink);
echo form_input($tname);
echo form_error('yname');
?> 
</div>

<div class="form-group">
  <label>Description</label>
  <?php 
$temail = array('type' => 'text','name' => 'vdes','id' => 'temail','class' => 'form-control input-sm  line','placeholder' =>'Description','value' =>  $topic->sub_menu_details,'style' => 'height:80px;');
echo form_textarea($temail);
echo form_error('vdes');
?> 
</div>





<div class="form-group">
<button type="submit" class="btn btn-success">Save</button>
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
</div>

<script src="<?php echo base_url(); ?>webroot/js/demo-skin-changer.js"></script>  
<script src="<?php echo base_url(); ?>webroot/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/demo.js"></script>  
 
<script src="<?php echo base_url(); ?>webroot/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/dataTables.tableTools.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/jquery.dataTables.bootstrap.js"></script>
 
<script src="<?php echo base_url(); ?>webroot/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/pace.min.js"></script>
 
<script>
  $(document).ready(function() {
    var table = $('#table-example').dataTable();
    $('div.dataTables_filter input').focus();
    
  });
  </script>
</body>
</html>