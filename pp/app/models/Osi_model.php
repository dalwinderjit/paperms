<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Osi_model extends CI_Model{
		public function getAllUsers($columns,$LIMIT){
			//var_dump($columns);
			//echo'<hr>';
			if(in_array('eduqalification',$columns)){
				$columns = array_merge(array('concat_ws(" ",eduqalification," ",UnderGraduate," ",Graduate," ",PostGraduate," ",Doctorate," ",Doctorateother) as eduqalification1'),$columns);
				//$columns = array_merge(array('concat(eduqalification,"P ",UnderGraduate," ",Graduate," ",PostGraduate," ",Doctorate," ",Doctorateother)as eduqalification1'),$columns);
			}
			$columns = array_merge(array('dateofposting1'),$columns );
			
			if(in_array('ierank',$columns)){
				//$columns = array_merge(array('cexrank', 'cminirank', 'ccprank', 'cccrank', 'cmedirank'),$columns);
				$columns = array_merge(array('concat_ws(" ",cexrank," ",cminirank," ",ccprank," ",cccrank," ",cmedirank) as ierank1'),$columns);
			}
			if(in_array('newosi.bat_id',$columns)){
				$this->db->join('users','users.users_id = newosi.bat_id','left');
				$this->db->where('newosi.bat_id !=',0);
				$columns =array_merge(array('users.nick as nickname'),$columns);
			}
			$this->db->join('seccover','newosi.man_id = seccover.man_id','left');
			$columns = array_merge(array('seccover.name as officer_name'),$columns);
			//if(in_array('posting_concat',$columns)){
			if(true){
				$this->db->join('newosip','newosip.man_id = newosi.man_id','left');
				$columns =array_merge(array('concat_ws(" ",newosip.fone1," ",newosip.vploc," ",newosip.vpdis," ",newosip.fone2," ",newosip.noj," ",newosip.jsdis," ",newosip.fone3," ",newosip.fone4," ",newosip.fone5," ",newosip.osgloc," ",newosip.osgdis," ",newosip.fone6," ",newosip.fone7," ",newosip.fone8," ",newosip.fone9," ",newosip.bsdnob," ",newosip.bsddis," ",newosip.bsdloc," ",newosip.fone10," ",newosip.fone11," ",newosip.fone12," ",newosip.lone1," ",newosip.perdupod," ",newosip.perdudis," ",newosip.perduorno," ",newosip.perduordate," ",newosip.lone2," ",newosip.dgppod," ",newosip.dgpdis," ",newosip.dgporno," ",newosip.dgpordate," ",newosip.lone3," ",newosip.tertdpod," ",newosip.tertddis," ",newosip.tertdorno," ",newosip.tertdordate," ",newosip.sqone1," ",newosip.sqone2," ",newosip.sqone3," ",newosip.sqone4," ",newosip.sqone5," ",newosip.sstgpod," ",newosip.sstgdis," ",newosip.sstgorno," ",newosip.sstgordate," ",newosip.sqone6," ",newosip.sqone7," ",newosip.sqone8," ",newosip.swatpod," ",newosip.swatdis," ",newosip.swatorno," ",newosip.swatordate," ",newosip.paone1," ",newosip.paone2," ",newosip.awdpmpod," ",newosip.awdpmorno," ",newosip.awdpmordate," ",newosip.paone3," ",newosip.awdpfpod," ",newosip.awdpforno," ",newosip.awdpfordate," ",newosip.paone4," ",newosip.awdpompod," ",newosip.awdpomorno," ",newosip.awdpomordate," ",newosip.paone5," ",newosip.awdpofpod," ",newosip.awdpoforno," ",newosip.awdpofordate," ",newosip.paone6," ",newosip.paone7," ",newosip.paone8," ",newosip.paone9," ",newosip.paone10," ",newosip.paone11," ",newosip.paone12," ",newosip.paone13," ",newosip.paone14," ",newosip.paone15," ",newosip.paone16," ",newosip.paone17," ",newosip.paone18," ",newosip.paone19," ",newosip.paone20," ",newosip.paone21," ",newosip.paone22," ",newosip.paone23," ",newosip.paone24," ",newosip.paone27," ",newosip.ssone23," ",newosip.dsopod," ",newosip.dsoorno," ",newosip.dsoordate," ",newosip.ssone24," ",newosip.csojalorno," ",newosip.csojalordate," ",newosip.ssone25," ",newosip.mispatorno," ",newosip.mispatordate," ",newosip.ssone26," ",newosip.othersnod," ",newosip.othersnodis," ",newosip.othersorno," ",newosip.othersordate," ",newosip.awbone1," ",newosip.awbone2," ",newosip.pssawonof," ",newosip.pssaworank," ",newosip.pssawoordate," ",newosip.awbone3," ",newosip.osihonoo," ",newosip.awbone4," ",newosip.Readerosinbo," ",newosip.Orderly," ",newosip.telopr," ",newosip.darrun," ",newosip.awbone5," ",newosip.bnkgdop," ",newosip.awbone6," ",newosip.bhogpog," ",newosip.bhogdop," ",newosip.awbone7," ",newosip.tradestot," ",newosip.tradestt," ",newosip.tradesbat," ",newosip.tradesdop," ",newosip.tradesdop," ",newosip.tradesorno," ",newosip.awbone8," ",newosip.awbone8," ",newosip.mtsecpod," ",newosip.mtsecvehno," ",newosip.mtsecdop," ",newosip.mtsecorno," ",newosip.awbone9,
				" ",newosip.quartbradop," ",newosip.quartbraorno," ",newosip.awbone10," ",newosip.awbone11," ",newosip.awbone12," ",newosip.awbone13,
				" ",newosip.recrutnorb," ",newosip.recrutorno," ",newosip.recrutordate," ",newosip.bmdone1," ",newosip.bmdone2," ",newosip.leavefrom," ",newosip.leaveto," ",newosip.bmdone3," ",newosip.absentfrom," ",newosip.absentddr," ",newosip.absentdate," ",newosip.bmdone4," ",newosip.usdos," ",newosip.usros," ",newosip.bmdone5," ",newosip.bmdone6," ",newosip.bmdone7," ",newosip.bmdone8," ",newosip.bmdone9," ",newosip.bmdone10," ",newosip.instone1," ",newosip.instone2," ",newosip.instone3," ",newosip.instone4," ",newosip.instone10," ",newosip.traning1," ",newosip.traning2," ",newosip.traning3," ",newosip.btarin1," ",newosip.btarin2," ",newosip.btarin3," ",newosip.btarin4," ",newosip.btarin5," ",newosip.btarin6," ",newosip.btarin7," ",newosip.btarin8," ",newosip.btarin9," ",newosip.btarin10,
				" ",newosip.cfpop," ",newosip.cfppd," ",newosip.cfpdop," ",newosip.game," ",newosip.adminstaff) as posting_concat1'),$columns);
			}	
			$cols = implode(',', $columns);
			$this->db->select($cols);
			if($LIMIT===FALSE){
				//$this->db->limit(100);
			}else{
				//echo 'unlimited';
				$this->db->limit(10);
			}
			$query = $this->db->get('newosi');
			$result = $query->result();
			
			return $result;
		}
		/*Fetch all info start*/
		public function fetchinfo($table,$where){
			$this->db->select('*');
			foreach($where as $list =>$key):
			$this->db->where($list,$key);
			endforeach;
			$query = $this->db->get($table);
			$info = $query->result();
			return $info;
		}/*Close*/
		
		
		#################
		function get_users_countosiall_ajax($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes, $basic_training_center ,$batch_number , $passoutyear) {
			$this->db->select('count(*) as total');
			//newosi.man_id,name,cexrank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,bunitdistrict,bat_id');
			//$this->db->join('newosip','newosip.man_id = newosi.man_id','left');
			//$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes);
			//$this->battalionOrderBy($RankRankre,$ito);
			
			if(isset($ito) && !empty($ito)){
				$this->db->where_in('newosi.bat_id', $ito);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
			$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
			}else{
				$this->db->where('newosi.bat_id!=',0);
			}
			//$status = $this->wherePostingCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes);
			
			$query = $this->db->get('newosi');
			//echo $this->db->last_query();
			//var_dump($query);
			//echo "'<b>".$query->num_rows()."</b>'";
			//die;
			return $query->result()[0]->total;
		}
                function get_filtered_users_countosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes, $basic_training_center ,$batch_number , $passoutyear,$employee_ids) {
                    //var_dump($employee_ids);
			$this->db->select('count(*) as total');
			//newosi.man_id,name,cexrank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,bunitdistrict,bat_id');
			//$this->db->join('newosip','newosip.man_id = newosi.man_id','left');
			$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$employee_ids, $basic_training_center ,$batch_number , $passoutyear);
			//$this->battalionOrderBy($RankRankre,$ito);
			
			if(isset($ito) && !empty($ito)){
				$this->db->where_in('newosi.bat_id', $ito);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
			$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
			}else{
				$this->db->where('newosi.bat_id!=',0);
			}
			//$status = $this->wherePostingCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes);
			
			$query = $this->db->get('newosi');
			//echo $this->db->last_query();
			//var_dump($query);
			//echo "'<b>".$query->num_rows()."</b>'";
			//die;
			return $query->result()[0]->total;
		}
		function get_users_countosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes) {
			$this->db->select('count(*) as total');
			//newosi.man_id,name,cexrank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,bunitdistrict,bat_id');
			//$this->db->join('newosip','newosip.man_id = newosi.man_id','left');
			//$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes);
			//$this->battalionOrderBy($RankRankre,$ito);
			
			if(isset($ito) && !empty($ito)){
				$this->db->where_in('newosi.bat_id', $ito);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
			$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
			}else{
				$this->db->where('newosi.bat_id!=',0);
			}
			//$status = $this->wherePostingCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes);
			
			$query = $this->db->get('newosi');
			//echo $this->db->last_query();
			//var_dump($query);
			//echo "'<b>".$query->num_rows()."</b>'";
			//die;
			return $query->result()[0]->total;
		}
		#################
	function get_usersosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$EnlistmentUnit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$limit,$start,$mobno,$classes,$advanceSearch,$employee_ids=null) {
		/* echo $start;
		echo $limit;
		die; */
			$posting_concat ='concat_ws (" ",newosip.fone1," ",newosip.vploc," ",newosip.vpdis," ",newosip.fone2," ",newosip.noj," ",newosip.jsdis," ",newosip.fone3," ",newosip.fone4," ",newosip.fone5," ",newosip.osgloc," ",newosip.osgdis," ",newosip.fone6," ",newosip.fone7," ",newosip.fone8," ",newosip.fone9," ",newosip.bsdnob," ",newosip.bsddis," ",newosip.bsdloc," ",newosip.fone10," ",newosip.fone11," ",newosip.fone12," ",newosip.lone1," ",newosip.perdupod," ",newosip.perdudis," ",newosip.perduorno," ",newosip.perduordate," ",newosip.lone2," ",newosip.dgppod," ",newosip.dgpdis," ",newosip.dgporno," ",newosip.dgpordate," ",newosip.lone3," ",newosip.tertdpod," ",newosip.tertddis," ",newosip.tertdorno," ",newosip.tertdordate," ",newosip.sqone1," ",newosip.sqone2," ",newosip.sqone3," ",newosip.sqone4," ",newosip.sqone5," ",newosip.sstgpod," ",newosip.sstgdis," ",newosip.sstgorno," ",newosip.sstgordate," ",newosip.sqone6," ",newosip.sqone7," ",newosip.sqone8," ",newosip.swatpod," ",newosip.swatdis," ",newosip.swatorno," ",newosip.swatordate," ",newosip.paone1," ",newosip.paone2," ",newosip.awdpmpod," ",newosip.awdpmorno," ",newosip.awdpmordate," ",newosip.paone3," ",newosip.awdpfpod," ",newosip.awdpforno," ",newosip.awdpfordate," ",newosip.paone4," ",newosip.awdpompod," ",newosip.awdpomorno," ",newosip.awdpomordate," ",newosip.paone5," ",newosip.awdpofpod," ",newosip.awdpoforno," ",newosip.awdpofordate," ",newosip.paone6," ",newosip.paone7," ",newosip.paone8," ",newosip.paone9," ",newosip.paone10," ",newosip.paone11," ",newosip.paone12," ",newosip.paone13," ",newosip.paone14," ",newosip.paone15," ",newosip.paone16," ",newosip.paone17," ",newosip.paone18," ",newosip.paone19," ",newosip.paone20," ",newosip.paone21," ",newosip.paone22," ",newosip.paone23," ",newosip.paone24," ",newosip.paone27," ",newosip.ssone23," ",newosip.dsopod," ",newosip.dsoorno," ",newosip.dsoordate," ",newosip.ssone24," ",newosip.csojalorno," ",newosip.csojalordate," ",newosip.ssone25," ",newosip.mispatorno," ",newosip.mispatordate," ",newosip.ssone26," ",newosip.othersnod," ",newosip.othersnodis," ",newosip.othersorno," ",newosip.othersordate," ",newosip.awbone1," ",newosip.awbone2," ",newosip.pssawonof," ",newosip.pssaworank," ",newosip.pssawoordate," ",newosip.awbone3," ",newosip.osihonoo," ",newosip.awbone4," ",newosip.Readerosinbo," ",newosip.Orderly," ",newosip.telopr," ",newosip.darrun," ",newosip.awbone5," ",newosip.bnkgdop," ",newosip.awbone6," ",newosip.bhogpog," ",newosip.bhogdop," ",newosip.awbone7," ",newosip.tradestot," ",newosip.tradestt," ",newosip.tradesbat," ",newosip.tradesdop," ",newosip.tradesdop," ",newosip.tradesorno," ",newosip.awbone8," ",newosip.awbone8," ",newosip.mtsecpod," ",newosip.mtsecvehno," ",newosip.mtsecdop," ",newosip.mtsecorno," ",newosip.awbone9,
			" ",newosip.quartbradop,
			" ",newosip.quartbraorno,
			" ",newosip.awbone10,
			" ",newosip.awbone11,
			" ",newosip.awbone12,
			" ",newosip.awbone13,
			" ",newosip.recrutnorb,
			" ",newosip.recrutorno,
			" ",newosip.recrutordate,
			" ",newosip.bmdone1,
			" ",newosip.bmdone2,
			" ",newosip.leavefrom,
			" ",newosip.leaveto,
			" ",newosip.bmdone3,
			" ",newosip.absentfrom,
			" ",newosip.absentddr,
			" ",newosip.absentdate,
			" ",newosip.bmdone4,
			" ",newosip.usdos,
			" ",newosip.usros,
			" ",newosip.bmdone5,
			" ",newosip.bmdone6,
			" ",newosip.bmdone7,
			" ",newosip.bmdone8,
			" ",newosip.bmdone9,
			" ",newosip.bmdone10,
			" ",newosip.instone1,
			" ",newosip.instone2,
			" ",newosip.instone3,
			" ",newosip.instone4,
			" ",newosip.instone10,
			" ",newosip.traning1,
			" ",newosip.traning2,
			" ",newosip.traning3,
			" ",newosip.btarin1,
			" ",newosip.btarin2,
			" ",newosip.btarin3,
			" ",newosip.btarin4,
			" ",newosip.btarin5,
			" ",newosip.btarin6,
			" ",newosip.btarin7,
			" ",newosip.btarin8,
			" ",newosip.btarin9,
			" ",newosip.btarin10,
			" ",newosip.cfpop,
			" ",newosip.cfppd,
			" ",newosip.cfpdop,
			" ",newosip.game,
			" ",newosip.adminstaff) as posting_concat1, newosip.dateofposting1 as dateofposting1';
			//}
			$officernamecolumns = ',seccover.name as officer_name';
			//$officernamecolumns = '';

				$this->db->select('newosi.man_id,newosi.name as name,cexrank,permanent_rank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,bunitdistrict,newosi.bat_id, newosi.EnlistmentUnit, newosi.houseno,newosi.streetno,newosi.wardno,newosi.villmohala,newosi.city,newosi.postoffice, newosi.policestation,newosi.teshil,newosi.district,newosi.Nationality,newosi.nstate,newosi.state,newosi.pan,newosi.adharno,newosi.nameofbank,newosi.nameofbranch,newosi.bankacno,newosi.ifsccode,newosi.identificationmark,newosi.feet,newosi.inch,newosi.modeofrec,newosi.gpfpranno, '.$posting_concat.$officernamecolumns);
				
                                				$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$employee_ids, $basic_training_center=null ,$batch_number =null, $passoutyear=null);
				
				$userLog = $this->session->userdata('user_log');
				//die($userLog);
				if($userLog==4){
					//echo 'Battalion';
					//var_dump($ito);
					$this->battalionOrderBy($RankRankre,$ito);
				}else if($userLog!=4 && isset($ito) && count($ito)==1){
					//echo 'IGP';
					//var_dump($ito);
					//echo '<hr>';
					//var_dump($RankRankre);
					$this->battalionOrderBy($RankRankre,$ito);
				}else{ 
					if($advanceSearch!=null){
						$mode = 'ADVANCED';
						//echo 'IGp Multiple batalions';
						$this->battalionOrderBy($RankRankre,$ito,$mode);
					}
				}
				$this->db->join('newosip','newosip.man_id = newosi.man_id','left');
				$this->db->join('seccover','newosi.man_id = seccover.man_id','left');
				//echo $this->db->get_compiled_select('newosi');
				//die;
				
				 
				
				$status = $this->wherePostingCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$limit,$start,$mobno,$classes);
				
				if($start == '0'){
					$this->db->limit($limit,0);
				 }else{
				 	$this->db->limit($limit, $start);
				 }
				
				
				 
				$query = $this->db->get('newosi');
				//echo '<hr>';
                                if($employee_ids!=null){
                                    //echo $this->db->last_query(); 
                                }
                                
				//die();
				if ($query->num_rows() > 0) {
					return $query->result();
				}
			
	 	}
		public function whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$employee_ids=null, $basic_training_center =null,$batch_number =null, $passoutyear=null,$search_age_filter = null,$dob_created_from=null,$dob_created_to=null,$excluded_employee_ids=null){  
                    
			//var_dump($dob_created_from);    
			if($excluded_employee_ids!=null){
				if(is_array($excluded_employee_ids) && count($excluded_employee_ids)>0){
					if(count($excluded_employee_ids)>250){
						$excluded_employee_ids_array = array_chunk($excluded_employee_ids,250);
						$this->db->group_start();
						foreach($excluded_employee_ids_array as $k=>$array){
							$this->db->where_not_in('man_id',$array);
						}
						$this->db->group_end();
						
					}else{
						$this->db->where_not_in('man_id',$excluded_employee_ids);
					}
				}
			}
			if($mobno !=''){
			 $this->db->like('phono1', $mobno);
			}if($name !=''){
			 $this->db->like('newosi.name', $name);
			}if($bloodgroup !='' && count($bloodgroup)>0 && !empty($bloodgroup)){
				$bg = array();
				foreach($bloodgroup as $k=>$v){
					if(trim($v)!=''){
						$bg[] = $v;
					}
				}
				if(count($bg)>0){
					$this->db->where_in('bloodgroup', $bg);
				}
			}
			if($rcnum !=''){
				$regimental_nos = explode(',',$rcnum);
				//var_dump($regimental_nos);
				if(count($rcnum)>0){
					$this->db->group_start();
					foreach($regimental_nos as $k=>$v){
						//echo '['.$v.']';
						$this->db->or_where('trim(depttno)', trim($v));
					}	
					$this->db->group_end();
				}
			}if($RankRankre !=''){
				if($RankRankre == 'Executive Staff'){
					if($eor1 !=''&& count($eor1)>0){
						$ranks_ = [];
						foreach($eor1 as $k=>$v){
							if(trim($v)!=''){
								$ranks_[] = $v;
							}
						}
						
						if(count($ranks_)>0){
							$this->db->where_in('newosi.cexrank', $ranks_);
						}else{
							$this->db->where('newosi.presentrank', 'Executive Staff');
						}
					}else{
						$this->db->where('newosi.presentrank', 'Executive Staff');
					}
				}
				elseif($RankRankre == 'Ministerial Staff'){
					if($eor2 !='' && count($eor2)>0){
						$ranks_ = [];
						foreach($eor2 as $k=>$v){
							if(trim($v)!=''){
								$ranks_[] = $v;
							}
						}
						
						if(count($ranks_)>0){
							$this->db->where_in('newosi.cminirank', $ranks_);
						}else{
							$this->db->where('newosi.presentrank', 'Ministerial Staff');
						}
					}else{
						$this->db->where('newosi.presentrank', 'Ministerial Staff');
					}
				}
				elseif($RankRankre == 'Medical Staff'){
					if($eor3 !='' && count($eor3)>0){
						$ranks_ = [];
						foreach($eor3 as $k=>$v){
							if(trim($v)!=''){
								$ranks_[] = $v;
							}
						}
						if(count($ranks_)>0){
							$this->db->where_in('newosi.cmedirank', $ranks_);
						}else{
							$this->db->where('newosi.presentrank', 'Medical Staff');
						}
					}else{
						$this->db->where('newosi.presentrank', 'Medical Staff');
					}
				}
				elseif($RankRankre == 'Class-IV (P)'){
					if($eor4 !='' && count($eor4)>0){
						$ranks_ = [];
						foreach($eor4 as $k=>$v){
							if(trim($v)!=''){
								$ranks_[] = $v;
							}
						}
						if(count($ranks_)>0){
							$this->db->where_in('newosi.ccprank', $ranks_);
						}else{
							$this->db->where('newosi.presentrank', 'Class-IV (P)');
						}
					}else{
						$this->db->where('newosi.presentrank', 'Class-IV (P)');
					}
				}
				elseif($RankRankre == 'Class-IV (C)'){
					
					if($eor5 !='' && count($eor5)>0){
						$ranks_ = [];
						foreach($eor5 as $k=>$v){
							if(trim($v)!=''){
								$ranks_[] = $v;
							}
						}
						
						if(count($ranks_)>0){
							$this->db->where_in('newosi.cccrank', $ranks_);
						}else{
							$this->db->where('newosi.presentrank', 'Class-IV (C)');
						}
					}else{
						$this->db->where('newosi.presentrank', 'Class-IV (C)');
					}
				}
			
			}
			if(is_array($postate)){
				if(!empty($postate)){
					$this->db->where_in('state', $postate);		
				}
			}else if($postate !=''){
			 $this->db->where('state', $postate);
			}
			if(is_array($pcity)){
				if(!empty($pcity)){
					$this->db->where_in('district', $pcity);		
				}
			}else if($pcity !=''){
			 	$this->db->where('district', $pcity);
			}
                        //var_dump($search_age_filter);
                        if($search_age_filter!=null){
                            
                            switch($search_age_filter['AGE_FILTER_TYPE']){
                                case 'RANGE_FILTER':
                                    $this->db->where('newosi.dateofbith <= ',$search_age_filter['date_of_birth_from']);
                                    $this->db->where('newosi.dateofbith >= ',$search_age_filter['date_of_birth_to']);
                                break;
                                case 'GREATOR_THAN_FILTER':
                                    $this->db->where('newosi.dateofbith < ',$search_age_filter['date_of_birth']);
                                break;
                                case 'GREATOR_THAN_EQUAL_TO_FILTER':
                                    $this->db->where('newosi.dateofbith <= ',$search_age_filter['date_of_birth']);
                                break;
                                case 'LESS_THAN_FILTER':
                                    //echo 'hi';
                                    $this->db->where('newosi.dateofbith >',$search_age_filter['date_of_birth']);
                                break;
                                case 'LESS_THAN_EQUAL_TO_FILTER':
                                    $this->db->where('newosi.dateofbith >= ',$search_age_filter['date_of_birth']);
                                break;
                                case 'EXACT_FILTER':
                                    $this->db->where('newosi.dateofbith',$search_age_filter['date_of_birth']);
                                break;
                            }
                        
                        }
			$tree_education = array('Under Graduate','Graduate','Post Graduate','Doctorate');
			$selected_tree_education = array();
			$selected_simple_education = array();
			if(isset($stts) && !empty($stts)){
				//die('helo');
				foreach($stts as $k=>$v){
					if(in_array($v,$tree_education)){
						$selected_tree_education[] = $v;
					}else{
						$selected_simple_education[] = $v;
					}
				}
				if(isset($selected_tree_education) && !empty($selected_tree_education)){
					$this->db->where_in('newosi.eduqalification',$selected_tree_education);
					if(isset($classes) && !empty($classes)){
						$this->db->group_start();
						foreach($selected_tree_education as $k=>$v){
							switch($v){
								case 'Under Graduate':
									$this->db->or_where_in('newosi.UnderGraduate',$classes);
									break;
								case 'Graduate':
									$this->db->or_where_in('newosi.Graduate',$classes);
									break;
								case 'Post Graduate':
									$this->db->or_where_in('newosi.PostGraduate',$classes);
									break;
								case 'Doctorate':
									$this->db->or_where_in('newosi.Doctorate',$classes);
									break;
							}
						}
						$this->db->group_end();
					}	
				}
				if(isset($selected_simple_education) && !empty($selected_simple_education)){
					$this->db->or_where_in('newosi.eduqalification',$selected_simple_education);
				}
			}
			if($gender !='' && count($gender)>0){
				$gdr = [];
				foreach($gender as $k=>$v){
					$gdr[] = $v;
				}
				if(count($gdr)>0){
					$this->db->where_in('gender', $gdr);
				}
			}if($height !=''){
			 $this->db->where('feet', $height);
			}if($inch !=''){
			 $this->db->where('inch', $inch);
			}if($single !='' && count($single)>0){
				$s=[];
				foreach($single as $k=>$v){
					if(trim($v)!=''){
						$s[] = $v;
					}
				}
				if(count($s)){
					$this->db->where_in('maritalstatus', $s);
				}
			}
			if($Modemdr !='' && count($Modemdr)>0){
				$mdr = [];
				foreach($Modemdr as $k=>$v){
					if(trim($v)!=''){
						$mdr[] = $v;
					}
				}
				if(count($mdr)>0){
					$this->db->where_in('modeofrec', $Modemdr);
				}
			}
			if($Rankre !='' && count($Rankre)>0){
				$rankre__ = [];
				foreach($Rankre as $k=>$v){
					if(trim($v)!=''){
						$rankre__[] = $v;
					}
				}
				if(count($rankre__)>0){
					$this->db->where_in('rankofenlistment', $rankre__);
				}
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
			if(isset($ito) && !empty($ito)){
				$this->db->where_in('newosi.bat_id', $ito);
			}
			if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
			$this->db->where_in('bat_id',array('192','167','156','115','110','162','123'));
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$this->db->where_in('bat_id',array('100','174','144','150','180','198'));
			}else{
				$this->db->where('newosi.bat_id!=',0);
			}
			if($employee_ids!=null){
                            if(is_array($employee_ids)){
								if(count($employee_ids)>250){
									$employee_ids_aray = array_chunk($employee_ids,250);
									$this->db->group_start();
									foreach($employee_ids_aray as $k1=>$val1){

										$this->db->or_where_in('newosi.man_id',$val1);	
									}
									$this->db->group_end();
								}else{
									$this->db->where_in('newosi.man_id',$employee_ids);
								}

                                
                            }    
			}
                        if($basic_training_center!=null && trim($basic_training_center)!=''){
                            $this->db->like('newosi.btic',$basic_training_center);
                        }
                        if($batch_number!=null && trim($batch_number)!=''){
                            $this->db->like('newosi.batchgroup',$batch_number);
                        }
                        if($passoutyear!=null && trim($passoutyear)!=''){
                            $this->db->like('newosi.passoutyear',$passoutyear);
                        }
                        if($dob_created_from!=null && $dob_created_to!=null){
                            $this->db->group_start();
                            $this->db->where('substr(dateofbith,5) >= ',$dob_created_from);
                            $this->db->where('substr(dateofbith,5) <= ',$dob_created_to);
                            $this->db->group_end();
                            
                        }
		}
		public function battalionOrderBy($RankRankre,$ito,$mode='NORMAL',$birthday=null){
			//if($this->session->userdata('user_log')==4){
			$orderbystr = '';
			if($mode=='NORMAL'){
				if(null!=$RankRankre && !empty($RankRankre) && trim($RankRankre)!=''){
					$rankOrder = $this->getRankOrder($RankRankre);	
					$rankColumn = $this->getRankColumn($RankRankre);
					$str = ' FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
					//echo $str;
					//$this->db->_protect_identifiers=false;
                                        if($birthday!=null){
                                            $orderbystr .= ', substr(dateofbith,5,6) asc ';
                                            $this->db->order_by(' FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')'. $orderbystr);
                                        }else{
                                            $this->db->order_by(' FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')');
                                        }
					//$this->db->_protect_identifiers=true;
                                        
					
				}else{
					//echo 'hi';
					$staffOrder = $this->getStaffOrder();
					$rankColumn = 'presentrank';
					$orderbystr = 'FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$staffOrder).'\')';
					//echo $orderbystr;

					//$this->db->order_by('FIELD(newosi.'.$rankColumn.',"'.implode('","',$staffOrder).'") asc');
					if(count($staffOrder)>0){
						foreach($staffOrder as $k=>$val){
							if(trim($val)!=''){
								$RankRankre = $val;
								$rankOrder = $this->getRankOrder($RankRankre);	
								$rankColumn = $this->getRankColumn($RankRankre);
								$orderbystr .=',FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
							
							//$this->db->order_by('FIELD(newosi.'.$rankColumn.',"'.implode('","',$rankOrder).'") asc');
							}
						}
						//$RankRankre = $staffOrder[0];
					}
                                        if($birthday!=null){
                                            $orderbystr .= ', substr(dateofbith,5,6) asc ';
                                        }
					if(trim($orderbystr)!=''){
						//echo 'hihi';
						//echo '<br>'.$orderbystr;
						//$this->db->protect_identifiers=false;
						$this->db->order_by($orderbystr);
						//$this->db->protect_identifiers=true;
					}
				}
			}elseif($mode="ADVANCED"){
				//var_dump($RankRankre);
				//echo 'In Advance';
				//$sortedBattalions = $this->sortBattalions($ito);
				//var_dump($ito);
				$orderbystr = 'FIELD(newosi.bat_id,\''.implode('\',\'',$ito).'\')';
				$staffOrder = $this->getStaffOrder();	
				$rankColumn = 'presentrank';
				$orderbystr .= ',FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$staffOrder).'\')';
				//echo "\n".$orderbystr."\n";
				//var_dump($staffOrder);
				//echo "\n";
				//$this->db->order_by('FIELD(newosi.'.$rankColumn.',"'.implode('","',$staffOrder).'") asc');
				if(count($staffOrder)>0){
					//echo "Staff order > 0\n";
					foreach($staffOrder as $k=>$val){
						if(trim($val)!=''){
							$RankRankre = $val;
							$rankOrder = $this->getRankOrder($RankRankre);	
							$rankColumn = $this->getRankColumn($RankRankre);
							$orderbystr .=', FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
							//$this->db->order_by('FIELD(newosi.'.$rankColumn.',"'.implode('","',$rankOrder).'") asc');
						}
					}
					//$RankRankre = $staffOrder[0];
				}
                                if($birthday!=null){
                                    $orderbystr .= ', substr(dateofbith,5,6) asc ';
                                }
				if(trim($orderbystr)!=''){
					//echo $orderbystr;
					//$this->db->_protect_identifiers=false;
					$this->db->order_by($orderbystr);
					//$this->db->_protect_identifiers=true;
				}
			}
		}
		
		public function wherePostingCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes){
			if($Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' ||  $Postingtiset4 !='' || $Postingtiset5 !='' || $Postingtiset6 !=''  || $Postingtiset7 !='' ||  $Postingtiset8 !='' || $Postingtiset9 !=''){
				//$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
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
				$this->db->like('newosip.instone4', $Postingtiset9);
				}if($Postingtiset9 =='IRB Institutions'){
					$this->db->like('newosip.instone1', $Postingtiset9);
				}if($Postingtiset9 =='PAP Outer Bn Institutions'){
					$this->db->like('newosip.instone3', $Postingtiset8);
				}if($Postingtiset9 =='CDO Institutions'){
					$this->db->like('newosip.instone2', $Postingtiset9);
				}/*close 9*/
				return true;
			}
			return false;
		}
		/* Where posting conditions */
		public function wherePostingCondition2($Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9){
				//$this->db->join('newosip', 'newosip.man_id = newosi.man_id');
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
				$this->db->like('newosip.instone4', $Postingtiset9);
				}if($Postingtiset9 =='IRB Institutions'){
					$this->db->like('newosip.instone1', $Postingtiset9);
				}if($Postingtiset9 =='PAP Outer Bn Institutions'){
					$this->db->like('newosip.instone3', $Postingtiset8);
				}if($Postingtiset9 =='CDO Institutions'){
					$this->db->like('newosip.instone2', $Postingtiset9);
				}/*close 9*/
				
		}
		function getStaffOrder(){
			return [
				'Executive Staff',
				'Ministerial Staff',
				'Medical Staff',
				'Class-IV (P)',
				'Class-IV (C)',
				'',
				null
			];
		}
		function getRankColumn($staff){
		$column = null;
		switch($staff){
			case 'Executive Staff':
				$column = 'cexrank';
				break;
			case 'Ministerial Staff':
				$column = 'cminirank';
				break;
			case 'Medical Staff':
				$column = 'cmedirank';
				break;
			case 'Class-IV (P)':
				$column = 'ccprank';
				break;
			case 'Class-IV (C)':
				$column = 'cccrank';
				break;
			default:
				$column = $staff;
				;
		}
		return $column;
	}
	function getRankOrder($staff){
		$rank = null;
		switch($staff){
			case 'Executive Staff':
				$rank = [
					'Commandant' => 'Commandant',
					'Asst. Commandant' =>'Asst. Commandant',
					'SP' => 'SP',
					'SP/CR' => 'SP/CR',
					'AIG' => 'AIG',
					'DSP' =>'DSP',
					'DSP/CR' =>'DSP/CR',
					'INSP' => 'INSP',
					'INSP/LR' => 'INSP/LR',
					'INSP/CR' => 'INSP/CR',
					'SI' => 'SI',
					'SI/LR' => 'SI/LR',
					'SI/CR' => 'SI/CR',
					'ASI' => 'ASI',
					'ASI/CR' => 'ASI/CR',
					'ASI/LR' => 'ASI/LR',
					'HC' => 'HC',
					'HC/PR' => 'HC/PR',
					'HC/CR' => 'HC/CR',
					'HC/LR' => 'HC/LR',
					'C-II' => 'C-II',
					'Sr.Const' => 'Sr.Const',
					'CT' => 'CT'
				];
				break;
			case 'Ministerial Staff':
				$rank = [
					'Supdt Grade-I'=>'Supdt Grade-I',
					'SubSupdt Grade-II' => 'Supdt Grade-II',
					'Senior Asstt.' => 'Senior Asstt.',
					'Junior Asstt.' => 'Junior Asstt.', 
					'Clerk' => 'Clerk', 
					'Peon' => 'Peon', 
					'Daftari' => 'Daftari'
				];
				break;
			case 'Medical Staff':
				$rank = [
					'Doctor' => 'Doctor',
					'Pharmacist' => 'Pharmacist', 
					'Physiotherapist' => 'Physiotherapist', 
					'Lab Technician' => 'Lab Technician', 
					'Nursing Asstt.' => 'Nursing Asstt.'
				];
				break;
			case 'Class-IV (P)':
				$rank = [
					'Cook' => 'Cook',
					'Water Carrier' => 'Water Carrier',
					'Sweeper' => 'Sweeper', 
					'Dhobi' => 'Dhobi', 
					'Mochi' => 'Mochi', 
					'Barber' => 'Barber', 
					'Tailor' => 'Tailor', 
					'Carpenter' => 'Carpenter',
					'Mason' => 'Mason',
					'Mali' => 'Mali', 
					'Electrician' => 'Electrician', 
					'Painter' => 'Painter'
				];
				break;
			case 'Class-IV (C)':
				$rank = [
					'Cook' => 'Cook',
					'Water Carrier' => 'Water Carrier',
					'Sweeper' => 'Sweeper', 
					'Dhobi' => 'Dhobi', 
					'Mochi' => 'Mochi', 
					'Barber' => 'Barber', 
					'Tailor' => 'Tailor', 
					'Carpenter' => 'Carpenter',
					'Mason' => 'Mason',
					'Mali' => 'Mali',
					'Electrician' => 'Electrician',
					'Painter' => 'Painter'
				];
				break;
			default:
				$rank = [ 
					$staff=>$staff
				];
		}
		return $rank;
	}
	function update_personal_detail($name,$fname,$gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$id){
		$addValue = array('name'=>$name,
			'fathername'=>$fname,
			'gender'=>$gender,
			'maritalstatus'=>$mstatus,
			'dateofbith'=>$dob,
			'caste'=>$casting,
			'category'=>$catii,
			'phono1'=>$conphno,
			'phono2'=>$conphnot,
			'email'=>$pemailid,
			'adharno'=>$addarcard,
			'pan'=>$pancard,
			'nameofbank'=>$bankdetail,
			'nameofbranch'=>$bankbrach,
			'bankacno'=>$bankac,
			'ifsccode'=>$ifsccode,
			'bloodgroup'=>$bloodgroup,
			'identificationmark'=>$Identificationmark,
			'Kg'=>$Kg,
			'Gm'=>$Gm,
			'feet'=>$Feet,
			'inch'=>$inch,
			);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}
	}
	function update_permanent_address($name,$fname,$hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$id){
		$addValue = array('name'=>$name,
			'fathername'=>$fname,
			'houseno'=>$hno,
			'streetno'=>$sno,
			'villmohala'=>$vm,
			'wardno'=>$wardno,
			'city' =>$ct,
			'postoffice' => $po,
			'policestation' => $ps,
			'teshil' =>$tl,
			'state' => $state,
		    'district' => $dis
			);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
	function update_address($hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$phouseno,$pstreetno,$pwardno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$id,$sameasPermanentAddress,$nat){
		$addValue = array(
			'houseno'=>$hno,
			'streetno'=>$sno,
			'villmohala'=>$vm,
			'wardno'=>$wardno,
			'city' =>$ct,
			'postoffice' => $po,
			'policestation' => $ps,
			'teshil' =>$tl,
			'state' => $state,
		    'district' => $dis,
			'Nationality' => $nat,
			'phouse' => $phouseno,
			'pstreet' => $pstreetno,
			'pward' => $pwardno,
			'pvillmohala' => $pvillmoh,
			'pcity' => $postcity,
			'ppostoffice' => $pcitypostoff,
			'ppolicestation' => $ppolicestation,
			'ptehsil' => $ptehsil, 
			'pstate' => $postate,
			'pdistrict' => $pdistrict,
		);
		if($sameasPermanentAddress==true){
			$addValue['phouse'] = $hno;
			$addValue['pstreet'] = $sno;
			$addValue['pvillmohala'] = $vm;
			$addValue['pward'] = $wardno;
			$addValue['ppostoffice'] = $po;
			$addValue['ppolicestation'] = $ps;
			$addValue['ptehsil'] = $tl;
			$addValue['pstate'] = $state;
			$addValue['pdistrict'] = $dis;
		}
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
	function update_present_address($phouseno,$pstreetno,$pwardno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$id){
		$addValue = array('phouse' => $phouseno,
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
						  //'dateofbirth' =>$dob,	//updation1
						  //'dateofbirth2'=>$dob, //updation2
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
						);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
	function update_education_detail($stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$docOther,$clit,$id){
		$addValue = array('eduqalification' => $stts, 
		                            'UnderGraduate' => $UnderGraduate,
		                            'Graduate' => $Graduate,
		                             'PostGraduate' => $PostGraduate,
		                              'Doctorate' => $Doctorate,
		                              'Doctorateother' => $docOther,
		                              'comlit' => $clit,
						);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
	function update_enlistment_details($Modemdr,$Battalion,$tyodu,$mocOther,$dateofesnlistment1,$Rankre,$eor1,$eor2,$eor3,$eor4,$eor5,$Enlistmentec,$EnlistmentUnit,$DateofRetirementdor,$DateofRetirementdori,$gpfPRAN,$PRAN,$id,$enutherdistrict,$enuther){
		$addValue = array('typeofduty' => $tyodu,
						'modeofrec' => $Modemdr,
						//'othermodeofrecruitment' => $mocOther,
						'dateofinlitment' => $dateofesnlistment1,
						'rankofenlistment' => $Rankre,
						'eexrank' => $eor1,
						'eminirank' => $eor2,
						'emedirank' => $eor3,
						'ecprank' => $eor4,
						'eccrank' => $eor5,
						'enlistmentcat' => $Enlistmentec,
						'EnlistmentUnit' => $EnlistmentUnit,
					  //'enutherdistrict' => $enutherdistrict,
						'dateofretirment' => $DateofRetirementdor,
						'dateofretirment2' => $DateofRetirementdori,
						 'gpfpranno' => $gpfPRAN,
						 'PRAN' => $PRAN,
					);
		if($EnlistmentUnit=='District'){
			$addValue['enutherdistrict']=$enutherdistrict;
		}elseif($EnlistmentUnit=='Other'){
			$addValue['enutherdistrict']=$enuther;
		}
		if($Modemdr=='Other'){
			$addValue['othermodeofrecruitment']=$mocOther;
		}
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
	function update_presentservice_details($BattalionUnitito,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$Deptdn,$iIdentityCardNocn,$InductionRankir,$catofind1,$catofind2,$catofind3,$catofind4,$catofind5,$InductionModeim,$indictiondate,$PreviousBatalionito,$PreviousNoprn,$DateOFPromotionDetails21,$DateOFPromotionDetails23,$DateOFPromotionDetails24,$DateOFPromotionDetails25,$DateOFPromotionDetails26,$DateOFPromotionDetails27,$DateOFPromotionDetails28,$DateOFPromotionDetails29,$DateOFPromotionDetails30,$DateOFPromotionDetails31,$DateOFPromotionDetails32,$DateOFPromotionDetails33,$DateOFPromotionDetails34,$LowerSchoolCourseDate35,$DateOFPromotionDetails35,$id,$gd1,$bd1){
		//echo $catofind1;
		//die;
		$addValue = array('BattalionUnitito' => $BattalionUnitito,
							'bunitdistrict' => $bunitdistrict,
			                 'presentrank'=>$RankRankre,
			                 'cexrank' => $catop1,
			                  'cminirank' => $catop2,
							'cmedirank' => $catop3,
							'ccprank' => $catop4,
							'cccrank' => $catop5,
							'depttno' => $Deptdn,
		                            'iIdentityCardNocn' => $iIdentityCardNocn,
		                             'inductionrank' => $InductionRankir,
									 //'inductionrank' => $catofind,
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
									    'gd1'=>$gd1,
									    'bd1'=>$bd1,
						);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
		function getStates($where){
			 
			 $this->db->select('*');
			 foreach($where as $list =>$key):
			 $this->db->where($list,$key);
			 endforeach;
			 $this->db->group_by('state');
			 $this->db->order_by('state','asc');
			 $query = $this->db->get('state_list');
			 $info = $query->result();
			// echo $this->db->last_query();
			 return $info;
		}/*Close*/

		function getDistricts($where){
			 $this->db->select('*');
			 foreach($where as $list =>$key):
				if(is_array($key)){
					$this->db->where_in($list,$key);
				}else{
					$this->db->where($list,$key);
				}
			 endforeach;
			 $this->db->order_by('city','asc');
			 $query = $this->db->get('state_list');
			 $info = $query->result();
			 //echo $this->db->last_query();	
			 return $info;
		}/*Close*/
		
		function update_basic_training_course($TrainingInstituteti,$Batchbn,$batchpassdate,$id,$Othertraining=''){
		$addValue = array('btic' => $TrainingInstituteti,
									     'Othertraining' => $Othertraining,
									      'batchgroup' => $Batchbn, 
									      'passoutyear' => $batchpassdate,
									
						);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

			function update_professional_course_detalis($TrainingInstitutessti,$TrainingInstitutesstiOther,$NamesofsCourses,$DurationsofsCourses,$DurationsofsCoursest,$id){
		$addValue = array( 'TrainingInstitutessti' => implode('@',$TrainingInstitutessti), 
									      'TrainingInstitutesstiOther' => implode('@',$TrainingInstitutesstiOther), 
									       'NamesofsCourses' => implode('@',$NamesofsCourses),
									       'DurationsofsCourses' => implode('@',$DurationsofsCourses),
									       'DurationsofsCoursest' => implode('@',$DurationsofsCoursest),
									
						);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}

	function update_annua_firing_practice($NameofsRanges,$dateofprcatice,$tow,$id){
		$addValue = array( 'NameofsRanges' => $NameofsRanges, 
									        'dateofprcatice' => $dateofprcatice,
									         'tow' => $tow,

									        
						);
		$this->db->where('man_id',$id);
		$task = $this->db->update('newosi',$addValue);	

		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
		
	 function ups_man($name,$fname,$hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$phouseno,$pstreetno,$pwardno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$docOther,$Modemdr,$Battalion,$tyodu,$mocOther,$dateofesnlistment1,$Rankre,$eor1,$eor2,$eor3,$eor4,$eor5,$Enlistmentec,$EnlistmentUnit,$DateofRetirementdor,$gpfPRAN,$PRAN,$hrms_code,$BattalionUnitito,$RankRankre,$catop1,$permanent_rank,$catop2,$catop3,$catop4,$catop5,$Deptdn,$iIdentityCardNocn,
		$InductionRankir,$catofind1,$catofind2,$catofind3,$catofind4,$catofind5,$InductionModeim,$indictiondate,$PreviousBatalionito,$PreviousNoprn,$DateOFPromotionDetails21,$DateOFPromotionDetails23,$DateOFPromotionDetails24,$DateOFPromotionDetails25,$DateOFPromotionDetails26,$DateOFPromotionDetails27,$DateOFPromotionDetails28,$DateOFPromotionDetails29,$DateOFPromotionDetails30,$DateOFPromotionDetails31,$DateOFPromotionDetails32,$DateOFPromotionDetails33,$DateOFPromotionDetails34,$LowerSchoolCourseDate35,$DateOFPromotionDetails35,$TrainingInstituteti,$OthertrainingInstitute,$Batchbn,$batchpassdate,$TrainingInstitutessti,$TrainingInstitutesstiOther,$NamesofsCourses,$DurationsofsCourses,$DurationsofsCoursest,$NameofsRanges,$dateofprcatice,$tow,$gd1,$bd1,$id,$clit,$DateofRetirementdori,$orderby,$cnody,$dateblockm1,$dateblockm2,$dateblockm3,$dateblockm4,$enutherdistrict,$bunitdistrict,$nat,$updateProfessionalCourseDetail){
	
		$addvalue = array(
			'name' => $name,
			'presentrank' => $RankRankre,
			/*'battalion' => $Battalion,*/
			'typeofduty' => $tyodu,
			'cexrank' => $catop1,
			'permanent_rank'=>$permanent_rank,
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
				 'Nationality'=>$nat,
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
						  //'dateofbirth' =>$dob,	//updation1
						  //'dateofbirth2'=>$dob, //updation2
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
                                                 'hrms_code'=>$hrms_code,
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
									     'Othertraining' => $OthertrainingInstitute,
									      'batchgroup' => $Batchbn, 
									      'passoutyear' => $batchpassdate,
									       //'TrainingInstitutessti' => implode('@',$TrainingInstitutessti), 
									     // 'TrainingInstitutesstiOther' => implode('@',$TrainingInstitutesstiOther), 
									     //  'NamesofsCourses' => implode('@',$NamesofsCourses),
									       //'DurationsofsCourses' => implode('@',/$DurationsofsCourses),
									       //'DurationsofsCoursest' => implode('@',$DurationsofsCoursest),
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
			
			if($updateProfessionalCourseDetail){
				$addvalue['TrainingInstitutessti']= implode('@',$TrainingInstitutessti);
				$addvalue['TrainingInstitutesstiOther'] =implode('@',$TrainingInstitutesstiOther);
				$addvalue['NamesofsCourses'] = implode('@',$NamesofsCourses);
				$addvalue['DurationsofsCourses'] = implode('@',$DurationsofsCourses);
				$addvalue['DurationsofsCoursest'] = implode('@',$DurationsofsCoursest);
			}
			$this->db->where('man_id',$id);
			$task = $this->db->update('newosi',$addvalue);	
			if($task){
				return 1;
			}else{
				return 0;
			}	 
	}
	function add_man($name,$fname,$hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$phouseno,$pstreetno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$presentAddressSameasPermanentAddress, $gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$docOther,$Modemdr,$mocOther,$dateofesnlistment1,$Rankre,$eor1,$eor2,$eor3,$eor4,$eor5,$Enlistmentec,$EnlistmentUnit,$enOther,$DateofRetirementdor,$gpfPRAN,$PRAN,$hrms_code,$BattalionUnitito,$RankRankre,$catop1,$permanent_rank,$catop2,$catop3,$catop4,$catop5,$Deptdn,$iIdentityCardNocn,$InductionRankir,$catofind1,$catofind2,$catofind3,$catofind4,$catofind5,$InductionModeim,$indictiondate,$PreviousBatalionito,$PreviousNoprnOther,$PreviousNoprn,$DateOFPromotionDetails21,$DateOFPromotionDetails23,$DateOFPromotionDetails24,$DateOFPromotionDetails25,$DateOFPromotionDetails26,$DateOFPromotionDetails27,$DateOFPromotionDetails28,$DateOFPromotionDetails29,$DateOFPromotionDetails30,$DateOFPromotionDetails31,$DateOFPromotionDetails32,$DateOFPromotionDetails33,$DateOFPromotionDetails34,$LowerSchoolCourseDate35,$DateOFPromotionDetails35,$TrainingInstituteti,$Batchbn,$batchpassdate,$TrainingInstitutessti,$TrainingInstitutesstiOther,$NamesofsCourses,$DurationsofsCourses,$DurationsofsCoursest,$NameofsRanges,$dateofprcatice,$tow,$tyodu,$Nationality,$nstate,$clit,$DateofRetirementdori,$orderby,$cnody,$enutherdistrict,$bunitdistrict,$gd1,$bd1){
		$Othertraining = '';
		$addvalue = array(
			'name' => $name,
			'presentrank' => $RankRankre ,
			'cexrank' => $catop1,
			'permanent_rank'=>$permanent_rank,
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
                                                 'hrms_code'=>$hrms_code,
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
		if($presentAddressSameasPermanentAddress=='yes'){
			//echo 'hi';
			$addvalue['phouse'] = $hno;
			$addvalue['pstreet'] = $sno;
			$addvalue['pvillmohala'] = $vm;
			$addvalue['pcity'] = $ct;
			$addvalue['ppostoffice'] = $po;
			$addvalue['ppolicestation'] = $ps;
			$addvalue['ptehsil'] = $tl;
			$addvalue['pdistrict'] = $dis;
			$addvalue['pstate'] = $state;
			$addvalue['pward'] =$wardno;
		}
		$task = $this->db->insert('newosi',$addvalue);	
		if($task){
			return 1;
		}else{
			return 0;
		}	 
	}
	############################################
	function get_usersosiall_ajax($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$EnlistmentUnit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$limit,$start,$mobno,$classes,$advanceSearch,$employee_ids=null, $basic_training_center =null,$batch_number =null, $passoutyear  =null,$search_age_filter = null,$fetch_parameters = null,$dob_created_from=null,$dob_created_to=null,$excluded_employee_ids=null) {
		//var_dump($dob_created_from);
		$idsofuser = [];
		//var_dump($Postingtiset);
		/* var_dump($Postingtiset2);
		var_dump($Postingtiset3);
		var_dump($Postingtiset4);
		var_dump($Postingtiset5);
		var_dump($Postingtiset6);
		var_dump($Postingtiset7);
		var_dump($Postingtiset8);
		var_dump($Postingtiset9); */
		if(false && $Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' ||  $Postingtiset4 !='' || $Postingtiset5 !='' || $Postingtiset6 !=''  || $Postingtiset7 !='' ||  $Postingtiset8 !='' || $Postingtiset9 !=''){
			//echo $Postingtiset;
			$this->db->select('*');
			$this->wherePostingCondition2($Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9);
			$query = $this->db->get('newosip');
			//echo $this->db->last_query();
			$result = $query->result();
		
			$idsofuser = [];
			foreach($result as $k=>$val){
				$idsofuser[] = $val->man_id;
			}
			//fetch the ids of all the posts
		}
		//var_dump($idsofuser[0]);
		//die;
		//var_dump($ito); fone1
		//to be continueq
		
		/*$posting_concat ='concat_ws (" ",newosip.vploc," ",newosip.fone1," ",newosip.vploc," ",newosip.vpdis," ",newosip.fone2," ",newosip.noj," ",newosip.jsdis," ",newosip.fone3," ",newosip.fone4," ",newosip.fone5," ",newosip.osgloc," ",newosip.osgdis," ",newosip.fone6," ",newosip.fone7," ",newosip.fone8," ",newosip.fone9," ",newosip.bsdnob," ",newosip.bsddis," ",newosip.bsdloc," ",newosip.fone10," ",newosip.fone11," ",newosip.fone12," ",newosip.lone1," ",newosip.perdupod," ",newosip.perdudis," ",newosip.perduorno," ",newosip.perduordate," ",newosip.lone2," ",newosip.dgppod," ",newosip.dgpdis," ",newosip.dgporno," ",newosip.dgpordate," ",newosip.lone3," ",newosip.tertdpod," ",newosip.tertddis," ",newosip.tertdorno," ",newosip.tertdordate," ",newosip.sqone1," ",newosip.sqone2," ",newosip.sqone3," ",newosip.sqone4," ",newosip.sqone5," ",newosip.sstgpod," ",newosip.sstgdis," ",newosip.sstgorno," ",newosip.sstgordate," ",newosip.sqone6," ",newosip.sqone7," ",newosip.sqone8," ",newosip.swatpod," ",newosip.swatdis," ",newosip.swatorno," ",newosip.swatordate," ",newosip.paone1," ",newosip.paone2," ",newosip.awdpmpod," ",newosip.awdpmorno," ",newosip.awdpmordate," ",newosip.paone3," ",newosip.awdpfpod," ",newosip.awdpforno," ",newosip.awdpfordate," ",newosip.paone4," ",newosip.awdpompod," ",newosip.awdpomorno," ",newosip.awdpomordate," ",newosip.paone5," ",newosip.awdpofpod," ",newosip.awdpoforno," ",newosip.awdpofordate," ",newosip.paone6," ",newosip.paone7," ",newosip.paone8," ",newosip.paone9," ",newosip.paone10," ",newosip.paone11," ",newosip.paone12," ",newosip.paone13," ",newosip.paone14," ",newosip.paone15," ",newosip.paone16," ",newosip.paone17," ",newosip.paone18," ",newosip.paone19," ",newosip.paone20," ",newosip.paone21," ",newosip.paone22," ",newosip.paone23," ",newosip.paone24," ",newosip.paone27," ",newosip.ssone23," ",newosip.dsopod," ",newosip.dsoorno," ",newosip.dsoordate," ",newosip.ssone24," ",newosip.csojalorno," ",newosip.csojalordate," ",newosip.ssone25," ",newosip.mispatorno," ",newosip.mispatordate," ",newosip.ssone26," ",newosip.othersnod," ",newosip.othersnodis," ",newosip.othersorno," ",newosip.othersordate," ",newosip.awbone1," ",newosip.awbone2," ",newosip.pssawonof," ",newosip.pssaworank," ",newosip.pssawoordate," ",newosip.awbone3," ",newosip.osihonoo," ",newosip.awbone4," ",newosip.Readerosinbo," ",newosip.Orderly," ",newosip.telopr," ",newosip.darrun," ",newosip.awbone5," ",newosip.bnkgdop," ",newosip.awbone6," ",newosip.bhogpog," ",newosip.bhogdop," ",newosip.awbone7," ",newosip.tradestot," ",newosip.tradestt," ",newosip.tradesbat," ",newosip.tradesdop," ",newosip.tradesdop," ",newosip.tradesorno," ",newosip.awbone8," ",newosip.awbone8," ",newosip.mtsecpod," ",newosip.mtsecvehno," ",newosip.mtsecdop," ",newosip.mtsecorno," ",newosip.awbone9,
			" ",newosip.quartbradop,
			" ",newosip.quartbraorno,
			" ",newosip.awbone10,
			" ",newosip.awbone11,
			" ",newosip.awbone12,
			" ",newosip.awbone13,
			" ",newosip.recrutnorb,
			" ",newosip.recrutorno,
			" ",newosip.recrutordate,
			" ",newosip.bmdone1,
			" ",newosip.bmdone2,
			" ",newosip.leavefrom,
			" ",newosip.leaveto,
			" ",newosip.bmdone3,
			" ",newosip.absentfrom,
			" ",newosip.absentddr,
			" ",newosip.absentdate,
			" ",newosip.bmdone4,
			" ",newosip.usdos,
			" ",newosip.usros,
			" ",newosip.bmdone5,
			" ",newosip.bmdone6,
			" ",newosip.bmdone7,
			" ",newosip.bmdone8,
			" ",newosip.bmdone9,
			" ",newosip.bmdone10,
			" ",newosip.instone1,
			" ",newosip.instone2,
			" ",newosip.instone3,
			" ",newosip.instone4,
			" ",newosip.instone10,
			" ",newosip.traning1,
			" ",newosip.traning2,
			" ",newosip.traning3,
			" ",newosip.btarin1,
			" ",newosip.btarin2,
			" ",newosip.btarin3,
			" ",newosip.btarin4,
			" ",newosip.btarin5,
			" ",newosip.btarin6,
			" ",newosip.btarin7,
			" ",newosip.btarin8,
			" ",newosip.btarin9,
			" ",newosip.btarin10,
			" ",newosip.cfpop,
			" ",newosip.cfppd,
			" ",newosip.cfpdop,
			" ",newosip.game,
			" ",newosip.adminstaff) as posting_concat1, newosip.dateofposting1 as dateofposting11';
			//}*/
			$officernamecolumns = ',seccover.name as officer_name';
			//$officernamecolumns = '';
	//echo 'hisdklfjsdkl';
                        $select_parameters = '';
                        if($fetch_parameters!=null){
                            if(in_array('present_address', $fetch_parameters)){
                                $select_parameters = 'newosi.phouse,newosi.pstreet,newosi.pward,newosi.pvillmohala,newosi.pcity,newosi.ppostoffice,newosi.ppolicestation,newosi.ptehsil,newosi.pdistrict,newosi.pstate,';
                            }
                        }
				$this->db->select('newosi.man_id as new_man_id,newosi.name as name, iIdentityCardNocn, cexrank,presentrank,permanent_rank,cminirank,cmedirank,ccprank,cccrank,depttno,district,gender,maritalstatus,dateofbith,dateofinlitment,caste,category,phono1,bloodgroup,eduqalification,UnderGraduate,Graduate,PostGraduate,Doctorate,Doctorateother,comlit,NamesofsCourses,dateofretirment,bankacno,feet,inch,gpfpranno,PRAN,gd1,bd1,bunitdistrict,newosi.bat_id as newosi_bat_id, newosi.EnlistmentUnit, newosi.houseno,newosi.streetno,newosi.wardno,newosi.villmohala,newosi.city,newosi.postoffice, newosi.policestation,newosi.teshil,newosi.district as newDistrict,newosi.Nationality,newosi.nstate,newosi.state,newosi.pan,newosi.adharno,newosi.nameofbank,newosi.nameofbranch,newosi.bankacno as newbankacno,newosi.ifsccode,newosi.identificationmark,newosi.feet newfeet,newosi.inch as newinch,newosi.modeofrec,newosi.gpfpranno as newgpfpranno, newosi.btic, newosi.batchgroup, newosi.passoutyear, newosi.hrms_code,NameofsRanges,dateofprcatice, tow, inductiondate, newosi.fathername, '.$select_parameters/*./*$posting_concat.$officernamecolumns.', CASE WHEN bunitdistrict=NULL THEN users.nick WHEN
				bunitdistrict="" THEN users.nick ELSE bunitdistrict END as bunitdistrict'*/,false);
                                
				if(!empty($idsofuser)){
					$this->db->where_in('newosi.man_id',$idsofuser);
				}
				if($employee_ids!=null && count($employee_ids)>0){
					if(count($employee_ids)>250){
						$employee_ids_aray = array_chunk($employee_ids,250);
						$this->db->group_start();
						foreach($employee_ids_aray as $k1=>$val1){
							$this->db->or_where_in('newosi.man_id',$val1);		
						}
						$this->db->group_end();
					}else{
						$this->db->where_in('newosi.man_id',$employee_ids);
					}
					//echo 'hi';
				}
                                 //$basic_training_center ,$batch_number , $passoutyear 
                                /*if($basic_training_center!=null && trim($basic_training_center)!=''){
                                    $this->db->like('newosi.btic',$basic_training_center);
                                }
                                if($batch_number!=null && trim($batch_number)!=''){
                                    $this->db->like('newosi.batchgroup',$batch_number);
                                }
                                if($passoutyear!=null && trim($passoutyear)!=''){
                                    $this->db->like('newosi.passoutyear',$passoutyear);
                                }*/
                                
				$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$employee_ids , $basic_training_center ,$batch_number , $passoutyear, $search_age_filter,$dob_created_from,$dob_created_to,$excluded_employee_ids);
				
				$userLog = $this->session->userdata('user_log');
				//die($userLog);
				if($userLog==4){
					//echo '4';
					//echo 'Battalion';
					//var_dump($ito);
                                        if($dob_created_from!=null && $dob_created_to!=null){
                                            $this->battalionOrderBy($RankRankre,$ito,null,true);
                                        }else{
                                            $this->battalionOrderBy($RankRankre,$ito);
                                        }
				}else if($userLog!=4 && isset($ito) && count($ito)==1){
					//echo '5';
					//echo 'IGP';
					//var_dump($ito);
					//echo '<hr>';
					//var_dump($RankRankre);
                                        if($dob_created_from!=null && $dob_created_to!=null){
                                            $this->battalionOrderBy($RankRankre,$ito,null,true);
                                        }else{
                                            $this->battalionOrderBy($RankRankre,$ito);
                                        }
				}else{ 
				//echo '6';
					if($advanceSearch!=null){
						//echo '7';
						//echo 'Advanced';
						$mode = 'ADVANCED';
						//echo 'IGp Multiple batalions';
                                                if($dob_created_from!=null && $dob_created_to!=null){
                                                    //echo 'advance';
                                                    $this->battalionOrderBy($RankRankre,$ito,$mode,true);
                                                }else{
                                                    //echo 'hi';
                                                    $this->battalionOrderBy($RankRankre,$ito,$mode);
                                                }
					}else{
						//echo '8';
						$this->db->order_by('newosi.name','asc');
					}
				}
				
				//die;
				
				 
				
				//$status = $this->wherePostingCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$limit,$start,$mobno,$classes);
				/* if($status==true){
					//fetch the ids of all the posts
				} */
				//$limit = 10;
				//$start = 0;
				if($start == '0'){
					$this->db->limit($limit,0);
				 }else{
					$this->db->limit($limit, $start);
				 }
                                 
				//$this->db->order_by('newosi.name','asc');
				$query01 =  $this->db->get_compiled_select('newosi');
				//echo $query01;
				
				
				$this->db->select('*,presentrank as newpresentrank, cexrank as newcexrank, cminirank as newcminirank,cmedirank as newcmedirank, ccprank as newccprank, cccrank as newcccrank ');//.$posting_concat);
				//$this->db->join('newosip','newosip.man_id = X.new_man_id','left');
				$this->db->from('('.$query01.' ) as X');
				$query02 = $this->db->get_compiled_select();
				//echo '<br\><br/>';	
				//echo $query02;
				//die('query02');
				$this->db->select('*,users.nick');
				$this->db->join('users','users.users_id = newosi_bat_id','left');
				
				$this->db->from('('.$query02.')as Y');
				
				if($userLog==4){
				
				}else if($userLog!=4 && isset($ito) && count($ito)==1){
				
				}else{ 
					if($advanceSearch!=null){
				
					}else{
					
					}
				}
				##############################################
				if(null!=$RankRankre && !empty($RankRankre) && trim($RankRankre)!=''){
					//echo '1';
					$orderbystr = 'FIELD(newosi_bat_id,\''.implode('\',\'',$ito).'\')';
					$rankOrder  = $this->getRankOrder($RankRankre);	
					$rankColumn = $this->getRankColumn($RankRankre);
					if(in_array($rankColumn,['cexrank','cminirank','cmedirank','ccprank','cccrank'])) {
						switch($rankColumn){
							case 'cexrank':
								$rankColumn = 'newcexrank';
								break;
							case 'cminirank':
								$rankColumn = 'newcminirank';
								break;
							case 'cmedirank':
								$rankColumn = 'newcmedirank';
								break;
							case 'cccrank':
								$rankColumn = 'newcccrank';
								break;
							case 'ccprank':
								$rankColumn = 'newccprank';
								break;
							default:
						}
						$orderbystr .=',FIELD('.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
					}else{
						$orderbystr .=',FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
					}
                                        if($dob_created_from!=null && $dob_created_to!=null){
                                            $orderbystr .= ', substr(dateofbith,5,6) asc ';
                                        }
					$this->db->order_by($orderbystr);
					
					//$str = ' FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
					//echo $str;
					//$this->db->_protect_identifiers=false;
					//$this->db->order_by(' FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')');
					//$this->db->_protect_identifiers=true;
					
				}else{
					//echo 2;
					//echo 'hi';
					$orderbystr = 'FIELD(newosi_bat_id,\''.implode('\',\'',$ito).'\'),';
					//$orderbystr = '';
					$staffOrder = $this->getStaffOrder();
					$rankColumn = 'newpresentrank';
					$orderbystr .= 'FIELD('.$rankColumn.',\''.implode('\',\'',$staffOrder).'\')';
                                        //
					//echo $orderbystr;

					//$this->db->order_by('FIELD(newosi.'.$rankColumn.',"'.implode('","',$staffOrder).'") asc');
					if(count($staffOrder)>0){
						foreach($staffOrder as $k=>$val){
							if(trim($val)!=''){
								$RankRankre = $val;
								$rankOrder = $this->getRankOrder($RankRankre);	
								$rankColumn = $this->getRankColumn($RankRankre);
								if(in_array($rankColumn,['cexrank','cminirank','cmedirank','ccprank','cccrank'])) {
									switch($rankColumn){
										case 'cexrank':
											$rankColumn = 'newcexrank';
											break;
										case 'cminirank':
											$rankColumn = 'newcminirank';
											break;
										case 'cmedirank':
											$rankColumn = 'newcmedirank';
											break;
										case 'cccrank':
											$rankColumn = 'newcccrank';
											break;
										case 'ccprank':
											$rankColumn = 'newccprank';
											break;
										default:
											
									}
									
									$orderbystr .=',FIELD('.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
								}else{
									$orderbystr .=',FIELD(newosi.'.$rankColumn.',\''.implode('\',\'',$rankOrder).'\')';
								}
							}
						}
						//$RankRankre = $staffOrder[0];
					}
                                       
					if(trim($orderbystr)!=''){
						//echo 'hihi';
						//echo '<br>'.$orderbystr;
						//$this->db->protect_identifiers=false;
                                                if($dob_created_from!=null && $dob_created_to!=null){
                                                    $orderbystr .= ', substr(dateofbith,5,6) asc ';
                                                }
						$this->db->order_by($orderbystr);
						//$this->db->protect_identifiers=true;
					}else{
                                                if($dob_created_from!=null && $dob_created_to!=null){
                                                    $orderbystr .= ' substr(dateofbith,5,6) asc ';
                                                }
						$this->db->order_by($orderbystr);
                                        }
				}
				##################################################
				$query03 = $this->db->get_compiled_select();
				//echo '<br\><br/>';	
				
				
				$query = $this->db->query($query03);
				//die();
				//echo $this->db->last_query();
				return $query->result();
		}
		
		/* 
			OK 
		**/
		############################################
	function get_user_count_osiall_ajax($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$EnlistmentUnit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$advanceSearch,$employee_ids=null, $basic_training_center =null,$batch_number =null, $passoutyear=null, $search_age_filter=null,$dob_created_from=null,$dob_created_to=null,$exluded_employee_ids=null) {
			$searchByPosting = false;
			$idsofuser = [];
			$fetch_users = false;
			$no_of_records = false;
			if($Postingtiset !='' || $Postingtiset2 !='' || $Postingtiset3 !='' ||  $Postingtiset4 !='' || $Postingtiset5 !='' || $Postingtiset6 !=''  || $Postingtiset7 !='' ||  $Postingtiset8 !='' || $Postingtiset9 !=''){
				$searchByPosting = true;
				$this->db->trans_start();
				$this->db->select('*');
				$this->wherePostingCondition2($Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9);
				$query = $this->db->get('newosip');
				$result = $query->result();
				$idsofuser = [];
				foreach($result as $k=>$val){
					$idsofuser[] = $val->man_id;
				}
			}else{
				$this->db->select('count(*) as total');
				$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$employee_ids, $basic_training_center ,$batch_number , $passoutyear, $search_age_filter,$dob_created_from,$dob_created_to,$exluded_employee_ids);
				$query2 =  $this->db->get('newosi');
				//echo $this->db->last_query();
				$no_of_records = $query2->result()[0]->total;
				$fetch_users = true;
			}
			
			if($searchByPosting==true){
				if(!empty($idsofuser)){
					$this->db->select('count(*) as total');
					$this->db->where_in('newosi.man_id',$idsofuser);
					$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$employee_ids, $basic_training_center ,$batch_number , $passoutyear, $search_age_filter,$dob_created_from,$dob_created_to,$exluded_employee_ids);
					$query2 =  $this->db->get('newosi');
					
					$no_of_records = $query2->result()[0]->total;
					//return $query2->result()[0]->total;
				}else{
					$no_of_records = 0;
				}
				if($no_of_records>0){
					$fetch_users = true;
				}else{
					$fetch_users = false;
				}
			}
			$data = ['fetch_users'=>$fetch_users,'no_of_records'=>$no_of_records];
			//var_dump($data);
			return $data;
	 	}
		function get_total_user_ajax($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$EnlistmentUnit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes,$advanceSearch) {
			$this->db->select('count(*) as total');
				$ito = [];
				$name = '';
				$bloodgroup = [];
				$rcnum = '';
				$RankRankre = null;
				$eor1 = null;
				$eor2 = null;
				$eor3 = null;
				$eor4 = null;
				$eor5 = null;
				$postate=null;$pcity=null;$stts=null;$UnderGraduate=null;$Graduate=null;$PostGraduate=null;$Doctorate=null;$gender=null;$single=null;$Modemdr=null;$Rankre=null;$Enlistmentec=null;$InductionModeim=null;$clit=null;$EnlistmentUnit=null;$dateofesnlistment1=null;$dateofesnlistment2=null;$NamesofsCourses=null;$NamesofsCourses2=null;$DateofRetirementdor=null;$dateofbirth=null;$dateofbirthi=null;$height=null;$inch=null;$Postingtiset=null;$Postingtiset2=null;$Postingtiset3=null;$Postingtiset4=null;$Postingtiset5=null;$Postingtiset6=null;$Postingtiset7=null;$Postingtiset8=null;$Postingtiset9=null;$p=null;$mobno=null;$classes=null;$advanceSearch=null;
				$this->whereCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes);
				$status = $this->wherePostingCondition($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno,$classes);
				//$limit = 10;
				//$start = 0;
				
				//$this->db->order_by('newosi.name','asc');
				$query =  $this->db->get('newosi');
				return $query->result()[0]->total;
				
			
	 	}
                public function getEmployees($search_parameter_array,$limit=null,$start=null,$employeeIdSql=null,$where_for_course=null,$order_no=null, $order_date=null,$sorted_battallion_order=null,$skipZero=null){
                    $course_fields = '';
                    
                                    //$course_fields = ',employee_courses.id as employee_course_id,employee_courses.training_institute_id,employee_courses.course_id,employee_courses.order_no,employee_courses.order_date,employee_courses.course_start_date,employee_courses.course_end_date';
                                if($employeeIdSql!=null){
                                    $this->db->where_in('newosi.man_id',$employeeIdSql,false);
                                }elseif($skipZero=='true'){
                                    $sql = 'Select employee_courses.employee_id from employee_courses';
                                    $this->db->where_in('newosi.man_id',$sql,false);
                                }
                                $this->db->select('newosi.man_id,bat_id,name,depttno,cexrank,presentrank,permanent_rank,cminirank,cmedirank,ccprank,cccrank, users.nick'.$course_fields);
                                $this->employeeWhereConditionsUsingSearchFilter($search_parameter_array);
                                $this->employeeNecessaryWhereCondition();
                                    
				
				$userLog = $this->session->userdata('user_log');
				
				
				
				if($start == '0'){
					$this->db->limit($limit,0);
				 }else{
					$this->db->limit($limit, $start);
				 }
                                //$this->db->from('newosi');
				$this->db->join('users','users.users_id = newosi.bat_id','left');
                                //echo $str;
				//$this->db->_protect_identifiers=false;
                                if($sorted_battallion_order!=null){
                                    $this->db->order_by('FIELD(newosi.bat_id,\''.implode('\',\'',$sorted_battallion_order).'\')');
                                }
                                //$this->db->group_by('newosi.man_id');
                                //$sql= $this->db->get_compiled_select();
                                $query = $this->db->get('newosi');
                                //echo $this->db->last_query();
				return $query->result();
                                
                }
                public function getTotalEmployees(){
                    $this->load->helper('osi');
                    $sorted_battallion_order     =  array_keys(osi_getAllBattalions());
                    $this->db->select('count(*) as total');
                    $this->employeeNecessaryWhereCondition();
                    $this->db->where('newosi.bat_id!=',null);
                    $this->db->where_in('newosi.bat_id',$sorted_battallion_order);
                    $query = $this->db->get('newosi');
                    //echo $this->db->last_query();
                    return $query->result()[0]->total;
    
                }
                public function getFilteredEmployees($search_parameter_array ,$employeeIdSql=null,$sorted_battallion_order){   
                    $this->db->select('count(*) as total');
                    if($employeeIdSql!=null){
                        $this->db->where_in('newosi.man_id',$employeeIdSql,false);
                    }
                    $this->employeeWhereConditionsUsingSearchFilter($search_parameter_array);
                    $this->employeeNecessaryWhereCondition();
                    $userLog = $this->session->userdata('user_log');
                    $this->db->order_by('newosi.name','asc');
                    $query = $this->db->get('newosi');
                    return $query->result()[0]->total;
                }
                public function employeeWhereConditionsUsingSearchFilter($search_parameter_array){
                    if(isset($search_parameter_array['employee_name']) && $search_parameter_array['employee_name'] !=''){
                        $this->db->like('newosi.name', $search_parameter_array['employee_name']);
                    }
                    if(isset($search_parameter_array['battalions']) && $search_parameter_array['battalions'] !=''){
                        $this->db->where_in('newosi.bat_id', $search_parameter_array['battalions']);
                    }else if(isset($search_parameter_array['sorted_battallion_order']) && $search_parameter_array['sorted_battallion_order'] !=''){
                        $this->db->where_in('newosi.bat_id', $search_parameter_array['sorted_battallion_order']);
                    }
                    if(isset($search_parameter_array['regimental_no']) && $search_parameter_array['regimental_no'] !=''){
                        $this->db->like('newosi.depttno', $search_parameter_array['regimental_no']);
                    }
                    if(isset($search_parameter_array['ranks']) && $search_parameter_array['ranks'] !=''){
                        $this->db->where_in('newosi.permanent_rank', $search_parameter_array['ranks']);
                    }
                }
                public function employeeNecessaryWhereCondition(){
                    $this->db->where('newosi.bat_id!=',0);
                }
				public function getPresentStrength($battalions=null){
					$this->db->select('man_id,presentrank,permanent_rank,cminirank, cmedirank, ccprank, cccrank, bat_id');
					$this->db->where('bat_id is not null');
					$this->db->where('bat_id !=','-1');
					$this->db->where('bat_id !=','0');
					if($battalions!=null){
						if(is_array($battalions))
							$this->db->where_in('bat_id',$battalions);
						else
							$this->db->where_in('bat_id',[$battalions]);
					}
					$this->db->from('newosi');
					$query= $this->db->get();
					$result =$query->result();
					return $result;
				}
				public function getNotifications($bat_id){
					$this->db->select("cexrank,cminirank,cmedirank,ccprank,cccrank,name,ddr,phono1,man_id,BattalionUnitito,depttno,inductionmode");
					$this->db->from('newosi');
					$this->db->where('bat_id',$bat_id);
					$this->db->where('uid',1);
					$query =  $this->db->get();//,array('bat_id' => $this->session->userdata('userid'), 'uid' => 1));
					$result = $query->result();
					return $result;
				}
				public function getAllBattalionsByIds($bat_ids){
					$this->db->select("users_id,nick");
					$this->db->from("users");
					$this->db->where_in('users_id',$bat_ids);
					$result = $this->db->get()->result();
					return $result;
				}
				public function getDeinductionByUsersIds($emp_ids){
					$this->db->select("nop,ti,ddr,Dateofrelieving");
					$this->db->from("deinduction");
					$this->db->where_in('nop',$emp_ids);
					$result = $this->db->get()->result();
					return $result;
				}
				public function markOsiNotificationAsRead($id){
					$addvalue = array('uid' => 0);
					$this->db->where('bat_id', $this->session->userdata('userid'));
					$this->db->where('man_id',$id);
					$task = $this->db->update('newosi',$addvalue);
					if($task){
						return true;
					}else{
						return false;
					}
				}
				public function updateBeltNoByEmployeeId($emp_id,$belt_no){
					$addvalue = array('depttno' => $belt_no,'BattalionUnitito'=>$this->session->userdata('userid'));
					$this->db->where('bat_id', $this->session->userdata('userid'));
					//$this->db->where('BattalionUnitito', $this->session->userdata('userid'));
					$this->db->where('man_id',$emp_id);
					$task = $this->db->update('newosi',$addvalue);
					//echo $this->db->last_query();
					if($task){
						return true;
					}else{
						return false;
					}
				}

}
