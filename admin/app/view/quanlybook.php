<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin || PPC TIMESHARE</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= BASE_DIR_ADMIN ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= BASE_DIR_ADMIN ?>css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= BASE_DIR_ADMIN ?>css/skins/skin-blue.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR_ADMIN ?>css/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_DIR_ADMIN ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php require 'view/header.php' ?>

    <!-- Left side column. contains the logo and sidebar -->
    <?php require 'partials/slider-bar.php' ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><b>QUẢN LÝ ĐƠN ĐẶT CHỖ</b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <?php foreach ($this->errors as $error): ?>
                            <div class="alert alert-primary" role="alert"><?= $error ?></div>
                        <?php endforeach; ?>
                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#vi" id="vi-tab" role="tab" data-toggle="tab" aria-controls="gioithieu_vi"
                                       aria-expanded="true">Đơn đặt chỗ chưa duyệt</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#en" role="tab" id="en-tab" data-toggle="tab" aria-controls="gioithieu_en"
                                       aria-expanded="false">Đơn đặt chỗ đã duyệt</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <div class="box-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Id Book</th>
                                                <th>Tên tài khoản khách</th>
                                                <th>Tên khu nghỉ dưỡng</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($listBooking as $key => $itemBooking) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $itemBooking['id_book']; ?></td>
                                                    <td><?php echo $itemBooking['hoten']; ?></td>
                                                    <td><?php echo $itemBooking['name']; ?></td>
                                                    <td><?php echo ($itemBooking['status'] == 0) ? 'Chưa duyệt' : 'Đã duyệt' ?></td>
                                                    <td><a href="<?=BASE_URL_ADMIN?>controllerbook/update/<?=$itemBooking['id_book']?>" class="btn btn-primary">Xem chi tiết</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.box-body -->
                                <div class="tab-pane fade" role="tabpanel" id="en" aria-labelledby="en-tab">
                                    <div class="box-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Id Book</th>
                                                <th>Tên tài khoản khách</th>
                                                <th>Tên khu nghỉ dưỡng</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($listBookingUpdated as $key => $itemBooking) { ?>
                                                <tr>
                                                    <td><?php echo $itemBooking['id_book']; ?></td>
                                                    <td><?php echo $itemBooking['hoten']; ?></td>
                                                    <td><?php echo $itemBooking['name']; ?></td>
                                                    <td><?php echo ($itemBooking['status'] == 1) ? 'Thành công' : 'Hủy bỏ' ?></td>
                                                    <td><a href="<?=BASE_URL_ADMIN?>controllerbook/get/<?=$itemBooking['id_book']?>" class="btn btn-primary">Xem chi tiết</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /. box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="http://hbbsolution.com/">HBB Web Team</a>.</strong> All rights
    reserved.
</footer>


<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?= BASE_DIR ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= BASE_DIR ?>js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?= BASE_DIR ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= BASE_DIR ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASE_DIR ?>js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= BASE_DIR ?>js/demo.js"></script>
<!-- iCheck -->
<script src="<?= BASE_DIR ?>plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="<?= BASE_DIR ?>ckeditor/ckeditor.js"></script>
<!-- Page Script -->


</body>
</html>
