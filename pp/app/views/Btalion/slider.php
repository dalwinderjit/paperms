<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Manage Slider</title>
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
<h1>Manage Sliders </h1>
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
 echo form_open_multipart("", $attributes);
?>
<div class="col-lg-6">
<div class="main-box">
<div class="main-box-body clearfix">

<input type="hidden" name="h" value="1">
<div class="form-group">
<label>Photo <span class="text-danger">*</span></label>
 <input type="file" name="file"> 
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

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>Sr No</th>
<th>Category Name</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php $sn = 0;  foreach ($slider as $value): $sn = $sn +1; ?>
  <tr>
<td><?php echo $sn; ?></td>
<td><img src="<?php echo base_url('webroot/img'); ?>/<?php echo $value->sbanner; ?>" class="img-thumbnail" width="90" height="90"></td>
<td><a href="<?php echo base_url('bt-deleteslider'); ?>/<?php echo $value->slider_id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
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