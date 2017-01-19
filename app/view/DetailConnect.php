<?php include 'header.php'; ?>
<script>var lang = '<?=$_SESSION['lang']?>'</script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/paging_deals.js"></script>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <h3 class="title_deals"><?=$deals['title']?></h3>
            <div class="content_deals">
                <p><?=$deals['content']?></p>
            </div>

        </div>
        <img src="">
    </div>
</div>
<?php include 'footer.php'; ?>
