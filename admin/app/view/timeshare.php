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

    <!-- Left side column. contains the logo and sidebar -->
    <?php require 'partials/slider-bar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1><b>THÔNG TIN KHÁCH SỠ HỮU TIMESHARE</b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="<?= BASE_URL_ADMIN ?>controllertimeshare/capnhatgioithieu" method="POST"
                      enctype="multipart/form-data">
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
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input class="form-control"
                                                       value="<?php echo $gioithieu_vi['title']; ?>"
                                                       name="tieude_vi"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                    <textarea name="noidung_vi" class="ckeditor" id="noidung_en" cols="30" rows="10"
                                              title="">
                                        <?php echo $gioithieu_vi['content']; ?>
                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. box -->
                                    <div class="tab-pane fade" role="tabpanel" id="en" aria-labelledby="en-tab">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input class="form-control"
                                                       value="<?php echo $gioithieu_en['title']; ?>"
                                                       name="tieude_en"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                    <textarea name="noidung_en" class="ckeditor" id="noidung_en" cols="30" rows="10"
                                              title="">
                                        <?php echo $gioithieu_en['content']; ?>
                                    </textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="pull-right">
                                    <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->
                                    <button type="submit" name="submit" class="btn btn-info"><i
                                            class="glyphicon glyphicon-pencil"></i>&nbsp <b>Cập nhật</b>
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
