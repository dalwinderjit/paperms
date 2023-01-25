<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Account Branch</title>
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
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
  <?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
  <?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp;  &nbsp; Account Branch</h3>
    </div>
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
					<div class="row">
						<div class="col-md-6" id="sandbox-container">
							<div class="input-daterange input-group" id="datepicker">
								<span class="input-group-addon">Date From : </span>
								<input type="text" class="form-control" name="startDate" id="startDate"/>
								<span class="input-group-addon">Date To</span>
								<input type="text" class="form-control" name="endDate" id="endDate"/>
							</div>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" id="soe"/>
						</div>
						<div class="col-md-3">
							<button onClick="search()" class="btn btn-primary">Search</button>
							<button onClick="downloadExcel()" class="btn btn-primary">Download</button>
						</div>
					</div>
					<table class="table table-bordered table-striped dataTable no-footer" id="bill-table">
						<thead>
							<tr>
								<th>S. No.</th>
								<th>Name of Soe's</th>
								<th>Allotment Year</th>
								<th>Expenditure W.E.F. Date)</th>
								<th>Bill Submitted Into Treasury Upto (date) </th>
								<th>Balance Fund Upto (5 =2-3-4)</th>
								<th>Bill Submitted Treasury upto date after total Pending liabilities</th>
								<th>Date</th>
								<th>Remark about balance fund</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php if(false){ ?>
						<!--tbody>
						<?php $sno = 1;foreach($bills as $k=>$val){ ?>
							<tr>
								<td><?php echo $sno; ?></td>
								<td><?php echo $val->name; ?></td>
								<td><?php echo $val->amount_alloted; ?></td>
								<td><?php echo $val->expenditure_amount; ?></td>
								<td><?php echo $val->bill_sub_treasury; ?></td>
								<td><?php echo ($val->amount_alloted-$val->expenditure_amount-$val->bill_sub_treasury); ?></td>
								<td><?php echo $val->bill_sub_treasury_after_liabilities; ?></td>
								<td><?php echo $val->date; ?></td>
								<td><textarea class="punjabi" disabled cols="40" rows="4"><?php echo $val->remarks;?></textarea></td>
								<td><?php  echo '<a href="'.base_url().'accounts-edit-bill/'.$val->bill_id.'" class="glyphicon glyphicon-pencil black"></a>';?> | <?php echo '<a href="'.base_url().'accounts-delete-bill/'.$val->bill_id.'"class="glyphicon glyphicon-trash red"></a>';?></td>
							</tr>
						<?php $sno++;} ?>
						</tbody-->
						<?php } ?>
					</table>
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
var idOfBillToBeDeleted = 0;
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
  
  $('#sandbox-container .input-daterange [name=startDate]').datepicker({dateFormat: "dd/mm/yy"});
  $('#sandbox-container .input-daterange [name=endDate]').datepicker({dateFormat: "dd/mm/yy"});
});

$(document).ready(function(){
	dataTable = $('#bill-table').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		bFilter: false,
		"ajax":{
			url:"<?php echo base_url().'ajax-account-bill-list';?>",
			type:"POST" ,
			"data":function(data){
				data.soe = $('#soe').val(),
				data.startDate = $('#startDate').val(),
				data.endDate = $('#endDate').val()
				
			},
		},"columns": [
                    { "data": "sno"},
					{ "data": "name"},
                    { "data": "amount_alloted"},
                    { "data": "expenditure_amount"},
                    { "data": "bill_sub_treasury"},
                    { "data": "calculated"},
                    { "data": "bill_after_liab"},
                    { "data": "date"},
                    { "data": "remarks"},
                    { "data": "action"},
                 ],
		 "columnDefs":[  
                {  
                     "targets":[0,9],  
                     "orderable":false,  
                },  
           ], 
	});
	
});
function search(){
	//console.log('searching');
	dataTable.draw();
}

function showModal(id){
	$('#deleteBillMessage').html('Do you really want to delete this Bill? This process cannot be undone.');
	idOfBillToBeDeleted = id;
	$('#myModal').modal('show');
}
function deleteBill(){
	//delete the soe here
	var data = { 'bill_id':idOfBillToBeDeleted };
	$.ajax({
		type:"POST",
		url:'<?php echo base_url();?>ajax-account-bill-delete',
		data:data,
		success:function(html){
			var obj = JSON.parse(html);
			if(obj.status==true){
				$('#myModal').modal('hide');
				dataTable.draw();
			}else{
				$('#deleteBillMessage').html('Unable to delete the Bill.');
			}
		}
	})	
}
function downloadExcel(){
	var soe = $('#soe').val();
	$.ajax({
		type:'POST',
		url:"ajax-accounts-bill-download-excel",
		data:{
			'soe':soe,
		},
		dataType:'json'
	}).done(function(data){
		var $a = $("<a>");
		$a.attr("href",data.file);
		$("body").append($a);
		$a.attr("download","file.xls");
		$a[0].click();
		$a.remove();
	});
}
</script>
</form>

<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title w-100">Are you sure?</h4>	
			</div>
			<div class="modal-body">
				<p id="deleteBillMessage">Do you really want to delete this Bill? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a type="button" class="btn btn-danger" id="deleteButton" onClick="deleteBill()">Delete</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>