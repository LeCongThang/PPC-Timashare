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
            <h1><b>THÔNG TIN TIMESHARE</b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="<?= BASE_URL_ADMIN ?>controllerthongtin/update" method="POST"
                      enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label>THÔNG TIN THỨ 1</label>
                        <div class="box box-primary">
                            <?php foreach ($this->errors as $error): ?>
                                <div class="alert alert-danger" role="alert"><?= $error ?></div>
                            <?php endforeach; ?>
                            <div class="box-header with-border text-center">
                                <?php if ($gioithieu_vi['image_1']): ?>
                                    <img id="blah1" src="<?= BASE_DIR . $gioithieu_vi['image_1'] ?>"
                                         style="width:70%;">
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-group" style="margin-left:10px;">
                                <div class="btn btn-default btn-file">
                                    <i class="glyphicon glyphicon-picture"></i> TẢI LÊN
                                    <input type="file" name="fileup1" id="imgInp1">
                                </div>
                                <!-- up file anh -->
                            </div>
                            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#vi1" id="vi1-tab" role="tab"
                                                                              data-toggle="tab"
                                                                              aria-controls="gioithieu_vi"
                                                                              aria-expanded="true">Tiếng
                                            Việt</a></li>
                                    <li role="presentation" class=""><a href="#en1" role="tab" id="en1-tab"
                                                                        data-toggle="tab"
                                                                        aria-controls="gioithieu_en"
                                                                        aria-expanded="false">Tiếng
                                            Anh</a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active in" role="tabpanel" id="vi1"
                                         aria-labelledby="vi1-tab">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input class="form-control"
                                                       value="<?php echo $gioithieu_vi['title_about_1']; ?>"
                                                       name="tieude_vi1"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                    <textarea name="noidung_vi1" class="ckeditor" id="noidung_en" cols="30" rows="10"
                                              title="">
                                        <?php echo $gioithieu_vi['content_about_1']; ?>
                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. box -->
                                    <div class="tab-pane fade" role="tabpanel" id="en1" aria-labelledby="en1-tab">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input class="form-control"
                                                       value="<?php echo $gioithieu_en['title_about_1']; ?>"
                                                       name="tieude_en1"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                    <textarea name="noidung_en1" class="ckeditor" id="noidung_en" cols="30" rows="10"
                                              title="">
                                        <?php echo $gioithieu_en['content_about_1']; ?>
                                    </textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <!-- /.box-footer -->
                        </div>
                        <!-- /. box -->
                    </div>
                    <div class="col-md-12">
                        <label>THÔNG TIN THỨ 2</label>
                        <div class="box box-primary">
                            <?php foreach ($this->errors as $error): ?>
                                <div class="alert alert-danger" role="alert"><?= $error ?></div>
                            <?php endforeach; ?>
                            <div class="box-header with-border text-center">
                                <?php if ($gioithieu_vi['image_2']): ?>
                                    <img id="blah2" src="<?= BASE_DIR . $gioithieu_vi['image_2'] ?>"
                                         style="width:70%;">
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="form-group" style="margin-left:10px;">
                                <div class="btn btn-default btn-file">
                                    <i class="glyphicon glyphicon-picture"></i> TẢI LÊN
                                    <input type="file" name="fileup2" id="imgInp2">
                                </div>
                                <!-- up file anh -->
                            </div>
                            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#vi2" id="vi2-tab" role="tab"
                                                                              data-toggle="tab"
                                                                              aria-controls="gioithieu_vi"
                                                                              aria-expanded="true">Tiếng
                                            Việt</a></li>
                                    <li role="presentation" class=""><a href="#en2" role="tab" id="en2-tab"
                                                                        data-toggle="tab"
                                                                        aria-controls="gioithieu_en"
                                                                        aria-expanded="false">Tiếng
                                            Anh</a></li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active in" role="tabpanel" id="vi2"
                                         aria-labelledby="vi2-tab">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input class="form-control"
                                                       value="<?php echo $gioithieu_vi['title_about_2']; ?>"
                                                       name="tieude_vi2"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                    <textarea name="noidung_vi2" class="ckeditor" id="noidung_en" cols="30" rows="10"
                                              title="">
                                        <?php echo $gioithieu_vi['content_about_2']; ?>
                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. box -->
                                    <div class="tab-pane fade" role="tabpanel" id="en2" aria-labelledby="en2-tab">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input class="form-control"
                                                       value="<?php echo $gioithieu_en['title_about_2']; ?>"
                                                       name="tieude_en2"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                    <textarea name="noidung_en2" class="ckeditor" id="noidung_en" cols="30" rows="10"
                                              title="">
                                        <?php echo $gioithieu_en['content_about_2']; ?>
                                    </textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /. box -->
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->
                            <button type="submit" name="submit" class="btn btn-info"><i
                                    class="glyphicon glyphicon-pencil"></i>&nbsp <b>Cập nhật</b>
                            </button>
                        </div>
                        <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
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
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp1").change(function () {
        readURL1(this);
    });

    $("#imgInp2").change(function () {
        readURL2(this);
    });
</script>

</body>
</html>
