<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class DeploymentReport_model extends CI_Model{
		private $order_by_columns = [null,'title','description','created',null];
		private $table = 'posting_deployment_reports';
		/**
			get the list of deployment reports
		*/
		public function getReportsList($where=null){
			$this->db->select('*');
			if($where!=null && is_array($where)){
				foreach($where as $k=>$val){
					$this->db->like($k,$val);
				}
			}
			if(isset($_POST["order"]))  
		    {  
				$this->db->order_by($this->order_by_columns[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		    }else{
				$this->db->order_by('created', 'DESC'); 
			}
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		/**
			get the total no of deployment reports
		*/
		public function getDeploymentReportTotalCount(){
			$this->db->select('count(*) as total');
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result[0]->total;
		}
		/**
			Get the filtered total no of deployment reports
		*/
		public function getDeploymentReportTotalFilteredCount($where=null){
			$this->db->select('count(*) as total');
			if($where!=null && is_array($where)){
				foreach($where as $k=>$val){
					$this->db->like($k,$val);
				}
			}
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result[0]->total;
		}
		/**
			Add the deployment Report to database
		*/
		public function addDeploymentReport($title,$description){
			error_reporting(E_ALL);
			//$this->db->trans_start();
			$created_date = new DateTime();
			$add = ['title'=>$title,'description'=>$description,'created'=>$created_date->format('Y-m-d H:i:s')];
			$status = $this->db->insert($this->table,$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		/**
			udpate the deployment Report to database
			
		*/
		public function updateDeploymentReport($id,$title,$description){
			error_reporting(E_ALL);
			//$this->db->trans_start();
			$created_date = new DateTime();
			$update = ['title'=>$title,'description'=>$description];
			$this->db->where('id',$id);
			$status = $this->db->update($this->table,$update);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		/**
			delete the deployment Report to database
			
		*/
		public function deleteDeploymentReport($id){
			error_reporting(E_ALL);
			$this->db->where('id',$id);
			$status = $this->db->delete($this->table);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		/**
			get the single Deployment report
		*/
		public function getDeploymentReport($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
	}