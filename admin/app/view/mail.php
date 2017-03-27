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
    <?php require 'partials/slider-bar.php' ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Liên hệ</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Quản lý liên hệ</a></li>
                <li class="active">Hộp thư đến</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Hộp thư đến</h3>
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
                                                                          aria-expanded="true">Liên hệ chưa duyệt</a>
                                </li>
                                <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                                    data-toggle="tab"
                                                                    aria-controls="gioithieu_en"
                                                                    aria-expanded="false">Liên hệ đã
                                        duyệt</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="vi"
                                     aria-labelledby="vi-tab">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="" id="txtSearchName"
                                                       placeholder="Tên liên hệ">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="" id="txtSearchAddress"
                                                       placeholder="Địa chỉ liên hệ">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value="" id="txtSearchPhone"
                                                       placeholder="Số điện thoại liên hệ">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control btn btn-primary" type="button"
                                                       value="Tìm kiếm"
                                                       onclick="search()"
                                                       id="btnSearch">
                                            </div>
                                        </div>
                                        <div class="table-responsive mailbox-messages">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Tên công ty</th>
                                                    <th>Địa chỉ email</th>
                                                    <th>Số điện thoại</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody id="paging">
                                                </tbody>
                                            </table>
                                            <div id="page" class="pages col-md-12" style="text-align: center"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="en"
                                     aria-labelledby="en-tab">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value=""
                                                       id="txtSearchNameChecked"
                                                       placeholder="Tên liên hệ">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value=""
                                                       id="txtSearchAddressChecked"
                                                       placeholder="Địa chỉ liên hệ">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" value=""
                                                       id="txtSearchPhoneChecked"
                                                       placeholder="Số điện thoại liên hệ">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control btn btn-primary" type="button"
                                                       value="Tìm kiếm"
                                                       onclick="searchChecked()"
                                                       id="btnSearch">
                                            </div>
                                        </div>
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
                                                <tbody id="pagingChecked">
                                                </tbody>
                                            </table>
                                            <div id="pageChecked" class="pages col-md-12"
                                                 style="text-align: center"></div>
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

</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="http://hbbsolution.com/">HBB Web Team</a>.</strong> All rights
    reserved.
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
<script> var BASE_ADMIN = '<?=BASE_URL_ADMIN?>';</script>
<script>
    function search() {
        var txtSearchName = $('#txtSearchName').val();
        var txtSearchAddress = $('#txtSearchAddress').val();
        var txtSearchPhone = $('#txtSearchPhone').val();
        $.ajax({
            url: BASE_ADMIN + "controllermail/search",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearchName": txtSearchName,
                "txtSearchAddress": txtSearchAddress,
                "txtSearchPhone": txtSearchPhone
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
                    dataPaging += '<tr><td class="mailbox-name">' + '<a href="' + BASE_ADMIN + 'controllermail/xemmail/' + data[i].id + '">' + data[i].ten_lienhe + '</a></td>';
                    dataPaging += '<td class="mailbox-subject">' + data[i].email_lienhe + '</td><td class="mailbox-attachment">' + data[i].sdt_lienhe + '</td>';
                    dataPaging += '<td>' + '<a  href="" onclick="ftDelete('+data[i].id + ')"><button class="btn btn-info"><i class="glyphicon glyphicon-trash"></i></button></a></td>';
                    dataPaging += '</tr>';
                }
            }
            $('#paging').empty();
            $('#paging').append(dataPaging);
            pagingNumber(data, page);
        }
        else {
            $('#paging').empty();
            $('#page').empty();
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
        $('#page').empty();
        $('#page').append(str);
    }

    function loadPage(page) {
        var txtSearchName = $('#txtSearchName').val();
        var txtSearchAddress = $('#txtSearchAddress').val();
        var txtSearchPhone = $('#txtSearchPhone').val();
        $.ajax({
            url: BASE_ADMIN + "controllermail/search",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearchName": txtSearchName,
                "txtSearchAddress": txtSearchAddress,
                "txtSearchPhone": txtSearchPhone
            },
            success: function (data) {
                paging(data, page);
            }
        }).done(function (data) {
        });
        return true;
    }

    function searchChecked() {
        var txtSearchNameChecked = $('#txtSearchNameChecked').val();
        var txtSearchAddressChecked = $('#txtSearchAddressChecked').val();
        var txtSearchPhoneChecked = $('#txtSearchPhoneChecked').val();
        $.ajax({
            url: BASE_ADMIN + "controllermail/searchChecked",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearchNameChecked": txtSearchNameChecked,
                "txtSearchAddressChecked": txtSearchAddressChecked,
                "txtSearchPhoneChecked": txtSearchPhoneChecked
            },
            success: function (data) {
                pagingChecked(data, 1);
            }
        }).done(function (data) {
        });
        return true;
    }

    function pagingChecked(data, page) {
        if (data.length > 0) {
            var dataPaging = "";
            page = parseInt(page);
            var begin = (page - 1) * 15;
            for (var i = begin; i < begin + 15; i++) {
                if (i < data.length) {
                    dataPaging += '<tr><td class="mailbox-name">' + '<a href="' + BASE_ADMIN + 'controllermail/xemMailDaKiemTra/' + data[i].id + '">' + data[i].ten_lienhe + '</a></td>';
                    dataPaging += '<td class="mailbox-subject">' + data[i].email_lienhe + '</td><td class="mailbox-attachment">' + data[i].sdt_lienhe + '</td><td class="mailbox-attachment">' + data[i].nguoi_duyet + '</td>';
                    dataPaging += '<td>' + '<a href="" onclick="ftDelete1('+data[i].id + ')"><button class="btn btn-info"><i class="glyphicon glyphicon-trash"></i></button></a></td>';
                    dataPaging += '</tr>';
                }
            }
            $('#pagingChecked').empty();
            $('#pagingChecked').append(dataPaging);
            pagingNumberChecked(data, page);
        }
        else {
            $('#pagingChecked').empty();
            $('#pageChecked').empty();
        }
    }

    function pagingNumberChecked(data, current) {
        var str = "<p>Trang  ";
        var numberPage = Math.ceil(data.length / 15);
        var currentPage = parseInt(current);
        var pageList = Math.floor((currentPage - 1) / 5) + 1;
        var pageEnd = pageList * 5;
        var pageListLasted = Math.floor((numberPage - 1) / 5) + 1;
        var pageLast = 1;
        (pageListLasted != pageList) ? pageLast = pageEnd : pageLast = numberPage;

        if (pageList != 1)
            str += '<a onclick="loadPageChecked(' + (pageEnd - 5) + ')" >&lsaquo;&lsaquo;  </a>';
        for (var i = pageEnd - 4; i <= pageLast; i++) {
            if (i == currentPage)
                str += '<a style="margin-right: 3px;font-weight: bolder;color:black" class="active" onclick="loadPageChecked(' + i + ')">' + i + '</a>';
            else if (i != 0)
                str += '<a style="margin-right: 3px" onclick="loadPageChecked(' + i + ')">' + i + '</a>';
        }
        if (pageListLasted != pageList)
            str += '<a onclick="loadPageChecked(' + (pageEnd + 1) + ')" >  &rsaquo;&rsaquo;</a>';
        str += '</p>';
        $('#pageChecked').empty();
        $('#pageChecked').append(str);
    }

    function loadPageChecked(page) {
        var txtSearchNameChecked = $('#txtSearchNameChecked').val();
        var txtSearchAddressChecked = $('#txtSearchAddressChecked').val();
        var txtSearchPhoneChecked = $('#txtSearchPhoneChecked').val();
        $.ajax({
            url: BASE_ADMIN + "controllermail/searchChecked",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearchNameChecked": txtSearchNameChecked,
                "txtSearchAddressChecked": txtSearchAddressChecked,
                "txtSearchPhoneChecked": txtSearchPhoneChecked
            },
            success: function (data) {
                pagingChecked(data, page);
            }
        }).done(function (data) {
        });
        return true;
    }


</script>
<script>
    $(document).ready(function () {
        search();
        searchChecked();
    });
    function ftDelete($id) {
        var answer=confirm('Bạn có chắc muốn xóa?');
        if(answer){
            $.ajax({
                type: "POST",
                url: "<?=BASE_URL_ADMIN?>controllermail/delete/"+$id,
                success: function(data){
                    alert("Xóa thành công");
                    search();
                }
            });
        }

    }

    function ftDelete1($id) {
        var answer=confirm('Bạn có chắc muốn xóa?');
        if(answer){
            $.ajax({
                type: "POST",
                url: "<?=BASE_URL_ADMIN?>controllermail/delete/"+$id,
                success: function(data){
                    alert("Xóa thành công");
                    searchChecked();
                }
            });
        }

    }
</script>
</body>
</html>
