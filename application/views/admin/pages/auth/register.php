<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url('public/admin/assets/') ?>"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('public/admin/assets/img/favicon/favicon.ico') ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('public/admin/assets/vendor/fonts/boxicons.css') ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('public/admin/assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('public/admin/assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('public/admin/assets/css/demo.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/admin/assets/vendor/libs/iziToast/css/iziToast.min.css') ?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('public/admin/assets/vendor/css/pages/page-auth.css') ?>" />

    <!-- Helpers -->
    <script src="<?= base_url('public/admin/assets/vendor/js/helpers.js') ?>"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('public/admin/assets/js/config.js') ?>"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner" style="width: min(800px, 90vw); max-width: none;">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2 mt-3">
                  <img src="<?= base_url('public/system/img/logo/small-logo-tda.png') ?>" alt="TDA Logo">
                </a>
              </div>
              <!-- /Logo -->
              <div class="text-center">
                  <h4 class="mb-2">Sistem Informasi Komunitas</h4>
                  <p class="mb-4">Ayo mulai berdiskusi!</p>
              </div>

              <form id="formAuthentication" class="mb-3 row" action="<?= base_url('autentikasi/registrasi') ?>" method="POST">
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert" data-type="validation-notification">
                        <?= validation_errors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                <?php } ?>

                <div class="col-12 mb-3">
                    <label for="nama" class="form-label required">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="" placeholder="Masukkan Email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="no_telp" class="form-label required">No. HP</label>
                    <input type="tel" class="form-control" name="no_telp" id="no_telp" value="" placeholder="Masukkan Nomor HP" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="alamat" class="form-label required">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat" required></textarea>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            Saya menyetujui
                            <a href="javascript:void(0);">Syarat & Ketentuan</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Sudah mempunyai akun?</span>
                <a href="<?= base_url('autentikasi') ?>">
                  <span>Login disini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?= base_url('public/admin/assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/js/menu.js') ?>"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('public/admin/assets/vendor/libs/iziToast/js/iziToast.min.js') ?>"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        // iziToast Default Configuration
        iziToast.settings({
            timeout: 3500,
            position: "topRight",
            pauseOnHover: false,
            transitionIn: "bounceInLeft",
            transitionOut: "fadeOutRight",
            transitionInMobile: "bounceInLeft",
            transitionOutMobile: "fadeOutRight",
        });
    </script>

    <!-- Page JS -->
    <?php if ($this->session->flashdata('success')): ?>
    <script>
        $(document).ready(function(){
            iziToast.success({
                title: 'Success',
                message : '<?= $this->session->flashdata('success'); ?>',
            });
        })
    </script>
    <?php endif ?>
    
    <?php if ($this->session->flashdata('error')): ?>
    <script>
        $(document).ready(function(){
            iziToast.error({
                title: 'Failed',
                message : '<?= $this->session->flashdata('error'); ?>',
            });
        })
    </script>
    <?php endif ?>
  </body>
</html>
