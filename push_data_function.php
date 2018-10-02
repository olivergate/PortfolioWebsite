<?php
/**Updates the database with the content of the post variable depending on WHERE location_description = the given location description.
 *
 * @param string $post_variable variable stored from the $_POST
 * @param string $location_description, a hard typed location description according to the location description in the database
 * @param $db Object which stores the
 * @return string giving the indication of whether the submission was successful
 */
function push_data(string $post_variable, string $location_description, $db) : string
{
    $query_update = $db->prepare("UPDATE `text_input` SET `content` = :post_variable WHERE `location_description`='$location_description';");
    $query_update->bindParam(':post_variable', $post_variable);
    if ($query_update->execute()) {
        return "Submission of Form for " . $location_description . " Complete <br>";
    }else {
        return "Error in Submission for " . $location_description;
    }
}