<?php
namespace App\Core;

interface AuthInterface {
    public function login($email, $password);
    public function logout();
}
?>

 Step 3: Define a Trait (LoggerTrait)
Used to log user activity.
<?php
namespace App\Core;

trait LoggerTrait {
    public function logActivity($message) {
        echo "[LOG]: " . $message . "<br>";
    }
}
?>
