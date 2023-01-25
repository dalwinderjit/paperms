<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Ammunition_model extends CI_Model{

		function getServiceAmmunition($battalions=null){
			$this->db->select('*');
                        if($battalions!=null){
                            if(is_array($battalions) && count($battalions)>0){
                                $this->db->where_in('bat_id',$battalions);
                            }else{
                                $this->db->where('bat_id',$battalions);
                            }
                        }
			$query = $this->db->get('newwepon_dataqty');
			$result = $query->result();
			//echo $this->db->last_query();
			return $result;
		}
		/* get the detail of ammunition
		take ammunition id as input and
		will return object of ammunition
		*/
		public function getDetail($service_ammunition_id){
			$this->db->select('*');
			$this->db->where('nwep_id',$service_ammunition_id);
			$query = $this->db->get('newwepon_dataqty');
			$result = $query->result();
			return $result[0];
		}
                public function getServiceDetail($service_ammunition_id){
			$this->db->select('*');
			$this->db->where('nwep_id',$service_ammunition_id);
			$query = $this->db->get('newwepon_dataqty');
			$result = $query->result();
			return $result[0];
		}
                public function getPracticeDetail($service_ammunition_id){
			$this->db->select('*');
			$this->db->where('nwep_id',$service_ammunition_id);
			$query = $this->db->get('newwepon_dataqtyp');
			$result = $query->result();
			return $result[0];
		}
		public function decreaseServiceQuantity($service_ammunition_id,$bat_id,$new_quantity_service){
			$update = array('qty'=>$new_quantity_service);
			$where2 = array(
				'nwep_id'=>$service_ammunition_id,
				'bat_id'=>$bat_id
			);
			$this->db->where($where2);
			$this->db->update('newwepon_dataqty',$update);

		}
                public function decreasePracticeQuantity($service_ammunition_id,$bat_id,$new_quantity_service){
			$update = array('qty'=>$new_quantity_service);
			$where2 = array(
				'nwep_id'=>$service_ammunition_id,
				'bat_id'=>$bat_id
			);
			$this->db->where($where2);
			$this->db->update('newwepon_dataqtyp',$update);

		}
                public function isValidServiceAmmunitionQuantity($id,$quantity,$bat_id=null){
                    $this->db->select('qty');
                    $this->db->where('nwep_id',$id);
                    if($bat_id!=null){
                        $this->db->where('bat_id',$bat_id);
                    }
                    $query = $this->db->get('newwepon_dataqty');
                    $result = $query->result();
                    if($result!=null && count($result)>0){
                        $qty = $result[0]->qty;
                    }else{
                        $qty = 0;
                    }
                    
                    if($qty-$quantity<0){
                        return false;
                    }else{
                        return true;
                    }
                }
                public function isValidPracticeAmmunitionQuantity($id,$quantity,$bat_id=null){
                    $this->db->select('qty');
                    $this->db->where('nwep_id',$id);
                    if($bat_id!=null){
                        $this->db->where('bat_id',$bat_id);
                    }
                    $query = $this->db->get('newwepon_dataqtyp');
                    $result = $query->result();
                    if($result!=null && count($result)>0){
                        $qty = $result[0]->qty;
                    }else{
                        $qty = 0;
                    }
                    if($qty-$quantity<0){
                        return false;
                    }else{
                        return true;
                    }
                }
		function get_service_ammu_qty($service_ammunition_id,$bat_id,$type=null){
			$service_ammunition_id = $this->input->post('ammunition');
			$bat_id = $this->session->userdata('userid');
			$this->db->select('*');
			$this->db->where('nwep_id',$service_ammunition_id);
			$this->db->where('bat_id',$bat_id);
                        if($type=='SERVICE'){
                            $query = $this->db->get('newwepon_dataqty');
                        }elseif($type=='PRACTICE'){
                            $query = $this->db->get('newwepon_dataqtyp');
                        }else{
                            $query = $this->db->get('newwepon_dataqty');
                        }
                        //echo $this->db->last_query();
			$result = $query->result();
			if(isset($result[0])){
				$quantity = $result[0]->qty;	
			}else{
				$quantity = 'Negative';
			}
			return $quantity;
		}
		function checkPracticeExistsOrNot($arm,$bore,$bat_id){
			$this->db->select('count(*) as total');
			$where = array(
				'arm'=>$arm,
				'bore'=>$bore,
				'bat_id'=>$bat_id
			);
			$this->db->where($where);
			$query=$this->db->get('newwepon_dataqtyp');
			$result = $query->result();
			if($result[0]->total>0){
				return true;
			}else{
				return false;
			}

		}
                function checkServiceExistsOrNot($arm,$bore,$bat_id){
			$this->db->select('count(*) as total');
			$where = array(
				'arm'=>$arm,
				'bore'=>$bore,
				'bat_id'=>$bat_id
			);
			$this->db->where($where);
			$query=$this->db->get('newwepon_dataqty');
			$result = $query->result();
			if($result[0]->total>0){
				return true;
			}else{
				return false;
			}

		}
		function createPractice($arm,$bore,$bat_id){
			$data = array(
				'arm'=>$arm,
				'bore'=>$bore,
				'bat_id'=>$bat_id,
				'qty'=>0,
				'issued'=>0,
				'status'=>1
			);
			$this->db->insert('newwepon_dataqtyp',$data);
		}
                function createService($arm,$bore,$bat_id){
			$data = array(
				'arm'=>$arm,
				'bore'=>$bore,
				'bat_id'=>$bat_id,
				'qty'=>0,
				'issued'=>0,
				'status'=>1
			);
			$this->db->insert('newwepon_dataqty',$data);
		}
		function increasePracticeQuantity($arm,$bore,$bat_id,$practice_ammunition_quantity,$from_id=null){
                    if($from_id!=null){
                        $where3=array(
                            'nwep_id'=>$from_id
                        );
                    }else{
			$where3 = array(
				'arm'=>$arm,
				'bore'=>$bore,
				'bat_id'=>$bat_id
			);
                    }
			$this->db->where($where3);
			$this->db->set('qty','qty+'.$practice_ammunition_quantity,FALSE);
			$this->db->update('newwepon_dataqtyp');
		}
                function increaseServiceQuantity($to_id,$practice_ammunition_quantity){
			$where3 = array(
				'nwep_id'=>$to_id,
			);
			$this->db->where($where3);
			$this->db->set('qty','qty+'.$practice_ammunition_quantity,FALSE);
			$this->db->update('newwepon_dataqty');
                        //echo $this->db->last_query();
                        //die;
		}

		function getHistoryTo($arm,$bore,$bat_id,$id=null,$type=null){
			$this->db->select('nwep_id');
                        if($id!=null){
                            $where4 = array(
				'nwep_id'=>$id
                            );
                        }else{
                            $where4 = array(
                                    'arm'=>$arm,
                                    'bore'=>$bore,
                                    'bat_id'=>$bat_id
                            );
                        }
			$this->db->where($where4);
                        if($type==null || $type=='SERVICE'){
                            $query4 = $this->db->get('newwepon_dataqty');
                        }elseif($type=="PRACTICE"){
                            $query4 = $this->db->get('newwepon_dataqtyp');
                        }
			$result4 = $query4->result();
			//echo $this->db->last_query();
			return $result4[0]->nwep_id;
		}

		function addServiceToPracticeHistory($history_from,$history_to,$history_quantity,$by_id,$transaction_type,$order_number,$order_date){
			$data = array(
				'from_' => $history_from,
				'to_' => $history_to,
				'quantity' => $history_quantity,
				'by_id'=>$by_id,
                            'transaction_type'=>$transaction_type,
                            'order_no'=>$order_number,
                            'order_date'=>$order_date
				);

			$this->db->insert('history_ammu_ser_to_pract', $data);
		}
                function getConversionData($filters =null,$length=10,$start=0){
                    $this->db->select('*');
                    $this->whereConversionData($filters);
                    $this->db->order_by('datetime_','desc');
                    $this->db->from('history_ammu_ser_to_pract');
                    
                    $this->db->limit($length,$start);
                    $query = $this->db->get();
                    return $query->result();
                }
                public function whereConversionData($filters){
                    if(isset($filters['transaction_type']) && $filters['transaction_type']!=null){
                        $this->db->where('transaction_type',$filters['transaction_type']);
                    }
                    if(isset($filters['order_number']) && $filters['order_number']!=null){
                        $this->db->like('order_no',$filters['order_number']);
                    }
                    if(isset($filters['date_from']) && $filters['date_from']!=null){
                        $this->db->where('datetime_ >= ',$filters['date_from']);
                    }
                    if(isset($filters['date_to']) && $filters['date_to']!=null){
                        $this->db->where('datetime_ <= ',$filters['date_to']);
                    }
                    if(isset($filters['bat_id']) && $filters['bat_id']!=null){
                        $this->db->where('by_id',$filters['bat_id']);
                    }
                    if(isset($filters['battalions']) && $filters['battalions']!=null && is_array($filters['battalions']) && count($filters['battalions'])>0){
                        $this->db->where_in('by_id',$filters['battalions']);
                    }
                }
                public function getTotalCourseHistory($filters,$user_log=null,$khc_battalions=null){
                    $this->db->select('count(*) as total');
                    if($user_log!=null){
                        if(isset($filters['battalions']) && $filters['battalions']!=null){
                            if(is_array($filters['battalions']) && count($filters['battalions'])>0){
                                $this->db->where_in('by_id',$filters['battalions']);
                            }else{
                                $this->db->where('by_id',$filters['battalions']);
                            }
                        }
                    }
                    if($khc_battalions!=null){
                        $this->db->where_in('by_id',$khc_battalions);
                    }
                    $this->db->from('history_ammu_ser_to_pract');
                    $query = $this->db->get();
                    return $query->result()[0]->total;
                }
                public function getTotalFilteredCourseHistory($filters){
                    $this->db->select('count(*) as total');
                    $this->whereConversionData($filters);
                    $this->db->from('history_ammu_ser_to_pract');
                    $query = $this->db->get();
                    return $query->result()[0]->total;
                }
		function getAllWeapons($limit=20,$start=0,$arm_name = NULL,$bodyno = ''){
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
			$this->db->limit($limit,$start);
			$query = $this->db->get('old_weapon');
			//echo $this->db->last_query();
			$info = $query->result();
			return $info;	
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


		function weaponca($wbodyno,$rcno,$rcdate,$ammu_qty){		//saving data in table moving weapon back to center armour (CA)
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
			$addvalue = array('wname' => $wname, 'wbutt' => $wbutt, 'wbono' => $wbono,'rcno' => $rcno,'rcdate' => $rcdate, 'bat_id' => $this->session->userdata('userid'),'ammu_qty'=>$ammu_qty);
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
			$quantity = $fetch->qty;
			
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
			if($quantity<=$data->qty)
			{
				return true;
			}else{
				return false;
			}
		}

		/*
		get the all of the names of wepaon from 'newwepon_data' table
		*/
		function get_arms(){
			$this->db->select('*');
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

		function getBattalions(){
			$this->db->select(array('users_id','user_name'));
			$this->db->like('user_name','khc');
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
                function getPracticeAmmunition($battalions){
			$this->db->select('*');
                        if($battalions!=null){
                            if(is_array($battalions) && count($battalions)>0){
                                $this->db->where_in('bat_id',$battalions);
                            }else{
                                $this->db->where('bat_id',$battalions);
                            }
                        }
			$query = $this->db->get('newwepon_dataqtyp');
			$result = $query->result();
			return $result;
		}
                public function updateAmmunition($data){
                    
                    
                        $where3=array(
                            'nwep_id'=>$data['ammunition_bore_id']
                        );
                    
			$this->db->where($where3);
			$this->db->set('qty','qty-'.$data['disposed_quantity'],FALSE);
                        if(strtolower($data['ammunition_type']) == 'service'){
                            $table = 'newwepon_dataqty';
                        }else{
                            $table = 'newwepon_dataqtyp';
                        }
			$this->db->update($table);
                        //echo $this->db->last_query();
                        //die;
                }
                public function insertDestroyedAmmunitionHistory($data){
                    $this->db->insert('destroyed_ammunition_history',$data);
                    return $this->db->insert_id();
                }
                public function getDestroyedAmmunitionData($filters,$length,$start){
                    $this->db->select('*,destroyed_ammunition_history.bat_id as bat_id_, case '
                            . 'when destroyed_ammunition_history.ammunition_type = "SERVICE" then concat(newwepon_dataqty.arm," ",newwepon_dataqty.bore) '
                            . 'when destroyed_ammunition_history.ammunition_type = "PRACTICE" then concat(newwepon_dataqtyp.arm," ",newwepon_dataqtyp.bore) '
                            . 'end as ammunition_bore');
                    $this->whereDestroyedAmmunitionData($filters);
                    $this->db->order_by('created','desc');
                    $this->db->from('destroyed_ammunition_history');
                    $this->db->join('newwepon_dataqty','destroyed_ammunition_history.ammunition_bore_id = newwepon_dataqty.nwep_id and destroyed_ammunition_history.ammunition_type=\'SERVICE\'','left');
                    $this->db->join('newwepon_dataqtyp','destroyed_ammunition_history.ammunition_bore_id = newwepon_dataqtyp.nwep_id and destroyed_ammunition_history.ammunition_type=\'PRACTICE\'','left');
                    $this->db->limit($length,$start);
                    $query = $this->db->get();
                    return $query->result();
                }
                public function whereDestroyedAmmunitionData($filters){
                    if(isset($filters['ammunition_type']) && $filters['ammunition_type']!=null){
                        $this->db->where('ammunition_type',$filters['ammunition_type']);
                        if(isset($filters['ammunition_ids']) && $filters['ammunition_ids']!=null && count($filters['ammunition_ids'])>0){
                            $this->db->where_in('ammunition_bore_id',$filters['ammunition_ids']);
                        }
                    }
                    if(isset($filters['order_number']) && $filters['order_number']!=null){
                        $this->db->like('order_number',$filters['order_number']);
                    }
                    if(isset($filters['date_from']) && $filters['date_from']!=null){
                        $this->db->where('created >= ',$filters['date_from']);
                    }
                    if(isset($filters['date_to']) && $filters['date_to']!=null){
                        $this->db->where('created <= ',$filters['date_to']);
                    }
                    if(isset($filters['battalions']) && $filters['battalions']!=null && is_array($filters['battalions']) && count($filters['battalions'])>0){
                        $this->db->where_in('destroyed_ammunition_history.bat_id',$filters['battalions']);
                    }
                }
                public function getTotalDestroyedAmmunition($filters,$user_log=null){
                    $this->db->select('count(*) as total');
                    if($user_log!=null && $user_log==3){
                        if(isset($filters['battalions']) && $filters['battalions']!=null){
                            if(is_array($filters['battalions']) && count($filters['battalions'])>0){
                                $this->db->where_in('destroyed_ammunition_history.bat_id',$filters['battalions']);
                            }else{
                                $this->db->where('destroyed_ammunition_history.bat_id',$filters['battalions']);
                            }
                        }
                    }
                    $this->db->from('destroyed_ammunition_history');
                    $query = $this->db->get();
                    return $query->result()[0]->total;
                }
                public function getTotalFilteredDestroyedAmmunition($filters){
                    $this->db->select('count(*) as total');
                    $this->whereDestroyedAmmunitionData($filters);
                    $this->db->from('destroyed_ammunition_history');
                    $query = $this->db->get();
                    return $query->result()[0]->total;
                }
                public function getDestroyedAmmunitionRecordById($id){
                    $this->db->select('*');
                    $this->db->where('id',$id);
                    $this->db->from('destroyed_ammunition_history');
                    $query = $this->db->get();
                    if($query->num_rows()==1){
                        return $query->result();
                    }else{
                        return false;
                    }
                }
                public function restoreDestroyedAmmunition($id){
                    $this->db->set('deleted','YES');
                    $this->db->where('id',$id);
                    $this->db->update('destroyed_ammunition_history');
                }
                public function getDepositAmmunition($weapons=null,$bores=null,$bat_id=null){
                     $this->db->select('*');
                     if($weapons!=null){
                         $this->db->where_in('weapon',$weapons);
                     }
                     if($bores!=null){
                         $this->db->where_in('bore',$bores);
                     }
                     $this->db->where('ammutype','Practice');
                     $this->db->where('da_status','1');
                     if($bat_id!=null){
                        $this->db->where('ibat_id',$bat_id);
                     }
                    $query = $this->db->get('deposit_ammu');
                    $info = $query->result();
                    return $info;
                    
                }
}

/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.* FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` WHERE `istatus` = 0 */

/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.`atype`,`issue_arm`.`abore`,`issue_arm`.`mags`,`issue_arm`.`amqunt`,`issue_arm`.`amqunt`,`newosi`.`name`,`newosi`.`name`,`issue_arm`.`typeofduty`,`issue_arm`.`placeofduty`,`issue_arm`.`idate` FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` JOIN `newosi` ON `newosi`.`man_id` = `issue_arm`.`issueto` WHERE `istatus` = 0 */
