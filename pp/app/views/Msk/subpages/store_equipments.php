<?php
	
?>
<div class="panel panel-default" id="figure_view_bn">
	<?php /*Create HTML form*/
	$attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
      );
	echo form_open_multipart("equipment-figures?page=STORE_EQUIPMENTS", $attributes);?>
        <div class="panel-heading">
          <div class="row">
			<div class="col-md-2">
			 Select Unit
		<?php
			echo form_dropdown('unit', $units, set_value('unit',(isset($_POST['unit'])) ? $_POST['unit'] : $selectedUnit),'id="ito" data-placeholder="Select Unit" title="Please select unit" class="select2"'); 
			echo form_error('unit');
		?>
		 
			</div>	
			<div class="col-md-2">
			 Select Category
		<?php
			echo form_dropdown('category', $categories, set_value('category',(isset($_POST['category'])) ? $_POST['category'] : $selectedCategory),'id="category" data-placeholder="Select category" title="Please select battalion(s)" class="select2" onChange="getEquipmentNames()"'); 
			echo form_error('category');
		?>
		 
			</div>
			<div class="col-md-6">
			 Select Equipment
		<?php
			echo form_dropdown('equipments[]', $itemNamesArray, set_value('equipments',(isset($_POST['equipments'])) ? $_POST['equipments'] : $selectedCategory),'id="equipments" data-placeholder="Select category" title="Please select battalion(s)" class="select2" multiple '); 
			echo form_error('equipments');
		?>
		 
			</div>
			<div class="col-md-2">
			Select Equipment Type
				
				<?php
					echo form_dropdown('equipmentDataType', $equipmentDataTypes, set_value('dataType',(isset($_POST['equipmentDataType'])) ? $_POST['equipmentDataType'] : $selectedEquipmentDataType),'id="dataType" data-placeholder="Select Type" title="Please select type" class="select2"'); 
					echo form_error('dataType');
					$dataType = (isset($_POST['equipmentDataType'])) ? $_POST['equipmentDataType'] : $selectedEquipmentDataType;
				
				?>
			</div>
			</div>
			<div class="row">
			<div class="col-md-9">
				<h4>Showing "<?php echo $equipmentDataTypes[$selectedEquipmentDataType]; ?>" items in "<?php echo (isset($_POST['category'])) ? $_POST['category'] : $selectedCategory; ?>" of <?php echo $units[$selectedUnit]?></h4>
			</div>
			<div class="col-md-3">
			<br>
			<input type="submit" class="btn" value="Search" name="figuresBnWise">
			<input type="submit" name="download" class="btn btn-primary" value="Download Excel"/><br>
			<input type="checkbox" name="skipZeroEquipments" id="skipZeroEquipments"<?php echo (null!=$this->input->post('skipZeroEquipments'))?'checked':'';?>><label for="skipZeroEquipments">Skip Zero Value Equipments</label>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-12">
			<br>
				<table class="table">
					<thead>
						<tr>
		  <?php
		  $grand_total_final = 0;
		  $grand_total = array();
				echo '<th>S.No.</th><th>Equipments</th>';
				foreach($battalions as $k1=>$v1){
					echo '<th>';
					echo $v1;
					$grand_total[$k1][$dataType] = 0;
					echo '</th>';
				}
				echo '<th>Total</th></tr></thead><tbody>';
				$counter = 1;
				foreach($trimmedEquipmentsName as $k2=>$v2){
					echo '<tr><td>'.$counter.'</td><td>'.$v2.'</td>';
					$total = 0;
					foreach($battalions as $bnid=>$v1){
						echo '<td>'.$holdings[$bnid][$v2][$dataType].'</td>';
						$grand_total[$bnid][$dataType]+=$holdings[$bnid][$v2][$dataType];
						$total +=$holdings[$bnid][$v2][$dataType];
					}
					echo '<td>'.$total.'</td></tr>';
					$counter++;
				}
				echo '<tr><td>&nbsp;</td><td>Grand Total</td>';
				foreach($battalions as $bnid=>$v1){
					echo '<td>'.$grand_total[$bnid][$dataType].'</td>';
					$grand_total_final +=$grand_total[$bnid][$dataType];
					//$total +=$grand_total[$bnid][$dataType];
				}
				echo '<td>'.$grand_total_final.'</td></tr>';
		?>		
					</tbody>
				</table>
			</div>
		  </div>
		  </div>
		</div>
	</div>