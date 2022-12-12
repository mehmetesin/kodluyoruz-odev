<?php
require_once './Core/autoload.php';
require_once './Helper/Tools.php';

use mEsin\Core\Router;

$router = new Router([
    'controller' => 'Controllers',
    'prefix' => 'mEsin'
]);

// Route tanımlamaları
$router->get('/', 'Home@Index');

$router->get('/user/signin', 'User@Signin');
$router->post('/user/signin', 'User@Signin');

$router->get('/user/signout', 'User@Signout');

$router->get('/user/signup', 'User@Signup');
$router->post('/user/signup', 'User@Signup');

$router->get('/user/addtweet', 'User@AddTweet');
$router->post('/user/addtweet', 'User@AddTweet');

$router->get('/user/follow/([0-9]+)', 'User@Follow');
$router->get('/user/followOK/([0-9]+)', 'User@FollowOK');
$router->get('/user/followNO/([0-9]+)', 'User@FollowNO');

$router->get('/user/profile', 'User@Profile');
$router->get('/user/friendprofile/([0-9]+)', 'User@FriendProfile');


$router->run();
