<div id="ModalDangNhap" class="modal">
    <div id="model-content-dn">
        <div class="modal-header">
            <div class="close"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>{DangNhap}</b></h3>
        </div>
        <div class="modal-body">
            <div class="input-group" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <?php
                if (isset($_COOKIE["tendangnhap"]) && isset($_COOKIE["rememberme"]))
                    echo ' <input id="username" type="text" class="form-control" name="username"
                           placeholder="' . '{TenDangNhap}' . '" value="' . $_COOKIE["tendangnhap"] . '">';
                else
                    echo ' <input id="username" type="text" class="form-control" name="username"
                         placeholder="' . '{TenDangNhap}' . '" value="">';
                ?>
            </div>
            <div class="input-group" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <?php
                if (isset($_COOKIE["matkhau"]) && isset($_COOKIE["rememberme"]))
                    echo ' <input id="password" type="password" class="form-control" name="password"
                           placeholder="' . '{Password}' . '" value="' . $_COOKIE["matkhau"] . '">';
                else
                    echo ' <input id="password" type="password" class="form-control" name="password"
                           placeholder="' . '{Password}' . '" value="">';
                ?>
            </div>
            <div class="input-group" id="banner_5" style="margin-top: 10px">
                                    <span class="input-group-addon" id="cbNhoMatKhau">
                                          <?php
                                          if (isset($_COOKIE["rememberme"]))
                                              echo " <input id='rememberme' style='height: 12px;width: 12px' type='checkbox' class='form-control' name='rememberme'
                            checked='checked'>";
                                          else
                                              echo " <input id='rememberme' style='height: 12px;width: 12px' type='checkbox' class='form-control' name='rememberme'
                            >";
                                          ?>
                                    </span> {RememberPassword}
            </div>

            <p><a href="" id="hrefdangky"><b>{DontHaveAccount}</b></a></p>
            <p><a href="" id="hrefquenmatkhau"><b>{ForgotPassword}</b></a></p>
            <p><span style="color: red;" id="thongbaodn"></span></p>
            <div class="modal-footer text-right">
                <button type="submit" id="btn_dangnhap" name="btn_submit" class="btn btn-default">{NutDangNhap}
                </button>
                <button type="button" id="btn_close" class="btn btn-default">{Thoat}</button>

            </div>
        </div>
    </div>
    <!-- Modal content -->
</div>
<script type="application/javascript">
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    $(document).ready(function () {
        $('#btn_dangnhap').click(function () {
            var tendangnhap = $('#username').val();
            var matkhau = $('#password').val();
            var rememberme = document.getElementById("rememberme").checked;
            var modal_dang_nhap = document.getElementById("ModalDangNhap");
            if (tendangnhap == "" || matkhau == "") {
                $('#thongbaodn').text("Hãy nhập đầy đủ thông tin");
                return false;
            } else if (!validateEmail(tendangnhap)) {
                $("#thongbaodn").text("Địa chỉ email không đúng");
                return false;
            }
            else {
                $.ajax({
                    url: lang + "/controller/dangNhap",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: {
                        "username": tendangnhap,
                        "password": matkhau,
                        "rememberme": rememberme
                    },
                    success: function (dulieu) {
                        if (dulieu == true)
                            location.reload();
                        else {
                            modal_dang_nhap.style.display = "block";
                            $('#thongbaodn').text("Tên đăng nhập hoặc mật khẩu bị sai");
                        }
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>