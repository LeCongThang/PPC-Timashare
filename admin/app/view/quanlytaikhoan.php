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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1><b> QUẢN LÝ TÀI KHOẢN </b></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <?php foreach ($this->errors as $error): ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php endforeach; ?>
                        <div class="box-header with-border text-center">
                            <div class="pull-left">
                                <a href="<?= BASE_URL_ADMIN ?>controllertaikhoan/create"
                                   class="btn btn-success"><i
                                        class="glyphicon glyphicon-th-large"></i>&nbsp <b>Thêm tài khoản</b></a>
                                <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="" id="txtSearch"
                                           placeholder="Tên đăng nhập">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="" id="txtSearchPhone"
                                           placeholder="Số điện thoại">
                                </div>
                                <div class="col-md-2">
                                    <select id="type" class="form-control">
                                        <option value="-1" selected>Phân loại</option>
                                        <option value="1">User</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="status" class="form-control">
                                        <option value="-1" selected>Trạng thái</option>
                                        <option value="0">Còn hiệu lực</option>
                                        <option value="1">Giới hạn</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control btn btn-primary" type="button" value="Tìm kiếm"
                                           onclick="search()"
                                           id="btnSearch">
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Tên đăng nhập</td>
                                    <td>Họ tên</td>
                                    <td>Địa chỉ</td>
                                    <td>Điện thoại</td>
                                    <td>Loại tài khoản</td>
                                    <td>Tình trạng</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody id="pagingAccount">
                                </tbody>
                            </table>
                            <div id="page" class="pages col-md-12" style="text-align: center">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
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
<script> var BASE_ADMIN = '<?=BASE_URL_ADMIN?>';</script>
<script>
    function search() {
        var txtSearch = $('#txtSearch').val();
        var txtSearchPhone = $('#txtSearchPhone').val();
        var type_ = document.getElementById("type");
        var type = type_.options[type_.selectedIndex].value;
        var status_ = document.getElementById("status");
        var status = status_.options[status_.selectedIndex].value;
        $.ajax({
            url: BASE_ADMIN + "controllertaikhoan/search",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearch": txtSearch,
                "txtSearchPhone": txtSearchPhone,
                "type": type,
                "status": status
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
                    dataPaging += '<tr><td>' + data[i].tendangnhap + '</td><td>' + data[i].hoten + '</td><td>' + data[i].diachi + '</td><td>' + data[i].dienthoai + '</td>';
                    (data[i].id_vaitro == 1) ? dataPaging += '<td>User</td>' : dataPaging += '<td>Admin</td>';
                    (data[i].status == 1) ? dataPaging += '<td>Giới hạn</td>' : dataPaging += '<td>Còn hiệu lực</td>';
                    dataPaging += '<td>' + '<a href="' + BASE_ADMIN + 'controllertaikhoan/update/' + data[i].id + '"class="btn btn-primary">Sửa</a></td>';
                    dataPaging += '</tr>';
                }
            }
            $('#pagingAccount').empty();
            $('#pagingAccount').append(dataPaging);
            pagingNumber(data, page);
        }
        else {
            $('#pagingAccount').empty();
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
        var txtSearch = $('#txtSearch').val();
        var txtSearchPhone = $('#txtSearchPhone').val();
        var type_ = document.getElementById("type");
        var type = type_.options[type_.selectedIndex].value;
        var status_ = document.getElementById("status");
        var status = status_.options[status_.selectedIndex].value;
        $.ajax({
            url: BASE_ADMIN + "controllertaikhoan/search",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                "txtSearch": txtSearch,
                "txtSearchPhone": txtSearchPhone,
                "type": type,
                "status": status
            },
            success: function (data) {
                paging(data, page);
            }
        }).done(function (data) {
        });
        return true;
    }

</script>
<script>
    $(document).ready(function () {
        search();
    });
</script>
</body>

</html>
