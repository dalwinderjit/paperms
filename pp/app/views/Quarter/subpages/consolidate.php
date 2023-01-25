<?php
/*  var_dump($data);
die; */
 
?>
 <div class="panel panel-default" id="figure_view_consolid">
        <div class="panel-heading">
			<div class="row">
			<?php /*Create HTML form*/
				$attributes = array(
				  'name'        => 'basicForm4',
				  'id'        => 'basicForm4',
				  'accept-charset'  => 'utf-8',
				  'autocomplete'    =>'off', 
				  'method' => 'post',
				 
				  );
				echo form_open_multipart("equipment-figures?page=CONSOLIDATE", $attributes);
				
				$types = array(/*'sanction'=>'Sanction',*/'holding'=>'Holding','issued'=>'Issued','total_in_store'=>'Total in Store','serviceable'=>'Serviceable','unserviceable'=>'Un-serviceable','serviceable_in_store'=>'Serviceable in Store');
			?>
				<div class="col-md-12">
					<h4>"<?php echo $types[(isset($_POST['dataType'])) ? $_POST['dataType'] : 'holding'];?>" Equipment in Stores of PAP's,IRB's and CDO's including Training Centre's</h4>
				</div>
				<div class="col-md-3">
					<?php
						echo form_dropdown('category', $categories, set_value('category',(isset($_POST['category'])) ? $_POST['category'] : $selectedCategory),'id="nameOfItemType" data-placeholder="Select category" title="Please select battalion(s)" class="select2" onChange="getNameofItems()"'); 
						echo form_error('category');
					?>
				</div>
				<div class="col-md-4">
					<?php
					
						echo form_dropdown('items[]', $nameofitems, set_value('items',(isset($_POST['items'])) ? $_POST['items'] : ''),'id="itemNames" data-placeholder="Select Item" title="Please select battalion(s)" class="select2" multiple'); 
						echo form_error('battalionIds');
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
					<input type="submit" name="download" class="btn" value="Download"/>
				</div>
				<div class="col-md-9">
				</div>
				<div class="col-md-3">
					<input type="checkbox" name="skipZero" <?php if(null!=$this->input->post('skipZero')){echo "checked";}else{}?>/>Skip total zero value records
				</div>
				<?php echo form_close(); ?>
			</div>
          <div class="row">
			<table class="table">
			<thead>
				
				<tr>
				<th>S. No.</th>
				<th>Name of Equipment</th>
				<?php
					//var_dump($data['units']);
					foreach($data['units'] as $k=>$v){
						echo '<th>'.$v.'</th>';
					}
				?>
				<th>Total</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$holdings = $data['holdings'];
			$count = 1;
			foreach($data['itemNamesArray'] as $k1=>$v1){
				echo '<tr>';
				echo '<td>'.$count.'</td>';
				echo '<td>'.$v1.'</td>';
				$total = 0;
				foreach($data['units'] as $k=>$v){
					
					echo '<td>'.$holdings[$k][$v1][$data['type']].'</td>';
					$total += $holdings[$k][$v1][$data['type']];
				}
				//die;
				echo '<td>'.$total.'</td>';
				echo '</tr>';
				$count++;
			}
			 ?>
			</tbody>
			</table>
		  </div>
		</div>
	</div>