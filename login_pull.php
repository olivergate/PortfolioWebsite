<?php
require 'password.php';
session_start();
if
(
    password_verify($_POST['password'], $stored_password) &&
    password_verify($_POST['username'], $stored_username)
) {
    $_SESSION['admin'] = 'logged_in';
    header('Location: cms.php');
} else {
    header('Location: login_page.php?login_fail=1');
}

