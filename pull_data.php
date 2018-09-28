<?php

function text_input(string $location_description, $db) {
    $query = $db->prepare("SELECT `content` FROM `text_input` WHERE `location_description`='$location_description';");
    $query -> execute();
    $result = $query->fetch();
    echo $result['content'];
}

