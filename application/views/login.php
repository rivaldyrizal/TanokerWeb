<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masuk | Wisata Tanoker</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>assets/backend/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/backend/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <!-- form method -->
            <form method="post" action="<?php echo base_url('auth/login_validation'); ?>">
              <h1>Masuk Akun</h1>

              <!-- username form -->
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username"/>
                <span class="text-danger"><?php echo form_error('username'); ?></span>
              </div>

              <!-- password form -->
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
                <span class="text-danger"><?php echo form_error('password'); ?></span>
              </div>

              <div class="form-group">
                <!-- <a class="btn btn-default submit" href="<?php echo base_url('welcome/home'); ?>">Masuk</a> -->

                <input type="submit" name="insert" class="btn btn-default submit" value="Masuk">
                <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
                ?>

                <a class="reset_pass" href="#">Lupa password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya akun?
                  <a href="#signup" class="to_register"> Buat Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-tree"></i> Wisata Tanoker</h1>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Buat Akun</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun ?
                  <a href="#signin" class="to_register"> Masuk </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-tree"></i> Wisata Tanoker</h1>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
