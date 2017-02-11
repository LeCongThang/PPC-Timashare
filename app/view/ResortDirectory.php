<?php include 'header.php'; ?>

<script
    src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<div class="container">
    <div class="row text-left">
        <div class="col-md-12 col-sm-12">
            <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
            <h2 class="title_h2">KHU NGHỈ DƯỠNG & GIÁ CẢ</h2>
            <h3 class="title_h3">Danh mục khu nghỉ dưỡng</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel-border">
                <h4 style="background: #362416 !important;color: white;padding-top: 15px;padding-bottom: 15px;padding-left: 10px;margin-bottom: 0px">
                    <b>Region</b></h4>
                <div class="dimAlignments" style="background: #E8E7E5 !important;">
                    <ul id="dimListPrim"
                        style=" list-style:none;padding-left: 15px;margin-top: 0px;padding-top: 10px;padding-bottom: 10px">
                        <?php
                        foreach ($listContinents as $key => $continent) {
                            echo '<li class="cauhoi" style="margin: 5px"><a class="test" href="#" onclick="return false;" ><span class="link_tim_hieu" style="color: #640100;">' . $continent['name'] . ' (' . $continent['number'] . ')</span></a><ul class="cautraloi" style="display: none;padding-left:15px;" >
                                ';
                            foreach ($regions[$continent['id'] - 1] as $key2 => $region)
                                echo '<li style="margin-top: 5px;margin-bottom: 5px;"  class="noi_dung_link_tim_hieu"><a href="#" style="color:#3C2A1D;" >' . $region['long_name'] . ' (' . $region['number'] . ')</a></li>';
                            echo '</ul></a>';
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
                                                              aria-expanded="true"><i
                                class="glyphicon glyphicon-th-list"></i></a></li>
                    <li role="presentation" class=""><a href="#en" role="tab" id="en-tab"
                                                        data-toggle="tab"
                                                        aria-controls="gioithieu_en"
                                                        aria-expanded="false"><i
                                class="glyphicon glyphicon-map-marker"></i></a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" role="tabpanel" id="vi"
                         aria-labelledby="vi-tab">
                        <div class="box-body">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade " role="tabpanel" id="en" aria-labelledby="en-tab">
                        <div class="box-body">

                        </div>
                    </div>
                </div>
            </div>

            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        disableDoubleClickZoom: true,
                        zoom: 1,
                        scrollwheel: false,
                        navigationControl: false,
                        mapTypeControl: false,
                        scaleControl: false,
                        draggable: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        center: {lat: 0, lng: 0}
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
                var content = '<div id="bodyContent""><img style="height: 100px; width:200px;float:left" border="0" src="<?=BASE_DIR?>img/h1.jpg"/> <a href ="#"> <b>KHU NGHỈ DƯỠNG NOVALAND</b></a><br/><br/>  244 Cống Quỳnh,P. Phạm Ngũ Lão, Quận 1, Tp HCM</div>'

                var locations = [
                    {lat: -31.563910, lng: 147.154312, info: content},
                    {lat: -33.718234, lng: 150.363181, info: content},
                    {lat: -33.727111, lng: 150.371124, info: content},
                    {lat: -33.848588, lng: 151.209834, info: content},
                    {lat: -33.851702, lng: 151.216968, info: content},
                    {lat: -34.671264, lng: 150.863657, info: content},
                    {lat: -35.304724, lng: 148.662905, info: content},
                    {lat: -36.817685, lng: 175.699196, info: content},
                    {lat: -36.828611, lng: 175.790222, info: content},
                    {lat: -37.750000, lng: 145.116667, info: content},
                    {lat: -43.999792, lng: 170.463352, info: content}
                ]

            </script>
            <script
                src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsxl-PSyZFShpM_s-k4t4eI8P6dSvf9-M&callback=initMap">
            </script>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
