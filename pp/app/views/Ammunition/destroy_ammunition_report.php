<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Ammunition Destroyed/Disposed Report</title>
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
      .bg-red{background-color:red;color:white;}
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
      <h3> &nbsp;  &nbsp; Ammunition Destroyed/Disposed</h3>
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
          <div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			
			<div class="col-md-3">
			    <div class="form-group">
				<?php  
                                    echo form_dropdown('ammunition_type', $ammunition_type, set_value('ammunition_type'),'id="ammunition_type" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required onChange="getWeaponsWithBore()"'); 
                                    echo form_error('ammunition_type');
                                ?>
        		    </div>
			</div>
                        <div class="col-md-3">
			    <div class="form-group">
				<?php  
                                    echo form_dropdown('ammunition[]', [], set_value('ammunition'),'id="ammuniotion" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required multiple'); 
                                    echo form_error('ammunition');
                                ?>
        		    </div>
			</div>
                        <div class="col-md-3">
			    <div class="form-group">
				<?php  
                                    $date_from = array('type' => 'text','name' => 'date_from','id' => 'date_from_id','class' => 'form-control','placeholder' =>'Select Date From','value' => set_value('date_from'));
    echo form_input($date_from);
    echo form_error('date_from');
                                ?>
        		    </div>
			</div>
                        <div class="col-md-3">
			    <div class="form-group">
				<?php  
                                    $date_to = array('type' => 'text','name' => 'date_to','id' => 'date_to_id','class' => 'form-control','placeholder' =>'Select Date To','value' => set_value('date_to'));
    echo form_input($date_to);
    echo form_error('date_to');
                                ?>
        		    </div>
                        </div><BR><BR><br>
                        <div class="col-md-3">
			    <div class="form-group">
				<?php  
                                    $order_number = array('type' => 'text','name' => 'order_number','id' => 'order_number_id','class' => 'form-control','placeholder' =>'Enter Order Number','value' => set_value('order_number'));
    echo form_input($order_number);
    echo form_error('order_number');
                                ?>
        		    </div>
			</div>
                       
			<div class="col-md-6">
                            <table><tr><td>
				<div class="form-group">
					<input type="submit" value="Submit" onClick="search();return false;" class="btn btn-default">
					<!--input type="submit" class="btn btn-primary" value="Download" name="download"-->
					
				</div>
				</td><td>
				<!--div class="form-group">
					
					<input type="checkbox" id="hideZeroWeapons" name="hideZeroWeapons" <?php if(null!=$this->input->post('hideZeroWeapons')){echo 'checked'; }?>>
					&nbsp;<label for="hideZeroWeapons">Skip Zero Weapons </label>
				</div-->
				</td></tr>
                            </table>
			</div>
		</div>
	</div>
</div>
          <div class="panel panel-default col-md-12">
            <div class="panel-body">
                <table class="table table-bordered" id="conversion_report_table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Ammunition Type</th>
								<th>Ammunition Bore</th>
								<th>Disposed Quantity</th>
								<th>Order By</th>
								<th>Order Number</th>
								<th>Order Date</th>
								<th>Deleted</th>
								<th>Action</th>
								<th>Created</th>
								<th>Destroyed By</th>
								
							</tr>
						</thead>
						<tbody>
                                                    <?php for($i=0;$i<20;$i++){?>
							<tr>
								<td><?php echo $i+1; ?></td>
								<td><?php echo 'Service'; ?></td>
								<td><?php echo 'AK - 47'; ?></td>
								<td><?php echo '10' ?></td>
									
								<td><?php echo 'DGP Pb.'; ?></td>
								<td><?php echo '123-09'; ?></td>
								<td><?php echo '11/11/1199'; ?></td>
								<td><?php echo 'NO'; ?></td>
								<td><?php echo 'Roll back'; ?></td>
								<td><?php echo '11/11/1991'; ?></td>
								<td><?php echo '27 KHC'; ?></td>
							</tr>
                                                    <?php }?>
						</tbody>
						
					</table>
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
<script src="<?php echo base_url();?>webroot/js/jquery.dataTables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

<script type="text/javascript">
    var conversion_datatable = null;
jQuery(document).ready(function(){
  "use strict";
    $('#date_from_id').datepicker({dateFormat: "dd/mm/yy"});
    $('#date_to_id').datepicker({dateFormat: "dd/mm/yy"});
    jQuery(".select2").select2({width:"100%"});
    conversion_datatable = $('#conversion_report_table').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		//bFilter: false,
		"ajax":{
			url:"<?php echo base_url().'ammunition/ajax-destroyed-ammunition-report';?>",
			type:"POST" ,
			"data":function(data){
                            data.ammunition_type = $('#ammunition_type').val(),
                            data.ammunition_id = $('#ammuniotion').val(),
                            data.date_from = $('#date_from_id').val(),
                            data.date_to = $('#date_to_id').val(),
                            data.order_number = $('#order_number_id').val()
			},
		},"columns": [
                    { "data": "sno"},
                    { "data": "ammunition_type"},
                    { "data": "ammunition_bore"},
                    { "data": "dispose_quantity"},
                    { "data": "order_by"},
                    { "data": "order_number"},
                    { "data": "order_date"},
                    { "data": "deleted"},
                    { "data": "action"},
                    { "data": "created"},
                    { "data": "transaction_by"},
                 ],
		 "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5,6,7,8,9,10],  
                     "orderable":false,  
                },
                
            ], 
                   "createdRow": function(row, data, dataIndex ) {
                       console.log(dataIndex);
                       console.log(data);
                       console.log(data.deleted);
                       console.log(row);
                    if (data.deleted == "YES" ) {
                      $(row).addClass('bg-red');
                    }
                  }
	});
});
function search(){
    conversion_datatable.draw();
}
function getWeaponsWithBore(){
    conversion_type = $('#ammunition_type').val();
    console.log(conversion_type);
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
                        break;
                    case 'PRACTICE':
                        setFromAmmunition(data.practice_ammunitions,'practice');
                        break;
                }
            }
        }
      });
}
function setFromAmmunition(ammunitions,type){
    
    console.log('Set From Ammunition');
    //if(type=='service'){
        //$('#from_ammunition_label').html('Select Service Ammunition Bore From');
        //$('#from_ammunition_quantity_label').html('Available  Service Ammunition Quantity');
        //$('#conversion_label').html('Enter the Ammunition Quantity to be converted From Service to Pracitce Ammunition');
        $('#ammuniotion').empty();
        //$('#ammuniotion').append('<option value="">-- Select Ammunition --</option>');
        $.each(ammunitions,function(index,value){
            $('#ammuniotion').append('<option value="'+index+'">'+value+'</option>');
        });
        $('#ammuniotion').trigger('change');
   // }
}
function restoreRecord(id){
    if(confirm('Are you sure you want to restore the ammunition back?')){
    $.ajax({
        type: "POST",
        data:{
            id:id
        },
        url: "<?php echo base_url();?>ammunition/ajax-destroyed-ammunition-restore",
        cache: false,
        success: function(html){
            data = JSON.parse(html);
            if(data.status==true){
                alert('Restored Successfull')
                search();
            }else{
                alert('Restoration Failed')
            }
        }
      });
      }else{
      alert('Restoration Cancled');
      }
}
</script>


<?php //var_dump($this->input->post()); 
unset($_SESSION['success_msg']);?>
</body>
</html>