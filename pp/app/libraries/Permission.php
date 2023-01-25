<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Class Start Permission*/
class Permission {
	/*Start is_logged_in Action*/
	public	function is_logged_in() {
		$CI =& get_instance();
		if (!$CI->session->userdata('is_logged_in')){// check if session not  exists then redirect to index page
		   redirect('');
		}
	}/*Close is_logged_in Action*/
		
	/*Start clear_cache clear Action*/	
	public	function clear_cache(){
		$CI =& get_instance();		 
		$CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");/*clear all cache*/
		$CI->output->set_header("Pragma: no-cache");
	}/*Close clear_cache Action*/	

	/*Start checklogin Action*/
	public	function checkuser(){
		$CI =& get_instance();
		if (!in_array($CI->session->userdata('usertype'),array('c','adm'))){
		   redirect('');
		}
	}/*Close checklogin Action*/
	/*public	function checkuseradmin(){
		$CI =& get_instance();
		if ($CI->session->userdata('usertype') != 'adm'){
		   redirect('');
		}
	}*//*Close checklogin Action*/
	
	/*Start checkdemo_exsit Action*/
	public	function checkuserb(){
		$CI =& get_instance();
		if ($CI->session->userdata('usertype') != 'b'){
		   redirect('');
		}
	}/*Close checkdemo_exsit Action*/
	
	/*Start Action uri_check*/
	public function uri_check($name,$table,$where,$red){
		$CI= & get_instance();
		$CI->load->database();
		$val = implode(',', $name);
		$CI->db->select($val);
		foreach($where as $list =>$key):
		$CI->db->where($list,$key);
		endforeach;
		$query = $CI->db->get($table);
		if(!$query->num_rows()){
			redirect($red);
		}		
	}/*Close Action uri_check*/
	
	/*Start pdemo_exsit Action*/
	public	function pdemo_exsit(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_paid') != 1){
		   redirect('demo-webfolder');
		}
	}/*Close pdemo_exsit Action*/

	/*Start pdemo_exsit Action*/
	public	function puser_exsit(){
		$CI =& get_instance();
		if ($CI->session->userdata('user_paid') != 1){
		   redirect('user-webfolder');
		}
	}/*Close pdemo_exsit Action*/
}/*Class End Permission*/