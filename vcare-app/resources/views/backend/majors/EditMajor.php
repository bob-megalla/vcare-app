<?php

if (!empty($_SESSION['user_id'])): ?>
    <?php require_once(BASE_PATH . '../views/backend/inc/header.php') ?>
    <?php require_once(BASE_PATH . '../views/backend/inc/navbar.php') ?>
    <?php require_once(BASE_PATH . '../views/backend/inc/sidebar.php') ?>
    <?php require_once BASE_PATH . 'Session.php' ?>

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
                            <li class="breadcrumb-item"><a href="<?= '?admin=allMajors' ?>">All Majors</a></li>
                            <ages class="breadcrumb-item active">Edit Major</ages>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <?php if (Session::getSession("errors")): ?>
                <?php require_once BASE_PATH . "../views/errors/error.php" ?>
            <?php endif; ?>
            <?php if (Session::getSession("success")): ?>
                <?php require_once BASE_PATH . "../views/errors/success.php" ?>
            <?php endif; ?>
            <form role="form" method="POST" action="?admin=StoreEditMajor" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_major">Doctor Name</label>
                        <input type="text" class="form-control" id="name_major" placeholder="Enter Doctor Name"
                            name="name_major" value="<?= $allMajors["name_major"] ?>">
                            <input type="text" style="display:none" class="form-control" id="id" placeholder="Enter Doctor Name"
                            name="id" value="<?= $allMajors["id"] ?>">
                    </div>
                
                    <div class="form-group">
                        <label for="img_major">Major Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_major" name="img_major" value="<?= $allMajors['img_major'] ?>">
                                <label class="custom-file-label" for="img_major">Choose Image</label>
                            </div>
                            <div class="col-1">
                                <img src="assets/img/majors/<?= $allMajors['img_major'] ?>"
                                    class="card-img-top rounded-circle card-image-circle" width="50" height="50"
                                    alt="major">
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once(BASE_PATH . '../views/backend/inc/footer.php') ?>

    <?php Session::removeSession("errors") ?>
    <?php Session::removeSession("success") ?>

<?php else:
    header("location:" . $_SERVER['HTTP_REFERER']);
?>
<?php endif; ?>