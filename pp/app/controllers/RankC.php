<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class RankC extends CI_Controller
	{	
		public function __construct(){
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
			
			//$this->$total_row = false;
		}
		/**
			Get the list of ranks by passing the parameters
		*/
		public function getRanks($search=null,$orderby=null,$order_dir=null,$length=null,$start=null){
			$this->load->model('Rank_model'); 
			$ranks_objects = $this->Rank_model->getRanks($search,$orderby,$order_dir,$length,$start);
			$ranks = [];
			$i=1+$start;
			foreach($ranks_objects as $k=>$rank_obj){
				$temp_data = [];
				$temp_data['sno'] = $i;
				$temp_data['name'] = $rank_obj->name;
				$temp_data['description'] = $rank_obj->rank_description;
				$temp_data['short_name'] = $rank_obj->rank_short_name;
				$temp_data['group_rank'] = $rank_obj->rank_groups_title;
				$temp_data['action'] = '<a href="'.base_url().'ca-ranks-edit/'.$rank_obj->rank_id.'">Edit</a>| <a href="'.base_url().'ca-ranks-delete/'.$rank_obj->rank_id.'">Delete</a>';
				$ranks[] = $temp_data;
				$i++;
			}
			$total_filtered_ranks = $this->Rank_model->getTotalFilteredRanks($search,$orderby,$order_dir,$length,$start);
			$total_ranks = $this->Rank_model->getTotalRanks();
			$data = [
				"data"=>$ranks,
				"recordsTotal"=>$total_ranks,
				"recordsFiltered"=>$total_filtered_ranks,
				
			];
			return $data;
		}
		/** 
			Rank group List page
		*/
		public function ranksList(){
			$this->load->view('Ca/ranks/list');
		}
		/** 
			Rank group List Ajax data
		*/
		public function rankListAjax(){
			//var_dump($_POST);
			$length=null;
			$start =null;
			if(null!=$this->input->post('length') && $this->input->post("length") != -1){
				$length=$this->input->post('length');
				$start = $this->input->post('start');
			}
			$search1 = $this->input->post('search')['value'];
			//var_dump($this->input->post('search')['value']);
			$search = [];
			if(null==$search1 || empty($search1)){
				$search = null;
			}else{
				$search['all_columns'] = $search1;
			}
			$data = $this->getRanks($search,null,null,$length,$start);
			$output = array(
				"draw" =>intval($_POST['draw']),
				"recordsTotal" =>$data['recordsTotal'],//$this->Posting_model->getTotalEmployees(),
				"recordsFiltered" =>$data['recordsFiltered'],//$this->Posting_model->getTotalFilteredEmployees(),
				"data"	=>$data['data'],
				//"post" => $_POST
			);
			echo json_encode($output);
		}
		/**
			Add the Rank Group
		*/
		public function rankAdd(){
			$this->load->library('form_validation');
			$this->load->model("Rank_model");
			$this->load->model("RankGroups_model");
			if(null!=$this->input->post('submit')){
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$short_name = $this->input->post('short_name');
				$rank_group_id = $this->input->post('rank_group_id');
				$this->form_validation->set_rules('name','Rank Name','required');
				$this->form_validation->set_rules('description','Description','required');
				$this->form_validation->set_rules('short_name','Short Name','required');
				$this->form_validation->set_rules('rank_group_id','Rank Group','required');
				if($this->form_validation->run()!=false){
					$a = $this->Rank_model->addRank($name,$description,$short_name,$rank_group_id);
					if($a){
						$this->session->set_flashdata('success_msg','Rank Saved Successfully!');
						redirect('ca-ranks');
					}else{
						$this->session->set_flashdata('error_msg','Failed to save Rank!');
					}
				}
			}
			$rank_group_objects = $this->RankGroups_model->getRankGroups();
			$rank_groups = [];
			$rank_groups[''] = '--Select Rank Group--';
			foreach($rank_group_objects as $k=>$rank_group_obj){
				$rank_groups[$rank_group_obj->id] = $rank_group_obj->title.' ->('.substr($rank_group_obj->description,0,30).')';
			}
			$data['rank_groups'] = $rank_groups;
			$this->load->view('Ca/ranks/add',$data);
		}
		
		/**
			Edit the Rank Group
		*/
		public function rankEdit($id){
			$this->load->library('form_validation');
			$this->load->model("RankGroups_model");
			$this->load->model("Rank_model");
			
			if(null!=$this->input->post('submit')){
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$short_name = $this->input->post('short_name');
				$rank_group_id = $this->input->post('rank_group_id');
				$this->form_validation->set_rules('name','Rank Name','required');
				$this->form_validation->set_rules('description','Description','required');
				$this->form_validation->set_rules('short_name','Short Name','required');
				$this->form_validation->set_rules('rank_group_id','Rank Group','required');
				if($this->form_validation->run()!=false){
					$a = $this->Rank_model->editRank($id,$name,$description,$short_name,$rank_group_id);
					if($a){
						$this->session->set_flashdata('success_msg','Rank Updated Successfully!');
						redirect('ca-ranks');
					}else{
						$this->session->set_flashdata('error_msg','Failed to Update Rank!');
					}
				}
			}
			$rank_group_objects = $this->RankGroups_model->getRankGroups();
			$rank_groups = [];
			$rank_groups[''] = '--Select Rank Group--';
			foreach($rank_group_objects as $k=>$rank_group_obj){
				$rank_groups[$rank_group_obj->id] = $rank_group_obj->title.' ->('.substr($rank_group_obj->description,0,30).')';
			}
			$data['rank_groups'] = $rank_groups;
			$rank = $this->Rank_model->getRank($id);
			if($rank!=false){
				
			}else{
				$this->session->set_flashdata('error_msg','Rank Group Not Found!');
				redirect('ca-rank-groups');
			}
			$data['rank'] = $rank;
			$this->load->view('Ca/ranks/edit',$data);
		}
		/**
			delet the rank group by id
		*/
		public function rankDelete($id){
			$this->load->model("Rank_model");
			$a = $this->Rank_model->deleteRank($id);
			if($a){
				$this->session->set_flashdata('success_msg','Rank Deleted Successfully!');
				redirect('ca-ranks');
			}else{
				$this->session->set_flashdata('error_msg','Rank Deletion Failed!');
				redirect('ca-ranks');
			}
		}
		
	}
?>