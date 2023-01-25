<?php
	if(!defined('BASEPATH')) exit('You Have Not Permission To access');
	class Quarters extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->model('Login_model');
			$this->load->model('Quarters_model');
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
		}
		public function figures(){
			if($this->session->userdata('user_log')==8){
				$this->battalionFigures();
				
			}else{
				$data['type_of_quarter'] = $this->getTypeOfQuarters();
				$data['battalions'] = $this->getBattalions();
				$data['battalions'] = $this->sortBattalions($data['battalions']);
				$data['conditions'] = $this->getCondition();
				$quarter_figures = array();
				if(null!=$this->input->post('quarter_type')){
					$t_o_quarters = $this->input->post('quarter_type');
					$type_of_quarters = array();
					foreach($t_o_quarters as $k=>$v){
						$type_of_quarters[$v] = $data['type_of_quarter'][$v];
					}
				}else{
					$type_of_quarters = $data['type_of_quarter'];
				}
				$input_type_of_quarters = array();
				if(in_array('GOs',$type_of_quarters)){
					foreach(array("GO's","GO'S","GOs","GOS") as $k=>$val){
						$input_type_of_quarters[$val] = $val;
					}
				}
				if(in_array('NGOs',$type_of_quarters)){
					foreach(array("NGO's","NGOs","NGO'S","NGOS") as $k=>$val){
						$input_type_of_quarters[$val] = $val;
					}
				}
				if(in_array('ORs',$type_of_quarters)){
					foreach(array("OR's","ORs","OR'S","ORs") as $k=>$val){
						$input_type_of_quarters[$val] = $val;
					}
				}
				if(in_array('C-IV',$type_of_quarters)){
					foreach(array("C-IV") as $k=>$val){
						$input_type_of_quarters[$val] = $val;
					}
				}
				if(in_array('Other',$type_of_quarters)){
					foreach(array("") as $k=>$val){
						$input_type_of_quarters[$val] = $val;
					}
				}
				if(null!=$this->input->post('battalion')){
					$bats = $this->input->post('battalion');
					$battalions = array();
					foreach($bats as $k=>$v){
						$battalions[$v]=$data['battalions'][$v];
					}
				}else{
					$battalions = $data['battalions'];
				}
				if(null!=$this->input->post('condition')){
					$conditions = $this->input->post('conditions');
				}else{
					$conditions = $data['conditions'];
				}
				$quarter_data = $this->inititalize_quarters_figures($type_of_quarters, $battalions, $conditions);
				$quarter_figures = $quarter_data['quarter_figures'];
				$grand_total = $quarter_data['grand_total'];
				$quarters = $this->Quarters_model->getAllQuarters($input_type_of_quarters,$battalions,$conditions);
				foreach($quarters as $key=>$quarter){
					$battalion_id = $quarter->bat_id;
					if(trim($quarter->typeofqtr)!=''){
						if(in_array(trim($quarter->typeofqtr),array("OR's","ORs","OR'S","ORs"))){
							$typeofqtr = 'ORs';
						}elseif(in_array($quarter->typeofqtr,array("NGO's","NGOs","NGO'S","NGOS"))){
							$typeofqtr = 'NGOs';
						}elseif(in_array($quarter->typeofqtr,array("GO's","GO'S","GOs","GOS"))){
							$typeofqtr = 'GOs';
						}elseif($quarter->typeofqtr=="C-IV"){
							$typeofqtr = 'C-IV';
						}else{
							echo $quarter->typeofqtr;
							$typeofqtr = $quarter->typeofqtr;
						}
					}else{
						$typeofqtr = 'Other';
					}
					if(!isset($quarter_figures[$typeofqtr][$battalion_id])){
						$quarter_figures[$typeofqtr]['other']['total']++;
						$grand_total[$typeofqtr]['total']++;
						if($quarter->allot=='Issued'){
							$quarter_figures[$typeofqtr]['other']['alloted']++;
							$grand_total[$typeofqtr]['alloted']++;
						}else{
							$quarter_figures[$typeofqtr]['other']['vacant']++;
							$grand_total[$typeofqtr]['vacant']++;
						}
					}else{
						$quarter_figures[$typeofqtr][$battalion_id]['total']++;
						$grand_total[$typeofqtr]['total']++;
						if($quarter->allot=='Issued'){
							$quarter_figures[$typeofqtr][$battalion_id]['alloted']++;
							$grand_total[$typeofqtr]['alloted']++;
						}else{
							$quarter_figures[$typeofqtr][$battalion_id]['vacant']++;
							$grand_total[$typeofqtr]['vacant']++;
						}
					}
				}
                                $skipZeroQuarters = true;
                                if(null!=$this->input->post('search') || null!=$this->input->post('downloadQuarterDetail')){
                                    if(null!=$this->input->post('skipZeroQuarters')){
                                        $skipZeroQuarters = true;
                                    }else{
                                        $skipZeroQuarters = false;
                                    }
                                }
				if($skipZeroQuarters){
					foreach($quarter_figures as $quarter_type=>$battalions_){
						foreach($battalions_ as $k1=>$battalion){
							if($battalion['total']==0 && $battalion['alloted'] ==0 && $battalion['vacant'] ==0){
								unset($quarter_figures[$quarter_type][$k1]);
							}							
						}
					}
				}
                                $data['skipZeroQuarters'] = $skipZeroQuarters;
				$data['quarter_figures'] = $quarter_figures;
				$data['grand_total'] = $grand_total;
				if($this->input->post('downloadQuarterDetail')){
					$this->downloadQuarterDetail($quarter_figures,$grand_total,$type_of_quarters, $battalions, $conditions);	
				}
				$this->load->view('Quarter/figure_view',$data);
			}	
		}
		public function battalionFigures(){
			if($this->session->userdata('user_log')!=8){
				redirect('bt-dashboard');
			}
			$data['bat_id'] = $this->session->userdata('userid');
			$data['type_of_quarter'] = $this->getTypeOfQuarters();
			$data['battalions'] = $this->getBattalion();
			//$data['battalions'] = $this->sortBattalions($data['battalions']);
			$data['conditions'] = $this->getCondition();
			$quarter_figures = array();
			if(null!=$this->input->post('quarter_type')){
				$t_o_quarters = $this->input->post('quarter_type');
				$type_of_quarters = array();
				foreach($t_o_quarters as $k=>$v){
					$type_of_quarters[$v] = $data['type_of_quarter'][$v];
				}
			}else{
				$type_of_quarters = $data['type_of_quarter'];
			}
			$input_type_of_quarters = array();
			if(in_array('GOs',$type_of_quarters)){
				foreach(array("GO's","GO'S","GOs","GOS") as $k=>$val){
					$input_type_of_quarters[$val] = $val;
				}
			}
			if(in_array('NGOs',$type_of_quarters)){
				foreach(array("NGO's","NGOs","NGO'S","NGOS") as $k=>$val){
					$input_type_of_quarters[$val] = $val;
				}
			}
			if(in_array('ORs',$type_of_quarters)){
				foreach(array("OR's","ORs","OR'S","ORs") as $k=>$val){
					$input_type_of_quarters[$val] = $val;
				}
			}
			if(in_array('C-IV',$type_of_quarters)){
				foreach(array("C-IV") as $k=>$val){
					$input_type_of_quarters[$val] = $val;
				}
			}
			if(in_array('Other',$type_of_quarters)){
				foreach(array("") as $k=>$val){
					$input_type_of_quarters[$val] = $val;
				}
			}
			if(null!=$this->input->post('battalion')){
				$bats = $this->input->post('battalion');
				$battalions = array();
				foreach($bats as $k=>$v){
					$battalions[$v]=$data['battalions'][$v];
				}
			}else{
				$battalions = $data['battalions'];
			}
			if(null!=$this->input->post('condition')){
				$conditions = $this->input->post('conditions');
			}else{
				$conditions = $data['conditions'];
			}
			$quarter_data = $this->inititalize_quarters_figures($type_of_quarters, $battalions, $conditions);
			$quarter_figures = $quarter_data['quarter_figures'];
			$grand_total = $quarter_data['grand_total'];
			$quarters = $this->Quarters_model->getAllQuarters($input_type_of_quarters,$battalions,$conditions);
			foreach($quarters as $key=>$quarter){
				$battalion_id = $quarter->bat_id;
				if(trim($quarter->typeofqtr)!=''){
					if(in_array(trim($quarter->typeofqtr),array("OR's","ORs","OR'S","ORs"))){
						$typeofqtr = 'ORs';
					}elseif(in_array($quarter->typeofqtr,array("NGO's","NGOs","NGO'S","NGOS"))){
						$typeofqtr = 'NGOs';
					}elseif(in_array($quarter->typeofqtr,array("GO's","GO'S","GOs","GOS"))){
						$typeofqtr = 'GOs';
					}elseif($quarter->typeofqtr=="C-IV"){
						$typeofqtr = 'C-IV';
					}else{
						//echo $quarter->typeofqtr;
						$typeofqtr = $quarter->typeofqtr;
					}
				}else{
					$typeofqtr = 'Other';
				}
				if(!isset($quarter_figures[$typeofqtr][$battalion_id])){
					$quarter_figures[$typeofqtr]['other']['total']++;
					$grand_total[$typeofqtr]['total']++;
					if($quarter->allot=='Issued'){
						$quarter_figures[$typeofqtr]['other']['alloted']++;
						$grand_total[$typeofqtr]['alloted']++;
						$grand_total['alloted']++;
					}else{
						$quarter_figures[$typeofqtr]['other']['vacant']++;
						$grand_total[$typeofqtr]['vacant']++;
						$grand_total['vacant']++;
					}
					$grand_total['total']++;
				}else{
					$quarter_figures[$typeofqtr][$battalion_id]['total']++;
					$grand_total[$typeofqtr]['total']++;
					if($quarter->allot=='Issued'){
						$quarter_figures[$typeofqtr][$battalion_id]['alloted']++;
						$grand_total[$typeofqtr]['alloted']++;
						$grand_total['alloted']++;
					}else{
						$quarter_figures[$typeofqtr][$battalion_id]['vacant']++;
						$grand_total[$typeofqtr]['vacant']++;
						$grand_total['vacant']++;
					}
					$grand_total['total']++;
				}
			}
			if(null!=$this->input->post('skipZeroQuarters')){
				foreach($quarter_figures as $quarter_type=>$battalions_){
					foreach($battalions_ as $k1=>$battalion){
						if($battalion['total']==0 && $battalion['alloted'] ==0 && $battalion['vacant'] ==0){
							unset($quarter_figures[$quarter_type]);
							
						}							
					}
				}
			}
			//var_dump($quarter_figures);
			//die('kljk');
			$data['quarter_figures'] = $quarter_figures;
			$data['grand_total'] = $grand_total;
			if($this->input->post('downloadQuarterDetail')){
				$this->downloadQuarterDetailBattalion($quarter_figures,$grand_total,$type_of_quarters, $battalions, $conditions,$data['bat_id']);	
			}
			$this->load->view('Quarter/battalion/figure_view',$data);
		}
		public function downloadQuarterDetailBattalion($quarter_figures,$grand_total,$type_of_quarters, $battalions, $conditions,$bat_id){
			
			error_reporting(0);	
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP-Jalandhar")
										 ->setTitle("Quarter Figures")
										 ->setSubject("Quarter Figures")
										 ->setDescription("Quarter consolidated figures, Generated by ERMS-PAP.")
										 ->setKeywords("Figures of Quarters alloted-vacant in MT")
										 ->setCategory("Quarter/Battalion figure view");
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
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
				$columns = array('A','B','C','D','E');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Consolidated Figures of Quarters in PAP\'s, IRB\'s and CDO\'s');
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:E1");
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$row++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'Showing Quarters.'); //name of vechicel
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":E".$row);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$row++;
			
			
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $k); 
				//$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":E".$row);
				//$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//$row++;
			//foreach($quarter_figures as $k=>$v){	
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, "S. No."); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, "Quarter Type"); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Alloted'); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'Vacant');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'Total'); 
				foreach($columns as $key=>$val){
					$objPHPExcel->getActiveSheet()->getStyle($val.$row)->getFont()->setBold(true);
				}
				$counter = 1 ;
				$row++;
				foreach($quarter_figures as $k=>$v){ 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $k); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $v[$bat_id]['alloted']); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $v[$bat_id]['vacant']); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $v[$bat_id]['total']); 
					$counter++;
					$row++;
				}
				$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":B".$row);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'Grand Total');
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $grand_total['alloted']); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $grand_total['vacant']); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $grand_total['total']); 
				foreach(array('A','C','D','E') as $k=>$val){
					$objPHPExcel->getActiveSheet()->getStyle($val.$row)->getFont()->setBold(true);
				}
				
				$row++;
			
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="quarter_figures.'.EXCEL_EXTENSION.'"');
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
		public function downloadQuarterDetail($quarter_figures,$grand_total,$type_of_quarters, $battalions, $conditions){
			
			error_reporting(0);	
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP-Jalandhar")
										 ->setTitle("Quarter Figures")
										 ->setSubject("Quarter Figures")
										 ->setDescription("Quarter consolidated figures, Generated by ERMS-PAP.")
										 ->setKeywords("Figures of Quarters alloted-vacant in MT")
										 ->setCategory("Quarter/Battalion figure view");
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
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
				$columns = array('A','B','C','D','E');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Consolidated Figures of Quarters in PAP\'s, IRB\'s and CDO\'s');
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:E1");
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$row++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'Showing Quarters.'); //name of vechicel
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":E".$row);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$row++;
			
			foreach($quarter_figures as $k=>$quarter){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $k); 
				$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A".$row.":E".$row);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, "S. No."); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, "Battalion"); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Total'); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'Alloted'); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'Vacant');
				foreach($columns as $key=>$val){
					$objPHPExcel->getActiveSheet()->getStyle($val.$row)->getFont()->setBold(true);
				}
				$counter = 1 ;
				$row++;
				foreach($quarter as $key=>$parameters){ 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $counter); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $battalions[$key]); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $parameters['total']); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $parameters['alloted']); 
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $parameters['vacant']); 
					$counter++;
					$row++;
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Grand Total'); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $grand_total[$k]['total']); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $grand_total[$k]['alloted']); 
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $grand_total[$k]['vacant']); 
				foreach(array('B','C','D','E') as $k=>$val){
					$objPHPExcel->getActiveSheet()->getStyle($val.$row)->getFont()->setBold(true);
				}
				$row++;
				$row++;
			}
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="quarter_figures.'.EXCEL_EXTENSION.'"');
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
		public function inititalize_quarters_figures($type_of_quarters, $battalions, $conditions){
			$quarter_figures = array();
			$grand_total = array();
			foreach($type_of_quarters as $key=>$quarter_type){
				if(empty(trim($quarter_type))){
					$quarter_type='Other';
				}
				foreach($battalions as $key2=>$battalion){
					$quarter_figures[$quarter_type][$key2]['total'] = 0;
					$quarter_figures[$quarter_type][$key2]['alloted'] = 0;
					$quarter_figures[$quarter_type][$key2]['vacant'] = 0;
				}
				$grand_total[$quarter_type]['total'] = 0;
				$grand_total[$quarter_type]['alloted'] = 0;
				$grand_total[$quarter_type]['vacant'] = 0;
			}
			$grand_total['total'] = 0;
			$grand_total['alloted'] = 0;
			$grand_total['vacant'] = 0;
			return array('quarter_figures'=>$quarter_figures,'grand_total'=>$grand_total);
		}
		public function getTypeOfQuarters(){
                    return array('GOs'=>'GOs','NGOs'=>'NGOs','ORs'=>'ORs','C-IV'=>'C-IV','other'=>'Other');
		}
		public function getBattalions(){
                    $battalions = $this->Quarters_model->getBattalions($this->session->userdata('userid'));
                    $bat_array = array();
                    foreach($battalions as $k=>$battalion){
                            $bat_array[$battalion->users_id] = $battalion->nick;
                    }
                    $bat_array['other'] = 'Other';
                    //var_dump($bat_array);	
                    return $bat_array;
		}
		public function getBattalion(){
			return [$this->session->userdata('userid')=>$this->session->userdata('nick')];
		}
		public function getCondition(){
			return array(
				'New'=>'New',
				'Good'=>'Good',
				"Normal"=>'Normal',
				"Bad"=>"Bad"
			);
		}
		public function sortBattalions($input_battalions){
			$sorted_battalions_result = array();
			$sorted_battalions = array(
				36=>'7-PAP',
				49=>'27-PAP',
				187=>'36-PAP',
				11=>'75-PAP',
				56=>'80-PAP',
				89=>'CSO Punjab Police',
				90=>'RTC PAP',
				129=>'ISTC.KPT',
				97=>'ADGP PAP',
				193=>'1-IRB.',
				168=>'2-IRB.',
				157=>'3-IRB.',
				118=>'4-IRB.',
				163=>'6-IRB.',
				225=>'7-IRB.',
				205=>'RTC.L/KOTHI',
				207=>'1-CDO',
				175=>'2-CDO',
				145=>'3-CDO',
				151=>'4-CDO',
				181=>'5-CDO',
				199=>'CTC/BHG',
				'other'=>'Other'
			);
			foreach($sorted_battalions as $k=>$v){
				if(in_array($k,array_keys($input_battalions))){
					$sorted_battalions_result[$k] = $v;
				}
			}
			return $sorted_battalions_result;
		}
	}
?>