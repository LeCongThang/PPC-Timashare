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
<div class="wrapper" style="height: 900px">
    <?php require 'view/header.php' ?>

    <!-- Left side column. contains the logo and sidebar -->
    <?php require 'partials/slider-bar.php' ?>

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
                                <li role="presentation" class="active">
                                    <a href="#vi" id="vi-tab" role="tab" data-toggle="tab" aria-controls="gioithieu_vi"
                                       aria-expanded="true">Thông tin cá nhân</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#en" role="tab" id="en-tab" data-toggle="tab" aria-controls="gioithieu_en"
                                       aria-expanded="false">Đổi mật khẩu</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <div class="box-body">
                                        <form action="<?= BASE_URL_ADMIN ?>controlleradmin/thayDoiThongTin"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Hình đại diện</label>
                                                <div class="thumbnail input-group col-sm-12" style="text-align: center">
                                                    <img id="img"
                                                         src="<?php echo ($tai_khoan['avatar'] == NULL) ? (BASE_DIR . 'img/default_avatar.png') : BASE_DIR.$tai_khoan['avatar'] ?>"
                                                         style="width: 140px;height: 170px;">
                                                </div>
                                                <div class="input-group" style="text-align: center">
                                                    <input class="form-control" type="file" name="imgProFile"
                                                           id="imgProFile">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <div class="input-group" style="text-align: center">
                                                    <label
                                                        class="radio-inline"><input <?php echo ($tai_khoan['sex'] == 0) ? 'checked="checked"' : '' ?>
                                                            type="radio" value="0"
                                                            name="radGender">Nam</label>
                                                    <label
                                                        class="radio-inline"><input <?php echo ($tai_khoan['sex'] == 1) ? 'checked="checked"' : '' ?>
                                                            type="radio" value="1"
                                                            name="radGender">Nữ</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Tên đăng nhập</label>
                                                <input class="form-control"
                                                       value="<?php echo $tai_khoan['tendangnhap']; ?>"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;"
                                                       disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Họ tên</label>
                                                <input class="form-control"
                                                       value="<?php echo $tai_khoan['hoten']; ?>"
                                                       name="txtFullName"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Địa chỉ</label>
                                                <input class="form-control"
                                                       value="<?php echo $tai_khoan['diachi']; ?>"
                                                       name="txtAddress"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Điện thoại</label>
                                                <input class="form-control"
                                                       value="<?php echo $tai_khoan['dienthoai']; ?>"
                                                       name="txtPhoneNumber"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="box-footer">
                                                <div class="pull-right">
                                                    <button type="submit" name="submit" class="btn btn-info"><i
                                                            class="glyphicon glyphicon-pencil"></i>&nbsp <b>Cập nhật</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.box- -->
                                    </div>
                                    <!-- /.tab vi- -->
                                </div>
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
                                            <div class="box-footer">
                                                <div class="pull-right">
                                                    <button id="btn_doi_mat_khau" type="submit" name="submit"
                                                            class="btn btn-info"><i
                                                            class="glyphicon glyphicon-pencil"></i>&nbsp <b>Cập nhật</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on('change', "#imgProFile", function () {
            readURL(this);
        });
    });
</script>

</body>
</html>
