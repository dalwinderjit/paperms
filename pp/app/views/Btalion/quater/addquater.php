<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Quarter Info</title>
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
      <h3>&nbsp; &nbsp; Add Quarter Info</h3>
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
                  <label class="col-sm-3 control-label">Residential Complex</label>
                  <div class="col-sm-9">
                 <?php  
$rc = array('' => '--Select--', 'PAP Complex Jalandhar' => 'PAP Complex Jalandhar','CDO Complex Mohali' => 'CDO Complex Mohali', 'CDO Complex BHG Patiala' => 'CDO Complex BHG Patiala', 'IRB Complex Patiala' => 'IRB Complex Patiala','IRB Complex Ladda Kothi Sangrur' => 'IRB Complex Ladda Kothi Sangrur', 'IRB Complex Kapurthala' => 'IRB Complex Kapurthala');
/*newarea Textfield*/
 echo form_dropdown('rc', $rc, set_value('rc',1),'id="rc" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('rc');
/*----End newarea Textfield----*/
 ?>
                    <label for="rc" class="error"></label>
                  </div>
                </div> 

    <div class="form-group">
                  <label class="col-sm-3 control-label">Location</label>
                  <div class="col-sm-9">
                 <?php  
$loc = array('' => '--Select--', 'Near Gate 1' => 'Near Gate 1','Near Gate 2' => 'Near Gate 2','Near Gate 3' => 'Near Gate 3','Near Gate 4' => 'Near Gate 4','Near Gate 5' => 'Near Gate 5','Others' => 'Others');
/*newarea Textfield*/
 echo form_dropdown('loc', $loc, set_value('loc',1),'id="loc" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('loc');
/*----End newarea Textfield----*/
 ?>
                    <label for="loc" class="error"></label>
                  </div>
                </div> 

     <div class="form-group" id="loc2" style="display:none;">
                  <label class="col-sm-3 control-label">Others</label>
                  <div class="col-sm-9">
<?php
$locothers = array('type' => 'text','name' => 'locothers','id' => 'locothers','class' => 'form-control','placeholder' =>'Others','required' => 'required','value' => set_value('locothers'));
echo form_input($locothers);
echo form_error('locothers');
?>
                    <label for="locothers" class="error"></label>
                  </div>
                </div>
                
                     <div class="form-group">
                  <label class="col-sm-3 control-label">Holding</label>
                  <div class="col-sm-9">
                 <?php  
$rm = array('' => '--Select--', 'Permanent' =>'Permanent', 'Temporary' => 'Temporary');
/*newarea Textfield*/
 echo form_dropdown('rm', $rm, set_value('rm',1),'id="rm" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('rm');
/*----End newarea Textfield----*/
 ?>
                    <label for="rm" class="error"></label>
                  </div>
                </div> 
                      <div class="form-group">
                  <label class="col-sm-3 control-label">Responsibility quota officer</label>
                  <div class="col-sm-9">
                 <?php  
$ro = array('' => '--Select--', 'DGP' => 'DGP','IGP' => 'IGP','IGP/IRB' => 'IGP/IRB', 'IGP/CDO' => 'IGP/CDO','RTC-PAP' => 'RTC-PAP','ADGP-Armed Bns' => 'ADGP-Armed Dns', 'CSO' => 'CSO',  'Comdt 7th Bn' => 'Comdt 7-PAP','Comdt 27-PAP' => 'Comdt 27-PAP','Comdt 36-PAP' => 'Comdt 36-PAP','Comdt 75-PAP' => 'Comdt 75-PAP','Comdt 80-PAP' => 'Comdt 80-PAP', 'Comdt  RTC' => 'Comdt  RTC', 'Comdt  ISTC KPT' => 'Comdt  ISTC KPT','Comdt 1-CDO' => 'Comdt 1-CDO', 'Comdt 2-CDO' => 'Comdt 2-CDO', 'Comdt 3-CDO' => 'Comdt 3-CDO', 'Comdt 4-CDO' => 'Comdt 4-CDO','Comdt 5-CDO' => 'Comdt 5-CDO', 'Comdt CTC' => 'Comdt CTC',  'Comdt 1-IRB' => 'Comdt 1-IRB','Comdt 2-IRB' => 'Comdt 2-IRB', 'Comdt 3-IRB' => 'Comdt 3-IRB', 'Comdt 3-IRB' => 'Comdt 3-IRB', 'Comdt 4-IRB' => 'Comdt 4-IRB', 'Comdt 5-IRB'  => 'Comdt 5-IRB','Comdt 6-IRB' => 'Comdt 6-IRB', 'Comdt 7-IRB' => 'Comdt 7-IRB', 'Other' => 'Other');
/*newarea Textfield*/
 echo form_dropdown('ro', $ro, set_value('ro',1),'id="ro" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('ro');
/*----End newarea Textfield----*/
 ?>
                    <label for="ro" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group" id="rnOthers11" style="display:none;">
                  <label class="col-sm-3 control-label">Others</label>
                  <div class="col-sm-9">
<?php
$rno = array('type' => 'text','name' => 'rno','id' => 'rnOthers','class' => 'form-control','placeholder' =>'Others','required' => 'required','value' => set_value('rno'));
echo form_input($rno);
echo form_error('rno');
?>
                    <label for="rn" class="error"></label>
                  </div>
                </div>



                 <div class="form-group">
                  <label class="col-sm-3 control-label">Condition</label>
                  <div class="col-sm-9">
                      <?php  
$Condition = array('' => '--Select--', 'New' => 'New','Good' => 'Good','Bad' => 'Bad');
/*newarea Textfield*/
 echo form_dropdown('Condition', $Condition, set_value('Condition',1),'id="Condition" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('Condition');
/*----End newarea Textfield----*/
 ?>    <label for="Condition" class="error"></label>
                  </div>
                </div> 

                     <div class="form-group">
                  <label class="col-sm-3 control-label">Type of Quarter</label>
                  <div class="col-sm-9">
                 <?php  
$tq = array('' => '--Select--', 'GOs' => 'GOs','NGOs' => 'NGOs','ORs' => 'ORs','C-IV' => 'C-IV');
/*newarea Textfield*/
 echo form_dropdown('tq', $tq, set_value('tq',1),'id="tq" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('tq');
/*----End newarea Textfield----*/
 ?>
                    <label for="tq" class="error"></label>
                  </div>
                </div> 


                    <div class="form-group">
                  <label class="col-sm-3 control-label">Floor</label>
                  <div class="col-sm-9">
                 <?php  
$floor = array('' => '--Select--', 'Ground floor' => 'Ground floor','1st floor' => '1st floor','2nd floor' => '2nd floor','3rd floor' => '3rd floor','4th floor' => '4th floor');
/*newarea Textfield*/
 echo form_dropdown('floor', $floor, set_value('floor',1),'id="floor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('floor');
/*----End newarea Textfield----*/
 ?>
                    <label for="floor" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Accommodation Type</label>
                  <div class="col-sm-9">
                      <?php  
$acct = array('' => '--Select--', 'Family residential' => 'Family residential','Girls hostel' => 'Girls hostel','Boys hostel' => 'Boys hostel','NGO mess' => 'NGO mess','Guest house' => 'Guest house','Trainees Hostel' => 'Trainees Hostel','Office' => 'Office');
/*newarea Textfield*/
 echo form_dropdown('acct', $acct, set_value('acct',1),'id="acct" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('acct');
/*----End newarea Textfield----*/
 ?>    <label for="acct" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Accommodation Size</label>
                  <div class="col-sm-9">
                      <?php  
$accts = array('' => '--Select--', 'One bedroom' => 'One bedroom','Two bedroom' => 'Two bedroom','Three bedroom' => 'Three bedroom', 'Four bedroom' => 'Four bedroom');
/*newarea Textfield*/
 echo form_dropdown('accts', $accts, set_value('accts',1),'id="accts" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('accts');
/*----End newarea Textfield----*/
 ?>    <label for="accts" class="error"></label>
                  </div>
                </div> 

                    <div class="form-group">
                  <label class="col-sm-3 control-label">Quarter No</label>
                  <div class="col-sm-9">
                 <?php
$qno = array('type' => 'text','name' => 'qno','id' => 'qno','class' => 'form-control','placeholder' =>'Quarter No','required' => 'required','value' => set_value('qno'));
echo form_input($qno);
echo form_error('qno');
?>     <label for="qno" class="error"></label>
                  </div>
                </div> 


     <div class="form-group">
                  <label class="col-sm-3 control-label">Electricity Meter No. </label>
                  <div class="col-sm-9">
                 <?php
$eono = array('type' => 'text','name' => 'eono','id' => 'eono','class' => 'form-control','placeholder' =>'Electricity Meter No.','required' => 'required','value' => set_value('eono'));
echo form_input($eono);
echo form_error('eono');
?>     <label for="eono" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Build By</label>
                  <div class="col-sm-9">
                      <?php  
$bb = array('' => '--Select--', 'PPHC' => 'PPHC','PWD' => 'PWD','Punjab Mandi Board' => 'Punjab Mandi Board');
/*newarea Textfield*/
 echo form_dropdown('bb', $bb, set_value('bb',1),'id="bb" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('bb');
/*----End newarea Textfield----*/
 ?>    <label for="bb" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Order No. </label>
                  <div class="col-sm-9">
                 <?php
$ono = array('type' => 'text','name' => 'ono','id' => 'ono','class' => 'form-control','placeholder' =>'Order No','value' => set_value('ono'));
echo form_input($ono);
echo form_error('ono');
?>     <label for="ono" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Order Date </label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$od = array('type' => 'text','name' => 'od','id' => 'od','class' => 'form-control','placeholder' =>'Order Date','value' => set_value('od'));
echo form_input($od);
echo form_error('od');
?> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>    <label for="od" class="error"></label>
                  </div>
                </div> 


                <div class="form-group">
                  <label class="col-sm-3 control-label">Taken over date </label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$todp = array('type' => 'text','name' => 'todp','id' => 'todp','class' => 'form-control','placeholder' =>'Taken over date','value' => set_value('todp'));
echo form_input($todp);
echo form_error('todp');
?>   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>   <label for="todp" class="error"></label>
                  </div>
                </div> 

                 

              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
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
  }), jQuery('#todp').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#od').datepicker({dateFormat: "dd/mm/yy"});

    $(document).on('change', '#loc', function() {
  if(this.value == 'Others'){
     $('#loc2').show();
   }else{
    $('#loc2').hide();
   }
});

     $(document).on('change', '#ro', function() {
  if(this.value == 'Other'){
     $('#rnOthers11').show();
   }else{
    $('#rnOthers11').hide();
   }
});
});
</script>
</body>
</html>