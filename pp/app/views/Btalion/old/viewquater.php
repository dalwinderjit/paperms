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
  <?php  endif; ?>
       <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>error!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
  <?php  endif; ?>
</div>
      
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
$tq = array('' => '--Type of Quarter--', 'GOs' => 'GOs','NGOs' => 'NGOs','ORs' => 'ORs','C-IV' => 'C-IV');
/*newarea Textfield*/
 echo form_dropdown('tq', $tq, set_value('tq',1),'id="tq" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('tq');
/*----End newarea Textfield----*/
 ?>               <label for="tpi" class="error"></label>
                  </div>
                </div> 

                <div class="col-sm-3"><div class="form-group">
                   <?php  
$floor = array('' => '--Floor--', 'Ground floor' => 'Ground floor','1st floor' => '1st floor','2nd floor' => '2nd floor','3rd floor' => '3rd floor','4th floor' => '4th floor');
/*newarea Textfield*/
 echo form_dropdown('floor', $floor, set_value('floor',1),'id="floor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('floor');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

            

                <div class="col-sm-3"><div class="form-group">
                             <?php  
$Condition = array('' => '--Condition--','Normal' => 'Normal', 'New' => 'New','Good' => 'Good','Bad' => 'Bad');
/*newarea Textfield*/
 echo form_dropdown('Condition', $Condition, set_value('Condition',1),'id="floor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Condition');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div>

                    <div class="col-sm-3"><div class="form-group">
                       <?php  
$accts = array('' => '--Accommodation Size--', 'One bedroom' => 'One bedroom','Two bedroom' => 'Two bedroom','Three bedroom' => 'Three bedroom', 'Four bedroom' => 'Four bedroom');
/*newarea Textfield*/
 echo form_dropdown('accts', $accts, set_value('accts',1),'id="accts" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('accts');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

                <div class="col-sm-3"><br/>
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
                </div>

                  </div><br/>

                  <div class="row">
                    
                      
                  </div>

<?php echo form_close(); ?>
          </div></div>
        <div class="panel-body"> 
         <h3>Total Records: <?php echo count($weapon); ?></h3>
          <!-- Example split danger button --> 
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Repair info</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Battalion</th>
                    <th>Residential Complex </th>
                    <th>Type of Quarter</th>
                     <th>Location</th>
                      <th>Floor </th>
                      <th>Accommodation type</th>
                      <th>Accommodation size</th>
                       <th>Quarter No.</th>
                        <th>Electricity Meter No.</th>
                         <th>Condition</th>
                         <th>Taken Over date</th>
                          <th>Name of Allottee</th>
                           <th>Rank</th>
                            <th>Regtl.No.</th>
                             <th>Contact No.</th>
                             <th> Battalion/Unit of Allotee</th>
                              <th> Place of Posting</th>
                              <th>Allotment order </th>
                               <th>Allotment Date</th>
                                <th>Occupied Date </th>
                                <th>Last repair date</th>
                                <th>repair cost till date</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td>
                                  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Repair Info 
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo base_url('bt-repairinfo'); ?>/<?php echo $value->quart_id; ?>"><i class="fa fa-edit"></i> Add Repair info</a></li>
    <li><a href="<?php echo base_url('bt-rpair-view'); ?>/<?php echo $value->quart_id; ?>">Repair Info View</a></li>
  </ul>
</div>
</td>
                    <td><a href="<?php echo base_url('bt-alotedit-quater'); ?>/<?php echo $value->quart_id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> <?php if($value->allot=='Issued'){echo "Edit";}else{echo 'Not Issued';}?></a></td>
                    <td><a href="<?php echo base_url('quaters-fullview'.'/'.$value->quart_id); ?>" class="btn btn-primary">Full View</a> </td>
                    <td><?php $batname = fetchoneinfo('users',array('users_id' =>$value->bat_id)); if($batname !='' ){ echo $batname->nick; }?></td>
                    <td><?php echo $value->residecomplex; ?></td>
                    <td><?php echo $value->typeofqtr; ?></td><!-- 
                    <td><?php //echo $value->res; ?></td> -->
                    <td><?php echo $value->location; ?></td>
                    <td><?php echo $value->flor; ?></td>
                    <td><?php echo $value->accomdationtype; ?></td>
                    <td><?php echo $value->accomdationsize; ?></td>
                    <td><?php echo $value->qtrno; ?></td>
                    <td><?php echo $value->electronicmeter; ?></td>
                    <td><?php echo $value->condit; ?></td>
                    <td><?php echo $value->todate; ?></td>
                    <td><?php echo $value->nameofallote.  $value->qother; ?></td>
                    <td><?php echo $value->rank; ?></td>
                    <td><?php echo $value->regltno; ?></td>
                    <td><?php echo $value->contactno; ?></td>
                    <td><?php echo $value->balot; ?></td>
                    <td><?php echo $value->placeofposting; ?></td>
                    <td><?php echo $value->allotmentorder; ?></td> 
                    <td><?php echo $value->allotmentdate; ?></td>
                     <td><?php echo $value->occudate; ?></td>
                     <td><?php $ldate = fetchoneinfodesc('repair_quater',array('quart_id' => $value->quart_id),'repair_quater_id'); if($ldate !=''){echo $ldate->rdate;} ?></td>
                     <td><?php $qty = fetchoneinfoqtr('repair_quater',array('quart_id' => $value->quart_id),'repair_quater_id');  if($qty !=''){echo 'Rs. '.$qty[0]->total;} ?></td>

                     
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