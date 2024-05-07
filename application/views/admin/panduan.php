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
                    <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Data
                    </button>
                    <form action="<?php echo base_url() . 'admin/panduan/proses_tambah' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Panduan</strong></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputText">Nama File</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="nama" class="form-control" placeholder="Judul/Nama Fil" required>
                                            </div>
                                        </div>

                                        <br />
                                        <div class="row mb-3">
                                            <label for="file">File Upload</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="file" name="file" id="file" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" title="Edit" data-bs-target="#edit_<?php echo $d->panduan_id ?>">
                                                <i class="bi bi-pencil-square" style="color: white;"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" title="Hapus" data-bs-target="#hapus_<?php echo $d->panduan_id ?>">
                                                <i class="bi bi-trash" style="color: white;"></i>
                                            </button>
                                        </div>

                                        <form action="<?php echo base_url() . 'admin/panduan/hapusdata/' . $d->panduan_id ?>" method="post">
                                            <div class="modal fade" id="hapus_<?php echo $d->panduan_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><strong>Hapus Data</strong></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group" style="width:100%">
                                                                <p>Apakah anda yakin <strong>MENGHAPUS</strong> file ini? </p>
                                                                <p>Nama File : <?= $d->panduan_nama ?></p>
                                                            </div>
                                                            <br />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-danger">HAPUS</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="<?php echo base_url() . 'admin/panduan/proses_editfile/' . $d->panduan_id ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal fade" id="edit_<?php echo $d->panduan_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data</strong></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <label for="inputText">Nama File</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" name="nama" value="<?= $d->panduan_nama ?>" class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <br />
                                                            <div class="row mb-3">
                                                                <label for="file">File Upload</label>
                                                                <small>Data Lama : <a href="<?php echo base_url() . 'assets/file/panduan/' . $d->panduan_file ?>" target="_blank"><?= $d->panduan_file ?></a></small>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" type="file" name="file" id="file">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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