<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class CourseDetail_model extends CI_Model{
		var $order_column = array(null, "title", "description");
		private $table = 'course_detail';
		
		public function addCourseDetail($course_id,$title,$training_institute_id,$course_start_date,$course_end_date,$order_no,$course_order_date){
			$data = ['title'=>$title,'course_id'=>$course_id,'training_institute_id'=>$training_institute_id,'start_date'=>$course_start_date,'end_date'=>$course_end_date,'enabled'=>'YES','deleted'=>'NO','order_no'=>$order_no,'order_date'=>$course_order_date];
			$a = $this->db->insert($this->table,$data);
			return $a ;
		}
		public function udpateCourseDetail($id,$data){
			$this->db->where('id',$id);
			$a = $this->db->update($this->table,$data);
			return $a ;
		}
		public function deleteCourseDetail($id){
			$this->db->where('id',$id);
			$data = ['deleted'=>'YES'];
			$a = $this->db->update($this->table,$data);
			return $a;
		}
		public function getCourseDetailNames($search_Text=null,$where=null,$length=null,$start=null,$order_by=null,$order=null,$order_no=null,$course_order_date=null){
			$this->db->select('*, course_detail.enabled as enabled,course_detail.deleted as deleted, course_detail.id as id');
			if($where!=null){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}
			if($search_Text!=null){
				$this->db->like('title',$search_Text);
			}
			if($length!=null && $start!=null){
				$this->db->limit($length,$start);
			}
			if($order_by!=null && $order!=null){
				$this->db->order_by($order_by,$order);
			}
			if($order_no!=null){
				$this->db->like('order_no',$order_no);
			}
			if($course_order_date!=null){
				$this->db->where('order_date',$course_order_date);
			}
			$this->db->join('training_institutes','training_institutes.id = course_detail.training_institute_id');
			$this->db->join('courses','courses.id = course_detail.course_id');
			$this->db->from($this->table);
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result();
		}
		public function getTotalCoursesDetail($where=null){
			$this->db->select('count(*) as total');
			if($where!=null){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}
			$this->db->from($this->table);
			return $this->db->get()->result()[0]->total;
		}
		public function getTotalFilteredCoursesDetail($where=null,$searchText=null){
			$this->db->select('count(*) as total');
			if($where!=null){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}
			$this->db->like('title',$searchText);
			$this->db->from($this->table);
			return $this->db->get()->result()[0]->total;
		}
		public function getCourseDetail($id){
			if($id!=null){
				$this->db->select('*,course_detail.id as id');
				$this->db->where('course_detail.id',$id);
				$this->db->where('course_detail.enabled','YES');
				$this->db->where('course_detail.deleted','NO');
				$this->db->from($this->table);
				$this->db->join('courses','courses.id = course_detail.course_id');
				$this->db->join('training_institutes','training_institutes.id = course_detail.training_institute_id');
				return $this->db->get()->result();
			}else{
				return false;
			}
		}
		public function getCourseDetailCount($courseTitle,$id){
			$this->db->select('count(*) as total');
			if($id!=null){
				$this->db->where('id !=',$id);
			}
			if($courseTitle!=null){
				$this->db->where('title',$courseTitle);
			}
			$this->db->from($this->table);
			$query = $this->db->get();
			$result = $query->result();
			
			return $result[0]->total;
		}
		public function getProfessionalCourseDetailNames($search_Text=null,$where=null,$length=null,$start=null,$order_by=null,$order=null,$selected_user_id=null,$order_no=null, $order_date=null){
			$this->db->select('*, course_detail.enabled as enabled, course_detail.deleted as deleted, course_detail.id as id,course_detail.order_no as order_no,course_detail.order_date as order_date, course_members.order_no as member_order_no,course_members.order_date as member_order_date');
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
						$this->db->where('start_date >=',$v);
					}elseif($k=='date_to'){
						$this->db->where('end_date <=',$v);
					}elseif($k=='apc_date_in_bn_input'){
						$this->db->group_start();
						$this->db->where('start_date <=',$v.' 00:00:00');
						$this->db->where('end_date >=',$v.' 23:59:59');
						$this->db->group_end();
					}else{
						$this->db->where($k,$v);
					}
				}
			}
			/* if($selected_user_id!=null){
				$this->db->where('course_members.employee_id',$selected_user_id);
			} */

			if($length!=null && $start!=null){
				$this->db->limit($length,$start);
			}
			if($order_by!=null && $order!=null){
				$this->db->order_by($order_by,$order);
			}
			if($order_no!=null){
				$this->db->like('course_detail.order_no',$order_no);
			}
			if($order_date!=null){
				$this->db->where('course_detail.order_date',$order_date);
			}
			$this->db->join('training_institutes','training_institutes.id = course_detail.training_institute_id');
			$this->db->join('courses','courses.id = course_detail.course_id');	
			$this->db->join('course_members','course_members.employee_id = '.$selected_user_id.' and course_members.course_detail_id = course_detail.id','left');
			$this->db->from($this->table);
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result();
		}
		
		public function getTotalProfessionalCourseDetailNames(){
			$this->db->select('count(*) as total');
			$this->db->from($this->table);
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result()[0]->total;
		}
		
		public function getTotalFilteredProfessionalCourseDetailNames($where=null,$search_Text=null){
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
						$this->db->where('start_date >=',$v);
					}elseif($k=='date_to'){
						$this->db->where('end_date <=',$v);
					}elseif($k=='apc_date_in_bn_input'){
						$this->db->group_start();
						$this->db->where('start_date <=',$v.' 00:00:00');
						$this->db->where('end_date >=',$v.' 23:59:59');
						$this->db->group_end();
					}else{
						$this->db->where($k,$v);
					}
				}
			}
			$this->db->from($this->table);
			$query = $this->db->get();
			return $query->result()[0]->total;
		}
		public function isCourseOrderNoUnique($order_no,$course_id){
			$this->db->select('count(*) as total');
			$this->db->where('order_no',$order_no);
			if($course_id!=null){
				$this->db->where('id !=',$course_id);
			}
			$query = $this->db->get($this->table);
			$result =$query->result();
			return $result[0]->total;
		}
	}