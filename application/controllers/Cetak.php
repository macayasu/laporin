<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cetak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_user');  
		$this->load->model('m_laporin');  
    }


    public function laporan_laporin($jenis){
       
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
 
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('laporan_laporin', $data);
    
    
    }

    public function laporan_kelas($kelas){
       
        $data['laporin'] = $this->m_laporin->get_kelas_laporin($kelas)->result_array();
        $data['jenis_laporan'] = 'Kelas '.$kelas;
       
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('laporan_laporin', $data);
    
    }

    public function laporan_kategori($kategori){

        if($this->session->userdata('id_user_level') == 1) {
            $data['laporin'] = $this->m_laporin->get_kategori_laporin($kategori,null)->result_array();
        }
        else {
            $kelas = $this->m_user->get_admin_detail_by_id($this->session->userdata('id_user'))->result_array();
            $data['laporin'] = $this->m_laporin->get_kategori_laporin($kategori,$kelas[0]['kelas'])->result_array();
        }

        $kategori = $this->m_laporin->get_jenis_masalah_byid($kategori)->result();
        $data['jenis_laporan'] = $kategori[0]->nama_jenis_masalah;
       
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('laporan_laporin', $data);
    
    
    }


}