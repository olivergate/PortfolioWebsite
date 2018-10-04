<?php
session_start();
if (
    !isset($_SESSION['admin']) ||
    $_SESSION['admin'] != 'logged_in'
) {
    header('Location: login_page.php');
}
require 'db_instantiation.php';
require 'sanitize_functions.php';
require 'push_data_function.php';
$about_me1_new = clean_string($_POST["about_me1"]);
$hero_statement_new = clean_string($_POST["hero_statement"]);
echo push_data($hero_statement_new, 'hero_statement', $db);
echo push_data($about_me1_new, 'about_me1', $db);
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
