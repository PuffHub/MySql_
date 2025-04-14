 logout.php
<?php
require '../autoload.php';

use App\Services\AuthService;

$authService = new AuthService();
echo $authService->logout();
header("Location: login.php");
?>
