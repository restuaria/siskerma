<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Filter Laporan</h3>
                </div>
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row mb-3 mt-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Mulai Tanggal</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" value="<?php if (isset($_GET['tanggal_dari'])) {
                                                                                    echo $_GET['tanggal_dari'];
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>" name="tanggal_dari" placeholder="Mulai Tanggal" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Sampai Tanggal</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" value="<?php if (isset($_GET['tanggal_sampai'])) {
                                                                                    echo $_GET['tanggal_sampai'];
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>" name="tanggal_sampai" placeholder="Sampai Tanggal" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-4">
                                <select name="jenis" class="form-select" aria-label="Default select example">
                                    <option value="">- Pilih -</option>
                                    <?php
                                    $jenis = $this->db->query("SELECT * FROM jenis")->result();
                                    foreach ($jenis as $l) {
                                    ?>
                                        <option <?php if (isset($_GET['jenis'])) {
                                                    if ($_GET['jenis'] == "$l->jenis_id") {
                                                        echo "selected='selected'";
                                                    }
                                                } ?> value="<?= $l->jenis_id ?>"><?= $l->jenis_nama ?>
                                        </option>

                                    <?php } ?>
                                    <option <?php if (isset($_GET['jenis'])) {
                                                if ($_GET['jenis'] == "Semua") {
                                                    echo "selected='selected'";
                                                }
                                            } ?> value="Semua">Semua
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 mx-auto">
                            <div class="col-lg-6">
                                <div class="form-group" style="text-align: right;">
                                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan</h3>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['jenis'])) {
                        $tgl_dari = $_GET['tanggal_dari'];
                        $tgl_sampai = $_GET['tanggal_sampai'];
                        $jenis = $_GET['jenis'];
                    ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Dari Tanggal</th>
                                        <th width="1%">:</th>
                                        <td><?php $newDate = date("d F Y", strtotime($tgl_dari));
                                            echo $newDate;  ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sampai Tanggal</th>
                                        <th>:</th>
                                        <td><?php $newDate = date("d F Y", strtotime($tgl_sampai));
                                            echo $newDate;  ?></td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <th>:</th>
                                        <td><?php
                                            if ($jenis == "Semua") {
                                                echo "Semua";
                                            } else {
                                                $prodi = $this->db->query("SELECT * FROM jenis where jenis_id = $jenis")->result();
                                                foreach ($prodi as $pro) {
                                                    echo $pro->jenis_nama;
                                                }
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php if ($jenis == "Semua") { ?>
                            <a href="<?php echo base_url() . 'admin/laporan/excel/' . $jenis ?>?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&jenis=<?php echo $jenis ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp Download Excel</a>
                            <br /><br />
                            <div class="table-responsive">
                                <table class="table datatable" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Lembaga Mitra Kerjasama</th>
                                            <th scope="col">Bukti Kerjasama</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Tanggal Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $arsip = $this->db->query("SELECT * FROM arsip where date(create_at)>='$tgl_dari' and date(create_at)<='$tgl_sampai' ORDER BY create_at DESC")->result();
                                        foreach ($arsip as $a) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $a->arsip_nama ?></td>
                                                <td><?php $jenis = $this->db->query("SELECT * FROM jenis where jenis_id = $a->arsip_jenis")->result();
                                                    foreach ($jenis as $j) {
                                                        echo $j->jenis_nama;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $user = $this->db->query("SELECT * FROM user where user_id = $a->arsip_user")->result();
                                                    foreach ($user as $u) {
                                                        echo $u->user_nama;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    $date = $a->create_at;
                                                    $newDate = date("d F Y", strtotime($date));
                                                    echo $newDate;  ?></td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <a href="<?php echo base_url() . 'admin/laporan/excel/' . $jenis ?>?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&jenis=<?php echo $jenis ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp Download Excel</a>
                            <br /><br />
                            <div class="table-responsive">
                                <table class="table datatable" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Lembaga Mitra Kerjasama</th>
                                            <th scope="col">Bukti Kerjasama</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Tanggal Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $arsip = $this->db->query("SELECT * FROM arsip where arsip_jenis = $jenis and date(create_at)>='$tgl_dari' and date(create_at)<='$tgl_sampai' ORDER BY create_at DESC")->result();
                                        foreach ($arsip as $a) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $a->arsip_nama ?></td>
                                                <td><?php $jenis = $this->db->query("SELECT * FROM jenis where jenis_id = $a->arsip_jenis")->result();
                                                    foreach ($jenis as $j) {
                                                        echo $j->jenis_nama;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $user = $this->db->query("SELECT * FROM user where user_id = $a->arsip_user")->result();
                                                    foreach ($user as $u) {
                                                        echo $u->user_nama;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    $date = $a->create_at;
                                                    $newDate = date("d F Y", strtotime($date));
                                                    echo $newDate;  ?></td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>