<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Horse Details </title>
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
      <h2><i class="fa fa-building-o"></i> Horse Details </h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active"><a href="<?php echo base_url();?>ca-view-horse">Horse List</a></li>
          <li class="active">Horse Details </li>
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
              <h3 class="panel-title">Horse Details</h3>
            </div>
            <div class="panel-body">
              <strong>Name of Horse:</strong> <?php echo $weapon->horse_name; ?><hr/>
              <strong>Sex:</strong> <?php echo $weapon->sex; ?><hr/>
              <strong>Hoof No:</strong> <?php echo $weapon->hoof_no; ?><hr/>
              <strong>Color:</strong> <?php echo $weapon->color; ?><hr/>
              <strong>Height:</strong> <?php echo $weapon->height; ?><hr/>
              <strong>Breed:</strong> <?php echo $weapon->breed; ?><hr/>
              <strong>Age at the time of purchase:</strong> <?php echo $weapon->atop; ?><hr/>
              <strong>Mode of Acquisition:</strong> <?php echo $weapon->moac; ?><hr/>
              <strong>Order No:</strong> <?php echo $weapon->orderno; ?><hr/>
              <strong>Date:</strong> <?php echo $weapon->redate; ?><hr/>
              <strong>Price:</strong> <?php echo $weapon->price; ?><hr/>
              <strong>Weather undergone training of 6 months:</strong> <?php echo $weapon->wut; ?><hr/>
              <strong>Health Status:</strong> <?php echo $weapon->health_status; ?><hr/>
              <strong>Last Vaccination date:</strong> <?php echo $weapon->last_vc_date; ?><hr/>
              <strong>Vaccinated By:</strong> <?php echo $weapon->vacc_by; ?><hr/>
              <strong>Last health checkup date:</strong> <?php echo $weapon->lhcp; ?><hr/>
              <strong>Health Checkup by:</strong> <?php echo $weapon->hcb; ?><hr/>
              <strong>Present Location:</strong> <?php echo $weapon->pre_loc; ?><hr/>
              <strong>Present Deployment:</strong> <?php echo $weapon->pre_dep; ?><hr/>
              <strong>Present Posting Location:</strong> <?php echo $weapon->pre_po_loc; ?><hr/>
              <strong>Posting order No:</strong> <?php echo $weapon->post_ord_no; ?><hr/>
              <strong>Posting Order Date:</strong> <?php echo $weapon->post_or_date; ?><hr/>

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