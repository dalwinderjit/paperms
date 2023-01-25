<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class Accountbranch extends CI_Controller
	{	
		
	
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
			$this->load->model(F_BTALION.'Btalion_model'); 
			//$this->$total_row = false;
		}
		public function index(){
			if(!(in_array($this->session->userdata('user_log'),array(10)))){
				redirect('bt-dashboard');
			}
			$this->load->model('AccountBranch_model');
			$soes = $this->AccountBranch_model->getSoes();
			foreach($soes as $k=>$v){
				$data['soes'][$v->id] = $v->name;
			}
			$bat_ids = array($this->session->userdata('userid'));
			$bills = $this->AccountBranch_model->getBills($bat_ids);
			
			$data['bills'] = $bills;
			$this->load->view('AccountBranch/index',$data);
		}
		public function ajax_account_bill_list(){
			error_reporting(0);
			//$_POST['length'] = 10;
			//$_POST['start'] = 1;
			$this->load->model("AccountBranch_model");
			//get the searched employees list or all employees
			//var_dump($_POST);
			if(null!=$this->input->post('soe')){
				$soe_name = $this->input->post('soe');
			}else{
				$soe_name = '';
			}
			$soes = $this->AccountBranch_model->getSoes($soe_name);
			$soe_ids = null;
			foreach($soes as $k=>$val){
				$soe_ids[] = $val->id;
			}
			$startDate = null;
			$endDate = null;
			if(null!=$this->input->post('startDate')){
				$startDate = $this->input->post('startDate');	//dd/mm/yy
				$date = date_create_from_format('d/m/Y',$startDate);
				$startDate = date_format($date, 'Y-m-d').' 00:00:00';
			}
			if(null!=$this->input->post('endDate')){
				$endDate = $this->input->post('endDate');
				$date = date_create_from_format('d/m/Y',$endDate);
				$endDate = date_format($date, 'Y-m-d').' 23:59:59';
			}
			//echo $startDate;
			//echo $endDate;
			//echo '<hr>';
			$bills = $this->AccountBranch_model->getBills([$this->session->userdata('userid')],$soe_ids,$startDate,$endDate);
			$data = [];
			$sno=1;
			if(isset($_POST['start']) && $_POST["start"] != -1){
				$sno = $_POST['start']+1;
			}
			foreach($bills as $k=>$val){
				$bill = array();
				$bill['sno'] = $sno;
				$bill['name'] = $val->name;
				$bill['amount_alloted'] = $val->amount_alloted;
				$bill['expenditure_amount'] = $val->expenditure_amount;
				$bill['bill_sub_treasury'] = $val->bill_sub_treasury;
				$bill['calculated'] = $val->amount_alloted-$val->expenditure_amount-$val->bill_sub_treasury;
				$bill['bill_after_liab'] = $val->bill_sub_treasury_after_liabilities;
				$bill['date'] = $val->date;
				$bill['remarks'] = '<span class="punjabi">'.$val->remarks.'</span>';
				$bill['action'] = '<a href="'.base_url().'accounts-edit-bill/'.$val->bill_id.'" class="glyphicon glyphicon-pencil black"></a> | <a class="glyphicon glyphicon-trash red" onClick="showModal('.$val->bill_id.');return false;"></a>';
				$data[] = $bill;
				$sno++;
			}
			
			$total_bills = $this->AccountBranch_model->getBillsCount([$this->session->userdata('userid')],$soe_ids);
			
			$output = array(
				//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
				"draw" =>intval($_POST['draw']),
				"recordsTotal" =>$total_bills,//$this->Posting_model->getTotalEmployees(),
				"recordsFiltered" =>$total_bills,//$this->Posting_model->getTotalFilteredEmployees(),
				"data"	=>$data,
				"post" =>$_POST,
				
				//'post' =>$_POST,
			);
			echo json_encode($output);
		}
		public function isValid($date){
			return true;
		}
		public function addBillDetail(){
			if(!(in_array($this->session->userdata('user_log'),array(10)))){
				redirect('bt-dashboard');
			}
			//echo 'Add Detail over here
			$this->load->library('form_validation');
			$this->load->model('AccountBranch_model');
			if(null!=$this->input->post('submit')){
				$soe = $this->input->post('soe');
				$alloted_amount = $this->input->post('alloted_amount');
				$expenditure_amount = $this->input->post('expenditure_amount');
				$bill_submitted_in_treasury = $this->input->post('bill_submitted_in_treasury');
				$bill_submitted_in_treasury_after_pending_liabilities = $this->input->post('bill_submitted_in_treasury_after_pending_liabilities');
				$date = $this->input->post('date');
				$remarks = $this->input->post('remarks');
				
				$this->form_validation->set_rules("soe", "SOE", "required");
				$this->form_validation->set_rules("alloted_amount", "Alloted Amount", "required|callback_valid_amount");
				$this->form_validation->set_rules("expenditure_amount", "Expenditure Amount", "required|callback_valid_amount");
				$this->form_validation->set_rules("bill_submitted_in_treasury", "Bill submitted in Treasury", "required|callback_valid_amount");
				$this->form_validation->set_rules("bill_submitted_in_treasury_after_pending_liabilities", "Bill submitted in Treasury after Total Pending Liabilities", "required|callback_valid_amount");
				$this->form_validation->set_rules("date", "Date", "required|callback_valid_date");
				$bat_id = $this->session->userdata('userid');
				//$this->form_validation->set_rules("remarks", "Remarks", "required");
				if($this->form_validation->run()==TRUE){
					$date = date_create_from_format('d/m/Y',$date);
					$out_date = date_format($date, 'Y-m-d');
					$status = $this->AccountBranch_model->addBill($soe, $alloted_amount, $expenditure_amount, $bill_submitted_in_treasury, $bill_submitted_in_treasury_after_pending_liabilities, $out_date, $remarks, $bat_id);
					if($status){
						$this->session->set_flashdata('success_msg', 'Bill added Successfully!');
						redirect('accounts');
					}else{
						$this->session->set_flashdata('error_msg','Bill Addition Failed. Try Again!');
					}
				}
			}
			
			$soes_obj = $this->AccountBranch_model->getSoes();
			$soes = [];
			foreach($soes_obj as $k=>$val){
				$soes[$val->id] = $val->name;
			}
			$data['soes'] = $soes;
			$this->load->view('AccountBranch/addAccountBillDetail',$data);
		}
		public function editBillDetail($id){
			if(!(in_array($this->session->userdata('user_log'),array(10)))){
				redirect('bt-dashboard');
			}
			
			//echo 'Add Detail over here
			$this->load->library('form_validation');
			$this->load->model('AccountBranch_model');
			$bill = $this->AccountBranch_model->getBill($id);
			if(count($bill)<=0){
				redirect('accounts');
			}
			$date = date_create_from_format('Y-m-d h:i:s',$bill[0]->date);
			$bill[0]->date = date_format($date, 'd/m/Y');
			$data['bill'] = $bill[0];
			if(!(in_array($this->session->userdata('user_log'),array(10)) && $bill[0]->bat_id==$this->session->userdata('userid'))){
				redirect('bt-dashboard');
			}
			if(null!=$this->input->post('submit')){
				$soe = $this->input->post('soe');
				$alloted_amount = $this->input->post('alloted_amount');
				$expenditure_amount = $this->input->post('expenditure_amount');
				$bill_submitted_in_treasury = $this->input->post('bill_submitted_in_treasury');
				$bill_submitted_in_treasury_after_pending_liabilities = $this->input->post('bill_submitted_in_treasury_after_pending_liabilities');
				$date = $this->input->post('date');
				$remarks = $this->input->post('remarks');
				
				$this->form_validation->set_rules("soe", "SOE", "required");
				$this->form_validation->set_rules("alloted_amount", "Alloted Amount", "required|callback_valid_amount");
				$this->form_validation->set_rules("expenditure_amount", "Expenditure Amount", "required|callback_valid_amount");
				$this->form_validation->set_rules("bill_submitted_in_treasury", "Bill submitted in Treasury", "required|callback_valid_amount");
				$this->form_validation->set_rules("bill_submitted_in_treasury_after_pending_liabilities", "Bill submitted in Treasury after Total Pending Liabilities", "required|callback_valid_amount");
				$this->form_validation->set_rules("date", "Date", "required|callback_valid_date");
				$bat_id = $this->session->userdata('userid');
				//$this->form_validation->set_rules("remarks", "Remarks", "required");
				if($this->form_validation->run()==TRUE){
					$date = date_create_from_format('d/m/Y',$date);
					$out_date = date_format($date, 'Y-m-d');
					if($bill[0]->bat_id==$this->session->userdata('userid')){
						$status = $this->AccountBranch_model->updateBill($id, $soe, $alloted_amount, $expenditure_amount, $bill_submitted_in_treasury, $bill_submitted_in_treasury_after_pending_liabilities, $out_date, $remarks);
						if($status){
							$this->session->set_flashdata('success_msg', 'Bill updated Successfully!');
							redirect('accounts');
						}else{
							$this->session->set_flashdata('error_msg','Bill Updation Failed. Try Again!');
						}
					}else{
						
					}
				}
			}
			
			$soes_obj = $this->AccountBranch_model->getSoes();
			$soes = [];
			foreach($soes_obj as $k=>$val){
				$soes[$val->id] = $val->name;
			}
			$data['soes'] = $soes;
			$this->load->view('AccountBranch/editAccountBillDetail',$data);
		}
		public function ajaxBillDelete(){
			if(!(in_array($this->session->userdata('user_log'),array(10)))){
				redirect('bt-dashboard');
			}
			$this->load->model('AccountBranch_model');
			
			if(null!=$this->input->post('bill_id')){
				$bill_id = $this->input->post('bill_id');
				$user_id = $this->session->userdata('userid');
				$canBillByDeletedByCurrentUser = $this->canBillBeDeletedByCurrentUser($user_id, $bill_id);
				if($canBillByDeletedByCurrentUser){
					$status = $this->AccountBranch_model->deleteBill($bill_id,$user_id);
				}else{
					$status = false;
				}
			}else{
				$status = false;
			}
			echo json_encode(['status'=>$status]);
		}
		public function canBillBeDeletedByCurrentUser($user_id, $bill_id){
			$this->load->model('AccountBranch_model');
			$bill = $this->AccountBranch_model->getBill($bill_id);
			if((count($bill)>0) && ($bill[0]->bat_id==$user_id)){
				return true;
			}else{
				return false;
			}
		}
		public function accountBranchBillDownloadExcel(){
			
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Account Branch Bill List")
										 ->setKeywords("Bill List, Account Branch")
										 ->setCategory("Account Branch");
			$counti= 0;
			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Account Branch Bill List'); 
			
			$counter = 0;
			$row=1;
			
			$titleStyle = array(
				'font'  => array(
					'size'  => 15,
					'name'  => 'Verdana',
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF00a0')
					),
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			$centerStyle = array(
				'font'=>array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				)
			);
			//$unit__ = $this->input->post('unit');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Account Branch ('.$this->session->userdata('nick').') Bill List');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:I1");
			$row++;
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			$styleArray = array(
				'font' => array(
					'bold' => true
				)
			);
			$cols = array('C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R');
			$i=0;
			$grand_total = array();
			$skipZero = false;
			if(isset($_POST['downloadExcel'])){
				if(isset($_POST['skipZero'])){
					$skipZero = true;
				}
			}
			error_reporting(0);
			//$_POST['length'] = 10;
			//$_POST['start'] = 1;
			$this->load->model("AccountBranch_model");
			if(null!=$this->input->post('soe')){
				$soe_name = $this->input->post('soe');
			}else{
				$soe_name = '';
			}
			$soes = $this->AccountBranch_model->getSoes($soe_name);
			$soe_ids = null;
			foreach($soes as $k=>$val){
				$soe_ids[] = $val->id;
			}
			
			$bills = $this->AccountBranch_model->getBills([$this->session->userdata('userid')],$soe_ids);
			$data = [];
			$sno=1;
			if(isset($_POST['start']) && $_POST["start"] != -1){
				$sno = $_POST['start']+1;
			}
			$total_bills = $this->AccountBranch_model->getBillsCount([$this->session->userdata('userid')],$soe_ids);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'S. No.');
			$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->applyFromArray($styleArray);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, 'Name of SOE');
			$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, 'Alloted Amount');
			$objPHPExcel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($styleArray);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, 'Expenditure');
			$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'Bill Submitted Into Treasury');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, 'Balance Fund');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, 'Bill Submitted into Treasury after total pending Liabilities');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, 'Date');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I'.$row, 'Remarks');
			
			$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);
			$row++;
			$styleArray = array(
				'font'  => array(
					'name'  => 'AnmolKalmi'
				));
			//$phpExcel->getActiveSheet()->getCell('A1')->setValue('Some text');
			
			if(count($bills)<=0){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, 'No Records Found');
			}else{
				foreach($bills as $k=>$val){
					
					$calculated = $val->amount_alloted-$val->expenditure_amount-$val->bill_sub_treasury;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $sno);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $val->name);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $val->amount_alloted);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $val->expenditure_amount);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $val->bill_sub_treasury);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $calculated);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $val->bill_sub_treasury_after_liabilities);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $val->date);
					
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I'.$row, $val->remarks);
					$objPHPExcel->getActiveSheet()->getStyle('I'.$row)->applyFromArray($styleArray);
					$data[] = $bill;
					$sno++;
					$row++;
				}
			}
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_start();
			$objWriter->save('php://output');
			$xlsData = ob_get_contents();
			ob_end_clean();
			$response =  array(
				'op' => 'ok',
				'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
			);
			die(json_encode($response));
		}
		public function soesList(){
			if(!(in_array($this->session->userdata('userid'),array(222)) && $this->session->userdata('usertype')=='adm' )){
				redirect('bt-dashboard');
			}
			$this->load->model('AccountBranch_model');
			$soes = $this->AccountBranch_model->getSoes();
			
			$data['soes'] = $soes;
			$this->load->view('CA/AccountBranch/soesList',$data);
		}
		public function ajaxSoesList(){
			if(!(in_array($this->session->userdata('userid'),array(222)) && $this->session->userdata('usertype')=='adm' )){
				redirect('bt-dashboard');
			}
			$this->load->model('AccountBranch_model');
			if(null!=$this->input->post('search')){
				$soe_name = $this->input->post('search');
			}else{
				$soe_name = null;
			}
			$soes = $this->AccountBranch_model->getSoes($soe_name);
			$data = [];
			$sno=1;
			foreach($soes as $k=>$val){
				$soe = [];
				$soe['sno'] = $sno;
				$soe['name'] = $val->name;
				$soe['created'] = $val->created;
				$soe['action'] = '<a href="'.base_url().'account-soe-edit/'.$val->id.'" class="glyphicon glyphicon-pencil black"></a> | <a class="glyphicon glyphicon-trash red" onClick="showModal('.$val->id.');false;"></a>'; 
				$data[] = $soe;
				$sno++;
			}
			$total_soes = $this->AccountBranch_model->getSoesCount($soe_name);
			
			$output = array(
				//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
				"draw" =>intval($_POST['draw']),
				"recordsTotal" =>$total_soes,//$this->Posting_model->getTotalEmployees(),
				"recordsFiltered" =>$total_soes,//$this->Posting_model->getTotalFilteredEmployees(),
				"data"	=>$data,
			);
			echo json_encode($output);
		}
		public function ajaxSoeDelete(){
			if(!(in_array($this->session->userdata('userid'),array(222)) && $this->session->userdata('usertype')=='adm' )){
				redirect('bt-dashboard');
			}
			$this->load->model('AccountBranch_model');
			
			if(null!=$this->input->post('soe_id')){
				$soe_id = $this->input->post('soe_id');
				$user_id = $this->session->userdata('userid');
				$used = $this->isSoeUsedByBills($soe_id);
				if(!$used){
					$status = $this->AccountBranch_model->deleteSoe($soe_id,$user_id);
				}else{
					$status = false;
				}
			}else{
				$status = false;
			}
			echo json_encode(['status'=>$status]);
		}
		public function isSoeUsedByBills($soe_id){
			$bill = $this->AccountBranch_model->getBill($soe_id);
			if(count($bill) > 0){
				return true;
			}
		}
		public function addSoe(){
			if(!(in_array($this->session->userdata('userid'),array(222)) && $this->session->userdata('usertype')=='adm' )){
				redirect('bt-dashboard');
			}
			$this->load->library('form_validation');
			$this->load->model("AccountBranch_model");
			$this->load->helper('form');
			
			if(null!=$this->input->post('submit')){
				//get the input
				$title = $this->input->post('title');
				//validate it
				$this->form_validation->set_rules("title", "SOE's Title", "required");
				$this->form_validation->set_rules('title','SOE\'s Title','callback_unique');
				//$this->form_validation->set_rules('parent_posting','Parent Posting','required');
				if($this->form_validation->run()){
					if($this->AccountBranch_model->addSoe($title)){
						$this->session->set_flashdata('success_msg','SOE has added succesfully !');
						redirect('account-soes-list');
					}else{
						$this->session->set_flashdata('error_msg','SOE Addition Failed.');
					}
				}
			}
			$this->load->view('CA/AccountBranch/addSoe');
		}
		public function unique($title,$id=null){
			if($this->AccountBranch_model->isUnique($title,$id)){
				return true;
			}else{
				$this->form_validation->set_message('unique', 'SOE Title already Exists.');
				return false;
			}
		}
		
		public function valid_amount($amount,$id=null){
			$pattern = "/^[0-9]+([.]{1}[0-9]{1,2})?$/";
			if(preg_match($pattern, $amount)){
				return true;
			}else{
				$this->form_validation->set_message('valid_amount', 'Please Enter Valid amount.');
				return false;
			}
		}
		public function valid_date($date){
			$this->form_validation->set_message('valid_date', 'Invalid Date!!');
			//echo $date;
			if(preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/',$date)){
				return true;
			}else{
				return false;
			}
		}
		public function editSoe($id){
			if(!(in_array($this->session->userdata('userid'),array(222)) && $this->session->userdata('usertype')=='adm' )){
				redirect('bt-dashboard');
			}
			$this->load->library('form_validation');
			$this->load->model("AccountBranch_model");
			$this->load->helper('form');
			
			if(null!=$this->input->post('submit')){
				//get the input
				$title = $this->input->post('title');
				//validate it
				$this->form_validation->set_rules("title", "SOE's Title", "required");
				$this->form_validation->set_rules('title','SOE\' Title','callback_unique['.$id.']');
				//$this->form_validation->set_rules('parent_posting','Parent Posting','required');
				if($this->form_validation->run()){
					if($this->AccountBranch_model->updateSoe($title,$id)){
						$this->session->set_flashdata('success_msg','SOE has updated succesfully !');
						redirect('account-soes-list');
					}else{
						$this->session->set_flashdata('error_msg','SOE Updation Failed.');
					}
				}
			}
			$soe = $this->AccountBranch_model->getSoe($id);
			$data['soe'] = $soe[0];
			$this->load->view('CA/AccountBranch/editSoe',$data);
		}
	}
?>