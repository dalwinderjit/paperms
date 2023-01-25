<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
				 <?php  
					//$battalions = array('7PAP','27 pap');
/*newarea Textfield*/
 echo form_dropdown('battalions[]', $battalions, set_value('battalions',(isset($_GET['battalions'])) ? $_GET['battalions'] : ''),'id="battalions" data-placeholder="Select Battalion(s)" title="Please select battalion(s)" multiple class="select2"'); 
 echo form_error('battalions');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				 <?php  
					//$weapons = array('7PAP','27 pap');
/*newarea Textfield*/
 echo form_dropdown('weapons[]', $weapons, set_value('weapons',(isset($_GET['weapons'])) ? $_GET['weapons'] : ''),'id="weapons" data-placeholder="Select Weapon(s)" title="Please select Weapon(s)" multiple class="select2"'); 
 echo form_error('weapons');
/*----End newarea Textfield----*/
 ?>
					<label for="weapons" class="error"></label>
				</div>
			</div>
			<?php if(false){ ?>
			<div class="col-md-2">
				<div class="form-group">
				 <?php  
					
				 
/*newarea Textfield*/
 echo form_dropdown('selected_type', $selected_types, set_value('selected_type',(isset($_GET['selected_type'])) ? $_GET['selected_type'] : ''),'id="selected_type" data-placeholder="Select Type" title="Please select Type"  class="select2"'); 
 echo form_error('selected_type');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			<?php } ?>
			<div class="col-md-4">
			<table><tr><td>
				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-default">
					<input type="submit" class="btn btn-primary" value="Download" name="download">
					
				</div>
				</td><td>
				<div class="form-group">
					<input type="checkbox" id="hideZeroBattalions" name="hideZeroBattalions" <?php if(null!=$this->input->post('hideZeroBattalions')){echo 'checked'; }?>>
					<label for="hideZeroBattalions">Skip Zero Battalions</label><br>	
					<input type="checkbox" id="hideZeroWeapons" name="hideZeroWeapons" <?php if(null!=$this->input->post('hideZeroWeapons')){echo 'checked'; }?>>
					<label for="hideZeroWeapons">Skip Zero Weapons </label>
				</div>
				</td></tr></table>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <!--h4>Total Rows Found: 2725</h4-->
					 <?php $serial_no = 0	; 
					 
					 foreach($weapons_data as $weapon_name=>$battalion){ 
						$serial_no++;
					 ?>
					  <table class="table  table-fixedheader" id="tableFigure">
					  <caption><span class="text-left pull-left"><h1><?php echo $serial_no; ?></h1></span><?php echo $weapon_name; ?></caption>	
					<thead>
						
					<tr><th>S.No.</th><th>Battalion</th><th>Holding<br>Total</th><th>Issued</th><th>Lost</th><th>Case Property in Kot</th><th>Case Property in PS</th><th>Condemn<br>Non-Serviceable</th><th>In Kot <br>(Available/Serviceable in Kot)</th><!--th>Empty</th--><!--th>Remarks</th--></tr></thead>
					<tbody>                      
						<?php 
							if(empty($battalion)){ ?>
							<tr><td colspan="9" class="text-center">ALL Battalion Zero</td></tr>
						<?php	}else{
							
						$i=0;
							foreach($battalion as $battalion_id=>$parameters){ $i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $battalions[$battalion_id]; ?></td>
							<td><?php echo $parameters['total']; ?></td>
							<td><?php echo $parameters['issued']; ?></td>
							<td><?php echo $parameters['lost']; ?></td>
							<td><?php echo $parameters['case_property_in_kot']; ?></td>
							<td><?php echo $parameters['case_property_in_ps']; ?></td>
							<td><?php echo $parameters['condemn']; ?></td>
							<td><?php echo $parameters['in_kot']; ?></td>
							<!--td><?php //echo $parameters['empty']; ?></td-->
							
						</tr>

						<?php }} ?>
						<tr>
							<td>&nbsp;</td>
							<td>Grand Total</td>
							<td><?php echo $grand_total[$weapon_name]['total']; ?></td>
							<td><?php echo $grand_total[$weapon_name]['issued']; ?></td>
							<td><?php echo $grand_total[$weapon_name]['lost']; ?></td>
							<td><?php echo $grand_total[$weapon_name]['case_property_in_kot']; ?></td>
							<td><?php echo $grand_total[$weapon_name]['case_property_in_ps']; ?></td>
							<td><?php echo $grand_total[$weapon_name]['condemn']; ?></td>
							<td><?php echo $grand_total[$weapon_name]['in_kot']; ?></td>
							
							
							<!--td>Lorem Ipsum</td-->
						</tr>
					</tbody>
					</table><br>
					<?php } ?>
				  </div>
			</div>
		</div>
	</div>
</div>	
