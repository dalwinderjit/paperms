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
#breadCrumb>ol>li>a{text-decoration:none;cursor:pointer;}
.error{color:red;}
   </style>
    <script type="text/javascript">
	var pop_posting_iterations = 0;
	var selected_posting_id = <?php echo $posting->id;?>;
	var selected_posting_parent_id = <?php echo $posting->parent_posting_id;?>;
	
   </script>
  </head>
<body>
<?php echo validation_errors(); ?>
<!-- Preloader -->
<!--div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div-->

<section>
<?php //$this->load->view('Btalion/html/navbar'); ?>
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
							<td><h3>Edit Posting</h3></td>
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
				
				<div class="col-md-6">
				<?php 	/*Create HTML form*/
					$attributes = array(
					  'name'        => 'basicForm4',
					  'id'        => 'basicForm4',
					  'accept-charset'  => 'utf-8',
					  'method' => 'post',
					  'action'=>'Postings/list',
					);
					echo form_open_multipart("posting-edit/".$id, $attributes); 
					$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
				?>
					<label for="new_duty">Posting Name</label>
					<?php
					$data = [
						'name'      => 'new_duty',
						'id'        => 'new_duty',
						/*'maxlength' => '100',
						'size'      => '50',*/
						'class' => 'form-control',
						'value' => (null!=$this->input->post('new_duty'))? $this->input->post('new_duty'):$posting->name
						//'value' => $posting->name
					];
					echo form_input($data);
					echo form_error('new_duty');
					?>
					<BR>
					<script type="text/javascript">
					var postings_route = [];
					<?php foreach($route as $k=>$val){ ?>
					postings_route.push('<?php echo $val; ?>');
					<?php } ?>
					</script>
					<?php if(false){ ?>Parent Posting : <span ></span><span id="breadCum"><?php
						foreach($route as $k=>$val){
							?>
							<script type="text/javascript">
								pop_posting_iterations++;
							</script>
							<?php
							$val1 = json_decode($val);
							echo $val1->name.' > ';
						}
					?></span>&nbsp; &nbsp;
					<?php } ?>
					
				<nav aria-label="breadcrumb" id="breadCrumb">
				  <ol class="breadcrumb">
					<?php foreach($route as $k=>$val){ ?>
							<script type="text/javascript">
								pop_posting_iterations++;
							</script>
							<?php
							$val1 = json_decode($val);
							echo '<li class="breadcrumb-item"><a>'.$val1->name.'</a></li>';
						}
					?>
				  </ol>
				</nav>
	
	<input type="hidden" id="current_posting_id" name="current_posting_id" value="<?php echo $posting->parent_posting_id;?>">
					<!--a type="button" class="glyphicon glyphicon-pencil" style="color:black;cursor:pointer;" onClick="showParentPostings(<?php //echo $posting->parent_posting_id; ?>)"></a><br><br-->
					
					
					<div>
						<ul id="postings" style="list-style-type:none;">
						</ul>
					</div>
					<?php echo form_error('parent_posting'); ?><br>
					<script type="text/javascript">
					
					function showParentPostings(parent_posting_id){
						$('#current_posting_id').val(parent_posting_id);
						//alert('showparent_posting_id');
						//-------------------------ajax-------------
						data = {
							parent_post_id:parent_posting_id,
							"selected_posting_id":selected_posting_id,
							"selected_posting_parent_id":selected_posting_parent_id,
							};
						$.ajax({
							type:"POST",
							url: "<?php echo base_url();?>get-parent-postings",
							data: data,
							cache: false,
							success: function(html){
								console.log('dalwinder');
								console.log(html);
								////////////////////////////
								var data1 = JSON.parse(html);
								if(data1.length>0){
									
									//$('#postings').empty();
									$.each(data1, function(key,value_) {
										data = JSON.stringify(value_);
										//	postings_route.push(data);
										if(value_.haveChilds==true){
											$("#postings")
											.append($('<li>')
												.append($('<input>')
													.attr('type','radio')
													//.attr('id', value_.name+value_.id)
													.attr('id', 'posting'+value_.id)
													.attr('name','parent_posting')
													.attr('value',value_.id)
													
													//.attr('onClick',"setBreadCums('"+data+"')")
												).append($('<label>')
													.attr('onClick',"pop_postings(1),setBreadCums('"+data+"'),getSubPostings("+value_.id+")")
													.append('&nbsp;&nbsp;&nbsp;'+value_.name)
												)
											);
										}else{
											$("#postings")
											.append($('<li>')
												.append($('<input>')
													.attr('type','radio')
													//.attr('id', value_.name+value_.id)
													.attr('id', 'posting'+value_.id)
													.attr('name','parent_posting')
													.attr('value',value_.id)
													//.attr('onClick',"setBreadCums('"+data+"')")
												).append($('<label>')
													//.attr('onClick',"setBreadCums('"+data+"'),getSubPostings("+value_.id+")")
													.append('&nbsp;&nbsp;&nbsp;'+value_.name)
												)
											);
										}
										
										
										//parent_posting_id = value_.parent_posting_id;
									});
									//setTheBackButtonValue(parent_posting_id);
									$.each(data1, function(key,value_) {
										if(value_.id==selected_posting_parent_id){
											console.log(value_);
											$('#posting'+value_.id).attr('checked','checked');
										}
									});
								}
								///////////////////////////
								
							}
						});
						//-------------------------ajax-------------
					}
					function getSubPostings(id){
						$('#current_posting_id').val(id);
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
								var j=data1.length;
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
									//setTheBackButtonValue(parent_posting_id);
									
									writeBreadCums();
								}
							}  
						});
					}
					function setBreadCums(value){
						//add it to bread cum
						console.log('BreadCums');
						obj = JSON.parse(value);
						postings_route.push(value);
						console.log(postings_route);
						//$('#breadCum').append($('<span>')
						//					.attr('id','breadCum'+obj.id)
						//					).append(obj.name+'>');
						writeBreadCums();
					}		
					function writeBreadCums(){
						console.log('Writing bread Cums');	
						$('#breadCum').empty();
						var j=postings_route.length;
						$('#breadCrumb>ol').empty();
						$.each(postings_route, function(key,value_) {
							j--;
							console.log(value_);
							obj = JSON.parse(value_);
							$('#breadCum').append($('<span>')
								.attr('id','breadCum'+obj.id)
								.attr('onClick',""+'pop_postings('+j+'),getSubPostings('+obj.id+')')
								.append(obj.name+'>')
							);
							
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
					function pop_postings(counter){
						for(var i=0;i<counter;i++){
							postings_route.pop();
						}
						writeBreadCums();
					}
					</script>
				<input type="submit" class="btn btn-primary" name="submit" value="Update"/>
				<?php echo form_close(); ?>
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
	showParentPostings(<?php 
		if(null!=$this->input->post('current_posting_id')){
			echo $this->input->post('current_posting_id');
		}else{
			echo $posting->parent_posting_id; 
		}
	
	?>);
	//showParentPostings(<?php if(null!=$this->input->post('current_posting_id')){echo $this->input->post('current_posting_id'); }else{echo $posting->parent_posting_id; }?>);
	writeBreadCums();
});

</script>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Posting from the list given below, under which you want to add the new posting.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			   <input type="radio" id="parent_1" name="node"><label for="parent_1">Operation Duty</label><br>
			   <input type="radio" id="parent_1" name="node"><label for="parent_1">Security Futy</label><br>
			   <input type="radio" id="parent_1" name="node"><label for="parent_1">Staff Duty</label><br>
					<input type="radio" id="parent_2" name="node"><label for="parent_2">Parent2</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_3" name="node"><label for="parent_3">Parent3</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_4" name="node"><label for="parent_4">Parent4</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_5" name="node"><label for="parent_5">Parent5</label><br>
					<input type="radio" id="parent_6" name="node"><label for="parent_6">Parent6</label><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="parent_7" name="node"><label for="parent_7">Parent7</label><Br>
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