<?php require_once './init.php';

require_once './include/header.php';
require_once './include/navigate.php';

$posts = $db->query("SELECT u.name_surname, u.username as username, p.post as post, p.created_at as created_at  FROM {$config->db->prefix}posts p join {$config->db->prefix}users u on p.user_id = u.id ORDER BY p.created_at DESC", PDO::FETCH_OBJ)

?>

<div class="container mt-5">
    <?php if ($posts->rowCount() > 0) :
        foreach ($posts as $post) : ?>
            <div class="card bg-white mb-3">
                <div class="card-body">

                    <span><?= $post->post ?></span>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between ">
                        <h5><?= $post->name_surname ?> - [<?= $post->username ?>]</h5><span><?= date('d/m/Y - H:i:s', strtotime($post->created_at)) ?></span>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    else : ?>
        <div class="alert alert-danger" role="alert">
            Henüz hiç tweet yok!
        </div>
    <?php
    endif ?>
</div>

<?php require_once './include/footer.php' ?>