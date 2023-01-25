
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			
			<div class="col-md-5">
				<div class="form-group">
				 <?php  
					
				 
/*newarea Textfield*/
 echo form_dropdown('weapon[]', $weapons, set_value('weapon',(isset($_POST['weapon'])) ? $_POST['weapon'] : ''),'id="weapon" data-placeholder="Select Weapon(s)" title="Please select Weapon(s)" multiple class="select2"'); 
 echo form_error('weapon');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			
			<div class="col-md-2">
				<div class="form-group">
				 <?php  
					
				 
/*newarea Textfield*/
 echo form_dropdown('type', $types, set_value('type',(isset($_POST['type'])) ? $_POST['type'] : ''),'id="type" data-placeholder="Select type" title="Please select Type" class="select2"'); 
 echo form_error('type');
/*----End newarea Textfield----*/
 ?>
					<label for="tpi" class="error"></label>
				</div>
			</div>
			<div class="col-md-3 text-right">
				<input type="submit" value="Submit" class="btn btn-default">
				<input type="submit" class="btn btn-primary" value="Download" name="download_cons_wep">
				<br>
				<input type="checkbox" id="hideZeroWeapons" name="hideZeroWeapons" <?php if(null!=$this->input->post('hideZeroWeapons')){ echo 'checked';}?>>
				<label for="hideZeroWeapons">Skip Zero quantity weapon</label><br>	
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-12 text-center">
			<h3>Showing <?php echo $types[$default_type]; ?> Weapon consolidated figures<h3>
			</div>
				<div class="col-md-12">
					<div class="table-responsive">
			 <!--h4>Total Rows Found: 2725</h4-->
			 
              <table class="table  table-fixedheader" id="tableFigure">
			 
            <thead>
				
			<tr><th>S.No.</th><th>Weapon</th><th>PAP</th><th>IRB</th><th>CDO</th><th>Total</th></tr></thead>
			<tbody>                      
				<?php $serail_no = 0; foreach($selected_weapons as $weapon_id=>$weapon_name){ $serail_no++;	?>
					<tr>
						<td><?php echo $serail_no; ?></td>
						<td><?php echo $weapon_name; ?></td>
						<?php foreach($units as $unit_id=>$unit_name){ ?>
						<td><?php echo $weapon_consolidate_figures[$weapon_id][$unit_id][$default_type]; ?></td>
						<?php } 
							echo '<td>'.$weapon_consolidate_figures[$weapon_id][$default_type].'</td>';?>
					</tr>
				<?php } ?>
				<tr>
					<td></td>
					<td>Total </td>
				<?php foreach($units as $unit_id=>$unit_name){ ?>
					<td><?php echo $weapon_consolidate_figures[$unit_id][$default_type]; ?></td>
					<?php } ?>
					<td><h1><?php echo $weapon_consolidate_figures[$default_type]['grand_total'];?></h1></td>
				</tr>
            </tbody>
			</table><br>
				
					</div>
				</div>
		  </div>
	</div>
</div>
