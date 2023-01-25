<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Course_model extends CI_Model{
		var $order_column = array(null, "title", "description");
		private $table = 'courses';
		private $table2 = 'rank_groups';
		
		public function addCourseName($course_name){
			$data = ['course_name'=>$course_name,'created'=>date('Y-m-d H:i:s'),'enabled'=>'YES','deleted'=>'NO'];
			$a = $this->db->insert($this->table,$data);
			return $a ;
		}
		public function udpateCourseName($id,$course_name,$enabled,$deleted){
			$data = ['course_name'=>$course_name,'created'=>date('Y-m-d H:i:s'),'enabled'=>$enabled,'deleted'=>$deleted];
			$this->db->where('id',$id);
			$a = $this->db->update($this->table,$data);
			return $a ;
		}
		public function getCourseNames($where=null,$length=null,$start=null,$order_by=null,$order=null){
			$this->db->select('*');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='course_name'){
						$this->db->like('course_name',$v);
					}else{
						$this->db->where($k,$v);
					}
				}
				
			}
			if($length!=null && $start!=null){
				$this->db->limit($length,$start);
			}
			if($order_by!=null && $order!=null){
				$this->db->order_by($order_by,$order);
			}
			$this->db->from($this->table);
			$query = $this->db->get();
			return $query->result();
		}
		public function getTotalCoursesNames($where=null){
			$this->db->select('count(*) as total');
			if($where!=null){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}
			$this->db->from($this->table);
			return $this->db->get()->result()[0]->total;
		}
		public function getTotalFilteredCoursesNames($where=null,$searchText=null){
			$this->db->select('count(*) as total');
			if($where!=null){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}
			$this->db->like('course_name',$searchText);
			$this->db->from($this->table);
			return $this->db->get()->result()[0]->total;
		}
		public function getCourse($id){
			if($id!=null){
				$this->db->select('*');
				$this->db->where('id',$id);
				$this->db->from($this->table);
				return $this->db->get()->result();
			}else{
				return false;
			}
		}
		public function getCoursesIDNamePair($where){
			$this->db->select('*');
			if($where!=null){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}
			$this->db->from($this->table);
			return $this->db->get()->result();
		}
		public function getProfessionalCourseDetailHistory($search_Text=null,$where=null,$length=null,$start=null,$order_by=null,$order=null,$selected_user_id=null,$order_no=null, $order_date=null){
			$this->db->select('*, employee_courses.enabled as enabled, employee_courses.deleted as deleted, employee_courses.id as id,employee_courses.order_no as order_no,employee_courses.order_date as order_date');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='date_from'){
						$this->db->where('course_start_date >=',$v);
					}elseif($k=='date_to'){
						$this->db->where('course_end_date <=',$v);
					}elseif($k=='apc_date_in_bn_input'){
						$this->db->group_start();
						$this->db->where('course_start_date <=',$v.' 00:00:00');
						$this->db->where('course_end_date >=',$v.' 23:59:59');
						$this->db->group_end();
					}else{
						$this->db->where($k,$v);
					}
				}
			}
			if($selected_user_id!=null){
				$this->db->where('employee_courses.employee_id',$selected_user_id);
			}

			if($length!=null && $start!=null){
				$this->db->limit($length,$start);
			}
			if($order_by!=null && $order!=null){
				$this->db->order_by($order_by,$order);
			}
			if($order_no!=null){
				$this->db->like('employee_courses.order_no',$order_no);
			}
			if($order_date!=null){
				$this->db->where('employee_courses.order_date',$order_date);
			}
			if($search_Text!=null){
				$this->db->like('employee_courses.order_no',$search_Text);
			}
			$this->db->join('training_institutes','training_institutes.id = employee_courses.training_institute_id');
			$this->db->join('courses','courses.id = employee_courses.course_id');	
			//$this->db->join('course_members','course_members.employee_id = '.$selected_user_id.' and course_members.course_detail_id = course_detail.id','left');
			$this->db->from('employee_courses');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result();
		}
                //$searchText,$_length=null,$_start=null,$order_by=null,$order=null,$where,$employee_ids, $order_no, $order_date
                public function getProfessionalCourseDetailHistoryOfEmployees($search_Text=null,$length=null,$start=null,$order_by=null,$order=null,$where=null,$employee_ids = null,$order_no=null, $order_date=null){
			$this->db->select('*, employee_courses.enabled as enabled, employee_courses.deleted as deleted, employee_courses.id as id,employee_courses.order_no as order_no,employee_courses.order_date as order_date');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='date_from'){
						$this->db->where('course_start_date >=',$v);
					}elseif($k=='date_to'){
						$this->db->where('course_end_date <=',$v);
					}elseif($k=='apc_date_in_bn_input'){
						$this->db->group_start();
						$this->db->where('course_start_date <=',$v.' 00:00:00');
						$this->db->where('course_end_date >=',$v.' 23:59:59');
						$this->db->group_end();
					}elseif($k=='course_id'){
                                            $this->db->where_in('course_id',$v);
                                        }elseif($k=='training_institute_id'){
                                            $this->db->where_in('training_institute_id',$v);
                                        }else{
						$this->db->where($k,$v);
					}
				}
			}
			if($employee_ids!=null){
				$this->db->where_in('employee_courses.employee_id',$employee_ids);
			}

			if($length!=null && $start!=null){
				$this->db->limit($length,$start);
			}
			if($order_by!=null && $order!=null){
				$this->db->order_by($order_by,$order);
			}
			if($order_no!=null){
				$this->db->like('employee_courses.order_no',$order_no);
			}
			if($order_date!=null){
				$this->db->where('employee_courses.order_date',$order_date);
			}
			if($search_Text!=null){
				$this->db->like('employee_courses.order_no',$search_Text);
			}
			$this->db->join('training_institutes','training_institutes.id = employee_courses.training_institute_id','left');
			$this->db->join('courses','courses.id = employee_courses.course_id','left');	
			//$this->db->join('course_members','course_members.employee_id = '.$selected_user_id.' and course_members.course_detail_id = course_detail.id','left');
			$this->db->from('employee_courses');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result();
		}
                
		public function getTotalProfessionalCourseHistory($a,$selected_user_id=null){
			$this->db->select('count(*) as total');
			if($selected_user_id!=null){
				$this->db->where('employee_id',$selected_user_id);
			}
			$this->db->from('employee_courses');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result()[0]->total;
		}
		public function getTotalFilteredProfessionalCourseHistory($where=null,$search_Text=null,$selected_user_id=null){
			$this->db->select('count(*) as total');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='title'){
						$this->db->group_start();
						$this->db->like($k,$v);
						if($search_Text!=null){
							$this->db->or_like('title',$search_Text);
						}
						$this->db->group_end();
					}elseif($k=='date_from'){
						$this->db->where('course_start_date >=',$v);
					}elseif($k=='date_to'){
						$this->db->where('course_end_date <=',$v);
					}elseif($k=='apc_date_in_bn_input'){
						$this->db->group_start();
						$this->db->where('course_start_date <=',$v.' 00:00:00');
						$this->db->where('course_end_date >=',$v.' 23:59:59');
						$this->db->group_end();
					}elseif($k=='course_id'){
                                            $this->db->where_in('course_id',$v);
                                        }elseif($k=='training_institute_id'){
                                            $this->db->where_in('training_institute_id',$v);
                                        }else{
						$this->db->where($k,$v);
					}
				}
			}
			if($selected_user_id!=null){
				$this->db->where('employee_id',$selected_user_id);
			}
			$this->db->from('employee_courses');
			$query = $this->db->get();
			return $query->result()[0]->total;
		}
                //$searchText,$length_=null,$start_=null,$order_by=null,$order=null,$where, $order_no, $order_date
                public function getEmployeIdsFromProfessionalCourseDetailHistory($search_Text=null,$length=null,$start=null,$order_by=null,$order=null,$where=null,$order_no=null, $order_date=null){
                       // echo 'hi';
                    $this->db->select('employee_courses.employee_id');
			//$this->db->select('*, employee_courses.enabled as enabled, employee_courses.deleted as deleted, employee_courses.id as id,employee_courses.order_no as order_no,employee_courses.order_date as order_date');
                    //var_dump($where);   
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='date_from'){
						$this->db->where('course_start_date >=',$v);
					}elseif($k=='date_to'){
						$this->db->where('course_end_date <=',$v);
					}elseif($k=='apc_date_in_bn_input'){
						$this->db->group_start();
						$this->db->where('course_start_date <=',$v.' 00:00:00');
						$this->db->where('course_end_date >=',$v.' 23:59:59');
						$this->db->group_end();
                                        }elseif($k=='course_id'){
                                            $this->db->where_in('course_id',$v);
                                        }elseif($k=='training_institute_id'){
                                            $this->db->where_in('training_institute_id',$v);
                                        }else{
						$this->db->where($k,$v);
					}
				}
			}
			
			
			if($order_no!=null){
				$this->db->like('employee_courses.order_no',$order_no);
			}
			if($order_date!=null){
				$this->db->where('employee_courses.order_date',$order_date);
			}
			if($search_Text!=null){
				$this->db->like('employee_courses.order_no',$search_Text);
			}
			//$this->db->join('training_institutes','training_institutes.id = employee_courses.training_institute_id');
			//$this->db->join('courses','courses.id = employee_courses.course_id');	
			//$this->db->join('course_members','course_members.employee_id = '.$selected_user_id.' and course_members.course_detail_id = course_detail.id','left');
                        $this->db->group_by('employee_courses.employee_id');
			$this->db->from('employee_courses');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();
		}
                public function getEmployeIdsSQLQueryFromProfessionalCourseDetailHistory($search_Text=null,$length=null,$start=null,$order_by=null,$order=null,$where=null,$order_no=null, $order_date=null){
                    $this->db->select('employee_courses.employee_id');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='date_from'){
						$this->db->where('course_start_date >=',$v);
					}elseif($k=='date_to'){
						$this->db->where('course_end_date <=',$v);
					}elseif($k=='apc_date_in_bn_input'){
						$this->db->group_start();
						$this->db->where('course_start_date <=',$v.' 00:00:00');
						$this->db->where('course_end_date >=',$v.' 23:59:59');
						$this->db->group_end();
                                        }elseif($k=='course_id'){
                                            $this->db->where_in('course_id',$v);
                                        }elseif($k=='training_institute_id'){
                                            $this->db->where_in('training_institute_id',$v);
                                        }else{
						$this->db->where($k,$v);
					}
				}
			}
			
			
			if($order_no!=null){
				$this->db->like('employee_courses.order_no',$order_no);
			}
			if($order_date!=null){
				$this->db->where('employee_courses.order_date',$order_date);
			}
			if($search_Text!=null){
				$this->db->like('employee_courses.order_no',$search_Text);
			}
			//$this->db->join('training_institutes','training_institutes.id = employee_courses.training_institute_id');
			//$this->db->join('courses','courses.id = employee_courses.course_id');	
			//$this->db->join('course_members','course_members.employee_id = '.$selected_user_id.' and course_members.course_detail_id = course_detail.id','left');
                        $this->db->group_by('employee_courses.employee_id');
			$this->db->from('employee_courses');
                        
			return $this->db->get_compiled_select();
		}
	}