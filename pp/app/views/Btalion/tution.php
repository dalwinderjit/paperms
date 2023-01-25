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
<h1>Manage Tution Queries </h1>
</div>
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
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>Subject</th>
<th>Details</th>
</tr>
</thead>
<tbody>
<?php $sn = 0;  foreach ($tution as $value): $sn = $sn +1; ?>
  <tr>
<td><?php echo $sn; ?></td>
<td><?php echo $value->name; ?></td>
<td><?php echo $value->address; ?></td>
<td><?php echo $value->phone; ?></td>
<td><?php echo $value->subject; ?></td>
<td><?php echo $value->details; ?></td>
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