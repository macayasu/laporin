


<style>
body {
  margin: 0 auto;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

</style>
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
                                    <h3 class="card-title">Detail Laporin</h3>
                                  
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-4">
                                    <p>Status</p>
                                    
                                    <div class="form-group">
                                    <form action="<?=base_url();?>laporin/update_status_laporin" enctype="multipart/form-data" method="POST">                                            
                                            <div class="form-group">
                                              <input type="hidden" name="id_laporin" value="<?=$laporin[0]['id_laporin']?>"/>
                                              <input type="hidden" name="param" value="<?=explode('/',$_SERVER['REQUEST_URI'])[3]?>"/>

                                            </div>
                                            <div class="form-group">   
                                               <select name="status"  id="status" class="form-control mb-3">
                                                   <?php foreach ($status_laporin as $key => $st) { ?>
                                                    <option value="<?=$st['id_status_laporin']?>" <?php echo $laporin[0]['id_status_laporin'] == $st['id_status_laporin'] ? 'selected' : ''?>><?=$st['nama_status_laporin']?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                        <button type="submit" class="btn btn-primary mb-3 mr-2">
                                            Update
                                        </button>
                                        <a href="<?=base_url();?>laporin/<?=$jenis?>/<?=$tipe?>" class="btn btn-secondary mb-3 ml-2">Kembali</a>

                                    </form>
                                    </div>
                                    </div>
                                    </div>
                                    
                                </div>
                            <!-- /.card-body -->
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Diskusi</h3>       
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row overflow-auto">
                                    <div class="col-md-12">                                    
                                    <div class="form-group ">
                                        <form action="<?=base_url();?>laporin/diskusi_laporin" enctype="multipart/form-data" method="POST">    
                                        <input type="hidden" name="param" value="<?=explode('/',$_SERVER['REQUEST_URI'])[3]?>"/>
                                        
                                        <?php foreach ($diskusi as $key => $value) { ?>
                                            <?php if($value['id_user_level'] == "1" || $value['id_user_level'] == "2") {?>
                                                <div class="container">
                                                <label>Admin</label>
                                                <img src="<?=base_url();?>assets/public/assets/img/adminicon.jpg" alt="Avatar" >
                                                <p><?php echo $value['pesan']; ?></p>
                                                <span class="time-right"><?php echo $value['date_created']; ?></span>
                                                </div>
                                            <?php } if($value['id_user_level'] == "3") {?>
                                                <div class="container darker">
                                                <label>User</label>
                                                <img src="<?=base_url();?>assets/public/assets/img/usericon.jpg" alt="Avatar" class="right">
                                                <p><?php echo $value['pesan']; ?></p>
                                                <span class="time-left"><?php echo $value['date_created']; ?></span>
                                                </div>
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                    </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="pesan" id="pesan" cols="80" rows="4"></textarea>
                                            <input type="hidden" name="id_laporin" value="<?=$laporin[0]['id_laporin']?>"/>
                                            <!-- <input type="hidden" name="id_user" value="<?=$laporin[0]['id_user_detail']?>"/> -->
                                            <br>
                                            <br>
                                            <button type="submit" class="btn btn-primary mb-3 mr-2">
                                                Kirim
                                            </button>
                                            </form>

                                        </div>
                                    </div>
                                    
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