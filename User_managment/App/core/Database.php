<?php
namespace App\Core;

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $config = require __DIR__ . '/../../config.php';
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8";
        $this->pdo = new \PDO($dsn, $config['username'], $config['password']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
