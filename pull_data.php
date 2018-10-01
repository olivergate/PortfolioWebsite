<?php
require 'password.php';

/** function that pulls data from the database and returns it as a string for use on the front end
 *
 * @param string $fieldname. Selects the fieldname that is being slected from
 * @param $db the linked object that holds the database
 *
 * @return array The content as an array
 */
function content_collect(string $key_field_name, string $fieldName, PDO $db) : array {
    $query = $db->prepare("SELECT `$key_field_name`, `$fieldName` FROM `text_input`;");
    $query -> execute();
    $result = $query->fetchAll();
    return $result;
}

/**This function sifts through an array of database results and picks out a value according to that location
 *
 * @param string $location_id This is the description of where the content will go and correlates tot he database entry location_description
 * @param array $database_pull this is the array which holds the pull from the database 'portfolio'
 *
 * @return string pull out the text which is in the database
 */
function content_picker(string $location_id, array $database_pull) : string {
    foreach ($database_pull as $row) {
        if(array_search($location_id, $row)) {
            return $row['content'];
        }
    }
    return 'Error';
}

$db = new PDO ($hostname, $dbusername);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$text_input = content_collect('location_description','content', $db);
var_dump($text_input);
echo count($text_input);
echo content_picker('hero_statement', $text_input);
echo '<br><br><br><br>';

$hero_statement = content_picker('hero_statement', $text_input);
$about_me1 = content_picker('about_me1', $text_input);
echo $about_me1;

