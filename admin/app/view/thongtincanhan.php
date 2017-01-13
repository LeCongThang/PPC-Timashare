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

    <!-- <header class="main-header"> -->

    <!-- Left side column. contains the logo and sidebar -->
    <?php require 'partials/slider-bar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1><b> THÔNG TIN CÁ NHÂN </b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <?php foreach ($this->errors as $error): ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php endforeach; ?>
                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li role="presentation" class="active"><a href="#vi" id="vi-tab" role="tab"
                                                                          data-toggle="tab"
                                                                          aria-controls="gioithieu_vi"
                                                                          aria-expanded="true">Thông tin cá nhân</a>
                                </li>
                                <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                                    data-toggle="tab"
                                                                    aria-controls="gioithieu_en"
                                                                    aria-expanded="false">Đổi mật khẩu</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="<?= BASE_URL_ADMIN ?>controlleradmin/thayDoiThongTin"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="noidung">Họ tên</label>
                                                <input class="form-control"
                                                       value="<?php echo $tai_khoan['hoten']; ?>"
                                                       name="ho_ten_admin"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Địa chỉ</label>
                                                <input class="form-control"
                                                       value="<?php echo $tai_khoan['diachi']; ?>"
                                                       name="dia_chi_admin"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Điện thoại</label>
                                                <input class="form-control"
                                                       value="<?php echo $tai_khoan['dienthoai']; ?>"
                                                       name="dien_thoai_admin"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-info"><i
                                                    class="glyphicon glyphicon-pencil"></i>&nbsp <b>Cập nhật</b>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /. box -->
                                <div class="tab-pane fade" role="tabpanel" id="en" aria-labelledby="en-tab">
                                    <div class="box-body">
                                        <form action="<?= BASE_URL_ADMIN ?>controlleradmin/doiMatKhau"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="noidung">Mật khẩu cũ</label>
                                                <input class="form-control"
                                                       value=""
                                                       name="mat_khau_cu"
                                                       id="mat_khau_cu"
                                                       type="password"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Mật khẩu mới</label>
                                                <input class="form-control"
                                                       value=""
                                                       name="mat_khau_moi"
                                                       id="mat_khau_moi"
                                                       type="password"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Nhập lại mật khẩu mới</label>
                                                <input class="form-control"
                                                       value=""
                                                       id="nhap_lai_mat_khau_moi"
                                                       type="password"
                                                       name="nhap_lai_mat_khau_moi"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <p><span style="color: red;" id="thongbaodoimatkhau"></span></p>
                                            <button id="btn_doi_mat_khau" type="submit" name="submit" class="btn btn-info"><i
                                                    class="glyphicon glyphicon-pencil"></i>&nbsp <b>Cập nhật</b>
                                            </button>
                                    </div>
                                    </form>
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


<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
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
<script>
    $(document).ready(function () {
        $('#btn_doi_mat_khau').click(function () {
            matkhaucu = $('#mat_khau_cu').val();
            matkhaumoi = $('#mat_khau_moi').val();
            nhaplaimatkhaumoi = $('#nhap_lai_mat_khau_moi').val();
            loi = 0;
            if (matkhaucu == "" || matkhaumoi == "") {
                loi++;
                $('#thongbaodoimatkhau').text("Hãy nhập đầy đủ thông tin");
            }
            else {
                if (matkhaumoi != nhaplaimatkhaumoi) {
                    loi++;
                    $('#thongbaodoimatkhau').text("Mật khẩu nhập lại không trùng khớp");
                }
            }
            if (loi != 0) {
                return false;
            }
            return true;
        });
    });
</script>

</body>
</html>
