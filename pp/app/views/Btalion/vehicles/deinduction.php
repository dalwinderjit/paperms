<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deinduction</title>
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
      <h3>&nbsp; &nbsp; Deinduction</h3>
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
                   <label class="col-sm-3 control-label">Transfer to</label>
                  <div class="col-sm-9">
                 <?php  
                  $ito[''] = '--Select--';
                 $ito['CPO'] = 'CPO';
                 $ito['Other'] = 'Other';
                 $ito['District'] = 'District';
                 $ito['Battalion'] = 'Battalion';
/*newarea Textfield*/
 echo form_dropdown('itok', $ito, set_value('itok',''),'id="ito" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('itok');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                   <label class="col-sm-3 control-label">Do You want to remove vehicle in this month</label>
                  <div class="col-sm-9">
                 <?php  
                 $rem['Yes'] = 'Yes';
                 $rem['No'] = 'No';
/*newarea Textfield*/
 echo form_dropdown('rem', $rem, set_value('rem',''),'id="rem" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('rem');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>


                 <div class="form-group" id="bats" style="display:none;">
                   <label class="col-sm-3 control-label">Battalion</label>
                  <div class="col-sm-9">
                 <?php  
                  $ito = array();
                 $ito[''] = '--Select--';
                 foreach ($uname as $value) {
                   $ito[$value->users_id] = $value->nick;
                 } 
               
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',''),'id="itok" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="ito" class="error"></label>
                  </div>
                </div>

                 <div class="form-group" id="rnOthers11" style="display:none;">
                  <label class="col-sm-3 control-label">Others</label>
                  <div class="col-sm-9">
<?php
$rno = array('type' => 'text','name' => 'rno','id' => 'rnOthers','class' => 'form-control','placeholder' =>'Others','value' => set_value('rno'));
echo form_input($rno);
echo form_error('rno');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>
                 <div class="form-group"  id="dislist" style="display:none;">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                 <?php  
$it = array('' => '--Select--','Amritsar Commissionerate' => 'Amritsar Commissionerate','Amritsar Rural' => 'Amritsar Rural', 'Batala' => 'Batala', 'Gurdaspur' => 'Gurdaspur', 'Pathankot' => 'Pathankot','Tarn Taran' => 'Tarn Taran','Patiala' => 'Patiala','Sangrur' => 'Sangrur', 'Barnala' => 'Barnala','Rupnagar' => 'Rupnagar','S.A.S Nagar' => 'S.A.S Nagar','Fatehgarh Sahib' => 'Fatehgarh Sahib','Jalandhar Commissionerate' => 'Jalandhar Commissionerate','Jalandhar Rural' => 'Jalandhar Rural','Hoshiarpur' => 'Hoshiarpur','Kapurthala' => 'Kapurthala','Ludhiana Commissionerate' => 'Ludhiana Commissionerate','Ludhiana Rural' => 'Ludhiana Rural','Khanna' => 'Khanna','Shahid Bhagat Singh Nagar' => 'Shahid Bhagat Singh Nagar','Bathinda' => 'Bathinda','Mukatsar' => 'Mukatsar','Mansa' => 'Mansa','Ferozepur' => 'Ferozepur','Fazlika' => 'Fazlika','Moga' => 'Moga','Faridkot' => 'Faridkot','Vigilance Bureau' =>'Vigilance Bureau', 'CID' => 'CID','EXCISE' => 'EXCISE','NRI WING' => 'NRI WING');
/*newarea Textfield*/
 echo form_dropdown('district', $it, set_value('district',''),'id="district" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('district');
/*----End newarea Textfield----*/
 ?>
                    <label for="it" class="error"></label>
                  </div>
                </div> 


                      
                <div class="form-group">
                  <label class="col-sm-3 control-label">Speedometer Reading</label>
                  <div class="col-sm-9">
<?php
$sr = array('type' => 'text','name' => 'sr','id' => 'sr','class' => 'form-control','placeholder' =>'Speedometer Reading','value' => '');
echo form_input($sr);
echo form_error('sr');
?>
                    <label for="sr" class="error"></label>
                  </div>
                </div>

    <div class="form-group">
                  <label class="col-sm-3 control-label">Order No.</label>
                  <div class="col-sm-9">
<?php
$ordersno = array('type' => 'text','name' => 'ordersno','id' => 'ordersno','class' => 'form-control','placeholder' =>'Order No','value' => '');
echo form_input($ordersno);
echo form_error('ordersno');
?>
                    <label for="ordersno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Order Date</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php
$ordersdate = array('type' => 'text','name' => 'ordersdate','id' => 'lid','class' => 'form-control','placeholder' =>'Order Date','value' => '');
echo form_input($ordersdate);
echo form_error('ordersdate');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="ordersdate" class="error"></label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-3 control-label">Date of transfer</label>
                  <div class="col-sm-9">
                    <div class="input-group">
<?php
$dot = array('type' => 'text','name' => 'dot','id' => 'dot','class' => 'form-control','placeholder' =>'Date of transfer','value' => set_value('dot'));
echo form_input($dot);
echo form_error('dot');
?><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                    <label for="dot" class="error"></label>
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
     $('#bats').hide();
   }else if(this.value == 'District'){
     $('#dislist').show();
     $('#rnOthers11').hide();
     $('#rnOthers11').hide();
    /* $('#drvno').show();
     $('#drdate').show();*/
   }else if(this.value == 'Battalion'){
     $('#bats').show();
     $('#dislist').hide();
     $('#rnOthers11').hide();
     /*$('#drvno').hide();
     $('#drdate').hide();*/
   }
   else{
    $('#rnOthers11').hide();
    $('#dislist').hide();
     $('#drvno').hide();
     $('#drdate').hide();
   }
});
});
</script>
</body>
</html>