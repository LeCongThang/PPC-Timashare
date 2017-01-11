<div id="ModalDoiMatKhau" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 style="text-align:center;"><b>{TTDoiMatKhau}</b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL.$_SESSION['lang'] ?>/controller/doimatkhau" method="POST">
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="ckeditor" type="password" class="form-control" name="ckeditor"
                           placeholder="Lí do">
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" id="doimatkhau" name="btn_submit" class="btn btn-default">{NutDoiMatKhau}
                    </button>
                    <button type="button" id="btnthoatdoimatkhau" class="btn btn-default">{Thoat}</button>

                </div>
            </form>
        </div>
    </div>
    <!-- Modal content -->
</div>