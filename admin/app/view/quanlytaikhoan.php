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
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>css/stylehead.css">
</head>
<style>

    div.polaroid {
        width: 100%;
        /*height: 150px;*/
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 100px;
    }

    div.container {
        text-align: center;
        padding: 10px 20px;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- <header class="main-header"> -->

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <?php require 'partials/slider-bar.php' ?>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1><b>
                    QUẢN LÝ TÀI KHOẢN
                </b>
                <!-- <small>13 new messages</small> -->
            </h1>

        </section>

        <!-- Main content -->
        <section class="content" style="height:1000px;">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="polaroid">
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
                                        <input type="hidden" name="txt3" value="<?php echo $item_taikhoan['hoten']; ?>">
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
                </div>
            </div>

            <!-- /.col -->

        </section>
        <!-- /.content -->
    </div>
</div>
</div>


</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?= BASE_DIR ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= BASE_DIR ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?= BASE_DIR ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= BASE_DIR ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASE_DIR ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= BASE_DIR ?>dist/js/demo.js"></script>
<!-- iCheck -->
<script src="<?= BASE_DIR ?>plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= BASE_DIR ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
    });
</script>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
</body>
</html>
