<?php

require_once './init.php';

if (!isset($_SESSION['username'])) Header('Location: index.php');

require_once './include/header.php';
require_once './include/navigate.php';

$stmt = $db->prepare("SELECT * FROM {$config->db->prefix}users WHERE username=? LIMIT 1");
$stmt->execute([$_SESSION['username']]);
$user = $stmt->fetch(PDO::FETCH_OBJ);

$stmt = $db->prepare("SELECT count(*)as count FROM {$config->db->prefix}posts WHERE user_id=? ");
$stmt->execute([$user->id]);
$tweet = $stmt->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <a class=" btn btn-primary" href="<?= $config->app->base_url ?>/tweet.php" role="button">Yeni Tweet</a>
        </div>
        <?php if ($user) : ?>
            <ol class="list-group ">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Kullanıcı adı</div>
                        <?= $user->username ?>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Adı Soyadı</div>
                        <?= $user->name_surname ?>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">E-posta adresi</div>
                        <?= $user->email ?>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Tweet</div>
                        Gönderilen tweet sayısı
                    </div>
                    <span class="badge bg-primary rounded-pill"><?= $tweet->count ?></span>
                </li>
            </ol>
        <?php else : ?>
        <?php endif ?>
    </div>
</div>


<?php require_once './include/footer.php' ?>