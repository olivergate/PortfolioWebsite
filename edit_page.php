<?php


require 'pull_data.php';
$hero_statement_new = $_POST["hero_statement"];
$query_update = $db->prepare("UPDATE `text_input` SET `content` = '$hero_statement_new' WHERE `location_description`='hero_statement';");
$query_update->execute();

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="cms.css" />

</head>
<body>
<div class="congrats">
    <a href="cms.php"> SUBMISSION COMPLETE RETURN TO CMS BY CLICKING HERE</a>
</div>
</body>
</html>
