<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'logged_in') {
    header('Location: login_page.php');
}
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
    } else {
        return "Error in Submission for " . $location_description;
    }
}

/**Portfolio_push() creates prepares an SQL insert statement that creates a new portfolio item.
 *
 * @param string $post_title New title of the portfolio
 * @param string $post_img_name New Image file_path of the portfolio item
 * @param string $post_hover New Hover text of the portfolio Item
 * @param string $post_url New URl of the project for the portfolio item
 * @param PDO $db  The database that is receiving the information
 * @return string Returns a statement that gives whether or not the INSERT has been successful.
 */
function portfolio_push(string $post_title, string $post_img_name, string $post_hover, string $post_url, pdo  $db) : string
{
    $query_update = $db->prepare("INSERT INTO `portfolio` (`project_name`,`image_file_name`,`hover_text`,`project_url`) VALUES (:title, :img_name, :hover, :url);");
    $query_update->bindParam(':title', $post_title);
    $query_update->bindParam(':img_name', $post_img_name);
    $query_update->bindParam(':hover', $post_hover);
    $query_update->bindParam(':url', $post_url);
    if ($query_update->execute()) {
        return "New portfolio item created!";
    } else {
        return "Error, no portfolio item created, check entries";
    }
}

/** Function portfolio_edit() takes parameters which relate to the different elements of a portfolio item, including
 * it's visibility status and updates the database according to which id number has been fed into the function.
 * Because of the way in which display_portfolio_info() works, there is no way in which data can come from different portfolio entries.
 *
 * @param string $post_title New portfolio title to replace current
 * @param string $post_img_name New img file path name to replace current
 * @param string $post_hover New hover text to replace current
 * @param string $post_url New URL path for portfolio item to replace current
 * @param string $post_visibility New visibility function for portfolio item to replace current
 * @param string $post_id The id of the portfolio item to identify the item in the database
 * @param PDO $db Database which is being affected byt he update
 * @return string Returns a string based on whether the test is successful or not
 */
function portfolio_edit(string $post_title, string $post_img_name, string $post_hover, string $post_url, string $post_visibility, string $post_id, PDO $db) : string
{
    $query_update = $db->prepare("UPDATE `portfolio` SET `project_name` = :title, `image_file_name` = :img_name, `hover_text` = :hover, `project_url` = :url, `delete` = :visibility WHERE `id` = :id ;");
    $query_update->bindParam(':title', $post_title);
    $query_update->bindParam(':img_name', $post_img_name);
    $query_update->bindParam(':hover', $post_hover);
    $query_update->bindParam(':url', $post_url);
    $query_update->bindParam(':id', $post_id);
    $query_update->bindParam(':visibility', $post_visibility);
    if ($query_update->execute()) {
        return "Update complete";
    } else {
        return "Error with update, please check inputs";
    }
}