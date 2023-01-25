<div class="panel panel-default" id="figure_view_bn">
	<?php /*Create HTML form*/
	$attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
     );
	echo form_open_multipart("equipment-figures?page=ISSUED_HOLDING_INKOT", $attributes);?>
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
				<table class="table">
					<thead>
						<tr>
		  <?php
			$grand_total = array();
						echo '<th>S.No.</th><th>Battalions</th>';
						foreach($trimmedEquipmentsName as $k1=>$v1){
						?>
							<th>
								<table class="table">
									<tr><th colspan="3"><?php echo $v1; ?></th></tr>
									<tr><td>Holding</td><td>Issued</td><td>Un Serviceable</td><td>Available In Store</td></tr>
								</table>
							</th>
						<?php
						}
						?>
						</tr>
					</thead>
					<tbody>
						<?php
							$counter = 1;
						?>
							<?php foreach($battalions as $bnid=>$v1){ ?>
								<tr>
									<td><?php echo $counter; ?></td>
									<td><?php echo $v1; ?></td>
									<?php foreach($trimmedEquipmentsName as $k2=>$v2){ 
										$grand_total[$v2]['issued'] += $holdings[$bnid][$v2]['issued'];
										$grand_total[$v2]['holding'] += $holdings[$bnid][$v2]['holding'];
										$grand_total[$v2]['unserviceable'] += $holdings[$bnid][$v2]['unserviceable'];
										$grand_total[$v2]['serviceable_in_store'] += $holdings[$bnid][$v2]['serviceable_in_store'];
									?>
									<td>
										<table class="table">
											<tbody>
												<tr>
													<td><?php echo $holdings[$bnid][$v2]['holding']; ?></td>
													<td><?php echo $holdings[$bnid][$v2]['issued']; ?></td>
													<td><?php echo $holdings[$bnid][$v2]['unserviceable']; ?></td>
													<td><?php echo $holdings[$bnid][$v2]['serviceable_in_store']; ?></td>
												</tr>
											</tbody>
										</table>
									</td>
									<?php  } ?>
								</tr>
							<?php
								$counter++;
								}
							?>
							<tr>
								<td></td>
								<td>Total</td>
								
								
								<?php foreach($trimmedEquipmentsName as $k2=>$v2){ ?>
									<td>
									<table class="table">
											<tbody>
												<tr>
								<?php
									echo '<th>'.$grand_total[$v2]['holding'].'</th>';
									echo '<th>'.$grand_total[$v2]['issued'].'</th>';
									echo '<th>'.$grand_total[$v2]['unserviceable'].'</th>';
									echo '<th>'.$grand_total[$v2]['serviceable_in_store'].'</th>';
								?>
											</tr>
										</tbody>
									</table>
									</td>
								<?php } ?>
							</tr>
					</tbody>
				</table>
			</div>
			
		  </div>
		  </div>
		</div>
	</div>