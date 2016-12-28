<div id="ModalDangKy" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="close"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>{TTDangKy}</b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL.$_SESSION['lang'] ?>/controller/dangKy" method="POST">
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="diaChiEmail" type="text" class="form-control" name="diaChiEmail"
                           placeholder='{DiaChiEmail}'>
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input id="dienthoai" type="text" class="form-control" name="dienthoai"
                           placeholder='{DienThoaiDK}'>
                </div>
                <p><span style="color: red;" id="thongbao"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btn_dangky" name="dangky" class="btn btn-default">{DangKy}
                    </button>
                    <button type="button" id="btn_thoatdangky" class="btn btn-default">{Thoat}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal content -->
</div>