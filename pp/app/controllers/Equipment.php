<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class Equipment extends CI_Controller
	{
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
			$this->load->model(F_BTALION.'Btalion_model'); 
			$this->load->model('Msk_model');
		}
		public function _remap($method){
			if($this->uri->uri_string=='equipment-figures'){
				if($this->session->user_log==100){
					$this->securityEquipmentFiguresForOfficer();
				}elseif($this->session->user_log==5){
					$this->equipmentFiguresForBattalions();
				}
			}else{
				$array = array();
				foreach($this->uri->segments as $k=>$v){
					if($k==1){ }else{
						$array[] = $v;
					}
				}
				if(count($array)>0){
					call_user_func_array(array($this,$method),$array);
				}else{
					$this->$method();
				}
			}
		}
                
		public function index(){
			$this->load->helper('common');
			$this->permission->checkuserb();
			//$data['arms'] =  $this->Btalion_model->fetchinfo(T_ISSUE_ARM,array('issue_to' => $this->session->userdata('userid'), 'bat_status' => 0));
			$data['osi'] =  $this->Btalion_model->fetchinfo('newosi',array('bat_id' => $this->session->userdata('userid'), 'uid' => 1));
			$data['mt'] =  $this->Btalion_model->fetchinfo('newmt',array('bat_id' => $this->session->userdata('userid'), 'uid' => 1));
			$this->load->library('form_validation');
			$this->load->helper('security');

			
			$bdn = $this->input->post("mt",TRUE);
			$osi = $this->input->post("osi",TRUE);
			$this->form_validation->set_rules("mt", "mt", "trim");
			$this->form_validation->set_rules("osi", "osi", "trim");
			if ($this->form_validation->run()){
				if($bdn!=''){
					$add_web = $this->Btalion_model->mark_mt($bdn);
					if($add_web == 1){
					redirect('bt-vichele-old');
				}
				}elseif($osi!=''){
					$add_web = $this->Btalion_model->mark_osi($osi);
					if($add_web == 1){
					redirect('bt-osi-old');
				}

				}	
			}


			$this->load->view(F_BTALION.'dashboard',$data);
		}
		public function getTypeOfItems(){
			$this->load->model('Msk_model');
			$data = $this->Msk_model->getTypeOfItems();
			$items = array();
			//$items['']='';
			foreach($data as $k=>$v){
				$items[trim($v->item)] = trim($v->item);
			}
			return $items;
		}
		
		public function getItemNames(){
			$nameofItemType = $this->input->get('itemtype_name');
			//$nameofItemType = 'Security Equipment';
			$items = $this->Msk_model->getItemNamesFromType($nameofItemType);
			$itemNames = array();
			foreach($items as $k=>$item){
				$itemNames[] = $item->name;
			}
			echo json_encode($itemNames);
		}
		public function getItemsByTypeName($typeOfItem){
			//var_dump($typeOfItem);
			$items = $this->Msk_model->getItemNamesFromType($typeOfItem);
			//echo '<HR><HR>';
			//var_dump($items);
			$itemNames = array();
			foreach($items as $k=>$item){
				$itemNames[trim($item->name)] = trim($item->name)	;
			}
			//var_dump($itemNames);
			//echo '<HR>';
			return $itemNames	;
		}
		public function getEquipmentDataTypes(){
			return $this->Msk_model->getEquipmentDataTypes();
		}
		public function skipZeroValueRecords($holdings,$items,$units,$dataType)
		{
			$new_holdings = array();
			$new_items = array();
			//var_dump($items);
			foreach($items as $k1=>$v1){
				$total = 0;
				$keep = false;
				foreach($units as $k=>$v){
					$total += $holdings[$k][$v1][$dataType];
					if($holdings[$k][$v1][$dataType]>0){
						$keep = true;
						break;
					}
				}
				if($keep==true){
					$new_items[] = $v1;
					foreach($units as $k=>$v){
						foreach($holdings[$k][$v1] as $kk=>$vv){
						$new_holdings[$k][$v1][$kk] = $vv;
						//$new_holdings[$k][$v1][$dataType] = $holdings[$k][$v1][$dataType];
						}
					}
				}
			}
			
			return array($new_holdings,$new_items);;
		}
		public function equipmentFiguresForBattalions(){
                    $data=[];
                    $skipZeroEquipments = true;
                    if(null!=$this->input->post('search') || null!=$this->input->post('download')){
                        if(null!=$this->input->post('skipZeroEquipments')){
                                $skipZeroEquipments = TRUE;
                        }else{
                                $skipZeroEquipments = FALSE;
                        }
                    }
                    $data['skipZeroEquipments'] = $skipZeroEquipments;
			$download = $this->input->post('download');
			if($download){
				$this->downloadEquipmentFiguresForBattalions();
			}elseif(null!=$this->input->post('complete_download')){
				$data = $this->completeDownloadFiguresOfBattalion();
			}else{
				$battalion_id = $this->session->user_id;
				$data['equipmentsData'] = $this->loadAllFiguresOfMSKForBattalion();
				$data['battalions'] 	= $data['equipmentsData']['battalions'];
				$data['typeofitems'] 	= $data['equipmentsData']['typeofitems'];
				$data['nameofitems'] 	= $data['equipmentsData']['nameofitems'];
				$data['typeOfItem'] 	= $data['equipmentsData']['typeOfItem'];
				$data['equipments'] 	= $data['equipmentsData']['equipments'];
				$data['grand_total'] = $data['equipmentsData']['grand_total'];
				$this->load->view('Msk/battalion_equipments',$data);
			}
		}
		//this functon is used to fetch data from database
		public function securityEquipmentFiguresForOfficer(){
                    $data=[];
			$skipZeroBattalions = true;
                        $skipZeroEquipments = true;
                        if(null!=$this->input->post('search')){
                            if(null!=$this->input->post('skipZeroBattalions')){
                                    $skipZeroBattalions = TRUE;
                            }else{
                                    $skipZeroBattalions = FALSE;
                            }
                            if(null!=$this->input->post('skipZeroEquipments')){
                                    $skipZeroEquipments = TRUE;
                            }else{
                                    $skipZeroEquipments = FALSE;
                            }
                        }
                        $data['skipZeroBattalions'] = $skipZeroBattalions;
                        $data['skipZeroEquipments'] = $skipZeroEquipments;
			/*if battalion 
			redirection that battalion particular page*/
			error_reporting(0);
			$pageType = $this->input->get('page');
			
			if(in_array($pageType,array('ALL_FIGURES','STORE_EQUIPMENTS','CONSOLIDATE','ISSUED_HOLDING_INKOT'))){
				$download = $this->input->post('download');
			}else{
				$download = $this->input->get('download');
			}
			if($download){
				$downloadType = $this->input->get('page');
				
				switch($downloadType){
					case 'CONSOLIDATE':
					{
						$this->downloadConsolidate();
						break;
					}
					case 'STORE_EQUIPMENTS':
					{
						$this->downloadStoreEquipment();
						break;
					}
					case 'ISSUED_HOLDING_INKOT':
					{
						$this->downloadIssueHoldingInkot();
						break;
					}
					case 'ALL_FIGURES':
					default:
					{
						$this->downloadAllFigures();
						break;
					}
				}
				//die('downloading');
				exit();
			}
			if($pageType =='ALL_FIGURES'){
				//die('All figures');
				//LOAD ALL FIGURE PAGE
				$data['subpage'] = 'all_figures.php';
				$data['equipmentsData'] = $this->loadAllFiguresOfMSK();
				$data['battalions'] = $this->sortBattalions($data['equipmentsData']['battalions']);
				//var_dump($data['battalions']);
				$data['typeofitems'] = $data['equipmentsData']['typeofitems'];
				$data['nameofitems'] = $data['equipmentsData']['nameofitems'];
				$data['typeOfItem'] = $data['equipmentsData']['typeOfItem'];
				
				$data['equipments'] = $data['equipmentsData']['equipments'];
				//var_dump($data);
			}else if($pageType == 'CONSOLIDATE'){
				
				$data['subpage'] = 'consolidate.php';
				$data['data'] = $this->getTotalEquipmentsInUnits();
				$data['holdings'] = $data['data']['holdings'];
				$data['categories'] = $data['data']['categories'];
				$data['nameofitems'] = $data['data']['nameofitems'];
				$data['itemNamesArray'] = $data['data']['itemNamesArray'];
				$data['units'] = $data['data']['units'];
				$data['type'] = $data['data']['type'];
				
				/*if($data['data']['skipZero']){
					$newData = $this->skipZeroValueRecords($data['holdings']['holdings'],$data['itemNamesArray'],$data['units'],$data['type']);
					$data['holdings']['holdings'] = $data['data']['holdings'] = $newData[0];
					$data['data']['itemNamesArray'] = $newData[1];
				}else{
					$data['data']['holdings'] = $data['data']['holdings']['holdings'];
					
				}*/
				
				$data['data']['holdings'] = $data['data']['holdings'];
				//var_dump($data['new_holdings']);
				$data['selectedCategory'] = $data['data']['selectedCategory'];
			}else if($pageType =='STORE_EQUIPMENTS'){
				//echo 'hi';
				$data['data'] = $this->loadStoreEquipments();
				//var_dump($data['data']['holdings']);
				//var_dump($data);
				$data['battalions'] = $data['data']['unit'];
				$data['equipmentDataTypes'] = $this->getEquipmentDataTypes();
				$data['units'] = $data['data']['units'];
				$data['categories'] = $data['data']['categories'];
				$data['selectedCategory'] = $data['data']['selectedCategory'];
				
				$data['selectedUnit'] = $data['data']['selectedUnit'];
				$data['selectedEquipmentDataType'] = $data['data']['selectedEquipmentDataType'];
				$data['subpage'] = 'store_equipments.php';
				$data['holdings'] = $data['data']['holdings'];
				$data['itemNamesArray'] = $data['data']['itemNamesArray'];
				$data['selectedItemNamesArray'] = $data['data']['selectedItemNamesArray'];
				$data['trimmedEquipmentsName'] = $data['data']['zeroSkippedItemNames'];
				$grand_total = array();
				$eq = array();
				
			}else if($pageType=='ISSUED_HOLDING_INKOT'){
				$data['data'] = $this->loadStoreEquipments();
				//var_dump($data['data']['holdings']);
				//var_dump($data);
				$data['battalions'] = $data['data']['unit'];
				$data['equipmentDataTypes'] = array('serviceable_in_store'=>'Serviceable In Store');// $this->getEquipmentDataTypes();$data['equipmentDataTypes'] = $this->getEquipmentDataTypes();
				$data['units'] = $data['data']['units'];
				$data['categories'] = $data['data']['categories'];
				$data['selectedCategory'] = $data['data']['selectedCategory'];
				
				$data['selectedUnit'] = $data['data']['selectedUnit'];
				$data['selectedEquipmentDataType'] = 'serviceable_in_store';// $data['data']['selectedEquipmentDataType'];//$data['selectedEquipmentDataType'] = $data['data']['selectedEquipmentDataType'];
				$data['subpage'] = 'issued_holding_in_kot.php';
				$data['holdings'] = $data['data']['holdings'];
				$data['itemNamesArray'] = $data['data']['itemNamesArray'];
				$data['selectedItemNamesArray'] = $data['data']['selectedItemNamesArray'];
				$data['trimmedEquipmentsName'] = $data['data']['zeroSkippedItemNames'];
				$grand_total = array();
				$eq = array();
			}else{
				$data['subpage'] = 'all_figures.php';
				//default
                                
                                
				$data['equipmentsData'] = $this->loadAllFiguresOfMSK();
				$data['battalions'] = $data['equipmentsData']['battalions'];
				$data['typeofitems'] = $data['equipmentsData']['typeofitems'];
				$data['nameofitems'] = $data['equipmentsData']['nameofitems'];
				$data['typeOfItem'] = $data['equipmentsData']['typeOfItem'];
				$data['equipments'] = $data['equipmentsData']['equipments'];
			}
			$this->load->view('Msk/equipments',$data);
		}
		
		public function getBattalionNameById($battalionId){
			$battalions = array(
				33=>'7 - PAP',
				104=>'9 - PAP',
				133=>'13 - PAP',
				47=>'27 - PAP',
				185=>'36 - PAP',
				8=>'75 - PAP',
				54=>'80 - PAP',
				138=>'82 - PAP',
				75=>'RTC - PAP',
				127=>'ISTC',
				68=>'CSO PAP',
				61=>'ADGP PAP',
				191=>'1 - IRB',
				166=>'2 - IRB',
				155=>'3 - IRB',
				114=>'4 - IRB',
				109=>'5 - IRB',
				161=>'6 - IRB',
				122=>'7 - IRB',
				214=>'IGP - IRB',
				203=>'RTC LADDA KOTHI - IRB',
				101=>'1 - CDO',
				173=>'2 - CDO',
				143=>'3 - CDO',
				149=>'4 - CDO',
				179=>'5 - CDO',
				215=>'IGP - CDO',
				197=>'CTC - BG',
				219=>'ARP - PAP'
			);
			return $battalions[$battalionId];
		}
		public function sortBattalions($battalions){
			$battalionOrder = array(
				33=>'7 - PAP',
				104=>'9 - PAP',
				133=>'13 - PAP',
				47=>'27 - PAP',
				185=>'36 - PAP',
				8=>'75 - PAP',
				54=>'80 - PAP',
				138=>'82 - PAP',
				75=>'RTC - PAP',
				127=>'ISTC',
				68=>'CSO PAP',
				61=>'ADGP PAP',
				191=>'1 - IRB',
				166=>'2 - IRB',
				155=>'3 - IRB',
				114=>'4 - IRB',
				109=>'5 - IRB',
				161=>'6 - IRB',
				122=>'7 - IRB',
				214=>'IGP - IRB',
				203=>'RTC LADDA KOTHI - IRB',
				101=>'1 - CDO',
				173=>'2 - CDO',
				143=>'3 - CDO',
				149=>'4 - CDO',
				179=>'5 - CDO',
				215=>'IGP - CDO',
				197=>'CTC - BG',
				219=>'ARP - PAP'
			);
			$sortedBattalions = array();
			foreach($battalionOrder as $id=>$name){
				if(isset($battalions[$id])){
					$sortedBattalions[$id] = $name;
				}
			}
			return $sortedBattalions;
		}
		//Consolidate data
		public function getTotalEquipmentsInUnits(){
			//input
			$typeofitems = $this->getTypeOfItems();
			$data['categories'] = $typeofitems;
			if(null!=$this->input->post('category')){
				$typeOfItem = $this->input->post('category');
			}else{
				$typeOfItem = 'Security Equipment';
			}
			$items=$this->getItemsByTypeName($typeOfItem);	//get all the items
			$data['nameofitems'] = $items;
			$data['selectedCategory'] = $typeOfItem;			
			//all batallions units 
			//PAP,IRB,CDO
			if(null!=$this->input->post('skipZero')){
				$skipZero = TRUE;
			}else{
				$skipZero = FALSE;
			}
			$data['skipZero'] = $skipZero;
			
			$data['units'] = $this->Msk_model->getUnits();
			$data['unitsDetail'] = array();
			$data['pap'] = array(
				33=>'7<sup>th</sup> Bn',
				104=>'9<sup>th</sup> Bn',
				133=>'13<sup>th</sup> Bn',
				47=>'27<sup>th</sup> Bn',
				185=>'36<sup>th</sup> Bn',
				8=>'75<sup>th</sup> Bn',
				54=>'80<sup>th</sup> Bn',
				138=>'82<sup>th</sup> Bn',
				75=>'RTC',
				127=>'ISTC',
				68=>'CSO PAP',
				61=>'ADGP PAP'
			);
			$data['unitsDetail']['pap'] = $data['pap'];
			$data['irb'] = array(
				191=>'1<sup>st</sup> IRB',
				166=>'2<sup>nd</sup> IRB',
				155=>'3<sup>rd</sup> IRB',
				114=>'4<sup>th</sup> IRB',
				109=>'5<sup>th</sup> IRB',
				161=>'6<sup>th</sup> IRB',
				122=>'7<sup>th</sup> IRB',
				214=>'IGP IRB',
				203=>'RTC LADDA KOTHI'
			);
			$data['unitsDetail']['irb'] = $data['irb'];
			$data['cdo'] = array(
				101=>'1<sup>st</sup> CDO',
				173=>'2<sup>nd</sup> CDO',
				143=>'3<sup>rd</sup> CDO',
				149=>'4<sup>th</sup> CDO',
				179=>'5<sup>th</sup> CDO',
				215=>'IGP CDO',
				197=>'CTC BG'
			);
			$data['unitsDetail']['cdo'] = $data['cdo'];
			$battalionIds = array();
			foreach($data['units'] as $k1=>$v1){
				foreach($data[$k1] as $k=>$v){
					$battalionIds[$k]= $v;
				}
			}
				//var_dump($battalionIds);
			$dataType = $this->input->post('dataType');
			if(isset($dataType)){
				$type = $this->input->post('dataType');
			}else{
				$type = 'holding';
			}
			$data['type'] = $type;
				
			if(null!=$this->input->post('category')){
				$category = $this->input->post('category');
			}else{
				$category = 'Security Equipment';
			}
			$itemNamesArray = array();
				
			
			if(null!=$this->input->post('items') && !empty($this->input->post('items'))){
				$itemsArray = $this->input->post('items');
				foreach($itemsArray as $k=>$v){
					$itemNamesArray [] = $v;
				}
			}else{
				//calculate total
				$itemNames = $this->Msk_model->getItemNamesFromType($category);
				foreach($itemNames as $k=>$v){
					$itemNamesArray[] = $v->name;
				}
			}
			//initialize
			$data['itemNamesArray'] = $itemNamesArray;
			
			
			$holdings = array();
			switch($type){
				case 'holding':
					$data['holdings'] = $this->getHolding(array_keys($battalionIds),$category,$itemNamesArray,$data['unitsDetail'],$data['units']);
					//echo $this->db->last_query();
					break;
				case 'sanction':
					$data['holdings'] = $this->getSanctioned(array_keys($battalionIds),$category,$itemNamesArray,$data['unitsDetail'],$data['units']);
					break;
				case 'issued':
					$data['holdings'] = $this->getIssued(array_keys($battalionIds),$category,$itemNamesArray,$data['unitsDetail'],$data['units']);
					break;
				case 'total_in_store':
					$data['holdings'] = $this->getTotalInStore(array_keys($battalionIds),$category,$itemNamesArray,$data['unitsDetail'],$data['units']);
					break;
				case 'serviceable':
					$data['holdings'] = $this->getServiceable(array_keys($battalionIds),$category,$itemNamesArray,$data['unitsDetail'],$data['units']);
					//var_dump($data['holdings']);
					//die('slkdjf');
					break;
				case 'unserviceable':
					$data['holdings'] = $this->getUnserviceable(array_keys($battalionIds),$category,$itemNamesArray,$data['unitsDetail'],$data['units']);
					break;
				case 'serviceable_in_store':
					$data['holdings'] = $this->getServiceableInStore(array_keys($battalionIds),$category,$itemNamesArray,$data['unitsDetail'],$data['units']);
					
					break;
				default:
					//$holdings[$k][$itemName]['holding']=0;
					break;
			}
			if($skipZero){
				$newData = $this->skipZeroValueRecords($data['holdings']['holdings'],$itemNamesArray,$data['units'],$data['type']);
				$data['holdings'] = $newData[0];
				$data['itemNamesArray'] = $newData[1];
			}else{
				$data['holdings'] = $data['holdings']['holdings'];
			}
			return $data;
		}
		/**
		*	This function will fetch the count the number of serviceable equipments
		*/
		public function getUnserviceable($battalionIds,$category,$itemNamesArray,$unitsDetail,$units){
			$holdings = array();
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['holding']=0;
					$holdings[$k][$itemName]['serviceable']=0;
					$holdings[$k][$itemName]['issued']=0;
					$holdings[$k][$itemName]['total_in_store']=0;
					$holdings[$k][$itemName]['newmskconofitemC']=0;
					$holdings[$k][$itemName]['serviceable2RecievedQuantityC']=0;
					$holdings[$k][$itemName]['serviceable3RecievedQuantityD']=0;
				}
			}
			
			$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
			$holdings = $this->calculatingHoldingForUnits($holdings,$equipments,$unitsDetail);
			
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$category,$itemNamesArray);
			$holdings= $this->calculatingDepositMaterialDataFromUnits($holdings,$materialData,$unitsDetail);
			
			$data['holdings'] = $this->calculateParametersFromUnits($holdings);

			return $data;
		}
		/**
		*	This function will fetch the total no. of item in store
		*/
		public function getTotalInStore($battalionIds,$category,$itemNamesArray,$unitsDetail,$units){
			$holdings = array();
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['holding']=0;
					$holdings[$k][$itemName]['issued']=0;
					$holdings[$k][$itemName]['total_in_store']=0;
					$holdings[$k][$itemName]['newmskconofitemC']=0;
				}
			}
			// initialize successfully
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
			//die('kdhf');
			foreach($issuedData as $k=>$item){
				$unit_ = $this->getUnit($item->bat_id,$unitsDetail);
				//echo $item->mskitems_id.' - '.$item->name.' - '.$item->item.' - '.$item->issued.' - '.$item->bat_id.' - <br>';
				$value = (is_numeric($item->issued))?$item->issued:0;
				$holdings[$unit_][$item->name]['issued'] += $value;
			}
			$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
			$holdings= $this->calculatingHoldingForUnits($holdings,$equipments,$unitsDetail);
			
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['total_in_store']=$this->getTotalInStoreFrom($holdings[$k][$itemName]['holding'],$holdings[$k][$itemName]['issued']);
				}
			}
			$data['holdings'] = $holdings;
			return $data;
		}
		/**
		*	This function will fetch the issued equipments
		*/
		public function getIssued($battalionIds,$category,$itemNamesArray,$unitsDetail,$units){
			$holdings = array();
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['issued']=0;
				}
			}
			// initialize successfully
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
			foreach($issuedData as $k=>$item){
				$unit_ = $this->getUnit($item->bat_id,$unitsDetail);
				$value = (is_numeric($item->issued))?$item->issued:0;
				$holdings[$unit_][$item->name]['issued'] += $value;
			}
			$data['holdings'] = $holdings;
			return $data;
		}
		public function getSanctioned($battalionIds,$category,$itemNamesArray,$unitsDetail,$units){
			
			$holdings = array();
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['sanction']=0;
				}
			}
			// initialize successfully
			$sanctionedData = $this->Msk_model->getIssuedValues2($battalionIds,$category,$itemNamesArray);
			//var_dump($sanctionedData);
			foreach($sanctionedData as $k=>$item){
				$unit_ = $this->getUnit($item->bat_id,$unitsDetail);
				$value = (is_numeric($item->san))?$item->san:0;
				$holdings[$unit_][trim($item->name)]['sanction'] += $value;
			}
			$data['holdings'] = $holdings;
			return $data;
		}
		/**
		*	This function will fetch the count the number of holding equipments
		*/
		public function getHolding($battalionIds,$category,$itemNamesArray,$unitsDetail,$units){
			$holdings = array();
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['holding']=0;
					$holdings[$k][$itemName]['issued']=0;
					$holdings[$k][$itemName]['newmskconofitemC']=0;	//it should be over here but it's not in use
					//$holdings[$k][$itemName]['serviceable2RecievedQuantityC']=0;
					//$holdings[$k][$itemName]['serviceable3RecievedQuantityD']=0;
				}
			}
			// initialize successfully
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
			//die('kdhf');
			foreach($issuedData as $k=>$item){
				$unit_ = $this->getUnit($item->bat_id,$unitsDetail);
				//echo $item->mskitems_id.' - '.$item->name.' - '.$item->item.' - '.$item->issued.' - '.$item->bat_id.' - <br>';
				$issued = (is_numeric($item->issued))?$item->issued:0;
				$holdings[$unit_][trim($item->name)]['issued'] += $issued;
				//echo $issued.':';
			}
			/* foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					//echo $holdings[$k][$itemName]['holding'].';';
					//echo $holdings[$k][$itemName]['issued'].';';
					//echo $holdings[$k][$itemName]['newmskconofitemC'].';';	//it should be over here but it's not in use
					//$holdings[$k][$itemName]['serviceable2RecievedQuantityC']=0;
					//$holdings[$k][$itemName]['serviceable3RecievedQuantityD']=0;
					echo '<br>';
				}
			} */
			$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
			
			$data['holdings']=$this->calculatingHoldingForUnits($holdings,$equipments,$unitsDetail);
			return $data;
		}
		/**
		*	This function will fetch the count the number of serviceable equipments
		*/
		public function getServiceableInStore($battalionIds,$category,$itemNamesArray,$unitsDetail,$units){
			
			$holdings = array();
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['holding']=0;
					$holdings[$k][$itemName]['serviceable']=0;
					$holdings[$k][$itemName]['issued']=0;
					$holdings[$k][$itemName]['total_in_store']=0;
					$holdings[$k][$itemName]['newmskconofitemC']=0;
					$holdings[$k][$itemName]['serviceable2RecievedQuantityC']=0;
					$holdings[$k][$itemName]['serviceable3RecievedQuantityD']=0;
				}
			}
			// initialize successfully
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
			//die('kdhf');
			foreach($issuedData as $k=>$item){
				$unit_ = $this->getUnit($item->bat_id,$unitsDetail);
				//echo $item->mskitems_id.' - '.$item->name.' - '.$item->item.' - '.$item->issued.' - '.$item->bat_id.' - <br>';
				$value = (is_numeric($item->issued))?$item->issued:0;
				$holdings[$unit_][$item->name]['issued'] += $value;
			}
			//var_dump($holdings);
			//select * from newmsk recqut where bat-id in(battalionidd) and typeofitem = secut and nameofitems in (itemnames)
			$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);	
			$holdings = $this->calculatingHoldingForUnits($holdings,$equipments,$unitsDetail);		//holding is calculated over here
			
						//holding added
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$category,$itemNamesArray);
			$holdings = $this->calculatingDepositMaterialDataFromUnits($holdings,$materialData,$unitsDetail);
			
			$holdings = $this->calculateParameters($holdings); 
			$data['holdings'] = $holdings; 
			return $data;
		}
		
		/**
		*	This function will fetch the count the number of serviceable equipments
		*/
		public function getServiceable($battalionIds,$category,$itemNamesArray,$unitsDetail,$units){
			
			$holdings = array();
			foreach($units as $k=>$unitName){
				foreach($itemNamesArray as $k1=>$itemName){
					$holdings[$k][$itemName]['holding']=0;
					$holdings[$k][$itemName]['serviceable']=0;
					$holdings[$k][$itemName]['issued']=0;
					$holdings[$k][$itemName]['total_in_store']=0;
					$holdings[$k][$itemName]['newmskconofitemC']=0;
					$holdings[$k][$itemName]['serviceable2RecievedQuantityC']=0;
					$holdings[$k][$itemName]['serviceable3RecievedQuantityD']=0;
				}
			}
			// initialize successfully
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
			//die('kdhf');
			foreach($issuedData as $k=>$item){
				$unit_ = $this->getUnit($item->bat_id,$unitsDetail);
				//var_dump($unit_);
				//echo $item->mskitems_id.' - '.$item->name.' - '.$item->item.' - '.$item->issued.' - '.$item->bat_id.' - <br>';
				$value = (is_numeric($item->issued))?$item->issued:0;
				$holdings[$unit_][$item->name]['issued'] += $value;
			}
			//die;
			
			//select * from newmsk recqut where bat-id in(battalionidd) and typeofitem = secut and nameofitems in (itemnames)
			$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
			//echo '<BR>'.$this->db->last_query();
			//echo '<BR>';
			 
			$holdings= $this->calculatingHoldingForUnits($holdings,$equipments,$unitsDetail);
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$category,$itemNamesArray);
			
			$holdings = $this->calculatingDepositMaterialDataFromUnits($holdings,$materialData, $unitsDetail);
			$holdings = $this->calculateParametersFromUnits($holdings);
			//echo '<pre>';
			//var_dump($holdings);
			
			
			//$holdings = $this->calculateParameters($holdings);
			
			$data['holdings'] = $holdings;
			return $data;
		}
		public function getUnit($bat_id,$unitsDetail){
			$outBreak = false;
			foreach($unitsDetail as $bn=>$unit){
				if(in_array($bat_id,array_keys($unit))){
					$outBreak=true;
					return $bn;
					break;	
				}
			}
			if($outBreak==false){
				return false;
			}
			
		}
		
		//STORE EQUIPMEN
		public function loadStoreEquipments(){
			
			if($this->session->userdata('userid')==209){		//irb
				$data['units'] = array('irb'=>"IRB");
			}elseif($this->session->userdata('userid')==211){	//cdo
				$data['units'] = array('cdo'=>'CDO');
			}elseif($this->session->userdata('userid')==38){			//pap	
				$data['units'] = array('pap'=>'PAP','irb'=>'IRB','cdo'=>'CDO');
			}else{
				$data['units'] = array('pap'=>'PAP','irb'=>'IRB','cdo'=>'CDO');
			}
			$data['pap'] = array(
				33=>'7<sup>th</sup> Bn',
				104=>'9<sup>th</sup> Bn',
				133=>'13<sup>th</sup> Bn',
				47=>'27<sup>th</sup> Bn',
				185=>'36<sup>th</sup> Bn',
				8=>'75<sup>th</sup> Bn',
				54=>'80<sup>th</sup> Bn',
				138=>'82<sup>th</sup> Bn',
				75=>'RTC',
				127=>'ISTC',
				68=>'CSO PAP',
				61=>'ADGP PAP'
				
			);
			$data['irb'] = array(
				191=>'1<sup>st</sup> IRB',
				166=>'2<sup>nd</sup> IRB',
				155=>'3<sup>rd</sup> IRB',
				114=>'4<sup>th</sup> IRB',
				109=>'5<sup>th</sup> IRB',
				161=>'6<sup>th</sup> IRB',
				122=>'7<sup>th</sup> IRB',
				214=>'IGP IRB',
				203=>'RTC LADDA KOTHI'
			);
			$data['cdo'] = array(
				101=>'1<sup>st</sup> CDO',
				173=>'2<sup>nd</sup> CDO',
				143=>'3<sup>rd</sup> CDO',
				149=>'4<sup>th</sup> CDO',
				179=>'5<sup>th</sup> CDO',
				215=>'IGP CDO',
				197=>'CTC BG'
			);
			$search =$this->input->post('figuresBnWise'); 
			//echo 'search' ; var_dump($search);
			$download = $this->input->post('download');
			if(isset($search)||isset($download)){
				//fetch data from user_error
				if(isset($search)||isset($download)){
					$unit = $this->input->post('unit');
				}elseif($this->session->userdata('userid')==38){			//pap	
					$unit = $this->input->post('unit');
				}else{
					if($this->session->userdata('userid')==209){		//irb
						$unit = 'irb';
					}elseif($this->session->userdata('userid')==211){	//cdo
						$unit = 'cdo';
					}else{
						$unit = 'pap';
					}
				}
				$category = $this->input->post('category');
				$equipmentDataType = $this->input->post('equipmentDataType');
			}else{        //default value
				if($this->session->userdata('userid')==209){		//irb
					$unit = 'irb';
				}elseif($this->session->userdata('userid')==211){	//cdo
					$unit = 'cdo';
				}elseif($this->session->userdata('userid')==38){			//pap	
					$unit = 'pap';
				}else{
					$unit = 'pap';	//default
				}
				$category = 'Security Equipment';
				if(null!=$this->input->get('page') && $this->input->get('page')=='ISSUED_HOLDING_INKOT'){
					$equipmentDataType='serviceable_in_store';
				}else{
					$equipmentDataType = 'holding';
				}
			}
			$data['selectedCategory'] = $category;
			$data['selectedUnit'] = $unit;
			$data['selectedEquipmentDataType'] = $equipmentDataType;
			$typeofitems = $this->getTypeOfItems();
			$data['categories'] = $typeofitems;
			$data['unit'] = $data[$unit];
			$battalionIds = array_keys($data[$unit]);
			$data['equipmentDataTypes'] = $this->getEquipmentDataTypes();
			//calculate total
			
			$itemNames = $this->Msk_model->getItemNamesFromType($category);
			
			$itemNamesArray = array();
			foreach($itemNames as $k=>$v){
				$itemNamesArray[trim($v->name)] = trim($v->name);
			}
			
			//initialize
			$data['itemNamesArray'] = $itemNamesArray;
			
			//var_dump($this->input->post('equipments'));
			
			if(null!=$this->input->post('equipments')){
				if(!empty($this->input->post('equipments'))){
					foreach($this->input->post('equipments') as $k=>$v){
						$selectedItemNamesArray[trim($v)] = trim($v);
					}
				}else{
					$selectedItemNamesArray = $itemNamesArray;
				}
			}else{
				$selectedItemNamesArray = $itemNamesArray;
			}
			
			
			$data['selectedItemNamesArray'] = $selectedItemNamesArray;
			//var_dump($selectedItemNamesArray);
			$holdings = array();
			$col = 'holding';	
			if($equipmentDataType=='sanction'){
				//echo 'hi';
				foreach($battalionIds as $k=>$bnId){
					foreach($selectedItemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['sanction']=0;
					}
				}
				//var_dump($battalionIds);
				$equipments = $this->Msk_model->getSanctionedValues($battalionIds,$category,$itemNamesArray);
				//var_dump($itemNamesArray);
				foreach($equipments as $k=>$item){
					$value = (is_numeric($item->san))?$item->san:0;
					//echo $item->bat_id.$item->name.','.$value.',';
					$holdings[$item->bat_id][trim($item->name)]['sanction'] += $value;
				}
				//var_dump($holdings);
			}elseif($equipmentDataType=='holding'){
				//echo 'hi';
				//echo "'".$itemName."'";
				//var_dump($selectedItemNamesArray);
				foreach($battalionIds as $k=>$bnId){
					foreach($selectedItemNamesArray as $k=>$itemName){
						$holdings[$bnId][trim($itemName)]['holding']=0;
					}
				}
				$mskData = $this->Msk_model->getNewMskItems($battalionIds,$category,$selectedItemNamesArray);
				//var_dump($mskData);
				
				//echo '<hr>';
				//var_dump($holdings);
				//echo '<hr>';
				$holdings = $this->calculatingHolding($holdings,$mskData);
				//echo '<hr>';
				//var_dump($holdings);
				
			}elseif($equipmentDataType=='issued'){
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['issued']=0;
					}
				}
				$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
				foreach($issuedData as $k=>$item){
					$value = (is_numeric($item->issued))?$item->issued:0;
					$holdings[$item->bat_id][$item->name]['issued'] += $value;
				}
			}elseif($equipmentDataType=='total_in_store'){
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['issued']=0;
						$holdings[$bnId][$itemName]['holding']=0;
						$holdings[$bnId][$itemName]['total_in_store']=0;
					}
				}
				$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
				foreach($issuedData as $k=>$item){
					$value = (is_numeric($item->issued))?$item->issued:0;
					$holdings[$item->bat_id][$item->name]['issued'] += $value;
				}
				$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
				$holdings = $this->calculatingHolding($holdings,$equipments);
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['total_in_store']=$this->getTotalInStoreFrom($holdings[$bnId][$itemName]['holding'],$holdings[$bnId][$itemName]['issued']);
					}
				}
			}elseif($equipmentDataType=='serviceable'){
				
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['issued']=0;
						$holdings[$bnId][$itemName]['holding']=0;
						$holdings[$bnId][$itemName]['total_in_store']=0;
						$holdings[$bnId][$itemName]['newmskconofitemC']=0;
						$holdings[$bnId][$itemName]['serviceable2RecievedQuantityC']=0;
						$holdings[$bnId][$itemName]['serviceable3RecievedQuantityD']=0;
						$holdings[$bnId][$itemName]['serviceable']=0;
					}
				}
				$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
				foreach($issuedData as $k=>$item){
					$value = (is_numeric($item->issued))?$item->issued:0;
					$holdings[$item->bat_id][$item->name]['issued'] += $value;
				}
				
				$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
				$holdings = $this->calculatingHolding($holdings,$equipments);
				
				//var_dump($holdings);
				//die;
				$materailData = $this->Msk_model->getDepositMaterialData($battalionIds,$category,$itemNamesArray);
				
				$holdings = $this->calculatingDepositMaterialData($holdings, $materailData);
				//$holdings = $this->calculatingDepositMaterialData2($holdings, $materailData);
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['total_in_store']=$this->getTotalInStoreFrom($holdings[$bnId][$itemName]['holding'],$holdings[$bnId][$itemName]['issued']);
						
						$holdings[$bnId][$itemName]['serviceable']=$this->getServiceableFrom($holdings[$bnId][$itemName]['issued'], $holdings[$bnId][$itemName]['total_in_store'], $holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC'],$holdings[$bnId][$itemName]['serviceable3RecievedQuantityD']);
					}
				}
			}elseif($equipmentDataType=='unserviceable'){
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['issued']=0;
						$holdings[$bnId][$itemName]['holding']=0;
						$holdings[$bnId][$itemName]['total_in_store']=0;
						$holdings[$bnId][$itemName]['newmskconofitemC']=0;
						$holdings[$bnId][$itemName]['serviceable2RecievedQuantityC']=0;
						$holdings[$bnId][$itemName]['serviceable3RecievedQuantityD']=0;
						$holdings[$bnId][$itemName]['serviceable']=0;
						$holdings[$bnId][$itemName]['unserviceable']=0;
						
					}
				}
				$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
				foreach($issuedData as $k=>$item){
					$value = (is_numeric($item->issued))?$item->issued:0;
					$holdings[$item->bat_id][$item->name]['issued'] += $value;
				}
				$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
				$holdings = $this->calculatingHolding($holdings,$equipments);
				
				$materailData = $this->Msk_model->getDepositMaterialData($battalionIds,$category,$itemNamesArray);
				//echo '<HR>';
				//var_dump($holdings[8]['Tent 180 LBS']);
				$holdings = $this->calculatingDepositMaterialData($holdings, $materailData);
				//echo '<HR>';
				//var_dump($holdings[8]['Tent 180 LBS']);
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['total_in_store']=$this->getTotalInStoreFrom($holdings[$bnId][$itemName]['holding'],$holdings[$bnId][$itemName]['issued']);
						
						$holdings[$bnId][$itemName]['serviceable']=$this->getServiceableFrom($holdings[$bnId][$itemName]['issued'], $holdings[$bnId][$itemName]['total_in_store'], $holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC'],$holdings[$bnId][$itemName]['serviceable3RecievedQuantityD']);
						
						$holdings[$bnId][$itemName]['unserviceable']=$this->getUnserviceableFrom($holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC']);
						//echo $holdings[$bnId][$itemName]['unserviceable'];
					}
				}
			}elseif($equipmentDataType=='serviceable_in_store'){
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						$holdings[$bnId][$itemName]['issued']=0;
						$holdings[$bnId][$itemName]['holding']=0;
						$holdings[$bnId][$itemName]['total_in_store']=0;
						$holdings[$bnId][$itemName]['newmskconofitemC']=0;
						$holdings[$bnId][$itemName]['serviceable2RecievedQuantityC']=0;
						$holdings[$bnId][$itemName]['serviceable3RecievedQuantityD']=0;
						$holdings[$bnId][$itemName]['serviceable']=0;
						$holdings[$bnId][$itemName]['unserviceable']=0;
						$holdings[$bnId][$itemName]['serviceable_in_store']=0;
					}
				}
				$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$category,$itemNamesArray);
				foreach($issuedData as $k=>$item){
					$value = (is_numeric($item->issued))?$item->issued:0;
					$holdings[$item->bat_id][trim($item->name)]['issued'] += $value;
				}
				$equipments = $this->Msk_model->getNewMskItems($battalionIds,$category,$itemNamesArray);
				$holdings = $this->calculatingHolding($holdings,$equipments);
				
				$materailData = $this->Msk_model->getDepositMaterialData($battalionIds,$category,$itemNamesArray);
				$holdings = $this->calculatingDepositMaterialData($holdings, $materailData);
				//var_dump($holdings);
				foreach($battalionIds as $k=>$bnId){
					foreach($itemNamesArray as $k=>$itemName){
						
						$itemName = trim($itemName);
						if($itemName=='EPIP Tent D/F'){
							
						//echo $itemName.'<BR>';
						}	
						$holdings[$bnId][$itemName]['total_in_store']=$this->getTotalInStoreFrom($holdings[$bnId][$itemName]['holding'],$holdings[$bnId][$itemName]['issued']);
						
						$holdings[$bnId][$itemName]['serviceable']=$this->getServiceableFrom($holdings[$bnId][$itemName]['issued'], $holdings[$bnId][$itemName]['total_in_store'], $holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC'],$holdings[$bnId][$itemName]['serviceable3RecievedQuantityD']);
						
						//$holdings[$bnId][$itemName]['unserviceable']=$this->getUnserviceableFrom($holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC']);
						$holdings[$bnId][$itemName]['unserviceable']=$this->getUnserviceableFrom($holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC']);
						$holdings[$bnId][$itemName]['serviceable_in_store']=$this->getServiceableInStoreFrom($holdings[$bnId][trim($itemName)]['total_in_store'],$holdings[$bnId][trim($itemName)]['unserviceable']);
						
						$holdings[$bnId][$itemName]['serviceable_in_store']=$this->getServiceableInStoreFrom($holdings[$bnId][$itemName]['total_in_store'],$holdings[$bnId][$itemName]['unserviceable']);;
						
						/*if($itemName == 'EPIP Tent D/F'){
							
							echo 'ISSUE : ',$holdings[$bnId][$itemName]['issued'].',';
							echo 'TIS : ',$holdings[$bnId][$itemName]['total_in_store'].',';
							echo 'Holding : '.$holdings[$bnId][$itemName]['holding'].',';
							echo 'Serviceable : '.$holdings[$bnId][$itemName]['serviceable'].',';
							echo 'New msk con of C : '.$holdings[$bnId][$itemName]['newmskconofitemC'].',';
							echo 'Serviceable in store : '.$holdings[$bnId][$itemName]['serviceable_in_store'].',';
						} */
					}
				}
			}
			$skipZero = false;
			if(null!=$this->input->post('skipZeroEquipments')){
				$skipZero=true;
			}
				//var_dump($battalionIds);
			$data['grand_total'] = $grand_total;
			if($skipZero){
			$holdings = $this->trimEquipments($holdings,$battalionIds,$selectedItemNamesArray,$equipmentDataType);	
			$data['zeroSkippedItemNames'] = $holdings['trimmedEquipmentsName'];
			$data['holdings'] = $holdings['equipmentsData'];
			}else{
				$data['zeroSkippedItemNames'] = $selectedItemNamesArray;
				$data['holdings'] = $holdings;
			}
			
			return $data;
		}
		/**
		*	here we are removing those equipments whose quantity is zero in
		*	all battalions
		*/
		public function trimEquipments($holdings, $battalionIds, $selectedItemNamesArray,$equipmentDataType){
			//echo '<pre>';
			//var_dump($holdings);
			//die;
			$newTrimmedItemNamesArray = array();
			$new_holdings = array();
			$total_battalions = count($battalionIds);
		
			foreach($selectedItemNamesArray as $item_id=>$itemName){
				$battalion_count =0 ;
				foreach($battalionIds as $index=>$bat_id){
					if($holdings[$bat_id][$itemName][$equipmentDataType]==0){
						$battalion_count++;
					}
				}
				if($battalion_count < $total_battalions){ //not all zero
					foreach($battalionIds as $index=>$bat_id){
						$new_holdings[$bat_id][$itemName][$equipmentDataType]=
						$holdings[$bat_id][$itemName][$equipmentDataType];
						$new_holdings[$bat_id][$itemName]['issued']=
						$holdings[$bat_id][$itemName]['issued'];
						$new_holdings[$bat_id][$itemName]['holding']=
						$holdings[$bat_id][$itemName]['holding'];
						$new_holdings[$bat_id][$itemName]['unserviceable']=
						$holdings[$bat_id][$itemName]['unserviceable'];
						
					}
					$newTrimmedItemNamesArray[$item_id] = $itemName;
				}
			}
			
			//var_dump($newTrimmedItemNamesArray);
			return array('trimmedEquipmentsName'=>$newTrimmedItemNamesArray,'equipmentsData'=>$new_holdings);
			//return array('trimmedEquipmentsName'=>$selectedItemNamesArray,'equipmentsData'=>$holdings);
		}
		/**
		*	remove the unwanted battalions
		*/
		public function trimBattalions($battalions){
			$trimmedBattalions = array();
			if($this->session->userdata('userid')==209){		//irb
				$ids = array(191,166,155,114,109,161,122,214,203);
				foreach($battalions as $k=>$v){
					if(in_array($k,$ids)){
						$trimmedBattalions[$k]=$v;
					}
				}
				return $trimmedBattalions;
			}elseif($this->session->userdata('userid')==211){	//cdo
				$ids = array(101,173,143,149,179,197,215);
				foreach($battalions as $k=>$v){
					if(in_array($k,$ids)){
						$trimmedBattalions[$k]=$v;
					}
				}
				return $trimmedBattalions;
			}elseif($this->session->userdata('userid')==38){			//pap	all the battalion in case it is pap
				/* /* $this->db->where('user_log',5); */ 
				return $battalions;
			}else{
				return $battalions;		//no restriction
			}
		}
		/**
		*	Skipping the batalions which have zero Records
		*   skip the equipments which are zero in all battalions
		*/
		public function skipZeroValueEquipments($equipments,$skipZeroEquipments){
			$new_equipments = array();
			$keep_item = false;
			
			foreach($equipments as $eq_id=>$equipmentDetail){
				foreach($equipmentDetail as $bat_id=>$v){
					if($bat_id=='equipments_name'){
						$new_equipments[$eq_id][$bat_id]=$v;
					}else{
						if($v['sanction']>0 || $v['holding']>0 || $v['issued']>0 || $v['total_in_store']>0 || $v['serviceable']>0 || $v['unserviceable']>0 || $v['serviceable_in_store']>0 || $v['holding']>0){
							$new_equipments[$eq_id][$bat_id]=$v;
						}else{
							
						}
					}
				}
			}
			if($skipZeroEquipments){
				$equipments= array();
				$temp_eq = $new_equipments;
				foreach($new_equipments as $eq_id=>$equipmentDetail){
					if(isset($temp_eq[$eq_id]['equipments_name'])){
						unset($temp_eq[$eq_id]['equipments_name']);
					}
					if(!empty($temp_eq[$eq_id])){
						$equipments[$eq_id] = $equipmentDetail;
					}
				}
				return $equipments;
			}else{
				return $new_equipments;
			}
		}
		/**
		* if will load the consolidated data for battalion login
		*/
		public function loadAllFiguresOfMSKForBattalion($skipZeroEquipments=null){
			
			$typeOfItem = 'Security Equipment';
			$battalions = $this->getBattalions();
			$battalions = $this->sortBattalions($battalions);
			$data['battalions']  = $battalions;
			$typeofitems = $this->getTypeOfItems();
			$data['typeofitems'] = $typeofitems;
			
			$data['nameofitems'] = array();
			$battalionIds = array();
			foreach($battalions as $k=>$v){
				$battalionIds[] = $k;
			}
                        if($skipZeroEquipments===null){
                            $skipZeroEquipments = true;
                        }
                        //var_dump($skipZeroEquipments);
                        //die;
			if(null!=$this->input->post('search')){
				if(null!=$this->input->post('skipZeroEquipments')){
					$skipZeroEquipments = TRUE;
				}else{
					$skipZeroEquipments = FALSE;
				}
			}
                        
			$this->load->model('Msk_model');
			$search =$this->input->post('search'); 
			$download = $this->input->post('download');
			
			if(isset($search) || isset($download)){
				//remove the battalions as per the login (irb,cdo,pap)
				$typeOfItem = $this->input->post('namOfItemType'); 
				$itemNames = $this->input->post('itemNames');
                           //     var_dump($typeOfItem);
                                
				$equipments = $this->Msk_model->getEquipments($battalionIds, $typeOfItem, $itemNames);
			}else{
				$equipments = $this->Msk_model->getSecurityEquipments($battalionIds,$typeOfItem);
			}
                       // var_dump($typeOfItem);
                         // die;
                        $data['typeOfItem'] = $typeOfItem;
			$items	 = $this->getItemsByTypeName($typeOfItem);	//get all the items
			$data['nameofitems'] = $items;
			
			//----------------------------INITIALIZATION------------------------------------------------
			$data2 = $this->initializingEquipmentFigures2($equipments,$battalions);
			$nameOfItems = $data2['nameOfItems'];
			$equipmentsData = $data2['equipmentsData'];
			$grand_total = $data2['grand_total'];
			
			//------------------------ getting sanction ------------------
			/* $sanction = $this->Msk_model->getSanctionedValues($battalionIds,$nameOfItems);
			var_dump($sanction);
			foreach($sanction as $k=>$val){
				
				if(!isset($equipmentsData[$val->mskitems_id][$val->bat_id]['sanction'])){
					$equipmentsData[$val->mskitems_id][$val->bat_id]['sanction'] = 0;
				}
				$equipmentsData[$val->mskitems_id][$val->bat_id]['sanction'] += $val->san;
				if(!isset($equipmentsData[$val->mskitems_id][$val->bat_id]['equipments_name'])){
					$equipmentsData[$val->mskitems_id][$val->bat_id]['equipments_name'] = $val->name;
				}
			} */
			
			//----------------------------GETTING ISSUED VALUES-----------------------------------------
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$typeOfItem,$nameOfItems);//FLAG
			
			foreach($issuedData as $k=>$item){
				//echo $item->mskitems_id.' - '.$item->name.' - '.$item->item.' - '.$item->issued.' - '.$item->bat_id.' - <br>';
				$equipmentsData[$item->mskitems_id][$item->bat_id]['issued'] = 0+ ($item->issued==null?0:$item->issued);
				//$equipmentsData[$item->mskitems_id][$item->bat_id]['sanction'] += $item->san;
			}
                        
			$sanctionedItems = $this->Msk_model->getSanctionedValues($battalionIds,$typeOfItem,$nameOfItems);
			//var_dump($itemNamesArray);
			foreach($sanctionedItems as $k=>$item){
				$value = (is_numeric($item->san))?$item->san:0;
				//echo $item->bat_id.$item->name.','.$value.',';
				$equipmentsData[$item->mskitems_id][$item->bat_id]['sanction'] += $value;
			}
			//echo '<HR>';
			//var_dump($equipmetnsData);
			//--------------------------CALCULATING HOLDING DATA----------------------------------------
			$mskData = $this->Msk_model->getNewMskItems($battalionIds,$typeOfItem,$nameOfItems);
                            
			$equipmentsData = $this->calculatingHolding($equipmentsData,$mskData);
			
			//-------------------------GETTING DATA FROM DEPOSIt MATERIAL TABLE --------------------------
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$typeOfItem,$nameOfItems);
		
			$equipmentsData=$this->calculatingDepositMaterialData($equipmentsData, $materialData);
				
			//-----------------------------CALCULATING PARAMETERS----------------------------------------
			$datares = $this->calculateParameters2($equipmentsData,$grand_total);
			$data['equipments'] = $datares['equipmentDataCopy'];
			$data['grand_total'] = $datares['grand_total'];
			if($skipZeroEquipments){
				$data['equipments'] = $this->skipZeroValueEquipments($data['equipments'],TRUE);
			}
			
			
			return  $data;
			
			//$this->load->view('Msk/equipments.php',$data);
		}
		/**
		it will load the consolidated data for officers
		All Figures
		*/
		public function loadAllFiguresOfMSK(){
			$typeOfItem = 'Security Equipment';
			$battalions = $this->getBattalions();
			$battalions = $this->sortBattalions($battalions);
			$data['battalions']  = $battalions;
			$typeofitems = $this->getTypeOfItems();
			$data['typeofitems'] = $typeofitems;
			$data['typeOfItem'] = 'Security Equipment';
			
			$data['nameofitems'] = array();
			$battalionIds = array();
			foreach($battalions as $k=>$v){
				$battalionIds[] = $k;
			}
			$skipZeroBattalions = true;
                        $skipZeroEquipments = true;
                        if(null!=$this->input->post('search') || null!=$this->input->post('download')){
                            if(null!=$this->input->post('skipZeroBattalions')){
                                    $skipZeroBattalions = TRUE;
                            }else{
                                    $skipZeroBattalions = FALSE;
                            }
                            if(null!=$this->input->post('skipZeroEquipments')){
                                    $skipZeroEquipments = TRUE;
                            }else{
                                    $skipZeroEquipments = FALSE;
                            }
                        }
			$this->load->model('Msk_model');
			$search =$this->input->post('search'); 
			$download = $this->input->post('download');
			$searchBattalion = $this->input->post('search_battalion');
			if(isset($search) || isset($download)){
				//echo 'searching';
				$page = $this->input->get('pageType');
				//echo $page;
				if(!empty($this->input->post('battalionIds'))){
					$battalionIds = $this->input->post('battalionIds');
				};
				$battalions = $this->getBattalionsByIds($this->input->post('battalionIds'));
				$battalions = $this->sortBattalions($battalions);
				
				$battalions = $this->trimBattalions($battalions);	//remove the battalions as per the login (irb,cdo,pap)
				//var_dump($battalions);
				$typeOfItem = $this->input->post('namOfItemType');
				//echo $typeOfItem;
				$itemNames = $this->input->post('itemNames');
				//var_dump($itemNames);
				$equipments = $this->Msk_model->getEquipments($battalionIds,$typeOfItem,$itemNames);
			}else{
				$equipments = $this->Msk_model->getSecurityEquipments($battalionIds,$typeOfItem);

			}
			//var_dump($itemNames);
			$items	= $this->getItemsByTypeName($typeOfItem);	//get all the items
			$data['nameofitems'] = $items;
			//var_dump($data['nameofitems']);
			//----------------------------INITIALIZATION------------------------------------------------
			//echo '<pre>';
			//var_dump($equipments);
			$data2 = $this->initializingEquipmentFigures($equipments,$battalions);
			//var_dump($data2['equipmentsData']);
			//echo '<hr>';
			//echo '<PRE>';
			//var_dump($data2);
			//echo '</pre>';
			$nameOfItems = $data2['nameOfItems'];
			$equipmentsData = $data2['equipmentsData'];
			//echo '<pre>';
			//var_dump($equipmentsData);
			//----------------------------GETTING ISSUED VALUES-----------------------------------------
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$typeOfItem,$nameOfItems);
			foreach($issuedData as $k=>$item){
				//echo $item->mskitems_id.' - '.$item->name.' - '.$item->item.' - '.$item->issued.' - '.$item->bat_id.' - <br>';
				$equipmentsData[$item->mskitems_id][$item->bat_id]['issued'] += $item->issued;
				//$equipmentsData[$item->mskitems_id][$item->bat_id]['sanction'] += $item->san;
			}
			
			$sanctionedItems = $this->Msk_model->getSanctionedValues($battalionIds,$typeOfItem,$nameOfItems);
			//var_dump($itemNamesArray);
			foreach($sanctionedItems as $k=>$item){
				$value = (is_numeric($item->san))?$item->san:0;
				//echo $item->bat_id.$item->name.','.$value.',';
				$equipmentsData[$item->mskitems_id][$item->bat_id]['sanction'] += $value;
			}
				
			
			
			//echo '<HR>';
			//var_dump($equipmetnsData);
			//--------------------------CALCULATING HOLDING DATA----------------------------------------
			$mskData = $this->Msk_model->getNewMskItems($battalionIds,$typeOfItem,$nameOfItems);
			$equipmentsData = $this->calculatingHolding($equipmentsData,$mskData);
			
			//-------------------------GETTING DATA FROM DEPOSIt MATERIAL TABLE --------------------------
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$typeOfItem,$nameOfItems);
		
			$equipmentsData=$this->calculatingDepositMaterialData($equipmentsData, $materialData);
				
			//-----------------------------CALCULATING PARAMETERS----------------------------------------
			$data['equipments'] = $this->calculateParameters($equipmentsData);
			if($skipZeroBattalions){
				$data['equipments'] = $this->skipZeroValueEquipments($data['equipments'],$skipZeroEquipments);
			}
			/*$holdings = $equipmentsData;
			foreach($battalionIds as $k=>$bnId){
					foreach($nameOfItems as $k=>$itemName){
						$holdings[$bnId][$itemName]['total_in_store']=$this->getTotalInStoreFrom($holdings[$bnId][$itemName]['holding'],$holdings[$bnId][$itemName]['issued']);
						
						$holdings[$bnId][$itemName]['serviceable']=$this->getServiceableFrom($holdings[$bnId][$itemName]['issued'], $holdings[$bnId][$itemName]['total_in_store'], $holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC'],$holdings[$bnId][$itemName]['serviceable3RecievedQuantityD']);
						
						$holdings[$bnId][$itemName]['unserviceable']=$this->getUnserviceableFrom($holdings[$bnId][$itemName]['newmskconofitemC'], $holdings[$bnId][$itemName]['serviceable2RecievedQuantityC']);
						//echo $holdings[$bnId][$itemName]['unserviceable'];
					}
				}
				$data['equipments'] = $holdings;*/
			//var_dump($data);
			//die('helo');
			return  $data;
			
			//$this->load->view('Msk/equipments.php',$data);
		}
		/**
		*	Simply initializing the equipmentsData array i.e. assigning 0 to all the parameters of equipments
		*   input - passing equipments (fetched from database), $battalions , name_of_items
		*   returning equipments data having parameters initialized to 0
		*   here we are also fetching name of items and assigning those to nameofItems array and simply returning that array in data array
		*/
		public function initializingEquipmentFigures($equipments,$battalions){
			
			$equipmentsData =  array();
			$nameOfItems = array();
			foreach($equipments as $k=>$equipment){
				$nameOfItems[]=$equipment->name;
				$equipmentsData[$equipment->mskitems_id]['equipments_name'] = $equipment->name;
				foreach($battalions as $bat_id=>$bn_name){
					$equipmentsData[$equipment->mskitems_id][$bat_id] = array(
																		'bat_name'=>$bn_name,
																		'sanction'=>0,
																		'holding'=>0,
																		'issued' =>0,
																		'total_in_store'=>0,
																		'serviceable'=>0,
																		'unserviceable'=>0,
																		'serviceable_in_store'=>0,
																		'serviceable1RecievedQuantity'=>0,//newmsk
																		'newmskconofitemC'=>0,
																		'serviceable2RecievedQuantityC'=>0, //deposit_material
																		'serviceable3RecievedQuantityD'=>0, //deposit_material
																		'auction'=>0,
																		'equipmentCanBeIssued'=>0			//equipments quantity which can be issued
																	);
				}
			}

			return array('nameOfItems'=>$nameOfItems,'equipmentsData'=>$equipmentsData);
		}
		/**
		*	Simply initializing the equipmentsData array i.e. assigning 0 to all the parameters of equipments
		*   input - passing equipments (fetched from database), $battalions , name_of_items
		*   returning equipments data having parameters initialized to 0
		*   here we are also fetching name of items and assigning those to nameofItems array and simply returning that array in data array
		*/
		public function initializingEquipmentFigures2($equipments,$battalions){
			//var_dump($battalions);
			$equipmentsData =  array();
			$nameOfItems = array();
			foreach($equipments as $k=>$equipment){
				$nameOfItems[]=$equipment->name;
				$equipmentsData[$equipment->mskitems_id]['equipments_name'] = $equipment->name;
				foreach($battalions as $bat_id=>$bn_name){
					$equipmentsData[$equipment->mskitems_id][$bat_id] = array(
																		'bat_name'=>$bn_name,
																		'sanction'=>0,
																		'holding'=>0,
																		'issued' =>0,
																		'total_in_store'=>0,
																		'serviceable'=>0,
																		'unserviceable'=>0,
																		'serviceable_in_store'=>0,
																		'serviceable1RecievedQuantity'=>0,//newmsk
																		'newmskconofitemC'=>0,
																		'serviceable2RecievedQuantityC'=>0, //deposit_material
																		'serviceable3RecievedQuantityD'=>0, //deposit_material
																		'auction'=>0,
																		'equipmentCanBeIssued'=>0			//equipments quantity which can be issued
																	);
				}
			}
			$grand_total = array(
										'sanction'=>0,
										'holding'=>0,
										'issued' =>0,
										'total_in_store'=>0,
										'serviceable'=>0,
										'unserviceable'=>0,
										'serviceable_in_store'=>0,
										
									);;
			return array('nameOfItems'=>$nameOfItems,'equipmentsData'=>$equipmentsData,'grand_total'=>$grand_total);
		}
		/**
		*	INput is initialized to 0 equipmentData array & data fetched from newmsk table as $mskData
		*	This will calculate the holding value and return equipmentData
		*	This function is calculating and simply populating/updating the holding value in equipmentData array
		* 	Here we also calculating the auction value
		*/
		public function calculatingHolding($equipmentsData,$mskData){
			//$j = 0;
			foreach($mskData as $k=>$equipment){
				//var_dump($equipment);
				$acondition = 0;
				$bcondition = 0;
				$ccondition = 0;
				if($equipment->conofitem=='A'){
					
					$acondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='B'){
					
					$bcondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='C'){
					//echo 'C';
					
					$ccondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
					if(isset($equipmentsData[$equipment->mskitems_id]) && isset($equipmentsData[$equipment->mskitems_id][$equipment->bat_id])){
						//echo 'C';
						$equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['newmskconofitemC'] += $ccondition;
						
						;
					}elseif(isset($equipmentsData[$equipment->bat_id][trim($equipment->name)]['newmskconofitemC'])){
						
						$equipmentsData[$equipment->bat_id][trim($equipment->name)]['newmskconofitemC'] += $ccondition;
						;
					}
					
				}
				//echo '"<b>'.$equipmentsData[8]['Tent 180 LBS']['newmskconofitemC'].'</b>"';
				if($equipment->conofitem=='D'){
					$dcondition = (is_numeric($equipment->recqut))?0:$equipment->recqut;
					if(isset($equipmentsData[$equipment->mskitems_id])&&isset($equipmentsData[$equipment->mskitems_id][$equipment->bat_id])){
						$equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['auction'] += $dcondition;
					}
				}
				//echo $equipment->mskitems_id;
				
				/*if(isset($equipment->mskitems_id)){
					echo '<h5>Preet.'.$equipment->mskitems_id.'</h5>';
				}*/
				//var_dumP($equipment);
				//die;
				if(isset($equipmentsData[$equipment->mskitems_id])){
					
					//echo 'hi';
					//die;
					/*if(!isset($equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['holding'])){
						echo "MSK ITEM ID  : ".$equipment->mskitems_id.'<BR>';
						echo "BATTALION ID : ".$equipment->bat_id.'<BR>';
						
					}*/
					if(isset($equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['holding'])){
						//echo 'iii';
						$equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['holding'] = $equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['holding'] + $acondition + $bcondition + $ccondition;
					}ELSE{
						if(isset($equipmentsData[$equipment->bat_id][trim($equipment->nameofitem)]['holding'])){
							//echo 'hHH';
							$equipmentsData[$equipment->bat_id][trim($equipment->nameofitem)]['holding'] += $this->getHoldingFrom($acondition,$bcondition,$ccondition);
						}	
						//$equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['holding']=0;
					}
					//total in store can't be calculated over here
					//$equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['total_in_store'] = $equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['holding'] - $equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['issued'];
					//break;
					//serviceable
					if(isset($equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['serviceable1RecievedQuantity'])){
						$equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['serviceable1RecievedQuantity'] += $ccondition;
					}
					//echo '<hr>';
					//die;
					//$equipmentsData[$equipment->mskitems_id][$equipment->bat_id]['serviceable2RecievedQuantity'] += $ccondition; //this is from depositmateriall
				}elseif(isset($equipmentsData[$equipment->bat_id][trim($equipment->nameofitem)]['holding'])){
					//echo 'hHH';
					$equipmentsData[$equipment->bat_id][trim($equipment->nameofitem)]['holding'] += $this->getHoldingFrom($acondition,$bcondition,$ccondition);
				}	
			}
			//echo "<b>$j</b>";
			//echo '"<b>'.$equipmentsData[8]['Tent 180 LBS']['newmskconofitemC'].'</b>"';
			return $equipmentsData;
		}
		/**
		*	here we are calculating  holding value for PAP,IRb and CDO
		*	in calculatingHolding function we calculate for particular battalions like 1st cdo 7 pap etc
		*	here for units
		*/
		public function calculatingHoldingForUnits($equipmentsData,$mskData,$unitsDetail){
			
			foreach($mskData as $k=>$equipment){
				
				//var_dump($equipment);
				$acondition = 0;
				$bcondition = 0;
				$ccondition = 0;
				$unit_ = $this->getUnit($equipment->bat_id,$unitsDetail);
				
				if($equipment->conofitem=='A'){
					$acondition = ($equipment->recqut==''||!(is_numeric($equipment->recqut)))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='B'){
					$bcondition = ($equipment->recqut==''||!(is_numeric($equipment->recqut)))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='C'){
					//if(isset($equipmentsData[$equipment->mskitems_id])){
						
					//}
					$ccondition = ($equipment->recqut==''||!(is_numeric($equipment->recqut)))?0:$equipment->recqut;
					$equipmentsData[$unit_][trim($equipment->nameofitem)]['newmskconofitemC'] += $ccondition;
				}
				if(isset($equipmentsData[$unit_][trim($equipment->nameofitem)]['holding'])){
					$unit_ = $this->getUnit($equipment->bat_id,$unitsDetail);
					$equipmentsData[$unit_][trim($equipment->nameofitem)]['holding'] += $this->getHoldingFrom($acondition,$bcondition,$ccondition);
				}
			}
			return $equipmentsData;
		}
		/***
		*	calculating serviceable2RecievedQuantityC and serviceable3RecievedQuantityD
		* 	input is equipment array and $material_data (having info regarding above two parameters quantity column)
		*	return populate the equipmentsData array with serviceable2RecievedQuantityC and D type quantity 
		* unitsDetail is a variable containing names of units and units further containing battalions
		*/
		public function calculatingDepositMaterialDataFromUnits($equipmentsData, $materialData,$unitsDetail){
			foreach($materialData as $k=>$material){
				$unit_ = $this->getUnit($material->bat_id,$unitsDetail);
				//var_dump($unit_);
				
				
				if($unit_!=NULL || $unit_!=0){
					
					if($material->condition_of_item=='C' && !isset($equipmentsData[$material->mskitems_id])){
						$equipmentsData[$unit_][trim($material->nameofitem)]['newmskconofitemC'] += $material->quantity;
						//echo 'hi';	//$equipmentsData[$material->mskitems_id][$material->bat_id]['serviceable2RecievedQuantityC'] +=  $material->quantity;
					} 
					
					
					if($material->condition_of_item=='C'&&isset($equipmentsData[$material->mskitems_id])){
						$equipmentsData[$material->mskitems_id][$material->bat_id]['serviceable2RecievedQuantityC'] +=  $material->quantity;
						$equipmentsData[$material->mskitems_id][$material->bat_id]['newmskconofitemC'] +=  $material->quantity;
					}
					if($material->condition_of_item=='D'&&isset($equipmentsData[$material->mskitems_id]) && $material->bat_id!=0){
						$equipmentsData[$material->mskitems_id][$material->bat_id]['serviceable3RecievedQuantityD'] +=  $material->quantity;
					}
				}
			}
			return $equipmentsData; 
		}
		/***
		*	calculating serviceable2RecievedQuantityC and serviceable3RecievedQuantityD
		* 	input is equipment array and $material_data (having info regarding above two parameters quantity column)
		*	return populate the equipmentsData array with serviceable2RecievedQuantityC and D type quantity 
		*/
		public function calculatingDepositMaterialData($equipmentsData, $materialData){
			
			foreach($materialData as $k=>$material){
				//$countC
				if($material->condition_of_item=='C' && !isset($equipmentsData[$material->mskitems_id])){
					//echo $material->nameofitem;
					//$equipmentsData[$material->bat_id]["Tent 180 LBS"]["newmskconofitemC"]=57;
					$equipmentsData[$material->bat_id][trim($material->nameofitem)]['newmskconofitemC'] += $material->quantity;
					//echo 'hi';
					
//$equipmentsData[$material->mskitems_id][$material->bat_id]['serviceable2RecievedQuantityC'] +=  $material->quantity;
				} 
				if($material->condition_of_item=='C'&&isset($equipmentsData[$material->mskitems_id])){
					$equipmentsData[$material->mskitems_id][$material->bat_id]['serviceable2RecievedQuantityC'] +=  $material->quantity;
					//$equipmentsData[$material->mskitems_id][$material->bat_id]['newmskconofitemC'] +=  $material->quantity;
					
				}
				if($material->condition_of_item=='D'&&isset($equipmentsData[ $material->mskitems_id]) && $material->bat_id!=0){
					$equipmentsData[$material->mskitems_id][$material->bat_id]['serviceable3RecievedQuantityD'] +=  $material->quantity;
				}
			}
			
			return $equipmentsData; 
		}

		/**
		*	Here we are calculating
		*	total in store = holding - issued
		*	calculating serviceable by adding (issued + total_in_store) - (newmskconofitemC + serviceable2RecievedQuantityC)-serviceable3RecievedQuantityD;
		*	unserviceable = newmskconofitemC+serviceable2RecievedQuantityC
		*	serviceable_in_store = total_in_store-unserviceable
		*/
		public function calculateParameters($equipmentDataCopy){
			//error_reporting(0);
			foreach($equipmentDataCopy as $itemID=>$equipments2){
				foreach($equipments2 as $bn_id=>$parameters){
					if($bn_id!='equipments_name'){
						//var_dump($equipmentDataCopy[$itemID][$bn_id]);
						//$equipmentDataCopy[$itemID][$bn_id]['total_in_store']=$equipmentDataCopy[$itemID][$bn_id]['holding']-$equipmentDataCopy[$itemID][$bn_id]['issued'];
						$issued = is_numeric($equipmentDataCopy[$itemID][$bn_id]['issued'])?$equipmentDataCopy[$itemID][$bn_id]['issued']:0;
						$holding = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['holding']))?$equipmentDataCopy[$itemID][$bn_id]['holding']:0;
						$total_in_store = $equipmentDataCopy[$itemID][$bn_id]['total_in_store']= $this->getTotalInStoreFrom($holding,$issued);
						
						$newmskconofitemC = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['newmskconofitemC']))?$equipmentDataCopy[$itemID][$bn_id]['newmskconofitemC']:0;
						$serviceable2RecievedQuantityC = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['serviceable2RecievedQuantityC']))?$equipmentDataCopy[$itemID][$bn_id]['serviceable2RecievedQuantityC']:0;
						$serviceable3RecievedQuantityD = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['serviceable3RecievedQuantityD']))?$equipmentDataCopy[$itemID][$bn_id]['serviceable3RecievedQuantityD']:0;
						
						$serviceable = $equipmentDataCopy[$itemID][$bn_id]['serviceable'] = $this->getServiceableFrom($issued,$total_in_store,$newmskconofitemC, $serviceable2RecievedQuantityC,$serviceable3RecievedQuantityD);
						
						$unserviceable = $equipmentDataCopy[$itemID][$bn_id]['unserviceable'] = $this->getUnserviceableFrom($newmskconofitemC, $serviceable2RecievedQuantityC);
						
						$serviceInStore = $equipmentDataCopy[$itemID][$bn_id]['serviceable_in_store'] = $this->getServiceableInStoreFrom($total_in_store, $unserviceable);
						
						$equipmentCanBeIssued = $equipmentDataCopy[$itemID][$bn_id]['equipmentCanBeIssued'] = $holding - $newmskconofitemC;
						//var_dump($parameters);
						//die;
					}
				}
				
			}
			 return $equipmentDataCopy;
		}
		/**
		*	Here we are calculating
		*	total in store = holding - issued
		*	calculating serviceable by adding (issued + total_in_store) - (newmskconofitemC + serviceable2RecievedQuantityC)-serviceable3RecievedQuantityD;
		*	unserviceable = newmskconofitemC+serviceable2RecievedQuantityC
		*	serviceable_in_store = total_in_store-unserviceable
		*/
		public function calculateParameters2($equipmentDataCopy, $grand_total){
			//error_reporting(0);
			foreach($equipmentDataCopy as $itemID=>$equipments2){
				foreach($equipments2 as $bn_id=>$parameters){
					if($bn_id!='equipments_name'){
						//var_dump($equipmentDataCopy[$itemID][$bn_id]);
						//$equipmentDataCopy[$itemID][$bn_id]['total_in_store']=$equipmentDataCopy[$itemID][$bn_id]['holding']-$equipmentDataCopy[$itemID][$bn_id]['issued'];
						
						
						$issued = is_numeric($equipmentDataCopy[$itemID][$bn_id]['issued'])?$equipmentDataCopy[$itemID][$bn_id]['issued']:0;
						$sanction = is_numeric($equipmentDataCopy[$itemID][$bn_id]['sanction'])?$equipmentDataCopy[$itemID][$bn_id]['sanction']:0;
						
						$grand_total['sanction'] +=$sanction;
						$grand_total['issued'] +=$issued;
						$holding = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['holding']))?$equipmentDataCopy[$itemID][$bn_id]['holding']:0;
						$grand_total['holding'] +=$holding;
						$total_in_store = $equipmentDataCopy[$itemID][$bn_id]['total_in_store']= $this->getTotalInStoreFrom($holding,$issued);						
						$grand_total['total_in_store'] += $total_in_store;
						
						$newmskconofitemC = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['newmskconofitemC']))?$equipmentDataCopy[$itemID][$bn_id]['newmskconofitemC']:0;
						$serviceable2RecievedQuantityC = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['serviceable2RecievedQuantityC']))?$equipmentDataCopy[$itemID][$bn_id]['serviceable2RecievedQuantityC']:0;
						$serviceable3RecievedQuantityD = (is_numeric($equipmentDataCopy[$itemID][$bn_id]['serviceable3RecievedQuantityD']))?$equipmentDataCopy[$itemID][$bn_id]['serviceable3RecievedQuantityD']:0;
						
						$serviceable = $equipmentDataCopy[$itemID][$bn_id]['serviceable'] = $this->getServiceableFrom($issued,$total_in_store,$newmskconofitemC, $serviceable2RecievedQuantityC,$serviceable3RecievedQuantityD);
						$grand_total['serviceable'] += $serviceable;
						
						$unserviceable = $equipmentDataCopy[$itemID][$bn_id]['unserviceable'] = $this->getUnserviceableFrom($newmskconofitemC, $serviceable2RecievedQuantityC);
						$grand_total['unserviceable'] += $unserviceable;
						
						$serviceInStore = $equipmentDataCopy[$itemID][$bn_id]['serviceable_in_store'] = $this->getServiceableInStoreFrom($total_in_store, $unserviceable);
						$grand_total['serviceable_in_store']+=$serviceInStore;
						
						$equipmentCanBeIssued = $equipmentDataCopy[$itemID][$bn_id]['equipmentCanBeIssued'] = $holding - $newmskconofitemC;
						//var_dump($parameters);
						//die;
					}
				}
				
			}
			 return array('equipmentDataCopy'=>$equipmentDataCopy,'grand_total'=>$grand_total);
		}
		
		/**
		*	This is same the only difference is that we are making calculations for unit PAP irb cdo etc instead for battalioins
		*	Here we are calculating
		*	total in store = holding - issued
		*	calculating serviceable by adding (issued + total_in_store) - (newmskconofitemC + serviceable2RecievedQuantityC)-serviceable3RecievedQuantityD;
		*	unserviceable = newmskconofitemC+serviceable2RecievedQuantityC
		*	serviceable_in_store = total_in_store-unserviceable
		*/
		public function calculateParametersFromUnits($equipmentDataCopy){
			foreach($equipmentDataCopy as $unit=>$data){
				foreach($data as $itemName=>$v){
					$issued = is_numeric($equipmentDataCopy[$unit][$itemName]['issued'])?$equipmentDataCopy[$unit][$itemName]['issued']:0;
					$holding = (is_numeric($equipmentDataCopy[$unit][$itemName]['holding']))?$equipmentDataCopy[$unit][$itemName]['holding']:0;
					$total_in_store = $equipmentDataCopy[$unit][$itemName]['total_in_store']= $this->getTotalInStoreFrom($holding,$issued);
					
					$newmskconofitemC = (is_numeric($equipmentDataCopy[$unit][$itemName]['newmskconofitemC']))?$equipmentDataCopy[$unit][$itemName]['newmskconofitemC']:0;
					$serviceable2RecievedQuantityC = (is_numeric($equipmentDataCopy[$unit][$itemName]['serviceable2RecievedQuantityC']))?$equipmentDataCopy[$unit][$itemName]['serviceable2RecievedQuantityC']:0;
					$serviceable3RecievedQuantityD = (is_numeric($equipmentDataCopy[$unit][$itemName]['serviceable3RecievedQuantityD']))?$equipmentDataCopy[$unit][$itemName]['serviceable3RecievedQuantityD']:0;
					
					$serviceable = $equipmentDataCopy[$unit][$itemName]['serviceable'] = $this->getServiceableFrom($issued,$total_in_store,$newmskconofitemC, $serviceable2RecievedQuantityC,$serviceable3RecievedQuantityD);
					
					$unserviceable = $equipmentDataCopy[$unit][$itemName]['unserviceable'] = $this->getUnserviceableFrom($newmskconofitemC, $serviceable2RecievedQuantityC);
					
					$serviceInStore = $equipmentDataCopy[$unit][$itemName]['serviceable_in_store'] = $this->getServiceableInStoreFrom($total_in_store, $unserviceable);
					
					$equipmentCanBeIssued = $equipmentDataCopy[$unit][$itemName]['equipmentCanBeIssued'] = $holding - $newmskconofitemC;
				}
			}
			return $equipmentDataCopy;
		}
		
		
		
		public function getFigureViewData(){
			$data = array();
			return $data;
		}
		
		public function getBattalions(){
			$this->load->model('Msk_model');
			$battalion_objects = $this->Msk_model->getBattalions();
			$battalion_array = array();
			foreach($battalion_objects as $bat){
				$battalion_array[$bat->users_id] = $bat->user_name;
			}
			return $battalion_array;
		}
		public function getBattalionsByIds($bat_ids){
			$this->load->model('Msk_model');
			$battalion_objects = $this->Msk_model->getBattalionsByIds($bat_ids);
			$battalion_array = array();
			foreach($battalion_objects as $bat){
				$battalion_array[$bat->users_id] = $bat->user_name;
			}
			return $battalion_array;
		}
		public function getTypeOfEquipments($bat_ids){
			$battalionIds = array();
			
			echo json_encode($data);
			die;
		}
		/**
		*
		*/
		public function getHoldingFrom($a,$b,$c){
			return $a+$b+$c;
		}
		/**
		* calaculating values Formulas\
		*	calculating unserviceable
		*/
		public function getUnserviceableFrom($newmskconofitemC,$serviceable2RecievedQuantityC){
			return $newmskconofitemC+ $serviceable2RecievedQuantityC;
		}
		/**
		*	calculating total in store 
		*/
		public function getTotalInStoreFrom($holding,$issued){
			return ($holding- $issued);
		}
		/***
		*	calculating serviceable in store 
		*/
		public function getServiceableInStoreFrom($total_in_store,$unserviceable_in_store){
			return $total_in_store-$unserviceable_in_store;
		}
		/***
		*	here we are calculating serviceable equipments
		*/
		public function getServiceableFrom($issued,$total_in_store,$newmskconofitemC, $serviceable2RecievedQuantityC,$serviceable3RecievedQuantityD){
			return ($issued+$total_in_store)-($newmskconofitemC+$serviceable2RecievedQuantityC);//-$serviceable3RecievedQuantityD;
		}
		/**
		*	Download the complete data of battalion i.e. all the categories and their equipments 
		* skip zero is optional
		*/
		public function completeDownloadFiguresOfBattalion(){
			error_reporting(0);
			$battalion_id = $this->session->userdata('userid');
			$categoriesItems = $this->Msk_model->getAllMSKItems();
			
			
			$wholeData = array();
			$grand_total = array();
			//inititalization
			foreach($categoriesItems as $k=>$v){
				
				$wholeData[$v->item][$v->name]= array(
					'sanction'=>0,
					'holding'=>0,
					'issued' =>0,
					'total_in_store'=>0,
					'serviceable'=>0,
					'unserviceable'=>0,
					'serviceable_in_store'=>0,
					'serviceable1RecievedQuantity'=>0,//newmsk
					'newmskconofitemC'=>0,
					'serviceable2RecievedQuantityC'=>0, //deposit_material
					'serviceable3RecievedQuantityD'=>0, //deposit_material
					'auction'=>0,
					'equipmentCanBeIssued'=>0			//equipments quantity which can be issued
				);
				$grand_total[$v->item] = array(
					'holding'=>0,
					'issued'=>0,
					'total_in_store'=>0,
					'serviceable'=>0,
					'unserviceable'=>0,
					'serviceable_in_store'=>0
				);
			}
			
			
			$wholeIssuedData = $this->Msk_model->getWholeIssuedDataOfBattalion($battalion_id);
			foreach($wholeIssuedData as $k=>$issued)
			{
				$wholeData[$issued->item][$issued->name]['issued'] = 0+$issued->issued;
				$grand_total[$issued->item]['issued']+= $issued->issued;
			}
			
			$wholeHoldingData = $this->Msk_model->getWholeHoldingDataOfBattalion($battalion_id);
			foreach($wholeHoldingData as $k=>$holdingData){
				$a = 0; $b=0;$c= 0;$d=0;
				if($holdingData->conofitem=='A'){
					$a = ($holdingData->recqut==''||!is_numeric($holdingData->recqut))?0:$holdingData->recqut;
				}
				if($holdingData->conofitem=='B'){
					
					$b = ($holdingData->recqut==''||!is_numeric($holdingData->recqut))?0:$holdingData->recqut;
				}
				if($holdingData->conofitem=='C'){
					
					$c = ($holdingData->recqut==''||!is_numeric($holdingData->recqut))?0:$holdingData->recqut;
					$wholeData[$holdingData->typeofitem][$holdingData->nameofitem]['newmskconofitemC'] += $c;
				}
				if($holdingData->conofitem=='D'){
					$d = (is_numeric($wholeData->recqut))?0:$wholeData->recqut;
					$wholeData[$holdingData->typeofItem][$wholeData->nameofitem]['auction'] += $d;
				}
				$wholeData[$holdingData->typeofitem][$holdingData->nameofitem]['holding'] += $this->getHoldingFrom($a,$b,$c);
			}
			//calculate the data of deposit material
			
			$wholeDepositData = $this->Msk_model->getWholeDepositMaterialData($battalion_id);
			//now we will calclate the serviceable2RecievedQuantityC, serviceable3RecievedQuantityD
			foreach($wholeDepositData as $k=>$material){
				if($material->condition_of_item=='C'){
					$wholeData[$material->typeofitem][$material->nameofitem]['serviceable2RecievedQuantityC'] +=  $material->quantity;
				}
				if($material->condition_of_item=='D'){
					$wholeData[$material->typeofitem][$material->nameofitem]['serviceable3RecievedQuantityD'] +=  $material->quantity;
				}
			}
			//	var_dump($wholeData);
			//calculating other parameters of the items/equipments
			$_categories=array();
			foreach($wholeData as $categoryName=>$items){
				$_categories[] = $categoryName;
                                $_item_names = [];
				foreach($items as $itemName=>$parameters){
                                    
					$issued = is_numeric($wholeData[$categoryName][$itemName]['issued'])?$wholeData[$categoryName][$itemName]['issued']:0;
					//$grand_total[$categoryName]['issued'] += $issued;
					$holding = (is_numeric($wholeData[$categoryName][$itemName]['holding']))?$wholeData[$categoryName][$itemName]['holding']:0;
					$grand_total[$categoryName]['holding'] += $holding;
					
					$total_in_store = $wholeData[$categoryName][$itemName]['total_in_store']=$wholeData[$categoryName][$itemName]['holding']-$wholeData[$categoryName][$itemName]['issued'];
					
					//$total_in_store = $wholeData[$categoryName][$itemName]['total_in_store']= $this->getTotalInStoreFrom($holding,$issued);
					
					$grand_total[$categoryName]['total_in_store'] += $total_in_store;
						
					$newmskconofitemC = (is_numeric($wholeData[$categoryName][$itemName]['newmskconofitemC']))?$wholeData[$categoryName][$itemName]['newmskconofitemC']:0;
					$serviceable2RecievedQuantityC = (is_numeric($wholeData[$categoryName][$itemName]['serviceable2RecievedQuantityC']))?$wholeData[$categoryName][$itemName]['serviceable2RecievedQuantityC']:0;
					$serviceable3RecievedQuantityD = (is_numeric($wholeData[$categoryName][$itemName]['serviceable3RecievedQuantityD']))?$wholeData[$categoryName][$itemName]['serviceable3RecievedQuantityD']:0;
					
					$serviceable = $wholeData[$categoryName][$itemName]['serviceable'] =  $this->getServiceableFrom($issued,$total_in_store,$newmskconofitemC, $serviceable2RecievedQuantityC,$serviceable3RecievedQuantityD);
					$grand_total[$categoryName]['serviceable'] +=$serviceable;
					
					$unserviceable = $wholeData[$categoryName][$itemName]['unserviceable'] = $this->getUnserviceableFrom($newmskconofitemC, $serviceable2RecievedQuantityC);
					$grand_total[$categoryName]['unserviceable'] +=$unserviceable;
					
					$serviceInStore = $wholeData[$categoryName][$itemName]['serviceable_in_store'] = $this->getServiceableInStoreFrom($total_in_store, $unserviceable);
					$grand_total[$categoryName]['serviceable_in_store'] +=$serviceInStore;
					
					$equipmentCanBeIssued = $wholeData[$categoryName][$itemName]['equipmentCanBeIssued'] = $holding - $newmskconofitemC;
				}
                                ksort($wholeData[$categoryName]);
                               
			}
			sort($_categories);
			
			$sorted_whole_data = array();
			foreach($_categories as $k=>$v){
				$sorted_whole_data[$v] = $wholeData[$v];
			}
			
			if(null!=$this->input->post('skipZeroEquipments')){
				$sorted_whole_data = $this->skipZeroValueEquipmentsInBattalion($sorted_whole_data);
			}
			$this->createExcelFile($sorted_whole_data,$grand_total);
		}
		public function skipZeroValueEquipmentsInBattalion($wholeData){
			$zeroSkippedData = array();
			foreach($wholeData as $categoryName=>$items){
				foreach($items as $itemName=>$parameters){
					if($wholeData[$categoryName][$itemName]['holding']!=0 || $wholeData[$categoryName][$itemName]['issued']!=0 || $wholeData[$categoryName][$itemName]['total_in_store']!=0 || $wholeData[$categoryName][$itemName]['serviceable']!=0 || $wholeData[$categoryName][$itemName]['unserviceable']!=0 || $wholeData[$categoryName][$itemName]['serviceable_in_store']!=0){
						$zeroSkippedData[$categoryName][$itemName]['holding'] = $wholeData[$categoryName][$itemName]['holding'];
						$zeroSkippedData[$categoryName][$itemName]['issued'] = $wholeData[$categoryName][$itemName]['issued'];
						$zeroSkippedData[$categoryName][$itemName]['total_in_store'] = $wholeData[$categoryName][$itemName]['total_in_store'];
						$zeroSkippedData[$categoryName][$itemName]['serviceable'] = $wholeData[$categoryName][$itemName]['serviceable'];
						$zeroSkippedData[$categoryName][$itemName]['unserviceable'] = $wholeData[$categoryName][$itemName]['unserviceable'];
						$zeroSkippedData[$categoryName][$itemName]['serviceable_in_store'] = $wholeData[$categoryName][$itemName]['serviceable_in_store'];
					}
				}
			}
			return $zeroSkippedData;
		}
		public function createExcelFile($wholeData,$grand_total){
			error_reporting(0);
			//$data['equipmentsData'] = $this->loadAllFiguresOfMSKForBattalion();
			
			
			$battalionName = $this->getBattalionNameById($this->session->userdata('userid'));
			//$data['equipmentsData'] = $this->loadAllFiguresOfMSK();
			
			//$battalions = $data['equipmentsData']['battalions'];
			//var_dump($battalions);
			//$data['typeofitems'] = $data['equipmentsData']['typeofitems'];
			//$data['nameofitems'] = $data['equipmentsData']['nameofitems'];
			//$data['typeOfItem'] = $data['equipmentsData']['typeOfItem'];
			//$equipments= $data['equipmentsData']['equipments'];
			
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Equipments Detail, Generated by ERMS-PAP.")
										 ->setKeywords("Equipments Excel PAP ERMS")
										 ->setCategory("Equipment Detail of Battalion");
			$counti= 0;
			//var_dump($data);
			//$columns = $data['columns'];
			//var_dump($columns);
			//$weaponsNames = $data['weaponNames'];
			//var_dump($weaponsNames);
			//$battalionObjects = $data['battalionObjects'];

			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle(' Figures'); 
			
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
					/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
				));
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', ' Figures of '.$battalionName.' Battalion');//.$battalionName);
			
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:H1");
			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
				$cols = ['A','B','C','D','E','F','G','H'];
			foreach($wholeData as $categoryName=>$items){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, "\"".$categoryName."\""	);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->applyFromArray($titleStyle);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":H".$row);
				
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Equipment Name');
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Holding');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'Issued');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, "Total in store\n(Serv/Unserv)");
                                $objPHPExcel->getActiveSheet()->getStyle('E'.$row)->getAlignment()->setWrapText(true);

				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, 'Serviceable');
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, 'Unserviceable');
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, "Available\nServ in Store");
                                $objPHPExcel->getActiveSheet()->getStyle('H'.$row)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				$row++;
				$counter=0;
				foreach($items as $itemName=>$parameters){
					$counter++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $itemName);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $parameters['holding']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $parameters['issued']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row,$parameters['total_in_store']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $parameters['serviceable']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $parameters['unserviceable']);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $parameters['serviceable_in_store']);


					$row++;
				}
				
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Total');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $grand_total[$categoryName]['holding']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $grand_total[$categoryName]['issued']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row,$grand_total[$categoryName]['total_in_store']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $grand_total[$categoryName]['serviceable']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $grand_total[$categoryName]['unserviceable']);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $grand_total[$categoryName]['serviceable_in_store']);
				
				$row++;
				
			}
			
			
			
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.'.EXCEL_EXTENSION.'"');
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
		* This funtion will take the type/category of item and
		*	and id of battalion
		*  and output the consolidated data of that item
		*/
		public function loadAllFiguresOfMSKForBattalionByCategoryOfItems($typeOfItem,$battalionId){
			//$typeOfItem = 'Security Equipment';
			$battalions = $this->getBattalions();
			$battalions = $this->sortBattalions($battalions);
			$data['battalions']  = $battalions;
			$typeofitems = $this->getTypeOfItems();
			$data['typeofitems'] = $typeofitems;
			
			
			$data['nameofitems'] = array();
			$battalionIds = array();
			foreach($battalions as $k=>$v){
				$battalionIds[] = $k;
			}
			
			$skipZeroEquipments = false;
			if(null!=$this->input->post('skipZeroEquipments')){
				$skipZeroEquipments = TRUE;
			}else{
				$skipZeroEquipments = FALSE;
			}
			
			
			$this->load->model('Msk_model');
			$search =$this->input->post('search'); 
			$download = $this->input->post('download');
			
			if(isset($search)|| $download){
				
				//remove the battalions as per the login (irb,cdo,pap)
				$typeOfItem = $this->input->post('namOfItemType');
				$itemNames = $this->input->post('itemNames');
				
				$equipments = $this->Msk_model->getEquipments($battalionIds, $typeOfItem, $itemNames);
			}else{
				$equipments = $this->Msk_model->getSecurityEquipments($battalionIds,$typeOfItem);
			}
			$data['typeOfItem'] = $typeOfItem;
			$items	 = $this->getItemsByTypeName($typeOfItem);	//get all the items
			$data['nameofitems'] = $items;
			
			//----------------------------INITIALIZATION------------------------------------------------
			$data2 = $this->initializingEquipmentFigures($equipments,$battalions);
			$nameOfItems = $data2['nameOfItems'];
			$equipmentsData = $data2['equipmentsData'];
			//----------------------------GETTING ISSUED VALUES-----------------------------------------
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$typeOfItem,$nameOfItems);
			foreach($issuedData as $k=>$item){
				//echo $item->mskitems_id.' - '.$item->name.' - '.$item->item.' - '.$item->issued.' - '.$item->bat_id.' - <br>';
				$equipmentsData[$item->mskitems_id][$item->bat_id]['issued'] = $item->issued;
			}
			//echo '<HR>';
			//var_dump($equipmetnsData);
			//--------------------------CALCULATING HOLDING DATA----------------------------------------
			$mskData = $this->Msk_model->getNewMskItems($battalionIds,$typeOfItem,$nameOfItems);
			$equipmentsData = $this->calculatingHolding($equipmentsData,$mskData);
			
			//-------------------------GETTING DATA FROM DEPOSIt MATERIAL TABLE --------------------------
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$typeOfItem,$nameOfItems);
		
			$equipmentsData=$this->calculatingDepositMaterialData($equipmentsData, $materialData);
				
			//-----------------------------CALCULATING PARAMETERS----------------------------------------
			$data['equipments'] = $this->calculateParameters($equipmentsData);
			if($skipZeroEquipments){
				$data['equipments'] = $this->skipZeroValueEquipments($data['equipments'],TRUE);
			}
			
			
			return  $data;
			
			//$this->load->view('Msk/equipments.php',$data);
		}
		/**
		*	This function is used to download the consolidate data  in datatype,equipments  format in a table
		*/
		public function downloadEquipmentFiguresForBattalions($skipZeroEquipments=null,$data2=null){
                    //echo 'hi';
			error_reporting(E_ALL);
			$data['equipmentsData'] = $this->loadAllFiguresOfMSKForBattalion($skipZeroEquipments);
                        //var_dump($data['equipmentsData']);die;
			$battalionName = $data['equipmentsData']['battalions'][$this->session->userdata('userid')];
			//$data['equipmentsData'] = $this->loadAllFiguresOfMSK();
			
			$battalions = $data['equipmentsData']['battalions'];
			//var_dump($battalions);
			$data['typeofitems'] = $data['equipmentsData']['typeofitems'];
			$data['nameofitems'] = $data['equipmentsData']['nameofitems'];
			
			$data['typeOfItem'] = $data['equipmentsData']['typeOfItem'];
			$equipments= $data['equipmentsData']['equipments'];
			$grand_total = $data['equipmentsData']['grand_total'];
			
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Equipments Detail, Generated by ERMS-PAP.")
										 ->setKeywords("Equipments Excel PAP ERMS")
										 ->setCategory("Equipment Detail of Battalion");
			$counti= 0;
			//var_dump($data);
			//$columns = $data['columns'];
			//var_dump($columns);
			//$weaponsNames = $data['weaponNames'];
			//var_dump($weaponsNames);
			//$battalionObjects = $data['battalionObjects'];

			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle($data['typeOfItem'] .' Figures'); 
			
			$counter = 0;
			$row=1;
			
			$titleStyle = array(
				'font'  => array(
					'size'  => 11,
					'name'  => 'Verdana',
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF00a0')
					)
					/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
				));
                        $type = null;
                        if($data2!=null && isset($data2['excel_heading'])){
                            if(isset($data2['type']) && $data2['type']=='ARP'){
                                $type = 'ARP';
                            }
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', $data2['excel_heading']);
                        }else{
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', $data['typeOfItem'].' Figures of Battalion '.$battalionName);
                        }
			
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:H1");
			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
				$cols = ['A','B','C','D','E','F','G','H','I','J'];
                                $i=0;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'S. No.');$i++;
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'Equipment Name');
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(30);$i++;
                        if($type=='ARP'){
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'Sanction');$i++;
                        }
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'Holding');$i++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'Issued');$i++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, ($type=='ARP')?'Total in store':"Total in store\n(Serv/Unserv)");
                        $objPHPExcel->getActiveSheet()->getStyle($cols[$i].$row)->getAlignment()->setWrapText(true);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(15);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'Serviceable');$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(15);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'UnServiceable');$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(15);
                        if($type==null){
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'Available/Serv in Store');
                            $objPHPExcel->getActiveSheet()->getStyle($cols[$i].$row)->getAlignment()->setWrapText(true);$i++;

                            $objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(20);
                        }
			$row++;
			foreach($equipments as $eqid=>$battalions){
                            $i=0;
				$counter++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $counter);               
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $battalions['equipments_name']);
				foreach($battalions as $k=>$status){ 
					if($k!='equipments_name'){
                                                if($type=='ARP'){
                                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $battalions[$k]['sanction']);
                                                }
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $battalions[$k]['holding']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $battalions[$k]['issued']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row,$battalions[$k]['total_in_store']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $battalions[$k]['serviceable']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $battalions[$k]['unserviceable']);
                                                if($type!='ARP')
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $battalions[$k]['serviceable_in_store']);
					}
				}
				$row++;
			}
			$i=1;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, 'Grand Total');
                        if($type=='ARP'){
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $grand_total['sanction']);
                        }
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $grand_total['holding']);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $grand_total['issued']);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row,$grand_total['total_in_store']);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $grand_total['serviceable']);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $grand_total['unserviceable']);
                        if($type!='ARP')
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $grand_total['serviceable_in_store']);
			
                        $val = explode(' ', $this->session->userdata('nick')); 
                        $val2 = explode(' ', $this->session->userdata('nick2')); 
                        $row++;
                        if($type=='ARP'){
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'Report generated by: '.$val[0].' '.$val2[0]);
                            $objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A{$row}:B{$row}");
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, date('d-m-Y h:i:s A'));
                            $objPHPExcel->setActiveSheetIndex($counti)->mergeCells("G{$row}:H{$row}");
                        }
			
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.'.EXCEL_EXTENSION.'"');
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
		}	//-------------------------------------------------------------Verified-------------------------------------------------------
		/**
		*	This function is used to download allfigure data
		*	values are calculated from formulas
		*/
		public function downloadAllFigures(){
			
			$data['equipmentsData'] = $this->loadAllFiguresOfMSK();
			
			$battalions = $data['equipmentsData']['battalions'];
			//var_dump($battalions);
			$data['typeofitems'] = $data['equipmentsData']['typeofitems'];
			$data['nameofitems'] = $data['equipmentsData']['nameofitems'];
			$data['typeOfItem'] = $data['equipmentsData']['typeOfItem'];
			$equipments= $data['equipmentsData']['equipments'];
			//var_dump($equipments);
			//die;
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("WEapon Detail, Generated by ERMS-PAP.")
										 ->setKeywords("Weapons Excel PAP ERMS")
										 ->setCategory("Weapon Detail");
			$counti= 0;
			//var_dump($data);
			//$columns = $data['columns'];
			//var_dump($columns);
			//$weaponsNames = $data['weaponNames'];
			//var_dump($weaponsNames);
			//$battalionObjects = $data['battalionObjects'];

			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Security Equipment Figures'); 
			
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
					/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
				));
			

		
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Security Equipment of Armed Battalions');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:F1");
			date_default_timezone_set('Asia/Kolkata');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue ('G1', date('d/m/Y H:i:s'));
			$objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("G1:H1");


			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			
			foreach($equipments as $eqid=>$battalions){
				
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $battalions['equipments_name']);
				
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setBold(true);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setSize(13);
				
				$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":H".$row);
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S.No.');
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Battalion');
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Sanction');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Holding');
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'Issued');
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'Total in Store');
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, 'Serviceable');
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, 'Unserviceable');
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, 'Available in Store');
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':H'.$row)->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('FFe7e9ea');
				
				$row++;
				$sno = 1;
				$total_sanction_h = 0;
				$total_holding_h = 0;
				$total_issued_h = 0;
				$total_total_in_store_h = 0;
				$total_serviceable_h = 0;
				$total_unserviceable_h = 0;
				$total_serviceable_in_store_h = 0;
				$total_auction_h = 0;
				
				foreach($battalions as $bn_id=>$parameters){
					if($bn_id!='equipments_name'&&isset($parameters['bat_name'])){
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $sno);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $parameters['bat_name']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $parameters['holding']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $parameters['issued']);
						//$parameters['total_in_store']= $parameters['holding']-$parameters['issued'];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $parameters['total_in_store']);
						//$parameters['serviceable'] = ($parameters['issued'] + $parameters['total_in_store']) - ($parameters['newmskconofitemC'] + $parameters['serviceable2RecievedQuantityC']) - $parameters['serviceable3RecievedQuantityD'];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $parameters['serviceable']);
						//$parameters['unserviceable'] = $parameters['newmskconofitemC'] +  $parameters['serviceable2RecievedQuantityC'] ;
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $parameters['unserviceable']);
						//$parameters['serviceable_in_store'] = $parameters['total_in_store'] - $parameters['unserviceable'];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $parameters['serviceable_in_store']);
						//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I'.$row, $sno);
						$row++;
						$sno++;
						$total_holding_h+=$parameters['holding'];
						$total_issued_h+=$parameters['issued'];
						$total_total_in_store_h+=$parameters['total_in_store'];
						$total_serviceable_h+=$parameters['serviceable'];
						$total_unserviceable_h+=$parameters['unserviceable'];
						$total_serviceable_in_store_h+=$parameters['serviceable_in_store'];
					}
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, '');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Total');
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Sanction');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $total_holding_h );
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $total_issued_h);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $total_total_in_store_h);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $total_serviceable_h);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $total_unserviceable_h);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $total_serviceable_in_store_h);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row.':H'.$row)->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('FFe7e9ea');
				$row++;
				$row++;
			}
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.'.EXCEL_EXTENSION.'"');
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
		public function downloadConsolidate(){
			error_reporting(E_ALL);
			
			$data['data'] = $this->getTotalEquipmentsInUnits();
			
			
			$holdings = $data['data']['holdings'];
			//echo '<pre>';
			//var_dump($holdings);
			//die;
			$units = $data['data']['units'];
			$itemNamesArray = $data['data']['itemNamesArray'];
			
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Equipment Consolidate figures")
										 ->setKeywords("Equipments Consolidate figures")
										 ->setCategory("Consolidate");
			$counti= 0;
			//var_dump($data);
			//$columns = $data['columns'];
			//var_dump($columns);
			//$weaponsNames = $data['weaponNames'];
			//var_dump($weaponsNames);
			//$battalionObjects = $data['battalionObjects'];

			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Security Equipment Figures'); 
			
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
					/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
				));
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', "Consolidate figures of PAP, IR & CDO");
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:D1");

			date_default_timezone_set('Asia/Kolkata');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E1', date('d/m/Y H:i:s'));
			$objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("E1:F1");

			$row++;			
			$types = $this->getConsolidateTypes();
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A2', "\"".$types[(isset($_POST['dataType'])) ? $_POST['dataType'] : 'holding']."\" equipments in Stores of PAP's,IRB's and CDO's including Training Centre's");
			
			$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A2:F2");

			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			$cols = array('C','D','E','F','G','H','I','J','K','L');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Name of Equipment');
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
			$i=0;
			foreach($units as $k=>$v){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $v);
				$i++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, 'Total');
			$row++;
			$data['type'] = $this->input->get('dataType');
			$data['type'] = $data['data']['type'];
			$counter= 1;
			foreach($itemNamesArray as $k1=>$v1){
				
				if($data['type'] == 'unserviceable'){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v1);
					$total = 0;
					$i=0;
					foreach($units as $k=>$v){
		
						$holdings[$k][$v1]['unserviceable'] = $this->getUnserviceableFrom($holdings[$k][$v1]['newmskconofitemC'],$holdings[$k][$v1]['serviceable2RecievedQuantityC']);
						//$holdings[$k][$v1]['unserviceable'] = ($holdings[$k][$v1]['newmskconofitemC']- $holdings[$k][$v1]['serviceable2RecievedQuantityC']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $holdings[$k][$v1][$data['type']]);
						$total += $holdings[$k][$v1][$data['type']];
						$i++;
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $total);
					$row++;
				}
				if($data['type'] == 'serviceable_in_store'){
					
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v1);
					$total = 0;
					$i=0;
					//var_dump($holdings);
					//error_reporting(0);
					foreach($units as $k=>$v){
						
						$holdings[$k][$v1]['total_in_store'] = $this->getTotalInStoreFrom($holdings[$k][$v1]['holding'],$holdings[$k][$v1]['issued']);
						//echo $holdings[$k][$v1]['total_in_store'];
						
						$holdings[$k][$v1]['unserviceable_in_store'] = $this->getUnserviceableFrom($holdings[$k][$v1]['newmskconofitemC'] ,$holdings[$k][$v1]['serviceable2RecievedQuantityC']);
						//echo '-'.$holdings[$k][$v1]['unserviceable_in_store'].'-';
		
						$holdings[$k][$v1]['serviceable_in_store'] = $this->getServiceableInStoreFrom($holdings[$k][$v1]['total_in_store'],$holdings[$k][$v1]['unserviceable_in_store']);
						
						//echo '<td>'.$holdings[$k][$v1][$data['type']].'</td>';
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $holdings[$k][$v1]['serviceable_in_store']);
						$total += $holdings[$k][$v1][$data['type']];
						$i++;
					}
					//var_dump($holdings);
					
					//die;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $total);
					$row++;
				}
				if($data['type'] == 'serviceable'){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v1);
					$total = 0;
					$i=0;
					foreach($units as $k=>$v){
						$holdings[$k][$v1]['total_in_store'] = $this->getTotalInStoreFrom($holdings[$k][$v1]['holding'], $holdings[$k][$v1]['issued']);
						$holdings[$k][$v1]['serviceable'] = $this->getServiceableFrom($holdings[$k][$v1]['issued'],$holdings[$k][$v1]['total_in_store'],$holdings[$k][$v1]['newmskconofitemC'], $holdings[$k][$v1]['serviceable2RecievedQuantityC'],$holdings[$k][$v1]['serviceable3RecievedQuantityD']);
						/* echo '<TD>';
						echo 'dalwinder';
						echo '</td>'; */
						/*echo '<td>'.$holdings[$k][$v1][$data['type']].'<br>';
						echo 'total_in_store '.$holdings[$k][$v1]['total_in_store'].'<BR>';
						echo 'Issued '.$holdings[$k][$v1]['issued'].'<BR>';
						echo 'New MSK Condition of item C '.$holdings[$k][$v1]['newmskconofitemC'].'<BR>';
						echo 'serviceable2RecievedQuantityC '.$holdings[$k][$v1]['serviceable2RecievedQuantityC'].'<BR>';
						echo 'serviceable3RecievedQuantityD '.$holdings[$k][$v1]['serviceable3RecievedQuantityD'].'<BR>';
						
						echo'</td>';*/
						//echo '<td>'.$holdings[$k][$v1][$data['type']].'</td>';
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $holdings[$k][$v1][$data['type']]);
						$total += $holdings[$k][$v1][$data['type']];
						$i++;
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $total);
					$row++;
				}
				if($data['type'] == 'holding'){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v1);
					$total = 0;
					$i=0;
					foreach($units as $k=>$v){
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $holdings[$k][$v1][$data['type']]);
						$total += $holdings[$k][$v1][$data['type']];
						$i++;
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $total);
					$row++;
				}
				if($data['type'] == 'issued'){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v1);
					$total = 0;
					$i=0;
					foreach($units as $k=>$v){
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $holdings[$k][$v1][$data['type']]);
						$total += $holdings[$k][$v1][$data['type']];
						$i++;
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $total);
					$row++;
				}
				if($data['type'] == 'total_in_store'){
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v1);
					$total = 0;
					$i=0;
					foreach($units as $k=>$v){
						$holdings[$k][$v1][$data['type']] = $this->getTotalInStoreFrom($holdings[$k][$v1]['holding'], $holdings[$k][$v1]['issued']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $holdings[$k][$v1][$data['type']]);
						$total += $holdings[$k][$v1][$data['type']];
						$i++;
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $total);
					$row++;
				}
				$counter++;
			}
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.'.EXCEL_EXTENSION.'"');
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
			//die('downloading Consolidate');
		}
		
		public function downloadStoreEquipment(){
			$data['data'] = $this->loadStoreEquipments();
			$battalions = $data['data']['unit'];
			$data['units'] = $data['data']['units'];
			$data['categories'] = $data['data']['categories'];
			$data['subpage'] = 'store_equipments.php';
			$holdings = $data['data']['holdings'];
			$itemNamesArray = $data['data']['itemNamesArray'];
			$selectedEquipmentDataType = $data['data']['selectedEquipmentDataType'];
			$selectedCategory = $data['data']['selectedCategory'];
			$trimmedEquipmentsName = $data['data']['zeroSkippedItemNames'];
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("WEapon Detail, Generated by ERMS-PAP.")
										 ->setKeywords("Figure view pap irb cdo")
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
					/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
				));
			$unit__ = $this->input->post('unit');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', ''.$selectedCategory. 'items of ' .strtoupper($unit__).'');

			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:L1");
			date_default_timezone_set('Asia/Kolkata');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('M1', date('d/m/Y H:i:s'));
			$objPHPExcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("M1:O1");
			$row++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A2', ' "'.$selectedEquipmentDataType.'" items in "'.$selectedCategory.'" of "'.$unit__.'"');
			$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A2:O2");

			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');

			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Equipments');
			
			$cols = array('C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R');
			$i=0;
			$grand_total = array();
			foreach($battalions as $k1=>$v1){
				$grand_total[$k1][$selectedEquipmentDataType] = 0;
				$tempBn = str_replace('<sup>th</sup>','',$v1);
				$tempBn = str_replace('<sup>st</sup>','',$tempBn);
				$tempBn = str_replace('<sup>nd</sup>','',$tempBn);
				$tempBn = str_replace('<sup>rd</sup>','',$tempBn);
				if($tempBn==''){
					break;
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row,$tempBn);
				$i++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row,'Total');
			//$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:".$col[$i]."1");				//Problem over here
			$row++;
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
			$counter = 1;
			
			foreach($trimmedEquipmentsName as $k2=>$v2){
				//echo '<tr><td>'.$v2.'</td>';
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v2);
				$total = 0;
				$i=0;
				foreach($battalions as $bnid=>$v1){
					if($v1==''){
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $holdings[$bnid][$v2][$selectedEquipmentDataType]);
					$grand_total[$bnid][$selectedEquipmentDataType]+=$holdings[$bnid][$v2][$selectedEquipmentDataType];
					$total +=$holdings[$bnid][$v2][$selectedEquipmentDataType];
					$i++;
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row,$total);
				//echo '<td>'.$total.'</td></tr>';
				$row++;
				$counter++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,'Grand Total');
			$i=0;
			$total = 0;
			foreach($battalions as $bnid=>$v1){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row,$grand_total[$bnid][$selectedEquipmentDataType]);
				$total+=$grand_total[$bnid][$selectedEquipmentDataType];
				$i++;
			}
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row,$total);
		
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.'.EXCEL_EXTENSION.'"');
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
		public function getConsolidateTypes(){
			return array(/*'sanction'=>'Sanction',*/'holding'=>'Holding','issued'=>'Issued','total_in_store'=>'Total in Store','serviceable'=>'Serviceable','unserviceable'=>'Un-serviceable','serviceable_in_store'=>'Serviceable in Store');
		}
		/**
		*	let you download the consolidated insuue holding in kot
		*/
		public function downloadIssueHoldingInkot(){
			
			$data['data'] = $this->loadStoreEquipments();
			$battalions = $data['data']['unit'];
			$data['units'] = $data['data']['units'];
			$data['categories'] = $data['data']['categories'];
			$data['subpage'] = 'store_equipments.php';
			$holdings = $data['data']['holdings'];
			$itemNamesArray = $data['data']['itemNamesArray'];
			$selectedEquipmentDataType = $data['data']['selectedEquipmentDataType'];
			$selectedCategory = $data['data']['selectedCategory'];
			$trimmedEquipmentsName = $data['data']['zeroSkippedItemNames'];
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("WEapon Detail, Generated by ERMS-PAP.")
										 ->setKeywords("Figure view pap irb cdo")
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
					/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
				));
			$unit__ = $this->input->post('unit');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Figure View of '.$unit__);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:L1");
			$row++;
			//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A2', 'Showing "'.$selectedEquipmentDataType.'" items in "'.$selectedCategory.'" of "'.$unit__.'"');
			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			
			
			$cols = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$cols2 = array('','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$cols3 = array('','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$i=2;
			$j=0;
			$z=0;
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Battalions');
			$new_battalions = array();
			foreach($battalions as $k1=>$v1){
				$tempBn = str_replace('<sup>th</sup>','',$v1);
				$tempBn = str_replace('<sup>st</sup>','',$tempBn);
				$tempBn = str_replace('<sup>nd</sup>','',$tempBn);
				$tempBn = str_replace('<sup>rd</sup>','',$tempBn);
				$new_battalions[$k1] = $tempBn;
			}
			$battalions = $new_battalions;
			foreach($trimmedEquipmentsName as $k1=>$v1){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row, $v1);
				$temp_start1 = $i;
				$temp_start2 = $j;
				$temp_start3 = $z;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].($row+1), 'Holding');
				$i++;
				if($i>25){
					$i=$i-26;
					$j++;
					if($j>25){
						$j=$j-26;
						$z++;
					}
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].($row+1), 'Issued');
				$i++;
				if($i>25){
					$i=$i-26;
					$j++;
					if($j>25){
						$j=$j-26;
						$z++;
					}
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].($row+1), 'Non Serviceable');
				$i++;
				if($i>25){
					$i=$i-26;
					$j++;
					if($j>25){
						$j=$j-26;
						$z++;
					}
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].($row+1), 'In Store');
				$temp_end1=$i;
				$temp_end2=$j;
				$temp_end3=$z;
				$i++;
				if($i>25){
					$i=$i-26;
					$j++;
					if($j>25){
						$j=$j-26;
						$z++;
					}
				}
				$objPHPExcel->setActiveSheetIndex($counti)->mergeCells($cols3[$temp_start3].$cols2[$temp_start2].$cols[$temp_start1].$row.":".$cols3[$temp_end3].$cols2[$temp_end2].$cols[$temp_end1].$row);
				$i++;
				if($i>25){
					$i=$i-26;
					$j++;
					if($j>25){
						$j=$j-26;
						$z++;
					}
				}
			}
			$row++;
			$counter = 1;
			$i=2;
			$j=0;
			$z=0;
			foreach($battalions as $bnid=>$v1){
				$i=2;
				$j=0;
				$z=0;
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $v1);
				foreach($trimmedEquipmentsName as $k2=>$v2){ 
					$grand_total[$v2]['issued'] += $holdings[$bnid][$v2]['issued'];
					$grand_total[$v2]['holding'] += $holdings[$bnid][$v2]['holding'];
					$grand_total[$v2]['unserviceable'] += $holdings[$bnid][$v2]['unserviceable'];
					$grand_total[$v2]['serviceable_in_store'] += $holdings[$bnid][$v2]['serviceable_in_store'];
					$temp_start1 = $i;
					$temp_start2 = $j;
					$temp_start3 = $z;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$holdings[$bnid][$v2]['holding']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$holdings[$bnid][$v2]['issued']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$holdings[$bnid][$v2]['unserviceable']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$holdings[$bnid][$v2]['serviceable_in_store']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$temp_end1=$i;
					$temp_end2=$j;
					$temp_end3=$z;
				}
				$counter++;
			}
			$row++;
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Grand Total');
			$i=2;
			$j=0;
			$z=0;
			foreach($trimmedEquipmentsName as $k2=>$v2){ 
					//$grand_total[$v2]['issued'] += $holdings[$bnid][$v2]['issued'];
					//$grand_total[$v2]['holding'] += $holdings[$bnid][$v2]['holding'];
					//$grand_total[$v2]['serviceable_in_store'] += $holdings[$bnid][$v2]['serviceable_in_store'];
					$temp_start1 = $i;
					$temp_start2 = $j;
					$temp_start3 = $z;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$grand_total[$v2]['holding']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$grand_total[$v2]['issued']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$grand_total[$v2]['unserviceable']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols3[$z].$cols2[$j].$cols[$i].$row,$grand_total[$v2]['serviceable_in_store']);
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
					$temp_end1=$i;
					$temp_end2=$j;
					$temp_end3=$z;
					$i++;
					if($i>25){
						$i=$i-26;
						$j++;
						if($j>25){
							$j=$j-26;
							$z++;
						}
					}
			}
			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.'.EXCEL_EXTENSION.'"');
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
                public function getAntiRiotSecurityEquipments(){
                        $download = $this->input->post('download');
                        $_POST['namOfItemType'] = 'Security Equipment';
                        $_POST['itemNames'] = null;
                        //var_dump($download);
                        $submit = $this->input->post('submit');
                        $skipZeroEquipments = null;
                            if($submit || $download){
                            $skipZeroEquipments = $this->input->post('skipZeroEquipments');
                            if($skipZeroEquipments==null){
                                $skipZeroEquipments=false;
                            }else{
                                $skipZeroEquipments=true;
                            }
                        }
                       //var_dump($skipZeroEquipments);//die;
                        if($download){
                            $val = explode(' ', $this->session->userdata('nick'));
                            $val2 = explode(' ', $this->session->userdata('nick2'));
                            $data['excel_heading'] = 'DETAIL OF ANTI RIOT & SECURITY EQUIPMENTS  '.$val[0].$val2[0].' '.strtoupper(date('d-m-Y h:i:s a'));
                            $data['type']='ARP';
                            $this->downloadEquipmentFiguresForBattalions($skipZeroEquipments,$data);
			}elseif(null!=$this->input->post('complete_download')){
				$data = $this->completeDownloadFiguresOfBattalion();
			}else{
				$battalion_id = $this->session->user_id;
                                //$_POST['itemNames'] = ['PC Shield (Training)'];
                                /*$item_types = '86 PC Shield,,88 FRB Helmet,89 Riot Control Barricades,90 B.P Jacket,91 B.P Morcha,92 B.P Patka,93 Mega Phone,94 Mobile Loud Speaker,95 PA System,96 Telescope,97 Night Vision Device,98 Binocular,99 Handy Video Camera,100 Dragon Light,101 Commando Light,102 HHMD,103 Search Light,225 Helmet,395 PC Lathies,396 Krav Mega Kit,397 Fire Extinguisher 09 Ltr Water Type,398 Fire Extinguisher 09 Ltr Mech. Foam Type,399 Fire Extinguisher,401 Lathies Short Bamboos,402 Lathies Long Bamboo,533 Body protector suit,534 ProtectiveVest,535 B.P. Vest,536 B.P Podium & Lectern,537 Video Camera,539 HHTF,546 DFMD,547 Inspection Mirror under Vehicle,552 Prodder/Probe,553 Weapon Tracer,554 Letter Bomb Detector,555 Cane Shield,586 Flood Light,587 Electronic Bomb Detector Watch,588 I.R Collar,590 Inspection Mirror Over Head,598 AB Ring,599 GNB,600 PNB,601 Pocket Scanner,602 Halogen Light,603 Shock Batten (Jawala),604 Shock Batten (Defender),605 Periscope,606 DSMD,669 NLJD,670 Boom Barrier,671 Chest Harness,725 Kamofly N';*/
                                //$_POST['namOfItemType'] = 'Security Equipment';
                                //$_POST['search'] = 'Search';
				$data['equipmentsData'] = $this->loadAllFiguresOfMSKForBattalion($skipZeroEquipments);
				
				$data['battalions'] 	= $data['equipmentsData']['battalions'];
				$data['typeofitems'] 	= $data['equipmentsData']['typeofitems'];
				$data['nameofitems'] 	= $data['equipmentsData']['nameofitems'];
				$data['typeOfItem'] 	= $data['equipmentsData']['typeOfItem'];
				$data['equipments'] 	= $data['equipmentsData']['equipments'];
				$data['grand_total'] = $data['equipmentsData']['grand_total'];
				$this->load->view('Msk/antiroit',$data);
			}
                }
	}
?>