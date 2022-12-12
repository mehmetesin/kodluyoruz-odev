<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="">
                <div class="card-header">
                    <!-- <a class=" btn btn-primary" href="/user/addtweet" role="button">Yeni Mesaj</a> -->
                </div>
                <?php if ($userInfo) : ?>
                    <ol class="list-group shadow-sm ">

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Kullanıcı adı</div>
                                <?= $userInfo->username ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Adı Soyadı</div>
                                <?= $userInfo->name_surname ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">E-posta adresi</div>
                                <?= $userInfo->email ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Tweet</div>
                                Gönderilen tweet sayısı
                            </div>
                            <span class="badge bg-primary rounded-pill"><?= count($posts) ?></span>
                        </li>
                    </ol>
                <?php else : ?>
                <?php endif ?>
            </div>
        </div>
        <div class="col-md-6 card shadow-sm p-2">
            <div class="d-flex justify-content-between ">
                <h4>Gönderilen Mesajlar</h4><a class=" btn btn-sm btn-primary mb-2" href="/user/addtweet" role="button">Yeni Mesaj</a>
            </div>
            <?php foreach ($posts as $post) : ?>
                <div class="card mb-3">
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
            endforeach; ?>
        </div>
        <div class="col-md-3">
            <ol class="list-group shadow-sm mb-3">
                <li class="list-group-item">
                    <div class="ms-2 me-auto">
                        <div class="pb-1 fw-bold">Takip istekleri</div>
                        <?php if ($followRequest) : ?>
                            <?php foreach ($followRequest as $request) : ?>
                                <div class="d-flex justify-content-between align-items-start my-2">
                                    <span><?= $request->username ?></span>

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-sm btn-success" href="/user/followOK/<?= $request->id ?>" title="Takip et"></i><i class="bi bi-check"></i></a>
                                        <a class="btn btn-sm btn-danger" href="/user/followNO/<?= $request->id ?>" title="Reddet"><i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php else : ?>
                            <div class="text-black-50">takip isteği almadınız</div>
                        <?php endif ?>
                    </div>
                </li>
            </ol>
            <ol class="list-group shadow-sm mb-3">
                <li class="list-group-item">
                    <div class="fw-bold">Takip Edilenler</div>
                    <?php if ($followed) : ?>
                        <?php foreach ($followed as $request) : ?>
                            <div><a class="btn btn-link" href="/user/friendprofile/<?= $request->followed_id ?>"><?= $request->name_surname ?><span class="text-black-50"> @<?= $request->username ?></span></a></div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="text-black-50">Takip ettiğiniz kullanıcı yok</div>
                    <?php endif ?>
                </li>
            </ol>
        </div>
    </div>
</div>