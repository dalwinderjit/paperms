<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class CourseMember_model extends CI_Model{
		var $order_column = array(null, "title", "description");
		private $table = 'course_members';
		private $table2 = 'employee_courses';
		private $table3 = 'courses';
		
		public function addCourseToEmployee($data){
			$a = $this->db->insert($this->table2,$data);
			return $a ;
		}
		public function updateCourseToEmployee($id,$data){
			$this->db->where('id',$id);
			$a = $this->db->update($this->table2,$data);
			return $a ;
		}
		public function isUniqueCourseMember($data){
			$this->db->select('count(*) as total');
			$this->db->where('course_detail_id',$data['course_detail_id']);
			$this->db->where('employee_id',$data['employee_id']);
			//$this->db->where('order_no',$data['order_no']);
			//echo $this->db->last_query();
			$a = (int)$this->db->get($this->table)->result()[0]->total;
			//var_dump($a);
			if($a===0){
				return true;
			}else{
				return false;
			}
		}
		public function isUniqueCourseMemberOrderNo($data){
			$this->db->select('count(*) as total');
			$this->db->where('course_detail_id',$data['course_detail_id']);
			$this->db->where('employee_id',$data['employee_id']);
			$this->db->where('order_no',$data['order_no']);
			//echo $this->db->last_query();
			
			$a = (int)$this->db->get($this->table)->result()[0]->total;
			//var_dump($a);
			if($a===0){
				return true;
			}else{
				return false;
			}
		}
		public function getCourseById($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$this->db->from($this->table2);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
		public function getCoursesByIds($ids){
			$this->db->select('*');
			if(count($ids)>250){
				$arrays = array_chunk($ids,250);
				foreach($arrays as $k=>$val){
					$this->db->where_in('ids',$val);	
				}
			}else{
				$this->db->where_in('id',$ids);
			}
			$this->db->from($this->table3);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
		public function getEmployeeIdsByCourseAndTrainingInstituteId($course_id,$training_institute_id){
			$this->db->select('employee_id');
			if($course_id!=null){
				$this->db->where('course_id',$course_id);
			}
			if($training_institute_id!=null){
				$this->db->where('training_institute_id',$training_institute_id);
			}
			$this->db->from($this->table2);
			$query = $this->db->get();
			$result = $query->result();
			//echo $this->db->last_query();
			return $result;
		}
		public function getEmployeeIdsByCourseAndTrainingInstituteId2($course_id,$training_institute_id){
			$this->db->select('employee_id,course_id');
			if($course_id!=null){
				$this->db->where('course_id',$course_id);
			}
			if($training_institute_id!=null){
				$this->db->where('training_institute_id',$training_institute_id);
			}
			$this->db->from($this->table2);
			$query = $this->db->get();
			$result = $query->result();
			//echo $this->db->last_query();
			return $result;
		}
		
		public function getAllCourses(){
			$this->db->select('*');
			$this->db->from($this->table3);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
	}