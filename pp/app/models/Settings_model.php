<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Settings_model extends CI_Model{
		
		public function getAll($table){
			$this->db->select('man_id,name,dateofbith');
			//$this->db->where_in('man_id',array(246,248,249,253));
			$query  = $this->db->get($table);
			$result = $query->result();
			return $result;
		}
		public function update($table, $update_array, $conditional_column){
			$this->db->update_batch($table,$update_array, $conditional_column);
		}
		//----------------------
		var $order_column = array(null, "name", "parent_posting_id",null);
		private $table = 'postings';
		function addPosting($name,$root){
			error_reporting(E_ALL);
			$add = ['name'=>$name,'parent_posting_id'=>$root,'bat_id'=>$this->session->userdata('userid'),'added_by'=>$this->session->userdata('userid')];
			$status = $this->db->insert($this->table,$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function getAllPostings(){
			$this->db->select('*');
			//$this->db->order_by('parent_posting_id','ASC');
			$query = $this->db->get($this->table);
			if(isset($_POST["search"]["value"]))
			{
				$this->db->like('name',$_POST["serach"]["value"]);
			}
			if(isset($_POST["order"])){
				$this->db->order_by('name',$_POST['order']['0']['dir']);
			}else{
				$this->db->order_by("name","ASC");
			}
			$result = $query->result();
			return $result;
		}
		//---------------------------------------------------------------------------------------------------------
		public function make_query(){
			$this->db->select(array('id','name','parent_posting_id','nick'));
			
			$query = $this->db->from($this->table);
			if(isset($_POST["search"]["value"]))
			{
				$this->db->like('name',$_POST["search"]["value"]);
				
			}
			if(isset($_POST["order"]))  
		    {  
				$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']); 
		    } else{
				$this->db->order_by('parent_posting_id', 'ASC');  
			}
			$this->db->join('users','users.users_id = postings.bat_id');
		}
		public function make_datatables(){
			$this->make_query();
			if($_POST["length"] != -1){
				$this->db->limit($_POST["length"], $_POST["start"]);
			}
			$query = $this->db->get();
			return $query->result();
		}
		function get_filtered_data(){
			$this->make_query();
			$query = $this->db->get();
			return $query->num_rows();
		}
		function get_all_data(){
			$this->db->select('*');
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}
		function get_parent_postings($ids){
			$this->db->select('*');
			$this->db->where_in($ids);
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		//----------------------------------------------------------------------------------
		public function getPostingsByName($posting_name){
			$this->db->select('*');
			 $this->db->like('name',$posting_name);
			$this->db->order_by('parent_posting_id','ASC');
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		
		/**
		* here we are fetching the subpostings under the selected Posting_model
		* the id of posting = parent_posting_id of 
		*/
		public function getSubPostingOf($id){
			$this->db->select('*');
			$this->db->where('parent_posting_id',$id);
			$this->db->order_by('parent_posting_id','ASC');
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		public function getPreviousPostingId($parent_posting_id){
			$this->db->select('*');
			$this->db->where('id',$parent_posting_id);
			$this->db->limit(1);
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		public function getPostingById($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			return $result = $query->result();
		}
		public function getParentPosting($parent_posting_id){
			$this->db->select('*');
			$this->db->where('id',$parent_posting_id);
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		/*public function update($data,$where){
			$this->db->where($where);
			$a = $this->db->update($this->table,$data);
			if($a){
				return true;
			}
		}*/
		/*editing posting*/
		public function get_parentPostingId_of_parentPosting($parent_posting_id){
			$this->db->select('*');
			$this->db->where('id',$parent_posting_id);
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		//----------------------------------posting management osi module ------------ -------------- ------------- -----------------
		public function make_query_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName){
			$this->db->select(array('man_id','concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank) as current_rank','name','phono1','depttno'));
			
			$query = $this->db->from('newosi');
			/*	if(isset($_POST["search"]["value"]))
			{
				//$this->db->like('name',$_POST["search"]["value"]);
				$this->db->like('depttno',$_POST["search"]["value"]);
				
			}*/
			if($this->session->userdata('user_log') == 4){
				$this->db->where('bat_id',$this->session->userdata('userid'));
			}
			$this->db->where('bat_id !=','0');
			if(null!=$selectedPolicePersonnelIds){
				$this->db->where_not_in('man_id',explode(',',$selectedPolicePersonnelIds));
			}
			
			if(null!=$selectedPolicePersonnelBeltNo && !empty($selectedPolicePersonnelBeltNo) && (count($selectedPolicePersonnelBeltNo)>0)){
				$i=0;
				foreach($selectedPolicePersonnelBeltNo as $k=>$v){
					if($i==0){
						$this->db->like('depttno',$v);
						$i++;
					}else{
						$this->db->or_like('depttno',$v);
					}
				}
			}
			if(null!=$selectedPolicePersonnelPhoneNo){
				$this->db->like('phono1',$selectedPolicePersonnelPhoneNo);
			}
			if(null!=$selectedPolicePersonnelEmployeeName){
				$this->db->like('name',$selectedPolicePersonnelEmployeeName);
			}
			if(isset($_POST["order"]))  
		    {  
				$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']); 
		    } else{
				$this->db->order_by('name', 'ASC');  
			}
			//$this->db->join('users','users.users_id = postings.bat_id');
		}
		public function getSubPostings($parent_id){
			$this->db->select('*');
			$this->db->where('parent_posting_id',$parent_id);
			$this->db->order_by('parent_posting_id','ASC');
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		public function make_datatables_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName){
			$this->make_query_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName);
			
			if($_POST["length"] != -1){
				$this->db->limit($_POST["length"], $_POST["start"]);
			}else{
				$this->db->limit(10, 1);
			}
			$query = $this->db->get();
			return $query->result();
		}
		function get_filtered_data_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName){
			$this->make_query_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName);
			$query = $this->db->get();
			return $query->num_rows();
		}
		function get_all_data_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName){
			$this->db->select('*');
			if(null!=$selectedPolicePersonnelIds){
				$this->db->where_not_in('man_id',explode(',',$selectedPolicePersonnelIds));
			}
			$this->db->where('bat_id !=','0');
			/*if(null!=$selectedPolicePersonnelBeltNo && !empty($selectedPolicePersonnelBeltNo) && (count($selectedPolicePersonnelBeltNo)>0)){
				foreach($selectedPolicePersonnelBeltNo as $k=>$v){
					//$this->db->or_like('depttno',$v);
				}
			}
			if(null!=$selectedPolicePersonnelPhoneNo){
				$this->db->like('phono1',$selectedPolicePersonnelPhoneNo);
			}
			if(null!=$selectedPolicePersonnelEmployeeName){
				$this->db->like('name',$selectedPolicePersonnelEmployeeName);
			}*/
			$this->db->from('newosi');
			return $this->db->count_all_results();
		}
		function getSelectedPolicePersonnel($employee_ids){
			$this->db->select(array('man_id','concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank) as current_rank','name','phono1','depttno'));
			$this->db->where_in('man_id',$employee_ids);
			$query = $this->db->get('newosi');
			$result = $query->result();
			return $result;
		}
		/* Wrong */
		function get_parent_postings_for_employees($ids){
			$this->db->select('*');
			$this->db->where_in($ids);
			$query = $this->db->get('newosi');
			$result = $query->result();
			return $result;
		}
		function getPostingByNameAndParentId($searchText,$id){
			$this->db->select('*');
			$this->db->like('name',$searchText);
			$this->db->where('parent_posting_id',$id);
			$query = $this->db->get($this->table);
			$result = $query->result();
			//echo $this->db->last_query();
			return $result;
		}
		public function addPostingInBulk($posting_id,$employee_ids,$order_number,$posting_date){
			$data = array();
			$emp_ids = $employee_ids;
			foreach($emp_ids as $k=>$v){
				$data[] = array('posting_id'=>$posting_id, 'employee_id'=>$v, 'order_no'=>$order_number, 'posting_date'=>$posting_date,'bat_id'=>$this->session->userdata('userid'));
			}
			$no_of_records_inserted = $this->db->insert_batch('posting_history',$data);
			return $no_of_records_inserted;
		}
		public function getEmployeesAlreadyAdded($posting_id,$order_number,$employee_ids){
			$this->db->select('*');
			$this->db->where('posting_id',$posting_id);
			$this->db->where('order_no',$order_number);
			$this->db->where_in('employee_id',$employee_ids);
			$query = $this->db->get('posting_history');
			$result = $query->result();
			return $result;
		}
		
		
		//---------------------------------- ------------ -------------- ------------- -----------------
		
		// -------------- -------------- View of deployment statement-------------- -------------- -------------- --------------
		/*public function getAllPostings(){
			$this->db->select('*');
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}*/ //Declared above
		// -------------- -------------- -------------- -------------- -------------- --------------
}