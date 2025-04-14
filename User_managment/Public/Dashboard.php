<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . $_SESSION['user']['name'] . "! Your role is: " . $_SESSION['user']['role'];
?>
<a href="logout.php">Logout</a>
