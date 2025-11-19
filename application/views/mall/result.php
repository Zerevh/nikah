<div class="card">
    <div class="card-header text-white bg-primary">
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <a href="<?= base_url() ?>laporan/cetakmall/<?= $idk; ?>/<?= $idkc; ?>" target="_blank" class="mb-1 btn btn-warning">Cetak Laporan</a>
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Nama Mall</th>
                        <th>Pemosting</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kecamatan</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($mall as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nm_mall']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['nama_kab'] ?></td>
                            <td><?= $row['nama_kec'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>