<div id="ModalDangKy" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin: 0px;width: 100%;height: 100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 style="text-align:center;" class="modal-title" id="gridSystemModalLabel">{TTDangKy}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <label>{HinhDaiDien}</label>
                        <div class="thumbnail input-group col-sm-12" style="text-align: center">
                            <img src="<?= BASE_DIR ?>img/default_avatar.png" id="blah" src=""
                                 style="width: 140px;height: 170px;">
                        </div>
                        <div class="input-group" style="text-align: center">
                            <input type="file" name="imgInp" id="imgInp">
                        </div>
                    </div>
                </div>
                <!-- up file anh -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="input-group col-sm-12" id="banner_5">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="emailResgiter" type="text" class="form-control" name="emailResgiter" maxlength="50"
                                   placeholder='{DiaChiEmail}'>
                        </div>
                    </div>
                </div>
                <div class="input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="passwordResgiter" type="password" class="form-control" name="passwordResgiter" maxlength="50"
                           placeholder='{Password}'>
                </div>
                <div class="input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <input id="nameResgiter" type="text" class="form-control" name="nameResgiter" maxlength="100"
                           placeholder='{HoTenDK}'>
                </div>
                <div class="input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="addressResgiter" type="text" class="form-control" name="addressResgiter" maxlength="255"
                           placeholder='{DiaChiDK}'>
                </div>
                <div class="input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input id="numberPhoneResgiter" type="text" class="form-control" name="numberPhoneResgiter" maxlength="20"
                           placeholder='{DienThoaiDK}'>
                </div>
                <div class="input-group col-sm-12" id="banner_5">
                    <label class="col-md-2" style="padding-left: 0px">{GioiTinh}</label>
                    <label class="radio-inline col-md-5"><input type="radio" name="sexResgiter" value="0"
                                                                id="sexResgiter" checked="checked">{Nam}</label>
                    <label class="radio-inline col-md-4"><input type="radio" name="sexResgiter" value="1"
                                                                id="sexResgiter">{Nu}</label>
                </div>
                <p><span style="color: red;" id="thongbaodk"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btn_dangky" name="dangky" class="btn btn-primary">{DangKy}
                    </button>
                    <button type="button" id="btn_thoatdangky" class="btn btn-default" data-dismiss="modal">{Thoat}
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal content -->
    </div>
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
            var emailResgiter = $('#emailResgiter').val();
            var passwordResgiter = $('#passwordResgiter').val();
            var nameResgiter = $('#nameResgiter').val();
            var addressResgiter = $('#addressResgiter').val();
            var numberPhoneResgiter = $('#numberPhoneResgiter').val();
            var sexResgiter = $('input[name="sexResgiter"]:checked').val();

            var file_data = $('#imgInp').prop('files')[0];
            var form_data = new FormData();
            form_data.append('imgInp', file_data);
            form_data.append('emailResgiter', emailResgiter);
            form_data.append('passwordResgiter', passwordResgiter);
            form_data.append('nameResgiter', nameResgiter);
            form_data.append('addressResgiter', addressResgiter);
            form_data.append('numberPhoneResgiter', numberPhoneResgiter);
            form_data.append('sexResgiter', sexResgiter);
            if (emailResgiter == "" || passwordResgiter == "" || nameResgiter == "" || addressResgiter == "" || numberPhoneResgiter == "" || sexResgiter == "") {
                if (lang == "vi")
                    $('#thongbaodk').text("Hãy nhập đầy đủ thông tin");
                else
                    $('#thongbaodk').text("Please enter full information");
                return false;
            } else if (!validateEmail(emailResgiter)) {
                if (lang == "vi")
                    $('#thongbaodk').text("Thư điện tử không đúng");
                else
                    $('#thongbaodk').text("Email is incorrect");
                return false;
            } else if (isNaN(numberPhoneResgiter)) {
                if (lang == "vi")
                    $('#thongbaodk').text("Số điện thoại phải là số");
                else
                    $('#thongbaodk').text("Phone number must be number");
                return false;
            } else {
                $.ajax({
                    url: lang + "/controller/dangKy",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function (dulieu) {
                        var x = Number(dulieu);
                        if (x == 2) {
                            $('#ModalDangKy').modal('toggle');
                            if (lang == "vi")
                                alert("Đăng ký thành công mời bạn đăng nhập");
                            else
                                alert("Resgiter account successfull");
                            location.reload();
                        }
                        else {
                            if (x == 3) {
                                if (lang == "vi")
                                    $('#thongbaodk').text("Đăng ký thất bại, mời thực hiện lại");
                                else
                                    $('#thongbaodk').text("Resgiter has been error");
                            }
                            else if (x == 0) {
                                if (lang == "vi")
                                    $('#thongbaodk').text("Thư điện tử này đã được sử dụng");
                                else
                                    $('#thongbaodk').text("Email has been used");
                            }
                            else {
                                if (lang == "vi")
                                    $('#thongbaodk').text("Số điện thoại này này đã được sử dụng");
                                else
                                    $('#thongbaodk').text("Number phone has been used");

                            }
                        }
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>