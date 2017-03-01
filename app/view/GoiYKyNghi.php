<?php include 'header.php'; ?>
<script>var lang = '<?=$_SESSION['lang']?>'</script>
<script>var base_dir = '<?=BASE_DIR?>'</script>
<script>var base_url = '<?=BASE_URL?>'</script>
<script>var sucessfull = true </script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/paging_resort_hint.js"></script>

<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h3 class="title_h3">{KhuNghiDuongVaGiaCa}</h3>
            <h2 class="title_h2">{GoiYChoKyNghi}</h2>
        </div>
    </div>

    <div class="row">
        <div id="paging_hint" style="margin-bottom: 40px">
            <div id="row_hint"></div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
