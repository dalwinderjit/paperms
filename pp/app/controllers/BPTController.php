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
				CURLOPT_URL => "http://localhost/api.paperms/public/api/getUserByBeltNo",
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
			$this->load->helper('common');
			$this->load->helper('security');
			$this->load->helper('osi');
			$this->load->model('Btalion/Btalion_model');
			$this->load->model('Osi_model');
			$this->load->helper('date');
			$data =[];
			$selected_employees = $this->input->post('selectedEmployees');
			if($this->input->post('submit')){
				//var_dump($selected_employees);
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => "http://localhost/api.paperms/public/api/addCandidatesToBPT",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS=>http_build_query(["selected_employees"=>explode(',',$selected_employees),'bpt_id'=>1]),
					CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache"
					),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				$json_data = json_decode($response);
				if($json_data->status==true){
					$this->session->set_flashdata('success_msg', $json_data->message);
				}else{
					$this->session->set_flashdata('error_msg', $json_data->message);
				}
			}
			$employees = [];
			$bpt_id = 1;
			$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => "http://localhost/api.paperms/public/api/getBPTCandidates",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS=>http_build_query(['bpt_id'=>$bpt_id]),
					CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache"
					),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
			$data['employees'] = json_decode($response);
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
				CURLOPT_URL => "http://localhost/api.paperms/public/api/getCandidateInBPTById",
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
	}
?>