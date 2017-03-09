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
<?php require 'view/header.php' ?>

<?php require 'partials/slider-bar.php' ?>
<div class="wrapper" style="height: 1000px">

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><b> XEM MAIL </b></h1>
            <!--            <hr style="boder:1px solid black;">-->
            <ol class="breadcrumb">
                <li><a href="<?= BASE_DIR_ADMIN ?>controllermail/index"><i class="fa fa-dashboard"></i>Quản
                        lý mail</a></li>
                <li class="active">Mailbox</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <!-- /.col -->
                            <div class="col-md-6" style="background-color: white;">
                                <h4>Form:&nbsp <?= $mail['ten_lienhe']; ?></h4>
                            </div>
                            <div class="col-md-6" style="background-color: white;">
                                <h4>Email:&nbsp<?= $mail['email_lienhe']; ?></h4>
                            </div>
                            <br><br><br>
                            <div class="col-md-12" style="background-color: white;">
                                <h4>Số điện thoại:&nbsp<?= $mail['sdt_lienhe']; ?></h4>
                            </div>
                            <br><br><br>
                            <div class="col-md-12" style="background-color: white;">
                                <h4>NỘI DUNG</h4>
                                <br>
                                <p style="text-align: justify;font-family: verdana;font-size: medium;"><?= $mail['conten_lienhe']; ?></p>
                            </div>
                            <br><br><br>
                            <br><br><br>
                            <div class="col-md-12" style="background-color: white;text-align: center">
                                <a href="<?= BASE_URL_ADMIN ?>controllermail/update/<?= $mail['id'] ?>"
                                   class="btn btn-info">Duyệt Mail</a>
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
</div>


<!-- /.content-wrapper -->

<footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="http://hbbsolution.com/">HBB Web Team</a>.</strong> All rights
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
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
    });
</script>
</body>
</html>
