<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Dispose/Destroy Ammunition</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
    <style type="text/css">
      .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
      #country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
      #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
      #country-list li:hover{background:#F0F0F0;}
      #search-box{padding: 10px;border: #F0F0F0 1px solid;}
      ul#errorMessages{margin-left:0px;padding-left:0px;margin-top:10px;}
      ul#errorMessages>li{list-style: none;background-color:red;color:#f9eaea;padding:5px 5px 5px 20px;margin:2px;border-radius:5px;}
      .error{color:red;}
    </style>
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
      <h3> &nbsp;  &nbsp; Dispose/Destroy Ammunition</h3>
    </div>
    <div class="contentpanel">
      <div class="row">
        <div class="col-md-12"> 
          <?php if($this->session->flashdata('success_msg')): ?>
          <div class="alert alert-success alert-dismissible" id="warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
            
          </div>
          <?php    endif; ?>         
          <?php if($this->session->flashdata('error_msg')): ?>
          <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
          </div>
          
          <?php  endif; ?>
          
          <div class="panel panel-default col-md-12">
            <div class="panel-body">
           	<form method="post">
              <div class="form-group"  id="prac2">
             	<div class="col-md-7">
                	<label class="control-label">Select Ammunition Type</label>
            	</div>
            	<div class="col-md-5">
                  <?php 
                    echo form_dropdown('ammunition_type', $ammunition_type, set_value('ammunition_type'),'id="ammunition_type" data-placeholder="Choose One" title="Please select at least 1 value" onChange="getWeaponsWithBore()" class="select2" required'); 
                    echo form_error('ammunition_type');
                    /*----End newarea Textfield----*/
                  ?>
                	<label for="tow" class="error"></label>
            	</div>
              </div> 
             <div class="form-group"  id="prac2">
             	<div class="col-md-7">
                	<label class="control-label" id="from_ammunition_label">Select Service Ammunition Bore</label>
            	</div>
            	<div class="col-md-5">
                  <?php 
                    echo form_dropdown('ammunition', $ammunition, set_value('ammunition'),'id="ammuniotion" data-placeholder="Choose One" title="Please select at least 1 value" onChange="setServiceAmmunitionQuantity(this,\'from\')" class="select2"'); 
                    echo form_error('ammunition');
                    /*----End newarea Textfield----*/
                  ?>
                	<label for="tow" class="error"></label>
            	</div>
              </div> 
           
                    <div class="form-group" id="from_div_ammunition_quantity" style="display:none;"><!-- id="serv1"  -->
                <div class="col-md-7">
                	<label class="control-label" id="from_ammunition_quantity_label">Service Ammunition Quantity</label>
            	</div>
            	<div class="col-md-5">

            		<?php 
$service_ammunition_quantity = array('type' => 'text','name' => 'service_ammunition_data_quantity','id' => 'from_service_ammunition_data_quantity','hh'=>true,'class' => 'form-control','placeholder' =>'-','value' => set_value('service_ammunition_data_quantity'),'disabled'=>true);
echo form_input($service_ammunition_quantity);
echo form_error('service_ammunition_data_quantity');
?>
   
                 
                	<label for="tow" class="error"></label>
            	</div>
             </div>
             
             <div class="form-group">
                <div class="col-md-7">
                	<label class="control-label" id="conversion_label" for="practice_ammunition_quantity">Enter Ammunition Quantity to be disposed/destroyed</label>
            	</div>
            	<div class="col-md-5">

            		<?php 
$dispose_quantity = array('type' => 'text','name' => 'dispose_quantity','id' => 'dispose_quantity','class' => 'form-control','placeholder' =>'Enter Ammunition Quantity to be disposed/destroyed','value'=>set_value('dispose_quantity'));
echo form_input($dispose_quantity);
echo form_error('dispose_quantity');
?>
                	<label for="tow" class="error" id="errorMessage"></label>
                        <div>
                            <ul id="errorMessages">
                                
                            </ul>
                        </div>
            	</div>
             </div>
             <div class="form-group">
                <div class="col-md-7">
                	<label class="control-label" id="to_ammunition_quantity_label">Order By</label>
            	</div>
            	<div class="col-md-5">

            		<?php 
                    echo form_dropdown('order_by', $order_by, set_value('order_by'),'id="order_by" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
                    echo form_error('order_by');
?>
   
                	<label for="tow" class="error"></label>
            	</div>
             </div>
             <div class="form-group"  id="">
                <div class="col-md-7">
                	<label class="control-label" for="order_number">Enter Order Number</label>
            	</div>
            	<div class="col-md-5">
            		<?php 
$order_number = array('type' => 'text','name' => 'order_number','id' => 'order_number','class' => 'form-control','placeholder' =>'Enter Order Number','value'=>set_value('order_number'));
echo form_input($order_number);
echo form_error('order_number');
?>
                	<label for="tow" class="error"></label>
            	</div>
             </div>
             <div class="form-group"  id="">
                <div class="col-md-7">
                	<label class="control-label" for="order_number">Enter Order Date</label>
            	</div>
            	<div class="col-md-5">
            		<?php 
$order_date = array('type' => 'text','name' => 'order_date','id' => 'order_date','class' => 'form-control','placeholder' =>'Enter Order Date','value'=>set_value('order_date'));
echo form_input($order_date);
echo form_error('order_date');
?>
                	<label for="tow" class="error"></label>
            	</div>
             </div>
             <div>
                <div class="form-group"  id="serv1">
                <label class="control-label">&nbsp;</label><br>
                <input type="submit" class="btn btn-primary" place-holder="Enter Body Number" name="submit" value="Submit" id="serviceTOAmmunition">
               
              </div>
            </div>
          </form>
         </div>
      </div>
    </div>
</div>


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
    var from_ammunition_bore = null;
    var from_quantity = null;
    //var to_ammunition_bore = null;
   // var to_quantity = null;
    var conversion_type = '<?php echo $conversion_type; ?>';
    var changing_quantity = null;
    var submitted = <?php echo $submitted?'true':'false'; ?>;
    var successful_submission = null;
    $(document).ready(function(){
        "use strict";
  jQuery(".select2").select2({width:"100%"});
    <?php if(!$this->session->flashdata('success_msg')){ ?>
    if(submitted==true){
        successful_submission = false;
        from_ammunition_bore = <?php echo $from_id; ?>;
        //to_ammunition_bore = <?php echo $to_id; ?>;
        $('#ammuniotion').val(from_ammunition_bore);
        $('#ammuniotion').trigger('change');
        //$('#to_ammuniotion').val(to_ammunition_bore);
        //$('#to_ammuniotion').trigger('change');
        //$('#to_div_ammunition_selection').css('display','');
        changing_quantity = <?php echo $changing_quantity; ?>;
    }else{
        successful_submission = null;
    }
    
    <?php }else{ ?>
    successful_submission = true;
        from_ammunition_bore = <?php echo $from_id; ?>;
        //to_ammunition_bore = <?php echo $to_id; ?>;
        changing_quantity = <?php echo $changing_quantity; ?>;
        $('#ammuniotion').val(from_ammunition_bore);
        $('#ammuniotion').trigger('change');
        //$('#to_ammuniotion').val(to_ammunition_bore);
        //$('#to_ammuniotion').trigger('change');
        //$('#to_div_ammunition_selection').css('display','');
        setTheQuanitities();
    <?php } ?>
        });
jQuery(document).ready(function(){
  
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }), // Date Picker
  //jQuery('#datepicker1').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#order_date').datepicker({dateFormat: "dd/mm/yy"});
 
$('#dispose_quantity').keyup(function(e){
    if(parseInt(this.value)>0){
        changing_quantity = parseInt(this.value);
        if(from_quantity!=null){
            $('#from_service_ammunition_data_quantity').val(from_quantity-this.value);
        }
    }else{
        changing_quantity = 0;
        $('#from_service_ammunition_data_quantity').val(from_quantity);
    }
    generateErrorMessage();
});
    //submitted=false;
    getWeaponsWithBore();
});

function setServiceAmmunitionQuantity(aa,pre_id){
    //return false;
    var type = null;
    
    if(!Array('',null,0,'0').includes(aa.value)){
        switch(conversion_type){
            case 'SERVICE':
                if(pre_id=='to' || pre_id=='from'){
                    type='SERVICE';
                }
                break;
            case 'PRACTICE':
                if(pre_id=='to' || pre_id=='from'){
                    type='PRACTICE';
                }
                break;
            case 'SERVICE_TO_PRACTICE':
                if(pre_id=='to'){
                    type = 'PRACTICE';
                }else if(pre_id=='from'){
                    type= 'SERVICE';
                }
                break;
            case 'PRACTICE_TO_SERVICE':
                if(pre_id=='to'){
                    type = 'SERVICE';
                }else if(pre_id=='from'){
                    type= 'PRACTICE';
                }
                break;
            default:
                type = null;
                break;
        }
	console.log(pre_id);
	 var data = {
        'ammunition':aa.value,
        'type':type
      }
      
      //console.log(arms);
      //console.log(data);
      if(!(Array('',null,0,'0').includes(aa.value))){
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>ammunition/get-ammunition-quantity",
          data: data,
          cache: false,
          success: function(html){
                    if(pre_id=='from'){
                        if(html=='Negative'){
                            from_quantity = 0;
                            if(changing_quantity!=null){
                                $('#'+pre_id+'_service_ammunition_data_quantity').val(from_quantity-changing_quantity);
                            }else{
                              $('#'+pre_id+'_service_ammunition_data_quantity').val(from_quantity);
                            }
                        }else{
                            from_quantity = parseInt(html);
                            if(changing_quantity!=null){
                                $('#'+pre_id+'_service_ammunition_data_quantity').val(from_quantity-changing_quantity);
                            }else{
                              $('#'+pre_id+'_service_ammunition_data_quantity').val(from_quantity);
                            }
                        }
                        $('#'+pre_id+'_div_ammunition_quantity').css('display','');
                    }
                    $('#'+pre_id+'_div_ammunition_quantity').css('display','');
                    generateErrorMessage();
          }
        });  
      }
      
}
}
function getWeaponsWithBore(){
    conversion_type = $('#ammunition_type').val();
    if(successful_submission!=true && submitted!=true){
    $.ajax({
        type: "POST",
        data:{
            ammunition_type:conversion_type
        },
        url: "<?php echo base_url();?>ammunition/ajaxGetAmmunitionBores",
        cache: false,
        success: function(html){
            data = JSON.parse(html);
            if(data.status==true){
                switch(conversion_type){
                    case 'SERVICE':
                        setFromAmmunition(data.service_ammunitions,'service');
                        //setToAmmunition(data.service_ammunitions,'service');
                        reset();
                        //generateErrorMessage();
                        break;
                    
                    case 'PRACTICE':
                        setFromAmmunition(data.practice_ammunitions,'practice');
                        //setToAmmunition(data.practice_ammunitions,'practice');
                        reset();
                        //generateErrorMessage();
                        break;
                }
            }
        }
      });
      }
}
function setFromAmmunition(ammunitions,type){
    
    console.log('Set From Ammunition');
    //if(type=='service'){
        $('#from_ammunition_label').html('Select Service Ammunition Bore From');
        $('#from_ammunition_quantity_label').html('Available  Service Ammunition Quantity');
        //$('#conversion_label').html('Enter the Ammunition Quantity to be converted From Service to Pracitce Ammunition');
        $('#ammuniotion').empty();
        $('#ammuniotion').append('<option value="">-- Select Ammunition --</option>');
        $.each(ammunitions,function(index,value){
            $('#ammuniotion').append('<option value="'+index+'">'+value+'</option>');
        });
        $('#ammuniotion').trigger('change');
    //}
}
function setToAmmunition(ammunitions,type){
    if(type='practice'){
        $('#to_ammuniotion').empty();
        $('#to_ammuniotion').append('<option value="">-- Select Ammunition --</option>');
        $.each(ammunitions,function(index,value){
            $('#to_ammuniotion').append('<option value="'+index+'">'+value+'</option>');
        })
        //$('#to_ammuniotion').trigger('change');
        $('#to_ammunition_label').html('Select Practice Ammunition Bore To');
        $('#to_ammunition_quantity_label').html('Available Practice Ammunition Quantity');
        $('#to_div_ammunition_selection').css('display','');
    }else if(type=='service'){
         $('#to_ammuniotion').empty();
        $('#to_ammuniotion').append('<option value="">-- Select Ammunition --</option>');
        $.each(ammunitions,function(index,value){
            $('#to_ammuniotion').append('<option value="'+index+'">'+value+'</option>');
        })
        $('#to_ammuniotion').trigger('change');
        $('#to_ammunition_label').html('Select Service Ammunition Bore To');
        $('#to_ammunition_quantity_label').html('Available Service Ammunition Quantity');
        $('#to_div_ammunition_selection').css('display','');
    }
}
function reset(){
    console.log('Reset called');
    if(submitted!=true){
        $('#ammuniotion').trigger('change');
        $('#to_ammuniotion').val('');
        $('#to_ammuniotion').trigger('change');
        $('#from_service_ammunition_data_quantity').val(0);
        $('#to_service_ammunition_data_quantity').val(0);
        $('#practice_ammunition_quantity').val(0);
        from_ammunition_bore = null;
        from_quantity = null;
        to_ammunition_bore = null;
        to_quantity = null;
        
        changing_quantity = null;
    }
}
    function generateErrorMessage(){
        
        var id="errorMessages";
        var icon = '<i class="fa fa-exclamation-triangle"></i> ';
        $('#'+id).html('');
        if(from_quantity==null){
            if(from_quantity==null){
                $('#'+id).append('<li>'+icon+'Select the From Ammunition</li>');
            }/*if(to_quantity==null){
                $('#'+id).append('<li>'+icon+'Select the To Ammunition</li>');
            }*/
            
        }
        if(changing_quantity!=null){
            if(from_quantity!=null){
                if(from_quantity-changing_quantity<0){
                    $('#'+id).append('<li>'+icon+'Not Possible to Dispose/Destroy such quantity of ammunition.</li>');
                }
            }
        }
    }
    function setTheQuanitities(){
        console.log('set quantities called');
        if(submitted==true && changing_quantity!=null){
            
            if(from_quantity!=null){
                $('#'+pre_id+'_service_ammunition_data_quantity').val(from_quantity-changing_quantity);
            }
            
        }
    }
    $(document).ready(function(){
        successful_submission=null;
        submitted=null;
    });
</script>


<?php //var_dump($this->input->post()); 
unset($_SESSION['success_msg']);?>
</body>
</html>