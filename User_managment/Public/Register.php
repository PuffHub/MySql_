<?php
require '../autoload.php';

use App\Models\User;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($name, $email, $password);
    if ($user->save()) {
        echo "User registered successfully. <a href='login.php'>Login here</a>";
    } else {
        echo "Error registering user.";
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
