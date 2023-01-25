<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Evacuation Quarter</title>
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
      <h3> &nbsp;  &nbsp; Evacuation Quarter</h3>
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
                  <label class="col-sm-3 control-label">Quarter No:</label>
                  <div class="col-sm-9">
                 <?php  
$hn = array();
$hn[''] = '--Select--';
                 foreach ($qu as $value) {
                  $hn[$value->quart_id] = 'Quarter No: '. $value->qtrno. '&nbsp; Floor: '. $value->flor. '&nbsp; Accommodation type:'. $value->accomdationtype. '&nbsp; Location: '. $value->location;
                 }
/*newarea Textfield*/
 echo form_dropdown('qn', $hn, set_value('qn',''),'id="qn" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('hn');
/*----End newarea Textfield----*/
 ?>
                    <label for="hn" class="error"></label><p id="link"></p>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Condition</label>
                  <div class="col-sm-9">
                      <?php  
$Condition = array('' => '--Select--', 'Good' => 'Good','Normal' => 'Normal','Bad ' => 'Bad','Unlivable' => 'Unlivable');
/*newarea Textfield*/
 echo form_dropdown('Condition', $Condition, set_value('Condition',1),'id="floor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('Condition');
/*----End newarea Textfield----*/
 ?>    <label for="Condition" class="error"></label>
                  </div>
                </div> 

     <div class="form-group">
                  <label class="col-sm-3 control-label">Cancellation Order No. </label>
                  <div class="col-sm-9">
                 <?php
$ono = array('type' => 'text','name' => 'ono','id' => 'ono','class' => 'form-control','placeholder' =>'Order No','required' => 'required','value' => set_value('ono'));
echo form_input($ono);
echo form_error('ono');
?>     <label for="ono" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Cancellation Order Date </label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$od = array('type' => 'text','name' => 'od','id' => 'od','class' => 'form-control','placeholder' =>'Cancellation Order Date','required' => 'required','value' => set_value('od'));
echo form_input($od);
echo form_error('od');
?> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>    <label for="od" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Evacuated Date </label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$evd = array('type' => 'text','name' => 'evd','id' => 'evd','class' => 'form-control','placeholder' =>'Evacuated Date','required' => 'required','value' => set_value('evd'));
echo form_input($evd);
echo form_error('evd');
?> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>    <label for="evd" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Electricity Bill</label>
                  <div class="col-sm-9">
                      <?php  
$eb = array('Paid' => 'Paid','Pending' => 'Pending');
/*newarea Textfield*/
 echo form_dropdown('eb', $eb, set_value('eb',1),'id="eb" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('eb');
/*----End newarea Textfield----*/
 ?>    <label for="eb" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Water Bill</label>
                  <div class="col-sm-9">
                      <?php  
$wb = array('Paid' => 'Paid','Pending' => 'Pending');
/*newarea Textfield*/
 echo form_dropdown('wb', $wb, set_value('wb',1),'id="wb" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('wb');
/*----End newarea Textfield----*/
 ?>    <label for="wb" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Sewerage Bill</label>
                  <div class="col-sm-9">
                      <?php  
$sb = array('Paid' => 'Paid','Pending' => 'Pending');
/*newarea Textfield*/
 echo form_dropdown('sb', $sb, set_value('sb',1),'id="sb" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('sb');
/*----End newarea Textfield----*/
 ?>    <label for="sb" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Garbage Bill</label>
                  <div class="col-sm-9">
                      <?php  
$gb = array('Paid' => 'Paid','Pending' => 'Pending');
/*newarea Textfield*/
 echo form_dropdown('gb', $gb, set_value('gb',1),'id="gb" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('gb');
/*----End newarea Textfield----*/
 ?>    <label for="gb" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Condition of electricity</label>
                  <div class="col-sm-9">
                      <?php  
$coe = array('satisfied' => 'satisfied','Damage' => 'Damage');
/*newarea Textfield*/
 echo form_dropdown('coe', $coe, set_value('coe',1),'id="coe" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('coe');
/*----End newarea Textfield----*/
 ?>    <label for="coe" class="error"></label>
                  </div>
                </div> 


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Condition of Sanitary</label>
                  <div class="col-sm-9">
                      <?php  
$cos = array('satisfied' => 'satisfied','Damage' => 'Damage');
/*newarea Textfield*/
 echo form_dropdown('cos', $cos, set_value('cos',1),'id="cos" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('cos');
/*----End newarea Textfield----*/
 ?>    <label for="cos" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Condition of doors</label>
                  <div class="col-sm-9">
                      <?php  
$cod = array('satisfied' => 'satisfied','Damage' => 'Damage');
/*newarea Textfield*/
 echo form_dropdown('cod', $cod, set_value('cod',1),'id="cod" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('cod');
/*----End newarea Textfield----*/
 ?>    <label for="cod" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Condition of Windows</label>
                  <div class="col-sm-9">
                      <?php  
$cow = array('satisfied' => 'satisfied','Damage' => 'Damage');
/*newarea Textfield*/
 echo form_dropdown('cow', $cow, set_value('cow',1),'id="cow" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('cow');
/*----End newarea Textfield----*/
 ?>    <label for="cow" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Condition of Roof</label>
                  <div class="col-sm-9">
                      <?php  
$cor = array('satisfied' => 'satisfied','Damage' => 'Damage');
/*newarea Textfield*/
 echo form_dropdown('cor', $cor, set_value('cor',1),'id="cor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('cor');
/*----End newarea Textfield----*/
 ?>    <label for="cor" class="error"></label>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-3 control-label">Condition of Water Connection</label>
                  <div class="col-sm-9">
                      <?php  
$cowc = array('satisfied' => 'satisfied','Damage' => 'Damage');
/*newarea Textfield*/
 echo form_dropdown('cowc', $cowc, set_value('cowc',1),'id="cowc" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('cowc');
/*----End newarea Textfield----*/
 ?>    <label for="cowc" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Evacuated</label>
                  <div class="col-sm-9">
                      <?php  
$eva = array('Yes' => 'Yes','No' => 'No');
/*newarea Textfield*/
 echo form_dropdown('eva', $eva, set_value('eva',1),'id="eva" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('eva');
/*----End newarea Textfield----*/
 ?>    <label for="eva" class="error"></label>
                  </div>
                </div> 


       <div class="form-group">
                  <label class="col-sm-3 control-label">Remarks</label>
                  <div class="col-sm-9">
<?php
$remark = array('type' => 'text','name' => 'remark','id' => 'remark','class' => 'form-control','placeholder' =>'Remarks','value' => set_value('remark'));
echo form_input($remark);
echo form_error('remark');
?>
                    <label for="remark" class="error"></label>
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
  }), jQuery('#evd').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#od').datepicker({dateFormat: "dd/mm/yy"});
});
</script>
</body>
</html>