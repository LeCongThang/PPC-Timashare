<?php include 'header.php'; ?>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h2 class="title_h2">{DoiMatKhau}</h2>
        </div>
        <form action="<?= BASE_URL . $_SESSION['lang'] ?>/controller/updatePassword/<?=$id_user?>" method="POST">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 input-group" style="margin-top: 10px;margin-bottom:10px">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="new_password" type="password" class="form-control" name="new_password"
                           placeholder='{MatKhauMoi}'>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 input-group" style="margin-top: 10px;margin-bottom:10px">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="re_new_password" type="password" class="form-control" name="re_new_password"
                           placeholder='{NhapLaiMatKhau}'>
                </div>
            </div>
            <p style="text-align: center;margin-top: 10px;margin-bottom:10px"><span style="color: red;" id="annouce_change_newpass"></span></p>
            <div class="row">
                <div class="col-md-2 col-md-offset-5" style="text-align: center;margin-top: 10px;margin-bottom:10px" >
                    <button type="submit" id="btn_change_newpass" name="btn_submit" class="btn btn-primary btnBookNow" style="margin-top: 0px">{NutDoiMatKhau}
                    </button>
                </div>
            </div>
    </div>
    </form>
</div>
<script type="text/javascript">

</script>
<?php include 'footer.php'; ?>
