<div class="container">
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="footer1">
                    <div class="col-lg-3 text-center">
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
<!-- <script type="text/javascript" >
        $(document).ready(function () {
            $('#dangky').click(function () {
                $('#thongbao').text("Hãy nhập đầy đủ thông tin");
                tendangnhap = $('#tendangnhap').val();
                matkhau = $('#matkhau').val();
                nhaplaimatkhau = $('#nhaplaimatkhau').val();
                hoten = $('#hoten').val();
                diachi = $('#diachi').val();
                dienthoai = $('#dienthoai').val();

                loi = 0;
                if (tendangnhap == "" || matkhau == "" || hoten == ""
                    || diachi == "" || dienthoai == "") {
                    loi++;
                    $('#thongbao').text("Hãy nhập đầy đủ thông tin");
                }

                if (matkhau != nhaplaimatkhau) {
                    loi++;
                    $('#thongbao').text("Mật khẩu nhập lại không trùng khớp");
                }

                if (isNaN(dienthoai)) {
                    loi++;
                    $('#thongbao').text("Điện thoại phải là số");
                }

                if (loi != 0) {
                    return false;
                }
            });
            $('#btn_dangnhap').click(function () {
                tendangnhap = $('#username').val();
                matkhau = $('#password').val();
                if (tendangnhap == "" || matkhau == "" ) {
                    $('#thongbaodn').text("Hãy nhập đầy đủ thông tin");
                    return false;
                }
                return true;
            });
        });
</script> -->

<script type="application/javascript">

    var modalthongtincanhan = document.getElementById('ModalXemThongTin');
    var spanclosexemthongtin = document.getElementsByClassName("closexemthongtin")[0];
    var modaldoimatkhau = document.getElementById('ModalDoiMatKhau');

    $('#btnHuyThongTin').click(function () {
        modalthongtincanhan.style.display = "none";
    });

    $('#btnthoatdoimatkhau').click(function () {
        modaldoimatkhau.style.display = "none";
    });

    window.onclick = function (event) {
        if (event.target == modalthongtincanhan) {
            modalthongtincanhan.style.display = "none";
        }
        if (event.target == modaldoimatkhau) {
            modaldoimatkhau.style.display = "none";
        }
    }
    spanclosexemthongtin.onclick = function () {
        modalthongtincanhan.style.display = "none";
    }
</script>

<script type="text/javascript">

    // Model dang nhap
    // Get the modal
    var modal = document.getElementById('ModalDangNhap');
    var modaldangky = document.getElementById('ModalDangKy');

    var modalquenmatkhau = document.getElementById('ModalQuenMatKhau');
    var modalXemThongTin = document.getElementById('ModalXemThongTin');
    // Get the button that opens the modal
    var btn = document.getElementById("btnDangNhap");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        $('#thongbaodn').text("");
    }

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
        $('#thongbaodn').text("");
    }

    $('#hrefdangky').click(function () {
        if (modal.style.display = "block") {
            modal.style.display = "none";
            $('#thongbaodn').text("");
        }
        modaldangky.style.display = "block";
        $('#thongbao').text("");
        return false;
    });


    $('#hrefquenmatkhau').click(function () {
        if (modal.style.display = "block") {
            modal.style.display = "none";
            $('#thongbaodn').text("");
        }
        modalquenmatkhau.style.display = "block";
        return false;
    });


    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            $('#thongbaodn').text("");
        }
        if (event.target == modaldangky) {
            modaldangky.style.display = "none";
            $('#thongbao').text("");
        }
        if (event.target == modaldoimatkhau) {
            modaldoimatkhau.style.display = "none";
            $('#thongbaodoimatkhau').text("");
        }
        if (event.target == modalquenmatkhau) {
            modalquenmatkhau.style.display = "none";
        }

        if (event.target == modalXemThongTin) {
            modalXemThongTin.style.display = "none";
        }
    }



    $('#btn_close').click(function () {
        modal.style.display = "none";
        $('#thongbaodn').text("");
    });

    $('#btn_thoatdangky').click(function () {
        modaldangky.style.display = "none";
        $('#thongbao').text("");
    });




    $('#btnHuyThongTin').click(function () {
        modalXemThongTin.style.display = "none";
    });


    // end modal dang nhap

</script>

<script type="application/javascript">
    $(document).ready(function () {
        <!--Book now-->
        var btnBookNow = document.getElementById("btnBookNow");
        var modaldoimatkhau = document.getElementById('ModalDoiMatKhau');

        btnBookNow.onclick = function (e) {
            e.preventDefault();
            if (<?php echo isset($_SESSION['tendangnhap']) ? 'true' : 'false'; ?>) {
                var idkhunghiduong = $('#idkhunghiduong').val();
                var diachi = "/ppctimeshare/controller/booknow/" + idkhunghiduong;
                $.ajax({
                    url: diachi, cache: false,
                    success: function (dulieu) {
                    }
                });
            }
            else {
                alert('Mời bạn đăng nhập trước khi book khu nghỉ dưỡng');
            }
            e.preventDefault();
        }



        $('#hrefDoiMatKhau').click(function (e) {
            e.preventDefault();
            modaldoimatkhau.style.display = "block";
            $('#thongbaodoimatkhau').text("");
            e.preventDefault();
            return false;
        });

        var modalXemThongTin = document.getElementById('ModalXemThongTin');
        $('#hrefXemThongTin').click(function (e) {
            e.preventDefault();
            if (<?php echo isset($_SESSION['tendangnhap']) ? 'true' : 'false'; ?>) {
                //var idsp = 1;
                //alert('T');
                var diachixemthongtin = "/ppctimeshare/controller/xemthongtincanhan/";
                $.ajax({
                    //type : "POST",
                    url: diachixemthongtin, cache: false,
                    success: function (dulieuxemthongtin) {
                        $("#thongtincanhan").html(dulieuxemthongtin);
                        modalXemThongTin.style.display = "block";
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
    });
</script>


</body>
</html>