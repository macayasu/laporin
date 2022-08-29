<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_laporin');
		$this->load->model('m_loker');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {

		$data['laporin_terbaru'] = $this->m_laporin->count_all_laporin_terbaru()->row_array();
		$data['laporin_diproses'] = $this->m_laporin->count_all_laporin_proses()->row_array();
		$data['laporin_ditolak'] = $this->m_laporin->count_all_laporin_tolak()->row_array();
		$data['laporin_selesai'] = $this->m_laporin->count_all_laporin_selesai()->row_array();
		$data['laporin_didisposisikan'] = $this->m_laporin->count_all_laporin_disposisi()->row_array();

		if($this->session->userdata('id_user_level') == 1) {
			$this->load->view('superadmin/dashboard', $data);
		}
		else {
			$this->load->view('admin/dashboard', $data);
		}

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('login/login_user');

		}
    }
    

    
    public function view_user()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

		$data['user_data'] = $this->m_user->get_user_detail_by_id($this->session->userdata('id_user'))->row_array();
		$data['pencaker'] = $this->m_user->count_all_user()->row_array();
		$data['perusahaan'] = $this->m_user->count_all_perusahaan()->row_array();
		$this->load->view('user/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('login/login_user');

		}
	}

}
