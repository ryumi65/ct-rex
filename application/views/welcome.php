

<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_partials/head');?>

<body class="g-sidenav-show bg-gray-100">
<?php $this->load->view('_partials/sidebar');?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <?php $this->load->view('_partials/header');?>
    <!-- End Navbar -->
    <?php $this->load->view('_partials/headerprofile');?>
  </div>
  <?php $this->load->view('_partials/config');?>

  <?php $this->load->view('_partials/script');?>
</body>

</html>