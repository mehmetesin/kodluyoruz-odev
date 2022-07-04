<?php require_once './Helper/config.php'; ?>

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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Ürünler</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <span class="bi bi-cart4 cart-icon"></span>
                            <span class="badge badge-danger rounded-pill cartCount"><?= isset($summary['count']) && $summary['count'] ? $summary['count'] : 0 ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if ($state) : ?>
            <h2 class="p-4 text-center">Sepette toplam <span class="text-danger"><?= isset($summary['count']) && $summary['count'] ? $summary['count'] : 0 ?></span> ürün var.</h2>

            <div class="shadow-sm bg-white">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">Resim</th>
                            <th class="align-middle text-center" width="50%">Kitap Adı</th>
                            <th class="align-middle text-center">Miktar</th>
                            <th class="align-middle text-center">Tutar</th>
                            <th class="align-middle text-center"><button class="btn btn-sm btn-danger clearCart">Sepeti Boşalt</button></th>
                        </tr>
                    </thead>
                    <tbody class="cartList">
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td class="align-middle"><img src="<?= './assets/images/' . $product['image'] ?>" alt="<?= $product['title'] ?>" height="50"></td>
                                <td class="align-middle"><?= $product['title'] ?></td>
                                <td class="align-middle">
                                    <div class="d-flex align-item-center">
                                        <button class="btn btn-sm btn-success increase" book-id="<?= $product['id'] ?>">+</button>
                                        <input class="form-control mx-1" type="text" id="<?= $product['id'] ?>" value="<?= $product['count'] ?>">
                                        <button class="btn btn-sm btn-danger decrease" book-id="<?= $product['id'] ?>">-</button>

                                    </div>
                                </td>
                                <td class="align-middle text-right" id="rowPrice<?= $product['id'] ?>"><?= $product['count'] * $product['price'] ?></td>
                                <td class="align-middle text-center" width="140"><button class="btn btn-sm btn-warning delete" book-id="<?= $product['id'] ?>">Sepetten Çıkar</button></td>
                            </tr>
                    </tbody>
                <?php endforeach ?>
                <tfoot>
                    <tr>
                        <td colspan="3"><span class="text-danger summaryCount"><?= $summary['count'] ?></span> adet</td>
                        <td colspan="2">Toplam tutar <span class="text-danger summaryPrice"><?= $summary['price'] ?></span></td>
                    </tr>
                </tfoot>
                </table>
            </div>
        <?php else : ?>
            <h2 class="p-4 text-center">Sepette hiç ürününüz yok ürün eklemek için <a href="index.php">tıklatın</a> </h2>

        <?php endif ?>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {

            $('.increase').click(function() {
                let id = ($(this).attr('book-id'));
                $.post("./cart-process.php", {
                        id: id,
                        process: "increase"
                    },
                    function(data, status) {
                        let res = JSON.parse(data)
                        // alert(a.summary.count);
                        $('.cartCount').text(res.summary.count)
                        // alert('#'+id)
                        $('#' + id).val(res.product[id].count)
                        $('#rowPrice' + id).text((res.product[id].count * res.product[id].price).toFixed(2))
                        $('.summaryCount').text(res.summary.count)
                        $('.summaryPrice').text(res.summary.price)
                    });
            })

            $('.decrease').click(function() {
                let id = ($(this).attr('book-id'));
                $.post("./cart-process.php", {
                        id: id,
                        process: "decrease"
                    },
                    function(data, status) {
                        let res = JSON.parse(data)
                        // alert(a.summary.count);
                        $('.cartCount').text(res.summary.count)
                        // alert('#'+id)
                        $('#' + id).val(res.product[id].count)
                        $('#rowPrice' + id).text((res.product[id].count * res.product[id].price).toFixed(2))
                        $('.summaryCount').text(res.summary.count)
                        $('.summaryPrice').text(res.summary.price)
                    });
            })

            $('.delete').click(function() {
                let tr = $(this).closest("tr")
                let id = ($(this).attr('book-id'));
                $.post("./cart-process.php", {
                        id: id,
                        process: "delete"
                    },
                    function(data, status) {
                        let res = JSON.parse(data)

                        if (res.summary['count'] = 0) {
                            location.reload();
                        }

                        if (res.status) {
                            tr.remove();
                            $('.cartCount').text(res.summary.count)
                            // alert('#'+id)
                            $('.summaryCount').text(res.summary.count)
                            $('.summaryPrice').text(res.summary.price)
                        }
                    });
            })

            $('.clearCart').click(function() {
                $.post("./cart-process.php", {
                        process: "clear"
                    },
                    function(data, status) {
                        if (data) {
                            location.reload();
                        }
                    });
            })
        })
    </script>
</body>

</html>