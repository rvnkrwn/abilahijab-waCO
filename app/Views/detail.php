<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section id="detail" class="h-auto container-sm p-4 mx-auto d-flex justify-content-start flex-wrap justify-content-md-around">
    <img class="card-img-top rounded-0 align-self-center p-2 mx-auto" style="max-width: 400px;" src="<?= base_url() ?>/upload/product/<?= $product['img'] ?>" alt="Card image">
    <div class="product-body p-2 mt-4 mx-auto">
        <h5 class="card-title fw-semibold"><?= $product['name'] ?></h5>
        <h3 class="card-text my-3 fw-bold">Rp. <?= $product['price'] ?></h3>
        <div class="p-2 d-md-none" style="height: fit-content;">
            <div class="">
                <h4>Pilih Varian</h4>
            </div>
            <p><span class="text-secondary">Baca Deskripsi</span></p>
            <p>Stok: <span class="fw-semibold">Dalam Stok</span></p>
            <form action="">
                <input type="hidden" name="slug" value="<?= $product['slug'] ?>">
                <div class="d-none">
                    <button type="button" class="bg-danger text-white border-danger" style="width: 30px;" onclick="document.querySelector('#total1').value--">-</button>
                    <input type="text" name="total" id="total1" class="text-center" style="width: 40px;" value="1">
                    <button type="button" class="bg-success text-white border-success" style="width: 30px;" onclick="document.querySelector('#total1').value++">+</button>
                </div>
                <div class="my-2">
                    <button type="button" class="btn text-bg-success rounded-0 d-block my-1" style="width: 150px;" disabled><i class="fal fa-cart-plus"></i> Keranjang</button>
                    <button type="button" id="beli" class="btn text-bg-primary rounded-0 d-block my-1" style="width: 150px;" onclick="document.querySelector('#formCheckout').classList.replace('d-none','d-block')">Beli</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="description">
            <h6 class="p-1">Description Product:</h6>
            <textarea name="" id="" cols="30" rows="10" class="border-0 bg-transparent" style="resize: none; overflow: hidden; min-width: 100%; font-size: small;" disabled><?= $product['description'] ?></textarea>
        </div>
    </div>
    <div class="p-2 rounded-2 border align-self-center d-none d-md-block" style="height: fit-content; min-width: fit-content;">
        <div class="">
            <h4>Pilih Varian</h4>
        </div>
        <p><span class="text-secondary">Baca Deskripsi</span></p>
        <p>Stok: <span class="fw-light">Dalam Stok</span></p>
        <form action="">
            <input type="hidden" name="slug">
            <div class="d-none">
                <button type="button" class="bg-danger text-white border-danger" style="width: 30px;" onclick="document.querySelector('#total2').value--">-</button>
                <input type="text" name="total" id="total2" class="text-center" style="width: 40px;" value="1">
                <button type="button" class="bg-success text-white border-success" style="width: 30px;" onclick="document.querySelector('#total2').value++">+</button>
            </div>
            <div class="my-2">
                <button type="button" class="btn text-bg-secondary rounded-0 d-block my-1" style="width: 150px;" disabled><i class="fal fa-cart-plus"></i> Keranjang</button>
                <button type="button" id="beli" class="btn text-bg-success rounded-0 d-block my-1" style="width: 150px;" onclick="document.querySelector('#formCheckout').classList.replace('d-none','d-block')">Beli</button>
            </div>
        </form>
    </div>
</section>
<div id="formCheckout" class="d-none">
    <section class="position-fixed fixed-top vh-100 vw-100" style="z-index: 99999998; background: rgba(0,0,0,0.5);" onclick="document.querySelector('#formCheckout').classList.replace('d-block','d-none')"></section>
    <section id="checkout" class="container-md bg-white p-4 rounded-2" style="position:fixed; top: 50%; left: 50%; transform: translate(-50%,-50%); box-shadow: 0 0 15px rgba(0,0,0,0.5); z-index: 99999999; max-width: 500px;">
        <h5 class="text-center my-2">Silahkan isi data berikut</h5>
        <form method="post" action="/checkout">
            <input type="hidden" name="productid" value="<?= $product['productid'] ?>">
            <input type="hidden" name="picture" value="<?= base_url() ?>/upload/product/<?= $product['img'] ?>">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" value="<?= ($user['name'] > 0) ? $user['name'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="address1">Alamat Lengkap</label>
                <input type="text" class="form-control" name="address1" id="address1" placeholder="Nama jalan,Rt/Rw,Desa" value="<?= ($user['address1'] > 0) ? $user['address1'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="city">Kota</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Kota" value="<?= ($user['city'] > 0) ? $user['city'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="province">Provinsi</label>
                <input type="text" class="form-control" name="province" id="province" placeholder="Provinsi" value="<?= ($user['province'] > 0) ? $user['province'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="postcode">Kode Pos</label>
                <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Kode Pos" value="<?= ($user['postcode'] > 0) ? $user['postcode'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="country">Negara</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="Negara" value="<?= ($user['country'] > 0) ? $user['country'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="country">Total Item
                    <input type="number" class="form-control" name="total" id="total" placeholder="total item" value="0"
                    onkeyup="
                    let a = document.querySelector('#total').value;
                    let b = <?= $product['price'] ?>;
                    console.log(a*b);
                            document.querySelector('#price').textContent=a*b;
                            document.querySelector('#totalPay').value=a*b;
                    " required>
                </label>
                <input type="hidden" id="totalPay" name="totalPay" value="0">
                <span class="m-1">total harga: Rp.</span><span id="price">0</span>
            </div>
            <div class="my-2">
                <button type="button" class="btn btn-danger text-white" onclick="document.querySelector('#formCheckout').classList.replace('d-block','d-none')">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </section>
</div>

<?= $this->endSection() ?>
