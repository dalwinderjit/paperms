<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Edit Arm</title>
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
     <h3> &nbsp; &nbsp;  Edit Arm</h3>
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
			'name'		 		=> 'basicForm4',
			'id'		 		=> 'basicForm4',
			'accept-charset' 	=> 'utf-8',
			'autocomplete' 		=>'off', 
			);
 echo form_open_multipart("", $attributes);
?>
          <div class="panel panel-default">
              <div class="panel-body">

               <div class="form-group">
                  <label class="col-sm-3 control-label">Type of Weapon</label>
                  <div class="col-sm-9">
                 <?php 
				 
                 $tow = array();
                  $tow[''] = 'Select Weapon Name'; 
                 foreach ($weapon as $value) {
                   $tow[$value->arm] = $value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('tow', $tow, set_value('tow',$armslist->tow),'id="tow" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('tow');
/*----End newarea Textfield----*/
 ?>
                    <label for="tow" class="error"></label>
                  </div>
                </div> 

              <div class="form-group">
                  <label class="col-sm-3 control-label"> Weapon Body No</label>
                  <div class="col-sm-9">
<?php 
$wbodyno = array('type' => 'text','name' => 'wbodyno','id' => 'wbuttno','class' => 'form-control','placeholder' =>'Weapon Body No','value' => $armslist->bono);
echo form_input($wbodyno);
echo form_error('wbodyno');
?>
                    <label for="wbuttno" class="error"></label>
                  </div>
                </div>
                <!-- form-group -->

                <div class="form-group">
                  <label class="col-sm-3 control-label"> Weapon Butt No</label>
                  <div class="col-sm-9">
<?php 
$wbuttno = array('type' => 'text','name' => 'wbuttno','id' => 'wbuttno','class' => 'form-control','placeholder' =>'Weapon Butt No','value' => $armslist->buno);
echo form_input($wbuttno);
echo form_error('wbuttno');
?>
                    <label for="wbuttno" class="error"></label>
                  </div>
                </div>
                <!-- form-group -->
                <!-- form-group --><!--*** Text field-->

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Receive From</label>
                  <div class="col-sm-9">
<?php 
$vdate = array('type' => 'text','name' => 'vdate','id' => 'RF','class' => 'form-control','placeholder' =>'Receive From','value' => $armslist->recform);
echo form_input($vdate);
echo form_error('vdate');
?>
                    <label for="vdate" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Received Mode</label>
                  <div class="col-sm-9">
                 <?php 
                 $tows = array('Temporary' => 'Temporary','Permanent' => 'Permanent');
/*newarea Textfield*/
 echo form_dropdown('tows', $tows, set_value('tows',$armslist->recmod),'id="tows" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('tows');
/*----End newarea Textfield----*/
 ?>
                    <label for="tows" class="error"></label>
                  </div>
                </div>

               
                <!-- form-group -->
                   
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$mq = array('type' => 'text','name' => 'mq','id' => 'mq','class' => 'form-control','value' => $armslist->magrec,'placeholder' => 'Magazine Qty');
echo form_input($mq);
 echo form_error('mq');
/*----End newarea Textfield----*/
 ?>
                    <label for="mq" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->

                <div class="form-group">
                  <label class="col-sm-3 control-label"> RC/Voucher No</label>
                  <div class="col-sm-9">
<?php 
$rcvno = array('type' => 'text','name' => 'rcvno','id' => 'rcvno','class' => 'form-control','placeholder' =>'RC/Voucher No','value' =>  $armslist->recvoc);
echo form_input($rcvno);
echo form_error('rcvno');
?>
                    <label for="rcvno" class="error"></label>
                  </div>
                </div>


                 <div class="form-group">
                  <label class="col-sm-3 control-label">RC/Voucher Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php 
$rdate = array('type' => 'text','name' => 'rdate','id' => 'rdate','class' => 'form-control','value' => $armslist->recdate,'placeholder' => 'Receive Date');
echo form_input($rdate);
echo form_error('rdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <label for="rdate" class="error"></label>
                  </div>
                </div>
                  </div>
<!--  -->                
<!--*** Text field-->
 <div class="form-group" id="weps">
                  <label class="col-sm-3 control-label">Weapon Type</label>
                  <div class="col-sm-9">
                 <?php  
$cw = array('' => '--Select--', 'Serviceable' => 'Serviceable','Non-Serviceable' => 'Non-Serviceable');
/*newarea Textfield*/
 echo form_dropdown('cw', $cw, set_value('cw',$armslist->conofwap),'id="cw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required onChange="toggle_status()"'); 
 echo form_error('cw');
/*----End newarea Textfield----*/
 ?>
                    <label for="cw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="Serviceable">
                  <label class="col-sm-3 control-label">Status of Serviceable Arm</label>
                  <div class="col-sm-9">
                 <?php  
$ssw = array('' => '--Select--','In Kot' => 'In Kot','Issued' => 'Issued','Case Property in kot' => 'Case Property in kot','Case Property in PS' =>'Case Property in PS','Lost' => 'Lost'/*,'Condemn In Kot' => 'Condemn In Kot'*/);
/*newarea Textfield*/
 echo form_dropdown('ssw', $ssw, set_value('ssw',$armslist->staofserv),'id="ssw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" "'); 
 echo form_error('ssw');
/*----End newarea Textfield----*/
 ?>
                    <label for="ssw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="unServiceable">
                  <label class="col-sm-3 control-label">Status of Non-Serviceable Arm</label>
                  <div class="col-sm-9">
                 <?php  
//$suw = array('' => '--Select--','Minor Damage' => 'Minor Damage','Major Damage' => 'Major Damage','Condemn' => 'Condemn','Expired' => 'Expired');
$suw = array('' => '--Select--','Condemn' => 'Condemn');
/*newarea Textfield*/
 echo form_dropdown('suw', $suw, set_value('suw',$armslist->staofserv),'id="suw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('suw');
/*----End newarea Textfield----*/
 ?>
                    <label for="suw" class="error"></label>
                  </div>
                </div>
				<?php if(false){ ?>
				 <div class="form-group">
                  <label class="col-sm-3 control-label">Issue Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php 
	$issue_date = array('type' => 'text','name' => 'issue_date','id' => 'issue_date','class' => 'form-control','value' => $armslist->issue_date);
	echo form_input($issue_date);
	echo form_error('issue_date');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <label for="rdate" class="error"></label>
                  </div>
                </div>
                  </div>
                <!--*** Text field-->
				<?php } ?>
 <div class="form-group">
                  <label class="col-sm-3 control-label">Issue Date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
<?php 
$rdate = array('type' => 'text','name' => 'doi','id' => 'doi','class' => 'form-control','value' => $armslist->owdate);
echo form_input($rdate);
echo form_error('rdate');
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <label for="rdate" class="error"></label>
                  </div>
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
  }),
  // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#rdate').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#doi').datepicker({dateFormat: "dd/mm/yy"});
  
  
});

$(document).ready(function(){
	
	var weapon_type = $('#cw').val();
	toggle_weapon_type(weapon_type);
});

function toggle_status(){
	var weapon_type = $('#cw').val();
	toggle_weapon_type(weapon_type);
	
}
function toggle_weapon_type(weapon_type){
	if(weapon_type=='Serviceable'){
		$('#unServiceable').hide();
		$('#Serviceable').show();
	}else if(weapon_type=='Non-Serviceable'){
		$('#Serviceable').hide();
		$('#unServiceable').show();
	}
}

</script>
</body>
</html>