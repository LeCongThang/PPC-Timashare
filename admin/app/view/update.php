<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>css/bootstrap.min.css">
</head>
<style>
    .space{
        margin-top: 100px;
    }
    h2{
        font-family: Verdana;
        font-weight: bold;
    }

    .btn{
        border-radius: 0px;
    }

</style>
<body>
    <div class="container space">
        <div class="container"><br>
            <h2>THÔNG TIN TÀI KHOẢN</h2>
            <hr style="border: 2px solid ">
            <form action="<?=BASE_URL_ADMIN?>controllertaikhoan/update" method="POST">
            <div class="row space text-center" id="box1">
                <div class="col-md-3">
                    TÊN ĐĂNG NHẬP
                </div>
                <div class="col-md-3">
                    <input type="text" name="box1" style="width:100%;" value="<?= $row['tendangnhap'];?>">
                </div>
                <div class="col-md-3">
                    PASSWORD
                </div>
                <div class="col-md-3">
                    <input type="text" name="box2" style="width:100%;" value="<?= $row['matkhau'];?>">
                </div><BR><BR><BR>
                <div class="col-md-3">
                    HỌ VÀ TÊN
                </div>
                <div class="col-md-3">
                    <input type="text" name="box3" style="width:100%;" value="<?= $row['hoten'];?>">
                </div>
                <div class="col-md-3">
                    ĐỊA CHỈ
                </div>
                <div class="col-md-3">
                    <input type="text" name="box4" style="width:100%;"value="<?= $row['diachi'];?>">
                </div><BR><BR><BR>
                <div class="col-md-3">
                    SỐ ĐIỆN THOẠI
                </div>
                <div class="col-md-3">
                    <input type="text" name="box5" style="width:100%;" value="<?= $row['dienthoai'];?>">
                </div><BR><BR><BR>
                <input type="hidden" name="box6" style="width:100%;" value="<?= $row['id_vaitro'];?>">
                <div class="col-md-12">
                    <button class="btn btn-info">CẬP NHẬT</button>

                </div><BR><BR><BR>
            </div>
            </form>
            <hr style="border: 2px solid ">
            <a href="<?=BASE_URL_ADMIN?>controllertaikhoan/taikhoan" <button class="btn btn-info">THOÁT</button></a>
        </div>
    </div>
</body>
</html>