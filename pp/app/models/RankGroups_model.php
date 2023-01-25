<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class RankGroups_model extends CI_Model{
		var $order_column = array(null, "title", "description");
		private $table = 'rank_groups';
		/**
			Get the ranks from databse
		*/
		public function getRankGroups($search=null,$orderby=null,$order_dir=null,$length=null,$start=null){
			$this->db->select('*');
			$this->getRankFilters($search,$orderby,$order_dir,$length,$start);
			$this->db->from($this->table);
			$query = $this->db->get();
			$result = $query->result();
                        //echo $this->db->last_query();
			return $result;
		}
		/**
			get the total count of filtered ranks
		*/
		public function getTotalFilteredRankGroups($search=null,$orderby=null,$order_dir=null,$length=null,$start=null){
			$this->db->select('count(*) as total');
			$this->db->from($this->table);
			$this->getRankFilters($search,$orderby,$order_dir,$length=null,$start=null);
			$query = $this->db->get();
			$result = $query->result();
			return $result[0]->total;
		}
		/**
			Get the total number of ranks
		*/
		public function getTotalRankGroups(){
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
					$this->db->like('rank_groups.title',$search['all_columns']);
					$this->db->or_like('rank_groups.description',$search['all_columns']);
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
		public function addRankGroup($title,$description,$variable_name){
			$add = ['title'=>$title,'description'=>$description,'variable_name'=>$variable_name];
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
		public function editRankGroup($id,$title,$description){
			$update = ['title'=>$title,'description'=>$description];
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
		public function getRankGroup($id){
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
		public function deleteRankGroup($rank_group_id){
			$this->db->where('id',$rank_group_id);
			$data = $this->db->delete($this->table);
			return $data;
		}
                public function getRankGroupIdsByVariableNames($variable_names){
                    $this->db->select('*');
                    $this->db->where_in('variable_name',$variable_names);
                    $query = $this->db->get($this->table);
                    $result = $query->result();
                    return $result;
                }
	}