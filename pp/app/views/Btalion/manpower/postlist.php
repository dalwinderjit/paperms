<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> ManPower Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
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
      <h3> &nbsp; &nbsp;  ManPower Report</h3>
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
          <!-- Example split danger button -->
          <h3>Total Records: <?php echo count($weapon); ?></h3>
          <div class="table-responsive">
             <table class="table table-bordered">
              <thead>
                 <tr>
                    <th> Sr.No.</th>
                    <th>Delete</th>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Dept.No</th>  
                    <th>Posting </th>
                 </tr>
              </thead>
              <tbody>
              <?php $count = 0 ;    ?>
              <?php  foreach($weapon as $userd){ $count = $count + 1; ?>
                <tr>
                  <td><?php echo $count; ?></td>
                   <td><a href="<?php echo base_url();?>bt-posdeleit/<?php echo $userd->newosip_id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
                   <td><?php echo $userd->name; ?></td>
                 <td><?php echo $userd->cexrank; ?></td>
                  <td><?php echo $userd->depttno; ?></td>
                  <td><?php echo $userd->fone1; ?> <?php echo $userd->fone2; ?><?php echo $userd->fone3; ?><?php echo $userd->fone4; ?><?php echo $userd->fone5; ?><?php echo $userd->fone6; ?><?php echo $userd->fone7; ?><?php echo $userd->fone8; ?><?php echo $userd->fone9; ?><?php echo $userd->fone10; ?><?php echo $userd->fone11; ?><?php echo $userd->fone12; ?><?php echo $userd->lone1; ?><?php echo $userd->lone2; ?><?php echo $userd->lone3; ?><?php echo $userd->sqone1; ?><?php echo $userd->sqone2; ?><?php echo $userd->sqone3; ?><?php echo $userd->sqone4; ?><?php echo $userd->sqone5; ?><?php echo $userd->sqone6; ?><?php echo $userd->paone1; ?><?php echo $userd->paone2; ?><?php echo $userd->paone3; ?><?php echo $userd->paone4; ?><?php echo $userd->paone5; ?><?php echo $userd->paone6; ?><?php echo $userd->paone7; ?><?php echo $userd->paone8; ?><?php echo $userd->paone9; ?><?php echo $userd->paone10; ?><?php echo $userd->paone11; ?><?php echo $userd->paone12; ?><?php echo $userd->paone13; ?><?php echo $userd->paone14; ?><?php echo $userd->paone15; ?><?php echo $userd->paone16; ?><?php echo $userd->paone17; ?><?php echo $userd->paone18; ?><?php echo $userd->paone19; ?><?php echo $userd->paone20; ?><?php echo $userd->paone21; ?><?php echo $userd->traning1; ?><?php echo $userd->traning2; ?><?php echo $userd->traning3; ?><?php echo $userd->ssone23; ?><?php echo $userd->ssone24; ?><?php echo $userd->ssone25; ?><?php echo $userd->ssone26; ?><?php echo $userd->awbone1; ?><?php echo $userd->awbone2; ?><?php echo $userd->awbone3; ?><?php echo $userd->awbone4; ?><?php echo $userd->awbone5; ?><?php echo $userd->awbone6; ?><?php echo $userd->awbone7; ?><?php echo $userd->awbone8; ?><?php echo $userd->awbone9; ?><?php echo $userd->awbone10; ?><?php echo $userd->awbone11; ?><?php echo $userd->awbone12; ?><?php echo $userd->bmdone1; ?><?php echo $userd->bmdone2; ?><?php echo $userd->bmdone3; ?><?php echo $userd->bmdone4; ?><?php echo $userd->bmdone5; ?><?php echo $userd->bmdone6; ?><?php echo $userd->bmdone7; ?><?php echo $userd->bmdone8; ?><?php echo $userd->bmdone9; ?><?php echo $userd->instone1; ?><?php echo $userd->instone2; ?><?php echo $userd->instone3; ?><?php echo $userd->instone4; ?></td>
                </tr>
                <?php } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->  
          <?php //echo $links; ?> 
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
   
     $("#postate").change(function(){
    var state = $("#postate").val();
    var dataStrings = 'state='+ state;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-sti-ajfilter",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#dis").html(html);
    }  
      
    });

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
         scrollY: 350,
        scrollX: 800
    } );
  

});
</script>
</body>
</html>