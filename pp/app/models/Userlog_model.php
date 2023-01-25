<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/*Start Login_model class*/
	class Userlog_model extends CI_Model
	{
		private $table = 'user_log';
		/**
		*	add log
		*   when a user logged in store the data to user_log table
		*/
		public function add_log($data){
			$status = $this->db->insert('user_log',$data);
			return $status;
		}
		public function get_list($username = null, $ipaddress = null, $from_date = null, $to_date = null){
			$this->db->select('*');
			$this->db->order_by('log_in_time','desc');
			if(null!=$username){
				$this->db->like('users.user_name',$username);
			}
			if(null!=$ipaddress){
				$this->db->like('ip_address',$ipaddress);
			}

			if(null!=$from_date){
				$this->db->where("log_in_time > STR_TO_DATE('".$from_date."', '%Y-%m-%d %H:%i:%s')");
			}
			if(null!=$to_date){
				$this->db->where("log_in_time < STR_TO_DATE('".$to_date."', '%Y-%m-%d %H:%i:%s')");
			}
			$this->db->join('users', $this->table.'.users_id = users.users_id');
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		
	}
	/*Close Superadmin_model class*/