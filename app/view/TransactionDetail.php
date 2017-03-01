<?php include 'header.php'; ?>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12" style="padding-left: 0px">
            <hr class="text-left" style="width:40px;border:2px solid #362416;margin-left:0px;">
            <h2 class="title_h3"><?= mb_strtoupper(LichSuGiaoDich, "UTF-8") ?></h2>
        </div>
        <?php
        echo '<div class="col-md-12 col-sm-6" style="padding-left: 0px">';
        echo '<h3><b>' . $transaction['resort_name'] . '</b></h3>';
        echo '<h4>' . $transaction['address'] . '</h4>';
        echo '<h4><b>{Gia}: </b>';
        echo ($_SESSION['lang'] == 'en') ? $transaction['total_price'] . ' USD' : $transaction['total_price'] * $transaction['exchange_rate'] . ' VND';
        echo '</h4>';
        echo '<ul style="list-style-type: square;padding-left: 15px">';
        echo '<li><h4><b>{NgayNhanPhong}: </b>' . $transaction['start_date'] . '</h4></li>';
        echo '<li><h4><b>{NgayTraPhong}: </b>' . $transaction['end_date'] . '</h4></li>';
        echo '<li><h4><b>{SoLuongPhong}: </b>' . $transaction['room'] . '</h4></li>';
        echo '<li><h4><b>{NguoiLon}: </b>' . $transaction['adults'] . '</h4></li>';
        echo '<li><h4><b>{TreNho}: </b>' . $transaction['childs'] . '</h4></li>';
        echo '<li><h4><b>{TheUuDai}: </b>';
        echo ($is_voucher) ? ($transaction['voucher_name'] . ' - ' . (($_SESSION['lang']=='en')?($transaction['cost'].' USD'):($transaction['cost']*$transaction['exchange_rate'].' VND'))) : '';
        echo '</h4></li>';
        echo '<li><h4><b>{GhiChu}: </b>' . $transaction['note'] . '</h4></li>';
        echo '<li><h4><b>{TrangThai}: </b>';
        if ($transaction['note'] == 0)
            echo ChuaDuyet;
        else if ($transaction['note'] == -1)
            echo HuyBo;
        else
            echo ThanhCong;
        echo '</h4></li>';
        echo '</ul>';
        ?>
    </div>


</div>
</div>
<?php include 'footer.php'; ?>
