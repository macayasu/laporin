<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function data_admin()
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {

            $data['admin'] = $this->m_user->get_all_admin()->result_array();

            if($this->session->userdata('id_user_level') == 1) {
                $this->load->view('superadmin/data_admin', $data);
            }
            else {
                $this->load->view('admin/data_admin', $data);

            }

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
       
        $hasil = $this->m_user->update_admin_detail_cred($id,$nuptk,$nama,$email,$alamat,$telp,$kelas,$username,$password);

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

 
    public function data_profil_user(){
        
        if ($this->session->userdata('logged_in') == true) {

            $data['user'] = $this->m_user->get_user_detail_by_id($this->session->userdata('id_user'))->result_array();

            $this->load->view('user/profil', $data);


        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }
    public function data_profil_admin(){
        
        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {

            $data['admin'] = $this->m_user->get_admin_detail_by_id($this->session->userdata('id_user'))->result_array();

            $this->load->view('admin/profil', $data);


        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }

    public function data_profil_superadmin(){
        
        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2) {

            $data['admin'] = $this->m_user->get_admin_detail_by_id($this->session->userdata('id_user'))->result_array();

            if($this->session->userdata('id_user_level') == 1)
            $this->load->view('superadmin/profil', $data);
            else
            $this->load->view('admin/profil', $data);


        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('login/login_user');

        }
    }

    public function update_profil_user()
    {
        $id = $this->input->post('id_user');
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $kelas = $this->input->post('kelas');
       
       
        $foto_name = md5($nama . $nisn . $id);

        $this->load->library('upload');
        $config['upload_path'] = './assets/profil';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '20480'; //2MB max
        $config['max_width'] = '44800'; // pixel
        $config['max_height'] = '44800'; // pixel
        $config['file_name'] = $foto_name;
        $this->upload->initialize($config);
        $foto_upload = $this->upload->do_upload('foto');

        if($_FILES['foto']['name']) {
            if ($foto_upload) {
                
                $foto = $this->upload->data();
         
                $hasil = $this->m_user->update_user_detail_foto($id,$nisn,$nama,$email,$alamat,$telp,$kelas,$foto['file_name']);

                if ($hasil == false) {
                    $this->session->set_flashdata('eror', 'eror');
                    redirect('master/data_profil_user');
                } else {
                    $this->session->set_flashdata('update', 'update');
                    redirect('master/data_profil_user');                
                }

            } else {
                $this->session->set_flashdata('error_file_foto', 'error_file_foto');
                redirect('master/data_profil_user');
            }
        }
        else {
            $hasil = $this->m_user->update_user_detail($id,$nisn,$nama,$email,$alamat,$telp,$kelas);

            if ($hasil == false) {
                $this->session->set_flashdata('eror', 'eror');
       
                redirect('master/data_profil_user'); 
            } else {
                $this->session->set_flashdata('update', 'update');
              
                redirect('master/data_profil_user');
            }
    
        }


    }

    public function update_profil_admin()
    {
        $id = $this->input->post('id_user');
        $nuptk = $this->input->post('nuptk');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $kelas = $this->input->post('kelas');
       
       
        $foto_name = md5($nama . $nuptk . $id);

        $this->load->library('upload');
        $config['upload_path'] = './assets/profil';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '20480'; //2MB max
        $config['max_width'] = '44800'; // pixel
        $config['max_height'] = '44800'; // pixel
        $config['file_name'] = $foto_name;
        $this->upload->initialize($config);
        $foto_upload = $this->upload->do_upload('foto');

        if($_FILES['foto']['name']) {
            if ($foto_upload) {
                
                $foto = $this->upload->data();
         
                $hasil = $this->m_user->update_admin_detail_foto($id,$nuptk,$nama,$email,$alamat,$telp,$kelas,$foto['file_name']);

                if ($hasil == false) {
                    $this->session->set_flashdata('eror', 'eror');
                    if($this->session->userdata('id_user_level') == 1)
                    redirect('master/data_profil_superadmin');
                    else
                    redirect('master/data_profil_admin');
                } else {
                    $this->session->set_flashdata('update', 'update');
                    if($this->session->userdata('id_user_level') == 1)
                    redirect('master/data_profil_superadmin');
                    else
                    redirect('master/data_profil_admin');                
                }

            } else {
                $this->session->set_flashdata('error_file_foto', 'error_file_foto');
                if($this->session->userdata('id_user_level') == 1)
                redirect('master/data_profil_superadmin');
                else
                redirect('master/data_profil_admin');
            }
        }
        else {
            $hasil = $this->m_user->update_admin_detail($id,$nuptk,$nama,$email,$alamat,$telp,$kelas);

            if ($hasil == false) {
                $this->session->set_flashdata('eror', 'eror');
                if($this->session->userdata('id_user_level') == 1)
                redirect('master/data_profil_superadmin');
                else
                redirect('master/data_profil_admin'); 
            } else {
                $this->session->set_flashdata('update', 'update');
                if($this->session->userdata('id_user_level') == 1)
                redirect('master/data_profil_superadmin');
                else
                redirect('master/data_profil_admin');
            }
    
        }


    }

    public function update_credential()
    {
        $id = $this->input->post('id_user');
        $password = $this->input->post('pw');
        $cpassword = $this->input->post('cpw');
        
        if($password == $cpassword) {
            $hasil = $this->m_user->update_profil($id,$password);

            if ($hasil == false) {
                $this->session->set_flashdata('eror', 'eror');
                if($this->session->userdata('id_user_level') == 1)
                redirect('master/data_profil_superadmin');
                else
                redirect('master/data_profil_admin');
            } else {
                $this->session->set_flashdata('update', 'update');
                if($this->session->userdata('id_user_level') == 1)
                redirect('master/data_profil_superadmin');
                else
                redirect('master/data_profil_admin');
            }
        }
        else {
            $this->session->set_flashdata('password_err','password_err');
            if($this->session->userdata('id_user_level') == 1)
            redirect('master/data_profil_superadmin');
            else
            redirect('master/data_profil_admin');            
        }
    }

    public function update_credential_user()
    {
        $id = $this->input->post('id_user');
        $password = $this->input->post('pw');
        $cpassword = $this->input->post('cpw');
        
        if($password == $cpassword) {
            $hasil = $this->m_user->update_profil($id,$password);

            if ($hasil == false) {
                $this->session->set_flashdata('eror', 'eror');
               
                redirect('master/data_profil_user');
            } else {
                $this->session->set_flashdata('update', 'update');
                redirect('master/data_profil_user');

            }
        }
        else {
            $this->session->set_flashdata('password_err','password_err');
            redirect('master/data_profil_user');
            
        }
    }

}
