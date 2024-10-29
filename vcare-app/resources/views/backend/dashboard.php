<?php

if (!empty($_SESSION['user_id'])): ?>
  <?php require_once('inc/header.php') ?>
  <?php require_once('inc/navbar.php') ?>
  <?php require_once('inc/sidebar.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <a href="<?= '?admin=posts' ?>"> </a>
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"> <i class="fa fa-user-md" aria-hidden="true"></i> </span>

                  <div class="info-box-content">
                    <span class="info-box-text">DOCTORS</span>
                    <span class="info-box-number"><?= count($allDoctors) ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="far fa-comments"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">MESSAGES</span>
                    <span class="info-box-number"><?= count($allMessages) ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">MAJORS</span>
                    <span class="info-box-number"><?= count($allMajors) ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">USERS</span>
                    <span class="info-box-number"><?= count($allUsers) ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-podcast" aria-hidden="true"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">NEWS</span>
                    <span class="info-box-number"><?= count($allNews) ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

                   <!-- /.col -->
                   <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-wheelchair" aria-hidden="true"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">BOOKED</span>
                    <span class="info-box-number"><?= count($allBooked) ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>


          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">



          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once('inc/footer.php') ?>

<?php else:
  header("location:" . $_SERVER['HTTP_REFERER']);
?>
<?php endif; ?>