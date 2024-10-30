<?php
if (!empty($_SESSION['user_id'])): ?>
    <?php require_once('inc/header.php') ?>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        <?php require_once BASE_PATH . 'Session.php' ?>

            <?php require_once('inc/navbar.php') ?>
            <?php require_once('inc/sidebar.php') ?>



            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark"><?= strtoupper($page_name) ?></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?= '?admin=dashboard' ?>">Dashboard</a></li>
                                    <ages class="breadcrumb-item active">All Booked</ages>
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
                            <?php if (Session::getSession("errors")): ?>
                                    <?php require_once BASE_PATH . "../views/errors/error.php" ?>
                                <?php endif; ?>
                                <?php if (Session::getSession("success")): ?>
                                    <?php require_once BASE_PATH . "../views/errors/success.php" ?>
                                <?php endif; ?>
                                <!-- START -->
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Doctor Name</th>
                                                    <th>Is Completed</th>
                                                    <th>Created At</th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($allBooked as $booked): ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $booked['name'] ?></td>
                                                        <td><?= $booked['phone'] ?></td>
                                                        <td><?= $booked['email'] ?></td>
                                                        <?php $doctorName = Doctor::getRow("doctors",$booked['doctor_id']); ?>
                                                        <td>DR. <?= ucfirst($doctorName['name_doctor'] )?></td>
                                                        <?php if ($booked['is_compeleted'] == "no"): ?>
                                                            <td class=" text-danger">Not Completed</td>
                                                        <?php else: ?>
                                                            <td class="pl-5 text-success">Yes</td>
                                                        <?php endif; ?>
                                                        <td> <span class="date"> <i class="far fa-clock mr-1"></i>
                                                                <?= date('d F Y', strtotime($booked['created_at'])) ?>
                                                            </span></td>
                                                        <td>
                                                            <a href="?admin=getBooked&id=<?= $booked["id"] ?>"
                                                                title="Read This booked"
                                                                class="btn btn-block btn-outline-info">Complete</a>
                                                            <a href="?admin=getBookedDeleted&id=<?= $booked['id'] ?>"
                                                                title="Delete This booked"
                                                                class="btn btn-block btn-outline-danger">Delete</a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>


                                <!-- END -->
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
            <?php Session::removeSession("errors") ?>
            <?php Session::removeSession("success") ?>

        <?php else:
    header("location:" . $_SERVER['HTTP_REFERER']);
    ?>
        <?php endif; ?>