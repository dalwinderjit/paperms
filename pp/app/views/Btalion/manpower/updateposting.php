<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Security Cover</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
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
      <h3> &nbsp;  &nbsp; Add Security Cover</h3>
    </div>

    <div class="contentpanel">
      <div class="row">
           <div class="col-md-12">        
      <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>
                <div class="col-md-12">        
      <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
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

               

                <div class="form-group" id="fone6">
                  <label class="col-sm-3 control-label">PSOS/GUNMAN ETC. DIRECT FROM BNS. </label>
                  <div class="col-sm-9">
                 <?php  
$PSOSGUNMAN  = array('' => '--Select--', 'Police Officer' => ' Serving Police Officer', 'Retired Police Officer' => 'Retired Police Officer', 'Political Persons' => 'Political Persons','Civil Officers' => 'Civil Officers',  'Retired Civil Officer' => 'Retired Civil Officer','Judicial Officers' => 'Judicial Officers','Retired Judicial Officer' => 'Retired Judicial Officer','Threatening persons' => 'Threatening persons','Personal Security Staff Armed Wing Officer' => 'Personal Security Staff Armed Wing Officer');
 echo form_dropdown('fone6', $PSOSGUNMAN, set_value('fone6',''),'id="PSOSGUNMAN" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('fone6');
 ?>
                    <label for="Postingtiset" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
<?php
$name = array('type' => 'text','name' => 'name','id' => 'name','class' => 'form-control','placeholder' =>'Name','value' => set_value('name'));
echo form_input($name);
echo form_error('name');
?>
                    <label for="name" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="ranki" style="display: none;">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
            <?php  
$RankRankre = array('' => '--Select--', 'DGP' => 'DGP', 'ADGP' => 'ADGP', 'IGP' => 'IGP', 'DIG' => 'DIG', 'AIG' => 'AIG', 'SSP' => 'SSP','SP' => 'SP',  'DSP' => 'DSP','INSPR' => 'INSPR');
 echo form_dropdown('rank', $RankRankre, set_value('rank',''),'id="RankRankrei" data-placeholder="Choose One" class="select2"'); 
 echo form_error('RankRankre');
 ?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group" id="desi"  style="display: none;">
                  <label class="col-sm-3 control-label">Designation</label>
                  <div class="col-sm-9">
           <?php
$des = array('type' => 'text','name' => 'des','id' => 'des','class' => 'form-control','placeholder' =>'Designation','value' => set_value('des'));
echo form_input($des);
echo form_error('des');
?>
                    <label for="RankRankre" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Place of Posting</label>
                  <div class="col-sm-9">
<?php
$pop = array('type' => 'text','name' => 'pop','id' => 'pop','class' => 'form-control','placeholder' =>'Place of Posting','value' => set_value('pop'));
echo form_input($pop);
echo form_error('pop');
?>
                    <label for="pop" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
<?php
$address = array('type' => 'text','name' => 'address','id' => 'address','class' => 'form-control','placeholder' =>'Address','value' => set_value('address'));
echo form_input($address);
echo form_error('address');
?>
                    <label for="sno" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Mobile</label>
                  <div class="col-sm-9">
<?php
$mob = array('type' => 'text','name' => 'mob','id' => 'mob','class' => 'form-control','placeholder' =>'Mobile','value' => set_value('mob'));
echo form_input($mob);
echo form_error('mob');
?>
                    <label for="mob" class="error"></label>
                  </div>
                </div>


 <div class="form-group">
                  <label class="col-sm-3 control-label">Nature of duty</label>
                  <div class="col-sm-9">
<?php
$nod = array('' => '--Select--','Gunman' => 'Gunman','Driver' => 'Driver', 'Reader' => 'Reader', 'Guard' => 'Guard', 'PSO' => 'PSO');
 echo form_dropdown('nod', $nod, set_value('nod',''),'id="nod" data-placeholder="Choose One" class="select2"'); 
 echo form_error('nod');
?>
                    <label for="sno" class="error"></label>
                  </div>
                </div>

 <div class="form-group">
                  <label class="col-sm-3 control-label">Order By</label>
                  <div class="col-sm-9">
<?php
$oby = array('type' => 'text','name' => 'oby','id' => 'oby','class' => 'form-control','placeholder' =>'Order By','value' => set_value('oby'));
echo form_input($oby);
echo form_error('oby');
?>
                    <label for="oby" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Order No</label>
                  <div class="col-sm-9">
<?php
$ono = array('type' => 'text','name' => 'ono','id' => 'ono','class' => 'form-control','placeholder' =>'Order No','value' => set_value('ono'));
echo form_input($ono);
echo form_error('ono');
?>
                    <label for="ono" class="error"></label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php
$odate = array('type' => 'text','name' => 'odate','id' => 'odate','class' => 'form-control','placeholder' =>'Order Date','value' => set_value('odate'));
echo form_input($odate);
echo form_error('odate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="odate" class="error"></label>
                  </div>
                </div>


              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a  href="" class="btn btn-default">Reset</a>
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
      <?php echo form_close(); ?>
         </div><!-- col-md-6 -->
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
<script src="<?php echo base_url();?>webroot/plugin/fileupload/fileinput.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery('#odate').datepicker({dateFormat: "dd/mm/yy"}); 
});

    $(document).on('change', '#PSOSGUNMAN', function() {
      if(this.value == 'Police Officer'){
     $('#desi').hide();
     $('#ranki').show();
   } else if(this.value == 'Retired Police Officer'){
      $('#desi').hide();
     $('#ranki').show();
      
   }else{
     $('#desi').show();
     $('#ranki').hide();
   }
  
});

</script>

</body>
</html>