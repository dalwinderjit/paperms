<!DOCTYPE html>
<html lang="en">
<head>
<noscript> <META http-equiv="refresh" content="0; URL=<?php echo base_url();?>noscript"> </noscript>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>User Login Panel</title>
  <link href="<?php echo base_url(); ?>webroot/css/style.default.css" rel="stylesheet">
  <style type="text/css">
    body{
      background: url('<?php echo base_url();?>webroot/images/warty-final-ubuntu.jpg');
      color: #000;
    }
    .page-header{
      border-bottom: 1px #000 solid;
    }
    .signinpanel form{
      border: 1px solid #2a2727;
    }

    .signinpanel{
      margin: 1% auto 0 auto;
    }
    .marginb{
      margin-bottom: 20px;
    }
    .marginl{
      margin-left: 230px;
    }
    
  </style>
</head>
<body >
<section> 
 <h2 class="page-header text-center">Electronic Resource Management System</h2>
 <h3 class="text-center">Armed Wing (Punjab Police)</h3>
    <div class="signinpanel">
        <div class="row">    
            <div class="col-md-5 marginl">
            <img src="<?php echo base_url(); ?>webroot/images/logo.png" class="col-xs-offset-4 marginb"/>         
                    <?php if($this->session->flashdata('msg')): ?>
      	<div class="alert alert-warning alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> <?php echo $this->session->flashdata('msg'); ?>
</div>
      <?php  endif; ?>
                             <?php 
 /*Form Validation set*/
 $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
			'name'		 		=> 'basicForm4',
			'id'		 		=> 'basicForm4',
			'accept-charset' 	=> 'utf-8',
			'autocomplete' 		=>'off', 
			'class'             => 'margin-bottom-0'
			);
 echo form_open("", $attributes);
?>
                    <h4 class="nomargin">User Login</h4>
                
                    <?php 
/*super_username Textfield*/
$tsuper_username = array('type' => 'password','name' => 'super_username','id' => 'super_username','class' => 'form-control uname','title' => 'Enter your Username','placeholder' =>'Enter your Username','Onclick' => 'abc()');
echo form_input($tsuper_username);
echo form_error('super_username');
/*----End super_username Textfield----*/
?>

 <?php 
/*super_password Textfield*/
$tsuper_password = array('type' => 'password','name' => 'super_password','id' => 'super_password','class' => 'form-control pword','title' => 'Enter your Password','placeholder' =>'Enter your Password');
echo form_input($tsuper_password);
echo form_error('super_password');
/*----End super_password Textfield----*/
?>
                  <button type="submit" class="btn btn-success btn-block">Sign In</button>  
                </form>
            </div><!-- col-sm-5 -->
        </div><!-- row -->       
    </div><!-- signin --> 
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }


});
 function abc(){
  var textBox = document.getElementById("super_username");
var textLength = textBox.value.length;
if(textLength > 10)
{
   $('#super_username').prop("readonly", true); // Element(s) are now enabled.
}
else
{

}
 }
</script>
</body>
</html>