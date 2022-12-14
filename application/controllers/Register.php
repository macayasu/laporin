<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_user');
	}

	public function register_user()
	{
		$this->load->view('register_user');
	}


	public function proses_user()
	{

		$nama = $this->input->post('nama');
		$nisn = $this->input->post('nisn');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$kelas = $this->input->post('kelas');
		$nama_ortu = $this->input->post('nama_ortu');
		$telp_ortu = $this->input->post('telp_ortu');
		$alamat_ortu = $this->input->post('alamat_ortu');
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$re_pass = $this->input->post('re_pass');

	
		$id_user_level = 3;
        $id = md5($username.$email.$pass.rand(1, 999999));

		if($pass == $re_pass)
        {
			$hasil = $this->m_user->pendaftaran_user($id, $username, $email, $pass, $id_user_level, $nama, $nisn,$telp, $alamat, $kelas, $nama_ortu, $telp_ortu, $alamat_ortu);

			if($hasil==false){
                $this->session->set_flashdata('eror','eror');
                redirect('register/register_user');
			}else{
				$this->session->set_flashdata('input','input');
				redirect('login/login_user');
			}
			
		}else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('register/register_user');
        }

	
	}
}