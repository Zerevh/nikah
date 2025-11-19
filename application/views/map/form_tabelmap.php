        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-6">

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?= base_url() ?>map/tambahMap" class="btn btn-primary mb-3">Tambah Map Baru</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($map as $m) : ?>
                                <!-- $menu dapat dari controller  $data['menu'] = $this->db->get('user_menu')->result_array(); -->
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $m['latitude']; ?></td>
                                    <td><?= $m['longitude']; ?></td>
                                    <td><?= $m['keterangan']; ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>map/ubahMap/<?= $m['id']; ?>">Ubah</a>
                                        <a href="<?= base_url() ?>map/hapusMap/<?= $m['id']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->