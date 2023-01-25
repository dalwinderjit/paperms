<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class TrainingInstitute_model extends CI_Model{
		var $order_column = array(null, "title", "description");
		private $table = 'training_institutes';
		
		public function addInstitute($institute_name,$address){
			$data = ['institute_name'=>$institute_name,'address'=>$address,'created'=>date('Y-m-d H:i:s'),'enabled'=>'YES','deleted'=>'NO'];
			$a = $this->db->insert($this->table,$data);
			return $a ;
		}
		public function udpateInstitute($id,$institute_name,$address,$enabled,$deleted){
			$data = ['institute_name'=>$institute_name,'address'=>$address,'created'=>date('Y-m-d H:i:s'),'enabled'=>$enabled,'deleted'=>$deleted];
			$this->db->where('id',$id);
			$a = $this->db->update($this->table,$data);
			return $a ;
		}
		public function getTotalTrainingInstitutes($where=null){
			$this->db->select('count(*) as total');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='institute_name'){
						$this->db->like('institute_name',$v);
					}elseif($k=='address'){
						$this->db->like('address',$v);
					}else{
						$this->db->where($k,$v);
					}
				}
			}
			$this->db->from($this->table);
			return $this->db->get()->result()[0]->total;
		}
		public function getTotalTrainingInstitutesWithName($name=null,$id){
			$this->db->select('count(*) as total');
			if($name!=null){
				$this->db->where('institute_name',$name);
			}
			if($id!=null){
				$this->db->where('id !=',$id);
			}
			$this->db->from($this->table);
			return $this->db->get()->result()[0]->total;
		}
		public function getTotalFilteredTrainingInstitutes($where=null,$searchText=null){
			$this->db->select('count(*) as total');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='institute_name'){
						$this->db->like('institute_name',$v);
					}elseif($k=='address'){
						$this->db->like('address',$v);
					}else{
						$this->db->where($k,$v);
					}
				}
			}
			$this->db->like('institute_name',$searchText);
			$this->db->or_like('address',$searchText);
			$this->db->from($this->table);
			return $this->db->get()->result()[0]->total;
		}
		/*** BElow Extra */	
		public function getInstitutesNames($where=null,$length=null,$start=null,$order_by=null,$order=null){
			$this->db->select('*');
			if($where!=null){
				foreach($where as $k=>$v){
					if($k=='institute_name'){
						$this->db->like('institute_name',$v);
					}elseif($k=='address'){
						$this->db->like('address',$v);
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
		
		public function getInstitute($id){
			if($id!=null){
				$this->db->select('*');
				$this->db->where('id',$id);
				$this->db->from($this->table);
				return $this->db->get()->result();
			}else{
				return false;
			}
		}
		
		/***
			Delete the instituteby id
		*/
		public function deleteInstitute($rank_id){
			$data = ['deleted'=>'YES'];
			$this->db->where('id',$rank_id);
			$data = $this->db->update($this->table,$data);
			return $data;
		}
		
		public function recoverInstitute($rank_id){
			$data = ['deleted'=>'NO'];
			$this->db->where('id',$rank_id);
			$data = $this->db->update($this->table,$data);
			return $data;
		}
		
		public function getInstitutesIDNamePair($where=null){
			$this->db->select('*');
			if($where!=null){
				foreach($where as $k=>$v){
					$this->db->where($k,$v);
				}
			}
			$this->db->from($this->table);
			return $this->db->get()->result();
		}
	}