<?php
if (!empty($_SESSION['user_id'])): ?>
    <?php require_once('inc/header.php') ?>

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
                                    <li class="breadcrumb-item"><a href="<?= '?admin=dashboard'?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active">All Messages</li>
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
                            <?php
                                    if (isset($_SESSION['errors'])) {
                                        require_once('views/errors/error.php');
                                    }
                                    unset($_SESSION['errors'])
                                        ?>
                                         <?php
                                    if (isset($_SESSION['success'])) {
                                        require_once('views/errors/success.php');
                                    }
                                    unset($_SESSION['success'])
                                        ?>
                                   
                                <!-- START -->
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>E-Mail</th>
                                                    <th>Phone</th>
                                                    <th>Content</th>
                                                    <th>IS Read</th>
                                                    <th>Created By</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($AllMessages as $message): ?>
                                                    <tr>
                                                        <td><?= $message['id'] ?></td>
                                                        <td><?= $message['name'] ?></td>
                                                        <td><?= $message['email'] ?></td>
                                                        <td><?= $message['phone'] ?></td>
                                                        <td><?= $message['content'] ?></td>
                                                        <td><?= $message['is_readed'] ?></td>
                                                        <td><?= date("F d, Y",strtotime($message['created_at'])); ?></td>
                                                        <td>
                                                            <?php if($message['is_readed'] == 1): ?>
                                                            <a href="<?="?admin=read_message&id=$message[id]"?>" title="This Messages Already Readed" class="btn btn-block btn-outline-info disabled">Read</a>
                                                            <?php else: ?>
                                                            <a href="<?="?admin=read_message&id=$message[id]"?>" class="btn btn-block btn-outline-info">Read</a>
                                                            <?php endif; ?>

                                                        <a href="<?="?admin=delete_message&id=$message[id]"?>" class="btn btn-block btn-outline-danger">Delete</a>

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

        <?php else:
    header("location:" . $_SERVER['HTTP_REFERER']);
    ?>
        <?php endif; ?>