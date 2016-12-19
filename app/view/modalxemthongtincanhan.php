<div id="ModalXemThongTin" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="closexemthongtin"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>THÔNG TIN CÁ NHÂN </b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL ?>controller/luuthongtintaikhoan" method="POST">
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon">Họ tên</span>
                    <?php
                    if (isset($_SESSION['tentaikhoan']))
                        echo '<input id="tentaikhoan" type="text" class="form-control" name="tentaikhoan" value="' . $_SESSION['tentaikhoan'] . '">';
                    else
                        echo '<input id="tentaikhoan" type="text" class="form-control" name="tentaikhoan">';
                    ?>

                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon">Địa chỉ</span>
                    <?php
                    if (isset($_SESSION['diachitaikhoan']))
                        echo '<input id="diachitaikhoan" type="text" class="form-control" name="diachitaikhoan" value="' . $_SESSION['diachitaikhoan'] . '">';
                    else
                        echo '<input id="diachitaikhoan" type="text" class="form-control" name="diachitaikhoan">';
                    ?>
                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon">Số điện thoại</span>
                    <?php
                    if (isset($_SESSION['sodienthoaitaikhoan']))
                        echo '<input id="sodienthoaitaikhoan" type="text" class="form-control" name="sodienthoaitaikhoan" value="' . $_SESSION['sodienthoaitaikhoan'] . '">';
                    else
                        echo '<input id="sodienthoaitaikhoan" type="text" class="form-control" name="sodienthoaitaikhoan">';
                    ?>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" id="btnLuuThongTin" name="btnLuuThongTin" class="btn btn-default">Lưu thông tin
                    </button>
                    <button type="button" id="btnHuyThongTin" class="btn btn-default">Thoát</button>

                </div>
            </form>
        </div>
    </div>
    <!-- Modal content -->
</div>