<?php
// Expire the auth cookie by setting its time to past
setcookie('auth_status', '', time() - 3600, "/");

// Redirect to login page
header("Location: index.php");
exit();
?>
