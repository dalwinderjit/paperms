<!DOCTYPE html>
<html lang="en">
<head>
<noscript> <META http-equiv="refresh" content="0; URL=<?php echo base_url();?>noscript"> </noscript>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Batalian::Helpdesk</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
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
      <h2><i class="fa fa-home"></i> Helpdesk</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </div>
    <div class="contentpanel" style="min-height:530px;">
     <h3>ASI Surinder Singh (System Administrator)</h3>
     <h4>Mob: 9872600134</h4>

     <h3>S/CT Gurmit Singh (Assistant System Administrator)</h3>
     <h4>Mob: 9855056391</h4>

     <h3>CT Dalwinderjit Singh (System Specialist)</h3>
     <h4>Mob: 8699568125</h4>

     <h3>Sh. Vijay Kumar (System Specialist)</h4>
     <h4>Mob: 9779729030</h4><hr/>

     <h3>E-mail: servererms@gmail.com</h3><br>
	 
	  <h3>9.00 AM to 5.00 PM (Working Days Only)</h3>

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
</body>
</html>