<?php

namespace mEsin\Core;

use mEsin\Core\View;

class Controller
{
    public static function view($view, $params = [], $state = true): void
    {
        View::render($view, $params, $state);
    }

    public static function Model($model)
    {
        $dirname = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR;
        $filename = $dirname . $model . 'Model.php';

        if (file_exists($filename)) {
            require_once $filename;
            if (class_exists($model)) {
                return new $model;
            } else {
                exit($model . " sınıfı bulunamadı");
            }
        } else {
            exit($model . ' model dosyası bulunamadı');
        }
    }
}
