  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Practice Shell deposit to Nodel Battalion/CA</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/jquery.datatables.css"/>
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
      <h3> &nbsp;  &nbsp;Practice Shell deposit to Nodel Battalion/CA</h3>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
       <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
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

                  <div class="row">
                         
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array();
$bores = array();

                 foreach ($tow as $value) {
                   $tpi[$value->arm] = $value->arm;
                   if(trim($value->bore)!=''){
                    $bores[$value->bore] =$value->bore;
                   }
                 }
/*newarea Textfield*/
 echo form_dropdown('weapons[]', $tpi, set_value('weapons'),'id="tpi" data-placeholder="--Name of Weapon--" title="Please select at least 1 area" class="select2" multiple'); 
 echo form_error('weapons');
/*----End newarea Textfield----*/
 ?>

                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

                  <div class="col-sm-3"><div class="form-group">
<?php
/*newarea Textfield*/
 echo form_dropdown('ammunition_bore[]', $bores, set_value('ammunition_bore'),'id="ammunition_bore" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" multiple'); 
 echo form_error('ammunition_bore');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>

              
                

                <div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-default">Reset</a>
                </div>

                  </div><br/>

                  <div class="row">
                    
                      
                  </div>

<?php echo form_close(); ?>
          </div></div>
        <div class="panel-body">   
          <div class="table-responsive">
            <table class="table" >
              <thead>
                 <tr>
              <th>S.No</th>
              <th>Weapon</th>
              <th>Ammunition Bore</th>
              <th>Qty</th>
              <th>Miss cartridges</th>
              <th>Empty cartridges</th>
              <th>Lost cartridges</th>
              <th>Live cartridges</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  if($weapon!=''){ foreach($weapon as $value): $count = $count+1;
                    //if($value->mcat!='' || $value->ecat!='' || $value->locat!=''){
                   ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->weapon;?></td>
                    <td><?php echo $value->bore; ?></td>
                    <td><?php echo $value->amuqty; $hold = fetchoneinfoammu('newwepon_dataqtyp',array('bore' => $value->bore , 'arm' => $value->weapon, 'bat_id' => $this->session->userdata('userid'))); ?></td>
                    <td><?php echo $value->mcat; //$m = info_fetch_misscart($value->bore,$this->session->userdata('userid'),'Practice'); if($m){ echo $m->mcat;} ?></td>
                    <td><?php echo $value->ecat; //$e =  info_fetch_ecat($value->bore,$this->session->userdata('userid'),'Practice'); if($e){echo $e->ecat;} ?></td>
                    <td><?php echo $value->locat; //$l =  info_fetch_lcat($value->bore,$this->session->userdata('userid'),'Practice'); if($l){ echo $l->locat;} ?></td>
                    <td><?php echo $value->lcat; //$f = info_fetch_ammuinus($value->bore,$this->session->userdata('userid'),'Practice'); if($f){echo $f->qnty;} ?></td>
                    <td><a href="<?php echo base_url('bt-nodellistp').'/'.$value->deposit_ammu_id.'/'.$hold->nwep_id; ?>" class="btn btn-primary btn-xs">Return to</a> </td>
                    </tr>
                <?php //}
                 endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->   
        </div><!-- panel-body -->
        </div><!-- panel -->
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("#table1").dataTable(),
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control")
});
</script>
</body>
</html>