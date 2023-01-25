<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class MTVehicle_model extends CI_Model{
		
		/**
		*	This function will fetch all the vehicles of selected battalions
		*/
		
		public function getAllVehicles($battalions,$vehicles){
			$this->db->select('catofvechicle,statusofvechile,bat_id');
			$this->db->where_in('bat_id',$battalions);
			$this->db->where_in('catofvechicle',$vehicles);
			$query = $this->db->get('newmt');
			return $query->result();
		}
		/**
		*	This function is used to fetch all the battalions
		*/
		function getBattalions(){
			$this->db->select(array('users_id','user_name'));
			if(in_array($this->session->userdata('userid'),[209,210])){		//irb
				$ids = array(194,170,158,116,111,169,124,206);
				$this->db->where_in('users_id',$ids);
			}elseif(in_array($this->session->userdata('userid'),[211,212])){	//cdo
				$ids = array(208,176,146,152,182,200);
				$this->db->where_in('users_id',$ids);
			}elseif(in_array($this->session->userdata('userid'),[38,39,40,41,42])){			//pap	all the battalion in case it is pap
				$this->db->where('user_log',6);
			}elseif($this->session->user_log==6){
				$id = $this->session->userid;
				$this->db->where('users_id',$id);
			}
			$query = $this->db->get('users');
			return $query->result();
		}
		
		function getUnits(){
			if($this->session->userdata('userid')==209){		//irb
				return array('irb'=>'IRB\'s');
			}elseif($this->session->userdata('userid')==211){	//cdo
				return array('cdo'=>'CDO\'s');
			}elseif($this->session->userdata('userid')==38){		//pap
				return array('pap'=>'PAP\'s','irb'=>'IRB\'s','cdo'=>'CDO\'s');
			}else{
				return array('pap'=>'PAP\'s','irb'=>'IRB\'s','cdo'=>'CDO\'s');
			}
		}
		/**
		confliction which bat id to use
		*/
		/*public function getAllVehiclesOnOffDuty($battalions, $vehicles){
			$this->db->select('issue_vehicle.bat_id as bat_id, newmt.bat_id as bat_id2, issue_vehicle.reg_no,issue_vehicle.issue_vehicle_id,issue_vehicle.place_of_duty,newmt.catofvechicle,issue_vehicle.date_of_duty,');
			$this->db->from('issue_vehicle');
			$this->db->join('newmt', 'newmt.mt_id = issue_vehicle.reg_no');
			$this->db->order_by('issue_vehicle.issue_vehicle_id','asc');
			//$this->db->group_by('reg_no');
			$query = $this->db->get();
			return $query->result();
		}*/
		
		/**
		confliction which bat id to use
		*/
		public function getAllVehiclesOnOffDuty($battalions, $vehicles){
			$this->db->select('issue_vehicle.bat_id as bat_id, newmt.bat_id as bat_id2, issue_vehicle.reg_no,issue_vehicle.issue_vehicle_id,issue_vehicle.place_of_duty,newmt.catofvechicle,issue_vehicle.date_of_duty');
			$this->db->from('newmt');
			$this->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
			$this->db->where_in('newmt.bat_id',$battalions);
			$this->db->where_in('newmt.catofvechicle',$vehicles);
			//$this->db->order_by('issue_vehicle.issue_vehicle_id','asc');
			$this->db->order_by('issue_vehicle.reg_no','asc');
			//$this->db->group_by('reg_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			$result = $query->result();
			return $query->result();
			/*$this->db->select('issue_vehicle.bat_id as bat_id, newmt.bat_id as bat_id2, issue_vehicle.reg_no,issue_vehicle.issue_vehicle_id,issue_vehicle.place_of_duty,newmt.catofvechicle,issue_vehicle.date_of_duty');
			$this->db->from('issue_vehicle');
			$this->db->join('newmt', 'newmt.mt_id = issue_vehicle.reg_no');
			$this->db->where_in('issue_vehicle.bat_id',$battalions);
			$this->db->where_in('newmt.catofvechicle',$vehicles);
			//$this->db->order_by('issue_vehicle.issue_vehicle_id','asc');
			$this->db->order_by('issue_vehicle.reg_no','asc');
			//$this->db->group_by('reg_no');
			$query = $this->db->get();
			//echo $this->db->last_query();
			$result = $query->result();
			return $query->result();*/
		}
                public function isCurrentYearPolUpdateExists($year){
                    $this->db->select('count(*) as total');
                    $this->db->where('cyear',$year);
                    $query = $this->db->get('pol_return');
                    //echo $this->db->last_query(); die();
                    $info = $query->row();
                    if($info->total==0){
                        return false;
                    }else{
                        return true;
                    }
                }/*Close*/
	}
	
	/* echo '<table border=1>';
			echo '<table border=1>';
			echo '<tr><td><table>';
			foreach($result as $k=>$v){
				echo '<tr><td>';
						echo $v->reg_no;
				echo '</td><td>';
					echo $v->date_of_duty;
				echo '</td></tr>';
			}
			echo '</table></td>';
			echo "<td><table>";
			
			foreach($selectedVehicles as $k=>$v){
				echo '<tr><td>';
						echo $v->reg_no;
				echo '</td><td>';
					echo $v->date_of_duty;
				echo '</td></tr>';
			}
			echo '</table></td></tr></table>';
			die; */
