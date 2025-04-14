<?php
namespace App\Services;

use App\Models\User;
use App\Core\AuthInterface;

class AuthService implements AuthInterface {
    public function login($email, $password) {
        $userData = User::findByEmail($email);
        if ($userData && password_verify($password, $userData['password'])) {
            session_start();
            $_SESSION['user'] = $userData;
            return "User logged in successfully.";
        }
        return "Invalid credentials.";
    }

    public function logout() {
        session_start();
        session_destroy();
        return "User logged out.";
    }
}
?>
