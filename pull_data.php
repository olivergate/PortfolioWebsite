<?php
require 'password.php';

/** function that pulls data from the database and returns it as a string for use on the front end
 *
 * @param string $fieldname. Selects the fieldname that is being slected from
 * @param $db the linked object that holds the database
 *
 * @return array The content as an array
 */
function content_collect(string $fieldName, $db) : array {
    $query = $db->prepare("SELECT `$fieldName` FROM `text_input`;");
    $query -> execute();
    $result = $query->fetchAll();
    return $result;
}


$db = new PDO ($hostname, $dbusername);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$text_input = content_collect('content', $db);
var_dump($text_input);
echo '<br><br><br><br>';
echo $text_input[0]['content'];
//$hero_statement = text_input('hero_statement', $db);
//$about_me1 = text_input('about_part1', $db);


