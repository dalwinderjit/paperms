<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Service ammunition deposit to Nodel Battalion/CA</title>
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
      <h3> &nbsp;  &nbsp;Service ammunition deposit to Nodel Battalion/CA</h3>
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
        <div class="panel-body">   
          <div class="table-responsive">
            <table class="table" >
              <thead>
                 <tr>
              <th>S.No</th>
              <th>Weapon</th>
              <th>Ammunition Bore</th>
              <th>Qty</th>
              <th>Miss cartridges</th>
              <th>Empty cartridges</th>
              <th>Lost cartridges</th>
              <th>Condem Ammunition</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  if($weapon!=''){ foreach($weapon as $value): $count = $count+1;
                    if($value->mcat !='' || $value->ecat !='' || $value->locat !=''){
                   ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->weapon;?></td>
                    <td><?php echo $value->bore; ?></td>
                    <td><?php echo $value->amuqty; $bb = ''; 
                      $hold = fetchoneinfoammu('newwepon_dataqty',array( 'arm' => $value->weapon, 'bat_id' => $this->session->userdata('userid'))); if($hold !=''){}  ?></td>
                    <td><?php echo $value->mcat;  ?></td>
                    <td><?php echo $value->ecat;?></td>
                    <td><?php echo $value->locat; ?></td>
                    <td><?php //$f = info_fetch_ammuinus($value->bore,$this->session->userdata('userid'),'Service'); if($f !=''){echo $f->qnty;} ?></td>
                    <td><a href="<?php echo base_url('bt-nodeldepositid').'/'.$value->deposit_ammu_id.'/'.$hold->nwep_id; ?>" class="btn btn-primary btn-xs">Return to</a> </td> 
                  </tr>
                <?php } endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->   
        </div><!-- panel-body -->
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
<script src="<?php echo base_url();?>webroot/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("#table1").dataTable(),
  jQuery("select").select2({minimumResultsForSearch:-1}),
  jQuery("select").removeClass("form-control")
});
</script>
</body>
</html>