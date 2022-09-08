<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_laporin');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {
		
		if($this->session->userdata('id_user_level') == 1)	{
			$data['laporin_terbaru'] = $this->m_laporin->count_all_laporin_terbaru(null,null)->row_array();
			$data['laporin_diproses'] = $this->m_laporin->count_all_laporin_proses(null,null)->row_array();
			$data['laporin_ditolak'] = $this->m_laporin->count_all_laporin_tolak(null,null)->row_array();
			$data['laporin_selesai'] = $this->m_laporin->count_all_laporin_selesai(null,null)->row_array();
			$data['laporin_didisposisikan'] = $this->m_laporin->count_all_laporin_disposisi(null,null)->row_array();
		} else {
			$kelas = $this->m_user->get_admin_detail_by_id($this->session->userdata('id_user'))->result_array();

			$data['laporin_terbaru'] = $this->m_laporin->count_all_laporin_terbaru($kelas[0]['kelas'],null)->row_array();
			$data['laporin_diproses'] = $this->m_laporin->count_all_laporin_proses($kelas[0]['kelas'],null)->row_array();
			$data['laporin_ditolak'] = $this->m_laporin->count_all_laporin_tolak($kelas[0]['kelas'],null)->row_array();
			$data['laporin_selesai'] = $this->m_laporin->count_all_laporin_selesai($kelas[0]['kelas'],null)->row_array();
			$data['laporin_didisposisikan'] = $this->m_laporin->count_all_laporin_disposisi($kelas[0]['kelas'],null)->row_array();
		}

			if($this->session->userdata('id_user_level') == 1) {
				$this->load->view('superadmin/dashboard', $data);
			}
			else {
				$this->load->view('admin/dashboard', $data);
			}

		} else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('login/login_user');

		}
    }
    

    public function view_user()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

		$data['user_data'] = $this->m_user->get_user_detail_by_id($this->session->userdata('id_user'))->row_array();

		$data['laporin_terbaru'] = $this->m_laporin->count_all_laporin_terbaru(null,$data['user_data']['nisn'])->row_array();
		$data['laporin_diproses'] = $this->m_laporin->count_all_laporin_proses(null,$data['user_data']['nisn'])->row_array();
		$data['laporin_ditolak'] = $this->m_laporin->count_all_laporin_tolak(null,$data['user_data']['nisn'])->row_array();
		$data['laporin_selesai'] = $this->m_laporin->count_all_laporin_selesai(null,$data['user_data']['nisn'])->row_array();
		$data['laporin_didisposisikan'] = $this->m_laporin->count_all_laporin_disposisi(null,$data['user_data']['nisn'])->row_array();

		$this->load->view('user/dashboard', $data);
		
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('login/login_user');

		}
	}

}
