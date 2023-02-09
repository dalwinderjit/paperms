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
    <!--link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.tagsinput.css" /-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/admitCard.css" />
    <!--link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet"-->

</head>

<body>
<?php $this->load->view('BPT/admitCardTemplate',['candidate'=>$candidate,'employee'=>$employee]); die; ?>
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
        <?php //$this->load->view('Btalion/html/navbar'); ?>
        <div class="mainpanel">
            <?php //$this->load->view('Btalion/html/headbar'); ?>
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
                        echo "Battalion : " . $employee->bat_id;
                        echo "Department No. " . $employee->depttno;
                        echo "Gender. " . $employee->gender;
                        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                        
                        /*----End Form Validation----*/

                        /*Create HTML form*/
                        $attributes = array(
                            'name'        => 'basicForm4',
                            'id'        => 'basicForm4',
                            'accept-charset'  => 'utf-8',
                            'autocomplete'    => 'off',
                            'enctype' => "multipart/form-data"
                        );
                        echo form_open_multipart("", $attributes);
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="tab-content" style="border:1px solid #d8dbde;">
                                    <?php
                                        $this->load->view('BPT/admitCardTemplate',['candidate'=>$candidate,'employee'=>$employee]);
                                    ?>
                                </div><!-- panel-body -->
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Print</button>
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
        jQuery('#dob').datepicker({
            dateFormat: "yy-mm-dd"
        });
        jQuery('#dateofenlistment').datepicker({
            dateFormat: "yy-mm-dd"
        });
        <?php
        for ($i = 0; $i < count($bad_entries) + 1; $i++) {
            echo "jQuery('#entry_date_{$i}').datepicker({
                    dateFormat: 'yy-mm-dd'
                });
                jQuery('#deleted_{$i}').select2({
                    'width': '100%'
                });
                ";
        }
        ?>
        jQuery('#maritialstatus').select2({
            'width': '100%'
        });
        jQuery('#rtc_pass').select2({
            'width': '100%'
        });
        jQuery('#category').select2({
            'width': '100%'
        });
        jQuery('#PRO_CHK').select2({
            'width': '100%'
        });
        jQuery('#NDL_CHK').select2({
            'width': '100%'
        });
        jQuery('#bloodgroup').select2({
            'width': '100%'
        });

        jQuery('#selectedEmployees').select2({
            'width': '100%',
            multiple: true,
            ajax: {
                url: '<?php echo base_url(); ?>postings/getbeltnumbers2',
                type: 'POST',
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

        function toggleBadEntryRow(id) {
            if ($(`#bad_entry_row_${id}`).css('display') === 'none') {
                $(`#bad_entry_row_${id}`).css('display', '');
            } else {
                $(`#bad_entry_row_${id}`).css('display', 'none');
            }
        }
    </script>

</body>

</html>