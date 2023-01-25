<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*Total function: 7*/
	/*Start Common_model class*/
	class Msk_model extends CI_Model{
	/**MSK */
	/**
		Fetch all the names of security Equipments
	*/
	public function getSecurityEquipmentNames(){
		$this->db->select('*');
		$this->db->where('item','Security Equipment');
		$query = $this->db->get('mskitems');
		$result = $query->result();
		return $result;
	}
	
	public function getSecurityEquipments($batIds,$category){
		//select * from deposit_material where typeofitem ='Security Equipment' and nameofItem in ($equipmentnames) and bat_id in($battalions);
		$this->db->select('*');
		$this->db->where('item',$category);
		$this->db->order_by('name');
		//$this->db->where_in('bat_id',$batIds);
		$query = $this->db->get('mskitems');
		$result = $query->result();
		return $result;
	}
	
	public function getEquipments($battalions,$typeOfItem,$itemNames){
		//select * from deposit_material where typeofitem ='Security Equipment' and nameofItem in ($equipmentnames) and bat_id in($battalions);
		$this->db->select('*');
		$this->db->where('item',$typeOfItem);
		$this->db->where_in('name',$itemNames);
		$this->db->order_by('name');
		$query = $this->db->get('mskitems');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	
	function getBattalions(){
		
		$this->db->select(array('users_id','user_name'));
		
		if($this->session->userdata('userid')==209){		//irb
			$ids = array(191,166,155,114,109,161,122,214,203);
			$this->db->where_in('users_id',$ids);
		}elseif($this->session->userdata('userid')==211){	//cdo
			$ids = array(101,173,143,149,179,197,215);
			$this->db->where_in('users_id',$ids);
		}elseif($this->session->userdata('userid')==38){			//pap	all the battalion in case it is pap
			$this->db->where('user_log',5);
		}elseif($this->session->user_log==5){
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
	
	function getBattalionsByIds($bat_ids){
		$this->db->select(array('users_id','user_name'));
		$this->db->like('user_name','msk');
		$this->db->where_in('users_id',$bat_ids);
		$query = $this->db->get('users');
		//echo $this->db->last_query();
		return $query->result();
	}
	function getNewMskItems($battalionIds,$typeOfItem,$nameOfItems){
		$this->db->select('*');
		$this->db->where_in('bat_id',$battalionIds);
		$this->db->where('typeofitem',$typeOfItem);
		$this->db->where_in('nameofitem',$nameOfItems);
		
		$this->db->join('mskitems','newmsk.nameofitem = mskitems.name');
		$query = $this->db->get('newmsk');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	function getSanctionedItems($battalionIds,$typeOfItem,$nameOfItems){
		$this->db->select('*');
		$this->db->where_in('mskitemsqty.bat_id',$battalionIds);
		$this->db->where('mskitemsqty.item',$typeOfItem);
		$this->db->where_in('mskitemsqty.name',$nameOfItems);
		$this->db->join('mskitems','mskitemsqty.name = mskitems.name and mskitemsqty.item = mskitems.item');
		$this->db->join('msk_san','msk_san.name = mskitems.name and msk_san.bat_id = mskitemsqty.bat_id');
		$query = $this->db->get('mskitemsqty');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
		
		/* 
		$this->db->select('*');
		$this->db->where_in('bat_id',$battalionIds);
		$this->db->where('typeofitem',$typeOfItem);
		$this->db->where_in('nameofitem',$nameOfItems);
		$this->db->join('mskitems','newmsk.nameofitem = mskitems.name');
		$this->db->join('msk_san','msk_san.name = mskitems.name');
		
		$query = $this->db->get('newmsk');
		$result = $query->result();
		return $result; */
	}
	
	function getDepositMaterialData($battalionIds,$typeOfItem,$nameOfItems){
		$this->db->select('*');
		$this->db->where_in('bat_id',$battalionIds);
		$this->db->where('typeofitem',$typeOfItem);
		$this->db->where_in('nameofitem',$nameOfItems);
		$this->db->where_in('condition_of_item',array('C','D'));
		$this->db->join('mskitems','deposit_material.nameofitem = mskitems.name');
		$query = $this->db->get('deposit_material');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	
	public function getIssuedValues($battalionIds,$typeOfItem,$nameOfItems){
		$this->db->select('*');
		$this->db->where_in('bat_id',$battalionIds);
		$this->db->where('mskitemsqty.item',$typeOfItem);
		$this->db->where_in('mskitemsqty.name',$nameOfItems);
		$this->db->join('mskitems','mskitemsqty.name = mskitems.name and mskitemsqty.item = mskitems.item');
		$query = $this->db->get('mskitemsqty');
		$result = $query->result();
		return $result;
	}
	
	public function getIssuedValues2($battalionIds,$typeOfItem,$nameOfItems){
		$this->db->select('*');
		$this->db->where_in('mskitemsqty.bat_id',$battalionIds);
		$this->db->where('mskitemsqty.item',$typeOfItem);
		$this->db->where_in('mskitemsqty.name',$nameOfItems);
		$this->db->join('mskitems','mskitemsqty.name = mskitems.name and mskitemsqty.item = mskitems.item');
		$this->db->join('msk_san','msk_san.name = mskitems.name and msk_san.bat_id = mskitemsqty.bat_id');
		$query = $this->db->get('mskitemsqty');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	public function getSanctionedValues($battalionIds,$typeOfItem,$nameOfItems){
		$this->db->select('*');
		$this->db->where_in('mskitemsqty.bat_id',$battalionIds);
		$this->db->where('mskitemsqty.item',$typeOfItem);
		$this->db->where_in('mskitemsqty.name',$nameOfItems);
		$this->db->join('mskitems','mskitemsqty.name = mskitems.name and mskitemsqty.item = mskitems.item');
		$this->db->join('msk_san','msk_san.name = mskitemsqty.name and msk_san.bat_id = mskitemsqty.bat_id');
		$query = $this->db->get('mskitemsqty');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	
	public function getTypeOfEquipments($bat_ids){
		$this->db->select('*');
		$this->db->where_in('bat_id',$bat_ids);
		$query = $this->db->get('mskitems');
		$result = $query->result();
		return $result;
	}
	/**
		Here i am fetching the type of item which are same for all battalions
	*/
	public function getTypeOfItems(){
		$this->db->select('*');
		$this->db->group_by('item');
		$query = $this->db->get('mskitems');
		$result = $query->result();
		return $result;
	}
	
	/*
		uese to access the name of items
	*/
	public function getItemNamesFromType($typeName){
		$this->db->select('*');
		$this->db->where('item',$typeName);
		$this->db->order_by('name','asc');
		$query = $this->db->get('mskitems');
		$result = $query->result();
		//echo $this->db->last_query();
		//var_dump($result);
		return $result;
	}
	/**
	*	fetching the whole table ie fetching all the categories and item names
	*/
	public function getAllMSKItems(){
		$this->db->select('*');
		$query = $this->db->get('mskitems');
		$result = $query->result();
		return $result;
	}
	/**
	*	fetching the whole data from mskitemsqty
	*/
	public function getWholeIssuedDataOfBattalion($battalion_id)
	{
		$this->db->select('*');
		$this->db->where('bat_id',$battalion_id);
		$this->db->where('status',1);
		$query = $this->db->get('mskitemsqty');
		$result = $query->result();
		return $result;
	}
	/**
	*	Here we are fetching the whole newmsk data of particula battalion
	*  	it wil take the battalioin id  as input
	*/
	public function getWholeHoldingDataOfBattalion($battalion_Id){
		$this->db->select('typeofitem, nameofitem, conofitem, bat_id, recqut');
		$this->db->where('bat_id',$battalion_Id);
		$this->db->where('msk_status',1);
		$query = $this->db->get('newmsk');
		$result = $query->result();
                //echo $this->db->last_query();
                //die;
		return $result;
	}
	public function getWholeDepositMaterialData($battalion_id){
		$this->db->select('typeofitem, nameofitem, condition_of_item, bat_id, quantity');
		$this->db->where('bat_id',$battalion_id);
		$query = $this->db->get('deposit_material');
		$result = $query->result();
		return $result;
	}
	/* GET the sanction values
	*/
	public function getSanctionValues($battalionIds, $nameOfItems){
		$this->db->select('*');
		$this->db->where_in('bat_id',$battalionIds);
		$this->db->where_in('name',$nameOfItems);
		$query = $this->db->get('msk_san');
		$result = $query->result();
		return $result;
	}
	public function getEquipmentDataTypes(){
		return array('sanction'=>'Sanction','holding'=>'Holding','issued'=>'Issued','total_in_store'=>'Total in Store','serviceable'=>'Serviceable','unserviceable'=>'Un-serviceable','serviceable_in_store'=>'Serviceable in Store');
		
	}
}
/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.* FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` WHERE `istatus` = 0 */

/*SELECT `old_weapon`.`tow`,`old_weapon`.`bono`,`issue_arm`.`atype`,`issue_arm`.`abore`,`issue_arm`.`mags`,`issue_arm`.`amqunt`,`issue_arm`.`amqunt`,`newosi`.`name`,`newosi`.`name`,`issue_arm`.`typeofduty`,`issue_arm`.`placeofduty`,`issue_arm`.`idate` FROM `issue_arm` JOIN `old_weapon` ON `old_weapon`.`bono` = `issue_arm`.`wbodyno` JOIN `newosi` ON `newosi`.`man_id` = `issue_arm`.`issueto` WHERE `istatus` = 0 */
?>