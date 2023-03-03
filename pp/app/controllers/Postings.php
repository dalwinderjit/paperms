<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

class Postings extends CI_Controller
{
	//private $total_row = '';
	private $battalions = [];
	const MAX_POSTING_HISTORY = 5;
	const MAX_LEVEL_POSTING = 3;
	public  $sanction_strength_order_by = [1 => 'date'];
	public function __construct()
	{
		parent::__construct();
		$this->permission->is_logged_in();
		$this->permission->clear_cache();
		$this->load->model(F_BTALION . 'Btalion_model');
		//$this->$total_row = false;
	}

	public function loglist()
	{
		error_reporting(E_ALL);
		$this->load->model('Userlog_model');
		if (null != $this->input->post('submit')) {
			$username = $this->input->post('username');
			$ipaddress = $this->input->post('ipaddress');
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$data['logs'] = $this->Userlog_model->get_list($username, $ipaddress, $from_date, $to_date);
		} else {
			$data['logs'] = $this->Userlog_model->get_list();
		}
		$this->load->view('userlog/loglist', $data);
	}
	public function index()
	{
		$this->load->view('Postings/manage');
	}
	public function valid_posting($posting_id)
	{
		//var_dump($posting_id);
		//get the number of employees added to the current posting
		$no_of_employees = $this->Posting_model->getNumberOfEmployeesAddedToPosting($posting_id);
		//var_dump($no_of_emloyees);
		if ($no_of_employees == 0) {
			return true;
		} else {
			$this->form_validation->set_message('valid_posting', $no_of_employees . ' employee(s) are added to the current posting. Remove/Delte these employees from the selected posting first, only then you can add a child posting to the current Posting');
			return false;
		}
		//if(>0){
		//it is a child/final posting no more child/sub posting can be added to it. Delete the employees added the current posting first
		//}
	}
	public function add()
	{
		if (!(in_array($this->session->userdata('userid'), array(222)) && $this->session->userdata('usertype') == 'adm')) {
			redirect('bt-dashboard');
		}
		$this->load->library('form_validation');
		$this->load->model("Posting_model");
		$this->load->model("Osi_model");
		$this->load->helper('form');
		$this->load->helper('posting');
		$this->load->model('DeploymentReport_model');
		$dep_reports_objs = $this->DeploymentReport_model->getReportsList();
		$deployment_reports = [];
		$deployment_reports[''] = '--SELECT DEPLOYMENT REPORT--';
		foreach ($dep_reports_objs as $k => $dep_rep_obj) {
			$deployment_reports[$dep_rep_obj->id] = $dep_rep_obj->title;
		}
		$data['deployment_reports'] = $deployment_reports;
		//echo 'dalwinder';

		//var_dump($this->input->post('parent_posting'));
		if (null != $this->input->post('submit')) {
			$name = $this->input->post('new_posting');
			if (null != $this->input->post('parent_posting')) {
				$root = $this->input->post('parent_posting');
			} else {
				$root = 1;
			}
			$battalion_id = $this->input->post('battalion');
			$view = $this->input->post('views');
			$deployment_report_id = 1;
			$order_by_ = trim($this->input->post('order_by_'));
			//var_dump($root);
			$this->form_validation->set_rules("new_posting", "Posting", "required");
			$this->form_validation->set_rules('parent_posting', 'Parent Posting', 'required');
			$this->form_validation->set_rules('parent_posting', 'Parent Posting', 'callback_valid_posting');
			$this->form_validation->set_rules('battalion', 'Battalion', 'required');
			$this->form_validation->set_rules('views', 'Posting View', 'required');
			$this->form_validation->set_rules('order_by_', 'Order By ', 'callback_valid_order_by_index');
			if ($this->form_validation->run()) {
				if ($this->Posting_model->addPosting($name, $root, $battalion_id, $view, $deployment_report_id, $order_by_)) {
					$this->session->set_flashdata('success_msg', 'Posting has added succesfully !');
					redirect('posting-list');
				} else {
					$this->session->set_flashdata('error_msg', 'Posting Addition Failed.');
				}
			}
		}
		//$parent_posting_id = $this->input->post('parent_posting_id');
		if (null != $this->input->post('parent_posting')) {
			$parent_id = $this->input->post('parent_posting');
			$parent = $this->Posting_model->get_parentPostingId_of_parentPosting($this->input->post('parent_posting'));
			//var_dump($parent);
			$parent_posting_id = $parent[0]->parent_posting_id;
		} else {
			$parent_id = 1;
			$parent_posting_id = 0;
		}

		$bat_id = $this->session->userdata('userid');
		$processed_postings = array();
		$postings = $this->Posting_model->getSubPostingOf($parent_posting_id);
		foreach ($postings as $k => $v) {
			if ($this->haveChild($v->id)) {
				$v->haveChilds = true;
			} else {
				$v->haveChilds = false;
			}
		}
		//$link = '';
		$data['battalions_objs'] = $this->Osi_model->fetchinfo('users', array('user_log' => 4));
		$data['views'] = ['' => '--SELECT VIEW--', 'ONE_LINE' => 'ONE LINE', 'EXPANDED' => 'EXPANDED'];
		$posting_route = array();
		$link = $this->generate_link($parent_id, $posting_route);
		$data['posting_route'] = array_reverse($posting_route);
		$data['link'] = $link;
		$data['postings'] = $postings;
		$data['parent_id'] = $parent_id;
		$data['parent_posting_id'] = $parent_posting_id;
		$data['data'] = array();
		$this->load->view('CA/posting/add', $data);
		//validations
		//save to db
	}
	public function generate_link($parent_id, &$posting_route)
	{
		$link = '';
		//get the parent of selected posting
		$parent = $this->Posting_model->getPreviousPostingId($parent_id);
		$i = 0;
		while (isset($parent) && (count($parent) > 0) && $parent[0]->parent_posting_id >= 0) {
			//get the parent name
			$name = $parent[0]->name;
			$parent_posting_id = $parent[0]->parent_posting_id;
			if ($i != 0) {
				if ($i != 1) {
					$func = 'getSubPostings(' . $parent[0]->id . ')';
				} else {
					$func = '';
				}
				$link = '<li class="breadcrumb-item" id="breadCum1" onclick="pop_postings(' . ($i - 1) . '),' . $func . '"><a>' . $name . '</a></li>' . $link;
				$posting_route[] = $parent[0];
			}
			$parent = $this->Posting_model->getPreviousPostingId($parent_posting_id);
			$i++;
			//break;
		}
		return $link;
	}
	public function get_sub_postings()
	{
		/*var_dump($this->input->get());
			var_dump($id);*/
		$this->load->model('Posting_model');
		$id = $this->input->post('id');
		//$id = 1;
		if (null != $this->input->post('name') && trim($this->input->post('id')) != '') {
			$name = $this->input->post('name');
			$data = $this->Posting_model->getSubpostingByNameId($id, $name);
		} else {
			$data = $this->Posting_model->getSubPostingOf($id);
		}
		foreach ($data as $k => $v) {
			if ($this->haveChild($v->id)) {
				$v->haveChilds = true;
			} else {
				$v->haveChilds = false;
			}
			$v->name = preg_replace("/'/", "&apos;", $v->name);
		}
		/* foreach($data as $k=>$val){
				$data[$k]->name = addslashes($data[$k]->name);
			} */
		echo json_encode($data);
	}
	public function haveChild($id)
	{
		$sub_postings = $this->Posting_model->getSubPostingOf($id);
		if (count($sub_postings)) {
			return true;
		} else {
			return false;
		}
	}
	//Get the id of parent Posting
	public function get_previous_postings()
	{
		/*var_dump($this->input->get());
			var_dump($id);*/
		$this->load->model('Posting_model');
		$parent_posting_id = $this->input->post('parent_posting_id');
		//$parent_posting_id = 6;
		$data = $this->Posting_model->getPreviousPostingId($parent_posting_id);
		//var_dump($data);
		if (!empty($data)) {
			echo $data[0]->parent_posting_id;
		} else {
			echo 0;
		}
	}
	//-----------------------Select Posting ajax STARTS------------------
	public function getSubPostingsEmployeeList()
	{
		$this->load->model('Posting_model');
		$id = $this->input->post('id');
		//$id = 1;
		$subpostings = $this->Posting_model->getSubPostingOf($id);
		foreach ($subpostings as $k => $v) {
			if ($this->haveChild($v->id)) {
				$v->haveChilds = true;
			} else {
				$v->haveChilds = false;
			}
			$v->link_ = $v->name;
		}
		if ($id == 0) {
			$data['posting_detail'] = $this->Posting_model->getPostingById(1);
		} else {
			$data['posting_detail'] = $this->Posting_model->getPostingById($id);
		}
		$data['subpostings'] = $subpostings;
		echo json_encode($data);
	}
	public function searchPosting()
	{
		//error_reporting(E_ALL);

		$this->load->model('Posting_model');
		$searchText = $this->input->post('searchText');
		$id = null;
		if (null != $this->input->post('includePosting') && $this->input->post('includePosting') == 'yes') {
			if (null != $this->input->post('id')) {
				$id = $this->input->post('id');
			} else {
				$id = null;
			}
		}
		$bat_id = null;
		if (null != $this->input->post('bat_id')) {
			$bat_id = $this->input->post('bat_id');
		}
		$all_postings = [];
		//$searchText = 'h';
		//$id= 1;
		$limit = 10;
		$start = 0;
		if (null != $this->input->post('recordsPerPage')) {
			$limit = $this->input->post('recordsPerPage');
			$start = 0;
			if (null != $this->input->post('pageNumber')) {
				$start = $limit * ($this->input->post('pageNumber') - 1);
			}
		}
		$postings = $this->Posting_model->getPostingByNameAndParentId($searchText, $id, $limit, $start, [$bat_id]);
		$totalPostings = $this->Posting_model->getTotalPostingByNameAndParentId(null, $id);
		$totalFilteredPostings = $this->Posting_model->getTotalFilteredPostingByNameAndParentId($searchText, $id);
		//die;
		//$data['sql'] = $this->db->last_query();
		$parent_ids = [];
		//die('hi');
		foreach ($postings as $k => $v) {

			if ($this->haveChild($v->id)) {
				$v->haveChilds = true;
			} else {
				$v->haveChilds = false;
			}
			if (!in_array($v->id, $parent_ids)) {
				$parent_ids[] = $v->parent_posting_id;
				$all_postings[$v->id] = $v;
			}
			$postings[$k] = $v;
			$postings[$k]->link_ = $v->name;
		}
		$new_parent_ids = $parent_ids;

		while ($new_parent_ids != null && count($new_parent_ids) > 0) {
			$postings_ = $this->getPostingsByIds($new_parent_ids);
			$new_parent_ids = [];
			foreach ($postings_ as $k => $v) {
				if (!in_array($v->parent_posting_id, $parent_ids)) {
					$parent_ids[] = $v->parent_posting_id;
					$new_parent_ids[] = $v->parent_posting_id;
					$all_postings[$v->id] = $v;
				} else {
					$all_postings[$v->id] = $v;
				}
			}
		}
		//var_dump($all_postings[1]);
		foreach ($postings as $k => $v) {
			$temp_posting = $this->getParent($v->parent_posting_id, $all_postings);
			//$postings[$k]->link_ = $v->name;
			if ($temp_posting != false && $v->id != $v->parent_posting_id) {
				$postings[$k]->name .= ' <span class="separator">&gt;</span> ' . $temp_posting->name;

				while ($temp_posting->parent_posting_id > 0) {
					$temp_posting = $this->getParent($temp_posting->parent_posting_id, $all_postings);
					if ($temp_posting == false) {
						break;
					}
					$postings[$k]->name .= ' <span class="separator">&gt;</span> ' . $temp_posting->name;
				}
			}
		}
		$data['total_postings'] = $totalPostings;
		$data['total_filtered_postings'] = $totalFilteredPostings;
		$data['postings'] = $postings;
		echo json_encode($data);
	}
	public function getParent($id, $postings)
	{
		if ($id == 0) {
			return false;
		} else {
			if (null != $postings[$id]) {
				return $postings[$id];
			} else {
				return false;
			}
		}
	}
	/**
			get the Postings by ids
	 */
	public function getPostingsByIds($ids)
	{
		$this->load->model('Posting_model');
		$postings = $this->Posting_model->getPostingsByIds($ids);
		return $postings;
	}
	//-----------------------Select Posting ajax End------------------
	public function list_()
	{
		$this->load->model('Posting_model');
		$postings = $this->Posting_model->getAllPostings();
		foreach ($postings as $k => $posting) {
			if ($posting->name != 'Root') {
				$postings[$k]->parent_name = $this->getParentNameOf($posting, $postings);
			}
		}
		$data['postings'] =  $postings;
		$this->load->view('Postings/list', $data);
	}
	///------------------------------ Posting management admin level ------------------------------------------------------------------------------------
	public function listPostings()
	{
		if (!(in_array($this->session->userdata('userid'), array(222)) && $this->session->userdata('usertype') == 'adm')) {
			redirect('bt-dashboard');
		}
		//get the deployment reports
		$this->load->model('DeploymentReport_model');
		$dep_reports_objs = $this->DeploymentReport_model->getReportsList();
		$deployment_reports = [];
		$selected_deployment_report = false;
		foreach ($dep_reports_objs as $k => $dep_rep_obj) {
			if ($selected_deployment_report == false) {
				$selected_deployment_report = $dep_rep_obj->id;
			}
			$deployment_reports[$dep_rep_obj->id] = $dep_rep_obj->title;
		}
		$data['deployment_reports'] = $deployment_reports;
		$data['selected_deployment_report'] = $selected_deployment_report;
		$data['title'] = 'Dalwinder';
		$this->load->view('Ca/posting/listPosting', $data);
	}
	public function getData()
	{
		$this->load->model("Posting_model");
		$this->load->model("Osi_model");

		$battalion_objs = $this->Osi_model->fetchinfo('users', array('user_log' => 4));
		$battalions = [];
		$battalions[-1] = 'ALL';
		foreach ($battalion_objs as $k => $val) {
			$battalions[$val->users_id] = $val->nick;
		}
		$fetch_data = $this->Posting_model->make_datatables();
		$parent_ids = array();
		foreach ($fetch_data as $k => $posting) {
			if ($posting->name != 'Root') {
				$parent_ids[] = $posting->parent_posting_id;
			}
		}
		$parents = $this->Posting_model->get_parent_postings(implode(',', $parent_ids));
		foreach ($fetch_data as $k => $posting) {
			if ($posting->name != 'Root') {
				$fetch_data[$k]->parent_name = $this->getParentNameOf($posting, $parents);
			} else {
				$fetch_data[$k]->parent_name = "No Parent";
			}
		}
		$data = array();
		$counter = $_POST['start'] + 1;
		foreach ($fetch_data as $row) {
			if ($row->view == null) {
				$row->view = 'ONE_LINE';
			}
			$sub_array = array();
			$sub_array['sno'] = $counter; //.' '.$this->db->last_query();
			$sub_array['name'] = $row->name; //.'-'.$_POST['length'].'-'.$_POST['start'].'-';
			$sub_array['parent_name'] = $row->parent_name; //.' '.$row->parent_posting_id;//.'-'.serialize($_POST);
			$sub_array['nick'] = $row->nick; //.' '.$_POST['start'].','.$_GLOBALS['start'];
			$sub_array['shown_in'] = $battalions[$row->shown_in];
			$sub_array['view'] = $row->view;
			if ($row->deployment_report_id == null) {
				$row->deployment_report_id = $this->input->post('deployment_report_id');
			}
			$sub_array['order_by'] = $row->order_by_;
			//$sub_array[] = $row->created_date;
			$sub_array['action'] = '<a href="posting-edit/' . $row->id . '/' . $row->deployment_report_id . '" class="glyphicon glyphicon-pencil" style="color:black;" title="Edit Posting"></a> &nbsp; <a href="posting-delete/' . $row->id . '" class="glyphicon glyphicon-trash" style="color:red;" title="Delete Posting"></a>  &nbsp; <a href="posting-update-history/' . $row->id . '/' . $row->deployment_report_id . '" class="glyphicon glyphicon-edit" style="color:green;" title="Create Posting History"></a>';
			$data[] = $sub_array;
			$counter++;
		}
		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->get_all_Data(),
			"recordsFiltered" => $this->Posting_model->get_filtered_data(),
			"data"	=> $data
			//'post' =>$_POST,
		);
		echo json_encode($output);
	}
	//-------------------------------------------------------------------------------

	//-------------------------------------------------------------------------------
	public function getParentNameOf($posting, $postings)
	{
		foreach ($postings as $k => $val) {
			if ($posting->parent_posting_id == $val->id) {
				return $val->name;
			}
		}
		return 'NO PARENT';
	}
	public function getPostingRouteOf($posting_parent_id)
	{
		$route = array();
		$this->load->model('Posting_model');
		$first = false;
		$result = $this->Posting_model->getParentPosting($posting_parent_id);
		while ($result) {
			if ($first == true) {
				$route[] = json_encode($result[0]);
			}
			$first = true;
			$posting_parent_id = $result[0]->parent_posting_id;
			$result = $this->Posting_model->getParentPosting($posting_parent_id);
		}
		$route = array_reverse($route);
		return $route;
	}
	public function addAdditionalPostingType()
	{
		$this->load->model('Posting_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Posting Type name', 'required|max[5]');
		if ($this->form_validation->run()) {
			$title = $this->input->post('title');
			$data = $this->Posting_model->addAdditionalPostingType(['title' => $title]);
			if ($data['status']) {
				echo json_encode(['status' => true, 'type' => $data['data']]);
			} else {
				echo json_encode(['status' => false, 'message' => $data['message']]);
			}
		} else {
			//echo json_encode(['status'=>true,'type'=>['id'=>5,'title'=>'Dalwinder type']]);
			$errors = $this->form_validation->error_array();
			echo json_encode(['status' => false, 'message' => 'Validation Failed', 'errors' => $errors]);
		}
	}
	public function ajaxDeletePostingAdditionalInfoType()
	{
		$this->load->model('Posting_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'Posting', 'required|callback_valid_additional_posting_type');
		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$data = $this->Posting_model->setDeleteAdditionalPostingType(['id' => $id]);
			if ($data) {
				echo json_encode(['status' => true, 'message' => 'Additional Posting Info Type Deleted Successfully.']);
			} else {
				echo json_encode(['status' => false, 'message' => 'Additional Posting Info Type Deletion Failed.']);
			}
		} else {
			//echo json_encode(['status'=>true,'type'=>['id'=>5,'title'=>'Dalwinder type']]);
			$errors = $this->form_validation->error_array();

			echo json_encode(['status' => false, 'message' => 'Validation Failed', 'errors' => $errors]);
		}
	}
	public function ajaxRecoverPostingAdditionalInfoType()
	{
		$this->load->model('Posting_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'Posting', 'required|callback_valid_additional_posting_type');
		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$data = $this->Posting_model->unsetDeleteAdditionalPostingType(['id' => $id]);
			if ($data) {
				echo json_encode(['status' => true, 'message' => 'Additional Posting Info Type Recovered Successfully.']);
			} else {
				echo json_encode(['status' => false, 'message' => 'Additional Posting Info Type Recover Failed.']);
			}
		} else {
			//echo json_encode(['status'=>true,'type'=>['id'=>5,'title'=>'Dalwinder type']]);
			$errors = $this->form_validation->error_array();

			echo json_encode(['status' => false, 'message' => 'Validation Failed', 'errors' => $errors]);
		}
	}
	public function ajaxUpdatePostingAdditionalInfoType()
	{
		$this->load->model('Posting_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'Posting', 'required|callback_valid_additional_posting_type');
		$this->form_validation->set_rules('title', 'Additional Posting info Type', 'required');
		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$data = $this->Posting_model->updateAdditionalPostingType(['title' => $title, 'id' => $id]);
			if ($data) {
				echo json_encode(['status' => true, 'message' => 'Additional Posting Info Type Updated Successfully.']);
			} else {
				echo json_encode(['status' => false, 'message' => 'Additional Posting Info Type Updation Failed.']);
			}
		} else {
			//echo json_encode(['status'=>true,'type'=>['id'=>5,'title'=>'Dalwinder type']]);
			//$errors = ['id'=>'Select Posting'];
			$errors = $this->form_validation->error_array();
			echo json_encode(['status' => false, 'message' => 'Validation Failed', 'errors' => $errors]);
		}
	}
	public function valid_additional_posting_type($id)
	{
		return true;
	}
	//------------------------------------------------------------
	public function edit($id, $deployment_report_id_)
	{
		if (!(in_array($this->session->userdata('userid'), array(222)) && $this->session->userdata('usertype') == 'adm')) {
			redirect('bt-dashboard');
		}
		if ($id == 1) {
			redirect('posting-list');
		}
		if ($deployment_report_id_ != null) {
			$data['deployment_report_id'] = $deployment_report_id_;
		}
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('AdditionalPosting_lib');
		$this->load->model('Osi_model');
		$this->load->model('DeploymentReport_model');
		$this->load->model('Posting_model');
		$dep_reports_objs = $this->DeploymentReport_model->getReportsList();
		$posting_additional_info_obj = $this->Posting_model->getAdditionalPostings($id);
		$posting_additional_info_types_obj = $this->Posting_model->getAdditionalPostingTypes();
		$posting_additional_info_types = [];
		if ($posting_additional_info_types_obj != null) {
			foreach ($posting_additional_info_types_obj as $k => $val) {
				$posting_additional_info_types[$val->id] = $val;
			}
		}
		$data['posting_additional_info_types'] = $posting_additional_info_types;
		$posting_additional_info = [];
		$posting_additional_info_complete = [];

		foreach ($posting_additional_info_obj as $k => $val) {
			$posting_additional_info[$val->id] = $val->title . ' - ' . $val->type_title;
			$posting_additional_info_complete[$val->id] = $val;
		}
		$data['additional_posting_info'] = $posting_additional_info;
		$data['additional_posting_info_complete'] = $posting_additional_info_complete;

		$deployment_reports = [];
		$deployment_reports[''] = '--DEPLOYMENT REPORT NOT SELECTED--';
		foreach ($dep_reports_objs as $k => $dep_rep_obj) {
			$deployment_reports[$dep_rep_obj->id] = $dep_rep_obj->title;
		}
		$data['deployment_reports'] = $deployment_reports;
		$battalion_objs = $this->Osi_model->fetchinfo('users', array('user_log' => 4));
		$battalions = [];
		$battalions[-1] = 'ALL';
		foreach ($battalion_objs as $k => $val) {
			$battalions[$val->users_id] = $val->nick;
		}
		$data['battalions'] = $battalions;
		$data['views'] = ['' => '--VIEW NOT SELECTED--', 'ONE_LINE' => 'ONE LINE', 'EXPANDED' => 'EXPANDED'];
		if (null != $id) {
			$data['id'] = $id;
			$this->load->model('Posting_model');
			$result = $this->Posting_model->getPostingById($id)[0];
			if ($result->view == null) {
				$result->view = '';
			}
			if ($result->deployment_report_id == null) {
				$result->deployment_report_id = ''; //not selected
			}
			$route_array = $this->getPostingRouteOf($id);
			$data['route'] = $route_array;
			$data['posting'] = $result;
			if (null != $data['posting']) {
				if (null != $this->input->post('submit')) {
					//save the data
					$name = $this->input->post('new_duty');
					$parent_posting = $this->input->post('parent_posting');
					$battalion = $this->input->post('battalion');
					$view = $this->input->post('views');
					$order_by_ = $this->input->post('order_by_');
					$deployment_report_id = $this->input->post('deployment_report'); //1;deployment_report_id
					$this->form_validation->set_rules('new_duty', 'Posting Name', 'required');
					$this->form_validation->set_rules('parent_posting', 'Parent Posting', 'required');
					$this->form_validation->set_rules('battalion', 'Parent Posting', 'required');
					$this->form_validation->set_rules('views', 'Posting View', 'required');
					$this->form_validation->set_rules('order_by_', 'Posting View', 'callback_valid_order_by_index');

					//addtional information
					$add_info = [];
					$data['additional_info_objs'] = $add_info;
					$add_status = $this->input->post('additional_posting_status');
					$add_ids = $this->input->post('additional_posting_id');
					foreach ($this->input->post('additional_posting_id') as $k => $val) {
						$temp_data = [];
						//echo "<b>{$add_status[$k]}</b>";
						if (isset($add_ids[$k])) {
							//echo '<b>yes</b>';
							$temp_data['id'] = $add_ids[$k];
							if (isset($add_status[$k]) && $add_status[$k] == 'delete') {
								//echo "<b>{$add_status[$k]}</b>";
								$temp_data['operation'] = strtoupper($add_status[$k]);
								//echo "<br>OBJECT$k";
								//var_dump($temp_data);
								$add_info[$k] = new AdditionalPosting_lib($temp_data);
							} else {
								//die('helo');
								$temp_data['operation'] = 'RECOVER';
								//echo "<br>OBJECT$k";
								//var_dump($temp_data);
								$add_info[$k] = new AdditionalPosting_lib($temp_data);
							}
						}
					}
					if ($this->input->post('additional_posting_title') != null) {
						foreach ($this->input->post('additional_posting_title') as $k => $val) {
							if (isset($add_status[$k]) && $add_status[$k] == 'delete') {
								$this->form_validation->set_rules('additional_posting_id[' . $k . ']', 'Posting Additional', 'required');
							} else {
								$this->form_validation->set_rules('additional_posting_title[' . $k . ']', 'Posting Additional Info Title', 'required|callback_valid_addition_info_title');
								$this->form_validation->set_rules('additional_posting_type[' . $k . ']', 'Posting Additional Info Type', 'required|callback_valid_addtion_type');
							}
						}


						$data['add_status'] = $add_status;
						//var_dump($add_status);

						//var_Dump($add_ids);
						//echo'<hr>';
						//var_dumP($add_ids);
						//echo'<hr>';
						$data['add_ids'] = $add_ids;
						$add_titles = $this->input->post('additional_posting_title');
						$data['add_titles'] = $add_titles;
						$add_types = $this->input->post('additional_posting_type');
						$data['add_types'] = $add_types;

						foreach ($this->input->post('additional_posting_title') as $k => $val) {
							$temp_data = ['title' => $add_titles[$k], 'type_id' => $add_types[$k]];
							//echo "<b>{$add_status[$k]}</b>";
							if (isset($add_ids[$k])) {
								echo '<b>yes</b>' . $k;
								$temp_data['id'] = $add_ids[$k];
								if (isset($add_status[$k]) && trim($add_status[$k]) != '') {
									echo "<b>{$add_status[$k]}</b>";
									$temp_data['operation'] = strtoupper($add_status[$k]);
								} else {
									$temp_data['operation'] = 'ADD';
								}
							} else {
								$temp_data['operation'] = 'ADD';
							}
							//echo "<br>OBJECT$k";
							//var_dump($temp_data);
							$add_info[$k] = new AdditionalPosting_lib($temp_data);
							//var_dump($add_info[$k]);
							//die;
						}


						//echo'<hR>';
						//var_dump($add_info);
						$data['additional_info_objs'] = $add_info;
						//var_dump($this->input->post('additional_posting_title'));
					}
					//die;
					//
					$to_be_added_data = [];
					$to_be_updated_data = [];
					if ($this->form_validation->run()) {
						//echo '<BR>';
						// var_dumP($add_info);
						if (count($add_info) > 0) {
							foreach ($add_info as $k => $obj) {
								switch ($obj->getOperation()) {
									case 'ADD':
										$to_be_added_data[] = $obj->getAddedDataArray($id);
										break;
									case 'DELETE':
										$to_be_updated_data[] = $obj->getDeletedData();
										break;
									case 'EDIT':
										$to_be_updated_data[] = $obj->getUpdatedData();
										break;
									case 'RECOVER':
										$to_be_updated_data[] = $obj->getRecoverData();
										break;
								}
							}
						}
						$add_pos_data = null;
						if (count($to_be_added_data) > 0 || count($to_be_updated_data) > 0) {
							if (count($to_be_added_data) > 0) {
								$add_pos_data['add'] = $to_be_added_data;
							}
							if (count($to_be_updated_data) > 0) {
								$add_pos_data['update'] = $to_be_updated_data;
							}
						}

						//$this->Posting_model->updateAdditional_posting($add_pos_data);
						//die('hi');
						//var_dumP($add_pos_data);
						//echo 'h';
						$a = $this->Posting_model->update(array('name' => $name, 'parent_posting_id' => $parent_posting, 'shown_in' => $battalion, 'view' => $view, 'order_by_' => $order_by_), array('id' => $id), $deployment_report_id, $add_pos_data);
						if ($a == true) {
							$this->session->set_flashdata('success_msg', 'Positng Updated succesfully!');
							redirect('posting-list');
						}
					} else {
						$this->load->view('Ca/posting/edit', $data);
					}
				} else {
					$this->load->view('Ca/posting/edit', $data);
				}
			} else {
				redirect('posting-list');
			}
		} else {
			redirect('posting-list');
		}
	}
	public function valid_addtion_type($type_id)
	{
		if (trim($type_id) == '') {
			$this->form_validation->set_message('valid_addtion_type', 'Invalid Additional Info Type. ');
			return false;
		} else {
			return true;
		}
	}
	public function valid_addition_info_title($title)
	{
		if (strlen($title) > 0) {
			if (preg_match('/^([0-9a-zA-Z_\-\., ]{1,100})$/', $title)) {
				return true;
			} else {
				$this->form_validation->set_message('valid_addition_info_title', 'Invalid Additional Info title. Only (0-9a-zA-Z_ ) (Size 1 to 10) are allowed');
				return false;
			}
		} else {
			return true;
		}
	}
	public function valid_order_by_index($str)
	{
		if (trim($str) == '') {
			return true;
		}
		if (preg_match('/^([0-9a-zA-Z_]{1,20})$/', $str)) {
			return true;
		} else {
			$this->form_validation->set_message('valid_order_by_index', 'Invalid Order by String. Only (0-9a-zA-Z_) are allowed');
			return false;
		}
	}
	public function is_posting_valid_for_employee_addition_to_current_postings($posting_id)
	{

		if ($this->haveChild($posting_id)) {
			$this->form_validation->set_message('is_posting_valid_for_employee_addition_to_current_postings', 'You can\'t add employee(s) to selected posting because this posting contain subpostings');
			return false;
		} else {
			return true;
		}
	}
	public function valid_employee_order($order_number, $parameters)
	{
		//var_dump($order_number);
		$param_array = explode('@!', $parameters);
		//var_dump($param_array);
		$posting_id = $param_array[0];				//post
		$employee_ids = explode(',', $param_array[1]);
		$order_number = $param_array[2];
		$posting_date = $param_array[3];

		var_dump($employee_ids);
		//order no , post, employee_id

		//get those employees whose 
		die('hello');
		return false;
	}
	// callback validation
	//dd/mm/YYYY hh:ii;ss
	public function valid_date($date)
	{
		$this->form_validation->set_message('valid_date', 'Invalid Date!!');
		//echo $date;
		if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4} (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$/', $date)) {
			return true;
		} else {
			return false;
		}
	}
	// callback validation
	//dd/mm/YYYY
	public function valid_date_DMY($date)
	{

		//echo $date;
		if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/', $date)) {
			return true;
		} else {
			$this->form_validation->set_message('valid_date_DMY', 'Invalid Date!!');
			return false;
		}
	}
	public function valid_today($date)
	{
		//echo $date;
		$posting_date = DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
		$currentDate = new DateTime();
		if ($posting_date <= $currentDate->format("Y-m-d")) {
			return true;
		} else {
			$this->form_validation->set_message('valid_today', 'Date is greator than toaday!!');
			return false;
		}
	}
	/**
	 * Date format should be dd/mm/yyyy
	 * @param type $date
	 * @return boolean
	 * */

	public function valid_order_date($date)
	{
		if ($date == null || trim($date) == '') {
			return true;
		} else {
			//echo $date;
			if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/', $date)) {
				return true;
			} else {
				$this->form_validation->set_message('valid_order_date', 'Invalid Date Format!!. Required Format (dd/mm/yyyy).');
				return false;
			}
		}
	}


	/**
	 * Date format should be dd-mm-yyyy
	 * @param type $date
	 * @return boolean
	 * */
	public function valid_order_date2($date)
	{

		if ($date == null || trim($date) == '') {
			return true;
		} else {
			//echo $date;
			if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $date)) {
				return true;
			} else {
				$this->form_validation->set_message('valid_order_date2', 'Invalid Date Format12!!. Required Format (dd-mm-yyyy).' . $date);
				return false;
			}
		}
	}
	/**
			date should be of YYYY-MM-DD
	 */
	public function valid_date2($date)
	{

		//echo $date;
		if (preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $date)) { //(00|0[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])
			return true;
		} else {
			$this->form_validation->set_message('valid_date2', 'Invalid Date!! Format should be YYYY-MM-DD' . $date);
			return false;
		}
	}
	/**
			date should be of DD-MM-YYYY
	 */
	public function valid_date3($date)
	{

		//echo $date;
		if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $date)) { //(00|0[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])
			return true;
		} else {
			$this->form_validation->set_message('valid_date3', 'Invalid Date!! Format should be DD-MM-YYYY' . $date);
			return false;
		}
	}
	public function do_not_exceed_current_date($posting_date)
	{
		$date = date('Y-m-d');
		$posting_date = DateTime::createFromFormat('d-m-Y', $posting_date)->format('Y-m-d');
		if ($posting_date > $date) {
			$this->form_validation->set_message('do_not_exceed_current_date', 'Check Posting Date. Posting Date is greator than Today which is not Possible!' . $posting_date);
			return false;
		} else {
			return true;
		}
	}
	public function add_employee_posting()
	{
		$this->load->library('form_validation');
		$this->load->model("Posting_model");
		$this->load->model("Leave_model");
		$this->load->helper('form');
		$this->load->helper('posting');
		$message = '';
		$data = [];
		if (null != $this->input->post('submit')) {
			//var_dump($_POST);
			$_POSTING_SUBMISSION = true;
			$_LEAVE_SUBMISSION = true;
			$this->Posting_model->db->trans_start();
			$this->Leave_model->db->trans_start();
			$posting_id = $this->input->post('posting_list_name');
			//get the id of parent of positing id
			$employee_ids = $this->input->post('selectedEmployeesIds');
			$order_number = $this->input->post('order_number');
			$additional_posting_id = $this->input->post('additional_posting_id');
			$order_date = null;
			//validations
			$this->form_validation->set_rules('posting_list_name', 'Posting Name', 'required|callback_is_posting_valid_for_employee_addition_to_current_postings');


			if ($this->input->post('type') == 'POSTING') {
				//$this->form_validation->set_rules('order_number','Order Number','required');
				$this->form_validation->set_rules('order_date', 'Order date', 'callback_valid_order_date');
				$posting_date = $this->input->post('date');
				$this->form_validation->set_rules('date', 'Posting Date', 'required|callback_valid_date_DMY|callback_valid_today');
				$posting_date = $posting_date . date("H:i:s");
				if (null != $this->input->post('order_date') && trim($this->input->post('order_date')) != '') {
					$order_date   = $this->input->post('order_date') . date("H:i:s");
				}
			} elseif ($this->input->post('type') == 'LEAVE') {
				if ($posting_id != null) {
					$leave_id = $this->Leave_model->getLeaveIdByPosingId($posting_id);
				} else {
					$leave_id = null;
					$_LEAVE_SUBMISSION = false;
				}
				$this->form_validation->set_rules('leave_from_date', 'Leave From Date', 'required|callback_valid_date_DMY');
				$this->form_validation->set_rules('leave_to_date', 'Leave To Date', 'required|callback_valid_date_DMY');
				$this->form_validation->set_rules('leave_date', 'Leave Date', 'required|callback_valid_date_DMY');
				$leave_date_from = $this->input->post('leave_from_date');
				$leave_date_to = $this->input->post('leave_to_date');
				$posting_date = $this->input->post('leave_date');
				$posting_date = $posting_date . date("H:i:s");
				$order_date   = '0000-00-00 00:00:00';
			}

			$this->form_validation->set_rules('selectedEmployeesIds', 'Selected Employees', 'required');
			//$this->form_validation->set_rules('parent_posting','Parent Posting','required');
			//insert in database
			$data['selectedPolicePersonnel'] = $this->Posting_model->getSelectedPolicePersonnel(explode(',', $employee_ids));
			if ($this->form_validation->run() == TRUE) {
				//$this->form_validation->set_rules('order_number','Order Number',"callback_valid_employee_order[".$posting_id.'@!'.$employee_ids.'@!'.$order_number.'@!'.$posting_date."]");

				$leave_date = $posting_date = DateTime::createFromFormat('d/m/Y H:i:s', $posting_date)->format('Y-m-d H:i:s');
				if ($this->input->post('type') == 'POSTING') {
					if ($order_date != null && trim($order_date) != '') {
						$order_date   = DateTime::createFromFormat('d/m/Y H:i:s', $order_date)->format('Y-m-d H:i:s');
					}
				}
				$employee_ids_can_be_added    = array();
				$employee_ids_cannot_be_added = array();
				$employee_ids_ = explode(',', $employee_ids);
				//var_dump($employee_ids_);
				$employees_already_added = $this->Posting_model->getEmployeesAlreadyAdded($posting_id, $order_number, $employee_ids_);
				$employees_ids_already_added = [];
				foreach ($employees_already_added as $k => $v) {
					$employees_ids_already_added[] = $v->employee_id;
				}
				foreach ($employee_ids_ as $k => $v) {
					if (!in_array($v, $employees_ids_already_added)) {
						$employee_ids_can_be_added[] = $v;
					} else {
						$employee_ids_cannot_be_added[] = $v;
					}
				}
				
				$data['employee_ids_cannot_be_added'] = $employee_ids_cannot_be_added;
				$data['employee_ids_can_be_added'] = $employee_ids_can_be_added;
				//var_dump($employee_ids_can_be_added);
				if (count($employee_ids_can_be_added) > 0) {
					$no_of_records_inserted = $this->Posting_model->addPostingInBulk($posting_id, array_unique($employee_ids_can_be_added), $order_number, $posting_date, $order_date, $additional_posting_id);
				} else {
					$no_of_records_inserted = 0;
				}
				if ($no_of_records_inserted == 0) {
					$_POSTING_SUBMISSION = false;
				}
				$posting_history_ids = [];
				$bat_id = $this->session->userdata('userid');
				$employee_id_posting_history_id_pair = [];
				if (count($employee_ids_can_be_added) > 0) {
					$posting_history_objects = $this->Posting_model->getPostingHistoryObjects($posting_id, $employee_ids_can_be_added, $order_number, $posting_date, $order_date, $bat_id);
					foreach ($posting_history_objects as $k => $posting_history_object) {
						$employee_id_posting_history_id_pair[$posting_history_object->employee_id] = $posting_history_object->id;
					}
				} else {
					$_POSTING_SUBMISSION = false;
				}
				$data1_ = [];
				$type = null;
				if ($this->input->post('type') != null) {
					$type = $this->input->post('type');
				}
				$selected_employees_whose_leave_not_marked = [];
				if ($type != null && $type == 'LEAVE') {
					foreach ($employee_ids_ as $k => $employee_id_) {
						if (!isset($employee_id_posting_history_id_pair[$employee_id_])) {
							//$_LEAVE_SUBMISSION = false;
							$selected_employees_whose_leave_not_marked[] = $employee_id_;
							continue;
						}
						$data1 = [];
						$data1['leave_id'] = $leave_id;
						$data1['employee_id'] = $employee_id_;
						$data1['from_date'] = DateTime::createFromFormat('d/m/Y', $leave_date_from)->format('Y-m-d H:i:s');
						$data1['to_date'] = DateTime::createFromFormat('d/m/Y', $leave_date_to)->format('Y-m-d H:i:s');
						$data1['leave_date'] = $leave_date;
						$data1['posting_history_id'] = $employee_id_posting_history_id_pair[$employee_id_];
						$data1_[] = $data1;
					}
				}

				$data['no_of_records_inserted'] = $no_of_records_inserted;

				//var_dump($no_of_records_inserted);
				if ($no_of_records_inserted > 0) { // && count($employee_id_posting_history_id_pair)>0){

					$message__ = '';
					if ($type != null && $type == 'LEAVE' && count($employee_id_posting_history_id_pair) > 0) {
						$a = $this->Leave_model->mark_leave_bulk($data1_);
						if ($a) {
							$leave_status = true;
							$message .= '(' . $a . ')Leave Added Successfully!';
						} else {
							$leave_status = false;
							$message .= 'Leave Addition Failed!';
						}
					}
					if ($_POSTING_SUBMISSION == true && $_LEAVE_SUBMISSION == true) {
						$this->Posting_model->db->trans_commit();
						$this->Leave_model->db->trans_commit();
						$_POST['posting_list_name'] = null;
						$_POST['selectedEmployeesIds'] = null;
						$_POST['order_number'] = null;
						$_POST['order_date'] = null;
						$_POST['date'] = null;
						$data['selectedPolicePersonnel'] = null;
						if (count($selected_employees_whose_leave_not_marked) > 0) {
							$message .= 'Employees whose Leave not marked are ' . implode(',', $selected_employees_whose_leave_not_marked);
						}
						$this->session->set_flashdata('success_msg', $no_of_records_inserted . ' police personnel(s) are succesfully posted! ' . $message);
					} else {
						$this->Posting_model->db->trans_rollback();
						$this->Leave_model->db->trans_rollback();
						if ($type != null & $type == 'LEAVE') {
							if (count($selected_employees_whose_leave_not_marked) > 0) {
								$message .= 'Employees whose Leave not marked are ' . implode(',', $selected_employees_whose_leave_not_marked);
							}
						}
						$this->session->set_flashdata('error_msg', '1No Police Personnel(s) is posted.' . $message);
					}
				} else {
					if ($type != null & $type == 'LEAVE') {
						if (count($selected_employees_whose_leave_not_marked) > 0) {
							$message .= 'Employees whose Leave not marked are ' . implode(',', $selected_employees_whose_leave_not_marked);
						}
					}
					$this->session->set_flashdata('error_msg', '2No Police Personnel(s) is posted.' . $message);
				}
			} else {
				$current_posting = $this->Posting_model->getPostingById($posting_id);
				if (isset($current_posting[0])) {
					$data['previous_posting'] = $this->Posting_model->getParentPosting($current_posting[0]->parent_posting_id);
					//var_dump($data['previous_posting']);
				}
			}
		}
		$this->load->model('Leave_model');
		$leave_objs = $this->Leave_model->getLeaves();
		$leaves = [];
		foreach ($leave_objs as $k => $leave_obj) {
			$leaves[$leave_obj->posting_id] = $leave_obj->id;
		}
		$data['leaves'] = $leaves;
		$this->load->view('Postings/add_employees_posting', $data);
	}
	// -------------- -------------- View of deployment statement start-------------- -------------- -------------- --------------
	public function view_employee_posting1()
	{
		$this->view_employee_posting_IGP();	//officer login igp-pap
	}
	public function view_employee_posting()
	{
		if ($this->session->userdata('user_log') == 100) {
			$this->view_employee_posting_IGP();	//officer login igp-pap
		} else { //battalion osi login
			//error_reporting(0);
			//fetch all the postings from postings table
			$data = array();
			$this->load->helper('date');
			$this->load->model('Posting_model');
			$bat_id = $this->session->userdata('userid');
			$all_postings = $this->Posting_model->getAllPostingsWithoutSearch2($bat_id, null, 'order_by_', 'asc'); //single battalion
			//echo count($all_postings);
			$skipZero = false;

			if (isset($_POST['submitForm'])) {
				if (isset($_POST['skipZero'])) {
					$skipZero = true;
				}
			}

			$date1 = $this->input->post('before_date');
			$before_date = null;
			if ($date1 != null) {
				try {
					$date_obj = DateTime::createFromFormat('d/m/Y', $date1);
					$before_date = $date_obj->format('Y-m-d');
					$before_date1 = $date_obj->format('d/m/Y');
				} catch (Exception $e) {
					$before_date = DateTime::createFromFormat('Y-m-d');
					$before_date1 = $date_obj->format('d/m/Y');
				}
			} else {
				$before_date = (new DateTime())->format('Y-m-d');
				$before_date1 = (new DateTime())->format('d/m/Y');
			}
			$data['before_date'] = $before_date1;

			//initialise sanction_strength_posting
			$sanction_strength = $this->initialisePostingData('SANCTION STRENGTH', 1, 'sanction_strength');
			//get the sanction_strength
			$sanction_strength_objects = $this->Posting_model->getSanctionStrengthList([$bat_id], $before_date . ' 23:59:59', null, null, null);
			//var_dump($sanction_strength_objects);
			foreach ($sanction_strength_objects as $k => $sanction_strength_object) {
				$sanction_strength->{$sanction_strength_object->variable_name} = $sanction_strength_object->ssstrength;
				$sanction_strength->total += $sanction_strength_object->ssstrength;
			}
			//end sanction strength

			$vacancies = $this->initialisePostingData('VACCANCIES', 2, 'vaccancies');
			$formalOrdersNotIssued = $this->initialisePostingData('FORMAL ORDERS NOT ISSUED', 4, 'Formal Order Not Issued');
			$postedForPayPurpose = $this->initialisePostingData('POSTED FOR PAY PURPOSE', 5, 'Transfer Pay Purpose');
			$notReported = $this->initialisePostingData('NOT REPORTED', 6, 'Not Reported');
			$notRelieved = $this->initialisePostingData('NOT RELIEVED <i>Not Calculated</i>', 7, 'Not Relieved');
			$excessAttached = $this->initialisePostingData('EXCESS ATTACHED <i>Discuss</i>', 8, 'Attachment');
			$dyingCadrePost = $this->initialisePostingData('DYING CADRE POST <i>Not Calculated</i>', 9, 'Dying Cadre Post');
			$actualPosted = $this->initialisePostingData('ACTUAL POSTED (3-4-5-6+7+8+9)', 10, 'Actual Posted');

			foreach ($all_postings as $k => $posting1) {

				$posting1->insp = 0;
				$posting1->si = 0;
				$posting1->asi = 0;
				$posting1->hc = 0;
				$posting1->ct = 0;
				$posting1->otherRank = 0;
				$posting1->total = 0;
				$posting1->processed = false;
				$all_postings[$k] = $posting1;
			}

			/* foreach($all_postings as $k=>$v){
					$unprocessed_postings[$k] = clone $v;
				} */
			$unprocessed_postings = $all_postings;
			$all_posting_copy = array();
			foreach ($all_postings as $k => $vp) {
				$all_posting_copy[$vp->id] = clone $vp;
			}

			//echo '<pre>';
			$finalPostings = array();
			$posting = 	clone $all_postings[0];
			//echo '<pre>';
			$this->process_posting($posting, $unprocessed_postings, $finalPostings);
			$posting_tree = $data['posting_tree'] = $posting;

			//echo 'all';
			//var_dump($all_postings);
			//die;
			$finalPostingWithIDasKey = array();

			foreach ($finalPostings as $k => $posting1) {
				$finalPostingWithIDasKey[$posting1->id] = $posting1;
			}

			//echo '<hr>';
			//var_dump($finalPostingWithIDasKey);
			$nre_reported = 'NO';	//nre not reported employee
			$nre_order_by = 'date';
			$nre_order = 'desc';
			$relieved = null;
			$length = null;
			$start = null;
			//$this->Posting_model->getNotReportedEmployees($before_date,[$bat_id],$reported,$nre_order_by,$nre_order);
			//get the id's of employees who are posted

			$posting_history = $this->Posting_model->getPostingHistory($before_date . ' 23:59:59', [$bat_id]);
			//echo count($posting_history);
			//var_dump($posting_history);
			//get the deiducted employees
			$employee_rank_relation = [];
			$total = 0;
			$employee_ids = [];
			foreach ($posting_history as $k => $val) {

				$total++;
				$employee_ids[] = $val->employee_id;
				$finalPostingWithIDasKey[$val->posting_id]->total++;
				switch (trim($val->current_rank)) {
					case 'INSP':
					case 'DSP/CR':
						$rank = 'insp';
						break;
					case 'SI':
					case 'INSP/LR':
					case 'INSP/CR':
						$rank = 'si';
						break;
					case 'ASI':
					case 'SI/LR':
					case 'SI/CR':
						$rank = 'asi';
						break;
					case 'HC':
					case 'ASI/LR':
					case 'ASI/CR':
					case 'ASI/ORP':
						$rank = 'hc';
						break;
					case 'CT':
					case 'Sr. Const':
					case 'Sr.Const':
					case 'C-II':
					case 'HC/LR':
					case 'HC/PR':
					case 'HC/CR':
						$rank = 'ct';
						break;
					default:
						$rank = 'otherRank';
						break;
				}

				$val->inductionmode;
				if (!in_array($val->inductionmode, ['Formal Order Not Issued'])) {
					$finalPostingWithIDasKey[$val->posting_id]->{$rank}++;
				}
				if ($val->inductionmode == 'Formal Order Not Issued') {
					$formalOrdersNotIssued->{$rank}++;
					$formalOrdersNotIssued->total++;
				} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
					$postedForPayPurpose->{$rank}++;
					$postedForPayPurpose->total++;
				} elseif ($val->inductionmode == 'Not Reported') {
					//$notReported->{$rank}++;
					//$notReported->total++;
				} elseif ($val->inductionmode == 'Attachment') {
					$excessAttached->{$rank}++;
					$excessAttached->total++;
				}
				$employee_id_rank_relation[$val->employee_id] = $rank;
			}
			//$notReportedEmployes = $this->Posting_model->getNotReportedEmployeesFromPostedOne([$bat_id],$nre_reported,$before_date,$relieved,$nre_order_by,$nre_order,null,null,$employee_ids);	//$e

			//var_dump($employee_ids);
			//	$total = $this->Posting_model->getTotalNotReportedEmployees([$bat_id],$nre_reported,$before_date,$relieved,$nre_order_by,$nre_order,null,null,$employee_ids);
			//employee_ids these ids are of those employees who are posted
			//var_dump($total);

			//Fetchign teh Not relieved
			$emps_objs = $this->getNotRelievedEmployees($employee_ids, $before_date, [$bat_id]); 	//employee objects
			foreach ($emps_objs as $k => $emp_obj) {
				if ($emp_obj->reld == 'No') {
					$notRelieved->{$employee_id_rank_relation[$emp_obj->nop]}++;
					$notRelieved->total++;
				}
			}
			//var_dump($emps);
			//echo '<pre>';
			//var_dump($finalPostingWithIDasKey);
			//die;
			$leveled_postings = array();
			$level = 0;
			$this->level_the_posting($posting_tree, $level, $leveled_postings, $all_posting_copy, $finalPostingWithIDasKey);
			//echo '<pre>';
			//var_dump($posting_tree);
			//echo count($leveled_postings);
			$max_level = count($leveled_postings);

			for ($i = ($max_level - 1); $i >= 0; $i--) {
				foreach ($leveled_postings[$i] as $k => $post) {
					if ($post->parent_posting_id != 0) {
						$parent_posting = $all_posting_copy[$post->parent_posting_id];
						$parent_posting = $this->addPostings($parent_posting, $post);
					}
				}
			}
			//echo ' hi ';
			//var_dump($leveled_postings);
			$all_postings1 = array();
			foreach ($leveled_postings as $k => $post) {
				if (is_array($post)) {
					foreach ($post as $j => $v) {
						$v->level = $k;
						$all_postings1[$v->id] = $v;
						//echo '['.$k.']['.$j.']'.$v->name.' '.$v->insp.' '.$v->si.' '.$v->asi.' '.$v->hc.' '.$v->ct.' '.$v->otherRank.' '.$v->total.' ID'.$v->id.', Parent ID'.$v->parent_posting_id.'<br>';
					}
				}
			}

			ksort($all_postings1);
			$removed_postings = [];
			//die;
			//	 die;
			$counter = 0;

			$htmlData = '';
			$htmlData .= $this->addHtmlRow($sanction_strength);
			$htmlgroup = '';
			$level = 0;
			$level2 = 0;
			$sno = array();
			$sno[$level] = 1;
			$total_row = '';
			$previous_child_id = 0;
			$new_child_id = 0;
			$parent_id = 0;
			$old_posting = $all_posting_copy[1];
			$totals = array();	//here we will push the postings who have childrens
			//var_dump($final_posting_copy);
			//var_dump($posting);
			$GRAND_TOTAL = $this->getPostingsWhoseParentIdIs(0, $all_postings1)[0];

			$GRAND_TOTAL->sno = 2;
			//Calculating vancies
			$this->substractPosting($vacancies, $sanction_strength, $GRAND_TOTAL);
			$htmlData .= $this->addHtmlRow($vacancies);
			$htmlData .= $this->addHtmlRow(null);
			$POSTED_STRENGTH = clone $GRAND_TOTAL;
			$POSTED_STRENGTH->title = 'POSTED STRENGTH';
			$POSTED_STRENGTH->sno = 3;
			$POSTED_STRENGTH->mode = 'posted_strength';
			$htmlData .= $this->addHtmlRow($POSTED_STRENGTH);
			$htmlData .= $this->addHtmlRow($formalOrdersNotIssued);
			$htmlData .= $this->addHtmlRow($postedForPayPurpose);
			$htmlData .= $this->addHtmlRow($notReported);
			$htmlData .= $this->addHtmlRow($notRelieved);
			$htmlData .= $this->addHtmlRow($excessAttached);
			$htmlData .= $this->addHtmlRow($dyingCadrePost);

			$this->addPostingRanks($actualPosted, $POSTED_STRENGTH);
			$this->substractPostingRanks($actualPosted, $formalOrdersNotIssued);
			$this->substractPostingRanks($actualPosted, $postedForPayPurpose);
			$this->substractPostingRanks($actualPosted, $notReported);
			$this->addPostingRanks($actualPosted, $notRelieved);
			$this->addPostingRanks($actualPosted, $excessAttached);
			$this->addPostingRanks($actualPosted, $dyingCadrePost);

			$htmlData .= $this->addHtmlRow($actualPosted);
			$htmlData .= $this->addHtmlRow(null);
			//vacancy calculation over
			//$this->htmlViewPosting($htmlData,$all_posting_copy[2],$finalPostings,$sno,$level);
			//var_dump($this->input->post('downloadExcel'));
			if (null != $this->input->post('downloadExcel')) {
				$variousInductionStrengths = [
					$sanction_strength,
					$vacancies,
					null,
					$POSTED_STRENGTH,
					$formalOrdersNotIssued,
					$postedForPayPurpose,
					$notReported,
					$notRelieved,
					$excessAttached,
					$dyingCadrePost,
					$actualPosted,
					null
				]; //to be added at the top of excel sheet
				$this->downloadViewPostingAsExcel($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, [], $before_date, $variousInductionStrengths);
				//die('downloading');
			}

			$this->htmlViewPosting($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero);

			$data['html'] = $htmlData;

			$this->load->view('Postings/view_employees_posting', $data);
		}
	}
	//public function 
	/**
			Her we fetch the not relieved status of the selected employees
	 */
	public function getNotRelievedEmployees($employee_ids = null, $before_date = null, $bat_ids = null)
	{
		$this->load->model('Posting_model');
		$emps = $this->Posting_model->getNotRelievedEmployees($employee_ids, $before_date, $bat_ids);
		return $emps;
	}
	public function view_employee_posting_IGP()
	{
		$data = array();
		$this->load->helper('osi');
		$this->load->library('Deployment');
		$this->load->model('RankGroups_model');
		$this->load->library('session');
		$skipZero = false;
		if (isset($_POST['submitForm'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}
		$incldueOthers = false;
		$showOthersRank = false;
		$calculateOthersRank = false;
		if (isset($_POST['includeOthers'])) {
			if (isset($_POST['includeOthers'])) {
				$includeOthers = true;
				$showOthersRank = true;
				$calculateOthersRank = true;
			}
		}
		$deployment = new Deployment();
		$deployment->setIncludeOtherRankInTotal($incldueOthers);
		$deployment->setShowOtherRank($showOthersRank);
		$deployment->setCalculateOtherRank($calculateOthersRank);

		//var_dump($this->session);
		if ($this->session->userdata('user_log') == 100) {
			$data['deployment_types'] = $deployment->getDeploymentTypes2();
			$data['deployments'] = $deployment->getDeploymentTypes();
		} else {
			$data['deployment_types'] = $deployment->getDeploymentTypes2ForBattalion();
			$data['deployments'] = $deployment->getDeploymentTypesBattalion();
		}
		//$deployment->setDeploymentType(Deployment::NGO_RANK_DEPLOYMENT);
		//var_dump($this->input->post('deployment'));

		if (null != $this->input->post('deployment')) {
			//echo $this->input->post('deployment');
			$dp = $this->input->post('deployment');
			//echo $dp;echo'<br>';
			//echo constant("Deployment::$dp");
			$deployment->setDeploymentType(constant("Deployment::$dp"));
		} else {
			$deployment->setDeploymentType(Deployment::NGO_RANK_DEPLOYMENT);
		}
		//var_dumP($deployment);
		if (null != $this->input->post('deployment_type')) {
			//echo $this->input->post('deployment_type');
			$dpt = $this->input->post('deployment_type');
			$deployment->setDeploymentType2($dpt);
		} else {
			$deployment->setDeploymentType2('OVERALL');
		}
		$deployment->setRanks();
		//var_dump($deployment);
		$deployment->setSkipZero($skipZero);
		$show_other_rank = $deployment->getShowOtherRank();
		$ranks = $deployment->getRanks();

		$rank_group_ids_objects = $this->RankGroups_model->getRankGroupIdsByVariableNames($deployment->getPermanentRankFields());
		$rank_group_ids = [];
		foreach ($rank_group_ids_objects as $k => $rank_group_ids_object) {
			$rank_group_ids[] = $rank_group_ids_object->id;
		}
		//var_Dump($rank_group_ids);
		//die;    
		$deployment->setRankGroupIds($rank_group_ids);
		//$deployment->setCalculateOtherRank(true);
		//$deployment->setIncludeOtherRankInTotal(true);
		//error_reporting(0);

		//var_dump($deployment);
		$this->load->model('Posting_model');
		if (in_array($this->session->userdata('userid'), [209, 210])) { //igp-irb,dig-irb
			$this->battalions = $data['battalions'] = osi_getIRBBattalions();
		} elseif (in_array($this->session->userdata('userid'), [211, 212])) { //igp-cdo,dig-cdo
			$this->battalions = $data['battalions'] = osi_getCDOBattalions();
		} else {
			$this->battalions = $data['battalions'] = osi_getAllBattalions();
		}
		$deployment->setBattalions($this->battalions);
		$bat_id = null;
		$date1 = $this->input->post('before_date');

		//echo count($all_postings);



		$before_date = null;
		$before_date1 = null;
		$before_date_posting = null;
		if ($date1 != null) {
			try {
				$date_obj = DateTime::createFromFormat('d/m/Y', $date1);
				$before_date = $date_obj->format('Y-m-d');
				$before_date_posting = $date_obj->format('Y-m-d H:i:s');
				$before_date1 = $date_obj->format('d/m/Y');
			} catch (Exception $e) {
				$before_date = DateTime::createFromFormat('Y-m-d');
				$before_date_posting = DateTime::createFromFormat('Y-m-d H:i:s');
				$before_date1 = DateTime::createFromFormat('d/m/Y');
			}
		} else {
			$before_date = (new DateTime())->format('Y-m-d');
			$before_date_posting = (new DateTime())->format('Y-m-d H:i:s');
			$before_date1 = (new DateTime())->format('d/m/Y');
		}
		$data['before_date'] = $before_date1;
		if ($deployment->getDeploymentType2() != 'OVERALL') {
			//echo 'hi';
			//$order_by = 'order_by_';
			//$order = 'asc';
			$all_postings = $this->Posting_model->getAllPostingsWithoutSearch3($bat_id, $deployment->getDeploymentType2(), null, null, $before_date_posting);
		} else {
			$all_postings = $this->Posting_model->getAllPostingsWithoutSearch3($bat_id, null, null, null, $before_date_posting); //selected multiple battalion in igp login
		}
		//initialise sanction_strength_posting
		$sanction_strength = $this->initialisePostingData('SANCTION STRENGTH', 1, 'sanction_strength', $deployment);
		//get the sanction_strength

		$bat_ids = null;
		if ($this->session->userdata('user_log') == 100) {
			if ($this->input->post('battalions') != null) {
				$bat_ids = $this->input->post('battalions');
			} else {
				$bat_ids = array_keys($this->battalions);
			}
		} else {
			$bat_ids = [$this->session->userdata('userid')];
		}
		$sanction_strength_objects = $this->Posting_model->getSanctionStrengthList($bat_ids, $before_date . ' 23:59:59', $rank_group_ids, null, null);
		foreach ($sanction_strength_objects as $k => $sanction_strength_object) {
			$sanction_strength->{$sanction_strength_object->variable_name} += $sanction_strength_object->ssstrength;
			$sanction_strength->total += $sanction_strength_object->ssstrength;
		}

		$vacancies = $this->initialisePostingData('VACCANCIES', 2, 'vaccancies', $deployment);
		$formalOrdersNotIssued = $this->initialisePostingData('FORMAL ORDERS NOT ISSUED', 4, 'Formal Order Not Issued', $deployment);
		$postedForPayPurpose = $this->initialisePostingData('POSTED FOR PAY PURPOSE', 5, 'Transfer Pay Purpose', $deployment);
		$notReported = $this->initialisePostingData('NOT REPORTED', 6, 'Not Reported', $deployment);
		$notRelieved = $this->initialisePostingData('NOT RELIEVED <i>Not Calculated</i>', 7, 'Not Relieved', $deployment);
		$excessAttached = $this->initialisePostingData('EXCESS ATTACHED <i>Discuss</i>', 8, 'Attachment', $deployment);
		$dyingCadrePost = $this->initialisePostingData('DYING CADRE POST <i>Not Calculated</i>', 9, 'Dying Cadre Post', $deployment);
		$actualPosted = $this->initialisePostingData('ACTUAL POSTED (3-4-5-6+7+8+9)', 10, 'Actual Posted', $deployment);
		//end sanction strength
		//echo $before_date1;
		//echo '<pre>';
		//var_dump($all_postings);
		//var_dump($all_postings);
		foreach ($all_postings as $k => $posting1) {

			foreach ($deployment->getPermanentRankFields() as $k1 => $field) {
				$posting1->$field = 0;
			}
			$posting1->otherRank = 0;
			$posting1->total = 0;
			$posting1->processed = false;
			if ($deployment->getDeploymentType2() != 'OVERALL') {
				if ($posting1->view != 'EXPANDED') {
					$posting1->view = 'ONE_LINE';
				}
			}

			$all_postings[$k] = $posting1;
		}


		/* foreach($all_postings as $k=>$v){
				$unprocessed_postings[$k] = clone $v;
			} */
		$unprocessed_postings = $all_postings;
		$all_posting_copy = array();
		foreach ($all_postings as $k => $vp) {
			$all_posting_copy[$vp->id] = clone $vp;
		}

		//echo '<pre>';
		$finalPostings = array();
		$posting = 	clone $all_postings[0];
		//echo '<pre>';

		$this->process_posting($posting, $unprocessed_postings, $finalPostings);
		//var_dump($finalPostings);
		foreach ($finalPostings as $k => $val) {
			if ($val->id == 6) {
				//var_dump($val);
			}
		}
		// die;
		$posting_tree = $data['posting_tree'] = $posting;
		//var_dump($finalPostings);
		//echo 'all';
		//var_dump($all_postings);
		//die;
		$finalPostingWithIDasKey = array();

		foreach ($finalPostings as $k => $posting1) {
			$finalPostingWithIDasKey[$posting1->id] = $posting1;
		}
		//echo '<hr>';
		//var_dump($finalPostingWithIDasKey);
		if (null != $this->input->post('battalions')) {
			$battalions = $this->input->post('battalions');
		} else {
			$battalions = [];
		}
		//var_dump($battalions);
		//var_dump($bat_ids);     
		$posting_history = $this->Posting_model->getPostingHistoryIGP($bat_ids, $before_date . ' 23:59:59', $ranks, $deployment->getRankCategory());
		//var_dump($posting_history);
		//die;
		//echo count($posting_history);
		//var_dump($posting_history);
		//echo count($posting_history);
		//var_dump($posting_history);
		$total = 0;
		$employee_ids = [];

		$deployment->makeDeploymentCalculations($posting_history, $formalOrdersNotIssued, $postedForPayPurpose, $notReported, $excessAttached, $finalPostingWithIDasKey, $total);
		//die;
		//echo '<pre>';
		//var_dump($finalPostingWithIDasKey);
		//die;
		$leveled_postings = array();
		$level = 0;
		$this->level_the_posting($posting_tree, $level, $leveled_postings, $all_posting_copy, $finalPostingWithIDasKey);
		//echo '<pre>';
		//echo count($leveled_postings);
		$max_level = count($leveled_postings);

		for ($i = ($max_level - 1); $i >= 0; $i--) {
			foreach ($leveled_postings[$i] as $k => $post) {
				if ($post->parent_posting_id != 0) {
					$parent_posting = $all_posting_copy[$post->parent_posting_id];
					$parent_posting = $this->addPostings($parent_posting, $post, $deployment);
				}
			}
		}
		//echo ' hi ';
		//var_dump($leveled_postings);
		$all_postings1 = array();
		foreach ($leveled_postings as $k => $post) {
			if (is_array($post)) {
				foreach ($post as $j => $v) {
					$v->level = $k;
					$all_postings1[$v->id] = $v;
					//echo '['.$k.']['.$j.']'.$v->name.' '.$v->insp.' '.$v->si.' '.$v->asi.' '.$v->hc.' '.$v->ct.' '.$v->otherRank.' '.$v->total.' ID'.$v->id.', Parent ID'.$v->parent_posting_id.'<br>';
				}
			}
		}

		ksort($all_postings1);
		$removed_postings = [];
		//die;
		//	 die;
		$counter = 0;

		$htmlData = '';
		$htmlgroup = '';
		$level = 0;
		$level2 = 0;
		$sno = array();
		$sno[$level] = 1;
		$total_row = '';
		$previous_child_id = 0;
		$new_child_id = 0;
		$parent_id = 0;
		$old_posting = $all_posting_copy[1];
		$totals = array();	//here we will push the postings who have childrens
		//var_dump($final_posting_copy);
		//var_dump($posting);
		//$this->htmlViewPosting($htmlData,$all_posting_copy[2],$finalPostings,$sno,$level);
		//var_dump($this->input->post('downloadExcel'));
		//echo count($all_postings1);
		$GRAND_TOTAL = $this->getPostingsWhoseParentIdIs(0, $all_postings1)[0];

		$GRAND_TOTAL->sno = 2;
		$this->substractPosting($vacancies, $sanction_strength, $GRAND_TOTAL, $deployment);
		$htmlData .= $deployment->addHtmlRow($sanction_strength, $show_other_rank);
		$htmlData .= $deployment->addHtmlRow($vacancies);
		$htmlData .= $deployment->addHtmlRow(null);
		$POSTED_STRENGTH = clone $GRAND_TOTAL;
		$POSTED_STRENGTH->title = 'POSTED STRENGTH';
		$POSTED_STRENGTH->sno = 3;
		$POSTED_STRENGTH->mode = 'posted_strength';

		$htmlData .= $deployment->addHtmlRow($POSTED_STRENGTH);
		$htmlData .= $deployment->addHtmlRow($formalOrdersNotIssued, $show_other_rank);
		$htmlData .= $deployment->addHtmlRow($postedForPayPurpose, $show_other_rank);
		$htmlData .= $deployment->addHtmlRow($notReported, $show_other_rank);
		$htmlData .= $deployment->addHtmlRow($notRelieved, $show_other_rank);
		$htmlData .= $deployment->addHtmlRow($excessAttached, $show_other_rank);
		$htmlData .= $deployment->addHtmlRow($dyingCadrePost, $show_other_rank);

		$this->addPostingRanks($actualPosted, $POSTED_STRENGTH, $deployment);
		$this->substractPostingRanks($actualPosted, $formalOrdersNotIssued, $deployment);
		$this->substractPostingRanks($actualPosted, $postedForPayPurpose, $deployment);
		$this->substractPostingRanks($actualPosted, $notReported, $deployment);
		$this->addPostingRanks($actualPosted, $notRelieved, $deployment);
		//	$this->addPostingRanks($actualPosted,$excessAttached);
		$this->addPostingRanks($actualPosted, $dyingCadrePost, $deployment);

		$htmlData .= $deployment->addHtmlRow($actualPosted, $show_other_rank);
		$htmlData .= $deployment->addHtmlRow(null, $show_other_rank);
		if (null != $this->input->post('downloadExcel')) {
			$variousInductionStrengths = [
				$sanction_strength,
				$vacancies,
				null,
				$POSTED_STRENGTH,
				$formalOrdersNotIssued,
				$postedForPayPurpose,
				$notReported,
				$notRelieved,
				$excessAttached,
				$dyingCadrePost,
				$actualPosted,
				null
			];
			//die('downloading');
			$deployment->downloadViewPostingAsExcel($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $before_date1, $variousInductionStrengths);
		}

		$deployment->htmlViewPosting($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_psting);
		$data['html'] = $htmlData;
		if ($this->session->userdata('user_log') == 100) {
			if (!empty($battalions)) {
				$message = 'Overall Deployment Statement on ' . $before_date1 . ' of ';
				$bats = [];
				foreach ($battalions as $k => $battalion) {
					$bats[] = $this->battalions[$battalion];
				}
				$message .= implode(' ; ', $bats);
			} else {

				$message = 'Overall Deployment Statement on ' . $before_date1 . ' of All Battalions!';
			}
		} else {
			$message = 'Overall Deployment Statement on ' . $before_date1 . ' of ' . $this->battalions[$this->session->userdata('userid')] . '!';
		}
		$data['deployment'] = $deployment;
		$data['message'] = $message;
		if ($this->session->userdata('user_log') == 100) {
			$this->load->view('Postings/igp/view_employees_posting', $data);
		} else {
			$this->load->view('Postings/battalion/view_employees_posting', $data);
		}
	}
	public function downloadViewPostingAsExcel($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions = [], $before_date = null, $variousInductionStrengths = null)
	{
		$this->load->helper('common');
		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
			->setLastModifiedBy("ERMS-PAP")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Posting Consolidate figure of battalion ERMS-PAP.")
			->setKeywords("Posting consolidate, Deployment Statement")
			->setCategory("Posting Consolidate");
		$counti = 0;
		$objPHPExcel->createSheet($counti);
		$objPHPExcel->setActiveSheetIndex($counti);
		//echo 'Deployment Statement ('.$this->session->userdata('nick').')';
		$objPHPExcel->getActiveSheet()->setTitle('Deployment Statement');

		$counter = 0;
		$row = 1;

		$titleStyle = array(
			'font'  => array(
				'size'  => 15,
				'name'  => 'Verdana',
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FF00a0')
				)
				/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
			)
		);
		$unit__ = $this->input->post('unit');

		if (!empty($battalions)) {
			$message = 'Over all Deployment Statement of ';
			$bats = [];
			foreach ($battalions as $k => $battalion) {
				$bats[] = $this->battalions[$battalion];
				//$message .= $this->battalions[$battalion].',';
			}
			$message .= implode(' ; ', $bats);
		} else {
			$message = 'Overall Deployment Statement on ' . $before_date . ' of All Battalions!';
		}
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', $message);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:I1");

		$row++;
		$equipmentNameStyle = array(
			'font'  => array(
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'S. No.');
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, 'Duty Name');
		$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, 'INSPs');
		$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, 'SIs');
		$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'ASIs');
		$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, 'HC');
		$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, 'CTs');
		$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, 'Other Ranks');
		$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, 'Total');
		$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
		$row++;
		$cols = array('C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R');
		$i = 0;
		$grand_total = array();
		$skipZero = false;
		if (isset($_POST['downloadExcel'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}

		$this->excelViewPosting($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row, $variousInductionStrengths);

		//die;
		//			// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="deployment_statement_of' . $this->session->userdata('nick') . '.' . EXCEL_EXTENSION . '"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	public function level_the_posting(&$posting_tree, &$level, &$leveled_postings,  &$all_posting_copy, $finalPostingWithIDasKey)
	{
		//echo $level.' '.$posting_tree->name.'<br>';
		if (isset($finalPostingWithIDasKey[$posting_tree->id])) {
			$posting = $finalPostingWithIDasKey[$posting_tree->id];

			$leveled_postings[$level][] = $finalPostingWithIDasKey[$posting_tree->id];
			$all_posting_copy[$posting_tree->id] = $finalPostingWithIDasKey[$posting_tree->id];
		} else {
			$leveled_postings[$level][] = $all_posting_copy[$posting_tree->id];
		}

		if ($posting_tree->haveChildren == true) {
			foreach ($posting_tree->childrens as $k => $pos) {
				$level++;
				$this->level_the_posting($pos, $level, $leveled_postings, $all_posting_copy, $finalPostingWithIDasKey);
				$level--;
				//$leveled_postings[$level][] = $all_posting_copy[$pos->id];
			}
		} else {
		}
	}

	public function to_string($posting)
	{
		echo '(' . $posting->name . ' ' . $posting->insp . ' ' . $posting->si . ' ' . $posting->asi . ' ' . $posting->hc . ' ' . $posting->ct . ' ' . $posting->otherRank . ' ' . $posting->total . ')<br>';
	}
	/**
			Here we are fetcing the parent posting object from all_posting_copy objects
			by passing the child posting as first object
	 */
	public function getParentPostingOf($posting, &$all_postings_copy)
	{
		foreach ($all_postings_copy as $k => $pos) {
			if ($posting->parent_posting_id == $pos->id) {
				return $pos;
			}
		}
	}
	/**
			Here we are adding the posting1 to parent_posting
	 */
	public function addPostings($parent_posting, $posting_1, $deployment = null)
	{
		if ($deployment != null) {
			foreach ($deployment->getPermanentRankFields() as $k => $field) {
				$parent_posting->{$field} = $parent_posting->{$field} + $posting_1->{$field};
			}
		} else {
			$parent_posting->insp = $parent_posting->insp + $posting_1->insp;
			$parent_posting->si = 	$parent_posting->si + $posting_1->si;
			$parent_posting->asi =	$parent_posting->asi + $posting_1->asi;
			$parent_posting->hc = 	$parent_posting->hc + $posting_1->hc;
			$parent_posting->ct = 	$parent_posting->ct + $posting_1->ct;
		}
		$parent_posting->otherRank = $parent_posting->otherRank + $posting_1->otherRank;
		$parent_posting->total = $parent_posting->total + $posting_1->total;

		return $parent_posting;
	}
	/*
			Here we subtract the posting2 from posting1 and saving the result in result pass by reference
		*/
	public function substractPosting(&$result, $posting1, $posting2, $deployment = null)
	{
		if ($deployment != null) {
			foreach ($deployment->getPermanentRankFields() as $k => $field) {
				$result->{$field} = $posting1->{$field} - $posting2->{$field};
			}
		} else {
			$result->insp = $posting1->insp - $posting2->insp;
			$result->si = $posting1->si - $posting2->si;
			$result->asi = $posting1->asi - $posting2->asi;
			$result->hc = $posting1->hc - $posting2->hc;
			$result->ct = $posting1->ct - $posting2->ct;
		}
		$result->otherRank = $posting1->otherRank - $posting2->otherRank;
		$result->total = $posting1->total - $posting2->total;
	}
	/**
			Here we are adding the post2 to post1;
			results will get reflected in post2 (passed by reference)
	 */
	public function addPostingRanks($post1, $post2, $deployment = null)
	{
		if ($deployment != null) {
			foreach ($deployment->getPermanentRankFields() as $k => $field) {
				$post1->{$field} += $post2->{$field};
			}
		} else {
			$post1->insp += $post2->insp;
			$post1->si += $post2->si;
			$post1->asi += $post2->asi;
			$post1->hc += $post2->hc;
			$post1->ct += $post2->ct;
		}
		$post1->otherRank += $post2->otherRank;
		$post1->total += $post2->total;
	}
	/**
			as objects are passed by reference by default
			so changes will reflect in the original posting post1
			will subtract the post2 from the post1
	 */
	public function substractPostingRanks($post1, $post2, $deployment = null)
	{
		if ($deployment != null) {
			foreach ($deployment->getPermanentRankFields() as $k => $field) {
				$post1->{$field} -= $post2->{$field};
			}
		} else {
			$post1->insp -= $post2->insp;
			$post1->si -= $post2->si;
			$post1->asi -= $post2->asi;
			$post1->hc -= $post2->hc;
			$post1->ct -= $post2->ct;
		}
		$post1->otherRank -= $post2->otherRank;
		$post1->total -= $post2->total;
	}
	/**
			adding html rows to the deployment
			here we are adding the induction mode showing the no of employees in each induction mode
	 */
	public function addHtmlRow($posting, $show_other_rank = false)
	{

		if ($posting == null) {
			if ($show_other_rank) {
				return '<tr class="' . '' . '"><td style="">-' . '</td><td style="text-align:left;">' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td></tr>';
			} else {
				return '<tr class="' . '' . '"><td style="">-' . '</td><td style="text-align:left;">' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td>
			<td>' . '</td></tr>';
			}
		} else {

			if (!in_array($posting->mode, ['sanction_strength', 'vaccancies', 'posted_strength'])) {
				if (((int)$posting->insp) > 0) {
					$indINSP = 'onClick="showInductionModeEmployeesStrength(\'insp\',\'' . $posting->mode . '\',\'' . $posting->title . '\')"';
					$indINSPClass = 'class="showCursor hoverRankFigure"';
				} else {
					$indINSPClass = '';
					$indINSP = '';
				}
				if (((int)$posting->si) > 0) {
					$indSIClass = 'class="showCursor hoverRankFigure"';
					$indSI = 'onClick="showInductionModeEmployeesStrength(\'si\',\'' . $posting->mode . '\',\'' . $posting->title . '\')"';
				} else {
					$indSIClass = '';
					$indSI = '';
				}
				if (((int)$posting->asi) > 0) {
					$indASIClass = 'class="showCursor hoverRankFigure"';
					$indASI = 'onClick="showInductionModeEmployeesStrength(\'asi\',\'' . $posting->mode . '\',\'' . $posting->title . '\')"';
				} else {
					$indASIClass = '';
					$indASI = '';
				}
				if (((int)$posting->hc) > 0) {
					$indHCClass = 'class="showCursor hoverRankFigure"';
					$indHC = 'onClick="showInductionModeEmployeesStrength(\'hc\',\'' . $posting->mode . '\',\'' . $posting->title . '\')"';
				} else {
					$indHCClass = '';
					$indHC = '';
				}
				if (((int)$posting->ct) > 0) {
					$indCTClass = 'class="showCursor hoverRankFigure"';
					$indCT = 'onClick="showInductionModeEmployeesStrength(\'ct\',\'' . $posting->mode . '\',\'' . $posting->title . '\')"';
				} else {
					$indCTClass = '';
					$indCT = '';
				}
				if (((int)$posting->otherRank) > 0) {
					$indOtherRankClass = 'class="showCursor hoverRankFigure"';
					$indOtherRank = 'onClick="showInductionModeEmployeesStrength(\'otherRank\',\'' . $posting->mode . '\',\'' . $posting->title . '\')"';
				} else {
					$indOtherRankClass = '';
					$indOtherRank = '';
				}
				if (((int)$posting->total) > 0) {
					$indTotalClass = 'class="showCursor hoverRankFigure"';
					$indTotal = 'onClick="showInductionModeEmployeesStrength(\'total\',\'' . $posting->mode . '\',\'' . $posting->title . '\')"';
				} else {
					$indTotalClass = '';
					$indTotal = '';
				}
				if ($show_other_rank) {
					return '<tr class="' . '' . '"><td>' . $posting->sno . '</td><td style="text-align:left;">' . $posting->title . '</td>
					<td ' . $indINSPClass . ' ' . $indINSP . '>' . $posting->insp . '</td>
					<td ' . $indSIClass . ' ' . $indSI . '>' . $posting->si . '</td>
					<td ' . $indASIClass . ' ' . $indASI . '>' . $posting->asi . '</td>
					<td ' . $indHCClass . ' ' . $indHC . '>' . $posting->hc . '</td>
					<td ' . $indCTClass . ' ' . $indCT . '>' . $posting->ct . '</td>
					<td ' . $indOtherRankClass . ' ' . $indOtherRank . '>' . $posting->otherRank . '</td>
					<td ' . $indTotalClass . ' ' . $indTotal . '>' . $posting->total . '</td></tr>';
				} else {
					return '<tr class="' . '' . '"><td>' . $posting->sno . '</td><td style="text-align:left;">' . $posting->title . '</td>
					<td ' . $indINSPClass . ' ' . $indINSP . '>' . $posting->insp . '</td>
					<td ' . $indSIClass . ' ' . $indSI . '>' . $posting->si . '</td>
					<td ' . $indASIClass . ' ' . $indASI . '>' . $posting->asi . '</td>
					<td ' . $indHCClass . ' ' . $indHC . '>' . $posting->hc . '</td>
					<td ' . $indCTClass . ' ' . $indCT . '>' . $posting->ct . '</td>
					
					<td ' . $indTotalClass . ' ' . $indTotal . '>' . $posting->total . '</td></tr>';
				}
			} else {
				if ($posting->mode == 'posted_strength') {
					if (((int)$posting->insp) > 0) {
						$indINSP = 'onClick="showEmployees(1,\'insp\')"';
						$indINSPClass = 'class="showCursor hoverRankFigure"';
					} else {
						$indINSPClass = '';
						$indINSP = '';
					}
					if (((int)$posting->si) > 0) {
						$indSIClass = 'class="showCursor hoverRankFigure"';
						$indSI = 'onClick="showEmployees(1,\'si\')"';
					} else {
						$indSIClass = '';
						$indSI = '';
					}
					if (((int)$posting->asi) > 0) {
						$indASIClass = 'class="showCursor hoverRankFigure"';
						$indASI = 'onClick="showEmployees(1,\'asi\')"';
					} else {
						$indASIClass = '';
						$indASI = '';
					}
					if (((int)$posting->hc) > 0) {
						$indHCClass = 'class="showCursor hoverRankFigure"';
						$indHC = 'onClick="showEmployees(1,\'hc\')"';
					} else {
						$indHCClass = '';
						$indHC = '';
					}
					if (((int)$posting->ct) > 0) {
						$indCTClass = 'class="showCursor hoverRankFigure"';
						$indCT = 'onClick="showEmployees(1,\'ct\')"';
					} else {
						$indCTClass = '';
						$indCT = '';
					}
					if (((int)$posting->otherRank) > 0) {
						$indOtherRankClass = 'class="showCursor hoverRankFigure"';
						$indOtherRank = 'onClick="showEmployees(1,\'otherRank\')"';
					} else {
						$indOtherRankClass = '';
						$indOtherRank = '';
					}
					if (((int)$posting->total) > 0) {
						$indTotalClass = 'class="showCursor hoverRankFigure"';
						$indTotal = 'onClick="showEmployees(1,\'total\')"';
					} else {
						$indTotalClass = '';
						$indTotal = '';
					}
					if ($show_other_rank) {
						return '<tr class="' . '' . '"><td>' . $posting->sno . '</td><td style="text-align:left;">' . $posting->title . '</td>
                                                        <td ' . $indINSPClass . ' ' . $indINSP . '>' . $posting->insp . '</td>
                                                        <td ' . $indSIClass . ' ' . $indSI . '>' . $posting->si . '</td>
                                                        <td ' . $indASIClass . ' ' . $indASI . '>' . $posting->asi . '</td>
                                                        <td ' . $indHCClass . ' ' . $indHC . '>' . $posting->hc . '</td>
                                                        <td ' . $indCTClass . ' ' . $indCT . '>' . $posting->ct . '</td>
                                                        <td ' . $indOtherRankClass . ' ' . $indOtherRank . '>' . $posting->otherRank . '</td>
                                                        <td ' . $indTotalClass . ' ' . $indTotal . '>' . $posting->total . '</td></tr>';
					} else {
						return '<tr class="' . '' . '"><td>' . $posting->sno . '</td><td style="text-align:left;">' . $posting->title . '</td>
                                                        <td ' . $indINSPClass . ' ' . $indINSP . '>' . $posting->insp . '</td>
                                                        <td ' . $indSIClass . ' ' . $indSI . '>' . $posting->si . '</td>
                                                        <td ' . $indASIClass . ' ' . $indASI . '>' . $posting->asi . '</td>
                                                        <td ' . $indHCClass . ' ' . $indHC . '>' . $posting->hc . '</td>
                                                        <td ' . $indCTClass . ' ' . $indCT . '>' . $posting->ct . '</td>
                                                        <td ' . $indTotalClass . ' ' . $indTotal . '>' . $posting->total . '</td></tr>';
					}
				} else {
					if ($show_other_rank) {
						return '<tr class="' . '' . '"><td>' . $posting->sno . '</td><td style="text-align:left;">' . $posting->title . '</td>
						<td>' . $posting->insp . '</td>
						<td>' . $posting->si . '</td>
						<td>' . $posting->asi . '</td>
						<td>' . $posting->hc . '</td>
						<td>' . $posting->ct . '</td>
						<td>' . $posting->otherRank . '</td>
						<td>' . $posting->total . '</td></tr>';
					} else {
						return '<tr class="' . '' . '"><td>' . $posting->sno . '</td><td style="text-align:left;">' . $posting->title . '</td>
						<td>' . $posting->insp . '</td>
						<td>' . $posting->si . '</td>
						<td>' . $posting->asi . '</td>
						<td>' . $posting->hc . '</td>
						<td>' . $posting->ct . '</td>
						<td>' . $posting->total . '</td></tr>';
					}
				}
			}
		}
	}
	/***
			Download excel file of employees in induction mode
	 */
	public function downloadInductionModeStrengthList($employees)
	{
		$this->load->library('excel');
		$this->load->helper('common');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
			->setLastModifiedBy("ERMS-PAP")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Account Branch Bill List")
			->setKeywords("Bill List, Account Branch")
			->setCategory("Account Branch");
		$counti = 0;
		$objPHPExcel->createSheet($counti);
		$objPHPExcel->setActiveSheetIndex($counti);
		$objPHPExcel->getActiveSheet()->setTitle('Account Branch Bill List');

		$counter = 0;


		$titleStyle = array(
			'font'  => array(
				'size'  => 15,
				'name'  => 'Verdana',
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FF00a0')
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$centerStyle = array(
			'font' => array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		$equipmentNameStyle = array(
			'font'  => array(
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$equipmentNameStyle2 = array(
			'font'  => array(
				'bold' => true,
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		//$unit__ = $this->input->post('unit');
		$row = 1;

		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'Detail of Employees who are under mode : [ACTUAL POSTED (3-4-5-6+7+8+9)]');
		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:F1");
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$row++;
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A2', date('d/m/Y'));
		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A2:F2");
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($equipmentNameStyle2);
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$cols = array('C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R');

		$row++;
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'S. No.');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, 'Rank');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, 'Name');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, 'Regimental No.');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'Contact No.');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, 'Posting');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, 'Order Number');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, 'Orde Date');


		$cols_temp = ['A', 'B', 'C', 'D', 'E', 'F'];
		foreach ($cols_temp as $k_ => $val_) {
			$objPHPExcel->getActiveSheet()->getStyle($val_ . $row)->applyFromArray($styleArray);
		}
		$row++;

		$sno = 1;
		$users = [];
		if (count($employees) <= 0) {
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'No Records Found');
		} else {
			foreach ($employees as $k => $emp) {
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, trim($emp->rank));
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $emp->username);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $emp->battalion_name . '/' . $emp->depttno);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $emp->phono1);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $emp->pos_name);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $emp->order_no);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, convertDate2($emp->order_date));
				$sno++;
				$row++;
			}
		}

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_start();
		$objWriter->save('php://output');
		$xlsData = ob_get_contents();
		ob_end_clean();
		$response =  array(
			'op' => 'ok',
			'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData)
		);
		die(json_encode($response));
	}
	/**
			Here we are fetching the list of employees by passing the induction mode, and rank
			induction modes are shown at the top of deployment page
	 */
	public function ajaxInductionModeStrengthList()
	{
		$this->load->helper('common');
		$columns = [
			1 => 'rank',
			2 => 'newosi.name',
			3 => 'newosi.depttno',
			4 => 'newosi.phono1',
			5 => 'postings.name'
		];
		$this->load->model('Posting_model');
		$rank = $this->input->post('rank');
		if ($rank == 'total') {
			$ranks = [];
		} else {
			$ranks = [$rank];
		}
		$length = 10;
		$start = 0;
		$orderby = 'newosi.name';
		$order = 'asc';
		if (null != $this->input->post('length') && $this->input->post('length') > 0) {
			$length = $this->input->post('length');
			$start = $this->input->post('start');
		}
		if (null != $this->input->post('order')) {

			$orderby = $columns[$this->input->post('order')[0]['column']];
			$order = $this->input->post('order')[0]['dir'];
		}
		$mode = $this->input->post('mode');
		$modes = [$mode];
		$before_date = $this->input->post('before_date');
		$date_temp = DateTime::createFromFormat('d/m/Y', $before_date);
		$before_date = $date_temp->format('Y-m-d') . ' 23:59:59';
		if (null != $this->input->post('battalions')) {
			if (count($this->input->post('battalions')) == 0) {
				$bat_ids = [];
			} elseif ($this->input->post('battalions') == 'All') {
				$bat_ids = [];
			} else {
				$bat_ids = $this->input->post('battalions');
			}
		} else {
			$bat_id = $this->session->userdata('userid');
			$bat_ids = [$bat_id];
		}
		$searchText = null;
		if (trim($this->input->post('search')['value']) != '') {
			$searchText = $this->input->post('search')['value'];
		}
		$employees_objects = $this->Posting_model->getInductionModeStrengthList($bat_ids, $ranks, $modes, $before_date, $searchText, $length, $start, $orderby, $order);
		if (null != $this->input->post('download')) {
			$this->downloadInductionModeStrengthList($employees_objects);
		}
		///var_dump($employees_objects);
		$employees = [];
		$i = 1;
		$i = $i + $start;
		foreach ($employees_objects as $k => $employee_object) {
			$temp_employees = [];
			$temp_employee['sno'] = $i;
			$temp_employee['rank'] = $employee_object->rank;
			$temp_employee['name'] = $employee_object->username;
			$temp_employee['regimental_no'] = $employee_object->battalion_name . '<span style="color:red;">/</span>' . $employee_object->depttno;
			$temp_employee['contact_no'] = $employee_object->phono1;
			$temp_employee['posting'] = $employee_object->pos_name;
			$temp_employee['order_no'] = $employee_object->order_no;
			$temp_employee['order_date'] = convertDate2($employee_object->order_date);

			$employees[] = $temp_employee;
			$i++;
		}

		//fet
		$output = array(
			"draw"             =>     intval($_POST["draw"]),
			"recordsTotal"     =>    $this->Posting_model->getTotalCountInductionModeStrengthList($bat_ids, $ranks, $modes, $before_date),
			"recordsFiltered"  =>     $this->Posting_model->getTotalFilteredCountInductionModeStrengthList($bat_ids, $ranks, $modes, $before_date, $searchText),
			"data"             =>     $employees,
			"post" => $_POST
		);
		echo json_encode($output);
	}
	public function initialisePostingData($title, $sno, $mode, $deployment = null)
	{
		$posting = new stdClass();
		$posting->title = $title;
		$posting->sno = $sno;

		foreach ($deployment->getPermanentRankFields() as $k => $rank) {
			$posting->{$rank} = 0;
		}
		$posting->otherRank = 0;
		$posting->total = 0;
		$posting->processed = false;
		$posting->mode = $mode;
		return $posting;
	}
	public function process_posting(&$current_posting, $unprocessed_postings, &$finalPostings)
	{

		$postings = $this->getPostingsWhoseParentIdIs($current_posting->id, $unprocessed_postings);
		/* if($current_posting->id==1368){
				var_dump($postings);	
				die('hi');
				
			} */
		if (count($postings) > 0) {
			$current_posting->haveChildren = true;
			foreach ($postings as $k => $posting) {
				$current_posting->childrens[] = $posting;
				$this->process_posting($posting, $unprocessed_postings, $finalPostings);
			}
			$finalPostings[] = $current_posting;
		} else {
			//echo 'hi';
			//var_dump($current_posting);
			$current_posting->childrens = null;
			$current_posting->haveChildren = false;
			$finalPostings[] = $current_posting;
			//var_dump($finalPostings);echo'<hr>';
		}
	}
	public function getPostingsWhoseParentIdIs($posting_id, &$unprocessed_postings)
	{
		$postingsWhoseParentIdIs = array();
		foreach ($unprocessed_postings as $k => $posting) {
			if ($posting->parent_posting_id == $posting_id) {
				unset($unprocessed_postings[$k]);
				$postingsWhoseParentIdIs[] = $posting;
			}
		}
		return $postingsWhoseParentIdIs;
	}

	public function htmlViewPosting(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero, $deployment = null)
	{
		$this->load->helper('common');
		$this->load->library('Employee');
		if ($level == null) {
			$level = 0;
		}
		if ($tree_posting->haveChildren == true) {

			$parent_id = $tree_posting->id;
			$level2++;
			$sno[$level + 2] = 0;
			$level++;

			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}
			$old_posting = $posting = $all_posting_copy[$tree_posting->id];
			if (($posting->total == 0 && $skipZero == true)) {
				// echo 'Posting zeror';
				if (!isset($sno[$level])) {
					//$sno[$level]=1;
				} else {
					//$sno[$level]++;
				}
			} else {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
					//echo 'level increment';
				}
			}
			array_push($totals, $posting);
			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";

			if ($level2 == 2) {
				//$tree_posting_name = '<b><i><u>'.$tree_posting->name.'</u></i>';
				$tree_posting_name = $tree_posting->name . '';
			} else {
				$tree_posting_name = $tree_posting->name;
			}

			if ($posting->id != 1) {
				if ($posting->total != 0) {
					if ($level == 2) {
						$class = 'total_row2';
					} else {
						$class = 'total_row';
					}
				} else {
					if ($skipZero == false) {
						if ($level == 2) {
							$class = 'total_row2';
						} else {
							$class = 'total_row';
						}
					} else {
						$class = '';
					}
				}
				if (!($posting->total == 0 && $skipZero == true)) {
					//echo ''
					$span = $this->getSpan($level);


					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
					} else {
						$zero = $this->getZero($sno, $level);
						$text = $zero . $sno[$level];
					}
					if ($deployment->getShowOtherRank() == true) {
						$htmlData .= '<tr class="' . $class . '"><td>' . $span . $text . '</td><td class="posting_name">'/*.$span*/ . $tree_posting_name . '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					} else {
						$htmlData .= '<tr class="' . $class . '"><td>' . $span . $text . '</td><td class="posting_name">'/*.$span*/ . $tree_posting_name . '</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}
				}
			}

			$previous_child_id = $posting->parent_posting_id;
			$a = 0;
			foreach ($tree_posting->childrens as $k => $child) {
				$this->htmlViewPosting($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $deployment);
			}
			if ($level2 == 2) {
				//$htmlData.='<tr><td>&nbsp;</td><td></td><td> </td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
			} else {
			}
			$text_align = 'right';
			if ($level == 1) {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row1';
			} elseif ($level == 2) {
				//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
				$total_row = '' ./*$span.*/ 'Total of ' . $tree_posting->name . '';
				$class = 'total_row2';
			} else if ($level == 3) {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row3';
			} else if ($level == 4) {
				$total_row = 'Total of ' . $tree_posting->name;
				$class = 'total_row3';
			} else if ($level == 5) {
				$total_row = 'Total of ' . $tree_posting->name;
				$class = 'posting_name';
			} elseif ($level > 5) {
				$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')' . $level;
				$class = 'total_row';
				$text_align = 'left';
			} else {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row';
			}
			if ($posting->total != 0) {
				$span_left = ' class="showCursor hoverRankFigure" onClick="showEmployees(' . $posting->id . ',\'';
				$span_center = '\')">';
				$span_right = '';
				$span = $this->getSpan($level);
				$zero = $this->getZero($sno, $level);
				$htmlData .= '<tr class="' . $class . '"><td>' . '</td><td style="text-align:right;">' . $total_row . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
				if ($deployment->getShowOtherRank() === true) {
					$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
				}
				$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					$span = $this->getSpan($level);
					$zero = $this->getZero($sno, $level);
					if ($deployment->getShowOtherRank() == true) {
						$htmlData .= '<tr class="' . $class . '"><td>' ./* $span.$zero. */ '</td><td style="text-align:right;">' . $total_row . '</td>
                                                    <td>' . $posting->insp . '</td>
                                                    <td>' . $posting->si . '</td>
                                                    <td>' . $posting->asi . '</td>
                                                    <td>' . $posting->hc . '</td>
                                                    <td>' . $posting->ct . '</td>
                                                    <td>' . $posting->otherRank . '</td>
                                                    <td>' . $posting->total . '</td></tr>';
					} else {
						$htmlData .= '<tr class="' . $class . '"><td>' ./* $span.$zero. */ '</td><td style="text-align:right;">' . $total_row . '</td>
                                                    <td>' . $posting->insp . '</td>
                                                    <td>' . $posting->si . '</td>
                                                    <td>' . $posting->asi . '</td>
                                                    <td>' . $posting->hc . '</td>
                                                    <td>' . $posting->ct . '</td>
                                                    <td>' . $posting->total . '</td></tr>';
					}
				}
			}
			$level2--;
		} else {
			$level++;


			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			if (!($posting->total == 0 && $skipZero == true)) {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
				}
			}
			if ($posting->parent_posting_id == $old_posting->parent_posting_id) {
			}
			if ($posting->parent_posting_id != $old_posting->parent_posting_id) {
				//$level2++;
				$old_posting = $posting;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			if ($posting->total > 0) {
				$span = $this->getSpan($level);
				//$zero = $this->getZero($sno,$level);
				if ($level == 3) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToAlphabet($sno[$level]);
				} elseif ($level == 4) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToRoman($sno[$level]);
				} elseif ($level == 5) {
					//$zero = $this->getZero($sno,$level);
					$text = strtolower(convertToRoman($sno[$level]));
				} else {
					$zero = $this->getZero($sno, $level);
					$text = $zero . $sno[$level];
				}

				$htmlData .= '<tr class="single_posting_total"><td>' . $span . $text . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
				if ($deployment->getShowOtherRank() == true) {
					$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
				}
				$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					$span = $this->getSpan($level);
					$zero = $this->getZero($sno, $level);
					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
					} else {
						$zero = $this->getZero($sno, $level);
						$text = $zero . $sno[$level];
					}
					$htmlData .= '<tr class="single_posting_total"><td>' . $span . $text . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
					if ($deployment->getShowOtherRank() == true) {
						$htmlData .= '
                                                    <td>' . $posting->insp . '</td>
                                                    <td>' . $posting->si . '</td>
                                                    <td>' . $posting->asi . '</td>
                                                    <td>' . $posting->hc . '</td>
                                                    <td>' . $posting->ct . '</td>
                                                    <td>' . $posting->otherRank . '</td>
                                                    <td>' . $posting->total . '</td></tr>';
					} else {
						$htmlData .= '
                                                    <td>' . $posting->insp . '</td>
                                                    <td>' . $posting->si . '</td>
                                                    <td>' . $posting->asi . '</td>
                                                    <td>' . $posting->hc . '</td>
                                                    <td>' . $posting->ct . '</td>
                                                    
                                                    <td>' . $posting->total . '</td></tr>';
					}
				}
			}
		}
		//echo $htmlData;
	}
	public function setConsolidatedTableCell($posting, $rankTitle)
	{
		if ($posting->$rankTitle > 0) {
			$hoverRankFigureClass = 'hoverRankFigure';
			$showCursor = 'showCursor';
			$onClick = 'showEmployees(' . $posting->id . ',\'' . $rankTitle . '\')';
			$rank = $rankTitle;
			$td_left = ' class="' . $showCursor . ' ' . $hoverRankFigureClass . '" onClick="' . $onClick . "\">";
		} else {
			$hoverRankFigureClass = '';
			$showCursor = '';
			$td_left = '>';
		}
		$td = '<td' . $td_left . $posting->$rankTitle . '</td>';
		return $td;
	}
	public function excelViewPosting(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero, $objPHPExcel, &$counti, &$cols, &$i, &$row, $variousInductionStrengths = null)
	{
		$this->load->helper('common');
		if ($level == null) {
			$level = 0;
		}
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		if (null != $variousInductionStrengths) {
			foreach ($variousInductionStrengths as $key => $val) {
				if ($val == null) {
					$row++;
				} else {
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $val->sno);
					$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $val->title);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $val->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $val->si);
					$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $val->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $val->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $val->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $val->otherRank);
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $val->total);
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					$row++;
				}
			}
		}
		if ($tree_posting->haveChildren == true) {
			$parent_id = $tree_posting->id;
			$level2++;
			$sno[$level + 2] = 0;
			$level++;


			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}
			$old_posting = $posting = $all_posting_copy[$tree_posting->id];
			if (!($posting->total == 0 && $skipZero == true)) {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
				}
			}

			if ($level2 == 2) {

				$tree_posting_name = '' . $tree_posting->name . '';
			} else {
				$tree_posting_name = $tree_posting->name;
			}
			if ($posting->id != 1) {
				if ($posting->total != 0) {
					$row++;
					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					} else {
						$zero = ''; //$this->getZero($sno,$level);
						$text = $zero . $sno[$level];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
					}

					$styleArray = array(
						'font' => array(
							'bold' => true
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
				} else {
					if ($skipZero == false) {
						$row++;
						if ($level == 3) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToAlphabet($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
						} elseif ($level == 4) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
						} elseif ($level == 5) {
							//$zero = $this->getZero($sno,$level);
							$text = strtolower(convertToRoman($sno[$level]));
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
						} else {
							$zero = ''; //$this->getZero($sno,$level);
							$text = $zero . $sno[$level];
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
						}
						/* $text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting_name); */
						$styleArray = array(
							'font' => array(
								'bold' => true
							)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}
				}
			} else {
				$row--;
			}

			$previous_child_id = $posting->parent_posting_id;
			$a = 0;
			foreach ($tree_posting->childrens as $k => $child) {
				//$row++;
				$this->excelViewPosting($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row);
			}
			//$row++;
			if ($level2 == 2) {
				//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
			} else {
			}
			if ($level == 1) {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row1';
			} elseif ($level == 2) {
				//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
				$total_row = '' ./*$span.*/ 'Total of ' . $tree_posting->name . '';
				$class = 'total_row2';
			} else if ($level == 3) {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row3';
			} else {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row';
			}
			if ($posting->total != 0) {
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
				//make bold
				$styleArray = array(
					'font' => array(
						'bold' => true
					)
				);
				$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
				//align fright
				$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
				$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
				$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
				$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
				$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
				$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
				$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
				$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
				//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
			} else {
				if ($skipZero == false) {
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
					$styleArray = array(
						'font' => array(
							'bold' => true
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
				}
			}
			$level2--;
		} else {
			$level++;
			/*if(!($posting->total==0 && $skipZero==true)){
                                    if(!isset($sno[$level])){
                                            $sno[$level]=1;
                                    }else{
                                            $sno[$level]++;
                                    }
                                }*/
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			if (!($posting->total == 0 && $skipZero == true)) {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
				}
			}
			if ($posting->parent_posting_id == $old_posting->parent_posting_id) {
			}
			if ($posting->parent_posting_id != $old_posting->parent_posting_id) {

				//$level2++;
				$old_posting = $posting;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			if ($posting->total > 0) {
				$row++;
				if ($level == 3) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToAlphabet($sno[$level]);

					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting->name);
				} elseif ($level == 4) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToRoman($sno[$level]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				} elseif ($level == 5) {
					//$zero = $this->getZero($sno,$level);
					$text = strtolower(convertToRoman($sno[$level]));
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				} else {
					$zero = $this->getZero($sno, $level);
					$text = $zero . $sno[$level];
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				}


				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
				//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
			} else {
				if ($skipZero == false) {
					$row++;
					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);

						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting->name);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					} else {
						$zero = $this->getZero($sno, $level);
						$text = $zero . $sno[$level];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					}

					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
				}
			}
		}
		//echo $htmlData;
	}

	public function getPostingFromWhoseIdIs($finalPostings, $tree_posting)
	{
		foreach ($finalPostings as $k => $posting) {
			if ($tree_posting->id == $posting->id) {
				return $posting;
			}
		}
	}
	// -------------- -------------- View of deployment statement END-------------- -------------- -------------- --------------
	/**
	 * 		edit Posting starts
	 */
	public function get_parentPostingId_of_parentPosting()
	{
		$this->load->model('Posting_model');
		$parent_posting_id_id = $this->input->post('parent_post_id');
		$selected_posting_id = $this->input->post('selected_posting_id');
		$selected_posting_parent_id = $this->input->post('selected_posting_parent_id');
		$data = $this->Posting_model->get_parentPostingId_of_parentPosting($parent_posting_id_id);
		if ($data) {
			$data = $this->Posting_model->getSubPostingOf($data[0]->parent_posting_id);
		} else {
			$data = $this->Posting_model->getSubPostingOf(0);
		}
		foreach ($data as $k => $v) {
			if ($this->haveChild($v->id)) { //&& $v->id!=$selected_posting_parent_id){// && $v->id!=$selected_posting_id
				$v->haveChilds = true;
			} else {
				$v->haveChilds = false;
			}
			$v->selected_posting_id = $selected_posting_id;
			$v->selected_posting_parent_id = $selected_posting_parent_id;
		}
		echo json_encode($data);
	}
	public function get_sub_postings_under_parent_posting_id($parent_posting_id)
	{
		/*var_dump($this->input->get());
			var_dump($id);*/
		$this->load->model('Posting_model');
		$id = $this->input->post('id');
		//$id = 1;
		$data = $this->Posting_model->getSubPostingOf($id);
		foreach ($data as $k => $v) {
			if ($this->haveChild($v->id)) {
				$v->haveChilds = true;
			} else {
				$v->haveChilds = false;
			}
		}
		echo json_encode($data);
	}
	//----------------------------------posting management osi module ------------ -------------- ------------- -----------------
	public function getSearchedEmployees()
	{
		$this->load->model("Posting_model");
		//if(null!=$this->input->post('selectedPolicePersonnel'){
		$selectedPolicePersonnelIds = $this->input->post('selectedPolicePersonnelIds');
		//}
		$selectedPolicePersonnelBeltNo = explode(',', $this->input->post('belt_no'));
		$beltno2 = $this->input->post('belt_nos');

		foreach ($selectedPolicePersonnelBeltNo as $k => $v) {
			if (empty($v)) {
				unset($selectedPolicePersonnelBeltNo[$k]);
			}
		}
		$selectedPolicePersonnelPhoneNo = $this->input->post('phone_no');
		$selectedPolicePersonnelEmployeeName = $this->input->post('emp_name');

		$fetch_data = $this->Posting_model->make_datatables_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName, $beltno2);
		//echo $this->db->last_query();
		foreach ($fetch_data as $k => $posting) {
			if ($posting->name != 'Root') {
				//$fetch_data[$k]->parent_name = $this->getParentNameOf($posting,$fetch_data);
			}
		}
		$data = array();
		$counter = 1;
		foreach ($fetch_data as $row) {
			$sub_array = array();
			//$sub_array[] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" />'; 
			$sub_array[] = $counter;
			$sub_array[] = $row->current_rank;
			$sub_array[] = $row->name; //.$selectedPolicePersonnelIds;//.$this->db->last_query();
			$sub_array[] = $row->phono1; //.$_POST['ids'];//.serialize($_POST);  
			$sub_array[] = $row->depttno; //.$this->db->last_query();  
			$sub_array[] = '<a id="addEmployee" class="glyphicon glyphicon-plus addEmployees" style="color:#428bca;text-decoration:none;" onClick="add(' . $row->man_id . ')"></a>';
			$sub_array[] = $row->man_id;
			$sub_array['myName'] = 'dalwinder';
			//$sub_array[] = '<a class="glyphicon glyphicon-plus" style="color:#428bca;text-decoration:none;" onClick="addEmployeeToSelectedEmployees()"></a>';  
			//$sub_array[] = $row->bat_id.' '.$_POST['start'];  
			//$sub_array[] = '<button type="button" name="update" id="'.$row->man_id.'" class="btn btn-warning btn-xs">Update</button>';  
			//$sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';  
			$data[] = $sub_array;
			$counter++;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->Posting_model->get_all_data_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName),
			"recordsFiltered"     =>     $this->Posting_model->get_filtered_data_for_employees($selectedPolicePersonnelIds, $selectedPolicePersonnelBeltNo, $selectedPolicePersonnelPhoneNo, $selectedPolicePersonnelEmployeeName, $beltno2),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}
	public function getThePostings()
	{
		$this->load->model("Posting_model");
		$parent_id = 1;
		$postings = $this->Posting_model->getSubPostings($parent_id); //passwing parent id one i.e. postings whose parent is root
		echo json_encode($postings);
	}
	//------------------------------------------------------------------------------------------
	//----------------------- DELETE POSTING ----------------------------------
	public function deletePosting($posting_id)
	{
		$this->load->model('Posting_model');
		$childrens = $this->Posting_model->getSubPostings($posting_id);
		if (count($childrens) == 0) {
			//get the added employees to this posting
			$employees_count = $this->Posting_model->getNumberOfEmployeesAddedToPosting($posting_id);
			if ($employees_count == 0) {
				if ($this->Posting_model->deletePosting($posting_id)) {
					$this->session->set_flashdata('success_msg', 'Posting Deleted Successfully!!');
				} else {
					$this->session->set_flashdata('error_msg', 'Posting Deletion Failed!!');
				}
				redirect('posting-list');
			} else {
				$this->session->set_flashdata('error_msg', 'Unable to Delete!!. Employees are added under this posting.');
				redirect('posting-list');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Unable to Delete!!. This posting contain child Postings. Delete Child Postings First!!');
			redirect('posting-list');
		}
		//postimg should noat have child
		//only last childrens can be deleted
		//also restrict those childrens to which employees had been already added so first delete the employees
	}
	public function view_deployment_history()
	{
		$this->load->helper('osi');
		$data['battalions'] = osi_getAllBattalions();
		if ($this->session->userdata('user_log') == 100) {
			$this->load->view('Postings/igp/history', $data);
		} else {
			$this->load->view('Postings/history');
		}
	}
	public function getEmployeeListAjax()
	{
		error_reporting(0);
		//$_POST['length'] = 10;
		//$_POST['start'] = 1;
		$this->load->model("Posting_model");
		//get the searched employees list or all employees
		$employees = $this->Posting_model->getEmployees();

		$employees_ids = [];
		foreach ($employees as $k => $employee) {
			$employees_ids[] = $employee->man_id;
		}
		if (count($employees_ids) > 0) {
			$posting_histories = $this->Posting_model->getPositngsHistoryOf($employees_ids);
		} else {
			$posting_histories = [];
		}
		$posting_history_employee_id_data = array();
		$battalion_ids = array();
		$posting_ids = array();
		$additional_posting_ids = array();
		foreach ($posting_histories as $k => $posting) {
			if (!in_array($posting->bat_id, $battalion_ids)) {
				$battalion_ids[] = $posting->bat_id;
			}
			$posting_history_employee_id_data[$posting->employee_id][] = $posting;
			if (!in_array($posting->posting_id, $posting_ids)) {
				$posting_ids[] = $posting->posting_id;
			}
			if ($posting->additional_posting_id != null && !in_array($posting->additional_posting_id, $additional_posting_ids)) {
				$additional_posting_ids[$posting->id] = $posting->additional_posting_id;
			}
		}
		//var_dump($additional_posting_ids);
		$bns = array();
		if (count($battalion_ids) > 0) {
			$bns = $this->Posting_model->getBattalions($battalion_ids);
		}
		$battalions = array();
		foreach ($bns as $k => $bn) {
			$battalions[$bn->users_id] = $bn;
		}
		//$postings_history[$posting_history-employee_id] = array(poting1, posting2, ....)
		//get all the posting ids in $posting_ids array
		$additional_posting_objs = [];
		if (count($posting_ids) > 0) {
			$postings = $this->Posting_model->getPostings2($posting_ids);
			if (count($additional_posting_ids) > 0) {
				$additional_postings = $this->Posting_model->getAdditionalPostingsByIds(array_values($additional_posting_ids));
			}
		} else {
			$postings = [];
		}
		//echo '<hr>';
		///var_dump($postings);
		//echo '<hr>';
		$additioanl_posting_id_value = [];
		if (count($additional_postings) > 0) {
			foreach ($additional_postings as $k => $val) {
				$additioanl_posting_id_value[$val->id] = $val;
			}
		}
		//var_dump($additioanl_posting_id_value);
		//var_dump($additional_posting_ids);
		$postings_id_val = array();
		//get all the selected postings in $posting_ids
		foreach ($postings as $k => $posting) {
			$postings_id_val[$posting->id] = $posting;
		}
		//MAX_POSTING_HISTORY
		//var_dump($postings_id_val);
		//echo '<hr>';
		$data = array();
		$sno = $_POST['start'] + 1;
		//var_dump($_POST);
		foreach ($employees as $k => $employee) {
			$emp = [];
			$emp['sno'] = $sno;
			$emp['battalion'] = $employee->nick;
			$emp['rank'] = $employee->current_rank;
			$emp['name'] = $employee->name;
			$emp['regimental_no'] = $employee->depttno; //.$this->db->last_query();
			//$emp[] = $employee->fathername;
			$history = '';
			//var_dump($posting_history_employee_id_data);
			if (isset($posting_history_employee_id_data) && isset($posting_history_employee_id_data[$employee->man_id]) && (count($posting_history_employee_id_data[$employee->man_id]) > 0)) {
				usort($posting_history_employee_id_data[$employee->man_id], array('Postings', 'compare'));

				$history = '<table>';
				$history .= '<tr><th>S. No.</th><th>Posting Name</th><th>Order No.</th><th>Battalion</th><th>Posting Date</th><th>Order Date</tr>';
				$sno_ = 1;
				foreach ($posting_history_employee_id_data[$employee->man_id] as $k => $pos) {
					//var_dump($pos);
					//echo '<br>';
					$posting_name = $postings_id_val[$pos->posting_id]->name;
					if (isset($additional_posting_ids[$pos->id]) && isset($additioanl_posting_id_value[$additional_posting_ids[$pos->id]])) {
						$temp_data = $additioanl_posting_id_value[$additional_posting_ids[$pos->id]];
						$posting_name .= ' - ' . $temp_data->title . ' (' . $temp_data->type_title . ')';
					}
					if ($postings_id_val[$pos->posting_id]->title != null) {
						$posting_name .= $postings_id_val[$pos->posting_id]->title;
						if ($postings_id_val[$pos->posting_id]->type_title != null) {
							$posting_name .= $postings_id_val[$pos->posting_id]->type_title;
						}
					}
					$history .= '<tr><td>' . $sno_ . '</td><td>' . $posting_name . '</td><td>' . $pos->order_no . '</td><td>' . $battalions[$pos->bat_id]->nick . '</td><td>' . $pos->posting_date . '</td><td>' . $pos->order_date . '</td></tr>';
					if ($sno_ >= self::MAX_POSTING_HISTORY) {
						break;
					}
					$sno_++;
				}
				$history .= '</table>' . '<a class="btn btn-primary" href="deployment-history-employee/' . $employee->man_id . '">Posting History</a>';
			} else {
				$history = 'NOT Posted Yet';
			}
			//$emp[] = $history;
			$emp['history'] = $history;
			$data[] = $emp;

			$sno++;
		}
		//get the post data
		//get datea from database
		//get thte total records
		//get the filtered records
		//$data['post_data'] = json_encode($_POST);
		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getTotalEmployees(),
			"recordsFiltered" => $this->Posting_model->getTotalFilteredEmployees(),
			"data"	=> $data,
			"post" => $_POST,
			//'post' =>$_POST,
		);
		echo json_encode($output);
	}
	public function getEmployeeDeploymentListAjax()
	{
		$this->load->helper('osi');
		$this->load->helper("common");
		$this->load->helper("posting");
		if (true || $this->session->userdata('user_log') == 100) {
			$this->load->model('Posting_model');
			$this->getOsiBattalions();
			$this->getEmployeeDeploymentListAjaxIGP();
		} else {	//osi battalion bat_id
			echo 'hi';
			$this->load->helper('osi');
			$search = '';
			if (null != $this->input->post('search')) {
				$search = $this->input->post('search');
			}
			if (null != $this->input->post('deployment')) {
				$dp = $this->input->post('deployment');
				$deployment = new Deployment($dp);
			} else {
				$deployment = new Deployment();
			}
			$this->load->model("Posting_model");
			$this->getOsiBattalions();
			//get the posting ids in a array
			$bat_id_ = null;
			//var_dump($_POST);
			$all_postings_ = $this->Posting_model->getAllPostingsWithoutSearch2($bat_id_, null, 'order_by_', 'asc'); //single battalion
			$all_postings_ids = [];
			$root_id = 1;
			$all_postings_ids = posting_get_ordered_posting_ids($all_postings_, $root_id);
			//var_dump($all_postings_ids);
			$all_postings_ids_string = implode(',', $all_postings_ids);
			//echo $all_postings_ids_string;
			$selected_posting_id = $this->input->post('posting_id');
			$selected_rank = $this->input->post('rank');
			$deployment->setSelectedRankField($selected_rank);
			//$before_date = $this->input->post('before_date');
			$date1 = $this->input->post('before_date');
			$before_date = null;
			//echo $date1;
			if ($date1 != null) {
				try {
					$date_obj = DateTime::createFromFormat('d/m/Y', $date1);
					$before_date = $date_obj->format('Y-m-d');
				} catch (Exception $e) {
					$before_date = DateTime::createFromFormat('Y-m-d');
				}
			} else {
				$before_date = (new DateTime())->format('Y-m-d');
			}
			//echo $before_date;
			$postings_id_name = array();
			$selected_ids = array($selected_posting_id);
			$result01 = $this->Posting_model->getPostingById($selected_posting_id);
			$postings_id_name[$selected_posting_id] = $result01[0]->name;
			$result = $this->Posting_model->getSubPostings($selected_posting_id);
			//echo $this->db->last_query();	
			//var_dump($result);
			while ($result) {
				$sub_posting_ids = array();
				foreach ($result as $k => $post) {
					$selected_ids[] = $post->id;
					$sub_posting_ids[] = $post->id;
					$postings_id_name[$post->id] = $post->name;
				}
				$result = $this->Posting_model->getSubPostingsOf($sub_posting_ids);
			}
			//echo count($selected_ids);
			//var_dump($selected_ids);
			$bat_id = $this->session->userdata('userid');
			$induction_modes_not_to_be_included = ['Formal Order Not Issued'];

			$permanent_ranks = null;
			if ($deployment->getSelectedRankField() == 'total') {
				$permanent_ranks = $deployment->getPermanentRanks();
			}
			$columns = [
				1 => 'rank',
				2 => 'name',
				'depttno',
				'phono1',
				'posting',
				'order_no',
				'order_date',
				'bat_id',
				'posting_date'
			];
			//var_dump($_POST);
			//
			//var_Dump($this->input->post('columns')[0]['orderable']);
			$order_by = null;
			$order = null;
			if ($this->input->post('order')[0]['column'] != null) {
				$order_by = $columns[$this->input->post('order')[0]['column']];
				$order = $this->input->post('order')[0]['dir'];
			}
			if ($order_by != null && $order_by == 'posting') {
				if ($order == 'desc') {
					$all_postings_ids = array_reverse($all_postings_ids);
					$all_postings_ids_string = implode(',', $all_postings_ids);
				}
			}
			/*if($order_by!=null && $order_by=='bat_id'){
                            if($order=='desc'){
                                $battalion_ids = array_reverse($battalion_ids);
                                $ordered_battalion_ids_strings = implode(',',$battalion_ids);
                            }
                        }*/
			//echo $order_by;
			if ($order_by == null || $order_by == 'rank') {
				if ($order == 'desc') {
					$order_by = $deployment->getOrderByRanks();
					$order = '';
				} else {
					$order_by = $deployment->getOrderByRanks('desc');
					$order =  '';
				}
			}

			$selected_permanent_rank = $deployment->getSelectedRankFromSelectedField();
			//echo $all_postings_ids_string;
			// echo 'daliwnder';
			// echo $all_postings_ids_string;
			//echo '\n<br>';

			//$employees = $this->Posting_model->getEmployeesFromPostingHistory($selected_ids,$selected_rank,$search,$before_date,[$bat_id],$induction_modes_not_to_be_included,$all_postings_ids_string);
			//echo $this->db->last_query();
			$employees = $this->Posting_model->getEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, [$bat_id], $before_date . ' 23:59:59', $all_postings_ids_string = null, $ordered_battalion_ids_strings = null, $deployment->getRankCategory(), $selected_permanent_rank, $permanent_ranks, $order_by, $order);
			//var_dump($employees);

			if (null != $this->input->post('download')) {
				$this->downloadEmployeesListInSelectedPosting($employees, $result01[0]->name, $postings_id_name);
			}
			$totalEmployees = $this->Posting_model->getTotalEmployeesFromPostingHistory($selected_ids, $selected_rank, $search, $before_date);
			$totalFilteredEmployees = $this->Posting_model->getTotalFilteredEmployeesFromPostingHistory($selected_ids, $selected_rank, $search, $before_date);
			$data = array();
			$i = 0;
			$sno = 1;
			if (null != $this->input->post("start")) {
				$i = $this->input->post("start") + 1;
				$sno = $this->input->post("start") + 1;
			} else {
				$i = 0;
				$sno = 1;
			}

			foreach ($employees as $k => $emp) {
				$ranks = get_present_ranks();
				if (in_array($emp->cexrank, $ranks)) { //['INSP','DSP/CR','SI','INSP/LR','INSP/CR', 'ASI','SI/LR','SI/CR','HC','ASI/LR','ASI/CR','ASI/ORP','CT','Sr. Const', 'Sr.Const', 'C-II', 'HC/LR', 'HC/PR', 'HC/CR'])){// if executive
					$data[] = array(
						'sno' => $sno,
						'rank' => trim($emp->cexrank),
						'name' => $emp->name,
						'regimental_no' => $this->battalions[$emp->bat_id] . '/' . $emp->depttno,
						'contact_no' => $emp->phono1,
						'posting' => $postings_id_name[$emp->posting_id],
						'order_no' => $emp->order_no,

						'order_date' => ($emp->order_date != null && !in_array(trim($emp->order_date), ['', '0000-00-00 00:00:00'])) ? DateTime::createFromFormat('Y-m-d H:i:s', $emp->order_date)->format('d-m-Y ') : $emp->order_date,
						'posting_battalion' => $this->battalions[$emp->phbat_id],
						'posting_date' => convertDate2($emp->posting_date)
					);
				} else {
					$data[] = array(
						'sno' => $sno,
						'rank' => trim($emp->rank_),
						'name' => $emp->name,
						'regimental_no' => $this->battalions[$emp->bat_id] . '/' . $emp->depttno,
						'contact_no' => $emp->phono1,
						'posting' => $postings_id_name[$emp->posting_id],
						'order_no' => $emp->order_no,
						'order_date' => ($emp->order_date != null && !in_array(trim($emp->order_date), ['', '0000-00-00 00:00:00'])) ? DateTime::createFromFormat('Y-m-d H:i:s', $emp->order_date)->format('d-m-Y ') : $emp->order_date,
						'posting_battalion' => $this->battalions[$emp->phbat_id],
						'posting_date' => convertDate2($emp->posting_date)
					);
				}
				$i++;
				$sno++;
			}

			$output = array(
				//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $totalEmployees, //$this->Posting_model->getTotalEmployees(),
				"recordsFiltered" => $totalFilteredEmployees, //$this->Posting_model->getTotalFilteredEmployees(),
				"data"	=> $data,
				"posting" => $result01[0]->name,
			);
			echo json_encode($output);
		}
	}
	public function downloadEmployeesListInSelectedPosting($employees, $posting_name, $postings_id_name)
	{
		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
			->setLastModifiedBy("ERMS-PAP")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Account Branch Bill List")
			->setKeywords("Bill List, Account Branch")
			->setCategory("Account Branch");
		$counti = 0;
		$objPHPExcel->createSheet($counti);
		$objPHPExcel->setActiveSheetIndex($counti);
		$objPHPExcel->getActiveSheet()->setTitle('Employees List');

		$counter = 0;


		$titleStyle = array(
			'font'  => array(
				'size'  => 15,
				'name'  => 'Verdana',
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FF00a0')
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$titleStyle2 = array(
			'font'  => array(
				'size'  => 13,
				'name'  => 'Verdana',
				'fill' => array(

					'color' => array('rgb' => 'FF00a0')
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$titleStyle3 = array(
			'font'  => array(
				'size'  => 11,
				'name'  => 'Verdana',
				'fill' => array(
					'color' => array('rgb' => 'FF00a0')
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
				)
			)
		);
		$centerStyle = array(
			'font' => array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		$equipmentNameStyle = array(
			'font'  => array(
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$equipmentNameStyle2 = array(
			'font'  => array(
				'bold' => true,
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		//$unit__ = $this->input->post('unit');
		$row = 1;
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'Detail of Employees in "' . $posting_name . '"');
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($titleStyle2);
		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:J1");
		//$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->applyFromArray($styleArray);
		//$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$row++;
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, date('d/m/Y'));
		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A$row:J$row");
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($titleStyle3);
		//$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$cols = array('C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R');
		$row++;
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'S. No.');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, 'Rank');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, 'Name');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, 'Regimental No.');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'Contact No.');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, 'Posting');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, 'Order Number');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, 'Order Date');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, 'Posted Battalion');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('J' . $row, 'Posting Date');
		$cols_temp = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
		foreach ($cols_temp as $k_ => $val_) {
			$objPHPExcel->getActiveSheet()->getStyle($val_ . $row)->applyFromArray($styleArray);
		}
		$row++;

		$sno = 1;
		$users = [];
		if (count($employees) <= 0) {
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'No Records Found');
		} else {
			foreach ($employees as $k => $emp) {
				$ranks = get_present_ranks();
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno);
				if (in_array($emp->cexrank, $ranks)) {
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, trim($emp->cexrank));
				} else {
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, trim($emp->rank_));
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $emp->name);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $this->battalions[$emp->bat_id] . '/' . $emp->depttno);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $emp->phono1);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $postings_id_name[$emp->posting_id]);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $emp->order_no);
				if ($emp->order_date != '0000-00-00 00:00:00') {
					$__order_date = DateTime::createFromFormat('Y-m-d H:i:s', $emp->order_date)->format('d-m-Y');
				} else {
					$__order_date = '';
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $__order_date);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $this->battalions[$emp->phbat_id]);
				if ($emp->posting_date != '0000-00-00 00:00:00') {
					$__posting_date = DateTime::createFromFormat('Y-m-d H:i:s', $emp->posting_date)->format('d-m-Y');
				} else {
					$__posting_date = '';
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('J' . $row, $__posting_date);
				$sno++;
				$row++;
			}
		}

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_start();
		$objWriter->save('php://output');
		$xlsData = ob_get_contents();
		ob_end_clean();
		$response =  array(
			'op' => 'ok',
			'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData)
		);
		die(json_encode($response));
	}
	public function getEmployeeDeploymentListAjaxIGP()
	{
		///echo 'hi';
		$search = '';
		if (null != $this->input->post('search')) {
			$search = $this->input->post('search');
		}
		//$osi_battalions = $this->getOsiBattalions();
		$osi_battalions = osi_getAllBattalions();
		$bat_id_ = null;
		$date1 = $this->input->post('before_date');
		$before_date = null;
		$before_date_posting = null;
		if ($date1 != null) {
			try {
				$date_obj = DateTime::createFromFormat('d/m/Y', $date1);
				$before_date = $date_obj->format('Y-m-d');
				$before_date_posting = $date_obj->format('Y-m-d H:i:s');
				$before_date1 = $date_obj->format('d/m/Y');
			} catch (Exception $e) {
				$before_date = DateTime::createFromFormat('Y-m-d');
				$before_date_posting = DateTime::createFromFormat('Y-m-d H:i:s');
				$before_date1 = DateTime::createFromFormat('d/m/Y');
			}
		} else {
			$before_date = (new DateTime())->format('Y-m-d');
			$before_date_posting = (new DateTime())->format('Y-m-d H:i:s');
			$before_date1 = (new DateTime())->format('d/m/Y');
		}

		$selected_posting_id = $this->input->post('posting_id');
		$all_postings_ = $this->Posting_model->getAllPostingsWithoutSearch3($bat_id_, null, 'order_by_', 'asc', $before_date_posting, $selected_posting_id); //single battalion

		//echo count($all_postings_);var_dump($all_postings_);
		$all_postings_ids = [];
		$root_id = 1;
		$all_postings_ids = posting_get_ordered_posting_ids($all_postings_, $root_id);
		//var_dump($all_postings_ids);//die;
		//echo count($all_postings_ids);
		//var_dump($all_postings_ids);
		$all_postings_ids_string = implode(',', $all_postings_ids);
		//echo $all_postings_ids_string;
		$this->load->library('Deployment');

		$this->load->model("Posting_model");
		$this->load->helper("common");
		$this->load->helper("osi");
		if (null != $this->input->post('deployment')) {
			$dp = $this->input->post('deployment');
			$deployment = new Deployment($dp);
		} else {
			$deployment = new Deployment();
		}
		$selected_posting_id = $this->input->post('posting_id');
		//var_dump($selected_posting_id);
		$selected_rank = $this->input->post('rank'); // a kind of field in deployment class
		$deployment->setSelectedRankField($selected_rank);
		$postings_id_name = array();
		$selected_ids = array($selected_posting_id);
		$result01 = $this->Posting_model->getPostingById2($selected_posting_id, $before_date_posting);
		//var_dump($result01);
		$postings_id_name[$selected_posting_id] = $result01[0]->name;
		//var_dump($postings_id_name);die;
		$result = $this->Posting_model->getSubPostings2($selected_posting_id, $before_date_posting);
		//echo'<HR>';
		//var_dump($result);
		//echo '<hr>';
		//echo $this->db->last_query();	
		//var_dump($result);
		while ($result) {
			$sub_posting_ids = array();
			foreach ($result as $k => $post) {
				$selected_ids[] = $post->id;
				$sub_posting_ids[] = $post->id;
				$postings_id_name[$post->id] = $post->name;
			}
			$result = $this->Posting_model->getSubPostingsOf2($sub_posting_ids, $before_date_posting);
		}
		//echo count($selected_ids);
		//var_dump($selected_ids);
		//echo '<HR>';
		//var_dump($this->session->userdata('user_log'));

		if ($this->session->userdata('user_log') != 100) {
			//echo 'hi';
			$battalions = [$this->session->userdata('userid') => $this->session->userdata('userid')];
		} else {
			if (null != $this->input->post('battalions')) {
				$battalions = [];
				if (is_array($this->input->post('battalions'))) {
					foreach ($this->input->post('battalions') as $k => $battalion) {
						$battalions[$battalion] = $battalion;
					}
				} else {
					$battalions = [$this->input->post('battalions') => $this->input->post('battalions')];
				}
			} else {
				if (in_array($this->session->userdata('userid'), [209, 210])) { //igp-irb,dig-irb
					$battalions = $data['battalions'] = osi_getIRBBattalions();
				} elseif (in_array($this->session->userdata('userid'), [211, 212])) { //igp-cdo,dig-cdo
					$battalions = $data['battalions'] = osi_getCDOBattalions();
				} else {
					$battalions = $data['battalions'] = osi_getAllBattalions();
				}
				//$battalions = array();
			}
		}
		//var_Dump($battalions);


		$data['before_date'] = $before_date1;
		$induction_modes_not_to_be_included = null;
		$battalions_ = osi_getAllBattalions();
		$battalion_ids = [];
		foreach ($battalions_ as $k => $val) {
			$battalion_ids[] = $k;
		}
		$ordered_battalion_ids_strings = implode(',', $battalion_ids);
		$permanent_ranks = null;
		if ($deployment->getSelectedRankField() == 'total') {
			$permanent_ranks = $deployment->getPermanentRanks();
		}
		//var_Dump($_POST);
		$columns = [
			1 => 'rank',
			2 => 'name',
			'depttno',
			'phono1',
			'posting',
			'order_no',
			'order_date',
			'bat_id',
			'posting_date'
		];
		//var_dump($_POST);
		//
		//var_Dump($this->input->post('columns')[0]['orderable']);
		$order_by = null;
		$order = null;
		if ($this->input->post('order')[0]['column'] != null) {
			$order_by = $columns[$this->input->post('order')[0]['column']];
			$order = $this->input->post('order')[0]['dir'];
		}
		if ($order_by != null && $order_by == 'posting') {
			if ($order == 'desc') {
				$all_postings_ids = array_reverse($all_postings_ids);
				$all_postings_ids_string = implode(',', $all_postings_ids);
			}
		}
		if ($order_by != null && $order_by == 'bat_id') {
			if ($order == 'desc') {
				$battalion_ids = array_reverse($battalion_ids);
				$ordered_battalion_ids_strings = implode(',', $battalion_ids);
			}
		}
		//echo $order_by;
		if ($order_by == null || $order_by == 'rank') {
			if ($order_by == null) {
				$order_by = $deployment->getOrderByRanks();
				$order = '';
			} else
                            if ($order == 'desc') {
				$order_by = $deployment->getOrderByRanks();
				$order = '';
			} else {
				$order_by = $deployment->getOrderByRanks('desc');
				$order =  '';
			}
		}

		$selected_permanent_rank = $deployment->getSelectedRankFromSelectedField();

		$employees = $this->Posting_model->getEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, array_keys($battalions), $before_date . ' 23:59:59', $all_postings_ids_string, $ordered_battalion_ids_strings, $deployment->getRankCategory(), $selected_permanent_rank, $permanent_ranks, $order_by, $order);
		//var_dump($employees);
		if (null != $this->input->post('download')) {
			$this->downloadEmployeesListInSelectedPosting($employees, $result01[0]->name, $postings_id_name);
		}

		$totalEmployees = $this->Posting_model->getTotalEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, array_keys($battalions), $before_date . ' 23:59:59', $deployment->getRankCategory(), $selected_permanent_rank, $permanent_ranks);
		$totalFilteredEmployees = $this->Posting_model->getTotalFilteredEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, array_keys($battalions), $before_date . ' 23:59:59', $deployment->getRankCategory(), $selected_permanent_rank, $permanent_ranks);

		$data = array();
		$i = 0;
		$sno = 1;
		if (null != $this->input->post("start")) {
			$i = $this->input->post("start") + 1;
			$sno = $this->input->post("start") + 1;
		} else {
			$i = 0;
			$sno = 1;
		}
		$additional_posting_ids = [];
		foreach ($employees as $k => $emp) {
			$ranks = get_present_ranks();
			if ($emp->additional_posting_id != null) {
				$additional_posting_ids[$k] = $emp->additional_posting_id;
			}
			if (in_array($emp->cexrank, $ranks)) {
				$data[] = array(
					'sno' => $sno,
					'rank' => trim($emp->cexrank),
					'name' => $emp->name,
					'regimental_no' => $this->battalions[$emp->bat_id] . '/' . $emp->depttno,
					'contact_no' => $emp->phono1,
					'posting' => isset($postings_id_name[$emp->posting_id]) ? $postings_id_name[$emp->posting_id] : 'Posting not found',
					'order_no' => $emp->order_no,
					'order_date' => ($emp->order_date != null && !in_array(trim($emp->order_date), ['', '0000-00-00 00:00:00'])) ? DateTime::createFromFormat('Y-m-d H:i:s', $emp->order_date)->format('d-m-Y ') : '',/*convertDate2($emp->order_date),*/
					'posting_battalion' => $osi_battalions[$emp->phbat_id],
					'posting_date' => convertDate2($emp->posting_date)
				);
			} else {
				$data[] = array(
					'sno' => $sno,
					'rank' => trim($emp->rank_),
					'name' => $emp->name,
					'regimental_no' => $this->battalions[$emp->bat_id] . '/' . $emp->depttno,
					'contact_no' => $emp->phono1,
					'posting' => $postings_id_name[$emp->posting_id],
					'order_no' => $emp->order_no,
					'order_date' => ($emp->order_date != null && !in_array(trim($emp->order_date), ['', '0000-00-00 00:00:00'])) ? DateTime::createFromFormat('Y-m-d H:i:s', $emp->order_date)->format('d-m-Y ') : '',/*convertDate2($emp->order_date),*/
					'posting_battalion' => $osi_battalions[$emp->phbat_id],
					'posting_date' => convertDate2($emp->posting_date)
				);
			}
			$i++;
			$sno++;
		}
		if (count($additional_posting_ids) > 0) {
			$additional_posting_objs = $this->Posting_model->getAdditionalPostingsByIds($additional_posting_ids);
			$additional_posting_id_val = [];
			if (count($additional_posting_objs)) {
				foreach ($additional_posting_objs as $k => $val) {
					$additional_posting_id_val[$val->id] = $val->title . ' (' . $val->type_title . ')';
				}
			}
			foreach ($additional_posting_ids as $k => $val) {
				$data[$k]['posting'] .= $additional_posting_id_val[$val];
			}
		}
		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $totalEmployees, //$this->Posting_model->getTotalEmployees(),
			"recordsFiltered" => $totalFilteredEmployees, //$this->Posting_model->getTotalFilteredEmployees(),
			"data"	=> $data,
			"posting" => $result01[0]->name,
			"order_by" => $order_by
			//'post' =>$_POST,
		);
		echo json_encode($output);
	}
	public function getEmployeeDeploymentListAjaxIGP_backup()
	{
		$this->load->helper('osi');
		//echo 'hi';
		$search = '';
		if (null != $this->input->post('search')) {
			$search = $this->input->post('search');
		}
		//$osi_battalions = $this->getOsiBattalions();
		$osi_battalions =                                osi_getAllBattalions();
		$bat_id_ = null;
		$all_postings_ = $this->Posting_model->getAllPostingsWithoutSearch2($bat_id_, null, 'order_by_', 'asc'); //single battalion
		//echo count($all_postings_);
		$all_postings_ids = [];
		$root_id = 1;
		$all_postings_ids = posting_get_ordered_posting_ids($all_postings_, $root_id);
		//echo count($all_postings_ids);
		//var_dump($all_postings_ids);
		$all_postings_ids_string = implode(',', $all_postings_ids);
		//echo $all_postings_ids_string;
		$this->load->model("Posting_model");
		$this->load->helper("common");
		$this->load->helper("osi");
		$selected_posting_id = $this->input->post('posting_id');
		$selected_rank = $this->input->post('rank');
		$postings_id_name = array();
		$selected_ids = array($selected_posting_id);
		$result01 = $this->Posting_model->getPostingById($selected_posting_id);
		$postings_id_name[$selected_posting_id] = $result01[0]->name;
		$result = $this->Posting_model->getSubPostings($selected_posting_id);
		//echo $this->db->last_query();	
		//var_dump($result);
		while ($result) {
			$sub_posting_ids = array();
			foreach ($result as $k => $post) {
				$selected_ids[] = $post->id;
				$sub_posting_ids[] = $post->id;
				$postings_id_name[$post->id] = $post->name;
			}
			$result = $this->Posting_model->getSubPostingsOf($sub_posting_ids);
		}
		//echo count($selected_ids);
		//var_dump($selected_ids);
		if (null != $this->input->post('battalions')) {
			$battalions = $this->input->post('battalions');
		} else {
			$battalions = array();
		}
		$date1 = $this->input->post('before_date');
		$before_date = null;
		if ($date1 != null) {
			try {
				$date_obj = DateTime::createFromFormat('d/m/Y', $date1);
				$before_date = $date_obj->format('Y-m-d');
				$before_date1 = $date_obj->format('d/m/Y');
			} catch (Exception $e) {
				$before_date = DateTime::createFromFormat('Y-m-d');
				$before_date1 = $date_obj->format('d/m/Y');
			}
		} else {
			$before_date = (new DateTime())->format('Y-m-d');
			$before_date1 = (new DateTime())->format('d/m/Y');
		}

		$data['before_date'] = $before_date1;
		$induction_modes_not_to_be_included = null;
		$battalions_ = osi_getAllBattalions();
		$battalion_ids = [];
		foreach ($battalions_ as $k => $val) {
			$battalion_ids[] = $k;
		}
		$ordered_battalion_ids_strings = implode(',', $battalion_ids);
		$employees = $this->Posting_model->getEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date . ' 23:59:59', $all_postings_ids_string, $ordered_battalion_ids_strings);

		if (null != $this->input->post('download')) {
			$this->downloadEmployeesListInSelectedPosting($employees, $result01[0]->name, $postings_id_name);
		}

		$totalEmployees = $this->Posting_model->getTotalEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date . ' 23:59:59');
		$totalFilteredEmployees = $this->Posting_model->getTotalFilteredEmployeesFromPostingHistoryIGP($selected_ids, $selected_rank, $search, $battalions, $before_date . ' 23:59:59');

		$data = array();
		$i = 0;
		$sno = 1;
		if (null != $this->input->post("start")) {
			$i = $this->input->post("start") + 1;
			$sno = $this->input->post("start") + 1;
		} else {
			$i = 0;
			$sno = 1;
		}

		foreach ($employees as $k => $emp) {
			$ranks = get_present_ranks();
			if (in_array($emp->cexrank, $ranks)) {
				$data[] = array(
					'sno' => $sno,
					'rank' => trim($emp->cexrank),
					'name' => $emp->name,
					'regimental_no' => $this->battalions[$emp->bat_id] . '/' . $emp->depttno,
					'contact_no' => $emp->phono1,
					'posting' => isset($postings_id_name[$emp->posting_id]) ? $postings_id_name[$emp->posting_id] : 'Posting not found',
					'order_no' => $emp->order_no,
					'order_date' => convertDate2($emp->order_date),
					'posting_battalion' => $osi_battalions[$emp->phbat_id],
					'posting_date' => convertDate2($emp->posting_date)
				);
			} else {
				$data[] = array(
					'sno' => $sno,
					'rank' => trim($emp->rank_),
					'name' => $emp->name,
					'regimental_no' => $this->battalions[$emp->bat_id] . '/' . $emp->depttno,
					'contact_no' => $emp->phono1,
					'posting' => $postings_id_name[$emp->posting_id],
					'order_no' => $emp->order_no,
					'order_date' => convertDate2($emp->order_date),
					'posting_battalion' => $osi_battalions[$emp->phbat_id],
					'posting_date' => convertDate2($emp->posting_date)
				);
			}
			$i++;
			$sno++;
		}

		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $totalEmployees, //$this->Posting_model->getTotalEmployees(),
			"recordsFiltered" => $totalFilteredEmployees, //$this->Posting_model->getTotalFilteredEmployees(),
			"data"	=> $data,
			"posting" => $result01[0]->name,
			//'post' =>$_POST,
		);
		echo json_encode($output);
	}
	public static function compare($a, $b)
	{
		if ($a == $b) {
			return 0;
		} else if ($a < $b) {
			return 1;
		} else {
			return -1;
		}
	}
	//------------ ------------ Deployment History of selected employee ------------ ------------
	public function view_deployment_history_of_employee($emp_id)
	{
		$this->load->model('Posting_model');
		//get selected Employee detatil Name, Battalion, regimental no
		$user_info = $this->Posting_model->getTheEmployeeDetail($emp_id);
		if (count($user_info) <= 0) {
			redirect('deployment-history');
		}
		//var_dump($user_info);
		$data['name'] = $user_info[0]->name;
		$data['regimental_no'] = $user_info[0]->depttno;
		$data['battalion'] = $user_info[0]->nick . ' ' . $user_info[0]->nick2;
		//get the data from posting_history
		$employee_history = $this->Posting_model->getEmployeeHistory($emp_id, $this->session->userdata('userid'));
		//var_dump($employee_history);
		//get the name of selected postings
		//get the name of selected battalions
		$data['history'] = $employee_history;
		$this->load->view('Postings/employee_history', $data);
	}
	public function downloadDeploymentHistory()
	{

		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
			->setLastModifiedBy("ERMS-PAP")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Posting Consolidate figure of battalion ERMS-PAP.")
			->setKeywords("Posting consolidate, Deployment Statement")
			->setCategory("Posting Consolidate");
		$counti = 0;
		$objPHPExcel->createSheet($counti);
		$objPHPExcel->setActiveSheetIndex($counti);
		$objPHPExcel->getActiveSheet()->setTitle('Deployment Statement');

		$counter = 0;
		$row = 1;

		$titleStyle = array(
			'font'  => array(
				'size'  => 15,
				'name'  => 'Verdana',
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FF00a0')
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$centerStyle = array(
			'font' => array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$unit__ = $this->input->post('unit');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Deployment History of ' . $this->session->userdata('nick'));
		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);

		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:I1");

		$row++;
		$equipmentNameStyle = array(
			'font'  => array(
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);

		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);

		$cols = array('C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R');
		$i = 0;
		$grand_total = array();
		$skipZero = false;
		if (isset($_POST['downloadExcel'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}
		//--------------------------------------------------------//--------------------------------------------------------
		error_reporting(0);
		//$_POST['length'] = 10;
		//$_POST['start'] = 1;
		$this->load->model("Posting_model");
		//get the searched employees list or all employees
		$employees = $this->Posting_model->getEmployees();


		$employees_ids = [];
		foreach ($employees as $k => $employee) {
			$employees_ids[] = $employee->man_id;
		}
		//echo '<hr>';
		//var_dump($employees_ids);
		//die;
		//$employee_ids = array();
		//get posting history of the selected employee_ids

		if (count($employees_ids) > 0) {
			$posting_histories = $this->Posting_model->getPositngsHistoryOf($employees_ids);
		} else {
			$posting_histories = array();
		}
		//var_dump($posting_histories);
		//echo '<hr>';
		//create array
		$posting_history_employee_id_data = array();
		$battalion_ids = array();
		$posting_ids = array();
		foreach ($posting_histories as $k => $posting) {
			if (!in_array($posting->bat_id, $battalion_ids)) {
				$battalion_ids[] = $posting->bat_id;
			}
			$posting_history_employee_id_data[$posting->employee_id][] = $posting;
			if (!in_array($posting->posting_id, $posting_ids)) {
				$posting_ids[] = $posting->posting_id;
			}
		}
		//echo '<hr>';
		//var_dump($battalion_ids);
		//die;
		//get the battalions
		$bns = array();
		if (count($battalion_ids) > 0) {
			$bns = $this->Posting_model->getBattalions($battalion_ids);
		}
		$battalions = array();
		foreach ($bns as $k => $bn) {
			$battalions[$bn->users_id] = $bn;
		}
		//$postings_history[$posting_history-employee_id] = array(poting1, posting2, ....)
		//get all the posting ids in $posting_ids array
		if (count($posting_ids) > 0) {
			$postings = $this->Posting_model->getPostings($posting_ids);
		} else {
			$postings = [];
		}
		//echo '<hr>';
		///var_dump($postings);
		//echo '<hr>';
		$postings_id_val = array();
		//get all the selected postings in $posting_ids
		foreach ($postings as $k => $posting) {
			$postings_id_val[$posting->id] = $posting;
		}
		//MAX_POSTING_HISTORY
		//var_dump($postings_id_val);
		//echo '<hr>';
		$data = array();
		$sno = $_POST['start'] + 1;
		//var_dump($_POST);

		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'S. No.');
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, 'Rank');
		$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, 'Name');
		$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, 'Regimental Number');
		$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'Postings');
		$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
		$row++;
		if (count($employees) <= 0) {
			$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'No Records Found');
		} else {
			foreach ($employees as $k => $employee) {
				$emp = [];
				$emp['sno'] = $sno;
				$emp['rank'] = $employee->current_rank;
				$emp['name'] = $employee->name;
				$emp['regimental_no'] = $employee->depttno; //.$this->db->last_query();
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno);
				//$objPHPExcel->getActiveSheet()->getStyle('A'.$row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $employee->current_rank);
				//$objPHPExcel->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $employee->name);
				//$objPHPExcel->getActiveSheet()->getStyle('C'.$row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $employee->depttno);
				//$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E'.$row, 'Postings');
				//$objPHPExcel->getActiveSheet()->getStyle('D'.$row)->applyFromArray($styleArray);
				$row++;
				//$emp[] = $employee->fathername;
				$history = '';
				$tableData = array();
				if (isset($posting_history_employee_id_data) && isset($posting_history_employee_id_data[$employee->man_id]) && (count($posting_history_employee_id_data[$employee->man_id]) > 0)) {
					usort($posting_history_employee_id_data[$employee->man_id], array('Postings', 'compare'));

					$history = '<table>';
					$history .= '<tr><th>S. No.</th><th>Posting Name</th><th>Order No.</th><th>Battalion</th><th>Date</th></tr>';
					$row--;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'History');
					$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("E1:I1");
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'S. No.');
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, 'Posting Name');
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, 'Order No.');
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, 'Battalion');
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, 'Date');
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					$row++;

					$sno_ = 1;
					foreach ($posting_history_employee_id_data[$employee->man_id] as $k => $pos) {
						$column = 'A';
						//$row++;
						//var_dump($pos);
						//echo '<br>';
						$history .= '<tr><td>' . $sno_ . '</td><td>' . $postings_id_val[$pos->posting_id]->name . '</td><td>' . $pos->order_no . '</td><td>' . $battalions[$pos->bat_id]->nick . '</td><td>' . $pos->posting_date . '</td></tr>';
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $sno_);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $postings_id_val[$pos->posting_id]->name);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $pos->order_no);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $battalions[$pos->bat_id]->nick);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $pos->posting_date);
						$row++;
						if ($sno_ >= self::MAX_POSTING_HISTORY) {
							break;
						}
						$sno_++;
					}
					$history .= '</table>' . '<a class="btn btn-primary" href="deployment-history-employee/' . $employee->man_id . '">Posting History</a>';
				} else {
					$row--;
					$history = 'NOT Posted Yet';
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'NOT Posted Yet');
					$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("E1:I1");
					$row++;
					//$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);
				}
				//$emp[] = $history;
				$emp['history'] = $history;
				$data[] = $emp;

				$sno++;
			}
		}
		//get the post data
		//get datea from database
		//get thte total records
		//get the filtered records
		//$data['post_data'] = json_encode($_POST);
		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getTotalEmployees(),
			"recordsFiltered" => $this->Posting_model->getTotalFilteredEmployees(),
			"data"	=> $data,
			"post" => $_POST,
			//'post' =>$_POST,
		);
		//echo json_encode($output);
		//--------------------------------------------------------//--------------------------------------------------------


		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		ob_start();
		$objWriter->save('php://output');
		$xlsData = ob_get_contents();
		ob_end_clean();

		$response =  array(
			'op' => 'ok',
			'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData)
		);

		die(json_encode($response));
	}
	/**
			Consolidated deployment report to be viewed in OFFICER login
			using first deployment
	 */
	public function view_employee_posting_consolidateIGP()
	{

		//error_reporting(E_ALL);
		//fetch all the postings from postings table
		define('EMPLOYEE_POSTING_CONSOLIDATE_IGP', 1);
		$data = array();
		$this->load->model('DeploymentReport_model');
		$report_objs = $this->DeploymentReport_model->getDeploymentReport(EMPLOYEE_POSTING_CONSOLIDATE_IGP);
		$report_obj = $report_objs[0];
		$data['report'] = $report_obj;
		$this->load->model('Posting_model');
		$data['battalions'] = $this->getOsiBattalions();
		$order_by = 'order_by_';
		$order = 'asc';
		$all_postings = $this->Posting_model->getAllPostingsWithoutSearch(null, EMPLOYEE_POSTING_CONSOLIDATE_IGP, $order_by, $order);

		//var_dump($all_postings);
		//var_dump($all_postings[0]);
		$skipZero = false;
		if (isset($_POST['submitForm'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}

		$date1 = $this->input->post('before_date');
		$before_date = null;
		$before_date1 = null;
		if ($date1 != null) {
			try {
				$date_obj = DateTime::createFromFormat('d/m/Y', $date1);
				$before_date = $date_obj->format('Y-m-d');
				$before_date1 = $date_obj->format('d/m/Y');
			} catch (Exception $e) {
				$before_date = DateTime::createFromFormat('Y-m-d');
				$before_date1 = $date_obj->format('d/m/Y');
			}
		} else {
			$before_date = (new DateTime())->format('Y-m-d');
			$before_date1 = (new DateTime())->format('d/m/Y');
		}
		$data['before_date'] = $before_date1;
		//echo $before_date1;
		//initialise sanction_strength_posting
		$sanction_strength = $this->initialisePostingData('SANCTION STRENGTH', 1, 'sanction_strength');
		//get the sanction_strength
		$bat_ids = null;
		if ($this->input->post('battalions') != null) {
			$bat_ids = $this->input->post('battalions');
		}
		$sanction_strength_objects = $this->Posting_model->getSanctionStrengthList($bat_ids, $before_date . ' 23:59:59', null, null, null);

		//var_dump($sanction_strength_objects);
		//var_dump($sanction_strength_objects);
		foreach ($sanction_strength_objects as $k => $sanction_strength_object) {
			$sanction_strength->{$sanction_strength_object->variable_name} += $sanction_strength_object->ssstrength;
			$sanction_strength->total += $sanction_strength_object->ssstrength;
		}

		$vacancies = $this->initialisePostingData('VACCANCIES', 2, 'vaccancies');
		$formalOrdersNotIssued = $this->initialisePostingData('FORMAL ORDERS NOT ISSUED', 4, 'Formal Order Not Issued');
		$postedForPayPurpose = $this->initialisePostingData('POSTED FOR PAY PURPOSE', 5, 'Transfer Pay Purpose');
		$notReported = $this->initialisePostingData('NOT REPORTED', 6, 'Not Reported');
		$notRelieved = $this->initialisePostingData('NOT RELIEVED <i>Not Calculated</i>', 7, 'Not Relieved');
		$excessAttached = $this->initialisePostingData('EXCESS ATTACHED <i>Discuss</i>', 8, 'Attachment');
		$dyingCadrePost = $this->initialisePostingData('DYING CADRE POST <i>Not Calculated</i>', 9, 'Dying Cadre Post');
		$actualPosted = $this->initialisePostingData('ACTUAL POSTED (3-4-5-6+7+8+9)', 10, 'Actual Posted');

		foreach ($all_postings as $k => $posting1) {
			$posting1->insp = 0;
			$posting1->si = 0;
			$posting1->asi = 0;
			$posting1->hc = 0;
			$posting1->ct = 0;
			$posting1->otherRank = 0;
			$posting1->total = 0;
			$posting1->processed = false;
			if ($posting1->view != 'EXPANDED') {
				$posting1->view = 'ONE_LINE';
			}
			$all_postings[$k] = $posting1;
			if ($posting1->id == 1367) {
				//var_dump($posting1);
				//die('hi');
			}
		}

		/* foreach($all_postings as $k=>$v){
				$unprocessed_postings[$k] = clone $v;
			} */
		$unprocessed_postings = $all_postings;
		$all_posting_copy = array();
		foreach ($all_postings as $k => $vp) {
			$all_posting_copy[$vp->id] = clone $vp;
		}

		//echo '<pre>';
		$finalPostings = array();
		$posting = 	clone $all_postings[0];
		//var_dumP($posting);
		//echo '<pre>';
		$this->process_posting($posting, $unprocessed_postings, $finalPostings);
		$posting_tree = $data['posting_tree'] = $posting;

		//echo 'all';
		//var_dump($all_postings);
		//die;
		$finalPostingWithIDasKey = array();

		foreach ($finalPostings as $k => $posting1) {
			$finalPostingWithIDasKey[$posting1->id] = $posting1;
		}

		//echo '<hr>';
		//var_dump($finalPostingWithIDasKey);
		if (null != $this->input->post('battalions')) {
			$battalions = $this->input->post('battalions');
		} else {
			$battalions = [];
		}
		$posting_history = $this->Posting_model->getPostingHistoryIGP($battalions, $before_date . ' 23:59:59');
		//var_dump($posting_history);
		$total = 0;
		foreach ($posting_history as $k => $val) {
			$total++;

			//var_dump($val->current_rank);
			if ($val->inductionmode == 'Formal Order Not Issued') {
				$formalOrdersNotIssued->total++;
				$finalPostingWithIDasKey[$val->posting_id]->total++;
			} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
				$postedForPayPurpose->total++;
				$finalPostingWithIDasKey[$val->posting_id]->total++;
			} elseif ($val->inductionmode == 'Not Reported') {
				$notReported->total++;
				$finalPostingWithIDasKey[$val->posting_id]->total++;
			} elseif ($val->inductionmode == 'Attachment') {
				$excessAttached->total++;
				$finalPostingWithIDasKey[$val->posting_id]->total++;
			} else {
				$finalPostingWithIDasKey[$val->posting_id]->total++;
			}
			switch (trim($val->current_rank)) {
				case 'INSP':
				case 'DSP/CR':


					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->insp++;
						$finalPostingWithIDasKey[$val->posting_id]->insp++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->insp++;
						$finalPostingWithIDasKey[$val->posting_id]->insp++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->insp++;
						$finalPostingWithIDasKey[$val->posting_id]->insp++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->insp++;
						$finalPostingWithIDasKey[$val->posting_id]->insp++;
					} else {
						$finalPostingWithIDasKey[$val->posting_id]->insp++;
					}
					break;
				case 'SI':
				case 'INSP/LR':
				case 'INSP/CR':

					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->si++;
						$finalPostingWithIDasKey[$val->posting_id]->si++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->si++;
						$finalPostingWithIDasKey[$val->posting_id]->si++;
					} elseif ($val->inductionmode == 'Not Reported') {

						$finalPostingWithIDasKey[$val->posting_id]->si++;
						$notReported->si++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->si++;
						$finalPostingWithIDasKey[$val->posting_id]->si++;
					} else {
						$finalPostingWithIDasKey[$val->posting_id]->si++;
					}
					break;
				case 'ASI':
				case 'SI/LR':
				case 'SI/CR':

					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->asi++;
						$finalPostingWithIDasKey[$val->posting_id]->asi++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->asi++;
						$finalPostingWithIDasKey[$val->posting_id]->asi++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->asi++;
						$finalPostingWithIDasKey[$val->posting_id]->asi++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->asi++;
						$finalPostingWithIDasKey[$val->posting_id]->asi++;
					} else {
						$finalPostingWithIDasKey[$val->posting_id]->asi++;
					}
					break;
				case 'HC':
				case 'ASI/LR':
				case 'ASI/CR':
				case 'ASI/ORP':

					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->hc++;
						$finalPostingWithIDasKey[$val->posting_id]->hc++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->hc++;
						$finalPostingWithIDasKey[$val->posting_id]->hc++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->hc++;
						$finalPostingWithIDasKey[$val->posting_id]->hc++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->hc++;
						$finalPostingWithIDasKey[$val->posting_id]->hc++;
					} else {
						$finalPostingWithIDasKey[$val->posting_id]->hc++;
					}
					break;
				case 'CT':
				case 'Sr. Const':
				case 'Sr.Const':
				case 'C-II':
				case 'HC/LR':
				case 'HC/PR':
				case 'HC/CR':

					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->ct++;
						$finalPostingWithIDasKey[$val->posting_id]->ct++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->ct++;
						$finalPostingWithIDasKey[$val->posting_id]->ct++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->ct++;
						$finalPostingWithIDasKey[$val->posting_id]->ct++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->ct++;
						$finalPostingWithIDasKey[$val->posting_id]->ct++;
					} else {
						$finalPostingWithIDasKey[$val->posting_id]->ct++;
					}
					break;
				default:


					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->otherRank++;
						$finalPostingWithIDasKey[$val->posting_id]->otherRank++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->otherRank++;
						$finalPostingWithIDasKey[$val->posting_id]->otherRank++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->otherRank++;
						$finalPostingWithIDasKey[$val->posting_id]->otherRank++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->otherRank++;
						$finalPostingWithIDasKey[$val->posting_id]->otherRank++;
					} else {
						$finalPostingWithIDasKey[$val->posting_id]->otherRank++;
					}
					break;
			}
		}

		//echo '<pre>';
		//var_dump($finalPostingWithIDasKey);
		//die;
		$leveled_postings = array();
		$level = 0;
		$this->level_the_posting($posting_tree, $level, $leveled_postings, $all_posting_copy, $finalPostingWithIDasKey);
		//echo '<pre>';
		//echo count($leveled_postings);
		$max_level = count($leveled_postings);

		for ($i = ($max_level - 1); $i >= 0; $i--) {
			foreach ($leveled_postings[$i] as $k => $post) {
				if ($post->parent_posting_id != 0) {
					$parent_posting = $all_posting_copy[$post->parent_posting_id];
					// var_dump($parent_posting);
					$parent_posting = $this->addPostings($parent_posting, $post);
					// var_dump($parent_posting);
				}
			}
		}
		//echo ' hi ';
		//var_dump($leveled_postings);
		$all_postings1 = array();
		foreach ($leveled_postings as $k => $post) {
			if (is_array($post)) {
				foreach ($post as $j => $v) {
					$v->level = $k;
					$all_postings1[$v->id] = $v;
					//echo '['.$k.']['.$j.']'.$v->name.' '.$v->insp.' '.$v->si.' '.$v->asi.' '.$v->hc.' '.$v->ct.' '.$v->otherRank.' '.$v->total.' ID'.$v->id.', Parent ID'.$v->parent_posting_id.'<br>';
				}
			}
		}

		ksort($all_postings1);

		//var_dump($leveled_postings);
		//var_dump($all_postings1);
		//die;	
		//die;
		//echo $total;
		$removed_postings = [];
		//die;
		//	 die;
		$counter = 0;

		$htmlData = '';
		$htmlgroup = '';
		$level = 0;
		$level2 = 0;
		$sno = array();
		$sno[$level] = 1;
		$total_row = '';
		$previous_child_id = 0;
		$new_child_id = 0;
		$parent_id = 0;
		$old_posting = $all_posting_copy[1];
		$totals = array();	//here we will push the postings who have childrens
		//var_dump($final_posting_copy);
		//var_dump($posting);
		//$this->htmlViewPosting($htmlData,$all_posting_copy[2],$finalPostings,$sno,$level);
		//var_dump($this->input->post('downloadExcel'));
		//var_dump($all_postings1);
		//echo count($all_postings1);
		$GRAND_TOTAL = $this->getPostingsWhoseParentIdIs(0, $all_postings1)[0];
		//echo 'hi';
		//var_dump($this->getPostingsWhoseParentIdIs(0,$all_postings1));
		//var_dump($GRAND_TOTAL);
		$GRAND_TOTAL->sno = 2;
		$this->substractPosting($vacancies, $sanction_strength, $GRAND_TOTAL);
		$htmlData .= $this->addHtmlRow($sanction_strength);
		$htmlData .= $this->addHtmlRow($vacancies);
		$htmlData .= $this->addHtmlRow(null);
		$POSTED_STRENGTH = clone $GRAND_TOTAL;
		//echo $finalPostingWithIDasKey[1512]->otherRank;

		$POSTED_STRENGTH->title = 'POSTED STRENGTH';
		$POSTED_STRENGTH->sno = 3;
		$POSTED_STRENGTH->mode = 'posted_strength';
		$htmlData .= $this->addHtmlRow($POSTED_STRENGTH);
		$htmlData .= $this->addHtmlRow($formalOrdersNotIssued);
		$htmlData .= $this->addHtmlRow($postedForPayPurpose);
		$htmlData .= $this->addHtmlRow($notReported);
		$htmlData .= $this->addHtmlRow($notRelieved);
		$htmlData .= $this->addHtmlRow($excessAttached);
		$htmlData .= $this->addHtmlRow($dyingCadrePost);

		$this->addPostingRanks($actualPosted, $POSTED_STRENGTH);
		$this->substractPostingRanks($actualPosted, $formalOrdersNotIssued);
		$this->substractPostingRanks($actualPosted, $postedForPayPurpose);
		$this->substractPostingRanks($actualPosted, $notReported);
		$this->addPostingRanks($actualPosted, $notRelieved);
		//	$this->addPostingRanks($actualPosted,$excessAttached);
		$this->addPostingRanks($actualPosted, $dyingCadrePost);

		$htmlData .= $this->addHtmlRow($actualPosted);
		$htmlData .= $this->addHtmlRow(null);
		if (!empty($battalions)) {
			$message = $report_obj->title . ' of ';

			$bats = [];
			foreach ($battalions as $k => $battalion) {
				$bats[] = $this->battalions[$battalion];
			}
			$message .= implode(' ; ', $bats);
			$message .= ' on ' . $before_date1;
		} else {
			$message = $report_obj->title . ' of All Battalions on ' . $before_date1;
		}

		if (null != $this->input->post('downloadExcel')) {
			$variousInductionStrengths = [
				$sanction_strength,
				$vacancies,
				null,
				$POSTED_STRENGTH,
				$formalOrdersNotIssued,
				$postedForPayPurpose,
				$notReported,
				$notRelieved,
				$excessAttached,
				$dyingCadrePost,
				$actualPosted,
				null
			]; //to be added at the top of excel sheet
			$this->downloadViewPostingConsolidateAsExcelIGP($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey, $report_obj, $message, $variousInductionStrengths);
			//die('downloading');
		}

		$this->htmlViewPostingConsolidateIGP($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey);
		$data['html'] = $htmlData;

		$data['message'] = $message;
		$this->load->view('Postings/igp/view_employees_posting_consolidate', $data);
	}
	/**
			Consolidated deployment report to be viewed in battalion login
			using first deployment
	 */
	public function view_employee_posting_consolidateBATTALION()
	{

		//error_reporting(E_ALL);
		//fetch all the postings from postings table
		define('EMPLOYEE_POSTING_CONSOLIDATE_IGP', 3);
		$data = array();
		$this->load->model('DeploymentReport_model');
		$report_objs = $this->DeploymentReport_model->getDeploymentReport(EMPLOYEE_POSTING_CONSOLIDATE_IGP);
		$report_obj = $report_objs[0];
		$data['report'] = $report_obj;
		$this->load->model('Posting_model');
		//$data['battalions'] = $this->getOsiBattalions();
		$bat_id = $this->session->userdata('userid');
		$order_by_ = 'order_by_';
		$order = 'asc';
		$all_postings = $this->Posting_model->getAllPostingsWithoutSearch($bat_id, EMPLOYEE_POSTING_CONSOLIDATE_IGP, $order_by_, $order);
		//echo count($all_postings);
		//var_dump($all_postings);
		//var_dump($all_postings[0]);
		$skipZero = false;
		if (isset($_POST['submitForm'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}

		$date1 = $this->input->post('before_date');
		$before_date = null;
		if ($date1 != null) {
			try {
				$date_obj = DateTime::createFromFormat('d/m/Y', $date1);
				$before_date = $date_obj->format('Y-m-d');
				$before_date1 = $date_obj->format('d/m/Y');
			} catch (Exception $e) {
				$before_date = DateTime::createFromFormat('Y-m-d');
				$before_date1 = $date_obj->format('d/m/Y');
			}
		} else {
			$before_date = (new DateTime())->format('Y-m-d');
			$before_date1 = (new DateTime())->format('d/m/Y');
		}
		$data['before_date'] = $before_date1;

		//initialise sanction_strength_posting
		$sanction_strength = $this->initialisePostingData('SANCTION STRENGTH', 1, 'sanction_strength');
		//get the sanction_strength
		$sanction_strength_objects = $this->Posting_model->getSanctionStrengthList([$bat_id], $before_date . ' 23:59:59', null, null, null);
		//var_dump($sanction_strength_objects);
		foreach ($sanction_strength_objects as $k => $sanction_strength_object) {
			$sanction_strength->{$sanction_strength_object->variable_name} = $sanction_strength_object->ssstrength;
			$sanction_strength->total += $sanction_strength_object->ssstrength;
		}
		//end sanction strength

		$vacancies = $this->initialisePostingData('VACCANCIES', 2, 'vaccancies');
		$formalOrdersNotIssued = $this->initialisePostingData('FORMAL ORDERS NOT ISSUED', 4, 'Formal Order Not Issued');
		$postedForPayPurpose = $this->initialisePostingData('POSTED FOR PAY PURPOSE', 5, 'Transfer Pay Purpose');
		$notReported = $this->initialisePostingData('NOT REPORTED', 6, 'Not Reported');
		$notRelieved = $this->initialisePostingData('NOT RELIEVED <i>Not Calculated</i>', 7, 'Not Relieved');
		$excessAttached = $this->initialisePostingData('EXCESS ATTACHED <i>Discuss</i>', 8, 'Attachment');
		$dyingCadrePost = $this->initialisePostingData('DYING CADRE POST <i>Not Calculated</i>', 9, 'Dying Cadre Post');
		$actualPosted = $this->initialisePostingData('ACTUAL POSTED (3-4-5-6+7+8+9)', 10, 'Actual Posted');

		foreach ($all_postings as $k => $posting1) {
			$posting1->insp = 0;
			$posting1->si = 0;
			$posting1->asi = 0;
			$posting1->hc = 0;
			$posting1->ct = 0;
			$posting1->otherRank = 0;
			$posting1->total = 0;
			$posting1->processed = false;
			if ($posting1->view != 'EXPANDED') {
				$posting1->view = 'ONE_LINE';
			}
			$all_postings[$k] = $posting1;
			if ($posting1->id == 1367) {
				//var_dump($posting1);
				//die('hi');
			}
		}

		/* foreach($all_postings as $k=>$v){
				$unprocessed_postings[$k] = clone $v;
			} */
		$unprocessed_postings = $all_postings;
		$all_posting_copy = array();
		foreach ($all_postings as $k => $vp) {
			$all_posting_copy[$vp->id] = clone $vp;
		}

		//echo '<pre>';
		$finalPostings = array();
		$posting = 	clone $all_postings[0];
		//var_dumP($posting);
		//echo '<pre>';
		$this->process_posting($posting, $unprocessed_postings, $finalPostings);
		$posting_tree = $data['posting_tree'] = $posting;

		//echo 'all';
		//var_dump($all_postings);
		//die;
		$finalPostingWithIDasKey = array();

		foreach ($finalPostings as $k => $posting1) {
			$finalPostingWithIDasKey[$posting1->id] = $posting1;
		}

		//echo '<hr>';
		//var_dump($finalPostingWithIDasKey);
		if (null != $this->input->post('battalions')) {
			$battalions = $this->input->post('battalions');
		} else {
			$battalions = [];
		}
		$posting_history = $this->Posting_model->getPostingHistory($before_date . ' 23:59:59', [$bat_id]);
		//echo count($posting_history);
		//var_dump($posting_history);
		$total = 0;
		foreach ($posting_history as $k => $val) {
			$total++;
			$finalPostingWithIDasKey[$val->posting_id]->total++;
			//var_dump($val->current_rank);
			if ($val->inductionmode == 'Formal Order Not Issued') {
				$formalOrdersNotIssued->total++;
			} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
				$postedForPayPurpose->total++;
			} elseif ($val->inductionmode == 'Not Reported') {
				$notReported->total++;
			} elseif ($val->inductionmode == 'Attachment') {
				$excessAttached->total++;
			}
			switch (trim($val->current_rank)) {
				case 'INSP':
				case 'DSP/CR':
					$finalPostingWithIDasKey[$val->posting_id]->insp++;
					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->insp++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->insp++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->insp++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->insp++;
					}
					break;
				case 'SI':
				case 'INSP/LR':
				case 'INSP/CR':
					$finalPostingWithIDasKey[$val->posting_id]->si++;
					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->si++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->si++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->si++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->si++;
					}
					break;
				case 'ASI':
				case 'SI/LR':
				case 'SI/CR':
					$finalPostingWithIDasKey[$val->posting_id]->asi++;
					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->asi++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->asi++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->asi++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->asi++;
					}
					break;
				case 'HC':
				case 'ASI/LR':
				case 'ASI/CR':
				case 'ASI/ORP':
					$finalPostingWithIDasKey[$val->posting_id]->hc++;
					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->hc++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->hc++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->hc++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->hc++;
					}
					break;
				case 'CT':
				case 'Sr. Const':
				case 'Sr.Const':
				case 'C-II':
				case 'HC/LR':
				case 'HC/PR':
				case 'HC/CR':
					$finalPostingWithIDasKey[$val->posting_id]->ct++;
					if ($val->inductionmode == 'Formal Order Not Issued') {
						$formalOrdersNotIssued->ct++;
					} elseif ($val->inductionmode == 'Transfer Pay Purpose') {
						$postedForPayPurpose->ct++;
					} elseif ($val->inductionmode == 'Not Reported') {
						$notReported->ct++;
					} elseif ($val->inductionmode == 'Attachment') {
						$excessAttached->ct++;
					}
					break;
				default:
					$finalPostingWithIDasKey[$val->posting_id]->otherRank++;
					break;
			}
		}
		//echo '<pre>';
		//var_dump($finalPostingWithIDasKey);
		//die;
		$leveled_postings = array();
		$level = 0;
		$this->level_the_posting($posting_tree, $level, $leveled_postings, $all_posting_copy, $finalPostingWithIDasKey);
		//echo '<pre>';
		//echo count($leveled_postings);
		$max_level = count($leveled_postings);

		for ($i = ($max_level - 1); $i >= 0; $i--) {
			foreach ($leveled_postings[$i] as $k => $post) {
				if ($post->parent_posting_id != 0) {
					$parent_posting = $all_posting_copy[$post->parent_posting_id];
					$parent_posting = $this->addPostings($parent_posting, $post);
				}
			}
		}
		//echo ' hi ';
		//var_dump($leveled_postings);
		$all_postings1 = array();
		foreach ($leveled_postings as $k => $post) {
			if (is_array($post)) {
				foreach ($post as $j => $v) {
					$v->level = $k;
					$all_postings1[$v->id] = $v;
					//echo '['.$k.']['.$j.']'.$v->name.' '.$v->insp.' '.$v->si.' '.$v->asi.' '.$v->hc.' '.$v->ct.' '.$v->otherRank.' '.$v->total.' ID'.$v->id.', Parent ID'.$v->parent_posting_id.'<br>';
				}
			}
		}

		ksort($all_postings1);

		//var_dump($leveled_postings);
		//var_dump($all_postings1);
		//die;	
		//die;
		//echo $total;
		$removed_postings = [];
		//die;
		//	 die;
		$counter = 0;

		$htmlData = '';
		$htmlData .= $this->addHtmlRow($sanction_strength);
		$htmlgroup = '';
		$level = 0;
		$level2 = 0;
		$sno = array();
		$sno[$level] = 1;
		$total_row = '';
		$previous_child_id = 0;
		$new_child_id = 0;
		$parent_id = 0;
		$old_posting = $all_posting_copy[1];
		$totals = array();	//here we will push the postings who have childrens
		//var_dump($final_posting_copy);
		//var_dump($posting);
		//$this->htmlViewPosting($htmlData,$all_posting_copy[2],$finalPostings,$sno,$level);
		//var_dump($this->input->post('downloadExcel'));
		$GRAND_TOTAL = $this->getPostingsWhoseParentIdIs(0, $all_postings1)[0];
		$GRAND_TOTAL->sno = 2;
		//Calculating vancies
		$this->substractPosting($vacancies, $sanction_strength, $GRAND_TOTAL);
		$htmlData .= $this->addHtmlRow($vacancies);
		$htmlData .= $this->addHtmlRow(null);
		$POSTED_STRENGTH = clone $GRAND_TOTAL;
		$POSTED_STRENGTH->title = 'POSTED STRENGTH';
		$POSTED_STRENGTH->sno = 3;
		$POSTED_STRENGTH->mode = 'posted_strength';
		$htmlData .= $this->addHtmlRow($POSTED_STRENGTH);
		$htmlData .= $this->addHtmlRow($formalOrdersNotIssued);
		$htmlData .= $this->addHtmlRow($postedForPayPurpose);
		$htmlData .= $this->addHtmlRow($notReported);
		$htmlData .= $this->addHtmlRow($notRelieved);
		$htmlData .= $this->addHtmlRow($excessAttached);
		$htmlData .= $this->addHtmlRow($dyingCadrePost);

		$this->addPostingRanks($actualPosted, $POSTED_STRENGTH);
		$this->substractPostingRanks($actualPosted, $formalOrdersNotIssued);
		$this->substractPostingRanks($actualPosted, $postedForPayPurpose);
		$this->substractPostingRanks($actualPosted, $notReported);
		$this->addPostingRanks($actualPosted, $notRelieved);
		$this->addPostingRanks($actualPosted, $excessAttached);
		$this->addPostingRanks($actualPosted, $dyingCadrePost);

		$htmlData .= $this->addHtmlRow($actualPosted);
		$htmlData .= $this->addHtmlRow(null);
		if (null != $this->input->post('downloadExcel')) {
			$variousInductionStrengths = [
				$sanction_strength,
				$vacancies,
				null,
				$POSTED_STRENGTH,
				$formalOrdersNotIssued,
				$postedForPayPurpose,
				$notReported,
				$notRelieved,
				$excessAttached,
				$dyingCadrePost,
				$actualPosted,
				null
			]; //to be added at the top of excel sheet
			$this->downloadViewPostingConsolidateAsExcelBATTALION($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey, $report_obj, $before_date, $variousInductionStrengths);
			//die('downloading');
		}
		//htmlViewPostingConsolidateForBattalion	old
		$this->htmlViewPostingConsolidateForBATTALION2($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey);
		$data['html'] = $htmlData;
		if (!empty($battalions)) {
			$message = 'Consolidated Deployment Statement of ';
			foreach ($battalions as $k => $battalion) {
				$message .= $this->battalions[$battalion] . ', ';
			}
		} else {
			$message = 'Consolidated Deployment Statement';
		}
		$data['message'] = $message;
		$this->load->view('Postings/view_employees_posting_consolidate', $data);
	}
	public function view_employee_posting_consolidate()
	{
		if ($this->session->userdata('user_log') == 100) {
			$this->view_employee_posting_consolidateIGP();
		} else {
			$this->view_employee_posting_consolidateBATTALION();
		}
	}
	public function htmlViewPostingConsolidate(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero)
	{
		if ($level == null) {
			$level = 0;
		}
		$max_posting_level = 4;
		//die('ljk');
		if ($tree_posting->haveChildren == true) {
			$parent_id = $tree_posting->id;
			//if($tree_posting->parent_posting_id!=$old_posting->parent_posting_id){
			$level2++;
			//}else{

			//}
			$sno[$level + 2] = 0;
			$level++;

			if (!isset($sno[$level])) {
				$sno[$level] = 1;
			} else {
				$sno[$level]++;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}
			$old_posting = $posting = $all_posting_copy[$tree_posting->id];
			array_push($totals, $posting);
			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";

			if ($level2 == 2) {
				//$tree_posting_name = '<b><i><u>'.$tree_posting->name.'</u></i>';
				$tree_posting_name = '' . $tree_posting->name . '';
			} else {
				$tree_posting_name = $tree_posting->name;
			}
			//var_dump($posting);
			if ($posting->id != 1) {
				if ($posting->total != 0) {
					if ($level == 2) {
						$class = 'total_row2';
					} else {
						$class = 'total_row';
					}
				} else {
					if ($skipZero == false) {
						if ($level == 2) {
							$class = 'total_row2';
						} else {
							$class = 'total_row';
						}
					} else {
						$class = '';
					}
				}
				if ($level > 3) {
				} else {
					if (!($posting->total == 0 && $skipZero == true)) {
						$htmlData .= '<tr class="' . $class . '"><td></td><td class="posting_name">'/*.$span*/ . $tree_posting_name . '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}
				}
			}

			$previous_child_id = $posting->parent_posting_id;
			$a = 0;
			foreach ($tree_posting->childrens as $k => $child) {
				if ($level < 4) {
					$this->htmlViewPostingConsolidate($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero);
				}
			}
			if ($level2 == 2) {
				//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
			} else {
			}
			$text_align = 'right';
			if ($level == 1) {
				$total_row = /*$span.*/ 'Grand Total(ALL)'; //.$tree_posting->name;
				$class = 'total_row1';
			} elseif ($level == 2) {
				//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
				$total_row = '' ./*$span.*/ 'Grand Total (' . $tree_posting->name . ')'; //.$tree_posting->name.'';
				$class = 'total_row2';
			} else if ($level == 3) {
				$total_row = /*$span.*/ 'Total'; //.$tree_posting->name;
				$class = 'total_row3';
			} elseif ($level > 3) {
				$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')';
				$class = 'total_row';
				$text_align = 'left';
			} else {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row';
			}
			if ($posting->total != 0) {
				//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:'.$text_align.';">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
				$span_left = ' class="showCursor hoverRankFigure" onClick="showEmployees(' . $posting->id . ',\'';
				$span_center = '\')">';
				$span_right = '';

				$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:'.$text_align.';">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
					$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>
						<td>' . $posting->insp . '</td>
						<td>' . $posting->si . '</td>
						<td>' . $posting->asi . '</td>
						<td>' . $posting->hc . '</td>
						<td>' . $posting->ct . '</td>
						<td>' . $posting->otherRank . '</td>
						<td>' . $posting->total . '</td></tr>';
				}
			}
			$level2--;
		} else {
			$level++;
			if (!isset($sno[$level])) {
				$sno[$level] = 1;
			} else {
				$sno[$level]++;
			}
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			if ($posting->parent_posting_id == $old_posting->parent_posting_id) {
			}
			if ($posting->parent_posting_id != $old_posting->parent_posting_id) {

				//$level2++;
				$old_posting = $posting;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			switch ($level) {
				case 2:
					$a = '';
					$class = 'total_row2';
					break;
				default:
					$a = $sno[$level];
					$class = '';
					break;
			}
			if ($posting->total > 0) {
				//$htmlData.='<tr class="single_posting_total '.$class.'"><td>'.$a.'</td><td  class="posting_name">'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
				$htmlData .= '<tr class="single_posting_total"><td>' . $sno[$level] . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					//$htmlData.='<tr class="single_posting_total '.$class.'"><td>'.$a.'</td><td class="posting_name">'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
					$htmlData .= '<tr class="single_posting_total"><td>' . $sno[$level] . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
					$htmlData .= '
						<td>' . $posting->insp . '</td>
						<td>' . $posting->si . '</td>
						<td>' . $posting->asi . '</td>
						<td>' . $posting->hc . '</td>
						<td>' . $posting->ct . '</td>
						<td>' . $posting->otherRank . '</td>
						<td>' . $posting->total . '</td></tr>';
				}
			}
		}
		//echo $htmlData;
	}
	//hello
	public function htmlViewPostingConsolidateForBattalion(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero)
	{
		if ($level == null) {
			$level = 0;
		}
		$max_posting_level = 4;
		//die('ljk');
		if ($tree_posting->haveChildren == true) {
			$parent_id = $tree_posting->id;
			//if($tree_posting->parent_posting_id!=$old_posting->parent_posting_id){
			$level2++;
			//}else{

			//}
			$sno[$level + 2] = 0;
			$level++;

			if (!isset($sno[$level])) {
				$sno[$level] = 1;
			} else {
				$sno[$level]++;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}
			$old_posting = $posting = $all_posting_copy[$tree_posting->id];
			array_push($totals, $posting);
			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";

			if ($level2 == 2) {
				//$tree_posting_name = '<b><i><u>'.$tree_posting->name.'</u></i>';
				$tree_posting_name = '' . $tree_posting->name . '';
			} else {
				$tree_posting_name = $tree_posting->name;
			}
			//var_dump($posting);
			if ($posting->id != 1) {
				if ($posting->total != 0) {
					if ($level == 2) {
						$class = 'total_row2';
					} else {
						$class = 'total_row';
					}
				} else {
					if ($skipZero == false) {
						if ($level == 2) {
							$class = 'total_row2';
						} else {
							$class = 'total_row';
						}
					} else {
						$class = '';
					}
				}
				if ($level > 3) {
				} else {
					if (!($posting->total == 0 && $skipZero == true)) {
						$span = $this->getSpan($level);
						$zero = $this->getZero($sno, $level);
						$htmlData .= '<tr class="' . $class . '"><td>' . $span . $zero . $sno[$level] . '</td><td class="posting_name">'/*.$span*/ . $tree_posting_name . '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}
				}
			}

			$previous_child_id = $posting->parent_posting_id;
			$a = 0;
			foreach ($tree_posting->childrens as $k => $child) {
				if ($level < 4) {
					$this->htmlViewPostingConsolidateForBattalion($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero);
				}
			}
			if ($level2 == 2) {
				//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
			} else {
			}
			$text_align = 'right';
			if ($level == 1) {
				$total_row = /*$span.*/ 'Grand Total(ALL)'; //.$tree_posting->name;
				$class = 'total_row1';
			} elseif ($level == 2) {
				//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
				$total_row = '' ./*$span.*/ 'Grand Total (' . $tree_posting->name . ')'; //.$tree_posting->name.'';
				$class = 'total_row2';
			} else if ($level == 3) {
				$total_row = /*$span.*/ 'Total'; //.$tree_posting->name;
				$class = 'total_row3';
			} elseif ($level > 3) {
				$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')';
				$class = 'total_row';
				$text_align = 'left';
			} else {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row';
			}
			if ($posting->total != 0) {
				$span_left = ' class="showCursor hoverRankFigure" onClick="showEmployees(' . $posting->id . ',\'';
				$span_center = '\')">';
				$span_right = '';
				$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>
						<td>' . $posting->insp . '</td>
						<td>' . $posting->si . '</td>
						<td>' . $posting->asi . '</td>
						<td>' . $posting->hc . '</td>
						<td>' . $posting->ct . '</td>
						<td>' . $posting->otherRank . '</td>
						<td>' . $posting->total . '</td></tr>';
				}
			}
			$level2--;
		} else {
			$level++;
			if (!isset($sno[$level])) {
				$sno[$level] = 1;
			} else {
				$sno[$level]++;
			}
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			if ($posting->parent_posting_id == $old_posting->parent_posting_id) {
			}
			if ($posting->parent_posting_id != $old_posting->parent_posting_id) {

				//$level2++;
				$old_posting = $posting;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			switch ($level) {
				case 2:
					$a = '';
					$class = 'total_row2';
					break;
				default:
					$a = $sno[$level];
					$class = '';
					break;
			}
			if ($posting->total > 0) {
				$span = $this->getSpan($level);
				$zero = $this->getZero($sno, $level);

				$htmlData .= '<tr class="single_posting_total"><td>' . $span . $zero . $sno[$level] . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
				$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					$span = $this->getSpan($level);
					$zero = $this->getZero($sno, $level);

					$htmlData .= '<tr class="single_posting_total"><td>' . $span . $zero . $sno[$level] . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
					$htmlData .= '
						<td>' . $posting->insp . '</td>
						<td>' . $posting->si . '</td>
						<td>' . $posting->asi . '</td>
						<td>' . $posting->hc . '</td>
						<td>' . $posting->ct . '</td>
						<td>' . $posting->otherRank . '</td>
						<td>' . $posting->total . '</td></tr>';
				}
			}
		}
		//echo $htmlData;
	}
	/**
			
	 */
	public function htmlViewPostingConsolidateIGP(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero, $battalions, $finalPostingWithIDasKey)
	{
		if ($level == null) {
			$level = 0;
		}
		$this->load->helper('common');
		error_reporting(E_ALL);
		$max_posting_level = 6;

		//die('ljk');
		if ($tree_posting->haveChildren == true) {
			//echo 'childrens<Br>';
			if ($tree_posting->view == 'EXPANDED') {
				//echo 'Expanded<br>';
				$parent_id = $tree_posting->id;
				//if($tree_posting->parent_posting_id!=$old_posting->parent_posting_id){
				$level2++;
				//}else{

				//}
				$sno[$level + 2] = 0;
				$level++;
				$width = 0;
				for ($i = 0; $i < $level; $i++) {
					$width += 20;
				}
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				if (!($posting->total == 0 && $skipZero == true)) {
					if (!isset($sno[$level])) {
						$sno[$level] = 1;
					} else {
						$sno[$level]++;
					}
				}
				array_push($totals, $posting);
				$color = 'color' . $level;
				$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";

				if ($level2 == 2) {
					//$tree_posting_name = '<b><i><u>'.$tree_posting->name.'</u></i>';
					$tree_posting_name = '' . $tree_posting->name . '';
				} else {
					$tree_posting_name = $tree_posting->name;
				}
				//var_dump($posting);
				if ($posting->id != 1) {
					if ($posting->total != 0) {
						if ($level == 2) {
							$class = 'total_row2';
						} else {
							$class = 'total_row';
						}
					} else {
						if ($skipZero == false) {
							if ($level == 2) {
								$class = 'total_row2';
							} else {
								$class = 'total_row';
							}
						} else {
							$class = '';
						}
					}
					if ($level > 6) {
						//echo '5555';
						//die('55');
					} else {
						$span = $this->getSpan($level);
						if ($level == 3) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToAlphabet($sno[$level]);
						} elseif ($level == 4) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToRoman($sno[$level]);
						} elseif ($level == 5) {
							//$zero = $this->getZero($sno,$level);
							$text = strtolower(convertToRoman($sno[$level]));
						} else {
							$zero = $this->getZero($sno, $level);
							$text = $zero . $sno[$level];
						}
						$htmlData .= '<tr class="' . $class . '"><td>' . $span . $text . '</td><td class="posting_name">'/*.$span*/ . $tree_posting_name . '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}
				}

				$previous_child_id = $posting->parent_posting_id;
				$a = 0;
				foreach ($tree_posting->childrens as $k => $child) {
					//if($level<6){
					$this->htmlViewPostingConsolidateIGP($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey);
					//}
				}
				if ($level2 == 2) {
					//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
				} else {
				}
				$text_align = 'right';
				if ($level == 1) {
					$total_row = /*$span.*/ 'Grand Total(ALL)'; //.$tree_posting->name;
					$class = 'total_row1';
				} elseif ($level == 2) {
					//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
					$total_row = '' ./*$span.*/ 'Grand Total (' . $tree_posting->name . ')'; //.$tree_posting->name.'';
					$class = 'total_row2';
				} else if ($level == 3) {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 4) {

					$total_row = 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 5) {
					$total_row = '' . $level . $tree_posting->name;
					$class = 'posting_name';
				} elseif ($level > 5) {
					$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')' . $level;
					$class = 'total_row';
					$text_align = 'left';
				} else {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row';
				}
				//if($posting->show_as_consolid=='NO'){
				if ($posting->total != 0) {
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:'.$text_align.';">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
					$span_left = ' class="showCursor hoverRankFigure" onClick="showEmployees(' . $posting->id . ',\'';
					$span_center = '\')">';
					$span_right = '';

					$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>'; //total
					$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
					$htmlData .= '</tr>';
				} else {
					if ($skipZero == false) {
						//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:'.$text_align.';">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
						$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>
								<td>' . $posting->insp . '</td>
								<td>' . $posting->si . '</td>
								<td>' . $posting->asi . '</td>
								<td>' . $posting->hc . '</td>
								<td>' . $posting->ct . '</td>
								<td>' . $posting->otherRank . '</td>
								<td>' . $posting->total . '</td></tr>';
					}
				}
				$level2--;
				//}
			} else	//recursion
			{
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				//echo 'tree post';

				//var_dump($tree_posting);
				$tree_posting_name = '' . $tree_posting->name . '';
				if (!isset($posting->haveChildren)) {
					$posting->haveChildren = false;
				}
				$this->htmlViewPostingConsolidateIGP($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey);
			}
		} else {	//ONE LINE
			//echo 'ONE LINE';
			$level++;
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			$posting = $all_posting_copy[$tree_posting->id];
			if (!($posting->total == 0 && $skipZero == true)) {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
				}
			}
			//var_dump($posting);	
			//die;
			/* if($posting->parent_posting_id== $old_posting->parent_posting_id){
				
				}
				if($posting->parent_posting_id!= $old_posting->parent_posting_id){
					
					//$level2++;
					$old_posting = $posting;
				} */
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			switch ($level) {
				case 2:
					$a = '';
					$class = 'total_row2';
					break;
				default:
					$a = $sno[$level];
					$class = '';
					break;
			}
			//if($posting->show_as_consolid=='YES'){
			//echo 'HELLO';
			/* $__a = true ;
					if($__a){
						var_dump($posting);
						echo '<hr>';
						$__a = false;
					} */
			if ($posting->total > 0) {
				$span = $this->getSpan($level);
				//$zero = $this->getZero($sno,$level);
				if ($level == 3) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToAlphabet($sno[$level]);
				} elseif ($level == 4) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToRoman($sno[$level]);
				} elseif ($level == 5) {
					//$zero = $this->getZero($sno,$level);
					$text = strtolower(convertToRoman($sno[$level]));
				} else {
					$zero = $this->getZero($sno, $level);
					$text = $zero . $sno[$level];
				}
				$htmlData .= '<tr class="single_posting_total"><td>' . $span . $text . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'ct');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'otherRank');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					$span = $this->getSpan($level);
					//$zero = $this->getZero($sno,$level);
					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
					} else {
						$zero = $this->getZero($sno, $level);
						$text = $zero . $sno[$level];
					}
					//$htmlData.='<tr class="single_posting_total '.$class.'"><td>'.$a.'</td><td class="posting_name">'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
					$htmlData .= '<tr class="single_posting_total"><td>' . $span . $text . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
					$htmlData .= '
							<td>' . $tree_posting->insp . '</td>
							<td>' . $tree_posting->si . '</td>
							<td>' . $tree_posting->asi . '</td>
							<td>' . $tree_posting->hc . '</td>
							<td>' . $tree_posting->ct . '</td>
							<td>' . $tree_posting->otherRank . '</td>
							<td>' . $tree_posting->total . '</td></tr>';
				}
			}
			//}
		}
		//echo $htmlData;
	}

	/****
			consolid deployment for selected deployment report(3) 
			generate table's html body in battalion
	 */
	public function htmlViewPostingConsolidateForBATTALION2(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero, $battalions, $finalPostingWithIDasKey)
	{
		if ($level == null) {
			$level = 0;
		}
		$this->load->helper('common');
		error_reporting(E_ALL);
		$max_posting_level = 6;
		//die('ljk');
		if ($tree_posting->haveChildren == true) {
			//echo 'childrens<Br>';
			if ($tree_posting->view == 'EXPANDED') {
				//echo 'Expanded<br>';
				$parent_id = $tree_posting->id;
				//if($tree_posting->parent_posting_id!=$old_posting->parent_posting_id){
				$level2++;
				//}else{

				//}
				$sno[$level + 2] = 0;
				$level++;
				$width = 0;
				for ($i = 0; $i < $level; $i++) {
					$width += 20;
				}
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				if (!($posting->total == 0 && $skipZero == true)) {
					if (!isset($sno[$level])) {
						$sno[$level] = 1;
					} else {
						$sno[$level]++;
					}
				}
				array_push($totals, $posting);
				$color = 'color' . $level;
				$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";

				if ($level2 == 2) {
					//$tree_posting_name = '<b><i><u>'.$tree_posting->name.'</u></i>';
					$tree_posting_name = '' . $tree_posting->name . '';
				} else {
					$tree_posting_name = $tree_posting->name;
				}
				//var_dump($posting);
				if ($posting->id != 1) {
					if ($posting->total != 0) {
						if ($level == 2) {
							$class = 'total_row2';
						} else {
							$class = 'total_row';
						}
					} else {
						if ($skipZero == false) {
							if ($level == 2) {
								$class = 'total_row2';
							} else {
								$class = 'total_row';
							}
						} else {
							$class = '';
						}
					}
					if ($level > 6) {
						//echo '5555';
						//die('55');
					} else {
						$span = $this->getSpan($level);
						if ($level == 3) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToAlphabet($sno[$level]);
						} elseif ($level == 4) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToRoman($sno[$level]);
						} elseif ($level == 5) {
							//$zero = $this->getZero($sno,$level);
							$text = strtolower(convertToRoman($sno[$level]));
						} else {
							$zero = $this->getZero($sno, $level);
							$text = $zero . $sno[$level];
						}

						$htmlData .= '<tr class="' . $class . '"><td>' . $span . $text . '</td><td class="posting_name">'/*.$span*/ . $tree_posting_name . '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}
				}

				$previous_child_id = $posting->parent_posting_id;
				$a = 0;
				foreach ($tree_posting->childrens as $k => $child) {
					//if($level<6){

					$this->htmlViewPostingConsolidateForBATTALION2($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey);
					//}
				}
				if ($level2 == 2) {
					//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
				} else {
				}
				$text_align = 'right';
				if ($level == 1) {
					$total_row = /*$span.*/ 'Grand Total(ALL)'; //.$tree_posting->name;
					$class = 'total_row1';
				} elseif ($level == 2) {
					//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
					$total_row = '' ./*$span.*/ 'Grand Total (' . $tree_posting->name . ')'; //.$tree_posting->name.'';
					$class = 'total_row2';
				} else if ($level == 3) {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 4) {

					$total_row = 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 5) {
					$total_row = '' . $level . $tree_posting->name;
					$class = 'posting_name';
				} elseif ($level > 5) {
					$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')' . $level;
					$class = 'total_row';
					$text_align = 'left';
				} else {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row';
				}
				//if($posting->show_as_consolid=='NO'){
				if ($posting->total != 0) {
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:'.$text_align.';">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
					$span_left = ' class="showCursor hoverRankFigure" onClick="showEmployees(' . $posting->id . ',\'';
					$span_center = '\')">';
					$span_right = '';

					$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>'; //total
					$htmlData .= $this->setConsolidatedTableCell($posting, 'insp');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'si');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'asi');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'hc');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'ct');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'otherRank');
					$htmlData .= $this->setConsolidatedTableCell($posting, 'total');
					$htmlData .= '</tr>';
				} else {
					if ($skipZero == false) {
						//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:'.$text_align.';">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
						$htmlData .= '<tr class="' . $class . '"><td></td><td style="text-align:right;">' . $total_row . '</td>
								<td>' . $posting->insp . '</td>
								<td>' . $posting->si . '</td>
								<td>' . $posting->asi . '</td>
								<td>' . $posting->hc . '</td>
								<td>' . $posting->ct . '</td>
								<td>' . $posting->otherRank . '</td>
								<td>' . $posting->total . '</td></tr>';
					}
				}
				$level2--;
				//}
			} else	//recursion
			{
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				//echo 'tree post';

				//var_dump($tree_posting);
				$tree_posting_name = '' . $tree_posting->name . '';
				if (!isset($posting->haveChildren)) {
					$posting->haveChildren = false;
				}
				$this->htmlViewPostingConsolidateForBATTALION2($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey);
			}
		} else {	//ONE LINE
			//echo 'ONE LINE';
			$level++;
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			$posting = $all_posting_copy[$tree_posting->id];
			if (!($posting->total == 0 && $skipZero == true)) {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
				}
			}
			//var_dump($posting);	
			//die;
			/* if($posting->parent_posting_id== $old_posting->parent_posting_id){
				
				}
				if($posting->parent_posting_id!= $old_posting->parent_posting_id){
					
					//$level2++;
					$old_posting = $posting;
				} */
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			switch ($level) {
				case 2:
					$a = '';
					$class = 'total_row2';
					break;
				default:
					$a = $sno[$level];
					$class = '';
					break;
			}
			//if($posting->show_as_consolid=='YES'){
			//echo 'HELLO';
			/* $__a = true ;
					if($__a){
						var_dump($posting);
						echo '<hr>';
						$__a = false;
					} */
			if ($posting->total > 0) {
				$span = $this->getSpan($level);
				//$zero = $this->getZero($sno,$level);
				if ($level == 3) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToAlphabet($sno[$level]);
				} elseif ($level == 4) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToRoman($sno[$level]);
				} elseif ($level == 5) {
					//$zero = $this->getZero($sno,$level);
					$text = strtolower(convertToRoman($sno[$level]));
				} else {
					$zero = $this->getZero($sno, $level);
					$text = $zero . $sno[$level];
				}
				$htmlData .= '<tr class="single_posting_total"><td>' . $span . $text . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'insp');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'si');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'asi');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'hc');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'ct');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'otherRank');
				$htmlData .= $this->setConsolidatedTableCell($tree_posting, 'total');
				$htmlData .= '</tr>';
			} else {
				if ($skipZero == false) {
					$span = $this->getSpan($level);
					$zero = $this->getZero($sno, $level);
					//$htmlData.='<tr class="single_posting_total '.$class.'"><td>'.$a.'</td><td class="posting_name">'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
					} else {
						$zero = $this->getZero($sno, $level);
						$text = $zero . $sno[$level];
					}
					$htmlData .= '<tr class="single_posting_total"><td>' . $span . $text . '</td><td class="posting_name">'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td>';
					$htmlData .= '
							<td>' . $tree_posting->insp . '</td>
							<td>' . $tree_posting->si . '</td>
							<td>' . $tree_posting->asi . '</td>
							<td>' . $tree_posting->hc . '</td>
							<td>' . $tree_posting->ct . '</td>
							<td>' . $tree_posting->otherRank . '</td>
							<td>' . $tree_posting->total . '</td></tr>';
				}
			}
			//}
		}
		//echo $htmlData;
	}
	public function getSpan($level)
	{
		$unit_width = 10;
		$width = 0;
		for ($space_counter = 2; $space_counter < $level; $space_counter++) {
			//$space.='&nbsp;&nbsp;';
			//$space.='--';
			$width = $width + $unit_width * 2;
		}
		$span = '<span style="width:' . $width . 'px;border:0px solid black;padding-left:' . $width . 'px;">&nbsp;</span>';
		return $span;
	}
	public function getZero($sno, $level)
	{
		$zero = '';
		if ($sno[$level] > 9) {
			$zero = '';
		} else {
			$zero = '0';
		}
		return $zero;
	}
	public function downloadViewPostingConsolidateAsExcel($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero)
	{

		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
			->setLastModifiedBy("ERMS-PAP")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Posting Consolidate figure of battalion ERMS-PAP.")
			->setKeywords("Posting consolidate, Deployment Statement")
			->setCategory("Posting Consolidate");
		$counti = 0;
		$objPHPExcel->createSheet($counti);
		$objPHPExcel->setActiveSheetIndex($counti);
		$objPHPExcel->getActiveSheet()->setTitle('Deployment Statement');

		$counter = 0;
		$row = 1;

		$titleStyle = array(
			'font'  => array(
				'size'  => 15,
				'name'  => 'Verdana',
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FF00a0')
				)
				/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
			)
		);
		$unit__ = $this->input->post('unit');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', 'Deployment Statement of ' . $this->session->userdata('nick'));
		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:I1");

		$row++;
		$equipmentNameStyle = array(
			'font'  => array(
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'S. No.');
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, 'Duty Name');
		$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, 'INSPs');
		$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, 'SIs');
		$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'ASIs');
		$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, 'HC');
		$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, 'CTs');
		$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, 'Other Ranks');
		$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, 'Total');
		$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
		//$row++;
		$cols = array('C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R');
		$i = 0;
		$grand_total = array();
		$skipZero = false;
		if (isset($_POST['downloadExcel'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}
		$this->excelViewPostingConsolidate($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row);

		//die;
		//			// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="consolidate_deployment_statement_of' . $this->session->userdata('nick') . '.' . EXCEL_EXTENSION . '"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

	/**
			consolidate igp excel download according to deployment report(1)
	 */
	public function downloadViewPostingConsolidateAsExcelIGP($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey, $report_obj, $message, $variousInductionStrengths = null)
	{

		$this->load->library('excel');
		$this->load->helper('common');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
			->setLastModifiedBy("ERMS-PAP")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Posting Consolidate figure of battalion ERMS-PAP.")
			->setKeywords("Posting consolidate, Deployment Statement")
			->setCategory("Posting Consolidate");
		$counti = 0;
		$objPHPExcel->createSheet($counti);
		$objPHPExcel->setActiveSheetIndex($counti);
		$objPHPExcel->getActiveSheet()->setTitle('Deployment Statement');

		$counter = 0;
		$row = 1;

		$titleStyle = array(
			'font'  => array(
				'size'  => 15,
				'name'  => 'Verdana',
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FF00a0')
				)
				/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
			)
		);
		$unit__ = $this->input->post('unit');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', $message);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:I1");

		$row++;
		$equipmentNameStyle = array(
			'font'  => array(
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'S. No.');
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, 'Duty Name');
		$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, 'INSPs');
		$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, 'SIs');
		$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'ASIs');
		$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, 'HC');
		$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, 'CTs');
		$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, 'Other Ranks');
		$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, 'Total');
		$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
		//$row++;
		$cols = array('C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R');
		$i = 0;
		$grand_total = array();
		$skipZero = false;
		if (isset($_POST['downloadExcel'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}
		$this->excelViewPostingConsolidateIGP($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row, $finalPostingWithIDasKey, $variousInductionStrengths);


		//die;
		//			// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="consolidate_deployment_statement_of' . $this->session->userdata('nick') . '.' . EXCEL_EXTENSION . '"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	/**
			consolidate igp excel download according to deployment report(1)
	 */
	public function downloadViewPostingConsolidateAsExcelBATTALION($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $battalions, $finalPostingWithIDasKey, $report_obj, $before_date, $variousInductionStrengths = null)
	{

		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("ERMS-PAP")
			->setLastModifiedBy("ERMS-PAP")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Posting Consolidate figure of battalion ERMS-PAP.")
			->setKeywords("Posting consolidate, Deployment Statement")
			->setCategory("Posting Consolidate");
		$counti = 0;
		$objPHPExcel->createSheet($counti);
		$objPHPExcel->setActiveSheetIndex($counti);
		$objPHPExcel->getActiveSheet()->setTitle('Deployment Statement');

		$counter = 0;
		$row = 1;

		$titleStyle = array(
			'font'  => array(
				'size'  => 15,
				'name'  => 'Verdana',
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FF00a0')
				)
				/*'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)*/
			)
		);
		$unit__ = $this->input->post('unit');
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A1', $report_obj->title . ' ' . $this->session->userdata('nick') . ' ' . $before_date);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($titleStyle);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->setActiveSheetIndex($counti)->mergeCells("A1:I1");

		$row++;
		$equipmentNameStyle = array(
			'font'  => array(
				'size'  => 12,
				'name'  => 'Verdana',
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			)
		);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, 'S. No.');
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, 'Duty Name');
		$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, 'INSPs');
		$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, 'SIs');
		$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, 'ASIs');
		$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, 'HC');
		$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, 'CTs');
		$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, 'Other Ranks');
		$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
		$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, 'Total');
		$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
		//$row++;
		$cols = array('C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R');
		$i = 0;
		$grand_total = array();
		$skipZero = false;
		if (isset($_POST['downloadExcel'])) {
			if (isset($_POST['skipZero'])) {
				$skipZero = true;
			}
		}
		$this->excelViewPostingConsolidateBATTALION($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row, $finalPostingWithIDasKey, $variousInductionStrengths);


		//die;
		//			// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="consolidate_deployment_statement_of' . $this->session->userdata('nick') . '.' . EXCEL_EXTENSION . '"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	public function excelViewPostingConsolidate(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero, $objPHPExcel, &$counti, &$cols, &$i, &$row, $variousInductionStrengths = null)
	{
		if ($level == null) {
			$level = 0;
		}

		if (null != $variousInductionStrengths) {
			$styleArray = array(
				'font' => array(
					'bold' => true
				)
			);
			foreach ($variousInductionStrengths as $key => $val) {
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $val->sno);
				$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $val->title);
				$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $val->insp);
				$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $val->si);
				$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $val->asi);
				$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $val->hc);
				$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $val->ct);
				$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $val->otherRank);
				$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $val->total);
				$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
				$row++;
			}
		}
		if ($tree_posting->haveChildren == true) {
			$parent_id = $tree_posting->id;
			$level2++;
			$sno[$level + 2] = 0;
			$level++;

			if (!isset($sno[$level])) {
				$sno[$level] = 1;
			} else {
				$sno[$level]++;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}
			$old_posting = $posting = $all_posting_copy[$tree_posting->id];


			if ($level2 == 2) {

				$tree_posting_name = '' . $tree_posting->name . '';
			} else {
				$tree_posting_name = $tree_posting->name;
			}
			if ($posting->id != 1) {
				if ($posting->total != 0) {
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
					$styleArray = array(
						'font' => array(
							'bold' => true
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
				} else {
					if ($skipZero == false) {
						$row++;
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
						$styleArray = array(
							'font' => array(
								'bold' => true
							)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					}
				}
			}

			$previous_child_id = $posting->parent_posting_id;
			$a = 0;
			foreach ($tree_posting->childrens as $k => $child) {
				//$row++;
				$this->excelViewPostingConsolidate($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row);
			}
			//$row++;
			if ($level2 == 2) {
				//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
			} else {
			}
			$text_align = 'right';
			if ($level == 1) {
				$total_row = /*$span.*/ 'Grand Total (ALL)'; //.$tree_posting->name;
				$class = 'total_row1';
			} elseif ($level == 2) {
				//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
				$total_row = '' ./*$span.*/ 'Grand Total (' . $tree_posting->name . ')';
				$class = 'total_row2';
			} else if ($level == 3) {
				$total_row = /*$span.*/ 'Total'; // of '.$tree_posting->name;
				$class = 'total_row3';
			} elseif ($level > 3) {
				$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')';
				$class = 'total_row';
				$text_align = 'left';
			} else {
				$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
				$class = 'total_row';
			}
			if ($posting->total != 0) {
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
				//make bold
				$styleArray = array(
					'font' => array(
						'bold' => true
					)
				);
				$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
				//align fright
				if ($text_align == 'right') {
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
				} else {
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				}
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
				$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
				$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
				$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
				$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
				$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
				$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
				$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
				//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
			} else {
				if ($skipZero == false) {
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
					$styleArray = array(
						'font' => array(
							'bold' => true
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
				}
			}
			$level2--;
		} else {
			$level++;
			if (!isset($sno[$level])) {
				$sno[$level] = 1;
			} else {
				$sno[$level]++;
			}
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			if ($posting->parent_posting_id == $old_posting->parent_posting_id) {
			}
			if ($posting->parent_posting_id != $old_posting->parent_posting_id) {

				//$level2++;
				$old_posting = $posting;
			}
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			if ($posting->total > 0) {
				$row++;
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
				//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
			} else {
				if ($skipZero == false) {
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					$htmlData .= '<tr class="single_posting_total"><td>' . $sno[$level] . '</td><td>'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td><td>' . $posting->insp . '</td><td>' . $posting->si . '</td><td>' . $posting->asi . '</td><td>' . $posting->hc . '</td><td>' . $posting->ct . '</td><td>' . $posting->otherRank . '</td><td>' . $posting->total . '</td></tr>';
				}
			}
		}
		//echo $htmlData;
	}
	/**
			generating excel table body for consolidate igp
	 */
	public function excelViewPostingConsolidateIGP(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero, $objPHPExcel, &$counti, &$cols, &$i, &$row, $finalPostingWithIDasKey, $variousInductionStrengths = null)
	{
		if ($level == null) {
			$level = 0;
		}
		$styleArray = array(
			'font' => array(
				'bold' => true
			)
		);
		if (null != $variousInductionStrengths) {
			foreach ($variousInductionStrengths as $key => $val) {
				if ($val == null) {
					$row++;
				} else {
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $val->sno);
					$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $val->title);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $val->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $val->si);
					$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $val->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $val->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $val->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $val->otherRank);
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $val->total);
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					$row++;
				}
			}
		}
		if ($tree_posting->haveChildren == true) {
			if ($tree_posting->view == 'EXPANDED') {
				$parent_id = $tree_posting->id;
				$level2++;
				$sno[$level + 2] = 0;
				$level++;
				$width = 0;
				for ($i = 0; $i < $level; $i++) {
					$width += 20;
				}
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				if (!($posting->total == 0 && $skipZero == true)) {
					if (!isset($sno[$level])) {
						$sno[$level] = 1;
					} else {
						$sno[$level]++;
					}
				}
				//array_push($totals,$posting);
				//$color = 'color'.$level;
				//$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
				if ($level2 == 2) {

					$tree_posting_name = '' . $tree_posting->name . '';
				} else {
					$tree_posting_name = $tree_posting->name;
				}
				if ($posting->id != 1) {
					if ($posting->total != 0) {
						$row++;
						if ($level == 3) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToAlphabet($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
						} elseif ($level == 4) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
						} elseif ($level == 5) {
							//$zero = $this->getZero($sno,$level);
							$text = strtolower(convertToRoman($sno[$level]));
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
						} else {
							$zero = ''; //$this->getZero($sno,$level);
							$text = $zero . $sno[$level];
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
						}
						$styleArray = array(
							'font' => array(
								'bold' => true
							)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					} else {
						if ($skipZero == false) {
							$row++;
							$text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
							$styleArray = array(
								'font' => array(
									'bold' => true
								)
							);
							$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
							//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
						}
					}
					if ($level > 6) {
					} else {
						$span = $this->getSpan($level);
						$zero = $this->getZero($sno, $level);
						//$row++;
						//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting_name);
						//$htmlData.='<tr class="'.$class.'"><td>'.$span.$zero.$sno[$level].'</td><td class="posting_name">'/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';

					}
				}
				$previous_child_id = $posting->parent_posting_id;
				$a = 0;
				foreach ($tree_posting->childrens as $k => $child) {
					//$row++;
					$this->excelViewPostingConsolidateIGP($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row, $finalPostingWithIDasKey); //recursion

				}
				//$row++;
				if ($level2 == 2) {
					//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
				} else {
				}
				$text_align = 'right';
				if ($level == 1) {
					$total_row = /*$span.*/ 'Grand Total (ALL)'; //.$tree_posting->name;
					$class = 'total_row1';
				} elseif ($level == 2) {
					//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
					$total_row = '' ./*$span.*/ 'Grand Total (' . $tree_posting->name . ')';
					$class = 'total_row2';
				} else if ($level == 3) {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 4) {
					$total_row = 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 4) {
					$total_row = 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} elseif ($level == 5) {
					$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')';
					$class = 'total_row';
					//$text_align = 'left';
				} elseif ($level > 5) {
					$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')' . $level;
					$class = 'total_row';
					$text_align = 'left';
				} else {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row';
				}
				if ($posting->total != 0) {
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
					//make bold
					$styleArray = array(
						'font' => array(
							'bold' => true
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					//align fright
					if ($text_align == 'right') {
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
					} else {
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
				} else {
					if ($skipZero == false) {
						$row++;
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
						$styleArray = array(
							'font' => array(
								'bold' => true
							)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
						$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
						$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
						$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
						$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
						$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
						$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
						$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
					}
				}
				$level2--;
			} else {
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				//echo 'tree post';

				//var_dump($tree_posting);
				$tree_posting_name = '' . $tree_posting->name . '';
				if (!isset($posting->haveChildren)) {
					$posting->haveChildren = false;
				}
				$this->excelViewPostingConsolidateIGP($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row, $finalPostingWithIDasKey);
			}
		} else {
			$level++;
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			$posting = $all_posting_copy[$tree_posting->id];
			if (!($posting->total == 0 && $skipZero == true)) {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
				}
			}
			/* if($posting->parent_posting_id== $old_posting->parent_posting_id){
				
				}
				if($posting->parent_posting_id!= $old_posting->parent_posting_id){
					
					//$level2++;
					$old_posting = $posting;
				} */
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			if ($posting->total > 0) {
				$row++;
				if ($level == 3) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToAlphabet($sno[$level]);

					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting->name);
				} elseif ($level == 4) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToRoman($sno[$level]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				} elseif ($level == 5) {
					//$zero = $this->getZero($sno,$level);
					$text = strtolower(convertToRoman($sno[$level]));
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				} else {
					$zero = $this->getZero($sno, $level);
					$text = $zero . $sno[$level];
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				}
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$sno[$level]);
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
				//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
			} else {
				if ($skipZero == false) {
					$row++;
					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting->name);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					} else {
						$zero = $this->getZero($sno, $level);
						$text = $zero . $sno[$level];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					}
					//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$sno[$level]);
					//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
				}
			}
		}
		//echo $htmlData;
	}
	/**
			generating excel table body for consolidate Battalion login
	 */
	public function excelViewPostingConsolidateBATTALION(&$htmlData, $tree_posting, $finalPostings, &$sno, $level, $all_posting_copy, &$htmlgroup, &$level2, &$totals, &$previous_child_id, &$new_child_id, &$parent_id, &$old_posting, $skipZero, $objPHPExcel, &$counti, &$cols, &$i, &$row, $finalPostingWithIDasKey, $variousInductionStrengths = null)
	{
		if ($level == null) {
			$level = 0;
		}
		$this->load->helper('common');
		if (null != $variousInductionStrengths) {
			$styleArray = array(
				'font' => array(
					'bold' => true
				)
			);
			foreach ($variousInductionStrengths as $key => $val) {
				if ($val == null) {
					$row++;
				} else {
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $val->sno);
					$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $val->title);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $val->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $val->si);
					$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $val->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $val->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $val->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $val->otherRank);
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $val->total);
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					$row++;
				}
			}
		}
		if ($tree_posting->haveChildren == true) {
			if ($tree_posting->view == 'EXPANDED') {
				$parent_id = $tree_posting->id;
				$level2++;
				$sno[$level + 2] = 0;
				$level++;
				$width = 0;
				for ($i = 0; $i < $level; $i++) {
					$width += 20;
				}
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				if (!($posting->total == 0 && $skipZero == true)) {
					if (!isset($sno[$level])) {
						$sno[$level] = 1;
					} else {
						$sno[$level]++;
					}
				}
				//array_push($totals,$posting);
				//$color = 'color'.$level;
				//$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
				if ($level2 == 2) {

					$tree_posting_name = '' . $tree_posting->name . '';
				} else {
					$tree_posting_name = $tree_posting->name;
				}
				if ($posting->id != 1) {
					if ($posting->total != 0) {
						$row++;
						if ($level == 3) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToAlphabet($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
						} elseif ($level == 4) {
							//$zero = $this->getZero($sno,$level);
							$text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
						} elseif ($level == 5) {
							//$zero = $this->getZero($sno,$level);
							$text = strtolower(convertToRoman($sno[$level]));
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
						} else {
							$zero = ''; //$this->getZero($sno,$level);
							$text = $zero . $sno[$level];
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, '');
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting_name);
						}
						//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,'');
						//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting_name);
						$styleArray = array(
							'font' => array(
								'bold' => true
							)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
					} else {
						if ($skipZero == false) {
							$row++;
							$text = convertToRoman($sno[$level]);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
							$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting_name);
							$styleArray = array(
								'font' => array(
									'bold' => true
								)
							);
							$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
							//$htmlData.='<tr class="total_row"><td></td><td>'/*.$level2*/.' '/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
						}
					}
					if ($level > 6) {
					} else {
						$span = $this->getSpan($level);
						$zero = $this->getZero($sno, $level);
						//$row++;
						//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting_name);
						//$htmlData.='<tr class="'.$class.'"><td>'.$span.$zero.$sno[$level].'</td><td class="posting_name">'/*.$span*/.$tree_posting_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';

					}
				}
				$previous_child_id = $posting->parent_posting_id;
				$a = 0;
				foreach ($tree_posting->childrens as $k => $child) {
					//$row++;
					$this->excelViewPostingConsolidateBATTALION($htmlData, $child, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row, $finalPostingWithIDasKey); //recursion

				}
				//$row++;
				if ($level2 == 2) {
					//$htmlData.='<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
				} else {
				}
				$text_align = 'right';
				if ($level == 1) {
					$total_row = /*$span.*/ 'Grand Total (ALL)'; //.$tree_posting->name;
					$class = 'total_row1';
				} elseif ($level == 2) {
					//$total_row = '<i><u>'./*$span.*/'Total of '.$tree_posting->name.'</u></i>';
					$total_row = '' ./*$span.*/ 'Grand Total (' . $tree_posting->name . ')';
					$class = 'total_row2';
				} else if ($level == 3) {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 4) {
					$total_row = 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} else if ($level == 4) {
					$total_row = 'Total of ' . $tree_posting->name;
					$class = 'total_row3';
				} elseif ($level == 5) {
					$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')';
					$class = 'total_row';
					//$text_align = 'left';
				} elseif ($level > 5) {
					$total_row = /*$span.*/ 'Total of (' . $tree_posting->name . ')' . $level;
					$class = 'total_row';
					$text_align = 'left';
				} else {
					$total_row = /*$span.*/ 'Total of ' . $tree_posting->name;
					$class = 'total_row';
				}
				if ($posting->total != 0) {
					$row++;
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
					//make bold
					$styleArray = array(
						'font' => array(
							'bold' => true
						)
					);
					$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
					//align fright
					if ($text_align == 'right') {
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
					} else {
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					}
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
					//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
				} else {
					if ($skipZero == false) {
						$row++;
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $total_row);
						$styleArray = array(
							'font' => array(
								'bold' => true
							)
						);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArray);
						$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
						$objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
						$objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
						$objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
						$objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
						$objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
						$objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArray);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
						$objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArray);
						//$htmlData.='<tr class="'.$class.'"><td></td><td style="text-align:right;">'.$total_row.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td> </tr>';
					}
				}
				$level2--;
			} else {
				$old_posting = $posting = $all_posting_copy[$tree_posting->id];
				//echo 'tree post';

				//var_dump($tree_posting);
				$tree_posting_name = '' . $tree_posting->name . '';
				if (!isset($posting->haveChildren)) {
					$posting->haveChildren = false;
				}
				$this->excelViewPostingConsolidateBATTALION($htmlData, $posting, $finalPostings, $sno, $level, $all_posting_copy, $htmlgroup, $level2, $totals, $previous_child_id, $new_child_id, $parent_id, $old_posting, $skipZero, $objPHPExcel, $counti, $cols, $i, $row, $finalPostingWithIDasKey);
			}
		} else {
			$level++;
			$posting = $this->getPostingFromWhoseIdIs($finalPostings, $tree_posting);
			$posting = $all_posting_copy[$tree_posting->id];
			if (!($posting->total == 0 && $skipZero == true)) {
				if (!isset($sno[$level])) {
					$sno[$level] = 1;
				} else {
					$sno[$level]++;
				}
			}
			/* if($posting->parent_posting_id== $old_posting->parent_posting_id){
				
				}
				if($posting->parent_posting_id!= $old_posting->parent_posting_id){
					
					//$level2++;
					$old_posting = $posting;
				} */
			$width = 0;
			for ($i = 0; $i < $level; $i++) {
				$width += 20;
			}

			$color = 'color' . $level;
			$span = "<span style='width:{$width}px;height:20px;float:left;'></span>";
			if ($posting->total > 0) {
				$row++;
				if ($level == 3) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToAlphabet($sno[$level]);

					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting->name);
				} elseif ($level == 4) {
					//$zero = $this->getZero($sno,$level);
					$text = convertToRoman($sno[$level]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				} elseif ($level == 5) {
					//$zero = $this->getZero($sno,$level);
					$text = strtolower(convertToRoman($sno[$level]));
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				} else {
					$zero = $this->getZero($sno, $level);
					$text = $zero . $sno[$level];
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
				}
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A'.$row,$sno[$level]);
				//$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B'.$row,$tree_posting->name);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
				$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
				//$htmlData.='<tr class="single_posting_total"><td>'.$sno[$level].'</td><td>'/*.$level2*/./*$span.*/$tree_posting->name.'</td><td>'.$posting->insp.'</td><td>'.$posting->si.'</td><td>'.$posting->asi.'</td><td>'.$posting->hc.'</td><td>'.$posting->ct.'</td><td>'.$posting->otherRank.'</td><td>'.$posting->total.'</td></tr>';
			} else {
				if ($skipZero == false) {
					$row++;
					if ($level == 3) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToAlphabet($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $text . '. ' . $tree_posting->name);
					} elseif ($level == 4) {
						//$zero = $this->getZero($sno,$level);
						$text = convertToRoman($sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					} elseif ($level == 5) {
						//$zero = $this->getZero($sno,$level);
						$text = strtolower(convertToRoman($sno[$level]));
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $text);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					} else {
						$zero = $this->getZero($sno, $level);
						$text = $zero . $sno[$level];
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('A' . $row, $sno[$level]);
						$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('B' . $row, $tree_posting->name);
					}



					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('C' . $row, $posting->insp);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('D' . $row, $posting->si);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('E' . $row, $posting->asi);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('F' . $row, $posting->hc);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('G' . $row, $posting->ct);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('H' . $row, $posting->otherRank);
					$objPHPExcel->setActiveSheetIndex($counti)->setCellValue('I' . $row, $posting->total);
					$htmlData .= '<tr class="single_posting_total"><td>' . $sno[$level] . '</td><td>'/*.$level2*/ ./*$span.*/ $tree_posting->name . '</td><td>' . $posting->insp . '</td><td>' . $posting->si . '</td><td>' . $posting->asi . '</td><td>' . $posting->hc . '</td><td>' . $posting->ct . '</td><td>' . $posting->otherRank . '</td><td>' . $posting->total . '</td></tr>';
				}
			}
		}
		//echo $htmlData;
	}
	public function getOsiBattalions()
	{

		/*$battalions = array(
				32=>'7 PAP',
				105=>'9 PAP',
				46=>'27 PAP',
				7=>'75 PAP',
				53=>'80 PAP',
				60=>'ADGP PAP',
				74=>'RTC PAP',
				87=>'ADGP Control ROOM',
				91=>'SSG PAP',
				92=>'ARP PAP',
				93=>'CSO PAP',
				94=>'SDRF',
				95=>'SWAT',
				100=>'1-CDO',
				110=>'5-IRB',
				115=>'4-IRB',
				123=>'7-IRB',
				128=>'ISTC'
			);*/

		$result = $this->Posting_model->getOSIBattalions();
		$battalions = array();
		foreach ($result as $k => $bat) {
			$battalions[$bat->users_id] = $bat->nick;
		}
		$this->battalions = $battalions;

		return $battalions;
	}
	public function addOfficerPostings()
	{
		if (!(in_array($this->session->userdata('userid'), array(222)) && $this->session->userdata('usertype') == 'adm')) {
			redirect('bt-dashboard');
		}
		//read excel
		//spred sheet one
		$added_by = 222;
		$parent_posting_id = 1344; //1268;//884;//685;//366;//27;
		$bat_id = 222;
		$this->load->model("Posting_model");
		$this->load->library('excel');
		//$objReader = new PHPExcel();
		$tmpfname = "C:/SECURITY_COVER_MAIN_(PAP_IRB)_MAIN.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(7);
		$lastRow = $worksheet->getHighestRow();
		$counter = 1;
		echo '<table>';
		for ($row = 1; $row <= $lastRow; $row++) {
			if (trim($worksheet->getCell('A' . $row)->getValue()) == '' && trim($worksheet->getCell('B' . $row)->getValue()) == '' && trim($worksheet->getCell('C' . $row)->getValue()) != '' && trim($worksheet->getCell('D' . $row)->getValue()) != '' && trim($worksheet->getCell('E' . $row)->getValue()) == '') {
				$name = preg_replace('/^SH.[ ]?/', '', $worksheet->getCell('D' . $row)->getValue());
				echo '<tr><td>' . $counter . '</td><td>' . $name . '</td></tr>';
				$counter++;
				//$this->Posting_model->addPostingCorrection($name,$parent_posting_id,$bat_id,$added_by);
			}
			echo '</table>';/* 
				 echo "<tr><td>";
				 echo $worksheet->getCell('A'.$row)->getValue();
				 echo "</td><td>";
				 echo $worksheet->getCell('B'.$row)->getValue();
				 echo "</td><tr>"; */
		}
		//$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		//$objReader->setReadDataOnly(true);


		//$objPHPExcel = $objReader->load("C:/SECURITY_COVER_MAIN_(PAP_IRB)_MAIN.xlsx");

		die('hi');
		/*$objWorksheet = $objPHPExcel->getActiveSheet();

			$highestRow = $objWorksheet->getHighestRow(); 
			$highestColumn = $objWorksheet->getHighestColumn(); 

			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 
*/
	}
	//let the osi to search the postings by postname
	public function getAllPostingByName()
	{
		$this->load->model('Posting_model');
		$posting_name = $this->input->post('searchPosting');
		$length = 5;
		$start = 0;
		if (null != $this->input->post('length')  && $this->input->post('start') != null) {
			$length = $this->input->post('length');
			$start = $this->input->post('start');
		}
		$orderby = 'name';
		$order = 'asc';
		$postings_objs = $this->Posting_model->getPostingsNObOLS($posting_name, $orderby, $order, $length, $start);
		$postingsIdNamePair = [];
		$new_parent_posting_ids = [];
		foreach ($postings_objs as $k => $postings_obj) {
			if (!in_array($postings_obj->id, array_keys($postingsIdNamePair))) {
				$postingsIdNamePair[$postings_obj->id] = $postings_obj->name;
			}
			if (!in_array($postings_obj->parent_posting_id, $new_parent_posting_ids)) {
				$new_parent_posting_ids[] = $postings_obj->parent_posting_id;
			}
		}
		if (count($new_parent_posting_ids) > 0) {
			$temp_posting_objs = $this->Posting_model->getPostingsByIds($new_parent_posting_ids);
			foreach ($temp_posting_objs as $k => $temp_posting_obj) {
				if (!in_array($temp_posting_obj->id, array_keys($postingsIdNamePair))) {
					$postingsIdNamePair[$temp_posting_obj->id] = $temp_posting_obj->name;
				}
			}
		}
		//get the parent postings 
		//var_dump($postings);
		$data = [];
		foreach ($postings_objs as $k => $posting_obj) {
			$dd = [];
			$dd['radio'] = '<input type="radio" value="' . $posting_obj->id . '"/>';
			$dd['postingName'] = $posting_obj->name;
			$dd['parentPathOfPosting'] = $posting_obj->parent_posting_id;
			$data[] = $dd;
		}
		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getTotalPostingsNObOLS(),
			"recordsFiltered" => $this->Posting_model->getFilteredCountPostingsNObOLS($posting_name),
			"data"	=> $data
			//'post' =>$_POST,
		);
		echo json_encode($output);
	}
	/**
			Here we are updating the posting of employee
			Date: 22.03.2021
	 */
	public function ajax_battalion_update_employee_posting()
	{
		$this->load->library('form_validation');
		$this->load->model("Posting_model");
		$this->load->model("Leave_model");
		$this->load->helper('form');
		$this->load->helper('posting');
		$data = '';
		//if(null!=$this->input->post('submit')){
		//var_dump($_POST);
		$posting_id = $this->input->post('posting_id');
		$additioanl_posting_info_id = $this->input->post('additional_posting_id');
		//get the id of parent of positing id
		$employee_id = $this->input->post('employee_id');
		//echo $employee_id;
		$order_number = $this->input->post('order_no');
		$order_date	  = $this->input->post('order_date');
		$posting_date = $this->input->post('posting_date');
		if ($order_date != '' && $order_date != '') {
			$order_date = substr($order_date, 0, 11) . date("H:i:s");
		} else {
			$order_date = null;
		}
		$type = $this->input->post('type');
		if ($type != null && $type == 'LEAVE') {
			$leave_id = $this->Leave_model->getLeaveIdByPosingId($posting_id);
			//save the leave along side
			$this->form_validation->set_rules('leave_date_from', 'Leave Date From', 'required|callback_valid_date3');
			$this->form_validation->set_rules('leave_date_to', 'Leave Date To', 'required|callback_valid_date3');
			$this->form_validation->set_rules('posting_date', 'Leave Date', 'required|callback_valid_date3|callback_do_not_exceed_current_date');
			$leave_date_from = $this->input->post('leave_date_from');
			$leave_date_to   = $this->input->post('leave_date_to');
		} else {
			//$this->form_validation->set_rules('order_no','Order Number','required');//FUTURE
			$this->form_validation->set_rules('order_date', 'Order Date', 'callback_valid_order_date2');
			$this->form_validation->set_rules('posting_date', 'Posting Date', 'required|callback_valid_date3|callback_do_not_exceed_current_date');
		}
		$leave_date = $posting_date = substr($posting_date, 0, 11) . date("H:i:s");

		$this->form_validation->set_rules('posting_id', 'Posting Name', 'required|callback_is_posting_valid_for_employee_addition_to_current_postings');


		$this->form_validation->set_rules('employee_id', 'Selected Employee', 'required');
		//$this->form_validation->set_rules('parent_posting','Parent Posting','required');
		//insert in database
		//$data['selectedPolicePersonnel'] = $this->Posting_model->getSelectedPolicePersonnel(explode(',',$employee_ids));
		if ($this->form_validation->run() == TRUE) {
			//$this->form_validation->set_rules('order_number','Order Number',"callback_valid_employee_order[".$posting_id.'@!'.$employee_ids.'@!'.$order_number.'@!'.$posting_date."]");
			$posting_date = DateTime::createFromFormat('d-m-Y H:i:s', $posting_date)->format('Y-m-d H:i:s');
			if ($order_date != null && trim($order_date) != '') {
				//echo $order_date;
				$order_date = DateTime::createFromFormat('d-m-Y H:i:s', $order_date)->format('Y-m-d H:i:s');
			} else {
				$order_date = '';
			}
			$employee_ids_can_be_added = array();
			$employee_ids_cannot_be_added = array();

			//select data from posting history
			$employee_ids_ = [$employee_id];
			//var_dump($employee_ids_);
			//	$employees_already_added = $this->Posting_model->getEmployeesAlreadyAdded($posting_id,$order_number,$employee_ids_);
			//$employees_ids_already_added = [];
			//foreach($employees_already_added as $k=>$v){
			//	$employees_ids_already_added[] = $v->employee_id;
			//}
			$employees_ids_already_added = [];
			foreach ($employee_ids_ as $k => $v) {
				if (!in_array($v, $employees_ids_already_added)) {
					$employee_ids_can_be_added[] = $v;
				} else {
					$employee_ids_cannot_be_added[] = $v;
				}
			}
			/* 					var_dump($posting_id);
					var_dump($employee_ids_can_be_added);
					var_dump($order_number);
					var_dump($posting_date);  */

			$data['employee_ids_cannot_be_added'] = $employee_ids_cannot_be_added;
			$data['employee_ids_can_be_added'] = $employee_ids_can_be_added;
			if (count($employee_ids_can_be_added) <= 0) {
				$status = false;
				$message = 'Already Added';
				$errors = [];
			} else {

				$no_of_records_inserted = $this->Posting_model->addPostingInBulk($posting_id, $employee_ids_can_be_added, $order_number, $posting_date, $order_date, $additioanl_posting_info_id);
				//get the posting_history_id
				$posting_history_ids = [];
				$bat_id = $this->session->userdata('userid');
				$posting_history_objects = $this->Posting_model->getPostingHistoryObjects($posting_id, $employee_ids_can_be_added, $order_number, $posting_date, $order_date, $bat_id);
				$employee_id_posting_history_id_pair = [];
				foreach ($posting_history_objects as $k => $posting_history_object) {
					$employee_id_posting_history_id_pair[$posting_history_object->employee_id] = $posting_history_object->id;
				}
				$data1_ = [];
				if ($type != null && $type == 'LEAVE') {
					foreach ($employee_ids_ as $k => $employee_id_) {
						$data1 = [];
						$data1['leave_id'] = $leave_id;
						$data1['employee_id'] = $employee_id_;
						$data1['from_date'] = $leave_date_from;
						$data1['to_date'] = $leave_date_to;
						$data1['leave_date'] = $leave_date;
						$data1['posting_history_id'] = $employee_id_posting_history_id_pair[$employee_id_];
						$data1_[] = $data1;
					}
				}
				$data['no_of_records_inserted'] = $no_of_records_inserted;
				//var_dump($no_of_records_inserted);
				if ($no_of_records_inserted > 0) {
					if ($type != null && $type == 'LEAVE') {
						$a = $this->Leave_model->mark_leave_bulk($data1_);
						if ($a) {
							$leave_status = true;
						} else {
							$leave_status = false;
						}
					}
					$status = true;
					$message = 'Employee\'s Posting updated successfully';
					$errors = [];
					/* $this->session->set_flashdata('success_msg',$no_of_records_inserted.' police personnel(s) are succesfully posted!');
							$_POST['posting_list_name'] = null;
							$_POST['selectedEmployeesIds'] = null;
							$_POST['order_number'] = null;
							$_POST['date'] = null;
							$data['selectedPolicePersonnel'] = null; */
				} else {
					$status = false;
					$message = 'Posting updation failed';
					$errors = [];
				}
			}
		} else {
			$status = false;
			$message = 'Invalid Data';
			$errors_msg = $this->form_validation->error_array();
			$errors = [];
			foreach ($errors_msg as $k => $val) {
				$errors['error_' . $k] = $val;
			}
		}
		//}
		$data = ['status' => $status, 'message' => $message, 'errors' => $errors];
		echo json_encode($data);
		die;
	}
	public function ajaxGetAllPostingHistoryByEmployeeId()
	{
		error_reporting(E_ALL);
		$emp_id = 24144;
		$emp_id = $this->input->post('employee_id');
		$this->load->model('Posting_model');
		//get selected Employee detatil Name, Battalion, regimental no
		$user_info = $this->Posting_model->getTheEmployeeDetail($emp_id);
		if (count($user_info) <= 0) {
			redirect('deployment-history');
		}
		//var_dump($user_info);
		$name = $user_info[0]->name;
		$regimental_no = $user_info[0]->depttno;
		$battalion = $user_info[0]->nick . ' ' . $user_info[0]->nick2;
		$limit = null;
		$start = null;
		if ($_POST["length"] != -1) {
			//$this->db->limit($_POST["length"], $_POST["start"]);
			$limit = $_POST['length'];
			$start = $_POST['start'];
		}
		$search = null;
		if (isset($_POST['search']['value']) && trim($_POST['search']['value']) != '') {
			$search = trim($_POST['search']['value']);
		}
		//get the data from posting_history
		$employee_history_objs = $this->Posting_model->getEmployeeHistory($emp_id, $this->session->userdata('userid'), $search, $limit, $start);
		$posting_history = [];
		$sno = 1;
		$postings = [];
		foreach ($employee_history_objs as $k => $employee_history) {
			$posting = [];
			$posting['sno'] = $sno;
			$posting['posting_name'] = $employee_history->name;
			if ($employee_history->title != null) {
				$posting['posting_name'] .= ' - ' . $employee_history->title;
				if ($employee_history->type_title != null) {
					$posting['posting_name'] .= ' (' . $employee_history->type_title . ')';
				}
			}
			$posting['order_no'] = $employee_history->order_no;
			$posting['battalion'] = $employee_history->nick;
			$posting['posting_date'] =                                        DateTime::createFromFormat('Y-m-d H:i:s', $employee_history->posting_date)->format('d-m-Y h:i:s a');
			if ($employee_history->order_date == '0000-00-00 00:00:00') {
				$posting['order_date'] = '';
			} else {
				$posting['order_date'] = DateTime::createFromFormat('Y-m-d H:i:s', $employee_history->order_date)->format('d-m-Y h:i:s a');
			}
			$sno++;
			$postings[] = $posting;
		}
		//var_dump($employee_history);
		//get the name of selected postings
		//get the name of selected battalions
		//$data['history'] = $employee_history;
		//$this->load->view('Postings/employee_history',$data);
		//$data = [];
		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getEmployeeHistoryTotalCount($emp_id, $this->session->userdata('userid')),
			"recordsFiltered" => $this->Posting_model->getEmployeeHistoryTotalFilteredCount($emp_id, $this->session->userdata('userid'), $search),
			"data" => $postings,
			'name' => $name,
			'regimental_no' => $regimental_no,
			'battalion' => $battalion,
			'post_data' => $_POST['search']['value']
		);
		echo json_encode($output);
		//echo json_encode($data);
		die;
	}
	/**
			only display the  deployment reports list page
	 */
	public function caDeploymentReportList()
	{
		$data = [];
		$this->load->view('Ca/deployment_report/deployment_report_list', $data);
	}
	/**
			generate the data for datatable for generating the list of deployment reports
	 */

	public function ajaxCaDeploymentReportList()
	{
		//get the reports
		$this->load->model('DeploymentReport_model');
		$deployment_report_title = $this->input->post('deployment_report_title');
		$deployment_report_description = $this->input->post('deployment_report_description');
		$where = ['title' => $deployment_report_title, 'description' => $deployment_report_description];
		$reports_objs = $this->DeploymentReport_model->getReportsList($where);
		$reports = [];
		$counter = 1;
		//order by

		foreach ($reports_objs as $k => $report_obj) {
			$temp_report = [];
			$temp_report['sno'] = $counter;
			$temp_report['title'] = $report_obj->title;
			$temp_report['description'] = $report_obj->description;
			$temp_report['created'] = $report_obj->created;
			$temp_report['action'] = '<a href="ca-deployment-reports-edit/' . $report_obj->id . '" class="glyphicon glyphicon-pencil" style="color:black;" title="Edit Deployment Report"></a> &nbsp; <a href="ca-deployment-reports-delete/' . $report_obj->id . '" class="glyphicon glyphicon-trash" style="color:red;" title="Delete Deployment Report"></a>';
			$reports[] = $temp_report;
			$counter++;
		}
		$output = array(
			//"draw" =>intval(isset($_POST['draw'])?$_POST['draw']:1),
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->DeploymentReport_model->getDeploymentReportTotalCount(),
			"recordsFiltered" => $this->DeploymentReport_model->getDeploymentReportTotalFilteredCount($where),
			"data" => $reports,
			/* 'name'=>$name,
				'regimental_no'=>$regimental_no,
				'battalion'=>$battalion,
				'post_data'=>$_POST['search']['value'] */
		);
		echo json_encode($output);
		//echo json_encode($data);
		die;
	}
	/**
			add the the deployment report
	 */
	public function caDeploymentReportAdd()
	{
		$this->load->model('DeploymentReport_model');
		$this->load->library('form_validation');
		$data = [];
		if ($this->input->post('submit')) {
			//get thte data
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			//validate it
			$this->form_validation->set_rules('title', 'Deployment Report Title', 'required');
			$this->form_validation->set_rules('description', 'Deployment Report Description', 'required');
			if ($this->form_validation->run() == TRUE) {
				//add it
				if ($this->DeploymentReport_model->addDeploymentReport($title, $description)) {
					$this->session->set_flashdata('success_msg', 'Deployment Report has added succesfully !');
					redirect('ca-deployment-reports');
				} else {
					$this->session->set_flashdata('error_msg', 'Deployment Report Addition Failed.');
				}
			} else {
				//show error
			}
		}
		$this->load->view("Ca/deployment_report/add", $data);
	}
	/**
			update the the deployment report
			$id : deployment report id
	 */
	public function caDeploymentReportEdit($id)
	{
		$this->load->model('DeploymentReport_model');
		$this->load->library('form_validation');
		$data = [];
		$dep_rep = $this->DeploymentReport_model->getDeploymentReport($id);
		if (count($dep_rep) == 1) {
			//var_dump($dep_rep[0]);
			$data['dep_rep'] = $dep_rep[0];
		} else {
			$this->session->set_flashdata('error_msg', 'Deployment Report Not Found.');
			redirect('ca-deployment-reports');
		}
		if ($this->input->post('submit')) {
			//get thte data
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			//validate it
			$this->form_validation->set_rules('title', 'Deployment Report Title', 'required');
			$this->form_validation->set_rules('description', 'Deployment Report Description', 'required');
			if ($this->form_validation->run() == TRUE) {
				//add it
				if ($this->DeploymentReport_model->updateDeploymentReport($id, $title, $description)) {
					$this->session->set_flashdata('success_msg', 'Deployment Report has updated succesfully !');
					redirect('ca-deployment-reports');
				} else {
					$this->session->set_flashdata('error_msg', 'Deployment Report Updation Failed.');
				}
			} else {
				//show error
			}
		}

		$this->load->view("Ca/deployment_report/edit", $data);
	}
	/**
			Delete the Deployment Report by id 
	 */
	public function caDeploymentReportDelete($id)
	{
		$this->load->model('DeploymentReport_model');
		if ($this->DeploymentReport_model->deleteDeploymentReport($id)) {
			$this->session->set_flashdata('success_msg', 'Deployment Report has deleted succesfully !');
		} else {
			$this->session->set_flashdata('error_msg', 'Deployment Report Deletion Failed.');
		}
		redirect('ca-deployment-reports');
	}
	/**
			will return the selected posting's view in the selected deployment report ONE_LINE,EXPANDED,''(empty)
	 */
	public function getPostingViewInSelectedDeploymentReport()
	{
		//posting_consolidate_deployment_report_view
		$posting_id = $this->input->post('posting_id');
		$deployment_report_id = $this->input->post('deployment_report_id');
		$this->load->model('Posting_model');
		$view = $this->Posting_model->getPostingViewInSelectedDeploymentReport($posting_id, $deployment_report_id);
		echo json_encode(['view' => $view]);
	}
	/**
			filter rank, date
			sanction strength list
	 */
	public function sanctionStrengthList()
	{
		$this->load->library('form_validation');
		$this->load->model('RankGroups_model');
		$data = [];
		$ranks = [];
		//$ranks[''] = '--Select Rank--';
		$rank_group_objects = $this->RankGroups_model->getRankGroups();
		foreach ($rank_group_objects as $k => $rank_group_object) {
			$ranks[$rank_group_object->id] = $rank_group_object->title;
		}

		$data['rank_groups'] = $ranks;
		$this->load->view("Postings/sanction_strength/list", $data);
	}
	/**
			filters by date, rank
			return a json object containing the list of sanction strengths
	 */
	public function ajaxSanctionStrengthListAjax()
	{
		$this->load->model('Posting_model');
		$bat_id = $this->session->userdata('userid');
		$bat_ids = [$bat_id];
		$ranks = null;
		$date = null;
		if (null != $this->input->post('ranks')) {
			$ranks = $this->input->post('ranks');
		}
		if (null != $this->input->post('date')) {
			$date = $this->input->post('date');
		}
		$sanction_strength_objects = $this->Posting_model->getSanctionStrengthList($bat_ids, $date, $ranks, 2, 1);
		$sanction_strength = [];
		$i = 1;
		foreach ($sanction_strength_objects as $k => $sanction_strength_object) {
			$temp = [];
			$temp['sno'] = $i;
			$temp['rank_group_id'] = $sanction_strength_object->title;
			$temp['date'] = $sanction_strength_object->ssdate;
			$temp['strength'] = $sanction_strength_object->ssstrength;
			$temp['bat_id'] = $sanction_strength_object->battalion_name;
			$temp['edited_by'] = $sanction_strength_object->edited_by_battalion_name;
			$temp['action'] = '<a href="#" onClick="showHistory(' . $sanction_strength_object->ssrank_group_id . ',\'' . $sanction_strength_object->title . '\')">History</a>';
			$sanction_strength[] = $temp;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getTotalSanctionStrength(),
			"recordsFiltered" => $this->Posting_model->getTotalFilteredSanctionStrength($bat_ids, $date, $ranks, 2, 1),
			"data" => $sanction_strength
		);
		echo json_encode($output);
	}
	/**
			Add the sanction strength by Battalion
	 */
	public function sanctionStrengthAdd()
	{
		$this->load->library('form_validation');
		$this->load->model('RankGroups_model');
		$this->load->model('Posting_model');
		$this->load->library('form_validation');
		if (null != $this->input->post('submit')) {
			$rank_group_id = $this->input->post('rank_group_id');
			$strength = $this->input->post('strength');
			$date = date('Y-m-d H:i:s');
			$bat_id = $this->session->userdata('userid');
			$edited_by_id = $this->session->userdata('userid');
			$this->form_validation->set_rules('rank_group_id', 'Rank', 'required');
			$this->form_validation->set_rules('strength', 'Strength', 'required');
			if ($this->form_validation->run() == true) {
				$a = $this->Posting_model->addSanctionStrength($rank_group_id, $date, $strength, $bat_id, $edited_by_id);
				if ($a) {
					$this->session->set_flashdata('success_msg', 'Sanction Strength added successfully!');
					redirect('sanction-strength');
				} else {
					$this->session->set_flashdata('error_msg', 'Sanction Strength addition Failed!');
				}
			}
		}
		$ranks = [];
		$ranks[''] = '--Select Rank--';
		$rank_group_objects = $this->RankGroups_model->getRankGroups();
		foreach ($rank_group_objects as $k => $rank_group_object) {
			$ranks[$rank_group_object->id] = $rank_group_object->title;
		}

		$data['ranks'] = $ranks;
		$this->load->view("Postings/sanction_strength/add", $data);
	}
	/**
			get the sanction strength history list
	 */
	public function ajaxSanctionStrengthHistoryList()
	{
		//var_dumP($this->input->post('start'));
		$this->load->model('Posting_model');
		$bat_id = $this->session->userdata('userid');
		$bat_ids = [$bat_id];
		$ranks = null;
		$dateFilter = null;
		$dateFrom = null;
		$dateTo = null;
		$orderby = 'date';
		$order = 'desc';
		$length = 10;
		$start = 0;
		if (null != $this->input->post('rank_group_id')) {
			$ranks = [$this->input->post('rank_group_id')];
		}
		//var_dump($this->input->post('dateFromToFilter'));
		if (null != $this->input->post('dateFromToFilter') && $this->input->post('dateFromToFilter') != 'false') {
			$dateFilter = true;
			if (null != $this->input->post('dateFrom')) {
				$dateFrom = $this->input->post('dateFrom');
			}
			if (null != $this->input->post('dateTo')) {
				$dateTo = $this->input->post('dateTo');
			}
		}

		if (null != $this->input->post('orderby')) {
			$orderby = $this->input->post('orderby');
		}
		if (null != $this->input->post('order')) {
			//var_dump($order);
			$order = $this->input->post('order');
			$orderby = $this->sanction_strength_order_by[$order[0]['column']];
			$order = $order[0]['dir'];
		}

		//echo $length.' '.$start;
		if (null != $this->input->post('length')) {
			$length = $this->input->post('length');
			$start = $this->input->post('start');
		}
		//echo $length.' '.$start;
		$sanction_strength_history_objects = $this->Posting_model->getSanctionStrengthHistoryList($bat_ids, $ranks, $dateFilter, $dateFrom, $dateTo, $orderby, $order, $length, $start);
		$sanction_strength_history = [];
		$i = 1;
		foreach ($sanction_strength_history_objects as $k => $sanction_strength_history_object) {
			$temp = [];
			$temp['sno'] = $i;
			$temp['date'] = $sanction_strength_history_object->date;
			$temp['strength'] = $sanction_strength_history_object->strength;
			$sanction_strength_history[] = $temp;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getTotalSanctionStrengthHistoryList($bat_ids, $ranks),
			"recordsFiltered" => $this->Posting_model->getTotalFilteredSanctionStrengthHistory($bat_ids, $ranks, $dateFilter, $dateFrom, $dateTo, $orderby, $order),
			"data" => $sanction_strength_history,
			"post" => $_POST
		);
		echo json_encode($output);
	}
	/**
			Let the admin view all the sanction strength of all selected battalions
	 */
	public function adminSanctionStrengthList()
	{
		$this->load->model('RankGroups_model');
		$this->load->model('Posting_model');
		$this->load->library('form_validation');
		$data = [];
		$battalions = [];
		//$battalions[''] = '--Selecte Battalions--';
		$battalion_objects = $this->Posting_model->getAllOsis();

		foreach ($battalion_objects as $k => $battalion_object) {
			$battalions[$battalion_object->users_id] = $battalion_object->nick;
		}
		$data['battalions'] = $battalions;
		$ranks = [];
		//$ranks[''] = '--Select Rank--';
		$rank_group_objects = $this->RankGroups_model->getRankGroups();
		foreach ($rank_group_objects as $k => $rank_group_object) {
			$ranks[$rank_group_object->id] = $rank_group_object->title;
		}
		$data['rank_groups'] = $ranks;
		$this->load->view('Ca/sanction_strength/list', $data);
	}
	/**
			Ajax which will fetch the list of all the sanction strength stored in database of the various selected battalions
	 */
	public function adminAjaxSanctionStrengthList()
	{
		$this->load->model('Posting_model');
		$this->load->model('RankGroups_model');
		$bat_ids = null;
		$selected_ranks = null;
		$datetimeFromToFilter = null;
		$dateFrom = null;
		$dateTo = null;
		$orderby = null;
		$order = null;
		$length = 10;
		$start = 0;
		//fetch all the battalions
		//fetch all the rank groups
		if (null != $this->input->post('battalions')) {
			$bat_ids = $this->input->post('battalions');
		}
		if (null != $this->input->post('selected_ranks')) {
			$selected_ranks = $this->input->post('selected_ranks');
		}
		if (null != $this->input->post('length')) {
			$length = $this->input->post('length');
			$start = $this->input->post('start');
		}

		if (null != $this->input->post('datetimeFromToFilter')) {
			$datetimeFromToFilter = $this->input->post('datetimeFromToFilter');
		}
		if (null != $this->input->post('dateFrom')) {
			$dateFrom = $this->input->post('dateFrom');
		}
		if (null != $this->input->post('dateTo')) {
			$dateTo = $this->input->post('dateTo');
		}
		//if(null!=$this->input->post('
		$sanction_strength_objects = $this->Posting_model->getSanctionStrengthHistoryList($bat_ids, $selected_ranks, $datetimeFromToFilter, $dateFrom, $dateTo, $orderby, $order, $length, $start);
		$i = $start + 1;
		$sanction_strength_data = [];
		$battalions = [];
		//$battalions[''] = '--Selecte Battalions--';
		$battalion_objects = $this->Posting_model->getAllOsis();

		foreach ($battalion_objects as $k => $battalion_object) {
			$battalions[$battalion_object->users_id] = $battalion_object->nick;
		}

		$ranks = [];
		//$ranks[''] = '--Select Rank--';
		$rank_group_objects = $this->RankGroups_model->getRankGroups();
		foreach ($rank_group_objects as $k => $rank_group_object) {
			$ranks[$rank_group_object->id] = $rank_group_object->title;
		}
		foreach ($sanction_strength_objects as $k => $sanction_strength_object) {
			$sanction_strength = [];
			$sanction_strength['sno'] = $i;
			$sanction_strength['battalion'] = $battalions[$sanction_strength_object->bat_id];
			$sanction_strength['rank_group'] = $ranks[$sanction_strength_object->rank_group_id];
			$sanction_strength['date'] = $sanction_strength_object->date;
			$sanction_strength['strength'] = $sanction_strength_object->strength;
			$sanction_strength['edited_by'] = $battalions[$sanction_strength_object->edited_by_id];
			$sanction_strength['action'] = '<a href="ca-sanction-strength-edit/' . $sanction_strength_object->id . '">Edit</a> | <a href="ca-sanction-strength-delete/' . $sanction_strength_object->id . '">Delete</a>';
			$sanction_strength_data[] = $sanction_strength;
			$i++;
		}
		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getTotalSanctionStrengthHistoryList($bat_ids, $selected_ranks),
			"recordsFiltered" => $this->Posting_model->getTotalFilteredSanctionStrengthHistory($bat_ids, $selected_ranks, $datetimeFromToFilter, $dateFrom, $dateTo),
			"data" => $sanction_strength_data,
			"post" => $_POST
		);
		echo json_encode($output);
	}
	/**
			edit the sancton strength by the admin
	 */
	public function adminSanctionStrengthEdit($id)
	{
		$this->load->library('form_validation');
		$this->load->model('RankGroups_model');
		$this->load->model('Posting_model');
		$data = [];
		$this->load->library('form_validation');

		$sanction_strength = null;
		$sanction_strength_objects = $this->Posting_model->getSanctionStrengthById($id);

		if (count($sanction_strength_objects) <= 0) {
			$this->session->set_flashdata('error_msg', 'Do not Exists');
			redirect('ca-sanction-strength');
		}
		$data['sanction_strength_object'] = $sanction_strength_objects[0];


		if (null != $this->input->post('submit')) {
			//$rank_group_id = $this->input->post('rank_group_id');
			$strength = $this->input->post('strength');
			$date = date('Y-m-d H:i:s');
			//$bat_id = $this->session->userdata('userid');
			$edited_by_id = $this->session->userdata('userid');
			//$this->form_validation->set_rules('rank_group_id','Rank','required');
			$this->form_validation->set_rules('strength', 'Strength', 'required');
			if ($this->form_validation->run() == true) {
				$a = $this->Posting_model->adminUpdateSanctionStrength($id, $date, $strength, $edited_by_id);
				if ($a) {
					$this->session->set_flashdata('success_msg', 'Sanction Strength updated successfully!');
					redirect('ca-sanction-strength');
				} else {
					$this->session->set_flashdata('error_msg', 'Sanction Strength udpation Failed!');
				}
			}
		}
		$ranks = [];
		$ranks[''] = '--Select Rank--';
		$rank_group_objects = $this->RankGroups_model->getRankGroups();
		foreach ($rank_group_objects as $k => $rank_group_object) {
			$ranks[$rank_group_object->id] = $rank_group_object->title;
		}
		$data['ranks'] = $ranks;
		//$this->load->view("Postings/sanction_strength/add",$data);

		$this->load->view('Ca/sanction_strength/edit', $data);
	}
	public function adminSanctionStrengthDelete($id)
	{
		$this->load->model('Posting_model');
		$a = $this->Posting_model->deleteSanctionStrength($id);
		if ($a) {
			$this->session->set_flashdata('success_msg', 'Sanction Strength deleted successfully!');
			redirect('ca-sanction-strength');
		} else {
			$this->session->set_flashdata('error_msg', 'Sanction Strength deletion Failed!');
		}
	}
	/*
			get the not reported employees from the database of current selected battalison
			input battalions
		*/
	public function notReportedEmployees()
	{
		$this->load->model("Posting_model");
		$current_bat_id = $this->session->userdata('userid');
		$current_bat_ids = [$current_bat_id];
		$reported = 'NO';
		$before_date = date('Y-m-d'); //'2021-06-02';
		$order_by = "date";
		$order = 'desc';
		$relieved = 'Yes';
		$reported_employees_objects = $this->Posting_model->getNotReportedEmployees($current_bat_ids, $reported, $before_date, $relieved, $order_by, $order);
		foreach ($reported_employees_objects as $k => $val) {
			$reported_employees_objects[$k]->reported_button = '<button class="btn btn-primary" onClick="markEmployeeReportedYes()">Mark Reported</button>';
		}
		$data['not_reported_employees'] = $reported_employees_objects;

		//var_dump($reported_employees_objects);
		$this->load->view('Postings/notReportedEmployees', $data);
	}
	public function ajaxNotReportedEmployees()
	{
		$this->load->model("Posting_model");
		$current_bat_id = $this->session->userdata('userid');
		$current_bat_ids = [$current_bat_id];
		$reported = 'NO';
		$before_date = date('Y-m-d');
		$order_by = "date";
		$order = 'desc';
		$relieved = 'Yes';
		$length = 10;
		$start = 0;
		$reported_employees_objects = $this->Posting_model->getNotReportedEmployees($current_bat_ids, $reported, $before_date, $relieved, $order_by, $order, $length, $start);
		$not_reported_employees = [];
		$sno = 1;
		foreach ($reported_employees_objects as $k => $val) {

			$temp_employee = [];
			$temp_employee['sno'] = $sno;
			$temp_employee['name'] = $val->name;
			$temp_employee['battalion'] = $val->nick . '/' . $val->depttno;
			$temp_employee['date'] = $val->date;
			$temp_employee['action']  = '<button class="btn btn-primary" onClick="markEmployeeReportedYes(' . $val->deinduction_id . ')">Mark Reported</button>';
			$not_reported_employees[] = $temp_employee;
			$sno++;
		}
		$data['not_reported_employees'] = $reported_employees_objects;


		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Posting_model->getTotalNotReportedEmployees($current_bat_ids, $reported, $before_date, $relieved, $order_by, $order, $length, $start),
			"recordsFiltered" => $this->Posting_model->getFilteredCountNotReportedEmployees($current_bat_ids, $reported, $before_date, $relieved, $order_by, $order, $length, $start),
			"data" => $not_reported_employees
			//"post"=>$_POST
		);
		echo json_encode($output);
		//var_dump($reported_employees_objects);
		//$this->load->view('Postings/notReportedEmployees',$data);
	}
	/**
			Marking the employee report to yes
			ie. Empoloyee has reported in the particular battalion for providing his services
	 */
	public function ajaxMarkEmplkoyeeReportedYes()
	{
		$this->load->model("Posting_model");
		//shouldbe a battalion user
		$deinduction_id = $this->input->post('id');
		$bat_id = $this->session->userdata('userid');
		$a = $this->Posting_model->markEmployeeReportYes($deinduction_id, $bat_id);
		if ($a) {
			echo 'SUCCESS';
		} else {
			echo "FAIL";
		}
	}
	/**
			Here we are updating the posting of employee
			Date: 22.03.2021
	 */
	public function ajax_battalion_update_employee_leave()
	{
		$this->load->library('form_validation');
		$this->load->model("Leave_model");
		$this->load->helper('form');
		$this->load->helper('posting');
		$data = '';
		// var_dump($_POST);
		$posting_id = $this->input->post('posting_id');
		//get the id of parent of positing id
		$employee_id = $this->input->post('employee_id');
		//echo $employee_id;
		$leave_date_from = $this->input->post('leave_date_from');
		$leave_date_to	  = $this->input->post('leave_date_to');
		$leave_date = $this->input->post('leave_date');

		if ($leave_date_from != null && trim($leave_date_from) != '') {
			$leave_date_from = substr($leave_date_from, 0, 11) . ' ' . date("H:i:s");
		} else {
			$leave_date_from = null;
		}
		if ($leave_date_to != null && trim($leave_date_to) != '') {
			$leave_date_to = substr($leave_date_to, 0, 11) . ' ' . date("H:i:s");
		} else {
			$leave_date_to = null;
		}
		if ($leave_date != null && trim($leave_date) != '') {
			$leave_date = substr($leave_date, 0, 11) . ' ' . date("H:i:s");
		} else {
			$leave_date = null;
		}

		$leave_id = $this->Leave_model->getLeaveIdByPosingId($posting_id);

		$this->form_validation->set_rules('posting_id', 'Posting Name', 'required|callback_is_posting_valid_for_marking_leave_of_employee');
		$this->form_validation->set_rules('leave_date_from', 'Leave Date From', 'required|callback_valid_date2');
		$this->form_validation->set_rules('leave_date_to', 'Leave Date To', 'required|callback_valid_date2');
		$this->form_validation->set_rules('leave_date', 'Leave Date', 'required|callback_valid_date2');
		$this->form_validation->set_rules('employee_id', 'Selected Employee', 'required|callback_is_valid_employee');
		//$this->form_validation->set_rules('parent_posting','Parent Posting','required');
		//insert in database
		//$data['selectedPolicePersonnel'] = $this->Posting_model->getSelectedPolicePersonnel(explode(',',$employee_ids));
		if ($this->form_validation->run() == TRUE) {
			$data = [];
			$data['leave_id'] = $leave_id;
			$data['employee_id'] = $employee_id;
			$data['from_date'] = $leave_date_from;
			$data['to_date'] = $leave_date_to;
			$data['leave_date'] = $leave_date;
			$a = $this->Leave_model->mark_leave($data);
			if ($a) {
				$status = true;
				$message = 'Leave Marked successfully!';
			} else {
				$status = false;
				$message = 'Marking Leave Failed!';
			}
			$data = ['status' => $status, 'message' => $message];
			echo json_encode($data);
			die;
		} else {
			$status = false;
			$message = 'Invalid Data';
			$errors_msg = $this->form_validation->error_array();
			$errors = [];
			foreach ($errors_msg as $k => $val) {
				$errors['error_' . $k] = $val;
			}
			$data = ['status' => $status, 'message' => $message, 'errors' => $errors];
			echo json_encode($data);
			die;
		}
		//}

	}
	public function is_posting_valid_for_marking_leave_of_employee($posting_id)
	{
		$this->load->model('Leave_model');
		$id = $this->Leave_model->getLeaveIdByPosingId($posting_id);
		if ($id) {
			return true;
		} else {
			$this->form_validation->seMessage('is_posting_valid_for_marking_leave_of_employee', 'Invalid Posting');
			return false;
		}
	}
	public function is_valid_employee()
	{
		return true;
	}
	public function getCurrentPostingOfEmployeeByEmplyeeId($employee_id)
	{
		$this->load->model("Posting_model");
		$current_posting = $this->Posting_model->getCurrentPostingOfEmployeeByEmplyeeId($employee_id);
	}
	public function getBeltNumbers()
	{
		$this->load->model('Posting_model');
		$this->load->model('Osi_model');
		$term = $this->input->get('term');
		$page = $this->input->get('page');
		$bat_ids = $this->input->get('bat_id');
		/*$battalion_objs = $this->Osi_model->fetchinfo('users',array('user_log' => 4 ));
					$battalions = [];
					foreach($battalion_objs as $k=>$val){
						$battalions[$val->users_id]=$val->nick;
					}*/
		if ($page == null) {
			$page = 1;
		}
		$data_obj = $this->Posting_model->getBeltNumbers($term, $page, $bat_ids);
		$total = $this->Posting_model->getTotalBeltNumbers($term, $page, $bat_ids);

		$data = [];
		foreach ($data_obj as $k => $val) {
			$data[] = ['id' => $val->depttno, 'text' => $val->depttno];
		}
		$more = false;
		$limit = 10;
		if ($total > $page * $limit) {
			$more = true;
		}
		echo json_encode(['results' => $data, 'more' => $more]);
	}
	public function updateHistory($id, $deployment_report_id_ = null)
	{
		if (!(in_array($this->session->userdata('userid'), array(222)) && $this->session->userdata('usertype') == 'adm')) {
			redirect('bt-dashboard');
		}
		if ($id == 1) {
			redirect('posting-list');
		}
		if ($deployment_report_id_ != null) {
			$data['deployment_report_id'] = $deployment_report_id_;
		}
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Osi_model');
		$this->load->model('DeploymentReport_model');
		$dep_reports_objs = $this->DeploymentReport_model->getReportsList();
		$deployment_reports = [];
		$deployment_reports[''] = '--DEPLOYMENT REPORT NOT SELECTED--';
		foreach ($dep_reports_objs as $k => $dep_rep_obj) {
			$deployment_reports[$dep_rep_obj->id] = $dep_rep_obj->title;
		}
		$data['deployment_reports'] = $deployment_reports;
		$battalion_objs = $this->Osi_model->fetchinfo('users', array('user_log' => 4));
		$battalions = [];
		$battalions[-1] = 'ALL';
		foreach ($battalion_objs as $k => $val) {
			$battalions[$val->users_id] = $val->nick;
		}
		$data['battalions'] = $battalions;
		$data['views'] = ['' => '--VIEW NOT SELECTED--', 'ONE_LINE' => 'ONE LINE', 'EXPANDED' => 'EXPANDED'];
		if (null != $id) {
			$data['id'] = $id;
			$this->load->model('Posting_model');
			$result = $this->Posting_model->getPostingById($id);
			if ($result == null) {
				die('not found');
				redirect('posting-list');
			}
			$result = $result[0];
			if ($result->view == null) {
				$result->view = '';
			}
			if ($result->deployment_report_id == null) {
				$result->deployment_report_id = ''; //not selected
			}
			$route_array = $this->getPostingRouteOf($id);
			$data['route'] = $route_array;
			$data['posting'] = $result;
			if (null != $data['posting']) {
				if (null != $this->input->post('submit')) {
					//save the data
					$name = $this->input->post('new_duty');
					$parent_posting = $this->input->post('parent_posting');
					$battalion = $this->input->post('battalion');
					$view = $this->input->post('views');
					$order_by_ = $this->input->post('order_by_');
					$deployment_report_id = $this->input->post('deployment_report'); //1;deployment_report_id
					$this->form_validation->set_rules('new_duty', 'Posting Name', 'required');
					$this->form_validation->set_rules('parent_posting', 'Parent Posting', 'required');
					$this->form_validation->set_rules('battalion', 'Parent Posting', 'required');
					$this->form_validation->set_rules('views', 'Posting View', 'required');
					$this->form_validation->set_rules('order_by_', 'Posting View', 'callback_valid_order_by_index');
					$old_posting_id = $this->Posting_model->getRootPostingId($id);
					if ($this->form_validation->run()) {
						$a = $this->Posting_model->updatePosting(array('name' => $name, 'parent_posting_id' => $parent_posting, 'shown_in' => $battalion, 'view' => $view, 'order_by_' => $order_by_, 'old_posting_id' => $old_posting_id, 'bat_id' => $this->session->userdata('userid'), 'added_by' => $this->session->userdata('userid')), $deployment_report_id);
						if ($a == true) {
							$this->session->set_flashdata('success_msg', 'Posting is Updated and its hisotry is created succesfully!');
							redirect('posting-list');
						}
					} else {
						$this->load->view('Ca/posting/updateHistory', $data);
					}
				} else {
					$this->load->view('Ca/posting/updateHistory', $data);
				}
			} else {
				redirect('posting-list');
			}
		} else {
			redirect('posting-list');
		}
	}
	public function ajaxGetAdditionalPostingInfo()
	{
		$this->load->model('Posting_model');
		$selected_posting_id = $this->input->post('selected_posting_id');

		$parent_ids_objs = $this->Posting_model->getTheParentPostingIdsOfPostingById($selected_posting_id);
		$parent_ids = [-1 => $selected_posting_id];
		//                    var_dump($selected_posting_id);
		foreach ($parent_ids_objs as $k => $val) {
			//                        var_dump($val);
			//                        echo '<hr>';
			$parent_ids[$val->id_] = $val->parent_posting_id_;
		}

		//                    var_dump($parent_ids);
		$filters = ['deleted' => 'false'];

		$objects = $this->Posting_model->getAdditionalPostings($parent_ids, $filters);
		echo json_encode(['data' => $objects]);
	}
	public function GetPostingHistoryRecordsByEmployeeId(){
		$this->load->model('Posting_model');
		$employee_id = 5962;
		//$data_objs = $this->Posting_model->GetPostingHistoryRecordsByEmployeeId($employee_id);
		//$history = [];
		/*foreach($data_objs as $k=>$val){

		}*/
		$data = [];
		//$data['history'] = $data_objs;
		$this->load->view('Ca/posting/getPostingHistoryRecords', $data);
	}
	public function AjaxGetPostingHistoryRecordsByEmployeeId(){
		$this->load->model('Posting_model');
		$employee_id = 5962;
		$data_objs = $this->Posting_model->GetPostingHistoryRecordsByEmployeeId($employee_id);
		$history = [];
		foreach($data_objs as $k=>$val){

		}
		$data['data'] = $data_objs;
		$data['totalRecords'] = 100;
		$data['filteredRecords'] = 100;
		echo json_encode($data);
		//$this->load->view('Ca/posting/getPostingHistoryRecords', $data);
	}
}
