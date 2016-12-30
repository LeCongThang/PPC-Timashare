<?php include 'header.php'; ?>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h2>CHI TIẾT KHU NGHỈ DƯỠNG</h2>
        </div>
        <div class="col-md-6 col-sm-12">
            <img src="<?php echo BASE_DIR.$knd['link']; ?>" style="width:100%;">
        </div>
        <div class="col-md-6 col-sm-12">
            <h2><b><?php echo $knd['ten']; ?></b></h2>
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <br>
            <p id="van_ban"> <?php echo $knd['thongtin']; ?></p>
            <p id="van_ban"> <?php echo $knd['diachi']; ?></p>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
