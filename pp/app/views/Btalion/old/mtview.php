<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Vehicles Report</title>
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
      <h3>&nbsp; &nbsp;  History of Vehicle</h3>

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
          <h3>Total Records: <?php echo count($weapon);?></h3>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Category of vehicle </th>
                    <th>Veh Class</th>
                     <th>Registeration No.</th>
                      <th>Chasis No. </th>
                      <th>Engine No.</th>
                      <th>Model Year</th>
                      <th>AC/Non AC</th>
                      <th>BP/Non BP</th>
                       <th>Mode of Acquisition</th>
                        <th>Received/Attached</th>
                         <th>Received From</th>
                         <th>Received Voucher/ RC No. or N/A</th>
                          <th>Received/ Attached  Date</th>
                           <th>Speedo/ Odometer Reading </th>
                           <th> Condition of Vehicle</th>
                           <th>Status of  Vehicle</th>
                              <th>Status details</th>
                                <th>Last Service Date </th>
                              <th> Last Inspection Date </th>
                              <th>Issue Info</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php echo $value->vechicleclass; ?></td>
                    <td><?php echo $value->regnom; ?></td>
                    <td><?php echo $value->chasisno; ?></td>
                    <td><?php echo $value->engineno; ?></td>
                    <td><?php echo $value->vechile_year; ?></td>

                    <td><?php echo $value->acnonac; ?></td>
                    <td><?php echo $value->bp; ?></td>
                    
                    <td><?php echo $value->modeofac; ?></td>
                    <td><?php echo $value->recattached; ?></td>
                    <td><?php echo $value->recfrom; ?></td>
                    <td><?php echo $value->recvoucher; ?></td>
                    <td><?php echo $value->recattachdate; ?></td>
                    <td><?php echo $value->speedmetor; ?></td>
                    <td><?php echo $value->vehiclecon; ?></td>
                    <td><?php echo $value->statusofvechile; ?></td> 
                    <td><?php echo $value->statusofoffroadvichile; ?></td>
                     <td><?php $lda = fetchoneinfodesc('vicuins',array('rnum' => $value->mt_id, 'cw' => 'Regular Service'),'armins_id');
                     if(isset($lda->lid)){
                      echo $lda->lid;
                     } ?></td>
                    <td><?php $lda = fetchoneinfodesc('vicuins',array('rnum' => $value->mt_id, 'cw' => 'Inspection'),'armins_id');
                     if(isset($lda->lids)){
                      echo $lda->lids;
                     } ?></td>
                     <td><?php $lda = fetchoneinfodesc('issue_vehicle',array('reg_no' => $value->mt_id),'issue_vehicle_id');
                     if($lda !=''){
                      echo $lda->noduty.'&nbsp; '.$lda->oname.'&nbsp;'.$lda->duty_details.'&nbsp;'.$lda->instone4.'&nbsp;'.$lda->other_state;
                      $osi = fetchoneinfo('newosi',array('man_id' => $lda->officer));
                      if($osi !=''){
                        echo $osi->cexrank.'&nbsp; '.$osi->name;
                      }
                      
                     } ?></td>
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
         scrollY: 350,
        scrollX: 800
    } );
  

});

</script>
</body>
</html>