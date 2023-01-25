<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Material Reports</title>
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
      <h3> &nbsp; &nbsp; Material Reports</h3>
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
	  <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
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
$toi = array();
$toi[''] = '--Type of item--';
                 foreach ($items as $value) {
                   $toi[$value->item] = $value->item;
                 }
/*newarea Textfield*/
 echo form_dropdown('toi', $toi, set_value('toi',1),'id="toi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('toi');
/*----End newarea Textfield----*/
 ?>
                    <label for="toi" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3"><div class="form-group">
				  <?php  
$noi = array();
$noi[''] = '--Name of item--';
                 foreach ($items2 as $value) {
                   $noi[$value->name] = $value->name;
                 }
/*newarea Textfield*/
 echo form_dropdown('nameofitem', $noi, set_value('nameofitem',1),'id="nameitem11" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('nameofitem');
/*----End newarea Textfield----*/
 ?>
                <!--select name="nameofitem"  id="nameitem11" title="Please select at least 1 value" class="form-control">';
                 <option value=''>--Name of item--</option>
      </select--></div></div>
                 
                   
                  <div class="col-sm-3"><div class="form-group">

           <?php  
$cti = array('' => '--Category of Item--', 'Expendable' => 'Expendable','Non Expendable' => 'Non-Expendable');
/*newarea Textfield*/
 echo form_dropdown('cti', $cti, set_value('cti',1),'id="cti" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('cti'); ?>
                    <label for="cti" class="error"></label>
                  </div>
                </div>

                 <div class="col-sm-3"><div class="form-group">
                 <?php  
$Receivedfrom = array('' => '--Received from--',  'ADGP' => 'ADGP','CPO' => 'CPO','PPHC' => 'PPHC', 'others' => 'OTHERS');
/*newarea Textfield*/
 echo form_dropdown('Receivedfrom', $Receivedfrom, set_value('Receivedfrom',1),'id="Receivedfrom" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('Receivedfrom');
/*----End newarea Textfield----*/
 ?>
                    <label for="Receivedfrom" class="error"></label>
                  </div>
                </div>

                </div><br/>

                 <div class="row">
                 


                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$fname = array('' => '--Funds Type--','Govt. Fund' => 'Govt. Fund','ADGP Armed Bns. Private Fund' => 'ADGP Armed Bns. Private Fund', 'Private Bn. Hqrs.Fund' => 'Private Bn. Hqrs.Fund', 'Other Funds' => 'Other Funds');
/*newarea Textfield*/
 echo form_dropdown('fname', $fname, set_value('fname',1),'id="fname" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('fname');
/*----End newarea Textfield----*/
 ?>
                    <label for="fname" class="error"></label>
                  </div>
                </div> 

                  <div class="col-sm-3"><div class="form-group">
                  <?php  
$tpi = array('' => '--Condition Type--', 'Received' => 'Received','Purchased' => 'Purchased');
/*newarea Textfield*/
 echo form_dropdown('tpi', $tpi, set_value('tpi',1),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                    <label for="fname" class="error"></label>
                  </div>
                </div> 

      

              <div class="row">          
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
          <h3>Total Entries: <?php if($weapon!=''){echo count($weapon);}else{echo "0";} ?> <span class="pull-right">Total Quantity: <?php if($qname!=''){ foreach($qname as $val){echo $val->total;}}else{echo "0";} ?></span></h3>
          <div class="table-responsive">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Edit</th>
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
                    <td><a href="<?php echo base_url('bt-edit-material').'/'.$value->msk_id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a></td>
                   
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
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive --> 
          <?php echo $links; ?>
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
	$("#nameitem11").trigger('change');
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
		"order": [[ 2, 'asc' ]]
    } );
  

});
</script>
</body>
</html>