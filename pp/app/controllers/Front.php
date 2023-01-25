<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class Front extends CI_Controller
	{
		
		public function __construct(){
			parent:: __construct();
			$this->load->library('form_validation'); /*load form_validation library*/
			$this->load->helper('security'); /*load security helper*/
		}



		public function index(){
			$this->load->library('form_validation'); 
			$this->load->helper('security');
			$this->load->view('Front/index');
		}

		public function hometution(){
			$this->load->library('form_validation'); 
			$this->load->helper('security');
			$this->load->view('Front/hometuts');
		}

		public function services(){
			$this->load->library('form_validation'); 
			$this->load->helper('security');
			$this->load->view('Front/services');
		}

		public function contactus(){
			$this->load->library('form_validation'); 
			$this->load->helper('security');
			$this->load->view('Front/contactus');
		}

	}

?>