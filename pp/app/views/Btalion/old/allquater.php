<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> QUARTER Module</title>
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
      <h3>&nbsp; &nbsp; &nbsp;QUARTER Module <?php if($name!=''){ echo $name->nick; } ?></h3>
    
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
      'method' => 'get'
      );
 echo form_open_multipart("", $attributes);
?>

                  <div class="row">
                   <div class="col-sm-3"><div class="form-group">
                         <?php  
                    $ito = array();
                 $ito[''] = '--Battalion--';
                 foreach ($uname as $value) {
                  if($value->users_id == 91 || $value->users_id == 92 || $value->users_id == 93  || $value->users_id == 94  || $value->users_id == 95){
                   
                 }elseif($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
                    $ito[193] = '1-IRB';
                    $ito[168] = '2-IRB';
                    $ito[157] = '3-IRB';
                    $ito[118] = '4-IRB';
                    $ito[163] = '6-IRB';
                  }elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
                    $ito[207] = '1-CDO';
                    $ito[175] = '2-CDO';
                    $ito[145] = '3-CDO';
                    $ito[151] = '4-CDO';
                    $ito[181] = '5-CDO';
                    $ito[199] = 'CTC BHG';
                  }else{
                    $ito[$value->users_id] = $value->nick;
                  } 
                  }  
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"><div class="form-group">
<?php
$lsd = array('type' => 'text','name' => 'orderno','id' => 'ons','class' => 'form-control','placeholder' =>'Quarter No.','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>

                <div class="col-sm-3"><div class="form-group">
<?php
$lsd = array('type' => 'text','name' => 'rcno','id' => 'ons','class' => 'form-control','placeholder' =>'Elecricity Meter No.','value' => set_value('rcno'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>


                  <div class="col-sm-3"><div class="form-group">
<?php
$lsd = array('type' => 'text','name' => 'mrec','id' => 'ons','class' => 'form-control','placeholder' =>'Allotment order','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>

                  </div><br/>

                  <div class="row">


                     <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array('' => '--Report View --', '1' => 'Figure View','2' => 'Full view');
/*newarea Textfield*/
 echo form_dropdown('report', $tpi, set_value('report',''),'id="report" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('report');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

                <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo base_url('bt-quaters-olds') ?>" class="btn btn-default">Reset</a>
                </div>
                  </div>

<?php echo form_close(); ?>
          </div></div>
        <div class="panel-body"> 
        <?php if($rep == 1){ ?>
          <!-- Example split danger button --> 
          <h2>Total Records: <?php echo count($counts); ?></h2>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Battalion</th>
                    <th>Alloted</th>
                    <th>Vacent</th>
                    <th>Total </th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1;
                  if($value->bat_id == 63){}else{
                 ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php $batname = fetchoneinfo('users',array('users_id' =>$value->bat_id)); if($batname !='' ){ echo $batname->nick; }?></td>
                    <td><?php $a = info_fetch_countqtr($value->residecomplex,'issued',$value->bat_id); echo $a; ?></td>
                    <td><?php $b = info_fetch_countqtr($value->residecomplex,'In kot',$value->bat_id); echo $b; ?></td>
                    <td><?php echo $a + $b; ?></td>
                <?php } endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 
          <?php }else{ ?>  
          <h2>Total Records: <?php echo count($counts); ?></h2>
           <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Battalion</th>
                    <th>Residentail Complex </th>
                    <th>Type of Quarter</th>
                     <th>Location</th>
                      <th>Floor </th>
                      <th>Accommodation type</th>
                       <th>Quarter No.</th>
                        <th>Elecricity Meter No.</th>
                         <th>Condition</th>
                         <th>Taken Over date</th>
                          <th>Name of Alloment</th>
                           <th>Rank</th>
                            <th>Regtl.No.</th>
                             <th>Contact No.</th>
                             <th>Battalion/Unit of Allotee</th>
                              <th> Place of Posting</th>
                              <th>Allotment order </th>
                               <th>Allotment Date</th>
                                <th>Occupied Date </th>
                                
                      

                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php $batname = fetchoneinfo('users',array('users_id' =>$value->bat_id)); if($batname !='' ){ echo $batname->nick; }?></td> 
                    <td><?php echo $value->residecomplex; ?></td>
                    <td><?php echo $value->typeofqtr; ?></td><!-- 
                    <td><?php //echo $value->res; ?></td> -->
                    <td><?php echo $value->location; ?></td>
                    <td><?php echo $value->flor; ?></td>
                    <td><?php echo $value->accomdationtype; ?></td>
                    <td><?php echo $value->qtrno; ?></td>
                    <td><?php echo $value->electronicmeter; ?></td>
                    <td><?php echo $value->condit; ?></td>
                    <td><?php echo $value->todate; ?></td>
                    <td><?php echo $value->nameofallote; ?><?php echo $value->qother; ?></td>
                    <td><?php echo $value->rank; ?></td>
                    <td><?php echo $value->regltno; ?></td>
                    <td><?php echo $value->contactno; ?></td>
                    <td><?php echo $value->balot; ?></td>
                    <td><?php echo $value->placeofposting; ?></td>
                    <td><?php echo $value->allotmentorder; ?></td> 
                    <td><?php echo $value->allotmentdate; ?></td>
                     <td><?php echo $value->occudate; ?></td>

                     
                <?php endforeach; } ?>
              </tbody>
           </table>
           <p><?php echo $links; ?></p>
          </div><!-- table-responsive --> 

          <?php } ?>
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