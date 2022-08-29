

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("superadmin/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('update')){ ?>
    <script>
    swal({
        title: "Berhasil Diubah!",
        text: "Data Berhasil Diubah!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Berhasil Ditambahakan!",
        text: "Data Berhasil Ditambahkan!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')){ ?>
    <script>
    swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('delete')){ ?>
    <script>
    swal({
        title: "Berhasil Dihapus!",
        text: "Data Berhasil Dihapus!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('error_file_foto')){ ?>
    <script>
    swal({
        title: "Gagal Diiupdate!",
        text: "Foto gagal diupload!",
        icon: "error"
    });
    </script>
    <?php } ?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("superadmin/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("superadmin/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Laporin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Laporin</li>
                            </ol>

                        </div><!-- /.col -->
                        <!-- <div class="row mb-3 mt-3 ml-2">
                            <form action="<?=base_url();?>Cetak/laporan_laporin_perbulan" method="POST">
                                <div class="form-group">
                                    <div class="col">
                                        <label for="bulan">Pilih Bulan</label>
                                        <select class="form-control" id="bulan" name="bulan">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                </div>
                            </form>
                        </div> -->
                    </div><!-- /.row -->


                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Table Data Laporin <b><?=$jenis_laporan?></b></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal"
                                            data-target="#tambah_laporin">
                                            Tambah Laporin
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Filter Status
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?=base_url();?>laporin/view_admin/all" >Laporan Semua</a>
                                                <a class="dropdown-item" href="<?=base_url();?>laporin/view_admin/terbaru" >Laporan Terbaru</a>
                                                <a class="dropdown-item" href="<?=base_url();?>laporin/view_admin/proses" >Laporan Diproses</a>
                                                <a class="dropdown-item" href="<?=base_url();?>laporin/view_admin/tolak" >Laporan Ditolak</a>
                                                <a class="dropdown-item" href="<?=base_url();?>laporin/view_admin/selesai" >Laporan Selesai</a>
                                                <a class="dropdown-item" href="<?=base_url();?>laporin/view_admin/disposisi" >Laporan Didisposisikan</a>
                                            </div>
                                        </div>
                                      
                                      
                                        <a href="<?=base_url();?>cetak/laporan_laporin/<?php echo explode('/',$_SERVER['REQUEST_URI'])[4]?>" class="btn btn-danger mb-3 ml-2" target="_blank">Cetak Laporan</a>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Jenis Masalah</th>
                                                <th>Tanggal Melapor</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 0;
                                            foreach($laporin as $i)
                                            :
                                            $id++;
                                            $id_laporin = $i['id_laporin'];
                                            $nisn = $i['nisn'];
                                            $nama = $i['nama'];
                                            $email = $i['email'];
                                            $alamat = $i['alamat'];
                                            $id_jenis_masalah = $i['id_jenis_masalah'];
                                            $nama_jenis_masalah = $i['nama_jenis_masalah'];
                                            $status = $i['nama_status_laporin'];
                                            $tgl_melapor = $i['tgl_melapor'];
                                            $foto = $i['foto'];
                                                ?>
                                            <tr>
                                                <td><?=$id?></td>
                                                <td><?=$nisn ?></td>
                                                <td><?=$nama?></td>
                                                <td><?=$email?></td>
                                                <td><?=$alamat?></td>
                                                <td><?=$nama_jenis_masalah?></td>
                                                <td><?=$tgl_melapor?></td>
                                                <td>
                                                    <center> <a
                                                            href="<?= base_url();?>assets/laporin/<?php echo $foto?>"
                                                            target="_blank"><img
                                                                src="<?= base_url();?>assets/laporin/<?php echo $foto?>"
                                                                style="width: 50%"> </a></center>
                                                </td>
                                                <td><?=$status?></td>

                                                <td class="text-center" width="30%">
                                                    <!-- <a href="" class="btn btn-warning" data-toggle="modal" data-target="#ubah_status<?=$id_laporin?>"><i class="nav-icon fas fa-check"></i></a>                                                     -->
                                                    <a href="<?=base_url();?>laporin/detail_laporin/<?=$id_laporin?>" class="btn btn-warning"><i class="nav-icon fas fa-info-circle"></i></a>                                                    
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ubah_laporin<?=$id_laporin?>"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a href="" data-toggle="modal" data-target="#delete_laporin<?=$id_laporin?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                       
                                        
                                            <!-- Modal Ubah Data -->
                                            <div class="modal fade" id="ubah_laporin<?=$id_laporin?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                Laporin
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="<?=base_url();?>laporin/update_laporin"
                                                                enctype="multipart/form-data" method="POST">
                                                                <!-- <input type="text" value="<?=$id_laporin?>" name="id_laporin"
                                                                    hidden> -->
                                                                <div class="form-group">
                                                                    <label for="id_laporin">ID Laporan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="id_laporin" name="id_laporin"
                                                                        aria-describedby="emailHelp"
                                                                        value="<?=$id_laporin?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nisn">NISN</label>
                                                                    <input type="text" class="form-control" id="nisn"
                                                                        name="nisn" aria-describedby="emailHelp"
                                                                        value="<?=$nisn?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Lengkap</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama" name="nama"
                                                                        value="<?=$nama?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        id="email" name="email"
                                                                        value="<?=$email?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" class="form-control"
                                                                        id="alamat" name="alamat"
                                                                        value="<?=$alamat?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis_masalah">Jenis Masalah</label>
                                                                   <select name="jenis_masalah" id="jenis_masalah" class="form-control">
                                                                   <?php foreach ($jenis_masalah as $key => $jm) { ?>
                                                                        <option value="<?=$jm['id_jenis_masalah']?>" <?php echo $jenis_masalah == $jm['nama_jenis_masalah'] ? 'selected' : ''?>><?=$jm['nama_jenis_masalah']?></option>
                                                                   <?php } ?> 
                                                                    </select>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                   <select name="status"  id="status" class="form-control">
                                                                    <?php foreach ($status_laporin as $key => $st) { ?>
                                                                        <option value="<?=$st['id_status_laporin']?>" <?php echo $status == $st['id_status_laporin'] ? 'selected' : ''?>><?=$st['nama_status_laporin']?></option>
                                                                    <?php } ?> 
                                                                </select>
                                                                </div> -->
                                                            
                                                                <div class="form-group">
                                                                    <label for="foto">Foto</label>
                                                                    <input type="file" class="form-control"
                                                                        id="foto" name="foto">
                                                                    <small id="foto"
                                                                        class="form-text text-muted">Masukan Ulang
                                                                        Foto</small>
                                                                    <small id="foto"
                                                                        class="form-text text-muted">Format PNG/JPG/JPEG
                                                                        (Max 2MB)</small>
                                                                    <input type="text" class="form-control"
                                                                        id="foto" name="foto_old"
                                                                        value="<?=$foto?>" hidden>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary mb-3">Submit</button>
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <!-- Modal Ubah Status -->
                                            <div class="modal fade" id="ubah_status<?=$id_laporin?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Status
                                                                Laporin
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="<?=base_url();?>laporin/update_status_laporin"
                                                                enctype="multipart/form-data" method="POST">
                                                                <!-- <input type="text" value="<?=$id_laporin?>" name="id_laporin"> -->
                                                                <div class="form-group">
                                                                    <label for="id_laporin">ID Laporin</label>
                                                                    <input type="text" class="form-control"
                                                                        id="id_laporin" name="id_laporin"
                                                                        aria-describedby="emailHelp"
                                                                        value="<?=$id_laporin?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                   <select name="status"  id="status" class="form-control">
                                                                    <?php foreach ($status_laporin as $key => $st) { ?>
                                                                        <option value="<?=$st['id_status_laporin']?>" <?php echo $status == $st['id_status_laporin'] ? 'selected' : ''?>><?=$st['nama_status_laporin']?></option>
                                                                    <?php } ?> 
                                                                </select>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary mb-3">Submit</button>
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Delete Data -->
                                            <div class="modal fade" id="delete_laporin<?=$id_laporin?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Data
                                                                Laporin
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url();?>laporin/hapus_laporin"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_laporin"
                                                                            value="<?php echo $id_laporin?>" />
                                                                        <input type="hidden" name="foto_old"
                                                                            value="<?=$foto?>">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                <?php endforeach;?>
                                </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- Modal Tambah Data -->
        <div class="modal fade" id="tambah_laporin" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data
                            Laporin
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url();?>laporin/tambah_laporin" enctype="multipart/form-data"
                            method="POST">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="nisn"
                                    name="nisn" aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control"
                                    id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control"
                                    id="email" name="email"required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control"
                                    id="alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_masalah">Jenis Masalah</label>
                                <select name="jenis_masalah" id="jenis_masalah" class="form-control">
                                    <?php foreach ($jenis_masalah as $key => $jm) { ?>
                                        <option value="<?=$jm['id_jenis_masalah']?>" <?php echo $jenis_masalah == $jm['nama_jenis_masalah'] ? 'selected' : ''?>><?=$jm['nama_jenis_masalah']?></option>
                                    <?php } ?> 
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                <option value="0">Belum di Proses</option>
                                <option value="1">Selesai</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" required>
                                <small id="foto" class="form-text text-muted">Format PNG/JPG/JPEG (Max 2MB)</small>
                            </div>

                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("superadmin/components/js.php") ?>
</body>

</html>