<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Add Employee To BPT</title>
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
                                            $name = array('type' => 'text', 'name' => 'name', 'id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name of Official', 'value' => set_value('name',$employee->name));
                                            echo form_input($name);
                                            echo form_error('name');
                                            ?>
                                            <label for="name" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Category(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $fname = array('type' => 'text', 'name' => 'category', 'id' => 'category', 'class' => 'form-control', 'placeholder' => 'Category ', 'value' => set_value('category',$employee->category));
                                            echo form_input($fname);
                                            echo form_error('fname');
                                            ?>
                                            <label for="fname" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php if ($this->input->post('gender') == 'Male' || $this->input->post('gender') == null) {
                                                $male = 'checked';
                                                $female = '';
                                            } else {
                                                $male = '';
                                                $female = "checked";
                                            }
                                            ?>
                                            <label class="radio-inline"><input type="radio" name="gender" <?php echo $male; ?> value="Male">Male</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="Female" <?php echo $female; ?>>Female</label>
                                            <?php echo form_error('gender'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Marital Status(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $mstatus = array('' => '--Select--',  'Single' => 'Single', 'Married' => 'Married', 'Unmarried' => 'Unmarried', 'Divorced' => 'Divorced', 'Widow/ Widower' => 'Widow/ Widower');
                                            /*newarea Textfield*/
                                            echo form_dropdown('mstatus', $mstatus, set_value('mstatus', 1), 'id="mstatus" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                                            echo form_error('mstatus');
                                            /*----End newarea Textfield----*/
                                            ?>
                                            <label for="mstatus" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of birth(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <div class='input-group'>
                                                <input type='text' name="dob" class="form-control" id='datetimepicker1' value="<?php if (null != $this->input->post('dob')) {
                                                                                                                                    echo $this->input->post('dob');
                                                                                                                                } ?>" placeholder="Date of birth dd/mm/yyyy" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            <?php echo form_error('dob'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Caste</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $casting = array('type' => 'text', 'name' => 'casting', 'id' => 'casting', 'class' => 'form-control', 'placeholder' => 'Caste', 'value' => set_value('casting'));
                                            echo form_input($casting);
                                            echo form_error('casting');
                                            ?>
                                            <label for="casting" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Category(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $catii = array('' => '--Select--',  'GEN' => 'GEN', 'SCM' => 'SCM', 'SCO' => 'SCO', 'BC' => 'BC', 'OBC' => 'OBC', 'ST' => 'ST', 'SCBM' => 'SCBM', 'EWS' => 'EWS');
                                            /*newarea Textfield*/
                                            echo form_dropdown('catii', $catii, set_value('catii', 1), 'id="catii" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"');
                                            echo form_error('catii');
                                            /*----End newarea Textfield----*/
                                            ?>
                                            <label for="catii" class="error"></label>
                                        </div>
                                    </div>
                                    <h4 class="page-header">Contacts</h4>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $conphno = array('type' => 'text', 'name' => 'conphno', 'id' => 'conphno', 'class' => 'form-control', 'placeholder' => 'Phone No', 'value' => set_value('conphno'));
                                            echo form_input($conphno);
                                            echo form_error('conphno');
                                            ?>
                                            <label for="conphno" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No 2</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $conphnot = array('type' => 'text', 'name' => 'conphnot', 'id' => 'conphnot', 'class' => 'form-control', 'placeholder' => 'Phone No 2', 'value' => set_value('conphnot'));
                                            echo form_input($conphnot);
                                            echo form_error('conphnot');
                                            ?>
                                            <label for="conphnot" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email ID</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $pemailid = array('type' => 'email', 'name' => 'pemailid', 'id' => 'pemailid', 'class' => 'form-control', 'placeholder' => 'Email ID', 'value' => set_value('pemailid'));
                                            echo form_input($pemailid);
                                            echo form_error('pemailid');
                                            ?>
                                            <label for="pemailid" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Adhaar Card No</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $addarcard = array('type' => 'text', 'name' => 'addarcard', 'id' => 'addarcard', 'class' => 'form-control', 'placeholder' => 'Adhaar Card No', 'value' => set_value('addarcard'));
                                            echo form_input($addarcard);
                                            echo form_error('addarcard');
                                            ?>
                                            <label for="addarcard" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">PAN</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $pancard = array('type' => 'text', 'name' => 'pancard', 'id' => 'pancard', 'class' => 'form-control', 'placeholder' => 'PAN', 'value' => set_value('pancard'));
                                            echo form_input($pancard);
                                            echo form_error('pancard');
                                            ?>
                                            <label for="pancard" class="error"></label>
                                        </div>
                                    </div>
                                    <h4 class="page-header">Bank Details</h4>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name of the Bank</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $bankdetail = array('type' => 'text', 'name' => 'bankdetail', 'id' => 'bankdetail', 'class' => 'form-control', 'placeholder' => 'Name of the Bank', 'value' => set_value('bankdetail'));
                                            echo form_input($bankdetail);
                                            echo form_error('bankdetail');
                                            ?>
                                            <label for="bankdetail" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name of Branch</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $bankbrach = array('type' => 'text', 'name' => 'bankbrach', 'id' => 'bankbrach', 'class' => 'form-control', 'placeholder' => 'Name of Branch', 'value' => set_value('bankbrach'));
                                            echo form_input($bankbrach);
                                            echo form_error('bankbrach');
                                            ?>
                                            <label for="bankbrach" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Bank A/C No.</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $bankac = array('type' => 'text', 'name' => 'bankac', 'id' => 'bankac', 'class' => 'form-control', 'placeholder' => 'Bank A/C No.', 'value' => set_value('bankac'));
                                            echo form_input($bankac);
                                            echo form_error('bankac');
                                            ?>
                                            <label for="bankac" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">IFSC Code</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $ifsccode = array('type' => 'text', 'name' => 'ifsccode', 'id' => 'ifsccode', 'class' => 'form-control', 'placeholder' => 'IFSC Code', 'value' => set_value('ifsccode'));
                                            echo form_input($ifsccode);
                                            echo form_error('ifsccode');
                                            ?>
                                            <label for="ifsccode" class="error"></label>
                                        </div>
                                    </div>
                                    <h4 class="page-header">Physical Details</h4>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Blood Group(<span class="mandatory red">*</span>)</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $bg = ['' => '--Select--'];
                                            foreach ($bloodgroups as $k => $v) {
                                                $bg[$k] = $v;
                                            }
                                            /*newarea Textfield*/
                                            echo form_dropdown('bloodgroup', $bg, set_value('bloodgroup', 1), 'id="bloodgroup" data-placeholder="Choose One" class="select2"');
                                            echo form_error('bloodgroup');
                                            ?>
                                            <label for="bloodgroup" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Identification Mark</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $Identificationmark = array('type' => 'text', 'name' => 'Identificationmark', 'id' => 'Identificationmark', 'class' => 'form-control', 'placeholder' => 'Identification Mark', 'value' => set_value('Identificationmark'));
                                            echo form_input($Identificationmark);
                                            echo form_error('Identificationmark');
                                            ?>
                                            <label for="Identificationmark" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Weight</label>
                                        <div class="col-sm-9">
                                            <div class="col-xs-4"><?php
                                                                    $Kg = array('type' => 'text', 'name' => 'Kg', 'id' => 'Kg', 'class' => 'form-control', 'placeholder' => 'Kg', 'value' => set_value('Kg'));
                                                                    echo form_input($Kg);
                                                                    echo form_error('Kg');
                                                                    ?></div>
                                            <div class="col-xs-4">
                                                <?php
                                                $Gm = array('type' => 'text', 'name' => 'Gm', 'id' => 'Gm', 'class' => 'form-control', 'placeholder' => 'Gm', 'value' => set_value('Gm'));
                                                echo form_input($Gm);
                                                echo form_error('Gm');
                                                ?></div>
                                            <label for="Gm" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Height(<span class="mandatory red">*</span>)</label>
                                        <div class="col-xs-4"><?php
                                                                $Feet = array('type' => 'text', 'name' => 'Feet', 'id' => 'Feet', 'class' => 'form-control', 'placeholder' => 'Feet', 'value' => set_value('Feet'));
                                                                echo form_input($Feet);
                                                                echo form_error('Feet');
                                                                ?></div>
                                        <div class="col-xs-4">
                                            <?php
                                            $inch = array('type' => 'text', 'name' => 'inch', 'id' => 'inch', 'class' => 'form-control', 'placeholder' => 'inch', 'value' => set_value('inch'));
                                            echo form_input($inch);
                                            echo form_error('inch');
                                            ?></div>
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