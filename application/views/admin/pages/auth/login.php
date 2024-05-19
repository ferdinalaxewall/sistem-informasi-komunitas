<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url('assets/') ?>"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sistem Infromasi Komunitas - Login</title>

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
        <div class="authentication-inner">
          <!-- Register -->
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
                <h4 class="mb-2">Selamat Datang 👋</h4>
                <p class="mb-4 text-muted">Bersiaplah untuk terhubung dan berbagi dengan komunitas kami.</p>
              </div>

              <?php if (validation_errors()) { ?>
                  <div class="alert alert-danger alert-dismissible" role="alert" data-type="validation-notification">
                      <?= validation_errors() ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                      </button>
                  </div>
              <?php } ?>

              <form id="formAuthentication" class="mb-3" action="<?= base_url('autentikasi') ?>" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Masukkan Email"
                    autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>Belum mempunyai akun?</span>
                <a href="<?= base_url('autentikasi/registrasi') ?>">
                  <span>Daftar disini</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
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
    <script src="<?= base_url('public/admin/assets/js/main.js') ?>"></script>
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

    <!-- Page JS -->
  </body>
</html>
