<?php include 'header.php'; ?>
<script>var lang = '<?=$_SESSION['lang']?>'</script>
<script>var base_dir = '<?=BASE_DIR?>'</script>
<script>var base_url = '<?=BASE_URL?>'</script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/paging_discover.js"></script>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h3 class="title_h3">{KhuNghiDuongVaGiaCa}</h3>
            <h2 class="title_h2">{KhamPhaCacDiaDiem}</h2>
        </div>
    </div>

    <div class="row">
        <div id="paging_discover" style="margin-bottom: 40px">
            <div id="row_discover"></div>
        </div>
    </div>

    <!--            <div >-->
    <!--                <div class="goPrevious_connect glyphicon glyphicon-triangle-left">Trước Tiếp theo</div>-->
    <!--                <div class="goNext_connect glyphicon glyphicon-triangle-right"></div>-->
    <!--            </div>-->


</div>
<?php include 'footer.php'; ?>
