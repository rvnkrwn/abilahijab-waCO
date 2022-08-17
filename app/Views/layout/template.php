<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keyword" content="abila, abila hijab, abilahijab, grosir hijab, hijab murah, toko hijab, toko abila, hijab abila, Abila Hijab,&nbsp;<?php
    $handle = fopen("keyword.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $line = str_replace(' ',', ',$line);
            echo $line;
        }
        fclose($handle);
    }
    ?>">
    <meta name="author" content="abilahijab">
    <meta name="copyright" content="Copyright AbilaHijab - 2022">
    <meta name="email" content="admin@abilahijab.com">
    <meta http-equiv="Content-Language" content="id">
    <meta name="Rating" content="General">
    <meta name="Distribution" content="Global">
    <meta name="Robots" content="INDEX,FOLLOW">
    <meta name="description" content="<?= $description ?>">
    <meta name="google-site-verification" content="mwuxabAl6N0oKrWVrY8llIpDzQRzEFfed0B7XEvebLo" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title><?= $name ?> | <?= $title ?></title>
    <style>
        @keyframes navbar {
            0% {
                transform: translateY(-100%);
            }
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(2,1fr);
            width: fit-content;
        }
        .cards .card {
            min-width: 8rem;
            border-radius: 0;
            margin: 5px;
        }
        .cards .card .card-body {
            padding: 8px;
        }
        .cards .card .card-body h6 {
            font-size: small;
        }
        .cards .card .card-body .card-text {
            font-size: smaller;
        }
        .cards .card .card-body .btn {
            border-radius: 0;
            padding: 4px 10px;
            width: 80px;
            height: 35px;
        }
        @media (min-width: 576px) {
            .cards {
                grid-template-columns: repeat(3,1fr);
            }
            .cards .card {
                width: 10rem;
            }
            .cards .card .card-body h6 {
                font-size: medium;
            }
            .cards .card .card-body .card-text {
                font-size: small;
            }
        }
        @media (min-width: 768px) {
            .cards .card {
                width: 12rem;
            }
            .cards .card .card-body h6 {
                font-size: large;
            }
            .cards .card .card-body .card-text {
                font-size: medium;
            }
        }
        @media (min-width: 992px) {
            .cards {
                grid-template-columns: repeat(4,1fr);
            }
        }
        @media (min-width: 1200px) {
            .cards .card {
                width: 15rem;
            }
        }
    </style>
</head>
<body class="bg-white">
<nav class="navbar navbar-expand-lg bg-white shadow-sm p-4" style="z-index: 999999;">
    <div class="container-sm">
        <div class="navbar-brand" style="line-height: 0.7;">
            <p class="fw-bold text-secondary" style="max-font-size: 20px; font-size: 2.5vw; font-family: 'Josefin Sans', sans-serif;">Grosir Jilbab Murah</p>
            <a class="navbar-brand fw-normal fs-6" href="/" style="font-family: 'Aboreto', cursive;">AbilaHijab</a>
        </div>
        <button class="border-0 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background: transparent;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-6" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" aria-current="page" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" aria-current="page" href="/about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fs-6 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <?php
                        if (session()->get('userid')):
                    ?>
                    <ul class="dropdown-menu px-2">
                        <li><a class="dropdown-item d-flex" href="/setting"><img src="https://i0.wp.com/abujametrofc.com.ng/wp-content/uploads/2018/12/Player-blank.png" alt="" width="20" class="align-self-center me-1"><span class="align-self-center ms-1"><?php $nameUser = explode(' ',$user['name']); echo $nameUser[0]; ?></span></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/setting">Setting</a></li>
                        <li><a class="dropdown-item text-bg-danger" style="cursor:pointer;" onclick="logout()">Logout</a></li>
                    </ul>
                    <?php
                        else:
                    ?>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/login">Login</a></li>
                        <li><a class="dropdown-item" href="/register">Register</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Chat WA</a></li>
                    </ul>
                    <?php
                    endif;
                    ?>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<section id="notifOngkir" class="d-flex flex-row justify-content-center bg-success bg-gradient text-white pt-2 px-2">
    <div class="align-self-center d-block p-1">
        <h6 class="" style="font-family: 'Poppins', sans-serif; font-size: 11px;">GRATIS ONGKIR untuk wilayah Pulau Jawa</h6>
    </div>
    <div class="align-self-center d-block" style="cursor:pointer;" onclick="document.querySelector('#notifOngkir').classList.add('d-none')">
        <ion-icon name="close-outline" class="fs-5 p-2"></ion-icon>
    </div>
</section>
<section id="notifChat" class="d-flex flex-row justify-content-center bg-secondary bg-gradient text-white pt-2 fs-6 px-2">
    <div class="align-self-center d-block p-1">
        <h6 class="" style="font-family: 'Poppins', sans-serif; font-size: 11px;">Harga Spesial Belanja Grosir <a href="" class="text-white">Chat admin kami sekarang juga</a></h6>
    </div>
    <div class="align-self-center d-block" style="cursor:pointer;" onclick="document.querySelector('#notifChat').classList.add('d-none')">
        <ion-icon name="close-outline" class="fs-5 p-2"></ion-icon>
    </div>
</section>
<main>
    <div class="">
        <?= $this->renderSection('content'); ?>
    </div>
</main>
</div>
<section class="" style="font-family: 'Josefin Sans', sans-serif;">
    <!-- Footer -->
    <footer class="bg-white text-black border-top">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h6 class="text-uppercase">Abila Hijab</h6>

                    <p class="fs-6">
                        ABILAHIJAB merupakan distributor hijab yang hadir sejak tahun 2019.
                        Komitmen tulus kami untuk menjadikan para muslimah bergaya fresh dan
                        fashionable dengan menyediakan produk-produk hijab dengan harga yang terjangkau,
                        bahan berkualitas, desain yang menarik dan nyaman dipakai

                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h6 class="text-uppercase">INFORMASI</h6>

                    <ul class="list-unstyled fs-6  mb-0 lh-lg">
                        <li>
                            <a href="#!" class="text-black text-decoration-none">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="#!" class="text-black text-decoration-none">FAQS</a>
                        </li>
                        <li>
                            <a href="#!" class="text-black text-decoration-none">Hubungi Kami</a>
                        </li>
                        <li>
                            <a href="#!" class="text-black text-decoration-none">Lokasi Toko</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h6 class="text-uppercase mb-2.5">NEWSLETTER</h6>
                    <ul class="list-unstyled fs-6 ">
                        <li>
                            <p>Jadilah yang pertama mendapatkan informasi tentang penawaran dan diskon terbaru dari kami.</p>
                        </li>
                        <li>
                            <form action="" method="post" class="border-bottom border-dark px-2 py-1" style="width: fit-content;">
                                <input type="email" name="email" id="email" placeholder="Enter your email" class="border-0" style="outline: none">
                                <button type="submit" class="border-0 bg-transparent"><i class="fal fa-envelope"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
        <div class="container p-4 pb-0 mx-auto text-center text-md-start">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #3b5998;"
                        href="#!"
                        role="button"
                ><i class="fab fa-facebook-f"></i
                    ></a>

                <!-- Twitter -->
                <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #55acee;"
                        href="#!"
                        role="button"
                ><i class="fab fa-twitter"></i
                    ></a>

                <!-- Google -->
                <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #dd4b39;"
                        href="#!"
                        role="button"
                ><i class="fab fa-google"></i
                    ></a>

                <!-- Instagram -->
                <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #ac2bac;"
                        href="#!"
                        role="button"
                ><i class="fab fa-instagram"></i
                    ></a>

                <!-- Linkedin -->
                <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #0082ca;"
                        href="#!"
                        role="button"
                ><i class="fab fa-linkedin-in"></i
                    ></a>
                <!-- Github -->
                <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #333333;"
                        href="#!"
                        role="button"
                ><i class="fab fa-github"></i
                    ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center px-3 pb-5 pt-2">
                <span>© <?= date('Y'); ?> Copyright
                <a class="text-black" href="https://abilahijab.com">AbilaHijab.com</a>
                </span>
            &nbsp;|&nbsp;<span class="d-inline-block">ditenagai oleh <a class="text-warning text-decoration-none" href="https://revank.me">Revan</a></span>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</section>
<section style="display: block; position: fixed; bottom: 10px; right: 10px; font-size: 30px; width: fit-content; height: fit-content; cursor:pointer;" onclick="window.scroll(0,0)">
    <ion-icon name="chevron-up-circle-outline"></ion-icon>
</section>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logout()
    {
        Swal.fire({
            title: 'Confirm Logout',
            text: "Are you sure want to Logout",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location="/logout";
            }
        })
    }
</script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('nav.navbar');
        if (scrollY > 50){
            navbar.classList.add('fixed-top');
            navbar.style.animation="navbar 1s";
        } else {
            navbar.classList.remove('fixed-top');
            navbar.style.animation="none";
        }
    });
</script>
<script defer type="text/javascript">
    function navActive() {
        const loc = window.location.pathname;
        const navLink = document.querySelector('.nav-link');
        const navLink1 = document.querySelector('.nav-item:nth-child(1) .nav-link');
        const navLink2 = document.querySelector('.nav-item:nth-child(2) .nav-link');
        const navLink3 = document.querySelector('.nav-item:nth-child(3) .nav-link');
        if (loc === "/") {
            navLink.classList.remove('active');
            navLink1.classList.add('active');
        } else if (loc === "/shop") {
            navLink.classList.remove('active');
            navLink2.classList.add('active');
        } else if (loc === "/about") {
            navLink.classList.remove('active');
            navLink3.classList.add('active');
        }
    }
    window.addEventListener('load', navActive);
</script>
</body>
</html>
