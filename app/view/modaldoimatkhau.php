<div id="ModalDoiMatKhau" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="closeModalDoiMatKhau"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>ĐỔI MẬT KHẨU</b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL ?>controller/doimatkhau" method="POST">
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="matkhaucu" type="password" class="form-control" name="matkhaucu"
                           placeholder="Mật khẩu cũ">
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="matkhaumoi" type="password" class="form-control" name="matkhaumoi"
                           placeholder="Mật khẩu mới">
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="nhaplaimatkhaumoi" type="password" class="form-control" name="nhaplaimatkhaumoi"
                           placeholder="Nhập lại mật khẩu mới">
                </div>
                <p><span style="color: red;" id="thongbaodoimatkhau"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="doimatkhau" name="btn_submit" class="btn btn-default">Thay đổi
                    </button>
                    <button type="button" id="btnthoatdoimatkhau" class="btn btn-default">Thoát</button>

                </div>
            </form>
        </div>
    </div>
    <!-- Modal content -->
</div>