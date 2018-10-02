<?php

/** function that pulls data from the database and returns it as an array to mine data from
 *
 * @param string $key_field_name. Selects the field name that is being selected from which will represent the key.
 * @param string $field_name. Selects the field name that is being selected from
 * @param PDO $db linked object that holds the database
 *
 * @return array The content as an array
 */
function content_collect(string $key_field_name, string $field_name, PDO $db) : array {
    $query = $db->prepare("SELECT $key_field_name, $field_name FROM `text_input`;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

/**This function sifts through an array of database results and picks out a value according to that location
 *
 * @param string $location_id This is the description of where the content will go and correlates to the database entry location_description
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

/**Pulls in all information about an specific portfolio item as ana array based on  it's id.
 *
 * @param int $id Hard coded input that relates to the id number within the data base
 * @param PDO $db The database object that contains the necessary data
 *
 * @return array returned array showing containing all the necessary information. the array format is:
 * (that correlate to the field names) [id, visibility, project_name, image_file_name, hover_text, project_url]
 */
function portfolio_collect(int $id, PDO $db) : array {
    $query = $db->prepare("SELECT * FROM `portfolio` WHERE `id` = $id;");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
