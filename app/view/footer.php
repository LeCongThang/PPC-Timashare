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
<script type="text/javascript">
    $(document).ready(function () {
        var modalXemThongTin = document.getElementById('ModalXemThongTin');
        var modaldoimatkhau = document.getElementById('ModalDoiMatKhau');
        var ModalBookNow = document.getElementById('ModalBookNow');
        $('#hrefXemThongTin').click(function (e) {
            e.preventDefault();
            if (<?php echo isset($_SESSION['tendangnhap']) ? 'true' : 'false'; ?>) {
                var diachixemthongtin = "/ppctimeshare/controller/xemthongtincanhan/";
                $.ajax({
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

        $('#hrefDoiMatKhau').click(function (e) {
            e.preventDefault();
            modaldoimatkhau.style.display = "block";
            $('#thongbaodoimatkhau').text("");
            e.preventDefault();
            return false;
        });
        var btnBookNow = document.getElementById("btnBookNow");
        btnBookNow.onclick = function () {
            if (<?php echo isset($_SESSION['tendangnhap']) ? 'true' : 'false'; ?>) {
                ModalBookNow.style.display = "block";
            }
            else {
                alert('Mời bạn đăng nhập trước khi book khu nghỉ dưỡng');
            }
            return false;
        }

        $('#btnHuyThongTin').click(function () {
            modalXemThongTin.style.displafy = "none";
        });

        $('#btnthoatdoimatkhau').click(function () {
            modaldoimatkhau.style.display = "none";
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        //All Modal
        var mainModal;
        var modal = document.getElementById('ModalDangNhap');
        var modaldangky = document.getElementById('ModalDangKy');
        var modalquenmatkhau = document.getElementById('ModalQuenMatKhau');
        // All Button open modal
        var btn = document.getElementById("btnDangNhap");

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
//        var closeModalBookNow = document.getElementsByClassName("closeModalBookNow")[0];
//        var closeModalDoiMatKhau = document.getElementsByClassName("closeModalDoiMatKhau")[0];
//        var closeModalQuenMatKhau = document.getElementsByClassName("closeModalQuenMatKhau")[0];
//        var closeXemThongTinCaNhan = document.getElementsByClassName("closeXemThongTinCaNhan")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            mainModal.style.display = "none";
            $('#thongbaodn').text("");
        }

//        closeModalBookNow.onclick = function () {
//            mainModal.style.display = "none";
//        }
//
//        closeModalDoiMatKhau.onclick = function () {
//            mainModal.style.display = "none";
//        }
//
//        closeModalQuenMatKhau.onclick = function () {
//            mainModal.style.display = "none";
//        }
//
//        closeXemThongTinCaNhan.onclick = function () {
//            mainModal.style.display = "none";
//        }

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


</body>
</html>