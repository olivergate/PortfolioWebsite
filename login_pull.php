<?php

session_start();
if(password_verify($_POST['password'], '$hash') && password_verify($_POST['username'], '$hash')) {
    $_SESSION['admin'] = 'loggedIn';
    header('Location: cms.php');
} else {
    header('Location: login_page.php?error=01');
}

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'loggedIn') {
    header('Location: login_page.php');
}