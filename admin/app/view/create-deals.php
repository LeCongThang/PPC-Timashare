<?php
$isUpdate = isset($this->params[0]);
?>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>


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
            <h1><b>
                    <?php echo $isUpdate ? 'Cập nhật ưu đãi' : 'Thêm Ưu đãi'; ?>
                </b>
                <!-- <small>13 new messages</small> -->
            </h1>
            <ol class="breadcrumb">
                <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
                <!-- <li class="active">Mailbox</li> -->
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                </div>
                <!-- /.col -->

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
                                                       name="tieude_vi"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>
                                            <div class="form-group">
                                                <label for="noidung">Nội dung</label>
                                                <textarea placeholder="Mô tả" name="noidung_vi" class="ckeditor"
                                                          cols="30"
                                                          rows="10"
                                                          title=""><?php echo $isUpdate ? $data_vi['content'] : "" ?></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" role="tabpanel" id="en"
                                             aria-labelledby="en-tab">
                                            <div class="form-group">
                                                <label for="noidung">Tiêu đề</label>
                                                <input placeholder="Tiêu đề" class="form-control"
                                                       value="<?php echo $isUpdate ? $data_en['title'] : "" ?>"
                                                       name="tieude_en"
                                                       style="font-size:17px;font-family:verdana;text-align:justify;">
                                            </div>

                                            <div class="form-group">
                                                <label for="noidung">Nội dung</label>
                                                <textarea placeholder="Mô tả" name="noidung_en" class="ckeditor"
                                                          cols="30"
                                                          rows="10"
                                                          title=""><?php echo $isUpdate ? $data_en['content'] : "" ?></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="noidung">Chọn khu nghỉ dưỡng</label>
                                        <select class="js-example-basic-multiple js-states form-control"
                                                style="color: black!important;"
                                                id="id_label_multiple" name="list_resort[]"
                                                multiple="multiple">
                                            <?php
                                            if ($isUpdate) {
                                                foreach ($data_detail as $key => $resort) {
                                                    echo '<option value="'.$resort['id_resort'].'" selected="selected">'.$resort['name'].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1" style="padding-left: 0px"><h5><b>Từ ngày</b></h5></div>
                                        <div class="col-md-5">
                                            <div class='input-group date' id='datetimepicker6'>
                                                <input type='text' class="form-control"
                                                       name="date_start" <?php if ($isUpdate) echo 'value="' . $data_detail[0]['date_start'] . '"'; ?>/>
                                                <span class="input-group-addon"><span
                                                        class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-left: 0px"><h5><b>Đến ngày</b></h5></div>
                                        <div class="col-md-5" style="padding-right: 0px">
                                            <div class='input-group date' id='datetimepicker7'>
                                                <input type='text' class="form-control"
                                                       name="date_end" <?php if ($isUpdate) echo 'value="' . $data_detail[0]['date_end'] . '"'; ?>/>
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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
            foreach ($list_resort as $key => $resort) {
                echo " {
                id: '" . $resort['id'] . "',text: '" . $resort['name'] . "'},";
            }
            ?>
        ]
    });

</script>


</body>
</html>
