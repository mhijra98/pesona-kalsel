       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->

           <?php if ($this->session->flashdata('success')) : ?>
               <div class="alert alert-success" role="alert">
                   <?php echo $this->session->flashdata('success'); ?>
               </div>
           <?php endif; ?>

           <div class="card">
               <div class="card-header text-white bg-primary">
                   <h3 class="mb-0 text-black-800">Data Event Baru</h3>
               </div>
               <div class="card-body">

                   <div class="row">
                       <div class="col-lg-12">

                           <table class="table table-bordered table-hover" id="dataTables-example">
                               <thead>
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Tema Event</th>
                                       <th scope="col">Pemosting</th>
                                       <th scope="col">Kabupaten/Kota</th>
                                       <th scope="col">kecamatan</th>
                                       <th scope="col">Aksi</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php $i = 1; ?>
                                   <?php foreach ($event as $row) : ?>
                                       <tr>
                                           <th scope="row"><?= $i; ?></th>
                                           <td><?= $row['tema']; ?></td>
                                           <td><?= $row['name']; ?></td>
                                           <td><?= $row['nama_kab']; ?></td>
                                           <td><?= $row['nama_kec']; ?></td>
                                           <td>
                                               <a href="<?= base_url(); ?>verifikasi/rincianeventbaru/<?= $row['id_event']; ?>" class="badge badge-primary">Rincian</a>
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
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->