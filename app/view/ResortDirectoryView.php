<script>var lang = '<?=$_SESSION['lang']?>'</script>
<script>var base_dir = '<?=BASE_DIR?>'</script>
<script>var base_url = '<?=BASE_URL?>'</script>
<script>var tim_hieu_them = '{TimHieuThem}'</script>
<script>var id = <?= $id ?></script>
<script>var id_city = <?php if (!isset($this->params[1])) echo 0; else echo $id_city; ?></script>
<script>var resort_type = <?= $resort_type ?></script>
<script>var sort_by = <?= $sort_by ?> </script>

<?php
$isWorld = isset($this->params[0]);
$isCountry = isset($this->params[1]);
$link = BASE_URL . $_SESSION['lang'] . "/controller/directResortDriectoryView";
if (!$isWorld) {
    echo '<script type="text/javascript" src="' . BASE_DIR . 'js/paging_resort.js"></script>';
} else {
    if (!$isCountry) {
        $link = $link . "/" . $this->params[0];
        echo '<script type="text/javascript" src="' . BASE_DIR . 'js/paging_resort_id.js"></script>';
    } else {
        $link = $link . "/" . $this->params[0] . "/" . $this->params[1];
        echo '<script type="text/javascript" src="' . BASE_DIR . 'js/paging_resort_city.js"></script>';
    }
}
?>

<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h2 class="title_h2">{KhuNghiDuongVaGiaCa}</h2>
            <h3 class="title_h3">{DanhMucKhuNghiDuong1}</h3>
            <form method="post" action="<?= $link ?>" name="resort_sort">
                <div class="form-group">
                    <label for="resort_type">{Loai}: </label>
                    <select class="form-control" id="resort_type" name="resort_type">
                        <option value="0" <?php echo $resort_type == 0 ? 'selected="selected"' : '' ?>>{TatCa}
                        </option>
                        <option value="1" <?php echo $resort_type == 1 ? 'selected="selected"' : '' ?>>
                            {KhuNghiDuong2}
                        </option>
                        <option value="2" <?php echo $resort_type == 2 ? 'selected="selected"' : '' ?>>{HomeShare}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sort_by">{SapXepTheo}: </label>
                    <select class="form-control" id="sort_by" name="sort_by">
                        <option value="0" <?php echo $sort_by == 0 ? 'selected="selected"' : '' ?>>{TatCa}</option>
                        <option value="1" <?php echo $sort_by == 1 ? 'selected="selected"' : '' ?>>{Moi}</option>
                        <option value="2" <?php echo $sort_by == 2 ? 'selected="selected"' : '' ?>>{KhuyenMai}
                        </option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel-border">
                <h4 style="background: #362416 !important;color: white;padding-top: 15px;padding-bottom: 15px;padding-left: 10px;margin-bottom: 0px">
                    <b>{KhuVuc}</b></h4>
                <div class="dimAlignments" style="background: #E8E7E5 !important;">
                    <ul id="dimListPrim"
                        style=" list-style:none;padding-left: 15px;margin-top: 0px;padding-top: 10px;padding-bottom: 10px">
                        <?php
                        if (!$isWorld) {
                            foreach ($listContinents as $key => $continent) {
                                if ($listCoutinentsNumber[$key] != 0) {
                                    echo '<li class="cauhoi" style="margin: 5px"><a class="test" href="#" onclick="return false;" ><span class="link_tim_hieu" style="color: #640100;">' . $continent['name'] . ' (';
                                    echo $listCoutinentsNumber[$key];
                                    echo ')</span></a><ul class="cautraloi" style="display: none;padding-left:35px;" >';
                                    foreach ($regions[$continent['id'] - 1] as $key2 => $region) {
                                        if ($listRegionNumber[$key][$key2] != 0 ) {
                                            echo '<li style="margin-top: 5px;margin-bottom: 5px;"  class="noi_dung_link_tim_hieu"><a href="' . BASE_DIR . $_SESSION['lang'] . '/controller/chuyenTrangKhuNghiDuongGiaCa/' . $region['id'] . '" style="color:#3C2A1D;" >' . $region['name'] . '(';
                                            echo $listRegionNumber[$key][$key2];
                                            echo ')</a></li>';
                                        }
                                    }
                                }

                                echo '</ul></a>';
                            }
                        } else {
                            if (!$isCountry) {
                                echo '<li class="cauhoi" style="margin: 5px"><a class="test" href="#" onclick="return false;" ><span class="link_tim_hieu" style="color: #640100;">' . $country_name . '(' . $countryNumber . ')</span></a><ul class="cautraloi" style="display: none;padding-left:35px;" >
                                ';
                                foreach ($listCity as $key => $city) {
                                    if($listCityNumber[$key] != 0)
                                        echo '<li style="margin-top: 5px;margin-bottom: 5px;"  class="noi_dung_link_tim_hieu"><a href="' . BASE_DIR . $_SESSION['lang'] . '/controller/chuyenTrangKhuNghiDuongGiaCa/' . $id . '/' . $city['id'] . '" style="color:#3C2A1D;" >' . $city['name'] . ' (' . $listCityNumber[$key] . ')</a></li>';
                                }
                            } else
                                echo $name_city . '(' . $cityNumber . ')';
                        }
                        ?>
                    </ul>
                </div>

            </div>

        </div>
        <div class="col-md-8 col-sm-8">
            <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                <ul class="nav nav-tabs" id="myTabs" role="tablist"
                    style="background: #362416 !important;color: white;padding-top: 5px;padding-bottom: 5px;padding-left: 5px;margin-bottom: 0px;margin-top: 10px">
                    <li role="presentation" class="active"><a href="#vi" id="vi-tab" role="tab"
                                                              data-toggle="tab"
                                                              aria-controls="gioithieu_vi"
                                                              aria-expanded="true">
                            <i class="glyphicon glyphicon-map-marker"></i>
                        </a></li>
                    <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                        data-toggle="tab"
                                                        aria-controls="gioithieu_en"
                                                        aria-expanded="false">
                            <i class="glyphicon glyphicon-th-list"></i></a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" role="tabpanel" id="vi"
                         aria-labelledby="vi-tab">
                        <div class="box-body">
                            <div id="map" style="height: 500px;"></div>

                        </div>
                    </div>

                    <div class="tab-pane fade " role="tabpanel" id="en" aria-labelledby="en-tab">
                        <div class="box-body" style="margin-top: 15px;">
                            <?php if (!$isWorld)
                                echo '<div id="paging_announce" style="margin-bottom: 40px"><div id="row_announce"></div></div>';
                            else {
                                if (!$isCountry)
                                    echo '<div id="paging_resort" style="margin-bottom: 40px"><div id="row_resort"></div></div>';
                                else
                                    echo '<div id="paging_resort_city" style="margin-bottom: 40px"><div id="row_resort_city"></div></div>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: <?php if (!$isWorld) echo 1; else {
                    if (!$isCountry) echo 5; else echo 7;
                } ?>,
                    center: {
                        lat: <?php if (!$isWorld) echo 0; else echo $lat ?>,
                        lng: <?php if (!$isWorld) echo 0; else echo $lng ?>}
                });
                var infoWin = new google.maps.InfoWindow();
                // Create an array of alphabetical characters used to label the markers.
                var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                // Add some markers to the map.
                // Note: The code uses the JavaScript Array.prototype.map() method to
                // create an array of markers based on a given "locations" array.
                // The map() method here has nothing to do with the Google Maps API.
                var markers = locations.map(function (location, i) {
                    var marker = new google.maps.Marker({
                        position: location
                    });
                    google.maps.event.addListener(marker, 'click', function (evt) {
                        infoWin.setContent(location.info);
                        infoWin.open(map, marker);
                    })
                    return marker;
                });

                // Add a marker clusterer to manage the markers.
                var markerCluster = new MarkerClusterer(map, markers,
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
            var locations = [

                <?php foreach ($listResort as $key => $resort)
                {
                $count = count($listResort);
                if ($key < $count - 1)
                    echo "{lat: " . $listResort[$key]['lat'] . ", lng:" . $listResort[$key]['lng'] . ", info:'" . $listResort[$key]['info_map'] . "'},";
                else
                    echo "{lat: " . $listResort[$key]['lat'] . ", lng:" . $listResort[$key]['lng'] . ", info:'" . $listResort[$key]['info_map'] . "'}";
                ?>
                <?php }?>
            ]
        </script>
        <script>initMap();
            $(document).ready(function () {
                $('.cauhoi a.test').on("click", function (e) {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });
        </script>
    </div>
</div>
