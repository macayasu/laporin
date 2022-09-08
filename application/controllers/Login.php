<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_user');
	}

	public function index()
	{
		$this->load->view('login_user');
	}
	
	public function login_user()
	{
		$this->load->view('login_user');
	}

	public function proses()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$user = $this->m_user->cek_login($username);

		if($username && $password) {
			if($user->num_rows()>0){
				$user = $user->row_array();

				if($user['password'] == $password) {

					if($user['id_user_level'] == 1){
						
						$this->session->set_userdata('logged_in', true);
						$this->session->set_userdata('id_user', $user['id_user']);
						$this->session->set_userdata('username', $user['username']);
						$this->session->set_userdata('id_user_level', $user['id_user_level']);
						
						redirect('Dashboard/view_admin');
		
					}else if($user['id_user_level'] == 2){
				
						$this->session->set_userdata('logged_in', true);
						$this->session->set_userdata('id_user', $user['id_user']);
						$this->session->set_userdata('username', $user['username']);
						$this->session->set_userdata('id_user_level', $user['id_user_level']);
		
						redirect('Dashboard/view_admin');
		
					}else if($user['id_user_level'] == 3){
		
						$this->session->set_userdata('logged_in', true);
						$this->session->set_userdata('id_user', $user['id_user']);
						$this->session->set_userdata('username', $user['username']);
						$this->session->set_userdata('id_user_level', $user['id_user_level']);
		
						redirect('Dashboard/view_user');
		
					}else{
						$this->session->set_flashdata('loggin_err','loggin_err');
						redirect('login/login_user');
					}

				}else{

				$this->session->set_flashdata('loggin_err_pass','loggin_err_pass');
				redirect('login/login_user');

				}
			}else{
				$this->session->set_flashdata('loggin_err_no_user','loggin_err_no_user');
				redirect('login/login_user');
			}
		}
		else {
			$this->session->set_flashdata('loggin_err_no_us_pw','loggin_err_no_us_pw');
			redirect('login/login_user');
		}
	}

	public function log_out_user(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_user');
        $this->session->set_flashdata('success_log_out','success_log_out');
        redirect('login/login_user');
	}

	

}