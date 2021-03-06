<hr class="text-left" style="width:100%;border:2px solid #362516;margin-left:0px;margin-bottom:0px;">
<footer>
    <div class="container">
        <div class="row" style="margin-left: 0px">
            <div class="footer1">
                <div class="col-lg-3 text-left">
                    <div class="footerlogo" class="img-responsive">
                        <img src="<?= BASE_DIR ?>img/ppctimeshare.png">
                    </div>
                </div>
                <div class="dc col-lg-4" style="margin-top: 80px">
                    <p>PPC Timeshare</p>
                    <p>Lầu 3 tòa nhà Jabes 1, 244 Cống Quỳnh,</p>
                    <p>P. Phạm Ngũ Lão, Quận 1, Tp HCM</p>
                    <p>Hotline: +84903818687</p>
                </div>
                <div class="sdt col-lg-4" style="margin-top: 80px">
                    <p>PPC Timeshare</p>
                    <p>42 Broadway Suite 12-233 New York City, NY 10004</p>
                    <p>Phone: +13479919999</p>
                    <p>Email: info@ppctimeshare.com</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-9" >
                <div class="text-right">
                    <p>
                        <a href="#"><img src="<?= BASE_DIR ?>img/social1.png"></a>
                        <a href="#"><img src="<?= BASE_DIR ?>img/social2.png"></a>
                        <a href="#"><img src="<?= BASE_DIR ?>img/social3.png"></a>
                        <a href="#"><img src="<?= BASE_DIR ?>img/social4.png"></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3"><p style="padding-left: 15px"><b>Copyright ©2016 PPC TimeShare. All Rights Reserved.</b></p></div>
        </div>
    </div>
</footer>


<script type="text/javascript">

    $(document).ready(function () {
        $(".trogiup").click(function (e) {
            $("#tro_giup").toggle();
            e.stopPropagation();
            e.preventDefault();
        });

        $('.cauhoi a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
        $(document).on('change', "#sort_by", function () {
            var sort_by_select = document.getElementById("sort_by");
            var sort_by = sort_by_select.options[sort_by_select.selectedIndex].value;
            var resort_type_select = document.getElementById("resort_type");
            var resort_type = resort_type_select.options[resort_type_select.selectedIndex].value;
            if (sort_by != "" && resort_type != "") {
                $.ajax({
                    url: '<?=isset($link) ? $link : ""?>',
                    type: "POST",
                    cache: false,
                    data: {
                        "sort_by": sort_by,
                        "resort_type": resort_type
                    },
                    success: function (dulieu) {
                        $("#resort_directory_main").html(dulieu);
                    }
                }).done(function (data) {
                });
                return true;
            }
        });

        $(document).on('change', "#resort_type", function () {
            var sort_by_select = document.getElementById("sort_by");
            var sort_by = sort_by_select.options[sort_by_select.selectedIndex].value;
            var resort_type_select = document.getElementById("resort_type");
            var resort_type = resort_type_select.options[resort_type_select.selectedIndex].value;
            if (sort_by != "" && resort_type != "") {
                $.ajax({
                    url: '<?=isset($link) ? $link : ""?>',
                    type: "POST",
                    cache: false,
                    data: {
                        "sort_by": sort_by,
                        "resort_type": resort_type
                    },
                    success: function (dulieu) {
                        $("#resort_directory_main").html(dulieu);
                    }
                }).done(function (data) {
                });
                return true;
            }
        });

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



        $('#hrefquenmatkhau').click(function () {
            $("#ModalDangNhap").modal('hide');
            $("#ModalQuenMatKhau").modal();
            $('#thongbaoQuenMatKhau').text("");
            return false;
        });


        $('#hrefdangky').click(function () {
            $("#ModalDangNhap").modal('hide');
            $("#ModalDangKy").modal();
            $('#thongbao').text("");
            return false;
        });

        $('.dangNhap').click(function () {
            $("#ModalDangNhap").modal();
            $('#thongbaodn').text("");
            return true;
        });

        $('.matkhau').click(function () {
            $('#thongbaodoimatkhau').text("");
            $("#ModalDoiMatKhau").modal();
            return false;
        });
        $("#btnDatCho").click(function () {
            var is_login = <?php echo isset($_SESSION['tendangnhap']) ? "true" : "false"?>;

            if (is_login == true) {
                $.ajax({
                    url: '<?= $_SESSION['lang']?>' + '/controller/getListDiscount',
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: {
                        "id": '<?= isset($_SESSION['id']) ? $_SESSION["id"] : ""?>'
                    },
                    success: function (dulieu) {

                    }
                }).done(function (data) {
                    var list_voucher = document.getElementById("list_voucher");
                    for (i = 0; i < list_voucher.length; i++) {
                        list_voucher.remove(i);
                    }
                    var option = document.createElement("option");
                    option.text = "";
                    option.value = 0;
                    option.id = 0;
                    list_voucher.add(option);
                    if (data.length > 0) {

                        $.each(data, function (i, val) {
                            var option = document.createElement("option");
                            option.text = val.name + " - " + val.cost + " USD";
                            option.value = val.id;
                            option.id = val.id;
                            list_voucher.add(option);
                        });
                    }

                    $("#ModalBookNow").modal();
                    $('#thongbaodatcho').text("");
                });
            }
            else {
                if (lang == "vi")
                    alert("Mời bạn đăng nhập trước khi đặt chỗ");
                else
                    alert("Please login before book ");
            }
            $("#ModalDangNhap").modal();
            $('#thongbaodn').text("");
            return true;
        });

        $('.thongtin').click(function () {
            $.ajax({
                url: '<?= $_SESSION['lang']?>' + '/controller/getProFile',
                type: "POST",
                cache: false,
                data: {
                    "id": '<?= isset($_SESSION['id']) ? $_SESSION["id"] : ""?>'
                },
                success: function (dulieu) {
                    $("#layoutXemThongTin").html(dulieu);
                }
            }).done(function (data) {
                $("#ModalXemThongTin").modal();
                $('#thongbao').text("");
            });

            return false;
        });
    });

</script>

</html>