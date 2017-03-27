<div id="ModalDangNhap" class="modal " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content"  style="width: 100%;height: 100%" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 style="text-align:center;" class="modal-title" id="gridSystemModalLabel">{DangNhap}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="input-group col-md-12 col-sm-12" id="banner_5">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <?php
                            if (isset($_COOKIE["tendangnhap"]) && isset($_COOKIE["rememberme"]))
                                echo ' <input id="username" type="text" class="form-control" name="username" maxlength="50"
                           placeholder="' . '{TenDangNhap}' . '" value="' . $_COOKIE["tendangnhap"] . '">';
                            else
                                echo ' <input id="username" type="text" class="form-control" name="username" maxlength="50"
                         placeholder="' . '{TenDangNhap}' . '" value="">';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group col-md-12 col-sm-12" id="banner_5">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <?php
                            if (isset($_COOKIE["matkhau"]) && isset($_COOKIE["rememberme"]))
                                echo ' <input id="password" type="password" class="form-control" name="password" maxlength="50"
                           placeholder="' . '{Password}' . '" value="' . $_COOKIE["matkhau"] . '">';
                            else
                                echo ' <input id="password" type="password" class="form-control" name="password" maxlength="50"
                           placeholder="' . '{Password}' . '" value="">';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="input-group col-md-12 col-sm-12" id="banner_5" style="margin-top: 10px">
                                    <span class="input-group-addon" id="cbNhoMatKhau">
                                          <?php
                                          if (isset($_COOKIE["rememberme"]))
                                              echo " <input id='rememberme' style='height: 12px;width: 12px' type='checkbox' class='form-control' name='rememberme' checked='checked'>";
                                          else
                                              echo " <input id='rememberme' style='height: 12px;width: 12px' type='checkbox' class='form-control' name='rememberme' >";
                                          ?>
                                    </span> {RememberPassword}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <p><a href="" id="hrefdangky"><b>{DontHaveAccount}</b></a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p><a href="" id="hrefquenmatkhau"><b>{ForgotPassword}</b></a></p>
                    </div>
                </div>


                <p><span style="color: red;" id="thongbaodn"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btn_dangnhap" name="btn_submit" class="btn btn-primary">{NutDangNhap}
                    </button>
                    <button type="button" id="btn_close" class="btn btn-default" data-dismiss="modal">{Thoat}
                    </button>

                </div>
            </div>
        </div>
        <!-- Modal content -->
    </div>
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
                if (lang == "vi")
                    $('#thongbaodn').text("Hãy nhập đầy đủ thông tin");
                else
                    $('#thongbaodn').text("Please enter full information");
                return false;
            } else if (!validateEmail(tendangnhap)) {
                if (lang == "vi")
                    $('#thongbaodn').text("Thư điện tử không đúng");
                else
                    $('#thongbaodn').text("Email is incorrect");
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
                            if (lang == "vi")
                                $('#thongbaodn').text("Tên đăng nhập hoặc mật khẩu bị sai");
                            else
                                $('#thongbaodn').text("User name or password incorrect");
                        }
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>

