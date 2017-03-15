<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"
     id="ModalBookNow">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content"  style="width: 100%;height: 100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 style="text-align:center;" class="modal-title" id="gridSystemModalLabel">{ThongTinDatCho}</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div><h5><b>{NgayNhanPhong}</b></h5></div>
                    <div>
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' class="form-control" id="date_start"
                                   name="date_start"/>
                            <span class="input-group-addon"><span
                                    class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div style="padding-left: 0px"><h5><b>{NgayTraPhong}</b></h5></div>
                    <div>
                        <div class='input-group date' id='datetimepicker7'>
                            <input type='text' class="form-control" id="date_end"
                                   name="date_end"/>
                            <span class="input-group-addon"><span
                                    class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">{SoLuongPhong}</label>
                    <input type="number" class="form-control" min="1" max="100" step="1" value="1" name="room"
                           id="room">
                </div>
                <div class="form-group">
                    <label for="comment">{NguoiLon}</label>
                    <input type="number" class="form-control" min="1" max="100" step="1" value="1" name="adults"
                           id="adults">
                </div>
                <div class="form-group">
                    <label for="comment">{TreNho}</label>
                    <input type="number" class="form-control" min="0" max="100" step="1" value="0" name="childs"
                           id="childs">
                </div>
                <div class="form-group">
                    <label for="comment">{TheUuDai}</label>
                    <select class="form-control" id="list_voucher">

                    </select>
                </div>
                <div class="form-group">
                    <label for="comment">{GhiChu}</label>
                    <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                </div>
                <input id="resort_id" name="resort_id" value="<?= $resort['id']; ?>" type="hidden">
                <p><span style="color: red;" id="thongbaodatcho"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btn_dangkyknd" name="btn_dangkyknd"class="btn btn-primary">
                       {NutDoiMatKhau}
                    </button>
                    <button type="button" id="btn_thoatdangkyknd" class="btn btn-default" data-dismiss="modal">{Thoat}</button>
                </div>
            </div>
        </div>
        <!-- Modal content -->
    </div>
</div>

<script type="text/javascript" src="<?= BASE_DIR ?>js/moment.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/collapse.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/transition.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/bootstrap-datetimepicker.js"></script>

<script>
    $(document).ready(function () {
        $(function () {
            $('#datetimepicker6').datetimepicker({format: 'YYYY-MM-DD'});
            $('#datetimepicker7').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });


        $('#btn_dangkyknd').click(function () {
            var list_voucher = document.getElementById("list_voucher");
            var voucher = list_voucher.options[list_voucher.selectedIndex].value;
            var room = $('#room').val();
            var resort_id = $('#resort_id').val();
            var date_start = $('#date_start').val();
            var date_end = $('#date_end').val();
            var adults = $('#adults').val();
            var childs = $('#childs').val();
            var note = $('#note').val();

            if (date_start == "" || date_end == "") {
                if(lang == "vi")
                    $('#thongbaodatcho').text("Ngày lấy phòng và trả phòng không được trống");
                else
                    $('#thongbaodatcho').text("Date start and date end not null");
                return false;
            } else {
                $.ajax({
                    url: lang + "/controller/bookKhuNghiDuong",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: {
                        "resort_id": resort_id,
                        "date_start": date_start,
                        "date_end": date_end,
                        "adults": adults,
                        "childs": childs,
                        "note": note,
                        "voucher": voucher,
                        "room": room
                    },
                    success: function (dulieu) {
                        if (dulieu == true) {
                            if(lang == "vi")
                                alert("Đặt chỗ thành công, chúng tôi sẽ liên lạc với bạn");
                            else
                                alert("Book successful, we will contact you");
                            location.reload();
                            $("#ModalBookNow").toggle();
                            $('#thongbaodatcho').text("");
                        }
                        else
                            if(lang == "vi")
                                alert("Thất bại, mời bạn thử lại");
                            else
                                alert("Eror, please do it later");
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>