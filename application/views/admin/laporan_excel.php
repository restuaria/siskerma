<html>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data lamporan siskerma.xls");
    ?>
    <center>
        <h2 style="text-transform:uppercase">Laporan Data <br></h2>
    </center>
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
                        <td style="vertical-align: middle;"><?php
                                                            $newDate = date("d F Y", strtotime($tgl_dari));
                                                            echo $newDate;
                                                            ?></td>
                    </tr>
                    <tr>
                        <th>Sampai Tanggal</th>
                        <th>:</th>
                        <td style="vertical-align: middle;"><?php $newDate = date("d F Y", strtotime($tgl_sampai));
                                                            echo $newDate; ?></td>
                    </tr>
                    <tr>
                        <th>Bukti Kerjasama</th>
                        <th>:</th>
                        <td style="vertical-align: middle;"><?php
                                                            if ($jenis == "Semua") {
                                                                echo "Semua";
                                                            } else {
                                                                $prodi = $this->db->query("SELECT * FROM jenis where jenis_id = $jenis")->result();
                                                                foreach ($prodi as $pro) {
                                                                    echo $pro->jenis_nama;
                                                                }
                                                            }

                                                            ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
        if ($jenis == "Semua") {
        ?>
            <table class="table" border="1">
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
        <?php
        } else {
        ?>
            <table class="table" border="1">
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

        <?php

        }
        ?>
    <?php
    } else {
    ?>
        <div class="alert alert-info text-center">
            Silahkan Filter Laporan Terlebih Dulu.
        </div>
    <?php
    }
    ?>
    <?php ob_flush(); ?>
</body>

</html>