<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
  <title>CA::Dashboard</title>
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
#posting_lists>ul{list-style-type:none;}
   </style>
  
  </head>
<body>
<?php //echo validation_errors(); ?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php //$this->load->view(F_CA.'html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view(F_CA.'html/headbar'); ?>
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
				<div class="col-md-12">
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
						
				<label for="new_duty">Select Battalion</label>
					   <?php 
                 $battalions = array();
                  $battalions[''] = 'Select Battalion'; 
				  $battalions[-1] = 'All';
                 foreach ($battalions_objs as $value) {
                   $battalions[$value->users_id] = $value->nick;
                 }
/*newarea Textfield*/
 echo form_dropdown('battalion', $battalions, set_value('battalion'),'id="battalion" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('battalion');
/*----End newarea Textfield----*/
 ?>
					<br>
					<label for="deployment_report">Deployment Report</label>
					<?php 
						echo form_dropdown('deployment_report', $deployment_reports, set_value('deployment_report'),'id="deployment_report" data-placeholder="Select Deployment Report" title="Please select Deployment Report" class="select2" onChange="getReportViewInSelectedDeploymentReport()"');
						echo form_error('deployment_report');
					?>
					<label for="new_duty">Consolidate Deployment Report view in IGP Login</label>
					   <?php 
/*newarea Textfield*/
 echo form_dropdown('views', $views, set_value('views'),'id="battalion" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('views');
/*----End newarea Textfield----*/
 ?>
					<!--div class="col-md-12"><BR>
						Select Posting under which you want to add new Posting  
					</div--><br>
					
					<label for="new_duty">Order By String</label>
					<?php
					$order_by_ = [
						'name'      => 'order_by_',
						'id'        => 'order_by_',
						'class' => 'form-control',
						'value' => set_value('order_by_')
						//'value' => $posting->name
					];
					echo form_input($order_by_);
					echo form_error('order_by_');
					?><br>
					<nav aria-label="breadcrumb" id="breadCrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a>/</a></li>
							<?php echo $link; ?>
							
						</ol>
					</nav>
					
						<label for="search_posting">Enter Name of Posting to be searched</label>
					<?php 
					$data=[ 'type' => 'text',
							'name' => 'search_posting',
							'id'   => 'search_posting',
							'value'=>	set_value('search_posting'),
							'class'=> 'form-control'
						];
					
					echo form_input($data);
					echo form_error('search_posting');
					?>
					</div>
					<div class="col-md-12">
					<ul style="list-style-type:none;">
						<li>
							Select Posting under which you want to add New Posting</li>
						</li>
					</ul>
					<ul id="postings" style="list-style-type:none;">
						<script type = "text/javascript">
							if(typeof postings_route === 'undefined'){
								var postings_route = [];
							}
							
							var data = [];
						</script>
						  <?php
						  foreach($posting_route as $k=>$val){
							?><script type = "text/javascript">
								postings_route.push('<?php echo json_encode($val); ?>');
							</script><?php  
						  } 
						  $total_data = array();
						  $i=0;
							foreach($postings as $k=>$posting){
								//var_dump($posting);
								$data__ = json_encode($posting);
								//echo $data__;
								
								
								//echo $data__;
								
								if($posting->id==$parent_id){
									$checked = 'checked';
								}else{
									$checked = '';
								}
								?>
								<script type = "text/javascript">
									data[<?php echo $i; ?>] = '<?php echo $data__; ?>';
									//postings_route.push('<?php echo $data__; ?>');
								</script>
								
								<?php
								if($posting->haveChilds==true){
								
									echo <<<EOT
							<li><input type="radio" id="{$posting->name}{$posting->id}" name="parent_posting" value="{$posting->id}" {$checked}>&nbsp;&nbsp;&nbsp;<label onClick="setBreadCums(data[{$i}]),getSubPostings({$posting->id})" for="{$posting->name}{$posting->id}" style="cursor:pointer;">{$posting->name}</label></li>
							
EOT;
								}else{
									echo <<<EOT
							<li><input type="radio" id="{$posting->name}{$posting->id}" name="parent_posting" value="{$posting->id}" {$checked}>&nbsp;&nbsp;&nbsp;<label  for="{$posting->name}{$posting->id}" style="cursor:pointer;">{$posting->name}</label></li>
							
EOT;
								}
$i++;
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
							
							if(typeof postings_route === 'undefined'){
								var postings_route = [];
							}
							var recent_bread_cum_id = '';
							console.log(postings_route);
							function getSubPostings(id){
								$('#preloader').css('display','inline');
								
								var data = {
									'id':id
								  }
								  //alert($('#search_posting').val());
								if($('#search_posting').val()!=undefined){
									data.name = $('#search_posting').val();
									$('#search_posting').val('');
								}else{
									data.name = '';
								}
								//alert(data.id);
								console.log(data);
								$.ajax({
									type: "POST",
									url: "<?php echo base_url();?>get-sub-postings",
									data: data,
									cache: false,
									success: function(html){
										//alert(html);
										var data1 = JSON.parse(html);
										if(data1.length>0){
											$('#postings').empty();
											$.each(data1, function(key,value_) {
												//console.log(value_.name);
												//value_.name = escape(value_.name);
																								
												//console.log(value_.name);
												data2 = JSON.stringify(value_);
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
															.attr('onClick',"setBreadCums('"+JSON.stringify(value_)+"'),getSubPostings("+value_.id+")")
															.append('&nbsp;&nbsp;&nbsp;'+value_.name)
															.attr('style','cursor:pointer;')
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
										}else{
											alert("No data found");
										}
										$('#preloader').css('display','none');
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
										$('#postingBackButton').attr('onClick','getSubPostings('+html+'),pop_postings(1)');
									}  
								});
								//-------------------
							}
							function setBreadCums(value){
								
								if(typeof(value) == 'object'){
									//alert('object');
									var obj = value;
									//alert(obj);
									
									string = JSON.stringify(obj);
									//alert(string);
									postings_route.push(string);
								}else{
									//alert('string');
									//alert(value);
									postings_route.push(value);
									var obj = JSON.parse(value);
								}
								console.log(obj); 	
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
									//console.log(j);	
									if(j==0){
										$('#breadCrumb>ol').append($('<li>')
												.attr('class','breadcrumb-item')
												.attr('id','breadCum'+obj.id)
												//.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
											.append($('<a>')
												//.attr('href','')
												.append(obj.name)
											)
										);
									}else{
										$('#breadCrumb>ol').append($('<li>')
												.attr('class','breadcrumb-item')
												.attr('id','breadCum'+obj.id)
												.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
											.append($('<a>')
												//.attr('href','')
												.append(obj.name)
											)
										);
									}
								});
							}
							function pop_postings(count){
								for(var i=0;i<count;i++){
									postings_route.pop();
								}
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
<!--script src="<?php echo base_url();?>webroot/js/bootstrap-datetimepicker.js"></script-->
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
	//setBreadCums(data);
	$('#search_posting').keypress(function(e){
		if(e.which==13){ 
			//alert(parent_posting_id);
			//setBreadCums(data[0]);
			getSubPostings(parent_posting_id);
			e.preventDefault();
		}
		
	});
	jQuery("select").select2({width:"100%"});
});

function selectParentDuty(){
	
	$('#exampleModal').modal('toggle')
}
</script>
<!-- Button trigger modal -->


<!-- Modal -->

</body>
</html>