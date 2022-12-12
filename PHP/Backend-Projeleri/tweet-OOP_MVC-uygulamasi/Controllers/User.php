<?php

namespace mEsin\Controllers;

use mEsin\Core\Controller;
use Session;
use Tools;

class User extends Controller
{
    public function Signin()
    {
        Session::del('errorMessage');

        Session::isLogin() ? Tools::redirect('/user/profile') : null;

        if ($_POST) {
            $username = Tools::_Post('username');
            $password = Tools::_Post('password');

            $user = $this->Model('Users')->get($username);

            // var_dump($user);
            // die();
            if ($user) {
                $login = Session::login($user, $password, $user->password);
                $login ? Tools::redirect('/user/profile') : null;
            }

            Session::set('errorMessage', 'Kullanıcı bilgileri hatalı!');
            $this->view('Signin', [], false);
        }

        $this->view('Signin', [], false);
    }

    public function SignOut()
    {
        session_destroy();
        Tools::redirect('/');
    }

    public function Signup()
    {
        Session::del('errorMessage');

        Session::isLogin() ? Tools::redirect('/user/profile') : null;

        if ($_POST) {
            $name_surname = Tools::_Post('nameSurname') ?? FALSE;
            $username = Tools::_Post('username') ?? FALSE;
            $password = Tools::_Post('password') ?? FALSE;
            $email = Tools::_Post('email') ?? FALSE;

            if ($name_surname && $username && $password && $email) {
                $userInfo = (object) [
                    'name' => $name_surname,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'email' => $email
                ];
                $this->Model('Users')->Save($userInfo);
            } else {
                Session::set('errorMessage', 'Kullanıcı bilgileri boş bırakılamaz');
            }
        }

        $header = [
            'title' => 'Kayıt Ol'
        ];

        $params = [
            'header' => (object) $header
        ];

        $this->view('Signup', $params);
    }

    public function AddTweet()
    {
        Session::del('errorMessage');

        !Session::isLogin() ? Tools::redirect('/user/signin') : null;

        if ($_POST) {
            $id = Session::get('id');
            $post = Tools::_Post('post') ?? FALSE;

            if ($id && $post) {
                $tweet = (object) [
                    'id' => $id,
                    'post' => $post
                ];
                $this->Model('Tweet')->Save($tweet);
                Tools::redirect('/user/profile');
            } else {
                Session::set('errorMessage', 'Message boş bırakılamaz');
            }
        }

        $header = [
            'title' => 'Yeni mesaj'
        ];

        $content = [
            'user' => 'test'
        ];

        $params = [
            'header' => (object) $header,
            'content' => (object) $content
        ];

        $this->view('NewTweet', $params);
    }

    public function Profile()
    {
        !Session::isLogin() ? Tools::redirect('/') : null;

        $user_id = Session::get('userId');

        $posts = $this->Model('Tweet')->TweetByUser($user_id);

        $follow_request = $this->Model('Users')->GetFollowRequest($user_id);
        $followed = $this->Model('Users')->GetFollowed($user_id);

        $header = [
            'title' => 'Profil'
        ];

        $params = [
            'header' => (object) $header,
            'userInfo' => (object) $posts[0],
            'posts' => $posts,
            'followRequest' => (object) $follow_request,
            'followed' => (object) $followed
        ];

        $this->view('Profile', $params);
    }

    public function FriendProfile($id)
    {
        !Session::isLogin() ? Tools::redirect('/') : null;

        $followup_id =  Session::get('userId');
        $followed_id = $id[1];

        $is_follow = $this->Model('Users')->isFollow($followup_id, $followed_id);

        if ($is_follow == FALSE) die('takip etmiyorsun');

        $posts = $this->Model('Tweet')->TweetByUser($id[1]);

        $header = [
            'title' => 'Profil'
        ];

        $params = [
            'header' => (object) $header,
            'userInfo' => (object) $posts[0],
            'posts' => $posts,
        ];

        $this->view('FriendProfile', $params);
    }

    public function Follow($id)
    {
        Session::del('errorMessage');

        $followup_id = Session::get('userId');
        $followed_id = $id[1];

        $state = $this->Model('Users')->Follow($followup_id, $followed_id);

        switch ($state) {
            case 'OK':
                Tools::redirect($_SERVER['HTTP_REFERER']);
                break;
            case 'WAIT':
                Session::set('errorMessage', 'Kullanıcıya daha önce istek gönderilmiş, istek beklemede!');
                Tools::redirect($_SERVER['HTTP_REFERER']);
                break;
            case 'HATA':
                Session::set('errorMessage', 'İşlem tamamalanamadı<br>Kullanıcıya takip isteği gönderilemedi!');
                Tools::redirect($_SERVER['HTTP_REFERER']);
                break;
        }
    }

    public function FollowOK($id): void
    {
        $follow_id = $id[1];

        $res = $this->Model('Users')->FollowOK($follow_id);

        Tools::redirect($_SERVER['HTTP_REFERER']);
    }

    public function FollowNO($id): void
    {
        $follow_id = $id[1];

        $res = $this->Model('Users')->FollowNO($follow_id);
        Tools::redirect($_SERVER['HTTP_REFERER']);
    }
}
