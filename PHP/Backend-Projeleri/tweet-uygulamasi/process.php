<?php
include_once './init.php';
$result = new stdClass();

// header('Content-Type: application/json; charset=utf-8');

function signin($userInfo): void
{
    global $db, $config, $result;

    $stmt = $db->prepare("SELECT * FROM {$config->db->prefix}users WHERE username = ? LIMIT 1");
    $stmt->execute([$userInfo->username]);
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    // exit('gelen kullanıcı : ' . $userInfo->username . ' | ' . 'sistemdeki :' . $user->username . '<br>' . 'gelen parola :' . $userInfo->password . ' | ' . 'Sistemdeki :' . $user->password . '<br>');

    if (isset($user->password) && password_verify($userInfo->password, $user->password)) {
        $result->error = false;
        $result->message = "";
        $_SESSION['username'] = $user->username;
        Header('Location: userpage.php');
        // Header('Refresh:2; url=index.php');
    } else {
        $result->error = true;
        $result->message = "Kullanıcı bilgileri hatalı!";
    }
}

function signup($userInfo): void
{
    global $result, $db, $config;

    $name_surname = trim($userInfo->name_surname) !== '' ? $userInfo->name_surname : false;
    $username = trim($userInfo->username) !== '' ? $userInfo->username : false;
    $password = trim($userInfo->password) !== '' ? $userInfo->password : false;
    $email = trim($userInfo->email) !== '' ? $userInfo->email : false;
    if ($name_surname && $username && $password && $email) {
        $stmt = $db->prepare("SELECT * FROM {$config->db->prefix}users WHERE username=? LIMIT 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if ($user) {
            $result->error = true;
            $result->message = "Bu kullanıcı adı uygun değil";
        } else {
            $stmt = $db->prepare("INSERT INTO {$config->db->prefix}users SET name_surname=?, username=?, email=?, password=? ");
            $res = $stmt->execute([$name_surname, $username,  $email, $password]);
            if ($res) {
                $result->error = false;
                $result->message = "Başarı ile üye oldunuz'<br>Ana sayfaya 2sn içinde yönleneceksiniz!";
                $_SESSION['username'] = $username;
                Header('Refresh:2; url=index.php');
            } else {
                $result->error = true;
                $result->message = "İşlem tamamalanamadı'<br>Üyelik bilgileri kaydedilemedi!";
            }
        }
    } else {
        $result->error = true;
        $result->message = "Girilen bilgiler eksik veya hatalı!";
    }
}

function new_tweet($post): void
{
    global $result, $db, $config;
    $post = trim($post) !== '' ? $post : false;
    if ($post && strlen($post) < 180) {
        $stmt = $db->prepare("SELECT * FROM {$config->db->prefix}users WHERE username=? LIMIT 1");
        $stmt->execute([$_SESSION['username']]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user->id) {
            $stmt = $db->prepare("INSERT INTO {$config->db->prefix}posts SET user_id=?, post=?");
            $res = $stmt->execute([$user->id, $post]);
            if ($res) {
                $result->error = false;
                $result->message = "Mesajınız başarılı bir şekilde gönderildi!";
                Header('Refresh:2; url=index.php');
            } else {
                $result->error = true;
                $result->message = "Mesaj gönderilemedi!";
            }
        } else {
            $result->error = true;
            $result->message = "Mesaj gönderilemedi!";
        }
    }
}

function logout(): void
{
    session_destroy();
    Header('Location: index.php');
}

$action = $_GET['action'];

switch ($action) {
    case 'signin':
        $user = new stdClass();
        $user->username = htmlspecialchars(strip_tags($_POST['username']));
        $user->password = htmlspecialchars(strip_tags($_POST['password']));
        signin($user);
        break;
    case 'signup':
        $user = new stdClass();
        $user->name_surname = htmlspecialchars(strip_tags($_POST['nameSurname']));
        $user->username = htmlspecialchars(strip_tags($_POST['username']));
        $user->password = password_hash(htmlspecialchars(strip_tags($_POST['password'])), PASSWORD_DEFAULT);
        $user->email = htmlspecialchars(strip_tags($_POST['email']));
        signup($user);
        break;
    case 'newTweet':
        $post = htmlspecialchars(strip_tags($_POST['post']));
        new_tweet($post);
        break;
    case 'logout':
        logout();
        break;
}

require_once './include/header.php';
require_once './include/navigate.php' ?>

<div class="container mt-5">
    <?php if (isset($result->error) && $result->error) : ?>
        <div class="alert alert-danger" role="alert">
            <?= isset($result->message) ? $result->message : '' ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info" role="alert">
            <?= isset($result->message) ? $result->message : '' ?>
        </div>
    <?php endif ?>
</div>

<?php require_once './include/footer.php' ?>