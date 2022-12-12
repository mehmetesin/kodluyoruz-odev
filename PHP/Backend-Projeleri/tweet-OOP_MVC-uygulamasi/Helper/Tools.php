<?php

session_start();

class Env
{
    public static $dbServer = '127.0.0.1';
    public static $dbCharset = 'utf8mb4';
    public static $dbUsername = 'root';
    public static $dbPassword = 'asdf';
    public static $dbName = 'patika';
    public static $dbTbl_users = 'tweet_users';
    public static $dbTbl_posts = 'tweet_posts';
    public static $dbTbl_follow = 'tweet_follow';
}

class Tools
{
    public static function dump($arg)
    {
        echo '<pre>';
        print_r($arg);
        echo '</pre>';
    }

    public static function _Get($field)
    {
        return htmlspecialchars(strip_tags(trim($_GET[$field])));
    }

    public static function _Post($field)
    {
        return htmlspecialchars(strip_tags(trim($_POST[$field])));
    }

    public static function redirect($url, $time = FALSE)
    {
        $time ? Header('Refresh:' . $time . '; url=' . $url) : Header('Location: ' . $url);
        exit();
    }
}

class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? FALSE;
    }

    public static function del($key)
    {
        unset($_SESSION[$key]);
    }

    public static function login($user, $password, $hash)
    {
        if (password_verify($password, $hash)) {
            Session::set('userId', $user->id);
            Session::set('username', $user->username);
            Session::set('name', $user->name_surname);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function isLogin()
    {
        return self::get('username') ? TRUE : FALSE;
    }
}
