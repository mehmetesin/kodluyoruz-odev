<div class="container mt-5">


    <?php if (Session::isLogin()) : ?>
        <?php if (Session::get('errorMessage')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hata!</strong> <?= Session::get('errorMessage') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php Session::del('errorMessage');
        endif ?>
        <?php if ($posts && $count > 0) :
            foreach ($posts as $post) : ?>
                <div class="card mb-3 card shadow-sm">
                    <div class="card-header d-flex justify-content-between ">
                        <div>
                            <span class="h5"><?= $post->name_surname ?></span>
                            <span class="mx-1 fs-5 text-secondary text-opacity-50">@<?= $post->username ?></span>
                            ·
                            <span class="fs-6 mx-2"><?= date('d/m/Y - H:i:s', strtotime($post->post_created)) ?></span>
                        </div>
                        <?php if ($post->user_id != Session::get('userId')) : ?>
                            <a class="btn-link" href="/user/follow/<?= $post->user_id ?>" title="Takip et"><i class="bi bi-person-heart"></i></i></a>
                        <?php endif ?>
                    </div>
                    <div class="card-body">

                        <span><?= $post->post ?></span>
                    </div>
                </div>
            <?php
            endforeach;
        else : ?>
            <div class="alert alert-danger" role="alert">
                Henüz hiç tweet yok!
            </div>
        <?php
        endif;
    else : ?>
        <div class="container">
            <p class="display-5">Lütfen önce giriş yapın!</p>
            <p>Mesajları görmek, mesaj göndermek ve takip yapabilmek için giriş yapmalısınız! </p>
            Giriş yapmak için <a href="/user/signin">tıklayın</a>
            <hr class="my-4">
            <p class="lead">
                <span>Üye değilseniz kayıt olmak için</span>
                <a href="/user/signup">tıklayın</a>
            </p>
        </div>
    <?php endif; ?>
</div>