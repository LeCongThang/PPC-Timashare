<div id="ModalQuenMatKhau" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 style="text-align:center;"><b>{ForgotPasswordUpper}</b></h3>
        </div>
        <div class="modal-body">
            <div class="input-group" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="tendangnhapll" type="text" class="form-control" name="tendangnhapll"
                       placeholder='{TenDangNhap}' required>
            </div>
            <p><span style="color: red;" id="thongbaoQuenMatKhau"></span></p>
            <div class="modal-footer text-right">
                <button type="submit" id="btnQuenMatKhau" name="btn_submit" class="btn btn-default">{Gui}
                </button>
                <button type="button" id="btnThoatQuenMatKhau" class="btn btn-default">{Thoat}</button>
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
            var modal_quen_mat_khau = document.getElementById("ModalQuenMatKhau");
            var tendangnhapll = $('#tendangnhapll').val();
            if (tendangnhapll == "") {
                $('#thongbaoQuenMatKhau').text("Hãy nhập đầy đủ thông tin");
                return false;
            } else if (!validateEmail(tendangnhapll)) {
                $("#thongbaoQuenMatKhau").text("Hãy nhập email chính xác");
                return false;
            } else {
                modal_quen_mat_khau.style.display = "none";
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