<style>
.main_type{
	background-color:#f5f5f5;
	color:orange;
}
.circle{
	border-radius:10px;
	width:15px;
	height:15px;
}	
.red{background-color:red;}
.orange{background-color:orange;}
.green{color:#2e9028;};
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
				 <?php  
 echo form_dropdown('main_category', $weapon_main_categories, $selected_main_category,'id="main_category" data-placeholder="Select Main Category" title="Please select Main Category"  class="select2" onChange="getSubCategories()"'); 
 echo form_error('main_category');

 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
				 <?php  
 echo form_dropdown('sub_category', $sub_categories, set_value('sub_category'),'id="sub_category" data-placeholder="Select Sub Category" title="Please select Sub Category"  class="select2"  onChange="getWeaponsNames()"'); 
 echo form_error('sub_category');

 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			
			<div class="col-md-2">
				<div class="form-group">
				 <?php  
					//$units = array('PAP','IRB','CDO');
/*newarea Textfield*/
 echo form_dropdown('units', $units, set_value('units',(null!=$this->input->post('units'))? $this->input->post('units') : $default_unit),'id="units" data-placeholder="Select Unit(s)" title="Please select Unit(s)"  class="select2"'); 
 echo form_error('units');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="form-group">
				 <?php  
					//$weapons = array('Ak-47','dishkieoon');
				 
/*newarea Textfield*/
 echo form_dropdown('weapons[]', $weapons, set_value('weapons',(null!=$this->input->post('weapons'))? $this->input->post('weapons') : ''),'id="weapons" data-placeholder="Select Weapon(s)" title="Please select Weapon(s)" multiple class="select2"'); 
 echo form_error('weapons');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			
		</div>
		<br>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
				 <?php  
					
				 
/*newarea Textfield*/
 echo form_dropdown('type', $types, set_value('type',(null!=$this->input->post('type'))? $this->input->post('type') : $default_type),'id="type" data-placeholder="Select Type" title="Please select Type"  class="select2"'); 
 echo form_error('type');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			<div class="col-md-5">
			</div>
			<div class="col-md-2 text-right" style="padding-top:0px;">
				<input type="submit" value="Submit" class="btn btn-default">
				<input type="submit" class="btn btn-primary" value="Download" name="download">
			</div>
			
			
			
			<div class="col-md-2 text-right">
				<input type="checkbox" id="hideZeroWeapons" name="hideZeroWeapons" <?php if(null!=$this->input->post('hideZeroWeapons')){echo 'checked';}?>>
				<label for="hideZeroWeapons">Skip Zero Weapons </label>
			</div>
			
			
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-12">
					<div class="table-responsive">
			 <h4>Showing 
			 <?php if(null!=$this->input->post('type')){echo $types[$this->input->post('type')];}else{echo $types[$default_type];}	 ?>
			 Weapons Figures in 
			 <?php if(null!=$this->input->post('units')){echo  $units[$this->input->post('units')];}else{ echo $units[$default_unit]; }?>
			 </h4>
			 Main Category: <span class="circle orange">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;
			 Sub Category: <span class="circle red">&nbsp;&nbsp;&nbsp;&nbsp;</span>
             <!--table class="table  table-fixedheader" id="tableFigure"-->

            
			<!--thead>
				<tr><th>S.No.</th><th>Weapon</th>
				<?php /* foreach($battalions as $k=>$v){
					echo '<th>'.$v.'</th>';
				} */?>
				<th>Total</th>
				</tr>
				
			</thead-->
			
			<?php
			$weapon_name_width='width:300px;';
			$total_width='width:90px;';
			$count =1;
			if($categorised_selected_weapons=='NO WEAPONS'){ ?>
				<table class="table  table-fixedheader" id="tableFigure">
					<tbody><tr><td class="text-center">No Weapon found</td></tr></tbody>
				</table>
			<?php
			}else{
				foreach($categorised_selected_weapons as $main_id=>$sub_categories_){
					?>
					<table class="table">
					<tr><td colspan="14" class="text-center main_type" ><?php echo $weapon_main_categories[$main_id];?></td></tr>
					<tr><th>S.No.</th><th style="<?php echo $weapon_name_width; ?>">Weapon</th>
					<?php foreach($battalions as $k=>$v){
						echo '<th>'.$v.'</th>';
					}?>
					<th style="<?php echo $total_width;?>">Total</th>
					</tr>
					<?php
					foreach($sub_categories_ as $sub_id=>$weapons){
						echo '<tr>';
						echo '<td  style="'.$weapon_name_width.'color:red;" colspan="14">'.$sub_categories[$sub_id].'</td></tr>';
						foreach($weapons as $weapon_name=>$battalions_weapons){
							if(in_array($weapon_name,$selected_weapons)){
								echo '<tr>';
								echo '<td>'.$count.'</td>';
								$count++;
								echo '<td  style="'.$weapon_name_width.'">'.break_name_into_spaces($weapon_name).'</td>';
								foreach($battalions as $bat_id=>$bat_name){ 
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id][$default_type].'</td>';
								}
								echo '<td style="'.$total_width.'">'.$weapon_figures[$weapon_name][$default_type]['grand_total'].'</td>';
								echo '</tr>';
							}
						}
						
						echo '</tr>';
					}
					echo '</table>';
				}
			
				echo '<TABLE class="table"><TBODY>';
					echo '<tr><th colspan="14" class="text-center green">Grand Total</th></tr>';
					echo '<tr><th>&nbsp;&nbsp;&nbsp;</th><th style="'.$weapon_name_width.'">&nbsp;</th>';
					foreach($battalions as $k=>$v){
						echo '<th>'.$v.'</th>';
					}
					echo '</tr><tr>';
					echo '<td>&nbsp;</td>';
					echo '<td style="'.$weapon_name_width.'">Total</td>';
					foreach($battalions as $bat_id=>$bat_name){ 
						echo '<td>'.$weapon_figures[$bat_id][$default_type]['grand_total'].'</td>';
					} 
					echo '<td style="'.$total_width.'"><h4>'; echo $weapon_figures[$default_type]['grand_total']; echo '</h4></td>';
					echo '</tr>';
			?>
				</tbody>
			</table>
			<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function getSubCategories(){
	var selected_main_category_id = $('#main_category').val();
	if(selected_main_category_id!=''){
		var array_main_cat = [selected_main_category_id];
		
		//alert(array_main_cat);
		$.ajax({
			method: "POST",
			url: '<?php echo base_url();?>'+'ca-khc-weapon-sub-category-list-ajax2',
			data: { main_category: array_main_cat }
		})
		.done(function( msg ) {
			//alert(msg);
			var json_data = JSON.parse(msg);
			
			//console.log(msg);
			$('#sub_category').empty();
			var newOption = new Option('Select Sub Category', '', false, false);
				$('#sub_category').append(newOption);
			$.each(json_data.sub_categories,function(index,value){
				var newOption = new Option(value, index, false, false);
				$('#sub_category').append(newOption);
			});
			$('#sub_category').trigger('change');
		});
	}else{
		$('#sub_category').empty();
		var newOption = new Option('Select the Main Category', '', false, false);
		$('#sub_category').append(newOption);
	}
}
function getWeaponsNames(){
	var selected_sub_category_id = $('#sub_category').val();
	//var array_main_cat = [selected_main_category_id];
	//alert(array_main_cat);
	$.ajax({
		method: "POST",
		url: '<?php echo base_url();?>'+'ca-khc-weapon-under-sub-category-list-ajax',
		data: { selected_sub_category_id: selected_sub_category_id }
	})
	.done(function( msg ) {
		//alert(msg);
		//alert(msg);
		var json_data = JSON.parse(msg);
		
		//console.log(msg);
		$('#weapons').empty();
		$.each(json_data.weapons,function(index,value){
			var newOption = new Option(value, value, false, false);
			$('#weapons').append(newOption);
		});
		$('#weapons').trigger('change');
	});
}
</script>
