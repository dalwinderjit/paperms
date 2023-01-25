<!DOCTYPE html>
<html lang="en">
<head>
<noscript> <META http-equiv="refresh" content="0; URL=<?php echo base_url();?>noscript"> </noscript>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Foodforu::Dashboard</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('html/headbar'); ?>
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </div>
    <div class="contentpanel" style="min-height:530px;">
      <div class="row">
        <div class="col-sm-8 col-md-4">
          <div class="panel panel-success panel-stat">
            <div class="panel-heading">
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-building-o"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Active Restaurants</small>
                    <h1><?php echo $arestro; ?></h1>
                  </div>
                </div><!-- row -->
                <div class="mb15"></div>
              </div><!-- stat -->
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->

       <div class="col-sm-8 col-md-4">
          <div class="panel panel-danger panel-stat">
            <div class="panel-heading">
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                   <i class="fa fa-building-o"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Deactivate Restaurants</small>
                    <h1><?php echo $drestro; ?></h1>
                  </div>
                </div><!-- row -->
                <div class="mb15"></div>
              </div><!-- stat -->
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->

        <div class="col-sm-8 col-md-4">
          <div class="panel panel-primary panel-stat">
            <div class="panel-heading">
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-building-o"></i>
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Total Restaurants</small>
                    <h1><?php echo $allrestro; ?></h1>
                  </div>
                </div><!-- row -->
                <div class="mb15"></div>
              </div><!-- stat -->
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->  
      </div><!-- row -->

     <!-- <div class="row">
        <div class="col-sm-12">
           <div class="panel panel-dark panel-alt widget-quick-status-post">
          <div class="panel-heading">
            <div class="panel-btns">
                <a href="#" class="minimize">&minus;</a>
              </div>--><!-- panel-btns -->
             <!-- <h3 class="panel-title">Last 10 orders details</h3>
            </div>
            <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered mb30">
            <thead>
              <tr>
                <th>S.No</th>
                <th>User Name</th>
                <th>Restaurant</th>
                <th>Order Details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
          </div>--><!-- table-responsive -->
			<!--</div>
            	</div>-->
      <!--  </div>--><!-- col-sm-12 -->
      <!--</div>--><!-- row -->
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
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script>
jQuery(document).ready(function(){  
    "use strict"; 
});
</script>
</body>
</html>