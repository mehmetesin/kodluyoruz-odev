<?php
require_once './router.php';

$router = new m_esin\Router([
    'controller' => 'Controller',
    'prefix' => 'm_esin'
]);

$router->get('/', 'Home@Index');

$router->get('/about', function () {
    echo '<h1>About Page</h1>';
});


$router->get('/blog/([0-9]+)', function ($id) {
    echo 'blog id: ' . $id;
});

$router->post('/blog', function () {
    echo '<pre>';
    print_r($_POST);
});

$router->run();
