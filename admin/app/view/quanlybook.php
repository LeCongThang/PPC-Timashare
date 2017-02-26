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
    <link rel="stylesheet" href="<?= BASE_DIR ?>/css/AdminLTE.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/stylehead.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="height: 1000px;">
    <?php require 'partials/slider-bar.php' ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                QUẢN LÝ ĐẶT CHỖ
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Quản lý đặt chỗ</a></li>
                <li class="active">Đơn đặt chỗ</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Đơn đặt chô</h3>
                        </div>
                        <?php foreach ($this->errors as $error): ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php endforeach; ?>
                        <!-- /.box-header -->
                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li role="presentation" class="active"><a href="#vi" id="vi-tab" role="tab"
                                                                          data-toggle="tab"
                                                                          aria-controls="gioithieu_vi"
                                                                          aria-expanded="true">Đơn đặt chưa duyệt</a>
                                </li>
                                <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                                    data-toggle="tab"
                                                                    aria-controls="gioithieu_en"
                                                                    aria-expanded="false">Đơn đặt đã duyệt</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <div class="box-body no-padding">
                                        <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Tên tài khoản đặt</th>
                                                    <th>Tên khu nghỉ dưỡng</th>
                                                    <th>Ngày đi</th>
                                                    <th>Ngày đến</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($ds_mail as $key => $item_mail) {
                                                    ?>
                                                    <tr>
                                                        <!--                                                <td><input type="checkbox" nam></td>-->
                                                        <td class="mailbox-name"><a
                                                                href="<?= BASE_URL_ADMIN ?>controller/<?php echo $item_mail['id']; ?> "><?php echo $item_mail['ten_lienhe']; ?></a>
                                                        </td>
                                                        <td class="mailbox-subject">
                                                            <b><?php echo $item_mail['email_lienhe']; ?></b>
                                                        </td>
                                                        <td class="mailbox-attachment"><?php echo $item_mail['sdt_lienhe']; ?></td>
                                                        <td class="mailbox-date"><a
                                                                href="<?= BASE_URL_ADMIN ?>controllermail/delete/<?php echo $item_mail['id']; ?> ">
                                                                <button class="btn btn-info"><i
                                                                        class="glyphicon glyphicon-trash"></i></button>
                                                            </a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                            <!-- /.table -->
                                        </div>
                                        <!-- /.mail-box-messages -->
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="tab-pane" role="tabpanel" id="en"
                                     aria-labelledby="en-tab">
                                    <div class="box-body no-padding">
                                        <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Tên công ty</th>
                                                    <th>Địa chỉ email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Người duyệt</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($ds_mail_da_duyet as $key => $item_mail) {
                                                    ?>
                                                    <tr>
                                                        <!--                                                <td><input type="checkbox" nam></td>-->
                                                        <td class="mailbox-name"><a
                                                                href="<?= BASE_URL_ADMIN ?>controllermail/xemMailDaKiemTra/<?php echo $item_mail['id']; ?> "><?php echo $item_mail['ten_lienhe']; ?></a>
                                                        </td>
                                                        <td class="mailbox-subject">
                                                            <b><?php echo $item_mail['email_lienhe']; ?></b>
                                                        </td>
                                                        <td class="mailbox-attachment"><?php echo $item_mail['sdt_lienhe']; ?></td>
                                                        <td class="mailbox-subject">
                                                            <b><?php echo $item_mail['nguoi_duyet']; ?></b>
                                                        </td>
                                                        <td class="mailbox-date"><a
                                                                href="<?= BASE_URL_ADMIN ?>controllermail/delete/<?php echo $item_mail['id']; ?> ">
                                                                <button class="btn btn-info"><i
                                                                        class="glyphicon glyphicon-trash"></i></button>
                                                            </a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                            <!-- /.table -->
                                        </div>
                                        <!-- /.mail-box-messages -->
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /. box -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.6
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?= BASE_DIR ?>plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Slimscroll -->
<script src="<?= BASE_DIR ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= BASE_DIR ?>plugins/fastclick/fastclick.js"></script>

<!-- iCheck -->
<script src="<?= BASE_DIR ?>plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= BASE_DIR ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->

<script type="text/javascript" src="<?= BASE_DIR ?>ckeditor/ckeditor.js"></script>
</body>
</html>
