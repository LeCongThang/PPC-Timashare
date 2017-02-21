<hr class="text-left" style="width:100%;border:2px solid #362516;margin-left:0px;margin-bottom:0px;">
<div class="container">
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

        $('.trogiup').click(function () {
            $("#tro_giup").toggle();
        });
        $('.cauhoi a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });

        // start submit search type and sort by resort
        $("#sort_by").change(function () {
            resort_sort.submit();
        });
        $("#resort_type").change(function () {
            resort_sort.submit();
        });
        // end submit search type and sort by resort

        // start code toggle question
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

        // end code toggle question

        //All Modal
        var mainModal = "" ;
        var modal = document.getElementById('ModalDangNhap');
        var modaldangky = document.getElementById('ModalDangKy');
        var modalxemthongtin = document.getElementById('ModalXemThongTin');
        var modalquenmatkhau = document.getElementById('ModalQuenMatKhau');
        var modaldatcho = document.getElementById('ModalBookNow');
        var modaldoimatkhau = document.getElementById('ModalDoiMatKhau');
        var btn = document.getElementById('btnDangNhap');
        var btnDatCho = document.getElementById('btnDatCho');

        $('#hrefDoiMatKhau').click(function (e) {
            e.preventDefault();
            mainModal = modaldoimatkhau;
            mainModal.style.display = "block";
            $('#thongbaodoimatkhau').text("");
            e.preventDefault();
            return false;
        });


        if (btnDatCho != null) {
            btnDatCho.onclick = function () {
                mainModal = modaldatcho;
                mainModal.style.display = "block";
                $('#thongbaodatcho').text("");
                return true;
            }
        }

        if (btn != null) {
            btn.onclick = function () {
                mainModal = modal;
                mainModal.style.display = "block";
                $('#thongbaodn').text("");
                return true;
            }
        }


        $('#hrefdangky').click(function () {
            mainModal = modaldangky;
            mainModal.style.display = "block";
            $('#thongbao').text("");
            return false;
        });

        $('#hrefXemThongTin').click(function () {
            mainModal = modalxemthongtin;
            mainModal.style.display = "block";
            $('#thongbao').text("");
            return false;
        });

        $('#hrefquenmatkhau').click(function () {
            mainModal = modalquenmatkhau;
            mainModal.style.display = "block";
            modalquenmatkhau.style.display = "block";
            return false;
        });

        $('#btnthoatdoimatkhau').click(function () {
            mainModal.style.display = "none";
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


        $('#btnHuyThongTin').click(function () {
            mainModal.style.display = "none";
        });

        $('#btn_thoatdangkyknd').click(function () {
            mainModal.style.display = "none";
            $('#thongbaodn').text("");
        });

    });


</script>
</body>
</html>