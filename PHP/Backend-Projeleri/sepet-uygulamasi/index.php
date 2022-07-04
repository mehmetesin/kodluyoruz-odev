<?php
require_once './Helper/config.php';

$books = $db->query('SELECT * FROM patika.books', PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Sepet Uygulaması</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">

            <span class="navbar-brand">Sepet Uygulaması</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Ürünler</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="cart.php">
                            <span class="bi bi-cart4 cart-icon"></span>
                            <span class="badge badge-danger rounded-pill cartCount"><?= isset($summary['count']) && $summary['count'] ? $summary['count'] : 0 ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="p-4">Ürünler</h1>
        <div class="product-list">
            <div class="row mb-5">
                <?php foreach ($books as $book) : ?>
                    <div class="col-sm-3 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $book->title ?></h5>
                                <div class="text-center">
                                    <img src="<?= './assets/images/' . $book->image ?>" alt="">
                                </div>
                                <div class="mt-3">
                                    <p class=""><?= $book->description ?></p>
                                    <p class="card-text">Fiyat : <b><?= $book->price ?>₺</b></p>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-success w-100 addCart" book-id=<?= $book->id ?>>
                                    <i class="bi bi-cart-plus"></i> Sepete Ekle
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {

            $('.addCart').click(function() {
                let id = ($(this).attr('book-id'));
                $.post("./cart-process.php", {
                        id: id,
                        process: "add"
                    },
                    function(data, status) {
                        let res = JSON.parse(data)
                        $('.cartCount').text(res.summary.count)
                    });

            })
        })
    </script>
</body>

</html>