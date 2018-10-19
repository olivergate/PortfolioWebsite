<?php
require 'password.php';
session_start();

if
(
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    password_verify($_POST['password'], $stored_password) &&
    $_POST['username'] == $stored_username
) {

    $_SESSION['admin'] = 'logged_in';
    header('Location: cms.php');
} else {
    header('Location: login_page.php?login_fail=1');
}

