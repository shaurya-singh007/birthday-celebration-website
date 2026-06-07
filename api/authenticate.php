<?php
ini_set('session.cookie_httponly', 1);
session_start();

// Hardcoded BCrypt hashes for 'ankita' and 'cutiee'
$hashes = [
    '$2b$10$yAd3xcqK/7W8Uq3nvri.teInEvNMv96JqI4HsSnHU0gG0tNRq4Ora', // 'ankita'
    '$2b$10$NqzexS/NQEYa3GJaBJxZ3uLdLqFZlPD9eI/c7b3VEXMgJH91t7516'  // 'cutiee'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $authenticated = false;
    foreach ($hashes as $hash) {
        if (password_verify($password, $hash)) {
            $authenticated = true;
            break;
        }
    }
    
    if ($authenticated) {
        $_SESSION['auth_status'] = true;
        header('Location: home.php');
        exit();
    } else {
        header('Location: index.php?error=1');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>
