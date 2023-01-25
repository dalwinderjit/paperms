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
      <h3>&nbsp; &nbsp;  Vehicles Report</h3>

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
   

                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$cov = array('' => '--Make of Vehicle--', 'BUS 52 Seater (Tata)' => 'BUS 52 Seater (Tata)', 'Truck (Tata' => 'Truck (Tata', 'Canter Tata 407' => 'Canter Tata 407', 'Canter S/Mazada' => 'Canter S/Mazada', 'Canter Tata 407' => 'Canter Tata 407', 'Eicher (M/Bus)' => 'Eicher (M/Bus)', 'S/Mazada (Ambulance)' => 'S/Mazada (Ambulance)', 'M/Cycle (Royel Enfield)' => 'M/Cycle (Royel Enfield)', 'M/Cycle (Bajaj Pulsar)' => 'M/Cycle (Bajaj Pulsar)', 'Toyota (Kirloskar Motor)' => 'Toyota (Kirloskar Motor)','M & M  (Bolero)' => 'M & M  (Bolero)', 'M & M Xylo' => 'M & M Xylo', 'Maruti Suzuki (Ertiga)' =>'Maruti Suzuki (Ertiga)', 'M & M (Scarpio)' => 'M & M (Scarpio)', 'Tata Sumo' => 'Tata Sumo','Gypsy' =>'Gypsy');
/*newarea Textfield*/
 echo form_dropdown('cov', $cov, set_value('cov',1),'id="cov" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cov');
/*----End newarea Textfield----*/
 ?>
                    <label for="toi" class="error"></label>
                  </div>
                </div>

                   
                  <div class="col-sm-3"> <div class="form-group">
                 <?php  
$vc = array('' => '--Vehicle Class--', 'LMV' => 'LMV','HTV' => 'HTV', 'HMV' => 'HMV', 'MMV' => 'MMV', 'Two Wheeler' => 'Two Wheeler');
/*newarea Textfield*/
 echo form_dropdown('vc', $vc, set_value('vc',1),'id="vc" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('vc');
 ?>
                    <label for="nameofitem" class="error"></label><p id="link"></p>
                  </div>
                </div>

                   
                  <div class="col-sm-3"><div class="form-group">

                <select name="dob1" class="select2">
                 <option value="">--Vehicle Model--</option>
                    <?php for ($i=1950; $i <2018 ; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?></select>
                    <label for="cti" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"><div class="form-group">

           <?php  
$option = array('' => '--Vehicle Status--', 'In Store' => 'In Store','Issued' => 'Issued');
/*newarea Textfield*/
 echo form_dropdown('option', $option, set_value('option',1),'id="option" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('option'); ?>
                    <label for="option" class="error"></label>
                  </div>
                </div>

                </div>

                  <div class="row">
          
                 <div class="col-sm-3"> <div class="form-group">
<?php  
$vcon = array('' => '--Vehicle Condition--', 'Good' => 'Good', 'Normal' => 'Normal','Bad' => 'Bad');
/*newarea Textfield*/
 echo form_dropdown('vcon', $vcon, set_value('vcon',1),'id="vcon" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('vcon');
/*----End newarea Textfield----*/
 ?>
                    <label for="billno" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                          <?php  
$tpi = array('' => '--Place of Duty--', 'Self battalion' => 'Self battalion','Other Unit/Battalion' => 'Other Unit/Battalion', 'Institution Duty' => 'Institution Duty');
/*newarea Textfield*/
 echo form_dropdown('tpii', $tpi, set_value('tpii',1),'id="tpii" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                  </div>

                </div>


                <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="" class="btn btn-default">Reset</a>
                </div>

                  </div>

                 </div>

<?php echo form_close(); ?>
          </div>
        <div class="panel-body"> 
          <!-- Example split danger button --> 
          <h3>Total Records: <?php echo count($weapon);?></h3>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Repair Detials</th>
                    <th>Category of vehicle </th>
                    <th>Veh Class</th>
                     <th>Registeration No.</th>
                      <th>Chasis No. </th>
                      <th>Engine No.</th>
                      <th>Model Year</th>
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
                    <td><a href="<?php echo base_url('bt-view-mrepair'); ?>/<?php echo $value->mt_id;  ?>" class="btn btn-primary">Repair Details</a></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php echo $value->vechicleclass; ?></td>
                    <td><?php echo $value->regnom; ?></td>
                    <td><?php echo $value->chasisno; ?></td>
                    <td><?php echo $value->engineno; ?></td>
                    <td><?php echo $value->vechile_year; ?></td>
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
                      echo $lda->type_of_duty.'&nbsp; ';
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