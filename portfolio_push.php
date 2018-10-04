<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'logged_in') {
    header('Location: login_page.php');
}
require 'db_instantiation.php';
require 'sanitize_functions.php';
require 'push_data_function.php';
$new_title = clean_string($_POST["new_title"]);
$new_image_file_name = clean_string($_POST["new_image_file_name"]);
$new_hover_text = clean_string($_POST["new_hover_text"]);
$new_url = clean_string($_POST["new_url"]);
echo portfolio_push($new_title, $new_image_file_name, $new_hover_text, $new_url, $db);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="cms.css" />
</head>
<body>
<div class="congrats">
    <a href="cms.php"> RETURN TO CMS BY CLICKING HERE</a>
    <a href="index.php"> RETURN TO FRONT-END BY CLICKING HERE</a>

</div>
</body>
</html>
