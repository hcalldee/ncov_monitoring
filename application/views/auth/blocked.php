<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Access Blocked</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/chosen/component-chosen.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/mystyle.css">


  <!-- SWEETT ALERT -->
  <script src="<?= base_url(); ?>assets/js/sweet-alert/sweetalert2.all.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">
          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-5">Access Forbidden</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="<?= base_url('index.php/auth'); ?>">&larr; Back to Dashboard</a>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- jquery harus diatas bootsrap  -->
  <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>

  <!-- js sendiri -->

  <!-- js offline -->
  <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/chosen.jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/scriptku.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>