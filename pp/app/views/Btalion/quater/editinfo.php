<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>Allot Quarter Info</title>
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
        <h3> &nbsp; &nbsp; Allot Quarter Info</h3>
      </div>

      <div class="contentpanel">
        <div class="row">
          <?php if ($this->session->flashdata('success_msg')) : ?>
            <div class="alert alert-success alert-dismissible" id="warning" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
            </div>
          <?php endif; ?>
          <div class="col-md-12">
            <?php if ($this->session->flashdata('error_msg')) : ?>
              <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
              </div>
            <?php endif; ?>
            <?php
            /*Form Validation set*/
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
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
              <div class="panel-body">
                <h1>Other</h1>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <?php
                    $Otheradd = array('type' => 'text', 'name' => 'Otheradd', 'id' => 'alor', 'class' => 'form-control', 'placeholder' => 'Other', 'value' => $uinfo->nameofallote . $uinfo->qother);
                    echo form_input($Otheradd);
                    echo form_error('Otheradd');
                    ?> <label for="alor" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Rank</label>
                  <div class="col-sm-9">
                    <?php
                    $rankss = array('type' => 'text', 'name' => 'rankss', 'id' => 'rankss', 'class' => 'form-control', 'placeholder' => 'Rank', 'value' => $uinfo->rank);
                    echo form_input($rankss);
                    echo form_error('rankss');
                    ?> <label for="alor" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Regt No:</label>
                  <div class="col-sm-9">
                    <?php
                    $regt = array('type' => 'text', 'name' => 'regt', 'id' => 'regt', 'class' => 'form-control', 'placeholder' => 'Regt No:', 'value' => $uinfo->regltno);
                    echo form_input($regt);
                    echo form_error('regt');
                    ?> <label for="regt" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact No:</label>
                  <div class="col-sm-9">
                    <?php
                    $contactno = array('type' => 'text', 'name' => 'contactno', 'id' => 'contactno', 'class' => 'form-control', 'placeholder' => 'Contact No:', 'value' => $uinfo->contactno);
                    echo form_input($contactno);
                    echo form_error('contactno');
                    ?> <label for="contactno" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Posting details</label>
                  <div class="col-sm-9">
                    <?php
                    $posd = array('type' => 'text', 'name' => 'posd', 'id' => 'posd', 'class' => 'form-control', 'placeholder' => 'Posting details', 'value' => $uinfo->placeofposting);
                    echo form_input($posd);
                    echo form_error('posd');
                    ?> <label for="posd" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Electricity Meter No. </label>
                  <div class="col-sm-9">
                    <?php
                    $eono = array('type' => 'text', 'name' => 'eono', 'id' => 'eono', 'class' => 'form-control', 'placeholder' => 'Electricity Meter No.', 'required' => 'required', 'value' => $uinfo->electronicmeter);
                    echo form_input($eono);
                    echo form_error('eono');
                    ?> <label for="eono" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Accommodation Type</label>
                  <div class="col-sm-9">
                    <?php
                    $acct = array('' => '--Select--', 'Family residential' => 'Family residential', 'Girls hostel' => 'Girls hostel', 'Boys hostel' => 'Boys hostel', 'NGO mess' => 'NGO mess', 'Guest house' => 'Guest house', 'Trainees Hostel' => 'Trainees Hostel');
                    /*newarea Textfield*/
                    echo form_dropdown('acct', $acct, set_value('acct', $uinfo->accomdationtype), 'id="acct" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                    echo form_error('acct');
                    /*----End newarea Textfield----*/
                    ?> <label for="acct" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Accommodation Size</label>
                  <div class="col-sm-9">
                    <?php
                    $accts = array('' => '--Select--', 'One bedroom' => 'One bedroom', 'Two bedroom' => 'Two bedroom', 'Three bedroom' => 'Three bedroom', 'Four bedroom' => 'Four bedroom');
                    /*newarea Textfield*/
                    echo form_dropdown('accts', $accts, set_value('accts', $uinfo->accomdationsize), 'id="accts" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                    echo form_error('accts');
                    /*----End newarea Textfield----*/
                    ?> <label for="accts" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Type of Quarter</label>
                  <div class="col-sm-9">
                    <?php
                    $tq = array('' => '--Select--', 'GOs' => 'GOs', 'NGOs' => 'NGOs', 'ORs' => 'ORs', 'C-IV' => 'C-IV');
                    /*newarea Textfield*/
                    echo form_dropdown('tq', $tq, set_value('tq', $uinfo->typeofqtr), 'id="tq" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
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
                    $floor = array('' => '--Select--', 'Ground floor' => 'Ground floor', '1st floor' => '1st floor', '2nd floor' => '2nd floor', '3rd floor' => '3rd floor', '4th floor' => '4th floor');
                    /*newarea Textfield*/
                    echo form_dropdown('floor', $floor, set_value('floor', $uinfo->flor), 'id="floor" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                    echo form_error('floor');
                    /*----End newarea Textfield----*/
                    ?>
                    <label for="floor" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Battalion/Unit of Allotee</label>
                  <div class="col-sm-9">
                    <?php
                    $bua = array('' => '--Select--', 'Battalion/Unit' => 'Battalion/Unit', 'District' => 'District', 'Other' => 'Other');
                    /*newarea Textfield*/
                    echo form_dropdown('bua', $bua, set_value('bua', ''), 'id="bua" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                    echo form_error('bua');
                    /*----End newarea Textfield----*/
                    ?> <label for="bua" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="bbatslist" style="display: none;">
                  <label class="col-sm-3 control-label">Battalion/Unit</label>
                  <div class="col-sm-9">
                    <?php
                    $ito = array('' => '--Select--', '7th BN. PAP' => '7th BN. PAP', '9th BN. PAP' => '9th BN. PAP', '13th BN.PAP' => '13th BN.PAP', '27th BN.PAP' => '27th BN.PAP', '36th BN.PAP' => '36th BN.PAP', '75th BN.PAP' => '75th BN.PAP', '80th BN.PAP' => '80th BN.PAP', '82nd BN.PAP' => '82nd BN.PAP', 'RTC/PAP, JRC' => 'RTC/PAP, JRC', 'Control Room PAP' => 'Control Room PAP', 'ISTC/KPT.' => 'ISTC/KPT.', '1st CDO BN. BHG, PTL' => '1st CDO BN. BHG, PTL', '2nd CDO BN. BHG, PTL' => '2nd CDO BN. BHG, PTL', '3rd CDO BN., Mohali' => '3rd CDO BN., Mohali', '4th CDO BN., Mohali' => '4th CDO BN., Mohali', '5th CDO BN. BHG, PTL' => '5th CDO BN. BHG, PTL', '1st IRBn., PTL.' => '1st IRBn., PTL.', '2nd IRBn., L/Kothi, SGR.' => '2nd IRBn., L/Kothi, SGR.', '3rd IRBn., LDH' => '3rd IRBn., LDH', '4th IRBn., PTK' => '4th IRBn., PTK', '5th IRBn., ASR' => '5th IRBn., ASR', '6th IRBn., L/Kothi, SGR.' => '6th IRBn., L/Kothi, SGR.', '7th IRBn., KPT' => '7th IRBn., KPT', 'CTC/BHG, PTL.' => 'CTC/BHG, PTL.', 'CCR/BHG, PTL.' => 'CCR/BHG, PTL.', 'PPA/PHR' => 'PPA/PHR', 'Jahan khelan' => 'Jahan khelan');

                    /*newarea Textfield*/
                    echo form_dropdown('bbatslist', $ito, set_value('bbatslist', ''), 'id="batslis" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"');
                    echo form_error('bbatslist');
                    /*----End newarea Textfield----*/
                    ?>
                    <label for="batslist" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="bdistrict" style="display: none;">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                    <?php
                    $ito = array('' => '--Select--', 'Amritsar Commissionerate' => 'Amritsar Commissionerate', 'Amritsar Rural' => 'Amritsar Rural', 'Batala' => 'Batala', 'Gurdaspur' => 'Gurdaspur', 'Pathankot' => 'Pathankot', 'Tarn Taran' => 'Tarn Taran', 'Patiala' => 'Patiala', 'Sangrur' => 'Sangrur', 'Barnala' => 'Barnala', 'Rupnagar' => 'Rupnagar', 'S.A.S Nagar' => 'S.A.S Nagar', 'Fatehgarh Sahib' => 'Fatehgarh Sahib', 'Jalandhar Commissionerate' => 'Jalandhar Commissionerate', 'Jalandhar Rural' => 'Jalandhar Rural', 'Hoshiarpur' => 'Hoshiarpur', 'Kapurthala' => 'Kapurthala', 'Ludhiana Commissionerate' => 'Ludhiana Commissionerate', 'Ludhiana Rural' => 'Ludhiana Rural', 'Khanna' => 'Khanna', 'Shahid Bhagat Singh Nagar' => 'Shahid Bhagat Singh Nagar', 'Bathinda' => 'Bathinda', 'Mukatsar' => 'Mukatsar', 'Mansa' => 'Mansa', 'Ferozepur' => 'Ferozepur', 'Fazlika' => 'Fazlika', 'Moga' => 'Moga', 'Faridkot' => 'Faridkot', 'Vigilance Bureau' => 'Vigilance Bureau', 'CID' => 'CID', 'EXCISE' => 'EXCISE', 'NRI WING' => 'NRI WING');

                    /*newarea Textfield*/
                    echo form_dropdown('statelist', $ito, set_value('statelist', ''), 'id="statelist" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"');
                    echo form_error('statelist');
                    /*----End newarea Textfield----*/
                    ?>
                    <label for="statelist" class="error"></label>
                  </div>
                </div>

                <div class="form-group" id="bother" style="display: none;">
                  <label class="col-sm-3 control-label">Other</label>
                  <div class="col-sm-9">
                    <?php
                    $otherinfo = array('type' => 'text', 'name' => 'otherinfo', 'id' => 'otherinfo', 'class' => 'form-control', 'placeholder' => 'Other', 'value' => set_value('otherinfo'));
                    echo form_input($otherinfo);
                    echo form_error('otherinfo');
                    ?>
                    <!-- <label for="alor" class="error"></label>
                  </div>
                </div>

                <h1>Man Power</h1>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9"> -->
                    <?php
                    /*$Otheradd = array('type' => 'text','name' => 'Otheraddm','id' => 'alor','class' => 'form-control','placeholder' =>'Other','value' => $uinfo->nameofallote);
*//*echo form_input($Otheradd);*/
                    /*echo form_error('Otheradd');  --> 

*/
                    ?> <label for="alor" class="error"></label>
                  </div>
                </div>
                <div class="form-group" id="allotedDiv" >
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <?php
                    $ito = array('' => '--Select--', 'Issued'=>'Issued','Vacant'=>'Vacant','In kot'=>'Wrong Status');
                    /*newarea Textfield*/
                    echo form_dropdown('alloted', $ito, set_value('alloted', $uinfo->allot), 'id="alloted" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"');
                    echo form_error('alloted');
                    /*----End newarea Textfield----*/
                    ?>
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
  <script src="<?php echo base_url(); ?>webroot/js/jquery-2.1.3.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/jquery-ui-1.10.3.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/modernizr.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/toggles.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/retina.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/jquery.cookies.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/jquery.mousewheel.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/jquery.validate.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/custom.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      "use strict";
      jQuery(".select2").select2({
          width: "100%"
        }),
        jQuery("#basicForm4").validate({
          highlight: function(e) {
            jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")
          },
          success: function(e) {
            jQuery(e).closest(".form-group").removeClass("has-error")
          }
        }), jQuery('#alldate').datepicker({
          dateFormat: "dd/mm/yy"
        });
      jQuery('#od').datepicker({
        dateFormat: "dd/mm/yy"
      });
      $(document).on('click', '#showi', function() {
        $('#Issuedtoc1').show();
        $('#Issuedtoc2').hide();

      });

      $(document).on('click', '#showi2', function() {
        $('#Issuedtoc2').show();
        $('#Issuedtoc1').hide();

      });
    });

    $(document).on('change', '#bua', function() {
      if (this.value == 'Battalion/Unit') {
        $('#bbatslist').show();
        $('#bdistrict').hide();
        $('#bother').hide();

      } else if (this.value == 'District') {
        $('#bdistrict').show();
        $('#bbatslist').hide();
        $('#bother').hide();

      } else if (this.value == 'Other') {
        $('#bother').show();
        $('#bbatslist').hide();
        $('#bdistrict').hide();

      } else {
        $('#bbatslist').hide();
        $('#bdistrict').hide();
        $('#bother').hide();
      }
    });
  </script>
</body>

</html>