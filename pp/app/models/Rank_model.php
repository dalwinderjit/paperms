<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Rank_model extends CI_Model{
		var $order_column = array(null, "title", "description");
		private $table = 'ranks';
		private $table2 = 'rank_groups';
		
		/**
			Get the ranks from databse
		*/
		public function getRanks($search=null,$orderby=null,$order_dir=null,$length=null,$start=null){
			$this->db->select('ranks.id as rank_id, ranks.name as name, ranks.description as rank_description, ranks.short_name as rank_short_name, rank_groups.title as rank_groups_title');
			$this->getRankFilters($search,$orderby,$order_dir,$length,$start);
			$this->db->join($this->table2,$this->table.'.rank_group_id = '.$this->table2.'.id');
			$this->db->from($this->table);
			$query = $this->db->get();
			$result = $query->result();
			//echo $this->db->last_query();
			return $result;
		}
		/**
			get the total count of filtered ranks
		*/
		public function getTotalFilteredRanks($search=null,$orderby=null,$order_dir=null,$length=null,$start=null){
			$this->db->select('count(*) as total');
			$this->db->from($this->table);
			$this->getRankFilters($search,$orderby,$order_dir,null,null);
			$query = $this->db->get();
			$result = $query->result();
			return $result[0]->total;
		}
		/**
			Get the total number of ranks
		*/
		public function getTotalRanks(){
			$this->db->select('count(*) as total');
			$this->db->from($this->table);
			$query = $this->db->get();
			$result = $query->result();
			return $result[0]->total;
		}
		/***
			filter for query
		*/
		public function getRankFilters($search=null,$orderby=null,$order_dir=null,$length=null,$start=null){
			if($search!=null){
				if(null!=$search['all_columns']){
					$this->db->group_start();
					$this->db->like('ranks.name',$search['all_columns']);
					$this->db->or_like('ranks.description',$search['all_columns']);
					$this->db->or_like('ranks.short_name',$search['all_columns']);
					$this->db->group_end();
				}
			}
			if($length!=null && $start!=null){
				$this->db->limit($length,$start);
			}
		}
		/***
			Add the rank group to the database
		*/
		public function addRank($name,$description,$short_name,$rank_group_id){
			$add = ['name'=>$name,'description'=>$description,'short_name'=>$short_name,'rank_group_id'=>$rank_group_id];
			$a = $this->db->insert($this->table,$add);
			if($a){
				return true;
			}else{
				return false;
			}
		}
		
		/***
			Update the rank group to the database
		*/
		public function editRank($id,$name,$description,$short_name,$rank_group_id){
			$update = ['name'=>$name,'description'=>$description,'short_name'=>$short_name,'rank_group_id'=>$rank_group_id];
			$this->db->where('id',$id);
			$a = $this->db->update($this->table,$update);
			if($a){
				return true;
			}else{
				return false;
			}
		}
		/**
			Get the rankGroup by id
		*/
		public function getRank($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table);
			$result = $query->result();
			if(null!=$result[0]){
				return $result[0];
			}else{
				return false;
			}
		}
		/***
			Delete the rank group by id
		*/
		public function deleteRank($rank_id){
			$this->db->where('id',$rank_id);
			$data = $this->db->delete($this->table);
			return $data;
		}
	}