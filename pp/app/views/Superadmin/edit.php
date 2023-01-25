<!DOCTYPE html>
<html lang="en">
<head>
<noscript> <META http-equiv="refresh" content="0; URL=<?php echo base_url();?>noscript"> </noscript>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Foodforu::Edit <?php echo $Restaurant->restaurant_name; ?> Restaurant</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/plugin/fileupload/fileinput.css" />
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('html/navbar'); ?>
 <div class="mainpanel">
<?php $this->load->view('html/headbar'); ?>
    <div class="pageheader">
      <h2><i class="fa fa-building-o"></i> <?php echo $Restaurant->restaurant_name; ?> Restaurant</h2>
      <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="active"><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
          <li class="active"><a href="<?php echo base_url();?>restaurant">Restaurant</a></li>
          <li class="active">Edit Restaurant</li>
        </ol>
      </div>
    </div>
    <div class="contentpanel">
      <div class="row">
                <div class="col-md-12">     
      <?php if($this->session->flashdata('error_msg')): ?>
      	<div class="alert alert-warning alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
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
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title"><i class="fa fa-edit"></i> Edit  <?php echo $Restaurant->restaurant_name; ?>  Restaurant <a href="<?php echo base_url();?>restaurant">(<i class="fa fa-reply"></i> Go Back)</a></h4>
              </div>
              <div class="panel-body">	
                <div class="form-group">
                  <label class="col-sm-3 control-label">Restaurant Name</label>
                  <div class="col-sm-9">
                                  <?php 
/*rname Textfield*/
$rname = array('type' => 'text','name' => 'rname','id' => 'rname','class' => 'form-control','title' => 'Enter Restaurant','placeholder' =>'Enter Restaurant','required' => 'required','value' => $Restaurant->restaurant_name);
echo form_input($rname);
echo form_error('rname');
/*----End rname Textfield----*/
?>
                    <label class="error" for="rname"></label>
                  </div>
                </div><!-- form-group -->
                          
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Restaurant Area</label>
                  <div class="col-sm-9">
<?php  
$newarea = array();
foreach($arealist as $arealists):
$newarea[$arealists->area_id] = $arealists->area_name; 
endforeach;
/*newarea Textfield*/
 echo form_dropdown('newarea[]', $newarea, explode(",",$Restaurant->area_ids),'id="newarea" data-placeholder="Choose One" title="Please select at least 1 area" class="select2" multiple="multiple" required'); 
 echo form_error('newarea');
/*----End newarea Textfield----*/
 ?>
                    <label class="error" for="newarea"></label>
                  </div>
                </div><!-- form-group -->
                
                         <div class="form-group">
                  <label class="col-sm-3 control-label">Restaurant Street</label>
                  <div class="col-sm-9">
                 <?php  
$newstreet = array();
foreach($streetlist as $streetlists):
$newstreet[$streetlists->streetlist_id] = $streetlists->street_name."(".$streetlists->area_name.")";  
endforeach;
/*newarea Textfield*/
 echo form_dropdown('newstreet[]',$newstreet, explode(",",$Restaurant->streetlist_ids),'id="newstreet" data-placeholder="Choose One" title="Please select at least 1 street" class="select2" multiple="multiple" required'); 
 echo form_error('newstreet');
/*----End newarea Textfield----*/
 ?>
                    <label class="error" for="newstreet"></label>
                  </div>
                </div><!-- form-group -->
                
                    <div class="form-group">
                  <label class="col-sm-3 control-label">Restaurant Email</label>
                  <div class="col-sm-9">
                                  <?php 
/*remail Textfield*/
$remail = array('type' => 'text','name' => 'remail','id' => 'remail','class' => 'form-control','title' => 'Enter Restaurant Email','placeholder' =>'Enter Restaurant Email', 'required' => 'required','value' => $Restaurant->restaurant_email);
echo form_input($remail);
echo form_error('remail');
/*----End remail Textfield----*/
?>
                    <label class="error" for="remail"></label>
                  </div>
                </div><!-- form-group -->
                 
                    <div class="form-group">
                  <label class="col-sm-3 control-label">Restaurant Phone</label>
                  <div class="col-sm-9">
                                  <?php 
/*rphone Textfield*/
$rphone = array('type' => 'text','name' => 'rphone','id' => 'rphone','class' => 'form-control','title' => 'Enter Restaurant Phone','placeholder' =>'Enter Restaurant Phone', 'required' => 'required','value' => $Restaurant->restuarant_mobile, 'maxlength' => '10');
echo form_input($rphone);
echo form_error('rphone');
/*----End rphone Textfield----*/
?>
                    <label class="error" for="rphone"></label>
                  </div>
                </div><!-- form-group -->
               
                    <div class="form-group">
                  <label class="col-sm-3 control-label">Restaurant Photo</label>
                  <div class="col-sm-9">
                <input  name="file" type="file" class="file" id="file-0" title="Upload Restaurant Photo"/>
      				
                  </div>
                </div><!-- form-group -->      
              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    
                  </div>
                </div>
              </div><!-- panel-footer -->
          </div><!-- panel -->
          </form>
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
<script src="<?php echo base_url();?>webroot/plugin/fileupload/fileinput.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script src="<?php echo base_url();?>webroot/js/restroadd.js"></script>
</body>
</html>