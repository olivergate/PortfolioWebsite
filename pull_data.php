<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'logged_in') {
    header('Location: login_page.php');
}
require 'pull_data_functions.php';
require 'db_instantiation.php';


$content_array = content_collect('location_description','content', $db);

$hero_statement = content_picker('hero_statement', $content_array);
$about_me1 = content_picker('about_me1', $content_array);

$portfolio_db = portfolio_collect($db);

