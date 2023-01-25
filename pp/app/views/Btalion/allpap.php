<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>PAP BNs (All Modules)</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <style type="text/css">
    .cur{
      cursor:text;
    }
    table{  
    display: block; 
    width: 800px;   /* Just for the demo          */
    overflow-y: hidden;    /* Trigger vertical scroll    */
    overflow-x: auto;  /* Hide the horizontal scroll */
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
      <h3> &nbsp; &nbsp;  PAP BNs (All Modules)</h3>
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
          <div class="panel panel-default">
              <div class="panel-body">
                   <div class="form-group" id="itoset">
                   <label class="col-sm-2 control-label"><button type="button" class="btn btn-primary cur">Module</button></label>
                  <div class="col-sm-9">
                 <?php  
                 $ito = array('' => '--Select--', '31' => 'KHC-WEAPON','37' => 'KHC-AMMUNITION (Practice)', '38' => 'KHC-AMMUNITION (Service)', '32' => 'OSI','33' => 'MSK', '34' => 'MT',  '36' => 'QUARTERS','35' => 'MOUNTS'); 
                 
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',1),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>
 
            
              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-xs-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
      <?php echo form_close(); ?>
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control")
});

$(document).ready(function() {
var table = $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
  
  // for each column in header add a togglevis button in the div
  $("#table thead th").each( function ( i ) {
    var name = table.column( i ).header();
    var spanelt = document.createElement( "p" );
    spanelt.className = 'cur';
    spanelt.innerHTML = name.innerHTML;           
    
    $(spanelt).addClass("colvistoggle");
    $(spanelt).attr("colidx",i);    // store the column idx on the button
    
    $(spanelt).on( 'click', function (e) {
      e.preventDefault(); 
      // Get the column API object
      var column = table.column( $(this).attr('colidx') );
       // Toggle the visibility
      column.visible( ! column.visible() );
    });
    $("#colvis").append($(spanelt));
  });
   $(document).on('change', '#BattalionUnitito', function() {
  if(this.value == '7-PAP'){
     $('#itoset').show();
   }else{
    $('#itoset').hide();
   }

   if(this.value == '27-PAP'){
     $('#itoset2').show();
   }else{
    $('#itoset2').hide();
   }

   if(this.value == '75-PAP'){
     $('#itoset3').show();
   }else{
    $('#itoset3').hide();
   }

   if(this.value == '80-PAP'){
     $('#itoset4').show();
   }else{
    $('#itoset4').hide();
   }

   if(this.value == 'RTC-PAP'){
     $('#itoset5').show();
   }else{
    $('#itoset5').hide();
   }

   if(this.value == 'CSO-PAP'){
     $('#itoset6').show();
   }else{
    $('#itoset6').hide();
   }
});
  
} );
</script>
</body>
</html>