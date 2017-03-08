<div id="ModalQuenMatKhau" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin: 0px;width: 100%;height: 100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 style="text-align:center;" class="modal-title" id="gridSystemModalLabel">{ForgotPasswordUpper}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <div class="input-group" id="banner_5">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="tendangnhapll" type="text" class="form-control" name="tendangnhapll"
                                   placeholder='{TenDangNhap}' required>
                        </div>
                    </div>
                </div>
                <p><span style="color: red;" id="thongbaoQuenMatKhau"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btnQuenMatKhau" name="btn_submit" class="btn btn-primary">{Gui}
                    </button>
                    <button type="button" id="btnThoatQuenMatKhau" class="btn btn-default" data-dismiss="modal">
                        {Thoat}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $(document).ready(function () {
        $('#btnQuenMatKhau').click(function () {
            var tendangnhapll = $('#tendangnhapll').val();
            if (tendangnhapll == "") {
                $('#thongbaoQuenMatKhau').text("Hãy nhập đầy đủ thông tin");
                return false;
            } else if (!validateEmail(tendangnhapll)) {
                $("#thongbaoQuenMatKhau").text("Hãy nhập email chính xác");
                return false;
            } else {
                $('#ModalQuenMatKhau').modal('toggle');
                alert("Mời bạn kiểm tra mail ");
                $.ajax({
                    url: lang + "/controller/quenmatkhau",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: {
                        "tendangnhapll": tendangnhapll,
                    },
                    success: function (dulieu) {
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>