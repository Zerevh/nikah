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

                    <a href="<?= base_url() ?>template/tbhweeding" class="btn btn-primary mb-3">Tambah</a>

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
                                                <th scope="col">Nama Pria</th>
                                                <th scope="col">Nama Wanita</th>
                                                <th scope="col">Tanggal Acara</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($temp as $t) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $t['nm_pria']; ?></td>
                                                    <td><?= $t['nm_wanita']; ?></td>
                                                    <td><?= $t['tgl_acr']; ?></td>
                                                  <td>
                                                        <a href="<?= base_url() ?>template/editweeding/<?= $t['id_wdg']; ?>" class="fas fa-edit"></a>
                                                        <a href="##" class="fas fa-images"></a>
                                                        <a href="<?= base_url() ?>template/hpsweeding/<?= $t['id_wdg']; ?>" onclick="return confirm('Yakin anda ingin menghapusnya?');" class="fas fa-trash-alt"></a>
                                                        <a href="#" class="far fa-calendar-alt"></a>
                                                        <a href="##" class="fas fa-exclamation-triangle"></a>
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