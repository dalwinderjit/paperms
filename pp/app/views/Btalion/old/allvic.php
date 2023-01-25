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
      <h3> &nbsp; &nbsp; MT Module <?php if($name!=''){ echo $name->nick; } ?></h3>
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


 <div class="col-sm-3"><div class="form-group">
                         <?php  
                    $ito = array();
                 $ito[''] = '--Battalion--';
                 foreach ($uname as $value) {
                  if($value->users_id == 91 || $value->users_id == 92 || $value->users_id == 93  || $value->users_id == 94  || $value->users_id == 95){
                   
                 }elseif($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
                    $ito[194] = '1-IRB';
                    $ito[170] = '2-IRB';
                    $ito[158] = '3-IRB';
                    $ito[116] = '4-IRB';
                    $ito[111] = '5-IRB';
                    $ito[169] = '6-IRB';
                    $ito[124] = '7-IRB';
                  }elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
                    $ito[208] = '1-CDO';
                    $ito[176] = '2-CDO';
                    $ito[146] = '3-CDO';
                    $ito[152] = '4-CDO';
                    $ito[182] = '5-CDO';
                    $ito[200] = 'CTC BHG';
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
$cov = array('' => '--Select--','Ambulance' => 'Ambulance', 'BUS 52 Seater' => 'BUS 52 Seater', 'Truck' => 'Truck', 'Canter/Tata 407' => 'Canter/Tata 407', 'M/Cycle (Royel Enfield)' => 'M/Cycle (Royel Enfield)', 'M/Cycle (Bajaj Pulsar)' => 'M/Cycle (Bajaj Pulsar)', 'Mini Bus' => 'Mini Bus','Toyota (Kirloskar Motor)' => 'Toyota (Kirloskar Motor)','Bolero (M & M)' => 'Bolero (M & M)', 'Xylo (M & M)' => 'Xylo (M & M)', 'Maruti Suzuki (Ertiga)' =>'Maruti Suzuki (Ertiga)', 'Scorpio (M & M)' => 'Scorpio (M & M)', 'Tata Sumo' => 'Tata Sumo','Gypsy' =>'Gypsy','Sumo Victa' => 'Sumo Victa','Jeep' => 'Jeep', 'Water Tank' => 'Water Tank','MAP Truck' => 'MAP Truck','Tractor' => 'Tractor','Ambassador Car' => 'Ambassador Car','M/Cycle (Suzuki)' => 'M/Cycle (Suzuki)','Van (Maruti Omni)' => 'Van (Maruti Omni)','Canter (Eicher)' => 'Canter (Eicher)','Bus 42 Seater' => 'Bus 42 Seater','Mahindra Invader' => 'Mahindra Invader', 'Bus 44 Seater' => 'Bus 44 Seater','Bus 45 Seater' => 'Bus 45 Seater','M/Cycle (Hero Karizma)' => 'M/Cycle (Hero Karizma)','Qualis' => 'Qualis','Tempo Trax Gama' => 'Tempo Trax Gama','Hero Honda' => 'Hero Honda','Bajaj Platina' => 'Bajaj Platina','Innova' => 'Innova');
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

               

                </div>

                 <div class="row">

                    <div class="col-sm-3"><div class="form-group">

           <?php  
$option = array('' => '--Vehicle Status--', 'On Road' => 'On Road','Off Road' => 'Off Road');
/*newarea Textfield*/
 echo form_dropdown('option', $option, set_value('option',1),'id="option" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('option'); ?>
                    <label for="option" class="error"></label>
                  </div>
                </div>
            

                  <div class="col-sm-3"> <div class="form-group">
<?php
$engine = array('type' => 'text','name' => 'engine','id' => 'engine','class' => 'form-control','placeholder' =>'Engine No.','value' => set_value('engine'));
echo form_input($engine);
echo form_error('engine');
?>
                    <label for="engine" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3"> <div class="form-group">
<?php
$Chasis = array('type' => 'text','name' => 'Chasis','id' => 'Chasis','class' => 'form-control','placeholder' =>'Chasis No.','value' => set_value('Chasis'));
echo form_input($Chasis);
echo form_error('Chasis');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$moa = array('' => '--Registration Type--', 'Temporary' =>'Temporary', 'Permanent' => 'Permanent');
/*newarea Textfield*/
 echo form_dropdown('moa', $moa, set_value('moa',1),'id="moa" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('moa');
/*----End newarea Textfield----*/
 ?>
                    <label for="fname" class="error"></label>
                  </div>
                </div> 

                 
                  
                </div>

                  <div class="row">

                  <div class="col-sm-3"> <div class="form-group">
<?php
$rcnum = array('type' => 'text','name' => 'rcnum','id' => 'rcnum','class' => 'form-control','placeholder' =>'Registration No.','value' => set_value('rcnum'));
echo form_input($rcnum);
echo form_error('rcnum');
?>
                    <label for="rcnum" class="error"></label>
                  </div>
                </div>
                  

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
                   <a href="<?php echo base_url('bt-vichele-oldall'); ?>" class="btn btn-default">Reset</a>
                </div>

                  </div>

                 </div>

<?php echo form_close(); ?>
          </div>
        <div class="panel-body"> 
        <?php  if($rep == 1){ ?>
          <!-- Example split danger button --> 
          <h2 id="counts">Total Records:<?php if($weapon!=''){
                      $nal = array(); 
                 foreach($weapon as $value){
                  /*foreach($counts as $values){ */
                    $names = fetchoneinfoallgroup('newmt',array(/*'bat_id' => $values->bat_id, */'catofvechicle' => $value->catofvechicle),'catofvechicle');

                    $nal[] = $names;
                 /* }*/

                }
                  }
                foreach ($nal as  $values) {
               foreach ($values as  $value) {
               $info[] = $value->catofvechicle;
               }}echo count($info);  ?> </h2>
          <div class="table-responsive">

            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Category of vehicle </th>
                    <th>On Road</th>
                    <th>Off Road</th>
                    <th>MT girage </th>
                    <th>Total</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){
                 foreach($weapon as $value){
                 
                  $count = $count+1;   ?>
                  
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php $a = info_fetch_countmtcounts($value->catofvechicle,'On Road',$itinfo); echo $a;?></td>
                    <td><?php $b = info_fetch_countmtcounts($value->catofvechicle,'Off Road',$itinfo); echo $b;?></td>
                    <td><?php $c = info_fetch_countmtcounts($value->catofvechicle,'condemn',$itinfo); echo $c;?></td>
                    <td><?php echo $a+ $b+$c; ?></td>
                    </tr>
                <?php } 
                } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->  
          <?php }else{ ?>
           <h3>Total Records: <?php echo count($weapon); ?></h3>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                     <th>Battalion</th>
                    <th>Category of vehicle </th>
                    <th>Veh Class</th>
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
                             <th>Status of Vehicle</th>
                              <th> Condition of Vehicle</th>
                                <th>If Condemn then Date of condemn  </th>
                                <th>Last Service Date </th>
                              <th> Last Inspection Date </th>

                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php if($value->bat_id != 0){
                       $batname = fetchoneinfo('users',array('users_id' =>$value->bat_id));
                    if($batname->nick !=''){ echo $batname->nick; }
                    }?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php echo $value->vechicleclass; ?></td>
                    <td><?php echo $value->regnom; ?></td>
                    <td><?php echo $value->chasisno; ?></td>
                    <td><?php echo $value->engineno; ?></td>
                    <td><?php echo $value->modeofac; ?></td>
                    <td><?php echo $value->recattached; ?></td>
                    <td><?php echo $value->recfrom; ?></td>
                    <td><?php echo $value->recvoucher; ?></td>
                    <td><?php echo $value->recattachdate; ?></td>
                    <td><?php echo $value->speedormeter; ?></td>
                    <td><?php echo $value->statusofvechile; ?></td>
                    <td><?php echo $value->vehiclecon; ?></td>
                    <td><?php echo $value->condemdate; ?></td>
                     <td><?php echo $value->lastservicedate; ?></td>
                    <td><?php echo $value->lastinspectiondate; ?></td>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 

          <?php } ?> 
          <?php  echo $links; ?>
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