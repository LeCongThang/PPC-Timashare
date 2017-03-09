function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

$(document).ready(function () {

    $(document).on("click", 'div.name-video a', function (e) {
        e.preventDefault();
        data = $(this).data("value");
        $('#main_video').attr('src', data);
        e.preventDefault();
    });

    $('#btn_change_newpass').click(function () {
        matkhaumoi = $('#new_password').val();
        nhaplaimatkhaumoi = $('#re_new_password').val();
        loi = 0;
        if (matkhaumoi == "") {
            loi++;
            if(lang == "vi")
                $('#annouce_change_newpass').text("Hãy nhập đầy đủ thông tin");
            else
                $('#annouce_change_newpass').text("Please enter full information");
        }
        else {
            if (matkhaumoi != nhaplaimatkhaumoi) {
                loi++;
                if(lang == "vi")
                    $('#annouce_change_newpass').text("Mật khẩu nhập lại không trùng khớp");
                else
                    $('#annouce_change_newpass').text("Repassword entered does not match");
            }
        }
        if (loi != 0) {
            return false;
        }
        return true;
    });

    $('#btn_gui').click(function () {
        var tencongty = $('#ten').val();
        var dienthoaicongty = $('#dienthoaicongty').val();
        var emailcongty = $('#email').val();
        var loinhan = $('#loinhan').val();

        if (tencongty == "" || dienthoaicongty == "" || emailcongty == "" || loinhan == "") {
            if(lang == "vi")
                $('#thongbaoguilh').text("Hãy nhập đầy đủ thông tin");
            else
                $('#thongbaoguilh').text("Please enter full information");
            return false;
        } else if (isNaN(dienthoaicongty)) {
            if(lang == "vi")
                $('#thongbaoguilh').text("Điện thoại phải là số");
            else
                $('#thongbaoguilh').text("Number phone must be a number");
            return false;
        } else if (!validateEmail(emailcongty)) {
            if(lang == "vi")
                $('#thongbaoguilh').text("Địa chỉ thư điện tử không đúng định dạng");
            else
                $('#thongbaoguilh').text("Email incorrect");
            return false;
        } else {
            $.ajax({
                url: lang + "/controller/lienHe",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    "tencongty": tencongty,
                    "dienthoaicongty": dienthoaicongty,
                    "emailcongty": emailcongty,
                    "loinhan": loinhan
                },
                success: function (dulieu) {
                    if (dulieu == true) {
                        if(lang == "vi")
                            alert("Liên hệ đã được gửi tới ban quản trị");
                        else
                            alert("Request has been submitted");
                        location.reload();
                    }
                    else {
                        if(lang == "vi")
                            $('#thongbaoguilh').text("Gửi yêu cầu bị lỗi, mời bạn thực hiện lại sau");
                        else
                            $('#thongbaoguilh').text("Request has been error, please do it later");
                    }
                }
            }).done(function (data) {
            });
            return true;
        }

        return true;
    });


    $('#doimatkhau').click(function () {
        matkhaucu = $('#matkhaucu').val();
        matkhaumoi = $('#matkhaumoi').val();
        nhaplaimatkhaumoi = $('#nhaplaimatkhaumoi').val();
        if (matkhaucu == "" || matkhaumoi == "") {
            if(lang == "vi")
                $('#thongbaodoimatkhau').text("Hãy nhập đầy đủ thông tin");
            else
                $('#thongbaodoimatkhau').text("Please enter full information");
            return false;
        }
        else if (matkhaumoi != nhaplaimatkhaumoi) {
            if(lang == "vi")
                $('#thongbaodoimatkhau').text("Mật khẩu nhập lại không trùng khớp");
            else
                $('#thongbaodoimatkhau').text("Repassword entered does not match");
            return false;
        } else {
            $.ajax({
                url: lang + "/controller/doimatkhau",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    "matkhaucu": matkhaucu,
                    "matkhaumoi": matkhaumoi
                },
                success: function (dulieu) {
                    if (dulieu == true) {
                        $('#ModalDoiMatKhau').modal('toggle');
                        if(lang == "vi")
                            alert("Mật khẩu đã được thay đổi");
                        else
                            alert("Password has been changed");
                        $('#matkhaucu').text("");
                        $('#matkhaumoi').text("");
                        $('#nhaplaimatkhaumoi').text("");
                        $('#thongbaodoimatkhau').text("");
                    }
                    else {
                        if(lang == "vi")
                            $('#thongbaodoimatkhau').text("Mật khẩu cũ bị sai, mời bạn nhập lại");
                        else
                            $('#thongbaodoimatkhau').text("Old password entered does not match");
                    }
                }
            }).done(function (data) {
            });
            return true;
        }
        return true;
    });

});