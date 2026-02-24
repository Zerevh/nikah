

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="card">
                <div class="card-header text-white bg-primary">
                    <h1 class="h3 mb-1 text-black-800"><?= $title; ?></h1>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">

                            <form action="<?= base_url('template/editWeeding'); ?>" method="post">
                                <!--form_open_multipart untuk upload foto bawaan CI, harus diarahkan ke controler-->
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Mempelai Pria</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nm_pria" id="nm_pria" value="<?= $temp['nm_pria']; ?>">
                                        <span style="color: red;"><?php echo form_error('nm_pria'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="isi" class="col-sm-2 col-form-label">Nama Mempelai Wanita</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nm_wanita" id="nm_wanita" value="<?= $temp['nm_wanita']; ?>">
                                        <span style="color: red;"><?php echo form_error('nm_wanita'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="isi" class="col-sm-2 col-form-label">Tanggal Acara</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tgl_acr" value="<?= $temp['tgl_acr']; ?>">
                                        <span style="color: red;"><?php echo form_error('tgl_acr'); ?></span>
                                    </div>
                                </div>
                                <div class="class row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->