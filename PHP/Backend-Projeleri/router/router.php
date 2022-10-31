<?php

namespace m_esin;

class Router
{
    private array $routes = [];
    private string $controller_path;
    private string $prefix;

    public function __construct($params = [
        'controller' => 'Controller',
        'prefix' => ''
    ])
    {
        $this->controller_path = $params['controller'];
        $this->prefix = $params['prefix'];
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function put($path, $callback)
    {
        $this->routes['put'][$path] = $callback;
    }

    public function delete($path, $callback)
    {
        $this->routes['delete'][$path] = $callback;
    }


    public function run()
    {
        $find = false;

        $req_method = strtolower($_SERVER['REQUEST_METHOD']);
        $basedir = dirname($_SERVER['SCRIPT_NAME']);
        $uri = $_SERVER['REQUEST_URI'];
        $request = str_replace($basedir, '', $uri);
        foreach ($this->routes[$req_method] as $path => $callback) {
            if (preg_match("#^{$path}$#", $request, $mathes)) {

                unset($mathes[0]);
                $params = $mathes;
                $find = true;
                if (is_callable($callback)) {
                    call_user_func_array($callback, $params);
                    break;
                } else {

                    [$controller, $method] = explode('@', $callback);
                    $controller_file_name =  $this->controller_path . DIRECTORY_SEPARATOR . $controller . '.php';
                    $controller_name = $this->prefix . '\\' . $this->controller_path . '\\' . $controller;

                    if (file_exists($controller_file_name)) {
                        include_once($controller_file_name);
                    } else {
                        $find = false;
                    }

                    if (method_exists($controller_name, $method)) {
                        call_user_func([new $controller_name, $method]);
                        break;
                    } else {
                        $find = false;
                    }
                }
            }
        }
        if (!$find) {
            echo '<h1>Sayfa bulunamadı!</h1>';
        }
    }
}
