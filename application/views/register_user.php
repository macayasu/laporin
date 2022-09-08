<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORIN | REGISTER</title>

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/favicon.ico" />
    
    <!-- Font Icon -->
    <link rel="stylesheet"
        href="<?=base_url();?>assets/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?=base_url();?>assets/login/css/style.css">

    <!-- SweetAlert -->
    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <?php $this->load->view("./components/header.php") ?>

</head>

<body>
    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Berhasil Terdaftar!",
        text: "Silahkan Anda Login!",
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

    <?php if ($this->session->flashdata('password_err')){ ?>
    <script>
    swal({
        title: "Error Password!",
        text: "Ketik Ulang Password!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            
            <div class="container">
            <h2 style="margin-left:100px;margin-top:10px;margin-bottom:-20px;padding-top:20px"><b>Registrasi</b></h2>

            <form method="POST" class="register-form" id="register-form"
                        action="<?= base_url();?>register/proses_user">
                <div class="signup-content">
                    <div class="signup-form">                        
                            <div class="form-group">
                                <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama..." />
                            </div>
                            <div class="form-group">
                                <label for="nisn"><i class="zmdi zmdi-accounts-list material-icons-name"></i></label>
                                <input type="number" name="nisn" id="nisn" placeholder="NISN..." />
                            </div>
                            <div class="form-group">
                                <label for="telp"><i class="zmdi zmdi-smartphone-android material-icons-name"></i></label>
                                <input type="number" name="telp" id="telp" placeholder="No. Telp..." />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email..." />
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-directions material-icons-name"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Alamat..." />
                            </div>
                            <div class="form-group">
                                <label for="kelas"><i class="zmdi zmdi-local-activity material-icons-name" ></i></label>
                                <select name="kelas" class="form-control" style="margin-left:20px">
                                    <option >Kelas</option>
                                    <option value="I" >I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                </select>
                                <!-- <input type="text" name="kelas" id="kelas" placeholder="Kelas..." /> -->
                            </div>
                            <div class="form-group">
                                <label for="nama_ortu"><i class="zmdi zmdi-accounts-outline material-icons-name"></i></label>
                                <input type="text" name="nama_ortu" id="nama_ortu" placeholder="Nama Orang Tua/Wali..." />
                            </div>
                            <div class="form-group">
                                <label for="telp_ortu"><i class="zmdi zmdi-smartphone-android material-icons-name"></i></label>
                                <input type="number" name="telp_ortu" id="telp_ortu" placeholder="No. Telp Orang Tua/Wali..." />
                            </div>
                            <div class="form-group">
                                <label for="alamat_ortu"><i class="zmdi zmdi-directions material-icons-name"></i></label>
                                <input type="text" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Orang Tua/Wali..." />
                            </div>
                           
                    </div>
                    <div class="signup-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username..." />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password..." />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Konfirmasi Password..." />
                            </div>
                            <div class="form-group form-button" style="text-align:center">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        <a href="<?=base_url();?>login/login_user" class="signup-image-link">Sudah mempunyai akun? Login disini.</a>
                    </form>
                    </div>
                </div>
             
              
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?=base_url();?>assets/login/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/login/js/main.js"></script>
    <?php $this->load->view("./components/js.php") ?>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>