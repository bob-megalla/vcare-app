<?php
if (!empty($_SESSION['user_id'])): ?>
    <?php require_once('inc/header.php') ?>
    <?php require_once BASE_PATH . 'Session.php' ?>


    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

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
                                    <ages class="breadcrumb-item active">All Messages</ages>
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
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Is Read</th>
                                                    <th>Sent At</th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($allMessages as $message): ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $message['name'] ?></td>
                                                        <td><?= $message['phone'] ?></td>
                                                        <td><?= $message['email'] ?></td>
                                                        <td><?= $message['subject'] ?></td>
                                                        <td><?= $message['message'] ?></td>
                                                        <?php if ($message['is_readed'] == 0): ?>
                                                            <td class="text-center text-danger">Not Yet</td>
                                                        <?php else: ?>
                                                            <td class="text-center text-success">Yes</td>
                                                        <?php endif; ?>


                                                        <td> <span class="date"> <i class="far fa-clock mr-1"></i>
                                                                <?= date('d F Y', strtotime($message['created_at'])) ?>
                                                            </span></td>
                                                        <td>
                                                            <a href="?admin=getMessage&id=<?= $message['id'] ?>"
                                                                title="Read This message"
                                                                class="btn btn-block btn-outline-info">Read</a>
                                                            <a href="?admin=deleteMessage&id=<?= $message['id'] ?>"
                                                                title="Delete This message"
                                                                class="btn btn-block btn-outline-danger">Delete</a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>


                                <?php Session::removeSession("errors") ?>
            <?php Session::removeSession("success") ?>
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


        <?php else:
    header("location:" . $_SERVER['HTTP_REFERER']);
    ?>
        <?php endif; ?>