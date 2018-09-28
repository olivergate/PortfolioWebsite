<?php
$db = new PDO ($hostname, $dbusername);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

function text_input(string $location_description, $db) {
    $query = $db->prepare("SELECT `content` FROM `text_input` WHERE `location_description`='$location_description';");
    $query -> execute();
    $result = $query->fetch();
    echo $result['content'];
}

