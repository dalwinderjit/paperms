<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>KHC Module Weapon</title>
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
      <h4> &nbsp; &nbsp; KHC Module (Weapon) <span class="pull-right"> <?php  echo 'Date:'.date('d-m-Y');?> &nbsp; &nbsp; <?php echo 'login:'. $this->session->userdata('username'); ?></span></h4>
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
		<div class="row text-center links_">
		
			<a class="btn" style="background-color:red;color:white;" href="#"><b>All Figures of KHC</b></a>&nbsp;&nbsp;
			<a class="btn" style="background-color:#9abfed;color:black;" href="#"><b>Figure View of PAP, IR, CDO BNs</b></a>&nbsp;&nbsp;
			<a class="btn" style="background-color:#9abfed;color:black;" href="#"><b>Consolidate Figure of PAP, IR & CDO BNs</b></a>
			
			</div>
		<br>
		
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
                 //$ito[''] = '--Battalion --';
                 foreach ($uname as $value) {
                  if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
                    $ito[190] = '1-IRB';
                    $ito[165] = '2-IRB';
                    $ito[154] = '3-IRB';
                    $ito[113] = '4-IRB';
                    $ito[108] = '5-IRB';
                    $ito[160] = '6-IRB';
                    $ito[120] = '7-IRB';
                  }elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
                    $ito[99] = '1-CDO';
                    $ito[172] = '2-CDO';
                    $ito[142] = '3-CDO';
                    $ito[148] = '4-CDO';
                    $ito[178] = '5-CDO';
                    $ito[196] = 'CTC BHG';
                  }else{
                    $ito[$value->users_id] = $value->nick;
                  }
                 }  
/*newarea Textfield*/
 echo form_dropdown('ito[]', $ito, set_value('ito',(isset($_GET['ito'])) ? $_GET['ito'] : ''),'id="ito" data-placeholder="Choose One" title="Please select battalion(s)" multiple class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
                         
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array();
//$tpi[''] = '--Type of Weapon--';
                 foreach ($tow as $value) {
                   $tpi[$value->arm] = $value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('tpi[]', $tpi, set_value('tpi',(isset($_GET['tpi'])) ? $_GET['tpi'] : ''),'id="tpi" data-placeholder="--Select Weapon--" title="Please select weapon(s)" multiple class="select2"'); 
 
 //echo form_dropdown('weapons2[]', $weapons2, set_value('weapons2[]',''),'id="weapons2" data-placeholder="Choose One" title="Please select Weapons" class="select2" multiple'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
<div class="col-sm-3" id="body_number"><div class="form-group">
<?php
$lsd = array('type' => 'text','name' => 'show_status','id' => 'show_status','class' => 'form-control','placeholder' =>'Body No.','value' => (isset($_GET['orderno'])) ? $_GET['orderno'] : '');
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div></div>
                  <div class="col-sm-3"><div class="form-group hidden">
<?php
$lsd = array('type' => 'text','name' => 'orderno','id' => 'ons','class' => 'form-control','placeholder' =>'Body No.','value' => (isset($_GET['orderno'])) ? $_GET['orderno'] : '');
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>

                      <div class="col-sm-3"><div class="form-group" id="status_my">
                 <?php  
$tpi = array('' => '--Status of Weapon --', 'In Kot' => 'In Kot','Issued' => 'Issued','Condemn' => 'Condemn','Case Property in kot' => 'Case Property in kot','Case Property in PS' =>'Case Property in PS','Lost' => 'Lost');
/*newarea Textfield*/
 echo form_dropdown('issued', $tpi, set_value('issued',(isset($_GET['issued'])) ? $_GET['issued'] : ''),'id="issued" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('issued');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

                  </div><br/>

                  <div class="row">

                     <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array('' => '--Report View --', '1' => 'Figure View','2' => 'Full view');
/*newarea Textfield*/
 echo form_dropdown('report', $tpi, set_value('report',(isset($_GET['report'])) ? $_GET['report'] : ''),'id="report" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" onChange="toggleFilters(this)"'); 
 echo form_error('report');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
                    <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo base_url('bt-khc'); ?>" class="btn btn-default">Reset</a>
                    <button name="download_weapon_figure_excel" class="btn btn-primary" type="submit">Download Excel</button><BR>
					<input type="checkbox" id="zeroValueRecords" name="hideZeroRecords"/>
                    <label for="zeroValueRecords">Hide Zero Value Records in download</label>
                </div>

                
				  <div class="col-sm-3"><div class="form-group">
                 
                  </div>
                </div> 

<?php echo form_close(); ?>
          </div></div>
        <div class="panel-body"> 
			<div class="row">
				<div class="col-md-12">
        <?php if($rep == 1){ ?>
           <!-- =============================================================FIGURE VIEW=====================================================================-->
          <?php 
            //var_dump($battalionWeapons);
            $columns = $data2['columns'];?>
             <div class="table-responsive">
			 <h4>Total Rows Found: <?php echo $total_rows_found; ?></h4>
              <table class="table  table-fixedheader"  id="tableFigure">
            <?php
            echo '<thead><tr><th>S.No.</th><th>Battalion</th><th>Weapon</th>';
            foreach($columns as $k=>$v){
              echo '<th>'.$v.'</th>';
            }
            echo '</tr></thead><tbody>';
            $weaponName = $data2['weaponNames'];
            $battalionObjects = $data2['battalionObjects'];
              $counti = $data2['start'];
                foreach($battalionObjects as $battalion_id=>$weaponFigure){ 
                  foreach($weaponFigure as $k=>$v){ 
                    if($k!='battalionName'){ ?>
                      <tr>
                      <td><?php echo $counti; ?></td>
                      <td><?php  echo $weaponFigure['battalionName'];
                          //echo $battalion_id;?>
                      </td>
                      <td><?php 
                      //echo $k;
                      //echo $weaponFigure[$k]['sanction']; 
                      echo $weaponName[$k]; ?>
                      </td>
                      <td><?php echo $weaponFigure[$k]['total'];?></td>
                      <td><?php echo $weaponFigure[$k]['issued'];?></td>
                      <td><?php echo $weaponFigure[$k]['in_kot'];?></td>
                      
                      <td><?php echo $weaponFigure[$k]['lost'];?></td>
                      <td><?php echo $weaponFigure[$k]['condemn'];?></td>
                      <td><?php echo $weaponFigure[$k]['empty'];?></td>
                      <td><?php echo $weaponFigure[$k]['remarks'];?></td>
                     </tr>
                   <?php
                   $counti++;
                    }
                  
                  }
                }
              
          ?></tbody></table>
		  </div>
		  </diV>
		  </div>
          <!-- =============================================================FIGURE VIEW=====================================================================-->
			<div class="">
			<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					  Total Weapons on this page: <?php echo $data2['totalWeapons']; ?><br>
					  Showing <?php echo $data2['start']; ?> to <?php echo $data2['end']; ?> of <?php echo $total_rows_found; ?> Records
				</div>
				<div class="col-md-6 text-right">
			      
			<?php echo $links; ?>
				</div>
			</div>
			</div>
			</div>
          <!-- Example split danger button -->  
          
          
  <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <?php }else{ ?>

           <!-- Example split danger button -->  
          <h3>Total Records: <?php echo count($counts); ?></h3>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Battalion</th>
                    <th>Type of Weapon </th>
                    <th>Body No.</th>
                     <th>Butt No</th>
                      <th>Received From</th>
                       <th>Received Mode </th>
                        <th>Received Voucher/ RC No.  </th>
                         <th>Received Date</th>
                         <th>No. of Magazine Received</th>
                          <th>Condition of Weapon </th>
                           <th>Status of Serviceable  Weapon </th>
                            <th>Status of Un-Serviceable weapon in Kot</th>
                             <th>If Condemn then Date of condemn</th>
                              <th>Last RA Inspection Date</th>
                              <th>Last AIA Inspection Date</th>
                 </tr>
              </thead>
              <tbody>
               
                <?php   $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php $batname = fetchoneinfo('users',array('users_id' => $value->bat_id)); if($batname !=''){echo $batname->nick;}  ?></td>
                    <td><?php echo $value->tow; ?></td>
                    <td><?php echo $value->bono; ?></td>
                    <td><?php echo $value->buno; ?></td>
                    <td><?php echo $value->recform; ?></td>
                    <td><?php echo $value->recmod; ?></td>
                    <td><?php echo $value->recvoc; ?></td>
                    <td><?php echo $value->recdate; ?></td>
                    <td><?php echo $value->magrec; ?></td>
                    <td><?php echo $value->conofwap; ?></td>
                    <td><?php echo $value->staofserv; ?></td>
                    <td><?php echo $value->unwepkot; ?></td>
                    <td><?php echo $value->condate; ?></td>
                    <td><?php echo $value->raidate; ?></td>
                    <td><?php echo $value->alaidate; ?></td>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 
          
          <?php //echo $links; ?>
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
         scrollY: 650
    } );
  

});

/*$(document).ready(function() {
var table = $('#tableFigure').DataTable( {
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
         scrollY: 500
    } );
  

});*/ 
function toggleFilters(obj){
  var val = obj.value;
  if(val==1){   //figure view
    $('#ons').hide();
    $('#status_my').hide();
	$('#body_number').hide();
  }else if(val==2){
    $('#ons').show();
	$('#body_number').show();	
    $('#status_my').show();
  }
}

$(document).ready(function (){

  var val = $('#report').val();
  if(val==1){   //figure view
    $('#ons').hide();
    $('#body_number').hide();
    $('#status_my').hide();
  }else if(val==2){
    $('#ons').show();
    $('#status_my').show();
  }
});
</script>
</body>
</html>