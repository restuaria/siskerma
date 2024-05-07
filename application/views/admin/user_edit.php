<div class="pagetitle">
    <h1><?= $title1 ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/users') ?>">Data Users</a></li>
            <li class="breadcrumb-item active"><?= $title1 ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit</h5>

                    <!-- General Form Elements -->
                    <form action="<?php echo base_url('admin/dashboard/user_proses_edit/' . $data->user_id) ?>" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="<?= $data->user_nama ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="username" name="username" value="<?= $data->user_username ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10"><span>Foto Lama</span>
                                <img src="<?php echo base_url() . 'assets/img/' . $data->user_foto ?>" alt="" style="height: 80px;">

                                <input class="form-control" value="<?= $data->user_foto ?>" name="foto" type="file" id="formFile">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Level User</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="level" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option <?php if ($data->user_level == "admin") : echo "selected";
                                            endif; ?> value="admin">Admin</option>
                                    <option <?php if ($data->user_level == "dosen") : echo "selected";
                                            endif; ?> value="dosen">Dosen</option>
                                    <option <?php if ($data->user_level == "mahasiswa") : echo "selected";
                                            endif; ?> value="mahasiswa">Mahasiswa</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>