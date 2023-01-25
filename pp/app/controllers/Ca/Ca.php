<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class Ca extends CI_Controller
	{
		
		public function __construct()
		{
			parent:: __construct();
			$this->permission->is_logged_in(); 
			$this->permission->clear_cache();
			$this->permission->checkuser();
			$this->load->model(F_CA.'Ca_model'); 
		}

		public function index(){
			$this->load->view(F_CA.'dashboard');
		}

		/*Add New Arm start*/
		public function addarm(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$tow = $this->input->post("tow",TRUE);
			$wbodyno = $this->input->post("wbodyno",TRUE);
			$wbuttno = $this->input->post("wbuttno",TRUE);
			$rdate = $this->input->post("rdate",TRUE);
			$mq = $this->input->post("mq",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);

			$this->form_validation->set_rules("tow", "Type of Weapon", "trim|required");
			$this->form_validation->set_rules("wbodyno", "Arm Body No", "trim|required|is_unique[weapon_master.weapon_body_no]");
			$this->form_validation->set_rules("wbuttno", "Arm Butt No", "trim");
			$this->form_validation->set_rules("rdate", "Receive Date", "trim");
			$this->form_validation->set_rules("mq", "Magazine Qty", "trim");
			$this->form_validation->set_rules("rcvno", "RC/Voucher No", "trim");
			$this->form_validation->set_rules("vdate", "Voucher Date", "trim");
			if ($this->form_validation->run()){
				$add_web = $this->Ca_model->add_arm($tow,$wbodyno,$wbuttno,$rdate,$mq,$rcvno,$vdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Arms has created succesfully !');
					redirect('ca-add-arm');
				}else{
					$this->session->set_flashdata('error_msg','Arms has not created.');
					redirect('ca-add-arm');
				}	
			}
			$data['weapon'] = $this->Ca_model->fetchinfo(T_ARM_MASTER,array('status' => 1 ));
			$this->load->view(F_CA.'arm/addarm',$data);
		}/*Close*/

		/*Issue Arms start*/
		public function issue_arms(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$mq = $this->input->post("mq",TRUE);
			$vdate = $this->input->post("vdate",TRUE);
			$ito = $this->input->post("ito",TRUE);


			$this->form_validation->set_rules("bodyno[]", "bodyno", "trim|required");
			$this->form_validation->set_rules("idate", "idate", "trim|required");
			$this->form_validation->set_rules("rcno", "rcno", "trim|required");
			$this->form_validation->set_rules("mq", "mq", "trim|required");
			$this->form_validation->set_rules("vdate", "vdate", "trim|required");
			$this->form_validation->set_rules("ito", "Issued To", "trim|required");
			if ($this->form_validation->run()){//echo $ito; die();
				$add_web = $this->Ca_model->issue_arm($bodyno,$idate,$rcno,$mq,$vdate,$ito); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg',"Arms has issued succesfully !");
					redirect('ca-issue-arm');
				}else{
					$this->session->set_flashdata('error_msg','Arms has not issued.');
					redirect('ca-issue-arm');
				}	
			}
			$data['bodys'] = $this->Ca_model->fetchinfo('old_weapon',array('ca_store' => 1));
			$data['users'] = $this->Ca_model->fetchinfo(T_USERS,array('user_log' => 3 ));
			$this->load->view(F_CA.'arm/issuearm',$data);
		}/*Close*/

		/*Add Ammunition start*/
		public function add_ammunition(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			$now = $this->input->post("now",TRUE);
			$year = $this->input->post("year",TRUE);
			$qw = $this->input->post("qw",TRUE);
			$rdate = $this->input->post("rdate",TRUE);
			$rcvno = $this->input->post("rcvno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);	

			$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");
			$this->form_validation->set_rules("now", "now", "trim|required");
			$this->form_validation->set_rules("year", "year", "trim|required");
			$this->form_validation->set_rules("qw", "qw", "trim|required");
			$this->form_validation->set_rules("rdate", "rdate", "trim|required");
			$this->form_validation->set_rules("rcvno", "rcvno", "trim|required");
			$this->form_validation->set_rules("vdate", "vdate", "trim|required");
			if ($this->form_validation->run()){
				$add_web = $this->Ca_model->add_ammunition($bodyno,$now,$year,$qw,$rdate,$rcvno,$vdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg','Arms has issued succesfully !');
					redirect('ca-add-ammunition');
				}else{
					$this->session->set_flashdata('error_msg','Arms has not issued.');
					redirect('ca-add-ammunition');
				}	
			}
			$data['weapon'] = $this->Ca_model->fetchinfo(T_ARM_MASTER,array('status' => 1 ));
			$this->load->view(F_CA.'ammunition/addammunition',$data);
		}/*Close*/

		/*Issue Ammunition start*/
		public function issue_annu(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			$ammu = $this->input->post("ammu",TRUE);
			$year = $this->input->post("year",TRUE);
			$qab =  $this->input->post("qab",TRUE);
			$idate = $this->input->post("idate",TRUE);
			$ito = $this->input->post("ito",TRUE);
			$rcno = $this->input->post("rcno",TRUE);
			$vdate = $this->input->post("vdate",TRUE);

			$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");
			$this->form_validation->set_rules("ammu", "ammu", "trim|required");
			$this->form_validation->set_rules("year", "year", "trim|required");
			$this->form_validation->set_rules("qab", "qab", "trim|required");
			$this->form_validation->set_rules("idate", "idate", "trim|required");
			$this->form_validation->set_rules("ito", "Issued To", "trim|required");
			$this->form_validation->set_rules("rcno", "rcno", "trim|required");
			$this->form_validation->set_rules("vdate", "vdate", "trim|required");
			if ($this->form_validation->run()){
				$add_web = $this->Ca_model->add_issueammu($bodyno,$ammu,$year,$qab,$idate,$ito,$rcno,$vdate); 	
				if($add_web == 1){
					$this->session->set_flashdata('success_msg',"Ammunition has issued succesfully !");
					redirect('ca-issue-ammunition');
				}else{
					$this->session->set_flashdata('error_msg','Ammunition has not issued.');
					redirect('ca-issue-ammunition');
				}	
			}
			$data['bodys'] = $this->Ca_model->fetchinfo(T_ARM_MASTER,array('status' => 1 ));
			$data['users'] = $this->Ca_model->fetchinfo(T_USERS,array('user_log' => 3 ));
			$this->load->view(F_CA.'ammunition/issueammnunition',$data);
		}/*Close*/

		/*Ajax load start*/
		public function ammu_aj(){
			$this->load->library('form_validation');
			$this->load->helper('security');

			$bodyno = $this->input->post("bodyno",TRUE);
			
			$this->form_validation->set_rules("bodyno", "bodyno", "trim|required");

			if ($this->form_validation->run()){
			$wep = $this->Ca_model->ammu_list($bodyno);	
		
			echo '<div class="form-group">
                  <label class="col-sm-3 control-label">Ammunition weapon</label>
                  <div class="col-sm-9"><select name="ammu"  id="ammu" data-placeholder="Ammunition bore" title="Please select at least 1 value" class="form-control" required>';
			foreach ($wep as $value) {
				echo "<option value='".$value->old_ammunation_id."'>Ammunation Bore:".$value->ammubore.'&nbsp; ||  Ammunation weapon: '.$value->ammuwep."</option>";
			}
			echo "</select></div></div><br/>";
			}
		}/*Close*/

		/*==============Reports====================*/


		/*View arms Start*/
		public function view_arms(){
			$data['weapon'] = $this->Ca_model->addarm();
			$this->load->view(F_CA.'arm/viewarm',$data);
		}/*Close*/

		/*View issue arms Start*/
		public function view_issue_arms(){
			$this->load->helper('common_helper');
			$data['arms'] = $this->Ca_model->issuearm();
			$this->load->view(F_CA.'arm/viewissuearm',$data);
		}/*Close*/

		/*View ammunition Start*/
		public function view_ammunition(){
			$data['weapon'] = $this->Ca_model->fetchinfo('ammu_master',array('ammu_status' => 1 ));
			$this->load->view(F_CA.'ammunition/viewaddammunition',$data);
		}/*Close*/

		/*View issue ammunition start*/
		public function view_issue_ammu(){
			$this->load->helper('common_helper');
			$data['ammu'] = $this->Ca_model->issueammu();
			$this->load->view(F_CA.'ammunition/viewissuwammunition',$data);
		}/*Close*/

			/*public function armstock(){
				$this->load->helper('common_helper');
				$data['arms'] = $this->Ca_model->fetchinfo(T_ARM_MASTER,array('status' => 1 ));
				$this->load->view(F_CA.'arm/armstock',$data);
			}


			public function ammunitionstock(){
				$this->load->helper('common_helper');
				$data['arms'] = $this->Ca_model->fetchinfo(T_ARM_MASTER,array('status' => 1 ));
				$this->load->view(F_CA.'ammunition/ammustock',$data);
			}*/

	}

?>