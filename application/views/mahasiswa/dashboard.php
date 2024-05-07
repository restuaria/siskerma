<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('mahasiswa/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <p>MyData</p>
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card" style="background-color: #c2e3ff;">
                        <div class="card-body">
                            <h5 class="card-title">MoU (Memorandum of Understanding)</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri ri-archive-drawer-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $mou ?></h6>
                                    <span class="text-success small pt-1 fw-bold"><?= $mouva ?></span> <span class="text-muted small pt-2 ps-1">Valid</span> <br>
                                    <span class="text-success small pt-1 fw-bold"><?= $mouin ?></span> <span class="text-muted small pt-2 ps-1">Invalid</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card" style="background-color: #c3ffc2;">


                        <div class="card-body">
                            <h5 class="card-title">MoA (Memorandung of Agreement)</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri ri-inbox-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $mua ?></h6>
                                    <span class="text-success small pt-1 fw-bold"><?= $muava ?></span> <span class="text-muted small pt-2 ps-1">Valid</span> <br>
                                    <span class="text-success small pt-1 fw-bold"><?= $muain ?></span> <span class="text-muted small pt-2 ps-1">Invalid</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card" style="background-color: #ffdec2;">

                        <div class="card-body">
                            <h5 class="card-title">IA (Implementation Arrangement)</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-file-archive"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $ia ?></h6>
                                    <span class="text-success small pt-1 fw-bold"><?= $iava ?></span> <span class="text-muted small pt-2 ps-1">Valid</span> <br>
                                    <span class="text-success small pt-1 fw-bold"><?= $iain ?></span> <span class="text-muted small pt-2 ps-1">Invalid</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
        <p>Semua Data</p>
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card" style="background-color: #c2e3ff;">
                        <div class="card-body">
                            <h5 class="card-title">MOU (Memorandum of Understanding)</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri ri-archive-drawer-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $dlmouva ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card" style="background-color: #c3ffc2;">


                        <div class="card-body">
                            <h5 class="card-title">MUA (Memorandung of Agreement)</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri ri-inbox-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $dlmuava ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card" style="background-color: #ffdec2;">

                        <div class="card-body">
                            <h5 class="card-title">IA (Implementation Arrangement)</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-file-archive"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $dliava ?></h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

        </div><!-- End Right side columns -->

    </div>
</section>