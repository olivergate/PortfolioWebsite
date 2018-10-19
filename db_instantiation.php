<?php
session_start();
require 'password.php';
$db = new PDO($hostname, $dbusername);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);