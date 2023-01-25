<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Monthly Repairs</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
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
      <h3>&nbsp; &nbsp; Monthly Repairs</h3>
    </div>

    <div class="contentpanel">
      <div class="row">
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

              <div class="form-group">
                  <label class="col-sm-3 control-label">Registration Number</label>
                  <div class="col-sm-9">
                        <?php  
                            $rnum = array();
                            $rnum[''] = '--Select--';
                                             foreach ($vichel as $value) {
                                               $rnum[$value->mt_id] = $value->regnom;
                                             }
                            /*newarea Textfield*/
                             echo form_dropdown('rnum', $rnum, set_value('rnum',''),'id="rnum" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             echo form_error('rnum');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Current Month</label>
                  <div class="col-sm-9">
                        <?php  
                            $rnum = array('' => '--Select--','Jan' => 'Jan','Feb' => 'Feb','March' => 'March','April' => 'April','May' => 'May','June' => 'June','July' => 'July','Aug' => 'Aug','Sep' => 'Sep','Oct' => 'Oct','Nov' => 'Nov','Dec' => 'Dec');
                                            
                            /*newarea Textfield*/
                             echo form_dropdown('cm', $rnum, set_value('cm',''),'id="cm" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             echo form_error('cm');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Repair details </label>
                  <div class="col-sm-9">
                    <?php
                    $Chasis = array('type' => 'text','name' => 'rdet','id' => 'Chasis','class' => 'form-control','placeholder' =>'Month POL','value' => '');
                    echo form_input($Chasis);
                    echo form_error('mpolo');
                    ?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 control-label"> Repair Ammount </label>
                  <div class="col-sm-9">
<?php
$Chasis = array('type' => 'text','name' => 'ramo','id' => 'Chasis','class' => 'form-control');
echo form_input($Chasis);
echo form_error('mpol');
?>
                    <label for="Chasis" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Repairing Unit</label>
                  <div class="col-sm-9">
                        <?php  
                            $rnum = array('' => '--Select--','PAP Central Workshop' => 'PAP Central Workshop','Private Firm' => 'Private Firm');
                                            
                            /*newarea Textfield*/
                             echo form_dropdown('runit', $rnum, set_value('runit',''),'id="repunit" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             echo form_error('runit');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>
                </div>




                   <div class="form-group" id="firm1" style="display: none;">
                  <label class="col-sm-3 control-label">Name of Firm</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'nof','id' => 'nof','class' => 'form-control','placeholder' =>'Name of Firm','value' => '');
echo form_input($rn);
echo form_error('repairo');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                   <div class="form-group" id="firm2" style="display: none;">
                  <label class="col-sm-3 control-label">Contact No</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'contno','id' => 'rn','class' => 'form-control','placeholder' =>'Repair.','value' => '');
echo form_input($rn);
echo form_error('repairo');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="firm3" style="display: none;">
                  <label class="col-sm-3 control-label">Treasury Token No.</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'ttn','id' => 'rn','class' => 'form-control','placeholder' =>'Repair.','value' => '');
echo form_input($rn);
echo form_error('repairo');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Date of repair</label>
                  <div class="col-sm-9">
<?php
$rn = array('type' => 'text','name' => 'dor','id' => 'lid','class' => 'form-control','placeholder' =>'Date of repair','value' => '');
echo form_input($rn);
echo form_error('repairo');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>

 </div> 

              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
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
<script src="<?php echo base_url();?>webroot/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),
  jQuery('#lid').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#dot').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#adate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#conditiondate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rcdt').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
  
    $(document).ready(function() {

    $("#bdn").change(function(){
    var bdn = $("#bdn").val();
    var dataStrings = 'bdn='+ bdn;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-holder-name",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#hn").html(html);
    }  
      
    });

    });
     });
        $(document).on('change', '#vc', function() {
  if(this.value == 'On Road'){
     $('#onroad').show();
     $('#offroad').hide();
     $('#conauth').hide();
     $('#condate').hide();
     $('#aonauth').hide();
     $('#aondate').hide();
   }else if(this.value == 'Off Road'){
     $('#offroad').show();
     $('#onroad').hide();
   }
 });

           $(document).on('change', '#suw', function() {
  if(this.value == 'condemn'){
     $('#conauth').show();
     $('#condate').show();
      $('#aonauth').hide();
     $('#aondate').hide();
   }else{
     $('#conauth').hide();
     $('#condate').hide();

   }
 });

           $(document).on('change', '#suw', function() {
  if(this.value == 'Auction'){
     $('#aonauth').show();
     $('#aondate').show();
      $('#conauth').hide();
     $('#condate').hide();
   }else{
     $('#aonauth').hide();
     $('#aondate').hide();
   }
 });

             $(document).on('change', '#ito', function() {
  if(this.value == 'Other'){
     $('#rnOthers11').show();
      $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
   }else if(this.value == 'District'){
     $('#dislist').show();
     $('#drvno').show();
     $('#drdate').show();
   }
   else{
    $('#rnOthers11').hide();
    $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
   }
});

     $(document).on('change', '#repunit', function() {
      if(this.value == 'Private Firm'){
         $('#firm1').show();
         $('#firm2').show();
         $('#firm3').show();
       }else{
         $('#firm1').hide();
         $('#firm2').hide();
         $('#firm3').hide();
       }
 });

});
</script>
</body>
</html>


