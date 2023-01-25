<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Btalion_model extends CI_Model{
	 
	 /*Fetch all info start*/
	function fetchinfo($table,$where,$order_by = null){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 if($order_by!=null){
		$this->db->order_by($order_by['order_by'],$order_by['direction']);
	 }
	 $query = $this->db->get($table);
         
	 $info = $query->result();
	 return $info;
	}/*Close*/

	/*Fetch all info start*/
	function fetchinfocountss($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
		$this->db->where_in('bat_id',array('191','166','155','114','109','161','122'));
	}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
		$this->db->where_in('bat_id',array('101','173','143','149','179','197'));
	}
	 $query = $this->db->get($table);
	 $info = $query->num_rows();
	 return $info;
	}/*Close*/

	/*Fetch all info start*/
	function fetchinfocountssmsk($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $query = $this->db->get($table);
	 $info = $query->num_rows();
	 return $info;
	}/*Close*/

	/*Fetch all info start*/
	function fetchinfolike($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->like($list,$key);
	 endforeach;
	 $this->db->limit(100);
	 $query = $this->db->get($table);
	 $info = $query->result();
	 return $info;
	}/*Close*/

	 /*Fetch all info start*/
	function fetchinfowherein($table,$b,$c){
	 $this->db->select('*');
	 $this->db->where_in($b,$c);
	 $query = $this->db->get($table);
	 $info = $query->result();
	 return $info;
	}/*Close*/

	 /*Fetch all info start*/
	function fetchinfostate($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $this->db->order_by('city','ASC');
	 $query = $this->db->get($table);
	 $info = $query->result();
	 return $info;
	}/*Close*/

	 /*Fetch all info start*/
	function fetchinfostates($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $this->db->order_by('state','ASC');
	 $query = $this->db->get($table);
	 $info = $query->result();
	 return $info;
	}/*Close*/

	/*Fetch all info start*/
	function fetchinfogroup($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $this->db->group_by('nameofitem');
	 $query = $this->db->get($table);
	 $info = $query->result();
	 return $info;
	}/*Close*/

	/*Fetch all info start*/
	function fetchinfogroups($table,$where,$g){
		$this->db->select('*');
		foreach($where as $list =>$key):
		$this->db->where($list,$key);
		endforeach;
		$this->db->group_by($g);
		$this->db->order_by($g,'desc');
		$query = $this->db->get($table);
		$info = $query->result();
		return $info;
	}/*Close*/

	/*Fetch all info start*/
	function fetchinfogroupasc($table,$where,$g){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $this->db->group_by($g);
	 $this->db->order_by($g,'asc');
	 $query = $this->db->get($table);
	 $info = $query->result();
         //echo $this->db->last_query();
	 return $info;
	}/*Close*/
        function fetchinfogroupasc2($table,$where,$g){
            $this->db->select('*');
            foreach($where as $list =>$key):
            $this->db->where($list,$key);
            endforeach;
            $this->db->where('newwepon_dataqtyp.bore is NOT',null);
            $this->db->where('newwepon_dataqtyp.bore !=','');
            $this->db->group_by('newwepon_dataqtyp.arm,newwepon_dataqtyp.bore,newwepon_dataqtyp.bat_id');
            $this->db->order_by('newwepon_dataqtyp.arm','asc');
            $this->db->join("practice_ammu_report",'practice_ammu_report.wep = newwepon_dataqtyp.bore and practice_ammu_report.name = newwepon_dataqtyp.arm and practice_ammu_report.bat_id = newwepon_dataqtyp.bat_id','left');
            $query = $this->db->get($table);
            $info = $query->result();
            //echo $this->db->last_query();
            return $info;
	}/*Close*/

	/*Fetch all info start*/
	function figarm($tpi){
	 $this->db->select('*, 
CASE WHEN staofserv="In Kot" then count(tow) end as a , 
CASE WHEN staofserv="Issued" then count(tow) end as b , 
CASE WHEN staofserv="Case Property in kot" then count(tow) end as c , 
CASE WHEN staofserv="Case Property in PS" then count(tow) end as d , 
CASE WHEN staofserv="Condemn" then count(tow) end as e  , 
CASE WHEN staofserv="Lost" then count(tow) end as f');
	 // $this->db->where('old_weapon_status',1);
	 $this->db->where('tow',$tpi);
	 $this->db->join('users', 'users.users_id=old_weapon.bat_id');
	 $this->db->group_by('tow');
	 $this->db->group_by('bat_id');
	 $this->db->order_by("tow",'asc');
	 $query = $this->db->get('old_weapon');
	 $info = $query->result();
	 // echo $this->db->last_query();
	 // exit;
	 return $info;
	}/*Close*/

	function fetchinfomsk($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}
	function getAllWeapons($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

	/*Fetch all info limit start*/
	function fetchinfolimit($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 $this->db->limit(200);
	 endforeach;
	 $query = $this->db->get($table);
	 $info = $query->result();
	 return $info;
	}/*Close*/

	/*Fetch one info start*/
	function fetchoneinfo($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $query = $this->db->get($table);
	 $info = $query->row();
         //echo $this->db->last_query();
	 return $info;
	}/*Close*/
        
	 /*Fetch all info start*/
	function fetchinfoorder($table,$where,$g,$order='DESC'){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $this->db->order_by($g,$order);
	 $query = $this->db->get($table);
//	 echo $this->db->last_query(); die();
	 $info = $query->row();
	 return $info;
	}/*Close*/

/*==============*/

	 function get_users($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$limit,$start,$uniqe) {
			$this->db->select('*');			
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($Receivedfrom !=''){
			 $this->db->where('recfrom', $Receivedfrom);
			}if($fname !=''){
			 $this->db->where('fund_name', $fname);
			}if($tpi !=''){
			 $this->db->where('recived_type', $tpi);
			}
			$this->db->where_not_in('conofitem', 'C');
			$this->db->where('msk_status', 1);
		
			$this->db->where('bat_id', $uniqe);
			$this->db->limit($limit, $start);
			$query = $this->db->get('newmsk');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	
   }

   	 function get_usersmsk($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$limit,$start,$uniqe) {
			$this->db->select('*');			
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($cti !=''){
			$this->db->where('cat_of_item', $cti);
			}if($Receivedfrom !=''){
			 $this->db->where('issue_mode', $Receivedfrom);
			}if($Issuedto !=''){
			 $this->db->where('Issuedto', $Issuedto);
			}if($ovalue !=''){
			 $this->db->where('self_battalion', $ovalue);
			}
			$this->db->where('bat_id', $uniqe);
			$this->db->where('im_status', 1);

			$this->db->limit($limit, $start);
//                        echo 'hi';
                        $this->db->order_by("STR_TO_DATE(issue_date,'%d/%m/%Y') asc");
			$query = $this->db->get('issue_material');
//			echo $this->db->last_query(); die();
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	
   }

    function mskquntys($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue){
			$this->db->select('*');
			$this->db->select('SUM(quantity) AS total');					
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($cti !=''){
			$this->db->where('cat_of_item', $cti);
			}if($Receivedfrom !=''){
			 $this->db->where('issue_mode', $Receivedfrom);
			}if($Issuedto !=''){
			 $this->db->where('Issuedto', $Issuedto);
			}if($ovalue !=''){
			 $this->db->where('self_battalion', $ovalue);
			}
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('issue_material');
			$info = $query->result();
			return $info;
		}

function cmskquntys(){
			$this->db->select('*');
			$this->db->select('SUM(recqut) AS total');					
			 $this->db->where('conofitem', 'C');
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('newmsk');
			$info = $query->result();
			return $info;
		}

	 function mskquntysc($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$id){
			$this->db->select('*');
			$this->db->select('SUM(quantity) AS total');					
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($cti !=''){
			$this->db->where('cat_of_item', $cti);
			}if($Receivedfrom !=''){
			 $this->db->where('issue_mode', $Receivedfrom);
			}if($Issuedto !=''){
			 $this->db->where('Issuedto', $Issuedto);
			}if($ovalue !=''){
			 $this->db->where('self_battalion', $ovalue);
			}
			$this->db->where('bat_id',$id);
			$query = $this->db->get('issue_material');
			$info = $query->result();
			return $info;
		}

	 function get_userskhcpap($tpi,$orderno,$rcno,$mrec,$issued/*,$limit,$start*/) {

			$this->db->select('*');
			
			if($tpi !=''){
			$this->db->where('tow', $tpi);
			}if($orderno !=''){
			$this->db->where('bono', $orderno);
			}if($rcno !=''){
			$this->db->where('recvoc', $rcno);
			}if($mrec !=''){
			$this->db->where('magrec', $mrec);
			}if($issued !=''){
			 $this->db->where('staofserv', $issued);
			}
			//$this->db->where('old_weapon_status', 1);
			$this->db->where('bat_id',$this->session->userdata('myid'));
			//$this->db->limit($limit, $start);
			$query = $this->db->get('old_weapon');
			if ($query->num_rows() > 0) {
			return $query->result();
			}			
	}

	 function get_users_khcpap($tpi,$orderno,$rcno,$mrec,$issued) {
	 		$this->db->select('*');
			if($tpi !=''){
			$this->db->where('tow', $tpi);
			}if($orderno !=''){
			$this->db->where('bono', $orderno);
			}if($rcno !=''){
			$this->db->where('recvoc', $rcno);
			}if($mrec !=''){
			$this->db->where('magrec', $mrec);
			}if($issued !=''){
			 $this->db->where('staofserv', $issued);
			}
			//$this->db->where('old_weapon_status', 1);
			$this->db->where('bat_id',$this->session->userdata('myid'));
			$query = $this->db->get('old_weapon');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}

		 function get_cusersamuall($tpi,$tpi2,$limit,$start,$id) {
			$this->db->select('*');			
			if($tpi !=''){
			$this->db->where('arm', $tpi);
			}if($tpi2 !=''){
			$this->db->where('bore', $tpi2);
			}
			$this->db->where('bat_id', $id);
			$this->db->limit($limit, $start);
			$query = $this->db->get('newwepon_dataqtyp');
			if ($query->num_rows() > 0) {
			return $query->result();
			}		
	}

	 function get_usersamuall($ito,$tpi,$tpi2,$limit, $start) {
			$this->db->select('*');
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}			
			if($tpi !=''){
			$this->db->where('arm', $tpi);
			}if($tpi2 !=''){
			$this->db->where('bore', $tpi2);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('190','165','154','113','108','160','120'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('99','172','142','148','178','196'));
			}
			$this->db->limit($limit, $start);
			$query = $this->db->get('newwepon_dataqtyp');
			if ($query->num_rows() > 0) {
			return $query->result();
			}		
	}

	 function get_users_countamucall($ito,$tpi,$tpi2) {
	 	$this->db->select('*');	
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}			
			if($tpi !=''){
			$this->db->where('ammuwep', $tpi);
			}if($tpi2 !=''){
			$this->db->where('ammubore', $tpi2);
			}
			$query = $this->db->get('newamu');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}


	 function get_cusersamusall($tpi,$tpi2,$limit, $start,$id) {
			$this->db->select('*');			
			if($tpi !=''){
			$this->db->where('arm', $tpi);
			}if($tpi2 !=''){
			$this->db->where('bore', $tpi2);
			}
			$this->db->where('bat_id', $id);
			$this->db->limit($limit, $start);
			$query = $this->db->get('newwepon_dataqty');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 }

	 function get_usersamusall($ito,$tpi,$tpi2,$limit, $start) {
			$this->db->select('*');
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}			
			if($tpi !=''){
			$this->db->where('arm', $tpi);
			}if($tpi2 !=''){
			$this->db->where('bore', $tpi2);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('190','165','154','113','108','160','120'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('99','172','142','148','178','196'));
			}

			$this->db->limit($limit, $start);
			$query = $this->db->get('newwepon_dataqty');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 }

	 function get_users_countamuscall($ito,$tpi,$tpi2) {
	 	$this->db->select('*');	
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}			
			if($tpi !=''){
			$this->db->where('ammuwep', $tpi);
			}if($tpi2 !=''){
			$this->db->where('ammubore', $tpi2);
			}
			$query = $this->db->get('newamus');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}

	 function get_usersqtrall($ito,$tpi,$orderno,$rcno,$report,$limit,$start) {
			$this->db->select('*');
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}	
			if($tpi !=''){
			$this->db->where('qtrno', $tpi);
			}if($orderno !=''){
			$this->db->where('electronicmeter', $orderno);
			}if($rcno !=''){
			$this->db->where('allotmentorder', $rcno);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('193','168','157','118','168'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('207','175','145','151','181','199'));
			}
			//$this->db->where('quart_status', 1);
			if($report == 1){
				$this->db->group_by('bat_id');
			}
			
			//$this->db->limit($limit, $start);
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	}

	 function get_users_countqtrall($ito,$tpi,$orderno,$rcno,$report) {

	 		$this->db->select('*');	
	 		if($ito !=''){
			$this->db->where('bat_id', $ito);
			}	
			if($tpi !=''){
			$this->db->where('qtrno', $tpi);
			}if($orderno !=''){
			$this->db->where('electronicmeter', $orderno);
			}if($rcno !=''){
			$this->db->where('allotmentorder', $rcno);
			}
			
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('193','168','157','118','168'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('207','175','145','151','181','199'));
			}
			if($report == 1){
				$this->db->group_by('bat_id');
			}
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}

	function ccget_users_countqtrall($ito,$tpi,$orderno,$rcno,$report) {

	 		$this->db->select('*');	
	 		if($ito !=''){
			$this->db->where('bat_id', $ito);
			}	
			if($tpi !=''){
			$this->db->where('qtrno', $tpi);
			}if($orderno !=''){
			$this->db->where('electronicmeter', $orderno);
			}if($rcno !=''){
			$this->db->where('allotmentorder', $rcno);
			}
			
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('193','168','157','118','168'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('207','175','145','151','181','199'));
			}
			if($report == 1){
				$this->db->group_by('bat_id');
			}
			$query = $this->db->get('newquart');
			//echo $this->db->last_query();
			//die;
			if ($query->num_rows() > 0) {
			return $query->num_rows();
			}	
	}


		 function get_cusersqtrall($tq,$floor,$Condition,$accts,$report,$id) {
			$this->db->select('*');
			if($tq !=''){
			$this->db->where('typeofqtr', $tq);
			}if($floor !=''){
			$this->db->where('flor', $floor);
			}if($Condition !=''){
			$this->db->where('condit', $Condition);
			}if($accts !=''){
			$this->db->where('accomdationtype', $accts);
			}
			$this->db->where('bat_id', $id);
			//$this->db->where('quart_status', 1);
			if($report == 1){
				$this->db->group_by('bat_id');
			}
			
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	}

		 function get_cusers_countqtrall($tq,$floor,$Condition,$accts,$id) {

		 	$this->db->select('*');	
		 		if($tq !=''){
			$this->db->where('typeofqtr', $tq);
			}if($floor !=''){
			$this->db->where('flor', $floor);
			}if($Condition !=''){
			$this->db->where('condit', $Condition);
			}if($accts !=''){
			$this->db->where('accomdationtype', $accts);
			}
				$this->db->where('bat_id', $id);
				//$this->db->where('quart_status', 1);
				$this->db->group_by('bat_id');
				$query = $this->db->get('newquart');
				if ($query->num_rows() > 0) {
				return $query->result();
				}	
		}

	 function get_usersqtrallpap($tpi,$orderno,$rcno) {
			$this->db->select('*');	
			if($tpi !=''){
			$this->db->where('qtrno', $tpi);
			}if($orderno !=''){
			$this->db->where('electronicmeter', $orderno);
			}if($rcno !=''){
			$this->db->where('allotmentorder', $rcno);
			}
			$this->db->where('quart_status', 1);
			$this->db->where('bat_id',$this->session->userdata('myid'));
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	}

	 function get_users_countqtrallpap($tpi,$orderno,$rcno) {
	 		$this->db->select('*');		
			if($tpi !=''){
			$this->db->where('qtrno', $tpi);
			}if($orderno !=''){
			$this->db->where('electronicmeter', $orderno);
			}if($rcno !=''){
			$this->db->where('allotmentorder', $rcno);
			}
			$this->db->where('quart_status', 1);
			$this->db->where('bat_id',$this->session->userdata('myid'));
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}
	
	 function get_khc($limit,$start) {
	 		$this->db->select('*');
	 		$this->db->limit($limit, $start);
			$query = $this->db->get('old_weapon');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	
   }

	 function get_usersosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$limit,$start,$mobno) {
			if($Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' ||  $Postingtiset4 !='' || $Postingtiset5 !='' || $Postingtiset6 !=''  || $Postingtiset7 !='' ||  $Postingtiset8 !='' || $Postingtiset9 !=''){

			$this->db->select('*');
			$this->db->from('newosi');
			$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
				if($mobno !=''){
				 $this->db->like('newosi.phono1', $mobno);
				}
				if($name !=''){
				 $this->db->like('newosi.name', $name);
				}if($bloodgroup !=''){
				$this->db->where('newosi.bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('newosi.depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){$this->db->where('newosi.cexrank', $eor1);}
					elseif($RankRankre == 'Ministerial Staff'){$this->db->where('newosi.cminirank', $eor2);}
						elseif($RankRankre == 'Medical Staff'){$this->db->where('newosi.cmedirank', $eor3);}
							elseif($RankRankre == 'Class-IV (P)'){$this->db->where('newosi.ccprank', $eor4);}
								elseif($RankRankre == 'Class-IV (C)'){$this->db->where('newosi.cccrank', $eor5);}
				
				}if($postate !=''){
				 $this->db->where('newosi.state', $postate);
				}if($pcity !=''){
				 $this->db->where('newosi.district', $pcity);
				}if($stts !=''){
				 $this->db->where('newosi.eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('newosi.UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('newosi.Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('newosi.PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('newosi.Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('newosi.Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('newosi.gender', $gender);
				}if($height !=''){
				 $this->db->where('newosi.feet', $height);
				}if($inch !=''){
				 $this->db->where('newosi.inch', $inch);
				}if($single !=''){
				 $this->db->where('newosi.maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('newosi.modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('newosi.rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('newosi.enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('newosi.inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('newosi.dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('newosi.comlit', $clit);
				}if($p !=''){
				 $this->db->where('newosi.typeofduty', $p);
				}
				$this->db->where('bat_id!=',0);
				/*Posting 1*/
				if($Postingtiset =='VP Guards'){
					$this->db->like('newosip.fone1', $Postingtiset);
				}if($Postingtiset =='Jails Security'){
					$this->db->like('newosip.fone2', $Postingtiset);
				}if($Postingtiset =='Punjab Police HQRS,SEC.9,CHG'){
					$this->db->like('newosip.fone3', $Postingtiset);
				}if($Postingtiset =='DERA BEAS SECURITY DUTY'){
					$this->db->like('newosip.fone4', $Postingtiset);
				}if($Postingtiset =='OTHER STATIC GUARDS'){
					$this->db->like('newosip.fone5', $Postingtiset);
				}if($Postingtiset == 'Police Officer' || $Postingtiset == 'Retired Police Officer' || 
					$Postingtiset == 'Political Persons' || $Postingtiset == 'Civil Officers' ||
					 $Postingtiset == 'Judicial Officers' || $Postingtiset == 'Threatening persons' || $Postingtiset == 'PERSONAL SECURITY STAFF ARMED WING OFFICER'){
					$this->db->like('newosip.fone6', $Postingtiset);
				}if($Postingtiset =='VIP SEC.WING CHG.U/82nd BN.'){
					$this->db->like('newosip.fone7', $Postingtiset);
				}if($Postingtiset =='POLICE SEC.WING CHG U/13th BN.'){
					$this->db->like('newosip.fone8', $Postingtiset);
				}if($Postingtiset =='BANK SECURITY DUTY'){
					$this->db->like('newosip.fone9', $Postingtiset);
				}if($Postingtiset =='SPECIAL PROTECTION UNIT (C.M. SEC.)'){
					$this->db->like('newosip.fone10', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (SEC. DUTY)'){
					$this->db->like('newosip.fone11', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (RESERVE)'){
					$this->db->like('newosip.fone12', $Postingtiset);
				}/*Close 1*/

				/*Posting 2*/
				if($Postingtiset2 =='PERMANENT DUTY'){
					$this->db->like('newosip.lone1', $Postingtiset2);
				}if($Postingtiset2 =='DGP, RESERVES'){
					$this->db->like('newosip.lone2', $Postingtiset2);
				}if($Postingtiset2 =='TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY'){
					$this->db->like('newosip.lone3', $Postingtiset2);
				}/*Close 2*/

				/*Posting 3*/
				if($Postingtiset3 =='ANTI RIOT POLICE, JALANDHAR'){
					$this->db->like('newosip.sqone1', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MANSA'){
					$this->db->like('newosip.sqone2', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MUKATSAR'){
					$this->db->like('newosip.sqone3', $Postingtiset3);
				}if($Postingtiset3 =='S.D.R.F. TEAM, JALANDHAR'){
					$this->db->like('newosip.sqone4', $Postingtiset3);
				}if($Postingtiset3 =='SPL. STRIKING GROUPS'){
					$this->db->like('newosip.sqone5', $Postingtiset3);
				}if($Postingtiset3 =='SWAT TEAM (4TH CDO)'){
					$this->db->like('newosip.sqone6', $Postingtiset3);
				}if($Postingtiset3 =='SOG BHG.,PTL(SPECIAL OPS.GROUP)'){
					$this->db->like('newosip.sqone7', $Postingtiset3);
				}if($Postingtiset3 =='UNMANNED AERIAL VEHICLE (UAV)'){
					$this->db->like('newosip.sqone8', $Postingtiset3);
				}/*Close 3*/

				/*Posting 4*/
				if($Postingtiset4 =='ATTACHED WITH DISTT., MOHALI'){
					$this->db->like('newosip.paone1', $Postingtiset4);

				}if($Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 ==  'AD GUARD CP ASR'  || $Postingtiset4 ==  'AD GUARD DISTT MKT' || $Postingtiset4 ==  'AD GUARD DISTT LDH' || $Postingtiset4 ==  'AD GUARD DISTT BTL'){
					$this->db->like('newosip.paone22', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)'){
					$this->db->like('newosip.paone2', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)'){
					$this->db->like('newosip.paone3', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS MALE)'){
					$this->db->like('newosip.paone4', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)'){
					$this->db->like('newosip.paone5', $Postingtiset4);
				}if($Postingtiset4 =='C.P.O. ATTACHMENT UNDER 13TH BN'){
					$this->db->like('newosip.paone6', $Postingtiset4);
				}if($Postingtiset4 =='PB. POLICE OFFICER INSTITUTE SEC 32 CHG'){
					$this->db->like('newosip.paone7', $Postingtiset4);
				}if($Postingtiset4 =='NRI CELL MOHALI'){
					$this->db->like('newosip.paone8', $Postingtiset4);
				}if($Postingtiset4 =='INTELLIGENCE WING'){
					$this->db->like('newosip.paone9', $Postingtiset4);
				}if($Postingtiset4 =='CENTRAL POLICE LINE MOHALI'){
					$this->db->like('newosip.paone10', $Postingtiset4);
				}if($Postingtiset4 =='VIGILANCE BUREAU'){
					$this->db->like('newosip.paone11', $Postingtiset4);
				}if($Postingtiset4 =='STATE NARCOTIC CRIME BUREAU'){
					$this->db->like('newosip.paone12', $Postingtiset4);
				}if($Postingtiset4 =='MOHALI AIRPORT IMMIGRATION DUTY'){
					$this->db->like('newosip.paone13', $Postingtiset4);
				}if($Postingtiset4 =='STATE HUMAN RIGHTS COMMISSION'){
					$this->db->like('newosip.paone14', $Postingtiset4);
				}if($Postingtiset4 =='BUREAU OF INVESTIGATION'){
					$this->db->like('newosip.paone15', $Postingtiset4);
				}if($Postingtiset4 =='SPECIAL TASK FORCE(STF)'){
					$this->db->like('newosip.paone23', $Postingtiset4);
				}if($Postingtiset4 =='PPSSOC'){
					$this->db->like('newosip.paone24', $Postingtiset4);
				}if($Postingtiset4 =='RTC/PAP, JALANDHAR'){
					$this->db->like('newosip.paone16', $Postingtiset4);
				}if($Postingtiset4 =='ISTC/PAP, KAPURTHALA'){
					$this->db->like('newosip.paone17', $Postingtiset4);
				}if($Postingtiset4 =='POLICE COMMANDO TRG. CENTRE, BHG, PATIALA'){
					$this->db->like('newosip.paone18', $Postingtiset4);
				}if($Postingtiset4 =='RTC LADDA KOTHI SANGRUR'){
					$this->db->like('newosip.paone19', $Postingtiset4);
				}if($Postingtiset4 =='PUNJAB POLICE ACADEMY PHILLAUR'){
					$this->db->like('newosip.paone20', $Postingtiset4);
				}if($Postingtiset4 =='POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN'){
					$this->db->like('newosip.paone21', $Postingtiset4);
				}if($Postingtiset4 =='ERSS PROJECT DIAL 112'){
					$this->db->like('newosip.paone27', $Postingtiset4);
				}/*Close 4*/

				/*Posting 5*/
				if($Postingtiset5 =='BASIC TRANING'){
					$this->db->like('newosip.traning1', $Postingtiset5);
				}if($Postingtiset5 =='PROMOTIONAL COURSE'){
					$this->db->like('newosip.traning2', $Postingtiset5);
				}if($Postingtiset5 =='DEPARTMENT COURSE'){
					$this->db->like('newosip.traning3', $Postingtiset5);
				}/*Close 5*/

				/*Posting 6*/
				if($Postingtiset6 =='DSO'){
					$this->db->like('newosip.ssone23', $Postingtiset6);
				}if($Postingtiset6 =='CSO, JALANDHAR'){
					$this->db->like('newosip.ssone24', $Postingtiset6);
				}if($Postingtiset6 =='NIS PATIALA'){
					$this->db->like('newosip.ssone25', $Postingtiset6);
				}if($Postingtiset6 =='OTHERS'){
					$this->db->like('newosip.ssone26', $Postingtiset6);
				}/*Close 6*/

				/*Posting 7*/
				if($Postingtiset7 =='PAP CAMPUS  SECURITY' || $Postingtiset7 =='BN. KOT GUARDS' || $Postingtiset7 =='BN. HQRS OTHER GUARDS' || $Postingtiset7 == 'STATIC GUARD CR'){
					$this->db->like('newosip.awbone1', $Postingtiset7);
				}if($Postingtiset7 =='OFFICE STAFF IN HIGHER OFFICES'){
					$this->db->like('newosip.awbone3', $Postingtiset7);
				}if($Postingtiset7 == 'Commandant office' ||  $Postingtiset7 == 'Asstt. Comdt. office' || $Postingtiset7 == 'Dy.S.P. office' || $Postingtiset7 == 'English Branch' || $Postingtiset7 == 'Account Branch' || $Postingtiset7 == 'OSI Branch' || $Postingtiset7 == 'Litigation Branch' || $Postingtiset7 == 'Steno Branch'|| $Postingtiset7 =='GPF Branch' || $Postingtiset7 == 'Computer Cell' || $Postingtiset7 == 'Control Room' || $Postingtiset7 =='Reader to INSP' || $Postingtiset7 =='CCTNS office' || $Postingtiset7 =='Nodal Officer' || $Postingtiset7 =='Recruitment Cell' || $Postingtiset7 == 'Photostate Machine operator'){
					$this->db->like('newosip.awbone4', $Postingtiset7);
				}if($Postingtiset7 =='TRADEMEN'){
					$this->db->like('newosip.awbone7', $Postingtiset7);
				}if($Postingtiset7 =='M.T. SECTION'){
					$this->db->like('newosip.awbone8', $Postingtiset7);
				}if($Postingtiset7 =='Armourer & A/Armourer'){
					$this->db->like('newosip.awbone13', $Postingtiset7);
				}if($Postingtiset7 == 'Reserve Inspector' || $Postingtiset7 == 'Line Officer' || $Postingtiset7 == 'BHM & A/BHM' || $Postingtiset7 == 'MHC & A/MHC' || $Postingtiset7 == 'Reader/Orderly to RI' || $Postingtiset7 == 'I/C MESS' || $Postingtiset7 =='Asst. I/C MESS' || $Postingtiset7 == 'CDI' || $Postingtiset7 =='CDO & A/CDO' || $Postingtiset7 == 'Quarter Master INSP' || $Postingtiset7 =='MSK Branch' || $Postingtiset7 =='KHC' || $Postingtiset7 == 'I/C Class-IV' || $Postingtiset7 =='Quarter Munshi & Asstt.' || $Postingtiset7 == 'Quarter Munshi & Asstt.' || $Postingtiset7 =='I/C Canteen & Grossary Shop' || $Postingtiset7 =='CHC'){
					$this->db->like('newosip.awbone9', $Postingtiset7);
				}if($Postingtiset7 =='GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY'){
					$this->db->like('newosip.awbone10', $Postingtiset7);
				}if($Postingtiset7 =='TRG. RESERVE AT BN.HQRS.'){
					$this->db->like('newosip.awbone11', $Postingtiset7);
				}if($Postingtiset7 =='OTHER DUTIES'){
					$this->db->like('newosip.awbone12', $Postingtiset7);
				}/*Close 7*/

				/*Posting 8*/
				if($Postingtiset8 =='RECRUIT'){
					$this->db->like('newosip.bmdone1', $Postingtiset8);
				}if($Postingtiset8 =='Earned Leave' || $Postingtiset8 =='Casual Leave' || $Postingtiset8 =='Paternity Leave' || $Postingtiset8 =='Medical Leave' || $Postingtiset8 =='Ex-India Leave' || $Postingtiset8 =='Others' ||   $Postingtiset8 =='Handicapped on Medical Rest' ){ 
					$this->db->like('newosip.bmdone2', $Postingtiset8);
				}if($Postingtiset8 =='ABSENT'){
					$this->db->like('newosip.bmdone3', $Postingtiset8);
				}if($Postingtiset8 =='UNDER SUSPENSION'){
					$this->db->like('newosip.bmdone4', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on Medical Rest'){
					$this->db->like('newosip.bmdone5', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on light duty'){
					$this->db->like('newosip.bmdone6', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on light duty'){
					$this->db->like('newosip.bmdone8', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on Medical Rest'){
					$this->db->like('newosip.bmdone7', $Postingtiset8);
				}if($Postingtiset8 =='OSD ETC'){
					$this->db->like('newosip.bmdone9', $Postingtiset8);
				}/*Close 8*/

				/*Posting 9*/
				if($Postingtiset9 =='PRINTING PRESS' || $Postingtiset9 == 'PHOTOGRAPHY CELL' || $Postingtiset9 =='ART GALLERY' || $Postingtiset9 =='WIRELESS SECTION'|| $Postingtiset9 =='DUPLEX' || $Postingtiset9 =='PAP HOSPITAL' || $Postingtiset9 =='GRIEVANCES REDRESSAL CELL' || $Postingtiset9 =='GOLF CLUB' || $Postingtiset9 =='GOLF RANGE' || $Postingtiset9 =='GAZETTED OFFICERS MESS' || $Postingtiset9 =='MINI GOS MESS' || $Postingtiset9 == 'B.M.STAFF' || $Postingtiset9 == 'SEWERAGE AND SANITATION' || $Postingtiset9 =='B.D. TEAM' || $Postingtiset9 == 'ELECTRICITY WING' || $Postingtiset9 == 'PIPE BAND' || $Postingtiset9 =='BRASS BAND' || $Postingtiset9 =='MOUNTED POLICE' || $Postingtiset9 =='RE-BROWNING WORKSHOP' || $Postingtiset9 == 'BASE WORKSHOP' || $Postingtiset9 == 'PAP GAS AGENCY'|| $Postingtiset9 =='TEAR GAS SQUAD' || $Postingtiset9 =='EMPTY CATRIDGE CELL' || $Postingtiset9 == 'CABLE NETWORK' || $Postingtiset9 =='GURUDWARA SAHIB PAP CAMPUS' || $Postingtiset9 =='COUNSELLING AND CARRIER GUIDANCE CENTRE' || $Postingtiset9 =='PAP BOOK SHOP' || $Postingtiset9 =='COMPUTER HARDWARE CELL' || $Postingtiset9 =='PAP WEBSITE' || $Postingtiset9 =='COMPUTER TRG. CENTRE' || $Postingtiset9 =='LADIES WELFARE CENTRE &  MULTIPURPOSE HALL'|| $Postingtiset9 =='PAPCOS' || $Postingtiset9 =='SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV  SCHOOL' || $Postingtiset9 =='B.P. UNIT' || $Postingtiset9 =='BEAUTIFICATION STAFF' || $Postingtiset9 =='R.P.STAFF' || $Postingtiset9 =='SPECIAL GUARD' || $Postingtiset9 =='CO-OPERATIVE STORE' || $Postingtiset9 =='CULTURAL TROUP' || $Postingtiset9 =='APNA DHABA' || $Postingtiset9 =='SHIV SHAKTI MANDIR' || $Postingtiset9 =='SONA BATH' || $Postingtiset9 == 'SWIMMING POOL 25 MTR'|| $Postingtiset9 =='BAKERY' || $Postingtiset9 =='TECHNICAL TEAM'|| $Postingtiset9 =='PAP GYM. NEW' || $Postingtiset9 =='PAP GYM. OLD' || $Postingtiset9 =='ACUPRESSURE' || $Postingtiset9 =='SPORTS CAFE,MILK BAR & JUICE BAR PAP' || $Postingtiset9 =='INDOOR STADIUM' || $Postingtiset9 =='PAP  SHOOTING RANGE' || $Postingtiset9 =='BUGGLER' || $Postingtiset9 =='T/A 7th Bn PAP for Driver Duty' || $Postingtiset9 =='U/7th PAP for out Rider duty on Motor Cycle' || $Postingtiset9 =='M.T WORKSHOP U/7th BN PAP' || $Postingtiset9 =='PAP House' || $Postingtiset9 =='Camp Cleaning U/7th BN.PAP' || $Postingtiset9 == 'A/A Punjab State U/7th BN.PAP'){
					$this->db->like('newosip.instone10', $Postingtiset9);
					}if($Postingtiset9 =='IRB Institutions'){
						$this->db->like('newosip.instone1', $Postingtiset9);
					}if($Postingtiset9 =='PAP Outer Bn Institutions'){
						$this->db->like('newosip.instone3', $Postingtiset8);
					}if($Postingtiset9 =='CDO Institutions'){
						$this->db->like('newosip.instone2', $Postingtiset9);
					}/*close 9*/

				
				if($ito !='' ){
					$this->db->where('newosi.bat_id', $ito);
				}
				if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
				}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
					$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
				}else{
					$this->db->where('newosi.uid', 0);
				}
				
				$this->db->order_by('newosi.ono','ASC');
				 if($start == '0'){
			 	$this->db->limit($limit);
				 }else{
				 	$this->db->limit($limit, $start);
				 }
				$query = $this->db->get();
				//echo $this->db->last_query();
				if ($query->num_rows() > 0) {
				return $query->result();
				}

		}else{
				$this->db->select('man_id,name,cexrank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,bunitdistrict,bat_id');
				if($mobno !=''){
				 $this->db->like('phono1', $mobno);
				}if($name !=''){
				 $this->db->like('name', $name);
				}if($bloodgroup !=''){
				$this->db->where('bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){
						if($eor1 !=''){
							$this->db->where('newosi.cexrank', $eor1);
						}else{
							$this->db->where('newosi.presentrank', 'Executive Staff');
						}
					}
					elseif($RankRankre == 'Ministerial Staff'){
						if($eor2 !=''){
							$this->db->where('newosi.cminirank', $eor2);
						}else{
							$this->db->where('newosi.presentrank', 'Ministerial Staff');
						}
					}
						elseif($RankRankre == 'Medical Staff'){

							if($eor3 !=''){
							$this->db->where('newosi.cmedirank', $eor3);
							}else{
								$this->db->where('newosi.presentrank', 'Medical Staff');
							}
						}
						elseif($RankRankre == 'Class-IV (P)'){
							if($eor4 !=''){
							$this->db->where('newosi.ccprank', $eor4);
							}else{
								$this->db->where('newosi.presentrank', 'Class-IV (P)');
							}
						}
						elseif($RankRankre == 'Class-IV (C)'){
							if($eor5 !=''){
							$this->db->where('newosi.cccrank', $eor5);
							}else{
								$this->db->where('newosi.presentrank', 'Class-IV (C)');
							}
						}
				
				}if($postate !=''){
				 $this->db->where('state', $postate);
				}if($pcity !=''){
				 $this->db->where('district', $pcity);
				}if($stts !=''){
				 $this->db->where('eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('gender', $gender);
				}if($height !=''){
				 $this->db->where('feet', $height);
				}if($inch !=''){
				 $this->db->where('inch', $inch);
				}if($single !=''){
				 $this->db->where('maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('comlit', $clit);
				}
				if($ito !='' ){
					$this->db->where('newosi.bat_id', $ito);
				}
				if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
				}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
					$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
				}else{
					$this->db->where('bat_id!=',0);
				}
				 if($start == '0'){
			 	$this->db->limit($limit);
				 }else{
				 	$this->db->limit($limit, $start);
				 }
				 
				$query = $this->db->get('newosi');
				//echo $this->db->last_query(); die();
				if ($query->num_rows() > 0) {
				return $query->result();
				}
			}
	 	}

	 function get_users_countosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno) {
	 		if($Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' ||  $Postingtiset4 !='' || $Postingtiset5 !='' || $Postingtiset6 !=''  || $Postingtiset7 !='' ||  $Postingtiset8 !='' || $Postingtiset9 !=''){

			$this->db->select('*');
			$this->db->from('newosi');
			$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
				
				if($mobno !=''){
				 $this->db->like('newosi.phono1', $mobno);
				}if($name !=''){
				 $this->db->like('newosi.name', $name);
				}if($bloodgroup !=''){
				$this->db->where('newosi.bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('newosi.depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){
						if($eor1 !=''){
							$this->db->where('newosi.cexrank', $eor1);
						}else{
							$this->db->where('newosi.presentrank', 'Executive Staff');
						}
					}
					elseif($RankRankre == 'Ministerial Staff'){
						if($eor2 !=''){
							$this->db->where('newosi.cminirank', $eor2);
						}else{
							$this->db->where('newosi.presentrank', 'Ministerial Staff');
						}
					}
						elseif($RankRankre == 'Medical Staff'){

							if($eor3 !=''){
							$this->db->where('newosi.cmedirank', $eor3);
							}else{
								$this->db->where('newosi.presentrank', 'Medical Staff');
							}
						}
						elseif($RankRankre == 'Class-IV (P)'){
							if($eor4 !=''){
							$this->db->where('newosi.ccprank', $eor4);
							}else{
								$this->db->where('newosi.presentrank', 'Class-IV (P)');
							}
						}
						elseif($RankRankre == 'Class-IV (C)'){
							if($eor5 !=''){
							$this->db->where('newosi.cccrank', $eor5);
							}else{
								$this->db->where('newosi.presentrank', 'Class-IV (C)');
							}
						}
				
				}if($postate !=''){
				 $this->db->where('newosi.state', $postate);
				}if($pcity !=''){
				 $this->db->where('newosi.district', $pcity);
				}if($stts !=''){
				 $this->db->where('newosi.eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('newosi.UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('newosi.Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('newosi.PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('newosi.Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('newosi.Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('newosi.gender', $gender);
				}if($height !=''){
				 $this->db->where('newosi.feet', $height);
				}if($inch !=''){
				 $this->db->where('newosi.inch', $inch);
				}if($single !=''){
				 $this->db->where('newosi.maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('newosi.modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('newosi.rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('newosi.enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('newosi.inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('newosi.dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('newosi.comlit', $clit);
				}if($p !=''){
				 $this->db->where('newosi.typeofduty', $p);
				}

				/*Posting 1*/
				if($Postingtiset =='VP Guards'){
					$this->db->like('newosip.fone1', $Postingtiset);
				}if($Postingtiset =='Jails Security'){
					$this->db->like('newosip.fone2', $Postingtiset);
				}if($Postingtiset =='Punjab Police HQRS,SEC.9,CHG'){
					$this->db->like('newosip.fone3', $Postingtiset);
				}if($Postingtiset =='DERA BEAS SECURITY DUTY'){
					$this->db->like('newosip.fone4', $Postingtiset);
				}if($Postingtiset =='OTHER STATIC GUARDS'){
					$this->db->like('newosip.fone5', $Postingtiset);
				}if($Postingtiset == 'Police Officer' || $Postingtiset == 'Retired Police Officer' || 
					$Postingtiset == 'Political Persons' || $Postingtiset == 'Civil Officers' ||
					 $Postingtiset == 'Judicial Officers' || $Postingtiset == 'Threatening persons' || $Postingtiset == 'PERSONAL SECURITY STAFF ARMED WING OFFICER'){
					$this->db->like('newosip.fone6', $Postingtiset);
				}if($Postingtiset =='VIP SEC.WING CHG.U/82nd BN.'){
					$this->db->like('newosip.fone7', $Postingtiset);
				}if($Postingtiset =='POLICE SEC.WING CHG U/13th BN.'){
					$this->db->like('newosip.fone8', $Postingtiset);
				}if($Postingtiset =='BANK SECURITY DUTY'){
					$this->db->like('newosip.fone9', $Postingtiset);
				}if($Postingtiset =='SPECIAL PROTECTION UNIT (C.M. SEC.)'){
					$this->db->like('newosip.fone10', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (SEC. DUTY)'){
					$this->db->like('newosip.fone11', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (RESERVE)'){
					$this->db->like('newosip.fone12', $Postingtiset);
				}/*Close 1*/

				/*Posting 2*/
				if($Postingtiset2 =='PERMANENT DUTY'){
					$this->db->like('newosip.lone1', $Postingtiset2);
				}if($Postingtiset2 =='DGP, RESERVES'){
					$this->db->like('newosip.lone2', $Postingtiset2);
				}if($Postingtiset2 =='TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY'){
					$this->db->like('newosip.lone3', $Postingtiset2);
				}/*Close 2*/

				/*Posting 3*/
				if($Postingtiset3 =='ANTI RIOT POLICE, JALANDHAR'){
					$this->db->like('newosip.sqone1', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MANSA'){
					$this->db->like('newosip.sqone2', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MUKATSAR'){
					$this->db->like('newosip.sqone3', $Postingtiset3);
				}if($Postingtiset3 =='S.D.R.F. TEAM, JALANDHAR'){
					$this->db->like('newosip.sqone4', $Postingtiset3);
				}if($Postingtiset3 =='SPL. STRIKING GROUPS'){
					$this->db->like('newosip.sqone5', $Postingtiset3);
				}if($Postingtiset3 =='SWAT TEAM (4TH CDO)'){
					$this->db->like('newosip.sqone6', $Postingtiset3);
				}if($Postingtiset3 =='SOG BHG.,PTL(SPECIAL OPS.GROUP)'){
					$this->db->like('newosip.sqone7', $Postingtiset3);
				}if($Postingtiset3 =='UNMANNED AERIAL VEHICLE (UAV)'){
					$this->db->like('newosip.sqone8', $Postingtiset3);
				}/*Close 3*/

				/*Posting 4*/
				if($Postingtiset4 =='ATTACHED WITH DISTT., MOHALI'){
					$this->db->like('newosip.paone1', $Postingtiset4);

				}if($Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 ==  'AD GUARD CP ASR'  || $Postingtiset4 ==  'AD GUARD DISTT MKT' || $Postingtiset4 ==  'AD GUARD DISTT LDH' || $Postingtiset4 ==  'AD GUARD DISTT BTL'){
					$this->db->like('newosip.paone22', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)'){
					$this->db->like('newosip.paone2', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)'){
					$this->db->like('newosip.paone3', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS MALE)'){
					$this->db->like('newosip.paone4', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)'){
					$this->db->like('newosip.paone5', $Postingtiset4);
				}if($Postingtiset4 =='C.P.O. ATTACHMENT UNDER 13TH BN'){
					$this->db->like('newosip.paone6', $Postingtiset4);
				}if($Postingtiset4 =='PB. POLICE OFFICER INSTITUTE SEC 32 CHG'){
					$this->db->like('newosip.paone7', $Postingtiset4);
				}if($Postingtiset4 =='NRI CELL MOHALI'){
					$this->db->like('newosip.paone8', $Postingtiset4);
				}if($Postingtiset4 =='INTELLIGENCE WING'){
					$this->db->like('newosip.paone9', $Postingtiset4);
				}if($Postingtiset4 =='CENTRAL POLICE LINE MOHALI'){
					$this->db->like('newosip.paone10', $Postingtiset4);
				}if($Postingtiset4 =='VIGILANCE BUREAU'){
					$this->db->like('newosip.paone11', $Postingtiset4);
				}if($Postingtiset4 =='STATE NARCOTIC CRIME BUREAU'){
					$this->db->like('newosip.paone12', $Postingtiset4);
				}if($Postingtiset4 =='MOHALI AIRPORT IMMIGRATION DUTY'){
					$this->db->like('newosip.paone13', $Postingtiset4);
				}if($Postingtiset4 =='STATE HUMAN RIGHTS COMMISSION'){
					$this->db->like('newosip.paone14', $Postingtiset4);
				}if($Postingtiset4 =='BUREAU OF INVESTIGATION'){
					$this->db->like('newosip.paone15', $Postingtiset4);
				}if($Postingtiset4 =='SPECIAL TASK FORCE(STF)'){
					$this->db->like('newosip.paone23', $Postingtiset4);
				}if($Postingtiset4 =='PPSSOC'){
					$this->db->like('newosip.paone24', $Postingtiset4);
				}if($Postingtiset4 =='RTC/PAP, JALANDHAR'){
					$this->db->like('newosip.paone16', $Postingtiset4);
				}if($Postingtiset4 =='ISTC/PAP, KAPURTHALA'){
					$this->db->like('newosip.paone17', $Postingtiset4);
				}if($Postingtiset4 =='POLICE COMMANDO TRG. CENTRE, BHG, PATIALA'){
					$this->db->like('newosip.paone18', $Postingtiset4);
				}if($Postingtiset4 =='RTC LADDA KOTHI SANGRUR'){
					$this->db->like('newosip.paone19', $Postingtiset4);
				}if($Postingtiset4 =='PUNJAB POLICE ACADEMY PHILLAUR'){
					$this->db->like('newosip.paone20', $Postingtiset4);
				}if($Postingtiset4 =='POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN'){
					$this->db->like('newosip.paone21', $Postingtiset4);
				}if($Postingtiset4 =='ERSS PROJECT DIAL 112'){
					$this->db->like('newosip.paone27', $Postingtiset4);
				}/*Close 4*/

				/*Posting 5*/
				if($Postingtiset5 =='BASIC TRANING'){
					$this->db->like('newosip.traning1', $Postingtiset5);
				}if($Postingtiset5 =='PROMOTIONAL COURSE'){
					$this->db->like('newosip.traning2', $Postingtiset5);
				}if($Postingtiset5 =='DEPARTMENT COURSE'){
					$this->db->like('newosip.traning3', $Postingtiset5);
				}/*Close 5*/

				/*Posting 6*/
				if($Postingtiset6 =='DSO'){
					$this->db->like('newosip.ssone23', $Postingtiset6);
				}if($Postingtiset6 =='CSO, JALANDHAR'){
					$this->db->like('newosip.ssone24', $Postingtiset6);
				}if($Postingtiset6 =='NIS PATIALA'){
					$this->db->like('newosip.ssone25', $Postingtiset6);
				}if($Postingtiset6 =='OTHERS'){
					$this->db->like('newosip.ssone26', $Postingtiset6);
				}/*Close 6*/

				/*Posting 7*/
				if($Postingtiset7 =='PAP CAMPUS  SECURITY' || $Postingtiset7 =='BN. KOT GUARDS' || $Postingtiset7 =='BN. HQRS OTHER GUARDS' || $Postingtiset7 == 'STATIC GUARD CR'){
					$this->db->like('newosip.awbone1', $Postingtiset7);
				}if($Postingtiset7 =='OFFICE STAFF IN HIGHER OFFICES'){
					$this->db->like('newosip.awbone3', $Postingtiset7);
				}if($Postingtiset7 == 'Commandant office' ||  $Postingtiset7 == 'Asstt. Comdt. office' || $Postingtiset7 == 'Dy.S.P. office' || $Postingtiset7 == 'English Branch' || $Postingtiset7 == 'Account Branch' || $Postingtiset7 == 'OSI Branch' || $Postingtiset7 == 'Litigation Branch' || $Postingtiset7 == 'Steno Branch'|| $Postingtiset7 =='GPF Branch' || $Postingtiset7 == 'Computer Cell' || $Postingtiset7 == 'Control Room' || $Postingtiset7 =='Reader to INSP' || $Postingtiset7 =='CCTNS office' || $Postingtiset7 =='Nodal Officer' || $Postingtiset7 =='Recruitment Cell' || $Postingtiset7 == 'Photostate Machine operator'){
					$this->db->like('newosip.awbone4', $Postingtiset7);
				}if($Postingtiset7 =='TRADEMEN'){
					$this->db->like('newosip.awbone7', $Postingtiset7);
				}if($Postingtiset7 =='M.T. SECTION'){
					$this->db->like('newosip.awbone8', $Postingtiset7);
				}if($Postingtiset7 =='Armourer & A/Armourer'){
					$this->db->like('newosip.awbone13', $Postingtiset7);
				}if($Postingtiset7 == 'Reserve Inspector' || $Postingtiset7 == 'Line Officer' || $Postingtiset7 == 'BHM & A/BHM' || $Postingtiset7 == 'MHC & A/MHC' || $Postingtiset7 == 'Reader/Orderly to RI' || $Postingtiset7 == 'I/C MESS' || $Postingtiset7 =='Asst. I/C MESS' || $Postingtiset7 == 'CDI' || $Postingtiset7 =='CDO & A/CDO' || $Postingtiset7 == 'Quarter Master INSP' || $Postingtiset7 =='MSK Branch' || $Postingtiset7 =='KHC' || $Postingtiset7 == 'I/C Class-IV' || $Postingtiset7 =='Quarter Munshi & Asstt.' || $Postingtiset7 == 'Quarter Munshi & Asstt.' || $Postingtiset7 =='I/C Canteen & Grossary Shop' || $Postingtiset7 =='CHC'){
					$this->db->like('newosip.awbone9', $Postingtiset7);
				}if($Postingtiset7 =='GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY'){
					$this->db->like('newosip.awbone10', $Postingtiset7);
				}if($Postingtiset7 =='TRG. RESERVE AT BN.HQRS.'){
					$this->db->like('newosip.awbone11', $Postingtiset7);
				}if($Postingtiset7 =='OTHER DUTIES'){
					$this->db->like('newosip.awbone12', $Postingtiset7);
				}/*Close 7*/

				/*Posting 8*/
				if($Postingtiset8 =='RECRUIT'){
					$this->db->like('newosip.bmdone1', $Postingtiset8);
				}if($Postingtiset8 =='Earned Leave' || $Postingtiset8 =='Casual Leave' || $Postingtiset8 =='Paternity Leave' || $Postingtiset8 =='Medical Leave' || $Postingtiset8 =='Ex-India Leave' || $Postingtiset8 =='Others' ||   $Postingtiset8 =='Handicapped on Medical Rest' ){ 
					$this->db->like('newosip.bmdone2', $Postingtiset8);
				}if($Postingtiset8 =='ABSENT'){
					$this->db->like('newosip.bmdone3', $Postingtiset8);
				}if($Postingtiset8 =='UNDER SUSPENSION'){
					$this->db->like('newosip.bmdone4', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on Medical Rest'){
					$this->db->like('newosip.bmdone5', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on light duty'){
					$this->db->like('newosip.bmdone6', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on light duty'){
					$this->db->like('newosip.bmdone8', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on Medical Rest'){
					$this->db->like('newosip.bmdone7', $Postingtiset8);
				}if($Postingtiset8 =='OSD ETC'){
					$this->db->like('newosip.bmdone9', $Postingtiset8);
				}/*Close 8*/

				/*Posting 9*/
				if($Postingtiset9 =='PRINTING PRESS' || $Postingtiset9 == 'PHOTOGRAPHY CELL' || $Postingtiset9 =='ART GALLERY' || $Postingtiset9 =='WIRELESS SECTION'|| $Postingtiset9 =='DUPLEX' || $Postingtiset9 =='PAP HOSPITAL' || $Postingtiset9 =='GRIEVANCES REDRESSAL CELL' || $Postingtiset9 =='GOLF CLUB' || $Postingtiset9 =='GOLF RANGE' || $Postingtiset9 =='GAZETTED OFFICERS MESS' || $Postingtiset9 =='MINI GOS MESS' || $Postingtiset9 == 'B.M.STAFF' || $Postingtiset9 == 'SEWERAGE AND SANITATION' || $Postingtiset9 =='B.D. TEAM' || $Postingtiset9 == 'ELECTRICITY WING' || $Postingtiset9 == 'PIPE BAND' || $Postingtiset9 =='BRASS BAND' || $Postingtiset9 =='MOUNTED POLICE' || $Postingtiset9 =='RE-BROWNING WORKSHOP' || $Postingtiset9 == 'BASE WORKSHOP' || $Postingtiset9 == 'PAP GAS AGENCY'|| $Postingtiset9 =='TEAR GAS SQUAD' || $Postingtiset9 =='EMPTY CATRIDGE CELL' || $Postingtiset9 == 'CABLE NETWORK' || $Postingtiset9 =='GURUDWARA SAHIB PAP CAMPUS' || $Postingtiset9 =='COUNSELLING AND CARRIER GUIDANCE CENTRE' || $Postingtiset9 =='PAP BOOK SHOP' || $Postingtiset9 =='COMPUTER HARDWARE CELL' || $Postingtiset9 =='PAP WEBSITE' || $Postingtiset9 =='COMPUTER TRG. CENTRE' || $Postingtiset9 =='LADIES WELFARE CENTRE &  MULTIPURPOSE HALL'|| $Postingtiset9 =='PAPCOS' || $Postingtiset9 =='SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV  SCHOOL' || $Postingtiset9 =='B.P. UNIT' || $Postingtiset9 =='BEAUTIFICATION STAFF' || $Postingtiset9 =='R.P.STAFF' || $Postingtiset9 =='SPECIAL GUARD' || $Postingtiset9 =='CO-OPERATIVE STORE' || $Postingtiset9 =='CULTURAL TROUP' || $Postingtiset9 =='APNA DHABA' || $Postingtiset9 =='SHIV SHAKTI MANDIR' || $Postingtiset9 =='SONA BATH' || $Postingtiset9 == 'SWIMMING POOL 25 MTR'|| $Postingtiset9 =='BAKERY' || $Postingtiset9 =='TECHNICAL TEAM'|| $Postingtiset9 =='PAP GYM. NEW' || $Postingtiset9 =='PAP GYM. OLD' || $Postingtiset9 =='ACUPRESSURE' || $Postingtiset9 =='SPORTS CAFE,MILK BAR & JUICE BAR PAP' || $Postingtiset9 =='INDOOR STADIUM' || $Postingtiset9 =='PAP  SHOOTING RANGE' || $Postingtiset9 =='BUGGLER' || $Postingtiset9 =='T/A 7th Bn PAP for Driver Duty' || $Postingtiset9 =='U/7th PAP for out Rider duty on Motor Cycle' || $Postingtiset9 =='M.T WORKSHOP U/7th BN PAP' || $Postingtiset9 =='PAP House' || $Postingtiset9 =='Camp Cleaning U/7th BN.PAP' || $Postingtiset9 == 'A/A Punjab State U/7th BN.PAP'){
					$this->db->like('newosip.instone10', $Postingtiset9);
					}if($Postingtiset9 =='IRB Institutions'){
						$this->db->like('newosip.instone1', $Postingtiset9);
					}if($Postingtiset9 =='PAP Outer Bn Institutions'){
						$this->db->like('newosip.instone3', $Postingtiset8);
					}if($Postingtiset9 =='CDO Institutions'){
						$this->db->like('newosip.instone2', $Postingtiset9);
					}/*close 9*/

				
				if($ito !='' ){
					$this->db->where('newosi.bat_id', $ito);
				}
				if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
				}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
					$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
				}else{
					$this->db->where('bat_id!=',0);
				}
				$this->db->where('newosi.uid', 0);
				$this->db->order_by('newosi.ono','ASC');
				 /*if($start == '0'){
			 	$this->db->limit($limit);
				 }else{
				 	$this->db->limit($limit, $start);
				 }*/
				$query = $this->db->get();
				//echo $this->db->last_query();
				if ($query->num_rows() > 0) {
				return $query->num_rows();
				}


		}else{
				$this->db->select('man_id,name,cexrank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,bunitdistrict,bat_id');
				
				if($mobno !=''){
				 $this->db->like('phono1', $mobno);
				} if($name !=''){
				 $this->db->like('name', $name);
				}if($bloodgroup !=''){
				$this->db->where('bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){
						if($eor1 !=''){
							$this->db->where('newosi.cexrank', $eor1);
						}else{
							$this->db->where('newosi.presentrank', 'Executive Staff');
						}
					}
					elseif($RankRankre == 'Ministerial Staff'){
						if($eor2 !=''){
							$this->db->where('newosi.cminirank', $eor2);
						}else{
							$this->db->where('newosi.presentrank', 'Ministerial Staff');
						}
					}
						elseif($RankRankre == 'Medical Staff'){

							if($eor3 !=''){
							$this->db->where('newosi.cmedirank', $eor3);
							}else{
								$this->db->where('newosi.presentrank', 'Medical Staff');
							}
						}
						elseif($RankRankre == 'Class-IV (P)'){
							if($eor4 !=''){
							$this->db->where('newosi.ccprank', $eor4);
							}else{
								$this->db->where('newosi.presentrank', 'Class-IV (P)');
							}
						}
						elseif($RankRankre == 'Class-IV (C)'){
							if($eor5 !=''){
							$this->db->where('newosi.cccrank', $eor5);
							}else{
								$this->db->where('newosi.presentrank', 'Class-IV (C)');
							}
						}
				
				}if($postate !=''){
				 $this->db->where('state', $postate);
				}if($pcity !=''){
				 $this->db->where('district', $pcity);
				}if($stts !=''){
				 $this->db->where('eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('gender', $gender);
				}if($height !=''){
				 $this->db->where('feet', $height);
				}if($inch !=''){
				 $this->db->where('inch', $inch);
				}if($single !=''){
				 $this->db->where('maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('comlit', $clit);
				}
				if($ito !='' ){
					$this->db->where('newosi.bat_id', $ito);
				}
				if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
				}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
					$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
				}else{
					$this->db->where('bat_id!=',0);
				}
				$query = $this->db->get('newosi');
				//echo $this->db->last_query(); die();
				//if ($query->num_rows() > 0) {
				return $query->num_rows();
				//}
			}
	}

	 function ccget_usersall($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report) {
			if($report == 1){
				$this->db->select('*');	
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}		
			if($toi !=''){
			$this->db->where('item', $toi);
			}if($nameofitem !=''){
			$this->db->where('name', $nameofitem);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('191','166','155','114','109','161','122'));				
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('101','173','143','149','179','197'));
			}
				
				$query = $this->db->get('mskitemsqty');
			}else{
				$this->db->select('*');	
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}		
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('191','166','155','114','109','161','122'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('101','173','143','149','179','197'));
			}
			
				$query = $this->db->get('newmsk');
			}
			
			if ($query->num_rows() > 0) {
			return $query->num_rows();
			}
	 	
   }

    function get_usersall($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report,$limit,$start) {
			if($report == 1){
				$this->db->select('*');	
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}		
			if($toi !=''){
			$this->db->where('item', $toi);
			}if($nameofitem !=''){
			$this->db->where('name', $nameofitem);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('191','166','155','114','109','161','122'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('101','173','143','149','179','197'));
			}
				$this->db->limit($limit, $start);
				$query = $this->db->get('mskitemsqty');
			}else{
				$this->db->select('*');	
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}		
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('191','166','155','114','109','161','122'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('101','173','143','149','179','197'));
			}
			$this->db->limit($limit, $start);
				$query = $this->db->get('newmsk');
			}
			
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	
   }

    function get_cusersall($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report,$limit,$start,$id) {
			
			if($report == 1){
				$this->db->select('*');	
				
			if($toi !=''){
			$this->db->where('item', $toi);
			}if($nameofitem !=''){
			$this->db->where('name', $nameofitem);
			}
				
				$this->db->where('bat_id', $id);
			$this->db->limit($limit, $start);
				$query = $this->db->get('mskitemsqty');
			}else{
				$this->db->select('*');	
					
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}
			$this->db->where('bat_id', $id);
			$this->db->limit($limit, $start);
				$query = $this->db->get('newmsk');
			}
			
			//echo $this->db->last_query(); die();
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	
   }

   function mskqunty($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi){
			$this->db->select('*');
			$this->db->select('SUM(recqut) AS total');		
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($Receivedfrom !=''){
			 $this->db->where('recfrom', $Receivedfrom);
			}if($fname !=''){
			 $this->db->where('fund_name', $fname);
			}if($tpi !=''){
			 $this->db->where('recived_type', $tpi);
			}
			$this->db->where('conofitem!=', 'C');
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('newmsk');
			$info = $query->result();
			return $info;
	}

	function mskquntyalllist($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi){
			$this->db->select('*');
			$this->db->select('SUM(recqut) AS total');			
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}		
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($cti !=''){
			$this->db->where('catofitem', $cti);
			}if($Receivedfrom !=''){
			 $this->db->where('recfrom', $Receivedfrom);
			}if($fname !=''){
			 $this->db->where('fund_name', $fname);
			}if($tpi !=''){
			 $this->db->where('recived_type', $tpi);
			}
			$query = $this->db->get('newmsk');
			$info = $query->result();
			return $info;
	}

   	 function get_users_countall($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi) {
			$this->db->select('*');	
			if($ito !=''){
			$this->db->where('bat_id', $ito);
			}		
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($cti !=''){
			$this->db->where('catofitem', $cti);
			}if($Receivedfrom !=''){
			 $this->db->where('recfrom', $Receivedfrom);
			}if($fname !=''){
			 $this->db->where('fund_name', $fname);
			}if($tpi !=''){
			 $this->db->where('recived_type', $tpi);
			}
			$query = $this->db->get('newmsk');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	
	}

	 function get_usersvicall($cov,$vc,$dob1,$option,$engine,$Chasis,$moa,$rcnum,$vcon,$ito,$report,$limit,$start) {
			$this->db->select('*');
			if($cov !=''){
			$this->db->where('catofvechicle', $cov);
			}if($vc !=''){
			$this->db->where('vechicleclass', $vc);
			}if($dob1 !=''){
			$this->db->where('vechile_year', $dob1);
			}if($option !=''){
			$this->db->where('statusofvechile', $option);
			}if($engine !=''){
			 $this->db->where('engineno', $engine);
			}if($Chasis !=''){
			 $this->db->where('chasisno', $Chasis);
			}if($moa !=''){
			 $this->db->where('modeofac', $moa);
			}if($rcnum !=''){
			 $this->db->where('regnom', $rcnum);
			}if($vcon !=''){
			 $this->db->where('conditionofvechile', $vcon);
			}if($ito !=''){
			 $this->db->where('bat_id', $ito);
			}
			$this->db->where('bat_id !=',0);
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('194','169','158','116','111','169','124'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('208','176','146','152','182','200'));
			}
			$this->db->where('mt_status', 1);
			if($report == 1){
				$this->db->group_by('catofvechicle');
			}
			
			$this->db->limit($limit, $start);
			$query = $this->db->get('newmt');
			//echo $this->db->last_query(); die();
			if ($query->num_rows() > 0) {
			return $query->result();
			}		
	 	}

	 function get_users_countvicall($cov,$vc,$dob1,$option,$engine,$Chasis,$moa,$rcnum,$vcon,$ito,$report) {
	 		$this->db->select('*');
			if($cov !=''){
			$this->db->where('catofvechicle', $cov);
			}if($vc !=''){
			$this->db->where('vechicleclass', $vc);
			}if($dob1 !=''){
			$this->db->where('vechile_year', $dob1);
			}if($option !=''){
			$this->db->where('statusofvechile', $option);
			}if($engine !=''){
			 $this->db->where('engineno', $engine);
			}if($Chasis !=''){
			 $this->db->where('chasisno', $Chasis);
			}if($moa !=''){
			 $this->db->where('modeofac', $moa);
			}if($rcnum !=''){
			 $this->db->where('regnom', $rcnum);
			}if($vcon !=''){
			 $this->db->where('conditionofvechile', $vcon);
			}if($ito !=''){
			 $this->db->where('bat_id', $ito);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('194','169','158','116','111','169','124'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('208','176','146','152','182','200'));
			}
			$this->db->where('mt_status', 1);
			if($report == 1){
				$this->db->group_by('bat_id');
			}
			
			$query = $this->db->get('newmt');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}


		 function get_cusersvicall($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$report,$limit,$start,$id) {
			$this->db->select('*');
			 $this->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
					 if($cov !=''){
					$this->db->where('newmt.catofvechicle', $cov);
					}if($vc !=''){
					$this->db->where('newmt.vechicleclass', $vc);
					}if($dob1 !=''){
					$this->db->where('newmt.vechile_year', $dob1);
					}if($option !=''){
					$this->db->where('newmt.statusofvechile', $option);
					}if($vcon !=''){
					$this->db->where('newmt.vehiclecon', $vcon);
					}if($vcn !=''){
					$this->db->where('newmt.acnonac', $vcn);
					}if($bp !=''){
					$this->db->where('newmt.bp', $bp);
					}if($tpii !=''){
					$this->db->where('issue_vehicle.pod', $tpii);
					}
				
			if($report == 1){
				$this->db->group_by('catofvechicle');
			}$this->db->where('newmt.bat_id', $id);
			$this->db->group_by('newmt.mt_id');
			$this->db->order_by('newmt.mt_id','DESC');
			$this->db->limit($limit, $start);
			$query = $this->db->get('newmt');
			//echo $this->db->last_query(); die();
			if ($query->num_rows() > 0) {
			return $query->result();
			}		
	 	}

	 function get_cusers_countvicall($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$report,$id) {
	 		$this->db->select('*');
			$this->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
					 if($cov !=''){
					$this->db->where('newmt.catofvechicle', $cov);
					}if($vc !=''){
					$this->db->where('newmt.vechicleclass', $vc);
					}if($dob1 !=''){
					$this->db->where('newmt.vechile_year', $dob1);
					}if($option !=''){
					$this->db->where('newmt.statusofvechile', $option);
					}if($vcon !=''){
					$this->db->where('newmt.vehiclecon', $vcon);
					}if($vcn !=''){
					$this->db->where('newmt.acnonac', $vcn);
					}if($bp !=''){
					$this->db->where('newmt.bp', $bp);
					}if($tpii !=''){
					$this->db->where('issue_vehicle.pod', $tpii);
					}
				
			if($report == 1){
				$this->db->group_by('newmt.catofvechicle');
			}
			$this->db->where('newmt.bat_id', $id);
			if($report == 1){
				$this->db->group_by('newmt.bat_id');
			}
			
			$query = $this->db->get('newmt');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}

	/*Issue Arm*/
	function issue_arm($atype,$wbodyno,$abore,$mags,$acc,$amqunt,$onum,$odate,$issueto,$typeofduty,$placeofduty,$ntod,$ito,$itoOther,$typeofwep,$bodyno,$magp,$ammubore,$ammupqty,$pissuedate,$pissueto,$pissuetoname,$nameofrange,$district,$rcvno,$rdate,$issueother,$issuedep,$oito,$issuetoi)
	{
            $messages = [];
            if($atype == 'Service')
            {
                $n = explode('@#@', $abore);
                $this->db->select('*');
                if($n[1] !=''){
                $this->db->where('arm',$n[1]);	
                }
                if($n[0]!=''){
                $this->db->where('bore',$n[0]);
                }
                $this->db->where('bat_id',$this->session->userdata('userid'));
                $query = $this->db->get('newwepon_dataqty');
                //echo $this->db->last_query();
                $info = $query->row();
                //var_dump($info);
                if($info==null){
                    //add weapon with qty 0 issued 0
                    $add_ = ['arm'=>$n[1],'bore'=>$n[0],'qty'=>0,'issued'=>0,'bat_id'=>$this->session->userdata('userid'),'status'=>1];
                    $this->db->insert('newwepon_dataqty',$add_);
                    $info =(object)$add_;
                    $info->id = $this->db->insert_id();
                    //var_dump($info);
                    //die;
                }
                if($amqunt >  $info->qty){
                    //echo 'qunatity proble';
                    $messages[] = ['ammunition_quantity'=>'Ammunition Quantity is larger Maximum you can enter is - '.$info->qty];
                    return ['status'=>false,'messages'=>$messages];
                }else{

                    $nq =  $info->qty - $amqunt;
                    $niq = $info->issued + $amqunt;

                    $adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
                    if($n[1] !=''){
                        $this->db->where('arm',$n[1]);	
                    }
                    $this->db->where('bore',$n[0]);
                    $this->db->where('bat_id',$this->session->userdata('userid'));
                    $task = $this->db->update('newwepon_dataqty',$adds);
                }

                $addvalue = array('atype' => $atype,'wbodyno' => $wbodyno,'abore' => $abore,'mags' => $mags,'acc' => $acc,'amqunt' => $amqunt, 'onum' => $onum,'odate' => $odate, 'issueto' => $issueto.$issuedep, 'typeofduty' => $typeofduty, 'placeofduty' => $placeofduty, 'ibat_id' => $ito, 'duty' => $itoOther,'district' => $district,'drcvno' => $rcvno,'drdate' => $rdate,'issueother' => $issueother, 'bat_id' => $this->session->userdata('userid'));
                $task2 = $this->db->insert('issue_arm',$addvalue);
                $this->db->where('old_weapon_id',$wbodyno);
                $up = array('staofserv' => 'Issued');
                $this->db->where('bat_id',$this->session->userdata('userid'));
                $task = $this->db->update('old_weapon',$up);
                //echo $this->db->last_query();
                                //die;
                if($task && $task2){ 
                    //echo 'success';
                    $messages[] = ['sucess_message'=>'UPdated successfully'];
                         return ['status'=>true,'messages'=>$messages];
                }else{
                    $messages[] = ['sucess_message'=>'Updation Failed.'];
                         return ['status'=>false,'messages'=>$messages];
                }
            }elseif($atype == 'Practice'){
                    //$messages[] = ['ammunition_quantity'=>'OPtion disabled'];
                    //return ['status'=>false,'messages'=>$messages];
                $this->db->trans_start();
                $n = explode('@#@', $ammubore);
                $this->db->select('*');
                $from_arm = $n[1];
                if($n[1] !=''){
                    $this->db->group_start();
                        $this->db->where('arm',$n[1]);	
                        $this->db->or_where('arm',$typeofwep);
                        $this->db->group_end();
                }
                $this->db->where('bore',$n[0]);
                $this->db->where('bat_id',$this->session->userdata('userid'));
                $this->db->order_by('field(arm,'."'".$typeofwep."','".$n[1]."')",'');
                $query = $this->db->get('newwepon_dataqtyp');
//                echo $this->db->last_query();
                $fetched_records = $query->result();
                //var_dump($fetched_records);
                    
                $info = $query->row();
               // var_dump($info);
                $quantity = 0;
                $issued = 0;
                foreach($fetched_records as $k_=>$val_){
                    $quantity += $val_->qty;
                    $issued += $val_->issued;
                }
                echo 'Total qunatity = '.$quantity;
                echo '<br>Total issued = '.$issued;
                
                //die('i');
                if($fetched_records==null || count($fetched_records)==0){
                    $add_ = ['arm'=>$n[1],'bore'=>$n[0],'qty'=>0,'issued'=>0,'bat_id'=>$this->session->userdata('userid'),'status'=>1];
                    $this->db->insert('newwepon_dataqtyp',$add_);
                    $info =(object)$add_;
                    $info->id = $this->db->insert_id();
                }
                //var_dump($info);
                //die;
                var_dump($ammupqty);
                //var_dump($info);
                //die;
                /*if($ammupqty > $info->qty || ($info->qty - $ammupqty) <= ($info->issued!=null)?$info->issued:0 ){
                   $messages[] = ['ammunition_quantity'=>'Ammunition Quantity is larger. Maximum you can enter is - '.($info->qty-$info->issued)];
                    return ['status'=>false,'messages'=>$messages];
                }*/
                $new_quantity = $ammupqty;
                if(($ammupqty > $quantity) || (($quantity - $ammupqty) > ($issued!=null)?$issued:0) ){
                    
                   $messages[] = ['ammunition_quantity'=>'Ammunition Quantity is larger. Maximum you can enter is - '.($quantity-$issued).' '.$quantity.' '.$issued];
                   //die;
                    return ['status'=>false,'messages'=>$messages];
                }else{
                    //if($n[1]!=$typeofwep && $n[0]!=)
                    $from_arm;
                    $typeofwep;
                    //decrease the quantity 
                    //if wapons are not same then decrease the quantity of from weapon and then add it to issued and quantity of to weapon to which you want to transfer
                    if($from_arm!=$typeofwep ||($oito!=null && $oito!=$this->session->userdata('userid'))){  //even if battalion are not same then decrease the quantity
                        //echo 'Weapons not same';
                        
                        
                        foreach($fetched_records as $k1=>$temp_record){
                            var_dumP($temp_record);
                            echo'<Br>NQ . '.$new_quantity.'<BR>';
                            if($temp_record->qty<$new_quantity && $temp_record->qty>$temp_record->issued){
                                $new_quantity = $new_quantity - ($temp_record->qty - $temp_record->issued) ;
                                echo $new_quantity.' '.$temp_record->qty.' '.$temp_record->issued;
                                $this->db->set('qty',0);
                                $this->db->where('nwep_id',$temp_record->nwep_id);
                                echo'<Br>'.$new_quantity;
                                $this->db->update('newwepon_dataqtyp');
                                echo $this->db->last_query();
                            }else{
                                if($temp_record->qty>$temp_record->issued){
                                    
                                    $temp_qty = ($temp_record->qty-$temp_record->issued);
                                    
                                    if($temp_qty>0){
                                        if($temp_qty>=$new_quantity){
                                            $temp_qty = $new_quantity;
                                            $new_quantity = 0;
                                        }else{
                                            $new_quantity = $new_quantity - $temp_qty;
                                        }
                                        $this->db->set('qty','qty-'.$temp_qty,false);
                                        $this->db->where('nwep_id',$temp_record->nwep_id);
                                        $this->db->update('newwepon_dataqtyp');
                                        echo'<Br>';
                                        echo $this->db->last_query();
                                    }
                                    echo '<br>'.$temp_qty.'<BR>';
                                }
                                
                            }
                            echo '<Br>NQ . '.$new_quantity.'<br>';
                        }
                        
                        //die;
                        /*
                        die;
                        $update = ['qty'=>($info->qty-$ammupqty)];
                        $this->db->where('arm',$n[1]);	
                        $this->db->where('bore',$n[0]);
                        $this->db->where('bat_id',$this->session->userdata('userid'));
                        $task = $this->db->update('newwepon_dataqtyp',$update);
                         
                         */
                    }
                    //die;
                    if($oito !='' && false){
                        $nq =  $info->qty - $ammupqty;
                        $adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
                        $this->db->where('arm',$typeofwep);	
                        $this->db->where('bore',$n[0]);
                        $this->db->where('bat_id',$this->session->userdata('userid'));
                        $task = $this->db->update('newwepon_dataqtyp',$adds);
                        $this->db->select('*');
                        if($n[1] !=''){
                            $this->db->where('arm',$n[1]);	
                        }
                        if($n[0]!=''){
                            $this->db->where('bore',$n[0]);
                        }
                        $this->db->where('bat_id',$oito);
                        $query = $this->db->get('newwepon_dataqtyp');
                        $infoii = $query->row();

                        $addsi = array('qty' => $infoii->qty + $ammupqty,'bat_id' => $oito);

                        if($n[1] !=''){
                                $this->db->where('arm',$n[1]);	
                        }
                        $this->db->where('bore',$n[0]);

                        $this->db->where('bat_id',$oito);
                        //echo 'update 001';
                        $messages[] = ['udpate 001'];
                                //$task =$this->db->update('newwepon_dataqtyp',$addsi);
                    }else{
                        
                        //first of all look for existence
                        $this->db->where('arm',$typeofwep);	

                        $this->db->where('bore',$n[0]);
                        if($oito!=null && $oito!=$this->session->userdata('userid')){
                            $this->db->where('bat_id',$oito);
                        }else{
                            $this->db->where('bat_id',$this->session->userdata('userid'));
                        }
                        $query = $this->db->get('newwepon_dataqtyp');
                        
                        $info = $query->result();
                        //if battaions are different then decrease the quantity
                        if(count($info)>0){
                            //exist
                            //update
                            //$nq =  $info->qty - $ammupqty;
                            if(false){ // battalion are different
                                
                            }
                            
                            $niq = $info[0]->issued + $ammupqty;
                            $adds = array('issued' => $niq);//, 'bat_id' => $this->session->userdata('userid'));
                            //iff weapon is same then quantit will not increase
                            //if going to another battalion then quantity will increase
                            if($from_arm!=$typeofwep || ($oito !=null && $oito!=$this->session->userdata('userid'))){
                                $adds['qty'] = $info[0]->qty+$ammupqty;
                            }
                            //echo 'update 002';
                            $messages[] = ['udpate 002'];
                            if($typeofwep !=''){
                                //$this->db->set
                                $this->db->where('arm',$typeofwep);	
                                $this->db->where('bore',$n[0]);
                                if($oito!=null && $oito!=$this->session->userdata('userid')){
                                    
                                    $this->db->where('bat_id',$oito);
                                }else{
                                    $this->db->where('bat_id',$this->session->userdata('userid'));
                                }
                                $task = $this->db->update('newwepon_dataqtyp',$adds);
                                echo $this->db->last_query();
                            }
                        }else{
                            //not exist
                            //insert
                            $add_ = ['arm'=>$typeofwep,'bore'=>$n[0],'qty'=>$ammupqty,'issued'=>$ammupqty,'status'=>1];
                            if($oito!=null){
                                $add_['bat_id'] = $oito;
                            }else{
                                $add_['bat_id'] = $this->session->userdata('userid');
                            }
                            
                            $task = $this->db->insert('newwepon_dataqtyp',$add_);
                        }
                        /*$adds = array('issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
                        if($typeofwep !=''){
                            $this->db->where('arm',$typeofwep);	
                        }
                        $this->db->where('bore',$n[0]);
                        $this->db->where('bat_id',$this->session->userdata('userid'));
                        echo 'update 003';
                        $task = $this->db->update('newwepon_dataqtyp',$adds);*/
                    }
                }
                if($bodyno !=''){
                    $b = implode(',', $bodyno);
                    $addvalue = array('atype' =>  $atype, 'typeofwep' => $typeofwep, 'bodyno' => $b, 'magp' => $magp, 'ammubore' => explode('@#@',$ammubore)[0].'@#@'.$typeofwep, 'ammupqty' => $ammupqty, 'pissuedate' => $pissuedate, 'pissueto' => $pissueto, 'pissuetoname' => $pissuetoname.$issuetoi, 'nameofrange' => $nameofrange,'bat_id' => $this->session->userdata('userid'));
                    $task2 = $this->db->insert('issue_arm',$addvalue);
                    foreach ($bodyno as $value) {
                            $this->db->where('bono',$value);
                            $up = array('staofserv' => 'Issued');
                            $this->db->where('bat_id',$this->session->userdata('userid'));
                            $task = $this->db->update('old_weapon',$up);
                    }
                }else{
                    $addvalue = array('atype' =>  $atype, 'typeofwep' => $typeofwep, 'magp' => $magp, 'ammubore' => $ammubore, 'ammupqty' => $ammupqty, 'pissuedate' => $pissuedate, 'pissueto' => $pissueto, 'pissuetoname' => $pissuetoname.$issuetoi.$oito, 'nameofrange' => $nameofrange,'bat_id' => $this->session->userdata('userid'));
                    if($pissueto=='Other Battalion Unit'){
                        $addvalue['pissuetoname'] = $oito;
                    }
                    $task2 = $this->db->insert('issue_arm',$addvalue);
                }
                $task3= true;
			if($new_quantity!=0 && $from_arm!=$typeofwep){
                            $messages[] = ['Not possible to deduct the quantity to Zero.'.$new_quantity];
                            $task3 = false;
                            //die;
                        }	
			//die("hi[')");
                            //die("i'");
               if($task && $task2 && $task3){ 
                    //echo 'success';
                   $this->db->trans_complete();
                    $messages[] = ['sucess_message'=>'Updated Successfully'];
                         return ['status'=>true,'messages'=>$messages];
                }else{
                    $this->db->trans_rollback();
                    $messages[] = ['sucess_message'=>'Updation Failed.'];
                         return ['status'=>false,'messages'=>$messages];
                }
            }				 
	}

	/*Issue Arm*/
	function issue_muntion($atype,$wbodyno,$abore,$mags,$acc,$amqunt,$onum,$odate,$issueto,$typeofduty,$placeofduty,$ntod,$ito,$itoOther,$typeofwep,$bodyno,$magp,$ammubore,$ammupqty,$pissuedate,$pissueto,$pissuetoname,$nameofrange,$district,$rcvno,$rdate,$issueother,$issuedep)
	{
			if($atype == 'Arm')
			{
			
				$this->db->select('*');
				$this->db->where('arm',$abore);	
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('munition_quty');
				$info = $query->row();
				if($amqunt >  $info->qty){
				return 1;
				}else{
				$nq =  $info->qty - $amqunt;
				$niq = $info->issued + $amqunt;

				$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
				$this->db->where('arm',$abore);	
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('munition_quty',$adds);
				}
                                var_dump($ntod);
				$addvalue = array('atype' => $atype,'wbodyno' => $wbodyno,'abore' => $abore,'mags' => $mags,'acc' => $acc,'amqunt' => $amqunt, 'onum' => $onum,'odate' => $odate, 'issueto' => $issueto.$issuedep, 'typeofduty' => $typeofduty.'@#@'.$ntod, 'placeofduty' => $placeofduty, 'ibat_id' => $ito, 'duty' => $itoOther,'district' => $district,'drcvno' => $rcvno,'drdate' => $rdate,'issueother' => $issueother, 'bat_id' => $this->session->userdata('userid'));
				$task2 = $this->db->insert('issue_munition',$addvalue);
				$this->db->where('addmunition_id',$wbodyno);
				$up = array('staofserv' => 'Issued');
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('addmunition',$up);

				if($task && $task2){ 
						return 1;
					}else{
						return 0;
					}
			}elseif($atype == 'Ammunition'){
						$this->db->select('*');
							$this->db->where('arm',$ammubore);	
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('munition_quty');
							$info = $query->row();
							if($ammupqty > $info->qty){
								return 0;
							}else{
							$nq =  $info->qty - $ammupqty;
							$niq = $info->issued + $ammupqty;
						$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
							$this->db->where('arm',$ammubore);	
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('munition_quty',$adds);
				}

			$addvalue = array('atype' =>  $atype, 'typeofwep' => $typeofwep, 'bodyno' => $bodyno, 'magp' => $magp, 'ammubore' => $ammubore, 'ammupqty' => $ammupqty, 'pissuedate' => $pissuedate, 'pissueto' => $pissueto, 'pissuetoname' => $pissuetoname, 'nameofrange' => $nameofrange,'bat_id' => $this->session->userdata('userid'));
			$task2 = $this->db->insert('issue_munition',$addvalue);

			/*foreach ($bodyno as $value) {
				$this->db->where('bono',$value);
				$up = array('staofserv' => 'Issued');
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('old_weapon',$up);
			}
			*/

			if($task && $task2){
					return 1;
				}else{
					return 0;
				}
			}				 
	}


			/*Issue Arm*/
	function nodellist($atype,$dtype,$wecartp,$rcno,$rcdate,$bname,$lcarts,$locarts,$mcartp,$ccartp,$idseg )
	{
		/*$this->db->select('*');
			$this->db->where('issue_arm_id',$id);	
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('issue_arm');
			$fetch = $query->row();

			$bs = '';
			if($fetch->atype == 'Service'){
				$bs .=$fetch->abore;
			}elseif($fetch->atype == 'Practice'){
				$bs .=$fetch->ammubore;
			}

		if($dtype == 'BN'){
$addvalue = array('atype' => $fetch->atype ,'btype' => $bs, 'bnpap' => $dtype, 'bnempty' => $ec,  'brcno' =>  $rcno, 'brcdate' => $rcdate, 'rfdc' => $rdc, 'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('nodelist',$addvalue);
		}elseif($dtype == 'CA'){
$addvalue = array('atype' => $fetch->atype ,'btype' => $bs,'ca' => $dtype, 'caempty' => $ec,  'carcno' =>  $rcno, 'carcdate' => $rcdate, 'rfdc' => $rdc, 'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('nodelist',$addvalue);
		}*/
/**/
			$addvalue = array('atype' => $atype, 'dpto' => $dtype, 'dist' => $this->session->userdata('userid') ,'bore' => $bname,'eammu' => $wecartp, 'rcno' => $rcno,  'rdate' =>  $rcdate, 'bat_id' => $this->session->userdata('userid'),'lic' => $lcarts,'loc' => $locarts, 'mic' => $mcartp,'conc' => $ccartp,'deposit_ammu_id' => $idseg);
			$task = $this->db->insert('disdepositammu',$addvalue);

			$addvaluei = array('da_status' => 0);
			$this->db->where('deposit_ammu_id',$idseg);
			$task = $this->db->update('deposit_ammu',$addvaluei);
                        //echo $this->db->last_query();
                        //die;

		
		

			
		
		if($task){
				return 1;
			}else{
				return 0;
			}		 
	}


				/*Issue Arm*/
	function weaponca($wbodyno,$rcno,$rcdate){
			$a = explode('@', $wbodyno);
			$addvalue = array('wname' => $a[0], 'wbutt' => $a[2], 'wbono' => $a[1],'rcno' => $rcno,'rcdate' => $rcdate, 'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('cawep',$addvalue);

			$this->db->where('bono',$a[1]);
			$task = $this->db->delete('old_weapon');
		
		if($task){
				return 1;
			}else{
				return 0;
			}		 
	}

	/*Issue Arm*/
	function depositissue_arm($id,$dtype,$atype,$lcarts,$mcarts,$ecarts,$locarts,$mcartp,$ecratp,$locartp,$amqunt,$wlocarts,$wmcartp,$wecratp,$wlocartp,$wamqunt,$abc,$cw,$ssw,$suw,$abcp,$wlocartsp,$wmcartpp,$wecratpp,$wlocartpp,$wamquntp,$llcartp){
		$this->db->select('*');
		$this->db->where('issue_arm_id',$id);	
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$query = $this->db->get('issue_arm');
		$fetch = $query->row();

			if($atype == 'Service'){
				$n = explode(',', $fetch->abore);
				$this->db->select('*');

				if($n[1] !=''){
				$this->db->where('arm',$n[1]);	
				}

				/*if($n[0]!=''){
				$this->db->where('bore',$n[0]);
				}*/

				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('newwepon_dataqty');
				$info = $query->row();

				$t = $lcarts + $mcarts + $mcartp + $ecarts + $ecratp + $locarts + $locartp;

				if($t >  $info->issued){
					return 0;
				}else{
						$nq =  $info->qty + $t;
						$niq = $info->issued - $t;
						$adds = array('qty' => $nq, 'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						if($n[1] !=''){
							$this->db->where('arm',$n[1]);	
						}
							//$this->db->where('bore',$n[0]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('newwepon_dataqty',$adds);
				}
					
				$addvalue = array('dtype' => $dtype, 'issue_arm_id' => $id, 'ammutype' => $atype,'lcat' => $lcarts,'mcat' => $mcarts .$mcartp,'ecat' => $ecarts.$ecratp,'locat' => $locarts.$locartp, 'weapon' => $n[1], 'bore' => $n[0], 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));
				
				$task2 = $this->db->insert('deposit_ammu',$addvalue);

				if($task && $task2)
				{ 
					return 1;
				}else{
					return 0;
				}
			}elseif($atype == 'Practice'){
				$n = explode(',', $fetch->ammubore);

				$this->db->select('*');

				if($n[1] !=''){
				$this->db->where('arm',$n[1]);	
				}

				$this->db->where('bore',$n[0]);
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('newwepon_dataqtyp');
				$info = $query->row();
				$t = $lcarts + $mcarts + $mcartp + $ecarts + $ecratp + $locarts + $locartp;

				if($t > $info->issued){
					return 0;
				}else{
					$j = $t + $llcartp;
					//$nq =  $info->qty + $amqunt;
					$niq = $info->issued - $j;
				
					$nq =  $info->qty + $llcartp;
					$adds = array('qty' => $nq, 'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						$this->db->where('arm',$n[1]);	
						$this->db->where('bore',$n[0]);
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('newwepon_dataqtyp',$adds);
				}

				
					$addvalue = array('dtype' => $dtype, 'issue_arm_id' => $id, 'ammutype' => $atype,'lcat' => $lcarts,'mcat' => $mcarts .$mcartp,'ecat' => $ecarts.$ecratp,'locat' => $locarts.$locartp,'weapon' => $n[1], 'bore' => $n[0], 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));

					$task2 = $this->db->insert('deposit_ammu',$addvalue);



				if($fetch->bodyno != 'Nill'){
					$br = explode(',', $fetch->bodyno);
						foreach ($br as $value) {
						$this->db->where('old_weapon_id',$value);
						$up = array('staofserv' => 'In kot');
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('old_weapon',$up);
						}

					$this->db->where('issue_arm_id',$fetch->issue_arm_id);
					$ups = array('istatus' => 0);
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$tas = $this->db->update('issue_arm',$ups);
				}

				

				if($task && $task2){
				return 1;
				}else{
				return 0;
				}
			}	
			elseif($dtype == 'Weapon'){	
				$addvalue = array('dtype' => $dtype,'weapon' => $n[1], 'bore' => $n[0], 'issue_arm_id' => $id, 'arm_id' => $atype, 'ibat_id' => $this->session->userdata('userid'));
			
				$task2 = $this->db->insert('deposit_ammu',$addvalue);

				$this->db->where('issue_arm_id',$fetch->issue_arm_id);
				$ups = array('istatus' => 0);
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$tas = $this->db->update('issue_arm',$ups);
	
				$this->db->where('old_weapon_id',$fetch->wbodyno);
				$up = array('staofserv' => 'In kot', 'conofwap' =>$cw,'staofserv' => $ssw.''.$suw );
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('old_weapon',$up);

				if(isset($abc)){
					$n = explode(',', $fetch->abore);
					$this->db->select('*');

					if($n[1] !=''){
						$this->db->where('arm',$n[1]);	
					}
					if($n[0]!=''){
						$this->db->where('bore',$n[0]);
					}
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$query = $this->db->get('newwepon_dataqty');
					$info = $query->row();
					if($wamqunt >  $info->issued){
						return 1;
					}else{
						$nq =  $info->qty + $wamqunt;
						$niq = $info->issued - $wamqunt;

						$adds = array('qty' => $nq, 'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						if($n[1] !=''){
							$this->db->where('arm',$n[1]);	
						}
							$this->db->where('bore',$n[0]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('newwepon_dataqty',$adds);
					}

					$t = $wlocarts + $wmcartp + $wecratp + $wlocartp;
						$addvalue = array('dtype' => $dtype,'weapon' => $n[1], 'bore' => $n[0], 'issue_arm_id' => $id, 'ammutype' => 'Service','lcat' => $wlocarts,'mcat' => $wmcartp ,'ecat' => $wecratp,'locat' => $wlocartp,'weapon' => $n[1], 'bore' => $n[0], 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));
						$task2 = $this->db->insert('deposit_ammu',$addvalue);
				}

				if(isset($abcp)){
					$n = explode(',', $fetch->ammubore);
					$this->db->select('*');
					if($n[1] !=''){
						$this->db->where('arm',$n[1]);	
					}
							$this->db->where('bore',$n[0]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('newwepon_dataqtyp');
							$info = $query->row();

					if($wamquntp > $info->qty){
						return 0;
					}else{
							//$nq =  $info->qty + $wamquntp;
							$niq = $info->issued - $wamquntp;
							$adds = array( 'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
							if($n[1] !=''){
								$this->db->where('arm',$n[1]);	
							}
								$this->db->where('bore',$n[0]);
								$this->db->where('bat_id',$this->session->userdata('userid'));
								$task = $this->db->update('newwepon_dataqtyp',$adds);
						}

						$t = $wlocartsp + $wmcartpp + $wecratpp + $wamquntp;
							$addvalue = array('dtype' => $dtype,'weapon' => $n[1], 'bore' => $n[0], 'issue_arm_id' => $id, 'ammutype' => 'Practice','lcat' => $wlocartsp,'mcat' => $wmcartpp,'ecat' => $wecratpp,'locat' => $wlocartpp, 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));
				
							$task2 = $this->db->insert('deposit_ammu',$addvalue);
					}
			
					if($task && $task2){
							return 1;
						}else{
							return 0;
						}
				}			 
	}



	/*Issue Arm*/
	function issue_extra($id,$mags,$amqunt,$odate)
	{
			$this->db->select('*');
			$this->db->where('issue_arm_id',$id);	
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('issue_arm');
			$fetch = $query->row();
			if($fetch->atype == 'Service')
			{
				$n = explode(',', $fetch->abore);
				$this->db->select('*');
				if($n[1] !=''){
				$this->db->where('arm',$n[1]);	
				}
				if($n[0]!=''){
				$this->db->where('bore',$n[0]);
				}
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('newwepon_dataqty');
				$info = $query->row();
				if($amqunt >  $info->qty){
				return 0;
				}else{
				$nq =  $info->qty - $amqunt;
				$niq = $info->issued + $amqunt;

				$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
				if($n[1] !=''){
				$this->db->where('arm',$n[1]);	
				}
				$this->db->where('bore',$n[0]);

				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('newwepon_dataqty',$adds);
				}

				$addvalue = array('mags' => $fetch->mags+$mags,'amqunt' => $fetch->amqunt + $amqunt,'odate' => $odate);
				$this->db->where('issue_arm_id',$id);
				$task2 = $this->db->update('issue_arm',$addvalue);
				if($task && $task2){ 
						return 1;
					}else{
						return 0;
					}
			}elseif($fetch->atype == 'Practice'){
						$n = explode(',', $fetch->ammubore);
						$this->db->select('*');
						if($n[1] !=''){
							$this->db->where('arm',$n[1]);	
						}
							$this->db->where('bore',$n[0]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('newwepon_dataqtyp');
							$info = $query->row();
							if($amqunt > $info->qty){
								return 0;
							}else{
							$nq =  $info->qty - $amqunt;
							$niq = $info->issued + $amqunt;
						$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						if($n[1] !=''){
							$this->db->where('arm',$n[1]);	
						}
							$this->db->where('bore',$n[0]);
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('newwepon_dataqtyp',$adds);
				}

			$addvalue = array('magp' => $fetch->magp + $mags,'ammupqty' => $fetch->ammupqty + $amqunt, 'pissuedate' => $odate);
			$this->db->where('issue_arm_id',$id);
			$task2 = $this->db->update('issue_arm',$addvalue);
			if($task && $task2){
					return 1;
				}else{
					return 0;
				}
			}				 
	}

		/*Issue Arm*/
	function issue_parm($now,$acc,$ab,$hn)
	{
		
						$n = explode(',', $now);
						$this->db->select('*');
						if($n[2] !=''){
							$this->db->where('arm',$n[1]);	
						}
							$this->db->where('bore',$n[0]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('newwepon_dataqtyp');
							$info = $query->row();
							if($ab > $info->qty){
								return 0;
							}else{
							$nq =  $info->qty - $ab;
							$niq = $info->issued + $ab;
						$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						if($n[2] !=''){
							$this->db->where('arm',$n[1]);	
						}
							$this->db->where('bore',$n[0]);
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('newwepon_dataqtyp',$adds);
				}

			$addvalue = array('ammuwep' => $n[1], 'ammubore' => $n[0],  'rcno' =>  $acc, 'qty' => $ab, 'osi_id' => $hn,'bat_id' => $this->session->userdata('userid'));
			$task2 = $this->db->insert('pammu',$addvalue);
			if($task || $task2){
					return 1;
				}else{
					return 0;
				}
					 
	}

	function issue_parmedit($id,$now,$acc,$ab,$qty,$hn)
	{
		
						$n = explode(',', $now);
						$this->db->select('*');
						if($n[1] !=''){
							$this->db->where('arm',$n[1]);	
						}
							$this->db->where('bore',$n[0]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('newwepon_dataqtyp');
							$info = $query->row();
							if($qty > $info->qty){
								return 0;
							}else{
							$nq =  $info->qty - $qty;
							$niq = $info->issued + $qty;
						$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						if($n[1] !=''){
							$this->db->where('arm',$n[1]);	
						}
							$this->db->where('bore',$n[0]);
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('newwepon_dataqtyp',$adds);
				}

			$addvalue = array('ammuwep' => $n[1], 'ammubore' => $n[0],  'rcno' =>  $acc, 'qty' => $ab+$qty, 'osi_id' => $hn);

			$this->db->where('pammu_id',$id);
			$task2 = $this->db->update('pammu',$addvalue);
			if($task || $task2){
					return 1;
				}else{
					return 0;
				}
					 
	}


	function issue_parmdeposit($id,$ql,$qes,$ls,$idate)
	{
		$addvalue = array('qlive' => $ql, 'qeshell' => $qes,  'lshell' =>  $ls, 'rdate' => $idate);
			$this->db->where('pammu_id',$id);
			$task2 = $this->db->update('pammu',$addvalue);
			if($task || $task2){
					return 1;
				}else{
					return 0;
				}
					 
	}


		/*Issue Arm*/
	function editissue_arm($id,$mq,$idate,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr,$ammu,$now,$ab,$aqw,$qw1,$aqw1)
	{
			if($ammu == 'Service')
			{
				$n = explode(',', $now);
				$this->db->select('*');
				if($n[2] !=''){
				$this->db->where('arm',$n[2]);	
				}
				if($n[1]!=''){
				$this->db->where('bore',$n[1]);
				}
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('newwepon_dataqty');
				$info = $query->row();
				if($aqw >  $info->qty){
				return 1;
				}else{
				$nq =  $info->qty - $aqw;
				$niq = $info->issued + $aqw;

				$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
				if($n[2] !=''){
				$this->db->where('arm',$n[2]);	
				}
				$this->db->where('bore',$n[1]);

				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('newwepon_dataqty',$adds);
				}
				$totalqunty = $ab + $aqw;
				$addvalue = array('ammuid' => $now, 'issue_date' => $idate, 'megqty' => $mq, 'issue_to' => $it, 'h_id' => $hn.$nop.$ito, 'other' => $itoOther, 'td' => $ntod, 'ammu' => $ammu, 'ammuqty' => $totalqunty,'bat_id' => $this->session->userdata('userid'));
				$this->db->where('issue_arm_id',$id);
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('issue_arm',$addvalue);
				if($task){
						return 1;
					}else{
						return 0;
					}	
			}elseif($ammu == 'Practice'){
						$n = explode(',', $now);
						$this->db->select('*');
						if($n[2] !=''){
							$this->db->where('arm',$n[2]);	
						}
							$this->db->where('bore',$n[1]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('newwepon_dataqtyp');
							$info = $query->row();
							if($aqw1 > $info->qty){
								return 0;
							}else{
							$nq =  $info->qty - $aqw1;
							$niq = $info->issued + $aqw1;
						$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						if($n[2] !=''){
							$this->db->where('arm',$n[2]);	
						}
							$this->db->where('bore',$n[1]);
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('newwepon_dataqtyp',$adds);
					}

					$totalquntys = $qw1 + $aqw1;

					$addvalue = array('ammuid' => $now, 'issue_date' => $idate, 'megqty' => $mq, 'issue_to' => $it, 'h_id' => $hn.$nop.$ito, 'other' => $itoOther, 'td' => $ntod, 'ammu' => $ammu, 'ammuqtyp' => $totalquntys,'bat_id' => $this->session->userdata('userid'));
					$this->db->where('issue_arm_id',$id);
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$task = $this->db->update('issue_arm',$addvalue);
					if($task){
							return 1;
						}else{
							return 0;
						}	
				}	 
	}


	/*Deposit Arm*/
	function deposit_arm($id,$mq,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr,$ammu,$now,$ab,$qw1){
		$this->db->select('*');
		$this->db->where('issue_arm_id',$id);
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$query = $this->db->get('issue_arm');
		$winfo = $query->row();
			if($ammu == 'Weapon')
			{
				$addvalue = array('staofserv' => 'In kot','holdname' => '', 'protec' => '', 'ito' => '','other' => '');
				 $this->db->where('old_weapon_id',$winfo->weapon_master_id);
				 $this->db->where('bat_id', $this->session->userdata('userid'));
				$task = $this->db->update('old_weapon',$addvalue);

				$addvalue = array('issue_status' => 0);
				 $this->db->where('issue_arm_id',$id);
				 $this->db->where('bat_id', $this->session->userdata('userid'));
				$task = $this->db->update('issue_arm',$addvalue);
					if($task){
							return 1;
						}else{
							return 0;
						}	
		}
			if($ammu == 'Service')
			{
				$n = explode(',', $now);
				$this->db->select('*');
				if($n[2] !=''){
				$this->db->where('arm',$n[2]);	
				}
				if($n[1]!=''){
				$this->db->where('bore',$n[1]);
				}
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('newwepon_dataqty');
				$info = $query->row();
				if($ab >  $info->issued){
				return 0;
				}else{
				$nq =  $info->qty + $ab;
				$niq = $info->issued - $ab;

				$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
				if($n[2] !=''){
				$this->db->where('arm',$n[2]);	
				}
				$this->db->where('bore',$n[1]);

				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('newwepon_dataqty',$adds);
				}
				$totalqunty = $winfo->ammuqty - $ab;
				$addvalue = array('ammuqty' => $totalqunty,'bat_id' => $this->session->userdata('userid'));
			$this->db->where('issue_arm_id',$id);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$task = $this->db->update('issue_arm',$addvalue);
			if($task){
					return 1;
				}else{
					return 0;
				}	
		}
			elseif($ammu == 'Practice'){
						$n = explode(',', $now);
						$this->db->select('*');
						if($n[2] !=''){
							$this->db->where('arm',$n[2]);	
						}
							$this->db->where('bore',$n[1]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('newwepon_dataqtyp');
							$info = $query->row();
							if($aqw1 > $info->qty){
								return 0;
							}else{
							$nq =  $info->qty + $qw1;
							$niq = $info->issued - $qw1;
						$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
						if($n[2] !=''){
							$this->db->where('arm',$n[2]);	
						}
							$this->db->where('bore',$n[1]);
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('newwepon_dataqtyp',$adds);
			}

			$totalqunty = $winfo->ammuqtyp - $qw1;
				$addvalue = array('ammuqtyp' => $totalqunty,'bat_id' => $this->session->userdata('userid'));
			$this->db->where('issue_arm_id',$id);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$task = $this->db->update('issue_arm',$addvalue);
			if($task){
					return 1;
				}else{
					return 0;
				}	
		}	
	}/*Close*/

	/*Update Arm*/
function update_arm($bdn,$hn,$cw,$ssw,$suw,$vdate,$ca,$remark,$Orderno){
		$addvalue = array('uwep_con' => $cw, 'usosw' => $ssw,'usousw' => $suw, 'ucondate' => $vdate, 'uconauth' => $ca, 'uremak' => $remark, 'uorderno' => $Orderno,'ubat_id' => $this->session->userdata('userid'));
		 $this->db->where('bono',$bdn);
		$task = $this->db->update('old_weapon',$addvalue);

		$addvalue2 = array('weapon_id' => $bdn,'holder_id' => $hn, 'wep_con' => $cw, 'sosw' => $ssw, 'sousw' => $suw, 'condate' => $vdate,'conauth' => $ca, 'uremak' => $remark, 'uorderno' => $Orderno, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert(T_WEAP_CON,$addvalue2);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}/*Close*/

	/*Update Arm*/
function update_armlist($tow,$wbodyno,$wbuttno,$tows,$mq){
		$addvalue = array('bono' => $wbodyno,'buno' => $wbuttno, 'recmod' => $tows, 'magrec' => $mq);
		 $this->db->where('old_weapon_id',$tow);
		$task = $this->db->update('old_weapon',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}/*Close*/

	/*Inspection Arm*/
function ins_arm($bdn,$hn,$cw,$name,$idate,$remarks){
		$addvalue = array('insdate' => $cw);
		 $this->db->where('old_ammunation_id',$bdn);
		$task = $this->db->update('newamus',$addvalue);

		$addvalue2 = array('weapon_id' => $bdn, 'itype' => $cw,'name' => $name, 'indate' => $idate, 'remarks' => $remarks,'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('armins',$addvalue2);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
}/*Close*/


		/*Update Arm*/
function depositdis($dist,$bore,$eammu,$rcno,$rdate){
		$addvalue = array('dist' => $dist,'bore' => $bore, 'eammu' => $eammu, 'rcno' => $rcno,'rdate' => $rdate,'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('disdepositammu',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}/*Close*/


function ins_ammu($atype,$bdn,$qty,$nio,$idate,$uqty,$remark){
		if($atype == 'Service'){
			$addvalue = array('insdate' => $idate);
		 	$this->db->where('old_ammunation_id',$bdn);
			$task = $this->db->update('newamus',$addvalue);
		}elseif($atype == 'Practice'){
			$addvalue = array('insdate' => $idate);
		 	$this->db->where('old_ammunation_id',$bdn);
			$task = $this->db->update('newamu',$addvalue);
		}
		

		$addvalue = array('ammu_id' => $bdn, 'ammu_type' => $atype, 'qnty' => $uqty, 'name' => $nio,'indate' => $idate,'remarks' => $remark);
		$task = $this->db->insert('ammuins',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}


function ins_ammuarm($bdn,$cw,$name,$idate,$cwi,$ssw,$suw,$remark,$idateo){
			$addvalue = array('itype' => $cw, 'insdate' => $idate, 'idateo' => $idateo);
		 	$this->db->where('old_weapon_id',$bdn);
			$task = $this->db->update('old_weapon',$addvalue);

		$addvalue = array('ammu_id' => $bdn, 'ammu_type' => 'w','wep_name' => $cwi,'sowep' => $ssw.$suw,  'name' => $name,'indate' => $idate,'idateo' => $idateo, 'remarks' => $remark);
		$task = $this->db->insert('ammuins',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_arm($tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate){	
		$V = explode(',', $tow);
		$addvalue = array('tow' => $V[0], 'bono' => $wbodyno, 'buno' =>  $wbuttno, 'recform' => $vdate, 'recmod' => $tows , 'recvoc' => $rcvno, 'recdate' => $rdate,'magrec' => $mq, 'conofwap' => 'Serviceable', 'staofserv' => 'In Kot','bat_id' => $this->session->userdata('userid'));

		$task = $this->db->insert('old_weapon',$addvalue);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function edit_arm($id,$tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate,$cw,$ssw,$suw,$doi,$issue_date){	
		if($cw=='Serviceable'){
			$status = $ssw;
		}else{
			$status = $suw;
		}
		$addvalue = array('tow' => $tow, 'bono' => $wbodyno, 'buno' =>  $wbuttno, 'recform' => $vdate, 'recmod' => $tows , 'recvoc' => $rcvno, 'recdate' => $rdate,'magrec' => $mq,'conofwap' => $cw, 'staofserv' => $status,'doi' => $doi, 'bat_id' => $this->session->userdata('userid'));//,'issue_date'=>$issue_date);
		$this->db->where('old_weapon_id',$id);
		$task = $this->db->update('old_weapon',$addvalue);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_munition($tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate){	
		$addvalue = array('tow' => $tow, 'bono' => $wbodyno, 'buno' =>  $wbuttno, 'recform' => $vdate, 'recmod' => $tows , 'recvoc' => $rcvno, 'recdate' => $rdate,'magrec' => $mq, 'conofwap' => 'Serviceable', 'staofserv' => 'In Kot','bat_id' => $this->session->userdata('userid'));

		$task = $this->db->insert('addmunition',$addvalue);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

		/*Inspection Arm*/
function passreset($bdn,$hn){
		$addvalue = array('user_password' => sha1($hn));
		 $this->db->where('users_id',$bdn);
		$task = $this->db->update('users',$addvalue);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}/*Close*/

		/*issue arm start*/
	function issuearm(){
	 $this->db->select('*');
	 $this->db->from(T_ISSUE_ARM);
	 $this->db->join('users', 'users.users_id = issue_arm.issue_to');
	 $this->db->where('issue_status',1);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/



	function viewarm(){
	 $this->db->select('*');
	 $this->db->from(T_ISSUE_ARM);
	 $this->db->join('weapon_master', 'weapon_master.weapon_id = issue_arm.weapon_master_id');
	 $this->db->where('issue_arm.issue_to',$this->session->userdata('userid'));
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	 function bissuearm(){
		 $this->db->select('*');
		 $this->db->from(T_ISSUE_ARM);
		 $this->db->join('weapon_master', 'weapon_master.weapon_id = issue_arm.weapon_master_id');
		 $this->db->where('issue_arm.issue_to',$this->session->userdata('userid'));
		 //$this->db->where_in('issue_arm.weapon_master_id',$in);
		 $query = $this->db->get();
		 echo $this->db->last_query();
		 $info = $query->result();
		 return $info;
	}

	function issue_ammuser($now,$year,$idate,$acc,$acc00,$odate,$ab,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr){
			$n = explode(',', $now);
			$this->db->select('*');
			if($n[2] !=''){
				$this->db->where('arm',$n[2]);	
			}
			if($n[1]!=''){
				$this->db->where('bore',$n[1]);
			}
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('newwepon_dataqty');
				$info = $query->row();
				if($ab >  $info->qty){
					return 1;
				}else{
				$nq =  $info->qty - $ab;
				$niq = $info->issued + $ab;

			$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
			if($n[2] !=''){
				$this->db->where('arm',$n[2]);	
			}
				$this->db->where('bore',$n[1]);
		
			
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$task = $this->db->update('newwepon_dataqty',$adds);

			$values = array('ammubore' => $n[1], 'ammuwep' => $n[2],'yearman' => $year, 'recinkot' => $ab, 'issue_to' => $it, 'dty' => $ntod, 'hn' => $hn.$nop, 'ito' => $ito, 'oby' => $acc, 'ono' => $acc00, 'odate' => $odate ,  'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('issue_annuser',$values);	
			}
			if($task){
				return 1;
			}else{
				return 0;
			}	 
	}

	function issue_ammuserpr($now,$year,$idate,$acc,$acc00,$odate,$ab,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr){
				$n = explode(',', $now);
				$this->db->select('*');
				if($n[2] !=''){
					$this->db->where('arm',$n[2]);	
				}
					$this->db->where('bore',$n[1]);
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$query = $this->db->get('newwepon_dataqtyp');
					$info = $query->row();
					if($ab > $info->qty){
						return 0;
					}else{

					$nq =  $info->qty - $ab;

					$niq = $info->issued + $ab;

				$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));
				if($n[2] !=''){
					$this->db->where('arm',$n[2]);	
				}
					$this->db->where('bore',$n[1]);
				
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('newwepon_dataqtyp',$adds);

				$values = array('ammubore' => $n[1], 'ammuwep' => $n[2],'yearman' => $year, 'recinkot' => $ab, 'issue_to' => $it, 'dty' => $ntod, 'hn' => $hn.$nop, 'ito' => $ito, 'oby' => $acc, 'ono' => $acc00, 'odate' => $odate ,  'bat_id' => $this->session->userdata('userid'));
				$task = $this->db->insert('issue_amuprc',$values);
				}	
				if($task){
					return 1;
				}else{
					return 0;
				}	 
	}

	function issue_mmu($bodyno,$year,$idate,$acc,$odate,$ab,$hn,$ito,$nito){
		$values = array('annu_name' => $bodyno,'lyear' => $year, 'quantity' => $ab,'idate' => $idate, 'issue_to' => $hn.','.$on.','.$ito.','.$nito,'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('issue_mmu',$values);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	

	function mark_arm($bdn){
		$addvalue = array('bat_status' => $bdn);
		$this->db->where('issue_to', $this->session->userdata('userid'));
		$task = $this->db->update(T_ISSUE_ARM,$addvalue);	
		if($task){
			return 1;
		}	 
	}

	function mark_osi($id){
		$addvalue = array('uid' => 0);
		foreach ($id as $value) {
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$this->db->where('man_id',$value);
			$task = $this->db->update('newosi',$addvalue);
		}
		if($task){
			return 1;
		}	 
	}

	function mark_mt($id){

		$addvalue = array('uid' => 0);
		foreach ($id as $value) {
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$this->db->where('mt_id',$value);
		$task = $this->db->update('newmt',$addvalue);
		}
			
		if($task){
			return 1;
		}	 
	}

	function ammu_list($id){
	 $this->db->select('*');
	 $this->db->from('newamu');
	 $this->db->where('type',$id);
	 $this->db->where('bat_id', $this->session->userdata('userid'));
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function ammu_lists($id){
	 $this->db->select('*');
	 $this->db->from('newamus');
	 $this->db->where('type',$id);
	 $this->db->where('bat_id', $this->session->userdata('userid'));
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function weaponlist(){
	 $this->db->select('*');
	 $this->db->from('newwepon_data');
	 //$this->db->group_by('arm');
	 $query = $this->db->get();
         //echo $this->db->last_query();
	 $info = $query->result();
	 return $info;
	}

	function newamulist(){
	 $this->db->select('*');
	 $this->db->from('newwepon_data');
	 $this->db->group_by('bore');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function msklist($id){
	 $this->db->select('*');
	 $this->db->from('newmsk');
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('typeofitem');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function msklisttwo($name){
	 $this->db->select('*');
	 $this->db->from('newmsk');
	 $this->db->where('typeofitem', $name);
	 //$this->db->where('bat_id', $id);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function armlist($id){
	 $this->db->select('*');
	 $this->db->from('old_weapon');
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('tow');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function osilist($id){
	 $this->db->select('*');
	 $this->db->from('newosi');
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('presentrank');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function qtrlist($id){
	 $this->db->select('*');
	 $this->db->from('newquart');
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('typeofqtr');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function mtolist($id,$a,$b){
	 $this->db->select('*');
	 $this->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
	 $this->db->from('newmt');
	 $this->db->where('issue_vehicle.bat_id', $id);
	 $this->db->where('issue_vehicle.cmonthi',$a);
	 $this->db->where('issue_vehicle.cyear1',$b);
	 $this->db->group_by('newmt.catofvechicle');
	 $query = $this->db->get();
//         echo $this->db->last_query();
	 $info = $query->result();
	 return $info;
	}
        function mtolist2($id,$date){
	 //$this->db->select('*');
         $this->db->select('newmt.*,issue_vehicle.reg_no, issue_vehicle.date_of_duty');
	 $this->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
	 $this->db->from('newmt');
	 $this->db->where('issue_vehicle.bat_id', $id);
	 $this->db->where('newmt.bat_id', $id);
	 $this->db->where('issue_vehicle.date_of_duty <=',$date);
	 //$this->db->where('issue_vehicle.cyear1',$b);
         $this->db->limit('18446744073709551615',0);
         $this->db->order_by('issue_vehicle.reg_no, issue_vehicle.date_of_duty','desc');   
                        $query1 = $this->db->get_compiled_select();
                        $this->db->select('*');
                        $this->db->from("({$query1}) as x");
	 		$this->db->group_by('x.catofvechicle');
			
	 //$this->db->group_by('newmt.catofvechicle');
	 $query = $this->db->get();
//         echo $this->db->last_query();
	 $info = $query->result();
	 return $info;
	}

	function mtolistigp(){
	 $this->db->select('*');
	 $this->db->from('newmt');
	 $this->db->group_by('catofvechicle');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function mountlist(){
	 $this->db->select('*');
	 $this->db->from('mount_san');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function ammulist($id,$name){
	 $this->db->select('*');
	 $this->db->from('newamu');
	 $this->db->where('bat_id', $id);
	 $this->db->where('cat', $name);
	 $this->db->group_by('ammubore');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function weplist($id){
	 $this->db->select('*');
	 $this->db->from('old_weapon');
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('tow');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function horselist(){
	 $this->db->select('*');
	 $this->db->from('mount_report');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function mskgroup($id){
	 $this->db->select('*');
	 $this->db->from('newmsk');
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('typeofitem');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function mskgroupitems($id){
	 $this->db->select('*');
	 $this->db->from('mskitems');
	 $this->db->group_by('name');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function mtogroupitems($id){
	 $this->db->select('*');
	 $this->db->from('newmt');
	 //$this->db->where('bat_id', $id);
	 $this->db->group_by('catofvechicle');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function ammugroupitems($name,$id){
	 $this->db->select('*');
	 $this->db->from('newamu');
	 $this->db->where('cat', $name);
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('ammubore');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function armgroupitems($id){
	 $this->db->select('*');
	 $this->db->from('old_weapon');
	 $this->db->where('bat_id', $id);
	 $this->db->group_by('tow');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function add_ammunitionser($bodyno,$now,$year,$qw,$rfrom,$rdate,$rcvno,$vdate){
		$n = explode(',', $now);
		$this->db->select('*');
		if($n[2] !=''){
			$this->db->where('arm',$n[2]);	
		}
		if($n[1]!=''){
			$this->db->where('bore',$n[1]);
		}
		 $this->db->where('bat_id',$this->session->userdata('userid'));

			$query = $this->db->get('newwepon_dataqty');
			$info = $query->row();
			if($info == ''){
				$adds = array( 'arm' => $n[2], 'bore' => $n[1], 'qty' => $qw, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newwepon_dataqty',$adds);
			
		}else{



			$nq =  $info->qty + $qw;

		$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
		if($n[2] !=''){
			$this->db->where('arm',$n[2]);	
		}
		if($n[1]!=''){
			$this->db->where('bore',$n[1]);
		}
	
		
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$task = $this->db->update('newwepon_dataqty',$adds);
		}

		$addvalue = array('type' => $bodyno,'cat' => 'Service', 'ammubore' => $n[1], 'ammuwep' => $n[2], 'rfrom' => $rfrom, 'recvo' => $rcvno, 'recdate' => $rdate, 'yearman' => $year, 'recinkot' => $qw, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newamus',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_ammunitionprc($bodyno,$now,$year,$qw,$rfrom,$rdate,$rcvno,$vdate){
		$n = explode(',', $now);
		$this->db->select('*');
		if($n[2] !=''){
			$this->db->where('arm',$n[2]);	
		}
		if($n[1]!=''){
			$this->db->where('bore',$n[1]);
		}
		$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('newwepon_dataqtyp');
			$info = $query->row();
			if($info == ''){
				$adds = array( 'arm' => $n[2], 'bore' => $n[1], 'qty' => $qw, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newwepon_dataqtyp',$adds);
			
		}else{

			$nq =  $info->qty + $qw;

		$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
		if($n[2] !=''){
			$this->db->where('arm',$n[2]);	
		}
		if($n[1]!=''){
			$this->db->where('bore',$n[1]);
		}
	
		
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$task = $this->db->update('newwepon_dataqtyp',$adds);
		}

		$addvalue = array('type' => $bodyno,'cat' => 'Practice', 'ammubore' => $n[1], 'ammuwep' => $n[2], 'rfrom' => $rfrom, 'recvo' => $rcvno, 'recdate' => $rdate, 'yearman' => $year, 'recinkot' => $qw, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newamu',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_mmunitions($bodyno,$now,$year,$qw,$rfrom,$rdate,$rcvno,$vdate){
		$this->db->select('*');
		$this->db->where('arm', $now);	
		 $this->db->where('bat_id',$this->session->userdata('userid'));

			$query = $this->db->get('munition_quty');
			$info = $query->row();
			if($info == ''){
				$adds = array( 'arm' => $now, 'qty' => $qw, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('munition_quty',$adds);
			
		}else{

			$nq =  $info->qty + $qw;

		$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
			$this->db->where('arm', $now);	
		
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$task = $this->db->update('munition_quty',$adds);
		}

		$addvalue = array('type' => $bodyno,'cat' => 'Service', 'ammubore' => $now,  'rfrom' => $rfrom, 'recvo' => $rcvno, 'recdate' => $rdate, 'yearman' => $year, 'recinkot' => $qw, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newamusmu',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function deposit_ammu($bodyno,$ammu,$ql,$qes,$ls,$hn,$on,$idate){
		$addvalue1 = array('dammu_quanty' => $ql, 'dammu_e_qunty' => $qes, 'dammu_l_qunty' => $ls, 'dhno' => $hn,'dp_no' => $on, 'drdate' => $idate);
			$this->db->where('old_ammunation_id',$ammu);
		$task = $this->db->update('newamu',$addvalue1);	


		$addvalue = array('ammu_type' => $bodyno, 'ammu_name' => $ammu, 'ammu_quanty' => $ql, 'ammu_e_qunty' => $qes, 'ammu_l_qunty' => $ls, 'hno' => $hn,'p_no' => $on, 'rdate' => $idate,  'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('battallion_dip_ammu',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function amm_con($bodyno,$ammu,$cw,$ssw,$suw,$vdate,$ca){
		$addvalue = array('ammu_type' => $bodyno, 'ammu_name' => $ammu,'ammu_anty' => $cw, 'sosw' => $ssw, 'sousw' => $suw, 'condate' => $vdate,'conauth' => $ca, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('ammu_condition',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_ammunition($now,$ab){
		$addvalue = array('weapon_name' => $now, 'ammunition_bore' => $ab);
		$task = $this->db->insert(T_ARM_MASTER,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_recive($noa,$wbdn,$amd,$aa,$acd,$mode){
		$addvalue = array('arms_master_id' => $noa, 'weapon_master_id' => $wbdn, 'am_ac' => $amd, 'ammu_details' => $aa, 'acces_details' => $acd, 'mode' => $mode);
		$task = $this->db->insert(T_REC_AMU,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_vechicle($cov,$chno,$vc,$dob1,$engno,$Chasis,$moa,$rn,$vcn,$sr,$ftype,$rcfrm,$rno,$rm,$rv,$rcdt,$rcd,$vcon,$lsd,$lid,$tyremake1,$tyreSerial1,$TyreCondition1,$tyremake2,$tyreSerial2,$TyreCondition2,$tyremake3,$tyreSerial3,$TyreCondition3,$tyremake4,$tyreSerial4,$TyreCondition4,$tyremake5,$tyreSerial5,$TyreCondition5,$tyremake6,$tyreSerial6,$TyreCondition6,$tyremake7,$tyreSerial7,$TyreCondition7,$sswi,$bp){
		$addvalue = array('catofvechicle' => $cov, 'vehicletype' => $chno, 'vechicleclass' => $vc, 'vechile_year' => $dob1, 'regnom' => $rn, 'acnonac' => $vcn, 'chasisno' => $Chasis, 'engineno' => $engno, 'modeofac' => $moa, 'recfrom' => $rcfrm.$rno, 'recattached' => $rm ,'recvoucher' => $rv, 
			'recattachdate' => $rcdt, 'ftype' => $ftype, 'speedormeter' => $sr,'vehiclecon' => $vcon ,'lastservicedate' => $lsd,'lastinspectiondate' => $lid, 'tyremake1' => $tyremake1, 'tyreSerial1' => $tyreSerial1, 'TyreCondition1' => $TyreCondition1, 'tyremake2' => $tyremake2, 'tyreSerial2' => $tyreSerial2, 'TyreCondition2' => $TyreCondition2, 'tyremake3' => $tyremake3, 'tyreSerial3' => $tyreSerial3, 'TyreCondition3' => $TyreCondition3, 'tyremake4' => $tyremake4, 'tyreSerial4' => $tyreSerial4, 'TyreCondition4' => $TyreCondition4, 'tyremake5' => $tyremake5, 'tyreSerial5' => $tyreSerial5, 'TyreCondition5' => $TyreCondition5, 'tyremake6' => $tyremake6, 'tyreSerial6' => $tyreSerial6, 'TyreCondition6' => $TyreCondition6, 'tyremake7' => $tyremake7, 'tyreSerial7' => $tyreSerial7, 'TyreCondition7' => $TyreCondition7,'statusofvechile' => 'On Road','bp' => $bp, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newmt',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}


		function add_pol($rnum,$cmonth,$dorepair,$rdetails,$runit,$nofirm,$nofcon,$pamo,$ramu,$ttno,$tdate){
			/*if($cmonth == 12){
				$d = explode('/', $dorepair);
			$addvalue = array('rnum' => $rnum,'cmonth' => '12', 'cyear' => date('Y'), 'dorepair' => $dorepair, 'rdetails' => $rdetails, 'runit' => $runit, 'nofirm' => $nofirm, 'nofcon' => $nofcon, 'pamo' => $pamo, 'ramu' => $ramu, 'ttno' => $ttno, 'tdate' => $tdate, 'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('mtrepair',$addvalue);
			}else{*/
				$d = explode('/', $dorepair);
			$addvalue = array('rnum' => $rnum,'cmonth' => $d[1], 'cyear' => $d[2], 'dorepair' => $dorepair, 'rdetails' => $rdetails, 'runit' => $runit, 'nofirm' => $nofirm, 'nofcon' => $nofcon, 'pamo' => $pamo, 'ramu' => $ramu, 'ttno' => $ttno, 'tdate' => $tdate, 'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('mtrepair',$addvalue);
			/*}*/
				
		if($task){
			return 1;
		}else{
			return 0;
		}	 
			
	}


	function add_repair($tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate){	
		$V = explode(',', $tow);
		$addvalue = array('rid' => $V[0], 'cmonth' => $wbodyno, 'rdetails' =>  $wbuttno, 'reamu' => $vdate, 'runit' => $tows , 'nof' => $rcvno, 'cno' => $rdate,'ttno' => $mq, 'dor' => 'Serviceable','bat_id' => $this->session->userdata('userid'));

		$task = $this->db->insert('old_weapon',$addvalue);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function issue_vechicle($moa,$rnum,$Dateofduty,$tpii,$tpi,$Otherstate,$hn,$nop,$oname,$ito,$instone4,$lsd,$batslist,$district,$drcvno,$drdate,$spm,$orderno,$lid,$abc){
		if(isset($abc)){
			$this->db->select('*');
			$this->db->where('reg_no', $rnum);
			$this->db->order_by('issue_vehicle_id','DESC');
			$query = $this->db->get('issue_vehicle');
			$val = $query->row();
			if($val->reg_no !=''){
				$this->db->select('*');
			$this->db->where('mt_id', $val->reg_no);
			$querysi = $this->db->get('newmt');
			$valii = $querysi->row();

			$d = explode('/', $Dateofduty);
		$addvalue = array('issue_mode' => $val->issue_mode,'cmonthi' => $d[1], 'cyear1' => $d[2], 'reg_no' => $rnum, 'place_of_duty' => $val->place_of_duty, 'other_state' => $val->other_state, 'officer' => $val->officer, 'battalion' => $val->battalion,'duty_details' => $val->duty_details, 'pdriver_name' =>  $val->pdriver_name, 'type_of_duty' => $val->type_of_duty, 'speed_reading' => $val->speed_reading, 'order_no' => $val->order_no, 'order_date' => $val->order_date, 'date_of_duty' => $Dateofduty, 'pod' => $val->pod,'noduty' => $val->noduty, 'bat_id' => $this->session->userdata('userid'), 'oname' => $val->oname,'instone4' => $val->instone4, 'vstatus' => $valii->statusofvechile );
				$task = $this->db->insert('issue_vehicle',$addvalue);
			}else{
				return 0;
			}
			
		}else{
			$this->db->select('*');
			$this->db->where('reg_no',$rnum);
			$this->db->order_by('issue_vehicle_id','DESC');
			$query = $this->db->get('issue_vehicle');
			$val = $query->row();

			$this->db->select('*');
			$this->db->where('mt_id', $rnum);
			$querysi = $this->db->get('newmt');
			$valii = $querysi->row();

			$d = explode('/', $Dateofduty);
		$addvalue = array('issue_mode' => $moa,'cmonthi' => $d[1], 'cyear1' => $d[2], 'reg_no' => $rnum, 'place_of_duty' => $tpi, 'other_state' => $Otherstate.$district, 'officer' => $nop, 'battalion' => $ito.$batslist,'duty_details' => $lsd, 'pdriver_name' => $hn, 'type_of_duty' => $tud, 'speed_reading' => $spm, 'order_no' => $orderno.$drcvno, 'order_date' => $drdate.$lid, 'date_of_duty' => $Dateofduty, 'pod' => $tpii,'noduty' => $tpi, 'bat_id' => $this->session->userdata('userid'), 'oname' => $oname,'instone4' => $instone4, 'vstatus' => $valii->statusofvechile );
				$task = $this->db->insert('issue_vehicle',$addvalue);
		}
		

		/*if($ito !='' || $ito !=0){
			$up = array('modeofac' => $moa,'iplace_of_duty' => $tpi, 'iother_state' => $Otherstate, 'iofficer' => $nop, 'ibattalion' => $ito, 'iduty_details' => $lsd, 'ipdriver_name' => $hn, 'itype_of_duty' => $tud, 'ispeed_reading' => $spm, 'iorder_no' => $orderno, 'iorder_date' => $lid, 'idate_of_duty' => $Dateofduty, 'ivehicle_condition' => $VehicleCondition,'statusofvechile' => 'Issued','bat_id' => $ito);
		$this->db->where('mt_id',$rnum);
		$task = $this->db->update('newmt',$up);	
		}*/
			/*$up = array('issue_mode' => $moa,'date_of_duty' => $Dateofduty, 'pduty' => $tpii,'noduty' => $tpi, 'dutydetails' => $lsd, 'hname' => $hn, 'officer' => $nop, 'battalion' => $ito, 'states' => $Otherstate,'speedmetor' => $spm, 'iodate' => $lid, 'iono' => $orderno, 'idateofduty' => $Dateofduty, 'iveccon' => $VehicleCondition, 'type_of_duty' => $tud, 'oname' => $oname,'district' => $district, 'drcvno' => $drcvno, 'drdate' => $drdate,'pod' => $tpii);
				$this->db->where('mt_id',$rnum);
		$task = $this->db->update('newmt',$up);*/
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function deposit_vechicle($rnum,$rec,$idate,$sr,$vc,$ssw,$suw,$ca,$vdate,$remark){
		$addvalue = array('reg_no' => $rnum, 'speed_reading' => $sr, 'vehicle_con' => $vc, 'ptwo' => $ssw.$suw, 'order_no' => $ca, 'condom_date' => $vdate, 'remark' => $remark,  'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('deposit_vehicle',$addvalue);

		$up = array('speedmetor' => $moa,'pduty' => $tpi, 'dutydetails' => $lsd, 'hname' => $hn, 'officer' => $nop, 'battalion' => $ito, 'states' => $Otherstate,'speedmetor' => $spm, 'iodate' => $lid, 'iono' => $orderno, 'idateofduty' => $Dateofduty, 'iveccon' => $VehicleCondition);
		$this->db->where('mt_id',$rnum);
		$task = $this->db->update('newmt',$up);
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function update_vichel($cov,$rnum,$vc,$ssw,$suw,$orderno,$conditiondate,$aoa,$adate,$ito,$rno,$sr,$ftype,$ordersno,$ordersdate,$dot,$tud,$remark,$vcon,$engno,$Chasis,$regtypetp,$avg,$mkm,$mpol,$polex,$repair,$tkm,$tpol,$trepair,$id,$tyremake1,$tyreSerial1,$TyreCondition1,$tyremake2,$tyreSerial2,$TyreCondition2,$tyremake3,$tyreSerial3,$TyreCondition3,$tyremake4,$tyreSerial4,$TyreCondition4,$tyremake5,$tyreSerial5,$TyreCondition5,$tyremake6,$tyreSerial6,$TyreCondition6,$tyremake7,$tyreSerial7,$TyreCondition7,$rv,$rcdt,$district,$rcvno,$rdate,$dob1,$mkmo,$mpolo,$repairo,$covi,$sswi,$acnonc,$bp){
		$ncov = '';
		if($cov !=''){
			$ncov .=$cov;
		}else{
			$ncov .= $covi;
		}

		$nmko = $mkmo + $mkm;
		$nmpolo = $mpol + $mpolo;
		$nrepairo = $repair + $repairo;
		$addvalue = array('r_no' => $rnum, 'vc' => $vc,'on_road' => $ssw, 'off_road' => $suw,'orderno' => $orderno,'conditiondate' => $conditiondate,'aoa' => $aoa , 'adate' => $adate, 'ito' => $ito,'rno' => $rno,'sr' => $sr, 'ftype' => $ftype,'ordersno' => $ordersno,'ordersdate' => $ordersdate, 'dot' => $dot,'tud' =>  $tud, 'remark' => $remark,'vcon' => $vcon, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('update_vechile',$addvalue);
		
			$up = array('catofvechicle' => $ncov,'regnom' => $rnum, 'engineno' => $engno, 'chasisno' => $Chasis, 'speedmetor' => $sr,'statusofvechile' => $vc, 'statusofonroadvichile' => $ssw, 'statusofoffroadvichile' => $suw,'condemdate' => $conditiondate, 'type_of_duty' => $tud,'vehiclecon' => $vcon,'modeofac' => $regtypetp,'avg' => $avg, 'mkm' => $nmko, 'mpol' => $nmpolo, 'polexp' => $polex,'repair' => $nrepairo,'tmkm' => $tkm + $mkm, 'tmpol' => $tpol + $mpol, 'trpair' => $trepair + $repair, 'tyremake1' => $tyremake1, 'tyreSerial1' => $tyreSerial1, 'TyreCondition1' => $TyreCondition1, 'tyremake2' => $tyremake2, 'tyreSerial2' => $tyreSerial2, 'TyreCondition2' => $TyreCondition2, 'tyremake3' => $tyremake3, 'tyreSerial3' => $tyreSerial3, 'TyreCondition3' => $TyreCondition3, 'tyremake4' => $tyremake4, 'tyreSerial4' => $tyreSerial4, 'TyreCondition4' => $TyreCondition4, 'tyremake5' => $tyremake5, 'tyreSerial5' => $tyreSerial5, 'TyreCondition5' => $TyreCondition5, 'tyremake6' => $tyremake6, 'tyreSerial6' => $tyreSerial6, 'TyreCondition6' => $TyreCondition6, 'tyremake7' => $tyremake7, 'tyreSerial7' => $tyreSerial7, 'TyreCondition7' => $TyreCondition7,'recvoucher' => $rv, 'recattachdate' => $rcdt,'district' => $district, 'drcvno' => $rcvno, 'drdate' => $rdate,'vechile_year' => $dob1,'sswi' => $sswi,'acnonac' => $acnonc,'bp' => $bp);
		$this->db->where('mt_id',$id);
		$task = $this->db->update('newmt',$up);
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function update_pol($id,$rnum,$cmonth,$cyear,$mkmo,$mkm,$tkm,$mpolo,$mpol,$tpol,$polex,$repairo,$repair,$trepair){
		$nmko = $mkmo + $mkm;
		$nmpolo = $mpol + $mpolo;
		$nrepairo = $repair + $repairo;
		
			/*$up = array('mkm' => $nmko, 'mpol' => $nmpolo, 'polexp' => $polex,'repair' => $nrepairo,'tmkm' => $tkm + $mkm, 'tmpol' => $tpol + $mpol, 'trpair' => $trepair + $repair);
		$this->db->where('mt_id',$id);
		$task = $this->db->update('newmt',$up);*/

		$up = array('rnum' => $id,'cmonth' => $cmonth, 'cyear' => $cyear, 'mkm' => $mkmo, 'mpol' => $mpolo, 'polex' => $polex,'repair' => $nrepairo,'tkm' =>  $nmko, 'tpol' => $nmpolo, 'trepair' => $trepair + $repair,'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('pol_return',$up);
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}



	function vicheldein($rnum,$ito,$rno,$district,$sr,$ordersno,$ordersdate,$dot,$rem){
		$addvalue = array('r_no' => $rnum, 'ito' => $ito,'rno' => $rno.$district,'sr' => $sr,'ordersno' => $ordersno,'ordersdate' => $ordersdate, 'dot' => $dot, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('update_vechile',$addvalue);


		if($rem == 'Yes'){
			$this->db->where('reg_no',$rnum);
			$this->db->where('cmonthi',date('m'));
			$this->db->where('cyear1',date('Y'));
			$this->db->delete('issue_vehicle');

			$up = array('bat_id' => $ito, 'uid' => 1, 'pid' => $this->session->userdata('userid'));
			$this->db->where('mt_id',$rnum);
			$this->db->update('newmt',$up);

			/*$this->db->select('*');
			$this->db->where('mt_id', $rnum);
			$querysi = $this->db->get('newmt');
			$valii = $querysi->row();*/

			/*$this->db->select('*');
			$this->db->where('rank', $valii->catofvechicle);
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$querysiy = $this->db->get('mto_san');
			$valiiy = $querysiy->row();*/

			/*if($valiiy->san !=0){
				$up = array('san' => $valiiy->san);
				$this->db->where('mt_id',$rnum);
				$this->db->update('newmt',$up);
			}else{}*/
			

			

		}else{
			$up = array('bat_id' => $ito, 'uid' => 1, 'pid' => $this->session->userdata('userid'));
			$this->db->where('mt_id',$rnum);
			$task = $this->db->update('newmt',$up);
		}
	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function ins_vic($rnum,$cw,$ename,$name,$contact,$lid,$lids,$sr,$vc,$ssw,$suw,$remark){
		$addvalue = array('rnum' => $rnum, 'cw' => $cw,'ename' => $ename, 'econtact' => $contact, 'name' => $name, 'lid' => $lid,'lids' => $lids, 'sr' => $sr, 'vc' => $vc, 'ssw' => $ssw, 'suw' => $suw, 'remarks' => $remark,'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('vicuins',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_material($tpi,$toi,$rno,$rn,$ctir,$cnir,$Receivedmode,$Receivedfrom,$Receivedothers,$rcno,$rcdate,$rcdt,$fname,$ofname,$gfund,$gfundadcp,$gfundbhf,$fn,$addss,$cp,$cn,$pa,$bn,$bd,$rd,$rni,$rtd,$paysta,$cti,$cni,$toiss,$trno,$nameofitem,$qty,$qty1,$fname1,$ofname1,$gfund1,$gfundadcp1,$gfundbhf1,$part1,$part2,$part3,$part4,$part5,$part6,$part7,$addinfo,$addinfop,$rtwo){
		$this->db->select('*');
		if($toi !='' && $rn!=''){
			$this->db->where('item',$toi);
			$this->db->where('name',$rn);	
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('mskitemsqty');
			$info = $query->row();
			
			if(count($info) == 0){
				$addvalue = array('name' => $rn,'item' => $toi, 'qty' => $qty, 'bat_id' => $this->session->userdata('userid'));
				$task = $this->db->insert('mskitemsqty',$addvalue); 
			}else{
				$nq =  $info->qty + $qty;
				$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
				if($toi !='' && $rn!=''){
					$this->db->where('item',$toi);	
					$this->db->where('name',$rn);
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$task = $this->db->update('mskitemsqty',$adds);
				}
			}
		}
		if($toiss!='' && $rtwo!=''){
			$this->db->where('item',$toiss);
			$this->db->where('name',$rtwo);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('mskitemsqty');
			$info = $query->row();
			if(count($info) == 0){
				$addvalue = array('name' => $rtwo,'item' => $toiss, 'qty' => $qty1, 'bat_id' => $this->session->userdata('userid'));
				$task = $this->db->insert('mskitemsqty',$addvalue); 
			}else{
				$nq =  $info->qty +	$qty1;
				$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
				if($toiss!='' && $rtwo!=''){
					$this->db->where('item',$toiss);
					$this->db->where('name',$rtwo);
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$task = $this->db->update('mskitemsqty',$adds);
				}
			}
		}
			
			$addvalue = array('recived_type' => $tpi, 'typeofitem' => $toi.$rno.$toiss.$trno, 'nameofitem' => $rn.$rtwo.$nameofitem, 'catofitem' => $ctir.$cti, 'conofitem' => $cnir.$cni, 'recmode' => $Receivedmode, 'recfrom' => $Receivedfrom.'&nbsp;'.$Receivedothers,  'rc_number' => $rcno, 'rc_date' => $rcdate,'recdate' => $rcdt,'fund_name' => $fname.$fname1, 'other_fund' => $ofname.$ofname1, 'govt_fund' => $gfund.$gfund1,'bnhq' => $gfundbhf.','.$gfundbhf1.','.$part1.$part2.$part3.$part4.$part5.$part6.$part7, 'adgpfunds' => $gfundadcp.$gfundadcp1, 'firm_name' => $fn, 'firm_address' => $addss, 'contact_person' => $cp, 'contact_num' => $cn, 'perchase_amount' => $pa,'billno' => $bn,'billdate' => $bd,'per_rec_date' => $rd,'per_recpit_no' => $rni, 'per_recipt_date' => $rtd, 'payment_status' => $paysta, 'recqut' => $qty.$qty1, 'status' => 'In Store','infos' => $addinfo.$addinfop, 'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('newmsk',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}


	function edit_material($id,$tpi,$toi,$rno,$rn,$ctir,$cnir,$Receivedmode,$Receivedfrom,$Receivedothers,$rcno,$rcdate,$rcdt,$fname,$ofname,$gfund,$gfundadcp,$gfundbhf,$fn,$addss,$cp,$cn,$pa,$bn,$bd,$rd,$rni,$rtd,$paysta,$cti,$cni,$toiss,$trno,$nameofitem,$qty,$qty1,$fname1,$ofname1,$gfund1,$gfundadcp1,$gfundbhf1,$part1,$part2,$part3,$part4,$part5,$part6,$part7,$addinfo,$addinfop,$rtwo,$check,$condomqty,$condomqtyi,$checks,$qlog,$tqut,$qplog,$tpqut){

		//fetch the value of quantity here from database
		
		$this->db->where('msk_id',$id);
			$query = $this->db->get('newmsk');
			$dinfo = $query->row();


			$this->db->select('*');
		if($toi !='' && $rn!=''){
			$this->db->where('item',$toi);	
			$this->db->where('name',$rn);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('mskitemsqty');
			$info = $query->row();
		}
		if($toiss!='' && $rtwo!=''){
			$this->db->where('item',$toiss);
			$this->db->where('name',$rtwo);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('mskitemsqty');
			$info = $query->row();
		}
		
			
		if($tpi == 'Received'){
				
			if($checks == 1 && isset($qlog)){
				
				$rlogic = '';
				if($qlog == 1){
					$nq =  $info->qty + $tqut;
					$rlogic = $tqut + $qty;
				}elseif($qlog == 2){
					$nq =  $info->qty - $tqut;
					$rlogic =  $qty - $tqut;
				}
				$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
				if($toi !='' && $rn!=''){
					$this->db->where('item',$toi);	
					$this->db->where('name',$rn);
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$task = $this->db->update('mskitemsqty',$adds);
				}
				if($rlogic==0){	//delet the page if quantity is zero
					//die('delete the record');
					$this->db->where('msk_id', $id);
					$task = $this->db->delete('newmsk');
				}else{
					$addvalue = array('recived_type' => $tpi, 'typeofitem' => $toi, 'nameofitem' => $rn, 'infos' => $addinfo, 'catofitem' => $ctir, 'conofitem' => $cnir, 'recqut' => $rlogic, 'recmode' => $Receivedmode, 'recfrom' => $Receivedfrom.'&nbsp;'.$Receivedothers, 'recmode' => $Receivedmode, 'rc_number' => $rcno, 'rc_date' => $rcdate,'recdate' => $rcdt,'fund_name' => $fname, 'other_fund' => $ofname, 'govt_fund' => $gfund);
					$this->db->where('msk_id',$id);
					$task = $this->db->update('newmsk',$addvalue);
				}
					return 1;
				}elseif($cnir == 'C'){
					
					$rlogic =  $qty - $condomqty;
					$data = array();
					for ($i=0; $i < $condomqty; $i++) { 
						$data[] = $addvalue = array('recived_type' => $tpi, 'typeofitem' => $toi, 'nameofitem' => $rn, 'infos' => $addinfo, 'catofitem' => $ctir, 'conofitem' => 'C', 'recqut' => '1', 'recmode' => $Receivedmode, 'recfrom' => $Receivedfrom.'&nbsp;'.$Receivedothers, 'recmode' => $Receivedmode, 'rc_number' => $rcno, 'rc_date' => $rcdate,'recdate' => $rcdt,'fund_name' => $fname, 'other_fund' => $ofname, 'govt_fund' => $gfund,'bat_id' => $this->session->userdata('userid'));
						//$task = $this->db->insert('newmsk',$addvalue);


						/*$addvalues = array('recqut' => $dinfo->recqut - $condomqty);
						$this->db->where('msk_id',$id);
						$task = $this->db->update('newmsk',$addvalues);*/

					}
					$task = $this->db->insert_batch('newmsk',$data);
					if($rlogic==0){
						//die('delete the record');
						$this->db->where('msk_id', $id);
						$task = $this->db->delete('newmsk');
					}else{
						$addvalue = array('recqut' => $rlogic);
					    $this->db->where('msk_id',$id);
					    $task = $this->db->update('newmsk',$addvalue);
					}

					/*$nq =  $info->qty - $condomqty;
						$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
						if($toi !='' && $rn!=''){
							$this->db->where('item',$toi);	
							$this->db->where('name',$rn);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('mskitemsqty',$adds);
						}*/
						return 1;
				}else{
					$addvalue = array('recived_type' => $tpi, 'typeofitem' => $toi, 'nameofitem' => $rn, 'infos' => $addinfo, 'catofitem' => $ctir, 'conofitem' => $cnir, 'recmode' => $Receivedmode, 'recfrom' => $Receivedfrom.'&nbsp;'.$Receivedothers, 'recmode' => $Receivedmode, 'rc_number' => $rcno, 'rc_date' => $rcdate,'recdate' => $rcdt,'fund_name' => $fname, 'other_fund' => $ofname, 'govt_fund' => $gfund);
					$this->db->where('msk_id',$id);
					$task = $this->db->update('newmsk',$addvalue);
					return 1;
				}
				
		}elseif($tpi == 'Purchased'){
				//var_dump($check);
				if($check == 1 && isset($qplog)){
					
				$rlogic = '';
				if($qplog == 1){
					$nq =  $info->qty + $tpqut;
					$rlogic = $tpqut + $qty1;
				}elseif($qplog == 2){
					$nq =  $info->qty - $tpqut;
					$rlogic =  $qty1 - $tpqut;
				}


						$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
						if($toiss!='' && $rtwo!=''){
							$this->db->where('item',$toiss);
							$this->db->where('name',$rtwo);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('mskitemsqty',$adds);
						}
						if($rlogic==0){	//delet the page if quantity is zero
							//die('delete the record');
							$this->db->where('msk_id', $id);
							$task = $this->db->delete('newmsk');
						}else{
					$addvalue = array('recived_type' => $tpi, 'typeofitem' => $toiss, 'nameofitem' => $rtwo, 'infos' => $addinfop, 'catofitem' => $cti, 'conofitem' => $cni, 'firm_name' => $fn, 'firm_address' => $addss, 'contact_person' => $cp, 'contact_num' => $cn, 'perchase_amount' => $pa,'billno' => $bn,'billdate' => $bd ,'per_rec_date' => $rd,'per_recpit_no' => $rni, 'per_recipt_date' => $rtd,'recqut' => $rlogic, 'payment_status' => $paysta);
					$this->db->where('msk_id',$id);
					$task = $this->db->update('newmsk',$addvalue);
						}
					//echo $this->db->last_query();
					return 1;
				}elseif($cni == 'C'){
					//echo 'condemn';
					$rlogics =  $qty1 - $condomqtyi;
					for ($i=0; $i < $condomqtyi; $i++) { 
						$addvalue = array('recived_type' => $tpi, 'typeofitem' => $toiss, 'nameofitem' => $rtwo, 'infos' => $addinfop, 'catofitem' => $cti, 'conofitem' => $cni, 'firm_name' => $fn, 'firm_address' => $addss, 'contact_person' => $cp, 'contact_num' => $cn, 'perchase_amount' => $pa,'billno' => $bn,'billdate' => $bd ,'per_rec_date' => $rd,'per_recpit_no' => $rni, 'per_recipt_date' => $rtd,'recqut' => '1', 'payment_status' => $paysta,'bat_id' => $this->session->userdata('userid'));
						$task = $this->db->insert('newmsk',$addvalue);

						/*$addvalues = array('recqut' =>  $dinfo->recqut - $condomqtyi );
						$this->db->where('msk_id',$id);
						$task = $this->db->update('newmsk',$addvalues);
					*/
					}
					if($rlogics==0){		//delete the page if its quantity is zero
						//die('delete the record');
						$this->db->where('msk_id', $id);
						$task = $this->db->delete('newmsk');
					}else{		//other wise update the quantity
						$addvalue = array('recqut' => $rlogics);
					    $this->db->where('msk_id',$id);
					    $task = $this->db->update('newmsk',$addvalue);
					}


					/*$nq =   $info->qty - $condomqtyi;
						$adds = array('qty' => $nq, 'bat_id' => $this->session->userdata('userid'));
						if($toiss!='' && $rtwo!=''){
							$this->db->where('item',$toiss);
							$this->db->where('name',$rtwo);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('mskitemsqty',$adds);
						}*/
						return 1;
				}else{
					$addvalue = array('recived_type' => $tpi, 'typeofitem' => $toiss, 'nameofitem' => $rtwo, 'infos' => $addinfop, 'catofitem' => $cti, 'conofitem' => $cni, 'firm_name' => $fn, 'firm_address' => $addss, 'contact_person' => $cp, 'contact_num' => $cn, 'perchase_amount' => $pa,'billno' => $bn,'billdate' => $bd ,'per_rec_date' => $rd,'per_recpit_no' => $rni, 'per_recipt_date' => $rtd, 'payment_status' => $paysta);
					$this->db->where('msk_id',$id);
					$task = $this->db->update('newmsk',$addvalue);
					return 1;
				}
				//die('end');
		}
		/*if($task){
			return 1;
		}else{
			return 0;
		}*/	  
	}
	function material_exists($id){
		$this->db->select('count(*) as total');
		$this->db->where('msk_id',$id);
		$query = $this->db->get('newmsk');
		$row = $query->row();
		if($row->total>0){
			return true;
		}else{
			return false;
		}
	}
	
    function add_pmaterial($toi,$tpi,$cti,$cni,$imode,$quantitys,$Issuedto,$nop,$obito,$ito,$run,$ircn,$ircd,$id,$ovalue,$Detail,$District,$addinfop,$arpOther){
		$this->db->select('*');
		if($toi !='' && $tpi!=''){
			$this->db->where('item',$toi);	
			$this->db->where('name',$tpi);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('mskitemsqty');
			$info = $query->row();

			$nq =  $info->qty - $quantitys;
			$niq = $info->issued + $quantitys;

			$adds = array('qty' => $nq,  'issued' => $niq, 'bat_id' => $this->session->userdata('userid'));

			if($toi !='' && $tpi!=''){
				$this->db->where('item',$toi);	
				$this->db->where('name',$tpi);
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('mskitemsqty',$adds);
			}
	
			
		}
		

		$addvalue = array('typeofitem' => $toi,'nameofitem' => $tpi, 'cat_of_item' => $cti, 'condition_of_item' => $cni, 'issue_mode' => $imode,  'quantity' => $quantitys, 'Issuedto' => $Issuedto, 'officer' => $nop,'other_battalion' => $obito, 'self_battalion' => $ito.$ovalue, 'reparing_unit' => $run, 'issue_rc_no' => $ircn, 'issue_rc_date' => $ircd, 'issue_date' => $id,'bat_id' => $this->session->userdata('userid'),'details' => $Detail , 'district' => $District,'infos' => $addinfop,'arp_detail'=>$arpOther);
		$task = $this->db->insert('issue_material',$addvalue);
		
		/*	if($obito !=''){	
			$up = array('typeofitem' => $toi.$rn,'nameofitem' => $newval[1], 'catofitem' => $cti, 'conofitem' => $cni, 'issue_mode' => $tpi,  'quantity' => $quantitys, 'officer' => $nop,'other_battalion' => $obito.$itoothers, 'self_battalion' => $ito.$ovalue, 'reparing_unit' => $run, 'issue_rc_no' => $ircn, 'issue_rc_date' => $ircd, 'issue_date' => $id,'status' => 'Issued','bat_id' => $obito);
			$this->db->where('msk_id',$newval[0]);
			$task = $this->db->update('newmsk',$up);
			}else{
				$up = array('typeofitem' => $toi.$rn,'nameofitem' => $newval[1], 'catofitem' => $cti, 'conofitem' => $cni, 'issue_mode' => $tpi,  'quantity' => $qts, 'recqut' => $qt,'officer' => $nop,'other_battalion' => $obito.$itoothers, 'self_battalion' => $ito.$ovalue, 'reparing_unit' => $run, 'issue_rc_no' => $ircn, 'issue_rc_date' => $ircd, 'issue_date' => $id,'status' => 'Issued');
				$this->db->where('msk_id',$newval[0]);
			$task = $this->db->update('newmsk',$up);
			}*/
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function alot_pmaterial($id,$cni,$mod,$in,$Issuedto,$nop,$obito,$ito,$run,$ovalue,$drbircn,$ircd,$DepositDate,$paircn,$Condemnationamount,$conircn,$Commandantorderdate,$ircncamo,$ircncpo,$CPOforwardletterdate,$ftrcon3condate){
		$this->db->select('*');
		$this->db->where('issue_material_id',$id);	
		$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('issue_material');
			$info = $query->row();

			/*if($cni == 'C'){
				$this->db->select('*');
				$this->db->where('item',$info->typeofitem);	
				$this->db->where('name',$info->nameofitem);	
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$query = $this->db->get('mskitemsqty');
				$infoi = $query->row();
				$nq =  $infoi->issued - $in;

				if($in > $infoi->issued){
						return 0;
				}*//*else{*/

					/*	$adds = array('issued' => $nq, 'bat_id' => $this->session->userdata('userid'));
						$this->db->where('item',$info->typeofitem);	
						$this->db->where('name',$info->nameofitem);	
						$this->db->where('bat_id',$this->session->userdata('userid'));
						$task = $this->db->update('mskitemsqty',$adds);

						if($info->quantity < 1){
							$upps = array('quantity' => $info->quantity - $in,'im_status' => 0);
							$this->db->where('issue_material_id',$id);	
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('issue_material',$upps);
						}else{
							$upps = array('quantity' => $info->quantity - $in);
							$this->db->where('issue_material_id',$id);	
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('issue_material',$upps);
						}
						

						for ($i=0; $i < $in; $i++) { 
							$addvalue = array('typeofitem' => $info->typeofitem,'nameofitem' => $info->nameofitem,
				  'condition_of_item' => $cni, 'mode_of_deposit' => $mod,'quantity' => '1','depositby' => $Issuedto,'officer' => $nop,'other_battalion' => $obito,'self_battalion' => $ito.$ovalue, 'repairunit' => $run, 'deposit_bill' => $drbircn, 'deposit_bill_date' => $ircd, 'deposit_date'=> $DepositDate, 'perchased_amount' => $paircn, 'condem_amount' => $Condemnationamount, 'Comorderno' => $conircn, 'Comorderdate' => $Commandantorderdate, 'Condamount' => $ircncamo, 'cpoletterno' => $ircncpo, 'cpoletterdate' => $CPOforwardletterdate, 'cpocondemdate' => $ftrcon3condate, 'bat_id' => $this->session->userdata('userid'));
					$task = $this->db->insert('deposit_material',$addvalue);
						}*/
					
				/*}*/

				

			/*}else{*/
				$this->db->select('*');
				$this->db->where('item',$info->typeofitem);	
				$this->db->where('name',$info->nameofitem);	
				$this->db->where('bat_id',$this->session->userdata('userid'));
					$query = $this->db->get('mskitemsqty');
					$infoi = $query->row();
					$nq =  $infoi->issued - $in;
					$niq = $infoi->qty + $in;
					if($in > $infoi->issued){
						return 0;
					}else{

						for ($i=0; $i < $in; $i++) { 
					$addvalue = array('typeofitem' => $info->typeofitem,'nameofitem' => $info->nameofitem,
				  'condition_of_item' => $cni, 'mode_of_deposit' => $mod,'quantity' => 1,'depositby' => $Issuedto,'officer' => $nop,'other_battalion' => $obito,'self_battalion' => $ito.$ovalue, 'repairunit' => $run, 'deposit_bill' => $drbircn, 'deposit_bill_date' => $ircd, 'deposit_date'=> $DepositDate, 'perchased_amount' => $paircn, 'condem_amount' => $Condemnationamount, 'Comorderno' => $conircn, 'Comorderdate' => $Commandantorderdate, 'Condamount' => $ircncamo, 'cpoletterno' => $ircncpo, 'cpoletterdate' => $CPOforwardletterdate, 'cpocondemdate' => $ftrcon3condate, 'bat_id' => $this->session->userdata('userid'));


				$task = $this->db->insert('deposit_material',$addvalue);
				}

				$adds = array('qty' => $niq,  'issued' => $nq, 'bat_id' => $this->session->userdata('userid'));

				$this->db->where('item',$info->typeofitem);	
				$this->db->where('name',$info->nameofitem);	
				
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('mskitemsqty',$adds);

				if($info->quantity < 1){
					$upps = array('quantity' => $info->quantity - $in,'im_status' => 0);
				}else{
					$upps = array('quantity' => $info->quantity - $in);
				}
				

				$this->db->where('issue_material_id',$id);	
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('issue_material',$upps);
                                
				if($task){
                                    return true;
                                }else{
                                    return false;
                                }

				
				}
	/*}*/

		
/*
		if($task){
			return 1;
		}else{
			return 0;
		}*/	 
	}

	function add_man($name,$fname,$hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$phouseno,$pstreetno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$docOther,$Modemdr,$mocOther,$dateofesnlistment1,$Rankre,$eor1,$eor2,$eor3,$eor4,$eor5,$Enlistmentec,$EnlistmentUnit,$enOther,$DateofRetirementdor,$gpfPRAN,$PRAN,$BattalionUnitito,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$Deptdn,$iIdentityCardNocn,$InductionRankir,$catofind1,$catofind2,$catofind3,$catofind4,$catofind5,$InductionModeim,$indictiondate,$PreviousBatalionito,$PreviousNoprnOther,$PreviousNoprn,$DateOFPromotionDetails21,$DateOFPromotionDetails23,$DateOFPromotionDetails24,$DateOFPromotionDetails25,$DateOFPromotionDetails26,$DateOFPromotionDetails27,$DateOFPromotionDetails28,$DateOFPromotionDetails29,$DateOFPromotionDetails30,$DateOFPromotionDetails31,$DateOFPromotionDetails32,$DateOFPromotionDetails33,$DateOFPromotionDetails34,$LowerSchoolCourseDate35,$DateOFPromotionDetails35,$TrainingInstituteti,$Batchbn,$batchpassdate,$TrainingInstitutessti,$TrainingInstitutesstiOther,$NamesofsCourses,$DurationsofsCourses,$DurationsofsCoursest,$NameofsRanges,$dateofprcatice,$tow,$tyodu,$Nationality,$nstate,$clit,$DateofRetirementdori,$orderby,$cnody,$enutherdistrict,$bunitdistrict,$gd1,$bd1){
		$Othertraining = '';
		$addvalue = array(
			'name' => $name,
			'presentrank' => $RankRankre ,
			'cexrank' => $catop1,
			'cminirank' => $catop2,
			'cmedirank' => $catop3,
			'ccprank' => $catop4,
			'cccrank' => $catop5,
			'depttno' => $Deptdn,
			'typeofduty' => $tyodu,
		 'fathername' => $fname,
		  'houseno' => $hno,
		   'streetno' => $sno,
		   'wardno' => $wardno,
		    'villmohala' => $vm,
		    'city' => $ct,
		     'postoffice' => $po,
		      'policestation' => $ps,
		       'teshil' => $tl ,
		       'Nationality' => $Nationality,
		       'nstate' => $nstate,
		        'state' => $state,
		         'district' => $dis,
		          'phouse' => $phouseno,
		           'pstreet' => $pstreetno,
		            'pvillmohala' => $pvillmoh,
		            'pcity' => $postcity,
		            'ppostoffice' => $pcitypostoff,
		             'ppolicestation' => $ppolicestation,
		              'ptehsil' => $ptehsil, 
		              'pdistrict' => $postate,
		               'pstate' => $pdistrict, 
		               'gender' => $gender,
		                'maritalstatus' => $mstatus,
		                 //'Single' => $Single,
		                  'dateofbith' => $dob, 
		                  'caste' => $casting,
		                   'category' => $catii,
		                    'phono1' => $conphno,
		                     'phono2' => $conphnot,
		                     'email' => $pemailid,
		                      'adharno' => $addarcard,
		                       'pan' => $pancard, 
		                       'nameofbank' => $bankdetail,
		                        'nameofbranch' => $bankbrach,
		                         'bankacno' =>  $bankac,
		                          'ifsccode' => $ifsccode,
		                           'bloodgroup' => $bloodgroup,
		                            'identificationmark' => $Identificationmark,
		                            'feet' => $Feet,
		                            'inch' => $inch,
		                            'Kg' => $Kg,
		                            'Gm' => $Gm, 
		                            'eduqalification' => $stts, 
		                            'UnderGraduate' => $UnderGraduate,
		                            'Graduate' => $Graduate,
		                             'PostGraduate' => $PostGraduate,
		                              'Doctorate' => $Doctorate,
		                              'Doctorateother' => $docOther,
		                               'modeofrec' => $Modemdr.$mocOther,
		                                'dateofinlitment' => $dateofesnlistment1,
		                                'rankofenlistment' => $Rankre,
		                                 'eexrank' => $eor1,
		                                 'eminirank' => $eor2,
		                                 'emedirank'=> $eor3,
		                                 'ecprank' => $eor4,
		                                 'eccrank' => $eor5,
		                                'enlistmentcat' => $Enlistmentec,
		                                'EnlistmentUnit' => $EnlistmentUnit.$enOther,
		                                'enutherdistrict' => $enutherdistrict,
		                                'dateofretirment' => $DateofRetirementdor,
		                                 'gpfpranno' => $gpfPRAN,
		                                 'PRAN' => $PRAN,
		                                 'BattalionUnitito' => $BattalionUnitito,
		                                 'bunitdistrict' => $bunitdistrict,
									'iIdentityCardNocn' => $iIdentityCardNocn,
									 'inductionrank' => $InductionRankir,
									 'ierank' => $catofind1,
									 'iminirank' => $catofind2,
									 'imedirank' => $catofind3,
									  'icprank' => $catofind4,
									  'iccrank' => $catofind5,
									  'inductionmode' => $InductionModeim,
									   'inductiondate' => $indictiondate,
									    'prebattalion' => $PreviousBatalionito.$PreviousNoprnOther,
									    'prebattno' => $PreviousNoprn,
									    'loweschoolcdate' => $DateOFPromotionDetails21,
									    'doc1' => $DateOFPromotionDetails23,
									    'doc2' => $DateOFPromotionDetails24,
									    'dofhc' => $DateOFPromotionDetails25,
									    'intermediatescor' => $DateOFPromotionDetails26,
									    'dofld' => $DateOFPromotionDetails27,
									    'dofld2' => $DateOFPromotionDetails28,
									    'dateofoffasi' => $DateOFPromotionDetails29,
									    'upperschool' => $DateOFPromotionDetails30,
									    'dateofliste' => $DateOFPromotionDetails31,
									    'dateofliste2' => $DateOFPromotionDetails32,
									    'dateoffsi' => $DateOFPromotionDetails33,
									    'dateoflistf' => $DateOFPromotionDetails34,
									    'dateoflistf2' => $LowerSchoolCourseDate35,
									    'dateofinsp' => $DateOFPromotionDetails35,
									     'btic' => $TrainingInstituteti,
									     'Othertraining' => $Othertraining,
									      'batchgroup' => $Batchbn, 
									      'passoutyear' => $batchpassdate,
									       'TrainingInstitutessti' => implode('@',$TrainingInstitutessti), 
									      'TrainingInstitutesstiOther' => implode('@',$TrainingInstitutesstiOther), 
									       'NamesofsCourses' => implode('@',$NamesofsCourses),
									       'DurationsofsCourses' => implode('@',$DurationsofsCourses),
									       'DurationsofsCoursest' => implode('@',$DurationsofsCoursest),
									        'NameofsRanges' => $NameofsRanges, 
									        'dateofprcatice' => $dateofprcatice,
									         'tow' => $tow,
									         'gd1' => $gd1,
									         'bd1' => $bd1,
									              'bat_id' => $this->session->userdata('userid'),
									          'comlit' => $clit,
									          'dateofretirment2' => $DateofRetirementdori,
									          'ono' => $orderby,
									          'cnody' => $cnody
									              );
		$task = $this->db->insert('newosi',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

 function ups_man($name,$fname,$hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$phouseno,$pstreetno,$pwardno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$docOther,$Modemdr,$Battalion,$tyodu,$mocOther,$dateofesnlistment1,$Rankre,$eor1,$eor2,$eor3,$eor4,$eor5,$Enlistmentec,$EnlistmentUnit,$DateofRetirementdor,$gpfPRAN,$PRAN,$BattalionUnitito,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$Deptdn,$iIdentityCardNocn,
		$InductionRankir,$catofind1,$catofind2,$catofind3,$catofind4,$catofind5,$InductionModeim,$indictiondate,$PreviousBatalionito,$PreviousNoprn,$DateOFPromotionDetails21,$DateOFPromotionDetails23,$DateOFPromotionDetails24,$DateOFPromotionDetails25,$DateOFPromotionDetails26,$DateOFPromotionDetails27,$DateOFPromotionDetails28,$DateOFPromotionDetails29,$DateOFPromotionDetails30,$DateOFPromotionDetails31,$DateOFPromotionDetails32,$DateOFPromotionDetails33,$DateOFPromotionDetails34,$LowerSchoolCourseDate35,$DateOFPromotionDetails35,$TrainingInstituteti,$Batchbn,$batchpassdate,$TrainingInstitutessti,$TrainingInstitutesstiOther,$NamesofsCourses,$DurationsofsCourses,$DurationsofsCoursest,$NameofsRanges,$dateofprcatice,$tow,$gd1,$bd1,$id,$clit,$DateofRetirementdori,$orderby,$cnody,$dateblockm1,$dateblockm2,$dateblockm3,$dateblockm4,$enutherdistrict,$bunitdistrict){

		$addvalue = array(
			'name' => $name,
			'presentrank' => $RankRankre,
			/*'battalion' => $Battalion,*/
			'typeofduty' => $tyodu,
			'cexrank' => $catop1,
			'cminirank' => $catop2,
			'cmedirank' => $catop3,
			'ccprank' => $catop4,
			'cccrank' => $catop5,
			'depttno' => $Deptdn,
		 'fathername' => $fname,
		  'houseno' => $hno,
		   'streetno' => $sno,
		   'wardno' => $wardno,
		    'villmohala' => $vm,
		    'city' => $ct,
		     'postoffice' => $po,
		      'policestation' => $ps,
		       'teshil' => $tl ,
		        'state' => $state,
		         'district' => $dis,
		          'phouse' => $phouseno,
		           'pstreet' => $pstreetno,
		           	'pward' => $pwardno,
		            'pvillmohala' => $pvillmoh,
		            'pcity' => $postcity,
		            'ppostoffice' => $pcitypostoff,
		             'ppolicestation' => $ppolicestation,
		              'ptehsil' => $ptehsil, 
		              'pdistrict' => $pdistrict,
		               'pstate' => $postate, 
		               'gender' => $gender,
		                'maritalstatus' => $mstatus,
		                 //'Single' => $Single,
		                  'dateofbith' => $dob, 
		                  'caste' => $casting,
		                   'category' => $catii,
		                    'phono1' => $conphno,
		                     'phono2' => $conphnot,
		                     'email' => $pemailid,
		                      'adharno' => $addarcard,
		                       'pan' => $pancard, 
		                       'nameofbank' => $bankdetail,
		                        'nameofbranch' => $bankbrach,
		                         'bankacno' =>  $bankac,
		                          'ifsccode' => $ifsccode,
		                           'bloodgroup' => $bloodgroup,
		                            'identificationmark' => $Identificationmark,
		                            'feet' => $Feet,
		                            'inch' => $inch,
		                            'Kg' => $Kg,
		                            'Gm' => $Gm, 
		                            'eduqalification' => $stts, 
		                            'UnderGraduate' => $UnderGraduate,
		                            'Graduate' => $Graduate,
		                             'PostGraduate' => $PostGraduate,
		                              'Doctorate' => $Doctorate,
		                              'Doctorateother' => $docOther,
		                               'modeofrec' => $Modemdr,
		                               //'othermodeofrec' => $mocOther,
		                                'dateofinlitment' => $dateofesnlistment1,
		                                'rankofenlistment' => $Rankre,
		                                'eexrank' => $eor1,
		                                'eminirank' => $eor2,
		                                'emedirank' => $eor3,
		                                'ecprank' => $eor4,
		                                'eccrank' => $eor5,
		                                'enlistmentcat' => $Enlistmentec,
		                                'EnlistmentUnit' => $EnlistmentUnit,
		                                'enutherdistrict' => $enutherdistrict,
		                                'dateofretirment' => $DateofRetirementdor,
		                                 'gpfpranno' => $gpfPRAN,
		                                 'PRAN' => $PRAN,
		                                 'BattalionUnitito' => $BattalionUnitito,
		                                 'bunitdistrict' => $bunitdistrict,
									'iIdentityCardNocn' => $iIdentityCardNocn,
									 'inductionrank' => $InductionRankir,
									 'ierank' => $catofind1,
									 'iminirank' => $catofind2,
									 'imedirank' => $catofind3,
									  'icprank' => $catofind4,
									  'iccrank' => $catofind5,
									  'inductionmode' => $InductionModeim,
									   'inductiondate' => $indictiondate,
									    'prebattalion' => $PreviousBatalionito,
									    'prebattno' => $PreviousNoprn,
									    'loweschoolcdate' => $DateOFPromotionDetails21,
									    'doc1' => $DateOFPromotionDetails23,
									    'doc2' => $DateOFPromotionDetails24,
									    'dofhc' => $DateOFPromotionDetails25,
									    'intermediatescor' => $DateOFPromotionDetails26,
									    'dofld' => $DateOFPromotionDetails27,
									    'dofld2' => $DateOFPromotionDetails28,
									    'dateofoffasi' => $DateOFPromotionDetails29,
									    'upperschool' => $DateOFPromotionDetails30,
									    'dateofliste' => $DateOFPromotionDetails31,
									    'dateofliste2' => $DateOFPromotionDetails32,
									    'dateoffsi' => $DateOFPromotionDetails33,
									    'dateoflistf' => $DateOFPromotionDetails34,
									    'dateoflistf2' => $LowerSchoolCourseDate35,
									    'dateofinsp' => $DateOFPromotionDetails35,
									    'btic' => $TrainingInstituteti,
									     //'Othertraining' => $Othertraining,
									      'batchgroup' => $Batchbn, 
									      'passoutyear' => $batchpassdate,
									       'TrainingInstitutessti' => implode('@',$TrainingInstitutessti), 
									      'TrainingInstitutesstiOther' => implode('@',$TrainingInstitutesstiOther), 
									       'NamesofsCourses' => implode('@',$NamesofsCourses),
									       'DurationsofsCourses' => implode('@',$DurationsofsCourses),
									       'DurationsofsCoursest' => implode('@',$DurationsofsCoursest),
									        'NameofsRanges' => $NameofsRanges, 
									        'dateofprcatice' => $dateofprcatice,
									         'tow' => $tow,
									         'gd1' => $gd1,
									         'bd1' => $bd1,
									         'comlit' => $clit,
									         'dateofretirment2' => $DateofRetirementdori,
									         'ono' => $orderby,
									          'cnody' => $cnody,
									          'dateblockm1' => $dateblockm1,
									          'dateblockm2' => $dateblockm2,
									          'dateblockm3' => $dateblockm3,
									          'dateblockm4' => $dateblockm4);
			$this->db->where('man_id',$id);
			$task = $this->db->update('newosi',$addvalue);	

			if($task){
				return 1;
			}else{
				return 0;
			}	 
	}


	function deinduction($nop,$hn,$ti,$ito,$itoOther,$Dateofrelieving,$iito,$iitoOther,$Dateofrelievingi,$DeputationUnit,$pg,$DismissingAuthority,$DismissDate,$Reason,$AnyOther,$DateofReti,$tis,$extava,$pgstos,$pgDateofRetirement,$date,$pgtser,$DateofReti1,$DateofDeath,$pgrDateofRetirement,$pgtseryear,$pgDateoMissing,$tid,$Dateofrelievinger=null){
		$addvalue = array('nop' => $nop, 'hn' => $hn, 'ti' => $ti, 'ito' => $ito, 'Dateofrelieving' => $Dateofrelieving, 'iito' => $iito.$iitoOther,'Dateofrelievingi' => $Dateofrelievingi, 'DeputationUnit' => $DeputationUnit, 'pg' => $pg, 'DismissingAuthority' => $DismissingAuthority, 'DismissDate' => $DismissDate , 'Reason' => $Reason.$AnyOther, 'DateofReti' => $DateofReti, 'tit' => $tis,'extava' => $extava, 'pgstos' => $pgstos, 'pgDateofRetirement' => $pgDateofRetirement, 'dates' => $date, 'pgtser' => $pgtser, 'DateofReti1' => $DateofReti1, 'DateofDeath' => $DateofDeath,'pgrDateofRetirement' => $pgrDateofRetirement, 'pgtseryear' => $pgtseryear, 'pgDateoMissing' => $pgDateoMissing, 'reld' => $tid, 'batt_id' => $this->session->userdata('userid'),'ddr'=>$Dateofrelievinger);
		$task = $this->db->insert('deinduction',$addvalue);	
		if($tid =='No'){
			
		}elseif($tid =='Expired'){
			$addvalue = array('bat_id' => 0);
			$this->db->where('man_id', $nop);
			$task = $this->db->update('newosi',$addvalue);
		}else{
			$addvalue = array('uid' => 1,'bat_id' => $ito.$itoOther.$iito.$iitoOther,'ddr' => $Dateofrelievinger);
			$this->db->where('man_id', $nop);
			$task = $this->db->update('newosi',$addvalue);
			$task = 1;
		}
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function recall($id,$i){
		$addvalue = array('uid' => 0,'bat_id' => $this->session->userdata('userid'));
		$this->db->where('man_id', $id);
		$task = $this->db->update('newosi',$addvalue);

		$this->db->where('deinduction_id', $i);
		$task = $this->db->delete('deinduction');
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_horse($hname,$sex,$hnum,$color,$Height,$inch,$breed,$BreedOther,$nhage,$moa,$orderno,$date,$st,$wt,$hs,$Serviceable,$nServiceable,$lvd,$vb,$lhcd,$hcb,$postingdeatils){
		$addvalue = array('horse_name' => $hname, 'sex' => $sex, 'hoof_no' => $hnum, 'color' => $color, 'height' => $Height, 'breed' => $breed, 'atop' => $nhage, 'moac' => $moa, 'orderno' => $orderno, 'redate' => $date , 'price' => $st, 'wut' => $wt, 'health_status' => $hs,'last_vc_date' => $lvd, 'vacc_by' => $vb, 'lhcp' => $lhcd, 'hcb' => $hcb, 'posting' => $postingdeatils);
		$task = $this->db->insert('horse',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function edit_horse($id,$hname,$sex,$hnum,$color,$Height,$inch,$breed,$BreedOther,$nhage,$moa,$orderno,$date,$st,$wt,$hs,$Serviceable,$nServiceable,$lvd,$vb,$lhcd,$hcb,$postingdeatils){
		$addvalue = array('horse_name' => $hname, 'sex' => $sex, 'hoof_no' => $hnum, 'color' => $color, 'height' => $Height, 'breed' => $breed, 'atop' => $nhage, 'moac' => $moa, 'orderno' => $orderno, 'redate' => $date , 'price' => $st, 'wut' => $wt, 'health_status' => $hs,'last_vc_date' => $lvd, 'vacc_by' => $vb, 'lhcp' => $lhcd, 'hcb' => $hcb, 'posting' => $postingdeatils);
		$this->db->where('horse_id',$id);
		$task = $this->db->update('horse',$addvalue);		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function alot_horse($hid,$tpi,$hn,$ito,$hids,$pd,$ppl,$pon,$pod){
		$addvalue = array('hid' => $hid,'tpi' => $tpi, 'hn' => $hn, 'ito' => $ito, 'hids' => $hids, 'pd' => $pd, 'ppl' => $ppl, 'pon' => $pon, 'pod' => $pod );
		$task = $this->db->insert('alot_horse',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}



	function edit_allot_horse($id,$hid,$tpi,$hn,$ito,$hids,$pd,$ppl,$pon,$pod){
		$addvalue = array('hid' => $hid,'tpi' => $tpi, 'hn' => $hn, 'ito' => $ito, 'hids' => $hids, 'pd' => $pd, 'ppl' => $ppl, 'pon' => $pon, 'pod' => $pod );
		$this->db->where('alothorse_id',$id);
		$task = $this->db->update('alot_horse',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function deposit_horse($bdn,$rec,$lhcd,$cw,$Serviceable,$nServiceable,$remark){
		$addvalue = array('rec' => $rec, 'lhcd' => $lhcd, 'cw' => $cw.'-'.$Serviceable.'-'.$nServiceable, 'remark' => $remark);
		$this->db->where('horse_id',$bdn);
		$task = $this->db->update('old_horse',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function update_horse($bdn,$cw,$Serviceable,$nServiceable,$ito,$rno,$ton,$tod,$dot,$hids,$remark){
		$addvalue = array('uhorcon' => $cw. '-'.$Serviceable. '-'.$nServiceable, 'ubatun' => $ito.'-'.$rno, 'utrans' => $ton, 'utransdate' => $tod, 'udateoftrans' => $dot, 'utod' => $hids, 'uremark' => $remark);
		$this->db->where('horse_id',$bdn);
		$task = $this->db->update('old_horse',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function health_horse($bdn,$rbeltno,$contactno,$lhcd,$ito,$cw,$remark){
		$addvalue = array('hid' => $bdn, 'dname' => $rbeltno, 'dcontact' => $contactno, 'chdate' => $lhcd,'chtype' => $ito, 'hstatus' => $cw,'remarks' => $remark);
		$task = $this->db->insert('horse_health',$addvalue);		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function den_horse($hid,$tpi,$lvd){
		$addvalue = array('hid' => $hid, 'type' => $tpi, 'rdate' => $lvd);
		$task = $this->db->insert('dhorse',$addvalue);

		$addvalue = array('hrse_status' => 2);
		$this->db->where('horse_id',$hid);
		$task = $this->db->update('horse',$addvalue);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}


	function add_quater($rc,$loc,$locothers,$rm,$ro,$rno,$Condition,$tq,$floor,$acct,$accts,$qno,$bb,$ono,$od,$todp,$eono){
		$addvalue = array('residecomplex' => $rc, 'typeofqtr' => $tq, 'location' => $loc.$locothers, 'flor' => $floor,'accomdationtype' =>  $acct, 'accomdationsize' => $accts, 'qtrno' => $qno, 'condit' => $Condition,'todate' => $todp,'holding' => $rm, 'resquatofficer' => $ro. '-' .$rno, 'order_no' => $ono,'order_date' => $od, 'electronicmeter' => $eono, 'build_by' => $bb, 'allot' => 'In kot','bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newquart',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function alot_quater($qn,$Condition,$nop,$posd,$bb,$alor,$alldate,$od,$Otheradd,$rankss,$regt,$contactno,$bbatslist,$statelist,$otherinfo){
		/*$addvalue = array('qn' => $qn, 'Conditions' => $Condition, 'officer' => $nop,'posting_details' => $posd, 'modes' => $bb, 'alotorder' => $alor, 'allotdate' => $alldate, 'occu_date' => $od,'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('alot_quater',$addvalue);	*/
		if($nop != 0){
			$this->db->select('*');
		$this->db->where('man_id',$nop);
		$query = $this->db->get('newosi');
		$result = $query->row();
		$up = array('condit' => $Condition, 'nameofallote' => $result->name, 'rank' => $result->cexrank.$result->cminirank.$result->cmedirank.$result->ccprank.$result->cccrank, 'regltno' => $result->depttno, 'contactno' => $result->phono1, 'allotmentorder' => $alor,
		  'allotmentdate' => $alldate, 'occudate' => $od, 'allot' => 'Issued' ,'qother' => $Otheradd,'placeofposting' => $posd,'balot' => $bbatslist.$statelist.$otherinfo,'bat_id' => $this->session->userdata('userid'));
		}else{
			$up = array('condit' => $Condition,'nameofallote' => '', 'allotmentorder' => $alor,
		  'allotmentdate' => $alldate, 'occudate' => $od, 'allot' => 'Issued' ,'qother' => $Otheradd,'placeofposting' => $posd,'rank' => $rankss, 'regltno' => $regt, 'contactno' => $contactno,'balot' => $bbatslist.$statelist.$otherinfo,'bat_id' => $this->session->userdata('userid'));
		}
		
		$this->db->where('quart_id',$qn);
		$tasks = $this->db->update('newquart',$up);

		if($nop != 0){
			$this->db->select('*');
		$this->db->where('man_id',$nop);
		$query = $this->db->get('newosi');
		$result = $query->row();
		$up = array('condit' => $Condition, 'nameofallote' => $result->name, 'rank' => $result->cexrank.$result->cminirank.$result->cmedirank.$result->ccprank.$result->cccrank, 'regltno' => $result->depttno, 'contactno' => $result->phono1, 'allotmentorder' => $alor,
		  'allotmentdate' => $alldate, 'occudate' => $od, 'allot' => 'Issued' ,'qother' => $Otheradd,'placeofposting' => $posd,'balot' => $bbatslist.$statelist.$otherinfo,'qid' => $qn);
		}else{
			$up = array('condit' => $Condition,'nameofallote' => '', 'allotmentorder' => $alor,
		  'allotmentdate' => $alldate, 'occudate' => $od, 'allot' => 'Issued' ,'qother' => $Otheradd,'placeofposting' => $posd,'rank' => $rankss, 'regltno' => $regt, 'contactno' => $contactno,'balot' => $bbatslist.$statelist.$otherinfo, 'qid' => $qn);
		}
		
		$tasks = $this->db->insert('uquartinfo',$up);
		if($tasks){
			return 1;
		}else{
			return 0;
		}	 
	}

	function alotedit_quater($id,$Otheradd,$rankss,$regt,$contactno,$posd,$eono,$Otheraddm,$acct,$accts,$tq,$bbatslist,$statelist,$otherinfo,$floor,$alloted){
		$up = array('qother' => $Otheradd,'placeofposting' => $posd,'rank' => $rankss, 'regltno' => $regt, 'contactno' => $contactno,'electronicmeter' => $eono,'nameofallote' => $Otheraddm,'accomdationtype' => $acct, 'accomdationsize' => $accts, 'accomdationsize' => $accts,'typeofqtr' => $tq,'balot' => $bbatslist.$statelist.$otherinfo, 'flor' => $floor,'allot'=>$alloted);
		$this->db->where('quart_id',$id);
		$tasks = $this->db->update('newquart',$up);
		if($tasks){
			return 1;
		}else{
			return 0;
		}	 
	}

	function eva_quater($qn,$Condition,$ono,$od,$evd,$eb,$wb,$sb,$gb,$coe,$cos,$cod,$cow,$cor,$cowc,$eva,$remark){ 
			$addvalue = array('qno' => $qn, 'eConditions' => $Condition, 'eono' => $ono, 'eod' => $od, 'eevd' => $evd, 'eeeb' => $eb, 'ewb' => $wb, 'esb' => $sb, 'egb' => $gb, 'ecoe' => $coe,'ecos' => $cos, 'ecod' => $cod,'ecow' => $cow, 'ecor' => $cor, 'ecowc' => $cowc,'eeva' => $eva, 'eremark' => $remark);
			$task = $this->db->insert('equater',$addvalue);	

			$up = array('nameofallote' => '', 'allotmentorder' => '' ,'allotmentdate' => '' , 'occudate' => '' , 'allot' => 'In kot','qother' => '','placeofposting' => '' ,'rank' => '' , 'regltno' => '' , 'contactno' => '','balot' => '');
			$this->db->where('quart_id',$qn);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$task = $this->db->update('newquart',$up);

			if($task){
				return 1;
			}else{
				return 0;
			}	 
	}

	function update_quater($qn,$Condition,$ono,$coe,$cos,$cod,$cow,$cor,$cowc,$remark){
		$addvalue = array('qno' => $qn,'uCondition' => $Condition, 'emn' => $ono, 'ucoe' => $coe,'ucos' => $cos, 
			'ucod' => $cod,'ucow' => $cow, 'ucor' => $cor, 'ucowc' => $cowc, 'uremark' => $remark);
		$task = $this->db->insert('u_quater',$addvalue); 	

		$up = array('condit' => $Condition);
			$this->db->where('quart_id',$qn);
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$task = $this->db->update('newquart',$up);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function epair_quater($id,$nrp,$orp,$trp,$rdetails,$rdate){
		$addvalue = array('quart_id' => $id,'qprice' => $nrp+$orp, 'tqprice' => $nrp+$trp, 'rdetails' => $rdetails,'rdate' => $rdate,'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('repair_quater',$addvalue); 		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function edit_epair_quater($id,$nrp,$orp,$trp,$rdetails,$rdate){
		$addvalue = array('qprice' => $nrp,'rdetails' => $rdetails,'rdate' => $rdate);
		$this->db->where('repair_quater_id',$id);
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$task = $this->db->update('repair_quater',$addvalue); 		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function msksun($name,$ito,$id){
		$this->db->where('name',$name);
		$this->db->where('bat_id',$id);
		$count = $this->db->count_all_results('msk_san');
		if($count<=0){
			$addvalue = array('name' => $name, 'san' => $ito, 'bat_id' => $id);
			$task = $this->db->insert('msk_san',$addvalue);	
		}else{
			$addvalue = array('name' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('name',$name);
			$this->db->where('bat_id',$id);
			$task = $this->db->update('msk_san',$addvalue);	
		}
		if($task){
			return 1;
		}else{
			return 0;
		}	  
	}

	function mtosun($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$this->db->where('bat_id',$id);
		$query = $this->db->get('mto_san');
		if ($query->num_rows() > 0){
		$addvalue = array('rank' => $name, 'san' => $ito);
		$this->db->where('rank',$name);
		$this->db->where('bat_id',$id);
		$task = $this->db->update('mto_san',$addvalue);
	}else{
		$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('mto_san',$addvalue);	
	}
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function sersun($name,$ito,$id){
		$v = explode(',', $name);
		$addvalue = array('wep' => $v[1],'name' => $v[2] , 'sun' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('service_ammu_report',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function prasun($name,$ito,$id){
		$v = explode(',', $name);
		$addvalue = array('wep' => $v[1], 'name' => $v[2] , 'sun' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('practice_ammu_report',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function armsun($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('wep',$name);
		$this->db->where('bat_id',$id);
		$query = $this->db->get('wep_report');
		if ($query->num_rows() > 0){
			$addvalue = array('wep' => $name, 'sun' => $ito, 'bat_id' => $id);
			$this->db->where('wep',$name);
			$this->db->where('bat_id',$id);
			$task = $this->db->update('wep_report',$addvalue);
		}else{
			$addvalue = array('wep' => $name, 'sun' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('wep_report',$addvalue);	
		}
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function armremak($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('wep',$name);
		$this->db->where('bat_id',$id);
		$query = $this->db->get('wep_report');
		if ($query->num_rows() > 0){
			$addvalue = array('remarkwep' => $ito);
			$this->db->where('wep',$name);
			$this->db->where('bat_id',$id);
			$task = $this->db->update('wep_report',$addvalue);
		}else{
			$addvalue = array('wep' => $name, 'sun' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('wep_report',$addvalue);	
		}
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function serremak($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('name',$name);
		$this->db->where('bat_id',$id);
		$query = $this->db->get('service_ammu_report');
		if ($query->num_rows() > 0){
			$addvalue = array('remarkwep' => $ito);
			$this->db->where('name',$name);
			$this->db->where('bat_id',$id);
			$task = $this->db->update('service_ammu_report',$addvalue);
		}/*else{
			$addvalue = array('wep' => $name, 'sun' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('service_ammu_report',$addvalue);	
		}*/
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function praremak($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('name',$name);
		$this->db->where('bat_id',$id);
		$query = $this->db->get('practice_ammu_report');
		if ($query->num_rows() > 0){
			$addvalue = array('remarkwep' => $ito);
			$this->db->where('name',$name);
			$this->db->where('bat_id',$id);
			$task = $this->db->update('practice_ammu_report',$addvalue);
		}/*else{
			$addvalue = array('wep' => $name, 'sun' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('service_ammu_report',$addvalue);	
		}*/
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	
	function osisun($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$this->db->where('bat_id',$id);
		$query = $this->db->get('osi_san');
		if ($query->num_rows() > 0){
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('rank',$name);
			$this->db->where('bat_id',$id);
			$task = $this->db->update('osi_san',$addvalue);
		}else{
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('osi_san',$addvalue);	
		}
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function osifoni($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$query = $this->db->get('osi_foni');
		$result = $query->row();
		if ($query->num_rows() > 0){
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('rank',$name);
			$task = $this->db->update('osi_foni',$addvalue);
		}else{
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('osi_foni',$addvalue);
		}
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function osipfpp($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$query = $this->db->get('osi_pfpp');
		$result = $query->row();
		if ($query->num_rows() > 0){
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('rank',$name);
			$task = $this->db->update('osi_pfpp',$addvalue);
		}else{
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('osi_pfpp',$addvalue);
		}
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function osi_nor($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$query = $this->db->get('osi_nor');
		$result = $query->row();
		if ($query->num_rows() > 0){
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('rank',$name);
			$task = $this->db->update('osi_nor',$addvalue);
		}else{
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('osi_nor',$addvalue);
		}
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function osi_nord($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$query = $this->db->get('osi_nord');
		$result = $query->row();
		if ($query->num_rows() > 0){
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('rank',$name);
			$task = $this->db->update('osi_nord',$addvalue);
		}else{
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('osi_nord',$addvalue);
		}
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function osi_ea($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$query = $this->db->get('osi_ea');
		$result = $query->row();
		if ($query->num_rows() > 0){
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('rank',$name);
			$task = $this->db->update('osi_ea',$addvalue);
		}else{
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('osi_ea',$addvalue);
		}
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function osi_vac($name,$ito,$id){
		$this->db->select('*');
		$this->db->where('rank',$name);
		$query = $this->db->get('osi_van');
		$result = $query->row();
		if ($query->num_rows() > 0){
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
			$this->db->where('rank',$name);
			$task = $this->db->update('osi_van',$addvalue);
		}else{
			$addvalue = array('rank' => $name, 'san' => $ito, 'bat_id' => $id);
		$task = $this->db->insert('osi_van',$addvalue);
		}
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	 function get_userskhcall($bats,$tpi,$orderno,$issued,$report,$limit,$start) {

			$this->db->select('bat_id,tow,bono,buno,recform,recmod,recvoc,recdate,magrec,conofwap,staofserv,unwepkot,condate,raidate,alaidate');
			if($bats !=''){
				if(is_array($bats)){
					$this->db->where_in('bat_id', $bats);		
				}else{
					$this->db->where('bat_id', $bats);		
				}
			}if($tpi !=''){
				if(is_array($tpi)){
					$this->db->where_in('tow', $tpi);		
				}else{
					$this->db->where('tow', $tpi);		
				}
			}if($orderno !=''){
			$this->db->like('bono', $orderno);
			}if($issued !=''){
				/*if($issued == 'Condemn'){
					$this->db->where('unwepkot', $issued);
				}else{*/
					$this->db->where('staofserv', $issued);
				/*}*/
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('190','165','154','113','108','160','120'));
			}
			elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('99','172','142','148','178'));
			}
			if($report == 1){
				$this->db->group_by('tow');
			}
			//$this->db->limit($limit, $start);
			$this->db->order_by('bat_id');
			$this->db->order_by('tow');
			$query = $this->db->get('old_weapon');

			//echo $this->db->last_query();
			
			if ($query->num_rows() > 0) {
			return $query->result();
			}	 
	 }

	 function get_users_countkhcall($bats,$tpi,$orderno,$issued,$report) {

	 		$this->db->select('bat_id,tow');
			if($bats !=''){
				if(is_array($bats)){
					$this->db->where_in('bat_id', $bats);		
				}else{
					$this->db->where('bat_id', $bats);		
				}
			}if($tpi !=''){
				if(is_array($tpi)){
					$this->db->where_in('tow', $tpi);
				}else{
					$this->db->where('tow', $tpi);
				}
			}if($orderno !=''){
			$this->db->like('bono', $orderno);
			}if($issued !=''){
				/*if($issued == 'Condemn'){
					$this->db->where('unwepkot', $issued);
				}else{*/
					$this->db->where('staofserv', $issued);
				/*}*/
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$this->db->where_in('bat_id',array('190','165','154','113','108','160','120'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('99','172','142','148','178'));
			}
			if($report == 1){
				//$this->db->group_by('bat_id');
			}
			$this->db->order_by('bat_id');
			$query = $this->db->get('old_weapon');
			//echo '<br>'.$this->db->last_query();
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}

	/*For battalion wise*/
	 function get_khcbat($tpi,$orderno,$rcno,$mrec,$issued) {
			$this->db->select('*');
			if($tpi !=''){
			$this->db->where('tow', $tpi);
			}if($orderno !=''){
			$this->db->where('bono', $orderno);
			}if($rcno !=''){
			$this->db->where('recform', $rcno);
			}if($mrec !=''){
			$this->db->where('magrec', $mrec);
			}if($issued !=''){
			$this->db->where('staofserv', $issued);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
                        $this->db->order_by('tow','ASC');
                        $this->db->order_by('CAST(buno AS DECIMAL)','ASC');
			//echo $this->db->last_query();
			$query = $this->db->get('old_weapon');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcbatcount($tpi,$orderno,$rcno,$mrec,$issued) {
	 		$this->db->select('*');
			if($tpi !=''){
			$this->db->where('tow', $tpi);
			}if($orderno !=''){
			$this->db->where('bono', $orderno);
			}if($rcno !=''){
			$this->db->where('recform', $rcno);
			}if($mrec !=''){
			$this->db->where('magrec', $mrec);
			}if($issued !=''){
			 $this->db->where('staofserv', $issued);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$query = $this->db->get('old_weapon');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}

	 function khcview($id) {
			$this->db->select('*');
		
			$this->db->where('wbodyno', $id);
			$query = $this->db->get('issue_arm');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcbatis($tpi,$orderno,$typeofduty,$amtype) {
			$this->db->select('*');
			if($tpi !=''){
                            $this->db->group_start();
			$this->db->like('typeofwep', $tpi);
			$this->db->or_like('abore', $tpi);
                        $this->db->group_end();
			}if($orderno !=''){
                            $this->db->group_start();
                            $this->db->where('wbodyno', $orderno);
                            $this->db->or_where('bodyno',$orderno);
                            $this->db->group_end();
			}if($typeofduty !=''){
			$this->db->where('typeofduty', $typeofduty);
			}if($amtype !=''){
			$this->db->where('atype', $amtype);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$this->db->where('istatus', 1);
                        //  $this->db->limit(15);
			$query = $this->db->get('issue_arm');
                        //  echo $this->db->last_query();
                        //die;
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcbatiscount($tpi,$orderno,$typeofduty,$amtype,$status=null) {
	 		$this->db->select('*');
			if($tpi !=''){
			$this->db->group_start();
			$this->db->like('typeofwep', $tpi);
			$this->db->or_like('abore', $tpi);
                        $this->db->group_end();
			}if($orderno !=''){
			$this->db->where('wbodyno', $orderno);
			}if($typeofduty !=''){
			$this->db->where('typeofduty', $typeofduty);
			}if($amtype !=''){
			$this->db->where('atype', $amtype);
			}
                        if($status!=null){
                            $this->db->where('istatus',$status);
                        }
			$this->db->where('bat_id', $this->session->userdata('userid'));
                        if($status!=null){
                            $this->db->where('istatus', 1);
                        }
			$query = $this->db->get('issue_arm');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}


	 function get_ckhcbatis($tpi,$orderno,$typeofduty,$amtype,$id) {
			$this->db->select('*');
			if($tpi !=''){
			$this->db->like('typeofwep', $tpi);
			}if($orderno !=''){
			$this->db->where('wbodyno', $orderno);
			}if($typeofduty !=''){
			$this->db->where('typeofduty', $typeofduty);
			}if($amtype !=''){
			$this->db->where('atype', $amtype);
			}
			$this->db->where('bat_id', $id);
			$this->db->where('istatus', 1);
			$query = $this->db->get('issue_arm');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_ckhcbatiscount($tpi,$orderno,$typeofduty,$amtype,$id) {
	 		$this->db->select('*');
			if($tpi !=''){
			$this->db->like('abore', $tpi);
			}if($orderno !=''){
			$this->db->where('wbodyno', $orderno);
			}if($typeofduty !=''){
			$this->db->where('typeofduty', $typeofduty);
			}if($amtype !=''){
			$this->db->where('atype', $amtype);
			}
			$this->db->where('bat_id', $id);
			$this->db->where('istatus', 1);
			$query = $this->db->get('issue_arm');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}


	 function get_igckhcbatis($ito,$tpi,$orderno,$typeofduty,$amtype,$limit, $start) {
			$this->db->select('*');
			if($tpi !=''){
			$this->db->like('abore', $tpi);
			}if($orderno !=''){
			$this->db->where('wbodyno', $orderno);
			}if($typeofduty !=''){
			$this->db->where('typeofduty', $typeofduty);
			}if($amtype !=''){
			$this->db->where('atype', $amtype);
			}if($ito !=''){
			$this->db->where('bat_id', $ito);
			}
			$this->db->where('istatus', 1);
			$this->db->limit($limit, $start);
			$query = $this->db->get('issue_arm');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_igckhcbatiscount($ito,$tpi,$orderno,$typeofduty,$amtype) {
	 		$this->db->select('*');
			if($tpi !=''){
			$this->db->like('abore', $tpi);
			}if($orderno !=''){
			$this->db->where('wbodyno', $orderno);
			}if($typeofduty !=''){
			$this->db->where('typeofduty', $typeofduty);
			}if($amtype !=''){
			$this->db->where('atype', $amtype);
			}if($ito !=''){
			$this->db->where('bat_id', $ito);
			}
			$this->db->where('istatus', 1);
			$query = $this->db->get('issue_arm');
			//echo $this->db->last_query(); die();
			//if ($query->num_rows() > 0) {
			return $query->num_rows();
			//}	
	}

	 function get_khcamu($tpi,$orderno){
			$this->db->select('*');			
			if($tpi !=''){
			$this->db->where('ammubore', $tpi);
			}if($orderno !=''){
			$this->db->where('recvo', $orderno);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$query = $this->db->get('newamu');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcamuissue($tpi,$wep){
			$this->db->select('*');			
			if($tpi !=''){
			$this->db->where('ammubore', $tpi);
			}if($wep !=''){
			$this->db->where('ammuwep', $wep);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$query = $this->db->get('issue_annuser');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcamuprcissue($tpi,$wep){
			$this->db->select('*');			
			if($tpi !=''){
			$this->db->where('ammubore', $tpi);
			}if($wep !=''){
			$this->db->where('ammuwep', $wep);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$query = $this->db->get('issue_amuprc');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcamucount($tpi,$orderno){
	 	$this->db->select('*');
		if($tpi !=''){
		$this->db->where('ammubore', $tpi);
		}if($orderno !=''){
		$this->db->where('recvo', $orderno);
		}
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$query = $this->db->get('newamu');
		if ($query->num_rows() > 0) {
		return $query->result();
		}	
	}
	/*Close*/

	 function get_khcamus($tpi,$orderno){
			$this->db->select('*');			
			if($tpi !=''){
			$this->db->where('ammubore', $tpi);
			}if($orderno !=''){
			$this->db->where('recvo', $orderno);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$query = $this->db->get('newamus');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcamust(){
			$this->db->select('*');			
			
			$this->db->where('bat_id', $this->session->userdata('userid'));
			$query = $this->db->get('newamus');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_khcamucounts($tpi,$orderno){
	 	$this->db->select('*');
		if($tpi !=''){
		$this->db->where('ammubore', $tpi);
		}if($orderno !=''){
		$this->db->where('recvo', $orderno);
		}
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$query = $this->db->get('newamus');
		if ($query->num_rows() > 0) {
		return $query->result();
		}	
	}
	/*Close*/

	/*For battalions Comnt start*/
	 function get_ckhcbat($tpi,$orderno,$rcno,$mrec,$issued,$report,$id) {
			$this->db->select('*');
			if($tpi !=''){
			$this->db->where('tow', $tpi);
			}if($orderno !=''){
			$this->db->like('bono', $orderno);
			}if($rcno !=''){
			$this->db->where('recvoc', $rcno);
			}if($mrec !=''){
			$this->db->where('magrec', $mrec);
			}if($issued !=''){
			$this->db->where('staofserv', $issued);
			}
			$this->db->where('bat_id',$id);
			if($report == 1){
				$this->db->group_by('tow');
			}
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query(); die();
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_ckhcbatcount($tpi,$orderno,$rcno,$mrec,$issued,$report,$id) {
	 		$this->db->select('*');
			if($tpi !=''){
			$this->db->where('tow', $tpi);
			}if($orderno !=''){
			$this->db->like('bono', $orderno);
			}if($rcno !=''){
			$this->db->where('recvoc', $rcno);
			}if($mrec !=''){
			$this->db->where('magrec', $mrec);
			}if($issued !=''){
			 $this->db->where('staofserv', $issued);
			}
			$this->db->where('bat_id',$id);
			if($report == 1){
				//$this->db->group_by('bat_id');
			}
			$query = $this->db->get('old_weapon');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	
	}

	 function get_ckhcamu($tpi,$orderno,$id){
			$this->db->select('*');			
			if($tpi !=''){
			$this->db->where('ammubore', $tpi);
			}if($orderno !=''){
			$this->db->where('recvo', $orderno);
			}
			$this->db->where('bat_id', $id);
			$query = $this->db->get('newamu');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	 function get_ckhcamucount($tpi,$orderno,$id){
	 	$this->db->select('*');
		if($tpi !=''){
		$this->db->where('ammubore', $tpi);
		}if($orderno !=''){
		$this->db->where('recvo', $orderno);
		}
		$this->db->where('bat_id', $id);
		$query = $this->db->get('newamu');
		if ($query->num_rows() > 0) {
		return $query->result();
		}	
	}

	 function get_cmt($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$id) {
			if($tpii !=''){
				 $this->db->select('*');
				 $this->db->from('newmt');
				 $this->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
					 if($cov !=''){
					$this->db->where('newmt.catofvechicle', $cov);
					}if($vc !=''){
					$this->db->where('newmt.vechicleclass', $vc);
					}if($dob1 !=''){
					$this->db->where('newmt.vechile_year', $dob1);
					}if($option !=''){
					$this->db->where('newmt.statusofvechile', $option);
					}if($vcon !=''){
					$this->db->where('newmt.vehiclecon', $vcon);
					}if($vcn !=''){
					$this->db->where('newmt.acnonac', $vcn);
					}if($bp !=''){
					$this->db->where('newmt.bp', $bp);
					}if($tpii !=''){
					$this->db->where('issue_vehicle.pod', $tpii);
					}
				$this->db->where('newmt.bat_id', $id);
				$this->db->group_by('newmt.mt_id');
				 $query = $this->db->get();
				 $info = $query->result();
				 return $info;
			}else{
				$this->db->select('*');	
				if($cov !=''){
				$this->db->where('catofvechicle', $cov);
				}if($vc !=''){
				$this->db->where('vechicleclass', $vc);
				}if($dob1 !=''){
				$this->db->where('vechile_year', $dob1);
				}if($option !=''){
				$this->db->where('statusofvechile', $option);
				}if($vcon !=''){
				$this->db->where('vehiclecon', $vcon);
				}if($vcn !=''){
				$this->db->where('acnonac', $vcn);
				}if($bp !=''){
				$this->db->where('bp', $bp);
				}
				$this->db->where('bat_id', $id);
				$query = $this->db->get('newmt');
				if ($query->num_rows() > 0) {
				return $query->result();
				}
			
			}	
	}

	 function viewmt($id) {
				$this->db->select('*');	
				$this->db->where('mt_id', $id);
				$query = $this->db->get('newmt');
				if ($query->num_rows() > 0) {
				return $query->result();
				}
	}

	 function get_cosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$limit,$start,$uniqe) {

		if($Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' || $Postingtiset4 !='' || $Postingtiset5 !='' || $Postingtiset6 !='' || $Postingtiset7 !=''  || $Postingtiset8 !=''|| $Postingtiset9 !=''){
			$this->db->select('*');
			$this->db->from('newosi');
			$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
				if($name !=''){
				 $this->db->like('newosi.name', $name);
				}if($bloodgroup !=''){
				$this->db->where('newosi.bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('newosi.depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){$this->db->where('newosi.cexrank', $eor1);}
					elseif($RankRankre == 'Ministerial Staff'){$this->db->where('newosi.cminirank', $eor2);}
						elseif($RankRankre == 'Medical Staff'){$this->db->where('newosi.cmedirank', $eor3);}
							elseif($RankRankre == 'Class-IV (P)'){$this->db->where('newosi.ccprank', $eor4);}
								elseif($RankRankre == 'Class-IV (C)'){$this->db->where('newosi.cccrank', $eor5);}
				
				}if($postate !=''){
				 $this->db->where('newosi.state', $postate);
				}if($pcity !=''){
				 $this->db->where('newosi.district', $pcity);
				}if($stts !=''){
				 $this->db->where('newosi.eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('newosi.UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('newosi.Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('newosi.PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('newosi.Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('newosi.Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('newosi.gender', $gender);
				}if($height !=''){
				 $this->db->where('newosi.feet', $height);
				}if($inch !=''){
				 $this->db->where('newosi.inch', $inch);
				}if($single !=''){
				 $this->db->where('newosi.maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('newosi.modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('newosi.rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('newosi.enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('newosi.inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('newosi.dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('newosi.comlit', $clit);
				}


				/*Posting 1*/
				if($Postingtiset =='VP Guards'){
					$this->db->where('newosip.fone1', $Postingtiset);
				}if($Postingtiset =='Jails Security'){
					$this->db->where('newosip.fone2', $Postingtiset);
				}if($Postingtiset =='Punjab Police HQRS,SEC.9,CHG'){
					$this->db->where('newosip.fone3', $Postingtiset);
				}if($Postingtiset =='DERA BEAS SECURITY DUTY'){
					$this->db->where('newosip.fone4', $Postingtiset);
				}if($Postingtiset =='OTHER STSTIC GUARDS'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}if($Postingtiset == 'Police Officer' || $Postingtiset == 'Retired Police Officer' || 
					$Postingtiset == 'Political Persons' || $Postingtiset == 'Civil Officers' ||
					 $Postingtiset == 'Judicial Officers' || $Postingtiset == 'Threatening persons' || $Postingtiset == 'PERSONAL SECURITY STAFF ARMED WING OFFICER'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}if($Postingtiset =='VIP SEC.WING CHG.U/82nd BN.'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}if($Postingtiset =='POLICE SEC.WING CHG U/13th BN.'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}if($Postingtiset =='BANK SECURITY DUTY'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}if($Postingtiset =='SPECIAL PROTECTION UNIT (C.M. SEC.)'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (SEC. DUTY)'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (RESERVE)'){
					$this->db->where('newosip.fone5', $Postingtiset);
				}/*Close 1*/

				/*Posting 2*/
				if($Postingtiset2 =='PERMANENT DUTY'){
					$this->db->where('newosip.lone1', $Postingtiset2);
				}if($Postingtiset2 =='DGP, RESERVES'){
					$this->db->where('newosip.lone2', $Postingtiset2);
				}if($Postingtiset2 =='TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY'){
					$this->db->where('newosip.lone3', $Postingtiset2);
				}/*Close 2*/

				/*Posting 3*/
				if($Postingtiset3 =='ANTI RIOT POLICE, JALANDHAR'){
					$this->db->where('newosip.sqone1', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MANSA'){
					$this->db->where('newosip.sqone2', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MUKATSAR'){
					$this->db->where('newosip.sqone3', $Postingtiset3);
				}if($Postingtiset3 =='S.D.R.F. TEAM, JALANDHAR'){
					$this->db->where('newosip.sqone4', $Postingtiset3);
				}if($Postingtiset3 =='SPL. STRIKING GROUPS'){
					$this->db->where('newosip.sqone5', $Postingtiset3);
				}if($Postingtiset3 =='SWAT TEAM (4TH CDO)'){
					$this->db->where('newosip.sqone5', $Postingtiset3);
				}if($Postingtiset3 =='SOG BHG.,PTL(SPECIAL OPS.GROUP)'){
					$this->db->where('newosip.sqone5', $Postingtiset3);
				}/*Close 3*/

				/*Posting 4*/
				if($Postingtiset4 =='ATTACHED WITH DISTT., MOHALI'){
					$this->db->where('newosip.paone1', $Postingtiset4);

				}if($Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 ==  'AD GUARD CP ASR'  || $Postingtiset4 ==  'AD GUARD DISTT MKT' || $Postingtiset4 ==  'AD GUARD DISTT LDH' || $Postingtiset4 ==  'AD GUARD DISTT BTL'){
					$this->db->where('newosip.paone22', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)'){
					$this->db->where('newosip.paone2', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)'){
					$this->db->where('newosip.paone3', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS MALE)'){
					$this->db->where('newosip.paone4', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)'){
					$this->db->where('newosip.paone5', $Postingtiset4);
				}if($Postingtiset4 =='C.P.O. ATTACHMENT UNDER 13TH BN'){
					$this->db->where('newosip.paone6', $Postingtiset4);
				}if($Postingtiset4 =='PB. POLICE OFFICER INSTITUTE SEC 32 CHG'){
					$this->db->where('newosip.paone7', $Postingtiset4);
				}if($Postingtiset4 =='NRI CELL MOHALI'){
					$this->db->where('newosip.paone8', $Postingtiset4);
				}if($Postingtiset4 =='INTELLIGENCE WING'){
					$this->db->where('newosip.paone9', $Postingtiset4);
				}if($Postingtiset4 =='CENTRAL POLICE LINE MOHALI'){
					$this->db->where('newosip.paone10', $Postingtiset4);
				}if($Postingtiset4 =='VIGILANCE BUREAU'){
					$this->db->where('newosip.paone11', $Postingtiset4);
				}if($Postingtiset4 =='STATE NARCOTIC CRIME BUREAU'){
					$this->db->where('newosip.paone12', $Postingtiset4);
				}if($Postingtiset4 =='MOHALI AIRPORT IMMIGRATION DUTY'){
					$this->db->where('newosip.paone13', $Postingtiset4);
				}if($Postingtiset4 =='STATE HUMAN RIGHTS COMMISSION'){
					$this->db->where('newosip.paone14', $Postingtiset4);
				}if($Postingtiset4 =='BUREAU OF INVESTIGATION'){
					$this->db->where('newosip.paone15', $Postingtiset4);
				}if($Postingtiset4 =='SPECIAL TASK FORCE(STF)'){
					$this->db->where('newosip.paone23', $Postingtiset4);
				}if($Postingtiset4 =='PPSSOC'){
					$this->db->where('newosip.paone24', $Postingtiset4);
				}if($Postingtiset4 =='RTC/PAP, JALANDHAR'){
					$this->db->where('newosip.paone16', $Postingtiset4);
				}if($Postingtiset4 =='ISTC/PAP, KAPURTHALA'){
					$this->db->where('newosip.paone17', $Postingtiset4);
				}if($Postingtiset4 =='POLICE COMMANDO TRG. CENTRE, BHG, PATIALA'){
					$this->db->where('newosip.paone18', $Postingtiset4);
				}if($Postingtiset4 =='RTC LADDA KOTHI SANGRUR'){
					$this->db->where('newosip.paone19', $Postingtiset4);
				}if($Postingtiset4 =='PUNJAB POLICE ACADEMY PHILLAUR'){
					$this->db->where('newosip.paone20', $Postingtiset4);
				}if($Postingtiset4 =='POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN'){
					$this->db->where('newosip.paone21', $Postingtiset4);
				}if($Postingtiset4 =='ERSS PROJECT DIAL 112'){
					$this->db->like('newosip.paone27', $Postingtiset4);
				}/*Close 4*/

				/*Posting 5*/
				if($Postingtiset5 =='BASIC TRANING'){
					$this->db->where('newosip.traning1', $Postingtiset5);
				}if($Postingtiset5 =='PROMOTIONAL COURSE'){
					$this->db->where('newosip.traning2', $Postingtiset5);
				}if($Postingtiset5 =='DEPARTMENT COURSE'){
					$this->db->where('newosip.traning3', $Postingtiset5);
				}/*Close 5*/

				/*Posting 6*/
				if($Postingtiset6 =='DSO'){
					$this->db->like('newosip.ssone23', $Postingtiset6);
				}if($Postingtiset6 =='CSO, JALANDHAR'){
					$this->db->like('newosip.ssone24', $Postingtiset6);
				}if($Postingtiset6 =='PROMOTIONAL COURSE'){
					$this->db->like('newosip.ssone25', $Postingtiset6);
				}if($Postingtiset6 =='OTHERS'){
					$this->db->like('newosip.ssone26', $Postingtiset6);
				}/*Close 6*/

				/*Posting 7*/
				if($Postingtiset7 =='PAP CAMPUS  SECURITY' || $Postingtiset7 =='BN. KOT GUARDS' || $Postingtiset7 =='BN. HQRS OTHER GUARDS' || $Postingtiset7 == 'STATIC GUARD CR'){
					$this->db->where('newosip.awbone1', $Postingtiset7);
				}if($Postingtiset7 =='OFFICE STAFF IN HIGHER OFFICES'){
					$this->db->where('newosip.awbone3', $Postingtiset7);
				}if($Postingtiset7 == 'Commandant office' ||  $Postingtiset7 == 'Asstt. Comdt. office' || $Postingtiset7 == 'Dy.S.P. office' || $Postingtiset7 == 'English Branch' || $Postingtiset7 == 'Account Branch' || $Postingtiset7 == 'OSI Branch' || $Postingtiset7 == 'Litigation Branch' || $Postingtiset7 == 'Steno Branch'|| $Postingtiset7 =='GPF Branch' || $Postingtiset7 == 'Computer Cell' || $Postingtiset7 == 'Control Room' || $Postingtiset7 =='Reader to INSP' || $Postingtiset7 =='CCTNS office' || $Postingtiset7 =='Nodal Officer' || $Postingtiset7 =='Recruitment Cell' || $Postingtiset7 == 'Photostate Machine operator'){
					$this->db->where('newosip.awbone4', $Postingtiset7);
				}if($Postingtiset7 =='TRADEMEN'){
					$this->db->where('newosip.awbone7', $Postingtiset7);
				}if($Postingtiset7 =='M.T. SECTION'){
					$this->db->where('newosip.awbone8', $Postingtiset7);
				}if($Postingtiset7 =='Armourer & A/Armourer'){
					$this->db->where('newosip.awbone13', $Postingtiset7);
				}if($Postingtiset7 == 'Reserve Inspector' || $Postingtiset7 == 'Line Officer' || $Postingtiset7 == 'BHM & A/BHM' || $Postingtiset7 == 'MHC & A/MHC' || $Postingtiset7 == 'Reader/Orderly to RI' || $Postingtiset7 == 'I/C MESS' || $Postingtiset7 =='Asst. I/C MESS' || $Postingtiset7 == 'CDI' || $Postingtiset7 =='CDO & A/CDO' || $Postingtiset7 == 'Quarter Master INSP' || $Postingtiset7 =='MSK Branch' || $Postingtiset7 =='KHC' || $Postingtiset7 == 'I/C Class-IV' || $Postingtiset7 =='Quarter Munshi & Asstt.' || $Postingtiset7 == 'Quarter Munshi & Asstt.' || $Postingtiset7 =='I/C Canteen & Grossary Shop' || $Postingtiset7 =='CHC'){
					$this->db->where('newosip.awbone9', $Postingtiset7);
				}if($Postingtiset7 =='GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY'){
					$this->db->where('newosip.awbone10', $Postingtiset7);
				}if($Postingtiset7 =='TRG. RESERVE AT BN.HQRS.'){
					$this->db->where('newosip.awbone11', $Postingtiset7);
				}if($Postingtiset7 =='OTHER DUTIES'){
					$this->db->where('newosip.awbone12', $Postingtiset7);
				}/*Close 7*/

				/*Posting 8*/
				if($Postingtiset8 =='RECRUIT'){
					$this->db->like('newosip.bmdone1', $Postingtiset8);
				}if($Postingtiset8 =='Earned Leave' || $Postingtiset8 =='Casual Leave' || $Postingtiset8 =='Paternity Leave' || $Postingtiset8 =='Medical Leave' || $Postingtiset8 =='Ex-India Leave' || $Postingtiset8 =='Others' ||   $Postingtiset8 =='Handicapped on Medical Rest' ){ 
					$this->db->like('newosip.bmdone2', $Postingtiset8);
				}if($Postingtiset8 =='ABSENT'){
					$this->db->like('newosip.bmdone3', $Postingtiset8);
				}if($Postingtiset8 =='UNDER SUSPENSION'){
					$this->db->like('newosip.bmdone4', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on Medical Rest'){
					$this->db->like('newosip.bmdone5', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on light duty'){
					$this->db->like('newosip.bmdone6', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on light duty'){
					$this->db->like('newosip.bmdone8', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on Medical Rest'){
					$this->db->like('newosip.bmdone7', $Postingtiset8);
				}if($Postingtiset8 =='OSD ETC'){
					$this->db->like('newosip.bmdone9', $Postingtiset8);
				}/*Close 8*/

				/*Posting 9*/
				if($Postingtiset9 =='PRINTING PRESS' || $Postingtiset9 == 'PHOTOGRAPHY CELL' || $Postingtiset9 =='ART GALLERY' || $Postingtiset9 =='WIRELESS SECTION'|| $Postingtiset9 =='DUPLEX' || $Postingtiset9 =='PAP HOSPITAL' || $Postingtiset9 =='GRIEVANCES REDRESSAL CELL' || $Postingtiset9 =='GOLF CLUB' || $Postingtiset9 =='GOLF RANGE' || $Postingtiset9 =='GAZETTED OFFICERS MESS' || $Postingtiset9 =='MINI GOS MESS' || $Postingtiset9 == 'B.M.STAFF' || $Postingtiset9 == 'SEWERAGE AND SANITATION' || $Postingtiset9 =='B.D. TEAM' || $Postingtiset9 == 'ELECTRICITY WING' || $Postingtiset9 == 'PIPE BAND' || $Postingtiset9 =='BRASS BAND' || $Postingtiset9 =='MOUNTED POLICE' || $Postingtiset9 =='RE-BROWNING WORKSHOP' || $Postingtiset9 == 'BASE WORKSHOP' || $Postingtiset9 == 'PAP GAS AGENCY'|| $Postingtiset9 =='TEAR GAS SQUAD' || $Postingtiset9 =='EMPTY CATRIDGE CELL' || $Postingtiset9 == 'CABLE NETWORK' || $Postingtiset9 =='GURUDWARA SAHIB PAP CAMPUS' || $Postingtiset9 =='COUNSELLING AND CARRIER GUIDANCE CENTRE' || $Postingtiset9 =='PAP BOOK SHOP' || $Postingtiset9 =='COMPUTER HARDWARE CELL' || $Postingtiset9 =='PAP WEBSITE' || $Postingtiset9 =='COMPUTER TRG. CENTRE' || $Postingtiset9 =='LADIES WELFARE CENTRE &  MULTIPURPOSE HALL'|| $Postingtiset9 =='PAPCOS' || $Postingtiset9 =='SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV  SCHOOL' || $Postingtiset9 =='B.P. UNIT' || $Postingtiset9 =='BEAUTIFICATION STAFF' || $Postingtiset9 =='R.P.STAFF' || $Postingtiset9 =='SPECIAL GUARD' || $Postingtiset9 =='CO-OPERATIVE STORE' || $Postingtiset9 =='CULTURAL TROUP' || $Postingtiset9 =='APNA DHABA' || $Postingtiset9 =='SHIV SHAKTI MANDIR' || $Postingtiset9 =='SONA BATH' || $Postingtiset9 == 'SWIMMING POOL 25 MTR'|| $Postingtiset9 =='BAKERY' || $Postingtiset9 =='TECHNICAL TEAM'|| $Postingtiset9 =='PAP GYM. NEW' || $Postingtiset9 =='PAP GYM. OLD' || $Postingtiset9 =='ACUPRESSURE' || $Postingtiset9 =='SPORTS CAFE,MILK BAR & JUICE BAR PAP' || $Postingtiset9 =='INDOOR STADIUM' || $Postingtiset9 =='PAP  SHOOTING RANGE' || $Postingtiset9 =='BUGGLER' || $Postingtiset9 =='T/A 7th Bn PAP for Driver Duty' || $Postingtiset9 =='U/7th PAP for out Rider duty on Motor Cycle' || $Postingtiset9 =='M.T WORKSHOP U/7th BN PAP' || $Postingtiset9 =='PAP House' || $Postingtiset9 =='Camp Cleaning U/7th BN.PAP' || $Postingtiset9 == 'A/A Punjab State U/7th BN.PAP'){
					$this->db->where('newosip.10', $Postingtiset9);
					}if($Postingtiset9 =='IRB Institutions'){
						$this->db->where('newosip.instone1', $Postingtiset9);
					}if($Postingtiset9 =='PAP Outer Bn Institutions'){
						$this->db->where('newosip.instone3', $Postingtiset8);
					}if($Postingtiset9 =='CDO Institutions'){
						$this->db->where('newosip.instone2', $Postingtiset9);
					}/*close 9*/

				
				$this->db->where('newosi.bat_id', $uniqe);
				$this->db->where('newosi.uid', 0);
				 if($start == '0'){
			 	$this->db->limit($limit);
				 }else{
				 	$this->db->limit($limit, $start);
				 }
				$query = $this->db->get();
				//echo $this->db->last_query(); die();
				if ($query->num_rows() > 0) {
				return $query->result();
				}


		}else{
			$this->db->select('*');
	 			if($name !=''){
			 $this->db->like('name', $name);
			}if($bloodgroup !=''){
			$this->db->where('bloodgroup', $bloodgroup);
			}if($rcnum !=''){
			$this->db->like('depttno', $rcnum);
			}if($RankRankre !=''){
				if($RankRankre == 'Executive Staff'){$this->db->where('cexrank', $eor1);}
				elseif($RankRankre == 'Ministerial Staff'){$this->db->where('cminirank', $eor2);}
					elseif($RankRankre == 'Medical Staff'){$this->db->where('cmedirank', $eor3);}
						elseif($RankRankre == 'Class-IV (P)'){$this->db->where('ccprank', $eor4);}
							elseif($RankRankre == 'Class-IV (C)'){$this->db->where('cccrank', $eor5);}
			
			}if($postate !=''){
			 $this->db->where('state', $postate);
			}if($pcity !=''){
			 $this->db->where('district', $pcity);
			}if($stts !=''){
			 $this->db->where('eduqalification', $stts);
			}
				if($stts =='Under Graduate'){
			 		$this->db->where('UnderGraduate', $UnderGraduate);
				}elseif($stts =='Graduate'){
					$this->db->where('Graduate', $Graduate);
				}elseif($stts =='Post Graduate'){
					$this->db->where('PostGraduate', $PostGraduate);
				}elseif($stts =='Doctorate'){
					$this->db->where('Doctorate', $Doctorate);
				}elseif($stts =='Other'){
					$this->db->where('Doctorateother !=', '');
				}
			if($gender !=''){
			 $this->db->where('gender', $gender);
			}if($height !=''){
			 $this->db->where('feet', $height);
			}if($inch !=''){
			 $this->db->where('inch', $inch);
			}if($single !=''){
			 $this->db->where('maritalstatus', $single);
			}if($Modemdr !=''){
			 $this->db->where('modeofrec', $Modemdr);
			}if($Rankre !=''){
			 $this->db->where('rankofenlistment', $Rankre);
			}if($Enlistmentec !=''){
			 $this->db->where('enlistmentcat', $Enlistmentec);
			}if($InductionModeim !=''){
			 $this->db->where('inductionmode', $InductionModeim);
			}if($dateofesnlistment1 !=''){
			 $this->db->where('dateofinlitment >=', $dateofesnlistment1);
			 $this->db->where('dateofinlitment <=', $dateofesnlistment2);
			}if($dateofbirth !=''){
			 $this->db->where('dateofbith >=', $dateofbirth);
			 $this->db->where('dateofbith <=', $dateofbirthi);
			}if($NamesofsCourses !=''){
			 $this->db->like('NamesofsCourses', $NamesofsCourses);
			}if($NamesofsCourses2 !=''){
			 $this->db->like('NamesofsCourses', $NamesofsCourses2);
			}if($DateofRetirementdor !=''){
			 $this->db->where('dateofretirment', $DateofRetirementdor);
			}if($clit !=''){
			 $this->db->where('comlit', $clit);
			}
			$this->db->where('bat_id', $uniqe);
			$this->db->where('uid', 0);
			$this->db->limit($limit, $start);
			$query = $this->db->get('newosi');
			if ($query->num_rows() > 0) {
			return $query->result();
			}	

		}
	}

	 function get_cmsk($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$ircdi,$idi,$report,$limit,$start,$uniqe) {
	 	if($report == 'Reports'){
			$this->db->select('*');
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($cti !=''){
			$this->db->where('catofitem', $cti);
			}if($option !=''){
			$this->db->where('status', $option);
			}if($Receivedfrom !=''){
			 $this->db->where('recfrom', $Receivedfrom);
			}if($rcnum !=''){
			 $this->db->where('rc_number', $rcnum);
			}if($fname !=''){
			 $this->db->where('fund_name', $fname);
			}if($gfund !=''){
			 $this->db->where('govt_fund', $gfund);
			}if($ofname !=''){
			 $this->db->where('other_fund', $ofname);
			}if($run !=''){
			 $this->db->where('firm_name', $run);
			}if($billno !=''){
			 $this->db->where('billno', $billno);
			}if($paysta !=''){
			 $this->db->where('payment_status', $paysta);
			}if($issumemode !=''){
			 $this->db->where('issue_mode', $issumemode);
			}if($nop !=''){
			 $this->db->where('officer', $nop);
			}if($hn !=''){
			 $this->db->where('manpower', $hn);
			}if($obito !=''){
			 $this->db->where('other_battalion', $obito);
			}if($ito !=''){
			 $this->db->where('self_battalion', $ito);
			}if($run !=''){
			 $this->db->where('reparing_unit', $run);
			}if($issuercnum !=''){
			 $this->db->where('issue_rc_no', $issuercnum);
			}if($ircd !=''){
			 $this->db->where('issue_date >=', $ircd);
			}if($id !=''){
			 $this->db->where('issue_date <=', $id);
			}
			if($mod !=''){
			 $this->db->where('mode_of_deposit', $mod);
			}if($drbircn !=''){
			 $this->db->where('deposit_bill', $drbircn);
			}if($ircdi !=''){
			 $this->db->where('deposit_date >=', $ircdi);
			}if($idi !=''){
			 $this->db->where('deposit_date <=', $idi);
			}
			$this->db->where('bat_id', $uniqe);
			$this->db->limit($limit, $start);
			$query = $this->db->get('newmsk');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	} else{
	 		$this->db->select('*');
			$this->db->where('bat_id',8);
	 		//$this->db->limit($limit, $start);
			$query = $this->db->get('newmsk');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	}	
   }

    function get_cmskcount($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$idi,$ircdi,$report,$uniqe) {
	 		if($report == 'Reports'){
			$this->db->select('*');
			if($toi !=''){
			$this->db->where('typeofitem', $toi);
			}if($nameofitem !=''){
			$this->db->where('nameofitem', $nameofitem);
			}if($cti !=''){
			$this->db->where('catofitem', $cti);
			}if($option !=''){
			$this->db->where('status', $option);
			}if($Receivedfrom !=''){
			 $this->db->where('recfrom', $Receivedfrom);
			}if($rcnum !=''){
			 $this->db->where('rc_number', $rcnum);
			}if($fname !=''){
			 $this->db->where('fund_name', $fname);
			}if($gfund !=''){
			 $this->db->where('govt_fund', $gfund);
			}if($ofname !=''){
			 $this->db->where('other_fund', $ofname);
			}if($run !=''){
			 $this->db->where('firm_name', $run);
			}if($billno !=''){
			 $this->db->where('billno', $billno);
			}if($paysta !=''){
			 $this->db->where('payment_status', $paysta);
			}if($issumemode !=''){
			 $this->db->where('issue_mode', $issumemode);
			}if($nop !=''){
			 $this->db->where('officer', $nop);
			}if($hn !=''){
			 $this->db->where('manpower', $hn);
			}if($obito !=''){
			 $this->db->where('other_battalion', $obito);
			}if($ito !=''){
			 $this->db->where('self_battalion', $ito);
			}if($run !=''){
			 $this->db->where('reparing_unit', $run);
			}if($issuercnum !=''){
			 $this->db->where('issue_rc_no', $issuercnum);
			}if($ircd !=''){
			 $this->db->where('issue_date >=', $ircd);
			}if($id !=''){
			 $this->db->where('issue_date <=', $id);
			}if($mod !=''){
			 $this->db->where('mode_of_deposit', $mod);
			}if($drbircn !=''){
			 $this->db->where('deposit_bill', $drbircn);
			}if($ircdi !=''){
			 $this->db->where('deposit_date >=', $ircdi);
			}if($idi !=''){
			 $this->db->where('deposit_date <=', $idi);
			}
			$this->db->where('bat_id', $uniqe);
			$query = $this->db->get('newmsk');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
			return false;
		 	} else{
		 		$this->db->select('*');
				$this->db->where('bat_id', 8);
				$query = $this->db->get('newmsk');
				if ($query->num_rows() > 0) {
				return $query->result();
				}
				return false;
		 	} 	
	}

	 function get_usersosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$limit,$start,$uniqe,$mobno) {

		if($Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' ||  $Postingtiset4 !='' || $Postingtiset5 !='' || $Postingtiset6 !=''  || $Postingtiset7 !='' ||  $Postingtiset8 !='' || $Postingtiset9 !=''){

			$this->db->select('*');
			$this->db->from('newosi');
			$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
				
				if($mobno !=''){
				 $this->db->like('newosi.phono1', $mobno);
				}
				if($name !=''){
				 $this->db->like('newosi.name', $name);
				}if($bloodgroup !=''){
				$this->db->where('newosi.bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('newosi.depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){$this->db->where('newosi.cexrank', $eor1);}
					elseif($RankRankre == 'Ministerial Staff'){$this->db->where('newosi.cminirank', $eor2);}
						elseif($RankRankre == 'Medical Staff'){$this->db->where('newosi.cmedirank', $eor3);}
							elseif($RankRankre == 'Class-IV (P)'){$this->db->where('newosi.ccprank', $eor4);}
								elseif($RankRankre == 'Class-IV (C)'){$this->db->where('newosi.cccrank', $eor5);}
				
				}if($postate !=''){
				 $this->db->where('newosi.state', $postate);
				}if($pcity !=''){
				 $this->db->where('newosi.district', $pcity);
				}if($stts !=''){
				 $this->db->where('newosi.eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('newosi.UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('newosi.Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('newosi.PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('newosi.Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('newosi.Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('newosi.gender', $gender);
				}if($height !=''){
				 $this->db->where('newosi.feet', $height);
				}if($inch !=''){
				 $this->db->where('newosi.inch', $inch);
				}if($single !=''){
				 $this->db->where('newosi.maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('newosi.modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('newosi.rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('newosi.enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('newosi.inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('newosi.dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('newosi.comlit', $clit);
				}if($p !=''){
				 $this->db->where('newosi.typeofduty', $p);
				}

				/*Posting 1*/
				if($Postingtiset =='VP Guards'){
					$this->db->like('newosip.fone1', $Postingtiset);
				}if($Postingtiset =='Jails Security'){
					$this->db->like('newosip.fone2', $Postingtiset);
				}if($Postingtiset =='Punjab Police HQRS,SEC.9,CHG'){
					$this->db->like('newosip.fone3', $Postingtiset);
				}if($Postingtiset =='DERA BEAS SECURITY DUTY'){
					$this->db->like('newosip.fone4', $Postingtiset);
				}if($Postingtiset =='OTHER STATIC GUARDS'){
					$this->db->like('newosip.fone5', $Postingtiset);
				}if($Postingtiset == 'Police Officer' || $Postingtiset == 'Retired Police Officer' || 
					$Postingtiset == 'Political Persons' || $Postingtiset == 'Civil Officers' ||
					 $Postingtiset == 'Judicial Officers' || $Postingtiset == 'Threatening persons' || $Postingtiset == 'PERSONAL SECURITY STAFF ARMED WING OFFICER'){
					$this->db->like('newosip.fone6', $Postingtiset);
				}if($Postingtiset =='VIP SEC.WING CHG.U/82nd BN.'){
					$this->db->like('newosip.fone7', $Postingtiset);
				}if($Postingtiset =='POLICE SEC.WING CHG U/13th BN.'){
					$this->db->like('newosip.fone8', $Postingtiset);
				}if($Postingtiset =='BANK SECURITY DUTY'){
					$this->db->like('newosip.fone9', $Postingtiset);
				}if($Postingtiset =='SPECIAL PROTECTION UNIT (C.M. SEC.)'){
					$this->db->like('newosip.fone10', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (SEC. DUTY)'){
					$this->db->like('newosip.fone11', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (RESERVE)'){
					$this->db->like('newosip.fone12', $Postingtiset);
				}/*Close 1*/

				/*Posting 2*/
				if($Postingtiset2 =='PERMANENT DUTY'){
					$this->db->like('newosip.lone1', $Postingtiset2);
				}if($Postingtiset2 =='DGP, RESERVES'){
					$this->db->like('newosip.lone2', $Postingtiset2);
				}if($Postingtiset2 =='TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY'){
					$this->db->like('newosip.lone3', $Postingtiset2);
				}/*Close 2*/

				/*Posting 3*/
				if($Postingtiset3 =='ANTI RIOT POLICE, JALANDHAR'){
					$this->db->like('newosip.sqone1', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MANSA'){
					$this->db->like('newosip.sqone2', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MUKATSAR'){
					$this->db->like('newosip.sqone3', $Postingtiset3);
				}if($Postingtiset3 =='S.D.R.F. TEAM, JALANDHAR'){
					$this->db->like('newosip.sqone4', $Postingtiset3);
				}if($Postingtiset3 =='SPL. STRIKING GROUPS'){
					$this->db->like('newosip.sqone5', $Postingtiset3);
				}if($Postingtiset3 =='SWAT TEAM (4TH CDO)'){
					$this->db->like('newosip.sqone6', $Postingtiset3);
				}if($Postingtiset3 =='SOG BHG.,PTL(SPECIAL OPS.GROUP)'){
					$this->db->like('newosip.sqone7', $Postingtiset3);
				}if($Postingtiset3 =='UNMANNED AERIAL VEHICLE (UAV)'){
					$this->db->like('newosip.sqone8', $Postingtiset3);
				}/*Close 3*/

				/*Posting 4*/
				if($Postingtiset4 =='ATTACHED WITH DISTT., MOHALI'){
					$this->db->like('newosip.paone1', $Postingtiset4);

				}if($Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 ==  'AD GUARD CP ASR'  || $Postingtiset4 ==  'AD GUARD DISTT MKT' || $Postingtiset4 ==  'AD GUARD DISTT LDH' || $Postingtiset4 ==  'AD GUARD DISTT BTL'){
					$this->db->like('newosip.paone22', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)'){
					$this->db->like('newosip.paone2', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)'){
					$this->db->like('newosip.paone3', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS MALE)'){
					$this->db->like('newosip.paone4', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)'){
					$this->db->like('newosip.paone5', $Postingtiset4);
				}if($Postingtiset4 =='C.P.O. ATTACHMENT UNDER 13TH BN'){
					$this->db->like('newosip.paone6', $Postingtiset4);
				}if($Postingtiset4 =='PB. POLICE OFFICER INSTITUTE SEC 32 CHG'){
					$this->db->like('newosip.paone7', $Postingtiset4);
				}if($Postingtiset4 =='NRI CELL MOHALI'){
					$this->db->like('newosip.paone8', $Postingtiset4);
				}if($Postingtiset4 =='INTELLIGENCE WING'){
					$this->db->like('newosip.paone9', $Postingtiset4);
				}if($Postingtiset4 =='CENTRAL POLICE LINE MOHALI'){
					$this->db->like('newosip.paone10', $Postingtiset4);
				}if($Postingtiset4 =='VIGILANCE BUREAU'){
					$this->db->like('newosip.paone11', $Postingtiset4);
				}if($Postingtiset4 =='STATE NARCOTIC CRIME BUREAU'){
					$this->db->like('newosip.paone12', $Postingtiset4);
				}if($Postingtiset4 =='MOHALI AIRPORT IMMIGRATION DUTY'){
					$this->db->like('newosip.paone13', $Postingtiset4);
				}if($Postingtiset4 =='STATE HUMAN RIGHTS COMMISSION'){
					$this->db->like('newosip.paone14', $Postingtiset4);
				}if($Postingtiset4 =='BUREAU OF INVESTIGATION'){
					$this->db->like('newosip.paone15', $Postingtiset4);
				}if($Postingtiset4 =='SPECIAL TASK FORCE(STF)'){
					$this->db->like('newosip.paone23', $Postingtiset4);
				}if($Postingtiset4 =='PPSSOC'){
					$this->db->like('newosip.paone24', $Postingtiset4);
				}if($Postingtiset4 =='RTC/PAP, JALANDHAR'){
					$this->db->like('newosip.paone16', $Postingtiset4);
				}if($Postingtiset4 =='ISTC/PAP, KAPURTHALA'){
					$this->db->like('newosip.paone17', $Postingtiset4);
				}if($Postingtiset4 =='POLICE COMMANDO TRG. CENTRE, BHG, PATIALA'){
					$this->db->like('newosip.paone18', $Postingtiset4);
				}if($Postingtiset4 =='RTC LADDA KOTHI SANGRUR'){
					$this->db->like('newosip.paone19', $Postingtiset4);
				}if($Postingtiset4 =='PUNJAB POLICE ACADEMY PHILLAUR'){
					$this->db->like('newosip.paone20', $Postingtiset4);
				}if($Postingtiset4 =='POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN'){
					$this->db->like('newosip.paone21', $Postingtiset4);
				}if($Postingtiset4 =='ERSS PROJECT DIAL 112'){
					$this->db->like('newosip.paone27', $Postingtiset4);
				}/*Close 4*/

				/*Posting 5*/
				if($Postingtiset5 =='BASIC TRANING'){
					$this->db->like('newosip.traning1', $Postingtiset5);
				}if($Postingtiset5 =='PROMOTIONAL COURSE'){
					$this->db->like('newosip.traning2', $Postingtiset5);
				}if($Postingtiset5 =='DEPARTMENT COURSE'){
					$this->db->like('newosip.traning3', $Postingtiset5);
				}/*Close 5*/

				/*Posting 6*/
				if($Postingtiset6 =='DSO'){
					$this->db->like('newosip.ssone23', $Postingtiset6);
				}if($Postingtiset6 =='CSO, JALANDHAR'){
					$this->db->like('newosip.ssone24', $Postingtiset6);
				}if($Postingtiset6 =='NIS PATIALA'){
					$this->db->like('newosip.ssone25', $Postingtiset6);
				}if($Postingtiset6 =='OTHERS'){
					$this->db->like('newosip.ssone26', $Postingtiset6);
				}/*Close 6*/

				/*Posting 7*/
				if($Postingtiset7 =='PAP CAMPUS  SECURITY' || $Postingtiset7 =='BN. KOT GUARDS' || $Postingtiset7 =='BN. HQRS OTHER GUARDS' || $Postingtiset7 == 'STATIC GUARD CR'){
					$this->db->like('newosip.awbone1', $Postingtiset7);
				}if($Postingtiset7 =='OFFICE STAFF IN HIGHER OFFICES'){
					$this->db->like('newosip.awbone3', $Postingtiset7);
				}if($Postingtiset7 == 'Commandant office' ||  $Postingtiset7 == 'Asstt. Comdt. office' || $Postingtiset7 == 'Dy.S.P. office' || $Postingtiset7 == 'English Branch' || $Postingtiset7 == 'Account Branch' || $Postingtiset7 == 'OSI Branch' || $Postingtiset7 == 'Litigation Branch' || $Postingtiset7 == 'Steno Branch'|| $Postingtiset7 =='GPF Branch' || $Postingtiset7 == 'Computer Cell' || $Postingtiset7 == 'Control Room' || $Postingtiset7 =='Reader to INSP' || $Postingtiset7 =='CCTNS office' || $Postingtiset7 =='Nodal Officer' || $Postingtiset7 =='Recruitment Cell' || $Postingtiset7 == 'Photostate Machine operator'){
					$this->db->like('newosip.awbone4', $Postingtiset7);
				}if($Postingtiset7 =='TRADEMEN'){
					$this->db->like('newosip.awbone7', $Postingtiset7);
				}if($Postingtiset7 =='M.T. SECTION'){
					$this->db->like('newosip.awbone8', $Postingtiset7);
				}if($Postingtiset7 =='Armourer & A/Armourer'){
					$this->db->like('newosip.awbone13', $Postingtiset7);
				}if($Postingtiset7 == 'Reserve Inspector' || $Postingtiset7 == 'Line Officer' || $Postingtiset7 == 'BHM & A/BHM' || $Postingtiset7 == 'MHC & A/MHC' || $Postingtiset7 == 'Reader/Orderly to RI' || $Postingtiset7 == 'I/C MESS' || $Postingtiset7 =='Asst. I/C MESS' || $Postingtiset7 == 'CDI' || $Postingtiset7 =='CDO & A/CDO' || $Postingtiset7 == 'Quarter Master INSP' || $Postingtiset7 =='MSK Branch' || $Postingtiset7 =='KHC' || $Postingtiset7 == 'I/C Class-IV' || $Postingtiset7 =='Quarter Munshi & Asstt.' || $Postingtiset7 == 'Quarter Munshi & Asstt.' || $Postingtiset7 =='I/C Canteen & Grossary Shop' || $Postingtiset7 =='CHC'){
					$this->db->like('newosip.awbone9', $Postingtiset7);
				}if($Postingtiset7 =='GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY'){
					$this->db->like('newosip.awbone10', $Postingtiset7);
				}if($Postingtiset7 =='TRG. RESERVE AT BN.HQRS.'){
					$this->db->like('newosip.awbone11', $Postingtiset7);
				}if($Postingtiset7 =='OTHER DUTIES'){
					$this->db->like('newosip.awbone12', $Postingtiset7);
				}/*Close 7*/

				/*Posting 8*/
				if($Postingtiset8 =='RECRUIT'){
					$this->db->like('newosip.bmdone1', $Postingtiset8);
				}if($Postingtiset8 =='Earned Leave' || $Postingtiset8 =='Casual Leave' || $Postingtiset8 =='Paternity Leave' || $Postingtiset8 =='Medical Leave' || $Postingtiset8 =='Ex-India Leave' || $Postingtiset8 =='Others' ||   $Postingtiset8 =='Handicapped on Medical Rest' ){ 
					$this->db->like('newosip.bmdone2', $Postingtiset8);
				}if($Postingtiset8 =='ABSENT'){
					$this->db->like('newosip.bmdone3', $Postingtiset8);
				}if($Postingtiset8 =='UNDER SUSPENSION'){
					$this->db->like('newosip.bmdone4', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on Medical Rest'){
					$this->db->like('newosip.bmdone5', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on light duty'){
					$this->db->like('newosip.bmdone6', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on light duty'){
					$this->db->like('newosip.bmdone8', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on Medical Rest'){
					$this->db->like('newosip.bmdone7', $Postingtiset8);
				}if($Postingtiset8 =='OSD ETC'){
					$this->db->like('newosip.bmdone9', $Postingtiset8);
				}/*Close 8*/

				/*Posting 9*/
				if($Postingtiset9 =='PRINTING PRESS' || $Postingtiset9 == 'PHOTOGRAPHY CELL' || $Postingtiset9 =='ART GALLERY' || $Postingtiset9 =='WIRELESS SECTION'|| $Postingtiset9 =='DUPLEX' || $Postingtiset9 =='PAP HOSPITAL' || $Postingtiset9 =='GRIEVANCES REDRESSAL CELL' || $Postingtiset9 =='GOLF CLUB' || $Postingtiset9 =='GOLF RANGE' || $Postingtiset9 =='GAZETTED OFFICERS MESS' || $Postingtiset9 =='MINI GOS MESS' || $Postingtiset9 == 'B.M.STAFF' || $Postingtiset9 == 'SEWERAGE AND SANITATION' || $Postingtiset9 =='B.D. TEAM' || $Postingtiset9 == 'ELECTRICITY WING' || $Postingtiset9 == 'PIPE BAND' || $Postingtiset9 =='BRASS BAND' || $Postingtiset9 =='MOUNTED POLICE' || $Postingtiset9 =='RE-BROWNING WORKSHOP' || $Postingtiset9 == 'BASE WORKSHOP' || $Postingtiset9 == 'PAP GAS AGENCY'|| $Postingtiset9 =='TEAR GAS SQUAD' || $Postingtiset9 =='EMPTY CATRIDGE CELL' || $Postingtiset9 == 'CABLE NETWORK' || $Postingtiset9 =='GURUDWARA SAHIB PAP CAMPUS' || $Postingtiset9 =='COUNSELLING AND CARRIER GUIDANCE CENTRE' || $Postingtiset9 =='PAP BOOK SHOP' || $Postingtiset9 =='COMPUTER HARDWARE CELL' || $Postingtiset9 =='PAP WEBSITE' || $Postingtiset9 =='COMPUTER TRG. CENTRE' || $Postingtiset9 =='LADIES WELFARE CENTRE &  MULTIPURPOSE HALL'|| $Postingtiset9 =='PAPCOS' || $Postingtiset9 =='SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV  SCHOOL' || $Postingtiset9 =='B.P. UNIT' || $Postingtiset9 =='BEAUTIFICATION STAFF' || $Postingtiset9 =='R.P.STAFF' || $Postingtiset9 =='SPECIAL GUARD' || $Postingtiset9 =='CO-OPERATIVE STORE' || $Postingtiset9 =='CULTURAL TROUP' || $Postingtiset9 =='APNA DHABA' || $Postingtiset9 =='SHIV SHAKTI MANDIR' || $Postingtiset9 =='SONA BATH' || $Postingtiset9 == 'SWIMMING POOL 25 MTR'|| $Postingtiset9 =='BAKERY' || $Postingtiset9 =='TECHNICAL TEAM'|| $Postingtiset9 =='PAP GYM. NEW' || $Postingtiset9 =='PAP GYM. OLD' || $Postingtiset9 =='ACUPRESSURE' || $Postingtiset9 =='SPORTS CAFE,MILK BAR & JUICE BAR PAP' || $Postingtiset9 =='INDOOR STADIUM' || $Postingtiset9 =='PAP  SHOOTING RANGE' || $Postingtiset9 =='BUGGLER' || $Postingtiset9 =='T/A 7th Bn PAP for Driver Duty' || $Postingtiset9 =='U/7th PAP for out Rider duty on Motor Cycle' || $Postingtiset9 =='M.T WORKSHOP U/7th BN PAP' || $Postingtiset9 =='PAP House' || $Postingtiset9 =='Camp Cleaning U/7th BN.PAP' || $Postingtiset9 == 'A/A Punjab State U/7th BN.PAP'){
					$this->db->like('newosip.instone10', $Postingtiset9);
					}if($Postingtiset9 =='IRB Institutions'){
						$this->db->like('newosip.instone1', $Postingtiset9);
					}if($Postingtiset9 =='PAP Outer Bn Institutions'){
						$this->db->like('newosip.instone3', $Postingtiset8);
					}if($Postingtiset9 =='CDO Institutions'){
						$this->db->like('newosip.instone2', $Postingtiset9);
					}/*close 9*/

				
				$this->db->where('newosi.bat_id', $uniqe);
				$this->db->where('newosi.uid', 0);
				$this->db->order_by('newosi.ono','ASC');
				 if($start == '0'){
			 	$this->db->limit($limit);
				 }else{
				 	$this->db->limit($limit, $start);
				 }
				$query = $this->db->get();
				//echo $this->db->last_query();
				if ($query->num_rows() > 0) {
				return $query->result();
				}


		}else{
				$this->db->select('man_id,name,presentrank,cexrank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,ono');
				if($mobno !=''){
				 $this->db->like('phono1', $mobno);
				}
				if($name !=''){
				 $this->db->like('name', $name);
				}if($bloodgroup !=''){
				$this->db->where('bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){$this->db->where('cexrank', $eor1);}
					elseif($RankRankre == 'Ministerial Staff'){$this->db->where('cminirank', $eor2);}
						elseif($RankRankre == 'Medical Staff'){$this->db->where('cmedirank', $eor3);}
							elseif($RankRankre == 'Class-IV (P)'){$this->db->where('ccprank', $eor4);}
								elseif($RankRankre == 'Class-IV (C)'){$this->db->where('cccrank', $eor5);}
				
				}if($postate !=''){
				 $this->db->where('state', $postate);
				}if($pcity !=''){
				 $this->db->where('district', $pcity);
				}if($stts !=''){
				 $this->db->where('eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('gender', $gender);
				}if($height !=''){
				 $this->db->where('feet', $height);
				}if($inch !=''){
				 $this->db->where('inch', $inch);
				}if($single !=''){
				 $this->db->where('maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('comlit', $clit);
				}if($p !=''){
				 $this->db->where('newosi.typeofduty', $p);
				}
				$this->db->where('bat_id', $uniqe);
				$this->db->where('uid', 0);
				$this->db->order_by('newosi.ono','ASC');
				 if($start == '0'){
			 	$this->db->limit($limit);
				 }else{
				 	$this->db->limit($limit, $start);
				 }
				$query = $this->db->get('newosi');
				//echo $this->db->last_query(); die();
				if ($query->num_rows() > 0) {
				return $query->result();
				}
			}
				
	 	}
	
   	 function get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$uniqe,$mobno) {
   				if($Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' || $Postingtiset4 !='' || $Postingtiset5 != '' || $Postingtiset6 !='' || $Postingtiset7 !='' || $Postingtiset8 !='' || $Postingtiset9 !=''){
			$this->db->select('*');
			$this->db->from('newosi');
			$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
				if($mobno !=''){
				 $this->db->like('newosi.phono1', $mobno);
				}
				if($name !=''){
				 $this->db->like('newosi.name', $name);
				}if($bloodgroup !=''){
				$this->db->where('newosi.bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('newosi.depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){$this->db->where('newosi.cexrank', $eor1);}
					elseif($RankRankre == 'Ministerial Staff'){$this->db->where('newosi.cminirank', $eor2);}
						elseif($RankRankre == 'Medical Staff'){$this->db->where('newosi.cmedirank', $eor3);}
							elseif($RankRankre == 'Class-IV (P)'){$this->db->where('newosi.ccprank', $eor4);}
								elseif($RankRankre == 'Class-IV (C)'){$this->db->where('newosi.cccrank', $eor5);}
				
				}if($postate !=''){
				 $this->db->where('newosi.state', $postate);
				}if($pcity !=''){
				 $this->db->where('newosi.district', $pcity);
				}if($stts !=''){
				 $this->db->where('newosi.eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('newosi.UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('newosi.Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('newosi.PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('newosi.Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('newosi.Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('newosi.gender', $gender);
				}if($height !=''){
				 $this->db->where('newosi.feet', $height);
				}if($inch !=''){
				 $this->db->where('newosi.inch', $inch);
				}if($single !=''){
				 $this->db->where('newosi.maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('newosi.modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('newosi.rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('newosi.enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('newosi.inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('newosi.NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('newosi.dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('newosi.comlit', $clit);
				}if($p !=''){
				 $this->db->where('newosi.typeofduty', $p);
				}

				/*Posting 1*/
				if($Postingtiset =='VP Guards'){
					$this->db->like('newosip.fone1', $Postingtiset);
				}if($Postingtiset =='Jails Security'){
					$this->db->like('newosip.fone2', $Postingtiset);
				}if($Postingtiset =='Punjab Police HQRS,SEC.9,CHG'){
					$this->db->like('newosip.fone3', $Postingtiset);
				}if($Postingtiset =='DERA BEAS SECURITY DUTY'){
					$this->db->like('newosip.fone4', $Postingtiset);
				}if($Postingtiset =='OTHER STATIC GUARDS'){
					$this->db->like('newosip.fone5', $Postingtiset);
				}if($Postingtiset == 'Police Officer' || $Postingtiset == 'Retired Police Officer' || 
					$Postingtiset == 'Political Persons' || $Postingtiset == 'Civil Officers' ||
					 $Postingtiset == 'Judicial Officers' || $Postingtiset == 'Threatening persons' || $Postingtiset == 'PERSONAL SECURITY STAFF ARMED WING OFFICER'){
					$this->db->like('newosip.fone6', $Postingtiset);
				}if($Postingtiset =='VIP SEC.WING CHG.U/82nd BN.'){
					$this->db->like('newosip.fone7', $Postingtiset);
				}if($Postingtiset =='POLICE SEC.WING CHG U/13th BN.'){
					$this->db->like('newosip.fone8', $Postingtiset);
				}if($Postingtiset =='BANK SECURITY DUTY'){
					$this->db->like('newosip.fone9', $Postingtiset);
				}if($Postingtiset =='SPECIAL PROTECTION UNIT (C.M. SEC.)'){
					$this->db->like('newosip.fone10', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (SEC. DUTY)'){
					$this->db->like('newosip.fone11', $Postingtiset);
				}if($Postingtiset =='PB. BHAWAN NEW DELHI (RESERVE)'){
					$this->db->like('newosip.fone12', $Postingtiset);
				}/*Close 1*/

				/*Posting 2*/
				if($Postingtiset2 =='PERMANENT DUTY'){
					$this->db->like('newosip.lone1', $Postingtiset2);
				}if($Postingtiset2 =='DGP, RESERVES'){
					$this->db->like('newosip.lone2', $Postingtiset2);
				}if($Postingtiset2 =='TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY'){
					$this->db->like('newosip.lone3', $Postingtiset2);
				}/*Close 2*/

				/*Posting 3*/
				if($Postingtiset3 =='ANTI RIOT POLICE, JALANDHAR'){
					$this->db->like('newosip.sqone1', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MANSA'){
					$this->db->like('newosip.sqone2', $Postingtiset3);
				}if($Postingtiset3 =='ANTI RIOT POLICE, MUKATSAR'){
					$this->db->like('newosip.sqone3', $Postingtiset3);
				}if($Postingtiset3 =='S.D.R.F. TEAM, JALANDHAR'){
					$this->db->like('newosip.sqone4', $Postingtiset3);
				}if($Postingtiset3 =='SPL. STRIKING GROUPS'){
					$this->db->like('newosip.sqone5', $Postingtiset3);
				}if($Postingtiset3 =='SWAT TEAM (4TH CDO)'){
					$this->db->like('newosip.sqone6', $Postingtiset3);
				}if($Postingtiset3 =='SOG BHG.,PTL(SPECIAL OPS.GROUP)'){
					$this->db->like('newosip.sqone7', $Postingtiset3);
				}if($Postingtiset3 =='UNMANNED AERIAL VEHICLE (UAV)'){
					$this->db->like('newosip.sqone8', $Postingtiset3);
				}/*Close 3*/

				/*Posting 4*/
				if($Postingtiset4 =='ATTACHED WITH DISTT., MOHALI'){
					$this->db->like('newosip.paone1', $Postingtiset4);

				}if($Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 == 'AD GUARD CP JALL' || $Postingtiset4 ==  'AD GUARD CP ASR'  || $Postingtiset4 ==  'AD GUARD DISTT MKT' || $Postingtiset4 ==  'AD GUARD DISTT LDH' || $Postingtiset4 ==  'AD GUARD DISTT BTL'){
					$this->db->like('newosip.paone22', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)'){
					$this->db->like('newosip.paone2', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)'){
					$this->db->like('newosip.paone3', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS MALE)'){
					$this->db->like('newosip.paone4', $Postingtiset4);
				}if($Postingtiset4 =='ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)'){
					$this->db->like('newosip.paone5', $Postingtiset4);
				}if($Postingtiset4 =='C.P.O. ATTACHMENT UNDER 13TH BN'){
					$this->db->like('newosip.paone6', $Postingtiset4);
				}if($Postingtiset4 =='PB. POLICE OFFICER INSTITUTE SEC 32 CHG'){
					$this->db->like('newosip.paone7', $Postingtiset4);
				}if($Postingtiset4 =='NRI CELL MOHALI'){
					$this->db->like('newosip.paone8', $Postingtiset4);
				}if($Postingtiset4 =='INTELLIGENCE WING'){
					$this->db->like('newosip.paone9', $Postingtiset4);
				}if($Postingtiset4 =='CENTRAL POLICE LINE MOHALI'){
					$this->db->like('newosip.paone10', $Postingtiset4);
				}if($Postingtiset4 =='VIGILANCE BUREAU'){
					$this->db->like('newosip.paone11', $Postingtiset4);
				}if($Postingtiset4 =='STATE NARCOTIC CRIME BUREAU'){
					$this->db->like('newosip.paone12', $Postingtiset4);
				}if($Postingtiset4 =='MOHALI AIRPORT IMMIGRATION DUTY'){
					$this->db->like('newosip.paone13', $Postingtiset4);
				}if($Postingtiset4 =='STATE HUMAN RIGHTS COMMISSION'){
					$this->db->like('newosip.paone14', $Postingtiset4);
				}if($Postingtiset4 =='BUREAU OF INVESTIGATION'){
					$this->db->like('newosip.paone15', $Postingtiset4);
				}if($Postingtiset4 =='SPECIAL TASK FORCE(STF)'){
					$this->db->like('newosip.paone23', $Postingtiset4);
				}if($Postingtiset4 =='PPSSOC'){
					$this->db->like('newosip.paone24', $Postingtiset4);
				}if($Postingtiset4 =='RTC/PAP, JALANDHAR'){
					$this->db->like('newosip.paone16', $Postingtiset4);
				}if($Postingtiset4 =='ISTC/PAP, KAPURTHALA'){
					$this->db->like('newosip.paone17', $Postingtiset4);
				}if($Postingtiset4 =='POLICE COMMANDO TRG. CENTRE, BHG, PATIALA'){
					$this->db->like('newosip.paone18', $Postingtiset4);
				}if($Postingtiset4 =='RTC LADDA KOTHI SANGRUR'){
					$this->db->like('newosip.paone19', $Postingtiset4);
				}if($Postingtiset4 =='PUNJAB POLICE ACADEMY PHILLAUR'){
					$this->db->like('newosip.paone20', $Postingtiset4);
				}if($Postingtiset4 =='POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN'){
					$this->db->like('newosip.paone21', $Postingtiset4);
				}if($Postingtiset4 =='ERSS PROJECT DIAL 112'){
					$this->db->like('newosip.paone27', $Postingtiset4);
				}/*Close 4*/

				/*Posting 5*/
				if($Postingtiset5 =='BASIC TRANING'){
					$this->db->like('newosip.traning1', $Postingtiset5);
				}if($Postingtiset5 =='PROMOTIONAL COURSE'){
					$this->db->like('newosip.traning2', $Postingtiset5);
				}if($Postingtiset5 =='DEPARTMENT COURSE'){
					$this->db->like('newosip.traning3', $Postingtiset5);
				}/*Close 5*/

				/*Posting 6*/
				if($Postingtiset6 =='DSO'){
					$this->db->like('newosip.ssone23', $Postingtiset6);
				}if($Postingtiset6 =='CSO, JALANDHAR'){
					$this->db->like('newosip.ssone24', $Postingtiset6);
				}if($Postingtiset6 =='NIS PATIALA'){
					$this->db->like('newosip.ssone25', $Postingtiset6);
				}if($Postingtiset6 =='OTHERS'){
					$this->db->like('newosip.ssone26', $Postingtiset6);
				}/*Close 6*/

				/*Posting 7*/
				if($Postingtiset7 =='PAP CAMPUS  SECURITY' || $Postingtiset7 =='BN. KOT GUARDS' || $Postingtiset7 =='BN. HQRS OTHER GUARDS' || $Postingtiset7 == 'STATIC GUARD CR'){
					$this->db->like('newosip.awbone1', $Postingtiset7);
				}if($Postingtiset7 =='OFFICE STAFF IN HIGHER OFFICES'){
					$this->db->like('newosip.awbone3', $Postingtiset7);
				}if($Postingtiset7 == 'Commandant office' ||  $Postingtiset7 == 'Asstt. Comdt. office' || $Postingtiset7 == 'Dy.S.P. office' || $Postingtiset7 == 'English Branch' || $Postingtiset7 == 'Account Branch' || $Postingtiset7 == 'OSI Branch' || $Postingtiset7 == 'Litigation Branch' || $Postingtiset7 == 'Steno Branch'|| $Postingtiset7 =='GPF Branch' || $Postingtiset7 == 'Computer Cell' || $Postingtiset7 == 'Control Room' || $Postingtiset7 =='Reader to INSP' || $Postingtiset7 =='CCTNS office' || $Postingtiset7 =='Nodal Officer' || $Postingtiset7 =='Recruitment Cell' || $Postingtiset7 == 'Photostate Machine operator'){
					$this->db->like('newosip.awbone4', $Postingtiset7);
				}if($Postingtiset7 =='TRADEMEN'){
					$this->db->like('newosip.awbone7', $Postingtiset7);
				}if($Postingtiset7 =='M.T. SECTION'){
					$this->db->like('newosip.awbone8', $Postingtiset7);
				}if($Postingtiset7 =='Armourer & A/Armourer'){
					$this->db->like('newosip.awbone13', $Postingtiset7);
				}if($Postingtiset7 == 'Reserve Inspector' || $Postingtiset7 == 'Line Officer' || $Postingtiset7 == 'BHM & A/BHM' || $Postingtiset7 == 'MHC & A/MHC' || $Postingtiset7 == 'Reader/Orderly to RI' || $Postingtiset7 == 'I/C MESS' || $Postingtiset7 =='Asst. I/C MESS' || $Postingtiset7 == 'CDI' || $Postingtiset7 =='CDO & A/CDO' || $Postingtiset7 == 'Quarter Master INSP' || $Postingtiset7 =='MSK Branch' || $Postingtiset7 =='KHC' || $Postingtiset7 == 'I/C Class-IV' || $Postingtiset7 =='Quarter Munshi & Asstt.' || $Postingtiset7 == 'Quarter Munshi & Asstt.' || $Postingtiset7 =='I/C Canteen & Grossary Shop' || $Postingtiset7 =='CHC'){
					$this->db->like('newosip.awbone9', $Postingtiset7);
				}if($Postingtiset7 =='GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY'){
					$this->db->like('newosip.awbone10', $Postingtiset7);
				}if($Postingtiset7 =='TRG. RESERVE AT BN.HQRS.'){
					$this->db->like('newosip.awbone11', $Postingtiset7);
				}if($Postingtiset7 =='OTHER DUTIES'){
					$this->db->like('newosip.awbone12', $Postingtiset7);
				}/*Close 7*/

				/*Posting 8*/
				if($Postingtiset8 =='RECRUIT'){
					$this->db->like('newosip.bmdone1', $Postingtiset8);
				}if($Postingtiset8 =='Earned Leave' || $Postingtiset8 =='Casual Leave' || $Postingtiset8 =='Paternity Leave' || $Postingtiset8 =='Medical Leave' || $Postingtiset8 =='Ex-India Leave' || $Postingtiset8 =='Others' ||   $Postingtiset8 =='Handicapped on Medical Rest' ){ 
					$this->db->like('newosip.bmdone2', $Postingtiset8);
				}if($Postingtiset8 =='ABSENT'){
					$this->db->like('newosip.bmdone3', $Postingtiset8);
				}if($Postingtiset8 =='UNDER SUSPENSION'){
					$this->db->like('newosip.bmdone4', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on Medical Rest'){
					$this->db->like('newosip.bmdone5', $Postingtiset8);
				}if($Postingtiset8 =='Handicapped on light duty'){
					$this->db->like('newosip.bmdone6', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on light duty'){
					$this->db->like('newosip.bmdone8', $Postingtiset8);
				}if($Postingtiset8 =='Chronic Disease on Medical Rest'){
					$this->db->like('newosip.bmdone7', $Postingtiset8);
				}if($Postingtiset8 =='OSD ETC'){
					$this->db->like('newosip.bmdone9', $Postingtiset8);
				}/*Close 8*/

				/*Posting 9*/
				if($Postingtiset9 =='PRINTING PRESS' || $Postingtiset9 == 'PHOTOGRAPHY CELL' || $Postingtiset9 =='ART GALLERY' || $Postingtiset9 =='WIRELESS SECTION'|| $Postingtiset9 =='DUPLEX' || $Postingtiset9 =='PAP HOSPITAL' || $Postingtiset9 =='GRIEVANCES REDRESSAL CELL' || $Postingtiset9 =='GOLF CLUB' || $Postingtiset9 =='GOLF RANGE' || $Postingtiset9 =='GAZETTED OFFICERS MESS' || $Postingtiset9 =='MINI GOS MESS' || $Postingtiset9 == 'B.M.STAFF' || $Postingtiset9 == 'SEWERAGE AND SANITATION' || $Postingtiset9 =='B.D. TEAM' || $Postingtiset9 == 'ELECTRICITY WING' || $Postingtiset9 == 'PIPE BAND' || $Postingtiset9 =='BRASS BAND' || $Postingtiset9 =='MOUNTED POLICE' || $Postingtiset9 =='RE-BROWNING WORKSHOP' || $Postingtiset9 == 'BASE WORKSHOP' || $Postingtiset9 == 'PAP GAS AGENCY'|| $Postingtiset9 =='TEAR GAS SQUAD' || $Postingtiset9 =='EMPTY CATRIDGE CELL' || $Postingtiset9 == 'CABLE NETWORK' || $Postingtiset9 =='GURUDWARA SAHIB PAP CAMPUS' || $Postingtiset9 =='COUNSELLING AND CARRIER GUIDANCE CENTRE' || $Postingtiset9 =='PAP BOOK SHOP' || $Postingtiset9 =='COMPUTER HARDWARE CELL' || $Postingtiset9 =='PAP WEBSITE' || $Postingtiset9 =='COMPUTER TRG. CENTRE' || $Postingtiset9 =='LADIES WELFARE CENTRE &  MULTIPURPOSE HALL'|| $Postingtiset9 =='PAPCOS' || $Postingtiset9 =='SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV  SCHOOL' || $Postingtiset9 =='B.P. UNIT' || $Postingtiset9 =='BEAUTIFICATION STAFF' || $Postingtiset9 =='R.P.STAFF' || $Postingtiset9 =='SPECIAL GUARD' || $Postingtiset9 =='CO-OPERATIVE STORE' || $Postingtiset9 =='CULTURAL TROUP' || $Postingtiset9 =='APNA DHABA' || $Postingtiset9 =='SHIV SHAKTI MANDIR' || $Postingtiset9 =='SONA BATH' || $Postingtiset9 == 'SWIMMING POOL 25 MTR'|| $Postingtiset9 =='BAKERY' || $Postingtiset9 =='TECHNICAL TEAM'|| $Postingtiset9 =='PAP GYM. NEW' || $Postingtiset9 =='PAP GYM. OLD' || $Postingtiset9 =='ACUPRESSURE' || $Postingtiset9 =='SPORTS CAFE,MILK BAR & JUICE BAR PAP' || $Postingtiset9 =='INDOOR STADIUM' || $Postingtiset9 =='PAP  SHOOTING RANGE' || $Postingtiset9 =='BUGGLER' || $Postingtiset9 =='T/A 7th Bn PAP for Driver Duty' || $Postingtiset9 =='U/7th PAP for out Rider duty on Motor Cycle' || $Postingtiset9 =='M.T WORKSHOP U/7th BN PAP' || $Postingtiset9 =='PAP House' || $Postingtiset9 =='Camp Cleaning U/7th BN.PAP' || $Postingtiset9 == 'A/A Punjab State U/7th BN.PAP'){
					$this->db->like('newosip.instone10', $Postingtiset9);
					}if($Postingtiset9 =='IRB Institutions'){
						$this->db->like('newosip.instone1', $Postingtiset9);
					}if($Postingtiset9 =='PAP Outer Bn Institutions'){
						$this->db->like('newosip.instone3', $Postingtiset8);
					}if($Postingtiset9 =='CDO Institutions'){
						$this->db->like('newosip.instone2', $Postingtiset9);
					}/*close 9*/



				
				$this->db->where('newosi.bat_id', $uniqe);
				$this->db->where('newosi.uid', 0);

				$query = $this->db->get();
				//echo $this->db->last_query(); die();
				return $query->num_rows();
				

		}else{
				$this->db->select('man_id,name,cexrank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1');
				if($mobno !=''){
				 $this->db->like('phono1', $mobno);
				}
				if($name !=''){
				 $this->db->like('name', $name);
				}if($bloodgroup !=''){
				$this->db->where('bloodgroup', $bloodgroup);
				}if($rcnum !=''){
				$this->db->like('depttno', $rcnum);
				}if($RankRankre !=''){
					if($RankRankre == 'Executive Staff'){$this->db->where('cexrank', $eor1);}
					elseif($RankRankre == 'Ministerial Staff'){$this->db->where('cminirank', $eor2);}
						elseif($RankRankre == 'Medical Staff'){$this->db->where('cmedirank', $eor3);}
							elseif($RankRankre == 'Class-IV (P)'){$this->db->where('ccprank', $eor4);}
								elseif($RankRankre == 'Class-IV (C)'){$this->db->where('cccrank', $eor5);}
				
				}if($postate !=''){
				 $this->db->where('state', $postate);
				}if($pcity !=''){
				 $this->db->where('district', $pcity);
				}if($stts !=''){
				 $this->db->where('eduqalification', $stts);
				}
					if($stts =='Under Graduate'){
				 		$this->db->where('UnderGraduate', $UnderGraduate);
					}elseif($stts =='Graduate'){
						$this->db->where('Graduate', $Graduate);
					}elseif($stts =='Post Graduate'){
						$this->db->where('PostGraduate', $PostGraduate);
					}elseif($stts =='Doctorate'){
						$this->db->where('Doctorate', $Doctorate);
					}elseif($stts =='Other'){
						$this->db->where('Doctorateother !=', '');
					}
				if($gender !=''){
				 $this->db->where('gender', $gender);
				}if($height !=''){
				 $this->db->where('feet', $height);
				}if($inch !=''){
				 $this->db->where('inch', $inch);
				}if($single !=''){
				 $this->db->where('maritalstatus', $single);
				}if($Modemdr !=''){
				 $this->db->where('modeofrec', $Modemdr);
				}if($Rankre !=''){
				 $this->db->where('rankofenlistment', $Rankre);
				}if($Enlistmentec !=''){
				 $this->db->where('enlistmentcat', $Enlistmentec);
				}if($InductionModeim !=''){
				 $this->db->where('inductionmode', $InductionModeim);
				}if($dateofesnlistment1 !=''){
					 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') >=", $dateofesnlistment1);
				 $this->db->where("DATE_FORMAT(newosi.dateofinlitment,'%Y-%m-%d') <=", $dateofesnlistment2);
				
				}if($dateofbirth !=''){
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') >=", $dateofbirth);
				 $this->db->where("DATE_FORMAT(newosi.dateofbith,'%Y-%m-%d') <=", $dateofbirthi);
				}if($NamesofsCourses !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses);
				}if($NamesofsCourses2 !=''){
				 $this->db->like('NamesofsCourses', $NamesofsCourses2);
				}if($DateofRetirementdor !=''){
				 $this->db->where('dateofretirment', $DateofRetirementdor);
				}if($clit !=''){
				 $this->db->where('comlit', $clit);
				}if($p !=''){
				 $this->db->where('newosi.typeofduty', $p);
				}
				$this->db->where('bat_id', $uniqe);
				$this->db->where('uid', 0);
				$query = $this->db->get('newosi');
				
				return $query->num_rows();
				
			}
	}	 	

	 function get_cqtr($tpi,$orderno,$rcno,$id) {
			$this->db->select('*');	
			if($tpi !=''){
			$this->db->where('qtrno', $tpi);
			}if($orderno !=''){
			$this->db->where('electronicmeter', $orderno);
			}if($rcno !=''){
			$this->db->where('allotmentorder', $rcno);
			}
			$this->db->where('bat_id',$id);
                        $this->db->order_by('cast(qtrno as unsigned)','asc'); 
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	}

	  function get_ipgqtrs($id) {
			$this->db->select('*');	
			$this->db->where('bat_id',$id);
                        $this->db->order_by('cast(qtrno as unsigned)','asc');
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	}

	  function get_cqtrigp($tpi,$orderno,$rcno) {
			$this->db->select('*');	
			if($tpi !=''){
			$this->db->where('qtrno', $tpi);
			}if($orderno !=''){
			$this->db->where('electronicmeter', $orderno);
			}if($rcno !=''){
			$this->db->where('allotmentorder', $rcno);
			}
			$query = $this->db->get('newquart');
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	 	}
	/*Close*/

	function osidelete($id){
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$this->db->where('man_id', $id);
  		$task = $this->db->delete('newosi');	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function tempdelete($id){
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$this->db->where('templist_id', $id);
  		$task = $this->db->delete('templist');	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function khcdelete($id){
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$this->db->where('old_weapon_id', $id);
  		$task = $this->db->delete('old_weapon');

  		$this->db->where('bat_id', $this->session->userdata('userid'));
		$this->db->where('weapon_master_id', $id);
  		$task2 = $this->db->delete('issue_arm');	
		if($task || $task2){
			return 1;
		}else{
			return 0;
		}	 
	}

	function mskdelete($id){
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$this->db->where('msk_id', $id);
  		$task = $this->db->delete('newmsk');	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function rank_update($id,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$fone1,$vploc,$vpdis,$fone2,$noj,$jsdis,$fone3,$fone4,$fone5,$osgloc,$osgdis,$fone6,$fone7,$fone8,$fone9,$bsdnob,$bsddis,$bsdloc,$fone10,$fone11,$fone12,$lone1,$perdupod,$perdudis,$perduorno,$perduordate,$lone2,$dgppod,$dgpdis,$dgporno,$dgpordate,$lone3,$tertdpod,$tertddis,$tertdorno,$tertdordate,$sqone1,$sqone2,$sqone3,$sqone4,$sqone5,$sstgpod,$sstgdis,$sstgorno,$sstgordate,$sqone6,$swatpod,$swatdis,$swatorno,$swatordate,$paone1,$paone2,$awdpmpod,$awdpmorno,$awdpmordate,$paone3,$awdpfpod,$awdpforno,$awdpfordate,$paone4,$awdpompod,$awdpomorno,$awdpomordate,$paone5,$awdpofpod,$awdpoforno,$awdpofordate,$paone6,$paone7,$paone8,$paone9,$paone10,$paone11,$paone12,$paone13,$paone14,$paone15,$paone16,$paone17,$paone18,$paone19,$paone20,$paone21,$paone22,$ssone23,$dsopod,$dsoorno,$dsoordate,$ssone24,$csojalorno,$csojalordate,$ssone25,$mispatorno,$mispatordate,$ssone26,$othersnod,$othersnodis,$othersorno,$othersordate,$traning1,$traning2,$traning3,$btarin1,$btarin2,$btarin3,$btarin4,$btarin5,$btarin6,$btarin7,$btarin8,$btarin9,$btarin10,$awbone1,$awbone2,$pssawonof,$pssaworank,$pssawoordate,$awbone3,$osihonoo,$awbone4,$Readerosinbo,$Orderly,$telopr,$darrun,$awbone5,$bnkgdop,$awbone6,$bhogpog,$bhogdop,$awbone7,$tradestot,$tradestt,$tradesbat,$tradesdop,$tradesorno,$awbone8,$mtsecpod,$mtsecvehno,$mtsecdop,$mtsecorno,$awbone9,$quartbradop,$quartbraorno,$awbone10,$awbone11,$awbone12,$recrutnorb,$recrutorno,$recrutordate,$bmdone1,$bmdone2,$leavefrom,$leaveto,$bmdone3,$absentfrom,$absentddr,$absentdate,$leavefromi,$leavetoi,$bmdone4,$bmdone5,$bmdone6,$bmdone7,$bmdone8,$bmdone9,$bmdone10,$instone1,$instone2,$instone3,$instone4,$instone10,$scname,$scrank,$scdes,$scpop,$scaddress,$scmob,$scnod,$scoby,$scono,$scodate,$tcrank,$tcdes,$tcoby,$tcono,$tcodate,$usdos,$usros,$dateofposting1,$classf1,$classf2,$classf3,$scnames,$scranks,$scdess,$scpops,$scaddresss,$scmobs,$scnods,$scobys,$sconos,$scodates,$paone23,$paone24,$paone27,$sqone7,$sqone8,$awbone13,$spuoderny,$spuodernyno,$spuodernyod,$gPostingtiset,$tcrankoo,$tcdesoo,$tcobyoo,$tconooo,$tcodateoo,$adminstaff ){

	/*	$this->db->select('*');
		$this->db->where('man_id',$id);
		$query = $this->db->get('newosip');
			if ($query->num_rows() > 0) {
				return 0;
			}else{
*/

		$addvaluess = array('man_id' => $id, 'fone1' => $fone1,'vploc' => $vploc, 'vpdis' => $vpdis, 'fone2' => $fone2, 'noj'  => $noj, 'jsdis' => $jsdis,  'fone3' => $fone3, 'fone4' => $fone4, 'fone5' => $fone5, 'osgloc' => $osgloc, 'osgdis' => $osgdis, 'fone6' => $fone6,'fone7' => $fone7, 'fone8' => $fone8, 'fone9' => $fone9, 'bsdnob' => $bsdnob, 'bsddis' => $bsddis, 'bsdloc' => $bsdloc, 'fone10' => $fone10, 'fone11' => $fone11 , 'fone12' => $fone12, 'lone1' => $lone1, 'perdupod' => $perdupod, 'perdudis' => $perdudis, 'perduorno' => $perduorno, 'perduordate' => $perduordate, 'lone2' => $lone2, 'dgppod' => $dgppod, 'dgpdis' => $dgpdis, 'dgporno' => $dgporno, 'dgpordate' => $dgpordate, 'lone3' => $lone3, 'tertdpod' => $tertdpod, 'tertddis' => $tertddis, 'tertdorno' => $tertdorno, 'tertdordate' => $tertdordate, 'sqone1' => $sqone1, 'sqone2' => $sqone2, 'sqone3' => $sqone3, 'sqone4' => $sqone4, 'sqone5' => $sqone5, 'sstgpod' => $sstgpod, 'sstgdis' => $sstgdis, 'sstgorno' => $sstgorno,'sstgordate' => $sstgordate, 'sqone6' => $sqone6, 'sqone7' => $sqone7, 'sqone8' => $sqone8, 'swatpod' => $swatpod, 'swatdis' => $swatdis, 'swatorno' => $swatorno, 'swatordate' => $swatordate, 'paone1' => $paone1, 'paone2' => $paone2, 'awdpmpod' => $awdpmpod, 'awdpmorno' => $awdpmorno, 'awdpmordate' => $awdpmordate, 'paone3' => $paone3, 'awdpfpod' => $awdpfpod, 'awdpforno' => $awdpforno, 'awdpfordate' => $awdpfordate, 'paone4' => $paone4, 'awdpompod' => $awdpompod, 'awdpomorno' => $awdpomorno, 'awdpomordate' => $awdpomordate,
			'paone5' => $paone5, 'awdpofpod' => $awdpofpod, 'awdpoforno' => $awdpoforno, 'awdpofordate' => $awdpofordate, 'paone6' => $paone6, 'paone7' => $paone7, 'paone8' => $paone8, 'paone9' => $paone9,'paone10' => $paone10, 'paone11' => $paone11, 'paone12' => $paone12, 'paone13' => $paone13, 'paone14' => $paone14 , 'paone15' => $paone15, 'paone16' => $paone16, 'paone17' => $paone17,'paone18' => $paone18, 'paone19' => $paone19, 'paone20' => $paone20, 'paone21' => $paone21,'paone22' => $paone22,'paone23' => $paone23, 'paone24' => $paone24,'paone27' => $paone27, 'ssone23' => $ssone23, 'dsopod' => $dsopod, 'dsoorno' => $dsoorno, 'dsoordate' => $dsoordate, 'ssone24' => $ssone24, 'csojalorno' => $csojalorno, 'csojalordate' => $csojalordate, 'ssone25' => $ssone25, 'mispatorno' => $mispatorno, 'mispatordate' => $mispatordate, 'ssone26' => $ssone26, 'othersnod' => $othersnod, 'othersnodis' => $othersnodis, 'othersorno' => $othersorno, 'othersordate' => $othersordate, 'awbone1' => $awbone1, 'awbone2' => $awbone2, 'pssawonof' => $pssawonof, 'pssaworank' => $pssaworank, 'pssawoordate' => $pssawoordate,  'awbone3' => $awbone3, 'osihonoo' => $osihonoo, 'awbone4' => $awbone4, 'Readerosinbo' => $Readerosinbo, 'Orderly' => $Orderly, 'telopr' => $telopr, 'darrun' => $darrun, 'awbone5' => $awbone5, 'bnkgdop' => $bnkgdop,  'awbone6' => $awbone6, 'bhogpog' => $bhogpog, 'bhogdop' => $bhogdop, 'awbone7' => $awbone7, 'tradestot' => $tradestot, 'tradestt' => $tradestt,'tradesbat' => $tradesbat, 'tradesdop' => $tradesdop, 'tradesorno' => $tradesorno, 'awbone8' => $awbone8, 'mtsecpod' => $mtsecpod, 'mtsecvehno' => $mtsecvehno, 'mtsecdop' => $mtsecdop, 'mtsecorno' => $mtsecorno,  'awbone9' => $awbone9, 'quartbradop' => $quartbradop, 'quartbraorno' => $quartbraorno, 'awbone10' => $awbone10, 'awbone11' => $awbone11, 'awbone12' => $awbone12, 'recrutnorb' => $recrutnorb,'recrutorno' => $recrutorno , 'recrutordate' => $recrutordate, 'bmdone1' => $bmdone1,'bmdone2' => $bmdone2, 'leavefrom' => $leavefrom, 'leaveto' => $leaveto, 'bmdone3' => $bmdone3, 'absentfrom' => $absentfrom, 'absentddr' => $absentddr, 'absentdate' => $absentdate, 'bmdone4' => $bmdone4, 'usdos' => $usdos, 'usros' => $usros, 'bmdone5' => $bmdone5, 'bmdone6' => $bmdone6, 'bmdone7' => $bmdone7, 'bmdone8' => $bmdone8,'bmdone9' => $bmdone9, 'instone1' => $instone1, 'instone2' => $instone2,   'instone3' => $instone3, 'instone4' => $instone4, 'instone10' => $instone10, 'traning1' => $traning1, 'traning2' => $traning2, 'traning3' => $traning3, 'btarin1' => $btarin1, 'btarin2' => $btarin2, 'btarin3' => $btarin3, 'btarin4' => $btarin4, 'btarin5' => $btarin5, 'btarin6' => $btarin6, 'btarin7' => $btarin7, 'btarin8' => $btarin8, 'btarin9' => $btarin9, 'btarin10' => $btarin10, 'batt_id' => $this->session->userdata('userid'),'dateofposting1' => $dateofposting1,'cfpop' => $classf1,'cfppd' => $classf2, 'cfpdop' => $classf3,'awbone13' => $awbone13,'game' => $gPostingtiset, 'adminstaff' => $adminstaff);
			$task = $this->db->insert('newosip',$addvaluess);

			if($fone6 !='' || $awbone2 !=''){
				$val = array('tname' => $fone6.$awbone2, 'name' => $scname.$scnames,'placeofposting' => $scpop.$scpops,'address' => $scaddress.$scaddresss,'mobile' => $scmob.$scmobs, 'nod' => $scnod.$scnods, 'orderby' => $scoby.$scobys, 'orderno' => $scono.$sconos, 'order_date' => $scodate.$scodates, 'rank' => $scrank.$scranks, 'des' => $scdes.$scdess, 'bat_id' => $this->session->userdata('userid'),'man_id' => $id);
	 		$task = $this->db->insert('seccover',$val);
			} 

			if($paone1 !='' ||$paone2 !='' ||$paone3 !='' ||$paone4 !='' ||$paone5 !='' ||$paone6 !='' ||$paone7 !='' ||$paone8 !='' ||$paone9 !='' ||$paone10 !='' ||$paone11 !='' ||$paone12 !='' ||$paone13 !='' ||$paone14 !='' ||$paone15 !='' || $paone22 !='' || $paone23 !='' || $paone24 !='' || $paone27 !='' || $fone10 !='' ){
				$val = array('man_id' => $id, 'tname' => $paone1.$paone2.$paone3.$paone4.$paone5.$paone6.$paone7.$paone8.$paone9.$paone10.$paone11.$paone12.$paone13.$paone14.$paone15.$paone16.$paone17.$paone18.$paone19.$paone20.$paone21.$paone22.$paone23.$paone24.$paone27.$fone10, 'dis' => $tcrank.$tcrankoo,'tem' => $tcdes.$tcdesoo, 'orderby' => $tcoby.$spuoderny.$tcobyoo, 'orderno' => $tcono.$spuodernyno.$tconooo, 'orderdate' => $tcodate.$spuodernyod.$tcodateoo,'bat_id' => $this->session->userdata('userid'));
				$task = $this->db->insert('tcover',$val);
			}

				/*}*/
			if($task){
				return 1;
			}else{
				return 0;
			}	 
	}

	function rtctemp(){
		$this->db->select('*');
		$this->db->from('newosip');
		$this->db->join('newosi', 'newosi.man_id = newosip.man_id');
		$this->db->where('newosip.paone16','RTC/PAP, JALANDHAR');
		$this->db->where('newosip.batt_id!=',$this->session->userdata('userid'));
		 $query = $this->db->get();
	 	$info = $query->result();
	 	return $info;
	}

	function ctroomtemp(){
		$this->db->select('*');
		$this->db->from('newosip');
		$this->db->join('newosi', 'newosi.man_id = newosip.man_id');
		$this->db->where('newosip.awbone3','CONTROL ROOM PAP');
		$this->db->where('newosip.batt_id!=',$this->session->userdata('userid'));
		 $query = $this->db->get();
	 	$info = $query->result();
	 	return $info;
	}

	function csomtemp(){
		$this->db->select('*');
		$this->db->from('newosip');
		$this->db->join('newosi', 'newosi.man_id = newosip.man_id');
		$this->db->where('newosip.ssone24','CSO, JALANDHAR');
		$this->db->where('newosip.batt_id!=',$this->session->userdata('userid'));
		 $query = $this->db->get();
	 	$info = $query->result();
	 	return $info;
	}

	function postingfilter($fone1,$fone2,$fone3,$fone4,$fone5,$fone6,$fone7,$fone8,$fone9,$fone10,$fone11,$fone12,$lone1,$lone2,$lone3,$sqone1,$sqone2,$sqone3,$sqone4,$sqone5,$sqone6,$sqone7,$sqone8,$paone1,$paone2,$paone3,$paone4,$paone5,$paone6,$paone7,$paone8,$paone9,$paone10,$paone11,$paone12,$paone13,$paone14,$paone15,$paone16,$paone17,$paone18,$paone19,$paone20,$paone21,$paone27,$ssone23,$ssone24,$ssone25,$ssone26,$traning1,$traning2,$traning3,$awbone1,$awbone2,$awbone3,$awbone4,$awbone5,$awbone6,$awbone7,$awbone8,$awbone9,$awbone10,$awbone11,$awbone12,$bmdone1,$bmdone2,$bmdone3,$bmdone4,$bmdone5,$bmdone6,$bmdone7,$bmdone8,$bmdone9,$instone1,$instone2,$instone3,$instone4,$instone10){
		$this->db->select('*');
		$this->db->from('newosip');
		 $this->db->join('newosi', 'newosi.man_id = newosip.man_id');
		if($fone1 !=''){
			$this->db->where('newosip.fone1',$fone1);
		}
		if($fone2 !=''){
			$this->db->where('newosip.fone2',$fone2);
		}
		if($fone3 !=''){
			$this->db->where('newosip.fone3',$fone3);
		}
		if($fone4 !=''){
			$this->db->where('newosip.fone4',$fone4);
		}
		if($fone5 !=''){
			$this->db->where('newosip.fone5',$fone5);
		}
		if($fone6 !=''){
			$this->db->where('newosip.fone6',$fone6);
		}
		if($fone7 !=''){
			$this->db->where('newosip.fone7',$fone7);
		}
		if($fone8 !=''){
			$this->db->where('newosip.fone8',$fone8);
		}
		if($fone9 !=''){
			$this->db->where('newosip.fone9',$fone9);
		}
		if($fone10 !=''){
			$this->db->where('newosip.fone10',$fone10);
		}
		if($fone11 !=''){
			$this->db->where('newosip.fone11',$fone11);
		}
		if($fone12 !=''){
			$this->db->where('newosip.fone12',$fone12);
		}
		if($lone1 !=''){
			$this->db->where('newosip.lone1',$lone1);
		}
		if($lone2 !=''){
			$this->db->where('newosip.lone2',$lone2);
		}
		if($lone3 !=''){
			$this->db->where('newosip.lone3',$lone3);
		}
		if($sqone1 !=''){
			$this->db->where('newosip.sqone1',$sqone1);
		}
		if($sqone2 !=''){
			$this->db->where('newosip.sqone2',$sqone2);
		}
		if($sqone3 !=''){
			$this->db->where('newosip.sqone3',$sqone3);
		}
		if($sqone4 !=''){
			$this->db->where('newosip.sqone4',$sqone4);
		}
		if($sqone5 !=''){
			$this->db->where('newosip.sqone5',$sqone5);
		}
		if($sqone6 !=''){
			$this->db->where('newosip.sqone6',$sqone6);
		}
		if($sqone7 !=''){
			$this->db->where('newosip.sqone7',$sqone7);
		}
		if($sqone8 !=''){
			$this->db->where('newosip.sqone8',$sqone8);
		}
		if($paone1 !=''){
			$this->db->where('newosip.paone1',$paone1);
		}
		if($paone2 !=''){
			$this->db->where('newosip.paone2',$paone2);
		}
		if($paone3 !=''){
			$this->db->where('newosip.paone3',$paone3);
		}
		if($paone4 !=''){
			$this->db->where('newosip.paone4',$paone4);
		}
		if($paone5 !=''){
			$this->db->where('newosip.paone5',$paone5);
		}
		if($paone6 !=''){
			$this->db->where('newosip.paone6',$paone6);
		}
		if($paone7 !=''){
			$this->db->where('newosip.paone7',$paone7);
		}
		if($paone8 !=''){
			$this->db->where('newosip.paone8',$paone8);
		}		
		if($paone9 !=''){
			$this->db->where('newosip.paone9',$paone9);
		}
		if($paone10 !=''){
			$this->db->where('newosip.paone10',$paone10);
		}
		if($paone11 !=''){
			$this->db->where('newosip.paone11',$paone11);
		}
		if($paone12 !=''){
			$this->db->where('newosip.paone12',$paone12);
		}
		if($paone13 !=''){
			$this->db->where('newosip.paone13',$paone13);
		}
		if($paone14 !=''){
			$this->db->where('newosip.paone14',$paone14);
		}
		if($paone15 !=''){
			$this->db->where('newosip.paone15',$paone15);
		}
		if($paone16 !=''){
			$this->db->where('newosip.paone16',$paone16);
		}
		if($paone17 !=''){
			$this->db->where('newosip.paone17',$paone17);
		}
		if($paone18 !=''){
			$this->db->where('newosip.paone18',$paone18);
		}
		if($paone19 !=''){
			$this->db->where('newosip.paone19',$paone19);
		}
		if($paone20 !=''){
			$this->db->where('newosip.paone20',$paone20);
		}
		if($paone21 !=''){
			$this->db->where('newosip.paone21',$paone21);
		}
		if($paone27 !=''){
			$this->db->where('newosip.paone27',$paone27);
		}
		if($ssone23 !=''){
			$this->db->where('newosip.ssone23',$ssone23);
		}
		if($ssone24 !=''){
			$this->db->where('newosip.ssone24',$ssone24);
		}
		if($ssone25 !=''){
			$this->db->where('newosip.ssone25',$ssone25);
		}
		if($ssone26 !=''){
			$this->db->where('newosip.ssone26',$ssone26);
		}
		if($awbone1 !=''){
			$this->db->where('newosip.awbone1',$awbone1);
		}
		if($awbone2 !=''){
			$this->db->where('newosip.awbone2',$awbone2);
		}
		if($awbone3 !=''){
			$this->db->where('newosip.awbone3',$awbone3);
		}
		if($awbone4 !=''){
			$this->db->where('newosip.awbone4',$awbone4);
		}
		if($awbone5 !=''){
			$this->db->where('newosip.awbone5',$awbone5);
		}
		if($awbone6 !=''){
			$this->db->where('newosip.awbone6',$awbone6);
		}
		if($awbone7 !=''){
			$this->db->where('newosip.awbone7',$awbone7);
		}
		if($awbone8 !=''){
			$this->db->where('newosip.awbone8',$awbone8);
		}
		if($awbone9 !=''){
			$this->db->where('newosip.awbone9 !=','');
		}
		if($awbone10 !=''){
			$this->db->where('newosip.awbone10',$awbone10);
		}
		if($awbone11 !=''){
			$this->db->where('newosip.awbone11',$awbone11);
		}
		if($awbone12 !=''){
			$this->db->where('newosip.awbone12',$awbone12);
		}
		if($bmdone1 !=''){
			$this->db->where('newosip.bmdone1',$bmdone1);
		}
		if($bmdone2 !=''){
			$this->db->where('newosip.bmdone2',$bmdone2);
		}
		if($bmdone3 !=''){
			$this->db->where('newosip.bmdone3',$bmdone3);
		}
		if($bmdone4 !=''){
			$this->db->where('newosip.bmdone4',$bmdone4);
		}
		if($bmdone5 !=''){
			$this->db->where('newosip.bmdone5',$bmdone5);
		}
		if($bmdone6 !=''){
			$this->db->where('newosip.bmdone6',$bmdone6);
		}
		if($bmdone7 !=''){
			$this->db->where('newosip.bmdone7',$bmdone7);
		}
		if($bmdone8 !=''){
			$this->db->where('newosip.bmdone8',$bmdone8);
					}
		if($bmdone9 !=''){
			$this->db->where('newosip.bmdone9',$bmdone9);
		}
		if($instone1 !=''){
			$this->db->where('newosip.instone1',$instone1);
		}
		if($instone2 !=''){
			$this->db->where('newosip.instone2',$instone2);
		}
		if($instone3 !=''){
			$this->db->where('newosip.instone3',$instone3);
		}
		if($instone4 !=''){
			$this->db->where('newosip.instone4',$instone4);
			}
		if($instone10 !=''){
			$this->db->where('newosip.instone10',$instone10);
		}
		if($traning1 !=''){
			$this->db->where('newosip.traning1',$traning1);
		}
		if($traning2 !=''){
			$this->db->where('newosip.traning2',$traning2);
		}
		if($traning3 !=''){
			$this->db->where('newosip.traning3',$traning3);
		}
		$this->db->where('newosi.bat_id',$this->session->userdata('userid'));
		 $query = $this->db->get();
	 	$info = $query->result();
		return $info;
	}

	function rank_edit($id,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$fone1,$vploc,$vpdis,$fone2,$noj,$jsdis,$fone3,$fone4,$fone5,$osgloc,$osgdis,$fone6,$fone7,$fone8,$fone9,$bsdnob,$bsddis,$bsdloc,$fone10,$fone11,$fone12,$lone1,$perdupod,$perdudis,$perduorno,$perduordate,$lone2,$dgppod,$dgpdis,$dgporno,$dgpordate,$lone3,$tertdpod,$tertddis,$tertdorno,$tertdordate,$sqone1,$sqone2,$sqone3,$sqone4,$sqone5,$sstgpod,$sstgdis,$sstgorno,$sstgordate,$sqone6,$swatpod,$swatdis,$swatorno,$swatordate,$paone1,$paone2,$awdpmpod,$awdpmorno,$awdpmordate,$paone3,$awdpfpod,$awdpforno,$awdpfordate,$paone4,$awdpompod,$awdpomorno,$awdpomordate,$paone5,$awdpofpod,$awdpoforno,$awdpofordate,$paone6,$paone7,$paone8,$paone9,$paone10,$paone11,$paone12,$paone13,$paone14,$paone15,$paone16,$paone17,$paone18,$paone19,$paone20,$paone21,$paone22,$ssone23,$dsopod,$dsoorno,$dsoordate,$ssone24,$csojalorno,$csojalordate,$ssone25,$mispatorno,$mispatordate,$ssone26,$othersnod,$othersnodis,$othersorno,$othersordate,$traning1,$traning2,$traning3,$btarin1,$btarin2,$btarin3,$btarin4,$btarin5,$btarin6,$btarin7,$btarin8,$btarin9,$btarin10,$awbone1,$awbone2,$pssawonof,$pssaworank,$pssawoordate,$awbone3,$osihonoo,$awbone4,$Readerosinbo,$Orderly,$telopr,$darrun,$awbone5,$bnkgdop,$awbone6,$bhogpog,$bhogdop,$awbone7,$tradestot,$tradestt,$tradesbat,$tradesdop,$tradesorno,$awbone8,$mtsecpod,$mtsecvehno,$mtsecdop,$mtsecorno,$awbone9,$quartbradop,$quartbraorno,$awbone10,$awbone11,$awbone12,$recrutnorb,$recrutorno,$recrutordate,$bmdone1,$bmdone2,$leavefrom,$leaveto,$bmdone3,$absentfrom,$absentddr,$absentdate,$leavefromi,$leavetoi,$bmdone4,$bmdone5,$bmdone6,$bmdone7,$bmdone8,$bmdone9,$bmdone10,$instone1,$instone2,$instone3,$instone4,$instone10,$scname,$scrank,$scdes,$scpop,$scaddress,$scmob,$scnod,$scoby,$scono,$scodate,$tcrank,$tcdes,$tcoby,$tcono,$tcodate,$usdos,$usros,$dateofposting1,$classf1,$classf2,$classf3,$scnames,$scranks,$scdess,$scpops,$scaddresss,$scmobs,$scnods,$scobys,$sconos,$scodates,$paone23,$paone24,$paone27,$sqone7,$sqone8,$awbone13,$spuoderny,$spuodernyno,$spuodernyod,$gPostingtiset){
			$addvaluess = array('man_id' => $id, 'fone1' => $fone1,'vploc' => $vploc, 'vpdis' => $vpdis, 'fone2' => $fone2, 'noj'  => $noj, 'jsdis' => $jsdis,  'fone3' => $fone3, 'fone4' => $fone4, 'fone5' => $fone5, 'osgloc' => $osgloc, 'osgdis' => $osgdis, 'fone6' => $fone6,'fone7' => $fone7, 'fone8' => $fone8, 'fone9' => $fone9, 'bsdnob' => $bsdnob, 'bsddis' => $bsddis, 'bsdloc' => $bsdloc, 'fone10' => $fone10, 'fone11' => $fone11 , 'fone12' => $fone12, 'lone1' => $lone1, 'perdupod' => $perdupod, 'perdudis' => $perdudis, 'perduorno' => $perduorno, 'perduordate' => $perduordate, 'lone2' => $lone2, 'dgppod' => $dgppod, 'dgpdis' => $dgpdis, 'dgporno' => $dgporno, 'dgpordate' => $dgpordate, 'lone3' => $lone3, 'tertdpod' => $tertdpod, 'tertddis' => $tertddis, 'tertdorno' => $tertdorno, 'tertdordate' => $tertdordate, 'sqone1' => $sqone1, 'sqone2' => $sqone2, 'sqone3' => $sqone3, 'sqone4' => $sqone4, 'sqone5' => $sqone5, 'sstgpod' => $sstgpod, 'sstgdis' => $sstgdis, 'sstgorno' => $sstgorno,'sstgordate' => $sstgordate, 'sqone6' => $sqone6, 'swatpod' => $swatpod, 'swatdis' => $swatdis, 'swatorno' => $swatorno, 'swatordate' => $swatordate, 'paone1' => $paone1, 'paone2' => $paone2, 'awdpmpod' => $awdpmpod, 'awdpmorno' => $awdpmorno, 'awdpmordate' => $awdpmordate, 'paone3' => $paone3, 'awdpfpod' => $awdpfpod, 'awdpforno' => $awdpforno, 'awdpfordate' => $awdpfordate, 'paone4' => $paone4, 'awdpompod' => $awdpompod, 'awdpomorno' => $awdpomorno, 'awdpomordate' => $awdpomordate,'paone23' => $paone23, 'paone24' => $paone24,'paone27' => $paone27,'sqone7' => $sqone7, 'sqone8' => $sqone8,
					 'paone5' => $paone5, 'awdpofpod' => $awdpofpod, 'awdpoforno' => $awdpoforno, 'awdpofordate' => $awdpofordate, 'paone6' => $paone6, 'paone7' => $paone7, 'paone8' => $paone8, 'paone9' => $paone9,'paone10' => $paone10, 'paone11' => $paone11, 'paone12' => $paone12, 'paone13' => $paone13, 'paone14' => $paone14 , 'paone15' => $paone15, 'paone16' => $paone16, 'paone17' => $paone17,'paone18' => $paone18, 'paone19' => $paone19, 'paone20' => $paone20, 'paone21' => $paone21,'paone22' => $paone22,'ssone23' => $ssone23, 'dsopod' => $dsopod, 'dsoorno' => $dsoorno, 'dsoordate' => $dsoordate, 'ssone24' => $ssone24, 'csojalorno' => $csojalorno, 'csojalordate' => $csojalordate, 'ssone25' => $ssone25, 'mispatorno' => $mispatorno, 'mispatordate' => $mispatordate, 'ssone26' => $ssone26, 'othersnod' => $othersnod, 'othersnodis' => $othersnodis, 'othersorno' => $othersorno, 'othersordate' => $othersordate, 'awbone1' => $awbone1, 'awbone2' => $awbone2, 'pssawonof' => $pssawonof, 'pssaworank' => $pssaworank, 'pssawoordate' => $pssawoordate,  'awbone3' => $awbone3, 'osihonoo' => $osihonoo, 'awbone4' => $awbone4, 'Readerosinbo' => $Readerosinbo, 'Orderly' => $Orderly, 'telopr' => $telopr, 'darrun' => $darrun, 'awbone5' => $awbone5, 'bnkgdop' => $bnkgdop,  'awbone6' => $awbone6, 'bhogpog' => $bhogpog, 'bhogdop' => $bhogdop, 'awbone7' => $awbone7, 'tradestot' => $tradestot, 'tradestt' => $tradestt,'tradesbat' => $tradesbat, 'tradesdop' => $tradesdop, 'tradesorno' => $tradesorno, 'awbone8' => $awbone8, 'mtsecpod' => $mtsecpod, 'mtsecvehno' => $mtsecvehno, 'mtsecdop' => $mtsecdop, 'mtsecorno' => $mtsecorno,  'awbone9' => $awbone9, 'quartbradop' => $quartbradop, 'quartbraorno' => $quartbraorno, 'awbone10' => $awbone10, 'awbone11' => $awbone11, 'awbone12' => $awbone12, 'recrutnorb' => $recrutnorb,'recrutorno' => $recrutorno , 'recrutordate' => $recrutordate, 'bmdone1' => $bmdone1,'bmdone2' => $bmdone2, 'leavefrom' => $leavefrom, 'leaveto' => $leaveto, 'bmdone3' => $bmdone3, 'absentfrom' => $absentfrom, 'absentddr' => $absentddr, 'absentdate' => $absentdate, 'bmdone4' => $bmdone4, 'usdos' => $usdos, 'usros' => $usros, 'bmdone5' => $bmdone5, 'bmdone6' => $bmdone6, 'bmdone7' => $bmdone7, 'bmdone8' => $bmdone8,'bmdone9' => $bmdone9, 'instone1' => $instone1, 'instone2' => $instone2,   'instone3' => $instone3, 'instone4' => $instone4,  'instone10' => $instone10, 'traning1' => $traning1, 'traning2' => $traning2, 'traning3' => $traning3, 'btarin1' => $btarin1, 'btarin2' => $btarin2, 'btarin3' => $btarin3, 'btarin4' => $btarin4, 'btarin5' => $btarin5, 'btarin6' => $btarin6, 'btarin7' => $btarin7, 'btarin8' => $btarin8, 'btarin9' => $btarin9, 'btarin10' => $btarin10, 'batt_id' => $this->session->userdata('userid'),'dateofposting1' => $dateofposting1,'cfpop' => $classf1,'cfppd' => $classf2, 'cfpdop' => $classf3,'awbone13' => $awbone13,'game' => $gPostingtiset);
				$this->db->where('man_id',$id);
  				$task = $this->db->update('newosip',$addvaluess);

			if($fone6 !='' || $awbone2 !=''){
				$val = array('tname' => $fone6.$awbone2, 'name' => $scname.$scnames,'placeofposting' => $scpop.$scpops,'address' => $scaddress.$scaddresss,'mobile' => $scmob.$scmobs, 'nod' => $scnod.$scnods, 'orderby' => $scoby.$scobys, 'orderno' => $scono.$sconos, 'order_date' => $scodate.$scodates, 'rank' => $scrank.$scranks, 'des' => $scdes.$scdess, 'bat_id' => $this->session->userdata('userid'),'man_id' => $id);
				$this->db->where('man_id',$id);
  				$task = $this->db->update('seccover',$val);
			} 

			if($paone1 !='' ||$paone2 !='' ||$paone3 !='' ||$paone4 !='' ||$paone5 !='' ||$paone6 !='' ||$paone7 !='' ||$paone8 !='' ||$paone9 !='' ||$paone10 !='' ||$paone11 !='' ||$paone12 !='' ||$paone13 !='' ||$paone14 !='' ||$paone15 !='' ||$paone16 !=''||$paone17 !=''||$paone18 !=''||$paone19 !=''||$paone20 !=''||$paone21 !='' || $paone22 !='' || $paone23 !='' ||$paone24 !='' ||$paone27 !='' || $fone10 !=''){
					$this->db->select('*');
					$this->db->where('man_id',$id);
					$query = $this->db->get('tcover');
	 				$info = $query->num_rows();

	 				if($info >0){
	 					$val = array('man_id' => $id, 'tname' => $paone1.$paone2.$paone3.$paone4.$paone5.$paone6.$paone7.$paone8.$paone9.$paone10.$paone11.$paone12.$paone13.$paone14.$paone15.$paone16.$paone17.$paone18.$paone19.$paone20.$paone21.$paone22.$paone23.$paone24.$paone27, 'dis' => $tcrank,'tem' => $tcdes, 'orderby' => $tcoby.$spuoderny, 'orderno' => $tcono.$spuodernyno, 'orderdate' => $tcodate.$spuodernyod,'bat_id' => $this->session->userdata('userid'));
			    			$this->db->where('man_id',$id);
  							$task = $this->db->update('tcover',$val);
	 				}else{
	 					$val = array('man_id' => $id, 'tname' => $paone1.$paone2.$paone3.$paone4.$paone5.$paone6.$paone7.$paone8.$paone9.$paone10.$paone11.$paone12.$paone13.$paone14.$paone15.$paone16.$paone17.$paone18.$paone19.$paone20.$paone21.$paone22.$paone23.$paone24.$paone27.$fone10, 'dis' => $tcrank,'tem' => $tcdes, 'orderby' => $tcoby.$spuoderny, 'orderno' => $tcono.$spuodernyno, 'orderdate' => $tcodate.$spuodernyod,'bat_id' => $this->session->userdata('userid'));
			    		//$this->db->where('man_id',$id);
  						$task = $this->db->insert('tcover',$val);
	 				}
				
			}
				
			
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function seccover($id,$fone6,$name,$rank,$des,$pop,$address,$mob,$nod,$oby,$ono,$odate){
	 		$val = array('tname' => $fone6, 'name' => $name,'placeofposting' => $pop,'address' => $address,'mobile' => $mob, 'nod' => $nod, 'orderby' => $oby, 'orderno' => $ono, 'order_date' => $odate, 'rank' => $rank, 'des' => $des, 'bat_id' => $this->session->userdata('userid'),'man_id' => $id);
	 		$task = $this->db->insert('seccover',$val);
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function tcover($id,$fone6,$rank,$des,$oby,$ono,$odate){
		$this->db->select('*');
		$this->db->where('man_id',$id);
		$query = $this->db->get('tcover');
	 	$info = $query->num_rows();
	 	if($info> 0){
	 		return 0;
	 	}else{
	 		$val = array('man_id' => $id, 'tname' => $fone6, 'dis' => $rank,'tem' => $des, 'orderby' => $oby, 'orderno' => $ono, 'orderdate' => $odate,'bat_id' => $this->session->userdata('userid'));
		
		$task = $this->db->insert('tcover',$val);

	 	}
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function edittcover($id,$fone6,$rank,$des,$oby,$ono,$odate){
		$val = array('man_id' => $id, 'tname' => $fone6, 'dis' => $rank,'tem' => $des, 'orderby' => $oby, 'orderno' => $ono, 'orderdate' => $odate,'bat_id' => $this->session->userdata('userid'));
		$this->db->where('man_id',$id);
		$task = $this->db->update('tcover',$val);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function tempdel($table,$where){
		foreach($where as $list =>$key):
			$this->db->where($list,$key);
			endforeach;
		$task = $this->db->delete($table);	
		if($task){
			return 1;
		}else{
			return 0;
		}		 
	}

		/*issue arm start*/
	function joinposting(){
	 $this->db->select('*');
	 $this->db->from('newosip');
	 $this->db->join('newosi', 'newosi.man_id = newosip.man_id');
	 $this->db->where('batt_id',$this->session->userdata('userid'));
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/


		/*issue arm start*/
	function joinpostinglist($id){
	 $this->db->select('*');
	 $this->db->from('newosip');
	 $this->db->join('newosi', 'newosi.man_id = newosip.man_id');
	 $this->db->where('newosip.awbone9',$id);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/

	 function squntys($toi,$nameofitem){
			$this->db->select('*');
			$this->db->select('SUM(recinkot) AS total');					
			if($toi !=''){
			$this->db->where('ammubore', $toi);
			}if($nameofitem !=''){
			$this->db->where('ammuwep', $nameofitem);
			}
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('issue_annuser');
			$info = $query->result();
			return $info;
		}

	 function squntysi($toi,$nameofitem){
			$this->db->select('*');
			$this->db->select('SUM(recinkot) AS total');					
			if($toi !=''){
			$this->db->where('ammubore', $toi);
			}if($nameofitem !=''){
			$this->db->where('ammuwep', $nameofitem);
			}
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('issue_annuser');
			$info = $query->result();
			return $info;
		}

	function pquntys($toi,$nameofitem){
			$this->db->select('*');
			$this->db->select('SUM(recinkot) AS total');					
			if($toi !=''){
			$this->db->where('ammubore', $toi);
			}if($nameofitem !=''){
			$this->db->where('ammuwep', $nameofitem);
			}
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('issue_amuprc');
			$info = $query->result();
			return $info;
		}

	function pquntysii($toi,$nameofitem){
			$this->db->select('*');
			$this->db->select('SUM(recinkot) AS total');					
			if($toi !=''){
			$this->db->where('ammubore', $toi);
			}if($nameofitem !=''){
			$this->db->where('ammuwep', $nameofitem);
			}
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('newamus');
			$info = $query->result();
			return $info;
		}

	function squntysii($toi,$nameofitem){
			$this->db->select('*');
			$this->db->select('SUM(recinkot) AS total');					
			if($toi !=''){
			$this->db->where('ammubore', $toi);
			}if($nameofitem !=''){
			$this->db->where('ammuwep', $nameofitem);
			}
			$this->db->where('bat_id',$this->session->userdata('userid'));
			$query = $this->db->get('newamu');
			$info = $query->result();
			return $info;
		}

	function allamusqty($ito,$tpi,$tpi2){
		$this->db->select('*');
		$this->db->select('SUM(recinkot) AS total');
		if($ito !=''){
			$this->db->where('bat_id', $ito);
		}				
		if($tpi !=''){
		$this->db->where('ammuwep', $tpi);
		}if($tpi2 !=''){
		$this->db->where('ammubore', $tpi2);
		}
		$query = $this->db->get('newamus');
		$info = $query->result();
		return $info;
	}

	function allamupqty($ito,$tpi,$tpi2)
	{
			$this->db->select('*');
			$this->db->select('SUM(recinkot) AS total');					
			if($ito !=''){
				$this->db->where('bat_id', $ito);
			}				
			if($tpi !=''){
			$this->db->where('ammuwep', $tpi);
			}if($tpi2 !=''){
			$this->db->where('ammubore', $tpi2);
			}
				$query = $this->db->get('newamu');
				$info = $query->result();
				return $info;
	}

		/*issue arm start*/
	function pol(){
	 $this->db->select('*');
	 $this->db->from('newmt');
	// $this->db->join('newmt', 'newmt.mt_id = issue_vehicle.reg_no');
	 $this->db->where('newmt.bat_id',$this->session->userdata('userid'));
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/

	function tempposting($nop,$acco,$idate,$odate){
		foreach ($nop as $key => $value) {
			$val = array('mid' => $value, 'postinfo' => $acco, 'sdate' => $idate,'edate' => $odate,'bat_id' => $this->session->userdata('userid'));
			$task = $this->db->insert('templist',$val);
		}
		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

			/*issue arm start*/
	function tempview(){
	 $this->db->select('*');
	 $this->db->from('templist');
	 $this->db->join('newosi', 'newosi.man_id = templist.mid');
	 $this->db->where('templist.bat_id',$this->session->userdata('userid'));
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/

		/*issue arm start*/
	function joinhorse(){
	 $this->db->select('*');
	 $this->db->from('dhorse');
	 $this->db->join('horse', 'horse.horse_id = dhorse.hid');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/


	function editmskadmin($id,$a,$b){
		$val = array('qty' => $a, 'issued' => $b);
		$this->db->where('mskitems_id',$id);
		$task = $this->db->update('mskitemsqty',$val);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function edit_relived($id,$a){
		$val = array('reld' => 'Yes','Dateofrelieving' => $a);
		$this->db->where('deinduction_id',$id);
		$task = $this->db->update('deinduction',$val);

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}


	/*issue arm start*/
	function joindeinduc(){
	 $this->db->select('*');
	 $this->db->from('deinduction');
	 $this->db->join('newosi', 'newosi.man_id = deinduction.nop');
	 $this->db->where('deinduction.batt_id',$this->session->userdata('userid'));
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/

	/*issue arm start*/
	function joinpolrepair($m,$y,$id){
	 $this->db->select('*');
	 /*newmt.pduty,newmt.oname,newmt.dutydetails,newmt.regnom,newmt.catofvechicle,newmt.vechile_year,newmt.avg,newmt.ftype,newmt.officer*/
	 $this->db->from('newmt');
	 //$this->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
	$this->db->join('pol_return', 'pol_return.rnum = newmt.mt_id');
	 //$this->db->join('mtrepair', 'mtrepair.rnum = newmt.mt_id');
	 $this->db->where('pol_return.cmonth',$m);
	 $this->db->where('pol_return.cyear',$y);
	 $this->db->where('pol_return.bat_id',$id);
	 $this->db->group_by('pol_return.rnum');
	 $query = $this->db->get();
//         echo $this->db->last_query();
	 $info = $query->result();
	 return $info;
	}/*Close*/


	 function viwq($tq,$floor,$Condition,$accts) {
			$this->db->select('*');
			if($tq !=''){
			$this->db->where('typeofqtr', $tq);
			}if($floor !=''){
			$this->db->where('flor', $floor);
			}if($Condition !=''){
			$this->db->where('condit', $Condition);
			}if($accts !=''){
			$this->db->where('accomdationsize', $accts);
			}
			$this->db->where('bat_id', $this->session->userdata('userid'));
                        $this->db->order_by('cast(qtrno as unsigned)','asc');
			$query = $this->db->get('newquart'); //echo $this->db->last_query(); die();
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

			/*issue arm start*/
	function deputationlist(){
	 $this->db->select('newosi.*');
	 $this->db->from('newosi');
	 $this->db->join('deinduction', 'deinduction.nop = newosi.man_id');
	 $this->db->where('deinduction.ti','On deputation');
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}/*Close*/


	function get_osiexport($ito) {
			$this->db->select('*');
			$this->db->from('newosi');
			$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
			$this->db->where('newosi.bat_id', $ito);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	function get_osiexportnow($ito) {
			$this->db->select('newosi.name,newosi.bunitdistrict,newosi.bat_id,newosi.cexrank,newosi.cminirank,newosi.cmedirank,newosi.ccprank,newosi.cccrank,newosi.depttno,newosi.typeofduty,newosi.gender,newosi.gender,newosi.man_id,newosip.fone1,newosip.vploc,newosip.vpdis,newosip.fone2,newosip.noj,newosip.jsdis,newosip.fone3,newosip.fone4,newosip.fone5,newosip.osgloc,newosip.osgdis,newosip.fone6,newosip.fone7,newosip.fone8,newosip.fone9,newosip.bsdnob,newosip.bsddis,newosip.bsdloc,newosip.fone10,newosip.fone11,newosip.fone12,newosip.lone1,newosip.perdupod,newosip.perdudis,newosip.perduorno,newosip.perduordate,newosip.lone2,newosip.dgppod,newosip.dgpdis,newosip.dgporno,newosip.dgpordate,newosip.lone3,newosip.tertdpod,newosip.tertddis,newosip.tertdorno,newosip.tertdordate,newosip.sqone1,newosip.sqone2,newosip.sqone3,newosip.sqone4,newosip.sqone5,newosip.sstgpod,newosip.sstgdis,newosip.sstgdis,newosip.sstgorno,newosip.sstgordate,newosip.sqone6,newosip.sqone7,newosip.sqone8,newosip.swatpod,newosip.swatdis,newosip.swatorno,newosip.swatordate,newosip.paone1,newosip.paone2,newosip.awdpmpod,newosip.awdpmorno,newosip.awdpmordate,newosip.paone3,newosip.awdpfpod,newosip.awdpforno,newosip.awdpfordate,newosip.paone4,newosip.awdpompod,newosip.	awdpomorno,newosip.awdpomordate,newosip.paone5,newosip.awdpofpod,newosip.awdpoforno,newosip.awdpofordate,newosip.paone6,newosip.paone7,newosip.paone8,newosip.paone8,newosip.paone9,newosip.paone10,newosip.paone11,newosip.paone12,newosip.paone13,newosip.paone14,newosip.paone15,newosip.paone16,newosip.paone17,newosip.paone18,newosip.paone19,newosip.paone20,newosip.paone21,newosip.paone22,newosip.paone23,newosip.paone24,newosip.paone27,newosip.ssone23,newosip.dsopod,newosip.dsoorno,newosip.dsoordate,newosip.ssone24,newosip.csojalorno,newosip.csojalorno,newosip.csojalordate,newosip.ssone25,newosip.mispatorno,newosip.mispatordate,newosip.ssone26,newosip.othersnod,newosip.othersnodis,newosip.othersorno,newosip.othersordate,newosip.othersordate,newosip.awbone1,newosip.awbone2,newosip.pssawonof,newosip.pssaworank,newosip.pssawoordate,newosip.awbone3,newosip.osihonoo,newosip.awbone4,newosip.Readerosinbo,newosip.Readerosinbo,newosip.Orderly,newosip.telopr,newosip.darrun,newosip.awbone5,newosip.bnkgdop,newosip.awbone6,newosip.bhogpog,newosip.bhogdop,newosip.awbone7,newosip.tradestot,newosip.tradestt,newosip.tradestt,newosip.tradesbat,newosip.tradesdop,newosip.tradesorno,newosip.awbone8,newosip.mtsecpod,newosip.mtsecvehno,newosip.mtsecvehno,newosip.mtsecdop,newosip.mtsecorno,newosip.awbone9,newosip.quartbradop,newosip.quartbraorno,newosip.awbone10,newosip.awbone11,newosip.awbone12,newosip.awbone13,newosip.recrutnorb,newosip.recrutorno,newosip.recrutordate,newosip.bmdone1,newosip.bmdone2,newosip.leavefrom,newosip.leaveto,newosip.bmdone3,newosip.absentfrom,newosip.absentddr,newosip.absentdate,newosip.absentdate,newosip.bmdone4,newosip.usdos,newosip.usros,newosip.bmdone5,newosip.bmdone6,newosip.bmdone7,newosip.bmdone8,newosip.bmdone9,newosip.bmdone10,newosip.instone1,newosip.instone2,newosip.instone3,newosip.instone4,newosip.instone10,newosip.traning1,newosip.traning2,newosip.traning3,newosip.btarin1,newosip.btarin2,newosip.btarin3,newosip.btarin4,newosip.btarin5,newosip.btarin6,newosip.btarin7,newosip.btarin8,newosip.btarin9,newosip.btarin10,newosip.dateofposting1,newosip.cfpop,newosip.cfppd,newosip.cfpdop,newosip.game,newosip.adminstaff');
			$this->db->from('newosi');
			$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
			$this->db->where('newosi.bat_id', $ito);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			return $query->result();
			}
	}

	function mskauction($id){

		$this->db->select('*');
		$this->db->where('msk_id', $id);
		$query = $this->db->get('newmsk');		
		$info = $query->row();

		$addvaluei = array('conofitem' => 'D','msk_status' => 0);
			$this->db->where('msk_id',$id);
			$task = $this->db->update('newmsk',$addvaluei);

			$this->db->select('*');
		$this->db->where('name',$info->nameofitem);
		$this->db->where('item',$info->typeofitem);
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$query = $this->db->get('mskitemsqty');		
		$result = $query->row();

		

		$val = $result->qty - 1;
		
		$adds = array('qty' => $val);
		$this->db->where('name',$info->nameofitem);
		$this->db->where('item',$info->typeofitem);
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$task = $this->db->update('mskitemsqty',$adds);
		
		if($task){
			return 1;
		}else{
			return 0;
		}
	}

	function mskauctionlist($id){
		$this->db->select('*');
		$this->db->where('deposit_material_id', $id);
		$query = $this->db->get('deposit_material');		
		$info = $query->row();

		$this->db->select('*');
		$this->db->where('name',$info->nameofitem);
		$this->db->where('item',$info->typeofitem);
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$query = $this->db->get('mskitemsqty');		
		$result = $query->row();

		

		$val = $result->qty - 1;
		
		$adds = array('qty' => $val);
		$this->db->where('name',$info->nameofitem);
		$this->db->where('item',$info->typeofitem);
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$task = $this->db->update('mskitemsqty',$adds);

		$addvaluei = array('condition_of_item' => 'D','deposit_material_staus' => 0);
		$this->db->where('deposit_material_id',$id);
		$task = $this->db->update('deposit_material',$addvaluei);

		


		
		
		if($task){
			return 1;
		}else{
			return 0;
		}
	}

	function mskbackstore($id){
		$this->db->where('msk_id',$id);
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$query = $this->db->get('newmsk');
		$info = $query->row();

		$adds = array('qty' => 1, 'bat_id' => $this->session->userdata('userid'));
			
		$this->db->where('item',$info->typeofitem);	
		$this->db->where('name',$info->nameofitem);
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$task = $this->db->update('mskitemsqty',$adds);
					
		$addvaluei = array('conofitem' => 'B','msk_status' => 1);
			$this->db->where('msk_id',$id);
			$task = $this->db->update('newmsk',$addvaluei);
		
		if($task){
			return 1;
		}else{
			return 0;
		}
	}

	function mskbackstores($id){
		$this->db->where('deposit_material_id',$id);
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$query = $this->db->get('deposit_material');
		$info = $query->row();

		$this->db->select('*');
		$this->db->where('name',$info->nameofitem);
		$this->db->where('item',$info->typeofitem);
		$this->db->where('bat_id', $this->session->userdata('userid'));
		$query = $this->db->get('mskitemsqty');		
		$result = $query->row();

		$val = $result->qty + 1;

		$adds = array('qty' => $val, 'bat_id' => $this->session->userdata('userid'));
			
		$this->db->where('item',$info->typeofitem);	
		$this->db->where('name',$info->nameofitem);
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$task = $this->db->update('mskitemsqty',$adds);
					
		$addvaluei = array('typeofitem' => $info->typeofitem, 'nameofitem' => $info->nameofitem,'recqut' => 1,  'conofitem' => 'B','msk_status' => 1, 'bat_id' => $this->session->userdata('userid'));
		$task = $this->db->insert('newmsk',$addvaluei);

		$this->db->where('deposit_material_id',$id);
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$this->db->delete('deposit_material');
		
		if($task){
			return 1;
		}else{
			return 0;
		}
	}
	public function getIssuedQuantityOfMaterial($isssue_material_id){
		$this->db->select('*');
		$this->db->where('issue_material_id',$isssue_material_id);
		$query = $this->db->get('issue_material');
		$result= $query->row();
		if($result==null){
			return -1;
		}else{
			return $result->quantity;
		}
	}
	
}
/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.* FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` WHERE `istatus` = 0 */

/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.`atype`,`issue_arm`.`abore`,`issue_arm`.`mags`,`issue_arm`.`amqunt`,`issue_arm`.`amqunt`,`newosi`.`name`,`newosi`.`name`,`issue_arm`.`typeofduty`,`issue_arm`.`placeofduty`,`issue_arm`.`idate` FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` JOIN `newosi` ON `newosi`.`man_id` = `issue_arm`.`issueto` WHERE `istatus` = 0 */
?>