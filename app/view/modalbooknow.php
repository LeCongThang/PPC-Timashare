<div id="ModalBookNow" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="closeModalBookNow"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>THÔNG TIN ĐẶT CHỖ</b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL . $_SESSION['lang'] ?>/controller/bookKhuNghiDuong" method="POST">
                <div class="form-group">
                    <div><h5><b>Từ ngày</b></h5></div>
                    <div>
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' class="form-control"
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
                            <input type='text' class="form-control"
                                   name="date_end"/>
                            <span class="input-group-addon"><span
                                    class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Số phòng</label>
                    <input type="number" class="form-control" min="0" max="100" step="1" value="0">
                </div>
                <div class="form-group">
                    <label for="comment">Số người lớn</label>
                    <input type="number" class="form-control" min="0" max="100" step="1" value="0">
                </div>
                <div class="form-group">
                    <label for="comment">Số trẻ em</label>
                    <input type="number" class="form-control" min="0" max="100" step="1" value="0">
                </div>
                <div class="form-group">
                    <label for="comment">Ghi Chú:</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment"
                              placeholder="Tối đa 200 kí tự"></textarea>
                </div>
                <p><span style="color: red;" id="thongbaodatcho"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btn_dangkyknd" name="dangky" class="btn btn-default">
                        Xác nhận
                    </button>
                    <button type="button" id="btn_thoatdangkyknd" class="btn btn-default">Thoát</button>
                </div>
            </form>
        </div>

    </div>
    <!-- Modal content -->
</div>
<script src="<?= BASE_DIR ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/moment.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/collapse.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/transition.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/bootstrap-min.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/bootstrap-datetimepicker.js"></script>

<script>
    $(document).ready(function () {
        $(function () {
            var modaldatcho = document.getElementById('ModalBookNow');
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
    });
</script>