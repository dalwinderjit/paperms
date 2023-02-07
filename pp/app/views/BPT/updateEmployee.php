<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Edit Employee in BPT</title>
    <style>


    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.tagsinput.css" />
    <!--link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet"-->

</head>

<body>
    <!-- Preloader -->
    <?php if (false) { ?>
        <div id="preloader">
            <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
        </div>
    <?php } ?>
    <?php //echo validation_errors(); 
    //var_dump($pageErrorCounter);

    ?>
    <section>
        <?php $this->load->view('Btalion/html/navbar'); ?>
        <div class="mainpanel">
            <?php $this->load->view('Btalion/html/headbar'); ?>
            <div class="pageheader">
                <h3> &nbsp; &nbsp; Edit Employee Added in BPT</h3>
            </div>

            <div class="contentpanel">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($this->session->flashdata('success_msg')) : ?>
                            <div class="alert alert-success alert-dismissible" id="warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error_msg')) : ?>
                            <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        /*Form Validation set*/
                        echo "Battalion : ".$employee->bat_id;
                        echo "Department No. ".$employee->depttno;
                        echo "Gender. ".$employee->gender;
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
                                <div class="tab-content" style="border:1px solid #d8dbde;">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name of Official(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $name = array('type' => 'text', 'name' => 'name', 'id' => 'name', 'disabled'=>'disabled','class' => 'form-control', 'placeholder' => 'Name of Official', 'value' => set_value('name',$employee->name));
                                            echo form_input($name);
                                            echo form_error('name');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Category(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            //$categories = array('' => '--Select--',  'SC' => 'SC','General'=>'General');
                                            //$categories = array('' => '--Select--',  'GEN' => 'GEN', 'SCM' => 'SCM','SCO' => 'SCO', 'BC' => 'BC','OBC' => 'OBC', 'ST' => 'ST','SCBM' => 'SCBM', 'EWS' => 'EWS');
                                            echo form_dropdown('category', $categories, set_value('category', $employee->category), 'id="category" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                                            echo form_error('category');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Cast(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            //$categories = array('' => '--Select--',  'Sikh' => 'Sikh');
                                            //echo form_dropdown('caste', $categories, set_value('caste', 1), 'id="caste" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                                            $caste = array('type' => 'text', 'name' => 'caste', 'id' => 'caste', 'class' => 'form-control', 'placeholder' => 'Enter Caste', 'value' => set_value('caste',$employee->caste));
                                            echo form_input($caste);
                                            echo form_error('caste');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of birth(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <div class='input-group'>
                                                <?php
                                                $dob = array('type' => 'text', 'name' => 'dob', 'id' => 'dob', 'class' => 'form-control', 'placeholder' => 'Enter Date Of Birth', 'value' => set_value('dob',$employee->dateofbith));
                                                echo form_input($dob);
                                                ?>
                                                <!--input type='text' name="dob" class="form-control" id='datetimepicker1' value="<?php if (null != $this->input->post('dob')) {
                                                                                                                                    echo $this->input->post('dob');
                                                                                                                                } ?>" placeholder="Date of birth dd/mm/yyyy" /-->
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                <?php echo form_error('dob'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Commendation Certificate 1 Count(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $c1_cert = array('type' => 'text', 'name' => 'c1_cert', 'id' => 'c1_cert', 'class' => 'form-control', 'placeholder' => 'No. of Commendation Certificate 1', 'value' => set_value('c1_cert',$candidate->class_1_entries));
                                            echo form_input($c1_cert);
                                            echo form_error('c1_cert');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Commendation Certificate 2 Count(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $c2_cert = array('type' => 'text', 'name' => 'c2_cert', 'id' => 'c2_cert', 'class' => 'form-control', 'placeholder' => 'No. of Commendation Certificate 2', 'value' => set_value('c2_cert',$candidate->class_2_entries));
                                            echo form_input($c2_cert);
                                            echo form_error('c2_cert');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Commendation Certificate 3 Count(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $c3_cert = array('type' => 'text', 'name' => 'c3_cert', 'id' => 'c3_cert', 'class' => 'form-control', 'placeholder' => 'No. of Commendation Certificate 3', 'value' => set_value('c3_cert',$candidate->class_3_entries));
                                            echo form_input($c3_cert);
                                            echo form_error('c3_cert');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Roll Number(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $roll_number = array('type' => 'text', 'name' => 'roll_number', 'id' => 'roll_number', 'class' => 'form-control', 'placeholder' => 'Roll Number Of Employee', 'value' => set_value('roll_number',$candidate->roll_no));
                                            echo form_input($roll_number);
                                            echo form_error('roll_number');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of Enlistment(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <div class='input-group'>
                                                <?php
                                                    $dateofenlistment = array('type' => 'text', 'name' => 'dateofenlistment', 'id' => 'dateofenlistment', 'class' => 'form-control', 'placeholder' => 'Enter Date Of Enlistment', 'value' => set_value('dob',$employee->dateofinlitment));
                                                    echo form_input($dateofenlistment);
                                                ?>
                                                <!--input type='text' name="dateofenlistment" class="form-control" id='dateofenlistment' value="<?php if (null != $this->input->post('dob')) {
                                                                                                                                    echo $this->input->post('dob');
                                                                                                                                } ?>" placeholder="Date of birth dd/mm/yyyy" /-->
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            <?php echo form_error('dateofenlistment'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Battalion District Code(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $battalion_dis_code = array('type' => 'text', 'name' => 'battalion_dis_code', 'id' => 'battalion_dis_code', 'class' => 'form-control', 'placeholder' => 'Enter Battalion District Code', 'value' => set_value('battalion_dis_code'/*,$employee->battalion_dis_code*/));
                                            echo form_input($battalion_dis_code);
                                            echo form_error('battalion_dis_code');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Deputation(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $deputation = array('type' => 'text', 'name' => 'deputaiion', 'id' => 'deputaiion', 'class' => 'form-control', 'placeholder' => 'Deputation', 'value' => set_value('deputation'/*,$employee->deputation*/));
                                            echo form_input($deputation);
                                            echo form_error('Deputation');
                                            ?>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Marital Status(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $maritialstatus = array('' => '--Select--',  'Single' => 'Single', 'Married' => 'Married', 'Unmarried' => 'Unmarried', 'Divorced' => 'Divorced', 'Widow/ Widower' => 'Widow/ Widower');
                                            /*newarea Textfield*/
                                            echo form_dropdown('maritialstatus', $maritialstatus, set_value('maritialstatus', $employee->maritalstatus),  ' disabled id="maritialstatus" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                                            echo form_error('maritialstatus');
                                            /*----End newarea Textfield----*/
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">RTC PASS</label>
                                        <div class="col-sm-9">
                                            <?php
                                                if($employee->btic!="" || $employee->passoutyear !="" || $employee->batchgroup!=""){
                                                    $rtc_pass_ = 'YES';
                                                }else{
                                                    $rtc_pass_ = 'NO';
                                                }
                                                $rtc_pass = array('' => '--Select--',  'YES' => 'YES', 'NO' => 'NO');
                                                /*newarea Textfield*/
                                                echo form_dropdown('rtc_pass', $rtc_pass, set_value('rtc_pass', $rtc_pass_), 'id="rtc_pass" disabled data-placeholder="RTC PASS" title="Please select at least 1 value" class="select2"');
                                                echo form_error('rtc_pass');
                                                echo "<ul><li>Training Center : {$employee->btic}</li><li>Passout Year : {$employee->passoutyear}</li><li> Batch Number : {$employee->batchgroup}</li></ul>";
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Bad Entries</label>
                                        <div class="col-sm-9">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Remarks 1(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $remarks1 = array('type' => 'text', 'name' => 'remarks1', 'id' => 'remarks1', 'class' => 'form-control', 'placeholder' => 'Enter Remarks 1', 'value' => set_value('remarks1',$candidate->remarks1));
                                            echo form_input($remarks1);
                                            echo form_error('remarks1');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Remarks 2(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                                $remarks2 = array('type' => 'text', 'name' => 'remarks2', 'id' => 'remarks2', 'class' => 'form-control', 'placeholder' => 'Enter Remarks 2', 'value' => set_value('remarks2',$candidate->remarks2));
                                                echo form_input($remarks2);
                                                echo form_error('remarks2');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">PRO_CHK</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $PRO_CHK = array('' => '--Select--',  'YES' => 'YES', 'NO' => 'NO');
                                            /*newarea Textfield*/
                                            echo form_dropdown('PRO_CHK', $PRO_CHK, set_value('PRO_CHK', $candidate->pro_chk), 'id="PRO_CHK" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                                            echo form_error('PRO_CHK');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">NDL_CHK</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $NDL_CHK = array('' => '--Select--',  'YES' => 'YES', 'NO' => 'NO');
                                            /*newarea Textfield*/
                                            echo form_dropdown('NDL_CHK', $NDL_CHK, set_value('NDL_CHK', $candidate->ndl_chk), 'id="NDL_CHK" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                                            echo form_error('NDL_CHK');
                                            ?>
                                            <label for="casting" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Profile Picture</label>
                                        <div class="col-sm-9">
                                                <img src="<?php echo base_url();?>/webroot/images/profile_pic/<?php echo $employee->profile_pic; ?>" class="profile_pic"/>
                                                <input type="file"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">MAJOR Punishment</label>
                                        <div class="col-sm-9">
                                        <?php
                                            $roll_number = array('type' => 'text', 'name' => 'roll_number', 'id' => 'roll_number', 'class' => 'form-control', 'placeholder' => 'Roll Number Of Employee', 'value' => set_value('roll_number'/*,$employee->roll_number*/));
                                            echo form_input($roll_number);
                                            echo form_error('roll_number');
                                            ?>
                                        </div>
                                    </div>
                                    <h4 class="page-header">Contacts</h4>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No 1(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $phone1 = array('type' => 'text', 'name' => 'phone1', 'id' => 'phone1', 'class' => 'form-control', 'placeholder' => 'Phone No', 'value' => set_value('phone1',$employee->phono1));
                                            echo form_input($phone1);
                                            echo form_error('phone1');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No 2</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $phone2 = array('type' => 'text', 'name' => 'phone2', 'id' => 'phone2', 'class' => 'form-control', 'placeholder' => 'Phone No 2', 'value' => set_value('phone2',$employee->phono2));
                                            echo form_input($phone2);
                                            echo form_error('phone2');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email ID</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $email = array('type' => 'email', 'name' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email ID', 'value' => set_value('pemailid',$employee->email));
                                            echo form_input($email);
                                            echo form_error('email');
                                            ?>
                                        </div>
                                    </div>
                                    <h4 class="page-header">Physical Details</h4>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Blood Group(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $bloodgroups = ['A+ve' => 'A+ve', 'A-ve' => 'A-ve', 'B+ve' => 'B+ve', 'B-ve' => 'B-ve', 'AB+ve' => 'AB+ve', 'AB-ve' => 'AB-ve', 'O+ve' => 'O+ve', 'O-ve' => 'O-ve'];
                                            $bg = ['' => '--Select--'];
                                            foreach ($bloodgroups as $k => $v) {
                                                $bg[$k] = $v;
                                            }
                                            echo form_dropdown('bloodgroup', $bg, set_value('bloodgroup', $employee->bloodgroup), 'id="bloodgroup" disabled data-placeholder="Choose One" class="select2"');
                                            echo form_error('bloodgroup');
                                            ?>
                                            <label for="bloodgroup" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Identification Mark</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $Identificationmark = array('type' => 'text', 'name' => 'Identificationmark','disabled'=>'disabled', 'id' => 'Identificationmark', 'class' => 'form-control', 'placeholder' => 'Identification Mark', 'value' => set_value('Identificationmark',$employee->identificationmark));
                                            echo form_input($Identificationmark);
                                            echo form_error('Identificationmark');
                                            ?>
                                            <label for="Identificationmark" class="error"></label>
                                        </div>
                                    </div>
                                </div><!-- panel-body -->
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo base_url(); ?>webroot/js/jquery.tagsinput.min.js"></script>

    <script src="<?php echo base_url(); ?>webroot/js/custom.js"></script>
    <script type="text/javascript">
        jQuery('#dob').datepicker({dateFormat: "yy-mm-dd"});
        jQuery('#dateofenlistment').datepicker({dateFormat: "yy-mm-dd"});
        
        jQuery('#maritialstatus').select2({'width':'100%'});
        jQuery('#rtc_pass').select2({'width':'100%'});
        jQuery('#category').select2({'width':'100%'});
        jQuery('#PRO_CHK').select2({'width':'100%'});
        jQuery('#NDL_CHK').select2({'width':'100%'});
        jQuery('#bloodgroup').select2({'width':'100%'});
        
        jQuery('#selectedEmployees').select2({
        'width': '100%',
        multiple: true,
        ajax: {
          url: '<?php echo base_url();?>postings/getbeltnumbers2',
          type:'POST',
          dataType: 'json',
          data: function(params, page) {
            var query = {
              term: params,
              type: 'public',
              page: page,
              bat_id: $('#ito').val()
            }
            return query;
          },
          results: function(data, page) {
            return {
              results: data.results,
              more: data.more
            }
          }
          // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        },
        /*formatResult: topicFormatResult,
        formatSelection: formatRepoSelection,*/
        escapeMarkup: function(m) {
          return m;
        }
      });
  </script>

</body>

</html>