<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Public/assets/css/style.css">
    <title><?= $header->title ?? null ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/"><span class="fs-3 bg-primary rounded-pill px-3 text-white">t</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Ana Sayfa</a>
                    </li>
                </ul>
                <?php if (!(Session::get('username'))) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/user/signin"><i class="bi bi-box-arrow-in-right"></i> Giriş Yap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/signup"><i class="bi bi-person-fill"></i> Üye Ol</a>
                        </li>
                    </ul>

                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="userMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <?= Session::get('name') ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userMenu">
                                <a class="dropdown-item" href="/user/profile"><i class="bi bi-card-heading"></i> Profil </a>
                                <a class="dropdown-item" href="/user/addtweet"><i class="bi bi-file-earmark"></i> Mesaj Gönder </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/user/signout"><i class="bi bi-box-arrow-right"></i> Çıkış</a>
                            </div>
                        </li>
                    </ul>
                <?php endif ?>
            </div>
        </div>
    </nav>