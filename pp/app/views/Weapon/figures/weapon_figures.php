<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
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
			<div class="col-md-2 text-right" style="padding-top:0px;">
				<input type="submit" value="Submit" class="btn btn-default">
				<input type="submit" class="btn btn-primary" value="Download" name="download">
			</div>
		</div>
		
		<div class="row">	
			<div class="col-md-9">
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
             <table class="table  table-fixedheader" id="tableFigure">

            
			<thead>
				<tr><th>S.No.</th><th>Weapon</th>
				<?php foreach($battalions as $k=>$v){
					echo '<th>'.$v.'</th>';
				}?>
				<th>Total</th>
				</tr>
				
			</thead>
			<tbody>                      
				<?php 
				$serial_no = 0;
				if(empty($selected_weapons)){ ?>
					<tr>
					<td colspan="<?php echo $columns; ?>" class="text-center" >No Data found</td>
					</tr>
				<?php
				}else{
				foreach($selected_weapons as $wep_id=>$v){ 
				$serial_no++;
				?>
				<tr>
					<td><?php echo $serial_no; ?></td>
					<td><?php echo $wep_id; ?></td>
					<?php foreach($battalions as $bat_id=>$bat_name){ ?>
					<td><?php echo $weapon_figures[$wep_id][$bat_id][$default_type];?></td>
					<?php } ?>
					<td><?php echo $weapon_figures[$wep_id][$default_type]['grand_total']; ?></td>
					<!--td>Lorem Ipsum</td-->
				</tr>

				<?php }}?>
				<tr>
					<td>&nbsp;</td>
					<td>Total</td>
					<?php foreach($battalions as $bat_id=>$bat_name){ ?>
					<td><?php echo $weapon_figures[$bat_id][$default_type]['grand_total'];?></td>
					<?php } ?>
					<td><h1><?php echo $weapon_figures[$default_type]['grand_total']; ?></h1></td>
					<!--td>Lorem Ipsum</td-->
				</tr>
            </tbody>
			</table><br>
			
				</div>
			</div>
		</div>
	</div>
</div>
