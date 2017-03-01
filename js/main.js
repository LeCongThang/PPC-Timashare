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
            $('#annouce_change_newpass').text("Hãy nhập đầy đủ thông tin");
        }
        else {
            if (matkhaumoi != nhaplaimatkhaumoi) {
                loi++;
                $('#annouce_change_newpass').text("Mật khẩu nhập lại không trùng khớp");
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
            $('#thongbaoguilh').text("Hãy nhập đầy đủ thông tin liên hệ");
            return false;
        } else if (isNaN(dienthoaicongty)) {
            $('#thongbaoguilh').text("Điện thoại phải là số");
            return false;
        } else if (!validateEmail(emailcongty)) {
            $("#thongbaoguilh").text("Email không đúng");
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
                    if (dulieu == true)
                        alert("Liên hệ đã được gửi tới ban quản trị");
                    else {
                        $('#thongbaoguilh').text("Gửi liên hệ bị lỗi, xin bạn gửi lại sau");
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
        var modal_doi = document.getElementById("ModalDoiMatKhau");
        if (matkhaucu == "" || matkhaumoi == "") {
            $('#thongbaodoimatkhau').text("Hãy nhập đầy đủ thông tin");
            return false;
        }
        else if (matkhaumoi != nhaplaimatkhaumoi) {
            $('#thongbaodoimatkhau').text("Mật khẩu nhập lại không trùng khớp");
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
                        modal_doi.style.display = "none";
                        alert("Mật khẩu đã được thay đổi");
                    }
                    else {
                        $('#thongbaodoimatkhau').text("Mật khẩu cũ bị sai mời bạn nhập lại");
                    }
                }
            }).done(function (data) {
            });
            return true;
        }
        return true;
    });

});