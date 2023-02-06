<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class Btalion extends CI_Controller
	{
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
			$this->load->model(F_BTALION.'Btalion_model'); 
		}
		
		public function index(){
			
			$this->load->helper('common');
			$this->permission->checkuserb();
			//$data['arms'] =  $this->Btalion_model->fetchinfo(T_ISSUE_ARM,array('issue_to' => $this->session->userdata('userid'), 'bat_status' => 0));
			$data['osi'] =  $this->Btalion_model->fetchinfo('newosi',array('bat_id' => $this->session->userdata('userid'), 'uid' => 1));
			$data['mt'] =  $this->Btalion_model->fetchinfo('newmt',array('bat_id' => $this->session->userdata('userid'), 'uid' => 1));
			$this->load->library('form_validation');
			$this->load->helper('security');

			
			$bdn = $this->input->post("mt",TRUE);
			$osi = $this->input->post("osi",TRUE);
			$this->form_validation->set_rules("mt", "mt", "trim");
			$this->form_validation->set_rules("osi", "osi", "trim");
			if ($this->form_validation->run()){
				if($bdn!=''){
					$add_web = $this->Btalion_model->mark_mt($bdn);
					if($add_web == 1){
					redirect('bt-vichele-old');
				}
				}elseif($osi!=''){
					$add_web = $this->Btalion_model->mark_osi($osi);
					if($add_web == 1){
					redirect('bt-osi-old');
				}

				}	
			}


			$this->load->view(F_BTALION.'dashboard',$data);
		}
		
		/*High Officer Start*/
		public function adreport(){ /*All modules data*/

			$this->load->library('form_validation');
			$this->load->helper('security');

			$ito = $this->input->post("ito",TRUE);
			$ito2 = $this->input->post("ito2",TRUE);
			$ito3 = $this->input->post("ito3",TRUE);
			$ito4 = $this->input->post("ito4",TRUE);
			$ito5 = $this->input->post("ito5",TRUE);
			$ito6 = $this->input->post("ito6",TRUE);
			
			$this->form_validation->set_rules("ito", "ito", "trim");

			if ($this->form_validation->run()){
			  if($ito == 31){
			  	redirect('bt-khc');
			  }elseif ($ito == 32) {
				redirect('bt-osi-oldall');
			  }elseif ($ito == 33) {
			  	redirect('bt-msk-oldall');
			  }elseif ($ito == 34) {
			  	redirect('bt-vichele-oldall');
			  }elseif ($ito == 35) {
			  	redirect('bt-horse-olds');
			  }elseif ($ito == 36) {
			  	$data=array('myid' => 36);
			  	redirect('bt-quaters-olds');
			  }elseif ($ito == 37) {
			  	$data=array('myid' => 37);
			  	redirect('bt-khc-ammu');
			  }elseif ($ito == 38) {
			  	$data=array('myid' => 38);
			  	redirect('bt-khc-ammuss');
			  }elseif($ito == 39){
			  	redirect('bt-igcbkhcarmsissued');
			  }
			}
			
			$this->load->view(F_BTALION.'allbatreport');
		}

		public function papall(){ /*All module pap wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');

			$ito = $this->input->post("ito",TRUE);
			
			$this->form_validation->set_rules("ito", "ito", "trim");

			if ($this->form_validation->run()){
			  if($ito == 31){
			  	redirect('bt-khc');
			  }elseif ($ito == 32) {
				redirect('bt-osi-oldall');
			  }elseif ($ito == 33) {
			  	redirect('bt-msk-oldall');
			  }elseif ($ito == 34) {
			  	redirect('bt-vichele-oldall');
			  }elseif ($ito == 35) {
			  	redirect('bt-horse-olds');
			  }elseif ($ito == 36) {
			  	$data=array('myid' => 36);
			  	redirect('bt-quaters-olds');
			  }elseif ($ito == 37) {
			  	$data=array('myid' => 37);
			  	redirect('bt-khc-ammu');
			  }elseif ($ito == 38) {
			  	$data=array('myid' => 37);
			  	redirect('bt-khc-ammuss');
			  }
			}
			$this->load->view(F_BTALION.'allpap');
		}

		public function adreportpap(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');

			$ito = $this->input->post("ito",TRUE);
			$ito2 = $this->input->post("ito2",TRUE);
			$ito3 = $this->input->post("ito3",TRUE);
			$ito4 = $this->input->post("ito4",TRUE);
			$ito5 = $this->input->post("ito5",TRUE);
			$ito6 = $this->input->post("ito6",TRUE);
			
			$this->form_validation->set_rules("ito", "ito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  if($ito3 == 6){
			  	$data=array('myid' => 6);
				$this->session->set_userdata($data);
			  	redirect('bt-riflealrs');
			  }if($ito3 == 12){
			  	$data=array('myid' => 6);
				$this->session->set_userdata($data);
			  	redirect('bt-ser-ammui');
			  }elseif ($ito3 == 7) {
			  	$data=array('myid' => 7);
				$this->session->set_userdata($data);
				redirect('bt-osi-olds');
			  }elseif ($ito3 == 8) {
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 8);
				$this->session->set_userdata($data);
			  	redirect('bt-msk-olds');
			  }elseif ($ito3 == 9) {
			  	$data=array('myid' => 9);
				$this->session->set_userdata($data);
			  	redirect('bt-vichele-olds');
			  }elseif ($ito3 == 11) {
			  	$data=array('myid' => 11);
				$this->session->set_userdata($data);
			  	redirect('bt-quaters-old');
			  }/*75*/

			  /*7*/
			  if($ito == 31){
			  	$data=array('myid' => 31);
				$this->session->set_userdata($data);
			  	redirect('bt-riflealrs');
			  }if($ito == 37){
			  	$data=array('myid' => 31);
				$this->session->set_userdata($data);
			  	redirect('bt-ser-ammui');
			  }elseif ($ito == 32) {
			  	$data=array('myid' => 32);
				$this->session->set_userdata($data);
				redirect('bt-osi-olds');
			  }elseif ($ito == 33) {
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 33);
				$this->session->set_userdata($data);
			  	redirect('bt-msk-olds');
			  }elseif ($ito == 34) {
			  	$data=array('myid' => 34);
				$this->session->set_userdata($data);
			  	redirect('bt-vichele-olds');
			  }elseif ($ito == 35) {
			  	redirect('bt-horse-olds');
			  }elseif ($ito == 36) {
			  	$data=array('myid' => 36);
				$this->session->set_userdata($data);
			  	redirect('bt-quaters-olds');
			  }/*7*/

			  	  /*27*/
			  if($ito2 == 45){
			  	$data=array('myid' => 45);
				$this->session->set_userdata($data);
			  	redirect('bt-riflealrs');
			  }if($ito2 == 50){
			  	$data=array('myid' => 45);
				$this->session->set_userdata($data);
			  	redirect('bt-ser-ammui');
			  }elseif ($ito2 == 46) {
			  	$data=array('myid' => 46);
				$this->session->set_userdata($data);
				redirect('bt-osi-olds');
			  }elseif ($ito2 == 47) {	
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 47);
				$this->session->set_userdata($data);
			  	redirect('bt-msk-olds');
			  }elseif ($ito2 == 48) {
			  	$data=array('myid' => 48);
				$this->session->set_userdata($data);
			  	redirect('bt-vichele-olds');
			  }elseif ($ito2 == 49) {
			  	$data=array('myid' => 49);
				$this->session->set_userdata($data);
			  	redirect('bt-quaters-olds');
			  }/*27*/

			    /*80*/
			  if($ito4 == 52){
			  	$data=array('myid' => 52);
				$this->session->set_userdata($data);
			  	redirect('bt-riflealrs');
			  }if($ito4 == 57){
			  	$data=array('myid' => 52);
				$this->session->set_userdata($data);
			  	redirect('bt-ser-ammui');
			  }elseif ($ito4 == 53) {
			  	$data=array('myid' => 53);
				$this->session->set_userdata($data);
				redirect('bt-osi-olds');
			  }elseif ($ito4 == 54) {
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 54);
				$this->session->set_userdata($data);
			  	redirect('bt-msk-olds');
			  }elseif ($ito4 == 55) {
			  	$data=array('myid' => 55);
				$this->session->set_userdata($data);
			  	redirect('bt-vichele-olds');
			  }elseif ($ito4 == 56) {
			  	$data=array('myid' => 56);
				$this->session->set_userdata($data);
			  	redirect('bt-quaters-olds');
			  }/*80*/

			     	  /*Rtc*/
			  if($ito5 == 73){
			  	$data=array('myid' => 73);
				$this->session->set_userdata($data);
			  	redirect('bt-riflealrs');
			  }if($ito5 == 78){
			  	$data=array('myid' => 73);
				$this->session->set_userdata($data);
			  	redirect('bt-ser-ammui');
			  }elseif ($ito5 == 74) {
			  	$data=array('myid' => 74);
				$this->session->set_userdata($data);
				redirect('bt-osi-olds');
			  }elseif ($ito5 == 75) {
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 75);
				$this->session->set_userdata($data);
			  	redirect('bt-msk-olds');
			  }elseif ($ito5 == 76) {
			  	$data=array('myid' => 76);
				$this->session->set_userdata($data);
			  	redirect('bt-vichele-olds');
			  }elseif ($ito5 == 77) {
			  	$data=array('myid' => 77);
				$this->session->set_userdata($data);
			  	redirect('bt-quaters-olds');
			  }/*Rtc*/

			       	  /*CSO*/
			  if($ito6 == 66){
			  	$data=array('myid' => 66);
				$this->session->set_userdata($data);
			  	redirect('bt-riflealrs');
			  }elseif ($ito6 == 67) {
			  	$data=array('myid' => 67);
				$this->session->set_userdata($data);
				redirect('bt-osi-olds');
			  }elseif ($ito6 == 68) {
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 68);
				$this->session->set_userdata($data);
			  	redirect('bt-msk-olds');
			  }elseif ($ito6 == 69) {
			  	$data=array('myid' => 69);
				$this->session->set_userdata($data);
			  	redirect('bt-vichele-olds');
			  }elseif ($ito6 == 70) {
			  	$data=array('myid' => 70);
				$this->session->set_userdata($data);
			  	redirect('bt-quaters-olds');
			  }/*CSO*/

			}
			
			$this->load->view(F_BTALION.'papwise');
		}
		/*
		*	This function is used to sort the battalions according to a pattern given in function battalionOrder
		*/
		public function sortBattalions($battalions){
				$battalionOrder = array(
				31=>'7 - PAP',
				103=>'9 - PAP',
				132=>'13 - PAP',
				45=>'27 - PAP',
				184=>'36 - PAP',
				6=>'75 - PAP',
				52=>'80 - PAP',
				137=>'82 - PAP',
				73=>'RTC - PAP',
				126=>'ISTC',
				216=>'Control Room PAP',
					//68=>'CSO PAP',
					//61=>'ADGP PAP',
				190=>'1 - IRB',
				165=>'2 - IRB',
				154=>'3 - IRB',
				113=>'4 - IRB',
				108=>'5 - IRB',
				160=>'6 - IRB',
				120=>'7 - IRB',
					//214=>'IGP - IRB',
				202=>'RTC LADDA KOTHI - IRB',
				99=>'1 - CDO',
				172=>'2 - CDO',
				142=>'3 - CDO',
				148=>'4 - CDO',
				178=>'5 - CDO',
				//215=>'IGP - CDO',
				196=>'CTC - BG'
			);
			$sortedBattalions = array();
			foreach($battalionOrder as $id=>$name){
				//if(in_array($id($battalions[$id])){
				if(in_array($id,$battalions)){
					$sortedBattalions[] = $id;
				}
			}
			return $sortedBattalions;
		}	
		/**
		* This function will fetch the quantaties(holding, issued, in kot etc) of weapons from the db
		* Do paginated	
		*/
		public function khc_olddataall(){ /*Khc Weapon all data*/
		
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$excel = $this->input->get('download_weapon_figure_excel');

			$bats = $this->input->get("ito",TRUE);		//array of ids
			$weapons_input = $this->input->get('tpi');		//ids
			
			if(isset($excel)){	
				//get the report
				$report = $this->input->get('report');

				$this->generate_report($report);			// type of report Weapon figure and weapon full view
			}else{
				
				$bats = $this->input->get("ito",TRUE);

				$tpi = $this->input->get("tpi",TRUE);
				//var_dump($bats);
				//var_dump($tpi);
				//die;
				$orderno = $this->input->get("orderno",TRUE);
				$issued = $this->input->get("issued",TRUE);
				$report = $this->input->get("report",TRUE);

				if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
					$weapons = $this->Btalion_model->fetchinfowherein('old_weapon','bat_id',array('190','165','154','113','108','160','120'));
					
				}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
					$weapons = $this->Btalion_model->fetchinfowherein('old_weapon','bat_id',array('99','172','142','148','178','196'));
				}else{
				 	$data["counts"] = $this->Btalion_model->get_users_countkhcall($bats,$tpi,$orderno,$issued,$report);
					//var_dump($data['counts']);
				}

				$data['name'] = '';
				$config = array();
				$config["base_url"] = base_url() . "bt-khc/";
				if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
				$config["total_rows"] = count($weapons);
				}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
				$config["total_rows"] = count($weapons);
				}else{
				 $config["total_rows"] = count($data["counts"]);
				}
				//var_dump(count($data['counts']));
				$recordPerPage = 10;
				$config["per_page"] = $recordPerPage;
				$config["uri_segment"] = 2;
				$config["num_links"] = 3;
				
				$config['use_page_numbers'] = TRUE;
				$config['reuse_query_string'] = TRUE;
				$config['full_tag_open'] = "<ul class='pagination'>";
				$config['full_tag_close'] ="</ul>";
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
				$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tagl_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tagl_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tagl_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tagl_close'] = "</li>";

	        	
	        	$data['tow'] = $this->Btalion_model->weaponlist();
				$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
				//$page = 2;
				$data['rep'] = $report;
					//if($bats =='' && $report == 1){
					if($report == 1){
						$bats = $this->input->get("ito",TRUE);
						$tpi = $this->input->get("tpi",TRUE);
						$this->load->model('Weapon/'.'Weapon_model'); 
						if(false){
							$data['battalions'] = array(6,45);
							$data['weapons'] = $this->getWeapons2();
							$data['columns'] = array(
								0=>'total',
								1=>'issued',
								2=>'in_kot',
								3=>'lost',
								4=>'condemn',
								5=>'empty',
								6=>'remarks',
							);
							$battalions_array = $data['battalions'];
							$weapons_input = $data['weapons'];
							$columns_input = $data['columns'];
						}else{
							$battalions_array = $bats;
							
							
							
							$weapons_input = $this->input->get('tpi');		//ids
							$weapons_input = $this->getWeaponIdsFromNames($weapons_input);
							$columns_input = array(
								0=>'total',
								1=>'issued',
								2=>'in_kot',
								3=>'lost',
								4=>'condemn',
								5=>'empty',
								6=>'remarks',
							);//$this->input->post('columns');
						}
						if($battalions_array==NULL|| empty($battalions_array)){
							$batss = array();
							$result = $this->Weapon_model->getBattalions();
							foreach($result as $k=>$v){
								$batss[] = $v->users_id;
							}
							$battalions_array = $batss;
						}
						
						$battalions_array = $this->sortBattalions($battalions_array);
						
						if($page*$recordPerPage>$config['total_rows']){
							$page = 1;
						}
						//get the input
						$config['total_rows'] = $this->getTotalBattalionWeaponRecords($battalions_array,$weapons_input);
						$data['data2'] = $this->getWeaponsDetailPaginated( $battalions_array, $weapons_input, $columns_input,$page,$recordPerPage,$config['total_rows']); //geWeaponFigures();
						//die;
						$data['totalRecords'] = count($data['data2']['battalionObjects']);
						
						//echo $config['total_rows'];
						$data['total_rows_found'] = $config['total_rows'];
						$this->pagination->initialize($config);
						$data["links"] = $this->pagination->create_links();
						
					}else{
						
						//echo 'hi';
						$data["weapon"] = $this->Btalion_model->get_userskhcall($bats,$tpi,$orderno,$issued,$report,$config["per_page"],$page); 
						//var_dump($data['weapon']);
						//echo $this->db->last_query();
						$data["counts"] = $this->Btalion_model->get_users_countkhcall($bats,$tpi,$orderno,$issued,$report);	
					}
					//$data["links"] = $this->pagination->create_links();
				/*$data["weapon"] = $this->Btalion_model->get_userskhcall($bats,$tpi,$orderno,$issued,$report,$config["per_page"],$page);
				$data["counts"] = $this->Btalion_model->get_users_countkhcall($bats,$tpi,$orderno,$issued,$report);*/
				$this->form_validation->set_rules("tpi", "report", "trim");

				if ($this->form_validation->run()){
					/*if($bats =='' && $report == 1){
						redirect('bt-figarm');
					}else{
						$data["weapon"] = $this->Btalion_model->get_userskhcall($bats,$tpi,$orderno,$issued,$report,$config["per_page"],$page); 
						$data["counts"] = $this->Btalion_model->get_users_countkhcall($bats,$tpi,$orderno,$issued,$report);	
					}*/
							
				}
				$this->load->view(F_BTALION.'old/allkhc',$data);
			}
		}
		/*
		it will generate the report
		*/
		public function generate_report($report){
			if($report==1){					//Figure view excel sheet
				$this->load->model('Weapon/'.'Weapon_model'); 
				$bats = $this->input->get("ito",TRUE);		//array of battalion ids
				$battalions_array = $bats;					//array of ids
				$weapons_names = $this->input->get('tpi');	// array of names
				
				if($battalions_array==NULL|| empty($battalions_array)){	//if no bn is proiveded by default select the all bn's
					$batss = array();
					$result = $this->Weapon_model->getBattalions();
					foreach($result as $k=>$v){
						$batss[] = $v->users_id;
					}
					$battalions_array = $batss;
				}
				if(empty($weapons_names)|| $weapons_names==NULL){
					$weapon_ids = $this->getWeapons2();				//here are the ids of all the weapons
				}else{
					$weapon_ids = $this->getWeaponIdsFromNames($weapons_names);
				}
				
				//var_dump($battalions_array);
				//var_dump($weapon_ids);
				//die;
				
				//pass the ids
				$hideZero=0;		//default	show the zeros
				
				if(null!=$this->input->get('hideZeroRecords')){
					$value = $this->input->get('hideZeroRecords');
					if($value=='on'){
						$hideZero = 1;
					}else{
						$hideZero = 0;
					}
				}
			
				$this->download_weapon_figure_report($battalions_array,$weapon_ids,$hideZero);		// passed ids of battablion and weapons 
				//die('lskjdf');
				//die;	
			}else if($report==2){		//Full view excel sheet
				die('Under COntruction');
			}
		}

		public function getWeaponIdsFromNames($weapons_names_array){
			$ids = $this->Weapon_model->getWeaponIds($weapons_names_array);
				//var_dump($ids);
			$id_array = Array();
			foreach($ids as $k=>$v){
				$id_array[] = $v->nwep_id;
			}
			return $id_array;
		}
		
		
		
		

		/**
		===========================Copying function from Weapon controller Begin ==========================
		*/

		public function getWeaponsOfBattalion($battalion_id,$weapons_detail){
			$weapons = array();
			//echo $battalion_id;
			//echo '<BR>Weapon detail <BR>';
			//var_dump($weapons_detail);
			//echo '<BR>';
			foreach($weapons_detail as $k=>$v){
				
				//echo $v->old_weapon_id.',';
				//echo $v->bat_id.',';
				if($v->bat_id==$battalion_id){
					$weapons[] = $v;
				}
			}
			return $weapons;
		}
		/*
		*
		*/
		public function getTotalBattalionWeaponRecords($battalions_array,$weapons_input){
			$counter = 0;
			foreach($battalions_array as $k=>$bat_id){
				foreach($weapons_input as $k=>$id){
					$counter++;
				}
			}
			return $counter;
		}
		/* current 
			$weapons_input is the id of all the weapons new_weapondatay
			$battalions_array is ids of battalions
		*/
		//public function isValidPageNo($page_no,
		public function getWeaponsDetailPaginated( $battalions_array, $weapons_input, $columns_input,$page_no,$recordPerPage,$totalRows){
			
			$battalionObj = array();
			
			//if $battalion_array is empty select all the battalions
			
//if $battalion_array is empty select all the battalions
			
			//pagination paramaeters start
			
			$limit = $recordPerPage;
			if($page_no>=1){
				$start = ($page_no-1)*$limit;
				$end = ($page_no)*$limit;
			}else{
				$start = 0;
				$end = $limit;
			}
			
			if($end>=$totalRows){
				$end = $totalRows;
			}
			
			$battalion['start'] = $start+1;
			$battalion['end'] = $end;
			//echo 'Start = '.$start.'  end = '.$end;
			//die;
			//pagination parameters end
			$newWeaponsInput = array();
			//$battalions_array = $this->getAllBattalions()
			$outerBreak = false;
			$counter =1;
			$selectedWeapons = 0;
			//echo 'WEapon Input<BR>';
			
			//var_dump($weapons_input);
			//echo '<BR>Initialization</br>';
			//var_dump($battalions_array);
			//echo '<BR>';
			$weaponObj = array();
			$battalion_ids_shown_on_page = array();
			foreach($battalions_array as $k=>$bat_id){
				if($counter>$start){
					$battalionObj[$bat_id] = array();
				}
				if($outerBreak){
					break;
				}
				$battalion_ids_shown_on_page[] = $bat_id;
				foreach($weapons_input as $k=>$id){
					//if($counter>=$start && $counter<=$end){
					if($counter>$start){
						//echo $counter;
						$newWeaponsInput[] = $id;
						$battalionObj[$bat_id][$id] = array();
						foreach($columns_input as $k1=>$parameters){	//inititalizing parameters issued, in_kot,lost,condemn,empty
							$battalionObj[$bat_id][$id][$parameters] = 0;
						}
						$selectedWeapons++;
					}
					//echo 'Batalion : '.$bat_id.', '.$v.'<br>';
					//var_dump($weaponObj[$v]);echo'<br>';
					if($selectedWeapons>=$limit){
						$outerBreak = true;
						break;
					}
					$counter++;
					if($counter>$end){
						$outerBreak = true;
						break;
					}
					//var_dump($weaponObj);
				}
				//echo '<BR>';echo '<BR>';
				//var_dump($weaponObj);
				//echo '<BR>';echo '<BR>';
				
			}
			
			//echo '<br>Dummy empty Battalion Object:<br>';
			//var_dump($battalionObj);
			//echo '<br><br>';
			//die;
			//ok
			//var_dump($newWeaponsInput);
			//echo $limit.',';
			//echo $start.'<br>';
			//$db_weapons = $this->Weapon_model->get_all_weapon_names($newWeaponsInput);
			$db_weapons = $this->Weapon_model->get_weapon_names($newWeaponsInput,$limit,$start);
			//var_dump($db_weapons);
			//echo $this->db->last_query();
			//var_dump($db_weapons);
			//die;
			$tow = array();
			foreach($db_weapons as $k=>$v){
				$tow[] = $v->arm;
			}
			//var_dump($tow);
			//die;
			//echo '<BR><br>';
			//echo '<br>Weapon names <br>';
			//var_dump($tow);
			//echo '<BR><br>';
			//die;
			//var_dump($tow);
			$all_matched_weapons = $this->getWeaponDetail($battalion_ids_shown_on_page,$tow,$columns_input);
			//die;
			//echo '';
			//echo $this->db->last_query();
			//die;
			// getting all the matched weapons
			//echo '<BR> Query:'.$this->db->last_query().'<BR>';
			//echo '<br>All the matched weapons</br>';
			//var_dump($all_matched_weapons);
			//die;
			$battalion['totalWeapons'] = count($all_matched_weapons);
			//echo 'Total weapons = '$battalion['totalWeapons'];
			//echo '<br>Total Weapons :'.$battalion['totalWeapons'];
			$outputDataArray = Array();
			$counter =1;
			$outerbreak_ = false;
			$newBattalionObject = array();
			
			//echo '<BR><h5>Incrementing</h5></br>';
			$tempCOunter = 0;
			//echo '<BR>';
			foreach($battalionObj as $bat_id=>$weaponObj){
				//echo 'Bat id :'.$bat_id.'<BR>';
				$weapons = $this->getWeaponsOfBattalion($bat_id,$all_matched_weapons);
				//echo 'WEapons Fetched '.count($weapons).'<BR>';
				foreach($weapons as $k=>$v){
					$weapon_name = $v->tow;
					//echo '--WEapon name :'.$weapon_name.'<BR>';
					//echo '['.strtolower(str_replace(' ','_',trim($v->staofserv))).']<BR>';
					//echo $weapon_name;
					$weaponId = $this->getWeaponId(trim($weapon_name),$db_weapons);	//weapon id
					/*if($bat_id==52){
					echo '<BR>WeaponID : '.$weaponId;
					}*/
					
					if(str_replace(' ','_',trim($v->staofserv))==''){
						$v->staofserv = 'empty';
						$statusId = 5;
					}else{
						$statusId = $this->getStatusId(strtolower(str_replace(' ','_',trim($v->staofserv))),$columns_input);	
					}
					//echo '<br>Status ID :'.$statusId;
					if($statusId!='OTHER@OTHER'){
						//$weapon[$weaponId][$statusId]++;
						//echo $weaponId;
						if(!empty($weaponObj[$weaponId])){
							$weaponObj[$weaponId][strtolower(str_replace(' ', '_',trim($v->staofserv)))]++;
							//$newBattalionObject[$bat_id][$weaponId][strtolower(str_replace(' ', '_',trim($v->staofserv)))]++;
						}
					}else{
						
					}
					//$i++;
					/*if($counter>$limit){
						$outerbreak_ = true;
						break;
					}
					$counter++;*/
				}
				//echo '<BR>After<BR>';
				//var_dump($weaponObj);
				//echo '<BR>';
				$weaponObj['battalionName']=$this->Weapon_model->getBattalionNameById($bat_id);
				$newBattalionObject[$bat_id] = $weaponObj;
				//$battalionObj[$bat_id] = $weaponObj;
				/*if($outerbreak_){
					break;
				}*/
				//echo '<BR>';	
			}
			//echo '<br><BR>Processed Weapons with battalions New battalion object:<BR>';
			//var_dump($newBattalionObject);
			//die;

			//var_dump($battalionObj);
			
			//$battalion['battalionName']=$this->Weapon_model->getBattalionNameById($battalion_id_input);
			//echo $battalion['battalionName'];
			//die;$battalion['battalionName']
			
			$battalion['columns'] = $this->getColumnTitles($columns_input);
			//	var_dump($battalion['columns']);
			//generating weapon names
			$weapon_names_ = array();
			foreach($newWeaponsInput as $k=>$v){
				foreach($db_weapons as $k1=>$v1){
					if($v1->nwep_id==$v){
						$weapon_names_[$v] = $v1->arm;	
					}
					
				}
			}
			$battalion['weaponNames'] = $weapon_names_;
			//echo '<BR>NEw Weapon names.<BR>';
			//var_dump($battalion['weaponNames']);
			//echo '<hr>';
			//var_dump($battalionObj);
			//var_dump($battalions_array);
			//echo '<H5>Calculating Total</h5>';
			foreach($newBattalionObject as $bat_id=>$weapon)
			{
				$weaponObj = $newBattalionObject[$bat_id];
				if(count($weaponObj)>0){
					foreach($weaponObj as $k1=>$v){	
					//	echo '<br>'.$k1.'--';
						if($k1!='battalionName'){
							$weaponObj[$k1]['total'] = $weaponObj[$k1]['issued'] + $weaponObj[$k1]['in_kot'] +$weaponObj[$k1]['lost']+$weaponObj[$k1]['condemn'] + $weaponObj[$k1]['empty'];
					//		echo '<br>'.$weaponObj[$k1]['total'].'--'	;
							$this->load->helper('common');
							$a = $this->getWeaponNameFromID($k1,$db_weapons);
							if($a!=NULL){
								$issued = info_fetch_countarmsan($a,$bat_id); 
								if($issued!='')
								{
									if($issued->remarkwep==null){
										$weaponObj[$k1]['remarks'] = '--';	
									}else{
										$weaponObj[$k1]['remarks'] = $issued->remarkwep;
									}
								}else{
									$weaponObj[$k1]['remarks'] = '-';
								}
							}
						}else{

						}
					}
					//echo '<br>';
					//var_dump($weaponObj);
					$newBattalionObject[$bat_id] = $weaponObj;
				}
			}
			//echo 'Processed final Objects<BR>';
			//var_dump($newBattalionObject);
			//die;
			$battalion['battalionObjects'] = $newBattalionObject;
			return $battalion;
		}

		public function getWeaponsDetail( $battalions_array, $weapons_input, $columns_input){	//----------------------------------------
			$battalionObj = array();
			//var_dump($weapons_input);
			//if $battalion_array is empty select all the battalions
			
			//$battalions_array = $this->getAllBattalions()
			foreach($battalions_array as $k=>$bat_id){
				$weaponObj = array();
				foreach($weapons_input as $k=>$v){
					$weaponObj[$v] = array();
					foreach($columns_input as $k1=>$v1){
						$weaponObj[$v][$v1] = 0;
					}
				}
				$battalionObj[$bat_id] = $weaponObj;
			}
			//var_dump($battalionObj); OK
			//$db_weapons = $this->Weapon_model->get_all_weapon_names($weapons_input);
			//$db_weapons = $this->Weapon_model->get_weapon_names($newWeaponsInput,$limit,$start);
			$db_weapons = $this->Weapon_model->get_weapon_names($weapons_input);
			//echo $this->db->last_query();
			$tow = array();
			foreach($db_weapons as $k=>$v){
				$tow[] = $v->arm;
			}
			
			$weapons_detail = $this->getWeaponDetail($battalions_array,$tow,$columns_input);		// getting all the matched weapons from old_weapon table
			
			$battalion['totalWeapons'] = count($weapons_detail);
			//echo $this->db->last_query();
			//var_dump($detail);
			//var_dump($detail);
			$outputDataArray = Array();
			//increment the issue and in kot
			//var_dump($columns_input); 
			
			foreach($battalionObj as $bat_id=>$weaponObj){
				//echo $id;
				
				$weapons = $this->getWeaponsOfBattalion($bat_id,$weapons_detail);
				foreach($weapons as $k=>$v){
					$weapon_name = $v->tow;
					if(empty($weapon_name)){
				//		echo "Empty";
					}
					//error_reporting(0);

					$weaponId = $this->getWeaponId(trim($weapon_name),$db_weapons);	//weapon id
					if(str_replace('','_',trim($v->staofserv))==''){
						$v->staofserv = 'empty';
						$statusId = 7;
					}else{
						$statusId = $this->getStatusId(str_replace('','_',trim($v->staofserv)),$columns_input);	
					}
					
					if($statusId!='OTHER@OTHER'){
						//$weapon[$weaponId][$statusId]++;
						$weaponObj[$weaponId][strtolower(str_replace(' ', '_',trim($v->staofserv)))]++;
					}else{
						//$weapon[$weaponId][11]++;
						//$weaponObj[$weaponId]['other']++;
					}
					//$i++;
				}
				//echo 'Weapons--';
				//var_dump($weapons);
				//echo 'weapon end--';
				$weaponObj['battalionName']=$this->Weapon_model->getBattalionNameById($bat_id);
				//var_dump($weaponObj);
				//echo '<br>';
				$battalionObj[$bat_id] = $weaponObj;
				//$battalionObj[$bat_id]['battalionName']=$this->Weapon_model->getBattalionNameById($bat_id);

			}
			//var_dump($battalionObj);
			

			//var_dump($battalionObj);
			
			//$battalion['battalionName']=$this->Weapon_model->getBattalionNameById($battalion_id_input);
			//echo $battalion['battalionName'];
			//die;$battalion['battalionName'];
			
			$battalion['columns'] = $this->getColumnTitles($columns_input);
			//	var_dump($battalion['columns']);
			$weapon_names_ = array();
			foreach($weapons_input as $k=>$v){
				foreach($db_weapons as $k1=>$v1){
					if($v1->nwep_id==$v){
						$weapon_names_[$v] = $v1->arm;	
					}
					
				}
			}
			$battalion['weaponNames'] = $weapon_names_;
				//var_dump($db_weapons);
			//echo '<hr>';
			//var_dump($battalionObj);
			//var_dump($battalions_array);
			foreach($battalions_array as $k=>$bat_id)
			{
				$weaponObj = $battalionObj[$bat_id];
				foreach($weaponObj as $k1=>$v){	
				//	echo '<br>'.$k1.'--';
					if($k1!='battalionName'){
						$weaponObj[$k1]['total'] = $weaponObj[$k1]['issued'] + $weaponObj[$k1]['in_kot'] +$weaponObj[$k1]['lost']+$weaponObj[$k1]['condemn'] + $weaponObj[$k1]['empty'];
				//		echo '<br>'.$weaponObj[$k1]['total'].'--'	;
						$this->load->helper('common');
						$a = $this->getWeaponNameFromID($k1,$db_weapons);
						if($a!=NULL){
							$issued = info_fetch_countarmsan($a,$bat_id); 
							if($issued!='')
							{
								if($issued->remarkwep==null){
									$weaponObj[$k1]['remarks'] = '--';	
								}else{
									$weaponObj[$k1]['remarks'] = $issued->remarkwep;
								}
			                }else{
			                	$weaponObj[$k1]['remarks'] = '-';
			                }
		            	}
		            }else{

		            }
				}
				//echo '<br>';
				//var_dump($weaponObj);
				$battalionObj[$bat_id] = $weaponObj;

			}
			//var_dump($battalionObj);
			$battalion['battalionObjects'] = $battalionObj;
			return $battalion;
		}

	
		/**
		* will return the id of all the weapons
		*/

		public function getWeapons2(){
			$arms = $this->Weapon_model->get_arms();
			$weapons = array();
			foreach($arms as $arm){
				$weapons[] = $arm->nwep_id;
			}
			return $weapons;
		}
		
		
		public function getWeaponDetail($battalions,$weapon_names){
			$a = null;
			$detail = $this->Weapon_model->getBattalionsWeaponsDetail($battalions,$weapon_names,$a);
			return $detail;
		}

		public function getWeaponId($weapon_name,$db_weapons){
			foreach($db_weapons as $id=>$v){
				if(strtolower(trim($v->arm))==strtolower(trim($weapon_name))) {
					return $v->nwep_id;
				}

			}
		}

		public function getStatusId($status,$columns){
			$status = str_replace(' ', '_', strtolower($status));
			/*$columns = array(
					0=>'sanction',
					1=>'issued',
					2=>'in kot',
					3=>'total',
					4=>'remarks',
					5=>'lost'
				);*/
			foreach($columns as $k=>$v){
				if(trim(strtolower($v))==trim(strtolower($status))){
					return $k;
				}
			}
			return 'OTHER@OTHER';
			
		}

		public function getColumnTitles($columnInput){
			$col = $this->getColumnKeyValue();
			$columns = [];
			
			foreach($columnInput as $k=>$v){
				if(in_array($v,array_keys($col))){
					$columns[$v] = $col[$v];
				}
			}
			return $columns;
		}
		public function getColumnKeyValue(){
			return  array(
				//'sanction'=>'Sanction',
				'total'=>'Holding',
				'issued'=>'Issued',
				'in_kot'=>'In kot',
				'lost'=>'Lost',
				'condemn'=>'Condemn',
				'empty'=>'Empty',
				//'remarks'=>'Remarks',
				'remarks'=>'Case Property'
			);
		}

		public function getWeaponNameFromID($id,$weapon){
			foreach($weapon as $k=>$v){
				if($v->nwep_id==$id){
					return $v->arm;
				}
			}
		}
		
		/**
		=========================================================================================================================================================================================
		*/

		public function figarm(){
			$this->load->helper('common');
			// $data["weapon"] = $this->Btalion_model->fetchinfogroupasc('old_weapon',array('old_weapon_status' => 1),'tow');
			$tpi = $this->input->get("tpi",TRUE);
			$data["weapon"] = $this->Btalion_model->figarm($tpi);
			$this->load->view(F_BTALION.'old/figarm',$data);
		}

		public function munition(){
			$this->load->helper('common');
			$data["weapon"] = $this->Btalion_model->fetchinfogroupasc('old_weapon',array('old_weapon_status' => 1),'tow');
			$this->load->view(F_BTALION.'old/figarm',$data);
		}

		public function munitionadd(){
			$this->load->helper('common');
			$data["weapon"] = $this->Btalion_model->fetchinfogroupasc('old_weapon',array('old_weapon_status' => 1),'tow');
			$this->load->view(F_BTALION.'old/figarm',$data);
		}

		public function cammu_olddataall(){ /*Khc ammuniation all data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$weapon = $this->Btalion_model->fetchinfo('newamu',array('old_status' => 1));
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-khc-cammu";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
        	$data['tow'] = $this->Btalion_model->newamulist();
        	$data['arms'] = $this->Btalion_model->weaponlist();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["links"] = $this->pagination->create_links();

			$ito = $this->input->post("ito",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			$tpi2 = $this->input->post("tpi2",TRUE);

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}

			$data["weapon"] = $this->Btalion_model->get_cusersamuall($tpi,$tpi2,$config["per_page"],$page,$ninfo[0]);

			//$data["countsi"] = $this->Btalion_model->allamupqty($ito,$tpi,$tpi2);

			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_cusersamuall($tpi,$tpi2,$config["per_page"],$page,$ninfo[0]); 
				//$data["countsi"] = $this->Btalion_model->allamupqty($ito,$tpi,$tpi2);		
			}
			$this->load->view(F_BTALION.'comnt/allammu',$data);
		}

		public function ammu_olddataall(){ /*Khc ammuniation all data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$weapon = $this->Btalion_model->fetchinfo('newamu',array('old_status' => 1));
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-khc-ammu";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
        	$data['tow'] = $this->Btalion_model->newamulist();
        	$data['arms'] = $this->Btalion_model->weaponlist();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["links"] = $this->pagination->create_links();

			$ito = $this->input->post("ito",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			$tpi2 = $this->input->post("tpi2",TRUE);

			$data["weapon"] = $this->Btalion_model->get_usersamuall($ito,$tpi,$tpi2,$config["per_page"],$page);
			$data["countsi"] = $this->Btalion_model->allamupqty($ito,$tpi,$tpi2);

			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersamuall($ito,$tpi,$tpi2,$config["per_page"],$page); 
				$data["countsi"] = $this->Btalion_model->allamupqty($ito,$tpi,$tpi2);		
			}
			$this->load->view(F_BTALION.'old/allammu',$data);
		}
		
		

		public function cammu_oldsdataall(){ /*Khc ammuniation all data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$weapon = $this->Btalion_model->fetchinfo('newamus',array('old_status' => 1));
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-khc-ammu";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
        	$data['tow'] = $this->Btalion_model->newamulist();
        	$data['arms'] = $this->Btalion_model->weaponlist();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["links"] = $this->pagination->create_links();

			$ito = $this->input->post("ito",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			$tpi2 = $this->input->post("tpi2",TRUE);

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}

			$data["weapon"] = $this->Btalion_model->get_cusersamusall($tpi,$tpi2,$config["per_page"],$page,$ninfo[0]);
			//$data["countsi"] = $this->Btalion_model->allamusqty($ito,$tpi,$tpi2);

			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_cusersamusall($tpi,$tpi2,$config["per_page"],$page,$ninfo[0]); 
				//$data["countsi"] = $this->Btalion_model->allamusqty($ito,$tpi,$tpi2);		
			}
			$this->load->view(F_BTALION.'comnt/allammus',$data);
		}

		public function ammu_oldsdataall(){ /*Khc ammuniation all data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$weapon = $this->Btalion_model->fetchinfo('newamus',array('old_status' => 1));
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-khc-ammu";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
        	$data['tow'] = $this->Btalion_model->newamulist();
        	$data['arms'] = $this->Btalion_model->weaponlist();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["links"] = $this->pagination->create_links();

			$ito = $this->input->post("ito",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			$tpi2 = $this->input->post("tpi2",TRUE);

			$data["weapon"] = $this->Btalion_model->get_usersamusall($ito,$tpi,$tpi2,$config["per_page"],$page);
			$data["countsi"] = $this->Btalion_model->allamusqty($ito,$tpi,$tpi2);

			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersamusall($ito,$tpi,$tpi2,$config["per_page"],$page); 
				$data["countsi"] = $this->Btalion_model->allamusqty($ito,$tpi,$tpi2);		
			}
			$this->load->view(F_BTALION.'old/allammus',$data);
		}

		public function osi_olddataall(){ /*Osi all data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));

			$ito = $this->input->get("ito",TRUE);
			$mobno = $this->input->get("mobno",TRUE);
			$name = $this->input->get("name",TRUE);
			$bloodgroup = $this->input->get("bloodgroup",TRUE);
			$rcnum = $this->input->get("rcnum",TRUE);
			$RankRankre = $this->input->get("RankRankre",TRUE);
			$eor1 =  $this->input->get("eor1",TRUE);
			$eor2 =  $this->input->get("eor2",TRUE);
			$eor3 =  $this->input->get("eor3",TRUE);
			$eor4 =  $this->input->get("eor4",TRUE);
			$eor5 =  $this->input->get("eor5",TRUE);
			$postate = $this->input->get("postate",TRUE);
			$pcity = $this->input->get("pcity",TRUE);
			$stts = $this->input->get("stts",TRUE);
			$UnderGraduate = $this->input->get("UnderGraduate",TRUE);
			$Graduate = $this->input->get("Graduate",TRUE);
			$PostGraduate = $this->input->get("PostGraduate",TRUE);
			$Doctorate = $this->input->get("Doctorate",TRUE);
			$gender = $this->input->get("gender",TRUE);
			$single =  $this->input->get("single",TRUE);
			$Modemdr = $this->input->get("Modemdr",TRUE);
			$Rankre = $this->input->get("Rankre",TRUE);
			$Enlistmentec = $this->input->get("Enlistmentec",TRUE);
			$InductionModeim = $this->input->get("InductionModeim",TRUE);
			$clit = $this->input->get("clit",TRUE);
			$dateofesnlistment1 = $this->input->get("dateofesnlistment1",TRUE);
			$dateofesnlistment2 =  $this->input->get("dateofesnlistment2",TRUE);
			$NamesofsCourses =  $this->input->get("NamesofsCourses1",TRUE);
			$NamesofsCourses2 =  $this->input->get("NamesofsCourses2",TRUE);
			$DateofRetirementdor = $this->input->get("DateofRetirementdor",TRUE);
			$dateofbirth = $this->input->get("dateofbirth",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$height = $this->input->get("height",TRUE);
			$inch = $this->input->get("inch",TRUE);
			$Postingtiset = $this->input->get("Postingtiset",TRUE);
			$Postingtiset2 = $this->input->get("Postingtiset2",TRUE);
			$Postingtiset3 = $this->input->get("Postingtiset3",TRUE);
			$Postingtiset4 = $this->input->get("Postingtiset4",TRUE);
			$Postingtiset5 = $this->input->get("Postingtiset5",TRUE);
			$Postingtiset6 = $this->input->get("Postingtiset6",TRUE);
			$Postingtiset7 = $this->input->get("Postingtiset7",TRUE);
			$Postingtiset8 = $this->input->get("Postingtiset8",TRUE);
			$Postingtiset9 = $this->input->get("Postingtiset9",TRUE);
			$p = '';

			
			$weapon = $this->Btalion_model->get_users_countosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno);
			
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));

			$config = array();
			$config["base_url"] = base_url() . "bt-osi-oldall";
			$config["total_rows"] = $weapon;
			$config["per_page"] = 100;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
			$start = ($page-1)*$config["per_page"];
			//echo $start; die();
			//print_r($data["links"]); die();

		
			
			$data["weapon"] = $this->Btalion_model->get_usersosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$config["per_page"],$start,$mobno);
			//var_dump($data['weapon']);
			//die;
			$data["counts"] = $this->Btalion_model->get_users_countosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno);
			//die;
				$data['nm'] = $NamesofsCourses.$NamesofsCourses2;
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$config["per_page"],$start,$mobno);
				
			$data["counts"] = $this->Btalion_model->get_users_countosiall($ito,$name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$mobno);
				$data['nm'] = $NamesofsCourses.$NamesofsCourses2;	
			}
			$data['name'] ='';
			
			$this->load->view(F_BTALION.'old/allosi',$data);
		}


		public function msk_olddataall(){ /*All msk data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5));
			$data['items'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$report = $this->input->get("report",TRUE);
			$data['rep'] = $report;

			$ito =  $this->input->get("ito",TRUE);
			$toi = $this->input->get("toi",TRUE);
			$nameofitem = $this->input->get("nameofitem",TRUE);
			$cti = $this->input->get("cti",TRUE);
			$Receivedfrom = $this->input->get("Receivedfrom",TRUE);
			$fname = $this->input->get("fname",TRUE);
			$tpi = $this->input->get("tpi",TRUE);

			
			if($report == 1){
				$weapon = $this->Btalion_model->fetchinfocountss('mskitemsqty',array('status' => 1));
			}else{
				$weapon = $this->Btalion_model->ccget_usersall($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report);
			}

				
			$data['cmsk'] = $weapon;
			$config = array();
			$config["base_url"] = base_url() . "bt-msk-oldall";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 1200;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();

			

			
			$data["msk"] = $this->Btalion_model->get_usersall($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report,$config["per_page"],$page);

			/*$data['qname'] = $this->Btalion_model->mskquntyalllist($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report);*/
			$this->form_validation->set_rules("toi", "toi", "trim");

			if ($this->form_validation->run()){
				$data["msk"] = $this->Btalion_model->get_usersall($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report,$config["per_page"],$page);

				/*$data['qname'] = $this->Btalion_model->mskquntyalllist($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report);*/				
					
			}
			$this->load->view(F_BTALION.'old/allmaterial',$data);
		}

		public function vichele_olddataall(){ /*All mt data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$weapon = $this->Btalion_model->fetchinfo('newmt',array('mt_status' => 1));
			$data['items'] = $this->Btalion_model->fetchinfo('newmt',array('mt_status' => 1));
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6));
			//$data['weapon'] = $this->Btalion_model->fetchinfo('newmt',array('mt_status' => 1));
				$cov = $this->input->get("cov",TRUE);
			$vc = $this->input->get("vc",TRUE);
			$dob1 = $this->input->get("dob1",TRUE);
			$option = $this->input->get("option",TRUE);
			$engine = $this->input->get("engine",TRUE);
			$Chasis = $this->input->get("Chasis",TRUE);
			$moa =  $this->input->get("moa",TRUE);
			$rcnum =  $this->input->get("rcnum",TRUE);
			$vcon =  $this->input->get("vcon",TRUE);
			$ito = $this->input->get("ito",TRUE);
			$hn2 = $this->input->get("hn2",TRUE);
			$report = $this->input->get("report",TRUE);

			$data['weapon'] = $this->Btalion_model->get_users_countvicall($cov,$vc,$dob1,$option,$engine,$Chasis,$moa,$rcnum,$vcon,$ito,$report); 
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-vichele-oldall/";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 1200;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;	
			$data["links"] = $this->pagination->create_links();

		
			$data['rep'] = $report;
			$data['itinfo'] = $ito;

			$data["weapon"] = $this->Btalion_model->get_usersvicall($cov,$vc,$dob1,$option,$engine,$Chasis,$moa,$rcnum,$vcon,$ito,$report,$config["per_page"],$page);
			$data["counts"] = $this->Btalion_model->get_users_countvicall($cov,$vc,$dob1,$option,$engine,$Chasis,$moa,$rcnum,$vcon,$ito,$report); 


			$this->form_validation->set_rules("cov", "cov", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersvicall($cov,$vc,$dob1,$option,$engine,$Chasis,$moa,$rcnum,$vcon,$ito,$report,$config["per_page"],$page);
			$data["counts"] = $this->Btalion_model->get_users_countvicall($cov,$vc,$dob1,$option,$engine,$Chasis,$moa,$rcnum,$vcon,$ito,$report);	
			}
			
			$this->load->view(F_BTALION.'old/allvic',$data);
		}

		public function quaters_olddatas(){/*All quaters data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');

			$ito =  $this->input->get("ito",TRUE);
			$tpi = $this->input->get("orderno",TRUE);
			$orderno = $this->input->get("rcno",TRUE);
			$rcno = $this->input->get("mrec",TRUE);
			$report = $this->input->get("report",TRUE);
			
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 8));
			$weapon = $this->Btalion_model->ccget_users_countqtrall($ito,$tpi,$orderno,$rcno,$report);
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-quaters-olds";
			$config["total_rows"] = $weapon;
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["links"] = $this->pagination->create_links();
			
			$data['rep'] = $report;
			$data["weapon"] = $this->Btalion_model->get_usersqtrall($ito,$tpi,$orderno,$rcno,$report,$config["per_page"],$page);
			$data["counts"] = $this->Btalion_model->get_users_countqtrall($ito,$tpi,$orderno,$rcno,$report);

			$this->form_validation->set_rules("tpi", "report", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersqtrall($ito,$tpi,$orderno,$rcno,$report,$config["per_page"],$page); 

				$data["counts"] = $this->Btalion_model->get_users_countqtrall($ito,$tpi,$orderno,$rcno,$report);	
			}
			$this->load->view(F_BTALION.'old/allquater',$data);
		}
		/*High Officer End*/
		

		/*Add arms*/
		public function addarm(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			
			$atype = $this->input->post("atype",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$abore = $this->input->post("abore",TRUE);
			$mags = $this->input->post("mags",TRUE);
			$acc = $this->input->post("acc",TRUE);
	
			$amqunt = $this->input->post("amqunt",TRUE);
			$onum = $this->input->post("onum",TRUE);
			$odate = $this->input->post("odate",TRUE);

			$issueto = $this->input->post("issueto",TRUE);
			$typeofduty = $this->input->post("typeofduty",TRUE);
                        
			$placeofduty = $this->input->post("placeofduty",TRUE);
                        
			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;
		
			$ito = $this->input->post("ito",TRUE);
			$itoOther =  $this->input->post("itoOther",TRUE);
			$typeofwep  =  $this->input->post("typeofwep",TRUE);
			$bodyno =  $this->input->post("bodyno",TRUE);
                       
			$magp =  $this->input->post("magp",TRUE);
			$ammubore =  $this->input->post("ammubore",TRUE);

			$ammupqty =   $this->input->post("ammupqty",TRUE);
			$pissuedate =   $this->input->post("pissuedate",TRUE);
			$pissueto =   $this->input->post("pissueto",TRUE);
			$pissuetoname =   $this->input->post("pissuetoname",TRUE);
			$nameofrange =   $this->input->post("nameofrange",TRUE);
			$district =   $this->input->post("district",TRUE);
			$rcvno =   $this->input->post("rcvno",TRUE);
			$rdate =   $this->input->post("rdate",TRUE);
                        $issuelist = $this->input->post('issuelist',TRUE);
			$issueother =   $this->input->post("issueother",TRUE);
			$issuedep =   $this->input->post("issuedep",TRUE);
			$oito =   $this->input->post("oito",TRUE);
			$issuetoi =  $this->input->post("issuetoi",TRUE);
			
			
                        $data['issuelist_'] = $issuelist;
                        
			

			$this->form_validation->set_rules("atype", "Ammunition Type", "trim|required");
                        if($atype=='Service'){
                            $this->form_validation->set_rules("wbodyno", "Weapon Body No", "required");
                            //$this->form_validation->set_rules("abore", "Ammunition Bore", "required");
                            $this->form_validation->set_rules("mags", "Maganiziton Quantity", "required");
                            //$this->form_validation->set_rules("acc", "Accessories", "required");
                            $this->form_validation->set_rules("amqunt", "Ammunition Quantity", "required");
                            $this->form_validation->set_rules("onum", "By Order", "required");
                            $this->form_validation->set_rules("issuelist", "Issue To", "required");
                            if($issuelist=='Battalion'){
                                $this->form_validation->set_rules("batslist1", "Battalion", "required");
                                $this->form_validation->set_rules("typeofduty", "Type of Duty", "required");
                                //$this->form_validation->set_rules("placeofduty", "Type Place of Duty", "required");
                            }elseif($issuelist=='Official'){
                                $this->form_validation->set_rules("batslist1", "Battalion", "required");
                                $this->form_validation->set_rules("issueto", "Issued To", "required");
                                $this->form_validation->set_rules("typeofduty", "Type of Duty", "required");
                                if($typeofduty=='Gunman'){
                                    $this->form_validation->set_rules("placeofduty", "Place of Duty", "required");
                                    $this->form_validation->set_rules("itoOther", "Duty Details", "required");
                                }elseif($typeofduty=='Guard'){
                                    $this->form_validation->set_rules("todt", "Place of Duty", "required");
                                    $this->form_validation->set_rules("itoOther", "Duty Details or Ohter Info", "required");
                                }elseif($typeofduty=='Temp Duty'){
                                    $this->form_validation->set_rules("todth", "Place of Duty", "required");
                                    $this->form_validation->set_rules("itoOther", "Duty Details or Ohter Info", "required");
                                }elseif($typeofduty=='Company'){
                                    //$this->form_validation->set_rules("todf", "Place of Duty", "required");
                                    $this->form_validation->set_rules("todsi", "Select Company", "required");
                                    $this->form_validation->set_rules("itoOther", "Duty Details or Ohter Info", "required");
                                }elseif($typeofduty=='Police Officer'){
                                    $this->form_validation->set_rules("todfi", "Place of Duty", "required");
                                    $this->form_validation->set_rules("itoOther", "Duty Details", "required");
                                }elseif(in_array($typeofduty,['ARP','SDRF','SSG','Control Room','PPA/PHR','CTC,BHG,PTL','ISTC, KPT','Other'])){
                                    $this->form_validation->set_rules("itoOther", "Duty Details", "required");
                                    
                                }else{
                                    
                                }
                            }elseif($issuelist=='Other'){
                                $this->form_validation->set_rules("issueother", "Other ", "required");
                            }
                            
                            //$this->form_validation->set_rules("placeofduty", "Type Place of Duty", "required");
                        }elseif($atype=='Practice'){
                            $this->form_validation->set_rules("typeofwep", "Type of Weapon", "required");
                            //$this->form_validation->set_rules("ammubore", "Ammunition Bore", "required");
                            
                            $this->form_validation->set_rules("bodyno[]", "Body Number", "required");
                            $this->form_validation->set_rules("magp", "Magazine Quantity", "required");
                            $this->form_validation->set_rules("ammupqty", "Ammunition Quantity", "required");
                            $this->form_validation->set_rules("pissuedate", "Issue Date", "required");
                            $this->form_validation->set_rules("pissueto", "Issue To", "required");
                            if($pissueto=='Other Battalion Unit'){
                                $this->form_validation->set_rules("oito", "Other Battalion Unit", "required");
                            }elseif($pissueto=='Offical'){
                                $this->form_validation->set_rules("batslist", "Battalion", "required");
                                $this->form_validation->set_rules("issuetoi", "Issued To", "required");
                            }
                            $this->form_validation->set_rules("nameofrange", "Name of Range", "required");
                        }
                        $arms_objs = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));
                        $bdn = [];
                        foreach ($arms_objs as  $value) {
                            $ser_weapon_linking[$value->old_weapon_id] = $value->tow;
                            $bdn[$value->old_weapon_id] = 'Weapon Name: '.$value->tow.'&nbsp; '. 'Weapon Body No: '.$value->bono.'&nbsp; '. 'Weapon Butt No:'.$value->buno;
                        }
                        $ammunition_bore_linking = [];
                        $weaponi_objs = $this->Btalion_model->weaponlist();
                        $ammunition_bore_linking = [];
                        foreach ($weaponi_objs as $value) {
                            $ammunition_bore_linking[$value->arm] = $value->bore.'@#@'.$value->arm;
                            $now[$value->bore.','.$value->arm] = 'Bore: '.$value->bore. '&nbsp; Arms: '.$value->arm;
                        }
                        if ($this->form_validation->run()){
                            if($atype=='Service'){
                                $abore = $ammunition_bore_linking[$ser_weapon_linking[$wbodyno]];
                                //
                                
                                //$abore = explode('@#@',$abore)[0].'@#@'.$ser_weapon_linking[$wbodyno];
                               
                                //die($abore);
                            }elseif($atype=='Practice'){
                                //$ammubore = $ammunition_bore_linking[$typeofwep];
                                
                                //$ammubore = explode('@#@',$ammubore)[0];
                                //echo $ammubore;
                                //$ammubore = $ammubore.'@#@'.$typeofwep;
                                //die($ammubore);
                            }
                            
                            switch($typeofduty){
                                case 'Gunman':
                                    $placeofduty;
                                    break;
                                case 'Guard':
                                    $placeofduty = $todt;
                                    break;
                                case 'Gunman':
                                    $placeofduty = $todth;
                                    break;
                                case 'Temp Duty':
                                    $placeofduty = $todth;
                                    break;
                                case 'Police Officer':
                                    $placeofduty = $todfi;
                                    break;
                                case 'Police Officer':
                                    $placeofduty = $todfi;
                                    break;
                                case 'Company':
                                    $placeofduty = $todsi;
                                    break;
                                default:
                                    $placeofduty = '';
                            }
                            
                                $add_web = $this->Btalion_model->issue_arm($atype,$wbodyno,$abore,$mags,$acc,$amqunt,$onum,$odate,$issueto,$typeofduty,$placeofduty,$ntod,$ito,$itoOther,$typeofwep,$bodyno,$magp,$ammubore,$ammupqty,$pissuedate,$pissueto,$pissuetoname,$nameofrange,$district,$rcvno,$rdate,$issueother,$issuedep,$oito,$issuetoi);
                                if($add_web['status'] == true){
                                        $this->session->set_flashdata('success_msg','Arms has issued succesfully !');
                                        redirect('bt-add-arm');
                                }else{
                                    $messages = '';
                                    foreach($add_web['messages'] as $k=>$val){
                                        foreach($val as $k1=>$val1){
                                            $messages .= $val1;
                                        }
                                    }
                                        $this->session->set_flashdata('error_msg','Something went wrong.'.$messages);
                                        //redirect('bt-add-arm');
                                }	
                        }
                        $data['wbodyno_'] = $wbodyno;
                        
                        $data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));
                        $data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
                        $info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

                        $data['typeofduty_']= $typeofduty;
                        $data['atype_'] = $atype;
                        $data['pissueto_'] = $pissueto;
                        $data['issuetoi_'] = $issuetoi;
                        $data['issueto_'] = $issueto;
                        if($issueto!=null){
                            $where = ['man_id'=>$issueto];
                            $emp = $this->Btalion_model->fetchinfo('newosi',$where)[0];
                            $val = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $emp->bat_id));
                            //$data['issuetoi_'] = 'Name: '.$emp[0]->name. '&nbsp; Dept No: '.$emp[0]->depttno. '&nbsp; Battalion: '.$emp[0]->user_name;
                            $data['issueto_'] = 'Name: '.$emp->name. ' Dept No: '.$emp->depttno. ' Mobile: '.$emp->phono1.' Battalion: '.$val->user_name;
                        }
                        if($issuetoi!=null){
                            $where = ['man_id'=>$issuetoi];
                            $emp = $this->Btalion_model->fetchinfo('newosi',$where)[0];
                            $val = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $emp->bat_id));
                            //$data['issuetoi_'] = 'Name: '.$emp[0]->name. '&nbsp; Dept No: '.$emp[0]->depttno. '&nbsp; Battalion: '.$emp[0]->user_name;
                            $data['issuetoi_'] = 'Name: '.$emp->name. ' Dept No: '.$emp->depttno. ' Mobile: '.$emp->phono1.' Battalion: '.$val->user_name;
                        }
                        $data['all_body_nos'] = [];
                        if($typeofwep!=null){
                            //var_dump($bodyno);
                            if($atype=='Practice'){
                                $vals_ =  $this->Btalion_model->fetchinfo('old_weapon',array('tow' => $typeofwep, 'bat_id' => $this->session->userdata('userid')));
                            }else{
                            $vals_ =  $this->Btalion_model->fetchinfo('old_weapon',array('tow' => $typeofwep, 'bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));}
                            foreach($vals_ as $value){
                                    //echo'<option value="'.$value->old_weapon_id.'">'.$value->bono.'</option>';
                                    $data['all_body_nos'][$value->old_weapon_id] = $value->bono;
                            }
                            
                            $data['selected_bodynos_'] = $bodyno;
                        }
			$data['deputation'] = $this->Btalion_model->deputationlist();
                        
			$data['weaponi'] = $this->Btalion_model->weaponlist();
                        /*$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));*/
                        /*$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
                        $data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
                        $data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
                        $data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));*/
                        $data['weapon'] = $this->Btalion_model->fetchinfo('newwepon_data',array('status' => 1 ));
                        $data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
                        $data['unamei'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
                        $this->load->view(F_BTALION.'arms/batalianissue',$data);
		}/*Close*/

		/*Add arms*/
		public function issuemunition(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$atype = $this->input->post("atype",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$abore = $this->input->post("abore",TRUE);
			$mags = $this->input->post("mags",TRUE);
			$acc = $this->input->post("acc",TRUE);
	
			$amqunt = $this->input->post("amqunt",TRUE);
			$onum = $this->input->post("onum",TRUE);
			$odate = $this->input->post("odate",TRUE);

			$issueto = $this->input->post("issueto",TRUE);
			$typeofduty = $this->input->post("typeofduty",TRUE);
			$placeofduty = $this->input->post("placeofduty",TRUE);

			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;
		
			$ito = $this->input->post("ito",TRUE);
			$itoOther =  $this->input->post("itoOther",TRUE);
			$typeofwep  =  $this->input->post("typeofwep",TRUE);
			$bodyno =  $this->input->post("bodyno",TRUE);
			$magp =  $this->input->post("magp",TRUE);
			$ammubore =  $this->input->post("ammubore",TRUE);
			$ammupqty =   $this->input->post("ammupqty",TRUE);
			$pissuedate =   $this->input->post("pissuedate",TRUE);
			$pissueto =   $this->input->post("pissueto",TRUE);
			$pissuetoname =   $this->input->post("pissuetoname",TRUE);
			$nameofrange =   $this->input->post("nameofrange",TRUE);
			$district =   $this->input->post("district",TRUE);
			$rcvno =   $this->input->post("rcvno",TRUE);
			$rdate =   $this->input->post("rdate",TRUE);

			$issueother =   $this->input->post("issueother",TRUE);
			$issuedep =   $this->input->post("issuedep",TRUE);
			
			

			$this->form_validation->set_rules("atype", "atype", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->issue_muntion($atype,$wbodyno,$abore,$mags,$acc,$amqunt,$onum,$odate,$issueto,$typeofduty,$placeofduty,$ntod,$ito,$itoOther,$typeofwep,$bodyno,$magp,$ammubore,$ammupqty,$pissuedate,$pissueto,$pissuetoname,$nameofrange,$district,$rcvno,$rdate,$issueother,$issuedep);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has issued succesfully !');
						redirect('bt-issuemunition');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-issuemunition');
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('addmunition',array('bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));
				$data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

				$data['deputation'] = $this->Btalion_model->deputationlist();

				$data['weapon'] = $this->Btalion_model->fetchinfo('munition',array('mstatus' => 1 ));
				$data['weaponi'] = $this->Btalion_model->fetchinfo('munition',array('mstatus' => 2 ));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
				$data['unamei'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
				$this->load->view(F_BTALION.'arms/issuemunition',$data);
		}/*Close*/

		/*Add arms*/
		public function issueextra(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$atype = $this->input->post("atype",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$abore = $this->input->post("abore",TRUE);
			$mags = $this->input->post("mags",TRUE);
			$acc = $this->input->post("acc",TRUE);
	
			$amqunt = $this->input->post("amqunt",TRUE);
			$onum = $this->input->post("onum",TRUE);
			$odate = $this->input->post("odate",TRUE);

			$issueto = $this->input->post("issueto",TRUE);
			$typeofduty = $this->input->post("typeofduty",TRUE);
			$placeofduty = $this->input->post("placeofduty",TRUE);

			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;
		
			$ito = $this->input->post("ito",TRUE);
			$itoOther =  $this->input->post("itoOther",TRUE);
			$typeofwep  =  $this->input->post("typeofwep",TRUE);
			$bodyno =  $this->input->post("bodyno",TRUE);
			$magp =  $this->input->post("magp",TRUE);
			$ammubore =  $this->input->post("ammubore",TRUE);
			$ammupqty =   $this->input->post("ammupqty",TRUE);
			$pissuedate =   $this->input->post("pissuedate",TRUE);
			$pissueto =   $this->input->post("pissueto",TRUE);
			$pissuetoname =   $this->input->post("pissuetoname",TRUE);
			$nameofrange =   $this->input->post("nameofrange",TRUE);


			$this->form_validation->set_rules("atype", "atype", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->issue_arm($atype,$wbodyno,$abore,$mags,$acc,$amqunt,$onum,$odate,$issueto,$typeofduty,$placeofduty,$ntod,$ito,$itoOther,$typeofwep,$bodyno,$magp,$ammubore,$ammupqty,$pissuedate,$pissueto,$pissuetoname,$nameofrange);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Extra ammunition/arm has  issued succesfully !');
						redirect('bt-add-arm');
					}else{
						$this->session->set_flashdata('error_msg','Something went wrong.');
						redirect('bt-add-arm');
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));
				$data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			$data['weaponi'] = $this->Btalion_model->weaponlist();
				/*$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));*/
				/*$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
				$data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
				$data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
				$data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));*/
				$data['weapon'] = $this->Btalion_model->fetchinfo('issue_arm',array('bat_id' => $this->session->userdata('userid') ));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
				$this->load->view(F_BTALION.'arms/issuelist',$data);
		}/*Close*/


		/*Add arms*/
		public function issueextraid($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			
			$mags = $this->input->post("mags",TRUE);
			$amqunt = $this->input->post("amqunt",TRUE);
			$odate = $this->input->post("odate",TRUE);
			


			$this->form_validation->set_rules("mags", "mags", "trim");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->issue_extra($id,$mags,$amqunt,$odate);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Extra Ammunition issued succesfully !');
						redirect('bt-issueextra');
					}else{
						$this->session->set_flashdata('error_msg','Extra Ammunition has not issued.');
						redirect('bt-issueextra');
					}	
				}

			$this->load->view(F_BTALION.'arms/extraissue');
		}/*Close*/

		/*Add arms*/
		public function issuedeposit(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
                        $this->load->model('Khc_model');
			
			$atype = $this->input->post("atype",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$abore = $this->input->post("abore",TRUE);
			$mags = $this->input->post("mags",TRUE);
			$acc = $this->input->post("acc",TRUE);
	
			$amqunt = $this->input->post("amqunt",TRUE);
			$onum = $this->input->post("onum",TRUE);
			$odate = $this->input->post("odate",TRUE);

			$issueto = $this->input->post("issueto",TRUE);
			$typeofduty = $this->input->post("typeofduty",TRUE);
			$placeofduty = $this->input->post("placeofduty",TRUE);

			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;

			$ito = $this->input->post("ito",TRUE);
			$itoOther =  $this->input->post("itoOther",TRUE);
			$typeofwep  =  $this->input->post("typeofwep",TRUE);
			$bodyno =  $this->input->post("bodyno",TRUE);
			$magp =  $this->input->post("magp",TRUE);
			$ammubore =  $this->input->post("ammubore",TRUE);
                        
			$ammupqty =   $this->input->post("ammupqty",TRUE);
			$pissuedate =   $this->input->post("pissuedate",TRUE);
			$pissueto =   $this->input->post("pissueto",TRUE);
			$pissuetoname =   $this->input->post("pissuetoname",TRUE);
			$nameofrange =   $this->input->post("nameofrange",TRUE);


			$this->form_validation->set_rules("atype", "atype", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->issue_arm($atype,$wbodyno,$abore,$mags,$acc,$amqunt,$onum,$odate,$issueto,$typeofduty,$placeofduty,$ntod,$ito,$itoOther,$typeofwep,$bodyno,$magp,$ammubore,$ammupqty,$pissuedate,$pissueto,$pissuetoname,$nameofrange);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arm/ammunition has deposit succesfully !');
						redirect('bt-add-arm');
					}else{
						$this->session->set_flashdata('error_msg','Arm/ammunition has not deposit created.');
						redirect('bt-add-arm');
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));
				$data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
                        $tpi = $this->input->post("tpi",TRUE);
			$bodyno = $this->input->post("bodyno",TRUE);
			$typeofduty = $this->input->post("typeofduty",TRUE);
			$amtype = $this->input->post("amtype",TRUE);
                        $data['tow'] = $this->Btalion_model->weaponlist();
                        $data['bodys'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
			$data['weaponi'] = $this->Btalion_model->weaponlist();
				/*$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));*/
				/*$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
				$data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
				$data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
				$data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));*/
                        $battalion_objs = $this->Khc_model->getALLKHCBattalions();
                        $battalions = [];
                        foreach($battalion_objs as $k=>$val){
                            $battalions[$val->users_id] = $val->nick;
                        }
                        $data['battalions'] =                                $battalions;
                        $data["weapon"] = $this->Btalion_model->get_khcbatis($tpi,$bodyno,$typeofduty,$amtype,1);
			$data["counts"] = $this->Btalion_model->get_khcbatiscount($tpi,$bodyno,$typeofduty,$amtype,$status=1);
				//$data['weapon'] = $this->Btalion_model->fetchinfo('issue_arm',array('bat_id' => $this->session->userdata('userid'),'istatus' => 1));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 )); 

				$this->load->view(F_BTALION.'arms/depositform',$data);
		}/*Close*/

		/*Add arms*/
		public function depositdis(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$dist = $this->input->post("dist",TRUE);
			$bore = $this->input->post("bore",TRUE);
			$eammu = $this->input->post("eammu",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$rdate = $this->input->post("rdate",TRUE);

			$this->form_validation->set_rules("dist", "dist", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->depositdis($dist,$bore,$eammu,$rcno,$rdate);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','ammunition has deposit succesfully !');
						redirect('bt-depositdis');
					}else{
						$this->session->set_flashdata('error_msg','ammunition has not deposit created.');
						redirect('bt-depositdis');
					}	
				}
			
			$data['cities'] = $this->Btalion_model->fetchinfo('state_list',array('state' => 'PUNJAB'));
			$data['weaponi'] = $this->Btalion_model->weaponlist();
			
				$this->load->view(F_BTALION.'arms/depositdis',$data);
		}/*Close*/

		/*Add arms*/
		public function depositdisview(){
			$this->load->helper('common_helper');	
			$data['arms'] = $this->Btalion_model->fetchinfo('disdepositammu',array('disstatus' => 1));
			
			$this->load->view(F_BTALION.'ammunition/distlist',$data);
		}/*Close*/

		/*Add arms*/
		public function depositdesown(){
			$this->load->helper('common_helper');	
			$data['arms'] = $this->Btalion_model->fetchinfo('disdepositammu',array('bat_id' => $this->session->userdata('userid')));
			
			$this->load->view(F_BTALION.'arms/owndep',$data);
		}/*Close*/

		/*Add arms*/
		public function issuedepositid($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$dtype = $this->input->post("dtype",TRUE);
			$atype = $this->input->post("atype",TRUE);
			$lcarts = $this->input->post("lcarts",TRUE);
			$mcarts = $this->input->post("mcarts",TRUE);
			$ecarts = $this->input->post("ecarts",TRUE);
	
			$locarts = $this->input->post("locarts",TRUE);
			$mcartp = $this->input->post("mcartp",TRUE);
			$ecratp = $this->input->post("ecratp",TRUE);
			$locartp = $this->input->post("locartp",TRUE);
			$amqunt = $this->input->post("amqunt",TRUE);

			$abc = $this->input->post("abc",TRUE);
			$wlocarts = $this->input->post("wlcarts",TRUE);
			$wmcartp = $this->input->post("wmcarts",TRUE);
			$wecratp = $this->input->post("wecarts",TRUE);
			$wlocartp = $this->input->post("wlocarts",TRUE);
			$wamqunt = $this->input->post("wamqunt",TRUE);

			$abcp = $this->input->post("abcp",TRUE);
			$wlocartsp = $this->input->post("wlcartp",TRUE);
			$wmcartpp = $this->input->post("wmcartp",TRUE);
			$wecratpp = $this->input->post("wecartp",TRUE);
			$wlocartpp = $this->input->post("wlocartp",TRUE);
			$wamquntp = $this->input->post("wamquntp",TRUE);

			$cw = $this->input->post("cw",TRUE);
			$cw2 = $this->input->post("cw2",TRUE);
			$cw3 = $this->input->post("cw3",TRUE);
			$ssw = $this->input->post("ssw",TRUE);
			$suw = $this->input->post("suw",TRUE);

			$llcartp = $this->input->post("llcartp",TRUE);
			
			

			$this->form_validation->set_rules("dtype", "dtype", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->depositissue_arm($id,$dtype,$atype,$lcarts,$mcarts,$ecarts,$locarts,$mcartp,$ecratp,$locartp,$amqunt,$wlocarts,$wmcartp,$wecratp,$wlocartp,$wamqunt,$abc,$cw,$ssw,$suw,$abcp,$wlocartsp,$wmcartpp,$wecratpp,$wlocartpp,$wamquntp,$llcartp);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has created succesfully !');
						redirect('bt-issuedeposit');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-issuedeposit');
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));
				$data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

				$data['weaponi'] = $this->Btalion_model->weaponlist();
				/*$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));*/
				/*$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
				$data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
				$data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
				$data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));*/
				$data['weapon'] = $this->Btalion_model->fetchinfo('newwepon_data',array('status' => 1 ));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
				$this->load->view(F_BTALION.'arms/depositall',$data);
		}/*Close*/


		/*Add arms*/
		public function depostreport(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
		
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));
				$data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			$data['weaponi'] = $this->Btalion_model->weaponlist();
				/*$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				*/
				$data['weapon'] = $this->Btalion_model->fetchinfo('issue_arm',array('istatus' => 0,
					'bat_id' => $this->session->userdata('userid')));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
				$this->load->view(F_BTALION.'old/depositarm',$data);
		}/*Close*/

		/*Add arms*/
		public function nodeldeposit(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			/*$data['weapon'] = $this->Btalion_model->fetchinfo('newamus',array('old_status' => 1,'bat_id' => $this->session->userdata('userid')));*/
			$data['weapon'] = $this->Btalion_model->fetchinfo('deposit_ammu',array('ammutype' => 'Service','ibat_id' => $this->session->userdata('userid'),'da_status' => 1),'weapon');
				$this->load->view(F_BTALION.'arms/nodel',$data);
		}/*Close*/

		/*Add arms*/
		public function nodeldepositp(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$this->load->model('Ammunition_model');
			$weapons = $this->input->post('weapons');
                        $bores = $this->input->post('ammunition_bore');
                        $data['weapon'] = $this->Ammunition_model->getDepositAmmunition($weapons,$bores,$this->session->userdata('userid'));
			//$data['weapon'] = $this->Btalion_model->fetchinfo('deposit_ammu',array('ammutype' => 'Practice','ibat_id' => $this->session->userdata('userid'),'da_status' => 1),'weapon');
                        $data['tow'] = $this->Btalion_model->weaponlist();
				$this->load->view(F_BTALION.'arms/prnodel',$data);
		}/*Close*/


		/*Add arms*/
		public function tsser(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$data['weapon'] = $this->Btalion_model->fetchinfo('newamus',array('old_status' => 1));
				$this->load->view(F_BTALION.'arms/tsser',$data);
		}/*Close*/

		/*Add arms*/
		public function tsprc(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$data['weapon'] = $this->Btalion_model->fetchinfo('newamu',array('old_status' => 1));
				$this->load->view(F_BTALION.'arms/tsprc',$data);
		}/*Close*/

		/*Add arms*/
		public function nodellist($id,$v){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$dtype = $this->input->post("dtype",TRUE);
			$wecartp =  $this->input->post("wecartp",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$rcdate = $this->input->post("rcdate",TRUE);
			$bname = $this->input->post("bname",TRUE);
			$atype = $this->input->post("atype",TRUE);
			$lcarts =  $this->input->post("lcarts",TRUE);
			$locarts =  $this->input->post("locarts",TRUE);
			$mcartp =  $this->input->post("mcartp",TRUE);
			$ccartp =  $this->input->post("ccartp",TRUE);
			$idseg =  $this->input->post("idseg",TRUE);
			
			$this->form_validation->set_rules("dtype", "dtype", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->nodellist($atype,$dtype,$wecartp,$rcno,$rcdate,$bname,$lcarts,$locarts,$mcartp,$ccartp,$idseg);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Deposit succesfully !');
						redirect('bt-nodeldeposit');
					}else{
						$this->session->set_flashdata('error_msg','Deposit not succesfully.');
						redirect('bt-nodeldeposit');
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));
				$as = $this->Btalion_model->fetchoneinfo('newwepon_dataqty',array('nwep_id' => $v, 'bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));
				$data['ammu'] = $as;
				$data['ammuss'] = $this->Btalion_model->fetchoneinfo('newwepon_data',array('arm' => $as->arm/*,'staofserv' => 'In Kot'*/));

				$data['weaponi'] = $this->Btalion_model->weaponlist();
				/*$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));*/
				$this->load->view(F_BTALION.'arms/nlist',$data);
		}/*Close*/

		/*Add arms*/
		public function nodellistwep(){
                    //die('dalwinder');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$rcdate = $this->input->post("rcdate",TRUE);
			
			
			$this->form_validation->set_rules("wbodyno", "bodyno", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->weaponca($wbodyno,$rcno,$rcdate);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Move to CA succesfully');
						redirect('bt-nodellistwep');
					}else{
						$this->session->set_flashdata('error_msg','Something went wrong.l');
						redirect('bt-nodellistwep');
					}	
				}
				#$ql\pl

				$as = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid'),'staofserv in (\'In Kot\',\'Condemn\',\'Minor Damage\',\'Major Damage\',\'Expired\')'));
				$data['ammu'] = $as;
				$this->load->view(F_BTALION.'arms/wnodel',$data);
		}/*Close*/

		

		/*Add arms*/
		public function cawep(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->model('Weapon/Weapon_model');
			
			$data['weapon'] = $this->Btalion_model->fetchinfo('cawep',array('bat_id' => $this->session->userdata('userid')));
			//get the ids over here
			$district_ids = [];
			foreach($data['weapon'] as $k=>$val){
				if($val->where_it_is!='CENTRAL_ARMOURY'){
					$ddtemp = explode(';',$val->where_it_is);
					if(isset($ddtemp[1])){
						$district_ids[] = $ddtemp[1];
					}
				}
			}
			$districts = [];
			if(count($district_ids)>0){
				$district_objs = $this->Weapon_model->getDistrictsByIds($district_ids);
				foreach($district_objs as $k=>$district_obj){
					$districts[$district_obj->state_list_id] = $district_obj->city;
				}
			}
			$data['districts'] = $districts;
			$this->load->view(F_BTALION.'arms/cawep',$data);
		}/*Close*/

		/*Add arms*/
		public function nodellistp($id,$v){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$id_deposit_ammu = $this->input->post('id_deposit_ammu');
			$dtype = $this->input->post("dtype",TRUE);
			//$wecartp =  $this->input->post("wecartp",TRUE);
                        
			$rcno = $this->input->post("rcno",TRUE);
			$rcdate = $this->input->post("rcdate",TRUE);
			$bname = $this->input->post("bname",TRUE);
			$atype = $this->input->post("atype",TRUE);
			$lcarts =  $this->input->post("lcarts",TRUE);
			$locarts =  $this->input->post("locarts",TRUE);
			$mcartp =  $this->input->post("mcartp",TRUE);
			
			$ccartp =  $this->input->post("ccartp",TRUE);
			$idseg =  $this->input->post("idseg",TRUE);
			$data['detail_deposit_ammu'] = $this->Btalion_model->fetchoneinfo('deposit_ammu',array('deposit_ammu_id'=>$id));
			$this->form_validation->set_rules("dtype", "Deposit To", "trim|required");
			$this->form_validation->set_rules("ccartp", "Condem Cartridges", "required|callback_valid_condem_cartiridges[".$data['detail_deposit_ammu']->ecat."]");

				if ($this->form_validation->run()){
                                    $wecartp = $data['detail_deposit_ammu']->ecat - $ccartp;
                                    $lcarts = $data['detail_deposit_ammu']->lcat;
                                    $locarts = $data['detail_deposit_ammu']->locat;
                                    $mcartp = $data['detail_deposit_ammu']->mcat;
					$add_web = $this->Btalion_model->nodellist($atype,$dtype,$wecartp,$rcno,$rcdate,$bname,$lcarts,$locarts,$mcartp,$ccartp,$idseg );
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Deposit succesfully !');
						redirect('bt-nodeldepositp');
					}else{
						$this->session->set_flashdata('error_msg','Deposit not succesfully.');
						redirect('bt-nodeldepositp');
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));
				$data['ammu'] = $this->Btalion_model->fetchoneinfo('newwepon_dataqtyp',array('nwep_id' => $v, 'bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));
                                
                                //var_dump($data['detail_deposit_ammu']);
                                $data['total_cartiridges'] = $data['detail_deposit_ammu']->lcat+$data['detail_deposit_ammu']->locat+$data['detail_deposit_ammu']->mcat + $data['detail_deposit_ammu']->ecat;
                                //die;    
				$data['weaponi'] = $this->Btalion_model->weaponlist();
				/*$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));*/
                                
				$this->load->view(F_BTALION.'arms/nplist',$data);
		}/*Close*/
                public function valid_condem_cartiridges($condem_cartridges,$deposit_ammu_empty_cartiridges){
                    if($condem_cartridges>$deposit_ammu_empty_cartiridges){
                        $this->form_validation->set_message('valid_condem_cartiridges', 'Invalid Quantity of Condem Cartridges!!');
                        return false;
                    }else{
                        return true;
                    }
                }

		/*Add arms*/
		public function serannureport(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}


			
				$data['weapon'] = $this->Btalion_model->fetchinfogroups('issue_arm',array('istatus' => 0, 'atype' =>'Service','bat_id' => $data['ninfo']),'abore');
				$this->load->view(F_BTALION.'old/servicereport',$data);
		}/*Close*/


		/*Add arms*/
		public function pracreport(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}

			
				$data['weapon'] = $this->Btalion_model->fetchinfo('deposit_ammu',array('ammutype' =>'Practice','ibat_id' => $data['ninfo'] ),['order_by'=>'weapon','direction'=>'asc']);
				$this->load->view(F_BTALION.'old/practicereport',$data);
		}/*Close*/
		
		
		
			/*Add arms*/
		public function addparm(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$now = $this->input->post("now",TRUE);
			$acc = $this->input->post("acc",TRUE);
			$ab = $this->input->post("ab",TRUE);
			$hn = $this->input->post("hn",TRUE);
			
			


			$this->form_validation->set_rules("now", "now", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->issue_parm($now,$acc,$ab,$hn);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has created succesfully !');
						redirect('bt-add-parm');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-add-parm');
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));

				$data['weaponi'] = $this->Btalion_model->weaponlist();
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				$this->load->view(F_BTALION.'arms/practice',$data);
		}/*Close*/

				/*Add arms*/
		public function editparm($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$now = $this->input->post("now",TRUE);
			$acc = $this->input->post("acc",TRUE);
			$ab = $this->input->post("ab",TRUE);
			$qty = $this->input->post("qty",TRUE);
			$hn = $this->input->post("hn",TRUE);
			
			$this->form_validation->set_rules("now", "now", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->issue_parmedit($id,$now,$acc,$ab,$qty,$hn);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has created succesfully !');
						redirect('bt-bkhcparmsissued');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-bkhcparmsissued');
					}	
				}
				
				$data['arms'] = $this->Btalion_model->fetchoneinfo('pammu',array('pammu_id' => $id, 'bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));

				$data['weaponi'] = $this->Btalion_model->weaponlist();
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				$this->load->view(F_BTALION.'arms/editpractice',$data);
		}/*Close*/


				/*Add arms*/
		public function depositparm($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$ql = $this->input->post("ql",TRUE);
			$qes = $this->input->post("qes",TRUE);
			$ls = $this->input->post("ls",TRUE);
			$idate = $this->input->post("idate",TRUE);
			
			$this->form_validation->set_rules("ql", "ql", "trim|required");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->issue_parmdeposit($id,$ql,$qes,$ls,$idate);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has created succesfully !');
						redirect('bt-bkhcparmsissued');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-bkhcparmsissued');
					}	
				}
				
				$data['arms'] = $this->Btalion_model->fetchoneinfo('pammu',array('pammu_id' => $id, 'bat_id' => $this->session->userdata('userid')/*,'staofserv' => 'In Kot'*/));

				$data['weaponi'] = $this->Btalion_model->weaponlist();
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				$this->load->view(F_BTALION.'ammunition/depositammu',$data);
		}/*Close*/


		/*Add arms*/
		public function checkarm(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$bdn = $this->input->post("bodyno",TRUE);
			$ammunition_type = $this->input->post('ammunition_type');
		if($ammunition_type=='Practice'){
				$vals =  $this->Btalion_model->fetchinfo('old_weapon',array('tow' => $bdn, 'bat_id' => $this->session->userdata('userid')));
			}else{
				$vals =  $this->Btalion_model->fetchinfo('old_weapon',array('tow' => $bdn, 'bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));
			}
			foreach($vals as $value){
				echo'<option value="'.$value->old_weapon_id.'">'.$value->bono.'</option>';
				
			}
			
		}/*Close*/

		/*Add arms*/
		public function addissuearm($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$data['vals'] =  $this->Btalion_model->fetchoneinfo('old_weapon',array('bono' => $id, 'bat_id' => $this->session->userdata('userid')));

			$mq = $this->input->post("mq",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$it = $this->input->post("it",TRUE);
			
			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;

			$hn = $this->input->post("hn",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$itoOther = $this->input->post("itoOther",TRUE);
			$arp = $this->input->post("arp",TRUE);
			$sdrf =  $this->input->post("sdrf",TRUE);
			$ssg  =  $this->input->post("ssg",TRUE);
			$cr =  $this->input->post("cr",TRUE);
			$ammu =  $this->input->post("ammu",TRUE);
			$now =  $this->input->post("now",TRUE);
			$qw =   $this->input->post("qw",TRUE);
			$aqw =    $this->input->post("aqw",TRUE);
			$qw1 =   $this->input->post("qw1",TRUE);
			$aqw1 =    $this->input->post("aqwp1",TRUE);



			$this->form_validation->set_rules("mq", "mq", "trim");
			$this->form_validation->set_rules("acc", "acc", "trim");
			$this->form_validation->set_rules("mode", "mode", "trim");
			$this->form_validation->set_rules("it", "it", "trim");
			$this->form_validation->set_rules("tod", "tod", "trim");
			$this->form_validation->set_rules("todt", "todt", "trim");
			$this->form_validation->set_rules("todth", "todt", "trim");
			$this->form_validation->set_rules("todf", "todt", "trim");
			$this->form_validation->set_rules("todfi", "todt", "trim");
			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("nop", "nop", "trim");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->editissue_arm($id,$mq,$idate,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr,$ammu,$now,$qw,$aqw,$qw1,$aqw1);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has created succesfully !');
						redirect('bt-bkhcarmsissued');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-addissuearm/'.$id);
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));
				$data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
				$data['issuelist'] = $this->Btalion_model->fetchoneinfo('issue_arm',array('issue_arm_id' => $id));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			$data['weaponi'] = $this->Btalion_model->weaponlist();
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
				$data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
				$data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
				$data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
				$this->load->view(F_BTALION.'arms/editissue',$data);
		}/*Close*/

		/*Deposit Arms*/
		public function deposit_arm($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$mq = $this->input->post("mq",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$it = $this->input->post("it",TRUE);
			
			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;

			$hn = $this->input->post("hn",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$itoOther = $this->input->post("itoOther",TRUE);
			$arp = $this->input->post("arp",TRUE);
			$sdrf =  $this->input->post("sdrf",TRUE);
			$ssg  =  $this->input->post("ssg",TRUE);
			$cr =  $this->input->post("cr",TRUE);
			$ammu =  $this->input->post("ammu",TRUE);
			$now =  $this->input->post("now",TRUE);
			$qw =   $this->input->post("qw",TRUE);
			$qw1 =   $this->input->post("qw1",TRUE);



			$this->form_validation->set_rules("mq", "mq", "trim");
			$this->form_validation->set_rules("acc", "acc", "trim");
			$this->form_validation->set_rules("mode", "mode", "trim");
			$this->form_validation->set_rules("it", "it", "trim");
			$this->form_validation->set_rules("tod", "tod", "trim");
			$this->form_validation->set_rules("todt", "todt", "trim");
			$this->form_validation->set_rules("todth", "todt", "trim");
			$this->form_validation->set_rules("todf", "todt", "trim");
			$this->form_validation->set_rules("todfi", "todt", "trim");
			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("nop", "nop", "trim");

				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->deposit_arm($id,$mq,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr,$ammu,$now,$qw,$qw1);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has deposit succesfully !');
						redirect('bt-bkhcarmsissued');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-deposit-arm/'.$id);
					}	
				}
				$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid'),'staofserv' => 'In Kot'));
				$data['weaponop'] = $this->Btalion_model->fetchinfo('battallion_issue',array('ito' => $this->session->userdata('userid')));
				$data['issuelist'] = $this->Btalion_model->fetchoneinfo('issue_arm',array('issue_arm_id' => $id));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			$data['weaponi'] = $this->Btalion_model->weaponlist();
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
				$data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
				$data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
				$data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$this->load->view(F_BTALION.'arms/depositform',$data);
		}/*Close*/

		/*Holder Name*/
		public function holder_name(){
			$bdn = $this->input->post("bdn",TRUE);
			$wep = $this->Btalion_model->fetchoneinfo('old_weapon',array('bono' => $bdn));
			//print_r($wep); 
			if($wep->holdname!=''){
					$user = $this->Btalion_model->fetchoneinfo('newosi',array('man_id' => $wep->holdname));
			echo'<option value="'.$user->man_id.'">  Holder Name: '.$user->name.'</option>';
				}
				elseif($wep->protec!=''){
					$user = $this->Btalion_model->fetchoneinfo('newosi',array('man_id' => $wep->protec));
			echo'<option value="'.$user->man_id.'">  Protectie Name: '.$user->name.'</option>';
				}elseif($wep->other!=''){
					echo'<option value="'.$wep->other.'">'.$wep->other.'</option>';
				}
			}
			
		public function holder_nameho(){
			$bdn = $this->input->post("bdn",TRUE);
			$wep = $this->Btalion_model->fetchoneinfo('old_horse',array('horse_id' => $bdn));
			//print_r($wep); 
			if($wep->rname!=''){
					$user = $this->Btalion_model->fetchoneinfo('newosi',array('man_id' => $wep->rname));
			echo'<option value="'.$user->man_id.'">  Rider Name: '.$user->name. '&nbsp; Permanent Rank: '.$user->pr. '&nbsp; Contact No: '.$user->phone1.'</option>';
				}
				elseif($wep->rname=='' && $wep->off_id!=''){
					//$user = $this->Btalion_model->fetchoneinfo(T_OFFICER,array('officer_master_id' => $wep->off_id));
			//echo'<option value="'.$user->officer_master_id	.'"> Officer Name: '.$user->off_name.'&nbsp; Rank: '.$user->rank. '&nbsp; Contact No: '.$user->contact_no.'</option>';
				}else{
					echo'<option value=""> No user found</option>';
				}
			}

			public function blist(){
			$batidlist = $this->input->post("bodyno",TRUE);
			$data=array('batidlist' => $batidlist);
				$this->session->set_userdata($data);
				echo $this->session->userdata('batidlist');
		}

		public function issueholder_name_by_id(){
			$man_id = $this->input->post("man_id",TRUE);
			
			$user = $this->Btalion_model->fetchinfolike('newosi',array('man_id' => $man_id));
				foreach ($user as $value) {
					$val = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $value->bat_id));
					if($val != ''){
						echo '<p class="btn btn-xs btn-success" id="a'.$value->man_id.'" data-input="'.$value->man_id.'"><strong>Name: </strong>'.$value->name. '&nbsp; <strong>Dept No: </strong>'.$value->depttno. '&nbsp; <strong>Mobile: </strong>'.$value->phono1.'&nbsp; <strong>Battalion: </strong>'.$val->user_name.'</p><br/><br/>';
					}else{
						echo '<p class="label label-success" id="a'.$value->man_id.'"><strong>Name: </strong>'.$value->name. '&nbsp; <strong>Dept No: </strong>'.$value->depttno. '&nbsp; <strong>Mobile: </strong>'.$value->phono1.'&nbsp; <strong>Battalion: </strong>'.'</p><br/><br/>';
					}
					
				}
				
			}
				/*Holder Name*/
		public function issueholder_name(){
			$bdn = $this->input->post("keyword",TRUE);
			
			$user = $this->Btalion_model->fetchinfolike('newosi',array('depttno' => $bdn, 'bat_id' => $this->session->userdata('batidlist')));
				foreach ($user as $value) {
					$val = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $value->bat_id));
					if($val != ''){
						echo '<p class="btn btn-xs btn-success" id="a'.$value->man_id.'" data-input="'.$value->man_id.'"><strong>Name: </strong>'.$value->name. '&nbsp; <strong>Dept No: </strong>'.$value->depttno. '&nbsp; <strong>Mobile: </strong>'.$value->phono1.'&nbsp; <strong>Battalion: </strong>'.$val->user_name.'</p><br/><br/>';
					}else{
						echo '<p class="label label-success" id="a'.$value->man_id.'"><strong>Name: </strong>'.$value->name. '&nbsp; <strong>Dept No: </strong>'.$value->depttno. '&nbsp; <strong>Mobile: </strong>'.$value->phono1.'&nbsp; <strong>Battalion: </strong>'.'</p><br/><br/>';
					}
					
				}
				
			}

			
			
		public function issueholder_namelist(){
			$bdn = $this->input->post("bodyno",TRUE);
			
			$user = $this->Btalion_model->joinpostinglist($bdn);
			
				foreach ($user as $value) {
					$val = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $value->batt_id));
					if($val != ''){
						echo'<option value="'.$value->man_id.'"> Name: '.$value->name. '&nbsp; Dept No: '.$value->depttno. '&nbsp; Battalion: '.$val->user_name.'</option>';
						
					}else{
						echo'<option value="'.$value->man_id.'">  Name: '.$value->name. '&nbsp; Dept No: '.$value->depttno. '&nbsp; Battalion: '.$val->user_name.'</option>';
					}
					
				}
				
			}

		public function ammunitiontype(){
			$bdn = $this->input->post("bodyno",TRUE);
			if($bdn == 'Service'){
			 $val = $this->Btalion_model->fetchinfo('newamus',array('old_status' => 1));
			 echo'<option value="">--Select--</option>';
			 foreach ($val as  $value) {
			 	echo'<option value="'.$value->old_ammunation_id.'">'.$value->ammubore. '&nbsp; Year Lot: '.$value->yearman.'</option>';
			 }
			}elseif($bdn == 'Practice'){
			 $val = $this->Btalion_model->fetchinfo('newamu',array('old_status' => 1));
			 echo'<option value="">--Select--</option>';
			 foreach ($val as $value) {
			 	echo'<option value="'.$value->old_ammunation_id.'">'.$value->ammubore. '&nbsp; Year Lot: '.$value->yearman.'</option>';
			 }
			 
			}
			
				
			}

		public function qty_ammu(){
			$ammuval = $this->input->post("ammuval",TRUE);
			$bdn = $this->input->post("bodyno",TRUE);

			if($ammuval == 'Service'){
			$val = $this->Btalion_model->fetchoneinfo('newamus',array('old_ammunation_id' => $bdn));
			echo $val->recinkot;
			}elseif($ammuval == 'Practice'){
			$val = $this->Btalion_model->fetchoneinfo('newamu',array('old_ammunation_id' => $bdn));
			echo $val->recinkot;
			}
			
		}

		public function view_deposit_arm(){
			$this->load->helper('common_helper');
			$data['arms'] = $this->Btalion_model->fetchinfo(T_DEPWEP,array('bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'arms/viewdepositform',$data);
		}/*Close*/

		/*Update Arms*/
		public function weapon_constatus(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$bdn = $this->input->post("bdn",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$cw = $this->input->post("cw",TRUE);
			$ssw = $this->input->post("ssw",TRUE);
			$suw = $this->input->post("suw",TRUE);
			$vdate = $this->input->post("vdate",TRUE);
			$ca = $this->input->post("ca",TRUE);
			$remark = $this->input->post("remark",TRUE);
			$Orderno = $this->input->post("Orderno",TRUE);
			  
			$this->form_validation->set_rules("bdn", "bdn", "trim|required");
			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("cw", "cw", "trim");
			$this->form_validation->set_rules("ssw", "ssw", "trim");
			$this->form_validation->set_rules("suw", "suw", "trim");
			$this->form_validation->set_rules("vdate", "vdate", "trim");
			$this->form_validation->set_rules("ca", "ca", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->update_arm($bdn,$hn,$cw,$ssw,$suw,$vdate,$ca,$remark,$Orderno); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-weapon-con');
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated.');
					redirect('bt-weapon-con');
				}	
			}
			$data['weapon'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => $ninfo[0] ));
			$this->load->view(F_BTALION.'arms/update',$data);
		}/*Close*/

		/*Update Arms*/
		public function weapon_update(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$tow = $this->input->post("tow",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$wbuttno = $this->input->post("wbuttno",TRUE);
			$tows = $this->input->post("tows",TRUE);
			$mq = $this->input->post("mq",TRUE);
	
			  
			$this->form_validation->set_rules("tow", "bdn", "trim|required");
			$this->form_validation->set_rules("wbodyno", "hn", "trim");
			$this->form_validation->set_rules("wbuttno", "cw", "trim");
			$this->form_validation->set_rules("tows", "ssw", "trim");
			$this->form_validation->set_rules("mq", "suw", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->update_armlist($tow,$wbodyno,$wbuttno,$tows,$mq); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-weapon-update');
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated.');
					redirect('bt-weapon-update');
				}	
			}
			$data['weapon'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'arms/update',$data);
		}/*Close*/

		/*Add New Arm start*/
		public function addarmbat(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$tow = $this->input->post("tow",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$wbuttno = $this->input->post("wbuttno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);
			$tows = $this->input->post("tows",TRUE);
			$mq = $this->input->post("mq",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$rdate =  $this->input->post("rdate",TRUE);

			$this->form_validation->set_rules("tow", "Type of Weapon", "trim|required");
			$this->form_validation->set_rules("wbodyno", "Arm Body No", "trim|required|is_unique[old_weapon.bono]");
			$this->form_validation->set_rules("wbuttno", "Arm Butt No", "trim");
			$this->form_validation->set_rules("vdate", "Receive Date", "trim");
			$this->form_validation->set_rules("tows", "Magazine Qty", "trim");
			$this->form_validation->set_rules("mq", "RC/Voucher No", "trim");
			$this->form_validation->set_rules("rcvno", "Voucher Date", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_arm($tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Arms has created succesfully !');
					redirect('bt-addarmbat');
				}else{
					$this->session->set_flashdata('error_msg','Arms has not created.');
					redirect('bt-addarmbat');
				}	
			}
			$data['weapon'] = $this->Btalion_model->fetchinfo('newwepon_data',array('status' => 1 ));
			$this->load->view(F_BTALION.'arms/addarms',$data);
		}/*Close*/

		/*Add New Arm start*/
		public function bkhcarms_edit($id){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$tow = $this->input->post("tow",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$wbuttno = $this->input->post("wbuttno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);
			$tows = $this->input->post("tows",TRUE);
			$mq = $this->input->post("mq",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$rdate =  $this->input->post("rdate",TRUE);

			$cw = $this->input->post("cw",TRUE);
			$ssw = $this->input->post("ssw",TRUE);
			$suw =  $this->input->post("suw",TRUE);
			$doi = $this->input->post("doi",TRUE);
			//$issue_date = $this->input->post("issue_date",TRUE);
			
			$data['armslist'] = $this->Btalion_model->fetchoneinfo('old_weapon',array('old_weapon_id' => $id));
	
			$this->form_validation->set_rules("tow", "Weapon", "required");
			$this->form_validation->set_rules("wbodyno", "Body Number", "required");
			$this->form_validation->set_rules("wbuttno", "Butt Number", "required");
			$this->form_validation->set_rules("vdate", "Receive From", "required");
			$this->form_validation->set_rules("tows", "Receive Mode", "required");
			//$this->form_validation->set_rules("mq", "Magazine Quantity", "required");
			$this->form_validation->set_rules("rcvno", "RC/Voucher Number", "required");
			$this->form_validation->set_rules("rdate", "RC/Voucher Date", "required");
			$this->form_validation->set_rules("cw", "Weapon Type", "required");
			//$this->form_validation->set_rules("issue_date", "Issue Date", "required");
			
			
			if ($this->form_validation->run()){
				if($cw=='Serviceable'){
					$this->form_validation->set_rules("ssw", "Status of Serviceable Weapon", "required");
				}elseif($cw=='Non-Serviceable'){
					$this->form_validation->set_rules("suw", "Status of Non-Serviceable Weapon", "required");
				}
				if($this->form_validation->run()){
					if($cw=='Non-Serviceable'){
						$suw = 'Condemn';
					}
					$add_web = $this->Btalion_model->edit_arm($id,$tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate,$cw,$ssw,$suw,$doi);//,$issue_date); 	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Arms has created successfully !');
						redirect('bt-bkhcarms');
					}else{
						$this->session->set_flashdata('error_msg','Arms has not created.');
						redirect('bt-bkhcarms');
					}
				}
					
			}
			$data['weapon'] = $this->Btalion_model->fetchinfo('newwepon_data',array('status' => 1 ));
			$this->load->view(F_BTALION.'arms/editarms',$data);
		}/*Close*/

		/*Arm inspection*/
		public function arm_ins(){
					$this->load->library('form_validation');
					$this->load->helper('security');
					$this->load->helper('common_helper');

					//$atype = $this->input->post("atype",TRUE);
					$bdn = $this->input->post("bdn",TRUE);
					$cw = $this->input->post("cw",TRUE);
					$name = $this->input->post("name",TRUE);
					$idate = $this->input->post("idate",TRUE);
					$idateo = $this->input->post("idateo",TRUE);
					$cwi = $this->input->post("cwi",TRUE);
					$ssw = $this->input->post("ssw",TRUE);
					$suw = $this->input->post("suw",TRUE);
					$remark = $this->input->post("remark",TRUE);

					$this->form_validation->set_rules("bdn", "bdn", "trim");
					


					if ($this->form_validation->run()){
						$add_web = $this->Btalion_model->ins_ammuarm($bdn,$cw,$name,$idate,$cwi,$ssw,$suw,$remark,$idateo);
						if($add_web == 1){
							$this->session->set_flashdata('success_msg','Info has added succesfully !');
							redirect('bt-ins-arm');
						}else{
							$this->session->set_flashdata('error_msg','Info has not added.');
							redirect('bt-ins-arm');
						}	
					}

					$data['weapon'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
					
					$this->load->view(F_BTALION.'arms/inspection',$data);
		}/*Close*/

			/*Arm inspection*/
		public function ammus_ins(){
					$this->load->library('form_validation');
					$this->load->helper('security');
					$this->load->helper('common_helper');

					$data["amli"] = $this->Btalion_model->get_khcamust($this->session->userdata('userid'));

					$atype = $this->input->post("atype",TRUE);
					$bdn = $this->input->post("bdn",TRUE);
					$qty = $this->input->post("qty",TRUE);
					$nio = $this->input->post("nio",TRUE);
					$idate = $this->input->post("idate",TRUE);
					$uqty = $this->input->post("uqty",TRUE);
					$remark = $this->input->post("remark",TRUE);

					$this->form_validation->set_rules("atype", "bdn", "trim|required");
					$this->form_validation->set_rules("bdn", "hn", "trim");
					$this->form_validation->set_rules("qty", "cw", "trim");
					$this->form_validation->set_rules("nio", "name", "trim");
					$this->form_validation->set_rules("idate", "idate", "trim");
					$this->form_validation->set_rules("uqty", "uqty", "trim");
					$this->form_validation->set_rules("remark", "remark", "trim");


					if ($this->form_validation->run()){
						$add_web = $this->Btalion_model->ins_ammu($atype,$bdn,$qty,$nio,$idate,$uqty,$remark);
						if($add_web == 1){
							$this->session->set_flashdata('success_msg','Info has added succesfully !');
							redirect('bt-ins-ammu');
						}else{
							$this->session->set_flashdata('error_msg','Info has not added.');
							redirect('bt-ins-ammu');
						}	
					}

					$data['weapon'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
					
					$this->load->view(F_BTALION.'ammunition/inspection',$data);
		}/*Close*/

		/*Add Ammunition start*/
		public function add_ammunitionbt(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			$now = $this->input->post("now",TRUE);
			$year = $this->input->post("year",TRUE);
			$qw = $this->input->post("qw",TRUE);
			$rfrom = $this->input->post("rfrom",TRUE);
			$rdate = $this->input->post("rdate",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);	

			$this->form_validation->set_rules("bodyno", "bodyno", "trim");
			$this->form_validation->set_rules("now", "now", "trim");
			$this->form_validation->set_rules("year", "year", "trim");
			$this->form_validation->set_rules("qw", "qw", "trim");
			$this->form_validation->set_rules("rdate", "rdate", "trim");
			$this->form_validation->set_rules("rcvno", "rcvno", "trim");
			$this->form_validation->set_rules("vdate", "vdate", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_ammunitionser($bodyno,$now,$year,$qw,$rfrom,$rdate,$rcvno,$vdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Ammunition has created succesfully !');
					redirect('bt-add-ammunitionbt');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition has not issued.');
					redirect('bt-add-ammunitionbt');
				}	
			}
			$data['weapon'] = $this->Btalion_model->weaponlist();
			$this->load->view(F_BTALION.'ammunition/addammu',$data);
		}/*Close*/

		/*Add Ammunition start*/
		public function add_munitionammu(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			$now = $this->input->post("now",TRUE);
			$year = $this->input->post("year",TRUE);
			$qw = $this->input->post("qw",TRUE);
			$rfrom = $this->input->post("rfrom",TRUE);
			$rdate = $this->input->post("rdate",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);	

			$this->form_validation->set_rules("bodyno", "bodyno", "trim");
			$this->form_validation->set_rules("now", "now", "trim");
			$this->form_validation->set_rules("year", "year", "trim");
			$this->form_validation->set_rules("qw", "qw", "trim");
			$this->form_validation->set_rules("rdate", "rdate", "trim");
			$this->form_validation->set_rules("rcvno", "rcvno", "trim");
			$this->form_validation->set_rules("vdate", "vdate", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_mmunitions($bodyno,$now,$year,$qw,$rfrom,$rdate,$rcvno,$vdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Ammunition has created succesfully !');
					redirect('bt-add-munitionammu');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition has not issued.');
					redirect('bt-add-munitionammu');
				}	
			}
			
			$data['weapon'] = $this->Btalion_model->fetchinfo('munition',array('mstatus' => 1 ));
			$this->load->view(F_BTALION.'ammunition/addmunition',$data);
		}/*Close*/

						/*Add Ammunition start*/
		public function add_ammunitionprcbt(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			$now = $this->input->post("now",TRUE);
			$year = $this->input->post("year",TRUE);
			$qw = $this->input->post("qw",TRUE);
			$rfrom = $this->input->post("rfrom",TRUE);
			$rdate = $this->input->post("rdate",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);	

			$this->form_validation->set_rules("bodyno", "bodyno", "trim");
			$this->form_validation->set_rules("now", "now", "trim");
			$this->form_validation->set_rules("year", "year", "trim");
			$this->form_validation->set_rules("qw", "qw", "trim");
			$this->form_validation->set_rules("rdate", "rdate", "trim");
			$this->form_validation->set_rules("rcvno", "rcvno", "trim");
			$this->form_validation->set_rules("vdate", "vdate", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_ammunitionprc($bodyno,$now,$year,$qw,$rfrom,$rdate,$rcvno,$vdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Ammunition has created succesfully !');
					redirect('bt-add-ammunitionprcbt');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition has not issued.');
					redirect('bt-add-ammunitionprcbt');
				}	
			}
			$data['weapon'] = $this->Btalion_model->weaponlist();
			$this->load->view(F_BTALION.'ammunition/addammup',$data);
		}/*Close*/
		
		/*Add ammunition*/
		public function add_ammunition(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$now = $this->input->post("now",TRUE);
			$year =  $this->input->post("year",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$acc = $this->input->post("acc",TRUE);
			$acc00 = $this->input->post("acc00",TRUE);
			$odate = $this->input->post("odate",TRUE);
			$ab = $this->input->post("ab",TRUE);
			$it = $this->input->post("it",TRUE);
			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;
			$hn = $this->input->post("hn",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$itoOther = $this->input->post("itoOther",TRUE);
			$arp = $this->input->post("arp",TRUE);
			$sdrf =  $this->input->post("sdrf",TRUE);
			$ssg  =  $this->input->post("ssg",TRUE);
			$cr =  $this->input->post("cr",TRUE);


			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("on", "on", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->issue_ammuser($now,$year,$idate,$acc,$acc00,$odate,$ab,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Ammunition has created succesfully !');
					redirect('bt-add-ammunition');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition has not issued.');
					redirect('bt-add-ammunition');
				}	
			}
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			$data['arms'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
				$data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
				$data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
				$data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));

				$data['weapon'] = $this->Btalion_model->weaponlist();
			$this->load->view(F_BTALION.'ammunition/addammunition',$data);
		}/*Close*/


		/*Add ammunition*/
		public function add_ammunitionprc(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$now = $this->input->post("now",TRUE);
			$year =  $this->input->post("year",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$acc = $this->input->post("acc",TRUE);
			$acc00 = $this->input->post("acc00",TRUE);
			$odate = $this->input->post("odate",TRUE);
			$ab = $this->input->post("ab",TRUE);
			$it = $this->input->post("it",TRUE);
			$ntod ='';
			$tod = $this->input->post("tod",TRUE);
			$ntod .=$tod;
			$todt = $this->input->post("todt",TRUE);
			$ntod .=$todt;
			$todth = $this->input->post("todth",TRUE);
			$ntod .=$todth;
			$todf = $this->input->post("todf",TRUE);
			$ntod .=$todf;
			$todfi = $this->input->post("todfi",TRUE);
			$ntod .=$todfi;
			$todsi = $this->input->post("todsi",TRUE);
			$ntod .=$todsi;
			$hn = $this->input->post("hn",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$itoOther = $this->input->post("itoOther",TRUE);
			$arp = $this->input->post("arp",TRUE);
			$sdrf =  $this->input->post("sdrf",TRUE);
			$ssg  =  $this->input->post("ssg",TRUE);
			$cr =  $this->input->post("cr",TRUE);


			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("on", "on", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->issue_ammuserpr($now,$year,$idate,$acc,$acc00,$odate,$ab,$it,$ntod,$hn,$nop,$ito,$itoOther,$arp,$sdrf,$ssg,$cr); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Ammunition has issued succesfully !');
					redirect('bt-add-ammunitionprc');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition quantity miss match or not issued.');
					redirect('bt-add-ammunitionprc');
				}	
			}
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
				$data['arp'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 92));
				$data['ssg'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 91));
				$data['sdrf'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 94));
				$data['cr'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 87));
				$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));

				$data['weapon'] = $this->Btalion_model->weaponlist();
			$this->load->view(F_BTALION.'ammunition/addammuprac',$data);
		}/*Close*/


				/*Add ammunition*/
		public function add_munition(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$tow = $this->input->post("tow",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$wbuttno = $this->input->post("wbuttno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);
			$tows = $this->input->post("tows",TRUE);
			$mq = $this->input->post("mq",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$rdate =  $this->input->post("rdate",TRUE);

			$this->form_validation->set_rules("tow", "Type of Weapon", "trim|required");
			$this->form_validation->set_rules("wbodyno", "Arm Body No", "trim|required|is_unique[addmunition.bono]");
			$this->form_validation->set_rules("wbuttno", "Arm Butt No", "trim");
			$this->form_validation->set_rules("vdate", "Receive Date", "trim");
			$this->form_validation->set_rules("tows", "Magazine Qty", "trim");
			$this->form_validation->set_rules("mq", "RC/Voucher No", "trim");
			$this->form_validation->set_rules("rcvno", "Voucher Date", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_munition($tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Arms has created succesfully !');
					redirect('bt-munitionadd');
				}else{
					$this->session->set_flashdata('error_msg','Arms has not created.');
					redirect('bt-munitionadd');
				}	
			}
			$data['weapon'] = $this->Btalion_model->fetchinfo('munition',array('mstatus' => 2 ));
			$data['weaponi'] = $this->Btalion_model->fetchinfo('munition',array('mstatus' => 1 ));
			$this->load->view(F_BTALION.'arms/addmunition',$data);
		}/*Close*/


				/*Add ammunition*/
		public function add_ammuser(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$now = $this->input->post("now",TRUE);
			$year = $this->input->post("year",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$acc = $this->input->post("acc",TRUE);
			$acc00 = $this->input->post("acc00",TRUE);
			$odate = $this->input->post("odate",TRUE);
			$ab = $this->input->post("ab",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$on = $this->input->post("on",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$nito = $this->input->post("nito",TRUE);

			$data['weapon'] = $this->Btalion_model->weaponlist();


			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("on", "on", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->issue_ammuser($now,$year,$idate,$acc,$acc00,$odate,$ab,$hn,$on,$ito,$nito); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Ammunition has issued succesfully !');
					redirect('bt-add-ammunition');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition has not issued.');
					redirect('bt-add-ammunition');
				}	
			}
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
				$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => $ninfo[0] ));
			$this->load->view(F_BTALION.'ammunition/serammu',$data);
		}/*Close*/

		/*Ajax ammunation*/
		public function ammu_aj(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			
			$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");

			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->ammu_list($bodyno);	
		
			echo '<div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition weapon/bore</label>
                  <div class="col-sm-9"><select name="ammu"  id="ammu" data-placeholder="Ammunition bore" title="Please select at least 1 value" class="form-control" required>';
			foreach ($wep as $value) {
				echo "<option value='".$value->old_ammunation_id."'>Ammunation Bore:".$value->ammubore.' &nbsp; Ammunation weapon: '.$value->ammuwep."</option>";
			}
			echo "</select></div></div><br/>";
			}
		}/*Close*/


			/*Ajax ammunation*/
		public function ammu_ajs(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			
			$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");

			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->ammu_lists($bodyno);	
		
			echo '<div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition weapon/bore</label>
                  <div class="col-sm-9"><select name="ammu"  id="ammu" data-placeholder="Ammunition bore" title="Please select at least 1 value" class="form-control" required>';
			foreach ($wep as $value) {
				echo "<option value='".$value->old_ammunation_id."'>Ammunation Bore:".$value->ammubore.' &nbsp; Ammunation weapon: '.$value->ammuwep."</option>";
			}
			echo "</select></div></div><br/>";
			}
		}/*Close*/
		
		/*Deposit ammunation*/
		public function deposit_ammu(){
			$this->load->library('form_validation');
			$this->load->helper('security');$this->load->helper('common_helper');

			$bodyno = $this->input->post("bodyno",TRUE);
			$ammu = $this->input->post("ammu",TRUE);
			$ql = $this->input->post("ql",TRUE);
			$qes = $this->input->post("qes",TRUE);
			$ls = $this->input->post("ls",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$on = $this->input->post("on",TRUE);
			$idate = $this->input->post("idate",TRUE);

			$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");
			$this->form_validation->set_rules("ammu", "ammu", "trim|required");
			$this->form_validation->set_rules("ql", "ql", "trim|required");
			$this->form_validation->set_rules("qes", "qes", "trim|required");
			$this->form_validation->set_rules("ls", "ls", "trim|required");
			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("on", "on", "trim");
			$this->form_validation->set_rules("idate", "idate", "trim|required");
			if ($this->form_validation->run()){

				$add_web = $this->Btalion_model->deposit_ammu($bodyno,$ammu,$ql,$qes,$ls,$hn,$on,$idate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Ammunition has deposit succesfully !');
					redirect('bt-deposit-ammu');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition has not deposit.');
					redirect('bt-deposit-ammu');
				}	
			}

		

			$data['arms'] = $this->Btalion_model->viewarm();
			//$data['weaponop'] = $this->Btalion_model->fetchinfo(T_ISSUE_AMMU,array('issue_to' => $this->session->userdata('userid') ));
			$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			//$data['officer'] = $this->Btalion_model->fetchinfo(T_OFFICER,array('of_status' => 1 ));
			$this->load->view(F_BTALION.'ammunition/depositammu',$data);
		}/*Close*/

		/*Update Ammunation*/
		public function ammuweapon_constatus(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$bodyno = $this->input->post("bodyno",TRUE);
			$ammu = $this->input->post("ammu",TRUE);
			$cw = $this->input->post("ql",TRUE);
			$ssw = $this->input->post("ssw",TRUE);
			$suw = $this->input->post("suw",TRUE);
			$vdate = $this->input->post("vdate",TRUE);
			$ca = $this->input->post("ca",TRUE);
	

			$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");
			$this->form_validation->set_rules("ammu", "ammu", "trim|required");
			$this->form_validation->set_rules("ql", "ql", "trim|required");
			$this->form_validation->set_rules("ssw", "ssw", "trim");
			$this->form_validation->set_rules("suw", "suw", "trim");
			$this->form_validation->set_rules("vdate", "vdate", "trim");
			$this->form_validation->set_rules("ca", "ca", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->amm_con($bodyno,$ammu,$cw,$ssw,$suw,$vdate,$ca); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-ammu-weapon-con');
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated.');
					redirect('bt-ammu-weapon-con');
				}	
			}
			$data['weapon'] = $this->Btalion_model->fetchinfo(T_WEAPON_MASTER,array('weapon_status' => 1 ));
			$data['body'] = $this->Btalion_model->fetchinfo(T_MANMASTER,array('man_status' => 1 ));
			$this->load->view(F_BTALION.'ammunition/weaponcondition',$data);
		}/*Close*/

		/*Ammunation inspection*/
		public function ammu_ins(){
				$this->load->library('form_validation');
				$this->load->helper('security');

				$bodyno = $this->input->post("bodyno",TRUE);
				$ammu = $this->input->post("ammu",TRUE);
				$year = $this->input->post("year",TRUE);
				$ab = $this->input->post("ab",TRUE);
				$cw = $this->input->post("cw",TRUE);
				$name = $this->input->post("name",TRUE);
				$idate = $this->input->post("idate",TRUE);
				$remark = $this->input->post("remark",TRUE);

				$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");
				$this->form_validation->set_rules("ammu", "ammu", "trim|required");
				$this->form_validation->set_rules("year", "year", "trim|required");
				$this->form_validation->set_rules("ab", "ab", "trim|required");
				$this->form_validation->set_rules("cw", "cw", "trim|required");
				$this->form_validation->set_rules("name", "name", "trim|required");
				$this->form_validation->set_rules("idate", "idate", "trim|required");
				$this->form_validation->set_rules("remark", "remark", "trim|required");


				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->ins_ammu($bodyno,$ammu,$year,$ab,$cw,$name,$idate,$remark);
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Info has added succesfully !');
						redirect('bt-ins-ammu');
					}else{
						$this->session->set_flashdata('error_msg','Info has not added.');
						redirect('bt-ins-ammu');
					}	
				}

				$this->load->view(F_BTALION.'ammunition/inspection');
		}/*Close*/

		/*Add monpower*/
		public function add_manpower(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));

			$name = $this->input->post("name",TRUE);
			$fname = $this->input->post("fname",TRUE);
			$hno = $this->input->post("hno",TRUE);
			$sno = $this->input->post("sno",TRUE);
			$vm = $this->input->post("vm",TRUE);
			$wardno = $this->input->post("wardno",TRUE);
			$ct = $this->input->post("ct",TRUE);
			$po = $this->input->post("po",TRUE);
			$ps = $this->input->post("ps",TRUE);
			$tl = $this->input->post("tl",TRUE);
			$state = $this->input->post("state",TRUE);
			$dis = $this->input->post("dis",TRUE);

			$phouseno = $this->input->post("phouseno",TRUE);
			$pstreetno = $this->input->post("pstreetno",TRUE);
			$pvillmoh = $this->input->post("pvillmoh",TRUE);
			$postcity = $this->input->post("postcity",TRUE);
			$pcitypostoff = $this->input->post("pcitypostoff",TRUE);
			$ppolicestation = $this->input->post("ppolicestation",TRUE);
			$ptehsil = $this->input->post("ptehsil",TRUE);
			$postate = $this->input->post("postate",TRUE);
			$pdistrict = $this->input->post("pdistrict",TRUE);
			$gender = $this->input->post("gender",TRUE);
			$mstatus = $this->input->post("mstatus",TRUE);
			//$Single = $this->input->post("Single",TRUE);
			//$Unmarried = $this->input->post("Unmarried",TRUE);
			$dob = $this->input->post("dob",TRUE);
		
			$casting = $this->input->post("casting",TRUE);
			$catii = $this->input->post("catii",TRUE);
			$conphno = $this->input->post("conphno",TRUE);
			$conphnot = $this->input->post("conphnot",TRUE);
			$pemailid = $this->input->post("pemailid",TRUE);
			$addarcard = $this->input->post("addarcard",TRUE);
			$pancard = $this->input->post("pancard",TRUE);
			$bankdetail = $this->input->post("bankdetail",TRUE);
			$bankbrach = $this->input->post("bankbrach",TRUE);
			$bankac = $this->input->post("bankac",TRUE);
			$ifsccode = $this->input->post("ifsccode",TRUE);
			$bloodgroup = $this->input->post("bloodgroup",TRUE);
			$Identificationmark = $this->input->post("Identificationmark",TRUE);


			$Kg = $this->input->post("Kg",TRUE);
			$Gm = $this->input->post("Gm",TRUE);
			$Feet = $this->input->post("Feet",TRUE);
			$inch = $this->input->post("inch",TRUE);
			$stts = $this->input->post("stts",TRUE);
			$UnderGraduate = $this->input->post("UnderGraduate",TRUE);
			$Graduate = $this->input->post("Graduate",TRUE);
			$PostGraduate = $this->input->post("PostGraduate",TRUE);
			$Doctorate = $this->input->post("Doctorate",TRUE);
			$docOther = $this->input->post("docOther",TRUE);
			$Modemdr = $this->input->post("Modemdr",TRUE);

			$mocOther = $this->input->post("mocOther",TRUE);



			$dateofesnlistment1 = $this->input->post("dateofesnlistment1",TRUE);

			$Rankre = $this->input->post("eor",TRUE);
			$eor1 = $this->input->post("eor1",TRUE);
			$eor2 = $this->input->post("eor2",TRUE);
			$eor3 = $this->input->post("eor3",TRUE);
			$eor4 = $this->input->post("eor4",TRUE); 
			$eor5 = $this->input->post("eor5",TRUE);

			$Enlistmentec = $this->input->post("Enlistmentec",TRUE);
			$EnlistmentUnit = $this->input->post("EnlistmentUnit",TRUE);
			$enOther = $this->input->post("enuther",TRUE);
			$DateofRetirementdor = $this->input->post("DateofRetirementdor",TRUE);
			$gpfPRAN = $this->input->post("gpfPRAN",TRUE);
			$PRAN = $this->input->post("PRAN",TRUE);
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			//$buOther = $this->input->post("buOther",TRUE);
			$RankRankre = $this->input->post("RankRankre",TRUE);;

			$catop1 = $this->input->post("catop1",TRUE);
			 $catop2 = $this->input->post("catop2",TRUE);
			$catop3 = $this->input->post("catop3",TRUE);
		 	 $catop4 = $this->input->post("catop4",TRUE); 
		 	$catop5 = $this->input->post("catop5",TRUE);

			$Deptdn = $this->input->post("Deptdn",TRUE);
			$iIdentityCardNocn = $this->input->post("iIdentityCardNocn",TRUE);
			$InductionRankir = $this->input->post("catofind",TRUE);;
			$catofind1 = $this->input->post("catofind1",TRUE);
			 $catofind2 = $this->input->post("catofind2",TRUE);
			$catofind3 = $this->input->post("catofind3",TRUE);
		 	 $catofind4 = $this->input->post("catofind4",TRUE); 
		 	$catofind5 = $this->input->post("catofind5",TRUE);
			

			$InductionModeim = $this->input->post("InductionModeim",TRUE);
			$indictiondate = $this->input->post("indictiondate",TRUE);
			$PreviousBatalionito = $this->input->post("PreviousBatalionito",TRUE);
			//$pbuOther = $this->input->post("pbuOther",TRUE);
			$PreviousNoprn = $this->input->post("PreviousNoprn",TRUE);


			$DateOFPromotionDetails21 = $this->input->post("DateOFPromotionDetails21",TRUE);	
			$DateOFPromotionDetails23 = $this->input->post("DateOFPromotionDetails23",TRUE);
			$DateOFPromotionDetails24 = $this->input->post("DateOFPromotionDetails24",TRUE);
			$DateOFPromotionDetails25 = $this->input->post("DateOFPromotionDetails25",TRUE);
			$DateOFPromotionDetails26 = $this->input->post("DateOFPromotionDetails26",TRUE);
			$DateOFPromotionDetails27 = $this->input->post("DateOFPromotionDetails27",TRUE);
			$DateOFPromotionDetails28 = $this->input->post("DateOFPromotionDetails28",TRUE);
			$DateOFPromotionDetails29 = $this->input->post("DateOFPromotionDetails29",TRUE);
			$DateOFPromotionDetails30 = $this->input->post("DateOFPromotionDetails30",TRUE);
			$DateOFPromotionDetails31 = $this->input->post("DateOFPromotionDetails31",TRUE);
			$DateOFPromotionDetails32 = $this->input->post("DateOFPromotionDetails32",TRUE);
			$DateOFPromotionDetails33 = $this->input->post("DateOFPromotionDetails33",TRUE);
			$DateOFPromotionDetails34 = $this->input->post("DateOFPromotionDetails34",TRUE);
			$LowerSchoolCourseDate35 = $this->input->post("LowerSchoolCourseDate35",TRUE);
			$DateOFPromotionDetails35 = $this->input->post("DateOFPromotionDetails35",TRUE);

			$TrainingInstituteti = $this->input->post("TrainingInstituteti",TRUE);
			//$Othertraining = $this->input->post("Othertraining",TRUE);
			$Batchbn = $this->input->post("Batchbn",TRUE);
			$batchpassdate = $this->input->post("batchpassdate",TRUE);
			$TrainingInstitutessti = $this->input->post("TrainingInstitutessti",TRUE);
			$TrainingInstitutesstiOther = $this->input->post("TrainingInstitutesstiOther",TRUE);
			$NamesofsCourses = $this->input->post("NamesofsCourses",TRUE);
			$DurationsofsCourses = $this->input->post("DurationsofsCourses",TRUE);
			$DurationsofsCoursest = $this->input->post("DurationsofsCoursest",TRUE);
			$NameofsRanges = $this->input->post("NameofsRanges",TRUE);
			$dateofprcatice = $this->input->post("dateofprcatice",TRUE);
			$tow = $this->input->post("tow",TRUE);
			$PreviousNoprnOther= '';
			$tyodu =  $this->input->post("tyodu",TRUE);

			$Nationality =  $this->input->post("nat",TRUE);
			$nstate =  $this->input->post("snat",TRUE);
			$clit =   $this->input->post("clit",TRUE);
			$DateofRetirementdori =    $this->input->post("DateofRetirementdori",TRUE);
			$orderby =  $this->input->post("orderby",TRUE);
			$cnody = $this->input->post("cnody",TRUE);
			$enutherdistrict = $this->input->post("enutherdistrict",TRUE);
			$bunitdistrict =   $this->input->post("bunitdistrict",TRUE);

			$gd1 = $this->input->post("gd1",TRUE);
			$bd1 = $this->input->post("bd1",TRUE);

			$this->form_validation->set_rules("name", "name", "trim");
			
			
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_man($name,$fname,$hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$phouseno,$pstreetno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$docOther,$Modemdr,$mocOther,$dateofesnlistment1,$Rankre,$eor1,$eor2,$eor3,$eor4,$eor5,$Enlistmentec,$EnlistmentUnit,$enOther,$DateofRetirementdor,$gpfPRAN,$PRAN,$BattalionUnitito,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$Deptdn,$iIdentityCardNocn,$InductionRankir,$catofind1,$catofind2,$catofind3,$catofind4,$catofind5,$InductionModeim,$indictiondate,$PreviousBatalionito,$PreviousNoprnOther,$PreviousNoprn,$DateOFPromotionDetails21,$DateOFPromotionDetails23,$DateOFPromotionDetails24,$DateOFPromotionDetails25,$DateOFPromotionDetails26,$DateOFPromotionDetails27,$DateOFPromotionDetails28,$DateOFPromotionDetails29,$DateOFPromotionDetails30,$DateOFPromotionDetails31,$DateOFPromotionDetails32,$DateOFPromotionDetails33,$DateOFPromotionDetails34,$LowerSchoolCourseDate35,$DateOFPromotionDetails35,$TrainingInstituteti,$Batchbn,$batchpassdate,
			$TrainingInstitutessti,$TrainingInstitutesstiOther,$NamesofsCourses,$DurationsofsCourses,$DurationsofsCoursest,$NameofsRanges,$dateofprcatice,$tow,$tyodu,$Nationality,$nstate,$clit,$DateofRetirementdori,$orderby,$cnody,$enutherdistrict,$bunitdistrict,$gd1,$bd1); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has added succesfully !');
					redirect('bt-add-manpower');
				}else{
					$this->session->set_flashdata('error_msg','Info has not added.');
					redirect('bt-add-manpower');
				}	
			}
			$data['weapon'] = $this->Btalion_model->weaponlist();
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));

			$data['citylist'] = $this->Btalion_model->fetchinfo('state_list',array('state' => 'PUNJAB' ));

			$this->load->view(F_BTALION.'manpower/manpowermaster',$data);
		}/*Close*/

		/*Add monpower*/
		public function updates_manpower($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$data['weapon'] = $this->Btalion_model->weaponlist();
			$name = $this->input->post("name",TRUE);
			$fname = $this->input->post("fname",TRUE);
			$hno = $this->input->post("hno",TRUE);
			$sno = $this->input->post("sno",TRUE);
			$vm = $this->input->post("vm",TRUE);
			$wardno = $this->input->post("wardno",TRUE);
			$ct = $this->input->post("ct",TRUE);
			$po = $this->input->post("po",TRUE);
			$ps = $this->input->post("ps",TRUE);
			$tl = $this->input->post("tl",TRUE);
			$state = $this->input->post("state",TRUE);
			$dis = $this->input->post("dis",TRUE);
			$phouseno = $this->input->post("phouseno",TRUE);
			$pstreetno = $this->input->post("pstreetno",TRUE);
			$pwardno = $this->input->post("pwardno",TRUE);
			$pvillmoh = $this->input->post("pvillmoh",TRUE);
			$postcity = $this->input->post("postcity",TRUE);
			$pcitypostoff = $this->input->post("pcitypostoff",TRUE);
			$ppolicestation = $this->input->post("ppolicestation",TRUE);
			$ptehsil = $this->input->post("ptehsil",TRUE);
			$postate = $this->input->post("postate",TRUE);
			$pdistrict = $this->input->post("pdistrict",TRUE);
			$gender = $this->input->post("gender",TRUE);
			$mstatus = $this->input->post("mstatus",TRUE);
			$dob = $this->input->post("dob",TRUE);
			$casting = $this->input->post("casting",TRUE);
			$catii = $this->input->post("catii",TRUE);
			$conphno = $this->input->post("conphno",TRUE);
			$conphnot = $this->input->post("conphnot",TRUE);
			$pemailid = $this->input->post("pemailid",TRUE);
			$addarcard = $this->input->post("addarcard",TRUE);
			$pancard = $this->input->post("pancard",TRUE);
			$bankdetail = $this->input->post("bankdetail",TRUE);
			$bankbrach = $this->input->post("bankbrach",TRUE);
			$bankac = $this->input->post("bankac",TRUE);
			$ifsccode = $this->input->post("ifsccode",TRUE);
			$bloodgroup = $this->input->post("bloodgroup",TRUE);
			$Identificationmark = $this->input->post("Identificationmark",TRUE);
			$Kg = $this->input->post("Kg",TRUE);
			$Gm = $this->input->post("Gm",TRUE);
			$Feet = $this->input->post("Feet",TRUE);
			$inch = $this->input->post("inch",TRUE);
			$stts = $this->input->post("stts",TRUE);
			$UnderGraduate = $this->input->post("UnderGraduate",TRUE);
			$Graduate = $this->input->post("Graduate",TRUE);
			$PostGraduate = $this->input->post("PostGraduate",TRUE);
			$Doctorate = $this->input->post("Doctorate",TRUE);
			$docOther = $this->input->post("docOther",TRUE);
			$Battalion =  $this->input->post("Battalion",TRUE);
			$tyodu =  $this->input->post("tyodu",TRUE);
			$Modemdr = $this->input->post("Modemdr",TRUE);
			$mocOther = $this->input->post("mocOther",TRUE);
			$dateofesnlistment1 = $this->input->post("dateofesnlistment1",TRUE);
			//$dateofesnlistment = $dateofesnlistment1;
			
			$Rankre = $this->input->post("eor",TRUE);
			$eor1 = $this->input->post("eor1",TRUE);
			$eor2 = $this->input->post("eor2",TRUE);
			$eor3 = $this->input->post("eor3",TRUE);
			$eor4 = $this->input->post("eor4",TRUE); 
			$eor5 = $this->input->post("eor5",TRUE);


			$Enlistmentec = $this->input->post("Enlistmentec",TRUE);
			$EnlistmentUnit = $this->input->post("EnlistmentUnit",TRUE);
			$DateofRetirementdor = $this->input->post("DateofRetirementdor",TRUE);
			$gpfPRAN = $this->input->post("gpfPRAN",TRUE);
			$PRAN = $this->input->post("PRAN",TRUE);
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			$RankRankre = $this->input->post("RankRankre",TRUE);

			$catop1 = $this->input->post("catop1",TRUE);
			$catop2 = $this->input->post("catop2",TRUE);
			$catop3 = $this->input->post("catop3",TRUE);
			$catop4 = $this->input->post("catop4",TRUE); 
			$catop5 = $this->input->post("catop5",TRUE);

			$Deptdn = $this->input->post("Deptdn",TRUE);
			$iIdentityCardNocn = $this->input->post("iIdentityCardNocn",TRUE);
			$InductionRankir = $this->input->post("catofind",TRUE);

			$catofind1 = $this->input->post("catofind1",TRUE);
			$catofind2 = $this->input->post("catofind2",TRUE);
			$catofind3 = $this->input->post("catofind3",TRUE);
			$catofind4 = $this->input->post("catofind4",TRUE); 
			$catofind5 = $this->input->post("catofind5",TRUE);

			$InductionModeim = $this->input->post("InductionModeim",TRUE);
			$indictiondate = $this->input->post("indictiondate",TRUE);
			$PreviousBatalionito = $this->input->post("PreviousBatalionito",TRUE);
			$PreviousNoprn = $this->input->post("PreviousNoprn",TRUE);

			$DateOFPromotionDetails21 = $this->input->post("DateOFPromotionDetails21",TRUE);	
			$DateOFPromotionDetails23 = $this->input->post("DateOFPromotionDetails23",TRUE);
			$DateOFPromotionDetails24 = $this->input->post("DateOFPromotionDetails24",TRUE);
			$DateOFPromotionDetails25 = $this->input->post("DateOFPromotionDetails25",TRUE);
			$DateOFPromotionDetails26 = $this->input->post("DateOFPromotionDetails26",TRUE);
			$DateOFPromotionDetails27 = $this->input->post("DateOFPromotionDetails27",TRUE);
			$DateOFPromotionDetails28 = $this->input->post("DateOFPromotionDetails28",TRUE);
			$DateOFPromotionDetails29 = $this->input->post("DateOFPromotionDetails29",TRUE);
			$DateOFPromotionDetails30 = $this->input->post("DateOFPromotionDetails30",TRUE);
			$DateOFPromotionDetails31 = $this->input->post("DateOFPromotionDetails31",TRUE);
			$DateOFPromotionDetails32 = $this->input->post("DateOFPromotionDetails32",TRUE);
			$DateOFPromotionDetails33 = $this->input->post("DateOFPromotionDetails33",TRUE);
			$DateOFPromotionDetails34 = $this->input->post("DateOFPromotionDetails34",TRUE);
			$LowerSchoolCourseDate35 = $this->input->post("LowerSchoolCourseDate35",TRUE);
			$DateOFPromotionDetails35 = $this->input->post("DateOFPromotionDetails35",TRUE);
			$TrainingInstituteti = $this->input->post("TrainingInstituteti",TRUE);
			$Batchbn = $this->input->post("Batchbn",TRUE);
			$batchpassdate = $this->input->post("batchpassdate",TRUE);
			$TrainingInstitutessti = $this->input->post("TrainingInstitutessti",TRUE);
			$TrainingInstitutesstiOther = $this->input->post("TrainingInstitutesstiOther",TRUE);
			$NamesofsCourses = $this->input->post("NamesofsCourses",TRUE);
			$DurationsofsCourses = $this->input->post("DurationsofsCourses",TRUE);
			$DurationsofsCoursest = $this->input->post("DurationsofsCoursest",TRUE);
			$NameofsRanges = $this->input->post("NameofsRanges",TRUE);
			$dateofprcatice = $this->input->post("dateofprcatice",TRUE);
			$tow = $this->input->post("tow",TRUE);

			/*$LatestAnnualMedicalDate = $this->input->post("LatestAnnualMedicalDate",TRUE);
			$PresentHealthStatus = $this->input->post("PresentHealthStatus",TRUE);
			$ChronicDiseaseDetails = $this->input->post("ChronicDiseaseDetails",TRUE);
			$MiscDetails = $this->input->post("MiscDetails",TRUE);
			$Postingtiset = $this->input->post("Postingtiset",TRUE);
			$AdminDutyti = $this->input->post("AdminDutyti",TRUE);
			$AdminDutytiOther = $this->input->post("AdminDutytiOther",TRUE);
			$BnHqrAdminDuty = $this->input->post("BnHqrAdminDuty",TRUE);
			$Commandantoffice = $this->input->post("Commandantoffice",TRUE);


			$AsstCommandantOffice = $this->input->post("AsstCommandantOffice",TRUE);
			$DSPOffice = $this->input->post("DSPOffice",TRUE);
			$EnglishBranch = $this->input->post("EnglishBranch",TRUE);
			$AccountBranch = $this->input->post("AccountBranch",TRUE);
			$OSIBranch = $this->input->post("OSIBranch",TRUE);
			$LitigationBranch = $this->input->post("LitigationBranch",TRUE);
			$StenoBranch = $this->input->post("StenoBranch",TRUE);
			$GPFBranch = $this->input->post("GPFBranch",TRUE);
			$ComputerCell = $this->input->post("ComputerCell",TRUE);
			$MudDuties = $this->input->post("MudDuties",TRUE);
			$GeneralStaff = $this->input->post("GeneralStaff",TRUE);
			$genralOther = $this->input->post("genralOther",TRUE);
			$MTSectionf = $this->input->post("MTSectionf",TRUE);

			$MTSectionfothers = $this->input->post("MTSectionfothers",TRUE);
			$Institutionsti = $this->input->post("Institutionsti",TRUE);
			$Institutionstiother = $this->input->post("Institutionstiother",TRUE);
			$GuardDutiesti = $this->input->post("GuardDutiesti",TRUE);
			$GunmenDutiesti = $this->input->post("GunmenDutiesti",TRUE);
			$Companydutiesti = $this->input->post("Companydutiesti",TRUE);
			$LawOrderDuty = $this->input->post("LawOrderDuty",TRUE);
			$SpecialTeamDuty = $this->input->post("SpecialTeamDuty",TRUE);
			$SportsAttachments = $this->input->post("SportsAttachments",TRUE);
			$SportsAttachmentsOthers = $this->input->post("SportsAttachmentsOthers",TRUE);
			$OtherAttachmentDuties = $this->input->post("OtherAttachmentDuties",TRUE);
			$AttachmentDutiesothers = $this->input->post("AttachmentDutiesothers",TRUE);

			$fone1 = $this->input->post("fone1",TRUE);
			$fone2 = $this->input->post("fone2",TRUE);
			$fone3 = $this->input->post("fone3",TRUE);
			$fone4 = $this->input->post("fone4",TRUE);
			$fone5 = $this->input->post("fone5",TRUE);
			$fone6 = $this->input->post("fone6",TRUE);
			$fone7 = $this->input->post("fone7",TRUE);
			$fone8 = $this->input->post("fone8",TRUE);
			$fone9 = $this->input->post("fone9",TRUE);
			$fone10 = $this->input->post("fone10",TRUE);
			$fone11 = $this->input->post("fone11",TRUE);
			$fone12 = $this->input->post("fone12",TRUE);

			$lone1 = $this->input->post("lone1",TRUE);
			$lone2 = $this->input->post("lone2",TRUE);
			$lone3 = $this->input->post("lone3",TRUE);

			$sqone1 = $this->input->post("sqone1",TRUE);
			$sqone2 = $this->input->post("sqone2",TRUE);
			$sqone3 = $this->input->post("sqone3",TRUE);
			$sqone4 = $this->input->post("sqone4",TRUE);
			$sqone5 = $this->input->post("sqone5",TRUE);
			$sqone6 = $this->input->post("sqone6",TRUE);
			$sqone7 = $this->input->post("sqone7",TRUE);
			$sqone8 = $this->input->post("sqone8",TRUE);

			$paone1 = $this->input->post("paone1",TRUE);
			$paone2 = $this->input->post("paone2",TRUE);
			$paone3 = $this->input->post("paone3",TRUE);
			$paone4 = $this->input->post("paone4",TRUE);
			$paone5 = $this->input->post("paone5",TRUE);
			$paone6 = $this->input->post("paone6",TRUE);
			$paone7 = $this->input->post("paone7",TRUE);
			$paone8 = $this->input->post("paone8",TRUE);
			$paone9 = $this->input->post("paone9",TRUE);
			$paone10 = $this->input->post("paone10",TRUE);
			$paone11 = $this->input->post("paone11",TRUE);
			$paone12 = $this->input->post("paone12",TRUE);
			$paone13 = $this->input->post("paone13",TRUE);
			$paone14 = $this->input->post("paone14",TRUE);
			$paone15 = $this->input->post("paone15",TRUE);
			$paone16 = $this->input->post("paone16",TRUE);
			$paone17 = $this->input->post("paone17",TRUE);
			$paone18 = $this->input->post("paone18",TRUE);
			$paone19 = $this->input->post("paone19",TRUE);
			$paone20 = $this->input->post("paone20",TRUE);
			$paone21 = $this->input->post("paone21",TRUE); 
			$paone27 = $this->input->post("paone27",TRUE); 

			$ssone23 = $this->input->post("ssone23",TRUE);
			$ssone24 = $this->input->post("ssone24",TRUE);
			$ssone25 = $this->input->post("ssone25",TRUE);
			$ssone26 = $this->input->post("ssone26",TRUE);

			$traning1 = $this->input->post("traning1",TRUE);
			$traning2 = $this->input->post("traning2",TRUE);
			$traning3 = $this->input->post("traning3",TRUE);


			$awbone1 = $this->input->post("awbone1",TRUE);
			$awbone2 = $this->input->post("awbone2",TRUE);
			$awbone3 = $this->input->post("awbone3",TRUE);
			$awbone4 = $this->input->post("awbone4",TRUE);
			$awbone5 = $this->input->post("awbone5",TRUE);
			$awbone6 = $this->input->post("awbone6",TRUE);
			$awbone7 = $this->input->post("awbone7",TRUE);
			$awbone8 = $this->input->post("awbone8",TRUE);
			$awbone9 = $this->input->post("awbone9",TRUE);
			$awbone10 = $this->input->post("awbone10",TRUE);
			$awbone11 = $this->input->post("awbone11",TRUE);
			$awbone12 = $this->input->post("awbone12",TRUE);

			$bmdone1 = $this->input->post("bmdone1",TRUE);
			$bmdone2 = $this->input->post("bmdone2",TRUE);
			$bmdone3 = $this->input->post("bmdone3",TRUE);
			$bmdone4 = $this->input->post("bmdone4",TRUE);
			$bmdone5 = $this->input->post("bmdone5",TRUE);
			$bmdone6 = $this->input->post("bmdone6",TRUE);
			$bmdone7 = $this->input->post("bmdone7",TRUE);
			$bmdone8 = $this->input->post("bmdone8",TRUE);
			$bmdone9 = $this->input->post("bmdone9",TRUE);

			$instone1 = $this->input->post("instone1",TRUE);
			$instone2 = $this->input->post("instone2",TRUE);
			$instone3 = $this->input->post("instone3",TRUE);
			$instone4 = $this->input->post("instone4",TRUE);
			$instone5 = $this->input->post("instone5",TRUE);
			*/
			$gd1 = $this->input->post("gd1",TRUE);
			$bd1 = $this->input->post("bd1",TRUE);
			$clit =   $this->input->post("clit",TRUE);
			$DateofRetirementdori =    $this->input->post("DateofRetirementdori",TRUE);
			$orderby =   $this->input->post("orderby",TRUE);
			$cnody = $this->input->post("cnody",TRUE);
			$dateblockm1 = $this->input->post("dateblockm1",TRUE);
			$dateblockm2 = $this->input->post("dateblockm2",TRUE);
			$dateblockm3 = $this->input->post("dateblockm3",TRUE);
			$dateblockm4 = $this->input->post("dateblockm4",TRUE);
			$enutherdistrict = $this->input->post("enutherdistrict",TRUE);
			$bunitdistrict =   $this->input->post("bunitdistrict",TRUE);

			$data['citylist'] = $this->Btalion_model->fetchinfo('state_list',array('state' => 'PUNJAB' ));

			
			$this->form_validation->set_rules("name", "name", "trim");
						if ($this->form_validation->run()){
							$add_web = $this->Btalion_model->ups_man(
			$name,$fname,$hno,$sno,$vm,$wardno,$ct,$po,$ps,$tl,$state,$dis,$phouseno,$pstreetno,$pwardno,$pvillmoh,$postcity,$pcitypostoff,$ppolicestation,$ptehsil,$postate,$pdistrict,$gender,$mstatus,$dob,$casting,$catii,$conphno,$conphnot,$pemailid,$addarcard,$pancard,$bankdetail,$bankbrach,$bankac,$ifsccode,$bloodgroup,$Identificationmark,$Kg,$Gm,$Feet,$inch,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$docOther,$Modemdr,$Battalion,$tyodu,$mocOther,$dateofesnlistment1,$Rankre,$eor1,$eor2,$eor3,$eor4,$eor5,$Enlistmentec,$EnlistmentUnit,$DateofRetirementdor,$gpfPRAN,$PRAN,$BattalionUnitito,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$Deptdn,$iIdentityCardNocn,
			$InductionRankir,$catofind1,$catofind2,$catofind3,$catofind4,$catofind5,$InductionModeim,$indictiondate,$PreviousBatalionito,$PreviousNoprn,$DateOFPromotionDetails21,$DateOFPromotionDetails23,$DateOFPromotionDetails24,$DateOFPromotionDetails25,$DateOFPromotionDetails26,$DateOFPromotionDetails27,$DateOFPromotionDetails28,$DateOFPromotionDetails29,$DateOFPromotionDetails30,$DateOFPromotionDetails31,$DateOFPromotionDetails32,$DateOFPromotionDetails33,$DateOFPromotionDetails34,$LowerSchoolCourseDate35,$DateOFPromotionDetails35,$TrainingInstituteti,$Batchbn,$batchpassdate,$TrainingInstitutessti,$TrainingInstitutesstiOther,$NamesofsCourses,$DurationsofsCourses,$DurationsofsCoursest,$NameofsRanges,$dateofprcatice,$tow,$gd1,$bd1,$id,$clit,$DateofRetirementdori,$orderby,$cnody,$dateblockm1,$dateblockm2,$dateblockm3,$dateblockm4,$enutherdistrict,$bunitdistrict); 

			// $this->Btalion_model->mark_osi($id);

				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has added succesfully !');
					redirect('bt-updates-manpower/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Info has not added.');
					redirect('bt-updates-manpower/'.$id);
				}	
			}
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));
			$data['body'] = $this->Btalion_model->fetchoneinfo('newosi',array('man_id' => $id ));
			

			$this->load->view(F_BTALION.'manpower/updatemanpower',$data);
		}/*Close*/

			
		public function update_manpower(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$nop = $this->input->post("nop",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$ti = $this->input->post("ti",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$itoOther = $this->input->post("itoOther",TRUE);
			$Dateofrelieving = $this->input->post("Dateofrelieving",TRUE);
			$Dateofnotrelieving = $this->input->post("Dateofnotrelieving",TRUE);
			$iito = $this->input->post("iito",TRUE);
			$iitoOther = $this->input->post("iitoOther",TRUE);
			$Dateofrelievingi = $this->input->post("Dateofrelievingi",TRUE);
			$DeputationUnit = $this->input->post("DeputationUnit",TRUE);
			$pg =  $this->input->post("pg",TRUE);
			$DismissingAuthority =  $this->input->post("DismissingAuthority",TRUE);
			$DismissDate = $this->input->post("DismissDate",TRUE);
			$Reason = $this->input->post("Reason",TRUE);
			$AnyOther = $this->input->post("AnyOther",TRUE);
			$DateofReti =  $this->input->post("DateofReti",TRUE);
			$tis =  $this->input->post("tis",TRUE);
			$extava =  $this->input->post("extava",TRUE);
			$pgstos =  $this->input->post("pgstos",TRUE);
			$pgDateofRetirement =  $this->input->post("pgDateofRetirement",TRUE); 
			$date = $this->input->post("date",TRUE); 
			$pgtser = $this->input->post("pgtser",TRUE); 
			$DateofReti1 = $this->input->post("DateofReti1",TRUE);
			$DateofDeath = $this->input->post("DateofDeath",TRUE);
			$pgrDateofRetirement = $this->input->post("pgrDateofRetirement",TRUE);
			$pgtseryear =  $this->input->post("pgtseryear",TRUE);
			$pgDateoMissing =   $this->input->post("pgDateoMissing",TRUE);
			$tid =   $this->input->post("tid",TRUE);
			$Dateofrelievinger =   $this->input->post("Dateofrelievinger",TRUE);
			if($tid=='No'){
				$Dateofrelieving = $Dateofnotrelieving;
			}
			$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => $this->session->userdata('userid')));
			
			$this->form_validation->set_rules("nop", "nop", "trim");
			$this->form_validation->set_rules("hn", "hn", "trim");
			if ($this->form_validation->run()){
				
				$add_web = $this->Btalion_model->deinduction($nop,$hn,$ti,$ito,$itoOther,$Dateofrelieving,$iito,$iitoOther,$Dateofrelievingi,$DeputationUnit,$pg,$DismissingAuthority,$DismissDate,$Reason,$AnyOther,$DateofReti,$tis,$extava,$pgstos,$pgDateofRetirement,$date,$pgtser,$DateofReti1,$DateofDeath,$pgrDateofRetirement,$pgtseryear,$pgDateoMissing,$tid,$Dateofrelievinger); 	
				if($add_web == 1){
						$add_web = $this->Btalion_model->tempdel('newosip',array('man_id' => $nop));
						$add_web1 = $this->Btalion_model->tempdel('seccover',array('man_id' => $nop));
						$add_web2 = $this->Btalion_model->tempdel('tcover',array('man_id' => $nop));
					$this->session->set_flashdata('success_msg','Info has issued succesfully !');
					redirect('bt-update-manpower');
				}else{
					$this->session->set_flashdata('error_msg','Info has not issued.');
					redirect('bt-update-manpower');
				}	
			}
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$this->load->view(F_BTALION.'manpower/update',$data);
		}

		public function recall($id,$i){
			$name = $this->Btalion_model->recall($id,$i);
			if($name == 1){
					$this->session->set_flashdata('success_msg','Recall succesfully !');
					redirect('bt-updatemanpowerlist');
				}else{
					$this->session->set_flashdata('error_msg','Recall has not succesfully.');
					redirect('bt-updatemanpowerlist');
				}
		}

		public function updatemanpowerlist(){
			$this->load->helper('common_helper');
			$data['uname'] = $this->Btalion_model->joindeinduc();
			$this->load->view(F_BTALION.'old/deinlist',$data);
		}

		public function moverelived($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$Dateofrelieving = $this->input->post("Dateofrelieving",TRUE);
			$this->form_validation->set_rules("Dateofrelieving", "Dateofrelieving", "trim|required");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->edit_relived($id,$Dateofrelieving); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Status changed succesfully !');
					redirect('bt-updatemanpowerlist');
				}else{
					$this->session->set_flashdata('error_msg','Status has not changed.');
					redirect('bt-updatemanpowerlist');
				}	

			}
			$this->load->view(F_BTALION.'manpower/rel');
		}




		public function add_officer(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$noo = $this->input->post("noo",TRUE);
			$rank = $this->input->post("rank",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$cn = $this->input->post("cn",TRUE);
			$state = $this->input->post("state",TRUE);
			$dis = $this->input->post("dis",TRUE);

			$this->form_validation->set_rules("noo", "noo", "trim|required");
			$this->form_validation->set_rules("rank", "rank", "trim|required");
			$this->form_validation->set_rules("cn", "cn", "trim|required");
			$this->form_validation->set_rules("ito", "ito", "trim|required");
			$this->form_validation->set_rules("state", "state", "trim|required");
			$this->form_validation->set_rules("dis", "dis", "trim|required");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_officer($noo,$rank,$cn,$ito,$state,$dis); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has issued succesfully !');
					redirect('bt-add-officer');
				}else{
					$this->session->set_flashdata('error_msg','Info has not issued.');
					redirect('bt-add-officer');
				}	
			}
			$data['users'] = $this->Btalion_model->fetchinfo(T_USERS,array('user_type' => 'b' ));
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));
			$this->load->view(F_BTALION.'manpower/officermaster',$data);
		}

		public function osiinfo($id){
			$this->load->helper('common_helper');
			$this->load->library('Employee');
			$this->load->model('Posting_model');
                        
				$data['user'] = $this->Btalion_model->fetchoneinfo('newosi',array('man_id' => $id ));
                                $employee = new Employee();
                                $employee->initializeFromDatabase($data['user']);
                                $posting = $this->Posting_model->getCurrentPostingOfEmployeeByEmplyeeId($employee->getId());
                                $employee->setCurrentPosting($posting);
                                
				$qualification = '';
				switch($data['user']->eduqalification){
					case 'Under Graduate':
						$qualification = $data['user']->UnderGraduate;
						break;
					case 'Graduate':
						$qualification = $data['user']->Graduate;
						break;
					case 'Post Graduate':
						$qualification = $data['user']->PostGraduate;
						break;
					case 'Doctorate':
						$qualification = $data['user']->Doctorate;
						break;
					default:
						$qualification = $data['user']->eduqalification;
						break;
				}
			$data['qualification'] = $qualification;
			$data['userd'] = $this->Btalion_model->fetchoneinfo('newosip',array('man_id' => $id ));
			
			//$coursedetail_objs = $this->getProfessionalCourseDetailHistory($searchText,$length,$start,$order_by,$order,$where,$selected_user_id, $order_no, $order_date);
			$this->load->model('Course_model');
			$searchText=null;$where=null;$length=null;$start=null;$order_by=null;$order=null;$selected_user_id=$id;$order_no=null;$order_date=null;
			$coursedetail_objs = $this->Course_model->getProfessionalCourseDetailHistory($searchText,$where,$length,$start,$order_by,$order,$selected_user_id,$order_no, $order_date);
			$course_detal_names = [];
			$sno = 1;
			foreach($coursedetail_objs as $k=>$coursedetail_obj){
				
				$temp_course_detail = [];
				$temp_course_detail['sno'] = $sno;
				$temp_course_detail['institute_name']=$coursedetail_obj->institute_name;
				$temp_course_detail['course_name']=$coursedetail_obj->course_name;
				$temp_course_detail['course_order_no'] = $coursedetail_obj->order_no;
				$temp_course_detail['course_order_date'] = $coursedetail_obj->order_date;
				$temp_course_detail['start_date']=$coursedetail_obj->course_start_date;
				$temp_course_detail['end_date']=$coursedetail_obj->course_end_date;
				$temp_course_detail['created']=$coursedetail_obj->created;
				$temp_course_detail['enabled']=$coursedetail_obj->enabled;
				$temp_course_detail['deleted']=$coursedetail_obj->deleted;
				/* if($coursedetail_obj->course_detail_id==null){
					$action = '';
					//$action.='<input type="text" class="form-control" placeholder="Enter Order Number" id="emp_order_no'.$coursedetail_obj->id.'"> &nbsp; ';
					//$action .= '<button href="'.base_url().'course-detail/add-course-to-employee/'.$coursedetail_obj->id.'/'.$selected_user_id.'" onClick="addCourseToEmployee('.$coursedetail_obj->id.','.$selected_user_id.');return false;" class="btn btn-primary">Add</button>';
					$action .='<button onClick="showAddCourseToEmployeeDialog('.$coursedetail_obj->id.');return false;" class="btn btn-primary">Add</button>';
					$action.='<br><span class="text-danger" id="order_no'.$coursedetail_obj->id.'"></span>';
				} else{
					$action = 'Added <Br>(Order No - '.$coursedetail_obj->member_order_no.')<br>Order Date - '.$coursedetail_obj->member_order_date;
				} */
				//$action = '<a href="#" onClick="getCourseHistory('.$coursedetail_obj->id.');return false;">EDIT</a>';
				//$temp_course_detail['action']=$action;
				$course_detal_names[] = $temp_course_detail;
				$sno++;
			}
			$data['professionalCourses'] = $course_detal_names;
                        $data['employee'] = $employee;
			$this->load->view(F_BTALION.'manpower/singleman',$data);	
		}

		public function add_material(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$tpi = $this->input->post("tpi",TRUE);
			$toi = $this->input->post("toi",TRUE);
			$rno = $this->input->post("rno",TRUE);
			$rn = $this->input->post("rn",TRUE);
			$ctir = $this->input->post("ctir",TRUE);
			$cnir = $this->input->post("cnir",TRUE);
			$Receivedmode = $this->input->post("Receivedmode",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$Receivedothers = $this->input->post("Receivedothers",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$rcdate = $this->input->post("rcdate",TRUE);
			$rcdt = $this->input->post("rcdt",TRUE);
			$fname = $this->input->post("fname",TRUE);
			
			$ofname = $this->input->post("ofname",TRUE);
			$gfund = $this->input->post("gfund",TRUE);
			$gfundadcp = $this->input->post("gfundadcp",TRUE);
			$gfundbhf = $this->input->post("gfundbhf",TRUE);
			$toiss = $this->input->post("toiss",TRUE);
			$trno =  $this->input->post("trno",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);

			$fn = $this->input->post("fn",TRUE);
			$addss = $this->input->post("addss",TRUE);
			$cp = $this->input->post("cp",TRUE);
			$cn = $this->input->post("cn",TRUE);
			$pa = $this->input->post("pa",TRUE);
			$bn = $this->input->post("bn",TRUE);
			$bd = $this->input->post("bd",TRUE);
			$rd = $this->input->post("rd",TRUE);
			$rni = $this->input->post("rni",TRUE);
			$rtd = $this->input->post("rtd",TRUE);
			$paysta = $this->input->post("paysta",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$cni = $this->input->post("cni",TRUE);
			$qty =  $this->input->post("quantitys",TRUE);
			$qty1 =  $this->input->post("quantitys1",TRUE);	
			$fname1 = $this->input->post("fname1",TRUE);
			$ofname1 = $this->input->post("ofname1",TRUE);
			$gfund1 = $this->input->post("gfund1",TRUE);
			$gfundadcp1 = $this->input->post("gfundadcp1",TRUE);
			$gfundbhf1 = $this->input->post("gfundbhf1",TRUE);	
			$part1 = $this->input->post("part1",TRUE);	
			$part2 = $this->input->post("part2",TRUE);	
			$part3 = $this->input->post("part3",TRUE);	
			$part4 = $this->input->post("part4",TRUE);	
			$part5 = $this->input->post("part5",TRUE);	
			$part6 = $this->input->post("part6",TRUE);	
			$part7 = $this->input->post("part7",TRUE);
			$addinfo = 	$this->input->post("addinfo",TRUE);
			$addinfop = 	$this->input->post("addinfop",TRUE);
			$rtwo = $this->input->post("rntwo",TRUE);
			
			$data['received_types'] = $this->get_received_types();
			$data['categoryOfItems'] = $this->getCategoryOfItem();
			$data['conditions_of_item'] = $this->getConditionOfItemForAdd();
			$data['received_modes'] = $this->get_received_modes();
			$data['received_froms'] = $this->get_received_from();
			$data['payment_status'] = $this->get_payment_status();
			
			$this->form_validation->set_rules("tpi", "Receive Type", "required|callback_receive_type");		//Recieve type
			if ($this->form_validation->run()){
				if($tpi=='Received'){
					//$this->form_validation->set_rules("tpi", "Receive Type", "required");		//Recieve type
					$this->form_validation->set_rules("toi", "Type Of Item", "required|callback_valid_typeOfItem");		//Type of item
					$this->form_validation->set_rules("rn", "Name of Item", "required|callback_valid_nameOfItem[toi]");		//Name of item
					//$this->form_validation->set_rules("addinfo", "Info", "required");			//Info
					$this->form_validation->set_rules("ctir", "Category Of Item", "required|callback_validCategoryOfItem");		//Category of item
					$this->form_validation->set_rules("cnir", "Condition Of Item", "required|callback_valid_condition_of_item[add]");		//Condition of item
					$this->form_validation->set_rules("quantitys", "Quantity", "required|callback_valid_quantity");		//Quantity of item
					$this->form_validation->set_rules("Receivedmode", "Received Mode", "required|callback_valid_received_modes");		//Recieved Mode of item
					$this->form_validation->set_rules("Receivedfrom", "Received From", "required|callback_valid_receivedFrom");		//Recieved From of item
					if($Receivedfrom=='others'){
						$this->form_validation->set_rules("Receivedothers", "Received Others", "required");		//Recieved Other name
					}
					//$this->form_validation->set_rules("rcno", "RC Number", "required|regex_match[/^[a-zA-Z0-9-\/ ]+$/]");		//RC  Number of item
					$this->form_validation->set_rules("rcdate", "RC Date", "required|callback_valid_date");		//RC Date of item
					$this->form_validation->set_rules("rcdt", "Received Date", "required|callback_valid_date");		//Recieved Date of item
					if($this->form_validation->run()){
						$add_web = $this->Btalion_model->add_material($tpi,$toi,$rno,$rn,$ctir,$cnir,$Receivedmode,$Receivedfrom,$Receivedothers,$rcno,$rcdate,$rcdt,$fname,$ofname,$gfund,$gfundadcp,$gfundbhf,$fn,$addss,$cp,$cn,$pa,$bn,$bd,$rd,$rni,$rtd,$paysta,$cti,$cni,$toiss,$trno,$nameofitem,$qty,$qty1,$fname1,$ofname1,$gfund1,$gfundadcp1,$gfundbhf1,$part1,$part2,$part3,$part4,$part5,$part6,$part7,$addinfo,$addinfop,$rtwo); 	
						if($add_web == 1){
							$this->session->set_flashdata('success_msg','Material has added succesfully!');
							redirect('bt-add-material');
						}else{
							$this->session->set_flashdata('error_msg','Material has not added.');
							redirect('bt-add-material');
						}	
					}else{
					
					}
					//$this->load->view(F_BTALION.'material/addmaterial',$data);
					$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					
					$data['mskitemnames'] = $this->getMskItemNames($toi);
				
					$this->load->view(F_BTALION.'material/addmaterial',$data);
					return;
				}
				elseif($tpi=='Purchased'){
					//$this->form_validation->set_rules("tpi", "ReceIve Type", "required");		//Recieve type
					//$this->form_validation->set_rules("Receivedfrom", "Received From", "required|callback_valid_receivedFrom");		//Recieved From of item
					$this->form_validation->set_rules("toiss", "Type Of Item", "required|callback_valid_typeOfItem");		//Type of item
					$this->form_validation->set_rules("rntwo", "Name of Item", "required|callback_valid_nameOfItem[toiss]");		//Name of item
					//$this->form_validation->set_rules("addinfop", "Info", "required|regex_match[/^[a-zA-Z0-9 .-]+$/]");			//Info
					$this->form_validation->set_rules("cti", "Category Of Item", "required|callback_validCategoryOfItem");		//Category of item
					$this->form_validation->set_rules("cni", "Condition Of Item", "required|callback_valid_condition_of_item[add]");		//Condition of item
					
					$this->form_validation->set_rules("quantitys1", "Quantity", "required|callback_valid_quantity");		//Quantity  of item
					$this->form_validation->set_rules("fn", "Firm Name", "required");//|regex_match[/^[a-zA-Z0-9 .-]+$/]");		//Firm Name of item
					$this->form_validation->set_rules("addss", "Address", "required");//|regex_match[/^[a-zA-Z0-9 .-]+$/]");		//Address of item
					//$this->form_validation->set_rules("cn", "Contact Number", "required|regex_match[/^(([+])?([1-9]{1,2})?(-)?)?([0-9]{10})$/]");		//Contact Number 
					$this->form_validation->set_rules("pa", "Purchased Amount", "required|regex_match[/^[0-9]{1,50}([.]{1}[0-9]{1,2})?$/]");		//Purchased Amount of item
					$this->form_validation->set_rules("bn", "Bill Number", "required");//|regex_match[/^[a-zA-Z0-9 .-]+$/]");		//BIll Number of item
					$this->form_validation->set_rules("bd", "Bill Date", "required|callback_valid_date");		//Bill Date of item
					$this->form_validation->set_rules("rd", "Received Date", "required|callback_valid_date");		//Received Date of item
					//$this->form_validation->set_rules("rni", "Receipt Number", "required|regex_match[/^[a-zA-Z0-9 .-_]+$/]");		//Receipt Number of item
					//$this->form_validation->set_rules("rtd", "Receipt Date", "required|callback_valid_date");		//Receipt Date of item
					//$this->form_validation->set_rules("paysta", "Payment Status", "required|callback_valid_payment_status");		//Payment Status of item
					
					if ($this->form_validation->run()){
						
						$add_web = $this->Btalion_model->add_material($tpi,$toi,$rno,$rn,$ctir,$cnir,$Receivedmode,$Receivedfrom,$Receivedothers,$rcno,$rcdate,$rcdt,$fname,$ofname,$gfund,$gfundadcp,$gfundbhf,$fn,$addss,$cp,$cn,$pa,$bn,$bd,$rd,$rni,$rtd,$paysta,$cti,$cni,$toiss,$trno,$nameofitem,$qty,$qty1,$fname1,$ofname1,$gfund1,$gfundadcp1,$gfundbhf1,$part1,$part2,$part3,$part4,$part5,$part6,$part7,$addinfo,$addinfop,$rtwo); 	
						if($add_web == 1){
							$this->session->set_flashdata('success_msg','Material has added succesfully !');
							redirect('bt-add-material');
						}else{
							$this->session->set_flashdata('error_msg','Material has not added.');
							redirect('bt-add-material');
						}	
					}
					
					$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					$data['mskitemnames'] = $this->getMskItemNames($toiss);
					
				}else{
					
					$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					//$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					$data['mskitemnames'] = $this->getMskItemNames($toi);
				}
			
				
			}else{
				$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
				$data['mskitemnames'] = $this->getMskItemNames($toi);
			}
			$this->load->view(F_BTALION.'material/addmaterial',$data);
		}
		//======================================validation functions start here ==========================
		public function valid_payment_status($status){
			$this->form_validation->set_message('valid_payment_status', 'Invalid Payment Status!!');
			$all_status = $this->get_payment_status();
			if(in_array($status,$all_status)){
				return true;
			}else{
				return false;
			}
		}
		public function receive_type($type){
			$this->form_validation->set_message('receive_type', 'Invalid Receive Type!!');
			$received_types = $this->get_received_types();
			if(in_array($type,array_keys($received_types))){
				return true;
			}else{
				return false;
			}
		}
		
		public function valid_date($date){
			$this->form_validation->set_message('valid_date', 'Invalid Date!!');
			//echo $date;
			if(preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/',$date)){
				return true;
			}else{
				return false;
			}
		}
               	public function valid_date_DMY($date){
			
			//echo $date;
			if(preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/',$date)){
                            return true;
			}else{
                            $this->form_validation->set_message('valid_date_DMY', 'Invalid Date!!');
                            return false;
			}
		}
                public function valid_today($date){
                    //echo $date;
                    $posting_date = DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                    $currentDate = new DateTime();
                    if($posting_date <= $currentDate->format("Y-m-d")){
                            return true;
                    }else{
                        $this->form_validation->set_message('valid_today', 'Date is greator than toaday!!');
                        return false;
                    }
		}
              	public function valid_receivedFrom($received_from){
			$received_from_all = $this->get_received_from();
			if(in_array($received_from,array_keys($received_from_all))){
				return true;
			}
			$this->form_validation->set_message('valid_receivedFrom', 'Invalid Received From!!');
			return false;
		}
		public function valid_received_modes($received_mode){
			$this->form_validation->set_message('valid_received_modes', 'Invalid Received Mode!!');
			$modes = $this->get_received_modes();
			$validCondition = false;
			if(in_array($received_mode,array_keys($modes))){
				$validCondition = true;
			}
			return $validCondition;
		}
		public function valid_issue_modes($issue_mode){
			$this->form_validation->set_message('valid_issue_modes', 'Invalid Issue Mode!!');
			$modes = $this->get_issue_modes();
			$validCondition = false;
			if(in_array($issue_mode,array_keys($modes))){
				$validCondition = true;
			}
			return $validCondition;
		}
		public function valid_condition_of_item($condition,$type){
			$this->form_validation->set_message('valid_condition_of_item', 'Invalid Condition of Item!!');
			if($type=='add'){
				$conditions = $this->getConditionOfItemForAdd();
			}elseif($type=='issue'){
				$conditions = $this->getConditionOfItemForIssue();
			}elseif($type=="edit"){
				$conditions = $this->getConditionOfItemForEdit();
			}else{
				$conditions = $this->getConditionOfItem();
			}
			$validCondition = false;
			if(in_array($condition,array_keys($conditions))){
				$validCondition = true;
			}
			return $validCondition;
		}
		public function validCategoryOfItem($category){
			$this->form_validation->set_message('validCategoryOfItem', 'Invalid Category of Item!!');
			$categoryOfItems = $this->getCategoryOfItem();
			$validCategory = false;
			if(in_array($category,array_keys($categoryOfItems))){
				$validCategory = true;
				
			}
			return $validCategory;
		}
		public function valid_typeOfItem($typeofitem){
			$this->form_validation->set_message('valid_typeOfItem', 'Invalid Type of Item!!');
			$mskitem = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			//var_dump($mskitem);
			$itemFound = false;
			foreach($mskitem as $k=>$item){
				if($item->item == $typeofitem){
					$itemFound = true;
					break;
				}
			}
			//fetch the all type of item
			return $itemFound;
		}
		public function valid_nameOfItem($itemName,$tpi){
			//var_dump($tpi);
			$this->form_validation->set_message('valid_nameOfItem', 'Invalid Name of Item selected!!');
			$toi = $this->input->post($tpi,TRUE);
			$validItem = false;
			if(isset($toi)){
				$mskitemnames = $this->getMskItemNames($toi);
				foreach($mskitemnames as $k=>$v){
					if($v==$itemName){
						$validItem = true;
						break;
					}
				}
			}
			return $validItem;
		}
		public function valid_quantity($a){
			if(is_numeric($a)){
				if($a>0){
					return true;	
				}else{
					$this->form_validation->set_message('valid_quantity', 'The quantity should be greator than 0!!');
					return FALSE;
				}
			}else{
				$this->form_validation->set_message('valid_quantity', 'Invalid Quantity!!');
				return false;
			}
		}
		public function valid_issued_to($issue){
			$this->form_validation->set_message('valid_issued_to', 'Invalid Selection.');
			if(in_array($issue,array_keys($this->get_issue_to()))){
				return true;
			}
			return false;
		}
		/**
		*	This function will let you know about equipments quantity which can be issued
		*/
		public function valid_quantity_database($issuing_items,$params){
			$data = explode('][',$params);
			$toi = $data[0];	//ok
			$noi = $data[1];	//ok
			$battalion = $this->session->userdata('userif');
			$total_in_store = 0;
			$holding = 0;			//DONE
			$issued = 0;			//DONE
			$condemn = 0;
			$newmskconofitemC = 0;	//DONE
			$serviceable1RecievedQuantity = 0;		//DONE
			$serviceable2RecievedQuantityC = 0;		//DONE
			$serviceable3RecievedQuantityD = 0;		//DONE
			$this->load->model('Msk_model');
			
			
			$battalionIds = array($this->session->userdata('userid'));
			$equipments = $this->Msk_model->getEquipments($battalionIds,$toi,array($noi));
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$toi,$noi);
			if(isset($issuedData[0])){
				$issued = $issuedData[0]->issued;
			}else{
				$issued = 0;
			}
			//echo 'Issued :'.$issued.'<BR>';
			$mskData = $this->Msk_model->getNewMskItems($battalionIds,$toi,array($noi));
			foreach($mskData as $k=>$equipment){
				$acondition = 0;
				$bcondition = 0;
				$ccondition = 0;
				if($equipment->conofitem=='A'){
					$acondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='B'){
					$bcondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='C'){
					$ccondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
					$newmskconofitemC +=$ccondition;
				}
				$holding += $acondition+$bcondition+$ccondition;
				$serviceable1RecievedQuantity += $ccondition;
			}
			//echo 'holding:'.$holding;
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$toi,array($noi));
			foreach($materialData as $k=>$material){
				if($material->condition_of_item=='C'){
					$serviceable2RecievedQuantityC +=  $material->quantity;
				}
				if($material->condition_of_item=='D'){
					$serviceable3RecievedQuantityD +=  $material->quantity;
				}
			}
			$total_in_store = $holding - $issued;
			//get condemn
			//echo 'total_in_store '.$total_in_store;
			$condemn = $newmskconofitemC + $serviceable2RecievedQuantityC;
			$serviceable = ($issued+$total_in_store)-($newmskconofitemC+$serviceable2RecievedQuantityC);
			
			$unserviceable = $newmskconofitemC+ $serviceable2RecievedQuantityC;
			
			$serviceInStore = $total_in_store-$unserviceable;
			$item_can_be_issued = $total_in_store-$condemn;
			if($issuing_items > $item_can_be_issued){
				$this->form_validation->set_message('valid_quantity_database', "Unable  to issue (".($issuing_items-$item_can_be_issued).") items.Maximum $item_can_be_issued items can be issued.");
				return false;
			}else{
				return true;
			}
			
		}
		/**
		* this function will let you know the Equipments which can be made condemn
		*/
		public function valid_items_to_be_condemn($condemn_items_quantity,$params){
			
			$data = explode('][',$params);
			$toi = $data[0];	//ok
			$noi = $data[1];	//ok
			
			
			$battalion = $this->session->userdata('userif');
			$total_in_store = 0;
			$holding = 0;			//DONE
			$issued = 0;			//DONE
			$condemn = 0;
			$newmskconofitemC = 0;	//DONE
			$serviceable1RecievedQuantity = 0;		//DONE
			$serviceable2RecievedQuantityC = 0;		//DONE
			$serviceable3RecievedQuantityD = 0;		//DONE
			$this->load->model('Msk_model');
			
			
			$battalionIds = array($this->session->userdata('userid'));
			$equipments = $this->Msk_model->getEquipments($battalionIds,$toi,array($noi));
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$toi,$noi);
			if(isset($issuedData[0])){
				$issued = $issuedData[0]->issued;
			}else{
				$issued = 0;
			}
			$mskData = $this->Msk_model->getNewMskItems($battalionIds,$toi,array($noi));
			//echo $this->db->last_query();
			//var_dump($mskData);
			foreach($mskData as $k=>$equipment){
				$acondition = 0;
				$bcondition = 0;
				$ccondition = 0;
				if($equipment->conofitem=='A'){
					$acondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='B'){
					$bcondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='C'){
					$ccondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
					$newmskconofitemC +=$ccondition;
				}
				$holding += $acondition+$bcondition+$ccondition;
				$serviceable1RecievedQuantity += $ccondition;
			}
			
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$toi,array($noi));
			foreach($materialData as $k=>$material){
				if($material->condition_of_item=='C'){
					$serviceable2RecievedQuantityC +=  $material->quantity;
				}
				if($material->condition_of_item=='D'){
					$serviceable3RecievedQuantityD +=  $material->quantity;
				}
			}
			$total_in_store = $holding - $issued;
			
			$condemn = $newmskconofitemC + $serviceable2RecievedQuantityC;
			$serviceable = ($issued+$total_in_store)-($newmskconofitemC+$serviceable2RecievedQuantityC);
			
			$unserviceable = $newmskconofitemC+ $serviceable2RecievedQuantityC;
			
			$serviceInStore = $total_in_store-$unserviceable;
			$item_can_be_issued = $total_in_store-$condemn;
			
			if($condemn_items_quantity > $serviceInStore){
				if(isset($data[2])&&$data[2]=='check_quantity'){
					$this->form_validation->set_message('valid_items_to_be_condemn', "Unable to withdraw items. Maximum $serviceInStore items can be withdrawn.");
				}else{
					$this->form_validation->set_message('valid_items_to_be_condemn', "Unable to make items condemn. Maximum $serviceInStore items can be made condemn.");
				}
				return false;
			}else{
				return true;
			}
			
		}
		/**
		* this function will let us know the quantity of items which can be made a and b
		*	provided quantity should be greator than the total number of items in store
		*/
		public function valid_items_quantity_A_B($items_quantity_A_B,$params){
			
			$data = explode('][',$params);
			$toi = $data[0];	//ok
			$noi = $data[1];	//ok
			$battalion = $this->session->userdata('userif');
			$total_in_store = 0;
			$holding = 0;			//DONE
			$holding2= 0;
			$issued = 0;			//DONE
			$condemn = 0;
			$newmskconofitemC = 0;	//DONE
			$serviceable1RecievedQuantity = 0;		//DONE
			$serviceable2RecievedQuantityC = 0;		//DONE
			$serviceable3RecievedQuantityD = 0;		//DONE
			$this->load->model('Msk_model');
			
			
			$battalionIds = array($this->session->userdata('userid'));
			$equipments = $this->Msk_model->getEquipments($battalionIds,$toi,array($noi));
			$issuedData = $this->Msk_model->getIssuedValues($battalionIds,$toi,$noi);
			if(isset($issuedData[0])){
				$issued = $issuedData[0]->issued;
			}else{
				$issued = 0;
			}
			$mskData = $this->Msk_model->getNewMskItems($battalionIds,$toi,array($noi));
			//echo $this->db->last_query();
			
			//var_dump($mskData);
			foreach($mskData as $k=>$equipment){
				$acondition = 0;
				$bcondition = 0;
				$ccondition = 0;
				if($equipment->conofitem=='A'){
					$acondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='B'){
					$bcondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
				}
				if($equipment->conofitem=='C'){
					$ccondition = ($equipment->recqut==''||!is_numeric($equipment->recqut))?0:$equipment->recqut;
					$newmskconofitemC +=$ccondition;
				}
				$holding += $acondition+$bcondition+$ccondition;
				if($equipment->msk_id!=49393){
					$holding2 += $acondition+$bcondition+$ccondition;
				}
				$serviceable1RecievedQuantity += $ccondition;
			}
			$holding = $holding+$issued;
			//echo 'Holding : '.$holding;
			$materialData = $this->Msk_model->getDepositMaterialData($battalionIds,$toi,array($noi));
			foreach($materialData as $k=>$material){
				if($material->condition_of_item=='C'){
					$serviceable2RecievedQuantityC +=  $material->quantity;
				}
				if($material->condition_of_item=='D'){
					$serviceable3RecievedQuantityD +=  $material->quantity;
				}
			}
			$total_in_store = $holding - $issued;
			$total_in_store2 = $holding2-$issued-$items_quantity_A_B;
			//$min_item_can_be_decreased
			
			$condemn = $newmskconofitemC + $serviceable2RecievedQuantityC;
			$serviceable = ($issued+$total_in_store)-($newmskconofitemC+$serviceable2RecievedQuantityC);
			
			$unserviceable = $newmskconofitemC+ $serviceable2RecievedQuantityC;
			
			$serviceInStore = $total_in_store-$unserviceable;
			$item_can_be_issued = $total_in_store-$condemn;
			
			/*echo 'issued :'.$issued.'<br>';
			echo 'holding :'.$holding.'<br>';
			echo 'holding2:'.$holding2.'<br>';
			
			echo 'total in -store :'.$total_in_store.'<br>';
			echo 'total in -store2:'.$total_in_store2.'<br>';
			echo 'ab :'.$items_quantity_A_B.'<br>';
			*/
			if($items_quantity_A_B>$total_in_store){
			$this->form_validation->set_message('valid_items_quantity_A_B', "Unable to decrease. Minimum item quantity can be decreased/updated to ".($total_in_store2+$items_quantity_A_B));
				return false;
			}else{
				return true;
			}
			
		}
		public function valid_calculations($calculation){
			if(in_array($calculation,array_keys($this->get_calculations()))){
				return true;
			}else{
				$this->form_validation->set_message('valid_calculations', "Invalid calculation operation.");
				return false;
			}
		}
		public function valid_plus_minus_quantity($quantity){
			if(!is_numeric($quantity)){
				$this->form_validation->set_message('valid_plus_minus_quantity', "Invalid value.");
				return false;
			}elseif(!$quantity>0){
				$this->form_validation->set_message('valid_plus_minus_quantity', "It should be greator than zero(0).");
				return false;
			}else{
				return true;
			}
			
		}
		public function quantity_upper_limit($quantity,$rec_quantity){
			if($quantity>$rec_quantity){
				$this->form_validation->set_message('quantity_upper_limit', "Quantity is crossing the limit.It should be less than equal to ".$rec_quantity);
				return false;
			}else{
				return true;	
			}
		}
		//==========================================validation function ends here=================
		//-------------------------------------------Data for form---------------------------------------
		public function get_payment_status(){
			return array('Paid through Private Fund' => 'Paid through Private Fund', 'Paid Through treasury' => 'Paid Through treasury', 'Pending Credit' => 'Pending Credit');
		}
		public function get_received_types(){
			return array('Received' => 'Received','Purchased' => 'Purchased');
		}
		public function get_received_from(){
			return array('SPECIAL DGP' => 'SPECIAL DGP','ADGP' => 'ADGP','CPO' => 'CPO','PPHC' => 'PPHC', 'others' => 'OTHERS');
		}
		public function get_received_modes(){
			return array('Temporary' => 'Temporary','Permanent' => 'Permanent');
		}
		public function get_issue_modes(){
			return $this->get_received_modes();
		}
		public function getConditionOfItem(){
			//return array('A' => 'A New Item','B' => 'B 2nd Hand', 'C' => 'C Condemn');
			return array('A' => 'A (New Item)','B' => 'B (Used Item)', 'C' => 'C (Condemn)');
		}
		public function getConditionOfItemForEdit(){
			//return array('A' => 'A New Item','B' => 'B 2nd Hand', 'C' => 'C Condemn');
			return array('A' => 'A (New Item)','B' => 'B (Used Item)', 'C' => 'C (Condemn)');
		}
		public function getConditionOfItemForAdd(){
			return array('A' => 'A (New Item)','B' => 'B (Used Item)');
		}
		public function getConditionOfItemForIssue(){
			return array('A' => 'A (New Item)','B' => 'B (Used Item)');
		}
		public function getCategoryOfItem(){
			return array('' => '--Select--', 'Expendable' => 'Expendable','Non-Expendable' => 'Non-Expendable');
		}
		public function material_exists($id){
			return $this->Btalion_model->material_exists($id);
		}
		public function get_issue_to(){
			return array('Official' => 'Official',
			'Other Battalion/unit' => 'Other Battalion/unit',
			'Self Battalion' => 'Self Battalion', 
			'Institutions Duty' => 'Institutions Duty',
			/*'Repairing unit' => 'Repairing unit', */
			'Special Team Duty' => 'Special Team Duty',
			'Other Attachment Duties' => 'Other Attachment Duties', 
			'Sports Attachments' => 'Sports Attachments',
			'Other' => 'Other',
			'Admin Block' => 'Admin Block');
		}
		public function get_calculations(){
			return array('1' => 'Plus','2' => 'Minus');
		}
		public function edit_material($id){
			if(!($this->material_exists($id)==true)){
				$this->session->set_flashdata('error_msg','Material do not exists.');
				redirect('bt-msk-old');
			}
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$tpi = $this->input->post("tpi",TRUE);
			$toi = $this->input->post("toi",TRUE);
			$rno = $this->input->post("rno",TRUE);
			$rn = $this->input->post("rn",TRUE);
			$ctir = $this->input->post("ctir",TRUE);
			$cnir = $this->input->post("cnir",TRUE);
			$Receivedmode = $this->input->post("Receivedmode",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$Receivedothers = $this->input->post("Receivedothers",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$rcdate = $this->input->post("rcdate",TRUE);
			$rcdt = $this->input->post("rcdt",TRUE);
			$fname = $this->input->post("fname",TRUE);
			
			$ofname = $this->input->post("ofname",TRUE);
			$gfund = $this->input->post("gfund",TRUE);
			$gfundadcp = $this->input->post("gfundadcp",TRUE);
			$gfundbhf = $this->input->post("gfundbhf",TRUE);
			$toiss = $this->input->post("toiss",TRUE);
			$trno =  $this->input->post("trno",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);

			$fn = $this->input->post("fn",TRUE);
			$addss = $this->input->post("addss",TRUE);
			$cp = $this->input->post("cp",TRUE);
			$cn = $this->input->post("cn",TRUE);
			$pa = $this->input->post("pa",TRUE);
			$bn = $this->input->post("bn",TRUE);
			$bd = $this->input->post("bd",TRUE);
			$rd = $this->input->post("rd",TRUE);
			$rni = $this->input->post("rni",TRUE);
			$rtd = $this->input->post("rtd",TRUE);
			$paysta = $this->input->post("paysta",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$cni = $this->input->post("cni",TRUE);
			$qty =  $this->input->post("quantitys",TRUE);
			$qty1 =  $this->input->post("quantitys1",TRUE);	
			$fname1 = $this->input->post("fname1",TRUE);
			$ofname1 = $this->input->post("ofname1",TRUE);
			$gfund1 = $this->input->post("gfund1",TRUE);
			$gfundadcp1 = $this->input->post("gfundadcp1",TRUE);
			$gfundbhf1 = $this->input->post("gfundbhf1",TRUE);	
			$part1 = $this->input->post("part1",TRUE);	
			$part2 = $this->input->post("part2",TRUE);	
			$part3 = $this->input->post("part3",TRUE);	
			$part4 = $this->input->post("part4",TRUE);	
			$part5 = $this->input->post("part5",TRUE);	
			$part6 = $this->input->post("part6",TRUE);	
			$part7 = $this->input->post("part7",TRUE);
			$addinfo = 	$this->input->post("addinfo",TRUE);
			$addinfop = 	$this->input->post("addinfop",TRUE);
			$rntwo = $rtwo = $this->input->post("rntwo",TRUE);
			$check = $this->input->post("checki",TRUE);
			$condomqty = $this->input->post("condomqty",TRUE);
			$condomqtyi = $this->input->post("condomqtyi",TRUE);
			$checks = $this->input->post("check",TRUE);
			$qlog = $this->input->post("qlog",TRUE);
			$tqut =  $this->input->post("tqut",TRUE);
			$qplog =  $this->input->post("qplog",TRUE);
			$tpqut =  $this->input->post("tpqut",TRUE);

			$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			$data['mskitemlist'] = $this->Btalion_model->fetchoneinfo('newmsk',array('msk_id' => $id ));
			$data['category_of_item'] = $this->getCategoryOfItem();
			$data['conditions_of_item'] = $this->getConditionOfItemForEdit();
			$data['received_mode'] =  $this->get_received_modes();
			$data['received_from'] = $this->get_received_from();
			$data['calculations'] = $this->get_calculations();
			
			//validate the tpi=============================================================================================
			$this->form_validation->set_rules("tpi", "Receive Type", "required|callback_receive_type");		//Recieve type
			if ($this->form_validation->run()){
				if($tpi=='Received'){
					//$this->form_validation->set_rules("tpi", "Receive Type", "required");		//Recieve type
					$this->form_validation->set_rules("toi", "Type Of Item", "required|callback_valid_typeOfItem");		//Type of item
					$this->form_validation->set_rules("rn", "Name of Item", "required|callback_valid_nameOfItem[toi]");		//Name of item
					//$this->form_validation->set_rules("addinfo", "Info", "regex_match[/^[a-zA-Z0-9 .-]+$/]");			//Info
					$this->form_validation->set_rules("ctir", "Category Of Item", "required|callback_validCategoryOfItem");		//Category of item
					
					$this->form_validation->set_rules("cnir", "Condition Of Item", "required|callback_valid_condition_of_item[edit]");		//Condition of item
					
					if(isset($cnir)){	
						if(in_array($cnir,array('A','B'))){	//a and b condition
							if(null!=$checks){	
								$this->form_validation->set_rules("qlog", "Calculations", "required|callback_valid_calculations");		//calculation should be plus or minus
								if($qlog==2)
								{
									$this->form_validation->set_rules("tqut", "Quantity", "required|callback_valid_plus_minus_quantity|callback_quantity_upper_limit[".$data['mskitemlist']->recqut."]|callback_valid_items_to_be_condemn[".$toi."][".$rn."][check_quantity]");		//calculation should be plus or minus
								}else{
									$this->form_validation->set_rules("tqut", "Quantity", "required|callback_valid_plus_minus_quantity");		//calculation should be plus or minus
								}
							}
							//$this->form_validation->set_rules("quantitys", "Quantity", "required|callback_valid_quantity");		//Quantity of item
							//|callback_valid_items_quantity_A_B[".$toi."][".$rn."]
						}elseif($cnir=='C'){
							
							$this->form_validation->set_rules("condomqty", "Condemn Quantity", "required|callback_valid_quantity|callback_quantity_upper_limit[".$data['mskitemlist']->recqut."]|callback_valid_items_to_be_condemn[".$toi."][".$rn."]");		//Quantity of item
							//callback_valid_items_to_be_condemn[".$toi."][".$rn."]
							
						}
						//}
					}
					
					
					//$this->form_validation->set_rules("check", "Category Of Item", "required|callback_validCategoryOfItem");		//Category of item
					
					$this->form_validation->set_rules("Receivedmode", "Received Mode", "required|callback_valid_received_modes");		//Recieved Mode of item
					$this->form_validation->set_rules("Receivedfrom", "Received From", "required|callback_valid_receivedFrom");		//Recieved From of item
					if($Receivedfrom=='others'){
						$this->form_validation->set_rules("Receivedothers", "Received Others", "required");		//Recieved Other name
					}
					$this->form_validation->set_rules("rcno", "RC Number", "required|regex_match[/^[\/\-a-zA-Z0-9 .]+$/]");		//RC  Number of item
					$this->form_validation->set_rules("rcdate", "RC Date", "required|callback_valid_date");		//RC Date of item
					$this->form_validation->set_rules("rcdt", "Received Date", "required|callback_valid_date");		//Recieved Date of item
					if($this->form_validation->run()){
						
						$add_web = $this->Btalion_model->edit_material($id,$tpi,$toi,$rno,$rn,$ctir,$cnir,$Receivedmode,$Receivedfrom,$Receivedothers,$rcno,$rcdate,$rcdt,$fname,$ofname,$gfund,$gfundadcp,$gfundbhf,$fn,$addss,$cp,$cn,$pa,$bn,$bd,$rd,$rni,$rtd,$paysta,$cti,$cni,$toiss,$trno,$nameofitem,$qty,$qty1,$fname1,$ofname1,$gfund1,$gfundadcp1,$gfundbhf1,$part1,$part2,$part3,$part4,$part5,$part6,$part7,$addinfo,$addinfop,$rtwo,$check,$condomqty,$condomqtyi,$checks,$qlog,$tqut,$qplog,$tpqut); 						
						if($add_web == 1){
							
							$this->session->set_flashdata('success_msg','Material has Updated succesfully !');
							redirect('bt-msk-old');
						}else{
							$this->session->set_flashdata('error_msg','Material has not Updated!!');
							redirect('bt-msk-old');
						}	
					}else{
					
					}
					//$this->load->view(F_BTALION.'material/addmaterial',$data);
					/*$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					
					$data['mskitemnames'] = $this->getMskItemNames($toi);*/
				
					$this->load->view(F_BTALION.'material/editmaterial',$data);
					return;
				}elseif($tpi=='Purchased'){
					//$this->form_validation->set_rules("tpi", "ReceIve Type", "required");		//Recieve type
					//$this->form_validation->set_rules("Receivedfrom", "Received From", "required|callback_valid_receivedFrom");		//Recieved From of item
					$this->form_validation->set_rules("toiss", "Type Of Item", "required|callback_valid_typeOfItem");		//Type of item
					$this->form_validation->set_rules("rntwo", "Name of Item", "required|callback_valid_nameOfItem[toiss]");		//Name of item
					//$this->form_validation->set_rules("addinfop", "Info", "regex_match[/^[a-zA-Z0-9 .-]+$/]");			//Info
					$this->form_validation->set_rules("cti", "Category Of Item", "required|callback_validCategoryOfItem");		//Category of item
					$this->form_validation->set_rules("cni", "Condition Of Item", "required|callback_valid_condition_of_item[edit]");		//Condition of item
					
					if(isset($cni)){	
					
						if(in_array($cni,array('A','B'))){	//a and b condition
						
							if(null!=$check){	
							
								$this->form_validation->set_rules("qplog", "Calculations", "required|callback_valid_calculations");		//calculation should be plus or minus
								//var_dump($qplog);	
								if($qplog==2)
								{	
							
									$this->form_validation->set_rules("tpqut", "Quantity", "required|callback_valid_plus_minus_quantity|callback_quantity_upper_limit[".$data['mskitemlist']->recqut."]|callback_valid_items_to_be_condemn[".$toiss."][".$rntwo."][check_quantity]");		//calculation should be plus or minus
								}else{
									$this->form_validation->set_rules("tpqut", "Quantity", "required|callback_valid_plus_minus_quantity");		//calculation should be plus or minus
								}
							}
							//$this->form_validation->set_rules("quantitys", "Quantity", "required|callback_valid_quantity");		//Quantity of item
							//|callback_valid_items_quantity_A_B[".$toi."][".$rn."]
						}elseif($cni=='C'){
							
							$this->form_validation->set_rules("condomqtyi", "Condemn Quantity", "required|callback_valid_quantity|callback_quantity_upper_limit[".$data['mskitemlist']->recqut."]|callback_valid_items_to_be_condemn[".$toiss."][".$rntwo."]");		//Quantity of item
							//callback_valid_items_to_be_condemn[".$toi."][".$rn."]
							
							
						}
						//}
					}
					
					//$this->form_validation->set_rules("quantitys1", "Quantity", "required|callback_valid_quantity");		//Quantity  of item
					$this->form_validation->set_rules("fn", "Firm Name", "required");//|regex_match[/^[a-zA-Z0-9 .-]+$/]");		//Firm Name of item
					$this->form_validation->set_rules("addss", "Address", "required");//|regex_match[/^[a-zA-Z0-9 .-]+$/]");		//Address of item
					//$this->form_validation->set_rules("cn", "Contact Number", "regex_match[/^(([+])?([1-9]{1,2})?(-)?)?([0-9]{10})$/]");		//Contact Number 
					$this->form_validation->set_rules("pa", "Purchased Amount", "required");//|regex_match[/^[0-9]{1,50}([.]{1}[0-9]{1,2})?$/]");		//Purchased Amount of item
					$this->form_validation->set_rules("bn", "Bill Number", "required");//|regex_match[/^[a-zA-Z0-9 .-]+$/]");		//BIll Number of item
					$this->form_validation->set_rules("bd", "Bill Date", "required|callback_valid_date");		//Bill Date of item
					$this->form_validation->set_rules("rd", "Received Date", "required|callback_valid_date");		//Received Date of item
					//$this->form_validation->set_rules("rni", "Receipt Number", "required|regex_match[/^[a-zA-Z0-9 .-_]+$/]");		//Receipt Number of item
					//$this->form_validation->set_rules("rtd", "Receipt Date", "required|callback_valid_date");		//Receipt Date of item
					//$this->form_validation->set_rules("paysta", "Payment Status", "required|callback_valid_payment_status");		//Payment Status of item
					
					if ($this->form_validation->run()){

						$add_web = $this->Btalion_model->edit_material($id, $tpi,$toi,$rno,$rn,$ctir,$cnir,$Receivedmode,$Receivedfrom,$Receivedothers,$rcno,$rcdate,$rcdt,$fname,$ofname,$gfund,$gfundadcp,$gfundbhf,$fn,$addss,$cp,$cn,$pa,$bn,$bd,$rd,$rni,$rtd,$paysta,$cti,$cni,$toiss,$trno,$nameofitem,$qty,$qty1,$fname1,$ofname1,$gfund1,$gfundadcp1,$gfundbhf1,$part1,$part2,$part3,$part4,$part5,$part6,$part7,$addinfo,$addinfop,$rtwo,$check,$condomqty,$condomqtyi,$checks,$qlog,$tqut,$qplog,$tpqut); 
						if($add_web == 1){
							$this->session->set_flashdata('success_msg','Material has updated succesfully !');
							redirect('bt-msk-old');
						}else{
							$this->session->set_flashdata('error_msg','Material has not updated.');
							redirect('bt-msk-old');
						}	
					}
					
					$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					$data['mskitemnames'] = $this->getMskItemNames($toiss);
					
					/* $this->load->view(F_BTALION.'material/editmaterial',$data);
					return; */
					
				}else{
					
					$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					//$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
					$data['mskitemnames'] = $this->getMskItemNames($toi);
				}
			
				
			}
//==========================================================================================================================
			$this->form_validation->set_rules("tpi", "tpi", "trim");
			
			//echo $this->db->last_query();
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->edit_material($id,$tpi,$toi,$rno,$rn,$ctir,$cnir,$Receivedmode,$Receivedfrom,$Receivedothers,$rcno,$rcdate,$rcdt,$fname,$ofname,$gfund,$gfundadcp,$gfundbhf,$fn,$addss,$cp,$cn,$pa,$bn,$bd,$rd,$rni,$rtd,$paysta,$cti,$cni,$toiss,$trno,$nameofitem,$qty,$qty1,$fname1,$ofname1,$gfund1,$gfundadcp1,$gfundbhf1,$part1,$part2,$part3,$part4,$part5,$part6,$part7,$addinfo,$addinfop,$rtwo,$check,$condomqty,$condomqtyi,$checks,$qlog,$tqut,$qplog,$tpqut); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Material has updated succesfully !');
					redirect('bt-msk-old');
				}else{
					$this->session->set_flashdata('error_msg'  ,'Material has not updated.');
					redirect('bt-msk-old');
				}	
			}
			$this->load->view(F_BTALION.'material/editmaterial',$data);
		}

		public function alot_pmaterial(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			
			$toi = $this->input->post("toi",TRUE);
			$tpi = $this->input->post("rn",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$cni = $this->input->post("cni",TRUE);
			$imode = $this->input->post("imode",TRUE);
			$quantitys = $this->input->post("quantitys",TRUE);
			
			$Issuedto = $this->input->post("Issuedto",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$obito = $this->input->post("obito",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$run = $this->input->post("run",TRUE);
			$ircn = $this->input->post("ircn",TRUE);
			$ircd = $this->input->post("ircd",TRUE);
			$id = $this->input->post("id",TRUE);

			$MudDuties = $this->input->post("MudDuties",TRUE);
			$GeneralStaff = $this->input->post("GeneralStaff",TRUE);
			$MTSectionf = $this->input->post("MTSectionf",TRUE);
			$Institutionsti = $this->input->post("Institutionsti",TRUE);
			$GuardDutiesti = $this->input->post("GuardDutiesti",TRUE);
			$Companydutiesti = $this->input->post("Companydutiesti",TRUE);
			$LawOrderDuty = $this->input->post("LawOrderDuty",TRUE);
			$SpecialTeamDuty = $this->input->post("SpecialTeamDuty",TRUE);
			
			$arpOthersDuty = $this->input->post('arpOthers',TRUE);
			
			$SportsAttachments = $this->input->post("SportsAttachments",TRUE);
			$OtherAttachmentDuties1 = $this->input->post("OtherAttachmentDuties1",TRUE);
			$admblock = $this->input->post("admblock",TRUE);
			$Other = $this->input->post("Other",TRUE);
			$Detail =   $this->input->post("Detail",TRUE);
			$District =   $this->input->post("District",TRUE);
			$addinfop =   $this->input->post("addinfop",TRUE);
			
			
			
			$ovalue = '';
			if($MudDuties!=''){
				$ovalue.= $MudDuties;
			}
			if($GeneralStaff!=''){
				$ovalue.= $GeneralStaff;
			}if($MTSectionf!=''){
				$ovalue.= $MTSectionf;
			}if($Institutionsti!=''){
				$ovalue.= $Institutionsti;
			}if($GuardDutiesti!=''){
				$ovalue.= $GuardDutiesti;
			}if($Companydutiesti!=''){
				$ovalue.= $Companydutiesti;
			}if($LawOrderDuty!=''){
				$ovalue.= $LawOrderDuty;
			}if($SpecialTeamDuty!=''){
				$ovalue.= $SpecialTeamDuty;
			}if($SportsAttachments!=''){
				$ovalue.= $SportsAttachments;
			}if($OtherAttachmentDuties1!=''){
				$ovalue.= $OtherAttachmentDuties1;
			}if($admblock!=''){
				$ovalue.= $admblock;
			}if($Other!=''){
				$ovalue.= $Other;
			}

			//$this->form_validation->set_rules("tpi", "tpi", "trim");
			$this->form_validation->set_rules("toi", "Type of Item", "required|callback_valid_typeOfItem");
			$this->form_validation->set_rules("rn", "Name of Item", "required|callback_valid_nameOfItem[toi]");		//issued date of item
			
			//$this->form_validation->set_rules("addinfop", "Info", "required|regex_match[/^[a-zA-Z0-9 .-]+$/]");			//Info
			$this->form_validation->set_rules("cti", "Category Of Item", "required|callback_validCategoryOfItem");		//Category of item
			$this->form_validation->set_rules("cni", "Condition Of Item", "required|callback_valid_condition_of_item[issue]");		//Condition of item
			$this->form_validation->set_rules("imode", "Issue Mode", "required|callback_valid_issue_modes");		//issued mode of item
			$this->form_validation->set_rules("quantitys", "Quantity", "required|callback_valid_quantity|callback_valid_quantity_database[".$toi."][".$tpi."]");		//issued date of item
			$this->form_validation->set_rules("Issuedto", "Issued To", "required|callback_valid_issued_to");		//issued date of item
			
			//$this->form_validation->set_rules("ircn", "Issued RC Number", "required|regex_match[/^[a-zA-Z0-9 .-\/]+$/]");		//issued date of item
			$this->form_validation->set_rules("ircn", "Issued RC Number", "required");		//issued date of item
			$this->form_validation->set_rules("ircd", "Issued RC Date", "required|callback_valid_date");		//issued date of item
			$this->form_validation->set_rules("id", "Issued Date", "required|callback_valid_date[]");		//issued date of item
			
			
			$data['category_of_item'] = $this->getCategoryOfItem();
			$data['conditions_of_item'] = $this->getConditionOfItemForIssue();
			$data['issue_modes'] = $this->get_issue_modes();
			$data['issue_to'] = $this->get_issue_to();
			
			if ($this->form_validation->run()){
				//echo 'dalwinder';
				//$info = $this->Btalion_model->fetchoneinfo('mskitemsqty',array('item' => $toi, 'name' => $tpi, 'bat_id' => $this->session->userdata('userid')));
				//var_dump($info);
				//echo 'Quank : '.$quantitys;
				//die;
				//if($quantitys > $info->qty){
					//$this->session->set_flashdata('error_msg','QUAnTITY MISS MATCH!');
					//redirect('bt-alot-pmaterial');
				//}else{
						$add_web = $this->Btalion_model->add_pmaterial($toi,$tpi,$cti,$cni,$imode,$quantitys,$Issuedto,$nop,$obito,$ito,$run,$ircn,$ircd,$id,$ovalue,$Detail,$District,$addinfop,$arpOthersDuty); 	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Material has issued succesfully !');
						redirect('bt-msk-oldissued');
					}else{
						$this->session->set_flashdata('error_msg','Material has not issued.');
						redirect('bt-alot-pmaterial');
					}
				//}		
			}

			$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			if(isset($toi)){
				$data['mskitemnames'] = $this->getMskItemNames($toi);
			}
			
			$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
			$data['unamei'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5 ));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5 ));
			
			$this->load->view(F_BTALION.'material/alotpmaterial',$data);
		}

		public function dep_pmaterial($id){
			$this->load->helper('common_helper');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$cni = $this->input->post("cni",TRUE);
			$mod = $this->input->post("mod",TRUE);
			$in = $this->input->post("in",TRUE);
			$Issuedto = $this->input->post("Issuedto",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$obito = $this->input->post("obito",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$run = $this->input->post("run",TRUE);
			$MudDuties = $this->input->post("MudDuties",TRUE);
			$GeneralStaff = $this->input->post("GeneralStaff",TRUE);
			$MTSectionf = $this->input->post("MTSectionf",TRUE);
			$Institutionsti = $this->input->post("Institutionsti",TRUE);
			$GuardDutiesti = $this->input->post("GuardDutiesti",TRUE);
			$Companydutiesti = $this->input->post("Companydutiesti",TRUE);
			$LawOrderDuty = $this->input->post("LawOrderDuty",TRUE);
			$SpecialTeamDuty = $this->input->post("SpecialTeamDuty",TRUE);
			$SportsAttachments = $this->input->post("SportsAttachments",TRUE);
			$OtherAttachmentDuties = $this->input->post("OtherAttachmentDuties",TRUE);
			$Other = $this->input->post("Other",TRUE);
			$admblock = $this->input->post("admblock",TRUE);

			$ovalue = '';
			if($MudDuties!=''){
				$ovalue.= $MudDuties;
			}
			if($GeneralStaff!=''){
				$ovalue.= $GeneralStaff;
			}if($MTSectionf!=''){
				$ovalue.= $MTSectionf;
			}if($Institutionsti!=''){
				$ovalue.= $Institutionsti;
			}if($GuardDutiesti!=''){
				$ovalue.= $GuardDutiesti;
			}if($Companydutiesti!=''){
				$ovalue.= $Companydutiesti;
			}if($LawOrderDuty!=''){
				$ovalue.= $LawOrderDuty;
			}if($SpecialTeamDuty!=''){
				$ovalue.= $SpecialTeamDuty;
			}if($SportsAttachments!=''){
				$ovalue.= $SportsAttachments;
			}if($admblock!=''){
				$ovalue.= $admblock;
			}if($Other!=''){
				$ovalue.= $Other;
			}

			$drbircn = $this->input->post("drbircn",TRUE);
			$ircd = $this->input->post("ircd",TRUE);
			$DepositDate = $this->input->post("DepositDate",TRUE);
			$paircn = $this->input->post("paircn",TRUE);
			$Condemnationamount = $this->input->post("Condemnationamount",TRUE);
			$conircn = $this->input->post("conircn",TRUE);
			$Commandantorderdate = $this->input->post("Commandantorderdate",TRUE);
			$ircncamo = $this->input->post("ircncamo",TRUE);
			$ircncpo = $this->input->post("ircncpo",TRUE);
			$CPOforwardletterdate = $this->input->post("CPOforwardletterdate",TRUE);
			$ftrcon3condate = $this->input->post("ftrcon3condate",TRUE);
			
			/*	$this->form_validation->set_rules("ic", "ic", "trim|required");*/
			$this->form_validation->set_rules("in", "Quantity", "trim|required|numeric|callback_valid_deposit_quantity[$id]");
			//$this->form_validation->set_rules("drbircn", "Deposit RC/Bill No.", "required");
			/*$this->form_validation->set_rules("db", "db", "trim|required");
			$this->form_validation->set_rules("nop", "nop", "trim");
			$this->form_validation->set_rules("ito", "ito", "trim");*/

			if ($this->form_validation->run()){
                            //$this->session->set_flashdata('success_msg','Material has deposit succesfully !');
			    //redirect('bt-msk-oldissued');
				$add_web = $this->Btalion_model->alot_pmaterial($id,$cni,$mod,$in,$Issuedto,$nop,$obito,$ito,$run,$ovalue,$drbircn,$ircd,$DepositDate,$paircn,$Condemnationamount,$conircn,$Commandantorderdate,$ircncamo,$ircncpo,$CPOforwardletterdate,$ftrcon3condate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Material has deposit succesfully !');
					redirect('bt-msk-oldissued');
				}else{
					$this->session->set_flashdata('error_msg','Material has not deposit or quantity mismatch.');
					redirect('bt-msk-oldissued');
				}	
			}
			$data['mskitem'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			$data['issued_material'] = $issued_material = $this->Btalion_model->fetchinfo('issue_material',array('issue_material_id' => $id ))[0];
			//var_dump($issued_material);
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
			$data['uname'] = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => 5 ));
			$data['unamei'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5 ));
			$this->load->view(F_BTALION.'material/deposit',$data);
		}
		public function valid_deposit_quantity($quantity,$id){
			$this->form_validation->set_message('valid_deposit_quantity', 'Invalid Deposit quantity!!'.$quantity.','.$id.'"');
			$quantity_db = $this->Btalion_model->getIssuedQuantityOfMaterial($id);
			if($quantity<=0){
				$this->form_validation->set_message('valid_deposit_quantity', 'Quantity should be greator than zero!!');
				return false;
			}
			if($quantity_db==-1){
				$this->form_validation->set_message('valid_deposit_quantity', 'Material Do not exist!!');
				$this->session->set_flashdata('error_msg','Material has not deposit or quantity mismatch.');
				redirect('bt-msk-oldissued');
				return false;
			}elseif($quantity_db==0){
				$this->form_validation->set_message('valid_deposit_quantity', 'Nothing to Deposit Back!!');
				return false;
			}elseif($quantity_db<$quantity){
				$this->form_validation->set_message('valid_deposit_quantity', 'Quantity crossing upper limit!!');
				return false;
			}else{
				return true;
			}
		}
		public function msk_olddata(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$data['items'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1 ),'item');
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			
			
			
			$weapon = $this->Btalion_model->fetchinfo('newmsk',array('conofitem!=' => 'C','bat_id' => $this->session->userdata('userid'), 'msk_status' => 1));
			$config = array();
			$config["base_url"] = base_url() . "bt-msk-old";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 1000;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


			$toi = $this->input->post("toi",TRUE);
			//var_dump($toi);
			$nameofitem = $this->input->post("nameofitem",TRUE);
			//var_dump($nameofitem);
			$cti = $this->input->post("cti",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$fname = $this->input->post("fname",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			
			
			if($toi!=null){
				$data['items2'] = $wep = $this->Btalion_model->fetchinfomsk('mskitems',array('item' => $toi ));
			}else{
				$data['items2'] = array();
			}
			//var_dump($data['items2']);
			//echo $this->db->last_query();
			$data["weapon"] = $this->Btalion_model->get_users($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$config["per_page"],$page,$this->session->userdata('userid'));
			$data['qname'] = $this->Btalion_model->mskqunty($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi);

			$this->form_validation->set_rules("report", "report", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_users($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$config["per_page"],$page,$this->session->userdata('userid')); 				
				$data['qname'] = $this->Btalion_model->mskqunty($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi);	
			}

			$this->load->view(F_BTALION.'old/viewmaterial',$data);
		}

		public function condemlistmsk(){
			$data['weapon'] = $this->Btalion_model->fetchinfo('newmsk',array('conofitem=' => 'C','bat_id' => $this->session->userdata('userid')));
			$data['mskd'] = $this->Btalion_model->fetchinfo('deposit_material',array('condition_of_item=' => 'C','bat_id' => $this->session->userdata('userid')));
			$data['cl'] = $this->Btalion_model->cmskquntys();
			$this->load->view(F_BTALION.'material/condem',$data);
		}

		public function condemlistmskcounter(){
			$data['weapon'] = $this->Btalion_model->fetchinfo('newmsk',array('conofitem=' => 'C','bat_id' => $this->session->userdata('userid')));
			$data['mskd'] = $this->Btalion_model->fetchinfo('deposit_material',array('condition_of_item=' => 'C','bat_id' => $this->session->userdata('userid')));
			$data['cl'] = $this->Btalion_model->cmskquntys();
			$this->load->view(F_BTALION.'material/condem',$data);
		}

		public function condemlistmskaction(){
			$data['weapon'] = $this->Btalion_model->fetchinfo('newmsk',array('conofitem=' => 'D','bat_id' => $this->session->userdata('userid')));
			$data['mskd'] = $this->Btalion_model->fetchinfo('deposit_material',array('condition_of_item=' => 'D','bat_id' => $this->session->userdata('userid')));
			//$data['cl'] = $this->Btalion_model->cmskquntys();
			$this->load->view(F_BTALION.'material/auction',$data);
		}

		public function condemlistmskactions($id){
			$add_web = $this->Btalion_model->mskauction($id);
			if($add_web == 1){
						$this->session->set_flashdata('success_msg','Material has removed succesfully !');
						redirect('bt-condemlistmsk');
					}else{
						$this->session->set_flashdata('error_msg','Material has not removed.');
						redirect('bt-condemlistmsk');
					}
		}

		public function condemlistmskactionslist($id){
			$add_web = $this->Btalion_model->mskauctionlist($id);
			if($add_web == 1){
						$this->session->set_flashdata('success_msg','Material has removed succesfully !');
						redirect('bt-condemlistmsk');
					}else{
						$this->session->set_flashdata('error_msg','Material has not removed.');
						redirect('bt-condemlistmsk');
					}
		}


		public function mskbackstore($id){
			$add_web = $this->Btalion_model->mskbackstore($id);
			if($add_web == 1){
						$this->session->set_flashdata('success_msg','Material has added succesfully !');
						redirect('bt-condemlistmsk');
					}else{
						$this->session->set_flashdata('error_msg','Material has not added.');
						redirect('bt-condemlistmsk');
					}
		}

		public function mskbackstores($id){
			$add_web = $this->Btalion_model->mskbackstores($id);
			if($add_web == 1){
						$this->session->set_flashdata('success_msg','Material has added succesfully !');
						redirect('bt-condemlistmsk');
					}else{
						$this->session->set_flashdata('error_msg','Material has not added.');
						redirect('bt-condemlistmsk');
					}
		}


		

		public function msk_olddataissued(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$this->load->library('pagination');
			$data['items'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$weapon = $this->Btalion_model->fetchinfo('newmsk',array('conofitem!=' => 'C','bat_id' => $this->session->userdata('userid')));
			$config = array();
			$config["base_url"] = base_url() . "bt-msk-old";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 3000;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


			$toi = $this->input->post("toi",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$Issuedto = $this->input->post("Issuedto",TRUE);

			$MudDuties = $this->input->post("MudDuties",TRUE);
			$GeneralStaff = $this->input->post("GeneralStaff",TRUE);
			$MTSectionf = $this->input->post("MTSectionf",TRUE);
			$Institutionsti = $this->input->post("Institutionsti",TRUE);
			$GuardDutiesti = $this->input->post("GuardDutiesti",TRUE);
			$Companydutiesti = $this->input->post("Companydutiesti",TRUE);
			$LawOrderDuty = $this->input->post("LawOrderDuty",TRUE);
			$SpecialTeamDuty = $this->input->post("SpecialTeamDuty",TRUE);
			$SportsAttachments = $this->input->post("SportsAttachments",TRUE);
			$OtherAttachmentDuties1 = $this->input->post("OtherAttachmentDuties1",TRUE);
			$admblock = $this->input->post("admblock",TRUE);
			$Other = $this->input->post("Other",TRUE);
			$Detail =   $this->input->post("Detail",TRUE);
			$District =   $this->input->post("District",TRUE);
			$addinfop =   $this->input->post("addinfop",TRUE);
			$ito =   $this->input->post("ito",TRUE);
			
			$ovalue = '';
			if($MudDuties!=''){
				$ovalue.= $MudDuties;
			}
			if($GeneralStaff!=''){
				$ovalue.= $GeneralStaff;
			}if($MTSectionf!=''){
				$ovalue.= $MTSectionf;
			}if($Institutionsti!=''){
				$ovalue.= $Institutionsti;
			}if($GuardDutiesti!=''){
				$ovalue.= $GuardDutiesti;
			}if($Companydutiesti!=''){
				$ovalue.= $Companydutiesti;
			}if($LawOrderDuty!=''){
				$ovalue.= $LawOrderDuty;
			}if($SpecialTeamDuty!=''){
				$ovalue.= $SpecialTeamDuty;
			}if($SportsAttachments!=''){
				$ovalue.= $SportsAttachments;
			}if($OtherAttachmentDuties1!=''){
				$ovalue.= $OtherAttachmentDuties1;
			}if($admblock!=''){
				$ovalue.= $admblock;
			}if($Other!=''){
				$ovalue.= $Other;
			}if($ito!=''){
				$ovalue.= $ito;
			}

			$data["weapon"] = $this->Btalion_model->get_usersmsk($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$config["per_page"],$page,$this->session->userdata('userid'));
			
			$data['qname'] = $this->Btalion_model->mskqunty($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue);

			$this->form_validation->set_rules("toi", "toi", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersmsk($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$config["per_page"],$page,$this->session->userdata('userid'));
				$data['qname'] = $this->Btalion_model->mskqunty($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue);
			}
			$this->load->view(F_BTALION.'old/issuematriel',$data);
		}

		public function msk_colddataissued(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$this->load->library('pagination');

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}

			$data['items'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$weapon = $this->Btalion_model->fetchinfo('newmsk',array('conofitem!=' => 'C','bat_id' => $ninfo[0]));
			$config = array();
			$config["base_url"] = base_url() . "bt-msk-coldissued";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 1500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


			$toi = $this->input->post("toi",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$Issuedto = $this->input->post("Issuedto",TRUE);

			$MudDuties = $this->input->post("MudDuties",TRUE);
			$GeneralStaff = $this->input->post("GeneralStaff",TRUE);
			$MTSectionf = $this->input->post("MTSectionf",TRUE);
			$Institutionsti = $this->input->post("Institutionsti",TRUE);
			$GuardDutiesti = $this->input->post("GuardDutiesti",TRUE);
			$Companydutiesti = $this->input->post("Companydutiesti",TRUE);
			$LawOrderDuty = $this->input->post("LawOrderDuty",TRUE);
			$SpecialTeamDuty = $this->input->post("SpecialTeamDuty",TRUE);
			$SportsAttachments = $this->input->post("SportsAttachments",TRUE);
			$OtherAttachmentDuties1 = $this->input->post("OtherAttachmentDuties1",TRUE);
			$admblock = $this->input->post("admblock",TRUE);
			$Other = $this->input->post("Other",TRUE);
			$Detail =   $this->input->post("Detail",TRUE);
			$District =   $this->input->post("District",TRUE);
			$addinfop =   $this->input->post("addinfop",TRUE);
			$ito =   $this->input->post("ito",TRUE);
			
			$ovalue = '';
			if($MudDuties!=''){
				$ovalue.= $MudDuties;
			}
			if($GeneralStaff!=''){
				$ovalue.= $GeneralStaff;
			}if($MTSectionf!=''){
				$ovalue.= $MTSectionf;
			}if($Institutionsti!=''){
				$ovalue.= $Institutionsti;
			}if($GuardDutiesti!=''){
				$ovalue.= $GuardDutiesti;
			}if($Companydutiesti!=''){
				$ovalue.= $Companydutiesti;
			}if($LawOrderDuty!=''){
				$ovalue.= $LawOrderDuty;
			}if($SpecialTeamDuty!=''){
				$ovalue.= $SpecialTeamDuty;
			}if($SportsAttachments!=''){
				$ovalue.= $SportsAttachments;
			}if($OtherAttachmentDuties1!=''){
				$ovalue.= $OtherAttachmentDuties1;
			}if($admblock!=''){
				$ovalue.= $admblock;
			}if($Other!=''){
				$ovalue.= $Other;
			}if($ito!=''){
				$ovalue.= $ito;
			}

			$data["weapon"] = $this->Btalion_model->get_usersmsk($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$config["per_page"],$page,$ninfo[0]);
			
			$data['qname'] = $this->Btalion_model->mskquntysc($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$ninfo[0]);

			$this->form_validation->set_rules("toi", "toi", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersmsk($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$config["per_page"],$page,$ninfo[0]);
				$data['qname'] = $this->Btalion_model->mskquntysc($toi,$nameofitem,$cti,$Receivedfrom,$Issuedto,$ovalue,$ninfo[0]);
 						
			}
			$this->load->view(F_BTALION.'old/issuematriel',$data);
		}

		public function msk_olddatadeposit(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$this->load->library('pagination');
			//$data['items'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			/*$weapon = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => $this->session->userdata('userid')));
			$config = array();
			$config["base_url"] = base_url() . "bt-msk-old";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";*/

        	/*$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


			$toi = $this->input->post("toi",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);*/
			$data["weapon"] = $this->Btalion_model->fetchinfo('deposit_material',array('bat_id' => $this->session->userdata('userid')));
			/*$data["weapon"] = $this->Btalion_model->get_usersmsk($toi,$nameofitem,$cti,$Receivedfrom,$config["per_page"],$page,$this->session->userdata('userid'));
			

			$this->form_validation->set_rules("toi", "toi", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersmsk($toi,$nameofitem,$cti,$Receivedfrom,$config["per_page"],$page,$this->session->userdata('userid')); 						
			}*/
			$this->load->view(F_BTALION.'old/deposit',$data);
		}

		public function add_vehicle(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$cov = $this->input->post("cov",TRUE);
			$chno = $this->input->post("chno",TRUE);
			$vc = $this->input->post("vc",TRUE);
			$dob1 = $this->input->post("dob1",TRUE);
			$engno = $this->input->post("engno",TRUE);
			$Chasis = $this->input->post("Chasis",TRUE);
			$moa = $this->input->post("moa",TRUE);
			$rn = $this->input->post("rn",TRUE); 
			$vcn = $this->input->post("vcn",TRUE); 
			$sr = $this->input->post("sr",TRUE);
			$ftype = $this->input->post("ftype",TRUE);
			$rcfrm = $this->input->post("rcfrm",TRUE);
			$rno =  $this->input->post("rno",TRUE);		
			$rm = $this->input->post("rm",TRUE);
			$rv = $this->input->post("rv",TRUE);
			$rcdt = $this->input->post("rcdt",TRUE);
			$rcd = $this->input->post("rcd",TRUE);
			$vcon = $this->input->post("vcon",TRUE);
			$lsd = $this->input->post("lsd",TRUE);
			$lid = $this->input->post("lid",TRUE);
			$tyremake1 = $this->input->post("tyremake1",TRUE);
			$tyreSerial1 = $this->input->post("tyreSerial1",TRUE);
			$TyreCondition1 = $this->input->post("TyreCondition1",TRUE);
			$tyremake2 = $this->input->post("tyremake2",TRUE);
			$tyreSerial2 = $this->input->post("tyreSerial2",TRUE);
			$TyreCondition2 = $this->input->post("TyreCondition2",TRUE);
			$tyremake3 = $this->input->post("tyremake3",TRUE);
			$tyreSerial3 = $this->input->post("tyreSerial3",TRUE);
			$TyreCondition3 = $this->input->post("TyreCondition3",TRUE);
			$tyremake4 = $this->input->post("tyremake4",TRUE);
			$tyreSerial4 = $this->input->post("tyreSerial4",TRUE);
			$TyreCondition4 = $this->input->post("TyreCondition4",TRUE);
			$tyremake5 = $this->input->post("tyremake5",TRUE);
			$tyreSerial5 = $this->input->post("tyreSerial5",TRUE);
			$TyreCondition5 = $this->input->post("TyreCondition5",TRUE);
			$tyremake6 = $this->input->post("tyremake6",TRUE);
			$tyreSerial6 = $this->input->post("tyreSerial6",TRUE);
			$TyreCondition6 = $this->input->post("TyreCondition6",TRUE);
			$tyremake7 = $this->input->post("tyremake7",TRUE);
			$tyreSerial7 = $this->input->post("tyreSerial7",TRUE);
			$TyreCondition7 = $this->input->post("TyreCondition7",TRUE);
			$sswi = $this->input->post("sswi",TRUE); 
			$bp = $this->input->post("bp",TRUE); 

			$this->form_validation->set_rules("cov", "Make of Vehicle", "trim|required");
			$this->form_validation->set_rules("chno", "Vehicle type", "trim|required");
			$this->form_validation->set_rules("vc", "Vehicle Class", "trim|required");
			$this->form_validation->set_rules("moa", "moa", "trim");
			$this->form_validation->set_rules("rn", "Registration No", "trim|is_unique[newmt.regnom]|required");

			$this->form_validation->set_rules("regno", "regno", "trim");
			$this->form_validation->set_rules("sr", "sr", "trim");
			$this->form_validation->set_rules("not", "not", "trim");
			$this->form_validation->set_rules("rcfrm", "rcfrm", "trim");
			$this->form_validation->set_rules("rm", "rm", "trim");
			$this->form_validation->set_rules("rv", "rv", "trim");
			$this->form_validation->set_rules("rcdt", "rcdt", "trim");	
			$this->form_validation->set_rules("rcd", "rcd", "trim");
			$this->form_validation->set_rules("vcon", "vcon", "trim");
			$this->form_validation->set_rules("lsd", "lsd", "trim");
			$this->form_validation->set_rules("lid", "lid", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_vechicle($cov,$chno,$vc,$dob1,$engno,$Chasis,$moa,$rn,$vcn,$sr,$ftype,$rcfrm,$rno,$rm,$rv,$rcdt,$rcd,$vcon,$lsd,$lid,$tyremake1,$tyreSerial1,$TyreCondition1,$tyremake2,$tyreSerial2,$TyreCondition2,$tyremake3,$tyreSerial3,$TyreCondition3,$tyremake4,$tyreSerial4,$TyreCondition4,$tyremake5,$tyreSerial5,$TyreCondition5,$tyremake6,$tyreSerial6,$TyreCondition6,$tyremake7,$tyreSerial7,$TyreCondition7,$sswi,$bp);	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has added succesfully !');
					redirect('bt-add-vehicle');
				}else{
					$this->session->set_flashdata('error_msg','Vehicle has added issued.');
					redirect('bt-add-vehicle');
				}	
			}
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));
			
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6 ));

			
			$this->load->view(F_BTALION.'vehicles/addvehicles',$data);
		}

		public function add_pol(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$avg = $this->input->post("avg",TRUE);
			$mkm = $this->input->post("mkm",TRUE);
			$mpol = $this->input->post("mpol",TRUE);
			$polex = $this->input->post("polex",TRUE);
			$repair = $this->input->post("repair",TRUE);
			

			$this->form_validation->set_rules("avg", "avg", "trim");
			$this->form_validation->set_rules("mkm", "mkm", "trim");
			$this->form_validation->set_rules("mpol", "mpol", "trim");
			$this->form_validation->set_rules("polex", "polex", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_pol($avg,$mkm,$mpol,$polex,$repair);	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has added succesfully !');
					redirect('bt-add-vehicle');
				}else{
					$this->session->set_flashdata('error_msg','Vehicle has added issued.');
					redirect('bt-add-vehicle');
				}	
			}
			$this->load->view(F_BTALION.'vehicles/p');
		}

		public function issue_vehicle(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6 ));
			$data['unamelist'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$moa = $this->input->post("moa",TRUE);
			$rnum = $this->input->post("rnum",TRUE);
			$Dateofduty = $this->input->post("Dateofduty",TRUE);
			$tpii = $this->input->post("tpii",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			$Otherstate = $this->input->post("Otherstate",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$oname  = $this->input->post("oname",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$instone4 = $this->input->post("instone4",TRUE);
			$lsd = $this->input->post("lsd",TRUE);
			$batslist = $this->input->post("batslist",TRUE);
			$district  = $this->input->post("district",TRUE); 
			$drcvno  = $this->input->post("rcvno",TRUE); 
			$drdate  = $this->input->post("rdate",TRUE); 
			$spm  = $this->input->post("spm",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$lid = $this->input->post("lid",TRUE);
			$abc = $this->input->post("abc",TRUE);		
	

			$this->form_validation->set_rules("rnum", "Registration Number", "required");
			$this->form_validation->set_rules("Dateofduty", "Date of Duty", "callback_valid_date|callback_valid_today");
			$this->form_validation->set_rules("tpii", "Place of Duty", "required|callback_valid_place_of_duty");
			
			if($tpii=="Self battalion"){
				$this->form_validation->set_rules("tpi", "Nature of Duty", "required|callback_valid_nature_of_duty");
				if($tpi=='Officer'){
					$this->form_validation->set_rules("oname", "Officer Name", "required");
				}elseif($tpi=='Other state'){
					$this->form_validation->set_rules("Otherstate", "State", "required|callback_valid_state");
				}
			}elseif($tpii=="Other Unit/Battalion"){
				$this->form_validation->set_rules("ito", "Battalions", "required|callback_valid_battalions");
			}elseif($tpii=='Institution Duty'){
					$this->form_validation->set_rules("instone4", "Nature of Duty", "required|callback_valid_institution_duty");
			}elseif($tpii=='District'){
				$this->form_validation->set_rules("district", "District", "required|callback_valid_districts");
			}elseif($tpii=='Other'){
				$this->form_validation->set_rules("lsd", "Duty Detail", "required");
			}
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->issue_vechicle($moa,$rnum,convertDate($Dateofduty).date(" H:i:s"),$tpii,$tpi,$Otherstate,$hn,$nop,$oname,$ito,$instone4,$lsd,$batslist,$district,$drcvno,$drdate,$spm,$orderno,$lid,$abc); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has issued succesfully !');
					redirect('bt-issue-vehicle');
				}else{
					$this->session->set_flashdata('error_msg','Vehicle has not issued.');
					redirect('bt-issue-vehicle');
				}	
			}
			
				$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$this->load->view(F_BTALION.'vehicles/issue',$data);
		}
		public function valid_state($a){
			$statelist = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));
			$states = array();
			foreach ($statelist as $value) {
                   $states[$value->state] = $value->state;
            }
			if(in_array($a,$states)){
				return true;
			}else{
				$this->form_validation->set_message('valid_state', 'Invalid state selected!');
				return false;
			}
		}
		public function valid_districts($a){
			$districts = array('Amritsar Commissionerate' => 'Amritsar Commissionerate','Amritsar Rural' => 'Amritsar Rural', 'Batala' => 'Batala', 'Gurdaspur' => 'Gurdaspur', 'Pathankot' => 'Pathankot','Tarn Taran' => 'Tarn Taran','Patiala' => 'Patiala','Sangrur' => 'Sangrur', 'Barnala' => 'Barnala','Rupnagar' => 'Rupnagar','S.A.S Nagar' => 'S.A.S Nagar','Fatehgarh Sahib' => 'Fatehgarh Sahib','Jalandhar Commissionerate' => 'Jalandhar Commissionerate','Jalandhar Rural' => 'Jalandhar Rural','Hoshiarpur' => 'Hoshiarpur','Kapurthala' => 'Kapurthala','Ludhiana Commissionerate' => 'Ludhiana Commissionerate','Ludhiana Rural' => 'Ludhiana Rural','Khanna' => 'Khanna','Shahid Bhagat Singh Nagar' => 'Shahid Bhagat Singh Nagar','Bathinda' => 'Bathinda','Mukatsar' => 'Mukatsar','Mansa' => 'Mansa','Ferozepur' => 'Ferozepur','Fazlika' => 'Fazlika','Moga' => 'Moga','Faridkot' => 'Faridkot','Vigilance Bureau' =>'Vigilance Bureau', 'CID' => 'CID','EXCISE' => 'EXCISE','NRI WING' => 'NRI WING');
			if(in_array($a,$districts)){
				return true;
			}else{
				$this->form_validation->set_message('valid_districts', 'Invalid District Selected!');
				return false;
			}
		}
		public function valid_institution_duty($a){
			$valid_institutions = array('PRINTING PRESS' => 'PRINTING PRESS', 'PHOTOGRAPHY CELL' => 'PHOTOGRAPHY CELL','ART GALLERY' => 'ART GALLERY','WIRELESS SECTION' => 'WIRELESS SECTION','DUPLEX' =>'DUPLEX','PAP HOSPITAL' => 'PAP HOSPITAL','GRIEVANCES REDRESSAL CELL' => 'GRIEVANCES REDRESSAL CELL','GOLF CLUB' => 'GOLF CLUB','GOLF RANGE' => 'GOLF RANGE','GAZETTED OFFICERS MESS' => 'GAZETTED OFFICERS MESS','MINI GOS MESS' => 'MINI GOS MESS' , 'B.M.STAFF' => 'B.M.STAFF', 'SEWERAGE AND SANITATION' => 'SEWERAGE AND SANITATION','B.D. TEAM' => 'B.D. TEAM', 'ELECTRICITY WING' => 'ELECTRICITY WING','PIPE BAND' => 'PIPE BAND','BRASS BAND' => 'BRASS BAND','MOUNTED POLICE' => 'MOUNTED POLICE','RE-BROWNING WORKSHOP' => 'RE-BROWNING WORKSHOP','BASE WORKSHOP' => 'BASE WORKSHOP','PAP GAS AGENCY' => 'PAP GAS AGENCY','TEAR GAS SQUAD' => 'TEAR GAS SQUAD', 'EMPTY CATRIDGE CELL' => 'EMPTY CATRIDGE CELL', 'CABLE NETWORK' => 'CABLE NETWORK','GURUDWARA SAHIB PAP CAMPUS' => 'GURUDWARA SAHIB PAP CAMPUS','COUNSELLING AND CARRIER GUIDANCE CENTRE' => 'COUNSELLING AND CARRIER GUIDANCE CENTRE','PAP BOOK SHOP' => 'PAP BOOK SHOP','COMPUTER HARDWARE CELL' => 'COMPUTER HARDWARE CELL','PAP WEBSITE' => 'PAP WEBSITE','COMPUTER TRG. CENTRE' => 'COMPUTER TRG. CENTRE', 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL' => 'LADIES WELFARE CENTRE &  MULTIPURPOSE HALL','PAPCOS' => 'PAPCOS','SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL' => 'SUPERVISION OF PERSONNEL ATTACH WITH POLICE DAV PUBLIC SCHOOL','B.P. UNIT' => 'B.P. UNIT','BEAUTIFICATION STAFF' => 'BEAUTIFICATION STAFF','R.P.STAFF' => 'R.P.STAFF','SPECIAL GUARD' => 'SPECIAL GUARD','CO-OPERATIVE STORE' => 'CO-OPERATIVE STORE','CULTURAL TROUP' => 'CULTURAL TROUP','APNA DHABA' => 'APNA DHABA','SHIV SHAKTI MANDIR' => 'SHIV SHAKTI MANDIR','SONA BATH' => 'SONA BATH','SWIMMING POOL 25 MTR' => 'SWIMMING POOL 25 MTR','BAKERY' => 'BAKERY','TECHNICAL TEAM' => 'TECHNICAL TEAM', 'PAP GYM. NEW' => 'PAP GYM. NEW','PAP GYM. OLD' => 'PAP GYM. OLD','ACUPRESSURE' => 'ACUPRESSURE','SPORTS CAFE,MILK BAR & JUICE BAR PAP' => 'SPORTS CAFE,MILK BAR & JUICE BAR PAP','INDOOR STADIUM' => 'INDOOR STADIUM','PAP  SHOOTING RANGE' => 'PAP  SHOOTING RANGE','BUGGLER' => 'BUGGLER','T/A 7th Bn PAP for Driver Duty' => 'T/A 7th Bn PAP for Driver Duty','U/7th PAP for out Rider duty on Motor Cycle' => 'U/7th PAP for out Rider duty on Motor Cycle','M.T WORKSHOP U/7th BN PAP' => 'M.T WORKSHOP U/7th BN PAP','Security Wing PAP duty' => 'Security Wing PAP duty');
			if(in_array($a,$valid_institutions)){
				return true;
			}else{
				$this->form_validation->set_message('valid_institution_duty', 'Invalid Selection!');
				return false;
			}
		}
		public function valid_battalions($a){
			$valid_nature = array('7th BN. PAP' => '7th BN. PAP','9th BN. PAP' => '9th BN. PAP','13th BN.PAP' => '13th BN.PAP','27th BN.PAP' => '27th BN.PAP','36th BN.PAP' => '36th BN.PAP','75th BN.PAP' => '75th BN.PAP','80th BN.PAP' => '80th BN.PAP','82nd BN.PAP' => '82nd BN.PAP','RTC/PAP, JRC' => 'RTC/PAP, JRC','Control Room PAP' => 'Control Room PAP','ISTC/KPT.' => 'ISTC/KPT.','1st CDO BN. BHG, PTL' => '1st CDO BN. BHG, PTL','2nd CDO BN. BHG, PTL' => '2nd CDO BN. BHG, PTL','3rd CDO BN., Mohali' => '3rd CDO BN., Mohali','4th CDO BN., Mohali' => '4th CDO BN., Mohali','5th CDO BN. BHG, PTL' => '5th CDO BN. BHG, PTL','1st IRBn., PTL.' => '1st IRBn., PTL.','2nd IRBn., L/Kothi, SGR.' => '2nd IRBn., L/Kothi, SGR.','3rd IRBn., LDH' => '3rd IRBn., LDH','4th IRBn., KPT' => '4th IRBn., KPT','5th IRBn., ASR' => '5th IRBn., ASR', '6th IRBn., L/Kothi, SGR.' => '6th IRBn., L/Kothi, SGR.','7th IRBn., KPT' => '7th IRBn., KPT','CTC/BHG, PTL.' => 'CTC/BHG, PTL.','CCR/BHG, PTL.' => 'CCR/BHG, PTL.', 'PPA/PHR' => 'PPA/PHR','Jahan khelan' => 'Jahan khelan');
			//die($a);
			if(in_array($a,array_keys($valid_nature))){
				return true;
			}else{
				$this->form_validation->set_message('valid_battalions', 'Invalid Battalion Selected!');
				return false;
			}
		}
		public function valid_nature_of_duty($a){
			$valid_nature = array('MT Section' => 'MT Section','Office duty' => 'Office duty','Officer' => 'Officer','Law & duty' => 'Law & duty', 'Sports duty' => 'Sports duty','VIP Duty' => 'VIP Duty','Election duty' => 'Election duty','Ceremonial duty' => 'Ceremonial duty','General duty' => 'General duty', 'MT Traning' => 'MT Traning','Other state' => 'Other state');
			if(in_array($a,$valid_nature)){
				return true;
			}else{
				$this->form_validation->set_message('valid_nature_of_duty', 'Invalid Selection!');
				return false;
			}
		}
		public function valid_place_of_duty($a){
			$valid_places = array('Self battalion' => 'Self battalion','Other Unit/Battalion' => 'Other Unit/Battalion', 'Institution Duty' => 'Institution Duty','District' => 'District', 'Other' => 'Other');
			if(in_array($a,$valid_places)){
				return true;
			}else{
				$this->form_validation->set_message('valid_place_of_duty', 'Invalid Selection!');
				return false;
			}
		}

		public function add_repair(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			
			if(null!=$this->input->post('sub')){
                            
				$rnum = $this->input->post("rnum",TRUE);
				$cmonth = $this->input->post("cmonth",TRUE);
				$dorepair = $this->input->post("dorepair",TRUE);
				$rdetails = $this->input->post("rdetails",TRUE);
				$runit = $this->input->post("runit",TRUE);
				$nofirm = $this->input->post("nofirm",TRUE);
				$nofcon =  $this->input->post("nofcon",TRUE);
				$pamo =  $this->input->post("pamo",TRUE);
				$ramu =  $this->input->post("ramu",TRUE);
				$ttno =  $this->input->post("ttno",TRUE);
				$tdate =  $this->input->post("tdate",TRUE);

				$this->form_validation->set_rules("rnum", "Registration Number", "required");
				$this->form_validation->set_rules("dorepair", "Date Of Repair", "required");
				$this->form_validation->set_rules("rdetails", "Repair Details", "required");
				$this->form_validation->set_rules("runit", "Repairing Unit", "required");
                                if($runit=='PAP Central Workshop'){
                                    $this->form_validation->set_rules("pamo", "Amount", "required|numeric");
                                }elseif($runit=='Private Firm'){
                                    $this->form_validation->set_rules("ramu", "Amount", "required|numeric");
                                    $this->form_validation->set_rules("nofirm", "Name of Firm", "required");
                                }elseif($runit=='Other'){
                                    $this->form_validation->set_rules("nofcon", "Detail of other unit", "required");
                                    $this->form_validation->set_rules("ramu", "Total Amount", "required|numeric");
                                }
			
				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->add_pol($rnum,$cmonth,$dorepair,$rdetails,$runit,$nofirm,$nofcon,$pamo,$ramu,$ttno,$tdate);	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Vehicle has added succesfully !');
						redirect('bt-view-mrepair/'.$rnum);
					}else{
						$this->session->set_flashdata('error_msg','Vehicle has added issued.');
						//redirect('bt-add-mrepair');
					}	
				}
                                $data['submit'] = 'true';
			}
			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$this->load->view(F_BTALION.'vehicles/repair',$data);
		}

		public function add_monthly_repair(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$avg = $this->input->post("avg",TRUE);
			$mkm = $this->input->post("mkm",TRUE);
			$mpol = $this->input->post("mpol",TRUE);
			$polex = $this->input->post("polex",TRUE);
			$repair = $this->input->post("repair",TRUE);
			

			$this->form_validation->set_rules("avg", "avg", "trim");
			$this->form_validation->set_rules("mkm", "mkm", "trim");
			$this->form_validation->set_rules("mpol", "mpol", "trim");
			$this->form_validation->set_rules("polex", "polex", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->add_repair($avg,$mkm,$mpol,$polex,$repair);	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has added succesfully !');
					redirect('bt-add-monthrepair');
				}else{
					$this->session->set_flashdata('error_msg','Vehicle has added issued.');
					redirect('bt-add-monthrepair');
				}	
			}
			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$this->load->view(F_BTALION.'vehicles/monthly',$data);
		}


		public function view_mrepair($id){
			$this->load->helper('common_helper');
			$data['vichel'] = $this->Btalion_model->fetchinfo('mtrepair',array('rnum' => $id, 'bat_id' =>$this->session->userdata('userid')));
			$this->load->view(F_BTALION.'vehicles/reapirlist',$data);
		}

		public function ins_vic(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$rnum = $this->input->post("rnum",TRUE);
			$cw = $this->input->post("cw",TRUE);
			$ename = $this->input->post("ename",TRUE);
			$name =  $this->input->post("name",TRUE);
			$contact = $this->input->post("contact",TRUE);
			$lid = $this->input->post("lid",TRUE);
			$lids = $this->input->post("lids",TRUE);
			$sr =  $this->input->post("sr",TRUE);
			$vc =  $this->input->post("vc",TRUE);
			$ssw = $this->input->post("ssw",TRUE);
			$suw = $this->input->post("suw",TRUE);
			$remark = $this->input->post("remark",TRUE);

			$this->form_validation->set_rules("rnum", "rnum", "trim|required");


			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->ins_vic($rnum,$cw,$ename,$name,$contact,$lid,$lids,$sr,$vc,$ssw,$suw,$remark);
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has added succesfully !');
					redirect('bt-ins-vic');
				}else{
					$this->session->set_flashdata('error_msg','Info has not added.');
					redirect('bt-ins-vic');
				}	
			}
			 $data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$this->load->view(F_BTALION.'vehicles/inspection',$data);
		}

		public function deposit_vichel(){
			$this->load->library('form_validation');
			$this->load->helper('security');$this->load->helper('common_helper');

			$rnum = $this->input->post("rnum",TRUE);
			$rec = $this->input->post("rec",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$sr = $this->input->post("sr",TRUE);
			$vc   = $this->input->post("vc",TRUE);
			$ssw   = $this->input->post("ssw",TRUE);
			$suw = $this->input->post("suw",TRUE);
			$ca =  $this->input->post("ca",TRUE);
			$vdate = $this->input->post("vdate",TRUE);
			$remark = $this->input->post("remark",TRUE); 

			$this->form_validation->set_rules("rnum", "rnum", "trim|required");

			if ($this->form_validation->run()){

				$add_web = $this->Btalion_model->deposit_vechicle($rnum,$rec,$idate,$sr,$vc,$ssw,$suw,$ca,$vdate,$remark); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has deposit succesfully !');
					redirect('bt-deposit-vehicle');
				}else{
					$this->session->set_flashdata('error_msg','Vehicle has not deposit.');
					redirect('bt-deposit-vehicle');
				}	
			}

			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$data['body'] = $this->Btalion_model->fetchinfo(T_MANMASTER,array('man_status' => 1 ));
			$this->load->view(F_BTALION.'vehicles/depositform',$data);
		}

		public function update_vichel($id){
			$this->load->library('form_validation');
			$this->load->helper('security');$this->load->helper('common_helper');
			$cov = $this->input->post("cov",TRUE);
			$rnum = $this->input->post("rnum",TRUE);
			$vc = $this->input->post("vc",TRUE);
			$ssw = $this->input->post("ssw",TRUE);
			$suw = $this->input->post("suw",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$conditiondate = $this->input->post("conditiondate",TRUE);
			$aoa = $this->input->post("aoa",TRUE);
			$adate = $this->input->post("adate",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$rno = $this->input->post("rno",TRUE);
			$sr = $this->input->post("sr",TRUE);
			$ftype = $this->input->post("ftype",TRUE);
			$ordersno = $this->input->post("ordersno",TRUE);
			$ordersdate = $this->input->post("ordersdate",TRUE);
			$dot = $this->input->post("dot",TRUE);
			$tud = $this->input->post("tud",TRUE);
			$remark = $this->input->post("remark",TRUE);
			$vcon = $this->input->post("vcon",TRUE);

			$engno = $this->input->post("engno",TRUE);
			$Chasis = $this->input->post("Chasis",TRUE);
			$regtypetp = $this->input->post("regtypetp",TRUE);

			$avg = $this->input->post("avg",TRUE);
			$mkm = $this->input->post("mkm",TRUE);
			$mpol = $this->input->post("mpol",TRUE);
			$polex = $this->input->post("polex",TRUE);
			$repair = $this->input->post("repair",TRUE);

			$tkm = $this->input->post("tkm",TRUE);
			$tpol = $this->input->post("tpol",TRUE);
			$trepair = $this->input->post("trepair",TRUE);

			$tyremake1 = $this->input->post("tyremake1",TRUE);
			$tyreSerial1 = $this->input->post("tyreSerial1",TRUE);
			$TyreCondition1 = $this->input->post("TyreCondition1",TRUE);
			$tyremake2 = $this->input->post("tyremake2",TRUE);
			$tyreSerial2 = $this->input->post("tyreSerial2",TRUE);
			$TyreCondition2 = $this->input->post("TyreCondition2",TRUE);
			$tyremake3 = $this->input->post("tyremake3",TRUE);
			$tyreSerial3 = $this->input->post("tyreSerial3",TRUE);
			$TyreCondition3 = $this->input->post("TyreCondition3",TRUE);
			$tyremake4 = $this->input->post("tyremake4",TRUE);
			$tyreSerial4 = $this->input->post("tyreSerial4",TRUE);
			$TyreCondition4 = $this->input->post("TyreCondition4",TRUE);
			$tyremake5 = $this->input->post("tyremake5",TRUE);
			$tyreSerial5 = $this->input->post("tyreSerial5",TRUE);
			$TyreCondition5 = $this->input->post("TyreCondition5",TRUE);
			$tyremake6 = $this->input->post("tyremake6",TRUE);
			$tyreSerial6 = $this->input->post("tyreSerial6",TRUE);
			$TyreCondition6 = $this->input->post("TyreCondition6",TRUE);
			$tyremake7 = $this->input->post("tyremake7",TRUE);
			$tyreSerial7 = $this->input->post("tyreSerial7",TRUE);
			$TyreCondition7 = $this->input->post("TyreCondition7",TRUE);
			$rv = $this->input->post("rv",TRUE);
			$rcdt = $this->input->post("rcdt",TRUE);
			$district = $this->input->post("district",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$rdate = $this->input->post("rdate",TRUE);
			$dob1 = $this->input->post("dob1",TRUE);
			$mkmo = $this->input->post("mkmo",TRUE);
			$mpolo =  $this->input->post("mpolo",TRUE);
			$repairo = $this->input->post("repairo",TRUE);
			$covi =  $this->input->post("covi",TRUE);
			$sswi = $this->input->post("sswi",TRUE);
			$acnonc = $this->input->post("acnonc",TRUE); 
			$bp = $this->input->post("bp",TRUE); 

			$data['vichelinfo'] = $this->Btalion_model->fetchoneinfo('newmt',array('mt_id' =>$id));

			$this->form_validation->set_rules("rnum", "rnum", "trim|required");
			
			if ($this->form_validation->run()){

				$add_web = $this->Btalion_model->update_vichel($cov,$rnum,$vc,$ssw,$suw,$orderno,$conditiondate,$aoa,$adate,$ito,$rno,$sr,$ftype,$ordersno,$ordersdate,$dot,$tud,$remark,$vcon,$engno,$Chasis,$regtypetp,$avg,$mkm,$mpol,$polex,$repair,$tkm,$tpol,$trepair,$id,$tyremake1,$tyreSerial1,$TyreCondition1,$tyremake2,$tyreSerial2,$TyreCondition2,$tyremake3,$tyreSerial3,$TyreCondition3,$tyremake4,$tyreSerial4,$TyreCondition4,$tyremake5,$tyreSerial5,$TyreCondition5,$tyremake6,$tyreSerial6,$TyreCondition6,$tyremake7,$tyreSerial7,$TyreCondition7,$rv,$rcdt,$district,$rcvno,$rdate,$dob1,$mkmo,$mpolo,$repairo,$covi,$sswi,$acnonc,$bp); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has updated succesfully !');
					redirect('bt-update-vehicle/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Vehicle has not updated.');
					redirect('bt-update-vehicle/'.$id);
				}	
			}

			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6 ));
			$this->load->view(F_BTALION.'vehicles/updateve',$data);
		}

		public function vicheldein(){
			$this->load->library('form_validation');
			$this->load->helper('security');$this->load->helper('common_helper');
			$rnum = $this->input->post("rnum",TRUE);
			
			$ito = $this->input->post("ito",TRUE);
			$rno = $this->input->post("rno",TRUE);
			$district = $this->input->post("district",TRUE);
			$sr = $this->input->post("sr",TRUE);
			$ordersno = $this->input->post("ordersno",TRUE);
			$ordersdate = $this->input->post("ordersdate",TRUE);
			$dot = $this->input->post("dot",TRUE);
			$rem =  $this->input->post("rem",TRUE);

			
			$this->form_validation->set_rules("rnum", "rnum", "trim|required");
                        $this->form_validation->set_rules("itok", "Select Transfer to", "trim|required");
                        $this->form_validation->set_rules("dot", "Select Date of Transfer", "trim|required");
			
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->vicheldein($rnum,$ito,$rno,$district,$sr,$ordersno,$ordersdate,$dot,$rem); 	

				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has updated succesfully !');
					redirect('bt-vicheldein');
				}else{
					$this->session->set_flashdata('error_msg','Vehicle has not updated.');
					redirect('bt-update-vehicle');
				}	
			}

			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6 ));
			$this->load->view(F_BTALION.'vehicles/deinduction',$data);
		}

		public function update_vechile(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$data['weapon'] = $this->Btalion_model->fetchinfo('update_vechile',array('bat_id' =>$this->session->userdata('userid')));
			$this->load->view(F_BTALION.'vehicles/deinreport',$data);
		}

                public function isValidMonthYear($cmonth,$data){
                    $this->load->model('MTVehicle_model');
                    $d =                    explode(',', $data);
                    $cyear = $d[0];
                    $rnum = $d[1];
					$bat_id= $d[2];
                    if($cyear!=null && $rnum!=null){
                        if(!$this->MTVehicle_model->isCurrentYearPolUpdateExists($cyear,$bat_id)){
                            $wep = $this->Btalion_model->fetchinfoorder('pol_return',array('rnum' => $rnum,'cyear <= ' => $cyear,'bat_id'=>$bat_id),'cyear DESC,cmonth DESC ','');
                        }else{
                            $wep = $this->Btalion_model->fetchinfoorder('pol_return',array('rnum' => $rnum,'cmonth <=' => $cmonth,'cyear <= ' => $cyear,'bat_id'=>$bat_id),'cyear DESC,cmonth DESC','');
                        }
//                        var_dump($wep);
//                        die('hi)');

                        if($wep!=null){
                            if($wep->cyear==$cyear){
                                if($wep->cmonth == $cmonth){
                                    $this->form_validation->set_message('isValidMonthYear', 'This Month Pol Already Exists');
                                     return false; 
                                 }elseif($wep->cmonth != $cmonth-1){
                                    $this->form_validation->set_message('isValidMonthYear', 'Please enter last month\'s pol detail');
                                     return false; 
                                 }else{
                                    return true; 
                                 }
                            }else{
								if($wep->cyear==$cyear-1){
									if($cmonth==1){
										if($wep->cmonth!=12){
											$message = 'Please Enter the last Month POL';
											$status = false; 
											$this->form_validation->set_message('isValidMonthYear', $message);
                                			return $status; 
										}else{
											$message = 'You can enter this month pol';
											$status = true; 
											$this->form_validation->set_message('isValidMonthYear', $message);
                                			return $status; 
										}
									}else{
										$message = 'Please Enter the last Month POL';
										$status = false; 
										$this->form_validation->set_message('isValidMonthYear', $message);
                                		return $status; 
									}
								}else{
									$message = 'Please Enter the last Month POL';
									$status = false; 
									$this->form_validation->set_message('isValidMonthYear', $message);
                                	return $status; 
								}
                                //$this->form_validation->set_message('isValidMonthYear', 'Please enter last month\'s pol detail');
                                //return false; 
                             }
                        }else{
                            return true;
                        }
                    }else{
                        $this->form_validation->set_message('isValidMonthYear', 'Year is Missing');
                        return false;
                    }
                }
		

		public function pol_update($id){
			$this->load->library('form_validation');
			$this->load->helper('security');$this->load->helper('common_helper');
			$rnum = $this->input->post("rnum",TRUE);
			$cmonth = $this->input->post("cmonth",TRUE);
			$cyear = $this->input->post("cyear",TRUE);
			$mkmo = $this->input->post("mkmo",TRUE);
			$mkm = $this->input->post("mkm",TRUE);
			$tkm = $this->input->post("tkm",TRUE);
			$mpolo =  $this->input->post("mpolo",TRUE);
			$mpol = $this->input->post("mpol",TRUE);
			$tpol = $this->input->post("tpol",TRUE);
			$polex = $this->input->post("polex",TRUE);
			$repairo = $this->input->post("repairo",TRUE);
			$repair = $this->input->post("repair",TRUE);
			$trepair = $this->input->post("trepair",TRUE);

			$this->form_validation->set_rules("mkm", "Current month KM/Hours", "trim|required");
                        $this->form_validation->set_rules("mpol", "Current Month POL", "trim|required");
                        $this->form_validation->set_rules("polex", "Current Month pol exp", "trim|required");
                        $this->form_validation->set_rules("cmonth", "Current Month", "trim|required|callback_isValidMonthYear[$cyear,$id,".$this->session->userdata('bat_id')."]");
			
                        $fetch_form = false; 
                        
			if ($this->form_validation->run()){
                            
				$add_web = $this->Btalion_model->update_pol($id,$rnum,$cmonth,$cyear,$mkmo,$mkm,$tkm,$mpolo,$mpol,$tpol,$polex,$repairo,$repair,$trepair); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Vehicle has updated succesfully !');
					//redirect('bt-pol-update/'.$id);
				}else{
                                    $fetch_form = true; 
					$this->session->set_flashdata('error_msg','Vehicle has not updated.');
					//redirect('bt-pol-update/'.$id);
				}	
                        }else{
                                $fetch_form = true; 
                        }
                        $data['fetch_form'] =$fetch_form;
			$data['vichelinfo'] = $this->Btalion_model->fetchoneinfo('newmt',array('mt_id' =>$id));

			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6 ));
			$this->load->view(F_BTALION.'vehicles/pol',$data);
		}

		public function pol_viewlist(){
			$data['vichel'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' =>$this->session->userdata('userid')));
			$this->load->view(F_BTALION.'vehicles/polview',$data);
		}

		public function view_arms(){
			$this->load->helper('common_helper');
			$data['arms'] = $this->Btalion_model->viewarm();
			$this->load->view(F_BTALION.'arms/viewbatalianissue',$data);
		}

		public function view_issue_arms(){
			$this->load->helper('common_helper');
			$data['arms'] =  $this->Btalion_model->fetchinfo(T_BATISSUE,array('bat_status' => 1));
			$this->load->view(F_BTALION.'arms/khcarms',$data);
		}

		public function view_pap_arms(){
			$this->load->helper('common_helper');
			$data['arms'] =  $this->Btalion_model->fetchinfo(T_BATISSUE,array('ito' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'arms/paparms',$data);
		}

		public function view_issueammunition(){
			$this->load->helper('common_helper');
			$data['weapon'] = $this->Btalion_model->fetchinfo(T_BATISSUE_AMMU,array('bat_status' => 1));
			$this->load->view(F_BTALION.'ammunition/viewissueammu',$data);
		}

		public function view_ammunition(){
			$this->load->helper('common_helper');
			$data['weapon'] = $this->Btalion_model->fetchinfo(T_ISSUE_AMMU,array('issue_to' => $this->session->userdata('userid') ));
			$this->load->view(F_BTALION.'ammunition/viewaddammunition',$data);
		}

		public function view_officer(){
			//$data['arms'] = $this->Btalion_model->fetchinfo(T_OFFICER,array('of_status' => 1 ));
			$this->load->view(F_BTALION.'manpower/viewofficermaster',$data);
		}

		public function view_vehicle(){
			$data['vehicle'] = $this->Btalion_model->fetchinfo(T_VEHICLE,array('vechicle_status' => 1 ));
			$this->load->view(F_BTALION.'vehicles/viewaddvehicles',$data);
		}

		public function view_vehicle_details($id){
			$data['weapon'] = $this->Btalion_model->fetchoneinfo(T_VEHICLE,array('vehicle_master_id' => $id ));
			$this->load->view(F_BTALION.'vehicles/vehiclesdetails',$data);
		}

		public function view_papvehicle(){
			$data['vehicle'] = $this->Btalion_model->fetchinfo('vehicle_issue',array('vehicle_issue_status' => 1 ));
			$this->load->view(F_BTALION.'vehicles/papvehicles',$data);
		}

		public function view_material(){
			$data['material'] = $this->Btalion_model->fetchinfo(T_MATERIAL,array('mat_status' => 1 ));
			$this->load->view(F_BTALION.'material/viewaddmaterial',$data);
		}

		public function view_material_details($id){
			$data['weapon'] = $this->Btalion_model->fetchoneinfo(T_MATERIAL,array('material_master_id' => $id ));
			$this->load->view(F_BTALION.'material/materialdetails',$data);
		}

		public function view_pmaterial(){
			$data['material'] = $this->Btalion_model->fetchinfo('alotp_material',array('pmat_status' => 1 ));
			$this->load->view(F_BTALION.'material/viewpurchased',$data);
		}

		public function view_manpower(){
			$data['manpower'] = $this->Btalion_model->fetchinfo(T_MANMASTER,array('man_status' => 1 ));
			$this->load->view(F_BTALION.'manpower/viewmanpowermaster',$data);
		}

		public function view_manpower_details($id){
			$data['weapon'] = $this->Btalion_model->fetchoneinfo(T_MANMASTER,array('man_master_id' => $id ));
			$this->load->view(F_BTALION.'manpower/mandetails',$data);
		}

		public function add_horse(){
				$this->load->library('form_validation');
				$this->load->helper('security');

				$hname = $this->input->post("hname",TRUE);
				$sex = $this->input->post("sex",TRUE);
				$hnum = $this->input->post("hnum",TRUE);
				$color = $this->input->post("color",TRUE);
				$Height = $this->input->post("Height",TRUE);
				$inch =  $this->input->post("inch",TRUE);
				$breed = $this->input->post("breed",TRUE);
				$BreedOther = $this->input->post("BreedOther",TRUE);
				$hage = $this->input->post("hage",TRUE);
				$hage2 = $this->input->post("hage2",TRUE);
				$nhage = $hage.'-'.$hage2;
				$moa = $this->input->post("moa",TRUE);
				$orderno = $this->input->post("orderno",TRUE);
				$date = $this->input->post("date",TRUE);
				$st = $this->input->post("price",TRUE);
				$wt = $this->input->post("wt",TRUE);
				$hs = $this->input->post("hs",TRUE);
				$Serviceable = $this->input->post("Serviceable",TRUE);
				$nServiceable = $this->input->post("nServiceable",TRUE);
				$lvd = $this->input->post("lvd",TRUE);
				$vb = $this->input->post("vb",TRUE);
				$lhcd = $this->input->post("lhcd",TRUE);
				$hcb = $this->input->post("hcb",TRUE);
				$postingdeatils = $this->input->post("postingdeatils",TRUE);
				
				

				$this->form_validation->set_rules("hname", "hname", "trim|required");
				$this->form_validation->set_rules("sex", "sex", "trim|required");
				$this->form_validation->set_rules("hnum", "Hoof No", "trim|required|is_unique[horse.hoof_no]");
		
			
				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->add_horse($hname,$sex,$hnum,$color,$Height,$inch,$breed,$BreedOther,$nhage,$moa,$orderno,$date,$st,$wt,$hs,$Serviceable,$nServiceable,$lvd,$vb,$lhcd,$hcb,$postingdeatils); 	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Horse has added succesfully !');
						redirect('bt-add-horse');
					}else{
						$this->session->set_flashdata('error_msg','Horse has not added.');
						redirect('bt-add-horse');
					}	
				}
				$data['hoofs'] = $this->Btalion_model->fetchinfo('horse',array('hrse_status' => 1 ));
				$this->load->view(F_BTALION.'horse/addhorse',$data);
		}

		public function edit_horse($id){
				$this->load->library('form_validation');
				$this->load->helper('security');
				$data['hlist'] = $this->Btalion_model->fetchoneinfo('horse',array('horse_id' => $id ));
				$hname = $this->input->post("hname",TRUE);
				$sex = $this->input->post("sex",TRUE);
				$hnum = $this->input->post("hnum",TRUE);
				$color = $this->input->post("color",TRUE);
				$Height = $this->input->post("Height",TRUE);
				$inch =  $this->input->post("inch",TRUE);
				$breed = $this->input->post("breed",TRUE);
				$BreedOther = $this->input->post("BreedOther",TRUE);
				$hage = $this->input->post("hage",TRUE);
				$hage2 = $this->input->post("hage2",TRUE);
				$nhage = $hage.'-'.$hage2;
				$moa = $this->input->post("moa",TRUE);
				$orderno = $this->input->post("orderno",TRUE);
				$date = $this->input->post("date",TRUE);
				$st = $this->input->post("price",TRUE);
				$wt = $this->input->post("wt",TRUE);
				$hs = $this->input->post("hs",TRUE);
				$Serviceable = $this->input->post("Serviceable",TRUE);
				$nServiceable = $this->input->post("nServiceable",TRUE);
				$lvd = $this->input->post("lvd",TRUE);
				$vb = $this->input->post("vb",TRUE);
				$lhcd = $this->input->post("lhcd",TRUE);
				$hcb = $this->input->post("hcb",TRUE);
				$postingdeatils = $this->input->post("postingdeatils",TRUE);
				
				

				$this->form_validation->set_rules("hname", "hname", "trim|required");
				$this->form_validation->set_rules("sex", "sex", "trim|required");
				
		
			
				if ($this->form_validation->run()){
					
					$add_web = $this->Btalion_model->edit_horse($id,$hname,$sex,$hnum,$color,$Height,$inch,$breed,$BreedOther,$nhage,$moa,$orderno,$date,$st,$wt,$hs,$Serviceable,$nServiceable,$lvd,$vb,$lhcd,$hcb,$postingdeatils); 	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Horse has added succesfully !');
						redirect('bt-view-horse');
					}else{
						$this->session->set_flashdata('error_msg','Horse has not added.');
						redirect('bt-view-horse');
					}	
				}
				$data['hoofs'] = $this->Btalion_model->fetchinfo('horse',array('hrse_status' => 1 ));
				$this->load->view(F_BTALION.'horse/edit',$data);
		}

		public function alot_horse(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$hid = $this->input->post("hid",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$hids = $this->input->post("hids",TRUE);
			$pd = $this->input->post("pd",TRUE);
			$ppl = $this->input->post("ppl",TRUE);
			$pon = $this->input->post("pon",TRUE);
			$pod = $this->input->post("pod",TRUE);
			
			$this->form_validation->set_rules("hid", "hid", "trim");
			$this->form_validation->set_rules("tpi", "tpi", "trim");
			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("ito", "ito", "trim");
			$this->form_validation->set_rules("hids", "hids", "trim");
			$this->form_validation->set_rules("pd", "pd", "trim");
			$this->form_validation->set_rules("pon", "pon", "trim");
			$this->form_validation->set_rules("pod", "pod", "trim");
			
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->alot_horse($hid,$tpi,$hn,$ito,$hids,$pd,$ppl,$pon,$pod); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Horse has alloted succesfully !');
					redirect('bt-alot-horse');
				}else{
					$this->session->set_flashdata('error_msg','Info has not alloted.');
					redirect('bt-alot-horse');
				}	
			}
			$data['unamei'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => 32 ));
			//$data['officer'] = $this->Btalion_model->fetchinfo(T_OFFICER,array('of_status' => 1 ));
			$data['horse'] = $this->Btalion_model->fetchinfo('horse',array('hrse_status' => 1 ));
			$this->load->view(F_BTALION.'horse/alothorse',$data);
		}

		public function edit_horses($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['hlist'] = $this->Btalion_model->fetchoneinfo('alot_horse',array('hid' => $id ));
			$hid = $this->input->post("hid",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$hids = $this->input->post("hids",TRUE);
			$pd = $this->input->post("pd",TRUE);
			$ppl = $this->input->post("ppl",TRUE);
			$pon = $this->input->post("pon",TRUE);
			$pod = $this->input->post("pod",TRUE);
			
			$this->form_validation->set_rules("hid", "hid", "trim");
			$this->form_validation->set_rules("tpi", "tpi", "trim");
			$this->form_validation->set_rules("hn", "hn", "trim");
			$this->form_validation->set_rules("ito", "ito", "trim");
			$this->form_validation->set_rules("hids", "hids", "trim");
			$this->form_validation->set_rules("pd", "pd", "trim");
			$this->form_validation->set_rules("pon", "pon", "trim");
			$this->form_validation->set_rules("pod", "pod", "trim");
			
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->edit_allot_horse($id,$hid,$tpi,$hn,$ito,$hids,$pd,$ppl,$pon,$pod); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Horse has alloted succesfully !');
					redirect('bt-view-alot-horse');
				}else{
					$this->session->set_flashdata('error_msg','Info has not alloted.');
					redirect('bt-view-alot-horse');
				}	
			}
			$data['unamei'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$data['horse'] = $this->Btalion_model->fetchinfo('horse',array('hrse_status' => 1 ));
			$this->load->view(F_BTALION.'horse/update',$data);
		}

		public function deposit_horse(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$bdn = $this->input->post("bdn",TRUE);
			$rec = $this->input->post("rec",TRUE);
			$lhcd = $this->input->post("lhcd",TRUE);
			$cw = $this->input->post("cw",TRUE);
			$Serviceable = $this->input->post("Serviceable",TRUE);
			$nServiceable = $this->input->post("nServiceable",TRUE);	
			$remark = $this->input->post("remark",TRUE);

			$this->form_validation->set_rules("bdn", "bdn", "trim|required");
			$this->form_validation->set_rules("rec", "rec", "trim|required");
			$this->form_validation->set_rules("cw", "cw", "trim|required");
			$this->form_validation->set_rules("Serviceable", "Serviceable", "trim");
			$this->form_validation->set_rules("nServiceable", "nServiceable", "trim");
			$this->form_validation->set_rules("lhcd", "lhcd", "trim");
			$this->form_validation->set_rules("remark", "remark", "trim");
			if ($this->form_validation->run()){

				$add_web = $this->Btalion_model->deposit_horse($bdn,$rec,$lhcd,$cw,$Serviceable,$nServiceable,$remark); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Horse has deposited succesfully !');
					redirect('bt-deposit-horse');
				}else{
					$this->session->set_flashdata('error_msg','Horse has not deposited.');
					redirect('bt-deposit-horse');
				}	
			}

			$data['weapon'] = $this->Btalion_model->fetchinfo('old_horse',array('batt_id' => $this->session->userdata('userid'), 'horse_status' => 1 ));
			$this->load->view(F_BTALION.'horse/depositform',$data);
		}

		public function update_horse(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');

			$bdn = $this->input->post("bdn",TRUE);
			$cw = $this->input->post("cw",TRUE);
			$Serviceable = $this->input->post("Serviceable",TRUE);
			$nServiceable = $this->input->post("nServiceable",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$rno = $this->input->post("rno",TRUE);
			$ton = $this->input->post("ton",TRUE);
			$tod = $this->input->post("tod",TRUE);
			$dot = $this->input->post("dot",TRUE);
			$hids = $this->input->post("hids",TRUE);
			$remark = $this->input->post("remark",TRUE);

			$this->form_validation->set_rules("bdn", "bdn", "trim|required");
			$this->form_validation->set_rules("ito", "ito", "trim");
			$this->form_validation->set_rules("cw", "cw", "trim");
			$this->form_validation->set_rules("ton", "ton", "trim");
			$this->form_validation->set_rules("tod", "tod", "trim");
			$this->form_validation->set_rules("dot", "dot", "trim");
			$this->form_validation->set_rules("hids", "hids", "trim");
			$this->form_validation->set_rules("remark", "remark", "trim");
			if ($this->form_validation->run()){

				$add_web = $this->Btalion_model->update_horse($bdn,$cw,$Serviceable,$nServiceable,$ito,$rno,$ton,$tod,$dot,$hids,$remark); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has Updated succesfully !');
					redirect('bt-update-horse');
				}else{
					$this->session->set_flashdata('error_msg','Info has not Updated.');
					redirect('bt-update-horse');
				}	
			}
			$data['weapon'] = $this->Btalion_model->fetchinfo('old_horse',array('batt_id' => $this->session->userdata('userid'), 'horse_status' => 1 ));
			$this->load->view(F_BTALION.'horse/update',$data);
		}

		public function horse_helth(){
				$this->load->library('form_validation');
				$this->load->helper('security');

				$bdn = $this->input->post("bdn",TRUE);
				$rbeltno = $this->input->post("rbeltno",TRUE);
				$contactno = $this->input->post("contactno",TRUE);
				$lhcd = $this->input->post("lhcd",TRUE);
				$ito = $this->input->post("ito",TRUE);
				$cw = $this->input->post("cw",TRUE);
				$remark = $this->input->post("remark",TRUE);
				

				$this->form_validation->set_rules("bdn", "bdn", "trim|required");
				$this->form_validation->set_rules("rbeltno", "rbeltno", "trim|required");
				$this->form_validation->set_rules("contactno", "contactno", "trim");
				$this->form_validation->set_rules("lhcd", "lhcd", "trim");
				$this->form_validation->set_rules("ito", "ito", "trim|required");
				$this->form_validation->set_rules("cw", "cw", "trim|required");
				$this->form_validation->set_rules("remark", "remark", "trim");
				if ($this->form_validation->run()){

					$add_web = $this->Btalion_model->health_horse($bdn,$rbeltno,$contactno,$lhcd,$ito,$cw,$remark); 	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Info has added succesfully !');
						redirect('bt-horse-helth');
					}else{
						$this->session->set_flashdata('error_msg','Info has not added.');
						redirect('bt-horse-helth');
					}	
				}


				$data['weapon'] = $this->Btalion_model->fetchinfo('horse',array('hrse_status' => 1 ));
				$this->load->view(F_BTALION.'horse/healthcheckup',$data);
		}

		public function horse_dein(){
				$this->load->library('form_validation');
				$this->load->helper('security');

				$hid = $this->input->post("hid",TRUE);
				$tpi = $this->input->post("tpi",TRUE);
				$lvd = $this->input->post("lvd",TRUE);
				

				$this->form_validation->set_rules("hid", "hid", "trim|required");
				$this->form_validation->set_rules("tpi", "tpi", "trim|required");
				$this->form_validation->set_rules("lvd", "lvd", "trim|required");
			
				if ($this->form_validation->run()){

					$add_web = $this->Btalion_model->den_horse($hid,$tpi,$lvd); 	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Info has added succesfully !');
						redirect('bt-horse-dein');
					}else{
						$this->session->set_flashdata('error_msg','Info has not added.');
						redirect('bt-horse-dein');
					}	
				}


				$data['horse'] = $this->Btalion_model->fetchinfo('horse',array('hrse_status' => 1 ));
				$this->load->view(F_BTALION.'horse/din',$data);
		}

		public function horse_deinview(){
			$data['horse'] = $this->Btalion_model->joinhorse();
			$this->load->view(F_BTALION.'horse/dhorse',$data);
		}

		public function add_quater(){
				$this->load->library('form_validation');
				$this->load->helper('security');

				$rc = $this->input->post("rc",TRUE);
				$loc = $this->input->post("loc",TRUE);
				$locothers = $this->input->post("locothers",TRUE);
				$rm = $this->input->post("rm",TRUE);
				$ro =  $this->input->post("ro",TRUE);
				$rno =  $this->input->post("rno",TRUE);
				$Condition = $this->input->post("Condition",TRUE);
				$tq = $this->input->post("tq",TRUE);
				$floor = $this->input->post("floor",TRUE);
				$acct = $this->input->post("acct",TRUE);
				$accts = $this->input->post("accts",TRUE);
				$qno = $this->input->post("qno",TRUE);
				$bb = $this->input->post("bb",TRUE);
				$ono = $this->input->post("ono",TRUE);
				$od = $this->input->post("od",TRUE);
				$todp = $this->input->post("todp",TRUE);
				$eono =  $this->input->post("eono",TRUE);

				$this->form_validation->set_rules("rc", "rc", "trim");
								
				if ($this->form_validation->run()){
					$add_web = $this->Btalion_model->add_quater($rc,$loc,$locothers,$rm,$ro,$rno,$Condition,$tq,$floor,$acct,$accts,$qno,$bb,$ono,$od,$todp,$eono); 	
					if($add_web == 1){
						$this->session->set_flashdata('success_msg','Quarter  has added succesfully !');
						redirect('bt-add-quater');
					}else{
						$this->session->set_flashdata('error_msg','Quarter  has not added.');
						redirect('bt-add-quater');
					}	
				}

				$this->load->view(F_BTALION.'quater/addquater');
		}

		public function alot_quater(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$qn = $this->input->post("qn",TRUE);
			$Condition = $this->input->post("Condition",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$posd = $this->input->post("posd",TRUE);
			$bb = $this->input->post("bb",TRUE);
			$alor = $this->input->post("alor",TRUE);
			$alldate = $this->input->post("alldate",TRUE);
			$od = $this->input->post("od",TRUE);

			$Otheradd =  $this->input->post("Otheradd",TRUE);
			$rankss =   $this->input->post("rankss",TRUE); 
			$regt = $this->input->post("regt",TRUE);
			$contactno =  $this->input->post("contactno",TRUE);

			$bbatslist =  $this->input->post("bbatslist",TRUE);
			$statelist =  $this->input->post("statelist",TRUE);
			$otherinfo =  $this->input->post("otherinfo",TRUE);

			
			$this->form_validation->set_rules("qn", "qn", "trim|required");
			$this->form_validation->set_rules("Condition", "Condition", "trim");
			$this->form_validation->set_rules("nop", "nop", "trim");
			$this->form_validation->set_rules("bb", "bb", "trim");
			$this->form_validation->set_rules("alor", "alor", "trim");
			$this->form_validation->set_rules("alldate", "alldate", "trim");
			$this->form_validation->set_rules("od", "od", "trim");

			$data['unamei'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 8 ));
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->alot_quater($qn,$Condition,$nop,$posd,$bb,$alor,$alldate,$od,$Otheradd,$rankss,$regt,$contactno,$bbatslist,$statelist,$otherinfo); 	
				/*if($add_web == 1){*/
					$this->session->set_flashdata('success_msg','Quarter  has alloted succesfully !');
					redirect('bt-alot-quater');
				/*}else{
					$this->session->set_flashdata('error_msg','Quarter has not alloted.');
					redirect('bt-alot-quater');
				}*/	
			}
			$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info2 = $this->Btalion_model->fetchinfo('users',array('pid' => $info->pid));

			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state' => 'PUNJAB' ));

			$ninfo = array();
			foreach ($info2 as $value) {
				if($value->user_log == 8){
					$ninfo[] = $value->users_id;
				}
			}
				//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));
			$data['qu'] = $this->Btalion_model->fetchinfo('newquart',array('allot' => 'In kot', 'bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'quater/alotquarter',$data);
		}
		public function valid_alloted_status($status){
			if(!in_array($status,['Issued'])){
				$this->form_validation->set_message('valid_alloted_status','Invalid Status Selected.Please Select Issued.');
				return false;
			}else{
				//$this->form_validation->set_message('valid_alloted_status','Ivalid Status Selected 1'.$status);
				return true;
			}
		}
		public function alotedit_quater($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			
			$data['uinfo'] = $this->Btalion_model->fetchoneinfo('newquart',array('quart_id' => $id));
			/*if($data['uinfo']->allot!='Issued'){
				//$this->session->set_flashdata('error_msg','Quarter is not alloted Please Allot it First before Editing!');
				//redirect('bt-quaters-oldl');
			}*/
			$Otheradd =  $this->input->post("Otheradd",TRUE);
			$rankss =   $this->input->post("rankss",TRUE); 
			$regt = $this->input->post("regt",TRUE);
			$contactno =  $this->input->post("contactno",TRUE);
			$posd = $this->input->post("posd",TRUE);
			$eono =  $this->input->post("eono",TRUE);
			$Otheraddm = $this->input->post("Otheraddm",TRUE);
			$acct =  $this->input->post("acct",TRUE);
			$accts = $this->input->post("accts",TRUE);
			$tq = $this->input->post("tq",TRUE);

			$bbatslist =  $this->input->post("bbatslist",TRUE);
			$statelist =  $this->input->post("statelist",TRUE);
			$otherinfo =  $this->input->post("otherinfo",TRUE);

			$floor =  $this->input->post("floor",TRUE);
			$alloted =  $this->input->post("alloted",TRUE);
			
			
			$this->form_validation->set_rules("Condition", "Condition", "trim");
			$this->form_validation->set_rules("nop", "nop", "trim");
			$this->form_validation->set_rules("bb", "bb", "trim");
			$this->form_validation->set_rules("alor", "alor", "trim");
			$this->form_validation->set_rules("alldate", "alldate", "trim");
			$this->form_validation->set_rules("od", "od", "trim");
			$this->form_validation->set_rules("alloted", "Alloted", "required|callback_valid_alloted_status");
			//$alloted = 'Issued';
			
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->alotedit_quater($id,$Otheradd,$rankss,$regt,$contactno,$posd,$eono,$Otheraddm,$acct,$accts,$tq,$bbatslist,$statelist,$otherinfo,$floor,$alloted); 	
					$this->session->set_flashdata('success_msg','Quarter  has updated succesfully!');
					redirect('bt-quaters-oldl');
			}
			$info = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			
			$this->load->view(F_BTALION.'quater/editinfo',$data);
		}

		public function update_quater(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$qn = $this->input->post("qn",TRUE);
			$Condition = $this->input->post("Condition",TRUE);
			$ono = $this->input->post("ono",TRUE);
			$coe = $this->input->post("coe",TRUE);
			$cos = $this->input->post("cos",TRUE);
			$cod = $this->input->post("cod",TRUE);
			$cow = $this->input->post("cow",TRUE);
			$cor = $this->input->post("cor",TRUE);
			$cowc = $this->input->post("cowc",TRUE);
			$remark = $this->input->post("remark",TRUE);

			
			
			$this->form_validation->set_rules("qn", "qn", "trim|required");
			$this->form_validation->set_rules("Condition", "Condition", "trim");			
			$this->form_validation->set_rules("cowc", "cowc", "trim");
			$this->form_validation->set_rules("remark", "remark", "trim");
			
			
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->update_quater($qn,$Condition,$ono,$coe,$cos,$cod,$cow,$cor,$cowc,$remark); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Quarter  has updated succesfully !');
					redirect('bt-update-quater');
				}else{
					$this->session->set_flashdata('error_msg','Quarter has not updated.');
					redirect('bt-update-quater');
				}	
			}
			$data['qu'] = $this->Btalion_model->fetchinfo('newquart',array('bat_id' => $this->session->userdata('userid')));
			//$data['officer'] = $this->Btalion_model->fetchinfo(T_OFFICER,array('of_status' => 1 ));
			$this->load->view(F_BTALION.'quater/update',$data);
		}

		public function evo_quater(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$qn = $this->input->post("qn",TRUE);
			$Condition = $this->input->post("Condition",TRUE);
			$ono = $this->input->post("ono",TRUE);
			$od = $this->input->post("od",TRUE);
			$evd = $this->input->post("evd",TRUE);
			$eb = $this->input->post("eb",TRUE);
			$wb = $this->input->post("wb",TRUE);
			$sb = $this->input->post("sb",TRUE);
			$gb = $this->input->post("gb",TRUE);
			$coe = $this->input->post("coe",TRUE);
			$cos = $this->input->post("cos",TRUE);
			$cod = $this->input->post("cod",TRUE);
			$cow = $this->input->post("cow",TRUE);
			$cor = $this->input->post("cor",TRUE);
			$cowc = $this->input->post("cowc",TRUE);
			$eva = $this->input->post("eva",TRUE);
			$remark = $this->input->post("remark",TRUE);

			
			
			$this->form_validation->set_rules("qn", "qn", "trim|required");
			$this->form_validation->set_rules("Condition", "Condition", "trim|required");
			$this->form_validation->set_rules("ono", "ono", "trim|required");
			$this->form_validation->set_rules("od", "od", "trim|required");
			$this->form_validation->set_rules("evd", "evd", "trim|required");
			$this->form_validation->set_rules("eb", "eb", "trim|required");
			$this->form_validation->set_rules("wb", "wb", "trim|required");
			$this->form_validation->set_rules("sb", "sb", "trim|required");
			$this->form_validation->set_rules("gb", "gb", "trim|required");
			$this->form_validation->set_rules("coe", "coe", "trim|required");
			$this->form_validation->set_rules("cos", "cos", "trim|required");
			$this->form_validation->set_rules("cod", "cod", "trim|required");
			$this->form_validation->set_rules("cow", "cow", "trim|required");
			$this->form_validation->set_rules("cor", "cor", "trim|required");
			$this->form_validation->set_rules("cowc", "cowc", "trim|required");
			$this->form_validation->set_rules("eva", "eva", "trim|required");
			$this->form_validation->set_rules("remark", "remark", "trim");
			
			
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->eva_quater($qn,$Condition,$ono,$od,$evd,$eb,$wb,$sb,$gb,$coe,$cos,$cod,$cow,$cor,$cowc,$eva,$remark); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Quarter  has Evacuation succesfully !');
					redirect('bt-evo-quater');
				}else{
					$this->session->set_flashdata('error_msg','Quarter has not Evacuation.');
					redirect('bt-evo-quater');
				}	
			}
			$data['qu'] = $this->Btalion_model->fetchinfo('newquart',array('allot' => 'Issued' , 'bat_id' => $this->session->userdata('userid')));
			//$data['officer'] = $this->Btalion_model->fetchinfo(T_OFFICER,array('of_status' => 1 ));
			$this->load->view(F_BTALION.'quater/evelovator',$data);
		}
	
		public function view_alot_quater(){
			$this->load->helper('common_helper');
			$data['horse'] = $this->Btalion_model->fetchinfo(T_ALOT_QUATER,array('add_qu_satus' => 1 ));
			$this->load->view(F_BTALION.'quater/viewalot',$data);
		}

		public function view_horse(){
			$this->load->helper('common_helper');
			$data['horse'] = $this->Btalion_model->fetchinfo(T_HORSE,array('hrse_status' => 1 ));
			$this->load->view(F_BTALION.'horse/viewaddhorse',$data);
		}

		public function view_alot_horse(){
			$this->load->helper('common_helper');
			$data['horse'] = $this->Btalion_model->fetchinfo(T_HORSE,array('hrse_status' => 1 ));
			$this->load->view(F_BTALION.'horse/viewdepositform',$data);
		}

		public function view_alothorse(){
			
			$this->load->helper('common_helper');
			$data['horse'] = $this->Btalion_model->fetchinfo(T_ALOT_HORSE,array('hrse_status' => 1 ));
			$this->load->view(F_BTALION.'horse/alotviewhorse',$data);
		}

		public function view_paphorse(){
			
			$this->load->helper('common_helper');
			$data['horse'] = $this->Btalion_model->fetchinfo(T_ALOT_HORSE,array('ito' => $this->session->userdata('userid') ));
			$this->load->view(F_BTALION.'horse/paphorse',$data);
		}

		public function view_horse_details($id){
			$data['weapon'] = $this->Btalion_model->fetchoneinfo(T_HORSE,array('horse_id' => $id ));
			$this->load->view(F_BTALION.'horse/horsedetails',$data);
		}

		public function view_deposit_horse(){
			$this->load->helper('common_helper');
			$data['arms'] = $this->Btalion_model->fetchinfo(T_DIP_HORSE,array('deposit_status' => 1));
			$this->load->view(F_BTALION.'horse/viewdepositform',$data);
		}

		public function view_quater(){
			$data['horse'] = $this->Btalion_model->fetchinfo(T_ADD_QUATER,array('add_qu_satus' => 1 ));
			$this->load->view(F_BTALION.'quater/viewaddquator',$data);
		}

		public function view_quate_details($id){
			$data['weapon'] = $this->Btalion_model->fetchoneinfo(T_ADD_QUATER,array('add_quater_id' => $id ));
			$this->load->view(F_BTALION.'quater/quatordetails',$data);
		}

		public function riflealrs(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$data['tow'] = $this->Btalion_model->weaponlist();
			$data['weapon'] = $this->Btalion_model->fetchinfo(T_OLD_WEP,array('bat_id' => $this->session->userdata('myid')));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));

			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$mrec = $this->input->post("mrec",TRUE);
			$issued = $this->input->post("issued",TRUE);
			

			$data["weapon"] = $this->Btalion_model->get_userskhcpap($tpi,$orderno,$rcno,$mrec,$issued);
			$data["counts"] = $this->Btalion_model->get_users_khcpap($tpi,$orderno,$rcno,$mrec,$issued);

			$this->form_validation->set_rules("tpi", "report", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_userskhcpap($tpi,$orderno,$rcno,$mrec,$issued); 

				$data["counts"] = $this->Btalion_model->get_users_khcpap($tpi,$orderno,$rcno,$mrec,$issued);			
			}
			$this->load->view(F_BTALION.'old/viewwep',$data);
		}

		public function serammui(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['weapon'] = $this->Btalion_model->fetchinfo('newamus',array('bat_id' => $this->session->userdata('myid')));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));
			$data['counts'] = $this->Btalion_model->fetchinfo('newamu',array('bat_id' => $this->session->userdata('myid')));
			$this->load->view(F_BTALION.'old/viewserammu',$data);
		}

		public function preammui(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['weapon'] = $this->Btalion_model->fetchinfo('newamu',array('cat' => 'Practice','bat_id' => $this->session->userdata('myid' )));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));
			$this->load->view(F_BTALION.'old/viewammup',$data);
		}

		public function preammuicom(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['weapon'] = $this->Btalion_model->fetchinfo('newamu',array('cat' => 'Practice','bat_id' => 6));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));
			$this->load->view(F_BTALION.'old/viewammup',$data);
		}

		public function horse_olddata(){
			$this->load->helper('common_helper');
			$data['weapon'] = $this->Btalion_model->fetchinfo('old_horse',array('horse_status' => 1 ));
			
			$this->load->view(F_BTALION.'old/viewhorse',$data);
		}

		public function horse_olddatas(){
			$this->load->helper('common_helper');
			$data['weapon'] = $this->Btalion_model->fetchinfo('old_horse',array('horse_status' => 1 ));
			$this->load->view(F_BTALION.'old/allhorse',$data);
		}

		public function vichele_olddata(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common_helper');

			$cov = $this->input->post("cov",TRUE);
			$vc = $this->input->post("vc",TRUE);
			$dob1 = $this->input->post("dob1",TRUE);
			$option = $this->input->post("option",TRUE);
			$vcon = $this->input->post("vcon",TRUE);
			$tpii = $this->input->post("tpii",TRUE);

			$vcn = $this->input->post("vcn",TRUE);
			$bp = $this->input->post("bp",TRUE);

			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			
			$data['weapon'] = $this->Btalion_model->get_cmt($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$this->session->userdata('userid'));
			
			$this->form_validation->set_rules("cov", "cov", "trim");

			if ($this->form_validation->run()){
				$data['weapon'] = $this->Btalion_model->get_cmt($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$this->session->userdata('userid'));
			}
			$this->load->view(F_BTALION.'old/viewvichel',$data);
		}

		public function vichele_viewdata(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			
			$data['weapon'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' => $this->session->userdata('userid') ));
			$this->load->view(F_BTALION.'old/upvich',$data);
		}

		public function vichele_olddatas(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');

			//$data['officer'] = $this->Btalion_model->fetchinfo(T_OFFICER,array('of_status' => 1 ));
			$data['items'] = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => $this->session->userdata('myid')));
			$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$weapon = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => $this->session->userdata('myid')));
			$data['counts'] = '';
			$data['weapon'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' => $this->session->userdata('myid') ));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));
			
			$this->load->view(F_BTALION.'old/allvic',$data);
		}

		public function osi_olddata(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common_helper');

			$mobno = $this->input->get("mobno",TRUE);
			$name = $this->input->get("name",TRUE);
			$bloodgroup = $this->input->get("bloodgroup",TRUE);
			$rcnum = $this->input->get("rcnum",TRUE);
			$RankRankre = $this->input->get("RankRankre",TRUE);
			$eor1 =  $this->input->get("eor1",TRUE);
			$eor2 =  $this->input->get("eor2",TRUE);
			$eor3 =  $this->input->get("eor3",TRUE);
			$eor4 =  $this->input->get("eor4",TRUE);
			$eor5 =  $this->input->get("eor5",TRUE);
			$postate = $this->input->get("postate",TRUE);
			$pcity = $this->input->get("pcity",TRUE);
			$stts = $this->input->get("stts",TRUE);
			$UnderGraduate = $this->input->get("UnderGraduate",TRUE);
			$Graduate = $this->input->get("Graduate",TRUE);
			$PostGraduate = $this->input->get("PostGraduate",TRUE);
			$Doctorate = $this->input->get("Doctorate",TRUE);
			$gender = $this->input->get("gender",TRUE);
			$single =  $this->input->get("single",TRUE);
			$Modemdr = $this->input->get("Modemdr",TRUE);
			$Rankre = $this->input->get("Rankre",TRUE);
			$Enlistmentec = $this->input->get("Enlistmentec",TRUE);
			$InductionModeim = $this->input->get("InductionModeim",TRUE);
			$clit = $this->input->get("clit",TRUE);
			$dateofesnlistment1 = $this->input->get("dateofesnlistment1",TRUE);
			$dateofesnlistment2 =  $this->input->get("dateofesnlistment2",TRUE);
			$NamesofsCourses =  $this->input->get("NamesofsCourses1",TRUE);
			$NamesofsCourses2 =  $this->input->get("NamesofsCourses2",TRUE);
			$DateofRetirementdor = $this->input->get("DateofRetirementdor",TRUE);
			$dateofbirth = $this->input->get("dateofbirth",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$height = $this->input->get("height",TRUE);
			$inch = $this->input->get("inch",TRUE);
			$Postingtiset = $this->input->get("Postingtiset",TRUE);
			$Postingtiset2 = $this->input->get("Postingtiset2",TRUE);
			$Postingtiset3 = $this->input->get("Postingtiset3",TRUE);
			$Postingtiset4 = $this->input->get("Postingtiset4",TRUE);
			$Postingtiset5 = $this->input->get("Postingtiset5",TRUE);
			$Postingtiset6 = $this->input->get("Postingtiset6",TRUE);
			$Postingtiset7 = $this->input->get("Postingtiset7",TRUE);
			$Postingtiset8 = $this->input->get("Postingtiset8",TRUE);
			$Postingtiset9 = $this->input->get("Postingtiset9",TRUE);
			$p = '';

			
			
			$weapon = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$this->session->userdata('userid'),$mobno);
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));

			$config = array();
			$config["base_url"] = base_url() . "bt-osi-old";
			$config["total_rows"] = $weapon;
			$config["per_page"] = 100;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
			$start = ($page-1)*$config["per_page"];
			//echo $start; die();
			//print_r($data["links"]); die();

		
			
			$data["weapon"] = $this->Btalion_model->get_usersosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$config["per_page"],$start,$this->session->userdata('userid'),$mobno);

			$data["counts"] = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$this->session->userdata('userid'),$mobno);
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));

				$data['nm'] = $NamesofsCourses.$NamesofsCourses2;
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$config["per_page"],$start,$this->session->userdata('userid'));
				$data["counts"] = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$this->session->userdata('userid'));
				$data['nm'] = $NamesofsCourses.$NamesofsCourses2;	
			}
			
			$this->load->view(F_BTALION.'old/viewmanpower',$data);
		}

		public function osi_tempost(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$nop = $this->input->post("nop",TRUE);
			$acco = $this->input->post("acco",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$odate = $this->input->post("odate",TRUE);
			$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1));	
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				$info = $this->Btalion_model->tempposting($nop,$acco,$idate,$odate);
				if($info == 1){
						$this->session->set_flashdata('success_msg','Temporary Posting has added succesfully !');
						redirect('bt-osi-tempost');
					}else{
						$this->session->set_flashdata('error_msg','Temporary Posting has not added.');
						redirect('bt-osi-tempost');
					}	
			}		
			$this->load->view(F_BTALION.'manpower/temppost',$data);
		}

		public function osi_tempostview(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['body'] = $this->Btalion_model->tempview();		
			$this->load->view(F_BTALION.'manpower/templistview',$data);
		}

		public function osi_dep(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common_helper');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$weapon = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => $this->session->userdata('userid')));
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));

			$config = array();
			$config["base_url"] = base_url() . "bt-osi-dep";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 1000;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


		    $bloodgroup = $this->input->post("bloodgroup",TRUE);
			$rcnum = $this->input->post("rcnum",TRUE);
			$RankRankre = $this->input->post("RankRankre",TRUE);
			$iIdentityCardNocn = $this->input->post("iIdentityCardNocn",TRUE);
			$postate = $this->input->post("postate",TRUE);
			$pcity = $this->input->post("pcity",TRUE);
			$stts = $this->input->post("stts",TRUE);
			$name =  $this->input->post("name",TRUE);
			$gender = $this->input->post("gender",TRUE);
			$single =  $this->input->post("single",TRUE);
			$Modemdr = $this->input->post("Modemdr",TRUE);
			$Rankre = $this->input->post("Rankre",TRUE);
			$Enlistmentec = $this->input->post("Enlistmentec",TRUE);
			$InductionModeim = $this->input->post("InductionModeim",TRUE);
			$InductionModeim = $this->input->post("ito",TRUE);
			
			$data["weapon"] = $this->Btalion_model->get_usersosi($bloodgroup,$rcnum,$RankRankre,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$config["per_page"],$page,$this->session->userdata('userid'));
			$data["counts"] = $this->Btalion_model->get_users_countosi($bloodgroup,$rcnum,$RankRankre,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$this->session->userdata('userid'));

			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersosi($bloodgroup,$rcnum,$RankRankre,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$config["per_page"],$page,$this->session->userdata('userid'));
			$data["counts"] = $this->Btalion_model->get_users_countosi($bloodgroup,$rcnum,$RankRankre,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$this->session->userdata('userid'));	
			}
			
			$this->load->view(F_BTALION.'old/viewdep',$data);
		}

		public function osi_olddatas(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common_helper');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$weapon = $this->Btalion_model->fetchinfo('newosi',array('bat_id' => $this->session->userdata('myid')));
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));

			$config = array();
			$config["base_url"] = base_url() . "bt-osi-olds";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 100;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


			$bloodgroup = $this->input->post("bloodgroup",TRUE);
			$rcnum = $this->input->post("rcnum",TRUE);
			$RankRankre = $this->input->post("RankRankre",TRUE);
			$eor1 =  $this->input->post("eor1",TRUE);
			$eor2 =  $this->input->post("eor2",TRUE);
			$eor3 =  $this->input->post("eor3",TRUE);
			$eor4 =  $this->input->post("eor4",TRUE);
			$eor5 =  $this->input->post("eor5",TRUE);
			$iIdentityCardNocn = $this->input->post("iIdentityCardNocn",TRUE);
			$postate = $this->input->post("postate",TRUE);
			$pcity = $this->input->post("pcity",TRUE);
			$stts = $this->input->post("stts",TRUE);
			$name =  $this->input->post("name",TRUE);
			$gender = $this->input->post("gender",TRUE);
			$single =  $this->input->post("single",TRUE);
			$Modemdr = $this->input->post("Modemdr",TRUE);
			$Rankre = $this->input->post("Rankre",TRUE);
			$Enlistmentec = $this->input->post("Enlistmentec",TRUE);
			$InductionModeim = $this->input->post("InductionModeim",TRUE);
			$InductionModeim = $this->input->post("ito",TRUE);
			
			$data["weapon"] = $this->Btalion_model->get_usersosi($bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$config["per_page"],$page,$this->session->userdata('myid'));
			$data["counts"] = $this->Btalion_model->get_users_countosi($bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$this->session->userdata('myid'));

			$this->form_validation->set_rules("bloodgroup", "bloodgroup", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersosi($bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$config["per_page"],$page,$this->session->userdata('myid'));
			$data["counts"] = $this->Btalion_model->get_users_countosi($bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$iIdentityCardNocn,$postate,$pcity,$stts,$name,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$this->session->userdata('myid'));	
			}


			$this->load->view(F_BTALION.'old/allsosi',$data);
		}

		public function quaters_olddatal(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			/*$data['weapon'] = $this->Btalion_model->fetchinfo('newquart',array('bat_id' => $this->session->userdata('userid')));*/
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));

			$tq = $this->input->post("tq",TRUE);
			$floor =  $this->input->post("floor",TRUE);
			$Condition = $this->input->post("Condition",TRUE);
			$accts = $this->input->post("accts",TRUE);

			$data['weapon'] = $this->Btalion_model->viwq($tq,$floor,$Condition,$accts);
			$this->form_validation->set_rules("nrp", "nrp", "trim");
			if ($this->form_validation->run()){
				$data['weapon'] = $this->Btalion_model->viwq($tq,$floor,$Condition,$accts);
			}
			$this->load->view(F_BTALION.'old/viewquater',$data);
		}

		public function quaters_fullview($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			/*$data['weapon'] = $this->Btalion_model->fetchinfo('newquart',array('bat_id' => $this->session->userdata('userid')));*/

			$data['weapon'] = $this->Btalion_model->fetchinfo('uquartinfo',array('qid' => $id));
			$this->load->view(F_BTALION.'old/fullviewqtr',$data);
		}

		public function add_repair_info($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$nrp = $this->input->post("nrp",TRUE);
			$orp =  $this->input->post("orp",TRUE);
			$trp = $this->input->post("trp",TRUE);
			$rdetails = $this->input->post("rdetails",TRUE);
			$rdate = $this->input->post("rdate",TRUE);

			$this->form_validation->set_rules("nrp", "nrp", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->epair_quater($id,$nrp,$orp,$trp,$rdetails,$rdate);	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Repair info added succesfully !');
					redirect('bt-repairinfo/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Repair info  has not added.');
					redirect('bt-repairinfo/'.$id);
				}
			}
			$this->load->view(F_BTALION.'quater/rpair');
		}

		public function rpair_view($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['qtr'] = $this->Btalion_model->fetchinfo('repair_quater',array('quart_id' => $id, 'bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'quater/viewrepair',$data);
		}

		public function edit_repair_info($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$nrp = $this->input->post("nrp",TRUE);
			$orp =  $this->input->post("orp",TRUE);
			$trp = $this->input->post("trp",TRUE);
			$rdetails = $this->input->post("rdetails",TRUE);
			$rdate = $this->input->post("rdate",TRUE);

			$data['qtr'] = $this->Btalion_model->fetchoneinfo('repair_quater',array('repair_quater_id' => $id, 'bat_id' => $this->session->userdata('userid')));

			$this->form_validation->set_rules("nrp", "nrp", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->edit_epair_quater($id,$nrp,$orp,$trp,$rdetails,$rdate);	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Repair info added succesfully !');
					redirect('bt-rpair-edit/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Repair info  has not added.');
					redirect('bt-rpair-edit/'.$id);
				}
			}
			$this->load->view(F_BTALION.'quater/editrepair',$data);
		}

		public function quaters_cso(){
			$this->load->helper('common');
			$data['weapon'] = $this->Btalion_model->fetchinfo('newquart',array('bat_id' => $this->session->userdata('myid')));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'old/viewquater',$data);
		}

		public function quaters_olddata(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['weapon'] = $this->Btalion_model->fetchinfo('newquart',array('bat_id' => $this->session->userdata('myid')));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));

			$tpi = $this->input->post("orderno",TRUE);
			$orderno = $this->input->post("rcno",TRUE);
			$rcno = $this->input->post("mrec",TRUE);
			

			$data["weapon"] = $this->Btalion_model->get_usersqtrallpap($tpi,$orderno,$rcno);
			$data["counts"] = $this->Btalion_model->get_users_countqtrallpap($tpi,$orderno,$rcno);

			$this->form_validation->set_rules("tpi", "report", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersqtrallpap($tpi,$orderno,$rcno); 

				$data["counts"] = $this->Btalion_model->get_users_countqtrallpap($tpi,$orderno,$rcno);		
			}
			 $data['links'] = '';
			$this->load->view(F_BTALION.'old/allquater',$data);
		}

		public function cso_data(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 7 ));
			
			$data['items'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$weapon = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => 68));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => 68));
			
			$config = array();
			$config["base_url"] = base_url() . "bt-msk-old";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


			$toi = $this->input->post("toi",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$option = $this->input->post("option",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$rcnum = $this->input->post("rcnum",TRUE);
			$fname = $this->input->post("fname",TRUE);
			$gfund = $this->input->post("gfund",TRUE);
			$ofname = $this->input->post("ofname",TRUE);
			$run = $this->input->post("run",TRUE);
			$billno = $this->input->post("billno",TRUE);
			$paysta = $this->input->post("paysta",TRUE);
			$issumemode = $this->input->post("issumemode",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$obito = $this->input->post("obito",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$issuercnum = $this->input->post("issuercnum",TRUE);
			$ircd = $this->input->post("ircd",TRUE);

			$id = $this->input->post("id",TRUE);
			$mod = $this->input->post("mod",TRUE);
			$drbircn = $this->input->post("drbircn",TRUE);
			$ircdi = $this->input->post("ircdi",TRUE);
			$idi = $this->input->post("idi",TRUE);
			$ircd = $this->input->post("ircd",TRUE);
			$report =  $this->input->post("report",TRUE);

			$data["weapon"] = $this->Btalion_model->get_users($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$ircdi,$idi,$ircd,$report,$config["per_page"],$page,68);
			

			$this->form_validation->set_rules("report", "report", "trim|required");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_users($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$ircdi,$idi,$ircd,$report,$config["per_page"],$page,68); 
			}

			$this->load->view(F_BTALION.'old/allmaterial',$data);
		}

		public function msk_olddatas(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			//$data['officer'] = $this->Btalion_model->fetchinfo(T_OFFICER,array('of_status' => 1 ));
			$data['items'] = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => $this->session->userdata('myid')));
			$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$weapon = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => $this->session->userdata('myid')));
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('myid')));
			
			$config = array();
			$config["base_url"] = base_url() . "bt-msk-old";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();


			$toi = $this->input->post("toi",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$option = $this->input->post("option",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$rcnum = $this->input->post("rcnum",TRUE);
			$fname = $this->input->post("fname",TRUE);
			$gfund = $this->input->post("gfund",TRUE);
			$ofname = $this->input->post("ofname",TRUE);
			$run = $this->input->post("run",TRUE);
			$billno = $this->input->post("billno",TRUE);
			$paysta = $this->input->post("paysta",TRUE);
			$issumemode = $this->input->post("issumemode",TRUE);
			$nop = $this->input->post("nop",TRUE);
			$hn = $this->input->post("hn",TRUE);
			$obito = $this->input->post("obito",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$issuercnum = $this->input->post("issuercnum",TRUE);
			$ircd = $this->input->post("ircd",TRUE);

			$id = $this->input->post("id",TRUE);
			$mod = $this->input->post("mod",TRUE);
			$drbircn = $this->input->post("drbircn",TRUE);
			$ircdi = $this->input->post("ircdi",TRUE);
			$idi = $this->input->post("idi",TRUE);
			$ircd = $this->input->post("ircd",TRUE);
			$report =  $this->input->post("report",TRUE);

			$data["weapon"] = $this->Btalion_model->get_users($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$ircdi,$idi,$ircd,$report,$config["per_page"],$page,$this->session->userdata('myid'));
			$data["counts"] = $this->Btalion_model->get_users_count($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$ircdi,$idi,$ircd,$report,$this->session->userdata('myid'));

			$this->form_validation->set_rules("report", "report", "trim|required");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_users($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$ircdi,$idi,$ircd,$report,$config["per_page"],$page,$this->session->userdata('myid')); 

				$data["counts"] = $this->Btalion_model->get_users_count($toi,$nameofitem,$cti,$option,$Receivedfrom,$rcnum,$fname,$gfund,$ofname,$run,$billno,$paysta,$issumemode,$nop,$hn,$obito,$ito,$issuercnum,$ircd,$id,$mod,$drbircn,$ircdi,$idi,$ircd,$report,$this->session->userdata('myid'));	
				
					
			}

			$this->load->view(F_BTALION.'old/allmaterial',$data);

		}

		public function st_aj(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("state",TRUE);
			
			$this->form_validation->set_rules("state", "state", "trim|required");

			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->fetchinfo('state_list',array('state' => $bodyno ));	
		
			echo '<div class="form-group">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9"><select name="dis"  id="dis" data-placeholder="Ammunition bore" title="Please select at least 1 value" class="form-control">';
			foreach ($wep as $value) {
				echo "<option value='".$value->city."'>".$value->city."</option>";
			}
			echo "</select></div></div><br/>";
			}
		}

		public function sti_aj(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("postate",TRUE);
			
			$this->form_validation->set_rules("postate", "postate", "trim");

			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->fetchinfo('state_list',array('state' => $bodyno ));	
		
			echo '<div class="form-group">
                  <label class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9"><select name="pdistrict"  id="pdistrict" data-placeholder="Ammunition bore" title="Please select at least 1 value" class="form-control">';
			foreach ($wep as $value) {
				echo "<option value='".$value->city."'>".$value->city."</option>";
			}
			echo "</select></div></div><br/>";
			}
		}


		public function sti_list(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->model('MTVehicle_model');

			$cmonth = $this->input->post("cmonth",TRUE);
			$cyear = $this->input->post("cyear",TRUE);
			$rnumid = $this->input->post("rnumid",TRUE);
			//$this->form_validation->set_rules("cmonth", "cmonth", "trim");

			$oldyear = date("Y",strtotime("-1 year"));
			$cyal = date("Y");
			$olddate = date('m', strtotime('last month'));

			//if ($this->form_validation->run()){
                        if(!$this->MTVehicle_model->isCurrentYearPolUpdateExists($cyear,$this->session->userdata('userid'))){
                            $wep = $this->Btalion_model->fetchinfoorder('pol_return',array('rnum' => $rnumid,'cyear <= ' => $cyear,'bat_id'=>$this->session->userdata('userid')),'cyear DESC,cmonth DESC ','');
                            //echo 'hi';
							//var_dump($wep);
							//echo "<hr>";
                        }else{
                            $wep = $this->Btalion_model->fetchinfoorder('pol_return',array('rnum' => $rnumid,'cmonth <=' => $cmonth,'cyear <= ' => $cyear,'bat_id'=>$this->session->userdata('userid')),'cyear DESC,cmonth DESC','');
                            //echo 'hi123';
                        }
                        //die;
/*			if($cmonth == '01' && $cyear == $cyal){
				$wep = $this->Btalion_model->fetchinfoorder('pol_return',array('rnum' => $rnumid,'cmonth <=' => $cmonth,'cyear <= ' => $cyear),'cyear DESC,cmonth DESC','');
			}else{
				$wep = $this->Btalion_model->fetchinfoorder('pol_return',array('rnum' => $rnumid,'cyear <= ' => $cyear),'cyear DESC,cmonth DESC','');
                        }*/
                        //$wep = $this->Btalion_model->fetchinfoorder('pol_return',array('rnum' => $rnumid,'cmonth <=' => $cmonth,'cyear <= ' => $cyear),'cyear DESC,cmonth DESC','');
			
				$a1 = '';
				$b1 = '';
				$c1 = '';
				$d1 = '';
				$e1 = '';
                                $status = true;
                                $message = '';
				if($wep !=''){
					$a1 .= $wep->tkm;
					$b1 .= $wep->tpol;
					$c1 .= $wep->polex;
					$d1 .= $wep->tkm + $wep->mkm;
					$e1 .= $wep->tpol + $wep->mpol;
										
                                        if($wep->cyear==$cyear){
                                            if($wep->cmonth==$cmonth ){
                                                //die('hello');
                                                $message = 'This  month POL Already Exists';
                                                $status = false;
                                            }elseif($wep->cmonth!=$cmonth-1){
                                               $message = 'Please Enter the last Month POL';
                                                $status = false; 
                                            }
                                        }else{
											if($wep->cyear==$cyear-1){
												if($cmonth==1){
													if($wep->cmonth!=12){
														$message = 'Please Enter the last Month POL';
														$status = false; 
													}else{
														$message = 'You can enter this month pol';
                                            			$status = true; 
													}
												}else{
													$message = 'Please Enter the last Month POL';
													$status = false; 
												}
											}else{
												$message = 'Please Enter the last Month POL';
												$status = false; 
											}
                                            //$message = 'You can enter this month pol dsfg';
                                            //$status = true; 
                                        }
                                        
				}
				
                                echo json_encode(['wep'=>$wep,'status'=>$status,'message'=>$message]);
                                die;
				if($cmonth == '' && $cyear == $oldyear || $a1 == ''){
					echo '<div class="form-group">
                  <label class="col-sm-3 control-label">Till last  Month KM/Hours </label>
                  <div class="col-sm-9">
<input name="mkmo" value="'.$a1.'" id="mkmo" class="form-control" placeholder="Month KM" type="text">
                    <label for="mkmo" class="error"></label>
                  </div>
                </div>';
				}else{
					echo '<div class="form-group">
                  <label class="col-sm-3 control-label">Till last  Month KM/Hours </label>
                  <div class="col-sm-9">
<input name="mkmo" value="'.$a1.'" id="mkmo" class="form-control" placeholder="Month KM" readonly="readonly" type="text">
                    <label for="mkmo" class="error"></label>
                  </div>
                </div>';
				}
				echo'

                <div class="form-group">
                  <label class="col-sm-3 control-label">Current Month KM/Hours </label>
                  <div class="col-sm-9">
<input name="mkm" value="" id="mkm" class="form-control" type="text" required>
                    <label for="mkm" class="error"></label>
                  </div>
                </div>';

                if($cmonth == '' && $cyear == $oldyear || $b1 == ''){

                echo'<div class="form-group">
                  <label class="col-sm-3 control-label">Till last Month POL </label>
                  <div class="col-sm-9">
<input name="mpolo" value="" id="mpolo" class="form-control" placeholder="Month POL" type="text">
                    <label for="mpolo" class="error"></label>
                  </div>
                </div>';
            }else{
            		 echo'<div class="form-group">
                  <label class="col-sm-3 control-label">Till last Month POL </label>
                  <div class="col-sm-9">
<input name="mpolo" value="'.$b1.'" id="mpolo" class="form-control" placeholder="Month POL" readonly="readonly" type="text">
                    <label for="mpolo" class="error"></label>
                  </div>
                </div>';
            }

                echo'<div class="form-group">
                  <label class="col-sm-3 control-label"> Current Month POL </label>
                  <div class="col-sm-9">
<input name="mpol" value="" id="mpol" class="form-control" type="text" required>
                    <label for="mpol" class="error"></label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Current Month pol exp</label>
                  <div class="col-sm-9">
<input name="polex" value="'.$c1.'" id="polex" class="form-control" placeholder="POL EXP" type="text" required>
                    <label for="polex" class="error"></label>
                  </div>
                </div>';

                echo'<div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Total KM/Hours </label>
                  <div class="col-sm-9">
<input name="tkm" value="'.$d1.'" id="tkm" class="form-control" placeholder="Total KM" readonly="readonly" type="text">
                    <label for="tkm" class="error"></label>
                  </div>
                </div>


                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Total POL </label>
                  <div class="col-sm-9">
<input name="tpol" value="'.$e1.'" id="tpol" class="form-control" placeholder="Total POL" readonly="readonly" type="text">
                    <label for="tpol" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Till last month Repair</label>
                  <div class="col-sm-9">
<input name="repairo" value="0" id="repairo" class="form-control" placeholder="Repair." type="text">
                    <label for="repairo" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Current month Repair</label>
                  <div class="col-sm-9">
<input name="repair" value="" id="repair" class="form-control" type="text">
                    <label for="repair" class="error"></label>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-3 control-label">Total Repair</label>
                  <div class="col-sm-9">
<input name="trepair" value="0" id="trepair" class="form-control" placeholder="Total Repair." type="text">
                    <label for="trepair" class="error"></label>
                  </div>
                </div>';
			
			//}
		}

		public function st_ajfilter(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("state",TRUE);
			
			$this->form_validation->set_rules("state", "state", "trim|required");

			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->fetchinfo('state_list',array('state' => $bodyno ));	
		
			echo '<div class="col-sm-3"><div class="form-group"><select name="pcity"  id="dis" data-placeholder="Ammunition bore" title="Please select at least 1 value" class="form-control">';
			echo "<option value=''>--Select--</option>";
			foreach ($wep as $value) {
				echo "<option value='".$value->city."'>".$value->city."</option>";
			}
			echo "</select></div></div>";
			}
		}

		public function helpdesk(){
			$this->load->view(F_BTALION.'helpdesk');
		}
		public function msk_aj(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("ic",TRUE);
			
			$this->form_validation->set_rules("ic", "ic", "trim");

			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->fetchinfo('newmsk',array('typeofitem' => $bodyno,'bat_id' => $this->session->userdata('userid')));	
		
			echo '<div class="form-group">
                  <label class="col-sm-3 control-label">Type of Item</label>
                  <div class="col-sm-9"><select name="tpi"  id="tpi" data-placeholder="Ammunition bore" title="Please select at least 1 value" class="form-control">';
			foreach ($wep as $value) {
				if ($value->recqut == 0) {
					# code...
				}else{
					echo "<option value='".$value->nameofitem."'>".$value->nameofitem."</option>";
				}
				
			}
			echo "</select></div></div><br/>";
			}
		}

		public function msk_ajss(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$bodyno = $this->input->post("ic",TRUE);	
			$this->form_validation->set_rules("ic", "ic", "trim");
			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->fetchinfomsk('mskitems',array('item' => $bodyno ));	
		
                  echo "<option value=''>--Select--</option>";
			foreach ($wep as $value) {
				echo "<option value='".$value->name."'>".$value->name."</option>";
			}
			}
		}
		/**
		*	developer dalwinder
		*/
		public function msk_ajss2(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$bodyno = $this->input->post("ic",TRUE);	
			$this->form_validation->set_rules("ic", "ic", "trim");
			if ($this->form_validation->run()){
				$wep = $this->Btalion_model->fetchinfomsk('mskitems',array('item' => $bodyno ));	
				$items = array();
                //echo "<option value=''>--Select--</option>";
				foreach ($wep as $value) {
					$items[$value->name] = $value->name;
					//echo "<option value='".$value->name."'>".$value->name."</option>";
				}
			}
			echo  json_encode($items);
		}
		/**
		*	developer dalwinder
		*/
		public function msk_ajss3($toi){
			$this->load->library('form_validation');
			$this->load->helper('security');
			
			$wep = $this->Btalion_model->fetchinfomsk('mskitems',array('item' => $toi));	
			$items = array();
			//echo "<option value=''>--Select--</option>";
			foreach ($wep as $value) {
				$items[$value->name] = $value->name;
				//echo "<option value='".$value->name."'>".$value->name."</option>";
			}
			return $items;
		}
		/**
		*	developer dalwinder
		*/
		public function getMskItemNames($toi){
			$this->load->library('form_validation');
			$this->load->helper('security');
			
			$wep = $this->Btalion_model->fetchinfomsk('mskitems',array('item' => $toi));	
			$items = array();
			//echo "<option value=''>--Select--</option>";
			foreach ($wep as $value) {
				$items[$value->name] = $value->name;
				//echo "<option value='".$value->name."'>".$value->name."</option>";
			}
			return $items;
		}
		public function msk_ajssfilter(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$bodyno = $this->input->post("ic",TRUE);	
			$this->form_validation->set_rules("ic", "ic", "trim");
			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->fetchinfomsk('mskitems',array('item' => $bodyno ));	
			echo "<option value=''>--Name of Item</option>";
			foreach ($wep as $value) {
				echo "<option value='".$value->name."'>".$value->name."</option>";
			}
			
			}
		}

		public function msk_ajlist(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$bodyno = $this->input->post("ici",TRUE);
			$this->form_validation->set_rules("ici", "ici", "trim");
			if ($this->form_validation->run()){
			$wep = $this->Btalion_model->fetchinfomsk('newmsk',array('nameofitem' => $bodyno,'bat_id' => $this->session->userdata('userid')));	
			foreach ($wep as $value) {
				if($value->recqut == 0){
				}else{
						echo '<div class="form-group">
                  <label class="col-sm-3 control-label">Item Info </label>
                  <div class="col-sm-3"> RC NO:'.$value->rc_number.' &nbsp; &nbsp; Quantity:'.$value->recqut.'</div>';
			echo'<div class="col-sm-3"> <input type="hidden" name="hqunt[]" value="'.$value->msk_id.'" />  <input type="text" name="qunt[]" /> </div>';
			echo "</div><br/>";
				}
		
			}
		   }
		}

		public function impoertkhc(){
			$data['weapon'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'import/khc',$data);
		}


		public function impoertmsk(){
			$data['weapon'] = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'import/msk',$data);
		}

		public function impoertosi(){
			$this->load->helper('common');
			$data['weapon'] = $this->Btalion_model->get_osiexport($this->session->userdata('userid'));
			//print_r($data['weapon']);
			$this->load->view(F_BTALION.'import/osi',$data);
		}

		public function impoertosiss(){
			$this->load->helper('common');
			$data['weapon'] = $this->Btalion_model->get_osiexportnow($this->session->userdata('userid'));
			//print_r($data['weapon']);
			$this->load->view(F_BTALION.'import/osi2',$data);
		}

		public function impoertmt(){
			$data['weapon'] = $this->Btalion_model->fetchinfo('newmt',array('bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'import/mt',$data);
		}

		public function impoertqt(){
			$data['weapon'] = $this->Btalion_model->fetchinfo('newquart',array('bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'import/qt',$data);
		}

		public function password(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$bdn = $this->input->post("bdn",TRUE);
			$pass = $this->input->post("pass",TRUE);
			$pass2 = $this->input->post("pass2",TRUE);
			$this->form_validation->set_rules("bdn", "bdn", "trim");
			if ($this->form_validation->run()){
				/*75*/
			  if($pass == $pass2){
			  	if($this->session->userdata('user_log')== 101){
			  	$info =  $this->Btalion_model->passreset($bdn,$pass);
			  }else{
			  	$info =  $this->Btalion_model->passreset($this->session->userdata('userid'),$pass);
			  }
			  	if($info == 1){
					$this->session->set_flashdata('success_msg','Password reset succesfully !');
					redirect('bt-password');
				}else{
					$this->session->set_flashdata('error_msg','Password Mismatch ');
					redirect('bt-password');
				}
			  	
			  }else{
					$this->session->set_flashdata('error_msg','Password Mismatch ');
					redirect('bt-password');
				}

			 }
			$data['weapon'] = $this->Btalion_model->fetchinfo('users',array('user_status' => 1));
			$this->load->view(F_BTALION.'password',$data);
		}

		public function special_unit(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$ito3 = $this->input->post("BattalionUnitito",TRUE);
			$ito4 = $this->input->post("ito",TRUE);
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  if($ito3 == 92){
			  	$data=array('myid' => 92);
				$this->session->set_userdata($data);
			  	redirect('bt-osi-olds');
			  }if($ito3 == 94){
			  	$data=array('myid' => 94);
				$this->session->set_userdata($data);
			  	redirect('bt-osi-olds');
			  }elseif ($ito3 == 91) {
			  	$data=array('myid' => 91);
				$this->session->set_userdata($data);
				redirect('bt-osi-olds');
			  }/*elseif ($ito3 == 93) {
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 93);
				$this->session->set_userdata($data);
			  	redirect('bt-osi-olds');
			  }*/elseif ($ito3 == 95) {
			  	$data=array('myid' => 95);
				$this->session->set_userdata($data);
			  	redirect('bt-osi-olds');
			  }

			  if ($ito4 == 93) {
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 93);
				$this->session->set_userdata($data);
			  	redirect('bt-osi-olds');
			  }elseif($ito4 == 68){
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 68);
				$this->session->set_userdata($data);
			  	redirect('bt-cso-all');
			  }elseif($ito4 == 89){
			  	$this->session->unset_userdata('myid');
			  	$data=array('myid' => 89);
				$this->session->set_userdata($data);
			  	redirect('bt-cso-qtr');
			  }


			}
			$this->load->view(F_BTALION.'specialunits');
		}

		public function irb(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			//$data['weapon'] = $this->Btalion_model->fetchinfo('users',array('user_status' => 1));
			$this->load->view(F_BTALION.'irb');
		}

		public function allirb(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			//$data['weapon'] = $this->Btalion_model->fetchinfo('users',array('user_status' => 1));
			$this->load->view(F_BTALION.'allirb');
		}

		public function cdo(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			//$data['weapon'] = $this->Btalion_model->fetchinfo('users',array('user_status' => 1));
			$this->load->view(F_BTALION.'cdo');
		}

		public function allcdo(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			//$data['weapon'] = $this->Btalion_model->fetchinfo('users',array('user_status' => 1));
			$this->load->view(F_BTALION.'allcdo');
		}

		public function allquantityreports(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];
			$data['msk'] = $this->Btalion_model->msklist($ninfo[0]);	


			$ninfo2 = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo2[] = $value->users_id;
				}
			}
			$data['ninfo2'] = $ninfo2[0];
			$data['arm'] = $this->Btalion_model->armlist($ninfo2[0]);

			$ninfo3 = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo3[] = $value->users_id;
				}
			}
			$data['ninfo3'] = $ninfo3[0];
			$data['osi'] = $this->Btalion_model->osilist($ninfo3[0]);

			$ninfo4 = array();
			foreach ($info as $value) {
				if($value->user_log == 8){
					$ninfo4[] = $value->users_id;
				}
			}
			$data['ninfo4'] = $ninfo4[0];
			$data['qtr'] = $this->Btalion_model->qtrlist($ninfo4[0]);

			$ninfo5 = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo5[] = $value->users_id;
				}
			}
			$data['ninfo5'] = $ninfo5[0];
			$data['mto'] = $this->Btalion_model->mtolist($ninfo5[0]);


			$data['mount'] = $this->Btalion_model->mountlist();
			$this->load->view(F_BTALION.'quantityreport',$data);
		}

		public function mskreportone(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];
			$data['msk'] = $this->Btalion_model->msklist($ninfo[0]);
			$this->load->view(F_BTALION.'material/mskfirst',$data);
		}

		public function armreportone(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];
			$data['msk'] = $this->Btalion_model->armlist($ninfo[0]);
			$this->load->view(F_BTALION.'arms/armfirst',$data);
		}

		public function osireportone(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}
			
			$data['msk'] = $this->Btalion_model->osilist($data['ninfo']);
			$this->load->view(F_BTALION.'manpower/test',$data);
		}


		public function osireportones(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			/*$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];*/
			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			$this->load->view(F_BTALION.'manpower/osiside',$data);
		}

			public function osireportdep(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			/*$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];*/
			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			$this->load->view(F_BTALION.'reports/osidep',$data);
		}

		public function osireportlist(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $this->session->userdata('userid');
			}
			$data['msk'] = $this->Btalion_model->osilist($data['ninfo']);
			$this->load->view(F_BTALION.'manpower/sumsec',$data);
		}

		public function qtrreportone(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 8){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];
			$data['msk'] = $this->Btalion_model->qtrlist($ninfo[0]);
			$this->load->view(F_BTALION.'quater/quaterfirst',$data);
		}

		public function mtoreportone(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];
			$data['msk'] = $this->Btalion_model->mtolist($ninfo[0]);
			$this->load->view(F_BTALION.'vehicles/mtofirst',$data);
		}

		public function mountlist(){
			$this->load->helper('common');
			$data['msk'] = $this->Btalion_model->mountlist();
			$this->load->view(F_BTALION.'horse/mountfirst',$data);
		}

		public function weaponlist(){
                    //die('dalwinder');
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}
			
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'arms/armstatement',$data);
		}
                

		public function weaponlistipg(){
			$this->load->helper('common');
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'arms/igparm',$data);
		}

		public function ammulist(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}
			if(null!=$this->input->post('submit')){
                            if(null!=$this->input->post('skip_zero')){
                                $skip_zero = true;
                            }else{
                                $skip_zero = false;
                            }
                        }else{
                            $skip_zero = true;
                        }
                        $data['skip_zero'] = $skip_zero;
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'ammunition/serviceammu_report',$data);
		}

		public function munitionreport(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}
			
			$data['msk'] = $this->Btalion_model->fetchinfo('munition',array('mstatus !=' => 0),'arm');
			$this->load->view(F_BTALION.'ammunition/munitionreport',$data);
		}

		/*public function cammulist(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'ammunition/serviceammu_report',$data);
		}*/

		public function ammulistigp(){
			$this->load->helper('common');
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'ammunition/igpser',$data);
		}

		public function ammulistp(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}
                        if(null!=$this->input->post('submit')){
                            if(null!=$this->input->post('skip_zero')){
                                $skip_zero = true;
                            }else{
                                $skip_zero = false;
                            }
                        }else{
                            $skip_zero = true;
                        }
                        $data['skip_zero'] = $skip_zero;
			//$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
                        $data['new_data'] = $this->Btalion_model->fetchinfogroupasc2('newwepon_dataqtyp',array('status' => 1,'newwepon_dataqtyp.bat_id'=>$data['ninfo']),'arm');
			$this->load->view(F_BTALION.'ammunition/practice_report',$data);
		}

                public function ammulistpigp(){
                        $this->load->helper('common');
                        $data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
                        $this->load->view(F_BTALION.'ammunition/igppra',$data);
                }

		public function hor_report(){
			$this->load->helper('common');
			$data['msk'] = $this->Btalion_model->horselist();
			$this->load->view(F_BTALION.'horse/horse_report',$data);
		}

		public function osireporttwo(){
			$this->load->helper('common');
			$data['msk'] = $this->Btalion_model->osilist();
			$this->load->view(F_BTALION.'manpower/ositworeport',$data);
		}

		public function mtoreporttwo(){
			$this->load->helper('common');
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo;
			$data['msk'] = $this->Btalion_model->mtolist($ninfo[0]);
			$this->load->view(F_BTALION.'vehicles/mttworeport',$data);
		}

		public function mtoreporttwopp(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');

			$cmonth = $this->input->post("cmonth",TRUE);
			$cyear = $this->input->post("cyear",TRUE);

			$this->form_validation->set_rules("cmonth", "cmonth", "trim");
			$this->form_validation->set_rules("cyear", "cyear", "trim");
			if ($this->form_validation->run()){
			 	redirect('bt-mtoreporttwos/'.$cmonth.'/'.$cyear);
			}
			$bbs = '';

			if($this->session->userdata('rid') !=''){
				$bbs .= $this->session->userdata('rid');
			}else{
				$bbs .= $this->session->userdata('userid');
			}	

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $bbs));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $bbs;
			}else{
				$data['ninfo'] = $ninfo[0];
			}

			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $data['ninfo']));
			
			
			$this->load->view(F_BTALION.'vehicles/mtoneselect',$data);
		}

		public function mtoreporttwos($a,$b){
			$this->load->helper('common');
                        $this->load->library('form_validation');
			$bbs = '';
			
			if($this->session->userdata('rid') !=''){
				$bbs .= $this->session->userdata('rid');
			}else{
				$bbs .= $this->session->userdata('userid');
			}	
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $bbs));
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $bbs));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] =  $bbs;
			}else{
				$data['ninfo'] = $ninfo[0];
			}
                        //var_dump($a);
                        //$a =                                str_replace('-', '/', $a);
                        //var_dump($a);
			$data['msk'] = $this->Btalion_model->mtolist($data['ninfo'],$a,$b);
//var_dump($data['msk']);
                        $data['month'] = $a;
                        $data['day'] =    '';
                        $data['year']= $this->uri->segment(3);
  //                      die;
                        $cat_of_veh = [];
                        foreach($data['msk'] as $value){
                            $cat_of_veh[] = $value->catofvechicle;
                        }
                        $regs_ = info_fetch_countmtoallinfos($cat_of_veh,$data['ninfo'],$a,$this->uri->segment(3));
                        //var_dump($regs_);die;
                        
                        $ranks_= info_fetch_countmto($cat_of_veh,$data['ninfo']);
                        $ranks=[];
                        foreach($ranks_ as $key=>$val){
                            $ranks[$val->rank] = $val;
                        }
                        
                        $data['ranks_']=$ranks;
                        $regs=[];
                        foreach($regs_ as $key=>$val){
                            $regs[$val->catofvechicle][] = $val;
                        }
                        $data['regs']=$regs;
			$this->load->view(F_BTALION.'vehicles/mtone',$data);
		}
                public function mtoreporttwos2(){
			$this->load->helper('common');
                        $this->load->library('form_validation');
			$bbs = '';
                        $selected_date=null;
//var_dump($_POST);
//var_dump($this->input->post('submit'));
//var_dump($this->input->post('select_date'));

                        if($this->input->post('submit')!=null){
                            $selected_date = $this->input->post('select_date');
                         //var_dump($selected_date);
                        }
			if($this->session->userdata('rid') !=''){
				$bbs .= $this->session->userdata('rid');
			}else{
				$bbs .= $this->session->userdata('userid');
			}	
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $bbs));
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $bbs));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] =  $bbs;
			}else{
				$data['ninfo'] = $ninfo[0];
			}
//                        var_dump($a);
                        //$a =                                str_replace('-', '/', $a);
                        
                        if($selected_date!=null){
                            $a= $selected_date;
                        }else{
                            $a = date('d/m/Y');
                        }
                        $a = convertDate($a);
//                        var_dump($a);
						//echo $a." ".date("H:i:s");
						
			$data['msk'] = $this->Btalion_model->mtolist2($data['ninfo'],$a." ".date("H:i:s"));
//var_dump($data['msk']);
                        
                        $data['date'] = $a;
                        $data['month'] =                        substr($a, 3,2);
                        $data['day'] =                        substr($a, 0,2);
                        $data['year']= substr($a, 6,4);
                        
                        
  //                      die;
                        $cat_of_veh = [];
                        foreach($data['msk'] as $value){
                            $cat_of_veh[] = $value->catofvechicle;
                        }
                        $ranks=[];
                        $regs=[];
                        $reg_no = [];
                        if(count($cat_of_veh)>0){
                            $regs_ = info_fetch_countmtoallinfos2($cat_of_veh,$data['ninfo'],$a." ".date("H:i:s"),$this->uri->segment(3));
//var_dump($regs_);
                            $ranks_= info_fetch_countmto($cat_of_veh,$data['ninfo']);
//  var_dump($ranks_);                          
                            foreach($ranks_ as $key=>$val){
                                $ranks[$val->rank] = $val;
                            }

                            $reg_no=[];
                            foreach($regs_ as $key=>$val){
                                $regs[$val->catofvechicle][] = $val;
                                //var_dump($val);die;
                                $reg_no[] = $val->mt_id;
                            }
                            //var_dump($reg_no);
                            $poiis_ = fetchoneinfopollistpost_2($reg_no,$a." ".date("H:i:s"),$data['ninfo']);
                            //var_dump($poiis_);
                            $poiis =[];
                            foreach ($poiis_ as $k1=>$val1){
                            //echo $val1->reg_no.' '
                                        ;
                                $poiis[$val1->reg_no]= $val1;
                            }
                            $data['poiis_'] = $poiis;
//                            $poiis = fetchoneinfopollistpost_2($listing->mt_id,$date,$year,$ninfo);
//                            var_dump($poiis);
                        }
                        $data['ranks_']=$ranks;
                        $data['regs']=$regs;
                        
                        //var_dump($regs_);die;
                        
			$this->load->view(F_BTALION.'vehicles/mtone',$data);
		}

		public function mtoreporttwospolselect(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}

			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $data['ninfo']));
			
			$data['info'] = $info;
	
			

			$cmonth = $this->input->post("cmonth",TRUE);
			$cyear = $this->input->post("cyear",TRUE);

			$this->form_validation->set_rules("cmonth", "cmonth", "trim");
			$this->form_validation->set_rules("cyear", "cyear", "trim");
			if ($this->form_validation->run()){
			 	redirect('bt-mtoreporttwospol/'.$cmonth.'/'.$cyear);
			}
			$this->load->view(F_BTALION.'vehicles/polselect',$data);
		}

		public function mtoreporttwospol($cmonth,$cyear){
			$this->load->helper('common');

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}

			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $data['ninfo']));
			
			$data['info'] = $info;
			$data['msk'] = $this->Btalion_model->joinpolrepair($cmonth,$cyear,$data['ninfo']);
                        $ids=[];
                        foreach($data['msk'] as $k=>$val){
                            $ids[]=$val->mt_id;
                        }
//                        var_dump($ids);
//			print_r($data['msk']);
                        $poiis = [];
                        if(count($ids)>0){
                            $poiis_ = fetchoneinfopollistpost_2($ids,$this->uri->segment(3).'-'.$this->uri->segment(2).'-31',$data['ninfo']);
                            foreach($poiis_ as $k=>$val){
//                                var_dump($val);die;
                                $poiis[$val->reg_no] = $val;
                            }
                        }
                        $data['poiis_'] = $poiis;
			$this->load->view(F_BTALION.'reports/newpol',$data);
		}

		public function mtoreporttwosigp(){
			$this->load->helper('common');
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$data['msk'] = $this->Btalion_model->mtolistigp();
			$this->load->view(F_BTALION.'vehicles/mtigp',$data);
		}

		public function mskreporttwo(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$ito = $this->input->post("tpi",TRUE);
			$this->form_validation->set_rules("tpi", "tpi", "trim");
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}
			$data['ninfo'] = $ninfo[0];
			$data['msk'] = $this->Btalion_model->mskgroup($ninfo[0]);
			$data['info'] = '';
			$data['ito'] = $ito;
			if ($this->form_validation->run()){
			  $data['info'] = $ito;
			}	
			$this->load->view(F_BTALION.'material/msktwo',$data);
		}

		public function mskanti(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$ito = $this->input->post("tpi",TRUE);
			$this->form_validation->set_rules("tpi", "tpi", "trim");
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value){
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}
				if(empty($ninfo[0])){
					$data['ninfo'] = $this->session->userdata('userid');
				}else{
					$data['ninfo'] = $ninfo[0];
				}
			
			$data['msk'] = $this->Btalion_model->mskgroup($data['ninfo']);
			$data['info'] = '';
			$data['ito'] = $ito;
			if ($this->form_validation->run()){
			  $data['info'] = $ito;
			}	
			$this->load->view(F_BTALION.'material/antiroit',$data);
		}

		public function mskantis(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$ito = $this->input->post("tpi",TRUE);
			$this->form_validation->set_rules("tpi", "tpi", "trim");

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}
				if(empty($ninfo[0])){
					$data['ninfo'] = $this->session->userdata('userid');
				}else{
					$data['ninfo'] = $ninfo[0];
				}
			

			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $data['ninfo']));
			
			$data['msk'] = $this->Btalion_model->mskgroup($data['ninfo']);
			$data['info'] = '';
			$data['ito'] = $ito;
			if ($this->form_validation->run()){
			  $data['info'] = $ito;
			}	
			$this->load->view(F_BTALION.'material/tent',$data);
		}

		public function mskantisth(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$ito = $this->input->post("tpi",TRUE);
			$this->form_validation->set_rules("tpi", "tpi", "trim");
			
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}
				if(empty($ninfo[0])){
					$data['ninfo'] = $this->session->userdata('userid');
				}else{
					$data['ninfo'] = $ninfo[0];
				}

				$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $data['ninfo']));

			$data['msk'] = $this->Btalion_model->mskgroup($data['ninfo']);
			$data['info'] = '';
			$data['ito'] = $ito;
			if ($this->form_validation->run()){
			  $data['info'] = $ito;
			}	
			$this->load->view(F_BTALION.'material/mshthree',$data);
		}

		public function msksun(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
                        
			$this->form_validation->set_rules("name", "sanction", "required|integer");

			$data['msk'] = $this->Btalion_model->mskgroupitems($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->msksun($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-msksun');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-msksun');
				}
			}	
			$this->load->view(F_BTALION.'material/msksan',$data);
		}

		public function mskservisable(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->mskgroupitems($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->msksun($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-msksun');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-msksun');
				}
			}	
			$this->load->view(F_BTALION.'material/mskserv',$data);
		}

		public function mtosun(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "name", "trim");

			$data['msk'] = $this->Btalion_model->mtogroupitems($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->mtosun($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-mtosun');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-mtosun');
				}
			}	
			$this->load->view(F_BTALION.'vehicles/mtosan',$data);
		}

		public function sammusun(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->fetchinfo('newwepon_data',array('status' => 1));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->sersun($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-sammusun');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-sammusun');
				}
			}	
			$this->load->view(F_BTALION.'ammunition/sersan',$data);
		}

		public function pammusun(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->fetchinfo('newwepon_data',array('status' => 1));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->prasun($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-pammusun');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-pammusun');
				}
			}	
			$this->load->view(F_BTALION.'ammunition/presan',$data);
		}

		public function armsun(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->weaponlist();
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->armsun($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-armsun');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-armsun');
				}
			}	
			$this->load->view(F_BTALION.'arms/armsan',$data);
		}

		public function armsuni(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->weaponlist();
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->armremak($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-armsuni');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-armsuni');
				}
			}	
			$this->load->view(F_BTALION.'arms/armremaks',$data);
		}

		public function ammuser(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->weaponlist();
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->serremak($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-ammuser');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-ammuser');
				}
			}	
			$this->load->view(F_BTALION.'ammunition/serremarks',$data);
		}

		public function ammuper(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->weaponlist();
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->praremak($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-ammuper');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-ammuper');
				}
			}	
			$this->load->view(F_BTALION.'ammunition/perreamrks',$data);
		}

		public function osisun(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->osisun($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-osisun');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-osisun');
				}
			}	
			$this->load->view(F_BTALION.'manpower/osisan',$data);
		}

		public function osifoni(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->osifoni($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-osifoni');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-osifoni');
				}
			}	
			$this->load->view(F_BTALION.'manpower/dep',$data);
		}

		public function osipfpp(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->osipfpp($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-osipfpp');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-osipfpp');
				}
			}	
			$this->load->view(F_BTALION.'manpower/dep',$data);
		}

		public function osi_nor(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->osi_nor($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-osi-nor');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-osi-nor');
				}
			}	
			$this->load->view(F_BTALION.'manpower/dep',$data);
		}

		public function osi_nord(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->osi_nord($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-osi-nord');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-osi-nord');
				}
			}	
			$this->load->view(F_BTALION.'manpower/dep',$data);
		}

		public function osi_ea(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->osi_ea($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-osi-ea');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-osi-ea');
				}
			}	
			$this->load->view(F_BTALION.'manpower/dep',$data);
		}

		public function osi_vac(){
			$this->load->helper('common');
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->input->post("cw",TRUE);
			$ito = $this->input->post("name",TRUE);
			$this->form_validation->set_rules("name", "tpi", "trim");

			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('userid'));
			if ($this->form_validation->run()){
			  $add_web = $this->Btalion_model->osi_vac($name,$ito,$this->session->userdata('userid')); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info added successfully');
					redirect('bt-osi-vac');
				}else{
					$this->session->set_flashdata('error_msg','info has not added.');
					redirect('bt-osi-vac');
				}
			}	
			$this->load->view(F_BTALION.'manpower/dep',$data);
		}

		/*For battalions start*/
		public function bkhcarms(){ /*Arms*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['tow'] = $this->Btalion_model->weaponlist();
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$mrec = $this->input->post("mrec",TRUE);
			$issued = $this->input->post("issued",TRUE);
			$data["weapon"] = $this->Btalion_model->get_khcbat($tpi,$orderno,$rcno,$mrec,$issued);
			$data["counts"] = $this->Btalion_model->get_khcbatcount($tpi,$orderno,$rcno,$mrec,$issued);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_khcbat($tpi,$orderno,$rcno,$mrec,$issued); 
				$data["counts"] = $this->Btalion_model->get_khcbatcount($tpi,$orderno,$rcno,$mrec,$issued);			
			}
			$this->load->view(F_BTALION.'old/viewwep',$data);
		}

		public function cbkhcarmsissued(){ /*Arms*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['tow'] = $this->Btalion_model->weaponlist();
			$data['weapon'] = $this->Btalion_model->fetchinfo('issue_arm',array('istatus' => 1 , 'bat_id' => $this->session->userdata('userid')));
			
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$typeofduty = $this->input->post("typeofduty",TRUE);
			$amtype = $this->input->post("amtype",TRUE);
                           

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			$data['bodys'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $ninfo[0]));
			$data["weapon"] = $this->Btalion_model->get_ckhcbatis($tpi,$orderno,$typeofduty,$amtype,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_ckhcbatiscount($tpi,$orderno,$typeofduty,$amtype,$ninfo[0]);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_ckhcbatis($tpi,$orderno,$typeofduty,$amtype,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_ckhcbatiscount($tpi,$orderno,$typeofduty,$amtype,$ninfo[0]);			
			}
			$this->load->view(F_BTALION.'old/viewwepissued',$data);
		}

		public function igcbkhcarmsissued(){ /*Arms*/
			$this->load->library('form_validation');
			$this->load->library('pagination');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['tow'] = $this->Btalion_model->weaponlist();
			//$data['weapon'] = $this->Btalion_model->fetchinfo('issue_arm',array('istatus' => 1));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));

			$ito = $this->input->get("ito",TRUE);
			$tpi = $this->input->get("tpi",TRUE);
			$orderno = $this->input->get("orderno",TRUE);
			$typeofduty = $this->input->get("typeofduty",TRUE);
			$amtype = $this->input->get("amtype",TRUE);


			/*if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
			$weapon = $this->Btalion_model->fetchinfowherein('old_weapon','bat_id',array('190','165','154','113','108','160','120'));
				
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
			$weapon = $this->Btalion_model->fetchinfowherein('old_weapon','bat_id',array('99','172','142','148','178'));
			}else{*/
			$data["counts"] = $this->Btalion_model->get_igckhcbatiscount($ito,$tpi,$orderno,$typeofduty,$amtype);
			/*}*/
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-igcbkhcarmsissued/";
			/*if($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
			$config["total_rows"] = 5000;
			}elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
			$config["total_rows"] = 5000;
			}else{*/
			 $config["total_rows"] = $data["counts"];
			/*}*/
			$config["per_page"] = 1000;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
        	$data['tow'] = $this->Btalion_model->weaponlist();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["links"] = $this->pagination->create_links();



			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			
			//$data['bodys'] = $this->Btalion_model->fetchinfo('old_weapon',array('old_weapon_status' => 1));
			$data["weapon"] = $this->Btalion_model->get_igckhcbatis($ito,$tpi,$orderno,$typeofduty,$amtype,$config["per_page"],$page);
			
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_igckhcbatis($ito,$tpi,$orderno,$typeofduty,$amtype,$config["per_page"],$page);
			$data["counts"] = $this->Btalion_model->get_igckhcbatiscount($ito,$tpi,$orderno,$typeofduty,$amtype);			
			}
			$this->load->view(F_BTALION.'old/allissuearm',$data);
		}

		public function bkhcarmsissued(){ /*Arms*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['tow'] = $this->Btalion_model->weaponlist();
			$data['weapon'] = $this->Btalion_model->fetchinfo('issue_arm',array('istatus' => 1 , 'bat_id' => $this->session->userdata('userid')));
			$data['bodys'] = $this->Btalion_model->fetchinfo('old_weapon',array('bat_id' => $this->session->userdata('userid')));
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$typeofduty = $this->input->post("typeofduty",TRUE);
			$amtype = $this->input->post("amtype",TRUE);
			$data["weapon"] = $this->Btalion_model->get_khcbatis($tpi,$orderno,$typeofduty,$amtype);
			$data["counts"] = $this->Btalion_model->get_khcbatiscount($tpi,$orderno,$typeofduty,$amtype);
			//$this->form_validation->set_rules("tpi", "report", "trim");
			/*if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_khcbatis($tpi,$orderno,$typeofduty,$amtype);
			$data["counts"] = $this->Btalion_model->get_khcbatiscount($tpi,$orderno,$typeofduty,$amtype);			
			}*/
			$this->load->view(F_BTALION.'old/viewwepissued',$data);
		}

                public function khcview($id){ /*Arms*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			
			$data["weapon"] = $this->Btalion_model->khcview($id);
			
			$this->load->view(F_BTALION.'old/khcview',$data);
		}

		public function mtview($id){ /*Arms*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			

			$data["weapon"] = $this->Btalion_model->viewmt($id);
			
			
			$this->load->view(F_BTALION.'old/mtview',$data);
		}


		public function bkhcparmsissued(){ /*Arms*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['weapon'] = $this->Btalion_model->fetchinfo('pammu',array('pstatus' => 1 , 'bat_id' => $this->session->userdata('userid')));
			$this->load->view(F_BTALION.'old/issuedparm',$data);
		}

		public function bkhcammu(){/*Ammunition*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$data["weapon"] = $this->Btalion_model->get_khcamu($tpi,$orderno,$this->session->userdata('userid'));
			$data["counts"] = $this->Btalion_model->get_khcamucount($tpi,$orderno,$this->session->userdata('userid'));
			$data["countsi"] = $this->Btalion_model->squntysii($tpi,$orderno);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_khcamu($tpi,$orderno,$this->session->userdata('userid')); 
				$data["counts"] = $this->Btalion_model->get_khcamucount($tpi,$orderno,$this->session->userdata('userid'));	
				$data["countsi"] = $this->Btalion_model->squntysii($tpi,$orderno);	
			}
			$this->load->view(F_BTALION.'old/viewammup',$data);
		}
		/*Close*/

		public function bkhcmmu(){/*Ammunition*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$data["weapon"] = $this->Btalion_model->fetchinfo('issue_mmu',array('bat_id' => $this->session->userdata('userid')));
			
			$this->load->view(F_BTALION.'old/viewammup',$data);
		}
		/*Close*/

		public function bkhcammuissue(){/*Ammunition*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['tows'] = $this->Btalion_model->weaponlist();
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$data["weapon"] = $this->Btalion_model->get_khcamuissue($tpi,$orderno,$this->session->userdata('userid'));
			$data["counts"] = $this->Btalion_model->squntys($tpi,$orderno);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_khcamuissue($tpi,$orderno,$this->session->userdata('userid')); 
				$data["counts"] = $this->Btalion_model->squntys($tpi,$orderno);		
			}
			$this->load->view(F_BTALION.'old/ammuissued',$data);
		}
		/*Close*/

		public function bkhcammuprcissue(){/*Ammunition*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['tows'] = $this->Btalion_model->weaponlist();
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$data["weapon"] = $this->Btalion_model->get_khcamuprcissue($tpi,$orderno,$this->session->userdata('userid'));
			$data["counts"] = $this->Btalion_model->pquntys($tpi,$orderno);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_khcamuprcissue($tpi,$orderno,$this->session->userdata('userid')); 
				$data["counts"] = $this->Btalion_model->pquntys($tpi,$orderno);		
			}
			$this->load->view(F_BTALION.'old/ammuprcissued',$data);
		}
		/*Close*/

		public function bkhcammus(){/*Ammunition*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$data["weapon"] = $this->Btalion_model->get_khcamus($tpi,$orderno,$this->session->userdata('userid'));
			$data["counts"] = $this->Btalion_model->get_khcamucounts($tpi,$orderno,$this->session->userdata('userid'));
			$data["countsi"] = $this->Btalion_model->pquntysii($tpi,$orderno);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_khcamus($tpi,$orderno,$this->session->userdata('userid')); 
				$data["counts"] = $this->Btalion_model->get_khcamucounts($tpi,$orderno,$this->session->userdata('userid'));	
				$data["countsi"] = $this->Btalion_model->pquntysii($tpi,$orderno);	
			}
			$this->load->view(F_BTALION.'old/viewserammu',$data);
		}
		/*Close*/

		public function binslist($id){/*Ammunition*/
			$this->load->helper('common');
			$data['de'] = $this->Btalion_model->fetchinfo('ammuins',array('ammu_id' => $id,'ammu_type' => 'Service'));
			$this->load->view(F_BTALION.'ammunition/inslist',$data);
		}
		/*Close*/

		/*For battalions Comnt start*/
		public function cdash(){ /*All modules data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$ito = $this->input->post("ito",TRUE);
			$this->form_validation->set_rules("ito", "ito", "trim");
			if ($this->form_validation->run()){
			  if($ito == 31){
			  	redirect('bt-ckhcarms');
			  }elseif ($ito == 32) {
				redirect('bt-ckhcammu');
			  }elseif ($ito == 33) {
				redirect('bt-cmto');
			  }elseif ($ito == 34) {
			  	redirect('bt-cosi');
			  }elseif ($ito == 35) {
			  	redirect('bt-cqtr');
			  }elseif ($ito == 36) {
			  	redirect('bt-cmsk');
			  }elseif ($ito == 36) {
			  	redirect('bt-cmsk');
			  }elseif($ito == 37){
			  	redirect('bt-cmount');
			  }
			}
			$this->load->view(F_BTALION.'comnt/dash');
		}

		public function ckhcarms(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common_helper');
			$data['tow'] = $this->Btalion_model->weaponlist();
			$name = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$data['name'] = $name;
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$mrec = $this->input->post("mrec",TRUE);
			$issued = $this->input->post("issued",TRUE);
			$report = $this->input->post("report",TRUE);
			$data['rep'] = $report;
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			$data["weapon"] = $this->Btalion_model->get_ckhcbat($tpi,$orderno,$rcno,$mrec,$issued,$report,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_ckhcbatcount($tpi,$orderno,$rcno,$mrec,$issued,$report,$ninfo[0]);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_ckhcbat($tpi,$orderno,$rcno,$mrec,$issued,$report,$ninfo[0]); 
				$data["counts"] = $this->Btalion_model->get_ckhcbatcount($tpi,$orderno,$rcno,$mrec,$issued,$report,$ninfo[0]);			
			}
			$this->load->view(F_BTALION.'comnt/arms',$data);
		}

		public function ckhcammu(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['tow'] = $this->Btalion_model->newamulist();
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$tpi = $this->input->post("tpi",TRUE);
			$orderno = $this->input->post("orderno",TRUE);
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 3){
					$ninfo[] = $value->users_id;
				}
			}
			$data["weapon"] = $this->Btalion_model->get_ckhcamu($tpi,$orderno,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_ckhcamucount($tpi,$orderno,$ninfo[0]);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_ckhcamu($tpi,$orderno,$ninfo[0]); 
				$data["counts"] = $this->Btalion_model->get_ckhcamucount($tpi,$orderno,$ninfo[0]);
			}
			$this->load->view(F_BTALION.'comnt/ammu',$data);
		}

	

		public function cmto(){ /*All mt data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 6){
					$ninfo[] = $value->users_id;
				}
			}

			$weapon = $this->Btalion_model->fetchinfo('newmt',array('mt_status' => 1,'bat_id' => $ninfo[0]));

			$data['items'] = $this->Btalion_model->fetchinfo('newmt',array('mt_status' => 1));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6));
			$data['weapon'] = $weapon;
			$data['name'] = '';
			$config = array();
			$config["base_url"] = base_url() . "bt-cmto";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 500;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;	
			$data["links"] = $this->pagination->create_links();

			

			$cov = $this->input->post("cov",TRUE);
			$vc = $this->input->post("vc",TRUE);
			$dob1 = $this->input->post("dob1",TRUE);
			$option = $this->input->post("option",TRUE);
			$vcon = $this->input->post("vcon",TRUE);
			$tpii = $this->input->post("tpii",TRUE);

			$vcn = $this->input->post("vcn",TRUE);
			$bp = $this->input->post("bp",TRUE);
			$report = $this->input->post("report",TRUE);
			$data['rep'] = $report; 

			$data["weapon"] = $this->Btalion_model->get_cusersvicall($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$report,$config["per_page"],$page,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_cusers_countvicall($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$report,$ninfo[0]); 
			
			$this->form_validation->set_rules("cov", "cov", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_cusersvicall($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$report,$config["per_page"],$page,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_cusers_countvicall($cov,$vc,$dob1,$option,$vcon,$tpii,$vcn,$bp,$report,$ninfo[0]);	
			}
			
			$this->load->view(F_BTALION.'comnt/mto',$data);
		}

		public function cosi(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}

			$name = $this->input->get("name",TRUE);
			$bloodgroup = $this->input->get("bloodgroup",TRUE);
			$rcnum = $this->input->get("rcnum",TRUE);
			$RankRankre = $this->input->get("RankRankre",TRUE);
			$eor1 =  $this->input->get("eor1",TRUE);
			$eor2 =  $this->input->get("eor2",TRUE);
			$eor3 =  $this->input->get("eor3",TRUE);
			$eor4 =  $this->input->get("eor4",TRUE);
			$eor5 =  $this->input->get("eor5",TRUE);
			$postate = $this->input->get("postate",TRUE);
			$pcity = $this->input->get("pcity",TRUE);
			$stts = $this->input->get("stts",TRUE);
			$UnderGraduate = $this->input->get("UnderGraduate",TRUE);
			$Graduate = $this->input->get("Graduate",TRUE);
			$PostGraduate = $this->input->get("PostGraduate",TRUE);
			$Doctorate = $this->input->get("Doctorate",TRUE);
			$gender = $this->input->get("gender",TRUE);
			$single =  $this->input->get("single",TRUE);
			$Modemdr = $this->input->get("Modemdr",TRUE);
			$Rankre = $this->input->get("Rankre",TRUE);
			$Enlistmentec = $this->input->get("Enlistmentec",TRUE);
			$InductionModeim = $this->input->get("InductionModeim",TRUE);
			$clit = $this->input->get("clit",TRUE);
			$dateofesnlistment1 = $this->input->get("dateofesnlistment1",TRUE);
			$dateofesnlistment2 =  $this->input->get("dateofesnlistment2",TRUE);
			$NamesofsCourses =  $this->input->get("NamesofsCourses1",TRUE);
			$NamesofsCourses2 =  $this->input->get("NamesofsCourses2",TRUE);
			$DateofRetirementdor = $this->input->get("DateofRetirementdor",TRUE);
			$dateofbirth = $this->input->get("dateofbirth",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$height = $this->input->get("height",TRUE);
			$inch = $this->input->get("inch",TRUE);
			$Postingtiset = $this->input->get("Postingtiset",TRUE);
			$Postingtiset2 = $this->input->get("Postingtiset2",TRUE);
			$Postingtiset3 = $this->input->get("Postingtiset3",TRUE);
			$Postingtiset4 = $this->input->get("Postingtiset4",TRUE);
			$Postingtiset5 = $this->input->get("Postingtiset5",TRUE);
			$Postingtiset6 = $this->input->get("Postingtiset6",TRUE);
			$Postingtiset7 = $this->input->get("Postingtiset7",TRUE);
			$Postingtiset8 = $this->input->get("Postingtiset8",TRUE);
			$Postingtiset9 = $this->input->get("Postingtiset9",TRUE);
			$data['nm'] = $NamesofsCourses2;
			$p = '';
			$weapon = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$ninfo[0]);
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));
			$config = array();
			$config["base_url"] = base_url() . "bt-cosi";
			$config["total_rows"] = $weapon;
			$config["per_page"] = 100;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
        	$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data["links"] = $this->pagination->create_links();

		 

			$data["weapon"] = $this->Btalion_model->get_cosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$config["per_page"],$page,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$ninfo[0]);
			$this->form_validation->set_rules("bloodgroup", "bloodgroup", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_cosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$config["per_page"],$page,$ninfo[0]);

				$data["counts"] = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,$p,$ninfo[0]);
			}
			$this->load->view(F_BTALION.'comnt/osi',$data);
		}

		public function cqtr(){

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 8){
					$ninfo[] = $value->users_id;
				}
			}
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 8));
			$tq = $this->input->post("tq",TRUE);
			$floor =  $this->input->post("floor",TRUE);
			$Condition = $this->input->post("Condition",TRUE);
			$accts = $this->input->post("accts",TRUE);
			$report = $this->input->post("report",TRUE);
			$data['rep'] = $report;
			$data["weapon"] = $this->Btalion_model->get_cusersqtrall($tq,$floor,$Condition,$accts,$report,$ninfo[0]);
			$data["counts"] = $this->Btalion_model->get_cusers_countqtrall($tq,$floor,$Condition,$accts,$ninfo[0]);

			$this->form_validation->set_rules("tpi", "report", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_cusersqtrall($tq,$floor,$Condition,$accts,$report,$ninfo[0]); 

				$data["counts"] = $this->Btalion_model->get_cusers_countqtrall($tq,$floor,$Condition,$accts,$ninfo[0]);	
			}
			$this->load->view(F_BTALION.'comnt/qtr',$data);
		}

		public function cqtrs(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
				$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 8){
					$ninfo[] = $value->users_id;
				}
			}
				if(empty($ninfo[0])){
					$data['ninfo'] = $this->session->userdata('userid');
				}else{
					$data['ninfo'] = $ninfo[0];
				}

			$tpi = $this->input->post("orderno",TRUE);
			$orderno = $this->input->post("rcno",TRUE);
			$rcno = $this->input->post("mrec",TRUE);
                        $download =$this->input->post("download");
			$data["weapon"] = $this->Btalion_model->get_cqtr($tpi,$orderno,$rcno,$data['ninfo']);
			$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_cqtr($tpi,$orderno,$rcno,$data['ninfo']);
			}
                        if($download!=null){
                            $val = explode(' ', $this->session->userdata('nick')); $title= 'Statement of Quarters '.$val[0];
                            $this->downloadQuarters($data["weapon"],$title);
                        }
			$this->load->view(F_BTALION.'quater/qrep',$data);
		}
                public function downloadQuarters($weapons=null,$title=null){
                    //echo 'hi';
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Statement of Quarters")
										 ->setSubject("Statement of Quarters")
										 ->setDescription("Statement of Quarters")
										 ->setKeywords("Quarters Excel PAP ERMS")
										 ->setCategory("Quarter Statement Detail of Battalion");
			$counti= 0;

			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Statement of Quarters'); 
			
			$counter = 0;
			$row=1;
			
			$titleStyle = array(
				'font'  => array(
					'size'  => 11,
					'name'  => 'Verdana',
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF00a0')
					)
				));
                        if($title!=null){
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', $title);
                        }else{
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Statement of Quarters');
                        }
			$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:H1");
			$row++;
			$equipmentNameStyle = array(
                            'font'  => array(
                                'size'  => 12,
                                'name'  => 'Verdana',
                                'alignment' => array(
                                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                                )
                        ));
                        $cols = ['A','B','C','D','E','F','G','H','I','J','K'];
                        $colsName = ['S. No.','Type of Quater','Quater Number','Floor','Location','Battalions/Units/Distt/Other','Rank, Name and Belt No.','Mobile No.','Allotment Order','Allotment Date','Place of Posting'];
                        $i=0;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);$i++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(15);$i++;
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(20);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(20);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($cols[$i].$row)->getAlignment()->setWrapText(true);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(30);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(50);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(15);
            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($cols[$i].$row)->getAlignment()->setWrapText(true);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(20);
            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(20);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);$i++;
			$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setWidth(30);
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i].$row, $colsName[$i]);
			$row++;
                        
			foreach($weapons as $k=>$value){
                            $i=0;
                            $counter++;
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $counter);               
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->typeofqtr);
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->qtrno);
                             $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->flor);
							 $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->location);
							 $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->balot);
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->rank." ".$value->nameofallote." ".$value->qother." ".$value->regltno);
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->contactno);
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->allotmentorder);
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->allotmentdate);
                            $objPHPExcel->setActiveSheetIndex($counti)->setCellValue($cols[$i++].$row, $value->placeofposting);
                           
                            $row++;
			}
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="quarter_report.'.EXCEL_EXTENSION.'"');
			header('Cache-Control: max-age=0');
			header('Cache-Control: max-age=1');
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}

		public function cqtrsigp(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));

			$tpi = $this->input->post("orderno",TRUE);
			$orderno = $this->input->post("rcno",TRUE);
			$rcno = $this->input->post("mrec",TRUE);
			$data["weapon"] = $this->Btalion_model->get_cqtrigp($tpi,$orderno,$rcno);
			/*$this->form_validation->set_rules("tpi", "report", "trim");
			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_cqtr($tpi,$orderno,$rcno,$ninfo[0]);
			}*/
			$this->load->view(F_BTALION.'quater/qutrigp',$data);
		}

		

		public function cmsk(){ /*All msk data*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->library('pagination');
			$this->load->helper('common');

			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 5){
					$ninfo[] = $value->users_id;
				}
			}

			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5));
			$data['items'] = $this->Btalion_model->fetchinfogroupasc('mskitems',array('status' => 1),'item');
			//$data['body'] = $this->Btalion_model->fetchinfo('newosi',array('osi_status' => 1 ));
			$report = $this->input->post("report",TRUE);
			$data['rep'] = $report;
			if($report == 1){
				$weapon = $this->Btalion_model->fetchinfo('mskitemsqty',array('status' => 1));
			}else{
				$weapon = $this->Btalion_model->fetchinfo('newmsk',array('bat_id' =>  $ninfo[0], 'msk_status' => 1));
			}
			
				$data['cmsk'] = $weapon;
			$config = array();
			$config["base_url"] = base_url() . "bt-cmsk";
			$config["total_rows"] = count($weapon);
			$config["per_page"] = 1200;
			$config["uri_segment"] = 2;
			$config["num_links"] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			
			$data["links"] = $this->pagination->create_links();

			
			$toi = $this->input->post("toi",TRUE);
			$nameofitem = $this->input->post("nameofitem",TRUE);
			$cti = $this->input->post("cti",TRUE);
			$Receivedfrom = $this->input->post("Receivedfrom",TRUE);
			$fname = $this->input->post("fname",TRUE);
			$tpi = $this->input->post("tpi",TRUE);
			
			$data["msk"] = $this->Btalion_model->get_cusersall($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report,$config["per_page"],$page,$ninfo[0]);

			/*$data['qname'] = $this->Btalion_model->mskquntyalllist($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report);*/
			$this->form_validation->set_rules("toi", "toi", "trim");

			if ($this->form_validation->run()){
				$data["msk"] = $this->Btalion_model->get_cusersall($toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report,$config["per_page"],$page,$ninfo[0]);
				/*$data['qname'] = $this->Btalion_model->mskquntyalllist($ito,$toi,$nameofitem,$cti,$Receivedfrom,$fname,$tpi,$report);*/				
					
			}
			$this->load->view(F_BTALION.'comnt/msk',$data);
		}

		public function cmount(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['name'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('userid')));
			$data["weapon"] = $this->Btalion_model->fetchinfo('old_horse',array('horse_status' => 1));	
			$this->load->view(F_BTALION.'comnt/mount',$data);
		}
		/*Close*/

		public function osidelete($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->Btalion_model->osidelete($id);

			if($name == 1){
					$this->session->set_flashdata('success_msg','Record has deleted succesfully !');
					redirect('bt-osi-old');
				}else{
					$this->session->set_flashdata('error_msg','Record has not deleted.');
					redirect('bt-osi-old');
				}	
			
		}

		public function temppostdelete($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->Btalion_model->tempdelete($id);

			if($name == 1){
					$this->session->set_flashdata('success_msg','Record has deleted succesfully !');
					redirect('bt-osi-tempostview');
				}else{
					$this->session->set_flashdata('error_msg','Record has not deleted.');
					redirect('bt-osi-tempostview');
				}	
			
		}

		public function khcdelete($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->Btalion_model->khcdelete($id);

			if($name == 1){
					$this->session->set_flashdata('success_msg','Record has deleted succesfully !');
					redirect('bt-bkhcarms');
				}else{
					$this->session->set_flashdata('error_msg','Record has not deleted.');
					redirect('bt-bkhcarms');
				}	
			
		}
		/*Close*/

		public function mskdelete($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$name = $this->Btalion_model->mskdelete($id);

			if($name == 1){
					$this->session->set_flashdata('success_msg','Record has deleted succesfully !');
					redirect('bt-msk-old');
				}else{
					$this->session->set_flashdata('error_msg','Record has not deleted.');
					redirect('bt-msk-old');
				}	
			
		}
		/*Close*/

		public function armdgp(){
			$this->load->view(F_BTALION.'cover/armdgp');
		}
		
		public function armaadgp(){
			$this->load->view(F_BTALION.'cover/armadgp');
		}

		public function cartage(){
			$this->load->view(F_BTALION.'cover/cartiage');
		}

		public function munintion(){
			$this->load->view(F_BTALION.'cover/Mution');
		}

		public function cpomt(){
			$this->load->view(F_BTALION.'cover/cpomt');
		}

		public function mt(){
			$this->load->view(F_BTALION.'cover/mt');
		}

		public function mtdgp(){
			$this->load->view(F_BTALION.'cover/mtdgp');
		}

		public function qt(){
			$this->load->view(F_BTALION.'cover/qt');
		}

		public function msk(){
			$this->load->view(F_BTALION.'cover/msk');
		}

				/*Add Ammunition start*/
		public function add_rank($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model-> fetchoneinfo('newosip',array('man_id' => $id));
			$data['id'] = $id;
			
			
			$RankRankre = $this->input->post("RankRankre",TRUE);
			$catop1 = $this->input->post("catop1",TRUE);
			$catop2 = $this->input->post("catop2",TRUE);
			$catop3 = $this->input->post("catop3",TRUE);
			$catop4 = $this->input->post("catop4",TRUE);
			$catop5 = $this->input->post("catop5",TRUE);

			$fone1 = $this->input->post("fone1",TRUE);
			$vploc = $this->input->post("vploc",TRUE);
			$vpdis = $this->input->post("vpdis",TRUE);
			$fone2 = $this->input->post("fone2",TRUE);
			$noj =  $this->input->post("noj",TRUE);
			$jsdis =  $this->input->post("jsdis",TRUE);
			$fone3 = $this->input->post("fone3",TRUE);
			$fone4 = $this->input->post("fone4",TRUE);
			$fone5 = $this->input->post("fone5",TRUE);
			$osgloc = $this->input->post("osgloc",TRUE);
			$osgdis = $this->input->post("osgdis",TRUE);
			$fone6 = $this->input->post("fone6",TRUE);
			$fone7 = $this->input->post("fone7",TRUE);
			$fone8 = $this->input->post("fone8",TRUE);
			$fone9 = $this->input->post("fone9",TRUE);
			$bsdnob = $this->input->post("bsdnob",TRUE);
			$bsddis = $this->input->post("bsddis",TRUE);
			$bsdloc = $this->input->post("bsdloc",TRUE);
			$fone10 = $this->input->post("fone10",TRUE);
			$fone11 = $this->input->post("fone11",TRUE);
			$fone12 = $this->input->post("fone12",TRUE);

     		$lone1 = $this->input->post("lone1",TRUE);
     		$perdupod = $this->input->post("perdupod",TRUE);
     		$perdudis = $this->input->post("perdudis",TRUE);
     		$perduorno = $this->input->post("perduorno",TRUE);
     		$perduordate = $this->input->post("perduordate",TRUE);
			$lone2 = $this->input->post("lone2",TRUE);
			$dgppod = $this->input->post("dgppod",TRUE);
			$dgpdis = $this->input->post("dgpdis",TRUE);
			$dgporno = $this->input->post("dgporno",TRUE);
			$dgpordate = $this->input->post("dgpordate",TRUE);
			$lone3 = $this->input->post("lone3",TRUE); 
			$tertdpod = $this->input->post("tertdpod",TRUE); 
			$tertddis = $this->input->post("tertddis",TRUE); 
			$tertdorno = $this->input->post("tertdorno",TRUE); 
			$tertdordate =  $this->input->post("tertdordate",TRUE); 
			$sqone1 = $this->input->post("sqone1",TRUE);
			$sqone2 = $this->input->post("sqone2",TRUE);
			$sqone3 = $this->input->post("sqone3",TRUE);
			$sqone4 = $this->input->post("sqone4",TRUE);
			$sqone5 = $this->input->post("sqone5",TRUE);
			$sstgpod = $this->input->post("sstgpod",TRUE);
			$sstgdis = $this->input->post("sstgdis",TRUE);
			$sstgorno = $this->input->post("sstgorno",TRUE);
			$sstgordate = $this->input->post("sstgordate",TRUE);
			$sqone6 = $this->input->post("sqone6",TRUE);
			$sqone7 = $this->input->post("sqone7",TRUE);
			$sqone8 = $this->input->post("sqone8",TRUE);
			$swatpod = $this->input->post("swatpod",TRUE);
			$swatdis = $this->input->post("swatdis",TRUE);
			$swatorno = $this->input->post("swatorno",TRUE);
			$swatordate = $this->input->post("swatordate",TRUE);


			$paone1 = $this->input->post("paone1",TRUE);
			$paone2 = $this->input->post("paone2",TRUE);
			$awdpmpod = $this->input->post("awdpmpod",TRUE);
			$awdpmorno = $this->input->post("awdpmorno",TRUE);
			$awdpmordate = $this->input->post("awdpmordate",TRUE);
			$paone3 = $this->input->post("paone3",TRUE);
			$awdpfpod = $this->input->post("awdpfpod",TRUE);
			$awdpforno = $this->input->post("awdpforno",TRUE);
			$awdpfordate = $this->input->post("awdpfordate",TRUE);
			$paone4 = $this->input->post("paone4",TRUE);
			$awdpompod = $this->input->post("awdpompod",TRUE);
			$awdpomorno = $this->input->post("awdpomorno",TRUE); 
			$awdpomordate = $this->input->post("awdpomordate",TRUE); 
			$paone5 = $this->input->post("paone5",TRUE);
			$awdpofpod = $this->input->post("awdpofpod",TRUE);
			$awdpoforno = $this->input->post("awdpoforno",TRUE);
			$awdpofordate = $this->input->post("awdpofordate",TRUE); 
			$paone6 = $this->input->post("paone6",TRUE);
			$paone7 = $this->input->post("paone7",TRUE);
			$paone8 = $this->input->post("paone8",TRUE);
			$paone9 = $this->input->post("paone9",TRUE);
			$paone10 = $this->input->post("paone10",TRUE);
			$paone11 = $this->input->post("paone11",TRUE);
			$paone12 = $this->input->post("paone12",TRUE);
			$paone13 = $this->input->post("paone13",TRUE);
			$paone14 = $this->input->post("paone14",TRUE);
			$paone15 = $this->input->post("paone15",TRUE);
			$paone16 = $this->input->post("paone16",TRUE);
			$paone17 = $this->input->post("paone17",TRUE);
			$paone18 = $this->input->post("paone18",TRUE);
			$paone19 = $this->input->post("paone19",TRUE);
			$paone20 = $this->input->post("paone20",TRUE);
			$paone21 = $this->input->post("paone21",TRUE); 
			$paone22 = $this->input->post("paone22",TRUE);
			$paone23 = $this->input->post("paone23",TRUE);
			$paone24 = $this->input->post("paone24",TRUE);
			$paone27 = $this->input->post("paone27",TRUE); 
			
			$ssone23 = $this->input->post("ssone23",TRUE);
			$dsopod = $this->input->post("dsopod",TRUE);
			$dsoorno = $this->input->post("dsoorno",TRUE);
			$dsoordate = $this->input->post("dsoordate",TRUE);
			$ssone24 = $this->input->post("ssone24",TRUE);
			$csojalorno = $this->input->post("csojalorno",TRUE);
			$csojalordate = $this->input->post("csojalordate",TRUE);
			$ssone25 = $this->input->post("ssone25",TRUE);
			$mispatorno = $this->input->post("mispatorno",TRUE);
			$mispatordate = $this->input->post("mispatordate",TRUE);
			$ssone26 = $this->input->post("ssone26",TRUE);
			$othersnod = $this->input->post("othersnod",TRUE);
			$othersnodis = $this->input->post("othersnodis",TRUE);
			$othersorno = $this->input->post("othersorno",TRUE);
			$othersordate = $this->input->post("othersordate",TRUE);

			$traning1 = $this->input->post("traning1",TRUE);
			$traning2 = $this->input->post("traning2",TRUE);
			$traning3 = $this->input->post("traning3",TRUE);

			$btarin1  = $this->input->post("btarin1",TRUE);
			$btarin2  = $this->input->post("btarin2",TRUE);
			$btarin3  = $this->input->post("btarin3",TRUE);
			$btarin4  = $this->input->post("btarin4",TRUE);
			$btarin5  = $this->input->post("btarin5",TRUE);
			$btarin6  = $this->input->post("btarin6",TRUE);
			$btarin7  = $this->input->post("btarin7",TRUE);
			$btarin8  = $this->input->post("btarin8",TRUE);
			$btarin9  = $this->input->post("btarin9",TRUE);
			$btarin10  = $this->input->post("btarin10",TRUE);


			$awbone1 = $this->input->post("awbone1",TRUE);
			$awbone2 = $this->input->post("awbone2",TRUE);
			$pssawonof = $this->input->post("pssawonof",TRUE);
			$pssaworank = $this->input->post("pssaworank",TRUE);
			$pssawoordate = $this->input->post("pssawoordate",TRUE);
			$awbone3 = $this->input->post("awbone3",TRUE);
			$osihonoo = $this->input->post("osihonoo",TRUE);
			$awbone4 = $this->input->post("awbone4",TRUE);
			$Readerosinbo = $this->input->post("Readerosinbo",TRUE);
			$Orderly = $this->input->post("Orderly",TRUE);
			$telopr = $this->input->post("telopr",TRUE);
			$darrun = $this->input->post("darrun",TRUE);
			$awbone5 = $this->input->post("awbone5",TRUE);
			$bnkgdop = $this->input->post("bnkgdop",TRUE);
			$awbone6 = $this->input->post("awbone6",TRUE);
			$bhogpog = $this->input->post("bhogpog",TRUE);
			$bhogdop =  $this->input->post("bhogdop",TRUE);
			$awbone7 = $this->input->post("awbone7",TRUE);
			$tradestot = $this->input->post("tradestot",TRUE);
			$tradestt = $this->input->post("tradestt",TRUE);
			$tradesbat = $this->input->post("tradesbat",TRUE);
			$tradesdop = $this->input->post("tradesdop",TRUE);
			$tradesorno = $this->input->post("tradesorno",TRUE);
			$awbone8 = $this->input->post("awbone8",TRUE);
			$mtsecpod = $this->input->post("mtsecpod",TRUE);
			$mtsecvehno = $this->input->post("mtsecvehno",TRUE);
			$mtsecdop = $this->input->post("mtsecdop",TRUE);
			$mtsecorno = $this->input->post("mtsecorno",TRUE);
			$awbone9 = $this->input->post("awbone9",TRUE);
			$quartbradop = $this->input->post("quartbradop",TRUE);
			$quartbraorno = $this->input->post("quartbraorno",TRUE);
			$awbone10 = $this->input->post("awbone10",TRUE);
			$awbone11 = $this->input->post("awbone11",TRUE);
			$awbone12 = $this->input->post("awbone12",TRUE);
			$recrutnorb = $this->input->post("recrutnorb",TRUE); 
			$recrutorno =  $this->input->post("recrutorno",TRUE); 
			$recrutordate =  $this->input->post("recrutordate",TRUE);

			$bmdone1 = $this->input->post("bmdone1",TRUE);
			$bmdone2 = $this->input->post("bmdone2",TRUE);
			$leavefrom = $this->input->post("leavefrom",TRUE);
			$leaveto = $this->input->post("leaveto",TRUE);
			$bmdone3 = $this->input->post("bmdone3",TRUE);
			$absentfrom = $this->input->post("absentfrom",TRUE);
			$absentddr = $this->input->post("absentddr",TRUE);
			$absentdate = $this->input->post("absentdate",TRUE);

			$bmdone4 = $this->input->post("bmdone4",TRUE);
			$bmdone5 = $this->input->post("bmdone5",TRUE);
			$bmdone6 = $this->input->post("bmdone6",TRUE);
			$bmdone7 = $this->input->post("bmdone7",TRUE);
			$bmdone8 = $this->input->post("bmdone8",TRUE);
			$bmdone9 = $this->input->post("bmdone9",TRUE);
			$bmdone10 = $this->input->post("bmdone10",TRUE);

			$instone1 = $this->input->post("instone1",TRUE);
			$instone2 = $this->input->post("instone2",TRUE);
			$instone3 = $this->input->post("instone3",TRUE);
			$instone4 = $this->input->post("instone4",TRUE);
			$instone10 = $this->input->post("instone10",TRUE);


			$scname = $this->input->post("scname",TRUE);
			$scrank = $this->input->post("scrank",TRUE);
			$scdes = $this->input->post("scdes",TRUE);
			$scpop = $this->input->post("scpop",TRUE);
			$scaddress = $this->input->post("scaddress",TRUE);
			$scmob = $this->input->post("scmob",TRUE);
			$scnod = $this->input->post("scnod",TRUE);
			$scoby = $this->input->post("scoby",TRUE);
			$scono = $this->input->post("scono",TRUE);
			$scodate = $this->input->post("scodate",TRUE);

			$tcrank = $this->input->post("tcrank",TRUE);
			$tcdes = $this->input->post("tcdes",TRUE);
			$tcoby = $this->input->post("tcoby",TRUE);
			$tcono = $this->input->post("tcono",TRUE);
			$tcodate = $this->input->post("tcodate",TRUE);

			$usdos =  $this->input->post("usdos",TRUE);
			$usros =  $this->input->post("usros",TRUE);

			$classf1 =  $this->input->post("classf1",TRUE);
			$classf2 =  $this->input->post("classf2",TRUE);
			$classf3 =  $this->input->post("classf3",TRUE);

			$scnames = $this->input->post("scnames",TRUE);
			$scranks = $this->input->post("scranks",TRUE);
			$scdess = $this->input->post("scdess",TRUE);
			$scpops = $this->input->post("scpops",TRUE);
			$scaddressp = $this->input->post("scaddressp",TRUE);
			$scmobs = $this->input->post("scmobs",TRUE);
			$scnods = $this->input->post("scnods",TRUE);
			$scobys = $this->input->post("scobys",TRUE);
			$sconos = $this->input->post("sconos",TRUE);
			$scodates = $this->input->post("scodates",TRUE);

			$awbone13 = $this->input->post("awbone13",TRUE);

			$dateofposting1 = $this->input->post("dateofposting1",TRUE);

			$spuoderny = $this->input->post("spuoderny",TRUE);
			$spuodernyno = $this->input->post("spuodernyno",TRUE);
			$spuodernyod = $this->input->post("spuodernyod",TRUE);

			$gPostingtiset = $this->input->post("gPostingtiset",TRUE);	//game

			$tcrankoo = $this->input->post("tcrankoo",TRUE);
			$tcdesoo = $this->input->post("tcdesoo",TRUE);
			$tcobyoo = $this->input->post("tcobyoo",TRUE);
			$tconooo = $this->input->post("tconooo",TRUE);
			$tcodateoo = $this->input->post("tcodateoo",TRUE);
			$adminstaff = $this->input->post("adminstaff",TRUE);

			$this->form_validation->set_rules("RankRankre", "RankRankre", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->rank_update($id,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$fone1,$vploc,$vpdis,$fone2,$noj,$jsdis,$fone3,$fone4,$fone5,$osgloc,$osgdis,$fone6,$fone7,$fone8,$fone9,$bsdnob,$bsddis,$bsdloc,$fone10,$fone11,$fone12,$lone1,$perdupod,$perdudis,$perduorno,$perduordate,$lone2,$dgppod,$dgpdis,$dgporno,$dgpordate,$lone3,$tertdpod,$tertddis,$tertdorno,$tertdordate,$sqone1,$sqone2,$sqone3,$sqone4,$sqone5,$sstgpod,$sstgdis,$sstgorno,$sstgordate,$sqone6,$swatpod,$swatdis,$swatorno,$swatordate,$paone1,$paone2,$awdpmpod,$awdpmorno,$awdpmordate,$paone3,$awdpfpod,$awdpforno,$awdpfordate,$paone4,$awdpompod,$awdpomorno,$awdpomordate,$paone5,$awdpofpod,$awdpoforno,$awdpofordate,$paone6,$paone7,$paone8,$paone9,$paone10,$paone11,$paone12,$paone13,$paone14,$paone15,$paone16,$paone17,$paone18,$paone19,$paone20,$paone21,$paone22,$ssone23,$dsopod,$dsoorno,$dsoordate,$ssone24,$csojalorno,$csojalordate,$ssone25,$mispatorno,$mispatordate,$ssone26,$othersnod,$othersnodis,$othersorno,$othersordate,$traning1,$traning2,$traning3,$btarin1,$btarin2,$btarin3,$btarin4,$btarin5,$btarin6,$btarin7,$btarin8,$btarin9,$btarin10,$awbone1,$awbone2,$pssawonof,$pssaworank,$pssawoordate,$awbone3,$osihonoo,$awbone4,$Readerosinbo,$Orderly,$telopr,$darrun,$awbone5,$bnkgdop,$awbone6,$bhogpog,$bhogdop,$awbone7,$tradestot,$tradestt,$tradesbat,$tradesdop,$tradesorno,$awbone8,$mtsecpod,$mtsecvehno,$mtsecdop,$mtsecorno,$awbone9,$quartbradop,$quartbraorno,$awbone10,$awbone11,$awbone12,$recrutnorb,$recrutorno,$recrutordate,$bmdone1,$bmdone2,$leavefrom,$leaveto,$bmdone3,$absentfrom,$absentddr,$absentdate,$leavefrom,$leaveto,$bmdone4,$bmdone5,$bmdone6,$bmdone7,$bmdone8,$bmdone9,$bmdone10,$instone1,$instone2,$instone3,$instone4,$instone10,$scname,$scrank,$scdes,$scpop,$scaddress,$scmob,$scnod,$scoby,$scono,$scodate,$tcrank,$tcdes,$tcoby,$tcono,$tcodate,$usdos,$usros,$dateofposting1,$classf1,$classf2,$classf3,$scnames,$scranks,$scdess,$scpops,$scaddressp,$scmobs,$scnods,$scobys,$sconos,$scodates,$paone23,$paone24,$paone27,$sqone7,$sqone8,$awbone13,$spuoderny,$spuodernyno,$spuodernyod,$gPostingtiset,$tcrankoo,$tcdesoo,$tcobyoo,$tconooo,$tcodateoo,$adminstaff ); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Posting has updated succesfully !');
					redirect('bt-add-rank/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Posting has not updated .');
					redirect('bt-add-rank/'.$id);
				}	
			}
			$this->load->view(F_BTALION.'manpower/rank');
		}/*Close*/

		/*Add Ammunition start*/
		public function edit_rank($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model-> fetchoneinfo('newosip',array('man_id' => $id));
			$data['id'] = $id;
			
			$RankRankre = $this->input->post("RankRankre",TRUE);
			$catop1 = $this->input->post("catop1",TRUE);
			$catop2 = $this->input->post("catop2",TRUE);
			$catop3 = $this->input->post("catop3",TRUE);
			$catop4 = $this->input->post("catop4",TRUE);
			$catop5 = $this->input->post("catop5",TRUE);

			$fone1 = $this->input->post("fone1",TRUE);
			$vploc = $this->input->post("vploc",TRUE);
			$vpdis = $this->input->post("vpdis",TRUE);
			$fone2 = $this->input->post("fone2",TRUE);
			$noj =  $this->input->post("noj",TRUE);
			$jsdis =  $this->input->post("jsdis",TRUE);
			$fone3 = $this->input->post("fone3",TRUE);
			$fone4 = $this->input->post("fone4",TRUE);
			$fone5 = $this->input->post("fone5",TRUE);
			$osgloc = $this->input->post("osgloc",TRUE);
			$osgdis = $this->input->post("osgdis",TRUE);
			$fone6 = $this->input->post("fone6",TRUE);
			$fone7 = $this->input->post("fone7",TRUE);
			$fone8 = $this->input->post("fone8",TRUE);
			$fone9 = $this->input->post("fone9",TRUE);
			$bsdnob = $this->input->post("bsdnob",TRUE);
			$bsddis = $this->input->post("bsddis",TRUE);
			$bsdloc = $this->input->post("bsdloc",TRUE);
			$fone10 = $this->input->post("fone10",TRUE);
			$fone11 = $this->input->post("fone11",TRUE);
			$fone12 = $this->input->post("fone12",TRUE);

     		$lone1 = $this->input->post("lone1",TRUE);
     		$perdupod = $this->input->post("perdupod",TRUE);
     		$perdudis = $this->input->post("perdudis",TRUE);
     		$perduorno = $this->input->post("perduorno",TRUE);
     		$perduordate = $this->input->post("perduordate",TRUE);
			$lone2 = $this->input->post("lone2",TRUE);
			$dgppod = $this->input->post("dgppod",TRUE);
			$dgpdis = $this->input->post("dgpdis",TRUE);
			$dgporno = $this->input->post("dgporno",TRUE);
			$dgpordate = $this->input->post("dgpordate",TRUE);
			$lone3 = $this->input->post("lone3",TRUE); 
			$tertdpod = $this->input->post("tertdpod",TRUE); 
			$tertddis = $this->input->post("tertddis",TRUE); 
			$tertdorno = $this->input->post("tertdorno",TRUE); 
			$tertdordate =  $this->input->post("tertdordate",TRUE); 
			$sqone1 = $this->input->post("sqone1",TRUE);
			$sqone2 = $this->input->post("sqone2",TRUE);
			$sqone3 = $this->input->post("sqone3",TRUE);
			$sqone4 = $this->input->post("sqone4",TRUE);
			$sqone5 = $this->input->post("sqone5",TRUE);
			$sstgpod = $this->input->post("sstgpod",TRUE);
			$sstgdis = $this->input->post("sstgdis",TRUE);
			$sstgorno = $this->input->post("sstgorno",TRUE);
			$sstgordate = $this->input->post("sstgordate",TRUE);
			$sqone6 = $this->input->post("sqone6",TRUE);
			$swatpod = $this->input->post("swatpod",TRUE);
			$swatdis = $this->input->post("swatdis",TRUE);
			$swatorno = $this->input->post("swatorno",TRUE);
			$swatordate = $this->input->post("swatordate",TRUE);

			$paone1 = $this->input->post("paone1",TRUE);
			$paone2 = $this->input->post("paone2",TRUE);
			$awdpmpod = $this->input->post("awdpmpod",TRUE);
			$awdpmorno = $this->input->post("awdpmorno",TRUE);
			$awdpmordate = $this->input->post("awdpmordate",TRUE);
			$paone3 = $this->input->post("paone3",TRUE);
			$awdpfpod = $this->input->post("awdpfpod",TRUE);
			$awdpforno = $this->input->post("awdpforno",TRUE);
			$awdpfordate = $this->input->post("awdpfordate",TRUE);
			$paone4 = $this->input->post("paone4",TRUE);
			$awdpompod = $this->input->post("awdpompod",TRUE);
			$awdpomorno = $this->input->post("awdpomorno",TRUE); 
			$awdpomordate = $this->input->post("awdpomordate",TRUE); 
			$paone5 = $this->input->post("paone5",TRUE);
			$awdpofpod = $this->input->post("awdpofpod",TRUE);
			$awdpoforno = $this->input->post("awdpoforno",TRUE);
			$awdpofordate = $this->input->post("awdpofordate",TRUE); 
			$paone6 = $this->input->post("paone6",TRUE);
			$paone7 = $this->input->post("paone7",TRUE);
			$paone8 = $this->input->post("paone8",TRUE);
			$paone9 = $this->input->post("paone9",TRUE);
			$paone10 = $this->input->post("paone10",TRUE);
			$paone11 = $this->input->post("paone11",TRUE);
			$paone12 = $this->input->post("paone12",TRUE);
			$paone13 = $this->input->post("paone13",TRUE);
			$paone14 = $this->input->post("paone14",TRUE);
			$paone15 = $this->input->post("paone15",TRUE);
			$paone16 = $this->input->post("paone16",TRUE);
			$paone17 = $this->input->post("paone17",TRUE);
			$paone18 = $this->input->post("paone18",TRUE);
			$paone19 = $this->input->post("paone19",TRUE);
			$paone20 = $this->input->post("paone20",TRUE);
			$paone21 = $this->input->post("paone21",TRUE); 
			$paone22 = $this->input->post("paone22",TRUE);
			$paone27 = $this->input->post("paone27",TRUE); 


			$ssone23 = $this->input->post("ssone23",TRUE);
			$dsopod = $this->input->post("dsopod",TRUE);
			$dsoorno = $this->input->post("dsoorno",TRUE);
			$dsoordate = $this->input->post("dsoordate",TRUE);
			$ssone24 = $this->input->post("ssone24",TRUE);
			$csojalorno = $this->input->post("csojalorno",TRUE);
			$csojalordate = $this->input->post("csojalordate",TRUE);
			$ssone25 = $this->input->post("ssone25",TRUE);
			$mispatorno = $this->input->post("mispatorno",TRUE);
			$mispatordate = $this->input->post("mispatordate",TRUE);
			$ssone26 = $this->input->post("ssone26",TRUE);
			$othersnod = $this->input->post("othersnod",TRUE);
			$othersnodis = $this->input->post("othersnodis",TRUE);
			$othersorno = $this->input->post("othersorno",TRUE);
			$othersordate = $this->input->post("othersordate",TRUE);

			$traning1 = $this->input->post("traning1",TRUE);
			$traning2 = $this->input->post("traning2",TRUE);
			$traning3 = $this->input->post("traning3",TRUE);

			$btarin1  = $this->input->post("btarin1",TRUE);
			$btarin2  = $this->input->post("btarin2",TRUE);
			$btarin3  = $this->input->post("btarin3",TRUE);
			$btarin4  = $this->input->post("btarin4",TRUE);
			$btarin5  = $this->input->post("btarin5",TRUE);
			$btarin6  = $this->input->post("btarin6",TRUE);
			$btarin7  = $this->input->post("btarin7",TRUE);
			$btarin8  = $this->input->post("btarin8",TRUE);
			$btarin9  = $this->input->post("btarin9",TRUE);
			$btarin10  = $this->input->post("btarin10",TRUE);


			$awbone1 = $this->input->post("awbone1",TRUE);
			$awbone2 = $this->input->post("awbone2",TRUE);
			$pssawonof = $this->input->post("pssawonof",TRUE);
			$pssaworank = $this->input->post("pssaworank",TRUE);
			$pssawoordate = $this->input->post("pssawoordate",TRUE);
			$awbone3 = $this->input->post("awbone3",TRUE);
			$osihonoo = $this->input->post("osihonoo",TRUE);
			$awbone4 = $this->input->post("awbone4",TRUE);
			$Readerosinbo = $this->input->post("Readerosinbo",TRUE);
			$Orderly = $this->input->post("Orderly",TRUE);
			$telopr = $this->input->post("telopr",TRUE);
			$darrun = $this->input->post("darrun",TRUE);
			$awbone5 = $this->input->post("awbone5",TRUE);
			$bnkgdop = $this->input->post("bnkgdop",TRUE);
			$awbone6 = $this->input->post("awbone6",TRUE);
			$bhogpog = $this->input->post("bhogpog",TRUE);
			$bhogdop =  $this->input->post("bhogdop",TRUE);
			$awbone7 = $this->input->post("awbone7",TRUE);
			$tradestot = $this->input->post("tradestot",TRUE);
			$tradestt = $this->input->post("tradestt",TRUE);
			$tradesbat = $this->input->post("tradesbat",TRUE);
			$tradesdop = $this->input->post("tradesdop",TRUE);
			$tradesorno = $this->input->post("tradesorno",TRUE);
			$awbone8 = $this->input->post("awbone8",TRUE);
			$mtsecpod = $this->input->post("mtsecpod",TRUE);
			$mtsecvehno = $this->input->post("mtsecvehno",TRUE);
			$mtsecdop = $this->input->post("mtsecdop",TRUE);
			$mtsecorno = $this->input->post("mtsecorno",TRUE);
			$awbone9 = $this->input->post("awbone9",TRUE);
			$quartbradop = $this->input->post("quartbradop",TRUE);
			$quartbraorno = $this->input->post("quartbraorno",TRUE);
			$awbone10 = $this->input->post("awbone10",TRUE);
			$awbone11 = $this->input->post("awbone11",TRUE);
			$awbone12 = $this->input->post("awbone12",TRUE);
			$recrutnorb = $this->input->post("recrutnorb",TRUE); 
			$recrutorno =  $this->input->post("recrutorno",TRUE); 
			$recrutordate =  $this->input->post("recrutordate",TRUE);

			$bmdone1 = $this->input->post("bmdone1",TRUE);
			$bmdone2 = $this->input->post("bmdone2",TRUE);
			$leavefrom = $this->input->post("leavefrom",TRUE);
			$leaveto = $this->input->post("leaveto",TRUE);
			$bmdone3 = $this->input->post("bmdone3",TRUE);
			$absentfrom = $this->input->post("absentfrom",TRUE);
			$absentddr = $this->input->post("absentddr",TRUE);
			$absentdate = $this->input->post("absentdate",TRUE);

			$bmdone4 = $this->input->post("bmdone4",TRUE);
			$bmdone5 = $this->input->post("bmdone5",TRUE);
			$bmdone6 = $this->input->post("bmdone6",TRUE);
			$bmdone7 = $this->input->post("bmdone7",TRUE);
			$bmdone8 = $this->input->post("bmdone8",TRUE);
			$bmdone9 = $this->input->post("bmdone9",TRUE);
			$bmdone10 = $this->input->post("bmdone10",TRUE);

			$instone1 = $this->input->post("instone1",TRUE);
			$instone2 = $this->input->post("instone2",TRUE);
			$instone3 = $this->input->post("instone3",TRUE);
			$instone4 = $this->input->post("instone4",TRUE);
			$instone10 = $this->input->post("instone10",TRUE);

			$scname = $this->input->post("scname",TRUE);
			$scrank = $this->input->post("scrank",TRUE);
			$scdes = $this->input->post("scdes",TRUE);
			$scpop = $this->input->post("scpop",TRUE);
			$scaddress = $this->input->post("scaddress",TRUE);
			$scmob = $this->input->post("scmob",TRUE);
			$scnod = $this->input->post("scnod",TRUE);
			$scoby = $this->input->post("scoby",TRUE);
			$scono = $this->input->post("scono",TRUE);
			$scodate = $this->input->post("scodate",TRUE);

			$tcrank = $this->input->post("tcrank",TRUE);
			$tcdes = $this->input->post("tcdes",TRUE);
			$tcoby = $this->input->post("tcoby",TRUE);
			$tcono = $this->input->post("tcono",TRUE);
			$tcodate = $this->input->post("tcodate",TRUE);

			$usdos =  $this->input->post("usdos",TRUE);
			$usros =  $this->input->post("usros",TRUE);

			$classf1 =  $this->input->post("classf1",TRUE);
			$classf2 =  $this->input->post("classf2",TRUE);
			$classf3 =  $this->input->post("classf3",TRUE);


			$scnames = $this->input->post("scnames",TRUE);
			$scranks = $this->input->post("scranks",TRUE);
			$scdess = $this->input->post("scdess",TRUE);
			$scpops = $this->input->post("scpops",TRUE);
			$scaddressp = $this->input->post("scaddressp",TRUE);
			$scmobs = $this->input->post("scmobs",TRUE);
			$scnods = $this->input->post("scnods",TRUE);
			$scobys = $this->input->post("scobys",TRUE);
			$sconos = $this->input->post("sconos",TRUE);
			$scodates = $this->input->post("scodates",TRUE);

			$paone23 = $this->input->post("paone23",TRUE);
			$paone24 = $this->input->post("paone24",TRUE); 
			$paone27 = $this->input->post("paone27",TRUE); 
			$sqone7 = $this->input->post("sqone7",TRUE);
			$sqone8 = $this->input->post("sqone8",TRUE);

			$awbone13 =  $this->input->post("awbone13",TRUE);

			$dateofposting1 = $this->input->post("dateofposting1",TRUE);

			$spuoderny = $this->input->post("spuoderny",TRUE);
			$spuodernyno = $this->input->post("spuodernyno",TRUE);
			$spuodernyod = $this->input->post("spuodernyod",TRUE);

			$gPostingtiset = $this->input->post("gPostingtiset",TRUE);

			$this->form_validation->set_rules("RankRankre", "RankRankre", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->rank_edit($id,$RankRankre,$catop1,$catop2,$catop3,$catop4,$catop5,$fone1,$vploc,$vpdis,$fone2,$noj,$jsdis,$fone3,$fone4,$fone5,$osgloc,$osgdis,$fone6,$fone7,$fone8,$fone9,$bsdnob,$bsddis,$bsdloc,$fone10,$fone11,$fone12,$lone1,$perdupod,$perdudis,$perduorno,$perduordate,$lone2,$dgppod,$dgpdis,$dgporno,$dgpordate,$lone3,$tertdpod,$tertddis,$tertdorno,$tertdordate,$sqone1,$sqone2,$sqone3,$sqone4,$sqone5,$sstgpod,$sstgdis,$sstgorno,$sstgordate,$sqone6,$swatpod,$swatdis,$swatorno,$swatordate,$paone1,$paone2,$awdpmpod,$awdpmorno,$awdpmordate,$paone3,$awdpfpod,$awdpforno,$awdpfordate,$paone4,$awdpompod,$awdpomorno,$awdpomordate,$paone5,$awdpofpod,$awdpoforno,$awdpofordate,$paone6,$paone7,$paone8,$paone9,$paone10,$paone11,$paone12,$paone13,$paone14,$paone15,$paone16,$paone17,$paone18,$paone19,$paone20,$paone21,$paone22,$ssone23,$dsopod,$dsoorno,$dsoordate,$ssone24,$csojalorno,$csojalordate,$ssone25,$mispatorno,$mispatordate,$ssone26,$othersnod,$othersnodis,$othersorno,$othersordate,$traning1,$traning2,$traning3,$btarin1,$btarin2,$btarin3,$btarin4,$btarin5,$btarin6,$btarin7,$btarin8,$btarin9,$btarin10,$awbone1,$awbone2,$pssawonof,$pssaworank,$pssawoordate,$awbone3,$osihonoo,$awbone4,$Readerosinbo,$Orderly,$telopr,$darrun,$awbone5,$bnkgdop,$awbone6,$bhogpog,$bhogdop,$awbone7,$tradestot,$tradestt,$tradesbat,$tradesdop,$tradesorno,$awbone8,$mtsecpod,$mtsecvehno,$mtsecdop,$mtsecorno,$awbone9,$quartbradop,$quartbraorno,$awbone10,$awbone11,$awbone12,$recrutnorb,$recrutorno,$recrutordate,$bmdone1,$bmdone2,$leavefrom,$leaveto,$bmdone3,$absentfrom,$absentddr,$absentdate,$leavefrom,$leaveto,$bmdone4,$bmdone5,$bmdone6,$bmdone7,$bmdone8,$bmdone9,$bmdone10,$instone1,$instone2,$instone3,$instone4,$instone10,$scname,$scrank,$scdes,$scpop,$scaddress,$scmob,$scnod,$scoby,$scono,$scodate,$tcrank,$tcdes,$tcoby,$tcono,$tcodate,$usdos,$usros,$dateofposting1,$classf1,$classf2,$classf3,$scnames,$scranks,$scdess,$scpops,$scaddressp,$scmobs,$scnods,$scobys,$sconos,$scodates,$paone23,$paone24,$paone27,$sqone7,$sqone8,$awbone13,$spuoderny,$spuodernyno,$spuodernyod,$gPostingtiset); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Rank has updated succesfully !');
					redirect('bt-edit-rank/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Rank has not updated .');
					redirect('bt-edit-rank/'.$id);
				}	
			}
	
				
			$this->load->view(F_BTALION.'manpower/updateranks',$data);
		}/*Close*/

				/*Add Ammunition start*/
		public function add_ranks($id){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$fone6 = $this->input->post("fone6",TRUE);
			$name = $this->input->post("name",TRUE);
			$rank = $this->input->post("rank",TRUE);
			$des = $this->input->post("des",TRUE);
			$pop = $this->input->post("pop",TRUE);
			$address = $this->input->post("address",TRUE);
			$mob = $this->input->post("mob",TRUE);
			$nod = $this->input->post("nod",TRUE);
			$oby = $this->input->post("oby",TRUE);
			$ono = $this->input->post("ono",TRUE);
			$odate = $this->input->post("odate",TRUE);




			$this->form_validation->set_rules("fone6", "fone6", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->seccover($id,$fone6,$name,$rank,$des,$pop,$address,$mob,
					$nod,$oby,$ono,$odate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-add-ranks/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated .');
					redirect('bt-add-ranks/'.$id);
				}	
			}
			$this->load->view(F_BTALION.'manpower/updateposting');
		}/*Close*/
		
				/*Add Ammunition start*/
		public function edit_ranks($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['info'] = $this->Btalion_model-> fetchoneinfo('seccover',array('man_id' => $id));
			
			$fone6 = $this->input->post("fone6",TRUE);
			$name = $this->input->post("name",TRUE);
			$rank = $this->input->post("rank",TRUE);
			$des = $this->input->post("des",TRUE);
			$pop = $this->input->post("pop",TRUE);
			$address = $this->input->post("address",TRUE);
			$mob = $this->input->post("mob",TRUE);
			$nod = $this->input->post("nod",TRUE);
			$oby = $this->input->post("oby",TRUE);
			$ono = $this->input->post("ono",TRUE);
			$odate = $this->input->post("odate",TRUE);




			$this->form_validation->set_rules("fone6", "fone6", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->editseccover($id,$fone6,$name,$rank,$des,$pop,$address,$mob,
					$nod,$oby,$ono,$odate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-edit-ranks/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated .');
					redirect('bt-edit-ranks/'.$id);
				}	
			}
			$this->load->view(F_BTALION.'manpower/updatingposting',$data);
		}/*Close*/

				/*Add Ammunition start*/
		public function add_pattech($id){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$fone6 = $this->input->post("fone6",TRUE);
			$rank = $this->input->post("rank",TRUE);
			$des = $this->input->post("des",TRUE);
			$oby = $this->input->post("oby",TRUE);
			$ono = $this->input->post("ono",TRUE);
			$odate = $this->input->post("odate",TRUE);


			$this->form_validation->set_rules("fone6", "fone6", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->tcover($id,$fone6,$rank,$des,$oby,$ono,$odate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-add-ranks/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated .');
					redirect('bt-add-ranks/'.$id);
				}	
			}
			$this->load->view(F_BTALION.'manpower/plist');
		}/*Close*/

		/*Add Ammunition start*/
		public function edit_pattech($id){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$fone6 = $this->input->post("fone6",TRUE);
			$rank = $this->input->post("rank",TRUE);
			$des = $this->input->post("des",TRUE);
			$oby = $this->input->post("oby",TRUE);
			$ono = $this->input->post("ono",TRUE);
			$odate = $this->input->post("odate",TRUE);

			$data['info'] = $this->Btalion_model-> fetchoneinfo('tcover',array('man_id' => $id));

			$this->form_validation->set_rules("fone6", "fone6", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Btalion_model->edittcover($id,$fone6,$rank,$des,$oby,$ono,$odate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-edit-pattech/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated .');
					redirect('bt-edit-pattech/'.$id);
				}	
			}
			$this->load->view(F_BTALION.'manpower/updateplist',$data);
		}/*Close*/

		public function serreport(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}
			$data['msk'] = $this->Btalion_model->osilist($data['ninfo']);
			$this->load->view(F_BTALION.'manpower/sreport',$data);
		}

		public function tempreport(){
			$this->load->helper('common');
			$info = $this->Btalion_model->fetchinfo('users',array('pid' => $this->session->userdata('userid')));
			$ninfo = array();
			foreach ($info as $value) {
				if($value->user_log == 4){
					$ninfo[] = $value->users_id;
				}
			}
			if(empty($ninfo[0])){
				$data['ninfo'] = $this->session->userdata('userid');
			}else{
				$data['ninfo'] = $ninfo[0];
			}
			$data['msk'] = $this->Btalion_model->osilist($data['ninfo']);
			$this->load->view(F_BTALION.'manpower/temreport',$data);
		}

		public function ipwepreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rkhc-rep');

			}
			
			$this->load->view(F_BTALION.'reports/arm',$data);
		}

		public function ipserreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rser-rep');

			}
			
			$this->load->view(F_BTALION.'reports/khcser',$data);
		}

		public function ipprcreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 3 ));

			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rprc-rep');
			}
			
			$this->load->view(F_BTALION.'reports/khcprc',$data);
		}

		public function ipmtreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');

			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 6));
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-mtoreporttwopp');
			}
			
			$this->load->view(F_BTALION.'reports/mt',$data);
		}

		public function ipmsoreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rmskone-rep');
			}
			
			$this->load->view(F_BTALION.'reports/mskone',$data);
		}

		public function ipmstreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rmsktwo-rep');
			}
			
			$this->load->view(F_BTALION.'reports/msktwo',$data);
		}

		public function ipmsthreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rmskhtree-rep');
			}
			
			$this->load->view(F_BTALION.'reports/mskthree',$data);
		}

		public function ipqtrreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');

			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 8));
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rqtr-rep');
			}
			
			$this->load->view(F_BTALION.'reports/qtr',$data);
		}

		public function iposioreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rosio-rep');
			}
			
			$this->load->view(F_BTALION.'reports/osione',$data);
		}

		public function ipositreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rosit-rep');
			}
			
			$this->load->view(F_BTALION.'reports/ositwo',$data);
		}

		public function iposithreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rosith-rep');
			}
			
			$this->load->view(F_BTALION.'reports/osithree',$data);
		}

		public function iposifrreport(){ /*pap bns wise*/
			$this->load->library('form_validation');
			$this->load->helper('security');
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 4 ));
			$BattalionUnitito = $this->input->post("BattalionUnitito",TRUE);
			
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				/*75*/
			  	$data=array('rid' => $BattalionUnitito);
				$this->session->set_userdata($data);
			  	redirect('bt-all-rosifr-rep');
			}
			
			$this->load->view(F_BTALION.'reports/osifour',$data);
		}

		public function rkhc_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'reports/armstatement',$data);
		}

		public function rser_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'reports/serviceammu_report',$data);
		}

		public function rprc_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->fetchinfogroupasc('newwepon_data',array('status' => 1),'arm');
			$this->load->view(F_BTALION.'reports/practice_report',$data);
		}

		public function rmt_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->mtolist($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/mtone',$data);
		}

		public function rmskone_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->mskgroup($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/antiroit',$data);
		}

		public function rmsktwo_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->mskgroup($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/tent',$data);
		}

		public function rmskhtree_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->mskgroup($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/mshthree',$data);
		}

		public function rqtr_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data["weapon"] = $this->Btalion_model->get_ipgqtrs($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/qrep',$data);
		}

		public function rosio_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/sumsec',$data);
		}

		public function rosit_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/sreport',$data);
		}

		public function rosith_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/temreport',$data);
		}

		public function rosifr_rep(){
			$this->load->helper('common');
			$data['info'] = $this->Btalion_model->fetchoneinfo('users',array('users_id' => $this->session->userdata('rid')));
			$data['msk'] = $this->Btalion_model->osilist($this->session->userdata('rid'));
			$this->load->view(F_BTALION.'reports/osifirst',$data);
		}

		public function rtc(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$this->load->library('pagination');

			$name = $this->input->get("name",TRUE);
			$bloodgroup = $this->input->get("bloodgroup",TRUE);
			$mobno = $this->input->get("mobno",TRUE);
			$rcnum = $this->input->get("rcnum",TRUE);
			$RankRankre = $this->input->get("RankRankre",TRUE);
			$eor1 =  $this->input->get("eor1",TRUE);
			$eor2 =  $this->input->get("eor2",TRUE);
			$eor3 =  $this->input->get("eor3",TRUE);
			$eor4 =  $this->input->get("eor4",TRUE);
			$eor5 =  $this->input->get("eor5",TRUE);
			$postate = $this->input->get("postate",TRUE);
			$pcity = $this->input->get("pcity",TRUE);
			$stts = $this->input->get("stts",TRUE);
			$UnderGraduate = $this->input->get("UnderGraduate",TRUE);
			$Graduate = $this->input->get("Graduate",TRUE);
			$PostGraduate = $this->input->get("PostGraduate",TRUE);
			$Doctorate = $this->input->get("Doctorate",TRUE);
			$gender = $this->input->get("gender",TRUE);
			$single =  $this->input->get("single",TRUE);
			$Modemdr = $this->input->get("Modemdr",TRUE);
			$Rankre = $this->input->get("Rankre",TRUE);
			$Enlistmentec = $this->input->get("Enlistmentec",TRUE);
			$InductionModeim = $this->input->get("InductionModeim",TRUE);
			$clit = $this->input->get("clit",TRUE);
			$dateofesnlistment1 = $this->input->get("dateofesnlistment1",TRUE);
			$dateofesnlistment2 =  $this->input->get("dateofesnlistment2",TRUE);
			$NamesofsCourses =  $this->input->get("NamesofsCourses1",TRUE);
			$NamesofsCourses2 =  $this->input->get("NamesofsCourses2",TRUE);
			$DateofRetirementdor = $this->input->get("DateofRetirementdor",TRUE);
			$dateofbirth = $this->input->get("dateofbirth",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$dateofbirthi = $this->input->get("dateofbirthi",TRUE);
			$height = $this->input->get("height",TRUE);
			$inch = $this->input->get("inch",TRUE);
			$Postingtiset = $this->input->get("Postingtiset",TRUE);
			$Postingtiset2 = $this->input->get("Postingtiset2",TRUE);
			$Postingtiset3 = $this->input->get("Postingtiset3",TRUE);
			$Postingtiset4 = $this->input->get("Postingtiset4",TRUE);
			$Postingtiset5 = $this->input->get("Postingtiset5",TRUE);
			$Postingtiset6 = $this->input->get("Postingtiset6",TRUE);
			$Postingtiset7 = $this->input->get("Postingtiset7",TRUE);
			$Postingtiset8 = $this->input->get("Postingtiset8",TRUE);
			$Postingtiset9 = $this->input->get("Postingtiset9",TRUE);

			
			
			$weapon = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,'Permanent',$this->session->userdata('userid'),$mobno);
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));

			$config = array();
			$config["base_url"] = base_url() . "bt-rtc";
			$config["total_rows"] = $weapon;
			$config["per_page"] = 100;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

        	$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
			$start = ($page-1)*$config["per_page"];
			//echo $start; die();
			//print_r($data["links"]); die();

		
			
			$data["weapon"] = $this->Btalion_model->get_usersosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,'Permanent',$config["per_page"],$start,$this->session->userdata('userid'),$mobno);

			$data["counts"] = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,'Permanent',$this->session->userdata('userid'),$mobno);
			$data['statelist'] = $this->Btalion_model->fetchinfo('state_list',array('state_status' => 1 ));

				$data['nm'] = $NamesofsCourses.$NamesofsCourses2;
			$this->form_validation->set_rules("BattalionUnitito", "BattalionUnitito", "trim");

			if ($this->form_validation->run()){
				$data["weapon"] = $this->Btalion_model->get_usersosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,'Permanent',$config["per_page"],$start,$this->session->userdata('userid'),$mobno);
				$data["counts"] = $this->Btalion_model->get_users_countosi($name,$bloodgroup,$rcnum,$RankRankre,$eor1,$eor2,$eor3,$eor4,$eor5,$postate,$pcity,$stts,$UnderGraduate,$Graduate,$PostGraduate,$Doctorate,$gender,$single,$Modemdr,$Rankre,$Enlistmentec,$InductionModeim,$clit,$dateofesnlistment1,$dateofesnlistment2,$NamesofsCourses,$NamesofsCourses2,$DateofRetirementdor,$dateofbirth,$dateofbirthi,$height,$inch,$Postingtiset,$Postingtiset2,$Postingtiset3,$Postingtiset4,$Postingtiset5,$Postingtiset6,$Postingtiset7,$Postingtiset8,$Postingtiset9,'Permanent',$this->session->userdata('userid'),$mobno);
				$data['nm'] = $NamesofsCourses.$NamesofsCourses2;	
			}
				
			
			$this->load->view(F_BTALION.'manpower/rtcper',$data);
		}
		
		public function rtctemp(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			
			$data['nm'] = '';
    		 $data['weapon'] = $this->Btalion_model->rtctemp();
			$this->load->view(F_BTALION.'old/rtctemp',$data);
		}

		public function controltemp(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			
    		 $data['weapon'] = $this->Btalion_model->ctroomtemp();
			$this->load->view(F_BTALION.'old/control',$data);
		}

		public function csotemp(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			
    		 $data['weapon'] = $this->Btalion_model->csomtemp();
			$this->load->view(F_BTALION.'old/control',$data);
		}

		public function mskqunlist(){
			$this->load->helper('common');
    		 $data['msk'] = $this->Btalion_model->fetchinfo('mskitemsqty',array('bat_id' => 
     		$this->session->userdata('userid')));
			
			$this->load->view(F_BTALION.'old/mat',$data);
		}

		public function mskqunlistadmin(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$dept = $this->input->post("ito",TRUE);
    		 $data['msk'] = $this->Btalion_model->fetchinfo('mskitemsqty',array('bat_id' => 
     		$dept));
			$data['uname'] = $this->Btalion_model->fetchinfo('users',array('user_log' => 5));
			$this->load->view(F_BTALION.'old/matlist',$data);
		}

		public function mskqunlistadminupdate($id){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');
			$is = $this->input->post("is",TRUE);
			$issu = $this->input->post("issu",TRUE);
			$this->form_validation->set_rules("is", "is", "trim");
			$data['infos'] = $this->Btalion_model->fetchoneinfo('mskitemsqty',array('mskitems_id' => $id));
			if ($this->form_validation->run()){
				$info = $this->Btalion_model->editmskadmin($id,$is,$issu);
				if($info == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-mskqunlistadminupdate/'.$id);
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated succesfully !');
					redirect('bt-mskqunlistadminupdate/'.$id);
				}
			}
    		 
			
			$this->load->view(F_BTALION.'old/matedit',$data);
		}
		
		public function tempdele(){
			$this->load->helper('common');
    		 $data['weapon'] = $this->Btalion_model->fetchinfo('tcover',array('bat_id' => $this->session->userdata('userid')));
			
			$this->load->view(F_BTALION.'manpower/templist',$data);
		}

		public function tempdeleit($id){
			$this->load->helper('common');
     		$add_web = $this->Btalion_model->tempdel('tcover',array('man_id' => $id, 'bat_id' => $this->session->userdata('userid')));
			
			if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-osi-old');
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated .');
					redirect('bt-osi-old');
				}	
		}

		public function secdele(){
			$this->load->helper('common');
     		$data['weapon'] = $this->Btalion_model->fetchinfo('seccover',array('bat_id' => $this->session->userdata('userid')));
			
			$this->load->view(F_BTALION.'manpower/seclist',$data);
		}

		public function secdeleit($id){
			$this->load->helper('common');
    		 $add_web = $this->Btalion_model->tempdel('seccover',array('man_id' => $id, 'bat_id' => $this->session->userdata('userid')));
			
			if($add_web == 1){
					$this->session->set_flashdata('success_msg','Info has updated succesfully !');
					redirect('bt-osi-old');
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated .');
					redirect('bt-osi-old');
				}	
		}

		public function posdele(){
			$this->load->helper('common');
     		$data['weapon'] = $this->Btalion_model->joinposting();
			
			$this->load->view(F_BTALION.'manpower/postlist',$data);
		}

		public function posdeleit($id){
			$this->load->helper('common');
     		$add_web = $this->Btalion_model->tempdel('newosip',array('man_id' => $id, 'batt_id' => $this->session->userdata('userid')));
     		$add_web1 = $this->Btalion_model->tempdel('seccover',array('man_id' => $id, 'bat_id' => $this->session->userdata('userid')));
     		$add_web2 = $this->Btalion_model->tempdel('tcover',array('man_id' => $id, 'bat_id' => $this->session->userdata('userid')));
			if($add_web == 1 || $add_web1 == 1 || $add_web2 == 1){
					$this->session->set_flashdata('success_msg','Posting delete succesfully !');
					redirect('bt-osi-old');
				}else{
					$this->session->set_flashdata('error_msg','Info has not updated .');
					redirect('bt-osi-old');
				}	
		}

		public function postingfilter(){
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->load->helper('common');

			$n = '';

			$fone1 = $this->input->post("fone1",TRUE);
			$fone2 = $this->input->post("fone2",TRUE);
			$fone3 = $this->input->post("fone3",TRUE);
			$fone4 = $this->input->post("fone4",TRUE);
			$fone5 = $this->input->post("fone5",TRUE);
			$fone6 = $this->input->post("fone6",TRUE);
			$fone7 = $this->input->post("fone7",TRUE);
			$fone8 = $this->input->post("fone8",TRUE);
			$fone9 = $this->input->post("fone9",TRUE);
			$fone10 = $this->input->post("fone10",TRUE);
			$fone11 = $this->input->post("fone11",TRUE);
			$fone12 = $this->input->post("fone12",TRUE);

     		$lone1 = $this->input->post("lone1",TRUE);
			$lone2 = $this->input->post("lone2",TRUE);
			$lone3 = $this->input->post("lone3",TRUE); 

			$sqone1 = $this->input->post("sqone1",TRUE);
			$sqone2 = $this->input->post("sqone2",TRUE);
			$sqone3 = $this->input->post("sqone3",TRUE);
			$sqone4 = $this->input->post("sqone4",TRUE);
			$sqone5 = $this->input->post("sqone5",TRUE);
			$sqone6 = $this->input->post("sqone6",TRUE);

			$paone1 = $this->input->post("paone1",TRUE);
			$paone2 = $this->input->post("paone2",TRUE);
			$paone3 = $this->input->post("paone3",TRUE);
			$paone4 = $this->input->post("paone4",TRUE);
			$paone5 = $this->input->post("paone5",TRUE);
			$paone6 = $this->input->post("paone6",TRUE);
			$paone7 = $this->input->post("paone7",TRUE);
			$paone8 = $this->input->post("paone8",TRUE);
			$paone9 = $this->input->post("paone9",TRUE);
			$paone10 = $this->input->post("paone10",TRUE);
			$paone11 = $this->input->post("paone11",TRUE);
			$paone12 = $this->input->post("paone12",TRUE);
			$paone13 = $this->input->post("paone13",TRUE);
			$paone14 = $this->input->post("paone14",TRUE);
			$paone15 = $this->input->post("paone15",TRUE);
			$paone16 = $this->input->post("paone16",TRUE);
			$paone17 = $this->input->post("paone17",TRUE);
			$paone18 = $this->input->post("paone18",TRUE);
			$paone19 = $this->input->post("paone19",TRUE);
			$paone20 = $this->input->post("paone20",TRUE);
			$paone21 = $this->input->post("paone21",TRUE);
			$paone27 = $this->input->post("paone27",TRUE); 


			$ssone23 = $this->input->post("ssone23",TRUE);
			$ssone24 = $this->input->post("ssone24",TRUE);
			$ssone25 = $this->input->post("ssone25",TRUE);
			$ssone26 = $this->input->post("ssone26",TRUE);

			$traning1 = $this->input->post("traning1",TRUE);
			$traning2 = $this->input->post("traning2",TRUE);
			$traning3 = $this->input->post("traning3",TRUE);


			$awbone1 = $this->input->post("awbone1",TRUE);
			$awbone2 = $this->input->post("awbone2",TRUE);
			$awbone3 = $this->input->post("awbone3",TRUE);
			$awbone4 = $this->input->post("awbone4",TRUE);
			$awbone5 = $this->input->post("awbone5",TRUE);
			$awbone6 = $this->input->post("awbone6",TRUE);
			$awbone7 = $this->input->post("awbone7",TRUE);
			$awbone8 = $this->input->post("awbone8",TRUE);
			$awbone9 = $this->input->post("awbone9",TRUE);
			$awbone10 = $this->input->post("awbone10",TRUE);
			$awbone11 = $this->input->post("awbone11",TRUE);
			$awbone12 = $this->input->post("awbone12",TRUE);


			$bmdone1 = $this->input->post("bmdone1",TRUE);
			$bmdone2 = $this->input->post("bmdone2",TRUE);
			$bmdone3 = $this->input->post("bmdone3",TRUE);
			$bmdone4 = $this->input->post("bmdone4",TRUE);
			$bmdone5 = $this->input->post("bmdone5",TRUE);
			$bmdone6 = $this->input->post("bmdone6",TRUE);
			$bmdone7 = $this->input->post("bmdone7",TRUE);
			$bmdone8 = $this->input->post("bmdone8",TRUE);
			$bmdone9 = $this->input->post("bmdone9",TRUE);

			$instone1 = $this->input->post("instone1",TRUE);
			$instone2 = $this->input->post("instone2",TRUE);
			$instone3 = $this->input->post("instone3",TRUE);
			$instone4 = $this->input->post("instone4",TRUE);

			$data['weapon'] = '';
			$data['n'] = $fone1.$fone2.$fone3.$fone4.$fone5.$fone6.$fone7.$fone8.$fone9.$fone10.$fone11.$fone12.$lone1.$lone2.$lone3.$sqone1.$sqone2.$sqone3.$sqone4.$sqone5.$sqone6.$paone1.$paone2.$paone3.$paone4.$paone5.$paone6.$paone7.$paone8.$paone9.$paone10.$paone11.$paone12.$paone13.$paone14.$paone15.$paone16.$paone17.$paone18.$paone19.$paone20.$paone21.$paone27.$ssone23.$ssone24.$ssone25.$ssone26.$traning1.$traning2.$traning3.$awbone1.$awbone2.$awbone3.$awbone4.$awbone5.$awbone6.$awbone7.$awbone8.$awbone9.$awbone10.$awbone11.$awbone12.$bmdone1.$bmdone2.$bmdone3.$bmdone4.$bmdone5.$bmdone6.$bmdone7.$bmdone8.$bmdone9.$instone1.$instone2.$instone3.$instone4;
			$this->form_validation->set_rules("fone1", "fone1", "trim");
			if ($this->form_validation->run()){
				$data['weapon'] = $this->Btalion_model->postingfilter($fone1,$fone2,$fone3,$fone4,$fone5,$fone6,$fone7,$fone8,$fone9,$fone10,$fone11,$fone12,$lone1,$lone2,$lone3,$sqone1,$sqone2,$sqone3,$sqone4,$sqone5,$sqone6,$paone1,$paone2,$paone3,$paone4,$paone5,$paone6,$paone7,$paone8,$paone9,$paone10,$paone11,$paone12,$paone13,$paone14,$paone15,$paone16,$paone17,$paone18,$paone19,$paone20,$paone21,$paone27,$ssone23,$ssone24,$ssone25,$ssone26,$traning1,$traning2,$traning3,$awbone1,$awbone2,$awbone3,$awbone4,$awbone5,$awbone6,$awbone7,$awbone8,$awbone9,$awbone10,$awbone11,$awbone12,$bmdone1,$bmdone2,$bmdone3,$bmdone4,$bmdone5,$bmdone6,$bmdone7,$bmdone8,$bmdone9,$instone1,$instone2,$instone3,$instone4); 	
					
			}
			
			$this->load->view(F_BTALION.'manpower/pstingfilter',$data);
		}
		
		public function download_weapon_figure_report($bat_ids,$weapon_ids_input,$hideZero=1){
			
			$this->load->model('Weapon/'.'Weapon_model');
			if(false){
				$data['battalions'] = array(6,45);
				$data['weapons'] = $this->getWeapons2();						//all the weapons ids
				$data['columns'] = array(
					0=>'total',
					1=>'issued',
					2=>'in_kot',
					3=>'lost',
					4=>'condemn',
					5=>'empty',
					6=>'remarks',
				);
				$battalions_array_of_ids = $data['battalions'];
				$weapon_ids_input = $data['weapons'];
				$columns_input = $data['columns'];
			}else{
				//var_dump($this->input->post());
				$battalions_array_of_ids = $bat_ids;
				//$weapon_names_array = $weapon_names;								//ids of the weapon

				//$weapons_input = $this->getWeaponIdsFromNames($weapons_input);

				$columns_input = array(
					0=>'total',
					1=>'issued',
					2=>'in_kot',
					3=>'lost',
					4=>'condemn',
					5=>'empty',
					6=>'remarks',
				);//$this->input->post('columns');
			}
			//$weapon_ids_input = $this->getWeaponIdsFromNames();
			$data = $this->getWeaponsDetail($battalions_array_of_ids, $weapon_ids_input, $columns_input);
			//var_dump($data);
			//die;
			$this->load->library('excel');
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("WEapon Detail, Generated by ERMS-PAP.")
										 ->setKeywords("Weapons Excel PAP ERMS")
										 ->setCategory("Weapon Detail");
			$counti= 0;
			//var_dump($data);
			$columns = $data['columns'];
			//var_dump($columns);
			$weaponsNames = $data['weaponNames'];
			//var_dump($weaponsNames);
			$battalionObjects = $data['battalionObjects'];

			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Weapon Figure View'); 
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(65);

			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'S.No.');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B1', 'Battalion Name');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C1', 'Weapon Name');
			$columnIndexes = array('A','B','C','D','E','F','G','H','I','J');
			$i=3;
			$row =1;
			foreach($columns as $col_k=>$col_name){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($columnIndexes[$i].$row, $col_name);
				$i++;
			}
			$row = 2;
			$serial_no = 1;
			
			
			foreach($battalionObjects as $battalion_id=>$weapons)
			{
				
				foreach($weapons as $weapon_id=>$weapon){
					
					if(($weapon_id!='battalionName')){
						if(($hideZero==0) || !(($weapon['total']==0) && ($weapon['issued']==0) && ($weapon['in_kot']==0) && ($weapon['lost']==0) && ($weapon['condemn']==0) && ($weapon['empty']==0) && ($weapon['remarks']=='-'))){
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $serial_no);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $weapons['battalionName']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $weaponsNames[$weapon_id]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $weapon['total']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $weapon['issued']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $weapon['in_kot']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $weapon['lost']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $weapon['condemn']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I'.$row, $weapon['empty']);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('J'.$row, $weapon['remarks']);
							$row++;
							$serial_no++;
						}
					}
				}
			}
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;


		}

		public function downloadFullView($bats,$weapons){
			//get the input
			//fetch data from db
			//genrate  excel data
			$this->load->model('Weapon/'.'Weapon_model');
			if(false){
				//$data['battalions'] = '6';
				$data['battalions'] = array(6,45);
				$data['weapons'] = $this->getWeapons2();
				
				$data['columns'] = array(
					0=>'total',
					1=>'issued',
					2=>'in_kot',
					3=>'lost',
					4=>'condemn',
					5=>'empty',
					6=>'remarks',
				);
				
				$battalions_array = $data['battalions'];
				$weapons_input = $data['weapons'];
				$columns_input = $data['columns'];
			}else{
				//var_dump($this->input->post());
				$battalions_array = $bats;
				$weapons_input = $weapons;		//ids

				//$weapons_input = $this->getWeaponIdsFromNames($weapons_input);

				$columns_input = array(
					0=>'total',
					1=>'issued',
					2=>'in_kot',
					3=>'lost',
					4=>'condemn',
					5=>'empty',
					6=>'remarks',
				);//$this->input->post('columns');
			}
			$data = $this->getWeaponsDetail( $battalions_array, $weapons_input, $columns_input);

			$this->load->library('excel');

			$objPHPExcel = new PHPExcel();

			// Set document properties
			$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
										 ->setLastModifiedBy("ERMS-PAP")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("WEapon Detail, Generated by ERMS-PAP.")
										 ->setKeywords("Weapons Excel PAP ERMS")
										 ->setCategory("Weapon Detail");


			$counti= 0;
			//var_dump($data);
			$columns = $data['columns'];
			//var_dump($columns);
			$weaponsNames = $data['weaponNames'];
			//var_dump($weaponsNames);
			$battalionObjects = $data['battalionObjects'];

			$objPHPExcel->createSheet($counti);
			$objPHPExcel->setActiveSheetIndex($counti);
			$objPHPExcel->getActiveSheet()->setTitle('Weapon Figure View'); 
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(65);

			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'S.No.');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B1', 'Battalion Name');
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C1', 'Weapon Name');
			$columnIndexes = array('A','B','C','D','E','F','G','H','I','J');
			$i=3;
			$row =1;
			foreach($columns as $col_k=>$col_name){
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue($columnIndexes[$i].$row, $col_name);
				$i++;
			}
			$row = 2;
			$serial_no = 1;
			foreach($battalionObjects as $battalion_id=>$weapons)
			{
				foreach($weapons as $weapon_id=>$weapon){
					if($weapon_id!='battalionName'){
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row, $serial_no);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row, $weapons['battalionName']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C'.$row, $weaponsNames[$weapon_id]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D'.$row, $weapon['total']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, $weapon['issued']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F'.$row, $weapon['in_kot']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G'.$row, $weapon['lost']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H'.$row, $weapon['condemn']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I'.$row, $weapon['empty']);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('J'.$row, $weapon['remarks']);
						$row++;
						$serial_no++;
					}
				}
			}
			//die;
//			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="data.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;


		}
	
		/**MSK
		
		*/
		public function securityEquipmentFigureView(){
			$this->load->helper('common');
			$this->permission->checkuserb();
			$main_data = array();
			$this->load->model('Msk_model');
		
			$equipmentNames = $this->Msk_model->getSecurityEquipmentNames();
		
			$battalions = $this->getBattalions();
			//var_dump($battalions);
			$battalionIds = array();
			foreach($battalions as $k=>$v){
				$battalionIds[] = $k;
			}
			//var_dump($battalions);
			
			//get the all security equipments
			//select * from deposit_material where typeofitem ='Security Equipment' and nameofItem in ($equipmentnames) and bat_id in($battalions);
			$equipments = $this->Msk_model->getSecurityEquipments($battalionIds);
			//echo $this->db->last_query();
			//var_dump($equipments);
		
			//initialize the parameters(
			
				//total overall records, (count(*) holding
				//issued,
				//total in store
				//servicable
				//unservicable
			//fetch all the equipments
			//increment the parameters
			$newBattalions = array();
			//echo '<BR>';
			$newBattalion2 = array();
			$i = 0;
			foreach($equipmentNames as $k=>$equipment){
				//echo '-----------------<br>';
				//var_dump($equipment);
				//echo '<BR>';
				$col = strtolower(str_replace(' ','_',$equipment->name));
				$main_data[$col]=array();
				//echo $equipment->name.'<BR>';	
				//$battalions[
				foreach($battalions as $k1=>$v1){
					//var_dump($v1);
					//echo '&nbsp;'.$k1.'-'.$v1.'<BR>';
					//$this->initializingParameters($v1);
					//$main_data[$col][$k1]['holding'] = 0;
					//$battalions[$k1]['holding'] = 0;
					$hold = $main_data[$col][$k1]['holding'] = 0;
					$newBattalions[$k1]['holding']=$hold;
					
					$issued = $main_data[$col][$k1]['issued'] = 0;
					$newBattalions[$k1]['issued']=$issued;
					
					$total_in_store = $main_data[$col][$k1]['total_in_store'] = 0;
					$newBattalions[$k1]['total_in_store']=$total_in_store;
					
					$serviceable = $main_data[$col][$k1]['serviceable'] = 0;
					$newBattalions[$k1]['serviceable']=$serviceable;
					
					$unserviceable = $main_data[$col][$k1]['unserviceable'] = 0;
					$newBattalions[$k1]['unserviceable']=$unserviceable;
					$newBattalions[$k1]['bn_id'] = $k1;
					//echo '['.$hold.']';
					//echo '['.$issued.']';
					//echo '['.$total_in_store.']';
					//echo '['.$serviceable.']';
					//echo '['.$unserviceable.']';
					//$main_data[$col][$k]['holding'] = $this->getHoldingStrengthOf($equipment->name;
					
					//echo '<BR>';
				}
				//echo '<BR>--';
				$newBattalion2[$i] =$newBattalions;
				$newBattalion2[$i]['name'] = $equipment->name;
				//echo '--<br>';
				$i++;
			}
			
			//var_dump($newBattalion2);
		
			foreach($newBattalion2 as $k=>$batn){
				
				//echo '<BR>';
				//echo $k;	
				//echo '<pre>';
				//var_dump($batn);
				//die;
				//echo '<BR>';
				foreach($batn as $k1=>$v1){
					
					//echo '<BR>';
					//echo '<h3>'.$k1.'<h3>';
					//var_dump($v1);
					//echo '<BR>';
					//die('skdfj');
					if(is_array($v1)){
						//var_dump($v1);
						//echo '<BR><BR><BR>Equipment name : '.$batn['name'].'<BR>';
						///echo 'Bat id : '.$newBattalion2[$k][$k1]['bn_id'].'<BR>';

						$sans = info_fetch_msksan($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						if($sans!=''){
							$newBattalion2[$k][$k1]['sanction'] = $sans->san;
						}else{
							$newBattalion2[$k][$k1]['sanction'] = 0;
						}
						//echo 'Sanction : '.$newBattalion2[$k][$k1]['sanction'].'<BR>';
						
						$issued = info_fetch_countmskitemiis($batn['name'],$newBattalion2[$k][$k1]['bn_id']);
						if($issued!=''){
							$newBattalion2[$k][$k1]['issued'] = $issued->issued;
						}else{
							$newBattalion2[$k][$k1]['issued'] = 0;
						}
						//echo 'Issued : '.$newBattalion2[$k][$k1]['issued'].'<BR>';
						
						$asec = '';		//servicable A condigion
						$ser1 = info_fetch_countserviable($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						if($ser1!=''){ $asec .= $ser1->recqut;}
						$bsec = '';		//servicable B contions
						$ser1 = info_fetch_countunserviable($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						if($ser1!=''){ $bsec .= $ser1->total;}
						$csec = '';
						$ser1 = info_fetch_countunserviables($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						$ser2 = info_fetch_countunserviablesdep($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						$csec.= $ser1->recqut;		
						
						
						$holding =  $asec + $bsec + $csec;
						
						$newBattalion2[$k][$k1]['holding'] = $holding;
						//echo 'Holding : '.$newBattalion2[$k][$k1]['holding'].'<BR>';
						
						
						$total_in_store = $newBattalion2[$k][$k1]['holding'] - $newBattalion2[$k][$k1]['issued'];
						$newBattalion2[$k][$k1]['total_in_store'] = $total_in_store;
						//echo 'Total in store : '.$newBattalion2[$k][$k1]['total_in_store'].'<BR>';
						
						//serviceable
						$ser1 = info_fetch_countunserviables($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						$ser2 = info_fetch_countunserviablesdep($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						$z = $ser1->recqut + $ser2->quantity;
						$newBattalion2[$k][$k1]['serviceable'] = $newBattalion2[$k][$k1]['issued'] + $newBattalion2[$k][$k1]['total_in_store'] - $z;
						//echo 'servicable : '.$newBattalion2[$k][$k1]['serviceable'].'<BR>';
						
						//unservicable
						$ser1 = info_fetch_countunserviables($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						$ser2 = info_fetch_countunserviablesdep($batn['name'],$newBattalion2[$k][$k1]['bn_id']); 
						$newBattalion2[$k][$k1]['unserviceable'] = $ser1->recqut + $ser2->quantity; 
						//echo 'Unservicable : '.$newBattalion2[$k][$k1]['unserviceable'].'<BR>';
						
						$newBattalion2[$k][$k1]['serviceable_in_store'] = $newBattalion2[$k][$k1]['holding']-$newBattalion2[$k][$k1]['issued']-$newBattalion2[$k][$k1]['unserviceable'];
						//echo 'Available in store at Present'.$newBattalion2[$k][$k1]['serviceable_in_store'];
						
						//available in store
						
						//var_dump($newBattalion2);
						
					}
				}
				//$this->getHolding($equipments);
				//die;
			}
			//var_dump($newBattalion2);
			//echo '<HR>';
			foreach($newBattalion2 as $bnid=>$equipments){
				//	var_dump($equipments);
				
				//echo '<BR><br>';
				//echo "<B>".$equipments['name'].'</b>';
				
				
				//if(false){
				foreach($equipments as $k=>$equipment){
					//echo '<br>Equipment<BR>';
					if($k!='name'){
					//echo $battalions[$k];
					//echo '  Holding : '.$equipments[$k]['holding'];
					//echo '  Issued : '.$equipments[$k]['issued'];
					//echo '  Total in Store : '.$equipments[$k]['total_in_store'];
					//echo '  serviceable : '.$equipments[$k]['serviceable'];
					//echo '  Unserviceable : '.$equipments[$k]['unserviceable'];
					//echo '  At present Available in store  : '.$equipments[$k]['serviceable_in_store'];
					
					//var_dump($equipment);
					if(is_array($equipment)){
						foreach($equipment as $k1=>$v1){
							
						}
					}
					//$equipmentbn_id
					}
				}
			}
			$data['battalions'] = $battalions;
			$data['newBattalion2'] = $newBattalion2;
			$this->load->view('Btalion/material/equipments.php',$data);
			
		}
		public function getHolding($equipments,$bnid,$equipmentName){
			$hold = 0;
			foreach($equipments as $k=>$v){
				//echo '<BR>';
				//var_dump($v);
				if($equipmentName==$v->nameofitem && $bnid==$v->bat_id){
					$hold++;
				}
			}
			//echo '<h2>'.$hold.'</h2>';
			return $hold;
			
		}
		public function getIssued($equipments,$bnid,$equipmentName){
			$issued = 0;
			foreach($equipments as $k=>$v){
				if($equipmentName==$v->nameofitem && $bnid==$v->bat_id){
					$hold++;
				}
			}
			//echo '<h2>'.$hold.'</h2>';
			return $hold;
		}
		/*
			get all the battalions
		*/
		public function getBattalions(){
			$this->load->model('Msk_model');
			$battalion_objects = $this->Msk_model->getBattalions();
			$battalion_array = array();
			foreach($battalion_objects as $bat){
				$battalion_array[$bat->users_id] = $bat->user_name;
			}
			return $battalion_array;
		}
	}
?>