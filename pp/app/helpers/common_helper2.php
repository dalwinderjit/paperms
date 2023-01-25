<?php
/*Start Action info fetch one recored*/
		 function info_fetch_rec($in)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where_in('weapon_id',$in);
			$query = $CI->db->get(T_WEAPON_MASTER);		
			$result = $query->result_array();
			return $result; 
		 }		 
		/*Close Action info fetch one recored*/

		function info_fetch_recammu($in)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where_in('arms_master_id',$in);
			$query = $CI->db->get(T_ARM_MASTER);		
			$result = $query->result_array();
			return $result; 
		 }	

		 function info_fetch_recammui($in)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where_in('arms_master_id',$in);
			$query = $CI->db->get(T_ARM_MASTER);		
			$result = $query->row();
			return $result; 
		 }	

		 function info_fetch_issue_arm($in)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where_in('weapon_master_id',$in);
			$query = $CI->db->get('issue_arm');		
			$result = $query->row();
			return $result; 
		 }

		function info_fetch_count($in)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('arms_master_id',$in);
			$query = $CI->db->get(T_ARM_MASTER);		
			$result = $query->num_rows();
			return $result; 
		 }

		 function info_fetch_countkhc($in,$info,$id)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('tow',$in);
			$CI->db->where('staofserv',$info);
			$CI->db->where('bat_id',$id);
			$query = $CI->db->get('old_weapon');		
			$result = $query->num_rows();
			return $result; 
		 }


		 function info_fetch_countkhciio($in,$info,$id)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('tow',$in);
			$CI->db->where('staofserv',$info);
			if($CI->session->userdata('userid') == 209 || $CI->session->userdata('userid') == 210){
				$CI->db->where_in('bat_id',array('190','165','154','113','108','160','120'));
			}
			elseif($CI->session->userdata('userid') == 211 || $CI->session->userdata('userid') == 212){
				$CI->db->where_in('bat_id',array('99','172','142','148','178'));
			}
			$query = $CI->db->get('old_weapon');
			$result = $query->num_rows();
			return $result; 
		 }

		 function info_fetch_countmt($in,$info,$id)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$CI->db->where('statusofvechile',$info);
			$CI->db->where('bat_id',$id);
			$query = $CI->db->get('newmt');		
			$result = $query->num_rows();
			return $result; 
		 }


		 function info_fetch_countmtcounts($in,$info,$id)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$CI->db->where('statusofvechile',$info);
			if($id !=''){
				$CI->db->where('bat_id',$id);
			}
			
			$query = $CI->db->get('newmt');		
			$result = $query->num_rows();
			return $result; 
		 }

		 function info_fetch_countmtc($in,$info,$id)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$CI->db->where('condemdate',$info);
			$CI->db->where('bat_id',$id);
			$query = $CI->db->get('newmt');		
			$result = $query->num_rows();
			return $result; 
		 }

		 function info_fetch_countqtr($in,$info,$id)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('residecomplex',$in);
			$CI->db->where('allot',$info);
			$CI->db->where('bat_id',$id);
			$query = $CI->db->get('newquart');		
			$result = $query->num_rows();
			return $result; 
		 }

		 function info_fetch_osireportsan($is)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where("rank",$is);
			$CI->db->where("bat_id",$CI->session->userdata('userid'));
			$query = $CI->db->get('osi_san');		
			$result = $query->row();
			//echo $CI->db->last_query();
			return $result; 
		 }
		 function info_fetch_pposting($in)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = newosip.man_id');
			$CI->db->where('newosi.cexrank',$in);
			$CI->db->where("newosip.batt_id",$CI->session->userdata('userid'));
			$query = $CI->db->get('newosip');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }

		 function info_fetch_updep($table,$where)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			 $CI->db->where($list,$key);
			 endforeach;
			$CI->db->where("bat_id",$CI->session->userdata('userid'));
			$query = $CI->db->get('newosi');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }

		 function info_fetch_updepden($where)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = deinduction.nop');
			$CI->db->where("deinduction.reld",'No');
			$CI->db->where("newosi.cexrank",$where);
			$CI->db->where("newosi.bat_id",$CI->session->userdata('userid'));
			$query = $CI->db->get('deinduction');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }

		 function info_fetch_updepdenli($where)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where("newosi.inductionmode",'Not Reported');
			$CI->db->where("newosi.cexrank",$where);
			$CI->db->where("newosi.bat_id",$CI->session->userdata('userid'));
			$query = $CI->db->get('newosi');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }



		 function info_fetch_osireport($in,$is,$it)
		 {
			$CI= & get_instance();
			$CI->load->database();

			$info = $CI->Btalion_model->fetchinfo('users',array('pid' => $CI->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			if(empty($ninfo[0])){
				$ninfo = $CI->session->userdata('userid');
			}else{
				$ninfo = $ninfo[0];
			}

			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = newosip.man_id');
			$CI->db->where('newosi.cexrank',$in);
			$CI->db->where("newosip.$it",$is);

			$CI->db->where("newosip.batt_id",$ninfo);
			$query = $CI->db->get('newosip');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }


		 function info_fetch_osireportig($in,$is,$it)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = newosip.man_id');
			$CI->db->where('newosi.cexrank',$in);
			$CI->db->where("newosip.$it",$is);
			$CI->db->where("newosip.batt_id",$CI->session->userdata('rid'));
			$query = $CI->db->get('newosip');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }

		 function info_fetch_osireportipgs($in,$is,$it)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = newosip.man_id');
			$CI->db->where('newosi.cexrank',$in);
			$CI->db->where("newosip.$it",$is);
			$CI->db->where("newosip.batt_id",$CI->session->userdata('rid'));
			$query = $CI->db->get('newosip');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }

		  function info_fetch_osireports($in,$is,$it)
		 {
			$CI= & get_instance();
			$CI->load->database();

			$info = $CI->Btalion_model->fetchinfo('users',array('pid' => $CI->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			if(empty($ninfo[0])){
				$ninfo = $CI->session->userdata('userid');
			}else{
				$ninfo = $ninfo[0];
			}

			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = newosip.man_id');
			$CI->db->where('newosi.cexrank',$in);
			if($it == 'awbone9'){
				$CI->db->where_not_in('newosip.awbone9', 'Armourer & A/Armourer');
				$CI->db->where("newosip.$it!=",$is);
			}else{
				$CI->db->where("newosip.$it!=",$is);
			}
			
			$CI->db->where("newosip.batt_id",$ninfo);
			$query = $CI->db->get('newosip');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }

		  function info_fetch_osireportsd($in)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = newosip.man_id');
			$CI->db->where('newosi.cexrank',$in);
			$CI->db->where("newosip.batt_id",$CI->session->userdata('userid'));
			$query = $CI->db->get('newosip');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }

		  function info_fetch_osireportsipgs($in,$is,$it)
		 {
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->join('newosi', 'newosi.man_id = newosip.man_id');
			$CI->db->where('newosi.cexrank',$in);
			$CI->db->where("newosip.$it!=",$is);
			$CI->db->where("newosip.batt_id",$CI->session->userdata('rid'));
			$query = $CI->db->get('newosip');		
			$result = $query->num_rows();
			//echo $CI->db->last_query();
			return $result; 
		 }


		function fetchoneinfo($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$query = $CI->db->get($table);
				$info = $query->row();
			return $info;	
		}

		function fetchoneinfodesc($table,$where,$des){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->order_by($des,'DESC');
			$query = $CI->db->get($table);
			//echo $CI->db->last_query();
				$info = $query->row();
			return $info;
			
			
		}

		function fetchoneinfoall($table,$where){
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

		function fetchoneinfoallgroup($table,$where,$val){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$query = $CI->db->group_by($val);
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchoneinfoammu($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$query = $CI->db->get($table);
			$info = $query->row();
			return $info;
		}

		function fetchoneinfoammuipg($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(qty) AS total');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			//$CI->db->order_by('recinkot','DESC');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchoneinfocartridges($bore,$bores,$id){
			$CI= & get_instance();
			$CI->load->database();
			//$CI->db->select('*');
			$CI->db->select('SUM(mcat) AS mcats');
			$CI->db->select('SUM(ecat) AS ecats');
			$CI->db->select('SUM(locat) AS locats');
			$CI->db->join('issue_arm', 'issue_arm.issue_arm_id = deposit_ammu.issue_arm_id');
			if($bore != ''){
				$CI->db->where('issue_arm.abore',$bore);
			}if($bores !=''){
				$CI->db->where('issue_arm.ammubore',$bores);
			}
			$CI->db->where('issue_arm.bat_id',$id);
			$query = $CI->db->get('deposit_ammu');
			//echo $CI->db->last_query(); die();
			$info = $query->result();
			return $info;
		}

		function fetchoneinfocartridgesp($bore){
			$CI= & get_instance();
			$CI->load->database();
			//$CI->db->select('*');
			$CI->db->select('SUM(mcat) AS mcats');
			$CI->db->select('SUM(ecat) AS ecats');
			$CI->db->select('SUM(locat) AS locats');
			$CI->db->join('issue_arm', 'issue_arm.issue_arm_id = deposit_ammu.issue_arm_id');
			$CI->db->where('issue_arm.ammubore',$bore);
			$query = $CI->db->get('deposit_ammu');
			//echo $CI->db->last_query(); die();
			$info = $query->result();
			return $info;
		}

		function fetchoneinfocartridgesbtnsend($bore,$id){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('deposit_ammu_id',$id);
			$query = $CI->db->get('disdepositammu');
			//echo $CI->db->last_query();
			$info = $query->row();
			return $info;
		}

		function fetchoneinfoqtr($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('SUM(qprice) AS total');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			//$CI->db->order_by('recinkot','DESC');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchoneinfoammuissuipg($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(issued) AS totalis');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->order_by('issued','DESC');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchoneinfoammusankuipg($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(ssainkot) AS totalss');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->order_by('ssainkot','DESC');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}



			function fetchoneinfoammuipgp($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(recinkot) AS total');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->order_by('recinkot','DESC');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchoneinfoammuissuipgp($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(issuedtofiring) AS totalis');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->order_by('	issuedtofiring','DESC');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchoneinfoammusankuipgp($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(ssainkot) AS totalss');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->order_by('ssainkot','DESC');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchoneinfodes($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->order_by('r_no','DESC');
			$query = $CI->db->get($table);
			$info = $query->row();
			return $info;
		}

		function fetchinfoosi($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->group_by('name');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}

		function fetchinfoosit($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			//$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}


		function fetchinfo($table,$where){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			foreach($where as $list =>$key):
			$CI->db->where($list,$key);
			endforeach;
			$CI->db->group_by('nameofitem');
			$query = $CI->db->get($table);
			$info = $query->result();
			return $info;
		}


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


			function armstock($in){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('COUNT(arms_master_id) AS total');
			$CI->db->from(T_IAS);
			$CI->db->where('arms_master_id',$in);
			$query = $CI->db->get();
			$info = $query->row();
			return $info;
			}

			function ammustock($in){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('COUNT(arms_master_id) AS total');
			$CI->db->from(T_IAMS);
			$CI->db->where('arms_master_id',$in);
			$query = $CI->db->get();
			$info = $query->row();
			return $info;
			}

		function info_fetch_countmsk($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('typeofitem',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmsk');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countmskfall($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(qty) AS total');
			$CI->db->where('item',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('mskitemsqty');		
			$result = $query->result();
			return $result; 
		}

		function info_fetch_conly($a,$b,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('SUM(recqut) AS total');
			$CI->db->where('typeofitem',$a);
			$CI->db->where('nameofitem',$b);
			$CI->db->where('conofitem','C');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmsk');		
			$result = $query->result();
			return $result; 
		}

		function info_fetch_countmskissuedfall($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(issued) AS totali');
			$CI->db->where('item',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('mskitemsqty');			
			$result = $query->result();
			return $result; 
		}


		function info_fetch_msksan($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('name',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('msk_san');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countmskitem($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmsk');		
			$result = $query->num_rows();
			return $result; 
		}


		function info_fetch_countserviable($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select_sum('recqut');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('conofitem','A');
			$CI->db->where('bat_id', $id);
			$query1 = $CI->db->get('newmsk');		
			$result = $query1->row();

			return $result;
		}


		function info_fetch_countunserviable($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			
			$CI->db->select('SUM(recqut) AS total');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('conofitem','B');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmsk');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countunserviables($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('recqut');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('conofitem','C');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmsk');		
			$result = $query->row();
			if($result){
				return $result; 
			}else{
				return 0;
			} 
		}


		function info_fetch_mskissued($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('quantity');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('issue_mode','Temporary');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('issue_material');		
			$result = $query->row();
			if($result){
				return $result; 
			}else{
				return 0;
			} 
		}

		function info_fetch_oo($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('recqut');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('conofitem','C');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmsk');		
			$result = $query->row();
			if($result){
				return $result; 
			}else{
				return 0;
			} 
		}

		function info_fetch_countunserviablesdep($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('quantity');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('condition_of_item','C');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('deposit_material');		
			$result = $query->row();
			if($result){
				return $result; 
			}else{
				return 0;
			}
			
		}

		function info_fetch_countunserviablesdepoo($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('quantity');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('condition_of_item','D');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('deposit_material');		
			$result = $query->row();
			if($result){
				return $result; 
			}else{
				return 0;
			}
			
		}


		function info_fetch_countmskitemii($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('name',$in);
			$CI->db->where('bat_id', $id);
			//echo $CI->db->last_query();
			$query = $CI->db->get('mskitemsqty');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countmskitemiis($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('name',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('mskitemsqty');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countmskitemussued($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('nameofitem',$in);
			$CI->db->where('bat_id', $id);
			$CI->db->where('status','Issued');
			$query = $CI->db->get('newmsk');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countmskissued($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('typeofitem',$in);
			$CI->db->where('bat_id', $id);
			$CI->db->where('status','Issued');
			$query = $CI->db->get('newmsk');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countarm($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('tow',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('old_weapon');		
			$result = $query->num_rows();
			return $result; 
		}


		function info_fetch_countarmipg($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('tow',$in);
			$query = $CI->db->get('old_weapon');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countarmsan($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('wep',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('wep_report');
			//echo $CI->db->last_query();			
			$result = $query->row();
			return $result; 
		}

		



		function info_fetch_countarmsanigp($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('wep',$in);
			$query = $CI->db->get('wep_report');

			$result = $query->row();
			return $result; 
		}

		function info_fetch_countarmissued($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('tow',$in);
			$CI->db->where('bat_id', $id);
			$CI->db->where('staofserv','Issued');
			$query = $CI->db->get('old_weapon');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countarmissuedipg($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('tow',$in);
			$CI->db->where('staofserv','Issued');
			$query = $CI->db->get('old_weapon');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countosi($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('rank',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('osi_san');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countosirank($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('presentrank',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newosi');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countqutr($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('typeofqtr',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newquart');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countisuequtr($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('typeofqtr',$in);
			$CI->db->where('allot','allot');
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newquart');		
			$result = $query->num_rows();
			return $result; 
		}


		function info_fetch_countmto($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('rank',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('mto_san');		
			$result = $query->row();
			return $result; 
		}


		function info_fetch_countmtoigp($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('rank',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('mto_san');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countmtoall($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmt');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countmtoalligp($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$query = $CI->db->get('newmt');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_countmtoallinfos($in,$id,$a,$b)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->join('issue_vehicle', 'issue_vehicle.reg_no = newmt.mt_id');
			$CI->db->from('newmt');
			$CI->db->where('newmt.catofvechicle',$in);
			$CI->db->where('issue_vehicle.bat_id', $id);
			$CI->db->where('issue_vehicle.cmonthi',$a);
	 		$CI->db->where('issue_vehicle.cyear1',$b);
	 		$CI->db->group_by('issue_vehicle.reg_no');
			$query = $CI->db->get();		
			$result = $query->result();
			return $result; 
		}

		function info_fetch_countmtoallinforeg($in,$m,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$CI->db->where('regnom',$m);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('newmt');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countmtoallinforegissue($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$in);
			$CI->db->where('cmonthi',date('m'));
			$CI->db->where('cyear1',date('Y'));
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('issue_vehicle');	
			//echo $CI->db->last_query();	
			$result = $query->row();
			return $result; 
		}


		function info_fetch_countmtoallinfosigpss($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$query = $CI->db->get('newmt');		
			$result = $query->result();
			return $result; 
		}

		function info_fetch_countmtoallinfosup($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('r_no',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('update_vechile');		
			$result = $query->result();
			return $result; 
		}

		function info_fetch_countmtoallinfosupigp($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('r_no',$in);
			$query = $CI->db->get('update_vechile');		
			$result = $query->result();
			return $result; 
		}

		function info_fetch_countmtoallinfosman($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('man_id',$in);
			$query = $CI->db->get('newosi');		
			$result = $query->result();
			return $result; 
		}

		function info_fetch_countmtoin($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('catofvechicle',$in);
			$CI->db->where('statusofvechile','In Store');
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$query = $CI->db->get('newmt');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_ammucount($in,$o,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('wep',$in);
			$CI->db->where('name',$o);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('service_ammu_report');		
			$result = $query->row();
			return $result; 
		}


		function info_fetch_ammucountmunition($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('arm',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('munition_quty');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_ammucountpi($in,$o,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('wep',$in);
			$CI->db->where('name',$o);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('practice_ammu_report');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_ammucountigp($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('sun');
			$CI->db->where('wep',$in);
			$query = $CI->db->get('service_ammu_report');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_ammucountp($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('wep',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('practice_ammu_report');		
			$result = $query->row();
			return $result; 
		}



		function info_fetch_ammucountpigp($in)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('wep',$in);;
			$query = $CI->db->get('practice_ammu_report');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countammu($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('ssainkot');
			$CI->db->where('ammubore',$in);
			$CI->db->where('bat_id', $id);
			//echo $CI->db->last_query();
			$query = $CI->db->get('newamu');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_countammus($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('ssainkot');
			$CI->db->where('ammubore',$in);
			$CI->db->where('bat_id', $id);
			//echo $CI->db->last_query();
			$query = $CI->db->get('newamus');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_counthorse()
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$query = $CI->db->get('old_horse');		
			$result = $query->num_rows();
			return $result; 
		}

		function info_fetch_misscart($in,$id,$v)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('mcat');
			$CI->db->where('bore',$in);
			$CI->db->where('ibat_id', $id);
			$CI->db->where('ammutype',$v);
			$query = $CI->db->get('deposit_ammu');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_ecat($in,$id,$v)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('ecat');
			$CI->db->where('bore',$in);
			$CI->db->where('ibat_id', $id);
			$CI->db->where('ammutype',$v);
			$query = $CI->db->get('deposit_ammu');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_lcat($in,$id,$v)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('lcat');
			$CI->db->where('bore',$in);
			$CI->db->where('ibat_id', $id);
			$CI->db->where('ammutype',$v);
			$query = $CI->db->get('deposit_ammu');		
			$result = $query->row();
			return $result; 
		}

		function info_fetch_ammuinus($in,$id)
		{
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select_sum('qnty');
			$CI->db->where('bore',$in);
			$CI->db->where('bat_id', $id);
			$query = $CI->db->get('ammuins');		
			$result = $query->row();
			return $result; 
		}

		function fetchoneinfopol($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS total');
			$CI->db->select('SUM(ramu) AS totals');
			$CI->db->where('rnum',$id);
			$CI->db->where('cmonth',$m);
			$CI->db->where('cyear',$y);
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			$info = $query->row();
			return $info;
		}

		function fetchoneinfopoltotal($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS total');
			$CI->db->select('SUM(ramu) AS totals');
			$CI->db->where('rnum',$id);
			/*if($m == '01' && $y == '2017'){
				$CI->db->where('cmonth','12');
				$CI->db->where('cyear','2016');
			}else{*/
				$CI->db->where('cmonth<=',$m);
				$CI->db->where('cyear',$y);
			/*}*/
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			return $info;
		}

		function fetchoneinfopoltotaldec($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			$CI->db->where('cmonth','12');
			$CI->db->where('cyear',$y);
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}

		function fetchoneinfopoltotaldecii($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			$CI->db->where('cmonth','12');
			$CI->db->where('cyear','2016');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}

		function fetchoneinfopoltotaldeciisss($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2017');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}
		
		function fetchoneinfopoltotaldeciisssa($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2018');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}

		function fetchoneinfopoltotaldeciisssaa($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2019');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}

		function fetchoneinfopoltotaldeciisssb($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2020');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}function fetchoneinfopoltotaldeciisssc($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2021');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}function fetchoneinfopoltotaldeciisssd($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2022');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}function fetchoneinfopoltotaldeciissse($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2023');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}function fetchoneinfopoltotaldeciisssf($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2024');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}function fetchoneinfopoltotaldeciisssg($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->select('SUM(pamo) AS deci');
			$CI->db->select('SUM(ramu) AS decsi');
			$CI->db->where('rnum',$id);
			/*$CI->db->where('cmonth<=','12');*/
			$CI->db->where('cyear','2025');
			$CI->db->where('bat_id', $ids);
			$query = $CI->db->get('mtrepair');
			//echo $CI->db->last_query(); die();
			$info = $query->row();
			if($info !=''){
				return $info;
			}else{
				return 0;
			}
			
		}

		function fetchoneinfopollist($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('rnum',$id);
			$CI->db->where('cmonth',$m);
			$CI->db->where('cyear',$y);
			$CI->db->where('bat_id', $ids);
			$CI->db->order_by('pol_return_id','DESC');
			$query = $CI->db->get('pol_return');
			//echo $CI->db->last_query();
			$info = $query->row();
			return $info;
		}

		function fetchoneinfopollistpost($id,$m,$y,$ids){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi',$m);
			$CI->db->where('cyear1',$y);
			$CI->db->where('bat_id', $ids);
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->row();

			return $info;
		}

		function fetchoneinfopollistpostl($id,$m,$y){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi<=',$m);
			$CI->db->where('cyear1<=',$y);
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->result();
			return $info;
		}

		function fetchoneinfopollistpost2($id,$m,$y){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi<=',$m);
			$CI->db->where('cyear1<=',$y);
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->result();
			return $info;
		}

		function fetchoneinfopollistpost3($id,$m,$y){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi<=',$m);
			$CI->db->where('cyear1<=',$y);
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->result();
			return $info;
		}
		function fetchoneinfopollistpost4($id,$m,$y){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi<=',$m);
			$CI->db->where('cyear1<=',$y);
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->result();
			return $info;
		}
		function fetchoneinfopollistpost5($id,$m,$y){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi<=',$m);
			$CI->db->where('cyear1<=',$y);
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->result();
			return $info;
		}
		function fetchoneinfopollistpost6($id,$m,$y){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi<=',$m);
			$CI->db->where('cyear1<=',$y);
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->result();
			return $info;
		}
		function fetchoneinfopollistpost7($id,$m,$y){
			$CI= & get_instance();
			$CI->load->database();
			$CI->db->select('*');
			$CI->db->where('reg_no',$id);
			$CI->db->where('cmonthi<=',$m);
			$CI->db->where('cyear1<=',$y);
			$CI->db->where('bat_id', $CI->session->userdata('userid'));
			$CI->db->order_by('issue_vehicle_id','DESC');
			$query = $CI->db->get('issue_vehicle');
			//echo $CI->db->last_query();
			$info = $query->result();
			return $info;
		}

?>