<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Quator Details </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.datatables.css"/>
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
      <h2><i class="fa fa-building-o"></i> Quator Details </h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active"><a href="<?php echo base_url();?>ca-view-quator">Quator List</a></li>
          <li class="active">Quator Details </li>
        </ol>
      </div>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-dark">
            <div class="panel-heading">
              <div class="panel-btns">
                <a class="minimize" href="#">−</a>
              </div><!-- panel-btns -->
              <h3 class="panel-title">Quator Details</h3>
            </div>
            <div class="panel-body">
              <strong>Residential Complex:</strong> <?php echo $weapon->resi_com; ?><hr/>
              <strong>Type of Quarter:</strong> <?php echo $weapon->type_quater; ?><hr/>
              <strong>Responsibility (Quota) officer:</strong> <?php echo $weapon->roff; ?><hr/>
              <strong>Location:</strong> <?php echo $weapon->location; ?><hr/>
              <strong>Floor:</strong> <?php echo $weapon->floor; ?><hr/>
              <strong>Accommodation Type:</strong> <?php echo $weapon->acommtype; ?><hr/>
              <strong>Quarter No:</strong> <?php echo $weapon->quater_no; ?><hr/>
              <strong>Electricity Meter No:</strong> <?php echo $weapon->electricty_meter_no; ?><hr/>
              <strong>Condition:</strong> <?php echo $weapon->conditionss; ?><hr/>
              <strong>Taken over date from PPHC:</strong> <?php echo $weapon->todfp; ?><hr/>

            </div>
          </div><!-- panel -->
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

</body>
</html>