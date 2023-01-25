<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
	<title>Posting Management</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/select2v4.min.css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-datepicker3.css" />
	<script src="<?php echo base_url(); ?>webroot/js/pagination_plugin.js"></script>
	<script>
	</script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<style type="text/css">
		.frmSearch {
			border: 1px solid #F0F0F0;
			background-color: #C8EEFD;
			margin: 2px 0px;
			padding: 40px;
		}
		#country-list {
			float: left;
			list-style: none;
			margin: 0;
			padding: 0;
			width: 190px;
		}
		#country-list li {
			padding: 10px;
			background: #FAFAFA;
			border-bottom: #F0F0F0 1px solid;
		}
		#country-list li:hover {
			background: #F0F0F0;
		}
		#search-box {
			padding: 10px;
			border: #F0F0F0 1px solid;
		}
		.modal-posting {
			width: 100%;
		}
		.modal-in-posting {
			width: 90%;
			max-width: 1200px;
		}
		.error {
			color: red;
		}
		.breadCrumbPostings ol {
			background-color: #667C2F;
			-webkit-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
			-moz-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
			box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
		}
		.breadCrumbPostings ol li a {
			color: white;
			text-decoration: none;
		}
		.posting-list>ul>li:hover {
			color: white;
			background-color: rgb(54, 91, 133);
			cursor: pointer;
		}
		.posting-list>ul>li>label {
			color: white;
			margin-top: 10px;
			cursor: pointer;
		}
		.posting-list>ul>li>input {
			margin-left: 10px;
		}
		#exampleModalLabel2 {
			padding: 10px;
			background: rgb(218, 32, 22);
			height: 40px;
			border-radius: 3px;
			color: white;
			display: table-cell;
			vertical-align: middle;
			text-align: center;
			margin: 5px;
			-webkit-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
			-moz-box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
			box-shadow: 3px 2px 5px 0px rgba(0, 0, 0, 0.75);
		}
		#searchedEmployees {
			width: 100%;
		}
	</style>
</head>
<body>
	<?php //echo validation_errors(); 
	//var_dump($selectedPolicePersonnel);
	?>
	<!-- Preloader -->
	<div id="preloader">
		<div id="status"><i class="fa fa-spinner fa-spin"></i></div>
	</div>

	<section>
		<?php $this->load->view('Btalion/html/navbar'); ?>
		<div class="mainpanel">
			<?php $this->load->view('Btalion/html/headbar'); ?>
			<div class="pageheader">
				<h3> &nbsp; &nbsp; Posting Management</h3>
			</div>
			<div class="contentpanel">
				<div class="row">
					<div class="col-md-12">
						<?php if ($this->session->flashdata('success_msg')) : ?>
							<div class="alert alert-success alert-dismissible" id="warning" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?> No. of employees posted are : <?php echo $no_of_records_inserted; ?>
							</div>
						<?php endif; ?>
						<?php if ($this->session->flashdata('error_msg')) : ?>
							<div class="alert alert-warning alert-dismissible" id="warning" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
							</div>
						<?php endif; ?>
					</div><!-- col-md-6 -->
				</div><!-- row -->
			</div><!-- contentpanel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Add Posting of Employees</h3>
					<style>
						.span_space {
							width: 200px;
							border: 1px solid black;
						}
					</style>
				</div>
				<div class="panel-body">
					<div class="row">
						<?php
						$attributes = array(
							'name'        => 'basicForm4',
							'id'        => 'basicForm4',
							'accept-charset'  => 'utf-8',
							'autocomplete'    => 'off',
							'method' => 'post',
							//'action'=>'Postings/add_employee_posting',
						);
						echo form_open_multipart("add-employees-posting", $attributes);
						$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
						?>
						<div class="col-md-9">
							<button type="button" class="btn btn-primary" onClick="posting_manager.showModal()"><span class="glyphicon glyphicon-plus" style="color:white;text-decoration:none;"></span>&nbsp;&nbsp;Select Posting</button><span id="selected_posting_name"><i>&nbsp;&nbsp;&nbsp;&nbsp;No Posting is Selected</i></span><br />
							<?php echo form_error('posting_list_name'); ?>
							<input type="hidden" value="<?php echo (null != $this->input->post('posting_list_name')) ? $_POST['posting_list_name'] : ''; ?>">
							<!-- -----------------------------------------------------------------------------------Modal design as per Surinder sir design----------------->
							<div class="modal fade modal-lg modal-posting" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
								<div class="modal-dialog modal-in-posting" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel2" class="posting-header">Select Posting from the list given below, to which you want to assign to the selected Police Personnels.</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body" id="posting_lists_">
											<div class="row text-center">
												<div class="col-md-12">
													<nav aria-label="breadcrumb" id="breadCrumb" class="breadCrumbPostings">
														<ol class="breadcrumb">
															<li class="breadcrumb-item"><a></a></li>
														</ol>
													</nav>

												</div>
											</div>
											<div class="row" id="posting_list2">
												<div style="float:left;position:relative;left:40px;" class="col-md-2">
													<select class="form-control select2" onChange="pagination.updateRecordsPerPage()" id="my_pagination_recordsPerPage">
														<option value="10">10</option>
														<option value="15">15</option>
														<option value="25">25</option>
														<option value="50">50</option>
														<option value="-1">All</option>
													</select>

												</div>
												<div class="col-md-5 text-right">
													<label for="global_radio">Search Result Under Selected Posting</label>
													<input type="checkbox" id="global_radio" name="under_posting" onClick="pagination.setIncludePosting(this);">
												</div>
												<div style="float:right;padding-right:20px;width:300px;" class="col-md-5">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Search" id="posting_name_search" />
														<span class="input-group-addon" onClick="posting_manager.searchPostingByName()">
															<i class="fa fa-search"></i>
														</span>
													</div>
												</div>
												<br><br>
												<div class="posting-list">
													<ul style="">

													</ul>
												</div>

											</div>
											<div class="row">
												<div class="col-md-5">
													<div class="dataTables_info" id="searchedPosting_detail" role="status" aria-live="polite" style="padding-left:30px;padding-top:20px;">

														Showing Postings under HOME

													</div>
												</div>
												<div class="col-md-7 text-right">
													<div class="dataTables_paginate paging_simple_numbers" id="searchedEmployees_paginate">
														<ul class="pagination my_pagination" id="my_pagination">
															<li class="paginate_button previous disabled" id="searchedEmployees_previous"><a href="#" aria-controls="searchedEmployees" data-dt-idx="0" tabindex="0">Previous</a></li>
															<li class="paginate_button active"><a href="#">1</a></li>

															<li class="paginate_button next disabled" id="searchedEmployees_next"><a href="#">Next</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">

											<button type="button" class="btn btn-primary" id="backButton" onClick="posting_manager.load_the_postings_in_posting_lists2(1);">Back</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>

										</div>
									</div>
								</div>
							</div>
							<br>
							<button type="button" class="btn btn-primary" onclick="showAddingEmployeeForm()"><span class="glyphicon glyphicon-plus" style="color:white;text-decoration:none;"></span>&nbsp;&nbsp;Add Employee</button><br><br>
							<?php echo form_error('selectedEmployeesIds'); ?>
							<div class="" style="border: 1px solid #eae8e8; padding: 20px;border-radius: 10px;    background: white;display:none;" id="addingEmployeeForm">
								<div class="row">
									<!--div class="col-md-3">
									<label for="belt_number">Belt Number</label><input type="text" id="belt_number"  class="form-control input-sm col-md-6" placeholder="Enter belt Number" ><br>
								</div-->
									<div class="col-md-6">
										<label for="belt_number">Multiple Belt Number Selection</label><br /><select class="select form-control input-sm" id="belt_nos" placeholder="Select Belt No" multiple>
											<option></option>
										</select><br>
									</div>
									<div class="col-md-3">
										<label for="phone_no">Phone Number</label><input type="text" id="phone_no" class="form-control input-sm col-md-6" placeholder="Enter Phone Number"><br>
									</div>
									<div class="col-md-3">
										<label for="empName">Name</label><input type="text" id="empName" class="form-control input-sm col-md-6" placeholder="Enter Employee Name"><br /><br />
									</div>
								</div>
								<div class="row">

									<div class="col-md-3 text-right btn-sm col-md-offset-9"><br>
										<button type="button" onClick="search()" class="btn btn-primary">Search</button>
									</div>
								</div><br>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped" id="searchedEmployees">
											<thead>
												<tr>
													<th>S.No.</th>
													<th>Rank</th>
													<th>Name</th>
													<th>Phone Number</th>
													<th>Battalion/Belt No.</th>
													<th>Action (Add All Selected) &nbsp;&nbsp;&nbsp;<a id="addEmployees" class="glyphicon glyphicon-plus addEmployees" title="Add All In the List"></a></th>
												</tr>
											</thead>
											<!--tbody>
											<tr>
												<td>Dalwinderjit Singh</td><td>8699568125</td><td>27/275</td><td><a class="glyphicon glyphicon-plus" style="color:blue;text-decoration:none;" onClick="addEmployeeToSelectedEmployees()"></a></td>
											</tr>
										</tbody-->
										</table>
										<a class="btn btn-primary" onclick="hideAddingEmployeeForm()">DONE</a>
										<!--button id="addRow" class="btn btn-primary">Add Row</button-->
									</div>
								</div>
							</div>
							<div class="" style="border: 1px solid #eae8e8; padding: 20px;border-radius: 10px;background: white;margin-top:20px;" id="addingEmployeeForm">
								<p>Selected Employees</p>
								<table class="table table-striped" id="selected_employees">
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Rank</th>
											<th>Name</th>
											<th>Phone Number</th>
											<th>Battalion/Belt No.</th>
											<th>Action</th>
										</tr>
									</thead>
									<!--tbody>
									<tr>
										<td>Dalwinderjit Singh</td><td>8699568125</td><td>27/275</td><td><a class="glyphicon glyphicon-trash" style="color:red;text-decoration:none;"></a></td>
									</tr>
								</tbody-->
								</table>

							</div><br>
							<?php //echo validation_errors(); 
							?>
							<div class="col-md-12" id="additional_posting_info_div">
								<div class="form-group">
									<select class="select select2" id="additional_posting_info" name="additional_posting_id">
										<option value="">Optional</option>
									</select>
								</div>
							</div>
							<div id="order_number_div">
								<input type="hidden" value="POSTING" name="type" id="type" />
								<label for="order_number">Order No.</label><input type="text" id="order_number" name="order_number" class="form-control" value="<?php echo (null != $this->input->post('order_number')) ? $_POST['order_number'] : ''; ?>">
								<?php echo form_error('order_number'); ?><br>
							</div>
							<div id="order_date_div">
								<label for="order_date">Order Date</label><input type="text" id="order_date" name="order_date" class="form-control" value="<?php echo (null != $this->input->post('order_date')) ? $_POST['order_date'] : ''; ?>" placeholder="Enter Order Date">
								<?php echo form_error('order_date'); ?><br>
							</div>
							<div id="leave_from_date_div">
								<label for="leave_from_date">Leave From Date</label><input type="text" id="leave_from_date" name="leave_from_date" class="form-control" value="<?php echo (null != $this->input->post('leave_from_date')) ? $_POST['leave_from_date'] : ''; ?>" placeholder="Enter Leave From Date">
								<?php echo form_error('leave_from_date'); ?><br>
							</div>
							<div id="leave_to_date_div">
								<label for="leave_to_date">Leave To Date</label><input type="text" id="leave_to_date" name="leave_to_date" class="form-control" value="<?php echo (null != $this->input->post('leave_to_date')) ? $_POST['leave_to_date'] : ''; ?>" placeholder="Enter Leave To Date">
								<?php echo form_error('leave_to_date'); ?><br>
							</div>
							<div id="posting_date_div">
								<label for="date">Date of Posting</label><input type="text" id="date" name="date" class="form-control" value="<?php echo (null != $this->input->post('date')) ? $_POST['date'] : ''; ?>" placeholder="Enter Date of Posting">
								<?php echo form_error('date');
								//var_dump($this->input->post('selectedEmployeesIds'));
								?><br>
							</div>
							<div id="leave_date_div">
								<label for="leave_date">Leave Date</label><input type="text" id="leave_date" name="leave_date" class="form-control" value="<?php echo (null != $this->input->post('leave_date')) ? $_POST['leave_date'] : ''; ?>" placeholder="Enter Leave Date">
								<?php echo form_error('leave_date');
								//var_dump($this->input->post('selectedEmployeesIds'));
								?><br>
							</div>
							<!--label for="selectedEmployeesIds">IDS</label--><input type="hidden" id="selectedEmployeesIds" name="selectedEmployeesIds" class="form-control" value="sdfdsf<?php echo (null != $this->input->post('selectedEmployeesIds')) ? ($this->input->post('selectedEmployeesIds')) : ''; ?>" />

							<input type="submit" class="btn btn-primary" name="submit" value="Add Posting" id="add_posting_button" />

						</div>

						<?php echo form_close(); ?>
						<div class="col-md-3">
							<span class="punjabi"><u>nOt:</u> </span>
						</div>
						<?php if (false) { ?>
							<div class="col-md-3" style="border: 1px solid #eae8e8; padding: 20px;border-radius: 10px;background: white;display:none;">

								<label for="selectedEmployeesIds">IDS</label><input type="text" id="selectedEmployeesIds" name="selectedEmployeesIds" class="form-control">

								<input type="submit" class="btn btn-primary" name="submit" />
							</div>
						<?php } ?>


					</div>
				</div>
			</div>

		</div>
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
	<!--script src="<?php //echo base_url();
					?>webroot/js/select2.min.js"></script-->
	<script src="<?php echo base_url(); ?>webroot/js/select2v4.min.js"></script>
	<script src="<?php echo base_url(); ?>webroot/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>webroot/js/bootstrap-timepicker.min.js"></script>
	<!--script src="<?php echo base_url(); ?>webroot/js/bootstrap-datetimepicker.js"></script-->
	<script src="<?php echo base_url(); ?>webroot/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>webroot/js/bootstrap-datepicker3.min.js"></script>
	<script src="<?php echo base_url(); ?>webroot/js/custom.js"></script>
	<!-- for datatables -->
	<script src="<?php echo base_url(); ?>webroot/js/jquery.dataTables.min2015.js"></script>
	<script src="<?php echo base_url(); ?>webroot/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>webroot/js/myPlugins/selectPosting.js"></script>

	<script type="text/javascript">
		var baseUrl = '<?php echo base_url(); ?>';
		
		
		var posting_route = [];
		var selected_posting_id = null;
		<?php
		if (null != $this->input->post('posting_list_name')) {
			$current_posting = $this->input->post('posting_list_name');
		} else {
			$current_posting = -1;
		}
		echo "var current_posting_ = $current_posting;";
		?>
		var current_posting = {
			id: 1,
			name: 'Home'
		};
		/*var leave = {
			type: 'POSTING'
		};*/
		

		/*leave.setToLeaveForm = function() { //DALWINDER
			$('#order_number_div').hide();
			$('#order_date_div').hide();
			$('#leave_from_date_div').css('display', 'inline');
			$('#leave_to_date_div').css('display', 'inline');
			$('#leave_date_div').css('display', 'inline');
			$('#posting_date_div').css('display', 'none');
			$('#type').val('LEAVE');
			//$('#addPostingButton').attr('onClick','markLeave()');
			$('#add_posting_button').val('Mark Leave');
		}
		leave.setToPostingForm = function() {
			$('#order_number_div').show();
			$('#order_date_div').show();
			$('#leave_from_date_div').css('display', 'none');
			$('#leave_to_date_div').css('display', 'none');
			$('#leave_date_div').css('display', 'none');
			$('#posting_date_div').css('display', 'inline');
			$('#type').val('POSTING');
			//$('#addPostingButton').attr('onClick','updateEmployeePosting()');
			$('#add_posting_button').val('Add Posting');
		}*/
		var posting_manager = new PostingManager(pagination,baseUrl,current_posting,current_posting_);
		posting_manager.bat_id = <?php echo $this->session->userdata('userid'); ?>;
		posting_manager.leave.leave_posting_ids = <?php echo json_encode(array_keys($leaves)); ?>;

		$(document).ready(function() {
			jQuery('#belt_nos').select2({
				'width': '100%',
				ajax: {
					url: 'postings/getbeltnumbers',
					dataType: 'json'
					// Additional AJAX parameters go here; see the end of this chapter for the full code of this example
				}
			});
			jQuery('#additional_posting_info').select2({
				'width': '100%'
			});
			jQuery('#from_date').datepicker({
				dateFormat: "dd/mm/yy 00:00:00"
			});
			jQuery('#to_time').datepicker({
				dateFormat: "dd/mm/yy 23:59:59"
			});
			jQuery('#date').datepicker({
				format: "dd/mm/yyyy"
			});
			jQuery('#order_date').datepicker({
				format: "dd/mm/yyyy"
			});
			/*jQuery('#to_time').datetimepicker({
				dateFormat: 'yy-mm-dd',
				timeFormat: 'HH:mm:ss'
			});*/
			<?php

			if (isset($previous_posting) && !empty($previous_posting)) { ?>
				posting_manager.load_the_postings_in_posting_lists2(<?php echo $previous_posting[0]->id . ',"' . $previous_posting[0]->name . '"'; ?>);
			<?php } else { ?>
				posting_manager.load_the_postings_in_posting_lists2(1, 'HOME');
			<?php } ?>
			var search_bar = document.getElementById('posting_name_search');
			search_bar.addEventListener('keypress', function(event) {
				if (event.keyCode == 13) {

					event.preventDefault();
					posting_manager.searchPostingByName();
				}
			});
		});

		/*function searchPostingByName() {
			pagination.currentPageNumber = 1;
			searchPosting();
		}

		function searchPosting() {
			/*$( "#posting_name_search" ).keyup(function(event) {
				if (event.keyCode === 13) {*/
			//alert('hi');
			/*search_text = $('#posting_name_search').val();
			var recordsPerPage = pagination.recordsPerPage
			var data = {
				'searchText': search_text,
				'recordsPerPage': pagination.recordsPerPage,
				'pageNumber': pagination.currentPageNumber,
				'includePosting': pagination.includePosting,
				'id': pagination.selectedPostingId,
				'bat_id': <?php echo $this->session->userdata('userid'); ?>
				//'id':current_posting.id
			};

			$.ajax({
				url: "<?php echo base_url(); ?>search-posting",
				type: "POST",
				data: data,
				success: function(response) {
					console.log(response);
					var obj = JSON.parse(response);
					console.log(obj['postings']);
					posting_manager.insertDataInPostingList2(obj['postings']);
					pagination.totalRecords = obj['total_postings'];
					pagination.totalFilteredRecords = obj['total_filtered_postings'];

					pagination.paginate();
				}
			});

			//alert( search_text + "Enter button presed." );
		}*/

		var detailRows = [];
		<?php
		if (null != $this->input->post('selectedEmployeesIds')) {
		?>
			var selectedPolicePersonnel = JSON.parse('<?php echo json_encode(explode(',', $this->input->post('selectedEmployeesIds'))); ?>');
		<?php
		} else {
		?>
			var selectedPolicePersonnel = [];
		<?php
		}
		?>

		var name = 'gurmit';
		var t = $('#selected_employees').DataTable(); //datatable where selected employees are being added
		var serachedEmployeeDataTable = [];
		var postings = {};

		function search() {
			//alert('search');
			console.log('searching');
			//serachedEmployeeDataTable.draw(false);
			serachedEmployeeDataTable.draw(); //.ajax.reload(null, false);
		}
		init();

		function init() {
			//populate the selectedPolicePersonnel array with ids DONE
			//get the data of selected police personnel
			<?php
			if (isset($selectedPolicePersonnel) && !empty($selectedPolicePersonnel)) {
				$tmpdata = json_encode($selectedPolicePersonnel);
				echo <<<EOT

var selected_police_personnel_tmp = JSON.parse('{$tmpdata}');
console.log(selected_police_personnel_tmp);

counter = 1;
for(var i=0; i<selected_police_personnel_tmp.length;i++){
	
	t.row.add( [
			counter,
            selected_police_personnel_tmp[i].current_rank,
            selected_police_personnel_tmp[i].name,
            selected_police_personnel_tmp[i].phono1,
            selected_police_personnel_tmp[i].depttno,
			
            '<a class="glyphicon glyphicon-trash selectedEmployee" id="selectedEmployee'+selected_police_personnel_tmp[i].man_id+'" style="color:red;text-decoration:none;" onClick="remove('+selected_police_personnel_tmp[i].man_id+')"></a>',
        ] ).draw( false );
		counter++;
}
showAddingEmployeeForm();
EOT;
			}
			?>

			/*var employees = 
	counter = 0;
	t.row.add( [
            counter +'.1',
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5',
			counter +'.6'	
        ] ).draw( false );
	//add it to the selected employee datatable*/
		}

		function remove(id) {
			rowFetched--;
			var tempSelectedPolicePersonnelIds = [];
			j = 0;
			for (var i = 0; i < selectedPolicePersonnel.length; i++) {
				if (selectedPolicePersonnel[i] != id) {
					tempSelectedPolicePersonnelIds[j] = selectedPolicePersonnel[i];
					j++;
				}
			}
			selectedPolicePersonnel = tempSelectedPolicePersonnelIds;
			$('#selectedEmployeesIds').val(selectedPolicePersonnel.toString());
			//--------------------------Delete rows from selected Employee datatable----------------
			$('#selected_employees tbody').on('click', 'a#selectedEmployee' + id, function() {

				t.row($(this).parents('tr'))
					.remove()
					.draw();
				serachedEmployeeDataTable.draw();

			});

			//t.row('tr>td#selected_employees'+id).remove().draw();

			//---------------------------- ---------------------------- ----------------------------

		}

		function add(id) {
			//alert('hi');

			selectedPolicePersonnel.push(id);
			//t.draw();
		}

		$(document).ready(function() {
			$('#belt_number').keydown(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					search();
					return false;
				}
			});
			$('#phone_no').keydown(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					search();
					return false;
				}
			});
			$('#empName').keydown(function(e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					search();
					return false;
				}
			});
			serachedEmployeeDataTable = $('#searchedEmployees').DataTable({
				autoWidth: false,
				"processing": true,
				//paging: false,
				bFilter: false,
				//ordering: false,
				//searching: true,
				//dom: 't'  	,  

				"serverSide": true,
				"order": [],
				//"pagingType": "full_numbers",
				"ajax": {
					url: "<?php echo base_url() . 'get-searched-employees'; ?>",
					type: "POST",
					"data": function(data) {
						console.log(data);
						$('#selectedEmployeesIds').val(selectedPolicePersonnel.toString());
						data.selectedPolicePersonnelIds = $('#selectedEmployeesIds').val().toString();
						data.ids = selectedPolicePersonnel.toString();
						data.belt_no = $('#belt_number').val();
						data.belt_nos = $('#belt_nos').val();
						data.phone_no = $('#phone_no').val();
						data.emp_name = $('#empName').val();
						//alert(data.selectedEmployeesIds);
					},

				},
				"columnDefs": [{
					"targets": [0, 5],
					"orderable": false,
				}, ],


			});


			var counter = 1;
			/* $('#addRow').on( 'click', function () {
		//alert('hi');
        t.row.add( [
            counter +'.1',
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5'
        ] ).draw( false );
 
        counter++;
    } );*/
			//-------------------------------------------------------------------

			$('#searchedEmployees tbody').on('click', 'tr td a#addEmployee', function() {
				serachedEmployeeDataTable.settings()[0].jqXHR.abort()
				//alert('adding');
				var tr = $(this).closest('tr');
				tr.remove();
				//serachedEmployeeDataTable.draw();		
				var row = serachedEmployeeDataTable.row(tr);
				var idx = $.inArray(tr.attr('id'), detailRows);

				if (row.child.isShown()) {
					tr.removeClass('details');
					row.child.hide();

					// Remove from the 'open' array
					detailRows.splice(idx, 1);
				} else {
					tr.addClass('details');
					row.child(format(row.data())); //.show();

					// Add to the 'open' array
					if (idx === -1) {
						detailRows.push(tr.attr('id'));
					}
				}
				console.log(detailRows);
				serachedEmployeeDataTable.draw();
			});
			//-------------------------------------------------------------------
			// Automatically add a first row of data
			//$('#addRow').click();

			//-----------------------------------Search ---------------------------------
			/*$('#belt_number').keyup(function(){
				console.log('key up belt no');
				serachedEmployeeDataTable.draw();
			});
			
			$('#phone_no').keyup(function(){
				console.log('key up phone no');
				serachedEmployeeDataTable.draw();
			});
			
			$('#empName').keyup(function(){
				console.log('key up name no');
				serachedEmployeeDataTable.draw();
			});*/

		});
		var rowFetched = 1;

		function format(d) {
			t.row.add([
				rowFetched,
				d[1],
				d[2],
				d[3],
				d[4],
				//d['myName'],
				'<a class="glyphicon glyphicon-trash selectedEmployee" id="selectedEmployee' + d[6] + '" style="color:red;text-decoration:none;" onClick="remove(' + d[6] + ')"></a>'
			]).draw(false);
			rowFetched++;
		}

		/*function selectParentDuty() {
			getThePostings();
		}

		

		function getThePostings() {
			$.ajax({
				url: "<?php echo base_url() . 'get-the-postings'; ?>",
				success: function(response) {
					obj = JSON.parse(response);
					insertDataInList(obj);
				}
			});
		}*/

		/*function load_the_postings_in_posting_lists2(selectedPostingId, posting_name) {

			pagination.selectedPostingId = selectedPostingId;
			pagination.currentPostingName = 'Postings under ' + posting_name;
			current_posting_id = selectedPostingId;
			current_posting = {
				id: selectedPostingId,
				name: posting_name
			};
			posting_route.push(current_posting);
			var data = {
				id: selectedPostingId
			};
			$.ajax({
				type: "POST",
				url: "<?php //echo base_url() . 'get-sub-postings-employee-list'; ?>",
				data: data,
				success: function(response) {
					console.log(response);
					//obj = JSON.parse(response);
					obj = JSON.parse(response);
					console.log(obj);
					$('#backButton').attr('onClick', 'posting_manager.load_the_postings_in_posting_lists2(' + obj['posting_detail'][0].parent_posting_id + ',"' + obj['posting_detail'][0].name + '"),pop_posting_route()');
					posting_manager.insertDataInPostingList2(obj['subpostings']);
				}
			});
		}*/

		/*function pop_posting_route() {
			posting_route.pop();
			posting_route.pop();
		}*/

		/*function pop_postings(i) {
			posting_route.pop();
			for (var j = 0; j < i; j++) {
				posting_route.pop();
			}
		}*/

		/*function writeBreadCums() {
			console.log('Writing bread Cums');
			$('#breadCum').empty();
			var j = posting_route.length;
			var i = 0;
			$('#breadCrumb>ol').empty();
			$('#breadCrumb>ol').append($('<li>')
				.attr('class', 'breadcrumb-item')
				.attr('id', 'breadCum0')
				//.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
				.attr('onClick', 'posting_manager.load_the_postings_in_posting_lists2(0,""),pop_postings(' + (j + 1) + ')')
				.append($('<a>')
					//.attr('href','')
					.append('/')
				)
			);
			$.each(posting_route, function(key, value_) {
				//console.log(key);
				j--;
				//console.log(value_);
				$('#breadCrumb>ol').append($('<li>')
					.attr('class', 'breadcrumb-item')
					.attr('id', 'breadCum' + value_.id)
					//.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
					.attr('onClick', 'posting_manager.load_the_postings_in_posting_lists2(' + value_.id + ',"' + value_.name + '"),pop_postings(' + j + ')')
					.append($('<a>')
						//.attr('href','')
						.append(value_.name)
					)
				);
			});
		}*/

		/*function insertDataInPostingList2(obj) {
			//console.log(obj);
			$('#posting_list2 ul').empty();

			for (var i = 0; i < obj.length; i++) {
				var radio_ = $('<input>')
					.attr('type', 'radio')
					.attr('id', 'nestedListname' + obj[i].id)
					.attr('name', 'posting_list_name')
					.attr('onClick', 'setPostingNameOnPage("' + obj[i].link_ + '",' + obj[i].id + ')')
					.attr('value', obj[i].id);
				if (current_posting_ == obj[i].id) {
					radio_.attr('checked', true);
					//setPostingNameOnPage(obj[i].name);
				}
				var add_ = $('<span>')
					.attr('onClick', 'addSubposting(' + obj[i].id + ')')
					.attr('style', 'cursor:pointer;')
					.append('&nbsp;&nbsp;+');
				//console.log(obj[i]);

				var list = $('<li>').attr('id', 'nestedList' + obj[i].id).attr('style', 'height:100%');
				if (obj[i].haveChilds !== true) {
					list.append(radio_);
					var label_ = $('<label>')
						.attr('for', 'nestedListname' + obj[i].id)
						//.attr('onClick','setPostingNameOnPage("'+obj[i].link_+'")')
						.append('&nbsp;&nbsp;' + obj[i].name);
					list.append(label_);
				} else {
					var label_ = $('<label>')
						.attr('for', 'nestedListname' + obj[i].id)
						.attr('onClick', 'posting_manager.load_the_postings_in_posting_lists2(' + obj[i].id + ',"' + obj[i].link_ + '")')
						.append('&nbsp;&nbsp;' + obj[i].name);
					list.append('&nbsp;&nbsp;&nbsp;&nbsp;');
					list.append(label_);
				}
				$('#posting_list2 ul').append(list);
				writeBreadCums();
			}
		}*/

		/*function setPostingNameOnPage(posting_name, posting_id) {
			selected_posting_id = posting_id;
			$('#selected_posting_name').html('&nbsp;&nbsp;&nbsp;&nbsp;Selected Posting is : [<i>' + posting_name + '</i>]')
			if ($.inArray(selected_posting_id, leave.leave_posting_ids) != -1) {

				leave.setToLeaveForm();
				leave.type = 'LEAVE'
			} else {
				leave.setToPostingForm();
				leave.type = 'POSTING';
			}
			getAdditionalPostingInfo();
		}*/

		/*function insertDataInList(obj) {
			//console.log(obj);
			$("#posting_lists ul").empty();
			for (var i = 0; i < obj.length; i++) {
				console.log(obj[i]);
				$('#posting_lists ul').append($('<li>')
					.attr('id', 'nestedList' + obj[i].id)
					.append($('<input>')
						.attr('type', 'radio')
						.attr('id', 'nestedListname' + obj[i].id)
						.attr('name', 'posting_list_name')
					).append($('<label>')
						.attr('for', 'nestedListname' + obj[i].id)
						.append('&nbsp;&nbsp;' + obj[i].name)
					).append($('<span>')
						.attr('onClick', 'addSubposting(' + obj[i].id + ')')
						.attr('style', 'cursor:pointer;')
						.append('&nbsp;&nbsp;+')
					)
				);

			}
			$('#exampleModal').modal('toggle');
		}*/

		/*function addSubposting(id) {
			//alert('adding posting');
			//console.log('adding posting');
			//get the postings by using ajax
			//
			var data = {
				'id': id
			}
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/get-sub-postings",
				data: data,
				success: function(html) {
					//alert('hi');
					//console.log(html);
					var obj = JSON.parse(html);
					var posting_id = 5;
					for (var i = 0; i < obj.length; i++) {
						//console.log(i);
						var posting_name = obj[i].name;
						var radio = $('<input>')
							.attr('type', 'radio')
							.attr('id', 'nestedListname' + obj[i].id)
							.attr('name', 'posting_list_name')
							.attr('value', obj[i].id);
						var label = $('<label>')
							.attr('for', 'nestedListname' + obj[i].id)
							.append(posting_name);
						var span = $('<span>')
							.attr('onClick', 'addSubposting(' + obj[i].id + ')')
							.attr('style', 'cursor:pointer;')
							.append('&nbsp;&nbsp;+');
						$('#nestedList' + id)
							.append($('<ul>')
								.attr('style', 'list-style-type:none;')
								.append($('<li>')
									.attr('id', 'nestedList' + obj[i].id)
									.append(radio)
									.append(label)
									.append(span)
								));
						//console.log(i);			
					}
					$('#postingBackButton').attr('onClick', 'getSubPostings(' + html + '),pop_postings()');
				}
			});
		}*/


		function showAddingEmployeeForm() {
			$('#addingEmployeeForm').show();
		}

		function hideAddingEmployeeForm() {
			$('#addingEmployeeForm').hide();
		}
		
		$(document).ready(function() {
			<?php
			if ($this->input->post('type') != null && $this->input->post('type') == 'LEAVE') {
			?> posting_manager.leave.setToLeaveForm();
			<?php
			} else {
			?> posting_manager.leave.setToPostingForm();
			<?php
			}
			?>
			$('#leave_from_date').datepicker({
				format: "dd/mm/yyyy"
			});
			$('#leave_to_date').datepicker({
				format: "dd/mm/yyyy"
			});
			$('#leave_date').datepicker({
				format: "dd/mm/yyyy"
			});
		});
		$('#addEmployees').on('click', function() {
			var elements = $('.addEmployees');
			$.each(elements, function(key, val) {

				console.log(key);
				console.log(val);
				elements[key].click();
				//$(val).click();
			})
		})

		/*function getAdditionalPostingInfo() {
			posting_id = selected_posting_id;
			$.ajax({
				url: '<?php echo base_url(); ?>ajaxGetAdditionalPostingInfo',
				method: 'POST',
				data: {
					selected_posting_id: posting_id
				},
				success: function(html) {
					var data = JSON.parse(html);
					$('select#additional_posting_info').empty().trigger('change');
					var data_ = {
						id: '',
						text: `-- Optional --`
					};
					var newOption = new Option(data_.text, data_.id, false, false);
					$('select#additional_posting_info').append(newOption).trigger('change');
					console.log(data);
					console.log(data.data.length);
					if (data.data.length == 0) {
						$('select#additional_posting_info').parent().css('display', 'none');
					}
					$.each(data.data, function(k, val) {
						var data_ = {
							id: val.id,
							text: `${val.title} - ${val.type_title}`
						};
						var newOption = new Option(data_.text, data_.id, false, false);
						$('select#additional_posting_info').append(newOption);
					});
					$('select#additional_posting_info').trigger('change');
				}
			});
		}*/
	</script>
	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade modal-lg modal-posting" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-in-posting" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Select Posting from the list given below, to which you want to assign to the selected Police Personnel.</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="posting_lists">
					<ul style="list-style-type:none;">

					</ul>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>


</body>

</html>