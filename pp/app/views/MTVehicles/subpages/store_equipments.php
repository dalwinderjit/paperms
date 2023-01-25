
<div class="panel panel-default" id="figure_view_bn">
	<?php /*Create HTML form*/
	$attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
      );
	echo form_open_multipart("mt-figure-view?page=STORE_EQUIPMENTS", $attributes);?>
        <div class="panel-heading">
          <div class="row">
			<div class="col-md-3">
			 Select Unit
		<?php
			
			unset($units['other']);
			echo form_dropdown('unit', $units, set_value('unit',(isset($_POST['unit'])) ? $_POST['unit'] : $selectedUnit),'id="ito" data-placeholder="Select Unit" title="Please select unit" class="select2""'); 
			echo form_error('unit');
		?>
			
			</div>	
			<div class="col-md-3">
			 Select Vehicle
		<?php
			echo form_dropdown('vehicles[]', $vehicles, set_value('vehicles',(isset($_POST['vehicles'])) ? $_POST['vehicles'] : $selectedVehicle),'id="ito" data-placeholder="Select Vehicle" title="Please select Vehicle(s)" class="select2" multiple'); 
			echo form_error('vehicles');
		?>
		 
			</div>
			<div class="col-md-3">
			Select Type
				<?php
					echo form_dropdown('equipmentDataType', $types, set_value('equipmentDataType',(isset($_POST['equipmentDataType'])) ? $_POST['equipmentDataType'] : $typetobeselected),'id="dataType" data-placeholder="Select Type" title="Please select type" class="select2"'); 
					echo form_error('equipmentDataType');
				
				?>
			</div>
			<div class="col-md-3">
			<br>
			<input type="submit" class="btn" value="Search" name="figuresBnWise">
			<input type="submit" name="download" class="btn btn-primary" value="Download Excel"/><br>
			<input type="checkbox" name="skipZeroVechicles" id="skipZeroVechicles"<?php echo (null!=$this->input->post('skipZeroVechicles'))?'checked':'';?>><label for="skipZeroVechicles">Skip Zero Value Vehicles</label>
			</div>
		  </div>
		  <BR>
		  <div class="row">
			<div class="col-md-9">
				<h4>Showing "<?php echo $selectedTypeInMessage; ?>" vehicles in "<?php echo $units[$selectedUnit]; ?>"!</h4>
			</div>
			
		  </div>
		  <div class="row">
			<div class="col-md-12">
			<br>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>S. No.</th>
							<th>Vehicles</th>
							<?php foreach($selected_battalions as $k=>$v){ ?>
							<th><?php echo $v; ?></th>
							<?php } ?>
							<th>Total</th>
						</tr>
					</thead>
					
					<tbody>
						<?php 
						$i=0;
						//echo '<tr><td>';
						//var_dump($consolidatedMTData);
						//echo '</td></tr>';
						//foreach($consolidatedMTData as $k=>$v){ 
						foreach($consolidatedMTData as $vehicle_name=>$bat_data){
							$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td class="text-left"><?php echo $vehicle_name; ?></td>
							<?php
								foreach($selected_battalions as $bat_id=>$data){
									echo '<td>';
									echo $bat_data[$bat_id][$dataType];
									echo '</td>';
								}
							if($dataType=="total"){
								?><td><?php echo $bat_data['grand_'.$dataType]; ?></td><?php
							}else{
								?>
							<td><b><?php echo $bat_data['grand_total_'.$dataType]; ?></b></td>
							<?php } ?>
						</tr>
						<?php } ?>
						<tr>
						<td></td>
						<td>Grand Total</td>
						<?php foreach($selected_battalions as $bat_id=>$data){
							echo '<td><b>';
							echo $battalions_grand_totals['grand_total_'.$dataType.$bat_id];
							echo '</b></td>';
						}
						echo '<td><h3>';
						echo $battalions_grand_totals['grand_total'];
						echo '</h3></td>';
						?>
						</tr>
					</tbody>
				</table>
				
			</div>
		  </div>
		  </div>
		</div>
	</div>