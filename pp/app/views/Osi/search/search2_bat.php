<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title> OSI Module</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-datepicker3.css" />
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/daterangepicker.css" />
  <style type="text/css">
    .cur {
      cursor: pointer;
    }

    .green-back {
      background-color: #667c2f;
    }

    .blue-back {
      background-color: #428bca;
    }

    .white {
      color: white;
    }
  </style>
  <script type="text/javascript">
    var postingModule = '';
  </script>
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
        <h3>&nbsp; &nbsp; &nbsp; OSI Module <?php if ($name != '') {
                                              echo $name->nick;
                                            } ?></h3>
      </div>

      <div class="contentpanel">
        <div class="row">
          <div class="col-sm-12">
            <!-- FOR SUCESSAJAX MESSAGE -->
            <script type="text/javascript">
              function showSuccessMessage(message) {
                $('#sucess-message').css('display', 'block');
                $('#sucess-message>#message').html(message);
              }
            </script>
            <div class="alert alert-success alert-dismissible" id="sucess-message" role="alert" style="display:none;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success!</strong> <span id="message"> </span>
            </div>
            <!-- FOR FAILED AJAX MESSAGE -->

            <?php if ($this->session->flashdata('success_msg')) : ?>
              <div class="alert alert-success alert-dismissible" id="warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
              </div>
            <?php endif; ?>
            <div class="panel panel-default">
              <div class="panel-heading">
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
                  'method' => 'post',
                  'onsubmit' => 'return false;'
                );
                echo form_open_multipart("", $attributes);
                ?>
                <div class="row">
                  <?php
                  if ($this->session->userdata('user_log') == 4) {    //battalion login
                    $ito = array($this->session->userdata('userid'));
                  ?>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text" disabled value="<?php echo $this->session->userdata('nick') ?>" class="form-control">
                      </div>
                    </div>
                  <?php
                  } else { ?>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <?php
                        $ito = array();
                        //$ito[''] = '--Battalion--';
                        foreach ($uname as $value) {
                          if ($value->users_id == 91 || $value->users_id == 92 || $value->users_id == 93  || $value->users_id == 94  || $value->users_id == 95) {
                          } elseif ($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210) {
                            $ito[192] = '1-IRB';
                            $ito[167] = '2-IRB';
                            $ito[156] = '3-IRB';
                            $ito[115] = '4-IRB';
                            $ito[110] = '5-IRB';
                            $ito[162] = '6-IRB';
                            $ito[123] = '7-IRB';
                          } elseif ($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212) {
                            $ito[100] = '1-CDO';
                            $ito[174] = '2-CDO';
                            $ito[144] = '3-CDO';
                            $ito[150] = '4-CDO';
                            $ito[180] = '5-CDO';
                            $ito[198] = 'CTC BHG';
                          } else {
                            $ito[$value->users_id] = $value->nick;
                          }
                        }
                        /*newarea Textfield*/
                        echo form_dropdown('ito[]', $ito, set_value('ito', (isset($_GET['ito'])) ? $_GET['ito'] : ''), 'id="ito" placeholder="Select Battalion(s)" title="Please select at least 1 area" multiple class="select2"');
                        echo form_error('ito');
                        /*----End newarea Textfield----*/
                        ?>
                        <label for="tpi" class="error"></label>
                      </div>
                    </div>
                  <?php } ?>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $name = array('type' => 'text', 'name' => 'name', 'id' => 'name', 'class' => 'form-control', 'placeholder' => 'Offical Name', 'value' => (isset($_GET['name'])) ? $_GET['name'] : '');
                      echo form_input($name);
                      echo form_error('name');
                      ?>
                      <label for="name" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $bloodgroup = array('A+VE' => 'A+VE', 'A-VE' => 'A-VE', 'AB+VE' => 'AB+VE', 'AB-VE' => 'AB-VE', 'B+VE' => 'B+VE', 'B-VE' => 'B-VE', 'O+VE' => 'O+VE', 'O-VE' => 'O-VE');
                      /*newarea Textfield*/
                      echo form_dropdown('bloodgroup[]', $bloodgroup, set_value('bloodgroup', (isset($_GET['bloodgroup'])) ? $_GET['bloodgroup'] : ''), 'id="bloodgroup" data-placeholder="Select Blood Group" class="select2" multiple');
                      echo form_error('bloodgroup');
                      ?>
                      <label for="bloodgroup" class="error"></label>
                    </div>
                  </div>


                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $rcnum = array('type' => 'text', 'name' => 'rcnum', 'id' => 'rcnum', 'class' => '', 'placeholder' => 'Dept No.', 'value' => (isset($_GET['rcnum'])) ? $_GET['rcnum'] : '');
                      echo form_input($rcnum);
                      echo form_error('rcnum');
                      ?>
                      <label for="rcnum" class="error"></label>
                    </div>
                  </div>



                  <div class="col-sm-2">
                    <div class="form-group">

                      <?php
                      $RankRankre = array('' => '--Staff Category--', 'Executive Staff' => 'Executive Staff', 'Ministerial Staff' => 'Ministerial Staff', 'Medical Staff' => 'Medical Staff', 'Class-IV (P)' => 'Class-IV (P)', 'Class-IV (C)' => 'Class-IV (C)');
                      echo form_dropdown('RankRankre', $RankRankre,  set_value('RankRankre', (isset($_GET['RankRankre'])) ? $_GET['RankRankre'] : ''), 'id="RankRankre" data-placeholder="Choose One" class="select2"');
                      echo form_error('RankRankre');
                      ?>
                      <label for="eor" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2" id="eors1">
                    <div class="form-group">
                      <?php
                      $eor1 = array('CT' => 'CT', 'Sr.Const' => 'Sr. Const', 'C-II' => 'C-II', 'HC/PR' => 'HC/PR', 'HC' => 'HC', 'HC/LR' => 'HC/LR', 'HC/CR' => 'HC/CR', 'ASI/LR' => 'ASI/LR', 'ASI/CR' => 'ASI/CR',  'ASI' => 'ASI', 'ASI/ORP' => 'ASI/ORP', 'SI/CR' => 'SI/CR', 'SI/LR' => 'SI/LR', 'SI' => 'SI', 'INSP/CR' => 'INSP/CR', 'INSP/LR' => 'INSP/LR', 'INSP' => 'INSP', 'DSP/CR' => 'DSP/CR', 'DSP' => 'DSP', 'AIG' => 'AIG', 'SP/CR' => 'SP/CR', 'SP' => 'SP', 'Asst. Commandant' => 'Asst. Commandant', 'Commandant' => 'Commandant');
                      echo form_dropdown('eor1[]', $eor1, set_value('eor1', (isset($_GET['eor1'])) ? $_GET['eor1'] : ''), 'id="eor1" data-placeholder="Select Rank(s)" class="select2" multiple');
                      echo form_error('eor1');
                      ?>
                      <label for="RankRankre" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2" id="eors2" style="display: none;">
                    <div class="form-group">

                      <?php
                      $eor2 = array('Senior Asstt.' => 'Senior Asstt.', 'Junior Asstt.' => 'Junior Asstt.', 'Clerk' => 'Clerk', 'Peon' => 'Peon', 'Daftari' => 'Daftari', 'Supdt Grade-I' => 'Supdt Grade-I', 'SubSupdt Grade-II' => 'Supdt Grade-II');
                      echo form_dropdown('eor2[]', $eor2, set_value('eor2', (isset($_GET['eor2'])) ? $_GET['eor2'] : ''), 'id="eor2" data-placeholder="Select Rank(s)" class="select2" multiple');
                      echo form_error('eor2');
                      ?>
                      <label for="eor2" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2" id="eors3" style="display: none;">
                    <div class="form-group">

                      <?php
                      $eor3 = array('Doctor' => 'Doctor', 'Pharmacist' => 'Pharmacist', 'Physiotherapist' => 'Physiotherapist', 'Lab Technician' => 'Lab Technician', 'Nursing Asstt.' => 'Nursing Asstt.');
                      echo form_dropdown('eor3[]', $eor3, set_value('eor3', (isset($_GET['eor3'])) ? $_GET['eor3'] : ''), 'id="eor3" data-placeholder="Select Rank(s)" class="select2" multiple');
                      echo form_error('eor3');
                      ?>
                      <label for="Medical" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2" id="eors4" style="display: none;">
                    <div class="form-group">

                      <?php
                      $eor4 = array('Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter', 'Mason' => 'Mason', 'Mali' => 'Mali');
                      echo form_dropdown('eor4[]', $eor4, set_value('eor4', (isset($_GET['eor4'])) ? $_GET['eor4'] : ''), 'id="eor4" data-placeholder="Select Rank(s)" class="select2" multiple');
                      echo form_error('eor4');
                      ?>
                      <label for="eor4" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2" id="eors5" style="display: none;">
                    <div class="form-group">

                      <?php
                      $eor5 = array('Cook' => 'Cook', 'Water Carrier' => 'Water Carrier', 'Sweeper' => 'Sweeper', 'Dhobi' => 'Dhobi', 'Mochi' => 'Mochi', 'Barber' => 'Barber', 'Tailor' => 'Tailor', 'Carpenter' => 'Carpenter', 'Mason' => 'Mason', 'Mali' => 'Mali');
                      echo form_dropdown('eor5[]', $eor5, set_value('eor5', (isset($_GET['eor5'])) ? $_GET['eor5'] : ''), 'id="eor5" data-placeholder="Select Rank(s)" class="select2" multiple');
                      echo form_error('eor5');
                      ?>
                      <label for="eor5" class="error"></label>
                    </div>
                  </div>
                </div><br />

                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">

                      <?php
                      $postate = array();
                      //$postate[''] = '--State--';
                      foreach ($statelist as $value) {
                        $postate[$value->state] = $value->state;
                      }

                      ?>
                      <?php
                      /*newarea Textfield*/
                      echo form_dropdown('postate', $postate, set_value('postate'), 'id="postate" data-placeholder="Select State" title="Please select at least 1 area" class="select2" multiple');
                      echo form_error('postate');
                      /*----End newarea Textfield----*/
                      ?>
                      <label for="postate" class="error"></label>
                    </div>
                  </div>


                  <div class="col-sm-2">
                    <div class="form-group"><select name="pcity" id="dis" data-placeholder="Select City" title="Please select at least 1 value" class="form-control" multiple>';
                        
                      </select></div>
                  </div>


                  <div id="listing2"></div>




                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $stts = array('Illiterate' => 'Illiterate', 'Under Matric' => 'Under Matric', '10th' => '10th', 'H. Sec' => 'H. Sec', 'Prep' => 'Prep', '10+1' => '10+1', '10+2' => '10+2', 'Under Graduate' => 'Under Graduate', 'Graduate' => 'Graduate', 'Post Graduate' => 'Post Graduate', 'Doctorate' => 'Doctorate', 'Other' => 'Other');
                      /*newarea Textfield*/
                      echo form_dropdown('stts[]', $stts, set_value('stts', (isset($_GET['stts'])) ? $_GET['stts'] : ''), 'id="stts" placeholder="Select Education(s)" class="select2" multiple');
                      echo form_error('stts');
                      /*----End newarea Textfield----*/
                      ?>
                      <label for="stts" class="error"></label>
                    </div>
                  </div>
                  <div class="col-sm-2" id="selectClass">
                    <div class="form-group">

                      <?php
                      $classes = array();  //this option will conating the classes of the selected course
                      /*newarea Textfield*/
                      echo form_dropdown('classes[]', $classes, set_value('UnderGraduate', (isset($_GET['UnderGraduate'])) ? $_GET['UnderGraduate'] : ''), 'id="classes" data-placeholder="Select class(s)" class="select2" multiple');
                      echo form_error('UnderGraduate');
                      /*----End newarea Textfield----*/
                      /*
 $("#classes").empty()
 
 */

                      ?>
                      <label for="UnderGraduate" class="error"></label>
                    </div>
                  </div>
                  <div class="col-sm-2" id="ugb" style="display:none;">
                    <div class="form-group">

                      <?php
                      $UnderGraduate = array('BA-I' => 'BA-I', 'BA-II' => 'BA-II', 'BSc-I' => 'BSc-I', 'BSc-II' => 'BSc-II', 'BSc .IT-I' => 'BSc .IT-I', 'BSc .IT-II' => 'BSc .IT-II', 'Bcom-I' => 'Bcom-I', 'Bcom-II' => 'Bcom-II', 'BCA-I' => 'BCA-I', 'BCA-II' => 'BCA-II', 'BBA-I' => 'BBA-I', 'BBA-II' => 'BBA-II', 'LLB-I' => 'LLB-I', 'LLB-II' => 'LLB-II', 'B.Tech-I' => 'B.Tech-I', 'B.Tech-II' => 'B.Tech-II', 'B.Tech-III' => 'B.Tech-III', 'BA/LLB' => 'BA/LLB');
                      /*newarea Textfield*/
                      echo form_dropdown('UnderGraduate', $UnderGraduate, set_value('UnderGraduate', (isset($_GET['UnderGraduate'])) ? $_GET['UnderGraduate'] : ''), 'id="ug" placeholder="Choose One" class="select2"');
                      echo form_error('UnderGraduate');
                      /*----End newarea Textfield----*/
                      ?>
                      <label for="UnderGraduate" class="error"></label>
                    </div>
                  </div>
                  <script type="text/javascript">
                    var UnderGraduate = JSON.parse('<?php echo json_encode($UnderGraduate); ?>');
                  </script>


                  <div class="col-sm-2" id="gb" style="display:none;">
                    <div class="form-group">

                      <?php
                      $Graduate = array('BA' => 'BA', 'B.Sc' => 'B.Sc', 'BSc .IT' => 'BSc .IT', 'B.Com' => 'B.Com', 'BCA' => 'BCA', 'BBA' => 'BBA', 'BDS' => 'BDS', 'LLB' => 'LLB', 'B.Tech' => 'B.Tech', 'LAB Technician' => 'LAB Technician');
                      /*newarea Textfield*/
                      echo form_dropdown('Graduate', $Graduate, set_value('Graduate', (isset($_GET['Graduate'])) ? $_GET['Graduate'] : ''), 'id="Graduate" data-placeholder="Choose One" class="select2"');
                      echo form_error('Graduate');
                      /*----End newarea Textfield----*/
                      ?>
                      <label for="Graduate" class="error"></label>
                    </div>
                  </div>
                  <script type="text/javascript">
                    var Graduate = JSON.parse('<?php echo json_encode($Graduate); ?>');
                  </script>


                  <div class="col-sm-2" id="pgb" style="display:none;">
                    <div class="form-group">

                      <?php
                      $PostGraduate = array('MA' => 'MA', 'M.Com' => 'M.Com', 'M.Phil' => 'M.Phil', 'M Pharm' => 'M Pharm', 'MCA' => 'MCA', 'MBA' => 'MBA', 'MTA' => 'MTA', 'M.Tech' => 'M.Tech', 'M.Sc' => 'M.Sc');
                      /*newarea Textfield*/
                      echo form_dropdown('PostGraduate', $PostGraduate, set_value('PostGraduate', (isset($_GET['PostGraduate'])) ? $_GET['PostGraduate'] : ''), 'id="PostGraduate" data-placeholder="Choose One" class="select2"');
                      echo form_error('PostGraduate');
                      /*----End newarea Textfield----*/
                      ?>
                      <label for="PostGraduate" class="error"></label>
                    </div>
                  </div>
                  <script type="text/javascript">
                    var PostGraduate = JSON.parse('<?php echo json_encode($PostGraduate); ?>');
                  </script>
                  <div class="col-sm-2" id="docb" style="display:none;">
                    <div class="form-group">

                      <?php
                      $Doctorate = array('Ph.d' => 'Ph.d');
                      /*newarea Textfield*/
                      echo form_dropdown('Doctorate', $Doctorate, set_value('Doctorate', (isset($_GET['Doctorate'])) ? $_GET['Doctorate'] : ''), 'id="doc" placeholder="Choose One" class="select2"');
                      echo form_error('Doctorate');
                      /*----End newarea Textfield----*/
                      ?>
                      <label for="Doctorate" class="error"></label>
                    </div>
                  </div>
                  <script type="text/javascript">
                    var Doctorate = JSON.parse('<?php echo json_encode($Doctorate); ?>');
                  </script>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $gender = array('Male' => 'Male', 'Female' => 'Female');
                      /*newarea Textfield*/
                      echo form_dropdown('gender[]', $gender, set_value('gender', (isset($_GET['gender'])) ? $_GET['gender'] : ''), 'id="gender" data-placeholder="Select Gender" class="select2" multiple');
                      echo form_error('gender');
                      ?>
                      <label for="gender" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $height = array('' => '--Height Feet--', '4' => '4', '5' => '5', '6' => '6', '7' => '7');
                      echo form_dropdown('height', $height, set_value('height', (isset($_GET['height'])) ? $_GET['height'] : ''), 'id="height" data-placeholder="Choose One" class="select2"');
                      echo form_error('height');
                      ?>
                      <label for="height" class="error"></label>
                    </div>
                  </div>

                </div>
                <br />
                <div class="row">

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php

                      $inch = array('' => '--Height Inch--', '0' => '0', '0.25' => '0.25', '0.50' => '0.50', '0.75' => '0.75', '1.00' => '1.00', '1.25' => '1.25', '1.50' => '1.50', '1.75' => '1.75', '2.00' => '2.00', '2.25' => '2.25', '2.50' => '2.50', '2.75' => '2.75', '3.00' => '3.00', '3.25' => '3.25', '3.50' => '3.50', '3.75' => '3.75', '4.00' => '4.00', '4.75' => '4.75', '5.00' => '5.00', '5.25' => '5.25', '5.50' => '5.50', '5.75' => '5.75', '6.00' => '6.00', '6.25' => '6.25', '6.50' => '6.50', '6.75' => '6.75', '7.00' => '7.00', '7.25' => '7.25', '7.50' => '7.50', '7.75' => '7.75', '8.00' => '8.00', '8.25' => '8.25', '8.50' => '8.50', '8.75' => '8.75', '9.00' => '9.00', '9.25' => '9.25', '9.75' => '9.75', '10.00' => '10.00', '10.25' => '10.25', '10.50' => '10.50', '10.75' => '10.75', '11.00' => '11.00', '11.25' => '11.25', '11.50' => '11.50', '11.75' => '11.75');
                      echo form_dropdown('inch', $inch, set_value('inch', (isset($_GET['inch'])) ? $_GET['inch'] : ''), 'id="inch" data-placeholder="Choose One" class="select2"');
                      echo form_error('inch');
                      ?>
                      <label for="inch" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $single = array('Married' => 'Married', 'Unmarried' => 'Unmarried', 'Divorced' => 'Divorced', 'Widow/Widower' => 'Widow/Widower');
                      /*newarea Textfield*/
                      echo form_dropdown('single[]', $single, set_value('single', (isset($_GET['single'])) ? $_GET['single'] : ''), 'id="single" data-placeholder="Select Maritial status" class="select2" multiple');
                      echo form_error('single');
                      ?>
                      <label for="single" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $Modemdr = array('Special Cases' => 'Special Cases', 'Direct' => 'Direct', 'Direct (Ex-Serviceman)' => 'Direct (Ex-Serviceman)', 'Direct(SPORTS)' => 'Direct(SPORTS)', 'PLI' => 'PLI', 'Court cases' => 'Court cases', 'Direct (Freedom Fighter)' => 'Direct (Freedom Fighter)', 'SPO' => 'SPO');
                      /*newarea Textfield*/
                      echo form_dropdown('Modemdr[]', $Modemdr, set_value('Modemdr', (isset($_GET['Modemdr'])) ? $_GET['Modemdr'] : ''), 'id="Modemdr" data-placeholder="Mode of Enlistment" title="Please select at least 1 area" class="select2" multiple');
                      echo form_error('Modemdr');
                      /*----End newarea Textfield----*/
                      ?>
                      <label for="Modemdr" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $Rankre = array('Constable' => 'Constable', 'ASI' => 'ASI', 'SI' => 'SI', 'Insp' => 'Insp', 'DSP' => 'DSP', 'ASP' => 'ASP');
                      echo form_dropdown('Rankre[]', $Rankre, set_value('Rankre', (isset($_GET['Rankre'])) ? $_GET['Rankre'] : ''), 'id="Rankre" data-placeholder="Rank of Enlistment" class="select2" multiple');
                      echo form_error('Rankre');
                      ?>
                      <label for="Rankre" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $Enlistmentec = array('' => '--Enlistment Category--', 'GEN' => 'GEN', 'SCO' => 'SCO', 'SCBM' => 'SCBM', 'BC' => 'BC', 'OBC' => 'OBC', 'ST' => 'ST', 'EWS' => 'EWS', 'NA' => 'NA');
                      echo form_dropdown('Enlistmentec', $Enlistmentec, set_value('Enlistmentec', (isset($_GET['Enlistmentec'])) ? $_GET['Enlistmentec'] : ''), 'id="Enlistmentec" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"');
                      echo form_error('Enlistmentec');
                      ?>
                      <label for="Enlistmentec" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php
                      $InductionModeim = array('' => '--Battalion Induction Mode--', 'Transfer' => 'Transfer', 'Transfer(Promotion)' => 'Transfer(Promotion)', 'Transfer(Excess)' => 'Transfer(Excess)', 'Attachment' => 'Attachment', 'Transfer Pay Purpose' => 'Transfer Pay Purpose', 'Since Enlistment' => 'Since Enlistment', 'On deputation' => 'On deputation', 'Formal Order Not Issued' => 'Formal Order Not Issued', 'Not Reported' => 'Not Reported');
                      echo form_dropdown('InductionModeim', $InductionModeim, set_value('InductionModeim', (isset($_GET['InductionModeim'])) ? $_GET['InductionModeim'] : ''), 'id="InductionModeim" data-placeholder="Choose One" class="select2"');
                      echo form_error('InductionModeim');
                      ?>
                      <label for="InductionModeim" class="error"></label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-2"><br />
                    <div class="form-group">
                      <?php
                      $InductionModeim = array('' => '--Computer literate--', 'Yes' => 'Yes', 'No' => 'No');
                      echo form_dropdown('clit', $InductionModeim, set_value('clit', (isset($_GET['clit'])) ? $_GET['clit'] : ''), 'id="clit" data-placeholder="Choose One" class="select2"');
                      echo form_error('clit');
                      ?>
                      <label for="InductionModeim" class="error"></label>
                    </div>
                  </div>

                  <div class="col-sm-2"><br />
                    <div class="input-group">
                      <?php
                      $dateofesnlistment1 = array('type' => 'text', 'name' => 'dateofesnlistment1', 'id' => 'dateofesnlistment1', 'class' => 'form-control', 'placeholder' => 'Date of Enlistment From', 'value' => (isset($_GET['dateofesnlistment1'])) ? $_GET['dateofesnlistment1'] : '');
                      echo form_input($dateofesnlistment1);
                      echo form_error('dateofesnlistment1');
                      ?>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                  </div>


                  <div class="col-sm-2"><br />
                    <div class="input-group">
                      <?php
                      $dateofesnlistment2 = array('type' => 'text', 'name' => 'dateofesnlistment2', 'id' => 'edateofesnlistment1', 'class' => 'form-control', 'placeholder' => 'Date of Enlistment To', 'value' => (isset($_GET['dateofesnlistment2'])) ? $_GET['dateofesnlistment2'] : '');
                      echo form_input($dateofesnlistment2);
                      echo form_error('dateofesnlistment2');
                      ?>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                  </div>
                  <?php if (false) { ?>
                    <div class="col-sm-2">
                      <div class="form-group" id="NamesofsCourses1"><br />
                        <?php
                        $NamesofsCourses = array('' => '--Course Category--', 'Special Dept. Courses' => 'Special Dept. Courses', 'Other Prof. Courses' => 'Other Prof. Courses');
                        echo form_dropdown('catcouses', $NamesofsCourses, set_value('catcouses', (isset($_GET['catcouses'])) ? $_GET['catcouses'] : ''), 'id="catcouses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"');
                        echo form_error('NamesofsCourses');
                        ?>
                        <label for="NamesofsCourses" class="error"></label>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="col-sm-2">
                    <div class="form-group" id="training_institutes"><br />
                      <?php
                      //$NamesofsCourses = array('' => '----','Special Dept. Courses' => 'Special Dept. Courses','Other Prof. Courses' => 'Other Prof. Courses');
                      echo form_dropdown('training_institutes', $training_institutes, set_value('training_institutes', (isset($_GET['training_institutes'])) ? $_GET['training_institutes'] : ''), 'id="training_institutes_1"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"');
                      echo form_error('training_institutes');
                      ?>
                      <label for="training_institutes" class="error"></label>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group" id="_courses"><br />
                      <?php
                      //$NamesofsCourses = array('' => '--Course Category--','Special Dept. Courses' => 'Special Dept. Courses','Other Prof. Courses' => 'Other Prof. Courses');
                      echo form_dropdown('courses', $courses, set_value('courses', (isset($_GET['courses'])) ? $_GET['courses'] : ''), 'id="courses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"');
                      echo form_error('courses');
                      ?>
                      <label for="courses" class="error"></label>
                    </div>
                  </div>
                  <div class="col-sm-2" id="NamesofsCourses12" style="display: none;">
                    <div class="form-group"><br />
                      <?php
                      $NamesofsCourses = array('' => '--Name of Course--', 'Basic Drill Course ' => 'Basic Drill Course', 'Computer  Awareness Refresher Coure' => 'Computer  Awareness Refresher Coure', 'Basic MT Course' => 'Basic MT Course', 'MTO Course' => 'MTO Course', 'Commando Course' => 'Commando Course', 'Bomb Dispossal Course' => 'Bomb Dispossal Course', 'Armourer Course' => 'Armourer Course', 'Tear Gas Course' => 'Tear Gas Course', 'D & M Refresher Course' => 'D & M Refresher Course', 'Disaster Management Course' > 'Disaster Management Course', 'Weapon & Tactics Course' => 'Weapon & Tactics Course', 'Camp Security Course' => 'Camp Security Course', 'Finger Print Course' => 'Finger Print Course', 'Gunman Course' => 'Gunman Course', 'Fire Fighting Course' => 'Fire Fighting Course', 'Refresher Course' => 'Refresher Course');

                      echo form_dropdown('NamesofsCourses1', $NamesofsCourses, set_value('NamesofsCourses1', (isset($_GET['NamesofsCourses1'])) ? $_GET['NamesofsCourses1'] : ''), 'id="NamesofsCourses"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"');
                      echo form_error('NamesofsCourses');
                      ?>
                      <label for="NamesofsCourses" class="error"></label>
                    </div>
                  </div>


                  <div class="col-sm-2" id="NamesofsCourses22" style="display: none;">
                    <div class="form-group"><br />
                      <?php
                      $NamesofsCourses = array('' => '--Name of Course--', 'VIP Security Induction Course' => 'VIP Security Induction Course', 'Pistol Handling Course' => 'Pistol Handling Course', 'Capsule Course for Highway Patrolling' => 'Capsule Course for Highway Patrolling', 'Course on Disaster Management' => 'Course on Disaster Management', 'Traffic Law Enforcement & Traffic Control' => 'Highway Patrolling Training', 'Security Refresher Course for PSOs & Escort Staff' => 'Security Refresher Course for PSOs & Escort Staff', 'Re-Orientation (Police Behavior)' => 'Re-Orientation (Police Behavior)', 'Review of Training & Training of Trainers Course' => 'Review of Training & Training of Trainers Course', 'Life Style & Stress Management' => 'Life Style & Stress Management', 'Crowd Control Refresher Training Course' => 'Crowd Control Refresher Training Course', 'Ref. Course in the Handling of Security Equipment & Gadges.' => 'Ref. Course in the Handling of Security Equipment & Gadges.', 'Driving & Maintenance Basic Course' => 'Driving & Maintenance Basic Course', 'Special Coy. Refresher Course' => 'Special Coy. Refresher Course', 'Crash Induction trg. for specialized operation duties course.' => 'Crash Induction trg. for specialized operation duties course.', 'Guard duty & Fighting course and Re-Orientation Course.' => 'Guard duty & Fighting course and Re-Orientation Course.', 'Specialized course reg. Maintenance of Kot & Their inspection' => 'Specialized course reg. Maintenance of Kot & Their inspection', 'Photography cum Single Digital Course' => 'Photography cum Single Digital Course', 'Finger Print Proficiency Course' => 'Finger Print Proficiency Course', 'Emerging Trends in white coller crime &their handling by police Course' => 'Emerging Trends in white coller crime &their handling by police Course', 'Specialized course on Traffic Management & Traffice Control Course' => 'Specialized course on Traffic Management & Traffice Control Course', 'Refresher Course for Drill Instructors Course' => 'Refresher Course for Drill Instructors Course', 'Course on Deparmental Enquiries Course' => 'Course on Deparmental Enquiries Course', 'Regional Seminer on Terrorism Course' => 'Regional Seminer on Terrorism Course', 'Police Lines Management for Course' => 'Police Lines Management for Course', 'Noice Pollution and Enviroment Protection Course' => 'Noice Pollution and Enviroment Protection Course', 'Office Procedure of Account Matters Course' => 'Office Procedure of Account Matters Course', 'Investigation of Domestic Violence Course' => 'Investigation of Domestic Violence Course', 'Latest Court Ruling and Judgments peraining Course' => 'Latest Court Ruling and Judgments peraining Course', 'Social Media Management for positive police Course' => 'Social Media Management for positive police Course', 'An In light into the legal &Procedural Provisions Course' => 'An In light into the legal &Procedural Provisions Course', 'Roll of Soft Skills in Public Dealing Course' => 'Roll of Soft Skills in Public Dealing Course', 'Emerging Sociology Trends and Impact on Contemporary Course' => 'Emerging Sociology Trends and Impact on Contemporary Course', 'Capsule Course on Gender Sensitization for SPs/DSP' => 'Capsule Course on Gender Sensitization for SPs/DSP', 'Course on Healthy Living & Postive Thinking for Gos' => 'Course on Healthy Living & Postive Thinking for Gos', 'Course on Leadership and Communication Skills for SSPs/DSPs' => 'Course on Leadership and Communication Skills for SSPs/DSPs', 'Workshp on Police Media Interface for DSPs/Inspr.' => 'Workshp on Police Media Interface for DSPs/Inspr.', 'HC/PR Promoted after completeion of 16 years HC as Constable' => 'HC/PR Promoted after completeion of 16 years HC as Constable', 'Re-Orientation & Detective Foot Consts. Course for CTs on list C-2' => 'Re-Orientation & Detective Foot Consts. Course for CTs on list C-2', 'Elementry Traffic Course for Constables' => 'Elementry Traffic Course for Constables', 'Specialised Course for Moter Mechanics' => 'Specialised Course for Moter Mechanics', 'Refresher Course on operational preparedness Course' => 'Refresher Course on operational preparedness Course', 'PSO & Gunman Course (State level)' => 'PSO & Gunman Course (State level)', 'Camp security condensed Course' => 'Camp security condensed Course', 'Handling  & defusing of explosive and Bomp Disposal Course' => 'Handling  & defusing of explosive and Bomp Disposal Course', 'Ref.Course for NGOs & ORs' => 'Ref.Course for NGOs & ORs', 'Specialised Course reg. maintenance of Misc.' => 'Specialised Course reg. maintenance of Misc.', 'Specialised Course reg. maintenance of CDO Branch &its inspection Course' => 'Specialised Course reg. maintenance of CDO Branch &its inspection Course', 'Specialised Course reg.maintenance of OASI Branch & its inspection Course' => 'Specialised Course reg.maintenance of OASI Branch & its inspection Course', 'Capsule Course for telephone operators Course' => 'Capsule Course for telephone operators Course', 'Police Behavioural Course' => 'Police Behavioural Course', 'Short term Section Platoon commander Course' => 'Short term Section Platoon commander Course', 'Anti Roit Control Course' => 'Anti Roit Control Course', 'Photography-Cum-single digit course' => 'Photography-Cum-single digit course', 'Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs' => 'Sanstization & Orientation of police Officers/Officals about the legal and Procedural aspects of cases related to NRIs');

                      echo form_dropdown('NamesofsCourses2', $NamesofsCourses, set_value('NamesofsCourses2', (isset($_GET['NamesofsCourses2'])) ? $_GET['NamesofsCourses2'] : ''), 'id="NamesofsCourses2"  data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"');
                      echo form_error('NamesofsCourses');
                      ?>
                      <label for="NamesofsCourses" class="error"></label>
                    </div>
                  </div>


                  <div class="col-sm-2"><br />
                    <div class="form-group">
                      <div class="input-group">
                        <?php
                        $DateofRetirementdor = array('type' => 'text', 'name' => 'DateofRetirementdor', 'id' => 'DateofRetirementdor', 'class' => 'form-control', 'placeholder' => 'Date of Retirement', 'value' => (isset($_GET['DateofRetirementdor'])) ? $_GET['DateofRetirementdor'] : '');
                        echo form_input($DateofRetirementdor);
                        echo form_error('DateofRetirementdor');
                        ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-2"> <br />
                    <div class="input-group">
                      <?php
                      $dateofbirth = array('type' => 'text', 'name' => 'dateofbirth', 'id' => 'dateofbirth', 'class' => 'form-control', 'placeholder' => 'Date of Birth From', 'value' => (isset($_GET['dateofbirth'])) ? $_GET['dateofbirth'] : '');
                      echo form_input($dateofbirth);
                      echo form_error('dateofbirth');
                      ?>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                  </div>




                  <div class="col-sm-2"> <br />
                    <div class="input-group">
                      <?php
                      $dateofbirth = array('type' => 'text', 'name' => 'dateofbirthi', 'id' => 'dateofbirthi', 'class' => 'form-control', 'placeholder' => 'Date of Birth To', 'value' => (isset($_GET['dateofbirthi'])) ? $_GET['dateofbirthi'] : '');
                      echo form_input($dateofbirth);
                      echo form_error('dateofbirth');
                      ?>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-sm-2"><br />
                      <div class="form-group">
                        <?php
                        $mobno = array('type' => 'number', 'name' => 'mobno', 'id' => 'mobno', 'class' => 'form-control', 'placeholder' => 'Mobile Number', 'value' => (isset($_GET['mobno'])) ? $_GET['mobno'] : '');
                        echo form_input($mobno);
                        echo form_error('mobno');
                        ?>
                        <label for="name" class="error"></label>
                      </div>
                    </div>

                    <div class="col-sm-2" style="display:none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset = array('' => '--Select Duty--', 'Fix Duties' => 'Fix Duties', 'Law & Order Duty' => 'Law & Order Duty', 'Special Squads' => 'Special Squads', 'Permanent Attachment' => 'Permanent Attachment', 'Training' => 'Training', 'Sports' => 'Sports', 'Available with BNs' => 'Available with BNs', 'Battalion Misc Duties' => 'Battalion Misc Duties', 'Institutions' => 'Institutions');
                        echo form_dropdown('Postingtiseto', $Postingtiset, set_value('Postingtiseto', (isset($_GET['Postingtiseto']) ? $_GET['Postingtiseto'] : '')), 'id="Postingtiset" data-placeholder="Choose One" title="Select Category of duty" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>

                    <div class="col-sm-2" id="apart1" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset = array('' => '--Nature/Place of Duty--', 'VP Guards' => 'VP Guards', 'Jails Security' => 'Jails Security', 'Punjab Police HQRS,SEC.9,CHG' =>  'Punjab Police HQRS,SEC.9,CHG', 'DERA BEAS SECURITY DUTY' => 'DERA BEAS SECURITY DUTY', 'OTHER STSTIC GUARDS' => 'OTHER STATIC GUARDS', 'Police Officer' => 'Police Officer', 'Retired Police Officer' => 'Retired Police Officer', 'Political Persons' => 'Political Persons', 'Civil Officers' => 'Civil Officers', 'Judicial Officers' => 'Judicial Officers', 'Threatening persons' => 'Threatening persons', 'PERSONAL SECURITY STAFF ARMED WING OFFICER' => 'PERSONAL SECURITY STAFF ARMED WING OFFICER', 'VIP SEC.WING CHG.U/82nd BN.' => 'VIP SEC.WING CHG.U/82nd BN.', 'POLICE SEC.WING CHG U/13th BN.' => 'POLICE SEC.WING CHG U/13th BN.', 'BANK SECURITY DUTY' => 'BANK SECURITY DUTY', 'SPECIAL PROTECTION UNIT (C.M. SEC.)' => 'SPECIAL PROTECTION UNIT (C.M. SEC.)', 'PB. BHAWAN NEW DELHI (SEC. DUTY)' => 'PB. BHAWAN NEW DELHI (SEC. DUTY)');
                        echo form_dropdown('Postingtiset', $Postingtiset, set_value('Postingtiset', (isset($_GET['Postingtiset'])) ? $_GET['Postingtiset'] : ''), 'id="Postingtiseto" data-placeholder="Choose One" title="Please select at least 1 value" class="select2 l"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>


                    <div class="col-sm-2" id="apart2" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset2 = array('' => '--Nature/Place of Duty--', 'PERMANENT DUTY' => 'PERMANENT DUTY', 'DGP, RESERVES' => 'DGP, RESERVES', 'TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY' => 'TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY');
                        echo form_dropdown('Postingtiset2', $Postingtiset2, set_value('Postingtiset2', (isset($_GET['Postingtiset2'])) ? $_GET['Postingtiset2'] : ''), 'id="Postingtise2" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>

                    <div class="col-sm-2" id="apart3" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset3 = array('' => '--Nature/Place of Duty--', 'ANTI RIOT POLICE, JALANDHAR' => 'ANTI RIOT POLICE, JALANDHAR', 'ANTI RIOT POLICE, MANSA' => 'ANTI RIOT POLICE, MANSA', 'ANTI RIOT POLICE, MUKATSAR' => 'ANTI RIOT POLICE, MUKATSAR', 'S.D.R.F. TEAM, JALANDHAR' => 'S.D.R.F. TEAM, JALANDHAR', 'SPL. STRIKING GROUPS' => 'SPL. STRIKING GROUPS', 'SWAT TEAM (4TH CDO)' => 'SWAT TEAM (4TH CDO)', 'SOG BHG.,PTL(SPECIAL OPS.GROUP)' => 'SOG BHG.,PTL(SPECIAL OPS.GROUP)', 'ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI', 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN MALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN MALE)', 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN FEMALE)', 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)', 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)', 'C.P.O. ATTACHMENT UNDER 13TH BN' => 'C.P.O. ATTACHMENT UNDER 13TH BN', 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG' => 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG');
                        echo form_dropdown('Postingtiset3', $Postingtiset3, set_value('Postingtiset3', (isset($_GET['Postingtiset3'])) ? $_GET['Postingtiset3'] : ''), 'id="Postingtise3" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>

                    <div class="col-sm-2" id="apart4" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset4 = array('' => '--Nature/Place of Duty--', 'ATTACHED WITH DISTT., MOHALI' => 'ATTACHED WITH DISTT., MOHALI', 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN MALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN MALE)', 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN FEMALE)' => 'ATTACHED WITH DISTT. POLICE (MARTYR???S KIN FEMALE)', 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS MALE)', 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)' => 'ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)', 'C.P.O. ATTACHMENT UNDER 13TH BN' => 'C.P.O. ATTACHMENT UNDER 13TH BN', 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG' => 'PB. POLICE OFFICER INSTITUTE SEC 32 CHG', 'NRI CELL MOHALI' => 'NRI CELL MOHALI', 'INTELLIGENCE WING' => 'INTELLIGENCE WING', 'CENTRAL POLICE LINE MOHALI' => 'CENTRAL POLICE LINE MOHALI', 'VIGILANCE BUREAU' => 'VIGILANCE BUREAU', 'STATE NARCOTIC CRIME BUREAU' => 'STATE NARCOTIC CRIME BUREAU', 'MOHALI AIRPORT IMMIGRATION DUTY' => 'MOHALI AIRPORT IMMIGRATION DUTY', 'STATE HUMAN RIGHTS COMMISSION' => 'STATE HUMAN RIGHTS COMMISSION', 'BUREAU OF INVESTIGATION' => 'BUREAU OF INVESTIGATION', 'SPECIAL TASK FORCE(STF)' => 'SPECIAL TASK FORCE(STF)', 'PPSSOC' => 'PPSSOC', 'RTC/PAP, JALANDHAR' => 'RTC/PAP, JALANDHAR', 'ISTC/PAP, KAPURTHALA' => 'ISTC/PAP, KAPURTHALA', 'POLICE COMMANDO TRG. CENTRE, BHG, PATIALA' => 'POLICE COMMANDO TRG. CENTRE, BHG, PATIALA', 'RTC LADDA KOTHI SANGRUR' => 'RTC LADDA KOTHI SANGRUR', 'PUNJAB POLICE ACADEMY PHILLAUR' => 'PUNJAB POLICE ACADEMY PHILLAUR', 'POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN' => 'POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN', 'AD GUARD CP JALL' => 'AD GUARD CP JALL', 'AD GUARD CP ASR' => 'AD GUARD CP ASR', 'AD GUARD DISTT MKT' => 'AD GUARD DISTT MKT', 'AD GUARD DISTT LDH' => 'AD GUARD DISTT LDH', 'AD GUARD DISTT BTL' => 'AD GUARD DISTT BTL');
                        echo form_dropdown('Postingtiset4', $Postingtiset4, set_value('Postingtiset4', (isset($_GET['Postingtiset4'])) ? $_GET['Postingtiset4'] : ''), 'id="Postingtise4" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>


                    <div class="col-sm-2" id="apart5" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset5 = array('' => '--Nature/Place of Duty--', 'BASIC TRANING' => 'BASIC TRANING', 'PROMOTIONAL COURSE' => 'PROMOTIONAL COURSE', 'DEPARTMENT COURSE' => 'DEPARTMENT COURSE');
                        echo form_dropdown('Postingtiset5', $Postingtiset5, set_value('Postingtiset5', (isset($_GET['Postingtiset5'])) ? $_GET['Postingtiset5'] : ''), 'id="Postingtise5" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>

                    <div class="col-sm-2" id="apart6" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset5 = array('' => '--Nature/Place of Duty--', 'DSO' => 'DSO', 'CSO, JALANDHAR' => 'CSO, JALANDHAR', 'NIS PATIALA' => 'NIS PATIALA', 'OTHERS' => 'OTHERS');
                        echo form_dropdown('Postingtiset6', $Postingtiset5, set_value('Postingtiset6', (isset($_GET['Postingtiset6'])) ? $_GET['Postingtiset6'] : ''), 'id="Postingtise6" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>

                    <div class="col-sm-2" id="apart7" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset5 = array('' => '--Nature/Place of Duty--', 'PAP CAMPUS  SECURITY' => 'PAP CAMPUS  SECURITY', 'BN. KOT GUARDS' => 'BN. KOT GUARDS', 'BN. HQRS OTHER GUARDS' => 'BN. HQRS OTHER GUARDS', 'STATIC GUARD CR' => 'STATIC GUARD CR', 'OFFICE STAFF IN HIGHER OFFICES' => 'OFFICE STAFF IN HIGHER OFFICES', 'Commandant office' => 'Commandant office', 'Asstt. Commandant office' => 'Asstt. Commandant office', 'Dy.S.P. office' => 'Dy.S.P. office', 'English Branch' => 'English Branch', 'Account Branch' => 'Account Branch', 'OSI Branch' => 'OSI Branch', 'Litigation Branch' => 'Litigation Branch', 'Steno Branch' => 'Steno Branch', 'GPF Branch' => 'GPF Branch', 'Computer Cell' => 'Computer Cell', 'Control Room' => 'Control Room', 'Reader to INSP' => 'Reader to INSP', 'CCTNS office' => 'CCTNS office', 'Nodal Officer' => 'Nodal Officer', 'Recruitment Cell' => 'Recruitment Cell', 'Photostate Machine operator' => 'Photostate Machine operator', 'TRADEMEN' => 'TRADEMEN', 'M.T. SECTION' => 'M.T. SECTION', 'Reserve Inspector' => 'Reserve Inspector', 'Line Officer' => 'Line Officer', 'BHM & A/BHM' => 'BHM & A/BHM', 'MHC & A/MHC' => 'MHC & A/MHC', 'Reader/Orderly to RI' => 'Reader/Orderly to RI', 'I/C MESS' => 'I/C MESS', 'Asst. I/C MESS' => 'Asst. I/C MESS', 'CDI' => 'CDI', 'CDO & A/CDO' => 'CDO & A/CDO', 'Quarter Master INSP' => 'Quarter Master INSP', 'MSK Branch' => 'MSK Branch', 'KHC' => 'KHC', 'Armourer & A/Armourer' => 'Armourer & A/Armourer', 'I/C Class-IV' => 'I/C Class-IV', 'Quarter Munshi & Asstt.' => 'Quarter Munshi & Asstt.', 'I/C Canteen & Grossary Shop' => 'I/C Canteen & Grossary Shop', 'CHC' => 'CHC', 'GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY' => 'GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY', 'TRG. RESERVE AT BN.HQRS.' => 'TRG. RESERVE AT BN.HQRS.', 'OTHER DUTIES' => 'OTHER DUTIES');
                        echo form_dropdown('Postingtiset7', $Postingtiset5, set_value('Postingtiset7', (isset($_GET['Postingtiset7'])) ? $_GET['Postingtiset7'] : ''), 'id="Postingtise7" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>

                    <div class="col-sm-2" id="apart8" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset8 = array('' => '--Nature/Place of Duty--', 'RECRUIT' => '->RECRUIT', 'Earned Leave' => '->EARNED LEAVE', 'Casual Leave' => '->CASUAL LEAVE', 'Paternity Leave'  => '->PATERNITY LEAVE', 'Medical Leave'  => '->MEDICAL LEAVE', 'Ex-India Leave' => '->EX-INDIA LEAVE', 'Others' => '->OTHERS', 'ABSENT' => '->ABSENT', 'UNDER SUSPENSION' => '->UNDER SUSPENSION', 'Handicapped on Medical Rest' => '->HANDICAPPED ON MEDICAL REST', 'Handicapped on light duty' => '->HANDICAPPED ON LIGHT DUTY', 'Chronic Disease on light duty' => '->CHRONIC DISEASE ON LIGHT DUTY', 'Chronic Disease on Medical Rest' => '->CHRONIC DISEASE ON MEDICAL REST', 'OSD ETC' => '->OSD ETC');
                        echo form_dropdown('Postingtiset8', $Postingtiset8, set_value('Postingtiset8', (isset($_GET['Postingtiset8'])) ? $_GET['Postingtiset8'] : ''), 'id="Postingtise8" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>
                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>


                    <div class="col-sm-2" id="apart9" style="display: none;"><br />
                      <div class="form-group">
                        <?php
                        $Postingtiset5 = array('' => '--Nature/Place of Duty--', 'PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL', 'ART GALLERY' => 'ART GALLERY', 'WIRELESS SECTION' => 'WIRELESS SECTION', 'DUPLEX' => 'DUPLEX', 'PAP HOSPITAL' => 'PAP HOSPITAL', 'GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL', 'GOLF CLUB' => 'GOLF CLUB', 'GOLF RANGE' => 'GOLF RANGE', 'GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS', 'MINI GOS MESS' => 'MINI GOS MESS', 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION', 'B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING', 'PIPE BAND' => 'PIPE BAND', 'BRASS BAND' => 'BRASS BAND', 'MOUNTED POLICE' => 'MOUNTED POLICE', 'RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP', 'BASE WORKSHOP' => 'BASE WORKSHOP', 'PAP GAS AGENCY' => 'PAP GAS AGENCY', 'TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK', 'GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS', 'COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE', 'PAP BOOK SHOP' => 'PAP BOOK SHOP', 'COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL', 'PAP WEBSITE' => 'PAP WEBSITE', 'COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL', 'PAPCOS' => 'PAPCOS', 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL', 'B.P. UNIT' => 'B.P. UNIT', 'BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF', 'R.P.STAFF' => 'R.P.STAFF', 'SPECIAL GUARD' => 'SPECIAL GUARD', 'CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE', 'CULTURAL TROUP' => 'CULTURAL TROUP', 'APNA DHABA' => 'APNA DHABA', 'SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR', 'SONA BATH' => 'SONA BATH', 'SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR', 'BAKERY' => 'BAKERY', 'TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW', 'PAP GYM. OLD' => 'PAP GYM. OLD', 'ACUPRESSURE' => 'ACUPRESSURE', 'SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP', 'INDOOR STADIUM' => 'INDOOR STADIUM', 'PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE', 'BUGGLER' => 'BUGGLER', 'T/A 7th Bn PAP for Driver Duty' => 'T/A 7th Bn PAP for Driver Duty', 'U/7th PAP for out Rider duty on Motor Cycle' => 'U/7th PAP for out Rider duty on Motor Cycle', 'M.T WORKSHOP U/7th BN PAP' => 'M.T WORKSHOP U/7th BN PAP', 'PAP House' => 'PAP House', 'Camp Cleaning U/7th BN.PAP' => 'Camp Cleaning U/7th BN.PAP', 'A/A Punjab State U/7th BN.PAP' =>  'A/A Punjab State U/7th BN.PAP', 'IRB Institutions' => 'IRB Institutions', 'CDO Institutions' => 'CDO Institutions', 'PAP Outer Bn Institutions' => 'PAP Outer Bn Institutions');
                        echo form_dropdown('Postingtiset9', $Postingtiset5, set_value('Postingtiset9', (isset($_GET['Postingtiset9'])) ? $_GET['Postingtiset9'] : ''), 'id="Postingtise9" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                        echo form_error('Postingtiset');
                        ?>

                        <label for="Postingtiset" class="error"></label>
                      </div>
                    </div>
                    <div class="col-sm-5 text-center align-middle" id="apart10"><br />
                    <label for="birthday_date_range">Select Date for Birthday:</label>
                    <div id="birthday_date_range" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <!--i class="glyphicon glyphicon-calendar"></i-->
                      <i class="glyphicon glyphicon-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      <?php echo form_input(['name' => 'birthday_date', 'id' => 'birthday_date', 'type' => 'hidden'], set_value('birthday_date')); ?>
                    </div>
                  </div>
                  <div class="col-sm-6 text-center align-middle" id="apart10"><br />
                    <button type="button" class="btn btn-primary" onClick="posting_manager.showModal('selected_posting_name2',{multiple:true})">
                      <span class="glyphicon glyphicon-plus" style="color:white;text-decoration:none;" ></span>
                      &nbsp;&nbsp;Select Posting
                    </button>
                    <span id="selected_posting_name2"><i>&nbsp;&nbsp;&nbsp;&nbsp;No Posting is Selected</i></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 text-center align-middle" id="apart10"><br />
                    <div class="form-group">
                      <input type="checkbox" name="advancedSearch" id="advancedSearch">
                      &nbsp;&nbsp;<label for="advancedSearch">Advanced Sorting</label><br/>
                      <input type="checkbox" name="not_set2" id="not_set2">
                      &nbsp;&nbsp;<label for="not_set2">Posting Not Set Employees</label><br/>
                      <input type="checkbox" name="not_set" id="not_set">
                      &nbsp;&nbsp;<label for="not_set">Download Not Set Posting Consolidate Info (in figures)</label>
                    </div>
                  </div>
                  <div class="col-sm-6"><br />
                    <button type="submit" class="btn btn-primary" onClick="osi_records.dataTable.draw();return false;">Submit</button>&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url('bt-osi-old'); ?>" class="btn btn-default">Reset</a>&nbsp;&nbsp;&nbsp;
                    <button name="download" value="download" class="btn btn-primary" onClick="downloadExcel()">Download Excel</button>
                  </div>

                </div>

                    <?php echo form_close(); ?>
                  </div>
                  <div class="panel-body">
                    <!-- Example split danger button -->
                    <h2>Total Entries: <?php echo $counts; ?></h2>
                    <div class="table-responsive">
                      <?php if (false) { ?>
                        <table class="table" id="table">
                          <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Posting</th>
                              <th>Edit Info</th>
                              <th>Delete</th>
                              <th>View All Info</th>
                              <th>Battalion/Unit</th>
                              <th>Name</th>
                              <th>Present Rank</th>
                              <th>Permanent Rank</th>
                              <th>Dept. No </th>
                              <th>District</th>
                              <th>Gender</th>
                              <th>Marital Status</th>
                              <th>Date of Birth</th>
                              <th>Date of Enlistment</th>
                              <th>Caste</th>
                              <th>Category</th>
                              <th>Phone1</th>
                              <th>Blood Group</th>
                              <th> Education/ Qualified</th>
                              <th>Computer literate</th>
                              <th>Qualified Courses</th>
                              <th>Courses Name</th>
                              <th>Date of Retirement</th>
                              <th>Extension Retirement Date</th>
                              <th>Bank AC No.</th>
                              <th>Height</th>
                              <th>GPF Pol No /PRAN No.</th>
                              <th>Good entries</th>
                              <th>Bad entries</th>
                              <th>Posting Details</th>
                              <th>Date of Posting</th>
                              <th>Firing Date</th>
                              <th>Firing Weapon</th>
                              <th>Fining Range</th>
                              <th>Add Posting</th>
                              <th>See History</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php $count = 0;
                            if ($weapon != '') {
                              foreach ($weapon as $value) : $count = $count + 1; ?>
                                <tr class="odd gradeX">
                                  <td><?php echo $count; ?></td>
                                  <td>

                                    <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Posting
                                        <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('bt-add-rank/' . $value->man_id); ?>" target="_blank"> <i class="fa fa-plus"></i> Add</a></li>
                                        <li><a href="<?php echo base_url('bt-edit-rank/' . $value->man_id); ?>" target="_blank"> <i class="fa fa-edit"></i> Edit</a></li>

                                        <li><a href="<?php echo base_url('bt-posdeleit'); ?>/<?php echo $value->man_id; ?>" onclick="return confirm('Are you sure you want to delete?');"> <i class="fa fa-minus"></i> Delete</a></li>

                                      </ul>
                                    </div>
                                  </td>

                                  <td>
                                    <a href="<?php echo base_url('bt-updates-manpower/' . $value->man_id); ?>" class="btn btn-success btn-xs" target="_blank"> <i class="fa fa-edit"></i> Edit Info</a>
                                  </td>

                                  <td>
                                    <a href="<?php echo base_url('bt-osidelete/' . $value->man_id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                  </td>

                                  <td>
                                    <a href="<?php echo base_url('bt-osiinfo/' . $value->man_id); ?>" class="btn btn-success btn-xs" target="_blank"> <i class="fa fa-eye"></i> View</a>
                                  </td>
                                  <td><?php if ($value->bunitdistrict == '' && false) {
                                        $bats = fetchoneinfo('users', array('users_id' => $value->bat_id));
                                        if (null != $bats) {
                                          echo $bats->nick;
                                        } else {
                                          echo 'Battalion not found';
                                        }
                                      } else {
                                        $value->bunitdistrict;
                                      }   ?></td>
                                  <td> <?php echo $value->name; ?></td>
                                  <td><?php echo $value->cexrank . $value->cminirank . $value->cmedirank . $value->ccprank . $value->cccrank; ?></td>
                                  <td><?php echo $value->permanent_rank; ?></td>
                                  <td><?php echo $value->depttno; ?></td>
                                  <td><?php echo $value->district; ?></td>
                                  <td><?php echo $value->gender; ?></td>
                                  <td><?php echo $value->maritalstatus; ?></td>
                                  <td><?php echo $value->dateofbith; ?></td>
                                  <td><?php echo $value->dateofinlitment; ?></td>
                                  <td><?php echo $value->caste; ?></td>
                                  <td><?php echo $value->category; ?></td>
                                  <td><?php echo $value->phono1; ?></td>
                                  <td><?php echo $value->bloodgroup; ?></td>
                                  <td><?php echo $value->eduqalification; ?> &nbsp; <?php echo $value->UnderGraduate . $value->Graduate . $value->PostGraduate . $value->Doctorate . $value->Doctorateother; ?></td>
                                  <td><?php echo $value->comlit; ?></td>
                                  <td><?php $ax = explode('@', $value->NamesofsCourses);
                                      /*if($ax[0] == '-' || $ax[0] == ''){

                          }else{
                            print_r($ax);
                            }*/
                                      echo count($ax);  ?></td>
                                  <td><?php echo $nm; ?></td>
                                  <td><?php echo $value->dateofretirment; ?></td>
                                  <td>-</td>

                                  <td><?php echo $value->bankacno; ?></td>
                                  <td><?php echo $value->feet . ' &nbsp;' . $value->inch . ''; ?></td>

                                  <td><?php echo $value->gpfpranno; ?> &nbsp; <?php echo $value->PRAN; ?></td>
                                  <td><?php echo $value->gd1; ?></td>
                                  <td><?php echo $value->bd1; ?></td>
                                  <?php if (!isset($value->posting_concat1) && false) { ?>
                                    <?php $pos = fetchoneinfodesc('newosip', array('man_id' => $value->man_id), 'man_id'); ?>

                                    <?php if ($pos != '') { ?>
                                      <td>1<?php echo $pos->fone1 . $pos->vploc . $pos->vpdis . $pos->fone2 . $pos->noj . $pos->jsdis . $pos->fone3 . $pos->fone3 . $pos->fone4 . $pos->fone5 . $pos->osgloc . $pos->osgdis . $pos->fone6 . $pos->fone7 . $pos->fone8 . $pos->fone9 . $pos->bsdnob . $pos->bsddis . $pos->bsdloc . $pos->fone10 . $pos->fone11 . $pos->fone12 . $pos->lone1 . $pos->perdupod . $pos->perdudis . $pos->perduorno . $pos->perduordate . $pos->lone2 . $pos->dgppod . $pos->dgpdis . $pos->dgporno . $pos->dgpordate . $pos->lone3 . $pos->tertdpod . $pos->tertddis . $pos->tertdorno . $pos->tertdordate . $pos->sqone1 . $pos->sqone2 . $pos->sqone3 . $pos->sqone4 . $pos->sqone5 . $pos->sstgpod . $pos->sstgdis . $pos->sstgorno . $pos->sstgordate . $pos->sqone6 . $pos->sqone6 . $pos->sqone7 . $pos->swatpod . $pos->swatdis . $pos->swatorno . $pos->swatordate . $pos->paone1 . $pos->paone2 . $pos->awdpmpod . $pos->awdpmorno . $pos->awdpmordate . $pos->paone3 . $pos->awdpfpod . $pos->awdpforno . $pos->awdpfordate . $pos->paone4 . $pos->awdpompod . $pos->awdpomorno . $pos->awdpomordate . $pos->paone5 . $pos->awdpofpod . $pos->awdpoforno . $pos->awdpofordate . $pos->paone6 . $pos->paone7 . $pos->paone8 . $pos->paone9 . $pos->paone10 . $pos->paone11 . $pos->paone12 . $pos->paone13 . $pos->paone14 . $pos->paone15 . $pos->paone16 . $pos->paone17 . $pos->paone18 . $pos->paone19 . $pos->paone20 . $pos->paone21 . $pos->paone22 . $pos->paone23 . $pos->paone24 . $pos->ssone23 . $pos->dsopod . $pos->dsoorno . $pos->dsoordate . $pos->ssone24 . $pos->csojalorno . $pos->csojalordate . $pos->ssone25 . $pos->mispatorno . $pos->mispatordate . $pos->ssone26 . $pos->othersnod . $pos->othersnodis . $pos->othersorno . $pos->othersordate . $pos->awbone1 . $pos->awbone2 . $pos->pssawonof . $pos->pssaworank . $pos->pssawoordate . $pos->awbone3 . $pos->osihonoo . $pos->awbone4 . $pos->Readerosinbo . $pos->Orderly . $pos->telopr . $pos->darrun . $pos->awbone5 . $pos->bnkgdop . $pos->awbone6 . $pos->bhogpog . $pos->bhogdop . $pos->awbone7 . $pos->tradestot . $pos->tradestt . $pos->tradesbat . $pos->tradesdop . $pos->tradesorno . $pos->awbone8 . $pos->mtsecpod . $pos->mtsecvehno . $pos->mtsecdop . $pos->mtsecorno . $pos->awbone9 . $pos->quartbradop . $pos->quartbraorno . $pos->awbone10 . $pos->awbone11 . $pos->awbone12 . $pos->awbone12 . $pos->recrutnorb . $pos->recrutorno . $pos->recrutordate . $pos->bmdone1 . $pos->bmdone2 . $pos->leavefrom . $pos->leaveto . $pos->bmdone3 . $pos->absentfrom . $pos->absentddr . $pos->absentdate . $pos->bmdone4 . $pos->usdos . $pos->usros . $pos->bmdone5 . $pos->bmdone6 . $pos->bmdone7 . $pos->bmdone8 . $pos->bmdone9 . $pos->bmdone10 . $pos->instone1 . $pos->instone2 . $pos->instone3 . $pos->instone4 . $pos->traning1 . $pos->traning2 . $pos->traning3 . $pos->btarin1 . $pos->btarin2 . $pos->btarin3 . $pos->btarin4 . $pos->btarin5 . $pos->btarin6 . $pos->btarin7 . $pos->btarin8 . $pos->btarin9 . $pos->btarin10 . $pos->cfpop . $pos->cfppd . $pos->cfpdop . $pos->cfpdop; ?></td>
                                      <td><?php echo $pos->dateofposting1; ?></td>
                                    <?php  } else { ?>
                                      <td></td>
                                      <td></td>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <td><?php echo $value->posting_concat1 . '<br>' . $value->officer_name; ?></td>
                                    <td><?php echo $value->dateofposting1; ?></td>
                                  <?php } ?>
                                </tr>
                            <?php endforeach;
                            } ?>
                          </tbody>
                        </table>
                      <?php } ?>
                      <table id="osi_data" class="table">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Posting</th>
                            <th>Edit</th>
                            <!--th>Delete</th-->
                            <th>View All Info</th>
                            <th>Battalion Unit</th>
                            <th>Name</th>

                            <th>Present Rank</th>
                            <th>Permanent Rank</th>
                            <th>Dept. No </th>
                            <th>Father name</th>
                            <th>Present Address</th>
                            <th>Permanent Address</th>
                            <th>Police Station</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Gender</th>
                            <th>Marital Status</th>
                            <th>Date of Birth</th>
                            <th>Date of Enlistment</th>
                            <th>Caste</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Blood Group</th>
                            <th> Education/ Qualified</th>
                            <th>Computer literate</th>
                            <th>Qualified Courses</th>
                            <th>Courses Name</th>
                            <th>Date of Retirement</th>
                            <!--th>Extension Retirement Date</th-->
                            <th>Bank AC No.</th>
                            <th>IFSC Code</th>
                            <th>Aadhar Number</th>
                            <th>PAN Card</th>
                            <th>HRMS Code</th>
                            <th>Height</th>
                            <th>GPF Pol No /PRAN No.</th>
                            <th>Good entries</th>
                            <th>Bad entries</th>
                            <th>Firing Weapon</th>
                            <th>Firing Date</th>
                            <th>Firing Range</th>
                            <th>Add Posting</th>
                            <th>See History</th>
                            <th>New Posting</th>
                            <th>New Posting Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div><!-- table-responsive -->
                    <?php //echo $links; 
                    ?>
                  </div><!-- panel-body -->
                </div><!-- panel -->
              </div><!-- col-sm-12 -->
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
  <!--script src="<?php //echo base_url(); 
                  ?>webroot/data/js/jquery.dataTables.min.js"></script-->
  <script src="<?php echo base_url(); ?>webroot/js/jquery.dataTables.min2015.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/moment.2.29.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/vfs_fonts.js"></script>
  </script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.colVis.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/pagination_plugin.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/bootstrap-datepicker3.min.js"></script>
  <script src="<?php echo base_url(); ?>webroot/js/datepicker/daterangepicker.js"></script>

  <script type="text/javascript">
    var selectedClasses = [];
    var posting_route = [];
    var selected_posting_id = null;
    var selected_employee_id = null;
    <?php
    if (null != $this->input->post('posting_list_name')) {
      $current_posting = $this->input->post('posting_list_name');
    } else {
      $current_posting = -1;
    }
    echo "var current_posting_ = $current_posting;";
    ?>
    var current_posting = {
      id: 1,
      name: 'Home'
    };
   

    /*function searchPosting() {

      /*$( "#posting_name_search" ).keyup(function(event) {
      	if (event.keyCode === 13) {*//*
      search_text = $('#posting_name_search').val();
      var recordsPerPage = pagination.recordsPerPage;
      var data = {
        'searchText': search_text,
        'recordsPerPage': pagination.recordsPerPage,
        'pageNumber': pagination.currentPageNumber,
        'includePosting': pagination.includePosting,
        'id': pagination.selectedPostingId,
        // 'id':current_posting.id
      };

      $.ajax({
        url: "<?php echo base_url(); ?>search-posting",
        type: "POST",
        data: data,
        success: function(response) {
          console.log(response);
          var obj = JSON.parse(response);
          console.log(obj['postings']);
          insertDataInPostingList2(obj['postings']);
          pagination.totalRecords = obj['total_postings'];
          pagination.totalFilteredRecords = obj['total_filtered_postings'];

          pagination.paginate();
        }
      });

      //alert( search_text + "Enter button presed." );
    }*/



    <?php if (null != $this->input->get('classes')) {
    ?>selectedClasses = JSON.parse('<?php echo json_encode($this->input->get('classes')); ?>');
    <?php
    } ?>

    jQuery(document).ready(function() {
      "use strict";
      jQuery("select").select2({
          width: "100%"
        }),
        jQuery("select").removeClass("form-control"),
        jQuery('#DateofRetirementdor').datepicker({
          format: "yyyy-mm-dd"
        });
      jQuery('#ircd').datepicker({
        format: "dd/mm/yyyy"
      });
      jQuery('#id').datepicker({
        format: "dd/mm/yyyy"
      });
      jQuery('#ircdi').datepicker({
        format: "dd/mm/yyyy"
      });
      jQuery('#idi').datepicker({
        format: "dd/mm/yyyy"
      });
      jQuery('#dateofesnlistment1').datepicker({
        format: "yyyy-mm-dd"
      });
      jQuery('#edateofesnlistment1').datepicker({
        format: "yyyy-mm-dd"
      });


      jQuery('#dateofbirth').datepicker({
        format: "yyyy-mm-dd"
      });
      jQuery('#dateofbirthi').datepicker({
        format: "yyyy-mm-dd"
      });
      //Posting related search
      jQuery('#rcnum').select2({
        'width': '100%',
        multiple: true,
        allowClear: true,
        ajax: {
          url: 'postings/getbeltnumbers',
          dataType: 'json',
          data: function(params, page) {
            var query = {
              term: params,
              type: 'public',
              page: page,
            }
            return query;
          },
          results: function(data, page) {
            return {
              results: data.results,
              more: data.more
            }
          },
          change:function(data){
            console.log(data);
          }
          // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        },
      });

      
      var courses = $('#stts').val();
      if (courses != null) {
        // console.log(courses);
        for (var i = 0; i < courses.length; i++) {

          switch (courses[i]) {
            case 'Graduate':
              $.each(Graduate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
            case 'Under Graduate':
              $.each(UnderGraduate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
            case 'Post Graduate':
              $.each(PostGraduate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
            case 'Doctorate':
              $.each(Doctorate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
          }
        }
      }

      $('#classes').val(selectedClasses).trigger('change');
      /*for(var i=0;i<selectedClasses.length;i++){ 
        console.log('hi');
        $('#classes').val(selectedClasses[i]).trigger('change'); 
      } */

      <?php
      $rankrankre_ = '';
      if (null != $this->input->get('RankRankre')) {
        $rankrankre_ = $this->input->get('RankRankre');
      }
      ?>
      var rankrankre = '<?php echo $rankrankre_; ?>';

      switch (rankrankre) {
        case 'Executive Staff':
          $('#eors1').show();
          $('#eors2').hide();
          $('#eors3').hide();
          $('#eors4').hide();
          $('#eors5').hide();
          break;
        case 'Medical Staff':
          $('#eors3').show();
          $('#eors1').hide();
          $('#eors2').hide();
          $('#eors4').hide();
          $('#eors5').hide();
          break;
        case 'Ministerial Staff':
          $('#eors3').hide();
          $('#eors1').hide();
          $('#eors2').show();
          $('#eors4').hide();
          $('#eors5').hide();
          break;
        case 'Class-IV (P)':
          $('#eors3').hide();
          $('#eors1').hide();
          $('#eors2').hide();
          $('#eors4').show();
          $('#eors5').hide();
          break;
        case 'Class-IV (C)':
          $('#eors3').hide();
          $('#eors1').hide();
          $('#eors2').hide();
          $('#eors4').hide();
          $('#eors5').show();
          break;
        default:
          $('#eors1').show();
          $('#eors2').hide();
          $('#eors3').hide();
          $('#eors4').hide();
          $('#eors5').hide();
          break;

      }

    });
    //Posting related function
    function searchPostingObselete() {
      /*$( "#posting_name_search" ).keyup(function(event) {
      	if (event.keyCode === 13) {*/
      search_text = $('#posting_name_search').val();
      var id = current_posting.id;
      var data = {
        'searchText': search_text,

      };

      $.ajax({
        url: "<?php echo base_url(); ?>search-posting",
        type: "POST",
        data: data,
        success: function(response) {
          console.log(response);
          var obj = JSON.parse(response);
          console.log(obj['postings']);
          insertDataInPostingList2(obj['postings']);
        }
      });

      //alert( search_text + "Enter button presed." );
    }
    var res_err = null;
    var a = null;

    function updateEmployeePosting() {
      var posting_id = posting_manager.selected_posting_id;
      var additional_posting_id = $('select#additional_posting_info').val();
      var employee_id = selected_employee_id;
      var order_no = $('#order_number').val();
      var posting_date = $('#posting_date').val();
      var order_date = $('#order_date').val();
      var leave_date_from = $('#leave_from_date').val();
      var leave_date_to = $('#leave_to_date').val();
      var type = '';

      var data = {
        'posting_id': posting_id,
        'employee_id': employee_id,
        'order_no': order_no,
        'order_date': order_date,
        'posting_date': posting_date,
        'leave_date_from': leave_date_from,
        'leave_date_to': leave_date_to,
        'type': posting_manager.leave.type,
        'additional_posting_id': additional_posting_id
      };
      $.ajax({
        url: "<?php echo base_url(); ?>battalion/ajax-update-employee-posting",
        type: "POST",
        data: data,
        dataType: "json",
        async: false,
        success: function(response) {
          clearAddPostingErrors();
          clearAddLeaveErrors();
          console.log(response);
          console.log(response.errors);
          res_err = response;

          //console.log(obj['postings']);
          //insertDataInPostingList2(obj['postings']);
          //close the modal
          //if(response.errors.length>0){
          var error_indexes = ['failedMessage', 'error_posting_id', 'error_order_no', 'error_order_date', 'error_leave_date_from', 'error_leave_date_to', 'error_posting_date', 'error_leave_date'];
          jQuery.each(error_indexes, function(index, value) {
            $('#' + index).html('');
          });
          jQuery.each(response.errors, function(index, value) {
            console.log(value);
            $('#' + index).html(value);
          });
          //}
          if (response.status == true) {
            $('#showPostingModal').modal('hide');
            showSuccessMessage(response.message);
            $('#preloader').show();
            osi_records.dataTable.draw();
            $('#preloader').hide();
            load_the_postings_in_posting_lists2(1, 'HOME');
            pop_postings(posting_route.length - 2);
            writeBreadCums();
            $('#selectedPostingName').html('[<i>Posting not selected</i>]');
            selected_posting_id = null;
            $('#order_number').val('');
            $('#order_date').val('');
          } else {
            $('#failedMessage').html(response.message);
          }
        }
      })
    }

    function markLeave() {
      var posting_id = selected_posting_id;
      var employee_id = selected_employee_id;
      var leave_date_from = $('#leave_from_date').val();
      var leave_date_to = $('#leave_to_date').val();
      var posting_date = $('#posting_date').val();
      var data = {
        'posting_id': posting_id,
        'employee_id': employee_id,
        'leave_date_from': leave_date_from,
        'leave_date_to': leave_date_to,
        'leave_date': posting_date
      };
      $.ajax({
        url: "<?php echo base_url(); ?>battalion/ajax-update-employee-leave",
        type: "POST",
        data: data,
        dataType: "json",
        async: false,
        success: function(response) {
          clearAddLeaveErrors();
          console.log(response);
          console.log(response.errors);
          res_err = response;

          //console.log(obj['postings']);
          //insertDataInPostingList2(obj['postings']);
          //close the modal
          //if(response.errors.length>0){
          jQuery.each(response.errors, function(index, value) {
            console.log(value);
            $('#' + index).html(value);
          });
          //}
          if (response.status == true) {
            $('#showPostingModal').modal('hide');
            showSuccessMessage(response.message);
            $('#preloader').show();
            osi_records.dataTable.draw();
            $('#preloader').hide();
            load_the_postings_in_posting_lists2(1, 'HOME');
            pop_postings(posting_route.length - 2);
            writeBreadCums();
            $('#selectedPostingName').html('[<i>Posting not selected</i>]');
            selected_posting_id = null;
            $('#order_number').val('');
            $('#order_date').val('');
          } else {
            $('#failedMessage').html(response.message);
          }
        }
      })
    }

    function clearAddLeaveErrors() {
      var fields = ['error_posting_id', 'error_order_no', 'error_posting_date'];
      $.each(fields, function(index, value) {
        $('#' + value).html('');
      });
    }

    function clearAddPostingErrors() {
      var fields = ['error_posting_id', 'error_order_no', 'error_posting_date'];
      $.each(fields, function(index, value) {
        $('#' + value).html('');
      });
    }
    var detailRows = [];
    <?php
    if (null != $this->input->post('selectedEmployeesIds')) {
    ?>
      var selectedPolicePersonnel = JSON.parse('<?php echo json_encode(explode(',', $this->input->post('selectedEmployeesIds'))); ?>');
    <?php
    } else {
    ?>
      var selectedPolicePersonnel = [];
    <?php
    }
    ?>
    //POSTING FUNCTION START
    /*function selectParentDuty() {
      getThePostings();
    }

    function selectParentDuty2() {
      $('#exampleModal2').modal('toggle');
    }*/
    $(document).ready(function() {
      //selectParentDuty2();
    });

    function getThePostings() {
      $.ajax({
        url: "<?php echo base_url() . 'get-the-postings'; ?>",
        success: function(response) {
          obj = JSON.parse(response);
          insertDataInList(obj);
        }
      });
    }

    /*function load_the_postings_in_posting_lists2(selectedPostingId, posting_name) {
      pagination.selectedPostingId = selectedPostingId;
      pagination.currentPostingName = 'Postings under ' + posting_name;
      current_posting_id = selectedPostingId;
      current_posting = {
        id: selectedPostingId,
        name: posting_name
      };
      posting_route.push(current_posting);
      var data = {
        id: selectedPostingId
      };
      $.ajax({
        type: "POST",
        url: "<?php echo base_url() . 'get-sub-postings-employee-list'; ?>",
        data: data,
        success: function(response) {
          console.log(response);
          //obj = JSON.parse(response);
          obj = JSON.parse(response);
          console.log(obj);
          $('#backButton').attr('onClick', 'load_the_postings_in_posting_lists2(' + obj['posting_detail'][0].parent_posting_id + ',"' + obj['posting_detail'][0].name + '"),pop_posting_route()');
          insertDataInPostingList2(obj['subpostings']);
        }
      });
    }

    function pop_posting_route() {
      posting_route.pop();
      posting_route.pop();
    }

    function pop_postings(i) {
      posting_route.pop();
      for (var j = 0; j < i; j++) {
        posting_route.pop();
      }
    }

    function writeBreadCums() {
      console.log('Writing bread Cums');
      $('#breadCum').empty();
      var j = posting_route.length;
      var i = 0;
      $('#breadCrumb>ol').empty();
      $('#breadCrumb>ol').append($('<li>')
        .attr('class', 'breadcrumb-item')
        .attr('id', 'breadCum0')
        //.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
        .attr('onClick', 'load_the_postings_in_posting_lists2(0,""),pop_postings(' + (j + 1) + ')')
        .append($('<a>')
          //.attr('href','')
          .append('/')
        )
      );
      $.each(posting_route, function(key, value_) {
        //console.log(key);
        j--;
        //console.log(value_);
        $('#breadCrumb>ol').append($('<li>')
          .attr('class', 'breadcrumb-item')
          .attr('id', 'breadCum' + value_.id)
          //.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
          .attr('onClick', 'load_the_postings_in_posting_lists2(' + value_.id + ',"' + value_.name + '"),pop_postings(' + j + ')')
          .append($('<a>')
            //.attr('href','')
            .append(value_.name)
          )
        );
      });
    }*/

    /*function insertDataInPostingList2(obj) {
      //console.log(obj);
      $('#posting_lists_ ul').empty();

      for (var i = 0; i < obj.length; i++) {
        var radio_ = $('<input>')
          .attr('type', 'radio')
          .attr('id', 'nestedListname' + obj[i].id)
          .attr('name', 'posting_list_name')
          .attr('onClick', 'setPostingNameOnPage("' + obj[i].link_ + '",' + obj[i].id + ')')
          .attr('value', obj[i].id);
        if (current_posting_ == obj[i].id) {
          radio_.attr('checked', true);
          //setPostingNameOnPage(obj[i].link_,obj[i].id);
        }
        var add_ = $('<span>')
          .attr('onClick', 'addSubposting(' + obj[i].id + ')')
          .attr('style', 'cursor:pointer;')
          .append('&nbsp;&nbsp;+');
        //console.log(obj[i]);

        var list = $('<li>').attr('id', 'nestedList' + obj[i].id).attr('style', 'height:100%');
        if (obj[i].haveChilds !== true) {

          var label_ = $('<label>')
            .attr('for', 'nestedListname' + obj[i].id)
            //.attr('onClick','setPostingNameOnPage("'+obj[i].link_+'",'+obj[i].id+')')
            .append('&nbsp;&nbsp;' + obj[i].name);
          //  list.attr('onClick','setPostingNameOnPage("'+obj[i].link_+'",'+obj[i].id+')');
          list.append(radio_);
          list.append(label_);
        } else {

          var label_ = $('<label>')
            .attr('for', 'nestedListname' + obj[i].id)
            //.attr('onClick','load_the_postings_in_posting_lists2('+obj[i].id+',"'+obj[i].link_+'")')
            .append('&nbsp;&nbsp;' + obj[i].name);
          list.append('&nbsp;&nbsp;&nbsp;&nbsp;');
          list.attr('onClick', 'load_the_postings_in_posting_lists2(' + obj[i].id + ',"' + obj[i].link_ + '")');
          list.append(label_);
        }
        $('#posting_lists_ ul#posting_list_ul').append(list);
        writeBreadCums();
      }
    }*/
    /*var leave = {
      type: 'POSTING'
    };
    leave.leave_posting_ids = <?php echo json_encode(array_keys($leaves)); ?>;

    leave.setToLeaveForm = function() {
      $('#order_number_div').hide();
      $('#order_date_id').hide();
      $('#leave_from_date_div').css('display', 'inline');
      $('#leave_to_date_div').css('display', 'inline');
      $('#posting_date').attr('placeholder', 'Leave Date');
      //$('#addPostingButton').attr('onClick','markLeave()');
      $('#addPostingButton').text('Mark Leave');
    }
    leave.setToPostingForm = function() {
      $('#order_number_div').show();
      $('#order_date_id').show();
      $('#leave_from_date_div').css('display', 'none');
      $('#leave_to_date_div').css('display', 'none');
      $('#posting_date').attr('placeholder', 'Posting Date');
      //$('#addPostingButton').attr('onClick','updateEmployeePosting()');
      $('#addPostingButton').text('Add Posting');
    }*/

    /*function setPostingNameOnPage(posting_name, posting_id) {
      selected_posting_id = posting_id;

      $('#selected_posting_name').html('&nbsp;&nbsp;&nbsp;&nbsp;Selected Posting is : [<i>' + posting_name + '</i>]')
      if ($.inArray(selected_posting_id, leave.leave_posting_ids) != -1) {
        leave.setToLeaveForm();
        leave.type = 'LEAVE'
      } else {
        leave.setToPostingForm();
        leave.type = 'POSTING';
      }
      getAdditionalPostingInfo();
    }*/

    /*function insertDataInList(obj) {
      //console.log(obj);
      $("#posting_lists_ ul").empty();
      for (var i = 0; i < obj.length; i++) {
        console.log(obj[i]);
        $('#posting_lists_ ul').append($('<li>')
          .attr('id', 'nestedList' + obj[i].id)
          .append($('<input>')
            .attr('type', 'radio')
            .attr('id', 'nestedListname' + obj[i].id)
            .attr('name', 'posting_list_name')
          ).append($('<label>')
            .attr('for', 'nestedListname' + obj[i].id)
            .append('&nbsp;&nbsp;' + obj[i].name)
          ).append($('<span>')
            .attr('onClick', 'addSubposting(' + obj[i].id + ')')
            .attr('style', 'cursor:pointer;')
            .append('&nbsp;&nbsp;+')
          )
        );

      }
      $('#exampleModal').modal('toggle');
    }*/

    /*function addSubposting(id) {
      //alert('adding posting');
      //console.log('adding posting');
      //get the postings by using ajax
      //
      var data = {
        'id': id
      }
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/get-sub-postings",
        data: data,
        success: function(html) {
          //alert('hi');
          //console.log(html);
          var obj = JSON.parse(html);
          var posting_id = 5;
          for (var i = 0; i < obj.length; i++) {
            //console.log(i);
            var posting_name = obj[i].name;
            var radio = $('<input>')
              .attr('type', 'radio')
              .attr('id', 'nestedListname' + obj[i].id)
              .attr('name', 'posting_list_name')
              .attr('value', obj[i].id);
            var label = $('<label>')
              .attr('for', 'nestedListname' + obj[i].id)
              .append(posting_name);
            var span = $('<span>')
              .attr('onClick', 'addSubposting(' + obj[i].id + ')')
              .attr('style', 'cursor:pointer;')
              .append('&nbsp;&nbsp;+');
            $('#nestedList' + id)
              .append($('<ul>')
                .attr('style', 'list-style-type:none;')
                .append($('<li>')
                  .attr('id', 'nestedList' + obj[i].id)
                  .append(radio)
                  .append(label)
                  .append(span)
                ));
            //console.log(i);			
          }
          $('#postingBackButton').attr('onClick', 'getSubPostings(' + html + '),pop_postings()');
        }
      });
    }*/
    //POSTING FUNCTION END
    $("#postate").change(function() {
      var state_ = $("#postate").val();
      console.log(state_);
      //var dataStrings = 'state=' + state;
      var dataStrings = {state:state_};
      console.log(dataStrings);
      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>getDistrictsAjax",
        data: dataStrings,
        dataType:'json',
        success: function(districts) {  
          console.log(districts);
          var id = 'dis';
          $('#'+id).empty();
          //var newOption = new Option("--Select District--", '');
          //$('#'+id).append(newOption);
          $.each(districts,function(k,val){
            var newOption = new Option(val, val, false, false);
            $('#'+id).append(newOption);
          });
          $('#'+id).trigger('change');
        }

      });

    });
    var object;
    /* $(document).on('change', '#classes', function() {
      console.log('changing-------------');
      selectedClasses=[];
      selectedClasses.length = 0;
      $.each(this, function(key,option) {
        if(option.selected){
          console.log(this.value);
          selectedClasses.push(this.value);
        }
      });
    }); */
    $(document).on('change', '#stts', function() {
      //$('#classes').empty();
      $.each(this, function(key, option) {
        if (option.selected) {

          //console.log(key+ ' ' + option.value + ' '+ option.innerHTML); 
          switch (this.value) {
            case 'Graduate':
              $.each(Graduate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
            case 'Under Graduate':
              $.each(UnderGraduate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
            case 'Post Graduate':
              $.each(PostGraduate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
            case 'Doctorate':
              $.each(Doctorate, function(key, value) {
                var newOption = new Option(key, value, false, false);
                $('#classes').append(newOption).trigger('change');
              });
              break;
          }
        }
        //var newOption = new Option(key, value, false, false);
        //$('#classes').append(newOption).trigger('change');
      });
      $('#classes').val(selectedClasses).trigger('change');
      //alert(this.value);
      //add a value
      /*this.each(function(key,value) {
    alert(key+' '+value.val());
  });*/
      //$('#classes').empty();
      //get teh selected courses
      //get the courses under the selected courses
      //add them to the field

      /*$.each(UnderGraduate, function(key,value) {
        var newOption = new Option(key, value, false, false);
        $('#classes').append(newOption).trigger('change');
      });*/
      /* - --------------- Old Code ------------------
      if(this.value == 'Under Graduate'){
         $('#ugb').show();
         $('#gb').hide();
         $('#pgb').hide();
         $('#docb').hide();
       }else if(this.value == 'Graduate'){
        $('#gb').show();
         $('#pgb').hide();
         $('#docb').hide();
         $('#ugb').hide();
       }else if(this.value == 'Post Graduate'){
        $('#pgb').show();
        $('#docb').hide();
         $('#ugb').hide();
         $('#gb').hide();
       }else if(this.value == 'Doctorate'){
        $('#docb').show();
        $('#ugb').hide();
         $('#gb').hide();
         $('#pgb').hide();
       }else if(this.value == 'Other'){
        $('#docOther1').show();
        $('#ugb').hide();
         $('#gb').hide();
         $('#pgb').hide();
       }else{
          $('#docb').hide();
        $('#ugb').hide();
         $('#gb').hide();
         $('#pgb').hide();
       }
       /* - --------------- Old Code ------------------*/
    });



    $(document).on('change', '#RankRankre', function() {
      if (this.value == 'Executive Staff') {
        $('#eors1').show();
        $('#eors2').hide();
        $('#eors3').hide();
        $('#eors4').hide();
        $('#eors5').hide();
      } else if (this.value == 'Medical Staff') {
        $('#eors3').show();
        $('#eors1').hide();
        $('#eors2').hide();
        $('#eors4').hide();
        $('#eors5').hide();
      } else if (this.value == 'Ministerial Staff') {
        $('#eors3').hide();
        $('#eors1').hide();
        $('#eors2').show();
        $('#eors4').hide();
        $('#eors5').hide();
      } else if (this.value == 'Class-IV (P)') {
        $('#eors3').hide();
        $('#eors1').hide();
        $('#eors2').hide();
        $('#eors4').show();
        $('#eors5').hide();
      } else if (this.value == 'Class-IV (C)') {
        $('#eors3').hide();
        $('#eors1').hide();
        $('#eors2').hide();
        $('#eors4').hide();
        $('#eors5').show();
      } else {
        $('#eors1').show();
        $('#eors2').hide();
        $('#eors3').hide();
        $('#eors4').hide();
        $('#eors5').hide();
      }

    });

    $(document).on('change', '#catcouses', function() {
      if (this.value == 'Special Dept. Courses') {
        $('#NamesofsCourses12').show();
        $('#NamesofsCourses22').hide();
      } else if (this.value == 'Other Prof. Courses') {
        $('#NamesofsCourses22').show();
        $('#NamesofsCourses12').hide();
      } else {
        $('#NamesofsCourses22').hide();
        $('#NamesofsCourses12').hide();
      }

    });
    $(document).ready(function() {
      var val = $('#Postingtiset').val();
      switch (val) {
        case 'Fix Duties':
          $('#apart1').show();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart9').hide();
          break;
        case 'Law & Order Duty':
          $('#apart2').show();
          $('#apart1').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart9').hide();
          break;
        case 'Special Squads':
          $('#apart3').show();
          $('#apart2').hide();
          $('#apart1').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart9').hide();
          break;
        case 'Permanent Attachment':
          $('#apart4').show();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart1').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart9').hide();
          break;
        case 'Training':
          $('#apart5').show();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart1').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart9').hide();
          break;
        case 'Sports':
          $('#apart6').show();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart1').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart9').hide();
          break;
        case 'Available with BNs':
          $('#apart7').show();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart1').hide();
          $('#apart8').hide();
          $('#apart9').hide();
          break;
        case 'Battalion Misc Duties':
          $('#apart8').show();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart1').hide();
          $('#apart9').hide();
          break;
        case 'Institutions':
          $('#apart9').show();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart1').hide();
          break;
        default:
          $('#apart9').hide();
          $('#apart2').hide();
          $('#apart3').hide();
          $('#apart4').hide();
          $('#apart5').hide();
          $('#apart6').hide();
          $('#apart7').hide();
          $('#apart8').hide();
          $('#apart1').hide();
      }

    });
    $(document).on('change', '#Postingtiset', function() {
      if (this.value == 'Fix Duties') {
        $('#apart1').show();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart9').hide();
      } else if (this.value == 'Law & Order Duty') {
        $('#apart2').show();
        $('#apart1').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart9').hide();
      } else if (this.value == 'Special Squads') {
        $('#apart3').show();
        $('#apart2').hide();
        $('#apart1').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart9').hide();
      } else if (this.value == 'Permanent Attachment') {
        $('#apart4').show();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart1').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart9').hide();
      } else if (this.value == 'Training') {
        $('#apart5').show();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart1').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart9').hide();
      } else if (this.value == 'Sports') {
        $('#apart6').show();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart1').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart9').hide();
      } else if (this.value == 'Available with BNs') {
        $('#apart7').show();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart1').hide();
        $('#apart8').hide();
        $('#apart9').hide();
      } else if (this.value == 'Battalion Misc Duties') {
        $('#apart8').show();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart1').hide();
        $('#apart9').hide();
      } else if (this.value == 'Institutions') {
        $('#apart9').show();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart1').hide();
      } else {
        $('#apart9').hide();
        $('#apart2').hide();
        $('#apart3').hide();
        $('#apart4').hide();
        $('#apart5').hide();
        $('#apart6').hide();
        $('#apart7').hide();
        $('#apart8').hide();
        $('#apart1').hide();
      }

    });
    var osi_records = {};
    osi_records.mobno = $('#mobno').val();

    osi_records.dataTable = '';

    function initializeOsiData() {
      osi_records.dataTable = $('#osi_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        bFilter: false,
        "ajax": {
          url: "<?php echo base_url() . 'ajax-osi-users-data'; ?>",
          type: "POST",
          "data": function(data) {
            data.ito = $('#ito').val(),
              data.mobno = $('#mobno').val(),
              data.name = $('#name').val(),
              data.bloodgroup = $('#bloodgroup').val(),
              data.rcnum = $('#rcnum').val(),
              data.RankRankre = $('#RankRankre').val(),
              data.eor1 = $('#eor1').val(),
              data.eor2 = $('#eor2').val(),
              data.eor3 = $('#eor3').val(),
              data.eor4 = $('#eor4').val(),
              data.eor5 = $('#eor5').val(),
              data.postate = $('#postate').val(),
              data.pcity = $('#dis').val(),
              data.stts = $('#stts').val(),
              data.classes = $('#classes').val(),
              data.UnderGraduate = $('#ug').val(),
              data.Graduate = $('#Graduate').val(),
              data.PostGraduate = $('#PostGraduate').val(),
              data.Doctorate = $('#doc').val(),
              data.gender = $('#gender').val(),
              data.single = $('#single').val(),
              data.Modemdr = $('#Modemdr').val(),
              data.Rankre = $('#Rankre').val(),
              data.Enlistmentec = $('#Enlistmentec').val(),
              data.InductionModeim = $('#InductionModeim').val(),
              data.clit = $('#clit').val(),
              data.EnlistmentUnit = $('#').val(),
              data.dateofesnlistment1 = $('#dateofesnlistment1').val(),
              data.dateofesnlistment2 = $('#edateofesnlistment1').val(),
              data.NamesofsCourses1 = $('#NamesofsCourses').val(),
              data.NamesofsCourses2 = $('#NamesofsCourses2').val(),
              data.DateofRetirementdor = $('#DateofRetirementdor').val(),
              data.dateofbirth = $('#dateofbirth').val(),
              data.dateofbirthi = $('#dateofbirthi').val(),
              data.height = $('#height').val(),
              data.inch = $('#inch').val(),
              data.PostingSetToBeUsed = $('#Postingtiset').val(),
              data.Postingtiset = $('#Postingtiseto').val(),
              data.Postingtiset2 = $('#Postingtise2').val(),
              data.Postingtiset3 = $('#Postingtise3').val(),
              data.Postingtiset4 = $('#Postingtise4').val(),
              data.Postingtiset5 = $('#Postingtise5').val(),
              data.Postingtiset6 = $('#Postingtise6').val(),
              data.Postingtiset7 = $('#Postingtise7').val(),
              data.Postingtiset8 = $('#Postingtise8').val(),
              data.Postingtiset9 = $('#Postingtise9').val(),
              data.advancedSearch = $('#advancedSearch').is(':checked'),
              data.training_institutes = $('#training_institutes_1').val(),
              data.courses = $('#courses').val(),
              data.birthday_date = $('#birthday_date').val(),
              data.selected_posting_id = selected_posting_id,
              data.selected_posting_ids = posting_manager.selected_posting_ids,
              
              data.not_set2 = ($("#not_set2").attr('checked') === 'checked') ? true : false
          },
        },
        "columns": [{
            "data": "sno"
          },
          {
            "data": "posting"
          },
          {
            "data": "edit"
          },
          //{ "data": "delete"},
          {
            "data": "view"
          },
          {
            "data": "battalion_unit"
          },
          {
            "data": "name"
          },
          {
            "data": "present_rank"
          },
          {
            "data": "permanent_rank"
          },
          {
            "data": "depttno"
          },
          {
            "data": "fathername"
          },
          {
            "data": "present_address"
          },
          {
            "data": "permanent_address"
          },
          {
            "data": "police_station"
          },
          {
            "data": "district"
          },
          {
            "data": "state"
          },
          {
            "data": "gender"
          },
          {
            "data": "maritalstatus"
          },
          {
            "data": "dateofbith"
          },

          {
            "data": "dateofinlitment"
          },
          {
            "data": "caste"
          },
          {
            "data": "category"
          },
          {
            "data": "mobile"
          },
          {
            "data": "bloodgroup"
          },
          {
            "data": "eduqalification"
          },
          {
            "data": "comlit"
          },
          {
            "data": "NamesofCourses"
          },
          {
            "data": "nm"
          },
          {
            "data": "dateofretirement"
          },
          //{ "data": "dateofretirement2"},
          {
            "data": "bankacno"
          },
          {
            "data": "ifsc_code"
          },
          {
            "data": "adharno"
          },
          {
            "data": "pan_card"
          },
          {
            "data": "hrms_code"
          },
          {
            "data": "height"
          },
          {
            "data": "gpfpranno"
          },
          {
            "data": "gd1"
          },
          {
            "data": "bd1"
          },
          {
            "data": "firing_weapon"
          },
          {
            "data": "firing_date"
          },
          {
            "data": "firing_range"
          },


          {
            "data": "addPosting"
          },
          {
            "data": "seeHistory"
          },
          {
            "data": "new_posting"
          },
          {
            "data": "date_of_posting"
          },
        ],
        "columnDefs": [{
            "targets": [0, 2],
            "orderable": false,
          },
          {
            "targets": [1, 2],
            "className": "text-right",
          },
        ],
        "initComplete": function(settings, json) {
          //console.log(settings);
          //console.log(json.query);
        },
        scrollY: 350,
        scrollX: 800
      });

    };

    $(document).ready(function() {
      initializeOsiData();
      var table = $('#table').DataTable({
        // dom: 'C<"clear">Bfrtip',

        /*buttons: [
             {
                extend: 'excel',
                 exportOptions: {
                     columns: ':visible'
                 }
             },{
                extend: 'print',
                 exportOptions: {
                     columns: ':visible'
                 }
             },{
                extend: 'csv',
                 exportOptions: {
                     columns: ':visible'
                 }
             },{
                extend: 'copy',
                 exportOptions: {
                     columns: ':visible'
                 }
             }
         ],
         colVis: {
             exclude: [ 0 ]
         },*/
        scrollY: 350,
        scrollX: 800
      });


    });

    function downloadExcel() {
      $('#preloader').css('display', 'inline');

      $.ajax({
        url: "<?php echo base_url(); ?>ajax-osi-user-download-excel",
        method: "POST",
        data: {
          ito: $('#ito').val(),
          mobno: $('#mobno').val(),
          name: $('#name').val(),
          bloodgroup: $('#bloodgroup').val(),
          rcnum: $('#rcnum').val(),
          RankRankre: $('#RankRankre').val(),
          eor1: $('#eor1').val(),
          eor2: $('#eor2').val(),
          eor3: $('#eor3').val(),
          eor4: $('#eor4').val(),
          eor5: $('#eor5').val(),
          postate: $('#postate').val(),
          pcity: $('#dis').val(),
          stts: $('#stts').val(),
          classes: $('#classes').val(),
          UnderGraduate: $('#ug').val(),
          Graduate: $('#Graduate').val(),
          PostGraduate: $('#PostGraduate').val(),
          Doctorate: $('#doc').val(),
          gender: $('#gender').val(),
          single: $('#single').val(),
          Modemdr: $('#Modemdr').val(),
          Rankre: $('#Rankre').val(),
          Enlistmentec: $('#Enlistmentec').val(),
          InductionModeim: $('#InductionModeim').val(),
          clit: $('#clit').val(),
          EnlistmentUnit: $('#').val(),
          dateofesnlistment1: $('#dateofesnlistment1').val(),
          dateofesnlistment2: $('#edateofesnlistment1').val(),
          NamesofsCourses1: $('#NamesofsCourses').val(),
          NamesofsCourses2: $('#NamesofsCourses2').val(),
          DateofRetirementdor: $('#DateofRetirementdor').val(),
          dateofbirth: $('#dateofbirth').val(),
          dateofbirthi: $('#dateofbirthi').val(),
          height: $('#height').val(),
          inch: $('#inch').val(),
          PostingSetToBeUsed: $('#Postingtiset').val(),
          Postingtiset: $('#Postingtiseto').val(),
          Postingtiset2: $('#Postingtise2').val(),
          Postingtiset3: $('#Postingtise3').val(),
          Postingtiset4: $('#Postingtise4').val(),
          Postingtiset5: $('#Postingtise5').val(),
          Postingtiset6: $('#Postingtise6').val(),
          Postingtiset7: $('#Postingtise7').val(),
          Postingtiset8: $('#Postingtise8').val(),
          Postingtiset9: $('#Postingtise9').val(),
          advancedSearch: $('#advancedSearch').is(':checked'),
          not_set: ($("#not_set").attr('checked') === 'checked') ? true : false,
          training_institutes: $('#training_institutes_1').val(),
          courses: $('#courses').val(),
          birthday_date: $('#birthday_date').val(),
          selected_posting_id : selected_posting_id,
          selected_posting_ids : posting_manager.selected_posting_ids,
          not_set2: ($("#not_set2").attr('checked') === 'checked') ? true : false
        },
        //dataType:'json'
      }).complete(function(xhr, status) {
        if (status == 'success') {
          var data = xhr.responseText;
          var blob = new Blob([data], {
            type: "octet/stream"
          });
          const url = window.URL.createObjectURL(blob);
          var $a = $("<a>");
          $a.attr("href", url);
          $("body").append($a);
          $a.attr("download", "osi_emp_list.csv");
          $a[0].click();
          $a.remove();
        } else {
          alert('Failed to downlaod ERROR CODE - 459!')
        }
        $('#preloader').css('display', 'none');
      });
      //$('#preloader').css('display','none');
    }

    function showAddPostingModal(employee_name = 'Dalwinder', selected_emp_id) {
      selected_employee_id = selected_emp_id;
      $('#employee_name').html(employee_name);
      //posting_manager.showModal('selected_posting_name',{multiple:false});
      showPostingModal();
    }
    function showPostingModal(){
      $('#showPostingModal').modal('show');
    }
    function showPostingListModal() {
      //get all the postings

      $('#showPostingListModal').modal('show');
    }
  </script>
  <style>
    /*.frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}*/
    .modal-posting {
      width: 100%;
    }

    .modal-in-posting {
      width: 90%;
      width: 1200px;
    }

    .error {
      color: red;
    }

    .breadCrumbPostings ol {
      background-color: #667C2F;
      -webkit-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
    }

    .breadCrumbPostings ol li a {
      color: white;
      text-decoration: none;
    }


    .posting-list>ul>li:hover {
      color: white;
      background-color: rgb(54, 91, 133);
      cursor: pointer;
    }

    .posting-list>ul>li>label {
      color: white;
      margin-top: 10px;
      cursor: pointer;
    }

    .posting-list>ul>li>input {
      margin-left: 10px;
    }

    #exampleModalLabel2 {
      padding: 10px;
      background: rgb(218, 32, 22);
      height: 40px;
      border-radius: 3px;
      color: white;
      display: table-cell;
      vertical-align: middle;
      text-align: center;
      margin: 5px;
      -webkit-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
      box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
    }
  </style>
  <!-- Modal for adding positng USED-->

  <div class="modal fade modal-xl" id="showPostingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-in-posting" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Posting Detail of (<span id="employee_name"></span>).</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="posting_lists2">
          <div class="row">
            <div class="col-md-12">
              <span id="failedMessage" class="error"></span><br>
              <button onClick="posting_manager.showModal('selected_posting_name',{multiple:false});" class="btn btn-primary" id="select-employee-posting-button">Select Posting</button>
              <i><span id="selected_posting_name">posting not selected</span></i>
              <br>
              <label for="select-employee-posting-button" id="error_posting_id" class="error"></label>
              <br>
            </div>
            <div class="col-md-12" id="additional_posting_info_div">
              <div class="form-group">
                <select class="select" id="additional_posting_info">
                  <option value="">Optional</option>
                </select>
              </div>
            </div>
            <div class="col-md-12" id="order_number_div">
              <div class="form-group">
                <?php
                $order_number = array('type' => 'text', 'name' => 'order_number', 'id' => 'order_number', 'class' => 'form-control', 'placeholder' => 'Order Number', set_value('order_number'));
                echo form_input($order_number);
                echo form_error('order_number');
                ?>
                <label for="error_order_number" id="error_order_no" class="error"></label>
              </div>
            </div>
            <br />

            <div class="col-md-12" id="order_date_id">
              <div class="form-group">
                <?php
                $order_date = array('type' => 'text', 'name' => 'order_date', 'id' => 'order_date', 'class' => 'form-control', 'placeholder' => 'Order Date', set_value('order_date'));
                echo form_input($order_date);
                echo form_error('order_date');
                ?>
                <label for="order_date" id="error_order_date" class="error"></label>

              </div>
            </div>
            <div class="col-md-12" id="leave_from_date_div" style="display:none;">
              <div class="form-group">
                <?php
                $leave_from_date = array('type' => 'text', 'name' => 'leave_from_date', 'id' => 'leave_from_date', 'class' => 'form-control', 'placeholder' => 'Leave From Date', set_value('leave_from_date'));
                echo form_input($leave_from_date);
                echo form_error('leave_from_date');
                ?>
                <label id="error_leave_date_from" class="error"></label>
              </div>
            </div><!-- comment -->
            <div class="col-md-12" id="leave_to_date_div" style="display:none;">
              <div class="form-group">
                <?php
                $leave_to_date = array('type' => 'text', 'name' => 'leave_to_date', 'id' => 'leave_to_date', 'class' => 'form-control', 'placeholder' => 'Leave To Date', set_value('leave_to_date'));
                echo form_input($leave_to_date);
                echo form_error('leave_to_date');
                ?>
                <label id="error_leave_date_to" class="error"></label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <?php
                $posting_date = array('type' => 'text', 'name' => 'posting_date', 'id' => 'posting_date', 'class' => 'form-control', 'placeholder' => 'Posting Date', set_value('posting_date'));
                echo form_input($posting_date);
                echo form_error('posting_date');
                ?>
                <label id="error_posting_date" class="error"></label>
                <label id="error_leave_date" class="error"></label>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onClick="updateEmployeePosting()" id="addPostingButton">Add Posting</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ############## Posting lIst modal ################ -->
  <?php if(false) { ?>
  <div class="modal fade modal-xl modal-posting" id="showPostingListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog modal-in-posting" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Posting from list given below, to which you want to assign to the selected Police Pers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="posting_lists2">
          <div class="row">
            <div class="col-md-9">
              <table class="table" id="postingTable">
                <thead>
                  <th></th>
                  <th>Posting Name</th>
                  <th>Parent Posting path</th>
                </thead>

                <?php
                if (false) {
                  $end_nodes = [1, 3];
                  for ($i = 0; $i < 15; $i++) {
                    if (in_array($i, $end_nodes)) {
                      $style = 'background-color: #f6fff6;';
                    } else {
                      $style = '';
                    }
                ?>

                    <tr style="<?php echo $style; ?>">
                      <td><input type="radio" name="radioSelectedPosting" onClick="selectPosting('id')" /></td>
                      <td>Posting001</td>
                      <td>Posting01/posting02/child</td>
                    </tr>
                <?php }
                } ?>
              </table>

            </div>
            <div class="col-md-3">

              <input type="text" class="form-control" placeholder="Search posting" id="posting_name_search_not_used" id="searchPostingName" onClick="searchPosting()"><br>
              <button class="btn btn-default" onClick="searchPosting()">Search</button><button class="btn btn-default">Submit</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <script type="text/javascript">
    //showPostingListModal();

    postingModule.selectedPosting = -1;
    postingModule.selectPosting = function(_posting_id) {
      this.selectedPosting = _posting_id;
    }
    //#############################################################
    postingModule.dataTable = $('#postingTable').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],

      bFilter: false,
      "ajax": {
        url: "<?php echo base_url() . 'ajax-get-all-posting-by-name'; ?>",
        type: "POST",
        "data": function(data) {
          data.searchPosting = $('#searchPostingName').val()
        }
      },
      "columns": [{
          "data": "radio"
        },
        {
          "data": "postingName"
        },
        {
          "data": "parentPathOfPosting"
        },


      ],
      "columnDefs": [{
          "targets": [0, 2],
          "orderable": false,
        },
        {
          "targets": [1, 2],
          "className": "text-left",
        },
      ],
      "initComplete": function(settings, json) {
        //console.log(settings);
        //console.log(json.query);
      }

    });
    //#############################################################
    //showPostingListModal();
    $(document).ready(function() {
      jQuery('#order_date').datepicker({
        format: "dd-mm-yyyy"
      });
      jQuery('#posting_date').datepicker({
        format: "dd-mm-yyyy"
      });
      jQuery('#leave_from_date').datepicker({
        format: "dd-mm-yyyy"
      });
      jQuery('#leave_to_date').datepicker({
        format: "dd-mm-yyyy"
      });
    });
  </script>
  <?php if(false){ ?> 
  <!-- Add Posting enterModal USED -->
  <div class="modal fade modal-lg modal-posting" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-in-posting" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Posting from the list given below, to which you want to assign to the selected Police Personnel.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body posting-list" id="posting_lists_">
          <div class="row text-center">
            <div class="col-md-12">
              <nav aria-label="breadcrumb" id="breadCrumb" class="breadCrumbPostings">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a></a></li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row" id="posting_list2">
            <div style="float:left;position:relative;left:40px;" class="col-md-2">
              <select class="form-control select2" onChange="pagination.updateRecordsPerPage()" id="my_pagination_recordsPerPage">
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="-1">All</option>
              </select>

            </div>
            <div class="col-md-5 text-right">
              <label for="global_radio">Search Result Under Selected Posting</label>
              <input type="checkbox" id="global_radio" name="under_posting" onClick="pagination.setIncludePosting(this);">
            </div>
            <div style="float:right;padding-right:20px;width:300px;" class="col-md-5">
              <!--input type="text" class="form-control" placeholder="Search.." id="posting_name_search"/><span class="glyphicon glyphicon-search"></span-->

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" id="posting_name_search" />
                <span class="input-group-addon" onClick="searchPostingByName()">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
            <br><br>
            <div class="posting-list">
              <ul id="posting_list_ul" style="list-style-type:none;">

              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="dataTables_info" id="searchedPosting_detail" role="status" aria-live="polite" style="padding-left:30px;padding-top:20px;">

                Showing Postings under HOME

              </div>
            </div>
            <div class="col-md-7 text-right">
              <div class="dataTables_paginate paging_simple_numbers" id="searchedEmployees_paginate">
                <ul class="pagination my_pagination" id="my_pagination">
                  <li class="paginate_button previous disabled" id="searchedEmployees_previous"><a href="#" aria-controls="searchedEmployees" data-dt-idx="0" tabindex="0">Previous</a></li>
                  <li class="paginate_button active"><a href="#">1</a></li>

                  <li class="paginate_button next disabled" id="searchedEmployees_next"><a href="#">Next</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="backButton" onClick="load_the_postings_in_posting_lists2(1);">Back</button>
          <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button-->
          <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <!-- View Posting History of selected employee -->
  <div class="modal fade modal-lg modal-posting" id="postingHistoryOfEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-in-posting" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Posting History of <span id="posting_employee_name">Dalwinderjit Singh</span>(<span id="posting_employee_battalion">27</span>/<span id="posting_employee_regimental_no">275</span>).</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <script type="text/javascript">
          var posting_history_obj = {};
          posting_history_obj.employee_id = null;
          posting_history_obj.getPostingHistory = function(employee_id) {
            posting_history_obj.employee_id = employee_id;
            if (posting_history_obj.dataTable === undefined) {
              //alert('new');
              posting_history_obj.initialize();
            } else {
              //  alert('old');
              posting_history_obj.dataTable.draw();
            }
            $('#postingHistoryOfEmployee').modal('show');
            //posting_history_obj.dataTable.draw();
          }
          $(document).ready(function() {
            //posting_history_obj.getPostingHistory(24144);
          });
          //########################### POSTING HISTORY OF EMPLOYEE ##################################
          posting_history_obj.initialize = function() {
            posting_history_obj.dataTable = $('#posting_history_table').DataTable({
              "processing": true,
              "serverSide": true,
              "order": [],

              //bFilter: false,
              "ajax": {
                url: "<?php echo base_url() . 'battalion/ajax-get-all-posting-history-by-employee-id'; ?>",
                type: "POST",
                "data": function(data) {
                  data.employee_id = posting_history_obj.employee_id
                }
              },
              "columns": [{
                  "data": "sno"
                },
                {
                  "data": "posting_name"
                },
                {
                  "data": "order_no"
                },
                {
                  "data": "battalion"
                },
                {
                  "data": "posting_date"
                },
                {
                  "data": "order_date"
                },
              ],
              "columnDefs": [{
                  "targets": [0, 2],
                  "orderable": false,
                },
                {
                  "targets": [1, 2],
                  "className": "text-left",
                },
              ],
              "initComplete": function(settings, json) {
                //console.log(settings);
                //console.log('hi');
                //console.log(json);
                $('#posting_employee_name').html(json.name);
                $('#posting_employee_regimental_no').html(json.regimental_no);
                $('#posting_employee_battalion').html(json.battalion);

              },
              "drawCallback": function(settings) {
                console.log(settings.json);
                var json = settings.json;
                $('#posting_employee_name').html(json.name);
                $('#posting_employee_regimental_no').html(json.regimental_no);
                $('#posting_employee_battalion').html(json.battalion);
              }
            });

          }
          $(function() {

            if (typeof($.fn.daterangepicker) === 'undefined') {
              return;
            }
            console.log('init_daterangepicker_right');

            var cb = function(start, end, label) {
              console.log(start.toISOString(), end.toISOString(), label);
              $('#birthday_date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              //$('#birthday_date_range span').html('--,--,---- to --,--,-----');
              $('#birthday_date').val(start.format('DD/MM/YYYY') + '-' + end.format('DD/MM/YYYY'));
              //$('#birthday_date').val('');
            };

            var optionSet1 = {
              startDate: moment().subtract(29, 'days'),
              endDate: moment(),
              //minDate: '01/01/2021',
              //maxDate: '12/31/2022',//<?php //echo date('m/d/Y'); 
                                        ?>',
              /*dateLimit: {
                  days: 365
              },*/
              showDropdowns: true,
              showWeekNumbers: true,
              timePicker: false,
              timePickerIncrement: 1,
              timePicker12Hour: true,
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              opens: 'right',
              buttonClasses: ['btn btn-default'],
              applyClass: 'btn-small btn-primary',
              cancelClass: 'btn-small',
              format: 'MM/DD/YYYY',
              separator: ' to ',
              locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
              }
            };
            console.log('hi');
            $('#birthday_date_range span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#birthday_date').val(moment().subtract(29, 'days').format('DD/MM/YYYY') + '-' + moment().format('DD/MM/YYYY')); //start.format('DD/MM/YYYY') + '-' + end.format('DD/MM/YYYY'));
            $('#birthday_date_range').daterangepicker(optionSet1, cb);

            $('#birthday_date_range').on('show.daterangepicker', function() {
              console.log("show event fired");
            });
            $('#birthday_date_range').on('hide.daterangepicker', function() {
              console.log("hide event fired");
            });
            $('#birthday_date_range').on('apply.daterangepicker', function(ev, picker) {
              console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#birthday_date_range').on('cancel.daterangepicker', function(ev, picker) {
              console.log("cancel event fired");
              $('#birthday_date_range span').html('--,--,---- to --,--,-----');
              $('#birthday_date').val('');
            });

            $('#options1').click(function() {
              $('#birthday_date_range').data('daterangepicker').setOptions(optionSet1, cb);
            });

            $('#options2').click(function() {
              $('#birthday_date_range').data('daterangepicker').setOptions(optionSet2, cb);
            });


            $('#destroy').click(function() {
              $('#birthday_date_range').data('daterangepicker').remove();
            });
            $('#birthday_date_range span').html('--,--,---- to --,--,-----');

            $('#birthday_date').val('');
          });
          //#############################################################
        </script>
        <div class="modal-body" id="posting_history">
          <table class="table" id="posting_history_table" style="width:100%;">
            <thead>
              <tr>
                <td>S.no</td>
                <td>Posting</td>
                <td>Order Number</td>
                <td>Battalion</td>
                <td>Posting Date</td>
                <td>Order Date</td>
              </tr>
            </thead>

          </table>

          <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    //$('#postingHistoryOfEmployee').modal('show');
    /*var search_bar = document.getElementById('posting_name_search');
    search_bar.addEventListener('keypress', function(event) {

      if (event.keyCode == 13) {
        event.preventDefault();
        searchPostingByName();
      }
    });*/

    /*function searchPostingByName() {
      pagination.currentPageNumber = 1;
      searchPosting();
    }*/

    /*function getAdditionalPostingInfo() {
      posting_id = selected_posting_id;
      $.ajax({
        url: '<?php echo base_url(); ?>ajaxGetAdditionalPostingInfo',
        method: 'POST',
        data: {
          selected_posting_id: posting_id
        },
        success: function(html) {
          var data = JSON.parse(html);
          $('select#additional_posting_info').empty().trigger('change');
          var data_ = {
            id: '',
            text: `-- Optional --`
          };
          var newOption = new Option(data_.text, data_.id, false, false);
          $('select#additional_posting_info').append(newOption).trigger('change');
          $.each(data.data, function(k, val) {
            var data_ = {
              id: val.id,
              text: `${val.title} - ${val.type_title}`
            };
            var newOption = new Option(data_.text, data_.id, false, false);
            $('select#additional_posting_info').append(newOption);
          });
          $('select#additional_posting_info').trigger('change');
        }
      });
    }*/
    </script>
    <?php 
    
    $this->load->view('Postings/templates/selectPostingModal');
    ?>
    <script type="text/javascript">
   <?php
    if (isset($previous_posting) && !empty($previous_posting)) { ?>
      posting_manager.load_the_postings_in_posting_lists2(<?php echo $previous_posting[0]->id . ',"' . $previous_posting[0]->name . '"'; ?>);
      <?php } else { ?>
        posting_manager.load_the_postings_in_posting_lists2(1, 'HOME');
        <?php } ?>
    </script>
</body>

</html>