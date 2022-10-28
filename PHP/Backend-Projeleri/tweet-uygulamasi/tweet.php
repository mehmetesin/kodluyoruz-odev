<?php require_once './init.php';

require_once './include/header.php';
require_once './include/navigate.php';

$result = new stdClass();


if (isset($_SESSION['username'])) {
    $result->error = false;
    $result->message = "";
} else {
    $result->error = true;
    $result->message = "Sadece kayıtlı kullanıcılar mesaj gönderebilir. <br>Kayıtlı değilseniz <a href='./signup.php'>tıklayın!</a>";
}
?>



<div class="container mt-5">

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php if (isset($result->error) && $result->error) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $result->message ?>
                </div>
            <?php else : ?>
                <h4 class="mb-4">Mesajınızı girin</h4>
                <form action="./process.php?action=newTweet" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Göndermek istediğiniz mesajı girin" id="post" name="post" style="height: 150px" row="4" cols="50" maxlength="180" required></textarea>
                                <label for="post">Göndermek istediğiniz mesajı girin</label>
                            </div>
                            <span class="text-danger">* Mesajınız 180 karekteri geçmemelidir!</span>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary w-100">Gönder</button>
                        </div>
                    </div>
                </form>
            <?php endif ?>

        </div>
    </div>

</div>


<?php require_once './include/footer.php' ?>