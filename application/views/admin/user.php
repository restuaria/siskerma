<div class="pagetitle">
    <h1><?= $title1 ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $title1 ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "update") {
                    ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Update <?= $title1 ?> BERHASIL </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "hapus") {
                    ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> Berhasil Menghapus Data User </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "berhasil") {
                    ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> Tambah <?= $title1 ?> BERHASIL </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "cancel") {
                    ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> BATALKAN PERMOHONAN BERHASIL </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="card-body">
                    <a href="<?php echo base_url('admin/dashboard/user_tambah') ?>" class="btn btn-primary btn-sm mt-2">Tambah User</a>
                    <!-- Modal -->

                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">User Level</th>
                                <th scope="col">Last Login</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $d) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><?= $d->user_nama ?></td>
                                    <td><?= $d->user_username ?></td>

                                    <td><?= $d->user_level ?>
                                    </td>
                                    <td>
                                        <?= $d->last ?>
                                    </td>
                                    <td><img src="<?php echo base_url() . 'assets/img/' . $d->user_foto ?>" alt="" style="height: 80px;"></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" title="Hapus" data-bs-target="#hapus_<?php echo $d->user_id ?>">
                                                <i class="bi bi-trash" style=" color: white;"></i>
                                            </button>
                                            <a href="<?php echo base_url() . 'admin/dashboard/user_edit/' . $d->user_id ?>" class="btn btn-success"> <i class="bi bi-pencil-square" style=" color: white;"></i></a>
                                        </div>
                                        <div class="modal fade" id="hapus_<?php echo $d->user_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><strong>HAPUS USER</strong></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda Yakin Akan Menghapus Data Ini ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                                                        <a href="<?php echo base_url() . 'admin/dashboard/hapus_user/' . $d->user_id ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <?php
                                        $user = $this->db->query("SELECT *FROM user where user_id = $d->user_id")->row();

                                        ?>

                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>