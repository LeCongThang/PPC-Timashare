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
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR_ADMIN ?>css/select2.min.css" rel="stylesheet"/>
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
            <h1><b>
                    <?php echo $isUpdate ? 'Cập nhật ưu đãi' : 'Thêm Ưu đãi'; ?>
                </b>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border text-center">
                                    <?php if (isset($data_vi['image'])): ?>
                                        <img id="blah" src="<?= BASE_DIR . $data_vi['image'] ?>" style="width:70%;">
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
                                                           value="<?php echo $isUpdate ? $data_vi['title'] : "" ?>"
                                                           name="tieude_vi" required maxlength="50"
                                                           style="font-size:17px;font-family:verdana;text-align:justify;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="noidung">Nội dung</label>
                                                    <textarea placeholder="Mô tả" name="noidung_vi" class="ckeditor"
                                                              required
                                                              cols="30"
                                                              rows="10"
                                                              title=""><?php echo $isUpdate ? $data_vi['content'] : "" ?></textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" role="tabpanel" id="en"
                                                 aria-labelledby="en-tab">
                                                <div class="form-group">
                                                    <label for="noidung">Tiêu đề</label>
                                                    <input placeholder="Tiêu đề" class="form-control" required
                                                           maxlength="50"
                                                           value="<?php echo $isUpdate ? $data_en['title'] : "" ?>"
                                                           name="tieude_en"
                                                           style="font-size:17px;font-family:verdana;text-align:justify;">
                                                </div>

                                                <div class="form-group">
                                                    <label for="noidung">Nội dung</label>
                                                    <textarea placeholder="Mô tả" name="noidung_en" class="ckeditor"
                                                              required
                                                              cols="30"
                                                              rows="10"
                                                              title=""><?php echo $isUpdate ? $data_en['content'] : "" ?></textarea>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Chọn khu nghỉ dưỡng</label>
                                            <select class="js-example-basic-multiple js-states form-control"
                                                    style="color: black!important;" required
                                                    id="id_label_multiple" name="list_resort[]"
                                                    multiple="multiple">
                                                <?php
                                                if ($isUpdate) {
                                                    foreach ($data_detail as $key => $resort) {
                                                        echo '<option value="' . $resort['id_resort'] . '" selected="selected">' . $resort['name'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-1" style="padding-left: 0px"><h5><b>Từ ngày</b></h5>
                                            </div>
                                            <div class="col-md-5">
                                                <div class='input-group date' id='datetimepicker6'>
                                                    <input type='text' class="form-control" required
                                                           name="date_start" <?php if ($isUpdate) echo 'value="' . $data_detail[0]['start_date'] . '"'; ?>/>
                                                    <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="padding-left: 0px"><h5><b>Đến ngày</b></h5>
                                            </div>
                                            <div class="col-md-5" style="padding-right: 0px">
                                                <div class='input-group date' id='datetimepicker7'>
                                                    <input type='text' class="form-control" required
                                                           name="date_end" <?php if ($isUpdate) echo 'value="' . $data_detail[0]['end_date'] . '"'; ?>/>
                                                    <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span></span>
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
                                                class="glyphicon glyphicon-pencil"></i>&nbsp
                                            <b><?php echo $isUpdate ? "Cập nhật" : "Thêm" ?></b></button>
                                    </div>
                                    <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /. box -->
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="http://hbbsolution.com/">HBB Web Team</a>.</strong> All rights
    reserved.
</footer>


<!-- /.control-sidebar -->
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
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/select2.min.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/moment.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/collapse.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/transition.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/bootstrap-min.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/bootstrap-datetimepicker.js"></script>

<!-- Page Script -->
<script>
    $(function () {
        $('#datetimepicker6').datetimepicker({format: 'YYYY-MM-DD'});
        $('#datetimepicker7').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });

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

    $('#id_label_multiple').select2({
        tags: true,
        placeholder: "Chọn khu nghỉ dưỡng khuyến mãi",
        data: [
            <?php
            if (isset($list_resort)) {
                foreach ($list_resort as $key => $resort) {
                    echo " {
                id: '" . $resort['id'] . "',text: '" . $resort['name'] . "'},";
                }
            }
            ?>
        ]
    });

</script>


</body>
</html>
