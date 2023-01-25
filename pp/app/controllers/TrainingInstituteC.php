<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class TrainingInstituteC extends CI_Controller
	{	
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
		}
		public function addInstitute(){
			$this->load->library('form_validation');
			$this->load->model('TrainingInstitute_model');
			if(null!=$this->input->post('submit')){
				$institute_name = $this->input->post('institute_name');
				$institute_address = $this->input->post('institute_address');
				
				$this->form_validation->set_rules('institute_name','Training Institute Name','required');
				$this->form_validation->set_rules('institute_address','Training Institute Address','required');
				
				if($this->form_validation->run()!=false){
					$a = $this->TrainingInstitute_model->addInstitute($institute_name,$institute_address);
					if($a){
						$this->session->set_flashdata('success_msg','Institute added Successfully!');
						redirect('training-institute/institute-list');
					}else{
						$this->session->set_flashdata('error_msg','Failed to save Institute!');
					}
				}
			}
			$this->load->view('Ca/training-institute/add_training_institute');
		}
		
		
		public function listInstitute(){
			$this->load->view('Ca/training-institute/list_training_institute');
		}
		public function ajaxListInstitute(){
			//var_dump($_POST);
			$length=null;
			$start =null;
			if(null!=$this->input->post('length') && $this->input->post("length") != -1){
				$length=$this->input->post('length');
				$start = $this->input->post('start');
			}
			$searchText = $this->input->post('search')['value'];
			$order_by = 'institute_name';
			$order = 'asc';
			$this->load->model('TrainingInstitute_model');
			$training_institute_objs = $this->getTrainingInstitutes($searchText,$length,$start,$order_by,$order);
			$training_institutes = [];
			$sno = 1;
			foreach($training_institute_objs as $k=>$training_institute_obj){
				$temp_training_institute = [];
				$temp_training_institute['sno'] = $sno;
				$temp_training_institute['institute_name']=$training_institute_obj->institute_name;
				$temp_training_institute['address']=$training_institute_obj->address;
				$temp_training_institute['created']=$training_institute_obj->created;
				$temp_training_institute['enabled']=$training_institute_obj->enabled;
				$temp_training_institute['deleted']=$training_institute_obj->deleted;
				if($training_institute_obj->deleted=='NO'){
					$delete = '<a href="'.base_url().'training-institute/delete-institute/'.$training_institute_obj->id.'">Delete</a>';
				}else{
					$delete = '<a href="'.base_url().'training-institute/recover-institute/'.$training_institute_obj->id.'">Recover</a>';
				}
				$temp_training_institute['action']='<a href="'.base_url().'training-institute/edit-institute/'.$training_institute_obj->id.'">Edit</a> | '.$delete;
				$training_institutes[] = $temp_training_institute;
				$sno++;
			}
			$total_training_institutes = $this->TrainingInstitute_model->getTotalTrainingInstitutes(null);
			$total_filtered_training_institutes = $this->TrainingInstitute_model->getTotalFilteredTrainingInstitutes(null,$searchText);
			$data = [
				'data'=>$training_institutes,
				'recordsTotal'=>$total_training_institutes,
				"recordsFiltered"=>$total_filtered_training_institutes
			];
			echo json_encode($data);
		}
		public function getTrainingInstitutes($searchText=null,$length=null,$start=null,$order_by=null,$order=null){
			$this->load->model('TrainingInstitute_model');
			$where = ['institute_name'=>$searchText,'address'=>$searchText];
			return $this->TrainingInstitute_model->getInstitutesNames($where,$length,$start,$order_by,$order);
		}
		
		
		public function editInstitute($id){
			$this->load->model("TrainingInstitute_model");
			$this->load->library('form_validation');
			$trainingInstitute = $this->TrainingInstitute_model->getInstitute($id);
			if($trainingInstitute==null && count($trainingInstitute)<=0){
				$this->session->set_flashdata('error_msg','Trining Institute Not Found!');
				redirect('training-institute/institute-list');
			}
			if(null!=$this->input->post('submit')){
				$institute_name = $this->input->post('institute_name');
				$institute_address = $this->input->post('institute_address');
				$enabled = $this->input->post('enabled');
				$deleted = $this->input->post('deleted');
				$this->form_validation->set_rules('institute_name','Institute Name','required|callback_unique_institute_name['.$id.']');
				$this->form_validation->set_rules('enabled','Enabled Status','required|callback_validEnabled');
				$this->form_validation->set_rules('deleted','Deleted Status','required|callback_validDeleted');
				if($this->form_validation->run()!=false){
					$a = $this->TrainingInstitute_model->udpateInstitute($id,$institute_name,$institute_address	,$enabled,$deleted);
					if($a){
						$this->session->set_flashdata('success_msg','InstituteUpdation Successfull!');
						redirect('training-institute/institute-list');
					}else{
						$this->session->set_flashdata('error_msg','Failed to update Training Institute!');
					}
				}
			}
			$data['trainingInstitute'] = $trainingInstitute[0];
			$data['id'] = $id;
			$data['enabled'] = ['YES'=>'YES','NO'=>'NO'];
			$data['deleted'] = ['YES'=>'YES','NO'=>'NO'];
			$this->load->view('Ca/training-institute/edit_training_institute',$data);
		}
		/***
			Below is Extra 
		 */
		public function validEnabled($enabled){
			if(!in_array($enabled,['YES','NO'])){
				$this->form_validation->set_message('validEnabled','Invalid Selection');
				return false;
			}else{
				return true;
			}
		}
		public function validDeleted($deleted){
			if(!in_array($deleted,['YES','NO'])){
				$this->form_validation->set_message('validDeleted','Invalid Selection');
				return false;
			}else{
				return true;
			}
		}
		public function unique_institute_name($name=null,$id=null){
			$this->load->model('TrainingInstitute_model');
			
			$a = $this->TrainingInstitute_model->getTotalTrainingInstitutesWithName($name,$id);
			if(!$a){
				return true;
			}else{
				$this->form_validation->set_message('unique_course_name','Course Name exists');
				return false;
			}
		}
		
		/**
			delet the rank group by id
		*/
		public function deleteInstitute($id){
			
			$this->load->model("TrainingInstitute_model");
			$a = $this->TrainingInstitute_model->deleteInstitute($id);
			if($a){
				$this->session->set_flashdata('success_msg','Rank Deleted Successfully!');
				redirect('training-institute/institute-list');
			}else{
				$this->session->set_flashdata('error_msg','Rank Deletion Failed!');
				redirect('training-institute/institute-list');
			}
		}
		
		public function recoverInstitute($id){
			
			$this->load->model("TrainingInstitute_model");
			$a = $this->TrainingInstitute_model->recoverInstitute($id);
			if($a){
				$this->session->set_flashdata('success_msg','Rank Deleted Successfully!');
				redirect('training-institute/institute-list');
			}else{
				$this->session->set_flashdata('error_msg','Rank Deletion Failed!');
				redirect('training-institute/institute-list');
			}
		}
		
	}
?>