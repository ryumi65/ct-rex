    <?php if (!isset($_SESSION['logged'])) {
        return redirect('login');
    } ?>
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <nav class="navbar navbar-expand-lg d-xl-none blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid pe-0">

                <!-- Bagian Kiri -->
                <a class="navbar-brand font-weight-bolder" href="#">
                    <?= $_SESSION['access'] ?>
                </a>

                <!-- Navbar Toggler -->
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </div>
        </nav>
    </div>