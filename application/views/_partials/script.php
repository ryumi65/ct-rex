    <!--   Core JS Files   -->
    <script defer src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
    <script defer src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <script defer src="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script defer src="<?= base_url(); ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Chart -->
    <script defer src="<?= base_url(); ?>assets/js/plugins/chartjs.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Soft Dashboard UI -->
    <script defer src="<?= base_url(); ?>assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>

    </body>

    </html>