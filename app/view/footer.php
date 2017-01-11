<div class="container" >
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="footer1">
                    <div class="col-lg-3 text-center" style="margin-bottom: 5%">
                        <div class="footerlogo" class="img-responsive">
                            <img src="<?= BASE_URL ?>/img/logo.png">
                        </div>
                    </div>
                    <div class="dc col-lg-4">
                        <p>Perfect Property Company Vietnam</p>
                        <p>Lầu 3 tòa nhà Jabes 1, 244 Cống Quỳnh,</p>
                        <p>P. Phạm Ngũ Lão, Quận 1, Tp HCM</p>
                        <p>Hotline: 0988 084 009</p>
                    </div>
                    <div class="sdt col-lg-5">
                        <p>Perfect Property Company USA</p>
                        <p>42 Broadwat Suit 12-233 New York, NY 10004</p>
                        <p>Phone: 917 831 0562</p>
                        <p>Email: info@perfectproperties.vn</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#cauhoi').click(function () {
            $("#cau_hoi_thuong_gap").toggle();
        });
        $('#cachsudung').click(function () {
            $("#cach_su_dung").toggle();
        });
        var mainModal;
        var modalThemKND = document.getElementById('ModalThemKND');
        var modalXemThongTin = document.getElementById('ModalXemThongTin');
        var modaldoimatkhau = document.getElementById('ModalDoiMatKhau');
        var ModalBookNow = document.getElementById('ModalBookNow');


//        $('#btn_gui').click(function () {
//            tencongty = $('#ten').val();
//            dienthoaicongty = $('#dienthoaicongty').val();
//            emailcongty = $('#email').val();
//            loiguilh = 0;
//
//            if (tencongty == "" || dienthoaicongty == "" || emailcongty == "") {
//                $('#thongbaoguilh').text("Hãy nhập đầy đủ thông tin liên hệ");
//                loiguilh++;
//            }
//
//            if (loiguilh != 0) {
//                return false;
//            }
//            return true;
//        });

//        $('#btnQuenMatKhau').click(function () {
//            tendangnhapll = $('#tendangnhapll').val();
//            sodienthoaitaikhoanll = $('#sodienthoaitaikhoanll').val();
//            loiguiqmk = 0;
//            if (isNaN(sodienthoaitaikhoanll)) {
//                loiguiqmk++;
//                $('#thongbaoQuenMatKhau').text("Điện thoại phải là số");
//            }
//            if (tendangnhapll == "" || sodienthoaitaikhoanll == "") {
//                $('#thongbaoQuenMatKhau').text("Hãy nhập đầy đủ thông tin");
//                loiguiqmk++;
//            }
//            if (loiguiqmk != 0) {
//                return false;
//            }
//            return true;
//        });

//        $('#btn_dangnhap').click(function () {
//            tendangnhap = $('#username').val();
//            matkhau = $('#password').val();
//            if (tendangnhap == "" || matkhau == "") {
//                $('#thongbaodn').text("Hãy nhập đầy đủ thông tin");
//                return false;
//            }
//            return true;
//        });

//        $('#doimatkhau').click(function () {
//            matkhaucu = $('#matkhaucu').val();
//            matkhaumoi = $('#matkhaumoi').val();
//            nhaplaimatkhaumoi = $('#nhaplaimatkhaumoi').val();
//            loi = 0;
//            if (matkhaucu == "" || matkhaumoi == "") {
//                loi++;
//                $('#thongbaodoimatkhau').text("Hãy nhập đầy đủ thông tin");
//            }
//            else {
//                if (matkhaumoi != nhaplaimatkhaumoi) {
//                    loi++;
//                    $('#thongbaodoimatkhau').text("Mật khẩu nhập lại không trùng khớp");
//                }
//            }
//            if (loi != 0) {
//                return false;
//            }
//            return true;
//        });

        $('#btnThem').click(function (e) {
            e.preventDefault();
            var diachixemthongtin = "/ppctimeshare/controller/layDanhSachLoaiDichVu/";
            $.ajax({
                url: diachixemthongtin, cache: false,
                success: function (dulieuxemthongtin) {
                    //$("#themkhunghiduong").html(dulieuxemthongtin);
                    mainModal = modalThemKND;
                    mainModal.style.display = "block";
                }
            })
            e.preventDefault();
            return true;
        });
        $('#hrefXemThongTin').click(function (e) {
            e.preventDefault();
            if (<?php echo isset($_SESSION['tendangnhap']) ? 'true' : 'false'; ?>) {
                var diachixemthongtin = "/ppctimeshare/controller/xemthongtincanhan/";
                $.ajax({
                    url: diachixemthongtin, cache: false,
                    success: function (dulieuxemthongtin) {
                        //$("#thongtincanhan").html(dulieuxemthongtin);
                        mainModal = modalXemThongTin
                        mainModal.style.display = "block";
                    }
                });
            }
            else {
                alert('Mời bạn đăng nhập trước khi book khu nghỉ dưỡng');
            }
            $('#thongbaodoimatkhau').text("");
            e.preventDefault();
            return false;
        });

        $('#hrefDoiMatKhau').click(function (e) {
            e.preventDefault();
            mainModal = modaldoimatkhau;
            mainModal.style.display = "block";
            $('#thongbaodoimatkhau').text("");
            e.preventDefault();
            return false;
        });



        window.onclick = function (event) {
            if (event.target == mainModal) {
                mainModal.style.display = "none";
            }
        }

        $('#btnthoatdoimatkhau').click(function () {
            mainModal.style.display = "none";
        });

        $('#btn_thoatdangkyknd').click(function () {
            mainModal.style.display = "none";
        });

        $('#btnHuyThongTin').click(function (e) {
            mainModal.style.display = "none";
        });

        $('#btnThoatThemKND').click(function (e) {
            mainModal.style.display = "none";
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $(".dropdown img.flag").addClass("flagvisibility");

        $(".dropdown dt a").click(function () {
            $(".dropdown dd ul").toggle();
        });

        $(document).bind('click', function (e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdown"))
                $(".dropdown dd ul").hide();
        });
        $(".dropdown img.flag").toggleClass("flagvisibility");

        //All Modal
        var mainModal;
        var modal = document.getElementById('ModalDangNhap');
        var modaldangky = document.getElementById('ModalDangKy');
        var modalquenmatkhau = document.getElementById('ModalQuenMatKhau');
        var btn = document.getElementById('btnDangNhap');

        btn.onclick = function () {
            mainModal = modal;
            mainModal.style.display = "block";
            $('#thongbaodn').text("");
        }


        $('#hrefdangky').click(function () {
            mainModal.style.display = "none";
            mainModal = modaldangky;
            mainModal.style.display = "block";
            $('#thongbao').text("");
            return false;
        });

        $('#hrefquenmatkhau').click(function () {
            mainModal.style.display = "none";
            mainModal = modalquenmatkhau;
            mainModal.style.display = "block";
            modalquenmatkhau.style.display = "block";
            return false;
        });


        //-------------------------------------------------------------------------------------------------------------------
        // Button X in modal
        var span = document.getElementsByClassName("close")[0];// X for Modal dang ky

        span.onclick = function () {
            mainModal.style.display = "none";
            $('#thongbaodn').text("");
        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == mainModal) {
                mainModal.style.display = "none";
                $('#thongbaodn').text("");
                $('#thongbao').text("");
                $('#thongbaodoimatkhau').text("");
                //
                //
            }
        }

        //Button close Modal
        $('#btn_close').click(function () {
            mainModal.style.display = "none";
            $('#thongbaodn').text("");
        });

        $('#btn_thoatdangky').click(function () {
            mainModal.style.display = "none";
            $('#thongbao').text("");
        });

        $('#btnThoatQuenMatKhau').click(function () {
            mainModal.style.display = "none";
        });

        $('#btn_thoatdangkyknd').click(function () {
            mainModal.style.display = "none";
        });


    });
</script>

<script type="text/javascript">

</script>
</body>
</html>