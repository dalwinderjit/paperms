<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class BPTController extends CI_Controller
	{	
		public function __construct(){
			parent:: __construct();
			//$this->permission->is_logged_in(); 
			//$this->permission->clear_cache();
			//$this->load->model(F_BTALION.'Btalion_model'); 
			//$this->$total_row = false;
		}
		public function getBeltNumbers(){
			$this->load->library('BPT_lib');
			$bpt_lib = new BPT_lib();
			$belt_numbers = $bpt_lib->getBeltNumbers($this->input->post('term'),$this->input->post('page'));
			echo $belt_numbers;
		}
		public function AddEmployeeToBPT(){
			$this->load->library('form_validation');
			$this->load->library('BPT_lib');
			$this->load->helper('common');
			$this->load->helper('security');
			$this->load->helper('osi');
			$this->load->model('Btalion/Btalion_model');
			$this->load->model('Osi_model');
			$this->load->helper('date');
			$data =[];
			$selected_employees = $this->input->post('selectedEmployees');
			//var_dump($selected_employees);die;
			$bpt_lib = new BPT_lib();
			$bpt_list = $bpt_lib->getBPTListFromAPI();
			$bpts = [];
			$bpt_id = 1;
			if($this->input->post('bpt_id')!=null){
				$bpt_id = $this->input->post('bpt_id');
			}
			foreach($bpt_list as $k=>$val){
				$bpts[$val->id] = $val->title;
			}
			if($this->input->post('submit')){
				$json_data = $bpt_lib->AddCandidateToBPT($selected_employees,$bpt_id);
				
				if($json_data!=null && $json_data->status==true){
					$this->session->set_flashdata('success_msg', $json_data->message);
				}else{
					if($json_data!=null){
						$this->session->set_flashdata('error_msg', $json_data->message);
					}else{
						$this->session->set_flashdata('error_msg', "Empty Response");	
					}
				}
			}
			
			$data['employees'] = json_decode($bpt_lib->getBPTCandidates($bpt_id));
			$data['bpt'] = $bpts;
			$data['selected_employees'] = $selected_employees;
			$this->load->view('BPT/addEmployee',$data);
		}
		public function EditEmployeeInBPT($id){
			$this->load->library('form_validation');
			$this->load->helper('common');
			$this->load->helper('security');
			$this->load->helper('osi');
			$this->load->helper('date');
			$this->load->model("Osi_model");
			$this->load->library("BPT_lib");
			$this->load->library("APIErrors");
			$data = [];
			$bpt = new BPT_lib();
			$apiError = new APIErrors();
			$category = $this->input->post('category');
			$caste = $this->input->post('caste');
			$dob = $this->input->post('dob');
			$c1_cert = $this->input->post('c1_cert');
			$c2_cert = $this->input->post('c2_cert');
			$c3_cert = $this->input->post('c3_cert');
			$c3_cert = $this->input->post('c3_cert');
			$roll_number = $this->input->post('roll_number');
			$dateofenlistment = $this->input->post('dateofenlistment');
			//$battalion_dis_code = $this->input->post('battalion_dis_code');
			//$deputaiion = $this->input->post('deputaiion');
			//$maritialstatus = $this->input->post('maritialstatus');
			//$rtc_pass = $this->input->post('rtc_pass');
			$remarks1 = $this->input->post('remarks1');
			$remarks2 = $this->input->post('remarks2');
			$PRO_CHK = $this->input->post('PRO_CHK');
			$NDL_CHK = $this->input->post('NDL_CHK');
			//$profile_pic = '';
			//$profile_pic = $_FILES['profile_pic'];
			//major punishment
			$phono1 = $this->input->post('phone1');
			$phono2 = $this->input->post('phone2');
			$email = $this->input->post('email');
			//$bloodgroup = $this->input->post('bloodgroup');
			//$Identificationmark = $this->input->post('Identificationmark');
			if($this->input->post('submit')!=null){
				$data1 = [
					'id'=>$id,
					'roll_no'=>$roll_number,
					'category'=>$category,
					'caste' =>$caste,
					'dob' =>$dob,
					'c1_cert' =>$c1_cert,
					'c2_cert' =>$c2_cert,
					'c3_cert' =>$c3_cert,
					'c3_cert' =>$c3_cert,
					'roll_number' =>$roll_number,
					'dateofenlistment' =>$dateofenlistment,
					//$battalion_dis_code =>$battalion_dis_code,
					//$deputaiion =>$deputaiion,
					//$maritialstatus =>$maritialstatus,
					//$rtc_pass =>$rtc_pass,
					'remarks1' =>$remarks1,
					'remarks2' =>$remarks2,
					'PRO_CHK' =>$PRO_CHK,
					'NDL_CHK' =>$NDL_CHK,
					//'profile_pic' => $_FILES['profile_pic'],
					//'major punishment'=>$major_punishment,
					'phono1' =>$phono1,
					//'phono2' =>$phono2,
					//'email' =>$email,
				];
				$bad_entry_title = $this->input->post('title');
				$bad_entry_date = $this->input->post('entry_date');
				$bad_entry_id = $this->input->post('Id');
				$bad_entry_deleted = $this->input->post('deleted');
				$bad_entries = [];

				for($i=0;$i<count($bad_entry_title);$i++){
					if(($bad_entry_title[$i]==null || $bad_entry_title[$i]=="" ||$bad_entry_date[$i]==null || $bad_entry_date[$i]=='')){

					}else{
						$bad_entries[$i] = new stdClass;
						if(isset($bad_entry_id[$i]) && $bad_entry_id[$i]!=null){
							$bad_entries[$i]->Id=$bad_entry_id[$i];
							$bad_entries[$i]->deleted=$bad_entry_deleted[$i];
						}
						$bad_entries[$i]->title=$bad_entry_title[$i];
						$bad_entries[$i]->entry_date=$bad_entry_date[$i];
					}
				}
				$data1['bad_entries'] = json_encode($bad_entries);
				//echo $data1['bad_entries'];die;
				if($email!=null){
					$data1['email'] = $email;
				}
				if($phono2!=null){
					$data1['phono2'] = $phono2;
				}
				$response = $bpt->EditEmployeeInBPT($data1);
				//var_dump($response);die;
				if($response->status==false){
					$this->session->set_flashdata('error_msg', $response->message);
					$apiError->setErrors($response->errors);
					
				}else{
					$this->session->set_flashdata('success_msg', $response->message);
				}
			}
			$data_= $bpt->GetCandidateInBPTById($id);
			if($data_->status==true){
				$data['employee'] = $data_->employee;
				$data['candidate'] = $data_->candidate;
				$data['bad_entries'] = $data_->bad_entries;
			}else{
				$this->session->set_flashdata('error_msg', $data_->message);
				redirect('BPT/addEmployee');
			}
			$data['apiError'] = $apiError;
			//var_dump($data['employee']);die;
			//get the employee info from man_id
			$this->units = $data['uname'] = $this->Osi_model->fetchinfo('users', array('user_log' => 4));
			$data['categories'] = array('' => '--Select--',  'GEN' => 'GEN', 'SCM' => 'SCM','SCO' => 'SCO', 'BC' => 'BC','OBC' => 'OBC', 'ST' => 'ST','SCBM' => 'SCBM', 'EWS' => 'EWS');;
			$data['maritialstatus'] = [''=>'--select Status','Married'=>'Married','Unmarried'=>'Unmarried'];
			$this->load->view('BPT/updateEmployee',$data);
		}
		public function EmployeeListInBPT(){
			$this->load->view('BPT/list',$data);
		}
		public function GetEmployeesByIds(){
			$this->load->library('BPT_lib');
			$bpt = new BPT_lib();
			$ids = $this->input->post('ids');
			
			//var_dump($ids);
			echo json_encode($bpt->GetEmployeesByIds($ids));
		}
		public function CreateDbaseFile(){
			$def = array(
				array("date",     "D"),
				array("name",     "C",  50),
				array("age",      "N",   3, 0),
				array("email",    "C", 128),
				array("ismember", "L")
			  );
			  
			  // creation
			  if (!dbase_create('D:/test.DBF', $def)) {
				echo "Error, can't create the database\n";
			  }
		}
		public function AdmitCard($id){
			$this->load->library('form_validation');
			$this->load->helper('common');
			$this->load->helper('security');
			$this->load->helper('osi');
			$this->load->helper('date');
			$this->load->model("Osi_model");
			$this->load->library("BPT_lib");
			$this->load->library("APIErrors");
			$data = [];
			$bpt = new BPT_lib();
			$data_= $bpt->GetCandidateInBPTById($id);
			if($data_->status==true){
				$data['employee'] = $data_->employee;
				$data['candidate'] = $data_->candidate;
				$data['bad_entries'] = $data_->bad_entries;
			}else{
				$this->session->set_flashdata('error_msg', $data_->message);
				redirect('BPT/addEmployee');
			}
			//var_dump($data['employee']);die;
			//get the employee info from man_id
			$this->units = $data['uname'] = $this->Osi_model->fetchinfo('users', array('user_log' => 4));
			$data['categories'] = array('' => '--Select--',  'GEN' => 'GEN', 'SCM' => 'SCM','SCO' => 'SCO', 'BC' => 'BC','OBC' => 'OBC', 'ST' => 'ST','SCBM' => 'SCBM', 'EWS' => 'EWS');;
			$data['maritialstatus'] = [''=>'--select Status','Married'=>'Married','Unmarried'=>'Unmarried'];
			$this->load->view('BPT/admitCard',$data);
		}
	}
