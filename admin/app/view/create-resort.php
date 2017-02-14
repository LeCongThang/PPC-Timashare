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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script type="text/javascript"
            src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyC9yHVNVTaWsVSqiWh5sIpKmCfKLrIiZc0'></script>
    <script src="<?= BASE_DIR ?>js/locationpicker.jquery.js"></script>
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
                    <?php echo $isUpdate ? 'Cập nhật khu nghỉ dưỡng' : 'Thêm khu nghỉ dưỡng'; ?>
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
                                <h2><b>THÔNG TIN KHU NGHỈ DƯỠNG</b></h2>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php foreach ($this->errors as $error): ?>
                                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                                <?php endforeach; ?>
                                <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                        <i class="glyphicon glyphicon-picture"></i> TẢI LÊN
                                        <input type="file" name="fileup[]" id="imgInp" multiple>
                                    </div>
                                    <!-- up file anh -->
                                </div>
                                <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="form-group">
                                            <label for="noidung">Tên </label>
                                            <input placeholder="Tên khu nghỉ dưỡng" class="form-control"
                                                   value="<?php echo $isUpdate ? $data_vi['ten'] : "" ?>"
                                                   name="resort_name"
                                                   style="font-size:17px;font-family:verdana;text-align:justify;">
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Giới thiệu</label>
                                            <textarea placeholder="Giới thiệu" name="resort_introduce" class="ckeditor"
                                                      cols="30"
                                                      rows="10"
                                                      title=""><?php echo $isUpdate ? $data_vi['introduce'] : "" ?></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Mô tả địa thế</label>
                                            <textarea placeholder="Địa thế" name="resort_location" class="ckeditor"
                                                      cols="30"
                                                      rows="10"
                                                      title=""><?php echo $isUpdate ? $data_vi['location'] : "" ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Mô tả dịch vụ</label>
                                            <textarea placeholder="Dịch vụ" name="resort_service" class="ckeditor"
                                                      cols="30"
                                                      rows="10"
                                                      title=""><?php echo $isUpdate ? $data_vi['service'] : "" ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Mô tả thiết bị</label>
                                            <textarea placeholder="Thiết bị" name="resort_equipment" class="ckeditor"
                                                      cols="30"
                                                      rows="10"
                                                      title=""><?php echo $isUpdate ? $data_vi['equipment'] : "" ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Trạng thái</label>
                                            <label class="radio-inline"><input type="radio" name="resort_status"
                                                                               value="0">Còn
                                                hàng</label>
                                            <label class="radio-inline"><input type="radio" name="resort_status"
                                                                               value="1">Hết
                                                hàng</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Loại dịch vụ</label>
                                            <label class="radio-inline"><input type="radio" name="resort_type"
                                                                               value="0">Khu nghỉ
                                                dưỡng</label>
                                            <label class="radio-inline"><input type="radio" name="resort_type"
                                                                               value="1">Nhà nghỉ
                                                mát</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Độ ưu tiên</label>
                                            <select class="form-control" name="resort_priority">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="4">3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Giá </label>
                                            <input placeholder="Gía mỗi phòng" class="form-control"
                                                   value="<?php echo $isUpdate ? $data_vi['price'] : "" ?>"
                                                   name="resort_price"
                                                   style="font-size:17px;font-family:verdana;text-align:justify;">
                                        </div>
                                        <div class="form-group">
                                            <label for="noidung">Địa chỉ</label>
                                            <input type="text" class="form-control" id="us2-address"
                                                   name="resort_address"
                                                   style="margin-bottom: 15px"/>
                                        </div>
                                        <div id="us2" style="width: 100%; height: 400px;"></div>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="visibility: hidden"
                                                   name="resort_lat" id="us2-lat"/>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" style="visibility: hidden"
                                                   name="resort_lon" id="us2-lon"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="visibility: hidden"
                                                   id="us2-country" name="resort_country"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <script>
                                            var lct = $('#us2').locationpicker({
                                                location: {
                                                    latitude: 46.15242437752303,
                                                    longitude: 2.7470703125
                                                },
                                                inputBinding: {
                                                    latitudeInput: $('#us2-lat'),
                                                    longitudeInput: $('#us2-lon'),
                                                    radiusInput: $('#us2-radius'),
                                                    locationNameInput: $('#us2-address')
                                                },
                                                enableAutocomplete: true,
                                                onchanged: function (currentLocation, radius, isMarkerDropped) {
                                                    var addressComponents = $(this).locationpicker('map').location.addressComponents;
                                                    $('#us2-country').val(addressComponents.country);
                                                },
                                                oninitialized: function (component) {
                                                    var addressComponents = component.locationpicker('map').location.addressComponents;
                                                    $('#us2-country').val(addressComponents.country);
                                                }
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="pull-right">
                                    <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->
                                    <button type="submit" name="submit" class="btn btn-info"><i
                                            class="glyphicon glyphicon-pencil"></i>&nbsp
                                        <b><?php echo $isUpdate ? "Cập nhật" : "Tạo khu nghỉ dưỡng" ?></b></button>
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
