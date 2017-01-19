<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Widgets</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= BASE_DIR ?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_DIR ?>css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_DIR ?>css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= BASE_DIR ?>css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>css/responsive.css">
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->


    <!-- Latest compiled and minified JavaScript -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

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
                                <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/create"
                                   class="btn btn-success"><i
                                        class="glyphicon glyphicon-th-large"></i>&nbsp <b>Thêm tài khoản</b></a>
                                <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->

                            </div>
                        </div>
                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li role="presentation" class="active"><a href="#vi" id="vi-tab" role="tab"
                                                                          data-toggle="tab"
                                                                          aria-controls="gioithieu_vi"
                                                                          aria-expanded="true">Tài Khoản</a></li>
                                <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                                    data-toggle="tab"
                                                                    aria-controls="gioithieu_en"
                                                                    aria-expanded="false">Tài khoản đang chờ xét
                                        duyệt</a></li>

                                <li role="presentation" class=""><a href="#tkdaduyet" role="tab" id="en-tab"
                                                                    data-toggle="tab"
                                                                    aria-controls="gioithieu_en"
                                                                    aria-expanded="false">Tài khoản đã
                                        duyệt</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td>Tên đăng nhập</td>
                                                <td>Họ tên</td>
                                                <td>Địa chỉ</td>
                                                <td>Điện thoại</td>

                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <div class="row text-center">
                                                <?php
                                                foreach ($ds_tai_khoan as $key => $item_taikhoan) {
                                                    ?>
                                                    <tr>
                                                        <form
                                                            action="<?= BASE_URL_ADMIN ?>controllertaikhoan/layThongTinUser/<?php echo $item_taikhoan['tendangnhap']; ?>"
                                                            method="POST">
                                                            <input type="hidden" id="txt1" name="txt1"
                                                                   value="<?php echo $item_taikhoan['tendangnhap']; ?>">
                                                            <input type="hidden" name="txt3"
                                                                   value="<?php echo $item_taikhoan['hoten']; ?>">
                                                            <input type="hidden" name="txt4"
                                                                   value="<?php echo $item_taikhoan['diachi']; ?>">
                                                            <input type="hidden" name="txt5"
                                                                   value="<?php echo $item_taikhoan['dienthoai']; ?>">
                                                            <td><?php echo $item_taikhoan['tendangnhap']; ?></td>
                                                            <td><?php echo $item_taikhoan['hoten']; ?></td>
                                                            <td><?php echo $item_taikhoan['diachi']; ?></td>
                                                            <td><?php echo $item_taikhoan['dienthoai']; ?></td>

                                                            <td>
                                                                <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/update/<?= $item_taikhoan['tendangnhap'] ?>"
                                                                   class="btn btn-primary">Sửa</a>

                                                            </td>
                                                            <td>
                                                                <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/delete/<?= $item_taikhoan['tendangnhap'] ?>"
                                                                   class="btn btn-danger">Xóa</a>
                                                            </td>
                                                        </form>
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
                                            <tr>
                                                <td>Điện thoại</td>
                                                <td>Email</td>
                                                <td>Tình trạng</td>
                                                <td style="width:10%;"></td>
                                                <td></td>
                                            </tr>
                                            <tbody>
                                            <div class="row text-center">
                                                <?php
                                                foreach ($ds_tai_khoan_dk as $key => $item_taikhoan) {
                                                    ?>
                                                    <tr>
                                                        <form
                                                            action="<?= BASE_URL_ADMIN ?>controllertaikhoan/layThongTinUser/<?php echo $item_taikhoan['tendangnhap']; ?>"
                                                            method="POST">
                                                            <input type="hidden" id="txt1" name="txt1"
                                                                   value="<?php echo $item_taikhoan['tendangnhap']; ?>">
                                                            <input type="hidden" name="txt3"
                                                                   value="<?php echo $item_taikhoan['hoten']; ?>">
                                                            <input type="hidden" name="txt4"
                                                                   value="<?php echo $item_taikhoan['diachi']; ?>">
                                                            <input type="hidden" name="txt5"
                                                                   value="<?php echo $item_taikhoan['dienthoai']; ?>">
                                                            <td><?php echo $item_taikhoan['sdt_taikhoandk']; ?></td>
                                                            <td><?php echo $item_taikhoan['email_taikhoandk']; ?></td>
                                                            <td><?php if ($item_taikhoan['trangthai_taikhoandk'] == 1) echo "Chưa duyệt"; else echo "Đã duyệt"; ?></td>
                                                            <td>
                                                                <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/create/<?= $item_taikhoan['email_taikhoandk'] ?>/<?= $item_taikhoan['sdt_taikhoandk'] ?>"
                                                                   class="btn btn-primary">Tạo tài khoản</a>
                                                            </td>
                                                        </form>
                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/delete/<?php echo $item_taikhoan['tendangnhap']; ?>"
                                                            <button type="button" class="btn btn-danger"> TỪ CHỐI
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="tkdaduyet"
                                     aria-labelledby="tkdaduyet-tab">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table">
                                            <tr>
                                                <td>Điện thoại</td>
                                                <td>Email</td>
                                                <td>Người duyệt</td>
                                                <td>Ghi chú</td>
                                                <td style="width:10%;"></td>
                                                <td></td>
                                            </tr>
                                            <tbody>
                                            <div class="row text-center">
                                                <?php
                                                foreach ($ds_tai_khoan_dk_da_duyet as $key => $item_taikhoan) {
                                                    ?>
                                                    <tr>
                                                        <form
                                                            action="<?= BASE_URL_ADMIN ?>controllertaikhoan/layThongTinUser/<?php echo $item_taikhoan['tendangnhap']; ?>"
                                                            method="POST">
                                                            <input type="hidden" id="txt1" name="txt1"
                                                                   value="<?php echo $item_taikhoan['tendangnhap']; ?>">
                                                            <input type="hidden" name="txt3"
                                                                   value="<?php echo $item_taikhoan['hoten']; ?>">
                                                            <input type="hidden" name="txt4"
                                                                   value="<?php echo $item_taikhoan['diachi']; ?>">
                                                            <input type="hidden" name="txt5"
                                                                   value="<?php echo $item_taikhoan['dienthoai']; ?>">
                                                            <td><?php echo $item_taikhoan['sdt_taikhoandk']; ?></td>
                                                            <td><?php echo $item_taikhoan['email_taikhoandk']; ?></td>
                                                            <td><?php echo $item_taikhoan['nguoiduyet_taikhoandk']; ?></td>
                                                            <td><?php echo $item_taikhoan['ghichu'] ?></td>
                                                        </form>
                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/deleteAccount/<?php echo $item_taikhoan['email_taikhoandk']; ?>"
                                                            <button type="button" class="btn btn-danger"> XÓA</button>
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
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
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

</body>

</html>
