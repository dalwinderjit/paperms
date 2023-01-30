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
			//var_dump($_POST);
			//var_dump($this->input->post('page'));
			//var_dump($this->input->post('term'));
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => API_URL."getUserByBeltNo",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS=>http_build_query(["depttno"=>$this->input->post('term'),"pageNo"=>$this->input->post('page')]),
				CURLOPT_HTTPHEADER => array(
				  "cache-control: no-cache"
				),
			  ));
			  
			  $response = curl_exec($curl);
			  $err = curl_error($curl);
			  curl_close($curl);
			  echo $response;
			//$this->load->view('BPT/index',$data);
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
			$data = [];
			//get the candidate info
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => API_URL."getCandidateInBPTById",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS=>http_build_query(['id'=>$id]),
				CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache"
				),
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			$data_ = json_decode($response);
			if($data_->status==true){
				$data['employee'] = $data_->employee;
				$data['candidate'] = $data_->candidate;
			}else{
				$this->session->set_flashdata('error_msg', $data_->message);
				redirect('BPT/addEmployee');
			}
			//var_dump($data['employee']);die;
			//get the employee info from man_id
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
			  if (!dbase_create('D:/test.dbf', $def)) {
				echo "Error, can't create the database\n";
			  }
		}
	}
