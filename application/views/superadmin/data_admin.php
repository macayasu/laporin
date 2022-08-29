

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

    <?php if ($this->session->flashdata('password_err')){ ?>
    <script>
    swal({
        title: "Error Password!",
        text: "Ketik Ulang Password!",
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
                            <h1 class="m-0">Data Admin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>

                        </div><!-- /.col -->
                     
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
                                    <h3 class="card-title">Table Data Admin <b></b></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal"
                                            data-target="#tambah_user">
                                            Tambah Admin
                                        </button>
                                      
                                        <!-- <a href="<?=base_url();?>cetak/laporan_admin/<?php echo explode('/',$_SERVER['REQUEST_URI'])[4]?>" class="btn btn-danger mb-3 ml-2" target="_blank">Cetak Laporan</a> -->
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NUPTK</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Kelas</th>
                                                <th>Username</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 0;
                                            foreach($admin as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $nuptk = $i['nuptk'];
                                            $nama = $i['nama'];
                                            $email = $i['email'];
                                            $alamat = $i['alamat'];
                                            $telp = $i['telp'];
                                            $kelas = $i['kelas'];
                                            $username = $i['username'];
                                            $password = $i['password'];
                                                ?>
                                            <tr>
                                                <td><?=$id?></td>
                                                <td><?=$nuptk ?></td>
                                                <td><?=$nama?></td>
                                                <td><?=$email?></td>
                                                <td><?=$alamat?></td>
                                                <td><?=$telp?></td>
                                                <td><?=$kelas?></td>
                                                <td><?=$username?></td>
                                                <td class="text-center" width="15%">
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ubah_user_<?=$id_user?>"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a href="" data-toggle="modal" data-target="#delete_user" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                       
                                        
                                            <!-- Modal Ubah Data -->
                                            <div class="modal fade" id="ubah_user_<?=$id_user?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                Admin
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>master/update_user" enctype="multipart/form-data" method="POST">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" value="<?=$id_user?>" name="id"
                                                                            hidden>
                                                                        <!-- <div class="form-group">
                                                                            <label for="id_user">ID User</label>
                                                                            <input type="text" class="form-control"
                                                                                id="id_user" name="id_user"
                                                                                aria-describedby="emailHelp"
                                                                                value="<?=$id_user?>" readonly>
                                                                        </div> -->
                                                                        <div class="form-group">
                                                                            <label for="nisn">NUPTK</label>
                                                                            <input type="text" class="form-control" id="nuptk"
                                                                                name="nuptk" aria-describedby="emailHelp"
                                                                                value="<?=$nuptk?>" required>
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
                                                                            <label for="telp">Telp</label>
                                                                            <input type="text" class="form-control"
                                                                                id="telp" name="telp"
                                                                                value="<?=$telp?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="kelas">Wali Kelas</label>
                                                                            <select name="kelas" class="form-control">
                                                                                <option value="I" <?= $kelas == "I" ? 'selected' : '' ?>>I</option>
                                                                                <option value="II" <?= $kelas == "II" ? 'selected' : '' ?>>II</option>
                                                                                <option value="III" <?= $kelas == "III" ? 'selected' : '' ?>>III</option>
                                                                                <option value="IV" <?= $kelas == "IV" ? 'selected' : '' ?>>IV</option>
                                                                                <option value="V" <?= $kelas == "V" ? 'selected' : '' ?>>V</option>
                                                                                <option value="VI" <?= $kelas == "VI" ? 'selected' : '' ?>>VI</option>
                                                                            </select>
                                                                            <!-- <input type="text" class="form-control"
                                                                                id="kelas" name="kelas" required> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="usename">Username</label>
                                                                            <input type="text" class="form-control"
                                                                                id="username" name="username" value="<?=$username?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="pw">Password</label>
                                                                            <input type="password" class="form-control"
                                                                                id="pw" name="pw" value="<?=$password?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="cpw">Konfirmasi Password</label>
                                                                            <input type="password" class="form-control"
                                                                                id="cpw" name="cpw" required>
                                                                            <span id='message'></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                                                            </form>
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
        <div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data
                            Admin
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url();?>master/tambah_user" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nuptk">NUPTK</label>
                                            <input type="text" class="form-control" id="nuptk"
                                                name="nuptk" aria-describedby="emailHelp" required>
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
                                            <label for="telp">No Telp</label>
                                            <input type="text" class="form-control"
                                                id="telp" name="telp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Wali Kelas</label>
                                            <select name="kelas" class="form-control">
                                                <option value="I" >I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                            </select>
                                            <!-- <input type="text" class="form-control"
                                                id="kelas" name="kelas" required> -->
                                        </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control"
                                            id="username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwI">Password</label>
                                        <input type="password" class="form-control"
                                            id="pwInsert" name="pw" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpw">Konfirmasi Password</label>
                                        <input type="password" class="form-control"
                                            id="cpwInsert" name="cpw" required>
                                            <span id='messageInsert'></span>
                                    </div>
                                </div>     
                            </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->


         <!-- Modal Delete Data -->
         <div class="modal fade" id="delete_user" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data
                            Admin
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url();?>master/hapus_user"
                            method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_user"
                                        value="<?php echo $id_user?>" />
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

<script>

$(document).ready(function() {
    $('#pw, #cpw').on('keyup', function () {
    if ($('#pw').val() == $('#cpw').val()) {
        $('#message').html('Password Cocok').css('color', 'green');
    } else 
        $('#message').html('Password Tidak Cocok').css('color', 'red');
    });

    $('#pwInsert, #cpwInsert').on('keyup', function () {
    if ($('#pwInsert').val() == $('#cpwInsert').val()) {
        $('#messageInsert').html('Password Cocok').css('color', 'green');
    } else 
        $('#messageInsert').html('Password Tidak Cocok').css('color', 'red');
    });
});

</script>