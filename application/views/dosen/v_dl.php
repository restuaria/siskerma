<div class="pagetitle">
    <h1><?= $title1 ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dosen/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('dosen/dashboard/mou') ?>"><?= $title1 ?></a></li>
            <li class="breadcrumb-item active"><?= $title2 ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

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
                    </div>
                </div>
                <div class="card-body">

                    <table class="table datatable" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama File</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $d) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><?= $d->create_at ?></td>
                                    <td><?= $d->arsip_nama ?></td>
                                    <td><?php
                                        $jenis = $this->db->query("SELECT * FROM jenis where jenis_id = $d->arsip_jenis ")->result();
                                        foreach ($jenis as $j) {
                                            echo $j->jenis_nama;
                                        }
                                        ?></td>
                                    <td><?php
                                        $jenis = $this->db->query("SELECT * FROM user where user_id = $d->arsip_user ")->result();
                                        foreach ($jenis as $j) {
                                            echo $j->user_nama;
                                        }
                                        ?></td>

                                    <td><?php
                                        if ($d->arsip_status == "1") { ?>
                                            <span class="badge bg-success">Valid</span>
                                        <?php } else if ($d->arsip_status == "2") { ?>
                                            <span class="badge bg-danger">Invalid</span>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <a target="_blank" title="view" class="btn btn-warning" href="<?php echo base_url() . 'assets/file/' . $d->arsip_file ?>"><i class="bx bx-search-alt-2 text-white"></i></a>
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