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
			<div class="col-md-2">
				<div class="form-group">
				
				 <?php  
					 $data = array(
						'type'  => 'text',
						'name'  => 'battalion',
						'id'    => 'battalion',
						'value' => $this->session->userdata('nick'),
						'class' => 'form-control',
						'disabled'=>'disabled'
					);
					echo form_input($data);	
				?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
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
			
			<div class="col-md-7">
			</div>
			<div class="col-md-3 text-right" style="padding-top:0px;">
				<input type="submit" value="Submit" class="btn btn-default"/>
				<a href="<?php echo current_url(); ?>"  class="btn btn-default">Reset</a>
				<input type="submit" class="btn btn-primary" value="Download" name="download">
			</div>
			
			
			
			<div class="col-md-2 text-right">
				<input type="checkbox" id="hideZeroWeapons" name="hideZeroWeapons" <?php if(null!=$this->input->post('hideZeroWeapons')){echo 'checked';}?>>
				<label for="hideZeroWeapons">Skip Zero Weapons </label>
			</div>
			
			
		</div>
	</div>
</div>
<?php
	
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-12">
					<div class="table-responsive">
			 <h4>Showing Weapons in <?php echo $this->session->userdata('nick'); ?>
			 
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
			$remarks_width='width:250px;';
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
						//echo '<th>'.$v.'</th>';
					}?>
					<th>Holding</th>
					<th>Issued</th>
					<th>Lost</th>
					<th>Case Property in Kot</th>
					<th>Case Property in PS</th>
					<th>Condemn Non-Serviceable</th>
					<th>In Kot (Available/Serviceable in Kot)</th>
					<th style="<?php echo $remarks_width; ?>">Remarks</th>
					</tr>
					<?php
					foreach($sub_categories_ as $sub_id=>$weapons){
						echo '<tr>';
						echo '<td  style="color:red;" colspan="14">'.$sub_categories[$sub_id].'</td></tr>';
						foreach($weapons as $weapon_name=>$battalions_weapons){
							if(in_array($weapon_name,$selected_weapons)){
								echo '<tr>';
								echo '<td>'.$count.'</td>';
								$count++;
								echo '<td  style="'.$weapon_name_width.'">'.break_name_into_spaces($weapon_name).'</td>';
								foreach($battalions as $bat_id=>$bat_name){ 
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id]['holding'].'</td>';
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id]['issued'].'</td>';
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id]['lost'].'</td>';
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id]['case_property_in_kot'].'</td>';
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id]['case_property_in_ps'].'</td>';
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id]['condemn'].'</td>';
									echo '<td>'.$battalions_weapons[$weapon_name][$bat_id]['in_kot'].'</td>';
									if(in_array($weapon_name,array_keys($remarks))){
										echo '<td>'.$remarks[$weapon_name].'</td>';
									}else{
										echo '<td>&nbsp;-</td>';
									}
								}
								
								//echo '<td>'.$weapon_figures[$weapon_name][$default_type]['grand_total'].'</td>';
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
						//echo '<th>'.$v.'</th>';
					}
					echo <<<GRATOT
					<th>Holding</th>
					<th>Issued</th>
					<th>Lost</th>
					<th>Case Property in Kot</th>
					<th>Case Property in PS</th>
					<th>Condemn Non-Serviceable</th>
					<th>In Kot (Available/Serviceable in Kot)</th>
					<th style="{$remarks_width}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
GRATOT;
					echo '</tr><tr>';
					echo '<td>&nbsp;</td>';
					echo '<td>Total</td>';
					foreach($battalions as $bat_id=>$bat_name){ 
						echo '<td>'.$weapon_figures[$bat_id]['holding']['grand_total'].'</td>';
						echo '<td>'.$weapon_figures[$bat_id]['issued']['grand_total'].'</td>';
						echo '<td>'.$weapon_figures[$bat_id]['lost']['grand_total'].'</td>';
						echo '<td>'.$weapon_figures[$bat_id]['case_property_in_kot']['grand_total'].'</td>';
						echo '<td>'.$weapon_figures[$bat_id]['case_property_in_ps']['grand_total'].'</td>';
						echo '<td>'.$weapon_figures[$bat_id]['condemn']['grand_total'].'</td>';
						echo '<td>'.$weapon_figures[$bat_id]['in_kot']['grand_total'].'</td>';
						echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
					} 
					//echo '<td><h1>'; echo $weapon_figures[$default_type]['grand_total']; echo '</h1></td>';
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
