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

        if($this->session->userdata('id_user_level') == 1) {
           if($jenis == 'terbaru') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_terbaru(null,null)->result_array();
                $data['jenis_laporan'] = "Terbaru";
            }
            else if($jenis == 'proses') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_proses(null,null)->result_array();
                $data['jenis_laporan'] = "Diproses";
            }
            else if($jenis == 'tolak') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_tolak(null,null)->result_array();
                $data['jenis_laporan'] = "Ditolak";
            }
            else if($jenis == 'selesai') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_selesai(null,null)->result_array();
                $data['jenis_laporan'] = "Selesai";
            }
            else if($jenis == 'disposisi') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_disposisi(null,null)->result_array();
                $data['jenis_laporan'] = "Didisposisi";
            }
            else {
                $data['laporin'] = $this->m_laporin->get_all_laporin(null,null)->result_array();
                $data['jenis_laporan'] = "Semua";
            }
        }
        else {
            
            $kelas = $this->m_user->get_admin_detail_by_id($this->session->userdata('id_user'))->result_array();

            if($jenis == 'terbaru') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_terbaru($kelas[0]['kelas'],null)->result_array();
                
                $data['jenis_laporan'] = "Terbaru";
            }
            else if($jenis == 'proses') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_proses($kelas[0]['kelas'],null)->result_array();
                
                $data['jenis_laporan'] = "Diproses";
            }
            else if($jenis == 'tolak') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_tolak($kelas[0]['kelas'],null)->result_array();
                $data['jenis_laporan'] = "Ditolak";
            }
            else if($jenis == 'selesai') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_selesai($kelas[0]['kelas'],null)->result_array();
                $data['jenis_laporan'] = "Selesai";
            }
            else if($jenis == 'disposisi') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_disposisi($kelas[0]['kelas'],null)->result_array();
     
                $data['jenis_laporan'] = "Didisposisi";
            }
            else {
                $data['laporin'] = $this->m_laporin->get_all_laporin($kelas[0]['kelas'],null)->result_array();
                $data['jenis_laporan'] = "Semua";
            }
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

    public function view_user($jenis)
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

            
            $user = $this->m_user->get_user_detail_by_id($this->session->userdata('id_user'))->result_array();
            $data['user'] = $this->m_user->get_user_detail_by_id($this->session->userdata('id_user'))->result_array();
            $nisn = $user[0]['nisn'];

            if($jenis == 'terbaru') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_terbaru(null,$nisn)->result_array();
                
                $data['jenis_laporan'] = "Terbaru";
            }
            else if($jenis == 'proses') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_proses(null,$nisn)->result_array();
                
                $data['jenis_laporan'] = "Diproses";
            }
            else if($jenis == 'tolak') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_tolak(null,$nisn)->result_array();
                $data['jenis_laporan'] = "Ditolak";
            }
            else if($jenis == 'selesai') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_selesai(null,$nisn)->result_array();
                $data['jenis_laporan'] = "Selesai";
            }
            else if($jenis == 'disposisi') {
                $data['laporin'] = $this->m_laporin->get_all_laporin_disposisi(null,$nisn)->result_array();
     
                $data['jenis_laporan'] = "Didisposisi";
            }
            else {
                $data['laporin'] = $this->m_laporin->get_all_laporin(null,$nisn)->result_array();
                $data['jenis_laporan'] = "Semua";
            }


            $data['kategori'] = $this->m_laporin->get_status_laporin()->result_array();
            $data['jenis_masalah'] = $this->m_laporin->get_jenis_masalah()->result_array();
            $data['status_laporin'] = $this->m_laporin->get_status_laporin()->result_array();

            $this->load->view('user/laporin', $data);

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

            if($this->session->userdata('id_user_level') == 1) {
                $data['laporin'] = $this->m_laporin->get_kategori_laporin($kategori,null)->result_array();
            }
            else {
                $kelas = $this->m_user->get_admin_detail_by_id($this->session->userdata('id_user'))->result_array();

                $data['laporin'] = $this->m_laporin->get_kategori_laporin($kategori,$kelas[0]['kelas'])->result_array();
            }

   
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

    public function detail_laporin()
    {
        
        $id = $_GET['id'];
        $jenis = $_GET['jenis'];
        $tipe = $_GET['tipe'];
        
        $data['laporin'] = $this->m_laporin->get_laporin_detail_by_id($id)->result_array();
        
        $data['diskusi'] = $this->m_laporin->get_laporin_diskusi_by_id($id)->result_array();

        $data['jenis_masalah'] = $this->m_laporin->get_jenis_masalah()->result_array();
        $data['status_laporin'] = $this->m_laporin->get_status_laporin()->result_array();
        $data['jenis'] = $jenis;
        $data['tipe'] = $tipe;
        
        if($this->session->userdata('id_user_level') == 1) {
            $this->load->view('superadmin/detail_laporin', $data);
        }
        else if($this->session->userdata('id_user_level') == 2) {
            $this->load->view('admin/detail_laporin', $data);
        }
        else {
            $this->load->view('user/detail_laporin', $data);
        }

    }

    public function tambah_laporin()
    {
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat  = $this->input->post('alamat');
        $kelas = $this->input->post('kelas');
        $nama_ortu = $this->input->post('nama_ortu');
        $telp_ortu = $this->input->post('telp_ortu');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $jenis_masalah = $this->input->post('jenis_masalah');
        $deskripsi_masalah = $this->input->post('deskripsi_masalah');
        $id = md5($nama . $nisn . $alamat . rand(1, 9999));

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
        
        // if ($foto_upload) {
        //     $foto = $this->upload->data();
        // } else {
        //     @unlink($path . $foto['file_name']);
        //     $this->session->set_flashdata('error_file_foto', 'error_file_foto');

        //     if($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2 ) {
        //         redirect('laporin/view_admin/null');
        //     }
        //     else {
        //         redirect('laporin/view_user/null');
        //     }
        // }
    
         
        if($_FILES['foto']['name']) {
            $foto_upload = $this->upload->do_upload('foto');
            if ($foto_upload) {
                $foto = $this->upload->data();
                $hasil = $this->m_laporin->insert_laporin($id,$nisn,$nama,$email,$alamat,$kelas,$nama_ortu,$telp_ortu,$alamat_ortu,$jenis_masalah,$deskripsi_masalah,$foto['file_name']);
            } else {
                @unlink($path . $foto['file_name']);
                $this->session->set_flashdata('error_file_foto', 'error_file_foto');

                if($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2 ) {
                    redirect('laporin/view_admin/null');
                }
                else {
                    redirect('laporin/view_user/null');
                }
            }   
        }
        else {
            $hasil = $this->m_laporin->insert_laporin($id,$nisn,$nama,$email,$alamat,$kelas,$nama_ortu,$telp_ortu,$alamat_ortu,$jenis_masalah,$deskripsi_masalah,null);
        }

   

        if ($hasil == false) {

            $this->session->set_flashdata('eror', 'eror');
            if($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2 ) {
                redirect('laporin/view_admin/null');
            }
            else {
                redirect('laporin/view_user/null');
            }

        } else {

            $this->session->set_flashdata('input', 'input');
            if($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2 ) {
                redirect('laporin/view_admin/null');
            }
            else {
                redirect('laporin/view_user/null');
            }
        }

    }

    public function update_laporin($param)
    {
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat  = $this->input->post('alamat');
        $kelas = $this->input->post('kelas');
        $nama_ortu = $this->input->post('nama_ortu');
        $telp_ortu = $this->input->post('telp_ortu');
        $alamat_ortu = $this->input->post('alamat_ortu');
        $jenis_masalah = $this->input->post('jenis_masalah');
        $deskripsi_masalah = $this->input->post('deskripsi_masalah');
        $status = $this->input->post('status');
        $id = $this->input->post('id_laporin');

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
                $hasil = $this->m_laporin->update_laporin($id,$nisn,$nama,$email,$alamat,$kelas,$nama_ortu,$telp_ortu,$alamat_ortu,$jenis_masalah,$deskripsi_masalah,$foto['file_name']);
            } else {
                @unlink($path . $foto['file_name']);
                $this->session->set_flashdata('error_file_foto', 'error_file_foto');
                if($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2 ) {
                    redirect('laporin/view_admin/'.$param);
                }
                else {
                    redirect('laporin/view_user/'.$param);
                }
            }   
        }
        else {
            $hasil = $this->m_laporin->update_laporin($id,$nisn,$nama,$email,$alamat,$kelas,$nama_ortu,$telp_ortu,$alamat_ortu,$jenis_masalah,$deskripsi_masalah,null);
        }


        if ($hasil == false) {
            $this->session->set_flashdata('eror', 'eror');
            if($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2 ) {
                redirect('laporin/view_admin/'.$param);
            }
            else {
                redirect('laporin/view_user/'.$param);
            }
        } else {
            @unlink($path . $this->input->post('foto_old'));
            $this->session->set_flashdata('update', 'update');
            if($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 2 ) {
                redirect('laporin/view_admin/'.$param);
            }
            else {
                redirect('laporin/view_user/'.$param);
            }
        }

    }

    public function update_status_laporin()
    {
        $id_laporin = $this->input->post('id_laporin');
        $status = $this->input->post('status');
        $param = $this->input->post('param');

    
        $hasil = $this->m_laporin->update_status_laporin($id_laporin,$status);

        if ($hasil == false) {
            $this->session->set_flashdata('eror', 'eror');

            redirect('laporin/'.$param);
        } else {
            $this->session->set_flashdata('update', 'update');
            redirect('laporin/'.$param);
        }

    }

    public function hapus_laporin()
    {

        $jenis = $_GET['jenis'];
        $tipe = $_GET['tipe'];
        
        $id_laporin = $this->input->post("id_laporin");

        $path = './assets/laporin/';

        $hasil = $this->m_laporin->delete_laporin($id_laporin);

        if ($hasil == false) {
            $this->session->set_flashdata('eror', 'eror');
            redirect('laporin/'.$jenis.'/'.$tipe);
        } else {
            @unlink($path . $this->input->post('foto_old'));
            $this->session->set_flashdata('delete', 'delete');
            redirect('laporin/'.$jenis.'/'.$tipe);
        }

    }

    
    public function diskusi_laporin()
    {
        $pesan = $this->input->post('pesan');

        $id_user = $this->session->userdata('id_user');
              
        $id_laporin = $this->input->post('id_laporin');
        $id_diskusi = md5($pesan . $id_user . $id_laporin);
        
        $param = $this->input->post('param');
        

        $hasil = $this->m_laporin->insert_diskusi($id_diskusi,$id_laporin,$id_user,$pesan);

        if ($hasil == false) {

            $this->session->set_flashdata('eror', 'eror');
            redirect('laporin/'.$param);

        } else {

            $this->session->set_flashdata('input', 'input');
            redirect('laporin/'.$param);

        }

    }

    public function disposisi($id,$jenis,$tipe) {
        
        $laporin = $this->m_laporin->get_laporin_detail_by_id($id)->result_array();
        $nama = $laporin[0]['nama'];
        $nisn = $laporin[0]['nisn'];
        $sekolah = 'SD KRISTEN SOKARAJA';
        $alamat = $laporin[0]['alamat'];
        $telp = $laporin[0]['telp_ortu'];
        $twk = 'Sekolah, ' .date('d/m/Y H:i:s',strtotime($laporin[0]['tgl_melapor']));
        $jenis_masalah = $laporin[0]['nama_jenis_masalah'];
        $deskripsi_masalah = $laporin[0]['deskripsi_masalah'];
        $bukti = base_url().'assets/laporin/'.$laporin[0]['foto'];

        // $bukti = "https://images4.imagebam.com/78/86/b4/MECOXMR_o.jpg";

        if($laporin[0]['foto']) {
            $bukti = "<p>Bukti:</p><img src='$bukti'>";
        }
        else {
            $bukti = "Tidak ada bukti di lampirkan.";
        }
     
        $html = "<html><head><center>FORMULIR PELAPORAN KASUS LINGKUP SEKOLAH</center></head><body><p>Saya ingin melaporkan kasus yang terjadi di lingkungan sekolah Saya, Saya yang bertangggung jawab atas pelaporan ini:</p><p>Nama: $nama </p><p>NISN: $nisn </p><p>Sekolah: $sekolah </p><p>Alamat: $alamat </p><p>Telp/HP: $telp </p><p>Berikut deskripsi kasus yang terjadi, antara lain: </p><p>Tempat dan Waktu Kejadian: $twk</p><p>Kategori Kasus: $jenis_masalah </p><p>Deskripsi Kasus: $deskripsi_masalah </p>$bukti<p>Demikian pelaporan kasus yang ingin saya sampaikan, terimakasih atas perhatiannya dan maaf jika terdapat penggunaan kata yang salah.</p></body></html>";
     
        $APIKEY = "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";
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $data = '{  
            "sender":{  
               "name":"Laporin SD Kristen Sokaraja",
               "email":"laporinsdkristen@gmail.com"
            },
            "to":[  
               {  
                  "email":"mariuzcalvin@gmail.com",
                  "name":"Admin"
               }
            ],
            "subject":"Disposisi Laporin Siswa",
            "htmlContent":"' . $html . '"
         }';
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api-Key: '.$APIKEY;
        $headers[] = 'Content-Type: application/json';

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
      
        if($result) {
            if (curl_errno($ch)) {
                curl_close($ch);
              
                $this->session->set_flashdata('eror', 'eror');
                redirect('laporin/detail_laporin?id='.$id.'&jenis='.$jenis.'&tipe='.$tipe); 
            }
            else {
                curl_close($ch);
                $upd_status = $this->m_laporin->update_status_laporin($id,5);
            
                $this->session->set_flashdata('disposisi', 'disposisi');
                redirect('laporin/detail_laporin?id='.$id.'&jenis='.$jenis.'&tipe='.$tipe);
    
            }
        }
        
        
    }



}
