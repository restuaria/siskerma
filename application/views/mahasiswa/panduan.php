<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/panduan') ?>">Home</a></li>
            <li class="breadcrumb-item active">Panduan</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-header">

                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == "berhasil") {
                        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <p>Berhasil menambahkan Data</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == "valid") {
                        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> Berhasil Mengubah Status Menjadi VALID </strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == "invalid") {
                        ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> Berhasil Mengubah Status Menjadi INVALID </strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == "gagal") {
                        ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> Gagal Tambah Data </strong>
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
                                    <strong> Berhasil Menghapus Data</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table datatable" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama File</th>
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
                                    <td><?= $d->panduan_nama ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a target="_blank" title="view" class="btn btn-success" href="<?php echo base_url() . 'assets/file/panduan/' . $d->panduan_file ?>"><i class="bx bx-search-alt-2 text-white"></i></a>
                                        </div>
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