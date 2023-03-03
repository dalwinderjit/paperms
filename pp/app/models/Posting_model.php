<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*Total function: 7*/
/*Start Common_model class*/
class Posting_model extends CI_Model
{
	var $order_column = array(null, "name", "parent_posting_id", null);
	var $order_column2 = array(null, "name", "parent_posting_id", 'nick', 'shown_in', 'view', null);
	private $table = 'postings';
	private $table_posting_history = 'posting_history';
	/*
			$name name of posting
			$root parent posting
			$battalion posting should be shown in which battalion
	 */
	function addPosting($name, $root, $battalion, $view, $deployment_report_id, $order_by_)
	{
		error_reporting(E_ALL);
		$this->db->trans_start();
		$add = ['name' => $name, 'parent_posting_id' => $root, 'bat_id' => $this->session->userdata('userid'), 'added_by' => $this->session->userdata('userid'), 'shown_in' => $battalion, 'order_by_' => $order_by_];
		$status = $this->db->insert($this->table, $add);
		$posting_id = $this->db->insert_id();
		$add2 = ['posting_id' => $posting_id, 'deployment_report_id' => $deployment_report_id, 'view' => $view];
		$status2 = $this->db->insert('posting_consolidate_deployment_report_view', $add2);
		//$this->db->trans_complete();
		if ($status && $status2) {
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}
	public function getAllPostings()
	{
		$this->db->select('*');
		//$this->db->order_by('parent_posting_id','ASC');
		$query = $this->db->get($this->table);
		if (isset($_POST["search"]["value"])) {
			$this->db->like('name', $_POST["serach"]["value"]);
		}
		if (isset($_POST["order"])) {
			$this->db->order_by('name', $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("name", "ASC");
		}
		$result = $query->result();
		return $result;
	}
	/**
			same as below
			but will display the customized reports (display only selected postings (selected in report))
	 */
	public function getAllPostingsWithoutSearch($bat_id = null, $deployment_report_id = null, $order_by_ = null, $order = null)
	{
		$this->db->select('*,postings.id as id, posting_consolidate_deployment_report_view.id as posting_consolidate_deployment_report_view_id');
		if ($bat_id != null) {
			$this->db->where('postings.shown_in', -1);
			$this->db->or_where('postings.shown_in', $bat_id);
		}
		$where = '';
		if (null != $deployment_report_id) {
			$where = ' and posting_consolidate_deployment_report_view.deployment_report_id = ' . $deployment_report_id;
			//$this->db->where('posting_consolidate_deployment_report_view.deployment_report_id',$deployment_report_id);
		}

		$this->db->join('posting_consolidate_deployment_report_view', 'posting_consolidate_deployment_report_view.posting_id = postings.id ' . $where, 'left');
		//else{
		$this->db->order_by('parent_posting_id', 'ASC');
		if ($order_by_ != null && $order != null) {
			$this->db->order_by('postings.' . $order_by_, $order);
		}
		//}
		$this->db->group_by('postings.id');
		$query = $this->db->get($this->table);
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	/**
			work for selected single battalion (ie. single battalion)
			fetch all the postings for selected multiple battalions in igp-login
			no customization of report (ie will display all the postings);
	 */
	public function getAllPostingsWithoutSearch2($bat_id = null, $deployment_report_id = null, $order_by_ = null, $order = null)
	{
		//$this->db->select('*,postings.id as id, posting_consolidate_deployment_report_view.id as posting_consolidate_deployment_report_view_id');
		$this->db->select('*,postings.id as id');
		//$this->db->where('postings.id')
		if ($order_by_ != null && $order != null) {
			$this->db->order_by('postings.' . $order_by_, $order);
		} else {
			$this->db->order_by('parent_posting_id,postings.id', 'ASC');
		}
		if ($bat_id != null) {
			$this->db->where('postings.shown_in', -1);
			$this->db->or_where('postings.shown_in', $bat_id);
		}
		$where = '';
		if (null != $deployment_report_id) {
			$where = ' and posting_consolidate_deployment_report_view.deployment_report_id = ' . $deployment_report_id;
			//	$this->db->where('posting_consolidate_deployment_report_view.deployment_report_id',$deployment_report_id);
			$this->db->join('posting_consolidate_deployment_report_view', 'posting_consolidate_deployment_report_view.posting_id = postings.id ' . $where, 'left'); //this part is for customized report view
		}
		$this->db->group_by('postings.id');
		$query = $this->db->get($this->table);
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	public function getAllPostingsWithoutSearch3($bat_id = null, $deployment_report_id = null, $order_by_ = null, $order = null, $date = null, $selected_posting_id = null)
	{
		//$this->db->select('*,postings.id as id, posting_consolidate_deployment_report_view.id as posting_consolidate_deployment_report_view_id');
		if ($deployment_report_id != null) {
			$dep_select = ',`view`';
		} else {
			$dep_select = '';
		}
		$this->db->select('`name`, `parent_posting_id`, `bat_id`, `added_by`, `shown_in`, `created_date`, `order_by_`, `old_posting_id`,case when old_posting_id is not null then old_posting_id else postings.id end as id,' . $dep_select, false);
		//$this->db->where('postings.id')
		//if($order_by_!=null && $order!=null){
		//	$this->db->order_by('postings.'.$order_by_,$order);
		//}else{
		$this->db->order_by('id ASC, created_date desc', '');
		//}
		if ($bat_id != null) {
			$this->db->where('postings.shown_in', -1);
			$this->db->or_where('postings.shown_in', $bat_id);
		}
		$where = '';
		if ($date != null) {
			//$this->db->where('created_date <=',$date);
			$this->db->where('case when old_posting_id is not NULL then created_date <= ' . $this->db->escape($date) . ' else 1=1 end', '', false);
			//$this->db->where('old_posting_id is not','NULL');
		}
		if ($selected_posting_id != null) {
			$this->db->group_start();
			$this->db->where('id', $selected_posting_id);
			$this->db->or_where('old_posting_id', $selected_posting_id);
			$this->db->group_end();
		}
		if (null != $deployment_report_id) {
			$where = ' and posting_consolidate_deployment_report_view.deployment_report_id = ' . $deployment_report_id;
			//	$this->db->where('posting_consolidate_deployment_report_view.deployment_report_id',$deployment_report_id);
			$this->db->join('posting_consolidate_deployment_report_view', 'posting_consolidate_deployment_report_view.posting_id = postings.id ' . $where, 'left'); //this part is for customized report view
		}
		$this->db->from($this->table);
		$this->db->limit('18446744073709551615', 0);
		$query1 = $this->db->get_compiled_select();

		$this->db->set_protect_identifiers(false);
		$this->db->select('*');
		$this->db->from('(' . $query1 . ') as X');
		$this->db->set_protect_identifiers(true);
		if ($order_by_ != null && $order != null) {
			$this->db->order_by('X.' . $order_by_, $order);
		} else {
			$this->db->order_by('parent_posting_id ASC,id ASC, created_date desc', '');
		}
		$this->db->group_by('id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}

	//---------------------------------------------------------------------------------------------------------
	public function make_query()
	{

		$parent_ids = array();

		if (isset($_POST["parent_posting_name"])) {
			//fetch those records whose name is HOME
			$postings = $this->Posting_model->getPostingsByName($_POST["parent_posting_name"]);
			if (count($postings) > 0) {
				$parent_ids = array();
				foreach ($postings as $k => $v) {
					$parent_ids[] = $v->id;
				}
			}
			//fetch those who are children of home
			//where parent_posting id = $posting->id;
			//$this->db->or_like('name',$_POST["parent_posting_name"]);
		}
		$this->db->select(array('postings.id as id', 'name', 'parent_posting_id', 'nick', 'shown_in', 'posting_consolidate_deployment_report_view.view', 'posting_consolidate_deployment_report_view.deployment_report_id', 'postings.order_by_'));

		$query = $this->db->from($this->table);
		if (isset($_POST["search"]["value"])) {
			$this->db->like('name', $_POST["search"]["value"]);
		}
		if (isset($_POST["posting_name"])) {
			$this->db->like('name', $_POST["posting_name"]);
		}
		if (count($parent_ids) > 0) {
			$this->db->where_in('parent_posting_id', $parent_ids);
		}
		$dep_rep_where = '';
		if (isset($_POST['deployment_report_id']) && is_numeric($_POST['deployment_report_id'])) {
			//$this->db->where('posting_consolidate_deployment_report_view.deployment_report_id',$_POST['deployment_report_id']);
			$dep_rep_where = 'and posting_consolidate_deployment_report_view.deployment_report_id = ' . $_POST['deployment_report_id'] . ' ';	//deployment report where clause
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('parent_posting_id ASC,created_date ASC', '', false);
		}
		$this->db->group_by('postings.id');
		$this->db->join('users', 'users.users_id = postings.added_by', 'left');
		$this->db->join('posting_consolidate_deployment_report_view', 'posting_consolidate_deployment_report_view.posting_id = postings.id and ' . $dep_rep_where, 'left');
	}
	public function make_datatables()
	{
		$this->make_query();
		if ($_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_all_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	function get_parent_postings($ids)
	{
		$this->db->select('*');
		$this->db->where_in($ids);
		$query = $this->db->get($this->table);
		$result = $query->result();
		return $result;
	}
	//----------------------------------------------------------------------------------
	public function getPostingsByName($posting_name)
	{
		$this->db->select('*');
		$this->db->like('name', $posting_name);
		$this->db->order_by('parent_posting_id', 'ASC');
		$query = $this->db->get($this->table);
		$result = $query->result();
		return $result;
	}

	/**
	 * here we are fetching the subpostings under the selected Posting_model
	 * the id of posting = parent_posting_id of 
	 */
	public function getSubPostingOf($id)
	{
		$this->db->set_protect_identifiers(false);
		$this->db->select('id');
		$this->db->where('parent_posting_id', $id, true);
		$this->db->from('postings');
		$query1 = $this->db->get_compiled_select();
		$this->db->select('*, case when old_posting_id is NOT NULL then old_posting_id else id end as target_id');
		$this->db->from('postings');
		$this->db->where('parent_posting_id', $id, true);
		$this->db->or_where_in('old_posting_id', $query1, false);
		if ($this->session->userdata('user_log') == 4) {
			//$this->db->group_start();
			$this->db->where_in('shown_in', [-1, $this->session->userdata('userid')]);
			//$this->db->or_where('shown_in',$this->session->userdata('userid'),true);
			//$this->db->group_end();
		}
		//$this->db->order_by('parent_posting_id','ASC');
		//$this->db->order_by('name','ASC');
		$this->db->order_by('created_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$query2 = $this->db->get_compiled_select();
		//echo '<hr>';
		//echo $query2;
		//echo '<hr>';
		$this->db->select('*, case when old_posting_id is NOT NULL then old_posting_id else id end as id');
		$this->db->from('(' . $query2 . ') as X');
		$this->db->group_by('target_id');
		$this->db->order_by("order_by_ asc, name", 'asc');

		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result();
		$this->db->set_protect_identifiers(true);
		return $result;
	}
	public function getSubpostingByNameId($id, $name)
	{
		$this->db->select('*');
		$this->db->where('parent_posting_id', $id);
		$this->db->like('name', $name);
		//$this->db->order_by('parent_posting_id','ASC');
		//$this->db->order_by('name','ASC');
		$this->db->order_by('order_by_', 'ASC');
		$query = $this->db->get($this->table);
		$result = $query->result();
		return $result;
	}
	public function getPreviousPostingId($parent_posting_id)
	{
		$this->db->select('*');
		$this->db->where('id', $parent_posting_id);
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		$result = $query->result();
		return $result;
	}
	public function getPostingById($id)
	{
		$this->db->select('*, postings.id as id');

		$this->db->where('postings.id', $id);
		$this->db->join('posting_consolidate_deployment_report_view', 'posting_consolidate_deployment_report_view.posting_id = postings.id', 'left');
		$query = $this->db->get($this->table);
		return $result = $query->result();
	}
	public function getPostingById2($id, $before_date_posting = null)
	{
		$this->db->select('*');
		$this->db->group_start();
		$this->db->where('postings.id', $id);
		$this->db->or_where('postings.old_posting_id', $id);
		$this->db->group_end();
		if ($before_date_posting != null) {
			$this->db->where('case when old_posting_id is not NULL then created_date <= ' . $this->db->escape($before_date_posting) . ' else 1=1 end', '', false);
			//$this->db->where('created_date <=',$before_date_posting);
		}
		$this->db->from($this->table);
		$this->db->order_by('created_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$query1 = $this->db->get_compiled_select();
		$this->db->from('(' . $query1 . ') as X');
		$this->db->limit(1, 0);
		$query2 = $this->db->get_compiled_select();
		$this->db->from('(' . $query2 . ') as Y');
		$this->db->join('posting_consolidate_deployment_report_view', 'posting_consolidate_deployment_report_view.posting_id = Y.id', 'left');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $result = $query->result();
	}
	public function getParentPosting($parent_posting_id)
	{
		$this->db->select('*');
		$this->db->where('id', $parent_posting_id);
		$query = $this->db->get($this->table);
		$result = $query->result();
		return $result;
	}
	public function update($data, $where, $deployment_report_id, $additional_posting_data = null)
	{
		//$this->db->trans_start();
		$this->db->where($where);
		$view = $data['view'];
		unset($data['view']);
		$a = $this->db->update($this->table, $data);
		//update the 
		if ($additional_posting_data != null) {
			if (isset($additional_posting_data['add'])) {
				$this->db->insert_batch('posting_info', $additional_posting_data['add']);
				//echo $this->db->last_query();
			}
			if (isset($additional_posting_data['update'])) {
				$this->db->update_batch('posting_info', $additional_posting_data['update'], 'id');
				//echo $this->db->last_query();
				//die;

			}
		}
		//die;
		if ($this->posting_consolidate_deployment_report_view_exists($where['id'], $deployment_report_id)) {
			$this->db->where(['posting_id' => $where['id'], 'deployment_report_id' => $deployment_report_id]);
			$b = $this->db->update('posting_consolidate_deployment_report_view', ['view' => $view]);
		} else {
			$b = $this->db->insert('posting_consolidate_deployment_report_view', ['posting_id' => $where['id'], 'deployment_report_id' => $deployment_report_id, 'view' => $view]);
		}
		if ($a && $b) {
			return true;
		}
	}
	//will add the new posting attached to previos one as history
	public function updatePosting($data, $deployment_report_id)
	{
		$view = $data['view'];
		unset($data['view']);
		$a = $this->db->insert($this->table, $data);
		//echo $this->db->last_query();
		$add2 = ['posting_id' => $this->db->insert_id(), 'deployment_report_id' => $deployment_report_id, 'view' => $view];
		$status2 = $this->db->insert('posting_consolidate_deployment_report_view', $add2);
		//echo $this->db->last_query();

		//die;
		if ($a && $status2) {
			return true;
		}
	}
	public function posting_consolidate_deployment_report_view_exists($posting_id, $deployment_report_id)
	{
		$this->db->select('count(*) as total');
		$this->db->where('posting_id', $posting_id);
		$this->db->where('deployment_report_id', $deployment_report_id);
		$query = $this->db->get('posting_consolidate_deployment_report_view');
		$result = $query->result();
		if ($result[0]->total > 0) {
			return true;
		} else {
			return false;
		}
	}
	/*editing posting*/
	public function get_parentPostingId_of_parentPosting($parent_posting_id)
	{
		$this->db->select('*');
		$this->db->where('id', $parent_posting_id);
		$query = $this->db->get($this->table);
		$result = $query->result();
		return $result;
	}
	//----------------------------------posting management osi module ------------ -------------- ------------- -----------------
	public function make_query_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName, $beltnos = null)
	{
		$this->db->select(array('man_id', 'concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank) as current_rank', 'name', 'phono1', 'depttno'));

		$query = $this->db->from('newosi');
		/*	if(isset($_POST["search"]["value"]))
			{
				//$this->db->like('name',$_POST["search"]["value"]);
				$this->db->like('depttno',$_POST["search"]["value"]);
				
			}*/
		if ($this->session->userdata('user_log') == 4) {
			$this->db->where('bat_id', $this->session->userdata('userid'));
		}
		$this->db->where('bat_id !=', '0');
		if (null != $selectedPolicePersonnelIds) {
			$this->db->where_not_in('man_id', explode(',', $selectedPolicePersonnelIds));
		}

		if (null != $selectedPolicePersonnelBeltNo && !empty($selectedPolicePersonnelBeltNo) && (count($selectedPolicePersonnelBeltNo) > 0)) {
			$i = 0;
			foreach ($selectedPolicePersonnelBeltNo as $k => $v) {
				if ($i == 0) {
					$this->db->like('depttno', $v);
					$i++;
				} else {
					$this->db->or_like('depttno', $v);
				}
			}
		}
		if ($beltnos != null) {
			//echo 'hi';
			$this->db->where_in('depttno', $beltnos);
		}
		if (null != $selectedPolicePersonnelPhoneNo) {
			$this->db->like('phono1', $selectedPolicePersonnelPhoneNo);
		}
		if (null != $selectedPolicePersonnelEmployeeName) {
			$this->db->like('name', $selectedPolicePersonnelEmployeeName);
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('name', 'ASC');
		}
		//$this->db->join('users','users.users_id = postings.bat_id');
	}
	public function getSubPostings($parent_id)
	{
		$this->db->select('*');
		$this->db->where('parent_posting_id', $parent_id);
		$this->db->order_by('parent_posting_id', 'ASC');
		$query = $this->db->get($this->table);
		$result = $query->result();
		return $result;
	}
	public function getSubPostings2($parent_id, $before_date_posting = null)
	{
		$this->db->set_protect_identifiers(false);
		$this->db->select('`name`, `parent_posting_id`, `bat_id`, `added_by`, `shown_in`, `created_date`, `order_by_`, case when old_posting_id is not null then old_posting_id else id end as old_posting_id, case when old_posting_id is not null then old_posting_id else id end as id', false);

		$this->db->group_start();
		$this->db->where('parent_posting_id', $parent_id);
		$this->db->or_where('case when parent_posting_id = ' . $parent_id . ' then id=old_posting_id end', '', false);
		$this->db->group_end();
		$this->db->from($this->table);
		if ($before_date_posting != null) {
			//$this->db->where('created_date <= ',$before_date_posting,true);
			$this->db->where('case when old_posting_id is not NULL then created_date <= ' . $this->db->escape($before_date_posting) . ' else 1=1 end', '', false);
		}
		$this->db->order_by('created_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$query1 = $this->db->get_compiled_select();

		$this->db->from('(' . $query1 . ') as X', false);
		//$this->db->set_protect_identifiers(true);
		$this->db->group_by('X.old_posting_id');
		$this->db->order_by('X.parent_posting_id', 'ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result();
		$this->db->set_protect_identifiers(true);
		return $result;
	}
	public function make_datatables_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName, $belt_no = null)
	{
		$this->make_query_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName, $belt_no);

		if ($_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		} else {
			$this->db->limit(10, 1);
		}
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function get_filtered_data_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName, $beltno = null)
	{
		$this->make_query_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName, $beltno);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_all_data_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName)
	{
		$this->db->select('*');
		if (null != $selectedPolicePersonnelIds) {
			$this->db->where_not_in('man_id', explode(',', $selectedPolicePersonnelIds));
		}
		$this->db->where('bat_id !=', '0');
		if ($this->session->userdata('user_log') == 4) {
			$this->db->where('bat_id', $this->session->userdata('userid'));
		}
		/*if(null!=$selectedPolicePersonnelBeltNo && !empty($selectedPolicePersonnelBeltNo) && (count($selectedPolicePersonnelBeltNo)>0)){
				foreach($selectedPolicePersonnelBeltNo as $k=>$v){
					//$this->db->or_like('depttno',$v);
				}
			}
			if(null!=$selectedPolicePersonnelPhoneNo){
				$this->db->like('phono1',$selectedPolicePersonnelPhoneNo);
			}
			if(null!=$selectedPolicePersonnelEmployeeName){
				$this->db->like('name',$selectedPolicePersonnelEmployeeName);
			}*/
		$this->db->from('newosi');
		return $this->db->count_all_results();
	}
	function getSelectedPolicePersonnel($employee_ids)
	{
		$this->db->select(array('man_id', 'concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank) as current_rank', 'name', 'phono1', 'depttno'));
		$this->db->where_in('man_id', $employee_ids);
		$query = $this->db->get('newosi');
		$result = $query->result();
		return $result;
	}
	/* Wrong */
	function get_parent_postings_for_employees($ids)
	{
		$this->db->select('*');
		$this->db->where_in($ids);
		$query = $this->db->get('newosi');
		$result = $query->result();
		return $result;
	}
	function getPostingByNameAndParentId($searchText, $id = null, $limit = null, $start = null, $bat_ids = null)
	{
		//echo 'hi';
		$this->db->select('id as new_id');
		if ($searchText != null) {
			$this->db->like('name', $searchText);
		}
		$this->db->from('postings');
		$query1 =  $this->db->get_compiled_select();
		$this->db->set_protect_identifiers(false);
		$this->db->select('*, case when postings.old_posting_id is not null then old_posting_id else postings.id end as target_id');
		if ($searchText != null) {
			$this->db->like('name', $searchText);
		}
		$this->db->or_where_in('postings.old_posting_id', $query1);
		if ($id != null) {
			//$this->db->group_start();
			$this->db->where('parent_posting_id', $id);

			//$this->db->group_end();
		}
		$this->db->order_by('created_date', 'desc');
		$this->db->from('postings');
		$this->db->limit('18446744073709551615', 0);
		$query1 = $this->db->get_compiled_select();
		$this->db->select('*, case when old_posting_id is not null then old_posting_id else X.id end as id');
		$this->db->from('(' . $query1 . ') as X');
		$this->db->group_by('X.target_id');
		if ($limit != -1) {
			if ($limit != null) {
				$this->db->limit($limit, $start);
			} else {
				$this->db->limit(10, 0);
			}
		}
		if ($bat_ids != null) {
			/* if($this->session->userdata('user_log')==){
					$this->db->where_in('bat_id',$this->session->userdata);
				}
				$this->db->where_in('bat_id',$bat_ids); */
		}
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();
		$this->db->set_protect_identifiers(true);
		return $result;
	}
	function getTotalPostingByNameAndParentId($searchText = null, $id = null, $limit = null, $start = null)
	{
		$this->db->set_protect_identifiers(false);
		//echo 'hi';
		$this->db->select('count(*) as total');
		$this->db->where('old_posting_id', NULL);
		//$this->db->group_by('target_id');
		/* if($search_text!==null){
				$this->db->like('name',$searchText);
			}
			if($id!=null){
				$this->db->where('parent_posting_id',$id);
			} */
		$query = $this->db->get($this->table);
		$this->db->set_protect_identifiers(true);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result[0]->total;
	}
	function getTotalFilteredPostingByNameAndParentId($searchText = null, $id = null)
	{

		$this->db->select('count(*) as total');
		if ($searchText !== null) {
			$this->db->like('name', $searchText);
		}
		if ($id != null) {
			$this->db->where('parent_posting_id', $id);
		}

		$query = $this->db->get($this->table);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result[0]->total;
	}
	public function addPostingInBulk($posting_id, $employee_ids, $order_number, $posting_date, $order_date, $additional_posting_id = null)
	{

		$data = array();
		$emp_ids = $employee_ids;
		foreach ($emp_ids as $k => $v) {
			$data[$k] = array('posting_id' => $posting_id, 'employee_id' => $v, 'order_no' => $order_number, 'posting_date' => $posting_date, 'bat_id' => $this->session->userdata('userid'), 'order_date' => $order_date);
			if ($additional_posting_id != null) {
				$data[$k]['additional_posting_id'] = $additional_posting_id;
			}
		}
		$no_of_records_inserted = $this->db->insert_batch('posting_history', $data);

		return $no_of_records_inserted;
	}

	public function getPostingHistoryObjects($posting_id, $employee_ids, $order_number, $posting_date, $order_date, $bat_id)
	{
		$this->db->select('*');
		$this->db->where('posting_id', $posting_id);
		$this->db->where_in('employee_id', $employee_ids);
		$this->db->where('order_no', $order_number);
		$this->db->where('posting_date', $posting_date);
		$this->db->where('bat_id', $bat_id);
		$this->db->where('order_date', $order_date);
		$this->db->from('posting_history');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function getEmployeesAlreadyAdded($posting_id, $order_number, $employee_ids)
	{
		$this->db->select('*');
		$this->db->where('posting_id', $posting_id);
		$this->db->where('order_no', $order_number);
		$this->db->where_in('employee_id', $employee_ids);
		$query = $this->db->get('posting_history');
		$result = $query->result();
		return $result;
	}



	//---------------------------------- ------------ -------------- ------------- -----------------

	// -------------- -------------- View of deployment statement-------------- -------------- -------------- --------------
	/*public function getAllPostings(){
			$this->db->select('*');
			$query = $this->db->get($this->table);
			$result = $query->result();
			return $result;
			before_date : this is the date on to which you want to see the deployment
		}*/ //Declared above
	/**
	 * Here we are fetching the posting History records(employees) from posting_history table for the battalion login
	 * @param type $before_date
	 * @param type $bat_ids
	 * @return type
	 */
	public function getPostingHistory($before_date = null, $bat_ids = null, $posting_id = null)
	{

		$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id'));
		//$this->db->where('employee_id',20748);
		//$this->db->where('posting_history.bat_id',$this->session->userdata('userid'));
		//$before_date = "2021-05-10 23:59:59";
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <= ', $before_date);
		}
		if ($posting_id != null) {
			$this->db->where('posting_id', $posting_id);
		}
		$this->db->from('posting_history');

		$innerSelect =  $this->db->get_compiled_select();
		//echo $innerSelect;
		$this->db->select('*');
		$this->db->from('(' . $innerSelect . ') as X');
		$this->db->order_by('X.posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$centerSelect = $this->db->get_compiled_select();
		//echo '<br>';
		//echo $centerSelect;
		$this->db->select('id,posting_id,concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as current_rank, posting_date, employee_id,inductionmode,phbat_id');
		$this->db->from('(' . $centerSelect . ') as Y');
		$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id');
		//$this->db->where_not_in('newosi.inductionmode',['Formal Order Not Issued']);
		$this->db->where('newosi.bat_id', $this->session->userdata('userid'));
		$this->db->group_by('Y.employee_id');
		$this->db->order_by('Y.posting_date', 'desc');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('(' . $outerSelect . ') as Z');
		if ($bat_ids != null && is_array($bat_ids)) {
			//$this->db->where_in('Z.phbat_id',$bat_ids);
			//$this->db->where_in('Z.phbat_id',$bat_ids);
		}
		//$this->db->order_by('Z.posting_date','desc');
		$outerSelect1 = $this->db->get_compiled_select();

		//$this->db->select('('.$outerSelect.') as Z');


		$query = $this->db->query($outerSelect1);
		//echo $outerSelect1;
		$result = $query->result();

		return $result;
	}
	public function getNotRelievedEmployees($employee_ids = null, $before_date = null, $bat_ids = null)
	{

		$this->db->select("nop, STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') as date, reld");
		if ($employee_ids != null) {
			$this->db->where_in('nop', $employee_ids);
		}
		if ($before_date != null) {
			$this->db->where("STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') <=", $before_date);
			//$this->db->not_where('Dateofrelieving','');
		}
		if ($bat_ids != null) {
			$this->db->where_in('nop', $bat_ids);
		}
		$this->db->from('deinduction');
		$this->db->order_by("date", 'desc');
		$this->db->limit('18446744073709551615', 0);
		$inner_select = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $inner_select . ') as X');
		$this->db->group_by('X.nop');
		$outerSelect = $this->db->get_compiled_select();
		//echo $outerSelect;
		$query = $this->db->query($outerSelect);
		$result = $query->result();
		return $result;
	}
	/**
	 * hERE WE ARE FETCHING THE POSTING HISTORY RECORDS FROM posting_history table for the igp login
	 * @param type $battalions
	 * @param type $before_date
	 * @return type
	 */
	public function getPostingHistoryIGP2($battalions, $before_date = null, $ranks = null, $rank_category = null, $posting_id = null)
	{
		$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date);
		}
		if ($posting_id != null) {
			$this->db->where('posting_id', $posting_id);
		}
		$this->db->where_in('bat_id',$battalions);
		$this->db->from('posting_history');
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$innerSelect =  $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from("(".$innerSelect.") as Y");
		$this->db->group_by('employee_id');//multiple employee entry removed
		//fetch postings
		//echo $this->db->last_query();
		$posting_data = $this->db->get()->result();
		//fetch employees
		//get the employee ids
		$employee_ids =[];
		$total = 0;
		foreach($posting_data as $k=>$val){
			if($val->posting_id==2306){
				$total++;
			}
			$employee_ids[] = $val->employee_id;
		}
		if(count($employee_ids)>0){
			$this->db->select('concat_ws("",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as current_rank, man_id, inductionmode,  bat_id');
			//$ranks = array('ASI','SI/LR','SI/CR');
			if ($ranks != null) {
				$this->db->where_in('concat_ws("",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
			}
			if(count($employee_ids)>250){
				$ids_ = array_chunk($employee_ids,250);
				$this->db->group_start();
				foreach($ids_ as $k=>$val){
					$this->db->or_where_in('man_id',$val);
				}
				$this->db->group_end();
			}else{
				$this->db->where_in('man_id',$employee_ids);
			}
			$this->db->where('bat_id != 0');
			//$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)',$ranks);
			//$this->db->from('(' . $innerSelect . ') as Y');
			//$this->db->where('newosi.bat_id','Y.phbat_id');
			//$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id'); //CHECK
			if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
				$this->db->where_in('newosi.bat_id', $battalions);
			}
			if ($rank_category != null) {
				$this->db->where_in('newosi.presentrank', $rank_category);
			}
			//$this->db->group_by('Y.employee_id');
			//$this->db->order_by('Y.posting_date', 'desc');
			//$outerSelect = $this->db->get_compiled_select();
			$employees_obj = $this->db->get('newosi')->result();
			$employees = [];
			foreach($employees_obj as $k=>$val){
				$employees[$val->man_id] = $val;
			}
		}else{
			$employess = [];
		}
		return [
			'posting_data'=>$posting_data,
			'employees'=>$employees
		];
		//echo $this->db->last_query();
		//return $result;
	}
	//used in deployment for counters
	public function getPostingHistoryIGP($battalions, $before_date = null, $ranks = null, $rank_category = null, $posting_ids= null)
	{
		$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date.' 23:59:59');
		}
		//$this->db->where('posting_history.posting_id',2306);
		if ($posting_ids != null) {
			if(is_array($posting_ids) && count($posting_ids)){
				$this->db->where_in('posting_id', $posting_ids);
			}else{
				$this->db->where('posting_id', $posting_ids);
			}
		}
		
		$this->db->from('posting_history');
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$innerSelect =  $this->db->get_compiled_select();

		$this->db->select('id,posting_id,concat_ws("",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as current_rank, posting_date, employee_id, inductionmode, phbat_id, newosi.bat_id as nosbat_id');
		//$ranks = array('ASI','SI/LR','SI/CR');
		//$ranks = array('SI','INSP/LR','INSP/CR');
		if ($ranks != null) {
			$this->db->where_in('concat_ws("",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
		}
		//$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)',$ranks);
		$this->db->from('(' . $innerSelect . ') as Y');
		//$this->db->where('newosi.bat_id','Y.phbat_id');
		$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id'); //CHECK
		if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
			$this->db->where_in('newosi.bat_id', $battalions);
		}
		if ($rank_category != null) {
			$this->db->where_in('newosi.presentrank', $rank_category);
		}
		//$this->db->group_by('Y.employee_id');
		$this->db->order_by('Y.posting_date', 'desc');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('*');

		$this->db->from('(' . $outerSelect . ') as Z');
		if ($battalions != null && is_array($battalions)) {
			$this->db->where_in('Z.phbat_id', $battalions);
		}
		$this->db->group_by('Z.employee_id');
		$outerSelect1 = $this->db->get_compiled_select();
		//echo $outerSelect;
		$query = $this->db->query($outerSelect1);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}
	//used this one in osi consolidate 
	public function getPostingHistoryIGP3($battalions, $before_date = null, $ranks = null, $rank_category = null, $posting_ids= null)
	{
		$this->db->select('*');
		$this->db->from('posting_history');
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date.' 23:59:59');
		}
		$this->db->join('newosi', 'posting_history.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = posting_history.bat_id'); //CHECK
		if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
			$this->db->where_in('newosi.bat_id', $battalions);
		}
		if ($rank_category != null) {
			$this->db->where_in('newosi.presentrank', $rank_category);
		}
		//$this->db->where('employee_id',13571);
		$this->db->order_by('posting_date','desc');
		$query = $this->db->get();
		$result = $query->result();
		$posting_employee_ids = [];
		$employees_parsed = [];
		//$allowed_posting_objects = [];
		foreach($result as $k=>$val){
			if(!in_array($val->employee_id,$employees_parsed)){
				$employees_parsed[] = $val->employee_id;
				if(in_array($val->posting_id,$posting_ids)){
					$posting_employee_ids[] = $val->employee_id;
					//$allowed_posting_objects[] = $val;
				}
			}
		}
		//var_dump($posting_employee_ids);
		//die('hiello');
		$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date.' 23:59:59');
		}
		if(count($posting_employee_ids)>100){
			$this->db->group_start();
			$chunked_employee_ids = array_chunk($posting_employee_ids,100);
			for($i=0;$i<count($chunked_employee_ids);$i++){
				$this->db->or_where_in('employee_id',$chunked_employee_ids[$i]);
			}
			$this->db->group_end();
		}else{
			$this->db->where_in('employee_id',$posting_employee_ids);
		}
		//$this->db->where('posting_history.posting_id',2306);
		/*if ($posting_ids != null) {
			if(is_array($posting_ids) && count($posting_ids)){
				$this->db->where_in('posting_id', $posting_ids);
			}else{
				$this->db->where('posting_id', $posting_ids);
			}
		}*/
		$this->db->from('posting_history');
		//$this->db->order_by('posting_date', 'desc');
		//$this->db->limit('18446744073709551615', 0);
		$innerSelect =  $this->db->get_compiled_select();

		$this->db->select('id,posting_id,concat_ws("",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as current_rank, posting_date, employee_id, inductionmode, phbat_id, newosi.bat_id as nosbat_id');
		//$ranks = array('ASI','SI/LR','SI/CR');
		if ($ranks != null) {
			$this->db->where_in('concat_ws("",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
		}
		//$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)',$ranks);
		$this->db->from('(' . $innerSelect . ') as Y');
		//$this->db->where('newosi.bat_id','Y.phbat_id');
		$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id'); //CHECK
		if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
			$this->db->where_in('newosi.bat_id', $battalions);
		}
		if ($rank_category != null) {
			$this->db->where_in('newosi.presentrank', $rank_category);
		}
		//$this->db->group_by('Y.employee_id');
		//$this->db->order_by('Y.posting_date', 'desc');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('*');

		$this->db->from('(' . $outerSelect . ') as Z');
		if ($battalions != null && is_array($battalions)) {
			$this->db->where_in('Z.phbat_id', $battalions);
		}
		$this->db->order_by('Z.posting_date', 'desc');
		$outerSelect1 = $this->db->get_compiled_select();
		//echo $outerSelect1;die;
		$query = $this->db->query($outerSelect1);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}
	// -------------- -------------- -------------- -------------- -------------- --------------
	/**
	 * hERE WE ARE FETCHING THE POSTING HISTORY RECORDS FROM posting_history table for the igp login
	 * @param type $battalions
	 * @param type $before_date
	 * @return type
	 */
	public function getEmployeeIdsFromPostingHistoryIGP($battalions, $before_date = null, $ranks = null, $rank_category = null, $posting_id = null)
	{
		$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date);
		}
		//$this->db->where('posting_history.posting_id',1526);
		if ($posting_id != null) {
			$this->db->where('posting_id', $posting_id);
		}
		$this->db->from('posting_history');
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$innerSelect =  $this->db->get_compiled_select();

		$this->db->select('employee_id, phbat_id, newosi.bat_id as nosbat_id');
		//$ranks = array('ASI','SI/LR','SI/CR');
		if ($ranks != null) {
			$this->db->where_in('concat_ws("",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
		}
		//$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)',$ranks);
		$this->db->from('(' . $innerSelect . ') as Y');
		//$this->db->where('newosi.bat_id','Y.phbat_id');
		$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id'); //CHECK
		if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
			$this->db->where_in('newosi.bat_id', $battalions);
		}
		if ($rank_category != null) {
			$this->db->where_in('newosi.presentrank', $rank_category);
		}
		$this->db->group_by('Y.employee_id');
		$this->db->order_by('Y.posting_date', 'desc');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('Z.employee_id');

		$this->db->from('(' . $outerSelect . ') as Z');
		if ($battalions != null && is_array($battalions)) {
			$this->db->where_in('Z.phbat_id', $battalions);
		}
		$outerSelect1 = $this->db->get_compiled_select();
		//echo $outerSelect;
		$query = $this->db->query($outerSelect1);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}
	// -------------- -------------- -------------- -------------- -------------- --------------

	public function getNumberOfEmployeesAddedToPosting($posting_id)
	{
		$this->db->select("count('*') as total");
		$this->db->where('posting_id', $posting_id);
		$query = $this->db->get('posting_history');
		$result = $query->result();
		//echo $this->db->last_query();
		//var_dump($result);
		return $result[0]->total;
	}
	public function deletePosting($posting_id)
	{
		$this->db->where('id', $posting_id);
		$a = $this->db->delete('postings');
		$a = $this->db->affected_rows();
		return $a;
	}
	// -------------  ------------- Deployment history ------------- ------------- 
	public function getEmployees()
	{
		//$this->db->select('*');
		$this->db->select(array('man_id', 'concat_ws("",cexrank,cminirank,cmedirank,ccprank,cccrank) as current_rank', 'name', 'fathername', 'phono1', 'depttno', 'users.nick'));
		if (null != $this->input->post('employee_name')) {
			$this->db->like('name', $this->input->post('employee_name'));
		}
		/*if(true or null!=$this->input->post('employee_name')){
				$this->db->like('name','dalwinder');
			}*/
		if (null != $this->input->post('regimental_no')) {
			$this->db->like('depttno', $this->input->post('regimental_no'));
		}
		if (null != $this->input->post('ranks')) {
			$ranks = $this->input->post('ranks');
			if (null != $ranks && (count($ranks) > 0)) {
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
			}
		}
		if (null != $this->input->post('order')) {

			$order = $this->input->post('order')[0];
			$columns = ['sno', 'current_rank', 'name', 'depttno'];
			$selectedColumn = $columns[$order['column']];
			$direction = $order['dir'];
			//var_dump($this->input->post('order'));
			//die;
			$this->db->order_by($selectedColumn, $direction);
		}
		if ($_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		if ($this->session->userdata('user_log') == 100) { //igp login
			//get the battalions
			if ($this->input->post('battalions') != null && count($this->input->post('battalions')) != 0) {
				$battalions = $this->input->post('battalions');
				$this->db->where_in('newosi.bat_id', $battalions);
			} else {
			}
		} else { //battalion login
			$this->db->where('newosi.bat_id', $this->session->userdata('userid'));
		}
		$this->db->join('users', 'newosi.bat_id = users.users_id');
		$query = $this->db->get('newosi');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	public function getTotalEmployees()
	{
		$this->db->select('count(*) as total');
		if ($this->session->userdata('user_log') == 100) { //igp login
			//get the battalions
			if ($this->input->post('battalions') != null && count($this->input->post('battalions')) != 0) {
				$battalions = $this->input->post('battalions');
				$this->db->where_in('newosi.bat_id', $battalions);
			}
		} else { //battalion login
			$this->db->where('newosi.bat_id', $this->session->userdata('userid'));
		}
		$query = $this->db->get('newosi');
		$result = $query->result();
		return $result[0]->total;
	}
	public function getTotalFilteredEmployees()
	{
		$this->db->select('count(*) as total');
		if (null != $this->input->post('employee_name')) {
			$this->db->like('name', $this->input->post('employee_name'));
		}
		if (null != $this->input->post('regimental_no')) {
			$this->db->like('depttno', $this->input->post('regimental_no'));
		}
		if (null != $this->input->post('ranks')) {
			$ranks = $this->input->post('ranks');
			if (null != $ranks && (count($ranks) > 0)) {
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
			}
		}
		/*if($_POST["length"] != -1){
				$this->db->limit($_POST["length"], $_POST["start"]);
			}*/
		if ($this->session->userdata('user_log') == 100) { //igp login
			//get the battalions
			if ($this->input->post('battalions') != null && count($this->input->post('battalions')) != 0) {
				$battalions = $this->input->post('battalions');
				$this->db->where_in('newosi.bat_id', $battalions);
			}
		} else { //battalion login
			$this->db->where('newosi.bat_id', $this->session->userdata('userid'));
		}
		$query = $this->db->get('newosi');
		$result = $query->result();
		return $result[0]->total;
	}
	//--deployment history of employee
	public function getEmployeeHistory($emp_id, $battalion_id, $search = null, $limit = null, $start = null)
	{
		$this->db->set_protect_identifiers(false);
		$this->db->select('posting_history.id as id, posting_id, employee_id, order_no, order_date, posting_date, posting_history.bat_id, posting_history.created,postings.name, postings.parent_posting_id,postings.created_date,postings.old_posting_id, case when postings.old_posting_id is not null then postings.old_posting_id else postings.id end as new_id,posting_history.additional_posting_id');
		$this->db->where('posting_history.employee_id', $emp_id);
		if ($limit != null && $start != null) {
			$this->db->limit($limit, $start);
		}
		if ($search != null) {
			$this->db->like('postings.name', $search);
		}
		$this->db->from('posting_history');
		//$this->db->where('bat_id',$battalion_id);
		$this->db->order_by('postings.created_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$this->db->join('postings', 'posting_history.posting_id = postings.id or postings.old_posting_id = posting_history.posting_id');

		$query1 = $this->db->get_compiled_select();
		//echo $query1.'<Br>';
		$this->db->select('*');
		$this->db->from('(' . $query1 . ') as X');

		$this->db->group_by('X.new_id,X.id');

		$query2 = $this->db->get_compiled_select();
		$this->db->select('Y.*,users.*,posting_info.title,posting_info_type.title as type_title');
		$this->db->from('(' . $query2 . ') as Y');
		$this->db->order_by('Y.posting_date', 'desc');
		$this->db->join('users', 'Y.bat_id = users.users_id');
		$this->db->join('posting_info', 'Y.additional_posting_id = posting_info.id', 'left');
		$this->db->join('posting_info_type', 'posting_info.type = posting_info_type.id', 'left');
		//$this->db->join('newosi','Y.employee_id = newosi.man_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}

	public function getEmployeeHistoryTotalCount($emp_id, $battalion_id)
	{
		$this->db->select('count(*) as total');
		$this->db->where('posting_history.employee_id', $emp_id);
		//$this->db->where('bat_id',$battalion_id);
		//$this->db->order_by('posting_history.posting_date','desc');
		//$this->db->join('postings','posting_history.posting_id = postings.id');
		//$this->db->join('users','posting_history.bat_id = users.users_id');

		//$this->db->join('newosi','Y.employee_id = newosi.man_id');
		$query = $this->db->get('posting_history');
		$result = $query->result();
		return $result[0]->total;
	}
	public function getEmployeeHistoryTotalFilteredCount($emp_id, $battalion_id, $search)
	{
		$this->db->select('count(*) as total');
		$this->db->where('posting_history.employee_id', $emp_id);
		//$this->db->where('bat_id',$battalion_id);
		//$this->db->order_by('posting_history.posting_date','desc');
		if ($search != null) {
			$this->db->like('postings.name', $search);
		}
		$this->db->join('postings', 'posting_history.posting_id = postings.id');
		$this->db->join('users', 'posting_history.bat_id = users.users_id');

		//$this->db->join('newosi','Y.employee_id = newosi.man_id');
		$query = $this->db->get('posting_history');
		$result = $query->result();
		return $result[0]->total;
	}
	public function getTheEmployeeDetail($emp_id)
	{
		$this->db->select('newosi.name,newosi.depttno,newosi.bat_id,users.nick,users.nick2');
		$this->db->where('newosi.man_id', $emp_id);
		$this->db->join('users', 'newosi.bat_id = users.users_id');
		$query = $this->db->get('newosi');
		$result = $query->result();
		return $result;
	}
	public function getPositngsHistoryOf($employees_ids)
	{
		$this->db->select('*');
		$this->db->where_in('employee_id', $employees_ids);
		$query = $this->db->get('posting_history');
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}
	public function getPostings($posting_ids)
	{
		$this->db->select('*');
		$this->db->where_in('id', $posting_ids);
		$query = $this->db->get('postings');
		$result = $query->result();
		return $result;
	}
	public function getPostings2($posting_ids, $date = null)
	{
		$this->db->set_protect_identifiers(false);
		$this->db->select('name,created_date, case when old_posting_id is not null then old_posting_id else id end as old_posting_id, case when old_posting_id is not null then old_posting_id else id end as id');
		$this->db->group_start();
		$this->db->where_in('id', $posting_ids);
		$this->db->or_where_in('old_posting_id', $posting_ids);
		$this->db->group_end();
		$this->db->order_by('created_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		if ($date != null) {
			$this->db->where('created_date <=', $date, true);
		}
		$this->db->from("postings");
		$query1 = $this->db->get_compiled_select();
		$this->db->select('X.*');
		$this->db->from("(" . $query1 . ") as X");
		//$this->db->join('posting_info','X.additional_posting_id = posting_info.id','left');
		//$this->db->join('posting_info_type','posting_info.type = posting_info_type.id','left');
		$this->db->group_by('X.id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result();
		$this->db->set_protect_identifiers(true);
		return $result;
	}
	public function getBattalions($battalion_ids)
	{
		$this->db->select('users_id,nick,nick2');
		$this->db->where_in('users_id', $battalion_ids);
		$query = $this->db->get('users');
		$result = $query->result();
		return $result;
	}
	//-------------------  -------------------------------
	public function getSubPostingsOf($posting_ids)
	{
		$this->db->select('id,name');
		$this->db->where_in('parent_posting_id', $posting_ids);
		$query = $this->db->get('postings');
		$result = $query->result();
		return $result;
	}
	public function getSubPostingsOf2($posting_ids, $before_date_posting = null)
	{
		$this->db->set_protect_identifiers(false);
		$this->db->select('name,created_date, case when old_posting_id is not null then old_posting_id else id end as old_posting_id, case when old_posting_id is not null then old_posting_id else id end as id');
		$this->db->group_start();
		$this->db->where_in('parent_posting_id', $posting_ids);
		$this->db->or_where('case when parent_posting_id in (' . implode(',', $posting_ids) . ') then id=old_posting_id end', '', false);
		$this->db->group_end();
		if ($before_date_posting != null) {
			//$this->db->where('created_date <=',$before_date_posting,true);
			$this->db->where('case when old_posting_id is not NULL then created_date <= ' . $this->db->escape($before_date_posting) . ' else 1=1 end', '', false);
		}
		$this->db->order_by('created_date', 'desc');
		$this->db->from('postings');
		$this->db->limit('18446744073709551615', 0);
		$query1 = $this->db->get_compiled_select();

		$this->db->from('(' . $query1 . ') as X');
		$this->db->group_by('old_posting_id');
		$query = $this->db->get();
		$this->db->set_protect_identifiers(true);
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}

	public function getPostingsOfSelectedEmployees($employee_ids)
	{
		$this->db->select('*');
		$this->db->order_by('posting_date', 'desc');
		$diff = 300;
		$array = array_chunk($employee_ids, $diff);
		$this->db->group_start();
		foreach ($array as $k => $ar) {
			$this->db->or_where_in('employee_id', $ar);
		}
		$this->db->group_end();
		//$this->db->where_in('employee_id',$employee_ids);
		$this->db->limit('18446744073709551615', 0);
		$this->db->from('posting_history');
		$select_query_01 = $this->db->get_compiled_select();
		//echo $select_query_01.'<hr>';
		$this->db->select('*');
		$this->db->from('(' . $select_query_01 . ') as X');
		$this->db->group_by('X.employee_id');
		$select_query_02 = $this->db->get_compiled_select();
		//echo $select_query_02.'<hr>';
		$this->db->set_protect_identifiers(false);
		$this->db->select('case when postings.old_posting_id is not null then postings.old_posting_id else postings.id end as target_id, Y.id as id, postings.name as name, Y.posting_date,Y.order_no,Y.order_date, Y.employee_id,Y.additional_posting_id,posting_info.title,posting_info_type.title as type_title');
		$this->db->from('(' . $select_query_02 . ') as Y');
		$this->db->order_by('Y.posting_date', 'desc');
		$this->db->join('postings', 'Y.posting_id = postings.id or Y.posting_id = postings.old_posting_id');
		$this->db->join('posting_info', 'Y.additional_posting_id = posting_info.id', 'left');
		$this->db->join('posting_info_type', 'posting_info.type = posting_info_type.id', 'left');

		$this->db->order_by('postings.created_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$select_query_03 = $this->db->get_compiled_select();
		//echo '<HR>';
		// echo $select_query_03;
		$this->db->select('*');
		$this->db->from('(' . $select_query_03 . ') as Z');
		$this->db->group_by('Z.target_id,Z.employee_id');
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}
	public function getEmployeesFromPostingHistory($selected_ids, $selected_rank, $search, $before_date = null, $bat_ids = null, $induction_modes_not_to_be_included = null, $all_postings_ids_string)
	{

		//echo $all_postings_ids_string;
		$this->db->select('*,posting_history.bat_id as phbat_id');
		if ($before_date != null) {
			//$before_date = "2021-05-10 23:59:59";
			$this->db->where('posting_date <=', $before_date . ' 23:59:59');
		}
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$this->db->from('posting_history');
		$select_query_01 = $this->db->get_compiled_select();
		//echo $select_query_01;
		//echo '<BR>';
		$this->db->select('*');
		$this->db->from('(' . $select_query_01 . ') as X');
		$this->db->group_by('X.employee_id');
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$select_query_02 = $this->db->get_compiled_select();
		//echo $select_query_02;
		//	echo '<BR>';
		$this->db->select('*');
		$this->db->from('(' . $select_query_02 . ') as Y');
		if ($bat_ids != null && (count($bat_ids) > 0)) {
			//$this->db->where_in('Y.bat_id',$bat_ids);
			//$this->db->where_in('Z.bat_id',$bat_ids);
		}
		$this->db->order_by('Y.posting_date', 'desc');
		$select_query_03 = $this->db->get_compiled_select();
		//echo $select_query_03;
		//echo '<BR>';
		//$this->db->select('*,concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as rank_');
		$this->db->select('*,concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank) as rank_');
		$this->db->from('(' . $select_query_03 . ') as Z');
		$this->db->join('newosi', 'newosi.man_id = Z.employee_id and newosi.bat_id !=0');
		if ($bat_ids != null && (count($bat_ids) > 0)) {
			$this->db->where_in('newosi.bat_id', $bat_ids);
			$this->db->where_in('Z.bat_id', $bat_ids);
		}
		if ($induction_modes_not_to_be_included != null && count($induction_modes_not_to_be_included) > 0) {
			//$this->db->where_not_in('newosi.inductionmode',$induction_modes_not_to_be_included);
		}
		$this->db->where_in('Z.posting_id', $selected_ids);
		switch ($selected_rank) {
			case 'insp':
				$ranks = array('INSP', 'DSP/CR');
				$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'si':
				$ranks = array('SI', 'INSP/LR', 'INSP/CR');
				$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'asi':
				$ranks = array('ASI', 'SI/LR', 'SI/CR');
				$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'hc':
				$ranks = array('HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP');
				$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'ct':
				$ranks = array('CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'total':
				//$ranks = array('INSP','DSP/CR','SI','INSP/LR','INSP/CR', 'ASI','SI/LR','SI/CR','HC','ASI/LR','ASI/CR','ASI/ORP','CT','Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				//get the all records
				break;
			case 'otherRank':
				$ranks = array('INSP', 'DSP/CR', 'SI', 'INSP/LR', 'INSP/CR', 'ASI', 'SI/LR', 'SI/CR', 'HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP', 'CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				$this->db->where_not_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			default:

				break;
		}
		$this->db->group_start()->like('newosi.name', $search)->or_like('newosi.depttno', $search)->or_like('newosi.phono1', $search)->group_end();
		//$this->db->where('Z.rank_=',$rank);
		//$this->db->order_by('Z.posting_date','desc');
		//$this->db->order_by('Z.')
		//order by posting
		if ($all_postings_ids_string != null) {
			// echo 'hi';
			$this->db->order_by("FIELD(Z.posting_id,$all_postings_ids_string)");
		}
		//rank
		$this->db->order_by("FIELD(rank_,'INSP','INSP/LR','INSP/CR','SI', 'SI/LR','SI/CR','ASI','ASI/LR','ASI/CR','ASI/ORP','HC','HC/LR', 'HC/PR', 'HC/CR','C-II','Sr. Const', 'Sr.Const','CT' )");
		//posting date
		$this->db->order_by('Z.posting_date', 'desc');
		if (isset($_POST["length"]) && $_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		} else {
			//$this->db->limit(5, 0);
		}
		//$this->db->group_by('Z.posting_id');
		$select_query_04 = $this->db->get_compiled_select();


		$query = $this->db->query($select_query_04);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}
	
	/**
	 * 
	 * @param type $selected_ids = selected Posting
	 * @param type $selected_rank
	 * @param type $search
	 * @param type $battalions
	 * @param type $before_date
	 * @return type
	 */
	public function getEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date, $all_postings_ids_string, $ordered_battalion_ids_strings = null, $rank_category = null, $selected_permanent_rank = null, $permanent_ranks = null, $order_by = null, $order = null)
	{
		//---------------------------------------------------------------
		//echo $all_postings_ids_string;
		//if(true){
		$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id', 'order_no', 'order_date', 'additional_posting_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date);
		}

		$this->db->from('posting_history');
		$this->db->order_by('posting_date', 'desc');

		$this->db->limit('18446744073709551615', 0);
		$innerSelect =  $this->db->get_compiled_select();
		//echo $innerSelect;

		$this->db->select('id,posting_id,Y.additional_posting_id,concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as rank_, posting_date, employee_id, inductionmode, phbat_id, cexrank, newosi.name as name, newosi.bat_id as bat_id, newosi.depttno, newosi.phono1, Y.order_no, Y.order_date');
		//echo $rank_category;
		//var_Dump($ranks);
		if ($rank_category != null) {
			$RankRankre = $rank_category;
			if ($RankRankre != '') {
				$this->db->where('newosi.presentrank', $RankRankre);
				if ($RankRankre == 'Executive Staff') {
					if ($selected_permanent_rank != null) {
						$this->db->where('newosi.permanent_rank', $selected_permanent_rank);
					} else if ($permanent_ranks != null) {
						$this->db->where_in('newosi.permanent_rank', $permanent_ranks);
					}
				} else if ($RankRankre == 'Ministerial Staff') {
					//var_dump($selected_rank);
					//var_dump($selected_permanent_rank);
					//var_dump($permanent_ranks);
					//die;
					if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
						//var_dump($selected_rank);
						$this->db->where('newosi.cminirank', $selected_permanent_rank);
					}
				} else if ($RankRankre == 'Class-IV (C)') {
					if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
						//var_dump($selected_rank);
						$this->db->where('newosi.cccrank', $selected_permanent_rank);
					}
				} else if ($RankRankre == 'Class-IV (P)') {
					if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
						//var_dump($selected_rank);
						$this->db->where('newosi.ccprank', $selected_permanent_rank);
					}
				} else if ($RankRankre == 'Medical Staff') {
					if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
						//var_dump($selected_rank);
						$this->db->where('newosi.cmedirank', $selected_permanent_rank);
					}
				}
			}
		}


		$this->db->group_start()->like('newosi.name', $search)->or_like('newosi.depttno', $search)->or_like('newosi.phono1', $search)->group_end();
		if ($order_by != null && in_array($order_by, ['posting_date', 'order_no', 'order_date'])) {
			$this->db->order_by($order_by, $order);
		}
		//$this->db->order_by('posting_date','desc');
		$this->db->group_by('employee_id');
		$this->db->from('(' . $innerSelect . ') as Y');
		// $this->db->where('Y.bat_id','Y.phbat_id');
		if ($battalions != null && is_array($battalions) && count($battalions) > 0) {
			$this->db->where_in('newosi.bat_id', $battalions);
		}
		//$this->db->where('newosi.bat_id !=','`Y`.`phbat_id`');
		$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id');
		//$this->db->group_by('Y.employee_id');
		// $this->db->order_by('Y.posting_date','desc');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('*');
		$this->db->from('(' . $outerSelect . ') as Z');
		if ($battalions != null && is_array($battalions)) {
			$this->db->where_in('Z.phbat_id', $battalions);
			//$this->db->where_in('newosi.bat_id',$battalions);
		}
		if ($selected_ids != null && is_array($selected_ids) &&  count($selected_ids) > 0) {
			$this->db->where_in('Z.posting_id', $selected_ids);
		}
		if ($order_by != null && $order_by == 'bat_id') {
			if ($ordered_battalion_ids_strings != null) {
				$this->db->order_by("FIELD(Z.bat_id,$ordered_battalion_ids_strings)");
			}
		}
		if ($order_by != null && $order_by == 'posting') {
			if ($all_postings_ids_string != null) {
				$this->db->order_by("FIELD(Z.posting_id,$all_postings_ids_string)");
			}
		}
		if ($order_by != null) {
			//var_dump($order_by);;
			if (in_array($order_by, ['name', 'phono1'])) {
				$this->db->order_by('Z.' . $order_by, $order);
			}
			if (in_array($order_by, ['depttno'])) {
				$this->db->order_by('cast(Z.' . $order_by . ' as int)', $order);
			}
			if ($order == '') {
				$this->db->order_by($order_by);
			}
		}
		//$this->db->order_by("FIELD(rank_,'INSP','INSP/LR','INSP/CR','SI', 'SI/LR','SI/CR','ASI','ASI/LR','ASI/CR','ASI/ORP','HC','HC/LR', 'HC/PR', 'HC/CR','C-II','Sr. Const', 'Sr.Const','CT' )");
		//$this->db->order_by('Z.posting_date','desc');
		if (isset($_POST['length']) && $_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		} else {
			//$this->db->limit(5, 0);
		}
		$outerSelect1 = $this->db->get_compiled_select();
		$query = $this->db->query($outerSelect1);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
		//}
		//---------------------------------------------------------------

	}
	public function getTotalFilteredEmployeesFromPostingHistory($selected_ids, $selected_rank, $search, $before_date = null)
	{
		if (true) {
			$this->db->select('*');
			if ($before_date != null) {
				//$before_date = "2021-05-10 23:59:59";
				$this->db->where('posting_date <=', $before_date . ' 23:59:59');
			}
			$this->db->order_by('posting_date', 'desc');
			$this->db->limit('18446744073709551615', 0);
			$this->db->from('posting_history');
			$select_query_01 = $this->db->get_compiled_select();
			//echo $select_query_01;
			//echo '<BR>';
			$this->db->select('*');
			$this->db->from('(' . $select_query_01 . ') as X');
			$this->db->group_by('X.employee_id');
			$this->db->order_by('posting_date', 'desc');
			$this->db->limit('18446744073709551615', 0);
			$select_query_02 = $this->db->get_compiled_select();
			//echo $select_query_02;
			//	echo '<BR>';
			$this->db->select('*');
			$this->db->from('(' . $select_query_02 . ') as Y');

			$this->db->order_by('Y.posting_date', 'desc');
			$select_query_03 = $this->db->get_compiled_select();
			//echo $select_query_03;
			//echo '<BR>';
			$this->db->select('count(*) as total');
			$this->db->from('(' . $select_query_03 . ') as Z');
			$this->db->join('newosi', 'newosi.man_id = Z.employee_id and newosi.bat_id !=0');
			$bat_ids = [$this->session->userdata('userid')];
			if ($bat_ids != null && (count($bat_ids) > 0)) {
				$this->db->where_in('newosi.bat_id', $bat_ids);
				$this->db->where_in('Z.bat_id', $bat_ids);
			}

			$this->db->where_in('Z.posting_id', $selected_ids);
			switch ($selected_rank) {
				case 'insp':
					$ranks = array('INSP', 'DSP/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'si':
					$ranks = array('SI', 'INSP/LR', 'INSP/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'asi':
					$ranks = array('ASI', 'SI/LR', 'SI/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'hc':
					$ranks = array('HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'ct':
					$ranks = array('CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'total':
					//$ranks = array('INSP','DSP/CR','SI','INSP/LR','INSP/CR', 'ASI','SI/LR','SI/CR','HC','ASI/LR','ASI/CR','ASI/ORP','CT','Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
					//get the all records
					break;
				case 'otherRank':
					$ranks = array('INSP', 'DSP/CR', 'SI', 'INSP/LR', 'INSP/CR', 'ASI', 'SI/LR', 'SI/CR', 'HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP', 'CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
					$this->db->where_not_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				default:

					break;
			}
			$this->db->group_start()->like('newosi.name', $search)->or_like('newosi.depttno', $search)->or_like('newosi.phono1', $search)->group_end();
			//$this->db->where('Z.rank_=',$rank);
			$this->db->order_by('Z.posting_date', 'desc');


			$select_query_04 = $this->db->get_compiled_select();


			$query = $this->db->query($select_query_04);
			//echo $select_query_04;
			//$this->db->where_in('posting_id',$selected_ids);
			//$this->db->where('posting_history.bat_id',$this->session->userdata('userid'));
			//$this->db->group_by('employee_id');
			$result = $query->result();
			//echo $this->db->last_query();
			return $result[0]->total;
		}
		$this->db->select('*');
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date . ' 23:59:59');
		}
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$this->db->from('posting_history');
		$select_query_01 = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $select_query_01 . ') as X');
		$this->db->group_by('X.employee_id');
		$select_query_02 = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $select_query_02 . ') as Y');
		$this->db->order_by('Y.posting_date', 'desc');
		$select_query_03 = $this->db->get_compiled_select();

		$this->db->select('count(*) as total');
		$this->db->from('(' . $select_query_03 . ') as Z');
		$this->db->join('newosi', 'newosi.man_id = Z.employee_id and newosi.bat_id != 0');
		$this->db->where('newosi.bat_id', $this->session->userdata('userid'));
		$this->db->where('Z.bat_id', $this->session->userdata('userid'));
		$this->db->where_in('Z.posting_id', $selected_ids);
		switch ($selected_rank) {
			case 'insp':
				$ranks = array('INSP', 'DSP/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'si':
				$ranks = array('SI', 'INSP/LR', 'INSP/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'asi':
				$ranks = array('ASI', 'SI/LR', 'SI/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'hc':
				$ranks = array('HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'ct':
				$ranks = array('CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'total':
				//$ranks = array('INSP','DSP/CR','SI','INSP/LR','INSP/CR', 'ASI','SI/LR','SI/CR','HC','ASI/LR','ASI/CR','ASI/ORP','CT','Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				//get the all records
				break;
			case 'otherRank':
				$ranks = array('INSP', 'DSP/CR', 'SI', 'INSP/LR', 'INSP/CR', 'ASI', 'SI/LR', 'SI/CR', 'HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP', 'CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				$this->db->where_not_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			default:

				break;
		}

		$this->db->group_start()->like('newosi.name', $search)->or_like('newosi.depttno', $search)->or_like('newosi.phono1', $search)->group_end();
		//$this->db->where('Z.rank_=',$rank);
		$this->db->order_by('Z.posting_date', 'desc');
		$select_query_04 = $this->db->get_compiled_select();


		$query = $this->db->query($select_query_04);

		//$this->db->where_in('posting_id',$selected_ids);
		//$this->db->where('posting_history.bat_id',$this->session->userdata('userid'));
		//$this->db->group_by('employee_id');
		$result = $query->result();
		//echo $this->db->last_query();
		return $result[0]->total;
	}
	public function getTotalEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date, $rank_category = null, $selected_permanent_rank = null, $permanent_ranks = null)
	{
		$this->db->select(array( 'employee_id','bat_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date);
		}
		if ($selected_ids != null) {
			if(is_array($selected_ids)){
				if(count($selected_ids)>0){
					$this->db->where_in('posting_id', $selected_ids);
				}
			}else{
				$this->db->where('posting_id', $selected_ids);
			}
			
		}

		$this->db->where_in('bat_id',$battalions);
		$this->db->from('posting_history');
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$query1 = $this->db->get_compiled_select();
		//fetch postings
		$this->db->select('*');
		$this->db->from("({$query1}) as Y");
		$this->db->group_by('Y.employee_id');
		$posting_data = $this->db->get()->result();
		$show = false;
		if($this->input->post('show')!=null && $this->input->post('show')=="true"){
			var_dump($this->input->post('show'));
			$show=true;
		}
		if($show==true)
			echo $this->db->last_query();
		//fetch employees
		//get the employee ids
		//need thos employees whose other posting exists

		$employee_ids =[];
		$total = 0;
		$emp_ids = [];
		foreach($posting_data as $k=>$val){
			if(!isset($employee_ids[$val->bat_id]))
				$employee_ids[$val->bat_id]=[];
			$employee_ids[$val->bat_id][] = $val->employee_id;
			$emp_ids[$val->employee_id] = $val->employee_id;
		}
		if($show==true){
			var_dump($emp_ids);
		}
		if(true){
			$this->db->select('bat_id,posting_id,employee_id');
			$this->db->from('posting_history');
			$this->db->where_in('employee_id',$emp_ids);
			$this->db->order_by('posting_date','desc');
			$this->db->limit('18446744073709551615', 0);
			$sub_query = $this->db->get_compiled_select();

			$this->db->select('*');
			$this->db->from("({$sub_query}) as Y");
			$this->db->group_by('Y.employee_id');
			$data_ = $this->db->get()->result();
			if($show==true){
				echo $this->db->last_query();
			}
			foreach($data_ as $k=>$val){
				if($show==true)
					var_dump($val);
				if(!in_array($val->posting_id,$selected_ids)){
					unset($emp_ids[$val->employee_id]);
				}
			}
		}
		if(count($employee_ids)>0 || count($emp_ids)>0){
			$this->db->select('count(*) as total');
			//$ranks = array('ASI','SI/LR','SI/CR');
			if ($rank_category != null) {
				$RankRankre = $rank_category;
				if ($RankRankre != '') {
					$this->db->where('newosi.presentrank', $RankRankre);
					if ($RankRankre == 'Executive Staff') {
						if ($selected_permanent_rank != null) {
							$this->db->where('newosi.permanent_rank', $selected_permanent_rank);
						} else if ($permanent_ranks != null) {
							$this->db->where_in('newosi.permanent_rank', $permanent_ranks);
						}
					} else if ($RankRankre == 'Ministerial Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cminirank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (C)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cccrank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (P)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.ccprank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Medical Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cmedirank', $selected_permanent_rank);
						}
					}
					
				}
			}
			if(false){
				foreach($employee_ids as $bat_Id=>$empIDS){
					if(count($empIDS)>250){
						$ids_ = array_chunk($employee_ids,250);
						$this->db->group_start();
						foreach($ids_ as $k=>$val){
							$this->db->or_where_in('man_id',$val);
						}
						$this->db->group_end();
					}else{
						$this->db->group_start();
						$this->db->where_in('man_id',$empIDS);
						$this->db->where('bat_id',$bat_Id);
						$this->db->group_end();
					}
				}
			}else{
				
				if(count($emp_ids)>250){
					//$ids_ = array_chunk($employee_ids,250);
					$ids_ = array_chunk($emp_ids,250);
					$this->db->group_start();
					foreach($ids_ as $k=>$val){
						$this->db->or_where_in('man_id',$val);
					}
					$this->db->group_end();
				}else{
					$this->db->group_start();
					$this->db->where_in('man_id',$emp_ids);
					$this->db->group_end();
				}
			}
			$this->db->where('bat_id != 0');
			//$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)',$ranks);
			//$this->db->from('(' . $innerSelect . ') as Y');
			//$this->db->where('newosi.bat_id','Y.phbat_id');
			//$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id'); //CHECK
			if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
				$this->db->where_in('newosi.bat_id', $battalions);
			}
			if ($rank_category != null) {
				$this->db->where_in('newosi.presentrank', $rank_category);
			}
			//$this->db->group_by('Y.employee_id');
			//$this->db->order_by('Y.posting_date', 'desc');
			//$outerSelect = $this->db->get_compiled_select();
			$employees_obj = $this->db->get('newosi')->result();
			if($show==true)
			echo $this->db->last_query();
			return $employees_obj[0]->total;
			
		}else{
			return 0;
		}
	}
	public function getTotalFilteredEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date, $rank_category = null, $selected_permanent_rank = null, $permanent_ranks = null)
	{
		$this->db->select(array( 'employee_id','bat_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date);
		}
		if ($selected_ids != null) {
			if(is_array($selected_ids)){
				if(count($selected_ids)>0){
					$this->db->where_in('posting_id', $selected_ids);
				}
			}else{
				$this->db->where('posting_id', $selected_ids);
			}
			
		}

		$this->db->where_in('bat_id',$battalions);
		$this->db->from('posting_history');
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$query1 = $this->db->get_compiled_select();
		//fetch postings
		$this->db->select('*');
		$this->db->from("({$query1}) as Y");
		$this->db->group_by('Y.employee_id');
		$posting_data = $this->db->get()->result();
		$show = false;
		if($this->input->post('show')!=null && $this->input->post('show')=="true"){
			var_dump($this->input->post('show'));
			$show=true;
		}
		if($show==true)
			echo $this->db->last_query();
		//fetch employees
		//get the employee ids
		//need thos employees whose other posting exists

		$employee_ids =[];
		$total = 0;
		$emp_ids = [];
		foreach($posting_data as $k=>$val){
			if(!isset($employee_ids[$val->bat_id]))
				$employee_ids[$val->bat_id]=[];
			$employee_ids[$val->bat_id][] = $val->employee_id;
			$emp_ids[$val->employee_id] = $val->employee_id;
		}
		if($show==true){
			var_dump($emp_ids);
		}
		if(true){
			$this->db->select('bat_id,posting_id,employee_id');
			$this->db->from('posting_history');
			$this->db->where_in('employee_id',$emp_ids);
			$this->db->order_by('posting_date','desc');
			$this->db->limit('18446744073709551615', 0);
			$sub_query = $this->db->get_compiled_select();

			$this->db->select('*');
			$this->db->from("({$sub_query}) as Y");
			$this->db->group_by('Y.employee_id');
			$data_ = $this->db->get()->result();
			if($show==true){
				echo $this->db->last_query();
			}
			foreach($data_ as $k=>$val){
				if($show==true)
					var_dump($val);
				if(!in_array($val->posting_id,$selected_ids)){
					unset($emp_ids[$val->employee_id]);
				}
			}
		}
		if(count($employee_ids)>0 || count($emp_ids)>0){
			$this->db->select('count(*) as total');
			//$ranks = array('ASI','SI/LR','SI/CR');
			if ($rank_category != null) {
				$RankRankre = $rank_category;
				if ($RankRankre != '') {
					$this->db->where('newosi.presentrank', $RankRankre);
					if ($RankRankre == 'Executive Staff') {
						if ($selected_permanent_rank != null) {
							$this->db->where('newosi.permanent_rank', $selected_permanent_rank);
						} else if ($permanent_ranks != null) {
							$this->db->where_in('newosi.permanent_rank', $permanent_ranks);
						}
					} else if ($RankRankre == 'Ministerial Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cminirank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (C)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cccrank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (P)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.ccprank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Medical Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cmedirank', $selected_permanent_rank);
						}
					}
					
				}
			}
			if(false){
				foreach($employee_ids as $bat_Id=>$empIDS){
					if(count($empIDS)>250){
						$ids_ = array_chunk($employee_ids,250);
						$this->db->group_start();
						foreach($ids_ as $k=>$val){
							$this->db->or_where_in('man_id',$val);
						}
						$this->db->group_end();
					}else{
						$this->db->group_start();
						$this->db->where_in('man_id',$empIDS);
						$this->db->where('bat_id',$bat_Id);
						$this->db->group_end();
					}
				}
			}else{
				
				if(count($emp_ids)>250){
					$ids_ = array_chunk($emp_ids,250);
					$this->db->group_start();
					foreach($ids_ as $k=>$val){
						$this->db->or_where_in('man_id',$val);
					}
					$this->db->group_end();
				}else{
					$this->db->group_start();
					$this->db->where_in('man_id',$emp_ids);
					$this->db->group_end();
				}
			}
			$this->db->group_start()->like('newosi.name', $search)->or_like('newosi.depttno', $search)->or_like('newosi.phono1', $search)->group_end();
			$this->db->where('bat_id != 0');
			//$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)',$ranks);
			//$this->db->from('(' . $innerSelect . ') as Y');
			//$this->db->where('newosi.bat_id','Y.phbat_id');
			//$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id'); //CHECK
			if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
				$this->db->where_in('newosi.bat_id', $battalions);
			}
			if ($rank_category != null) {
				$this->db->where_in('newosi.presentrank', $rank_category);
			}
			//$this->db->group_by('Y.employee_id');
			//$this->db->order_by('Y.posting_date', 'desc');
			//$outerSelect = $this->db->get_compiled_select();
			$employees_obj = $this->db->get('newosi')->result();
			if($show==true)
			echo $this->db->last_query();
			return $employees_obj[0]->total;
			
		}else{
			return 0;
		}
	}
	public function getTotalEmployeesFromPostingHistory($selected_ids, $selected_rank, $search, $before_date = null)
	{
		if (true) {
			$this->db->select('*');
			if ($before_date != null) {
				//$before_date = "2021-05-10 23:59:59";
				$this->db->where('posting_date <=', $before_date . ' 23:59:59');
			}
			$this->db->order_by('posting_date', 'desc');
			$this->db->limit('18446744073709551615', 0);
			$this->db->from('posting_history');
			$select_query_01 = $this->db->get_compiled_select();
			//echo $select_query_01;
			//echo '<BR>';
			$this->db->select('*');
			$this->db->from('(' . $select_query_01 . ') as X');
			$this->db->group_by('X.employee_id');
			$this->db->order_by('posting_date', 'desc');
			$this->db->limit('18446744073709551615', 0);
			$select_query_02 = $this->db->get_compiled_select();
			//echo $select_query_02;
			//	echo '<BR>';
			$this->db->select('*');
			$this->db->from('(' . $select_query_02 . ') as Y');

			$this->db->order_by('Y.posting_date', 'desc');
			$select_query_03 = $this->db->get_compiled_select();
			//echo $select_query_03;
			//echo '<BR>';
			$this->db->select('count(*) as total');
			$this->db->from('(' . $select_query_03 . ') as Z');
			$this->db->join('newosi', 'newosi.man_id = Z.employee_id and newosi.bat_id !=0');
			$bat_ids = [$this->session->userdata('userid')];
			if ($bat_ids != null && (count($bat_ids) > 0)) {
				$this->db->where_in('newosi.bat_id', $bat_ids);
				$this->db->where_in('Z.bat_id', $bat_ids);
			}

			$this->db->where_in('Z.posting_id', $selected_ids);
			switch ($selected_rank) {
				case 'insp':
					$ranks = array('INSP', 'DSP/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'si':
					$ranks = array('SI', 'INSP/LR', 'INSP/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'asi':
					$ranks = array('ASI', 'SI/LR', 'SI/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'hc':
					$ranks = array('HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'ct':
					$ranks = array('CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
					$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				case 'total':
					//$ranks = array('INSP','DSP/CR','SI','INSP/LR','INSP/CR', 'ASI','SI/LR','SI/CR','HC','ASI/LR','ASI/CR','ASI/ORP','CT','Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
					//get the all records
					break;
				case 'otherRank':
					$ranks = array('INSP', 'DSP/CR', 'SI', 'INSP/LR', 'INSP/CR', 'ASI', 'SI/LR', 'SI/CR', 'HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP', 'CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
					$this->db->where_not_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
					break;
				default:

					break;
			}
			//$this->db->group_start()->like('newosi.name',$search)->or_like('newosi.depttno',$search)->or_like('newosi.phono1',$search)->group_end();
			//$this->db->where('Z.rank_=',$rank);
			$this->db->order_by('Z.posting_date', 'desc');


			$select_query_04 = $this->db->get_compiled_select();


			$query = $this->db->query($select_query_04);
			//echo $select_query_04;
			//$this->db->where_in('posting_id',$selected_ids);
			//$this->db->where('posting_history.bat_id',$this->session->userdata('userid'));
			//$this->db->group_by('employee_id');
			$result = $query->result();
			//echo $this->db->last_query();
			return $result[0]->total;
		}
		$this->db->select('*');
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date . ' 23:59:59');
		}
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$this->db->from('posting_history');
		$select_query_01 = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $select_query_01 . ') as X');
		$this->db->group_by('X.employee_id');
		$select_query_02 = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $select_query_02 . ') as Y');
		$this->db->order_by('Y.posting_date', 'desc');
		$select_query_03 = $this->db->get_compiled_select();

		$this->db->select('count(*) as total');
		$this->db->from('(' . $select_query_03 . ') as Z');
		$this->db->join('newosi', 'newosi.man_id = Z.employee_id and newosi.bat_id != 0');
		$this->db->where('newosi.bat_id', $this->session->userdata('userid'));
		$this->db->where('Z.bat_id', $this->session->userdata('userid'));
		$this->db->where_in('Z.posting_id', $selected_ids);
		switch ($selected_rank) {
			case 'insp':
				$ranks = array('INSP', 'DSP/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'si':
				$ranks = array('SI', 'INSP/LR', 'INSP/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'asi':
				$ranks = array('ASI', 'SI/LR', 'SI/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'hc':
				$ranks = array('HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'ct':
				$ranks = array('CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				$this->db->where_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			case 'total':
				//$ranks = array('INSP','DSP/CR','SI','INSP/LR','INSP/CR', 'ASI','SI/LR','SI/CR','HC','ASI/LR','ASI/CR','ASI/ORP','CT','Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				//get the all records
				break;
			case 'otherRank':
				$ranks = array('INSP', 'DSP/CR', 'SI', 'INSP/LR', 'INSP/CR', 'ASI', 'SI/LR', 'SI/CR', 'HC', 'ASI/LR', 'ASI/CR', 'ASI/ORP', 'CT', 'Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR');
				$this->db->where_not_in('concat_ws(" ",cexrank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
				break;
			default:

				break;
		}

		//$this->db->group_start()->like('newosi.name',$search)->or_like('newosi.depttno',$search)->or_like('newosi.phono1',$search)->group_end();
		//$this->db->where('Z.rank_=',$rank);

		$this->db->order_by('Z.posting_date', 'desc');
		$select_query_04 = $this->db->get_compiled_select();


		$query = $this->db->query($select_query_04);

		//$this->db->where_in('posting_id',$selected_ids);
		//$this->db->where('posting_history.bat_id',$this->session->userdata('userid'));
		//$this->db->group_by('employee_id');
		$result = $query->result();
		//echo $this->db->last_query();
		return $result[0]->total;
	}
	
	
	public function getOSIBattalions()
	{
		$this->db->select('*');
		$this->db->where('users.user_log', 4);
		$query = $this->db->get('users');
		$result = $query->result();
		return $result;
	}
	function addPostingCorrection($name, $parent_posting_id, $bat_id, $added_by)
	{
		error_reporting(E_ALL);
		$add = ['name' => $name, 'parent_posting_id' => $parent_posting_id, 'bat_id' => $bat_id, 'added_by' => $added_by];
		$status = $this->db->insert($this->table, $add);
		if ($status) {
			return true;
		} else {
			return false;
		}
	}
	###################################################################
	// for osi controller
	public function getPostingsNObOLS($name = null, $order_by = 'name', $order = 'asc', $limit = 10, $start = 0)
	{
		$this->db->select('*');
		if ($name != null) {
			$this->db->like('name', $name);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by($order_by, $order);
		$query = $this->db->get('postings');
		$result = $query->result();
		return $result;
	}
	public function getFilteredCountPostingsNObOLS($name = null, $order_by = 'name', $order = 'asc', $limit = 10, $start = 0)
	{
		$this->db->select('count(*) as total');
		if ($name != null) {
			$this->db->like('name', $name);
		}
		$query = $this->db->get('postings');
		$result = $query->result();
		return $result[0]->total;
	}
	public function getTotalPostingsNObOLS($name = null, $order_by = 'name', $order = 'asc', $limit = 10, $start = 0)
	{
		$this->db->select('count(*) as total');
		$query = $this->db->get('postings');
		$result = $query->result();
		return $result[0]->total;
	}
	public function getPostingsByIds($new_parent_posting_ids)
	{
		$this->db->select('*');
		$this->db->where_in('id', $new_parent_posting_ids);
		$query = $this->db->get('postings');
		$result = $query->result();
		return $result;
	}
	/**
			get the view of posting in selected deployment report
	 */
	public function getPostingViewInSelectedDeploymentReport($posting_id, $deployment_report_id)
	{
		$this->db->select('view');
		$this->db->where('posting_id', $posting_id);
		$this->db->where('deployment_report_id', $deployment_report_id);
		$query = $this->db->get('posting_consolidate_deployment_report_view');
		$result = $query->result();
		//var_dump($result);
		if (isset($result[0])) {
			return $result[0]->view;
		} else {
			return '';
		}
	}
	/**
			Add Sanction Strength 
			Used in battalion login
			for adding sanction strength
	 */
	public function addSanctionStrength($rank_group_id, $date, $strength, $bat_id, $edited_by_id)
	{
		$add = [
			'rank_group_id' => $rank_group_id,
			'date' => $date,
			'strength' => $strength,
			'bat_id' => $bat_id,
			'edited_by_id' => $edited_by_id
		];
		$a = $this->db->insert('sanction_strength', $add);
		//echo $this->db->last_query();	
		if ($a) {
			return true;
		} else {
			return false;
		}
	}
	/***
			it will return the list of sanction strength as an array
	 */
	public function getSanctionStrengthList($bat_ids = null, $date = null, $ranks = null, $length = null, $start = null)
	{
		$this->db->select('sanction_strength.id as ssid,sanction_strength.date as ssdate,sanction_strength.strength as ssstrength,sanction_strength.rank_group_id as ssrank_group_id, sanction_strength.bat_id as ss_bat_id, sanction_strength.edited_by_id as ss_edited_by_id');

		$this->filterSanctionStrength($bat_ids, $date, $ranks);
		//echo $length.' '.$start;
		$this->db->from('sanction_strength');
		$firstSelect =  $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $firstSelect . ') as X');
		$this->db->order_by('X.ssdate', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$secondSelect = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $secondSelect . ') as Y');
		//$this->db->group_by('Y.ssrank_group_id');
		$this->db->group_by('Y.ssrank_group_id, Y.ss_bat_id');
		$thired_select = $this->db->get_compiled_select();

		$this->db->select('ssid,ssdate, ssstrength , rank_groups.title as title, users.nick as battalion_name, user2.nick as edited_by_battalion_name, ssrank_group_id, rank_groups.variable_name');
		$this->db->from('(' . $thired_select . ') as Z');
		$this->db->join('rank_groups', 'ssrank_group_id = rank_groups.id');
		$this->db->join('users', 'Z.ss_bat_id = users.users_id', 'left');
		$this->db->join('users as user2', 'Z.ss_edited_by_id = user2.users_id', 'left');

		$fourth_select = $this->db->get_compiled_select();
		$query = $this->db->query($fourth_select);

		//echo $length.' '.$start;
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}

	public function getTotalSanctionStrength()
	{
		$this->db->select('sanction_strength.date as ssdate, sanction_strength.rank_group_id as ssrank_group_id,sanction_strength.bat_id as ss_bat_id');
		//$this->filterSanctionStrength($bat_ids,$date,$ranks);
		$this->db->from('sanction_strength');
		$firstSelect =  $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $firstSelect . ') as X');
		$this->db->order_by('X.ssdate', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$secondSelect = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $secondSelect . ') as Y');
		$this->db->group_by('Y.ssrank_group_id, Y.ss_bat_id');
		$thired_select = $this->db->get_compiled_select();
		$this->db->select('count(*) as total');
		$this->db->from('(' . $thired_select . ') as Z');

		$query = $this->db->get();
		$result = $query->result();
		return $result[0]->total;
	}

	public function getTotalFilteredSanctionStrength($bat_ids = null, $date = null, $ranks = null)
	{
		$this->db->select('sanction_strength.date as ssdate, sanction_strength.rank_group_id as ssrank_group_id');
		$this->filterSanctionStrength($bat_ids, $date, $ranks);
		$this->db->from('sanction_strength');
		$firstSelect =  $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $firstSelect . ') as X');
		$this->db->order_by('X.ssdate', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$secondSelect = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('(' . $secondSelect . ') as Y');

		$this->db->group_by('Y.ssrank_group_id');
		$thired_select = $this->db->get_compiled_select();
		$this->db->select('count(*) as total');

		$this->db->from('(' . $thired_select . ') as Z');
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();
		return $result[0]->total;
	}

	public function filterSanctionStrength($bat_ids = null, $date = null, $ranks = null, $length = null, $start = null)
	{
		if ($bat_ids != null) {
			$this->db->where_in('sanction_strength.bat_id', $bat_ids);
		}
		if ($date != null) {
			$this->db->where('date <=', $date);
		}
		if ($ranks != null) {
			$this->db->where_in('rank_group_id', $ranks);
		}
		if ($length != null) {
			$this->db->limit($length, $start);
		}
		//filters
	}
	/**
			input
				battalions, ranks, dateFilter, dateFrom, dateTo, order_by, order
			return the history list of sanction strength
	 */
	public function getSanctionStrengthHistoryList($bat_ids = null, $ranks = null, $dateFilter = null, $dateFrom = null, $dateTo = null, $orderby = null, $order = null, $length = null, $start = null)
	{
		$this->db->select('*');
		$this->whereGetSanctionStrengthHistoryList($bat_ids, $ranks, $dateFilter, $dateFrom, $dateTo, $orderby, $order);
		if (null != $length && $start >= 0) {
			$this->db->limit($length, $start);
		}
		$query = $this->db->get('sanction_strength');
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}
	/***
			get the total no of history records in the database
	 */
	public function getTotalSanctionStrengthHistoryList($bat_ids = null, $ranks = null)
	{
		//var_dump($dateFilter);
		$this->db->select('count(*) as total');
		$this->whereGetSanctionStrengthHistoryList($bat_ids, $ranks);
		$query = $this->db->get('sanction_strength');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result[0]->total;
	}
	public function getTotalFilteredSanctionStrengthHistory($bat_ids = null, $ranks = null, $dateFilter = null, $dateFrom = null, $dateTo = null)
	{
		//var_dump($dateFilter);
		$this->db->select('count(*) as total');
		$this->whereGetSanctionStrengthHistoryList($bat_ids, $ranks, $dateFilter, $dateFrom, $dateTo);
		$query = $this->db->get('sanction_strength');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result[0]->total;
	}
	/**
			where block
	 */
	public function whereGetSanctionStrengthHistoryList($bat_ids = null, $ranks = null, $dateFilter = null, $dateFrom = null, $dateTo = null, $orderby = null, $order = null, $length = null, $start = null)
	{
		if ($bat_ids != null) {
			$this->db->where_in('bat_id', $bat_ids);
		}
		if ($ranks != null) {
			$this->db->where_in('rank_group_id', $ranks);
		}
		if ($dateFilter != null && $dateFilter != 'false') {
			if (null != $dateFrom && null != $dateTo) {
				$this->db->group_start();
				$this->db->where('date>=', $dateFrom);
				$this->db->where('date<=', $dateTo);
				$this->db->group_end();
			} else {
				//echo 'date filter failed';
			}
		} else {
			//echo 'filter failed';
		}
		if (null != $orderby && null != $order) {
			$this->db->order_by($orderby, $order);
		} else {
			$this->db->order_by('bat_id', 'desc');
			$this->db->order_by('rank_group_id', 'asc');
			$this->db->order_by('date', 'desc');
		}
	}
	/**
			fetch all the osis
			+ admin
	 */
	public function getAllOsis()
	{
		$this->db->select('users_id, nick');
		$this->db->where('user_log', 4);
		$this->db->or_where('user_log', 9);
		$query = $this->db->get('users');
		//echo $this->db->last_query();
		$result = $query->result();
		return $result;
	}
	/***
			get the sanction strength by id
	 */
	public function getSanctionStrengthById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('sanction_strength');
		return $query->result();
	}
	/**
			Update Sanction Strength 
			Used in admin login
			for updating sanction strength
	 */
	public function adminUpdateSanctionStrength($id, $date, $strength, $edited_by_id)
	{
		$update = [
			'date' => $date,
			'strength' => $strength,
			'edited_by_id' => $edited_by_id
		];
		$this->db->where('id', $id);
		$a = $this->db->update('sanction_strength', $update);
		//echo $this->db->last_query();	
		if ($a) {
			return true;
		} else {
			return false;
		}
	}
	/**
			Delete Sanction Strength 
			Used in admin login
	 */
	public function deleteSanctionStrength($id)
	{
		$this->db->where('id', $id);
		$a = $this->db->delete('sanction_strength');
		if ($a) {
			return true;
		} else {
			return false;
		}
	}
	public function getInductionModeStrengthList($bat_ids, $ranks, $modes, $before_date, $searchText = null, $length = null, $start = null, $orderby = null, $order = null)
	{
		$this->db->select('employee_id,posting_history.posting_id as posting_his_id,posting_date,posting_history.bat_id as phbat_id,order_no,order_date');
		//var_dump($bat_ids);

		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <= ', $before_date);
		}
		$this->db->order_by('posting_history.posting_date', 'desc');
		$this->db->from('posting_history');
		$this->db->limit('18446744073709551615', 0);
		$first_select = $this->db->get_compiled_select();
		$this->db->select('*');

		$this->db->from('(' . $first_select . ') as X');
		$this->db->group_by('X.employee_id');
		$this->db->limit('18446744073709551615', 0);
		$centerSelect = $this->db->get_compiled_select();

		$this->db->select('*,concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank) as rank, depttno,phono1,postings.name as pos_name,newosi.name as username, users.nick as battalion_name, newosi.bat_id as nobat_id');
		if ($modes != null && count($modes) != 0) {
			if (in_array('Actual Posted', $modes)) {
				$this->db->where_not_in('newosi.inductionmode', ['Formal Order Not Issued', 'Transfer Pay Purpose', 'Not Reported']);
			} else {
				$this->db->where_in('newosi.inductionmode', $modes);
			}
		}
		if ($bat_ids != null && count($bat_ids) > 0) {
			$this->db->where_in('newosi.bat_id', $bat_ids);
		}
		if ($searchText != null && trim($searchText) != '') {
			$this->db->group_start();
			$this->db->like('newosi.name', $searchText);
			$this->db->or_like('newosi.depttno', $searchText);
			$this->db->or_like('newosi.phono1', $searchText);
			$this->db->or_like('postings.name', $searchText);
			$this->db->group_end();
		}
		if ($ranks != null and count($ranks) != 0) {
			if (in_array('otherRank', $ranks)) {
				$RANKS = ['insp', 'si', 'asi', 'hc', 'ct'];
				$this->db->where_not_in('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $RANKS);
			} else {
				$this->db->where_in('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
			}
		}
		$this->db->from('(' . $centerSelect . ') as Y');
		$this->db->join('newosi', 'newosi.man_id = Y.employee_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id', 'left');
		$this->db->join('postings', 'postings.id = Y.posting_his_id', 'left');
		$this->db->join('users', 'users.users_id = newosi.bat_id', 'left');

		$this->db->group_by('Y.employee_id');
		if ($length != null && $start != null) {
			$this->db->limit($length, $start);
		}
		if ($orderby != null && $order != null) {
			$this->db->order_by($orderby, $order);
		}
		$outerSelect = $this->db->get_compiled_select();
		$query = $this->db->query($outerSelect);
		//echo $this->db->last_query();
		$result = $query->result();

		//echo $this->db->last_query();
		//die;
		return  $result;
		//$first_sql = $this->db->get_compiled_select();
		//echo $first_sql;
	}
	public function getTotalCountInductionModeStrengthList($bat_ids, $ranks, $modes, $before_date)
	{
		$this->db->select('employee_id,posting_history.posting_id as posting_his_id,posting_date,bat_id,posting_history.bat_id as phbat_id');

		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <= ', $before_date);
		}
		$this->db->order_by('posting_history.posting_date', 'desc');
		$this->db->from('posting_history');
		$this->db->limit('18446744073709551615', 0);
		$first_select = $this->db->get_compiled_select();
		//$this->db->select('*,X.name,depttno,phono1,postings.name as posting_name');
		//concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as current_rank,
		$this->db->select('*'); //,X.name,X.depttno,X.phono1,postings.name as posting_name');
		$this->db->from('(' . $first_select . ') as X');
		$this->db->group_by('X.employee_id');
		$this->db->limit('18446744073709551615', 0);
		$centerSelect = $this->db->get_compiled_select();

		$this->db->select('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank) as rank, depttno,phono1,postings.name as pos_name,newosi.name as username');
		if ($modes != null && count($modes) != 0) {
			//var_dump($modes);
			//Transfer(Excess),Attachment,Transfer Pay Purpose,Formal Order Not Issued,Not Reported
			if (in_array('Actual Posted', $modes)) {
				$this->db->where_not_in('newosi.inductionmode', ['Formal Order Not Issued', 'Transfer Pay Purpose', 'Not Reported']);
			} else {
				$this->db->where_in('newosi.inductionmode', $modes);
			}
		}
		if ($bat_ids != null && count($bat_ids) > 0) {
			$this->db->where_in('newosi.bat_id', $bat_ids);
		}
		if ($ranks != null and count($ranks) != 0) {
			if (in_array('otherRank', $ranks)) {
				$RANKS = ['insp', 'si', 'asi', 'hc', 'ct'];
				$this->db->where_not_in('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $RANKS);
			} else {
				$this->db->where_in('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
			}
		}
		$this->db->from('(' . $centerSelect . ') as Y');
		$this->db->join('newosi', 'newosi.man_id = Y.employee_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id', 'left');
		$this->db->join('postings', 'postings.id = Y.posting_his_id', 'left');
		$this->db->group_by('Y.employee_id');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('count(*) as total');
		$this->db->from('(' . $outerSelect . ') as Z');
		$last = $this->db->get_compiled_select();
		//echo $last;
		$query = $this->db->query($last);
		//echo $this->db->last_query();
		$result = $query->result();
		//var_dump($result);
		//echo $this->db->last_query();
		//die;
		return  $result[0]->total;
		//$first_sql = $this->db->get_compiled_select();
		//echo $first_sql;
	}
	public function getTotalFilteredCountInductionModeStrengthList($bat_ids, $ranks, $modes, $before_date, $searchText)
	{
		$this->db->select('employee_id,posting_history.posting_id as posting_his_id,posting_date,bat_id,posting_history.bat_id as phbat_id');

		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <= ', $before_date);
		}
		$this->db->order_by('posting_history.posting_date', 'desc');
		$this->db->from('posting_history');
		$this->db->limit('18446744073709551615', 0);
		$first_select = $this->db->get_compiled_select();
		//$this->db->select('*,X.name,depttno,phono1,postings.name as posting_name');
		//concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as current_rank,
		$this->db->select('*'); //,X.name,X.depttno,X.phono1,postings.name as posting_name');
		$this->db->from('(' . $first_select . ') as X');
		$this->db->group_by('X.employee_id');
		$this->db->limit('18446744073709551615', 0);
		$centerSelect = $this->db->get_compiled_select();

		$this->db->select('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank) as rank, depttno,phono1,postings.name as pos_name,newosi.name as username');
		if ($modes != null && count($modes) != 0) {
			//var_dump($modes);
			//Transfer(Excess),Attachment,Transfer Pay Purpose,Formal Order Not Issued,Not Reported
			if (in_array('Actual Posted', $modes)) {
				$this->db->where_not_in('newosi.inductionmode', ['Formal Order Not Issued', 'Transfer Pay Purpose', 'Not Reported']);
			} else {
				$this->db->where_in('newosi.inductionmode', $modes);
			}
		}
		if ($bat_ids != null && count($bat_ids) > 0) {
			$this->db->where_in('Y.bat_id', $bat_ids);
		}
		if ($searchText != null && trim($searchText) != '') {
			$this->db->group_start();
			$this->db->like('newosi.name', $searchText);
			$this->db->or_like('newosi.depttno', $searchText);
			$this->db->or_like('newosi.phono1', $searchText);
			$this->db->or_like('postings.name', $searchText);
			$this->db->group_end();
		}
		if ($ranks != null and count($ranks) != 0) {
			if (in_array('otherRank', $ranks)) {
				$RANKS = ['insp', 'si', 'asi', 'hc', 'ct'];
				$this->db->where_not_in('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $RANKS);
			} else {
				$this->db->where_in('concat_ws(" ",newosi.permanent_rank,cminirank,cmedirank,ccprank,cccrank)', $ranks);
			}
		}
		$this->db->from('(' . $centerSelect . ') as Y');
		$this->db->join('newosi', 'newosi.man_id = Y.employee_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id', 'left');
		$this->db->join('postings', 'postings.id = Y.posting_his_id', 'left');
		$this->db->group_by('Y.employee_id');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('count(*) as total');
		$this->db->from('(' . $outerSelect . ') as Z');
		$last = $this->db->get_compiled_select();
		//echo $last;
		$query = $this->db->query($last);
		$result = $query->result();
		return  $result[0]->total;
	}
	//get the deinduction
	/**
			get the count of list of not reported employees
			These employees have not reported yet
			They are in Battalion Head quareter
	 */
	public function getTotalNotReportedEmployees($current_bat_ids, $reported = null, $before_date = null, $relieved = null, $order_by = null, $order = null, $length = null, $start = null, $employee_ids)
	{
		//var_dump($employee_ids);
		$this->db->select("STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') as date,nop,deinduction_id");
		if ($current_bat_ids != null and count($current_bat_ids) > 0) {
			$this->db->where_in('ito', $current_bat_ids);
		}
		if ($reported != null) {
			$this->db->where('reported', $reported);
		}
		if ($before_date != null) {
			$this->db->where("STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') <=", $before_date);
		}
		if ($relieved != null) {
			$this->db->where('reld', $relieved);
		}
		if ($employee_ids != null) {
			$this->db->where_in('nop', $employee_ids);
		}
		$this->db->from('deinduction');
		if ($order_by != null and $order != null) {
			$this->db->order_by($order_by, $order);
		}
		$this->db->limit('18446744073709551615', 0);
		$inner_select = $this->db->get_compiled_select();

		$this->db->select('*');
		//$this->db->select('count(*) as total');
		$this->db->from('(' . $inner_select . ') as X');
		$this->db->group_by('X.nop');

		$outerSelect = $this->db->get_compiled_select();

		//echo $outerSelect;
		$this->db->select('count(*) as total');
		$this->db->from('(' . $outerSelect . ') as Y');
		$last = $this->db->get_compiled_select();
		$query = $this->db->query($last);
		//echo $last;
		$result = $query->result();
		return $result[0]->total;
	}
	/*
			here we are fetching the not reported employess who are posted
	 */
	public function getNotReportedEmployeesFromPostedEmployees($current_bat_ids, $reported = null, $before_date = null, $relieved = null, $order_by = null, $order = null, $length = null, $start = null)
	{
		$this->db->select("STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') as date,nop,deinduction_id");
		if ($current_bat_ids != null and count($current_bat_ids) > 0) {
			$this->db->where_in('ito', $current_bat_ids);
		}
		if ($reported != null) {
			$this->db->where('reported', $reported);
		}
		if ($before_date != null) {
			$this->db->where("STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') <=", $before_date);
		}
		if ($relieved != null) {
			$this->db->where('reld', $relieved);
		}
		$this->db->from('deinduction');
		if ($order_by != null and $order != null) {
			$this->db->order_by($order_by, $order);
		}
		$this->db->limit('18446744073709551615', 0);
		$inner_select = $this->db->get_compiled_select();

		$this->db->select('date,name,battalion,deinduction_id,users.nick,newosi.depttno');
		$this->db->from('(' . $inner_select . ') as X');
		$this->db->group_by('X.nop');
		$this->db->order_by($order_by, $order);

		$this->db->join('newosi', 'newosi.man_id=X.nop', 'left');
		$this->db->join('users', 'users.users_id=newosi.bat_id', 'left');
		if ($length != null) {

			$this->db->limit($length, $start);
		}
		$outerSelect = $this->db->get_compiled_select();
		//echo $outerSelect;
		$query = $this->db->query($outerSelect);
		$result = $query->result();
		return $result;
	}
	/**
			get the list of not reported employees
	 */
	public function getNotReportedEmployees($current_bat_ids, $reported = null, $before_date = null, $relieved = null, $order_by = null, $order = null, $length = null, $start = null)
	{
		$this->db->select("STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') as date,nop,deinduction_id");
		if ($current_bat_ids != null and count($current_bat_ids) > 0) {
			$this->db->where_in('ito', $current_bat_ids);
		}
		if ($reported != null) {
			$this->db->where('reported', $reported);
		}
		if ($before_date != null) {
			$this->db->where("STR_TO_DATE(Dateofrelieving,'%d/%m/%Y') <=", $before_date);
		}
		if ($relieved != null) {
			$this->db->where('reld', $relieved);
		}
		$this->db->from('deinduction');
		if ($order_by != null and $order != null) {
			$this->db->order_by($order_by, $order);
		}
		$this->db->limit('18446744073709551615', 0);
		$inner_select = $this->db->get_compiled_select();

		$this->db->select('date,name,battalion,deinduction_id,users.nick,newosi.depttno');
		$this->db->from('(' . $inner_select . ') as X');
		$this->db->group_by('X.nop');
		$this->db->order_by($order_by, $order);

		$this->db->join('newosi', 'newosi.man_id=X.nop', 'left');
		$this->db->join('users', 'users.users_id=newosi.bat_id', 'left');
		if ($length != null) {

			$this->db->limit($length, $start);
		}
		$outerSelect = $this->db->get_compiled_select();
		//echo $outerSelect;
		$query = $this->db->query($outerSelect);
		$result = $query->result();
		return $result;
	}

	public function getFilteredCountNotReportedEmployees()
	{
		return 5;
	}
	public function markEmployeeReportYes($deinduction_id = null, $bat_id = null)
	{
		if ($deinduction_id == null and $bat_id == null) {
			return false;
		}
		$this->db->trans_start();
		$update = ['reported' => 'YES'];
		$this->db->where('deinduction_id', $deinduction_id, 'batt_id', $bat_id);
		$a = $this->db->update('deinduction', $update);
		//get the ddr entry
		//echo $this->db->last_query();
		//$deinduction = $this->getDDREntryOfEmployeeReport($deinduction_id);
		//var_dump($deinduction);

		//$addvalue = array('uid' => 1,'bat_id' => $bat_id,'ddr' => $deinduction[0]->ddr);
		//$this->db->where('man_id', $deinduction[0]->nop);
		//$task = $this->db->update('newosi',$addvalue);
		if ($a) {
			$this->db->trans_complete();
			return true;
		}
		return false;
	}
	public function getDDREntryOfEmployeeReport($deinduction_id)
	{
		$this->db->select('*');
		$this->db->where('deinduction_id', $deinduction_id);
		$this->db->from('deinduction');
		$query = $this->db->get();
		return $query->result();
	}

	/* public function getPostingsByIds($ids){
			if(!($ids!=null && count($ids)>0)){
				return false;
			}
			$this->db->select('*');
			if($ids!=null and count($ids)>0){
				$this->db->where_in('id',$ids);
			}
			$this->db->from('postings');
			$query =$this->db->query();
			return $query->result();
		} */
	public function getCurrentPostingOfEmployeeByEmplyeeId($emp_id)
	{
		//($emp_id,$battalion_id,$search=null,$limit=null,$start=null){
		$this->db->select('postings.name');
		$this->db->where('posting_history.employee_id', $emp_id);

		//$this->db->where('bat_id',$battalion_id);
		$this->db->order_by('posting_history.posting_date', 'desc');
		$this->db->join('postings', 'posting_history.posting_id = postings.id');

		//$this->db->join('newosi','Y.employee_id = newosi.man_id');
		$query = $this->db->get('posting_history');
		$result = $query->result();
		//var_dump($result);
		return $result;
	}
	public function getTotalBeltNumbers($depttno = null, $page = 1, $bat_ids = null)
	{
		$this->db->select('count(*) as total');
		if ($depttno != null) {
			$this->db->like('depttno', $depttno);
		}
		if ($bat_ids != null && $bat_ids != '') {
			if (is_array($bat_ids)) {
				$this->db->where_in('bat_id', $bat_ids);
			} else {
				$this->db->where_in('bat_id', explode(',', $bat_ids));
			}
		}
		if ($this->session->userdata('user_log') == 4) {
			$this->db->where('bat_id', $this->session->userdata('userid'));
		}
		//$this->db->group_by('depttno');
		$limit = 10;
		$start = $limit * ($page - 1);
		//$this->db->limit(10,$start);
		$this->db->from('newosi');
		$query = $this->db->get();
		$result = $query->result();
		//var_dumP($result);
		//var_dumP($result);
		return $result[0]->total;
	}
	public function getBeltNumbers($depttno = null, $page = 1, $bat_ids = null)
	{
		//$this->db->select('depttno,bat_id');
		$this->db->select('depttno');
		if ($depttno != null) {
			$this->db->like('depttno', $depttno);
		}
		if ($bat_ids != null && $bat_ids != '') {
			if (is_array($bat_ids)) {
				$this->db->where_in('bat_id', $bat_ids);
			} else {
				$this->db->where_in('bat_id', explode(',', $bat_ids));
			}
		}
		if ($this->session->userdata('user_log') == 4) {
			$this->db->where('bat_id', $this->session->userdata('userid'));
		}
		$this->db->group_by('depttno');
		$limit = 10;
		$start = $limit * ($page - 1);
		$this->db->limit(10, $start);
		$this->db->from('newosi');
		$query = $this->db->get();
		return $query->result();
	}
	public function getRootPostingId($id)
	{
		$this->db->select('getRootPostingId(' . $this->db->escape($id) . ') as firstPostingId');
		$query = $this->db->get('');
		//var_dump($query->result());
		return $query->result()[0]->firstPostingId;
	}
	public function getAdditionalPostings($posting_id, $filters = null)
	{
		$this->db->select('posting_info.id as id, posting_info.title, posting_info_type.title as type_title, posting_info.type,posting_info.deleted');
		$this->db->from('posting_info');
		if ($filters != null) {
			if (isset($filters['deleted']) && in_array($filters['deleted'], ['true', 'false'])) {
				$this->db->where('posting_info.deleted', $filters['deleted']);
			}
		}

		$this->db->join('posting_info_type', 'posting_info.type = posting_info_type.id');
		$this->db->where_in('posting_id', $posting_id);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $result = $query->result();
	}
	public function getAdditionalPostingsByIds($ids, $filters = null)
	{
		$this->db->select('posting_info.id as id, posting_info.title, posting_info_type.title as type_title, posting_info.type,posting_info.deleted');
		$this->db->from('posting_info');
		if ($filters != null) {
			if (isset($filters['deleted']) && in_array($filters['deleted'], ['true', 'false'])) {
				$this->db->where('posting_info.deleted', $filters['deleted']);
			}
		}

		$this->db->join('posting_info_type', 'posting_info.type = posting_info_type.id');
		$this->db->where_in('posting_info.id', $ids);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $result = $query->result();
	}
	public function getAdditionalPostingTypes($filters = null)
	{
		$this->db->select('*');
		$this->db->from('posting_info_type');
		return $this->db->get()->result();
	}
	public function addAdditionalPostingType($data)
	{
		$status = $this->db->insert('posting_info_type', $data);
		if ($status) {
			$id = $this->db->insert_id();
			return ['status' => $status, 'data' => ['id' => $id, 'title' => $data['title'], 'deleted' => 'false']];
		} else {
			return ['status' => $status, 'message' => 'Failed Adding'];
		}
	}
	public function setDeleteAdditionalPostingType($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('posting_info_type', ['deleted' => 'true']);

		return true;
	}
	public function unsetDeleteAdditionalPostingType($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('posting_info_type', ['deleted' => 'false']);
		return true;
	}
	public function updateAdditionalPostingType($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('posting_info_type', ['title' => $data['title']]);
		return true;
	}
	public function getTheParentPostingIdsOfPostingById($id)
	{
		if ($id != null) {
			$query  = $this->db->query('call getParentPostingIds(' . $id . ');');
			$res = $query->result();
			$query->next_result();
			$query->free_result();
			return $res;
		}
	}
	public function GetPostingHistoryRecordsByEmployeeId($employee_id){
		$this->db->select('*');
		$this->db->where('employee_id',$employee_id);
		$this->db->order_by('created','desc');
		$this->db->from($this->table_posting_history);
		return $this->db->get()->result();
	}
	/*public function getTotalEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date, $rank_category = null, $selected_permanent_rank = null, $permanent_ranks = null)
	{
		if (true) {
			$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id', 'order_no', 'order_date'));
			if ($before_date != null) {
				$this->db->where('posting_history.posting_date <=', $before_date);
			}

			$this->db->from('posting_history');
			$this->db->order_by('posting_date', 'desc');
			$this->db->limit('18446744073709551615', 0);
			$innerSelect =  $this->db->get_compiled_select();
			//echo $innerSelect;

			$this->db->select('id,posting_id,concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as rank_, posting_date, employee_id, inductionmode, phbat_id, cexrank, newosi.name, newosi.bat_id as bat_id, newosi.depttno, newosi.phono1, Y.order_no, Y.order_date');
			if ($rank_category != null) {
				$RankRankre = $rank_category;
				if ($RankRankre != '') {
					$this->db->where('newosi.presentrank', $RankRankre);
					if ($RankRankre == 'Executive Staff') {
						if ($selected_permanent_rank != null) {
							$this->db->where('newosi.permanent_rank', $selected_permanent_rank);
						} else if ($permanent_ranks != null) {
							$this->db->where_in('newosi.permanent_rank', $permanent_ranks);
						}
					} else if ($RankRankre == 'Ministerial Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cminirank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (C)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cccrank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (P)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.ccprank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Medical Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cmedirank', $selected_permanent_rank);
						}
					}
					
				}
			}
			
			//$this->db->group_start()->like('newosi.name',$search)->or_like('newosi.depttno',$search)->or_like('newosi.phono1',$search)->group_end();
			$this->db->from('(' . $innerSelect . ') as Y');
			if ($battalions != null && count($battalions) > 0) {
				$this->db->where_in('newosi.bat_id', $battalions);
			}
			$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = phbat_id');
			$this->db->group_by('Y.employee_id');
			$this->db->order_by('Y.posting_date', 'desc');
			$outerSelect = $this->db->get_compiled_select();
			$this->db->select('count(*) as total');
			$this->db->from('(' . $outerSelect . ') as Z');
			if ($battalions != null && is_array($battalions)) {
				$this->db->where_in('Z.phbat_id', $battalions);
				//$this->db->where_in('newosi.bat_id',$battalions);
			}
			// $this->db->order_by('Z.posting_date','desc');
			if ($selected_ids != null && count($selected_ids) > 0) {
				$this->db->where_in('Z.posting_id', $selected_ids);
			}
			$outerSelect1 = $this->db->get_compiled_select();
			$query = $this->db->query($outerSelect1);
			$result = $query->result();
			//echo $this->db->last_query();
			return $result[0]->total;
		}
	}
	public function getTotalFilteredEmployeesFromPostingHistoryIGP2($selected_ids, $selected_rank, $search, $battalions, $before_date, $rank_category = null, $selected_permanent_rank = null, $permanent_ranks = null)
	{
		$this->db->select(array( 'employee_id'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date);
		}
		if ($selected_ids != null) {
			if(is_array($selected_ids)){
				if(count($selected_ids)>0){
					$this->db->where_in('posting_id', $selected_ids);
				}
			}else{
				$this->db->where('posting_id', $selected_ids);
			}
			
		}

		$this->db->where_in('bat_id',$battalions);
		$this->db->from('posting_history');
		$this->db->group_by('employee_id');//multiple employee entry removed
		//$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		//fetch postings
		$posting_data = $this->db->get()->result();
		//fetch employees
		//get the employee ids
		$employee_ids =[];
		$total = 0;
		foreach($posting_data as $k=>$val){
			
			$employee_ids[] = $val->employee_id;
		}
		if(count($employee_ids)>0){
			$this->db->select('count(*) as total');
			//$ranks = array('ASI','SI/LR','SI/CR');
			if ($rank_category != null) {
				$RankRankre = $rank_category;
				if ($RankRankre != '') {
					$this->db->where('newosi.presentrank', $RankRankre);
					if ($RankRankre == 'Executive Staff') {
						if ($selected_permanent_rank != null) {
							$this->db->where('newosi.permanent_rank', $selected_permanent_rank);
						} else if ($permanent_ranks != null) {
							$this->db->where_in('newosi.permanent_rank', $permanent_ranks);
						}
					} else if ($RankRankre == 'Ministerial Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cminirank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (C)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cccrank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Class-IV (P)') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.ccprank', $selected_permanent_rank);
						}
					} else if ($RankRankre == 'Medical Staff') {
						if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
							//var_dump($selected_rank);
							$this->db->where('newosi.cmedirank', $selected_permanent_rank);
						}
					}
					
				}
			}
			
			if(count($employee_ids)>250){
				$ids_ = array_chunk($employee_ids,250);
				$this->db->group_start();
				foreach($ids_ as $k=>$val){
					$this->db->or_where_in('man_id',$val);
				}
				$this->db->group_end();
			}else{
				$this->db->where_in('man_id',$employee_ids);
			}
			$this->db->where('bat_id != 0');
			//$this->db->where_in('concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank)',$ranks);
			//$this->db->from('(' . $innerSelect . ') as Y');
			//$this->db->where('newosi.bat_id','Y.phbat_id');
			//$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = Y.phbat_id'); //CHECK
			if ($battalions != null && is_array($battalions) &&  count($battalions) > 0) {
				$this->db->where_in('newosi.bat_id', $battalions);
			}
			if ($rank_category != null) {
				$this->db->where_in('newosi.presentrank', $rank_category);
			}
			//$this->db->group_by('Y.employee_id');
			//$this->db->order_by('Y.posting_date', 'desc');
			//$outerSelect = $this->db->get_compiled_select();
			$employees_obj = $this->db->get('newosi')->result();
			return $employees_obj[0]->total;
			
		}else{
			return 0;
		}
	}
	public function getTotalFilteredEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date, $rank_category = null, $selected_permanent_rank = null, $permanent_ranks = null)
	{
		//var_dump($permanent_ranks);
		$this->db->select(array('id', 'posting_id', 'posting_date', 'employee_id', 'posting_history.bat_id as phbat_id', 'order_no', 'order_date'));
		if ($before_date != null) {
			$this->db->where('posting_history.posting_date <=', $before_date);
		}

		$this->db->from('posting_history');
		$this->db->order_by('posting_date', 'desc');
		$this->db->limit('18446744073709551615', 0);
		$innerSelect =  $this->db->get_compiled_select();
		//echo $innerSelect;

		$this->db->select('id,posting_id,concat_ws(" ",permanent_rank,cminirank,cmedirank,ccprank,cccrank) as rank_, posting_date, employee_id, inductionmode, phbat_id, cexrank, newosi.name, newosi.bat_id as bat_id, newosi.depttno, newosi.phono1, Y.order_no, Y.order_date');
		if ($rank_category != null) {
			$RankRankre = $rank_category;
			if ($RankRankre != '') {
				$this->db->where('newosi.presentrank', $RankRankre);
				if ($RankRankre == 'Executive Staff') {
					if ($selected_permanent_rank != null) {
						$this->db->where('newosi.permanent_rank', $selected_permanent_rank);
					} else if ($permanent_ranks != null) {
						$this->db->where_in('newosi.permanent_rank', $permanent_ranks);
					}
				} else if ($RankRankre == 'Ministerial Staff') {
					//var_dump($selected_rank);
					if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
						$this->db->where('newosi.cminirank', $selected_permanent_rank);
					}
				} else if ($RankRankre == 'Class-IV (C)') {
					if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
						//var_dump($selected_rank);
						$this->db->where('newosi.cccrank', $selected_permanent_rank);
					}
				} else if ($RankRankre == 'Class-IV (P)') {
					if ($selected_rank != null && !in_array($selected_rank, ['total'])) {
						//var_dump($selected_rank);
						$this->db->where('newosi.ccprank', $selected_permanent_rank);
					}
				}
				
			}
		}
		
		$this->db->group_start()->like('newosi.name', $search)->or_like('newosi.depttno', $search)->or_like('newosi.phono1', $search)->group_end();
		$this->db->from('(' . $innerSelect . ') as Y');
		if ($battalions != null && count($battalions) > 0) {
			$this->db->where_in('newosi.bat_id', $battalions);
		}
		$this->db->join('newosi', 'Y.employee_id = newosi.man_id and newosi.bat_id != 0 and newosi.bat_id = phbat_id');
		$this->db->group_by('Y.employee_id');
		$this->db->order_by('Y.posting_date', 'desc');
		$outerSelect = $this->db->get_compiled_select();
		$this->db->select('count(*) as total');
		$this->db->from('(' . $outerSelect . ') as Z');
		if ($battalions != null && is_array($battalions)) {
			$this->db->where_in('Z.phbat_id', $battalions);
			//$this->db->where_in('newosi.bat_id',$battalions);
		}
		
		if ($selected_ids != null && count($selected_ids) > 0) {
			$this->db->where_in('Z.posting_id', $selected_ids);
		}
		$outerSelect1 = $this->db->get_compiled_select();
		$query = $this->db->query($outerSelect1);
		$result = $query->result();
		//echo $this->db->last_query();
		return $result[0]->total;
	}
	*/
}
