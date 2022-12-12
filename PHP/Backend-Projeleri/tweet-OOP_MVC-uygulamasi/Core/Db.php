<?php

namespace mEsin\Core;

use Env;

class Db
{
    public $cn;

    public function __construct()
    {
        try {
            $this->cn = new \PDO('mysql:host=' . Env::$dbServer . ';dbname=' . Env::$dbName . ';charset=' . Env::$dbCharset, Env::$dbUsername, Env::$dbPassword);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}
