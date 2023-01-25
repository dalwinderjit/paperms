<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>CA::Issue Ammunition list</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    <style type="text/css">
    .cur{
      cursor: pointer;
    }
    </style>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view(F_CA.'html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view(F_CA.'html/headbar'); ?>
    <div class="pageheader">
      <h2><i class="fa fa-building-o"></i> Issue Ammunition list</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>ca-dashboard">Dashboard</a></li>
          <li class="active">Issue Ammunition list</li>
        </ol>
      </div>
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
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">Issue Ammunition list </h3>
          </div>
        <div class="panel-body">  
         <div class="btn-group">
  <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Columns show/hide
  </button>
  <div class="dropdown-menu" id="colvis">
  </div>
</div>  
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Ammunition type</th>
                    <th>Ammunition Name</th>
                    <th>Lot No./Year</th>
                    <th>Quantity</th>
                    <th>Issue Date</th>
                    <th>Batallion Name</th>
                    <th>RC/Voucher No</th>
                    <th>RC/Voucher date</th>
              </thead>
              <tbody>
                <?php  $count = 0; foreach($ammu as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->ammu_type; ?></td>
                    <td><?php echo $value->annu_name; /*$wep = explode(',', $value->annu_name); $weapon = info_fetch_recammu($wep); $prefix = '';  foreach ($weapon as  $val) {
      
                     echo $prefix . '' . $val['ammunition_bore']. '';
                      $prefix = ', ';
                    }*/ ?></td>
                     <td><?php echo $value->lyear; ?></td>
                    <td><?php echo $value->quantity; ?></td>
                    <td><?php echo $value->idate; ?></td>
                    <td><?php echo $value->user_name; ?></td>
                    <td><?php echo $value->rcvno; ?></td>
                    <td><?php echo $value->rcvdate; ?></td>
                  </tr>
                <?php endforeach; ?>
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
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("#table1").dataTable(),
  jQuery("select").select2({minimumResultsForSearch:-1}),
  jQuery("select").removeClass("form-control")
});


$(document).ready(function() {
var table = $('#table').DataTable();
  
  // for each column in header add a togglevis button in the div
  $("#table thead th").each( function ( i ) {
    var name = table.column( i ).header();
    var spanelt = document.createElement( "p" );
    spanelt.className = 'cur';
    spanelt.innerHTML = name.innerHTML;           
    
    $(spanelt).addClass("colvistoggle");
    $(spanelt).attr("colidx",i);    // store the column idx on the button
    
    $(spanelt).on( 'click', function (e) {
      e.preventDefault(); 
      // Get the column API object
      var column = table.column( $(this).attr('colidx') );
       // Toggle the visibility
      column.visible( ! column.visible() );
    });
    $("#colvis").append($(spanelt));
  });
} );
</script>
</body>
</html>