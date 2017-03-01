<div id="ModalXemThongTin" class="modal">
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