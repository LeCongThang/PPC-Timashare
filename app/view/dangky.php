<?php include 'header.php'; ?>

<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="row row-centered">
                <div class="col-md-4 col-centered " style="margin: auto">
                    <form method="post" action="<?=BASE_URL?>controller/dangKy" id="formlienhe">
                        <div class="account-top heading">
                            <h1 style="text-align: center">Đăng Ký Tài Khoản</h1>
                        </div>
                        <div class="address">
                            <span>Tên đăng nhập</span>
                            <input id="tendangnhap" name="tendangnhap" type="text">
                        </div>

                        <div class="address">
                            <span>Mật khẩu</span>
                            <input id="matkhau" name="matkhau" type="password">
                        </div>
                        <div class="address">
                            <span>Nhập lại mật khẩu</span>
                            <input id="nhaplaimatkhau" name="nhaplaimatkhau" type="password">
                        </div>
                        <div class="address">
                            <span>Họ tên</span>
                            <input id="hoten" name="hoten" type="text">
                        </div>
                        <div class="address">
                            <span>Địa chỉ</span>
                            <input id="diachi" name="diachi" type="text">
                        </div>
                        <div class="address">
                            <span>Điện thoại</span>
                            <input id="dienthoai" name="dienthoai" type="text">
                        </div>
                        <div class="address">
                            <span style="color: red;" id="thongbao"></span>
                        </div>
                        <div class="address new" style="text-align: center">
                            <input id="dangky" type="submit" value="Đăng ký">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>


