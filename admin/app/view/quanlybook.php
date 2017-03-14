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
    <?php require 'view/header.php' ?>

    <!-- Left side column. contains the logo and sidebar -->
    <?php require 'partials/slider-bar.php' ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><b>QUẢN LÝ ĐƠN ĐẶT CHỖ</b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <?php foreach ($this->errors as $error): ?>
                            <div class="alert alert-primary" role="alert"><?= $error ?></div>
                        <?php endforeach; ?>
                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#vi" id="vi-tab" role="tab" data-toggle="tab" aria-controls="gioithieu_vi"
                                       aria-expanded="true">Đơn đặt chỗ chưa duyệt</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#en" role="tab" id="en-tab" data-toggle="tab" aria-controls="gioithieu_en"
                                       aria-expanded="false">Đơn đặt chỗ đã duyệt</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="number"  min="0"  step="1" value="" id="txtSearch"
                                                       placeholder="Mã số đặt chỗ" >
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="" id="txtSearchName"
                                                       placeholder="Tên khách hàng">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="" id="txtSearchResort"
                                                       placeholder="Tên khu nghỉ dưỡng">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control btn btn-primary" type="button" value="Tìm kiếm"
                                                       onclick="search()"
                                                       id="btnSearch">
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Mã đơn đặt</th>
                                                <th>Tên tài khoản khách</th>
                                                <th>Tên khu nghỉ dưỡng</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="pagingBooking">

                                            </tbody>
                                        </table>
                                        <div id="pageBooking" class="pages col-md-12" style="text-align: center"></div>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.box-body -->
                                <div class="tab-pane fade" role="tabpanel" id="en" aria-labelledby="en-tab">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="number"  min="0"  step="1" value="" id="txtSearchBooked"
                                                       placeholder="Mã số đặt chỗ" >
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="" id="txtSearchNameBooked"
                                                       placeholder="Tên khách hàng">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="" id="txtSearchResortBooked"
                                                       placeholder="Tên khu nghỉ dưỡng">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control btn btn-primary" type="button" value="Tìm kiếm"
                                                       onclick="searchBooked()"
                                                       id="btnSearch">
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>Mã đơn đặt</th>
                                                <th>Tên tài khoản khách</th>
                                                <th>Tên khu nghỉ dưỡng</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="pagingBooked">

                                            </tbody>
                                        </table>
                                        <div id="pageBooked" class="pages col-md-12" style="text-align: center"></div>
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
<script> var BASE_ADMIN = '<?=BASE_URL_ADMIN?>';</script>
<script>
    function search() {
        var txtSearch = $('#txtSearch').val();
        var txtSearchName = $('#txtSearchName').val();
        var txtSearchResort = $('#txtSearchResort').val();
        $.ajax({
            url: BASE_ADMIN + "controllerbook/search",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearch": txtSearch,
                "txtSearchName": txtSearchName,
                "txtSearchResort": txtSearchResort
            },
            success: function (data) {
                paging(data, 1);
            }
        }).done(function (data) {
        });
        return true;
    }

    function paging(data, page) {
        if (data.length > 0) {
            var dataPaging = "";
            page = parseInt(page);
            var begin = (page - 1) * 15;
            for (var i = begin; i < begin + 15; i++) {
                if (i < data.length) {
                    dataPaging += '<tr><td>' + data[i].id_book + '</td><td>' + data[i].hoten + '</td><td>' + data[i].name + '</td>';
                    (data[i].status == 0) ? dataPaging += '<td>Chưa duyệt</td>' : dataPaging += '<td>Đã duyệt</td>';
                    dataPaging += '<td>' + '<a href="' + BASE_ADMIN + 'controllerbook/update/' + data[i].id_book + '"class="btn btn-primary">Xem chi tiết</a></td>';
                    dataPaging += '</tr>';
                }
            }
            $('#pagingBooking').empty();
            $('#pagingBooking').append(dataPaging);
            pagingNumber(data, page);
        }
        else {
            $('#pagingBooking').empty();
            $('#pageBooking').empty();
        }
    }

    function pagingNumber(data, current) {
        var str = "<p>Trang  ";
        var numberPage = Math.ceil(data.length / 15);
        var currentPage = parseInt(current);
        var pageList = Math.floor((currentPage - 1) / 5) + 1;
        var pageEnd = pageList * 5;
        var pageListLasted = Math.floor((numberPage - 1) / 5) + 1;
        var pageLast = 1;
        (pageListLasted != pageList) ? pageLast = pageEnd : pageLast = numberPage;

        if (pageList != 1)
            str += '<a onclick="loadPage(' + (pageEnd - 5) + ')" >&lsaquo;&lsaquo;  </a>';
        for (var i = pageEnd - 4; i <= pageLast; i++) {
            if (i == currentPage)
                str += '<a style="margin-right: 3px;font-weight: bolder;color:black" class="active" onclick="loadPage(' + i + ')">' + i + '</a>';
            else if (i != 0)
                str += '<a style="margin-right: 3px" onclick="loadPage(' + i + ')">' + i + '</a>';
        }
        if (pageListLasted != pageList)
            str += '<a onclick="loadPage(' + (pageEnd + 1) + ')" >  &rsaquo;&rsaquo;</a>';
        str += '</p>';
        $('#pageBooking').empty();
        $('#pageBooking').append(str);
    }

    function loadPage(page) {
        var txtSearch = $('#txtSearch').val();
        var txtSearchName = $('#txtSearchName').val();
        var txtSearchResort = $('#txtSearchResort').val();
        $.ajax({
            url: BASE_ADMIN + "controllerbook/search",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearch": txtSearch,
                "txtSearchName": txtSearchName,
                "txtSearchResort": txtSearchResort
            },
            success: function (data) {
                paging(data, page);
            }
        }).done(function (data) {
        });
        return true;
    }

    function searchBooked() {
        var txtSearchBooked = $('#txtSearchBooked').val();
        var txtSearchNameBooked = $('#txtSearchNameBooked').val();
        var txtSearchResortBooked = $('#txtSearchResortBooked').val();
        $.ajax({
            url: BASE_ADMIN + "controllerbook/searchBooked",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearchBooked": txtSearchBooked,
                "txtSearchNameBooked": txtSearchNameBooked,
                "txtSearchResortBooked": txtSearchResortBooked
            },
            success: function (data) {
                pagingBooked(data, 1);
            }
        }).done(function (data) {
        });
        return true;
    }

    function pagingBooked(data, page) {
        if (data.length > 0) {
            var dataPaging = "";
            page = parseInt(page);
            var begin = (page - 1) * 15;
            for (var i = begin; i < begin + 15; i++) {
                if (i < data.length) {
                    dataPaging += '<tr><td>' + data[i].id_book + '</td><td>' + data[i].hoten + '</td><td>' + data[i].name + '</td>';
                    (data[i].status == 1) ? dataPaging += '<td>Thành công</td>' : dataPaging += '<td>Hủy bỏ</td>';
                    dataPaging += '<td>' + '<a href="' + BASE_ADMIN + 'controllerbook/get/' + data[i].id_book + '"class="btn btn-primary">Xem chi tiết</a></td>';
                    dataPaging += '</tr>';
                }
            }
            $('#pagingBooked').empty();
            $('#pagingBooked').append(dataPaging);
            pagingNumberBooked(data, page);
        }
        else {
            $('#pagingBooked').empty();
            $('#pageBooked').empty();
        }
    }

    function pagingNumberBooked(data, current) {
        var str = "<p>Trang  ";
        var numberPage = Math.ceil(data.length / 15);
        var currentPage = parseInt(current);
        var pageList = Math.floor((currentPage - 1) / 5) + 1;
        var pageEnd = pageList * 5;
        var pageListLasted = Math.floor((numberPage - 1) / 5) + 1;
        var pageLast = 1;
        (pageListLasted != pageList) ? pageLast = pageEnd : pageLast = numberPage;

        if (pageList != 1)
            str += '<a onclick="loadPageBooked(' + (pageEnd - 5) + ')" >&lsaquo;&lsaquo;  </a>';
        for (var i = pageEnd - 4; i <= pageLast; i++) {
            if (i == currentPage)
                str += '<a style="margin-right: 3px;font-weight: bolder;color:black" class="active" onclick="loadPageBooked(' + i + ')">' + i + '</a>';
            else if (i != 0)
                str += '<a style="margin-right: 3px" onclick="loadPageBooked(' + i + ')">' + i + '</a>';
        }
        if (pageListLasted != pageList)
            str += '<a onclick="loadPageBooked(' + (pageEnd + 1) + ')" >  &rsaquo;&rsaquo;</a>';
        str += '</p>';
        $('#pageBooked').empty();
        $('#pageBooked').append(str);
    }

    function loadPageBooked(page) {
        var txtSearchBooked = $('#txtSearchBooked').val();
        var txtSearchNameBooked = $('#txtSearchNameBooked').val();
        var txtSearchResortBooked = $('#txtSearchResortBooked').val();
        $.ajax({
            url: BASE_ADMIN + "controllerbook/searchBooked",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearchBooked": txtSearchBooked,
                "txtSearchNameBooked": txtSearchNameBooked,
                "txtSearchResortBooked": txtSearchResortBooked
            },
            success: function (data) {
                pagingBooked(data, page);
            }
        }).done(function (data) {
        });
        return true;
    }

</script>
<script>
    $(document).ready(function () {
        search();
        searchBooked();
    });
</script>
</body>
</html>
