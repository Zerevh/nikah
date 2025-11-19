<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <!-- end blog-top -->

                    <div class="card">
                        <div class="card-header text-white bg-primary">
                            <h1 class="h6 mb-0 text-black-800">Map Wisata</h1>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
</section>

<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);


        var data = [
            <?php foreach ($wisata as $key => $value) { ?> {
                    "lokasi": [<?= $value['latitude']; ?>, <?= $value['longitude']; ?>],
                    "id": "<?= base_url() ?>home/datawisata/<?= $value['id_wisata']; ?>",
                    "lat": "<?= $value['latitude']; ?>",
                    "long": "<?= $value['longitude']; ?>",
                    "image": "<img src='<?= base_url('assets/img/wisata/' . $value['w_image']) ?>' width='100%'>",
                    "nm_wisata": "<?= $value['nm_wisata']; ?>",
                    "kalangan": "<?= $value['kalangan']; ?>",
                    "status": "<?= $value['status']; ?>",
                    "event": "<?= $value['event']; ?>",
                },
            <?php } ?>

        ];

        var map = new L.Map('map', {
            zoom: 8,
            center: new L.latLng(-3.022864, 115.480478)
        });

        map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            maxZoom: 18,
            tileSize: 512,
            zoomOffset: -1
        }));

        var markersLayer = new L.LayerGroup(); //layer contain searched elements
        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            position: 'topright',
            layer: markersLayer,
            initial: false,
            zoom: 9,
            marker: false
        });
        map.addControl(new L.Control.Search({
            layer: markersLayer,
            initial: false,
            zoom: 9,
            collapsed: true
        }));

        //populate map with markers from sample data
        for (i in data) {
            var nm_wisata = data[i].nm_wisata,
                id = data[i].id,
                lat = data[i].lat,
                long = data[i].long,
                image = data[i].image,
                kalangan = data[i].kalangan,
                status = data[i].status,
                event = data[i].event; //value searched
            var lokasi = data[i].lokasi; //position found
            var marker = new L.Marker(new L.latLng(lokasi), {
                title: nm_wisata
            }); //se property searched
            marker.bindPopup(image +
                '</br>Nama Wisata : ' + nm_wisata +
                '</br>Kalangan : ' + kalangan +
                '</br>Status : ' + status +
                '</br>Event : ' + event +
                "</br><a href=" + id + ">Lihat detail</>" +
                "</br><a href='https://www.google.com/maps/dir/?api=1&origin=" +
                location.coords.latitude + "," + location.coords.longitude + "&destination= " + lat + "," + long + "' target='_blank'>Rute</a>");
            markersLayer.addLayer(marker);
        }
    });
</script>