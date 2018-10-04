<?php

session_start();
if(
    password_verify($_POST['password'], '$hash') &&
    password_verify($_POST['username'], '$hash')
) {
    $_SESSION['admin'] = 'logged_in';
    header('Location: cms.php');
} else {
    header('Location: login_page.php?login_fail=1');
}

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'loggedIn') {
    header('Location: login_page.php');
}