<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Quarters_model extends CI_Model{
		public $table;
		public $user_log = 8;
		public function __construct(){
			$this->table = 'newquart';	
		}
		public function getAllQuarters($type_of_quarters,$battalions,$condition){
			//var_dump($type_of_quarters);	
			$this->db->select('*');
			$this->db->where_in('bat_id',array_keys($battalions));
			$this->db->where('bat_id !=',0);
			$this->db->where_in('typeofqtr',$type_of_quarters);
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		public function getBattalions($id=null){
			$this->db->select('*');
			$this->db->where('user_log',$this->user_log);
                        if($id!=null){
                            if($id==IGP_CDO_ID){
                                $this->db->group_start();
                                $this->db->like('user_name','cdo');
                                $this->db->or_like('user_name','Ctc.bhg.quart');
                                $this->db->group_end();
                            }else if($id==IGP_IRB_ID){
                                $this->db->group_start();
                                $this->db->like('user_name','irb');
                                $this->db->or_like('user_name','Rtc.lk.quart');
                                $this->db->group_end();
                            }
                        }
			$query = $this->db->get('users');
			$result = $query->result();
			return $result;
		}
	}
	