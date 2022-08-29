<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_laporin');
    }

    public function view_admin($jenis)
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {

           if($jenis == 'terbaru') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_terbaru()->result_array();
                $data['jenis_laporan'] = "Terbaru";
            }
            else if($jenis == 'proses') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_proses()->result_array();
                $data['jenis_laporan'] = "Diproses";
            }
            else if($jenis == 'tolak') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_tolak()->result_array();
                $data['jenis_laporan'] = "Ditolak";
            }
            else if($jenis == 'selesai') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_selesai()->result_array();
                $data['jenis_laporan'] = "Selesai";
            }
            else if($jenis == 'disposisi') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_disposisi()->result_array();
                $data['jenis_laporan'] = "Didisposisi";
            }
            else {
                $data['laporin'] = $this->m_laporin->get_all_laporin()->result_array();
                $data['jenis_laporan'] = "Semua";
            }


            $data['kategori'] = $this->m_laporin->get_status_laporin()->result_array();
            $data['jenis_masalah'] = $this->m_laporin->get_jenis_masalah()->result_array();
            $data['status_laporin'] = $this->m_laporin->get_status_laporin()->result_array();
            
            if($this->session->userdata('id_user_level') == 1) {
                $this->load->view('superadmin/laporin', $data);
            }
            else {
                $this->load->view('admin/laporin', $data);
            }

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }

    public function kelas($kelas)
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {

            $data['laporin'] = $this->m_laporin->get_kelas_laporin($kelas)->result_array();
            $data['jenis_laporan'] = $kelas;

            $data['jenis_masalah'] = $this->m_laporin->get_jenis_masalah()->result_array();
            $data['status_laporin'] = $this->m_laporin->get_status_laporin()->result_array();
            
            if($this->session->userdata('id_user_level') == 1) {
                $this->load->view('superadmin/laporin_kelas', $data);
            }
            else {
                $this->load->view('admin/laporin_kelas', $data);
            }

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }

    public function kategori($kategori)
    {
        
        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {

            $data['laporin'] = $this->m_laporin->get_kategori_laporin($kategori)->result_array();
            $kategori = $this->m_laporin->get_jenis_masalah_byid($kategori)->result();
            $data['jenis_laporan'] = $kategori[0]->nama_jenis_masalah;

            $data['jenis_masalah'] = $this->m_laporin->get_jenis_masalah()->result_array();
            $data['status_laporin'] = $this->m_laporin->get_status_laporin()->result_array();
            
            if($this->session->userdata('id_user_level') == 1) {
                $this->load->view('superadmin/laporin_kategori', $data);
            }
            else {
                $this->load->view('admin/laporin_kategori', $data);
            }

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }

    public function detail_laporin($id)
    {
        
        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {

            $data['laporin'] = $this->m_laporin->get_laporin_detail_by_id($id)->result_array();
            $data['diskusi'] = $this->m_laporin->get_laporin_diskusi_by_id($id)->result_array();

            $data['jenis_masalah'] = $this->m_laporin->get_jenis_masalah()->result_array();
            $data['status_laporin'] = $this->m_laporin->get_status_laporin()->result_array();
            
            if($this->session->userdata('id_user_level') == 1) {
                $this->load->view('superadmin/detail_laporin', $data);
            }
            else {
                $this->load->view('admin/detail_laporin', $data);
            }

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }

    public function tambah_laporin()
    {
        $no_pendaftaran = rand(10000000, 99999999);
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat  = $this->input->post('alamat');
        $jenis_masalah = $this->input->post('jenis_masalah');
        $id = md5($nama . $nisn . $alamat);
        $foto = md5($nama . $nisn . rand(1, 9999));

        $path = './assets/laporin/';

        $this->load->library('upload');
        $config['upload_path'] = './assets/laporin';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '20480'; //2MB max
        $config['max_width'] = '44800'; // pixel
        $config['max_height'] = '44800'; // pixel
        $config['file_name'] = $foto;
        $this->upload->initialize($config);
        $foto_upload = $this->upload->do_upload('foto');
        
        if ($foto_upload) {
            $foto = $this->upload->data();
        } else {
            @unlink($path . $foto['file_name']);
            $this->session->set_flashdata('error_file_foto', 'error_file_foto');
            redirect('laporin/view_admin');
        }
    

        $hasil = $this->m_laporin->insert_laporin($id,$nisn,$nama,$email,$alamat,$jenis_masalah,$foto['file_name']);

        if ($hasil == false) {

            $this->session->set_flashdata('eror', 'eror');
            redirect('laporin/view_admin');

        } else {

            $this->session->set_flashdata('input', 'input');
            redirect('laporin/view_admin');

        }

    }

    public function update_laporin()
    {
        $no_pendaftaran = rand(10000000, 99999999);
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat  = $this->input->post('alamat');
        $jenis_masalah = $this->input->post('jenis_masalah');
        $status = $this->input->post('status');
        $id = md5($nama . $nisn . $alamat);
        $foto = md5($nama . $nisn . rand(1, 9999));

        $path = './assets/berkas/';

        $this->load->library('upload');
        $config['upload_path'] = './assets/laporin';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '20480'; //2MB max
        $config['max_width'] = '44800'; // pixel
        $config['max_height'] = '44800'; // pixel
        $config['file_name'] = $foto;
        $this->upload->initialize($config);
        
        if($_FILES['foto']['name']) {
            $foto_upload = $this->upload->do_upload('foto');
            if ($foto_upload) {
                $foto = $this->upload->data();
                $hasil = $this->m_laporin->update_laporin($id,$nisn,$nama,$email,$alamat,$jenis_masalah,$status,$foto['file_name']);
            } else {
                @unlink($path . $foto['file_name']);
                $this->session->set_flashdata('error_file_foto', 'error_file_foto');
                redirect('laporin/view_admin');
            }   
        }
        else {
            $hasil = $this->m_laporin->update_laporin($id,$nisn,$nama,$email,$alamat,$jenis_masalah,$status,null);
        }


        if ($hasil == false) {
            $this->session->set_flashdata('eror', 'eror');
            redirect('laporin/view_admin');
        } else {
            @unlink($path . $this->input->post('foto_old'));
            $this->session->set_flashdata('update', 'update');
            redirect('laporin/view_admin');
        }

    }

    public function update_status_laporin()
    {
        $id_laporin = $this->input->post('id_laporin');
        $status = $this->input->post('status');

    
        $hasil = $this->m_laporin->update_status_laporin($id_laporin,$status);

        if ($hasil == false) {
            $this->session->set_flashdata('eror', 'eror');
            redirect('laporin/view_admin/all');
        } else {
            $this->session->set_flashdata('update', 'update');
            redirect('laporin/view_admin/all');
        }

    }

    public function hapus_laporin()
    {

        $id_laporin = $this->input->post("id_laporin");

        $path = './assets/laporin/';

        $hasil = $this->m_laporin->delete_laporin($id_laporin);

        if ($hasil == false) {
            $this->session->set_flashdata('eror', 'eror');
            redirect('laporin/view_admin');
        } else {
            @unlink($path . $this->input->post('foto_old'));
            $this->session->set_flashdata('delete', 'delete');
            redirect('laporin/view_admin');
        }

    }

    
    public function diskusi_laporin()
    {
        $pesan = $this->input->post('pesan');

        $id_user = $this->session->userdata('id_user');
      
        $id_laporin = $this->input->post('id_laporin');
        $id_diskusi = md5($pesan . $id_user . $id_laporin);
        
      
        $hasil = $this->m_laporin->insert_diskusi($id_diskusi,$id_laporin,$id_user,$pesan);

        if ($hasil == false) {

            $this->session->set_flashdata('eror', 'eror');
            redirect('laporin/detail_laporin/'.$id_laporin);

        } else {

            $this->session->set_flashdata('input', 'input');
            redirect('laporin/detail_laporin/'.$id_laporin);

        }

    }



}
