<div id="ModalDangKy" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="close"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>ĐĂNG KÝ </b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL ?>controller/dangKy" method="POST">
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="tendangnhap" type="text" class="form-control" name="tendangnhap"
                           placeholder="Tên đăng nhập">
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="matkhau" type="password" class="form-control" name="matkhau"
                           placeholder="Mật khẩu">
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="nhaplaimatkhau" type="password" class="form-control" name="nhaplaimatkhau"
                           placeholder="Nhập lại mật khẩu">
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                    <input id="hoten" type="text" class="form-control" name="hoten"
                           placeholder="Họ tên">
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="diachi" type="text" class="form-control" name="diachi"
                           placeholder="Địa chỉ">
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input id="dienthoai" type="text" class="form-control" name="dienthoai"
                           placeholder="Điện thoại">
                </div>
                <p><a href="<?= BASE_URL ?>controller/quenmatkhau"><b>Quên mật khẩu ?</b></a></p>
                <p><span style="color: red;" id="thongbao"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btn_dangky" name="dangky" class="btn btn-default">Đăng
                        Ký
                    </button>
                    <button type="button" id="btn_thoatdangky" class="btn btn-default">Thoát</button>

                </div>
            </form>
        </div>
    </div>
    <!-- Modal content -->
</div>