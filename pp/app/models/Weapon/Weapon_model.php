<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Weapon_model extends CI_Model{

		function getAllWeapons($limit=20,$start=0,$arm_name = NULL,$bodyno = ''){
                    //var_dump($limit);
                    //die;
			$this->db->select('old_weapon.* , newwepon_data.bore');
			$where = array(
				'bat_id'=>$this->session->userdata('userid')
			);
			$this->db->where($where);
			if($arm_name=='--All--' && $arm_name!=NULL && $arm_name!=''){
			
			}else{
				$this->db->where_in('tow',$arm_name);
			}
			if($bodyno!=''){
				$this->db->where_in('bono',$bodyno);
			}
			$this->db->join('newwepon_data','old_weapon.tow = newwepon_data.arm');
			//$start = ($start)*$limit;
                        if($limit!=null){
                            $this->db->limit($limit,$start);
                        }
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			$info = $query->result();
			return $info;	
		}		
		function get_weapon_figures_for_consolidate_data($battalions,$weapons){
			$this->db->select('old_weapon.*');
			$this->db->where_in('old_weapon.bat_id',array_keys($battalions));
			$this->db->where_in('tow',$weapons);
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			$result = $query->result();
			return $result;
		}
		function get_weapon_figure_data($battalions,$weapons){
			$this->db->select('old_weapon.*');
			$this->db->where_in('old_weapon.bat_id',array_keys($battalions));
			$this->db->where_in('tow',$weapons);
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			$result = $query->result();
			return $result;
		}
		function getWeaponData($battalions,$weapons){
			$this->db->select('*');
			$this->db->where_in('old_weapon.bat_id',array_keys($battalions));
			$this->db->where_in('tow',$weapons);
			$query = $this->db->get('old_weapon');
                        
			//echo $this->db->last_query();
                        //die;
			$result = $query->result();
			return $result;
			/*$this->db->select('old_weapon.* ,issue_arm.*');
			$this->db->join('issue_arm', 'issue_arm.wbodyno = old_weapon.old_weapon_id');
			$this->db->from('old_weapon');
			$this->db->where_in('old_weapon.bat_id',array_keys($battalions));
			$this->db->where_in('tow',$weapons);
			//$this->db->where('old_weapon.bat_id','issue_arm.bat_id');	
			$this->db->where('issue_arm.atype','Service');
			$query = $this->db->get();
			echo $this->db->last_query();
			$result = $query->result();
			return $result;*/
		}
                function getWeaponRemarks($battalions,$weapons){
			$this->db->select('*');
			$this->db->where_in('wep_report.bat_id',array_keys($battalions));
			$this->db->where_in('wep',$weapons);
			$query = $this->db->get('wep_report');
                        $result = $query->result();
			return $result;
		}
		
		/**
	will return the total number of weapons  ok
	*/
		function get_count($arms = NULL, $bodyno=''){
			$this->db->select('count(*) as total');
			$where = array(
				'bat_id'=>$this->session->userdata('userid')
			);
			$this->db->where($where);
			if($arms=='--All--' && $arm_name!=NULL && $arm_name!=''){
				
			}else{
				$this->db->where_in('tow',$arms);
			}
			if($bodyno!=''){
				$this->db->where_in('bono',$bodyno);
			}

			$this->db->join('newwepon_data','old_weapon.tow = newwepon_data.arm');
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			$info = $query->result();
			return $info[0]->total;
		}

		function getDistricts($state){
			if($state==null){
				$state = 'PUNJAB';
			}
			$this->db->select('*');
			$this->db->where('state',$state);
			$this->db->order_by('city');
			$query = $this->db->get('state_list');
			return $query->result();
		}
		function getDistrictsByIds($ids){
			
			$this->db->select('*');
			//$this->db->where('state',$state);
			$this->db->where_in('state_list_id',$ids);
			
			$query = $this->db->get('state_list');
			return $query->result();
		}
		function weaponca($wbodyno,$rcno,$rcdate,$ammu_qty,$location){		//saving data in table moving weapon back to center armour (CA)
			//echo '<br>body no : '.$wbodyno.": Rc No : ".$rcno.": rc date : ".$rcdate.'; Ammu qty : '.$ammu_qty.'<br>';
			$task = false;
			$success = false;
			$error = false;
			$update = false;
			$this->db->trans_begin();
			
			$this->db->select('*');
			$this->db->where('old_weapon_id',$wbodyno);	
			$query = $this->db->get('old_weapon');
			$fetch = $query->row();
			$wname = $fetch->tow;
			$wbutt = $fetch->buno;
			$wbono = $fetch->bono;
			$addvalue = array('wname' => $wname, 'wbutt' => $wbutt, 'wbono' => $wbono,'rcno' => $rcno,'rcdate' => $rcdate, 'bat_id' => $this->session->userdata('userid'),'ammu_qty'=>$ammu_qty,'where_it_is'=>$location);
			$task = $this->db->insert('cawep',$addvalue);
		//	echo '<br> Qeury no. 1 : ';
		//	echo $this->db->last_query();
			
			$this->db->where('bono',$wbono);
			$task = $this->db->delete('old_weapon');
			//echo '<BR>Data deleted from old_weapon<BR>';
			
			$this->db->select('*');
			$where = array(
				'bat_id' => $this->session->userdata('userid'),
				'arm'=>$wname
			);
			//var_dump($where);
			$this->db->where($where);
			$query = $this->db->get('newwepon_dataqty');

			$fetch = $query->row();
                        if($fetch!=null){
                            $quantity = $fetch->qty;
                        }else{
                            $quantity = 0;
                        }
			
			$new_quantity = $quantity - $ammu_qty;
			$i = false;
			if($new_quantity>=0){
				$update = true;
				$data = array('qty'=>$new_quantity);
				$where = array(
					'bat_id'=> $this->session->userdata('userid'),
					'arm'=>$wname
				);
				$this->db->where($where);
				$i = $this->db->update('newwepon_dataqty',$data);
			}else{
				$update = false;
			}
			if($i && $task && $update){
				$this->db->trans_commit();
				//echo 'done';
				$success =true;
				$a = 1;
			}else{
				$error = 'ERROR: IN kot ammunition is less';
				//echo $error.':'.$wbodyno.':';
				$this->db->trans_rollback();
				$success = false;
				$a = 0;
				$this->session->set_flashdata('error_msg','Failed To Save. (weaponca!!)');
			}

			return array('success'=>$success,'status'=>$a,'error'=>$error);
			//die;
		}
		public function quantity_check($quantity,$bodyno){
			//echo '['.$quantity.','.$bodyno.']';
			$this->db->select('tow');
			$where = array(
				'old_weapon_id'=>$bodyno,
				'bat_id'=>$this->session->userdata('userid')
			);
			$this->db->where($where);	
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			$fetch = $query->row();
			
			$tow = $fetch->tow;
			//echo $tow;	
			//echo $this->db->last_query();
			$this->db->select('qty');
			$where = array(
				'bat_id'=>$this->session->userdata('userid'),
				'arm'=>$tow
			);
			$this->db->where($where);
			$query = $this->db->get('newwepon_dataqty');
			$data = $query->row();
			//echo $this->db->last_query();
			//die;
                        if($data!=null){
                            if($quantity<=$data->qty)
                            {
                                return true;
                            }else{
                                return false;
                            }
                        }else{
                            return true;
                        }
		}

		/*
		get the all of the names of wepaon from 'newwepon_data' table
		*/
		function get_arms(){
			$this->db->select('*');
			$this->db->where('type','weapon');
			$this->db->order_by('arm');
			$query = $this->db->get('newwepon_data');
			$data = $query->result();
			return $data;
		}
		/*function fetchWeapons($table,$where,$orderby,$order)
		{
			$this->db->select('*');
			 foreach($where as $list =>$key):
			 	$this->db->where($list,$key);
			 endforeach;
			 	$this->db->order_by($orderby,$order);
			 $query = $this->db->get($table);
			 $info = $query->result();
			 return $info;	
		}*/

		 /*Fetch all info start*/
		/*function fetchinfo($table,$where){
			 $this->db->select('*');
			 foreach($where as $list =>$key):
			 	$this->db->where($list,$key);
			 endforeach;
			 $query = $this->db->get($table);
			 $info = $query->result();
			 return $info;
		}/*Close*/

		function getBattalions($userid=null){
			$this->db->select(array('users_id','user_name'));
			//$this->db->like('user_name','khc');
                        if($userid!=null){
                            if($userid==211){
                                $this->db->group_start();
                                $this->db->like('user_name','cdo');
                                $this->db->or_where('user_name','Ctc.bhg.khc');
                                $this->db->group_end();
                            }else if($userid==209){
                                $this->db->group_start();
                                $this->db->like('user_name','irb');
                                $this->db->or_where('user_name','Rtc.lk.khc');
                                $this->db->group_end();
                            }
                        }
			$this->db->like('user_log',3);
			$query = $this->db->get('users');
                        //echo $this->db->last_query();
			return $query->result();
		}
		function getBattalionById($id){
			$this->db->select(array('users_id','user_name'));
			//$this->db->like('user_name','khc');
			$this->db->like('user_log',3);
			$this->db->where_in('users_id',$id);
			$query = $this->db->get('users');
			return $query->result();
		}

		/* ajax*/
		function getBodyNumbers($arms,$exclude_body_numbers,$bat_id){
		//fetch teh body numbers form old
			$this->db->select('old_weapon_id,tow,bono,bore');

			$this->db->where('bat_id',$bat_id);
			$this->db->where_in('tow',$arms);
			if(!empty($exclude_body_numbers)){
				$this->db->where_not_in('bono',$exclude_body_numbers);
			}
			$this->db->join('newwepon_data','old_weapon.tow = newwepon_data.arm');
			$this->db->order_by('tow');
			$this->db->order_by('bono');
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			$weapons = $query->result();
			//echo $this->db->last_query();
			//echo json_encode($weapons);
			return $weapons;
		}

		function getBodyNumbersOfSelectedWeapons($selected_weapons,$bat_id){
		//fetch teh body numbers form old
			$this->db->select('old_weapon_id,tow,bono,bore');

			$this->db->where('bat_id',$bat_id);
			$this->db->where_in('tow',$selected_weapons);
			/*if(!empty($exclude_body_numbers)){
				$this->db->where_not_in('bono',$exclude_body_numbers);
			}*/
			$this->db->join('newwepon_data','old_weapon.tow = newwepon_data.arm');
			$this->db->order_by('tow');
			$query = $this->db->get('old_weapon');
			
			$weapons = $query->result();
			//echo $this->db->last_query();
			//echo json_encode($weapons);
			return $weapons;
		}

		function getWeaponCount($bat_id,$weapon_name,$status){
			$this->db->select('count(*) as total');
			$this->db->where('bat_id',$bat_id);
			$this->db->where('tow',$weapon_name);
			$this->db->where('staofserv',$status);
			$query = $this->db->get('old_weapon');
			$result = $query->result();
			return $result->total;
		}



		function getBattalionWeaponsDetail($bat_id,$weapon_names,$status){
			$this->db->select('*');
			$this->db->where('bat_id',$bat_id);
			$this->db->where_in('tow',$weapon_names);
			//$this->db->where_in('staofserv',$status);
			$query = $this->db->get('old_weapon');
			
			$result = $query->result();
			//echo $this->db->last_query();
			return $result;
		}
		/**
		*	====================================================================USER IN Btallion controller -------------------
		*/
		function getBattalionsWeaponsDetail($battalions_array,$weapon_names,$status){
			$this->db->select('*');
			$this->db->where_in('bat_id',$battalions_array);
			$this->db->where_in('tow',$weapon_names);
				//$this->db->where_in('staofserv',$status);
			$query = $this->db->get('old_weapon');
			
			$result = $query->result();
			return $result;
		}

		/***                  ==================================================================================================
		*/	
		function getBattalionNameById($bat_id){
			$this->db->select('user_name');
			$this->db->where('users_id',$bat_id);
			$query = $this->db->get('users');
			$result = $query->result();
			return $result[0]->user_name;
		}

		public function get_weapon_names($ids){
			$this->db->select('*');
			$this->db->where_in('nwep_id',$ids);
			
			$query = $this->db->get('newwepon_data');
			$result = $query->result();
			//echo $this->db->last_query();
			return $result;
		}

		public function getWeaponIds($weapon_name_array){
			$this->db->select('*');
			$this->db->where_in('arm',$weapon_name_array);
			$this->db->order_by('arm');
			$query = $this->db->get('newwepon_data');
			$result = $query->result();
			return $result;
		}
		
		function fetchinfo($table,$where){
			$this->db->select('*');
			foreach($where as $list =>$key):
			$this->db->where($list,$key);
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
			return $info;
		}/*Close*/
		function edit_arm($id,$tow,$wbodyno,$wbuttno,$vdate,$tows,$mq,$rcvno,$rdate,$cw,$ssw,$suw,$doi){
		if($cw=='Serviceable'){
				$status =$ssw;
			}else{
				$status = $suw;
			}	
			$addvalue = array('tow' => $tow, 'bono' => $wbodyno, 'buno' =>  $wbuttno, 'recform' => $vdate, 'recmod' => $tows , 'recvoc' => $rcvno, 'recdate' => $rdate,'magrec' => $mq,'conofwap' => $cw, 'staofserv' => $status,'doi' => $doi, 'bat_id' => $this->session->userdata('userid'));
			$this->db->where('old_weapon_id',$id);
			$task = $this->db->update('old_weapon',$addvalue);

			if($task){
				return 1;
			}else{
				return 0;
			}	 
		}
		function weaponlist(){
			$this->db->select('*');
			$this->db->from('newwepon_data');
			//$this->db->group_by('arm');
			$this->db->where('type','weapon');
			$query = $this->db->get();
			$info = $query->result();
			return $info;
		}
		
		/*Issue Arm*/
	function depositissue_arm($id,$dtype,$atype,$lcarts,$mcarts,$ecarts,$locarts,$mcartp,$ecratp,$locartp,$amqunt,$wlocarts,$wmcartp,$wecratp,$wlocartp,$wamqunt,$abc,$cw,$ssw,$suw,$abcp,$wlocartsp,$wmcartpp,$wecratpp,$wlocartpp,$wamquntp,$llcartp){
            //$this->db->trans_start();
		$this->db->select('*');
		$this->db->where('issue_arm_id',$id);	
		$this->db->where('bat_id',$this->session->userdata('userid'));
		$query = $this->db->get('issue_arm');
		//echo $this->db->last_query();
		$fetch = $query->row();
                //echo $dtype;
    //            die;
			if($dtype == 'Weapon'){	
			//die('Weapon');
				//var_dump($fetch);
                                $n = explode('@#@',$fetch->abore);
                                if(count($n)==2){
                                    echo 'exploded';
                                }else{
                                    $n = explode(',', $fetch->abore);
                                }
				$addvalue = array('dtype' => $dtype,'weapon' => $n[1], 'bore' => $n[0], 'issue_arm_id' => $id, 'arm_id' => $atype, 'ibat_id' => $this->session->userdata('userid'));
				$task2 = $this->db->insert('deposit_ammu',$addvalue);
				$ups = array('istatus' => 0);
				$this->db->where('issue_arm_id',$fetch->issue_arm_id);
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$tas = $this->db->update('issue_arm',$ups);
                                //echo 'hi1';
                                //echo $this->db->last_query();
	
				$this->db->where('old_weapon_id',$fetch->wbodyno);
				$up = array('staofserv' => 'In kot', 'conofwap' =>$cw,'staofserv' => $ssw.''.$suw );
				$this->db->where('bat_id',$this->session->userdata('userid'));
				$task = $this->db->update('old_weapon',$up);
			//echo $this->db->last_query();
                         //echo 'hi2';
			
				if(isset($abc)){
					 //echo 'hi3';
                                    $n = explode('@#@',$fetch->abore);
                                    if(count($n)==2){
                                        echo 'exploded';
                                    }else{
					$n = explode(',', $fetch->abore);
                                    }
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
					
					if($wamqunt >  $info->issued){
                                            //die;
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
                                                        //echo $this->db->last_query();
					}
					$wlocarts = (null==$wlocarts)?0:$wlocarts;
					$wmcartp = (null== $wmcartp)?0: $wmcartp;
					$wecratp = (null== $wecratp)?0: $wecratp;
					$wlocartp = (null==$wlocartp)?0:$wlocartp;
					
					$t = $wlocarts + $wmcartp + $wecratp + $wlocartp;
						$addvalue = array('dtype' => $dtype,'weapon' => $n[1], 'bore' => $n[0], 'issue_arm_id' => $id, 'ammutype' => 'Service','lcat' => $wlocarts,'mcat' => $wmcartp ,'ecat' => $wecratp,'locat' => $wlocartp,'weapon' => $n[1], 'bore' => $n[0], 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));
						$task2 = $this->db->insert('deposit_ammu',$addvalue);
				}

				if(isset($abcp)){
					
                                    $n = explode('@#@',$fetch->ammubore);
                                    if(count($n)==2){
                                        echo 'exploded';
                                    }else{
                                        $n = explode(',', $fetch->ammubore);
                                    }
					
					$this->db->select('*');
					if($n[1] !=''){
						$this->db->where('arm',$n[1]);	
					}
							$this->db->where('bore',$n[0]);
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$query = $this->db->get('newwepon_dataqtyp');
                                                        //echo $this->db->last_query();
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
                                                                //echo $this->db->last_query();
                                                                //echo $this->db->last_query();
						}
						
						
						$t = $wlocartsp + $wmcartpp + $wecratpp + $wamquntp;
							$addvalue = array('dtype' => $dtype,'weapon' => $n[1], 'bore' => $n[0], 'issue_arm_id' => $id, 'ammutype' => 'Practice','lcat' => $wlocartsp,'mcat' => $wmcartpp,'ecat' => $wecratpp,'locat' => $wlocartpp, 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));
				
							$task2 = $this->db->insert('deposit_ammu',$addvalue);
                                                        //echo $this->db->last_query();
					}
			//die;
					if($task && $task2){
							return 1;
						}else{
							return 0;
						}
                                                
			}else if($dtype=="Ammunition"){
				//echo 'Ammunition';
                                //die;
				if( $atype == 'Service'){
					//die('Service');
                                    $n = explode('@#@',$fetch->abore);
                                    if(count($n)==2){
                                        echo 'exploded';
                                    }else{
					$n = explode(',', $fetch->abore);
                                    }
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
					
					//$t = $lcarts + $mcarts + $mcartp + $ecarts + $ecratp + $locarts + $locartp;
					$t = $amqunt;
					if($t >  $info->issued || $t<0){
                                           // die;
						return 0;
					}else{
							$nq =  $info->qty + $t;
							$niq = $info->issued - $t;
							$adds = array('qty' => $nq, 'issued' => $niq);
							if($n[1] !=''){
								$this->db->where('arm',$n[1]);	
								//$this->db->where('bore',$n[0]);
								$this->db->where('bat_id',$this->session->userdata('userid'));
								$task = $this->db->update('newwepon_dataqty',$adds);
							}
					}
						
					$addvalue = array('dtype' => $dtype, 'issue_arm_id' => $id, 'ammutype' => $atype,'lcat' => $lcarts,'mcat' => $mcarts .$mcartp,'ecat' => $ecarts.$ecratp,'locat' => $locarts.$locartp, 'weapon' => $n[1], 'bore' => $n[0], 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));
					
					$task2 = $this->db->insert('deposit_ammu',$addvalue);
					
					//update in issue_arm table
					//update amqunt
					$qut__ = $fetch->amqunt - $t;
					$data = array('amqunt'=>$qut__);
					$this->db->where('issue_arm_id',$id);
					$this->db->where('bat_id',$this->session->userdata('userid'));
					$task3 = $this->db->update('issue_arm',$data);
					//die;
					if($task && $task2 && $task3)
					{ 
						return 1;
					}else{
						return 0;
					}
				}elseif($atype == 'Practice' ){
					//echo 'Practice';
//die;
					$n = explode('@#@', $fetch->ammubore);
                                        if(count($n)==2){
                                            
                                        }else{
                                            $n = explode(',', $fetch->ammubore);
                                        }
					$this->db->select('*');
                                        if(true){
                                            if($n[1] !=''){
                                                    $this->db->where('arm',$n[1]);	
                                            }
                                            //var_dump($fetch);
                                            $this->db->where('bore',$n[0]);
                                            if($fetch->pissueto=='Other Battalion Unit'){
                                                $this->db->where('bat_id',$fetch->pissuetoname);
                                            }else{
                                                $this->db->where('bat_id',$this->session->userdata('userid'));
                                            }
                                        }
                                        
					$query = $this->db->get('newwepon_dataqtyp');
                                       //echo $this->db->last_query();
					$info = $query->row();
					//var_dump($info);
					//echo '<hr>';
					$t = $lcarts + $mcarts + $mcartp + $ecarts + $ecratp + $locarts + $locartp;
					//var_dump($t);
                                        //var_dump($info);
                                        
					//die;
					if($t > $info->issued){
                                            //die('fgdfg');
						return 0;
					}else{
                                                if($fetch->pissueto=='Other Battalion Unit'){
                                                    
                                                    $otherBattalion_id = $fetch->pissuetoname;
                                                     $j = $t;
                                                    //$nq =  $info->qty + $amqunt;
                                                    $niq = $info->issued - $j;
                                                    //$nq =  $info->qty + $llcartp;
                                                    //$nq =  $info->qty + $j;
                                                    $nq =  $info->qty-$j;
                                                    //$adds = array('qty' => $nq, 'issued' => $niq);
                                                    $this->db->set('qty','qty-'.$j,false);
                                                    $this->db->set('issued','issued-'.$j,false);
                                                    $this->db->where('arm',$n[1]);	
                                                    $this->db->where('bore',$n[0]);
                                                    $this->db->where('bat_id',$otherBattalion_id);
                                                     $task = $this->db->update('newwepon_dataqtyp',[]);
                                                     //echo $this->db->last_query().'<Br>';
                                                    //$adds = array('qty'=>'qty+'.$j);
                                                    if(false){
                                                        $this->db->set('qty','qty+'.$j,false);
                                                        $this->db->where('arm',$n[1]);	
                                                        $this->db->where('bore',$n[0]);
                                                        $this->db->where('bat_id',$this->session->userdata('userid'));
                                                        $task = $this->db->update('newwepon_dataqtyp',[]);
                                                       //echo $this->db->last_query();
                                                    }
                                                    //die;
                                                }else{
                                                    $j = $t;
                                                    //$nq =  $info->qty + $amqunt;
                                                    $niq = $info->issued - $j;
                                                    //$nq =  $info->qty + $llcartp;
                                                    //$nq =  $info->qty + $j;
                                                    $nq =  $info->qty- $j;
                                                    $adds = array('qty' => $nq, 'issued' => $niq);
                                                    $this->db->where('arm',$n[1]);	
                                                    $this->db->where('bore',$n[0]);
                                                    if($fetch->pissueto=='Other Battalion Unit'){
                                                        $this->db->where('bat_id',$fetch->pissuetoname);
                                                    }else{
                                                        $this->db->where('bat_id',$this->session->userdata('userid'));
                                                    }
                                                    $task = $this->db->update('newwepon_dataqtyp',$adds);
                                                   //echo $this->db->last_query();
                                                    //$otherBattalion_id = $this->session->userdata('userid');
                                                }
						//$j = $t + $llcartp;			//not making any sense
					}
					$addvalue = array('dtype' => $dtype, 'issue_arm_id' => $id, 'ammutype' => $atype,'lcat' => $lcarts,'mcat' => $mcarts .$mcartp,'ecat' => $ecarts.$ecratp,'locat' => $locarts.$locartp,'weapon' => $n[1], 'bore' => $n[0], 'amuqty' => $t, 'ibat_id' => $this->session->userdata('userid'));
					$task2 = $this->db->insert('deposit_ammu',$addvalue);
                                                   //echo $this->db->last_query();
                                                    //var_dump($fetch);
                                                    //die('ghjfj');
//die('hjghj');
					//Panga sorted
					if($fetch->bodyno != 'Nill'){
                                            if( $atype == 'Service'){
						$br = explode(',', $fetch->bodyno);
						foreach ($br as $value) {
							$this->db->where('old_weapon_id',$value);
							$up = array('staofserv' => 'In kot');
							$this->db->where('bat_id',$this->session->userdata('userid'));
							$task = $this->db->update('old_weapon',$up);
                                                        //echo $this->db->last_query();
                                                        //die('hjghj');
						}
                                            }
                                            $this->db->where('issue_arm_id',$fetch->issue_arm_id);
                                            $ups = array('istatus' => 0);
                                            $this->db->where('bat_id',$this->session->userdata('userid'));
                                            $tas = $this->db->update('issue_arm',$ups);
                                                //echo $this->db->last_query();
					}
					//die;
					if($task && $task2){
						return 1;
					}else{
						return 0;
					}
				}
			}	
		}
		//safsd
		public function getWeaponMainCategories($name=null,$orderColumn = 'name',$order='asc'){
			$this->db->select('*');
			//$this->db->where_in('arm',$weapon_name_array);
			if($name!=null){
				$this->db->like('name',$name);
			}
			$this->db->order_by($orderColumn,$order);
			$query = $this->db->get('weapon_categories');
			$result = $query->result();
			return $result;
		}
		public function getWeaponSubCategoriesByWeaponMainCategoryIds($ids=null,$orderColumn='name',$order='asc'){
			$this->db->select('*');
			//$this->db->where_in('arm',$weapon_name_array);
			if($ids!=null){
				$this->db->where_in('weapon_category_id',$ids);
			}
			$this->db->order_by($orderColumn,$order);
			$query = $this->db->get('weapon_sub_categories');
			$result = $query->result();
			return $result;
		}
		public function getWeaponsByMainSubCategoryWeaponName($main_categoryIds=null,$sub_categoriesIds=null,$weapon_names=null,$length=null,$start=null,$orderby=null,$order=null){
			$this->db->select('*, newwepon_data.arm as weapon_name, weapon_sub_categories.name as sub_category, weapon_categories.name as main_category');
			if(null!=$main_categoryIds){
				$this->db->where_in('weapon_categories.id',$main_categoryIds);
				if(null!=$sub_categoriesIds){
					$this->db->where_in('weapon_sub_categories.id',$sub_categoriesIds);
				}
			}
			if(null!=$weapon_names and $weapon_names!=''){
				$this->db->like('newwepon_data.arm',$weapon_names);
			}
			if($length!=null and $start!=null){
				$this->db->limit($length,$start);
			}
			$this->db->where('type','weapon');
			$this->db->order_by($orderby,$order);
			$this->db->join('weapon_sub_categories','newwepon_data.weapon_sub_category_id=weapon_sub_categories.id','left');
			$this->db->join('weapon_categories','weapon_sub_categories.weapon_category_id=weapon_categories.id','left');
			$query = $this->db->get('newwepon_data');
			//echo $this->db->last_query();
			return $query->result();
		}
		public function getTotalFilteredWeaponsByMainSubCategoryWeaponName($main_categoryIds,$sub_categoriesIds,$weapon_names){
			$this->db->select('count(*) as total');
			if(null!=$main_categoryIds){
				$this->db->where_in('weapon_categories.id',$main_categoryIds);
				if(null!=$sub_categoriesIds){
					$this->db->where_in('weapon_sub_categories.id',$sub_categoriesIds);
				}
			}
			if(null!=$weapon_names and $weapon_names!=''){
				$this->db->like('newwepon_data.arm',$weapon_names);
			}
			$this->db->where('type','weapon');
			$this->db->join('weapon_sub_categories','newwepon_data.weapon_sub_category_id=weapon_sub_categories.id','left');
			$this->db->join('weapon_categories','weapon_sub_categories.weapon_category_id=weapon_categories.id','left');
			$query = $this->db->get('newwepon_data');
			//echo $this->db->last_query();
			return $query->result()[0]->total;
		}
		public function getTotalWeapons(){
			$this->db->select('count(*) as total');
			$this->db->where('type','weapon');
			$query = $this->db->get('newwepon_data');
			//echo $this->db->last_query();
			return $query->result()[0]->total;
		}
		public function getWeaponById($id){
			$this->db->select('*,weapon_sub_categories.weapon_category_id as main_category_id, weapon_sub_categories.id as sub_category_id');
			$this->db->where('nwep_id',$id);
			$this->db->join('weapon_sub_categories','newwepon_data.weapon_sub_category_id=weapon_sub_categories.id','left');
			//$this->db->join('weapon_categories','weapon_sub_categories.weapon_category_id=weapon_categories.id','left');
			$query = $this->db->get('newwepon_data');
			
			return $query->result();
		}
		public function getMainWeaponCategories($name=null,$length=null,$start=null,$orderby=null,$order=null){
			$this->db->select('*');
			if($name!=null){
				$this->db->like('name',$name);
			}
			if($length!=null && $start!=null){
				$this->db->limit($length,$start);
			}
			if($orderby!=null && !in_array($order,['asc','desc'])){
				$this->db->order_by($orderby,$order);
			}else{
				$this->db->order_by('name','asc');
			}
			$query = $this->db->get('weapon_categories');
			return $query->result();
		}
		
		public function getSubCategoryById($main_category_id){
			$this->db->select('*');
			$this->db->where('weapon_category_id',$main_category_id);
			$this->db->order_by('name');
			$query = $this->db->get('weapon_sub_categories');
			return $query->result();
		}
		public function addWeapon($weapon_name,$weapon_sub_category_id){
			$add = ['arm'=>$weapon_name,'weapon_sub_category_id'=>$weapon_sub_category_id];
			$this->db->where('nwep_id',$id);
			$status = $this->db->update('newwepon_data',$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
                public function addWeapon2($weapon_name,$weapon_sub_category_id){
			$add = ['arm'=>$weapon_name,'weapon_sub_category_id'=>$weapon_sub_category_id];
			//$this->db->where('nwep_id',$id);
			$status = $this->db->insert('newwepon_data',$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		//weapon main cateogories mgmt.
		public function getTotalFilteredWeaponsMainCategory($name=null){
			$this->db->select('count(*) as total');
			if($name!=null){
				$this->db->like('name',$name);
			}
			$query = $this->db->get('weapon_categories');
			return $query->result()[0]->total;
		}
		public function getTotalWeaponMainCategory(){
			$this->db->select('count(*) as total');
			$query = $this->db->get('weapon_categories');
			return $query->result()[0]->total;
		}
		public function updateWeapon($id,$weapon_sub_category_id){
			$add = ['weapon_sub_category_id'=>$weapon_sub_category_id];
			$this->db->where('nwep_id',$id);
			$status = $this->db->update('newwepon_data',$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function addWeaponMainCategory($name,$created){
			$add = ['name'=>$name,'created'=>$created];
			$status = $this->db->insert('weapon_categories',$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function getMainWeaponCategoryById($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get('weapon_categories');
			$result = $query->result();
			return $result;
		}
		public function updateWeaponMainCategory($id,$name){
			$update = ['name'=>$name];
			$this->db->where('id',$id);
			$status = $this->db->update('weapon_categories',$update);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function getSubWeaponCategories($main_category_ids=null,$name=null,$length=null,$start=null,$orderby=null,$order=null){
			$this->db->select('*,weapon_sub_categories.id as sub_id,weapon_categories.name as main_category_name, weapon_sub_categories.name as sub_name,weapon_categories.name as main_category_name');
			if(null!=$main_category_ids && count($main_category_ids)>0){
				$this->db->where_in('weapon_category_id',$main_category_ids);
			}
			if(null!=$name && trim($name)!=''){
				$this->db->like('weapon_sub_categories.name',$name);
			}
			if(null!=$length && null!=$start){
				$this->db->limit($length,$start);
			}
			if($orderby!=null && $order!=null){
				$this->db->order_by($orderby,$order);
			}
			$this->db->join('weapon_categories','weapon_sub_categories.weapon_category_id=weapon_categories.id','left');
			
			$query = $this->db->get('weapon_sub_categories');
			//echo $this->db->last_query();
			return $query->result();
		}
		public function getTotalFilteredSubWeaponCategories($main_category_ids=null,$name=null){
			$this->db->select('count(*) as total');
			if(null!=$main_category_ids && count($main_category_ids)>0){
				$this->db->where_in('weapon_category_id',$main_category_ids);
			}
			if(null!=$name && trim($name)!=''){
				$this->db->where('name',$name);
			}
			$query = $this->db->get('weapon_sub_categories');
			return $query->result()[0]->total;
		}
		public function getTotalSubWeaponCategories(){
			$this->db->select('count(*) as total');
			$query = $this->db->get('weapon_sub_categories');
			
			return $query->result()[0]->total;
		}
		//Weapon Sub Category
		public function getWeaponSubCategoryById($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get('weapon_sub_categories');
			return $query->result();
		}
		public function updateSubCategory($id,$name,$weapon_main_category){
			$update = ['name'=>$name,'weapon_category_id'=>$weapon_main_category];
			$this->db->where('id',$id);
			$status = $this->db->update('weapon_sub_categories',$update);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function addSubCategory($name,$weapon_main_category,$created){
			$add = ['name'=>$name,'weapon_category_id'=>$weapon_main_category,'created'=>$created];
			$status = $this->db->insert('weapon_sub_categories',$add);
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function updateNewWeaponNameByBodyNumber($weapon_ids,$weapon_name,$bat_id){
			$this->db->where_in('old_weapon_id',$weapon_ids);
			$update = ['tow'=>$weapon_name];
			$this->db->where('bat_id',$bat_id);
			$status = $this->db->update('old_weapon',$update);
			//echo $this->db->last_query();
			//echo $status;
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function updateIssueWeaponNameByBodyNumber($weapon_ids,$weapon_name,$bat_id){
			$this->db->where_in('wbodyno',$weapon_ids);
			//$update = ['abore'=>'SUBSTRING_INDEX(abore,",",1)'];
			$this->db->set('abore','CONCAT(SUBSTRING_INDEX(abore,",",1),",","'.addslashes($weapon_name).'")',false);
			$this->db->where('bat_id',$bat_id);
			$status = $this->db->update('issue_arm');
			//echo $this->db->last_query();
			if($status){
				return true;
			}else{
				return false;
			}
		}
		public function getSelectedToWeapon($weapon_id_to){
			$this->db->select('*');
			$this->db->where('nwep_id',$weapon_id_to);
			$query = $this->db->get('newwepon_data');
			return $query->result();
		}
		public function getOldWeapons($weapon_ids){
			$this->db->select('*');
			$this->db->where_in('old_weapon_id',$weapon_ids);
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			return $query->result();
		}
		//Battalion get all the weapons
		public function getAllWeapons2(){
			$this->db->select('*');
			$this->db->where('type','weapon');
			$query = $this->db->get('newwepon_data');
			//echo $this->db->last_query();
			return $query->result();
		}
		/* public function getWeaponById($id){		//weapon_sub_category_id
			$this->db->select('*');
			$this->db->where('nwep_id',$id);
			$query  = $this->db->get('newwepon_data');
			return $query->result();
		} */
		public function getWeaoponsUnderSubCategory($sub_category_id){
			$this->db->select('*');
			$this->db->where('weapon_sub_category_id',$sub_category_id);
			$query=$this->db->get('newwepon_data');
			return $query->result();
		}
		public function getWeaponBodyNumberByWeaponName($name,$bat_id){
			$this->db->select('*');
			$this->db->where('tow',$name);
			$this->db->where('bat_id',$bat_id);
			$query=$this->db->get('old_weapon');
			return $query->result();
		}
		//public function 
		public function uniqueWeaponName($title,$id=null){
		
			$this->db->select('count(*) as total');
			$this->db->where('arm',$title);
			if(null!=$id && is_numeric($id)){
				$this->db->where('id != ',$id);
			}
			$query = $this->db->get('newwepon_data');
			$result = $query->result();
			if($result[0]->total>0){
				return false;
			}else{
				return true;
			}
		}
		public function unique_weapon_category_name($name,$id=null){	
			$this->db->select('count(*) as total');
			if($id!=null and is_integer($id)){
				$this->db->where('id !=',$id);
			}
			$this->db->where('name',$name);
			$query = $this->db->get('weapon_categories');
			$result = $query->result();
			if($result[0]->total>0){
				return false;
			}else{
				return true;
			}
		}
		public function unique_sub_category($name,$id=null){

			$this->db->select('count(*) as total');
			if($id!=null && ctype_digit($id)){
				$this->db->where('id !=',$id);
			}
			$this->db->where('name',$name);
			$query = $this->db->get('weapon_sub_categories');
			//echo $this->db->last_query();
			$result = $query->result();
			if($result[0]->total>0){
				return false;
			}else{
				return true;
			}
		}
		public function getWeaponsUnderSubCategoryId($main_categoryIds=null,$sub_categoriesIds=null,$weapon_names=null,$length=null,$start=null,$orderby=null,$order=null){
			$this->db->select('*,  newwepon_data.arm as weapon_name, weapon_sub_categories.name as sub_category, weapon_categories.name as main_category, weapon_categories.id as main_id, weapon_sub_categories.id as sub_id');
			if(null!=$main_categoryIds){
				$this->db->where_in('weapon_categories.id',$main_categoryIds);
				if(null!=$sub_categoriesIds){
					$this->db->where_in('weapon_sub_categories.id',$sub_categoriesIds);
				}
			}
			if(null!=$weapon_names and $weapon_names!=''){
				$this->db->like('newwepon_data.arm',$weapon_names);
			}
			if($length!=null and $start!=null){
				$this->db->limit($length,$start);
			}
			$this->db->where('type','weapon');
			$this->db->order_by($orderby,$order);
			$this->db->join('weapon_sub_categories','newwepon_data.weapon_sub_category_id=weapon_sub_categories.id','left');
			$this->db->join('weapon_categories','weapon_sub_categories.weapon_category_id=weapon_categories.id','left');
			$query = $this->db->get('newwepon_data');
			//echo $this->db->last_query();
			return $query->result();
		}
		public function getRemarks($weapons, $bat_id){
			//var_dump($weapons);
			//var_dump($bat_id);
			$this->db->select('wep,remarkwep');
			$this->db->where_in('wep',$weapons);
			$this->db->where('bat_id',$bat_id);
			$query  = $this->db->get('wep_report');
			$result = $query->result();
			return $result;
		}
	}
?>