<div id="ModalDangKy" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="close"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>{TTDangKy}</b></h3>
        </div>
        <div class="modal-body">
            <label>{HinhDaiDien}</label>
            <div class="thumbnail input-group col-sm-12" style="text-align: center">
                <img src="<?= BASE_DIR ?>img/default_avatar.png" id="blah" src="" style="width: 140px;height: 170px;">
            </div>
            <div class="input-group" style="text-align: center">
                <input type="file" name="fileup" id="imgInp">
            </div>
            <!-- up file anh -->
            <div class="input-group col-sm-12" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="emailResgiter" type="text" class="form-control" name="emailResgiter"
                       placeholder='{DiaChiEmail}' >
            </div>
            <div class="input-group col-sm-12" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="passwordResgiter" type="password" class="form-control" name="passwordResgiter"
                       placeholder='{Password}' >
            </div>
            <div class="input-group col-sm-12" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input id="nameResgiter" type="text" class="form-control" name="nameResgiter"
                       placeholder='{HoTenDK}' >
            </div>
            <div class="input-group col-sm-12" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input id="addressResgiter" type="text" class="form-control" name="addressResgiter"
                       placeholder='{DiaChiDK}' >
            </div>
            <div class="input-group col-sm-12" id="banner_5">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input id="numberPhoneResgiter" type="text" class="form-control" name="numberPhoneResgiter"
                       placeholder='{DienThoaiDK}' >
            </div>
            <div class="input-group col-sm-12" id="banner_5">
                <label class="col-md-1" style="padding-left: 0px">{GioiTinh}</label>
                <label class="radio-inline col-md-5"><input type="radio" name="sexResgiter" value="0"
                                                            id="sexResgiter" checked="checked">{Nam}</label>
                <label class="radio-inline col-md-5"><input type="radio" name="sexResgiter" value="1"
                                                            id="sexResgiter">{Nu}</label>
            </div>
            <p><span style="color: red;" id="thongbaodk"></span></p>
            <div class="modal-footer text-right">
                <button type="submit" id="btn_dangky" name="dangky" class="btn btn-default">{DangKy}
                </button>
                <button type="button" id="btn_thoatdangky" class="btn btn-default">{Thoat}</button>
            </div>
        </div>
    </div>
    <!-- Modal content -->
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);

    });
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $(document).ready(function () {
        $('#btn_dangky').click(function () {
            var modal_dang_ky = document.getElementById("ModalDangKy");
            var emailResgiter = $('#emailResgiter').val();
            var passwordResgiter = $('#passwordResgiter').val();
            var nameResgiter = $('#nameResgiter').val();
            var addressResgiter = $('#addressResgiter').val();
            var numberPhoneResgiter = $('#numberPhoneResgiter').val();
            var sexResgiter = $('input[name="sexResgiter"]:checked').val();

            if (emailResgiter == "" || passwordResgiter == "" || nameResgiter == "" || addressResgiter == "" || numberPhoneResgiter == "" || sexResgiter == "") {
                $('#thongbaodk').text("Hãy nhập đầy đủ thông tin");
                return false;
            } else if (!validateEmail(emailResgiter)) {
                $("#thongbaodk").text(emailResgiter + " không đúng");
                return false;
            } else if (isNaN(numberPhoneResgiter)) {
                $('#thongbaodk').text("Điện thoại phải là số");
                return false;
            } else {
                $.ajax({
                    url: lang + "/controller/dangKy",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: {
                        "emailResgiter": emailResgiter,
                        "passwordResgiter": passwordResgiter,
                        "nameResgiter": nameResgiter,
                        "addressResgiter": addressResgiter,
                        "numberPhoneResgiter": numberPhoneResgiter,
                        "sexResgiter": sexResgiter
                    },
                    success: function (dulieu) {
                        var x = Number(dulieu);
                        if (x == 2) {
                            modal_dang_ky.style.display = "none";
                            alert("Đăng ký thành công mời bạn đăng nhập");
                        }
                        else {
                            modal_dang_ky.style.display = "block";
                            if (x == 3)
                                $('#thongbaodk').text("Đăng ký bị lỗi, mời bạn thực hiện lại");
                            else if (x == 0)
                                $('#thongbaodk').text("Email này đã được sử dụng");
                            else
                                $('#thongbaodk').text("Số điện thoại này này đã được sử dụng");
                        }
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>