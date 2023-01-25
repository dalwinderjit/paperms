<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Add Horse Info</title>
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
      <h2><i class="fa fa-building-o"></i>Add Horse Info</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>bt-dashboard">Dashboard</a></li>
          <li class="active">Add Horse Info</li>
        </ol>
      </div>
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
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Add Horse Info</h4>
              </div>
              <div class="panel-body">

           <div class="form-group">
                  <label class="col-sm-3 control-label">Name of Horse</label>
                  <div class="col-sm-9">
                 <?php
$hname = array('type' => 'text','name' => 'hname','id' => 'hname','class' => 'form-control','placeholder' =>'Name of Horse','required' => 'required','value' => set_value('hname'));
echo form_input($hname);
echo form_error('hname');
?>     <label for="hname" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Sex</label>
                  <div class="col-sm-9">
                  <input type="radio" name="sex" id="m" value="Geld" checked> <label for="m">  Geld</label>
                  <input type="radio" name="sex" id="f" value="Mare"> <label for="f">  Mare</label>
                  <input type="radio" name="sex" id="s" value="Stallion"> <label for="s"> Stallion
                  </label>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Hoof No</label>
                  <div class="col-sm-9">
                 <?php
                 $hnum = array();
                 for($i=1; $i<=125; $i++) {
                    $hnum[$i] = $i;
                   } 
/*
                  if(!empty($hoofs)){
                          foreach($hoofs as $value) {
                          if($value->hoof == $hnum[$value->hoof]){
                            unset($hnum[$value->hoof]);
                        }else{
                           $hnum;
                        }
                    }
                  }*/
                
                   
                 
/*newarea Textfield*/
 echo form_dropdown('hnum', $hnum, set_value('hnum',''),'id="hnum" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" required'); 
 echo form_error('hnum');
/*----End newarea Textfield----*/
?>     <label for="hnum" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Color</label>
                  <div class="col-sm-9">
                 <?php
$color = array('Bay' => 'Bay','Light Bay' => 'Light Bay','Dark Bay' => 'Dark Bay','Grey' => 'Grey','Chestnut' => 'Chestnut','Liver Brown' => 'Liver Brown','Golden Bay' => 'Golden Bay', 'Black' => 'Black', 'White' => 'White', 'Dun' => 'Dun','piebald' => 'piebald', 'skewbald' => 'skewbald', 'Grey roan' > 'Grey roan','Iron Grey' => 'Iron Grey','Light Grey' => 'Light Grey','Dark Grey' => 'Dark Grey');
 echo form_dropdown('color', $color, set_value('color',''),'id="color" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
echo form_error('color');
?>     <label for="color" class="error"></label>
                  </div>
                </div> 

                      <div class="form-group">
                  <label class="col-sm-3 control-label">Height</label>
                  <div class="col-sm-9">
<select name="Height" class="form-control" id="select">
<option value="">--Select--</option>
<option value="14H">14H</option>
<option value="15H">15H</option>
<option value="16H">16H</option>
<option value="17H">17H</option>
<option value="18H">18H</option>
</select>
                    <label for="Height" class="error"></label>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Inch</label>
                  <div class="col-sm-9">
<select name="inch" class="form-control" id="select">
<option value="">--Select--</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
</select>
                    <label for="Height" class="error"></label>
                  </div>
                </div>

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Breed</label>
                  <div class="col-sm-9">
                 <?php

$breed = array('Throughbred' => 'Throughbred','Indigenous Bred' => 'Indigenous Bred','Half Breed' => 'Half Breed', 'Other' => 'Other');
 echo form_dropdown('breed', $breed, set_value('breed',''),'id="breed" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
echo form_error('breed');
?>     <label for="breed" class="error"></label>
                  </div>
                </div> 

                <div class="form-group" id="BreedOther1" style="display:none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                 <?php
$BreedOther = array('type' => 'text','name' => 'BreedOther','id' => 'BreedOther','class' => 'form-control','placeholder' =>'Other','value' => set_value('BreedOther'));
echo form_input($BreedOther);
echo form_error('BreedOther');
?>     <label for="BreedOther" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group">
                  <label class="col-sm-3 control-label">Age at the time of purchase</label>
                  <div class="col-sm-9">
                  <div class="col-xs-4">
                  <select name="hage" class="form-control">
                    <?php for ($i=1; $i <99 ; $i++) { 
                      if($i == 1){
                        echo '<option value="'.$i.'">'.$i.' Year</option>';
                      }else{
                        echo '<option value="'.$i.'">'.$i.' Years</option>';
                      }
                      
                    } ?>

                  </select>
                    </div>
                    <div class="col-xs-5">
                   <select name="hage2" class="form-control">
                    <?php for ($i=0; $i <13 ; $i++) { 
                      if($i == 1){
                        echo '<option value="'.$i.'">'.$i.' Month</option>';
                      }else{
                        echo '<option value="'.$i.'">'.$i.' Months</option>';
                      }
                      
                    } ?>

                  </select>
                  </div>  
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Mode of Acquisition</label>
                  <div class="col-sm-9">
                 <?php  
$moa = array('' => '--Select--', 'Purchased' => 'Purchased','Transferred' => 'Transferred','Gifted' => 'Gifted');
/*newarea Textfield*/
 echo form_dropdown('moa', $moa, set_value('moa',1),'id="moa" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('moa');
/*----End newarea Textfield----*/
 ?>
                    <label for="moa" class="error"></label>
                  </div>
                </div> 

                   <div class="form-group" id='gorno'>
                  <label class="col-sm-3 control-label">OB No:</label>
                  <div class="col-sm-9">
                 <?php
$orderno = array('type' => 'text','name' => 'orderno','id' => 'orderno','class' => 'form-control','placeholder' =>'OB No','value' => set_value('orderno'));
echo form_input($orderno);
echo form_error('orderno');
?>     <label for="orderno" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group" id="inr">
                  <label class="col-sm-3 control-label">Purchase Price </label>
                  <div class="col-sm-9">
                 <?php
$price = array('type' => 'text','name' => 'price','id' => 'price','class' => 'form-control','placeholder' =>'Purchase Price ','value' => set_value('price'));
echo form_input($price);
echo form_error('price');
?>     <label for="price" class="error"></label>
                  </div>
                </div>


                   <div class="form-group">
                  <label class="col-sm-3 control-label">Weather undergone training of 6 months</label>
                  <div class="col-sm-9">
                 <?php  
$wt = array('Yes' => 'Yes','No' => 'No','Under Training' => 'Under Training');
/*newarea Textfield*/
 echo form_dropdown('wt', $wt, set_value('wt',1),'id="wt" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('wt');
/*----End newarea Textfield----*/
 ?>
                    <label for="wt" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Health Status</label>
                  <div class="col-sm-9">
    <select name="hs" id="hs" data-placeholder="Choose One" title="Please select at least 1 value" class="select2">
    <option value="">--Select--</option>
<option value="Fit">Fit</option>
<option value="Unfit">Unfit</option>
<option value="Light Duty">Light Duty</option>
<option value="Under Treatment">Under Treatment</option>
<option value="Onrest">Onrest</option>
</select> 
                    <label for="hs" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group" style="display:none" id="sone">
                  <label class="col-sm-3 control-label">Serviceable</label>
                  <div class="col-sm-9">
    <select name="Serviceable" id="Serviceable" data-placeholder="Choose One" title="Please select at least 1 value" class="select2">
    <option value="">--Select--</option>
<option value="In Stable">In Stable</option>
<option value="In stable Light Duty">In stable Light Duty</option>
</select>
                    <label for="Serviceable" class="error"></label>
                  </div>
                </div>  

                   <div class="form-group" style="display:none" id="none">
                  <label class="col-sm-3 control-label">Non-Serviceable</label>
                  <div class="col-sm-9">
    <select name="nServiceable" id="nServiceable" data-placeholder="Choose One" title="Please select at least 1 value" class="select2">
     <option value="">--Select--</option>
<option value="Minor Injured">Minor Injured</option>
<option value="Major Injured">Major Injured</option>
<option value="Hospitalize">Hospitalize</option>
<option value="Medical rest">Medical rest</option>
</select>
                    <label for="nServiceable" class="error"></label>
                  </div>
                </div>  

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Last Vaccination date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$lvd = array('type' => 'text','name' => 'lvd','id' => 'lvd','class' => 'form-control','placeholder' =>'Last Vaccination date','value' => set_value('lvd'));
echo form_input($lvd);
echo form_error('lvd');
?>   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>  <label for="lvd" class="error"></label>
                  </div>
                </div>  


                <div class="form-group">
                  <label class="col-sm-3 control-label">Vaccinated By</label>
                  <div class="col-sm-9">
<?php
$vb = array('type' => 'text','name' => 'vb','id' => 'vb','class' => 'form-control','placeholder' =>'(Name of Doctor/Officer)','value' => set_value('vb'));
echo form_input($vb);
echo form_error('vb');
?>
                    <label for="vb" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Last health checkup date</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                 <?php
$lhcd = array('type' => 'text','name' => 'lhcd','id' => 'lhcd','class' => 'form-control','placeholder' =>'Last health checkup date','value' => set_value('lhcd'));
echo form_input($lhcd);
echo form_error('lhcd');
?>   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>  <label for="lhcd" class="error"></label>
                  </div>
                </div> 

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Health Checkup by</label>
                  <div class="col-sm-9">
                 <?php
$hcb = array('type' => 'text','name' => 'hcb','id' => 'hcb','class' => 'form-control','placeholder' =>'(Name of Doctor/Officer)','value' => set_value('hcb'));
echo form_input($hcb);
echo form_error('hcb');
?>     <label for="hcb" class="error"></label>
                  </div>
                </div> 

                 <div class="form-group">
                  <label class="col-sm-3 control-label">Posting Details</label>
                  <div class="col-sm-9">
<?php
$postingdeatils = array('type' => 'text','name' => 'postingdeatils','id' => 'postingdeatils','class' => 'form-control','placeholder' =>'Posting Details','value' => set_value('postingdeatils'));
echo form_input($postingdeatils);
echo form_error('postingdeatils');
?>
                    <label for="postingdeatils" class="error"></label>
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
  }),jQuery('#date').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#lvd').datepicker({dateFormat: "dd/mm/yy"}); jQuery('#lhcd').datepicker({dateFormat: "dd/mm/yy"});
  $(document).on('change', '#moa', function() {
  if(this.value == 'Gifted'){
     $('#inr').hide();
     $('#gorno').hide();
     $('#gord').hide();
   }else if(this.value == 'Transferred'){
     $('#inr').hide();
     $('#gorno').show();
     $('#gord').show();
   }
   else{
    $('#inr').show();
    $('#gorno').show();
     $('#gord').show();
   }
});

    $(document).on('change', '#hs', function() {
      if(this.value == ''){
     $('#sone').hide();
     $('#none').hide();
   }
  if(this.value == 'Serviceable'){
     $('#sone').show();
     $('#none').hide();
   }else if(this.value == 'Non-Serviceable'){
     $('#sone').hide();
     $('#none').show();
   }
});


 $(document).on('change', '#breed', function() {
      if(this.value == 'Other'){
     $('#BreedOther1').show();
   }else{
    $('#BreedOther1').hide();
   }
  
});

});
</script>
</body>
</html>