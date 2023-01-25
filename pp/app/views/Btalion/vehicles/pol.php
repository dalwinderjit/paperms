<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Pol/Repair Update (Monthly)</title>
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
      <h3>&nbsp; &nbsp; Pol/Repair Update (Monthly)</h3>
    </div>

    <div class="contentpanel">
      <div class="row">
          <div class="hide alert alert-danger alert-dismissible"  role="alert" id="error-message">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong><span></span>
</div>
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
                             echo form_dropdown('rnum', $rnum, set_value('rnum',$vichelinfo->mt_id),'id="rnumid" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" disabled'); 
                             echo form_error('rnum');
                             
                            /*----End newarea Textfield----*/
                   ?>
                    <div class="text-danger" id="error-message"></label>
                  </div>
                </div>


                  <div class="form-group">
                  <label class="col-sm-3 control-label">Current Month</label>
                  <div class="col-sm-3">
                        <?php  
                            $rnum = array('' => '--Select--','01' => 'Jan','02' => 'Feb','03' => 'March','04' => 'April','05' => 'May','06' => 'June','07' => 'July','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                            
                            /*newarea Textfield*/
                             echo form_dropdown('cmonth', $rnum, set_value('cmonth',''),'id="cmonth" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             
                             echo form_error('cmonth');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>

                  <label class="col-sm-2 control-label">Current Year</label>
                  <div class="col-sm-3">
                        <?php  
                            $rnum = array('' => '--Select--','2016' => '2016','2017' => '2017','2018' => '2018','2019' => '2019','2020' => '2020','2021' => '2021','2022' => '2022','2023' => '2023','2024' => '2024','2025' => '2025','2026' => '2026','2027' => '2027','2028' => '2028','2029' => '2029','2030' => '2030');
                                            
                            /*newarea Textfield*/
                             echo form_dropdown('cyear', $rnum, set_value('cyear',''),'id="cyear" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                             echo form_error('cyear');
                            /*----End newarea Textfield----*/
                   ?>
                    <label for="regno" class="error"></label>
                  </div>
                  </div>
                  <div id="listing">
                      
                      <div class="form-group">
                  <label class="col-sm-3 control-label">Till last  Month KM/Hours </label>
                  <div class="col-sm-9">
<input name="mkmo" value="" id="mkmo" class="form-control" placeholder="Month KM" type="text">
                    <label for="mkmo" class="error"></label>
                  </div>
                </div>
                      
                      <div class="form-group">
                  <label class="col-sm-3 control-label">Current Month KM/Hours </label>
                  <div class="col-sm-9">
<input name="mkm" value="" id="mkm" class="form-control" type="text" required>
<?php echo form_error('mkm');
?>
                  </div>
                </div>
                      <div class="form-group">
                  <label class="col-sm-3 control-label">Till last Month POL </label>
                  <div class="col-sm-9">
<input name="mpolo" value="" id="mpolo" class="form-control" placeholder="Month POL" type="text">
                    <label for="mpolo" class="error"></label>
                  </div>
                </div>
                      
                      <div class="form-group">
                  <label class="col-sm-3 control-label"> Current Month POL </label>
                  <div class="col-sm-9">
<input name="mpol" value="" id="mpol" class="form-control" type="text" required>
                    <?php echo form_error('mpol');
?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Current Month pol exp</label>
                  <div class="col-sm-9">
<input name="polex" value="" id="polex" class="form-control" placeholder="POL EXP" type="text" required>
                    <?php echo form_error('polex');
?>
                  </div>
                </div>
                      
                      
                      <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Total KM/Hours </label>
                  <div class="col-sm-9">
<input name="tkm" value="'.$d1.'" id="tkm" class="form-control" placeholder="Total KM" readonly="readonly" type="text">
                    <label for="tkm" class="error"></label>
                  </div>
                </div>


                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Total POL </label>
                  <div class="col-sm-9">
<input name="tpol" value="'.$e1.'" id="tpol" class="form-control" placeholder="Total POL" readonly="readonly" type="text">
                    <label for="tpol" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Till last month Repair</label>
                  <div class="col-sm-9">
<input name="repairo" value="0" id="repairo" class="form-control" placeholder="Repair." type="text">
                    <label for="repairo" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Current month Repair</label>
                  <div class="col-sm-9">
<input name="repair" value="" id="repair" class="form-control" type="text">
                    <label for="repair" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Total Repair</label>
                  <div class="col-sm-9">
<input name="trepair" value="0" id="trepair" class="form-control" placeholder="Total Repair." type="text">
                    <label for="trepair" class="error"></label>
                  </div>
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
        <?php 
        if($fetch_form == true && false){
          ?> 
                    getForm();  
          <?php 
        }
        ?>
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

});

 $("#cyear").change(getForm);
 $("#cmonth").change(getForm);
  function getForm(){
  clearError();
      var rnumid = $("#rnumid").val();
    var cmonth = $("#cmonth").val();
    var cyear = $("#cyear").val();
    var dataStrings = 'cmonth='+cmonth+'&rnumid='+rnumid+'&cyear='+cyear;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-sti-list",
    data: dataStrings,
    cache: false,
    success: function(html){
        var data = JSON.parse(html);
        console.log(data);
        if(data.status == false){
       //     alert(data.message);
            $('#error-message>span').html(data.message);
            $('#error-message').removeClass('hide');
        }else{
            $('#error-message').addClass('hide');
        }
//        $d1 .= $wep->tkm + $wep->mkm;
//					$e1 .= $wep->tpol + $wep->mpol;
        //if(data.a1!=''){
            $('#mkmo').val(data.wep.tkm);//
            
            
            $('#mkmo').attr('readonly','readonly');
//        }
//        if(data.b1!=''){
            $('#mpolo').val(data.wep.tpol);
            if(data.wep.cmonth==cmonth){
                $('#mkm').val(data.wep.tkm-data.wep.mkm);
                $('#mpol').val(data.wep.tpol-data.wep.mpol);
            }else{
                $('#mkm').val('');
                $('#mpol').val('');
            }
            
            $('#polex').val(data.wep.polex);//
            $('#tkm').val(data.wep.tkm+data.wep.mkm);//
            $('#tpol').val(data.wep.tpol+data.wep.mpol);//
            $('#mpolo').attr('readonly','readonly');
//        }
      //$('#listing').html(html);
  }
      
    });

  
  }
  function clearError(){
      $('form#basicForm4 div.text-danger').remove();
  } 
</script>
</body>
</html>