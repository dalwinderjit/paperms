<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class CourseC extends CI_Controller
	{	
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
		}
		public function addCourseName(){
			$this->load->library('form_validation');
			$this->load->model('Course_model');
			if(null!=$this->input->post('submit')){
				$course_name = $this->input->post('course_name');
				
				$this->form_validation->set_rules('course_name','Course Name','required');
				
				if($this->form_validation->run()!=false){
					$a = $this->Course_model->addCourseName($course_name);
					if($a){
						$this->session->set_flashdata('success_msg','Course Name Saved Successfully!');
						redirect('course/list-course-names');
					}else{
						$this->session->set_flashdata('error_msg','Failed to save Course Name!');
					}
				}
			}
			$this->load->view('Ca/courses/add_course_name');
		}
		public function listCourseNames(){
			$this->load->view('Ca/courses/list_course_names');
		}
		public function ajaxListCourseNames(){
			//var_dump($_POST);
			$length=null;
			$start =null;
			if(null!=$this->input->post('length') && $this->input->post("length") != -1){
				$length=$this->input->post('length');
				$start = $this->input->post('start');
			}
			$searchText = $this->input->post('search')['value'];
			$order_by = 'course_name';
			$order = 'asc';
			$this->load->model('Course_model');
			$course_name_objs = $this->getCourseNames($searchText,$length,$start,$order_by,$order);
			$course_names = [];
			$sno = 1;
			$sno = $sno+$start;
			foreach($course_name_objs as $k=>$course_name_obj){
				$temp_course = [];
				$temp_course['sno'] = $sno;
				$temp_course['course_name']=$course_name_obj->course_name;
				$temp_course['created']=$course_name_obj->created;
				$temp_course['enabled']=$course_name_obj->enabled;
				$temp_course['deleted']=$course_name_obj->deleted;
				$temp_course['action']='<a href="'.base_url().'course/edit-course-name/'.$course_name_obj->id.'">Edit</a> | <a href="#">Delete</a>';
				$course_names[] = $temp_course;
				$sno++;
			}
			$total_course_names = $this->Course_model->getTotalCoursesNames(null);
			$total_filtered_course_names = $this->Course_model->getTotalFilteredCoursesNames(null,$searchText);
			$data = [
				'data'=>$course_names,
				'recordsTotal'=>$total_course_names,
				"recordsFiltered"=>$total_filtered_course_names
			];
			echo json_encode($data);
		}
		public function getCourseNames($searchText=null,$length=null,$start=null,$order_by=null,$order=null){
			$this->load->model('Course_model');
			$where = ['course_name'=>$searchText];
			return $this->Course_model->getCourseNames($where,$length,$start,$order_by,$order);
		}
		public function editCourseName($id){
			$this->load->model("Course_model");
			$this->load->library('form_validation');
			$course = $this->Course_model->getCourse($id);
			if($course==null && count($course)<=0){
				$this->session->set_flashdata('error_msg','Course Name Not Found!');
				redirect('course/list-course-names');
			}
			if(null!=$this->input->post('submit')){
				$course_name = $this->input->post('course_name');
				$enabled = $this->input->post('enabled');
				$deleted = $this->input->post('deleted');
			$this->form_validation->set_rules('course_name','Course Name','required|callback_unique_course_name['.$id.']');
				$this->form_validation->set_rules('enabled','Enabled Status','required|callback_validEnabled');
				$this->form_validation->set_rules('deleted','Deleted Status','required|callback_validDeleted');
				if($this->form_validation->run()!=false){
					$a = $this->Course_model->udpateCourseName($id,$course_name,$enabled,$deleted);
					if($a){
						$this->session->set_flashdata('success_msg','Course Name Updation Successfull!');
						redirect('course/list-course-names');
					}else{
						$this->session->set_flashdata('error_msg','Failed to update Course Name!');
					}
				}
			}
			$data['course'] = $course[0];
			$data['id'] = $id;
			$data['enabled'] = ['YES'=>'YES','NO'=>'NO'];
			$data['deleted'] = ['YES'=>'YES','NO'=>'NO'];
			$this->load->view('Ca/courses/edit_course_name',$data);
		}
		/***
		
		*/
		/**
			Get the list of courses
			used in Professional Course Detail
		*/
		public function ajaxGetProfessionalCourseHistory(){
			 $searchText = null;
			if(null!=$this->input->post('search') && $this->input->post('search')['value']!=null && trim($this->input->post('search')['value'])!=''){
				$searchText = trim($this->input->post('search')['value']);
			} 
			$this->load->helper('common');
			//var_dump($_POST);
			$length=null;
			$start =null;
			if(null!=$this->input->post('length') && $this->input->post("length") != -1){
				$length=$this->input->post('length');
				$start = $this->input->post('start');
			}
			//$searchText = $this->input->post('search')['value'];
			$order_by = 'employee_courses.created';
			$order = 'desc';
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
			$where['employee_courses.enabled']='YES';
			$where['employee_courses.deleted']='NO';
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
			$coursedetail_objs = $this->getProfessionalCourseDetailHistory($searchText,$length,$start,$order_by,$order,$where,$selected_user_id, $order_no, $order_date);
			$course_detal_names = [];
			$sno = 1;
			foreach($coursedetail_objs as $k=>$coursedetail_obj){
				
				$temp_course_detail = [];
				$temp_course_detail['sno'] = $sno;
				$temp_course_detail['institute_name']=$coursedetail_obj->institute_name;
				$temp_course_detail['course_name']=$coursedetail_obj->course_name;
				$temp_course_detail['course_order_no'] = $coursedetail_obj->order_no;
				$temp_course_detail['course_order_date'] = $coursedetail_obj->order_date;
				$temp_course_detail['start_date']=$coursedetail_obj->course_start_date;
				$temp_course_detail['end_date']=$coursedetail_obj->course_end_date;
				$temp_course_detail['created']=$coursedetail_obj->created;
				$temp_course_detail['enabled']=$coursedetail_obj->enabled;
				$temp_course_detail['deleted']=$coursedetail_obj->deleted;
				/* if($coursedetail_obj->course_detail_id==null){
					$action = '';
					//$action.='<input type="text" class="form-control" placeholder="Enter Order Number" id="emp_order_no'.$coursedetail_obj->id.'"> &nbsp; ';
					//$action .= '<button href="'.base_url().'course-detail/add-course-to-employee/'.$coursedetail_obj->id.'/'.$selected_user_id.'" onClick="addCourseToEmployee('.$coursedetail_obj->id.','.$selected_user_id.');return false;" class="btn btn-primary">Add</button>';
					$action .='<button onClick="showAddCourseToEmployeeDialog('.$coursedetail_obj->id.');return false;" class="btn btn-primary">Add</button>';
					$action.='<br><span class="text-danger" id="order_no'.$coursedetail_obj->id.'"></span>';
				} else{
					$action = 'Added <Br>(Order No - '.$coursedetail_obj->member_order_no.')<br>Order Date - '.$coursedetail_obj->member_order_date;
				} */
				$action = '<a href="#" onClick="getCourseHistory('.$coursedetail_obj->id.');return false;">EDIT</a>';
				$temp_course_detail['action']=$action;
				$course_detal_names[] = $temp_course_detail;
				$sno++;
			}
			$total_course_names = $this->Course_model->getTotalProfessionalCourseHistory(null,$selected_user_id);
			$total_filtered_course_names = $this->Course_model->getTotalFilteredProfessionalCourseHistory($where,$searchText,$selected_user_id);
			$data = [
				'data'=>$course_detal_names,
				'recordsTotal'=>$total_course_names,
				"recordsFiltered"=>$total_filtered_course_names
			];
			echo json_encode($data);
		}
		
		
		
		public function getProfessionalCourseDetailHistory($searchText=null,$length=null,$start=null,$order_by=null,$order=null,$where=null,$selected_user_id=null,$order_no = null,$order_date =null){
			$this->load->model('Course_model');
			return $this->Course_model->getProfessionalCourseDetailHistory($searchText,$where,$length,$start,$order_by,$order,$selected_user_id,$order_no, $order_date);
		
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
		public function unique_course_name($name=null,$id=null){
			$this->load->model('Course_model');
			$where = [];
			if($name!=null){
				$where['course_name']=$name;
			}
			if($id!=null){
				$where['id !=']=$id;
			}
			$a = $this->Course_model->getTotalCoursesNames($where);
			if(!$a){
				return true;
			}else{
				$this->form_validation->set_message('unique_course_name','Course Name exists');
				return false;
			}
		}
		
		public function courseHistory(){
                    $this->load->helper('osi');
                    $data['disable_battalion']=false;
                        if($this->session->userdata('userid')==IGP_CDO_ID){
                            $all_battalions = osi_getCDOBattalions();
                        }elseif($this->session->userdata('userid')==IGP_IRB_ID){
                            $all_battalions = osi_getIRBBattalions();
                        }else if($this->session->userdata('user_log')!=100){
                            $all_battalions  = [$this->session->userdata('userid')=>osi_getAllBattalions()[$this->session->userdata('userid')]];
                            $data['disable_battalion']=true;
                        }else{
                            $all_battalions = osi_getAllBattalions();
                        }
                    
                    $data['battalions'] = $all_battalions;
                    $apc_courses = [];
			$this->load->model('TrainingInstitute_model');
			$this->load->model('Course_model');
			$where = ['deleted'=>'NO','enabled'=>'YES'];
			$apc_training_institutes = [];
			$training_institutes_objs = $this->TrainingInstitute_model->getInstitutesIDNamePair($where);
			
			$apc_training_institutes[] = '--All--';
			foreach($training_institutes_objs as $k=>$val){
				$apc_training_institutes[$val->id] = $val->institute_name;
			}
			$data['apc_training_institutes'] = $apc_training_institutes;
			
			$apc_courses[] = '--All--';
			$courses_objs = $this->Course_model->getCoursesIDNamePair($where);
			foreach($courses_objs as $k=>$val){
				$apc_courses[$val->id] = $val->course_name;
			}
                        
			$data['apc_courses'] = $apc_courses;
                    $this->load->view('Courses/courseHistory',$data);
                }
                public function downloadProfessionalCourseHistoryOfEmployees(){
                    error_reporting(0);
                    $this->ajaxGetProfessionalCourseHistoryOfEmployees1();
                }
                
                public function ajaxGetProfessionalCourseHistoryOfEmployees1(){
                        $this->load->model('Osi_model');
                        $this->load->model('Course_model');
                        $this->load->helper('osi');
                        $this->load->helper('common');
                        $this->load->library('Employee');
			$this->load->model('TrainingInstitute_model');
			$this->load->model('Course_model');
                        $employee = new Employee();
                        $battalions = null;
                        $apc_courses = [];
                        $employee_ids = null;
			$where = ['deleted'=>'NO','enabled'=>'YES'];
			$apc_training_institutes = [];
			$training_institutes_objs = $this->TrainingInstitute_model->getInstitutesIDNamePair($where);
			$apc_training_institutes = [];
			$apc_training_institutes[0] = 'Not Set';
			foreach($training_institutes_objs as $k=>$val){
				$apc_training_institutes[$val->id] = $val->institute_name;
			}

			
			$apc_courses = [];
			$apc_courses[0]= 'Not Set';
                        
			$courses_objs = $this->Course_model->getCoursesIDNamePair($where);
			foreach($courses_objs as $k=>$val){
				$apc_courses[$val->id] = $val->course_name;
			}
                        if($this->session->userdata('user_log')!=100){
                            $battalions  = [$this->session->userdata('userid')];
                        //die('hello');
                        } else {
                            if(null!=$this->input->post('battalions')){
                                $battalions =$this->input->post('battalions');
                            }else{
                                if($this->session->userdata('userid')==IGP_CDO_ID){
                                    $battalions = array_keys(osi_getCDOBattalions());
                                }elseif($this->session->userdata('userid')==IGP_IRB_ID){
                                    $battalions = array_keys(osi_getIRBBattalions());
                                }else{
                                    $battalions = array_keys(osi_getAllBattalions());
                                }
                            }
                        }
                        $employee_name = null;
                        if(null!=$this->input->post('employee_name')){
                            $employee_name = $this->input->post('employee_name');
                        }
                        $regimental_no = null;
                        if(null!=$this->input->post('regimental_no')){
                            $regimental_no = $this->input->post('regimental_no');
                        }
                        $ranks = null;
                        if(null!=$this->input->post('ranks')){
                            $ranks = $this->input->post('ranks');
                        }
                        $skipZero = false;
                        if(null!=$this->input->post('skipZero')){
                            $skipZero = $this->input->post('skipZero');
                        }
                        $downloadExcel = false;
                        if(null!=$this->input->post('downloadExcel')){
                            $downloadExcel = $this->input->post('downloadExcel');
                        }
                        //echo $skipZero;
                        //var_dump($totalEmployees);
                        //die;
                        if($this->session->userdata('userid')==IGP_CDO_ID){
                            $all_battalions = osi_getCDOBattalions();
                        }elseif($this->session->userdata('userid')==IGP_IRB_ID){
                            $all_battalions = osi_getIRBBattalions();
                        }else{
                            $all_battalions = osi_getAllBattalions();
                        }
                        //$all_battalions = osi_getAllBattalions();
                        
                        //var_dumP($all_battalions);  
                        //die;    
			$searchText = null;
			if(null!=$this->input->post('search') && $this->input->post('search')['value']!=null && trim($this->input->post('search')['value'])!=''){
				$searchText = trim($this->input->post('search')['value']);
			} 
			$this->load->helper('common');
			//var_dump($_POST);
			$length=10;
			$start =0;
                        
			if(null!=$this->input->post('length') && $this->input->post("length") != -1){
				$length=$this->input->post('length');
				$start = $this->input->post('start');
			}
			//$searchText = $this->input->post('search')['value'];
			$order_by = 'employee_courses.created';
			$order = 'desc';
			$where = null;
                        
			$training_institute_ids = null;
			if(null!=$this->input->post('training_institute_ids') /*&& !in_array(trim($this->input->post('training_institute_ids')),['','0'])*/){
				$training_institute_ids = $this->input->post('training_institute_ids');
				
				$where['training_institute_id'] = $training_institute_ids;
			}
                        //$training_institute_ids = [1];
                        //$where['training_institute_id'] = $training_institute_ids;
                        //var_dump($training_institute_ids);
                        //echo 'hi';  
			$course_ids = null;
			if(null!=$this->input->post('course_ids') /*&& !in_array(trim($this->input->post('course_id')),['','0'])*/ ){
				$course_ids = $this->input->post('course_ids');
				$where['course_id'] = $course_ids;
			}
                        //$course_ids = [1];
            		//$where['course_id'] = $course_ids;
			$title=null;
			if(null!=$this->input->post('title')){
				$title = $this->input->post('title');
				$where['title'] = $this->input->post('title');
			}
			$where['employee_courses.enabled']='YES';
			$where['employee_courses.deleted']='NO';
			$order_no = null;
			if(null!=$this->input->post('order_no')){
				$order_no = $this->input->post('order_no');

			}
			$order_date = null;
			if(null!=$this->input->post('order_date')){
				$order_date = convertDate($this->input->post('order_date'));
			}
                        
                        $regimental_no = null;
                        if(null!=$this->input->post('regimental_no')){
                            $regimental_no = $this->input->post('regimental_no');
                        }
                        $ranks = null;
                        if(null!=$this->input->post('ranks')){
                            $ranks = $this->input->post('ranks');
                        }
                        //var_dump($where);  
                        
                        $employee_ids_to_be_included = null;
                        
                        $sorted_battallions = osi_getAllBattalions();
                        $sorted_battallion_order = array_keys($sorted_battallions);
                        $employee->setSearchFilter('battalions',$battalions);
                        $employee->setSearchFilter('employee_ids_to_be_included',null);
                        $employee->setSearchFilter('employee_name',$employee_name);
                        $employee->setSearchFilter('regimental_no',$regimental_no);
                        $employee->setSearchFilter('sorted_battallion_order',$sorted_battallion_order);
                        $employee->setSearchFilter('ranks',$ranks);
                        if($skipZero=='true'){
                            $employee->setSkipZero(true);
                        }
                        
                        if($downloadExcel){
                            $employee->setLimit(null);
                            $employee->setStart(null);
                        }else{
                            $employee->setLimit($length);
                            $employee->setStart($start);
                        }
                        
                        $employee->osi_model = $this->Osi_model;
                        if($searchText!=null || $course_ids!=null || $order_no!=null || $order_date!=null || $training_institute_ids!=null || $skipZero=='true'){
                            
                            $professionalCouserEmployeeIdsSQL = $this->Course_model->getEmployeIdsSQLQueryFromProfessionalCourseDetailHistory($searchText,$length_=null,$start_=null,$order_by=null,$order=null,$where, $order_no, $order_date);
                            
                            $employees = $employee->getEmployeesList($professionalCouserEmployeeIdsSQL,$where,$order_no, $order_date,$sorted_battallion_order);
                            if(!$downloadExcel){
                                $filteredEmployees =$employee->getFilteredEmployeesForCourses($professionalCouserEmployeeIdsSQL,$sorted_battallion_order);
                            }
                        }else{
                            $employees = $employee->getEmployeesList(null,null,null,null,$sorted_battallion_order);
                            if(!$downloadExcel){
                                $filteredEmployees =$employee->getFilteredEmployeesForCourses();
                            }
                        }
                        foreach($employees as $k=>$val){
                            $employee_ids[] =$val->man_id;
                        }
                        $coursedetail_objs = $this->Course_model->getProfessionalCourseDetailHistoryOfEmployees($searchText,$_length=null,$_start=null,$_order_by=null,$__order=null,$where,$employee_ids, $order_no, $order_date);
                        //die;
                        
			$course_detal_names = [];
			$sno = 1;
                        $employee_courses = [];
                        
                        foreach($coursedetail_objs as $k=>$coursedetail_obj){
                            $employee_courses[$coursedetail_obj->employee_id][] = $coursedetail_obj;
                        }
                        //var_dump($employee_courses);
                        $course_detal_names = [];
                        $sno = 1+$start;
                        
                        if($downloadExcel){
                            $this->downloadProfessionalCourseHistoryExcel($employees,$employee_courses, $apc_training_institutes, $apc_courses);
                        }
                        foreach($employees as $k=>$emp_){
                            if(isset($employee_courses[$emp_->man_id])){
                                foreach($employee_courses[$emp_->man_id] as $k1=>$emp){
                                    if($k1==0){
                                        $temp_course_detail = [];
                                        $temp_course_detail['sno'] = $sno;
                                        $temp_course_detail['employee_name'] = $emp_->name;
                                        $temp_course_detail['regimental_no'] = $emp_->depttno;
                                        $temp_course_detail['battalion_name'] = $emp_->nick;
                                        $temp_course_detail['rank'] = $emp_->permanent_rank;
                                    }else{
                                        $temp_course_detail['sno'] = '';
                                        $temp_course_detail['employee_name'] = '';
                                        $temp_course_detail['regimental_no'] = '';
                                        $temp_course_detail['battalion_name'] = '';
                                        $temp_course_detail['rank'] = '';
                                    }
                                    $temp_course_detail['institute_name'] = $apc_training_institutes[$emp->training_institute_id];
                                    $temp_course_detail['course_name']=$apc_courses[$emp->course_id] ;
                                    $temp_course_detail['course_order_no'] = $emp->order_no;
                                    $temp_course_detail['course_order_date'] = converDateFromYMDtoDMY($emp->order_date);
                                    $temp_course_detail['start_date']=$emp->course_start_date;
                                    $temp_course_detail['end_date']=$emp->course_end_date;
                                    $temp_course_detail['created']='-';
                                    $temp_course_detail['enabled']='-';
                                    $temp_course_detail['deleted']='-';
                                    $action = '';
                                    $temp_course_detail['action']=$action;
                                    $course_detal_names[] = $temp_course_detail;
                                }
                            }else{
                                $temp_course_detail['sno'] = $sno;
                                $temp_course_detail['employee_name'] = $emp_->name;
                                $temp_course_detail['regimental_no'] = $emp_->depttno;
                                $temp_course_detail['battalion_name'] = $emp_->nick;
                                $temp_course_detail['rank'] = $emp_->permanent_rank;
                                $temp_course_detail['institute_name'] = '-';
                                $temp_course_detail['course_name']='-';
                                $temp_course_detail['course_order_no'] = '-';
                                $temp_course_detail['course_order_date'] = '-';
                                $temp_course_detail['start_date']='-';
                                $temp_course_detail['end_date']='-';
                                $temp_course_detail['created']='-';
                                $temp_course_detail['enabled']='-';
                                $temp_course_detail['deleted']='-';
                                $action = '';
                                $temp_course_detail['action']=$action;
                                $course_detal_names[] = $temp_course_detail;
                            }
                            
                            $sno++;
                        }
                        $totalEmployees =$employee->getTotalEmployeesForCourses();
                        $data = [
				'data'=>$course_detal_names,
				'recordsTotal'=>$totalEmployees,
				"recordsFiltered"=>$filteredEmployees
			];
			echo json_encode($data);
                        die;
                        
		}
                public function downloadProfessionalCourseHistoryExcel($employees, $employee_courses, $apc_training_institutes, $apc_courses){
                    set_time_limit(0);
			ini_set("memory_limit","-1");
			error_reporting(0);
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Professional Course History, Generated by ERMS-PAP.")
										 ->setKeywords("Professional Course History")
										 ->setCategory("Professional Courses History");
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
			
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Users along with their Professional Courses');
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:H1");
			
			$equipmentNameStyle = array(
				'font'  => array(
					'size'  => 12,
					'name'  => 'Verdana',
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
				));
			
			
			$cols = array('C','D','E');
			$cols_temp = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
			$cols_heads = array('S. No.','Battalion','Rank','Name','Regimental Number','Training Institue Name','Course Name','Course Order number','Course Order Date','Course Start Date','Course End Date');
			$row++;
                        foreach($cols_heads as $k=>$val){
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols_temp[$k].$row, $val);
                        }
			
			$i=1;
			$row++;
			$counter = 1;
                        $sno =1;
                        foreach($employees as $k=>$emp_){
                            
                            if(isset($employee_courses[$emp_->man_id])){
                                //  var_dump($employee_courses[$emp_->man_id]);    
                                
                                foreach($employee_courses[$emp_->man_id] as $k1=>$emp){
                                    if($k1==0){
                                        $temp_course_detail = [];
                                        $temp_course_detail['sno'] = $sno;
                                        $temp_course_detail['employee_name'] = $emp_->name;
                                        $temp_course_detail['regimental_no'] = $emp_->depttno;
                                        $temp_course_detail['battalion_name'] = $emp_->nick;
                                        $temp_course_detail['rank'] = $emp_->permanent_rank;
                                    }else{
                                        $temp_course_detail['sno'] = '';
                                        $temp_course_detail['employee_name'] = '';
                                        $temp_course_detail['regimental_no'] = '';
                                        $temp_course_detail['battalion_name'] = '';
                                        $temp_course_detail['rank'] = '';
                                    }
                                    $temp_course_detail['institute_name'] = $apc_training_institutes[$emp->training_institute_id];
                                    $temp_course_detail['course_name']=$apc_courses[$emp->course_id] ;
                                    $temp_course_detail['course_order_no'] = $emp->order_no;
                                    $temp_course_detail['course_order_date'] = converDateFromYMDtoDMY($emp->order_date);
                                    $temp_course_detail['start_date']=$emp->course_start_date;
                                    $temp_course_detail['end_date']=$emp->course_end_date;
                                    $temp_course_detail['created']='-';
                                    $temp_course_detail['enabled']='-';
                                    $temp_course_detail['deleted']='-';
                                    //$action = '';
                                    //$temp_course_detail['action']=$action;
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $temp_course_detail['sno']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $temp_course_detail['battalion_name']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $temp_course_detail['rank']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $temp_course_detail['employee_name']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $temp_course_detail['regimental_no']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $temp_course_detail['institute_name']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $temp_course_detail['course_name']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $temp_course_detail['course_order_no']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I'.$row, $temp_course_detail['course_order_date']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('J'.$row, $temp_course_detail['start_date']);
                                    $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('K'.$row, $temp_course_detail['end_date']);
                                    $row++;
                                    //$course_detal_names[] = $temp_course_detail;
                                }
                            }else{
                                $temp_course_detail['sno'] = $sno;
                                $temp_course_detail['employee_name'] = $emp_->name;
                                $temp_course_detail['regimental_no'] = $emp_->depttno;
                                $temp_course_detail['battalion_name'] = $emp_->nick;
                                $temp_course_detail['rank'] = $emp_->permanent_rank;
                                $temp_course_detail['institute_name'] = '-';
                                $temp_course_detail['course_name']='-';
                                $temp_course_detail['course_order_no'] = '-';
                                $temp_course_detail['course_order_date'] = '-';
                                $temp_course_detail['start_date']='-';
                                $temp_course_detail['end_date']='-';
                                $temp_course_detail['created']='-';
                                $temp_course_detail['enabled']='-';
                                $temp_course_detail['deleted']='-';
                                //$action = '';
                                //$temp_course_detail['action']=$action;
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $temp_course_detail['sno']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $temp_course_detail['battalion_name']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $temp_course_detail['rank']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $temp_course_detail['employee_name']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $temp_course_detail['regimental_no']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $temp_course_detail['institute_name']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $temp_course_detail['course_name']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $temp_course_detail['course_order_no']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $temp_course_detail['course_order_date']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I'.$row, $temp_course_detail['start_date']);
                                $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('J'.$row, $temp_course_detail['end_date']);
                                //$course_detal_names[] = $temp_course_detail;
                                $row++;
                            }
                            
                            $sno++;
                        }
			

			// $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			//$objWriter->save(dirname(__FILE__).'/file/dalwinder.xlsx');
			//$objWriter->save('D://dalwinder.xlsx');
			//die('file created');
//			// Redirect output to a client’s web browser (Excel2007)
			//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			//header('Content-Disposition: attachment;filename="all_users.xls"');
			//header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			//header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			//header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			//header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			//header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			//header ('Pragma: public'); // HTTP/1.0

			//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			//$objWriter->save('php://output');
                        
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
			exit;
                }
	}
?>