<style>
    .simple_table{
            width:100%;
        }
        .simple_table>tbody>tr>td,.simple_table>thead>tr>th{border:1px solid black;}
        .simple_table>tbody>tr>td:nth-child(n+3):nth-child(-n+9){text-align:center;}
        .text2{
            font-size:20px;
            text-align:center;
            font-weight:bold;
            color:black;
        }
       
    @media print {
        #main_document{margin-top:-20px;}
       #figure_view_all{margin-bottom:0px;}
        #figure_view_all>div.panel-heading{padding:0px;}
        #all_tables>div>div>div.col-md-9{width:100%;padding:0px;}
        #all_tables>div.panel-heading{padding:0px;}
        #all_tables>div>table>tbody>tr:last-child{background-color:'white';}
        #all_tables>div>table>tbody>tr>td:last-child{border-right:1px solid black !important;}
        #all_tables>div>table>thead>tr:nth-child(2)>th:last-child{border-right:1px solid black !important;}
        #all_tables>div>table{margin-bottom:0px;}
        .headerbar{border-left:0px;}
        .header-left { padding:0px;}
        .pageheader{border-top:0px;border-bottom:0px;}
        .pageheader>h4{margin:0px;}
        .leftpanel{display:none;}
        .links_{display:none;}
        .filters_{display:none;}
        .mainpanel{margin-left:0px;}
        #filters{display:none;}
        .printarea>div{margin-left:0px;}
        #main-content{width:600px;}
	#main_document{width:800px;}
        #main_document>.headerbar>.header-left{float:none;}
        .leftpanel,.links_,.filters_{display:none;}
        .contentpanel{padding:0px;}
    }
    </style>
    <div class="panel panel-default col-md-12" id="all_tables">
		<div class="panel-heading">
			<div class="row filters_">
			<?php
				$attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
      );
	echo form_open_multipart("mt-figure-view?page=ALL_FIGURES", $attributes);
//var_dump($nameofitems);	
	?> <div class="col-md-2"> <?php
	
	echo form_dropdown('battalionIds[]', $battalions, set_value('battalionIds',(isset($_POST['battalionIds'])) ? $_POST['battalionIds'] : ''),'id="ito" data-placeholder="Select Battalions" title="Please select battalion(s)" multiple class="select2""'); 
	echo form_error('battalionIds');
	?></div> <div class="col-md-4"> <?php
	
	
	echo form_dropdown('namOfVehicle[]', $vehicles, set_value('namOfVehicle',(isset($_POST['namOfVehicle'])) ? $_POST['namOfVehicle'] : ''),'id="namOfVehicle" data-placeholder="Select Vehicle" title="Please select Vehicle(s)" class="select2" multiple'); 
	echo form_error('namOfItemType');
	?> </div>
			
				<div class="col-md-4">
						
					<input type="hidden" value="yes" name="download_excel">
					<input type="hidden" value="all_figures" name="pageType">
					<a href="<?php echo base_url().'mt-figure-view?page=ALL_FIGURES';?>"  class="btn btn-default">Reset</a>
                                        <button type="button" class="btn btn-primary" onClick="window.print();return false;">Print <i class="fa fa-print"></i></button>
					<input type="submit" name="search" class="btn btn-primary"/>
					<input type="submit" name="download" class="btn btn-primary" value="Download Excel"/>
                                        <br/>
				
					<input type="checkbox" name="skipZeroBattalions" id="skipZeroBattalions" <?php echo ($skipZeroBattalions)?'checked':'';?> onChange="enable_disable_show_hide_vehicles()"><label for="skipZeroBattalions">if battalion value is 0(zero) skip those battalions</label><BR>
					<input type="checkbox" name="skipZeroVehicle" id="skipZeroVehicle" <?php echo ($skipZeroVehicles)?'checked':'';?>><label for="skipZeroVehicle">if vehicle is 0(zero) those all vehicles not shown</label>
				<?php echo form_close(); ?>
				</div>
			</div>
			<div class="row">
				
				<?php 
				if(count($consolidatedMTData)==0){ ?>
                            <div class="col-md-9"><h3 class='text-center'>No Data Found</h3></div>
                                <?php }else{
				foreach($consolidatedMTData as $vehicleid=>$battalion){ ?>
				<div class="col-md-9">
					<table class="table table-striped table-hover col-md-6">
						<thead class="text-left">
							<tr>
								<th colspan="8" class="text-center">
									<h3><?php echo $vehicles[$vehicleid]; ?></h3>
								</th>
							</tr>
							<tr>
							  <th>S.no</th>
							  <th class="text-left">Battalion</th>
							  <th class="text-center">Total</th>
							  <th class="text-center">On Road</th>
							  <th class="text-center">Off Road</th>
							  <th class="text-center">On road case property in MT</th>
							  <th class="text-center">On Duty</th>
							  <th class="text-center">Available in MT-Section</th>
							  <!--th class="text-right">Emtpy On/Off Duty</th-->
							  <!--th>Total</th-->
						  </tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								if(count($battalion)>3){
									foreach($battalion as $bat_id=>$parameters){ 
										if(!in_array($bat_id,$figureNamesToBeSkipped)){
											$i++;
							?>
							<tr>
							  <td class="text-left"><?php echo $i; ?></td>
							  <td class="text-left"><?php echo $battalions[$bat_id]; ?></td>
							  <td class="text-center"><?php echo $parameters['holding_on_off_road']; ?> </td>
							  <td class="text-center"><?php echo $parameters['on_road']; ?> </td>
							  <td class="text-center"><?php echo $parameters['off_road']; ?> </td>
							  <td class="text-center"><?php echo $parameters['on_road_case_property_in_mt']; ?> </td>
							   <td class="text-center"><?php echo $parameters['on_duty']; ?> </td>
							    <td class="text-center"><?php echo $parameters['off_duty']; ?> </td>
								<?php if(false){ ?>
							   <td class="text-center"><?php echo $parameters['empty_on_off_duty']; ?> </td>
								<?php } ?>
							  <!--td><?php //echo $parameters['total']; ?> </td-->
							</tr>
								<?php	}
									}
								}else{
									echo '<td colspan="5" class="text-center">No Data Found</td>';
								}								?>
								<?php if(true){?>
							<tr>
								<td>&nbsp;</td>
							  <td class="text-left">Grand Total</td>
							  <td class="text-center"><?php echo $battalion['grand_total_on_off_road'];?></td>
							  <td class="text-center"><?php echo $battalion['grand_total_on_road'];?></td>
							  <td class="text-center"><?php echo $battalion['grand_total_off_road'];?></td>
							  <td class="text-center"><?php echo $battalion['grand_total_on_road_case_property_in_mt'];?></td>
							  <td class="text-center"><?php echo $battalion['grand_total_on_duty'];?></td>
							  <td class="text-center"><?php echo $battalion['grand_total_off_duty'];?></td>
							  <!--td><?php //echo $battalion['grand_total'];?></td-->
							</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>
				<?php	}
                                }?>
			
		</div>
	</div>

  </div><!-- mainpanel -->