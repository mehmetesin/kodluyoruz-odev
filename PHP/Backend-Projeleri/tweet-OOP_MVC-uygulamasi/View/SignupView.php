<div class="container mt-5">

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="mb-4">Üye olmak için bilgilerinizi giriniz.</h4>
            <?php if (Session::get('errorMessage')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hata!</strong> <?= Session::get('errorMessage') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <form action="/user/signup" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nameSurname">Adınız ve Soyadınız</label>
                        <input type="text" class="form-control" id="nameSurName" name="nameSurname" placeholder="Adınız ve Soyadınız" value="" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Kullanıcı adı</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı adı" required>

                    </div>
                </div>
                <div class="mb-3 mb-4">
                    <label for="password">Parola <span class="text-muted"></span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="parola" required>
                </div>
                <div class="mb-3 mb-4">
                    <label for="email">E-posta <span class="text-muted"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="adsoyad@ornek.com" required>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary w-100">Kayıt Ol</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>