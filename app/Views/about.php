<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

    <section id="about" class="p-4 container-md d-flex justify-content-center flex-column-reverse flex-lg-row min-vh-100">
        <div class="mx-auto p-8 align-self-center container-sm">
            <h1 class="fs-2 fw-semibold">About US</h1>
            <p>
                ABILAHIJAB merupakan distributor hijab yang hadir sejak tahun 2019. Komitmen tulus kami untuk menjadikan para muslimah bergaya fresh dan fashionable dengan menyediakan produk-produk hijab dengan harga yang terjangkau, bahan berkualitas, desain yang menarik dan nyaman dipakai
            </p>
            <a href="#content"><button type="button" class="btn btn-primary rounded-0 py-2 px-4 shadow">Learn More</button></a>
        </div>
        <div class="w-75 mx-auto align-self-center" style="max-width: 500px;">
            <img src="/assets/img/undraw_web_shopping_re_owap.svg" alt="" style="width: 100%;">
        </div>
    </section>
    <section id="content" class="min-vh-100">

    </section>

    <script>
        function Scrolldown() {
            window.scroll(0,100);
        }

        window.onload = Scrolldown;
    </script>
<?= $this->endSection() ?>