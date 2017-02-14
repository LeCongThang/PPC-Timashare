<?php include 'header.php'; ?>
<script
    src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="padding-left: 0px;padding-right: 0px">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h3 class="title_h3"><?php echo $resort['name']?></h3>
            <div id="Carousel" class="carousel slide" data-ride="carousel" style="height: 555px">
                <div class="carousel-inner" role="listbox">
                    <?php
                    foreach ($listImageResort as $key => $itemImage)
                        if ($key == 0)
                            echo ' <div class="item active"><img style="width: 100%; height: 555px" class="img-responsive" src="' . $itemImage['image'] . '"></div>';
                        else
                            echo ' <div class="item"><img  style="width: 100%; height: 555px" class="img-responsive" src="' . $itemImage['image'] . '"></div>';
                    ?>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" style=" width: 0px; margin-left: -60px;color: black;" href="#Carousel" role="button"
                   data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" style=" width: 0px; margin-right: -60px;color: black;" href="#Carousel"
                   role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div id="content_resort;">
                <ul style="list-style-type: square;padding-left: 15px;">
                    <li><h4 class="h4_content_resort">{GioiThieu}</h4></li>
                    <p><h5 class="h5_content_resort"><?= $resort['introduce'] ?></h5></p>
                    <li><h4 class="h4_content_resort">{Vitri}</h4></li>
                    <p><h5 class="h5_content_resort"><?= $resort['location'] ?></h5></p>
                    <li><h4 class="h4_content_resort">{DichVuLuuTru}</h4></li>
                    <p><h5 class="h5_content_resort"><?= $resort['service'] ?></h5></p>
                    <li><h4 class="h4_content_resort">{ThietBiVaDichVuLuuTru}</h4></li>
                    <p><h5 class="h5_content_resort"><?= $resort['equipment'] ?></h5></p>
                </ul>
            </div>
            <div class="col-md-2 col-md-offset-5" style="margin-top: 20px">
                <button class="btnBookNow" style="margin-top: 0px">{DatCho}</button>
            </div>
            <div class="col-md-12 col-sm-12" id="map_google">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>
<script>
    function initMap() {
        var lat = <?php echo $lat?>;
        var lng = <?php echo $lng?>;
        var uluru = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9yHVNVTaWsVSqiWh5sIpKmCfKLrIiZc0&callback=initMap">
</script>
<?php include 'footer.php'; ?>
