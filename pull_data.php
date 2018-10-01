<?php
$db = new PDO ($hostname, $dbusername);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/** function that pulls data from the database and returns it as a string for use on the front end
 * @param string $location_description - this correlate to the database entry under "location_description" in the text_input section.
 * @param $db the linked object that holds the database
 *
 * @return string The content fromt he database as a string to be echoes into the html.
 */
function text_input(string $location_description, $db) : string {
    $query = $db->prepare("SELECT `content` FROM `text_input` WHERE `location_description`='$location_description';");
    $query -> execute();
    $result = $query->fetch();
    return $result['content'];
}

