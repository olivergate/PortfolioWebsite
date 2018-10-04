<?php
session_start();
if (
    !isset($_SESSION['admin']) ||
    $_SESSION['admin'] != 'logged_in'
) {
    header('Location: login_page.php');
}
require 'password.php';
$db = new PDO($hostname, $dbusername);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);