<?php

spl_autoload_register('register_class');

function register_class($class)
{
    // register edilecek class için temel alınacak klasör
    $base_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
    // Dosyadan class Prefix bilgisini al';
    $prefix = json_decode(file_get_contents('autoload.json'))->prefix;
    // prefix uzunluğu ve kontrolü 
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // yoksa sonraki class yüklemesine geç
        return;
    }
    // prefix hariç class
    $relative_class = substr($class, $len);
    // Class dosyasının tam yolu
    $file = $base_dir . $relative_class . '.php';
    $file = str_replace('\\', '/', $file);
    // Class dosyasını yükle
    if (file_exists($file)) {
        require $file;
    }
}
