<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class RankGroups extends CI_Controller
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
			$this->load->model('RankGroups_model'); 
			$ranks_objects = $this->RankGroups_model->getRankGroups($search,$orderby,$order_dir,$length,$start);
			$ranks = [];
			$i=1+$start;
			foreach($ranks_objects as $k=>$rank_obj){
				$temp_data = [];
				$temp_data['sno'] = $i;
				$temp_data['title'] = $rank_obj->title;
				$temp_data['description'] = $rank_obj->description;
				$temp_data['variable_name'] = $rank_obj->variable_name;
				$temp_data['action'] = '<a href="'.base_url().'ca-rank-groups-edit/'.$rank_obj->id.'">Edit</a>| <a href="'.base_url().'ca-rank-groups-delete/'.$rank_obj->id.'">Delete</a>';
				$ranks[] = $temp_data;
				$i++;
			}
			$total_filtered_ranks = $this->RankGroups_model->getTotalFilteredRankGroups($search,$orderby,$order_dir,$length,$start);
			$total_ranks = $this->RankGroups_model->getTotalRankGroups();
			$data = [
				"data"=>$ranks,
				"recordsTotal"=>$total_ranks,
				"recordsFiltered"=>$total_filtered_ranks
			];
			return $data;
		}
		/** 
			Rank group List page
		*/
		public function rankGroupsList(){
			$this->load->view('Ca/rank_groups/list');
		}
		/** 
			Rank group List Ajax data
		*/
		public function rankGroupsListAjax(){
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
			);
			echo json_encode($output);
		}
		/**
			Add the Rank Group
		*/
		public function rankGroupsAdd(){
			$this->load->library('form_validation');
			$this->load->model("RankGroups_model");
			if(null!=$this->input->post('submit')){
				$title = $this->input->post('title');
				$description = $this->input->post('description');
                                $variable_name = $this->input->post('variable_name');
				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('description','Description','required');
				$this->form_validation->set_rules('variable_name','Variable Name','required');
				if($this->form_validation->run()!=false){
					$a = $this->RankGroups_model->addRankGroup($title,$description,$variable_name);
					if($a){
						$this->session->set_flashdata('success_msg','Rank Group Saved Successfully!');
						redirect('ca-rank-groups');
					}else{
						$this->session->set_flashdata('error_msg','Failed to save Rank Group!');
					}
				}
			}
			$this->load->view('Ca/rank_groups/add');
		}
		
		/**
			Edit the Rank Group
		*/
		public function rankGroupsEdit($id){
			$this->load->library('form_validation');
			$this->load->model("RankGroups_model");
			
			if(null!=$this->input->post('submit')){
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('description','Description','required');
				if($this->form_validation->run()!=false){
					$a = $this->RankGroups_model->editRankGroup($id,$title,$description);
					if($a){
						$this->session->set_flashdata('sucess_msg','Rank Group Saved Successfully!');
						redirect('ca-rank-groups');
					}else{
						$this->session->set_flashdata('error_msg','Failed to save Rank Group!');
					}
				}
			}
			$rank_group = $this->RankGroups_model->getRankGroup($id);
			if($rank_group!=false){
				
			}else{
				$this->session->set_flashdata('error_msg','Rank Group Not Found!');
				redirect('ca-rank-groups');
			}
			$data['rank_group'] = $rank_group;
			$this->load->view('Ca/rank_groups/edit',$data);
		}
		/**
			delet the rank group by id
		*/
		public function rankGroupsDelete($id){
			$this->load->model("RankGroups_model");
			$a = $this->RankGroups_model->deleteRankGroup($id);
			if($a){
				$this->session->set_flashdata('success_msg','Rank Group Deleted Successfully!');
				redirect('ca-rank-groups');
			}else{
				$this->session->set_flashdata('error_msg','Rank Group Deletion Failed!');
				redirect('ca-rank-groups');
			}
		}
		
	}
?>