<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="h-auto">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="https://cdn.shopify.com/s/files/1/0019/7653/3091/files/slide_3_1944x.jpg?v=1610947719" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="https://cdn.shopify.com/s/files/1/0019/7653/3091/files/slide_2_1944x.jpg?v=1610947718" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.shopify.com/s/files/1/0019/7653/3091/files/slide_3_1944x.jpg?v=1610947719" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="h-100">
    <div class="p-4">
        <h2 class="p-2 text-center text-capitalize">recommended product</h2>
        <div class="mx-auto" style="margin-top: -20px; width: 150px;"><hr class="border-0 border-top border-dark"></div>
        <div class="cards mx-auto">
            <?php foreach ($product as $p): ?>
                <div class="card">
                    <img class="card-img-top rounded-0" src="<?= base_url() ?>/upload/product/<?= $p['img'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title"><?= $p['name']; ?></h6>
                        <p class="card-text" style="font-size: small;">Rp. <?= $p['price']; ?></p>
                        <a href="/detail/<?= $p['slug']; ?>" class="btn btn-outline-secondary">Beli</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
