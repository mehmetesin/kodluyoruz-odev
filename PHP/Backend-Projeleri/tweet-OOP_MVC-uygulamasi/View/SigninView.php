<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Public/assets/css/style.css">
    <title>Oturum aç</title>
</head>

<body>
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
    <link href="/Public/assets/css/signin.css" rel="stylesheet">

    <main class="form-signin w-100 m-auto">
        <form action="/user/signin" method="POST">
            <h1 class="h3 mb-3 fw-normal">Lütfen giriş yapın</h1>
            <?php if (Session::get('errorMessage')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hata!</strong> <?= Session::get('errorMessage') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı adınız">
                <label for="username">Kullanıcı adınız</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Parola</label>
            </div>

            <div class="checkbox mb-3">
                Kayıtlı değilseniz <a href="/user/signup">tıklayın!</a>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Oturum aç</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>