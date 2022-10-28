<nav class="navbar navbar-expand-lg bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand  bg-primary rounded-pill px-3 text-white " href="#">TweetApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $config->app->base_url ?>/index.php">Ana Sayfa</a>
                </li>
            </ul>
            <?php if (!isset($_SESSION['username'])) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php"><i class="bi bi-box-arrow-in-right"></i> Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php"><i class="bi bi-person-fill"></i> Üye Ol</a>
                    </li>
                </ul>

                </ul>
            <?php else : ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            <?= $_SESSION['username'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userMenu">
                            <a class="dropdown-item" href="<?= $config->app->base_url ?>/userpage.php"><i class="bi bi-card-heading"></i> Profil </a>
                            <a class="dropdown-item" href="<?= $config->app->base_url ?>/tweet.php"><i class="bi bi-file-earmark"></i> Mesaj Gönder </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= $config->app->base_url ?>/process.php?action=logout"><i class="bi bi-box-arrow-right"></i> Çıkış</a>
                        </div>
                    </li>
                </ul>
            <?php endif ?>
        </div>

    </div>
</nav>