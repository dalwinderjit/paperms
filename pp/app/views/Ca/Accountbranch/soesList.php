<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Account Branch | SOE's Management</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
    <style type="text/css">
      .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
      #country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
      #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
      #country-list li:hover{background:#F0F0F0;}
      #search-box{padding: 10px;border: #F0F0F0 1px solid;}
    </style>
  </head>
  <body>
<!-- Preloader -->
<!div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
  <?php $this->load->view(F_CA.'html/navbar'); ?>
  <div class="mainpanel">
  <?php $this->load->view(F_CA.'html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp;  &nbsp; Account Branch | SOE's Management </h3>

		<div class="contentpanel">
		  <div class="row">
			<div class="col-md-12"> 
			  <?php if($this->session->flashdata('success_msg')): ?>
			  <div class="alert alert-success alert-dismissible" id="warning" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
			  </div>
			  <?php  endif; ?>         
			  <?php if($this->session->flashdata('error_msg')): ?>
			  <div class="alert alert-warning alert-dismissible" id="warning" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
			  </div>
			  
			  <?php  endif; ?>
			   <div class="panel panel-default col-md-12">
				<div class="panel-body">
					<div class="col-md-12">
						<table class="table" id="soe-table">
							<thead>
								<tr>
									<th>S. No.</th>
									<th>SOE Title</th>
									<th>Action</th>
									<th>Created Date </th>
								</tr>
							</thead>
							<?php if(false){ ?>
							<tbody>
								<?php $sno = 1; foreach($soes as $k=>$val){ ?>
								<tr>
									<td><?php echo $sno; ?></td>
									<td><?php echo $val->name; ?></td>
									<td><?php echo '<a href="'.base_url().'account-soe-edit/'.$val->id.'" class="glyphicon glyphicon-pencil black"></a>';?> | <?php echo '<a href="'.base_url().'account-soe-delete/'.$val->id.'"class="glyphicon glyphicon-trash red"></a>';?> </td>
									<td><?php echo $val->created; ?></td>
								</tr>
								<?php $sno++;} ?>
							</tbody>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
			  
			</div>
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

<script src="<?php echo base_url();?>webroot/js/jquery.dataTables.min2015.js"></script>
<script src="<?php echo base_url();?>webroot/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
var idOfSoeToBeDeleted = 0;
jQuery(document).ready(function(){
  "use strict";
  jQuery(".select2").select2({width:"100%"}),
  jQuery("#basicForm4").validate({
    highlight:function(e){
    jQuery(e).closest(".form-group").removeClass("has-success").addClass("has-error")},
    success:function(e){jQuery(e).closest(".form-group").removeClass("has-error")}
  }), // Date Picker
  //jQuery('#datepicker1').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#datepickeri').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#odate').datepicker({dateFormat: "dd/mm/yy"});
});

$(document).ready(function(){
	dataTable = $('#soe-table').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		//bFilter: false,
		"ajax":{
			url:"<?php echo base_url().'ajax-account-soe-list';?>",
			type:"POST" ,
			"data":function(data){
				data.search = $('.dataTables_filter>label>input[type=search]').val();
			},
		},"columns": [
                    { "data": "sno"},
					{ "data": "name"},
                    { "data": "created"},
                    { "data": "action"},
                 ],
		 "columnDefs":[  
                {  
                     "targets":[0,3],  
                     "orderable":false,  
                },  
           ], 
	});
	
});
function search(){
	console.log('searching');
	dataTable.draw();
}
function showModal(id){
	$('#deleteSoeMessage').html('Do you really want to delete these records? This process cannot be undone.');
	idOfSoeToBeDeleted = id;
	$('#myModal').modal('show');
}
function deleteSoe(){
	//delete the soe here
	var data = { 'soe_id':idOfSoeToBeDeleted };
	$.ajax({
		type:"POST",
		url:'<?php echo base_url();?>ajax-account-soe-delete',
		data:data,
		success:function(html){
			
			var obj = JSON.parse(html);
			if(obj.status==true){
				$('#myModal').modal('hide');
				dataTable.draw();
			}else{
				$('#deleteSoeMessage').html('Unable to delete the SOE as it is used in Bills. Delete the bills first.');
				//$('#myModal').modal('hide');
			}
		}
	})	
}
</script>
</form>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title w-100">Are you sure?</h4>	
				<!--div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div-->						
			</div>
			<div class="modal-body">
				<p id="deleteSoeMessage">Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a type="button" class="btn btn-danger" id="deleteButton" onClick="deleteSoe()">Delete</a>
			</div>
		</div>
	</div>
</div>     
</body>
</html>