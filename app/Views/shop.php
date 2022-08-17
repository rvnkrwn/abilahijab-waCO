<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section>
    <div class="p-4">
        <h2 class="p-2 text-center text-capitalize">All Product</h2>
        <div class="mx-auto" style="margin-top: -20px; width: 150px;"><hr class="border-0 border-top border-dark"></div>
        <div class="cards mx-auto">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="card">
                    <img class="card-img-top rounded-0" src="https://cdn.shopify.com/s/files/1/0019/7653/3091/products/IMG-20210804-WA0025_360x.jpg?v=1629712546" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title">Ciput Arab Ninja - Seri Warna isi 10pcs</h6>
                        <p class="card-text" style="font-size: small;">Rp. 175.000</p>
                        <a href="#" class="btn btn-outline-primary">Beli</a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>