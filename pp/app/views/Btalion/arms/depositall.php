<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Deposit weapon/Ammunition list</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <style type="text/css">
     .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
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
      <h3> &nbsp;  &nbsp; Deposit weapon/Ammunition</h3>
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

      <h4><strong>Bore:</strong> <?php  $wp = fetchoneinfo('issue_arm',array('issue_arm_id' => $this->uri->segment('2')));  $a = explode(',',$wp->abore); if (array_key_exists('1', $a)) {echo $a[1]; } 
        $b = explode(',',$wp->ammubore); if (array_key_exists('1', $b)) {echo $b[1]; } ?> <strong>Weapon:</strong> <?php  $a = explode(',',$wp->abore); if (array_key_exists('2', $a)) { echo $a[2]; } 
        $b = explode(',',$wp->ammubore); if (array_key_exists('2', $b)) { echo $b[2]; } ?> <strong>Service Ammunition:</strong> <?php echo $wp->amqunt; ?>  <strong>Practice Ammunition:</strong> <?php echo $wp->ammupqty; ?>    <strong>Magzine :</strong> <?php echo $wp->mags.$wp->magp; ?> <strong>Issued To</strong> <?php  $m = fetchoneinfo('newosi',array('man_id' => $wp->issueto)); 
        if($m !=''){echo $m->name;}
          $n = fetchoneinfo('newosi',array('man_id' => $wp->pissuetoname)); 
        if($n !=''){echo $n->name;}
          ?> </h4>

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
                  <label class="col-sm-3 control-label">Deposit Type</label>
                  <div class="col-sm-9">
                 <?php  
$atype = array('' => '--Select--','Ammunition' => 'Ammunition','Weapon' => 'Weapon');
/*newarea Textfield*/
 echo form_dropdown('dtype', $atype, set_value('dtype',''),'id="dep" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('dtype');
 ?>
                    <label for="dtype" class="error"></label>
                  </div>
                </div><!-- form-group -->

                   <div class="form-group" id="am" style="display: none;">
                  <label class="col-sm-3 control-label">Ammunition Type</label>
                  <div class="col-sm-9">
                 <?php  
$atype = array('' => '--Select--','Service' => 'Service','Practice' => 'Practice');
/*newarea Textfield*/
 echo form_dropdown('atype', $atype, set_value('atype',''),'id="ammu" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('atype');
 ?>
                    <label for="atype" class="error"></label>
                  </div>
                </div><!-- form-group -->

                  <div class="form-group"  id="serv1" style="display:none;">
                  <label class="col-sm-3 control-label">Live Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$lcarts = array('type' => 'text','name' => 'lcarts','id' => 'mq','class' => 'form-control','value' => set_value('lcarts'), 'placeholder' => 'Live Cartridges');
echo form_input($lcarts);
 echo form_error('lcarts');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div>

                  <div class="form-group" id="serv2" style="display:none;">
                  <label class="col-sm-3 control-label">Miss Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$mcart = array('type' => 'text','name' => 'mcarts','id' => 'mq','class' => 'form-control','value' => set_value('mcarts'), 'placeholder' => 'Miss Cartridges');
echo form_input($mcart);
 echo form_error('mcarts');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div> 

                 <div class="form-group" id="serv3" style="display:none;">
                  <label class="col-sm-3 control-label">Empty cartridges</label>
                  <div class="col-sm-9">
     <?php  
/*newarea Textfield*/
$ecarts = array('type' => 'text','name' => 'ecarts','id' => 'mq','class' => 'form-control','value' => set_value('ecarts'), 'placeholder' => 'Empty cartridges');
echo form_input($ecarts);
 echo form_error('ecarts');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

             <div class="form-group" id="serv4" style="display:none;">
                  <label class="col-sm-3 control-label">Lost cartridges</label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$locarts = array('type' => 'text','name' => 'locarts','id' => 'mq','class' => 'form-control','value' => set_value('locarts'), 'placeholder' => 'Lost cartridges');
echo form_input($locarts);
 echo form_error('locarts');
/*----End newarea Textfield----*/
 ?>
                    <label for="mags" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->


                 <div class="form-group"  id="prac1" style="display:none;">
                  <label class="col-sm-3 control-label">Miss Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$mcartp = array('type' => 'text','name' => 'mcartp','id' => 'mq','class' => 'form-control','value' => set_value('mcartp'), 'placeholder' => 'Miss Cartridges');
echo form_input($mcartp);
 echo form_error('mcartp');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div> 

                 <div class="form-group" id="prac2" style="display:none;">
                  <label class="col-sm-3 control-label">Empty cartridges</label>
                  <div class="col-sm-9">
     <?php  
/*newarea Textfield*/
$ecratp = array('type' => 'text','name' => 'ecratp','id' => 'mq','class' => 'form-control','value' => set_value('ecratp'), 'placeholder' => 'Empty cartridges');
echo form_input($ecratp);
 echo form_error('ecratp');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

             <div class="form-group" id="prac3" style="display:none;">
                  <label class="col-sm-3 control-label">Lost cartridges</label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$locartp = array('type' => 'text','name' => 'locartp','id' => 'mq','class' => 'form-control','value' => set_value('locartp'), 'placeholder' => 'Lost cartridges');
echo form_input($locartp);
 echo form_error('locartp');
/*----End newarea Textfield----*/
 ?>
                    <label for="mags" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->

                  <div class="form-group"  id="prac6" style="display:none;">
                  <label class="col-sm-3 control-label">Live Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$lcarts = array('type' => 'text','name' => 'llcartp','id' => 'mq','class' => 'form-control','value' => set_value('lcarts'), 'placeholder' => 'Live Cartridges');
echo form_input($lcarts);
 echo form_error('lcarts');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div>


                    <div class="form-group"  id="prac400" style="display:none;">
                  <label class="col-sm-3 control-label">Ammunition Quantity</label>
                  <div class="col-sm-9">
<?php
$amqunt = array('type' => 'text','name' => 'amqunt','id' => 'qw','class' => 'form-control', 'placeholder' =>'Ammunition Quantity','value' => set_value('amqunt'));
echo form_input($amqunt);
echo form_error('amqunt');
?>
                    <label for="amqunt" class="error"></label>
                  </div>
                </div>

               
          <div class="form-group"  id="wep" style="display:none;">
                  <label class="col-sm-3 control-label">Magazine Qty</label>
                  <div class="col-sm-9">
                <?php  
                /*newarea Textfield*/
                $mq = array('type' => 'text','name' => 'magp','id' => 'mq','class' => 'form-control','value' => set_value('magp'), 'placeholder' => 'Magazine Qty');
                echo form_input($mq);
                 echo form_error('magp');
                /*----End newarea Textfield----*/
                ?>
                    <label for="magp" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <div class="form-group" id="weps" style="display:none;">
                  <label class="col-sm-3 control-label">Weapon  Condition</label>
                  <div class="col-sm-9">
                 <?php  
$cw = array('' => '--Select--', 'Serviceable' => 'Serviceable','Non-Serviceable' => 'Non-Serviceable');
/*newarea Textfield*/
 echo form_dropdown('cw', $cw, set_value('cw',''),'id="cw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('cw');
/*----End newarea Textfield----*/
 ?>
                    <label for="cw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="Serviceable" style="display:none">
                  <label class="col-sm-3 control-label">Status of Serviceable Weapon</label>
                  <div class="col-sm-9">
                 <?php  
$ssw = array('' => '--Select--','Issued' => 'Issued','In Kot' => 'In Kot','Case Property in kot' => 'Case Property in kot','Case Property in PS' =>'Case Property in PS','Lost' => 'Lost');
/*newarea Textfield*/
 echo form_dropdown('ssw', $ssw, set_value('ssw',1),'id="ssw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('ssw');
/*----End newarea Textfield----*/
 ?>
                    <label for="ssw" class="error"></label>
                  </div>
                </div> 
                  <div class="form-group" id="unServiceable" style="display:none">
                  <label class="col-sm-3 control-label">Status of Non-Serviceable Weapon</label>
                  <div class="col-sm-9">
                 <?php  
$suw = array('' => '--Select--','Minor Damage' => 'Minor Damage','Major Damage' => 'Major Damage', 'Condemn' => 'Condemn','Expired' => 'Expired');
/*newarea Textfield*/
 echo form_dropdown('suw', $suw, set_value('suw',1),'id="suw" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('suw');
/*----End newarea Textfield----*/
 ?>
                    <label for="suw" class="error"></label>
                  </div>
                </div>
                <!--*** Text field-->
                <?php if($wp->amqunt != 0 && $wp->amqunt != ''){  ?>
                <h4 id="wh" style="display: none;"><input type="checkbox" name="abc" id="clicks"> Service Ammunition &nbsp; Use this field only if you wish to deposit Service Ammunition along with Weapon </h4>
                <div class="form-group"  id="wep1" style="display:none;">
                  <label class="col-sm-3 control-label">Live Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$lcarts = array('type' => 'text','name' => 'wlcarts','id' => 'wep1a','class' => 'form-control','value' => set_value('lcarts'), 'placeholder' => 'Live Cartridges', 'disabled' => 'disabled');
echo form_input($lcarts);
 echo form_error('lcarts');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div>

                  <div class="form-group" id="wep2" style="display:none;">
                  <label class="col-sm-3 control-label">Miss Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$mcart = array('type' => 'text','name' => 'wmcarts','id' => 'wep1b','class' => 'form-control','value' => set_value('mcarts'), 'placeholder' => 'Miss Cartridges', 'disabled' => 'disabled');
echo form_input($mcart);
 echo form_error('mcarts');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div> 

                 <div class="form-group" id="wep3" style="display:none;">
                  <label class="col-sm-3 control-label">Empty cartridges</label>
                  <div class="col-sm-9">
     <?php  
/*newarea Textfield*/
$ecarts = array('type' => 'text','name' => 'wecarts','id' => 'wep1c','class' => 'form-control','value' => set_value('ecarts'), 'placeholder' => 'Empty cartridges', 'disabled' => 'disabled');
echo form_input($ecarts);
 echo form_error('ecarts');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

             <div class="form-group" id="wep4" style="display:none;">
                  <label class="col-sm-3 control-label">Lost cartridges</label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$locarts = array('type' => 'text','name' => 'wlocarts','id' => 'wep1d','class' => 'form-control','value' => set_value('locarts'), 'placeholder' => 'Lost cartridges', 'disabled' => 'disabled');
echo form_input($locarts);
 echo form_error('locarts');
/*----End newarea Textfield----*/
 ?>
                    <label for="mags" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->

          <div class="form-group"  id="wep5" style="display:none;">
                  <label class="col-sm-3 control-label">Ammunition Quantity</label>
                  <div class="col-sm-9">
<?php
$amqunt = array('type' => 'text','name' => 'wamqunt','id' => 'wep1e','class' => 'form-control', 'required' => 'required', 'placeholder' =>'Ammunition Quantity','value' => set_value('amqunt'), 'disabled' => 'disabled');
echo form_input($amqunt);
echo form_error('amqunt');
?>
                    <label for="amqunt" class="error"></label>
                  </div>
                </div> <?php } ?>

                <?php if($wp->ammupqty != 0 && $wp->ammupqty != ''){  ?>
                  <!--*** Text field-->
                <h4 id="whp" style="display: none;"><input type="checkbox" name="abcp" id="clicksp"> Practice Ammunition &nbsp; Use this field only if you wish to deposit Practice Ammunition along with Weapon </h4>
                <div class="form-group"  id="wep1p" style="display:none;">
                  <label class="col-sm-3 control-label">Live Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$lcarts = array('type' => 'text','name' => 'wlcartp','id' => 'wep1ap','class' => 'form-control','value' => set_value('lcarts'), 'placeholder' => 'Live Cartridges', 'disabled' => 'disabled');
echo form_input($lcarts);
 echo form_error('lcarts');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div>

                  <div class="form-group" id="wep2p" style="display:none;">
                  <label class="col-sm-3 control-label">Miss Cartridges</label>
                  <div class="col-sm-9">
                       <?php  
/*newarea Textfield*/
$mcart = array('type' => 'text','name' => 'wmcartp','id' => 'wep1bp','class' => 'form-control','value' => set_value('mcarts'), 'placeholder' => 'Miss Cartridges', 'disabled' => 'disabled');
echo form_input($mcart);
 echo form_error('mcarts');
/*----End newarea Textfield----*/
 ?>
      
                    <label for="wbodyno" class="error"></label>
                    <div id="listing"></div>
                  </div>
                </div> 

                 <div class="form-group" id="wep3p" style="display:none;">
                  <label class="col-sm-3 control-label">Empty cartridges</label>
                  <div class="col-sm-9">
     <?php  
/*newarea Textfield*/
$ecarts = array('type' => 'text','name' => 'wecartp','id' => 'wep1cp','class' => 'form-control','value' => set_value('ecarts'), 'placeholder' => 'Empty cartridges', 'disabled' => 'disabled');
echo form_input($ecarts);
 echo form_error('ecarts');
/*----End newarea Textfield----*/
 ?>
                    <label for="now" class="error"></label>
                  </div>
                </div>

             <div class="form-group" id="wep4p" style="display:none;">
                  <label class="col-sm-3 control-label">Lost cartridges</label>
                  <div class="col-sm-9">
                 <?php  
/*newarea Textfield*/
$locarts = array('type' => 'text','name' => 'wlocartp','id' => 'wep1dp','class' => 'form-control','value' => set_value('locarts'), 'placeholder' => 'Lost cartridges', 'disabled' => 'disabled');
echo form_input($locarts);
 echo form_error('locarts');
/*----End newarea Textfield----*/
 ?>
                    <label for="mags" class="error"></label>
                  </div>
                </div><!-- form-group -->
                <!--*** Text field-->

          <div class="form-group"  id="wep5p" style="display:none;">
                  <label class="col-sm-3 control-label">Ammunition Quantity</label>
                  <div class="col-sm-9">
<?php
$amqunt = array('type' => 'text','name' => 'wamquntp','id' => 'wep1ep','class' => 'form-control', 'placeholder' =>'Ammunition Quantity','value' => set_value('amqunt'), 'disabled' => 'disabled');
echo form_input($amqunt);
echo form_error('amqunt');
?>
                    <label for="amqunt" class="error"></label>
                  </div>
                </div>
          <?php } ?>                      
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
  }), // Date Picker
  jQuery('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepickeri').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#odate').datepicker({dateFormat: "dd/mm/yy"});

  $(function () {
    $("#clicks").click(function () {
        if ($("#clicks").is(':checked')) {
            $("#wep1a").prop("disabled", false);
            $("#wep1b").prop("disabled", false);
            $("#wep1c").prop("disabled", false);
            $("#wep1d").prop("disabled", false);
            $("#wep1e").prop("disabled", false);
        } else {
            $("#wep1a").prop("disabled", true);
            $("#wep1b").prop("disabled", true);
            $("#wep1c").prop("disabled", true);
            $("#wep1d").prop("disabled", true);
            $("#wep1e").prop("disabled", true);
        }
    });

    $("#clicksp").click(function () {
        if ($("#clicksp").is(':checked')) {
            $("#wep1ap").prop("disabled", false);
            $("#wep1bp").prop("disabled", false);
            $("#wep1cp").prop("disabled", false);
            $("#wep1dp").prop("disabled", false);
            $("#wep1ep").prop("disabled", false);
        } else {
            $("#wep1ap").prop("disabled", true);
            $("#wep1bp").prop("disabled", true);
            $("#wep1cp").prop("disabled", true);
            $("#wep1dp").prop("disabled", true);
            $("#wep1ep").prop("disabled", true);
        }
    });
});

$(document).on('change', '#dep', function() {
  if(this.value == 'Ammunition'){
    $('#am').show();
    $('#wep').hide();
    $('#wep1').hide();
    $('#wep2').hide();
    $('#wep3').hide();
    $('#wep4').hide();
    $('#wep5').hide();
    $('#wh').hide();
    $('#weps').hide();
    $('#whp,#wep1p,#wep2p,#wep3p,#wep4p,#wep5p').hide();
    
    }
  else if(this.value == 'Weapon'){
    $('#wep').show();
    $('#wep1').show();
    $('#wep2').show();
    $('#wep3').show();
    $('#wep4').show();
    $('#wep5').show();
    $('#wh').show();
    $('#weps').show();
    $('#whp,#wep1p,#wep2p,#wep3p,#wep4p,#wep5p').show();

    $('#am').hide();
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').hide();
    }
     
  });

 $(document).on('change', '#ammu', function() {
  if(this.value == 'Service'){
    $('#serv1').show();
    $('#serv2').show();
    $('#serv3').show();
    $('#serv4').show();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').show();
    }
  else if(this.value == 'Practice'){
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();
    
    $('#prac1').show();
    $('#prac2').show();
    $('#prac3').show();
    $('#prac4').show();
    $('#prac6').show();

  }else{
    $('#serv1').hide();
    $('#serv2').hide();
    $('#serv3').hide();
    $('#serv4').hide();

    $('#prac1').hide();
    $('#prac2').hide();
    $('#prac3').hide();
    $('#prac4').hide();
     $('#prac6').show();
  }
     
  });

   $(document).on('change', '#towep', function() {
      if(this.value == 'Nill'){
     $('#prac2').hide();
     $('#prac3').hide();
   }else{
    $('#prac2').show();
     $('#prac3').show();
   }
  
});

    $(document).on('change', '#todfi', function() {
      if(this.value == ''){
   $( "#link" ).html('');
   $( "#links" ).html('');
   }
  if(this.value == 'Commadent75 Btn'){
   $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'Ass.Commandent.75 Btn'){
     $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'D.S.P 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'Insp 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'N.G.O'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }else if(this.value == 'O.R 75 Btn'){
    $( "#links" ).html( "<a href='<?php echo base_url();?>bt-add-officer'><i class='fa fa-plus-circle'></i> Add Info</a>" );
   }
});

     $(document).on('change', '#ito', function() {
      if(this.value == 'Other'){
     $('#itoOther1').show();
   }else{
    $('#itoOther1').hide();
   }
  
});

  $(document).on('click', '#showi', function() {
   $('#serviammu1').show();
   $('#part2').hide();
});

      $(document).click('#showi2', function() {
        $('#part2').show();
        $('#serviammu1').hide();
      });

    $(document).ready(function() {

    $("#towep").change(function(){
    var bodyno = $("#towep").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-checkarm",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#towbody").html(html);
    }  
      
    });

    });
     });


    // AJAX call for autocomplete 
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "<?php echo base_url('bt-issueholder-name'); ?>",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");

    }
    });
  });
});
//To select country name
$(document).on( "click","[id^=a]",function () {
var Input = $(this).data('input');
$("#search-box").val( $('#a'+Input).text());
$("#idinfo").val(Input);
$("#suggesstion-box").hide();
});


$(document).ready(function() {

    $("#isutodsi").change(function(){
    var bodyno = $("#isutodsi").val();
    var dataStrings = 'bodyno='+ bodyno;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-issueholder-namelist",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#nameofisu").html(html);
    }  
      
    });

    });
     });


   $(document).on('change', '#cw', function() {
  if(this.value == 'Serviceable'){
     $('#Serviceable').show();
     $('#unServiceable').hide();
   }else{
     $('#unServiceable').show();
     $('#Serviceable').hide();
   }
 });
});
</script>
</body>
</html>