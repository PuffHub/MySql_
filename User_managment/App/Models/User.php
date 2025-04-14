<?php
namespace App\Models;

use App\Core\Database;
use App\Core\AbstractUser;

class User extends AbstractUser {
    private $pdo;

    public function __construct($name, $email, $password, $role = 'user') {
        parent::__construct($name, $email, $password);
        $this->pdo = Database::getInstance()->getConnection();
        $this->role = $role;
    }

    public function userRole() {
        return $this->role;
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->name, $this->email, $this->password, $this->role]);
    }

    public static function findByEmail($email) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
?>
