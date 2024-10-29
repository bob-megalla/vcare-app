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
                            <li class="breadcrumb-item"><a href="<?= '?admin=allDoctors' ?>">All Doctors</a></li>
                            <ages class="breadcrumb-item active">Edit Doctor</ages>
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
            <form role="form" method="POST" action="?admin=StoreEditDoctor" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="doctorName">Doctor Name</label>
                        <input type="text" class="form-control" id="doctorName" placeholder="Enter Doctor Name"
                            name="doctorName" value="<?= $allDoctors["name_doctor"] ?>">
                            <input type="text" style="display:none" class="form-control" id="id" placeholder="Enter Doctor Name"
                            name="id" value="<?= $allDoctors["id"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Select Major</label>
                        <?php $allMajors = Major::getAll("major"); ?>
                        <select class="form-control" name="major_id">
                            <?php if (!empty($allMajors)): ?>
                                <?php $selectedMajorName = Major::getRow("major", $allDoctors["major_id"]) ?>
                                <option value="<?= $allDoctors["major_id"] ?>" selected >
                                    <?= $selectedMajorName["name_major"] ?></option>
                                <?php foreach ($allMajors as $major): ?>
                                    <option value='<?= $major["id"] ?>'><?= $major["name_major"] ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option selected disabled>There is No Major Add Yet </option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="DoctorImage">Doctor Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="DoctorImage" name="DoctorImage" value="<?= $allDoctors['img_doctor'] ?>">
                                <label class="custom-file-label" for="DoctorImage">Choose Image</label>
                            </div>
                            <div class="col-1">
                                <img src="assets/img/doctors/<?= $allDoctors['img_doctor'] ?>"
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