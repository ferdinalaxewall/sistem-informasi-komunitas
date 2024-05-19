

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
    <script src="<?= base_url('public/admin/assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

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
    

    <?php
        if (isset($count_join_forum)):
            $forum_categories = array_map(function ($item) {
                return $item->judul;
            }, $count_join_forum);
    
            $count_forum_series = array_map(function ($item) {
                return $item->total_join;
            }, $count_join_forum);
    ?>
    <script>
        const forumChartEl = document.querySelector('#forumChart'),
        forumChartConfig = {
            chart: {
                height: 400,
                type: 'line',
                parentHeightOffset: 0,
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    data: <?= json_encode($count_forum_series) ?>,
                }
            ],
            markers: {
                strokeWidth: 7,
                strokeOpacity: 1,
                strokeColors: [config.colors.white],
                colors: [config.colors.primary]
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            colors: [config.colors.primary],
            grid: {
                borderColor: config.colors.borderColor,
                xaxis: {
                    lines: {
                    show: true
                    }
                },
                padding: {
                    top: -20,
                    left: 50,
                    right: 50
                }
            },
            tooltip: {
                custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                    return '<div class="px-3 py-2">' + '<span>' + series[seriesIndex][dataPointIndex] + ' Bergabung</span>' + '</div>';
                }
            },
            xaxis: {
                title: {
                    text: 'Forum',
                },
                categories: <?= json_encode($forum_categories) ?>,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                    colors: config.graph.labelColor,
                    fontSize: '10px'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Jumlah Bergabung'
                },
                labels: {
                    style: {
                        colors: config.graph.labelColor,
                        fontSize: '11px'
                    }
                },
            }
        };

        if (typeof forumChartEl !== undefined && forumChartEl !== null) {
            const forumChart = new ApexCharts(forumChartEl, forumChartConfig);
            forumChart.render();
        }
    </script>
    <?php endif ?>

    <?php
        if (isset($count_join_event)):
            $event_categories = array_map(function ($item) {
                return $item->judul;
            }, $count_join_event);
    
            $count_event_series = array_map(function ($item) {
                return $item->total_join;
            }, $count_join_event);
    ?>
    <script>
        const eventChartEl = document.querySelector('#eventChart'),
        eventChartConfig = {
            chart: {
                height: 400,
                type: 'line',
                parentHeightOffset: 0,
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    data: <?= json_encode($count_event_series) ?>,
                }
            ],
            markers: {
                strokeWidth: 7,
                strokeOpacity: 1,
                strokeColors: [config.colors.white],
                colors: [config.colors.primary]
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            colors: [config.colors.primary],
            grid: {
                borderColor: config.colors.borderColor,
                xaxis: {
                    lines: {
                    show: true
                    }
                },
                padding: {
                    top: -20,
                    left: 50,
                    right: 50
                }
            },
            tooltip: {
                custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                    return '<div class="px-3 py-2">' + '<span>' + series[seriesIndex][dataPointIndex] + ' Bergabung</span>' + '</div>';
                }
            },
            xaxis: {
                title: {
                    text: 'Event',
                },
                categories: <?= json_encode($event_categories) ?>,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                    colors: config.graph.labelColor,
                    fontSize: '10px'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Jumlah Bergabung'
                },
                labels: {
                    style: {
                        colors: config.graph.labelColor,
                        fontSize: '11px'
                    }
                },
            }
        };

        if (typeof eventChartEl !== undefined && eventChartEl !== null) {
            const eventChart = new ApexCharts(eventChartEl, eventChartConfig);
            eventChart.render();
        }
    </script>
    <?php endif ?>

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
