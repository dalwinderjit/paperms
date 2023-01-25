<?php
/*Prevent direct access Website Path*/
if (!defined('BASEPATH')) exit('You Have Not Permission To access');
/*----End----*/
/*Total function: 9*/
/*Craete Class User*/
	class Superadmin extends CI_Controller{
		/*Create*/
		public function __construct(){
			parent:: __construct();
		}/*End*/

		public function test(){
			$this->load->library('form_validation');
			$this->load->view(F_SUPERADMIN.'add');
		}

}