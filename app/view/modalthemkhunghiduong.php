<div id="ModalThemKND" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="close"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>ĐĂNG KÝ THÔNG TIN KHU NGHỈ DƯỠNG</b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL ?>controller/dangKy" method="POST">
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="tenkhunghiduong" type="text" class="form-control" name="tenkhunghiduong"
                           placeholder="Tên Khu Nghỉ Dưỡng">
                </div>
                <div class="dropdown">
                    <div class="input-group" id="banner_5">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                        </button>
                        <select class="form-control">
                            <option value="one">Khu Nghỉ Dưỡng</option>
                            <option value="two">Nhà</option>
                        </select>
                    </div>
                </div>
                <div class="input-group" id="banner_5">
                      <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>

                    <input type='text' class="form-control" id="thoigian" name="thoigian"
                           placeholder="Thời gian bắt đầu"/>

                </div>
                <div class="input-group" id="banner_5">
                     <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>

                    <input type='text' class="form-control" id="thoigian" name="thoigian"
                           placeholder="Thời gian kết thúc"/>

                </div>
                <div class="input-group" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                    <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Mô tả"></textarea>
                </div>

                <p><span style="color: red;" id="thongbao"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btnThemKND" name="dangky" class="btn btn-default">Đăng
                        Ký
                    </button>
                    <button type="button" id="btnThoatThemKND" class="btn btn-default">Thoát</button>

                </div>
            </form>
        </div>
    </div>
    <!-- Modal content -->
</div>