$(document).ready(function () {
    $('#btn_dangky').click(function () {
        diaChiEmail = $('#diaChiEmail').val();
        dienthoai = $('#dienthoai').val();
        if (validateEmail(email)) {
        } else {
            $("#thongbao").text(email + " không đúng");
            return false;
        }
        if (diaChiEmail == "" || dienthoai == "") {
            $('#thongbao').text("Hãy nhập đầy đủ thông tin");
            return false;
        }
        if (isNaN(dienthoai)) {
            $('#thongbao').text("Điện thoại phải là số");
            return false;
        }
        return true;
    });

    $('#btnLuuThongTin').click(function () {
        tentaikhoan = $('#tentaikhoan').val();
        diachitaikhoan = $('#diachitaikhoan').val();
        sodienthoaitaikhoan = $('#sodienthoaitaikhoan').val();
        loi = 0;
        if (isNaN(sodienthoaitaikhoan)) {
            loi++;
            $('#thongbaoXemThongTin').text("Điện thoại phải là số");
        }
        if (tentaikhoan == "" || diachitaikhoan == "" || sodienthoaitaikhoan == ""
        ) {
            loi++;
            $('#thongbaoXemThongTin').text("Hãy nhập đầy đủ thông tin");
        }
        if (loi != 0) {
            return false;
        }
        return true;
    });

    $('#btn_gui').click(function () {
        tencongty = $('#ten').val();
        dienthoaicongty = $('#dienthoaicongty').val();
        emailcongty = $('#email').val();
        loiguilh = 0;

        if (tencongty == "" || dienthoaicongty == "" || emailcongty == "") {
            $('#thongbaoguilh').text("Hãy nhập đầy đủ thông tin liên hệ");
            loiguilh++;
        }

        if (loiguilh != 0) {
            return false;
        }
        return true;
    });

    $('#btnQuenMatKhau').click(function () {
        tendangnhapll = $('#tendangnhapll').val();
        sodienthoaitaikhoanll = $('#sodienthoaitaikhoanll').val();
        loiguiqmk = 0;
        if (isNaN(sodienthoaitaikhoanll)) {
            loiguiqmk++;
            $('#thongbaoQuenMatKhau').text("Điện thoại phải là số");
        }
        if (tendangnhapll == "" || sodienthoaitaikhoanll == "") {
            $('#thongbaoQuenMatKhau').text("Hãy nhập đầy đủ thông tin");
            loiguiqmk++;
        }
        if (loiguiqmk != 0) {
            return false;
        }
        return true;
    });

    $('#btn_dangnhap').click(function () {
        tendangnhap = $('#username').val();
        matkhau = $('#password').val();
        if (tendangnhap == "" || matkhau == "") {
            $('#thongbaodn').text("Hãy nhập đầy đủ thông tin");
            return false;
        }
        return true;
    });

    $('#doimatkhau').click(function () {
        matkhaucu = $('#matkhaucu').val();
        matkhaumoi = $('#matkhaumoi').val();
        nhaplaimatkhaumoi = $('#nhaplaimatkhaumoi').val();
        loi = 0;
        if (matkhaucu == "" || matkhaumoi == "") {
            loi++;
            $('#thongbaodoimatkhau').text("Hãy nhập đầy đủ thông tin");
        }
        else {
            if (matkhaumoi != nhaplaimatkhaumoi) {
                loi++;
                $('#thongbaodoimatkhau').text("Mật khẩu nhập lại không trùng khớp");
            }
        }
        if (loi != 0) {
            return false;
        }
        return true;
    });

});