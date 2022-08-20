<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
    <div class="content p-4">
        <section id="list" class="p-2">
            <h4 class="fw-semibold mb-4">Dashboard <small class="fs-6">> Products</small></h4>
            <div>
                <div class="d-flex justify-content-between border-bottom">
                    <h5 class="align-self-center"><i class="fal fa-clipboard-list-check"></i>&nbsp;List Users</h5>
                    <p class="p-2 text-bg-success align-self-center" style="cursor: pointer" onclick="document.querySelector('#add').classList.replace('d-none','d-block')"><i class="fal fa-cart-plus"></i>&nbsp;Add Product</p>
                </div>
                <div class="text-bg-danger my-2 <?= $validation->getErrors() ? 'p-2' : '' ?>">
                    <?= $validation->listErrors(); ?>
                </div>
                <div id="tableListUser">
                    <table class="shadow text-center w-100" cellpadding="8">
                        <thead>
                        <tr class="text-bg-primary fs-6 text-uppercase">
                            <th class="">No</th>
                            <th class="">Product ID</th>
                            <th class="">Product</th>
                            <th class="">Price</th>
                            <th class="">Total</th>
                            <th class="">Status</th>
                            <th class="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = count($product);
                        if ($total == 0):
                            ?>
                            <tr class="bg-white">
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                                <td class="">Tidak ada data</td>
                            </tr>
                        <?php
                        else:
                            for ($i=0; $i < $total; $i++):
                                ?>
                                <tr class="<?= ($i % 2 === 0) ? 'bg-white' : 'text-bg-warning' ?>">
                                    <th class=""><?= $i+1; ?></th>
                                    <th class=""><?= $product[$i]['productid']; ?></th>
                                    <th class=""><?= $product[$i]['name']; ?></th>
                                    <th class=""><?= $product[$i]['price']; ?></th>
                                    <th class=""><?= $product[$i]['total']; ?></th>
                                    <th class="">this test</th>
                                    <td class="">
                                        <button class="btn btn-outline-success px-3 py-1 rounded-0" onclick="editProduct(<?= $product[$i]['productid']; ?>)">Edit</button>
                                        <button class="btn btn-outline-danger px-3 py-1 rounded-0" onclick="deleteProduct(<?= $product[$i]['productid']; ?>)">Delete</button>
                                    </td>
                                </tr>
                            <?php
                            endfor;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <div id="add" class="d-none p-2">
            <section class="vh-100 w-100" style="background: rgba(0,0,0,0.4); filter: blur(5px); top: 0; left: 0; position: fixed" onclick="document.querySelector('#add').classList.replace('d-block','d-none')"></section>
            <section class="bg-white shadow shadow-lg rounded" style="width: 350px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 2em">
                <form method="post" action="/admin/new-product" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="InputName">Product Name</label>
                        <input type="text" name="name" class="form-control" id="InputName">
                    </div>
                    <div class="form-group">
                        <label for="InputPrice">Price</label>
                        <input type="number" name="price" class="form-control" id="InputPrice">
                    </div>
                    <div class="form-group mb-2">
                        <label for="InputDescription">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control" id="InputDescription"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="InputTotal">Total</label>
                        <input type="number" name="total" class="form-control" id="InputTotal">
                    </div>
                    <div class="form-group mb-2">
                        <label for="InputImage">Image</label>
                        <input type="file" name="image" class="form-control" id="InputImage">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </div>
<?= $this->endSection() ?>