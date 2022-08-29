<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_status_aktif');
        $this->load->model('m_status_perpanjangan');
        $this->load->model('m_status_verifikasi');
    }

    public function data_admin()
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

            $data['admin'] = $this->m_user->get_all_admin()->result_array();

            $this->load->view('superadmin/data_admin', $data);

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }

    public function tambah_user()
    {
        $nuptk = $this->input->post('nuptk');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $kelas = $this->input->post('kelas');
        $username = $this->input->post('username');
        $password = $this->input->post('pw');
        $cpassword = $this->input->post('cpw');
       
        $id = md5($username.$email.$password.rand(1, 999999));
        $id_user_level = 2;

        if($password == $cpassword) {
            $hasil = $this->m_user->insert_admin($id,$id_user_level,$nuptk,$nama,$email,$alamat,$telp,$kelas,$username,$password);
             
            if ($hasil == false) {

                $this->session->set_flashdata('eror', 'eror');
                redirect('Master/data_admin');

            } else {

                $this->session->set_flashdata('input', 'input');
                redirect('Master/data_admin');
            }
        }
        else {      
            $this->session->set_flashdata('password_err','password_err');
            redirect('Master/data_admin');
        }

    }


    public function update_user()
    {
        $id = $this->input->post('id');
        $nuptk = $this->input->post('nuptk');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $kelas = $this->input->post('kelas');
        $username = $this->input->post('username');
        $password = $this->input->post('pw');
        $cpassword = $this->input->post('cpw');
       
        $hasil = $this->m_user->update_admin_detail($id,$nuptk,$nama,$email,$alamat,$telp,$kelas,$username,$password);

        if($password == $cpassword) {
            if ($hasil == false) {
                $this->session->set_flashdata('eror', 'eror');
                redirect('master/data_admin');
            } else {
                $this->session->set_flashdata('update', 'update');
                redirect('master/data_admin');
            }
        }
        else {
            $this->session->set_flashdata('password_err','password_err');
            redirect('master/data_admin');
        }

    }

    public function hapus_user()
    {

        $id_user = $this->input->post("id_user");

        $hasil = $this->m_user->delete_admin($id_user);

        if ($hasil == false) {
            $this->session->set_flashdata('eror', 'eror');
            redirect('master/data_admin');
        } else {
            $this->session->set_flashdata('delete', 'delete');
            redirect('master/data_admin');
        }

    }


}
