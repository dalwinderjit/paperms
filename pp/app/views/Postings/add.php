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
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-timepicker.min.css" />
   <style type="text/css">
     .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
.error{color:red;}
   </style>
  
  </head>
<body>
<?php //echo validation_errors(); ?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Btalion/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Posting Management</h3>
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
				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- contentpanel -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<table style="width:100%;">
					<tbody>
						<tr>
							<td><h3>Add New Posting</h3></td>
							<td class="text-right"><a href="<?php echo base_url().'posting-list';?>" class="btn btn-primary">Posting's list</a></td>
						</tr>
					</tbody>
				</table>
				
				<style>
					.span_space{
						width:200px;
						border:1px solid black;
					}
				</style>
			</div>
			<div class="panel-body">
			<div class="row">
			<?php 	/*Create HTML form*/
					$attributes = array(
					  'name'        => 'basicForm4',
					  'id'        => 'basicForm4',
					  'accept-charset'  => 'utf-8',
					  'autocomplete'    =>'off', 
					  'method' => 'post',
					  'action'=>'Postings/add',
					 
					  );
					echo form_open_multipart("posting-add", $attributes); 
					$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
				?>
				<div class="col-md-6">
				<label for="new_duty">Enter Posting Name</label>
					    <?php 
						$data=[ 'type' => 'text',
								'name' => 'new_posting',
								'id'   => 'new_posting',
								'value'=>	set_value('new_posting'),
								'class'=> 'form-control'
							];
						
						echo form_input($data);
						echo form_error('new_posting');
						?>
						
					
					
					<!--div class="col-md-12"><BR>
						Select Posting under which you want to add new Posting  
					</div--><br>
					<nav aria-label="breadcrumb" id="breadCrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a>/</a></li>
								
							</ol>
						</nav>
					<!--div class="col-md-12"><BR>
						
						<div id="breadCum"></div>
					</div-->
					<div class="col-md-12">
					
					<ul id="postings" style="list-style-type:none;">
						  <?php
							foreach($postings as $k=>$posting){
								$data = json_encode($posting);
								?>
								<script type = "text/javascript">
									//var data = JSON.parse('<?php echo $data ?>');
									var data = '<?php echo $data; ?>';
									</script>
								<?php
								echo <<<EOT
							<li><input type="radio" id="{$posting->name}{$posting->id}" name="parent_posting" value="{$posting->id}">&nbsp;&nbsp;&nbsp;<label onClick="setBreadCums(data),getSubPostings({$posting->id})" for="{$posting->name}{$posting->id}">{$posting->name}</label></li>
							
EOT;
							}
							echo '</ul>';
							
								echo form_error('parent_posting');
						  ?>	
					
						<button type="button" class="btn btn-secondary" title="Move one step back" onClick="getSubPostings(0),pop_postings()" id="postingBackButton">Back</button>
						
						<input type="hidden" id="backPageValue"/>
					
						<input type="submit" class="btn btn-primary" name="submit"/>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div class="col-md-6">
				
					
					
					
					
					
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Select Posting from the list given below, under which you want to add the new posting.</h5>
							<span id="breadcums">
								<span onClick="getSubPostings(0)">ROOT</span>
							</span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
						  
						  <script type="text/javascript">
							var parent_posting_id = 0;
							var postings_route = [];
							var recent_bread_cum_id = '';
							console.log(postings_route);
							function getSubPostings(id){
								var data = {
									'id':id
								  }
								$.ajax({
									type: "POST",
									url: "<?php echo base_url();?>get-sub-postings",
									data: data,
									cache: false,
									success: function(html){
										var data1 = JSON.parse(html);
										if(data1.length>0){
											$('#postings').empty();
											$.each(data1, function(key,value_) {
												data = JSON.stringify(value_);
												if(value_.haveChilds==true){
													
													$("#postings")
													.append($('<li>')
														.append($('<input>')
															.attr('type','radio')
															.attr('id', value_.name+value_.id)
															.attr('name','parent_posting')
															.attr('value',value_.id)
															//.attr('onClick',"setBreadCums('"+data+"')")
														).append($('<label>')
															.attr('onClick',"setBreadCums('"+data+"'),getSubPostings("+value_.id+")")
															.append('&nbsp;&nbsp;&nbsp;'+value_.name)
														)
													);
												}else{
													$("#postings")
													.append($('<li>')
														.append($('<input>')
															.attr('type','radio')
															.attr('id', value_.name+value_.id)
															.attr('name','parent_posting')
															.attr('value',value_.id)
															//.attr('onClick',"setBreadCums('"+data+"')")
														).append($('<label>')
															//.attr('onClick',"setBreadCums('"+data+"'),getSubPostings("+value_.id+")")
															.append('&nbsp;&nbsp;&nbsp;'+value_.name)
														)
													);
												}
												
												
												parent_posting_id = value_.parent_posting_id;
											});
											setTheBackButtonValue(parent_posting_id);
										}
									}  
								});
							}
							function setTheBackButtonValue(parent_posting_id){
								//-------------------
								var data = {
									'parent_posting_id':parent_posting_id
								  }
								$.ajax({
									type: "POST",
									url: "<?php echo base_url();?>get-previous-postings",
									data: data,
									cache: false,
									success: function(html){
										$('#postingBackButton').attr('onClick','getSubPostings('+html+'),pop_postings()');
									}  
								});
								//-------------------
							}
							function setBreadCums(value){
								//add it to bread cum
								
								console.log('BreadCums');
								obj = JSON.parse(value);
								postings_route.push(value);
								console.log(postings_route);
								$('#breadCum').append($('<span>')
													.attr('id','breadCum'+obj.id)
													).append(obj.name+'>');
								writeBreadCums();
							}
							function writeBreadCums(){
								console.log('Writing bread Cums');	
								$('#breadCum').empty();
								var j=postings_route.length;
								$('#breadCrumb>ol').empty();
								$.each(postings_route, function(key,value_) {
									//console.log(key);
									j--;
									console.log(value_);
								
									obj = JSON.parse(value_);
									/*$('#breadCum').append($('<span>')
													.attr('id','breadCum'+obj.id)
													).append(obj.name+'>');*/
													
									$('#breadCrumb>ol').append($('<li>')
											.attr('class','breadcrumb-item')
											.attr('id','breadCum'+obj.id)
											.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
										.append($('<a>')
											//.attr('href','')
											.append(obj.name)
										)
									);
								});
							}
							function pop_postings(){
								
								postings_route.pop();
								writeBreadCums();
							}
						  </script>
						 
						  </div>
						  <div class="modal-footer">
							
							
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
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery('#from_date').datepicker({dateFormat: "dd/mm/yy 00:00:00"});
	jQuery('#to_time').datepicker({dateFormat: "dd/mm/yy 23:59:59"});
	/*jQuery('#to_time').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
	});*/
});
function selectParentDuty(){
	
	$('#exampleModal').modal('toggle')
}
</script>
<!-- Button trigger modal -->


<!-- Modal -->

</body>
</html>