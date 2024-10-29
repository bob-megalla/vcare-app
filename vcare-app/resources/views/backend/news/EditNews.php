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
                            <li class="breadcrumb-item"><a href="<?= '?admin=allDoctors' ?>">All News</a></li>
                            <ages class="breadcrumb-item active">Edit News</ages>
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
            <form role="form" method="POST" action="?admin=StoreEditNews" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="img_link">Image Link</label>
                        <input type="text" class="form-control" id="img_link" placeholder="Enter Doctor Name"
                            name="img_link" value="<?= $allNews["img_link"] ?>">
                            <input type="text" style="display:none" class="form-control" id="id" placeholder="Enter Doctor Name"
                            name="id" value="<?= $allNews["id"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="title_news">Title News</label>
                        <input type="text" class="form-control" id="title_news" placeholder="Enter Doctor Name"
                            name="title_news" value="<?= $allNews["title_news"] ?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_news">Contact News</label>
                        <input type="text" class="form-control" id="contact_news" placeholder="Enter Doctor Name"
                            name="contact_news" value="<?= $allNews["contact_news"] ?>">
                    </div>

                    <div class="form-group">
                        <label for="contact_news">Contact News</label>
                        <input type="text" class="form-control" id="contact_news" placeholder="Enter Doctor Name"
                            name="contact_news" value="<?= $allNews["contact_news"] ?>">
                    </div>
                    <div class="form-group">
                        <label>Select Publish</label>
                        <select class="form-control" name="published">
                            <?php if ($allNews['published'] == 0): ?>
                                <option value="0" selected >no</option>
                                <option value="1" >yes</option>
                            <?php else: ?>
                                <option value="1" selected >Yes</option>
                                <option value="0" >no</option>
                            <?php endif; ?>
                        </select>
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