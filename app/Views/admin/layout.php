<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
    <style>
        ::-webkit-scrollbar {
            width: 15px;
            height: 15px;
        }
        ::-webkit-scrollbar-track {
            background: #a2a2a2;
        }
        ::-webkit-scrollbar-thumb {
            background: #464646;
        }
        .btn {
            margin: 0.25em;
        }
        .myCard {
            min-width: 300px;
        }
        .myCard i {
            min-width: 100px;
            min-height: 100px;
            font-size: 50px;
        }
        #chartSales {
            max-width: 100%;
            max-height: 300px;
        }
        #chartSalesBar {
            max-width: 100%;
            max-height: 200px;
        }
        #tableListUser {
            overflow-y: scroll;
            overflow-x: scroll;
            height: 60vh;
        }
        @media (max-width: 576px) {
            .myCard {
                max-width: 100%;
            }
            .myCard i {
                min-width: 120px;
                min-height: 120px;
                font-size: 60px;
            }
        }
        @media (min-width: 768px) {
            .myCard {
                min-width: 300px;
            }
            .myCard i {
                min-width: 110px;
                min-height: 110px;
                font-size: 55px;
            }
            #chartSales {
                max-width: 80%;
                max-height: 400px;
            }
            #tableListUser {
                overflow-y: scroll;
                overflow-x: hidden;
            }
        }
    </style>
</head>
<body class="d-flex vh-100 overflow-hidden">
<nav id="navbar" class="p-2 d-none position-fixed shadow-lg" style="background: rgb(26,20,50); min-width: 280px; max-width: 300px; height: 100vh; z-index: 9999999;">
    <ul class="list-unstyled d-flex justify-content-between text-white px-2 pt-1">
        <li class="fs-3 align-self-center">AbilaHijab</li>
        <li class="align-self-center"><i class="far fa-times border fs-5 px-2 py-1" style="cursor:pointer;" onclick="document.querySelector('nav#navbar').classList.replace('d-block','d-none')"></i></li>
    </ul>
    <ul class="list-unstyled text-white border-bottom border-top border-secondary p-2">
        <div class="d-flex py-2">
            <img src="https://i0.wp.com/abujametrofc.com.ng/wp-content/uploads/2018/12/Player-blank.png" alt="" width="50" class="align-self-center me-1 rounded-circle">
            <div class="mx-2 align-self-center" style="line-height: 1.5">
                <a class="d-block text-decoration-none text-white fs-5">Admin</a>
                <small class="d-block"><i class="fad fa-circle text-success"></i>&nbsp;online</small>
            </div>
        </div>
    </ul>
    <ul class="list-unstyled border-bottom border-secondary p-2" style="line-height: 2">
        <li><small class="text-white text-opacity-50">Dashboard</small></li>
        <li><a href="/admin" class="d-flex justify-content-between text-white text-decoration-none"><p class=""><i class="fas fa-home"></i>&nbsp;Home</p><i class="fal fa-angle-right text-white align-self-center"></i></a></li>
        <li><a href="/admin/users" class="d-flex justify-content-between text-white text-decoration-none"><p class=""><i class="fas fa-users"></i>&nbsp;Users</p><i class="fal fa-angle-right text-white align-self-center"></i></a></li>
        <li><a href="/admin/products" class="d-flex justify-content-between text-white text-decoration-none"><p class=""><i class="fas fa-box"></i>&nbsp;Products</p><i class="fal fa-angle-right text-white align-self-center"></i></a></li>
        <li><a href="/admin/reports" class="d-flex justify-content-between text-white text-decoration-none"><p class=""><i class="fas fa-chart-pie"></i>&nbsp;Reports</p><i class="fal fa-angle-right text-white align-self-center"></i></a></li>
    </ul>
    <ul class="list-unstyled border-bottom border-secondary p-2" style="line-height: 2">
        <li><small class="text-white text-opacity-50">User</small></li>
        <li><a href="/admin/u/setting" class="d-flex justify-content-between text-white text-decoration-none"><p class=""><i class="fas fa-cog"></i>&nbsp;Setting</p><i class="fal fa-angle-right text-white align-self-center"></i></a></li>
        <li><a onclick="logout()" class="d-flex justify-content-between text-white text-decoration-none" style="cursor: pointer"><p class=""><i class="fas fa-sign-out"></i>&nbsp;Logout</p><i class="fal fa-angle-right text-white align-self-center"></i></a></li>
    </ul>
</nav>
<main class="w-100 h-100" style="overflow-y: scroll; background:whitesmoke;">
    <header id="header" class="px-4 py-2 d-flex justify-content-between" style="background: rgb(15,9,39);">
        <i class="fas fa-bars p-2 border text-white align-self-center" style="cursor:pointer;" onclick="document.querySelector('nav#navbar').classList.replace('d-none','d-block')"></i>
        <div class="d-flex border p-2 align-self-center">
            <img src="https://i0.wp.com/abujametrofc.com.ng/wp-content/uploads/2018/12/Player-blank.png" alt="" width="30" class="align-self-center me-1 rounded-circle">
            <div class="mx-2 align-self-center" style="line-height: 1.5">
                <a class="d-block text-decoration-none text-white fs-6">Admin</a>
            </div>
        </div>
    </header>
    <?= $this->renderSection('content'); ?>
</main>
<script>
    const cts = document.getElementById('chartSales');
    const chartSales = new Chart(cts, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agt', 'Sep', 'Nov', 'Dec'],
            datasets: [{
                label: 'Sales Data',
                data: [12, 19, 3, 5, 2, 3, 1, 2, 3, 2, 15, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            },

                {
                    label: 'Product Data',
                    data: [10, 19, 5, 0, 0, 0, 0, 0, 0, 0, 15, 15],
                    backgroundColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'User Data',
                    data: [2, 0, 3, 5, 2, 3, 1, 2, 8, 2, 15, 5],
                    backgroundColor: [
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                },


            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

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
    function editUser(id){
        console.log(id)
    }
    function deleteUser(id){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete this user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: ' No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your user has been deleted.',
                    'success'
                );
                setTimeout(document.location=`/admin/delete/${id}`,5000)
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your user are safe :)',
                    'error'
                )
            }
        })
    }

    function deleteProduct(id){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete this product!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: ' No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your product has been deleted.',
                    'success'
                );
                setTimeout(document.location=`/admin/delete-product/${id}`,5000)
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your user are safe :)',
                    'error'
                )
            }
        })
    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>