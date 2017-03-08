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
            <h1><b></b>Thông tin chi tiết đơn đặt chỗ</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <h2>Thông tin khách hàng</h2>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <h4>Tên đăng nhập: <?= $data['tendangnhap'] ?></h4>
                                    <h4>Họ
                                        tên: <? echo ($data['sex'] == 0) ? "Anh" : "Chị" ?> <?= $data['hoten'] ?></h4>
                                    <h4>Địa chỉ: <?= $data['diachi'] ?> </h4>
                                    <h4>Số điện thoại: <?= $data['dienthoai'] ?></h4>
                                </div>
                                <div class="col-md-12">
                                    <h2>Thông tin khu nghỉ dưỡng</h2>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <h4>Mã số: <?= $data['id'] ?></h4>
                                    <h4>Tên : <?= $data['name'] ?></h4>
                                    <h4>Giá: <?= $data['resort_price'] ?> USD - <?= $data['resort_price']*$data['e'] ?> VND</h4>
                                    <h4>Địa chỉ: <?= $data['address'] ?> </h4>
                                    <h4>
                                        Loại: <?php echo ($data['id_resort_type'] == 0) ? "Khu nghỉ dưỡng" : "Trao đổi nhà" ?></h4>
                                </div>
                                <div class="col-md-12">
                                    <h2>Thông tin đặt chỗ</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-6">
                                        <h4>Mã số: <?= $data['id_book'] ?></h4>
                                        <div class="form-group">
                                            <div class="col-md-1" style="padding-left: 0px"><h4>Từ ngày</h4></div>
                                            <div class="col-md-5">
                                                <div class='input-group date' id='datetimepicker6'>
                                                    <input readonly readonlytype='text' class="form-control"
                                                           name="date_start"
                                                           value=" <?php echo $data['start_date'] ?>"/>
                                                    <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="padding-left: 0px"><h4>Đến ngày</h4></div>
                                            <div class="col-md-5" style="padding-right: 0px">
                                                <div class='input-group date' id='datetimepicker7'>
                                                    <input readonly readonlytype='text' class="form-control"
                                                           name="date_end" value="<?php echo $data['end_date'] ?>"/>
                                                    <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="col-md-2" style="padding-left: 0px"><h4>Số người lớn</h4></div>
                                            <div class="col-md-4" style="padding-right: 0px">
                                                <div class='input-group date' id='datetimepicker7'>
                                                    <input readonly readonlytype="number" class="form-control" min="1"
                                                           max="100" step="1"
                                                           value="<?= $data['adults'] ?>" name="adults"
                                                           id="adults">
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="padding-left: 0px"><h4>Số trẻ em </h4></div>
                                            <div class="col-md-4" style="padding-right: 0px">
                                                <div class='input-group date' id='datetimepicker7'>
                                                    <input readonly readonlytype="number" class="form-control" min="0"
                                                           max="100" step="1"
                                                           value="<?= $data['childs'] ?>" name="childs"
                                                           id="childs">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="col-md-2" style="padding-left: 0px"><h4>Số phòng</h4></div>
                                            <div class="col-md-4" style="padding-right: 0px">
                                                <div class='input-group date' id='datetimepicker7'>
                                                    <input readonly readonlytype="number" class="form-control" min="1"
                                                           max="100"
                                                           step="1"
                                                           value="<?= $data['room'] ?>" name="room"
                                                           id="room">
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="padding-left: 0px"><h4>Tổng giá</h4></div>
                                            <div class="col-md-2" style="padding-right: 0px">
                                                <input readonly readonlytype="number" class="form-control" min="1"
                                                       max="100" step="1"
                                                       value="<?= $data['total_price'] ?>" name="total_price"
                                                       id="room">
                                            </div>
                                            <div class="col-md-2" style="text-align: center;">USD - <?= $data['total_price']*$data['e'] ?> VND</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="comment"><h4>Ghi chú</h4></label>
                                            <textarea class="form-control" rows="5" id="note" readonly
                                                      name="note"><?= $data['note'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <h4>Voucher : <?= $data['n'] ?> - <?= $data['cost'] ?> USD</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <h4>Tình
                                                trạng: <?php echo $data['status'] == 1 ? "Thành công" : "Hủy bỏ" ?></h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. box -->
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
    <strong>Copyright &copy; 2016 <a href="http://hbbsolution.com/">HBB Web Team</a>.</strong> All rights
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/moment.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/collapse.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/transition.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/bootstrap-min.js"></script>
<script type="text/javascript" src="<?= BASE_DIR_ADMIN ?>js/bootstrap-datetimepicker.js"></script>


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
</script>
</body>
</html>
