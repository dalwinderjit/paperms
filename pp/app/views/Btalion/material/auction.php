<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Auction Material Reports</title>
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
      <h3> &nbsp; &nbsp;Auction Material Reports</h3>
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
         
          </div>
        <div class="panel-body"> 
          <!-- Example split danger button -->  
          <h3>Total Entries: <?php if($weapon!=''){echo count($weapon) + count($mskd);}else{echo "0";} ?> <span class="pull-right"><h3></H3></span></h3>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Type of Item </th>
                    <th>Name of Item</th>
                    <th>Item Info</th>
                    <th>Category of item</th>
                    <th>Condition</th>
                    <th>Quantity</th>
                    <th>Received Type</th>
                    <th>Received From</th>
                    <th>RC Number</th>
                    <th>RC Date</th>
                    <th>Bill No</th>
                    <th>Bill Date</th>
                    <th>Fund</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->typeofitem; ?></td>
                    <td><?php echo $value->nameofitem; ?></td>
                    <td><?php if($value->infos !=''){ echo $value->infos;}else{echo "-";}  ?></td>
                    <td><?php echo $value->catofitem; ?></td>
                    <td><?php echo $value->conofitem;?></td>
                    <td><?php echo $value->recqut; ?></td>
                    <td><?php echo $value->recived_type; ?></td> 
                    <td><?php echo $value->recfrom; ?></td> 
                     <td><?php echo $value->rc_number; ?> <?php //echo $value->per_recpit_no; ?> </td> 
                     <td><?php echo $value->recdate; ?> <?php //echo $value->per_rec_date; ?> <?php echo $value->per_rec_date; ?></td> 
                      <td><?php echo $value->billno; ?></td>
                       <td><?php echo $value->billdate; ?></td> 
                       <td><?php echo $value->fund_name.$value->govt_fund; ?></td>
                        </tr>
                <?php endforeach; } ?>
                <?php foreach($mskd as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->typeofitem; ?></td>
                    <td><?php echo $value->nameofitem; ?></td>
                    <td><?php //if($value->infos !=''){ echo $value->infos;}else{echo "-";}  ?></td>
                    <td><?php echo $value->cat_of_item; ?></td>
                    <td><?php echo $value->condition_of_item;?></td>
                    <td><?php echo $value->quantity; ?></td>
                    <td><?php //echo $value->recived_type; ?></td> 
                    <td><?php //echo $value->recfrom; ?></td> 
                     <td><?php //echo $value->rc_number; ?> <?php //echo $value->per_recpit_no; ?> </td> 
                     <td><?php //echo $value->recdate; ?> <?php //echo $value->per_rec_date; ?> <?php //echo $value->per_rec_date; ?></td> 
                      <td><?php //echo $value->billno; ?></td>
                       <td><?php //echo $value->billdate; ?></td> 
                       <td><?php //echo $value->fund_name.$value->govt_fund; ?></td>
                       </tr>
                <?php endforeach; ?>
             
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
   
    $("#toi").change(function(){
    var ic = $("#toi").val();
    var dataStrings = 'ic='+ ic;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-msk-ajssfilter",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#nameitem11").html(html);
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
        scrollX: 800,
		"order":[[1,'asc']]
    } );
  

});
</script>
</body>
</html>