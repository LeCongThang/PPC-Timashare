<?php include 'header.php'; ?>
<script>var lang = '<?=$_SESSION['lang']?>'</script>
<script>var base_dir = '<?=BASE_DIR?>'</script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/paging_announce.js"></script>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h3 class="title_h3">{ThamGia} PPC TIMESHARE</h3>
            <h2 class="title_h2">{ThongCaoBaoChi}</h2>
            <div id="paging_announce">
                <div id="row_announce" ></div>
            </div>
            <div>
                <div class="goPrevious_announce glyphicon glyphicon-triangle-left">Trước  Tiếp theo</div>
                <div class="goNext_announce glyphicon glyphicon-triangle-right"></div></div>
            </div>
        </div>
        <img src="">
    </div>
</div>
<?php include 'footer.php'; ?>
