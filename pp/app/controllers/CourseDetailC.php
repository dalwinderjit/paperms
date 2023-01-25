<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class CourseDetailC extends CI_Controller
	{	
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
		}
		public function addCourseDetail(){
			$this->load->library('form_validation');
			$this->load->model('CourseDetail_model');
			$this->load->model('TrainingInstitute_model');
			$this->load->model('Course_model');
			
			$where = ['deleted'=>'NO','enabled'=>'YES'];
			$training_institutes_objs = $this->TrainingInstitute_model->getInstitutesIDNamePair($where);
			$training_institutes = [];
			foreach($training_institutes_objs as $k=>$val){
				$training_institutes[$val->id] = $val->institute_name;
			}
			$data['training_institutes'] = $training_institutes;
			$courses =[];
			$courses_objs = $this->Course_model->getCoursesIDNamePair($where);
			foreach($courses_objs as $k=>$val){
				$courses[$val->id] = $val->course_name;
			}
			$data['courses'] = $courses;
			if(null!=$this->input->post('submit')){
				$title = $this->input->post('title');
				$training_institute_id = $this->input->post('training_institute_id');
				$course_id = $this->input->post('course_id');
				$order_no = $this->input->post('order_no');
				$course_start_date = $this->converDateToYMDfromDMY($this->input->post('course_start_date')).' 00:00:00';
				$course_end_date = $this->converDateToYMDfromDMY($this->input->post('course_end_date')).' 23:59:59';
				$course_order_date = $this->converDateToYMDfromDMY($this->input->post('course_order_date'));
				$this->form_validation->set_rules('title','Course Detail Title','required|callback_uniqueCourseDetailTitle');
				$this->form_validation->set_rules('course_id','Course','required|callback_valid_course['.serialize($courses).']');
				$this->form_validation->set_rules('training_institute_id','Training Institute','required|callback_valid_training_institute['.serialize($training_institutes).']');
				$this->form_validation->set_rules('order_no','Order Number','required|callback_unique_order_no');
				$this->form_validation->set_rules('course_start_date','Course Start Date','required|callback_valid_date');
				$this->form_validation->set_rules('course_end_date','Course End Date','required|callback_valid_date');
				$this->form_validation->set_rules('course_order_date','Course Order Date','required|callback_valid_date');
				
				if($this->form_validation->run()!=false){
					$a = $this->CourseDetail_model->addCourseDetail($course_id,$title,$training_institute_id,$course_start_date,$course_end_date, $order_no, $course_order_date);
					if($a){
						$this->session->set_flashdata('success_msg','Course Detail Saved Successfully!');
						redirect('course-detail/list');
					}else{
						$this->session->set_flashdata('error_msg','Failed to save Course Detail!');
					}
				}
			}
			$this->load->view('Ca/courses-detail/add_course_detail',$data);
		}
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
		public function listCourseDetails(){
			$this->load->model('TrainingInstitute_model');
			$this->load->model('Course_model');
			$where = ['deleted'=>'NO','enabled'=>'YES'];
			$training_institutes_objs = $this->TrainingInstitute_model->getInstitutesIDNamePair($where);
			$training_institutes = [];
			$training_institutes[] = '--All--';
			foreach($training_institutes_objs as $k=>$val){
				$training_institutes[$val->id] = $val->institute_name;
			}
			$data['training_institutes'] = $training_institutes;
			$courses =[];
			$courses[] = '--All--';
			$courses_objs = $this->Course_model->getCoursesIDNamePair($where);
			foreach($courses_objs as $k=>$val){
				$courses[$val->id] = $val->course_name;
			}
			$data['courses'] = $courses;
			$this->load->view('Ca/courses-detail/list_course_details',$data);
		}
		public function ajaxListCourseDetail(){
			//var_dump($_POST);
			$length=null;
			$start =null;
			if(null!=$this->input->post('length') && $this->input->post("length") != -1){
				$length=$this->input->post('length');
				$start = $this->input->post('start');
			}
			$searchText = $this->input->post('search')['value'];
			$order_by = 'title';
			$order = 'desc';
			$where = null;
			$training_institute_id = null;
			$course_order_date = null;
			if(null!=$this->input->post('order_date')){
				$course_order_date = $this->converDateToYMDfromDMY($this->input->post('order_date'));
			}
			if(null!=$this->input->post('training_institute_id') && !in_array(trim($this->input->post('training_institute_id')),['','0'])){
				$training_institute_id = $this->input->post('training_institute_id');
				$where['training_institute_id'] = $training_institute_id;
			}
			$course_id = null;
			if(null!=$this->input->post('course_id') && !in_array(trim($this->input->post('course_id')),['','0']) ){
				$course_id = $this->input->post('course_id');
				$where['course_id'] = $course_id;
			}
			$title=null;
			if(null!=$this->input->post('title')){
				$searchText = $this->input->post('title');
			}
			$order_no = null;
			if(null!=$this->input->post('order_no')){
				$order_no = $this->input->post('order_no');
				
			}
			$this->load->model('CourseDetail_model');
			
			$coursedetail_objs = $this->getCourseDetailNames($searchText,$length,$start,$order_by,$order,$where,$order_no,$course_order_date);
			$course_detal_names = [];
			$sno = 1;
			foreach($coursedetail_objs as $k=>$coursedetail_obj){
				$temp_course_detail = [];
				$temp_course_detail['sno'] = $sno;
				$temp_course_detail['title']=$coursedetail_obj->title;
				$temp_course_detail['institute_name']=$coursedetail_obj->institute_name;
				$temp_course_detail['course_name']=$coursedetail_obj->course_name;
				$temp_course_detail['order_no_date'] = $coursedetail_obj->order_no.' / '.$coursedetail_obj->order_date;
				$temp_course_detail['start_date']=$coursedetail_obj->start_date;
				$temp_course_detail['end_date']=$coursedetail_obj->end_date;
				$temp_course_detail['created']=$coursedetail_obj->created;
				$temp_course_detail['enabled']=$coursedetail_obj->enabled;
				$temp_course_detail['deleted']=$coursedetail_obj->deleted;
				$temp_course_detail['action']='<a href="'.base_url().'course-detail/edit-course-detail/'.$coursedetail_obj->id.'">Edit</a> | <a href="'.base_url().'course-detail/delete-course-detail/'.$coursedetail_obj->id.'">Delete</a>';
				$course_detal_names[] = $temp_course_detail;
				$sno++;
			}
			$total_course_names = $this->CourseDetail_model->getTotalCoursesDetail(null);
			$total_filtered_course_names = $this->CourseDetail_model->getTotalFilteredCoursesDetail($where,$searchText);
			$data = [
				'data'=>$course_detal_names,
				'recordsTotal'=>$total_course_names,
				"recordsFiltered"=>$total_filtered_course_names
			];
			echo json_encode($data);
		}
		public function getCourseDetailNames($searchText=null,$length=null,$start=null,$order_by=null,$order=null,$where=null,$order_no=null,$course_order_date = null){
			$this->load->model('CourseDetail_model');
			return $this->CourseDetail_model->getCourseDetailNames($searchText,$where,$length,$start,$order_by,$order,$order_no,$course_order_date);
		}
		public function getProfessionalCourseDetailNames($searchText=null,$length=null,$start=null,$order_by=null,$order=null,$where=null,$selected_user_id=null,$order_no = null,$order_date =null){
			$this->load->model('CourseDetail_model');
			return $this->CourseDetail_model->getProfessionalCourseDetailNames($searchText,$where,$length,$start,$order_by,$order,$selected_user_id,$order_no, $order_date);
		
		}
		
		public function editCourseDetail($id){
			$this->load->model("CourseDetail_model");
			$this->load->library('form_validation');
			$course_detail = $this->CourseDetail_model->getCourseDetail($id);
			if($course_detail==null && count($course_detail)<=0){
				$this->session->set_flashdata('error_msg','Course Detail Not Found!');
				redirect('course-detail/list');
			}
			$this->load->model('TrainingInstitute_model');
			$this->load->model('Course_model');
			
			$where = ['deleted'=>'NO','enabled'=>'YES'];
			$training_institutes_objs = $this->TrainingInstitute_model->getInstitutesIDNamePair($where);
			$training_institutes = [];
			foreach($training_institutes_objs as $k=>$val){
				$training_institutes[$val->id] = $val->institute_name;
			}
			$data['training_institutes'] = $training_institutes;
			$courses =[];
			$courses_objs = $this->Course_model->getCoursesIDNamePair($where);
			foreach($courses_objs as $k=>$val){
				$courses[$val->id] = $val->course_name;
			}
			$data['courses'] = $courses;
			if(null!=$this->input->post('submit')){
				$title = $this->input->post('title');
				$course_id = $this->input->post('course_id');
				$training_institute_id = $this->input->post('training_institute_id');
				$course_order_date = $this->converDateToYMDfromDMY($this->input->post('course_order_date'));
				$course_start_date = $this->converDateToYMDfromDMY($this->input->post('course_start_date')).' 00:00:00';
				$course_end_date = $this->converDateToYMDfromDMY($this->input->post('course_end_date')).' 23:59:59';
				$enabled = $this->input->post('enabled');
				$deleted = $this->input->post('deleted');
				$order_no = $this->input->post('order_no');
				
				$this->form_validation->set_rules('title','Course Detail Title','required|callback_uniqueCourseDetailTitle['.$id.']');
				$this->form_validation->set_rules('course_id','Course','required|callback_valid_course['.serialize($courses).']');
				$this->form_validation->set_rules('training_institute_id','Training Institute','required|callback_valid_training_institute['.serialize($training_institutes).']');
				$this->form_validation->set_rules('order_no','Order Number','required|callback_unique_order_no['.$id.']');
				$this->form_validation->set_rules('course_order_date','Course Order Date','required|callback_valid_date');
				$this->form_validation->set_rules('course_start_date','Course Start Date','required|callback_valid_date');
				$this->form_validation->set_rules('course_end_date','Course End Date','required|callback_valid_date');
				$this->form_validation->set_rules('enabled','Enabled Status','required|callback_validEnabled');
				$this->form_validation->set_rules('deleted','Deleted Status','required|callback_validDeleted');
				
				if($this->form_validation->run()!=false){
					$data = [
						'title'=>$title,
						'course_id'=>$course_id,
						'training_institute_id'=>$training_institute_id,
						'order_date'=>$course_order_date,
						'start_date'=>$course_start_date,
						'end_date'=>$course_end_date,
						'enabled'=>$enabled,
						'deleted'=>$deleted,
						'order_no'=>$order_no
					];
					$a = $this->CourseDetail_model->udpateCourseDetail($id,$data);
					if($a){
						$this->session->set_flashdata('success_msg','Course Name Updation Successfull!');
						redirect('course-detail/list');
					}else{
						$this->session->set_flashdata('error_msg','Failed to update Course Name!');
					}
				}
			}
			$course_detail[0]->order_date = $this->converDateToDMYfromYMD($course_detail[0]->order_date);
			$course_detail[0]->start_date = $this->converDateToDMYfromYMD_HMS($course_detail[0]->start_date);
			$course_detail[0]->end_date = $this->converDateToDMYfromYMD_HMS($course_detail[0]->end_date);
			$data['course_detail'] = $course_detail[0];
			$data['id'] = $id;
			$data['enabled'] = ['YES'=>'YES','NO'=>'NO'];
			$data['deleted'] = ['YES'=>'YES','NO'=>'NO'];
			$this->load->view('Ca/courses-detail/edit_course_detail',$data);
		}
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
		public function uniqueCourseDetailTitle($courseTitle,$id){
			$this->load->model('CourseDetail_model');
			$count = $this->CourseDetail_model->getCourseDetailCount(trim($courseTitle),$id);
			if($count>0){
				$this->form_validation->set_message('uniqueCourseDetailTitle','Course Detail Title already exists');
				return false;
			}else{
				return true;
			}
		}
		public function deleteCourseDetail($id){
			$this->load->model('CourseDetail_model');
			$a = $this->CourseDetail_model->deleteCourseDetail($id);
			if($a){
				$this->session->set_flashdata('success_msg','Course Detail Deleted Successfull!');
				redirect('course-detail/list');
			}else{
				$this->session->set_flashdata('error_msg','Course Detail Deletion Process Failed!');
				redirect('course-detail/list');
			}
		}
		/**
			Get the list of courses
			used in Professional Course Detail
		*/
		public function ajaxGetProfessionalListCourseDetail(){
			$this->load->helper('common');
			//var_dump($_POST);
			$length=null;
			$start =null;
			if(null!=$this->input->post('length') && $this->input->post("length") != -1){
				$length=$this->input->post('length');
				$start = $this->input->post('start');
			}
			$searchText = $this->input->post('search')['value'];
			$order_by = 'title';
			$order = 'asc';
			$where = null;
			$training_institute_id = null;
			if(null!=$this->input->post('training_institute_id') && !in_array(trim($this->input->post('training_institute_id')),['','0'])){
				$training_institute_id = $this->input->post('training_institute_id');
				$where['training_institute_id'] = $training_institute_id;
			}
			$course_id = null;
			if(null!=$this->input->post('course_id') && !in_array(trim($this->input->post('course_id')),['','0']) ){
				$course_id = $this->input->post('course_id');
				$where['course_id'] = $course_id;
			}
			$title=null;
			if(null!=$this->input->post('title')){
				$title = $this->input->post('title');
				$where['title'] = $this->input->post('title');
			}
			$where['course_detail.enabled']='YES';
			$where['course_detail.deleted']='NO';
			$order_no = null;
			if(null!=$this->input->post('order_no')){
				$order_no = $this->input->post('order_no');
			}
			$order_date = null;
			if(null!=$this->input->post('order_date')){
				$order_date = convertDate($this->input->post('order_date'));
			}
			$this->load->model('CourseDetail_model');
			if(null!=$this->input->post('apc_from_to') && $this->input->post('apc_from_to')=='true'){
				$where['date_from']=convertDate($this->input->post('apc_from_date')).' 00:00:00';
				$where['date_to']=convertDate($this->input->post('apc_to_date')).' 23:59:59';
			}
			if(null!=$this->input->post('apc_in_bn') && $this->input->post('apc_in_bn')=='true'){
				$where['apc_date_in_bn_input']=convertDate($this->input->post('apc_date_in_bn_input'));
			}
			//var_dump($where);
			$selected_user_id = null;
			if(null!=$this->input->post('selected_user_id')){
				$selected_user_id = $this->input->post('selected_user_id');
			}
			$coursedetail_objs = $this->getProfessionalCourseDetailNames($searchText,$length,$start,$order_by,$order,$where,$selected_user_id, $order_no, $order_date);
			$course_detal_names = [];
			$sno = 1;
			foreach($coursedetail_objs as $k=>$coursedetail_obj){
				
				$temp_course_detail = [];
				$temp_course_detail['sno'] = $sno;
				$temp_course_detail['title']=$coursedetail_obj->title;
				$temp_course_detail['institute_name']=$coursedetail_obj->institute_name;
				$temp_course_detail['course_name']=$coursedetail_obj->course_name;
				$temp_course_detail['course_order_no_order_date'] = $coursedetail_obj->order_no.' / '.$coursedetail_obj->order_date;
				$temp_course_detail['start_date']=$coursedetail_obj->start_date;
				$temp_course_detail['end_date']=$coursedetail_obj->end_date;
				$temp_course_detail['created']=$coursedetail_obj->created;
				$temp_course_detail['enabled']=$coursedetail_obj->enabled;
				$temp_course_detail['deleted']=$coursedetail_obj->deleted;
				if($coursedetail_obj->course_detail_id==null){
					$action = '';
					//$action.='<input type="text" class="form-control" placeholder="Enter Order Number" id="emp_order_no'.$coursedetail_obj->id.'"> &nbsp; ';
					//$action .= '<button href="'.base_url().'course-detail/add-course-to-employee/'.$coursedetail_obj->id.'/'.$selected_user_id.'" onClick="addCourseToEmployee('.$coursedetail_obj->id.','.$selected_user_id.');return false;" class="btn btn-primary">Add</button>';
					$action .='<button onClick="showAddCourseToEmployeeDialog('.$coursedetail_obj->id.');return false;" class="btn btn-primary">Add</button>';
					$action.='<br><span class="text-danger" id="order_no'.$coursedetail_obj->id.'"></span>';
				} else{
					$action = 'Added <Br>(Order No - '.$coursedetail_obj->member_order_no.')<br>Order Date - '.$coursedetail_obj->member_order_date;
				}
				$temp_course_detail['action']=$action;
				$course_detal_names[] = $temp_course_detail;
				$sno++;
			}
			$total_course_names = $this->CourseDetail_model->getTotalProfessionalCourseDetailNames(null);
			$total_filtered_course_names = $this->CourseDetail_model->getTotalFilteredProfessionalCourseDetailNames($where,$searchText);
			$data = [
				'data'=>$course_detal_names,
				'recordsTotal'=>$total_course_names,
				"recordsFiltered"=>$total_filtered_course_names
			];
			echo json_encode($data);
		}
		public function ajaxGetCourseDetailById(){
			$success = true;
			$message = '';
			$id = null;
			if(null!=$this->input->post('id')){
				$id= $this->input->post('id');
			}else{
				$success = false;
				$message = 'No Id Provided';
				echo json_encode(['success'=>$success,'message'=>$message]);
				die;
			}
			$this->load->model('CourseDetail_model');
			$courseDetail = $this->CourseDetail_model->getCourseDetail($id);
			if($courseDetail && count($courseDetail)>0){
				echo json_encode(['success'=>true,'data'=>$courseDetail[0]]);
			}else{
				$success = false;
				$message = 'Course Detail Not Found';
				echo json_encode(['success'=>$success,'message'=>$message]);
				die;
			}
		}
		public function ajaxAddCourseDetailToEmployee(){
			$success = false;
			$message = '';
			$course_detail_id = $this->input->post('course_detail_id');
			$order_number = $this->input->post('order_number');
			$order_date = $this->input->post('order_date');
			$employee_id = $this->input->post('employee_id');
			//validations
			$this->load->library('form_validation');
			$this->form_validation->set_rules('course_detail_id','Course Detail','required');
			$this->form_validation->set_rules('order_number','Order Number','required');
			$this->form_validation->set_rules('order_date','Order Date','required');
			$this->form_validation->set_rules('employee_id','Employee','required');
			$this->form_validation->set_error_delimiters('', '');
			if($this->form_validation->run()!=false){
				if($course_detail_id!=null && $order_number!=null && $order_date!=null && $employee_id!=null){
					$order_date = $this->converDateToYMDfromDMY($order_date);
					$this->load->model('CourseMember_model');
					$data = ['course_detail_id'=>$course_detail_id,'employee_id'=>$employee_id,'order_no'=>$order_number,'order_date'=>$order_date];
					$a = $this->CourseMember_model->addCourseToEmployee($data);
					if($a){
						$success=true;
						$message = 'Course Added to Employee Successfully';
					}else{
						$success=false;
						$message = 'Course Addition to Employee Failed';
					}
					echo json_encode(['success'=>$success,'message'=>$message]);
					die;
				}else{
					$success = false;
					$message = 'Invalid Data';
					echo json_encode(['success'=>$success,'message'=>$message]);
					die;
				}
			}else{
				$success=false;
				$message = 'Validations Failed'."\n".validation_errors();//.form_error('order_date');
				$errors = [];
				if(form_error('order_date')!=''){
					$errors['order_date'] = form_error('order_date');
				}
				if(form_error('order_number')!=''){
					$errors['order_number'] = form_error('order_number');
				}
				if(form_error('employee_id')!=''){
					$errors['employee_id'] = form_error('employee_id');
				}
				if(form_error('course_detail_id')!=''){
					$errors['course_detail_id'] = form_error('course_detail_id');
				}
				if(count($errors)>0){
					echo json_encode(['success'=>$success,'message'=>$message,'errors'=>$errors]);
				}else{
					echo json_encode(['success'=>$success,'message'=>$message]);
				}
				die;
			}
		}
		/***
			Add course detail using ajax
		*/
		public function ajaxAddCourseDetail(){
			$success = false;
			$message = '';
			$errors = [];
			$this->load->library('form_validation');
			$this->load->model('CourseDetail_model');
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
			//$data['courses'] = $courses;
			$title = $this->input->post('title');
			$training_institute_id = $this->input->post('training_institute_id');
			$course_id = $this->input->post('course_id');
			$order_no = $this->input->post('order_no');
			$course_start_date = $this->converDateToYMDfromDMY($this->input->post('course_start_date')).' 00:00:00';
			$course_end_date = $this->converDateToYMDfromDMY($this->input->post('course_end_date')).' 23:59:59';
			$course_order_date = $this->converDateToYMDfromDMY($this->input->post('course_order_date'));
			$this->form_validation->set_rules('title','Course Detail Title','required|callback_uniqueCourseDetailTitle');
			$this->form_validation->set_rules('course_id','Course','required|callback_valid_course['.serialize($courses).']');
			$this->form_validation->set_rules('training_institute_id','Training Institute','required|callback_valid_training_institute['.serialize($training_institutes).']');
			$this->form_validation->set_rules('order_no','Order Number','required|callback_unique_order_no');
			$this->form_validation->set_rules('course_start_date','Course Start Date','required|callback_valid_date');
			$this->form_validation->set_rules('course_end_date','Course End Date','required|callback_valid_date');
			$this->form_validation->set_rules('course_order_date','Course Order Date','required|callback_valid_date');
			
			if($this->form_validation->run()!=false){
				$a = $this->CourseDetail_model->addCourseDetail($course_id,$title,$training_institute_id,$course_start_date,$course_end_date, $order_no, $course_order_date);
				if($a){
					$success = true;
					$message = 'Course Detail Saved Successfully!';
					//$this->session->set_flashdata('success_msg','Course Detail Saved Successfully!');
					//redirect('course-detail/list');
				}else{
					$success = false;
					$message = 'Failed to save Course Detail!';
					//$this->session->set_flashdata('error_msg','Failed to save Course Detail!');
				}
				echo json_encode(['success'=>$success,'message'=>$message]);
				die;
			}else{
				$success = false;
				$message = 'Validation Failed';
				if(form_error('title')!=''){
					$errors['apc_title_add_error'] = form_error('title');
				}
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
		}
	}
?>