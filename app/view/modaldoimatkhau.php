<div id="ModalDoiMatKhau" class="modal bs-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"  style="width: 100%;height: 100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 style="text-align:center;" class="modal-title" id="gridSystemModalLabel">{TTDoiMatKhau}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class=" input-group" id="banner_5">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="matkhaucu" type="password" class="form-control" name="matkhaucu"
                                   placeholder='{MatKhauCu}'>
                        </div>
                    </div>
                </div>
                <div class="input-group col-md-12 col-sm-12 col-xs-12 col-lg-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="matkhaumoi" type="password" class="form-control" name="matkhaumoi"
                           placeholder='{MatKhauMoi}'>
                </div>
                <div class="input-group col-md-12 col-sm-12 col-xs-12 col-lg-12 " id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="nhaplaimatkhaumoi" type="password" class="form-control" name="nhaplaimatkhaumoi"
                           placeholder='{NhapLaiMatKhau}'>
                </div>
            </div>
            <p><span style="color: red;" id="thongbaodoimatkhau"></span></p>
            <div class="modal-footer text-right">
                <button type="submit" id="doimatkhau" name="btn_submit" class="btn btn-primary">{NutDoiMatKhau}
                </button>
                <button type="button" id="btnthoatdoimatkhau" class="btn btn-default" data-dismiss="modal">{Thoat}
                </button>
            </div>
        </div>
    </div>
</div>
