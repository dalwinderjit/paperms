<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class Userlog extends CI_Controller
	{	
		public function loglist(){
			error_reporting(E_ALL);
			$this->load->model('Userlog_model');
			if(null!=$this->input->post('submit')){
				$username = $this->input->post('username');
				$ipaddress = $this->input->post('ipaddress');
				$from_date = $this->input->post('from_date');
				$to_date = $this->input->post('to_date');
				$data['logs'] = $this->Userlog_model->get_list($username,$ipaddress,$from_date,$to_date);
			}else{
				$data['logs'] = $this->Userlog_model->get_list();
			}
			$this->load->view('userlog/loglist',$data);
		}
	}
?>