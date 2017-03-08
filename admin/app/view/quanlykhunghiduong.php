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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1><b> QUẢN LÝ TÀI KHOẢN </b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <?php foreach ($this->errors as $error): ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php endforeach; ?>
                        <div class="box-header with-border text-center">
                            <div class="pull-left">
                                <a href="<?= BASE_URL_ADMIN ?>controllernghiduong/create"
                                   class="btn btn-success"><i
                                        class="glyphicon glyphicon-th-large"></i>&nbsp <b>Thêm Khu Nghỉ Dưỡng</b></a>
                                <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->

                            </div>
                        </div>
                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li role="presentation" class="active"><a href="#vi" id="vi-tab" role="tab"
                                                                          data-toggle="tab"
                                                                          aria-controls="gioithieu_vi"
                                                                          aria-expanded="true">Khu Nghỉ Dưỡng</a></li>
                                <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                                    data-toggle="tab"
                                                                    aria-controls="gioithieu_en"
                                                                    aria-expanded="false">Home Share</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td>Tên</td>
                                                <td>Địa chỉ</td>
                                                <td>Trạng thái</td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <div class="row text-center">
                                                <?php
                                                foreach ($listResortVi as $key => $item_resort) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $item_resort['name']; ?></td>
                                                        <td><?php echo $item_resort['address']; ?></td>
                                                        <td><?php echo  ($item_resort['status'] == 0)? 'Còn hiệu lực': "Hết hiệu lực"; ?></td>

                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN ?>controllernghiduong/update/<?= $item_resort['id'] ?>"
                                                               class="btn btn-primary">Sửa</a>

                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </div>
                                            </tbody>
                                        </table>
                                    </div>
                                    `
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="en"
                                     aria-labelledby="en-tab">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td>Tên</td>
                                                <td>Địa chỉ</td>
                                                <td>Trạng thái</td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <div class="row text-center">
                                                <?php
                                                foreach ($listHomeVi as $key => $item_home) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $item_home['name']; ?></td>
                                                        <td><?php echo $item_home['address']; ?></td>
                                                        <td><?php echo  ($item_home['status'] == 0)? 'Còn hiệu lực': "Hết hiệu lực"; ?></td>
                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN ?>controllernghiduong/update/<?= $item_home['id'] ?>"
                                                               class="btn btn-primary">Sửa</a>

                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="http://hbbsolution.com/">HBB Web Team</a>.</strong> All rights reserved.
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

</body>

</html>
