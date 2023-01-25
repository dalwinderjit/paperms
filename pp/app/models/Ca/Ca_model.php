<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Ca_model extends CI_Model{
	 
	function fetchinfo($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $query = $this->db->get($table);
	 $info = $query->result();
	 return $info;
	}

	function fetchoneinfo($table,$where){
	 $this->db->select('*');
	 foreach($where as $list =>$key):
	 $this->db->where($list,$key);
	 endforeach;
	 $query = $this->db->get($table);
	 $info = $query->row();
	 return $info;
	}

	function addarm(){
	 $this->db->select('*');
	 $this->db->from(T_WEAPON_MASTER);
	 $this->db->join('arms_master', 'arms_master.arms_master_id = weapon_master.arms_master_id');
	 $this->db->where('weapon_status',1);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}


	function issuearm(){
	 $this->db->select('*');
	 $this->db->from(T_ISSUE_ARM);
	 $this->db->join('users', 'users.users_id = issue_arm.issue_to');
	 $this->db->where('issue_status',1);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

	function add_arm($tow,$wbodyno,$wbuttno,$rdate,$mq,$rcvno,$vdate){
		$this->db->select('*');
			$this->db->where('arms_master_id',$tow);
			$query = $this->db->get(T_ARM_MASTER);		
			$results = $query->row();	
		$addvalue = array('tow' => $results->weapon_name, 'bono' => $wbodyno, 'buno' =>  $wbuttno, 'carec_date' => $rdate, 'camagazine_qty' => $mq , 'cavocher_no' => $rcvno, 'cavoucher_date' => $vdate);
		$task = $this->db->insert('old_weapon',$addvalue);

		
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}




		function issue_arm($bodyno,$idate,$rcno,$mq,$vdate,$ito){
			foreach ($bodyno as $value) {
					$addvalue = array('ca_issue_date' => $idate, 'ca_rc_no' => $rcno, 'ca_megqty' => $mq, 'ca_rdate' => $rdate, 'bat_id' => $ito, 'ca_store' => 0);
					$this->db->where('old_weapon_id',$value);
				$task = $this->db->update('old_weapon',$addvalue);
			}

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}



	function add_ammunition($bodyno,$now,$year,$qw,$rdate,$rcvno,$vdate){
		$n = explode(',', $now);
		$addvalue = array('type' => $bodyno,'ammubore' => $n[1], 'ammuwep' => $n[0], 'calot_no' => $year, 'caquantity' => $qw, 'carec_date' => $rdate, 'carc_voc' => $rcvno, 'carc_vdate' => $vdate);
		$task = $this->db->insert('newamu',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}


	function add_issueammu($bodyno,$ammu,$year,$qab,$idate,$ito,$rcno,$vdate){
		$addvalue = array( 'cailyear' => $year, 'caiquantity' => $qab, 'caidate' => $idate,'bat_id' => $ito, 'caircvno' => $rcno, 'caircvdate' => $vdate, 'caistatus' => 0);
		$this->db->where('old_ammunation_id');
		$task = $this->db->update('newamu',$addvalue);	 	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}


	function ammu_list($id){
	 $this->db->select('*');
	 $this->db->from('newamu');
	 $this->db->where('type',$id);
	 $this->db->where('caistatus', 1);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}


	function issueammu(){
	 $this->db->select('*');
	 $this->db->from(T_ISSUE_AMMU);
	 $this->db->join('users', 'users.users_id = issue_annu.issue_to');
	 $this->db->where('annu_status',1);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}



	function add_recive($amd,$acd,$aa,$mode){
		$addvalue = array('am_ac' => $amd, 'ammu_details' => $aa, 'qunty' => $acd, 'mode' => $mode);
		$task = $this->db->insert(T_REC_AMU,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_officer($noa,$wbdn,$amd,$aa,$acd,$mode){
		$addvalue = array('off_name' => $noa, 'rank' => $wbdn, 'placeofposting' => $amd, 'contact_no' => $aa, 'state' => $acd, 'city' => $mode);
		$task = $this->db->insert(T_OFFICER,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_vechicle($cov,$vc,$regno,$engno,$chno,$rcfrm,$moa,$rv,$rcdt,$sr,$tr,$cnov,$stov,$lsd,$lid){
		$addvalue = array('cat_of_vic' => $cov, 'vec_class' => $vc, 'reg_num' => $regno, 'eng_num' => $engno, 'chasis_num' => $chno, 'rec_form' => $rcfrm,'mode_of_aq' => $moa, 'rec_voc' => $rv, 'rec_date' => $rcdt, 'sp_meter_read' => $sr, 'no_of_typer' => $tr, 'condition_on_vic' => $cnov, 'status_of_road' => $stov,'last_service_date' => $lsd, 'last_ins_date' => $lid);
		$task = $this->db->insert(T_VEHICLE,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_material($cti,$nmi,$cni,$tpi,$rcfrm,$rcno,$rcdate,$rcdt,$fname,$gfund,$toi){
		$addvalue = array('cti' => $cti, 'nmi' => $nmi, 'cni' => $cni, 'tpi' => $tpi, 'rcfrm' => $rcfrm, 'rcno' => $rcno,'rcdate' => $rcdate, 'rcdt' => $rcdt, 'fname' => $fname, 'gfund' => $gfund, 'toi' => $toi);
		$task = $this->db->insert(T_MATERIAL,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_pmaterial($fn,$add,$cno,$pamt,$bno,$bldt,$rcdt,$rcno,$rtdt){
		$addvalue = array('firm' => $fn, 'address' => $add, 'contact_no' => $cno, 'purch_am' => $pamt, 'bill_no' => $bno, 'bill_date' => $bldt,'rec_date' => $rcdt, 'recpt_no' => $rcno, '	recpt_date' => $rtdt);
		$task = $this->db->insert(T_PMATERIAL,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function add_man($name,$fname,$radd,$hno,$sno,$vm,$ct,$po,$ps,$tl,$st,$phno,$psno,$pvm,$pcpo,$pps,$ptl,$pd,$pst,$gender,$mstatus,$stts,$ug,$g,$pg,$d,$mdr,$dmr,$re,$ec,$eu,$dor,$gpf,$bt,$rk,$dn,$icn,$ir,$im,$ind,$pb,$prn,$cl,$inm,$ti,$doc,$bn){
		$addvalue = array('name' => $name, 'fname' => $fname, 'radd' => $radd, 'hno' => $hno, 'sno' => $sno, 'vm' => $vm,'ct' => $ct, 'po' => $po, 'ps' => $ps, 'tl' => $tl , 'st' => $st, 'phno' => $phno, 'psno' => $psno, 'pvm' => $pvm, 'pcpo' => $pcpo,'pps' => $pps,'ptl' => $ptl, 'pd' => $pd, 'pst' => $pst, 'gender' => $gender, 'mstatus' => $mstatus, 'stts' => $stts, 'ug' => $ug, 'g' => $g, 'pg' => $pg, 'd' => $d, 'mdr' => $mdr, 'dmr' => $dmr,'re' => $re, 'ec' => $ec, 'eu' => $eu, 'dor' => $dor, 'gpf' => $gpf, 'bt' =>  $bt, 'rk' => $rk, 'dn' => $dn, 'icn' => $icn, 'ir' => $ir,'im' => $im, 'ind' => $ind, 'pb' => $pb,'prn' => $prn, 'cl' => $cl, 'inm' => $inm, 'ti' => $ti, 'doc' => $doc, 'bn' => $bn);
		$task = $this->db->insert(T_MANMASTER,$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

		function armstock(){
	 $this->db->select('*');
	 $this->db->from(T_ISSUE_ARM);
	 $this->db->join('users', 'users.users_id = issue_arm.issue_to');
	 $this->db->where('issue_status',1);
	 $query = $this->db->get();
	 $info = $query->result();
	 return $info;
	}

}

?>