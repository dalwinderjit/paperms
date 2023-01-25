<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>KHC Ammuniation Module</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://datatables.net/release-datatables/extensions/ColVis/css/dataTables.colVis.css"/>
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
      <h3>&nbsp; &nbsp;  KHC Ammuniation Module <?php  if($name!=''){echo $name->nick;} ?></h3>
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
              <div class="row">
               <?php 
 /*Form Validation set*/
 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      );
 echo form_open_multipart("", $attributes);
?>
                  <div class="row">                  
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array();
$tpi[''] = '--Select Type of Weapon--';
                 foreach ($tow as $value) {
                   $tpi[$value->bore] = $value->bore;
                 }
/*newarea Textfield*/
 echo form_dropdown('tpi', $tpi, set_value('tpi',1),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
                <div class="col-sm-3"><div class="form-group">
<?php
$lsd = array('type' => 'text','name' => 'orderno','id' => 'ons','class' => 'form-control','placeholder' =>'Received Voucher/ RC No. ','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>
                  <div class="col-sm-3"><div class="form-group">
<?php
$lsd = array('type' => 'text','name' => 'orderno','id' => 'ons','class' => 'form-control','placeholder' =>'No. of Magazine Received','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>
                 <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
                </div>
                  </div><br/>
<?php echo form_close(); ?>
          </div></div>
        <div class="panel-body"> 
          <!-- Example split danger button -->  
          <h3>Total Records: <?php echo count($counts); ?></h3>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Category of Ammunition</th>
                    <th>Ammunition Bore</th>
                     <th>Ammunition Weapon</th>
                      <th>Received Voucher/ RC No.</th>
                       <th>Received Date </th>
                        <th>Received From</th>
                         <th>Year of Manufacture (Lot No.)</th>
                         <th>Received Quantity</th>
                          <th>Total Received in Kot </th>
                           <th>In Kot </th>
                            <th>Deposited to CA </th>
                             <th>In kot</th>
                              <th>Issued</th>
                              <th>Deposited to other units</th>
                              <th>Lost</th>
                              <th>Lost Quantity Compensated from practice Ammunition </th>
                              <th>Last AE Inspection Date </th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->cat; ?></td>
                    <td><?php echo $value->ammubore; ?></td>
                    <td><?php echo $value->ammuwep; ?></td>
                    <td><?php echo $value->recvo; ?></td>
                    <td><?php echo $value->recdate; ?></td>
                    <td><?php echo $value->recfrom; ?></td>
                    <td><?php echo $value->yearman; ?></td>
                    <td><?php echo $value->recquan; ?></td>
                    <td><?php echo $value->recinkot; ?></td>
                    <td><?php echo $value->uninkot; ?></td>
                    <td><?php echo $value->depca; ?></td>
                    <td><?php echo $value->ssainkot; ?></td>
                    <td><?php echo $value->serissue; ?></td>
                    <td><?php echo $value->dtootherunit; ?></td>
                    <td><?php echo $value->serlost; ?></td>
                    <td><?php echo $value->depostonodebat; ?></td>
                    <td><?php echo $value->lastaeins; ?></td>
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
  jQuery("select").removeClass("form-control")
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