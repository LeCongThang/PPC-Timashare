<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin || PPC TIMESHARE</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= BASE_DIR ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= BASE_DIR ?>css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= BASE_DIR ?>css/skins/skin-blue.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/responsive.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>css/stylehead.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- <header class="main-header"> -->

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
                        <div class="box-header with-border text-center">
                            <div class="pull-left">
                                <a href="<?= BASE_URL_ADMIN ?>controllercauhoi/create"
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
                                                                    aria-expanded="false">Tài khoản đang chờ xét duyệt</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table">
                                            <tr>
                                                <td>HỌ TÊN</td>
                                                <td>ĐỊA CHỈ</td>
                                                <td>ĐIỆN THOẠI</td>
                                                <td>EMAIL</td>
                                                <td style="width:10%;"></td>
                                                <td></td>
                                            </tr>
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
                                                            <td><?php echo $item_taikhoan['hoten']; ?></td>
                                                            <td><?php echo $item_taikhoan['diachi']; ?></td>
                                                            <td><?php echo $item_taikhoan['dienthoai']; ?></td>
                                                            <td><?php echo $item_taikhoan['email']; ?></td>
                                                            <td>
                                                                <button class="btn btn-info"> UPDATE</button>
                                                            </td>
                                                        </form>
                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/delete/<?php echo $item_taikhoan['tendangnhap']; ?>"
                                                            <button type="button" class="btn btn-info"> DELETE</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                        </table>
                                    </div>`
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="en"
                                     aria-labelledby="en-tab">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table">
                                            <tr>
                                                <td>ĐIỆN THOẠI</td>
                                                <td>EMAIL</td>
                                                <td>TÌNH TRẠNG</td>
                                                <td style="width:10%;"></td>
                                                <td></td>
                                            </tr>
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
                                                            <td><?php if ($item_taikhoan['trangthai_taikhoandk']==1) echo "Chưa duyệt"; else echo "Đã duyệt";?></td>
                                                            <td>
                                                                <button class="btn btn-info">TẠO TÀI KHOẢN</button>
                                                            </td>
                                                        </form>
                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/delete/<?php echo $item_taikhoan['tendangnhap']; ?>"
                                                            <button type="button" class="btn btn-info"> XÓA</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
                        </div>
                        <!-- /.box-footer -->
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
