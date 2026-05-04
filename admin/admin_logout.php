<?php
session_start();

// destroy session
session_unset();
session_destroy();

// redirect to login
header("Location: admin_login.html");
exit();
?>