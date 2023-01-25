<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>KHC Module Weapon</title>
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
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
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h4> &nbsp; &nbsp; KHC Module (Weapon) <span class="pull-right"> <?php  echo 'Date:'.date('d-m-Y');?> &nbsp; &nbsp; <?php echo 'login:'. $this->session->userdata('username'); ?></span></h4>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
    <div class="panel panel-default">
        
        <div class="panel-body"> 

          <!-- Example split danger button -->  
          <h2>Total Entries: <?php echo count($weapon); ?> <span><a href="<?php echo base_url('bt-khc'); ?>" class="pull-right">Go Back </a></span></h2>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                  <th>S.No</th>
                  <th>User</th>
                  <th>Btalion</th>
                  <th>Type of Weapon </th>
                  <th>Total</th>
                  <th>Issued </th>
                  <th>In Kot</th>
                  <th>Case/Lost/Condemn etc </th>
                 </tr>
              </thead>
              <tbody>
                <?php 
                 $count = 0;

               foreach ($weapon as  $value) {
                  $count = $count+1; ?>
                 <tr class="odd gradeX">
                  <?php 
                    /*$a = info_fetch_countkhciio($value->tow,'In Kot',$value->bat_id); 
                    $b = info_fetch_countkhciio($value->tow,'Issued',$value->bat_id);
                    $c = info_fetch_countkhciio($value->tow,'Case Property in kot',$value->bat_id);
                    $d = info_fetch_countkhciio($value->tow,'Case Property in PS',$value->bat_id);
                    $e = info_fetch_countkhciio($value->tow,'Condemn',$value->bat_id);
                    $f = info_fetch_countkhciio($value->tow,'Lost',$value->bat_id);*/

                    $a = $value->a; 
                    $b = $value->b;
                    $c = $value->c;
                    $d = $value->d;
                    $e = $value->e;
                    $f = $value->f;
                  ?>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->user_name; ?></td>
                    <td><?php echo $value->nick; ?></td>
                    <td><?php echo $value->tow; ?></td>
                    <td><?php echo $a + $b + $c + $d + $e + $f; ?></td>
                    <td><?php  echo $b; ?></td>
                    <td><?php  echo $a; ?></td>
                    <td><?php  echo $c + $d + $e + $f; ?></td>
                   
                   
                <?php } ?>
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
<script src="<?php echo base_url();?>webroot/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

<script src="<?php echo base_url(); ?>webroot/data/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/vfs_fonts.js"></script></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.colVis.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control"),

  jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#id').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#ircdi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#idi').datepicker({dateFormat: "dd/mm/yy"});
});

$(document).ready(function() {
var table = $('#table').DataTable( {
         dom: 'C<"clear">Bfrtip',

       buttons: [
            {
               extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        colVis: {
            exclude: [ 0 ]
        },
         scrollY: 350
    } );
  

});

</script>
</body>
</html>