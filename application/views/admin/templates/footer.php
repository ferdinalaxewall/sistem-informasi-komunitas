

                  <!-- Footer -->
                  <footer class="content-footer footer bg-footer-theme">
                      <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                          <div>
                              <strong>Sistem Informasi Komunitas - Kelompok 1 12.4E.13</strong>
                          </div>
                          <div>
                              <p>Universitas Bina Sarana Informatika</p>
                          </div>
                      </div>
                  </footer>
                  <!-- / Footer -->
                  
                  <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Layout Container -->

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?= base_url('public/admin/assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/js/menu.js') ?>"></script>
    <script src="<?= base_url('public/admin/assets/vendor/libs/iziToast/js/iziToast.min.js') ?>"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

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

        function previewFile(input, previewElementId) {
            var file = $(input).get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function () {
                    $("#" + previewElementId).attr("src", reader.result);
                };

                reader.readAsDataURL(file);
            }
        }
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
