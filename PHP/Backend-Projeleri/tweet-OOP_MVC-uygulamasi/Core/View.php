<?php

namespace mEsin\Core;

class View
{
    public static function render($view_file, $params = [], $state = true): void
    {

        if ($state) {
            $dirname = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;
            $header_file = $dirname . 'Template/header.php';
            $content_file = $dirname . $view_file . 'View.php';
            $footer_file = $dirname . 'Template/footer.php';

            View::load($header_file, $params);
            View::load($content_file, $params);
            View::load($footer_file, $params);
        } else {
            $dirname = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;
            $content_file = $dirname . $view_file . 'View.php';
            View::load($content_file, $params);
        }
    }

    private static function load($file, $params): void
    {
        if ($params != false) extract($params);
        if (file_exists($file)) {
            require_once($file);
        } else {
            die('view yüklenme hatası!');
        }
    }
}
