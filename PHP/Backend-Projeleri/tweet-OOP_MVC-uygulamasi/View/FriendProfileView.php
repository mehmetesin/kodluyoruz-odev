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
                    </ol>
                <?php else : ?>
                <?php endif ?>
            </div>
        </div>
        <div class="col-md-9 card shadow-sm p-2">
            <div class="d-flex justify-content-between ">
                <h4>Gönderilen Mesajlar</h4>
            </div>
            <?php foreach ($posts as $post) : ?>
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between ">
                        <div>
                            <span class="fs-6"><?= date('d/m/Y - H:i:s', strtotime($post->post_created)) ?></span>
                        </div>
                    </div>
                    <div class="card-body">

                        <span><?= $post->post ?></span>
                    </div>
                </div>
            <?php
            endforeach; ?>
        </div>
    </div>
</div>