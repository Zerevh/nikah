        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">
                <div class="col-lg-12">

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?= base_url() ?>data/tambahPasar" class="btn btn-primary mb-3">Tambah</a>

                    <div class="card">
                        <div class="card-header text-white bg-primary">
                            <h3 class="mb-0 text-black-800"><?= $title; ?></h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Pasar</th>
                                                <th scope="col">Pemosting</th>
                                                <th scope="col">Kabupaten</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($pasar as $p) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $p['nm_pasar']; ?></td>
                                                    <td><?= $p['name']; ?></td>
                                                    <td><?= $p['nama_kab']; ?></td>
                                                    <td><?= $p['nama_kec']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>data/ubahpasar/<?= $p['id_pasar']; ?>" class="fas fa-edit"></a>
                                                        <a href="<?= base_url() ?>data/tambahgambarpasar/<?= $p['id_pasar']; ?>" class="fas fa-images"></a>
                                                        <a href="<?= base_url() ?>data/hapuspasar/<?= $p['id_pasar']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->