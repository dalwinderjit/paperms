<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Bill Detail</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
  </head>
<body>
<!-- Preloader -->
<!--div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div-->

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3>&nbsp;&nbsp;&nbsp;Add Account Detail</h3>
      <!--div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>ca-dashboard">Dashboard</a></li>
          <li class="active">Accounts</li>
          <li class="active">Detail</li>
        </ol>
      </div-->
    </div>
	<?php echo validation_errors();
	$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');?>
    <div class="contentpanel">
      <div class="row">
                <div class="col-md-12"> 
                <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>       
      <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
</div>
      <?php  endif; ?>
<?php 
 /*Form Validation set*/
//$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    => 'off', 
      );
 echo form_open_multipart("", $attributes);
?>
          <div class="panel panel-default">
              <div class="panel-heading">
                <!--div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div-->
                <h4 class="panel-title">Add Detail</h4>
              </div>
              <div class="panel-body">
				<div class="form-group">
                  <label class="col-sm-3 control-label">Select SOE's</label>
                  <div class="col-sm-9">
                 <?php 
/*newarea Text field*/
 echo form_dropdown('soe', $soes, set_value('bodyno',1),'id="bodyno" data-placeholder="SOE TYPE" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('soe');
/*----End newarea Textfield----*/
 ?>
                  </div>
                </div>  
                <!-- form-group -->
				<div class="form-group">
                  <label class="col-sm-3 control-label">Amount Alloted</label>
                  <div class="col-sm-9">
<?php 
$alloted_amount = array('type' => 'number','name' => 'alloted_amount','id' => 'alloted_amount','class' => 'form-control','placeholder' =>'Enter Amount Alloted'/*,'required' => 'required'*/,'value' => (null!=$this->input->post('alloted_amount'))?$this->input->post('alloted_amount'):'');
echo form_input($alloted_amount);
echo form_error('alloted_amount');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Expenditure Amount</label>
                  <div class="col-sm-9">
<?php 
$expenditure_amount = array('type' => 'number','name' => 'expenditure_amount','id' => 'expenditure_amount','class' => 'form-control','placeholder' =>'Enter Expenditure Amount'/*,'required' => 'required'*/,'value' => (null!=$this->input->post('expenditure_amount'))?$this->input->post('expenditure_amount'):'');
echo form_input($expenditure_amount);
echo form_error('expenditure_amount');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Bill Submitted in Treasury</label>
                  <div class="col-sm-9">
<?php 
$bill_submitted_in_treasury = array('type' => 'number','name' => 'bill_submitted_in_treasury','id' => 'bill_submitted_in_treasury','class' => 'form-control','placeholder' =>'Enter Bill submitted in treasury'/*,'required' => 'required'*/,'value' => (null!=$this->input->post('bill_submitted_in_treasury'))?$this->input->post('bill_submitted_in_treasury'):'');
echo form_input($bill_submitted_in_treasury);
echo form_error('bill_submitted_in_treasury');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>
	
				
				 
				<div class="form-group">
                  <label class="col-sm-3 control-label">Bill submitted in Treaqsury after total pending liabilities</label>
                  <div class="col-sm-9">
<?php 
$bill_submitted_in_treasury_after_pending_liabilities = array('type' => 'number','name' => 'bill_submitted_in_treasury_after_pending_liabilities','id' => 'bill_submitted_in_treasury_after_pending_liabilities','class' => 'form-control','placeholder' =>'Enter Bill submitted in treasury after total pending Liabilities'/*,'required' => 'required'*/,'value' => (null!=$this->input->post('bill_submitted_in_treasury_after_pending_liabilities'))?$this->input->post('bill_submitted_in_treasury_after_pending_liabilities'):'');
echo form_input($bill_submitted_in_treasury_after_pending_liabilities);
echo form_error('bill_submitted_in_treasury_after_pending_liabilities');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Date</label>
                  <div class="col-sm-9">
<?php 
$date = array('type' => 'text','name' => 'date','id' => 'date','class' => 'form-control','placeholder' =>'Enter Date'/*,'required' => 'required'*/,'value' => (null!=$this->input->post('date'))?$this->input->post('date'):'');
echo form_input($date);
echo form_error('date');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Remarks (Font : Anmol)</label>
                  <div class="col-sm-9">
<?php 
$data = array(
        'name'        => 'remarks',
        'id'          => 'remarks',
        //'value'       => 'lskdfj',
        'value'       => (null!=$this->input->post('remarks'))?$this->input->post('remarks'):'it~pxI',
        'rows'        => '10',
        'cols'        => '30',
        'style'       => 'width:50%',
        'class'       => 'form-control punjabi',
		//'required'	  => 'required'
    );
echo form_textarea($data);
echo form_error('remarks');
?>
                    <label for="year" class="error"></label>
                  </div>
                </div>
              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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
  jQuery(".select2").select2({width:"100%",minimumResultsForSearch:-1}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }),
    jQuery('#date').datepicker({dateFormat: "dd/mm/yy",maxDate:0});
  jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
});
</script>
</body>
</html>