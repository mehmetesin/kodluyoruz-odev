<?php
require_once './Helper/config.php';

// session_destroy();

if (isset($_POST)) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }


    switch ($_POST['process']) {

        case 'add':
            $book = $db->query("SELECT * FROM patika.books WHERE id ={$id}")->fetch(PDO::FETCH_ASSOC);

            $book['count'] = 1;

            if (isset($_SESSION['product'])) {
                $products = $_SESSION['product'];
                if (array_key_exists($id, $products)) {
                    $book['count'] = $products[$id]['count'] + 1;
                }
            }
            $products[$id] = $book;

            $sum = 0;
            $price = 0;
            foreach ($products as $product) {
                $sum += $product['count'];
                $price += $product['count'] * $product['price'];
            }

            $_SESSION['product'] = $products;
            $_SESSION['summary']['count'] = $sum;
            $_SESSION['summary']['price'] = number_format($price, 2);;

            echo json_encode($_SESSION);
            break;

        case 'increase':

            if (isset($_SESSION['product'])) {
                if (array_key_exists($id, $_SESSION['product'])) {
                    $_SESSION['product'][$id]['count'] = $_SESSION['product'][$id]['count'] + 1;
                }
            }

            $sum = 0;
            $price = 0;
            foreach ($_SESSION['product'] as $product) {
                $sum += $product['count'];
                $price += $product['count'] * $product['price'];
            }

            $_SESSION['summary']['count'] = $sum;
            $_SESSION['summary']['price'] = number_format($price, 2);;

            echo json_encode($_SESSION);

            break;

        case 'decrease':

            if (isset($_SESSION['product'])) {
                if (array_key_exists($id, $_SESSION['product'])) {
                    $_SESSION['product'][$id]['count'] = $_SESSION['product'][$id]['count'] > 1 ? $_SESSION['product'][$id]['count'] - 1 : 1;
                }
            }

            $sum = 0;
            $price = 0;
            foreach ($_SESSION['product'] as $product) {
                $sum += $product['count'];
                $price += $product['count'] * $product['price'];
            }

            $_SESSION['summary']['count'] = $sum;
            $_SESSION['summary']['price'] = number_format($price, 2);;

            echo json_encode($_SESSION);


            break;

        case 'delete':
            $_SESSION['status'] = false;

            if (isset($_SESSION['product'])) {
                if (array_key_exists($id, $_SESSION['product'])) {
                    if (count($_SESSION['product']) > 1) {
                        unset($_SESSION['product'][$id]);
                        $_SESSION['status'] = true;
                    }
                }
            }
            $sum = 0;
            $price = 0;
            foreach ($_SESSION['product'] as $product) {
                $sum += $product['count'];
                $price += $product['count'] * $product['price'];
            }

            $_SESSION['summary']['count'] = $sum;
            $_SESSION['summary']['price'] = number_format($price, 2);

            echo json_encode($_SESSION);

            break;

        case 'clear':
            unset($_SESSION['product']);
            unset($_SESSION['summary']);


            echo json_encode('true');

            break;
    }
}
