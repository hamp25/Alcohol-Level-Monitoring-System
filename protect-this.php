<?php
    /* Your password */
    $password = 'ams';

    if (empty($_COOKIE['password']) || $_COOKIE['password'] !== $password) {
        // Password not set or incorrect. Send to login.php.
        header('Location: pass_page.php');
        exit;
    }
?>