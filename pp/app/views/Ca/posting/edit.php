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
.input-posting{width:40%;height:40px;float:left;}
.my_select{width:40%;}
span.data.deleted{text-decoration:line-through;}
ul#additionalInfoTypeList>li{height:40px;}
   </style>
    <script type="text/javascript">
	var pop_posting_iterations = 0;
	var selected_posting_id = <?php echo $posting->id;?>;
	var selected_posting_parent_id = <?php echo $posting->parent_posting_id;?>;
	
   </script>
  </head>
<body>
    
    <div class="my_toast" id="message_box">
        <span>x</span>
        <p class="data"></p>
    </div>
<?php //echo validation_errors(); ?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('Ca/html/navbar'); ?>
	<div class="mainpanel">
	<?php $this->load->view('Ca/html/headbar'); ?>
		<div class="pageheader">
			<h3> &nbsp;  &nbsp; Posting Management</h3>
                        <?php
                        echo validation_errors();
                        ?>
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
					echo form_open_multipart("posting-edit/".$id."/".$deployment_report_id, $attributes); 
					$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
				?>
				<input type="hidden" name="posting_id" value="<?PHP echo $id; ?>" id="posting_id">
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
					<label for="new_duty">Select Battalion</label>
					   <?php 
/*newarea Textfield*/
 echo form_dropdown('battalion', $battalions, set_value('battalion',$posting->shown_in),'id="battalion" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" required'); 
 echo form_error('battalion');
/*----End newarea Textfield----*/
 ?>
					
					<br>
					<?php //var_dump($posting);?>
					<label for="deployment_report">Deployment Report</label>
					<?php 
						echo form_dropdown('deployment_report', $deployment_reports, set_value('deployment_report',$posting->deployment_report_id),'id="deployment_report" data-placeholder="Select Deployment Report" title="Please select Deployment Report" class="select2" onChange="getReportViewInSelectedDeploymentReport()"');
						echo form_error('deployment_report');
					?>
					<Br><br>
					<label for="new_duty">Report view</label>
					   <?php 
/*newarea Textfield*/
 echo form_dropdown('views', $views, set_value('views',$posting->view),'id="report_view" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('views');
/*----End newarea Textfield----*/
 ?>
					
					<br><Br>
                                        <label for="new_duty">Posting Additional Info</label>
                                        <ul id="additionalInfoList">
                                            <?php
                                            //$cb = '<input type="checkbox"/><input type="hidden" name="additional_posting_status['.$k.']"/>';
                                            //$edit_button = '<button class="btn btn-primary btn-small" onClick="posting.addPostingInfoFieldsHTMLForEdit('.$k.')"><i class="fa fa-pencil"></i></button>';
                                            
                                            $add_button = '<button class="btn btn-success btn-small" style="float:right;" onClick="posting.addPostingInfoFieldsHTMLForAdding();return false;"><i class="fa fa-plus"></i></button>';
                                            $count = 0;
                                            /*if(isset($this->input->post('additional_posting_title'))){
                                                
                                            }*/
                                            foreach($additional_posting_info as $k=>$val){
                                                $cb = '<input type="hidden" name="additional_posting_status['.$k.']"/><input type="hidden" name="additional_posting_id['.$k.']" value="'.$k.'"/>';
                                                $delete_button = '<button class="btn btn-danger btn-small" onClick="posting.deleteAdditionalPosting('.$k.');return false;" title="Delete Posting"><i class="fa fa-trash-o"></i></button>';
                                                $edit_button = '<button class="btn btn-primary btn-small" onClick="posting.addPostingInfoFieldsHTMLForEdit('.$k.','.$k.');return false;" title="Edit Posting"><i class="fa fa-pencil"></i></button>';
                                                echo '<li id="additional_info_'.$k.'" style="height:40px;">'.$cb.' <span class="data">'.$val.'</span> <span style="float:right;">'.$edit_button.' '.$delete_button.'</span></li>';
                                                echo form_error('additional_posting_title['.$k.']');
                                                $count++;
                                            }
                                            ?>
                                            <!--li><input type="text" class="form-control input-posting"/> &nbsp;&nbsp;&nbsp;<select class="my_select"><option>value 1</option><option>value 2</option><option>value 3</option></select></li-->
                                        </ul>
                                        <?php 
                                            echo $add_button;  
                                            echo '<BR/>';
					   
/*newarea Textfield*/
 //echo form_dropdown('additional_posting_info', $additional_posting_info, set_value('additional_posting_info',/*$posting->additional_posting_info*/'1'   ),'id="additional_posting_info" data-placeholder="Choose One" title="Please select at least 1 value" class="select2" multiple'); 
 // echo form_error('additional_posting_info');
/*----End newarea Textfield----*/
 ?>
					
                                        <BR><BR>
                                        <label for="new_duty">Manage Additional Postings Info Types</label>
                                            <ul id="additionalInfoTypeList">
                                            <?php
                                            $add_button = '<button class="btn btn-success btn-small" style="float:right;" onClick="posting.addPostingInfoTypeFieldsHTMLForAdding();return false;"><i class="fa fa-plus" title="Add Posting"></i></button>';
                                            $count = 0;
                                            /*if(isset($this->input->post('additional_posting_title'))){
                                                
                                            }*/
                                            foreach($posting_additional_info_types as $k=>$val){
                                                $cb = '<input type="hidden" name="additional_posting_type_status['.$k.']"/><input type="hidden" name="additional_posting_type_id['.$k.']" value="'.$k.'"/>';
                                    
                                                $delete_button = '<button class="btn btn-danger btn-small" onClick="posting.deleteAdditionalPostingType('.$k.');return false;" title="Delete Additional Posting Info Type"><i class="fa fa-trash-o"></i></button>';
                                                $edit_button = '<button class="btn btn-primary btn-small" onClick="posting.addPostingInfoTypeFieldsHTMLForEdit('.$k.','.$k.');return false;" title="Add Additional Posting Info Type"><i class="fa fa-pencil"></i></button>';
                                                echo '<li id="additional_info_type_'.$k.'" style="height:40px;">'.$cb.' <span class="data">'.$val->title.'</span> <span style="float:right;">'.$edit_button.' '.$delete_button.'</span></li>';
                                                echo form_error('additional_posting_type_title['.$k.']');
                                                $count++;
                                            }
                                            ?>
                                            </ul>
                                        <?php echo $add_button;  ?>
                                            
                                       
					<br><Br>
					<label for="new_duty">Order By String</label>
					<?php
					$order_by_ = [
						'name'      => 'order_by_',
						'id'        => 'order_by_',
						'class' => 'form-control',
						'value' => set_value('order_by_',$posting->order_by_)
						//'value' => $posting->name
					];
					echo form_input($order_by_);
					echo form_error('order_by_');
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
					var deployment_report_id = <?php echo $deployment_report_id; ?>;
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
				<div class="col-md-6">
					<b>Note:</b> First Select the <i><b>"DEPLOYMENT REPORT"</b></i> <br>
					Then select the <i><b>REPORT VIEW</b></i> i.e. how you want the <i><b>posting</b></i> to be displayed in the selected <i><b>"DEPLOYMENT REPORT"</b></i><Br>
					<BR>
						<B> ORDER BY STRING : </B> This is the string from which postings are going to sort.<Br>
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
    var additional_posting_info_complete = <?php echo json_encode($additional_posting_info_complete); ?>;
    var additional_posting_info_types = <?php echo json_encode($posting_additional_info_types); ?>;
    
    
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
	jQuery("select").select2({width:"100%"});
        jQuery("select.my_select").select2();
	//showParentPostings(<?php if(null!=$this->input->post('current_posting_id')){echo $this->input->post('current_posting_id'); }else{echo $posting->parent_posting_id; }?>);
	writeBreadCums();
	$('#deployment_report').val(deployment_report_id).trigger('change');
	getReportViewInSelectedDeploymentReport();
});
function getReportViewInSelectedDeploymentReport(){
	//get the view by ajax
	//input parameter
	var posting_id = $('#posting_id').val();
	var deployment_report = $('#deployment_report').val();
	//var report_view = $('#report_view').val();
	var data = {
		'posting_id':posting_id,
		'deployment_report_id':deployment_report	
	};
	$.ajax({
		type: "POST",
		url: "<?php echo base_url();?>get-posting-view-in-selected-deployment-report",
		data: data,
		cache: false,
		success: function(response){
			//alert(response);
			var data = JSON.parse(response);
			//console.log(data);
			//console.log(data.view);
			$('#report_view').val(data.view).trigger('change');
		},
	});
	//set the view
}
var addition_posting_info_counter = 0;
var addtional_postings = <?php echo json_encode($additional_posting_info); ?>;
function getPostingDetail(id){
    $.each(additional_postings,function(k,val){
        if(k==id){
            return k;
        }
        
    })
}
class Posting{
    var_name = 'posting';
    select_class = 'my_select';
    select_name = 'additional_posting_type';
    list_data = [];
    list_data_type = [];
    disabled= 'disabled';
    pre = "add_";
    additional_posting_info_types = {1:'VVIP Duty',2:'VIP Duty',3:'SPecial Strike Duty'};
    additional_posting_info_counter = 0;
    additional_posting_info_type_counter = 0;
    editFields = '<input type="text" name="additional_posting_title[]" class="form-control input-posting"/> &nbsp;&nbsp;&nbsp;<select class="my_select" name="additional_posting_type"><option value="1">value 1</option><option value="2">value 2</option><option value="3">value 3</option></select>';
    edit_button = '<button class="btn btn-primary btn-small disabled"><i class="fa fa-pencil"></i></button>';
    delete_button = '<button class="btn btn-danger btn-small" onClick="delete()><i class="fa fa-trash-o"></i></button>';
    //add
     addPostingInfoTypeFieldsHTMLForAdding(obj =null){
         console.log('Adding Type fields HMTL' + this.additional_posting_info_type_counter);
        var submit_button = '<button class="btn btn-success btn-small" onClick="posting.addPostingInfoType('+this.additional_posting_info_type_counter+');return false;" title="Add Additional Posting Info"><i class="fa fa-check"></i></button>';
        this.delete_button = '<button class="btn btn-danger btn-small" onClick="posting.deleteAdditionalPostingType('+this.additional_posting_info_counter+',\''+this.pre+'\');" title="Delete Additional Posting Info"><i class="fa fa-trash-o"></i></button>';
        this.addFields = '<input type="text" name="additional_posting_type_title['+this.additional_posting_info_type_counter+']" class="form-control input-posting" value="'+''+'"/> &nbsp;&nbsp;&nbsp;';//<select class="my_select" name="additional_posting_type['+this.additional_posting_info_counter+']"><option value="1">value 1</option><option value="2">value 2</option><option value="3">value 3</option></select>';
        console.log("'"+this.pre+"'");
        this.delete_button = '<button class="btn btn-danger btn-small" onClick="posting.deleteAdditionalPostingType('+this.additional_posting_info_type_counter+',\''+this.pre+'\');return false;" title="Delete Additional Posting Info Type"><i class="fa fa-trash-o"></i></button>';
        var title_error = '';
        var type_error= '';
        if(obj!=null){
            if(obj.title_error!=null){
                title_error = '<br>'+obj.title_error;
            }
            if(obj.type_id_error!=null){
                type_error = '<br>'+obj.type_id_error;
            }
        }
        
        $('ul#additionalInfoTypeList').append('<li id="add_additional_info_type_'+this.additional_posting_info_type_counter+'">'+this.addFields+'<span style="float:right;">'+submit_button+this.delete_button+'</span>'+title_error+' '+type_error+'</li>');
        //$('select[name="additional_posting_type['+this.additional_posting_info_counter+']"]').select2();
        console.log(obj);
        if(obj!=null){
            $('input[name="additional_posting_type_title['+this.additional_posting_info_type_counter+']"').val(obj.title);
            //$('select[name="additional_posting_type['+this.additional_posting_info_counter+']"').val(obj.type_id).trigger('change');
        }
        this.additional_posting_info_type_counter++;
     }
        addPostingInfoType(counter){
            var this_ = this;
            var title = $('ul#additionalInfoTypeList>li#add_additional_info_type_'+counter+'>input[name="additional_posting_type_title['+counter+']"]').val();
            console.log(title);
            //return;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>ajaxAddAdditionalPostingType",
                data:{
                    title : title
                },
                cache: false,
                success: function(html){
                    console.log(html);
                    data = JSON.parse(html);
                    if(data.status==true){
                        console.log(data);
                        console.log(this_.additional_posting_info_types);
                        Object.assign(this_.additional_posting_info_types,{[data.type.id]:data.type.title});
                        Object.assign(additional_posting_info_types,{[data.type.id]:data.type});
                        this_.addPostingInfoTypeFieldToList(data.type);
                        this_.removeSuccessfullyAddedPostingType(counter);
                        showFixedMessage("Additional Posting Info Type Added Successfully",'success');
                    }else{
                        this_.showErrorsPostingInfo(counter,data);
                        
                    }
                    return false;
                }  
            });
            return false;
        }
        showErrorsPostingInfo(counter,data,pre='add'){
            console.log(data);
            console.log(data.errors.title);
            showFixedMessage(data.error.title,'error')
            //$('ul#additionalInfoTypeList>li#'+pre+'_additional_info_type_'+counter).append(this.formatError(data.errors.title))
        }
        formatError(error){
        return '<br><br><span class="error pull-left">'+error+'</span>';
        }
        /*demo(){
            var count =1;
            var data = {id:5,title:'Dalwinder'};
            Object.assign(this.additional_posting_info_types,{[data.id]:data.title});
        }*/
        removeSuccessfullyAddedPostingType(counter){
            $('ul#additionalInfoTypeList>li#add_additional_info_type_'+counter).remove();
        }
        addPostingInfoTypeFieldToList(obj=null){
            this.updateAllTheSelectType()
            if(obj!=null){
                this.additional_posting_info_types[obj.id] = obj.title;
            }else{
                this.additional_posting_info_types[5] = 'NEW ITEM';
            }
            var text = `<input type="hidden" name="additional_posting_type_status[${this.additional_posting_info_counter}]">
                <input type="hidden" name="additional_posting_type_id[${this.additional_posting_info_counter}]" value="${obj.id}">
                    <span class="data">${obj.title}</span>
                    <span style="float:right;"><button class="btn btn-primary btn-small" onclick="posting.addPostingInfoTypeFieldsHTMLForEdit(${obj.id},${this.additional_posting_info_counter});return false;" title="Add Additional Posting Info Type"><i class="fa fa-pencil"></i></button> <button class="btn btn-danger btn-small" onclick="posting.deleteAdditionalPostingType(${obj.id});return false;" title="Delete Additional Posting Info Type"><i class="fa fa-trash-o"></i></button></span>`;
            $('ul#additionalInfoTypeList').append('<li id="additional_info_type_'+obj.id+'">'+text+'</li>');
            this.additional_posting_info_counter++;
        }
    deleteAdditionalPostingType(id,pre=''){
        var this_ = this;
        console.log('delete posting type');
        if(pre!=''){
            $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id).remove();
        }else{
            var id__ = $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id+'>input[name="additional_posting_type_id['+id+']"').val();
            if(id__!=null && id__!=undefined){
                $.ajax({
                    url:'<?php echo base_url(); ?>ajaxDeletePostingAdditionalInfoType',
                    method:'POST',
                    data:{
                        id:id__
                    },
                    success:function(html){
                        var data = JSON.parse(html);
                        console.log(data);
                        if(data.status==true){
                            showFixedMessage(data.message,'success');
                            
                            console.log(this_);
                            additional_posting_info_types[id].deleted = 'true';
                            this_.updateAllTheSelectType();
                            this_.deleteHtmlAdditionalPostingInfoType(id,pre);
                        }else{
                            var error_msg = '';
                            if(data.errors['id']!=''){
                                console.log($('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id));
                                //$('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id).append(this_.formatError(data.errors['id']));
                                error_msg =  '  (' + data.errors['id'] + ')';
                            }
                            showFixedMessage(data.message+ error_msg,'error');
                        }
                    }
                });
            }
        }
        return false;
    }
    updateAdditionalPostingInfoType(id,counter,pre=''){
        var this_ = this;
            var title = $('ul#additionalInfoTypeList>li#additional_info_type_'+counter+'>input[name="additional_posting_type_title['+counter+']"]').val();
            console.log(title);
            //return;
            if((title)!=''){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>ajaxUpdateAdditionalPostingType",
                    data:{
                        id: id,
                        title : title
                    },
                    cache: false,
                    success: function(html){
                        console.log(html);
                        data = JSON.parse(html);
                        if(data.status==true){
                            console.log(data);
                            console.log(this_.additional_posting_info_types);
                            console.log(additional_posting_info_complete);
                            this_.additional_posting_info_types[id] = title;
                                    //additional_posting_info_complete[id].type_title = title;
                            //Object.assign(this_.additional_posting_info_types,{[data.type.id]:data.type.title});
                            $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id).html(this_.list_data_type[id]);
                            $('ul#additionalInfoTypeList>li#additional_info_type_'+counter+'>span.data').html(title);
                            additional_posting_info_types[id].title = title;
                            this_.updateAllTheSelectType();
                            $.each(additional_posting_info_complete,function(k,val){
                                if(val.type==id){
                                    console.log('hi');
                                    additional_posting_info_complete[k].type_title = title;
                                }
                            });
                            
                            console.log(this_.additional_posting_info_types);
                            console.log(additional_posting_info_complete);
                            this_.updateAllThePostingTypesText();
                            //Object.assign(additional_posting_info_types,{[data.type.id]:data.type});
                            //this_.addPostingInfoTypeFieldToList(data.type);
                            //this_.removeSuccessfullyAddedPostingType(counter);
                            showFixedMessage("Additional Posting info updated Successfully.",'success')
                        }else{
                            this_.showErrorsPostingInfo(counter,data,'');

                        }
                        return false;
                    }  
                });
            }
            return false;
    }
    deleteHtmlAdditionalPostingInfoType(id,pre){
        this.list_data_type[id] = $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id).html();
        $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id+'>input[name="additional_posting_type_status['+id+']"').val('delete');
        $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id+'>span>button.btn-danger>i').addClass('fa-undo').removeClass('fa-trash-o');
        $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id+'>span>button.btn-danger').attr('onClick',this.var_name+'.recoverAdditionalPostingType('+id+');return false;').attr('title','Recover Additional Posting Type');
        $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id+'>span>button.btn-primary').addClass('disabled');
        $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id+'>span.data').addClass('deleted');
    }
    addPostingInfoTypeFieldsHTMLForEdit(id,counter,pre='',obj=null){
        console.log('edititng posting type'+id+','+counter+','+pre);
        //var data = $('ul#additionalInfoList>li#additional_info_'+id+'>span.data').html();
        var data = additional_posting_info_types[id].title;
        //console.log(data);
        this.saveButton='<button class="btn btn-success btn-small" onClick="posting.updateAdditionalPostingInfoType('+id+','+counter+');return false;" title="Update Additional Posting Info Type    "><i class="fa fa-floppy-o"></i></button>'
        //if(obj!=null){
        var status = '<input type="hidden" name="additional_posting_type_status['+counter+']" value="edit"/>'
        //}
        this.editFields = '<input type="hidden" name="additional_posting_type_id['+counter+']" value="'+id+'"/>'+status+'<input type="text" name="additional_posting_type_title['+counter+']" class="form-control input-posting" value="'+data+'"/> &nbsp;&nbsp;&nbsp;';//<select class="my_select" name="additional_posting_type['+counter+']><option value="1">value 1</option><option value="2">value 2</option><option value="3">value 3</option></select>';
        this.delete_button = '<button class="btn btn-danger btn-small" onClick="posting.deleteAdditionalPostingType('+counter+');return false;" title="Delete Additional Posting Type"><i class="fa fa-trash-o"></i></button>';
        this.list_data_type[counter] = $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+counter).html();
        $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+counter).html(this.editFields+'<span style="float:right;">'+ this.saveButton+' '+ this.delete_button+'</span>');
        //$('ul#additionalInfoList>li#additional_info_'+id+' select').
        $('select.my_select').select2();
        //$('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+counter+' select').val(type).trigger('change');
        //$('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+counter+'>span>button.btn-danger:nth-child(2)').addClass('disabled');
        if(obj!=null){
            $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+counter+'>input[name="additional_posting_type_title['+counter+']"]').val(obj.title);
            $('ul#additionalInfoTypeList>li#'+pre+'additional_info_'+counter+'>input[name="additional_posting_type_status['+counter+']"').val('edit');
        }
    }
    addPostingInfoFieldsHTMLForAdding(obj = null){
        
        console.log('Adding fields HMTL' + this.additional_posting_info_counter);
        this.addFields = '<input type="text" name="additional_posting_title['+this.additional_posting_info_counter+']" class="form-control input-posting" value="'+''+'"/> &nbsp;&nbsp;&nbsp;'+this.getTypesSelect(this.additional_posting_info_counter);
        console.log("'"+this.pre+"'");
        this.delete_button = '<button class="btn btn-danger btn-small" onClick="posting.deleteAdditionalPosting('+this.additional_posting_info_counter+',\''+this.pre+'\');return false;" title=""Delete Additional Posting Info"><i class="fa fa-trash-o"></i></button>';
        var title_error = '';
        var type_error= '';
        if(obj!=null){
            if(obj.title_error!=null){
                title_error = '<br>'+obj.title_error;
            }
            if(obj.type_id_error!=null){
                type_error = '<br>'+obj.type_id_error;
            }
        }
        $('ul#additionalInfoList').append('<li id="add_additional_info_'+this.additional_posting_info_counter+'">'+this.addFields+'<span style="float:right;">'+this.delete_button+'</span>'+title_error+' '+type_error+'</li>');
        $('select[name="additional_posting_type['+this.additional_posting_info_counter+']"]').select2();
        console.log(obj);
        if(obj!=null){
            $('input[name="additional_posting_title['+this.additional_posting_info_counter+']"').val(obj.title);
            $('select[name="additional_posting_type['+this.additional_posting_info_counter+']"').val(obj.type_id).trigger('change');
        }
        this.additional_posting_info_counter++;
    }
    //edit
    addPostingInfoFieldsHTMLForEdit(id,counter,pre='',obj=null){
        console.log('edititng posting'+id+','+counter+','+pre);
        //var data = $('ul#additionalInfoList>li#additional_info_'+id+'>span.data').html();
        
        var data = additional_posting_info_complete[id].title;
        var type = additional_posting_info_complete[id].type;
        //console.log(data);
        this.undoButton='<button class="btn btn-danger btn-small" onClick="posting.undo('+counter+')" title="Undo"><i class="fa fa-undo"></i></button>'
        //var status = '';
        //if(obj!=null){
        var status = '<input type="hidden" name="additional_posting_status['+counter+']" value="edit"/>'
        //}
        this.editFields = '<input type="hidden" name="additional_posting_id['+counter+']" value="'+id+'"/>'+status+'<input type="text" name="additional_posting_title['+counter+']" class="form-control input-posting" value="'+data+'"/> &nbsp;&nbsp;&nbsp;'+this.getTypesSelect(counter);//<select class="my_select" name="additional_posting_type['+counter+']><option value="1">value 1</option><option value="2">value 2</option><option value="3">value 3</option></select>';
        this.delete_button = '<button class="btn btn-danger btn-small" onClick="posting.deleteAdditionalPosting('+counter+');return false;" title="Delete Additonal Posting Info"><i class="fa fa-trash-o"></i></button>';
        this.list_data[counter] = $('ul#additionalInfoList>li#'+pre+'additional_info_'+counter).html();
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+counter).html(this.editFields+'<span style="float:right;">'+ this.undoButton+' '+ this.delete_button+'</span>');
        //$('ul#additionalInfoList>li#additional_info_'+id+' select').
        $('select.my_select').select2();
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+counter+' select').val(type).trigger('change');
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+counter+'>span>button.btn-danger:nth-child(2)').addClass('disabled');
        if(obj!=null){
            console.log('hello');
            console.log(obj);
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+counter+'>input[name="additional_posting_title['+counter+']"]').val(obj.title);
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+counter+'>input[name="additional_posting_status['+counter+']"').val('edit');
        }
    }
    undo(id,pre=''){
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id).html(this.list_data[id]);
    }
    undo_type(id,pre=''){
        var this_ = this;
        $.ajax({
            url:'<?php echo base_url(); ?>ajaxRecoverPostingAdditionalInfoType',
            method: 'POST',
            data:{id:id},
            success:function(html){
                data = JSON.parse(html);
                if(data.status == true){
                    $('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id).html(this_.list_data_type[id]);
                    additional_posting_info_types[id].deleted = 'false';
                    this_.updateAllTheSelectType()
                    showFixedMessage(data.message,'success');
                }else{
                    showFixedMessage(data.message,'error');
                }
            }
        });
    }
    deleteAdditionalPosting(id,pre=''){
        console.log('delete posting');
        if(pre!=''){
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+id).remove();
        }else{
            //$('ul#additionalInfoList>li#'+pre+'additional_info_'+id).remove();
            this.list_data[id] = $('ul#additionalInfoList>li#'+pre+'additional_info_'+id).html();
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>input[name="additional_posting_status['+id+']"').val('delete');
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span>button.btn-danger>i').addClass('fa-undo');
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span>button.btn-danger').attr('onClick',this.var_name+'.recoverAdditionalPosting('+id+');return false;');
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span>button.btn-primary').addClass('disabled');
            $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span.data').addClass('deleted');
        }
        
        return false;
    }
    recoverAdditionalPosting(id,pre=''){
        console.log('recover posting');
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>input[name="additional_posting_status['+id+']"').val('');
        this.undo(id,pre);
        
        return false;
        //$('ul#additionalInfoList>li#'+pre+'additional_info_'+id).remove();
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span>button.btn-danger>i').addClass('fa-undo');
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span>button.btn-primary').addClass('disabled');
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span.data').addClass('deleted');
        return false;
    }
    recoverAdditionalPostingType(id,pre=''){
        console.log('recover posting type');
        //$('ul#additionalInfoTypeList>li#'+pre+'additional_info_type_'+id+'>input[name="additional_posting_status['+id+']"').val('');
        this.undo_type(id,pre);
        
        return false;
        //$('ul#additionalInfoList>li#'+pre+'additional_info_'+id).remove();
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span>button.btn-danger>i').addClass('fa-undo');
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span>button.btn-primary').addClass('disabled');
        $('ul#additionalInfoList>li#'+pre+'additional_info_'+id+'>span.data').addClass('deleted');
        return false;
    }
    gtAdditionalPostingInfoByIdAjax(id){
        
    }
    getTypesSelect(index,class_=this.select_class,name_=this.select_name){
        var text = '';
        $.each(additional_posting_info_types, function(key,value){
            var disabled = '';
            if(value.deleted=='true'){
                disabled = 'disabled';
            }
            text += '<option value="'+value.id+'" '+disabled+'>'+value.title+'</option>';
        })
        return '<select class="'+class_+'" name="'+name_+'['+index+']">'+text+'</select>';
    }
    getTypesSelectOptions(){
        var text = '';
        if(additional_posting_info_types.length>0){
            $.each(additional_posting_info_types, function(key,value){
                if(value!=undefined){
                    var disabled = '';
                    if(value.deleted=='true'){
                        disabled = 'disabled';
                    }
                    text += '<option value="'+value.id+'" '+disabled+'>'+value.title+'</option>';
                }
            });
        }
        return text;
    }
    selection = [];
    updateAllThePostingTypesText(id=''){
       var span_data = $('ul#additionalInfoList>li>span.data');
       var li = li = $('ul#additionalInfoList>li');
       
            $.each(additional_posting_info_complete,function(k,val){
                $(`ul#additionalInfoList>li#additional_info_${k}>span.data`).html(`${val.title} - ${val.type_title}`);
            })
       /*$.each(li,function(k,val){
           console.log('input[name="additional_posting_id['+(k+1)+']"]');
           var name__ = $(val).children('input[name="additional_posting_id['+(k+1)+']"]')[0].name;
           console.log(name__);
           var key = name__.substring(22,name__.indexOf(']'));
           
           var val = $(val).children('input[name="additional_posting_id['+(k+1)+']"]')[0].value;
           console.log(key);
           console.log(val);
           console.log(additional_posting_info_complete[key].title+' - '+ additional_posting_info_complete[key].type_title);
           $(val).children('span.data').html(additional_posting_info_complete[key].title+' - '+ additional_posting_info_complete[key].type_title);
       })*/
    }
    updateAllTheSelectType(){
        var selects = $('select.my_select');
        var text = this.getTypesSelectOptions();
        var count =1;
        var selection = {};
        
        //this.selection[0] = 'hello';
        //return;
        console.log(this.selection);
        $.each(selects,function(k,val){
            console.log(val);
            $(val).html(text);
            $(val).trigger('change');
            if($(val).val()!=undefined){
                console.log(selection);
                Object.assign(selection, {count: $(val).val()});
                //this.selection[count] = $(val).val();
            }else{
            
            }
            
            
            count++;
        })
        console.log(this.selection);
    }
    removeTypeSelect(id){
        
    }
    /*addTypeSelect(value){
        //add it to the server
        //get the id
        var id = 4;
        this.additional_posting_info_types[id] = value;
    }*/
    
    initializeAdditionalPostingType(types){
        console.log(types);
        console.log('types');
        var this_ = this;
        this.additional_posting_info_types = {};
        $.each(types,function(k,val){
            //console.log(this);
            console.log(val);
            if(val.deleted == 'true'){
                this_.deleteHtmlAdditionalPostingInfoType(val.id,'');
            }
           Object.assign(this_.additional_posting_info_types,{[val.id]:val.title});
        });
    }
}
function showFixedMessage(message_,status='success'){
    if(status=='success'){
        $('#message_box').removeClass('error');
    }else{
        $('#message_box').removeClass('success');
    }
    $('#message_box').addClass(status).css('display','inline');
    $('#message_box>p.data').html(message_);
}
function hideFixedMessage(){
    $('#message_box').css('display','none');
}
$('.my_toast>span').on('click',function(){hideFixedMessage()});
var posting = new Posting();
posting.initializeAdditionalPostingType(additional_posting_info_types);
posting.additional_posting_info_counter = <?php echo ++$count; ?>;
//posting.addPostingInfoFieldsHTMLForAdding();
//posting.addPostingInfoFieldsHTMLForEdit(1);
 $.each(additional_posting_info_complete,function(k,val){
           if(val.deleted=='true'){
               console.log('hi');
               posting.deleteAdditionalPosting(val.id);
           } else{
               console.log('bi');
           }
        });
function addPostingInfoFields(){
}
<?php
$fields = ['title'=>'additional_posting_title','type_id'=>'additional_posting_type'];
    if(isset($additional_info_objs) && $additional_info_objs!=null){
        foreach($additional_info_objs as $k=>$obj){
            //var_dump($obj);
            foreach($fields as $k1=>$field){
                if(null!=form_error($field.'['.$k.']')){
                    $obj->setError($k1,form_error($field.'['.$k.']'));
                }
            }
            
            if($obj->id!=null){ //edited
                //var_dump($obj);
                //die;
                if($obj->foundAnyError()==true){
                ?>
                    //console.log(<?php echo json_encode($obj); ?>);
                    posting.addPostingInfoFieldsHTMLForEdit(<?= $obj->id; ?>,<?= $k; ?>,'',<?php echo json_encode($obj); ?>);
                <?php
                }
            }else{  //added
                ?>
                    posting.addPostingInfoFieldsHTMLForAdding(<?php echo json_encode($obj); ?>);
                    <?php
            }
        }
    }
?>
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