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

                   <a href="<?= base_url('berita/add'); ?>" class="btn btn-primary mb-3" data-toggle="" data-target="">Add New Menu</a>

                   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalLabel">
                       Tes Tambah
                   </a>

                   <table class="table table-hover">
                       <thead>
                           <tr>
                               <th scope="col">#</th>
                               <th width="100px" scope="col">List Berita</th>
                               <th scope="col">Isi Berita</th>
                               <th scope="col">kategori</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($berita as $b) : ?>
                               <!-- $menu dapat dari controller  $data['menu'] = $this->db->get('user_menu')->result_array(); -->
                               <tr>
                                   <th scope="row"><?= $i; ?></th>
                                   <td><?= $b['nama_berita']; ?></td>
                                   <td><?= $b['isi_berita']; ?></td>
                                   <td><?= $b['kategori']; ?></td>
                                   <td>
                                       <a href="<?= base_url('nyoba/edittes/') . $b['id']; ?>" class="badge badge-success">Edit</a>
                                       <a href="" class="badge badge-danger">Delete</a>
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

       <!-- Button trigger modal -->


       <!-- Modal -->
       <div class="modal fade" id="modalLabel" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="modalLabel">Tes Modal Bambang</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <form action="<?= base_url('berita/add') ?>" method="post">
                           <div class="form-group">
                               <label for="name">Nama*</label>
                               <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder="Nama Berita">
                               <div class="invalid-feedback">
                                   <?php echo form_error('nama') ?>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="name">Isi*</label>
                               <input type="text" class="form-control <?php echo form_error('isi') ? 'is-invalid' : '' ?>" id="isi" name="isi" placeholder="Isi Berita">
                               <div class="invalid-feedback">
                                   <?php echo form_error('isi') ?>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="name">Kategori*</label>
                               <input type="text" class="form-control <?php echo form_error('kategori') ? 'is-invalid' : '' ?>" id="kategori" name="kategori" placeholder="Kategori">
                               <div class="invalid-feedback">
                                   <?php echo form_error('kategori') ?>
                               </div>
                           </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                       <button type="submit" class="btn btn-primary">Nambah Cuy</button>
                   </div>
               </div>
           </div>
       </div>