<?php

require_once './init.php';

if (isset($_SESSION['username'])) Header('Location: index.php');

require_once './include/header.php' ?>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
<link href="signin.css" rel="stylesheet">

<main class="form-signin w-100 m-auto">
    <form action="./process.php?action=signin" method="POST">
        <h1 class="h3 mb-3 fw-normal">Lütfen giriş yapın</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı adınız">
            <label for="username">Kullanıcı adınız</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Parola</label>
        </div>

        <div class="checkbox mb-3">
            Kayıtlı değilseniz <a href="./signup.php">tıklayın!</a>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Oturum aç</button>
    </form>
</main>

<?php require_once './include/footer.php' ?>