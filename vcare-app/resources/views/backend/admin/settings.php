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
                                    <li class="breadcrumb-item active">All Settings</li>
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
                                <!-- Main content -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Settings</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
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

                                    <form method="POST" Action="<?= '?admin=StoreSettings' ?>" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="site_name">site_name</label>
                                                    <input type="text" class="form-control" id="site_name" name="site_name"
                                                        value="<?= $allSettings[0]['site_name'] ?>"
                                                        placeholder="Enter site_name">
                                                    <input type="text" class="form-control" style="display:none" name="id"
                                                        value="<?= $allSettings[0]['id'] ?>">
                                                </div>
                                                <div class="form-group col-12">
                                                    <div class="col-12">
                                                        <label class="custom-file-label" for="question_img">Choose
                                                            file</label>
                                                        <input type="file" class="custom-file-input" id="question_img"
                                                            name="question_img"
                                                            value=""
                                                            placeholder="Enter question_img">
                                                    </div>
                                                    <div class="col-3"> <img
                                                            src="assets/img/<?= $allSettings[0]['question_img'] ?>"
                                                            class="card-img-top card-image-circle" width="50px"
                                                            height="50px" alt="question_img"></div>
                                                 
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="question_home">Question Home</label>
                                                    <input type="text" class="form-control" id="question_home"
                                                        name="question_home" value="<?= $settings['question_home'] ?>"
                                                        placeholder="Enter Question Home">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="question_answer">Question Answer</label>
                                                    <textarea class="form-control" id="question_answer"
                                                        name="question_answer" rows="3"
                                                        placeholder="Enter Question Answer"><?= $settings['question_answer'] ?></textarea>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="footer_title">Footer Title</label>
                                                    <input type="text" class="form-control" id="footer_title"
                                                        name="footer_title" value="<?= $settings['footer_title'] ?>"
                                                        placeholder="Enter Footer Title">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="footer_contact">Footer Content</label>
                                                    <textarea class="form-control" id="footer_contact" name="footer_contact"
                                                        rows="3"
                                                        placeholder="Enter Footer Content"><?= $settings['footer_contact'] ?></textarea>
                                                </div>


                                                <div class="form-group col-12">
                                                    <label for="footer_app_title">Footer App Title</label>
                                                    <input type="text" class="form-control" id="footer_app_title"
                                                        name="footer_app_title" value="<?= $settings['footer_app_title'] ?>"
                                                        placeholder="Enter Footer App Title">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="footer_app_contact">Footer App Contact</label>
                                                    <input type="text" class="form-control" id="footer_app_contact"
                                                        name="footer_app_contact"
                                                        value="<?= $settings['footer_app_contact'] ?>"
                                                        placeholder="Enter Footer App Contact">
                                                </div>
                                                <div class="form-group col-12">
                                                    <div class="col-12">
                                                        <label class="custom-file-label" for="footer_app_img">Choose
                                                            file</label>
                                                        <input type="file" class="custom-file-input" id="footer_app_img"
                                                            name="footer_app_img"
                                                            value="<?= $allSettings[0]['footer_app_img'] ?>"
                                                            placeholder="Enter footer_app_img">
                                                    </div>
                                                    <div class="col-3"> <img
                                                            src="assets/img/<?= $allSettings[0]['footer_app_img'] ?>"
                                                            class="card-img-top card-image-circle" width="50px"
                                                            height="50px" alt="footer_app_img"></div>
                                                 
                                                </div>



                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->


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