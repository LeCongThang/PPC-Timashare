<?php
$isUpdate = isset($this->params[0]);
?>
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

    <!-- <header class="main-header"> -->
    <?php require 'view/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php require 'partials/slider-bar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1><b> <?php echo $isUpdate ? 'Cập nhật Slider' : 'Thêm Slider'; ?></b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <div class="box box-primary">
                        <div class="box-header with-border text-center">
                            <?php if (isset($data_vi['image_slider'])): ?>
                                <img id="blah" src="<?= BASE_DIR . $data_vi['image_slider'] ?>" style="width:70%;">
                            <?php else: ?>
                                <img id="blah" src="" style="width:70%;">
                            <?php endif; ?>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php foreach ($this->errors as $error): ?>
                                <div class="alert alert-danger" role="alert"><?= $error ?></div>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="glyphicon glyphicon-picture"></i> TẢI LÊN
                                    <input type="file" name="fileup" id="imgInp">
                                </div>
                                <!-- up file anh -->
                            </div>
                            <div class="form-group">
                                <label for="noidung">Đường dẫn</label>
                                <input placeholder="Đường dẫn" class="form-control"
                                       value="<?php echo $isUpdate ? $data_vi['duongdan_slider'] : "" ?>"
                                       name="duongdan"
                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                            </div>
                            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#vi" id="vi-tab" role="tab"
                                                                              data-toggle="tab"
                                                                              aria-controls="gioithieu_vi"
                                                                              aria-expanded="true">Tiếng
                                            Việt</a></li>
                                    <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                                        data-toggle="tab"
                                                                        aria-controls="gioithieu_en"
                                                                        aria-expanded="false">Tiếng
                                            Anh</a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                         aria-labelledby="vi-tab">
                                        <div class="form-group">
                                            <label for="noidung">Tiêu đề</label>
                                            <input placeholder="Tiêu đề" class="form-control"
                                                   value="<?php echo $isUpdate ? $data_vi['tieude_slider'] : "" ?>"
                                                   name="tieude_vi"
                                                   style="font-size:17px;font-family:verdana;text-align:justify;">
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Nội dung</label>
                                            <input placeholder="Nội dung" class="form-control"
                                                   value="<?php echo $isUpdate ? $data_vi['noidung_slider'] : "" ?>"
                                                   name="noidung_vi"
                                                   style="font-size:17px;font-family:verdana;text-align:justify;">
                                        </div>

                                        <div class="form-group">
                                            <label for="noidung">Mô tả</label>
                                            <textarea placeholder="Mô tả" name="mota_vi" class="ckeditor" cols="30"
                                                      rows="10"
                                                      title=""><?php echo $isUpdate ? $data_vi['mota_slider'] : "" ?></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="en"
                                         aria-labelledby="en-tab">
                                        <div class="form-group">
                                            <label for="noidung">Tiêu đề</label>
                                            <input placeholder="Tiêu đề" class="form-control"
                                                   value="<?php echo $isUpdate ? $data_en['tieude_slider'] : "" ?>"
                                                   name="tieude_en"
                                                   style="font-size:17px;font-family:verdana;text-align:justify;">
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Nội dung</label>
                                            <input placeholder="Nội dung" class="form-control"
                                                   value="<?php echo $isUpdate ? $data_en['noidung_slider'] : "" ?>"
                                                   name="noidung_en"
                                                   style="font-size:17px;font-family:verdana;text-align:justify;">
                                        </div>

                                        <div class="form-group">
                                            <label for="noidung">Mô tả</label>
                                            <textarea placeholder="Mô tả" name="mota_en" class="ckeditor" cols="30"
                                                      rows="10"
                                                      title=""><?php echo $isUpdate ? $data_en['mota_slider'] : "" ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="submit" name="submit" class="btn btn-info"><i
                                            class="glyphicon glyphicon-pencil"></i>&nbsp<b><?php echo $isUpdate ? "Cập nhật" : "Thêm" ?></b>
                                    </button>
                                </div>
                                <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /. box -->
                    </div>
                </form>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);

    });
</script>

</body>
</html>
