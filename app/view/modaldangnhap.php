<div id="ModalDangNhap" class="modal">
    <div id="model-content-dn">
        <div class="modal-header">
            <div class="close"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>{DangNhap}</b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL . $_SESSION['lang'] ?>/controller/dangNhap" method="POST">
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
            </form>
        </div>
    </div>
    <!-- Modal content -->
</div>