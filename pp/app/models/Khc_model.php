<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Khc_model extends CI_Model{
	/**MSK */
	/**
		Fetch all the names of security Equipments
	*/
	function getALLKHCBattalions2($id=null){
		
		$this->db->select(array('users_id','user_name','nick'));
		if($id!=null){
                    if($id==IGP_IRB_ID){		//irb
                            $ids = array(191,166,155,114,109,161,122,214,203);  //msk ids
                            $this->db->where_in('users_id',$ids);
                    }elseif($id==IGP_CDO_ID){	//cdo
                            $ids = array(101,173,143,149,179,197,215);  //msk ids
                            $this->db->where_in('users_id',$ids);
                    }elseif($id==38){			//pap	all the battalion in case it is pap*/
                            $this->db->where('user_log',3);
                    }elseif($this->session->user_log==5){
                            $id = $this->session->userid;
                            $this->db->where('users_id',$id);
                    }
                }else{
                    $id=$this->session->userdata("userid");
                    if($this->session->user_log==5){
                            $id = $this->session->userid;
                            $this->db->where('users_id',$id);
                    }elseif($id==38 || $id==IGP_IRB_ID || $id==IGP_CDO_ID){			//pap	all the battalion in case it is pap*/
                            $this->db->where('user_log',3);
                    }else{
                        $id = $this->session->userid;
                        $this->db->where('users_id',$id);
                    }
                }
		$query = $this->db->get('users');
		return $query->result();
	}
        function getALLKHCBattalions($id=null){
		
		$this->db->select(array('users_id','user_name','nick'));
		if($id!=null){
                    if($id==IGP_IRB_ID){		//irb
                        $this->db->group_start();
                        $this->db->like('user_name','irb.khc');
                        $this->db->or_like('user_name','Rtc.lk.khc');
                        $this->db->group_end();
                        //$ids = array(191,166,155,114,109,161,122,214,203);
                        //$this->db->where_in('users_id',$ids);
                    }elseif($id==IGP_CDO_ID){	//cdo
                        $this->db->group_start();
                        $this->db->like('user_name','cdo.khc');
                        $this->db->or_like('user_name','Ctc.bhg.khc');
                        $this->db->group_end();
                        //$ids = array(101,173,143,149,179,197,215);
                        //$this->db->where_in('users_id',$ids);
                    }elseif($id==38){			//pap	all the battalion in case it is pap*/
                        $this->db->where('user_log',3);
                    }
                }else{
                    $id=$this->session->userdata("userid");
                    if($this->session->user_log==5){
                            $id = $this->session->userid;
                            $this->db->where('users_id',$id);
                    }elseif($id==38 || $id==IGP_IRB_ID || $id==IGP_CDO_ID){			//pap	all the battalion in case it is pap*/
                            $this->db->where('user_log',3);
                    }else{
                        $id = $this->session->userid;
                        $this->db->where('users_id',$id);
                    }
                }
		$query = $this->db->get('users');
		return $query->result();
	}
}
/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.* FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` WHERE `istatus` = 0 */

/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.`atype`,`issue_arm`.`abore`,`issue_arm`.`mags`,`issue_arm`.`amqunt`,`issue_arm`.`amqunt`,`newosi`.`name`,`newosi`.`name`,`issue_arm`.`typeofduty`,`issue_arm`.`placeofduty`,`issue_arm`.`idate` FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` JOIN `newosi` ON `newosi`.`man_id` = `issue_arm`.`issueto` WHERE `istatus` = 0 */
?>