<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center mb-2">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>home/kuliner">Home</a></li>
                            <li class="breadcrumb-item active"><?= $kuliner['nm_kuliner']; ?></li>
                        </ol>

                        <span class="color-orange"><a><?= $kuliner['kategori']; ?></a></span>

                        <h3><?= $kuliner['nm_kuliner']; ?></h3>

                        <div class="blog-meta big-meta">
                            <small><a>Pemosting : <?= $kuliner['name']; ?></a></small>
                            <small><a><?= $kuliner['nama_kab']; ?></a></small>
                            <small><a><?= $kuliner['nama_kec']; ?></a></small>
                        </div><!-- end meta -->


                    </div><!-- end title -->

                    <div class="card">
                        <div class="card-body">
                            <!-- Carousel-->
                            <div class="container">
                                <br>
                                <div class="class col-sm-12">
                                    <div id="carouselExampleIndicators" class="carousel slide text-center" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php
                                            foreach ($gambar as $key => $value) {
                                                $active = ($key == 0) ? 'active' : '';
                                                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $key . '" class="' . $active . '"></li>';
                                            }
                                            ?>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" style="text-align: center;">
                                            <?php
                                            foreach ($gambar as $key => $value) {
                                                $active = ($key == 0) ? 'active' : '';
                                                echo '<div class="carousel-item ' . $active . '">
                                            <img src="' . base_url('assets/img/showgambar/kuliner/') . $value['sk_image'] . '" class="d-block w-100" alt="..." style="width800px;height:500px;">
                                        </div>';
                                            }
                                            ?>
                                        </div>

                                        <!-- Controls -->
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Carousel-->
                        </div>
                    </div>

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <div class="row">
                            <div class="col-lg-12 col-md-10 col-sm-10 col-xs-12">
                                <p><?= $kuliner['ket']; ?></p>
                            </div><!-- end col -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis1">

                    <div class="card">
                        <div class="card-body">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </div>

                    <hr class="invis1">

                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<script>
    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        //map view
        var map = L.map('map').setView([<?= $kuliner['latitude']; ?>, <?= $kuliner['longitude']; ?>], 17);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            maxZoom: 18,
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        L.marker([<?= $kuliner['latitude']; ?>, <?= $kuliner['longitude']; ?>])
            .bindPopup("<b>Lokasi Kuliner</b></br>" + "<img src='<?= base_url('assets/img/kuliner/' . $kuliner['k_image']) ?>' width='100%'>" +
                "<b>Nama Kuliner : <?= $kuliner['nm_kuliner']; ?> </b></br>" +
                "<b>Nama Toko : <?= $kuliner['nm_toko']; ?> </b></br>" +
                "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $kuliner['latitude']; ?>,<?= $kuliner['longitude']; ?>' target='_blank'>Rute</a>").addTo(map);
    });
</script>