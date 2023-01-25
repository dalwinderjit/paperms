<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class CourseMemberC extends CI_Controller
	{	
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
		}
		public function addCourseToEmployee($course_detail_id,$employee_id){
			$this->load->library('form_validation');
			$this->load->model('CourseMember_model');
			
			$data = [];
			$data['course_detail_id'] = $course_detail_id;
			$data['employee_id'] = $employee_id;
			$data['created'] = date('Y-m-d H:i:s');
			$data['deleted'] = 'NO';
			$data['enabled'] = 'YES';
			$a = $this->CourseMember_model->addCourseToEmployee($data);
			if($a){
				$this->session->set_flashdata('success_msg','Course Detail Saved Successfully!');
				redirect('bt-updates-manpower/'.$employee_id);
			}else{
				$this->session->set_flashdata('error_msg','Failed to save Course Detail!');
			}

		}
		
		public function ajaxAddCourseToEmployee2(){
			$this->load->library('form_validation');
			$this->load->model('CourseMember_model');
			$success = false;
			$message = '';
			$errors = [];
			$data = [];
			
			$data['course_detail_id'] = $this->input->post('course_detail_id');
			$data['employee_id'] = $this->input->post('selected_user_id');
			$data['order_no'] = $this->input->post('order_no');
			$data['created'] = date('Y-m-d H:i:s');
			$data['deleted'] = 'NO';
			$data['enabled'] = 'YES';
			
			$execute1 = false;
			$execute2= false;
			$execute3= true;
			if(trim($data['order_no'])==''){
				$successs = false;
				$execute3=false;
				$errors['order_no'] = 'Order No is Required';
			}
			if($this->CourseMember_model->isUniqueCourseMember($data)){
				$execute1 = true;
			}else{
				$message.='Course Member already Exists';
			}
			if($this->CourseMember_model->isUniqueCourseMemberOrderNo($data)){
				$execute2 = true;
			}else{
				$message.='<br>Order Number already Exists';
			}
			if($execute1 && $execute2 && $execute3){
				$a = $this->CourseMember_model->addCourseToEmployee($data);
				if($a){
					//$this->session->set_flashdata('success_msg','Course Detail Saved Successfully!');
					$message .= 'Course detail added successfully';
					$success = true;
				}else{
					//$this->session->set_flashdata('error_msg','Failed to save Course Detail!');
					$message .= 'Course detail addition failed.';
					$success = false;
					
				}
			}else{
				
			}
			echo json_encode(['success'=>$success,'message'=>$message,'errors'=>$errors]);

		}
		public function ajaxAddCourseToEmployee(){
			$this->load->library('form_validation');
			$this->load->model('CourseMember_model');
			$success = false;
			$message = '';
			$errors = [];
			$data = [];
			$this->load->model('TrainingInstitute_model');
			$this->load->model('Course_model');
			
			$where = ['deleted'=>'NO','enabled'=>'YES'];
			$training_institutes_objs = $this->TrainingInstitute_model->getInstitutesIDNamePair($where);
			$training_institutes = [];
			foreach($training_institutes_objs as $k=>$val){
				$training_institutes[$val->id] = $val->institute_name;
			}
			//$data['training_institutes'] = $training_institutes;
			$courses =[];
			$courses_objs = $this->Course_model->getCoursesIDNamePair($where);
			foreach($courses_objs as $k=>$val){
				$courses[$val->id] = $val->course_name;
			}
			
			$data['course_id'] = $this->input->post('course_id');
			$data['training_institute_id'] = $this->input->post('training_institute_id');
			$data['employee_id'] = $this->input->post('employee_id');
			$data['course_start_date'] = $this->converDateToYMDfromDMY($this->input->post('course_start_date')).' 00:00:00';
			$data['course_end_date'] = $this->converDateToYMDfromDMY($this->input->post('course_end_date')).' 23:59:59';
			$data['order_date'] = $this->converDateToYMDfromDMY($this->input->post('course_order_date'));
			$data['order_no'] = $this->input->post('order_no');
			$data['created'] = date('Y-m-d H:i:s');
			$data['deleted'] = 'NO';
			$data['enabled'] = 'YES';
			
			$this->form_validation->set_rules('course_id','Course','required|callback_valid_course['.serialize($courses).']');
			$this->form_validation->set_rules('training_institute_id','Training Institute','required|callback_valid_training_institute['.serialize($training_institutes).']');
			$this->form_validation->set_rules('employee_id','Employee','required|callback_valid_employee');
			$this->form_validation->set_rules('order_no','Order Number','required');//|callback_unique_order_no');
			$this->form_validation->set_rules('course_start_date','Course Start Date','required|callback_valid_date');
			$this->form_validation->set_rules('course_end_date','Course End Date','required|callback_valid_date');
			$this->form_validation->set_rules('course_order_date','Course Order Date','required|callback_valid_date');
			
			if($this->form_validation->run()!=false){
				$a = $this->CourseMember_model->addCourseToEmployee($data);
				if($a){
					//$this->session->set_flashdata('success_msg','Course Detail Saved Successfully!');
					$message .= 'Course detail added successfully';
					$success = true;
				}else{
					//$this->session->set_flashdata('error_msg','Failed to save Course Detail!');
					$message .= 'Course detail addition failed.';
					$success = false;
					
				}
			}else{
				$success=false;
				$message ='Validations failed'.validation_errors();
				if(form_error('training_institute_id')!=''){
					$errors['apc_training_institute_add_error'] = form_error('training_institute_id');
				}
				if(form_error('course_id')!=''){
					$errors['apc_courses_add_error'] = form_error('course_id');
				}
				if(form_error('order_no')!=''){
					$errors['apc_course_order_number_add_error'] = form_error('order_no');
				}
				if(form_error('course_start_date')!=''){
					$errors['apc_course_start_date_add_error'] = form_error('course_start_date');
				}
				if(form_error('course_end_date')!=''){
					$errors['apc_course_end_date_add_error'] = form_error('course_end_date');
				}
				if(form_error('course_order_date')!=''){
					$errors['apc_course_order_date_add_error'] = form_error('course_order_date');
				}
				if(count($errors)>0){
						echo json_encode(['success'=>$success,'message'=>$message,'errors'=>$errors]);die;
				}else{
					echo json_encode(['success'=>$success,'message'=>$message]);die;
				}
			}
			echo json_encode(['success'=>$success,'message'=>$message,'errors'=>$errors]);

		}
		//Validations
		public function unique_order_no($order_no,$course_id=null){
			$this->load->model('CourseDetail_model');
			$a = (int)$this->CourseDetail_model->isCourseOrderNoUnique(trim($order_no),$course_id);
			if($a=='0'){
				return true;
			}else{
				$this->form_validation->set_message('unique_order_no','Order Number Exists');
				return false;
			}
				
		}
		public function valid_date($dateString){
			$myDateTime = DateTime::createFromFormat('d/m/Y', $dateString);
			if($myDateTime){
				return true;
			}else{
				$this->form_validation->set_message('valid_date', 'Invalid Date!');
				return false;
			}
		}
		public function  valid_course($name,$courses){
			$courses = unserialize($courses);
			
			if(is_array($courses)){
				if(in_array($name,array_keys($courses))){
					return true;
				}else{
					$this->form_validation->set_message('valid_course','Invalid Course');
					return false;
				}
			}
		}
		public function  valid_training_institute($name,$courses){
			$courses = unserialize($courses);
			
			if(is_array($courses)){
				if(in_array($name,array_keys($courses))){
					return true;
				}else{
					$this->form_validation->set_message('valid_training_institute','Invalid Institute');
					return false;
				}
			}
		}
		public function converDateToYMDfromDMY($dateString){
			$myDateTime = DateTime::createFromFormat('d/m/Y', $dateString);
			if($myDateTime){
				$newDateString = $myDateTime->format('Y-m-d');
			}else{
				$newDateString = date('Y-m-d');
			}
			return $newDateString;
		}
		public function converDateToDMYfromYMD_HMS($dateString){
			$myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
			if($myDateTime){
				$newDateString = $myDateTime->format('d/m/Y');
			}else{
				$newDateString = date('Y-m-d');
			}
			
			return $newDateString;
		}
		/**
			convert input date Y-m-d to d/m/Y
		*/
		public function converDateToDMYfromYMD($dateString){
			$myDateTime = DateTime::createFromFormat('Y-m-d', $dateString);
			if($myDateTime){
				$newDateString = $myDateTime->format('d/m/Y');
			}else{
				$newDateString = date('Y-m-d');
			}
			return $newDateString;
		}
		public function valid_employee(){
			return true;
		}
		/**
		
		*/
		public function ajaxGetEmployeesCourseById(){
			$id = $this->input->post('id');
			$this->load->library('form_validation');
			$this->load->model('CourseMember_model');
			$this->load->helper('common');
			$success = false;
			$message = '';
			$errors = [];
			 $this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('id','Course History','required|callback_is_valid_employees_course');
			if($this->form_validation->run()){
				$courseMember = $this->CourseMember_model->getCourseById($id);
				if(count($courseMember)==1){
					$success = true;
					$message = 'OK';
					if($courseMember[0]->order_date=='0000-00-00'){
						$courseMember[0]->order_date='00/00/0000';
					}else{
						$courseMember[0]->order_date = converDateFromYMDtoDMY($courseMember[0]->order_date);
					}
					$courseMember[0]->course_start_date = convertDate2($courseMember[0]->course_start_date);
					$courseMember[0]->course_end_date = convertDate2($courseMember[0]->course_end_date);
					echo json_encode(['success'=>$success,'message'=>$message,'course'=>$courseMember[0]]);
					die;
				}else{
					$success = false;
					$message = 'No Data Found';
					echo json_encode(['success'=>$success,'message'=>$message]);
					die;
				}
			}else{
				$success = false;
				
				$message = 'Invalid data! '.form_error('id');
				if(form_error('id')!=''){
					$errors['id'] = form_error('id');
				}
				echo json_encode(['success'=>$success,'message'=>$message,'errors'=>$errors]);
				die;
			}
			
		}
		
		public function is_valid_employees_course($id){
			$course = $this->CourseMember_model->getCourseById($id);
			if($course!=null && count($course)>0){
				return true;
			}else{
				$this->form_validation->set_message('is_valid_employees_course','Course Do not Exists!');
				return false;
			}
		}
		
		public function ajaxUpdateProfessionalCourseDetail(){
			$message = '';
			$errors = [];
			$id = $this->input->post('id');
			$course_id = $this->input->post('course_id');
			$training_institute_id = $this->input->post('training_institute_id');
			$order_no = $this->input->post('order_no');
			$order_date = $this->input->post('order_date');
			$course_start_date = $this->input->post('course_start_date');
			$course_end_date = $this->input->post('course_end_date');
			
			$this->load->model('TrainingInstitute_model');
			$this->load->model('CourseMember_model');
			$this->load->model('Course_model');
			
			$where = ['deleted'=>'NO','enabled'=>'YES'];
			$training_institutes_objs = $this->TrainingInstitute_model->getInstitutesIDNamePair($where);
			$training_institutes = [];
			foreach($training_institutes_objs as $k=>$val){
				$training_institutes[$val->id] = $val->institute_name;
			}
			//$data['training_institutes'] = $training_institutes;
			$courses =[];
			$courses_objs = $this->Course_model->getCoursesIDNamePair($where);
			foreach($courses_objs as $k=>$val){
				$courses[$val->id] = $val->course_name;
			}
			
			$data['course_id'] = $this->input->post('course_id');
			$data['training_institute_id'] = $this->input->post('training_institute_id');
			//$data['employee_id'] = $this->input->post('employee_id');
			$data['course_start_date'] = $this->converDateToYMDfromDMY($this->input->post('course_start_date')).' 00:00:00';
			$data['course_end_date'] = $this->converDateToYMDfromDMY($this->input->post('course_end_date')).' 23:59:59';
			$data['order_date'] = $this->converDateToYMDfromDMY($this->input->post('course_order_date'));
			$data['order_no'] = $this->input->post('order_no');
			/* $data['created'] = date('Y-m-d H:i:s');
			$data['deleted'] = 'NO';
			$data['enabled'] = 'YES'; */
			
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', '');
			
			$this->form_validation->set_rules('id','Course Detail','required|callback_validCourseMember');
			$this->form_validation->set_rules('course_id','Course','required|callback_valid_course['.serialize($courses).']');
			$this->form_validation->set_rules('training_institute_id','Training Insititute','required|callback_valid_training_institute['.serialize($training_institutes).']');
			$this->form_validation->set_rules('order_no','Order Number','required');
			$this->form_validation->set_rules('order_date','Order Date','required|callback_valid_date');
			$this->form_validation->set_rules('course_start_date','Course Start Date','required|callback_valid_date');
			$this->form_validation->set_rules('course_end_date','Course End Date','required|callback_valid_date');
			if($this->form_validation->run()!=false){
				$a = $this->CourseMember_model->updateCourseToEmployee($id,$data);
				if($a){
					//$this->session->set_flashdata('success_msg','Course Detail Saved Successfully!');
					$message .= 'Course detail updated successfully';
					$success = true;
				}else{
					//$this->session->set_flashdata('error_msg','Failed to save Course Detail!');
					$message .= 'Course detail updation failed.';
					$success = false;
					
				}
			}else{
				$success=false;
				$message ='Validations failed'.validation_errors();
				$errors = [];
				if(form_error('id')!=''){
					$errors['edit_course_id'] = form_error('id');
				}
				if(form_error('training_institute_id')!=''){
					$errors['apc_training_institute_edit_error'] = form_error('training_institute_id');
				}
				if(form_error('course_id')!=''){
					$errors['apc_courses_edit_error'] = form_error('course_id');
				}
				if(form_error('order_no')!=''){
					$errors['apc_course_order_number_edit_error'] = form_error('order_no');
				}
				if(form_error('course_start_date')!=''){
					$errors['apc_course_start_date_edit_error'] = form_error('course_start_date');
				}
				if(form_error('course_end_date')!=''){
					$errors['apc_course_end_date_edit_error'] = form_error('course_end_date');
				}
				if(form_error('order_date')!=''){
					$errors['apc_course_order_date_edit_error'] = form_error('order_date');
				}
				if(count($errors)>0){
						echo json_encode(['success'=>$success,'message'=>$message,'errors'=>$errors]);die;
				}else{
					echo json_encode(['success'=>$success,'message'=>$message]);die;
				}
			}
			echo json_encode(['success'=>$success,'message'=>$message,'errors'=>$errors]);
			die;
		}
		public function validCourseMember($id){
			return true;
		}
	}
?>