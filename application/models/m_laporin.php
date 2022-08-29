<?php

class M_laporin extends CI_Model
{

    public function get_laporin_detail_by_id($id_laporin)
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin join user_detail ud on l.nisn = ud.nisn where l.id_laporin = '$id_laporin' order by l.tgl_melapor DESC");
        return $hasil;
    }

    public function get_laporin_diskusi_by_id($id_laporin)
    {
        $hasil = $this->db->query("SELECT * FROM diskusi d join laporin l on d.id_laporin = l.id_laporin join user u on d.id_user = u.id_user where d.id_laporin = '$id_laporin' order by d.date_created DESC");

        return $hasil;
    }
    
    public function get_jenis_masalah()
    {
        $hasil = $this->db->query("SELECT * FROM jenis_masalah");
        return $hasil;
    }
    
    public function get_jenis_masalah_byid($id)
    {
        $hasil = $this->db->query("SELECT * FROM jenis_masalah where id_jenis_masalah ='$id'");
        return $hasil;
    }

    public function get_status_laporin()
    {
        $hasil = $this->db->query("SELECT * FROM status_laporin");
        return $hasil;
    }

    public function get_status_laporin_byid($id)
    {
        $hasil = $this->db->query("SELECT * FROM status_laporin where id_status_laporin = $id");
        return $hasil;
    }


    public function get_kelas_laporin($kelas)
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin join user_detail ud on l.nisn = ud.nisn where ud.kelas = '$kelas' order by l.tgl_melapor DESC");

        return $hasil;
    }

    public function get_kategori_laporin($kategori)
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin join user_detail ud on l.nisn = ud.nisn where jm.id_jenis_masalah = '$kategori' order by l.tgl_melapor DESC");

        return $hasil;
    }

    public function get_all_laporin()
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin order by l.tgl_melapor DESC");
        return $hasil;
    }

    public function get_all_laporin_terbaru()
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin WHERE l.status=1 order by l.tgl_melapor DESC");

        return $hasil;
    }

    public function get_all_laporin_proses()
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin WHERE l.status=2 order by l.tgl_melapor DESC");

        return $hasil;
    }

    public function get_all_laporin_tolak()
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin WHERE l.status=3 order by l.tgl_melapor DESC");

        return $hasil;
    }

    public function get_all_laporin_selesai()
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin WHERE l.status=4 order by l.tgl_melapor DESC");

        return $hasil;
    }

    public function get_all_laporin_disposisi()
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin WHERE l.status=5 order by l.tgl_melapor DESC");

        return $hasil;
    }

    public function get_all_laporin_by_date_month($start, $end)
    {
        $hasil = $this->db->query("SELECT * FROM laporin l JOIN jenis_masalah jm ON l.jenis_masalah = jm.id_jenis_masalah JOIN status_laporin sl on l.status = sl.id_status_laporin where l.tgl_melapor between '$start' AND '$end' AND l.nisn IS NOT NULL");
        return $hasil;
    }

    public function count_all_laporin()
    {
        $hasil = $this->db->query("SELECT COUNT(id_laporin) as total_pencaker FROM laporin JOIN laporin_detail ON laporin.id_laporin_detail = laporin_detail.id_laporin_detail 
         WHERE id_laporin_level = 3");
        return $hasil;
    }

    public function count_all_laporin_terbaru()
    {
        $hasil = $this->db->query("SELECT COUNT(id_laporin) as total_laporin FROM laporin WHERE status=1");

        return $hasil;
    }

    public function count_all_laporin_proses()
    {
        $hasil = $this->db->query("SELECT COUNT(id_laporin) as total_laporin FROM laporin WHERE status=2");

        return $hasil;
    }

    public function count_all_laporin_tolak()
    {
        $hasil = $this->db->query("SELECT COUNT(id_laporin) as total_laporin FROM laporin WHERE status=3");

        return $hasil;
    }

    public function count_all_laporin_selesai()
    {
        $hasil = $this->db->query("SELECT COUNT(id_laporin) as total_laporin FROM laporin WHERE status=4");

        return $hasil;
    }

    public function count_all_laporin_disposisi()
    {
        $hasil = $this->db->query("SELECT COUNT(id_laporin) as total_laporin FROM laporin WHERE status=5");

        return $hasil;
    }

    
    public function insert_diskusi($id_diskusi,$id_laporin,$id_user,$pesan)
    {
       $this->db->trans_start();

       $this->db->query("INSERT INTO diskusi(id_diskusi, id_laporin, pesan, id_user, date_created,time_created) VALUES ('$id_diskusi','$id_laporin','$pesan','$id_user',NOW(),DATE_FORMAT(NOW(),'%h:%m:%s'))");
       
       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function insert_laporin($id,$nisn,$nama,$email,$alamat,$jenis_masalah,$foto)
    {
       $this->db->trans_start();

       $this->db->query("INSERT INTO laporin(id_laporin, nisn, nama, email ,alamat, jenis_masalah,tgl_melapor,foto) VALUES ('$id','$nisn','$nama','$email','$alamat','$jenis_masalah',NOW(),'$foto')");
       
       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

  

    public function update_laporin($id,$nisn,$nama,$email,$alamat,$jenis_masalah,$tgl_melapor,$foto) {
        $this->db->trans_start();
        if($foto) {
            $this->db->query("UPDATE laporin SET nisn='$nisn', nama='$nama', email='$email', 
            alamat='$alamat', jenis_masalah='$jenis_masalah', foto='$foto' WHERE id_laporin='$id'");
        }else {
            $this->db->query("UPDATE laporin SET nisn='$nisn', nama='$nama', email='$email', 
            alamat='$alamat', jenis_masalah='$jenis_masalah' WHERE id_laporin='$id'");
        }

        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_status_laporin($id,$status) {
        $this->db->trans_start();

        $this->db->query("UPDATE laporin SET status='$status' WHERE id_laporin='$id'");

        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;

    }


    public function delete_laporin($id_laporin)
    {
       $this->db->trans_start();

       $this->db->query("DELETE FROM laporin WHERE id_laporin='$id_laporin'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }


}