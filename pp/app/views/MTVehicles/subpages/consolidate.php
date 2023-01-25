<?php
/*  var_dump($data);
die; */
 
?>
 <div class="panel panel-default" id="figure_view_consolid">
        <div class="panel-heading">
			<?php /*Create HTML form*/
				$attributes = array(
				  'name'        => 'basicForm4',
				  'id'        => 'basicForm4',
				  'accept-charset'  => 'utf-8',
				  'autocomplete'    =>'off', 
				  'method' => 'post',
				 
				  );
				echo form_open_multipart("mt-figure-view?page=CONSOLIDATE", $attributes);
			?>
			<div class="row">
				<div class="col-md-4">
				&nbsp;
				</div>
				<div class="col-md-3">
					<?php
						echo form_dropdown('vehicles[]', $vehicles, set_value('vehicles',(isset($_POST['vehicles'])) ? $_POST['vehicles'] : ''),'id="vehicles" data-placeholder="Select Vehicles" title="Please select Vehicle(s)" class="select2" multiple'); 
						echo form_error('vehicles');
					?>
				</div>
				<div class="col-md-2">
					<input type="hidden" name="page" value="CONSOLIDATE">
					<?php
					echo form_dropdown('dataType', $types, set_value('dataType',(isset($_POST['dataType'])) ? $_POST['dataType'] : 'holding'),'id="dataType" data-placeholder="Select Type" title="Please select type" class="select2"'); 
					echo form_error('dataType');?>
				</div>
				<div class="col-md-3">
					<input type="submit" name="types" class="btn" value="Get Values"/>&nbsp;&nbsp;
					<input type="submit" name="downloadConsolidateFiguresOfVehicle" class="btn btn-primary" value="Download"/><BR>
				</div>
			</div>
			<div class= "row">
				<div class="col-md-9 text-left">
					<h4>"<?php echo $types[(isset($_POST['dataType'])) ? $_POST['dataType'] : 'holding_on_off_road'];?>" Vehicles in MT of PAP's,IRB's and CDO's including Training Centre's</h4>
				</div>	
				<div class="col-md-3">
					<input type="checkbox" name="skipZeroVehicles" id="skipZeroVehicles" <?php if(null!=$this->input->post('skipZeroVehicles')){echo "checked";}else{}?>/><label for="skipZeroVehicles">Skip total zero value records</label>
				</div>
			</div>
				<?php echo form_close(); ?>
          <div class="row">
		  <?php //var_dump($selectedVehicles); ?>
			<table class="table text-left table-striped table-hover">
			<thead>
				<tr>
					<th>S. No.</th>
					<th>Name of Vehicle</th>
					<th>PAP</th>
					<th>IRB</th>
					<th>CDO</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
			
			<?php $i = 0; foreach($consolidatedMTData as $vehicle_name=>$parameters){ $i++;?>
			
			<?php  ?>	
			
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $vehicle_name; ?></td>
					<td><?php echo $parameters['pap'][$type]; ?></td>
					<td><?php echo $parameters['irb'][$type]; ?></td>
					<td><?php echo $parameters['cdo'][$type]; ?></td>
					<td><?php echo $parameters['grand_total_'.$type]; ?></td>
				</tr>
			<?php } ?>
			<tr>
					<td>&nbsp;</td>
					<td>Grand Total</td>
			<?php 
				unset($units['other']);
			foreach($units as $k=>$unit_name){
				echo '<td>'.$grandTotalData['grandTotal'][$k].'</td>';
			}?>
					
					<td><h3><?php echo $grandTotalData['totalGrand'];?></h3></td>
				</tr>
			</tbody>
			</table>
		  </div>
		</div>
	</div>