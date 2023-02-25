<?php
if (!defined('BASEPATH')) exit('You Have Not Permission To access');

	class Welcome extends CI_Controller
	{
		
		public function __construct()
		{
			if(isset($_SERVER['HTTP_ORIGIN'])){
				$http_origin = $_SERVER['HTTP_ORIGIN'];

				if (in_array($http_origin,[ "http://127.0.0.1:5173" ,"https://127.0.0.1:5173" ,"http://172.39.239.5" ,"https://172.39.239.5" ,"http://localhost","https://localhost"]))
				{  
					header("Access-Control-Allow-Origin: $http_origin");
				}
			}
			//header('Access-Control-Allow-Origin: *,http://127.0.0.1:5173');
    		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			parent:: __construct();
			$this->load->library('form_validation'); 
			$this->load->helper('security'); 
			$this->load->model('Login_model');
		}
		public function ajax_login()
		{		
			//echo json_encode($_POST);
			if ($this->session->userdata('is_logged_in')){// check if session not  exists then redirect to index page
				if($this->session->userdata('usertype') == 'c'){
					echo json_encode(['login'=>true,'redirect'=>'ca-dashboard']);
					//redirect('ca-dashboard');
				}else if($this->session->userdata('usertype') == 'b'){
					echo json_encode(['login'=>true,'redirect'=>'bt-dashboard']);
					//redirect('bt-dashboard');
				}else if($this->session->userdata('usertype') == 'd'){
					echo json_encode(['login'=>true,'redirect'=>'bt-pap']);
					//redirect('bt-pap');
				}else if($this->session->userdata('usertype') == 'adm'){
					echo json_encode(['login'=>true,'redirect'=>'ca-dashboard']);
					//redirect('ca-dashboard');
				}
				die;
			}
				$super_username = $this->input->post("super_username",TRUE);
				$super_password = $this->input->post("super_password",TRUE);
				$this->form_validation->set_rules("super_username", "username", "trim|required");
				$this->form_validation->set_rules("super_password", "logkey", "trim|required");
			  
				if ($this->form_validation->run())
				 {  
					$login = $this->Login_model->superadmin_loggin($super_username, $super_password);

					if($login == 1)
					{
						$cookie = session_id();
						//generate a token for this user
						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => API_URL . "generateToken",
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_TIMEOUT => 30,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS => http_build_query(["username" => $super_username,'password'=>$super_password, 'cookie' => $cookie]),
							CURLOPT_HTTPHEADER => array(
								"cache-control: no-cache"
							),
						));
						$response = curl_exec($curl);
						//var_dumP($response);die;
						$err = curl_error($curl);
						curl_close($curl);
						$json_data = json_decode($response);
						return $json_data;
						if($this->session->userdata('usertype') == 'c'){
							echo json_encode(['login'=>true,'redirect'=>'ca-dashboard','ci_session'=>$cookie]);
							//redirect('ca-dashboard');
						}else if($this->session->userdata('usertype') == 'b'){
							echo json_encode(['login'=>true,'redirect'=>'bt-dashboard','ci_session'=>$cookie]);
							//redirect('bt-dashboard');
						}else if($this->session->userdata('usertype') == 'd'){
							echo json_encode(['login'=>true,'redirect'=>'ca-pap','ci_session'=>$cookie]);
							//redirect('bt-pap');
						}else if($this->session->userdata('usertype') == 'adm'){
							echo json_encode(['login'=>true,'redirect'=>'ca-dashboard','ci_session'=>$cookie]);
							//redirect('ca-dashboard');
						}else{
							echo json_encode(['login'=>false,'error'=>'Invalid User Type','ci_session'=>$cookie]);
						}
					}
					else
					{
						echo json_encode(['login'=>false,'error'=>'Invalid Credentials']);
						$this->session->set_flashdata('msg','Invalid credentials!!');

						redirect('');
					}				
				 }else{
					echo json_encode(['login'=>false,'error'=>'Validation Error']);
				 }				
				 die;
				$this->load->view('index');
		}
		/*Create function index*/
		public function index()
		{		
			if ($this->session->userdata('is_logged_in')){// check if session not  exists then redirect to index page
				if($this->session->userdata('usertype') == 'c'){
					redirect('ca-dashboard');
				}else if($this->session->userdata('usertype') == 'b'){
					redirect('bt-dashboard');
				}else if($this->session->userdata('usertype') == 'd'){
					redirect('bt-pap');
				}else if($this->session->userdata('usertype') == 'adm'){
					redirect('ca-dashboard');
				}
			}
				$super_username = $this->input->post("super_username",TRUE);
				$super_password = $this->input->post("super_password",TRUE);
				
				$this->form_validation->set_rules("super_username", "username", "trim|required");
				$this->form_validation->set_rules("super_password", "logkey", "trim|required");
			  
				if ($this->form_validation->run())
				 {  
					$login = $this->Login_model->superadmin_loggin($super_username, $super_password);

					if($login == 1)
					{
						if($this->session->userdata('usertype') == 'c'){
							redirect('ca-dashboard');
						}else if($this->session->userdata('usertype') == 'b'){
							redirect('bt-dashboard');
						}else if($this->session->userdata('usertype') == 'd'){
							redirect('bt-pap');
						}else if($this->session->userdata('usertype') == 'adm'){
							redirect('ca-dashboard');
						}
						
					}
					else
					{
						$this->session->set_flashdata('msg','Invalid credentials!!');
						redirect('');
					}				
				 }				
				$this->load->view('index');
		}
                
                /**
                 * Let the admin login to any account over here
                 */
		public function adminLogin()
		{	
                    if($this->session->userdata('usertype') != 'adm'){
                                                redirect('');
                                        }
                    if(null!=$this->input->post('username')){
                        $super_username = $this->input->post("username",TRUE);
                        //$super_password = $this->input->post("super_password",TRUE);

                        $this->form_validation->set_rules("username", "username", "trim|required");
                        //$this->form_validation->set_rules("super_password", "logkey", "trim|required");

                        if ($this->form_validation->run()) 
                         {  
                                $login = $this->Login_model->admin_logging_to_any_account($super_username);
                                
                                if($login == 1)
                                {
                                        if($this->session->userdata('usertype') == 'c'){
                                                redirect('ca-dashboard');
                                        }else if($this->session->userdata('usertype') == 'b'){
                                                redirect('bt-dashboard');
                                        }else if($this->session->userdata('usertype') == 'd'){
                                                redirect('bt-pap');
                                        }else if($this->session->userdata('usertype') == 'adm'){
                                                redirect('ca-dashboard');
                                        }

                                }
                                else
                                {
                                        $this->session->set_flashdata('msg','Invalid credentials!!');
                                        redirect('');
                                }				
                         }	
                    }
                    $this->load->view('Ca/accountManagement/login');
		}
		/*----End function index----*/
		
		/*Start logoutadmin Action for logout  superadmin*/
		public function logout()
		{		
			//update the log
			$check = array(
				'id'=>$this->session->userdata('log_id'),
				'users_id'=>$this->session->userdata('userid'),
				'ip_address'=>$_SERVER['REMOTE_ADDR']
			);
			$this->db->where($check);
			date_default_timezone_set('Asia/Kolkata');
			$update = array('log_out_time'=>date('Y-m-d H:i:s'));
			$this->db->update('user_log',$update);
			/*Unset session Values*/
			/*Unset session Values*/
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('log_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('userstatus');
			$this->session->unset_userdata('usertype');
			$this->session->sess_destroy();
			redirect('');
		}/*Close logoutadmin Action*/	
		public function logout2()
		{		
			//update the log
			$check = array(
				'id'=>$this->session->userdata('log_id'),
				'users_id'=>$this->session->userdata('userid'),
				'ip_address'=>$_SERVER['REMOTE_ADDR']
			);
			$this->db->where($check);
			date_default_timezone_set('Asia/Kolkata');
			$update = array('log_out_time'=>date('Y-m-d H:i:s'));
			$this->db->update('user_log',$update);
			/*Unset session Values*/
			/*Unset session Values*/
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('log_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('userstatus');
			$this->session->unset_userdata('usertype');
			$this->session->sess_destroy();
			echo json_encode(['status'=>true,'messge'=>"Logged Out successfully"]);
		}
		public function isLoggedIn(){
			if ($this->session->userdata('is_logged_in')){// check if session not  exists then redirect to index page
				$user_id = $this->session->userdata('userid');
				$log_id = $this->session->userdata('log_id');
				$username = $this->session->userdata('username');
				$userstatus = $this->session->userdata('userstatus');
				$usertype = $this->session->userdata('usertype');
				$data = ['status'=>true,'user_id'=>$user_id,'log_id'=>$log_id,'username'=>$username,'userstatus'=>$userstatus,'usertype'=>$usertype,'ci_session'=>session_id()];
				echo json_encode($data);
			}else{
				echo json_encode(['status'=>false,'message'=>'Not Logged IN!']);
			}
		}
		public function getTheCookie(){
			echo session_id();
			var_dump($_SESSION);
			var_dump($_COOKIE);
			//1275e10d6e50abccccab2857eefbe2b4076b73de
			//d26d8a2c9b31c6dc83cb9af5d0aa90c7101448d0
		}
	}
	
	/*----End class Superadmin----*/
?>