<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class AccountBranch_model extends CI_Model{
		var $order_column = array(null, "name", "parent_posting_id",null);
		private $table = 'account_soes';
		private $table2 = 'account_bill';
		public function getSoes($soe_name = null){
			$this->db->select('*');
			if($soe_name!=null){
				$this->db->like('name',$soe_name);
			}
			//date filter
			if(isset($_POST['length']) && $_POST["length"] != -1){
				$this->db->limit($_POST["length"], $_POST["start"]);
			}
			$this->db->order_by('created','desc');
			$query = $this->db->get($this->table);
			return $query->result();
		}
		public function getSoesCount($soe_name=null){
			$this->db->select('count(*) as total');
			if($soe_name!=null){
				$this->db->like('name',$soe_name);
			}
			//date filter
			
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result[0]->total;
		}
		public function getSoe($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
		}
		public function addSoe($title){
			$add = ['name'=>$title];
			$status = $this->db->insert($this->table,$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function updateSoe($title,$id){
			$add = ['name'=>$title];
			$this->db->where('id',$id);
			$status = $this->db->update($this->table,$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function deleteSoe($soe_id){
			$this->db->where('id',$soe_id);
			$status = $this->db->delete($this->table);
			return $status;
		}
		public function isUnique($title,$id){
		
			$this->db->select('count(*) as total');
			$this->db->where('name',$title);
			if(null!=$id && is_numeric($id)){
				$this->db->where('id != ',$id);
			}
			$query = $this->db->get($this->table);
			$result = $query->result();
			if($result[0]->total>0){
				return false;
			}else{
				return true;
			}
		}
		public function addBill($soe, $alloted_amount, $expenditure_amount, $bill_submitted_in_treasury, $bill_submitted_in_treasury_after_pending_liabilities, $date, $remarks, $bat_id){
			$add = array(
				'soe_id'=>$soe,
				'amount_alloted'=>$alloted_amount, 
				'expenditure_amount'=>$expenditure_amount, 
				'bill_sub_treasury'=>$bill_submitted_in_treasury,
				'bill_sub_treasury_after_liabilities'=>$bill_submitted_in_treasury_after_pending_liabilities, 
				'date'=>$date, 
				'remarks'=>$remarks,
				'bat_id' =>$bat_id
			);
			$status = $this->db->insert($this->table2,$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function updateBill($id, $soe, $alloted_amount, $expenditure_amount, $bill_submitted_in_treasury, $bill_submitted_in_treasury_after_pending_liabilities, $date, $remarks, $bat_id){
			$edit = array(
				'soe_id'=>$soe,
				'amount_alloted'=>$alloted_amount, 
				'expenditure_amount'=>$expenditure_amount, 
				'bill_sub_treasury'=>$bill_submitted_in_treasury,
				'bill_sub_treasury_after_liabilities'=>$bill_submitted_in_treasury_after_pending_liabilities, 
				'date'=>$date, 
				'remarks'=>$remarks,
			);
			$this->db->where('id', $id);
			$status = $this->db->update($this->table2,$edit);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function getBill($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table2);
			return $query->result();
		}
		public function getBills($bat_ids=null,$soe_ids=null,$startDate=null,$endDate=null){
			$this->db->select('*, '.$this->table2.'.id as bill_id');
			if($bat_ids!=null){
				$this->db->where_in('bat_id',$bat_ids);
			}
			if($soe_ids!=null){
				$this->db->where_in('soe_id',$soe_ids);
			}
			//date filter
			if(isset($_POST['length']) && $_POST["length"] != -1){
				$this->db->limit($_POST["length"], $_POST["start"]);
			}
			if($startDate!=null && $endDate!=null){
				$this->db->where('date >=',$startDate);
				$this->db->where('date <=',$endDate);
			}
			$this->db->order_by('date','desc');
			$this->db->join($this->table," {$this->table2}.soe_id = {$this->table}.id");
			$query = $this->db->get($this->table2);
			//echo $this->db->last_query();
			return $query->result();
		}
		
		public function getBillsCount($bat_ids=null,$soe_ids=null){
			$this->db->select('count(*) as total');
			if($bat_ids!=null){
				$this->db->where_in('bat_id',$bat_ids);
			}
			if($soe_ids!=null){
				$this->db->where_in('soe_id',$soe_ids);
			}
			//date filter
			
			$query = $this->db->get($this->table2);
			$result = $query->result();
			return $result[0]->total;
		}
		public function deleteBill($bill_id){
			$this->db->where('id',$bill_id);
			$data = $this->db->delete($this->table2);
			return $data;
		}
	}