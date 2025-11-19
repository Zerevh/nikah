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

                    <a href="<?= base_url() ?>data/tambahKuliner" class="btn btn-primary mb-3">Tambah</a>

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
                                                <th scope="col">Nama Kuliner</th>
                                                <th scope="col">Nama Toko</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Kabupaten</th>
                                                <th scope="col">Kecamatan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($kuliner as $k) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $k['nm_kuliner']; ?></td>
                                                    <td><?= $k['nm_toko']; ?></td>
                                                    <td><?= $k['kategori']; ?></td>
                                                    <td><?= $k['nama_kab']; ?></td>
                                                    <td><?= $k['nama_kec']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>data/ubahKuliner/<?= $k['id_kuliner']; ?>" class="fas fa-edit"></a>
                                                        <a href="<?= base_url() ?>data/tambahgambarkuliner/<?= $k['id_kuliner']; ?>" class="fas fa-images"></a>
                                                        <a href="<?= base_url() ?>data/hapusKuliner/<?= $k['id_kuliner']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
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