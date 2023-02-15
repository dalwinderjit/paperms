<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class MTVehicles extends CI_Controller
	{
		
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
			$this->load->model('MTVehicle_model'); 
			define('VARIABLE_QUANTITY',6);	
                        define('VARIABLE_QUANTITY2',7);	
		}
		public function initializeMTDataAllFigure($vehicles, $battalions, $types){
			$consolidatedMTData = array();
			foreach($vehicles as $vehicle_id=>$vehicle_name){
				$consolidatedMTData[$vehicle_id]['grand_total_holding'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_on_road'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_off_road'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_on_off_road']=0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_on_road_case_property_in_mt']=0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_on_duty'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_off_duty'] = 0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_empty_on_off_road']=0;
				$consolidatedMTData[$vehicle_id]['grand_total_holding_on_off_road']=0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_empty_on_off_duty']=0;
				$consolidatedMTData[$vehicle_id]['grand_total'] = 0;
				
				foreach($battalions as $bat_id=>$bat_name){
					foreach($types as $type_id=>$type_name){
						$consolidatedMTData[$vehicle_id][$bat_id][$type_id] = 0;
					}
					$consolidatedMTData[$vehicle_id][$bat_id]['holding_on_off_road'] =0;
				}
			}
			return $consolidatedMTData;
		}
		/**
		*	This function is used to fetch data (on road, off road, empty_on_off_road, holding, total
		*/
		public function processCalculationsAllFigure($consolidatedMTData, $battalions, $vehicles, $types){
			
			$allVehicles = $this->MTVehicle_model->getAllVehicles($battalions, $vehicles);
			//var_dump($allVehicles);
			foreach($allVehicles as $key=>$vehicle){
				
				if($vehicle->statusofvechile=='On Road'){
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road'])){
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_road']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_off_road']++;
					}
					$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['holding_on_off_road']++;
					$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding_on_off_road']++;
					
				}elseif($vehicle->statusofvechile=='Off Road'){
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_road'])){
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_road']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_off_road']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_off_road']++;
					}
					$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['holding_on_off_road']++;
					$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding_on_off_road']++;
				}elseif($vehicle->statusofvechile=='On road case property in MT'){
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road_case_property_in_mt'])){
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road_case_property_in_mt']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_road_case_property_in_mt']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_off_road']++;
					}
					$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['holding_on_off_road']++;
					$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding_on_off_road']++;
				
				}else{
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_road'])){
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_road']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_empty_on_off_road']++;
					}
				}
				if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['holding'])){
					$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['holding']++;
					$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding'] ++;
				}
				
				if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['total'])){
					$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['total']++;
				}
				$consolidatedMTData[$vehicle->catofvechicle]['grand_total']++;
			}
			return $consolidatedMTData;
		}
		public function figure_view(){
			
			
			
			$data['battalions'] = $this->sortBattalions($this->getBattalions());
			$data['vehicles'] = $this->getVehicles();
			$data['types'] = $this->getDataTypes();
			
			$data['figureNamesToBeSkipped'] = array('grand_total_holding','grand_total_on_road','grand_total_off_road','grand_total','grand_total_empty_on_off_road','grand_total_on_duty','grand_total_off_duty','grand_total_empty_on_off_duty','grand_total_on_off_road','grand_total_holding_on_off_road','grand_total_on_road_case_property_in_mt');
			$pageType = $this->input->get('page');
			
			
			if($this->session->userdata('user_log')==6){
				$consolidatedMTData = array();
				if(null!=$this->input->post('battalionIds')){
					$temp_battalions = $this->input->post('battalionIds');
					foreach($temp_battalions as $k=>$v){
						$battalions__[$v] = $v;
					}
					$selected_battalions = $this->sortBattalions($battalions__);
				}else{
					//$this->getBattalions();
					$selected_battalions = $data['battalions'];
				}
				//var_dump($selected_battalions);
				
				if(null!=$this->input->post('namOfVehicle')){
					$temp_vehicles= $this->input->post('namOfVehicle');
					foreach($temp_vehicles as $k=>$v){
						$_vehicles[$v] = $v;
					}
					$selected_vehicles = $_vehicles;
				}else{
					$selected_vehicles = $data['vehicles'];

				}
				//echo '<HR>';
				//var_dump($selected_vehicles);	
				$consolidatedMTData = $this->initializeMTDataAllFigure($selected_vehicles,$selected_battalions, $data['types'] );
				//echo '<HR>';
				//var_dump($consolidatedMTData);
				 $battalions_grand_totals = $this->initializeGrandTotals($selected_vehicles, $selected_battalions, $data['types']);
				//echo '<HR>';
//var_dump($battalions_grand_totals);
				//echo '<HR>';
				
				
				$consolidatedMTData = $this->processCalculationsAllFigure($consolidatedMTData, array_keys($selected_battalions), $selected_vehicles, $data['types']);
				//var_dump($consolidatedMTData);
				//echo '<hr>';
				//die;
				//-----------------------------------------------------------------------
				$battalions = $selected_battalions;
				//var_dump($battalions);
				$vehicles = $selected_vehicles;
				//var_dump($vehicles);
				$allVehicles = $this->MTVehicle_model->getAllVehiclesOnOffDuty(array_keys($battalions), $vehicles);
				$selectedVehicles2 = array();
				foreach($allVehicles as $k=>$vehicle){
					
					if(in_array($vehicle->reg_no,array_keys($selectedVehicles2))){
						if(empty($vehicle->date_of_duty)){
							break;
						}
						$currentVechicleDateStr = $vehicle->date_of_duty;
						$currentdtime = DateTime::createFromFormat("d/m/Y", $currentVechicleDateStr);
						if($currentdtime){
							$currenttimestamp = $currentdtime->getTimestamp();
						}else{
							$currenttimestamp =0;
						}
						$oldVechicleDateStr = $selectedVehicles2[$vehicle->reg_no]->date_of_duty;
						$olddtime = DateTime::createFromFormat("d/m/Y", $oldVechicleDateStr);
						if($olddtime){
							$oldtimestamp = $olddtime->getTimestamp();
						}else{
							$oldtimestamp = 0;
						}
						if($currenttimestamp>$oldtimestamp){
							$selectedVehicles2[$vehicle->reg_no] = $vehicle;
						}
					}else{
						$selectedVehicles2[$vehicle->reg_no] = $vehicle;
					}
				}
				foreach($selectedVehicles2 as $key=>$vehicle){
					//var_dump($vehicle);
					//die;	
					
					//echo $vehicle->place_of_duty;
					if(in_array(trim($vehicle->place_of_duty),array('MT Section'))){
						$selectedType='off_duty';
						
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_duty'])){
							
						$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_off_duty']++;
						}
					}elseif(in_array(trim($vehicle->place_of_duty),array('Ceremonial duty','Election duty','General duty','Law & duty','MT Training','MT Traning (Permanent Alloted for Training Purpose...','Office duty','Officer','Other state','Sports duty','VIP Duty'))){
						$selectedType='on_duty';
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty'])){
							
							$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
						}
					}else{
						
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_duty'])){
								//$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_empty_on_off_duty']++;
						}
					}
				}
				//-----------------------------------------------------------------------
				if(null!=$this->input->post('skipZeroVehicles')){
					$consolidatedMTData = $this->skipZeroBattalions($consolidatedMTData,$data['figureNamesToBeSkipped']);
				}
				if(null!=$this->input->post('download')){
					$this->createdAllFigureExcelForBattalion($consolidatedMTData,$selected_vehicles,$selected_battalions,$data['figureNamesToBeSkipped']);
				}
				
				$data['consolidatedMTData'] = $consolidatedMTData;
				$this->load->view('MTVehicles/battalion_figure_view.php',$data);
			}else
			if($pageType =='ALL_FIGURES' || !in_array($pageType,array('CONSOLIDATE','STORE_EQUIPMENTS')) || (null==$pageType)){
				
				$data['subpage'] = 'all_figures.php';
				$consolidatedMTData = array();
				if(null!=$this->input->post('battalionIds')){
					$temp_battalions = $this->input->post('battalionIds');
					foreach($temp_battalions as $k=>$v){
						$battalions__[$v] = $v;
					}
					$selected_battalions = $this->sortBattalions($battalions__);
				}else{
					//$this->getBattalions();
					$selected_battalions = $data['battalions'];
				}
				//var_dump($selected_battalions);
				
				if(null!=$this->input->post('namOfVehicle')){
					$temp_vehicles= $this->input->post('namOfVehicle');
					foreach($temp_vehicles as $k=>$v){
						$_vehicles[$v] = $v;
					}
					$selected_vehicles = $_vehicles;
				}else{
					$selected_vehicles = $data['vehicles'];

				}
				//echo '<HR>';
				//var_dump($selected_vehicles);	
				$consolidatedMTData = $this->initializeMTDataAllFigure($selected_vehicles,$selected_battalions, $data['types'] );
				//echo '<HR>';
				//var_dump($consolidatedMTData);
				 $battalions_grand_totals = $this->initializeGrandTotals($selected_vehicles, $selected_battalions, $data['types']);
				//echo '<HR>';
//var_dump($battalions_grand_totals);
				//echo '<HR>';
				
				
				$consolidatedMTData = $this->processCalculationsAllFigure($consolidatedMTData, array_keys($selected_battalions), $selected_vehicles, $data['types']);
				//var_dump($consolidatedMTData);
				//echo '<hr>';
				//die;
				//-----------------------------------------------------------------------
				$battalions = $selected_battalions;
				//var_dump($battalions);
				$vehicles = $selected_vehicles;
				//var_dump($vehicles);
				$allVehicles = $this->MTVehicle_model->getAllVehiclesOnOffDuty(array_keys($battalions), $vehicles);
				$selectedVehicles2 = array();
				foreach($allVehicles as $k=>$vehicle){
					
					if(in_array($vehicle->reg_no,array_keys($selectedVehicles2))){
						if(empty($vehicle->date_of_duty)){
							break;
						}
						$currentVechicleDateStr = $vehicle->date_of_duty;
						$currentdtime = DateTime::createFromFormat("d/m/Y", $currentVechicleDateStr);
						if($currentdtime){
							$currenttimestamp = $currentdtime->getTimestamp();
						}else{
							$currenttimestamp =0;
						}
						$oldVechicleDateStr = $selectedVehicles2[$vehicle->reg_no]->date_of_duty;
						$olddtime = DateTime::createFromFormat("d/m/Y", $oldVechicleDateStr);
						if($olddtime){
							$oldtimestamp = $olddtime->getTimestamp();
						}else{
							$oldtimestamp = 0;
						}
						if($currenttimestamp>$oldtimestamp){
							$selectedVehicles2[$vehicle->reg_no] = $vehicle;
						}
					}else{
						$selectedVehicles2[$vehicle->reg_no] = $vehicle;
					}
				}
				foreach($selectedVehicles2 as $key=>$vehicle){
					//var_dump($vehicle);
					//die;	
					
					//echo $vehicle->place_of_duty;
					if(in_array(trim($vehicle->place_of_duty),array('MT Section'))){
						$selectedType='off_duty';
						
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_duty'])){
							
						$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_off_duty']++;
						}
					}elseif(in_array(trim($vehicle->place_of_duty),array('Ceremonial duty','Election duty','General duty','Law & duty','MT Training','MT Traning (Permanent Alloted for Training Purpose...','Office duty','Officer','Other state','Sports duty','VIP Duty'))){
						$selectedType='on_duty';
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty'])){
							
							$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
						}
					}else{
						
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_duty'])){
								//$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_empty_on_off_duty']++;
						}
					}
				}
				//-----------------------------------------------------------------------
                                $skipZeroBattalions = true;
                                $skipZeroVehicles = true;
                                if(null!=$this->input->post('search') || null!=$this->input->post('download')){
                                    if(null!=$this->input->post('skipZeroBattalions')){
                                        $skipZeroBattalions = true;
                                    }else{
                                        $skipZeroBattalions = false;
                                    }
                                    if(null!=$this->input->post('skipZeroVehicle')){
                                        $skipZeroVehicles = true;
                                    }else{
                                        $skipZeroVehicles = false;
                                    }
                                }
				if($skipZeroBattalions){
					$consolidatedMTData = $this->skipZeroBattalions($consolidatedMTData,$data['figureNamesToBeSkipped']);
				}
                                if($skipZeroVehicles){
                                    $consolidatedMTData = $this->skipZeroVehicles_($consolidatedMTData);
                                }
				if(null!=$this->input->post('download')){
					$this->createdAllFigureExcel($consolidatedMTData,$selected_vehicles,$selected_battalions,$data['figureNamesToBeSkipped']);
				}
				$data['skipZeroBattalions'] = $skipZeroBattalions;
				$data['skipZeroVehicles'] = $skipZeroVehicles;
				$data['consolidatedMTData'] = $consolidatedMTData;
			}
			elseif($pageType =='CONSOLIDATE'){
				$data['subpage'] = 'consolidate.php';
				//get vehicles
				if(null!=$this->input->post('vehicles')){	//select vehicles
					$vehicles = $this->input->post('vehicles');		//ok
					
				}else{		//if empty select all the vehicles
					$vehicles = $data['vehicles'];
				}
				//var_dump($vehicles);
				$data['selected_vehicles'] = array();
				foreach($vehicles as $k=>$v){
					$data['selectedVehicles'][$v]=$v;
				}
				//var_dump($data['selectedVehicles']);
				
				$units = $this->getUnits();
				$data['units'] = $units;
				//get types
				if(null!=$this->input->post('dataType')){
					$type = $this->input->post('dataType');
				}else{
					$type = 'holding_on_off_road';
				}
				$data['type'] = $type;
				$data['type_name'] = $data['types'][$type];

				//initialize
				
				$raw_data = $this->initializeConsolidateDataUnitWise($data['selectedVehicles'],$units,$type);
				
				$consolidatedMTData = $raw_data['consolidateMTDate'];
				
				$data['grandTotalData']=$grandTotalData = $raw_data['grandTotalData'];
				$raw_data2 = $this->processConsolidateDataUnitWise($consolidatedMTData,$data['selectedVehicles'],$units,$type,$grandTotalData);
				$consolidatedMTData = $raw_data2['consolidatedMTData'];
				$grandTotalData = $raw_data2['grandTotalData'];
				
				if(null!=$this->input->post('skipZeroVehicles')){
					$consolidatedMTData = $this->skipZeroVehicleConsolidatedData($consolidatedMTData,$units,$data['figureNamesToBeSkipped'],$type);
				}
				if(null!=$this->input->post('downloadConsolidateFiguresOfVehicle')){
					$this->downloadConsolidateUnitWiseData($consolidatedMTData,$data['types'],$type, $vehicles,$units,$grandTotalData);
				}
				$data['consolidatedMTData'] = $consolidatedMTData;
				$data['grandTotalData'] = $grandTotalData;
			}
			elseif($pageType=='STORE_EQUIPMENTS'){
				
				$data['subpage'] = 'store_equipments.php';
				$data['units'] = $this->getUnits();
				$data['selectedUnit'] = (null!=$this->input->post('unit'))?$this->input->post('unit'):'pap';
				
				$data['selected_battalions'] = $selected_battalions = $this->getBattalionsOfUnit($data['selectedUnit']);
				
				$data['selectedVehicle'] = (null!=$this->input->post('vehicles'))?$this->input->post('vehicles'):array();
				
				if(empty($data['selectedVehicle'])){
					$selected_vehicles = $data['vehicles'];
				}else{
					foreach($data['selectedVehicle'] as $k=>$val){
						$selected_vehicles[$val]=$val;
					}
				}
				
				$data['selected_vehiclesToshow'] = $selected_vehicles;
				
				//echo $this->input->post('equipmentDataType');
				if(null!=$this->input->post('equipmentDataType')){
					
					if(in_array($this->input->post('equipmentDataType'),array('off_duty','on_duty','empty_on_off_duty'))){
						//get the data from database
						$selectedType = array($this->input->post('equipmentDataType')=>$data['types'][$this->input->post('equipmentDataType')]);
						$data['selectedTypeInMessage'] = $data['types'][$this->input->post('equipmentDataType')];
						$data['dataType'] = $this->input->post('equipmentDataType');
					}else{
						$selectedType = array($this->input->post('equipmentDataType')=>$data['types'][$this->input->post('equipmentDataType')]);
						$data['selectedTypeInMessage'] = $data['types'][$this->input->post('equipmentDataType')];
						$data['dataType'] = $this->input->post('equipmentDataType');
						$data['typetobeselected'] = $this->input->post('equipmentDataType');
					}
					
				}else{
					$selectedType = array('holding_on_off_road'=>$data['types']['holding_on_off_road']);
					
					$data['selectedTypeInMessage'] = $data['types']['holding_on_off_road'];
					$data['typetobeselected'] = 'holding_on_off_road';
					$data['dataType'] = 'holding_on_off_road';
				}
				$data['selectedType'] = $selectedType;
				//echo $data['dataType'];	
				//var_dump($selectedType);
				if(in_array($this->input->post('equipmentDataType'),array('off_duty','on_duty','empty_on_off_duty'))){
					
					$raw_data = $this->initializeMTData($selected_vehicles, $selected_battalions, $selectedType, $data['dataType']);
					$consolidatedMTData = $raw_data['consolidatedMTData'];
					$battalions_grand_totals = $raw_data['battalions_grand_totals'];
					
					$raw_data2 = $this->processCalculationsAllFigureOnOffDuty($consolidatedMTData, array_keys($selected_battalions), $selected_vehicles, $selectedType,$battalions_grand_totals,$data['dataType']);
					$consolidatedMTData = $raw_data2['consolidatedMTData'];
					$battalions_grand_totals = $raw_data2['battalions_grand_totals'];
					/* var_dump($consolidatedMTData);
					echo '</td></tr></table>'; */
				}else{
					$raw_data = $this->initializeMTData($selected_vehicles,$selected_battalions, $selectedType, $data['dataType']);
					$consolidatedMTData = $raw_data['consolidatedMTData'];
					$battalions_grand_totals = $raw_data['battalions_grand_totals'];
					
					$raw_data2 = $this->processCalculationsAllFigure2($consolidatedMTData, array_keys($selected_battalions), $selected_vehicles, $selectedType,$battalions_grand_totals, $data['dataType']);
					$consolidatedMTData = $raw_data2['consolidatedMTData'];
					$battalions_grand_totals = $raw_data2['battalions_grand_totals'];
				}
				if(null!=$this->input->post('skipZeroVechicles')){
					$consolidatedMTData = $this->skipZeroVehicles($consolidatedMTData,$data['figureNamesToBeSkipped'],$data['dataType']);
				}
				if(null!=$this->input->post('download')){
					$this->createExcelFileStoreVehicle($consolidatedMTData,$data['dataType'],$selectedType,$data['selectedUnit'],$data['units'],$selected_battalions,$battalions_grand_totals);
				}
				
				$data['consolidatedMTData'] = $consolidatedMTData;
				$data['battalions_grand_totals'] = $battalions_grand_totals;
			}else{
				die('Invalid selection!');
			}
			
			if($this->session->userdata('user_log')==6){
				//$this->load->view('MTVehicles/battalion_figure_view.php',$data);
			}else{
				$this->load->view('MTVehicles/figure_view.php',$data);
			}
		}
		public function skipZeroVehicleConsolidatedData($data,$units,$figureNamesToBeSkipped,$type){
			
			$processedData = array();
			foreach($data as $vehicleid=>$battalion){
				$keep = false;;
				foreach($battalion as $bat_id=>$parameters){
					if(!in_array($bat_id,$figureNamesToBeSkipped)){
						if(($parameters[$type]>0))
						{
							$keep = true;
							break;
						}
					}
				}
				if($keep==true){
					$processedData[$vehicleid] = $battalion;
					$processedData[$vehicleid]['grand_total_holding']= $data[$vehicleid]['grand_total_holding'];
					$processedData[$vehicleid]['grand_total_on_road']= $data[$vehicleid]['grand_total_on_road'];
					$processedData[$vehicleid]['grand_total_off_road']= $data[$vehicleid]['grand_total_off_road'];
					$processedData[$vehicleid]['grand_total_on_duty']= $data[$vehicleid]['grand_total_on_duty'];
					$processedData[$vehicleid]['grand_total_off_duty']= $data[$vehicleid]['grand_total_off_duty'];
				}
			}
			return $processedData;
			
		}
		public function skipZeroVehicles($data,$figureNamesToBeSkipped,$type){
			$processedData = array();
			foreach($data as $vehicleid=>$battalion){
				$keep = false;;
				foreach($battalion as $bat_id=>$parameters){
					if(!in_array($bat_id,$figureNamesToBeSkipped)){
						if(($parameters[$type]>0))
						{
							$keep = true;
							break;
						}
					}
				}
				if($keep==true){
					$processedData[$vehicleid] = $battalion;
					$processedData[$vehicleid]['grand_total_holding']= $data[$vehicleid]['grand_total_holding'];
					$processedData[$vehicleid]['grand_total_on_road']= $data[$vehicleid]['grand_total_on_road'];
					$processedData[$vehicleid]['grand_total_off_road']= $data[$vehicleid]['grand_total_off_road'];
					$processedData[$vehicleid]['grand_total_on_duty']= $data[$vehicleid]['grand_total_on_duty'];
					$processedData[$vehicleid]['grand_total_off_duty']= $data[$vehicleid]['grand_total_off_duty'];
				}
			}
			return $processedData;
		}
		/**
		*	initializing consolidated Data unit wise
		*/
		public function initializeConsolidateDataUnitWise($selected_vehicles,$units,$type){
			$consolidate = array();
			//$data['grand_total'] = 0;
			foreach($units as $k=>$unit_name){
				$grandTotalData['grandTotal'][$k]=0;
			}
			$grandTotalData['totalGrand'] = 0;
			foreach($selected_vehicles as $key=>$vehicle_name){
				foreach($units as $k=>$unit_name){
					$data[$vehicle_name][$k][$type] = 0;
					if($type=='off_duty'){
						$data[$vehicle_name][$k]['on_duty'] = 0;
					}
				}
				//$data[$vehicle_name]['other']=0;
				$data[$vehicle_name]['total']=0	;
				$data[$vehicle_name]['grand_total_holding']=0	;
				$data[$vehicle_name]['grand_total_'.$type]=0;
				$data[$vehicle_name]['grand_total_holding'] = 0;
				$data[$vehicle_name]['grand_total_on_road'] = 0;
				$data[$vehicle_name]['grand_total_off_road'] = 0;
				$data[$vehicle_name]['grand_total_on_off_road']=0;
				
				$data[$vehicle_name]['grand_total_on_duty'] = 0;
				$data[$vehicle_name]['grand_total_off_duty'] = 0;
				
				$data[$vehicle_name]['grand_total_empty_on_off_road']=0;
				$data[$vehicle_name]['grand_total_holding_on_off_road']=0;
				
				$data[$vehicle_name]['grand_total_empty_on_off_duty']=0;
				$data[$vehicle_name]['grand_total'] = 0;
				
			}
			return array('consolidateMTDate'=>$data,'grandTotalData'=>$grandTotalData);
		}
		public function processConsolidateDataUnitWise($consolidatedMTData,$vehicles,$units,$type,$grandTotalData){
			
			
			$battalions = $this->getBattalions();
		
			if(in_array($type, array('on_road','off_road','holding_on_off_road','empty_on_off_road','on_road_case_property_in_mt'))){
				$allVehicles = $this->MTVehicle_model->getAllVehicles(array_keys($battalions), $vehicles);
				foreach($allVehicles as $key=>$vehicle){
					
					$bat_id = $vehicle->bat_id;
					//var_dump($vehicle);
					//die;
					if($type=='on_road' && $vehicle->statusofvechile=='On Road'){
						$unit = $this->getUnitByBattalionId($bat_id);
						$consolidatedMTData[$vehicle->catofvechicle][$unit][$type]++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_'.$type]++;
						$grandTotalData['grandTotal'][$unit]++;
						$grandTotalData['totalGrand']++;
					}elseif($type=='off_road' && $vehicle->statusofvechile=='Off Road'){
						$unit = $this->getUnitByBattalionId($bat_id);
						$consolidatedMTData[$vehicle->catofvechicle][$unit][$type]++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_'.$type]++;
						$grandTotalData['grandTotal'][$unit]++;
						$grandTotalData['totalGrand']++;
					}elseif(($type=='on_road_case_property_in_mt') && ($vehicle->statusofvechile=='On road case property in MT')){
						$unit = $this->getUnitByBattalionId($bat_id);
						$consolidatedMTData[$vehicle->catofvechicle][$unit][$type]++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_'.$type]++;
						$grandTotalData['grandTotal'][$unit]++;
						$grandTotalData['totalGrand']++;
					}elseif($type=='holding_on_off_road' && in_array($vehicle->statusofvechile,array('On Road','Off Road'))){
						$unit = $this->getUnitByBattalionId($bat_id);
						$consolidatedMTData[$vehicle->catofvechicle][$unit][$type]++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_'.$type]++;
						$grandTotalData['grandTotal'][$unit]++;
						$grandTotalData['totalGrand']++;
					}elseif(($type=='empty_on_off_road') && !in_array($vehicle->statusofvechile,array('On Road','Off Road'))){
						$unit = $this->getUnitByBattalionId($bat_id);
						$consolidatedMTData[$vehicle->catofvechicle][$unit][$type]++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_'.$type]++;
						$grandTotalData['grandTotal'][$unit]++;
						$grandTotalData['totalGrand']++;
					}
				}
			
			}
			elseif(in_array($type,array('on_duty','off_duty','empty_on_off_duty'))){
				
				$allVehicles = $this->MTVehicle_model->getAllVehiclesOnOffDuty(array_keys($battalions), $vehicles);
				//echo '<hr>';
				//var_dump($allVehicles);
				//if(false){
				$selectedVehicles = array();
				foreach($allVehicles as $k=>$vehicle){
					if(in_array($vehicle->reg_no,array_keys($selectedVehicles))){
						if(empty($vehicle->date_of_duty)){
							break;
						}
						$currentVechicleDateStr = $vehicle->date_of_duty;
						$currentdtime = DateTime::createFromFormat("d/m/Y", $currentVechicleDateStr);
						if($currentdtime){
							$currenttimestamp = $currentdtime->getTimestamp();
						}else{
							$currenttimestamp =0;
						}
						$oldVechicleDateStr = $selectedVehicles[$vehicle->reg_no]->date_of_duty;
						$olddtime = DateTime::createFromFormat("d/m/Y", $oldVechicleDateStr);
						if($olddtime){
							$oldtimestamp = $olddtime->getTimestamp();
						}else{
							$oldtimestamp = 0;
						}
						if($currenttimestamp>$oldtimestamp){
							$selectedVehicles[$vehicle->reg_no] = $vehicle;
						}
					}else{
						$selectedVehicles[$vehicle->reg_no] = $vehicle;
					}
				}
				//echo '<pre>';
				//var_dump($selectedVehicles);
				
				foreach($selectedVehicles as $key=>$vehicle){
					//var_dump($vehicle);
					$unit = $this->getUnitByBattalionId($vehicle->bat_id);
					
					if(in_array($vehicle->place_of_duty,array('MT Section'))){
						
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$unit]['off_duty'])){
							$consolidatedMTData[$vehicle->catofvechicle][$unit]['off_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_off_duty']++;
							$grandTotalData['grandTotal'][$unit]++;
							$grandTotalData['totalGrand']++;
						}
					}elseif(in_array(trim($vehicle->place_of_duty),array('Ceremonial duty','Election duty','General duty','Law & duty','MT Training','MT Traning (Permanent Alloted for Training Purpose...','Office duty','Officer','Other state','Sports duty','VIP Duty'))){
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$unit]['on_duty'])){
							$consolidatedMTData[$vehicle->catofvechicle][$unit]['on_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
							$grandTotalData['grandTotal'][$unit]++;
							$grandTotalData['totalGrand']++;
						}
					}else{
						$consolidatedMTData[$vehicle->catofvechicle][$unit]['on_duty']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
						$grandTotalData['grandTotal'][$unit]++;
						$grandTotalData['totalGrand']++;
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$unit]['empty_on_off_duty'])){
							$consolidatedMTData[$vehicle->catofvechicle][$unit]['empty_on_off_duty']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_empty_on_off_duty']++;
							$grandTotalData['grandTotal'][$unit]++;
							$grandTotalData['totalGrand']++;
						}
					}
					
				}
			}//}
			return array('consolidatedMTData'=>$consolidatedMTData, 'grandTotalData'=>$grandTotalData);
		}
		public function skipZeroBattalions($data,$figureNamesToBeSkipped){
			
			$processedData = array();
			foreach($data as $vehicleid=>$battalion){
				foreach($battalion as $bat_id=>$parameters){ 
					if(!in_array($bat_id,$figureNamesToBeSkipped)){
						if(!(($parameters['on_road']==0) && ($parameters['off_road']==0) && ($parameters['holding_on_off_road']==0) &&($parameters['on_duty']==0) && ($parameters['off_duty']==0) && ($parameters['on_road_case_property_in_mt']==0)))
						{	
							$processedData[$vehicleid][$bat_id]=$parameters;
						}else{
							
						}
					}
				}
				
				$processedData[$vehicleid]['grand_total_on_off_road']= $data[$vehicleid]['grand_total_on_off_road'];
				$processedData[$vehicleid]['grand_total_holding']= $data[$vehicleid]['grand_total_holding'];
				$processedData[$vehicleid]['grand_total_on_road']= $data[$vehicleid]['grand_total_on_road'];
				$processedData[$vehicleid]['grand_total_off_road']= $data[$vehicleid]['grand_total_off_road'];
				$processedData[$vehicleid]['grand_total_on_road_case_property_in_mt']= $data[$vehicleid]['grand_total_on_road_case_property_in_mt'];
				$processedData[$vehicleid]['grand_total_on_duty']= $data[$vehicleid]['grand_total_on_duty'];
				$processedData[$vehicleid]['grand_total_off_duty']= $data[$vehicleid]['grand_total_off_duty'];
			}
			//var_dump($processedData);
			if(null!=$this->input->post('skipZeroVehicle')){
				foreach($processedData as $vehicleid=>$battalion){
					if((count($battalion)-VARIABLE_QUANTITY2)==0){
						unset($processedData[$vehicleid]);
					}
				}
			}
			return $processedData;
		}
                public function skipZeroVehicles_($processedData){
                    foreach($processedData as $vehicleid=>$battalion){
                            
                            if(count($battalion)-7==0){
                                    unset($processedData[$vehicleid]);
                            }
                    }
                    return $processedData;
                }
		/**
		*	This function is used to fetch data (on road, off road, empty_on_off_road, holding, total
		*/
		public function processCalculationsAllFigure2($consolidatedMTData, $battalions, $vehicles, $types,$battalions_grand_totals,$selectedType){
			
			$allVehicles = $this->MTVehicle_model->getAllVehicles($battalions, $vehicles);
			//var_dump($allVehicles);
			foreach($allVehicles as $key=>$vehicle){
				if($selectedType=='on_road'){
					if($vehicle->statusofvechile=='On Road'){
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road'])){
							$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_road']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_off_road']++;
						}
					}
				}elseif($selectedType=="off_road"){
					if($vehicle->statusofvechile=='Off Road'){
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_road'])){
							$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_road']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_off_road']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_off_road']++;
						}
					}
				}elseif($selectedType=="on_road_case_property_in_mt"){
					if($vehicle->statusofvechile=='On road case property in MT'){
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road_case_property_in_mt'])){
							$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_road_case_property_in_mt']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_road_case_property_in_mt']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_off_road']++;
						}
					}
				}elseif($selectedType=='holding_on_off_road'){
					
					if(in_array($vehicle->statusofvechile,array('On Road','Off Road'))){
						
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['holding_on_off_road'])){
							$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['holding_on_off_road']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_holding_on_off_road']++;
						}
					}
				}elseif($selectedType=='empty_on_off_road'){
					
					if(!in_array($vehicle->statusofvechile,array('On Road','Off Road'))){
						echo 'hi';
						if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_road'])){
							$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
							$battalions_grand_totals['grand_total']++;
							$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_road']++;
							$consolidatedMTData[$vehicle->catofvechicle]['grand_total_empty_on_off_road']++;
						}
					}
				}else{
					die('Invalid Type Selected!!');
				}
			}
			return array('consolidatedMTData'=>$consolidatedMTData,'battalions_grand_totals'=>$battalions_grand_totals);
		}
		
		
		public function initializeMTData($vehicles, $battalions, $types, $selectedType='holding_on_off_road'){
			$consolidatedMTData = array();
			$battalions_grand_totals = array();
			foreach($battalions as $bat_id=>$bat_name){
				$battalions_grand_totals['grand_total_'.$selectedType.$bat_id] = 0;
			}
			$battalions_grand_totals['grand_total'] = 0;
			foreach($vehicles as $vehicle_id=>$vehicle_name){
				$consolidatedMTData[$vehicle_id]['grand_total_holding'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_on_road'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_off_road'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_on_off_road']=0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_on_road_case_property_in_mt']=0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_on_duty'] = 0;
				$consolidatedMTData[$vehicle_id]['grand_total_off_duty'] = 0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_empty_on_off_road']=0;
				$consolidatedMTData[$vehicle_id]['grand_total_holding_on_off_road']=0;
				
				$consolidatedMTData[$vehicle_id]['grand_total_empty_on_off_duty']=0;
				$consolidatedMTData[$vehicle_id]['grand_total'] = 0;
				
				foreach($battalions as $bat_id=>$bat_name){
					foreach($types as $type_id=>$type_name){
						$consolidatedMTData[$vehicle_id][$bat_id][$type_id] = 0;
					}
					$consolidatedMTData[$vehicle_id][$bat_id]['holding_on_off_road'] =0;
					
				}
			}
			return array('consolidatedMTData'=>$consolidatedMTData,'battalions_grand_totals'=>$battalions_grand_totals);
		}
		public function initializeGrandTotals($vehicles, $battalions, $types){
			
			$battalions_grand_totals = array();
			foreach($battalions as $bat_id=>$bat_name){
				foreach($types as $k=>$v){
					$battalions_grand_totals['grand_total_'.$k.$bat_id] = 0;
				}
			}
			$battalions_grand_totals['grand_total'] = 0;
			return $battalions_grand_totals;
		}
		/**
		*	This function is used to fetch data (on dury, off duty figures
		*/
		public function processCalculationsAllFigureOnOffDuty($consolidatedMTData, $battalions, $vehicles, $types,$battalions_grand_totals,$selectedType){
			//var_dump($battalions);
			
			$allVehicles = $this->MTVehicle_model->getAllVehiclesOnOffDuty($battalions, $vehicles);
				
			//if(false){
			$selectedVehicles = array();
			foreach($allVehicles as $k=>$vehicle){
				
				if(in_array($vehicle->reg_no,array_keys($selectedVehicles))){
					if(empty($vehicle->date_of_duty)){
						break;
					}
					$currentVechicleDateStr = $vehicle->date_of_duty;
					$currentdtime = DateTime::createFromFormat("d/m/Y", $currentVechicleDateStr);
					if($currentdtime){
						$currenttimestamp = $currentdtime->getTimestamp();
					}else{
						$currenttimestamp =0;
					}
					$oldVechicleDateStr = $selectedVehicles[$vehicle->reg_no]->date_of_duty;
					$olddtime = DateTime::createFromFormat("d/m/Y", $oldVechicleDateStr);
					if($olddtime){
						$oldtimestamp = $olddtime->getTimestamp();
					}else{
						$oldtimestamp = 0;
					}
					if($currenttimestamp>$oldtimestamp){
						$selectedVehicles[$vehicle->reg_no] = $vehicle;
					}
				}else{
					$selectedVehicles[$vehicle->reg_no] = $vehicle;
				}
			}
			foreach($selectedVehicles as $key=>$vehicle){
				//var_dump($vehicle);
				//die;	
				if(in_array(trim($vehicle->place_of_duty),array('MT Section'))){
					
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_duty'])){
						$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
						$battalions_grand_totals['grand_total']++;
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['off_duty']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_off_duty']++;
					}
				}elseif(in_array(trim($vehicle->place_of_duty),array('Ceremonial duty','Election duty','General duty','Law & duty','MT Training','MT Traning (Permanent Alloted for Training Purpose...','Office duty','Officer','Other state','Sports duty','VIP Duty'))){
					
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty'])){
						
						$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
						$battalions_grand_totals['grand_total']++;
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
					}
				}else{
					
					//here we have added the empty duty to On Duty vehicles
						//$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
						//$battalions_grand_totals['grand_total']++;
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty'])){
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['on_duty']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_on_duty']++;
					}
					if(isset($consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_duty'])){
						$battalions_grand_totals['grand_total_'.$selectedType.$vehicle->bat_id]++;
						$battalions_grand_totals['grand_total']++;
						$consolidatedMTData[$vehicle->catofvechicle][$vehicle->bat_id]['empty_on_off_duty']++;
						$consolidatedMTData[$vehicle->catofvechicle]['grand_total_empty_on_off_duty']++;
						
						
					}
				}
			}
			//} 
			return array('consolidatedMTData'=>$consolidatedMTData,'battalions_grand_totals'=>$battalions_grand_totals);
		}
		/**
		*	This function will return all the vehicles
		*/
		public function getVehicles(){
			return  array('Ambulance' => 'Ambulance', 'BUS 52 Seater' => 'BUS 52 Seater', 'Truck' => 'Truck', 'Canter/Tata 407' => 'Canter/Tata 407', 'M/Cycle (Royel Enfield)' => 'M/Cycle (Royel Enfield)', 'M/Cycle (Bajaj Pulsar)' => 'M/Cycle (Bajaj Pulsar)', 'Mini Bus' => 'Mini Bus','Toyota (Kirloskar Motor)' => 'Toyota (Kirloskar Motor)','Bolero (M & M)' => 'Bolero (M & M)', 'Xylo (M & M)' => 'Xylo (M & M)', 'Maruti Suzuki (Ertiga)' =>'Maruti Suzuki (Ertiga)', 'Scorpio (M & M)' => 'Scorpio (M & M)', 'Tata Sumo' => 'Tata Sumo','Gypsy' =>'Gypsy','Sumo Victa' => 'Sumo Victa','Jeep' => 'Jeep', 'Water Tank' => 'Water Tank','Tractor' => 'Tractor','Ambassador Car' => 'Ambassador Car','M/Cycle (Suzuki)' => 'M/Cycle (Suzuki)','Van (Maruti Omni)' => 'Van (Maruti Omni)','Canter (Eicher)' => 'Canter (Eicher)','Bus 42 Seater' => 'Bus 42 Seater','Mahindra Invader' => 'Mahindra Invader', 'Bus 44 Seater' => 'Bus 44 Seater','Bus 45 Seater' => 'Bus 45 Seater','M/Cycle (Hero Karizma)' => 'M/Cycle (Hero Karizma)','Qualis' => 'Qualis','Tempo Trax Gama' => 'Tempo Trax Gama','Hero Honda' => 'Hero Honda','Bajaj Platina' => 'Bajaj Platina','Innova' => 'Innova','Maruti Suzuki SX-4' => 'Maruti Suzuki SX-4','Truck (Training)' => 'Truck (Training)','Gypsy (Training)' =>'Gypsy (Training)','Canter/Tata 407 (Training)' => 'Canter/Tata 407 (Training)','M/Cycle (Suzuki)(Training)' => 'M/Cycle (Suzuki) (Training)','Bolero (M & M) (Training)' => 'Bolero (M & M) (Training)','Mini Bus (Training)' => 'Mini Bus (Training)','Ambassador Car (Training)' => 'Ambassador Car (Training)','M/Cycle (Royel Enfield) (Training)' => 'M/Cycle (Royel Enfield) (Training)','MAP Truck'=>'MAP 	Truck','Force Motors Ambulance' => 'Force Motors Ambulance','Mobile Kitchen and Food Van'=>'Mobile Kitchen and Food Van');
		}
		/**
		*	This function will return the vehicle types
		*/
		public function getVehicleType(){
			return  array('' => '--Select--', 'Vajara' => 'Vajara','Water cannon' => 'Water cannon', 'Ambulance' => 'Ambulance', 'recovery Van' => 'recovery Van' ,'General duty' => 'General duty','MT Training Duty' => 'MT Training Duty');
		}
		/**
		*	Fetch all those battalions/units which have mt section
		*/
		public function getBattalions(){
			$data =  $this->MTVehicle_model->getBattalions();
			$battalions = array();
			foreach($data as $k=>$bat){
				$battalions[$bat->users_id] = $bat->user_name;
			}
			return $battalions;
		}
		/***
		* This function is used to sort the battalion
		* @input: battalion array with id=>name pair
		*/
		public function sortBattalions($battalions){
			$battalionOrder = array(
					34=>'7 - PAP',
					106=>'9 - PAP',
					135=>'13 - PAP',
					48=>'27 - PAP',
					188=>'36 - PAP',
					9=>'75 - PAP',
					55=>'80 - PAP',
					140=>'82 - PAP',
					76=>'RTC - PAP',
					130=>'ISTC',
				//68=>'CSO PAP',
				//61=>'ADGP PAP',
					194=>'1 - IRB',
					170=>'2 - IRB',
					158=>'3 - IRB',
					116=>'4 - IRB',
					111=>'5 - IRB',
					169=>'6 - IRB',
					124=>'7 - IRB',
				//214=>'IGP - IRB',
					206=>'RTC LADDA KOTHI - IRB',
					208=>'1 - CDO',
					176=>'2 - CDO',
					146=>'3 - CDO',
					152=>'4 - CDO',
					182=>'5 - CDO',
				//215=>'IGP - CDO',
					200=>'CTC - BG',
					221=>'ARP - PAP'
			);
			$sortedBattalions = array();
			foreach($battalionOrder as $id=>$name){
				if(isset($battalions[$id])){
					$sortedBattalions[$id] = $name;
				}
			}
			return $sortedBattalions;
		}
		public function getDataTypes(){
			return array('on_road'=>'On Road','off_road'=>'OFF ROAD','holding_on_off_road'=>'Total of ON/OFF Road','on_road_case_property_in_mt'=>'On road case property in MT','empty_on_off_road'=>'Empty on/off Road_','on_duty'=>'On Duty','off_duty'=>'Available in MT',/*'total'=>'Total',*/'empty_on_off_duty'=>'Empty ON/OFF Duty');
		}
		/**
		*	it will return all the units in punjab armed police
		*/
		public function getUnits(){
			return array('pap'=>'PAP', 'irb'=>'IRB', 'cdo'=>'CDO', 'other'=>'Other');
		}
		public function getBattalionsOfUnit($unit){
			if($unit=='pap'){
				$battalions = array(
					34=>'7 - PAP',
					106=>'9 - PAP',
					135=>'13 - PAP',
					48=>'27 - PAP',
					188=>'36 - PAP',
					9=>'75 - PAP',
					55=>'80 - PAP',
					140=>'82 - PAP',
					76=>'RTC - PAP',
					130=>'ISTC'
					//68=>'CSO PAP',
					//61=>'ADGP PAP',
				);
			}elseif($unit=='irb'){
				
				$battalions = array(
					194=>'1 - IRB',
					170=>'2 - IRB',
					158=>'3 - IRB',
					116=>'4 - IRB',
					111=>'5 - IRB',
					169=>'6 - IRB',
					124=>'7 - IRB',
				//214=>'IGP - IRB',
					206=>'RTC LADDA KOTHI - IRB'
				);
			}elseif($unit=='cdo'){
				$battalions=array(
					208=>'1 - CDO',
					176=>'2 - CDO',
					146=>'3 - CDO',
					152=>'4 - CDO',
					182=>'5 - CDO',
				//215=>'IGP - CDO',
					200=>'CTC - BG'
				);
			}
			return $battalions;
		}
		/**
		*	This function will fettche the unit by passsing bat id  as input
		*/
		public function getUnitByBattalionId($bat_id){
			if(in_array($bat_id,array(34,106,135,48,188,9,55,140,76,130))){
				return 'pap';
			}elseif(in_array($bat_id,array(194,170,158,116,111,169,124,206))){
				return 'irb';
			}elseif(in_array($bat_id,array(208,176,146,152,182,200))){
				return 'cdo';
			}else{
				return 'other';
			}
		}
		/**
		*	Genrating excel sheet for all figures
		*/
		public function createdAllFigureExcel($data,$vehicles,$battalions,$figureNamesToBeSkipped){
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Vehicle consolidated figures, Generated by ERMS-PAP.")
										 ->setKeywords("Figures of vehicles in MT")
										 ->setCategory("Equipment figure view");
			$counti= 0;
			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Figure View'); 
			$counter = 0;
			$row=1;
			$titleStyle = array(
				'font'  => array(
					'size'  => 15,
					'name'  => 'Verdana',
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF00a0')
					)
				));
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Figures of vehicles in respective Battalions');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:E1");
			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			
			
			$cols = array('C','D','E');
			$cols_temp = array('A','B','C','D','E','F','G','H');
			$i=0;
			
			$row++;
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
			$counter = 1;
			$objPHPExcel->getActiveSheet()
    ->getStyle('A')
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			foreach($data as $vehicleid=>$battalion){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $vehicles[$vehicleid]); //name of vechicel
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setBold(true);
				$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":G".$row);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' => 'c0c0c0')
						)
					)
				);
				//table col name
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Battalion');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Holding');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'On Road');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'Off Road');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, 'On road case property in MT');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, 'On Duty');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, 'Available in MT-Section');
				
				
				foreach($cols_temp as $k=>$v){
					$objPHPExcel->getActiveSheet()->getStyle($v.$row)->applyFromArray(
						array(
							'fill' => array(
								'type' => PHPExcel_Style_Fill::FILL_SOLID,
								'color' => array('rgb' => 'F3F5F7')
							)
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle($v.$row)->getFont()->setBold(true);
				}
				//echo '<tr><td>'.$v2.'</td>';
				$i=0;
				if(count($battalion)>VARIABLE_QUANTITY){
					foreach($battalion as $bat_id=>$parameters){ 
						if(!in_array($bat_id,$figureNamesToBeSkipped)){
							$i++;
							$row++;
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $i);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $battalions[$bat_id]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $parameters['holding_on_off_road']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $parameters['on_road']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $parameters['off_road']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $parameters['on_road_case_property_in_mt']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $parameters['on_duty']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $parameters['off_duty']);
						}
					}
					
				}else{
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'No Data Found!!');
					$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":E".$row);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				}
				$row++;	
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Grand Total');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $battalion['grand_total_on_off_road']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $battalion['grand_total_on_road']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $battalion['grand_total_off_road']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $battalion['grand_total_on_road_case_property_in_mt']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $battalion['grand_total_on_duty']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $battalion['grand_total_off_duty']);
				
				foreach($cols_temp as $k=>$v){
					$objPHPExcel->getActiveSheet()->getStyle($v.$row)->applyFromArray(
						array(
							'fill' => array(
								'type' => PHPExcel_Style_Fill::FILL_SOLID,
								'color' => array('rgb' => 'F3F5F7')
							)
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle($v.$row)->getFont()->setBold(true);
				}
				
				$row++;
				$row++;
			}
			
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="all_vehicle_figures.'.EXCEL_EXTENSION.'"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}
		/**
		*	Genrating excel sheet for Battalion login
		*/
		public function createdAllFigureExcelForBattalion($data,$vehicles,$battalions,$figureNamesToBeSkipped){
			
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Vehicle consolidated figures, Generated by ERMS-PAP.")
										 ->setKeywords("Figures of vehicles in MT")
										 ->setCategory("Equipment figure view");
			$counti= 0;
			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Figure View'); 
			$counter = 0;
			$row=1;
			$titleStyle = array(
				'font'  => array(
					'size'  => 15,
					'name'  => 'Verdana',
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF00a0')
					)
				));
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Figures of vehicles in '.$battalions[$this->session->userdata('userid')].' Battalion');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:E1");
			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			
			
			$cols = array('C','D','E');
			$cols_temp = array('A','B','C','D','E','F','G','H');
			$i=0;
			
			$row++;
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
			$counter = 1;
			$objPHPExcel->getActiveSheet()
				->getStyle('A')
				->getAlignment()
				->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			foreach($cols_temp as $k=>$v){
				$objPHPExcel->getActiveSheet()->getStyle($v.$row)->applyFromArray(
						array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' => 'c0c0c0')
						)
					)
				);
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Weapon');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Holding');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'On Road');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'Off Road');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, 'On road case property in MT');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, 'On Duty');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, 'Available in MT-Section');
			$row++;
			 $counter = 1; 
			 $consolidatedMTData = $data;
			 foreach($consolidatedMTData as $vehicleid=>$battalion){ 
				if(isset($battalion[$this->session->userdata('userid')])){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $vehicles[$vehicleid]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $battalion[$this->session->userdata('userid')]['holding_on_off_road']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $battalion[$this->session->userdata('userid')]['on_road']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $battalion[$this->session->userdata('userid')]['off_road']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $battalion[$this->session->userdata('userid')]['on_road_case_property_in_mt']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $battalion[$this->session->userdata('userid')]['on_duty']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $battalion[$this->session->userdata('userid')]['off_duty']);
					$counter++;
					$row++;
				} 
			} 
			
			
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="all_vehicle_figures.'.EXCEL_EXTENSION.'"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}
		/**
		*	Genrating excel sheet for vehicles
		*/
		public function createExcelFileStoreVehicle($data,$selectedType,$types,$selectedUnit,$units,$selected_battalions,$battalionGrandTotals){
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Vehicle consolidated figures, Generated by ERMS-PAP.")
										 ->setKeywords("Figures of vehicles/battalion in MT")
										 ->setCategory("Vehicle/Battalion figure view");
			$counti= 0;
			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Figure View'); 
			$counter = 0;
			$row=1;
			$titleStyle = array(
				'font'  => array(
					'size'  => 15,
					'name'  => 'Verdana',
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF00a0')
					)
				));
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Selected Type Figures of vehicles in respective Battalions');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			//$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:H1");
			$row++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'Showing "'.$types[$selectedType].'" vehicles in '.$units[$selectedUnit]); //name of vechicel
			
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$row++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.'); 
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Vehicle Name'); 
			
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			
			
			$cols = array('C','D','E');
			$cols_temp = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O');
			$i=2;
			foreach($selected_battalions as $k=>$v){ 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$i].$row, $v);
				$i++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$i].$row, 'Total');
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:".$cols_temp[$i]."1");
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".($row-1).":".$cols_temp[$i].($row-1));
			$i=0;
			$row++;
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
			$counter = 1;
			$objPHPExcel->getActiveSheet()
				->getStyle('A')
				->getAlignment()
				->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$i=0;
						
			foreach($data as $vehicle_name=>$bat_data){
				$i++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[0].$row, $i);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[1].$row, $vehicle_name);
					$j=2;
					foreach($selected_battalions as $bat_id=>$data){
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $bat_data[$bat_id][$selectedType]);
						$j++;
					}
				if($selectedType=="total"){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $bat_data['grand_'.$selectedType]);
				}else{
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $bat_data['grand_total_'.$selectedType]);
				}
				$row++;
			}
			$j = 1;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, 'Grand Total');
			$j++;
			foreach($selected_battalions as $bat_id=>$data){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $battalionGrandTotals['grand_total_'.$selectedType.$bat_id]);
				$j++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $battalionGrandTotals['grand_total']);
						
			
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="all_vehicle_figures.'.EXCEL_EXTENSION.'"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}
		public function downloadConsolidateUnitWiseData($data,$types,$type,$vehicles,$units,$grandTotalData){
			error_reporting(0);	
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Vehicle consolidated figures, Generated by ERMS-PAP.")
										 ->setKeywords("Figures of vehicles/battalion in MT")
										 ->setCategory("Vehicle/Battalion figure view");
			$counti= 0;
			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Figure View'); 
			$counter = 0;
			$row=1;
			$titleStyle = array(
				'font'  => array(
					'size'  => 13,
					'name'  => 'Verdana',
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF00a0')
					)
				));
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Consolidated Figures of  Vehicles in MT of PAP\'s,IRB\'s and CDO\'s including Training Centre\'s');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			//$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:H1");
			$row++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'Showing "'.$types[$type].'" vehicles.'); //name of vechicel
			
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$row++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.'); 
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Vehicle Name'); 
			
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			
			
			$cols = array('C','D','E');
			$cols_temp = array('A','B','C','D','E','F','G','H'	);
			$i=2;
			
			unset($units['other']);
			foreach($units as $k=>$v){ 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$i].$row, $v);
				$i++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$i].$row, 'Total');
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:J1");
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".($row-1).":".$cols_temp[$i].($row-1));
			$i=0;
			$row++;
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
			$counter = 1;
			$objPHPExcel->getActiveSheet()
				->getStyle('A')
				->getAlignment()
				->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$i=0;
				//var_dump($data);
			foreach($data as $vehicle_name=>$parameters){
				$i++;
				//var_dump($parameters);
				//die;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[0].$row, $i);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[1].$row, $vehicle_name);
				//var_dump($units);
				//die;
				$j=2;
				foreach($units as $bat_id=>$data){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $parameters[$bat_id][$type]);
					$j++;
				}
				if($selectedType=="total"){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $parameters['grand_'.$selectedType]);
				}else{
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $parameters['grand_total_'.$type]);
				}
				$row++;
			}
			unset($units['other']);
			$j=1;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row,'Grand Total');
			$j++;
			foreach($units as $k=>$unit_name){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row,$grandTotalData['grandTotal'][$k]);
				$j++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$j].$row, $grandTotalData['totalGrand']);
			
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="all_vehicle_figures.'.EXCEL_EXTENSION.'"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}
	}
