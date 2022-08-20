<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="content p-4">
    <section class="p-2">
        <h4 class="fw-semibold">Dashboard <small>v.1</small></h4>
        <div class="cards row">

            <div class="myCard p-0 rounded-0 d-flex shadow bg-white m-3 col-2" style="max-width: 280px;">
                <i class="fal fa-box bg-primary text-center text-white p-4"></i>
                <ul class="card-body lh-sm p-2 text-black list-unstyled">
                    <li class="fs-6 fw-normal text-uppercase">Products</li>
                    <li class="fs-3 fw-semibold"><?= count($product) ?></li>
                </ul>
            </div>
            <div class="myCard p-0 rounded-0 d-flex shadow bg-white m-3 col-2" style="max-width: 280px;">
                <i class="fal fa-users bg-danger text-center text-white p-4"></i>
                <ul class="card-body lh-sm p-2 text-black list-unstyled">
                    <li class="fs-6 fw-normal text-uppercase">Users</li>
                    <li class="fs-3 fw-semibold"><?= count($user) ?></li>
                </ul>
            </div>
            <div class="myCard p-0 rounded-0 d-flex shadow bg-white m-3 col-2" style="max-width: 280px;">
                <i class="fal fa-shopping-cart bg-success text-center text-white p-4"></i>
                <ul class="card-body lh-sm p-2 text-black list-unstyled">
                    <li class="fs-6 fw-normal text-uppercase">Sales</li>
                    <li class="fs-3 fw-semibold">0</li>
                </ul>
            </div>
            <div class="myCard p-0 rounded-0 d-flex shadow bg-white m-3 col-2" style="max-width: 280px;">
                <i class="fal fa-dollar-sign bg-warning text-center text-white p-4"></i>
                <ul class="card-body lh-sm p-2 text-black list-unstyled">
                    <li class="fs-6 fw-normal text-uppercase">average income</li>
                    <li class="fs-3 fw-semibold">0</li>
                </ul>
            </div>


        </div>
    </section>
    <section class="p-2 border-top border-5 bg-white m-3">
        <div class="container-sm ms-0 ">
            <h5 class="fw-semibold"><i class="fas fa-chart-pie"></i>&nbsp;Monthly Recap Report</h5>
            <div class="charts row">
                <canvas id="chartSales" class="p-2 col-sm-2 m-2"></canvas>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>