<div id="ModalBookNow" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="closeModalBookNow"><span class="glyphicon glyphicon-remove"></span></div>
            <h3 style="text-align:center;"><b>THÔNG TIN BOOK NOW</b></h3>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_URL ?>controller/dangKy" method="POST">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker5'>
                        <input type='text' class="form-control"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
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