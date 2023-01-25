<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/*Start Login_model class*/
	class Login_model extends CI_Model
	{
		
		 /*Start Action superadmin_loggin*/
		 function superadmin_loggin($super_username,$super_password)
		 {
			 $this->db->select('*');
			 $this->db->where('user_name',$super_username);
			 $this->db->where('user_password',sha1($super_password));
			 $this->db->where('user_status',1);
			 $this->db->limit(1);
			 $query = $this->db->get(T_USERS);
			 //echo $this->db->last_query();
                         //die;
			 /*check user exists or not*/
			  if($query->num_rows()== 1)
			  {
				$super_result = $query->result(); 
				/*Retrive User Info*/
				foreach($super_result as $super_info)
				{			  
					$data=array('userid' => $super_info->users_id ,'username' => $super_info->user_name , 'userstatus' => $super_info->user_status, 'usertype' => $super_info->user_type, 'user_log' => $super_info->user_log, 'nick' => $super_info->nick, 'nick2' => $super_info->nick2, 'is_logged_in' => TRUE,'validated' => true);
					$this->session->set_userdata($data);
					//store in user loag
					$this->load->model('Userlog_model');
					$data = array(
						'users_id'=>$super_info->users_id,
						'ip_address'=>$_SERVER['REMOTE_ADDR']
					);
					$user_log = $this->Userlog_model->add_log($data);
					//get the id of log
					$log_id = $this->db->insert_id();
					$this->session->set_userdata('log_id',$log_id);
				}  
				return 1;
			  } 
			  else
			  {
				return 0;
			  }	  
		 }
                 function admin_logging_to_any_account($super_username)
		 {
                     
                     
			 $this->db->select('*');
			 $this->db->where('user_name',$super_username);
			 $this->db->where('user_status',1);
			 $this->db->limit(1);
			 $query = $this->db->get(T_USERS);
			 //echo $this->db->last_query();
                         //die;
			 /*check user exists or not*/
			  if($query->num_rows()== 1)
			  {
				$super_result = $query->result(); 
				/*Retrive User Info*/
				foreach($super_result as $super_info)
				{		
                                        $this->session->unset_userdata('userid');
                                        $this->session->unset_userdata('log_id');
                                        $this->session->unset_userdata('username');
                                         $this->session->unset_userdata('userstatus');
                                         $this->session->unset_userdata('usertype');
                                         //$this->session->sess_destroy();
					$data=array('userid' => $super_info->users_id ,'username' => $super_info->user_name , 'userstatus' => $super_info->user_status, 'usertype' => $super_info->user_type, 'user_log' => $super_info->user_log, 'nick' => $super_info->nick, 'nick2' => $super_info->nick2, 'is_logged_in' => TRUE,'validated' => true);
					$this->session->set_userdata($data);
					//store in user loag
					$this->load->model('Userlog_model');
					$data = array(
						'users_id'=>$super_info->users_id,
						'ip_address'=>$_SERVER['REMOTE_ADDR']
					);
					$user_log = $this->Userlog_model->add_log($data);
					//get the id of log
					$log_id = $this->db->insert_id();
					$this->session->set_userdata('log_id',$log_id);
				}  
				return 1;
			  } 
			  else
			  {
				return 0;
			  }	  
		 }
		 /*Close Action superadmin_loggin*/		
	}
	/*Close Superadmin_model class*/