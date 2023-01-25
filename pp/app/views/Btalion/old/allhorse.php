<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MOUNTS Module</title>
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
      <h3>&nbsp; &nbsp;  MOUNTS Module 7th Bn. PAP </h3>
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
                    <th>Name of Horse</th>
                    <th>Sex</th>
                     <th>Hoof No.</th>
                      <th>Color </th>
                      <th>Height</th>
                       <th>Breed</th>
                        <th>Age at the time of Purchase</th>
                         <th>Mode of Acquisition</th>
                         <th>Order No.</th>
                          <th>Date</th>
                           <th>Price in Digits</th>
                            <th>Weather undergone training of 6 months</th>
                             <th>Health status</th>
                              <th> Last Vaccination Date</th>
                              <th>Vaccinated by</th>
                               <th>Health Check-Up Date</th>
                                <th>Health Check-Up by </th>
                                <th>Present Location</th>
                              <th> Present Deployment</th>
                              <th>Present Posting Location</th>
                               <th>Posting Order No.</th>
                                <th>Posting Order Date </th>
                                 <th> Rider Name</th>
                              <th>Rider Belt No.</th>
                               <th>Address</th>
                                <th>Contact No. </th>
                                <th>Alottment mode</th>
                                <th>Type of Duty</th>
                                <th>Receive</th>
                                <th>Receive Date</th>
                                <th>Horse Condition</th>
                                <th>Remarks</th>
                                <th>Horse Condition</th>
                                <th>Transfer to battalion/Unit</th>
                                <th>Transfer order no.</th>
                                <th>Transfer order Date</th>
                                <th>Date of transfer</th>
                                <th>Type of Duty</th>
                                <th>Remarks</th>
                                <th>Dr name</th>
                                <th>Doctor Contact</th>
                                <th>Checkup date</th>
                                <th>Checkup Type</th>
                                <th>Health Status</th>
                                <th>Remarks</th>           
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->noh; ?></td>
                    <td><?php echo $value->sex; ?></td>
                    <td><?php echo $value->hoof; ?></td>
                    <td><?php echo $value->clor; ?></td>
                    <td><?php echo $value->hieght; ?></td>
                    <td><?php echo $value->breed; ?></td>
                    <td><?php echo $value->age; ?></td>
                    <td><?php echo $value->moa; ?></td>
                    <td><?php echo $value->orderno; ?></td>
                    <td><?php echo $value->dates; ?></td>
                    <td><?php echo $value->pod; ?></td>
                    <td><?php echo $value->wut; ?></td>
                    <td><?php echo $value->heasta; ?></td>
                    <td><?php echo $value->lvd; ?></td>
                    <td><?php echo $value->vaccby; ?></td>
                    <td><?php echo $value->hcud; ?></td>
                    <td><?php echo $value->hcub; ?></td>

                     <td><?php echo $value->pl; ?></td>
                    <td><?php echo $value->pdep; ?></td>
                    <td><?php echo $value->ppl; ?></td>
                    <td><?php echo $value->pon; ?></td>
                    <td><?php echo $value->podi; ?></td>
                    <td><?php echo $value->rname; ?></td>
                    <td><?php echo $value->rbelt; ?></td>
                    <td><?php echo $value->address; ?></td>
                    <td><?php echo $value->contact; ?></td>
                    <td><?php echo $value->alot; ?></td>
                    <td><?php echo $value->tod; ?></td>

                    <td><?php echo $value->rec; ?></td>
                    <td><?php echo $value->lhcd; ?></td>
                    <td><?php echo $value->cw; ?></td>
                    <td><?php echo $value->remark; ?></td>

                    <td><?php echo $value->uhorcon; ?></td>
                    <td><?php echo $value->ubatun; ?></td>
                    <td><?php echo $value->utrans; ?></td>
                    <td><?php echo $value->utransdate; ?></td>
                    <td><?php echo $value->udateoftrans; ?></td>
                    <td><?php echo $value->utod; ?></td>
                    <td><?php echo $value->uremark; ?></td>

                     <td><?php echo $value->dname; ?></td>
                    <td><?php echo $value->dcont; ?></td>
                    <td><?php echo $value->dchekdate; ?></td>
                    <td><?php echo $value->dchektype; ?></td>
                    <td><?php echo $value->dhelthst; ?></td>
                    <td><?php echo $value->dremak; ?></td>
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
           scrollY: 350,
        scrollX: 800
    } );
  

});
</script>
</body>
</html>