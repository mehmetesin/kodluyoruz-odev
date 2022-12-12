<div class="container mt-5">

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="card-title">Mesajınızı girin</h4>
                </div>
                <?php if (Session::get('errorMessage')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Hata!</strong> <?= Session::get('errorMessage') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <div class="card-body">
                    <form action="/user/addtweet" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Göndermek istediğiniz mesajı girin" id="post" name="post" style="height: 150px" row="4" cols="50" maxlength="180" required></textarea>
                                    <label for="message">Göndermek istediğiniz mesajı girin</label>
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
                </div>
            </div>
        </div>
    </div>

</div>