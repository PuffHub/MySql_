<?php
require '../autoload.php';

use App\Services\AuthService;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $authService = new AuthService();
    echo $authService->login($email, $password);
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
