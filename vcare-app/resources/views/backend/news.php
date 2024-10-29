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
                                    <li class="breadcrumb-item"><a href="<?= '?admin=dashboard' ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active">All News</li>
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
                                if (isset($_SESSION['success'])) {
                                    require_once('views/errors/success.php');
                                }
                                unset($_SESSION['success'])
                                    ?>
                                <?php
                                if (isset($_SESSION['errors'])) {
                                    require_once('views/errors/error.php');
                                }
                                unset($_SESSION['errors'])
                                    ?>
                                <!-- START -->
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Img Link</th>
                                                    <th>Title News</th>
                                                    <th>Content News</th>
                                                    <th>Published</th>
                                                    <th>Created At</th>
                                                    <th>
                                                        <a href="<?= "?admin=AddNewNew" ?>" title="Add A New News"
                                                            class="btn btn-block btn-outline-success">Add</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($allNews as $news): ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $news['img_link'] ?></td>
                                                        <td><?= $news['title_news'] ?>
                                                        <td><?= $news['contact_news'] ?>
                                                        <?php if($news['published']==0):?>
                                                        <td class="text-center text-danger">Not Published</td>
                                                        <?php else:?>
                                                        <td class="text-center text-success">Yes</td>
                                                        <?php endif;?>
                                                        </td>
                                                        <td> <span class="date"> <i class="far fa-clock mr-1"></i>
                                                                <?= date('d F Y', strtotime($news['created_at'])) ?>
                                                            </span></td>
                                                        <td>
                                                            <a href="?admin=EditNews&id=<?= $news['id'] ?>"
                                                                title="Edit This news"
                                                                class="btn btn-block btn-outline-info">Edit</a>
                                                            <a href="?admin=DeleteNews&id=<?= $news['id'] ?>"
                                                                title="Delete This news"
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

        <?php else:
    header("location:" . $_SERVER['HTTP_REFERER']);
    ?>
        <?php endif; ?>