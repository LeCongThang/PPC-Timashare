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
            <h1><b> QUẢN LÝ TUYỂN DỤNG</b></h1>
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
                                <a href="<?= BASE_URL_ADMIN ?>controllertuyendung/create"
                                   class="btn btn-success"><i
                                        class="glyphicon glyphicon-th-large"></i>&nbsp <b>Thêm tin tuyển dụng</b></a>
                                <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->

                            </div>
                        </div>
                        <br>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Tiêu đề</th>
                                    <th>Hình ảnh</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($list_deals as $key => $deals): ?>
                                    <tr>
                                        <td>
                                            <?= $deals['id'] ?>
                                        </td>
                                        <td width="25%">
                                            <?= $deals['title'] ?>
                                        </td>
                                        <td width="50% ">
                                            <img src=" <?= BASE_DIR . $deals['image'] ?>" class="img-responsive"
                                                 style="height:50% "/>
                                        </td>
                                        <td>
                                            <a href="<?= BASE_URL_ADMIN ?>controllertuyendung/update/<?= $deals['id'] ?>"
                                               class="btn btn-primary">Sửa</a>
                                            <a href="" onclick="ftDelete('<?=$deals['id'];?>');"
                                               class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div id="page" class="pages col-md-12" style="text-align: center">
                                <p>Trang
                                    <?php
                                    if ($pageList != 1)
                                        echo '<a href="' . BASE_DIR_ADMIN . 'controllertuyendung/index/' . ($pageEnd - 5) . '">&lsaquo;&lsaquo;  </a>';
                                    for ($i = $pageEnd - 4; $i <= $lastPage; $i++) {
                                        if ($i == $currentPage)
                                            echo '<a style="margin-right: 3px;font-weight: bolder;color:black" class="active"  href="' . BASE_DIR_ADMIN . 'controllertuyendung/index/' . ($i) . '">' . $i . '</a>';
                                        else if ($i != 0)
                                            echo '<a style="margin-right: 3px" href="' . BASE_DIR_ADMIN . 'controllertuyendung/index/' . ($i) . '">' . $i . '</a>';
                                    }
                                    if ($pageListLasted != $pageList)
                                        echo '<a href="' . BASE_DIR_ADMIN . 'controllertuyendung/index/' . ($pageEnd + 1) . '">  &rsaquo;&rsaquo;</a>';
                                    ?>
                                </p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                            <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
                        </div>
                        <!-- /.box-footer -->
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
    function ftDelete($id) {
        var answer=confirm('Bạn có chắc muốn xóa?');
        if(answer){
            $.ajax({
                type: "POST",
                url: "<?=BASE_URL_ADMIN?>controllertuyendung/delete/"+$id,
                success: function(data){
                    window.location.href='<?=BASE_URL_ADMIN?>controllertuyendung/index';
                    alert("Xóa thành công");
                }
            });
        }

    }
</script>
</body>
</html>
