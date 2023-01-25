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
        #all_tables>div.col-md-1{display:none;}
        #all_tables>div.col-md-10{width:100%;}
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
<div class="panel panel-default" id="figure_view_all">
        <div class="panel-heading">
          <div class="row filters_">
                         <?php 
 /*Form Validation set*/
 //$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
      );
	echo form_open_multipart("equipment-figures?page=ALL_FIGURES", $attributes);
//var_dump($nameofitems);	
	?> <div class="col-md-4"> <?php
	echo form_dropdown('battalionIds[]', $battalions, set_value('battalionIds',(isset($_POST['battalionIds'])) ? $_POST['battalionIds'] : ''),'id="ito" data-placeholder="Select Battalions" title="Please select battalion(s)" multiple class="select2""'); 
	echo form_error('battalionIds');
	?></div> <div class="col-md-4"> <?php
	echo form_dropdown('namOfItemType', $typeofitems, set_value('namOfItemType',(isset($_POST['namOfItemType'])) ? $_POST['namOfItemType'] : $typeOfItem),'id="nameOfItemType" data-placeholder="Select Category" title="Please select battalion(s)" class="select2"   onChange="getNameofItems()" '); 
	echo form_error('namOfItemType');
	?> </div><div class="col-md-4"> <?php
	echo form_dropdown('itemNames[]', $nameofitems, set_value('itemNames',(isset($_POST['itemNames'])) ? $_POST['itemNames'] : ''),'id="itemNames" data-placeholder="Select Items" title="Please select battalion(s)" multiple class="select2"'); 
	echo form_error('itemNames');
	?> </div> 
	
	<div class="col-md-4">
	</div>
	
	<div class="col-md-4">
		<br>
                
		<input type="hidden" value="yes" name="download_excel">
		<input type="hidden" value="all_figures" name="pageType">
		<a href="<?php echo base_url().'equipment-figures?page=ALL_FIGURES';?>"  class="btn btn-default">Reset</a>
		<input type="submit" name="search" class="btn btn-primary"/>
                <button type="button" class="btn btn-primary" onClick="window.print();return false;">Print <i class="fa fa-print"></i></button>
		<input type="submit" name="download" class="btn btn-primary" value="Download Excel"/>
	</div>
	<div class="col-md-3"><BR>
		<input type="checkbox" name="skipZeroBattalions" id="skipZeroBattalions" <?php echo ($skipZeroBattalions)?'checked':'';?>><label for="skipZeroBattalions">if value is 0(zero) those item not shown</label><BR>
		<input type="checkbox" name="skipZeroEquipments" id="skipZeroEquipments" <?php echo ($skipZeroEquipments)?'checked':'';?>><label for="skipZeroEquipments">if value is 0(zero) those all items not shown</label>
	<?php echo form_close(); ?>
	</div>
	</div>
	
	<!--		===================================================STARTS Here======================================================================-->	
		<div class="row" id="all_tables">
		<div class="col-md-12 text-center">
			<h3><?php echo (isset($_POST['namOfItemType'])) ? $_POST['namOfItemType'] : $typeOfItem;?> Figures</h3>
		</div>
		<div class="col-md-1"> 		
		</div>
		<div class="col-md-10">
			<?php
			$counter = 0;
			foreach($equipments as $eqid=>$battalions){
				$counter++;
				//var_dump($battalions);
				//break;;
				echo "<B>".$equipments['name'].'</b>';
                                echo '<h3 class="text-center">'.$battalions['equipments_name'].'</h3>';?>
				<table class="table" style="border:1px solid #eeeeee;">
				<thead>
					<!--tr>
						<th class="text-center" colspan="9"><?php //echo $eqid.' '.$battalions['equipments_name'].' Counter : '.$counter;
							echo '<h3>'.$battalions['equipments_name'].'</h3>';
						?></th> <?php //$eqid.' '. ?>
					</tr-->
					<tr>
						<th>S. No.</th>
						<th>Battalion</th>
						<th>Sanction</th>
						<th>Holding</th>
						<th>Issued</th>
						<th>Total in store</th>
						<th>Serviceable</th>
						<th>Un-serviceable</th>
						<th style="border-right:1px solid #eeeeee;">Available/Serviceable in store</th>
						<!--th>Auctioned(status D)</th-->
					</tr>
				</thead>
				<tbody>
				<?php
				//if(false){
					$sno = 1;
					$total_sanction_h = 0;
					$total_holding_h = 0;
					$total_issued_h = 0;
					$total_total_in_store_h = 0;
					$total_serviceable_h = 0;
					$total_unserviceable_h = 0;
					$total_serviceable_in_store_h = 0;
					$total_auction_h = 0;
					//var_dump($battalions);
				foreach($battalions as $bn_id=>$parameters){
					
					//var_dump($parameters);
					//echo '<br>Equipment<BR>';
					if($bn_id!='equipments_name'){
				?>
					<tr>
						<td><?php echo $sno; ?></td>
						<td><?php echo $parameters['bat_name']; ?></td>
						<?php if(true){?><td><?php echo $parameters['sanction']; ?></td><?php } ?>
						<td><?php echo $parameters['holding']; 
							//echo '<BR>A + B + C';?></td>
						<?php if($parameters['issued']>$parameters['holding']){
							$msg = '<span style="color:red"> ['.($parameters['issued']-$parameters['holding']).' more equipments are issued!!]</span>';
						$style = 'style="border-radius:10px;background-color:#f1b5b5;color:white;"';
						}else{ $style = '';
						
						$msg='';}?>
						<td <?php echo $style;?>><?php echo $parameters['issued'];
							echo $msg;
							?>
						</td>
						<td><?php echo $parameters['total_in_store'];//= $parameters['holding']-$parameters['issued'];?></td>
						<td><?php echo $parameters['serviceable'];// = ($parameters['issued'] + $parameters['total_in_store']) - ($parameters['newmskconofitemC'] + $parameters['serviceable2RecievedQuantityC']) - $parameters['serviceable3RecievedQuantityD'];?>
						<?php
							//echo '<br>Serviceable = (issued+ total_in_store)-(newmskconofitemC+serviceable2RecievedQuantityC)-serviceable3recievedQuantityD'.'<BR>';
							//echo '<BR>Issued : '.$parameters['issued'].'<br>';
							//echo 'Total in store : holding - issued'.$parameters['total_in_store'].'<br>';
							//echo 'newmsk conof item c : '.$parameters['newmskconofitemC'].'<br>';
							//echo 'serviceable2RecievedQuantityC : '.$parameters['serviceable2RecievedQuantityC'].'<br>';
							//echo 'serviceable3RecievedQuantityD : '.$parameters['serviceable3RecievedQuantityD'].'<br>';
							if(false&&$parameters['issued']>$parameters['equipmentCanBeIssued']){
								echo '<span style="color:red">'.($parameters['issued']-$parameters['equipmentCanBeIssued']).' Condemn weapons are issued!!</span>';
							}
						?>
						</td>
						<td><?php echo $parameters['unserviceable'];//	 = $parameters['newmskconofitemC'] +  $parameters['serviceable2RecievedQuantityC'] ;
							//echo 'unserviecable : newmskconofitemC+serviceable2RecievedQuantityC';
						?></td>
						<td style="border-right:1px solid #eeeeee;"><?php echo $parameters['serviceable_in_store'];// = $parameters['total_in_store'] - $parameters['unserviceable'];
						//echo 'serviceable in store : total_in_store-unserviceable';
						
						?></td>
						<!--td><?php //echo $parameters['auction'];?></td-->
						
						
					</tr>
				<?php 
					$total_sanction_h += $parameters['sanction'];
					$total_holding_h+= $parameters['holding'];
					$total_issued_h += $parameters['issued'];
					$total_total_in_store_h += $parameters['total_in_store'];
					$total_serviceable_h += $parameters['serviceable'];
					$total_unserviceable_h += $parameters['unserviceable'];
					$total_serviceable_in_store_h += $parameters['serviceable_in_store'];
					$total_auction_h += $parameters['auction'];
					$sno++;
					}
				}
				?>
					<tr border = 1 style="background-color:#eee;">
						<td></td><td>Total</td>
						<?php if(true){?><td><?php echo $total_sanction_h; ?></td><?php } ?><td><?php echo $total_holding_h;?></td><td><?php echo $total_issued_h;?></td><td><?php echo $total_total_in_store_h;?></td><td><?php echo $total_serviceable_h; ?></td><td><?php echo $total_unserviceable_h; ?></td><td style="border-right:1px solid #eeeeee;"><?php echo $total_serviceable_in_store_h; ?></td><!--td>Auction</td-->
					</tr>
				<?php
				?></tbody>
				</table>
                    <br/>
			<?php
			}
			if(false){
			?>
			<table class="table">
				<thead>
					<tr>
						<td class="text-center" colspan="6">Body protector set</td>
					</tr>
					<tr>
						<th>Battalion</th>
						<th>Holding</th>
						<th>Issued</th>
						<th>Total in store</th>
						<th>Serviceable</th>
						<th>Un-serviceable</th>
						<th>Serviceable in store</th>
					</tr>
				</thead>
				<tbody>
				<?php for($i=0;$i<5;$i++){ ?>
					<tr>
						<td>;skdj</td>
						<td>;skdj</td>
						<td>;skdj</td>
						<td>;skdj</td>
						<td>;skdj</td>
						<td>;skdj</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<?php } ?>
		</div>
		
		</div>
		</div><!-- panel -->
      </div><!-- col-sm-12 -->
    