<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MT Module</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://datatables.net/release-datatables/extensions/ColVis/css/dataTables.colVis.css"/>
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
      <h2><i class="fa fa-building-o"></i> MT Module </h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">MT Module</li>
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
        <div class="panel-body"> 
          <!-- Example split danger button --> 
  
          <div class="table-responsive">

            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Category of vehicle </th>
                    <th>Veh Class</th>
                    <th>Sanction</th>
                    <th>Holding</th>
                    <th>Need</th>
                     <th>Registeration No.</th>
                      <th>Chasis No. </th>
                      <th>Engine No.</th>
                       <th>Mode of Acquisition</th>
                        <th>Received/
Attached</th>
                         <th>Received From</th>
                         <th>Received Voucher/ RC No. or N/A</th>
                          <th>Received/ Attached  Date</th>
                           <th>Speedo/ Odometer Reading </th>
                            <th>No. of Tyres Received</th>
                             <th>Status of Vehicle</th>
                              <th> Condition of Vehicle</th>
                              <th>Status of On-Road  Vehicle</th>
                               <th>Status of Off-Road Vehicle in MT</th>
                                <th>If Condemn then Date of condemn  </th>
                                <th>Last Service Date </th>
                              <th> Last Inspection Date </th>
                              <th>Driver Info</th>

                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($msk!=''){ foreach($msk as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php echo $value->vechicleclass; ?></td>
                    <td><?php $ranks = info_fetch_countmto($value->catofvechicle,$ninfo[0]); if($ranks!=''){echo  $ranks->san;}  ?></td>
                    <td><?php $rank = info_fetch_countmtoall($value->catofvechicle,$ninfo[0]); echo $rank;  ?></td>
                    <td><?php if($ranks!=''){echo  $ranks->san - $rank;} ?></td>
                    <td><?php echo $value->regnom; ?></td>
                    <td><?php echo $value->chasisno; ?></td>
                    <td><?php echo $value->engineno; ?></td>
                    <td><?php echo $value->modeofac; ?></td>
                    <td><?php echo $value->recattached; ?></td>
                    <td><?php echo $value->recfrom; ?></td>
                    <td><?php echo $value->recvoucher; ?></td>
                    <td><?php echo $value->recattachdate; ?></td>
                    <td><?php echo $value->speedormeter; ?></td>
                    <td><?php echo $value->nooftyrerec; ?></td>
                    <td><?php echo $value->statusofvechile; ?></td>
                    <td><?php echo $value->conditionofvechile; ?></td>
                    <td><?php echo $value->statusofonroadvichile; ?></td>
                    <td><?php echo $value->statusofoffroadvichile; ?></td>
                    <td><?php echo $value->condemdate; ?></td>
                     <td><?php echo $value->lastservicedate; ?></td>
                    <td><?php echo $value->lastinspectiondate; ?></td>
                    <td><?php $rank = fetchoneinfo('users',array('users_id' => $value->ibattalion));
                    if($rank!=''){echo $rank->nick;}   ?>
                      
                      <?php $dri = fetchoneinfo('newosi',array('man_id' => $value->ipdriver_name));
                    if($dri!=''){echo $dri->name. '&nbsp;'.$dri->presentrank;}   ?>

                    </td>
                <?php endforeach; } ?>
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

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://datatables.net/release-datatables/extensions/ColVis/js/dataTables.colVis.js"></script>
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
        scrollY: 650,
        scrollX: 800,
        pageLength: 20
    } );

});
</script>
</body>
</html>