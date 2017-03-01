<div id="ModalBookNow" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 style="text-align:center;"><b>THÔNG TIN ĐẶT CHỖ</b></h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <div><h5><b>Từ ngày</b></h5></div>
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
                <div style="padding-left: 0px"><h5><b>Đến ngày</b></h5></div>
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
                <label for="comment">Số phòng</label>
                <input type="number" class="form-control" min="0" max="100" step="1" value="0" name="room" id="room">
            </div>
            <div class="form-group">
                <label for="comment">Số người lớn</label>
                <input type="number" class="form-control" min="0" max="100" step="1" value="0" name="adults"
                       id="adults">
            </div>
            <div class="form-group">
                <label for="comment">Số trẻ em</label>
                <input type="number" class="form-control" min="0" max="100" step="1" value="0" name="childs"
                       id="childs">
            </div>
            <div class="form-group">
                <label for="comment">Voucher</label>
                <select class="form-control" id="list_voucher">

                </select>
            </div>
            <div class="form-group">
                <label for="comment">Ghi Chú:</label>
                <textarea class="form-control" rows="5" id="note" name="note"
                          placeholder="Tối đa 200 kí tự"></textarea>
            </div>
            <input id="resort_id" name="resort_id" value="<?= $resort['id']; ?>" type="hidden">
            <p><span style="color: red;" id="thongbaodatcho"></span></p>
            <div class="modal-footer text-right">
                <button type="submit" id="btn_dangkyknd" name="btn_dangkyknd" class="btn btn-default">
                    Xác nhận
                </button>
                <button type="button" id="btn_thoatdangkyknd" class="btn btn-default">Thoát</button>
            </div>
        </div>
    </div>
    <!-- Modal content -->
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
            var modal_book_now = document.getElementById("ModalBookNow");
            var room = $('#room').val();
            var resort_id = $('#resort_id').val();
            var date_start = $('#date_start').val();
            var date_end = $('#date_end').val();
            var adults = $('#adults').val();
            var childs = $('#childs').val();
            var note = $('#note').val();

            if (date_start == "" || date_end == "") {
                $('#thongbaodatcho').text("Ngày lấy phòng và trả phòng không được trống");
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
                        "room":room
                    },
                    success: function (dulieu) {
                        if (dulieu == true) {
                            alert("Thành công");
                            location.reload();
                            modal_book_now.style.display = "none";

                        }
                        else
                            alert("Thất bại, mời bạn thử lại");
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>