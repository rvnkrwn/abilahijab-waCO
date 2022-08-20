<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section>
    <div class="p-4">
        <h2 class="p-2 text-center text-capitalize">All Product</h2>
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