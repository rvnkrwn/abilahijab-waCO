<?php
    session()->start();
    $validation = \Config\Services::validation();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keyword" content="abila login, abila hijab login, abilahijab login, grosir hijab login, hijab murah login, toko hijab login, toko abila login, hijab abila login, Abila Hijab login">
    <meta name="description" content="<?= $description ?>">
    <meta name="author" content="AbilaHijab">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <title><?= $name ?> | <?= $title ?></title>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            background-color:hsla(0,100%,50%,1);
            background-image:
                    radial-gradient(at 40% 20%, hsla(28,100%,74%,1) 0px, transparent 50%),
                    radial-gradient(at 80% 0%, hsla(189,100%,56%,1) 0px, transparent 50%),
                    radial-gradient(at 0% 50%, hsla(355,100%,93%,1) 0px, transparent 50%),
                    radial-gradient(at 80% 50%, hsla(340,100%,76%,1) 0px, transparent 50%),
                    radial-gradient(at 0% 100%, hsla(22,100%,77%,1) 0px, transparent 50%),
                    radial-gradient(at 80% 100%, hsla(242,100%,70%,1) 0px, transparent 50%),
                    radial-gradient(at 0% 0%, hsla(343,100%,76%,1) 0px, transparent 50%);
        }
        #form {
            max-width: 500px;
            min-height: 400px;
            background: rgba(255, 255, 255, 0.2);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 15px rgba(100, 100, 100, 0.49);
            padding: 2em;
            border-radius: 20px;
        }
        form div.input {
            background: transparent;
        }
        input.input {
            background: rgba(255, 255, 255, 0.41);
            width: 100%;
            outline: none;
            border: none;
        }
        input.input::placeholder {
            color: rgba(0, 0, 0, 0.65);
            font-size: smaller;
        }
        #error {
            font-size: x-small;
        }
        button.btn {
            background: rgba(255, 255, 255, 0.44);
            color: rgba(0, 0, 0, 0.65);
        }
        button.btn:hover {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid transparent;
        }
    </style>
</head>
<body class="p-5">
<section id="form">
    <h1  class="fs-1 mx-auto text-center text-white" style="margin-top: -25%; margin-bottom: 20px"><i class="fas fa-user-circle shadow-lg rounded-circle" style="font-size: 80px;"></i></h1>
    <h4 class="text-center mb-5 text-white">Register</h4>
    <form method="post" action="/register" class="my-2">
        <?= csrf_field() ?>
        <div class="input mb-2" style="min-width: 280px">
            <input type="text" name="name" class="input form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="InputName" placeholder="Full Name" onkeyup="if(document.querySelector('#InputName').value){document.querySelector('#InputName').classList.remove('is-invalid');}">
            <small id="error" class="text-danger"><?= $validation->getError('name') ?></small>
        </div>
        <div class="input mb-2" style="min-width: 280px">
            <input type="text" name="email" class="input form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="InputEmail" aria-describedby="emailHelp" placeholder="Email" onkeyup="if(document.querySelector('#InputEmail').value){document.querySelector('#InputName').classList.remove('is-invalid');}">
            <small id="error" class="text-danger"><?= $validation->getError('email') ?></small>
        </div>
        <div class="input mb-2">
            <input type="password" name="password" class="input form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="InputPassword" placeholder="Enter your password" onkeyup="if(document.querySelector('#InputPassword').value){document.querySelector('#InputName').classList.remove('is-invalid');}">
            <small id="error" class="text-danger"><?= $validation->getError('password') ?></small>
        </div>
        <div class="mb-2 text-white mx-1" style="font-size: smaller;">
            <input type="checkbox" class="form-check-input" id="Check" required>
            <label class="form-check-label" for="Check">I agree terms and service</label>
        </div>
        <div class="d-flex justify-content-between w-100">
            <button type="submit" class="btn">Submit</button>
            <div class="text-white align-self-center">Have an account? <a href="/login" class="block text-white align-self-center">here</a></div>
        </div>
    </form>
</section>

<script src="/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>