<?php include 'header.php'; ?>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h2 class="title_h3"><?= mb_strtoupper(LichSuGiaoDich,"UTF-8") ?></h2>
        </div>
        <?php
        foreach ($listTransactionHistory as $key => $transaction) {
            echo '<div class="col-md-12 col-sm-12">';
            echo '<h4><b>'.$transaction['name'].'</b></h4>';
            echo '<h5>'.$transaction['address'].'</h5>';
            echo '<h5><b>{Gia}: </b>';
            echo ($_SESSION['lang']=='en')?$transaction['total_price'].' USD':$transaction['total_price']*$transaction['exchange_rate'].' VND';
            echo '</h5>';
            echo '<h5 style="float:right">'.$transaction['created_at'].'</h5>';
            echo ' <hr style="width:100%;border:1px solid #362516;margin-left:0px;">';
            echo '<div class="col-md-12 col-sm-12" style="padding: 0px;margin-bottom: 5px"><a href="'.BASE_URL.$_SESSION['lang'].'/controller/detailTransaction/'.$transaction['id_book'].'" style="float: right"><span class="a_read_more">{TimHieuThem}</span></a>';
            echo '</div></div>';
        }
        ?>


    </div>
</div>
<?php include 'footer.php'; ?>
