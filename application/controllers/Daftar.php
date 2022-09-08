<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_user');
    }

    
    public function view_user($id_user)
	{
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

            
        $data['user_data'] = $this->m_user->get_user_detail_by_id($this->session->userdata('id_user'))->row_array();
        $data['user'] = $this->m_user->get_user_detail_by_id($id_user)->result_array();
        
        $this->load->view('user/daftar_ak1', $data);
            
        }else{

            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('login/login_user');

        }
    }


}